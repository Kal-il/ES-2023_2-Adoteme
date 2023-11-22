<?php
    require_once("vendor/autoload.php");

    # Armazena cada parte da URL num Array.
    # Por exemplo, se a rota é "/admin/gatos/rejeitar", $url será igual ["", ""admin", "gatos", "rejeitar"]
    # ATENÇÃO: por causa da função explode(), a posição $url[0] sempre será uma string vazia.
echo $_SERVER["REQUEST_URI"];
    $url = explode('/', $_SERVER["REQUEST_URI"]);

    switch($url[1]){
        case "":
            controller\HomePageController::carregar_home();
            break;

        case "search":
            controller\HomePageController::pesquisar_gatos();
            break;

		case "favoritos":
			 if(isset($url[2])){
                if($url[2] == "gerenciar"){
                    controller\FavoritosController::gerenciar_favoritos();
                    break;
                } 
            }
			controller\FavoritosController::carregar_favoritos();
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

		case "perfil":
			if(isset($url[2])) {
				if($url[2] == "editar") {
					if(isset($url[3])){
						if($url[3] == "process") {
							controller\UsuarioController::editar_perfil();
							break;
						}
					}
					controller\UsuarioController::carregar_editar_perfil();
					break;
				}

                if ($url[2] == "deletar") {
                    controller\UsuarioController::deletar_perfil();
                    break;
                }
    
			}

            //controller\UsuarioController::carregar_perfil();
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

        case "gatos":
            if (isset($url[2])){
                if (isset($url[3])){
                    if($url[3] == "process"){
                        controller\FormularioController::processar_formulario();
                        break;
                    }
                }

                if($url[2] == "adotar"){
                    controller\FormularioController::carregar_formulario();
                    break;
                }
            }

            controller\GatosController::visualizar_gato();
            break;

        case "adocoes":
            controller\AdocaoController::carregar_adocoes();
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
					if (isset($url[3])) {
						if ($url[3] == "editar") {
							if (isset($url[4])) {
								if($url[4] == "process") {
									controller\GatosController::atualizar_info_gato();
									break;
								}
							}

							controller\GatosController::editar_gato();
							break;
						}

						if ($url[3] == "deletar") {
							controller\GatosController::deletar_gato();
							break;
						}

						controller\GatosController::visualizar_gato_admin();	
						break;
					}

					controller\GatosController::listar_gatos();
                    break;
                }
				if ($url[2] == "cadastrar-gato") {
					if (isset($url[3])) {
						if($url[3] == "process") {
							controller\GatosController::cadastrar_gato();
							break;
						}
					}

					controller\GatosController::formulario_cadastro_gato();
					break;
				}
            }
        case "eventos":
            if (isset($url[2])) {
                if ($url[2] == "cadastrar") {
                    if (isset($url[3])) {
						if($url[3] == "process") {
							controller\EventosController::gerenciar_eventos();
							break;
						}
                    }
                    controller\EventosController::formulario_cadastro_evento();
                    break;
                } elseif ($url[2] == "deletar") {
                    controller\EventosController::deleteEventos(); 
                    break;
                } elseif ($url[2] == "editar") {
                    if (isset($url[3])) {
                        if($url[3] == "process") {
                            controller\EventosController::editEventos();
                            break;
                        }
                    }
                    controller\EventosController::formulario_edicao_evento();
                    break;
                }else{
                    controller\EventosController::getEventos();
                    break;
                }
                controller\EventosController::getEventos();
                break;
            }

            controller\HomePageController::carregar_home_admin();
            break;

        case "sobre":
            include $_SERVER['DOCUMENT_ROOT'] . "/src/view/pages/AboutUs.php";
            break;

        case "faq":
            include $_SERVER['DOCUMENT_ROOT'] . "/src/view/pages/FAQPage.php";
            break;
    }
    
?>
