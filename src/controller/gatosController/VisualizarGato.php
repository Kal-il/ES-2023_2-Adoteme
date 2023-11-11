<?php

namespace controller\gatosController;

require_once('C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\Connection.php');
require_once('C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\GatosModel.php');

use models\Connection;
use models\GatosModel;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $gatoId = explode('/', $_SERVER["REQUEST_URI"])[2];

        $connection = new Connection;
        $connection = $connection->getConnection();

        $gato = new GatosModel();
        $gatoData = $gato->getGatoById($connection, $gatoId);
        $gatoData['id'] = $gatoId;
}

?>