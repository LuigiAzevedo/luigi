<?php
// conexão com o banco de dados
require_once("connect.php");
// classe para gerar senha
require_once("bcrypt.php");
// pecebe senha do formulário
$senha = $_POST['senha'];
// passa a senha como parâmetro para a classe Bcrypt
$hash = Bcrypt::hash($senha);
// busca no banco a senha do usuário
$select = $mysqli->query("SELECT nome, senha FROM teste WHERE nome ='{$_POST['nome']}'");
$result = $select->fetch_assoc();
// armazena a senha na variavél hash
$hash = $result['senha'];
// verifica se as senhas são identicas
if (Bcrypt::check($senha, $hash)){
	echo 'Senha OK!';
} else {
	echo 'Senha incorreta!';
}
// fecha a conexão
$mysqli->close(); 
?>
