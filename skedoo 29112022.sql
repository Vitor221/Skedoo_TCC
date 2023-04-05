create database db_skedoo;
use db_skedoo;

create table if not exists tb_uf(
sg_uf CHAR(2) not null,
nm_uf VARCHAR(30),
constraint pk_uf
	primary key(sg_uf));
    
    select * from tb_uf;
    
create table if not exists tb_cidade(
cd_cidade INT not null,
nm_cidade VARCHAR(45),
sg_uf CHAR(2),
constraint pk_cidade
	primary key(cd_cidade),
		constraint fk_cidade_uf
			foreign key(sg_uf)
				references tb_uf(sg_uf));
                
 select * from tb_cidade;
                
create table if not exists tb_bairro(
cd_bairro INT not null,
nm_bairro VARCHAR(45),
cd_cidade INT,
constraint pk_bairro
	primary key(cd_bairro),
constraint fk_bairro_cidade
	foreign key(cd_cidade)
		references tb_cidade(cd_cidade));
        
create table if not exists tb_endereco(
cd_endereco int not null,
nm_endereco VARCHAR(100),
cd_cep INT,
cd_bairro int,
cd_numcasa INT,
constraint pk_endereco
	primary key(cd_endereco),
constraint fk_endereco_bairro
	foreign key(cd_bairro)
		references tb_bairro(cd_bairro)
);

create table if not exists tb_cadastro(
cd_cadastro INT not null,
nm_login VARCHAR(45),
cd_senha VARCHAR(20),
constraint pk_cadastro
	primary key(cd_cadastro));
select * from tb_cadastro;

create table if not exists tb_forma_pagamento(
cd_forma_pagamento int not null,
nm_forma_pagamento varchar(15),
constraint pk_forma_pagamento
	primary key (cd_forma_pagamento));

create table if not exists tb_status_pagamento(
cd_status_pagamento int not null,
nm_status_pagamento varchar (10),
constraint pk_status_pagamento
	primary key (cd_status_pagamento));

create table if not exists tb_pagamento(
cd_pagamento INT not null,
cd_responsavel INT,
vl_fatura DECIMAL(9,2),
dt_pagamento DATE,
cd_forma_pagamento INT,
cd_status_pagamento INT,
constraint pk_pagamento
	primary key(cd_pagamento),
constraint fk_forma_pagamento_pagamento
	foreign key (cd_forma_pagamento)
		references tb_forma_pagamento(cd_forma_pagamento),
constraint fk_status_pagamento_pagamento
	foreign key (cd_status_pagamento)
		references tb_status_pagamento(cd_status_pagamento)
);

create table if not exists tb_responsavel(
cd_responsavel int not null,
nm_responsavel varchar(80),
cd_cpf char(11),
cd_endereco int,
cd_cadastro int,
constraint pk_responsavel
	primary key(cd_responsavel),
constraint fk_responsavel_endereco
	foreign key(cd_endereco)
		references tb_endereco(cd_endereco),
constraint fk_responsavel_cadastro
	foreign key(cd_cadastro)
		references tb_cadastro(cd_cadastro)
);

create table if not exists tb_login(
cd_login INT not null,
nm_login VARCHAR(45),
cd_senha VARCHAR(20),
cd_responsavel int,
constraint pk_login
	primary key(cd_login),
	constraint fk_login_responsavel
		foreign key (cd_responsavel)
			references tb_responsavel(cd_responsavel));
   select * from tb_login; 
   




create table if not exists tb_turma(
cd_turma INT not null,
nm_turma VARCHAR(15),
ds_periodo VARCHAR(30),
constraint pk_turma
	primary key(cd_turma)
);

create table if not exists tb_instituicao(
cd_instituicao int not null,
nm_instituicao varchar(80),
cd_cnpj char(14),
cd_cep char(8),
cd_profissional int,
nm_email varchar(100),
cd_contato int,
cd_endereco int,
cd_cadastro int,
cd_pagamento int,
constraint pk_instituicao
	primary key(cd_instituicao),
constraint fk_instituicao_endereco
	foreign key(cd_endereco)
		references tb_endereco(cd_endereco),
constraint fk_instituicao_cadastro
	foreign key(cd_cadastro)
		references tb_cadastro(cd_cadastro),
constraint fk_instituicao_pagamento
	foreign key(cd_pagamento)
		references tb_pagamento(cd_pagamento)
);

create table if not exists tb_aluno (
cd_aluno int not null,
nm_aluno varchar(80),
dt_nascimento date,
cd_certidao varchar(32),
im_vacinacao blob(16),
im_aluno blob(16),
cd_contato char(14),
cd_turma int,
cd_instituicao int,
cd_responsavel int,
constraint pk_aluno
	primary key(cd_aluno),
constraint fk_aluno_turma
	foreign key(cd_turma)
		references tb_turma(cd_turma),
constraint fk_aluno_instituicao
	foreign key(cd_instituicao)
		references tb_instituicao(cd_instituicao),
constraint fk_aluno_responasvel
	foreign key(cd_responsavel)
		references tb_responsavel(cd_responsavel)
);

create table if not exists tb_profissional(
cd_profissional int not null,
nm_profissional varchar(80),
cd_cpf char(11),
nm_funcao varchar(45),
cd_turma int,
cd_cadastro int,
cd_instituicao int,
constraint pk_profissional
	primary key(cd_profissional),
constraint fk_profissional_turma
	foreign key(cd_turma)
		references tb_turma(cd_turma),
constraint fk_profissional_cadastro
	foreign key(cd_cadastro)
		references tb_cadastro(cd_cadastro),
constraint fk_profissional_instituicao
	foreign key(cd_instituicao)
		references tb_instituicao(cd_instituicao)
);
   
    
create table if not exists tb_contato(
cd_contato int not null,
cd_telefone varchar(11),
ds_contato varchar(100),
cd_instituicao int,
cd_responsavel int,
constraint pk_contato
	primary key(cd_contato),
constraint fk_contato_instituicao
	foreign key(cd_instituicao)
		references tb_instituicao(cd_instituicao),
constraint fk_contato_responsavel
	foreign key(cd_responsavel)
		references tb_responsavel(cd_responsavel)
);

select * from tb_contato;



create table if not exists tb_mensagem (
cd_mensagem int not null,
ds_mensagem varchar(200),
dt_mensagem date,
hr_mensagem datetime,
cd_instituicao int,
cd_responsavel int,
cd_profissional int,
constraint pk_mensagem
	primary key(cd_mensagem),
constraint fk_mensagem_instituicao
	foreign key(cd_instituicao)
		references tb_instituicao(cd_instituicao),
constraint fk_mensagem_responsavel
	foreign key(cd_responsavel)
		references tb_responsavel(cd_responsavel),
constraint fk_mensagem_profissional
	foreign key(cd_profissional)
		references tb_profissional(cd_profissional)
);

create table if not exists tb_responsavel_aluno(
cd_responsavel int,
cd_aluno int,
constraint fk_responsavel_aluno_responsavel
	foreign key(cd_responsavel)
		references tb_responsavel(cd_responsavel),
constraint fk_responsavel_aluno_aluno
	foreign key(cd_aluno)
		references tb_aluno(cd_aluno)
);

/*DADOS*/

