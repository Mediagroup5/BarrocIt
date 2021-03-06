-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Gegenereerd op: 10 okt 2014 om 09:47
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `barroc_it`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraken`
--

CREATE TABLE IF NOT EXISTS `afspraken` (
`afspraken_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `klant_nr` text NOT NULL,
  `naam` varchar(60) NOT NULL,
  `tijd` time NOT NULL,
  `plaatst` varchar(60) NOT NULL,
  `opmerkingen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE IF NOT EXISTS `factuur` (
`factuur_nr` int(255) NOT NULL,
  `klant_nr` int(255) NOT NULL,
  `bedrag` int(255) NOT NULL,
  `project_nr` int(255) NOT NULL,
  `btw` int(11) NOT NULL,
  `factuur duur` date NOT NULL,
  `hoeveelheid` varchar(60) NOT NULL,
  `beschrijving` varchar(60) NOT NULL,
  `aantal` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
`gebruikers_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gebruikersrol` int(4) NOT NULL,
  `actief` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikers_id`, `username`, `password`, `gebruikersrol`, `actief`) VALUES
(3, 'hallo', '123', 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klantgegevens`
--

CREATE TABLE IF NOT EXISTS `klantgegevens` (
`klant_nr` int(11) NOT NULL,
  `bedrijfs_naam` varchar(60) NOT NULL,
  `voorletter` varchar(11) NOT NULL,
  `voornaam` varchar(60) NOT NULL,
  `achternaam` varchar(60) NOT NULL,
  `adres` varchar(60) NOT NULL,
  `adres2` varchar(60) NOT NULL,
  `postcode` varchar(60) NOT NULL,
  `postcode2` varchar(60) NOT NULL,
  `residentie` varchar(60) NOT NULL,
  `residentie2` varchar(60) NOT NULL,
  `woonplaats` varchar(60) NOT NULL,
  `telefoon_nr` varchar(60) NOT NULL,
  `telefoonnummer2` varchar(60) NOT NULL,
  `fax_nr` int(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `offer_numbers` int(200) NOT NULL,
  `inkomsten_hoeveelheid` varchar(60) NOT NULL,
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
  `crediet` varchar(20) NOT NULL,
  `saldo` int(255) NOT NULL,
  `aantal_facturen` int(255) NOT NULL,
  `omzetbedrag` int(255) NOT NULL,
  `limiet` int(255) NOT NULL,
  `grootboekrekeningnummer` int(255) NOT NULL,
  `btw_code` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
--

CREATE TABLE IF NOT EXISTS `projecten` (
`projectnr_id` int(11) NOT NULL,
  `project_naam` text NOT NULL,
  `onderhoudscontract` tinyint(1) NOT NULL,
  `hardware` varchar(60) NOT NULL,
  `software` varchar(60) NOT NULL,
  `begin_datum` date NOT NULL,
  `eind_datum` date NOT NULL,
  `klant_nr` int(11) NOT NULL,
  `afspraken` int(20) NOT NULL,
  `status_project` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3240 ;

--
-- Gegevens worden geëxporteerd voor tabel `projecten`
--

INSERT INTO `projecten` (`projectnr_id`, `project_naam`, `onderhoudscontract`, `hardware`, `software`, `begin_datum`, `eind_datum`, `klant_nr`, `afspraken`, `status_project`) VALUES
(3237, 'fhiweo', 0, '', '', '2014-10-10', '2014-10-12', 3, 0, 0),
(3238, 'hadofhw', 0, '', '', '2014-10-10', '2014-10-12', 3, 0, 0),
(3239, 'dsjf', 0, '', '', '2014-10-10', '2014-10-11', 5, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afspraken`
--
ALTER TABLE `afspraken`
 ADD PRIMARY KEY (`afspraken_id`);

--
-- Indexen voor tabel `factuur`
--
ALTER TABLE `factuur`
 ADD PRIMARY KEY (`factuur_nr`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
 ADD PRIMARY KEY (`gebruikers_id`);

--
-- Indexen voor tabel `klantgegevens`
--
ALTER TABLE `klantgegevens`
 ADD PRIMARY KEY (`klant_nr`);

--
-- Indexen voor tabel `projecten`
--
ALTER TABLE `projecten`
 ADD PRIMARY KEY (`projectnr_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afspraken`
--
ALTER TABLE `afspraken`
MODIFY `afspraken_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `factuur`
--
ALTER TABLE `factuur`
MODIFY `factuur_nr` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
MODIFY `gebruikers_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `klantgegevens`
--
ALTER TABLE `klantgegevens`
MODIFY `klant_nr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `projecten`
--
ALTER TABLE `projecten`
MODIFY `projectnr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3240;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
