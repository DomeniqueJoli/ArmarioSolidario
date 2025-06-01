<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Peça</title>
    <link rel="stylesheet" href="styleCadPeca.css">
    <link rel="icon" href="../Images/logo.png" type="image/png">

    <div class="topnav">
        <img src="..\Images\logo.png" alt="Logo" class="logo">
        <a href="#">Home</a>
        <a href="#">Adicionar Peça</a>
        <a href="#">Instituições Parceiras</a>
        <a href="#">Suas Peças</a>
        <a href="#">Perfil</a>
    </div>

</head>
<body>


    <form>
      <div class="form-container">
      <div class="foto-e-descricao">
      <div class="foto-peca">Foto da peça</div>
      <div>
      <label class="descricaoL">Descrição</label><br><input type="text" class="descricao"></div>
    </div>
    </div>

    <div class="form-row">
      <div>
        <label class="tipoL">Tipo da vestimenta<br></label>
        <input type="text" id="tipo" name="tipo" class="tipo">
      </div>
      <div>
        <label class="estadoL">Estado da peça<br></label>
        <input type="text" id="estado" name="estado" class="estado">
      </div>
      <div>
        <label class="tamanhoL">Tamanho<br></label>
        <input type="text" id="tamanho" name="tamanho" class="tamanho">
      </div>
    </div> 
    </form> 

    <form>
        <div class="form-row2">
      <div>
        <label class="dataL">Data de compra<br></label>
        <input type="date" id="data" name="data" class="data">
      </div>
      <div>
        <label class="generoL">Gênero<br></label>
        <input type="select" id="genero" name="genero" class="genero">
        </div>
      <div>
        <label class="etariaL">Faixa etária<br></label>
        <input type="text" id="faixa" name="faixa" class="etaria">
      </div>
      <div>
        <label class="tempoL">Tempo de uso<br></label>
        <input type="text" id="tempo" name="tempo" class="tempo">
      </div>
    </div>
    </form> 

    <button type="submit">Cadastrar Peça</button>
  
    
    
</body>
</html>