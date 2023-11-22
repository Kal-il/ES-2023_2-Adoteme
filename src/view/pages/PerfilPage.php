<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>x
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
                <img id="imgPerfil" src="https://cdn.dribbble.com/users/5592443/screenshots/14279501/drbl_pop_r_m_rick_4x.png" alt="imagem de perfil">
                <div id="perfil_info">
                    <p id="nome_user">Rick Snches</p>
                    <div id="perfil_info2">
                        <p id="email_user">Sanches@gmail.com</p>
                        <P id="cidade"> Palmas-TO</p>
                    </div>
                </div>
            </div>

            <div class="botoes">
                <a href="/src/view/pages/AcompanhamentoPage.php">
                    <button id="botão1">
                        <img src="/src/view/assets/Frame 124.png" alt="" width="70" height="60">
                        Adoções em progresso
                    </button>
                </a>
                <a href="/src/view/pages/FavoritosPage.php">
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
                <div class = "gatosInteressantes">
                    <img src="/src/view/assets/gato2.jpg" alt="" class = "GatoInteressante">
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