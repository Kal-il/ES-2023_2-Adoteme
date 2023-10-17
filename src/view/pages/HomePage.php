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
            <form action="../../controller/HomePageController.php" method="POST">
                <input type="text" name="search" id="search" placeholder="Pesquisar">
                <button type="submit">Pesquisar</button>
            </form>
            <button id="toggle-form" style="background-color: tranparent;">
                <span class="material-symbols-outlined">
                    filter_list
                </span>
            </button>
        </section>
        <!-- Formulário aqui-->
        <form id="my-form">
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
            //Função de curtida
            $(document).ready(function() {
                $("#heart").click(function() {
                    if ($("#heart").hasClass("liked")) {
                        $("#heart").html('<i class="material-symbols-outlined" aria-hidden="true"></i>');
                        $("#heart").removeClass("liked");
                    } else {
                        $("#heart").html('<i class="material-symbols-outlined" aria-hidden="true"></i>');
                        $("#heart").addClass("liked");
                    }
                });
            });
        </script>

        <section class="gallery">
        <?php foreach ($data as $gato) : ?>
            <div class="polaroide">
                <?php if (!empty($gato['foto1'])) : ?>
                    <img class="img-test" src="<?php echo '..\..\view\pages\pagesAdmin\\' . $gato['foto1']; ?>" alt="Imagem de gato">
                <?php else : ?>
                    <img class="img-test" src="../assets/gato2.jpg" alt="Imagem de gato como exemplo">
                <?php endif; ?>
                <div class="info-cat"> <!-- O nome do gato e o botão de curtif ficam aqui-->
                    <p>Gatinho exemplo</p>
                    <div class="heartbox">
                        <input type="checkbox" class="checkbox" id="checkbox" />
                        <label for="checkbox">
                            <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
                                <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                                    <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2" />
                                    <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5" />
                                    <g id="heartgroup1" opacity="0" transform="translate(24)">
                                        <circle id="heart1" fill="#9FC7FA" cx="2.5" cy="3" r="2" />
                                        <circle id="heart2" fill="#9FC7FA" cx="7.5" cy="2" r="2" />
                                    </g>
                                </g>
                            </svg>
                        </label>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </section>


    </main>
    <footer>
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>