Insert Into tb_uf Values
 ('AC','Acre'),  
 ('AL','Alagoas'),
 ('AM','Amazonas'),
 ('AP','Amapá'),
 ('BA','Bahia'),
 ('CE','Ceará'),
 ('DF','Distrito Federal'),
 ('ES','Espírito Santo'),
 ('GO','Goiás'),
 ('MA','Maranhão'),
 ('MG','Minas Gerais'),
 ('MS','Mato Grosso do Sul'),
 ('MT','Mato Grosso'),
 ('PA','Pará'),
 ('PB','Paraíba'),
 ('PE','Pernambuco'),
 ('PI','Piauí'),
 ('PR','Paraná'),
 ('RJ','Rio de Janeiro'),
 ('RN','Rio Grande do Norte'),
 ('RO','Rondônia'),
 ('RR','Roraima'),
 ('RS','Rio Grande do Sul'),
 ('SC','Santa Catarina'),
 ('SE','Sergipe'),
 ('SP','São Paulo'),
 ('TO','Tocantins');
 
 insert into tb_forma_pagamento (cd_forma_pagamento, nm_forma_pagamento) values
 (1 , 'Á vista'),
 (2 , 'A prazo');
 
 insert into tb_status_pagamento (cd_status_pagamento, nm_status_pagamento) values
 (1, 'Pago'),
 (2, 'A Pagar'),
 (3, 'Atrasado');
 
 insert into tb_cidade values
 (10101010, 'São Vicente','SP');
 
 insert into tb_bairro (cd_bairro, nm_bairro, cd_cidade) values
 (101, "Catiapoa",10101010),
 (102, "Centro" ,10101010),
 (103,"Cidade Naútica",10101010),
 (104,"Conjunto Residencial Humaitá",10101010),
 (105,"Conjunto Residencial Tancredo Neves",10101010),
 (106,"Esplanada dos Barreiros",10101010),
 (107,"Jardim Guassu",10101010),
 (108,"Jardim Irmã Dolores",10101010),
 (109,"Jardim Rio Branco",10101010),
 (110,"Morro dos Barbosas",10101010),
 (111,"Parque Continental",10101010),
 (112,"Parque das Bandeiras",10101010),
 (113,"Parque São Vicente",10101010),
 (114,"Samarita",10101010),
 (115,"Vila Cascatinha",10101010),
 (117,"Vila Jockei Clube",10101010),
 (118,"Vila Margarida",10101010),
 (119,"Vila Mateo Bei",10101010),
 (120,"Vila Nova São Vicente",10101010),
 (121, "Vila Valença",10101010);
 
 insert into tb_endereco (cd_endereco, nm_endereco, cd_cep, cd_numcasa, cd_bairro) values
 (1001,	"Rua Eliézer Lopes Fernandes", 11370280,738,101),
 (1002,	"Praça Vinte e Dois de Janeiro 336", 11310921, 141, 102),
 (1003,	"Rua José Joaquim de Azevedo", 11355040, 695, 103),
(1004, "Rua Antonio Pacífico", 11349285, 686, 104),
 (1005,	"Rua Luís Esteves Cordeiro"	, 11350410, 268, 105),
 (1006,	"Rua Pio XII" ,	11340080, 100, 106),
 (1007,"Avenida Antônio Emmerick", 11370001, 712, 107),
 (1008, "Rua Jacobina",	11347665, 959, 108),
 (1009, "Rua José Fagundes Bezerra", 11347070, 554, 109),
 (1010, "Avenida Presidente Getúlio Vargas", 11310100, 620, 110),
 (1111, "Rua Oito", 11348440, 773, 111),
 (1112, "Rua Cid dos Santos" ,11346240 ,253 ,112),
 (1113, "Parque São Vicente", 11355480, 195, 113),
 (1114, "Rua Mecanizada Nove Mil Cento e Vinte e Oito", 11345605, 898, 114),
 (1115, "Avenida Mota Lima", 11370100, 596, 115),
 (1116, "Avenida Doutor Mário Covas Júnior", 11360560, 387, 117),
 (1118, "Rua Vinte", 11330821, 186, 118),
 (1119, "Rua Professor Carlos Araújo dos Santos", 11330030, 303, 119),
 (1120, "Rua Celeste Diegues Oliveira", 11346350, 629, 120),
 (1121, "Rua Pero Lopes de Souza", 11390130, 697, 121);
 


 insert into tb_responsavel (cd_responsavel, nm_responsavel, cd_cpf) values
 (1,	"Lorenzo Calebe Caio Assis"	,"13892962880"),
 (2,	"Nair Giovana Aline Fogaça", "74221965800"),
(3,	"Rafael Thiago César Figueiredo", "08400249836"),
(4,	"Aurora Patrícia Daniela Rezende", "39300635816"),
(5,	"Rita Carolina Almeida", "88789801881"),
(6,	"Paulo Luan Iago Silva", "65131198801"),
(7,	"Sabrina Andrea Maitê Cavalcanti", "09317647855"),
(8,	"Murilo Tomás Barros", "26426338885"),
(9,	"Antônia Nina Ayla Gonçalves", "08423180891"),
(10,	"Geraldo Henry Jesus", "55323152800"),
(11,	"Felipe José Heitor da Paz", "07797264805"),
(12,	"Adriana Mariana Emily Lima", "67168686828"),
(13,	"Roberto Daniel Vieira"	, "87236269840"),
(14,	"Luna Simone Viana"	, "36673426837"),
(15,	"Clarice Clara Aparecida Ribeiro", "87428338840"),
(16,	"Marcela Maya de Paula", "68879373870"),
(17,	"Márcia Natália Silveira", "28805996874"),
(18,	"Victor Guilherme da Conceição", "42695254873"),
(19,	"Allana Luna Vera Santos", "95953581858"),
(20,	"Mariana Joana Renata Cardoso", "72071287894"),
(21,	"Thiago Victor Nascimento", "62149942828"),
(22,	"Eduardo Renato", "42828621499"),
(23,	"Letícia Aline Pereira", "06187684834"),
(24,	"Sandra Márcia Corte Real", "25581754837"),
(25,	"Caroline Alana da Mota", "73655519842"),
(26,	"Guilherme Vicente Alves", "99988831803"),
(27,	"Vanessa Amanda Fernandes", "84851101880"),
(28,	"Rodrigo Lucca Severino Baptista", "27915360868"),
(29,	"Aurora Isabel Sophie Novaes", "32082060896"),
(30,	"Lara Rebeca Silvana Castro", "59223271860"),
(31,	 "Cauã Fábio Gonçalves", "25584044822"),
(32,	"Cristiane Joana Mariane Martins", "48524041862"),
(33,	"Daiane Louise Ester Galvão", "27918597800"),
(34,	"Kamilly Flávia Fernandes", "26503754850"),
(35,	"Filipe Vitor Yago das Neves", "38873820808"),
(36,	"Carla Vitória Cardoso", "30073505811"),
(37,	"Enrico Lucas Breno Ribeiro", "89903287801"),
(38,	"Tomás Thomas Santos", "49586838870"),
(39,	"Esther Isabel Ferreira", "73237451878"),
(40,	"Elza Camila Vieira", "75692045818"),
(41,	 "Julia Emilly Moura", "84639088884"),
(42,	"Vinicius Miguel da Mota", "11801063850"),
(43, "Sérgio Kaique da Conceição", "26707073869"),
(44,	"Diego Joaquim Calebe Gomes", "05515855876"),
(45,	"Caroline Sabrina Sophia Pires", "42029655821"),
(46,	"Enzo Benedito Almeida", "75337155865"),
(47,	"Eduardo Sérgio Silva", "07411943843"),
(48,	"Emanuelly Teresinha Yasmin Porto", "26572962890"),
(49,	 "Alice Caroline da Rocha", "60401320863"),
(50,	"Raimunda Isabelle Esther Dias", "70983823880");

 select * from tb_responsavel;

