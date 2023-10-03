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
            <button>Voltar</button>
            <h3 class="info-detail">Informações detalhadas</h3>
        </div>
        <table>
            <tr>
                <th>Nome do animal</th>
                <td>Nome do animal aqui</td>
            </tr>
            <tr>
                <th>Data de nascimento</th>
                <td>2 anos</td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td>Sexo do animal aqui</td>
            </tr>
            <tr>
                <th>Cor</th>
                <td>Cor do animal aqui</td>
            </tr>
            <tr>
                <th>Outra cor</th>
                <td>Outra cor do animal aqui</td>
            </tr>
            <tr>
                <th>Castrado</th>
                <td>Castrado ou não</td>
            </tr>
            <tr>
                <th>Vacinação completa</th>
                <td>Sim ou Não</td>
            </tr>
            <tr>
                <th>Informação de vacinação</th>
                <td>Informação de vacinação aqui</td>
            </tr>
            <tr>
                <th>Personalidade</th>
                <td>Personalidade do animal aqui</td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td>Descrição do animal aqui Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, officiis porro illum optio eaque ipsa quaerat repellat obcaecati voluptatum. Rerum unde ipsam soluta animi placeat ducimus, voluptatem vitae fuga explicabo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas quo nisi, dolorem commodi tempore fuga possimus ipsum quis laboriosam quaerat minus, rerum consequuntur. Eligendi sit debitis a vero odio libero!</td>
            </tr>
            <tr>
                <th>Uploads</th>
                <td>
                    <div id="image-container">
                        <!-- Conteúdo de uploads aqui -->
                    </div>
                </td>
            </tr>
        </table>


        <script>
            const images = [
                'https://cdn.pixabay.com/photo/2014/11/30/14/11/cat-551554_1280.jpg',
                'https://www.wfla.com/wp-content/uploads/sites/71/2023/05/GettyImages-1389862392.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVl46RsJrEEAWMJbwaCwW-TmK78WjG0WsuZg&usqp=CAU'
            ];

            const container = document.getElementById('image-container');
            images.forEach(image => {
                const img = document.createElement('img');
                img.src = image;
                img.classList.add('image-upload');
                container.appendChild(img);
            })
        </script>

    </main>
    <footer class="footer">
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>