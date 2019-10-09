-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Abr-2019 às 12:26
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
-- Database: `escoladb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos2`
--

CREATE TABLE `alunos2` (
  `Nome` varchar(40) DEFAULT NULL,
  `DataNascimento` varchar(25) DEFAULT NULL,
  `Sexo` varchar(15) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `DataRegistro` varchar(15) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Matricula` int(11) NOT NULL,
  `CPF` varchar(15) DEFAULT NULL,
  `Turma` varchar(10) DEFAULT NULL,
  `fk_Turmas_Codigo` int(11) DEFAULT NULL,
  `IDResponsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos2`
--

INSERT INTO `alunos2` (`Nome`, `DataNascimento`, `Sexo`, `Email`, `DataRegistro`, `Telefone`, `Matricula`, `CPF`, `Turma`, `fk_Turmas_Codigo`, `IDResponsavel`) VALUES
('Pedro Henrique', '03/02/2001', 'Masculino', 'PedroHenrique@gmail.com', NULL, '(23) 34234-2342', 1907, '234-234-234 -23', '4', 4, 10),
('Beatriz da Costa', '04/03/1999', 'Feminino', 'BeatrizdaCosta@gmail.com', NULL, '(33) 25435-3453', 1908, '435-345-345 -34', '2', 2, 4),
('Jaqueline Silveira', '04/03/2003', 'Feminino', 'JaquelineSilveira@gmail.c', NULL, '(34) 23423-4242', 1909, '234-234-234 -23', '7', 7, NULL),
('Paulo Henrique Oliveira do Bonfim', '04/03/2042', 'Masculino', 'paulo.henrique@gmail.com', NULL, '(23) 42324-2342', 1912, '234-234-234 -23', '2', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

CREATE TABLE `avisos` (
  `Codigo` int(11) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Data` varchar(15) NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `Conteudo` text NOT NULL,
  `Hora` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avisos`
--

INSERT INTO `avisos` (`Codigo`, `Nome`, `Data`, `Tipo`, `Conteudo`, `Hora`) VALUES
(8, 'Faixa de Pedestre', '19. Abril 2019', 'Texto', 'Uma faixa inusitada foi colocada na frente de uma escola para evitar que motoristas estacionem em uma vaga exclusiva para vans escolares no Centro de São José do Rio Preto (SP).', '23:49'),
(9, 'Aviso de contratação – Transporte escola', '20. Março 2019', 'Texto', 'Tendo em vista a necessidade emergencial de contratação de empresa habilitada para efetuar o transporte escolar na região de São Sebastião, a Secretaria de Estado de Educação do Distrito Federal convoca interessados em executar o serviço, em conformidade com as regras descritas no aviso de contratação .', '10:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `Codigo` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Parentesco` varchar(10) DEFAULT NULL,
  `CPF` varchar(12) DEFAULT NULL,
  `DataNascimento` varchar(12) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsaveis`
--

INSERT INTO `responsaveis` (`Codigo`, `Nome`, `Parentesco`, `CPF`, `DataNascimento`, `Telefone`) VALUES
(1, 'Paulo Henrique Oliveira do Bonfim', 'Mae', '342-354-353 ', '04/03/2053', '(45) 34534-5345'),
(2, 'Lucas Araujo Fariias', 'Irmao', '342-354-353 ', '04/03/2053', '(45) 34534-5345'),
(3, 'Lucas Araujo Fariias', 'Irmao', '342-354-353 ', '04/03/2053', '(45) 34534-5345'),
(4, 'Lucas Araujo Fariias', 'Irmao', '342-354-353 ', '04/03/2053', '(45) 34534-5345'),
(5, 'Lucas Araujo Fariias', 'Irmao', '342-354-353 ', '04/03/2053', '(45) 34534-5345'),
(6, 'Lucas Araujo Fariias', 'Irmao', '342-354-353 ', '04/03/2053', '(45) 34534-5345'),
(7, 'Lucas Araujo Fariiasweqwq', 'Irmao', '565-464-565 ', '04/03/2053', '(45) 34534-5345'),
(8, 'Lucas Araujo Fariiasweqwqewe', 'Irmao', '565-464-565 ', '04/03/2053', '(45) 34534-5345'),
(9, 'Lucas Araujo Fariiasweqwqewe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(10, 'Lucas Araujo Fariiasweqwqewe54', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(11, 'Lucas Araujo Fariiasweqwqewe545445', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(12, 'Lucas Araujo Fariiasweqwqewe545445', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(13, 'Lucas Araujo Fariiasweqwqewe545445', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(14, 'pais tetseweqe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(15, 'pais tetseweqe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(16, 'pais tetseweqe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(17, 'pais tetseweqe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(18, 'pais tetseweqewe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(19, 'pais tetseweqewe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345'),
(20, 'pais tetseweqewe', 'Irmao', '565-464-554 ', '04/03/2053', '(45) 34534-5345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas2`
--

CREATE TABLE `turmas2` (
  `Codigo` int(11) NOT NULL,
  `Nome` varchar(10) DEFAULT NULL,
  `Etapa` varchar(25) DEFAULT NULL,
  `Turno` varchar(11) DEFAULT NULL,
  `Data_Inicio` varchar(12) DEFAULT NULL,
  `QtdMax_Alunos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas2`
--

INSERT INTO `turmas2` (`Codigo`, `Nome`, `Etapa`, `Turno`, `Data_Inicio`, `QtdMax_Alunos`) VALUES
(2, 'A', '1° Ano Ensino Médio', 'Matutino', '05/04/2019', 50),
(3, 'B', '1° Ano Ensino Médio', 'Matutino', '05/04/2019', 50),
(4, 'C', '1° Ano Ensino Médio', 'Matutino', '05/04/2019', 50),
(5, 'A', '2° Ano Ensino Médio', 'Matutino', '05/04/2019', 50),
(6, 'B', '2° Ano Ensino Médio', 'Matutino', '05/04/2019', 50),
(7, 'A', '6° Ano Ensino Fundamental', 'Vespertino', '04/03/2094', 50),
(8, 'A', '8° Ano Ensino Fundamental', 'Noturno', '04/03/2043', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_perfil` int(11) NOT NULL,
  `nome` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `ativo` varchar(24) CHARACTER SET latin1 DEFAULT NULL,
  `login_user` varchar(40) NOT NULL DEFAULT '0',
  `endereco` varchar(100) NOT NULL,
  `telefone` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_perfil`, `nome`, `email`, `senha`, `ativo`, `login_user`, `endereco`, `telefone`) VALUES
(1, 'Paulo Henrique Oliveira do Bonfim', 'valdecipecilio@gmail.com', '4343', NULL, '0', '', 0),
(2, 'Paulo Henrique Oliveira do Bonfim', 'valdecipecilio@gmail.com', '3424332424', NULL, '0', '', 0),
(3, 'Paulo Henrique Oliveira do Bonfim', '23', '323223', NULL, '0', '', 0),
(4, 'Paulo Henrique Oliveira do Bonfim', 'paulo', '$2y$10$9xzjiuns/.twqkz85sih7enm39vcy2okutzh8yaiavpm4fveb8tcc', NULL, '0', '', 0),
(5, 'Paulo Henrique Oliveira do Bonfim', 'pauloqw', '$2y$10$3opcizbetx6aekb4r3zls.kwtwqcnnmxaai2pja3g1gahfmcnlocw', NULL, '0', '', 0),
(6, 'Paulo Henrique Oliveira do Bonfim', '123', '$2y$10$rgirisqipxe8xpmme/nqrunqxlz46ge5ufcyzmoorjvzevwrhm1u6', NULL, '0', '', 0),
(7, 'Paulo Henrique Oliveira do Bonfim', '123', '$2y$10$zz3o/v6m5vjddrkal2vko.iaulqbca.88tir1c3ks1zppg9bngepq', NULL, '0', '', 0),
(8, 'Paulo Henrique Oliveira do Bonfim', 'teste1', '1234', NULL, '0', '', 0),
(9, 'Paulo', 'teste2', '1234', NULL, '0', '', 0),
(10, 'Paulo Henrique', 'paulo.henrique724.ph@gmail.com', '1234', NULL, '0', '', 0),
(11, '5', 'paulo.henrique724.ph@gmail.com', '4554', NULL, '45', '', 0),
(12, 'Paulo Henrique Oliveira do Bonfim', 'paulo.henrique724.ph@gmail.com', '1234', NULL, 'admin.paulo', '', 0),
(13, '34', 'valdecipecilio@gmail.com', '4343', NULL, '54', '', 0),
(14, '3454', 'valdecipecilio@gmail.com', '3434', NULL, '5454', '', 0),
(15, '', '', '', NULL, 'admin1', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos2`
--
ALTER TABLE `alunos2`
  ADD PRIMARY KEY (`Matricula`);

--
-- Indexes for table `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indexes for table `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indexes for table `turmas2`
--
ALTER TABLE `turmas2`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos2`
--
ALTER TABLE `alunos2`
  MODIFY `Matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1913;

--
-- AUTO_INCREMENT for table `avisos`
--
ALTER TABLE `avisos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `turmas2`
--
ALTER TABLE `turmas2`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
