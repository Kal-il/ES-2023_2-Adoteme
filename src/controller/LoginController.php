<?php
namespace controller;

require __DIR__ . '\..\..\vendor\autoload.php';
use Firebase\JWT\JWT;

require_once '../models/Connection.php';
require_once '../models/UserModel.php';

use models\Connection;
use models\UserModel;
 /**
        * Aqui é implementado toda a lógica de negócio do login, é feita a validação dos campos,
        * a conexão com o banco de dados e a verificação se o usuário existe no banco de dados.
        * caso o usuário exista, é redirecionado para a página inicial, caso não exista, é redirecionado
        * para a página de login com uma mensagem de erro.
    */
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
        $erros = $this->validar_campos();

        if (empty($erros)){
            $this->connection = new Connection();
            $this->connection = $this->connection->getConnection();
            $data = [
                "email" => $this->email,
                "password" => $this->password,
            ];
            $login = new UserModel();
            $this->resultado_login = $login -> Login($this->connection, $data);
            if ($this->resultado_login){
                // Caso o login tenha sucesso, será gerado um token JWT:
                $payload = [
                    "exp" => time() + 10,
                    "iat" => time(),
                    "email" => $this->email,
                ];

                // Uso de Chave temporária "test_key"

                $token = JWT::encode($payload, "test_key", "HS256");

                setcookie('jwt_token', $token, time() + 3600, '/');

                header("Location: ../view/pages/HomePage.php");
            } else {
                header("Location: ../view/pages/LoginPage.php?error=400");
            }
        }
        else {
                $erros_encoded = urlencode(json_encode($erros));
                header("Location: ../view/pages/LoginPage.php?erros=$erros_encoded");
            }
    }

private function validar_campos(): array {
    $erros = [];

    // Validação do e-mail
    if (empty($this->email)) {
        $erros[] = "O campo de e-mail não pode estar vazio.";
    }

    // Validação da senha
    if (empty($this->password)) {
        $erros[] = "O campo de senha não pode estar vazio.";
    }

    return $erros;
    }
}
?>