update	tb_responsavel	set	cd_endereco	=	1005	where	cd_responsavel	=	1	;
update	tb_responsavel	set	cd_endereco	=	1111	where	cd_responsavel	=	2	;
update	tb_responsavel	set	cd_endereco	=	1004	where	cd_responsavel	=	3	;
update	tb_responsavel	set	cd_endereco	=	1006	where	cd_responsavel	=	4	;
update	tb_responsavel	set	cd_endereco	=	1119	where	cd_responsavel	=	5	;
update	tb_responsavel	set	cd_endereco	=	1004	where	cd_responsavel	=	6	;
update	tb_responsavel	set	cd_endereco	=	1115	where	cd_responsavel	=	7	;
update	tb_responsavel	set	cd_endereco	=	1118	where	cd_responsavel	=	8	;
update	tb_responsavel	set	cd_endereco	=	1116	where	cd_responsavel	=	9	;
update	tb_responsavel	set	cd_endereco	=	1001	where	cd_responsavel	=	10	;
update	tb_responsavel	set	cd_endereco	=	1002	where	cd_responsavel	=	11	;
update	tb_responsavel	set	cd_endereco	=	1010	where	cd_responsavel	=	12	;
update	tb_responsavel	set	cd_endereco	=	1007	where	cd_responsavel	=	13	;
update	tb_responsavel	set	cd_endereco	=	1118	where	cd_responsavel	=	14	;
update	tb_responsavel	set	cd_endereco	=	1010	where	cd_responsavel	=	15	;
update	tb_responsavel	set	cd_endereco	=	1113	where	cd_responsavel	=	16	;
update	tb_responsavel	set	cd_endereco	=	1010	where	cd_responsavel	=	17	;
update	tb_responsavel	set	cd_endereco	=	1118	where	cd_responsavel	=	18	;
update	tb_responsavel	set	cd_endereco	=	1121	where	cd_responsavel	=	19	;
update	tb_responsavel	set	cd_endereco	=	1115	where	cd_responsavel	=	20	;
update	tb_responsavel	set	cd_endereco	=	1003	where	cd_responsavel	=	21	;
update	tb_responsavel	set	cd_endereco	=	1005	where	cd_responsavel	=	22	;
update	tb_responsavel	set	cd_endereco	=	1002	where	cd_responsavel	=	23	;
update	tb_responsavel	set	cd_endereco	=	1001	where	cd_responsavel	=	24	;
update	tb_responsavel	set	cd_endereco	=	1009	where	cd_responsavel	=	25	;
update	tb_responsavel	set	cd_endereco	=	1113	where	cd_responsavel	=	26	;
update	tb_responsavel	set	cd_endereco	=	1119	where	cd_responsavel	=	27	;
update	tb_responsavel	set	cd_endereco	=	1118	where	cd_responsavel	=	28	;
update	tb_responsavel	set	cd_endereco	=	1113	where	cd_responsavel	=	29	;
update	tb_responsavel	set	cd_endereco	=	1116	where	cd_responsavel	=	30	;
update	tb_responsavel	set	cd_endereco	=	1114	where	cd_responsavel	=	31	;
update	tb_responsavel	set	cd_endereco	=	1009	where	cd_responsavel	=	32	;
update	tb_responsavel	set	cd_endereco	=	1118	where	cd_responsavel	=	33	;
update	tb_responsavel	set	cd_endereco	=	1008	where	cd_responsavel	=	34	;
update	tb_responsavel	set	cd_endereco	=	1009	where	cd_responsavel	=	35	;
update	tb_responsavel	set	cd_endereco	=	1006	where	cd_responsavel	=	36	;
update	tb_responsavel	set	cd_endereco	=	1009	where	cd_responsavel	=	37	;
update	tb_responsavel	set	cd_endereco	=	1120	where	cd_responsavel	=	38	;
update	tb_responsavel	set	cd_endereco	=	1121	where	cd_responsavel	=	39	;
update	tb_responsavel	set	cd_endereco	=	1120	where	cd_responsavel	=	40	;
update	tb_responsavel	set	cd_endereco	=	1001	where	cd_responsavel	=	41	;
update	tb_responsavel	set	cd_endereco	=	1003	where	cd_responsavel	=	42	;
update	tb_responsavel	set	cd_endereco	=	1006	where	cd_responsavel	=	43	;
update	tb_responsavel	set	cd_endereco	=	1002	where	cd_responsavel	=	44	;
update	tb_responsavel	set	cd_endereco	=	1002	where	cd_responsavel	=	45	;
update	tb_responsavel	set	cd_endereco	=	1114	where	cd_responsavel	=	46	;
update	tb_responsavel	set	cd_endereco	=	1114	where	cd_responsavel	=	47	;
update	tb_responsavel	set	cd_endereco	=	1121	where	cd_responsavel	=	48	;
update	tb_responsavel	set	cd_endereco	=	1006	where	cd_responsavel	=	49	;
update	tb_responsavel	set	cd_endereco	=	1112	where	cd_responsavel	=	50	;

insert into tb_pagamento (cd_pagamento, vl_fatura, dt_pagamento, cd_forma_pagamento, cd_status_pagamento, cd_responsavel) values
(111111, 650.51 ,'2022-02-21', 1, 1, 1),	
(111112, 650.51, '2022-02-26', 2, 2, 2),			
(111113, 650.51, '2022-02-28', 2, 3, 3),			
(111114, 650.51, '2022-02-27', 1, 1, 4),			
(111115, 650.51, '2022-02-24', 2, 1, 5),		
(111116, 650.51, '2022-02-23', 1, 1, 6),		
(111117, 650.51, '2022-02-22', 1, 1, 7),		
(111118, 650.51, '2022-02-21', 1, 1, 8),		
(111119, 650.51, '2022-02-21', 2, 1, 9),		
(111120, 650.51, '2022-02-27', 1, 1, 10),		
(111121, 650.51, '2022-02-28', 2, 2, 11),		
(111122, 650.51, '2022-02-25', 2, 2, 12),		
(111123, 650.51, '2022-02-25', 1, 2, 13),		
(111124, 650.51, '2022-03-03', 1, 1, 14),		
(111125, 650.51, '2022-02-20', 2, 1, 15),		
(111126, 650.51, '2022-02-24', 1, 3, 16),		
( 111127, 1100.52, '2022-03-03', 1, 3, 17),		
( 111128, 1100.52, '2022-03-03', 2, 3, 18),		
( 111129, 1100.52, '2022-03-03', 1, 1, 19),		
( 111130, 1100.52, '2022-03-03', 2, 2, 20),		
( 111131, 1100.52, '2022-03-03', 2, 1, 21),		
( 111132, 1100.52, '2022-03-03', 1, 1, 22),		
( 111133, 1100.52, '2022-03-03', 1, 1, 23),		
( 111134, 1100.52, '2022-03-03', 2, 1, 24),		
( 111135, 1100.52, '2022-03-03', 1, 1, 25),		
( 111136, 1100.52, '2022-03-04', 1, 2, 26),		
( 111137, 1100.52, '2022-03-04', 2, 1, 27),		
( 111138, 1100.52, '2022-03-04', 1, 3, 28),		
( 111139, 1100.52, '2022-03-04', 1, 3, 29),		
( 111140, 1100.52, '2022-03-04', 1, 1, 30),		
( 111141, 1100.52, '2022-03-04', 1, 1, 31),		
( 111142, 1100.52, '2022-03-04', 2, 1, 32),		
( 111143, 1100.52, '2022-03-04', 2, 1, 33),		
( 111144, 1100.52, '2022-03-07', 2, 1, 34),		
( 111145, 1100.52, '2022-03-07', 2, 1, 35),		
( 111146, 1100.52, '2022-03-07', 1, 1, 36),		
( 111147, 1100.52, '2022-03-07', 2, 1, 37),		
( 111148, 1100.52, '2022-03-07', 1, 2, 38),		
( 111149, 1100.52, '2022-03-07', 2, 1, 39),		
( 111150, 1100.52, '2022-03-07', 1, 1, 40),		
( 111151, 1100.52, '2022-03-07', 2, 1, 41),		
( 111152, 1100.52, '2022-03-07', 1, 1, 42),		
( 111153, 1100.52, '2022-03-07', 1, 1, 43),		
( 111154, 1100.52, '2022-03-07', 1, 1, 44),		
(111155, 1100.52, '2022-03-07', 2, 1, 45),		
(111156, 1100.52, '2022-03-07', 1, 1, 46),		
(111157, 1100.52, '2022-03-07', 2, 1, 47),		
(111158, 1100.52, '2022-03-07', 2, 1, 48),		
(111159, 1100.52, '2022-03-07', 1, 3, 49),		
(111160, 1100.52, '2022-03-07', 1, 3, 50),		
(111161, 1100.52, '2022-03-07', 2, 1, 51),		
(111162, 1100.52, '2022-03-07', 1, 1, 52);

