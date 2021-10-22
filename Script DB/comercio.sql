-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Out-2021 às 19:28
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

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `nome`) VALUES
(1, 'Processadores'),
(2, 'Placa de Video'),
(3, 'Memórias'),
(4, 'Placa Mãe'),
(5, 'Hard Disk');

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
-- Extraindo dados da tabela `itenspedidos`
--

INSERT INTO `itenspedidos` (`Id`, `Id_pedido`, `Id_produto`, `Quantidade`, `ValorUnitario`) VALUES
(14, 14, 27, 1, '696.00'),
(13, 14, 21, 1, '696.00'),
(12, 14, 25, 1, '696.00'),
(15, 15, 22, 1, '397.00');

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

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`Id_Marca`, `nome`) VALUES
(1, 'ASUS'),
(2, 'GIGABAYTE'),
(3, 'ZOTAC'),
(4, 'INTEL'),
(5, 'AMD'),
(6, 'KINGSTON'),
(7, 'CORSAIR'),
(8, 'MARKVISION'),
(9, 'ACER'),
(10, 'GEIL ORION');

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

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`Id`, `Cliente`, `Cliente_Sobrenome`, `email`, `FormaPgt`, `Cep`, `vlrFrete`, `vlrPedido`, `data`) VALUES
(14, 'Fabricio ', 'M. Fernandes', 'foguinhofernandessap@gmail.com.com', 'PIX', '95.500-000', '339.00', '696.00', '2021-10-22 14:24:56'),
(15, 'José ', 'Ataíde', 'teste@test.com.br', 'Boleto', '95.500-000', '0.00', '397.00', '2021-10-22 14:26:18');

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
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Codigo`, `Produto`, `Descricao`, `Estoque`, `IdMarca`, `IdCategoria`, `valor`, `Peso`, `img`) VALUES
(27, 'Processador Intel Core i9 10900K, 3.70GHz (5.30GHz Turbo), 10ª Geração', '                    \r\n                    ', 0, 4, 1, '3.00', 0.4, 'processador-intel-core-i9-10900k-370ghz-530ghz-turbo-10-geracao-10-cores-20.png'),
(28, 'SSD Adata XPG SX8100 256GB', 'SSD Adata XPG SX8100 256GB, M.2 2280, Leitura 3500MBs e GravaÃ§Ã£o 3000MBs, ASX8100NP-256GT-C', 4, 6, 5, '2.55', 0.55, 'ssd-adata-xpg-sx8100.png'),
(25, 'Placa de Ví­deo Gigabyte GeForce RTX 3060', '                    \r\n                    ', 0, 2, 2, '4.00', 0.9, 'gigabyte-geforce-rtx-3060.png'),
(26, 'Placa de Ví­deo Gigabyte GeForce RTX 3070', '                    \r\n                    ', 0, 2, 2, '400.00', 190, 'placa-de-video-gigabyte-geforce-rtx-3070.png'),
(21, 'Memória DDR4 Geil Orion, 8GB 3600MHz', '                    \r\n                    ', 0, 10, 3, '350.00', 10, 'memoria-geil.png'),
(22, 'HD Western Digital Caviar Blue 1TB', '', 2, 8, 5, '397.00', NULL, 'hd-western.png');

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
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `itenspedidos`
--
ALTER TABLE `itenspedidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `Id_Marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
