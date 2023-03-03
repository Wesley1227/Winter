-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Mar-2023 às 10:52
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `titulo`, `descricao`, `preco`, `localizacao`, `visualizacoes`, `idUser`, `idCategoria`, `estadoProduto`, `marca`, `intAnuncio`, `subCategoria`, `subSubCategoria`, `imagem`, `dataCriacao`) VALUES
(1, 'Título do anúncio', 'Descrição', 123, 'Localização', 1894, 0, '', 'Imaculado', '[value-10]', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(2, 'teste 1', '', 0, '', 1896, 0, 'Informática', '', '', '', 'Computadores', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(3, 'teste 2', 'pao', 125, '', 1883, 0, 'Informática', '', '', 'compra', 'Computadores', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(4, 'teste 3', 'açkud', 126, '', 1634, 0, 'Informática', '', '', 'compra', 'Computadores', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(5, 'teste 4', '', 0, '', 679, 0, 'Veículos', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(6, 'teste 5', '', 0, '', 679, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(7, 'teste 5', '', 0, '', 684, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(8, 'teste 6', '', 0, '', 673, 0, '', '', '', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(15, 'teste 7', 'sadfasf', 123, '', 674, 0, '', 'Usado', '1', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(17, 'teste 8', 'sfa fas', 132, '', 674, 0, 'Informática', '', '3', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(21, 'teste 9', 'fasfas asfsd', 6534, '', 671, 0, 'Informática', 'Usado', '3', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(22, 'teste 10', 'jkbapiohsbçfkdja', 6523, '', 671, 0, 'Informática', 'Imaculado', '3', 'venda', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(23, 'teste 11', 'Apartamento T4 ', 3000000, '', 671, 0, 'Empregos', 'Usado', '3', 'venda', 'Apartamento', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(24, 'teste 12', 'GPU nova', 350, '', 644, 0, '', 'Imaculado', '', 'compra', '9', '12', 'semImagem.jpg', '2023-02-15 12:46:26'),
(28, 'teste 13', 'kryxuchg', 20, '', 687, 0, '', 'Usado', '', 'venda', 'Subcategoria não encontrada', 'Selecione subSubCategoria', 'semImagem.jpg', '2023-02-15 12:46:26'),
(29, 'teste 14', 'Xeon e5 2670 V2', 80, '', 681, 0, 'Informática', 'Imaculado', '', 'compra', '9', '11', 'semImagem.jpg', '2023-02-15 12:46:26'),
(31, 'teste 15', 'qwdflkjqwd', 230, '', 681, 0, 'Mobilidade', 'Semi-novo', 'Oneplus', 'compra', '7', '3', 'semImagem.jpg', '2023-02-15 12:46:26'),
(32, 'teste 16', '', 0, '', 675, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(33, 'teste 17', '', 0, '', 675, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:26'),
(36, 'teste 20', '', 0, '', 2016, 83, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(37, 'teste 21', '', 0, '', 2022, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(38, 'teste 22', '', 0, '', 2005, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(42, 'teste 25', '', 0, '', 2005, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(43, 'Lucas á parmegiana', '', 0, '', 1847, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(44, 'Vendo Lucas', 'Ele não presta', 99, '', 1846, 0, 'Informática', 'Estragado', '', 'compra', '9', '19', 'semImagem.jpg', '2023-02-15 12:46:31'),
(46, 'Produtos usados', 'Vendo essas tralhas pois estão sem uso a muito tempo e preciso do espaço.\nTexto aleatório a seguir porque sim: \r\nPão (do latim \"pane\")[1] é um alimento obtido pela cocção de uma massa de consistência elástica, elaborada basicamente com farinha de cereal (com proteínas formadores de glúten, geralmente de trigo), água, sal/açúcar.[2] A evidência de ocorrência mais antiga de pão na Europa data de há 30 mil anos.\n\nA esta mistura básica podem acrescentar-se vários ingredientes, desde gordura a especiarias, passando por carne (geralmente curada), frutas secas ou frutas cristalizadas, etc. O pão comercial por outro lado, geralmente contém aditivos para melhorar o sabor, textura, cor, vida de prateleira, nutrição e facilidade de fabricação.\n\nBasicamente existem tipos de pão: levedado, com adição de levedura/fermento biológico à massa, produzindo pães mais macios, e; ázimo, não fermentado,[3] que produz pães geralmente achatados e consistentes.', 450, 'Amadora', 1831, 1, 'Informática', 'Usado', 'Ferrari', 'compra', '9', '15', 'IMG-63c7e658c490a4.55154845.jpg', '2023-02-15 12:46:31'),
(49, 'pao', 'teste', 0, '', 1860, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(50, 'pao', 'teste 47', 0, '', 1860, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(51, 'teste 48', '', 0, '', 1900, 0, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(54, 'teste 49', 'Teste de user', 49, '', 2104, 1, 'Informática', '', 'Alcatel', 'doação', '1', '2', 'semImagem.jpg', '2023-02-15 12:46:31'),
(58, 'teste 52', 'Testar se criador do anuncio consegue ver os anuncios dele', 0, '', 2275, 7, '', '', '', '', '', '', 'semImagem.jpg', '2023-02-15 12:46:31'),
(73, 'Teclado mecânico Mars Gaming 60%', 'Teclado Mecânico Mars Gaming MKMINI RGB 60% PT Outemu Red · Peso: 400g · Dimensões: 292x102x37mm · Design: 60% mini · Material de teclado: ABS · Cor: Preto', 45, 'Cacem', 1935, 1, 'Informática', 'Novo', '', '', '23', '27', 'IMG-63ef9bf10f9e57.92921091.png', '2023-02-17 15:23:29'),
(76, 'Portátil HP ', '240gb\r\nPosso aceitar troca por telemóveis', 500, 'Sete Rios', 1657, 7, 'Informática', 'Semi-novo', 'HP', '', '1', '5', 'IMG-63efe02e87c934.57813910.jpg', '2023-02-17 20:14:38'),
(77, 'Placa Gráfica ', '', 120, 'Amadora', 1648, 1, 'Informática', 'Novo', 'Outro', '', '9', '12', 'IMG-63f0058e095d40.27505008.jpg', '2023-02-17 22:54:06'),
(79, 'iPhone 8 64gb', '', 150, 'Sintra', 531, 7, 'Mobilidade', 'Semi-novo', 'Apple', '', '7', '3', 'IMG-63f2a127116744.42147163.webp', '2023-02-19 22:22:31'),
(87, 'Setup gaming completo', 'Vendo setup gaming completo com tudo incluso e no precinho!', 2000, 'Lisboa', 271, 83, 'Informática', 'Semi-novo', 'Asus', '', '1', '28', 'IMG-63f4f1862b8731.50118216.webp', '2023-02-21 16:29:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='categoria do anuncio';

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
  `dataEnvio` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`idChat`, `idAnuncio`, `idUser`, `idDestinatario`, `nome`, `mensagem`, `dataEnvio`) VALUES
(376, 79, 83, 7, 'Maria12', 'Iphone com botão kkkk', '2023-02-22 21:41:23'),
(377, 77, 83, 1, 'Maria12', 'Qual o mínimo que aceita?', '2023-02-22 21:42:11'),
(378, 77, 83, 1, 'Maria12', '?', '2023-02-22 21:43:27'),
(379, 76, 83, 7, 'Maria12', 'LOL', '2023-02-22 21:43:45'),
(381, 46, 83, 7, 'Maria12', 'teste 2', '2023-02-22 21:51:59'),
(395, 46, 83, 7, 'Maria12', 'teste 17', '2023-02-22 22:29:22'),
(396, 46, 83, 7, 'Maria12', 'teste 18', '2023-02-22 22:29:35'),
(397, 46, 83, 7, 'Maria12', 'teste 19', '2023-02-22 22:32:15'),
(398, 46, 83, 7, 'Maria12', 'teste 20', '2023-02-22 22:34:38'),
(399, 46, 83, 7, 'Maria12', 'teste 21', '2023-02-22 22:44:53'),
(400, 87, 7, 83, 'Wess1227_', 'Olá', '2023-02-22 23:48:59'),
(403, 87, 7, 83, 'Wess1227_', 'asd', '2023-02-23 11:56:27'),
(407, 87, 7, 83, 'Wess1227_', 'afasdfas', '2023-02-23 11:56:35'),
(408, 87, 7, 83, 'Wess1227_', 'adsfasdf', '2023-02-23 11:56:40'),
(420, 54, 83, 0, 'Maria12', 'teste 49? kkk', '2023-02-24 17:27:34'),
(428, 46, 83, 7, 'Maria12', 'teste 23', '2023-02-24 22:04:07'),
(429, 87, 84, 83, 'teste2', 'Olá, tenho interesse no seu anúncio', '2023-02-24 22:40:32'),
(430, 87, 84, 83, 'teste2', 'Tenho uma proposta de 1700€', '2023-02-24 22:40:53'),
(431, 87, 84, 83, 'teste2', 'Aceita?', '2023-02-24 22:40:56'),
(458, 87, 83, 7, 'Maria12', 'oi?', '2023-02-25 14:26:39'),
(459, 87, 83, 7, 'Maria12', 'Fala como gente para eu perceber, seu ******', '2023-02-25 14:40:14'),
(460, 87, 83, 7, 'Maria12', 'Quer saber se tá disponível? SIM TA', '2023-02-25 14:41:47'),
(461, 87, 83, 84, 'Maria12', 'Boas amigo!', '2023-02-25 14:59:47'),
(462, 87, 83, 84, 'Maria12', 'Terei que ver...', '2023-02-25 14:59:59'),
(463, 46, 83, 0, 'Maria12', 'adasdas', '2023-02-25 15:36:34'),
(464, 46, 83, 0, 'Maria12', 'dasda', '2023-02-25 15:36:36'),
(466, 46, 83, 0, 'Maria12', 'teste 3', '2023-02-25 15:51:36'),
(468, 87, 83, 7, 'Maria12', 'Pão é um alimento obtido pela cocção de uma massa de consistência elástica, elaborada basicamente com farinha de cereal, água, sal/açúcar. A evidência de ocorrência mais antiga de pão na Europa data de há 30 mil anos.', '2023-02-25 16:22:40'),
(469, 54, 83, 0, 'Maria12', 'mds', '2023-02-25 17:02:53'),
(470, 77, 83, 0, 'Maria12', 'oi', '2023-02-25 17:03:20'),
(471, 87, 7, 83, 'Wess1227_', 'Pão?', '2023-02-27 09:20:33'),
(472, 87, 83, 7, 'Maria12', 'Sim, pão, muito bom!', '2023-02-27 09:21:24'),
(476, 87, 7, 83, 'Wess1227_', 'Oi Lucas!', '2023-02-27 10:38:24'),
(485, 87, 83, 7, 'Maria12', 'Lucas? QUE LUCAS? me respeita', '2023-02-27 12:02:48'),
(486, 46, 83, 1, 'Maria12', 'teste 4', '2023-02-27 12:09:08'),
(488, 54, 83, 0, 'Maria12', 'lol', '2023-02-27 12:44:02'),
(489, 54, 83, 0, 'Maria12', 'kkkk', '2023-02-27 12:44:30');

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
  `print` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`idDenuncia`, `idUser`, `idDenunciado`, `motivo`, `idAnuncio`, `idChat`, `tipoDenuncia`, `print`) VALUES
(1, 83, 84, 'KKKKKKKKKKKKKKKKK', 0, 429, 'Mensagem', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `idImagem` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataCriacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Marca do produto';

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
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de dados dos utilizadores da aplicaÃ§Ã£o ';

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `user`, `email`, `senha`, `nome`, `apelido`, `avaliacao`, `morada`, `cod_postal`, `localidade`, `telemovel`, `nif`, `nome_empresa`, `tipo_negocio`, `fotoPerfil`, `genero`, `dataCriacao`) VALUES
(1, 'Admin', 'admin', '1227', 'Wesley', 'Nascimento', 0, 'av. teste', '1234-123', 'Amadora', 946238453, 294982634, NULL, 'n', 'IMG-63ecf56fe4d0d7.53409310.jpg', '1', '2023-02-22'),
(7, 'Wess1227_', 'teste', '1', 'David', 'Semedo', 0, 'Rua teste 24, 4F', '2776-125', 'Budapeste', 948723646, 274873264, NULL, 'n', 'IMG-63f3de19b7d685.96727583.jpg', '1', '2023-02-22'),
(83, 'Maria12', 'Maria12@gmail.com', '1', 'Maria', 'Santos', 0, 'Rua Pedro Nunes, 12, 4F', '2475-324', 'Almada', 966753675, 284734736, NULL, 's', 'IMG-63f62a941126d4.85983661.jpeg', '2', '2023-02-22'),
(84, 'teste2', 'teste2@gmail.com', '1', 'Nivaldo', 'Pires', 0, '', '', '', 0, 0, NULL, 's', 'semFotoPerfil.png', '1', '2023-02-24');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idAnuncio`);

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
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT de tabela `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
