<?php
require_once 'database.php';

class Ocorrencias {
  private $conn;

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function buscarOcorrenciasPorClasse($id_classe) {
    if (!is_numeric($id_classe)) {
      throw new Exception("ID da classe invalido");
    }

    $query = "SELECT a.nome_aluno, a.sobrenome_aluno, o.descricao 
              FROM ocorrencias o
              JOIN alunos a ON o.id_aluno_fk = a.id_aluno
              JOIN classes c ON a.id_classe_fk = c.id_classe
              WHERE c.id_classe = ?";   
    $stmt = $this->conn->prepare($query);
    if ($stmt === false) {
      throw new Exception("Erro ao preparar a query de ocorrencias: " . $this->conn->error);
    }

    $stmt->bind_param("i", $id_classe);
    if (!$stmt->execute()) {
      throw new Exception("Erro ao executar a query de ocorrencias: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result === false) {
      throw new Exception("Erro ao obter o resultado de ocorrencias: " . $stmt->error);
    }

    $ocorrencias = [];
    while ($ocorrencia = $result->fetch_assoc()) {
      $ocorrencias[] = [
        'nome_aluno' => $ocorrencia['nome_aluno'],
        'sobrenome_aluno' => $ocorrencia['sobrenome_aluno'],
        'descricao' => $ocorrencia['descricao']
      ];
    }

    $stmt->close();
    return $ocorrencias;
  }

  public function closeConnection() {
    if ($this->conn) {
      $this->conn->close();
    }
  }

  public function __destruct() {
    $this->closeConnection();
  }
}
?>