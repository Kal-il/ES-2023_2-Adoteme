<!DOCTYPE html>
<html>

<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/EditarPerfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://rawcdn.githack.com/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <title>Editar Perfil</title>
</head>

<body>
    <header>
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/ES-2023_2-Adoteme/src/view/partials/Header.php") 
        ?>
    </header>
    <h1>Editar Perfil</h1>
    <form class="form" action="update_profile.php" method="POST" enctype="multipart/form-data">

        <div class="child">
            <img class="profile-pic" src="https://i.pinimg.com/236x/67/58/c3/6758c3e7fa00dcd373f316ddde78bbf4.jpg" alt="Profile Picture">
        </div>

        <label class="label" for="profile_picture">Foto de Perfil:</label>
        <input class="input" type="file" id="profile_picture" name="profile_picture"><br><br>

        <label class="label" for="name">Nome:</label>
        <input class="input" type="text" id="name" name="name" placeholder="Nome" ><br><br>

        <label class="label" for="email">Email:</label>
        <input class="input" type="email" id="email" name="email" placeholder="Email" ><br><br>

        <label class="label" for="name">Estado:</label>
        <input class="input" type="text" id="name" name="name" placeholder="Estado" ><br><br>

        <label class="label" for="name">Cidade:</label>
        <input class="input" type="text" id="name" name="name" placeholder="Cidade" ><br><br>

        <label class="label" for="name">Endereço:</label>
        <input class="input" type="text" id="name" name="name" placeholder="Endereço" ><br><br>

        <label class="label" for="name">Data de Nascimento:</label>
        <input class="input" type="date" id="birthday" name="birthday" ><br><br>

        <label class="label" for="name">Telefone:</label>
        <input class="input" type="text" id="name" name="name" ><br><br>



        <input class="submit" type="submit" value="Confirmar">
    </form>
    <footer class="footer">
        <a href="AboutUs.php">About Us</a>
        <p>&copy;2023 Adoteme </p>
    </footer>
</body>

</html>