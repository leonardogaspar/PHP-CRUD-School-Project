<!DOCTYPE html>
<html lang="pt-BR">
<?php
session_start();
include 'head_login.php'; ?>
<body>
<div class="left-section"></div>
<div class="right-section">
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="../../controllers/loginController.php">
      <input type="text" name="email" placeholder="E-mail:" required>
      <input type="password" name="senha" placeholder="Senha:" required>
      <button type="submit">Entrar</button>
    </form>
    <?php if (isset($_SESSION['login_error'])): ?>
      <div class='error-message'><?= $_SESSION['login_error']; ?></div>
      <?php unset($_SESSION['login_error']); ?>
    <?php endif; ?>
  </div>
</div>
</body>
</html>
