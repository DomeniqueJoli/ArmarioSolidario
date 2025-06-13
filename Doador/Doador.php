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