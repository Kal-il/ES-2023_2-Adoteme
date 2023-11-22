<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos Beneficentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/src/view/css/HomePage.css">
    <link rel="stylesheet" type="text/css" href="/src/view/css/CadastroEventos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/script.js"></script>
</head>


<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php" ?>
    <main class="main">
        <a href="/eventos">
            <button>Voltar</button>
            
        </a>
    <form class="form" action="/eventos/cadastrar/process" method="POST" enctype="multipart/form-data">
    <label class="descricao" for="descricao">
        Nome do evento beneficente:
        <input class="inputInfo" type="text" name="nome" id="nome" placeholder="Nome do evento beneficente" maxlength="1000" required><br>
    </label>
    <label class="descricao" for="foto">
        Foto de divulgação do evento beneficente: <br>  
        <input name="foto" type=file  id="arquivo" />
    </label>
<br>
<br>
    <input type="submit" value="Cadastrar" name="cadastrar" class="btncadastrar">
</form>
</body>
</html>
