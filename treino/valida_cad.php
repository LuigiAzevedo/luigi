<?php
// conexão com o banco de dados
require_once("connect.php");
// classe para gerar senha
require_once("bcrypt.php");
// pesquisa no banco se existe algum login duplicado
$select = $mysqli->query("SELECT nome FROM teste WHERE nome ='{$_POST['nome']}'");
$result = $select->fetch_assoc();
if (!empty($result)){
    echo "Error: " . $select . "<br>" . $mysqli->error;
}
// recebe senha do formulário
$senha = $_POST['senha'];
// p'assa a senha como parâmetro para a classe Bcrypt
$hash = Bcrypt::hash($senha);
// insere no banco a nova senha e login cadastrado
$insert = "INSERT into teste(nome, senha) VALUES ('{$_POST['nome']}', '$hash')";
// checa se a inserção foi bem sucedida
if ($mysqli->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert . "<br>" . $mysqli->error;
}
// fecha a conexão
$mysqli->close(); 
?>
