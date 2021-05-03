/* CRIANDO DATABASE */
create database db_proconsult;

/* USANDO DATABASE */
use db_proconsult;

/* CRIANDO TABELA DE PRODUTOS */
create table tb_product(
	id_prod int auto_increment primary key,
	prod_name varchar(80) not null,
    prod_image varchar(180) not null,
    prod_price decimal(10,2) not null
);

/* SELECIONANDO TODOS OS ITENS DA MINHA TABELA PARA CONSULTA */
select * from tb_product;