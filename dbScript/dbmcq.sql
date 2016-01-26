-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2016 at 06:50 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbmcq`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`id` int(10) unsigned NOT NULL,
  `login_name` varchar(150) NOT NULL,
  `login_pass` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `login_name`, `login_pass`, `status`) VALUES
(1, 'admin', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans_log`
--

CREATE TABLE IF NOT EXISTS `tbl_ans_log` (
`id` int(10) unsigned NOT NULL,
  `ans_log` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exams`
--

CREATE TABLE IF NOT EXISTS `tbl_exams` (
`id` int(10) unsigned NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `exam_syllabus` text NOT NULL,
  `total_score` float NOT NULL,
  `pass_score` float NOT NULL,
  `duration` time NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_exam_schedule` (
`id` int(11) unsigned NOT NULL,
  `exam_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE IF NOT EXISTS `tbl_questions` (
`id` int(10) unsigned NOT NULL,
  `question_name` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL,
  `answer` text NOT NULL,
  `marks` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_archive`
--

CREATE TABLE IF NOT EXISTS `tbl_question_archive` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `date_used` datetime NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE IF NOT EXISTS `tbl_result` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `unanswered` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `post_time` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_subjects` (
`id` int(10) unsigned NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `enrollment_fee` float NOT NULL,
  `payment_type` varchar(150) NOT NULL,
  `time_period` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `status`) VALUES
(24, 'shashangka', 'shashangka@gmail.com', '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ans_log`
--
ALTER TABLE `tbl_ans_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exams`
--
ALTER TABLE `tbl_exams`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam_schedule`
--
ALTER TABLE `tbl_exam_schedule`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question_archive`
--
ALTER TABLE `tbl_question_archive`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ans_log`
--
ALTER TABLE `tbl_ans_log`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=330;
--
-- AUTO_INCREMENT for table `tbl_exams`
--
ALTER TABLE `tbl_exams`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_exam_schedule`
--
ALTER TABLE `tbl_exam_schedule`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `tbl_question_archive`
--
ALTER TABLE `tbl_question_archive`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
