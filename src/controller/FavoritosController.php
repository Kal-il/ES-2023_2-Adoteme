<?php

namespace controller;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

function checkUser($user_id){
    $favoritosController = new FavoritosController();
    $favoritos = $favoritosController->getUserFavoritos($user_id);   
    return $favoritos;
}




class FavoritosController extends Controller {
    public function __construct(){
        parent::__construct();
    }

	public static function gerenciar_favoritos() {
		# Processa requisição AJAX
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				error_reporting(E_ALL);
				ini_set('display_errors', 1);
				$data = [
					"usuario_id" => $_POST['user_id'],
					"gato_id" => $_POST['id_gato']
				];
			   
			  $favoritosController = new FavoritosController();
			  $existefavoritos = $favoritosController->getFavoritos($data);
		  
			  if (isset($_POST["addFavoritos"]) && empty($existeFavoritos)) {
				$favoritosController->addFavoritos($data);
			} else {
				$favoritosController->deleteFavoritos($data);
			}
		}
	}

	public static function carregar_favoritos() {
		include 'JWTController.php';

		$favoritos = array();
		$favoritos = new FavoritosController();
		$favoritos = $favoritos->getAllDataFavoritosByUserId($user_id);

		include $_SERVER['DOCUMENT_ROOT'] . "/src/view/pages/FavoritosPage.php";
	}

    public function addFavoritos($data) {
        $this->favoritos_model->addFavoritos($this->connection, $data);
    }

    public function getFavoritos($data) {
        $favoritos = $this->favoritos_model->getFavoritos($this->connection, $data);
        return $favoritos;
    }

    public function deleteFavoritos($data) {
        $this->favoritos_model->deleteFavoritos($this->connection, $data);
    }

    public function getUserFavoritos($data) {
        $favoritos = $this->favoritos_model->getFavoritosByUserId($this->connection, $data);

        return $favoritos;
    }

    public function checkUser($user_id){
        $favoritos = $this->getUserFavoritos($user_id);  

        return $favoritos;
    }

    public function getAllDataFavoritosByUserId($data) {
        $favoritos = $this->favoritos_model->getFavoritosByUserId($this->connection, $data);
        $dataGatos = array();  
    
        foreach($favoritos as $favorito){
            $gatoId = $favorito['gato_id'];
            $gatoData = $this->gatos_model->getGatoById($this->connection, $gatoId);
            $dataGatos[] = $gatoData;
        }

        return $dataGatos;
    }
}



?>
