-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 10, 2011 as 12:42 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `comercio`
--
CREATE DATABASE `comercio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `comercio`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(15) NOT NULL,
  `subcategoria` int(11) default NULL,
  KEY `id` (`id`,`subcategoria`),
  KEY `subcategoria` (`subcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `subcategoria`) VALUES
(1, 'Automodelismo', NULL),
(2, 'AÃ©romodelismo', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(45) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `login`, `senha`, `status`) VALUES
(1, 'Cliente 1', 'cli1', 'cli1', 1),
(2, 'Cliente 2', 'cli2', 'cli2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(25) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(40) NOT NULL,
  `preco` float NOT NULL,
  `idcategoria` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`,`idcategoria`),
  KEY `idcategoria` (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `foto`, `preco`, `idcategoria`) VALUES
(1, 'Carro vermelho', 'Carro vermelho antigo, de marca inglesa.', '2cvt-45.jpg', 100, 1),
(2, 'Carro rally', 'Fusca modificado para rally. Cor Azul e Branco.', '04jpg.jpg', 143.9, 1),
(3, 'Helicoptero', 'Helicoptero Azul', '_8310090_1_F.jpg', 940.2, 2);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`subcategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE;
