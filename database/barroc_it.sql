/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : barroc_it

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2014-11-12 23:59:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for afspraken
-- ----------------------------
DROP TABLE IF EXISTS `afspraken`;
CREATE TABLE `afspraken` (
  `afspraken_id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `klant_nr` text NOT NULL,
  `naam` varchar(60) NOT NULL,
  `tijd` time NOT NULL,
  `plaats` varchar(60) NOT NULL,
  `opmerkingen` varchar(255) NOT NULL,
  PRIMARY KEY (`afspraken_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afspraken
-- ----------------------------
INSERT INTO `afspraken` VALUES ('1', '2014-12-31', '', 'sdfsdf', '02:01:00', 'sdfds', 'fdsf');
INSERT INTO `afspraken` VALUES ('2', '2014-10-21', '22', 'dfsg', '03:04:00', 'fdsf', 'sdf');
INSERT INTO `afspraken` VALUES ('3', '2014-10-07', '1', 'sdfdsfdsf', '04:45:00', 'dfgfd', 'gdf');
INSERT INTO `afspraken` VALUES ('4', '5435-03-04', '1', 'fdgdsg', '05:46:00', 'fghsfg', 'gfh');

-- ----------------------------
-- Table structure for factuur
-- ----------------------------
DROP TABLE IF EXISTS `factuur`;
CREATE TABLE `factuur` (
  `factuur_nr` int(255) NOT NULL AUTO_INCREMENT,
  `klant_nr` int(255) NOT NULL DEFAULT '0',
  `bedrag` int(255) NOT NULL DEFAULT '0',
  `project_nr` int(255) NOT NULL DEFAULT '0',
  `btw` int(11) NOT NULL DEFAULT '0',
  `factuur_duur` date NOT NULL DEFAULT '0000-00-00',
  `hoeveelheid` varchar(60) NOT NULL DEFAULT '0',
  `beschrijving` varchar(60) NOT NULL DEFAULT '0',
  `aantal` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `factuur_tot` varchar(255) DEFAULT '0',
  `factuur_begin` varchar(255) DEFAULT '0',
  PRIMARY KEY (`factuur_nr`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of factuur
-- ----------------------------
INSERT INTO `factuur` VALUES ('3', '1', '0', '0', '0', '0000-00-00', 'sdfsdf', 'fsdf', '0', '0', '1215262432', '1415262432');
INSERT INTO `factuur` VALUES ('9', '1', '33333333', '4', '0', '0000-00-00', '33', '3fdgfdg', '0', '1', '1418412388', '1415820388');
INSERT INTO `factuur` VALUES ('10', '1', '87987987', '8989', '0', '0000-00-00', '879879', 'kjlkj', '0', '0', '1418412476', '1415820476');

-- ----------------------------
-- Table structure for gebruikers
-- ----------------------------
DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE `gebruikers` (
  `gebruikers_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gebruikersrol` int(4) NOT NULL,
  `actief` tinyint(1) NOT NULL,
  PRIMARY KEY (`gebruikers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gebruikers
-- ----------------------------
INSERT INTO `gebruikers` VALUES ('3', 'finance', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1', '1');
INSERT INTO `gebruikers` VALUES ('4', 'development', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', '1');
INSERT INTO `gebruikers` VALUES ('5', 'Sales', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '3', '1');
INSERT INTO `gebruikers` VALUES ('6', 'Admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '4', '1');

-- ----------------------------
-- Table structure for klantgegevens
-- ----------------------------
DROP TABLE IF EXISTS `klantgegevens`;
CREATE TABLE `klantgegevens` (
  `klant_nr` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfs_naam` varchar(60) NOT NULL,
  `voorletters` varchar(11) NOT NULL,
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
  `inkomsten` int(11) NOT NULL,
  PRIMARY KEY (`klant_nr`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of klantgegevens
-- ----------------------------
INSERT INTO `klantgegevens` VALUES ('1', 'Parlor', 'M.C.A.W', 'Mitch', 'Walravens', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '', '', '0000-00-00', '0000-00-00', '', '0', '0', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `klantgegevens` VALUES ('22', 'hallo', 'h.f.t', 'Rick', 'Verhijen', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '', '', '0000-00-00', '0000-00-00', '', '0', '0', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for portfolio
-- ----------------------------
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `port_id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikers_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) DEFAULT '0',
  `omschrijving` text,
  `aanv_datum` varchar(100) DEFAULT '0',
  `eind_datum` varchar(100) DEFAULT '0',
  `opmerking` text,
  PRIMARY KEY (`port_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of portfolio
-- ----------------------------
INSERT INTO `portfolio` VALUES ('1', '3', 'lol', 'fdgfdg', '0003-02-23', '0003-02-23', 'fdgfdg');
INSERT INTO `portfolio` VALUES ('2', '3', '0', 'rgfhf', '55', '55', 'hgfh');
INSERT INTO `portfolio` VALUES ('3', '4', 'oooo', 'jgfh', '', '', 'gfjgj');
INSERT INTO `portfolio` VALUES ('4', '4', 'NAW', 'gfdhgf', '', '', 'hfdgh');
INSERT INTO `portfolio` VALUES ('5', '3', 'lllllll', '', '', '', '');
INSERT INTO `portfolio` VALUES ('6', '6', 'Werkgever', 'dfds', '', '', 'fdsfdsf');
INSERT INTO `portfolio` VALUES ('7', '3', 'Opleiding', '', '', '', '');

-- ----------------------------
-- Table structure for projecten
-- ----------------------------
DROP TABLE IF EXISTS `projecten`;
CREATE TABLE `projecten` (
  `projectnr_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_naam` text NOT NULL,
  `onderhoudscontract` tinyint(1) NOT NULL,
  `hardware` varchar(60) NOT NULL,
  `software` varchar(60) NOT NULL,
  `begin_datum` date NOT NULL,
  `eind_datum` date NOT NULL,
  `klant_nr` int(11) NOT NULL,
  `afspraken` int(20) NOT NULL,
  `status_project` tinyint(1) NOT NULL,
  PRIMARY KEY (`projectnr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3240 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of projecten
-- ----------------------------
INSERT INTO `projecten` VALUES ('3238', 'hadofhw', '0', '', '', '2014-10-10', '2014-10-12', '1', '0', '0');
INSERT INTO `projecten` VALUES ('3239', 'dsjfthgfdh', '0', 'dsfgdsgdf', 'dfsgdfgdgh', '0044-04-04', '0004-04-04', '22', '0', '1');

-- ----------------------------
-- Table structure for site_config
-- ----------------------------
DROP TABLE IF EXISTS `site_config`;
CREATE TABLE `site_config` (
  `link` varchar(255) DEFAULT '',
  `rootlink` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of site_config
-- ----------------------------
INSERT INTO `site_config` VALUES ('http://127.0.0.1/BarrocIt/website/app', '/BarrocIt/website/');
