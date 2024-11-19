<?php
require_once 'database.php';

class AddOcorrencia {
  private $conn;
  private $message = '';
  private $message_error = '';

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }
  
  public function InserirOcorrencia($id_aluno_fk, $descricao) {
    $sql = "INSERT INTO ocorrencias (id_aluno_fk, descricao) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);
    if ($stmt === false) {
      throw new Exception("Erro ao preparar a query: " . $this->conn->error);
    }

    $stmt->bind_param("is", $id_aluno_fk, $descricao);

    if ($stmt->execute()) {
      $this->message = "Nova ocorrencia criada com sucesso!";
    } else {
      $this->message_error = "Erro ao criar ocorrencia: " . $this->conn->error;
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
