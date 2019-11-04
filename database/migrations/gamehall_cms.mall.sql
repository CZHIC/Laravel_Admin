# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 8.0.17)
# Database: gamehall_cms
# Generation Time: 2019-11-04 09:23:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table mall
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mall`;

CREATE TABLE `mall` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '渠道id',
  `gname` varchar(100) DEFAULT '' COMMENT '商品名称',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0金币1一花币2道具',
  `num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '底注',
  `ptype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0金币1一花币2道具3人民币',
  `price` float unsigned NOT NULL DEFAULT '0' COMMENT '价钱',
  `addtype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '赠送类型0金币1一花币2道具100无',
  `addnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '赠送数量',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0正常1禁用   2:：新人折扣  3: 每周特卖',
  `mcard` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否月卡 0否1是',
  `siteno` varchar(50) NOT NULL DEFAULT '' COMMENT '平台的商品编号',
  `bestvalue` varchar(50) DEFAULT '' COMMENT '提示语',
  `pic` varchar(250) DEFAULT '',
  `propid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '道具Id   对应cms.props表',
  `isdouble` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '买一送一  0 否  1是',
  `newpic` varchar(250) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

LOCK TABLES `mall` WRITE;
/*!40000 ALTER TABLE `mall` DISABLE KEYS */;

INSERT INTO `mall` (`id`, `appid`, `gname`, `type`, `num`, `ptype`, `price`, `addtype`, `addnum`, `status`, `mcard`, `siteno`, `bestvalue`, `pic`, `propid`, `isdouble`, `newpic`)
VALUES
	(710,1142,'6一花币',1,6,3,6,100,0,0,0,'yiihua6','','',0,0,''),
	(711,1142,'18一花币',1,18,3,18,100,0,0,0,'yiihua18','','',0,0,''),
	(712,1142,'68一花币',1,68,3,68,100,0,0,0,'yiihua68','','',0,0,''),
	(713,1142,'128一花币',1,128,3,128,100,0,0,0,'yiihua128','','',0,0,''),
	(714,1142,'328一花币',1,328,3,328,100,0,0,0,'yiihua328','','',0,0,''),
	(715,1142,'648一花币',1,648,3,648,100,0,0,0,'yiihua648','','',0,0,'');

/*!40000 ALTER TABLE `mall` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
