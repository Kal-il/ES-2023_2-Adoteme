<?php

include 'AdocaoAdminController.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET['id'])){
        $id_adocao = $_GET['id'];
        $adocao_controller = new AdocaoAdminController();
        $adocao = $adocao_controller->getAdocaoById($id_adocao);

        $adocao['situacao'] = 'aprovado';
        $adocao['admin_id'] = $decoded_array['user_id'];

        $adocao_controller->updateSituacaoAdocao($adocao);

        header("Location: ../view/pages/pagesAdmin/AcompanhamentoPageAdmin.php");
    }
}

?>