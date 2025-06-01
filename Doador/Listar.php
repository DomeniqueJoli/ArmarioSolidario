<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Doadores</title>
    <link rel="stylesheet" href="styleList.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">
</head>
<body>

    <div class="topnav">
        <img src="..\Images\logo.png" alt="Logo" class="logo">
        <a href="#">Home</a>
        <a href="#">Adicionar Ação</a>
        <a href="#">Doadores</a>
        <a href="#">Instituições</a>
        <a href="#">Ações Criadas</a>
        <a href="#">Perfil</a>
    </div>

    <main>
        <h1>Lista de Doadores</h1>
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
