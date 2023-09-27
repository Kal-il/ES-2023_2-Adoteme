<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SinginPage</title>

    <link rel="stylesheet" type="text/css" href="../css/SinginPage.css">
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


        <form action="POST" enctype="multipart/form-data">

            <div class="etapa" id="etapa1">

                <h1 id="h1cadastro">Cadastro</h1>
                <label for="name">
                    <input class="inputInfo" type="text" id="name" placeholder="Seu nome aqui" maxlength="100" required><br>
                </label>
                <label for="email">
                    <input class="inputInfo" type="email" id="email" placeholder="Example@email.com" maxlength="100" required><br>
                </label>
                <label for="cpf">
                    <input class="inputInfo" type="text" id="cpf" placeholder="000.000.000-00" maxlength="100" required><br>
                </label>
                <label for="birthday">
                    <input class="inputInfo" type="date" id="birthday" maxlength="8" required><br>
                </label>
                <label for="enrollment">
                    <input class="inputInfo" type="text" id="enrollment" placeholder="00000000000" maxlength="100" required><br>
                </label>
                <label for="telephone">
                    <input class="inputInfo" type="tel" id="telephone" placeholder="(00)0 0000-0000" minlength="11" maxlength="100" required><br>
                </label>
                <label for="password">
                    <input class="inputInfo" type="password" id="password" placeholder="Senha123" minlength="6" maxlength="100" required><br><br>
                </label>
                <button onclick="proximoEtapa(1)">Próximo</button>
                <a href="LoginPage.php"><button id="login">Já possui cadastro? login</button></a><!--Botão para voltar para a página inicial porem não funciona como devia por conta do "required" nos inputs-->
            </div>

            <div class="etapa2" id="etapa2">
                <h1 id="h1cadastro">Cadastro</h1>
                <label for="state">
                    <input class="inputInfo" type="text" id="state" placeholder="Tocantins" minlength="4" maxlength="20" required><br>
                </label>
                <label for="city">
                    <input class="inputInfo" type="text" id="city" placeholder="Palmas" maxlength="100" required><br>
                </label>
                <label for="adress">
                    <input class="inputInfo" type="text" id="adress" placeholder="Bairro rua número" maxlength="100" required><br>
                </label>
                <button>Cadastrar</button>
            </div>
            <a href="LoginPage.php"><button id="login" type="button">Já possui cadastro? login</button></a><!--Botão para voltar para a página inicial funciona por estar fora das divs, mas n consegui centralizar-->
        <script>
            function proximoEtapa(etapa) {
                // Oculta a etapa atual
                document.getElementById("etapa" + etapa).style.display = "none";
                // Exibe a próxima etapa
                etapa++;
                if (etapa <= 3) {
                    document.getElementById("etapa" + etapa).style.display = "block";
                }
            }
        </script>

    </main>
    <footer>
        <p id="copyrigth">&copy;2023 Adoteme </p>
    </footer>

</body>

</html>