create database boletim;

use boletim;
-- drop database boletim;

create table alunos(
aluno_id int primary key auto_increment,
nome_aluno varchar(255),
data_nascimento varchar(255),
endereco varchar(255),
numero varchar(255),  
bairro varchar(255),
cidade varchar(55),
estado varchar(25), 
cep varchar(25), 
telefone varchar(25), 
email varchar(255),
responsavel varchar(255),
 telefone_responsavel varchar(255)
);

INSERT INTO alunos (nome_aluno, email, telefone_responsavel)
VALUES 
('ADRÍCIA NAINE COSTA BANDEIA FERREIRA
', 'adriciaferreira629439@alunosenac.com', '97106-3200
'), 
 ('AIRTON SAMUEL RODRIGUES COSTA', 'airtoncosta639408@alunosenac.com', '983377811'),
 ('ALICE GABRIELLE DE OLIVEIRA ALMEIDA', 'alicealmeida226473@alunosenac.com', '983377811'),
('BRUNO RAFAEL SILVA COSTA', 'brunocosta538476@alunosenac.com', '(81) 99670-2599'),
('CAIO CESAR SILVA', 'caiomelo049474@alunosenac.com', '(81) 98715-9399'),
('CAIO MULLER SILVA DA ROCHA', 'caiorocha562460@alunosenac.com', '987775350'),
('DANIEL HENRIQUE JOSÉ DOS SANTOS', 'daniehenri333@gmail.com', '993838094'),
('DAVI FELIX MARINHO', 'davi1103felix@gmail.com', '(81) 98760-5491'),
('DAVI NEVES GALVÃO', 'davinevesgalvao@gmail.com', '(81) 98620-6318'),
('DIOGENES LUIZ FREITAS BATISTA', 'diogenesluiz2028@gmail.com', '(81) 99786-5657'),
('EDUARDO PASSOS DE ANDRADE', 'edupassosa18@gmail.com', '987892145'),
('GABRIELA LIMA ALEXANDRINA', 'gabrielalimafg0102@gmail.com', '(81) 98689-1037'),
('GEOVANA NOEMI FERREIRA', 'geovananoemi2009moura@gmail.com', '(81) 98665-2964'),
('GUILHERME JOSÉ RODRIGUES DE FREITAS', 'jailsonrodriguesdesouza62@gmail.com', '991432039'),
('ÍCARO GABRIEL BRAGA DOS ANJOS', 'caroanjos332404@alunosenac.com', '999702111'),
('JOÃO HENRIQUE SANTANA CUNHA', 'joao1809.18@gmail', '0000000000'),
('LAYZA CRISTINA MELO SANTOS', 'layza.melo.santos@gmail.com', '98213-1305'),
('LIGIA VITÓRIA LINHARES DO NASCIMENTO', 'ligianascimento843485@alunosenac.com', '0000000000'),
('LUCAS MIGUEL BARBOSA DA SILVA', 'layza.melo.santos@gmail.com', '98213-1305'),
('LUIZ HENRIQUE DOS SANTOS', 'lucasmiguelbsilva@gmail.com', '996580922'),
('MARCOS VASCONCELOS DENCKER BELTRÃO', 'marcosvdencker@gmail.com', '99791-5135'),
('MARIA CAROLINA FRANCO DE LIMA LEITE', 'mariacarolinafrancodelimaleite@gmail.com', '99555-4304'),
('MARIA MANOELA HELENA DA SILVA', 'mariamanuela9206@gmail.com', '98697-4152'),
('MATHEUS DE ANDRADE CORDEIRO MALAFAIA GOMES', 'matheusacmg@gmail.com', '(81) 98864-9730');




select * from alunos;

create table professores(
professor_id int primary key auto_increment,
nome_professor varchar(255),
data_nascimento varchar(255),
endereco varchar(255),
numero varchar(255),  
bairro varchar(255),
cidade varchar(55),
estado varchar(25), 
cep varchar(25), 
telefone varchar(25), 
email varchar(255),
responsavel varchar(255),
 telefone_responsavel varchar(255)
);


CREATE TABLE disciplinas (
    id_disciplina INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL
);
-- Disciplinas inseridas na Tabela para retorno do Banco
insert into disciplinas(nome) values("LÍNGUA PORTUGUSESA"),
("LITERATURA"),
("PRODUÇÃO TEXTUAL"),
("MATEMÁTICA"),
("GEOGRAFIA"),
("HISTÓRIA"),
("INGLÊS"),
("FORMAÇÃO PROFIS."),
("PROJETO DE VIDA"),
("PROGRAMAÊ"),
("FILOSOFIA"),														
("QUÍMICA"),													
("ARTES"),												
("FÍSICA"),												
("BIOLOGIA");

-- drop table professores;

CREATE TABLE notas (
    id_nota INT PRIMARY KEY AUTO_INCREMENT,
    id_disciplina INT,
    aluno_id INT,
    unidade INT,
    av1 VARCHAR(10),
    av2 VARCHAR(10),
    conceito VARCHAR(10),
    pos_noa VARCHAR(10),
    FOREIGN KEY (id_disciplina) REFERENCES disciplinas(id_disciplina),
    FOREIGN KEY (aluno_id) REFERENCES alunos(aluno_id)
   
);
select * from notas;







-- Um aluno pode estar matriculado em várias disciplinas (Aluno_Disciplina.aluno_id para Aluno.aluno_id).
-- Uma disciplina pode ter vários alunos matriculados (Aluno_Disciplina.disciplina_id para Disciplinas.disciplina_id).
-- Uma disciplina tem um professor responsável (Aluno_Disciplina.professor_id para Professores.professor_id).
-- Um aluno está em apenas uma turma (Aluno.turma para Turmas.turma_id).


-- aluno_disciplina_id (chave primária)
-- aluno_id (chave estrangeira)
-- disciplina_id (chave estrangeira)
-- nota
-- professor_id