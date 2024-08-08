CREATE DATABASE sistema_jogo;

USE sistema_jogo;


CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomejogo VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL UNIQUE,
    data_lancamento DATE NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);
