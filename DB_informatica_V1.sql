-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 feb 2018 om 21:02
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
  `school` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`id`, `usr_name`, `psw`, `school`) VALUES
(678, '1331631', '$2y$10$bz4f/C4XpuZZliYcUXC.ou9XZCzUHf7K75qzqQ.3e090019sNvsM2', 'Bernardinus'),
(679, '16820141', '$2y$10$bBuRiBPsaxNGDtaeQD4HF.SujKdwTvI7LWMb72tKhnrxwycluu.MK', 'Bernardinus'),
(680, '104131912', '$2y$10$dB7hnQBrxowSxOwLmwFoiOzwpz6Fq.FoL01XTEyM/fKsqS977mVo2', 'Bernardinus'),
(681, '201810141', '$2y$10$wvNp/1uChGBl406ab1R4uevHbbl/iRfHDsJAKfOv.WogPuAsAlyNa', 'Bernardinus'),
(682, '13812616', '$2y$10$c4gHuxE2XVU10xQSdrbFDeq0.4f5pzS9pXPZn6wJq379NujvgCM/6', 'Bernardinus'),
(683, '12915515', '$2y$10$Nk56O9SfxKevjg6dGWwF8eIF60mgBzyRQ4OxmnXyxNCSo/zG06.L6', 'Bernardinus'),
(684, '14119916', '$2y$10$P7IFsR5GBEJqKQgOJeyTIuG6w/iYsnnGcCSQYNRWyzwFxZ/Aqrhxm', 'Bernardinus'),
(685, '7811411', '$2y$10$aVJTasXYaXiOw2RQh/pYzeexlxq1YE9kXsmXix0v.0u0iPnQVmT5C', 'Bernardinus'),
(686, '614101518', '$2y$10$sreQN/tTLixAE7YXczLjCOBPZL5GVRWL3894qrXVASsxNNx47HX06', 'Bernardinus'),
(687, '8131217', '$2y$10$5sWKbQQ8H3Vawuki0nJKxOr1CNpbgUDjyhHSLgHs8rfHDLVfjSrKe', 'Bernardinus');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=688;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
