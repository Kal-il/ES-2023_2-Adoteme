<?php
namespace controller;

require_once '../models/Connection.php';
require_once '../models/FavoritosModel.php';
require_once '../controller/Controller.php';

use models\FormularioModel;
use controller\Controller;

require 'C:\xampp\htdocs\ES-2023_2-Adoteme\vendor\autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class FormularioController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function addFormulario($data){
        $this->formulario_model->CreateFormulario($this->connection, $data);
    }

    public function cleanFormulario($data){
        # Armazenando dados do campo "outros_animais" em JSON
        if(isset($data["outros_animais"])){
            $json = [];
            foreach ($data["outros_animais"] as $value){
                if($value=="nao-tem"){
                    $json[] = "Não tem outros animais em casa.";
                }
                if($value=="tem-gato"){
                    $json["gato"] = $data["qtd_gato"];
                }
                if($value=="tem-cachorro"){
                    $json["cachorro"] = $data["qtd_cachorro"];
                }
                if($value=="tem-passaro"){
                    $json["passaro"] = $data["qtd_passaro"];
                }
                if($value=="tem-outros"){
                    $json["outros"] = $data["qtd_outros"];
                }
            }

            $json = json_encode($json);
            $data["outros_animais"] = $json;
        }

        # Armazenando dados do campo "areas_casa" como string
        if(isset($data["areas_casa"])){
            $str = "";
            $index = 0;
            foreach ($data["areas_casa"] as $value){
                if($index > 0){
                    $str = $str . ";" . $value;
                    $index++;
                } else {
                    $str = $str . $value;
                    $index++;
                }
            }

            $data['areas_casa'] = $str;
        }

        # Armazenando dados do campo "ja_adotou" como booleano
        if(isset($data["ja_adotou"])){
            if($data["ja_adotou"] == "Sim"){
                $data["ja_adotou"] = 1;
            } else {
                $data["ja_adotou"] = 0;
            }
        }

        # Armazenando dados do campo "ja_teve_gato" como booleano
        if(isset($data["ja_teve_gato"])){
            if($data["ja_teve_gato"] == "Sim"){
                $data["ja_teve_gato"] = 1;
            } else {
                $data["ja_teve_gato"] = 0;
            }
        }

        # Armazenando dados do campo "consentimento" como booleano
        if(isset($data["consentimento"])){
            if($data["consentimento"] == "Sim"){
                $data["consentimento"] = 1;
            } else {
                $data["consentimento"] = 0;
            }
        }

        # Armazenando dados do campo "gastos" como booleano
        if(isset($data["gastos"])){
            if($data["gastos"] == "Sim"){
                $data["gastos"] = 1;
            } else {
                $data["gastos"] = 0;
            }
        }

        # Armazenando dados do campo "alergia" como booleano
        if(isset($data["alergia"])){
            if($data["alergia"] == "Sim"){
                $data["alergia"] = 1;
            } else {
                $data["alergia"] = 0;
            }
        }

        # Armazenando dados do campo "consciente_adaptacao" como booleano
        if(isset($data["consciente_adaptacao"])){
            if($data["consciente_adaptacao"] == "Sim"){
                $data["consciente_adaptacao"] = 1;
            } else {
                $data["consciente_adaptacao"] = 0;
            }
        }

        # Armazenando dados do campo "quarto_adaptacao" como booleano
        if(isset($data["quarto_adaptacao"])){
            if($data["quarto_adaptacao"] == "Sim"){
                $data["quarto_adaptacao"] = 1;
            } else {
                $data["quarto_adaptacao"] = 0;
            }
        }

        return $data;

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["postForm"])) {
        
        if (isset($_COOKIE['jwt_token'])) {
            $jwt_token = $_COOKIE['jwt_token'];
            $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));
            $decoded_array = (array) $decoded;

        } else {
            echo "<h1> faça login </h1>";
        }


        $data = [
            "id_usuario" => $decoded_array['user_id'],
            "id_gato" => $_GET['id'],
            "ja_adotou" => $_POST['ja_adotou_conosco'],
            "tipo_endereco" => $_POST['tipo_endereco'],
            "num_adultos" => $_POST['num_adultos'],
            "num_criancas" => $_POST['num_criancas'],
            "idade_criancas" => $_POST['idade_criancas'],
            "motivo" => $_POST['motivo'],
            "tipo_casa" => $_POST['tipo_casa'],
            "permissao_proprietario" => $_POST['permissao_proprietario'], 
            "areas_casa" => $_POST['areas_casa'],
            "ja_teve_gato" => $_POST['ja_teve_gato'],
            "historico_gatos" => $_POST['historico_gatos'],
            "outros_animais" => $_POST['outro_animais'],
            "tempo_planejamento" => $_POST['tempo_planejamento'],
            "consentimento" => $_POST['consentimento'], 
            "cuidado_viagem" => $_POST['cuidado_viagem'], 
            "gastos" => $_POST['gastos'], 
            "alergia" => $_POST['alergia'], 
            "se_descobrir_alergia" => $_POST['se_descobrir_alergia'],
            "filho_descobrir_alergia" => $_POST['filho_descobrir_alergia'],
            "parceiro_descobrir_alergia" => $_POST['parceiro_descobrir_alergia'],
            "gravidez" => $_POST['gravidez'],
            "se_arranhar" => $_POST['se_arranhar'],
            "se_fugir" => $_POST['se_fugir'],
            "se_nao_puder_cuidar" => $_POST['se_nao_puder_cuidar'],
            "mudanca" => $_POST['mudanca'], 
            "motivos_doacao" => $_POST['motivos_doacao'], 
            "consciente_adaptacao" => $_POST['consciente_adaptacao'], 
            "quarto_adaptacao" => $_POST['quarto_adaptacao'], 
            "compromisso_idade" => $_POST['compromisso_idade'],                     
            "consciente_custo" => $_POST['consciente_custo'],
            "campo_opcional" => $_POST['campo_opcional'],
            "termos_uso" => $_POST['termos_uso'],            
        ];

        if(isset($_POST["qtd_gato"])){
            $data["qtd_gato"] = $_POST["qtd_gato"];
        }

        if(isset($_POST["qtd_cachorro"])){
            $data["qtd_cachorro"] = $_POST["qtd_cachorro"];
        }

        if(isset($_POST["qtd_passaro"])){
            $data["qtd_passaro"] = $_POST["qtd_passaro"];
        }

        if(isset($_POST["qtd_outros"])){
            $data["qtd_outros"] = $_POST["qtd_outros"];
        }

        $formularioController = new FormularioController();
        $data = $formularioController->cleanFormulario($data);
        $formularioController->addFormulario($data);
    }
}



?>