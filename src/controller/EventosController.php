<?php

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

class EventosController {

    public function createEventos($data) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $eventos = new EventosModel();
        $eventos->createEventos($connection, $data);
    }

    public function getEventos() {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $eventos = new EventosModel();
        $eventos = $eventos->getEventos($connection);
        return $eventos;
    }

    public function deleteEventos($id) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $eventos = new EventosModel();
        $eventos->deleteEventos($connection, $id);
    }

    public function editEventos($id) {
        $connection = new Connection();
        $connection = $connection->getConnection();
        $eventos = new EventosModel();
        $eventos = $eventos->editEventos($connection, $id);
        return $eventos;
    }
}

?>