<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/src/view/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-Adoteme</title>

</head>

<body>
    <header>
        <div id="logo">
            <div id="logo2">
                <a href="HomePage.php">
                    <img class="image" src="../assets/adoteme.png" alt="Logo Adoteme" width="60" height="60">
                </a>
                <h2 class="adoteme">Adoteme</h2>
            </div>
            <nav>
                <ul class="nav nav-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="HomePage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled " href="pagesAdmin/HomePageAdmin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="SinginPage.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Profile</a>
                        </li>
                    </ul>
            </nav>

        </div>
    </header>
    <div class="container">

        <div class="form-container">
            <div class="teste">
                <h1>Log-In</h1>
            </div>
            <form class="form" action="/login/process" method="POST">

                <?php

                /**
                 * Verficar se existe erro, se existir, mostrar mensagem de erro
                 */

                if(isset($_SESSION['campos_invalidos'])){
                    echo '<p>' . $_SESSION['campos_invalidos'] . '</p>';
                    unset($_SESSION['campos_invalidos']);
                }

                if(isset($_SESSION['erros'])) {
                    foreach($_SESSION['erros'] as $campo => $erro){
                        echo '<p>' . $campo . ': ' . $erro . '</p>';
                    }
                    unset($_SESSION['erros']);
                }

                ?>

                <div class="imput-container">
                    <div class="imput-icon">
                        <i class="fa-solid fa-user"></i>
                        <label for="email">
                            <input class="input" type="text" name="email" placeholder="E-mail" id="email">
                        </label>

                    </div>
                    <div class="imput-icon">
                        <i class="fa-solid fa-lock"></i>
                        <label for="password">
                            <input class="input" type="password" name="password" placeholder="Senha" id="password">

                        </label>

                    </div>
                </div>

                <div class="botoes">
                    <button class="entrar" type="submit" name="botaoLogin">Entrar</button>
                    <a href="SinginPage.php" class="esqueci">Novo por aqui? Registrar-se</a>
                    <button class="esqueci" type="submit">Esqueci minha senha</button>
                </div>

            </form>
            </form>
        </div>
    </div>
</body>
<footer class="footer">
    <p>&copy;2023 Adoteme </p>
</footer>

</html>