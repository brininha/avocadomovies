-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 04:21 AM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_11_150559_create_genero_table', 1),
(6, '2024_08_11_202754_create_tbgenero_table', 2),
(7, '2024_08_11_211230_create_tbgenero_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `telefoneCliente` varchar(100) NOT NULL,
  `senhaCliente` varchar(100) NOT NULL,
  `dataCriacao` timestamp NULL DEFAULT current_timestamp(),
  `dataAtualizacao` timestamp NULL DEFAULT current_timestamp(),
  `excluido` int(11) NOT NULL DEFAULT 0,
  `tipoCliente` int(11) NOT NULL DEFAULT 0 COMMENT '0 - comum\r\n1 - adm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `emailCliente`, `telefoneCliente`, `senhaCliente`, `dataCriacao`, `dataAtualizacao`, `excluido`, `tipoCliente`) VALUES
(1, 'Genivaldo', 'genivaldinho@gmail.com', '11 91234 5678', 'valdo123', NULL, NULL, 0, 0),
(2, 'Ana', 'ana@gmail.com', '11 92345 3456', 'ana123', NULL, NULL, 0, 0),
(4, 'Sabrina', 'sasa@gmail.com', '11 987654432', '1234', NULL, NULL, 0, 0),
(5, 'Ariadne', 'ari@gmail.com', '11991827248', '$2y$10$TGZGuEW6ZPAe0fTFY1LN3uJA.qT8YyWgzjc56UKzqJnUZJUCbuQVq', NULL, NULL, 0, 0),
(6, 'Adriana', 'diana@gmail.com', '11987659876', '$2y$10$qm6AwJ5dftK1q9h9ZwOpwe8Zxhphtz6pBjKtePX3W2Cy8uuFA9y6K', NULL, NULL, 1, 0),
(7, 'A', 'a@gmail.com', '11987653287', '$2y$10$JCYtwgCSm08nOz3qAOG7DuZxTWazCfZapibL1wo1wN8vGzZAfwxQW', NULL, NULL, 1, 0),
(8, 'Josefa', 'jo@gmail.com', '11987654321', '$2y$10$Stl94KsbJd96E6hUKureU.THJIQS3TXb9VlJprWFrOJQWNCsYaf6q', NULL, NULL, 0, 0),
(9, 'b', 'b@gmail.com', '11987654321', '$2y$10$BUIJtm0M4LAyFp6oAcb5VOBl1B4IN78EE.tGEKq8SA/by.8M7k6C2', NULL, NULL, 1, 0),
(10, 'C', 'c@gmail.com', '11928374653', '$2y$10$zwU1VK790f5zNOybk1MpnuFX0iBt.pdk3XQsbpIXRT/KoVrG4ZPja', NULL, NULL, 1, 0),
(11, 'sandra', 'sandra@gmail.com', '11928834473', '$2y$10$CDGNgSI3lzvxB959.Ov5ru698DerZ08tVzbEkluxHpCXE98U4EuMS', NULL, NULL, 1, 0),
(12, 'X', 'x@gmail.com', '11982734789', '$2y$10$Q/HA7OOZdaDg1RCs6e9Mv.TGc5ka8q8nywkhGufbgLkUPAsZehRZ6', NULL, NULL, 0, 0),
(13, 'Y', 'y@gmail.com', '11983276154', '$2y$10$EUt8MjuEnBtblbDvo03EpurVdrKi0sQxyxqonrqheokIdkr8cprg.', NULL, NULL, 1, 0),
(14, 'e', 'e@gmail.com', '11982176345', '$2y$10$XCmLmtLB44E40l/ZqoX5HeP3v8q48zTL5PIDAETe05iLYnLijnc3y', NULL, NULL, 1, 0),
(15, 'o', 'o@gmail.com', '11987653420', '$2y$10$hnmm4V6i6l3oca2XQVcjXekxqw345G94ndwoLGNzgI8Ww/IwHW6Wi', NULL, NULL, 1, 0),
(16, 'Sabrina Cristan', 'sabrinaristan@gmail.com', '11991827248', '$2y$10$MFHuxHM6XCGOhmdlMH1PLOW88kWe.0nYEXwNRl3GqKf4HCm/1HcdS', NULL, NULL, 1, 0),
(17, 'Sabrina Cristan', 'sabrna.cristan@gmail.com', '11991827248', '$2y$10$7Pf1imcLXdVmstz/ZNXkj.FcUOGqDAbQPqKWwNUBfv7ffSUN.6mV2', NULL, NULL, 1, 0),
(18, 'Sabrina', 'sabria.cristan@gmail.com', '11991827248', '$2y$10$2BiBb3DDreUc/YwJh1MAeec8.0yqTfAlWWTNBFH/aoiSGAMvCLjL.', NULL, NULL, 1, 0),
(19, 'Cristan', 'sabrinristan@gmail.com', '11991827248', '$2y$10$CHXfDggYck8zXrnmrjiM/.HiY.knip1IpQM037MOAEtpJzaxXLh3O', NULL, NULL, 1, 0),
(20, 'Sabran', 'crist@gmail.com', '11991827248', '$2y$10$LqaKUKVbOtsHvD8zQe.pk.0jImyxoL/YZsTnfsY5G9bjFqhq.eY0y', NULL, NULL, 0, 0),
(21, 'Adelma', 'adelma@gmail.com', '11987654321', '$2y$10$kg.Qd0poBBbJE9vVetz/c.8.kfntRpyEHlGJmdX8e1KtxGQ9vhxYW', NULL, NULL, 1, 0),
(22, 'Eva', 'eva@gmail.com', '11900987654', '$2y$10$WMzDnpEiWUDue84e7FPRf.c9rQtCTa/rG0V/eDpbvnzGpY9LaB43K', NULL, NULL, 0, 0),
(23, 'Xena', 'xena@gmail.com', '11982736478', '$2y$10$7sJa7.GbVHEUZGiMz7IlsulBcxWflubvS4BQnpkd0krWc1DskIfPG', NULL, NULL, 0, 0),
(24, 'Ian', 'ian@gmail.com', '11922922345', '$2y$10$w/Vnq7dji94BVyXbbEqqLepZlyrsPHXkoY7Ux6lELasDqL8FbV04O', NULL, NULL, 0, 0),
(25, 'Jade', 'jade@gmail.com', '11987658765', '$2y$10$sLXJLaj5k4gKbjvPZWftoOrmhZJI0HnWYO5GjL94sf0v28fu4AXa2', NULL, NULL, 0, 0),
(26, 'Lua', 'lua@gmail.com', '11987658765', '$2y$10$5d9Qw9OckowcbTzg/7Xd5.WbClIFwsZp.53JizhmOJA4nc9pkjC9a', NULL, NULL, 0, 0),
(27, 'João', 'joao@gmail.com', '11928374578', '$2y$10$wpTTKpInAr658OZ3pU1JT.kutwtGL5gFSUoRD9VEEdOabyr.0G9fC', NULL, NULL, 0, 0),
(28, 'Ernestina', 'erne@gmail.com', '11991827243', '$2y$10$pX8bCyk5.JnmmbKQoILSXuFiNcd5XmxIPGa3OJOSDIJmzCTVQNvdq', '2024-09-20 01:03:40', NULL, 0, 0),
(29, 'Sabrina Cristan', 'sabrina.cristan@gmail.com', '11991827248', '$2y$10$2agONGUJNTPDpbVnUJ1dEOa/e2N5V3DcX.1wbrBwlRwXbIITAy14W', '2024-09-20 01:06:56', NULL, 1, 0),
(30, 'Fausto', 'fausto@gmail.com', '11987874333', '$2y$10$GNJkllZ6E.X8MusoHBavaepKuDy0T19hOcXJjRgf7p5MCVyZBwS2a', '2024-09-20 16:08:46', '2024-09-20 16:08:46', 0, 0),
(31, 'Sabrina', 'admin@gmail.com', '11998876543', '$2y$10$GgGuLJ5caMjz/5VMQeVjKOuwHgZj7J3v/s47N9sEsEXj5q7dXwRsq', '2024-09-20 22:37:44', '2024-09-20 22:37:44', 0, 1);

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
(1, 'Monique', 'moniquetop@gmail.com', '11 98765 4321', 'Crítica', 'Esse abacate não tem nada a ver, muda para uma banana', '2024-06-16'),
(2, 'Lari', 'lari@gmail.com', '11 97586 4231', 'Lindo o aplicativo', 'Amei as cores e facilidade de usar.', '2024-06-17'),
(3, 'Sabrina', 'sabrina@gmail,com', '11 95768 1324', 'Parceria', 'Sou dona da Yoki e gostaria de ofertar o milho de pipoca.', '2024-06-17'),
(4, 'Ana', 'ana@gmail.com', '11 91423 5867', 'Combos', 'Sugiro que vocês ofereçam a venda de combos pelo app também, ajudaria bastante.', '2024-06-17'),
(5, 'Sabrina Cristan', 'sabrina.cristan@gmail.com', '11991827248', 'Sou linda', 'Precisava escrever em algum lugar o quão eu sou linda', '2024-09-01'),
(6, 'Sabrina Cristan', 'sabrina.cristan@gmail.com', '11991827248', 'Testando modal', 'oi oi', '2024-09-19'),
(7, 'Amelia', 'amelia@gmail.com', '11987654326', 'Cinema muito bom', 'Amo assistir nesse cinema!', '2024-09-19'),
(8, 'Luana', 'lu@gmail.com', '11982736470', 'Nome legal', 'Gostei do nome do cinema.', '2024-09-19'),
(9, 'Giovana', 'gigi@gmail.com', '11987676543', 'Lindo app', 'Amei o layout desse aplicativo!', '2024-09-29'),
(10, 'Xena', 'xena@gmail.com', '11987878765', 'Cadê a atualização??', 'Vocês prometeram atualizar o aplicativo!', '2024-09-29');

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
  `statusFilme` int(11) NOT NULL,
  `dataCriacao` timestamp NULL DEFAULT current_timestamp(),
  `dataAtualizacao` timestamp NULL DEFAULT current_timestamp(),
  `excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbfilme`
--

INSERT INTO `tbfilme` (`idFilme`, `nomeFilme`, `capaFilme`, `descFilme`, `idGenero`, `statusFilme`, `dataCriacao`, `dataAtualizacao`, `excluido`) VALUES
(1, 'Duna', 'images/filme1.jpg', 'Um jovem tem um destino que está longe de sua ideia, ele viaja ao planeta mais perigoso para defender o seu povo.', 0, 0, NULL, '0000-00-00 00:00:00', 0),
(2, 'Kung Fu Panda 4', 'images/filme2.jpg', 'Depois de três aventuras arriscando sua própria vida para derrotar os mais poderosos vilões, Po, o Grande Dragão Guerreiro é escolhido para se tornar o Líder Espiritual do Vale da Paz.', 3, 0, NULL, '0000-00-00 00:00:00', 0),
(3, 'Oppenheimer', 'images/filme3.jpg', 'O cientista norte-americano J. Robert Oppenheimer teve papel crucial para o desenvolvimento da bomba atômica utilizada num momento crucial da Segunda Guerra Mundial.', 0, 0, NULL, '0000-00-00 00:00:00', 0),
(4, 'Barbie', 'images/filme4.png', 'Num mundo mágico, a Barbieland, uma das bonecas começa a perceber que não se encaixa como as demais.\r\n\r\n', 0, 0, NULL, '0000-00-00 00:00:00', 0),
(5, 'Elementos', 'images/filme5.jpg', 'Um rapaz feito de água e uma moça feita de fogo descobrem que têm muito mais afinidades do que imaginavam.', 3, 0, NULL, '0000-00-00 00:00:00', 0),
(6, 'Pânico 6', 'images/filme6.jpg', 'Quatro sobreviventes dos assassinatos de Ghostface deixam Woodsboro para trás e buscam um novo começo em Nova York.', 1, 0, NULL, '0000-00-00 00:00:00', 0),
(7, 'Sorria', 'images/filme7.jpg', 'Em Sorria, tudo na vida da Dra. Rose Cotter muda, após uma paciente morrer de forma brutal em sua frente.', 1, 0, NULL, '0000-00-00 00:00:00', 0),
(8, 'Divertidamente 2', 'images/filme8.jpg', 'A menina Riley já mostrou que é muito guiada pelas emoções Alegria, Medo, Raiva, Nojinho e Tristeza. Mas um mundo de descobertas lhe mostra quantas novas emoções uma pessoa pode experimentar.', 3, 1, NULL, '0000-00-00 00:00:00', 0),
(9, 'Entidade', 'images/filme9.jpeg', 'Escritor de romances policiais, Ellison acaba de se mudar com sua família. Ele descobre intrigantes rolos de filme no sótão da nova casa, cujo conteúdo é uma série de imagens de pessoas mortas.', 0, 1, NULL, '0000-00-00 00:00:00', 0),
(10, 'Furiosa', 'images/filme10.jpg', 'Quando o mundo entra em colapso, a jovem Furiosa é sequestrada do Green Place das Muitas Mães e cai nas mãos da horda de motoqueiros liderada pelo Senhor da Guerra Dementus.', 0, 1, NULL, '0000-00-00 00:00:00', 0),
(11, 'Sonic 2', 'images/filme11.jpg', 'Uma vez estabelecido em Green Hills, o ouriço azul mais veloz das redondezas recebe autorização para ficar sozinho em casa enquanto Tom e Maddie saem de férias. Mas, ele não contava com o retorno do maligno Dr. Robotnik.', 0, 1, NULL, '0000-00-00 00:00:00', 0),
(12, 'It: A Coisa', 'images/filme12.jpg', 'Um grupo de sete adolescentes de Derry, uma cidade no Maine, formam o auto-intitulado \"Losers Club\". A pacata rotina da cidade é abalada quando crianças começam a desaparecer e tudo o que pode ser encontrado delas são partes de seus corpos.', 0, 1, NULL, '0000-00-00 00:00:00', 0),
(13, 'Five Nights at Freddie\'s', 'images/filme13.jpg', 'Depois de começar a trabalhar no turno da noite da Pizzaria Freddy Fazbear, um segurança problemático logo percebe que a atividade não será tão fácil quanto parecia.', 0, 1, NULL, '0000-00-00 00:00:00', 0),
(14, 'Enrolados', 'images/filme14.png', 'Flynn Rider, o bandido mais procurado do reino, acaba se escondendo na torre de Rapunzel. Juntos, eles partem numa aventura emocionante por um mundo desconhecido para ela.', 0, 1, NULL, '0000-00-00 00:00:00', 0),
(15, 'Wish', 'images/filme15.jpg', 'Asha vive num reino em que os desejos de todos os plebeus são protegidos por um rei poderoso. Ela vai começar uma jornada para descobrir a verdade e ajudar a restituir os anseios de todos.', 0, 1, NULL, '0000-00-00 00:00:00', 0),
(16, 'Beekeeper - Rede de Vingança', 'images/filme16.jpg', 'Clay está em busca de vingança e não vai parar até acabar com o sistema criminoso responsável pela morte de sua amiga.', 0, 2, NULL, '0000-00-00 00:00:00', 0),
(17, 'Homem-aranha', 'images/filme17.jpg', 'Peter Parker está tentando voltar à sua rotina de estudante, mas a chegada do vilão Abutre põe o herói à prova.', 0, 2, NULL, '0000-00-00 00:00:00', 0),
(18, 'Soul', 'images/filme18.PNG', 'Desanimado por não alcançar o sonho de tocar em um clube de jazz, Joe Gardner, professor de música do ensino fundamental, sofre um incidente e se transporta para fora do próprio corpo.', 0, 2, NULL, '0000-00-00 00:00:00', 0),
(19, 'Raya e o Último Dragão', 'images/filme19.png', 'Kumandra está sendo ameaçada por uma força maligna, cabe à Raya, uma guerreira solitária, rastrear o último dragão para tentar reestabelecer a ordem natural das coisas.', 0, 2, NULL, '0000-00-00 00:00:00', 0),
(20, 'Aquaman 2', 'images/filme20.jpg', 'Depois de não conseguir derrotar o rei dos mares pela primeira vez, Arraia Negra utiliza o poder do mítico Tridente Negro para liberar uma força antiga e maligna.', 0, 2, NULL, '0000-00-00 00:00:00', 0),
(21, 'Velozes e Furiosos 10', 'images/filme21.jpg', 'Ao lado de sua família formada por parentes e amigos, Dom Toretto venceu diversos desafios que pareciam invencíveis. Agora ele enfrentará o mais letal de todos os inimigos, um emergente das sombras do passado.', 0, 2, NULL, '0000-00-00 00:00:00', 0),
(23, 'Os Farofeiros 2', 'images/filme22.jpg', 'Quando Alexandre é reconhecido como o melhor gerente de vendas na empresa em que trabalha, ele ganha como recompensa por seus esforços uma viagem para a Bahia com toda a família.', 2, 2, NULL, '0000-00-00 00:00:00', 0),
(24, 'Garfield', 'images/filme23.jpg', 'Em Garfield: Fora de Casa, o amado gato de estimação laranja está de volta para mais uma aventura inesquecível: após reencontrar seu pai, o gato de rua Vic, que não via há muito tempo, Garfield e o cãozinho Odie acabam se envolvendo em um arriscado assalto.', 2, 0, NULL, '0000-00-00 00:00:00', 0),
(25, 'O corvo', 'images/filme24.jpg', 'Alguma coisa...', 0, 0, '2024-09-21 11:34:52', '2024-09-21 11:34:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbgenero`
--

CREATE TABLE `tbgenero` (
  `idGenero` bigint(20) UNSIGNED NOT NULL,
  `dataCriacao` timestamp NULL DEFAULT current_timestamp(),
  `dataAtualizacao` timestamp NULL DEFAULT current_timestamp(),
  `excluido` int(11) NOT NULL DEFAULT 0,
  `nomeGenero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbgenero`
--

INSERT INTO `tbgenero` (`idGenero`, `dataCriacao`, `dataAtualizacao`, `excluido`, `nomeGenero`) VALUES
(1, NULL, NULL, 0, 'Indefinido'),
(2, NULL, NULL, 1, 'Terror'),
(3, '2024-09-21 13:18:04', '2024-09-21 13:18:04', 0, 'Terror'),
(4, '2024-09-21 13:18:28', '2024-09-21 13:18:28', 0, 'Fantasia'),
(5, '2024-09-21 13:18:53', '2024-09-21 13:18:53', 0, 'Animação');

-- --------------------------------------------------------

--
-- Table structure for table `tbingresso`
--

CREATE TABLE `tbingresso` (
  `idIngresso` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idFilme` int(11) NOT NULL,
  `statusIngresso` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbingresso`
--

INSERT INTO `tbingresso` (`idIngresso`, `idCliente`, `idFilme`, `statusIngresso`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `tbingresso`
--
ALTER TABLE `tbingresso`
  ADD PRIMARY KEY (`idIngresso`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbcontato`
--
ALTER TABLE `tbcontato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbfilme`
--
ALTER TABLE `tbfilme`
  MODIFY `idFilme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `idGenero` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbingresso`
--
ALTER TABLE `tbingresso`
  MODIFY `idIngresso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
