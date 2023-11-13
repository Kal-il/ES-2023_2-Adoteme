
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>

</head>
<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
        margin-bottom: 10%;
    }
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    header {
        display: flex;
        background-color: #383464;
        flex-direction: row;
    }

    #logo {
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 5px;
        display: flex;
        flex-direction: row;
        color: white;
        align-items: center;
        justify-content: space-between;

    }

    #logo,
    nav {
        align-items: end;
    }

    #logo2 {
        margin: 10PX;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .nav-link {
        color: white;
    }

    h2 {
        font-size: 1.5em;
        margin: 0;
        padding: 0;
        margin-left: 20px;
    }
    button{
        margin: 10px;
        background-color: transparent;
        color: white;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;

    }
</style>

<body>
    <?php include __DIR__ . '/../../partials/Header.php'; ?>
    <main>
        <img src="src/view/assets/gatinho.png" alt="desenho de gato">
        <h1> Futura página inicial</h1>
        <h2> Oi, admin!!!</h2>
        <button><a href="CadastrarGato.php">Adicionar Gatos</a></button>
        <button><a href="/admin/gatos">Tabela de Gatos</a></button>
        <button><a href="/">Home Page do Usuário</a></button>
        <button><a href="/admin/adocoes">Página de Acompanhamento (Admin)</a></button>
    </main>


</body>
</html>
