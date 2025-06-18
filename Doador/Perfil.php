<?php
session_start();  
require_once('../Config/Database.php');
require_once('Doador.php');


if (!isset($_SESSION['id_doador'])) {
    header("Location: ../LoginDoa/Login.php");
    exit;
}

$db = (new Database())->getConnection();
$doador = new Doador($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_perfil'])) {
    $doador->id_doador = $_POST['id_doador'];
    if ($doador->deletarDoador()) {
        session_destroy(); 
        header("Location: ../LoginDoa/Login.php");
        exit;
    } else {
        echo "<script>alert('Erro ao excluir perfil. Tente novamente.');</script>";
    }
}

$doador->id_doador = $_SESSION['id_doador'];
$dados = $doador->buscarPorId();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armário Solidário</title>
    <link rel="icon" href="../Images/logo.png" type="image/png">
    <link rel="stylesheet" href="Per.css">
</head>
<body>

<div class="topnav">    
    <img src="../Images/logo.png" alt="logo" class="logo"> 
    <a href="../HomeDoa.php">Home</a>    
    <a href="ListarAcoes.php">Procurar Ações</a>
    <a href="../Peça\Listar.php">Suas Peças</a>
    <a href="../Peça\Cadastro.php">Adicionar Peça</a>
    <a href="Instituicoes.php">Instituições</a>
    <a href="Perfil.php">Perfil</a>
  </div>

    <main>
        <div class="perfil-container">
            <div class="esquerda">
                <div class="circle"></div>

                <div class="button-group">
                    <form method="post" onsubmit="return confirm('Tem certeza que deseja excluir seu perfil? Essa ação não pode ser desfeita.');">
                        <input type="hidden" name="id_doador" value="<?= htmlspecialchars($dados['id_doador'] ?? '') ?>" />
                        <button type="submit" name="excluir_perfil">Excluir Perfil</button>
                    </form>

                    <button onclick="window.location.href='Alterar.php'">Alterar Perfil</button>
                    </div>
            </div>

            <div class="info">
                <h1>Nome:</h1>
                <p><?= htmlspecialchars($dados['nome_doador'] ?? '') ?></p>

                <h1>Email:</h1>
                <p><?= htmlspecialchars($dados['contatoEmail_doador'] ?? '') ?></p>

                <h1>Telefone:</h1>
                <p><?= htmlspecialchars($dados['contatoTelefone_doador'] ?? '') ?></p>
            </div>
        </div>
    </main>

    <div class="background-container">
        <img src="../Images/fundoHome.png" alt="Fundo Home" class="background-image" />
        <div class="fundo">
            <h1>Descrição: </h1>
            <p><?= htmlspecialchars($dados['descricao_doador']) ?></p>
        </div>
    </div>

</body>
</html>