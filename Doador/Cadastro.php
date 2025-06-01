<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro Instituição</title>
  <link rel="icon" href="../Images/logo.png" type="image/png" />
  <link rel="stylesheet" href="st.css">

</head>
<body>

  <form>

    <div class="titulo">
      <h1>Cadastro de Doadores</h1>
      <img src="..\Images\logo.png" alt="" class="logo"> 
    </div>

    <div class="top-section">
      <div class="foto-instituicao">Foto do Doador</div>
      <div class="dados-basicos">
        <div>
          <label>Nome completo</label>
          <input type="text" name="nomeInst" required />
        </div>
        <div>
          <label>CPF</label>
          <input type="text" name="cnpjInst" required />
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Biografia</label>
      <textarea name="bioDoa" required></textarea>
    </div>

    <div class="form-grid">
      <div class="form-half">
        <label>Data de nascimento</label>
        <input type="date" name="DataNasc" required />
      </div>

       <div class="form-third">
        <label>CEP</label>
        <input type="text" name="cepDoa" required />
      </div>
      <div class="form-third">
        <label>Estado</label>
        <input type="text" name="estadoDoa" required />
      </div>
      <div class="form-third">
        <label>Cidade</label>
        <input type="text" name="cidadeDoa" required />
      </div>

      <div class="form-third">
        <label>Bairro</label>
        <input type="text" name="bairroDoa" required />
      </div>
      <div class="form-third">
        <label>Rua</label>
        <input type="text" name="ruaDoa" required />
      </div>
      <div class="form-third">
        <label>Número</label>
        <input type="number" name="numlocalDoa" required />
      </div>

      <div class="form-third">
        <label>Telefone</label>
        <input type="text" name="contatoDoa" required />
      </div>
      <div class="form-third">
        <label>Email</label>
        <input type="email" name="emailDoa" required />
      </div>
      <div class="form-third">
        <label>Site / Rede social</label>
        <input type="text" name="siteDoa" />
      </div>

      <div class="form-half">
        <label>Senha</label>
        <input type="password" name="senhaDoa" required />
      </div>
      <div class="form-half">
        <label>Confirme sua senha</label>
        <input type="password" name="senhaDoaConfirmar" required />
      </div>
    </div>

    <button type="submit" >Salvar Cadastro</button>
  </form>

</body>
</html>