<?php
require_once 'database.php';

class ExibirAlunos {
  private $conn;

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function todosAlunos() {
    $query_alunos = "SELECT a.id_aluno, a.nome_aluno, a.sobrenome_aluno, a.data_nasc, a.id_classe_fk, c.ano, c.letra, c.num_sala
                     FROM alunos a
                     JOIN classes c ON a.id_classe_fk = c.id_classe";
    $stmt = $this->conn->prepare($query_alunos);
    if ($stmt === false) {
      throw new Exception("Erro ao preparar a query: " . $this->conn->error);
    }

    if (!$stmt->execute()) {
      throw new Exception("Erro ao executar a query: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result === false) {
      throw new Exception("Erro ao obter o resultado: " . $stmt->error);
    }

    return $result;
  }
}
?>