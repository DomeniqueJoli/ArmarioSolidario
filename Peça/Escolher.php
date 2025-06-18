<?php
require_once ('../Config/Database.php');
require_once('Peca.php');

$db = (new Database()) ->getConnection();
$peca = new Peca($db);
$peca->id_peca = $_GET['id_peca'];
// $dados = $peca->buscarPorId();

if ($_POST) {
    $peca->descricao_peca = $_POST['descricao_peca'];
    if ($peca->escolherPeca()) {
        echo "<h3>Peça Escolhida!</h3>";
        header("Location: ../Doador/indexParticipação.php");
        exit;
    }
}

?>