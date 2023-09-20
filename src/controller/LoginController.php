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
        if ($this->validar_campos()){
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
    }

    private function validar_campos(): bool {
        /**
            * Validação dos campos, filter_var é uma função nativa do php que valida o email, usando o filtro FILTER_VALIDATE_EMAIL,
            * que retorna true se o email for válido e false se não for válido.
        */
        if (empty($this->email) || empty($this->password)) {
            return false; 
        } 
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false; 
        }
        if (strlen($this->password) < 8){
            return false; 
        }
        return true; 
    }   
}
?>
