<?php
namespace controller;

require_once __DIR__.'..\..\models\Connection.php';
require_once __DIR__.'..\..\models\GatosModel.php';

use models\Connection;
use models\GatosModel;


class HomePageController{


    function infoHomeGatos(){
        $connection = new Connection();
        $connection = $connection->getConnection();
        $gatos = new GatosModel();
        $gatosInfo = $gatos->ListarGatos($connection);
        return $gatosInfo;
    }
}