<!DOCTYPE html>
<html lang="pt-BR">
<?php
$titulo = "Criar ocorrencia";
include 'head_adicionar.php';
?>
<body>
<?php include 'navbar.php'; ?>
<div class="main-content">
  <div class="section" id="first-section">
    <div class="container">
      <h2>Registrar Ocorrência</h2>
      <form method="POST" action="">
        <label>ID do Aluno:</label>
        <input type="number" name="id_aluno_fk" required><br><br>
        <label>Descrição:</label>
        <input type="text" name="descricao" required><br><br>
        <button type="submit">Registrar Ocorrência</button>
      </form>
      <?php include 'message.php'?>
    </div>
  </div>
</div>
</body>
</html>
