-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Out-2019 às 21:49
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurigestor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogado`
--

CREATE TABLE `advogado` (
  `id` int(5) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `cliente_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogado_contraria`
--

CREATE TABLE `advogado_contraria` (
  `id` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `oab` varchar(15) DEFAULT NULL,
  `telefone` int(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `processo_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogado_processo`
--

CREATE TABLE `advogado_processo` (
  `id` int(5) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `processo_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id` int(5) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `caminho` tinytext NOT NULL,
  `cliente_id` int(5) DEFAULT NULL,
  `atendimento_id` int(5) DEFAULT NULL,
  `processo_id` int(5) DEFAULT NULL,
  `escritorio_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(5) NOT NULL,
  `dt` date NOT NULL,
  `relato` text NOT NULL,
  `cliente_id` int(5) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `escritorio_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `estado_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `documento` int(14) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `orgao_emissor` varchar(10) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `estado_civil` varchar(15) DEFAULT NULL,
  `profissao` varchar(45) DEFAULT NULL,
  `ctps` varchar(15) DEFAULT NULL,
  `filiacao1` varchar(60) DEFAULT NULL,
  `filiacao2` varchar(60) DEFAULT NULL,
  `endereco` varchar(60) NOT NULL,
  `num` int(10) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade_id` int(5) NOT NULL,
  `telefone` int(10) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `recado` int(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `razao_social` varchar(60) DEFAULT NULL,
  `ie` int(20) DEFAULT NULL,
  `observarcao` tinytext,
  `escritorio_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_processo`
--

CREATE TABLE `cliente_processo` (
  `id` int(5) NOT NULL,
  `cliente_id` int(5) NOT NULL,
  `processo_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escritorio`
--

CREATE TABLE `escritorio` (
  `id` int(5) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `documento` int(15) NOT NULL,
  `responsavel` varchar(60) NOT NULL,
  `telefone` int(10) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(5) NOT NULL,
  `nome` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `id` int(5) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `escritorio_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parte_contraria`
--

CREATE TABLE `parte_contraria` (
  `id` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `processo_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `id` int(5) NOT NULL,
  `num_processo` varchar(45) NOT NULL,
  `situacao` int(1) NOT NULL,
  `polo` int(1) NOT NULL,
  `tipo_processo` int(1) NOT NULL,
  `nome_acao` varchar(45) NOT NULL,
  `valor` decimal(9,2) DEFAULT NULL,
  `honorario` decimal(9,2) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `observacao` tinytext,
  `tribunal_id` int(5) NOT NULL,
  `cidade_id` int(5) NOT NULL,
  `tipo_acao_id` int(5) NOT NULL,
  `escritorio_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel_pj`
--

