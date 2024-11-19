<?php 
require_once 'sessaoController.php';
require_once 'usuarioController.php';
require_once '../models/exibir_alunos.php';

$exibirAlunos = new ExibirAlunos();

$result_alunos = $exibirAlunos->todosAlunos();
$alunos = [];
if ($result_alunos->num_rows > 0) {
  while ($row = $result_alunos->fetch_assoc()) {
    $alunos[] = $row;
  }
}

include '../views/templates/exibir_alunos.php';
?>
