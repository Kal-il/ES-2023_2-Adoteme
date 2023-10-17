<?php
namespace models;
require_once 'Connection.php';

class GatosModel {

    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

    function CreateGato($connection, $data) {

        $nome = pg_escape_string($connection, $data['nome']);
        $data_nascimento = pg_escape_string($connection, $data['dataNascimento']);
        $sexo = pg_escape_string($connection, $data['sexo']);
        $cor = pg_escape_string($connection, $data['cor']);
        
        $descricao = pg_escape_string($connection, $data['descricao']);

        if(isset($data['castrado'])){
            $castrado = pg_escape_string($connection, $data['castrado']);
        } else {
            $castrado = false;
        }

        if(isset($data['vacinacaoCompleta'])){
            echo "Trem:" . $data['vacinacaoCompleta'];
            $vacinacao_completa = pg_escape_string($connection, $data['vacinacaoCompleta']);
        } else {
            $vacinacao_completa = false;
        }

        $info_vacina = pg_escape_string($connection, $data['infoVacina']);
        $personalidades = pg_escape_string($connection, implode(',', $data['personalidades']));

        $aux = 0;

        if(isset($data['foto1_url'])){
            $foto1 = pg_escape_string($connection, $data['foto1_url']);
            $aux = 1;
        }
        if(isset($data['foto2_url'])){
            $foto2 = pg_escape_string($connection, $data['foto2_url']);
            $aux = 2;
        }
        if(isset($data['foto3_url'])){
            $foto3 = pg_escape_string($connection, $data['foto3_url']);
            $aux = 3;
        }

        if($aux==3){
            $query = "INSERT INTO gatos (nome, data_nascimento, sexo, cor, descricao, castrado, vacina_completa, info_vacina, personalidade, foto1, foto2, foto3) VALUES ('$nome', '$data_nascimento', '$sexo', '$cor', '$descricao', '$castrado', '$vacinacao_completa', '$info_vacina', '$personalidades','$foto1', '$foto2', '$foto3');";
        } elseif($aux==2){
            $query = "INSERT INTO gatos (nome, data_nascimento, sexo, cor, descricao, castrado, vacina_completa, info_vacina, personalidade, foto1, foto2) VALUES ('$nome', '$data_nascimento', '$sexo', '$cor', '$descricao', '$castrado', '$vacinacao_completa', '$info_vacina', '$personalidades','$foto1', '$foto2');";
        } elseif($aux==1){
            $query = "INSERT INTO gatos (nome, data_nascimento, sexo, cor, descricao, castrado, vacina_completa, info_vacina, personalidade, foto1) VALUES ('$nome', '$data_nascimento', '$sexo', '$cor', '$descricao', '$castrado', '$vacinacao_completa', '$info_vacina', '$personalidades','$foto1');";
        } elseif($aux==0){
            $query = "INSERT INTO gatos (nome, data_nascimento, sexo, cor, descricao, castrado, vacina_completa, info_vacina, personalidade) VALUES ('$nome', '$data_nascimento', '$sexo', '$cor', '$descricao', '$castrado', '$vacinacao_completa', '$info_vacina', '$personalidades');";
        }

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }   
        
    }

    function UpdateGato($connection, $data) {

        $gatoId = $data['id'];

        $nome = pg_escape_string($connection, $data['nome']);
        $data_nascimento = pg_escape_string($connection, $data['dataNascimento']);
        $sexo = pg_escape_string($connection, $data['sexo']);
        $cor = pg_escape_string($connection, $data['cor']);
        $descricao = pg_escape_string($connection, $data['descricao']);
        $castrado = pg_escape_string($connection, $data['castrado']);
        $vacinacao_completa = pg_escape_string($connection, $data['vacinacaoCompleta']);
        $info_vacina = pg_escape_string($connection, $data['infoVacina']);
        $personalidades = pg_escape_string($connection, implode(',', $data['personalidades']));

        $query = "UPDATE gatos SET nome='$nome', data_nascimento='$data_nascimento', sexo='$sexo', cor='$cor', descricao='$descricao', castrado='$castrado', vacina_completa='$vacinacao_completa', info_vacina='$info_vacina', personalidade='$personalidades' WHERE id = $gatoId;";
        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }   
        
    }

    function DeleteGato($connection, $id){
        $query =  "DELETE FROM gatos WHERE id='$id'";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }
    }
    
    function getGatoById($connection, $id) {
        $query = "SELECT * FROM gatos WHERE id = '$id'";
        $resultado = $this->queryDatabase($connection, $query);

        $gato = pg_fetch_assoc($resultado);

        return $gato;
    }
    
    function ListarGatos($connection) {
        $query = "SELECT * FROM gatos";
        $resultado = $this -> queryDatabase($connection, $query);
    
        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
    
        $gatos = array();
        while ($row = pg_fetch_assoc($resultado)) {
            $gatos[] = $row;
        }
    
        return $gatos;
    }

    function searchGato($connection, $data) {
    
        $data= pg_escape_string($connection, $data);
        $query = "SELECT * FROM gatos WHERE nome LIKE '%$data%' OR cor LIKE '%$data%' or sexo LIKE '%$data%' or personalidade LIKE '%$data%'";
        $resultado = $this->queryDatabase($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
        $gatos = array();
        while ($row = pg_fetch_assoc($resultado)) {
            $gatos[] = $row;
        }
        return $gatos;
    }
    
   

    }
