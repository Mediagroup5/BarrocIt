-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 03 nov 2014 om 09:11
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `rio`
--
CREATE DATABASE IF NOT EXISTS `rio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rio`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursist`
--

CREATE TABLE IF NOT EXISTS `cursist` (
  `cursistnr` int(4) NOT NULL DEFAULT '0',
  `naam` varchar(25) DEFAULT NULL,
  `roepnaam` varchar(25) DEFAULT NULL,
  `straat` varchar(25) DEFAULT NULL,
  `postcode` varchar(7) DEFAULT NULL,
  `plaats` varchar(25) DEFAULT NULL,
  `geslacht` varchar(1) DEFAULT NULL,
  `geb_datum` date DEFAULT NULL,
  PRIMARY KEY (`cursistnr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `cursist`
--

INSERT INTO `cursist` (`cursistnr`, `naam`, `roepnaam`, `straat`, `postcode`, `plaats`, `geslacht`, `geb_datum`) VALUES
(2, 'KRIMPEN', 'TANJA', 'TILBURGSEWEG 2', '4222 BB', 'GOIRLE', 'V', '1980-02-08'),
(14, 'NORBART', 'NIELS', 'GERSHOF 8', '4841 PL', 'BREDA', 'M', '1957-12-06'),
(64, 'BROEKEN', 'BRAM', 'DRIMMELSEWEG 8', '4395 XX', 'MADE', 'M', '1978-03-24'),
(88, 'VOS', 'HENK', 'BESBEEMD 64', '4142 CE', 'OOSTERHOUT', 'M', '1969-09-22');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursus`
--

CREATE TABLE IF NOT EXISTS `cursus` (
  `curs_code` varchar(8) NOT NULL DEFAULT '',
  `curs_plts` varchar(25) DEFAULT NULL,
  `curs_dat` date DEFAULT NULL,
  `omschrijving` varchar(37) DEFAULT NULL,
  `doc_code` varchar(2) DEFAULT NULL,
  `curs_prijs` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`curs_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `cursus`
--

INSERT INTO `cursus` (`curs_code`, `curs_plts`, `curs_dat`, `omschrijving`, `doc_code`, `curs_prijs`) VALUES
('C#', 'MADE', '1997-11-27', 'PROGRAMMEREN IN C#', 'MO', '1450.00'),
('Excel', 'ETTEN', '1997-12-11', 'Introductie werken met Excel', 'HM', '3600.00'),
('Gegevens', 'BREDA', '1997-12-06', 'Normaliseren Codd', 'MO', '3000.00'),
('Internet', 'MADE', '1997-11-13', 'Intro Internet', 'PE', '2400.00'),
('Isac', 'BREDA', '1997-11-20', 'Systeemontwikkeling ISAC', 'GR', '1450.00'),
('Niam', 'BREDA', '1997-11-20', 'Systeemontwikkeling NIAM', 'WI', '850.00'),
('Powerpoi', 'BREDA', '1997-11-13', 'Introductie Powerpoint', 'GR', '2600.00'),
('Word', 'BREDA', '1997-12-04', 'Tekstverwerking met Word', 'WI', '3300.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `c_regel`
--

CREATE TABLE IF NOT EXISTS `c_regel` (
  `curs_code` varchar(8) NOT NULL DEFAULT '',
  `cursistnr` int(4) NOT NULL DEFAULT '0',
  `cijfer` int(2) DEFAULT NULL,
  `betaald` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`curs_code`,`cursistnr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `c_regel`
--

INSERT INTO `c_regel` (`curs_code`, `cursistnr`, `cijfer`, `betaald`) VALUES
('C#', 2, 7, '1450.00'),
('C#', 14, 7, '1000.00'),
('Gegevens', 14, 8, '3000.00'),
('Internet', 2, 9, NULL),
('Internet', 14, 5, '2400.00'),
('Internet', 88, 7, '2000.00'),
('Isac', 14, 6, '1450.00'),
('Isac', 64, 7, '1450.00'),
('Isac', 88, 5, '1450.00'),
('Niam', 2, 4, '850.00'),
('Niam', 88, 6, '850.00'),
('Powerpoi', 14, 6, '3600.00'),
('Word', 2, 6, NULL),
('Word', 64, 8, '3300.00'),
('Word', 88, 9, '3300.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docent`
--

CREATE TABLE IF NOT EXISTS `docent` (
  `doc_code` varchar(2) NOT NULL DEFAULT '',
  `doc_naam` varchar(25) DEFAULT NULL,
  `straat` varchar(25) DEFAULT NULL,
  `postcode` varchar(7) DEFAULT NULL,
  `plaats` varchar(25) DEFAULT NULL,
  `telefoon` varchar(12) DEFAULT NULL,
  `uurloon` decimal(6,2) DEFAULT NULL,
  `geb_datum` date DEFAULT NULL,
  PRIMARY KEY (`doc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `docent`
--

INSERT INTO `docent` (`doc_code`, `doc_naam`, `straat`, `postcode`, `plaats`, `telefoon`, `uurloon`, `geb_datum`) VALUES
('GR', 'GROND', 'BOLWERK 10', '4541 CC', 'TILBURG', '013-426786', '150.00', '1968-10-25'),
('HM', 'HOOYMAYERS', 'IGNATIUSSTRAAT 6', '4847 EZ', 'BREDA', '076-442786', '200.00', '1962-09-01'),
('MO', 'MOL', 'WATERSSTRAAT 8', '4841 KA', 'BREDA', '076-227788', '300.00', '1958-11-30'),
('PE', 'PETERS', 'BREEDONK 64', '4142 EC', 'OOSTERHOUT', '01620-3429', '185.50', '1973-10-08'),
('SE', 'SENGERS', 'BREDASEWEG 2', '4344 DE', 'BAVEL', NULL, '110.00', '1965-05-17'),
('WI', 'WITLOX', 'MADESEWEG 8', '4841 PT', 'OOSTERHOUT', '01620-12378', '100.00', '1967-04-25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
