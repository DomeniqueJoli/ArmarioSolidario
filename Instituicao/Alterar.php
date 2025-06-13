<?php
session_start();

require_once('../config/Database.php');
require_once('../Instituicao/Instituicao.php');

$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);

$instituicao->id_instituicao = $_SESSION['id_instituicao'] ?? null;

if (!$instituicao->id_instituicao) {
    die('Erro: ID da instituição não foi informado na sessão.');
}

$dados = $instituicao->buscarPorId();
if (!$dados) {
    die('Erro: Instituição não encontrada.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $instituicao->id_instituicao = $_POST['id_instituicao'] ?? null;
    $instituicao->cnpj_instituicao = $_POST['cnpj_instituicao'] ?? '';
    $instituicao->nomeFantasia_instituicao = $_POST['nomeFantasia_instituicao'] ?? '';
    $instituicao->razaoSocial_instituicao = $_POST['razaoSocial_instituicao'] ?? '';
    $instituicao->missao_instituicao = $_POST['missao_instituicao'] ?? '';
    $instituicao->tipoInstituicao = $_POST['tipoInstituicao'] ?? '';
    $instituicao->areaAtuacao_instituicao = $_POST['areaAtuacao_instituicao'] ?? '';
    $instituicao->estado_instituicao = $_POST['estado_instituicao'] ?? '';
    $instituicao->cidade_instituicao = $_POST['cidade_instituicao'] ?? '';
    $instituicao->cep_instituicao = $_POST['cep_instituicao'] ?? '';
    $instituicao->bairro_instituicao = $_POST['bairro_instituicao'] ?? '';
    $instituicao->rua_instituicao = $_POST['rua_instituicao'] ?? '';
    $instituicao->numeroLocal_instituicao = $_POST['numeroLocal_instituicao'] ?? '';
    $instituicao->contatoTelefone_instituicao = $_POST['contatoTelefone_instituicao'] ?? '';
    $instituicao->contatoEmail_instituicao = $_POST['contatoEmail_instituicao'] ?? '';
    
    if ($instituicao->alterarInstituicao()) {
        header("Location: Listar.php");
        exit;
    } else {
        echo "<p style='color:red;'>Erro ao alterar a instituição. Tente novamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Alterar Instituição</title>
  <link rel="icon" href="../Images/logo.png" type="image/png" />
  <link rel="stylesheet" href="styleAlt.css">
</head>
<body>

<form method="post" action="">

    <div class="titulo">
        <h1>Alterar Instituição</h1>
        <img src="..\Images/logo.png" alt="" class="logo"> 
    </div>

    <div class="top-section">
        <div class="foto-instituicao">Foto Instituição</div>

        <div class="dados-basicos">
            <div>
                <input type="hidden" name="id_instituicao" value="<?= htmlspecialchars($dados['id_instituicao'] ?? '') ?>">
                <label>Nome Fantasia:</label>
                <input type="text" name="nomeFantasia_instituicao" value="<?= htmlspecialchars($dados['nomeFantasia_instituicao'] ?? '') ?>" required><br>
            </div>
            <div>
            <label>CNPJ:</label>
                <input type="text" name="cnpj_instituicao" value="<?= htmlspecialchars($dados['cnpj_instituicao'] ?? '') ?>" required><br>
            </div>
            <div>
                <label>Razão Social:</label>
                <input type="text" name="razaoSocial_instituicao" value="<?= htmlspecialchars($dados['razaoSocial_instituicao'] ?? '') ?>" required><br>
            </div>
        </div>
        </div>

        <div class="form-group">
            <label>Missão / Objetivo</label>
            <textarea name="missao_instituicao" required><?= htmlspecialchars($dados['missao_instituicao'] ?? '') ?></textarea>
        </div>


        <div class="form-grid">
        <div class="form-half">
            <label>Tipo de Instituição:</label>
            <input type="text" name="tipoInstituicao" value="<?= htmlspecialchars($dados['tipoInstituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-half">
            <label>Area de Atuação:</label>
            <input type="text" name="areaAtuacao_instituicao" value="<?= htmlspecialchars($dados['areaAtuacao_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
            <label>Estado</label>
            <input type="text" name="estado_instituicao" value="<?= htmlspecialchars($dados['estado_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
            <label>Cidade</label>
            <input type="text" name="cidade_instituicao" value="<?= htmlspecialchars($dados['cidade_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
            <label>CEP</label>
            <input type="text" name="cep_instituicao" value="<?= htmlspecialchars($dados['cep_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
            <label>Bairro</label>
            <input type="text" name="bairro_instituicao" value="<?= htmlspecialchars($dados['bairro_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
            <label>Rua</label>
            <input type="text" name="rua_instituicao" value="<?= htmlspecialchars($dados['rua_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
            <label>Número</label>
            <input type="number" name="numeroLocal_instituicao" value="<?= htmlspecialchars($dados['numeroLocal_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
            <label>Telefone</label>
            <input type="text" name="contatoTelefone_instituicao" value="<?= htmlspecialchars($dados['contatoTelefone_instituicao'] ?? '') ?>" required><br>
        </div>

        <div class="form-third">
        <label>Email</label>
        <input type="email" name="contatoEmail_instituicao" value="<?= htmlspecialchars($dados['contatoEmail_instituicao'] ?? '') ?>" required><br>

        </div>

        <div class="form-third">
            <label>Site / Rede social</label>
            <input type="text" name="tipoInstituicao" value="<?= htmlspecialchars($dados['tipoInstituicao'] ?? '') ?>" required><br>
        </div>
</div> 

        <button type="submit">Alterar</button>
    </form>
</body>
</html>
