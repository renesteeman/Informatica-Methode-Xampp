-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 apr 2018 om 18:17
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
(22, 'bcd', 'hvrggcsdfvhfg', 'link', 'Group'),
(24, 'test', 'ABC', 'giethup', 'Group'),
(25, 'test groep 2', 'dhjgrtuybkvttiydgthidut65e79 tdygighc', 'giethup', 'Group'),
(26, 'idfosuyhuipsfhoujsdfgopgju', 'qdefrtklsfrtjjhml;kedfjihujswet8io5q', 'https://github.com/marketplace/category/project-ma', 'Group'),
(27, 'demo2', 'demo groep', '', 'Group'),
(28, 'demonstratie', 'demonstratie', 'https://github.com/renesteeman/Informatica-Methode', 'Group'),
(29, 'asdf', 'asdf', '', 'Group'),
(30, 'adsfvcjjerijrhjk', 'adsfvcjjerijrhjk', '', 'Group'),
(31, 'asdvcxbwery', 'asdvcxbwery', '', 'Group');

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
(11, 'gjhk', 'ghf', 'H5, H2, H3, ', 'Group', 'H52', '2018-10-06'),
(12, 'testV2', 'test4', 'H1, H5, ', 'Group', 'H52', '2018-05-04'),
(14, 'kasdf', 'cvbjm', 'H1, H4, ', 'Group', 'A52', '2018-06-07'),
(15, 'sdaf', 'zxcg', 'H2, H6, ', 'Group', 'A42', '2018-02-07');

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
  `H7` text COLLATE utf8_bin,
  `B1` text COLLATE utf8_bin,
  `B2` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `progressie`
--

