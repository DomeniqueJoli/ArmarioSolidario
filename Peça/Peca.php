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
    $query = "INSERT INTO {$this->table}
    (id_peca, descricao_peca, tipo_vestimenta, tempoUso_peca, tamanho_peca, estado_peca,
    dataCompra_peca, genero_peca, faixaEtaria_peca) 
    VALUES (:id_peca, :descricao_peca, :tipo_vestimenta, :tempoUso_peca, :tamanho_peca, :estado_peca,
    :dataCompra_peca, :genero_peca, :faixaEtaria_peca)";

    $resultado = $this->conn->prepare($query);
    $resultado->bindParam('id_peca', $this->id_peca);
    $resultado->bindParam('descricao_peca' , $this->descricao_peca);
    $resultado->bindParam('tipo_vestimenta' , $this->tipo_vestimenta);
    $resultado->bindParam('tempoUso_peca' , $this->tempoUso_peca);
    $resultado->bindParam('tamanho_peca' , $this->tamanho_peca);
    $resultado->bindParam('estado_peca' , $this->estado_peca);
    $resultado->bindParam('dataCompra_peca' , $this->dataCompra_peca);
    $resultado->bindParam('genero_peca' , $this->genero_peca);
    $resultado->bindParam('faixaEtaria_peca' , $this->faixaEtaria_peca);

    return $resultado->execute();
}

public function listarPeca()
{
    $query = "SELECT * FROM " . "{$this->table}";
    $resultado = $this->conn->prepare($query);
    $resultado->execute();
    return $resultado;
}

public function buscarPorId() 
{
    $query = "SELECT * FROM {$this->table}   WHERE id_peca = :id_peca
    LIMIT 1";
    $resultado = $this->conn->prepare($query);
    $resultado->bindParam(':id_peca', $this->id_peca);
    $resultado->execute();
    return $resultado->fetch(PDO::FETCH_ASSOC);
}

public function deletarPeca() 
{
    $query = "DELETE FROM {$this->table} WHERE id_peca = :id_peca";
    $resultado = $this->conn->prepare($query);
    $resultado->bindParam(':id_peca', $this->id_peca);
    return $resultado->execute();
}

public function editarPeca() 
{
    $query = "UPDATE " . "{$this->table}  
    SET descricao_peca = :descricao_peca,
    tipo_vestimenta = :tipo_vestimenta,
    estado_peca = :estado_peca, 
    dataCompra_peca = :dataCompra_peca, 
    faixaEtaria_peca = :faixaEtaria_peca,
    tamanho_peca = :tamanho_peca,
    genero_peca = :genero_peca,
    tempoUso_peca = :tempoUso_peca
    WHERE id_peca = :id_peca
    ";
    $resultado = $this->conn->prepare($query);
    $resultado->bindParam(':descricao_peca', $this->descricao_peca);
    $resultado->bindParam(':tipo_vestimenta', $this->tipo_vestimenta);
    $resultado->bindParam(':estado_peca', $this->estado_peca);
    $resultado->bindParam(':dataCompra_peca', $this->dataCompra_peca);
    $resultado->bindParam(':faixaEtaria_peca', $this->faixaEtaria_peca);
    $resultado->bindParam(':tamanho_peca', $this->tamanho_peca);
    $resultado->bindParam(':genero_peca', $this->genero_peca);
    $resultado->bindParam(':tempoUso_peca', $this->tempoUso_peca);
    $resultado->bindParam(':id_peca', $this->id_peca);
    return $resultado->execute();
}

}
?>