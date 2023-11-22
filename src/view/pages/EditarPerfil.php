<!DOCTYPE html>
<html>

<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/src/view/css/styles.css">
	<link rel="stylesheet" type="text/css" href="/src/view/css/EditarPerfil.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://rawcdn.githack.com/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
		type="text/css" />
	<title>Editar Perfil</title>
</head>

<body>
	<header>
		<?php include($_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php")
			?>
	</header>
	<h1>Editar Perfil</h1>
	
	<div class="form-profile-container">

		<form class="form" action="/perfil/editar/process" method="POST" enctype="multipart/form-data">



			<?php
			if ($usuario['foto'] == null) {
				echo '
					<div class="child">
						<img class="profile-pic" src="https://i.pinimg.com/236x/67/58/c3/6758c3e7fa00dcd373f316ddde78bbf4.jpg" alt="Profile Picture">
					</div>';
			} else {
				echo '
					<div class="child">
						<img class="profile-pic" src="/src/view/pages/pagesAdmin/' . $usuario['foto'] . '" alt="Profile Picture">
					</div>';
			}
			?>

			<div class="form-fields-container">

				<div class="form-side-container form-left-container">

					<label class="label" for="profile_picture">Foto de Perfil:</label>
					<input class="input" type="file" id="profile_picture" name="foto"><br><br>

					<label class="label" for="name">Nome:</label>
					<input class="input" type="text" id="name" name="nome" placeholder="Nome"
						value="<?php echo $usuario['nome'] ?>"><br><br>

					<label class="label" for="sobrenome">Sobrenome:</label>
					<input class="input" type="sobrenome" id="sobrenome" name="sobrenome" placeholder="Sobrenome"
						value="<?php echo $usuario['sobrenome'] ?>"><br><br>

					<label class="label" for="name">Telefone:</label>
					<input class="input" type="text" id="name" name="telefone" placeholder="Telefone"
						value="<?php echo $usuario['telefone'] ?>"><br><br>

				</div>

				<div class="form-side-container form-right-container">

					<label class="label" for="name">Data de Nascimento:</label>
					<input class="input" type="date" id="birthday" name="nascimento"
						value="<?php echo $usuario['data_nascimento'] ?>"><br><br>

					<label class="label" for="name">Estado:</label>
					<input class="input" type="text" id="name" name="estado" placeholder="Estado"
						value="<?php echo $usuario['estado'] ?>"><br><br>

					<label class="label" for="name">Cidade:</label>
					<input class="input" type="text" id="name" name="cidade" placeholder="Cidade"
						value="<?php echo $usuario['cidade'] ?>"><br><br>

					<label class="label" for="name">Endereço:</label>
					<input class="input" type="text" id="name" name="endereco" placeholder="Endereço"
						value="<?php echo $usuario['endereco'] ?>"><br><br>

				</div>

			</div>

			<?php
			session_start();
			if (isset($_SESSION['sucesso'])) {
				echo '
						<div class="form-success-message-container">
							<p class="form-success-message"> ' . $_SESSION['sucesso'] . ' </p>
						</div>';
				unset($_SESSION['sucesso']);
			}
			?>

			<input class="submit" type="submit" value="Confirmar">
			<td>
				<a href="#" class="openModal">Deletar Conta</a>
				<div class="modal">
					<div class="modal__content">
						<h2 class="modal__title">Atenção!</h2>
						<p class="modal__description">
							Deseja <b>DELETAR</b> sua conta?
						</p>
						<a href="/perfil/deletar" class="modal__deletar deleteButton">Deletar</a>
						<a href="#" class="modal__cancelar">Cancelar</a>
					</div>
				</div>
			</td>

		
		</form>
		
		<script>
			const openModalButtons = document.querySelectorAll('.openModal');
			const closeModalButtons = document.querySelectorAll('.modal__cancelar');
			const deleteButtons = document.querySelectorAll('.deleteButton');
			const modals = document.querySelectorAll('.modal');

			openModalButtons.forEach((button, index) => {
				button.addEventListener('click', () => {
					modals[index].style.display = 'block';
				});
			});

			closeModalButtons.forEach((button, index) => {
				button.addEventListener('click', () => {
					modals[index].style.display = 'none';
				});
			});

			deleteButtons.forEach((button, index) => {
				button.addEventListener('click', () => {

					modals[index].style.display = 'none';
				});
			});
		</script>
	</div>
	<footer class="footer">
		<a href="AboutUs.php">About Us</a>
		<p>&copy;2023 Adoteme </p>
	</footer>
</body>

</html>