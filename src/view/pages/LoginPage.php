
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drugstore</title>
    <h1> Romeana's Drugstore teste </h1>
</head>
<body>
<form action="LoginPage.php" method="POST">
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email">
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="botaoLogin">Entrar</button>
</form>
</body>
</html>
