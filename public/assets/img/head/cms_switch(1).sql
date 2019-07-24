-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-05-29 10:49:22
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
(7893, 0, 20008, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '5.1.6', 2),
(7256, 0, 20008, 'openSandBox', '沙箱充值开关', 'false', '', '', '', '', '', '5.0.1', 0),
(7255, 0, 20008, 'inReview', '审核开关', 'false', '', '', '', '', '', '5.0.1', 0),
(7892, 0, 20008, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '5.1.6', 3),
(7419, 0, 20008, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '5.0.1', 0),
(7868, 0, 20008, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '5.1.3', 3),
(7890, 0, 20008, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '5.1.6', 0),
(7884, 0, 20008, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '5.1.1', 0),
(7895, 0, 20008, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '5.1.6', 0),
(7292, 0, 20008, 'openSandBox', '沙箱充值开关', 'false', '', '', '', '', '', '5.0.4', 0),
(7293, 0, 20008, 'inReview', '审核开关', 'false', '', '', '', '', '', '5.0.4', 0),
(7874, 0, 20008, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '5.1.2', 0),
(7888, 0, 20008, 'myCardPayOfficialUrl', 'myCard正式链接', 'true', '', '', '', '', '', '5.1.3', 0),
(7883, 0, 20008, 'saleActivty', '新人折扣', 'true', '', '', '', '', '', '5.1.0', 0),
(7783, 0, 20008, 'activity', '活动开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7784, 0, 20008, 'advertising', '广告开关', 'false', '', '', '', '', '', '5.1.2', 0),
(7322, 0, 20008, 'activity', '活动开关', 'true', '', '', '', '', '', '5.0.4', 0),
(7323, 0, 20008, 'activity', '活动开关', 'true', '', '', '', '', '', '5.0.1', 0),
(7324, 0, 20008, 'onlineLimitCount', '局数限制', '', '', '', '', '', '', '', 0),
(7326, 0, 20008, 'isOpenGuessLogin', '游客开关', 'false', '', '', '', '', '', '5.0.4', 0),
(7341, 0, 20008, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '5.1.0', 0),
(7753, 0, 20008, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '5.1.1', 0),
(7342, 0, 20008, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '5.1.0', 3),
(7343, 0, 20008, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '5.1.0', 3),
(7345, 0, 20008, 'shareEnabled', '分享开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7346, 0, 20008, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '5.1.0', 0),
(7347, 0, 20008, 'vipEnabled', 'vip开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7348, 0, 20008, 'openMTT', 'MTT开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7349, 0, 20008, 'advertising', '广告开关', 'false', '', '', '', '', '', '5.1.0', 0),
(7350, 0, 20008, 'isOpenGuessLogin', '游客开关', 'false', '', '', '', '', '', '5.1.0', 0),
(7351, 0, 20008, 'footballGuess', '足球竞猜开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7352, 0, 20008, 'noticeEnabled', '通知开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7353, 0, 20008, 'wishEnabled', '许愿夺宝开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7354, 0, 20008, 'uploadPic', '头像开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7355, 0, 20008, 'broadcastEnabled', '广播开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7356, 0, 20008, 'showGift', '显示礼物', 'true', '', '', '', '', '', '5.1.0', 0),
(7357, 0, 20008, 'leaderBordEnabled', '排行榜开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7358, 0, 20008, 'closeLiveAward', '赏金榜开关', 'false', '', '', '', '', '', '5.1.0', 0),
(7359, 0, 20008, 'send_chips', '赠送礼物开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7360, 0, 20008, 'dailyTasksEnabled', '任务开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7361, 0, 20008, 'StrongboxEnabled', '保险箱开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7885, 0, 20008, 'myCardPay', 'myCard支付', '', '', '', '', '', '', '', 0),
(7363, 0, 20008, 'offterWall', '积分墙', 'false', '', '', '', '', '', '5.1.0', 0),
(7364, 0, 20008, 'boxMoneys', '宝箱金币', '[300,500,1000,1500,2000,3000]', '', '', '', '', '', '5.1.0', 0),
(7889, 0, 20008, 'redBlueEnabled', '红蓝大战', '', '', '', '', '', '', '', 0),
(7368, 0, 20008, 'activity', '活动开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7389, 0, 20008, 'openSandBox', '沙箱充值开关', 'false', '', '', '', '', '', '5.1.0', 0),
(7891, 0, 20008, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '5.1.6', 0),
(7886, 0, 20008, 'myCardPay', 'myCard支付', 'false', '', '', '', '', '', '5.1.3', 0),
(7383, 0, 20008, 'send_chips', '赠送礼物开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7894, 0, 20008, 'openSandBox', '沙箱充值开关', 'false', '', '', '', '', '', '5.1.6', 0),
(7386, 0, 20008, 'boxTimes', '宝箱时间', '[5,10,20,30,60,120]', '', '', '', '', '', '5.1.0', 0),
(7887, 0, 20008, 'myCardPayOfficialUrl', 'myCard正式链接', '', '', '', '', '', '', '', 0),
(7899, 0, 20008, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '5.1.2', 0),
(7755, 0, 20008, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '5.1.1', 3),
(7417, 0, 20008, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '5.1.0', 0),
(7420, 0, 20008, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '5.1.0', 0),
(7421, 0, 20008, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '5.1.0', 3),
(7797, 0, 20008, 'vipEnabled', 'vip开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7429, 0, 20008, 'userTips', '用户协议弹窗', 'false', '', '', '', '', '', '5.1.0', 0),
(7431, 0, 20008, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '5.1.1', 3),
(7433, 0, 20008, 'activity', '活动开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7434, 0, 20008, 'shareEnabled', '分享开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7435, 0, 20008, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '5.1.1', 0),
(7436, 0, 20008, 'vipEnabled', 'vip开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7437, 0, 20008, 'openMTT', 'MTT开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7438, 0, 20008, 'advertising', '广告开关', 'false', '', '', '', '', '', '5.1.1', 0),
(7439, 0, 20008, 'isOpenGuessLogin', '游客开关', 'false', '', '', '', '', '', '5.1.1', 0),
(7440, 0, 20008, 'footballGuess', '足球竞猜开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7441, 0, 20008, 'noticeEnabled', '通知开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7442, 0, 20008, 'wishEnabled', '许愿夺宝开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7443, 0, 20008, 'uploadPic', '头像开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7444, 0, 20008, 'broadcastEnabled', '广播开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7445, 0, 20008, 'showGift', '显示礼物', 'true', '', '', '', '', '', '5.1.1', 0),
(7446, 0, 20008, 'leaderBordEnabled', '排行榜开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7447, 0, 20008, 'closeLiveAward', '赏金榜开关', 'false', '', '', '', '', '', '5.1.1', 0),
(7448, 0, 20008, 'send_chips', '赠送礼物开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7449, 0, 20008, 'dailyTasksEnabled', '任务开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7450, 0, 20008, 'StrongboxEnabled', '保险箱开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7451, 0, 20008, 'boxTimes', '宝箱时间', '[5,10,20,30,60,120]', '', '', '', '', '', '5.1.1', 0),
(7452, 0, 20008, 'offterWall', '积分墙', 'false', '', '', '', '', '', '5.1.1', 0),
(7453, 0, 20008, 'boxMoneys', '宝箱金币', '[300,500,1000,1500,2000,3000]', '', '', '', '', '', '5.1.1', 0),
(7896, 0, 20008, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '5.1.6', 3),
(7907, 0, 20008, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7906, 0, 20008, 'enableRedBlueRepeat', '红蓝重复投注开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7905, 0, 20008, 'enableRedBlueRepeat', '红蓝重复投注开关', '', '', '', '', '', '', '', 0),
(7837, 0, 20008, 'onlineLimitCount', '局数限制', '-1', '', '', '', '', '', '5.1.3', 0),
(7832, 0, 20008, 'inReview', '审核开关', 'false', '', '', '', '', '', '5.1.3', 0),
(7833, 0, 20008, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '5.1.3', 2),
(7834, 0, 20008, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '5.1.3', 2),
(7835, 0, 20008, 'shareEnabled', '分享开关', 'true', '', '', '', '', '', '5.1.3', 0),
(7836, 0, 20008, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '5.1.3', 0),
(7831, 0, 20008, 'openSandBox', '沙箱充值开关', 'false', '', '', '', '', '', '5.1.3', 0),
(7873, 0, 20008, 'saleActivty', '新人折扣', '', '', '', '', '', '', '', 0),
(7777, 0, 20008, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '5.1.1', 3),
(7778, 0, 20008, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '5.1.1', 0),
(7780, 0, 20008, 'openSandBox', '沙箱充值开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7781, 0, 20008, 'shareEnabled', '分享开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7782, 0, 20008, 'sharePF', '分享开关', '[5]', '', '', '', '', '', '5.1.2', 0),
(7785, 0, 20008, 'blackjackEnabled', '黑杰克入口', 'true', '', '', '', '', '', '5.1.2', 0),
(7786, 0, 20008, 'boxTimes', '宝箱时间', '[5,10,20,30,60,120]', '', '', '', '', '', '5.1.2', 0),
(7787, 0, 20008, 'broadcastEnabled', '广播开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7788, 0, 20008, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '5.1.2', 3),
(7789, 0, 20008, 'closeLiveAward', '赏金榜开关', 'false', '', '', '', '', '', '5.1.2', 0),
(7790, 0, 20008, 'footballGuess', '足球竞猜开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7791, 0, 20008, 'hundredEnabled', '百人场开关', 'true', '', '', '', '', '', '5.1.2', 1),
(7792, 0, 20008, 'isOpenGuessLogin', '游客开关', 'false', '', '', '', '', '', '5.1.2', 0),
(7793, 0, 20008, 'leaderBordEnabled', '排行榜开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7794, 0, 20008, 'littleGameEnabled', '小游戏开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7795, 0, 20008, 'offterWall', '积分墙', 'false', '', '', '', '', '', '5.1.2', 0),
(7796, 0, 20008, 'send_chips', '赠送礼物开关', 'true', '', '', '', '', '', '5.1.2', 0),
(7798, 0, 20008, 'slotEnabled', '水果机', 'true', '', '', '', '', '', '5.1.2', 0),
(7738, 0, 20008, 'openSandBox', '沙箱充值开关', 'true', '', '', '', '', '', '5.1.1', 0),
(7737, 0, 20008, 'catchdollEnabled', '抓娃娃', 'true', '', '', '', '', '', '5.0.0', 0),
(7919, 0, 20008, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '5.1.3', 0),
(7920, 0, 20008, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '5.1.1', 0),
(7921, 0, 20008, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '5.1.0', 0),
(7923, 0, 20008, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '5.1.3', 3),
(7924, 0, 20008, 'tenPointFiveEnabled', '10.5开关', 'true', '', '', '', '', '', '5.1.6', 3),
(7925, 0, 20008, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '5.1.4', 0),
(7926, 0, 20008, 'redBlueEnabled', '红蓝大战', 'true', '', '', '', '', '', '5.1.5', 0);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7927;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
