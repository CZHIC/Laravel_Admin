# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: gamehall_cms
# Generation Time: 2019-06-25 11:39:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table privilledge2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `privilledge2`;

CREATE TABLE `privilledge2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID  自动增长',
  `pid` int(10) DEFAULT NULL COMMENT '父id',
  `menuVal` varchar(50) DEFAULT NULL COMMENT '菜单icon  bootstrat',
  `menuName` varchar(30) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `menuUrl` varchar(100) NOT NULL DEFAULT '' COMMENT '菜单链接',
  `isshow` tinyint(3) NOT NULL DEFAULT '0' COMMENT '菜单是否显示：0-显示  1-不显示',
  `sort` int(10) unsigned DEFAULT '10000' COMMENT '排序（主菜单有用）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

LOCK TABLES `privilledge2` WRITE;
/*!40000 ALTER TABLE `privilledge2` DISABLE KEYS */;
INSERT INTO `privilledge2` (`id`, `pid`, `menuVal`, `menuName`, `menuUrl`, `isshow`, `sort`)
VALUES
	(1, 0, 'glyphicon glyphicon-home', '超级管理员', '超级管理员', 0, 1),
	(2, 0, 'glyphicon glyphicon-search', '小工具', '小工具', 0, 2),
	(3, 0, 'glyphicon glyphicon-user', '用户管理', '用户管理', 0, 3),
	(4, 0, 'glyphicon glyphicon-pencil', '游戏配置', '游戏配置', 0, 4),
	(5, 0, 'glyphicon glyphicon-cloud', '统计', '统计', 0, 5),
	(6, 1, 'glyphicon glyphicon-user', '渠道管理', '/admin/getChannel', 0, 1000),
	(7, 1, 'glyphicon glyphicon-user', '用户管理', '/admin/getList', 0, 1000),
	(8, 1, 'glyphicon glyphicon-user', '角色管理', '/admin/getrole', 0, 1000),
	(9, 2, 'glyphicon glyphicon-user', '编辑器', '/tools/banji', 0, 1000),
	(10, 2, 'glyphicon glyphicon-user', '小控件', '/tools/build', 0, 1000),
	(11, 2, 'glyphicon glyphicon-user', 'Markdown', '/tools/markdown', 0, 1000),
	(12, 1, 'glyphicon glyphicon-user', '菜单管理', '/admin/getprivilledge', 0, 1000),
	(13, 2, 'glyphicon glyphicon-user', '上传文件', '/tools/uploadfile', 0, 1000),
	(14, 2, 'glyphicon glyphicon-user', '日历', '/tools/date', 0, 1000),
	(15, 2, 'glyphicon glyphicon-user', '日期控件', '/tools/laydate', 0, 1000),
	(16, 2, 'glyphicon glyphicon-user', '图片', '/tools/image', 0, 1000),
	(17, 3, 'glyphicon glyphicon-user', '用户信息', '/user/info', 0, 1000),
	(18, 4, 'glyphicon glyphicon-user', '商品配置', '/config/goods', 0, 1000),
	(19, 5, 'glyphicon glyphicon-user', '注册统计', '/stat/register', 0, 1000);



/*!40000 ALTER TABLE `privilledge2` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
