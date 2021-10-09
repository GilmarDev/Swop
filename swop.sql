-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2021 às 16:06
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `swop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_desejado`
--

CREATE TABLE `servico_desejado` (
  `id_servico2` int(11) NOT NULL,
  `categoria_servico_desejado` varchar(30) NOT NULL,
  `servico_desejado` varchar(100) NOT NULL,
  `status_servico_desejado` smallint(6) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_oferecido`
--

CREATE TABLE `servico_oferecido` (
  `id_servico1` int(11) NOT NULL,
  `servico_oferecido` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `categoria_servico_oferecido` varchar(50) NOT NULL,
  `status_servico_oferecido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_escambo_swop`
--

CREATE TABLE `tb_escambo_swop` (
  `id_escambo_swop` int(11) NOT NULL,
  `id_servico1` int(11) NOT NULL,
  `id_usuario1` int(11) NOT NULL,
  `id_servico2` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `data_entrega_servico1` date NOT NULL,
  `data_entrega_servico2` date NOT NULL,
  `feedback_servico1` varchar(100) NOT NULL,
  `nota_servico_prestado` char(1) NOT NULL,
  `nota_usuario` char(1) NOT NULL,
  `feedback_servico2` varchar(100) NOT NULL,
  `data_cadastro_site` date NOT NULL,
  `status_escambo_swop` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `tipo_telefone` varchar(20) NOT NULL,
  `status_telefone` smallint(6) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id_telefone`, `telefone`, `tipo_telefone`, `status_telefone`, `id_usuario`) VALUES
(1, '(11)98768-0987', 'Celular', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `tipo_logradouro` varchar(20) NOT NULL,
  `logradouro` varchar(20) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `tipo_telefone` varchar(20) NOT NULL,
  `telefone2` varchar(15) NOT NULL,
  `tipo_telefone2` varchar(20) NOT NULL,
  `data_cadastro` date NOT NULL,
  `status_usuario` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `tipo_logradouro`, `logradouro`, `numero`, `estado`, `cidade`, `bairro`, `cep`, `complemento`, `telefone`, `tipo_telefone`, `telefone2`, `tipo_telefone2`, `data_cadastro`, `status_usuario`) VALUES
(1, 'ADM', 'adm@swop.com.br', '5555', 'Casa', 'Rua Mario', '73', 'SP', 'Guarulhos', 'Vila Progresso', '07040040', 'Apto 16', '', '', '', '', '2021-06-07', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `servico_desejado`
--
ALTER TABLE `servico_desejado`
  ADD PRIMARY KEY (`id_servico2`),
  ADD KEY `fk_cadastro_usuario_servico_desejo` (`id_usuario`);

--
-- Índices para tabela `servico_oferecido`
--
ALTER TABLE `servico_oferecido`
  ADD PRIMARY KEY (`id_servico1`),
  ADD KEY `fk_cadastro_usuario_servico_oferecido` (`id_usuario`);

--
-- Índices para tabela `tb_escambo_swop`
--
ALTER TABLE `tb_escambo_swop`
  ADD PRIMARY KEY (`id_escambo_swop`),
  ADD KEY `fk_escampo_swop_id_servico1` (`id_servico1`),
  ADD KEY `fk_escampo_swop_id_servico2` (`id_servico2`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id_telefone`),
  ADD KEY `fk_cadastro_usuario_telefone_usuario` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `servico_desejado`
--
ALTER TABLE `servico_desejado`
  MODIFY `id_servico2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `servico_oferecido`
--
ALTER TABLE `servico_oferecido`
  MODIFY `id_servico1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_escambo_swop`
--
ALTER TABLE `tb_escambo_swop`
  MODIFY `id_escambo_swop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `servico_desejado`
--
ALTER TABLE `servico_desejado`
  ADD CONSTRAINT `fk_cadastro_usuario_servico_desejo` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `servico_oferecido`
--
ALTER TABLE `servico_oferecido`
  ADD CONSTRAINT `fk_cadastro_usuario_servico_oferecido` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `tb_escambo_swop`
--
ALTER TABLE `tb_escambo_swop`
  ADD CONSTRAINT `fk_escampo_swop_id_servico1` FOREIGN KEY (`id_servico1`) REFERENCES `servico_oferecido` (`id_servico1`),
  ADD CONSTRAINT `fk_escampo_swop_id_servico2` FOREIGN KEY (`id_servico2`) REFERENCES `servico_desejado` (`id_servico2`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_cadastro_usuario_telefone_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
