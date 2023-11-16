<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Gato</title>

    <link rel="stylesheet" type="text/css" href="/src/view/css/CadastrarGato.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/src/view/js/script.js"></script>
</head>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/view/partials/Header.php'; ?>
    <a href="/admin/gatos">
        <button>Voltar</button>
    </a>
    <main class="main">

		<form action="/admin/gatos/editar/process/<?php echo $gatoData['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="etapa" id="etapa1">
                <?php
                if (isset($_GET['erros'])) {
                    $erros_encoded = $_GET['erros'];
                    $erros = json_decode(urldecode($erros_encoded), true);

                    echo '<ul>';
                    foreach ($erros as $erro) {
                        echo '<li>' . htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') . '</li>';
                    }
                    echo '</ul>';
                }



                ?>
                <h1 id="h1cadastro">Atualização do gato <span style="color: purple;"><?php echo isset($gatoData['nome']) ? htmlspecialchars($gatoData['nome']) : ''; ?></span> </h1>
                <label for="nome">
                    Nome:
                    <input class="inputInfo" type="text" name="nome" id="nome" placeholder="Nome do gato" maxlength="50" value="<?php echo isset($gatoData['nome']) ? htmlspecialchars($gatoData['nome']) : ''; ?>" required><br>
                </label>
                <label for="data_nascimento">
                    Data de Nascimento Aproximada:
                    <input class="inputInfo" type="date" name="data_nascimento" id="data_nascimento" value="<?php echo isset($gatoData['data_nascimento']) ? htmlspecialchars($gatoData['data_nascimento']) : ''; ?>" required><br>
                </label>
                <label for="sexo">
                    Sexo:
                    <select name="sexo" id="sexo" required>
                        <option value="macho" <?php echo (isset($gatoData['sexo']) && $gatoData['sexo'] == 'Macho') ? 'selected' : ''; ?>>Macho</option>
                        <option value="femea" <?php echo (isset($gatoData['sexo']) && $gatoData['sexo'] == 'Fêmea') ? 'selected' : ''; ?>>Fêmea</option>
                    </select><br>
                </label>
                <label for="cor">
                    Cor:
                    <select name="cor" id="cor" required>
                        <option value="amarelo" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'amarelo') ? 'selected' : ''; ?>>Amarelo</option>
                        <option value="preto_e_branco" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'preto_e_branco') ? 'selected' : ''; ?>>Preto e Branco</option>
                        <option value="preto" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'preto') ? 'selected' : ''; ?>>Preto</option>
                        <option value="branco" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'branco') ? 'selected' : ''; ?>>Branco</option>
                        <option value="cinza" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'cinza') ? 'selected' : ''; ?>>Cinza</option>
                        <option value="marrom" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'marrom') ? 'selected' : ''; ?>>Marrom</option>
                        <option value="laranja" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'laranja') ? 'selected' : ''; ?>>Laranja</option>
                        <option value="outra" <?php echo (isset($gatoData['cor']) && $gatoData['cor'] == 'outra') ? 'selected' : ''; ?>>Outra cor</option>
                    </select><br>
                </label>
                <div id="outraCor" style="display: none;">
                    <label for="outraCor">
                        <input class="inputInfo" type="text" name="outraCor" id="outracor" placeholder="Especifique a cor" value="<?php echo isset($gatoData['outracor']) ? htmlspecialchars($gatoData['outracor']) : ''; ?>" maxlength="100">
                    </label>
                </div>
                <label for="descricao">
                    Descrição:
                    <input class="inputInfo" type="text" name="descricao" id="descricao" placeholder="Conte sobre o gato" maxlength="100" value="<?php echo isset($gatoData['descricao']) ? htmlspecialchars($gatoData['descricao']) : ''; ?>" required><br>
                </label>
                <label for="castrado">

                    <input class="inputInfo" type="checkbox" name="castrado" id="castrado" maxlength="100" <?php if ($gatoData['castrado'] == 't') echo "checked='checked'"; ?>> Castrado
                </label>
                <label for="vacina_completa">
                    <input class="inputInfo" type="checkbox" name="vacina_completa" id="vacina_completa" maxlength="100" <?php if ($gatoData['vacina_completa'] == 't') echo "checked='checked'"; ?>> Vacinação Completa
                </label>
                <div id="infoVacina" style="display:none;">
                    <label for="info_vacina">
                        Informações sobre a vacinação:
                        <input class="inputInfo" type="text" name="info_vacina" id="info_vacina" placeholder="Fale sobre a vacinação" value="<?php echo isset($gatoData['info_vacina']) ? htmlspecialchars($gatoData['info_vacina']) : ''; ?>" maxlength="100">
                    </label>
                </div>
                <label for="personalidades">Personalidades:</label>
                <div id="personalidades">
                    <?php
                    $personalidadesSelecionadas = isset($gatoData['personalidade']) ? explode(",", $gatoData['personalidade']) : [];
                    $personalidades = [
                        'amigavel' => 'Amigável',
                        'brincalhao' => 'Brincalhão',
                        'timido' => 'Tímido',
                        'curioso' => 'Curioso',
                        'calmo' => 'Calmo',
                        'territorial' => 'Territorial',
                        'carente' => 'Carente',
                        'preguicoso' => 'Preguiçoso',
                        'nervoso' => 'Nervoso',
                    ];

                    foreach ($personalidades as $value => $texto) {
                        $checked_attr = in_array($value, $personalidadesSelecionadas) ? 'checked' : '';
                        echo '<label>';
                        echo '<input type="checkbox" name="personalidades[]" value="' . $value . '" ' . $checked_attr . '> ' . $texto;
                        echo '</label>';
                    }
                    ?>
                </div>
                <label for="foto1"></label>
                <input name="fotos[]" type=file multiple />
                <?php
                if (isset($gatoData['fotos']) && is_array($gatoData['fotos'])) {
                    foreach ($gatoData['fotos'] as $foto) {
                        echo '<img src="/src/view/pages/pagesAdmin/' . htmlspecialchars($foto) . '" alt="Foto do Gato" width="100" height="100">';
                    }
                }
                ?>
                <div class="form-buttons-container">
                    <div class="submit-button">
                        <button type="submit" name="botaoAtualizarGato">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <p id="copyrigth">&copy;2023 Adoteme</p>
    </footer>
</body>

</html>
