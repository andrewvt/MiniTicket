/*
 Navicat MySQL Data Transfer

 Source Server         : Local
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : ticket

 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 06/14/2013 06:21:39 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ticket`
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `associated_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` text,
  `message` text,
  `status` varchar(100) NOT NULL DEFAULT 'open',
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `session` text,
  `time_spent` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `ticket`
-- ----------------------------
BEGIN;
INSERT INTO `ticket` VALUES ('1', '1', '1', 'Luke', 'Skywalker', 'luke.skywalker@gmail.com', 'Test Ticket', 'Test text for a ticket', 'open', '0', '2013-06-13 20:51:35', '2013-06-13 20:51:39', null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `ticket_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ticket_comment`;
CREATE TABLE `ticket_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` text,
  `created_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `ticket_comment`
-- ----------------------------
BEGIN;
INSERT INTO `ticket_comment` VALUES ('1', '1', '1', 'Han', 'Solo', 'han.solo@gmail.com', 'This is a comment', '2013-06-13 22:57:41', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
