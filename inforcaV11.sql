-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 02:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Table structure for table `groepen`
--

CREATE TABLE `groepen` (
  `id` int(11) NOT NULL,
  `naam` text COLLATE utf8_bin NOT NULL,
  `beschrijving` text COLLATE utf8_bin NOT NULL,
  `link` text COLLATE utf8_bin NOT NULL,
  `school` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `groepen`
--

INSERT INTO `groepen` (`id`, `naam`, `beschrijving`, `link`, `school`) VALUES
(32, 'inforca', 'Een betere informatica methode', 'https://github.com/renesteeman/Informatica-Methode-Xampp', 'Group'),
(33, 'demo', 'beschrijving', '', 'Group'),
(34, 'test', 'test', '', 'test'),
(43, 'ds', 'asdf', '', 'test'),
(46, 'bug?', 'bug?', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `planner`
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
-- Dumping data for table `planner`
--

INSERT INTO `planner` (`id`, `titel`, `beschrijving`, `progressie`, `school`, `klas`, `datum`) VALUES
(17, 'Inleveren opdracht', 'Inleveren PO via informatica actief (niet voor lang)', '', 'Group', 'H51', '2018-05-08'),
(18, 'test', 'dasf', '', 'Group', 'H52', '2018-09-01'),
(19, 'opdracht', 'omschrijving', 'H1, ', 'Group', 'H51', '2018-08-31'),
(20, 'informatica opdracht', 'Inleveren van opdracht voor informatica', '', 'Group', 'H51', '2018-06-08'),
(21, 'new rex', 'hfds', 'H2, H1, H7, H3, ', 'test', 'ryx', '2020-01-01'),
(22, 'test', 'testen', 'H2, ', 'test', 'A51', '2018-04-20'),
(23, 'test', 'test', 'H2, ', 'test', 'H51', '1970-01-01'),
(24, 'test', 'test', 'H3, ', 'test', 'H51', '2018-01-01'),
(25, 'testing', 'testing', '', 'test', 'G51', '2000-02-01'),
(26, 'dsfhgdsah', 'gjsf', '', 'test', 'ahefr', '2018-05-24'),
(27, 'sdaf', 'sdaf', '', 'test', 'asdf', '2018-05-09'),
(28, 'awsadf', 'asdf', '', 'test', 'asdgdafh', '2018-05-28'),
(29, 'asdfxcz', 'wetg', 'H1, H2, H3, H4, ', 'test', 'H51', '2018-06-08'),
(30, 'qyr', 'dz', '', 'test', 'G62', '1970-01-01'),
(31, 'test3', 'adsf', '', 'test', 'ads', '2018-06-05'),
(32, 'kygtfdsh', 'tryibvn', 'H1, H2, H3, H4, H5, H6, H7, ', 'test', 'iyt', '2018-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `progressie`
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
-- Dumping data for table `progressie`
--

INSERT INTO `progressie` (`userid`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `H7`, `B1`, `B2`, `B3`, `B4`) VALUES
(102, '511000', '511011', '511111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '511000', '511011', '41111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '511000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '511000', '41101', NULL, NULL, '501010', '40100', '01 11', NULL, NULL, NULL, NULL),
(150, '511000', '511111', '511101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '510000', '511011', '511111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '511111', '511111', '511111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hoofdstuk` int(2) NOT NULL,
  `cijfer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `userid`, `hoofdstuk`, `cijfer`) VALUES
(4, 122, 1, 10),
(5, 102, 1, 5.5),
(6, 102, 2, 1),
(7, 150, 1, 2),
(8, 150, 2, 10),
(9, 151, 1, 10),
(10, 149, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  `LFailedLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `naam`, `username`, `password`, `school`, `functie`, `klas`, `creation_date`, `expire_date`, `group_name`, `group_role`, `email`, `NFailedLogins`, `LFailedLogin`) VALUES
(149, 'test account', 'docent', '$2y$10$bYKHHZQzbT0jaQDfsVyaAOzZ0.nxcf8ePOIbLI0K2G6bqew5cAgc6', 'test', 'docent', 'H51', '2017-01-01', '2999-04-11', NULL, 'test', 'steeman.rene1@gmail.com', 0, '2018-05-16 20:01:19'),
(150, 'docent', '8895735959', '$2y$10$BUaiQ/GQeCjmaU.nwNay4.uO1twVcr/uLWGux4kPrnecis56aagrO', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(151, 'docent', '7370700256', '$2y$10$CnNnJhiWZ9/rYHhCl5SS/e0ANbYW76Zbvu4c9mn9n0AGmWo1HF6hS', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(152, 'docent', '0618751213', '$2y$10$V5Tla/CwvqsUcV1EQ1yBUuXqe7ZInaTr4zI7MVeLtJX4EhaQ5d.Hq', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(153, 'docent', '7548017908', '$2y$10$TZXqoakopjgP6dV5hPMcV.V1xKlxBZABgbe7wbCcHMGGAj7K70.1a', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(154, 'docent', '4457013414', '$2y$10$1B2Q69J17CvqA9RYEBOMAuumRuEDpqJ8081sB/JVOlZJolJ5OYiFO', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(155, 'Leerling', '6894842503', '$2y$10$KpvMZd6l5nfJ6/DlKLVpeuFN/9aJvWbiD1psP1ikdv2QZ0gaKZJg2', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', '', NULL, 'a@a.a', NULL, NULL),
(156, 'Leerling', '7369622182', '$2y$10$A/NKQXFy.89Q5hQQtPYP1ucC9xMCFpj0RJml6o6M9BKTSQBuAVH1S', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', '', NULL, NULL, NULL, NULL),
(157, 'Leerling', '5676544543', '$2y$10$IjFbegZ3stwYPvVhzlB/eOr9T4syBJsb3Ri6t.xNfQ9lxByQRhfRK', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', '', NULL, NULL, NULL, NULL),
(158, 'Leerling', '0507713568', '$2y$10$cFOM8wXbvV/vaVNrKAuHk.IVWw7utrpty7XtI.U2Cm6pN7uQHjqfy', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', '', NULL, NULL, NULL, NULL),
(159, 'Leerling', '0964112306', '$2y$10$KFzHk/MKS3FvOAo6s4YuoOEJuQCsp8jPMf.OQpH5bW9qnQmE6ZtVW', 'test', 'leerling', 'asdg', '2018-04-11', '2019-04-11', '', NULL, NULL, NULL, NULL),
(160, 'Lars', '1011123318', '$2y$10$hL/hjkCXpR7lWnz7T4YVEO.VmZ9UYe8v4d77nxm9JXcV12ADLB8fO', 'test', 'leerling', 'G51', '2018-04-11', '2019-04-11', 'df', NULL, NULL, NULL, NULL),
(161, 'Luc', '5473643404', '$2y$10$KFXTkiBCeA0wMGJ7WAsgOOMOdeDtKl0eFaNOvbN1PQ33orv07wsv2', 'test', 'leerling', 'IN2', '2018-04-11', '2019-04-11', 'bug?', 'notaris', NULL, NULL, NULL),
(162, 'Sam', '7741310298', '$2y$10$KhFb0iGdUUSOSUF5A2/IRu3rmuqJHsnKXDjCebZd2tc0hX8aHLp9S', 'test', 'leerling', 'IN2', '2018-04-11', '2019-04-11', 'bug?', NULL, NULL, NULL, NULL),
(163, 'René', '2037288844', '$2y$10$qG4inZnRPGFQ/lzF8wNS.OHjd4LBlJDOOxvAZOGDM33ts6b.qy3HC', 'test', 'leerling', 'IN2', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(164, 'Bram', '9143804653', '$2y$10$jFeMDIU6f2oE6cCCeSaaVupPeaT85ieHmsYaQ10rIw..L78qRRZs6', 'test', 'leerling', 'G51', '2018-04-11', '2019-04-11', 'bug?', NULL, NULL, NULL, NULL),
(165, 'Dario', '7886629946', '$2y$10$qD/D/mvP6Q0b.rtZZKAaKeG/SD84cGAnQglMLAPTSvFejQLBTKsC2', 'test', 'leerling', 'IN1', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(167, 'tester', '3737091617', '$2y$10$XQ6/LhjtRJqWx/0G8IeXwu40zkUkbbqlKEpxW2mXobAfew5xiMmxy', 'test', 'leerling', 'G51', '2018-04-12', '2019-04-12', NULL, NULL, NULL, NULL, NULL),
(168, 'LeerlingTestGroupsFunctie', 'leerling', '$2y$10$lbvHfNtlkn918pLBVwiWU.N9CAXmhND6v3kf5lLlJiZTaVmGnJNF6', 'test', 'leerling', 'A51', '2018-04-16', '2019-04-16', '', 'test', NULL, NULL, NULL),
(169, '', '8983758281', '$2y$10$CxSoaZd88swjWcVfirBCgu3soon4Y0jopbht31lqHRn19ziFEFWj2', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, 0, NULL),
(170, '', '1935676600', '$2y$10$hJnGhnGSkTpNT/yykk37s.wuvLyI7DRhT9OEJNd4TI9pdezQ/W0TO', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(171, '', '6002630440', '$2y$10$txI0MSnBKbL6t26rQixkmuplD640FZe4hS8f4T9FpE8JBzOl0hAq2', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(172, '', '7621764909', '$2y$10$k1SmKRB2tXgmMwfzyPNmRuBPLVnHrc4yxu0aKNjcAM6wLwY0DgJY6', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(173, '', '7743418276', '$2y$10$wVIPPtQX3U5cWDjKyWh7WOYdcUb0nUBwJGz3geNxN1/cnXMKgHsFC', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(174, '', '1365195133', '$2y$10$FDHBQ.anq7Owj/1j7IDGL.AKlYpdNuQmF2N0KUFPaJAnPcZkCh1Su', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(175, '', '2593868920', '$2y$10$9FSzFeEEebBWFZ06RpAmnejbU5XUorzQk3PoKXja/UK4o3o0BsjRq', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(176, '', '6335916397', '$2y$10$fUhsiyTHaiq/xVq9ucYEi.6x.rWxekE4y73/uDYEJ.ix7ROmpBuEO', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(177, '', '6653868614', '$2y$10$RVu4oqzSV8XwisVZTYWIQ.SIGatxmQUMrjXD.LU7x5QTg3xi8dl0u', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(178, 'testing3', '2819545664', '$2y$10$pELXLgN7.sDyTZ0U5r9ak.vXZMlfJvoMxqScqUW7KLFVywZL3CsmW', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(179, '2761360639', '2761360639', '$2y$10$AiXz1hdS3XeVAKmjym8epu4fV1VCqFF7WNoUkDr7ctSgxNG82UcP2', 'testing', 'docent', '', '2018-05-28', '2019-05-28', NULL, NULL, NULL, NULL, NULL),
(180, 'school535455', 'school535455', 'ff2#q%p##o#8%!a?h#$!', 'school', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(181, 'school734649', 'school734649', 'kb22?m068%%%o5850%6i', 'school', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(182, 'school250499', 'school250499', '9w8y@$?o#51#ath5%!@2', 'school', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(183, 'school434214', 'school434214', '%1wi76h8$?!6#?!y$f27', 'school', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(184, 'school577629', 'school577629', '@hl249s##82$l05n7#4i', 'school', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(185, 'school984651', 'school984651', '8%2a6%p@0lf0!%@1#%hp', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(186, 'school434467', 'school434467', 'm!s%mk$1?@?8e2?uy#s?', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(187, 'school320685', 'school320685', '62#3t7%s@%yq311?7e$$', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(188, 'school545513', 'school545513', '3o$vle%!97011c6tmnv$', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(189, 'school459094', 'school459094', '%$j6z@@%dt%y64188?0y', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(190, 'school035289', 'school035289', '@#6iepl!6m9!ey@8!1fg', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(191, 'school005993', 'school005993', '52##879@$%30#5!$14?2', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(192, 'school325575', 'school325575', '?93a7@4$82o#7a62y$jt', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(193, 'school052643', 'school052643', '8dr2#30v8#@l@@%@07%7', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(194, 'school936313', 'school936313', '4h@$p#!!2q04$zr3f@u%', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(195, 'school991609', 'school991609', 'lpx9o%a4$tz4!g9@4#%2', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(196, 'school518748', 'school518748', '772d10b@a756!i4t3?a9', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(197, 'school203122', 'school203122', 'wk!c8odq6lyj9!9kb23#', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(198, 'school280570', 'school280570', '!t78b09u84o#41ciq@%%', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(199, 'school061681', 'school061681', '!x1j?%52h8#3b?93y#9?', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(200, 'school053726', 'school053726', '318$428#o7?vr@f5fm#h', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(201, 'school578174', 'school578174', '!$#q5!#21%32e3$13!$8', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(202, 'school083331', 'school083331', '157@838?5?qp3phw!kl%', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(203, 'school981893', 'school981893', 'pzwty3ce$#!de#0fx?%%', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(204, 'school232338', 'school232338', 'g!u7%9jz98%?675#0h!t', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(205, 'school794298', 'school794298', '@@?%q#@awq$g!q0l8%#k', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(206, 'school285008', 'school285008', '#?%?x#2wtc94peb6?34o', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(207, 'school649840', 'school649840', '2x6i7h@s?$n!84u@#o!9', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(208, 'school127968', 'school127968', '$yb?a1%c82r%yamiz595', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(209, 'school611488', 'school611488', '8%@5@cq?1?08v?e%6x9$', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(210, 'school429467', 'school429467', 'f$$#%wu3%!7!a?%5#n@%', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(211, 'school465263', 'school465263', '@i?hyr9%@#75s$78%0q1', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(212, 'school776707', 'school776707', '6vuc?1j!@76?@!!9#7e7', 'school', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(213, 'school763361', 'school763361', 'ai##sp2??@%qu233997%', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(214, 'school664061', 'school664061', '68k@42sbv9v?60pv3?r4', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(215, 'school212974', 'school212974', '$6mfa?#6g8!9oyqbdd#t', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(216, 'school343032', 'school343032', '469%@p$3%x$o3y9$$8@u', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(217, 'school109003', 'school109003', '#nke?86@$nw@rxg52?19', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(218, 'school466814', 'school466814', '3c$23ti1%p38s95kp0wp', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(219, 'school118331', 'school118331', '?!5648!7l?69?$au!4j0', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(220, 'school658463', 'school658463', 'g8uuo?f2#5#j?y80e@04', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(221, 'school765234', 'school765234', 'w!60%$d7gfhmg21?2o?#', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(222, 'school020368', 'school020368', '864$k0$e$?8!52a$3w$j', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(223, 'school258970', 'school258970', 'c3338g@@y%?@!@20326g', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(224, 'school837377', 'school837377', '%c7?4!5?u5@95le0!#m1', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(225, 'school535565', 'school535565', '%s2$i#3?@o?i%whkblpk', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(226, 'school649919', 'school649919', '$pb0#q?n#04ty!j?w49n', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(227, 'school515387', 'school515387', 'ttr$!03r!!j#@c@2%@3j', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(228, 'school657152', 'school657152', 'q1@6@7m?@%??55$pkq0b', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(229, 'school525137', 'school525137', '3!q#64vkyfp$4eo@ku?u', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(230, 'school358115', 'school358115', '3z9@!#xsi4#42?32#q8r', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(231, 'school559825', 'school559825', '@%%#tgtl@7mjk!l2#?y!', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(232, 'school154318', 'school154318', '#qr#e%9fg9tg18g09#@#', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(233, 'school031772', 'school031772', '??6976?fgnruc9@@y3rj', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(234, 'school624357', 'school624357', '4$?ppr#3$3@622x5g#4x', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(235, 'school205843', 'school205843', 'o%w!5f2tx%bz#!8$7f2g', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(236, 'school014383', 'school014383', 'fwj5v48#8?ot##94u@$n', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(237, 'school990702', 'school990702', 'u@kmf!s%468?823!byg!', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(238, 'school990110', 'school990110', '!ip@qp%@@6m1?6!!0b6#', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(239, 'school340162', 'school340162', '2e#5o%%54m%ot3w@64w7', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(240, 'school645345', 'school645345', 'z?@9u982ok64q!22@6zb', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(241, 'school490578', 'school490578', 'v#y!%#es#18?%b6$3c!7', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(242, 'school014998', 'school014998', '#5?42%og3j1!@k18n8!w', 'school', 'leerling', 'H52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(243, 'school375003', 'school375003', 'u38?n7@33p2t1!?!@ff!', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(244, 'school653143', 'school653143', '$k00i12r1j@89@@!m1z8', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(245, 'school811124', 'school811124', '%$3c1@?8%?91h62?fa9@', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(246, 'school116463', 'school116463', 'qwa@#64ev%r89d#844e8', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(247, 'school985114', 'school985114', 've@w?48x!?f9z7#roq?5', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(248, 'school752380', 'school752380', 'i%!%54@j@%9?$et@!@$r', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(249, 'school398884', 'school398884', '5r@#!$@!ahwz?a8$24g%', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(250, 'school325627', 'school325627', '$0?9f!peh#!$?0#7w!3!', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(251, 'school334739', 'school334739', 'h?!16o@@!%!88?$6$#?g', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(252, 'school035270', 'school035270', 'h9!1s1bil1145g72v%f%', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(253, 'school748692', 'school748692', 'es94d2y2qa8m?w@!%ct@', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(254, 'school263190', 'school263190', '2gpl2%8!f$#@s3t9ko%?', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(255, 'school559300', 'school559300', 'pp$dp@y%w7$$3v64qrbe', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(256, 'school056429', 'school056429', '5n@8@3n?j?3#m2#?7mq1', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(257, 'school390269', 'school390269', '2#xv$l52#u$z%3t!$m@v', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(258, 'school442217', 'school442217', '$84%?two$0yf5?b4c4b7', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(259, 'school116721', 'school116721', 'd1sty#ow#!@oeh?%5!?9', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(260, 'school099385', 'school099385', '8@ec4#192ed9#?#2!s1c', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(261, 'school180288', 'school180288', '0!@1oig$wp?ys$@@5lq3', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(262, 'school361696', 'school361696', '#627vj#kb%5q?fkq%h#4', 'school', 'leerling', 'G61', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(263, 'a187721', 'a187721', 'p9p0k?f$#8@%#!i%w#59', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(264, 'a523535', 'a523535', '@d2qx#lq#%w@5%!!$md$', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(265, 'a515504', 'a515504', '!?8$3?%7x0q?md##@h6q', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(266, 'a185398', 'a185398', '@!1711c7?v?yny41x2pi', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(267, 'a900616', 'a900616', 's3g4@y@#g2@@kq@v%v@8', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(268, 'a371818', 'a371818', '62g3?r#gr814?pa%2639', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(269, 'a312440', 'a312440', 'z#%g$%q$#y4f#0i%we1!', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(270, 'a160248', 'a160248', '6d$8#?e$@z@$8n5%gdc4', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(271, 'a495059', 'a495059', '@%t33qh@259?b6w7o7#r', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(272, 'a198030', 'a198030', '762??p30@2?@!oh32d2#', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(273, 'a685761', 'a685761', '847%x4e!84x@ryfs9r65', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(274, 'a376065', 'a376065', '%x$40?6xotrxk#79@18m', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(275, 'a105795', 'a105795', '#4#d$56$%13#@%%9q4t8', 'a', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(276, 'a560217', 'a560217', '?gl8#5%kz%#jky#@?2%q', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(277, 'a858663', 'a858663', '!?$@p628@@i31!$5?lc%', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(278, 'a002740', 'a002740', '9!?j@g3f@de4i@@11@i#', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(279, 'a461182', 'a461182', '%@v?7!%o?v8je8d2##5%', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(280, 'a411424', 'a411424', '?07yo0l$!o62t1h@i1?#', 'a', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(281, 'test814385', 'test814385', '%?$!b0$%$6g$3?!%!8#1', 'test', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(282, 'test773496', 'test773496', 'i0@#!#8by$!#zck1r?1l', 'test', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(283, 'test042351', 'test042351', '@1cei?7468b5b52v0!e3', 'test', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(284, 'test370603', 'test370603', 'a!t042$?p5fj8$1db2p0', 'test', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(285, 'test979961', 'test979961', '7#983lrdp0$8@78%53$$', 'test', 'docent', NULL, '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(286, 'test184394', 'test184394', '!4axqbp66%x!1$i8ybpm', 'test', 'leerling', 'G51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(287, 'test524703', 'test524703', '?!7u!aa!o%8lj22%@24g', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(288, 'test238326', 'test238326', 'fe!9!4!g%w?4ul@c#1$7', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(289, 'test642212', 'test642212', 'o1#%hr@gm%tedq5$g@u9', 'test', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(290, 'test476527', 'test476527', 'dj#@!2g3%8!086c#z@67', 'test', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(291, 'test111423', 'test111423', 'x54a9@@#ta3ge@3$9cxw', 'test', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(292, 'test914796', 'test914796', 'a#d!$2%hxcm@$b50h?td', 'test', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(293, 'test098478', 'test098478', '$%gg98%1#$6z%1g#@9?$', 'test', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(294, 'test939009', 'test939009', 'j15w#azd0o%#?!2$x@a%', 'test', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(295, 'test765123', 'test765123', '@70582h!g1xjq%e%dl!6', 'test', 'leerling', 'H51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(296, 'test767977', 'test767977', '9j08?z67422%6ck%!0#3', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(297, 'test242100', 'test242100', '#c@jv#i61zkv3%?8g5ph', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(298, 'test046418', 'test046418', '!g!91a16pev72456$40!', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(299, 'test156332', 'test156332', '6%8!?42%y7bh0#m!22%!', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(300, 'test449599', 'test449599', 'p68810w$0n@!6??gl!c1', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(301, 'test161572', 'test161572', 'uj6938?34qz3$%r6$5nq', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(302, 'test133444', 'test133444', 'd$?pfj$uc!@daz#!#q?!', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(303, 'test491155', 'test491155', 'eb4$se7@nb@?!#o6p%zz', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(304, 'test647822', 'test647822', 'a25v$c5hdmd$8n?73#2%', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(305, 'test910595', 'test910595', 'j#?%4@#k8q5?b99xfe4$', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(306, 'test771347', 'test771347', '89%864%r$al6n@02lpbn', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(307, 'test286068', 'test286068', 'bd3u06$#bmvz!5@!29@@', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(308, 'test730507', 'test730507', '#r2y@lq38@$03eg6j9!@', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(309, 'test025907', 'test025907', '$4%gb@2zl2$#s?oq4?#c', 'test', 'leerling', 'A52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(310, 'test318963', 'test318963', '8m3iy3$vv@#!m!%9#j6?', 'test', 'leerling', 'test', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(311, 'test357439', 'test357439', '282fbp?zq?l@7j??z13r', 'test', 'leerling', 'A52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(312, 'test898033', 'test898033', '#jv94?t7b6?4!n96#6b$', 'test', 'leerling', 'A52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(313, 'test881344', 'test881344', 'd1$%o41@8313cvwc$23o', 'test', 'leerling', 'A52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(314, 'test739390', 'test739390', 'k05%v0$60ie9h!2#?##@', 'test', 'leerling', 'A52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(315, 'test121803', 'test121803', 'l4l3328q$?i#xlj784c4', 'test', 'leerling', 'A52', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(316, 'test871491', 'test871491', 'v%7$2v5?i!%@50?ks8g#', 'test', 'leerling', 'G51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(317, 'test179148', 'test179148', '?7u$i?h0?6%6@@1!3pm%', 'test', 'leerling', 'G51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(318, 'test988164', 'test988164', 'e?o9y4@@o7926?20d562', 'test', 'leerling', 'G51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(319, 'test653074', 'test653074', 'ok4#g994#!#$2?0!$?#j', 'test', 'leerling', 'G51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL),
(320, 'test005591', 'test005591', 'q2?zv@u%9h1$3256i2!%', 'test', 'leerling', 'G51', '2018-06-03', '2019-06-03', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groepen`
--
ALTER TABLE `groepen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planner`
--
ALTER TABLE `planner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progressie`
--
ALTER TABLE `progressie`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groepen`
--
ALTER TABLE `groepen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `planner`
--
ALTER TABLE `planner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
