<?php
namespace controller;

require_once '../models/Connection.php';
require_once '../models/UserModel.php';

use models\Connection;
use models\UserModel;

class LoginController {
    private $connection;
    private $user;
    private $password;
    private $resultado_login;

    public function __construct($user, $password){
        $this->user = $user;
        $this->password = $password;
    }

    public function Login(){
        if ($this->validar_campos()){
            $this->connection = new Connection();
            $this->connection = $this->connection->getConnection();
            $data = [
                "user" => $this->user,
                "password" => $this->password,
            ];
            $login = new UserModel();
            $this->resultado_login = $login -> Login($this->connection, $data);
           
        }
    }

    private function validar_campos(): bool {
        if (empty($this->user) || empty($this->password)) {
            return false; 
        } 
        if (!filter_var($this->user, FILTER_VALIDATE_EMAIL)) {
            return false; 
        }
        if (strlen($this->password) < 8){
            return false; 
        }
        return true; 
    }   
}
?>
