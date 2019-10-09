-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Maio-2019 às 06:40
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `Matricula` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `DataNascimento` varchar(11) NOT NULL,
  `Sexo` varchar(12) NOT NULL,
  `Email` varchar(32) DEFAULT NULL,
  `DataRegistro` varchar(11) DEFAULT NULL,
  `Telefone` varchar(11) DEFAULT NULL,
  `Turma` int(11) NOT NULL,
  `Turma_ID` int(11) NOT NULL,
  `Usuario_ID` int(11) NOT NULL,
  `Responsavel_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`Matricula`, `Nome`, `CPF`, `DataNascimento`, `Sexo`, `Email`, `DataRegistro`, `Telefone`, `Turma`, `Turma_ID`, `Usuario_ID`, `Responsavel_ID`) VALUES
(3, 'Paulo Henrique Oliveira do Bomfo,', '', '25/06/2001', 'Masculino', NULL, NULL, NULL, 1, 1, 1, 3),
(954, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 21, 3),
(95465, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 25, 3),
(9354549, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 19, 3),
(9354550, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 27, 3),
(9354551, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 29, 3),
(9354552, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 31, 3),
(9354553, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 33, 3),
(9354554, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 34, 3),
(9354555, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 36, 3),
(9354556, 'A', '767-567-567 -5', '05/07/2056', 'Feminino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 38, 3),
(9354557, 'Adriano', '767-567-567 -5', '05/07/2056', 'Masculino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 40, 3),
(9354558, 'Adriano', '767-567-567 -5', '05/07/2056', 'Masculino', 'paulo.henrique@gmail.com', NULL, '(65) 75675-', 1, 1, 42, 3),
(9354559, 'Paulo H', '546-456-456 -4', '09/06/2054', 'Masculino', 'pausad@gmail.vom', NULL, '(56) 45645-', 1, 1, 71, 11),
(9354560, 'Paulo H', '546-456-456 -4', '09/06/2054', 'Masculino', 'pausad@gmail.vom', NULL, '(56) 45645-', 1, 1, 73, 12),
(9354561, 'Lucas Araujo Fariias', '567-567-567 -5', '', 'Masculino', 'lucas4384@gmail.com', NULL, '(76) 76575-', 1, 1, 76, 12),
(9354562, 'Paulo H', '', '', 'Feminino', 'pausad@gmail.vom', NULL, '', 1, 1, 77, 10),
(9354564, 'Paulo Henrique Oliveira do Bonfim', '', '', 'Feminino', '', NULL, '', 7, 7, 79, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_has_ambiente_virtual`
--

