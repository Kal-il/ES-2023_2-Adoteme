<?php

    require_once("vendor/autoload.php");

    $url = $_SERVER["REQUEST_URI"];
    $url = explode('/', $url);

    switch($url[1]){
        case "":
            include("src/view/pages/HomePage.php");
            break;
        case "login":
            if(isset($url[2])){
                if($url[2] == "process"){
                    include("src/controller/LoginDadosController.php");
                    break;
                } 
            }
            include("src/view/pages/LoginPage.php");
            break;
        case "cadastrar":
            include("src/view/pages/SigninPage.php");
            break;
        case "gato":
            include("src/view/pages/VisualizarGato.php");
            break;
    }

?>