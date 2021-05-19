-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2021 às 21:48
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
-- Banco de dados: `av1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `periodo` int(1) NOT NULL,
  `idPreRequisito` int(11) DEFAULT NULL,
  `creditos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `nome`, `periodo`, `idPreRequisito`, `creditos`) VALUES
(11, 'Fundamentos de Algoritmos de Computação', 1, 0, 4),
(12, 'Introdução à Análise de Sistemas', 1, 0, 4),
(15, 'Matemática Básica', 1, 0, 4),
(23, 'Fundamentos de Programação', 2, 11, 4),
(26, 'Engenharia de Requisitos', 2, 12, 4),
(33, 'Desenvolvimento Web', 3, 21, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'Mateus Carvalho', 'matcarv17@gmail.com', '170701mat', 'Aluno'),
(2, 'Lucas Barroso', 'barLucas@gmail.com', 'lubar123', 'Professor\r\n'),
(3, 'Elaine Cornelia', 'elainecorn@gmail.com', '123456', 'Professor'),
(5, 'Charlene Teixeira', 'teichar@gmail.com', 'char1234', 'Coordenador'),
(6, 'Yasmin Sampaio', 'yassamp@gmail.com', 'y1s354amp', 'Aluno'),
(7, 'Mateus Martins', 'martinsmateus700@gmail.com', 'jabuticaba', 'Aluno'),
(8, 'Aline Angelim', 'anlimne@gmail.com', 'ligean', 'Coordenador\r\n');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12355;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
