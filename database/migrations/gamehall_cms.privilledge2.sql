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
	(1,0,'glyphicon glyphicon-user','超级管理员','超级管理员',0,1),
	(2,0,'glyphicon glyphicon-usd','充值','account.paylist',0,2),
	(25,0,'glyphicon glyphicon-th-large','商城配置','mall.getGoods',0,25),
	(26,0,'FE','分布下载','分布下载',0,67),
	(27,0,'FE','用户信息查询','用户信息查询',0,55),
	(28,0,'FE','超级管理员','超级管理员',0,12),
	(29,0,'glyphicon glyphicon-heart','锦标赛配置','锦标赛配置',0,32),
	(30,29,'1','牌局日志查询','playlog.index',0,10000),
	(31,29,'2','用户资产统计','stats.money',0,10000),
	(32,29,'4','每日活跃统计','stats.loginlog',0,10000),
	(33,29,'8','发放消耗统计','stats.moneylog',0,10000),
	(34,29,'16','首充用户统计','stats.firstbuy',0,10000),
	(35,29,'32','二维码下载页面统计','stats.dlpgclick',0,10000),
	(36,29,'64','导出模块','stats.exports',0,10000),
	(37,29,'128','[牌局日志查询]详情','playlog.detail',1,10000),
	(38,0,'1','道具管理','',0,10000),
	(39,38,'1','道具管理','props.show',0,10000),
	(40,0,'1','商品&支付管理','',0,10000),
	(41,40,'1','商品列表','mall.list',0,10000),
	(42,40,'2','新增商品','mall.add',0,10000),
	(43,40,'4','物品类型','mall.showtype',0,10000),
	(44,40,'8','支付辅助功能','mall.helper',0,10000),
	(45,40,'16','破产商品配置','mall.broken_goods',0,10000),
	(46,40,'32','商品&支付杂项配置','mall.misc',0,10000),
	(47,40,'64','快捷支付金额配置','mall.fastpay',0,10000),
	(48,40,'128','VIP特权配置','mall.privilege',0,10000),
	(49,0,'1','订单管理','',0,10000),
	(50,49,'1','订单查询','payment.index',0,10000),
	(51,49,'2','订单汇总','payment.stat',0,10000),
	(52,49,'4','钻石商城兑换信息查询','diamond.order',0,10000),
	(53,0,'1','任务管理','',0,10000),
	(54,53,'1','任务动作','mission.action',0,10000),
	(55,53,'2','主任务管理','mission.mission',0,10000),
	(56,53,'4','[主任务管理]子任务管理','mission.missionsub',1,10000),
	(57,53,'8','[主任务管理]任务奖励管理','mission.missionprize',1,10000),
	(58,0,'1','游戏配置','',0,10000),
	(59,58,'1','登录奖励','award.dailyconfig',0,10000),
	(60,58,'2','房间列表','table.getTables',0,10000),
	(61,58,'4','渠道列表','mall.getChannels',0,10000),
	(62,58,'8','快速选房','table.getQuickTables',0,10000),
	(63,58,'16','商城配置','mall.getGoods',0,10000),
	(64,0,'1','钻石配置与统计','',0,10000),
	(432,1,'glyphicon glyphicon-picture','用户列表','/index.php/admin/getList',0,44),
	(433,1,'glyphicon glyphicon-picture','角色管理','/index.php/admin/getrole',0,55),
	(434,1,'glyphicon glyphicon-picture','菜单管理','/index.php/admin/getprivilledge',0,12);

/*!40000 ALTER TABLE `privilledge2` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
