<!DOCTYPE html>
<html lang="pt-BR">
<?php
include 'head_sala.php';
?>
<body>
<h1>Escolha uma Sala</h1>
<form method="post" action="../../controllers/salasController.php">
  <div class="linha">
    <button type="submit" name="id" value="1">Sala 1</button>
    <button type="submit" name="id" value="2">Sala 2</button>
    <button type="submit" name="id" value="3">Sala 3</button>
  </div>
  <div class="linha">
    <button type="submit" name="id" value="4">Sala 4</button>
    <button type="submit" name="id" value="5">Sala 5</button>
    <button type="submit" name="id" value="6">Sala 6</button>
  </div>
</form>
</body>
</html>
