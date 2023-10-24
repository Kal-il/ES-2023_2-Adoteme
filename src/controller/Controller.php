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
    private $connection;
    private $user_model;
    private $gatos_model;
    private $favoritos_model;
    private $formulario_model;

    public function _construct(){
        $this->connection = new Connection();
        $this->connection = $this->connection->getConnection();

        $this->user_model = new UserModel();
        $this->gatos_model = new GatosModel();
        $this->favortios_model = new FavoritosModel();
        $this->formulario_model = new FormularioModel();
    }
}

?>