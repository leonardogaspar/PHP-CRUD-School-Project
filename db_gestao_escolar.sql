CREATE DATABASE escola;
USE escola;

CREATE TABLE classes (
	id_classe INT PRIMARY KEY,
	ano INT,
	letra CHAR(1),
	num_sala INT
);

CREATE TABLE alunos (
	id_aluno INT PRIMARY KEY,
    nome_aluno VARCHAR(50),
    sobrenome_aluno VARCHAR(50),
    data_nasc DATE, 
	id_classe_fk INT, 
	FOREIGN KEY (id_classe_fk) REFERENCES classes(id_classe)
);

CREATE TABLE notas (
	nota_primeiro_semestre DECIMAL(5,2),
	nota_segundo_semestre DECIMAL(5,2),
	media DECIMAL(5,2),
    id_aluno_fk INT PRIMARY KEY,
    FOREIGN KEY (id_aluno_fk) REFERENCES alunos(id_aluno)
);
    
CREATE TABLE ocorrencias (
	id_ocorrencia INT AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(150),
	id_aluno_fk INT,
	FOREIGN KEY (id_aluno_fk) REFERENCES alunos(id_aluno)
);

CREATE TABLE professor (
	id_prof INT PRIMARY KEY,
    nome_prof VARCHAR(50),
    sobrenome_prof VARCHAR(50),
    materia VARCHAR(50)
);

CREATE TABLE aulas_turma_1 (
	id_prof_fk INT,
    id_classe_fk INT,
    FOREIGN KEY (id_prof_fk) REFERENCES professor(id_prof),
    FOREIGN KEY (id_classe_fk) REFERENCES classes(id_classe)
);

CREATE TABLE aulas_turma_2 (
	id_prof_fk INT,
    id_classe_fk INT,
    FOREIGN KEY (id_prof_fk) REFERENCES professor(id_prof),
    FOREIGN KEY (id_classe_fk) REFERENCES classes(id_classe)
);

CREATE TABLE aulas_turma_3 (
	id_prof_fk INT,
    id_classe_fk INT,
    FOREIGN KEY (id_prof_fk) REFERENCES professor(id_prof),
    FOREIGN KEY (id_classe_fk) REFERENCES classes(id_classe)
);

CREATE TABLE aulas_turma_4 (
	id_prof_fk INT,
    id_classe_fk INT,
    FOREIGN KEY (id_prof_fk) REFERENCES professor(id_prof),
    FOREIGN KEY (id_classe_fk) REFERENCES classes(id_classe)
);

CREATE TABLE aulas_turma_5 (
	id_prof_fk INT,
    id_classe_fk INT,
    FOREIGN KEY (id_prof_fk) REFERENCES professor(id_prof),
    FOREIGN KEY (id_classe_fk) REFERENCES classes(id_classe)
);

CREATE TABLE aulas_turma_6 (
	id_prof_fk INT,
    id_classe_fk INT,
    FOREIGN KEY (id_prof_fk) REFERENCES professor(id_prof),
    FOREIGN KEY (id_classe_fk) REFERENCES classes(id_classe)
);

CREATE TABLE funcionario (
	email VARCHAR(100) PRIMARY KEY,
    nome_funcionario VARCHAR(50),
    sobrenome_funcionario VARCHAR(50),
    cargo VARCHAR(50),
    senha VARCHAR(100)
);

INSERT INTO funcionario (email, nome_funcionario, sobrenome_funcionario, cargo, senha) VALUES 
('diretor@gmail.com', 'Joao', 'Silva', 'Diretor', 'diretor123'), 
('secretaria@gmail.com', 'Maria', 'Souza', 'Secretaria', '12345'), 
('aux_secretaria@gmail.com', 'Pedro', 'Carvalho', 'Auxiliar de Secretaria', 'senha123'); 

INSERT INTO classes (id_classe, ano, letra, num_sala) VALUES 
(1, 8, 'A', 5),
(2, 7, 'C', 6),
(3, 6, 'A', 7),
(4, 9, 'D', 8),
(5, 8, 'B', 9),
(6, 9, 'A', 10);
 
