-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2019 às 01:35
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `cd_anuncio` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `cd_marca` int(11) NOT NULL,
  `ds_modelo` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `dt_ano` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `cd_cor` int(11) NOT NULL,
  `ds_anuncio` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ds_preco` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `ds_descricao_anuncio` varchar(500) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `cd_cor` int(11) NOT NULL,
  `ds_cor` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`cd_cor`, `ds_cor`) VALUES
(1, 'Branco'),
(2, 'Preto'),
(3, 'Cinza'),
(4, 'Prata'),
(5, 'Azul'),
(6, 'Vermelho'),
(7, 'Bege'),
(8, 'Verde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `cd_estado` int(11) NOT NULL,
  `ds_estado` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`cd_estado`, `ds_estado`) VALUES
(1, 'Acre (AC)'),
(2, 'Alagoas (AL)'),
(3, 'Amapá (AP)'),
(4, 'Amazonas (AM)'),
(5, 'Bahia (BA)'),
(6, 'Ceará (CE)'),
(7, 'Distrito Federal (DF)'),
(8, 'Espírito Santo (ES)'),
(9, 'Goiás (GO)'),
(10, 'Maranhão (MA)'),
(11, 'Mato Grosso (MT)'),
(12, 'Mato Grosso do Sul (MS)'),
(13, 'Minas Gerais (MG)'),
(14, 'Pará (PA)'),
(15, 'Paraíba (PB)'),
(16, 'Paraná (PR)'),
(17, 'Pernambuco (PE)'),
(18, 'Piauí (PI)'),
(19, 'Rio de Janeiro (RJ)'),
(20, 'Rio Grande do Norte (RN)'),
(21, 'Rio Grande do Sul (RS)'),
(22, 'Rondônia (RO)'),
(23, 'Roraima (RR)'),
(24, 'Santa Catarina (SC)'),
(25, 'São Paulo (SP)'),
(26, 'Sergipe (SE)'),
(27, 'Tocantins (TO)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `cd_marca` int(11) NOT NULL,
  `ds_marca` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`cd_marca`, `ds_marca`) VALUES
(1, 'Toyota'),
(2, 'Volkswagen'),
(3, 'Ford'),
(4, 'Nissan'),
(5, 'Honda'),
(6, 'Hyundai'),
(7, 'Chevrolet'),
(8, 'Kia'),
(9, 'Renault'),
(10, 'Mercedes-Benz'),
(11, 'Peugeot'),
(12, 'BMW'),
(13, 'Audi'),
(14, 'Maruti'),
(15, 'Mazda'),
(16, 'Fiat'),
(17, 'Jeep'),
(18, 'Changan'),
(19, 'Geely'),
(20, 'Buick');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cd_usuario` int(11) NOT NULL,
  `cd_estado` int(11) NOT NULL,
  `ds_login` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `ds_senha` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `ds_usuario` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dt_nasc` date DEFAULT NULL,
  `ds_email` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `ds_cpf` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `ds_telefone` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `id_tipo_usuario` int(5) NOT NULL,
  `id_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cd_usuario`, `cd_estado`, `ds_login`, `ds_senha`, `ds_usuario`, `dt_nasc`, `ds_email`, `ds_cpf`, `ds_telefone`, `id_tipo_usuario`, `id_status`) VALUES
(1, 24, 'root', '123', 'Administrador', '1999-03-05', 'joao.santos@selbetti.com.br', '111.111.239-85', '47988883333', 2, 1),
(9, 24, 'admin', '123', 'Joao', '2001-01-01', 'joao.santos@selbetti.com.br', '111.111.111-11', '47988883333', 2, 1),
(10, 18, 'usuario', 'usuario', 'Usuário', '2017-12-02', 'joao.santos@selbetti.com.br', '111.111.111-11', '47988883333', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`cd_anuncio`),
  ADD KEY `anuncios_marca` (`cd_marca`),
  ADD KEY `anuncios_cores` (`cd_cor`),
  ADD KEY `anuncios_usuarios` (`cd_usuario`);

--
-- Índices para tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`cd_cor`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`cd_estado`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`cd_marca`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD KEY `usuarios_estados` (`cd_estado`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `cd_anuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `cd_cor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `cd_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `cd_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_cores` FOREIGN KEY (`cd_cor`) REFERENCES `cores` (`cd_cor`),
  ADD CONSTRAINT `anuncios_marca` FOREIGN KEY (`cd_marca`) REFERENCES `marcas` (`cd_marca`),
  ADD CONSTRAINT `anuncios_usuarios` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_estados` FOREIGN KEY (`cd_estado`) REFERENCES `estados` (`cd_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
