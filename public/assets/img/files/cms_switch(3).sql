-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-05-29 10:55:10
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
-- 表的结构 `cms_switch`
--

CREATE TABLE `cms_switch` (
  `id` int(11) UNSIGNED NOT NULL,
  `sid` int(11) UNSIGNED NOT NULL,
  `appid` int(11) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL COMMENT '开关标识',
  `title` varchar(45) NOT NULL COMMENT '开关标题',
  `value` varchar(225) NOT NULL COMMENT '开关值',
  `t_uid` varchar(255) NOT NULL COMMENT '测试关联uid',
  `s_time` varchar(45) NOT NULL COMMENT '有效期开始时间',
  `e_time` varchar(45) NOT NULL COMMENT '有效期结束时间',
  `s_ver` varchar(45) NOT NULL COMMENT '起始版本号',
  `e_ver` varchar(45) NOT NULL COMMENT '结束版本号',
  `ver` varchar(45) NOT NULL DEFAULT '',
  `level` int(4) UNSIGNED NOT NULL DEFAULT '0' COMMENT '等级，为0时，不做等级限制'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `cms_switch`
--

INSERT INTO `cms_switch` (`id`, `sid`, `appid`, `name`, `title`, `value`, `t_uid`, `s_time`, `e_time`, `s_ver`, `e_ver`, `ver`, `level`) VALUES
(7901, 0, 20002, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '1.0.5', 0),
(7882, 0, 20002, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '1.0.3', 0),
(7866, 0, 20002, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '1.0.5', 0),
(7867, 0, 20002, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '1.0.5', 0),
(7870, 0, 20002, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.3', 1),
(7878, 0, 20002, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '1.0.5', 0),
(7881, 0, 20002, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '1.0.4', 0),
(7877, 0, 20002, 'saleActivty', '新人折扣', '', '', '', '', '', '', '', 0),
(7340, 0, 20002, 'facebookActivity', 'FACEBOOK邀请活动', 'false', '', '', '', '', '', '1.0.1', 0),
(7735, 0, 20002, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '1.0.1', 0),
(7339, 0, 20002, 'facebookActivity', 'FACEBOOK邀请活动', '', '', '', '', '', '', '', 0),
(7338, 0, 20002, 'onlineLimitCount', '局数限制', '-1', '', '', '', '', '', '1.0.1', 0),
(7333, 0, 20002, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '1.0.1', 0),
(7861, 0, 20002, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '1.0.5', 0),
(7862, 0, 20002, 'onlineLimitCount', '局数限制', '-1', '', '', '', '', '', '1.0.5', 0),
(7859, 0, 20002, 'activity', '活动开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7864, 0, 20002, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '1.0.5', 0),
(7872, 0, 20002, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.4', 1),
(7871, 0, 20002, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.5', 1),
(7903, 0, 20002, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '1.0.4', 0),
(7830, 0, 20002, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '1.0.4', 0),
(7828, 0, 20002, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '1.0.4', 0),
(7827, 0, 20002, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7826, 0, 20002, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '1.0.4', 0),
(7825, 0, 20002, 'onlineLimitCount', '局数限制', '-1', '', '', '', '', '', '1.0.4', 0),
(7824, 0, 20002, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '1.0.4', 0),
(7823, 0, 20002, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '1.0.4', 0),
(7822, 0, 20002, 'activity', '活动开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7860, 0, 20002, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '1.0.5', 0),
(7743, 0, 20002, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '1.0.3', 0),
(7742, 0, 20002, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '1.0.3', 0),
(7734, 0, 20002, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '1.0.2', 0),
(7912, 0, 20002, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7913, 0, 20002, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7914, 0, 20002, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '1.0.3', 0),
(7922, 0, 20002, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '1.0.3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_switch`
--
ALTER TABLE `cms_switch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cms_switch`
--
ALTER TABLE `cms_switch`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
