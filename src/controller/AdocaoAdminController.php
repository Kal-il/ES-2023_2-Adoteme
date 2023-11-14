<?php

namespace controller;

include 'JWTController.php';
require_once 'Controller.php';

use controller\Controller;

class AdocaoAdminController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function getAdocoes(){
        $adocoes = $this->adocao_model->GetAdocoesComNome($this->connection);

        return $adocoes;
    }

    public function getAdocaoById($data){
        $adocao = $this->adocao_model->getAdocaoById($this->connection, $data);

        return $adocao;
    }

    public function updateSituacaoAdocao($data){
        $this->adocao_model->UpdateSituacaoAdocao($this->connection, $data);
    }

    public static function listar_adocoes(){
        $adocao_controller = new AdocaoAdminController();
    
        $adocoes = $adocao_controller->getAdocoes();
        include __DIR__ . "/../view/pages/pagesAdmin/AcompanhamentoPageAdmin.php";
    }

    public static function rejeitar_adocao() {
		include 'JWTController.php';

        $id_adocao = explode('/', $_SERVER['REQUEST_URI'])[4];
        $adocao_controller = new AdocaoAdminController();
        $adocao = $adocao_controller->getAdocaoById($id_adocao);

        $adocao['situacao'] = 'rejeitado';
        $adocao['admin_id'] = $decoded_array['user_id'];

        $adocao_controller->updateSituacaoAdocao($adocao);

        header("Location: /admin/adocoes");
    }

    public static function aprovar_adocao() {
		include 'JWTController.php';

        $id_adocao = explode('/', $_SERVER['REQUEST_URI'])[4];
        $adocao_controller = new AdocaoAdminController();
        $adocao = $adocao_controller->getAdocaoById($id_adocao);

        $adocao['situacao'] = 'aprovado';
        $adocao['admin_id'] = $decoded_array['user_id'];

        $adocao_controller->updateSituacaoAdocao($adocao);

        header("Location: /admin/adocoes");
    }
}

?>
