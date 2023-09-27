<?php

require_once '../models/Connection.php';
require_once '../models/UserModel.php';

use models\Connection;
use models\UserModel;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["botaoCadastro"])){
        if(!isEmpty($_POST)){
    
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

            $errors = validar_cadastro();
            
            if(!$errors){
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
                header("Location: ../view/pages/SinginPage.php?$errors");
            }
        } else {
            header("Location: ../view/pages/SinginPage.php?erro=400");
        }
    }
}

function validar_cadastro(){
    if(comparar_senhas()){
        $errors = "different_password=1";
    }

    if(isset($errors)){
        $errors = $errors . "&";
    }

    if(verificar_tamanho_senha()){
        $errors = $errors . "password_size_error=1";
    }

    return $errors;
}

function comparar_senhas(){
    if($_POST['password'] != $_POST['password2']){
        $erro = "As senhas devem ser iguais.";
        return true;
    }
    return false;
}

function verificar_tamanho_senha(){
    if(!empty($_POST['password']) && strlen($_POST['password']) < 8){
        $erro = "A senha deve conter pelo menos 8 caracteres";
        return true;
    }
    return false;
}

function isEmpty(){
    foreach($_POST as $item){
        if(empty($item) || $item != $_POST["botaoCadastro"]){
            return true;
        }
    }
    return false;
}
?>