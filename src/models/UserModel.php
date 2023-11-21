<?php
namespace models;

class UserModel {
    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

	function UpdateUser($connection, $data) {
		$id = pg_escape_string($connection, $data['id']);	
		$nome =  pg_escape_string($connection, $data['nome']);					
		$sobrenome =  pg_escape_string($connection, $data['sobrenome']);
		$telefone =  pg_escape_string($connection, $data['telefone']);
		$nascimento =  pg_escape_string($connection, $data['nascimento']);
		$estado =  pg_escape_string($connection, $data['estado']);
		$cidade =  pg_escape_string($connection, $data['cidade']);
		$endereco =  pg_escape_string($connection, $data['endereco']);
		$foto = pg_escape_string($connection, $data['foto']);

		$query = "UPDATE usuarios
		SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', cidade='$cidade', estado='$estado', endereco='$endereco', data_nascimento='$nascimento', foto='$foto' 
		WHERE id='$id'";

		$resultado = $this->queryDatabase($connection, $query);

		if(pg_affected_rows($resultado)==0) {
			return false;
		}
		return true;
	}

    function Login($connection, $data) {
         /*
            * o uso do pg_escape_string é para evitar o SQL Injection, que é uma técnica de invasão de banco de dados
            * ele é usado para escapar caracteres especiais que podem ser usados para invadir o banco de dados.
        */
        $email = pg_escape_string($connection, $data['email']); 
        $password = pg_escape_string($connection, $data['password']); 

        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = pg_fetch_all($this->queryDatabase($connection, $query));
       
        if (!$resultado || !password_verify($password, $resultado[0]['senha'])) {
            return false;
        } else {
            return true;
        }
    }
   
    function IsSuperuser($connection, $data) {
        $email = pg_escape_string($connection, $data['email']); 
        $password = pg_escape_string($connection, $data['password']); 

        $query = "SELECT * FROM usuarios WHERE email = '$email' AND superuser = true";
        $resultado = pg_fetch_all($this->queryDatabase($connection, $query));

        if (!$resultado || !password_verify($password, $resultado[0]['senha'])) {
            return false;
        } else {
            return true;
        }
    }
    function CreateUser($connection, $data) {

        $email = pg_escape_string($connection, $data['email']); 
        $password = pg_escape_string($connection, $data['password']); 
        $nome = pg_escape_string($connection, $data['nome']);
        $sobrenome = pg_escape_string($connection, $data['sobrenome']);
        $cpf = pg_escape_string($connection, $data['cpf']); 
        $telefone = pg_escape_string($connection, $data['telefone']); 
        $cep = pg_escape_string($connection, $data['cep']); 
        $cidade = pg_escape_string($connection, $data['cidade']); 
        $estado = pg_escape_string($connection, $data['estado']); 
        $matricula = pg_escape_string($connection, $data['matricula']);
        $data_nascimento = pg_escape_string($connection, $data['data_nascimento']); 
        $endereco = pg_escape_string($connection, $data['endereco']);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (email, senha, nome, sobrenome, cpf, telefone, cep, cidade, estado, endereco, matricula, data_nascimento)
        VALUES ('$email', '$password', '$nome', '$sobrenome', '$cpf', '$telefone', '$cep', '$cidade', '$estado', '$endereco', '$matricula', '$data_nascimento')";
        $resultado = $this->queryDatabase($connection, $query);

        if (!$resultado) {
            return false;
        } else {
            return true;
        }
    }

    function CheckUserByEmail($connection, $email){
        $query = "SELECT * FROM usuarios WHERE email='$email'";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_num_rows($resultado)==0){
            return true;
        } else {
            return false;
        }
    }

    function CheckUserByCPF($connection, $cpf){
        $query = "SELECT * FROM usuarios WHERE cpf='$cpf'";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_num_rows($resultado)==0){
            return true;
        } else {
            return false;
        }
    }

    function CheckUserByMatricula($connection, $matricula){
        $query = "SELECT * FROM usuarios WHERE matricula='$matricula'";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_num_rows($resultado)==0){
            return true;
        } else {
            return false;
        }
    }

    function GetIDByEmail($connection, $email){
        $query = "SELECT id FROM usuarios WHERE email='$email'";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_num_rows($resultado)==0){
            return 0;
        }

        $row = pg_fetch_row($resultado);
        return $row[0];
    }

	function GetUserByID($connection, $user_id) {
		$query = "SELECT id, email, nome, sobrenome, telefone, cep, cidade, estado, endereco, data_nascimento, foto from usuarios WHERE id='$user_id'";
		$resultado = $this->queryDatabase($connection, $query);

		if(pg_num_rows($resultado) == 0) {
			return false;
		}

        $usuario = pg_fetch_assoc($resultado);
		return $usuario;
	}

}


?>
