<?php 

include 'JWTController.php';
require_once 'Controller.php';

use controller\Controller;

class AdocaoController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function addAdocao($data){
        $this->adocao_model->CreateAdocao($this->connection, $data);
    }

    public function getAdocoes($data){
        $adocoes = $this->adocao_model->GetAdocoesByUsuario($this->connection, $data);
        return $adocoes;
    }
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $adocao_controller = new AdocaoController();

    if(isset($_GET['id'])){
        $data = [
            "id_adotante" => $decoded_array['user_id'],
            "id_gato" => $_GET['id'],
        ];

        $adocao_controller->addAdocao($data);

        header("Location: ../view/pages/AcompanhamentoPage.php");
    } else {
        $adocoes = $adocao_controller->getAdocoes($decoded_array['user_id']);
    }
}



?>