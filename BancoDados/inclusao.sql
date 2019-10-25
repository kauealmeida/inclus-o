
CREATE DATABASE `inclusao` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- Tabela bairro

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE `bairros` (
  `id_bairros` INT NOT NULL AUTO_INCREMENT,
  `nome_bairros` VARCHAR(100),
  PRIMARY KEY `pk_id_bairros`(`id_bairros`)
) ENGINE = InnoDB;

INSERT INTO `bairros`(`id_bairros`, `nome_bairros`) VALUES
(1,'Bairro de Teste')
;

-- Tabela escolas

DROP TABLE IF EXISTS `escolas`;
CREATE TABLE `escolas` (
  `id_escolas` INT NOT NULL AUTO_INCREMENT,
  `nome_escolas` VARCHAR(100),
  PRIMARY KEY `pk_id_escolas`(`id_escolas`)
) ENGINE = InnoDB;


INSERT INTO `escolas`(`id_escolas`, `nome_escolas`) VALUES
(1,'CIEFI RIO DO OURO EMEI/EMEF PROF.ª AÍDA ALMEIDA DE CASTRO GRAZIOLLI')
;

-- Tabela periodos

DROP TABLE IF EXISTS `periodos`;
CREATE TABLE `periodos` (
  `id_periodos` INT NOT NULL AUTO_INCREMENT,
  `desc_periodos` VARCHAR(10),
  PRIMARY KEY `pk_id_periodos`(`id_periodos`)
) ENGINE = InnoDB;

INSERT INTO `periodos` (`id_periodos`, `desc_periodos`) VALUES
(1, 'Manhã'),
(2, 'Tarde'),
(3, 'Noite'),
(4, 'Integral');

-- Tabela Turmas

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE `turmas` (
  `id_turmas` INT NOT NULL AUTO_INCREMENT,
  `desc_turmas` VARCHAR(5),
  PRIMARY KEY `pk_id_turmas`(`id_turmas`)
) ENGINE = InnoDB;

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

-- tabela series

DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `id_series` INT NOT NULL AUTO_INCREMENT,
  `desc_series` VARCHAR(10),
  PRIMARY KEY `pk_id_series`(`id_series`)
) ENGINE = InnoDB;

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

-- Tabela Necessidades

DROP TABLE IF EXISTS `necessidades_especiais`;
CREATE TABLE `necessidades_especiais` (
  `id_necessidades` INT NOT NULL AUTO_INCREMENT,
  `desc_necessidades` VARCHAR(100),
  PRIMARY KEY `pk_id_necessidades`(`id_necessidades`)
) ENGINE = InnoDB;

INSERT INTO `necessidades_especiais` (`id_necessidades`, `desc_necessidades`) VALUES
(1, 'Deficiência Intelectual'),
(2, 'Deficiência Visual'),
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


DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
  `id_alunos`           INT NOT NULL AUTO_INCREMENT,
  `nome_aluno`          VARCHAR(50) NOT NULL,
  `data_nascimento`     VARCHAR(10) NOT NULL,
  `RA`                  VARCHAR(20) NOT NULL,  
  `diagnostico`         TEXT NOT NULL,
  `EC`                  tinyint(4) NOT NULL DEFAULT 0,
  `PEP`                 tinyint(4) NOT NULL DEFAULT 0,
  `flex_prova`          TEXT NOT NULL,
  `cries`               TEXT NOT NULL,
  `desc_cries`         TEXT NOT NULL,
  `sala_recursos`       tinyint(4) NOT NULL DEFAULT 0,
  `desc_sala_recursos` TEXT NULL,
  `atend_externo`       TEXT NOT NULL,
  `detalhe_necessidades`  TEXT NULL,
  `adaptacoes`          TEXT NOT NULL DEFAULT 0,
  `adaptacoes_outros`   TEXT NULL,
  `apoio`               TEXT NOT NULL DEFAULT 0,
  `referencia`          TEXT NOT NULL DEFAULT 0,
  `nv_escrita`          VARCHAR(30) NOT NULL,

  `fk_alunos_escolas` INT NOT NULL,
  `fk_alunos_series` INT NOT NULL,
  `fk_alunos_turmas` INT NOT NULL,
  `fk_alunos_periodos` INT NOT NULL,
  `fk_alunos_necessidades_especiais` INT NOT NULL,
  `fk_alunos_bairros` INT NOT NULL,

  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,

  CONSTRAINT alunos_bairros FOREIGN KEY (fk_alunos_bairros) REFERENCES bairros (id_bairros),
  CONSTRAINT alunos_escolas FOREIGN KEY (fk_alunos_escolas) REFERENCES escolas (id_escolas),
  CONSTRAINT alunos_series FOREIGN KEY (fk_alunos_series) REFERENCES series (id_series),
  CONSTRAINT alunos_turmas FOREIGN KEY (fk_alunos_turmas) REFERENCES turmas (id_turmas),
  CONSTRAINT alunos_periodos FOREIGN KEY (fk_alunos_periodos) REFERENCES periodos (id_periodos),
  CONSTRAINT alunos_necessidades_especiais FOREIGN KEY (fk_alunos_necessidades_especiais) REFERENCES necessidades_especiais (id_necessidades),
  
  PRIMARY KEY `pk_id_alunos`(`id_alunos`)
) ENGINE = InnoDB;

