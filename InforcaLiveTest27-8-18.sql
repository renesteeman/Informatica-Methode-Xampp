-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: rdbms
-- Gegenereerd op: 27 aug 2018 om 18:12
-- Serverversie: 5.6.40-log
-- PHP-versie: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB3318375`
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
(37, 'Test_groep1', 'Omschrijving Test_groep1', 'https://github.com/', 'test_school'),
(38, 'Inforca', 'De mensen die (mee)gewerkt hebben aan Inforca.', 'https://github.com/renesteeman/Informatica-Methode', 'test_school');

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
(24, 'test_opdracht', 'Opdracht om het systeem te testen', 'H1, ', 'test_school', 'havo1', '1970-01-01'),
(25, 'test_opdracht2', 'Dit is de tweede test opdracht', 'H1, ', 'test_school', 'G51', '2024-12-10');

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
  `B2` text COLLATE utf8_bin,
  `B3` text COLLATE utf8_bin,
  `B4` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `progressie`
--

INSERT INTO `progressie` (`userid`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `H7`, `B1`, `B2`, `B3`, `B4`) VALUES
(958, '511111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(959, '511111', NULL, '71111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(977, '511111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` text COLLATE utf8_bin NOT NULL,
  `username` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `school` text COLLATE utf8_bin,
  `functie` text COLLATE utf8_bin,
  `klas` text COLLATE utf8_bin,
  `creation_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `group_name` text COLLATE utf8_bin,
  `group_role` text COLLATE utf8_bin,
  `email` text COLLATE utf8_bin,
  `NFailedLogins` int(11) DEFAULT NULL,
  `LFailedLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `username`, `password`, `school`, `functie`, `klas`, `creation_date`, `expire_date`, `group_name`, `group_role`, `email`, `NFailedLogins`, `LFailedLogin`) VALUES
