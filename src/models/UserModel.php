<?php
namespace models;
require_once '../models/Connection.php';

class UserModel {
    function Login($connection, $data) {
        /**
            * o uso do pg_escape_string é para evitar o SQL Injection, que é uma técnica de invasão de banco de dados
            * ele é usado para escapar caracteres especiais que podem ser usados para invadir o banco de dados.
        */
        $email = pg_escape_string($connection, $data['email']); 
        $password = pg_escape_string($connection, $data['password']); 

        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        if (pg_num_rows($resultado) == 0) {
            return false;
        } else {
            return true;
        }
    }
}
?>