-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 apr 2019 om 20:30
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
  `naam` tinytext COLLATE utf8_bin NOT NULL,
  `beschrijving` text COLLATE utf8_bin NOT NULL,
  `link` tinytext COLLATE utf8_bin NOT NULL,
  `school` tinytext COLLATE utf8_bin NOT NULL
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
  `titel` tinytext COLLATE utf8_bin NOT NULL,
  `beschrijving` text COLLATE utf8_bin NOT NULL,
  `progressie` tinytext COLLATE utf8_bin,
  `school` tinytext COLLATE utf8_bin NOT NULL,
  `klas` tinytext COLLATE utf8_bin,
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
  `H1` tinytext COLLATE utf8_bin,
  `H2` tinytext COLLATE utf8_bin,
  `H3` tinytext COLLATE utf8_bin,
  `H4` tinytext COLLATE utf8_bin,
  `H5` tinytext COLLATE utf8_bin,
  `H6` tinytext COLLATE utf8_bin,
  `V1` tinytext COLLATE utf8_bin,
  `V2` tinytext COLLATE utf8_bin,
  `V3` tinytext COLLATE utf8_bin,
  `V4` tinytext COLLATE utf8_bin,
  `V5` tinytext COLLATE utf8_bin,
  `B1` tinytext COLLATE utf8_bin,
  `B2` tinytext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `progressie`
--

