<?php

class Peca
{
private $conn;
private $table = "peca";
public $id_peca; 
public $descricao_peca;  
public $tipo_vestimenta; 
public $tempoUso_peca; 
public $tamanho_peca;  
public $estado_peca; 
public $dataCompra_peca; 
public $genero_peca;  
public $faixaEtaria_peca;

public function __construct($db) 
{
    $this->conn = $db;
}

public function criarPeca()
{
    
}

}

?>