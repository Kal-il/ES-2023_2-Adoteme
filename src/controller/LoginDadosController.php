<?php
use controller\LoginController;
 /**
        * Aqui é ocorrido a primeira verificação, se o botão de login foi clicado e se os dados não estão vazios, 
        * se não estiverem vazios, é instanciado um objeto da classe LoginController e é chamado o método Login() 
        * que está dentro da classe LoginController.
    */
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/src/controller/LoginController.php');
if(isset($_POST['botaoLogin'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];  
        $password = $_POST['password'];
        $login = new LoginController($email, $password);
        $resultado_login = $login->Login();
    } else {
        echo "<h1>Por favor, insira informações válidas.</h1>";
    }
}
?>