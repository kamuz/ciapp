

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `links` (
  `link_id` varchar(255) NOT NULL DEFAULT '',
  `descr` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `clicks` int(11) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `links` (`link_id`, `descr`, `url`, `clicks`) VALUES
('codeigniter', 'Codeigniter', 'http://codeigniter.com/', 0),
('drupal', 'Drupal', 'http://drupal.org/', 3),
('google', 'Google', 'http://google.com.ua/', 0),
('jquery', 'jQuery', 'http://jquery.org/', 10),
('microsoft', 'Microsoft', 'http://microsoft.com/', 0),
('modx', 'MODx', 'http://modx.com/', 4),
('mysql', 'MySQL', 'http://mysql.com/', 28),
('php', 'PHP', 'http://php.net/', 0),
('yandex', 'Yandex', 'http://yandex.ru/', 17);


CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `date` int(11) DEFAULT NULL,
  `showed` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `pages` (`page_id`, `title`, `text`, `date`, `showed`) VALUES
('about', 'О нас', 'что мы из себя представляем', 1343491954, 1),
('blog', 'Блог', 'свежие новости из мира веб', 1343488157, 1),
('contacts', 'Контакты', 'как можно связаться с нами', 1343287863, 1),
('courses', 'Курсы', 'это страница с курсами', 1343491039, 0),
('index', 'Главная', '<p>Добро пожаловать на наш сайт, дорогой товарищ!</p>', 1343602402, 1),
('projects', 'Проекты', 'здесь планируються разместиться проекты', 1343287877, 1),
('services', 'Услуги', 'что мы предлагаем', 1343487699, 1);


CREATE TABLE IF NOT EXISTS `settings` (
  `param` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`param`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `settings` (`param`, `value`) VALUES
('admin_login', 'login'),
('admin_pass', 'pass'),
('per_page', '5');


