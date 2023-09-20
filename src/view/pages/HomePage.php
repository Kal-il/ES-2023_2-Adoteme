<?php
    require '..\..\..\vendor\autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $jwt_token = $_COOKIE['jwt_token'];
        
    $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));

    $decoded_array = (array) $decoded;
    echo $decoded_array['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <h1> Futura pragina inicial</h1>
    
</head>
<body>
<img src="../assets/gatinho.png" alt="desenho de gato">
</body>
</html>