CREATE TABLE `aluno_has_ambiente_virtual` (
  `Aluno_Matricula` int(11) NOT NULL,
  `Ambiente_Virtual_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente_virtual`
--

CREATE TABLE `ambiente_virtual` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Conteudo` varchar(45) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente_virtual_has_professor`
--

CREATE TABLE `ambiente_virtual_has_professor` (
  `Ambiente_Virtual_ID` int(11) NOT NULL,
  `Professor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente_virtual_has_responsavel`
--

CREATE TABLE `ambiente_virtual_has_responsavel` (
  `Ambiente_Virtual_ID` int(11) NOT NULL,
  `Responsavel_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

CREATE TABLE `avisos` (
  `ID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Conteudo` text,
  `Data` varchar(11) DEFAULT NULL,
  `Hora` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Usuario_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

CREATE TABLE `calendario` (
  `ID` int(11) NOT NULL,
  `Data` date DEFAULT NULL,
  `Hora` datetime DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Conteudo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_online`
--

CREATE TABLE `chat_online` (
  `ID` int(11) NOT NULL,
  `EmissarioID` int(11) DEFAULT NULL,
  `ReceptorID` int(11) DEFAULT NULL,
  `Mensagem` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dicsiplina`
--

CREATE TABLE `dicsiplina` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dicsiplina`
--

INSERT INTO `dicsiplina` (`ID`, `Nome`) VALUES
(1, 'Português'),
(2, 'Matematica'),
(3, 'Historia'),
(4, 'Fisica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `ID` int(11) NOT NULL,
  `Falta` int(11) DEFAULT NULL,
  `Turma_ID` int(11) NOT NULL,
  `Dicsiplina_ID` int(11) NOT NULL,
  `Professor_ID` int(11) NOT NULL,
  `Aluno_Matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `ID` int(11) NOT NULL,
  `Perfil` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`ID`, `Perfil`) VALUES
(1, 'Administrador'),
(2, 'Funcionario'),
(3, 'Professor'),
(4, 'Responsavel'),
(5, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `DataNascimento` varchar(11) DEFAULT NULL,
  `Usuario_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_tem_turma`
--

CREATE TABLE `professor_tem_turma` (
  `Professor_ID` int(11) NOT NULL,
  `Turma_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Parentesco` varchar(10) NOT NULL,
  `DataNascimento` varchar(11) NOT NULL,
  `Telefone` varchar(11) DEFAULT NULL,
  `Email` varchar(60) NOT NULL,
  `Usuario_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`ID`, `Nome`, `CPF`, `Parentesco`, `DataNascimento`, `Telefone`, `Email`, `Usuario_ID`) VALUES
(3, 'Irinel', '', 'Pai', '', NULL, '', 2),
(4, '567', '45', 'Pai', '54', '54', 'lucas@gmail.com', 41),
(5, 'Maria Dos Santos', '567', 'Pai', '54', '54', 'maria@gmail.com', 43),
(6, 'Maria Dos Santos', '45', 'Pai', '54', '54', 'maria@gmail.com', 45),
(7, 'Maria Dos Santos', '45', 'Pai', '54', '54', 'maria@gmail.com', 47),
(8, 'Maria Dos Santos', '45', 'Pai', '54', '54', 'maria@gmail.com', 49),
(9, 'Maria Dos Santos', '45', 'Pai', '54', '54', 'maria@gmail.com', 51),
(10, 'Maria Dos Santos', '45', 'Pai', '54', '54', 'maria@gmail.com', 53),
(11, '567', '', 'Pai', '', '', 'paulo.henrique@gmail.com', 70),
(12, 'Maria Dos Santos', '49324324', 'Mae', '324234', '342432324', 'maria@gmail.com', 72);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Etapa` varchar(45) NOT NULL,
  `Turno` varchar(45) NOT NULL,
  `Data_Inicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Qtd_Alunos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`ID`, `Nome`, `Etapa`, `Turno`, `Data_Inicio`, `Qtd_Alunos`) VALUES
(1, 'E', '1° Ano do Ensino Médio ', 'Matutino', '2019-05-03 03:04:51', 50),
(2, '', '6° Ano Ensino Fundamental', 'Matutino', NULL, 0),
(3, 'B', '8° Ano Ensino Fundamental', 'Matutino', '2019-05-08 03:02:52', 43),
(4, 'C', '6° Ano Ensino Fundamental', 'Matutino', '2019-05-08 03:04:12', 32),
(5, 'D', '7° Ano Ensino Fundamental', 'Matutino', '2019-05-08 03:04:59', 32),
(6, 'F', '6° Ano Ensino Fundamental', 'Matutino', '2019-05-08 03:05:39', 7),
(7, 'G', '6° Ano Ensino Fundamental', 'Matutino', '2019-05-08 03:08:19', 7),
(8, 'H', '8° Ano Ensino Fundamental', 'Matutino', '2019-05-08 03:08:59', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_tem_dicsiplina`
--

CREATE TABLE `turma_tem_dicsiplina` (
  `Turma_ID` int(11) NOT NULL,
  `Dicsiplina_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma_tem_dicsiplina`
--

INSERT INTO `turma_tem_dicsiplina` (`Turma_ID`, `Dicsiplina_ID`) VALUES
(7, 2),
(8, 1),
(8, 2),
(8, 3),
(8, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Perfil_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `Login`, `Senha`, `Perfil_ID`) VALUES
(1, 'alunoteste', '1234', 5),
(2, 'responsavelteste', '1234', 4),
(3, 'paulo.henrique@gmail.com', '567', 4),
(4, 'paulo.henrique@gmail.com', '54', 5),
(5, 'paulo.henrique@gmail.com', '567', 4),
(6, 'paulo.henrique@gmail.com', '54', 5),
(7, 'paulo.henrique@gmail.com', '567', 4),
(8, 'paulo.henrique@gmail.com', '54', 5),
(9, 'paulo.henrique@gmail.com', '54', 5),
(10, 'paulo.henrique@gmail.com', '54', 4),
(11, 'paulo.henrique@gmail.com', '54', 5),
(12, 'paulo.henrique@gmail.com', '54', 4),
(13, 'paulo.henrique@gmail.com', '54', 5),
(14, 'paulo.henrique@gmail.com', '54', 4),
(15, 'paulo.henrique@gmail.com', '54', 5),
(16, 'paulo.henrique@gmail.com', '54', 5),
(17, 'paulo.henrique@gmail.com', '54', 4),
(18, 'paulo.henrique@gmail.com', '54', 5),
(19, 'paulo.henrique@gmail.com', '54', 5),
(20, 'paulo.henrique@gmail.com', '54', 5),
(21, 'paulo.henrique@gmail.com', '54', 5),
(22, 'paulo.henrique@gmail.com', '567', 4),
(23, 'paulo.henrique@gmail.com', '54', 5),
(24, 'paulo.henrique@gmail.com', '54', 4),
(25, 'paulo.henrique@gmail.com', '54', 5),
(26, 'paulo.henrique@gmail.com', '54', 4),
(27, 'paulo.henrique@gmail.com67', '789', 5),
(28, 'paulo.henrique@gmail.com', '54', 4),
(29, 'paulo.henrique@gmail.com67', '789', 5),
(30, 'paulo.henrique@gmail.com', '54', 4),
(31, 'paulo.henrique@gmail.com67', '789', 5),
(32, 'paulo.henrique@gmail.com', '54', 4),
(33, 'paulo.henrique@gmail.com67', '789', 5),
(34, 'paulo.henrique@gmail.com67', '789', 5),
(35, 'paulo.henrique@gmail.com', '54', 4),
(36, 'paulo.henrique@gmail.com67', '789', 5),
(37, 'lucas@gmail.com', '54', 4),
(38, 'paulo.henrique@gmail.com67', '789', 5),
(39, 'lucas@gmail.com', 'ayfw5265', 4),
(40, 'paulo.henrique@gmail.com67', 'cnxc7141', 5),
(41, 'lucas@gmail.com', 'xhij6648', 4),
(42, 'paulo.henrique@gmail.com67', 'pbsm1115', 5),
(43, 'maria@gmail.com', 'agww7141', 4),
(44, 'gustavo@gmail.com', 'pbsm1115', 5),
(45, 'maria@gmail.com', 'iset5544', 4),
(46, 'gustavo@gmail.com', 'gdsm4528', 5),
(47, 'maria@gmail.com', 'iset5544', 4),
(48, 'gustavo@gmail.com', 'gdsm4528', 5),
(49, 'maria@gmail.com', 'iset5544', 4),
(50, 'gustavo@gmail.com', 'gdsm4528', 5),
(51, 'maria@gmail.com', 'iset5544', 4),
(52, 'gustavo@gmail.com', 'gdsm4528', 5),
(53, 'maria@gmail.com', 'iset5544', 4),
(54, 'gustavo@gmail.com', 'gdsm4528', 5),
(55, 'gustavo@gmail.com', 'gdsm4528', 5),
(56, 'gustavo@gmail.com', 'gdsm4528', 5),
(57, 'gustavo@gmail.com', 'rfjc1528', 5),
(58, 'gustavo@gmail.com', 'rfjc1528', 5),
(59, 'gustavo@gmail.com', 'rfjc1528', 5),
(60, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(61, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(62, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(63, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(64, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(65, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(66, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(67, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(68, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(69, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(70, 'paulo.henrique@gmail.com', 'bfpj8356', 4),
(71, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(72, 'maria@gmail.com', 'kyqn6182', 4),
(73, 'paulo.henrique@gmail.com', 'cqhr8145', 5),
(74, '', '', 5),
(75, 'lucas4384@gmail.com', 'slku8425', 5),
(76, 'lucas4384@gmail.com', 'uyxd7776', 5),
(77, 'paulo.henrique@gmail.com', 'qmkd1114', 5),
(78, 'paulo.henrique@gmail.com', 'ktcp8258', 5),
(79, 'paulo.henrique@gmail.com', 'qhqv1683', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `fk_Aluno_Turma1_idx` (`Turma_ID`),
  ADD KEY `fk_Aluno_Usuario1_idx` (`Usuario_ID`),
  ADD KEY `fk_Aluno_Responsavel1_idx` (`Responsavel_ID`);

--
-- Indexes for table `aluno_has_ambiente_virtual`
--
ALTER TABLE `aluno_has_ambiente_virtual`
  ADD PRIMARY KEY (`Aluno_Matricula`,`Ambiente_Virtual_ID`),
  ADD KEY `fk_Aluno_has_Ambiente_Virtual_Ambiente_Virtual1_idx` (`Ambiente_Virtual_ID`),
  ADD KEY `fk_Aluno_has_Ambiente_Virtual_Aluno1_idx` (`Aluno_Matricula`);

--
-- Indexes for table `ambiente_virtual`
--
ALTER TABLE `ambiente_virtual`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ambiente_virtual_has_professor`
--
ALTER TABLE `ambiente_virtual_has_professor`
  ADD PRIMARY KEY (`Ambiente_Virtual_ID`,`Professor_ID`),
  ADD KEY `fk_Ambiente_Virtual_has_Professor_Professor1_idx` (`Professor_ID`),
  ADD KEY `fk_Ambiente_Virtual_has_Professor_Ambiente_Virtual1_idx` (`Ambiente_Virtual_ID`);

--
-- Indexes for table `ambiente_virtual_has_responsavel`
--
ALTER TABLE `ambiente_virtual_has_responsavel`
  ADD PRIMARY KEY (`Ambiente_Virtual_ID`,`Responsavel_ID`),
  ADD KEY `fk_Ambiente_Virtual_has_Responsavel_Responsavel1_idx` (`Responsavel_ID`),
  ADD KEY `fk_Ambiente_Virtual_has_Responsavel_Ambiente_Virtual1_idx` (`Ambiente_Virtual_ID`);

--
-- Indexes for table `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Avisos_Usuario1_idx` (`Usuario_ID`);

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chat_online`
--
ALTER TABLE `chat_online`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dicsiplina`
--
ALTER TABLE `dicsiplina`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Frequencia_Turma1_idx` (`Turma_ID`),
  ADD KEY `fk_Frequencia_Dicsiplina1_idx` (`Dicsiplina_ID`),
  ADD KEY `fk_Frequencia_Professor1_idx` (`Professor_ID`),
  ADD KEY `fk_Frequencia_Aluno1_idx` (`Aluno_Matricula`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Professor_Usuario1_idx` (`Usuario_ID`);

--
-- Indexes for table `professor_tem_turma`
--
ALTER TABLE `professor_tem_turma`
  ADD PRIMARY KEY (`Professor_ID`,`Turma_ID`),
  ADD KEY `fk_Professor_has_Turma_Turma1_idx` (`Turma_ID`),
  ADD KEY `fk_Professor_has_Turma_Professor1_idx` (`Professor_ID`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Responsavel_Usuario1_idx` (`Usuario_ID`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `turma_tem_dicsiplina`
--
ALTER TABLE `turma_tem_dicsiplina`
  ADD PRIMARY KEY (`Turma_ID`,`Dicsiplina_ID`),
  ADD KEY `fk_Turma_has_Dicsiplina_Dicsiplina1_idx` (`Dicsiplina_ID`),
  ADD KEY `fk_Turma_has_Dicsiplina_Turma1_idx` (`Turma_ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Usuario_Perfil1_idx` (`Perfil_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9354565;

--
-- AUTO_INCREMENT for table `ambiente_virtual`
--
ALTER TABLE `ambiente_virtual`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avisos`
--
ALTER TABLE `avisos`
  MODIFY `ID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_online`
--
ALTER TABLE `chat_online`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dicsiplina`
--
ALTER TABLE `dicsiplina`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_Aluno_Responsavel1` FOREIGN KEY (`Responsavel_ID`) REFERENCES `responsavel` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Aluno_Turma1` FOREIGN KEY (`Turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Aluno_Usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aluno_has_ambiente_virtual`
--
ALTER TABLE `aluno_has_ambiente_virtual`
  ADD CONSTRAINT `fk_Aluno_has_Ambiente_Virtual_Aluno1` FOREIGN KEY (`Aluno_Matricula`) REFERENCES `aluno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Aluno_has_Ambiente_Virtual_Ambiente_Virtual1` FOREIGN KEY (`Ambiente_Virtual_ID`) REFERENCES `ambiente_virtual` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ambiente_virtual_has_professor`
--
ALTER TABLE `ambiente_virtual_has_professor`
  ADD CONSTRAINT `fk_Ambiente_Virtual_has_Professor_Ambiente_Virtual1` FOREIGN KEY (`Ambiente_Virtual_ID`) REFERENCES `ambiente_virtual` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ambiente_Virtual_has_Professor_Professor1` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ambiente_virtual_has_responsavel`
--
ALTER TABLE `ambiente_virtual_has_responsavel`
  ADD CONSTRAINT `fk_Ambiente_Virtual_has_Responsavel_Ambiente_Virtual1` FOREIGN KEY (`Ambiente_Virtual_ID`) REFERENCES `ambiente_virtual` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ambiente_Virtual_has_Responsavel_Responsavel1` FOREIGN KEY (`Responsavel_ID`) REFERENCES `responsavel` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `fk_Avisos_Usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `fk_Frequencia_Aluno1` FOREIGN KEY (`Aluno_Matricula`) REFERENCES `aluno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Frequencia_Dicsiplina1` FOREIGN KEY (`Dicsiplina_ID`) REFERENCES `dicsiplina` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Frequencia_Professor1` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Frequencia_Turma1` FOREIGN KEY (`Turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_Professor_Usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor_tem_turma`
--
ALTER TABLE `professor_tem_turma`
  ADD CONSTRAINT `fk_Professor_has_Turma_Professor1` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Professor_has_Turma_Turma1` FOREIGN KEY (`Turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD CONSTRAINT `fk_Responsavel_Usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_tem_dicsiplina`
--
ALTER TABLE `turma_tem_dicsiplina`
  ADD CONSTRAINT `fk_Turma_has_Dicsiplina_Dicsiplina1` FOREIGN KEY (`Dicsiplina_ID`) REFERENCES `dicsiplina` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Turma_has_Dicsiplina_Turma1` FOREIGN KEY (`Turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Perfil1` FOREIGN KEY (`Perfil_ID`) REFERENCES `perfil` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
