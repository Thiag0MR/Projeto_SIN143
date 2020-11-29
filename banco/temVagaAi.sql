-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2020 at 06:46 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temVagaAi`
--

-- --------------------------------------------------------

--
-- Table structure for table `Anuncio`
--

CREATE TABLE `Anuncio` (
  `idAnuncio` int NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `Usuario_idUsuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Anuncio`
--

INSERT INTO `Anuncio` (`idAnuncio`, `titulo`, `descricao`, `valor`, `Usuario_idUsuario`) VALUES
(3, 'Espaço lazer', 'Alugo um espaço para eventos em gerais. Entrar em contato.', 999, 1),
(5, 'Quarto em república', 'Tenho um quarto disponível em uma república masculina. Endereço: Rua v, 81. Favor entrar em contato.', 250, 1),
(6, 'Aluguel de apartamento', 'Alugo um apartamento na rua z, 345, 3º andar, 2 quartos, sala, cozinha.', 1200, 2),
(7, 'Quarto disponível', 'Quarto disponível para alugar em uma casa próximo a faculdade.', 300, 2),
(8, 'Espaço festas', 'Alugo espaço para festas em gerais, lugar amplo e arejado. Capacidade para 150 pessoas em média.', 1100, 2),
(9, 'Área para churrasco', 'Alugo área para churrasco e festas de aniversário.', 500, 3),
(10, 'Vaga disponível república', '2 Vagas disponível em república feminina', 320, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Anuncio_Categoria`
--

CREATE TABLE `Anuncio_Categoria` (
  `Anuncio_idAnuncio` int DEFAULT NULL,
  `Categoria_idCategoria` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Anuncio_Categoria`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE `Categoria` (
  `idCategoria` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Categoria`
--

INSERT INTO `Categoria` (`idCategoria`, `nome`) VALUES
(1, 'Apartamento'),
(2, 'República'),
(3, 'Casa'),
(4, 'Quarto'),
(5, 'Espaço');

-- --------------------------------------------------------

--
-- Table structure for table `Imagem`
--

CREATE TABLE `Imagem` (
  `idImagem` int NOT NULL,
  `url` varchar(90) DEFAULT NULL,
  `Anuncio_idAnuncio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Imagem`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `idUsuario` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Joao Ribeiro', 'joao@example.com', '123456', '34996368547'),
(2, 'Maria da Silva', 'maria@example.com', '123456', '34996368543'),
(3, 'Rodrio Souza', 'rodrigo@example.com', '123456', '34996368541');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Anuncio`
--
ALTER TABLE `Anuncio`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `Usuario_idUsuario` (`Usuario_idUsuario`);

--
-- Indexes for table `Anuncio_Categoria`
--
ALTER TABLE `Anuncio_Categoria`
  ADD KEY `Anuncio_idAnuncio` (`Anuncio_idAnuncio`),
  ADD KEY `Categoria_idCategoria` (`Categoria_idCategoria`);

--
-- Indexes for table `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `Imagem`
--
ALTER TABLE `Imagem`
  ADD PRIMARY KEY (`idImagem`),
  ADD KEY `Anuncio_idAnuncio` (`Anuncio_idAnuncio`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Anuncio`
--
ALTER TABLE `Anuncio`
  MODIFY `idAnuncio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `idCategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Imagem`
--
ALTER TABLE `Imagem`
  MODIFY `idImagem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Anuncio`
--
ALTER TABLE `Anuncio`
  ADD CONSTRAINT `Anuncio_ibfk_1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE CASCADE;

--
-- Constraints for table `Anuncio_Categoria`
--
ALTER TABLE `Anuncio_Categoria`
  ADD CONSTRAINT `Anuncio_Categoria_ibfk_1` FOREIGN KEY (`Anuncio_idAnuncio`) REFERENCES `Anuncio` (`idAnuncio`) ON DELETE CASCADE,
  ADD CONSTRAINT `Anuncio_Categoria_ibfk_2` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `Categoria` (`idCategoria`) ON DELETE CASCADE;

--
-- Constraints for table `Imagem`
--
ALTER TABLE `Imagem`
  ADD CONSTRAINT `Imagem_ibfk_1` FOREIGN KEY (`Anuncio_idAnuncio`) REFERENCES `Anuncio` (`idAnuncio`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
