<?php

namespace controller;

require_once '../models/Connection.php';
require_once '../models/UserModel.php';
require_once '../models/GatosModel.php';
require_once '../models/FavoritosModel.php';
require_once '../models/FormularioModel.php';

use models\Connection;
use models\UserModel;
use models\GatosModel;
use models\FavoritosModel;
use models\FormularioModel;

class Controller{
    public $connection;
    public $user_model;
    public $gatos_model;
    public $favoritos_model;
    public $formulario_model;

    public function __construct(){
        $this->connection = new Connection();
        $this->connection = $this->connection->getConnection();

        $this->user_model = new UserModel();
        $this->gatos_model = new GatosModel();
        $this->favortios_model = new FavoritosModel();
        $this->formulario_model = new FormularioModel();
    }
}

?>