select * from tb_responsavel;
select * from tb_pagamento;



select * from tb_pagamento;






select * from tb_pagamento;
	
select * from tb_pagamento;




 
insert into tb_login ( cd_login, nm_login, cd_senha, cd_responsavel) values
(200001, "lorenzo_assis", "w1TWu00PAe ", 1),		
(200002,"nair.giovana.fogaca", "y0q2jLPtna ", 2),		
(200003,"rafael_figueiredo", "8emoE95MsF ", 3),		
(200004,"aurora_patricia_rezende", "hxxQjBLEgl ", 4),		
(200005, "rita-almeida90","FKH90LsAUY ", 5),		
(200006, "paulo.luan.silva",		 "OY2RemGcxt ", 6),		
(200007, "sabrina-cavalcanti88", "wylA1oTnWL ", 7),	
(200008, "murilo.tomas.barros", "kot6QqlJql ", 8),		
(200009, "antonia_goncalves", "2GQiLMQdyK ", 9),		
(200010, "geraldohenryjesus", "dJpgOY4Yl8 ", 10),		
(200011, "felipejosedapaz", "wi9DOyLt77 ", 11),		
(200012, "adriana-lima84", "IlxJai02xT", 12),		
(200013, "roberto.daniel.vieira", "sr7Em9RHg0", 13),		
(200014, "luna_viana", "3j6SinGohz", 14),		
(200015, "clarice_ribeiro", "5C9L3509R9", 15),		
(200016, "marcela_depaula", "eG2wENmtO9", 16),		
(200017, "marcianataliasilveira", "M4JYcmWre5", 17),		
(200018, "victor-daconceicao90 ", "y6WEU0IsQ7", 18),		
(200019, "allana_santos ", "b3xDRX8YFi", 19),		
(200020, "mariana.joana.cardoso ", "MIAiadXjyU", 20),		
(200021, "thiagovictornascimento ", "Q3Hjuy5bfF", 21),		
(200022, "heloisa_jennifer_dossantos ", "5KIWGDrUqF", 22),		
(200023, "leticiaalinepereira ", "XO5Tydjrp3", 23),		
(200024, "sandra.marcia.cortereal ", "rK31MlHxP4", 24),		
(200025, "caroline-damota98 ", "YLRiFFuYCY", 25),		
(200026, "guilherme-alves85 ", "WRT3TmEsCf", 26),		
(200027, "vanessa-fernandes86 ", "6FyRCiGdRC", 27),		
(200028, "rodrigo-baptista73 ", "CCttXWAckW", 28),		
(200029, "aurora_novaes ", "0c8C5tCYy1", 29),		
(200030, "lara_castro ", "3ilHoTC7En", 30),		
(200031, "cauafabiogoncalves", "nIt9HDSt3f", 31),		
(200032, "cristiane-martins99 ", "f8HS4iT7xu", 32),		
(200033, "daiane_louise_galvao ", "mp9kZsDbMc", 33),		
(200034, "kamilly.flavia.fernandes ", "fDe6CfdsZq", 34),		
(200035, "filipe_dasneves ", "02TXhrGLfP", 35),		
(200036, "carla.vitoria.cardoso ", "N9gg3QiYfl", 36),		
(200037, "enrico-ribeiro79 ", "GLZD0rBOCR", 37),		
(200038, "tomasthomassantos ", "w6YZ0XoALf", 38),		
(200039, "esther_ferreira ", "NFJ7FRqL6D", 39),		
(200040, "elzacamilavieira ", "m1ay2AKcdw", 40),		
(200041, "julia_moura ", "eAgCGULfjH", 41),	
(200042, "vinicius_damota ", "eBkEWhDmng", 42),		
(200043, "sergio_kaique_daconceicao ", "CXg2OB7jkM", 43),		
(200044, "diego.joaquim.gomes ", "cznSQGXIiT", 44),		
(200045, "caroline_sabrina_pires ", "zqjMTBaxeF", 45),		
(200046, "enzobeneditoalmeida ", "opHW87Wa4H", 46),		
(200047, "eduardosergiosilva ", "ePXhkGLzyn", 47),		
(200048, "emanuelly-porto80 ", "rNESeosZNi", 48),		
(200049, "alice_darocha ", "mZAarEnC05", 49),		
(200050, "raimundaisabelledias ", "H6BxpM3o8Y", 50);			


		
        
insert into tb_cadastro ( cd_cadastro, nm_login, cd_senha) values
(200001, "lorenzo_assis", "w1TWu00PAe "),		
(200002,"nair.giovana.fogaca", "y0q2jLPtna "),		
(200003,"rafael_figueiredo", "8emoE95MsF "),		
(200004,"aurora_patricia_rezende", "hxxQjBLEgl "),		
(200005, "rita-almeida90","FKH90LsAUY "),		
(200006, "paulo.luan.silva",		 "OY2RemGcxt "),		
(200007, "sabrina-cavalcanti88", "wylA1oTnWL "),	
(200008, "murilo.tomas.barros", "kot6QqlJql "),		
(200009, "antonia_goncalves", "2GQiLMQdyK "),		
(200010, "geraldohenryjesus", "dJpgOY4Yl8 "),		
(200011, "felipejosedapaz", "wi9DOyLt77 "),		
(200012, "adriana-lima84", "IlxJai02xT"),		
(200013, "roberto.daniel.vieira", "sr7Em9RHg0"),		
(200014, "luna_viana", "3j6SinGohz"),		
(200015, "clarice_ribeiro", "5C9L3509R9"),		
(200016, "marcela_depaula", "eG2wENmtO9"),		
(200017, "marcianataliasilveira", "M4JYcmWre5"),		
(200018, "victor-daconceicao90 ", "y6WEU0IsQ7"),		
(200019, "allana_santos ", "b3xDRX8YFi"),		
(200020, "mariana.joana.cardoso ", "MIAiadXjyU"),		
(200021, "thiagovictornascimento ", "Q3Hjuy5bfF"),		
(200022, "heloisa_jennifer_dossantos ", "5KIWGDrUqF"),		
(200023, "leticiaalinepereira ", "XO5Tydjrp3"),		
(200024, "sandra.marcia.cortereal ", "rK31MlHxP4"),		
(200025, "caroline-damota98 ", "YLRiFFuYCY"),		
(200026, "guilherme-alves85 ", "WRT3TmEsCf"),		
(200027, "vanessa-fernandes86 ", "6FyRCiGdRC"),		
(200028, "rodrigo-baptista73 ", "CCttXWAckW"),		
(200029, "aurora_novaes ", "0c8C5tCYy1"),		
(200030, "lara_castro ", "3ilHoTC7En"),		
(200031, "cauafabiogoncalves", "nIt9HDSt3f"),		
(200032, "cristiane-martins99 ", "f8HS4iT7xu"),		
(200033, "daiane_louise_galvao ", "mp9kZsDbMc"),		
(200034, "kamilly.flavia.fernandes ", "fDe6CfdsZq"),		
(200035, "filipe_dasneves ", "02TXhrGLfP"),		
(200036, "carla.vitoria.cardoso ", "N9gg3QiYfl"),		
(200037, "enrico-ribeiro79 ", "GLZD0rBOCR"),		
(200038, "tomasthomassantos ", "w6YZ0XoALf"),		
(200039, "esther_ferreira ", "NFJ7FRqL6D"),		
(200040, "elzacamilavieira ", "m1ay2AKcdw"),		
(200041, "julia_moura ", "eAgCGULfjH"),	
(200042, "vinicius_damota ", "eBkEWhDmng"),		
(200043, "sergio_kaique_daconceicao ", "CXg2OB7jkM"),		
(200044, "diego.joaquim.gomes ", "cznSQGXIiT"),		
(200045, "caroline_sabrina_pires ", "zqjMTBaxeF"),		
(200046, "enzobeneditoalmeida ", "opHW87Wa4H"),		
(200047, "eduardosergiosilva ", "ePXhkGLzyn"),		
(200048, "emanuelly-porto80 ", "rNESeosZNi"),		
(200049, "alice_darocha ", "mZAarEnC05"),		
(200050, "raimundaisabelledias ", "H6BxpM3o8Y"),		
(200051, "Creche.ep ", "Gd9bMJtNn5"),		
(200052, "SC_cuida ", "7gPMDYY4pM"),
(200053, "Cristiane-Francisca", "r312osZNi"),		
(200054, "Manuela-Fabiana", "mvxerwrEnC05"),		
(200055, "Daiane-Lima", "H6BxpM3o8Y"),		
(200056, "Giovanna-Baptista", "Gd9b432n5"),		
(200057, "Fabiana-Marina", "7gPMD21pM"),		
(200058, "Betina-Gomes", "QWR47sZNi"),		
(200059, "Mirella-Sandra", "m231dfsxc05"),		
(200060, "Isabella-Sales", "HDSAD12o8Y"),		
(200061, "Ayla-Carolina", "G2RSADMNn5"),		
(200062, "Alice_Vieira", "123PMDYY4psM"),		
(200063, "Andreia-Barbosa", "ofd321ASD"),		
(200064, "Andrea-Alves", "cxzASEnC05"),		
(200065, "Isabelle-Cavalcanti", "BVCM3o8Y"),		
(200066, "Carlos-Santos", "5ASDJtNn5"),		
(200067, "Vinicius-Silva", "721AS4pM");

