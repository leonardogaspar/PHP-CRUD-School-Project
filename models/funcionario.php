<?php
require_once 'database.php';

class Funcionario {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function buscarFuncionarioPorEmail($email) {
        $query = "SELECT nome_funcionario, sobrenome_funcionario FROM funcionario WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
          throw new Exception("Erro ao preparar a query: " . $this->conn->error);
        }
    
        $stmt->bind_param("s", $email);
        if (!$stmt->execute()) {
          throw new Exception("Erro ao executar a query: " . $stmt->error);
        }
    
        $result = $stmt->get_result();
        if ($result === false) {
          throw new Exception("Erro ao obter o resultado: " . $stmt->error);
        }
    
        $funcionario = $result->fetch_assoc();
        $stmt->close();
    
        if ($funcionario) {
          return [
            'nome_funcionario' => $funcionario['nome_funcionario'],
            'sobrenome_funcionario' => $funcionario['sobrenome_funcionario']
          ];
        } else {
          return null;
        }
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