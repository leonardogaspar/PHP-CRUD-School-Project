<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
  header("Location: ../views/templates/login.php");
  exit();
}

$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
?>