-- phpMyAdmin SQL Dump
-- version 4.1.14.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2015 at 04:48 AM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invest_toptals_w`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `question_id` bigint(14) NOT NULL,
  `answer_title` varchar(256) NOT NULL,
  `correct` tinyint(1) NOT NULL COMMENT '1 means correct answer',
  `short_form_response` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 means short description require',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assign_student_exam`
--

CREATE TABLE IF NOT EXISTS `assign_student_exam` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(14) NOT NULL,
  `exam_id` bigint(14) NOT NULL,
  `assign_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `organisation_id` bigint(14) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `exam_link` varchar(256) NOT NULL,
  `number_of_question` int(3) NOT NULL,
  `passmarks` varchar(10) NOT NULL,
  `exam_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 means deactivated exam and 1 means activated',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE IF NOT EXISTS `exam_result` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(14) NOT NULL,
  `exam_id` bigint(14) NOT NULL,
  `exam_date` datetime NOT NULL,
  `marks_got` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `organisation_name` varchar(100) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `owner_first_name` varchar(100) NOT NULL,
  `owner_last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `subdomain` varchar(200) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `number_of_session` varchar(10) NOT NULL,
  `pending_session` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `exam_id` bigint(14) NOT NULL,
  `question_title` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 means deactive and 1 means active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `student_first_name` varchar(100) NOT NULL,
  `student_last_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `organisation_id` bigint(14) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `student_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 means enable student and 0 means disable',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_question_answer`
--

CREATE TABLE IF NOT EXISTS `student_question_answer` (
  `id` bigint(14) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(14) NOT NULL,
  `question_id` bigint(14) NOT NULL,
  `answer_id` bigint(14) NOT NULL,
  `short_form_response` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
