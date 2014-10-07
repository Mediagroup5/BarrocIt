-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 07 okt 2014 om 12:02
-- Serverversie: 5.6.12
-- PHP-versie: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `barroc_it`
--
CREATE DATABASE IF NOT EXISTS `barroc_it` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `barroc_it`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraken`
--

CREATE TABLE IF NOT EXISTS `afspraken` (
  `afspraken_id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `contact_persoon` text NOT NULL,
  `klant_nr` text NOT NULL,
  PRIMARY KEY (`afspraken_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE IF NOT EXISTS `factuur` (
  `factuur_nr` int(255) NOT NULL AUTO_INCREMENT,
  `klant_nr` int(255) NOT NULL,
  `datum` date NOT NULL,
  `bedrag` int(255) NOT NULL,
  `project_nr` int(255) NOT NULL,
  PRIMARY KEY (`factuur_nr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikers_id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `gebruikersrol` int(4) NOT NULL,
  PRIMARY KEY (`gebruikers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klantgegevens`
--

CREATE TABLE IF NOT EXISTS `klantgegevens` (
  `klant_nr` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfs_naam` text NOT NULL,
  `voorletter` text NOT NULL,
  `voornaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `adres` text NOT NULL,
  `postcode` text NOT NULL,
  `woonplaats` text NOT NULL,
  `telefoon_nr` int(10) NOT NULL,
  `fax_nr` int(10) NOT NULL,
  `email` text NOT NULL,
  `offer_numbers` int(200) NOT NULL,
  `offer_status` varchar(50) NOT NULL,
  `prospect` text NOT NULL,
  `date_action` date NOT NULL,
  `last_contact_date` date NOT NULL,
  `next_action` varchar(50) NOT NULL,
  `sale_percentage` int(100) NOT NULL,
  `creditworthy` int(255) NOT NULL,
  `maintenance_contract` text NOT NULL,
  `open_projects` varchar(50) NOT NULL,
  `applications` text NOT NULL,
  `hardware` varchar(50) NOT NULL,
  `software` varchar(50) NOT NULL,
  `appointments` varchar(50) NOT NULL,
  `internal_contact_person` varchar(50) NOT NULL,
  `bankrekeningnummer` varchar(50) NOT NULL,
  `saldo` int(255) NOT NULL,
  `aantal_facturen` int(255) NOT NULL,
  `omzetbedrag` int(255) NOT NULL,
  `limiet` int(255) NOT NULL,
  `grootboekrekeningnummer` int(255) NOT NULL,
  `btw_code` int(255) NOT NULL,
  PRIMARY KEY (`klant_nr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
--

CREATE TABLE IF NOT EXISTS `projecten` (
  `project_nr` int(11) NOT NULL AUTO_INCREMENT,
  `project_naam` text NOT NULL,
  `begin_datum` date NOT NULL,
  `eind_datum` date NOT NULL,
  `klant_nr` int(11) NOT NULL,
  PRIMARY KEY (`project_nr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
