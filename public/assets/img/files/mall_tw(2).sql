-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-05-27 02:46:11
-- 服务器版本： 5.6.34-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamehall_cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `mall_tw`
--

CREATE TABLE `mall_tw` (
  `id` int(10) UNSIGNED NOT NULL,
  `appid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '渠道id',
  `gname` varchar(100) DEFAULT '' COMMENT '商品名称',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0金币1一花币2道具',
  `num` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '底注',
  `ptype` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0金币1一花币2道具3人民币',
  `price` float UNSIGNED NOT NULL DEFAULT '0' COMMENT '价钱',
  `addtype` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '赠送类型0金币1一花币2道具100无',
  `addnum` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '赠送数量',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0正常1禁用',
  `mcard` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否月卡 0否1是',
  `siteno` varchar(50) NOT NULL DEFAULT '' COMMENT '平台的商品编号',
  `bestvalue` varchar(50) DEFAULT '' COMMENT '提示语',
  `pic` varchar(250) DEFAULT '',
  `propid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '道具Id   对应cms.props表',
  `isdouble` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '买一送一  0 否  1是',
  `newpic` varchar(250) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `mall_tw`
--

INSERT INTO `mall_tw` (`id`, `appid`, `gname`, `type`, `num`, `ptype`, `price`, `addtype`, `addnum`, `status`, `mcard`, `siteno`, `bestvalue`, `pic`, `propid`, `isdouble`, `newpic`) VALUES
(1143, 20000, '6Coins', 1, 6, 3, 7.5, 100, 0, 0, 0, 'com.yiihua.texas.lang.tw.hk.yiihua7.5', '', 'https', 0, 0, 'https'),
(1144, 20000, '12Coins', 1, 12, 3, 15, 100, 0, 0, 0, 'com.yiihua.texas.lang.tw.yiihua15', '', 'https', 0, 0, 'https'),
(1145, 20000, '68Coins', 1, 68, 3, 84.75, 100, 0, 0, 0, 'com.yiihua.texas.lang.tw.yiihua84.75', '', 'https', 0, 0, 'https'),
(1146, 20000, '96Coins', 1, 96, 3, 120, 100, 0, 0, 0, 'com.yiihua.texas.lang.tw.yiihua120', '', 'https', 0, 0, 'https'),
(1147, 20000, '328Coins', 1, 328, 3, 410.25, 100, 0, 0, 0, 'com.yiihua.texas.lang.tw.yiihua410.25', '', 'https', 0, 0, 'https'),
(1148, 20000, '612Coins', 1, 648, 3, 810, 100, 0, 0, 0, 'com.yiihua.texas.lang.tw.yiihua810', '', 'https', 0, 0, 'https'),
(1159, 20000, '月卡30元', 0, 900000, 1, 30, 0, 0, 0, 1, '0', '', 'https://gamehallcdn.yiihua.com/webstatic/month-card.png', 0, 0, 'https://gamehallcdn.yiihua.com/webstatic/month-cardnew.png'),
(1210, 20000, '礼包*6', 0, 0, 3, 7.5, 0, 150000, 1, 0, 'com.yiihua.texas.lang.tw.gift7.5', '', '', 0, 0, ''),
(1270, 20000, '德國黑啤', 0, 0, 3, 7.5, 0, 65000, 0, 0, 'com.yiihua.texas.lang.tw.chip7.5', '', 'https://gamehallcdn.yiihua.com/webstatic/cup-2.png', 38, 0, 'https://d2w6fqfjj1on3c.cloudfront.net/lang-tw/goods/chip-1.png'),
(1272, 20000, '威士忌', 0, 0, 3, 22, 0, 200000, 0, 0, 'com.yiihua.texas.lang.tw.chip22', '', 'https://gamehallcdn.yiihua.com/webstatic/cup-3.png', 39, 0, 'https://d2w6fqfjj1on3c.cloudfront.net/lang-tw/goods/chip-2.png'),
(1274, 20000, '薄荷芙萊蓓', 0, 0, 3, 84.75, 0, 860000, 0, 0, 'com.yiihua.texas.lang.tw.chip84.75', '', 'https://gamehallcdn.yiihua.com/webstatic/cup-5.png', 41, 0, 'https://d2w6fqfjj1on3c.cloudfront.net/lang-tw/goods/chip-3.png'),
(1276, 20000, '薇絲帕', 0, 0, 3, 158, 0, 1830000, 0, 0, 'com.yiihua.texas.lang.tw.chip158', '', 'https://gamehallcdn.yiihua.com/webstatic/cup-6.png', 42, 0, 'https://d2w6fqfjj1on3c.cloudfront.net/lang-tw/goods/chip-4.png'),
(1278, 20000, '加州賓治', 0, 0, 3, 410.25, 0, 5100000, 0, 0, 'com.yiihua.texas.lang.tw.chip410.25', '', 'https://gamehallcdn.yiihua.com/webstatic/cup-8.png', 44, 0, 'https://d2w6fqfjj1on3c.cloudfront.net/lang-tw/goods/chip-8.png'),
(1280, 20000, '藍色珊瑚礁', 0, 0, 3, 810, 0, 12000000, 0, 0, 'com.yiihua.texas.lang.tw.chip810', '', 'https://gamehallcdn.yiihua.com/webstatic/cup-9.png', 45, 0, 'https://d2w6fqfjj1on3c.cloudfront.net/lang-tw/goods/chip-7.png'),
(1282, 20000, '德國黑啤', 0, 0, 3, 22, 0, 320000, 2, 0, 'com.yiihua.texas.lang.tw.xinren22', '1.60', 'https://gamehallcdn.yiihua.com/webstatic/cup-2.png', 38, 0, 'https://gamehallcdn.yiihua.com/webstatic/cupnew_1.png'),
(1284, 20000, '威士忌', 0, 0, 3, 84.75, 0, 1600000, 2, 0, 'com.yiihua.texas.lang.tw.xinren84.75', '1.86', 'https://gamehallcdn.yiihua.com/webstatic/cup-3.png', 39, 0, 'https://gamehallcdn.yiihua.com/webstatic/cupnew_2.png'),
(1286, 20000, '新加坡司令', 0, 0, 3, 410.25, 0, 10800000, 2, 0, 'com.yiihua.texas.lang.tw.xinren410.25', '2.11', 'https://gamehallcdn.yiihua.com/webstatic/cup-4.png', 40, 0, 'https://gamehallcdn.yiihua.com/webstatic/cup-4.png'),
(1288, 20000, '薄荷芙蓉蓓', 0, 0, 3, 84.75, 0, 1200000, 3, 0, 'com.yiihua.texas.lang.tw.temai84.75', '1.39', 'https://gamehallcdn.yiihua.com/webstatic/cup-5.png', 41, 0, 'https://gamehallcdn.yiihua.com/webstatic/cup-5.png'),
(1290, 20000, '薇絲帕', 0, 0, 3, 410.25, 0, 8800000, 3, 0, 'com.yiihua.texas.lang.tw.temai410.25', '1.72', 'https://gamehallcdn.yiihua.com/webstatic/cup-6.png', 42, 0, 'https://gamehallcdn.yiihua.com/webstatic/cupnew_4.png'),
(1292, 20000, '馬天尼', 0, 0, 3, 810, 0, 26000000, 3, 0, 'com.yiihua.texas.lang.tw.temai810', '2.16', 'https://gamehallcdn.yiihua.com/webstatic/cup-7.png', 43, 0, 'https://gamehallcdn.yiihua.com/webstatic/cup-7.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mall_tw`
--
ALTER TABLE `mall_tw`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mall_tw`
--
ALTER TABLE `mall_tw`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1657;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
