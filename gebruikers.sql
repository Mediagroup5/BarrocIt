/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : barroc_it

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2014-11-12 23:25:42
*/

SET FOREIGN_KEY_CHECKS=0;

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
