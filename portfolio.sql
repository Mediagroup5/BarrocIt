/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : barroc_it

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2014-11-12 20:03:29
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of portfolio
-- ----------------------------
INSERT INTO `portfolio` VALUES ('1', '3', '0', 'fdgfdg', '0003-02-23', '0003-02-23', 'fdgfdg');
INSERT INTO `portfolio` VALUES ('2', '3', '0', 'rgfhf', '55', '55', 'hgfh');
