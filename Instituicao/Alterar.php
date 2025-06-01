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
