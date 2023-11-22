<?php
namespace controller;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Firebase\JWT\JWT;

 /*
        * Aqui é implementada toda a lógica de negócio do login, é feita a validação dos campos,
        * a conexão com o banco de dados e a verificação se o usuário existe no banco de dados.
        * caso o usuário exista, é redirecionado para a página inicial, caso não exista, é redirecionado
        * para a página de login com uma mensagem de erro.
    */

class LoginController extends Controller{
    private $email;
    private $password;
    private $resultado_login;

    public function __construct($email, $password){
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public static function carregar_login() {
		session_start();

        include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/LoginPage.php";
    }

    public static function processar_login() {
        if(isset($_POST['botaoLogin'])){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $email = $_POST['email'];  
                $password = $_POST['password'];

                $login = new LoginController($email, $password);
                $login->Login($email, $password);
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
    }

    public function Login(){
        $data = [
            "email" => $this->email,
            "password" => $this->password,
        ];

        $this->resultado_login = $this->user_model->Login($this->connection, $data);
        $user_id = $this->user_model->GetIDByEmail($this->connection, $this->email);
        $is_superuser = $this->user_model->IsSuperuser($this->connection, $data);

        if ($this->resultado_login){
            // Caso o login tenha sucesso, será gerado um token JWT:
            $payload = [
                "exp" => time() + 3600,
                "iat" => time(),
                "user_id" => $user_id,
                "is_superuser" => $is_superuser,
            ];

            // Uso de Chave temporária "test_key"

            $token = JWT::encode($payload, "test_key", "HS256");
            setcookie('jwt_token', $token, time() + 3600, '/');

            if ($this->user_model->IsSuperuser($this->connection, $data)){
                header("Location: /admin");
            }else{
                header("Location: /");
            }
            
        } else {    
            $_SESSION['campos_invalidos'] = "E-mail ou senha estão errados.";

            header("Location: /login");
        }
    }
}
?>
