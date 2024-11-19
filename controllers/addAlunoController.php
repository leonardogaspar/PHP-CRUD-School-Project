<?php
require_once 'sessaoController.php';
require_once 'usuarioController.php';
require_once '../models/add_aluno.php';

$addAlunoModel = new AddAluno();

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_aluno = $_POST['id_aluno'];
  $nome_aluno = $_POST['nome_aluno'];
  $sobrenome_aluno = $_POST['sobrenome_aluno'];
  $data_nasc = $_POST['data_nasc'];
  $id_classe_fk = $_POST['id_classe_fk'];

  $addAluno = $addAlunoModel->inserirAluno($id_aluno, $nome_aluno, $sobrenome_aluno, $data_nasc, $id_classe_fk);

  $success_message = $addAlunoModel->getMessage();
  $error_message = $addAlunoModel->getErrorMessage();
}

include '../views/templates/matricular_aluno.php';
?>
