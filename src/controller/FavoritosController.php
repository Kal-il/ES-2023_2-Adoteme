<?php
namespace controller;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Connection.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'FavoritosModel.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'GatosModel.php';
 

use models\Connection;
use models\FavoritosModel;
use models\GatosModel;

function checkUser($user_id){
    $favoritosController = new FavoritosController();
    $favoritos = $favoritosController->getUserFavoritos($user_id);   
    return $favoritos;
}

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

class FavoritosController {
    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);
        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }
        return $resultado;
    }

    public function addFavoritos($data) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $favoritos = new FavoritosModel();
        $favoritos->addFavoritos($connection, $data);
    }

    public function getFavoritos($data) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $favoritos = new FavoritosModel();
        $favoritos = $favoritos->getFavoritos($connection, $data);
        return $favoritos;
    }

    public function deleteFavoritos($data) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $favoritos = new FavoritosModel();
        $favoritos->deleteFavoritos($connection, $data);
    }

    public function getUserFavoritos($data) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $favoritos = new FavoritosModel();
        $favoritos = $favoritos->getFavoritosByUserId($connection, $data);
        return $favoritos;
    }

    public function getAllDataFavoritosByUserId($data) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $favoritos = new FavoritosModel();
        $favoritos = $favoritos->getFavoritosByUserId($connection, $data);
        $dataGatos = array();  
    
        foreach($favoritos as $favorito){
            $gatoId = $favorito['gato_id'];
            $gatoData = (new GatosModel())->getGatoById($connection, $gatoId);
            $dataGatos[] = $gatoData;
        }

        return $dataGatos;
    }
}
?>
