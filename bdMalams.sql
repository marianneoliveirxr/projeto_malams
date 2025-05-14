create database bdMalams; -- Criação do Banco de Dados
use bdMalams; -- Utilizar o Banco para poder criar tabelas e inserir dados

-- set autocommit = 0; -- Desabilita o commit automático durante o desenvolvimento do Banco
start transaction; -- Inicia o protejo do Banco de Dados

-- Criação da tabela permissões - administrador, funcionário e cliente
create table permissoes(
idPermissao int auto_increment not null, -- Cria um número de ID automático e não nulo
permissao enum('cliente', 'funcionario', 'administrador'), -- Definindo as permissões
primary key (idPermissao) -- Definindo que o idPermissoes é uma PK
);

-- Criação da tabela com informações úteis e necessárias para cadastro dos clientes
create table users(
idUser int auto_increment not null, -- Cria um número de ID automático e não nulo
idPermissao int not null, -- Insere o ID de uma tabela que faz conexão com a tabela atual, FK
nomeUser varchar(50) not null, -- Identificação do cliente
cpfUser varchar(20) not null, -- O registro do CPF evita que o sistema crie clientes em duplicidade
dataNascimento date, -- Identificação para envio de mensagens de parabéns ao cliente
celularUser varchar(20) not null, -- Comunicação com o cliente, confirmação de presença nos agendamentos
emailUser varchar(50) not null, -- Confirmação de cadastro
senhaUser varbinary(255) not null, -- Proteção do login do cliente
primary key (idUser), -- Definindo que o idUser é uma PK
foreign key (idPermissao) references permissoes(idPermissao) -- Definindo que o idPermissoes é uma FK nesta tabela
);

-- Criação da tabela com informações úteis e necessárias para cadastro das categorias
create table categorias(
idCategoria int auto_increment not null, -- Cria um número de ID automático e não nulo
categoria varchar(100), -- Descrição da categoria
primary key (idCategoria) -- Definindo que o idCategoria é uma PK
);

-- Criação da tabela com informações úteis e necessárias para cadastro dos serviços oferecidos
create table servicos(
idServico int auto_increment not null, -- Cria um número de ID automático e não nulo
idCategoria int not null, -- Insere o ID de uma tabela que faz conexão com a tabela atual, FK
servico varchar(100), -- Descrição do serviço prestado para a categoria
preco decimal (5, 2) not null, -- Permite que o preço definico no sistema seja em decimal, tendo 5 casas antes da vírgula e 2 após
primary key (idServico), -- Definindo que o idServico é uma PK
foreign key (idCategoria) references categorias(idCategoria) -- Definindo que o idCategoria é uma FK nesta tabela
);

-- Criação da tabela com informações úteis e necessárias para cadastro dos funcionários
create table funcionarios(
idFuncionario int auto_increment not null, -- Cria um número de ID automático e não nulo
idPermissao int not null, -- Insere o ID de uma tabela que faz conexão com a tabela atual, FK
idCategoria int not null, -- Insere o ID de uma tabela que faz conexão com a tabela atual, FK
nomeFuncionario varchar(50) not null, -- Identificação de um funcionário
emailFuncionario varchar(50) not null,  -- Confirmação de cadastro do sistema e comunicação com o funcionário com atualizações na plataforma ou avisos do salão
celularFuncionario varchar(20), -- Confirmação de cadastro e contato com o cliente caso seja necessário
cpfFuncionario varchar(20), -- O registro do CPF evita que o sistema crie funcionários em duplicidade
senhaFuncionario varbinary(255) not null, -- Proteção do login do funcionário
primary key (idFuncionario), -- Definindo o que o idFuncionario é uma PK
foreign key (idPermissao) references permissoes(idPermissao), -- Definindo que o idPermissoes é uma FK nesta tabela
foreign key (idCategoria) references categorias(idCategoria) -- Definindo que o idCategoria é uma FK nesta tabela
);

