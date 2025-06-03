
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

  <form>
    <div class="titulo">
      <h1>Cadastro de Ação</h1>
      <img src="..\Images/logo.png" alt="" class="logo"> 
    </div>

    <div class="top-section">
      <div class="foto-acao">Foto da Ação</div>
      <div class="dados-acao">
        <div>
          <label>Nome da Ação</label>
          <input type="text" name="nomeAcao" required />
        </div>
        <div>
          <label>Público-Alvo</label>
          <input type="text" name="publicoAlvo" required />
        </div>
        <div>
          <label>Quantidade de Beneficiados</label>
          <input type="number" name="quantBeneficiados" required />
        </div>
      </div>
    </div>

    <div class="form-grid">
      <div class="form-half">
        <label>Data de Início</label>
        <input type="date" name="dataInicio" required />
      </div>
      <div class="form-half">
        <label>Data de Término</label>
        <input type="date" name="dataFim" required />
      </div>

      <div class="form-group">
        <label>Meta da Ação</label>
        <textarea name="metaAcao" required></textarea>
      </div>

      <div class="form-group">
        <label>Local físico de coleta (opcional)</label>
        <input type="text" name="localColeta" />
      </div>
    </div>

    <button type="submit">Salvar Ação</button>
  </form>

</body>
</html>
