<?php
require_once ('../Config/Database.php');
require_once ('Peca.php');

$db = (new Database())->getConnection();
$peca = new Peca($db);
$peca->id_peca = $_GET['id_doador'];

if ($peca->deletarPeca()) 
{
    header("Location: Listar.php");
    exit;
}

?>