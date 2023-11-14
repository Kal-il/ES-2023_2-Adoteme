<?php 

namespace controller;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

class AdocaoController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public static function carregar_adocoes() {
        include 'JWTController.php';
        $adocao_controller = new AdocaoController();

		$gato_id = explode('/', $_SERVER['REQUEST_URI'])[2];

		$data = [
			"id_adotante" => $user_id,
			"id_gato" => $gato_id,
		];

		$adocao_controller->addAdocao($data);

		header("Location: /adocoes");

        $adocoes = $adocao_controller->getAdocoes($user_id);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/AcompanhamentoPage.php";
    }

    public function addAdocao($data){
        $this->adocao_model->CreateAdocao($this->connection, $data);
    }

    public function getAdocoes($data){
        $adocoes = $this->adocao_model->GetAdocoesByUsuario($this->connection, $data);
        return $adocoes;
    }
}

?>
