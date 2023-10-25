<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="FormPages.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<html>
   
    <meta charset="UTF-8">
<header>
        <div id="logo">
            <div id="logo2">
                <a href="HomePage.php">
                    <img class="image" src="../assets/adoteme.png" alt="Logo Adoteme" width="60" height="60">
                </a>
                <h2 class="adoteme">Adoteme</h2>
            </div>
            <nav>
                <ul class="nav nav-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="pagesAdmin/HomePageAdmin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="LoginPage.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Profile</a>
                        </li>
                    </ul>
            </nav>

        </div>
    </header>

<form id="adocaoform" method="POST" action="../controller/FormularioController.php">

    <div id="titulo-formulario">
        <label class="tituloform">Formulário de Adoção</label>
    </div>


    <!-- Seção 1: Adoção -->
    <div class="form-section">
        <label class="bold-label">🤝 Já adotou conosco?</label>
        <div class="radio-options">
            <input type="radio" value="adotou" class="" name="ja_adotou_conosco">
            <label>Sim</label>
        </div>
        <div class="radio-options">
            <input type="radio" value="nao-adotou" class="" name="ja_adotou_conosco">
            <label>Não</label>
        </div>
    </div>


    <!-- Seção 2: Tipo de Endereço -->
    <div class="form-section">
        <label class="bold-label">🏢 Tipo de Endereço</label>
        <select class="" name="tipo_endereco" form="adocaoform">
            <option>Residencial</option>
            <option>Comercial</option>
            <option>República/Pensão</option>
        </select>
    </div>

    <!-- Seção 3: Número de Pessoas no Lar -->
    <div class="form-section form-section-seila">
        <label class="bold-label">👨‍👩‍👧‍👦 Número de Pessoas no Lar</label>
        <div class="form-option">
            
            <input placeholder="Adultos" type="number" class="" name="num_adultos">
        </div>

        <div class="form-option">
            
            <input placeholder="Crianças" type="number" class="" name="num_criancas">
        </div>

        <div class="form-option">
            
            <input placeholder="Idade das crianças" type="number" class="" name="idade_criancas">
        </div>
    </div>



    <!-- Seção 4: Tipo de Casa -->
    <div class="form-section">
        <label class="bold-label">🏡 Qual o tipo de sua casa?</label><br>
        <input type="radio" class="" value="aberta" name="tipo_casa">
        <label>Casa aberta (o gatinho poderá entrar e sair livremente para passear)</label><br>

        <input type="radio" class="" value="fechada" name="tipo_casa">
        <label>Casa fechada (não vou deixar meu gato sair)</label><br>

        <input type="radio" class="" value="condominio" name="tipo_casa">
        <label>Casa de condomínio</label><br>

        <input type="radio" class="" value="com-tela" name="tipo_casa">
        <label>Apartamento com telas</label><br>

        <input type="radio" class="" value="sem-tela" name="tipo_casa">
        <label>Apartamento sem telas</label><br>

        <input type="radio" class="" value="cobertura-com-tela" name="tipo_casa">
        <label>Apartamento tipo cobertura com telas</label><br>

        <input type="radio" class="" value="cobertura-sem-tela" name="tipo_casa">
        <label>Apartamento tipo cobertura sem telas</label><br>

        <input type="radio" class="" value="terreo-com-quintal" name="tipo_casa">
        <label>Apartamento no andar térreo com área externa (quintal)</label><br>

        <input type="radio" class="" value="terreo-sem-quintal" name="tipo_casa">
        <label>Apartamento no andar térreo sem área externa (quintal)</label><br>
    </div>


    <!-- Seção 5: Permissão do Proprietário -->
    <div class="form-section">
        <label class="bold-label">⚠️ O proprietário permite ter animais?</label><br>
        <input type="radio" class="" value="permissao1" name="permissao_proprietario">
        <label>Sim</label><br>

        <input type="radio" class="" value="permissao2" name="permissao_proprietario">
        <label>Não</label><br>

        <input type="radio" class="" value="permissao3" name="permissao_proprietario">
        <label>Minha casa é própria</label><br><br>
    </div>


    <!-- Seção 6: Áreas Específicas na Casa -->
    <div class="form-section checkbox-section">
        <label class="bold-label">🏊 Áreas Específicas na Casa</label><br>
        <input type="checkbox" value="area-casa-1" class="" name="areas_casa">
        <label>Piscina</label><br>

        <input type="checkbox" value="area-casa-2" class="" name="areas_casa">
        <label>Lareira, churrasqueira ou forno de pizza</label><br>

        <input type="checkbox" value="area-casa-3" class="" name="areas_casa">
        <label id="desgraça">Alguma parte que não possa ser telada como, por exemplo, respiro do aquecedor a gás</label><br><br>
    </div>


    <!-- Seção 7: Histórico com Gatos -->
    <div class="form-section">
        <label class="bold-label">🐱 Já teve gato(s) anteriormente?</label><br>
        <input type="radio" value="ja-teve" class="ja-teve-radio" name="ja_teve_gato">
        <label>Sim</label><br>

        <input type="radio" value="nao-teve" class="nao-teve-radio" name="ja_teve_gato">
        <label>Não</label><br>

        <!-- Campo de entrada condicional -->
        <div id="quantidade-gatos-div" style="display: none;">
            <label class="bold-label">Quantos?</label>
            <input type="number" class="" name="quantidade_gatos">
        </div>
    </div>



    <!-- Seção 8: Outros Animais -->
    <div class="form-section">
        <label class="bold-label">🐾 Possui outros animais?</label><br>
        <input type="checkbox" value="tem-cachorro" class="outros-animais-checkbox" name="outro_animais">
        <label>Sim, cachorro(s) 🐶</label><br>

        <div class="outros-animais-qtd" style="display: none;">
            Quantos?
            <input type="number" class="" name="outro_animais_qtd_cachorro">
        </div>

        <input type="checkbox" value="tem-passaro" class="outros-animais-checkbox" name="outro_animais">
        <label>Sim, pássaro(s) 🐤</label><br>

        <div class="outros-animais-qtd" style="display: none;">
            Quantos?
            <input type="number" class="" name="outro_animais_qtd_passaro">
        </div>

        <input type="checkbox" value="tem-outro" class="outros-animais-checkbox" name="outro_animais">
        <label>Sim, outros animais 🤔</label><br>

        <!-- Campo de entrada para especificar outros animais -->
        <div class="especificar-outros-animais" style="display: none;">
            Especifique:<br>
            <input type="text" class="" name="outros_animais_especificacao"><br>
        </div>
        <input type="checkbox" value="nao-tem" class="outros-animais-checkbox" name="outro_animais">
    <label>Não ❌</label><br>
    </div>

    


    <!-- Seção 9: Informações Adicionais -->
    <div class="form-section">
        <label class="bold-label">🤔 Há quanto tempo planeja adotar um gatinho?</label>
        <textarea rows="5"   class="custom-textbox" name="tempo_planejamento"></textarea>
        <!-- ... (mais inputs de informações adicionais aqui) -->
    </div>

    <!-- Seção 10: Consentimento -->
    <div class="form-section">
        <label class="bold-label">😁 Você dá o seu consentimento para a adoção?</label><br>
        <input type="radio" class="" value="consentimento1" name="consentimento">
        <label>Sim</label><br>
        <input type="radio" class="" value="consentimento2" name="consentimento">
        <label>Não</label><br>
    </div>


    <!-- Seção 11: Quem cuidará do gato em caso de viagem -->
    <div class="form-section">
        <label class="bold-label">✈️ Quem cuidará do gato em caso de viagem?</label><br>
        <textarea rows="5"  class="custom-textbox" name="cuidado_viagem"></textarea>
    </div>

    <!-- Seção 12: Condições para Cobrir os Custos -->
    <div class="form-section">
        <label class="bold-label">💰 Você tem condições de acrescentar no seu orçamento os gastos que terá com alimentação de boa qualidade
            (aproximadamente R$ 120 por mês), vacinas e atendimento veterinário (aproximadamente R$ 250
            anualmente)?</label><br>
        <input type="radio" class="" value="gastos1" name="gastos">
        <label>Sim</label><br>
        <input type="radio" class="" value="gastos2" name="gastos">
        <label>Não</label><br>
    </div>

    <!-- Seção 13: Alguém em Casa Tem Alergia? -->
    <div class="form-section">
        <label class="bold-label">🤒 Alguém em casa tem alergia?</label><br>
        <input type="radio" class="" value="alergia1" name="alergia">
        <label>Sim</label><br>
        <input type="radio" class="" value="alergia2" name="alergia">
        <label>Não</label><br>
    </div>

    <!-- Seção 14: O Que Fará em Diferentes Situações -->
    <div class="form-section">
        <label class="bold-label">😱 O que fará se você se descobrir alérgico a gatos?</label><br>
        <textarea rows="5"  class="custom-textbox" name="se_descobrir_alergia"></textarea><br><br> 

        <label class="bold-label">😰 O que fará se descobrir que seu filho(a) é alérgico a gatos?</label><br>
        <textarea rows="5"  class="custom-textbox" name="filho_descobrir_alergia"></textarea><br><br>

        <label class="bold-label">🤔 O que fará se começar a se relacionar com alguém que não goste ou seja alérgico a gatos?</label><br>
        <textarea rows="5"  class="custom-textbox" name="parceiro_descobrir_alergia"></textarea><br><br>

        <label class="bold-label">👶 O que fará com o gatinho se alguém na casa engravidar?</label><br>
        <textarea rows="5"  class="custom-textbox" name="gravidez"></textarea><br><br>

        <label class="bold-label">👦 O que fará se o gato arranhar seu filho?</label><br>
        <textarea rows="5"  class="custom-textbox" name="se_arranhar"></textarea><br><br>

        <label class="bold-label">😨 O que fará se o seu gato fugir?</label><br>
        <textarea rows="5"  class="custom-textbox" name="se_fugir"></textarea><br><br>

        <label class="bold-label">😿 O que fará se não puder mais cuidar do gatinho?</label><br>
        <textarea rows="5"  class="custom-textbox" name="se_nao_puder_cuidar"></textarea><br><br>

        <label class="bold-label">✈️ O que fará se tiver que mudar de cidade ou país?</label><br>
        <textarea rows="5"  class="custom-textbox" name="mudanca"></textarea><br><br>

        <label class="bold-label">🙀 Por quais motivos você devolveria o gatinho?</label><br>
        <textarea rows="5"  class="custom-textbox" name="motivos_doacao"></textarea><br><br>
    </div>

    <!-- Seção 15: Adaptação para Gatos Existente -->
    <div class="form-section">
        <label class="bold-label">😸 Se você já possui um gato e está adotando um novo, está ciente que será necessária uma adaptação que pode
            levar de 10 dias a 1 ano, dependendo da personalidade de ambos?</label><br>
        <input type="radio" class="" value="consciente_adaptacao1" name="consciente_adaptacao">
        <label>Sim</label><br>
        <input type="radio" class="" value="consciente_adaptacao2" name="consciente_adaptacao">
        <label>Não</label><br>
    </div>

    <!-- Seção 16: Cômodo Separado para Adaptação -->
    <div class="form-section">
        <label class="bold-label">Se você respondeu “Sim” para a pergunta acima, tem um cômodo separado em casa caso seja necessário
            separá-los no começo?</label><br>
        <input type="radio" class="" value="quarto_adaptacao1" name="quarto_adaptacao">
        <label>Sim</label><br>
        <input type="radio" class="" value="quarto_adaptacao2" name="quarto_adaptacao">
        <label>Não</label><br>
    </div>

    <!-- Seção 17: Compromisso de Longo Prazo -->
    <div class="form-section">
        <label class="bold-label">😼 Gatos podem viver 15 anos ou mais. Você está preparado para este compromisso?</label><br>
        <input type="radio" class="" value="compromisso_idade1" name="compromisso_idade">
        <label>Sim</label><br>
        <input type="radio" class="" value="compromisso_idade2" name="compromisso_idade">
        <label>Não</label><br>
        <input type="radio" class="" value="compromisso_idade3" name="compromisso_idade">
        <label>Não sei</label><br>
    </div>

    <!-- Seção 18: Conscientização sobre Custos de Saúde -->
    <div class="form-section">
        <label class="bold-label">😿 Você está ciente que, em qualquer fase da vida, o gato que você está adotando pode adoecer ou desenvolver
            algum problema crônico de saúde, e com isso precisar de consultas veterinárias, exames periódicos, remédios
            e possivelmente internação?</label><br>
        <input type="radio" class="" value="consciente_custo1" name="consciente_custo">
        <label>Sim</label><br>
        <input type="radio" class="" value="consciente_custo2" name="consciente_custo">
        <label>Não</label><br>
        <input type="radio" class="" value="consciente_custo3" name="consciente_custo">
        <label>Não sei</label><br>
    </div>

    <!-- Campo Opcional para Comentários -->
    <div class="form-section">
        <label class="bold-label">🧾 Campo opcional para comentários:</label><br>
        <textarea rows="5"  class="custom-textbox" name="campo_opcional"></textarea>
    </div>


    <!-- Seção 12: Botões de Envio e Termos -->
    <div class="form-buttons-container">
        <div class="checkbox-wrapper">
            <input type="checkbox" class="" name="termos_uso">
            <label class="bold-label" for="termos_uso">Concordo com os termos de uso</label>
        </div>
        <div>
        <input type="submit" value="Enviar">
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
