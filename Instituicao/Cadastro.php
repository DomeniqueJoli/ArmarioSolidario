<?php
require_once('../Config/Database.php');
require_once('Instituicao.php');

if ($_POST) {
  $db = (new Database())->getConnection();
  $instituicao = new Instituicao($db);
  $instituicao->cnpj_instituicao = $_POST['cnpj_instituicao'];
  $instituicao->nomeFantasia_instituicao = $_POST['nomeFantasia_instituicao']; 
  $instituicao->razaoSocial_instituicao = $_POST['razaoSocial_instituicao'];
  $instituicao->missao_instituicao = $_POST['missao_instituicao'];
  $instituicao->areaAtuacao_instituicao = $_POST['areaAtuacao_instituicao'];
  $instituicao->tipoInstituicao = $_POST['tipoInstituicao'];
  $instituicao->contatoRedeSocial_instituicao = $_POST['contatoRedeSocial_instituicao'];
  $instituicao->senhaInstituicao = $_POST['senhaInstituicao'];
  $instituicao->confirmarSenhaInstituicao = $_POST['confirmarSenhaInstituicao'];
  $instituicao->estado_instituicao = $_POST['estado_instituicao'];
  $instituicao->cidade_instituicao = $_POST['cidade_instituicao'];
  $instituicao->cep_instituicao = $_POST['cep_instituicao'];
  $instituicao->bairro_instituicao = $_POST['bairro_instituicao'];
  $instituicao->rua_instituicao = $_POST['rua_instituicao'];
  $instituicao->numeroLocal_instituicao = $_POST['numeroLocal_instituicao'];
  $instituicao->contatoTelefone_instituicao = $_POST['contatoTelefone_instituicao'];
  $instituicao->contatoEmail_instituicao = $_POST['contatoEmail_instituicao'];


    if ($instituicao->criarInstituicao()) 
    {
    header("Location: ../LoginInst/Login.php");
    exit;
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
  <link rel="stylesheet" href="styleCds.css">

</head>
<body>
  <form method="post" action="">

  <div class="titulo">
    <h1>Cadastro de Instituição</h1>
    <img src="../Images/logo.png" alt="" class="logo"> 
  </div>

    <div class="top-section">
      <div class="foto-instituicao">Foto Instituição</div>
      <div class="dados-basicos">
        <div>
          <label>Nome Fantasia</label>
          <input type="text" name="nomeFantasia_instituicao" required />
        </div>
        <div>
          <label>CNPJ</label>
          <input type="text" name="cnpj_instituicao" required />
        </div>
        <div>
          <label>Razão Social</label>
          <input type="text" name="razaoSocial_instituicao" required />
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Missão / Objetivo</label>
      <textarea name="missao_instituicao" required></textarea>
    </div>

    <div class="form-grid">
      <div class="form-half">
        <label>Tipo de Instituição</label>
        <input type="text" name="tipoInstituicao" required />
      </div>
      <div class="form-half">
        <label>Área de Atuação</label>
        <input type="text" name="areaAtuacao_instituicao" required />
      </div>

        <div class="form-third">
      <label>Estado</label>
      <input type="text" name="estado_instituicao" required />
    </div>
    <div class="form-third">
      <label>Cidade</label>
      <input type="text" name="cidade_instituicao" required />
    </div>
    <div class="form-third">
      <label>CEP</label>
      <input type="text" name="cep_instituicao" required />
    </div>

    <div class="form-third">
      <label>Bairro</label>
      <input type="text" name="bairro_instituicao" required />
    </div>
    <div class="form-third">
      <label>Rua</label>
      <input type="text" name="rua_instituicao" required />
    </div>
    <div class="form-third">
      <label>Número</label>
      <input type="number" name="numeroLocal_instituicao" required />
    </div>

    <div class="form-third">
      <label>Telefone</label>
      <input type="text" name="contatoTelefone_instituicao" required />
    </div>
    <div class="form-third">
      <label>Email</label>
      <input type="email" name="contatoEmail_instituicao" required />
    </div>

      <div class="form-third">
        <label>Site / Rede social</label>
        <input type="text" name="contatoRedeSocial_instituicao" />
      </div>

      <div class="form-half">
        <label>Senha</label>
        <input type="password" name="senhaInstituicao" required />
      </div>
      <div class="form-half">
        <label>Confirme sua senha</label>
        <input type="password" name="confirmarSenhaInstituicao" required />
      </div>
    </div>

    <button type="submit">Salvar Cadastro</button>
  </form>

</body>
</html>
