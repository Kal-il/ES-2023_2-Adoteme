<?php

namespace controller\gatosController;


require_once '../../models/Connection.php';
require_once '../../models/GatosModel.php';

use models\Connection;
use models\GatosModel;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['botaoEditarGato'])){

            var_dump($_POST);
            $connection = new Connection;
            $connection = $connection->getConnection();
            
            // $gato = new GatosModel(); 
            // $resultado = $gato->CreateGato($connection, $data);


    }
}