<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Perfil</title>
</head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/view/partials/Header.php'; ?>

<body>
    <main>""

        <!-- Botão de voltar -->
        <main class=FavoritosMain>
            <a href="javascript:history.back()">
                <button class=BackButtonFavorite>
                    Voltar
                </button>
            </a>
            <!-- Botão de voltar -->
            <div class="perfil" style= "display: flex">
            <?php 
				if($usuario['foto'] == null) {
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
                <p id="nome_user"><?php echo $usuario['nome'] ?></p>
                <p id="email_user"><?php echo $usuario['email'] ?></p>
                <P id = "cidade"><?php echo $usuario['cidade'] ?></p>
            </div>
            <a href="/src/view/pages/AcompanhamentoPage.php">
                <button>
                    Adoções em progresso
                </button>
            </a>
            <a href="/src/view/pages/FavoritosPage.php">
                <button>
                    Gatos Favoritos
                </button>
            </a>
            <a href="/src/view/pages/EditarPerfil.php">
                <button>
                    Editar perfil
                </button>
            </a>
        </main>
        <footer>

        </footer>
</body>

</html>