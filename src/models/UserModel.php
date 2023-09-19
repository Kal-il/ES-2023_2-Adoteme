<?php
namespace models;
require_once '../models/Connection.php';

class UserModel {
    function Login($connection, $data) {
        $email = pg_escape_string($connection, $data['user']); 
        $password = pg_escape_string($connection, $data['password']); 

        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Deu erro na consulta: " . pg_last_error($connection));
        }

        if (pg_num_rows($resultado) == 0) {
            echo "<h4>Nenhum resultado encontrado.</h4>";
        } else {
            $row = pg_fetch_assoc($resultado);
            $json = json_encode($row);
            $array = json_decode($json, true);
            $_SESSION['user'] = $array;
            return true;
        }
    }
}
?>