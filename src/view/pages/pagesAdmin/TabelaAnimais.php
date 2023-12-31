<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/src/view/css/TabelaAnimais.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-Adoteme</title>

</head>


	<?php include $_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php"; ?>
<body>
    <div class="container d-flex align-items-center ">
        <div class="col">
            <div class="row pb-5">
                <div class=" col" id="meudeus">
                    <button onclick="window.history.back()"> Voltar </button>
                    <h2>Tela de Acompanhamento</h2>
                </div>
                <style>
                    .row.pb-5 {
                        text-align: center;
                        align-items: center;
                        justify-content: space-evenly;
                    }

                    #meudeus {
                        display: flex;
                        text-align: center;
                        align-items: center;
                        justify-content: space-evenly;
                        flex-direction: row;
                    }
                </style>
                <div class="col">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Search">
                        <button type="button" class="btn roxo-botao">
                            <a class="button-icon-link-add" href="/admin/cadastrar-gato">
                                <span class="material-symbols-outlined">
                                    add
                            </a>
                            </span>
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
                                            <a class="button-icon-link" href="/admin/gatos/<?php echo $gato['id']; ?>">
                                                <span class="material-symbols-outlined">
                                                    visibility
                                                </span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-transparent">
                                            <a class="button-icon-link" href="/admin/gatos/editar/<?php echo $gato['id']; ?>">
                                                <span class="material-symbols-outlined">
                                                    edit
                                                </span>
                                            </a>
                                        </button>

                                    </td>
                                    <td><?php echo $gato['id'] ?> </td>
                                    <td><?php echo $gato['nome'] ?></td>
                                    <td><a href="#" class="btn openModal">🗑️</a>
                                        <div class="modal">
                                            <div class="modal__content">
                                                <h2 class="modal__title">Atenção!</h2>
                                                <p class="modal__description">
                                                    Deseja <b>deletar</b> todas as informações deste gato?
                                                </p>
                                                <a class="button-icon-link" href="/admin/gatos/deletar/<?php echo $gato['id']; ?>" class="modal__deletar deleteButton">Deletar</a>
                                                <a href="#" class="modal__cancelar">Cancelar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <script>
                        const openModalButtons = document.querySelectorAll('.openModal');
                        const closeModalButtons = document.querySelectorAll('.modal__cancelar');
                        const deleteButtons = document.querySelectorAll('.deleteButton');
                        const modals = document.querySelectorAll('.modal');

                        openModalButtons.forEach((button, index) => {
                            button.addEventListener('click', () => {
                                modals[index].style.display = 'block';
                            });
                        });

                        closeModalButtons.forEach((button, index) => {
                            button.addEventListener('click', () => {
                                modals[index].style.display = 'none';
                            });
                        });

                        deleteButtons.forEach((button, index) => {
                            button.addEventListener('click', () => {

                                modals[index].style.display = 'none';
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <br>

    </div>
</body>
<footer class="footer">
    <p>&copy;2023 Adoteme </p>
</footer>

</html>
