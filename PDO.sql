create database pdo;

use pdo;

CREATE TABLE produtos(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome varchar(100) NOT NULL,
	descricao varchar(100) NOT NULL
);

insert into produtos values(null, 'nome', 'teste');

select * from produtos;