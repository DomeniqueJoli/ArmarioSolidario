<?php
require_once('../Config/Database.php');
require_once('../Instituicao/Instituicao.php');

$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);
$resultado = $instituicao->listarInstituicao();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Armário Solidário</title>
    <link rel="icon" href="../Images/logo.png" type="image/png">
    <link rel="stylesheet" href="../Instituicao/styleLst.css" />
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
        <h1>Instituições Parceiras</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome Fantasia</th>
                    <th>Tipo</th>
                    <th>Área de Atuação</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Contato</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nomeFantasia_instituicao'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['tipoInstituicao'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['areaAtuacao_instituicao'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['estado_instituicao'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['cidade_instituicao'] ?? '') ?></td>
                    <td>
                        <a href="mailto:<?= htmlspecialchars($row['contatoEmail_instituicao'] ?? '') ?>">
                            <?= htmlspecialchars($row['contatoEmail_instituicao'] ?? '') ?>
                        </a><br>
                        <a href="tel:<?= htmlspecialchars($row['contatoTelefone_instituicao'] ?? '') ?>">
                            <?= htmlspecialchars($row['contatoTelefone_instituicao'] ?? '') ?>
                        </a>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">
                        <button class="ver-mais" onclick="window.location.href='../Instituicao/Perfil.php?id=<?= urlencode($row['id_instituicao'] ?? '') ?>'">
                            Ver Mais
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </main>
</body>
</html>
