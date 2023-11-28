<?php
namespace controller;

class EventosController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public static function gerenciar_eventos() {

        if (($_SERVER["REQUEST_METHOD"] == "POST")){
            if (isset($_POST["cadastrar"])) {
                $path = 'eventos/';
                $pasta = $path . $_FILES["foto"]["name"];
                $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/pagesAdmin/eventos/' . $_FILES["foto"]["name"];

                move_uploaded_file(
                    $_FILES["foto"]["tmp_name"],
                    $fileDestination
                );
                $imagePath = $pasta;
                $data = [
                    "nome" => $_POST['nome'],
                    "foto" => $imagePath,
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
		$eventos = new EventosController();

       $resultado = $eventos->eventos_model->createEventos($eventos->connection, $data);
       if($resultado){
            header("Location: /eventos/");
       }else{
            echo "Erro ao cadastrar evento!";
       }
    }

    public static function getEventos() {
        $eventos = new EventosController();
		$allEventos = $eventos->eventos_model->getEventos($eventos->connection);
        include $_SERVER['DOCUMENT_ROOT'] . "/src/view/pages/ListarEventos.php";
       
    }

    public static function deleteEventos() {
        $id = explode('/', $_SERVER['REQUEST_URI'])[3];
        $eventos = new EventosController();
        $resultado =  $eventos->eventos_model->deleteEventos($eventos->connection, $id);
        if($resultado){
            header("Location: /eventos/");
        }else{
            echo "Erro ao deletar evento!";
        }
    }

    public static function editEventos() {
        if (isset($_POST["editar"])) {
            
            $id = explode('/', $_SERVER['REQUEST_URI'])[4];
            echo $id;
            $eventos = new EventosController();
            $resultado =  $eventos->eventos_model->getEventosById($eventos->connection, $id);
            var_dump($resultado);
     
            $resultado[0]["nome"] = $_POST['nome'];
            if($_FILES["foto"]["name"] != ""){
                $path = 'eventos/';
                $pasta = $path . $_FILES["foto"]["name"];
                $fileDestination = 'C:\xampp\htdocs\ES-2023_2-Adoteme\src\view\pages\pagesAdmin\eventos/' . $_FILES["foto"]["name"];
    
                move_uploaded_file(
                    $_FILES["foto"]["tmp_name"],
                    $fileDestination
                );
                $imagePath = $pasta;
                $resultado[0]["foto"] = $imagePath;
            }
            $resultado[0]['id'] = $id;
            var_dump ($resultado);
            $deuceurto = $eventos->eventos_model->editEventos($eventos->connection, $resultado);
            
            if($deuceurto){
                header("Location: /eventos/");
            }else{
                echo "Erro ao editar evento!";
            }
            
        }
    }
    
    public static function formulario_edicao_evento() {
        $id = explode('/', $_SERVER['REQUEST_URI'])[3];
        $eventos = new EventosController();
        $resultado =  $eventos->eventos_model->getEventosById($eventos->connection, $id);
        var_dump($resultado);
        include $_SERVER['DOCUMENT_ROOT'] . "/src/view/pages/EditarEventos.php";
   
}
}

?>
