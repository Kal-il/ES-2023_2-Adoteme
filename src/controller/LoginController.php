<?php
namespace controller;

require __DIR__ . '\..\..\vendor\autoload.php';
use Firebase\JWT\JWT;

use models\Connection;
use models\UserModel;
 /*
        * Aqui é implementado toda a lógica de negócio do login, é feita a validação dos campos,
        * a conexão com o banco de dados e a verificação se o usuário existe no banco de dados.
        * caso o usuário exista, é redirecionado para a página inicial, caso não exista, é redirecionado
        * para a página de login com uma mensagem de erro.
    */

    session_start();
class LoginController {
    private $connection;
    private $email;
    private $password;
    private $resultado_login;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function Login(){
        if (empty($erros)){
            $this->connection = new Connection();
            $this->connection = $this->connection->getConnection();

            $data = [
                "email" => $this->email,
                "password" => $this->password,
            ];

            $login = new UserModel();
            $this->resultado_login = $login -> Login($this->connection, $data);
            $user_id = $login->GetIDByEmail($this->connection, $this->email);

            if ($this->resultado_login){
                // Caso o login tenha sucesso, será gerado um token JWT:
                $payload = [
                    "exp" => time() + 3600,
                    "iat" => time(),
                    "email" => $this->email,
                    "user_id" => $user_id,
                ];

                // Uso de Chave temporária "test_key"

                $token = JWT::encode($payload, "test_key", "HS256");
                setcookie('jwt_token', $token, time() + 3600, '/');

                if ($login->IsSuperuser($this->connection, $data)){
                    header("Location: ../view/pages/pagesAdmin/HomePageAdmin.php");
                }else{
                    header("Location: /");
                }
                
            } else {    
                $_SESSION['campos_invalidos'] = "E-mail ou senha estão errados.";

                header("Location: /login");
            }
        }
    }
}
?>
