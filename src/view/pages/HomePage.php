<?php
// require '..\..\..\vendor\autoload.php';
require_once __DIR__ . '..\..\..\controller\HomePageController.php';
require __DIR__ . '..\..\..\..\vendor\autoload.php';
include __DIR__ . '\..\..\controller\FavoritosController.php';

use controller\HomePageController;
use models\FavoritosModel;


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use function controller\checkUser;

$flag = false;
$favoritos = array();
$user_id = 0;
if (isset($_COOKIE['jwt_token'])) {
    $jwt_token = $_COOKIE['jwt_token'];
    $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));
    $decoded_array = (array) $decoded;
    $user_id = $decoded_array['user_id'];
    $favoritos = checkUser($user_id);
} else {
    echo "<h1> faça login </h1>";
}

if (!isset($_SESSION)) {
    session_start();
} else {
    session_destroy();
    session_start();
}
$data = array();

if (isset($_SESSION['search_resultados'])) {
    $data = $_SESSION['search_resultados'];
    unset($_SESSION['search_resultados']);
} elseif (isset($_SESSION['filtragem'])) {
    $data = $_SESSION['filtragem'];
    unset($_SESSION['filtragem']);
} else {
    $homePage = new HomePageController();
    $data = $homePage->infoHomeGatos();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/HomePage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>HomePage</title>
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
                            <a class="nav-link active" href="HomePage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled " href="pagesAdmin/HomePageAdmin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="LoginPage.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Profile</a>
                        </li>

                        <?php 
                        if($user_id != 0){
                            echo '<li class="nav-item">
                            <a class="nav-link favoritos" href="FavoritosPage.php">Favoritos</a>
                            </li>';
                        } 
                        ?>
                    </ul>
            </nav>

        </div>
    </header>
    <!-- <script>
        $(document).ready(function() {
            $('.nav-link.favoritos').click(function() {
                var id_usuario = 0;
                if (id_usuario == 0) {
                    alert("Faça login para acessar os favoritos");
                    $(this).prop(href, "#");
                }
            });
        });

    </script> -->
    <main>
        <!-- Modal de compartilhamento -->

        <div class="modal">
            <div class="modal__content">
                <h2 class="modal__title">Compartilhar gato</h2>
                <div class="modal__text">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=example.org" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/direct" title="Instagram"><i class="fa fa-instagram"></i></a>
                    <a href="whatsapp://send?text= Veja só o gatinho que eu vou adotar! %0a%0 http://localhost/ES-2023_2-Adoteme/src/view/pages/HomePage.php" title="Whatsapp"><i class="fa fa-whatsapp"></i></a>
                    <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                </div>
                <button class="modal__cancelar">Cancelar</button>
            </div>

            <!-- Aqui ficam as opções de filtro e de pesquisar -->
        </div>
        <div class="search">
            <button id="toggle-form">
                <span class="material-symbols-outlined">
                    filter_list
                </span>
            </button>
            <form id="form" action="../../controller/HomePageController.php" method="POST">
                <input id="search-box" type="text" name="search" id="search" placeholder="Pesquisar">
            </form>

        </div>
        <!-- Formulário aqui-->
        <form id="my-form" action="../../controller/HomePageController.php" method="POST">
            <table>
                <thead>
                    <!-- aqui ficam os titulos da tabéla-->
                    <tr>
                        <th>Cor</th>
                        <th>filtros</th>
                        <th>filtros</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Cor-->
                        <td>
                            <label for="preto">Preto</label>
                            <input type="checkbox" name="filtros[]" value="preto" id="preto">
                        </td>
                        <!-- filtros-->
                        <td>
                            <label for="femea">Femea</label>
                            <input type="checkbox" name="filtros[]" value="femea" id="femea">
                        </td>
                        <!-- Temperamento -->
                        <td>
                            <label for="curioso">Curioso</label>
                            <input type="checkbox" name="filtros[]" value="curioso" id="curioso">
                        </td>
                    </tr>
                    <tr>
                        <!-- filtros linha 2-->
                        <td>
                            <label for="laranja">Laranja</label>
                            <input type="checkbox" name="filtros[]" name="laranja" value="laranja" id="laranja">
                        </td>
                        <!-- filtros linha 2 -->
                        <td>
                            <label for="macho">Macho</label>
                            <input type="checkbox" name="filtros[]" value="macho" id="macho">
                        </td>
                        <td>
                            <label for="timido">Carente</label>
                            <input type="checkbox" name="filtros[]" value="carente" id="timido">
                        </td>
                    </tr>

                    <tr>
                        <!-- filtros linha 3-->
                        <td>
                            <label for="branco">Branco</label>
                            <input type="checkbox" name="filtros[]" value="branco" id="branco">
                        </td>
                        <td>
                            <label for="independente">Brincalhão</label>
                            <input type="checkbox" name="filtros[]" value="brincalhão" id="brincalhão">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="marrom">Marrom</label>
                            <input type="checkbox" name="filtros[]" value="marrom" id="marrom">
                        </td>
                        <td>
                            <label for="brincalhao">Nervoso</label>
                            <input type="checkbox" name="filtros[]" value="nervoso" id="brincalhao">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cinza">Cinza</label>
                            <input type="checkbox" name="filtros[]" value="cinza" id="cinza">
                        </td>
                        <td>
                            <label for="amigavel">Amigável</label>
                            <input type="checkbox" name="filtros[]" value="amigavel" id="amigavel">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="rajado">Preto e Branco</label>
                            <input type="checkbox" name="filtros[]" id="preto_e_branco">
                        </td>
                        <td>
                            <label for="calmo">Calmo</label>
                            <input type="checkbox" name="filtros[]" value="calmo" id="calmo">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button id="Filtrar" type="submit" name="filtrar">Filtrar</button>
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
            <?php
            if (isset($_GET['erro'])) {
                echo '<div class="polaroide">';
                echo '<img class="img-test" src="../assets/gatinho_triste.png" alt="Gatinho triste">';
                echo '<p class="info-gato">Ofiltrosreu um problema, não temos essa informação.</p>';
                echo '</div>';
            } else {
                foreach ($data as $gato) {
                    echo '<div class="polaroide">';
                    if (!empty($gato['foto1'])) {
                        echo '<a class="link-img-test" href="../../view/pages/VisualizarGato.php/?id= ' . $gato["id"] . '"><img class="img-test" src="../../view/pages/pagesAdmin/' . $gato['foto1'] . '" alt="Imagem de gato"></a>';
                    } else {
                        echo '<a href="../../view/pages/VisualizarGato.php/?id= ' . $gato["id"] . '"><img class="img-test" src="../assets/gato2.jpg" alt="Imagem de gato como exemplo"></a>';
                    }

            ?>
                    <!-- Aqui fiam o nome e os botões de curtir e compartilhar -->
                    <div class="info-cat">
                        <p><?php echo  $gato['nome']; ?></p>
                        <div class="heartbox">
                            <?php foreach ($favoritos as $favorito) {
                                if ($favorito['gato_id'] == $gato['id']) {
                                    $flag = True;
                                    break;
                                }
                                $flag = False;
                            }
                            ?>
                            
                            <!-- Botão de compartilhar -->

                            <button id="buttons-share-fill" class="openModal">
                                <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="share-fill" viewBox="0 0 16 16">
                                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                                </svg>
                            </button>
                            <!-- Botão de curtir -->

                            <input type="checkbox" class="checkbox" id="checkbox-<?php echo $gato['id']; ?>" <?php if ($flag) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                            <label for="checkbox-<?php echo $gato['id']; ?>">
                                <svg class="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                                        <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2" />
                                        <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5" />
                                        <g id="heartgroup7" opacity="0" transform="translate(7 6)">
                                            <circle id="heart1" fill="#9CD8C3" cx="2" cy="6" r="2" />
                                            <circle id="heart2" fill="#8CE8C3" cx="5" cy="2" r="2" />
                                        </g>

                                        <g id="heartgroup6" opacity="0" transform="translate(0 28)">
                                            <circle id="heart1" fill="#CC8EF5" cx="2" cy="7" r="2" />
                                            <circle id="heart2" fill="#91D2FA" cx="3" cy="2" r="2" />
                                        </g>

                                        <g id="heartgroup3" opacity="0" transform="translate(52 28)">
                                            <circle id="heart2" fill="#9CD8C3" cx="2" cy="7" r="2" />
                                            <circle id="heart1" fill="#8CE8C3" cx="4" cy="2" r="2" />
                                        </g>

                                        <g id="heartgroup2" opacity="0" transform="translate(44 6)">
                                            <circle id="heart2" fill="#CC8EF5" cx="5" cy="6" r="2" />
                                            <circle id="heart1" fill="#CC8EF5" cx="2" cy="2" r="2" />
                                        </g>

                                        <g id="heartgroup5" opacity="0" transform="translate(14 50)">
                                            <circle id="heart1" fill="#91D2FA" cx="6" cy="5" r="2" />
                                            <circle id="heart2" fill="#91D2FA" cx="2" cy="2" r="2" />
                                        </g>

                                        <g id="heartgroup4" opacity="0" transform="translate(35 50)">
                                            <circle id="heart1" fill="#F48EA7" cx="6" cy="5" r="2" />
                                            <circle id="heart2" fill="#F48EA7" cx="2" cy="2" r="2" />
                                        </g>
                                        <g id="heartgroup1" opacity="0" transform="translate(24)">
                                            <circle id="heart1" fill="#9FC7FA" cx="2.5" cy="3" r="2" />
                                            <circle id="heart2" fill="#9FC7FA" cx="7.5" cy="2" r="2" />
                                        </g>
                                    </g>
                                </svg>
                            </label>
                        </div>


                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.checkbox').click(function() {
                                var id_gato = $(this).attr('id');
                                var id_usuario = <?php echo $user_id; ?>;
                                id_gato = id_gato.split("-")[1];
                                var checked = $(this).is(':checked');
                                if (id_usuario == 0) {
                                    $(this).prop('checked', false);
                                    alert("Faça login para adicionar aos favoritos");
                                    return;
                                } else {
                                    if (checked) {
                                        $.ajax({
                                            url: '../../controller/FavoritosController.php',
                                            type: 'POST',
                                            data: {
                                                'addFavoritos': true,
                                                'id_gato': id_gato,
                                                'user_id': id_usuario
                                            },
                                            success: function(response) {
                                                console.log(response);
                                            }
                                        });
                                    } else {
                                        $.ajax({
                                            url: '../../controller/FavoritosController.php',
                                            type: 'POST',
                                            data: {
                                                'removeFavoritos': true,
                                                'id_gato': id_gato,
                                                'user_id': id_usuario

                                            },
                                            success: function(response) {
                                                console.log(response);
                                            }
                                        });
                                    }
                                }
                            });
                        });
                        //Função do modal para que o Pop-up de compartilhar apareça
                        const openModalButtons = document.querySelectorAll('.openModal');
                        const closeModalButtons = document.querySelectorAll('.modal__cancelar');
                        const modal = document.querySelector('.modal');

                        openModalButtons.forEach((button, index) => {
                            button.addEventListener('click', () => {
                                modal.style.display = 'block';
                            });
                            closeModalButtons.forEach((button, index) => {
                                button.addEventListener('click', () => {
                                    modal.style.display = 'none';
                                });
                            });
                        });
                    </script>
                    </div>
            <?php
                }
            }
            ?>
        </section>

    </main>
    <footer>
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>