update	tb_responsavel	set	cd_cadastro	=	200001		where cd_responsavel	=	1	;
update	tb_responsavel	set	cd_cadastro	=	200002		where cd_responsavel	=	2	;
update	tb_responsavel	set	cd_cadastro	=	200003		where cd_responsavel	=	3	;
update	tb_responsavel	set	cd_cadastro	=	200004		where cd_responsavel	=	4	;
update	tb_responsavel	set	cd_cadastro	=	200005		where cd_responsavel	=	5	;
update	tb_responsavel	set	cd_cadastro	=	200006		where cd_responsavel	=	6	;
update	tb_responsavel	set	cd_cadastro	=	200007		where cd_responsavel	=	7	;
update	tb_responsavel	set	cd_cadastro	=	200008		where cd_responsavel	=	8	;
update	tb_responsavel	set	cd_cadastro	=	200009		where cd_responsavel	=	9	;
update	tb_responsavel	set	cd_cadastro	=	200010		where cd_responsavel	=	10	;
update	tb_responsavel	set	cd_cadastro	=	200011		where cd_responsavel	=	11	;
update	tb_responsavel	set	cd_cadastro	=	200012		where cd_responsavel	=	12	;
update	tb_responsavel	set	cd_cadastro	=	200013		where cd_responsavel	=	13	;
update	tb_responsavel	set	cd_cadastro	=	200014		where cd_responsavel	=	14	;
update	tb_responsavel	set	cd_cadastro	=	200015		where cd_responsavel	=	15	;
update	tb_responsavel	set	cd_cadastro	=	200016		where cd_responsavel	=	16	;
update	tb_responsavel	set	cd_cadastro	=	200017		where cd_responsavel	=	17	;
update	tb_responsavel	set	cd_cadastro	=	200018		where cd_responsavel	=	18	;
update	tb_responsavel	set	cd_cadastro	=	200019		where cd_responsavel	=	19	;
update	tb_responsavel	set	cd_cadastro	=	200020		where cd_responsavel	=	20	;
update	tb_responsavel	set	cd_cadastro	=	200021		where cd_responsavel	=	21	;
update	tb_responsavel	set	cd_cadastro	=	200022		where cd_responsavel	=	22	;
update	tb_responsavel	set	cd_cadastro	=	200023		where cd_responsavel	=	23	;
update	tb_responsavel	set	cd_cadastro	=	200024		where cd_responsavel	=	24	;
update	tb_responsavel	set	cd_cadastro	=	200025		where cd_responsavel	=	25	;
update	tb_responsavel	set	cd_cadastro	=	200026		where cd_responsavel	=	26	;
update	tb_responsavel	set	cd_cadastro	=	200027		where cd_responsavel	=	27	;
update	tb_responsavel	set	cd_cadastro	=	200028		where cd_responsavel	=	28	;
update	tb_responsavel	set	cd_cadastro	=	200029		where cd_responsavel	=	29	;
update	tb_responsavel	set	cd_cadastro	=	200030		where cd_responsavel	=	30	;
update	tb_responsavel	set	cd_cadastro	=	200031		where cd_responsavel	=	31	;
update	tb_responsavel	set	cd_cadastro	=	200032		where cd_responsavel	=	32	;
update	tb_responsavel	set	cd_cadastro	=	200033		where cd_responsavel	=	33	;
update	tb_responsavel	set	cd_cadastro	=	200034		where cd_responsavel	=	34	;
update	tb_responsavel	set	cd_cadastro	=	200035		where cd_responsavel	=	35	;
update	tb_responsavel	set	cd_cadastro	=	200036		where cd_responsavel	=	36	;
update	tb_responsavel	set	cd_cadastro	=	200037		where cd_responsavel	=	37	;
update	tb_responsavel	set	cd_cadastro	=	200038		where cd_responsavel	=	38	;
update	tb_responsavel	set	cd_cadastro	=	200039		where cd_responsavel	=	39	;
update	tb_responsavel	set	cd_cadastro	=	200040		where cd_responsavel	=	40	;
update	tb_responsavel	set	cd_cadastro	=	200041		where cd_responsavel	=	41	;
update	tb_responsavel	set	cd_cadastro	=	200042		where cd_responsavel	=	42	;
update	tb_responsavel	set	cd_cadastro	=	200043		where cd_responsavel	=	43	;
update	tb_responsavel	set	cd_cadastro	=	200044		where cd_responsavel	=	44	;
update	tb_responsavel	set	cd_cadastro	=	200045		where cd_responsavel	=	45	;
update	tb_responsavel	set	cd_cadastro	=	200046		where cd_responsavel	=	46	;
update	tb_responsavel	set	cd_cadastro	=	200047		where cd_responsavel	=	47	;
update	tb_responsavel	set	cd_cadastro	=	200048		where cd_responsavel	=	48	;
update	tb_responsavel	set	cd_cadastro	=	200049		where cd_responsavel	=	49	;
update	tb_responsavel	set	cd_cadastro	=	200050		where cd_responsavel	=	50	;		        

alter table tb_turma 
	modify column nm_turma VARCHAR(50);

insert into tb_turma (cd_turma, nm_turma, ds_periodo) values
(123,	"Junior Infantil", "Manhã"),		
(321,	"Segundo Infantil", "Tarde"),		
(147,	"Infantil Master", "Integral");

select * from tb_aluno;

insert into tb_instituicao (cd_instituicao, nm_instituicao, cd_cnpj, cd_cep, nm_email, cd_cadastro , cd_pagamento ,cd_contato,	 cd_endereco) values
(90001,	"Pedro e Elaine Creche ME", 67663269000129, '11310921', "pe.creche@hotmail.com", 200051, 111161, 11161, 1002),
(90002,	"Silvana e Carolina Cuida Ltda", 00530859000102, '11349285', "Cuida_creche@hotmail.com", 200052, 111162, 11162, 1004);	

