<?php
    require_once '../../../controller/gatosController/ListarGatosController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/TabelaAnimais.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-Adoteme</title>

</head>

<header class="header">
    <a href="HomePage.php">
        <img class="image" src="../../assets/adoteme.png" alt="Logo Adotme" width="100" height="100">
    </a>
    <h1 class="adoteme">Adoteme</h1>
</header>

<body>
    <div class="container d-flex align-items-center ">
        <div class="col">
            <div class="row pb-5">
                <div class="col">
                    <h1>Gatos cadastrados</h1>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Search">
                        <button type="button" class="btn roxo-botao">
                                <a href="CadastrarGato.php"><span class="material-symbols-outlined">add</span></a>
                        </button>
                    </div>

                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <table class="table table-striped table-rounded">
                        <thead class="roxo">
                            <tr>
                                <th scope="col">Ações</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($gatos as $gato) : ?>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-transparent">
                                        <a href="DetailedView.php?id=<?php echo $gato['id']; ?>">
                                        <span class="material-symbols-outlined">visibility</span></button>
                                    <button type="button" class="btn btn-transparent">
                                        <a href="../../../controller/gatosController/EditarGatos.php?id=<?php echo $gato['id']; ?>">
                                            <span class="material-symbols-outlined">edit</span>
                                        </a>
                                    </button>
                                    <button type="button" class="btn btn-transparent"><span class="material-symbols-outlined">delete</span></button>
                                </td>
                                <td><?php echo $gato['id']; ?></td>
                                <td><?php echo $gato['nome']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<footer class="footer">
    <p>&copy;2023 Adoteme </p>
</footer>
</html>