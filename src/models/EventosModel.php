<?php
namespace models;

class FormularioModel{
    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

    public function createEventos($connection, $data){
        $img = $data['foto'];
        $nome = $data['nome'];

        $query = "INSERT INTO eventos(nome,foto) VALUES ('$nome','$img')";
        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }  
    }

    public function getEventos($connection){
        $query = "SELECT * FROM eventos";
        $resultado = $this->queryDatabase($connection, $query);
        $eventos = pg_fetch_all($resultado);
        return $eventos;
    }

    public function deleteEventos($connection, $id){
        $query = "DELETE FROM eventos WHERE id_evento = $id";
        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }  
    }

    public function editEventos($connection, $id){
        $query = "SELECT * FROM eventos WHERE id_evento = $id";
        $resultado = $this->queryDatabase($connection, $query);
        $eventos = pg_fetch_all($resultado);
        return $eventos;
    }

}