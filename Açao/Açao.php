<?php

class Peca
{
private $conn;
private $table = "acao";
public $id_cao; 
public $descricao_acao;  
public $nome_acao; 
public $publicoAlvo_acao; 
public $dataInicio_acao;  
public $dataFim_acao; 
public $qntdBeneficiarios_acao; 
public $meta_acao;  
public $localFisico_acao;

public function __construct($db) 
{
    $this->conn = $db;
}

public function criarAcao()
{
        $query = "INSERT INTO " . " {$this->table}
        (descricao_acao, nome_acao, publicoAlvo_acao, dataInicio_acao, dataFim_acao, qntdBeneficiarios_acao, meta_acao, localFisico_acao,)
        VALUES (:descricao_acao, :nome_acao, :publicoAlvo_acao, :dataInicio_acao, :dataFim_acao, :qntdBeneficiarios_acao, :meta_acao, :localFisico_acao,)";


        $resultado = $this->conn->prepare($query);  
        $resultado->bindParam('descricao_acao', $this->descricao_acao);
        $resultado->bindParam('nome_acao', $this->nome_acao);
        $resultado->bindParam('publicoAlvo_acao', $this->publicoAlvo_acao);
        $resultado->bindParam('dataInicio_acao', $this->dataInicio_acao);
        $resultado->bindParam('dataFim_acao', $this->dataFim_acao);
        $resultado->bindParam('qntdBeneficiarios_acao', $this->qntdBeneficiarios_acao);
        $resultado->bindParam('meta_acao', $this->meta_acao);
        $resultado->bindParam('localFisico_acao', $this->localFisico_acao);
        
        return $resultado->execute();
}

?>