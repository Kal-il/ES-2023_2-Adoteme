<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Gato</title>

    <link rel="stylesheet" type="text/css" href="../../css/SinginPage.css">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/script.js"></script>
</head>
</head>

<body>
    <header>
        <a href="HomePageAdmin.php">
            <img id="logo" src="../../assets/adoteme.png" alt="Logo Adotme" width="100" height="100">
        </a>
        <h1 id="adoteme">Adoteme</h1>
    </header>
    <main class="main">
        <form action="../../../controller/gatosController/AtualizarGatos.php" method="POST" enctype="multipart/form-data">
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

                        if (isset($_GET['data'])) {
                            var_dump($_GET['data']);
                            $dataEncoded = $_GET['data'];
                            $dataEncoded = json_decode(urldecode($dataEncoded), true);
                 
                        }
                    
                ?>
                <h1 id="h1cadastro">Atualização do gato <span style="color: purple;"><?php echo isset($dataEncoded['nome']) ? htmlspecialchars($dataEncoded['nome']) : ''; ?></span> </h1>
                <label for="nome">
                    Nome:
                    <input class="inputInfo" type="text" name="nome" id="nome" placeholder="Nome do gato" maxlength="50" value = "<?php echo isset($dataEncoded['nome']) ? htmlspecialchars($dataEncoded['nome']) : ''; ?>" required><br>
                </label>
                <label for="data_nascimento">
                    Data de Nascimento Aproximada:
                    <input class="inputInfo" type="date" name="data_nascimento" id="data_nascimento"  value = "<?php echo isset($dataEncoded['data_nascimento']) ? htmlspecialchars($dataEncoded['data_nascimento']) : ''; ?>" required><br>
                </label>
                <label for="sexo">
                    Sexo:
                    <select  name="sexo" id="sexo" required>
                        <option value="macho" <?php echo (isset($dataEncoded['sexo']) && $dataEncoded['sexo'] == 'Macho') ? 'selected' : ''; ?>>Macho</option>
                        <option value="femea" <?php echo (isset($dataEncoded['sexo']) && $dataEncoded['sexo'] == 'Fêmea') ? 'selected' : ''; ?>>Fêmea</option>
                    </select><br>
                </label>
                <label for="cor">
                    Cor:
                    <select name="cor" id="cor" required>
                        <option value="amarelo"<?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'amarelo') ? 'selected' : ''; ?> >Amarelo</option>
                        <option value="preto_e_branco" <?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'preto_e_branco') ? 'selected' : ''; ?> >Preto e Branco</option>
                        <option value="preto" <?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'preto') ? 'selected' : ''; ?> >Preto</option>
                        <option value="branco" <?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'branco') ? 'selected' : ''; ?> >Branco</option>
                        <option value="cinza" <?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'cinza') ? 'selected' : ''; ?> >Cinza</option>
                        <option value="marrom" <?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'marrom') ? 'selected' : ''; ?>>Marrom</option>
                        <option value="laranja" <?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'laranja') ? 'selected' : ''; ?>>Laranja</option>
                        <option value="outra" <?php echo (isset($dataEncoded['cor']) && $dataEncoded['cor'] == 'outra') ? 'selected' : ''; ?>>Outra cor</option>
                    </select><br>
                </label>
                <div id="outraCor" style="display: none;">
                    <label for="outraCor">
                        <input class="inputInfo" type="text" name="outraCor" id="outracor" placeholder="Especifique a cor" value = "<?php echo isset($dataEncoded['outracor']) ? htmlspecialchars($dataEncoded['outracor']) : ''; ?>" maxlength="100">
                    </label>
                </div>
                <label for="descricao">
                    Descrição:
                    <input class="inputInfo" type="text" name="descricao" id="descricao" placeholder="Conte sobre o gato" maxlength="100" value = "<?php echo isset($dataEncoded['descricao']) ? htmlspecialchars($dataEncoded['descricao']) : ''; ?>" required><br>
                </label>
                <label for="castrado">

                    <input class="inputInfo" type="checkbox" name="castrado" id="castrado" maxlength="100" <?php if ($dataEncoded['castrado'] == 't') echo "checked='checked'"; ?> required> Castrado
                </label>
                <label for="vacina_completa">

                    <input class="inputInfo" type="checkbox" name="vacina_completa" id="vacina_completa" maxlength="100" <?php if ($dataEncoded['vacina_completa'] == 't') echo "checked='checked'"; ?>> Vacinação Completa
                </label>

                <div id="infoVacina" style="display:none;">
                    <label for="info_vacina">
                        Informações sobre a vacinação:
                        <input class="inputInfo" type="text" name="info_vacina" id="info_vacina" placeholder="Fale sobre a vacinação" value="<?php echo isset($dataEncoded['info_vacina']) ? htmlspecialchars($dataEncoded['info_vacina']) : ''; ?>" maxlength="100">
                    </label>
                </div>
                <label for="personalidades">Personalidades:</label>
                    <div id="personalidades">
                                <?php
                                $personalidadesSelecionadas = isset($dataEncoded['personalidade']) ? explode(",", $dataEncoded['personalidade']) : [];
                                var_dump($personalidadesSelecionadas);
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

                                foreach ($personalidades as $valor => $texto) {
                                    $marcado = in_array($valor, $personalidadesSelecionadas) ? 'checked' : '';
                                    var_dump($marcado);
                                    echo '<label>';
                                    echo '<input type="checkbox" name="personalidades[]" value="' . $valor . '" ' . $marcado . '> ' . $texto;
                                    echo '</label>';
                                }
                                ?>
                            </div>
                    <label for="foto1"></label>
                        <input name="fotos[]" type=file multiple/>
                        <?php
                        if (isset($dataEncoded['fotos']) && is_array($dataEncoded['fotos'])) {
                            foreach ($dataEncoded['fotos'] as $foto) {
                                echo '<img src="' . htmlspecialchars($foto) . '" alt="Foto do Gato" width="100" height="100">';
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