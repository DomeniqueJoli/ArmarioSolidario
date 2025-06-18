<?php
session_start();
require_once('../Config/Database.php');
require_once('../Peça/Peca.php');
require_once('../Acoes/Acao.php');
require_once('../Doador/Doador.php');
require_once('../Participacoes/Participacao.php');

$db = (new Database())->getConnection();
$participacao = new Participacao($db);
$peca = new Peca($db);
$acao = new Acao($db);
$doador = new Doador($db);

if (isset($_GET['id_acao'])) {
    $acao->id_acao = $_GET['id_acao'];
    $acao->nome_acao = $_GET['nome_acao'];
    $acao->descricao_acao = $_GET['descricao_acao'];
    $acao->dataInicio_acao = $_GET['dataInicio_acao'];
    $acao->dataFim_acao = $_GET['dataFim_acao'];
    $acao->localFisico_acao = $_GET['localFisico_acao'];

    $dados = $acao->buscarPorIdParticipacao();

    $nome_acao = $_SESSION['nome_acao'] ?? '';
    $descricao_acao = $_SESSION['descricao_acao'] ?? '';
    $dataInicio_acao = $_SESSION['dataInicio_acao'] ?? '';
    $dataFim_acao = $_SESSION['dataFim_acao'] ?? '';
    $localFisico_acao = $_SESSION['localFisico_acao'] ?? '';
    $descricao_peca = $_SESSION['descricao_peca'] ?? '';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['salvar_acao'])) {
        
        $_SESSION['nome_acao'] = $_POST['nome_acao'];
        $_SESSION['descricao_acao'] = $_POST['descricao_acao'];
        $_SESSION['dataInicio_acao'] = $_POST['dataInicio_acao'];
        $_SESSION['dataFim_acao'] = $_POST['dataFim_acao'];
        $_SESSION['localFisico_acao'] = $_POST['localFisico_acao'];
        $_SESSION['descricao_peca'] = $_POST['descricao_peca'];

        
          $_SESSION['nome_doador'] = ":nome_doador"; 
          $_SESSION['contatoEmail_doador'] = ":contatoEmail_doador";
          $_SESSION['estado_doador'] = ":estado_doador"; 
          $_SESSION['cidade_doador'] = ":cidade_doador";
        
        $participacao->id_doador = $_SESSION['id_doador']; 
        $participacao->id_acao = $_POST['id_acao'];
        $participacao->descricao_peca = $_POST['descricao_peca'];
        $participacao->salvar();
        session_start();
        $_SESSION['nome_acao'] = $nome_acao;  
        $_SESSION['descricao_peca'] = $descricao_peca;

        echo "Agradecemos a doação!";
        header('Location: ../Doador/Listar.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Armário Solidário</title>
  <link rel="icon" href="../Images/logo.png" type="image/png" />
  <link rel="stylesheet" href="../Acoes/styleAlter.css">

  <script>
          let abaDados;

      function abrirAba()
      {
        abaDados = window.open('EscolherPeça.php', '_blank');
      }

      function receberSelecao(valor)
      {
        document.getElementById("descricao_peca").value = valor;
      }
      window.receberSelecao = receberSelecao;
    </script>

</head>
<body>
      <?php
if (isset($_GET['descricao_peca'])) {
    $_SESSION['descricao_peca'] = $_GET['descricao_peca'];
    $descricao_peca = $_GET['descricao_peca'];
}
?>
    <div class="topnav">
        <img src="..\Images\logo.png" alt="Logo" class="logo">
        <a href="..\HomeDoa.php">Home</a>
        <a href="..\Acoes\Cadastro.php">Adicionar Ação</a>
        <a href="..\Doador\Listar.php">Doadores</a>
        <a href="..\Instituicao\Listar.php">Instituições</a>
        <a href="..\Acoes\Listar.php">Ações Criadas</a>
        <a href="..\Instituicao\Perfil.php">Perfil</a>
    </div>

  <form method="post">
  <div class="titulo">
    <h1>Participar de uma Ação</h1>
    <img src="..\Images/logo.png" alt="" class="logo"> 
  </div>

  <div class="top-section">
    <div class="foto-acao">Foto da Ação</div>
    <div class="dados-acao">
      <div>
        <label>Nome da Ação</label>
        <input type="text" name="nome_acao"  value="<?= htmlspecialchars($dados['nome_acao'] ?? '') ?>" readonly />
      </div>
      <div class="form-group">
        <label>Descrição da Ação</label>
        <textarea name="descricao_acao" required><?= htmlspecialchars($dados['descricao_acao'] ?? '') ?></textarea>
    </div>
    </div>
  </div>

  <div class="form-grid">
    <div class="form-half">
      <label>Data de Início</label>
      <input type="date" name="dataInicio_acao" value="<?= htmlspecialchars($dados['dataInicio_acao'] ?? '') ?>" required />
    </div>
    <div class="form-half">
      <label>Data de Término</label>
      <input type="date" name="dataFim_acao" value="<?= htmlspecialchars($dados['dataFim_acao'] ?? '') ?>" required />
    </div>
    <div class="form-group">
      <label>Local físico de coleta (opcional)</label>
      <input type="text" name="localFisico_acao" value="<?= htmlspecialchars($dados['localFisico_acao'] ?? '') ?>" />
    </div>
    <div class="form-group">
      <label>Peça a ser doada</label>
      <input type="text" name="descricao_peca" id="descricao_peca" value="<?= htmlspecialchars($descricao_peca) ?>" required readonly>
      <button type="button" onclick="abrirAba()">Selecionar Peça</button>
    </div>
  </div>
  <button type="submit" name="salvar_acao">Salvar Ação</button>

  </form>

</body>
</html>
