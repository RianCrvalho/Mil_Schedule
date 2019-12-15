<?php
  include("../Model/Usuario_Model.php");
  include("../BD/conexao.php");
  session_start();

  Class Usuario_Control{
  	public $dados;
  	public $conn;

  function __construct(){
  	$this->dados = new Usuario_Model();
  	$this->conn = new conexao();

  }

  function userView(){
  	$sql = "SELECT * FROM usuario";
  	$d = $this->conn->Conect();
  	$dados =$d->prepare($sql);
  	$dados->execute();
  	return $dados;

  }

  function add($nome_usr,$senha_usr){
  	$this->dados->setNome_usr($nome_usr);
  	$this->dados->setSenha_usr($senha_usr);
  	$sql = "INSERT INTO usuario(nome_usr,senha_usr) VALUES (:nome_usr,:senha_usr);";
  	$d = $this->conn->Conect();
  	$dados = $d->prepare($sql);
  	$dados->bindValue(":nome_usr", $this->dados->getNome_usr());
  	$dados->bindValue(":senha_usr", $this->dados->getSenha_usr());
  	$dados->execute();
  	header("Location: ../View/Usuario_View.php");

  }
  
  function logar($nome_usr, $senha_usr){
      $this->dados->setNome_usr($nome_usr);
      $this->dados->setSenha_usr($senha_usr);

      $sql = "SELECT id_usr,nome_usr from usuario where nome_usr = :nome_usr and senha_usr = :senha_usr;";
      $d = $this->conn->Conect();
      $dados = $d->prepare($sql);
      $dados->bindValue(":nome_usr", $this->dados->getNome_usr());
      $dados->bindValue(":senha_usr", $this->dados->getSenha_usr());
      $dados->execute();
      
       $users = $dados->fetchAll();
            
            if(count($users) <= 0){

                header('Location: ../View/Teste.php');
            }else{
               // $_SESSION['vendedor_id'] = $user['vendedor_id'];
                //$_SESSION['nome_vendedor'] = $user['nome'];

                header('Location: ../View/cadastro.php');
            }
   
  
  
}
}
?>