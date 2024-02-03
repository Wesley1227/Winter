-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2023 às 12:18
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `winter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `idAnuncio` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `preco` double NOT NULL,
  `localizacao` varchar(40) NOT NULL,
  `visualizacoes` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCategoria` enum('Informática','Mobilidade','Agricultura','Vestuário','Móveis','Empregos','Serviços','Veículos','Desporto','Animais') NOT NULL,
  `estadoProduto` enum('Imaculado','Novo','Semi-novo','Usado','Estragado') NOT NULL,
  `marca` varchar(45) NOT NULL,
  `intAnuncio` enum('compra','venda','troca','doação') NOT NULL,
  `subCategoria` varchar(50) NOT NULL,
  `subSubCategoria` varchar(50) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `dataCriacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `titulo`, `descricao`, `preco`, `localizacao`, `visualizacoes`, `idUser`, `idCategoria`, `estadoProduto`, `marca`, `intAnuncio`, `subCategoria`, `subSubCategoria`, `imagem`, `dataCriacao`) VALUES
(1, 'Título do anúncio', 'Descrição', 123, 'Localização', 2223, 0, '', 'Imaculado', '[value-10]', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(2, 'teste 1', '', 0, '', 2314, 0, 'Informática', '', '', '', 'Computadores', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(3, 'teste 2', 'pao', 125, '', 2365, 0, 'Informática', '', '', 'compra', 'Computadores', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(4, 'teste 3', 'açkud', 126, '', 2116, 0, 'Informática', '', '', 'compra', 'Computadores', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(5, 'teste 4', '', 0, '', 1096, 0, 'Veículos', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(6, 'teste 5', '', 0, '', 1096, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(7, 'teste 5', '', 0, '', 1079, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(8, 'teste 6', '', 0, '', 1029, 0, '', '', '', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(15, 'teste 7', 'sadfasf', 123, '', 1095, 0, '', 'Usado', '1', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(17, 'teste 8', 'sfa fas', 132, '', 1067, 0, 'Informática', '', '3', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(21, 'teste 9', 'fasfas asfsd', 6534, '', 1085, 0, 'Informática', 'Usado', '3', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(22, 'teste 10', 'jkbapiohsbçfkdja', 6523, '', 1077, 0, 'Informática', 'Imaculado', '3', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(23, 'teste 11', 'Apartamento T4 ', 3000000, '', 1105, 0, 'Empregos', 'Usado', '3', 'venda', 'Apartamento', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(24, 'teste 12', 'GPU nova', 350, '', 1013, 0, '', 'Imaculado', '', 'compra', '9', '12', 'semImagem.jpg', '2023-02-15 12:46:26'),
(28, 'teste 13', 'kryxuchg', 20, '', 1070, 0, '', 'Usado', '', 'venda', 'Subcategoria não encontrada', 'Selecione subSubCategoria', 'semImagem.jpg', '2023-02-15 12:46:26'),
(29, 'teste 14', 'Xeon e5 2670 V2', 80, '', 1051, 0, 'Informática', 'Imaculado', '', 'compra', '9', '11', 'semImagem.jpg', '2023-02-15 12:46:26'),
(31, 'teste 15', 'qwdflkjqwd', 230, '', 1050, 0, 'Mobilidade', 'Semi-novo', 'Oneplus', 'compra', '7', '3', 'semImagem.jpg', '2023-02-15 12:46:26'),
(32, 'teste 16', '', 0, '', 1017, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(33, 'teste 17', '', 0, '', 996, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(36, 'teste 20', '', 0, '', 3502, 83, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(37, 'teste 21', '', 0, '', 2703, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(38, 'teste 22', '', 0, '', 2686, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(42, 'teste 25', '', 0, '', 2686, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(43, 'Lucas á parmegiana', '', 0, '', 2385, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(44, 'Vendo Lucas', 'Ele não presta', 99, '', 2437, 0, 'Informática', 'Estragado', '', 'compra', '9', '19', 'semImagem.jpg', '2023-02-15 12:46:31'),
(46, 'Produtos usados', 'Vendo essas tralhas pois estão sem uso a muito tempo e preciso do espaço.\nTexto aleatório a seguir porque sim: \r\nPão (do latim \"pane\")[1] é um alimento obtido pela cocção de uma massa de consistência elástica, elaborada basicamente com farinha de cereal (com proteínas formadores de glúten, geralmente de trigo), água, sal/açúcar.[2] A evidência de ocorrência mais antiga de pão na Europa data de há 30 mil anos.\n\nA esta mistura básica podem acrescentar-se vários ingredientes, desde gordura a especiarias, passando por carne (geralmente curada), frutas secas ou frutas cristalizadas, etc. O pão comercial por outro lado, geralmente contém aditivos para melhorar o sabor, textura, cor, vida de prateleira, nutrição e facilidade de fabricação.\n\nBasicamente existem tipos de pão: levedado, com adição de levedura/fermento biológico à massa, produzindo pães mais macios, e; ázimo, não fermentado,[3] que produz pães geralmente achatados e consistentes.', 450, 'Amadora', 2664, 1, 'Informática', 'Usado', 'Ferrari', 'compra', '9', '15', 'IMG-63c7e658c490a4.55154845.jpg', '2023-02-15 12:46:31'),
(49, 'pao', 'teste', 0, '', 2135, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(50, 'pao', 'teste 47', 0, '', 2135, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(51, 'teste 48', '', 0, '', 2318, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(54, 'teste 49', 'Teste de user', 49, '', 2824, 1, 'Informática', '', 'Alcatel', 'doação', '1', '2', 'semImagem.jpg', '2023-02-15 12:46:31'),
(58, 'teste 52', 'Testar se criador do anuncio consegue ver os anuncios dele', 0, '', 2702, 7, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(73, 'Teclado mecânico Mars Gaming 60%', 'Teclado Mecânico Mars Gaming MKMINI RGB 60% PT Outemu Red · Peso: 400g · Dimensões: 292x102x37mm · Design: 60% mini · Material de teclado: ABS · Cor: Preto', 45, 'Cacem', 2770, 1, 'Informática', 'Novo', '', '', '23', '27', 'IMG-63ef9bf10f9e57.92921091.png', '2023-02-17 15:23:29'),
(76, 'Portátil HP ', '240gb\r\nPosso aceitar troca por telemóveis', 500, 'Sete Rios', 2258, 7, 'Informática', 'Semi-novo', 'HP', '', '1', '5', 'IMG-63efe02e87c934.57813910.jpg', '2023-02-17 20:14:38'),
(77, 'Placa Gráfica ', '', 120, 'Amadora', 2485, 1, 'Informática', 'Novo', 'Outro', '', '9', '12', 'IMG-63f0058e095d40.27505008.jpg', '2023-02-17 22:54:06'),
(79, 'iPhone 8 64gb', '', 150, 'Sintra', 1135, 7, 'Mobilidade', 'Semi-novo', 'Apple', '', '7', '3', 'IMG-63f2a127116744.42147163.webp', '2023-02-19 22:22:31'),
(87, 'Setup gaming completo', 'Vendo setup gaming completo com tudo incluso e no precinho!', 2000, 'Lisboa', 1704, 83, 'Informática', 'Semi-novo', 'Asus', '', '1', '28', 'IMG-63f4f1862b8731.50118216.webp', '2023-02-21 16:29:58'),
(91, 'teste djhsdfdffff hsadud dashdasdhasud', '', 0, '', 100, 83, '', '', '', '', '', '', 'semImagem.jpg', '2023-08-03 13:20:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciosfavoritos`
--

