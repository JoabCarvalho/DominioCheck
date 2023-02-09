-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 06-Out-2015 às 02:25
-- Versão do servidor: 5.5.40
-- PHP Version: 5.5.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL,
  `nome_empresa` varchar(200) NOT NULL,
  `tempo_refresh` tinyint(2) NOT NULL,
  `email_admin` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id_config`, `nome_empresa`, `tempo_refresh`, `email_admin`) VALUES
(1, 'Empresa Teste', 10, 'reigomesamaral@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dominio`
--

CREATE TABLE IF NOT EXISTS `dominio` (
  `id_dominio` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dominio`
--

INSERT INTO `dominio` (`id_dominio`, `link`, `cliente`, `status`) VALUES
(2, 'http://www.ministeriodoxa.com.br', 'Ministério Doxa', 0),
(3, 'http://www.google.com', 'Google', 1),
(4, 'http://www.facebook.com', 'Facebook', 1),
(7, 'https://twitter.com', 'Twitter', 1),
(9, 'http://www.doidera.com', 'Teste', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL,
  `id_dominio` int(11) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `nome_dominio` varchar(250) NOT NULL,
  `erro` varchar(200) NOT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id_log`, `id_dominio`, `cliente`, `nome_dominio`, `erro`, `data_hora`) VALUES
(72, 0, 'Teste', 'http://www.doidera.com', '0', '2015-09-14 03:52:09'),
(73, 0, 'Ministério Doxa', 'http://www.ministeriodoxa.com.br', '0 - Domínio inexistente', '2015-09-14 04:17:35'),
(74, 0, 'Teste', 'http://www.doidera.com', '0 - Domínio inexistente', '2015-09-14 04:17:36'),
(75, 0, 'Ministério Doxa', 'http://www.ministeriodoxa.com.br', '0 - Domínio inexistente', '2015-09-14 04:18:32'),
(76, 0, 'Teste', 'http://www.doidera.com', '0 - Domínio inexistente', '2015-09-14 04:18:34'),
(77, 0, 'Ministério Doxa', 'http://www.ministeriodoxa.com.br', '0 - Domínio inexistente', '2015-09-14 04:19:40'),
(78, 0, 'Teste', 'http://www.doidera.com', '0 - Domínio inexistente', '2015-09-14 04:19:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email_usuario` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `login`, `senha`, `nivel`, `status`, `data_cadastro`) VALUES
(1, 'Reinaldo Gomes', 'reigomesamaral@gmail.com', 'reinaldo', 'eb0a191797624dd3a48fa681d3061212', 1, 1, '2015-09-13 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`id_dominio`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dominio`
--
ALTER TABLE `dominio`
  MODIFY `id_dominio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
