<?php
session_start();
require_once '../models/conta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $conta = new Conta();
  $loginValido = $conta->verificarLogin($email, $senha);

  if ($loginValido) {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header("Location: salasController.php");
    exit();
  } else {
    $_SESSION['login_error'] = "E-mail ou senha incorretos. Tente novamente.";
    header("Location: ../views/templates/login.php");
    exit();
  }
}
include '../views/templates/login.php';
?>
