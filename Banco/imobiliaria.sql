-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Mar-2021 às 22:42
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

DROP TABLE IF EXISTS `imovel`;
CREATE TABLE IF NOT EXISTS `imovel` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) NOT NULL,
  `CEP` int(11) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `ENDERECO` varchar(150) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `COMPLEMENTO` varchar(50) DEFAULT NULL,
  `EXCLUIDO` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`ID`, `NOME`, `CEP`, `UF`, `CIDADE`, `ENDERECO`, `BAIRRO`, `NUMERO`, `COMPLEMENTO`, `EXCLUIDO`) VALUES
(1, 'JoÃ£o Victor Batista', 31070060, NULL, NULL, 'Avenida do Contorno', 'Floreste', 2097, 'Apto', 1),
(2, 'Apartamento Aliança', 31070, NULL, NULL, 'Rua Y', 'Nova Vista', 123, 'casa', 0),
(3, 'Majestade Green', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'HeliÃ³polis', 152, NULL, 1),
(4, 'Lucas', 31070, NULL, NULL, 'teste1', 'teste2', 152, NULL, 1),
(5, 'João Victor Batista', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'Heliópolis', 152, NULL, 1),
(6, 'João Victor Batista', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'Heliópolis', 152, 'casa', 1),
(7, 'João Victor Batista', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'Heliópolis', 152, 'casa', 1),
(8, 'Mu Sparta', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'Heliópolis', 152, 'casa', 1),
(9, 'Conjunto Moradia', 31070, NULL, NULL, 'Rua Cornelio Procopio', 'Nova Vista', 509, 'casa', 0),
(10, 'Missin', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'Heliópolis', 152, 'casa', 1),
(11, 'Missin', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'Heliópolis', 152, 'casa', 1),
(12, 'lar doce lar', 31070, NULL, NULL, 'Rua Olbiano Sausmikat', 'Heliópolis', 152, 'casa', 1),
(13, 'João Victor Batista', 31070060, 'MG', 'Belo Horizonte', 'Rua Cornélio Procópio', 'Nova Vista', 152, 'casa', 1),
(14, 'Lar doce lar', 31070060, 'MG', 'Belo Horizonte', 'Rua Cornélio Procópio', 'Nova Vista', 155, 'CASA', 0),
(15, 'Apartamento da Luz', 31070060, 'MG', 'Belo Horizonte', 'Rua Cornélio Procópio', 'Nova Vista', 169, 'apto', 0),
(16, 'Casa de Teste', 31741480, 'MG', 'Belo Horizonte', 'Rua Olbiano Sausmikat', 'Heliópolis', 854, 'casa', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
