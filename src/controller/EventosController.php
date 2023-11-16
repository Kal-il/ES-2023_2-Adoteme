<?php
namespace controller;
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


class EventosController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public static function gerenciar_eventos() {

        if (($_SERVER["REQUEST_METHOD"] == "POST")){
            if (isset($_POST["cadastrar"])) {
                $path = 'eventos/';
                $pasta = $path . $_FILES["foto"]["name"][0];
                $fileDestination = '..\view\pages\pagesAdmin\eventos/' .  $_FILES["foto"]["name"][0];
                move_uploaded_file(
                    $_FILES["foto"]["tmp_name"][0],
                    $fileDestination
                );
                $imagePath = $pasta;
                $data = [
                    "nome" => $_POST['nome'],
                    "foto" => $_POST['foto'],
                ];
                $eventosController = new EventosController();
                $eventosController->createEventos($data);
            }
        
        }
        
    }
    public static function formulario_cadastro_evento() {
		include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/CadastroEventos.php';
	}

    public static function createEventos($data) {
       $resultado = $this->eventos_model->createEventos($this->$connection, $data);
       if($resultado){
            include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/ListarEventos.php';
       }else{
            echo "Erro ao cadastrar evento!";
       }
    }

    public static function getEventos() {
        include $_SERVER['DOCUMENT_ROOT'] . "/src/view/pages/ListarEventos.php";
        $eventos = new EventosController();

		$allEventos = $eventos->eventos_model->getEventos($eventos->connection);
        return $allEventos;
    }

    public static function deleteEventos($id) {
        $resultado = $this->eventos_model->deleteEventos($this->$connection, $id);
        if($resultado){
            include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/pagesAdmin/AtualizarGato.php';
        }else{
            echo "Erro ao deletar evento!";
        }
    }

    public static function editEventos() {
        if (isset($_POST["botaoEditarEvento"])) {
            $id = explode('/', $_SERVER['REQUEST_URI'])[3];
            $eventos = $this->$eventos_model->editEventos($this->$connection, $id);
            return $eventos;
        }
}
}

?>