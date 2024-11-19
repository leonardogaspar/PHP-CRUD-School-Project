<?php
require_once 'database.php';

class AddFuncionario {
  private $conn;
  private $message = '';
  private $message_error = '';

  public function __construct() {
    $db = new Database();
    $this->conn = $db->getConnection();
  }
  
  public function InserirFuncionario($email_add, $nome_funcionario_add, $sobrenome_funcionario_add, $cargo_add, $senha_add) {
    $sql = "INSERT INTO funcionario (email, nome_funcionario, sobrenome_funcionario, cargo, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    if ($stmt === false) {
      throw new Exception("Erro ao preparar a query: " . $this->conn->error);
    }

    $stmt->bind_param("sssss", $email_add, $nome_funcionario_add, $sobrenome_funcionario_add, $cargo_add, $senha_add);

    if ($stmt->execute()) {
      $this->message = "Novo registro de funcionario inserido com sucesso!";
    } else {
      $this->message_error = "Erro ao inserir funcionario: " . $this->conn->error;
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
