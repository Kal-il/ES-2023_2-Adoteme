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
    <h1>Eventos Beneficentes</h1>
    <input type="button" class="btn btn-primary" value="Cadastrar Evento" onclick="window.location.href='/eventos/cadastro'">
    <?php
    foreach ($allEventos as $evento) {
                    echo '<div class="polaroide">';
                    if (!empty($evento['foto'])) {
                        echo $evento['nome']; $evento['foto'][0];
                        echo '<a class="link-img-test" ><img class="img-test" src="/src/view/pages/pagesAdmin/eventos/' . $evento['foto'] . '" alt="Imagem de evento"></a>';
                        echo '<a  href="/eventos/editar/' . $evento["id"] . '"><button class="btn btn-primary">Editar</button></a>';
                        echo '<a  href="/eventos/deletar/' . $evento["id"] . '"><button class="btn btn-primary">Deletar</button></a>';

                    } echo '<a class="link-img-test" href="/eventos/' . $evento["id"] . '"><img class="img-test" src="/src/view/pages/pagesAdmin/eventos/' . $evento['foto'] . '" alt="Imagem de evento"></a>';

                }
    ?>

</body>
</html>
