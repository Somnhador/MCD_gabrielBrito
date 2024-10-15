create database mercadoJose;
use mercadoJose;

create table prod(
id_Produto int auto_increment primary key,
produto varchar(50),
quantidade int,
preco float
);