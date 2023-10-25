<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Gatos</title>

    <link rel="stylesheet" type="text/css" href="../../css/CadastrarGato.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/script.js"></script>
</head>
</head>

<body>
    <header>
        <a href="HomePageAdmin.php">
            <img id="botao-voltar" src="../../assets/adoteme.png" alt="Logo Adotme" width="100" height="100">
        </a>
        <h1 id="adoteme">Adoteme</h1>
    </header>
    <main class="main">
        <a href="TabelaAnimais.php">
            <button>Voltar</button>
        </a>
        <form action="../../../controller/gatosController/CadastroGatosController.php" method="POST" enctype="multipart/form-data">
            <div class="etapa" id="etapa1">
                <?php
                // Verificar se existe erro, se existir, mostrar mensagem de erro
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


                <h1 id="h1cadastro">Cadastro de Gato</h1>

                <label for="nome">
                    Nome:
                    <input class="inputInfo" type="text" name="nome" id="nome" placeholder="Nome do gato" maxlength="50" required><br>
                </label>
                <label for="data_nascimento">
                    Data de Nascimento Aproximada:
                    <input class="inputInfo" type="date" name="data_nascimento" id="data_nascimento" required><br>
                </label>
                <label for="sexo">
                    Sexo:
                    <select name="sexo" id="sexo" required>
                        <option value="macho">Macho</option>
                        <option value="femea">Fêmea</option>
                    </select><br>
                </label>
                <label for="cor">
                    Cor:
                    <select name="cor" id="cor" required>
                        <option value="amarelo">Laranja</option>
                        <option value="preto_e_branco">Preto e Branco</option>
                        <option value="preto">Preto</option>
                        <option value="branco">Branco</option>
                        <option value="cinza">Cinza</option>
                        <option value="marrom">Marrom</option>
                        <option value="laranja">Laranja</option>
                        <option value="outra">Outra cor</option>
                    </select><br>
                </label>
                <div id="outraCor" style="display: none;">
                    <label for="outraCor">
                        <input class="inputInfo" type="text" name="outraCor" id="outracor" placeholder="Especifique a cor" maxlength="100">
                    </label>
                </div>
                <label for="descricao">
                    Descrição:
                    <input class="inputInfo" type="text" name="descricao" id="descricao" placeholder="Conte sobre o gato" maxlength="1000" required><br>
                </label>

                <table class="table">
                    <tr>
                        <td >Castrado</td>
                        <td ><input type="checkbox" name="castrado"></td>
                    </tr>
                    <tr>
                        <td >Vacina completa</td>
                        <td ><input type="checkbox" name="vacina_completa" id="vacina_completa"></td>
                    </tr>
                </table>


                <div id="infoVacina" style="display:none;">
                    <label for="info_vacina">
                        Informações sobre a vacinação:
                        <input class="inputInfo" type="text" name="info_vacina" id="info_vacina" placeholder="Fale sobre a vacinação" maxlength="100">
                    </label>
                </div>
                <label for="personalidades">Personalidades:</label>
                <div id="personalidades">

                    <table>
                        <tr>
                            <td>Amigável</td>
                            <td><input type="checkbox" name="personalidades[]" value="amigavel"></td>
                        </tr>
                        <tr>
                            <td>Brincalhão</td>
                            <td><input type="checkbox" name="personalidades[]" value="brincalhao"></td>
                        </tr>
                        <tr>
                            <td>Tímido</td>
                            <td><input type="checkbox" name="personalidades[]" value="timido"></td>
                        </tr>
                        <tr>
                            <td>Curioso</td>
                            <td><input type="checkbox" name="personalidades[]" value="curioso"></td>
                        </tr>
                        <tr>
                            <td>Calmo</td>
                            <td><input type="checkbox" name="personalidades[]" value="calmo"></td>
                        </tr>
                        <tr>
                            <td>Territorial</td>
                            <td><input type="checkbox" name="personalidades[]" value="territorial"></td>
                        </tr>
                        <tr>
                            <td>Carente</td>
                            <td><input type="checkbox" name="personalidades[]" value="carente"></td>
                        </tr>
                        <tr>
                            <td>Preguiçoso</td>
                            <td><input type="checkbox" name="personalidades[]" value="preguicoso"></td>
                        </tr>
                        <tr>
                            <td>Nervoso</td>
                            <td><input type="checkbox" name="personalidades[]" value="nervoso"></td>
                        </tr>
                    </table><br>

                </div>
                </label>
                <label for="foto1"></label>
                <input name="fotos[]" type=file multiple id="arquivo" />
                <div class="form-buttons-container">
                    <div class="submit-button">
                        <button type="submit" name="botaoCadastroGato">Cadastrar</button>
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