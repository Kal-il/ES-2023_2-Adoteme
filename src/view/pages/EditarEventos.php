<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar de Eventos Beneficentes</title>
    <link rel="stylesheet" type="text/css" href="/src/view/css/EditarEventos.css">
    <link rel="stylesheet" type="text/css" href="/src/view/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/script.js"></script>
</head>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php" ?>
    <main class="main">
        <!-- Botão de voltar -->
        <main class=FavoritosMain>
            <a href="javascript:history.back()">
                <button class=BackButtonFavorite>
                    Voltar
                </button>
            </a>
            <!-- Botão de voltar -->
            <form class="form " action="/eventos/editar/process/<?php echo explode('/', $_SERVER['REQUEST_URI'])[3]; ?>" method="POST"
                enctype="multipart/form-data">
                <label class="descricao" for="descricao">
                    Nome do evento beneficente:
                    <input class="inputInfo" type="text" name="nome" id="nome" placeholder="Nome do evento beneficente"
                        maxlength="1000" value="<?php echo $resultado[0]['nome']; ?>" required /><br>
                </label>
                <label class="descricao" for="foto">
                    Foto de divulgação do evento beneficente:
                    <br>
                    <input name="foto" type=file id="arquivo" />
                    <?php echo '<img src="/src/view/pages/pagesAdmin/' . $resultado[0]['foto'] . '"  alt="Foto do evento" width="100" height="100">' ?>
                </label>

                <input class="btnsubmit" type="submit" value="Editar" name="editar">
            </form>
</body>

</html>