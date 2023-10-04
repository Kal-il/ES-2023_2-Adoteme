<?php

namespace controller\gatosController;

require_once('C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\Connection.php');
require_once('C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\GatosModel.php');

use models\Connection;
use models\GatosModel;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $gatoId = $_GET['id'];

        $connection = new Connection;
        $connection = $connection->getConnection();

        $gato = new GatosModel();
        $gatoData = $gato->getGatoById($connection, $gatoId);
        $gatoData['id'] = $gatoId;
    }
}

?>