<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armário Solidário</title>
    <link rel="stylesheet" href="stylePerfil.css">
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
        <div class="circle"></div>

        <button method="get" onsubmit="return confirm('Tem certeza que deseja excluir seu perfil? Essa ação não pode ser desfeita.');">Excluir Perfil</button>
        <button>Alterar Perfil</button>
    </main>

    <div class="background-container">
        <img src="../Images/fundoHome.png" alt="Fundo Home" class="background-image">
        <div class="fundo">
            <h1>Descrição: </h1>
            <p>descri</p>
        </div>
        
    </div>

</body>
</html>
