<?php

    require_once("vendor/autoload.php");

    $url = $_SERVER["REQUEST_URI"];
    $url = explode('/', $url);

    switch($url[1]){
        case "":
            include("src/view/pages/HomePage.php");
            break;
        case "search":
            echo 'ta chegando aqui';
            include ("src/controller/HomePageController.php");
            break;
        case "login":
            if(isset($url[2])){
                if($url[2] == "process"){
                    require_once("src/controller/LoginController.php");
                    controller\LoginController::processar_login();
                    break;
                } 
            }
            include("src/view/pages/LoginPage.php");
            break;
        case "cadastrar":
            include("src/view/pages/SigninPage.php");
            break;
        case "gato":
            if(isset($url[3])){
                if($url[3] == "process"){
                    include("src/controller/FormularioController.php");
                    break;
                }
                if($url[2] == "adotar"){
                    include("src/view/pages/FormPage.php");
                    break;
                }
            }
            include("src/view/pages/VisualizarGato.php");
            break;
    }

?>