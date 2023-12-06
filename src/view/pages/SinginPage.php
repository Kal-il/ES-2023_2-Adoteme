<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu cadastro</title>

    <link rel="stylesheet" type="text/css" href="/src/view/css/SinginPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/view/partials/Header.php'; ?>
    <main class="main">


        <form action="/cadastrar/process" method="POST" enctype="multipart/form-data">

            <div class="etapa" id="etapa1">



				<div class="etapa-container etapa-title-container">
					<h1 id="h1cadastro">Cadastro</h1>
				</div>

				<div class="etapa-container etapa-fields-container">
						<label for="name">
							<input class="inputInfo" type="text" name="name" placeholder="Seu nome aqui" maxlength="100" required>
						</label>
						<label for="email">
							<input class="inputInfo" type="email" name="email" placeholder="Seu e-mail" maxlength="100" required>
						</label>
						<label for="cpf">
							<input class="inputInfo" type="text" name="cpf" placeholder="Seu CPF" maxlength="100" required>
						</label>
						<label for="birthday">
							<input class="inputInfo" type="date" name="birthday" placeholder="dd/mm/yyyy" maxlength="8" required>
						</label>
						<label for="enrollment">
							<input class="inputInfo" type="text" name="enrollment" placeholder="Seu número de matrícula" maxlength="100" required>
						</label>
						<label for="telephone">
							<input class="inputInfo" type="tel" name="telephone" placeholder="(00)0 0000-0000" minlength="11" maxlength="100" required>
						</label>
						<label for="password">
							<input class="inputInfo" type="password" name="password" placeholder="Insira sua senha" minlength="6" maxlength="30" required>
						</label>
						<label for="password2">
							<input class="inputInfo" type="password" name="password2" placeholder="Confirme sua senha" minlength="6" maxlength="30" required>
						</label>
					</div>
				<div class="etapa-errors-container">
					<?php
						session_start();

						if(isset($_SESSION['erros'])){
							foreach($_SESSION['erros'] as $campo => $erro) {
						echo '<div class="error-container">
								<p> <b>' . $erro . '</p>
							  </div>';
							}
							unset($_SESSION['erros']);
						}

						if(isset($_SESSION['erro'])){
						echo '<div class="error-container" 
								<p>' . $_SESSION['erro'] . '</p>
							  </div>';
							unset($_SESSION['erro']);
						}
					?>
				</div>

					<div class="etapa-container etapa-buttons-container">
						<button class="button-container" onclick="proximoEtapa(1)">Próximo</button>


						<a href="/login">Já possui cadastro? Faça login</a><!--Botão para voltar para a página inicial porem não funciona como devia por conta do "required" nos inputs-->
					</div>
            </div>

            <div class="etapa2" id="etapa2">
				<div class="etapa-container etapa-title-container">
					<h2 id="h1cadastro">Seu endereço</h2>
				</div>
				<div class="etapa-container etapa-fields-container">
					<label for="state">
						<input class="inputInfo" type="text" name="state" placeholder="Estado" minlength="4" maxlength="20" required><br>
					</label>
					<label for="city">
						<input class="inputInfo" type="text" name="city" placeholder="Cidade" maxlength="100" required><br>
					</label>
					<label for="adress">
						<input class="inputInfo" type="text" name="adress" placeholder="Endereço e complemento" maxlength="100" required><br>
					</label>
				</div>
				<div class="etapa-container etapa-buttons-container">
					<button class="button-container" type="submit" name="botaoCadastro">Cadastrar</button>
					<button class="return-button-container" onclick="voltarEtapa(1)">Voltar</button>
					<a href="/login">Já possui cadastro? login</a><!--Botão para voltar para a página inicial funciona por estar fora das divs, mas n consegui centralizar-->
				</div>
            </div>
            <script>
                function proximoEtapa(etapa) {
                    // Oculta a etapa atual
                    document.getElementById("etapa" + etapa).style.display = "none";
                    // Exibe a próxima etapa
                    etapa++;
                    if (etapa <= 3) {
                        document.getElementById("etapa" + etapa).style.display = "block";
                    }
                }

				function voltarEtapa(etapa) {
					document.getElementById("etapa" + (etapa+1)).style.display="none"

					document.getElementById("etapa" + etapa).style.display = "block"
				}
            </script>
        </form>

    </main>
    <footer>
        <p id="copyrigth">&copy;2023 Adoteme </p>
    </footer>

</body>

</html>
