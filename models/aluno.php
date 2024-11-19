<?php
require_once 'database.php';

class Alunos {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function buscarAlunosPorClasse($id_classe) {
        $query = "SELECT nome_aluno, sobrenome_aluno FROM alunos WHERE id_classe_fk = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            throw new Exception("Erro ao preparar a query de alunos: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id_classe);
        if (!$stmt->execute()) {
            throw new Exception("Erro ao executar a query de alunos: " . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result === false) {
            throw new Exception("Erro ao obter o resultado de alunos: " . $stmt->error);
        }

        $alunos = [];
        while ($aluno = $result->fetch_assoc()) {
            $alunos[] = [
                'nome_aluno' => $aluno['nome_aluno'],
                'sobrenome_aluno' => $aluno['sobrenome_aluno']
            ];
        }

        $stmt->close();
        return $alunos;
    }

    public function buscarAniversariosPorClasse($id_classe) {
        $query = "SELECT nome_aluno, sobrenome_aluno, DATE_FORMAT(data_nasc, '%m-%d') AS aniversario 
                  FROM alunos 
                  WHERE id_classe_fk = ? 
                  ORDER BY MONTH(data_nasc), DAY(data_nasc)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            throw new Exception("Erro ao preparar a query de aniversarios: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id_classe);
        if (!$stmt->execute()) {
            throw new Exception("Erro ao executar a query de aniversarios: " . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result === false) {
            throw new Exception("Erro ao obter o resultado de aniversarios: " . $stmt->error);
        }

        $aniversarios = [];
        while ($aniversario = $result->fetch_assoc()) {
            $nome_completo = $aniversario['nome_aluno'] . ' ' . $aniversario['sobrenome_aluno'];
            $data_aniversario = date('Y') . '-' . $aniversario['aniversario']; 
            $aniversarios[] = [
                'title' => $nome_completo,
                'start' => $data_aniversario,
                'color' => '#fa6909'
            ];
        }

        $stmt->close();
        return $aniversarios;
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
