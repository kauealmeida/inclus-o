-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jul-2019 às 16:02
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inclusao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adaptacoes`
--

CREATE TABLE `adaptacoes` (
  `id_adaptacoes` int(11) NOT NULL,
  `desc_adaptacoes` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adaptacoes`
--

INSERT INTO `adaptacoes` (`id_adaptacoes`, `desc_adaptacoes`) VALUES
(1, 'Braile'),
(2, 'Ampliação'),
(3, 'Menor exigência - curriculo'),
(4, 'Igual ou Maior exigência - curriculo'),
(5, 'Utilização de imagens ou recursos concretos'),
(6, 'Atividades de acordo com a abordagem Teacch'),
(7, 'Atividades estruturadas / pranchas'),
(8, 'Tempo maior para realização  de atividades e avaliações'),
(9, 'Outro (Descreva)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_alunos` int(11) NOT NULL,
  `nome_aluno` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `RA` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` text COLLATE utf8_unicode_ci NOT NULL,
  `EC` tinyint(4) NOT NULL DEFAULT 0,
  `PEP` tinyint(4) NOT NULL DEFAULT 0,
  `flex_prova` text COLLATE utf8_unicode_ci NOT NULL,
  `crie` tinyint(4) NOT NULL DEFAULT 0,
  `sala_recursos` tinyint(4) NOT NULL DEFAULT 0,
  `atend_externo` text COLLATE utf8_unicode_ci NOT NULL,
  `fk_alunos_escolas` int(11) NOT NULL,
  `fk_alunos_series` int(11) NOT NULL,
  `fk_alunos_turmas` int(11) NOT NULL,
  `fk_alunos_periodos` int(11) NOT NULL,
  `fk_alunos_necessidades_especiais` int(11) NOT NULL,
  `fk_alunos_adaptacoes` int(11) NOT NULL,
  `fk_alunos_apoios` int(11) NOT NULL,
  `fk_alunos_referencias` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `necessidades` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_alunos`, `nome_aluno`, `data_nascimento`, `RA`, `bairro`, `diagnostico`, `EC`, `PEP`, `flex_prova`, `crie`, `sala_recursos`, `atend_externo`, `fk_alunos_escolas`, `fk_alunos_series`, `fk_alunos_turmas`, `fk_alunos_periodos`, `fk_alunos_necessidades_especiais`, `fk_alunos_adaptacoes`, `fk_alunos_apoios`, `fk_alunos_referencias`, `updated_at`, `created_at`, `necessidades`) VALUES
