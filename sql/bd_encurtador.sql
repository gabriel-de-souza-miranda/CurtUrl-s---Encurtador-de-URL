-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Dez-2020 às 17:12
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_encurtador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos_login`
--

CREATE TABLE `eventos_login` (
  `tipo_evento` varchar(20) DEFAULT NULL,
  `email_user` varchar(80) NOT NULL,
  `ip_user` varchar(40) DEFAULT NULL,
  `data_login` date DEFAULT NULL,
  `horario_login` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos_login`
--

INSERT INTO `eventos_login` (`tipo_evento`, `email_user`, `ip_user`, `data_login`, `horario_login`) VALUES
('LOGIN', 'gabasan12@gmail.com', '192.168.15.102', '2020-12-14', '21:41:50'),
('LOGIN', 'gabasan12@gmail.com', '192.168.15.102', '2020-12-14', '21:57:21'),
('LOGIN', 'abdielb@yahoo.com', '192.168.15.100', '2020-12-15', '07:05:51'),
('LOGIN', 'abdielb@yahoo.com', '192.168.15.100', '2020-12-15', '07:06:29'),
('LOGIN', 'abdielb@yahoo.com', '192.168.15.100', '2020-12-15', '10:20:53'),
('LOGIN', 'abdielb@yahoo.com', '192.168.15.100', '2020-12-15', '11:05:46'),
('LOGIN', 'abdielb@yahoo.com', '192.168.15.100', '2020-12-15', '11:08:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `url_off`
--

CREATE TABLE `url_off` (
  `url_short` varchar(255) DEFAULT NULL,
  `url_long` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `url_off`
--

INSERT INTO `url_off` (`url_short`, `url_long`) VALUES
('0dbae66e', 'https://www.google.com.br/'),
('0dbae66e', 'https://www.google.com.br/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `url_on`
--

CREATE TABLE `url_on` (
  `id` int(11) NOT NULL,
  `email_user` varchar(80) DEFAULT NULL,
  `url_short` varchar(255) DEFAULT NULL,
  `url_long` text DEFAULT NULL,
  `quant_acessos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `url_on`
--

INSERT INTO `url_on` (`id`, `email_user`, `url_short`, `url_long`, `quant_acessos`) VALUES
(100, 'abdielb@yahoo.com', '1dbae66e', 'https://www.google.com.br/', 2),
(107, 'abdielb@yahoo.com', '1f641142', 'https://gitlab.com/tads2020/curt-urls', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(80) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `data_login` date DEFAULT NULL,
  `horario_login` time DEFAULT NULL,
  `hash_rec_senha` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `email`, `senha`, `ip`, `data_login`, `horario_login`, `hash_rec_senha`) VALUES
('Abdiel Batista dos Santos', 'abdielb@yahoo.com', '$2y$10$.yuNezWk5VOzE0DqsJa8R.cppK8OTUsBSnKDWjxOSeCwhLqIPJUqS', '192.168.15.100', '2020-12-15', '11:08:15', '146153'),
('Gabriel De Souza Miranda', 'gabasan12@gmail.com', '$2y$10$ZSjY/ZH8rZiUXojQu/skHO0mXQrqU4GGtbdZpik9qblpe7lh777o.', '192.168.15.102', '2020-12-14', '21:57:21', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eventos_login`
--
ALTER TABLE `eventos_login`
  ADD KEY `email_user` (`email_user`);

--
-- Índices para tabela `url_on`
--
ALTER TABLE `url_on`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_user` (`email_user`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `url_on`
--
ALTER TABLE `url_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `eventos_login`
--
ALTER TABLE `eventos_login`
  ADD CONSTRAINT `eventos_login_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `url_on`
--
ALTER TABLE `url_on`
  ADD CONSTRAINT `url_on_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