INSERT INTO `progressie` (`userid`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `H7`, `B1`, `B2`) VALUES
(122, '511000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

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
(4, 122, 1, 10);

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
(74, '20', 'test', '$2y$10$YsXX04JGpXbCfL2BiXCAleishy5q3qQ.WoX9ieK/Cw9ZQqDWZ/TC.', 'Testers college', 'leerling', '', '2018-02-25', '2019-02-25', '1', NULL, 'a@a.a'),
(75, NULL, '6618207045', '$2y$10$SE1qCwqIrbKe8.1nPENF9uoAmMxmoXm0kNBsnufVkOxGjQPcx/cVO', 'Testers college', 'leerling', '', '2018-02-25', '2019-02-25', NULL, NULL, NULL),
(76, NULL, '2068245259', '$2y$10$Go2OlDfL9OwGWa0Ci04w3Olzlj03yuc6.CmynKPTjwEX87MImAkqa', 'Testers college', 'leerling', '', '2018-02-25', '2019-02-25', NULL, NULL, NULL),
(77, NULL, '7197139737', '$2y$10$LvQBX2qPS88AWGPtBV25geYaXplWpHInGLpHejr6Yei7w5eOExn6K', 'Testers college', 'leerling', '', '2018-02-25', '2019-02-25', NULL, NULL, NULL),
(78, NULL, '3098435842', '$2y$10$DYv1TkLS62rvMtWQGTrzz.yeyAMh9hqGgD4iN8OvmY.TOSaLKu34u', 'Testers college', 'leerling', '', '2018-02-25', '2019-02-25', NULL, NULL, NULL),
(79, NULL, '6335790964', '$2y$10$48YD6bAB0UScfy5maDaziur8n4VURTpUOCd7gCJHbsVdbufNpduA2', 'Group', 'docent', '', '2018-03-02', '2019-03-02', NULL, NULL, NULL),
(80, NULL, '8025112436', '$2y$10$STz4aUpLKQHkGlqXTOmSveg8ntB1h2L91/SEvK8or6MbJS1kdFoBq', 'test', 'leerling', '', '2018-03-02', '2019-03-02', NULL, NULL, NULL),
(81, NULL, '2884153775', '$2y$10$e7Oyj/rNcJEe5PduJfKIDu2xm22S7AT9Qp4bfdw8B.KtHdK9j6phC', 'test', 'leerling', '', '2018-03-02', '2019-03-02', NULL, NULL, NULL),
(102, 'DEMO', '9527608045', '$2y$10$d/wwplYbNLrXP839nJomNe/As01dT/z3PDv.l92bQsCLIXy25SAhK', 'Group', 'leerling', 'H53', '2018-03-02', '2019-03-02', '', NULL, NULL),
(103, '1', '9598311809', '$2y$10$AeWv9I33QLUYKy6vT7C8bujqm9s.fqgf9mHiLGbZIeUztfwdPBipK', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(104, 'test', '9441641450', '$2y$10$GODquEWJHo1Q2Bb66r9uTOPD2Tq4PRyqVsbQq55wi60wUh7sc/ddK', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', NULL, NULL, NULL),
(105, '2', '2074786768', '$2y$10$Fx0b8SoQWkbVWA3dQyYXmuYKNXHAk1hHojKuxXS6bCLXJh/sGtxgi', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', 'demo2', NULL, NULL),
(106, '3', '4993318373', '$2y$10$Yl.RJV0fE1jkDBiy3Zdm9OV1Dy6kTuRAx8upYddzzqqLCmLbMGo5q', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(107, 'Luc', '0587908063', '$2y$10$Gf1doHas9AOwveMZUVTnBeYubmVY745a9GnQ9HAMbvhnn6mv.LOWm', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', NULL, NULL, NULL),
(108, 'Sam', '0818762595', '$2y$10$p5SklbbAVZM23ym31B8IRuq.3IYHMaHBWgO1VPF2n9TER6PWyi7sO', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', 'demo2', NULL, NULL),
(109, 'DEMO2', '9651670092', '$2y$10$elndrVTL3s6cHXke/uEMw.AcCMw5C5xalrnUMBxXlT/Cwd4UTjcVC', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', 'asdvcxbwery', NULL, NULL),
(110, 'demo', '5104488085', '$2y$10$SEUts6xLBOLF4hSedRPt0.qnGD3QhFKt/Ts6U0nPKRiVqkR935.Uu', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', 'demo2', NULL, NULL),
(111, 'Person', '1307791270', '$2y$10$i2Il55jkOYsXIJW//IOZW.WG4cmFJMm2sxxL5iNBSZBOUcp0b6ZZK', 'Group', 'leerling', 'H54', '2018-03-02', '2019-03-02', '', NULL, NULL),
(112, 'asdf', '2611372284', '$2y$10$1FwkSuzzebO0uSzvigVh/.aBPNrYCxcMPLlt99GgpfApidY71iSGK', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(113, 'Person', '4550075293', '$2y$10$PLkHusGOljqQBP3aOlEeu.THW43T0du9LVNJMfyan7llqdUvZIP9m', 'Group', 'leerling', 'A51', '2018-03-02', '2019-03-02', '', NULL, NULL),
(114, 'Person', '6054234068', '$2y$10$Tg1wexChdzBSZkq0m86MAODHAcLJMkTyeb1uiUVYx3TJSFv7XUUl2', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(115, 'Person', '7675263504', '$2y$10$0gNu9utdLopjKnGUKB90AO5pZ2kIqlIdeXOySI4bdL5i./vpiiMfq', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(116, 'utyonhjgk', '1544673883', '$2y$10$riK4EvLSpKyxMo3pQDEBCODfi4awMA7/5bbrzo6oCUpu48JDkZD42', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', 'demo2', NULL, 'steeman.rene1@gmail.com'),
(117, 'Person', '8411075718', '$2y$10$DtWbcLzzwdoOFuDVgdKu1eh1KVN/0d9tl4kDTY8yE/TUCgKdDJU.K', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(118, 'Person', '4839411746', '$2y$10$S22xdk.opJiBEbjtQPhgXOn8hGEFj2NnQY1QZ0BeRjOJ1bm4yE0ie', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(119, 'Person', '6546385045', '$2y$10$LQ7Z1okIDbaHf8pYe.CDw.Ku3XQVvJWucjhPrnmHp/WvZSJ49f8hy', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(120, 'i4323', '3837331551', '$2y$10$MqSSc9PRduwwiJK.fDQb9eixKH7p1rhXNgWZyp5F0xkxSDeVIJfNy', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(121, 'Person', '9456448199', '$2y$10$xWlQlAuyRZr4y9ekvAVJTejbfHvJXpZbUnZflL76jPllsP4zYfPoa', 'Group', 'leerling', 'H52', '2018-03-02', '2019-03-02', '', NULL, NULL),
(122, 'Niet in gebruik', 'docent', '$2y$10$.iP7CYRVbQBGS98u/9G8VOPr67dgUJklK98BgO7y4AqUQSLD4doRK', 'Group', 'docent', 'H52', '2018-03-02', '2019-03-02', NULL, NULL, NULL),
(123, 'Iemand', '9485091361', '$2y$10$2HApZfG0Xbm95.FDQ6NAL./IiF6q9tn.zPHd.buy7Qjt6bspSHLL6', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', NULL, NULL, NULL),
(124, 'Iemand', '1600554899', '$2y$10$xy.wLksSgorc.EeoOppT2.0qm0JzQfZuo4SHNByjUYDJYU9gzKLhW', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', NULL, NULL, NULL),
(125, 'Iemand', '0585668016', '$2y$10$OARCyRHnZmntei8Yabx7n.3XDXRT2.R3IN9lhlyXmPo5xPlTnys6a', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', NULL, NULL, NULL),
(126, 'Iemand', '9366683516', '$2y$10$RK6maPpYjXn17jAKLDRPmOaIbOsrr3WEMTiqiPMZfMmpryulWyF.G', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', NULL, NULL, NULL),
(127, 'Iemand', '1168606139', '$2y$10$8T7UQIuLywXQW2S2hEmi3uNz1uRbg51jjXO/idEl/WzgnVBo5KRNm', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', NULL, NULL, NULL),
(128, 'Iemand', '1787783063', '$2y$10$SohvYUkyUKj5phYChMfR3euAsHC.gYBXDH4uIRr2IyWupmWxHMEbq', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', NULL, NULL, NULL),
(129, 'Iemand', '6188459580', '$2y$10$Ymtm2Ld37WcS4xpiu/Xfve8kRDcyRXr.JPTPp/rcp/U3T.ooYjL72', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', NULL, NULL, NULL),
(130, 'Iemand', '7010167608', '$2y$10$kVLn3vSJVU05AqafLxUevuNnb6vJigoMMv7V28lYoowd5b/P.Q1f6', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(131, 'Iemand', '6852939006', '$2y$10$YuzALCB9.gsu0g1qqZmo6.RUY68AScrBsnUg.DcmgwP4BgG/5eQ0e', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(132, 'Iemand', '7917631415', '$2y$10$5s/SDtxfYHlGxyMHbU2eLuxS5JPDED/HADuWj0Yk11Trp6oWvzfkW', 'Group', 'leerling', 'H51', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(133, 'Normie', '7914912896', '$2y$10$PxUXBzXujJ6oBPDghp.mpeSS2nyvj4kTO6jixYYbAQpFlQrOi4EiK', 'Group', 'leerling', 'H53', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(134, 'Normie', '7864504421', '$2y$10$WAmgJGSaRurJgPaXh/tF.u1y44qTgDvN0GuS5u79Jz9XhcQguAd/2', 'Group', 'leerling', 'H53', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(135, 'Normie', '0780645673', '$2y$10$GQC1O8d9oeP2882QYJ0HLeIuzBmLOzOsU9vW/seBK3gKSL89ftziO', 'Group', 'leerling', 'H53', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(136, 'Normie', '1533129386', '$2y$10$O1NuptaWv10eg/T.mOn5yeq4Qqp8ivAas9h7gctF8LPUFa3LoVNte', 'Group', 'leerling', 'H53', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(137, 'Normie', '6254158329', '$2y$10$pX/5KCrqb4E9EEZ9Uorw9.Y.3wqFkeBBOtu5L7gqWV6O/1kgjyShK', 'Group', 'leerling', 'H53', '2018-03-03', '2019-03-03', '1', NULL, NULL),
(138, NULL, '7081240760', '$2y$10$74fuFtlylMMx06EfBwnlMe/7Zp97aFH6wFe5zNVFZzHmN5eOx8u3K', 'Testers college', 'leerling', '', '2018-03-04', '2019-03-04', '1', NULL, NULL),
(139, NULL, '6591523349', '$2y$10$itVDmZZCR/4BoZ9iJfaE4uJ9D.EgBJqbNeg5f9hWgu5y0A9zlZRI6', 'Testers college', 'leerling', '', '2018-03-04', '2019-03-04', '1', NULL, NULL),
(140, NULL, '5187906434', '$2y$10$PHyrZGdyvcgxGVLEI0Gc3eyClRX6.02sMR1wJQ3oazjBJAbRYbG9m', 'Testers college', 'leerling', '', '2018-03-04', '2019-03-04', '1', NULL, NULL),
(141, NULL, '0190244192', '$2y$10$nqVebh79ftMyIzcqLu/4X.DI/BNbmIAe/F6oChd3fi845PTYGc9HK', 'Testers college', 'leerling', '', '2018-03-04', '2019-03-04', '1', NULL, NULL),
(142, NULL, '6310850604', '$2y$10$u0Ccu3xORo/kBIvhlw4RhuuMshyiALufsS26Ro1UTBn802tiLZRnS', 'Testers college', 'leerling', '', '2018-03-04', '2019-03-04', '1', NULL, NULL),
(143, 'test', 'leerling', '$2y$10$jjgFea2L47iZsNSeNYvBZ.bZWe8R6DpjR/dM5xVg1gxu4WTI23MUq', 'Group', 'leerling', 'H51', '2018-04-05', '2019-04-05', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT voor een tabel `planner`
--
ALTER TABLE `planner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;