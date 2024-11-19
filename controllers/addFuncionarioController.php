<?php
require_once 'sessaoController.php';
require_once 'usuarioController.php';
require_once '../models/add_funcionario.php';

$addFuncionarioModel = new AddFuncionario();

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email_add = $_POST['email'];
  $nome_funcionario_add = $_POST['nome_funcionario'];
  $sobrenome_funcionario_add = $_POST['sobrenome_funcionario'];
  $cargo_add = $_POST['cargo'];
  $senha_add = $_POST['senha'];
  
  $addFuncionario = $addFuncionarioModel->InserirFuncionario($email_add, $nome_funcionario_add, $sobrenome_funcionario_add, $cargo_add, $senha_add);

  $success_message = $addFuncionarioModel->getMessage();
  $error_message = $addFuncionarioModel->getErrorMessage();
}

include '../views/templates/adicionar_funcionario.php';
?>
