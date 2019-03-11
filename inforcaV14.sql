-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 mrt 2019 om 20:16
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
-- Database: `inforca`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groepen`
--

CREATE TABLE `groepen` (
  `id` int(11) NOT NULL,
  `naam` text COLLATE utf8_bin NOT NULL,
  `beschrijving` text COLLATE utf8_bin NOT NULL,
  `link` text COLLATE utf8_bin NOT NULL,
  `school` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `groepen`
--

INSERT INTO `groepen` (`id`, `naam`, `beschrijving`, `link`, `school`) VALUES
(1, 'test', 'Dit is een demo', 'https://github.com/renesteeman/Informatica-Methode-Xampp', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `planner`
--

CREATE TABLE `planner` (
  `id` int(11) NOT NULL,
  `titel` text COLLATE utf8_bin NOT NULL,
  `beschrijving` text COLLATE utf8_bin NOT NULL,
  `progressie` text COLLATE utf8_bin,
  `school` text COLLATE utf8_bin NOT NULL,
  `klas` text COLLATE utf8_bin,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `planner`
--

INSERT INTO `planner` (`id`, `titel`, `beschrijving`, `progressie`, `school`, `klas`, `datum`) VALUES
(35, 'test1', 'test1', 'H1, ', 'test', 'A', '2019-08-29'),
(36, 'test2', 'test2', 'H1, H2, H5, H3, ', 'test', 'H51', '2018-08-30'),
(39, 'c', 'c', 'H1, H2, H3, H6, ', 'test', 'c', '2018-08-17'),
(40, 'opdracht', 'opdracht', 'H1, H2, ', 'test', 'klas1', '2018-09-17'),
(41, 'test', 'test', '', 'test', 'test', '1970-01-01'),
(42, 'test V', 'V1', 'V1, ', 'test', 'B', '2019-11-20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `progressie`
--

CREATE TABLE `progressie` (
  `userid` int(11) NOT NULL,
  `H1` text COLLATE utf8_bin,
  `H2` text COLLATE utf8_bin,
  `H3` text COLLATE utf8_bin,
  `H4` text COLLATE utf8_bin,
  `H5` text COLLATE utf8_bin,
  `H6` text COLLATE utf8_bin,
  `V1` text COLLATE utf8_bin,
  `V2` text COLLATE utf8_bin,
  `V3` text COLLATE utf8_bin,
  `V4` text COLLATE utf8_bin,
  `V5` text COLLATE utf8_bin,
  `B1` text COLLATE utf8_bin,
  `B2` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `progressie`
--

INSERT INTO `progressie` (`userid`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `V1`, `V2`, `V3`, `V4`, `V5`, `B1`, `B2`) VALUES
(341, '11111', '1001', NULL, '1111', '111011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1010', '000100', NULL),
(353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, NULL, '40001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(361, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1010', '000100', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hoofdstuk` text COLLATE utf8_bin NOT NULL,
  `cijfer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `quiz`
--

INSERT INTO `quiz` (`id`, `userid`, `hoofdstuk`, `cijfer`) VALUES
(1, 359, '1', 2.5),
(2, 361, '1', 4),
(3, 341, '1', 7),
(4, 341, '4', 4),
(5, 359, '3', 4),
(6, 361, 'H1', 10),
(7, 361, 'B1', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` text COLLATE utf8_bin,
  `username` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `school` text COLLATE utf8_bin,
  `functie` text COLLATE utf8_bin,
  `klas` text COLLATE utf8_bin,
  `creation_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `group_name` text COLLATE utf8_bin,
  `group_role` text COLLATE utf8_bin,
  `email` text COLLATE utf8_bin,
  `NFailedLogins` int(11) DEFAULT NULL,
  `LFailedLogin` datetime DEFAULT NULL,
  `LActivity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `username`, `password`, `school`, `functie`, `klas`, `creation_date`, `expire_date`, `group_name`, `group_role`, `email`, `NFailedLogins`, `LFailedLogin`, `LActivity`) VALUES
