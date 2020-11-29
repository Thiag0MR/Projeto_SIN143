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
	ADD FOREIGN KEY (Usuario_idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE;

ALTER TABLE Anuncio_Categoria
	ADD FOREIGN KEY (Anuncio_idAnuncio) REFERENCES Anuncio(idAnuncio) ON DELETE CASCADE,
    ADD FOREIGN KEY (Categoria_idCategoria) REFERENCES Categoria(idCategoria) ON DELETE CASCADE;

ALTER TABLE Imagem
	ADD FOREIGN KEY (Anuncio_idAnuncio) REFERENCES Anuncio(idAnuncio) ON DELETE CASCADE;


    INSERT INTO `Usuario` (`idUsuario`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Joao Ribeiro', 'joao@example.com', '123456', '34996368547'),
(2, 'Maria da Silva', 'maria@example.com', '123456', '34996368543'),
(3, 'Rodrio Souza', 'rodrigo@example.com', '123456', '34996368541');

INSERT INTO `Anuncio` (`idAnuncio`, `titulo`, `descricao`, `valor`, `Usuario_idUsuario`) VALUES
(3, 'Espaço lazer', 'Alugo um espaço para eventos em gerais. Entrar em contato.', 999, 1),
(5, 'Quarto em república', 'Tenho um quarto disponível em uma república masculina. Endereço: Rua v, 81. Favor entrar em contato.', 250, 1),
(6, 'Aluguel de apartamento', 'Alugo um apartamento na rua z, 345, 3º andar, 2 quartos, sala, cozinha.', 1200, 2),
(7, 'Quarto disponível', 'Quarto disponível para alugar em uma casa próximo a faculdade.', 300, 2),
(8, 'Espaço festas', 'Alugo espaço para festas em gerais, lugar amplo e arejado. Capacidade para 150 pessoas em média.', 1100, 2),
(9, 'Área para churrasco', 'Alugo área para churrasco e festas de aniversário.', 500, 3),
(10, 'Vaga disponível república', '2 Vagas disponível em república feminina', 320, 3);

INSERT INTO `Categoria` (`idCategoria`, `nome`) VALUES
(1, 'Apartamento'),
(2, 'República'),
(3, 'Casa'),
(4, 'Quarto'),
(5, 'Espaço');

INSERT INTO `Anuncio_Categoria` (`Anuncio_idAnuncio`, `Categoria_idCategoria`) VALUES
(3, 5),
(5, 2),
(5, 4),
(8, 5),
(6, 1),
(9, 3),
(9, 5),
(10, 2),
(10, 3),
(10, 4),
(7, 3),
(7, 4);

INSERT INTO `Imagem` (`idImagem`, `url`, `Anuncio_idAnuncio`) VALUES
(1, 'espaco1.jpg', 3),
(3, 'quarto2.jpg', 5),
(4, 'apartamento.jpg', 6),
(5, 'apartamento1.jpg', 6),
(6, 'quarto1.png', 7),
(7, 'espaco3.jpg', 8),
(8, 'espaco2.jpg', 9),
(9, 'quarto3.jpg', 10),
(10, 'quarto4.jpg', 10);
