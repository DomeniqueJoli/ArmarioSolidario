<?php
require_once('../Config/Database.php');
require_once('../Instituicao/Instituicao.php');

$mensagem = '';
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['contatoEmail_instituicao'] ?? '';
    $novaSenha = $_POST['nova_senha'] ?? '';
    $confirmarSenha = $_POST['confirmar_senha'] ?? '';

    $db = (new Database())->getConnection();
    $instituicao = new Instituicao($db);

    $instituicao->contatoEmail_instituicao = $email;
    $dados = $instituicao->buscarPorEmail();

    if (!$dados) {
        $mensagem = "E-mail não encontrado.";
    } elseif ($novaSenha !== $confirmarSenha) {
        $mensagem = "As senhas não coincidem.";
    } else {
        $instituicao->id_instituicao = $dados['id_instituicao'];
        $instituicao->senhaInstituicao = $novaSenha;

        if ($instituicao->atualizarSenha()) {
            $sucesso = true;
            $mensagem = "Senha atualizada com sucesso.";
        } else {
            $mensagem = "Erro ao atualizar a senha. Tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Armário Solidário</title>
  <link rel="icon" href="../Images/logo.png" type="image/png">
  <link rel="stylesheet" href="styleRecu.css" />
</head>
<body>
  <div class="container">
    <div class="lado-esquerdo">
      <form class="form" method="POST">
        <h2 class="tt">Redefinir Senha</h2>
        <?php if (!empty($mensagem)): ?>
          <p class="mensagem"><?= htmlspecialchars($mensagem) ?></p>
        <?php endif; ?>
        <input class="ent" type="email" name="contatoEmail_instituicao" placeholder="Digite seu e-mail" required />
        <input class="ent" type="password" name="nova_senha" placeholder="Nova senha" required />
        <input class="ent" type="password" name="confirmar_senha" placeholder="Confirme a nova senha" required />
        <button class="bt" type="submit">Salvar nova senha</button>
        <a href="../LoginInst/Login.php">Voltar para o login</a>
      </form>
    </div>

    <div class="lado-direito">
      <img class="logo" src="../Images/logo.png" alt="Logo" />
    </div>
  </div>
</body>
</html>
