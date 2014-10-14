-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Gegenereerd op: 14 okt 2014 om 14:52
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
  `factuur_duur` date NOT NULL,
  `hoeveelheid` varchar(60) NOT NULL,
  `beschrijving` varchar(60) NOT NULL,
  `aantal` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`factuur_nr`, `klant_nr`, `bedrag`, `project_nr`, `btw`, `factuur_duur`, `hoeveelheid`, `beschrijving`, `aantal`, `status`) VALUES
(1, 1, 200, 2, 21, '2014-10-15', '', 'applicatie', 1, 0),
(2, 1, 200, 2, 21, '2014-10-15', '2', 'hallo', 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikers_id`, `username`, `password`, `gebruikersrol`, `actief`) VALUES
(3, 'hallo', '123', 1, 0),
(4, 'mitchwalravens2', '123', 2, 1);

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
  `amount` varchar(60) NOT NULL,
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
  `bkr` int(11) NOT NULL,
  `activated_facturen` int(11) NOT NULL,
  `deactivated_facturen` int(11) NOT NULL,
  `aantal_facturen` int(255) NOT NULL,
  `omzetbedrag` int(255) NOT NULL,
  `limiet` int(255) NOT NULL,
  `grootboekrekeningnummer` int(255) NOT NULL,
  `btw_code` int(255) NOT NULL,
  `inkomsten` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden geëxporteerd voor tabel `klantgegevens`
--

INSERT INTO `klantgegevens` (`klant_nr`, `bedrijfs_naam`, `voorletter`, `voornaam`, `achternaam`, `adres`, `adres2`, `postcode`, `postcode2`, `residentie`, `residentie2`, `woonplaats`, `telefoon_nr`, `telefoonnummer2`, `fax_nr`, `email`, `offer_numbers`, `amount`, `offer_status`, `prospect`, `date_action`, `last_contact_date`, `next_action`, `sale_percentage`, `creditworthy`, `maintenance_contract`, `open_projects`, `applications`, `hardware`, `software`, `appointments`, `internal_contact_person`, `bankrekeningnummer`, `crediet`, `saldo`, `bkr`, `activated_facturen`, `deactivated_facturen`, `aantal_facturen`, `omzetbedrag`, `limiet`, `grootboekrekeningnummer`, `btw_code`, `inkomsten`) VALUES
(1, 'Parlor', 'M.C.A.W', 'Mitch', 'Walravens', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '0000-00-00', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'hallo', 'h.f.t', 'Rick', 'Verhijen', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '0000-00-00', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(3238, 'hadofhw', 0, '', '', '2014-10-10', '2014-10-12', 3, 0, 0),
(3239, 'dsjf', 0, '', '', '2014-10-10', '2014-10-11', 5, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_config`
--

CREATE TABLE IF NOT EXISTS `site_config` (
  `link` varchar(255) DEFAULT '',
  `rootlink` varchar(255) DEFAULT '',
`id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `site_config`
--

INSERT INTO `site_config` (`link`, `rootlink`, `id`) VALUES
('http://127.0.0.1/BarrocIt/website/app', '/BarrocIt/website/', 1);

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
-- Indexen voor tabel `site_config`
--
ALTER TABLE `site_config`
 ADD PRIMARY KEY (`id`);

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
MODIFY `factuur_nr` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
MODIFY `gebruikers_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `klantgegevens`
--
ALTER TABLE `klantgegevens`
MODIFY `klant_nr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT voor een tabel `projecten`
--
ALTER TABLE `projecten`
MODIFY `projectnr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3240;
--
-- AUTO_INCREMENT voor een tabel `site_config`
--
ALTER TABLE `site_config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