(336, 'test982267', 'test982267', '$2y$10$xFpjIMouA.qUnjr4iID5YOY5knT9H5YLR/77O373avW2IdcWvYA5m', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(337, 'test675547', 'test675547', '$2y$10$WlkywhNPbN0kjCiivvDemeZgWqoXzy7u5j5DSbfdU4zvkBLzFKKSy', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(338, 'test340631', 'test340631', '$2y$10$zmiDwPjtfHXoWliH2nLBTudMlruRs/ZBmhpxv.ZPHiMr/2.Acs8ce', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(339, 'test016805', 'test016805', '$2y$10$EmBa0o.Cx4A9605km5nnL.srTiFE.QUOTV82BmHxmOwaJzvctj3Me', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(340, 'test631834', 'test631834', '$2y$10$rRoJPKwq2orxvfqowiPYpey2cjnmWktPlYkMm9aQVeX9OomR7IyCO', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(341, 'test675879', 'test675879', '$2y$10$aQMworv36cL9mioOCDU2oOjMhoMa6SrYrFfvpozfJDzebJnt5h0BO', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', 'testgroep', 'tester', 'mail', 0, NULL, '2018-09-25 02:17:17'),
(342, 'test708823', 'test708823', '$2y$10$GS1LuqsvN1KGcKBgRXQc/u2f0LRO2d9jUAj/mIYyRrP.OmqqE.4Uq', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', 'testgroep', NULL, NULL, NULL, NULL, NULL),
(343, 'test768793', 'test768793', '$2y$10$af08DHfX9zulB3xcpqR.7.b3IUPyDdwaG9/kswJwHKsEOwkw2PppG', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', 'testgroep', NULL, NULL, NULL, NULL, NULL),
(344, 'test696069', 'test696069', '$2y$10$.WCL5xXQCkDdWCExCYS2mOkVK27e.eG5eQutu94WkbTW7scblaRge', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(345, 'test810567', 'test810567', '$2y$10$2ebghyfjyjzQDLCEhTrRouWfVgg7dkDREZ0Kpf0L.M0BkLSEjR6G6', 'test', 'leerling', 'B', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(346, 'test600994', 'test600994', '$2y$10$Ak/vCAISCMci/2t9b1sHOOnj988/D95nEvmLIN8hg24.YotONczO.', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(347, 'test614829', 'test614829', '$2y$10$6XT7wjmH5qUvugQSLzPHvOoJwilUCZrOsv/wc0IWl/k6JKMJ047F6', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(349, 'test667623', 'test667623', '$2y$10$0.yrplDUXEitWa9KWmRE7Oc7AWbuW7A.QeGxYozk7wZMthnwaa4yq', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(350, 'test913225', 'test913225', '$2y$10$3yCtSViwGdqQo9r/9rSOjOOu8zL8Krr9NLuVk8neVEviNdIp/G6NS', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(351, 'test708200', 'test708200', '$2y$10$PMP/fHzgAQYs.hudQCjVWeyzgGZ4qKjV03vxQlNr.qtr76f5x6TuO', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(352, 'test952124', 'test952124', '$2y$10$cXLievMTCLMotghbVMHzjOYXWYIrw8zBKlcpoNMz5RGQO03G6UGFq', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(353, 'test827018', 'test827018', '$2y$10$rwKdJMl.zSf0lLEBxd26Ku0tcWmrxTVAC8DttNPGgHzUkFz990XTO', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', 'test', 'main developer', NULL, 0, NULL, NULL),
(354, 'test660548', 'test660548', '$2y$10$LCEYGTlcLBjDcpaPPsPiGOtTPgaVZyc8krIkTHEFjhHICJ8GFWPJO', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', 'test', NULL, NULL, NULL, NULL, NULL),
(355, 'test755983', 'test755983', '$2y$10$Zu5tv01ANnvvf53pLKpBDOe.zRYGVSPzGpVq3JYSfkzXKmpHTMiNG', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(356, 'test709058', 'test709058', '$2y$10$RhWDn2cn9o1KtOrc9IzYBeGJ9AGOPSgd9/3FBaSG.lY/G2I95dTiu', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(357, 'test307924', 'test307924', '$2y$10$.3EPmhd3sztVw7DiBsczoOoY1h03zMOXPFVr9XxQYht3y0W/7oMi6', 'test', 'leerling', 'A', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(359, 'leerling', 'leerling', '$2y$10$z4aq1c.uHaqblMzojmK/4eDTJ17N/tH6E4OQYerxnxdlOKzYhoEPK', 'test', 'leerling', 'klas1', '2018-08-26', '2019-08-26', NULL, 'test_rol', NULL, 0, '2018-09-27 18:23:46', NULL),
(361, 'docent', 'docent', '$2y$10$Rkw/QL9pTeesIlXwtZ2li.MBLZqLyHcaXEDZ.mSo8uMC7zk9LWp86', 'test', 'docent', NULL, '2018-09-01', '2019-09-01', NULL, NULL, NULL, 0, '2019-03-11 20:15:06', NULL),
(362, 'test441173', 'test441173', '$2y$10$El.nAocP0IDMrtWuV0A8mu17RDBbJcgk.cw55oLnPi.tMO3JbfSF6', 'test', 'docent', NULL, '2018-09-09', '2015-09-09', NULL, NULL, NULL, 0, NULL, NULL),
(363, 'test956641', 'test956641', '$2y$10$oJASR1zKZrmZTnVDRVsRqeAdAqm6G1N.e9zD8rufD4UVDSZCJj2de', 'test', 'leerling', '1', '2018-09-09', '2019-09-09', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `groepen`
--
ALTER TABLE `groepen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `planner`
--
ALTER TABLE `planner`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `progressie`
--
ALTER TABLE `progressie`
  ADD PRIMARY KEY (`userid`);

--
-- Indexen voor tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `groepen`
--
ALTER TABLE `groepen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `planner`
--
ALTER TABLE `planner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