-- Tabelas criadas pelo Laravel

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB;

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivel_acesso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fk_users_escolas` int(11) DEFAULT NULL,

  CONSTRAINT users_escolas FOREIGN KEY (fk_users_escolas) REFERENCES escolas (id_escolas)

) ENGINE = InnoDB;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nivel_acesso`, `fk_users_escolas`) VALUES
(1, 'pedro', 'pedro@pedro', NULL, '$2y$10$6oGiNf3gmxSYm5GJ4VcaU.zAlxwrHPtMCmGWsVI9/zJEJXBbDjGRa', NULL, '2019-06-13 23:37:52', '2019-06-13 23:37:52', 'Admin', NULL),
(2, 'joao', 'joao@joao', NULL, '$2y$10$mNGXaAkGyBWqpQHam.i1BenfkHEiH3hRUJpWbO3SWjl8LfXcvbCce', NULL, '2019-06-28 22:11:43', '2019-06-28 22:11:43', 'Escola', 1),
(3, 'jose', 'jose@jose', NULL, '$2y$10$JqtED75/oR/Pu66NWAFyX.pKQ18rkLYISv73jbqfHyLMw8xtBwLSe', NULL, '2019-07-03 21:57:42', '2019-07-03 21:57:42', 'TOO', NULL);

-- Views
CREATE VIEW view_alunos AS
SELECT 
  a.id_alunos,
  a.nome_aluno,
  a.data_nascimento,
  a.RA,
  a.diagnostico,
  a.EC,
  a.PEP,
  a.flex_prova,
  a.cries,
  a.desc_cries,
  a.sala_recursos,
  a.desc_sala_recursos,
  a.atend_externo,
  a.detalhe_necessidades,
  a.adaptacoes,
  a.adaptacoes_outros,
  a.apoio,
  a.referencia,
  a.nv_escrita,
  a.fk_alunos_bairros,
  k.nome_bairros,
  a.fk_alunos_escolas,
  a.fk_alunos_series,
  a.fk_alunos_turmas,
  a.fk_alunos_periodos,
  a.fk_alunos_necessidades_especiais,
  d.nome_escolas,
  f.desc_necessidades,
  g.desc_periodos,
  i.desc_series,
  j.desc_turmas
from alunos a
LEFT JOIN escolas d ON a.fk_alunos_escolas = d.id_escolas
LEFT JOIN necessidades_especiais f ON a.fk_alunos_necessidades_especiais = f.id_necessidades
LEFT JOIN periodos g ON a.fk_alunos_periodos = g.id_periodos
LEFT JOIN series i ON a.fk_alunos_series = i.id_series
LEFT JOIN turmas j on a.fk_alunos_turmas = j.id_turmas
LEFT JOIN bairros k on a.fk_alunos_bairros = k.id_bairros
;

CREATE VIEW view_users AS
SELECT a.id, a.name, a.email, a.nivel_acesso, a.fk_users_escolas, b.nome_escolas from users a
LEFT JOIN escolas b ON a.fk_users_escolas = id_escolas;