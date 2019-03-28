<?php
// conexão com o banco de dados
require_once("connect.php");
// classe para gerar senha
require_once("bcrypt.php");
// Recebe senha do formulário

// busca no banco a senha do usuário
$select = $mysqli->query("SELECT nome, senha FROM teste WHERE nome ='{$_POST['nome']}'");
$result = $select->fetch_assoc();
// armazena a senha na variavél hash
$hash = $result['senha'];


$hash_senha = Bcrypt::hash($_POST['senha']);
echo '<br>aquii<br>';
echo $hash_senha;
/*

$pass_rec = Bcrypt::generateRandomHash();


// verifica se as senhas são identicas
if (Bcrypt::check($_POST['senha'];, $hash)){
	echo 'Senha OK!';
} else {
	echo 'Senha incorreta!';
}
// fecha a conexão */
$mysqli->close(); 
?>
