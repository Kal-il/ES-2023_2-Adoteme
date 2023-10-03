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
        $outra_cor = pg_escape_string($connection, $data['outraCor']);
        $descricao = pg_escape_string($connection, $data['descricao']);
        $castrado = pg_escape_string($connection, $data['castrado']);
        $vacinacao_completa = pg_escape_string($connection, $data['vacinacaoCompleta']);
        $info_vacina = pg_escape_string($connection, $data['infoVacina']);
        $personalidades = pg_escape_string($connection, implode(',', $data['personalidades']));
        $foto1 = pg_escape_string($connection, $data['foto1_url']);
        $foto2 = pg_escape_string($connection, $data['foto2_url']);
        $foto3 = pg_escape_string($connection, $data['foto3_url']);
        


        $query = "INSERT INTO gatos (nome, data_nascimento, sexo, cor, outracor, descricao, castrado, vacina_completa, info_vacina, personalidade, foto1, foto2, foto3) VALUES ('$nome', '$data_nascimento', '$sexo', '$cor', '$outra_cor', '$descricao', '$castrado', '$vacinacao_completa', '$info_vacina', '$personalidades','$foto1', '$foto2', '$foto3');";
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
        $outra_cor = pg_escape_string($connection, $data['outraCor']);
        $descricao = pg_escape_string($connection, $data['descricao']);
        $castrado = pg_escape_string($connection, $data['castrado']);
        $vacinacao_completa = pg_escape_string($connection, $data['vacinacaoCompleta']);
        $info_vacina = pg_escape_string($connection, $data['infoVacina']);
        $personalidades = pg_escape_string($connection, implode(',', $data['personalidades']));
        $foto1 = pg_escape_string($connection, $data['foto1_url']);
        $foto2 = pg_escape_string($connection, $data['foto2_url']);
        $foto3 = pg_escape_string($connection, $data['foto3_url']);

        $query = "UPDATE gatos SET nome=$nome, data_nascimento=$data_nascimento, sexo=$sexo, cor=$cor, outracor=$outra_cor, descricao=$descricao, castrado=$castrado, vacina_completa=$vacinacao_completa, info_vacina=$info_vacina, personalidade=$personalidades, foto1=$foto1, foto2=$foto2, foto3=$foto3 WHERE id = $gatoId;";
        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }   
        
    }
    
    function getGatoById($connection, $id) {
        $query = "SELECT * FROM gatos WHERE id = $id;";
        $resultado = $this->queryDatabase($connection, $query);

        $gato = pg_fetch_assoc($resultado);

        return $gato;
    }
    
    function ListarGatos($connection) {
        $query = "SELECT * FROM gatos";
        $resultado = pg_query($connection, $query);
    
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