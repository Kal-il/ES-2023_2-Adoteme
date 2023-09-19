<?php
    /**
        * Verficar se existe erro na url, se existir, mostrar mensagem de erro
    */
    if(isset($_GET['error']) && $_GET['error'] == 400){
        echo "<h1>Não existe usuário com essas credenciais. Tente novamente</h1>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <header class="header">
        <img class = "image" src="assets/adoteme.png" alt="Logo Adotme" width="70" height="70">
        <h1 class="adoteme">Adoteme</h1>
    </header>
    <div class="container"> 
       
        <div class="form-container">
            <div class="teste"><h1>Log-In</h1></div>
            <form class="form" action="" method="POST">
                
                
                <p>
                    <input class="input" type="text" name="email"  placeholder="Email">
                </p>
                <p>
                    <input class="input" type="password" name="senha" placeholder="Senha">
                </p>
                <p>
                    <div class="botoes">
                    <button class="entrar" type="submit">Entrar</button>
                    <button class="registro" type="submit">Novo por aqui? Registrar-se</button>
                    <button class="esqueci" type="submit">Esqueci minha senha</button>
                    </div>
                </p>
            </form>
        </div>
    </div>
</body>

</html>