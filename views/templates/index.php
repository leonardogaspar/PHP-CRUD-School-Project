<!DOCTYPE html>
<html lang="pt-BR">
<?php
$titulo = "Gestão Escolar - Sala " . $id;
include 'head_index.php';
?> 
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="main-content">
        <div class="classroom">
            <h1>Sala - <?php echo $id; ?></h1>
        </div>
        <div class="section" id="first-section">
            <a href="/projeto/controllers/exibirAlunosController.php" class="button-alunos">Alunos</a>
            <a href="#mensagens" class="button-alunos">Mensagens</a>
        </div>
        <div class="section" id="second-section"> 
            <div class="profile-info">
                <h3>Informações do Perfil</h3>
                <ul>
                    <li>Nome: <?php echo $nome_funcionario . ' ' . $sobrenome_funcionario; ?></li>
                    <li>Email: <?php echo $email; ?></li>
                    <li>Senha: <?php echo $senha; ?></li>
                    <li><a href="#configuracoes">Configurações da Conta</a></li>
                </ul>
            </div>
            <div class="student-info">
                <h3>Alunos</h3>
                <ul>
                    <?php foreach($alunos as $aluno): ?>
                        <li><?php echo $aluno['nome_aluno'] . ' ' . $aluno['sobrenome_aluno']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="teacher-info">
                <h3>Professores</h3>
                <ul>
                    <?php foreach($professores as $professor): ?>
                        <li><?php echo $professor['nome_prof'] . ' ' . $professor['sobrenome_prof'] . ' - ' . $professor['materia']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="section" id="third-section">
            <div class="birthday-info">
                <h3>Aniversários dos Alunos da Sala <?php echo $id; ?></h3>
                <div id="calendar">
                    <script>
                        var aniversarios = <?php echo json_encode($aniversarios); ?>;
                        document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            locale: 'pt-br', 
                            events: aniversarios, 
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            }
                        });
                        calendar.render();
                    });
                    </script>
                </div> <br>
                <div class="buttons">
                    <button>Grade Horária da Sala</button>
                    <button>Material de Estudo</button>
                    <button>Eventos</button>
                </div>
            </div>
            <div class="buttons">
                <div class="ocorrencias-table">
                    <table id="notas-table">
                        <h3>Notas dos Alunos</h3>
                        <thead>
                            <tr>
                                <th>Nome do Aluno</th>
                                <th>Nota 1º Semestre</th>
                                <th>Nota 2º Semestre</th>
                                <th>Média</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($notas as $nota): ?>
                                <tr data-id-aluno="<?php echo $nota['id_aluno']; ?>">
                                    <td><?php echo htmlspecialchars($nota['nome_aluno'] . ' ' . $nota['sobrenome_aluno']); ?></td>
                                    <td><input type="number" step="0.1" class="nota1" value="<?php echo $nota['nota_primeiro_semestre']; ?>"></td>
                                    <td><input type="number" step="0.1" class="nota2" value="<?php echo $nota['nota_segundo_semestre']; ?>"></td>
                                    <td class="media"><?php echo number_format($nota['media'], 2, ',', ''); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <button onclick="salvarNotas()">Salvar Notas</button>
                <div class="ocorrencias-table">
                    <h3>Ocorrências</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome do Aluno</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ocorrencias as $ocorrencia): ?>
                                <?php $nome_completo = $ocorrencia['nome_aluno'] . ' ' . $ocorrencia['sobrenome_aluno']; ?>
                                <tr>
                                    <td><?php echo $nome_completo; ?></td>
                                    <td><?php echo $ocorrencia['descricao']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

