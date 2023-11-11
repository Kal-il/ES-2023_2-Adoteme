<?php

require_once '../models/Connection.php';
require_once '../models/UserModel.php';

use models\Connection;
use models\UserModel;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["botaoCadastro"])){

        if(!isEmpty($_POST)){
            var_dump($_POST);
            $data = [
                "email" => $email = $_POST['email'],
                "password" => $password = $_POST['password'],
                "password2" => $password2 = $_POST['password2'],
                "nome" => $nome = $_POST['name'],
                "sobrenome" => $sobrenome = $_POST['surname'],
                "cpf" => $cpf = $_POST['cpf'],
                "telefone" => $telefone = $_POST['telephone'],
                "cep" => $cep = $_POST['cep'],
                "endereco" => $endereco = $_POST['adress'], 
                "cidade" => $cidade = $_POST['city'],
                "estado" => $estado = $_POST['state'],
                "matricula" => $matricula = $_POST['enrollment'],
                "data_nascimento" => $data_nascimento = $_POST['birthday']
            ];
            $connection = new Connection;
            $connection = $connection->getConnection();

            $user = new UserModel();
            $validacao = true;

            if(!validarSenhas($data)){
                $erro = "As senhas não são iguais.";
                $erro_senha = "senha=" . urlencode(json_encode($erro));
                $validacao = false;
            }

            if(!$user->CheckUserByEmail($connection, $data['email'])){
                $erro = "Este e-mail já está cadastrado";
                $erro_email = "email=" . urlencode(json_encode($erro));
                $validacao = false;
            }

            if(!$user->CheckUserByCPF($connection, $data['cpf'])){
                $erro = "Este CPF já está cadastrado";
                $erro_cpf = "cpf=" . urlencode(json_encode($erro));
                $validacao = false;
            }

            if(!$user->CheckUserByMatricula($connection, $data['matricula'])){
                $erro = "Este número de matrícula já está cadastrado";
                $erro_matricula = "matricula=" . urlencode(json_encode($erro));
                $validacao = false;
            }

            if($validacao){
                $resultado = $user->CreateUser($connection, $data);
                
                if($resultado){
                    header("Location: ../view/pages/LoginPage.php");
                } else {
                    echo "<h1> Query inválida </h1>";
                }
            } else {
                header("Location: ../view/pages/SinginPage.php?$erro_senha&$erro_email&$erro_cpf&$erro_matricula"); 

            }
        } else {
            $erro = "Preencha todos os campos";
            $erro = urlencode(json_encode($erro));
            header("Location: ../view/pages/SinginPage.php?erro=$erro"); 
        }
    }
}

function validarSenhas($data){
    if ($data['password'] != $data['password2']) {
        return false;
    } else {
        return true;
    }   
}

function isEmpty(){
    foreach($_POST as $item){
        if(empty($item) && $item != $_POST["botaoCadastro"]){
            return true;
        }
    }
    return false;
}
?>