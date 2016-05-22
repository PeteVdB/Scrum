-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 22 mei 2016 om 16:12
-- Serverversie: 5.6.21
-- PHP-versie: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `scrum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
`ID` int(11) NOT NULL,
  `CustomerName` varchar(64) DEFAULT NULL,
  `Street` varchar(64) DEFAULT NULL,
  `Number` int(11) NOT NULL,
  `City` varchar(64) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`ID`, `CustomerName`, `Street`, `Number`, `City`, `Email`) VALUES
(1, 'Pieter VDB', 'Veldstraat', 30, 'Buggenhout', 'pieter.vdb@live.be'),
(2, 'Microsoft', '36th St', 112, 'Redmond', 'Business@microsoft.com'),
(3, 'Google', 'Amphitheatre Parkway', 1600, 'Mountain View', 'Google@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personeel`
--

CREATE TABLE IF NOT EXISTS `personeel` (
`ID` int(11) NOT NULL,
  `LastName` varchar(64) DEFAULT NULL,
  `FirstName` varchar(64) DEFAULT NULL,
  `Street` varchar(64) DEFAULT NULL,
  `Number` int(11) NOT NULL,
  `City` varchar(64) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `Role` varchar(64) DEFAULT NULL,
  `Passwd` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `personeel`
--

INSERT INTO `personeel` (`ID`, `LastName`, `FirstName`, `Street`, `Number`, `City`, `Email`, `Role`, `Passwd`) VALUES
(10, 'user', 'test', 'teststreet', 40, 'testcity', 'testuser@scrum.net', 'Developer', ']œhÆÅÓÐ*/ÏTö9“¶'),
(11, 'VdB', 'Pieter', 'Veldstraat 30', 30, 'Buggenhout', 'pieter.vdb@live.be', 'Admin', '!#/)zW¥§C‰JJ€Ã'),
(12, 'Master', 'Test', 'teststreet', 58, 'testcity', 'testmaster@scrum.net', 'Master', 'ë\n—bMÓ¤¦Ó');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`ID` int(11) NOT NULL,
  `ProjectName` varchar(64) DEFAULT NULL,
  `Customer` int(11) DEFAULT NULL,
  `Description` text,
  `CurrentSprint` tinyint(4) DEFAULT '0',
  `SprintEndDate` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `project`
--

INSERT INTO `project` (`ID`, `ProjectName`, `Customer`, `Description`, `CurrentSprint`, `SprintEndDate`) VALUES
(1, 'testProject', 1, 'Test', 0, '2016-05-24 00:00:00'),
(2, 'Sportapp', 2, 'App die sport tracked + gamification', 1, '2016-06-04 20:29:24'),
(5, 'Robot', 3, 'Star wars achtige robot', 1, '2016-06-05 04:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userstory`
--

CREATE TABLE IF NOT EXISTS `userstory` (
`ID` int(11) NOT NULL,
  `Project` int(11) DEFAULT NULL,
  `Priority` tinyint(4) DEFAULT NULL,
  `USDescription` text,
  `Sprint` int(11) DEFAULT NULL,
  `Status` varchar(32) DEFAULT NULL,
  `Developer` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `userstory`
--

INSERT INTO `userstory` (`ID`, `Project`, `Priority`, `USDescription`, `Sprint`, `Status`, `Developer`) VALUES
(1, 1, 1, 'test', 0, 'ToDo', 0),
(2, 1, 2, 'test2', 0, 'ToDo', 0),
(3, 2, 1, 'test3', 0, 'Done', NULL),
(4, 5, 1, 'test4', 0, 'InProgress', NULL),
(5, 1, 1, 'test', 0, 'InProgress', 11),
(6, 2, 1, 'test3', 0, 'InProgress', NULL),
(7, 5, 1, 'test4', 0, 'ToDo', NULL),
(8, 1, 1, 'test4', 0, 'Done', 11),
(9, 1, 1, 'test5', 0, 'Done', 11),
(10, 1, 1, 'test6', 0, 'InProgress', 11),
(11, 1, 1, 'test7', 0, 'InProgress', 11),
(12, 1, 1, 'test9', 0, 'ToDo', NULL),
(13, 1, 1, 'test10', 0, 'ToDo', NULL),
(14, 1, 1, 'test11', 0, 'ToDo', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `personeel`
--
ALTER TABLE `personeel`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `userstory`
--
ALTER TABLE `userstory`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `personeel`
--
ALTER TABLE `personeel`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT voor een tabel `project`
--
ALTER TABLE `project`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `userstory`
--
ALTER TABLE `userstory`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
