<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/src/view/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/src/view/css/AboutUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://rawcdn.githack.com/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet" type="text/css" />


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-Adoteme</title>

</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php") ?>
    <div class="cards">
        <div class="card-about-us">
            <div class="card-content">
                <i class="fad fa-bullseye-pointer" onmouseover="this.className = 'fas fa-bullseye-pointer';" onmouseout="this.className = 'fad fa-bullseye-pointer';"></i>

                <h1>Missão</h1>

                Nossa missão é proporcionar um lar para os gatinhos sem teto que vagam pelo campus da nossa universidade. Acreditamos que cada gato merece um lar, e estamos comprometidos em fazer isso acontecer. Nosso objetivo é criar um ambiente seguro e acolhedor para esses animais, proporcionando-lhes cuidados médicos, alimentação adequada e carinho.
            </div>
        </div>
        <div class="card-about-us">
            <div class="card-content">
                <i class="fad fa-users" onmouseover="this.className = 'fas fa-users';" onmouseout="this.className = 'fad fa-users';"></i>
                <h1>Equipe</h1>

                Nossa equipe é composta por estudantes apaixonados pela causa animal. Cada membro da equipe contribui com suas habilidades e conhecimentos para garantir que nossos gatinhos recebam o melhor cuidado possível. Nosso trabalho é voluntário e é motivado pelo amor e compaixão que sentimos por esses animais.
            </div>
        </div>
        <div class="card-about-us">
            <div class="card-content">
                <i class="fad fa-cat" onmouseover="this.className = 'fas fa-cat';" onmouseout="this.className = 'fad fa-cat';"></i>
                <h1>Gatinhos</h1>
                Os gatinhos que adotamos são resgatados de situações de risco e trazidos para nosso campus para serem cuidados. Eles são alimentados, vacinados e cuidados com carinho até que encontrem um lar permanente. Nosso objetivo é garantir que cada gato encontre um lar amoroso e seguro.
            </div>
        </div>
    </div>
    <footer class="footer">
        <a href="AboutUs.php">About Us</a>
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>