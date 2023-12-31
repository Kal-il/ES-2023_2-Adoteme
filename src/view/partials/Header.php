<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/controller/JWTController.php'; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
	header {
		display: flex;
		background-color: #383464;
		flex-direction: row;
	}

	#logo {
		width: 95vw;
		padding-left: 5px;
		padding-right: 5px;
		padding-top: 5px;
		display: flex;
		flex-direction: row;
		color: white;
		align-items: center;
		justify-content: space-between;

	}

	#logo,
	nav {
		align-items: end;
	}

	#logo2 {
		margin: 10PX;
		display: flex;
		flex-direction: row;
		align-items: center;
	}

	.nav-link {
		color: white;
	}

	h2 {
		font-size: 1.5em;
		margin: 0;
		padding: 0;
		margin-left: 20px;
	}
</style>
<header>
	<div id="logo">
		<div id="logo2">
			<a href="/">
				<img class="image" src="/src/view/assets/adoteme.png" alt="Logo Adoteme" width="60" height="60">
			</a>
			<h2 class="adoteme">Adoteme</h2>
		</div>
		<nav>
			<ul class="nav nav-tabs">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if (explode('/', $_SERVER['REQUEST_URI'])[1] == 'admin') {
												echo 'active';
											} else {
												echo 'disabled';
											} ?>" href="/admin">Admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/login">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/perfil/">Perfil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/eventos/">Eventos</a>
					</li>

					<?php
					if ($user_id != 0) {
						echo '<li class="nav-item">
						<a class="nav-link favoritos" href="/favoritos">Favoritos</a>
						</li>';
					}
					?>
				</ul>
		</nav>

	</div>
</header>