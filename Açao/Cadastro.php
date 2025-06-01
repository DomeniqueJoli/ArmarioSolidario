<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArmárioSolidário</title>
    <link rel="icon" href="../Images/logo.png" type="image/png"></head>
    <link rel="stylesheet" href="styleCads.css">
<body>

<div class="topnav">    
<img src="../Images/logo.png" alt="" class="logo"> 
    <a href="../HomeInst.php">Home</a>    
    <a href="..\Açao\Cadastro.php">Adicionar Ação</a>
    <a href="..\Doador\Listar.php">Doadores</a>
    <a href="..\Instituicao\Listar.php">Instituições</a>
    <a href="..\Açao\Listar.php">Ações Criadas</a>
    <a href="..\Instituicao\Perfil.php">Perfil</a>
</div>

    <form action="">
        <div>
        Nome completo: <input type="text" name="nomeDoador" required><br>
        CPF: <input type="text" name="cpfDoador" required><br>
        Descrição: <input type="text" name="bioDoador" required><br>
    </div>
    
    Data de Nascimento: <input type="date" name="dataDoador" required><br>
    Contato: <input type="text" name="contatoDoador" required><br>
    CEP: <input type="text" name="cepDoador" required><br>
    Estado: <input type="text" name="estadoDoador" required><br>
    Cidade: <input type="text" name="cidadeDoador" required><br>
    Bairro: <input type="text" name="bairroDoador" required><br>
    Rua: <input type="text" name="ruaDoador" required><br>
    Número: <input type="number" name="numlocalDoador" required><br>
    E-mail: <input type="email" name="emailDoador" required><br>
    Senha: <input type="password" name="senhaDoador" required> Confirmar senha: <input type="password" name="senhaDoador" required><br><br>
    
    </form>
    
    
    
</body>
</html>