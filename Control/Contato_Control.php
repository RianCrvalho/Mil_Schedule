<?php
  include("../Model/Contato_Model.php");
  

  Class Contato_Control{
  	public $dados;
  	public $conn;
  function __construct(){
  	$this->dados = new Contato_Model();
  	$this->conn = new conexao();
  }
  function contView($id_usr){
  	$sql = "SELECT * FROM contato WHERE id_usr = :id_usr;";
  	$d = $this->conn->Conect();
  	$dados =$d->prepare($sql);
    $dados->bindValue(":id_usr", $id_usr);
  	$dados->execute();
  	return $dados;


  }

  function contView_id($id_cont){
    $sql = "SELECT * FROM contato WHERE id_cont = :id_cont;";
    $d = $this->conn->Conect();
    $dados =$d->prepare($sql);
    $dados->bindValue(":id_cont", $id_cont);
    $dados->execute();
    return $dados;
  }
  function addCont($id_usr,$nome_cont,$numero_cont,$email_cont){
  	$this->dados->setId_usr($id_usr);
  	$this->dados->setNome_cont($nome_cont);
    $this->dados->setNumero_cont($numero_cont);
    $this->dados->setEmail($email_cont);
  	$sql = "INSERT INTO contato(id_usr,nome_cont,numero_cont,email_cont) VALUES (:id_usr,:nome_cont,:numero_cont,:email_cont);";
  	$d = $this->conn->Conect();
  	$dados = $d->prepare($sql);
  	$dados->bindValue(":id_usr", $this->dados->getId_usr());
  	$dados->bindValue(":nome_cont", $this->dados->getNome_cont());
    $dados->bindValue(":numero_cont", $this->dados->getNumero_cont());
    $dados->bindValue(":email_cont", $this->dados->getEmail());
  	$dados->execute();
  	header("Location: ../View/Usuario_View.php");
  }
  function delCont($id_cont){
    $sql = "DELETE FROM contato WHERE id_cont  = :id_cont;";
    $d = $this->conn->Conect();
    $dados = $d->prepare($sql);
    $dados->bindValue(":id_cont", $id_cont);
    $dados->execute();
    header("Location: ../View/Usuario_View.php");
  }
    function updCont($id_cont, $nome_cont,$numero_cont,$email_cont){
    $sql = "UPDATE contato  SET nome_cont = :nome_cont, numero_cont = :numero_cont, email_cont = :email_cont WHERE id_cont = :id_cont;";
    $d = $this->conn->Conect();
    $dados = $d->prepare($sql);
    $dados->bindValue(":id_cont", $id_cont);
    $dados->bindValue(":nome_cont", $nome_cont);
    $dados->bindValue(":numero_cont", $numero_cont);
    $dados->bindValue(":email_cont", $email_cont);
    $dados->execute();
    header("Location: ../View/Usuario_View.php");
  }
}
?>
