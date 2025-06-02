<?php

require_once ('../Config/Database.php');
require_once('../Doador/Doador.php');

if($_POST)
{
    
$db = (new Database())->getConnection();
$doador = new Doador($db);  
    $doador->senhaDoador = $_POST['senhaDoador'];
    $doador->contatoEmail_doador = $_POST['contatoEmail_doador']; 
        if ($doador->loginDoador()) {
            session_start();
            header("Location: HomeDoa.php");
            exit;   
            }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armário Solidário</title>
    <link rel="stylesheet" href="styleLogin.css">
    <link rel="icon" href="..\Images/logo.png" type="image/png">
</head>
<body>

<form method="POST">
    <div class="container">
    <div class="quadrado fundo"></div>
    <div class="quadrado frente"></div>
    <img src="../images/logo.png" class="logo" alt="" class="logo">

    <div class="form">
    <label class="tt"><b>E-mail:</b></label>
    <br>
    <input class="ent" type="text"  name="contatoEmail_doador" required>
    <br>

    <label class="tt"><b>Senha:</b></label>
<br>
    <input class="ent" type="password" name="senhaDoador" required>
<br>
    <a class="Sen" href="..\RecuperarSenha\RecupSenha.php">Esqueci minha senha</a>
<br>
    <button class="bt" >Entrar</button>
    </div>

</div>

</form>

</body>
</html>