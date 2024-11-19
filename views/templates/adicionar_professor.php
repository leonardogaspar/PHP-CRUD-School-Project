<!DOCTYPE html>
<html lang="pt-BR">
<?php
$titulo = "Adicionar professor";
include 'head_adicionar.php';
?>
<body>
<?php include 'navbar.php'; ?>
<div class="main-content">
  <div class="section" id="first-section">
    <div class="container">
      <h2>Inserir Professor</h2>
      <form method="POST" action="">
        <label>ID do Professor:</label>
        <input type="number" name="id_prof" required><br><br>
        <label>Nome:</label>
        <input type="text" name="nome_prof" required><br><br>
        <label>Sobrenome:</label>
        <input type="text" name="sobrenome_prof" required><br><br>
        <label>Matéria:</label>
        <input type="text" name="materia" required><br><br>
        <label>ID da Classe:</label>
        <input type="number" name="id_classe_fk" min="1" max="6" required placeholder="1 a 6"><br><br>
        <button type="submit">Inserir Professor</button>
      </form>
      <?php include 'message.php'?>
    </div>
  </div>
</div>
</body>
</html>
