# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: gamehall_cms
# Generation Time: 2019-06-25 11:39:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table channel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `channel`;

CREATE TABLE `channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `text` varchar(200) DEFAULT '' COMMENT '渠道名',
  `GameDesc` varchar(100) NOT NULL DEFAULT '0' COMMENT '游戏说明',
  `textID` varchar(200) DEFAULT NULL COMMENT '描述',
  `phonetype` tinyint(4) DEFAULT '0' COMMENT '手机分类',
  `GameMain` tinyint(4) DEFAULT '0' COMMENT '主游戏',
  `cptType` int(4) DEFAULT '0' COMMENT '联运商编号',
  UNIQUE KEY `primery_key` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='渠道表';

LOCK TABLES `channel` WRITE;
/*!40000 ALTER TABLE `channel` DISABLE KEYS */;

INSERT INTO `channel` (`id`, `text`, `GameDesc`, `textID`, `phonetype`, `GameMain`, `cptType`)
VALUES
	(1142,'主播德州','1','主播德州(1142)',2,1,1),
	(1137,'皇家德州扑克','1','皇家德州扑克(1137)',2,1,1),
	(1140,'澳门德州扑克','1','澳门德州扑克(1140)',2,1,1),
	(11016,'华为_016','3',NULL,1,3,0),
	(2044,'2044','1',NULL,1,1,0),
	(14009,'德州小游戏','1',NULL,4,1,0),
	(20001,'fb-繁体','1',NULL,4,1,0),
	(2837,'爱贝白包','1',NULL,1,1,0),
	(20000,'fb-繁体包','1',NULL,4,1,0),
	(23000,'日服包-ios','1','日服包(23000)',2,1,-1),
	(23300,'日服包-安卓','1',NULL,1,1,0),
	(15002,'h5斗地主华为','3',NULL,4,3,0),
	(15001,'h5都地址小程序','3',NULL,4,3,0),
	(11111111,'','3',NULL,4,3,0),
	(15003,'h5欢乐斗地主手机版','3',NULL,4,3,0),
	(10009,'斗地主09','3',NULL,2,3,0),
	(11201,'ios- 德州提审','1','ios- 德州提审(11201)',2,1,1),
	(40001,'泰语测试','1','(40001)',4,1,-1),
	(40002,'ios泰语德州测试','1',NULL,2,1,0),
	(20008,'德州撲克大師','1','德州撲克大師(20008)',2,1,-1),
	(40006,'ios马甲包','1',NULL,2,1,0),
	(11014,'金立','3',NULL,1,3,0),
	(30001,'英语测试','1',NULL,4,1,0),
	(30000,'英语h5','1',NULL,4,1,0),
	(50008,'ios（英语）','1',NULL,2,1,0);

/*!40000 ALTER TABLE `channel` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
