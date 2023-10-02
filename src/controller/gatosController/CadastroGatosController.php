<?php

namespace controller\gatosController;


require_once '../../models/Connection.php';
require_once '../../models/GatosModel.php';

use models\Connection;
use models\GatosModel;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["botaoCadastroGato"])){
  
        $imagesPath = []; 
        $i = 0;

        // TODO: VERIFICAR TAMANHO IMAGENS
        // TODO: VERIFICAR QUANTIDADE DE  IMAGENS
         

        foreach ($_FILES["fotos"]["error"] as $key => $error) {
        
            $path = "../../view/pages/pagesAdmin/uploads/";
            $pasta = $path . $_FILES["fotos"]["name"][$i];
            $imagesPath["foto" . ($i + 1)] = $pasta;
            move_uploaded_file(
                $_FILES["fotos"]["tmp_name"][$i],
                $pasta 
            );

            ++$i;
        }

        $data = [
            "nome" => $_POST['nome'],
            "dataNascimento" => $_POST['data_nascimento'],
            "sexo" => $_POST['sexo'],
            "cor" => $_POST['cor'],
            "outraCor" => isset($_POST['outraCor']) ? $_POST['outraCor'] : null,
            "descricao" => $_POST['descricao'],
            "castrado" => isset($_POST['castrado']) ? true : false,
            "vacinacaoCompleta" => isset($_POST['vacina_completa']) ? true : false,
            "infoVacina" => isset($_POST['info_vacina']) ? $_POST['info_vacina'] : null,
            "personalidades" => isset($_POST['personalidades']) ? $_POST['personalidades'] : [],
        ];
        

        $erros = validarCadastroGato($data);    
        $data["foto1_url"] = $imagesPath["foto1"];
        $data["foto2_url"] = $imagesPath["foto2"];
        $data["foto3_url"] = $imagesPath["foto3"];
   
        var_dump($data);

        if (empty($erros)) {

            $connection = new Connection;
            $connection = $connection->getConnection();
            
            $gato = new GatosModel(); 
            $resultado = $gato->CreateGato($connection, $data);

            if ($resultado) {
               header("Location: ../../view/pages/pagesAdmin/HomePageAdmin.php");
            } else {
                echo "<h1>Query inválida</h1>";
            }
        } else {
                $erros_encoded = urlencode(json_encode($erros));
                header("Location: ../../view/pages/pagesAdmin/CadastrarGato.php?erros=$erros_encoded");
          
        }
    }
}

function validarCadastroGato($data)
{
    $erros = [];

    if ($data["cor"] == "outra" && empty($data["outraCor"])) {
        $erros[] = "Você deve especificar a cor do gato.";
    }

    if (!($data["vacinacaoCompleta"]) && empty($data["infoVacina"])) {
        $erros[] = "Você deve especificar as informações da vacinação do gato.";
    }

    if (!is_array($data["personalidades"]) || count($data["personalidades"]) < 2) {
        $erros[] = "Você deve selecionar pelo menos duas personalidades para o gato.";
    }
    if (strlen($data["descricao"]) > 350) {
        $erros[] = "A descrição do gato deve ter no máximo 350 caracteres.";
    }
    if(strlen($data["nome"]) > 50){
        $erros[] = "O nome do gato deve ter no máximo 50 caracteres.";
    }
    if(strlen($data["outraCor"]) > 20){
        $erros[] = "A cor do gato deve ter no máximo 20 caracteres.";
    }
    if(strlen($data["infoVacina"]) > 350){
        $erros[] = "A cor do gato deve ter no máximo 350 caracteres.";
    }

    return $erros;
}


