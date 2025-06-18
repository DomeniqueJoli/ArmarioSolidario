<?php
require_once('../Config/Database.php');
require_once('../Peça/Peca.php');


?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Armário Solidário</title>
  <link rel="icon" href="../Images/logo.png" type="image/png" />
  <link rel="stylesheet" href="../Acoes/styleAlter.css">
</head>
<body>

    <div class="topnav">
        <img src="..\Images\logo.png" alt="Logo" class="logo">
        <a href="..\HomeDoa.php">Home</a>
        <a href="..\Acoes\Cadastro.php">Adicionar Ação</a>
        <a href="..\Doador\Listar.php">Doadores</a>
        <a href="..\Instituicao\Listar.php">Instituições</a>
        <a href="..\Acoes\Listar.php">Ações Criadas</a>
        <a href="..\Instituicao\Perfil.php">Perfil</a>
    </div>

    <form method="post" action="">
  <div class="titulo">
    <h1>Participar de uma Ação</h1>
    <img src="..\Images/logo.png" alt="" class="logo"> 
  </div>

  <div class="top-section">
    <div class="foto-acao">Foto da Ação</div>
    <div class="dados-acao">
      <div>
        <label>Nome da Ação</label>
        <input type="text" name="nome_acao" required />
      </div>
      <div class="form-group">
        <label>Descrição da Ação</label>
        <textarea name="descricao_acao" required></textarea>
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
      <label>Local físico de coleta (opcional)</label>
      <input type="text" name="localFisico_acao" />
    </div>
    <div>
      <label>Peça à ser doada</label>
      <input type="text" name="descricao_peca" readonly>
       <script>
        let abaDados;

        function abrirAba() {
          abaDados = window.open('EscolherPeça.php');
        }

        // Essa função pode ser chamada pela outra página
        function receberSelecao(valor) {
          alert("Você selecionou: " + $valor);
          // Aqui você poderia atualizar algum campo na tela
        }

        // Disponibiliza a função para a aba filha (dados.html)
        window.receberSelecao = receberSelecao;
      </script>
        <button onclick="abrirAba()">Selecionar Peça</button>

    </div>
  </div>

  <button type="submit">Salvar Ação</button>
</form>


</body>
</html>