(8, 'Joaozinho', '2019-05-09', '12322', 'teste', 'afasdteste', 1, 1, 'asdasd', 1, 1, 'adsasdqweqwe', 1, 1, 1, 1, 1, 1, 1, 1, '2019-06-28', '2019-06-17', 'teste1;teste3;'),
(9, 'qweqwe', '2019-06-10', '123', 'teste', 'efefe', 1, 0, 'erfef', 0, 0, 'efrferf', 2, 12, 15, 2, 11, 8, 3, 2, '2019-06-19', '2019-06-19', NULL),
(10, 'qweqwe', '2019-06-10', '123', 'teste', 'qweqwe', 0, 0, 'qweqweqwe', 0, 0, 'qweqweqwe', 1, 15, 15, 2, 4, 2, 2, 2, '2019-06-24', '2019-06-24', NULL),
(11, 'qweqwe', '2019-06-11', '123', 'teste', 'qweqwe', 0, 0, 'qweqweq', 0, 0, 'qweqweqwe', 1, 13, 14, 2, 5, 3, 2, 2, '2019-06-24', '2019-06-24', NULL),
(12, 'qweqwe', '2019-06-04', '123', 'teste', 'qweqwe', 0, 0, 'qweqweqe', 0, 0, 'qweqweqwe', 1, 3, 4, 2, 11, 2, 3, 2, '2019-06-24', '2019-06-24', NULL),
(13, 'qweqwe', '2019-06-12', '123', 'teste', 'qweqweqwe', 0, 0, 'qeqweqwe', 0, 0, 'qweqweqwe', 2, 15, 14, 1, 6, 3, 2, 2, '2019-06-24', '2019-06-24', NULL),
(14, '123123', '2019-07-08', '1233q111', 'teste', '123123', 1, 0, '123123', 0, 0, '123123', 1, 3, 3, 1, 10, 2, 2, 2, '2019-07-05', '2019-07-05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `apoios`
--

CREATE TABLE `apoios` (
  `id_apoios` int(11) NOT NULL,
  `desc_apoios` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `apoios`
--

INSERT INTO `apoios` (`id_apoios`, `desc_apoios`) VALUES
(1, 'Auxiliar'),
(2, 'Orientador'),
(3, 'Leitor'),
(4, 'Escriba'),
(5, 'Estagiário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos_externos`
--

CREATE TABLE `atendimentos_externos` (
  `id_atendimentos` int(11) NOT NULL,
  `desc_atendimentos` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `atendimentos_externos`
--

INSERT INTO `atendimentos_externos` (`id_atendimentos`, `desc_atendimentos`) VALUES
(1, 'Neurologista'),
(2, 'Psiquiatra'),
(3, 'Oftalmologista'),
(4, 'Fonoaudiólogo (CEM)'),
(5, 'Fisioterapeuta (CEM)'),
(6, 'Terapeuta Ocupacional (CEM)'),
(7, 'Fonoaudiólogo (Acalento)'),
(8, 'Psicólogo (Acalento)'),
(9, 'Fisioterapeuta (Acalento)'),
(10, 'Terapeuta Ocupacional (Acalento)'),
(11, 'Equoterapia (Acalento)'),
(12, 'Pediatra'),
(13, 'Outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
  `id_escolas` int(11) NOT NULL,
  `nome_escolas` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`id_escolas`, `nome_escolas`) VALUES
(1, 'CIEFI PROF.ª'),
(2, 'CIEFI RIO DO OURO EMEI/EMEF PROF.ª AÍDA ALMEIDA DE CASTRO GRAZIOLLI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `necessidades_especiais`
--

CREATE TABLE `necessidades_especiais` (
  `id_necessidades` int(11) NOT NULL,
  `desc_necessidades` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `necessidades_especiais`
--

INSERT INTO `necessidades_especiais` (`id_necessidades`, `desc_necessidades`) VALUES
(1, 'Deficiência Intelectual'),
(2, 'Defifiência Visual'),
(3, 'Deficiência Auditiva'),
(4, 'Deficiência Física'),
(5, 'Deficiencia Múltipla'),
(6, 'Trantorno Espectro Autista'),
(7, 'Espectro da Esquizofrenia e outros Transtornos Psicóticos'),
(8, 'Distúrbios do Comportamento / Transtorno do Neurodesenvolvimento'),
(9, 'Atraso no Desenvolvimento Neuropsicomotor / Transtorno do Processamento Sensorial'),
(10, 'Atrazo no Desenvolvimento Cognitivo'),
(11, 'Trasntorno da Comunicação'),
(12, 'Disturbio do Processamento Auditivo'),
(13, 'Distúrbios Específicos da Aprendizagem'),
(14, 'Vulnerabilidade Social');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

CREATE TABLE `periodos` (
  `id_periodos` int(11) NOT NULL,
  `desc_periodos` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `periodos`
--

INSERT INTO `periodos` (`id_periodos`, `desc_periodos`) VALUES
(1, 'Manhã'),
(2, 'Tarde'),
(3, 'Noite'),
(4, 'Integral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `referencias`
--

CREATE TABLE `referencias` (
  `id_referencias` int(11) NOT NULL,
  `desc_referencias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `referencias`
--

INSERT INTO `referencias` (`id_referencias`, `desc_referencias`) VALUES
(1, 'Psicologo'),
(2, 'Terapeuta Ocupacional'),
(3, 'Fonoaudiólogo'),
(4, 'Assistente Social');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id_series` int(11) NOT NULL,
  `desc_series` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id_series`, `desc_series`) VALUES
(1, 'Berçário 1'),
(2, 'Berçário 2'),
(3, 'Maternal 1'),
(4, 'Maternal 2'),
(5, 'Fase 1'),
(6, 'Fase 2'),
(7, 'EJA'),
(8, '1º Ano'),
(9, '2º Ano'),
(10, '3º Ano'),
(11, '4º Ano'),
(12, '5º Ano'),
(13, '6º Ano'),
(14, '7º Ano'),
(15, '8º Ano'),
(16, '9º Ano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turmas` int(11) NOT NULL,
  `desc_turmas` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turmas`, `desc_turmas`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H'),
(9, 'I'),
(10, 'J'),
(11, 'H'),
(12, 'L'),
(13, 'M'),
(14, 'N'),
(15, 'O'),
(16, 'P'),
(17, 'Q'),
(18, 'R'),
(19, 'S'),
(20, 'T'),
(21, 'U'),
(22, 'V'),
(23, 'X'),
(24, 'Y'),
(25, 'Z');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivel_acesso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fk_users_escolas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nivel_acesso`, `fk_users_escolas`) VALUES
(3, 'pedro', 'pedro@pedro', NULL, '$2y$10$6oGiNf3gmxSYm5GJ4VcaU.zAlxwrHPtMCmGWsVI9/zJEJXBbDjGRa', NULL, '2019-06-13 23:37:52', '2019-06-13 23:37:52', 'admin', NULL),
(8, 'joao', 'joao@joao', NULL, '$2y$10$mNGXaAkGyBWqpQHam.i1BenfkHEiH3hRUJpWbO3SWjl8LfXcvbCce', NULL, '2019-06-28 22:11:43', '2019-06-28 22:11:43', 'user', 1),
(9, 'jose', 'jose@jose', NULL, '$2y$10$JqtED75/oR/Pu66NWAFyX.pKQ18rkLYISv73jbqfHyLMw8xtBwLSe', NULL, '2019-07-03 21:57:42', '2019-07-03 21:57:42', 'TO', NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_alunos`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_alunos` (
`id_alunos` int(11)
,`nome_aluno` varchar(45)
,`data_nascimento` varchar(20)
,`RA` varchar(45)
,`bairro` varchar(50)
,`diagnostico` text
,`EC` tinyint(4)
,`PEP` tinyint(4)
,`flex_prova` text
,`crie` tinyint(4)
,`sala_recursos` tinyint(4)
,`atend_externo` text
,`necessidades` text
,`fk_alunos_escolas` int(11)
,`fk_alunos_series` int(11)
,`fk_alunos_turmas` int(11)
,`fk_alunos_periodos` int(11)
,`fk_alunos_necessidades_especiais` int(11)
,`fk_alunos_adaptacoes` int(11)
,`fk_alunos_apoios` int(11)
,`fk_alunos_referencias` int(11)
,`desc_adaptacoes` varchar(100)
,`desc_apoios` varchar(50)
,`nome_escolas` varchar(100)
,`desc_necessidades` varchar(100)
,`desc_periodos` varchar(30)
,`desc_referencias` varchar(100)
,`desc_series` varchar(20)
,`desc_turmas` varchar(10)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `view_alunos`
--
DROP TABLE IF EXISTS `view_alunos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_alunos`  AS  select `a`.`id_alunos` AS `id_alunos`,`a`.`nome_aluno` AS `nome_aluno`,`a`.`data_nascimento` AS `data_nascimento`,`a`.`RA` AS `RA`,`a`.`bairro` AS `bairro`,`a`.`diagnostico` AS `diagnostico`,`a`.`EC` AS `EC`,`a`.`PEP` AS `PEP`,`a`.`flex_prova` AS `flex_prova`,`a`.`crie` AS `crie`,`a`.`sala_recursos` AS `sala_recursos`,`a`.`atend_externo` AS `atend_externo`,`a`.`necessidades` AS `necessidades`,`a`.`fk_alunos_escolas` AS `fk_alunos_escolas`,`a`.`fk_alunos_series` AS `fk_alunos_series`,`a`.`fk_alunos_turmas` AS `fk_alunos_turmas`,`a`.`fk_alunos_periodos` AS `fk_alunos_periodos`,`a`.`fk_alunos_necessidades_especiais` AS `fk_alunos_necessidades_especiais`,`a`.`fk_alunos_adaptacoes` AS `fk_alunos_adaptacoes`,`a`.`fk_alunos_apoios` AS `fk_alunos_apoios`,`a`.`fk_alunos_referencias` AS `fk_alunos_referencias`,`b`.`desc_adaptacoes` AS `desc_adaptacoes`,`c`.`desc_apoios` AS `desc_apoios`,`d`.`nome_escolas` AS `nome_escolas`,`f`.`desc_necessidades` AS `desc_necessidades`,`g`.`desc_periodos` AS `desc_periodos`,`h`.`desc_referencias` AS `desc_referencias`,`i`.`desc_series` AS `desc_series`,`j`.`desc_turmas` AS `desc_turmas` from ((((((((`alunos` `a` left join `adaptacoes` `b` on(`a`.`fk_alunos_adaptacoes` = `b`.`id_adaptacoes`)) left join `apoios` `c` on(`a`.`fk_alunos_apoios` = `c`.`id_apoios`)) left join `escolas` `d` on(`a`.`fk_alunos_escolas` = `d`.`id_escolas`)) left join `necessidades_especiais` `f` on(`a`.`fk_alunos_necessidades_especiais` = `f`.`id_necessidades`)) left join `periodos` `g` on(`a`.`fk_alunos_periodos` = `g`.`id_periodos`)) left join `referencias` `h` on(`a`.`fk_alunos_referencias` = `h`.`id_referencias`)) left join `series` `i` on(`a`.`fk_alunos_series` = `i`.`id_series`)) left join `turmas` `j` on(`a`.`fk_alunos_turmas` = `j`.`id_turmas`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adaptacoes`
--
ALTER TABLE `adaptacoes`
  ADD PRIMARY KEY (`id_adaptacoes`);

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_alunos`),
  ADD KEY `fk_alunos_referencias` (`fk_alunos_referencias`),
  ADD KEY `fk_alunos_apoios` (`fk_alunos_apoios`),
  ADD KEY `fk_alunos_adaptacoes` (`fk_alunos_adaptacoes`),
  ADD KEY `fk_alunos_necessidades_especiais` (`fk_alunos_necessidades_especiais`),
  ADD KEY `fk_alunos_periodos` (`fk_alunos_periodos`),
  ADD KEY `fk_alunos_turmas` (`fk_alunos_turmas`),
  ADD KEY `fk_alunos_escolas` (`fk_alunos_escolas`),
  ADD KEY `fk_alunos_series` (`fk_alunos_series`);

--
-- Índices para tabela `apoios`
--
ALTER TABLE `apoios`
  ADD PRIMARY KEY (`id_apoios`);

--
-- Índices para tabela `atendimentos_externos`
--
ALTER TABLE `atendimentos_externos`
  ADD PRIMARY KEY (`id_atendimentos`);

--
-- Índices para tabela `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`id_escolas`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `necessidades_especiais`
--
ALTER TABLE `necessidades_especiais`
  ADD PRIMARY KEY (`id_necessidades`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodos`);

--
-- Índices para tabela `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id_referencias`);

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_series`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turmas`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_escolas` (`fk_users_escolas`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adaptacoes`
--
ALTER TABLE `adaptacoes`
  MODIFY `id_adaptacoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_alunos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `apoios`
--
ALTER TABLE `apoios`
  MODIFY `id_apoios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `atendimentos_externos`
--
ALTER TABLE `atendimentos_externos`
  MODIFY `id_atendimentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `escolas`
--
ALTER TABLE `escolas`
  MODIFY `id_escolas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `necessidades_especiais`
--
ALTER TABLE `necessidades_especiais`
  MODIFY `id_necessidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id_referencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id_series` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_alunos_adaptacoes` FOREIGN KEY (`fk_alunos_adaptacoes`) REFERENCES `adaptacoes` (`id_adaptacoes`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alunos_apoios` FOREIGN KEY (`fk_alunos_apoios`) REFERENCES `apoios` (`id_apoios`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alunos_escolas` FOREIGN KEY (`fk_alunos_escolas`) REFERENCES `escolas` (`id_escolas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alunos_necessidades_especiais` FOREIGN KEY (`fk_alunos_necessidades_especiais`) REFERENCES `necessidades_especiais` (`id_necessidades`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alunos_periodos` FOREIGN KEY (`fk_alunos_periodos`) REFERENCES `periodos` (`id_periodos`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alunos_referencias` FOREIGN KEY (`fk_alunos_referencias`) REFERENCES `referencias` (`id_referencias`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alunos_series` FOREIGN KEY (`fk_alunos_series`) REFERENCES `series` (`id_series`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alunos_turmas` FOREIGN KEY (`fk_alunos_turmas`) REFERENCES `turmas` (`id_turmas`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_escolas` FOREIGN KEY (`fk_users_escolas`) REFERENCES `escolas` (`id_escolas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
