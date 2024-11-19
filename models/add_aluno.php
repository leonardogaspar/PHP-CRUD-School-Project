<?php
require_once 'database.php';

class AddAluno {
    private $conn;
    private $message = '';
    private $message_error = '';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function inserirAluno($id_aluno, $nome_aluno, $sobrenome_aluno, $data_nasc, $id_classe_fk) {
        $sql = "INSERT INTO alunos (id_aluno, nome_aluno, sobrenome_aluno, data_nasc, id_classe_fk) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Erro ao preparar a query: " . $this->conn->error);
        }

        $stmt->bind_param("isssi", $id_aluno, $nome_aluno, $sobrenome_aluno, $data_nasc, $id_classe_fk);

        if ($stmt->execute()) {
            $this->message = "Novo registro de aluno inserido com sucesso!";
        } else {
            $this->message_error = "Erro ao inserir aluno: " . $this->conn->error;
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
