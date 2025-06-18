<?php
require_once ('../Config/Database.php');
require_once ('../Peça/Peca.php');

// session_start();
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
    <link rel="stylesheet" href="StylePart.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">
</head>
<body>

    <div class="topnav">
        <img src="../Images/logo.png" alt="Logo" class="logo">
        <a href="../HomeDoa.php">Home</a>
        <a href="../Peça/Cadastro.php">Adicionar Peças</a>
        <a href="../Doador/ListarAcoes.php">Ações Criadas</a>
        <a href="../Doador/Perfil.php">Perfil</a>
    </div>

    <main>  
        <h1>Minhas Peças</h1>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Estado</th>
                    <th>Data de Compra</th>
                    <th>Faixa Etária</th>
                    <th>Tamanho</th>
                    <th>Gênero</th>
                    <th>Tempo de Uso</th>
                    <th>Doar</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $resultado->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td><input value="<?= $row['tipo_vestimenta'] ?>" type="text" class="input" placeholder="Ex: Camiseta" readonly></td>
                    <td><input value="<?= $row['descricao_peca'] ?>" type="text" class="input" placeholder="Descreva sua peça" readonly></td>
                    <td><input value="<?= $row['estado_peca'] ?>" type="text" class="input" placeholder="Novo/Usado" readonly></td>
                    <td><input value="<?= $row['dataCompra_peca'] ?>" type="date" class="input" readonly></td>
                    <td><input value="<?= $row['faixaEtaria_peca'] ?>" type="text" class="input" placeholder="Infantil, Adulto..." readonly></td>
                    <td><input value="<?= $row['tamanho_peca'] ?>" type="text" class="input" placeholder="P, M, G, etc." readonly></td>
                    <td><input value="<?= $row['genero_peca'] ?>" type="text" class="input" placeholder="Masculino, Feminino, Unissex..." readonly></td>
                    <td><input value="<?= $row['tempoUso_peca'] ?>" type="text" class="input" placeholder="Ex: 1 ano" readonly></td>
                    <td>
                        <div class="btn-container">
                            <a class="ex" href="Escolher.php?id_peca=<?= $row['id_peca'] ?>" onclick="selecionar(<?= $row['descricao_peca'] ?>">
                                Escolher
                                <script>
                                    function selecionar(valor) {
                                    if (window.opener && !window.opener.closed) {
                                        window.opener.receberSelecao(valor); // Envia o dado para a aba principal
                                    }
                                    window.close(); // Fecha a aba de dados
                                    }
                                </script>
                        </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td colspan="7" style="text-align: center;">
                        <div class="btn-container">
                            <a class="ex" href="Excluir.php?id_peca=<?= $row['id_peca'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                Excluir
                            </a>
                            <a class="alt" href="Alterar.php?id_peca=<?= $row['id_peca'] ?>" onclick="return confirm('Deseja atualizar sua peça?')">
                                Atualizar
                            </a>
                        </div>
                    </td>
                </tr> -->
                <?php endwhile;?>   
            </tbody>
        </table>
    </main>
    

</body>
</html>
