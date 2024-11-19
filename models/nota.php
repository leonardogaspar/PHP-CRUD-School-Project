<?php
require_once 'database.php';

class Notas {
  private $conn;

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function buscarNotasPorClasse($id_classe) {
    if (!is_numeric($id_classe)) {
      throw new Exception("ID da classe invalido");
    }

    $query = "SELECT a.id_aluno, a.nome_aluno, a.sobrenome_aluno, 
                     COALESCE(n.nota_primeiro_semestre, 0) AS nota_primeiro_semestre, 
                     COALESCE(n.nota_segundo_semestre, 0) AS nota_segundo_semestre, 
                     COALESCE(n.media, 0) AS media
              FROM alunos a
              LEFT JOIN notas n ON a.id_aluno = n.id_aluno_fk
              WHERE a.id_classe_fk = ?";   
    $stmt = $this->conn->prepare($query);
    if ($stmt === false) {
      throw new Exception("Erro ao preparar a query de notas: " . $this->conn->error);
    }

    $stmt->bind_param("i", $id_classe);
    if (!$stmt->execute()) {
      throw new Exception("Erro ao executar a query de notas: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result === false) {
      throw new Exception("Erro ao obter o resultado de notas: " . $stmt->error);
    }

    $notas = [];
    while ($nota = $result->fetch_assoc()) {
      $notas[] = [
        'id_aluno' => $nota['id_aluno'],
        'nome_aluno' => $nota['nome_aluno'],
        'sobrenome_aluno' => $nota['sobrenome_aluno'],
        'nota_primeiro_semestre' => $nota['nota_primeiro_semestre'],
        'nota_segundo_semestre' => $nota['nota_segundo_semestre'],
        'media' => $nota['media']
      ];
    }

    $stmt->close();
    return $notas;
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