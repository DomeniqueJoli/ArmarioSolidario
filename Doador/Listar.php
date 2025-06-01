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
        <a href="..\Açao\Cadastro.php">Adicionar Ação</a>
        <a href="..\Doador\Listar.php">Doadores</a>
        <a href="..\Instituicao\Listar.php">Instituições</a>
        <a href="..\Açao\Listar.php">Ações Criadas</a>
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
                    <th>Qtd. Ações Participadas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="input"></td>
                    <td><input type="email" class="input"></td>
                    <td><input type="text" class="input"></td>
                    <td><input type="text" class="input"></td>
                    <td><input type="number" class="input" min="0"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center;">
                        <button class="ver-mais">Ver mais</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

</body>
</html>
