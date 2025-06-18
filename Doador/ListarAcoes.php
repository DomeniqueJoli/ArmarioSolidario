<?php
require_once ('../Config/Database.php');
require_once ('../Acoes/Acao.php');

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
    <link rel="icon" href="../Images/logo.png" type="image/png">
    <link rel="stylesheet" href="styleLst.css">
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
        <h1>Ações</h1>
        <table> 
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Público-Alvo</th>
                    <th>Data inicio</th>
                    <th>Data Fim</th>
                    <th>Qtd. Beneficiarios</th>
                    <th>Status</th>
                    <th>Local Coleta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nome_acao']) ?></td>
                <td><?= htmlspecialchars($row['publicoAlvo_acao']) ?></td>
                <td><?= htmlspecialchars($row['dataInicio_acao']) ?></td>
                <td><?= htmlspecialchars($row['dataFim_acao']) ?></td>
                <td><?= htmlspecialchars($row['qntdBeneficiarios']) ?></td>
                <td><?= htmlspecialchars($row['meta_acao']) ?></td>
                <td><?= htmlspecialchars($row['localFisico_acao']) ?></td>

            </tr>
            <tr>
                    <td colspan="7" style="text-align: center;">
                            <form method="get" action="indexParticipação.php">
                                <input type="hidden" name="id_acao" value="<?= htmlspecialchars($row['id_acao']) ?>">
                                <input type="hidden" name="nome_acao" value="<?= htmlspecialchars($row['nome_acao']) ?>">
                                <input type="hidden" name="descricao_acao" value="<?= htmlspecialchars($row['descricao_acao']) ?>">
                                <input type="hidden" name="dataInicio_acao" value="<?= htmlspecialchars($row['dataInicio_acao']) ?>">
                                <input type="hidden" name="dataFim_acao" value="<?= htmlspecialchars($row['dataFim_acao']) ?>">
                                <input type="hidden" name="localFisico_acao" value="<?= htmlspecialchars($row['localFisico_acao']) ?>">
                                <button class="par" type="submit">Participar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>