CREATE TABLE `responsavel_pj` (
  `id` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `orgao_emissor` varchar(10) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `estado_civil` varchar(15) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `telefone` int(10) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `filiacao1` varchar(60) NOT NULL,
  `filiacao2` varchar(60) DEFAULT NULL,
  `cliente_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_acao`
--

CREATE TABLE `tipo_acao` (
  `id` int(5) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `escritorio_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tribunal`
--

CREATE TABLE `tribunal` (
  `id` int(5) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `escritorio_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` int(11) NOT NULL,
  `telefone` int(10) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `oab` varchar(15) DEFAULT NULL,
  `advogado` int(1) NOT NULL,
  `ativo` int(1) NOT NULL,
  `escritorio_id` int(5) NOT NULL,
  `nivel_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advogado`
--
ALTER TABLE `advogado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `advogado_contraria`
--
ALTER TABLE `advogado_contraria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processo_id` (`processo_id`);

--
-- Indexes for table `advogado_processo`
--
ALTER TABLE `advogado_processo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `processo_id` (`processo_id`);

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `atendimento_id` (`atendimento_id`),
  ADD KEY `processo_id` (`processo_id`),
  ADD KEY `escritorio_id` (`escritorio_id`);

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `escritorio_id` (`escritorio_id`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escritorio_id` (`escritorio_id`),
  ADD KEY `cidade_id` (`cidade_id`);

--
-- Indexes for table `cliente_processo`
--
ALTER TABLE `cliente_processo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `processo_id` (`processo_id`);

--
-- Indexes for table `escritorio`
--
ALTER TABLE `escritorio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escritorio_id` (`escritorio_id`);

--
-- Indexes for table `parte_contraria`
--
ALTER TABLE `parte_contraria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processo_id` (`processo_id`);

--
-- Indexes for table `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tribunal_id` (`tribunal_id`),
  ADD KEY `cidade_id` (`cidade_id`),
  ADD KEY `tipo_acao_id` (`tipo_acao_id`),
  ADD KEY `escritorio_id` (`escritorio_id`);

--
-- Indexes for table `responsavel_pj`
--
ALTER TABLE `responsavel_pj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `tipo_acao`
--
ALTER TABLE `tipo_acao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escritorio_id` (`escritorio_id`);

--
-- Indexes for table `tribunal`
--
ALTER TABLE `tribunal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escritorio_id` (`escritorio_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nivel_id` (`nivel_id`),
  ADD KEY `escritorio_id` (`escritorio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advogado`
--
ALTER TABLE `advogado`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advogado_contraria`
--
ALTER TABLE `advogado_contraria`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advogado_processo`
--
ALTER TABLE `advogado_processo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente_processo`
--
ALTER TABLE `cliente_processo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escritorio`
--
ALTER TABLE `escritorio`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parte_contraria`
--
ALTER TABLE `parte_contraria`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `processo`
--
ALTER TABLE `processo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responsavel_pj`
--
ALTER TABLE `responsavel_pj`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_acao`
--
ALTER TABLE `tipo_acao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tribunal`
--
ALTER TABLE `tribunal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `advogado`
--
ALTER TABLE `advogado`
  ADD CONSTRAINT `advogado_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `advogado_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `advogado_contraria`
--
ALTER TABLE `advogado_contraria`
  ADD CONSTRAINT `advogado_contraria_ibfk_1` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`);

--
-- Limitadores para a tabela `advogado_processo`
--
ALTER TABLE `advogado_processo`
  ADD CONSTRAINT `advogado_processo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `advogado_processo_ibfk_2` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`);

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `arquivo_ibfk_2` FOREIGN KEY (`atendimento_id`) REFERENCES `atendimento` (`id`),
  ADD CONSTRAINT `arquivo_ibfk_3` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`),
  ADD CONSTRAINT `arquivo_ibfk_4` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `atendimento_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `atendimento_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `atendimento_ibfk_3` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`);

--
-- Limitadores para a tabela `cliente_processo`
--
ALTER TABLE `cliente_processo`
  ADD CONSTRAINT `cliente_processo_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `cliente_processo_ibfk_2` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`);

--
-- Limitadores para a tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD CONSTRAINT `nivel_acesso_ibfk_1` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);

--
-- Limitadores para a tabela `parte_contraria`
--
ALTER TABLE `parte_contraria`
  ADD CONSTRAINT `parte_contraria_ibfk_1` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`);

--
-- Limitadores para a tabela `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `processo_ibfk_1` FOREIGN KEY (`tribunal_id`) REFERENCES `tribunal` (`id`),
  ADD CONSTRAINT `processo_ibfk_2` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `processo_ibfk_3` FOREIGN KEY (`tipo_acao_id`) REFERENCES `tipo_acao` (`id`),
  ADD CONSTRAINT `processo_ibfk_4` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);

--
-- Limitadores para a tabela `responsavel_pj`
--
ALTER TABLE `responsavel_pj`
  ADD CONSTRAINT `responsavel_pj_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `tipo_acao`
--
ALTER TABLE `tipo_acao`
  ADD CONSTRAINT `tipo_acao_ibfk_1` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);

--
-- Limitadores para a tabela `tribunal`
--
ALTER TABLE `tribunal`
  ADD CONSTRAINT `tribunal_ibfk_1` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nivel_id`) REFERENCES `nivel_acesso` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`escritorio_id`) REFERENCES `escritorio` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
