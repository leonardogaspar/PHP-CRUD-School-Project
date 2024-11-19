<!DOCTYPE html>
<html lang="pt-BR">
<?php
$titulo = "Matricular aluno";
include 'head_adicionar.php';
?>
<body>
<?php include 'navbar.php'; ?>
<div class="main-content">
  <div class="section" id="first-section">
    <div class="container">
      <h2>Matricular Aluno</h2>
      <form method="POST" action="">
        <label>ID do Aluno:</label>
        <input type="number" name="id_aluno" required><br><br>
        <label>Nome:</label>
        <input type="text" name="nome_aluno" required><br><br>
        <label>Sobrenome:</label>
        <input type="text" name="sobrenome_aluno" required><br><br>
        <label>Data de Nascimento:</label>
        <input type="date" name="data_nasc" required><br><br>
        <label>ID da Classe:</label>
        <input type="number" name="id_classe_fk" min="1" max="6" required placeholder="1 a 6"><br><br>
        <button type="submit">Matricular aluno</button>
      </form>
      <?php include 'message.php'?>
    </div>
  </div>
</div>
</body>
</html>
