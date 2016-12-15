/*
SQLyog Community Edition- MySQL GUI v5.2 Beta 11
Host - 5.0.18-nt-log : Database - reno
*********************************************************************
Server version : 5.0.18-nt-log
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `reno`;

USE `reno`;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

/*Table structure for table `acade_pic` */

DROP TABLE IF EXISTS `acade_pic`;

CREATE TABLE `acade_pic` (
  `acade_no` int(11) NOT NULL,
  `pi_path` varchar(100) NOT NULL,
  KEY `acade_no` (`acade_no`),
  CONSTRAINT `acade_pic_ibfk_1` FOREIGN KEY (`acade_no`) REFERENCES `news` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学术活动表';

/*Data for the table `acade_pic` */

/*Table structure for table `acti_pic` */

DROP TABLE IF EXISTS `acti_pic`;

CREATE TABLE `acti_pic` (
  `pi_id` int(8) NOT NULL auto_increment,
  `pi_intro` varchar(200) default NULL,
  `ac_no` int(11) NOT NULL,
  `pi_path` varchar(100) NOT NULL,
  PRIMARY KEY  (`pi_id`),
  KEY `ac_no` (`ac_no`),
  CONSTRAINT `acti_pic_ibfk_1` FOREIGN KEY (`ac_no`) REFERENCES `activity` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生活动图片表';

/*Data for the table `acti_pic` */

insert  into `acti_pic`(`pi_id`,`pi_intro`,`ac_no`,`pi_path`) values (1,NULL,102,'../picture/life/Chrysanthemum.jpg'),(3,NULL,102,'../picture/life/Penguins.jpg'),(5,NULL,102,'../picture/life/Hydrangeas.jpg'),(11,'',102,'../picture/life/DSCF5128.JPG'),(12,'',102,'../picture/life/DSCF5137.JPG'),(13,'22222',102,'../picture/life/DSCF5128.JPG'),(14,'33333',102,'../picture/life/DSCF5130.JPG');

/*Table structure for table `activity` */

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity` (
  `ac_id` int(11) NOT NULL auto_increment,
  `ac_name` varchar(100) NOT NULL,
  `ac_content` text,
  `ac_date` date NOT NULL,
  `ac_pic_cover_path` varchar(100) NOT NULL,
  PRIMARY KEY  (`ac_id`),
  UNIQUE KEY `ac_name` (`ac_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生活动表';

/*Data for the table `activity` */

insert  into `activity`(`ac_id`,`ac_name`,`ac_content`,`ac_date`,`ac_pic_cover_path`) values (102,'学生活动测试1','<p>\n	学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1学生活动测试1\n</p>','2012-03-01','../picture/life/undefined');

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL auto_increment,
  `ad_account` varchar(20) NOT NULL,
  `ad_password` varchar(40) NOT NULL,
  `invite_code` varchar(20) default NULL,
  PRIMARY KEY  (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`ad_id`,`ad_account`,`ad_password`,`invite_code`) values (1,'admin2','d033e22ae348aeb5660fc2140aec35850c4da997','ewww'),(2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','1234');

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL auto_increment,
  `c_address` varchar(100) default NULL,
  `c_tel` varchar(50) default NULL,
  `c_fax` varchar(50) default NULL,
  `c_email` varchar(50) default NULL,
  PRIMARY KEY  (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='联系方式表';

/*Data for the table `contact` */

insert  into `contact`(`c_id`,`c_address`,`c_tel`,`c_fax`,`c_email`) values (1,'吉林省长春市前街大街2699到号 吉林大学前卫南区唐敖庆楼室','+86-431-','+86-431-','');

/*Table structure for table `device` */

DROP TABLE IF EXISTS `device`;

CREATE TABLE `device` (
  `d_id` int(11) NOT NULL auto_increment,
  `d_name` varchar(100) NOT NULL,
  `d_content` text NOT NULL,
  `d_pic_path` varchar(100) default NULL,
  PRIMARY KEY  (`d_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `device` */

insert  into `device`(`d_id`,`d_name`,`d_content`,`d_pic_path`) values (1,'123','<p>\r\n	<img src=\"/reno/background/attachments/image/upload/20120921164128_61784.jpg\" width=\"400\" height=\"225\" alt=\"\" /> \r\n</p>',''),(2,'435','<p>\r\n	Initial value.<img src=\"/background/kindeditor/attached/image/20120515/20120515103143_30247.jpg\" width=\"212\" height=\"231\" alt=\"\" />\r\n</p>',''),(3,'wwww','<p>\r\n	Initial value.\r\n</p>',''),(6,'123','<p>\r\n	Initial value.<img src=\"/background/kindeditor/attached/image/20120515/20120515103056_59919.jpg\" width=\"123\" height=\"123\" alt=\"\" />\r\n</p>',''),(7,'435','<p>\r\n	Initial value.<img src=\"/background/kindeditor/attached/image/20120515/20120515103143_30247.jpg\" width=\"212\" height=\"231\" alt=\"\" />\r\n</p>',''),(8,'wwww','<p>\r\n	Initial value.\r\n</p>','');

/*Table structure for table `download` */

DROP TABLE IF EXISTS `download`;

CREATE TABLE `download` (
  `id` int(8) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `path` varchar(500) default NULL,
  `time` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `download` */

/*Table structure for table `group_notice` */

DROP TABLE IF EXISTS `group_notice`;

CREATE TABLE `group_notice` (
  `id` int(8) NOT NULL auto_increment,
  `name` varchar(200) default NULL,
  `content` text,
  `date` timestamp NULL default CURRENT_TIMESTAMP,
  `attach` varbinary(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `group_notice` */

insert  into `group_notice`(`id`,`name`,`content`,`date`,`attach`) values (229,'test','test','2013-06-20 16:50:35',NULL);

/*Table structure for table `info` */

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL auto_increment,
  `info_name` varchar(100) NOT NULL,
  `info_content` text NOT NULL,
  PRIMARY KEY  (`info_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='实验室介绍、联系我们';

/*Data for the table `info` */

insert  into `info`(`info_id`,`info_name`,`info_content`) values (1,'实验室介绍','<p>\r\n	Initial value.啊啊啊</p>\r\n'),(2,'联系我们','<p>\r\n	联系我们啊啊</p>\r\n');

/*Table structure for table `intro_pic` */

DROP TABLE IF EXISTS `intro_pic`;

CREATE TABLE `intro_pic` (
  `id` int(8) NOT NULL auto_increment,
  `path` varchar(100) NOT NULL,
  `description` varchar(200) default NULL,
  `link` varchar(100) default '#',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `intro_pic` */

insert  into `intro_pic`(`id`,`path`,`description`,`link`) values (1,'../picture/life/Chrysanthemum.jpg','12312312','#'),(2,'../picture/life/Desert.jpg','2','#'),(3,'../picture/life/Penguins.jpg','3','#'),(4,'../picture/life/Koala.jpg','4','#'),(5,'../picture/life/Hydrangeas.jpg','5','#'),(6,'../picture/life/tt2.jpg','2','#'),(7,'../picture/life/ll2.jpg','3','#'),(8,'../picture/life/,,,2.jpg',NULL,'#'),(9,'../picture/life/d.jpg',NULL,'#'),(10,'../picture/life/rr2.jpg',NULL,'#');

/*Table structure for table `lab` */

DROP TABLE IF EXISTS `lab`;

CREATE TABLE `lab` (
  `id` int(8) NOT NULL auto_increment,
  `name` varchar(200) default NULL,
  `content` text,
  `slide_pic` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lab` */

insert  into `lab`(`id`,`name`,`content`,`slide_pic`) values (1,'lab1a','asdfasdfcxvasdvasfas<img src=\"/reno/background/attachments/image/upload/20130620091040_40421.jpg\" width=\"160\" height=\"100\" alt=\"\" />','../attachments/image/upload/20130620091040_40421.jpg'),(2,'lab2','<img src=\"/reno/background/attachments/image/upload/20130620091138_69186.jpg\" width=\"160\" height=\"100\" alt=\"\" />dfa','../attachments/image/upload/20130620091138_69186.jpg'),(4,'123','1231231<img src=\"/reno/background/attachments/image/upload/20130620090933_72539.jpg\" width=\"160\" height=\"100\" alt=\"\" />','../attachments/image/upload/20130620090933_72539.jpg');

/*Table structure for table `link` */

DROP TABLE IF EXISTS `link`;

CREATE TABLE `link` (
  `l_id` int(11) NOT NULL auto_increment,
  `l_name` varchar(100) NOT NULL,
  `l_mark` tinyint(1) NOT NULL,
  `l_content` varchar(100) NOT NULL,
  PRIMARY KEY  (`l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='连接表';

/*Data for the table `link` */

insert  into `link`(`l_id`,`l_name`,`l_mark`,`l_content`) values (8,'Sensors and Actuators B',0,'http://www.journals.elsevier.com/sensors-and-actuators-b-chemical/'),(9,'Sensor Letter',0,'http://www.aspbs.com/sensorlett/'),(10,'Talanta',0,'http://www.journals.elsevier.com/talanta/'),(11,'IEEE Sensors Journal',0,'http://ieeexplore.ieee.org/xpl/RecentIssue.jsp?punumber=7361'),(12,'Journal of Physical Chemistry C',0,'http://pubs.acs.org/journal/jpccck'),(13,'Journal of Materials Chemistry',0,'http://pubs.rsc.org/en/journals/journalissues/jm'),(14,'Journal of the Chemical Society: Chemical Communications',0,'http://pubs.rsc.org/en/journals/journalissues/cc'),(15,'Solid-State Electronics',0,'http://www.journals.elsevier.com/solid-state-electronics/'),(16,'Thin Solid Films',0,'http://www.journals.elsevier.com/thin-solid-films/'),(17,'Materials Letters',0,'http://www.journals.elsevier.com/materials-letters/'),(18,'Journal of Nanoscience and Nanotechnology',0,'http://www.aspbs.com/jnn/'),(19,'Applied Surface Science',0,'http://www.journals.elsevier.com/applied-surface-science/'),(20,'Journal of Colloid and Interface Science',0,'http://www.journals.elsevier.com/journal-of-colloid-and-interface-science/'),(21,'Carbon',0,'http://www.journals.elsevier.com/carbon/'),(24,'Impact Factor of 2010',2,'../background/sci_factor/2008.xls'),(25,'Impact Factor of 2012',2,'../background/sci_factor/2009.xls'),(26,'Impact Factor of 2011',2,'../background/sci_factor/2010.xls'),(27,'Jilin university',1,'http://www.jlu.edu.cn'),(28,'t678gyuigy776',0,'http://www.baidu.com'),(44,'2015',2,'../background/sci_factor/1349243166.xls');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `m_id` int(11) NOT NULL auto_increment,
  `m_cname` varchar(100) default NULL,
  `m_username` varchar(20) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_permit` tinyint(1) NOT NULL default '1',
  `m_ename` varchar(100) default NULL,
  `m_grade` char(4) default '2012',
  `m_title` varchar(100) default NULL,
  `m_mark` tinyint(1) default '1',
  `m_email` varchar(100) default NULL,
  `m_tel` varchar(100) default NULL,
  `m_addr` varchar(100) default NULL,
  `m_photopath` varchar(100) default '../picture/people/default_avatar_m.jpeg',
  `m_detail` text,
  PRIMARY KEY  (`m_id`),
  UNIQUE KEY `m_username` (`m_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='成员信息表';

/*Data for the table `member` */

insert  into `member`(`m_id`,`m_cname`,`m_username`,`m_password`,`m_permit`,`m_ename`,`m_grade`,`m_title`,`m_mark`,`m_email`,`m_tel`,`m_addr`,`m_photopath`,`m_detail`) values (73,'吴韬','wt','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'Tao Wu','2012','a',1,'673558314@qq.com','13578916924','前卫','../picture/people/856cc858bcde67cabd43c79e00b1d1f456716eb3.jpg','###da dfas<span style=\"color:#E53333;\">大锅饭lll</span>');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL auto_increment,
  `msg_author` varchar(100) NOT NULL,
  `msg_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `msg_content` text NOT NULL,
  `msg_type` varchar(100) default NULL,
  PRIMARY KEY  (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `message` */

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `a_id` int(11) NOT NULL auto_increment,
  `a_name` varchar(100) NOT NULL,
  `a_type` varchar(50) default NULL,
  `a_content` text NOT NULL,
  `a_date` date NOT NULL,
  `a_pic_cover_path` varchar(100) default NULL,
  `a_isslide` tinyint(1) default '0',
  PRIMARY KEY  (`a_id`),
  UNIQUE KEY `a_name` (`a_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学术活动表';

/*Data for the table `news` */

insert  into `news`(`a_id`,`a_name`,`a_type`,`a_content`,`a_date`,`a_pic_cover_path`,`a_isslide`) values (45,'论文发表3','a','论文发表<img src=\"/reno/background/attachments/image/upload/20130620085240_79960.jpg\" width=\"160\" height=\"100\" alt=\"\" />','2012-04-15','../attachments/image/upload/20130620085240_79960.jpg',1);

/*Table structure for table `paper` */

DROP TABLE IF EXISTS `paper`;

CREATE TABLE `paper` (
  `p_id` int(11) NOT NULL auto_increment,
  `p_name` varchar(100) NOT NULL default '',
  `p_abstract` text,
  `p_journal` varchar(100) NOT NULL default '',
  `p_journal_no` varchar(100) default NULL,
  `p_date` date NOT NULL default '0000-00-00',
  `p_sci_link` varchar(200) default NULL,
  `p_link` varchar(200) default NULL,
  `p_coverpath` varchar(100) default NULL,
  `p_highlighted` text,
  `p_citation` text,
  `p_iscover` char(1) default '0',
  `p_type` varchar(50) default NULL,
  `p_members` varchar(500) default NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `paper` */

insert  into `paper`(`p_id`,`p_name`,`p_abstract`,`p_journal`,`p_journal_no`,`p_date`,`p_sci_link`,`p_link`,`p_coverpath`,`p_highlighted`,`p_citation`,`p_iscover`,`p_type`,`p_members`) values (1,'论文1','摘要0','Sens. Actuators','B 2011, 153, 460?464','2012-04-01',NULL,NULL,'../picture/cover/1333095200.gif','The paper was selected as the cover story by ChemPhysChem, Vol. 11, Issue 9, (2010).','has been selected by Virtual Journal of Ultrafast Science (VJUS), Vol. 8, Issue 9, (2009).','1',NULL,'zhang san');

/*Table structure for table `paper_member` */

DROP TABLE IF EXISTS `paper_member`;

CREATE TABLE `paper_member` (
  `pm_id` int(8) NOT NULL auto_increment,
  `p_no` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_no` int(11) default NULL,
  PRIMARY KEY  (`pm_id`),
  KEY `p_no` (`p_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论文作者表';

/*Data for the table `paper_member` */

/*Table structure for table `patent` */

DROP TABLE IF EXISTS `patent`;

CREATE TABLE `patent` (
  `pa_id` int(11) NOT NULL auto_increment,
  `pa_name` varchar(100) NOT NULL,
  `pa_content` text NOT NULL,
  PRIMARY KEY  (`pa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='专利';

/*Data for the table `patent` */

insert  into `patent`(`pa_id`,`pa_name`,`pa_content`) values (14,'dsdfs','sadv12');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `pr_id` int(11) NOT NULL auto_increment,
  `pr_num` int(11) default NULL,
  `pr_name` varchar(100) NOT NULL,
  `pr_type` varchar(50) default NULL,
  `pr_content` text,
  `pr_mark` tinyint(1) default NULL,
  `pr_date1` date default NULL,
  `pr_date2` date default NULL,
  `pr_leader` varchar(200) default NULL,
  `pr_cost` int(10) default NULL,
  PRIMARY KEY  (`pr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目表';

/*Data for the table `project` */

insert  into `project`(`pr_id`,`pr_num`,`pr_name`,`pr_type`,`pr_content`,`pr_mark`,`pr_date1`,`pr_date2`,`pr_leader`,`pr_cost`) values (1,123,'project112','吉林省科技厅国际合作项目123','简介',0,'2011-04-11','2011-10-28','William23da,123da',213);

/*Table structure for table `project_header` */

DROP TABLE IF EXISTS `project_header`;

CREATE TABLE `project_header` (
  `pr_id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  KEY `pr_id` (`pr_id`),
  CONSTRAINT `project_header_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `project` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目负责人表';

/*Data for the table `project_header` */

/*Table structure for table `recommend` */

DROP TABLE IF EXISTS `recommend`;

CREATE TABLE `recommend` (
  `re_id` int(11) NOT NULL auto_increment,
  `re_name` varchar(100) NOT NULL,
  `re_abstract` text NOT NULL,
  `re_link` varchar(100) NOT NULL,
  PRIMARY KEY  (`re_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推荐资料表';

/*Data for the table `recommend` */

insert  into `recommend`(`re_id`,`re_name`,`re_abstract`,`re_link`) values (7,'推荐资料测试1','<p>\r\n	推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1推荐资料测试1</p>\r\n','http://www.csdn.com');

/*Table structure for table `research` */

DROP TABLE IF EXISTS `research`;

CREATE TABLE `research` (
  `r_id` int(11) NOT NULL auto_increment,
  `r_name` varchar(100) NOT NULL,
  `r_content` text NOT NULL,
  `r_pic_path` varchar(100) default NULL,
  PRIMARY KEY  (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='研究方向表';

/*Data for the table `research` */

insert  into `research`(`r_id`,`r_name`,`r_content`,`r_pic_path`) values (6,'基于修饰石墨烯的新型传感器及特性','<p style=\"text-indent:2em;\">\r\n	<span style=\"font-family:楷体_GB2312;\"> </span> \r\n</p>\r\n<p style=\"font-size:14px;line-height:150%;text-indent:2em;\">\r\n	<span style=\"line-height:150%;font-size:14px;font-family:SimSun;\">石墨烯具有大的比表面积、高的载流子迁移率、良好的机械性能、稳定的物理化学性质以及良好的室温导电性，这些特点可以弥补传统金属氧化物半导体传感材料的缺点。尽管石墨烯材料可以实现室温检测气体，但是灵敏度低、响应恢复慢以及选择性差等问题严重阻碍了其实用性。采用有机分子对石墨烯材料进行非共价修饰，可以调控石墨烯材料的电子传输能力，提高对检测气体的识别能力与吸附能力，获得具有高传感特性的石墨烯型气体传感器。</span> \r\n</p>\r\n<p style=\"font-size:14px;line-height:150%;text-indent:2em;\">\r\n	<span style=\"text-align:left;text-indent:2em;font-size:small;\"><span style=\"line-height:24px;\"><br>\r\n</span></span> \r\n</p>\r\n<p style=\"text-align:left;font-size:14px;line-height:150%;text-indent:2em;\">\r\n</p>\r\n<p align=\"center\" style=\"font-size:14px;line-height:150%;text-align:center;text-indent:2em;\">\r\n	<span style=\"line-height:150%;font-size:12px;font-family:SimSun;\">卟啉分子修饰石墨烯材料的合成示意图</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br>\r\n</p>','');

/*Table structure for table `slide` */

DROP TABLE IF EXISTS `slide`;

CREATE TABLE `slide` (
  `s_no` int(11) NOT NULL,
  `s_path` varchar(100) NOT NULL,
  KEY `s_no` (`s_no`),
  CONSTRAINT `slide_ibfk_1` FOREIGN KEY (`s_no`) REFERENCES `news` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='幻灯片表';

/*Data for the table `slide` */

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
