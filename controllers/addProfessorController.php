<?php
require_once 'sessaoController.php';
require_once 'usuarioController.php';
require_once '../models/add_professor.php';

$addProfessorModel = new AddProfessor();

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_prof = $_POST['id_prof'];
  $nome_prof = $_POST['nome_prof'];
  $sobrenome_prof = $_POST['sobrenome_prof'];
  $materia = $_POST['materia'];
  $id_classe_fk = $_POST['id_classe_fk']; 
  
  $addProfessor = $addProfessorModel->InserirProfessor($id_prof, $nome_prof, $sobrenome_prof, $materia, $id_classe_fk);

  $success_message = $addProfessorModel->getMessage();
  $error_message = $addProfessorModel->getErrorMessage();
}

include '../views/templates/adicionar_professor.php';
?>
