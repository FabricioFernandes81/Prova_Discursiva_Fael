-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Out-2021 às 19:30
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `comercio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenspedidos`
--

CREATE TABLE `itenspedidos` (
  `Id` int(11) NOT NULL,
  `Id_pedido` int(11) NOT NULL,
  `Id_produto` int(11) NOT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `ValorUnitario` decimal(8,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Acionadores `itenspedidos`
--
DELIMITER $$
CREATE TRIGGER `Tgr_SaidaProduto` BEFORE INSERT ON `itenspedidos` FOR EACH ROW BEGIN
UPDATE produtos SET Estoque = Estoque - NEW.Quantidade WHERE Codigo = NEW.Id_produto;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `Id_Marca` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `Id` int(11) NOT NULL,
  `Cliente` varchar(255) DEFAULT NULL,
  `Cliente_Sobrenome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `FormaPgt` varchar(255) DEFAULT NULL,
  `Cep` varchar(255) DEFAULT NULL,
  `vlrFrete` decimal(8,2) DEFAULT NULL,
  `vlrPedido` decimal(8,2) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `Codigo` int(11) NOT NULL,
  `Produto` varchar(200) DEFAULT NULL,
  `Descricao` text DEFAULT NULL,
  `Estoque` int(11) DEFAULT NULL,
  `IdMarca` int(11) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `valor` decimal(8,2) DEFAULT NULL,
  `Peso` float DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`) USING BTREE;

--
-- Índices para tabela `itenspedidos`
--
ALTER TABLE `itenspedidos`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `Id_pedido` (`Id_pedido`) USING BTREE,
  ADD KEY `IdProduto` (`Id_produto`) USING BTREE;

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`Id_Marca`) USING BTREE;

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`Codigo`) USING BTREE,
  ADD KEY `FK_IdMarca` (`IdMarca`) USING BTREE,
  ADD KEY `FK_IdCategoria` (`IdCategoria`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itenspedidos`
--
ALTER TABLE `itenspedidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `Id_Marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
