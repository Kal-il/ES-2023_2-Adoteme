<?php
    require 'C:\xampp\htdocs\ES-2023_2-Adoteme\vendor\autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    if (isset($_COOKIE['jwt_token'])) {
        $jwt_token = $_COOKIE['jwt_token'];
        $decoded = JWT::decode($jwt_token, new Key("test_key", 'HS256'));
        $decoded_array = (array) $decoded;
    } else {
        echo "<h1> faça login </h1>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Adoção</title>
</head>
<body>

    <form id="adocaoform" method="POST" action="../../controller/FormularioController.php">
        <input type="radio" value="Sim" class="" name="ja_adotou_conosco">
        <input type="radio" value="Não" class="" name="ja_adotou_conosco"><br><br>

        <select class="" name="tipo_endereco" form="adocaoform">
            <option>Residencial</option>
            <option>Comercial</option>
            <option>República/Pensão</option>
        </select><br><br>

        <input type="number" class="" name="num_adultos"><br>
        <input type="number" class="" name="num_criancas"><br>
        <input type="number" class="" name="idade_criancas"><br>    
        <input type="text" class="" name="motivo"><br><br>

        <input type="radio" class="" value="Casa aberta (o gatinho poderá entrar e sair livremente para passear)" name="tipo_casa">Casa aberta (o gatinho poderá entrar e sair livremente para passear)<br>
        <input type="radio" class="" value="Casa fechada (não vou deixar meu gato sair)" name="tipo_casa">Casa fechada (não vou deixar meu gato sair)<br>
        <input type="radio" class="" value="Casa de condomínio" name="tipo_casa">Casa de condomínio<br>
        <input type="radio" class="" value="Apartamento com telas" name="tipo_casa">Apartamento com telas<br>
        <input type="radio" class="" value="Apartamento sem telas" name="tipo_casa">Apartamento sem telas<br>
        <input type="radio" class="" value="Apartamento tipo cobertura com telas" name="tipo_casa">Apartamento tipo cobertura com telas<br>
        <input type="radio" class="" value="Apartamento tipo cobertura sem telas" name="tipo_casa">Apartamento tipo cobertura sem telas<br>
        <input type="radio" class="" value="Apartamento no andar térreo com área externa (quintal)" name="tipo_casa">Apartamento no andar térreo com área externa (quintal)<br>
        <input type="radio" class="" value="Apartamento no andar térreo sem área externa (quintal)" name="tipo_casa">Apartamento no andar térreo sem área externa (quintal)<br>
        
        <br>

        <input type="radio" class="" value="Sim" name="permissao_proprietario">Sim<br>
        <input type="radio" class="" value="Não" name="permissao_proprietario">Não<br>
        <input type="radio" class="" value="Minha casa é própria" name="permissao_proprietario">Minha casa é própria<br><br>

    
        <input type="checkbox" value="Piscina" class="" name="areas_casa[]">Piscina<br>
        <input type="checkbox" value="Lareira, churrasqueira ou forno de pizza" class="" name="areas_casa[]">Lareira, churrasqueira ou forno de pizza<br>
        <input type="checkbox" value="Alguma parte que não possa ser telada como, por exemplo, respiro do aquecedor a gás" class="" name="areas_casa[]">Alguma parte que não possa ser telada como, por exemplo, respiro do aquecedor a gás<br><br>

        <input type="radio" value="Sim" class="" name="ja_teve_gato">Sim<br>
        <input type="radio" value="Não" class="" name="ja_teve_gato">Não<br><br>

        <input type="text" class="" name="historico_gatos"><br><br>


        <input type="checkbox" value="tem-gato" class="" name="outros_animais[]">Sim, gato(s)<br>    
        Quantos?
        <input type="number" class="" name="qtd_gato"><br><br>

        <input type="checkbox" value="tem-cachorro" class="" name="outros_animais[]">Sim, cachorro(s)<br> 
        Quantos?
        <input type="number" class="" name="qtd_cachorro"><br>  <br>

        <input type="checkbox" value="tem-passaro" class="" name="outros_animais[]">Sim, pássaro(s)<br>  
        Quantos?
        <input type="number" class="" name="qtd_passaro"><br> <br>

        <input type="checkbox" value="tem-outro" class="" name="outros_animais[]">Sim, outro(s)<br>   
        Quantos?
        <input type="number" class="" name="qtd_outros"><br><br>

        <input type="checkbox" value="nao-tem" class="" name="outros_animais[]">Não<br>   <br>


        <input type="text" class="" name="tempo_planejamento"><br><br>
        
        <input type="radio" class="" value="Sim" name="consentimento">Sim<br>
        <input type="radio" class="" value="Não" name="consentimento">Não<br><br>

        <input type="text" class="" name="cuidado_viagem"><br><br>

        <input type="radio" class="" value="Sim" name="gastos">Sim<br>
        <input type="radio" class="" value="Não" name="gastos">Não<br><br>

        <input type="radio" class="" value="Sim" name="alergia">Sim<br>
        <input type="radio" class="" value="Não" name="alergia">Não<br><br>

        <input type="text" class="" name="se_descobrir_alergia"><br>
        <input type="text" class="" name="filho_descobrir_alergia"><br>
        <input type="text" class="" name="parceiro_descobrir_alergia"><br>
        <input type="text" class="" name="gravidez"><br>
        <input type="text" class="" name="se_arranhar"><br>
        <input type="text" class="" name="se_fugir"><br>
        <input type="text" class="" name="se_nao_puder_cuidar"><br>
        <input type="text" class="" name="mudanca"><br>
        <input type="text" class="" name="motivos_doacao"><br> <br>

        <input type="radio" class="" value="Sim" name="consciente_adaptacao">Sim<br>
        <input type="radio" class="" value="Não" name="consciente_adaptacao">Não<br>
        <br>

        <input type="radio" class="" value="Sim" name="quarto_adaptacao">Sim<br>
        <input type="radio" class="" value="Não" name="quarto_adaptacao">Não<br><br>

        <input type="radio" class="" value="Sim" name="compromisso_idade">Sim<br>
        <input type="radio" class="" value="Não" name="compromisso_idade">Não<br>
        <input type="radio" class="" value="Não sei" name="compromisso_idade">Não sei<br><br>

        <input type="radio" class="" value="Sim" name="consciente_custo">Sim<br>
        <input type="radio" class="" value="Não" name="consciente_custo">Não<br>
        <input type="radio" class="" value="Não sei" name="consciente_custo">Não sei<br><br>

        <input type="text" class="" name="campo_opcional"><br>
        <input type="checkbox" class="" name="termos_uso"><br>
        <input type="submit" name="postForm">
    </form>
    
</body>
</html>