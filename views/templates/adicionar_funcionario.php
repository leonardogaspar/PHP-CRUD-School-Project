<!DOCTYPE html>
<html lang="pt-BR">
<?php
$titulo = "Inserir funcionario";
include 'head_adicionar.php';
?>
<body>
<?php include 'navbar.php'; ?>
<div class="main-content">
  <div class="section" id="first-section">
    <div class="container">
      <form method="POST" action="">
        <h2>Inserir Funcionário</h2>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Nome:</label>
        <input type="text" name="nome_funcionario" required><br><br>
        <label>Sobrenome:</label>
        <input type="text" name="sobrenome_funcionario" required><br><br>
        <label>Cargo:</label>
        <input type="text" name="cargo" required><br><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>
        <button type="submit">Inserir Funcionário</button>
      </form>
      <?php include 'message.php'?>
    </div>
  </div>
</div>
</body>
</html>


