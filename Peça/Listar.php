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
        <img src="../Images/logo.png" alt="Logo" class="logo">
        <a href="../HomeInst.php">Home</a>
        <a href="../Acao/Cadastro.php">Adicionar Ação</a>
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
                <tr>
                    <td><input type="text" class="input" placeholder="Ex: Camiseta"></td>
                    <td><input type="text" class="input" placeholder="Novo/Usado"></td>
                    <td><input type="date" class="input"></td>
                    <td><input type="text" class="input" placeholder="Infantil, Adulto..."></td>
                    <td><input type="text" class="input" placeholder="P, M, G, etc."></td>
                    <td><input type="text" class="input" placeholder="Masculino, Feminino, Unissex..."></td>
                    <td><input type="text" class="input" placeholder="Ex: 1 ano"></td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">
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
