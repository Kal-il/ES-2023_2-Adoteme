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
        $gatoData = $gato->getGatoById($connection, $gatoId);
        $gatoData['id'] = $gatoId;
              
        if ($gatoData) {
            $dataEncode = urlencode(json_encode($gatoData));
            header("Location: ../../view/pages/pagesAdmin/AtualizarGato.php?data=$dataEncode");
        } else {
            echo "Gato não encontrado.";
        }

    }

}
?>
