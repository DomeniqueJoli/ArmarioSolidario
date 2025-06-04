<?php
require_once ('../Config/Database.php');
require_once ('Peca.php');
$db = (new Database())->getConnection();
$peca = new Peca($db);
$resultado = $peca->listarPeca();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armário Solidário</title>
    <link rel="stylesheet" href="sl2.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">
</head>
<body>

    <div class="topnav">
        <img src="../Images/logo.png" alt="Logo" class="logo">
        <a href="../HomeInst.php">Home</a>
        <a href="../Peça/Cadastro.php">Suas Peça</a>
        <a href="../Doador/Listar.php">Doadores</a>
        <a href="../Instituicao/Listar.php">Instituições</a>
        <a href="../Acao/Listar.php">Ações Criadas</a>
        <a href="../Instituicao/Perfil.php">Perfil</a>
    </div>

    <main>  
        <h1>Minhas Peças</h1>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Data de Compra</th>
                    <th>Faixa Etária</th>
                    <th>Tamanho</th>
                    <th>Gênero</th>
                    <th>Tempo de Uso</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $resultado->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td><input value="<?= $row['id_peca']?>" type="hidden"></td>
                    <td><input value="<?= $row['tipo_vestimenta'] ?>" type="text" class="input" placeholder="Ex: Camiseta" readonly></td>
                    <td><input value="<?= $row['estado_peca'] ?>" type="text" class="input" placeholder="Novo/Usado" readonly></td>
                    <td><input value="<?= $row['dataCompra_peca'] ?>" type="date" class="input" readonly></td>
                    <td><input value="<?= $row['faixaEtaria_peca'] ?>" type="text" class="input" placeholder="Infantil, Adulto..." readonly></td>
                    <td><input value="<?= $row['tamanho_peca'] ?>" type="text" class="input" placeholder="P, M, G, etc." readonly></td>
                    <td><input value="<?= $row['genero_peca'] ?>" type="text" class="input" placeholder="Masculino, Feminino, Unissex..." readonly></td>
                    <td><input value="<?= $row['tempoUso_peca'] ?>" type="text" class="input" placeholder="Ex: 1 ano" readonly></td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">
                        <div class="btn-container">
                            <form method="post" action="Excluir.php">
                            <input type="hidden" name="id_doador" value="<?= $row['id_peca'] ?>">
                            <button type="submit" class="ex">Excluir</button>
                            </form>
                            <a href="Alterar.php"><button value="<?= $row['id_peca'] ?>" type="submit" class="alt">Atualizar</button></a>
                        </div>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </main>
    

</body>
</html>
