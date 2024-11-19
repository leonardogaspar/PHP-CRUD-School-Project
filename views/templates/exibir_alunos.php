<!DOCTYPE html>
<html lang="pt-BR">
<?php
$titulo = "Alunos";
include 'head_index.php'; 
?> 
<body>
<?php include 'navbar.php'; ?>
<div class="container">
  <div class="main-content">
    <div class="section" id="first-section">
      <div class="table-container">
        <table class="aluno-table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Sobrenome</th>
              <th>Data de Nascimento</th>
              <th>Sala</th>
              <th>Turma</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($alunos)): ?>
              <?php foreach($alunos as $aluno): ?>
                <tr>
                  <td><?php echo $aluno['nome_aluno']; ?></td>
                  <td><?php echo $aluno['sobrenome_aluno']; ?></td>
                  <td><?php echo $aluno['data_nasc']; ?></td>
                  <td><?php echo $aluno['num_sala']; ?></td>
                  <td><?php echo $aluno['ano'] . '° ' . $aluno['letra']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5">Nenhum aluno encontrado.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
