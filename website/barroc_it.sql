-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 28 okt 2014 om 13:17
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
-- Tabelstructuur voor tabel `reacties`
--

CREATE TABLE IF NOT EXISTS `reacties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` text NOT NULL,
  `datum` date NOT NULL,
  `reactie` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `reacties`
--

INSERT INTO `reacties` (`id`, `naam`, `datum`, `reactie`) VALUES
(1, 'persoon', '2014-10-15', 'eerste reactie'),
(2, 'mens', '2014-10-22', 'even testen enzo'),
(3, 'tets', '2014-10-15', 'test'),
(4, 'Dean', '2014-10-03', 'maakt niet uit'),
(6, 'ijsthee', '2014-10-10', 'is best lekker');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
