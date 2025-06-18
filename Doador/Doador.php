 <?php

class Doador
{
    private $conn;
    private $table = "doador";
    public $id_doador;
    public $usernameDoador;
    public $senhaDoador;
    public $confirmarSenhaDoador;
    public $nome_doador;
    public $cpf_doador;
    public $dataNasc_doador;
    public $contatoTelefone_doador;
    public $contatoEmail_doador;
    public $site_doador;
    public $cep_doador;
    public $descricao_doador; 
    public $estado_doador; 
    public $cidade_doador; 
    public $bairro_doador;  
    public $rua_doador;  
    public $numLocal_doador;
    public $id_acao;
    public $nome_acao;
    public $descricao_peca;
    public function __construct($db) 
    {
    $this->conn = $db;
    }

    public function buscarPorId() 
    {
        $query = "SELECT * FROM {$this->table}   WHERE id_doador = :id_doador
        LIMIT 1";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id_doador', $this->id_doador, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function deletarDoador() 
    {
        $query = "DELETE FROM {$this->table} WHERE id_doador = :id_doador";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id_doador', $this->id_doador);
        return $resultado->execute();
    }

    public function atualizarSenha() {
        $query = "UPDATE doador SET senhaDoador = :senhaDoador WHERE id_doador = :id_doador";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':senhaDoador', $this->senhaDoador);
        $stmt->bindParam(':id_doador', $this->id_doador);
        return $stmt->execute();
    }

