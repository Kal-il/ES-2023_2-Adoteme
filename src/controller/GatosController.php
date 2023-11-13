<?php

namespace controller;

class GatosController extends Controller {
    public function __construct(){
        parent::__construct();
    }

	public static function visualizar_gato() {
		include 'JWTController.php';
        $gatoId = explode('/', $_SERVER["REQUEST_URI"])[2];

		if ($user_id == 0) {
			$redirect = "/login";
		} else {
			$redirect = "/gatos/adotar/$gatoId";
		}

        $gatos_controller = new GatosController();

        $gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gatoId);
        $gatoData['id'] = $gatoId;

        include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/VisualizarGato.php";
    }

	public static function visualizar_gato_admin() {
		include 'JWTController.php';
        $gatoId = explode('/', $_SERVER["REQUEST_URI"])[4];

        $gatos_controller = new GatosController();
        $gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gatoId);
        $gatoData['id'] = $gatoId;
        include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/pagesAdmin/DetailedView.php";
	}

	public static function editar_gato() {
		$gatos_controller = new GatosController();
        $gatoId = explode('/', $_SERVER["REQUEST_URI"])[4];

        $gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gatoId);
        $gatoData['id'] = $gatoId;
              
        if ($gatoData) {
            $dataEncode = urlencode(json_encode($gatoData));
            header("Location: ../../view/pages/pagesAdmin/AtualizarGato.php?data=$dataEncode");
        } else {
            echo "Gato não encontrado.";
        }
	}

	public static function listar_gatos() {
		$gatos_controller = new GatosController();

		$gatos = $gatos_controller->gatos_model->ListarGatos($gatos_controller->connection);

		include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/pagesAdmin/TabelaAnimais.php';
	}
}
