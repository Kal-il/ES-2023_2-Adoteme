<?php
namespace models;
require_once 'Connection.php';


class FavoritosModel{
    
    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

    function addFavoritos($connection, $data) {
        $id_usuario = pg_escape_string($connection, $data['usuario_id']); 
        $id_gato = pg_escape_string($connection, $data['gato_id']); 

        $query = "INSERT INTO favoritos (usuario_id, gato_id) VALUES ('$id_usuario', '$id_gato');";
        $resultado = $this->queryDatabase($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
    }

    function getFavoritos($connection, $data) {
        $id_usuario = pg_escape_string($connection, $data['usuario_id']); 
        $id_gato = pg_escape_string($connection, $data['gato_id']);

        $query = "SELECT * FROM favoritos WHERE usuario_id = '$id_usuario' and gato_id = '$id_gato';";
        $resultado = $this->queryDatabase($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        $favoritos = array();

        while ($linha = pg_fetch_assoc($resultado)) {
            $favoritos[] = $linha;
        }

        return $favoritos;
    }

    function deleteFavoritos($connection, $data) {
        $id_usuario = pg_escape_string($connection, $data['usuario_id']); 
        $id_gato = pg_escape_string($connection, $data['gato_id']); 

        $query = "DELETE FROM favoritos WHERE usuario_id = '$id_usuario' AND gato_id = '$id_gato';";
        $resultado = $this->queryDatabase($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
    }


    function getFavoritosByUserId($connection, $user_id){
        $query = "SELECT gato_id FROM favoritos WHERE usuario_id = '$user_id';";
        $resultado = $this->queryDatabase($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        $favoritos = array();

        while ($linha = pg_fetch_assoc($resultado)) {
            $favoritos[] = $linha;
        }

        return $favoritos;
    }


}