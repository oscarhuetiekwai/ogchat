-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2013 at 02:44 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qm`
--

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE IF NOT EXISTS `criteria` (
  `criteria_id` int(5) NOT NULL AUTO_INCREMENT,
  `criteria_title` varchar(200) DEFAULT NULL,
  `criteria_rate` int(5) DEFAULT NULL,
  PRIMARY KEY (`criteria_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`criteria_id`, `criteria_title`, `criteria_rate`) VALUES
(1, 'Did not demonstrate inappropriate behavior - Zero Tolerance Policy', 40),
(2, 'Did not deny service or refuse to escalate a customer when applicable', 60),
(11, 'new criteria', 100),
(13, 'test2', 10),
(14, 'test4', 30),
(19, 'Did not deny service or refuse to escalate a customer when applicable', 30);

-- --------------------------------------------------------

--
-- Table structure for table `criteria_and_question`
--

CREATE TABLE IF NOT EXISTS `criteria_and_question` (
  `criteria_id` int(5) NOT NULL,
  `question_id` int(5) NOT NULL,
  `qm_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria_and_question`
--

INSERT INTO `criteria_and_question` (`criteria_id`, `question_id`, `qm_id`) VALUES
(1, 3, 2),
(1, 4, 2),
(1, 3, 1),
(1, 4, 1),
(2, 5, 1),
(2, 3, 2),
(2, 4, 2),
(11, 3, 5),
(11, 4, 5),
(11, 5, 5),
(11, 6, 5),
(11, 7, 5),
(1, 9, 2),
(1, 5, 2),
(1, 10, 2),
(11, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `qm_and_criteria`
--

CREATE TABLE IF NOT EXISTS `qm_and_criteria` (
  `qm_id` int(5) NOT NULL,
  `criteria_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qm_and_criteria`
--

INSERT INTO `qm_and_criteria` (`qm_id`, `criteria_id`) VALUES
(1, 2),
(2, 1),
(1, 1),
(2, 2),
(5, 11),
(8, 1),
(8, 19);

-- --------------------------------------------------------

--
-- Table structure for table `qm_form`
--

CREATE TABLE IF NOT EXISTS `qm_form` (
  `qm_id` int(5) NOT NULL AUTO_INCREMENT,
  `qm_title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`qm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `qm_form`
--

INSERT INTO `qm_form` (`qm_id`, `qm_title`) VALUES
(1, 'QM LEAD'),
(2, 'QM LEAD 2'),
(5, 'QM Lead 3'),
(8, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(5) NOT NULL AUTO_INCREMENT,
  `question_title` varchar(300) DEFAULT NULL,
  `question_type` enum('y','n') DEFAULT NULL,
  `question_score_y_yes` tinyint(1) DEFAULT NULL COMMENT 'if question answer yes',
  `question_score_y_no` tinyint(1) DEFAULT NULL COMMENT 'if question answer no',
  `question_score_n_a` tinyint(5) DEFAULT NULL COMMENT 'A score',
  `question_score_n_a_value` varchar(100) DEFAULT NULL COMMENT 'answer A',
  `question_score_n_b` tinyint(5) DEFAULT NULL COMMENT 'B score',
  `question_score_n_b_value` varchar(100) DEFAULT NULL COMMENT 'answer B',
  `question_score_n_c` tinyint(5) DEFAULT NULL COMMENT 'C score',
  `question_score_n_c_value` varchar(100) DEFAULT NULL COMMENT 'answer C',
  `question_score_n_d` tinyint(5) DEFAULT NULL COMMENT 'D score',
  `question_score_n_d_value` varchar(100) DEFAULT NULL COMMENT 'answer D',
  `question_score_n_e` tinyint(5) DEFAULT NULL COMMENT 'E score',
  `question_score_n_e_value` varchar(100) DEFAULT NULL COMMENT 'answer E',
  `question_score_n_answer` varchar(2) DEFAULT NULL,
  `question_score_n` tinyint(5) DEFAULT NULL,
  `question_top_score` mediumint(5) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_title`, `question_type`, `question_score_y_yes`, `question_score_y_no`, `question_score_n_a`, `question_score_n_a_value`, `question_score_n_b`, `question_score_n_b_value`, `question_score_n_c`, `question_score_n_c_value`, `question_score_n_d`, `question_score_n_d_value`, `question_score_n_e`, `question_score_n_e_value`, `question_score_n_answer`, `question_score_n`, `question_top_score`) VALUES
(3, 'Question 1', 'y', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(4, 'Question 2', 'n', NULL, NULL, 1, 'True', 0, 'False', 0, '', 0, '', 0, '', NULL, NULL, 1),
(5, 'Question 3', 'n', NULL, NULL, 3, 'Very Good', 2, 'Good', 1, 'Normal', 0, 'Bad', 0, '', NULL, NULL, 3),
(11, 'Question 5', 'n', 0, 0, 1, 'good', 0, 'bad', 0, '', 0, '', 0, '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rate_info`
--

CREATE TABLE IF NOT EXISTS `rate_info` (
  `rate_info_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `userid` int(5) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `connecttime` datetime DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `callerid` varchar(15) DEFAULT NULL,
  `record_id` bigint(5) DEFAULT NULL,
  `qm_title` varchar(100) DEFAULT NULL,
  `qm_id` int(5) DEFAULT NULL,
  `type` enum('0','1','2') DEFAULT NULL COMMENT '0=recording,1=chat,2=others',
  PRIMARY KEY (`rate_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rate_info`
--

INSERT INTO `rate_info` (`rate_info_id`, `userid`, `lastname`, `firstname`, `connecttime`, `extension`, `callerid`, `record_id`, `qm_title`, `qm_id`, `type`) VALUES
(1, 1002, 'Binti Johari', 'Nurul Farahhin', '2013-05-15 09:17:45', 'SIP/1003', '0320217566', 2, 'QM LEAD 2', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `rate_info_criteria`
--

CREATE TABLE IF NOT EXISTS `rate_info_criteria` (
  `criteria_id` int(5) DEFAULT NULL,
  `criteria_title` varchar(200) DEFAULT NULL,
  `criteria_rate` tinyint(5) DEFAULT NULL,
  `record_id` bigint(11) DEFAULT NULL,
  UNIQUE KEY `criteria_id` (`criteria_id`,`record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_info_criteria`
--

INSERT INTO `rate_info_criteria` (`criteria_id`, `criteria_title`, `criteria_rate`, `record_id`) VALUES
(1, 'Did not demonstrate inappropriate behavior - Zero Tolerance Policy', 40, 2),
(2, 'Did not deny service or refuse to escalate a customer when applicable', 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rate_info_question`
--

CREATE TABLE IF NOT EXISTS `rate_info_question` (
  `criteria_id` int(5) DEFAULT NULL,
  `question_id` int(5) DEFAULT NULL,
  `question_title` varchar(200) DEFAULT NULL,
  `question_score` smallint(5) DEFAULT NULL,
  `question_score_total` mediumint(5) DEFAULT NULL,
  `question_remark` tinytext,
  `question_overall_remark` text,
  `record_id` bigint(11) DEFAULT NULL,
  `final_score` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_info_question`
--

INSERT INTO `rate_info_question` (`criteria_id`, `question_id`, `question_title`, `question_score`, `question_score_total`, `question_remark`, `question_overall_remark`, `record_id`, `final_score`) VALUES
(1, 5, 'Question 3', 3, 3, 'test1', 'overall remark', 2, 24),
(1, 3, 'Question 1', 0, 3, 'test2', 'overall remark', 2, 24),
(1, 4, 'Question 2', 0, 3, 'test3', 'overall remark', 2, 24),
(2, 3, 'Question 1', 1, 2, 'test4', 'overall remark', 2, 60),
(2, 4, 'Question 2', 1, 2, 'test5', 'overall remark', 2, 60);

-- --------------------------------------------------------

--
-- Table structure for table `recordings`
--

CREATE TABLE IF NOT EXISTS `recordings` (
  `record_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `record_filename` varchar(200) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `unique_id` varchar(32) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `status` enum('1','2','3','4','5') DEFAULT NULL COMMENT '1=new,2=expired,3=pending,4=complete,5=pending to save',
  `recording_type` enum('0','1','2') NOT NULL COMMENT '0= voice, 1 = chat , 2 = others',
  PRIMARY KEY (`record_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `recordings`
--

INSERT INTO `recordings` (`record_id`, `record_filename`, `userid`, `unique_id`, `supervisor_id`, `date_created`, `status`, `recording_type`) VALUES
(1, 'abc.mp3', 1001, '1325553089.710321', 1000, '2013-05-09 12:08:02', '3', '0'),
(2, 'abcd.mp3', 1002, '1325553417.710341', 1000, '2013-05-09 12:08:02', '4', '0'),
(3, 'abcde.mp3', 1001, '1325553899.710371', 1000, '2013-05-10 12:08:02', '1', '0'),
(4, 'abcdef.mp3', 1002, '1325554601.710401', 1000, '2013-05-10 12:08:02', '1', '0'),
(5, 'abcdefg.mp3', 1001, '1325554678.710421', 1000, '2013-05-03 05:29:24', '3', '0'),
(6, 'abcdefgh.mp3', 1002, '1325554791.710441', 1000, '2013-05-14 05:29:24', '1', '0'),
(7, 'abcdefghi.mp3', 1001, '1325554974.710461', 1000, '2013-05-14 05:29:24', '1', '0'),
(8, 'abcdefghij.mp3', 1002, '1325554984.710471', 1000, '2013-05-17 05:29:24', '1', '0'),
(9, 'abcdefghijk.mp3', 1001, '1325554974.710461', 1000, '2013-05-17 05:29:24', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `recordings_and_qm`
--

CREATE TABLE IF NOT EXISTS `recordings_and_qm` (
  `record_id` bigint(11) DEFAULT NULL,
  `qm_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recordings_and_qm`
--

INSERT INTO `recordings_and_qm` (`record_id`, `qm_id`) VALUES
(2, 2),
(5, 5),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `tenantid` int(11) NOT NULL DEFAULT '0',
  `supervisor` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `userlevel` int(11) NOT NULL DEFAULT '0' COMMENT '0 - disabled, 1 - guest, 2 - agent, 3 - supervisor, 4 - administrator',
  `usercreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastlogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userexten` varchar(40) DEFAULT NULL,
  `sessionid` varchar(50) DEFAULT NULL,
  `userstatusid` int(11) DEFAULT '0',
  `apptype` varchar(50) DEFAULT NULL,
  `statustimestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastuserstatusid` int(11) DEFAULT '0',
  `pqueuetimeout` int(11) DEFAULT '0',
  `queueroutetype` int(11) DEFAULT '0',
  `queueroutevalue` varchar(50) DEFAULT NULL,
  `userdbstatus` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`userid`),
  KEY `fk_tenants` (`tenantid`),
  KEY `fk_userlevel` (`userlevel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1017 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `tenantid`, `supervisor`, `username`, `userpass`, `lastname`, `firstname`, `userlevel`, `usercreated`, `lastlogin`, `userexten`, `sessionid`, `userstatusid`, `apptype`, `statustimestamp`, `lastuserstatusid`, `pqueuetimeout`, `queueroutetype`, `queueroutevalue`, `userdbstatus`) VALUES
(1, 0, 0, 'admin', 'admin', 'Administrator', 'Administrator', 4, '2010-02-18 02:59:50', '2013-04-26 13:17:24', '', '', 0, 'webadmin', '2013-03-18 15:42:43', 1, 0, 0, NULL, 'A'),
(1000, 1, 0, 'sharon', '1234', '', 'Sharon', 3, '2011-03-26 15:10:03', '2013-04-26 14:07:22', '', '', 0, 'webadmin', '2013-02-19 10:17:01', 1, 0, 1, '', 'A'),
(1001, 1, 1000, 'Guna', '1234', 'Perumal', 'Gunaseelan', 2, '2011-03-26 15:11:37', '2013-03-26 14:21:32', '', '', 0, 'webadmin', '2013-03-18 16:16:34', 1, 0, 1, '4', 'A'),
(1002, 1, 1005, 'Fara', '1234', 'Binti Johari', 'Nurul Farahhin', 2, '2011-03-26 15:11:56', '2012-10-13 12:17:10', '', '', 0, 'webagent', '2012-10-13 12:33:21', 1, 0, 1, '4', 'A'),
(1003, 1, 1005, 'Faizal', '1234', 'Arshad', 'Faizal', 2, '2011-03-26 15:12:59', '2013-03-14 11:19:09', '', '', 0, 'webagent', '2013-03-14 11:26:23', 1, 0, 1, '1', 'A'),
(1004, 1, 1000, 'Yusri', '1234', 'Yunus', 'Mohd Yusri', 2, '2011-03-26 15:13:17', '2013-03-25 15:48:56', '', '', 0, 'webagent', '2013-03-25 15:58:55', 1, 0, 1, '1', 'A'),
(1005, 1, 0, 'gunaseelan', '1234', 'Perumal', 'Gunaseelan', 3, '2011-03-30 04:20:50', '2013-03-18 17:20:58', '', '', 0, 'webadmin', '2012-09-07 14:43:19', 1, 0, 1, '', 'A'),
(1006, 1, 1007, 'edwardagent', '1234', 'Tan', 'Edward', 2, '2011-05-30 08:19:44', '2013-04-30 12:06:16', '', '', 0, 'webagent', '2013-04-30 12:22:28', 1, 0, 1, '4', 'A'),
(1007, 1, 0, 'edward', '1234', '', '', 3, '2011-06-07 08:50:11', '2013-04-22 17:18:13', '', '', 0, 'webadmin', '2013-04-22 17:34:25', 1, 0, 1, '', 'A'),
(1008, 1, 1007, 'lu', '1234', 'Lim', 'Chieng Lu', 3, '2011-11-01 08:45:04', '2013-02-01 14:54:56', '', '', 0, 'webadmin', '0000-00-00 00:00:00', 0, 0, 1, '4', 'A'),
(1009, 1, 1005, 'Zaharah', '1234', 'Mustafa', 'Zaharah', 2, '2011-12-20 01:35:08', '2011-12-30 07:57:11', '', '', 0, 'webagent', '0000-00-00 00:00:00', 0, 0, 1, '14', 'D'),
(1012, 1, 1005, 'wanzaharah', '1234', 'Zaharah', 'Wan', 2, '2011-12-30 07:59:21', '2012-07-24 06:15:23', '', '', 0, 'webagent', '2012-07-24 08:20:39', 1000, 0, 1, '14', 'A'),
(1010, 1, 1005, 'Zaharah ', '1234', 'Mustafa', 'Zaharah ', 2, '2011-12-20 01:50:54', '2011-12-30 07:57:11', '', '', 0, 'webagent', '0000-00-00 00:00:00', 0, 0, 1, '4', 'D'),
(1011, 1, 1005, 'wan', '1234', 'Wan Mustafa', 'Wan Zaharah', 2, '2011-12-20 02:01:54', '2012-10-01 15:44:44', '', '', 0, 'webagent', '2012-10-01 15:51:57', 1003, 0, 1, '14', 'D'),
(1013, 1, 1005, 'Jason', '1234', 'Lim', 'ChengJoo', 2, '2012-05-25 06:46:46', '2012-07-24 06:14:45', '', '', 0, 'webagent', '2012-07-24 08:13:32', 1, 0, 1, '4', 'A'),
(1014, 0, 0, 'customer.test', '1234', '', '', 1, '2012-08-01 11:57:37', '0000-00-00 00:00:00', NULL, NULL, 0, NULL, '0000-00-00 00:00:00', 0, 0, 1, '', 'A'),
(1015, 1, 1000, 'jervis', '1234', 'jandusay', 'jervis', 2, '2012-09-03 02:44:03', '2013-04-30 16:13:23', '', '', 0, 'webagent', '2013-04-30 16:33:56', 1, 0, 1, '4', 'A'),
(1016, 1, 1007, 'jervissup', '1234', 'jandusay', 'jervis', 3, '2013-01-17 11:01:56', '2013-04-30 15:17:21', '', '', 0, 'webadmin', '2013-02-06 11:01:47', 1, 0, 1, '4', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `voice_tag`
--

CREATE TABLE IF NOT EXISTS `voice_tag` (
  `voice_tag_id` int(5) NOT NULL AUTO_INCREMENT,
  `record_id` bigint(11) DEFAULT NULL,
  `start_tag` varchar(6) DEFAULT NULL,
  `end_tag` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`voice_tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `voice_tag`
--

INSERT INTO `voice_tag` (`voice_tag_id`, `record_id`, `start_tag`, `end_tag`) VALUES
(1, 2, '0:45', '1:39'),
(2, 5, '0:52', '1:27'),
(4, 2, '1:44', '3:07'),
(5, 2, '1:18', '2:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
