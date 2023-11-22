<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/src/view/css/PerfilPage.css">
    <title>Perfil</title>
</head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/view/partials/Header.php'; ?>

<body>
    <main>""

        <!-- Botão de voltar -->
        <main>
            <a href="javascript:history.back()">
                <button class=BackButtonFavorite>
                    Voltar
                </button>
            </a>
            <!-- Botão de voltar -->
            <div class="perfil" style="display: flex">
                <?php
                if ($usuario['foto'] == null) {
                    echo '
					<div class="child">
						<img class="profile-pic"id="imgPerfil" src="https://i.pinimg.com/236x/67/58/c3/6758c3e7fa00dcd373f316ddde78bbf4.jpg" alt="Profile Picture">
					</div>';
                } else {
                    echo '
					<div class="child">
						<img class="profile-pic"id="imgPerfil" src="/src/view/pages/pagesAdmin/' . $usuario['foto'] . '" alt="Profile Picture">
					</div>';
                }
                ?>
                <div id="perfil_info">
                    <p id="nome_user"><?php echo $usuario['nome'] ?></p>
                    <div id="perfil_info2">
                        <p id="email_user"><?php echo $usuario['email'] ?></p>
                        <P id="cidade"><?php echo $usuario['cidade'] ?></p>
                    </div>
                </div>
            </div>

            <div class="botoes">
                <a href="/adocoes">
                    <button id="botão1">
                        <img src="/src/view/assets/Frame 124.png" alt="" width="70" height="60">
                        Adoções em progresso
                    </button>
                </a>
                <a href="/favoritos">
                    <button id="botão2">
                        <img src="/src/view/assets/heart.png" alt="" width="80" height="60">
                        Gatos Favoritos
                    </button>
                </a>
                <a href="/src/view/pages/EditarPerfil.php">
                    <button id="botão3">
                        <img src="/src/view/assets/Account.png" alt="" width="90" height="60">
                        Editar perfil
                    </button>
                </a>
            </div>
            <div class="seusInteresses">
                <p>Seus Interesses</p>
                <!---->
                <div class="gatosInteressantes">
                    <img src="/src/view/assets/gato2.jpg" alt="" class="GatoInteressante">
                    <p>Gatinho amarelo</p>
                </div>
            </div>

        </main>
        <footer class="footer">
            <a href="AboutUs.php">About Us</a>
            <p>&copy;2023 Adoteme </p>
        </footer>
</body>

</html>