insert into tb_aluno (cd_aluno, nm_aluno, dt_nascimento, cd_certidao, cd_turma, cd_contato, cd_instituicao, cd_responsavel) values
(1000001, "Olivia Francisca Marcela Barbosa", '2019-04-13', '27838601552018142389640541258941', 123, 11159, 90001, 1),	
(1000002, "Pietro Paulo Assunção", '2019-05-14' , '19067201552022149175876147902901', 321, 11111 , 90001, 2),
(1000003, "Nicole Benedita Araújo", '2018-01-02', '22454301552015192012866818453511', 321, 11112, 90002, 3),
(1000004, "Guilherme Osvaldo Paulo da Paz", '2020-07-01', '2776760155201214366679096791113', 147, 11113, 90001, 4),		
(1000005, "Cláudio Arthur Nelson Souza", '2019-05-21', '21447101552019138206926529142811', 147, 11114, 90002, 5),
(1000006, "Silvana Clarice Isabel Farias", '2019-07-04', '29655401552017120405398956206315', 123, 11115, 90001 , 6),				
(1000007, "Anthony Filipe Bruno Drumond", '2019-07-14', '29685801552019164100651908366447', 321, 11116, 90001, 7),				
(1000008, "Pietra Rebeca dos Santos", '2019-02-10', '15544001552011171897952609631211', 321, 11117, 90002, 8),				
(1000009, "Isaac Tomás Moreira", '2019-03-03', '19299401552012166034195190866854', 321, 11118, 90001, 9),				
(1000010, "Rosa Patrícia Vera Teixeira", '2019-03-07', '18640501552020152714672575288689', 321, 11119, 90001, 10),				
(1000011, "Anderson Elias Tiago Figueiredo", '2020-01-04', '21944901552016155291627658335211', 321, 11120, 90001, 11),				
(1000012, "César Kaique Juan Silveira", '2019-05-07', '16845901552018110644922344654787', 321, 11121, 90001, 12),				
(1000013, "Camila Luzia Yasmin Pires", '2019-09-01', '19513701552018167158616695827449', 321, 11122, 90002, 13),			
(1000014, "Miguel César Martins", '2019-08-11', '23861601552013152104509166728669', 321, 11123, 90001, 14),			
(1000015, "Igor Nicolas Victor Nogueira" ,'2019-12-30', '10562701552019124739381251258511', 123, 11124, 90001, 15),				
(1000016, "Andrea Yasmin Sales" ,'2019-09-04' ,'23046701552021167124965257800162', 123 , 11125, 90001, 16),				
(1000017, "Rita Alessandra Ferreira", '2019-06-01', '22741301552013163042972734151411' , 147, 11126, 90001, 17),				
(1000018, "Ryan Leonardo Lucas Caldeira", '2018-06-17', '16485801552010112566816464834215', 321, 11127, 90001, 18),			
(1000019, "Ricardo Ruan Nascimento", '2018-06-06', '20899101552019146152197763158374', 123, 11128, 90001, 19),				
(1000020, "Jennifer Vera Dias", '2018-12-30', '22265801552022111303900156851580', 123, 11129, 90001, 20),			
(1000021, "Pietro Emanuel Rocha", '2019-09-21', '13207401552012146085440127478619', 147, 11130, 90001, 21),				
(1000022, "Samuel Tiago Ryan Rodrigues", '2018-06-22', '21341901552018199927449802334592' , 147, 11131, 90001, 22),				
(1000023, "Sandra Luciana Ramos", '2018-06-11', '17067401552015106111482843704122', 147, 11131, 90001, 23),				
(1000024, "Yuri Raimundo Nelson Barros", '2018-07-07', '19537801552018108390265382318160', 147, 11132, 90001, 24),			
(1000025, "Alice Nina Evelyn Baptista", '2019-08-02', '16930601552013133072145102509563', 147, 11133, 90001, 25),				
(1000026, "Sarah Sarah Nair Bernardes", '2019-07-01', '25815501552016180001232232457634', 123, 11134, 90001, 26),				
(1000027, "Marina Daiane Raimunda Campos", '2020-01-07', '12781001552012172707932998318442', 123, 11135, 90001, 27),				
(1000028, "Carlos Eduardo Guilherme Enrico da Rocha", '2020-02-20', '24831201552012153456744149418298', 147, 11136, 90001, 28),				
(1000029, "Gael Manuel Fernandes", '2020-01-13', '16472201552012195222131902824966', 321, 11137, 90001, 29),				
(1000030, "Andrea Sabrina Lívia Almada", '2019-07-19', '28105501552022126002009471264719', 321, 11138, 90001, 30),				
(1000031, "Gustavo Ricardo Caleb Teixeira", '2020-09-01', '28432701552010129884365926564095', 321, 11139, 90001, 31),				
(1000032, "Vanessa Melissa Agatha Costa", '2020-11-02', '16569001552010151797893484006973', 123, 11140, 90001, 32),				
(1000033, "Vicente Carlos Campos", '2019-12-04', '15443901552015129297825527091288', 147, 11141, 90002, 33),				
(1000034, "Valentina Eduarda Santos", '2019-05-05', '11535701552017137498734239963697',147, 11142, 90002, 34),				
(1000035, "Anthony Francisco Edson Nunes", '2020-09-01', '21580001552015140061282779102095', 147, 11143, 90002, 35),			
(1000036, "Igor Márcio Viana", '2019-09-06', '1055950155201214596763042771288', 147, 11144, 90002, 36),			
(1000037, "Julio Gustavo da Rocha", '2020-02-14', '27534601552021114245854430962461', 147, 11145, 90002, 37),		
(1000038, "Hadassa Manuela Novaes"	, '2022-09-23', '16820201552010195916709780589011', 147, 11146, 90002, 38),		
(1000039, "Raimunda Isabela Martins", '2020-01-18', '2440550155201316741965086427711' ,147, 11147, 90002, 39),			
(1000040, "Caleb André Vieira", '2020-01-21', '14311601552020163990665924292303',147, 11148, 90002, 40),			
(1000041, "Jéssica Lívia Alessandra Pinto", '2020-02-02', '2407850155202211420504880245237', 147, 11149, 90002, 41),				
(1000042, "Ian Eduardo Thiago Nascimento", '2020-08-01', '14921901552019169805164931442875', 147, 11150, 90002, 42),			
(1000043, "Carlos Otávio André Ramos", '2019-07-16','15790801552014148473306632862001', 147, 11151, 90002, 43),			
(1000044, "Esther Cristiane Nogueira", '2018-12-04', '1321740155201612831340425944481', 147, 11152, 90002, 44),				
(1000045, "Evelyn Agatha Stella Porto", '2021-07-13', '22748701552017172815901506435535', 147, 11153, 90002, 45),			
(1000046, "Osvaldo Sebastião Moraes" ,'2020-04-17', '26493201552018172502300297270168', 123, 11154, 90002, 46),			
(1000047, "Benício Lucas Lorenzo da Mota" ,'2019-06-17' ,'16504601552021158146344397179164', 321, 11155, 90002, 47),			
(1000048, "Giovanni Luan Caio Pires", '2020-04-09', '24050801552011101233850428189253', 321, 11156, 90002, 48),			
(1000049, "Letícia Elza Giovana Pereira", '2020-10-10', '2347180155201816542602423681508', 123, 11157, 90002, 49),			
(1000050, "Tomás Guilherme Cláudio da Mata", '2020-08-17', '2816620155201311193000136605710', 123, 11158, 90002, 50);

insert into tb_responsavel_aluno (cd_responsavel, cd_aluno) values
(2, 1000002);				

update tb_instituicao set cd_profissional = 53001 where cd_instituicao = 90001;			
update tb_instituicao set cd_profissional = 53012 where cd_instituicao = 90002;	
update tb_instituicao set cd_cadastro = 200051 where cd_instituicao = 90001;	
update tb_instituicao set cd_cadastro = 200052 where cd_instituicao = 90002;		


 select * from tb_profissional;
