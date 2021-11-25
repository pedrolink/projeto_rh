-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2021 às 01:34
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_projeto_rh`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos_vaga`
--

CREATE TABLE `candidatos_vaga` (
  `id` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pontos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias_usuario`
--

CREATE TABLE `competencias_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `habilidades` varchar(800) NOT NULL,
  `pretencao_salarial` decimal(15,2) NOT NULL,
  `nivel` int(11) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco_principal` varchar(150) NOT NULL,
  `endereco_secundario` varchar(150) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `telefone_primario` varchar(50) NOT NULL,
  `telefone_secundario` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nivel_ingles` int(11) NOT NULL,
  `url_linkedin` varchar(250) NOT NULL,
  `imagem_usuario` varchar(300) NOT NULL,
  `cep` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao_banco_talentos`
--

CREATE TABLE `gestao_banco_talentos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao_candidatos_selecionados`
--

CREATE TABLE `gestao_candidatos_selecionados` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisitos_vagas`
--

CREATE TABLE `requisitos_vagas` (
  `id` int(11) NOT NULL,
  `requisitos` varchar(800) NOT NULL,
  `id_vaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `tipo_permissao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `descricao` varchar(800) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL,
  `salario` decimal(15,2) NOT NULL,
  `nivel_ingles` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `ativa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidatos_vaga`
--
ALTER TABLE `candidatos_vaga`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `competencias_usuario`
--
ALTER TABLE `competencias_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `gestao_candidatos_selecionados`
--
ALTER TABLE `gestao_candidatos_selecionados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `requisitos_vagas`
--
ALTER TABLE `requisitos_vagas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidatos_vaga`
--
ALTER TABLE `candidatos_vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `competencias_usuario`
--
ALTER TABLE `competencias_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gestao_candidatos_selecionados`
--
ALTER TABLE `gestao_candidatos_selecionados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `requisitos_vagas`
--
ALTER TABLE `requisitos_vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
