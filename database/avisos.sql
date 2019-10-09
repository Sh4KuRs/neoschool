-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Abr-2019 às 05:40
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
(7, 'Jogos da Copa 2019', '12. Abril 2019', 'Texto', 'Não haverá aula durante os jogos da copa.', '23:50'),
(8, 'Faixa de Pedestre', '19. Abril 2019', 'Texto', 'Uma faixa inusitada foi colocada na frente de uma escola para evitar que motoristas estacionem em uma vaga exclusiva para vans escolares no Centro de São José do Rio Preto (SP).', '23:49'),
(9, 'Aviso de contratação – Transporte escola', '20. Março 2019', 'Texto', 'Tendo em vista a necessidade emergencial de contratação de empresa habilitada para efetuar o transporte escolar na região de São Sebastião, a Secretaria de Estado de Educação do Distrito Federal convoca interessados em executar o serviço, em conformidade com as regras descritas no aviso de contratação .', '10:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`Codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avisos`
--
ALTER TABLE `avisos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
