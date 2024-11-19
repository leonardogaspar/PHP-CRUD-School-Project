<?php
require_once 'sessaoController.php';

if (isset($_POST['id'])) {
  $_SESSION['id'] = $_POST['id'];
  header("Location: indexController.php");
  exit();
} else {
  header("Location: ../views/templates/salas.php");
  exit();
}

include '../views/templates/salas.php';
?>

