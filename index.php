<?php
    require_once("vendor/autoload.php");

    # Armazena cada parte da URL num Array.
    # Por exemplo, se a rota é "admin/gatos/rejeitar", $url será igual ["", ""admin", "gatos", "rejeitar"]
    # ATENÇÃO: por causa da função explode(), a posição $url[0] sempre será uma string vazia.

    $url = explode('/', $_SERVER["REQUEST_URI"]);

    switch($url[1]){
        case "":
            controller\HomePageController::carregar_home();
            break;

        case "search":
            controller\HomePageController::pesquisar_gatos();
            break;

        case "login":
            if(isset($url[2])){
                if($url[2] == "process"){
                    controller\LoginController::processar_login();
                    break;
                } 
            }

            controller\LoginController::carregar_login();
            break;

        case "cadastrar":
            if (isset($url[2])) {
                if($url[2] == "process") {
                    controller\CadastroController::processar_cadastro();
                    break;
                }
            }

            controller\CadastroController::carregar_cadastro();
            break;

        case "gato":
            if (isset($url[2])){
                if (isset($url[3])){
                    if($url[3] == "process"){
                        include("src/controller/FormularioController.php");
                        break;
                    }
                }

                if($url[2] == "adotar"){
                    include("src/view/pages/FormPage.php");
                    break;
                }
            }

            include("src/view/pages/VisualizarGato.php");
            break;

        case "admin":
            if (isset($url[2])) {
                if ($url[2] == "adocoes"){
                    if (isset($url[3])) {
                        if($url[3] == "rejeitar"){
                            controller\AdocaoAdminController::rejeitar_adocao();
                            break;
                        }
                        if ($url[3] == "aprovar"){
                            controller\AdocaoAdminController::aprovar_adocao();
                            break;
                        }
                    }

                    controller\AdocaoAdminController::listar_adocoes();
                    break;
                }
                if ($url[2] == "gatos"){
                    include("src/view/pages/pagesAdmin/TabelaAnimais.php");
                    break;
                }
            }
            include("src/view/pages/pagesAdmin/HomePageAdmin.php");
            break;
    }

?>