-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2019 às 06:24
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
-- Database: `mydb2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `Matricula` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `RG` varchar(20) NOT NULL,
  `OrgaoExp` int(11) NOT NULL,
  `DataNascimento` varchar(10) DEFAULT NULL,
  `DataRegistro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Sexo` varchar(20) DEFAULT NULL,
  `EstadoCivil` int(11) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Status` char(1) NOT NULL DEFAULT 'A',
  `Turma_ID` int(11) NOT NULL,
  `Usuario_ID` int(11) NOT NULL,
  `Responsavel_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`Matricula`, `Nome`, `Email`, `Telefone`, `CPF`, `RG`, `OrgaoExp`, `DataNascimento`, `DataRegistro`, `Sexo`, `EstadoCivil`, `Foto`, `Status`, `Turma_ID`, `Usuario_ID`, `Responsavel_ID`) VALUES
(322447, 'Lucas Araujo Fariias', 'maria@gmail.com', '(13) 42342-3423', '453-453-453 -4', '3.424.234', 3, '25/06/2001', NULL, 'Masculino', 1, '64449269b11a53386c8bb70d4afe2185.jpg', 'A', 19, 99, 32),
(322448, 'Maria Julia', 'maria@gmail.com', '(21) 31231-2321', '456-456-456 -4', '5.645.456', 1, '25/02/2002', NULL, 'Feminino', 1, '789f9360f30cb7c0151b46ac6bdc8e23.png', 'A', 19, 100, 32),
(322454, 'Magali', 'magali@gmail.com', '(23) 42342-3424', '234-234-234 -2', '3.242.342', 10, '19/03/1989', NULL, 'Feminino', 0, 'fa6b0d3616dfa43fa55c1f9512f3bac3.jpg', 'A', 19, 112, 37),
(322455, 'Juliana Arantes ', 'juliane@gmail.com', '(23) 42342-3424', '234-234-234 -2', '3.242.342', 10, '19/03/1999', NULL, 'Feminino', 0, '1af8267dab2006d31852ab1495a58993jpeg', 'A', 19, 113, 37),
(322456, 'Larissa Pâmela Silva', 'larissa@gmail.com', '(23) 12342-3423', '543-534-534 -5', '3.424.234', 1, '20/09/2000', NULL, 'Feminino', 1, '638abff727fac3fcfc833954e887daf6.jpg', 'A', 19, 114, 37),
(322457, 'Mateus Da Silva', 'mateus@gmail.com', '(12) 23343-2423', '324-234-234 -2', '3.224.234', 5, '23/02/2001', NULL, 'Masculino', 1, 'b5b2da86cd0c5c2d3cbc9ac856b0721c.jpg', 'A', 19, 115, 37),
(322458, 'Marcelo Paulino', 'marcelo@gmail.com', '(32) 42343-2423', '343-242-342 -3', '3.232.123', 1, '31/03/1999', NULL, 'Masculino', 1, '625b1765e7ef3eea5963e52828a7062e.png', 'A', 19, 116, 39),
(322459, 'Pedro Henrique', 'pedro@gmail.com', '(13) 23131-2323', '___-___-___ -_', '4.324.234', 1, '05/04/2000', NULL, 'Masculino', 0, '0c32eb6176879ccabf5a82486851c594.jpg', 'A', 19, 117, 37),
(322460, 'João Pedro Alfaia', 'aluno@gmail.com', '(24) 32423-4234', '324-234-234 -2', '4.324.234', 1, '23/02/1992', NULL, 'Masculino', 1, '7c02135e0a0d42294774723f4c3dade1.jpg', 'A', 19, 118, 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente_virtual`
--

CREATE TABLE `ambiente_virtual` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Professor_ID` int(11) NOT NULL,
  `turma_tem_dicsiplina_Turma_ID` int(11) NOT NULL,
  `turma_tem_dicsiplina_Dicsiplina_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ambiente_virtual`
--

INSERT INTO `ambiente_virtual` (`ID`, `Nome`, `Professor_ID`, `turma_tem_dicsiplina_Turma_ID`, `turma_tem_dicsiplina_Dicsiplina_ID`) VALUES
(3, '17 - 19 - Prof. 18', 18, 19, 17),
(4, '20 - 19 - Prof. 21', 21, 19, 20),
(5, '21 - 19 - Prof. 20', 20, 19, 21),
(6, '22 - 19 - Prof. 22', 22, 19, 22),
(7, '23 - 19 - Prof. 19', 19, 19, 23),
(8, '27 - 19 - Prof. 23', 23, 19, 27),
(9, '28 - 19 - Prof. 24', 24, 19, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente_virtual_has_aluno`
--

