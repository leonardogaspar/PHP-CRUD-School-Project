<?php
require_once 'sessaoController.php';
require_once 'usuarioController.php';

$id = $_SESSION['id']; 

require_once '../models/aluno.php';
require_once '../models/nota.php';
require_once '../models/ocorrencia.php';
require_once '../models/professor.php';

$alunoModel = new Alunos();
$notaModel = new Notas();
$ocorrenciaModel = new Ocorrencias();
$professorModel = new Professores();

$alunos = $alunoModel->buscarAlunosPorClasse($id);
$aniversarios = $alunoModel->buscarAniversariosPorClasse($id);
$notas = $notaModel->buscarNotasPorClasse($id);
$ocorrencias = $ocorrenciaModel->buscarOcorrenciasPorClasse($id);
$professores = $professorModel->buscarProfessoresPorTurma($id);

include '../views/templates/index.php';
?>
