<?php

namespace controller;

require_once 'C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\Connection.php';
require_once 'C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\UserModel.php';
require_once 'C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\GatosModel.php';
require_once 'C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\FavoritosModel.php';
require_once 'C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\FormularioModel.php';
require_once 'C:\xampp\htdocs\ES-2023_2-Adoteme\src\models\AdocaoModel.php';

use models\Connection;
use models\UserModel;
use models\GatosModel;
use models\FavoritosModel;
use models\FormularioModel;
use models\AdocaoModel;

class Controller{
    public $connection;
    public $user_model;
    public $gatos_model;
    public $favoritos_model;
    public $formulario_model;
    public $adocao_model;

    public function __construct(){
        $this->connection = new Connection();
        $this->connection = $this->connection->getConnection();

        $this->user_model = new UserModel();
        $this->gatos_model = new GatosModel();
        $this->favoritos_model = new FavoritosModel();
        $this->formulario_model = new FormularioModel();
        $this->adocao_model = new AdocaoModel();
    }
}

?>