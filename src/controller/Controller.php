<?php

namespace controller;

require 'vendor/autoload.php';

use models\Connection;
use models\UserModel;
use models\GatosModel;
use models\FavoritosModel;
use models\FormularioModel;
use models\AdocaoModel;

class Controller{
    /*     
    Esta classe contém toda conexão da camada controller com a camada models. 
    Toda classe da camada controller deve herdar desta classe e chamar sua função construtora. 
    */
    
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
