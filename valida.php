<?php
//mysqli_report(MYSQLI_REPORT_OFF);
require_once("connect.php");
$senha = hash('md5', $_POST['senha']);

$select = $mysqli->query("SELECT id, nome, senha FROM teste WHERE nome ='{$_POST['nome']}' AND senha ='{$senha}'");
$result = $select->fetch_assoc();

if($mysqli->error){  // Caso ocorra algum erro, será impresso na tela
	try{
		throw new Exception("MySQL error $mysqli->error <br> Query:<br> $select", $mysqli->error);
	}	catch(Exception $e) {
		echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br>";
		echo nl2br($e->getTraceAsString());
	}
}

function redirect($local){   // enviar o usuario para a pagina do parametro
	header("Location: $local");
}

if($select->num_rows === 1){  // checa se o login é valido
	$id = hash('md5', $result['id']);
	redirect('programa.php?id='.$id.'');  // caso seja valido é dado o prosseguimento
}
else{
	redirect('luigi.php?aviso=1'); // caso seja invalido, volta-se para a tela de login
}
$mysqli->close(); // fecha a conecxão
?>