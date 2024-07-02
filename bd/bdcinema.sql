-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 02:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdcinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `telefoneCliente` varchar(100) NOT NULL,
  `senhaCliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `emailCliente`, `telefoneCliente`, `senhaCliente`) VALUES
(1, 'Genivaldo', 'genivaldinho@gmail.com', '11 91234 5678', 'valdo123');

-- --------------------------------------------------------

--
-- Table structure for table `tbcontato`
--

CREATE TABLE `tbcontato` (
  `idContato` int(11) NOT NULL,
  `nomeContato` varchar(100) NOT NULL,
  `emailContato` varchar(100) NOT NULL,
  `telefoneContato` varchar(100) NOT NULL,
  `assuntoContato` varchar(100) NOT NULL,
  `mensagemContato` varchar(1000) NOT NULL,
  `dataContato` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcontato`
--

INSERT INTO `tbcontato` (`idContato`, `nomeContato`, `emailContato`, `telefoneContato`, `assuntoContato`, `mensagemContato`, `dataContato`) VALUES
(1, 'Monique', 'moniquetop@gmail.com', '11 98765 4321', 'Crítica', 'Esse abacate não tem nada a ver, muda para uma banana', '2024-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbfilme`
--

CREATE TABLE `tbfilme` (
  `idFilme` int(11) NOT NULL,
  `nomeFilme` varchar(100) NOT NULL,
  `capaFilme` varchar(1000) NOT NULL,
  `descFilme` varchar(500) DEFAULT NULL,
  `idGenero` int(11) NOT NULL,
  `statusFilme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbfilme`
--

INSERT INTO `tbfilme` (`idFilme`, `nomeFilme`, `capaFilme`, `descFilme`, `idGenero`, `statusFilme`) VALUES
(1, 'Duna', 'images/filme1.jpg', 'Um jovem tem um destino que está longe de sua ideia, ele viaja ao planeta mais perigoso para defender o seu povo.', 0, 0),
(2, 'Kung Fu Panda 4', 'images/filme2.jpg', 'Depois de três aventuras arriscando sua própria vida para derrotar os mais poderosos vilões, Po, o Grande Dragão Guerreiro é escolhido para se tornar o Líder Espiritual do Vale da Paz.', 0, 0),
(3, 'Oppenheimer', 'images/filme3.jpg', 'O cientista norte-americano J. Robert Oppenheimer teve papel crucial para o desenvolvimento da bomba atômica utilizada num momento crucial da Segunda Guerra Mundial.', 0, 0),
(4, 'Barbie', 'images/filme4.png', 'Num mundo mágico, a Barbieland, uma das bonecas começa a perceber que não se encaixa como as demais.\r\n\r\n', 0, 0),
(5, 'Elementos', 'images/filme5.jpg', 'Um rapaz feito de água e uma moça feita de fogo descobrem que têm muito mais afinidades do que imaginavam.', 0, 0),
(6, 'Pânico 6', 'images/filme6.jpg', 'Quatro sobreviventes dos assassinatos de Ghostface deixam Woodsboro para trás e buscam um novo começo em Nova York.', 0, 0),
(7, 'Sorria', 'images/filme7.jpg', 'Em Sorria, tudo na vida da Dra. Rose Cotter muda, após uma paciente morrer de forma brutal em sua frente.', 0, 0),
(8, 'Divertidamente 2', 'images/filme8.jpg', 'A menina Riley já mostrou que é muito guiada pelas emoções Alegria, Medo, Raiva, Nojinho e Tristeza. Mas um mundo de descobertas lhe mostra quantas novas emoções uma pessoa pode experimentar.', 0, 1),
(9, 'Entidade', 'images/filme9.jpeg', 'Escritor de romances policiais, Ellison acaba de se mudar com sua família. Ele descobre intrigantes rolos de filme no sótão da nova casa, cujo conteúdo é uma série de imagens de pessoas mortas.', 0, 1),
(10, 'Furiosa', 'images/filme10.jpg', 'Quando o mundo entra em colapso, a jovem Furiosa é sequestrada do Green Place das Muitas Mães e cai nas mãos da horda de motoqueiros liderada pelo Senhor da Guerra Dementus.', 0, 1),
(11, 'Sonic 2', 'images/filme11.jpg', 'Uma vez estabelecido em Green Hills, o ouriço azul mais veloz das redondezas recebe autorização para ficar sozinho em casa enquanto Tom e Maddie saem de férias. Mas, ele não contava com o retorno do maligno Dr. Robotnik.', 0, 1),
(12, 'It: A Coisa', 'images/filme12.jpg', 'Um grupo de sete adolescentes de Derry, uma cidade no Maine, formam o auto-intitulado \"Losers Club\". A pacata rotina da cidade é abalada quando crianças começam a desaparecer e tudo o que pode ser encontrado delas são partes de seus corpos.', 0, 1),
(13, 'Five Nights at Freddie\'s', 'images/filme13.jpg', 'Depois de começar a trabalhar no turno da noite da Pizzaria Freddy Fazbear, um segurança problemático logo percebe que a atividade não será tão fácil quanto parecia.', 0, 1),
(14, 'Enrolados', 'images/filme14.png', 'Flynn Rider, o bandido mais procurado do reino, acaba se escondendo na torre de Rapunzel. Juntos, eles partem numa aventura emocionante por um mundo desconhecido para ela.', 0, 1),
(15, 'Wish', 'images/filme15.jpg', 'Asha vive num reino em que os desejos de todos os plebeus são protegidos por um rei poderoso. Ela vai começar uma jornada para descobrir a verdade e ajudar a restituir os anseios de todos.', 0, 1),
(16, 'Beekeeper - Rede de Vingança', 'images/filme16.jpg', 'Clay está em busca de vingança e não vai parar até acabar com o sistema criminoso responsável pela morte de sua amiga.', 0, 2),
(17, 'Homem-aranha', 'images/filme17.jpg', 'Peter Parker está tentando voltar à sua rotina de estudante, mas a chegada do vilão Abutre põe o herói à prova.', 0, 2),
(18, 'Soul', 'images/filme18.PNG', 'Desanimado por não alcançar o sonho de tocar em um clube de jazz, Joe Gardner, professor de música do ensino fundamental, sofre um incidente e se transporta para fora do próprio corpo.', 0, 2),
(19, 'Raya e o Último Dragão', 'images/filme19.png', 'Kumandra está sendo ameaçada por uma força maligna, cabe à Raya, uma guerreira solitária, rastrear o último dragão para tentar reestabelecer a ordem natural das coisas.', 0, 2),
(20, 'Aquaman 2', 'images/filme20.jpg', 'Depois de não conseguir derrotar o rei dos mares pela primeira vez, Arraia Negra utiliza o poder do mítico Tridente Negro para liberar uma força antiga e maligna.', 0, 2),
(21, 'Velozes e Furiosos 10', 'images/filme21.jpg', 'Ao lado de sua família formada por parentes e amigos, Dom Toretto venceu diversos desafios que pareciam invencíveis. Agora ele enfrentará o mais letal de todos os inimigos, um emergente das sombras do passado.', 0, 2),
(23, 'Os Farofeiros 2', 'images/filme22.jpg', 'Quando Alexandre é reconhecido como o melhor gerente de vendas na empresa em que trabalha, ele ganha como recompensa por seus esforços uma viagem para a Bahia com toda a família.', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbgenero`
--

CREATE TABLE `tbgenero` (
  `idGenero` int(11) NOT NULL,
  `nomeGenero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbgenero`
--

INSERT INTO `tbgenero` (`idGenero`, `nomeGenero`) VALUES
(1, 'Ficção'),
(2, 'Comédia'),
(3, 'Terror');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `tbcontato`
--
ALTER TABLE `tbcontato`
  ADD PRIMARY KEY (`idContato`);

--
-- Indexes for table `tbfilme`
--
ALTER TABLE `tbfilme`
  ADD PRIMARY KEY (`idFilme`);

--
-- Indexes for table `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`idGenero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbcontato`
--
ALTER TABLE `tbcontato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbfilme`
--
ALTER TABLE `tbfilme`
  MODIFY `idFilme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
