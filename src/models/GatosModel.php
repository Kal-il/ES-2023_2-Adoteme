<?php
namespace models;
require_once '../models/Connection.php';

class GatosModel {

    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

    function CreateGato($connection, $data) {
        // TODO: Terminar SQL  de inserção de gato
        $nome = pg_escape_string($connection, $data['nome']); 
        $data_nas = pg_escape_string($connection, $data['idade']); 
        $sexo = pg_escape_string($connection, $data['sexo']); 
        $cor = pg_escape_string($connection, $data['cor']); 
        $porte = pg_escape_string($connection, $data['porte']); 
        $descricao = pg_escape_string($connection, $data['descricao']); 
        $imagem = pg_escape_string($connection, $data['imagem']); 
        $adotado = false;
        $adotante = null;
        $data_adocao = null;
        $data_cadastro = date("Y-m-d");

        $query = "INSERT INTO gatos (nome, idade, sexo, cor, porte, descricao, imagem, adotado, adotante, data_adocao, data_cadastro) VALUES ('$nome', '$idade', '$sexo', '$cor', '$porte', '$descricao', '$imagem', '$adotado', '$adotante', '$data_adocao', '$data_cadastro')";
        $resultado = $this->queryDatabase($connection, $query);

        if (pg_num_rows($resultado) == 0) {
            return false;
        } else {
            return true;
        }
    }
    function EditGato($connection, $data) {

        $nome = pg_escape_string($connection, $data['nome']); 
        $data_nas = pg_escape_string($connection, $data['idade']); 
        $sexo = pg_escape_string($connection, $data['sexo']); 
        $cor = pg_escape_string($connection, $data['cor']); 
        $porte = pg_escape_string($connection, $data['porte']); 
        $descricao = pg_escape_string($connection, $data['descricao']); 
        $imagem = pg_escape_string($connection, $data['imagem']); 
        $adotado = false;
        $adotante = null;
        $data_adocao = null;
        $data_cadastro = date("Y-m-d");

        $query = "UPDATE gatos SET nome = '$nome', idade = '$idade', sexo = '$sexo', cor = '$cor', porte = '$porte', descricao = '$descricao', imagem = '$imagem', adotado = '$adotado', adotante = '$adotante', data_adocao = '$data_adocao', data_cadastro = '$data_cadastro' WHERE id = '$id'";
        $resultado = $this->queryDatabase($connection, $query);

        if (pg_num_rows($resultado) == 0) {
            return false;
        } else {
            return true;
        }
    }
   
        
}