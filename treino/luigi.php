<?php
	require_once("connect.php");
	
						$meses = array(
						1 => 'Janeiro',
						2 => 'Fevereiro',
						3 => 'Março',
						4 => 'Abril',
						5 => 'Maio',
						6 => 'Junho',
						7 => 'Julho',
						8 => 'Agosto',
						9 => 'Setembro',
						10 => 'Outubro',
						11 => 'Novembro',
						12 => 'Dezembro'
					);
					
					echo $meses[2];
?>
<!DOCTYPE html >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
	<meta name="description" content="Teste em PHP 7.2">
	<meta name="author" content="Luigi Azevedo">
</head>
<body>
	<div>
		<form method="post" action="valida.php">
			<fieldset style="border: 0;">
				Nome: <input type="text" name="nome" autocomplete="off"><br>
				Senha: <input type="password" name="senha" autocomplete="off">
				<input type="submit" value="Entrar"/>
			</fieldset>
		</form>
</body>
</html>


<!--



	$select = $mysqli->query("SELECT * FROM teste");
	printf("Select returned %d rows.\n",$select->num_rows);


	while ($row = $select->fetch_assoc()){
		echo 	'<table>
					<tr>
						<td>'.$row['nome'].'</td>
						<td>'.$row['senha'].'<td>
					</tr>
				</table>';

	}
	<script>
		window.onbeforeunload = closingCode;
		function closingCode(){
			<?php
		//		$senha = hash('md5', 'senha');
		//		$nome = 'Luigi';
		//		$query = $mysqli->query("INSERT INTO teste (nome, senha) VALUES('$nome', '$senha')");
		//		$mysqli->query($query);
			?>
		return null;
	</script>


	$delete = $mysqli->query("DELETE FROM teste");
	echo '<form action="envia.php">
		<input type="submit" value="ENVIA"/>
	</form>';

	$mysqli->close();
-->