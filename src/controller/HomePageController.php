<?php

namespace controller;

require __DIR__ . '/../../vendor/autoload.php';

use controller\FavoritosController;

class HomePageController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public static function carregar_home(){
        include 'JWTController.php';

        $flag = false;

        $favoritos_controller = new FavoritosController();

        $favoritos = array();
        $favoritos = $favoritos_controller->checkUser($user_id);

        if (!isset($_SESSION)) {
            session_start();
        } else {
            session_destroy();
            session_start();
        }
        $data = array();

        if (isset($_SESSION['search_resultados'])) {
            $data = $_SESSION['search_resultados'];
            unset($_SESSION['search_resultados']);
        } elseif (isset($_SESSION['filtragem'])) {
            $data = $_SESSION['filtragem'];
            unset($_SESSION['filtragem']);
        } else {
            $homePage = new HomePageController();
            $data = $homePage->infoHomeGatos();
        }

        include __DIR__ . "/../view/pages/HomePage.php";
    }

	public static function carregar_home_admin() {
		include 'JWTController.php';

		include $_SERVER['DOCUMENT_ROOT'] . "/src/view/pages/pagesAdmin/HomePageAdmin.php";
	}

    public static function pesquisar_gatos(){
        session_start();
        if (isset($_POST["search"])) {
            $data = $_POST["search"];

            $homePageController = new HomePageController();
            $gatosInfo = $homePageController->searchGato($data);
    
            if (!$gatosInfo) {
                $_SESSION['erro'] = "Nenhum gato encontrado com essa informação";

                header("Location: /");
            } else {
                $_SESSION['search_resultados'] = $gatosInfo;

                header("Location: /");
            }
        }

        if (isset($_POST["filtrar"])){
            $data = $_POST["filtros"];

            foreach ($data as $campo) {
                echo "Valor selecionado: " . $campo . "<br>";
            }

            $homePageController = new HomePageController();
            $filtrosGatos = $homePageController->filtrarGato($data);

            if (!$filtrosGatos) {
                $_SESSION['erro'] = "Nenhum gato encontrado com essa informação";

                header("Location: /");
            } else {
                $_SESSION['filtragem'] = $filtrosGatos;

                header("Location: /");
     
            }
        }
    }

    function infoHomeGatos(){
        $gatosInfo = $this->gatos_model->ListarGatos($this->connection);

        return $gatosInfo;
    }
    
    function searchGato($data){
        $gatosInfo = $this->gatos_model->SearchGato($this->connection, $data);

        if ($gatosInfo) 
            return $gatosInfo;
        return false;
           
    }
    function filtrarGato($data){ 
        $gatosInfo = $this->gatos_model->FilterGato($this->connection, $data);

        if ($gatosInfo) 
            return $gatosInfo;
        return false;
    }
}
