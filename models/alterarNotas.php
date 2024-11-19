<?php
include 'database.php';

class AltNota {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function salvarNotas($notas) {
        foreach ($notas as $nota) {
            $id_aluno = $nota['id_aluno'];
            $nota1 = $nota['nota_primeiro_semestre'];
            $nota2 = $nota['nota_segundo_semestre'];
            $media = $nota['media'];

            if ($this->validarNota($id_aluno, $nota1, $nota2, $media)) {
                $this->inserirOuAtualizarNota($id_aluno, $nota1, $nota2, $media);
            } else {
                echo json_encode(["status" => "error", "message" => "Dados inválidos para o aluno ID $id_aluno"]);
                exit;
            }
        }
        echo json_encode(["status" => "success", "message" => "Notas salvas com sucesso!"]);
    }

    private function validarNota($id_aluno, $nota1, $nota2, $media) {
        return is_numeric($id_aluno) && is_numeric($nota1) && is_numeric($nota2) && is_numeric($media);
    }

    private function inserirOuAtualizarNota($id_aluno, $nota1, $nota2, $media) {
        $alterar = "INSERT INTO notas (id_aluno_fk, nota_primeiro_semestre, nota_segundo_semestre, media) 
                    VALUES (?, ?, ?, ?) 
                    ON DUPLICATE KEY UPDATE 
                    nota_primeiro_semestre = ?, 
                    nota_segundo_semestre = ?, 
                    media = ?";
        $stmt = $this->conn->prepare($alterar);

        if ($stmt) {
            $stmt->bind_param("idddddd", $id_aluno, $nota1, $nota2, $media, $nota1, $nota2, $media);
            if (!$stmt->execute()) {
                echo json_encode(["status" => "error", "message" => "Erro ao salvar as notas para o aluno ID $id_aluno: " . $stmt->error]);
                $stmt->close();
                exit;
            }
            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao preparar a query: " . $this->conn->error]);
            exit;
        }
    }
}

$nota = new AltNota();
$data = json_decode(file_get_contents("php://input"), true);
if (!empty($data['notas'])) {
    $nota->salvarNotas($data['notas']);
} else {
    echo json_encode(["status" => "error", "message" => "Nenhuma nota fornecida"]);
}
?>
