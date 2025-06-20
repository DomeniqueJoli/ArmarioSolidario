<?php
require_once('../Config/Database.php');
require_once('../Doador/Doador.php');

session_start();

$db = (new Database())->getConnection();
$doador = new Doador($db);
$doador->id_doador = $_SESSION['id_doador'] ?? null;

if (!$doador->id_doador) 
{
    die('Erro: ID do doador não foi informado na sessão.');
}

$dados = $doador->buscarPorId();
if (!$dados) 
{
    die('Erro: Doador não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  $doador->nome_doador = $_POST['nome_doador'];
  $doador->cpf_doador = $_POST['cpf_doador']; 
  $doador->descricao_doador = $_POST['descricao_doador'];
  $doador->dataNasc_doador = $_POST['dataNasc_doador'];
  $doador->contatoEmail_doador = $_POST['contatoEmail_doador'];
  $doador->contatoTelefone_doador = $_POST['contatoTelefone_doador'];
  $doador->site_doador = $_POST['site_doador'];
  $doador->cep_doador = $_POST['cep_doador'];
  $doador->estado_doador = $_POST['estado_doador'];
  $doador->cidade_doador = $_POST['cidade_doador'];
  $doador->bairro_doador = $_POST['bairro_doador'];
  $doador->rua_doador = $_POST['rua_doador'];
  $doador->numLocal_doador = $_POST['numLocal_doador'];
  $doador->senhaDoador = $_POST['senhaDoador'];
  $doador->confirmarSenhaDoador = $_POST['confirmarSenhaDoador'];
 if ($doador->alterarDoador()) 
    {
      session_start();
      header("Location: ../Doador/Perfil.php");
      exit;
    } else 
    {
        echo "<p style='color:red;'>Erro ao alterar o doador. Tente novamente.</p>";
    }
}    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Armário Solidário</title>
  <link rel="icon" href="Images/logo.png" type="image/png">
  <link rel="stylesheet" href="st.css">

</head>
<body>


  <form method="post">
    <div class="titulo">
      <h1>Cadastro de Doadores</h1>
      <img src="..\Images\logo.png" alt="" class="logo"> 
    </div>


    <div class="top-section">
      <div class="foto-instituicao">Foto do Doador</div>
      <div class="dados-basicos">
        <div>
            <input type="hidden" name="id_doador" value="<?= htmlspecialchars($dados['id_doador'] ?? '') ?>">
            <label>Nome completo</label>
            <input type="text" name="nome_doador" value="<?= htmlspecialchars($dados['nome_doador'] ?? '') ?>" required/>
        </div>
        <div>
          <label>CPF</label>
          <input type="text" name="cpf_doador" value="<?= htmlspecialchars($dados['cpf_doador'] ?? '') ?>" required/>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Biografia</label>
      <textarea name="descricao_doador" required><?= htmlspecialchars($dados['descricao_doador'] ?? '') ?></textarea>
    </div>

    <div class="form-grid">
      <div class="form-half">
        <label>Data de nascimento</label>
        <input type="date" name="dataNasc_doador" value="<?= htmlspecialchars($dados['dataNasc_doador'] ?? '') ?>" required/>
      </div>

       <div class="form-third">
        <label>CEP</label>
        <input type="text" name="cep_doador" value="<?= htmlspecialchars($dados['cep_doador'] ?? '') ?>" required/>
      </div>
      <div class="form-third">
        <label>Estado</label>
        <input type="text" name="estado_doador" value="<?= htmlspecialchars($dados['estado_doador'] ?? '') ?>" required/>
      </div>
      <div class="form-third">
        <label>Cidade</label>
        <input type="text" name="cidade_doador" value="<?= htmlspecialchars($dados['cidade_doador'] ?? '') ?>" required/>
      </div>

      <div class="form-third">
        <label>Bairro</label>
        <input type="text" name="bairro_doador" value="<?= htmlspecialchars($dados['bairro_doador'] ?? '') ?>" required/>
      </div>
      <div class="form-third">
        <label>Rua</label>
        <input type="text" name="rua_doador" value="<?= htmlspecialchars($dados['rua_doador'] ?? '') ?>" required/>
      </div>
      <div class="form-third">
        <label>Número</label>
        <input type="number" name="numLocal_doador" value="<?= htmlspecialchars($dados['numLocal_doador'] ?? '') ?>" required/>
      </div>

      <div class="form-third">
        <label>Telefone</label>
        <input type="text" name="contatoTelefone_doador" value="<?= htmlspecialchars($dados['contatoTelefone_doador'] ?? '') ?>" required/>
      </div>
      <div class="form-third">
        <label>Email</label>
        <input type="email" name="contatoEmail_doador" value="<?= htmlspecialchars($dados['contatoEmail_doador'] ?? '') ?>" required/>
      </div>
      <div class="form-third">
        <label>Site / Rede social</label>
        <input type="text" name="site_doador" value="<?= htmlspecialchars($dados['site_doador'] ?? '') ?>" required/>
      </div>

      <div class="form-half">
        <label>Senha</label>
        <input type="password" name="senhaDoador" value="<?= htmlspecialchars($dados['senhaDoador'] ?? '') ?>" required/>
      </div>
      <div class="form-half">
        <label>Confirme sua senha</label>
        <input type="password" name="confirmarSenhaDoador" value="<?= htmlspecialchars($dados['confirmarSenhaDoador'] ?? '') ?>" required/>
      </div>
    </div>

    <button type="submit" >Salvar Cadastro</button>
  </form>

</body>
</html>