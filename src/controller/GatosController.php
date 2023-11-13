<?php

namespace controller;

class GatosController extends Controller {
    public function __construct(){
        parent::__construct();
    }

    public static function visualizar_gato() {
        $gatoId = explode('/', $_SERVER["REQUEST_URI"])[2];

        $gatos_controller = new GatosController();

        $gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gatoId);
        $gatoData['id'] = $gatoId;

        include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/VisualizarGato.php";
    }
}

?>