-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 07:40 PM
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
(149, '511111', '41100', '70010100', NULL, NULL, NULL, NULL, '501010', NULL, NULL, NULL),
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
(149, 'test account', 'docent', '$2y$10$bYKHHZQzbT0jaQDfsVyaAOzZ0.nxcf8ePOIbLI0K2G6bqew5cAgc6', 'test', 'docent', 'H51', '2017-01-01', '2999-04-11', NULL, 'test', 'steeman.rene1@gmail.com', 0, '2018-05-16 19:26:11'),
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
(160, 'Lars', '1011123318', '$2y$10$hL/hjkCXpR7lWnz7T4YVEO.VmZ9UYe8v4d77nxm9JXcV12ADLB8fO', 'test', 'leerling', 'H51', '2018-04-11', '2019-04-11', 'df', NULL, NULL, NULL, NULL),
(161, 'Luc', '5473643404', '$2y$10$KFXTkiBCeA0wMGJ7WAsgOOMOdeDtKl0eFaNOvbN1PQ33orv07wsv2', 'test', 'leerling', 'IN2', '2018-04-11', '2019-04-11', 'bug?', 'notaris', NULL, NULL, NULL),
(162, 'Sam', '7741310298', '$2y$10$KhFb0iGdUUSOSUF5A2/IRu3rmuqJHsnKXDjCebZd2tc0hX8aHLp9S', 'test', 'leerling', 'IN2', '2018-04-11', '2019-04-11', 'bug?', NULL, NULL, NULL, NULL),
(163, 'René', '2037288844', '$2y$10$qG4inZnRPGFQ/lzF8wNS.OHjd4LBlJDOOxvAZOGDM33ts6b.qy3HC', 'test', 'leerling', 'IN2', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(164, 'Bram', '9143804653', '$2y$10$jFeMDIU6f2oE6cCCeSaaVupPeaT85ieHmsYaQ10rIw..L78qRRZs6', 'test', 'leerling', 'G51', '2018-04-11', '2019-04-11', 'bug?', NULL, NULL, NULL, NULL),
(165, 'Dario', '7886629946', '$2y$10$qD/D/mvP6Q0b.rtZZKAaKeG/SD84cGAnQglMLAPTSvFejQLBTKsC2', 'test', 'leerling', 'IN1', '2018-04-11', '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(167, 'tester', '3737091617', '$2y$10$XQ6/LhjtRJqWx/0G8IeXwu40zkUkbbqlKEpxW2mXobAfew5xiMmxy', 'test', 'leerling', 'H51', '2018-04-12', '2019-04-12', NULL, NULL, NULL, NULL, NULL),
(168, 'LeerlingTestGroupsFunctie', 'leerling', '$2y$10$lbvHfNtlkn918pLBVwiWU.N9CAXmhND6v3kf5lLlJiZTaVmGnJNF6', 'test', 'leerling', 'A51', '2018-04-16', '2019-04-16', '', 'test', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
