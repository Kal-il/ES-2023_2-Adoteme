<?php
require '..\..\..\..\vendor\autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['jwt_token'])) {
    $jwt_token = $_COOKIE['jwt_token'];
    $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));

    $decoded_array = (array) $decoded;
    echo $decoded_array['email'];
} else {
    echo "<h1> faça login </h1>";
}
?>


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
    <header>
        <div id="logo">
            <div id="logo2">
                <a href="HomePage.php">
                    <img class="image" src="../../assets/adoteme.png" alt="Logo Adoteme" width="60" height="60">
                </a>
                <h2 class="adoteme">Adoteme</h2>
            </div>
            <nav>
                <ul class="nav nav-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="HomePage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="pagesAdmin/HomePageAdmin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="SinginPage.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Profile</a>
                        </li>
                    </ul>
            </nav>

        </div>
    </header>
    <main>
            <img src="../../assets/gatinho.png" alt="desenho de gato">
    <h1> Futura página inicial</h1>
    <h2> Oi, admin!!!</h2>
    <button><a href="CadastrarGato.php">Adicionar Gatos</a></button>
    <button><a href="TabelaAnimais.php">Tabela de Gatos</a></button>
    <button><a href="../HomePage.php">Home Page do Usuário</a></button>
    </main>


</body>

</html>