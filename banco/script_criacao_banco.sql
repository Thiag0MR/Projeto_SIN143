CREATE DATABASE IF NOT EXISTS temVagaAi;

CREATE TABLE IF NOT EXISTS Usuario (
    idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45),
    email VARCHAR(45),
    senha VARCHAR(45),
    telefone VARCHAR(45)
);

CREATE TABLE IF NOT EXISTS Anuncio (
    idAnuncio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(45),
    descricao VARCHAR(150),
    valor FLOAT,
    Usuario_idUsuario INT
);

CREATE TABLE IF NOT EXISTS Categoria (
    idCategoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45)
);

CREATE TABLE IF NOT EXISTS Anuncio_Categoria (
    Anuncio_idAnuncio INT,
    Categoria_idCategoria INT
);

CREATE TABLE IF NOT EXISTS Imagem (
    idImagem INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(90),
    Anuncio_idAnuncio INT
);

ALTER TABLE Anuncio
	ADD FOREIGN KEY (Usuario_idUsuario) REFERENCES Usuario(idUsuario);

ALTER TABLE Anuncio_Categoria
	ADD FOREIGN KEY (Anuncio_idAnuncio) REFERENCES Anuncio(idAnuncio) ON DELETE CASCADE,
    ADD FOREIGN KEY (Categoria_idCategoria) REFERENCES Categoria(idCategoria) ON DELETE CASCADE;

ALTER TABLE Imagem
	ADD FOREIGN KEY (Anuncio_idAnuncio) REFERENCES Anuncio(idAnuncio) ON DELETE CASCADE;

-- DROP TABLE Anuncio_Categoria;
-- DROP TABLE Anuncio;
-- DROP TABLE Categoria;
-- DROP TABLE Usuario;
