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
    <link rel="stylesheet" href="styleList.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">
</head>
<body>

    <div class="topnav">
        <img src="..\Images\logo.png" alt="Logo" class="logo">

        <a href="..\HomeDoa.php">Home</a>
        <a href="..\Peça\Cadastro.php">Adicionar Peça</a>    
        <a href="..\Peça\Listar.php">Suas Peças</a>
        <a href="..\Acoes\Listar.php">Ações Criadas</a>
        <a href="..\Doador\Perfil.php">Perfil</a>
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
                        <div class="btn-container" style="display: flex; justify-content: center; gap: 10px;">
                            <form method="get" action="Excluir.php" onsubmit="return confirm('Tem certeza que deseja excluir esta ação?');">
                                <input type="hidden" name="id_acao" value="<?= htmlspecialchars($row['id_acao']) ?>">
                                <button class="ex" type="submit">Excluir</button>
                            </form>
                            <form method="get" action="Alterar.php">
                                <input type="hidden" name="id_acao" value="<?= htmlspecialchars($row['id_acao']) ?>">
                                <button class="alt" type="submit">Atualizar</button>
                            </form>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>
</html>