<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Document</title>
</head>
<body>

	<main>

		<h1>Pessoas:</h1>

		<table>
			<thead>
				<th>ID</th>
				<th>Nome</th>
				<th>Data aniversário</th>
				<th>Ações</th>
			</thead>
			<tbody>
				<?php foreach($pessoas as $pessoa){?>
					<tr>
						<td><?= $pessoa->id_pessoa?></td>
						<td><?= $pessoa->nome_pessoa?></td>
						<td><?= date('d/m/Y', strtotime($pessoa->data_aniversario))?></td>
						<td><a href="<?= base_url("Welcome/delete/{$pessoa->id_pessoa}") ?>">Deletar</a></td>
					</tr>
				<?php }?>
			</tbody>
		</table>

	</main>
</body>
</html>