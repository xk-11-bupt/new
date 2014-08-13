-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 08 月 13 日 18:14
-- 服务器版本: 5.1.32-community
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `视频素材`
--
CREATE DATABASE IF NOT EXISTS `视频素材` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `视频素材`;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `use_id` int(8) NOT NULL AUTO_INCREMENT,
  `users` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `clearance` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`use_id`, `users`, `password`, `clearance`) VALUES
(1, 'admin', 'admin', 1),
(3, 'user1', '123456', 0),
(5, 'user', '123456', 0),
(6, 'user', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0);

-- --------------------------------------------------------

--
-- 表的结构 `总表`
--

CREATE TABLE IF NOT EXISTS `总表` (
  `编号` int(11) NOT NULL AUTO_INCREMENT,
  `题名` varchar(30) NOT NULL,
  `主题` varchar(60) DEFAULT NULL,
  `参与人员` varchar(30) DEFAULT NULL,
  `拍摄地点` varchar(30) DEFAULT NULL,
  `覆盖时间` varchar(20) DEFAULT NULL,
  `服装` varchar(60) DEFAULT NULL,
  `版本` varchar(30) DEFAULT NULL,
  `画面内容` varchar(30) DEFAULT NULL,
  `出版单位` varchar(30) DEFAULT NULL,
  `格式` varchar(30) DEFAULT NULL,
  `语种` varchar(30) DEFAULT NULL,
  `声道` varchar(30) DEFAULT NULL,
  `字幕` varchar(30) DEFAULT NULL,
  `色彩` varchar(30) DEFAULT NULL,
  `标` varchar(30) DEFAULT NULL,
  `时长` varchar(30) DEFAULT NULL,
  `日期` varchar(30) DEFAULT NULL,
  `责任方式` varchar(30) DEFAULT NULL,
  `储存位置` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`编号`),
  UNIQUE KEY `编号` (`编号`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `总表`
--

INSERT INTO `总表` (`编号`, `题名`, `主题`, `参与人员`, `拍摄地点`, `覆盖时间`, `服装`, `版本`, `画面内容`, `出版单位`, `格式`, `语种`, `声道`, `字幕`, `色彩`, `标`, `时长`, `日期`, `责任方式`, `储存位置`) VALUES
(1, 'a', 'b', 'c', 'd', 'e', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '测试题名1', '主题1', '参与人员1', '拍摄地点', '覆盖时间', '服装', '版本', '画面内容', '出版单位', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '测试名', '测试主题', '测试参与人员', '测试拍摄地点', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '测名', '测试主题', '测试参与人员', '测试拍摄地点', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'cca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'asdfa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '测试', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '讲座', '护理', '张三', '301', '20140725', NULL, NULL, '近景', '军医出版社', NULL, NULL, NULL, NULL, NULL, NULL, '30', NULL, NULL, NULL),
(25, '讲座2', '护理', '张三', '301', '20140725', NULL, NULL, '近景', '军医出版社', NULL, NULL, NULL, NULL, NULL, NULL, '30', NULL, NULL, NULL),
(26, 'aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'dfd', 'fda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '上述', '黄飞鸿', '大将军', '肯德基', NULL, '没错吧', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '库图片'),
(46, '演习', '急急急', '老渔翁', '吉林', '20121109', '常服', '4.3', '室内', 'CCTV', '1080/50i', NULL, '1ch', NULL, NULL, NULL, NULL, NULL, NULL, 'D:XuxPicturesxpro1测试'),
(47, '测试', NULL, '主席总理部长司局长处长科长股长科员', '黑龙江山东', '20140725', '迷彩', 'V1.5', '日出', '解放军卫生音像出版社', 'mov', NULL, '2ch', '无', 'NTSC', 'CCTV7', '10:10:00', '20140726', NULL, '/Users/Streambox/Public/Drop Box');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
