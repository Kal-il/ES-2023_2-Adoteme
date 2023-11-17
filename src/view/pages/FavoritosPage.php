<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/view/css/HomePage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>FavoritosPage</title>
</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/view/partials/Header.php'; ?>
<main>
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
            if (empty($favoritos)) {
                echo '<div class="polaroide">';
                echo '<img class="img-test" src="/src/view/assets/gatinho_triste.png" alt="Gatinho triste">';
                echo '<p class="info-gato">Não há gatos favoritados</p>';
                echo '</div>';
            } else {
                foreach ($favoritos as $gato) {
                    echo '<div class="polaroide">';
                    if (!empty($gato['foto1'])) {
                        echo '<a class="link-img-test" href="/gatos/' . $gato["id"] . '"><img class="img-test" src="/src/view/pages/pagesAdmin/' . $gato['foto1'] . '" alt="Imagem de gato"></a>';
                    } else {
							echo '<a href="/gatos/' . $gato["id"] . '"><img class="img-test" src="/src/view/assets/gato2.jpg" alt="Imagem de gato como exemplo"></a>';
                    }

            ?>
                    <!-- Aqui ficam o nome e os botões de curtir e compartilhar -->
                    <div class="info-cat">
                        <p><?php echo  $gato['nome']; ?></p>
                        <div class="heartbox">
                            <?php foreach ($favoritos as $favorito) {
                                if ($favorito['id'] == $gato['id']) {
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
                                            url: '/favoritos/gerenciar',
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
                                            url: '/favoritos/gerenciar',
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
