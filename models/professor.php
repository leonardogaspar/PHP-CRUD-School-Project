<?php
require_once 'database.php';

class Professores {
  private $conn;

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function buscarProfessoresPorTurma($id_turma) {
    if (!is_numeric($id_turma)) {
      throw new Exception("ID da turma invalido");
    }

    $query = "SELECT p.nome_prof, p.sobrenome_prof, p.materia 
              FROM aulas_turma_$id_turma a 
              JOIN professor p ON a.id_prof_fk = p.id_prof";        
    $result = $this->conn->query($query);
    if ($result === false) {
      throw new Exception("Erro na consulta de professores: " . $this->conn->error);
    }

    $professores = [];
    while ($professor = $result->fetch_assoc()) {
      $professores[] = [
        'nome_prof' => $professor['nome_prof'],
        'sobrenome_prof' => $professor['sobrenome_prof'],
        'materia' => $professor['materia']
      ];
    }

    return $professores;
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

