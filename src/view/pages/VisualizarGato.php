<?php

require_once '../../../../controller/gatosController/VisualizarGato.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../css/VisualizarGato.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/VisualizarGato.js"></script>

    <title>Gato</title>

</head>

<header class="header">


    <a class="logo" href="HomePage.php">
        <img class="logo" src="../assets/adoteme.png" alt="Logo Adotme" width="100" height="100">
    </a> <h1 class="adoteme">Adoteme</h1>
<!--
    <div class="header-quick-links">
       

        <a class="quick-links" href="HomePage.php"> Home </a>
        <a class="quick-links" href="LoginPage.php"> > Gatos</a>
        <a class="quick-links" href="VisualizarGato.php"> > VisualizarGato</a>

    </div>
-->
</header>

<body>

    <div class="container">



        <div class="left-column">
            <div class="left-column-image">
                <img class="image" id="main-image" src="<?php echo $gatoData['foto1']?>" alt="Gato" draggable="false" >
                <div class="heart">
                    <i id="heart-icon" class="far fa-heart icon"></i>
                </div>

            </div>
            <div class="left-column-images">
                <img class="left-images" src="<?php echo $gatoData['foto1']?>" alt="Imagem 1"
                    onclick="changeImage('<?php echo $gatoData['foto1']; ?>') "  draggable="false">
                <img class="left-images" src="<?php echo $gatoData['foto2']?>" alt="Imagem 1"
                    onclick="changeImage('<?php echo $gatoData['foto2']; ?>') "  draggable="false">
                <img class="left-images" src="<?php echo $gatoData['foto3']?>" alt="Imagem 2"
                    onclick="changeImage('<?php echo $gatoData['foto3']; ?>')" draggable="false">
            </div>
        </div>
        <div class="right-column">
            <ul class="cat-info">
                <h1>
                <?php echo $gatoData['nome']?>
                </h1>
                <li class="bullet-points">
                    -
                    <?php echo $gatoData['sexo']?>
                </li>
                <li class="bullet-points">
                    -
                    <?php echo $gatoData['cor']?>
                </li>
                <li class="bullet-points">
                    -
                    Nascimento aproximado:
                    <?php echo $gatoData['data_nascimento']?>
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
                <?php echo $gatoData['descricao']?>
            </ul>
            <div class="tenho-interesse"><button class="botao" type="submit" name="botaoAdocao">
                    <div class="button-info">Quero adotar!</div>
                </button></div>

        </div>

    </div>
</body>
<footer class="footer">
    <p>&copy;2023 Adoteme </p>
</footer>

</html>