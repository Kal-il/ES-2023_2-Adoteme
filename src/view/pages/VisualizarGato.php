<?php

$host = 'silly.db.elephantsql.com';
$port = '5432';
$dbname = 'ymobdwtv';
$user = 'ymobdwtv';
$password = '6z7xnZXsb2DWh6_NWJdqvl8ObXlJMoWu';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

try {
    $query = "SELECT nome, data_nascimento, sexo, cor, descricao, castrado, vacina_completa, foto1, foto2, foto3 FROM gatos WHERE id = 8";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $nome = $row['nome'];
    $sexo = $row['sexo'];
    $cor = $row['cor'];
    $idade = $row['data_nascimento'];
    $imagem = $row['foto1'];
    $imagem2 = $row['foto2'];
    $imagem3 = $row['foto3'];
    $descricao = $row['descricao'];
    $castrado = $row['castrado'];
    $vacinado = $row['vacina_completa'];
}
$pdo = null


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
                <img class="image" id="main-image" src="<?php echo $imagem ?>" alt="Gato" draggable="false" >
                <div class="heart">
                    <i id="heart-icon" class="far fa-heart icon"></i>
                </div>

            </div>
            <div class="left-column-images">
                <img class="left-images" src="<?php echo $imagem; ?>" alt="Imagem 1"
                    onclick="changeImage('<?php echo $imagem; ?>') "  draggable="false">
                <img class="left-images" src="<?php echo $imagem2; ?>" alt="Imagem 2"
                    onclick="changeImage('<?php echo $imagem2; ?>')" draggable="false">
                <img class="left-images" src="<?php echo $imagem3; ?>" alt="Imagem 3"
                    onclick="changeImage('<?php echo $imagem3; ?>')" draggable="false">
            </div>
        </div>
        <div class="right-column">
            <ul class="cat-info">
                <h1>
                    <?php echo strtoupper($nome); ?>
                </h1>
                <li class="bullet-points">
                    -
                    <?php echo $sexo ?>
                </li>
                <li class="bullet-points">
                    -
                    <?php echo $cor ?>
                </li>
                <li class="bullet-points">
                    -
                    Nascimento aproximado:
                    <?php echo $idade ?>
                </li>
                <li class="bullet-points">
                    -
                    Castrado:
                    <?php if ($castrado) {
                        echo "Sim";
                    } else {
                        echo "Não";
                    } ?>
                </li>
                <li class="bullet-points">
                    -
                    Vacinado:
                    <?php if ($vacinado) {
                        echo "Sim";
                    } else {
                        echo "Não";
                    } ?>
                </li>
                <br>
                <?php echo $descricao ?>
            </ul>
            <div class="tenho-interesse"><button class="botao" type="submit" name="botaoAdocao">
                    <div class="button-info">Tenho Interesse!</div>
                </button></div>

        </div>

    </div>
</body>
<footer class="footer">
    <p>&copy;2023 Adoteme </p>
</footer>

</html>