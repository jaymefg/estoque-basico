CREATE DATABASE meuestoque;

use meuestoque;

CREATE TABLE categorias
(
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  quantidade INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE produtos
(
  id INT NOT NULL AUTO_INCREMENT,
  codigo VARCHAR(50),
  marca VARCHAR(50),
  precoCompra DOUBLE(9,2) NOT NULL,
  precoVenda DOUBLE(9,2) NOT NULL,
  dataCompra DATE,
  dataVenda DATE, 
  descricao_id INT NOT NULL,
  categoria_id INT NOT NULL,
  e_disponivel boolean not null,
  PRIMARY KEY(id)
);

CREATE TABLE descricoes
(
  id INT NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(150) NOT NULL,
  quantidade INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE vendas
(
	id INT NOT NULL AUTO_INCREMENT,
    data_venda date not null,
    user_id VARCHAR(50) NOT NULL,
    produto_id int not null,
    PRIMARY KEY(id)
);

CREATE TABLE users
(
	id INT NOT NULL AUTO_INCREMENT,
    nome varchar(150) not null,
    senha varchar(80) not null,
    PRIMARY KEY(id)
);

ALTER TABLE produtos ADD CONSTRAINT fk_categorias FOREIGN KEY (categoria_id) REFERENCES categorias(id);
ALTER TABLE produtos ADD CONSTRAINT fk_descricoes FOREIGN KEY (descricao_id) REFERENCES descricoes(id);

INSERT INTO categorias (nome, quantidade) VALUES
('Livros', 3),
('Jogos', 1),
('Filmes', 5),
('Revistas', 0);

INSERT INTO descricoes (descricao, quantidade) VALUES
('O Senhor dos Anéis, Trilogia Completa', 2),
('Batman Arkahan City', 1),
('Jogador Nº 1', 2),
('As Cronicas de Gelo e Fogo - 5 Livros', 1),
('O Poderoso Chefão', 3);

INSERT INTO produtos (codigo, precoCompra, precoVenda, categoria_id, descricao_id) VALUES
('123456', 50, 119.50, 3, 1),
('987456', 50, 119.50, 3, 1),
('123654', 50, 65.99, 2, 2),
('321456', 50, 29.90, 1, 3),
('321986', 50, 29.90, 1, 3),
('321654', 50, 199.99, 1, 4),
('756465', 50, 89.90, 3, 5),
('298465', 50, 89.90, 3, 5),
('547465', 50, 89.90, 3, 5);
