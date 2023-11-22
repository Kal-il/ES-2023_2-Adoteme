<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/view/css/Eventos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>ListarEventos</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/controller/JWTController.php'; ?>
    <h1>Eventos Beneficentes</h1>
    <div class="container">
        <?php if ($is_superuser) : ?>
            <div class="btn-container">
                <input type="button" class="btn btn-primary" value="Cadastrar Evento" onclick="window.location.href='/eventos/cadastrar'">
            </div>
        <?php endif; ?>

        <?php foreach ($allEventos as $evento) : ?>
            <div class="polaroid">
                <?php if (!empty($evento['foto'])) : ?>
                    <h2><?php echo $evento['nome']; ?></h2>
                    <a class="link-img-test" href="#">
                        <img class="img-test" src="/src/view/pages/pagesAdmin/<?php echo $evento['foto']; ?>" alt="Imagem de evento">
                    </a>

                    <?php if ($is_superuser) : ?>
                        <a href="/eventos/editar/<?php echo $evento["id"]; ?>"><button class="btn btn-primary">Editar</button></a>
                        <a href="/eventos/deletar/<?php echo $evento["id"]; ?>"><button class="btn btn-primary">Deletar</button></a>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>