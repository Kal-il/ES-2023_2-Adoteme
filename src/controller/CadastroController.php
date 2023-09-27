<?php

require_once '../models/Connection.php';
require_once '../models/UserModel.php';

use models\Connection;
use models\UserModel;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["botaoCadastro"])){
        if(isEmpty($_POST)){
    
            $data = [
                "email" => $email = $_POST['email'],
                "password" => $password = $_POST['password'],
                "password2" => $password2 = $_POST['password2'],
                "nome" => $nome = $_POST['name'],
                "cpf" => $cpf = $_POST['cpf'],
                "telefone" => $telefone = $_POST['telephone'],
                "cep" => $cep = $_POST['cep'],
                "endereco" => $endereco = $_POST['adress'], 
                "cidade" => $cidade = $_POST['city'],
                "estado" => $estado = $_POST['state'],
                "matricula" => $matricula = $_POST['enrollment'],
                "data_nascimento" => $data_nascimento = $_POST['birthday']
            ];
            
            if(validarCadastro($data)){
                $connection = new Connection;
                $connection = $connection->getConnection();
    
                $user = new UserModel();
                $resultado = $user->CreateUser($connection, $data);
    
                if($resultado){
                    header("Location: ../view/pages/LoginPage.php");
                } else {
                    echo "<h1> Query inválida </h1>";
                }
            } else {
                // Redirecionamento para erro na validação
            }
        }
    }
}


function validarCadastro($data){
    return true;
    // TODO: Validar cadastro (validar e comparar senhas e garantir que não hajam campos vazios)
}


function isEmpty(){
    foreach($_POST as $item){
        if(empty($item) && $item != $_POST["botaoCadastro"]){
            return false;
        }
    }
    return true;
}
?>