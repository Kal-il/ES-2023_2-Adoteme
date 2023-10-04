<?php

namespace controller\gatosController;

require_once '../../models/Connection.php';
require_once '../../models/GatosModel.php';

use models\Connection;
use models\GatosModel;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $gatoId = $_GET['id'];

        $connection = new Connection;
        $connection = $connection->getConnection();

        $gato = new GatosModel();
        $resultado = $gato->DeleteGato($connection, $gatoId);

        if($resultado){
            header("Location: ../../view/pages/pagesAdmin/TabelaAnimais.php");
        } else {
            echo "<h1>Query inválida</h1>";
        }
    }
}

?>