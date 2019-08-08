-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Ago-2019 às 23:49
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_dayany`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `id_usuario`, `url`) VALUES
(1, 1, 'e86e84d0cd87a20cdde7b19161b7afde.jpg'),
(2, 2, 'd3650573def2c0c9595c58afd2693fdd.jpg'),
(3, 4, 'dc72ac42e52e48167a1faa4cfad427e0.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `porcentagem`
--

CREATE TABLE IF NOT EXISTS `porcentagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `porcentagem`
--

INSERT INTO `porcentagem` (`id`, `nome`, `valor`, `id_usuario`) VALUES
(1, 'ClÃ­nico Geral', 27, 1),
(2, 'Endodontia', 35, 1),
(5, 'Ortodontia', 40, 1),
(6, 'Implantodontia', 50, 1),
(7, 'Buco Maxilo', 45, 1),
(13, 'Programador', 80, 2),
(14, 'Programador', 50, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`) VALUES
(1, 'dayanysantos@yahoo.com.br', 'df69c0c2479a9f66206f965fb5937fbe', 'Dayany Santos'),
(2, 'hacrbatista@gmail.com', '42ee925a493d631e040cae06f4ebb668', 'Henrique Batista'),
(3, 'teste@teste.com.br', '698dc19d489c4e4db73e28a713eab07b', 'Teste'),
(4, 'hacrbatista@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Henrique');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
