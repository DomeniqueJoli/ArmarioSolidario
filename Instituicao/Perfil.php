<?php
session_start();
require_once '../Config/Database.php';
require_once 'Instituicao.php';

if (!isset($_SESSION['id_instituicao'])) {
    header("Location: ../LoginInst/Login.php");
    exit;
}
$id = $_SESSION['id_instituicao'];

$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);
$instituicao->id_instituicao = $id;
$dados = $instituicao->buscarPorId();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Armário Solidário</title>
    <link rel="stylesheet" href="sp.css" />
    <link rel="icon" href="../Images/logo.png" type="image/png" />
</head>
<body>

    <div class="topnav">
        <img src="../Images/logo.png" alt="Logo" class="logo" />
        <a href="../HomeInst.php">Home</a>
        <a href="../Acao/Cadastro.php">Adicionar Ação</a>
        <a href="../Doador/Listar.php">Doadores</a>
        <a href="../Instituicao/Listar.php">Instituições</a>
        <a href="../Acao/Listar.php">Ações Criadas</a>
        <a href="../Instituicao/Perfil.php">Perfil</a>
    </div>

    <main>
        <div class="circle"></div>

        <div class="button-group">
            <form method="post" onsubmit="return confirm('Tem certeza que deseja excluir seu perfil? Essa ação não pode ser desfeita.');">
                <input type="hidden" name="id_instituicao" value="<?= htmlspecialchars($dados['id_instituicao']) ?>" />
                <button type="submit" name="excluir_perfil">Excluir Perfil</button>
            </form>

            <button onclick="window.location.href='Editar.php'">Alterar Perfil</button>
        </div>
    </main>

    <div class="background-container">
        <img src="../Images/fundoHome.png" alt="Fundo Home" class="background-image" />
        <div class="fundo">
            <h1>Nome: </h1>
            <p><?= htmlspecialchars($dados['nomeFantasia_instituicao']) ?></p>

            <h1>Email: </h1>
            <p><?= htmlspecialchars($dados['contatoEmail_instituicao']) ?></p>

            <h1>Telefone: </h1>
            <p><?= htmlspecialchars($dados['contatoTelefone_instituicao']) ?></p>

            <h1>CNPJ: </h1>
            <p><?= htmlspecialchars($dados['cnpj_instituicao']) ?></p>

            <h1>Descrição: </h1>
            <p><?= htmlspecialchars($dados['missao_instituicao']) ?></p>
        </div>
    </div>

</body>
</html>
