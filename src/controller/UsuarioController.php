<?php

namespace controller;

class UsuarioController extends Controller {
	public function __construct(){
		parent::__construct();
	}

	public static function editar_perfil() {
		session_start();
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			include 'JWTController.php';

			$path = 'usuarios/';
			$pasta = $path . $_FILES["foto"]["name"];
			$fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/pagesAdmin/usuarios/' . $_FILES["foto"]["name"];

			move_uploaded_file(
				$_FILES["foto"]["tmp_name"],
				$fileDestination
			);
			$imagePath = $pasta;

			$dados = [
				"id" => $user_id,
				"nome" => $_POST['nome'],
				"sobrenome" => $_POST['sobrenome'],
				"telefone" => $_POST['telefone'],
				"nascimento" => $_POST['nascimento'],
				"estado" => $_POST['estado'],
				"cidade" => $_POST['cidade'],
				"endereco" => $_POST['endereco'],
				"foto" => $imagePath,
			];

			$controller = new UsuarioController();
			$resultado = $controller->user_model->UpdateUser($controller->connection, $dados);

			if(!$resultado) {
				echo 'Erro na atualização de dados do usuário';
			} else {
				$_SESSION['sucesso'] = "Perfil editado com sucesso";
				header("Location: /usuario/editar");
			}
		}
	}

	public static function carregar_editar_perfil() {
		include 'JWTController.php';

		$usuario = new UsuarioController();
		$usuario = $usuario->user_model->GetUserByID($usuario->connection, $user_id);

		include $_SERVER['DOCUMENT_ROOT'] . '/src/view/pages/EditarPerfil.php';
	}
}

?>
