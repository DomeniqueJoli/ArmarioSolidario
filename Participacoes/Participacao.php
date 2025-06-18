<?php


class Participacao {
    private $conn;
    public $id_doador;
    public $id_acao;
    public $descricao_peca;

    public function __construct($db) {
        $this->conn = $db;
    }   
    public function salvar() {
        $query = "INSERT INTO participacoes (id_doador, id_acao, descricao_peca) VALUES (:id_doador, :id_acao, :descricao_peca)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_doador', $this->id_doador);
        $stmt->bindParam(':id_acao', $this->id_acao);
        $stmt->bindParam(':descricao_peca', $this->descricao_peca);
        return $stmt->execute();
    }
}

?>