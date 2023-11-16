<?php
namespace models;

class AdocaoModel {
    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

    function CreateAdocao($connection, $data){
        $id_adotante = $data['id_adotante'];
        $id_gato = $data['id_gato'];
        $situacao = "analise";

        $query = "INSERT INTO adocoes(adotante_id, gato_id, situacao) VALUES ('$id_adotante', '$id_gato', '$situacao');";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        } 
    }

    function GetAdocoesByUsuario($connection, $id_usuario){
        $query = "SELECT adocoes.id, adotante_id, gato_id, admin_id, situacao, nome FROM adocoes, gatos WHERE adotante_id='$id_usuario' AND gato_id = gatos.id";

        $resultado = $this -> queryDatabase($connection, $query);
    
        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
    
        $adocoes = array();
        while ($row = pg_fetch_assoc($resultado)) {
            $adocoes[] = $row;
        }
    
        return $adocoes;
    }

    function UpdateSituacaoAdocao($connection, $data){
        $situacao = $data['situacao'];
        $id_usuario = $data['adotante_id'];
        $id_gato = $data['gato_id'];
        $id_admin = $data['admin_id'];

        $query = "UPDATE adocoes SET situacao='$situacao', admin_id='$id_admin' WHERE adotante_id = '$id_usuario' AND gato_id = '$id_gato'";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }  
    }

    function GetAdocaoById($connection, $id_adocao){
        $query = "SELECT id, adotante_id, gato_id, admin_id, situacao FROM adocoes WHERE id='$id_adocao'";

        $resultado = $this -> queryDatabase($connection, $query);
    
        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
    
        $adocao = pg_fetch_assoc($resultado);

        return $adocao;
    }

    function GetAdocoes($connection){
        $query = "SELECT * FROM adocoes";

        $resultado = $this -> queryDatabase($connection, $query);
    
        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
    
        $adocoes = array();
        while ($row = pg_fetch_assoc($resultado)) {
            $adocoes[] = $row;
        }
    
        return $adocoes;
    }

    function GetAdocoesComNome($connection){
        $query = "SELECT adocoes.id, adotante_id, gato_id, admin_id, situacao, gatos.nome as gato_nome, usuarios.nome as adotante_nome, usuarios.sobrenome FROM adocoes, gatos, usuarios WHERE gato_id = gatos.id AND adotante_id = usuarios.id";

        $resultado = $this -> queryDatabase($connection, $query);
    
        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
    
        $adocoes = array();
        while ($row = pg_fetch_assoc($resultado)) {
            $adocoes[] = $row;
        }
    
        return $adocoes;
    }

}

?>
