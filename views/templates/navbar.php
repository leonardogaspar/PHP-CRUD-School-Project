<nav class="navbar">
    <div class="profile">
        <img src="/projeto/views/static/images/profile.jpg" alt="Foto do Usuário" width="100" height="100">
        <h2><?php echo $nome_funcionario . ' ' . $sobrenome_funcionario; ?></h2>
    </div>
    <ul class="nav-links">
        <li><a href="#site">Site da Escola</a></li>
        <li><a href="#calendario">Calendário Escolar</a></li>
        <li><a href="#regimento">Regimento Escolar</a></li>
        <li><a href="/projeto/controllers/addAlunoController.php">Matricular Aluno</a></li>
        <li><a href="/projeto/controllers/addProfessorController.php">Adicionar Professor</a></li>
        <li><a href="/projeto/controllers/addFuncionarioController.php">Adicionar Funcionário</a></li>
        <li><a href="/projeto/controllers/addOcorrenciaController.php">Registrar Ocorrência</a></li>
        <li><a href="#documentacao">Visualizar Documentos</a></li>
        <li class="login-button"><a href="/projeto/controllers/salasController.php"><button>Escolher sala</button></a></
        <li class="login-button"><a href="/projeto/views/templates/login.php"><button>Logar/Deslogar</button></a></li>
    </ul>
</nav>