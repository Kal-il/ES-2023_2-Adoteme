<?php

namespace controller;

class HomePageController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    function infoHomeGatos(){
        $gatosInfo = $this->gatos_model->ListarGatos($this->connection);

        return $gatosInfo;
    }
    
    function searchGato($data){
        $gatosInfo = $this->gatos_model->SearchGato($this->connection, $data);

        if ($gatosInfo) 
            return $gatosInfo;
        return false;
           
    }
    function filtrarGato($data){ 
        $gatosInfo = $this->gatos_model->FilterGato($this->connection, $data);

        if ($gatosInfo) 
            return $gatosInfo;
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_POST["search"])) {
        $data = $_POST["search"];
        $homePageController = new HomePageController();
        $gatosInfo = $homePageController->searchGato($data);

        if (!$gatosInfo) {
            $_SESSION['erro'] = "Nenhum gato encontrado com essa informação";
            header("Location: /");
        } else {
            session_start();
            $_SESSION['search_resultados'] = $gatosInfo;
            header("Location: /");
 
        }
    } elseif (isset($_POST["filtrar"])){
        
        $data = $_POST["filtros"];
        foreach ($data as $campo) {
            echo "Valor selecionado: " . $campo . "<br>";
        }
        session_start();
        $homePageController = new HomePageController();
        $filtrosGatos = $homePageController->filtrarGato($data);
        if (!$filtrosGatos) {
            $erro = "Nenhum gato encontrado com essa informação";
            $erro_encode = json_encode($erro);
            header("Location: ../view/pages/HomePage.php?erro=$erro_encode");
        } else {
            session_start();
            $_SESSION['filtragem'] = $filtrosGatos;
            header("Location: ../view/pages/HomePage.php");
 
        }

    }
}

