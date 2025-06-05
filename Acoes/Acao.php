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

    public function editar() {
        $query = "UPDATE " . $this->table . "
        SET nome = :nome, 
        contato = :contato,
        email = :email, 
        idade = :idade 
        WHERE id = :id";
        
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':nome', $this->nome);
        $resultado->bindParam(':contato', $this->contato);
        $resultado->bindParam(':email', $this->email);
        $resultado->bindParam(':idade', $this->idade);
        $resultado->bindParam(':id', $this->id);
        return $resultado->execute();
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
