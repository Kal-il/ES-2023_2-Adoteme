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
    <title>ListarEventos</title>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php"; ?>

    <?php
    foreach ($eventos as $evento) {
                    echo '<div class="polaroide">';
                    if (!empty($evento['foto'])) {
                        echo '<a class="link-img-test" href="/eventos/' . $evento["id"] . '"><img class="img-test" src="src/view/pages/pagesAdmin/' . $evento['foto'] . '" alt="Imagem de evento"></a>';
                    } else {
                        echo '<a href="/eventos/' . $gato["id"] . '"><img class="img-test" src="src/view/assets/gato2.jpg" alt="Imagem de gato como exemplo"></a>';
                    }
                }
    ?>

</body>
</html>