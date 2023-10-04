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
                <h1 id="h1cadastro">Cadastro</h1>
                <div class="input-field">
                    <label for="name">
                        <input class="inputInfo" type="text" name="name" id="name" placeholder="Seu nome aqui" maxlength="100" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="surname">
                        <input class="inputInfo" type="text" name="surname" id="surname" placeholder="Seu sobrenome aqui" maxlength="100" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="email">
                        <input class="inputInfo" type="email" name="email" id="email" placeholder="Example@email.com" maxlength="100" required><br>
                    </label>
                    <?php
                        if(isset($_GET['email'])){
                            $erro_encoded = $_GET['email'];
                            $erro = json_decode(urldecode($erro_encoded), true);

                            echo '<p class="error-message">' . htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') . '</p>';
                        }
                    ?>
                </div>

                <div class="input-field">
                    <label for="cpf">
                        <input class="inputInfo" type="text" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="100" required><br>
                    </label>

                    <?php
                        if(isset($_GET['cpf'])){
                            $erro_encoded = $_GET['cpf'];
                            $erro = json_decode(urldecode($erro_encoded), true);

                            echo '<p class="error-message">' . htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') . '</p>';
                        }
                    ?>
                </div>

                <div class="input-field">
                    <label for="cep">
                        <input class="inputInfo" type="text" name="cep" id="cep" placeholder="00000-000" maxlength="100" required><br>
                    </label>
                </div>
            
                <div class="input-field">
                    <label for="birthday">
                        <input class="inputInfo" type="date" name="birthday" id="birthday" maxlength="8" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="enrollment">
                        <input class="inputInfo" type="text" name="enrollment" id="enrollment" placeholder="00000000000" maxlength="100" required><br>
                    </label>

                    <?php
                        if(isset($_GET['matricula'])){
                            $erro_encoded = $_GET['matricula'];
                            $erro = json_decode(urldecode($erro_encoded), true);

                            echo '<p class="error-message">' . htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') . '</p>';
                        }
                    ?>
                </div>

                <div class="input-field">
                    <label for="telephone">
                        <input class="inputInfo" type="tel" name="telephone" id="telephone" placeholder="(00)0 0000-0000" minlength="11" maxlength="100" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="password">
                        <input class="inputInfo" type="password" name="password" id="password" placeholder="Senha123" minlength="6" maxlength="30" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="password2">
                        <input class="inputInfo" type="password" name="password2" id="password2" placeholder="Senha123" minlength="6" maxlength="30" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="state">
                        <input class="inputInfo" type="text" name="state" id="state" placeholder="Tocantins" minlength="4" maxlength="20" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="city">
                        <input class="inputInfo" type="text" name="city" id="city" placeholder="Palmas" maxlength="100" required><br>
                    </label>
                </div>

                <div class="input-field">
                    <label for="adress">
                        <input class="inputInfo" type="text" name="adress" id="adress" placeholder="Bairro rua número" maxlength="100" required><br>
                    </label>
                </div>

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