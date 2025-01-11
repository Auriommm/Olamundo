-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2025 às 18:36
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hotel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nomecliente` varchar(100) NOT NULL,
  `numidentificacao` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nomecliente`, `numidentificacao`, `email`, `contacto`, `password`) VALUES
(1, 'Ana Gomes', '678SE5432', 'anagomes0@gmail.com', '963258741', '$2y$10$9.JaqRgJrUYbJR7uCkb6j./G..B7lQ/i468zjWIJcRza.1EhTo9Je'),
(2, 'Dinis António', '87GF456KL098', 'dinisantonio76@gmail.com', '954712682', '$2y$10$uWthP6rNP5JwiXkEsjabZ.bYaDziRlnWvnTnJkVmlz.msiuo6F1Yu'),
(3, 'Tiago Baptista', '65HGS7382', 'tiagobaptista@gmail.com', '945612472', '$2y$10$aiQyvxTueU4ygxZSEdaD6O.IpJvpiTIc49lgMOi96PEmKkVBSv9uq');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `nomefun` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cargo` enum('Recepcionista','Gerente','Gerente-Geral') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nomefun`, `email`, `password`, `cargo`) VALUES
(1, 'Magda Soares', 'magdasoares4@gmail.com', '$2y$10$uLiiKk..OKrd9/kgGJeBoOoMjtewfT2Ly828GmjYhtbaErRF2ewZK', 'Recepcionista'),
(2, 'Hugo Costa', 'hugocosta4@gmail.com', '$2y$10$5F8jYnvSaB3mYGDBa9hBuuHTmURxpsX0cSkBrWYTQF/x4WpccRn3C', 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idpagamento` int(11) NOT NULL,
  `formapagamento` enum('Cartão','Transferência','Dinheiro') DEFAULT NULL,
  `datapagamento` date NOT NULL,
  `valorpago` decimal(10,2) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`idpagamento`, `formapagamento`, `datapagamento`, `valorpago`, `cliente_idcliente`) VALUES
(3, 'Cartão', '2024-12-02', 100.00, 1),
(4, 'Transferência', '2024-01-10', 300.00, 2),
(5, 'Dinheiro', '2024-11-11', 200.00, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `idquarto` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `tipo` enum('Simples','Duplo','Suíte','Suíte Presidencial','Luxo','Executivo','Honeymoon','Adaptado','Família','Vista') DEFAULT NULL,
  `precodiario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`idquarto`, `numero`, `tipo`, `precodiario`) VALUES
(1, '112', 'Duplo', 80.00),
(2, '212', 'Simples', 70.00),
(3, '514', 'Executivo', 500.00),
(4, '657', 'Suíte Presidencial', 250.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idquarto` int(11) NOT NULL,
  `datacheckin` date NOT NULL,
  `datacheckout` date NOT NULL,
  `status` enum('Reservado','Cancelado','Finalizado') NOT NULL,
  `idpagamento` int(11) NOT NULL,
  `funcionario_idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idcliente`, `idquarto`, `datacheckin`, `datacheckout`, `status`, `idpagamento`, `funcionario_idfuncionario`) VALUES
(1, 1, 1, '2024-01-07', '2024-01-10', 'Reservado', 3, 1),
(2, 2, 2, '2025-01-13', '2025-01-15', 'Cancelado', 4, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` enum('Cliente','Funcionário') DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idfuncionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `email`, `username`, `password`, `tipo`, `idcliente`, `idfuncionario`) VALUES
(1, 'magdasoares@gmail.com', 'Magda', '$2y$10$9PRJmP2lUI2D7urQ7JCAyO6zctgG9X9YTG6/T2s7KAZ2xgDa95ICS', 'Funcionário', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idpagamento`),
  ADD KEY `fk_pagamento_cliente1_idx` (`cliente_idcliente`);

--
-- Índices para tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`idquarto`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reserva_cliente_idx` (`idcliente`),
  ADD KEY `fk_reserva_quarto1_idx` (`idquarto`),
  ADD KEY `fk_reserva_pagamento1_idx` (`idpagamento`),
  ADD KEY `fk_reserva_funcionario1_idx` (`funcionario_idfuncionario`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fk_user_cliente1_idx` (`idcliente`),
  ADD KEY `fk_user_funcionario1_idx` (`idfuncionario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `idquarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_pagamento_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_funcionario1` FOREIGN KEY (`funcionario_idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_pagamento1` FOREIGN KEY (`idpagamento`) REFERENCES `pagamento` (`idpagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_quarto1` FOREIGN KEY (`idquarto`) REFERENCES `quarto` (`idquarto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
