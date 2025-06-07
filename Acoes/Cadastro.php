<?php
require_once('../config/Database.php');
require_once('../Acoes/Acao.php');

if ($_POST) {
  $db = (new Database())->getConnection();
  $acao = new Acao($db);
  $acao->descricao_acao = $_POST['descricao_acao'];
  $acao->nome_acao = $_POST['nome_acao']; 
  $acao->publicoAlvo_acao = $_POST['publicoAlvo_acao'];
  $acao->dataInicio_acao = $_POST['dataInicio_acao'];
  $acao->dataFim_acao = $_POST['dataFim_acao'];
  $acao->qntdBeneficiarios = $_POST['qntdBeneficiarios'];
  $acao->meta_acao = $_POST['meta_acao'];
  $acao->localFisico_acao = $_POST['localFisico_acao'];

  if ($acao->criarAcao()) {
    echo "<script>alert('Ação cadastrada com sucesso!'); window.location.href='Acao.php';</script>";
    exit;
  }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Ação</title>
  <link rel="icon" href="../Images/logo.png" type="image/png" />
  <link rel="stylesheet" href="st.css">
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

    <form method="post" action="">
  <div class="titulo">
    <h1>Cadastro de Ação</h1>
    <img src="..\Images/logo.png" alt="" class="logo"> 
  </div>

  <div class="top-section">
    <div class="foto-acao">Foto da Ação</div>
    <div class="dados-acao">
      <div>
        <label>Nome da Ação</label>
        <input type="text" name="nome_acao" required />
      </div>
      <div>
        <label>Público-Alvo</label>
        <input type="text" name="publicoAlvo_acao" required />
      </div>
      <div>
        <label>Quantidade de Beneficiados</label>
        <input type="number" name="qntdBeneficiarios" required />
      </div>
    </div>
  </div>

  <div class="form-grid">
    <div class="form-half">
      <label>Data de Início</label>
      <input type="date" name="dataInicio_acao" required />
    </div>
    <div class="form-half">
      <label>Data de Término</label>
      <input type="date" name="dataFim_acao" required />
    </div>

    <div class="form-group">
      <label>Descrição da Ação</label>
      <textarea name="descricao_acao" required></textarea>
    </div>

    <div class="form-group">
      <label>Meta da Ação</label>
      <textarea name="meta_acao" required></textarea>
    </div>

    <div class="form-group">
      <label>Local físico de coleta (opcional)</label>
      <input type="text" name="localFisico_acao" />
    </div>
  </div>

  <button type="submit">Salvar Ação</button>
</form>


</body>
</html>
