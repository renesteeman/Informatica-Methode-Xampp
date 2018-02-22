-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 feb 2018 om 22:25
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informaticamethode`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `usr_name` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `psw` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `school` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `function` tinytext COLLATE utf8mb4_bin,
  `creation_date` date NOT NULL,
  `klas` text COLLATE utf8mb4_bin,
  `email` text COLLATE utf8mb4_bin,
  `group_name` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Gegevens worden geëxporteerd voor tabel `accounts`
--

INSERT INTO `accounts` (`id`, `usr_name`, `psw`, `school`, `function`, `creation_date`, `klas`, `email`, `group_name`) VALUES
(29, '5310203', '$2y$10$Y5p0IytZMXfu.GLioIwzsulmBp0/P1B2RTFULVQiiJj2S43J3vgte', 'Bernardinus', 'leerling', '2018-02-03', NULL, NULL, NULL),
(30, '17221420', '$2y$10$f6aejQRAsdMbCT7xzeUJ3.2IB7vxsT.uCfOd8Y6vilfV7abhC./ky', 'Bernardinus', 'leerling', '2018-02-03', NULL, NULL, NULL),
(31, '1912890', '$2y$10$wqUPbHGhhcMa4Nv0PY/Gg.fJoexnsegkL4.l4glQIxgEApJ42W12y', 'Bernardinus', 'leerling', '2018-02-03', NULL, NULL, NULL),
(32, '5615214', '$2y$10$tevIUY96SX.Fwr0TFmp4bOlWaqqfrmmwnJricyXKcfrBdcu3VXXqK', 'Bernardinus', 'leerling', '2018-02-03', NULL, NULL, NULL),
(33, '10120140', '$2y$10$IOsqdKPf/NsEQEDREzJjk.KqrG7MzbEZIXGO2UoSfpEIHIZvAZ9BG', 'Bernardinus', 'leerling', '2018-02-03', NULL, NULL, NULL),
(34, '9851716', '$2y$10$GKbI8IbI990ir7FQG3CV.uxb6x57ruuRO/4hNaNjd5CC9sRQTcmE.', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(35, '2018793', '$2y$10$lNSZXHIc.YSAtxPKd7YdReP9KPUo4TGrBRnYI5MXNLTTvTiOgwxSm', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(36, '4718913', '$2y$10$vNVzrrVpy9fCu9hH89fYt.L0sYUyRFin.HxOEzxHw06WM68P5WF/W', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(37, '20212165', '$2y$10$uFzPhrjnmJ78rH7Nv4WMu.m4aVlTUI7fBnM08A30gfzCpyOZpU96.', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(38, '20124117', '$2y$10$Yj9.TS6AjRbRxoYqpQPFRuErZAwsCZ5Sn9i7D2l5D9EDc039Rndt.', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(39, '51318153', '$2y$10$Afcp1mohnaljZQFISZqoI.sp8qEIv82JhccflOwzWRRyrXPH1HCa6', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(40, '19521', '$2y$10$jReRwRpJUTQP4fWyoiZPPeC4ATJ4uV.uZy29GRKy40TO5xV0dcaMq', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(41, '681589', '$2y$10$GyRTJozwLOUe1COjM62q4ua.y6OlxO4GGielwYBZO/zQmYOyV8qoq', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(42, '1819715', '$2y$10$nz7R1BAFe71Duvfm2SPITueMHNKudkKq2HAZS6XysxXro7lMLE2T2', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(43, '0154198', '$2y$10$Ssypueu.fv.PgGWWUPhUTujucbFpCzGi305fcUefeNjr.AEJJ7j1.', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(44, '07131711', '$2y$10$fFh./BsuB.xjpBWtstF71.5pEUJCvCheTPOv2mngU6WQOij5eG3SW', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(45, '8917136', '$2y$10$CRkYdloQuygCu4oB31gODO3m87YZqeT6KFzB697JgOAzvrtd5mvwW', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(46, '151131', '$2y$10$m.jTv8rStZFz6cZ0aZAaKe76yoF2.Xgq84eR1N.Fy9jCE9mEV16dq', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(47, '31241615', '$2y$10$j/Wx0Gr49nncBZPp/6EWwuejxli/d3tk8m9Q9I83GH/aKxwJ08tDO', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(48, '2120519', '$2y$10$3LuKqFnnBuOzGK8ku.l.9Oxg8o3Hoz6MegzFTgsNCxjhE1kl7AdGm', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(50, '17131860', '$2y$10$HOHoJfaswuJ7WzAnhxfLRu3OSP4CUXL45JHFPwRKzwW1DBRfNAdKu', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(51, '171131813', '$2y$10$hq4AySUP9aonArjta8HZe.hMMq1eFZTEJdCvpmOTaTCzvZ3h9WVIu', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(52, '12199143', '$2y$10$xWTQkdqSemwxTw8hLgpr5uV6GY4CDPmNp5S/SBDtF3wWNKcJcC8WS', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(53, '151631615', '$2y$10$79FxJhAMc.YWin4hHR/ioOBQt3jNusB5CWzNoKQnzj/1hHt5TXqtG', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(54, 'renesteeman', '$2y$10$S5ie/FThODiRl6KhegGBoOzYFHSs30NEeHMelkBE4AcYa6/44fI1S', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(55, '191435', '$2y$10$q274rjKd90snBK4DSWOJ8O9PBG.c23uqiD4LUfcH5h274.GhDD7FG', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(56, '0361919', '$2y$10$UeOm8xFA7CFFUdxsySqHw.1Pmd/bWXJNXy4EC55MGkMDm043JHWuK', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(57, '119246', '$2y$10$.zj/N6ion.JcARuHN/C93eXAEWxRILnwbfpoqRlwGQaPKHrSjwRnK', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL),
(58, '19451920', '$2y$10$HQ9EPLRjtghz4bMm7ABg9ujF0NsbBD7VOfpeaLOt5FOlkB6EpVI5O', 'Bernardinus', 'leerling', '2018-02-03', 'H51', NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
