<?php
use controller\LoginController;
 /**
        * Aqui é ocorrido a primeira verificação, se o botão de login foi clicado e se os dados não estão vazios, 
        * se não estiverem vazios, é instanciado um objeto da classe LoginController e é chamado o método Login() 
        * que está dentro da classe LoginController.
    */
require_once('C:\xampp\htdocs\ES-2023_2-Adoteme\src\controller\LoginController.php');
session_start();
if(isset($_POST['botaoLogin'])){

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];  
        $password = $_POST['password'];
        $login = new LoginController($email, $password);
        $login->Login();
    } else {
        $erros = [];

        if (empty($_POST['email'])) {
            $erros['email'] = "O campo de e-mail não pode estar vazio.";
        }

        if (empty($_POST['password'])) {
            $erros['senha'] = "O campo de senha não pode estar vazio.";
        }

        $_SESSION['erros'] = $erros;

        header("Location: /login");
    }
}
?>
