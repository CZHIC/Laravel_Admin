-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-05-29 10:52:13
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
(7241, 0, 20000, 'footballGuess', '足球竞猜开关', 'false', '', '', '', '', '', '', 0),
(7243, 0, 20000, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '', 3),
(7247, 0, 20000, 'onlineLimitCount', '局数限制', '', '', '', '', '', '', '', 0),
(7248, 0, 20000, 'onlineLimitCount', '局数限制', '-1', '', '', '', '', '', '1.0.0', 0),
(7257, 0, 20000, 'inReview', '审核开关', 'false', '', '', '', '', '', '1.0.0', 0),
(7258, 0, 20000, 'blackjackEnabled', '黑杰克入口', '', '', '', '', '', '', '', 0),
(7259, 0, 20000, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '', 3),
(7260, 0, 20000, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '', 2),
(7263, 0, 20000, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '1.0.0', 0),
(7308, 0, 20000, 'wishEnabled', '许愿夺宝开关', 'true', '', '', '', '', '', '1.0.1', 0),
(7306, 0, 20000, 'footballGuess', '足球竞猜开关', 'true', '', '', '', '', '', '1.0.1', 0),
(7297, 0, 20000, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.1', 1),
(7879, 0, 20000, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '1.0.3', 0),
(7880, 0, 20000, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '1.0.4', 0),
(7295, 0, 20000, 'sysFeedback', '反馈提示', '歡迎來到德州撲克大師，如果您有任何疑問可以通過客服郵箱kf@yiihua.com聯系客服處理，我們看到後將第壹時間回復您', '', '', '', '', '', '1.0.0', 0),
(7875, 0, 20000, 'saleActivty', '新人折扣', '', '', '', '', '', '', '', 0),
(7876, 0, 20000, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '1.0.5', 0),
(7313, 0, 20000, 'closeLiveAward', '赏金榜开关', 'false', '', '', '', '', '', '1.0.1', 0),
(7315, 0, 20000, 'dailyTasksEnabled', '任务开关', 'true', '', '', '', '', '', '1.0.1', 0),
(7317, 0, 20000, 'boxTimes', '宝箱时间', '[5,10,20,30,60,120]', '', '', '', '', '', '1.0.1', 0),
(7318, 0, 20000, 'offterWall', '积分墙', 'false', '', '', '', '', '', '1.0.1', 0),
(7910, 0, 20000, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7407, 0, 20000, 'leaderBordEnabled', '排行榜开关', 'true', '', '', '', '', '', '1.0.2', 0),
(7401, 0, 20000, 'footballGuess', '足球竞猜开关', 'false', '', '', '', '', '', '1.0.2', 0),
(7399, 0, 20000, 'advertising', '广告开关', 'false', '', '', '', '', '', '1.0.2', 0),
(7403, 0, 20000, 'wishEnabled', '许愿夺宝开关', 'true', '', '', '', '', '', '1.0.2', 0),
(7391, 0, 20000, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '1.0.2', 0),
(7392, 0, 20000, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.2', 1),
(7393, 0, 20000, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '1.0.2', 3),
(7900, 0, 20000, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '1.0.5', 0),
(7396, 0, 20000, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '1.0.2', 0),
(7863, 0, 20000, 'onlineLimitCount', '局数限制', '-1', '', '', '', '', '', '1.0.5', 0),
(7408, 0, 20000, 'closeLiveAward', '赏金榜开关', 'false', '', '', '', '', '', '1.0.2', 0),
(7410, 0, 20000, 'dailyTasksEnabled', '任务开关', 'true', '', '', '', '', '', '1.0.2', 0),
(7411, 0, 20000, 'StrongboxEnabled', '保险箱开关', 'true', '', '', '', '', '', '1.0.2', 0),
(7412, 0, 20000, 'boxTimes', '宝箱时间', '[5,10,20,30,60,120]', '', '', '', '', '', '1.0.2', 0),
(7413, 0, 20000, 'offterWall', '积分墙', 'false', '', '', '', '', '', '1.0.2', 0),
(7414, 0, 20000, 'boxMoneys', '宝箱金币', '[300,500,1000,1500,2000,3000]', '', '', '', '', '', '1.0.2', 0),
(7416, 0, 20000, 'specialNotice', '通知弹窗', 'false', '', '', '', '', '', '1.0.2', 0),
(7418, 0, 20000, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '1.0.2', 0),
(7422, 0, 20000, '5.1.0', 'userTips', '', '', '', '', '', '', '', 0),
(7426, 0, 20000, 'userTips', '用户协议弹窗', '', '', '', '', '', '', '', 0),
(7799, 0, 20000, 'activity', '活动开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7909, 0, 20000, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7908, 0, 20000, 'enableRedBlueRepeat', '红蓝重复投注开关', '', '', '', '', '', '', '', 0),
(7904, 0, 20000, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '1.0.3', 0),
(7902, 0, 20000, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '1.0.4', 0),
(7858, 0, 20000, 'vipEnabled', 'vip开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7857, 0, 20000, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '1.0.5', 0),
(7856, 0, 20000, 'uploadPic', '头像开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7855, 0, 20000, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '1.0.5', 3),
(7854, 0, 20000, 'StrongboxEnabled', '保险箱开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7853, 0, 20000, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '1.0.5', 0),
(7852, 0, 20000, 'showGift', '显示礼物', 'true', '', '', '', '', '', '1.0.5', 0),
(7851, 0, 20000, 'shareEnabled', '分享开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7850, 0, 20000, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '1.0.5', 0),
(7849, 0, 20000, 'send_chips', '赠送礼物开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7848, 0, 20000, 'openMTT', 'MTT开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7847, 0, 20000, 'noticeEnabled', '通知开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7846, 0, 20000, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7845, 0, 20000, 'leaderBordEnabled', '排行榜开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7844, 0, 20000, 'isOpenGuessLogin', '游客开关', 'false', '', '', '', '', '', '1.0.5', 0),
(7841, 0, 20000, 'broadcastEnabled', '广播开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7842, 0, 20000, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '1.0.5', 3),
(7843, 0, 20000, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.5', 3),
(7840, 0, 20000, 'boxTimes', '宝箱时间', '[5,10,20,30,60,120]', '', '', '', '', '', '1.0.5', 0),
(7839, 0, 20000, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '1.0.5', 0),
(7838, 0, 20000, 'activity', '活动开关', 'true', '', '', '', '', '', '1.0.5', 0),
(7820, 0, 20000, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '1.0.4', 0),
(7819, 0, 20000, 'vipEnabled', 'vip开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7818, 0, 20000, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '1.0.4', 0),
(7817, 0, 20000, 'uploadPic', '头像开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7816, 0, 20000, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '1.0.4', 3),
(7815, 0, 20000, 'StrongboxEnabled', '保险箱开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7814, 0, 20000, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '1.0.4', 0),
(7813, 0, 20000, 'showGift', '显示礼物', 'true', '', '', '', '', '', '1.0.4', 0),
(7821, 0, 20000, 'shareEnabled', '分享开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7811, 0, 20000, 'send_chips', '赠送礼物开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7810, 0, 20000, 'openMTT', 'MTT开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7809, 0, 20000, 'onlineLimitCount', '局数限制', '-1', '', '', '', '', '', '1.0.4', 0),
(7808, 0, 20000, 'noticeEnabled', '通知开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7807, 0, 20000, 'leaderBordEnabled', '排行榜开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7806, 0, 20000, 'isOpenGuessLogin', '游客开关', 'false', '', '', '', '', '', '1.0.4', 0),
(7804, 0, 20000, 'dailyTasksEnabled', '任务开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7805, 0, 20000, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.4', 1),
(7803, 0, 20000, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '1.0.4', 3),
(7800, 0, 20000, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7801, 0, 20000, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '1.0.4', 0),
(7749, 0, 20000, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '1.0.3', 0),
(7748, 0, 20000, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '1.0.3', 0),
(7747, 0, 20000, 'isOpenGuessLogin', '游客开关', 'false', '', '', '', '', '', '1.0.3', 0),
(7746, 0, 20000, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '1.0.3', 0),
(7802, 0, 20000, 'broadcastEnabled', '广播开关', 'true', '', '', '', '', '', '1.0.4', 0),
(7741, 0, 20000, 'activity', '活动开关', 'true', '', '', '', '', '', '1.0.3', 0),
(7740, 0, 20000, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '1.0.3', 0),
(7739, 0, 20000, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '1.0.3', 0),
(7911, 0, 20000, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '1.0.3', 0),
(7918, 0, 20000, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.0.3', 3),
(7917, 0, 20000, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '1.03', 1);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8048;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
