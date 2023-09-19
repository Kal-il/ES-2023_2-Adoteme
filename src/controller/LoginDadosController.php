<?php
use controller\LoginController;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/src/controller/LoginController.php');
if(isset($_POST['botaoLogin'])){
    if(!empty($_POST['text']) && !empty($_POST['password'])){
        $email = $_POST['email'];  
        $password = $_POST['password'];
        $login = new LoginController($email, $password);
        $resultado_login = $login->Login();
        if ($resultado_login){
            header('Location: ../view/HomePage.php');
        } else {
            echo "<h1>Usuário ou senha inválidos.</h1>";
        }
    } else {
        echo "<h1>Por favor, insira informações válidas.</h1>";
    }
}
?>