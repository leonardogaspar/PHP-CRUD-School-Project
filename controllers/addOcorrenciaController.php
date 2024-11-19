<?php
require_once 'sessaoController.php';
require_once 'usuarioController.php';
require_once '../models/add_ocorrencia.php';

$addOcorrenciaModel = new AddOcorrencia();

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_aluno_fk = $_POST['id_aluno_fk'];
  $descricao = $_POST['descricao'];
  
  $addOcorrencia = $addOcorrenciaModel->InserirOcorrencia($id_aluno_fk, $descricao);

  $success_message = $addOcorrenciaModel->getMessage();
  $error_message = $addOcorrenciaModel->getErrorMessage();
}

include '../views/templates/adicionar_ocorrencia.php';
?>
