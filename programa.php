<?php
require_once("connect.php");
session_start();

if($_SESSION['login'] == ""|| $_SESSION['senha'] == "") // checa se a SESSION expirou
{
  echo "<script type='text/javascript'>alert('Login expirado, entre novamente.')</script>";
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=luigi.php \">";
}

class Usuario{  // criação da classe usuario
  private $nome;
  private $sexo;
  private $idade;
  private $cidade;

  function __construct(){
    $this->idade = '21 anos';
    $this->cidade = 'Costa Verde';
  }
  public function darNome($name){
    $this->nome = $name;
  }

  public function pegarNome(){
    echo $this->nome;
    $this->darEspaço();
  }
  public function pegarIdade(){
    echo $this->idade;
    $this->darEspaço();
  }
  public function pegarCidade(){
    echo $this->cidade;
    $this->darEspaço();
  }
  public function darEspaço(){
    echo "&nbsp";
    //echo str_repeat("&nbsp;", 1);
  }
}

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


boasvindas($_SESSION['login']);
$user = new Usuario();
$user->darNome('Jovem');

function boasvindas($nome){
  print("Ola $nome, bem vindo ao programa de teste 2019");
}
print '<br>';
$user->pegarNome();
$user->pegarIdade();
$user->pegarCidade();
?>
