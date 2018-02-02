-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 feb 2018 om 22:19
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
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `usr_name` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `psw` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `school` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `function` tinytext COLLATE utf8mb4_bin,
  `creation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`id`, `usr_name`, `psw`, `school`, `function`, `creation_date`) VALUES
(1, '19422016', '$2y$10$uLxpe4HUoaVpHR9gQQ71JOaF0bqEI22slgxMhXjpi1tsYCU3/00I2', 'Bernardinus', 'leerling', '2018-02-02'),
(2, '8115312', '$2y$10$7RhvxO8JaW2E7yu7xTU45eh3VlhGhATN2VMguk6do3UFgq6SWfYIG', 'Bernardinus', 'leerling', '2018-02-02'),
(3, '17116127', '$2y$10$Cs/E4SSD/Anr.N5EgMkAk.nJKRLlGtxfTIWI.EmShrjzo3LXG177a', 'Bernardinus', 'leerling', '2018-02-02'),
(4, '33287', '$2y$10$LADjjrX3FsV96FrgfLYss.wsA92a3RZBrXvr9NJuyf2De/3XwO9DS', 'Bernardinus', 'leerling', '2018-02-02'),
(5, '9242020', '$2y$10$vVdZULacBxjgvEbyIk/qZ.2Nywkzj/2iV3ScPOrohXwlENDqB4deS', 'Bernardinus', 'leerling', '2018-02-02'),
(6, '9141419', '$2y$10$PLK7rkFwpvN1GNVlVIQcjOLI28bc/yz5VA2j0IW.7nW55sxQmM.9O', 'Bernardinus', 'leerling', '2018-02-02'),
(7, '122016180', '$2y$10$QJ7L9UTszeoGPv0OSeCgYO/A1M4XY/qS5eT9Ss7Qf9t2Jr3cZm6O6', 'Bernardinus', 'leerling', '2018-02-02'),
(8, '964197', '$2y$10$nqA5Y.ZoQ7ZUfq/hiLg3o.q1g.ptQVD7kYc.nF2WOk5CrDF60T3r2', 'Bernardinus', 'leerling', '2018-02-02'),
(9, '711111011', '$2y$10$caqPoyuaFMiQeejwlGbbCuKHNgVpIvlZXAqrQaJUIv0R.tNY5jJ3y', 'Bernardinus', 'leerling', '2018-02-02'),
(10, '7121114', '$2y$10$fwyKBve6RlDXBXvj9xBmQ.VDPd00.kdMr6vFpb/g93FpthMsIf8fa', 'Bernardinus', 'leerling', '2018-02-02'),
(11, 'test', '123', 'BC', 'tester', NULL),
(12, 'test', '123', 'test', 'tester', NULL),
(13, 'test', '123', 'test', 'tester', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `school` tinytext COLLATE utf8mb4_bin NOT NULL,
  `klas` tinytext COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Gegevens worden geëxporteerd voor tabel `group`
--

INSERT INTO `group` (`id`, `school`, `klas`) VALUES
(10, 'Bernardinus', 'H51'),
(11, 'Bernardinus', 'H52');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