INSERT INTO alunos (id_aluno, nome_aluno, sobrenome_aluno, data_nasc, id_classe_fk) VALUES 
(101, 'Helio', 'Maria', '2010-12-01', 1), 
(102, 'Ana', 'Pereira', '2011-02-19', 1),
(103, 'Bianca', 'Silva', '2011-05-21', 1),
(104, 'Debora', 'Pinheiro', '2010-11-15', 1),
(105, 'Claudio', 'Oliveira', '2011-03-01', 1),
(106, 'Eduardo', 'Souza', '2011-01-10', 1),
(107, 'Fabio', 'Rodrigues', '2010-09-07', 1),
(108, 'Giulia', 'Ferreira', '2011-04-27', 1),
(201, 'Iris', 'Alves', '2012-04-30', 2),
(202, 'Jonathan', 'Pereira', '2011-02-06', 2),
(203, 'Kevin', 'Lima', '2012-01-27', 2),
(204, 'Lais', 'Gomes', '2012-10-13', 2),
(301, 'Maria', 'Silva', '2013-01-15', 3),
(302, 'Nadia', 'Vale', '2012-12-01', 3),
(303, 'Oliver', 'Oliveira', '2013-07-31', 3),
(304, 'Pedro', 'Dias', '2013-01-30', 3),
(305, 'Quinn', 'Darius', '2013-03-26', 3),
(306, 'Renata', 'Vidros', '2012-11-12', 3),
(401, 'Sylas', 'Stemmaguarda', '2009-01-21', 4),
(402, 'Tatu', 'thornmail', '2008-09-28', 4),
(403, 'Uivo', 'Warwick', '2009-01-01', 4),
(501, 'Venti', 'Nahida', '2010-02-22', 5),
(502, 'Wildduck', 'Burguer', '2011-05-19', 5),
(503, 'Xerath', 'Geladeiras', '2008-09-01', 5),
(504, 'Yena', 'Choi', '2011-04-11', 5),
(505, 'Zelda', 'Silva', '2010-02-12', 5);

INSERT INTO professor (id_prof, nome_prof, sobrenome_prof, materia) VALUES
(10, 'Rafael', 'Lopes', 'Portugues'),
(11, 'Jose', 'Cipriano', 'Mecanica'),
(12, 'Cintia', 'Akabane', 'Matematica'),
(13, 'Bruno', 'Medina', 'Sistemas Embarcados'),
(14, 'Volpiano', 'Jokes', 'Eletrica'),
(15, 'Carla', 'Fabiane', 'Logica de Programacao'),
(16, 'Vanessa', 'Felix', 'Banco de Dados'),
(17, 'Israel', 'Pinheiro', 'Desenvolvimento Web'),
(18, 'Sandra', 'Kiyotaka', 'Artes'),
(19, 'Berenice', 'Marques', 'Geografia'),
(20, 'Daniel', 'Bola', 'CNC');

INSERT INTO aulas_turma_1 (id_prof_fk, id_classe_fk) VALUES
(10, 1),
(11, 1),
(20, 1),
(16, 1),
(13, 1);

INSERT INTO aulas_turma_2 (id_prof_fk, id_classe_fk) VALUES
(12, 2),
(11, 2),
(20, 2),
(18, 2),
(19, 2);

INSERT INTO aulas_turma_3 (id_prof_fk, id_classe_fk) VALUES
(14, 3),
(15, 3),
(16, 3),
(18, 3),
(17, 3);

INSERT INTO aulas_turma_4 (id_prof_fk, id_classe_fk) VALUES
(13, 4),
(15, 4),
(20, 4),
(18, 4),
(11, 4);

INSERT INTO aulas_turma_5 (id_prof_fk, id_classe_fk) VALUES
(12, 5),
(15, 5),
(14, 5),
(16, 5),
(19, 5);

INSERT INTO aulas_turma_6 (id_prof_fk, id_classe_fk) VALUES
(10, 6),
(14, 6),
(16, 6),
(18, 6),
(20, 6);

INSERT INTO ocorrencias (id_aluno_fk, descricao) VALUES
(101, 'Briga fisica com o aluno id = 403'),
(108, 'Desrespeito com o professor id = 20'),
(202, 'Uso de celular sem autorizacao'),
(305, 'Bullying com o aluno id = 401'),
(403, 'Briga fisica com o aluno id = 101'),
(505, 'Pego com itens inadequados');
