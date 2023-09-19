
<?php
use controller\LoginDadosController;







?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoteme</title>
    <h1> Login</h1>
</head>
<body>
<form action="../../controller/LoginDadosController.php" method="POST">
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email">
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="botaoLogin">Entrar</button>
</form>
</body>
</html>
