<?php

namespace controller\gatosController;

require_once '../../models/Connection.php';
require_once '../../models/GatosModel.php';

use models\Connection;
use models\GatosModel;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["botaoAtualizarGato"])) {
        if (isset($_GET['id'])) {
            $gatoID = $_GET['id'];
            echo "<h1>" . $gatoID . "</h1>";
            
            $connection = new Connection;
            $connection = $connection->getConnection();
            
            $gatoModel = new GatosModel();
            $gatoData = $gatoModel->getGatoById($connection, $gatoID);
                        
            if ($gatoData) {
                $gatoData['nome'] = $_POST['nome'];
                $gatoData['dataNascimento'] = $_POST['data_nascimento'];
                $gatoData['sexo'] = $_POST['sexo'];
                $gatoData['cor'] = $_POST['cor'];
                $gatoData['descricao'] = $_POST['descricao'];

                if(!strcmp($_POST['castrado'], "on")){
                    $gatoData['castrado'] = 1;
                } else {
                    $gatoData['castrado'] = 0;
                }
                
                if(!strcmp($_POST['vacina_completa'], "on")){
                    $gatoData['vacinacaoCompleta'] = 1;
                } else {
                    $gatoData['vacinacaoCompleta'] = 0;
                }
                
                $gatoData['infoVacina'] = $_POST['info_vacina'];
                $gatoData['personalidades'] = $_POST['personalidades'];
                
                $resultado = $gatoModel->UpdateGato($connection, $gatoData);
                
                if ($resultado) {
                    header("Location: ../../view/pages/pagesAdmin/TabelaAnimais.php");
                } else {
                    echo "<h1>Erro ao atualizar o gato.</h1>";
                }
            } else {
                echo "<h1>Gato não encontrado.</h1>";
            }
        } else {
            echo "<h1>ID do gato não especificado.</h1>";
        }
    }
}
?>