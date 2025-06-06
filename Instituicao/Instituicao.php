<?php

class Instituicao
{
    private $conn;
    private $table = "instituicao";
    public $id_instituicao;
    public $usernameInstituicao;
    public $senhaInstituicao;
    public $confirmarSenhaInstituicao;
    public $cnpj_instituicao;
    public $nomeFantasia_instituicao;
    public $razaoSocial_instituicao;
    public $missao_instituicao;
    public $tipoInstituicao;
    public $areaAtuacao_instituicao;
    public $contatoEmail_instituicao;
    public $contatoRedeSocial_instituicao; 
    public $estado_instituicao;
    public $cidade_instituicao;
    public $cep_instituicao;
    public $bairro_instituicao;
    public $rua_instituicao;
    public $numeroLocal_instituicao;
    public $contatoTelefone_instituicao;

    public function __construct($db) 
    {
    $this->conn = $db;
    }

    public function loginInstituicao()
    {
        $query = "SELECT id_instituicao FROM " . " {$this->table} WHERE contatoEmail_instituicao = :contatoEmail_instituicao AND senhaInstituicao = :senhaInstituicao";
        $resultado  = $this->conn->prepare($query);
        $resultado->bindParam(':contatoEmail_instituicao', $this->contatoEmail_instituicao);
        $resultado->bindParam(':senhaInstituicao', $this->senhaInstituicao);

        return $resultado->execute();
    }

    public function criarInstituicao()
    {
        $query = "INSERT INTO {$this->table}
        (cnpj_instituicao, nomeFantasia_instituicao, razaoSocial_instituicao, missao_instituicao, tipoInstituicao, areaAtuacao_instituicao,
        contatoEmail_instituicao, contatoTelefone_instituicao, contatoRedeSocial_instituicao, estado_instituicao, cidade_instituicao, cep_instituicao,
        bairro_instituicao, rua_instituicao, numeroLocal_instituicao, senhaInstituicao, confirmarSenhaInstituicao)
        VALUES
        (:cnpj_instituicao, :nomeFantasia_instituicao, :razaoSocial_instituicao, :missao_instituicao, :tipoInstituicao, :areaAtuacao_instituicao,
        :contatoEmail_instituicao, :contatoTelefone_instituicao, :contatoRedeSocial_instituicao, :estado_instituicao, :cidade_instituicao, :cep_instituicao,
        :bairro_instituicao, :rua_instituicao, :numeroLocal_instituicao, :senhaInstituicao, :confirmarSenhaInstituicao)";
    
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':cnpj_instituicao', $this->cnpj_instituicao);
        $resultado->bindParam(':nomeFantasia_instituicao', $this->nomeFantasia_instituicao);
        $resultado->bindParam(':razaoSocial_instituicao', $this->razaoSocial_instituicao);
        $resultado->bindParam(':missao_instituicao', $this->missao_instituicao);
        $resultado->bindParam(':tipoInstituicao', $this->tipoInstituicao);
        $resultado->bindParam(':areaAtuacao_instituicao', $this->areaAtuacao_instituicao);
        $resultado->bindParam(':contatoEmail_instituicao', $this->contatoEmail_instituicao);
        $resultado->bindParam(':contatoTelefone_instituicao', $this->contatoTelefone_instituicao);
        $resultado->bindParam(':contatoRedeSocial_instituicao', $this->contatoRedeSocial_instituicao);
        $resultado->bindParam(':estado_instituicao', $this->estado_instituicao);
        $resultado->bindParam(':cidade_instituicao', $this->cidade_instituicao);
        $resultado->bindParam(':cep_instituicao', $this->cep_instituicao);
        $resultado->bindParam(':bairro_instituicao', $this->bairro_instituicao);
        $resultado->bindParam(':rua_instituicao', $this->rua_instituicao);
        $resultado->bindParam(':numeroLocal_instituicao', $this->numeroLocal_instituicao);
        $resultado->bindParam(':senhaInstituicao', $this->senhaInstituicao);
        $resultado->bindParam(':confirmarSenhaInstituicao', $this->confirmarSenhaInstituicao);
    
        if ($resultado->execute()) {
            return true;
        } else {
            $error = $resultado->errorInfo();
            echo "Erro ao cadastrar: " . $error[2];
            return false;
        }
        
    }
    
}



?> 