<?php
require_once ('../Config/Database.php');
require_once('../Instituicao/Instituicao.php');
session_start(); 
if($_POST)
{
    
$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);
 
    $instituicao->senhaInstituicao = $_POST['senhaInstituicao'];
    $instituicao->contatoEmail_Instituicao = $_POST['contatoEmail_Instituicao']; 
        if ($instituicao->loginInstituicao()) {
            header("Location: ../HomeInst.php");
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

<div class="container">
    <div class="quadrado fundo"></div>
    <div class="quadrado frente"></div>
    <img src="../images/logo.png" class="logo" alt="" class="logo">

    <div class="form">
    <label class="tt"><b>Usuário:</b></label>
    <br>
    <input class="ent" type="text">
    <br>

    <label class="tt"><b>Senha:</b></label>
<br>
    <input class="ent" type="text">
<br>
 <a class="Sen" href="..\RecuperarSenhaInst\RecupSenha.php">Esqueci minha senha</a>
<br>
    <button class="bt" >Entrar</button>
    </div>

</div>

</body>
</html>