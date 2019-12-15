<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../lib/bootstrap.css">
</head>
<body>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        header, footer{
            margin: auto;
            text-align: center;
        }
    </style>

 <header>
       <h1>Agenda</h1> 
    </header>
    <main>
 <?php 
    include("../Control/Usuario_Control.php");
    $usuario = new Usuario_Control(); 
    if (isset ( $_POST [ 'btn-logar' ])) {
        $nome_usr  =  $_POST ['campo_usuario'];
        $senha_usr  =  $_POST ['campo_senha'];
        $usuario->logar($nome_usr, $senha_usr);
        //unset($_SESSION['cadastrado']);
}
        if(isset($_SESSION['cadastrado'])){
         echo "<div class='alert alert-danger' role='alert'>
                 Usuário ou senha incorreta!</div>";
           
}


?>
        <div id="div_login" class="container">
            <form method="POST">
                <div class="form-group">
                    <label for="user">Usuário:</label>
                    <input type="text" id="user" name="campo_usuario" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pass">Senha:</label>
                    <input type="password" id="pass" name="campo_senha" class="form-control">
                </div>
                <div id="div_buttons">
                    <button type="submit" id="btn-enviar" name="btn-logar" class="btn btn-success" value="btn1">Enviar</button>
                    &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp&nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp
                    <a href="cadastro.php">Cadastrar</a>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <div>
            <p>2019 &copy; Copyright - Todos os direitos reservados | Calango Voador.</p>
        </div>
    </footer>