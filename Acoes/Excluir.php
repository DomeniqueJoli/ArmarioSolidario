<?php
require_once '../config/Database.php';
require_once 'Acao.php';
$db = (new Database())->getConnection();
$acao = new Acao($db);
$acao->id_acao = $_GET['id_acao'];
if ($acao->deletarAcao()) {
header("Location: listar.php");
}   