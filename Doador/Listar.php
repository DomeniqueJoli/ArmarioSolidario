<?php
require_once('../Config/Database.php');
require_once('Doador.php');

$db = (new Database())->getConnection();
$doador = new Doador($db);
$resultado = $doador->listarDoador();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Armário Solidário</title>
    <link rel="stylesheet" href="styleList.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">
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
                    <th>Doação</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><input type="text" placeholder="Nome do Doador" value="<?= htmlspecialchars($row['nome_doador'] ?? '') ?>" class="input" readonly></td>
                    <td><input type="email" placeholder="Contato de Email" value="<?= htmlspecialchars($row['contatoEmail_doador'] ?? '') ?>" class="input" readonly></td>
                    <td><input type="text" placeholder="Ex.: RO..." value="<?= htmlspecialchars($row['estado_doador'] ?? '') ?>" class="input" readonly></td>
                    <td><input type="text" placeholder="Ex.: Ji-Paraná..." value="<?= htmlspecialchars($row['cidade_doador'] ?? '') ?>" class="input" readonly></td>
                    <!-- <td><input type="text" value="<?= htmlspecialchars($row['descricao_peca'] ?? '') ?>" class="input" min="0" readonly></td> -->
                    <td></td>
                </tr>
                <tr class="btn-row">
                    <td colspan="8" style="text-align: center;">
                        <button class="ver-mais" onclick="window.location.href='../Doador/Perfil.php'">Ver mais</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </main>

</body>
</html>
