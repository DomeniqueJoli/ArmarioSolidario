<?php
require_once ('../Config/Database.php');
require_once('../Instituicao/Instituicao.php');
session_start(); 
if($_POST)
{
    
$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);
 
    $instituicao->contatoEmail_instituicao = $_POST['contatoEmail_instituicao'];
    $instituicao->senhaInstituicao = $_POST['senhaInstituicao'];
        if ($instituicao->loginInstituicao()) {
            header("Location: ../HomeInst.php");
            exit;   
            }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armário Solidário</title>
    <link rel="stylesheet" href="styleLgn.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">
</head>
<body>

<form method="POST">
    <div class="container">
        <div class="quadrado fundo"></div>
        <div class="quadrado frente"></div>
        <img src="../Images/logo.png" class="logo" alt="logo">

        <div class="form">
            <label class="tt"><b>E-mail:</b></label>
            <br>
            <input class="ent" type="email" name="contatoEmail_instituicao" required>
            <br>

            <label class="tt"><b>Senha:</b></label>
            <br>
            <input class="ent" type="password" name="senhaInstituicao" required>
            <br>

            <a class="Sen" href="RecupSenha.php">Esqueci minha senha</a>
            <br>

            <button class="bt">Entrar</button>
        </div>
    </div>
</form>

</body>
</html>
