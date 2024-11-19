<?php
require_once 'database.php';

class AddProfessor {
  private $conn;
  private $message = '';
  private $message_error = '';

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function InserirProfessor($id_prof, $nome_prof, $sobrenome_prof, $materia, $id_classe_fk) {
    $sql = "INSERT INTO professor (id_prof, nome_prof, sobrenome_prof, materia) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    if ($stmt === false) {
      throw new Exception("Erro ao preparar a query: " . $this->conn->error);
    }

    $stmt->bind_param("isss", $id_prof, $nome_prof, $sobrenome_prof, $materia);

    if ($stmt->execute()) {
      $table_name = "aulas_turma_" . $id_classe_fk;
      $sql_vincular = "INSERT INTO $table_name (id_classe_fk, id_prof_fk) VALUES (?, ?)";
      $stmt_vincular = $this->conn->prepare($sql_vincular);
      
      if ($stmt_vincular === FALSE) {
        $this->message_error = "Erro ao preparar a query de vinculacao: ". $this->conn->error;
      } else {
        $stmt_vincular->bind_param("ii", $id_classe_fk, $id_prof);
      }
      
      if ($stmt_vincular->execute()) {
        $this->message = "Professor vinculado a turma " . $id_classe_fk . " com sucesso!";
      } else {
        $this->message_error = "Erro ao vincular o professor: " . $this->conn->error;
      }

      $stmt_vincular->close();
    } else {
      $this->message_error = "Erro ao inserir professor: " . $this->conn->error;
    }

    $stmt->close();
  }

  public function getMessage() {
    return $this->message;
  }

  public function getErrorMessage() {
    return $this->message_error;
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