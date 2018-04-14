-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 apr 2018 om 08:45
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
(32, 'inforca', 'Een betere informatica methode', 'https://github.com/renesteeman/Informatica-Methode-Xampp', 'Group'),
(33, 'demo', 'beschrijving', '', 'Group'),
(34, 'test', 'test', '', 'test');

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
(17, 'Inleveren opdracht', 'Inleveren PO via informatica actief (niet voor lang)', '', 'Group', 'H51', '2018-05-08'),
(18, 'test', 'dasf', '', 'Group', 'H52', '2018-09-01'),
(19, 'opdracht', 'omschrijving', 'H1, ', 'Group', 'H51', '2018-08-31'),
(20, 'informatica opdracht', 'Inleveren van opdracht voor informatica', '', 'Group', 'H51', '2018-06-08'),
(21, 'vdfsajnklde qk', 'jmfkbgld', 'H2, H1, ', 'test', 'H51', '2018-09-06');

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
  `H7` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `progressie`
--

INSERT INTO `progressie` (`userid`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `H7`) VALUES
(102, '511000', '511011', '511111', NULL, NULL, NULL, NULL),
(103, '511000', '511011', '41111', NULL, NULL, NULL, NULL),
(122, '511000', NULL, NULL, NULL, NULL, NULL, NULL),
(150, '511000', '511111', '511101', NULL, NULL, NULL, NULL),
(151, '510000', '511011', '511111', NULL, NULL, NULL, NULL),
(152, '511111', '511111', '511111', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hoofdstuk` int(2) NOT NULL,
  `cijfer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `quiz`
--

INSERT INTO `quiz` (`id`, `userid`, `hoofdstuk`, `cijfer`) VALUES
(4, 122, 1, 10),
(5, 102, 1, 5.5),
(6, 102, 2, 1),
(7, 150, 1, 2),
(8, 150, 2, 10),
(9, 151, 1, 10);

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
  `email` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `username`, `password`, `school`, `functie`, `klas`, `creation_date`, `expire_date`, `group_name`, `group_role`, `email`) VALUES
(149, 'docent', 'docent', '$2y$10$bYKHHZQzbT0jaQDfsVyaAOzZ0.nxcf8ePOIbLI0K2G6bqew5cAgc6', 'test', 'docent', 'H51', '2018-04-11', '2019-04-11', NULL, NULL, 'steeman.rene1@gmail.com'),
(150, 'docent', '8895735959', '$2y$10$BUaiQ/GQeCjmaU.nwNay4.uO1twVcr/uLWGux4kPrnecis56aagrO', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(151, 'docent', '7370700256', '$2y$10$CnNnJhiWZ9/rYHhCl5SS/e0ANbYW76Zbvu4c9mn9n0AGmWo1HF6hS', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(152, 'docent', '0618751213', '$2y$10$V5Tla/CwvqsUcV1EQ1yBUuXqe7ZInaTr4zI7MVeLtJX4EhaQ5d.Hq', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(153, 'docent', '7548017908', '$2y$10$TZXqoakopjgP6dV5hPMcV.V1xKlxBZABgbe7wbCcHMGGAj7K70.1a', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(154, 'docent', '4457013414', '$2y$10$1B2Q69J17CvqA9RYEBOMAuumRuEDpqJ8081sB/JVOlZJolJ5OYiFO', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(155, 'Leerling', '6894842503', '$2y$10$KpvMZd6l5nfJ6/DlKLVpeuFN/9aJvWbiD1psP1ikdv2QZ0gaKZJg2', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', 'test', NULL, NULL),
(156, 'Leerling', '7369622182', '$2y$10$A/NKQXFy.89Q5hQQtPYP1ucC9xMCFpj0RJml6o6M9BKTSQBuAVH1S', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', 'test', NULL, NULL),
(157, 'Leerling', '5676544543', '$2y$10$IjFbegZ3stwYPvVhzlB/eOr9T4syBJsb3Ri6t.xNfQ9lxByQRhfRK', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', 'test', NULL, NULL),
(158, 'Leerling', '0507713568', '$2y$10$cFOM8wXbvV/vaVNrKAuHk.IVWw7utrpty7XtI.U2Cm6pN7uQHjqfy', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', 'test', NULL, NULL),
(159, 'Leerling', '0964112306', '$2y$10$KFzHk/MKS3FvOAo6s4YuoOEJuQCsp8jPMf.OQpH5bW9qnQmE6ZtVW', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', 'test', NULL, NULL),
(160, 'Lars', '1011123318', '$2y$10$hL/hjkCXpR7lWnz7T4YVEO.VmZ9UYe8v4d77nxm9JXcV12ADLB8fO', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(161, 'Luc', '5473643404', '$2y$10$KFXTkiBCeA0wMGJ7WAsgOOMOdeDtKl0eFaNOvbN1PQ33orv07wsv2', 'test', 'leerling', 'H52', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(162, 'Sam', '7741310298', '$2y$10$KhFb0iGdUUSOSUF5A2/IRu3rmuqJHsnKXDjCebZd2tc0hX8aHLp9S', 'test', 'leerling', 'H52', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(163, 'René', '2037288844', '$2y$10$qG4inZnRPGFQ/lzF8wNS.OHjd4LBlJDOOxvAZOGDM33ts6b.qy3HC', 'test', 'leerling', 'H52', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(164, 'Bram', '9143804653', '$2y$10$jFeMDIU6f2oE6cCCeSaaVupPeaT85ieHmsYaQ10rIw..L78qRRZs6', 'test', 'leerling', 'H53', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(165, 'Dario', '7886629946', '$2y$10$qD/D/mvP6Q0b.rtZZKAaKeG/SD84cGAnQglMLAPTSvFejQLBTKsC2', 'test', 'leerling', 'H53', '2018-04-11', '2019-04-11', NULL, NULL, NULL),
(167, 'tester', '3737091617', '$2y$10$XQ6/LhjtRJqWx/0G8IeXwu40zkUkbbqlKEpxW2mXobAfew5xiMmxy', 'test', 'leerling', 'H51', '2018-04-12', '2019-04-12', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT voor een tabel `planner`
--
ALTER TABLE `planner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
