<?php
session_start();

require_once('../config/Database.php');
require_once('../Instituicao/Instituicao.php');

$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);

$instituicao->id_instituicao = $_SESSION['id_instituicao'] ?? null;

if (!$instituicao->id_instituicao) {
    die('Erro: ID da instituição não foi informado na sessão.');
}

$dados = $instituicao->buscarPorId();
if (!$dados) {
    die('Erro: Instituição não encontrada.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $instituicao->id_instituicao = $_POST['id_instituicao'] ?? null;

    $instituicao->cnpj_instituicao = $_POST['cnpj_instituicao'] ?? '';
    $instituicao->nome_instituicao = $_POST['nome_instituicao'] ?? '';
    $instituicao->endereco_instituicao = $_POST['endereco_instituicao'] ?? '';
    $instituicao->numero_instituicao = $_POST['numero_instituicao'] ?? '';
    $instituicao->bairro_instituicao = $_POST['bairro_instituicao'] ?? '';
    $instituicao->cidade_instituicao = $_POST['cidade_instituicao'] ?? '';
    $instituicao->estado_instituicao = $_POST['estado_instituicao'] ?? '';
    $instituicao->telefone_instituicao = $_POST['telefone_instituicao'] ?? '';
    $instituicao->email_instituicao = $_POST['email_instituicao'] ?? '';
    $instituicao->senha_instituicao = $_POST['senha_instituicao'] ?? '';

    if ($instituicao->alterarInstituicao()) {
        header("Location: Listar.php");
        exit;
    } else {
        echo "<p style='color:red;'>Erro ao alterar a instituição. Tente novamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Alterar Instituição</title>
  <link rel="icon" href="../Images/logo.png" type="image/png" />
  <link rel="stylesheet" href="styleAlter.css">
</head>
<body>
    <h1>Alterar Instituição</h1>
    <form method="post" action="">
        <input type="hidden" name="id_instituicao" value="<?= htmlspecialchars($dados['id_instituicao']) ?>">

        <label>CNPJ:</label>
        <input type="text" name="cnpj_instituicao" value="<?= htmlspecialchars($dados['cnpj_instituicao']) ?>" required><br>

        <label>Nome:</label>
        <input type="text" name="nome_instituicao" value="<?= htmlspecialchars($dados['nome_instituicao']) ?>" required><br>

        <label>Endereço:</label>
        <input type="text" name="endereco_instituicao" value="<?= htmlspecialchars($dados['endereco_instituicao']) ?>" required><br>

        <label>Número:</label>
        <input type="text" name="numero_instituicao" value="<?= htmlspecialchars($dados['numero_instituicao']) ?>" required><br>

        <label>Bairro:</label>
        <input type="text" name="bairro_instituicao" value="<?= htmlspecialchars($dados['bairro_instituicao']) ?>" required><br>

        <label>Cidade:</label>
        <input type="text" name="cidade_instituicao" value="<?= htmlspecialchars($dados['cidade_instituicao']) ?>" required><br>

        <label>Estado:</label>
        <input type="text" name="estado_instituicao" value="<?= htmlspecialchars($dados['estado_instituicao']) ?>" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone_instituicao" value="<?= htmlspecialchars($dados['telefone_instituicao']) ?>" required><br>

        <label>E-mail:</label>
        <input type="email" name="email_instituicao" value="<?= htmlspecialchars($dados['email_instituicao']) ?>" required><br>

        <label>Senha:</label>
        <input type="password" name="senha_instituicao" value="<?= htmlspecialchars($dados['senha_instituicao']) ?>" required><br>

        <button type="submit">Alterar</button>
    </form>
</body>
</html>
