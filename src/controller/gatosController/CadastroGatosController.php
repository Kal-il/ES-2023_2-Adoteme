<?php

require_once '../models/Connection.php';
require_once '../models/UserModel.php';
require_once '../models/GatoModel.php';

use models\Connection;
use models\UserModel;
use models\GatosModel;

if($_SERVER["REQUEST_METHOD"] == "POST" ){
    if(isset($_POST["botaoCadastroGato"])){
        if(isEmpty($_POST)){
    
            $data = [
                "nome" => $nome = $_POST['nome'],
                "dataNascimento" => $dataNascimento = $_POST['data_nascimento'],
                "sexo" => $sexo = $_POST['sexo'],
                "cor" => $cor = $_POST['cor'],
                "outraCor" => $outraCor = isset($_POST['outraCor']) ? $_POST['outraCor'] : null,
                "descricao" => $descricao = $_POST['descricao'],
                "castrado" => $castrado = isset($_POST['castrado']) ? true : false,
                "vacinacaoCompleta" => $vacinaCompleta = isset($_POST['vacina_completa']) ? true : false,
                "infoVacina" => $infoVacina = isset($_POST['info_vacina']) ? $_POST['info_vacina'] : null,
                "personalidades" => $personalidades = isset($_POST['personalidades']) ? $_POST['personalidades'] : [],
            ];
            
            if(validarCadastroGato($data)){
                $connection = new Connection;
                $connection = $connection->getConnection();
    
                $gato = new GatosModel();
                $resultado = $gato->CreateGato($connection, $data);
    
                if($resultado){
                    header("Location: ../view/pages/LoginPage.php");
                } else {
                    echo "<h1> Query inválida </h1>";
                }
            } else {
                $erros = [];

                $erros[] = "As senhas não são iguais.";
        
                $erros_encoded = urlencode(json_encode($erros));
                
                header("Location: ../view/pages/SinginPage.php?erros=$erros_encoded");
            }
        }
    }
}


function validarCadastroGato($data){

    // TODO: IMPLEMENTAR VALIDAÇÃO DE CADASTRO DE GATO
        
}


function isEmpty(){
    foreach($_POST as $item){
        if(empty($item) && $item != $_POST["botaoCadastroGato"]){
            return false;
        }
    }
    return true;
}
?>