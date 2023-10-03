<?php

    namespace controller\gatosController;

    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\src\models\Connection.php');
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\src\models\GatosModel.php');


    use models\Connection;
    use models\GatosModel;

    $connection = new Connection();
    $pdo = $connection->getConnection();

    $gatosModel = new GatosModel();

    $gatos = $gatosModel->ListarGatos($pdo);

?>