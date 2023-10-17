<?php
namespace controller;

require_once __DIR__.'..\..\models\Connection.php';
require_once __DIR__.'..\..\models\GatosModel.php';

use models\Connection;
use models\GatosModel;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["search"])) {
        $data = $_POST["search"];
        $homePageController = new HomePageController();
        $gatosInfo = $homePageController->searchGato($data);

        if (!$gatosInfo) {
            $erro = "Nenhum gato encontrado com essa informação";
            $erro_encode = json_encode($erro);
            header("Location: ../view/pages/HomePage.php?erro=$erro_encode");
        } else {
            session_start();
            $_SESSION['search_resultados'] = $gatosInfo;
            header("Location: ../view/pages/HomePage.php");
 
        }
    }
}

class HomePageController{

    function infoHomeGatos(){
        $connection = new Connection();
        $connection = $connection->getConnection();
        $gatos = new GatosModel();
        $gatosInfo = $gatos->ListarGatos($connection);
        return $gatosInfo;
    }

    // function infoHomeGatosAdotados(){
    //     $connection = new Connection();
    //     $connection = $connection->getConnection();
    //     $gatos = new GatosModel();
    //     $gatosInfo = $gatos->ListarGatosAdotados($connection);
    //     return $gatosInfo;
    // }

    function searchGato($data){
        $connection = new Connection();
        $connection = $connection->getConnection();
        $gatos = new GatosModel();
        $gatosInfo = $gatos->SearchGato($connection, $data);

        if ($gatosInfo) 
            return $gatosInfo;
        return false;
           
    }


}