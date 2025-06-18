<?php
class Acao
{
    private $conn;
    private $table = "acao";

    public $id_acao; 
    public $descricao_acao;  
    public $nome_acao; 
    public $publicoAlvo_acao; 
    public $dataInicio_acao;  
    public $dataFim_acao; 
    public $qntdBeneficiarios; 
    public $meta_acao;  
    public $localFisico_acao;

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function criarAcao()
    {
        $query = "INSERT INTO {$this->table}
            (descricao_acao, nome_acao, publicoAlvo_acao, dataInicio_acao, dataFim_acao, 
             qntdBeneficiarios, meta_acao, localFisico_acao)
            VALUES 
            (:descricao_acao, :nome_acao, :publicoAlvo_acao, :dataInicio_acao, :dataFim_acao, 
             :qntdBeneficiarios, :meta_acao, :localFisico_acao)";
        
        $resultado = $this->conn->prepare($query);  
        $resultado->bindParam(':descricao_acao', $this->descricao_acao);
        $resultado->bindParam(':nome_acao', $this->nome_acao);
        $resultado->bindParam(':publicoAlvo_acao', $this->publicoAlvo_acao);
        $resultado->bindParam(':dataInicio_acao', $this->dataInicio_acao);
        $resultado->bindParam(':dataFim_acao', $this->dataFim_acao);
        $resultado->bindParam(':qntdBeneficiarios', $this->qntdBeneficiarios);
        $resultado->bindParam(':meta_acao', $this->meta_acao);
        $resultado->bindParam(':localFisico_acao', $this->localFisico_acao);
        
        return $resultado->execute();
    }

    public function listarAcao()
    {
        $query = "SELECT * FROM {$this->table}";
        $resultado = $this->conn->prepare($query);
        $resultado->execute();
        return $resultado;
    }

    public function buscarPorId() 
    {
        $query = "SELECT * FROM {$this->table} WHERE id_acao = :id_acao LIMIT 1";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id_acao', $this->id_acao);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorIdParticipacao() 
    {
        $query = "SELECT * FROM {$this->table} 
        WHERE id_acao = :id_acao 
            AND nome_acao = :nome_acao    
            AND descricao_acao = :descricao_acao 
            AND dataInicio_acao = :dataInicio_acao
            AND dataFim_acao = :dataFim_acao
            AND localFisico_acao = :localFisico_acao 
            LIMIT 1";
              
    $resultado = $this->conn->prepare($query);
    $resultado->bindParam(':id_acao', $this->id_acao);
    $resultado->bindParam(':nome_acao', $this->nome_acao);
    $resultado->bindParam(':descricao_acao', $this->descricao_acao);
    $resultado->bindParam(':dataInicio_acao', $this->dataInicio_acao);
    $resultado->bindParam(':dataFim_acao', $this->dataFim_acao);
    $resultado->bindParam(':localFisico_acao', $this->localFisico_acao);
    
    $resultado->execute();
    return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function alterarAcao() {
        $query = "UPDATE {$this->table} SET 
            nome_acao = :nome_acao, 
            descricao_acao = :descricao_acao,
            publicoAlvo_acao = :publicoAlvo_acao,
            dataInicio_acao = :dataInicio_acao,
            dataFim_acao = :dataFim_acao,
            qntdBeneficiarios = :qntdBeneficiarios,
            meta_acao = :meta_acao,
            localFisico_acao = :localFisico_acao
            WHERE id_acao = :id_acao";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':nome_acao', $this->nome_acao);
        $stmt->bindParam(':descricao_acao', $this->descricao_acao);
        $stmt->bindParam(':publicoAlvo_acao', $this->publicoAlvo_acao);
        $stmt->bindParam(':dataInicio_acao', $this->dataInicio_acao);
        $stmt->bindParam(':dataFim_acao', $this->dataFim_acao);
        $stmt->bindParam(':qntdBeneficiarios', $this->qntdBeneficiarios);
        $stmt->bindParam(':meta_acao', $this->meta_acao);
        $stmt->bindParam(':localFisico_acao', $this->localFisico_acao);
        $stmt->bindParam(':id_acao', $this->id_acao);
    
        return $stmt->execute();
    }
    

    public function deletarAcao() 
    {
        $query = "DELETE FROM {$this->table} WHERE id_acao = :id_acao";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id_acao', $this->id_acao);
        return $resultado->execute();
    }
}
?>