insert into tb_profissional (cd_profissional, nm_profissional, cd_cpf, nm_funcao, cd_cadastro) values 
(53001, "Cristiane Francisca Souza", 3886912809, "Diretora", 200053),				
(53002, "Manuela Fabiana Aparício", 79391766846, "Vice-Diretora", 200054),			
(53003, "Daiane Luna Carolina Lima", 51303687895, "Coordenadora", 200055),			
(53004, "Giovanna Juliana Baptista", 42326584830, "Secretaria", 200056),		
(53005, "Fabiana Marina Silva", 75996261820, "Sup.Merenda", 200057),				
(53006, "Betina Isabelly Gomes",10428813836, "Inspetora", 200058),			
(53007, "Mirella Sandra Clara Moraes", 11371253811, "Professora", 200059),				
(53008, "Isabella Nina Patrícia Sales", 26941912820, "Professora", 200060),				
(53009, "Ayla Carolina Betina da Mata",  84139531894, "Professora", 200061),				
(53010, "Alice Débora Vieira", 7593667804, "Professora", 200062),				
(53011, "Andreia Josefa Barbosa", 72222208874, "Professora", 200063),				
(53012, "Andrea Alana Alves", 90256018804, "Diretora", 200064),			
(53013, "Isabelle Isabela Aline Cavalcanti", 28392046811, "Vice-Diretora", 200065),		
(53014, "Carlos Augusto Santos", 37663426837, "Professora", 200066),				
(53015, "Vinicius Martins Silva", 87428883340, "Professora", 200067);			


		
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53001;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53002;						
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53003;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53004;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53005;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53006;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53007;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53008;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53009;							
update tb_profissional set cd_instituicao = 90001  where cd_profissional = 53010;							
update tb_profissional set cd_instituicao = 90002  where cd_profissional = 53011;							
update tb_profissional set cd_instituicao = 90002  where cd_profissional = 53012;							
update tb_profissional set cd_instituicao = 90002  where cd_profissional = 53013;							
update tb_profissional set cd_instituicao = 90002  where cd_profissional = 53014;							
update tb_profissional set cd_instituicao = 90002  where cd_profissional = 53015;

update tb_profissional set cd_turma = 123  where cd_profissional = 53007;								
update tb_profissional set cd_turma = 123  where cd_profissional = 53008;
update tb_profissional set cd_turma = 147  where cd_profissional = 53009;
update tb_profissional set cd_turma = 147  where cd_profissional = 53010;
update tb_profissional set cd_turma = 321  where cd_profissional = 53011;		
update tb_profissional set cd_turma = 321  where cd_profissional = 53006;								
update tb_profissional set cd_turma = 147  where cd_profissional = 53014;
update tb_profissional set cd_turma = 147  where cd_profissional = 53015;

select * from tb_responsavel;

insert tb_contato (cd_responsavel, cd_contato, cd_telefone, ds_contato ) values
(1,	11111, '13996470314', "telefone_fixo: 1338458880"	),	
(2,	11112, '13997586963', "telefone_fixo: 1338942116"	),				
(3,	11113, '13998475894', "telefone_fix: 1328825287"	),			
(4,	11114, '13982770835', "telefone_fixo: 1335161343"	),			
(5,	11115, '13981234014', "telefone_fixo: 1336959549"	),			
(6,	11116, '13988989363', "telefone_fixo: 1335052825"	),		
(7,	11117, '13982847004', "telefone_fixo: 1338693802"	),			
(8,	11118, '13996081090', "telefone_fixo: 1325961217"	),			
(9,	11119, '13987725476', "telefone_fixo: 1328172504"	),			
(10, 11120, '13994144461', "telefone_fixo: 1326323513"	),				
(11, 11121, '13984006294', "telefone_fixo: 1326539949"	),			
(12, 11122, '13982716675', "telefone_fixo: 1328326420"	),			
(13, 11123, '13998719077', "telefone_fixo: 1337026158"	),			
(14, 11124, '13997208367', "telefone_fixo: 1335039550"	),		
(15, 11125, '13981389315', "telefone_fixo: 1329659904"	),			
(16, 11126, '13997917201', "telefone_fixo: 1339867345"	),			
(17, 11127, '13985629578', "telefone_fixo: 1336363236"	),			
(18, 11128, '13995658894', "telefone_fixo: 1335102583"	),			
(19, 11129, '13985557064', "telefone_fixo: 1328343969"	),			
(20, 11130, '13986128565', "telefone_fixo: 1327977593"	),			
(21, 11131, '13986425934', "telefone_fixo: 1327430643"	),			
(22, 11132, '13993770111', "telefone_fixo: 1325221281"	),			
(23, 11133, '13997225583', "telefone_fixo: 1335897340"	),			
(24, 11134, '13987419447', "telefone_fixo: 1339318009"	),			
(25, 11135, '13983916955', "telefone_fixo: 1329322234"	),			
(26, 11136, '13985037949', "telefone_fixo: 1338314918"	),			
(27, 11137, '13987571767', "telefone_fixo: 1325846284"	),			
(28, 11138, '13985652400', "telefone_fixo: 1339671263"	),			
(29, 11139, '13982991471', "telefone_fixo: 1339342323"	),			
(30, 11140, '13983349108', "telefone_fixo: 1327387890"	),			
(31, 11141, '13999954442', "telefone_fixo: 1326618269"	),			
(32, 11142, '13986421080', "telefone_fixo: 1338176406"	),			
(33, 11143, '13987826772', "telefone_fixo: 1338319000"	),			
(34, 11144, '13992121158', "telefone_fixo: 1335537126"	),			
(35, 11145, '13994296035', "telefone_fixo: 1325330120"	),			
(36, 11146, '13985537891', "telefone_fixo: 1339292519"	),			
(37, 11147, '13998162065', "telefone_fixo: 1328126913"	),			
(38, 11148, '13985606648',  "telefone_fixo: 1337079784"	),				
(39, 11149, '13994081866', "telefone_fixo: 1337751752"	),			
(40, 11150, '13998252299', "telefone_fixo: 1336206687"	),			
(41, 11151, '13985547755', "telefone_fixo: 1327017488"	),			
(42, 11152, '13997607520', "telefone_fixo: 1325068520"	),			
(43, 11153, '13983335473', "telefone_fixo: 1325304193"	),			
(44, 11154, '13996069852', "telefone_fixo: 1325136693"	),			
(45, 11155, '13981595689', "telefone_fixo: 1329836497"	),			
(46, 11156, '13984465619', "telefone_fixo: 1337820910"	),			
(47, 11157, '13981846242', "telefone_fixo: 1325736239"	),			
(48, 11158, '13991781104', "telefone_fixo: 1326959125"	),			
(49, 11159, '13999574761', "telefone_fixo: 1329045848"	),			
(50, 11160, '13997630571', "telefone_fixo: 1336891930"	);	

select * from tb_responsavel;		




select r.nm_responsavel as 'Nome do Responsavel', a.nm_aluno as 'Nome do Aluno' -- Apresenta os nomes do pais em conjunto com os dos alunos
from tb_responsavel as r join tb_aluno as a
on r.cd_responsavel = a.cd_responsavel;

select * from tb_aluno;



select n.nm_aluno as 'Aluno', t.nm_turma as 'Turma'  -- Apresenta os nomes dos alunos e suas respectivas turmas
from tb_aluno as n join tb_turma as t
on n.cd_turma = t.cd_turma;

select r.nm_responsavel as 'Nome' , l.nm_login as 'User' , cd_senha as 'Senha' -- Apresenta os nomes dos responsaveis ,seu nome de acesso e senhass
from tb_responsavel as r join tb_login as l
on r.cd_responsavel = l.cd_responsavel;

select i.nm_instituicao as 'Instituiçao Matriculada', a.nm_aluno as 'Aluno'-- apresenta a instituicao em que o aluno esta matriculado
from tb_instituicao as i join tb_aluno as a
on i.cd_instituicao = a.cd_instituicao;

select tb_profissional.nm_profissional as 'Profissional', tb_instituicao.nm_instituicao as 'Instituição de Trabalho'-- apresenta a instituicao em que o profissional trabalha
from tb_profissional join tb_instituicao
on tb_profissional.cd_instituicao = tb_instituicao.cd_instituicao
;

select r.nm_responsavel as 'Nome do Responsavel', p.vl_fatura as 'Valor', dt_pagamento as 'Data de Vencimento', nm_status_pagamento as 'Status', nm_forma_pagamento as 'Forma de Pagamento'
from tb_responsavel as r join tb_pagamento as p
on r.cd_responsavel = p.cd_responsavel
join tb_status_pagamento as s 
on s.cd_status_pagamento = p.cd_status_pagamento
join tb_forma_pagamento as f 
on f.cd_forma_pagamento = p.cd_forma_pagamento;