CREATE TABLE `anunciosfavoritos` (
  `idFavorito` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anunciosfavoritos`
--

INSERT INTO `anunciosfavoritos` (`idFavorito`, `idUser`, `idAnuncio`, `data`) VALUES
(53, 1, 79, '2023-08-02 19:19:51'),
(54, 1, 76, '2023-08-02 19:24:00'),
(56, 1, 87, '2023-08-02 19:47:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='categoria do anuncio';

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Informática'),
(2, 'Mobilidade'),
(3, 'Agricultura'),
(4, 'Moda'),
(5, 'Móveis'),
(6, 'Imóveis'),
(7, 'Empregos'),
(8, 'Serviços'),
(9, 'Veículos'),
(10, 'Desporto'),
(11, 'Animais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `idChat` int(11) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idDestinatario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `visualizacao` enum('0','1') NOT NULL COMMENT '0 = nao visto e 1 = visto',
  `dataEnvio` datetime NOT NULL DEFAULT current_timestamp(),
  `dataAtt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`idChat`, `idAnuncio`, `idUser`, `idDestinatario`, `nome`, `mensagem`, `visualizacao`, `dataEnvio`, `dataAtt`) VALUES
(376, 79, 83, 7, 'Maria12', 'Iphone com botão kkkk', '1', '2023-02-22 21:41:23', '2023-08-11 14:48:14'),
(377, 77, 83, 1, 'Maria12', 'Qual o mínimo que aceita?', '1', '2023-02-22 21:42:11', '2023-08-11 14:58:15'),
(398, 46, 83, 7, 'Maria12', 'teste 20', '1', '2023-02-22 22:34:38', '2023-08-11 14:48:11'),
(399, 46, 83, 7, 'Maria12', 'teste 21', '1', '2023-02-22 22:44:53', '2023-08-11 14:48:11'),
(400, 87, 7, 83, 'Wess1227_', 'Olá', '1', '2023-02-22 23:48:59', '2023-08-11 15:52:02'),
(403, 87, 7, 83, 'Wess1227_', 'asd', '1', '2023-02-23 11:56:27', '2023-08-11 15:52:02'),
(407, 87, 7, 83, 'Wess1227_', 'afasdfas', '1', '2023-02-23 11:56:35', '2023-08-11 15:52:02'),
(408, 87, 7, 83, 'Wess1227_', 'adsfasdf', '1', '2023-02-23 11:56:40', '2023-08-11 15:52:02'),
(420, 54, 83, 0, 'Maria12', 'teste 49? kkk', '0', '2023-02-24 17:27:34', '2023-08-11 14:46:12'),
(429, 87, 84, 83, 'teste2', 'Olá, tenho interesse no seu anúncio', '1', '2023-02-24 22:40:32', '2023-08-11 16:03:30'),
(430, 87, 84, 83, 'teste2', 'Tenho uma proposta de 1700€', '1', '2023-02-24 22:40:53', '2023-08-11 16:03:30'),
(431, 87, 84, 83, 'teste2', 'Aceita?', '1', '2023-02-24 22:40:56', '2023-08-11 16:03:30'),
(458, 87, 83, 7, 'Maria12', 'oi?', '1', '2023-02-25 14:26:39', '2023-08-11 14:48:28'),
(459, 87, 83, 7, 'Maria12', 'Fala como gente para eu perceber, seu ******', '1', '2023-02-25 14:40:14', '2023-08-11 14:48:28'),
(460, 87, 83, 7, 'Maria12', 'Quer saber se tá disponível? SIM TA', '1', '2023-02-25 14:41:47', '2023-08-11 14:48:28'),
(461, 87, 83, 84, 'Maria12', 'Boas amigo!', '0', '2023-02-25 14:59:47', '2023-08-11 14:46:12'),
(462, 87, 83, 84, 'Maria12', 'Terei que ver...', '0', '2023-02-25 14:59:59', '2023-08-11 14:46:12'),
(463, 46, 83, 0, 'Maria12', 'adasdas', '0', '2023-02-25 15:36:34', '2023-08-11 14:46:12'),
(464, 46, 83, 0, 'Maria12', 'dasda', '0', '2023-02-25 15:36:36', '2023-08-11 14:46:12'),
(466, 46, 83, 0, 'Maria12', 'teste 3', '0', '2023-02-25 15:51:36', '2023-08-11 14:46:12'),
(468, 87, 83, 7, 'Maria12', 'Pão é um alimento obtido pela cocção de uma massa de consistência elástica, elaborada basicamente com farinha de cereal, água, sal/açúcar. A evidência de ocorrência mais antiga de pão na Europa data de há 30 mil anos.', '1', '2023-02-25 16:22:40', '2023-08-11 14:48:28'),
(469, 54, 83, 0, 'Maria12', 'mds', '0', '2023-02-25 17:02:53', '2023-08-11 14:46:12'),
(470, 77, 83, 0, 'Maria12', 'oi', '0', '2023-02-25 17:03:20', '2023-08-11 14:46:12'),
(471, 87, 7, 83, 'Wess1227_', 'Pão?', '1', '2023-02-27 09:20:33', '2023-08-11 15:52:02'),
(472, 87, 83, 7, 'Maria12', 'Sim, pão, muito bom!', '1', '2023-02-27 09:21:24', '2023-08-11 14:48:28'),
(476, 87, 7, 83, 'Wess1227_', 'Oi Lucas!', '1', '2023-02-27 10:38:24', '2023-08-11 15:52:02'),
(485, 87, 83, 7, 'Maria12', 'Lucas? QUE LUCAS? me respeita', '1', '2023-02-27 12:02:48', '2023-08-11 14:48:28'),
(488, 54, 83, 0, 'Maria12', 'lol', '0', '2023-02-27 12:44:02', '2023-08-11 14:46:12'),
(489, 54, 83, 0, 'Maria12', 'kkkk', '0', '2023-02-27 12:44:30', '2023-08-11 14:46:12'),
(490, 87, 84, 83, 'teste2', 'Consigo 1800€ hoje!', '1', '2023-03-10 13:58:34', '2023-08-11 16:03:30'),
(491, 87, 84, 83, 'teste2', 'Consegues?', '1', '2023-03-10 13:59:50', '2023-08-11 16:03:30'),
(492, 87, 7, 83, 'Wess1227_', 'Tá', '1', '2023-03-10 14:03:03', '2023-08-11 15:52:02'),
(493, 46, 7, 83, 'Wess1227_', 'Vai testar *** ***', '1', '2023-03-10 14:03:23', '2023-08-11 15:50:45'),
(494, 76, 7, 83, 'Wess1227_', '?', '1', '2023-03-10 14:03:39', '2023-08-11 15:59:16'),
(495, 79, 7, 83, 'Wess1227_', 'teu ** kkk', '0', '2023-03-10 14:03:50', '2023-08-11 15:50:44'),
(513, 87, 86, 83, 'dipi', 'olaº', '1', '2023-03-16 15:49:06', '2023-08-11 15:58:07'),
(514, 87, 86, 83, 'dipi', 'tudo bem', '1', '2023-03-16 15:49:17', '2023-08-11 15:58:07'),
(578, 73, 83, 1, 'Maria12', 'oie', '1', '2023-03-19 12:38:33', '2023-08-11 14:58:26'),
(579, 73, 83, 1, 'Maria12', '?', '1', '2023-03-19 12:38:46', '2023-08-11 14:58:26'),
(580, 73, 83, 1, 'Maria12', 'isso é tao racista...', '1', '2023-03-19 12:38:55', '2023-08-11 14:58:26'),
(590, 73, 1, 83, 'Admin', '?', '1', '2023-03-19 13:07:59', '2023-08-11 15:57:32'),
(591, 73, 1, 83, 'Admin', 'quer ir de ban?', '1', '2023-03-19 13:08:04', '2023-08-11 15:57:32'),
(593, 77, 1, 83, 'Admin', 'aceito um cheque de 500€', '0', '2023-03-19 15:02:36', '2023-08-11 15:50:44'),
(594, 73, 1, 83, 'Admin', 'pao', '1', '2023-03-20 15:41:36', '2023-08-11 15:57:32'),
(597, 73, 83, 1, 'Maria12', 'quero', '1', '2023-03-22 12:57:17', '2023-08-11 14:58:26'),
(598, 73, 83, 1, 'Maria12', 'da ban aí entao!', '1', '2023-03-22 12:57:27', '2023-08-11 14:58:26'),
(609, 77, 83, 1, 'Maria12', 'NUNCA', '1', '2023-03-22 15:10:23', '2023-08-11 14:58:15'),
(633, 77, 1, 83, 'Admin', '1', '0', '2023-03-24 12:02:23', '2023-08-11 15:50:44'),
(808, 77, 83, 1, 'Maria12', '2', '1', '2023-04-07 17:01:03', '2023-08-11 14:58:15'),
(814, 77, 1, 83, 'Admin', '3', '0', '2023-04-07 17:04:31', '2023-08-11 15:50:44'),
(873, 77, 83, 1, 'Maria12', '4', '1', '2023-04-07 19:08:20', '2023-08-11 14:58:15'),
(882, 77, 83, 1, 'Maria12', '5', '1', '2023-04-07 19:17:23', '2023-08-11 14:58:15'),
(885, 73, 1, 83, 'Admin', 'a', '1', '2023-08-02 16:20:06', '2023-08-11 15:57:32'),
(887, 77, 1, 83, 'Admin', 'TESTE', '0', '2023-08-02 19:50:11', '2023-08-11 15:50:44'),
(903, 73, 83, 1, 'Maria12', 'pao', '1', '2023-08-06 18:59:32', '2023-08-11 14:58:26'),
(905, 87, 83, 86, 'Maria12', 'sei', '0', '2023-08-07 17:44:04', '2023-08-11 14:46:12'),
(906, 79, 83, 7, 'Maria12', 'ban', '1', '2023-08-07 17:46:03', '2023-08-11 14:48:14'),
(907, 87, 83, 84, 'Maria12', '.', '0', '2023-08-07 20:00:41', '2023-08-11 14:46:12'),
(911, 46, 7, 83, 'Wess1227_', 'teste', '1', '2023-08-11 13:19:13', '2023-08-11 15:50:45'),
(917, 76, 83, 7, 'Maria12', 'sa', '1', '2023-08-11 13:35:16', '2023-08-11 14:46:53'),
(920, 46, 83, 1, 'Maria12', 'a', '1', '2023-08-11 13:45:22', '2023-08-11 14:46:12'),
(924, 46, 1, 83, 'Admin', 'b', '1', '2023-08-11 13:49:54', '2023-08-11 15:56:15'),
(926, 46, 83, 1, 'Maria12', 'c', '1', '2023-08-11 14:10:06', '2023-08-11 14:58:18'),
(930, 76, 7, 83, 'Wess1227_', 'Fala direito!', '1', '2023-08-11 14:52:11', '2023-08-11 15:59:16'),
(931, 73, 1, 83, 'Admin', 'oie', '1', '2023-08-11 14:58:46', '2023-08-11 15:57:32'),
(932, 87, 83, 84, 'Maria12', 'xiu', '0', '2023-08-11 15:40:59', '2023-08-11 15:40:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

CREATE TABLE `denuncias` (
  `idDenuncia` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idDenunciado` int(11) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `idChat` int(11) NOT NULL,
  `tipoDenuncia` varchar(255) NOT NULL,
  `print` int(11) NOT NULL,
  `dataDenuncia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`idDenuncia`, `idUser`, `idDenunciado`, `motivo`, `idAnuncio`, `idChat`, `tipoDenuncia`, `print`, `dataDenuncia`) VALUES
(1, 83, 84, 'KKKKKKKKKKKKKKKKK', 0, 429, 'Mensagem', 0, '2023-03-10 15:00:43'),
(3, 1, 83, 'Sei lá', 0, 486, 'Mensagem', 0, '2023-03-10 15:01:41'),
(4, 83, 1, 'Sei lá.', 0, 633, 'Mensagem', 0, '2023-04-07 14:21:11'),
(5, 83, 1, 'Sei lá.', 0, 633, 'Mensagem', 0, '2023-04-07 14:21:11'),
(6, 1, 83, 'hm...', 0, 598, 'Mensagem', 0, '2023-04-07 19:23:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filtros`
--

CREATE TABLE `filtros` (
  `idFiltro` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `pesquisa` varchar(255) NOT NULL,
  `precoMin` int(11) NOT NULL,
  `precoMax` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idSubCategoria` int(11) NOT NULL,
  `idSubSubCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `filtros`
--

INSERT INTO `filtros` (`idFiltro`, `idUser`, `pesquisa`, `precoMin`, `precoMax`, `ordem`, `idCategoria`, `idSubCategoria`, `idSubSubCategoria`) VALUES
(22, 83, '', 0, 0, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `foruns`
--

CREATE TABLE `foruns` (
  `idForum` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `criador` int(11) NOT NULL,
  `participantes` int(11) NOT NULL,
  `dataCriacao` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `idImagem` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataCriacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Marca do produto';

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`idMarca`, `marca`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Huawei'),
(5, 'Realme'),
(6, 'OPPO'),
(7, 'Oneplus'),
(8, 'Vivo'),
(9, 'Asus'),
(10, 'Motorola'),
(11, 'Nokia'),
(12, 'Google'),
(13, 'LG'),
(14, 'Alcatel'),
(15, 'ZTE'),
(16, 'Sony'),
(17, 'Honor'),
(18, 'Microsoft'),
(26, 'Tesla'),
(27, 'Porsche'),
(28, 'BMW'),
(29, 'Audi'),
(30, 'Ferrari'),
(36, 'HP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `idPesquisa` int(11) NOT NULL,
  `pesquisa` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dataPesquisa` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pesquisas`
--

INSERT INTO `pesquisas` (`idPesquisa`, `pesquisa`, `idUser`, `dataPesquisa`) VALUES
(1, 'pao', 83, '0000-00-00 00:00:00'),
(2, 'anoes', 83, '2023-03-10 14:49:39'),
(3, 'pao', 1, '2023-03-10 15:03:17'),
(4, 'teste', 1, '2023-03-10 15:03:19'),
(5, 'Anúncios', 1, '2023-03-10 15:03:43'),
(6, 'poa', 1, '2023-03-10 15:13:21'),
(7, 'testes', 1, '2023-03-10 15:15:07'),
(8, 'teste', 1, '2023-03-10 15:15:11'),
(9, 'Anúncios', 1, '2023-03-10 15:19:22'),
(10, 'teste', 1, '2023-03-10 15:57:06'),
(11, 'Anúncios', 1, '2023-03-10 16:01:56'),
(12, 'a', 83, '2023-03-11 14:43:46'),
(13, 'Anúncios', 83, '2023-03-11 14:44:01'),
(14, 'a', 83, '2023-03-11 14:48:15'),
(15, 'Anúncios', 83, '2023-03-11 14:48:39'),
(16, 'a', 83, '2023-03-11 14:48:46'),
(17, 'teste', 83, '2023-03-11 14:48:50'),
(18, 'Anúncios', 83, '2023-03-11 14:49:26'),
(19, 'teste', 83, '2023-03-11 14:51:19'),
(20, 'Anúncios', 83, '2023-03-11 14:51:25'),
(21, 'teste', 83, '2023-03-11 14:52:27'),
(22, 'Anúncios', 83, '2023-03-11 15:01:48'),
(23, 'teste', 83, '2023-03-11 15:05:16'),
(24, 'Anúncios', 83, '2023-03-11 15:06:35'),
(25, 'j', 83, '2023-03-11 15:13:07'),
(26, 'teste', 83, '2023-03-11 15:13:10'),
(27, 'Anúncios', 83, '2023-03-11 15:13:52'),
(28, 'teste', 83, '2023-03-11 15:15:12'),
(29, 'Anúncios', 83, '2023-03-11 15:17:08'),
(30, 'teste', 83, '2023-03-11 15:17:25'),
(31, 'Anúncios', 83, '2023-03-11 15:19:08'),
(32, 'teste', 83, '2023-03-11 15:20:21'),
(33, 'Anúncios', 83, '2023-03-11 15:21:02'),
(34, 'teste', 83, '2023-03-11 15:23:56'),
(35, 'mouse', 83, '2023-03-11 15:24:12'),
(36, 'Anúncios', 83, '2023-03-11 15:24:19'),
(37, 'teste', 83, '2023-03-11 15:25:33'),
(38, 'Anúncios', 83, '2023-03-11 15:25:55'),
(39, 'g', 83, '2023-03-11 15:34:50'),
(40, 'Anúncios', 83, '2023-03-11 15:35:23'),
(41, 'a', 83, '2023-03-11 15:36:32'),
(42, 'b', 83, '2023-03-11 15:36:36'),
(43, 'teste', 83, '2023-03-11 15:36:45'),
(44, 'Anúncios', 83, '2023-03-11 15:37:13'),
(45, 'pao', 83, '2023-03-11 15:37:20'),
(46, 'Anúncios', 83, '2023-03-11 15:37:58'),
(47, 'teste', 83, '2023-03-11 15:38:14'),
(48, 'Anúncios', 83, '2023-03-11 15:38:37'),
(49, 'teste', 83, '2023-03-11 15:40:38'),
(50, 'pao', 83, '2023-03-11 15:40:52'),
(51, 'teste', 83, '2023-03-11 15:40:56'),
(52, 'Anúncios', 83, '2023-03-11 15:42:58'),
(53, 'teste', 83, '2023-03-11 15:45:22'),
(54, 'a', 83, '2023-03-11 15:58:05'),
(55, 'Anúncios', 83, '2023-03-11 16:03:27'),
(56, 'teste', 83, '2023-03-11 16:08:55'),
(57, 'Anúncios', 83, '2023-03-11 16:10:22'),
(58, 'teste', 83, '2023-03-11 16:10:23'),
(59, 'Anúncios', 83, '2023-03-11 16:13:27'),
(60, 'teste', 83, '2023-03-11 16:15:01'),
(61, 'testeº', 83, '2023-03-11 17:31:24'),
(62, 'teste', 83, '2023-03-11 17:31:27'),
(63, 'Anúncios', 83, '2023-03-11 17:35:24'),
(64, 'oi', 83, '2023-03-11 18:20:48'),
(65, 'teste', 83, '2023-03-11 18:21:00'),
(66, 'Anúncios', 83, '2023-03-11 18:21:20'),
(67, 'Anúncios', 83, '2023-03-12 12:06:03'),
(68, 'tedste', 83, '2023-03-12 12:14:16'),
(69, 'Anúncios', 83, '2023-03-12 12:14:19'),
(70, 'teste', 83, '2023-03-12 12:23:29'),
(71, 'Anúncios', 83, '2023-03-12 12:29:07'),
(72, 'teste', 83, '2023-03-12 12:30:57'),
(73, 'Anúncios', 83, '2023-03-12 12:31:17'),
(74, 'teste', 83, '2023-03-12 12:31:38'),
(75, 'Anúncios', 83, '2023-03-12 12:35:58'),
(76, '10', 83, '2023-03-12 12:55:23'),
(77, 'kjgfasldjfgsd', 83, '2023-03-12 12:55:32'),
(78, 'Anúncios', 83, '2023-03-12 13:35:17'),
(79, 'Anúncios', 83, '2023-03-13 12:08:06'),
(80, 'test', 83, '2023-03-15 12:27:16'),
(81, 'Anúncios', 83, '2023-03-15 12:27:30'),
(82, 'teste', 83, '2023-03-16 11:32:36'),
(83, 'TESTE', 83, '2023-03-16 11:40:54'),
(84, 'Anúncios', 83, '2023-03-16 11:41:34'),
(85, 'teste', 83, '2023-03-16 11:41:44'),
(86, 'Anúncios', 83, '2023-03-16 11:42:22'),
(87, 'teste', 83, '2023-03-16 11:51:04'),
(88, 'Anúncios', 83, '2023-03-16 11:51:08'),
(89, 'teste', 83, '2023-03-16 11:52:13'),
(90, 'Anúncios', 83, '2023-03-16 11:59:59'),
(91, 'ola', 83, '2023-03-16 12:04:16'),
(92, 'teste', 83, '2023-03-16 12:04:18'),
(93, 'Anúncios', 83, '2023-03-16 12:04:20'),
(94, 'teste', 83, '2023-03-16 12:10:38'),
(95, 'pao', 83, '2023-03-16 12:14:02'),
(96, 'teste', 83, '2023-03-16 12:14:05'),
(97, 's', 83, '2023-03-16 12:14:58'),
(98, 'Anúncios', 83, '2023-03-16 12:17:17'),
(99, 'teste', 83, '2023-03-16 12:18:36'),
(100, 'a', 83, '2023-03-16 12:23:45'),
(101, 'b', 83, '2023-03-16 12:23:49'),
(102, 'c', 83, '2023-03-16 12:23:52'),
(103, 'b', 83, '2023-03-16 12:24:22'),
(104, 'a', 83, '2023-03-16 12:24:24'),
(105, 'b', 83, '2023-03-16 12:25:22'),
(106, 'a', 83, '2023-03-16 12:25:24'),
(107, 'Anúncios', 83, '2023-03-16 12:25:27'),
(108, 'teste', 83, '2023-03-16 12:34:55'),
(109, 'Anúncios', 83, '2023-03-16 12:38:25'),
(110, 'teste', 83, '2023-03-16 12:55:18'),
(111, 'Anúncios', 83, '2023-03-16 12:56:19'),
(112, 'teste', 83, '2023-03-16 12:56:57'),
(113, 'Anúncios', 83, '2023-03-16 12:57:01'),
(114, 'Anúncios', 0, '2023-03-16 13:05:14'),
(115, 'pao', 83, '2023-03-16 13:07:17'),
(116, 'teste', 83, '2023-03-16 13:07:21'),
(117, ' ', 83, '2023-03-16 13:07:46'),
(118, 'Anúncios', 83, '2023-03-16 13:08:21'),
(119, 'teste', 83, '2023-03-16 13:08:48'),
(120, 'Anúncios', 83, '2023-03-16 13:09:00'),
(121, 'teste', 83, '2023-03-16 13:09:31'),
(122, 'Anúncios', 83, '2023-03-16 13:09:38'),
(123, 'teste', 83, '2023-03-16 13:10:16'),
(124, 'pao', 83, '2023-03-16 13:13:25'),
(125, 'Anúncios', 83, '2023-03-16 13:13:56'),
(126, 'teste', 83, '2023-03-16 13:14:42'),
(127, 'pao', 83, '2023-03-16 13:14:52'),
(128, 'teste', 83, '2023-03-16 16:23:12'),
(129, 'teste', 83, '2023-03-19 12:18:25'),
(130, 'pao', 83, '2023-03-19 12:36:54'),
(131, 'Anúncios', 83, '2023-03-19 12:39:58'),
(132, 'teste', 83, '2023-03-19 12:43:59'),
(133, 'Anúncios', 1, '2023-03-20 15:20:40'),
(134, 'pao', 1, '2023-03-20 15:42:07'),
(135, 'Anúncios', 1, '2023-03-21 15:56:42'),
(136, 'tests', 83, '2023-03-23 13:06:10'),
(137, 'Anúncios', 83, '2023-03-23 13:09:53'),
(138, 'Anúncios', 83, '2023-03-24 11:45:06'),
(139, 'teste', 83, '2023-03-24 11:46:27'),
(140, 'Anúncios', 83, '2023-04-07 14:25:06'),
(141, 'teste', 83, '2023-04-07 17:08:29'),
(142, 'testwe', 1, '2023-04-07 19:30:19'),
(143, 'a', 1, '2023-04-07 19:30:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `nome`, `idCategoria`) VALUES
(1, 'Computadores', 1),
(2, 'Consolas', 1),
(3, 'Eletronicos', 1),
(4, 'TVs', 1),
(5, 'Som', 1),
(6, 'Fotografia', 1),
(7, 'Telemoveis e Tablets', 2),
(8, 'Bolas', 10),
(9, 'Componentes', 1),
(10, 'Relógios', 2),
(11, 'Acessórios - Desporto', 10),
(12, 'Acessórios - Informática', 1),
(13, 'Acessórios - Mobilidade', 2),
(17, 'Roupa', 4),
(18, 'Calçados', 4),
(19, 'Acessórios', 4),
(20, 'Malas', 4),
(21, 'Armazenamento', 1),
(22, 'Cadeiras', 5),
(23, 'Periféricos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subsubcategoria`
--

CREATE TABLE `subsubcategoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `idSubCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `subsubcategoria`
--

INSERT INTO `subsubcategoria` (`id`, `nome`, `idSubCategoria`) VALUES
(2, 'Servidores', 1),
(3, 'Smartphone', 7),
(4, 'Bola de futebol', 8),
(5, 'Notebook', 1),
(6, 'PlayStation', 2),
(7, 'Xbox', 2),
(8, 'Tablets', 7),
(11, 'Processadores', 9),
(12, 'Placas gráficas', 9),
(13, 'SSD', 21),
(14, 'HD', 21),
(15, 'Fonte de alimentação', 9),
(16, 'Motherboard', 9),
(17, 'Caixas', 9),
(18, 'Coolers', 9),
(19, 'Memória RAM', 9),
(20, 'Cabos', 9),
(21, 'LEDs', 9),
(22, 'Driver CD', 9),
(23, 'Driver DVD', 9),
(24, 'Placa de rede', 9),
(25, 'Driver BluRay', 9),
(26, 'Cadeira com rodas', 22),
(27, 'Teclado', 23),
(28, 'Computadores - Torre', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(150) NOT NULL COMMENT 'Nome Pessoal do Utilizador',
  `apelido` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL COMMENT 'Sistema de niveis, que permitirá quem possuir mais niveis, fazer coisas a mais do que quem é novo no site',
  `xp` int(11) NOT NULL COMMENT 'xp são pontos que serão necessários obter para subir de nível',
  `avaliacao` int(11) NOT NULL COMMENT 'AvaliaÃ§Ã£o do utilizador',
  `morada` varchar(255) NOT NULL COMMENT 'Morada',
  `cod_postal` varchar(9) NOT NULL COMMENT 'CÃ³digo Postal',
  `localidade` varchar(30) NOT NULL COMMENT 'Localidade',
  `telemovel` int(9) NOT NULL,
  `nif` int(9) NOT NULL COMMENT 'Nr Contribuinte de empresa ou Pessoal',
  `nome_empresa` varchar(255) DEFAULT NULL COMMENT 'Nome da empresa a ser preenchido caso o tipo de negÃ³cio seja ''n''',
  `tipo_negocio` enum('s','n') NOT NULL COMMENT 'Se s = particular\r\nSe n = empresa',
  `fotoPerfil` mediumtext NOT NULL,
  `genero` enum('1','2','3') NOT NULL COMMENT 'Se 1 = Masculino\r\nSe 2 = Feminino\r\nSe 3 = Outro',
  `dataCriacao` date NOT NULL DEFAULT current_timestamp() COMMENT 'Quando a conta foi criada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de dados dos utilizadores da aplicaÃ§Ã£o ';

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `user`, `email`, `senha`, `nome`, `apelido`, `nivel`, `xp`, `avaliacao`, `morada`, `cod_postal`, `localidade`, `telemovel`, `nif`, `nome_empresa`, `tipo_negocio`, `fotoPerfil`, `genero`, `dataCriacao`) VALUES
(1, 'Admin', 'admin', '1227', 'Wesley', 'Nascimento', 10, 850, 0, 'av. teste', '1234-123', 'Amadora', 976547654, 294982634, NULL, 'n', 'IMG-63ecf56fe4d0d7.53409310.jpg', '1', '2023-02-22'),
(7, 'Wess1227_', 'teste', '1', 'David', 'Semedo', 0, 0, 0, 'Rua teste 24, 4F', '2776-125', 'Budapeste', 948723646, 274873264, NULL, 'n', 'IMG-63f3de19b7d685.96727583.jpg', '1', '2023-02-22'),
(83, 'Maria12', 'Maria12@gmail.com', '1', 'Maria', 'Paula', 1, 510, 0, 'Rua Pedro Nunes, 12, 4F', '2475-324', 'Almada', 922643435, 293465364, NULL, 'n', 'IMG-640b39b52c1b87.02409910.jpeg', '2', '2023-02-22'),
(84, 'teste2', 'teste2@gmail.com', '1', 'Nivaldo', 'Pires', 0, 0, 0, '', '', '', 0, 0, NULL, 's', 'semFotoPerfil.png', '1', '2023-02-24'),
(86, 'dipi', 'dpmedpm@gmail.cm', '1234', 'daniel', 'martins', 0, 0, 0, 'mae do wes', '2735', '555', 987654321, 92929328, NULL, 's', 'semFotoPerfil.png', '1', '2023-03-16');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idAnuncio`);

--
-- Índices para tabela `anunciosfavoritos`
--
ALTER TABLE `anunciosfavoritos`
  ADD PRIMARY KEY (`idFavorito`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idChat`);

--
-- Índices para tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`idDenuncia`);

--
-- Índices para tabela `filtros`
--
ALTER TABLE `filtros`
  ADD PRIMARY KEY (`idFiltro`);

--
-- Índices para tabela `foruns`
--
ALTER TABLE `foruns`
  ADD PRIMARY KEY (`idForum`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`idImagem`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Índices para tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD PRIMARY KEY (`idPesquisa`);

--
-- Índices para tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subsubcategoria`
--
ALTER TABLE `subsubcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idUser` (`idUser`,`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `anunciosfavoritos`
--
ALTER TABLE `anunciosfavoritos`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=934;

--
-- AUTO_INCREMENT de tabela `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `filtros`
--
ALTER TABLE `filtros`
  MODIFY `idFiltro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `foruns`
--
ALTER TABLE `foruns`
  MODIFY `idForum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `idPesquisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `subsubcategoria`
--
ALTER TABLE `subsubcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
