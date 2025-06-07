<?php
require_once ('../Config/Database.php');
require_once('Peca.php');

if($_POST)
{
  $db = (new Database()) ->getConnection();
  $peca = new Peca($db);
  $peca->descricao_peca = $_POST['descricao_peca'];
  $peca->tipo_vestimenta = $_POST['tipo_vestimenta'];
  $peca->tempoUso_peca = $_POST['tempoUso_peca'];
  $peca->tamanho_peca = $_POST['tamanho_peca'];
  $peca->estado_peca = $_POST['estado_peca'];
  $peca->dataCompra_peca = $_POST['dataCompra_peca'];
  $peca->genero_peca = $_POST['genero_peca'];
  $peca->faixaEtaria_peca = $_POST['faixaEtaria_peca'];

  if ($peca->criarPeca()) {
    echo "<h3>Peça Adicionada!</h3>";
    header("Location: ../Peça/Listar.php");
    exit;
  }

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Peça</title>
  <link rel="stylesheet" href="st2.css" />
  <link rel="icon" href="../Images/logo.png" type="image/png" />
</head>
<body>

  <div class="topnav">
    <img src="../Images/logo.png" alt="Logo" class="logo" />
    <a href="#">Home</a>
    <a href="../Ação/">Ver Ações</a>
    <a href="../Peça/Listar.php">Suas Peças</a>
    <a href="../Doador/Perfil.php">Perfil</a>
  </div>


  <form method="post">
  <div class="titulo">
    <h1>Cadastro de Peça</h1>
    <img src="../Images/logo.png" alt="Logo" />
  </div>

    <div class="foto-e-descricao">
      <div class="foto-peca">Foto da peça</div>
      <div>
        <label for="descricao">Descrição</label>
         <textarea name="descricao_peca" id="descricao" required></textarea>
      </div>
    </div>

    <div class="form-row">
      <div>
        <label for="tipo">Tipo da vestimenta</label>
        <input type="text" id="tipo" name="tipo_vestimenta" required/>
      </div>
      <div>
        <label for="estado">Estado da peça</label>
        <input type="text" id="estado" name="estado_peca" required/>
      </div>
      <div>
        <label for="tamanho">Tamanho</label>
        <input type="text" id="tamanho" name="tamanho_peca" required/>
      </div>
    </div>

    <div class="form-row2">
      <div>
        <label for="data">Data de compra</label>
        <input type="date" id="data" name="dataCompra_peca" required/>
      </div>
      <div>
        <label for="genero">Gênero</label>
        <input class="genero" type="text" id="genero" name="genero_peca" required/>
      </div>
      <div>
        <label for="faixa">Faixa etária</label>
        <input type="text" id="faixa" name="faixaEtaria_peca" required/>
      </div>
      <div>
        <label for="tempo">Tempo de uso</label>
        <input type="text" id="tempo" name="tempoUso_peca" required/>
      </div>
    </div>

    <button type="submit">Cadastrar Peça</button>
  </form>

</body>
</html>
