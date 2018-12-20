-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-12-07 21:36:16
-- 服务器版本： 5.5.53-log
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE `tp_admin` (
  `id` mediumint(9) NOT NULL,
  `username` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` varchar(32) NOT NULL COMMENT '管理员密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'poul', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'fffffff', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

CREATE TABLE `tp_article` (
  `id` mediumint(9) NOT NULL COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `desc` varchar(255) NOT NULL COMMENT '文章简介',
  `keywords` varchar(255) NOT NULL COMMENT '文章关键词',
  `content` text NOT NULL COMMENT '文章内容',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '点击数',
  `pic` varchar(100) NOT NULL COMMENT '缩略图',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：不推荐 1：推荐',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`id`, `title`, `desc`, `keywords`, `content`, `author`, `time`, `click`, `pic`, `state`, `cateid`) VALUES
(3, '爱我中华无名', '没事', '歌词,无名', '<p>放点生粉水的<strong><img src=\"http://img.baidu.com/hi/jx2/j_0061.gif\"/></strong>喝水都肥</p>', '李毅', 1544166772, 45, '/uploads/20181206\\a473195bdc56c59d0374f4c8722b6972.jpg', 0, 3),
(5, '孤单心痛', '也许我明晨离别', '歌词,磁条', '<p>是是是是是所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所</p>', '周慧敏', 1544110386, 174, '/uploads/20181206\\75be8e174cbbed392b1dfdbb13ac1e10.jpg', 1, 6),
(4, '下雪痛', '歌词', '歌词', '<p>ddddd滴滴滴滴滴滴滴滴</p>', '张宇', 1544164619, 16, '/uploads/20181205\\6cfdcc72047ce6eb8c09e588f29ff365.jpg', 1, 1),
(6, '毒液：致命守护者 Venom', '艾迪（汤姆·哈迪 Tom Hardy 饰）是一位深受观众喜爱的新闻记者，和女友安妮（米歇尔·威廉姆斯 Michelle Williams 饰）相恋多年，彼此之间感情', '磁条,漫威', '<p><span style=\"color: rgb(17, 17, 17); font-family: Helvetica, Arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">艾迪（汤姆·哈迪 Tom Hardy 饰）是一位深受观众喜爱的新闻记者，和女友安妮（米歇尔·威廉姆斯 Michelle Williams 饰）相恋多年，彼此之间感情十分要好。安妮是一名律师，接手了生命基金会的案件，在女友的邮箱里，艾迪发现了基金会老板德雷克（里兹·阿迈德 Riz Ahmed 饰）不为人知的秘密。为此，艾迪不仅丢了工作，女友也离他而去。&nbsp;</span><br/><span style=\"color: rgb(17, 17, 17); font-family: Helvetica, Arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">　　之后，生命基金会的朵拉博士（珍妮·斯蕾特 Jenny Slate 饰）找到了艾迪，希望艾迪能够帮助她阻止德雷克疯狂的罪行。在生命基金会的实验室里，艾迪发现了德雷克进行人体实验的证据，并且在误打误撞之中被外星生命体毒液附身。回到家后，艾迪和毒液之间形成了共生关系，他们要应对的是德雷克派出的一波又一波杀手。</span></p>', '雷斯彻', 1544162915, 12, '/uploads/20181206\\248e202d5884ce6f28408f184e587b4c.jpg', 1, 7),
(7, '无名之辈', '在一座山间小城中，一对低配劫匪、一个落魄的泼皮保安、', '保安,磁条,无名', '<p><span style=\"color: rgb(17, 17, 17); font-family: Helvetica, Arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">在一座山间小城中，一对低配劫匪、一个落魄的泼皮保安、一个身体残疾却性格彪悍的毒舌女以及一系列生活在社会不同轨迹上的小人物，在一个貌似平常的日子里，因为一把丢失的老枪和一桩当天发生在城中的乌龙劫案，从而被阴差阳错地拧到一起，发生的一幕幕令人啼笑皆非的荒诞喜剧。</span></p>', '晓志', 1544166426, 19, '/uploads/20181206\\3749606705bf0687c4720dc2c1096d09.jpg', 0, 6);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

CREATE TABLE `tp_cate` (
  `id` mediumint(9) NOT NULL,
  `catename` varchar(30) NOT NULL COMMENT '栏目名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `catename`) VALUES
(1, '养生'),
(3, '地理'),
(5, '汽车'),
(6, '健康'),
(7, '军事');

-- --------------------------------------------------------

--
-- 表的结构 `tp_link`
--

CREATE TABLE `tp_link` (
  `id` mediumint(9) NOT NULL COMMENT '链接Id',
  `title` varchar(30) NOT NULL COMMENT '链接标题',
  `url` varchar(60) NOT NULL COMMENT '链接地址',
  `desc` varchar(255) NOT NULL COMMENT '链接说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_link`
--

INSERT INTO `tp_link` (`id`, `title`, `url`, `desc`) VALUES
(1, ' 百度', 'www.baidu.com', '百度搜索');

-- --------------------------------------------------------

--
-- 表的结构 `tp_tags`
--

CREATE TABLE `tp_tags` (
  `id` mediumint(9) NOT NULL COMMENT 'tag标签id',
  `tagname` varchar(30) NOT NULL COMMENT 'tag标签名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_tags`
--

INSERT INTO `tp_tags` (`id`, `tagname`) VALUES
(1, '保本'),
(3, '孤单');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_article`
--
ALTER TABLE `tp_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_cate`
--
ALTER TABLE `tp_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_link`
--
ALTER TABLE `tp_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_tags`
--
ALTER TABLE `tp_tags`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `tp_article`
--
ALTER TABLE `tp_article`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `tp_cate`
--
ALTER TABLE `tp_cate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `tp_link`
--
ALTER TABLE `tp_link`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '链接Id', AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `tp_tags`
--
ALTER TABLE `tp_tags`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'tag标签id', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
