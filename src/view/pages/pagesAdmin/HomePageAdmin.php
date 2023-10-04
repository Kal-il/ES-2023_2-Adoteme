<?php
    require '..\..\..\..\vendor\autoload.php';
    
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    if(isset($_COOKIE['jwt_token'])){
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
    <title>HomePage</title>
    <h1> Futura página inicial</h1>
    <h2> Oi, admin!!!</h2>
    <button><a href="CadastrarGato.php">Adicionar Gatos</a></button>
    <button><a href="TabelaAnimais.php">Tabela de Gatos</a></button>
</head>
<body>
<img src="../../assets/gatinho.png" alt="desenho de gato">
</body>
</html>