     public function buscarPorEmail() {
        $query = "SELECT * FROM doador WHERE contatoEmail_doador = :contatoEmail_doador LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':contatoEmail_doador', $this->contatoEmail_doador);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function loginDoador()
    {
        $query = "SELECT id_doador FROM {$this->table} WHERE contatoEmail_doador = :contatoEmail_doador AND senhaDoador = :senhaDoador LIMIT 1"  ;
        $resultado  = $this->conn->prepare($query);
        $resultado->bindParam(':contatoEmail_doador', $this->contatoEmail_doador);
        $resultado->bindParam(':senhaDoador', $this->senhaDoador);
        $resultado->execute();

         if ($resultado->rowCount() > 0) {
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id_doador'] = $row['id_doador'];
            return true;
        }
        return false;
    }

public function listarDoadorSessao() {
    $query = "SELECT d.*, a.nome_acao, p.descricao_peca
              FROM doador d
              LEFT JOIN participacoes p ON d.id_doador = p.id_doador
              LEFT JOIN acao a ON p.id_acao = a.id_acao
              WHERE a.nome_acao = :nome_acao
              AND p.descricao_peca = :descricao_peca";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nome_acao', $this->nome_acao);
    $stmt->bindParam(':descricao_peca', $this->descricao_peca);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

     public function listarDoador() {
        $query = "SELECT  FROM {$this->table}
        WHERE id_doador = :id_doador
        AND nome_doador = :nome_doador
        AND contatoEmail_doador = :contatoEmail_doador
        AND estado_doador = :estado_doador 
        AND cidade_doador = :cidade_doador";

        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id_doador', $this->id_doador);
        $resultado->bindParam(':nome_doador', $this->nome_doador);
        $resultado->bindParam(':contatoEmail_doador', $this->contatoEmail_doador);
        $resultado->bindParam(':estado_doador', $this->estado_doador);
        $resultado->bindParam(':cidade_doador', $this->cidade_doador);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function alterarDoador() {
    $query = "UPDATE {$this->table} SET
    nome_doador =:nome_doador,
    cpf_doador =:cpf_doador,
    descricao_doador =:descricao_doador,
    dataNasc_doador =:dataNasc_doador,
    cep_doador =:cep_doador,
    contatoTelefone_doador =:contatoTelefone_doador,
    contatoEmail_doador =:contatoEmail_doador,
    site_doador =:site_doador,
    estado_doador =:estado_doador,
    cidade_doador =:cidade_doador,
    bairro_doador =:bairro_doador,
    rua_doador =:rua_doador,
    numLocal_doador =:numLocal_doador,
    senhaDoador =:senhaDoador,
    confirmarSenhaDoador =:confirmarSenhaDoador
    WHERE id_doador = :id_doador";
    
    $resultado = $this->conn->prepare($query);
    $resultado->bindParam('id_doador', $this->id_doador, PDO::PARAM_INT);  
    $resultado->bindParam('nome_doador', $this->nome_doador);
    $resultado->bindParam('cpf_doador', $this->cpf_doador);
    $resultado->bindParam('descricao_doador', $this->descricao_doador);
    $resultado->bindParam('dataNasc_doador', $this->dataNasc_doador);
    $resultado->bindParam('contatoTelefone_doador', $this->contatoTelefone_doador);
    $resultado->bindParam('contatoEmail_doador', $this->contatoEmail_doador);
    $resultado->bindParam('site_doador', $this->site_doador);
    $resultado->bindParam('cep_doador', $this->cep_doador);
    $resultado->bindParam('estado_doador', $this->estado_doador);
    $resultado->bindParam('cidade_doador', $this->cidade_doador);
    $resultado->bindParam('bairro_doador', $this->bairro_doador);
    $resultado->bindParam('rua_doador', $this->rua_doador);        
    $resultado->bindParam('numLocal_doador', $this->numLocal_doador);
    $resultado->bindParam('senhaDoador',$this->senhaDoador);
    $resultado->bindParam('confirmarSenhaDoador', $this->confirmarSenhaDoador);

    return $resultado->execute();
    }

    public function inserirParticipante()
    {
        $query = "INSERT INTO doador 
            (nome_doador, contatoEmail_doador, estado_doador, cidade_doador) 
            VALUES 
            (:nome_doador, :contatoEmail_doador, :estado_doador, :cidade_doador)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_doador', $this->nome_doador);
        $stmt->bindParam(':contatoEmail_doador', $this->contatoEmail_doador);
        $stmt->bindParam(':estado_doador', $this->estado_doador);
        $stmt->bindParam(':cidade_doador', $this->cidade_doador);

        return $stmt->execute();
    }

    public function criarDoador()
    {
        $query = "INSERT INTO {$this->table}
        (nome_doador, cpf_doador, descricao_doador, dataNasc_doador, cep_doador, contatoTelefone_doador, contatoEmail_doador, site_doador,
        estado_doador, cidade_doador, bairro_doador, rua_doador, numLocal_doador, senhaDoador, confirmarSenhaDoador)
        VALUES (:nome_doador, :cpf_doador, :descricao_doador, :dataNasc_doador, :cep_doador, :contatoTelefone_doador, :contatoEmail_doador, :site_doador,
        :estado_doador, :cidade_doador, :bairro_doador, :rua_doador, :numLocal_doador, :senhaDoador, :confirmarSenhaDoador)";


        $resultado = $this->conn->prepare($query);  
        $resultado->bindParam('nome_doador', $this->nome_doador);
        $resultado->bindParam('cpf_doador', $this->cpf_doador);
        $resultado->bindParam('descricao_doador', $this->descricao_doador);
        $resultado->bindParam('dataNasc_doador', $this->dataNasc_doador);
        $resultado->bindParam('contatoTelefone_doador', $this->contatoTelefone_doador);
        $resultado->bindParam('contatoEmail_doador', $this->contatoEmail_doador);
        $resultado->bindParam('site_doador', $this->site_doador);
        $resultado->bindParam('cep_doador', $this->cep_doador);
        $resultado->bindParam('estado_doador', $this->estado_doador);
        $resultado->bindParam('cidade_doador', $this->cidade_doador);
        $resultado->bindParam('bairro_doador', $this->bairro_doador);
        $resultado->bindParam('rua_doador', $this->rua_doador);
        $resultado->bindParam('numLocal_doador', $this->numLocal_doador);
        $resultado->bindParam('senhaDoador',$this->senhaDoador);
        $resultado->bindParam('confirmarSenhaDoador', $this->confirmarSenhaDoador);
        
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