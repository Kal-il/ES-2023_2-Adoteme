<?php
    require_once '../../../controller/gatosController/VisualizarGato.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/DetailedView.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Nunito&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a href="HomePage.php">
            <img id="logo" src="../../assets/adoteme.png" alt="Logo Adotme" width="100" height="100">
        </a>
        <h1 id="adoteme">Adoteme</h1>
    </header>
    <main>

        <div id="div1">
            <button><a href="TabelaAnimais.php" class="butao-vei">Voltar</a></button>
            <h3 class="info-detail">Informações detalhadas</h3>
        </div>
        <table>
            <tr>
                <th>Nome do animal</th>
                <td> <?php echo $gatoData['nome']?> </td>
            </tr>
            <tr>
                <th>Data de nascimento</th>
                <td> <?php echo $gatoData['data_nascimento']?> </td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td> <?php echo ucfirst($gatoData['sexo']) ?> </td>
            </tr>
            <tr>
                <th>Cor</th>
                <td> <?php echo ucfirst($gatoData['cor']) ?> </td>
            </tr>
            <tr>
                <th>Outra cor</th>
                <td><?php echo ucfirst($gatoData['outracor']) ?></td>
            </tr>
            <tr>
                <th>Castrado</th>
                <td>
                    <?php 
                        if($gatoData['castrado']=='t'){
                            echo "Sim";
                        } else {
                            echo "Não";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Vacinação completa</th>
                <td>
                    <?php 
                        if($gatoData['vacina_completa']=='t'){
                            echo "Sim";
                        } else {
                            echo "Não";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Informação de vacinação</th>
                <td><?php echo ucfirst($gatoData['info_vacina']) ?></td>
            </tr>
            <tr>
                <th>Personalidade</th>
                <td><?php echo ucfirst($gatoData['personalidade']) ?></td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td><?php echo ucfirst($gatoData['descricao']) ?></td>
            </tr>
            <tr>
                <th>Uploads</th>
                <td>
                    <div id="image-container">
                        <?php
                            $i = 1;

                            for($i=1; $i <= 3; $i++){
                                if(isset($gatoData['foto' . $i]))
                                echo '<img src=' . $gatoData['foto1'] . ' width="150px" height="150px">';
                            }
                        ?>
                    </div>
                </td>
            </tr>
        </table>


        <script>

        </script>

    </main>
    <footer class="footer">
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>