<?php
namespace models;
require_once '../models/Connection.php';

class UserModel {
    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

    function Login($connection, $data) {
         /*
            * o uso do pg_escape_string é para evitar o SQL Injection, que é uma técnica de invasão de banco de dados
            * ele é usado para escapar caracteres especiais que podem ser usados para invadir o banco de dados.
        */
        $email = pg_escape_string($connection, $data['email']); 
        $password = pg_escape_string($connection, $data['password']); 

        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
        $resultado = $this->queryDatabase($connection, $query);

        if (pg_num_rows($resultado) == 0) {
            return false;
        } else {
            return true;
        }
    }

    function IsSuperuser($connection, $data) {
        $email = pg_escape_string($connection, $data['email']); 
        $password = pg_escape_string($connection, $data['password']); 

        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password' AND superuser = true";
        $resultado = $this->queryDatabase($connection, $query);

        if (pg_num_rows($resultado) == 0) {
            return false;
        } else {
            return true;
        }
    }
}
?>