CREATE TABLE `ambiente_virtual_has_aluno` (
  `ambiente_virtual_ID` int(11) NOT NULL,
  `aluno_Matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id` int(11) NOT NULL,
  `url` varchar(45) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `conteudo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `url`, `titulo`, `type`, `conteudo_id`) VALUES
(2, '2019.06.11-06.01.21-0docx', 'Atividade de revisão para a prova.docx', 'docx', 2),
(3, '2019.06.11-06.01.21-1docx', 'Atividade de revisão para a prova (1).docx', 'docx', 2),
(4, '2019.06.11-06.04.24-0', '', '', 3),
(5, '2019.06.11-06.05.21-0docx', 'Atividade de revisão para a prova.docx', 'docx', 4),
(6, '2019.06.11-06.05.21-1docx', 'Atividade de revisão para a prova (1).docx', 'docx', 4),
(7, '2019.06.11-06.05.34-0', '', '', 5),
(8, '2019.06.11-06.06.23-0pptx', 'Portal do Aluno2.pptx', 'pptx', 6),
(9, '2019.06.11-06.06.48-0', '', '', 7),
(10, '2019.06.11-06.07.35-0', '', '', 8),
(11, '2019.06.11-06.07.58-0', '', '', 9),
(12, '2019.06.11-06.09.23-0', '', '', 10),
(13, '2019.06.11-06.10.00-0', '', '', 11),
(14, '2019.06.11-06.10.21-0', '', '', 12),
(15, '2019.06.11-06.11.35-0pptx', 'Portal do Aluno2.pptx', 'pptx', 13),
(16, '2019.06.11-06.11.49-0', '', '', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

CREATE TABLE `avisos` (
  `ID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Conteudo` text,
  `Data` varchar(11) DEFAULT NULL,
  `Hora` timestamp NULL DEFAULT NULL,
  `Turma_ID` int(11) NOT NULL
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
-- Estrutura da tabela `conteudo`
--

CREATE TABLE `conteudo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `conteudo` text,
  `hora` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `ambiente_virtual_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conteudo`
--

INSERT INTO `conteudo` (`id`, `titulo`, `conteudo`, `hora`, `data`, `ambiente_virtual_ID`) VALUES
(2, 'Oque é Arte?', '<p><strong>Arte</strong>&nbsp;(do termo&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Latim\">latino</a>&nbsp;<em>ars</em>, significando&nbsp;<em><a href=\"https://pt.wikipedia.org/wiki/T%C3%A9cnica\">t&eacute;cnica</a></em>&nbsp;e/ou&nbsp;<em>habilidade</em>) pode ser entendida como a atividade humana ligada &agrave;s manifesta&ccedil;&otilde;es de ordem&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Est%C3%A9tica\">est&eacute;tica</a>&nbsp;ou&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Comunica%C3%A7%C3%A3o\">comunicativa</a>, realizada por meio de uma grande&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Manifesto_das_Sete_Artes\">variedade de linguagens</a>,<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-1\">[1]</a>&nbsp;tais como:&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Arquitetura\">arquitetura</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Desenho\">desenho</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Escultura\">escultura</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Pintura\">pintura</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Escrita\">escrita</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/M%C3%BAsica\">m&uacute;sica</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Dan%C3%A7a\">dan&ccedil;a</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Teatro\">teatro</a>e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Cinema\">cinema</a>, em suas variadas combina&ccedil;&otilde;es.<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-2\">[2]</a>&nbsp;O processo criativo se d&aacute; a partir da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Percep%C3%A7%C3%A3o\">percep&ccedil;&atilde;o</a>&nbsp;com o intuito de expressar&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Emo%C3%A7%C3%A3o\">emo&ccedil;&otilde;es</a>&nbsp;e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Ideia\">ideias</a>, objetivando um significado &uacute;nico e diferente para cada obra.<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-brit-3\">[3]</a>.</p>\r\n\r\n<p><strong>Defini&ccedil;&atilde;o</strong></p>\r\n\r\n<p>O principal problema na defini&ccedil;&atilde;o do que &eacute; arte &eacute; o fato de que esta defini&ccedil;&atilde;o varia com o tempo e de acordo com as v&aacute;rias&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Cultura\">culturas</a>&nbsp;humanas. Devemos, pois, ter em mente que a pr&oacute;pria defini&ccedil;&atilde;o de arte &eacute; uma constru&ccedil;&atilde;o cultural vari&aacute;vel e sem significado constante. Muito do que hoje uma cultura ou grupo chama de arte n&atilde;o era ou n&atilde;o &eacute; considerado como tal por culturas ou grupos diferentes daqueles onde foi produzida, e at&eacute; numa mesma &eacute;poca e numa mesma cultura pode haver m&uacute;ltiplas acep&ccedil;&otilde;es do que &eacute; arte. As sociedades pr&eacute;-industriais em geral n&atilde;o possuem ou possu&iacute;am sequer um termo para designar arte.<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-Dissanayake-4\">[4]</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL, 3),
(3, 'História do conceito', '<p>No ocidente, um conceito geral de arte, ou seja, aquilo que teriam em comum coisas t&atilde;o distintas como, por exemplo, um&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Madrigal\">madrigal</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Renascentista\">renascentista</a>, uma&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Catedral\">catedral</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Arquitetura_g%C3%B3tica\">g&oacute;tica</a>, a&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Poesia\">poesia</a>&nbsp;de&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Homero\">Homero</a>, os&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Auto\">autos</a>&nbsp;de mist&eacute;rio medievais, um&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Ret%C3%A1bulo\">ret&aacute;bulo</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Barroco\">barroco</a>, s&oacute; come&ccedil;ou a se formar em meados do&nbsp;<a href=\"https://pt.wikipedia.org/wiki/S%C3%A9culo_XVIII\">s&eacute;culo XVIII</a>, embora a palavra j&aacute; estivesse em uso h&aacute; s&eacute;culos para designar qualquer habilidade especial.<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-5\">[5]</a></p>\r\n\r\n<p>Na&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Antiguidade_cl%C3%A1ssica\">Antiguidade cl&aacute;ssica</a>, uma das principais bases da civiliza&ccedil;&atilde;o ocidental e a primeira cultura que refletiu sobre o tema, considerava-se arte qualquer atividade que envolvesse uma habilidade especial: habilidade para construir um barco, para comandar um ex&eacute;rcito, para convencer o p&uacute;blico em um&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Discurso\">discurso</a>, em suma, qualquer atividade que se baseasse em regras definidas e que fosse sujeita a um aprendizado e desenvolvimento&nbsp;<a href=\"https://pt.wikipedia.org/wiki/T%C3%A9cnica\">t&eacute;cnico</a>. Em contraste, a poesia, por exemplo, n&atilde;o era tida como arte, pois era considerada fruto de uma&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Inspira%C3%A7%C3%A3o_art%C3%ADstica\">inspira&ccedil;&atilde;o</a>.<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-6\">[6]</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Plat%C3%A3o\">Plat&atilde;o</a>&nbsp;definiu arte como uma capacidade de fazer coisas de modo&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Intelig%C3%AAncia\">inteligente</a>&nbsp;atrav&eacute;s de um&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Aprendizado\">aprendizado</a>, sendo um reflexo da capacidade&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Criatividade\">criadora</a>&nbsp;do ser humano;<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-7\">[7]</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Arist%C3%B3teles\">Arist&oacute;teles</a>&nbsp;a definiu como uma disposi&ccedil;&atilde;o de produzir coisas de forma&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Raz%C3%A3o\">racional</a>, e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Quintiliano\">Quintiliano</a>&nbsp;a entendia como aquilo que era baseado em um m&eacute;todo e em uma ordem.<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-8\">[8]</a>&nbsp;J&aacute;&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Cassiodoro\">Cassiodoro</a>&nbsp;destacou seu aspecto produtivo e ordenado, assinalando tr&ecirc;s fun&ccedil;&otilde;es para ela: ensinar, comover e agradar ou dar prazer.<a href=\"https://pt.wikipedia.org/wiki/Arte#cite_note-9\">[9]</a></p>\r\n', NULL, NULL, 3),
(4, 'Filosofia', '<p><strong>Filosofia</strong>&nbsp;(do&nbsp;<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_grega\">grego</a>&nbsp;&Phi;&iota;&lambda;&omicron;&sigma;&omicron;&phi;?&alpha;,&nbsp;<em>philosophia,</em>&nbsp;literalmente &laquo;amor pela sabedoria&raquo;&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Filosofia#cite_note-1\">[1]</a><a href=\"https://pt.wikipedia.org/wiki/Filosofia#cite_note-2\">[2]</a>&nbsp;) &eacute; o estudo das quest&otilde;es gerais e fundamentais relacionadas com a natureza da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Natureza_humana\">exist&ecirc;ncia humana</a>; do&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Conhecimento\">conhecimento</a>; da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Verdade\">verdade</a>; dos&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Valor_(filosofia)\">valores</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/%C3%89tica\">morais</a>&nbsp;e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Est%C3%A9tica\">est&eacute;ticos</a>; da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Mente\">mente</a>; da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Linguagem\">linguagem</a>, bem como do&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Universo\">universo</a>&nbsp;em sua totalidade.<a href=\"https://pt.wikipedia.org/wiki/Filosofia#cite_note-guide-3\">[3]</a>&nbsp;O termo foi cunhado por&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Pit%C3%A1goras\">Pit&aacute;goras</a>&nbsp;(570 &ndash; 495 a.C). Ao examinar tais quest&otilde;es, a filosofia se distingue da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Mitologia\">mitologia</a>&nbsp;e da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Religi%C3%A3o\">religi&atilde;o</a>&nbsp;por sua &ecirc;nfase em&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Argumento\">argumenta&ccedil;&atilde;o</a>&nbsp;racional; por outro lado, diferencia-se tamb&eacute;m das pesquisas&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Ci%C3%AAncia\">cient&iacute;ficas</a>por geralmente n&atilde;o recorrer a procedimentos&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Empirismo\">emp&iacute;ricos</a>&nbsp;em suas investiga&ccedil;&otilde;es. Entre seus m&eacute;todos, est&atilde;o a argumenta&ccedil;&atilde;o&nbsp;<a href=\"https://pt.wikipedia.org/wiki/L%C3%B3gica\">racional</a>, a&nbsp;<a href=\"https://pt.wikipedia.org/wiki/An%C3%A1lise_(filosofia)\">an&aacute;lise conceitual</a>, a&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Dial%C3%A9tica\">dial&eacute;tica</a>, a&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Hermen%C3%AAutica\">hermen&ecirc;utica</a>, a&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Fenomenologia\">fenomenologia</a>, as&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Experi%C3%AAncia_de_pensamento\">experi&ecirc;ncias de pensamento</a>&nbsp;e outros m&eacute;todos investigativos&nbsp;<em><a href=\"https://pt.wikipedia.org/wiki/A_priori\">a priori</a></em>. A Filosofia &eacute; o saber mais abrangente &ndash; na medida em que ocupa-se com os grandes temas da humanidade. A partir dela, s&atilde;o fundamentadas e desenvolvidas&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Teoria\">teorias</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Metodologia\">metodologias</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Pesquisa\">pesquisas</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Filosofia_da_educa%C3%A7%C3%A3o\">projetos educacionais</a>, bem como elabora-se, inclusive, a pr&oacute;pria fundamenta&ccedil;&atilde;o racional das institui&ccedil;&otilde;es do conhecimento humano, i.e., as institui&ccedil;&otilde;es&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Ci%C3%AAncia\">cient&iacute;ficas</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Arte\">art&iacute;sticas</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Religi%C3%A3o\">religiosas</a>&nbsp;e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Cultura\">culturais</a>.</p>\r\n', NULL, NULL, 6),
(5, 'Definição de filosofia', '<p>A palavra &quot;filosofia&quot; (do&nbsp;<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_grega\">grego</a>) &eacute; uma composi&ccedil;&atilde;o de duas palavras:&nbsp;<em>philos</em>&nbsp;(&phi;?&lambda;&omicron;&sigmaf;) e&nbsp;<em>sophia</em>&nbsp;(&sigma;&omicron;&phi;?&alpha;). A primeira &eacute; uma deriva&ccedil;&atilde;o de&nbsp;<em>philia</em>&nbsp;(&phi;&iota;&lambda;?&alpha;) que significa amizade, amor fraterno e respeito entre os iguais; a segunda significa sabedoria ou simplesmente saber. Filosofia significa, portanto, amizade pela sabedoria, amor e respeito pelo saber; e o fil&oacute;sofo, por sua vez, seria aquele que ama e busca a sabedoria, tem amizade pelo saber, deseja saber.<a href=\"https://pt.wikipedia.org/wiki/Filosofia#cite_note-MC-4\">[4]</a></p>\r\n\r\n<p>A tradi&ccedil;&atilde;o atribui ao fil&oacute;sofo&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Pit%C3%A1goras\">Pit&aacute;goras</a>&nbsp;de&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Samos_(ilha)\">Samos</a>&nbsp;(que viveu no&nbsp;<a href=\"https://pt.wikipedia.org/wiki/S%C3%A9culo_V_a.C.\">s&eacute;culo V a.C.</a>) a cria&ccedil;&atilde;o da palavra. Conforme essa tradi&ccedil;&atilde;o, Pit&aacute;goras teria criado o termo para modestamente ressaltar que a sabedoria plena e perfeita seria atributo apenas dos deuses; os homens, no entanto, poderiam vener&aacute;-la e am&aacute;-la na qualidade de fil&oacute;sofos.<a href=\"https://pt.wikipedia.org/wiki/Filosofia#cite_note-MC-4\">[4]</a></p>\r\n\r\n<p>A palavra&nbsp;<em>philosoph&iacute;a</em>&nbsp;n&atilde;o &eacute; simplesmente uma inven&ccedil;&atilde;o moderna a partir de termos gregos,<a href=\"https://pt.wikipedia.org/wiki/Filosofia#cite_note-5\">[5]</a>&nbsp;mas, sim, um empr&eacute;stimo tomado da pr&oacute;pria l&iacute;ngua grega. Os termos &phi;&iota;&lambda;&omicron;&sigma;&omicron;&phi;&omicron;&sigmaf; (<em>philosophos</em>) e &phi;&iota;&lambda;&omicron;&sigma;&omicron;&phi;&epsilon;&iota;&nu; (<em>philosophein</em>) j&aacute; teriam sido empregados por alguns&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Pr%C3%A9-socr%C3%A1ticos\">pr&eacute;-socr&aacute;ticos</a><a href=\"https://pt.wikipedia.org/wiki/Filosofia#cite_note-6\">[6]</a>&nbsp;(<a href=\"https://pt.wikipedia.org/wiki/Her%C3%A1clito\">Her&aacute;clito</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Pit%C3%A1goras\">Pit&aacute;goras</a>&nbsp;e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/G%C3%B3rgias\">G&oacute;rgias</a>) e pelos historiadores&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Her%C3%B3doto\">Her&oacute;doto</a>&nbsp;e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Tuc%C3%ADdides\">Tuc&iacute;dides</a>. Em&nbsp;<a href=\"https://pt.wikipedia.org/wiki/S%C3%B3crates\">S&oacute;crates</a>&nbsp;e Plat&atilde;o, &eacute; acentuada a oposi&ccedil;&atilde;o entre &sigma;&omicron;&phi;?&alpha; e &phi;&iota;&lambda;&omicron;&sigma;&omicron;&phi;?&alpha;, em que o &uacute;ltimo termo exprime certa mod&eacute;stia e certo&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Ceticismo\">ceticismo</a>&nbsp;em rela&ccedil;&atilde;o ao conhecimento humano.</p>\r\n', NULL, NULL, 6),
(6, 'língua portuguesa', '<p>A&nbsp;<strong>l&iacute;ngua portuguesa</strong>, tamb&eacute;m designada&nbsp;<strong>portugu&ecirc;s</strong>, &eacute; uma&nbsp;<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADnguas_rom%C3%A2nicas\">l&iacute;ngua rom&acirc;nica</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_flexiva\">flexiva</a>&nbsp;ocidental originada no&nbsp;<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_galego-portuguesa\">galego-portugu&ecirc;s</a>&nbsp;falado no&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Reino_da_Galiza\">Reino da Galiza</a>&nbsp;e no&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Regi%C3%A3o_do_Norte\">norte de Portugal</a>. Com a cria&ccedil;&atilde;o do&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Reino_de_Portugal\">Reino de Portugal</a>&nbsp;em 1139 e a expans&atilde;o para o sul como parte da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Reconquista\">Reconquista</a>&nbsp;deu-se a difus&atilde;o da l&iacute;ngua pelas terras conquistadas e mais tarde, com as&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Descobrimentos_portugueses\">descobertas portuguesas</a>, para o&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Brasil\">Brasil</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/%C3%81frica\">&Aacute;frica</a>&nbsp;e outras partes do mundo.<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_portuguesa#cite_note-3\">[3]</a>&nbsp;O portugu&ecirc;s foi usado, naquela &eacute;poca, n&atilde;o somente nas cidades conquistadas pelos portugueses, mas tamb&eacute;m por muitos governantes locais nos seus contatos com outros estrangeiros poderosos. Especialmente nessa altura a l&iacute;ngua portuguesa tamb&eacute;m influenciou v&aacute;rias l&iacute;nguas.<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_portuguesa#cite_note-4\">[4]</a></p>\r\n', NULL, NULL, 8),
(7, 'Visibilidade política', '<p>Existe um n&uacute;mero crescente de pessoas que falam portugu&ecirc;s, nos m&eacute;dia e na Internet, que est&atilde;o apresentando tal situa&ccedil;&atilde;o &agrave;&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Comunidade_dos_Pa%C3%ADses_de_L%C3%ADngua_Portuguesa\">Comunidade dos Pa&iacute;ses de L&iacute;ngua Portuguesa</a>&nbsp;(CPLP) e outras organiza&ccedil;&otilde;es para a realiza&ccedil;&atilde;o de um debate na comunidade lus&oacute;fona, com o objetivo de apresentar uma peti&ccedil;&atilde;o para tornar o portugu&ecirc;s uma das l&iacute;nguas oficiais da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Organiza%C3%A7%C3%A3o_das_Na%C3%A7%C3%B5es_Unidas\">Organiza&ccedil;&atilde;o das Na&ccedil;&otilde;es Unidas</a>&nbsp;(ONU).</p>\r\n\r\n<p>Em outubro de 2005, durante a conven&ccedil;&atilde;o internacional do Elos Clube Internacional da Comunidade Lus&iacute;ada, realizada em Tavira (Portugal), uma peti&ccedil;&atilde;o cujo texto pode ser encontrado na Internet com o t&iacute;tulo &quot;Peti&ccedil;&atilde;o para tornar o idioma portugu&ecirc;s oficial na ONU&quot; foi redigida e aprovada por unanimidade.<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_portuguesa#cite_note-85\">[85]</a>&nbsp;R&ocirc;mulo Alexandre Soares, presidente da C&acirc;mara Brasil - Portugal, destaca que o posicionamento do Brasil no cen&aacute;rio internacional como uma das pot&ecirc;ncias emergentes do&nbsp;s&eacute;culo XXI, pelo tamanho de sua popula&ccedil;&atilde;o, e a presen&ccedil;a da sua variante do portugu&ecirc;s em todo o mundo, fornece uma justifica&ccedil;&atilde;o leg&iacute;tima para a peti&ccedil;&atilde;o enviada &agrave; ONU, e assim tornar o portugu&ecirc;s uma das l&iacute;nguas oficiais da organiza&ccedil;&atilde;o.<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_portuguesa#cite_note-86\">[86]</a>&nbsp;Esta &eacute; actualmente uma das causas do Movimento Internacional Lus&oacute;fono.<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_portuguesa#cite_note-87\">[87]</a></p>\r\n\r\n<p>Em&nbsp;<a href=\"https://pt.wikipedia.org/wiki/%C3%81frica\">&Aacute;frica</a>, o portugu&ecirc;s &eacute; l&iacute;ngua oficial em Cabo Verde, S&atilde;o Tom&eacute; e Pr&iacute;ncipe, Guin&eacute;-Bissau, Mo&ccedil;ambique e Angola.<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_portuguesa#cite_note-88\">[88]</a>&nbsp;Finalmente, na &Aacute;sia, encontra-se&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Timor-Leste\">Timor-Leste</a>&nbsp;uma na&ccedil;&atilde;o lus&oacute;fona.<a href=\"https://pt.wikipedia.org/wiki/L%C3%ADngua_portuguesa#cite_note-CPLP-8\">[8]</a></p>\r\n', NULL, NULL, 8),
(8, 'Introdução a Materia', '<p><strong>F&iacute;sica</strong>&nbsp;&eacute; uma&nbsp;<strong>ci&ecirc;ncia natural</strong>&nbsp;que estuda as propriedades da&nbsp;<a href=\"https://brasilescola.uol.com.br/o-que-e/quimica/o-que-e-materia.htm\">mat&eacute;ria</a>&nbsp;e da&nbsp;<a href=\"https://brasilescola.uol.com.br/o-que-e/fisica/o-que-e-energia.htm\">energia</a>, estabelecendo rela&ccedil;&otilde;es entre elas. Baseia-se em&nbsp;<strong>experimenta&ccedil;&otilde;es</strong>,&nbsp;<strong>observa&ccedil;&otilde;es</strong>&nbsp;e&nbsp;<strong>formula&ccedil;&otilde;es</strong>&nbsp;<strong>matem&aacute;ticas</strong>&nbsp;voltadas &agrave; interpreta&ccedil;&atilde;o de quest&otilde;es fundamentais da natureza, relativas a um grande n&uacute;mero de fen&ocirc;menos, compreendidos desde escalas subat&ocirc;micas at&eacute; macroc&oacute;smicas.</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL, 7),
(9, 'Oque é Fisica', '<h2><strong>O que &eacute; F&iacute;sica?</strong></h2>\r\n\r\n<p>A palavra&nbsp;<strong>F&iacute;sica</strong>&nbsp;deriva do grego antigo&nbsp;<strong>&phi;?&sigma;&iota;&sigmaf;,</strong>&nbsp;que significa &ldquo;natureza&rdquo;. &Eacute; uma ci&ecirc;ncia fundamentada em observa&ccedil;&otilde;es experimentais e em leis matem&aacute;ticas. Seu principal intuito &eacute; explicar os variados fen&ocirc;menos resultantes das&nbsp;<strong>intera&ccedil;&otilde;es</strong>&nbsp;entre&nbsp;<strong>mat&eacute;ria</strong>,&nbsp;<strong>movimento</strong>&nbsp;e&nbsp;<strong>energia.</strong></p>\r\n\r\n<p>A F&iacute;sica &eacute; uma das mais antigas disciplinas e teve seu in&iacute;cio marcado por observa&ccedil;&otilde;es astron&ocirc;micas feitas por povos antigos do mundo todo. Intenta-se a explicar o funcionamento do Universo da maneira mais fundamental poss&iacute;vel, pautando-se nos preceitos da&nbsp;<a href=\"https://brasilescola.uol.com.br/quimica/metodo-cientifico.htm\">metodologia cient&iacute;fica</a>&nbsp;e da&nbsp;<strong>linguagem</strong>&nbsp;<strong>matem&aacute;tica.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Ramos da F&iacute;sica</strong></h2>\r\n\r\n<p>A F&iacute;sica &eacute; uma ci&ecirc;ncia muito vasta que, por raz&otilde;es hist&oacute;ricas, &eacute; subdividida em diferentes &aacute;reas. A primeira divis&atilde;o da F&iacute;sica est&aacute; relacionada &agrave;&nbsp;<strong>F&iacute;sica</strong>&nbsp;<strong>Cl&aacute;ssica</strong>&nbsp;e &agrave;&nbsp;<strong>F&iacute;sica</strong>&nbsp;<strong>Moderna.</strong>&nbsp;A F&iacute;sica Cl&aacute;ssica &eacute; aquela que envolve fen&ocirc;menos que ocorrem em&nbsp;<strong>escalas</strong>&nbsp;<strong>macrosc&oacute;picas</strong>, como&nbsp;<strong>movimento dos astros</strong>&nbsp;e&nbsp;<strong>proj&eacute;teis</strong>,&nbsp;<strong>funcionamento de m&aacute;quinas t&eacute;rmicas</strong>,&nbsp;<strong>ac&uacute;stica</strong>,&nbsp;<strong>&oacute;ptica</strong>&nbsp;<strong>geom&eacute;trica,</strong><strong>hidrost&aacute;tica,</strong>&nbsp;<strong>eletrost&aacute;tica,</strong>&nbsp;<strong>eletrodin&acirc;mica</strong>&nbsp;<strong>cl&aacute;ssica</strong>, etc. Esse ramo da F&iacute;sica foi desenvolvido ao longo da hist&oacute;ria por grandes nomes, como&nbsp;<a href=\"https://brasilescola.uol.com.br/fisica/um-fisico-chamado-isaac-newton.htm\">Isaac Newton</a>,&nbsp;<a href=\"https://brasilescola.uol.com.br/biografia/galileu-galilei.htm\">Galileu Galilei</a>,&nbsp;<a href=\"https://brasilescola.uol.com.br/fisica/johannes-kepler.htm\">Johannes Kepler</a>,&nbsp;<strong>Lorde</strong><strong>Kelvin</strong>, entre outros.</p>\r\n', NULL, NULL, 7),
(10, 'Verbos em Espanhol (Verbos en Español)', '<p>Os verbos s&atilde;o utilizados para situar um discurso no tempo.</p>\r\n\r\n<p>Desta forma, permitem que os interlocutores saibam se determinada frase se refere ao passado, ao presente ou ao futuro, por exemplo.</p>\r\n\r\n<p>Assim como acontece na l&iacute;ngua portuguesa, os&nbsp;<strong>verbos em espanhol</strong>&nbsp;apresentam tr&ecirc;s conjun&ccedil;&otilde;es.</p>\r\n\r\n<p>S&atilde;o elas:</p>\r\n\r\n<ul>\r\n	<li>primeira conjuga&ccedil;&atilde;o: -ar</li>\r\n	<li>segunda conjuga&ccedil;&atilde;o: -er</li>\r\n	<li>terceira conjuga&ccedil;&atilde;o: -ir</li>\r\n</ul>\r\n\r\n<h2>Primeira conjuga&ccedil;&atilde;o (<em>primera conjugaci&oacute;n</em>)</h2>\r\n\r\n<p>S&atilde;o classificados como verbos de<em>&nbsp;primera conjugaci&oacute;n&nbsp;</em>aqueles que terminam em &ndash;<em>ar</em>.</p>\r\n\r\n<p>Exemplos de verbos em espanhol terminados em -<em>ar</em>:</p>\r\n\r\n<ul>\r\n	<li><em>hablar</em></li>\r\n	<li><em>cantar</em></li>\r\n	<li><em>bailar</em></li>\r\n	<li><em>amar</em></li>\r\n	<li><em>estar</em></li>\r\n</ul>\r\n\r\n<h2>Segunda conjuga&ccedil;&atilde;o (<em>segunda conjugaci&oacute;n</em>)</h2>\r\n\r\n<p>S&atilde;o classificados como verbos de&nbsp;<em>segunda conjugaci&oacute;n&nbsp;</em>os verbos terminados em &ndash;<em>er</em></p>\r\n\r\n<p>Exemplos de verbos em espanhol terminados em -<em>er</em>:</p>\r\n\r\n<ul>\r\n	<li><em>hacer</em></li>\r\n	<li><em>comer</em></li>\r\n	<li><em>vender</em></li>\r\n	<li><em>tener</em></li>\r\n	<li><em>temer</em></li>\r\n</ul>\r\n\r\n<h2>Terceira conjuga&ccedil;&atilde;o (<em>tercera conjugaci&oacute;n</em>)</h2>\r\n\r\n<p>S&atilde;o classificados como verbos de<em>&nbsp;tercera conjugaci&oacute;n</em>&nbsp;os verbos terminados em &ndash;<em>ir</em></p>\r\n\r\n<p>Exemplos de verbos em espanhol terminados em&nbsp;<em>-ir</em>:</p>\r\n\r\n<ul>\r\n	<li><em>partir</em></li>\r\n	<li><em>vivir</em></li>\r\n	<li><em>venir</em></li>\r\n	<li><em>subir</em></li>\r\n	<li><em>escribir</em></li>\r\n</ul>\r\n', NULL, NULL, 5),
(11, 'Educação física', '<p><strong>Educa&ccedil;&atilde;o f&iacute;sica</strong>&nbsp;&eacute; uma &aacute;rea do conhecimento humano ligada &agrave;s pr&aacute;ticas&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Corpo_humano\">corporais</a>&nbsp;historicamente produzidas pela humanidade. A educa&ccedil;&atilde;o f&iacute;sica &eacute; o processo pedag&oacute;gico que visa &agrave; forma&ccedil;&atilde;o do homem capaz de se conduzir plenamente em suas atividades. Trabalha num sentido amplo, visando &agrave; preven&ccedil;&atilde;o de determinadas&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Doen%C3%A7a\">doen&ccedil;as</a>.<a href=\"https://pt.wikipedia.org/wiki/Educa%C3%A7%C3%A3o_f%C3%ADsica#cite_note-1\">[1]</a></p>\r\n\r\n<p>&Eacute; a &aacute;rea de atua&ccedil;&atilde;o do profissional&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Gradua%C3%A7%C3%A3o\">graduado</a>&nbsp;em educa&ccedil;&atilde;o f&iacute;sica (<a href=\"https://pt.wikipedia.org/wiki/Licenciatura\">licenciatura</a>&nbsp;e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Bacharelado\">bacharelado</a>). &Eacute; um termo usado para designar tanto o conjunto de&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Atividade_f%C3%ADsica\">atividades f&iacute;sicas</a>&nbsp;e exerc&iacute;cios f&iacute;sicos n&atilde;o competitivos e&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Desporto\">esportes</a>&nbsp;com fins recreativos quanto a&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Ci%C3%AAncia\">ci&ecirc;ncia</a>&nbsp;que fundamenta a correta pr&aacute;tica destas atividades, resultado de uma s&eacute;rie de pesquisas e procedimentos estabelecidos.</p>\r\n', NULL, NULL, 4),
(12, 'Importancia da Educação Fisica', '<h2>Esporte[<a href=\"https://pt.wikipedia.org/w/index.php?title=Educa%C3%A7%C3%A3o_f%C3%ADsica&amp;veaction=edit&amp;section=1\">editar</a>&nbsp;|&nbsp;<a href=\"https://pt.wikipedia.org/w/index.php?title=Educa%C3%A7%C3%A3o_f%C3%ADsica&amp;action=edit&amp;section=1\">editar c&oacute;digo-fonte</a>]</h2>\r\n\r\n<p>A grande diferen&ccedil;a entre &quot;educa&ccedil;&atilde;o f&iacute;sica&quot; e &quot;esporte&quot; &eacute; que, enquanto a primeira diz respeito a uma&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Disciplina\">disciplina</a>&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Escolar\">escolar</a>&nbsp;e a um campo acad&ecirc;mico, esporte refere-se &agrave;s diversas modalidades organizadas.</p>\r\n\r\n<p>Esta diferen&ccedil;a &eacute; muito importante, pois existem muitas pessoas que consideram estas duas palavras&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Sin%C3%B4nimo\">sin&ocirc;nimas</a>.<a href=\"https://pt.wikipedia.org/wiki/Educa%C3%A7%C3%A3o_f%C3%ADsica#cite_note-2\">[2]</a></p>\r\n\r\n<p>Educa&ccedil;&atilde;o f&iacute;sica &eacute; uma atividade f&iacute;sica planejada e estruturada, com o prop&oacute;sito de melhorar ou manter o condicionamento f&iacute;sico. &Eacute; tamb&eacute;m o conjunto de atividades f&iacute;sicas n&atilde;o competitivas, que fundamenta assim a correta pr&aacute;tica destas atividades.</p>\r\n\r\n<p>J&aacute; o&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Exerc%C3%ADcio_f%C3%ADsico\">exerc&iacute;cio f&iacute;sico</a>, &eacute; uma forma de atividade f&iacute;sica planejada, repetitiva, com orienta&ccedil;&atilde;o profissional, que visa desenvolver a resist&ecirc;ncia f&iacute;sica e as habilidades motoras seja por equipamentos espec&iacute;ficos&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Educa%C3%A7%C3%A3o_f%C3%ADsica#cite_note-3\">[3]</a>ou pelo peso do pr&oacute;prio corpo que devido o avan&ccedil;o tecnol&oacute;gico atualmente o profissional disp&otilde;e de in&uacute;meros m&eacute;todos<a href=\"https://pt.wikipedia.org/wiki/Educa%C3%A7%C3%A3o_f%C3%ADsica#cite_note-4\">[4]</a>&nbsp;que respaldam as in&uacute;meras modalidades. A exemplo da&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Nata%C3%A7%C3%A3o\">nata&ccedil;&atilde;o</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Muscula%C3%A7%C3%A3o\">muscula&ccedil;&atilde;o</a>,&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Artes_marciais\">artes marciais</a>&nbsp;e etc.</p>\r\n', NULL, NULL, 4),
(13, 'Matemática', '<p>A&nbsp;<strong><strong>Matem&aacute;tica</strong></strong><strong>&nbsp;</strong>&eacute; uma ci&ecirc;ncia que relaciona a l&oacute;gica com situa&ccedil;&otilde;es pr&aacute;ticas habituais. Ela desenvolve uma constante busca pela veracidade dos fatos por meio de t&eacute;cnicas precisas e exatas. Ao longo da hist&oacute;ria, a Matem&aacute;tica foi sendo constru&iacute;da e aperfei&ccedil;oada, prosseguindo em constante evolu&ccedil;&atilde;o, investigando novas situa&ccedil;&otilde;es e estabelecendo rela&ccedil;&otilde;es com os acontecimentos cotidianos.</p>\r\n', NULL, NULL, 9),
(14, 'Conceito', '<p><em><strong>Matem&aacute;tica: Uma ci&ecirc;ncia aplicada</strong></em></p>\r\n\r\n<p>&Eacute; considerada uma das ci&ecirc;ncias mais aplicadas em nosso cotidiano. Um simples olhar ao nosso redor e notamos a sua presen&ccedil;a nas formas, nos contornos e nas medidas. As opera&ccedil;&otilde;es b&aacute;sicas s&atilde;o utilizadas constantemente, e os c&aacute;lculos mais complexos s&atilde;o conclu&iacute;dos de forma pr&aacute;tica e adequada de acordo com princ&iacute;pios&nbsp;<strong>matem&aacute;ticos</strong>.</p>\r\n\r\n<p><em><strong>Rela&ccedil;&atilde;o com as outras disciplinas</strong></em></p>\r\n\r\n<p>Possui uma estreita rela&ccedil;&atilde;o com as outras ci&ecirc;ncias, que buscam nos fundamentos matem&aacute;ticos explica&ccedil;&otilde;es pr&aacute;ticas para suas teorias. Dizemos que a&nbsp;<strong>Matem&aacute;tica</strong>&nbsp;&eacute; a ci&ecirc;ncia das ci&ecirc;ncias.</p>\r\n\r\n<p>Determinados assuntos ligados &agrave; Qu&iacute;mica, F&iacute;sica, Biologia, Administra&ccedil;&atilde;o, Contabilidade, Economia, Finan&ccedil;as, entre outras &aacute;reas de ensino e pesquisa, utilizam as bases matem&aacute;ticas para estabelecer resultados concretos e objetivos.</p>\r\n', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela ` datas`
--

CREATE TABLE ` datas` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dicsiplina`
--

CREATE TABLE `dicsiplina` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `cargaHoraria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dicsiplina`
--

INSERT INTO `dicsiplina` (`ID`, `Nome`, `cargaHoraria`) VALUES
(17, 'Arte', 80),
(18, 'Biologia', 80),
(20, 'Educação Fisica', 80),
(21, 'Espanhol - Língua Estrangeira Moderna', 80),
(22, 'Filosofia', 40),
(23, 'Fisica', 120),
(24, 'História', 80),
(25, 'Geografia', 80),
(26, 'Inglês - Língua Estrangeira Moderna', 80),
(27, 'Português - e Literatura ', 200),
(28, 'Matematica', 200),
(29, 'Química ', 120);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dicsiplina_has_professor`
--

CREATE TABLE `dicsiplina_has_professor` (
  `Dicsiplina_ID` int(11) NOT NULL,
  `Professor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dicsiplina_has_professor`
--

INSERT INTO `dicsiplina_has_professor` (`Dicsiplina_ID`, `Professor_ID`) VALUES
(17, 18),
(20, 21),
(21, 20),
(22, 22),
(23, 19),
(27, 23),
(28, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `id` int(11) NOT NULL,
  `falta1` char(2) DEFAULT NULL,
  `falta2` char(2) DEFAULT NULL,
  `info_frequencia_id` int(11) NOT NULL,
  `aluno_Matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`id`, `falta1`, `falta2`, `info_frequencia_id`, `aluno_Matricula`) VALUES
(68, 'F', 'F', 12, 322447),
(69, 'F', 'F', 12, 322454),
(70, 'F', 'F', 13, 322456),
(71, 'F', 'F', 13, 322457),
(72, 'FJ', 'FJ', 13, 322459);

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_frequencia`
--

CREATE TABLE `info_frequencia` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `turma_ID` int(11) NOT NULL,
  `Disciplina_ID` int(11) NOT NULL,
  `Professor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `info_frequencia`
--

INSERT INTO `info_frequencia` (`id`, `descricao`, `data`, `turma_ID`, `Disciplina_ID`, `Professor_ID`) VALUES
(12, 'Conceitos de Matemtica', '2019-06-11', 19, 28, 24),
(13, 'Inicio Atividades', '2019-06-10', 19, 28, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_nota`
--

CREATE TABLE `info_nota` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `disciplina_ID` int(11) NOT NULL,
  `professor_ID` int(11) NOT NULL,
  `turma_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `info_nota`
--

INSERT INTO `info_nota` (`id`, `descricao`, `data`, `disciplina_ID`, `professor_ID`, `turma_ID`) VALUES
(7, 'Teste equações', '2019-06-11', 28, 24, 19),
(8, 'Prova Bimestral', '2019-06-09', 28, 24, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `nota` float DEFAULT NULL,
  `info_nota_id` int(11) NOT NULL,
  `aluno_Matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id`, `nota`, `info_nota_id`, `aluno_Matricula`) VALUES
(21, 0.2, 7, 322447),
(22, 0.73, 7, 322448),
(23, 0.33, 7, 322454),
(24, 0.23, 7, 322455),
(25, 0.32, 7, 322456),
(26, 0.32, 7, 322457),
(27, 0.45, 7, 322458),
(28, 0.32, 7, 322459),
(29, 0.32, 7, 322460),
(30, 5, 8, 322447),
(31, 4, 8, 322448),
(32, 3, 8, 322454),
(33, 3, 8, 322455),
(34, 3, 8, 322456),
(35, 2.85, 8, 322457),
(36, 3.02, 8, 322458),
(37, 2, 8, 322459),
(38, 3, 8, 322460);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`ID`, `Nome`) VALUES
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
  `Nome` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `RG` varchar(15) NOT NULL,
  `OrgaoExp` int(11) NOT NULL,
  `DataNascimento` varchar(10) DEFAULT NULL,
  `EstadoCivil` int(11) NOT NULL,
  `Sexo` varchar(20) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Status` char(1) NOT NULL DEFAULT 'A',
  `Usuario_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`ID`, `Nome`, `Email`, `Telefone`, `CPF`, `RG`, `OrgaoExp`, `DataNascimento`, `EstadoCivil`, `Sexo`, `Foto`, `Status`, `Usuario_ID`) VALUES
(18, 'Regina Costa Nunes', 'regina@gmail.com', '(61) 98495-4545', '324.324.234 -2', '3.242.342', 4, '25/03/1989', 2, 'Feminino', NULL, 'A', 92),
(19, 'Antonio Ivo Gomes', 'antonio@gmail.com', '(61) 94342-3423', '324.324.234 -3', '2.342.342', 6, '08/04/1971', 4, 'Masculino', NULL, 'A', 93),
(20, 'Janaina Amorim', 'janaina@gmail.com', '(61) 94393-4934', '332.424.234 -2', '2.342.342', 3, '23/03/1984', 2, 'Feminino', NULL, 'A', 94),
(21, 'Paulo Henrique', 'paulo.henrique@gmail.com', '(32) 42342-3432', '324.324.242 -3', '3.242.342', 4, '23/04/1992', 1, 'Masculino', NULL, 'A', 95),
(22, 'Lucas Araujo Fariias', 'lucas4384@gmail.com', '(32) 42342-3432', '432.432.423 -4', '3.242.342', 4, '23/04/1984', 4, 'Masculino', NULL, 'A', 96),
(23, 'Leticia Carvalho Cruz', 'leticia@gmail.com', '(34) 34234-2342', '332.423.423 -4', '2.342.343', 1, '25/03/1989', 2, 'Feminino', NULL, 'A', 97),
(24, 'Marcilio Pereira santos', 'marcilio@gmail.com', '(32) 42342-3423', '324.234.234 -2', '2.342.342', 1, '25/03/1924', 1, 'Masculino', NULL, 'A', 98);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_tem_turma`
--

CREATE TABLE `professor_tem_turma` (
  `Professor_ID` int(11) NOT NULL,
  `Turma_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor_tem_turma`
--

INSERT INTO `professor_tem_turma` (`Professor_ID`, `Turma_ID`) VALUES
(18, 19),
(19, 19),
(20, 20),
(21, 19),
(22, 19),
(23, 19),
(24, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `RG` varchar(15) NOT NULL,
  `OrgaoExp` int(11) NOT NULL,
  `EstadoCivil` int(11) NOT NULL,
  `DataNascimento` varchar(10) DEFAULT NULL,
  `Parentesco` varchar(45) DEFAULT NULL,
  `Sexo` varchar(20) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Status` varchar(1) NOT NULL DEFAULT 'A',
  `Usuario_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`ID`, `Nome`, `Email`, `Telefone`, `CPF`, `RG`, `OrgaoExp`, `EstadoCivil`, `DataNascimento`, `Parentesco`, `Sexo`, `Foto`, `Status`, `Usuario_ID`) VALUES
(32, 'Maria Dos Santos', 'maria@gmail.com', '(32) 42343-2432', '432-423-432 -4', '3.242.342', 15, 2, '23/02/1999', 'Irmao', 'Feminino', NULL, 'A', 99),
(33, 'Geovane da Silva', 'geovane@gmail.com', '(43) 24324-2332', '342-423-423 -4', '4.324.242', 5, 2, '25/03/1983', 'Pai', 'Masculino', NULL, 'A', 101),
(34, 'Fernando Oliveira', 'fernando@gmail.com', '(13) 21231-2312', '123-123-123 -1', '1.231.231', 9, 1, '29/04/1989', 'Mae', 'Masculino', NULL, 'A', 102),
(35, 'José Alves Sousa', 'jose@gmail.com', '(34) 23423-4234', '423-423-423 -4', '3.242.342', 8, 3, '23/03/1985', 'Pai', 'Masculino', NULL, 'A', 103),
(36, 'Roselina da Costa ', 'rose@gmail.com', '(21) 31232-1312', '233-432-423 -4', '3.242.342', 6, 5, '30/04/1993', 'Pai', 'Feminino', NULL, 'A', 104),
(37, 'Valdeci Percilio', 'valdeci@gmail.com', '(42) 34324-2342', '234-234-234 -2', '3.242.342', 5, 2, '03/09/1974', 'Pai', 'Masculino', NULL, 'A', 105),
(38, 'Iracema Da Silva', 'iracema@gmail.com', '(23) 13123-1231', '342-342-342 -3', '2.342.342', 7, 5, '19/02/1990', 'Pai', 'Feminino', NULL, 'A', 106),
(39, 'Eduardo Arantes', 'eduardo@gmail.com', '(32) 42342-3432', '242-342-423 -4', '2.423.423', 7, 2, '11/01/1982', 'Pai', 'Masculino', NULL, 'A', 116);

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
  `Qtd_Alunos` int(11) DEFAULT NULL,
  `QtdMax_Alunos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`ID`, `Nome`, `Etapa`, `Turno`, `Data_Inicio`, `Qtd_Alunos`, `QtdMax_Alunos`) VALUES
(19, 'A', '1° Ano Ensino Médio', 'Matutino', '2019-06-11 02:36:01', NULL, 40),
(20, 'B', '1° Ano Ensino Médio', 'Matutino', '2019-06-11 02:36:46', NULL, 40),
(21, 'C', '1° Ano Ensino Médio', 'Matutino', '2019-06-11 02:37:24', NULL, 40),
(22, 'A', '3° Ano Ensino Médio', 'Vespertino', '2019-06-11 02:37:59', NULL, 40);

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
(19, 17),
(19, 18),
(19, 20),
(19, 21),
(19, 22),
(19, 23),
(19, 24),
(19, 25),
(19, 26),
(19, 27),
(19, 28),
(19, 29),
(20, 17),
(20, 18),
(20, 20),
(20, 21),
(20, 22),
(20, 23),
(20, 24),
(20, 25),
(20, 26),
(20, 27),
(20, 28),
(20, 29),
(21, 17),
(21, 18),
(21, 20),
(21, 21),
(21, 22),
(21, 23),
(21, 24),
(21, 25),
(21, 26),
(21, 27),
(21, 28),
(21, 29),
(22, 17),
(22, 18),
(22, 20),
(22, 21),
(22, 22),
(22, 23),
(22, 24),
(22, 25),
(22, 26),
(22, 27),
(22, 28),
(22, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Login` varchar(100) DEFAULT NULL,
  `Senha` varchar(32) DEFAULT NULL,
  `Perfil_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `Login`, `Senha`, `Perfil_ID`) VALUES
(91, 'administrador', '123', 1),
(92, 'regina@gmail.com', '123', 3),
(93, 'antonio@gmail.com', '123', 3),
(94, 'janaina@gmail.com', '123', 3),
(95, 'paulo.henrique@gmail.com', '123', 3),
(96, 'lucas4384@gmail.com', '123', 3),
(97, 'leticia@gmail.com', '123', 3),
(98, 'marcilio@gmail.com', '123', 3),
(99, 'maria@gmail.com', '123', 4),
(100, 'mariajulia@gmail.com', '122', 5),
(101, 'geovane@gmail.com', '123', 4),
(102, 'fernando@gmail.com', '123', 4),
(103, 'jose@gmail.com', '123', 4),
(104, 'rose@gmail.com', '123', 4),
(105, 'valdeci@gmail.com', '123', 4),
(106, 'iracema@gmail.com', '123', 4),
(107, 'magali@gmail.com', '123', 5),
(108, 'magali@gmail.com', '123', 5),
(109, 'magali@gmail.com', '123', 5),
(110, 'magali@gmail.com', '123', 5),
(111, 'magali@gmail.com', '123', 5),
(112, 'magasli@gmail.com', '123', 5),
(113, 'juliane@gmail.com', '123', 5),
(114, 'larissa@gmai.com', '123', 5),
(115, 'mateus@gmail.com', '123', 5),
(116, 'eduardo@gmail.com', '123', 4),
(117, 'pedro@gmail.com', '123', 5),
(118, 'aluno@gmail.com', '123', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `fk_aluno_turma1_idx` (`Turma_ID`),
  ADD KEY `fk_aluno_usuario1_idx` (`Usuario_ID`),
  ADD KEY `fk_aluno_responsavel1_idx` (`Responsavel_ID`);

--
-- Indexes for table `ambiente_virtual`
--
ALTER TABLE `ambiente_virtual`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ambiente_virtual_professor1_idx` (`Professor_ID`),
  ADD KEY `fk_ambiente_virtual_turma_tem_dicsiplina1_idx` (`turma_tem_dicsiplina_Turma_ID`,`turma_tem_dicsiplina_Dicsiplina_ID`);

--
-- Indexes for table `ambiente_virtual_has_aluno`
--
ALTER TABLE `ambiente_virtual_has_aluno`
  ADD PRIMARY KEY (`ambiente_virtual_ID`,`aluno_Matricula`),
  ADD KEY `fk_ambiente_virtual_has_aluno_aluno1_idx` (`aluno_Matricula`),
  ADD KEY `fk_ambiente_virtual_has_aluno_ambiente_virtual1_idx` (`ambiente_virtual_ID`);

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_arquivo_conteudo1_idx` (`conteudo_id`);

--
-- Indexes for table `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conteudo_ambiente_virtual1_idx` (`ambiente_virtual_ID`);

--
-- Indexes for table ` datas`
--
ALTER TABLE ` datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dicsiplina`
--
ALTER TABLE `dicsiplina`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dicsiplina_has_professor`
--
ALTER TABLE `dicsiplina_has_professor`
  ADD PRIMARY KEY (`Dicsiplina_ID`,`Professor_ID`),
  ADD KEY `fk_dicsiplina_has_professor_professor1_idx` (`Professor_ID`),
  ADD KEY `fk_dicsiplina_has_professor_dicsiplina1_idx` (`Dicsiplina_ID`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_frequencia_info_frequencia1_idx` (`info_frequencia_id`),
  ADD KEY `fk_frequencia_aluno1_idx` (`aluno_Matricula`);

--
-- Indexes for table `info_frequencia`
--
ALTER TABLE `info_frequencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_info_frequencia_turma1_idx` (`turma_ID`),
  ADD KEY `fk_info_frequencia_dicsiplina_has_professor1_idx` (`Disciplina_ID`,`Professor_ID`);

--
-- Indexes for table `info_nota`
--
ALTER TABLE `info_nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_info_nota_dicsiplina_has_professor_idx` (`disciplina_ID`,`professor_ID`),
  ADD KEY `fk_info_nota_turma1_idx` (`turma_ID`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notas_info_nota1_idx` (`info_nota_id`),
  ADD KEY `fk_notas_aluno1_idx` (`aluno_Matricula`);

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
  ADD KEY `fk_professor_usuario1_idx` (`Usuario_ID`);

--
-- Indexes for table `professor_tem_turma`
--
ALTER TABLE `professor_tem_turma`
  ADD KEY `fk_professor_tem_turma_professor1_idx` (`Professor_ID`),
  ADD KEY `fk_professor_tem_turma_turma1_idx` (`Turma_ID`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_responsavel_usuario1_idx` (`Usuario_ID`);

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
  ADD KEY `fk_turma_has_dicsiplina_dicsiplina1_idx` (`Dicsiplina_ID`),
  ADD KEY `fk_turma_has_dicsiplina_turma1_idx` (`Turma_ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_usuario_perfil1_idx` (`Perfil_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322461;

--
-- AUTO_INCREMENT for table `ambiente_virtual`
--
ALTER TABLE `ambiente_virtual`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table ` datas`
--
ALTER TABLE ` datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dicsiplina`
--
ALTER TABLE `dicsiplina`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `frequencia`
--
ALTER TABLE `frequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `info_frequencia`
--
ALTER TABLE `info_frequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info_nota`
--
ALTER TABLE `info_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_responsavel1` FOREIGN KEY (`Responsavel_ID`) REFERENCES `responsavel` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_turma1` FOREIGN KEY (`Turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ambiente_virtual`
--
ALTER TABLE `ambiente_virtual`
  ADD CONSTRAINT `fk_ambiente_virtual_professor1` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ambiente_virtual_turma_tem_dicsiplina1` FOREIGN KEY (`turma_tem_dicsiplina_Turma_ID`,`turma_tem_dicsiplina_Dicsiplina_ID`) REFERENCES `turma_tem_dicsiplina` (`Turma_ID`, `Dicsiplina_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ambiente_virtual_has_aluno`
--
ALTER TABLE `ambiente_virtual_has_aluno`
  ADD CONSTRAINT `fk_ambiente_virtual_has_aluno_aluno1` FOREIGN KEY (`aluno_Matricula`) REFERENCES `aluno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ambiente_virtual_has_aluno_ambiente_virtual1` FOREIGN KEY (`ambiente_virtual_ID`) REFERENCES `ambiente_virtual` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `fk_arquivo_conteudo1` FOREIGN KEY (`conteudo_id`) REFERENCES `conteudo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `conteudo`
--
ALTER TABLE `conteudo`
  ADD CONSTRAINT `fk_conteudo_ambiente_virtual1` FOREIGN KEY (`ambiente_virtual_ID`) REFERENCES `ambiente_virtual` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dicsiplina_has_professor`
--
ALTER TABLE `dicsiplina_has_professor`
  ADD CONSTRAINT `fk_dicsiplina_has_professor_dicsiplina1` FOREIGN KEY (`Dicsiplina_ID`) REFERENCES `dicsiplina` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dicsiplina_has_professor_professor1` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `fk_frequencia_aluno1` FOREIGN KEY (`aluno_Matricula`) REFERENCES `aluno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_frequencia_info_frequencia1` FOREIGN KEY (`info_frequencia_id`) REFERENCES `info_frequencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `info_frequencia`
--
ALTER TABLE `info_frequencia`
  ADD CONSTRAINT `fk_info_frequencia_dicsiplina_has_professor1` FOREIGN KEY (`Disciplina_ID`,`Professor_ID`) REFERENCES `dicsiplina_has_professor` (`Dicsiplina_ID`, `Professor_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_info_frequencia_turma1` FOREIGN KEY (`turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `info_nota`
--
ALTER TABLE `info_nota`
  ADD CONSTRAINT `fk_info_nota_dicsiplina_has_professor` FOREIGN KEY (`disciplina_ID`,`professor_ID`) REFERENCES `dicsiplina_has_professor` (`Dicsiplina_ID`, `Professor_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_info_nota_turma1` FOREIGN KEY (`turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_notas_aluno1` FOREIGN KEY (`aluno_Matricula`) REFERENCES `aluno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notas_info_nota1` FOREIGN KEY (`info_nota_id`) REFERENCES `info_nota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor_tem_turma`
--
ALTER TABLE `professor_tem_turma`
  ADD CONSTRAINT `fk_professor_tem_turma_professor1` FOREIGN KEY (`Professor_ID`) REFERENCES `professor` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_tem_turma_turma1` FOREIGN KEY (`Turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD CONSTRAINT `fk_responsavel_usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_tem_dicsiplina`
--
ALTER TABLE `turma_tem_dicsiplina`
  ADD CONSTRAINT `fk_turma_has_dicsiplina_dicsiplina1` FOREIGN KEY (`Dicsiplina_ID`) REFERENCES `dicsiplina` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_has_dicsiplina_turma1` FOREIGN KEY (`Turma_ID`) REFERENCES `turma` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`Perfil_ID`) REFERENCES `perfil` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
