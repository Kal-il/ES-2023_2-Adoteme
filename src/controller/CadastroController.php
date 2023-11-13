<?php

namespace controller;

class CadastroController extends Controller {
    public function __construct(){
        parent::__construct();
    }

    public static function carregar_cadastro() {
        session_start();

        include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/SinginPage.php";
    }

    public static function processar_cadastro() {
        session_start();
        $cadastro_controller = new CadastroController();

        if(isset($_POST["botaoCadastro"])){
            if(!$cadastro_controller->isEmpty($_POST)){

                $data = [
                    "email" => $_POST['email'],
                    "password" => $_POST['password'],
                    "password2" => $_POST['password2'],
                    "nome" => $_POST['name'],
                    "sobrenome" => $_POST['surname'],
                    "cpf" => $_POST['cpf'],
                    "telefone" => $_POST['telephone'],
                    "cep" => $_POST['cep'],
                    "endereco" => $_POST['adress'], 
                    "cidade" => $_POST['city'],
                    "estado" => $_POST['state'],
                    "matricula" => $_POST['enrollment'],
                    "data_nascimento" => $_POST['birthday']
                ];
                $validacao = true;

                $erros = [];
    
                if(!$cadastro_controller->validarSenhas($data)){
                    $erros['senha'] = "As senhas não são iguais.";
                   
                    $validacao = false;
                }
    
                if(!$cadastro_controller->user_model->CheckUserByEmail($cadastro_controller->connection, $data['email'])){
                    $erros['email'] = "Este e-mail já está cadastrado";

                    $validacao = false;
                }
    
                if(!$cadastro_controller->user_model->CheckUserByCPF($cadastro_controller->connection, $data['cpf'])){
                    $erros['cpf'] = "Este CPF já está cadastrado";

                    $validacao = false;
                }
    
                if(!$cadastro_controller->user_model->CheckUserByMatricula($cadastro_controller->connection, $data['matricula'])){
                    $erros['matricula'] = "Este número de matrícula já está cadastrado";

                    $validacao = false;
                }
    
                if($validacao){
                    $resultado = $cadastro_controller->user_model->CreateUser($cadastro_controller->connection, $data);
                    
                    if($resultado){
                        header("Location: /login");
                    } else {
                        echo "<h1> Query inválida </h1>";
                    }
                } else {
                    $_SESSION['erros'] = $erros;

                    header("Location: /cadastrar"); 
    
                }
            } else {
                $_SESSION['erro'] = "Preencha todos os campos";

                header("Location: /cadastrar"); 
            }
        }
    }

    public function validarSenhas($data){
        if ($data['password'] != $data['password2']) {
            return false;
        } else {
            return true;
        }   
    }
    
    public function isEmpty(){
        foreach($_POST as $item){
            if(empty($item) && $item != $_POST["botaoCadastro"]){
                return true;
            }
        }
        return false;
    }
}

?>