-- Criação da tabela com informações úteis e necessárias para cadastro do formato de agendamentos
create table agendamentos(
idAgendamento int auto_increment not null, -- Cria um número de ID automático e não nulo
idServico int not null, -- Insere o ID de uma tabela que faz conexão com a tabela atual, FK
idFuncionario int not null, -- Insere o ID de uma tabela que faz conexão com a tabela atual, FK
idUser int not null, -- Insere o ID de uma tabela que faz conexão com a tabela atual, FK
dataAgendamento date not null, -- Data 
hora time not null, -- Definição do horário marcado para cada atendimento/agendamento
statusAgendamento varchar(20) not null, -- Status de se o agendamento está ativo ou pendente, se o agendamento está completo
confirmacao enum('sim', 'nao') not null, -- Confirmação direta do cliente, o sim ou não final
primary key (idAgendamento), -- Definindo o que o idAgendamento é uma PK
foreign key (idServico) references servicos(idServico), -- Definindo que o idServico é uma FK nesta tabela
foreign key (idFuncionario) references funcionarios(idFuncionario), -- Definindo que o idFuncionario é uma FK nesta tabela
foreign key (idUser) references users(idUser) -- Definindo o que o idCliente é uma FK nesta tabela
);

-- CRUD de permissoes
insert into permissoes (permissao) values
('cliente'),
('funcionario'),
('administrador');
select * from permissoes where idPermissao = 2;
update permissoes set permissao = '' where idPermissao = 2;
delete from permissoes where idPermissao = 1;

-- CRUD de users
insert into users (idPermissao, nomeUser, cpfUser, dataNascimento, celularUser, emailUser, senhaUser) values
(1, 'João Silva', 12345678901, '1990-05-20', '91999999999', 'joao@email.com', binary 'senha123'),
(1, 'Maria Oliveira', 10987654321, '1985-09-15', '91998888888', 'maria@email.com', binary 'senha456'),
(2, 'Pedro Costa', 11223344556, '1992-02-28', '91997777777', 'pedro@email.com', binary 'senha789');
select * from users where idUser = 1;
update users set nomeUser = '' where idUser = 2;
delete from users where idUser = 1;

-- CRUD de categorias
insert into categorias (categoria) values
('Cabelo'),
('Penteado'),
('Manicure e Pedicure');
select * from categorias where idCategoria = 1;
update categorias set categoria = '' where idCategoria = 2;
delete from categorias where idCategoria = 1;

-- CRUD de servicos
insert into servicos (idCategoria, servico, preco) values
(1, 'luzes', 50.00), -- Cabelo
(2, 'coque', 120.00), -- Penteado
(3, 'Francesinha', 30.00); -- Manicure e Pedicure
select * from servicos;
update servicos set preco = '' where idServicos = 2;
delete from servicos where idServicos = 1;

-- CRUD de funcionarios
insert into funcionarios (idPermissao, idCategoria, nomeFuncionario, emailFuncionario, celularFuncionario, cpfFuncionario, senhaFuncionario) values
(2, 1, 'Carlos Souza', 'carlos@email.com', '91996666666', '23456789012', binary 'funcionario123'),
(2, 2, 'Ana Pereira', 'ana@email.com', '91995555555', '22334455667', binary 'funcionario456'),
(3, 3, 'Lucia Almeida', 'lucia@email.com', '91994444444', '22334455678', binary 'admin123'),
(3, 3, 'Julia Almeida', 'julia@email.com', '91994444444', '22334455678', binary 'admin123'),
(2, 3, 'Joana', 'joana@email.com', '91994444444', '22334455678', binary 'admin123');
select * from funcionarios; -- where idFuncionario = 1;
update funcionarios set nomeFuncionario = '' where idFuncionario = 2;
delete from funcionarios where idFuncionario = 1;

-- CRUD de agendamentos
insert into agendamentos (idServico, idFuncionario, idUser, dataAgendamento, hora, statusAgendamento, confirmacao) values
(1, 1, 1, '2025-04-20', '14:00:00', 'ativo', 'sim'),
(2, 2, 2, '2025-04-21', '15:30:00', 'pendente', 'nao'),
(3, 3, 3, '2025-04-22', '09:00:00', 'ativo', 'sim');
select * from agendamentos where idAgendamento = 3;
select * from agendamentos;
update agendamentos set confirmacao = '' where idAgendamento = 2;
delete from agendamentos where idAgendamento = 1;

show tables; -- Mostra todas as tabelas criadas
rollback; -- Retorna/Desfaz alterações feitas
commit; -- Salva no disco alterações feitas, após utilizar ele, não é possível utilizar a ação rollback
drop database bdMalams; -- APAGA o Banco de dados