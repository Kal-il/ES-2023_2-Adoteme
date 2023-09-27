<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SinginPage</title>

    <link rel="stylesheet" type="text/css" href="../css/SinginPage.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <a href="HomePage.php">
            <img id="logo" src="../assets/adoteme.png" alt="Logo Adotme" width="100" height="100">
        </a>
        <h1 id="adoteme">Adoteme</h1>
    </header>
    <main class="main">


        <form action="../../controller/CadastroController.php" method="POST">

            <div class="etapa" id="etapa1">

                <?php

                /**
                 * Verficar se existe erro, se existir, mostrar mensagem de erro
                 */

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

                <h1 id="h1cadastro">Cadastro</h1>
                <label for="name">
                    <input class="inputInfo" type="text" name="name" id="name" placeholder="Seu nome aqui" maxlength="100" required><br>
                </label>
                <label for="email">
                    <input class="inputInfo" type="email" name="email" id="email" placeholder="Example@email.com" maxlength="100" required><br>
                </label>
                <label for="cpf">
                    <input class="inputInfo" type="text" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="100" required><br>
                </label>
                <label for="cep">
                    <input class="inputInfo" type="text" name="cep" id="cep" placeholder="00000-000" maxlength="100" required><br>
                </label>
                <label for="birthday">
                    <input class="inputInfo" type="date" name="birthday" id="birthday" maxlength="8" required><br>
                </label>
                <label for="enrollment">
                    <input class="inputInfo" type="text" name="enrollment" id="enrollment" placeholder="00000000000" maxlength="100" required><br>
                </label>
                <label for="telephone">
                    <input class="inputInfo" type="tel" name="telephone" id="telephone" placeholder="(00)0 0000-0000" minlength="11" maxlength="100" required><br>
                </label>
                <label for="password">
                    <input class="inputInfo" type="password" name="password" id="password" placeholder="Senha123" minlength="6" maxlength="30" required><br>
                </label>
                <label for="password2">
                    <input class="inputInfo" type="password" name="password2" id="password2" placeholder="Senha123" minlength="6" maxlength="30" required><br>
                </label>
                <label for="state">
                    <input class="inputInfo" type="text" name="state" id="state" placeholder="Tocantins" minlength="4" maxlength="20" required><br>
                </label>
                <label for="city">
                    <input class="inputInfo" type="text" name="city" id="city" placeholder="Palmas" maxlength="100" required><br>
                </label>
                <label for="adress">
                    <input class="inputInfo" type="text" name="adress" id="adress" placeholder="Bairro rua número" maxlength="100" required><br>
                </label>
                <div class="form-buttons-container">
                    <div class="submit-button">
                        <button type="submit" name="botaoCadastro">Cadastrar</button>
                    </div>                  
                    <div class="login-button">
                        <a href="LoginPage.php">Já possui cadastro? Faça login</a><!--Botão para voltar para a página inicial porem não funciona como devia por conta do "required" nos inputs-->
                    </div>
                </div>
                

            </div>
        </form>
    
    </main>
    <footer>
        <p id="copyrigth">&copy;2023 Adoteme </p>
    </footer>

</body>

</html>