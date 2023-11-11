<?php

require_once(__DIR__ . '/../../controller/gatosController/VisualizarGato.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/src/view/css/VisualizarGato.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/src/view/js/VisualizarGato.js"></script>

    <title>Gato</title>

</head>

<header>
    <div id="logo">
        <div id="logo2">
            <a href="/">
                <img src="/src/view/assets/adoteme.png" alt="Logo Adoteme" width="60" height="60">
            </a>
            <h2 class="adoteme">Adoteme</h2>
        </div>
        <nav>
            <ul class="nav nav-tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " href="pagesAdmin/HomePageAdmin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Profile</a>
                    </li>
                </ul>
        </nav>

    </div>
</header>

<body>

    <div class="container">
        
        <div class="left-column">
            <div class="left-column-images">
                <?php
                if (isset($gatoData['foto1'])) {
                    echo '<img class="image" src="/src/view/pages/pagesAdmin/' . $gatoData['foto1'] . '" alt="Imagem 1"
                        onclick="changeImage("/src/view/pages/pagesAdmin/' . $gatoData['foto1'] . '")"  draggable="false">';
                }
                ?>
                <div class="heart">
                    <i id="heart-icon" class="far fa-heart icon"></i>
                </div>

            </div>
            <div>
                <?php
                if (isset($gatoData['foto1'])) {
                    echo '<img class="left-images" src="/src/view/pages/pagesAdmin/' . $gatoData['foto1'] . '" alt="Imagem 1"
                        onclick="changeImage("/src/view/pages/pagesAdmin/' . $gatoData['foto1'] . '")"  draggable="false">';
                }
                ?>
            </div>
        </div>
        <div class="right-column">
            <ul class="cat-info">
                <h1>
                    <?php echo $gatoData['nome'] ?>
                </h1>
                <li class="bullet-points">
                    -
                    <?php echo $gatoData['sexo'] ?>
                </li>
                <li class="bullet-points">
                    -
                    <?php echo $gatoData['cor'] ?>
                </li>
                <li class="bullet-points">
                    -
                    Nascimento aproximado:
                    <?php echo $gatoData['data_nascimento'] ?>
                </li>
                <li class="bullet-points">
                    -
                    Castrado:
                    <?php if ($gatoData['castrado']) {
                        echo "Sim";
                    } else {
                        echo "Não";
                    } ?>
                </li>
                <li class="bullet-points">
                    -
                    Vacinado:
                    <?php if ($gatoData['vacina_completa']) {
                        echo "Sim";
                    } else {
                        echo "Não";
                    } ?>
                </li>
                <br>
                <?php echo $gatoData['descricao'] ?>
            </ul>
            <div class="tenho-interesse"><button class="botao" type="submit" name="botaoAdocao">
                    <?php echo '<div class="button-info"><a id = "quero-adotar"href="../FormPage.php?id=' . $gatoData['id'] . '"> Quero adotar! </a><i class="fas fa-paw"></i></div>'; ?>

                </button></div>

        </div>

    </div>
    
</body>
<footer class="footer">
    <p>&copy;2023 Adoteme </p>
</footer>

</html>