(953, 'test_docent1', 'test_docent1', '$2y$10$ZcugOZs9Ds3r9UQuO8efrOlu2/BSszWuQ5Jo6O9cC0LwfI02Rdgfe', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL),
(954, 'test_docent2', 'test_docent2', '$2y$10$GCMhSHaNor6GNOtwOIhACOP1bIggWmoyjcBiMDUS5Kx4OAznDkJZe', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, '2018-08-26 09:39:01'),
(955, 'test_docent3', 'test_docent3', '$2y$10$Qvpw8AE2urtJWEoyD4oy4OgDmA6ptjAwOijy.F..hJKhmHo4YEYlO', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL),
(956, 'test_docent4', 'test_docent4', '$2y$10$5C2wkOUJ4wEHEQisGBh7z.4aOiQifmS1rLbcuiR4ojLv/FJSQiI12', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL),
(957, 'test_docent5', 'test_docent5', '$2y$10$XIg2y2Jctkra1HQ5JoMm1eK.T1LKyxk1FNaDXOcmg/nYP/0FDrO.S', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, '2018-08-26 09:44:02'),
(958, 'test_leerling_havo1_1', 'test_leerling_havo1_1', '$2y$10$WPG.G.v9aa.EGKBm1v57tOdU.3Ajgmk612OLCHHnNqzk3b6DqmIae', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, 0, NULL),
(959, 'test_leerling_havo1_2', 'test_leerling_havo1_2', '$2y$10$00ghmA1BF2xYDoOB8pbtV.q6qxpVfgqaGCLHR3pleY9pRYFPIaf7O', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, 0, NULL),
(960, 'Luc', 'test_Luc', '$2y$10$3fy89XsKcFnGt0.2YWPPyei8LspRSw1BP1F8DbdYHDaWZri7dthXa', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL),
(961, 'Sam', 'test_Sam', '$2y$10$EF38j6hs0w3nLvtpIfTyUeOp2BC.cAM7d5IpTMDUY/XuET.dPfB5S', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL),
(962, 'Sanne', 'test_Sanne', '$2y$10$pjuJ.Q6Sn/UtzzuBAPB4leXeHYSalzJrsTicn3tIKQCTBnrTUhh2a', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL),
(963, 'Max', 'test_Max', '$2y$10$YabaR610d5/OaGILCDDg0eqvPqV7c63EHeyLKkMyOpYUeYgNuWLNK', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, '2018-08-26 14:56:25'),
(964, 'Lars', 'test_Lars', '$2y$10$xw8vVs2TNZPM9SBqNWG5tehhzJzLohTibUiCpf9YJgSKzlXraZPoC', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL),
(965, 'Jordy', 'test_Jordy', '$2y$10$I7Aj4Ha4uy8//bN06f6wBu1tvmQubgLzv6ggRop6WBC4v8TAPEe4O', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL),
(966, 'test_school602356', 'test_school602356', '$2y$10$eQ5cLHUEb3pLpB/ap1WvQuIX5xWHuiwgcdldbuHV7HfA3YEADRgAG', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Test_groep2', NULL, NULL, NULL, NULL),
(967, 'test_school763150', 'test_school763150', '$2y$10$Y9bI4oimPGaRa2XmQT1rK.yHkpbRHdQ4QCkASyzXZk/Exgq7AtlsS', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(968, 'test_school973657', 'test_school973657', '$2y$10$pIwhehZ48k7iRY/Db8GVe.uFgPrMvyfY11MKWMffbB7KrBieZcVa2', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(969, 'test_school396800', 'test_school396800', '$2y$10$yXu4ap4y4UdokTyoy0LK/.m6G51meD42TExiBRfeNYyHTQkVulabC', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(970, 'test_school386112', 'test_school386112', '$2y$10$FCsrRYSTJewg6Fpsg3eNnegiuiN2hX5HjjBnBodES1Pkc5z.TklI2', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(971, 'test_school358996', 'test_school358996', '$2y$10$5vCJC1CD.CLXtUw3app5me58ibAiweVsCP2pvvGe6d9VEf/VmytOG', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(972, 'test_school752249', 'test_school752249', '$2y$10$YzlhfnbyrWu/JULAonTUGusNlFtKa95SfaXQeWIR/HlTpHffEBgDC', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(973, 'test_school380012', 'test_school380012', '$2y$10$IBA8EkOq64t8JIfj9.6KNubLnyVlkbYUzUkTT/689OCfSEwwcuVXu', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(974, 'test_school276280', 'test_school276280', '$2y$10$lvfb50ja9wnC/B25Jx7tpead7uMbvlW7k0tz5dfCLKod9wnE2fCPy', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(975, 'test_school844054', 'test_school844054', '$2y$10$mHuh2/M5iSYZuVuxYb7EtuYGPMJ4RNBLj5JEcZ7hVIrXwO.kZeMOS', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(976, 'test_school155347', 'test_school155347', '$2y$10$CCCLeRAnDUrivIHWjWnleehDy07mkH.W0NvMdXLtOtrXgxbjASrHq', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(977, 'René', 'test_leerling_René', '$2y$10$UewwnXNVzq8YQwOm.k1Nqu3XNsA1b6CSLDKts64XVWz681UPx5pre', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', 'Ontwikkelaar', NULL, 0, NULL),
(978, 'test_school259364', 'test_school259364', '$2y$10$TJqoi49P5dSbUv4vCP9CX.VYHqK/vFCpaix4QJr8uQWj8RUwNRO3u', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, NULL, NULL),
(979, 'test_school694574', 'test_school694574', '$2y$10$NpbkiVg4.CE8auWXLe7qNu2/icFbjwsuNbmcwYZ4apNvv2lXicw9C', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(980, 'test_school834349', 'test_school834349', '$2y$10$NjNd1E6BJUxmKmTjB2MmYuKXSWqrtgYUjdjE04Koqkr9d1TZysta2', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(981, 'test_school502093', 'test_school502093', '$2y$10$tkTgn1o4RkJGky2KIaoJmOkIcGSRndNQlrgfOi.djaBCNqyseZNTu', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(982, 'test_school523250', 'test_school523250', '$2y$10$wZXRBH0XutxTOOuvfbZqC.ldETvJql6xj.CSQQlVsdwr.wLA3yRrO', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(983, 'test_school337199', 'test_school337199', '$2y$10$zWmk0RBUsotgaOTibm0Jte73VewrjH5dVvRYoXDQw/vendKFQevhS', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(984, 'test_school654849', 'test_school654849', '$2y$10$QyDCBUleLJKzMcfatgQw2..VsRyzGzMm6KR2BArbsoPuSTrzeorGW', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(985, 'test_school307533', 'test_school307533', '$2y$10$GDed0vDSjXBX27ECvOcmveQXBn6115txQErc5kEis2OVvKzSvgUaK', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(986, 'test_school698483', 'test_school698483', '$2y$10$VqBGUuoJ5i9Wn1MuKoGOveI.mF4blb5MztBG/OR5aUEH2hrRkl7qm', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(987, 'test_school431649', 'test_school431649', '$2y$10$R8fZ3AAvOcPw5DWieHpixet46huZtEk8jaVs5k.Q/4QQyLkthLko.', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(988, 'test_school029412', 'test_school029412', '$2y$10$Rys3b0m.yIE56xhlrJzM7./gWEX.LdtnS8la1mr.dg8vYgowjZ76G', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(989, 'test_school745768', 'test_school745768', '$2y$10$if22xbbBLD1oxaczccwE7uYd8R5UnJ084ehVx5V9o8YkQgNNQNvWC', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(990, 'test_school649181', 'test_school649181', '$2y$10$.ssJNf0.hnCuoyMCiVOYKuI4Spy7nJwjMVOZFpk6cZjm7ECK3RGQ2', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(991, 'test_school724187', 'test_school724187', '$2y$10$iL9Cm0haXQ12.aD07MwxSemBV3mW5dbSZYsVJg0wsXg8696MbzO3u', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(992, 'test_school620909', 'test_school620909', '$2y$10$VIkJnA7e5Pnz6qSzxvxfw.uMMMU/Jj818aqKTsxmZJfYA32ZmZ70e', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(993, 'test_school785687', 'test_school785687', '$2y$10$edJnj3rBz.Y74VwYMX7ZGej2D7tA3cKJ22jF9E4EVajsnu3icx4Rm', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(994, 'test_school424461', 'test_school424461', '$2y$10$UhNInOKc6yqD4D2LfxD3WuA8ZBFf/Elq0Z4ZqZ1GnITkfLpXJL/ia', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(995, 'test_school061823', 'test_school061823', '$2y$10$YqtORxDKWMhdwWluVYmwfuE77bDwGAhvPyUPwrYtH3RdgFuATnK/.', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(996, 'test_school975777', 'test_school975777', '$2y$10$4YLUSopr88IgPYovU7lfQeuXYhlOVmDLlmGWIEuzmDvQKERMZLCWa', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(997, 'test_school110996', 'test_school110996', '$2y$10$L5vmnDRUnM2n6sotfeOqrO6ZYmpUSxAi0O1On.kJINLXlGEN16Cwa', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(998, 'test_leerling_ath1_1', 'test_leerling_ath1_1', '$2y$10$56ASjsKH7u7BVxNN2xjeA.oIwd4QU48G448m8EmhogZQPm2nf4GlW', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, 0, NULL),
(999, 'test_leerling_ath1_2', 'test_leerling_ath1_2', '$2y$10$D8Osq.n4/cYa.mJOVyY9yuHdYvDPYH/Pkmhx8WfzbuRMjdLwjM/3C', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL),
(1000, 'test_leerling_ath1_3', 'test_leerling_ath1_3', '$2y$10$T80kyn9pyfh16yK8aid.ru5NputidSTuIgfHpfkIVG8eGSnhPAQDS', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', 'Test_groep2', 'programmeur', NULL, 0, NULL),
(1001, 'test_leerling_ath1_4', 'test_leerling_ath1_4', '$2y$10$UrVyT57TumKyKlEyRsZDoOQhOff8l41Y4TgyRAoXdyQyxxMEC/u4G', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, '3D modellen maken', NULL, 0, NULL),
(1002, 'test_leerling_ath1_5', 'test_leerling_ath1_5', '$2y$10$LlkjdzjWG.iMHwiYTTFuE.F7200Cj/7kP26wo7gq8VGlB.GmajSJG', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, 'schrijver', NULL, 0, '2018-08-27 10:41:40'),
(1003, 'test_school819680', 'test_school819680', '$2y$10$MiY1aiLCnOBS2QKgy69SSeftWl6.KT0JfevXEUme5P.S42q9SA4v2', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1004, 'test_school635885', 'test_school635885', '$2y$10$hU4KmDbjn5XvMePgIgg4KuB9vH1kJ.T35DybitzarHEjRd1.HGvi6', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1005, 'test_school415233', 'test_school415233', '$2y$10$./UOwG0.zSed6buaUZDR/uFkOwm3lls5av99lkfKNGf4h0D7UgsHa', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1006, 'test_school233269', 'test_school233269', '$2y$10$ANT.s9rvR7eE3deKB1EDG.uhsfO2lkCWR4Iac34gco0hlk3STcq/6', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1007, 'test_school668724', 'test_school668724', '$2y$10$Xctk83swg9/3W.xTVHEq.uUEbNo6apt9MOTaIsY9/bgWXApN9t.Xy', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1008, 'test_school649167', 'test_school649167', '$2y$10$0/.InCgUvzqmPyqvcLB/xe6Aws4yqYgrVCcuinyD/EI0D7QZ6Tt6a', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1009, 'test_school276604', 'test_school276604', '$2y$10$o4lqY1aAims3uhTm64p9P.lXE3uKAvIzzpHgJoblGLGOKa3yiPlye', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1010, 'test_school572018', 'test_school572018', '$2y$10$f2TDllbqtaXqL1N.54D4tOmZ83/udMyZvJs3q9rygw7l3viqfPy66', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1011, 'test_school545750', 'test_school545750', '$2y$10$IgulOVrnhijftK.3YJJhVeg8yc4OCNTshZudW78UgamPuuf3J/2xe', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1012, 'test_school474016', 'test_school474016', '$2y$10$Sp2OXXDhp4WXIfXymYax2eZO3/BT/13nsLMkYQHowH6IkOHaVPmeK', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1013, 'test_school298305', 'test_school298305', '$2y$10$xbQoHIJCEI79PSWRccoTi.bDsNj7sn5w5ho/HqrGq8d8jjXvS/Ngi', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1014, 'test_school977213', 'test_school977213', '$2y$10$nHmoe00eDF7LOcOhtBzunen2QK/qKGmFhGWiL69AAp6MmalkbTvTW', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1015, 'test_school564693', 'test_school564693', '$2y$10$Dkg5C7buO/bOP4pSftHkA.6qVpKOFuUQTcN4mz1eWs8/11fgwS9Ty', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1016, 'test_school857577', 'test_school857577', '$2y$10$7q4CrUdz4/vTIX1RDS2GX.tkNmo/0RVw/3/.OD2cyJuRSlCqJ0roS', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1017, 'test_school649472', 'test_school649472', '$2y$10$SaqlMkAUvGkqyImXn/XaruJQns.4A2g1d.Fff8OmAZh/Tr05iFtXO', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1018, 'test_school240528', 'test_school240528', '$2y$10$8poDwXgEADrxqboLjofZauB66zBs6SIWLXcprYpRucLWFFaMIZxAS', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, NULL, NULL),
(1019, 'test_school346067', 'test_school346067', '$2y$10$B8l1lrgyF1YqNZdcfs6p.OLvTqKUvAbt8NgYG1w9XEHc.M8Kej63S', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1020, 'test_school148660', 'test_school148660', '$2y$10$yVedu6g2.siGRafYdXmW2.MPgCXVG8SZcUAE3Ad8KMNg13GXD70AO', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1021, 'test_school571214', 'test_school571214', '$2y$10$e4Vtr5YMrGfnWH5iYJwUYubDiSxWPf1IF7DPieqwtQz.3.5s54kou', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1022, 'test_school667113', 'test_school667113', '$2y$10$NeVVEQPKTK26sek8TN03v.z.gIvxjHPs42HNg1KrA2S9heAEI/dJy', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1023, 'test_school092012', 'test_school092012', '$2y$10$bs4Zsgeb4GACsp6fpcnzleMDd.KPCzmILXFGkMjKJLwxbTACthFam', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1024, 'test_school230579', 'test_school230579', '$2y$10$Wsryt1zPzBOl0NJ//yjrZOqCuUk8ktcGOd1UkdMysjH45MvbS25fi', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1025, 'test_school996752', 'test_school996752', '$2y$10$4NQWSYbPwezhuyYSPA5Ia.o19xcNR6VpYnvJw2SnSZM1zaFnZDVfW', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1026, 'test_school261436', 'test_school261436', '$2y$10$cUZyTuQE4J3XKuZLM1L6G.cjACbF5idAPJgz0IS3V38nKw344os6S', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1027, 'test_school967784', 'test_school967784', '$2y$10$7EPhHTupbLHnQzeq9RZave3Yb0xvOejnN4fbAAJ6Lgy3C5OmpGfMy', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1028, 'test_school273162', 'test_school273162', '$2y$10$EWsePmG7kqgDy1Gexo2CWek5mF9eUkH/HoVZ.EHFremqH.VqepHTe', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1029, 'test_school938164', 'test_school938164', '$2y$10$4XlZHm/JWruZu3LUuOYyPO.rRn4lLPO40zTEC5rzHUIZaVwaM8sb2', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1030, 'test_school025649', 'test_school025649', '$2y$10$cjk5T95.5tX856cfnDXM3.YH8HUZ7sE.xV0stM1zolSeh2DzFNnnC', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1031, 'test_school828559', 'test_school828559', '$2y$10$Zf1VTl3b2r6PhChH0CfXkup7HFnXX4tr18V8KNrxbg5Z/Fd8oSI4y', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1032, 'test_school747617', 'test_school747617', '$2y$10$0LLboW/Vn.v08ysPr9JO9OB.ILUg.q63x7cv7x1.VLk.7jP7ieMCq', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1033, 'test_school263330', 'test_school263330', '$2y$10$8IOG5CjyyUqwKhW3DtyG9OMASS0tWaQ9sswFyz3StRGcIfykspyBS', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1034, 'test_school548682', 'test_school548682', '$2y$10$Nq0CMCCdWBsqIMoLzKSZRuVJVT1l/VFf0YpUNQ7H/7/QK0YYdudpG', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1035, 'test_school792114', 'test_school792114', '$2y$10$eIxJFjO4d5ZpZHzzdSYjBu4cDaXVRIN3V1P15F69p01npEqXATcmW', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1036, 'test_school504756', 'test_school504756', '$2y$10$wxWMR0gN3/IittPDATkk4udyy.dOn3Y0d9.Qnp4XHwVx99G0/hIFW', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL),
(1037, 'test_school954532', 'test_school954532', '$2y$10$MWH50iLsYjwW/X1b83jCreqXGncVGtcLsAnEgMEIxLwUL0wclRUKG', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT voor een tabel `planner`
--
ALTER TABLE `planner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT voor een tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1038;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
