<?php

namespace controller;

class GatosController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public static function formulario_cadastro_gato() {
		include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/pagesAdmin/CadastrarGato.php';
	}

	public static function cadastrar_gato() {
		if (isset($_POST["botaoCadastroGato"])){
	  
			$imagesPath = []; 
			$i = 0;

			// TODO: VERIFICAR TAMANHO IMAGENS
			// TODO: VERIFICAR QUANTIDADE DE  IMAGENS
			 

			foreach ($_FILES["fotos"]["error"] as $key => $error) {
			
				$path = 'uploads/';
				$pasta = $path . $_FILES["fotos"]["name"][$i];
				$imagesPath["foto" . ($i + 1)] = $pasta;
				move_uploaded_file(
					$_FILES["fotos"]["tmp_name"][$i],
					'..\..\view\pages\pagesAdmin\uploads/' .  $_FILES["fotos"]["name"][$i]
				);

				++$i;
			}

			$data = [
				"nome" => $_POST['nome'],
				"dataNascimento" => $_POST['data_nascimento'],
				"sexo" => $_POST['sexo'],
				"cor" => $_POST['cor'],
				"outraCor" => isset($_POST['outraCor']) ? $_POST['outraCor'] : null,
				"descricao" => $_POST['descricao'],
				"castrado" => isset($_POST['castrado']) ? 1 : 0,
				"vacinacaoCompleta" => isset($_POST['vacina_completa']) ? 1 : 0,
				"infoVacina" => isset($_POST['info_vacina']) ? $_POST['info_vacina'] : null,
				"personalidades" => isset($_POST['personalidades']) ? $_POST['personalidades'] : [],
			];

			$gatos_controller = new GatosController();

			$erros = $gatos_controller->validar_cadastro_gato($data);   
			if($i == 1){
				echo 'pegando imagem normal';
				$data["foto1_url"] = $imagesPath["foto1"];
			} 
			if(isset($data["foto2_url"])){
				$data["foto2_url"] = $imagesPath["foto2"];
			}
			if(isset($data["foto3_url"])){
				$data["foto3_url"] = $imagesPath["foto3"];
			}

			if (empty($erros)) {
				$resultado = $gatos_controller->gatos_model->CreateGato($gatos_controller->connection, $data);

				if ($resultado) {
				   header("Location: /admin/gatos");
				} else {
					echo "<h1>Query inválida</h1>";
				}
			} else {
				session_start();

				$_SESSION['erros'] = $erros;
				header("Location: /admin/cadastrar-gato");
			  
			}
		}

	}

	public static function visualizar_gato() {
		include 'JWTController.php';

		if (isset(explode('/', $_SERVER["REQUEST_URI"])[2])) {
			$gatoId = explode('/', $_SERVER["REQUEST_URI"])[2];

			if ($user_id == 0) {
				$redirect = "/login";
			} else {
				$redirect = "/gatos/adotar/$gatoId";
			}

			$gatos_controller = new GatosController();

			$gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gatoId);
			$gatoData['id'] = $gatoId;

			include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/VisualizarGato.php";

		} else {
			echo "Gato não encontrado";
		}

	}

	public static function visualizar_gato_admin()
	{
		include 'JWTController.php';
		$gatoId = explode('/', $_SERVER["REQUEST_URI"])[3];

		$gatos_controller = new GatosController();
		$gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gatoId);
		$gatoData['id'] = $gatoId;
		include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/pagesAdmin/DetailedView.php";
	}

	public static function editar_gato()
	{
		$gatos_controller = new GatosController();
		$gatoId = explode('/', $_SERVER["REQUEST_URI"])[4];

		$gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gatoId);
		$gatoData['id'] = $gatoId;

		if ($gatoData) {
			include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/pagesAdmin/AtualizarGato.php';
		} else {
			echo "Gato não encontrado.";
		}
	}

	public static function deletar_gato()
	{
		$gatoId = explode('/', $_SERVER["REQUEST_URI"])[4];

		$gatos_controller = new GatosController();

		$resultado = $gatos_controller->gatos_model->DeleteGato($gatos_controller->connection, $gatoId);

		if ($resultado) {
			header("Location: /admin/gatos");
		} else {
			echo "<h1>Query inválida</h1>";
		}
	}

	public static function atualizar_info_gato() {
		if (isset($_POST["botaoAtualizarGato"])) {
			$gato_id = explode('/', $_SERVER['REQUEST_URI'])[5];

			$gatos_controller = new GatosController();

			$gatoData = $gatos_controller->gatos_model->getGatoById($gatos_controller->connection, $gato_id);

			if ($gatoData) {
				$gatoData['nome'] = $_POST['nome'];
				$gatoData['dataNascimento'] = $_POST['data_nascimento'];
				$gatoData['sexo'] = $_POST['sexo'];
				$gatoData['cor'] = $_POST['cor'];
				$gatoData['descricao'] = $_POST['descricao'];

				if (!strcmp($_POST['castrado'], "on")) {
					$gatoData['castrado'] = 1;
				} else {
					$gatoData['castrado'] = 0;
				}

				if (!strcmp($_POST['vacina_completa'], "on")) {
					$gatoData['vacinacaoCompleta'] = 1;
				} else {
					$gatoData['vacinacaoCompleta'] = 0;
				}

				$gatoData['infoVacina'] = $_POST['info_vacina'];
				$gatoData['personalidades'] = $_POST['personalidades'];

				$resultado = $gatos_controller->gatos_model->UpdateGato($gatos_controller->connection, $gatoData);

				if ($resultado) {
					header("Location: /admin/gatos");
				} else {
					echo "<h1>Erro ao atualizar o gato.</h1>";
				}
			} else {
				echo "<h1>Gato não encontrado.</h1>";
			}
		}
	}

	public function validar_cadastro_gato($data) {
		$erros = [];

		if ($data["cor"] == "outra" && empty($data["outraCor"])) {
			$erros['cor'] = "Você deve especificar a cor do gato.";
		}

		if (!($data["vacinacaoCompleta"]) && empty($data["infoVacina"])) {
			$erros['vacinacao'] = "Você deve especificar as informações da vacinação do gato.";
		}

		if (!is_array($data["personalidades"]) || count($data["personalidades"]) < 2) {
			$erros['personalidades'] = "Você deve selecionar pelo menos duas personalidades para o gato.";
		}
		if (strlen($data["descricao"]) > 350) {
			$erros['descricao'] = "A descrição do gato deve ter no máximo 350 caracteres.";
		}
		if(strlen($data["nome"]) > 50){
			$erros['nome'] = "O nome do gato deve ter no máximo 50 caracteres.";
		}
		if(strlen($data["outraCor"]) > 20){
			$erros['outracor'] = "A cor do gato deve ter no máximo 20 caracteres.";
		}
		if(strlen($data["infoVacina"]) > 350){
			$erros['infovacina'] = "A cor do gato deve ter no máximo 350 caracteres.";
		}

		return $erros;
	}

	public static function listar_gatos() {
		$gatos_controller = new GatosController();

		$gatos = $gatos_controller->gatos_model->ListarGatos($gatos_controller->connection);

		include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/pagesAdmin/TabelaAnimais.php';
	}
}
