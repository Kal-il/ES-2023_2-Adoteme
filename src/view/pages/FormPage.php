<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="/src/view/css/FormPage.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<html>
   
    <meta charset="UTF-8">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/view/partials/Header.php'; ?>

    <?php 
        
        echo '<form id="adocaoform" method="POST" action="process/' . $gato_id . '">';
    ?>

    <div id="titulo-formulario">
        <label class="tituloform">Formulário de Adoção</label>
    </div>


    <!-- Seção 1: Adoção -->
    <div class="form-section">
        <label class="bold-label">🤝 Já adotou conosco?</label>
        <div class="radio-options">
			<input type="radio" value="Sim" class="" name="ja_adotou_conosco" <?php if($formulario["ja_adotou_conosco"]=='t') echo 'checked';  ?>>
            <label>Sim</label>
        </div>
        <div class="radio-options">
            <input type="radio" value="Não" class="" name="ja_adotou_conosco" <?php if(!$formulario["ja_adotou_conosco"]=='f') echo 'checked';  ?>>
            <label>Não</label>
        </div>
    </div>


    <!-- Seção 2: Tipo de Endereço -->
    <div class="form-section">
        <label class="bold-label">🏢 Tipo de Endereço</label>
        <select class="" name="tipo_endereco" form="adocaoform">
			<option <?php if($formulario["tipo_endereco"] == "Residencial") echo 'selected'; ?>>Residencial</option>
            <option <?php if($formulario["tipo_endereco"] == "Comercial") echo 'selected'; ?>>Comercial</option>
            <option <?php if($formulario["tipo_endereco"] == "República") echo 'selected'; ?>>República/Pensão</option>
        </select>
    </div>

    <!-- Seção 3: Número de Pessoas no Lar -->
    <div class="form-section form-section-seila">
        <label class="bold-label">👨‍👩‍👧‍👦 Número de Pessoas no Lar</label>
        <div class="form-option">
            
			<input placeholder="Adultos" type="number" class="" name="num_adultos" value="<?php echo $formulario['num_adultos']; ?>">
        </div>

        <div class="form-option">
            
            <input placeholder="Crianças" type="number" class="" name="num_criancas" value="<?php echo $formulario['num_criancas']; ?>">
        </div>

        <div class="form-option">
            
            <input placeholder="Idade das crianças" type="number" class="" name="idade_criancas" value="<?php echo $formulario['idade_criancas']; ?>">
        </div>
    </div>

    <div class="form-section">
        <label class="bold-label">🐱 Por que você deseja adotar um gato?</label><br>
        <textarea rows="5"  class="custom-textbox" name="motivo" value=""><?php echo $formulario['motivo']; ?></textarea>
    </div>


    <!-- Seção 4: Tipo de Casa -->
    <div class="form-section">
        <label class="bold-label">🏡 Qual o tipo de sua casa?</label><br>
		<input type="radio" class="" value="Casa aberta (o gatinho poderá entrar e sair livremente para passear)" name="tipo_casa"<?php if($formulario['tipo_casa'] == "Casa aberta (o gatinho poderá entrar e sair livremente para passear)") echo 'checked';?>>
        <label>Casa aberta (o gatinho poderá entrar e sair livremente para passear)</label><br>

        <input type="radio" class="" value="Casa fechada (não vou deixar meu gato sair)" name="tipo_casa" value="<?php if($formulario['tipo_casa'] == "Casa fechada (não vou deixar meu gato sair)") echo 'checked';?>">
        <label>Casa fechada (não vou deixar meu gato sair)</label><br>

        <input type="radio" class="" value="Casa de condomínio" name="tipo_casa" <?php if($formulario['tipo_casa'] == "Casa de condomínio") echo 'checked'; ?>>
        <label>Casa de condomínio</label><br>

        <input type="radio" class="" value="Apartamento com telas" name="tipo_casa" <?php if($formulario['tipo_casa'] == "Casa de condomínio") echo 'checked';?>>
        <label>Apartamento com telas</label><br>

        <input type="radio" class="" value="Apartamento sem telas" name="tipo_casa" <?php if($formulario['tipo_casa'] == "Apartamento sem telas") echo 'checked';?>>
        <label>Apartamento sem telas</label><br>

        <input type="radio" class="" value="Apartamento tipo cobertura com telas" name="tipo_casa" <?php if($formulario['tipo_casa'] == "Apartamento tipo cobertura com telas") echo 'checked';?>> 
        <label>Apartamento tipo cobertura com telas</label><br>

        <input type="radio" class="" value="Apartamento tipo cobertura sem telas" name="tipo_casa" <?php if($formulario['tipo_casa'] == "Apartamento tipo cobertura sem telas") echo 'checked';?>>
        <label>Apartamento tipo cobertura sem telas</label><br>

        <input type="radio" class="" value="Apartamento no andar térreo com área externa (quintal)" name="tipo_casa" <?php if($formulario['tipo_casa'] == "Apartamento no andar térreo com área externa (quintal)") echo 'checked';?>>
        <label>Apartamento no andar térreo com área externa (quintal)</label><br>

        <input type="radio" class="" value="Apartamento no andar térreo sem área externa (quintal)" name="tipo_casa" <?php if($formulario['tipo_casa'] == "Apartamento no andar térreo sem área externa (quintal)") echo 'checked';?>>
        <label>Apartamento no andar térreo sem área externa (quintal)</label><br>
    </div>


    <!-- Seção 5: Permissão do Proprietário -->
    <div class="form-section">
        <label class="bold-label">⚠️ O proprietário permite ter animais?</label><br>
        <input type="radio" class="" value="Sim" name="permissao_proprietario" <?php if($formulario['permissao_proprietario'] == "Sim") echo 'checked';?>>
        <label>Sim</label><br>

        <input type="radio" class="" value="Não" name="permissao_proprietario" <?php if($formulario['permissao_proprietario'] == "Não") echo 'checked';?>>
        <label>Não</label><br>

        <input type="radio" class="" value="Não sei" name="permissao_proprietario" <?php if($formulario['permissao_proprietario'] == "Não sei") echo 'checked';?>>
        <label>Minha casa é própria</label><br><br>
    </div>


    <!-- Seção 6: Áreas Específicas na Casa -->
    <div class="form-section checkbox-section">
		<?php
		if (isset($formulario['areas_casa'])) {
			$areas_casa = explode(',', $formulario['areas_casa']);
		}
		?>
        <label class="bold-label">🏊 Áreas Específicas na Casa</label><br>
		<input type="checkbox" value="Piscina" class="" name="areas_casa[]" <?php if(in_array("Piscina", $areas_casa)) echo 'checked'; ?>>
        <label>Piscina</label><br>

        <input type="checkbox" value="Lareira, churrasqueira ou forno de pizza" class="" name="areas_casa[]"<?php if(in_array("Lareira, churrasqueira ou forno de pizza", $areas_casa)) echo 'checked'; ?>>
        <label>Lareira, churrasqueira ou forno de pizza</label><br>

        <input type="checkbox" value="Alguma parte que não possa ser telada como, por exemplo, respiro do aquecedor a gás" class="" name="areas_casa[]"<?php if(in_array("Alguma parte que não possa ser telada como, por exemplo, respiro do aquecedor a gás", $areas_casa)) echo 'checked'; ?>>
        <label id="desgraça">Alguma parte que não possa ser telada como, por exemplo, respiro do aquecedor a gás</label><br><br>
    </div>


    <!-- Seção 7: Histórico com Gatos -->
    <div class="form-section">
        <label class="bold-label">🐱 Já teve gato(s) anteriormente?</label><br>
        <input type="radio" value="Sim" class="ja-teve-radio" name="ja_teve_gato" <?php if($formulario['ja_teve'] == "t") echo 'checked';?>>
        <label>Sim</label><br>

        <input type="radio" value="Não" class="nao-teve-radio" name="ja_teve_gato"<?php if($formulario['ja_teve'] == "f") echo 'checked';?>>
        <label>Não</label><br>

        <!-- Campo de entrada condicional -->
        <div id="quantidade-gatos-div" style="display: none;">
            <label class="bold-label">Quantos?</label>
            <input type="number" class="" name="quantidade_gatos">
        </div>
    </div>

    <div class="form-section">
        <label class="bold-label">O que aconteceu com seus gatos?</label><br>
		<textarea rows="5"  class="custom-textbox" name="historico_gatos"> <?php if(isset($formulario['historico_gatos'])) echo $formulario['historico_gatos']; ?></textarea>
    </div>


    <!-- Seção 8: Outros Animais -->
    <div class="form-section">
        <label class="bold-label">🐾 Possui outros animais?</label><br>
		<?php
			$outros_animais = json_decode($formulario['outro_animais'], true);
		?>
		<input type="checkbox" value="tem-gato" class="outros-animais-checkbox" name="outro_animais[]" <?php if(isset($outros_animais['gato'])) echo 'checked'?>>
        <label>Sim, gato(s) 🐶</label><br>

        <div class="outros-animais-qtd" style="<?php if(isset($outros_animais['gato'])) { echo 'display: block;'; }else { echo 'display: none;'; }?>">
            Quantos?
            <input type="number" class="" name="qtd_gato" value="<?php if(isset($outros_animais['gato'])) echo $outros_animais['gato']?>">
        </div>
      
        <input type="checkbox" value="tem-cachorro" class="outros-animais-checkbox" name="outro_animais[]"<?php if(isset($outros_animais['cachorro'])) echo 'checked'?>>
        <label>Sim, cachorro(s) 🐶</label><br>

        <div class="outros-animais-qtd" style="<?php if(isset($outros_animais['cachorro'])) { echo 'display: block;'; }else { echo 'display: none;'; }?>">
            Quantos?
            <input type="number" class="" name="qtd_cachorro" <?php if(isset($outros_animais['cachorro'])) echo $outros_animais['cachorro']; ?>>
        </div>

        <input type="checkbox" value="tem-passaro" class="outros-animais-checkbox" name="outro_animais[]"<?php if(isset($outros_animais['passaro'])) echo 'checked'?>>
        <label>Sim, pássaro(s) 🐤</label><br>

        <div class="outros-animais-qtd" style="<?php if(isset($outros_animais['passaro'])) { echo 'display: block;'; }else { echo 'display: none;'; }?>">
            Quantos?
            <input type="number" class="" name="qtd_cachorro" <?php if(isset($outros_animais['passaro'])) echo $outros_animais['cachorro']; ?>>
        </div>

        <div class="outros-animais-qtd" style="<?php if(isset($outros_animais['passaro'])) { echo 'display: block;'; }else { echo 'display: none;'; }?>">
            Quantos?
            <input type="number" class="" name="qtd_cachorro" <?php if(isset($outros_animais['passaro'])) echo $outros_animais['cachorro']; ?>>
        </div>

		<input type="checkbox" value="tem-outro" class="outros-animais-checkbox" name="outro_animais[]" <?php if(isset($outros_animais['tem-outros'])) echo 'checked'; ?>>
        <label>Sim, outros animais 🤔</label><br>

        <!-- Campo de entrada para especificar outros animais -->
        <div class="outros-animais-qtd" style="<?php if(isset($outros_animais['tem-outros'])) { echo 'display: block;'; }else { echo 'display: none;'; } ?>">
            Quantos?
            <input type="number" class="" name="qtd_outros" <?php if(isset($outros_animais['tem-outros'])) echo $outros_animais['tem-outros']; ?>>
        </div>
      
		<input type="checkbox" value="nao-tem" class="outros-animais-checkbox" name="outro_animais" <?php if(isset($outros_animais['nao-tem'])) echo 'checked'; ?> >
        <label>Não ❌</label><br>
    </div>


    <!-- Seção 9: Informações Adicionais -->
    <div class="form-section">
        <label class="bold-label">🤔 Há quanto tempo planeja adotar um gatinho?</label>
		<textarea rows="5"   class="custom-textbox" name="tempo_planejamento"><?php echo $formulario['tempo_planejamento']; ?></textarea>
        <!-- ... (mais inputs de informações adicionais aqui) -->
    </div>

    <!-- Seção 10: Consentimento -->
    <div class="form-section">
        <label class="bold-label">😁 Seus familiares e pessoas que moram com você estão sabendo e concordam com a adoção?</label><br>
		<input type="radio" class="" value="Sim" name="consentimento" <?php if($formulario['consentimento'] == "t") echo 'checked'; ?>>
        <label>Sim</label><br>
        <input type="radio" class="" value="Não" name="consentimento" <?php if($formulario['consentimento'] == "f") echo 'checked'; ?>>
        <label>Não</label><br>
    </div>


    <!-- Seção 11: Quem cuidará do gato em caso de viagem -->
    <div class="form-section">
        <label class="bold-label">✈️ Quem cuidará do gato em caso de viagem?</label><br>
		<textarea rows="5"  class="custom-textbox" name="cuidado_viagem"><?php echo $formulario['cuidado_viagem'] ?></textarea>
    </div>

    <!-- Seção 12: Condições para Cobrir os Custos -->
    <div class="form-section">
        <label class="bold-label">💰 Você tem condições de acrescentar no seu orçamento os gastos que terá com alimentação de boa qualidade
            (aproximadamente R$ 120 por mês), vacinas e atendimento veterinário (aproximadamente R$ 250
            anualmente)?</label><br>
        <input type="radio" class="" value="Sim" name="gastos"<?php if($formulario['gastos'] == "t") echo 'checked'; ?>>
        <label>Sim</label><br>
        <input type="radio" class="" value="Não" name="gastos"<?php if($formulario['gastos'] == "f") echo 'checked'; ?>>
        <label>Não</label><br>
    </div>

    <!-- Seção 13: Alguém em Casa Tem Alergia? -->
    <div class="form-section">
        <label class="bold-label">🤒 Alguém em casa tem alergia?</label><br>
        <input type="radio" class="" value="Sim" name="alergia"<?php if($formulario['alergia'] == "t") echo 'checked'; ?>>
        <label>Sim</label><br>
        <input type="radio" class="" value="Não" name="alergia"<?php if($formulario['alergia'] == "f") echo 'checked'; ?>>
        <label>Não</label><br>
    </div>

    <!-- Seção 14: O Que Fará em Diferentes Situações -->
    <div class="form-section">
        <label class="bold-label">😱 O que fará se você se descobrir alérgico a gatos?</label><br>
		<textarea rows="5"  class="custom-textbox" name="se_descobrir_alergia"> <?php echo $formulario['se_descobrir_alergia']; ?></textarea><br><br> 

        <label class="bold-label">😰 O que fará se descobrir que seu filho(a) é alérgico a gatos?</label><br>
        <textarea rows="5"  class="custom-textbox" name="filho_descobrir_alergia"><?php echo $formulario['filho_descobrir_alergia']; ?></textarea><br><br>

        <label class="bold-label">🤔 O que fará se começar a se relacionar com alguém que não goste ou seja alérgico a gatos?</label><br>
        <textarea rows="5"  class="custom-textbox" name="parceiro_descobrir_alergia"><?php echo $formulario['parceiro_descobrir_alergia']; ?></textarea><br><br>

        <label class="bold-label">👶 O que fará com o gatinho se alguém na casa engravidar?</label><br>
        <textarea rows="5"  class="custom-textbox" name="gravidez"><?php echo $formulario['gravidez']; ?></textarea><br><br>

        <label class="bold-label">👦 O que fará se o gato arranhar seu filho?</label><br>
        <textarea rows="5"  class="custom-textbox" name="se_arranhar"><?php echo $formulario['se_arranhar']; ?></textarea><br><br>

        <label class="bold-label">😨 O que fará se o seu gato fugir?</label><br>
        <textarea rows="5"  class="custom-textbox" name="se_fugir"><?php echo $formulario['se_fugir']; ?></textarea><br><br>

        <label class="bold-label">😿 O que fará se não puder mais cuidar do gatinho?</label><br>
        <textarea rows="5"  class="custom-textbox" name="se_nao_puder_cuidar"><?php echo $formulario['se_nao_puder_cuidar']; ?></textarea><br><br>

        <label class="bold-label">✈️ O que fará se tiver que mudar de cidade ou país?</label><br>
        <textarea rows="5"  class="custom-textbox" name="mudanca"><?php echo $formulario['mudanca']; ?></textarea><br><br>

        <label class="bold-label">🙀 Por quais motivos você devolveria o gatinho?</label><br>
        <textarea rows="5"  class="custom-textbox" name="motivos_doacao"><?php echo $formulario['motivos_doacao']; ?></textarea><br><br>
    </div>

    <!-- Seção 15: Adaptação para Gatos Existente -->
    <div class="form-section">
        <label class="bold-label">😸 Se você já possui um gato e está adotando um novo, está ciente que será necessária uma adaptação que pode
            levar de 10 dias a 1 ano, dependendo da personalidade de ambos?</label><br>
		<input type="radio" class="" value="Sim" name="consciente_adaptacao" <?php if($formulario['consciente_adaptacao'] == 't') echo 'checked'; ?>>
        <label>Sim</label><br>
        <input type="radio" class="" value="Não" name="consciente_adaptacao"<?php if($formulario['consciente_adaptacao'] == 'f') echo 'checked'; ?>>
        <label>Não</label><br>
    </div>

    <!-- Seção 16: Cômodo Separado para Adaptação -->
    <div class="form-section">
        <label class="bold-label">Se você respondeu “Sim” para a pergunta acima, tem um cômodo separado em casa caso seja necessário
            separá-los no começo?</label><br>
        <input type="radio" class="" value="Sim" name="quarto_adaptacao"<?php if($formulario['quarto_adaptacao'] == 't') echo 'checked'; ?>>
        <label>Sim</label><br>
        <input type="radio" class="" value="Não" name="quarto_adaptacao"<?php if($formulario['quarto_adaptacao'] == 'f') echo 'checked'; ?>>
        <label>Não</label><br>
    </div>

    <!-- Seção 17: Compromisso de Longo Prazo -->
    <div class="form-section">
        <label class="bold-label">😼 Gatos podem viver 15 anos ou mais. Você está preparado para este compromisso?</label><br>
        <input type="radio" class="" value="Sim" name="compromisso_idade" <?php if($formulario['compromisso_idade'] == 'Sim') echo 'checked'; ?>>
        <label>Sim</label><br>
        <input type="radio" class="" value="Não" name="compromisso_idade"<?php if($formulario['compromisso_idade'] == 'Não') echo 'checked'; ?>>
        <label>Não</label><br>
        <input type="radio" class="" value="Não sei" name="compromisso_idade"<?php if($formulario['compromisso_idade'] == 'Não sei') echo 'checked'; ?>>
        <label>Não sei</label><br>
    </div>

    <!-- Seção 18: Conscientização sobre Custos de Saúde -->
    <div class="form-section">
        <label class="bold-label">😿 Você está ciente que, em qualquer fase da vida, o gato que você está adotando pode adoecer ou desenvolver
            algum problema crônico de saúde, e com isso precisar de consultas veterinárias, exames periódicos, remédios
            e possivelmente internação?</label><br>
        <input type="radio" class="" value="Sim" name="consciente_custo"<?php if($formulario['consciente_custo'] == 'Sim') echo 'checked'; ?>>
        <label>Sim</label><br>
        <input type="radio" class="" value="Não" name="consciente_custo"<?php if($formulario['consciente_custo'] == 'Não') echo 'checked'; ?>>
        <label>Não</label><br>
        <input type="radio" class="" value="Não sei" name="consciente_custo"<?php if($formulario['consciente_custo'] == 'Não sei') echo 'checked'; ?>>
        <label>Não sei</label><br>
    </div>

    <!-- Campo Opcional para Comentários -->
    <div class="form-section">
        <label class="bold-label">🧾 Campo opcional para comentários:</label><br>
		<textarea rows="5"  class="custom-textbox" name="campo_opcional"><?php echo $formulario['campo_opcional']; ?></textarea>
    </div>


    <!-- Seção 12: Botões de Envio e Termos -->
    <div class="form-buttons-container">
        <div class="checkbox-wrapper">
			<input type="checkbox" class="" name="termos_uso" <?php if($formulario['termos_uso'] == 't') echo 'checked'; ?> required>
            <label class="bold-label" for="termos_uso">Concordo com os termos de uso</label>
        </div>
        <div>
        <input type="submit" name="postForm" value="Enviar">
    </div>
        
    </div>
    


</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Ao mudar a seleção do radio button
        $("input[name='ja_teve_gato']").change(function () {
            // Se "Sim" está selecionado
            if ($(this).val() === "ja-teve") {
                // Mostra o campo de entrada condicional
                $("#quantidade-gatos-div").show();
            } else {
                // Oculta o campo de entrada condicional
                $("#quantidade-gatos-div").hide();
            }
        });
    });
</script>


<!-- Script JavaScript para mostrar/ocultar os campos de quantidade quando a checkbox é selecionada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Ao mudar a seleção dos checkboxes de outros animais
        $(".outros-animais-checkbox").change(function () {
            // Obtém o índice do checkbox atual
            var index = $(".outros-animais-checkbox").index(this);
            // Mostra ou oculta o campo de quantidade correspondente
            $(".outros-animais-qtd").eq(index).toggle();

            // Se "outros animais" está selecionado, mostra o campo de especificação
            if ($(".outros-animais-checkbox[value='tem-outro']:checked").length > 0) {
                $(".especificar-outros-animais").show();
            } else {
                $(".especificar-outros-animais").hide();
            }
        });
    });
</script>
</html>
