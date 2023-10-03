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
            
            $connection = new Connection;
            $connection = $connection->getConnection();
            
            $gatoModel = new GatosModel();
            $gatoData = $gatoModel->getGatoById($connection, $gatoID);
                        
            if ($gatoData) {
                $gatoData['nome'] = $_POST['nome'];
                $gatoData['dataNascimento'] = $_POST['data_nascimento'];
                $gatoData['sexo'] = $_POST['sexo'];
                $gatoData['cor'] = $_POST['cor'];
                $gatoData['outraCor'] = $_POST['outraCor'];
                $gatoData['descricao'] = $_POST['descricao'];
                $gatoData['castrado'] = $_POST['castrado'];
                $gatoData['vacinacaoCompleta'] = $_POST['vacinacaoCompleta'];
                $gatoData['infoVacina'] = $_POST['infoVacina'];
                $gatoData['personalidades'] = $_POST['personalidades'];
                
                $resultado = $gatoModel->UpdateGato($connection, $gatoData);
                
                if ($resultado) {
                    header("Location: ../../view/pages/pagesAdmin/TabelaGato.php");
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