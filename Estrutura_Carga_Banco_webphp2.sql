/*-----------------------------------------------------*/
/*Criando database*/
/*-----------------------------------------------------*/

CREATE DATABASE webphp6;

/*-----------------------------------------------------*/
/*Criando tabelas*/
/*-----------------------------------------------------*/

CREATE TABLE `anuncios` (
  `cd_anuncio` int(11) NOT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `cd_marca` int(11) DEFAULT NULL,
  `ds_modelo` varchar(150) NOT NULL,
  `dt_ano` varchar(5) NOT NULL,
  `cd_cor` int(11) DEFAULT NULL,
  `ds_anuncio` varchar(50) NOT NULL,
  `ds_preco` varchar(100) NOT NULL,
  `ds_descricao_anuncio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*-----------------------------------------------------*/

CREATE TABLE `cores` (
  `cd_cor` int(11) NOT NULL,
  `ds_cor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*-----------------------------------------------------*/

CREATE TABLE `estados` (
  `cd_estado` int(11) NOT NULL,
  `ds_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*-----------------------------------------------------*/

CREATE TABLE `marcas` (
  `cd_marca` int(11) NOT NULL,
  `ds_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*-----------------------------------------------------*/

CREATE TABLE `usuarios` (
  `cd_usuario` int(11) NOT NULL,
  `cd_estado` int(11) DEFAULT NULL,
  `ds_login` varchar(30) NOT NULL,
  `ds_senha` varchar(30) NOT NULL,
  `ds_usuario` varchar(100) NOT NULL,
  `dt_nasc` date NOT NULL,
  `ds_email` varchar(100) NOT NULL,
  `ds_cpf` varchar(20) NOT NULL,
  `ds_telefone` varchar(20) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*-----------------------------------------------------*/
/*Cargas de dados na tabela*/
/*-----------------------------------------------------*/

INSERT INTO `anuncios` (`cd_anuncio`, `cd_usuario`, `cd_marca`, `ds_modelo`, `dt_ano`, `cd_cor`, `ds_anuncio`, `ds_preco`, `ds_descricao_anuncio`) VALUES
(1, 2, 2, 'Fox', '2018', 6, 'Carro Usado!', '47.000,00', 'Carro com 20.000 km, preciso do dinheiro para dar entrada em uma casa!');

/*-----------------------------------------------------*/

INSERT INTO `cores` (`cd_cor`, `ds_cor`) VALUES
(1, 'Branco'),
(2, 'Preto'),
(3, 'Cinza'),
(4, 'Prata'),
(5, 'Azul'),
(6, 'Vermelho'),
(7, 'Bege'),
(8, 'Verde');

/*-----------------------------------------------------*/

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

/*-----------------------------------------------------*/

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

/*-----------------------------------------------------*/

INSERT INTO `usuarios` (`cd_usuario`, `cd_estado`, `ds_login`, `ds_senha`, `ds_usuario`, `dt_nasc`, `ds_email`, `ds_cpf`, `ds_telefone`, `id_tipo_usuario`, `id_status`) VALUES
(1, 24, 'root', '123', 'Administrador', '1999-03-05', 'joao.santos@selbetti.com.br', '111.111.239-85', '(47) 98888-3333', 2, 1),
(2, 18, 'usuario', 'usuario', 'Usuário', '2017-12-02', 'joao.santos@selbetti.com.br', '111.111.111-11', '(47) 98888-3333', 1, 1);

/*-----------------------------------------------------*/

/*-----------------------------------------------------*/
/*Criando indices das tabelas*/
/*-----------------------------------------------------*/

/*Índices para tabela anuncios*/
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`cd_anuncio`),
  ADD KEY `anuncios_cores` (`cd_cor`),
  ADD KEY `anuncios_usuarios` (`cd_usuario`),
  ADD KEY `anuncios_marcas` (`cd_marca`);

/*-----------------------------------------------------*/

/*Índices para tabela cores*/
ALTER TABLE `cores`
  ADD PRIMARY KEY (`cd_cor`);

/*-----------------------------------------------------*/

/*Índices para tabela estados*/
ALTER TABLE `estados`
  ADD PRIMARY KEY (`cd_estado`);

/*-----------------------------------------------------*/

/*Índices para tabela marcas*/
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`cd_marca`);

/*-----------------------------------------------------*/

/*Índices para tabela usuarios*/
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD KEY `usuarios_estados` (`cd_estado`);

/*-----------------------------------------------------*/

/*-----------------------------------------------------*/
/*Criando AUTO_INCREMENT das tabelas*/
/*-----------------------------------------------------*/

/*AUTO_INCREMENT de tabela anuncios*/
ALTER TABLE `anuncios`
  MODIFY `cd_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*-----------------------------------------------------*/

/*AUTO_INCREMENT de tabela cores*/
ALTER TABLE `cores`
  MODIFY `cd_cor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

/*-----------------------------------------------------*/

/*AUTO_INCREMENT de tabela estados*/
ALTER TABLE `estados`
  MODIFY `cd_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

/*-----------------------------------------------------*/

/*AUTO_INCREMENT de tabela marcas*/
ALTER TABLE `marcas`
  MODIFY `cd_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

/*AUTO_INCREMENT de tabela usuarios*/
ALTER TABLE `usuarios`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*-----------------------------------------------------*/

/*-----------------------------------------------------*/
/*Criando ON DELETE SET NULL nas tabelas com FK*/
/*-----------------------------------------------------*/

/*ON DELETE SET NULL para tabela anuncios*/
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_cores` FOREIGN KEY (`cd_cor`) REFERENCES `cores` (`cd_cor`) ON DELETE SET NULL,
  ADD CONSTRAINT `anuncios_marcas` FOREIGN KEY (`cd_marca`) REFERENCES `marcas` (`cd_marca`) ON DELETE SET NULL,
  ADD CONSTRAINT `anuncios_usuarios` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE SET NULL;

/*-----------------------------------------------------*/

/*ON DELETE SET NULL para tabela usuarios*/
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_estados` FOREIGN KEY (`cd_estado`) REFERENCES `estados` (`cd_estado`) ON DELETE SET NULL;

/*-----------------------------------------------------*/