<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/src/view/css/VisualizarAdocao.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-Adoteme</title>

</head>


	<?php include $_SERVER['DOCUMENT_ROOT'] . "/src/view/partials/Header.php"; ?>
<main>
		<div class="table-container">
			<div class="return-container">
				<a href="/admin/adocoes">Voltar</a>
			</div>
			<table>
				<thead
					<th>
				<td>Pergunta</td>
				<td>Resposta</td>
					</th>
				</thead>
			<tbody>
					<?php
					foreach($formulario as $pergunta => $resposta) {
					echo '<tr>';
					if ($resposta == 't') {
					$resposta = 'Sim';
					} elseif ($resposta == 'f') {
					$resposta = 'Não';
					}
					echo '<td class="question"> <b>' . $pergunta . '</b></td> <td class="answer">' . $resposta . '</td>';
					}
					echo '</tr>';
					?>
				</tbody>
			</table>
		</div>
</main>
