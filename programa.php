<?php
require_once("connect.php");
session_start();

$select = $mysqli->query("SELECT nome FROM teste WHERE nome = '{$_SESSION['login']}'");
$result = $select->fetch_assoc();

if($mysqli->error){
  try{
    throw new Exception("MySQL error $mysqli->error <br> Query:<br> $select", $mysqli->error);
  } catch(Exception $e){
    echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br>";
    echo nl2br($e->getTraceAsString());
  }
}

class Usuario{
  private $nome;
  private $sexo;
  private $idade;
  private $cidade = 'Contagem';


  public function darNome($name){
    $this->nome = $name;
  }

  public function pegarNome(){
    return $this->nome;
  }
}
$user = new Usuario();
$user->darNome('Jovem');
$user->pegarNome();
function boasvindas($nome){
  print("Ola $nome, bem vindo ao programa de teste 2019");
}
boasvindas($_SESSION['login']);
?>
