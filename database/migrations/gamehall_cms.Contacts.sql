# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: gamehall_cms
# Generation Time: 2019-07-24 06:32:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Contacts`;

CREATE TABLE `Contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID  自动增长',
  `name` varchar(50) DEFAULT '',
  `address` varchar(200) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `qq` varchar(50) DEFAULT '',
  `phone` bigint(20) DEFAULT '0',
  `job` varchar(30) DEFAULT '',
  `img` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='联系人列表';

LOCK TABLES `Contacts` WRITE;
/*!40000 ALTER TABLE `Contacts` DISABLE KEYS */;

INSERT INTO `Contacts` (`id`, `name`, `address`, `email`, `qq`, `phone`, `job`, `img`)
VALUES
	(1,'CZC','中华人民共和国','123@qq.com','432213',18771567180,'码农','assets/img/a9.jpg'),
	(437,'CZC','中华人民共和国','123@qq.com','432213',18771567180,'码农','assets/img/p1.jpg'),
	(438,'CZC','中华人民共和国','123@qq.com','432213',18771567180,'码农','assets/img/p2.jpg'),
	(439,'CZC','中华人民共和国','123@qq.com','432213',18771567180,'码农','assets/img/p3.jpg');

/*!40000 ALTER TABLE `Contacts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
