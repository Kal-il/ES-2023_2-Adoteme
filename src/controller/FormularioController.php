<?php
namespace controller;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

class FormularioController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public static function carregar_formulario() {
		include 'JWTController.php';

		if ($user_id == 0) {
			header("Location: /login");
		}

        $controller = new FormularioController();

        $formulario_id = $controller->formulario_model->CheckFormularioExists($controller->connection, $user_id);

        if($formulario_id) {
            $formulario = $controller->formulario_model->GetFormularioByUserID($controller->connection, $user_id);
        }

        $gato_id = explode('/', $_SERVER['REQUEST_URI'])[3];

        include $_SERVER["DOCUMENT_ROOT"] . "/src/view/pages/FormPage.php";
    }

    public function processar_dados_formulario($user_id) {
        $data = [
            "id_usuario" => $user_id,
            "id_gato" => $id_gato,
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

        return $data;
    }

    public static function processar_formulario() {
        include 'JWTController.php';

        $formulario_controller = new FormularioController();
        $formulario_id = $formulario_controller->formulario_model->CheckFormularioExists($controller->connection, $user_id);

        if (!$formulario_id) {
            $data = processar_dados_formulario($user_id);
            $data = $formulario_controller->cleanFormulario($data);
            
            $formulario_id = $formulario_controller->addFormulario($data);
        }

        $id_gato = explode('/', $_SERVER['REQUEST_URI'])[4];

        $data_adocao = [
            "id_adotante" => $user_id,
            "id_gato" => $id_gato,
            "id_formulario" => $formulario_id,
        ];

        $formulario_controller->adocao_model->CreateAdocao($formulario_controller->connection, $data_adocao);

        header("Location: /adocoes/$id_gato");
    }

    public function addFormulario($data){
        $formulario_id = $this->formulario_model->CreateFormulario($this->connection, $data);

        return $formulario_id;
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

?>
