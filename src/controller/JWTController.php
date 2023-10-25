<?php

require 'C:\xampp\htdocs\ES-2023_2-Adoteme\vendor\autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['jwt_token'])) {
    $jwt_token = $_COOKIE['jwt_token'];
    $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));
    $decoded_array = (array) $decoded;
} else {
    echo "<h1> faça login </h1>";
}

?>