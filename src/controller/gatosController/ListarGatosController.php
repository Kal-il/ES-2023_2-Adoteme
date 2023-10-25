<?php

    namespace controller\gatosController;

    require_once('C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\Connection.php');
    require_once('C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\GatosModel.php');


    use models\Connection;
    use models\GatosModel;

    $connection = new Connection();
    $pdo = $connection->getConnection();

    $gatosModel = new GatosModel();

    $gatos = $gatosModel->ListarGatos($pdo);
    
    
?>