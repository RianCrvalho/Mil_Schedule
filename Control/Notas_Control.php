<?php
  include("../Model/Notas_Model.php");
  include("../Model/Usuario_Model.php");
  include("../BD/conexao.php");
  session_start();
  Class Notas_Control{
  	public $dados;
  	public $conn;

  function __construct(){
  	$this->dados = new Notas_Model();
  	$this->conn = new conexao();
  }

  function notView($id_usr){
  	$sql = "SELECT * FROM notas WHERE id_usr =:id_usr";
  	$d = $this->conn->Conect();
  	$dados =$d->prepare($sql);
    $dados->bindValue(":id_usr", $id_usr);
  	$dados->execute();
  	return $dados;
  }
  function notView_id($id_nota){
    $sql = "SELECT * FROM notas WHERE id_nota =:id_nota";
    $d = $this->conn->Conect();
    $dados =$d->prepare($sql);
    $dados->bindValue(":id_nota", $id_nota);
    $dados->execute();
    return $dados;
  }


  function add($id_usr,$data_nota,$nota){
  	$this->dados->setId_usr($id_usr);
  	$this->dados->setData($data_nota);
    $this->dados->setNota($nota);
  	$sql = "INSERT INTO notas(id_usr,data_nota,nota ) VALUES (:id_usr,:data_nota,:nota);";
  	$d = $this->conn->Conect();
  	$dados = $d->prepare($sql);
  	$dados->bindValue(":id_usr", $this->dados->getId_usr());
  	$dados->bindValue(":data_nota", $this->dados->getData());
    $dados->bindValue(":nota", $this->dados->getNota());
  	$dados->execute();
  	header("Location: ../View/Usuario_View.php");
  }

  function delNota($id_nota){
    $sql = "DELETE FROM notas WHERE id_nota = :id_nota;";
    $d = $this->conn->Conect();
    $dados = $d->prepare($sql);
    $dados->bindValue(":id_nota", $id_nota);
    $dados->execute();
    header("Location: ../View/Usuario_View.php");
  }

    function updNota($id_nota, $data_nota,$nota){
    $sql = "UPDATE notas  SET data_nota = :data_nota, nota = :nota WHERE id_nota = :id_nota;";
    $d = $this->conn->Conect();
    $dados = $d->prepare($sql);
    $dados->bindValue(":id_nota", $id_nota);
    $dados->bindValue(":data_nota", $data_nota);
    $dados->bindValue(":nota", $nota);
    $dados->execute();
    header("Location: ../View/Usuario_View.php");
  }
}
   //     @$acao = $_REQUEST['acao'];
     // if($acao == "deletar"){
       // $id_nota = $_POST['del_id'];

        //$nota = new Notas_Control();

        //$nota->delNota($id_nota);
            
        //header('Location: ../View/Usuario_View.php');
    
//}
?>
