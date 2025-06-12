<?php
require_once('../config/Database.php');
require_once('../Instituicao/Instituicao.php');

$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);

$instituicao->id_instituicao = $_GET['id_instituicao'] ?? null;
if (!$instituicao->id_instituicao) {
    die('Erro: ID da ação não foi informado.');
}

$dados = $instituicao->buscarPorId();
if (!$dados) {
    die('Erro: Instituicao não encontrada.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado->cnpj_instituicao = $_POST['cnpj_instituicao'] ?? '';
    $resultado->nomeFantasia_instituicao = $_POST['nomeFantasia_instituicao'] ?? '';
    $resultado->razaoSocial_instituicao = $_POST['razaoSocial_instituicao'] ?? '';
    $resultado->missao_instituicao = $_POST['missao_instituicao'] ?? '';
    $resultado->tipoInstituicao = $_POST['tipoInstituicao'] ?? '';
    $resultado->areaAtuacao_instituicao = $_POST['areaAtuacao_instituicao'] ?? '';
    $resultado->contatoEmail_instituicao = $_POST['contatoEmail_instituicao'] ?? '';
    $resultado->contatoTelefone_instituicao = $_POST['contatoTelefone_instituicao'] ?? '';
    $resultado->contatoRedeSocial_instituicao = $_POST['contatoRedeSocial_instituicao'] ?? '';
    $resultado->estado_instituicao = $_POST['estado_instituicao'] ?? '';
    $resultado->cidade_instituicao = $_POST['cidade_instituicao'] ?? '';
    $resultado->cep_instituicao = $_POST['cep_instituicao'] ?? '';
    $resultado->bairro_instituicao = $_POST['bairro_instituicao'] ?? '';
    $resultado->rua_instituicao = $_POST['rua_instituicao'] ?? '';
    $resultado->numeroLocal_instituicao = $_POST['numeroLocal_instituicao'] ?? '';
    $resultado->senhaInstituicao = $_POST['senhaInstituicao'] ?? '';
    $resultado->confirmarSenhaInstituicao = $_POST['confirmarSenhaInstituicao'] ?? '';

    if ($acao->alterarInstituicao()) {
        header("Location: Listar.php");
        exit;
    } else {
        echo "<p style='color:red;'>Erro ao alterar a instituicao. Tente novamente.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro Instituição</title>
  <link rel="icon" href="../Images/logo.png" type="image/png" />
  <link rel="stylesheet" href="styleAlter.css">

</head>
<body>

<div class="titulo">
    <h1>Editar informações da Instituição</h1>
    <img src="..\Images/logo.png" alt="" class="logo"> 
</div>

  <form>
    <div class="top-section">
      <div class="foto-instituicao">Foto Instituição</div>
      <div class="dados-basicos">
        <div>
          <label>Nome Fantasia</label>
          <input type="text" name="nomeInst" required />
        </div>
        <div>
          <label>CNPJ</label>
          <input type="text" name="cnpjInst" required />
        </div>
        <div>
          <label>Razão Social</label>
          <input type="text" name="razaoSocialInst" required />
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Missão / Objetivo</label>
      <textarea name="bioInst" required></textarea>
    </div>

    <div class="form-grid">
      <div class="form-half">
        <label>Tipo de Instituição</label>
        <input type="text" name="tipoInst" required />
      </div>
      <div class="form-half">
        <label>Área de Atuação</label>
        <input type="text" name="areaInst" required />
      </div>

      <div class="form-third">
        <label>Estado</label>
        <input type="text" name="estadoInst" required />
      </div>
      <div class="form-third">
        <label>Cidade</label>
        <input type="text" name="cidadeInst" required />
      </div>
      <div class="form-third">
        <label>CEP</label>
        <input type="text" name="cepInst" required />
      </div>

      <div class="form-third">
        <label>Bairro</label>
        <input type="text" name="bairroInst" required />
      </div>
      <div class="form-third">
        <label>Rua</label>
        <input type="text" name="ruaInst" required />
      </div>
      <div class="form-third">
        <label>Número</label>
        <input type="number" name="numlocalInst" required />
      </div>

      <div class="form-third">
        <label>Telefone</label>
        <input type="text" name="contatoInst" required />
      </div>
      <div class="form-third">
        <label>Email</label>
        <input type="email" name="emailInst" required />
      </div>
      <div class="form-third">
        <label>Site / Rede social</label>
        <input type="text" name="siteInst" />
      </div>

      <div class="form-half">
        <label>Senha</label>
        <input type="password" name="senhaInst" required />
      </div>
      <div class="form-half">
        <label>Confirme sua senha</label>
        <input type="password" name="senhaInstConfirmar" required />
      </div>
    </div>

    <button type="submit">Alterar Cadastro</button>
  </form>

</body>
</html>
