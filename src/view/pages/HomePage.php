<?php
require '..\..\..\vendor\autoload.php';
require_once __DIR__ . '..\..\..\controller\HomePageController.php';
use controller\HomePageController;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['jwt_token'])) {
    $jwt_token = $_COOKIE['jwt_token'];
    $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));

    $decoded_array = (array) $decoded;
    echo $decoded_array['email'];
} else {
    echo "<h1> faça login </h1>";
}
    $homePage = new HomePageController();
    $data = array();
    $data = $homePage -> infoHomeGatos();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/HomePage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>HomePage</title>
</head>

<body>
    <header>
        <a href="HomePage.php">
            <img class="image" src="../assets/adoteme.png" alt="Logo Adotme" width="60" height="60">
        </a>
        <h2 class="adoteme">Adoteme</h2>
    </header>
    <main>
        <section class="search">
            <form action="" method="post">
                <input type="text" name="search" id="search" placeholder="Pesquisar">
                <button type="submit">Pesquisar</button>
            </form>
            <button id="toggle-form" style="background-color: tranparent;">
                <span class="material-symbols-outlined">
                    filter_list
                </span>
            </button>
            <!-- Formulário aqui-->
            <form id="my-form" style="display: none;">
                <table>
                    <thead>
                        <!-- aqui ficam os titulos da tabéla-->
                        <tr>
                            <th>Cor</th>
                            <th>Sexo</th>
                            <th>Porte</th>
                            <th>Idade</th>
                            <th>Temperamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Cor-->
                            <td>
                                <label for="preto">Preto</label>
                                <input type="checkbox" name="preto" id="preto">
                            </td>
                            <!-- Sexo-->
                            <td>
                                <label for="femea">Femea</label>
                                <input type="checkbox" name="femea" id="femea">
                            </td>

                            <!-- Porte-->
                            <td>
                                <label for="pequeno">Pequeno</label>
                                <input type="checkbox" name="pequeno" id="pequeno">
                            </td>
                            <!-- Idade-->
                            <td>
                                <label for="filhote">Filhote</label>
                                <input type="checkbox" name="filhote" id="filhote">
                            </td>
                            <!-- Temperamento -->
                            <td>
                                <label for="calmo">Calmo</label>
                                <input type="checkbox" name="calmo" id="calmo">
                            </td>
                        </tr>
                        <tr>
                            <!-- Cor linha 2-->
                            <td>
                                <label for="laranja">Laranja</label>
                                <input type="checkbox" name="laranja" id="laranja">
                            </td>
                            <!-- Sexo linha 2 -->
                            <td>
                                <label for="macho">Macho</label>
                                <input type="checkbox" name="macho" id="macho">
                            </td>
                            <!-- Porte linha 2 -->
                            <td>
                                <label for="medio">Médio</label>
                                <input type="checkbox" name="medio" id="medio">
                            </td>
                            <td>

                            </td>
                            <!-- Temperamento linha 2 -->
                            <td>
                                <label for="brincalhao">Brincalhão</label>
                                <input type="checkbox" name="brincalhao" id="brincalhao">
                            </td>
                        </tr>
                        <tr>
                            <!-- Cor linha 3-->
                            <td>
                                <label for="branco">Branco</label>
                                <input type="checkbox" name="branco" id="branco">
                            </td>
                            <td></td>
                            <td>
                                <label for="grande">Grande</label>
                                <input type="checkbox" name="grande" id="grande">
                            </td>
                            <td>
                                <label for="adulto">Adulto</label>
                                <input type="checkbox" name="adulto" id="adulto">

                            </td>
                            <td>
                                <label for="amigavel">Amigável</label>
                                <input type="checkbox" name="amigavel" id="amigavel">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="marrom">Marrom</label>
                                <input type="checkbox" name="marrom" id="marrom">
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <label for="idoso">Idoso</label>
                                <input type="checkbox" name="idoso" id="idoso">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cinza">Cinza</label>
                                <input type="checkbox" name="cinza" id="cinza">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label for="timido">Tímido</label>
                                <input type="checkbox" name="timido" id="timido">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="rajado">Rajado</label>
                                <input type="checkbox" name="rajado" id="rajado">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label for="curioso">Curioso</label>
                                <input type="checkbox" name="curioso" id="curioso">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tricolor">Tricolor</label>
                                <input type="checkbox" name="tricolor" id="tricolor">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </section>


        <script>
            const toggleButton = document.getElementById('toggle-form');
            const form = document.getElementById('my-form');

            toggleButton.addEventListener('click', () => {
                if (form.style.display === 'none') {
                    form.style.display = 'block';
                } else {
                    form.style.display = 'none';
                }
            });
        </script>

        <section class="gallery">
        <?php foreach ($data as $gato) : ?>
            <div class="polaroide">
                <?php if (!empty($gato['foto1'])) : ?>
                    <img class="img-test" src="<?php echo '..\..\view\pages\pagesAdmin\\' . $gato['foto1']; ?>
" alt="Imagem de gato">
                <?php else : ?>
                    <img class="img-test" src="../assets/gato2.jpg" alt="Imagem de gato como exemplo">
                <?php endif; ?>
                <p class="info-gato"><?php echo $gato['nome']; ?><span class="material-symbols-outlined">favorite</span></p>
            </div>
        <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>

