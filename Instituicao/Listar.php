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
        <a href="..\HomeInst.php">Home</a>
        <a href="..\Açao\Cadastro.php">Adicionar Ação</a>
        <a href="..\Doador\Listar.php">Doadores</a>
        <a href="..\Instituicao\Listar.php">Instituições</a>
        <a href="..\Açao\Listar.php">Ações Criadas</a>
        <a href="..\Instituicao\Perfil.php">Perfil</a>
    </div>

</body>

    <main>
        <h1>Instituições Parceiras</h1>
        <table>
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Área de Atuação</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Contato</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="file" class="inst-img-input">
                    </td>
                    <td><input type="text" class="input"></td>
                    <td><input type="text" class="input"></td>
                    <td><input type="text" class="input"></td>
                    <td><input type="text" class="input"></td>
                    <td><input type="text" class="input"></td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                <td colspan="8" style="text-align: center;">
                <button class="ver-mais">Ver mais</button>
                </td>
                </tr>

            </tbody>
        </table>
    </main>

</body>
</html>
