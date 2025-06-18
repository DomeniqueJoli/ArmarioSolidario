<?php
require_once('../Config/Database.php');
require_once('Doador.php');
require_once('../Acoes/Acao.php');
require_once('../Peça/Peca.php');
session_start();

if (!isset($_SESSION['nome_acao']) || !isset($_SESSION['descricao_peca'])) {
    echo "<p style='color:red;'>Nenhuma ação selecionada.</p>";
    exit;
}

$db = (new Database())->getConnection();
$doador = new Doador($db);

$doador->nome_acao = $_SESSION['nome_acao'] ?? '';
$doador->descricao_peca = $_SESSION['descricao_peca'] ?? '';
$resultado = $doador->listarDoadorSessao();


$nome_acao = $_SESSION['nome_acao'] ?? '';
$descricao_peca = $_SESSION['descricao_peca'] ?? '';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Armário Solidário</title>
    <link rel="icon" href="Images/logo.png" type="image/png">
    <link rel="stylesheet" href="styleLst.css">
</head>
<body>

<div class="topnav">
    <img src="..\Images\logo.png" alt="Logo" class="logo">
    <a href="..\HomeInst.php">Home</a>
    <a href="..\Acoes\Cadastro.php">Adicionar Ação</a>
    <a href="..\Doador\Listar.php">Doadores</a>
    <a href="..\Instituicao\Listar.php">Instituições</a>
    <a href="..\Acoes\Listar.php">Ações Criadas</a>
    <a href="..\Instituicao\Perfil.php">Perfil</a>
</div>

<main>
    <h1>Doadores Parceiros</h1>
    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Ação</th>
            <th>Doação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $row): ?>
            <tr>
                <td><input type="text" value="<?= htmlspecialchars($row['nome_doador'] ?? '') ?>" class="input" readonly></td>
                <td><input type="email" value="<?= htmlspecialchars($row['contatoEmail_doador'] ?? '') ?>" class="input" readonly></td>
                <td><input type="text" value="<?= htmlspecialchars($row['estado_doador'] ?? '') ?>" class="input" readonly></td>
                <td><input type="text" value="<?= htmlspecialchars($row['cidade_doador'] ?? '') ?>" class="input" readonly></td>
                <td><input type="text" value="<?= htmlspecialchars($row['nome_acao'] ?? '') ?>" class="input" readonly></td>
                <td><input type="text" value="<?= htmlspecialchars($row['descricao_peca'] ?? '') ?>" class="input" readonly></td>
            <tr class="btn-row">
                <td colspan="8" style="text-align: center;">
                    <button class="ver-mais" onclick="window.location.href='../Doador/Perfil.php'">Ver mais</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>