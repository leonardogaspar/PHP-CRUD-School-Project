<?php
require_once 'database.php';

class Conta {
  private $conn;

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function verificarLogin($email, $senha) {
    $query = "SELECT * FROM funcionario WHERE email = ? AND senha = ?";
    $stmt = $this->conn->prepare($query);
    if ($stmt === false) {
      throw new Exception("Erro ao preparar a query: " . $this->conn->error);
    }

    $stmt->bind_param("ss", $email, $senha);
    if (!$stmt->execute()) {
      throw new Exception("Erro ao executar a query: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result === false) {
      throw new Exception("Erro ao obter o resultado: " . $stmt->error);
    }

    $stmt->close();
    return $result->num_rows > 0;
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