select r.nm_responsavel as 'Nome', ed.nm_endereco as 'Endereço', ed.cd_cep as 'CEP', ed.cd_numcasa as 'Numero' from tb_responsavel as r
	join tb_endereco as ed
		on r.cd_endereco = ed.cd_endereco; -- Buscando retorno de todos os endereços ligados aos responsáveis
        
select t.nm_turma as 'Turma', count(a.cd_aluno) as 'Numero de Alunos' from -- Exibe a quantidade de alunos em cada sala
tb_turma as t join tb_aluno as a
on t.cd_turma = a.cd_turma
group by nm_turma;

select i.nm_instituicao as 'Instituição', count(a.cd_aluno) as 'Alunos Matriculados' from
tb_instituicao as i join tb_aluno as a
on i.cd_instituicao = a.cd_instituicao
group by nm_instituicao;

select i.nm_instituicao as 'Instituição', count(p.cd_profissional) as 'Profissionais' from
tb_instituicao as i join tb_profissional as p
on i.cd_instituicao = p.cd_instituicao
group by nm_instituicao;

-- SUBSELECTS

select nm_aluno, nm_turma from tb_aluno join tb_turma as t
	where (select count(*) from tb_turma)
		group by nm_aluno; -- Contar e agrupar alunos registrados em alguma turma
        
select cd_pagamento, vl_fatura
	from tb_pagamento
		where vl_fatura < (select avg(vl_fatura) from tb_pagamento); -- Retornar os valores de fatura que são menores que a média delas

/* VIEWS CRIADAS */

create view vw_ProfissionaisTurmas as
select cd_profissional as Chaves, nm_profissional as Profissionais, nm_turma as Turmas
from tb_profissional
inner join tb_turma
	on tb_profissional.cd_turma = tb_turma.cd_turma;
    select * from vw_ProfissionaisTurmas;

create view vw_AlunosTurmas as
select cd_aluno as Chaves, nm_aluno as Nomes, nm_turma as Turmas
from tb_aluno
inner join tb_turma
	on tb_aluno.cd_turma = tb_turma.cd_turma;
    select * from vw_AlunosTurmas;

create view vw_AlunosResponsaveis as
select cd_aluno as Chaves, nm_aluno as Alunos, nm_responsavel as Responsaveis
from tb_aluno
inner join tb_responsavel
	on tb_aluno.cd_responsavel = tb_responsavel.cd_responsavel;
    select * from vw_AlunosResponsaveis;
select * from vw_AlunosResponsaveis;
    
create view vw_NumerosResponsaveisAlunos as
select cd_telefone as Numeros, nm_responsavel as Responsaveis, nm_aluno as Alunos
from tb_contato
inner join tb_responsavel
	on tb_contato.cd_responsavel = tb_responsavel.cd_responsavel
inner join tb_aluno
	on tb_aluno.cd_responsavel = tb_responsavel.cd_responsavel;
    select * from vw_NumerosResponsaveisAlunos;

create view vw_PagamentoStatusResponsaveis as
select cd_pagamento as Chaves, nm_status_pagamento as Status_Pagamento, nm_responsavel as Responsaveis
from tb_pagamento
inner join tb_status_pagamento
	on tb_pagamento.cd_status_pagamento = tb_status_pagamento.cd_status_pagamento
inner join tb_responsavel
	on tb_pagamento.cd_responsavel = tb_responsavel.cd_responsavel;
    select * from vw_PagamentoStatusResponsaveis;

create view vw_EnderecosResponsaveisAlunos as
select nm_endereco as Enderecos, nm_responsavel as Responsaveis, nm_aluno as Alunos
from tb_aluno
inner join tb_responsavel
	on tb_aluno.cd_responsavel = tb_responsavel.cd_responsavel
inner join tb_endereco
	on tb_responsavel.cd_endereco = tb_endereco.cd_endereco;
	select * from vw_EnderecosResponsaveisAlunos;
    
create view vw_AlunoAnivers as
select cd_aluno as Matrícula, nm_aluno as Alunos, day(dt_nascimento) as 'Dia do Aniversário' from tb_aluno
where month(dt_nascimento) = month(curdate()); /* Curdate para identificar o mês atual no sistema */
select * from vw_AlunoAnivers;

select cd_pagamento as Pagamentos, nm_responsavel as Responsaveis, day(dt_pagamento) as 'Data de Pagamento'
from tb_pagamento
	inner join tb_responsavel
		on tb_pagamento.cd_responsavel = tb_responsavel.cd_responsavel;

create view vw_PagamentoResponsaveis as
select cd_pagamento as Pagamentos, nm_responsavel as Responsaveis,dt_pagamento as 'Data de Pagamento'
from tb_pagamento
	inner join tb_responsavel
		on tb_pagamento.cd_responsavel = tb_responsavel.cd_responsavel;
select * from vw_PagamentoResponsaveis;

create view vw_StatusAlunos as
select cd_aluno as Matrícula, nm_aluno as Alunos, nm_turma as Turmas
from tb_aluno
inner join tb_turma
	on tb_aluno.cd_turma = tb_turma.cd_turma;
    
create view vw_ProfissionaisAlunosTurmas as
select cd_profissional as Professores, nm_profissional as 'Nomes dos Professores', nm_turma as Turmas, nm_aluno as Alunos
from tb_aluno
	inner join tb_turma
		on tb_aluno.cd_turma = tb_turma.cd_turma
	inner join tb_profissional
		on tb_profissional.cd_turma = tb_turma.cd_turma;
select * from vw_ProfissionaisAlunosTurmas;
	

    


/* VIEWS CRIADAS - FIM */

/* PESQUISAS COM PROCEDURE */ 


create procedure sp_RespRegistroCPF (varCpf varchar(14))
select cd_responsavel as Matricula, nm_responsavel as Nome, cd_cpf as CPF
from tb_responsavel 
where tb_responsavel.cd_cpf = varCpf;
call sp_RespRegistroCPF ("74221965800");
drop procedure sp_RespRegistroCPF;

create procedure sp_RespBairro (varBairro varchar(80)) 
select tb_responsavel.cd_responsavel as Matricula, nm_responsavel as Nome, tb_endereco.cd_bairro as 'Cod. Bairro',  tb_bairro.nm_bairro as 'Nome do Bairro'
from tb_responsavel
inner join tb_endereco
	on tb_responsavel.cd_endereco = tb_endereco.cd_endereco
inner join tb_bairro
	on tb_endereco.cd_bairro = tb_bairro.cd_bairro
where tb_bairro.nm_bairro = varBairro;
call sp_RespBairro ("Centro");
drop procedure sp_RespBairro;


create procedure sp_ProfRegistro (varProfessor varchar(100)) 
select cd_profissional as Registro , nm_profissional as Nome, nm_funcao as Função, tb_turma.cd_turma as Sala , tb_turma.nm_turma as Turma
from tb_profissional
inner join tb_turma
	on tb_profissional.cd_turma = tb_turma.cd_turma
where tb_profissional.nm_profissional = varProfessor;
call sp_ProfRegistro ("Mirella Sandra Clara Moraes");
drop procedure sp_ProfRegistro;

create procedure sp_VerifPagamento ( matricula int)
	select tb_responsavel.cd_responsavel as matricula, nm_responsavel as Responsavel, nm_status_pagamento as 'Status Atual' 
		from tb_pagamento
			inner join tb_responsavel
				on tb_responsavel.cd_responsavel = tb_pagamento.cd_responsavel
			inner join tb_status_pagamento
				on tb_pagamento.cd_status_pagamento = tb_status_pagamento.cd_status_pagamento
where tb_responsavel.cd_responsavel = matricula;
call sp_VerifPagamento("40");

/* PESQUISAS PROCEDURE - FIM */

