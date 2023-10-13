<?php
require '..\..\..\vendor\autoload.php';

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/HomePage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>HomePage</title>
</head>

<body>
    <header>
        <a href="HomePage.php">
            <img class="image" src="../assets/adoteme.png" alt="Logo Adotme" width="60" height="60">
        </a>
        <h2 class="adoteme">Adoteme</h2>
    </header>
    <main>
        <section class="search">
            <form action="" method="post">
                <input type="text" name="search" id="search" placeholder="Pesquisar">
                <button type="submit">Pesquisar</button>
            </form>
        </section>
        <section class="gallery">
            <div class="polaroide">
                <img class="img-test" src="../assets/gato2.jpg" alt="imagem de gato">
                <p class="info-cat">Gatinho exemplo
                    <span class="material-symbols-outlined">
                        favorite
                    </span>
                </p>
            </div>
            <div class="polaroide">
                <img class="img-test" src="../assets/images.jpeg" alt="imagem de gato">
                <p class="info-cat">Gatinho exemplo
                    <span class="material-symbols-outlined">
                        favorite
                    </span>
                </p>
            </div>
            <div class="polaroide">
                <img class="img-test" src="../assets/gato2.jpg" alt="imagem de gato">
                <p class="info-cat">Gatinho exemplo
                    <span class="material-symbols-outlined">
                        favorite
                    </span>
                </p>
            </div>
            <div class="polaroide">
                <img class="img-test" src="../assets/gato2.jpg" alt="imagem de gato">
                <p class="info-cat">Gatinho exemplo
                    <span class="material-symbols-outlined">
                        favorite
                    </span>
                </p>
            </div>
            <div class="polaroide">
                <img class="img-test" src="../assets/gato2.jpg" alt="imagem de gato">
                <p class="info-cat">Gatinho exemplo
                    <span class="material-symbols-outlined">
                        favorite
                    </span>
                </p>
            </div>

        </section>
    </main>
    <footer>
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>