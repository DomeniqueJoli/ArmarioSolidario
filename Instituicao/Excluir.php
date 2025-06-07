<?php
require_once '../config/Database.php';
require_once 'Instituicao.php';
$db = (new Database())->getConnection();
$instituicao = new Instituicao($db);
$instituicao->id_instituicao = $_GET['id_instituicao'];
if ($instituicao->excluir()) {
header("Location: Perfil.php");
}   