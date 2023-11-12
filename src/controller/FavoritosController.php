<?php
namespace controller;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Connection.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'FavoritosModel.php';


use models\Connection;
use models\FavoritosModel;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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


class FavoritosController extends Controller {
    public function __construct(){
        parent::__construct();
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
}
?>
