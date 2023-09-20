<?php
namespace controller;

require __DIR__ . '\..\..\vendor\autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class HomeController {
    public function validate_jwt_token(){
        $jwt_token = $_COOKIE['jwt_token'];
        
        $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));

        $decoded_array = (array) $decoded;
        echo '$decoded_array';
    }
}
?>