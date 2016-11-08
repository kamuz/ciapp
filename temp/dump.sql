/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2015-02-11 15:22:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `links`
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `link_id` varchar(255) NOT NULL DEFAULT '',
  `descr` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `clicks` int(11) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES ('codeigniter', 'Codeigniter', 'http://codeigniter.com/', '0');
INSERT INTO `links` VALUES ('drupal', 'Drupal', 'http://drupal.org/', '3');
INSERT INTO `links` VALUES ('google', 'Google', 'http://google.com.ua/', '0');
INSERT INTO `links` VALUES ('jquery', 'jQuery', 'http://jquery.org/', '10');
INSERT INTO `links` VALUES ('microsoft', 'Microsoft', 'http://microsoft.com/', '0');
INSERT INTO `links` VALUES ('modx', 'MODx', 'http://modx.com/', '4');
INSERT INTO `links` VALUES ('mysql', 'MySQL', 'http://mysql.com/', '28');
INSERT INTO `links` VALUES ('php', 'PHP', 'http://php.net/', '0');
INSERT INTO `links` VALUES ('yandex', 'Yandex', 'http://yandex.ru/', '17');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `page_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `date` int(11) DEFAULT NULL,
  `showed` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('about', 'О нас', 'что мы из себя представляем', '1343491954', '1');
INSERT INTO `pages` VALUES ('blog', 'Блог', 'свежие новости из мира веб', '1343488157', '1');
INSERT INTO `pages` VALUES ('contacts', 'Контакты', 'как можно связаться с нами', '1343287863', '1');
INSERT INTO `pages` VALUES ('courses', 'Курсы', 'это страница с курсами', '1343491039', '0');
INSERT INTO `pages` VALUES ('index', 'Главная', '<p>Добро пожаловать на наш сайт, дорогой товарищ!</p>', '1343602402', '1');
INSERT INTO `pages` VALUES ('projects', 'Проекты', 'здесь планируються разместиться проекты', '1343287877', '1');
INSERT INTO `pages` VALUES ('services', 'Услуги', 'что мы предлагаем', '1343487699', '1');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `param` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`param`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('admin_login', 'admin');
INSERT INTO `settings` VALUES ('admin_pass', '021183');
INSERT INTO `settings` VALUES ('per_page', '5');
