<?php
class Database {
  private $host = '127.0.0.1';
  private $user = 'root';
  private $pass = '';
  private $db = 'escola';
  private $conn;

  public function getConnection() {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    if ($this->conn->connect_error) {
      die("Erro na conexao: " . $this->conn->connect_error);
    }
     return $this->conn;
  }

  public function closeConnection() {
    if ($this->conn) {
      $this->conn->close();
    }
  }
}
?>

