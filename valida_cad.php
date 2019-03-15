<?php
//mysqli_report(MYSQLI_REPORT_OFF);
require_once("connect.php");
$senha = hash('md5', $_POST['senha']);

$senha = $_POST['senha'];
$custo = '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
// Gera um hash baseado em bcrypt
$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

$insert = "INSERT into teste(nome, senha) VALUES ('{$_POST['nome']}', '$hash')";
if ($mysqli->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert . "<br>" . $mysqli->error;
}

/*
$select = $mysqli->query("SELECT id, nome, senha FROM teste WHERE nome ='{$_POST['nome']}' AND senha ='{$senha}'");
$result = $select->fetch_assoc();

function redirect($local){   // enviar o usuario para a pagina do parametro
	header("Location: $local");
}

if($select->num_rows === 1){  // checa se o login é valido
	session_start();
	$_SESSION['login'] = $_POST['nome'];
	$_SESSION['senha'] = $_POST['senha'];

	$id = hash('md5', $result['id']);
	redirect("programa.php");
}else{	
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=luigi.php \">";
	echo "<script type='text/javascript'>alert('Login ou senha incorretos. Tente Novamente.')</script>";
}
*/
$mysqli->close(); // fecha a conecxão
?>
