<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-Adoteme</title>

</head>

<header class="header">
        <a href="HomePage.php">
        <img class="image" src="../assets/adoteme.png" alt="Logo Adotme" width="100" height="100">
        </a>
        <h1 class="adoteme">Adoteme</h1>
    </header>
<body>
    <div class="container">

        <div class="form-container">
            <div class="teste">
                <h1>Log-In</h1>
            </div>
            <form class="form" action="../../controller/LoginDadosController.php" method="POST">

                <?php

                    /**
                     * Verficar se existe erro, se existir, mostrar mensagem de erro
                     */

                    if (isset($_GET['error']) && $_GET['error'] == 400) {
                        echo "<h3> E-mail e/ou senha incorreta. Por favor, tente novamente. </h3>";
                    }

                    if (isset($_GET['erros'])) {
                        $erros_encoded = $_GET['erros'];
                        $erros = json_decode(urldecode($erros_encoded), true); 
                        
                        echo '<ul>';
                        foreach ($erros as $erro) {
                            echo '<li>' . htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') . '</li>';
                        }
                        echo '</ul>';
                    }
                    
                ?>

                <div class="imput-container">
                    <div class="imput-icon">
                        <i class="fa-solid fa-user"></i>
                        <label for="email">
                        <input class="input" type="text" name="email" placeholder="E-mail" id ="email">
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
                    <button class="registro" type="submit">Novo por aqui? Registrar-se</button>
                    <button class="esqueci" type="submit">Esqueci minha senha</button>
                </div>

            </form>
            </form>
        </div>
    </div>
</body>
<footer class="footer">
    <p >&copy;2023 Adoteme </p>
</footer>

</html>