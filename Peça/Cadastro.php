<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Peça</title>
  <link rel="stylesheet" href="st.css" />
  <link rel="icon" href="../Images/logo.png" type="image/png" />
</head>
<body>

  <div class="topnav">
    <img src="../Images/logo.png" alt="Logo" class="logo" />
    <a href="#">Home</a>
    <a href="#">Adicionar Peça</a>
    <a href="#">Instituições Parceiras</a>
    <a href="#">Peças Criadas</a>
    <a href="#">Perfil</a>
  </div>


  <form>
  <div class="titulo">
    <h1>Cadastro de Peça</h1>
    <img src="../Images/logo.png" alt="Logo" />
  </div>

    <div class="foto-e-descricao">
      <div class="foto-peca">Foto da peça</div>
      <div>
        <label for="descricao">Descrição</label>
        <!-- <input type="text" id="descricao" name="descricao" /> -->
         <textarea name="descricao" id="descricao"></textarea>
      </div>
    </div>

    <div class="form-row">
      <div>
        <label for="tipo">Tipo da vestimenta</label>
        <input type="text" id="tipo" name="tipo" />
      </div>
      <div>
        <label for="estado">Estado da peça</label>
        <input type="text" id="estado" name="estado" />
      </div>
      <div>
        <label for="tamanho">Tamanho</label>
        <input type="text" id="tamanho" name="tamanho" />
      </div>
    </div>

    <div class="form-row2">
      <div>
        <label for="data">Data de compra</label>
        <input type="date" id="data" name="data" />
      </div>
      <div>
        <label for="genero">Gênero</label>
        <input type="text" id="genero" name="genero" />
      </div>
      <div>
        <label for="faixa">Faixa etária</label>
        <input type="text" id="faixa" name="faixa" />
      </div>
      <div>
        <label for="tempo">Tempo de uso</label>
        <input type="text" id="tempo" name="tempo" />
      </div>
    </div>

    <button type="submit">Cadastrar Peça</button>
  </form>

</body>
</html>
