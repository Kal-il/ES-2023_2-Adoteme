<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['jwt_token'])) {
    $jwt_token = $_COOKIE['jwt_token'];
    $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));
    $decoded_array = (array) $decoded;

    $user_id = $decoded_array['user_id'];
    $is_superuser = $decoded_array['is_superuser'];
} else {
    $user_id = 0;
    $is_superuser = 0;
}

?>
