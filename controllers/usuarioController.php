<?php
require_once 'sessaoController.php';
require_once '../models/funcionario.php';

$funcionarioModel = new Funcionario();

$funcionario = $funcionarioModel->buscarFuncionarioPorEmail($email); 
if ($funcionario) {
  $nome_funcionario = $funcionario['nome_funcionario'];
  $sobrenome_funcionario = $funcionario['sobrenome_funcionario'];
} else {
  $nome_funcionario = 'Nome do funcionario nao encontrado';
  $sobrenome_funcionario = '';
}
?>