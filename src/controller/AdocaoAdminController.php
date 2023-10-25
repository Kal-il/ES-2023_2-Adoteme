<?php

include 'JWTController.php';
require_once 'Controller.php';

use controller\Controller;

class AdocaoAdminController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function getAdocoes(){
        $adocoes = $this->adocao_model->GetAdocoes($this->connection);

        return $adocoes;
    }

    public function getAdocaoById($data){
        $adocao = $this->adocao_model->getAdocaoById($this->connection, $data);

        return $adocao;
    }

    public function updateSituacaoAdocao($data){
        $this->adocao_model->UpdateSituacaoAdocao($this->connection, $data);
    }
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $adocao_controller = new AdocaoAdminController();
    $adocoes = $adocao_controller->getAdocoes();
}

?>