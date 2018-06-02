create database sigvendas;
use sigvendas;
create table usuario(
	id int auto_increment not null,
	nome varchar(200) not null,
	email varchar(200) not null,
	senha varchar(200) not null,
	tipo int not null,
	primary key(id)
);
create table logs(
	id int auto_increment not null,
	data_i varchar(200) not null,
	acao varchar(200) not null,
	id_usuario int not null,
	primary key(id),
	foreign key(id_usuario) references usuario(id)
);

create table produto(
	id int auto_increment not null,
	codigo_barra text not null,
	descricao text not null,
	estoque_minimo int not null,
	primary key(id)
);
create table entrada(
	id int auto_increment not null,
	id_produto int not null,
	id_usuario int not null,
	qtd int not null,
	data_entrada text not null,
	data_validade text not null,
	preco_compra_unitario float,
	porcentagem float,
	observacao text,
	primary key(id)
);
create table preco_produto_entrada(
	id int auto_increment not null,
	id_produto int not null,
	id_entrada int not null,
	valor_de_venda float,
	primary key(id)
);

create table venda(
	id int auto_increment not null,
	id_usuario int not null,
	valor_venda float,
	data_venda text,
	horario_venda text,
	observacao text,
	primary key(id)
);

create table item_venda(
	id int auto_increment not null,
	id_venda int not null,
	id_produto int not null,
	qtd int, 
	primary key(id)
);

