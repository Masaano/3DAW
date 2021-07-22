-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jul-2021 às 02:43
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
-- Banco de dados: `av2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nome`) VALUES
(1, 'Hardware'),
(2, 'Smartphones'),
(3, 'Perifericos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `codigoBarra` char(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipoProduto` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `linkImagem` varchar(100) NOT NULL,
  `dataInclusao` date NOT NULL,
  `ativo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `codigoBarra`, `nome`, `fabricante`, `categoria`, `tipoProduto`, `preco`, `quantidade`, `peso`, `descricao`, `linkImagem`, `dataInclusao`, `ativo`) VALUES
(1, '48559871347', 'SSD Kingston A400, 240GB, SATA, Leitura 500MB/s, Gravação 350MB/s - SA400S37/240G', 'Kingston ', 1, 1, '320.53', 500, 75, 'SSD A400 da Kingston. Performance incrível e tecnologia de ponta! Este SSD possui com a tecnologia 3D NAND (também chamada de V-NAND). Performance não será problema com este SSD. Ele possui uma controladora de última geração para velocidades de leitura e gravação de até 500MB/s e 350MB/s, este SSD é 10x mais rápido do que um HD tradicional para melhor desempenho, resposta ultrarrápida em multitarefas e um computador mais rápido de modo geral. O seu desktop merece esse grande upgrade de', '48559871347.jpg', '2021-05-01', 'DESATIVO'),
(3, '54861247895', 'Placa de Vídeo Gigabyte GTX 1660 Super OC NVIDIA Geforce 6G, GDDR6 - GV-N166SOC-6GD', 'Gigabyte ', 1, 2, '4235.18', 461, 890, 'O sistema de refrigeração WINDFORCE 2X possui 2x ventiladores de lâmina exclusivos de 90 mm, ventilador alternativo, uma GPU de toque direto de tubo de cobre composto com GPU e funcionalidade de ventilador ativo 3D, oferecendo juntos uma capacidade efetiva de dissipação de calor para desempenho superior em temperaturas mais baixas. O GIGABYTE ?Alternate Spinning? é a única solução que pode resolver o fluxo de ar turbulento dos ventiladores adjacentes.', '54861247895.jpg', '2021-07-04', 'ATIVO'),
(4, '46843548538', 'iPhone XR Preto, 64GB - MH6M3BR/A\r\n', 'Apple', 2, 3, '5279.89', 99, 385, 'iPhone XR! Brilhante em todos os sentidos! A tela Liquid Retina é a mais avançada LCD da indústria, com um novo design de retroiluminação que possibilita ampliar a tela até a borda, acompanhando a curvatura dos cantos. Assim você vê cores fiéis de ponta a ponta.', '46843548538.jpg', '2021-06-24', 'ATIVO'),
(6, '75341298078', 'Teclado Mecânico Gamer HyperX Mars, RGB, Switch Outemu Blue, US - HX-KB3BL3-US/R4', 'HyperX', 3, 5, '705.76', 1541, 1290, 'O Teclado Mecânico Gamer HyperX Mars é ideal para gamers que teclam diversas teclas por segundo, graças ao seu Switch Outemu Blue, é possível processar todos os movimentos, sem a chave de o usuário perder alguns deles. As movimentações rápidas no teclado proporciona ao Gamer vantagens em sua gameplay, com isso é necessário possui um teclado que atenda suas necessidades. ', '75341298078.jpg', '2021-07-04', 'ATIVO'),
(7, '06579841235', 'Fone de Ouvido Gamer Warrior Ariki, com Microfone Destacável, P3, Preto/Vermelho - PH296\r\n', 'Warrior', 3, 6, '97.53', 100, 115, 'Desenvolvido para consoles PS4 e Xbox One, o Fone de Ouvido Gamer Warrior Ariki também é compatível com smartphones, tablets e notebooks. Ideal para aprimorar sua experiência na hora de jogar seus jogos favoritos, proporcionando uma experiência sonora excelente', '06579841235.jpg', '2021-06-02', 'ATIVO'),
(10, '54896412354', 'SSD WD Blue SN550, 500GB, M.2, PCIe, NVMe', 'WD', 1, 1, '610.00', 200, 45, 'Ponha o poder do NVMe no coração do seu PC para obter um desempenho rápido como um raio, com altíssima capacidade de resposta. O WD Blue SN550 NVMe SSD pode fornecer mais de 4 vezes a velocidade dos nossos melhores SSDs SATA.', '54896412354.jpg', '2021-07-21', 'ATIVO'),
(65, '48586531048', 'Teclado Gamer Logitech G213 Prodigy, RGB, ABNT2', 'Logitech ', 3, 5, '499.88', 100, 1350, 'O corpo estreito do G213 Prodigy é durável, preciso e resistente a derramamentos, desenvolvido de acordo com a forma que você joga. Com teclas focadas no desempenho, o G213 Prodigy traz o que há de melhor em desempenho com teclas construídas especificamente para jogadores.', '48586531048.jpg', '2021-07-21', 'ATIVO'),
(73, '23486578941', 'iPhone 12 Vermelho, 128GB', 'Apple', 2, 3, '6649.05', 7, 330, 'A14 Bionic, o chip mais rápido em um smartphone. Tela OLED de ponta a ponta. Ceramic Shield quatro vezes mais resistente a quedas. E modo Noite em todas as câmeras. O iPhone 12 vem com tudo. O A14 Bionic é o chip mais rápido em um smartphone. E ultrapassa todos os limites. Seja processando trilhões de operações no Neural Engine ou filmando em Dolby Vision algo que nem câmeras profissionais conseguem fazer.', '23486578941.jpg', '2021-07-22', 'ATIVO'),
(74, '34568451655', 'Fone de Ouvido Gamer Intra Auricular JBL Quantum 50, Preto', 'JBL', 3, 6, '474.90', 10, 145, 'Os fones de ouvido para jogos G333 K/DA foram desenvolvidos para oferecer uma experiência de jogo completa e imersiva. Pronto para computadores e dispositivos móveis, Xbox, PlayStation e Nintendo com conexão auxiliar padrão de 3,5 mm. O adaptador USB-C permite conectar a ainda mais dispositivos.', '34568451655.jpg', '2021-07-22', 'ATIVO'),
(75, '54658486516', 'Placa de Vídeo Zotac Gaming NVIDIA GeForce RTX 2060, 6GB, GDDR6', 'Zotac', 1, 2, '3449.90', 446, 1090, 'A nova geração de placas gráficas ZOTAC GAMING GeForce está aqui. A nova e poderosa GeForce RTX 2060 aproveita a avançada arquitetura NVIDIA Turing para mergulhar você em incrível realismo e desempenho nos jogos mais recentes. O futuro dos jogos começa aqui.', '54658486516.jpg', '2021-07-22', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE `tipoproduto` (
  `idTipo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (`idTipo`, `nome`, `idCategoria`) VALUES
(1, 'SSD', 1),
(2, 'Placa de Video', 1),
(3, 'Apple', 2),
(4, 'Motorola', 2),
(5, 'Teclado', 3),
(6, 'Fone de Ouvido', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD UNIQUE KEY `codigoBarra` (`codigoBarra`),
  ADD KEY `FKprodutoCategoria` (`categoria`,`tipoProduto`);

--
-- Índices para tabela `tipoproduto`
--
ALTER TABLE `tipoproduto`
  ADD PRIMARY KEY (`idTipo`),
  ADD KEY `FKidCategoria` (`idCategoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `tipoproduto`
--
ALTER TABLE `tipoproduto`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FKprodutoCategoria` FOREIGN KEY (`categoria`,`tipoProduto`) REFERENCES `tipoproduto` (`idCategoria`, `idTipo`);

--
-- Limitadores para a tabela `tipoproduto`
--
ALTER TABLE `tipoproduto`
  ADD CONSTRAINT `FKidCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