INSERT INTO `progressie` (`userid`, `H1`, `H2`, `H3`, `H4`, `H5`, `H6`, `V1`, `V2`, `V3`, `V4`, `V5`, `B1`, `B2`) VALUES
(341, '11111', '1001', NULL, '1111', '111011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1010', '000100', NULL),
(353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10101', NULL),
(361, '1000010', '0001110', NULL, NULL, NULL, NULL, '1    1', '11110', '11110', NULL, '1111', '000100', '011110'),
(953, '110000', '1000000', '000110000', '111100', NULL, NULL, '1100000', NULL, NULL, NULL, NULL, '111000', '011110'),
(960, '111111', NULL, NULL, NULL, NULL, NULL, '1111111', NULL, NULL, NULL, NULL, '111111', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hoofdstuk` tinytext COLLATE utf8_bin NOT NULL,
  `cijfer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `quiz`
--

INSERT INTO `quiz` (`id`, `userid`, `hoofdstuk`, `cijfer`) VALUES
(6, 361, 'H1', 10),
(7, 360, 'B1', 4),
(8, 361, 'H2', 10),
(11, 361, 'V4', 4),
(12, 958, 'H1', 10),
(13, 953, 'H1', 2.5),
(14, 960, 'H3', 9),
(15, 960, 'H1', 9),
(16, 960, 'V1', 9),
(17, 960, 'B1', 9),
(18, 953, 'H5', 10),
(19, 953, 'H4', 10),
(20, 953, 'V2', 10),
(21, 953, 'V3', 10),
(22, 953, 'B2', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `theorie`
--

CREATE TABLE `theorie` (
  `theory_id` int(11) NOT NULL,
  `school` tinytext COLLATE utf8_bin NOT NULL,
  `hoofdstuk` tinytext COLLATE utf8_bin NOT NULL,
  `paragraaf` tinytext COLLATE utf8_bin NOT NULL,
  `hoofdstuk_naam` tinytext COLLATE utf8_bin NOT NULL,
  `paragraaf_naam` tinytext COLLATE utf8_bin NOT NULL,
  `main_theory` text COLLATE utf8_bin NOT NULL,
  `questions_theory` text COLLATE utf8_bin,
  `answers_theory` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `theorie`
--

INSERT INTO `theorie` (`theory_id`, `school`, `hoofdstuk`, `paragraaf`, `hoofdstuk_naam`, `paragraaf_naam`, `main_theory`, `questions_theory`, `answers_theory`) VALUES
(1, 'Inforca', 'H1', '1', 'TEST H1', 'TEST paragraaf 1', '<p>Een computer \'begrijpt\' alleen nullen en enen. Informatie wordt in een computer altijd door middel van deze twee getallen opgeslagen. Of het nou gaat om letters, programma\'s of het beeld, het zijn allemaal nullen en enen.</p>\r\n\r\n			<p>Een bit heeft twee mogelijke waardes: 1 en 0. Een 1 geeft de aanwezigheid en 0 de afwezigheid van stroom aan. Er kan met dit binair systeem, een systeem met twee waarden, van alles worden weergegeven.</p>\r\n\r\n			<p>Dit binaire systeem werkt het beste als er meerdere 0\'en en 1\'en elkaar opvolgen, om zo voor veel mogelijkheden te zorgen. Hiermee kunnen dus ook grote hoeveelheden gegevens, oftewel data worden opgeslagen.</p>\r\n\r\n			<p>In het binair stelsel wordt van rechts naar links geteld. De waarde van een 1 wordt steeds groter als het verder links staat. In dit voorbeeld kun je zien hoe je in het binair stelsel tot 10 telt (met stappen van 1) en beginnend bij 0.</p>\r\n\r\n			<p>0, 1, 10, 11, 100, 101, 110, 111, 1000, 1001, 1010.</p>\r\n\r\n			<p>Alle 1\'en en 0\'en geven een volledige waarde weer. De waarde van de 1 wordt bepaald door de plek die deze binnen de reeks heeft. Helemaal rechts is het 1 waard en voor elke plek dat deze verder naar links staat verdubbeld zijn waarde. Een paar voorbeelden zijn:</p>\r\n\r\n			<p>Een 1 op de tweede plek van rechts is 2 waard, dus 10 in binair stelsel is 2 in het decimaal systeem.</p>\r\n\r\n			<p>Een 1 op de derde plek is 4 waard, dus een 100 in het binair stelsel is 4 in het decimaal systeem.</p>\r\n\r\n			<p>Een 1 op de vierde plek is 8 waard, dus een 1000 in het binair stelsel is 8 in het decimaal systeem.</p>\r\n\r\n			<p>Je kunt ook een 0 hieraan toevoegen. Dit hebt je bijvoorbeeld nodig om 5 weer te geven in decimaal, 101. Een vijf in binair is dus eigenlijk een vier en een, zoals twaalf in decimaal eigenlijk tien en twee is. Een 0 kan dus de waarde van een 1 verhogen, door de 1 naar links te \'duwen\'.</p>', '<ol>\r\n				<li>\r\n					Hoe wordt een nul en een één door een computer begrepen?\r\n				</li>\r\n				<li>\r\n					Vertaal 001, 011, 1001001 naar het decimale systeem (\'normale\' getallen)\r\n				</li>\r\n				<li>\r\n					Vertaal 5, 20 en 40 naar binair\r\n				</li>\r\n			</ol>', '<ol>\r\n				<li>\r\n					Wel stroom = 1, geen stroom = 0\r\n				</li>\r\n				<li>\r\n					1, 3, 73\r\n				</li>\r\n				<li>\r\n					101, 10100, 101000\r\n				</li>\r\n			</ol>'),
(2, 'Inforca', 'H1', '2', 'TEST H1', 'TEST paragraaf 2', '<p>Optellen</p>\r\n\r\n			<p>Optellen in binair is niet ingewikkeld. Je telt het bovenste en het onderste getal bij elkaar op en in het geval van 1+1 krijg je dan 10 als uitkomst. Het is alleen zo dat je bij het optellen van binaire getallen vaker iets moet onthouden, omdat het vaker boven de grenswaarde (meer dan 1) uitkomt.</p>\r\n\r\n			<img src=\"./afbeeldingen/additie.svg\" class=\"theorieImage\" />\r\n\r\n			<p>Decimaal: 108+49 = 157, dus het klopt.</p>\r\n\r\n			<p>Getallen met elkaar verminderen</p>\r\n\r\n			<p>Ook dit is niet ingewikkeld. Je haalt steeds het onderste getal van het bovenste getal af. Als je op -1 uitkomt \'leen\' je van het volgende nummer.</p>\r\n\r\n			<img src=\"./afbeeldingen/aftrekken.svg\" class=\"theorieImage\" />\r\n\r\n			<p>Vermenigvuldigen</p>\r\n\r\n			<p>Vermenigvuldigen lijkt wat moeilijker, maar dit valt mee. Dit doe je door steeds het meest rechtste nummer van onder te vermenigvuldigen met de nummers van de bovenste rij. Dit gaat dus van rechts naar links. Als de rij af is ga je bij de onderste rij de stappen herhalen voor het getal dat een plek verder naar links staat. Je zet steeds de uitkomsten onder elkaar en telt ze op het einde bij elkaar op. Denk eraan om het antwoord per rij ook steeds een plek op te laten schuiven naar links, je kunt er ook steeds een nul achter zetten om dit te verduidelijken.</p>\r\n\r\n			<img src=\"./afbeeldingen/multiplicatie.svg\" class=\"theorieImage\" />\r\n\r\n			<p>\r\n				Binair delen is ook mogelijk, maar dit is vrij lastig (voor een mens) om te doen. We zullen dit dus niet gaan uitvoeren, omdat het simpelweg te complex wordt.\r\n			</p>', 'Binair rekenen\r\n			<ol class=\"MLquestion\">\r\n				<li>\r\n					Tel op\r\n\r\n					<ol>\r\n						<li>10111+01100</li>\r\n						<li>01111+1110101</li>\r\n						<li>001100111+01111100</li>\r\n					</ol>\r\n				</li>\r\n\r\n\r\n				<li>\r\n					Trek af\r\n\r\n					<ol>\r\n						<li>10110-11</li>\r\n						<li>10110-0110</li>\r\n						<li>110011-101110</li>\r\n					</ol>\r\n				</li>\r\n\r\n				<li>\r\n					Vermenigvuldig\r\n\r\n					<ol>\r\n						<li>111*000</li>\r\n						<li>101*101</li>\r\n						<li>11011*101111 </li>\r\n					</ol>\r\n				</li>\r\n\r\n			</ol>', '<ol class=\"MLquestion\">\r\n				<li>\r\n					Tel op\r\n\r\n					<ol>\r\n						<li>100011</li>\r\n						<li>10000100</li>\r\n						<li>11100011</li>\r\n					</ol>\r\n				</li>\r\n\r\n				<li>\r\n					Trek af\r\n\r\n					<ol>\r\n						<li>10011</li>\r\n						<li>10000</li>\r\n						<li>100</li>\r\n					</ol>\r\n				</li>\r\n\r\n				<li>\r\n					Vermenigvuldig\r\n\r\n					<ol>\r\n						<li>0</li>\r\n						<li>11001</li>\r\n						<li>1001010</li>\r\n					</ol>\r\n				</li>\r\n\r\n			</ol>'),
(3, 'Inforca', 'H1', '3', 'TEST H1', 'TEST paragraaf 3', '<p>\'Gates\', oftewel poortjes in het Nederlands, zijn kleine schakelingen. De eenvoudigste (en tevens ook de belangrijkste) zijn AND en OR. Een gate ontvangt twee binaire waarden als input en vergelijkt deze twee bits.</p>\r\n\r\n			<p>Afhankelijk van welke gate en welke input het heeft ontvangen komt er een bepaalde output. Deze output is wederom een bit, het antwoord eigenlijk dus met ja of nee.</p>\r\n\r\n			<p>Bij AND is de output 1 als de twee bits in de input beide 1 zijn, dan kan de stroom namelijk erdoorheen (zie afbeelding). De naam AND is dus eigenlijk best logisch, want het heeft 1 en 1 nodig.</p>\r\n\r\n			<p>Bij OR moet minimaal een van de twee bits in de input 1 zijn om vervolgens een output van 1 uit te krijgen, maar twee keer 1 geeft ook de output 1. Alleen als de output twee keer 0 is zal de output bij een OR gate 0 zijn. De stroom kan dus doorgaan als er minimaal één keer een 1 als input is.</p>\r\n\r\n			<p>Als je deze poorten in een stroomcircuit gebruikt geld dat wanneer de output 1 is, de kring gesloten is (en er dus wel stroom kan circuleren), en bij 0 de kring open is (en er dus geen stroom kan circuleren).</p>\r\n\r\n			<p>Een voorbeeld van deze gates in een circuit is:</p>\r\n\r\n			<p>AND</p>\r\n\r\n			<img src=\"./afbeeldingen/AND.svg\" class=\"theorieImage\" />\r\n\r\n			<p>OR</p>\r\n\r\n			<img src=\"./afbeeldingen/OR.svg\" class=\"theorieImage\" />\r\n\r\n			<p>De grijze strepen zijn de mogelijke posities van de schakelaars. Als ze dicht zijn kan er stroom doorheen en als ze open zijn niet, 1 of 0.</p>', '<ol class=\"MLquestion\">\r\n				<li>\r\n					Neem als input de waarden 0 en 1 (in die volgorde).\r\n\r\n					<ol>\r\n						<li>Welk resultaat zal dit geven bij een AND-gate?</li>\r\n						<li>En bij een OR-gate?</li>\r\n						<li>Teken de AND- en OR-gates als een elektrisch circuit.</li>\r\n					</ol>\r\n				</li>\r\n			</ol>', '<ol class=\"MLquestion\">\r\n				<li>\r\n					<ol>\r\n						<li>0</li>\r\n						<li>1</li>\r\n						<li>\r\n							AND\r\n							<img src=\"./afbeeldingen/vraagAND.svg\" class=\"theorieImage\" />\r\n\r\n							OR\r\n							<img src=\"./afbeeldingen/vraagOR.svg\" class=\"theorieImage\" />\r\n\r\n						</li>\r\n					</ol>\r\n				</li>\r\n			</ol>');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` tinytext COLLATE utf8_bin,
  `username` tinytext COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `school` tinytext COLLATE utf8_bin,
  `functie` tinytext COLLATE utf8_bin,
  `klas` tinytext COLLATE utf8_bin,
  `creation_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `group_name` tinytext COLLATE utf8_bin,
  `group_role` tinytext COLLATE utf8_bin,
  `email` tinytext COLLATE utf8_bin,
  `NFailedLogins` int(11) DEFAULT NULL,
  `LFailedLogin` datetime DEFAULT NULL,
  `LActivity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `username`, `password`, `school`, `functie`, `klas`, `creation_date`, `expire_date`, `group_name`, `group_role`, `email`, `NFailedLogins`, `LFailedLogin`, `LActivity`) VALUES
(336, 'test982267', 'test982267', '$2y$10$xFpjIMouA.qUnjr4iID5YOY5knT9H5YLR/77O373avW2IdcWvYA5m', 'test', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 1, '2019-04-03 20:54:28', NULL),
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
(359, 'leerling', 'leerling', '$2y$10$z4aq1c.uHaqblMzojmK/4eDTJ17N/tH6E4OQYerxnxdlOKzYhoEPK', 'test', 'leerling', 'klas1', '2018-08-26', '2019-08-26', NULL, 'test_rol', NULL, 0, '2018-09-27 18:23:46', '2019-04-03 21:24:25'),
(361, 'docent', 'docent', '$2y$10$Rkw/QL9pTeesIlXwtZ2li.MBLZqLyHcaXEDZ.mSo8uMC7zk9LWp86', 'test', 'docent', NULL, '2018-09-01', '2019-09-01', NULL, NULL, NULL, 0, '2019-03-16 09:47:02', '2019-04-12 20:29:14'),
(362, 'test441173', 'test441173', '$2y$10$El.nAocP0IDMrtWuV0A8mu17RDBbJcgk.cw55oLnPi.tMO3JbfSF6', 'test', 'docent', NULL, '2018-09-09', '2015-09-09', NULL, NULL, NULL, 0, NULL, NULL),
(363, 'test956641', 'test956641', '$2y$10$oJASR1zKZrmZTnVDRVsRqeAdAqm6G1N.e9zD8rufD4UVDSZCJj2de', 'test', 'leerling', '1', '2018-09-09', '2019-09-09', NULL, NULL, NULL, NULL, NULL, NULL),
(953, 'test_docent1', 'test_docent1', '$2y$10$ZcugOZs9Ds3r9UQuO8efrOlu2/BSszWuQ5Jo6O9cC0LwfI02Rdgfe', 'test_school', 'docent', NULL, '2018-08-26', '2025-08-26', NULL, NULL, NULL, 0, '2019-03-30 19:37:13', '2019-04-08 11:40:20'),
(954, 'test_docent2', 'test_docent2', '$2y$10$GCMhSHaNor6GNOtwOIhACOP1bIggWmoyjcBiMDUS5Kx4OAznDkJZe', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, '2018-08-26 09:39:01', NULL),
(955, 'test_docent3', 'test_docent3', '$2y$10$Qvpw8AE2urtJWEoyD4oy4OgDmA6ptjAwOijy.F..hJKhmHo4YEYlO', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL, NULL),
(956, 'test_docent4', 'test_docent4', '$2y$10$5C2wkOUJ4wEHEQisGBh7z.4aOiQifmS1rLbcuiR4ojLv/FJSQiI12', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL, NULL),
(957, 'test_docent5', 'test_docent5', '$2y$10$XIg2y2Jctkra1HQ5JoMm1eK.T1LKyxk1FNaDXOcmg/nYP/0FDrO.S', 'test_school', 'docent', NULL, '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, '2018-08-26 09:44:02', NULL),
(958, 'test_leerling_havo1_1', 'test_leerling_havo1_1', '$2y$10$WPG.G.v9aa.EGKBm1v57tOdU.3Ajgmk612OLCHHnNqzk3b6DqmIae', 'test_school', 'leerling', 'havo1', '2018-08-26', '2025-08-26', 'Test_groep1', NULL, NULL, 0, '2018-09-27 15:00:22', NULL),
(959, 'test_leerling_havo1_2', 'test_leerling_havo1_2', '$2y$10$00ghmA1BF2xYDoOB8pbtV.q6qxpVfgqaGCLHR3pleY9pRYFPIaf7O', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, 0, NULL, NULL),
(960, 'Luc', 'test_Luc', '$2y$10$3fy89XsKcFnGt0.2YWPPyei8LspRSw1BP1F8DbdYHDaWZri7dthXa', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL, NULL),
(961, 'Sam', 'test_Sam', '$2y$10$EF38j6hs0w3nLvtpIfTyUeOp2BC.cAM7d5IpTMDUY/XuET.dPfB5S', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL, NULL),
(962, 'Sanne', 'test_Sanne', '$2y$10$pjuJ.Q6Sn/UtzzuBAPB4leXeHYSalzJrsTicn3tIKQCTBnrTUhh2a', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL, NULL),
(963, 'Max', 'test_Max', '$2y$10$YabaR610d5/OaGILCDDg0eqvPqV7c63EHeyLKkMyOpYUeYgNuWLNK', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, '2018-08-26 14:56:25', NULL),
(964, 'Lars', 'test_Lars', '$2y$10$xw8vVs2TNZPM9SBqNWG5tehhzJzLohTibUiCpf9YJgSKzlXraZPoC', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL, NULL),
(965, 'Jordy', 'test_Jordy', '$2y$10$I7Aj4Ha4uy8//bN06f6wBu1tvmQubgLzv6ggRop6WBC4v8TAPEe4O', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', NULL, NULL, 0, NULL, NULL),
(966, 'test_school602356', 'test_school602356', '$2y$10$eQ5cLHUEb3pLpB/ap1WvQuIX5xWHuiwgcdldbuHV7HfA3YEADRgAG', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Test_groep2', NULL, NULL, NULL, NULL, NULL),
(967, 'test_school763150', 'test_school763150', '$2y$10$Y9bI4oimPGaRa2XmQT1rK.yHkpbRHdQ4QCkASyzXZk/Exgq7AtlsS', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(968, 'test_school973657', 'test_school973657', '$2y$10$pIwhehZ48k7iRY/Db8GVe.uFgPrMvyfY11MKWMffbB7KrBieZcVa2', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(969, 'test_school396800', 'test_school396800', '$2y$10$yXu4ap4y4UdokTyoy0LK/.m6G51meD42TExiBRfeNYyHTQkVulabC', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(970, 'test_school386112', 'test_school386112', '$2y$10$FCsrRYSTJewg6Fpsg3eNnegiuiN2hX5HjjBnBodES1Pkc5z.TklI2', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(971, 'test_school358996', 'test_school358996', '$2y$10$5vCJC1CD.CLXtUw3app5me58ibAiweVsCP2pvvGe6d9VEf/VmytOG', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(972, 'test_school752249', 'test_school752249', '$2y$10$YzlhfnbyrWu/JULAonTUGusNlFtKa95SfaXQeWIR/HlTpHffEBgDC', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(973, 'test_school380012', 'test_school380012', '$2y$10$IBA8EkOq64t8JIfj9.6KNubLnyVlkbYUzUkTT/689OCfSEwwcuVXu', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(974, 'test_school276280', 'test_school276280', '$2y$10$lvfb50ja9wnC/B25Jx7tpead7uMbvlW7k0tz5dfCLKod9wnE2fCPy', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(975, 'test_school844054', 'test_school844054', '$2y$10$mHuh2/M5iSYZuVuxYb7EtuYGPMJ4RNBLj5JEcZ7hVIrXwO.kZeMOS', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(976, 'test_school155347', 'test_school155347', '$2y$10$CCCLeRAnDUrivIHWjWnleehDy07mkH.W0NvMdXLtOtrXgxbjASrHq', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(977, 'René', 'test_leerling_René', '$2y$10$mXoHfiYTX5rqf4tEaayqWeIrzKDI4iP7D1AheQL0BATLh/sXp0yhe', 'test_school', 'leerling', 'havo1', '2018-08-26', '2019-08-26', 'Inforca', 'Ontwikkelaar', 'koffieandcode@gmail.com', 1, '2018-08-28 22:05:50', NULL),
(978, 'test_school259364', 'test_school259364', '$2y$10$TJqoi49P5dSbUv4vCP9CX.VYHqK/vFCpaix4QJr8uQWj8RUwNRO3u', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, NULL, NULL, NULL),
(979, 'test_school694574', 'test_school694574', '$2y$10$NpbkiVg4.CE8auWXLe7qNu2/icFbjwsuNbmcwYZ4apNvv2lXicw9C', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(980, 'test_school834349', 'test_school834349', '$2y$10$NjNd1E6BJUxmKmTjB2MmYuKXSWqrtgYUjdjE04Koqkr9d1TZysta2', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(981, 'test_school502093', 'test_school502093', '$2y$10$tkTgn1o4RkJGky2KIaoJmOkIcGSRndNQlrgfOi.djaBCNqyseZNTu', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(982, 'test_school523250', 'test_school523250', '$2y$10$wZXRBH0XutxTOOuvfbZqC.ldETvJql6xj.CSQQlVsdwr.wLA3yRrO', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(983, 'test_school337199', 'test_school337199', '$2y$10$zWmk0RBUsotgaOTibm0Jte73VewrjH5dVvRYoXDQw/vendKFQevhS', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(984, 'test_school654849', 'test_school654849', '$2y$10$QyDCBUleLJKzMcfatgQw2..VsRyzGzMm6KR2BArbsoPuSTrzeorGW', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(985, 'test_school307533', 'test_school307533', '$2y$10$GDed0vDSjXBX27ECvOcmveQXBn6115txQErc5kEis2OVvKzSvgUaK', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(986, 'test_school698483', 'test_school698483', '$2y$10$VqBGUuoJ5i9Wn1MuKoGOveI.mF4blb5MztBG/OR5aUEH2hrRkl7qm', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(987, 'test_school431649', 'test_school431649', '$2y$10$R8fZ3AAvOcPw5DWieHpixet46huZtEk8jaVs5k.Q/4QQyLkthLko.', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(988, 'test_school029412', 'test_school029412', '$2y$10$Rys3b0m.yIE56xhlrJzM7./gWEX.LdtnS8la1mr.dg8vYgowjZ76G', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(989, 'test_school745768', 'test_school745768', '$2y$10$if22xbbBLD1oxaczccwE7uYd8R5UnJ084ehVx5V9o8YkQgNNQNvWC', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(990, 'test_school649181', 'test_school649181', '$2y$10$.ssJNf0.hnCuoyMCiVOYKuI4Spy7nJwjMVOZFpk6cZjm7ECK3RGQ2', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(991, 'test_school724187', 'test_school724187', '$2y$10$iL9Cm0haXQ12.aD07MwxSemBV3mW5dbSZYsVJg0wsXg8696MbzO3u', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(992, 'test_school620909', 'test_school620909', '$2y$10$VIkJnA7e5Pnz6qSzxvxfw.uMMMU/Jj818aqKTsxmZJfYA32ZmZ70e', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(993, 'test_school785687', 'test_school785687', '$2y$10$edJnj3rBz.Y74VwYMX7ZGej2D7tA3cKJ22jF9E4EVajsnu3icx4Rm', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(994, 'test_school424461', 'test_school424461', '$2y$10$UhNInOKc6yqD4D2LfxD3WuA8ZBFf/Elq0Z4ZqZ1GnITkfLpXJL/ia', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(995, 'test_school061823', 'test_school061823', '$2y$10$YqtORxDKWMhdwWluVYmwfuE77bDwGAhvPyUPwrYtH3RdgFuATnK/.', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(996, 'test_school975777', 'test_school975777', '$2y$10$4YLUSopr88IgPYovU7lfQeuXYhlOVmDLlmGWIEuzmDvQKERMZLCWa', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(997, 'test_school110996', 'test_school110996', '$2y$10$L5vmnDRUnM2n6sotfeOqrO6ZYmpUSxAi0O1On.kJINLXlGEN16Cwa', 'test_school', 'leerling', 'havo2', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(998, 'test_leerling_ath1_1', 'test_leerling_ath1_1', '$2y$10$56ASjsKH7u7BVxNN2xjeA.oIwd4QU48G448m8EmhogZQPm2nf4GlW', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, 0, NULL, NULL),
(999, 'test_leerling_ath1_2', 'test_leerling_ath1_2', '$2y$10$D8Osq.n4/cYa.mJOVyY9yuHdYvDPYH/Pkmhx8WfzbuRMjdLwjM/3C', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, 0, NULL, NULL),
(1000, 'test_leerling_ath1_3', 'test_leerling_ath1_3', '$2y$10$T80kyn9pyfh16yK8aid.ru5NputidSTuIgfHpfkIVG8eGSnhPAQDS', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', 'Test_groep2', 'programmeur', NULL, 0, NULL, NULL),
(1001, 'test_leerling_ath1_4', 'test_leerling_ath1_4', '$2y$10$UrVyT57TumKyKlEyRsZDoOQhOff8l41Y4TgyRAoXdyQyxxMEC/u4G', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, '3D modellen maken', NULL, 0, NULL, NULL),
(1002, 'test_leerling_ath1_5', 'test_leerling_ath1_5', '$2y$10$LlkjdzjWG.iMHwiYTTFuE.F7200Cj/7kP26wo7gq8VGlB.GmajSJG', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, 'schrijver', NULL, 0, '2018-08-27 10:41:40', NULL),
(1003, 'test_school819680', 'test_school819680', '$2y$10$MiY1aiLCnOBS2QKgy69SSeftWl6.KT0JfevXEUme5P.S42q9SA4v2', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1004, 'test_school635885', 'test_school635885', '$2y$10$hU4KmDbjn5XvMePgIgg4KuB9vH1kJ.T35DybitzarHEjRd1.HGvi6', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1005, 'test_school415233', 'test_school415233', '$2y$10$./UOwG0.zSed6buaUZDR/uFkOwm3lls5av99lkfKNGf4h0D7UgsHa', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1006, 'test_school233269', 'test_school233269', '$2y$10$ANT.s9rvR7eE3deKB1EDG.uhsfO2lkCWR4Iac34gco0hlk3STcq/6', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1007, 'test_school668724', 'test_school668724', '$2y$10$Xctk83swg9/3W.xTVHEq.uUEbNo6apt9MOTaIsY9/bgWXApN9t.Xy', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1008, 'test_school649167', 'test_school649167', '$2y$10$0/.InCgUvzqmPyqvcLB/xe6Aws4yqYgrVCcuinyD/EI0D7QZ6Tt6a', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1009, 'test_school276604', 'test_school276604', '$2y$10$o4lqY1aAims3uhTm64p9P.lXE3uKAvIzzpHgJoblGLGOKa3yiPlye', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1010, 'test_school572018', 'test_school572018', '$2y$10$f2TDllbqtaXqL1N.54D4tOmZ83/udMyZvJs3q9rygw7l3viqfPy66', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1011, 'test_school545750', 'test_school545750', '$2y$10$IgulOVrnhijftK.3YJJhVeg8yc4OCNTshZudW78UgamPuuf3J/2xe', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1012, 'test_school474016', 'test_school474016', '$2y$10$Sp2OXXDhp4WXIfXymYax2eZO3/BT/13nsLMkYQHowH6IkOHaVPmeK', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1013, 'test_school298305', 'test_school298305', '$2y$10$xbQoHIJCEI79PSWRccoTi.bDsNj7sn5w5ho/HqrGq8d8jjXvS/Ngi', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1014, 'test_school977213', 'test_school977213', '$2y$10$nHmoe00eDF7LOcOhtBzunen2QK/qKGmFhGWiL69AAp6MmalkbTvTW', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1015, 'test_school564693', 'test_school564693', '$2y$10$Dkg5C7buO/bOP4pSftHkA.6qVpKOFuUQTcN4mz1eWs8/11fgwS9Ty', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1016, 'test_school857577', 'test_school857577', '$2y$10$7q4CrUdz4/vTIX1RDS2GX.tkNmo/0RVw/3/.OD2cyJuRSlCqJ0roS', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1017, 'test_school649472', 'test_school649472', '$2y$10$SaqlMkAUvGkqyImXn/XaruJQns.4A2g1d.Fff8OmAZh/Tr05iFtXO', 'test_school', 'leerling', 'ath1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1018, 'test_school240528', 'test_school240528', '$2y$10$8poDwXgEADrxqboLjofZauB66zBs6SIWLXcprYpRucLWFFaMIZxAS', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', 'Test_groep1', NULL, NULL, NULL, NULL, NULL),
(1019, 'test_school346067', 'test_school346067', '$2y$10$B8l1lrgyF1YqNZdcfs6p.OLvTqKUvAbt8NgYG1w9XEHc.M8Kej63S', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1020, 'test_school148660', 'test_school148660', '$2y$10$yVedu6g2.siGRafYdXmW2.MPgCXVG8SZcUAE3Ad8KMNg13GXD70AO', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1021, 'test_school571214', 'test_school571214', '$2y$10$e4Vtr5YMrGfnWH5iYJwUYubDiSxWPf1IF7DPieqwtQz.3.5s54kou', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1022, 'test_school667113', 'test_school667113', '$2y$10$NeVVEQPKTK26sek8TN03v.z.gIvxjHPs42HNg1KrA2S9heAEI/dJy', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1023, 'test_school092012', 'test_school092012', '$2y$10$bs4Zsgeb4GACsp6fpcnzleMDd.KPCzmILXFGkMjKJLwxbTACthFam', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1024, 'test_school230579', 'test_school230579', '$2y$10$Wsryt1zPzBOl0NJ//yjrZOqCuUk8ktcGOd1UkdMysjH45MvbS25fi', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1025, 'test_school996752', 'test_school996752', '$2y$10$4NQWSYbPwezhuyYSPA5Ia.o19xcNR6VpYnvJw2SnSZM1zaFnZDVfW', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1026, 'test_school261436', 'test_school261436', '$2y$10$cUZyTuQE4J3XKuZLM1L6G.cjACbF5idAPJgz0IS3V38nKw344os6S', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1027, 'test_school967784', 'test_school967784', '$2y$10$7EPhHTupbLHnQzeq9RZave3Yb0xvOejnN4fbAAJ6Lgy3C5OmpGfMy', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1028, 'test_school273162', 'test_school273162', '$2y$10$EWsePmG7kqgDy1Gexo2CWek5mF9eUkH/HoVZ.EHFremqH.VqepHTe', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1029, 'test_school938164', 'test_school938164', '$2y$10$4XlZHm/JWruZu3LUuOYyPO.rRn4lLPO40zTEC5rzHUIZaVwaM8sb2', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1030, 'test_school025649', 'test_school025649', '$2y$10$cjk5T95.5tX856cfnDXM3.YH8HUZ7sE.xV0stM1zolSeh2DzFNnnC', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1031, 'test_school828559', 'test_school828559', '$2y$10$Zf1VTl3b2r6PhChH0CfXkup7HFnXX4tr18V8KNrxbg5Z/Fd8oSI4y', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1032, 'test_school747617', 'test_school747617', '$2y$10$0LLboW/Vn.v08ysPr9JO9OB.ILUg.q63x7cv7x1.VLk.7jP7ieMCq', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1033, 'test_school263330', 'test_school263330', '$2y$10$8IOG5CjyyUqwKhW3DtyG9OMASS0tWaQ9sswFyz3StRGcIfykspyBS', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1034, 'test_school548682', 'test_school548682', '$2y$10$Nq0CMCCdWBsqIMoLzKSZRuVJVT1l/VFf0YpUNQ7H/7/QK0YYdudpG', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1035, 'test_school792114', 'test_school792114', '$2y$10$eIxJFjO4d5ZpZHzzdSYjBu4cDaXVRIN3V1P15F69p01npEqXATcmW', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1036, 'test_school504756', 'test_school504756', '$2y$10$wxWMR0gN3/IittPDATkk4udyy.dOn3Y0d9.Qnp4XHwVx99G0/hIFW', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1037, 'test_school954532', 'test_school954532', '$2y$10$MWH50iLsYjwW/X1b83jCreqXGncVGtcLsAnEgMEIxLwUL0wclRUKG', 'test_school', 'leerling', 'gym1', '2018-08-26', '2019-08-26', NULL, NULL, NULL, NULL, NULL, NULL),
(1038, 'Bernardinus374178', 'Bernardinus374178', '$2y$10$XpeZGllGzTGyZhiuGnBsDuwxEUq/N5NhMusw5/nXdU8edIltcnb7W', 'Bernardinus', 'docent', NULL, '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1039, 'Bernardinus999922', 'Bernardinus999922', '$2y$10$MQhjnBbcjsHkAHW2q6H26OvhUkRBpaVKXgEjrWvaEiXj2iS2JVcmu', 'Bernardinus', 'docent', NULL, '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1040, 'Bernardinus181571', 'Bernardinus181571', '$2y$10$1wCPYMq370cMyFDuDAEJMOera5OaPh7O6yNtPSDoHrykh0/JpBdzK', 'Bernardinus', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1041, 'Bernardinus581118', 'Bernardinus581118', '$2y$10$M0r.OrgJ4njk5dVf.fiiMeaQ7TvqgIsuQyx5wES/h1m.Bmy1GXGZu', 'Bernardinus', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1042, 'Bernardinus798603', 'Bernardinus798603', '$2y$10$CnYDvm095RYS1lGwcVEfNOTu/E9ahuPcB9kM2r7x3IMuRHzeG2Pdu', 'Bernardinus', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1043, 'Bernardinus902653', 'Bernardinus902653', '$2y$10$pMXddBe07whCb6mGEBln.O0uMrgk9w5PCiujfFt89Sf5bAL5Wi7C2', 'Bernardinus', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1044, 'Bernardinus852485', 'Bernardinus852485', '$2y$10$e5kfwUWdSeScEQsPYfXF1ekgoSt1LXg07j/i5NvZHUOI0Io0i9Axe', 'Bernardinus', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1045, 'Bernardinus787614', 'Bernardinus787614', '$2y$10$wmTwkIIQgS8pw8gN7VIit.ENezanFubRhiXJEvXmfxXjFdF9GnmHm', 'Bernardinus', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1046, 'Bernardinus146269', 'Bernardinus146269', '$2y$10$cWf1VNd5GRl.3VkeCoWBBe1w3zjVM4RPZfJr00tbqBTV3.tzFMnZG', 'Bernardinus', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1047, 'Bernardinus893335', 'Bernardinus893335', '$2y$10$B1ZkZVLBboQYlSpGuo3U.uI0dNmOH63RvQEYDLOkhxY47QpidlPfG', 'Bernardinus', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1048, 'Bernardinus591975', 'Bernardinus591975', '$2y$10$2Kst.cO37GdGKXpmMQQ4MOi/28JicgaIZRjS7m0fVUq7rTiDas7Ei', 'Bernardinus', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1049, 'Bernardinus313419', 'Bernardinus313419', '$2y$10$eU4luOm.abMv8pCUYfJwNOPr48dUDSNCvGHTEkqs7RLq438YGKs5a', 'Bernardinus', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1050, 'Bernardinus408106', 'Bernardinus408106', '$2y$10$N134cXo6tjH1S5yuTyscO.uchtRclVScWrL1eW5xpTtHDBJqZ.Jfe', 'Bernardinus', 'leerling', '5havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1051, 'Bernardinus473563', 'Bernardinus473563', '$2y$10$WwMeTuKu0SvxG5na5gmsmOIrsyWoe2VWjc1AHGa64ltT6nkSAaT9i', 'Bernardinus', 'leerling', '5havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1052, 'Bernardinus501885', 'Bernardinus501885', '$2y$10$zF1kUx6D1iKKkapYu1G8I.SmatYbM97fQPz8E0vyKNn3dXozts5C.', 'Bernardinus', 'leerling', '5havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1053, 'Bernardinus670086', 'Bernardinus670086', '$2y$10$cQHq3AkZL0w1xHtR6k4X6On3bRgOftljmYwkJ6.P50d9OnMk.tuZS', 'Bernardinus', 'leerling', '5havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1054, 'Bernardinus639459', 'Bernardinus639459', '$2y$10$zcAXLsn/pkQlf4k8idgbVOrocD.VSZst6752gnzUyYl7RHJnzjSoK', 'Bernardinus', 'leerling', '5havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1055, 'Eijkhagen183695', 'Eijkhagen183695', '$2y$10$YuDdH0IpTft87KTwkxGeRO4l9UIcSkjx2jFdEmLC.V.JP8PWgV6Ki', 'Eijkhagen', 'docent', NULL, '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1056, 'Eijkhagen291643', 'Eijkhagen291643', '$2y$10$GBnXRBOG1HlnlY29glWtA.diocPPzK0rO/E9QsG09Vie3nhu0pnAK', 'Eijkhagen', 'docent', NULL, '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1057, 'Eijkhagen488104', 'Eijkhagen488104', '$2y$10$tZ9.dtceO4Sxkim47G8KfOQOwHhrLudDb9/J9K5ibycqyjhaIG4xm', 'Eijkhagen', 'leerling', '4havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1058, 'Eijkhagen989877', 'Eijkhagen989877', '$2y$10$8CTvnrZ8IixQ7o.ThGX97eQqPF7homETgjUsyAMVPx1jpv0c2z48q', 'Eijkhagen', 'leerling', '4havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1059, 'Eijkhagen600358', 'Eijkhagen600358', '$2y$10$3NWuNmWAfVdtvOBlryl6vunS0SiPZh.pGtTlnAAZ9dKWZYMCtz66i', 'Eijkhagen', 'leerling', '4havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1060, 'Eijkhagen113020', 'Eijkhagen113020', '$2y$10$XSHaOkOhRMfmoV.A5JJ3x.oH1B.Zq.LvBVV2wx5DFBNWGQajd/iAy', 'Eijkhagen', 'leerling', '4havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1061, 'Eijkhagen833026', 'Eijkhagen833026', '$2y$10$iFGtc0TOcmkdE//7eBmp1u6jawXCjIAC/Ri0ZyXbde.ypKlriLYzy', 'Eijkhagen', 'leerling', '4havo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1062, 'Eijkhagen024458', 'Eijkhagen024458', '$2y$10$NZyFY3qN1DN4tVU9JQ76yu65Vmtg28EKu0/F9qARyAXuNx5X5HOLm', 'Eijkhagen', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1063, 'Eijkhagen123822', 'Eijkhagen123822', '$2y$10$OhHZ9T4hQ9rHmyt1vPkKZeUH867z5uHEhAf4ieNV3kNU24kbthoZW', 'Eijkhagen', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1064, 'Eijkhagen621847', 'Eijkhagen621847', '$2y$10$E7CMLcMAsFW3cHY7uQv9DeS8ldPsBUgGdkBIvjVKwS9Hvae8kA6SS', 'Eijkhagen', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1065, 'Eijkhagen589367', 'Eijkhagen589367', '$2y$10$NklD.bXhsqd5AoB6mRu7ROFqiZ6f.VsEZ7hy8R1o7wI1bzjZUS.8C', 'Eijkhagen', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1066, 'Eijkhagen214015', 'Eijkhagen214015', '$2y$10$n9kz6rGPkg/3h8jMX4mMhej7dGCYoRz6eq09WCpAchPxeNUlQXegi', 'Eijkhagen', 'leerling', '4vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1067, 'Eijkhagen249801', 'Eijkhagen249801', '$2y$10$oj9MSvpn80RWUbOtpMD1l.mP.13QN4FK1z6elTN8h.M6uYCbyY2RC', 'Eijkhagen', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1068, 'Eijkhagen230100', 'Eijkhagen230100', '$2y$10$i3.Nedu2DywLMd5WYhDjIeftIvSNsBLWK8J3XkiAlH64Qr7mqiXWq', 'Eijkhagen', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1069, 'Eijkhagen774459', 'Eijkhagen774459', '$2y$10$R1iuD8mRHBWbLBfpwIKsCe8SYwlAW5fIWzh.nwPdHNiZ1xOVZ07Pi', 'Eijkhagen', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1070, 'Eijkhagen934328', 'Eijkhagen934328', '$2y$10$WR8.LXdOnsmvxV/hlYtz4OtaO5puNbroFraSITiYER2ZrUEStnDsS', 'Eijkhagen', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1071, 'Eijkhagen344108', 'Eijkhagen344108', '$2y$10$yFNqTffe0TYAWgd19oN3P.LP4kiwHL5NdCjwzEdvErNg6tTxTMj6W', 'Eijkhagen', 'leerling', '5vwo', '2018-08-31', '2019-08-31', NULL, NULL, NULL, NULL, NULL, NULL),
(1072, 'casus 1996094', 'casus 1996094', '$2y$10$6O5Dctgainn4Ndz9u0PAmuu8g/WDodOBZTi3FfLdDE0FCF4jyGTie', 'casus 1', 'leerling', 'casus', '2018-10-16', '2019-10-16', NULL, NULL, NULL, 0, NULL, NULL),
(1073, 'casus 1203400', 'casus 1203400', '$2y$10$Zv9JnJYVWRcdvTRL4CPGoeOiSxMkO1LeuyG2lOlG5aH10zqMMtYMW', 'casus 1', 'leerling', 'casus', '2018-10-16', '2019-10-16', NULL, NULL, NULL, NULL, NULL, NULL),
(1074, 'casus 1599305', 'casus 1599305', '$2y$10$BCu/vDHaW5xSrSOAbUnuE.UyIVXH3xvhWfBYM/xZ6Rz6meEmb46ju', 'casus 1', 'leerling', 'casus', '2018-10-16', '2019-10-16', NULL, NULL, NULL, NULL, NULL, NULL),
(1075, '637163', '637163', '$2y$10$9af15dkgBdYB9hlMzTMvHuXoST3eLDwSqqgSVrhlOjYnEFJ9.mx42', '', 'docent', NULL, '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1076, '878225', '878225', '$2y$10$3eDHA3e/KzXcCWBUtMPAu.4Kz8RQlptU64h1C.X8z1Hilz8Fo5EAi', '', 'leerling', 'A', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1077, '363018', '363018', '$2y$10$B9wLU3TsNV5e/Cl1W6H0TuDO5a3UN56h0fYufVJzF0uTJggALTcEi', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1078, '587386', '587386', '$2y$10$jUHIv78E5m67PzApO42S9.OpF1ij/QZlcDgweGFQkvJ../CCz5oVu', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1079, '589356', '589356', '$2y$10$Gyrb29BXiAvCni7EVq.li.vSHrcX7uMEJsuApP82dj34eKqLuEJx6', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1080, '354238', '354238', '$2y$10$Fr.vN/1qPyWkB7Ji/etcwOS57TNCP3quIMG/zLfqscwX.mXPtkxPC', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1081, '381514', '381514', '$2y$10$qJKgv.GZ8cdrpPNkaQRTIuuh4IxsXPnJrsF1KnllWpyc3ZfA56mjy', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1082, '966503', '966503', '$2y$10$N8lQNgsXSO9HvitwWWFvjewSAyodycOuAfl2tVnCNB5cAHkiah8OW', '', 'docent', NULL, '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1083, '875167', '875167', '$2y$10$cS9ExDkNUeWQgdmy/rkSueFpCGjjG6mVjnaq7qtPA9iMScnELUEsS', '', 'leerling', 'A', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1084, '437252', '437252', '$2y$10$kYSaPWI/i6fdwKXqDt8XmuLuQTevA/bF8X7Xku1JL.YsDpwa8SD62', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1085, '955330', '955330', '$2y$10$zUtsydxSrtuFbEEFf2Bm/eqV2RUUF5oCnyvIKA6zBCz5icDab5pO.', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1086, '109970', '109970', '$2y$10$sV4aRaNYznk6dTL2x9vhpu3qb.75SciJKmZfuPGx3sRq77lL5y9Ey', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1087, '681154', '681154', '$2y$10$ELPTG8truyhACYqVxzbjQ.is6EQpIxN/tsQdH7flscuGu64JdbnO6', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1088, '598488', '598488', '$2y$10$kwhO9coIHiBVCdkJAWxcpeNZtL12.T3nbI2Rh7oKKZb8Dj6PkUMe.', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1089, '858978', '858978', '$2y$10$v9ozK5yCevox176xGJhnu./5LTXczm.gktu/Sw2AN3eTcLobQeLYK', '', 'docent', NULL, '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1090, '666845', '666845', '$2y$10$qFZhfnUHzvxrT2tDV6eQEOencIpQvIGMBVPKv.wY2PDtniJLrd0bq', '', 'leerling', 'A', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1091, '728906', '728906', '$2y$10$89G4vKyu/SzWEBBA5EKnb.7eqn0Sdl652gBRo0xQ0uqT.1vXHa6N6', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1092, '496441', '496441', '$2y$10$XL5l9xVoFPa/GFgjgB4BDewQWJiMw9Xug57/vNdQAIZfaQA1SxJfa', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1093, '889704', '889704', '$2y$10$nNiN6Fw8lcKL2qsJIByRZ.mL9yGLQblspSSLX3vEsAghRalZFAGQ6', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1094, '614419', '614419', '$2y$10$1Xnt0DyvAqL.ztk1JUyvf.fAMB3ODO2BD10qwCrsr65kOMbPlzK.W', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1095, '466248', '466248', '$2y$10$65C0NV1.RK2GM1YhWk99IuB9S8JGyaWWUeEuki.3o6DkNIGWn9AuG', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1096, '716875', '716875', '$2y$10$2..MPTELOjH28tRE4psG4.pVgLfsxxKyjaCfJisbn1iuLJyh8Pq1W', '', 'docent', NULL, '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1097, '507645', '507645', '$2y$10$fblqh.n.bo.ydbHZBgj.we/DEHf2rz3jM35a89E/1b7ztv3JrE71C', '', 'leerling', 'A', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1098, '875387', '875387', '$2y$10$PaVzrlFSsRLi.osw9LyhN.xE7GE4exrW1iElljd.LSbvstSrppNrm', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1099, '535914', '535914', '$2y$10$GGRHj999SMSlQmLN3HNpPegfI7IGP1oX04FZCjp5p3w10CvV.h6w.', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1100, '628166', '628166', '$2y$10$sSEEvL4H7MJywrum2dG/6.majlMgjgPOg8V9zQ/qT8TmuM9/uiQRq', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1101, '495187', '495187', '$2y$10$XylAjoDHE1w9xv26WmpOo.KCwCI60YAeYAv7mdmRSbtZqs95waADS', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1102, '033916', '033916', '$2y$10$8GyyeJo5XVcSPMAalURC.e7QK31NWp.DiXNYoEwnUfNMg9JdArdHO', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1103, '677558', '677558', '$2y$10$uggCP4Kp3euOn2DIaZxoYOAoMwm0ZllyDh6TY2JlO8cDcKV8RsSM2', '', 'docent', NULL, '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1104, '867261', '867261', '$2y$10$Zf90a8CmxYpCUEACJgg6H.Y3NJz.iiQGD4Sj4XpuznCq7dneKCmx6', '', 'leerling', 'A', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1105, '202340', '202340', '$2y$10$0AgNc0yzbuhPP8Y3w3JiROM8tXFIcX0jENER03WmhXm8F0TXvcHNa', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1106, '330515', '330515', '$2y$10$L1NIVGjTH6Thz4SQeoDmqOXrsoWlL8nPrA8p.dsGu0X5pQDrhEu7W', '', 'leerling', 'B', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1107, '395561', '395561', '$2y$10$3fKaY5pk1hhYmZ/FHUoSVuFvW/2GO/BY2HnXJ7xpRgKhgQzlbAKkG', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1108, '957410', '957410', '$2y$10$ls15jrePdlwmf8GIa2SvfewgNVc1f3qsiASHn5/mypP436vlgD9mS', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL),
(1109, '093322', '093322', '$2y$10$rUgJZx87Py.5/7WOWMBwc.UfpQNHOi2xagQyKO6aZc0rX.o.UmQpK', '', 'leerling', 'C', '2019-01-21', '2020-01-21', NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexen voor tabel `theorie`
--
ALTER TABLE `theorie`
  ADD PRIMARY KEY (`theory_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `theorie`
--
ALTER TABLE `theorie`
  MODIFY `theory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
