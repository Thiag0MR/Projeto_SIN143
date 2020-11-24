CREATE DATABASE IF NOT EXISTS temVagaAi;

CREATE TABLE IF NOT EXISTS Usuario (
    idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    email VARCHAR(30),
    senha VARCHAR(30),
    telefone VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS Anuncio (
    idAnuncio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(30),
    descricao VARCHAR(150),
    valor FLOAT,
    Usuario_idUsuario INT
);

CREATE TABLE IF NOT EXISTS Categoria (
    idCategoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(15)
);

CREATE TABLE IF NOT EXISTS Anuncio_Categoria (
    Anuncio_idAnuncio INT,
    Categoria_idCategoria INT
);

ALTER TABLE Anuncio
	ADD FOREIGN KEY (`Usuario_idUsuario`) REFERENCES Usuario(idUsuario);

ALTER TABLE Anuncio_Categoria
	ADD FOREIGN KEY (`Anuncio_idAnuncio`) REFERENCES Anuncio(idAnuncio),
    ADD FOREIGN KEY (`Categoria_idCategoria`) REFERENCES Categoria(idCategoria);

-- DROP TABLE Anuncio_Categoria;
-- DROP TABLE Anuncio;
-- DROP TABLE Categoria;
-- DROP TABLE Usuario;
