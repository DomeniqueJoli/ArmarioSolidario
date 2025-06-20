<?php
session_start();
require_once '../Config/Database.php';
require_once 'Instituicao.php';

if (!isset($_SESSION['id_instituicao'])) 
{
    header("Location: ../LoginInst/Login.php");
    exit;
}

$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_perfil'])) {
    $instituicao->id_instituicao = $_POST['id_instituicao'];
    if ($instituicao->deletarInstituicao()) {
        session_destroy(); 
        header("Location: ../LoginInst/Login.php");
        exit;
    } else {
        echo "<script>alert('Erro ao excluir perfil. Tente novamente.');</script>";
    }
}

$instituicao->id_instituicao = $_SESSION['id_instituicao'];
$dados = $instituicao->buscarPorId();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Armário Solidário</title>
    <link rel="icon" href="../Images/logo.png" type="image/png">
    <link rel="stylesheet" href="Perff.css" />
</head>
<body>

    <div class="topnav">
        <img src="../Images/logo.png" alt="Logo" class="logo" />
        <a href="../HomeInst.php">Home</a>
        <a href="../Acoes/Cadastro.php">Adicionar Ação</a>
        <a href="../Doador/Listar.php">Doadores</a>
        <a href="../Instituicao/Listar.php">Instituições</a>
        <a href="../Acoes/Listar.php">Ações Criadas</a>
        <a href="../Instituicao/Perfil.php">Perfil</a>
    </div>

    <main>
        <div class="perfil-container">
            <div class="esquerda">
                <div class="circle"></div>

                <div class="button-group">
                    <form method="post" onsubmit="return confirm('Tem certeza que deseja excluir seu perfil? Essa ação não pode ser desfeita.');">
                        <input type="hidden" name="id_instituicao" value="<?= htmlspecialchars($dados['id_instituicao'] ?? '') ?>" />
                        <button type="submit" name="excluir_perfil">Excluir Perfil</button>
                    </form>

                    <button onclick="window.location.href='Alterar.php'">Alterar Perfil</button>
                </div>
            </div>

            <div class="info">
                <h1>Nome:</h1>
                <p><?= htmlspecialchars($dados['nomeFantasia_instituicao'] ?? '') ?></p>

                <h1>Email:</h1>
                <p><?= htmlspecialchars($dados['contatoEmail_instituicao'] ?? '') ?></p>

                <h1>Telefone:</h1>
                <p><?= htmlspecialchars($dados['contatoTelefone_instituicao'] ?? '') ?></p>

                <h1>CNPJ:</h1>
                <p><?= htmlspecialchars($dados['cnpj_instituicao'] ?? '') ?></p>
            </div>
        </div>
    </main>

    <div class="background-container">
        <img src="../Images/fundoHome.png" alt="Fundo Home" class="background-image" />
        <div class="fundo">
            <h1>Descrição: </h1>
            <p><?= htmlspecialchars($dados['missao_instituicao'] ?? '') ?></p>
        </div>
    </div>

</body>
</html>
