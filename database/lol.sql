/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : lol

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-10-28 14:57:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_uer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_uer`;
CREATE TABLE `tbl_uer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `blabla` varchar(255) DEFAULT NULL,
  `homo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_uer
-- ----------------------------
INSERT INTO `tbl_uer` VALUES ('1', 'fdgdf', 'gfdg', 'dfgfdg', 'df');
