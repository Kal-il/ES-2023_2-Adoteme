<?php
namespace controller;

require_once '../models/Connection.php';
require_once '../models/FavoritosModel.php';


use models\Connection;
use models\FavoritosModel;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addFavoritos"])) {
        $data = [
            "usuario_id" => $_POST['user_id'],
            "gato_id" => $_POST['id_gato']
        ];
        var_dump($data);
        $favoritosController = new FavoritosController();
        $favoritosController->addFavoritos($data);
    } else {
        $data = [
            "usuario_id" => $_POST['user_id'],
            "gato_id" => $_POST['id_gato']
        ];
        $favoritosController = new FavoritosController();
        $favoritosController->deleteFavoritos($data);
    }
}

class FavoritosController {
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
}
?>
