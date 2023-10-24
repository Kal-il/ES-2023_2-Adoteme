<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Adoção</title>
</head>
<body>

    <form id="adocaoform" method="POST" action="../controller/FormularioController.php">
        <input type="radio" value="adotou" class="" name="ja_adotou_conosco">
        <input type="radio" value="nao-adotou" class="" name="ja_adotou_conosco"><br><br>

        <select multiple="" class="" name="tipo_endereço" form="adocaoform">
            <option>Residencial</option>
            <option>Comercial</option>
            <option>República/Pensão</option>
        </select><br><br>

        <input type="number" class="" name="num_adultos"><br>
        <input type="number" class="" name="num_criancas"><br>
        <input type="mumber" class="" name="idade_criancas"><br>    
        <input type="text" class="" name="motivo"><br><br>

        <input type="radio" class="" value="aberta" name="tipo_casa">Casa aberta (o gatinho poderá entrar e sair livremente para passear)<br>
        <input type="radio" class="" value="fechada" name="tipo_casa">Casa fechada (não vou deixar meu gato sair)<br>
        <input type="radio" class="" value="condominio" name="tipo_casa">Casa de condomínio<br>
        <input type="radio" class="" value="com-tela" name="tipo_casa">Apartamento com telas<br>
        <input type="radio" class="" value="sem-tela" name="tipo_casa">Apartamento sem telas<br>
        <input type="radio" class="" value="cobertura-com-tela" name="tipo_casa">Apartamento tipo cobertura com telas<br>
        <input type="radio" class="" value="cobertura-sem-tela" name="tipo_casa">Apartamento tipo cobertura sem telas<br>
        <input type="radio" class="" value="terreo-com-quintal" name="tipo_casa">Apartamento no andar térreo com área externa (quintal)<br>
        <input type="radio" class="" value="terreo-sem-quintal" name="tipo_casa">Apartamento no andar térreo sem área externa (quintal)<br>
        
        <br>

        <input type="radio" class="" value="permissao1" name="permissao_proprietario">Sim<br>
        <input type="radio" class="" value="permissao2" name="permissao_proprietario">Não<br>
        <input type="radio" class="" value="permissao3" name="permissao_proprietario">Minha casa é própria<br><br>

    
        <input type="checkbox" value="area-casa-1" class="" name="areas_casa">Piscina<br>
        <input type="checkbox" value="area-casa-2" class="" name="areas_casa">Lareira, churrasqueira ou forno de pizza<br>
        <input type="checkbox" value="area-casa-3" class="" name="areas_casa">Alguma parte que não possa ser telada como, por exemplo, respiro do aquecedor a gás<br><br>

        <input type="radio" value="ja-teve" class="" name="ja_teve_gato">Sim<br>
        <input type="radio" value="nao-teve" class="" name="ja_teve_gato">Não<br><br>

        <input type="text" class="" name="historico_gatos"><br><br>


        <input type="checkbox" value="tem-gato" class="" name="outro_animais">Sim, gato(s)<br>    
        Quantos?
        <input type="number" class="" name="outro_animais_qtd_gato"><br><br>

        <input type="checkbox" value="tem-cachorro" class="" name="outro_animais">Sim, cachorro(s)<br> 
        Quantos?
        <input type="number" class="" name="outro_animais_qtd_cachorro"><br>  <br>

        <input type="checkbox" value="tem-passaro" class="" name="outro_animais">Sim, pássaro(s)<br>  
        Quantos?
        <input type="number" class="" name="outro_animais_qtd_passaro"><br> <br>

        <input type="checkbox" value="tem-outro" class="" name="outro_animais">Sim, outro(s)<br>   
        Quantos?
        <input type="number" class="" name="outro_animais_qtd_outro"><br><br>

        <input type="checkbox" value="nao-tem" class="" name="outro_animais">Não<br>   <br>


        <input type="text" class="" name="tempo_planejamento"><br><br>
        
        <input type="radio" class="" value="consentimento1" name="consentimento">Sim<br>
        <input type="radio" class="" value="consentimento2" name="consentimento">Não<br><br>

        <input type="text" class="" name="cuidado_viagem"><br><br>

        <input type="radio" class="" value="gastos1" name="gastos">Sim<br>
        <input type="radio" class="" value="gastos2" name="gastos">Não<br><br>

        <input type="radio" class="" value="alergia1" name="alergia">Sim<br>
        <input type="radio" class="" value="alergia2" name="alergia">Não<br><br>

        <input type="text" class="" name="se_descobrir_alergia"><br>
        <input type="text" class="" name="filho_descobrir_alergia"><br>
        <input type="text" class="" name="parceiro_descobrir_alergia"><br>
        <input type="text" class="" name="gravidez"><br>
        <input type="text" class="" name="se_arranhar"><br>
        <input type="text" class="" name="se_fugir"><br>
        <input type="text" class="" name="se_nao_puder_cuidar"><br>
        <input type="text" class="" name="mudanca"><br>
        <input type="text" class="" name="motivos_doacao"><br> <br>

        <input type="radio" class="" value="consciente_adaptacao1" name="consciente_adaptacao">Sim<br>
        <input type="radio" class="" value="consciente_adaptacao2" name="consciente_adaptacao">Não<br>
        <br>

        <input type="radio" class="" value="quarto_adaptacao1" name="quarto_adaptacao">Sim<br>
        <input type="radio" class="" value="quarto_adaptacao2" name="quarto_adaptacao">Não<br><br>

        <input type="radio" class="" value="compromisso_idade1" name="compromisso_idade">Sim<br>
        <input type="radio" class="" value="compromisso_idade2" name="compromisso_idade">Não<br>
        <input type="radio" class="" value="compromisso_idade3" name="compromisso_idade">Não sei<br><br>

        <input type="radio" class="" value="consciente_custo1" name="consciente_custo">Sim<br>
        <input type="radio" class="" value="consciente_custo2" name="consciente_custo">Não<br>
        <input type="radio" class="" value="consciente_custo3" name="consciente_custo">Não sei<br><br>

        <input type="text" class="" name="campo_opcional"><br>
        <input type="checkbox" class="" name="termos_uso"><br>
        <input type="submit">
    </form>
    
</body>
</html>