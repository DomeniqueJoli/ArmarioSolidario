<?php
require_once ('../Config/Database.php');
require_once ('Acao.php');
$db = (new Database())->getConnection();
$acao = new Acao($db);
$resultado = $acao->listarAcao();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Armário Solidário</title>
    <link rel="stylesheet" href="sl.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">
</head>
<body>

    <div class="topnav">
        <img src="..\Images\logo.png" alt="Logo" class="logo">
        <a href="..\HomeInst.php">Home</a>
        <a href="..\Açao\Cadastro.php">Adicionar Ação</a>
        <a href="..\Doador\Listar.php">Doadores</a>
        <a href="..\Instituicao\Listar.php">Instituições</a>
        <a href="..\Açao\Listar.php">Ações Criadas</a>
        <a href="..\Instituicao\Perfil.php">Perfil</a>
     </div>

    
        <main>
        <h1>Minhas Ações</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Público-Alvo</th>
                    <th>Data inicio</th>
                    <th>Data Fim</th>
                    <th>Qtd. Beneficiarios</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><input value="<?= $row['descricao_acao'] ?>" type="text" class="input" placeholder="Ex: Descrevendo..." readonly></td>
                <td><input value="<?= $row['nome_acao'] ?>" type="text" class="input" placeholder="Ex: Dia das crianças..." readonly></td>
                <td><input value="<?= $row['publicoAlvo_acao'] ?>" type="text" class="input" placeholder="Ex: Crianças..." readonly></td>
                <td><input value="<?= $row['dataInicio_acao'] ?>" type="text" class="input" placeholder="Ex: 03/03/2025..." readonly></td>
                <td><input value="<?= $row['dataFim_acao'] ?>" type="text" class="input" placeholder="Ex: 10/03/2025..." readonly></td>
                <td><input value="<?= $row['qntdBeneficiarios_acao'] ?>" type="text" class="input" placeholder="Ex: 24" readonly></td>
                <td><input value="<?= $row['meta_acao'] ?>" type="text" class="input" placeholder="Ex: 50 peças" readonly></td>
                <td><input value="<?= $row['localFisico_acao'] ?>" type="text" class="input" placeholder="Ex: Instituto Federal..." readonly></td>

                <td><input type="text" class="input"></td>
                    <td><input type="date" class="input"></td>
                    <td><input type="date" class="input"></td>
                    <td><input type="number" class="input" min="0"></td>
                    <td><input type="text" class="input"></td>
                <tr>
                <td colspan="6" style="text-align: center;">
                    <div class="btn-container">
                    <button class="ex">Excluir</button>
                    <button class="alt">Atualizar</button>
                    </div>
                </td>
                </tr>

            </tbody>
        </table>
    </main>

</body>
</html>    
</body>
</html>