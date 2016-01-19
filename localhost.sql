-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2016 at 12:30 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toptals_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_main`
--

CREATE TABLE IF NOT EXISTS `about_main` (
  `id` bigint(20) NOT NULL,
  `about_us_main` longtext NOT NULL,
  `who_we_are` longtext NOT NULL,
  `what_we_do` longtext NOT NULL,
  `what_we_look` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_main`
--

INSERT INTO `about_main` (`id`, `about_us_main`, `who_we_are`, `what_we_do`, `what_we_look`) VALUES
(1, 'The name “Yotta” is inspired from yotta byte which is thousand zettabytes. The word “Hive” is inspired from bee’s hive which gives shelter to many bee’s. When put together we are creating as many brands as we can which ideally are big and creates opportunities to many people.', 'We are a self funded early-stage technology startup based out of Chennai, India working on creating brands under different areas such as Internet of Things, Storage solutions, Mobile Payments, Sports Networking and Travel services.Vision Statement:Develop new brands that are customer centric. Acquire and maintain global leadership position in all brands we create. Continuously create new opportunities for growth in our strategic business. Bring inspiration and innovation to every person in the world. Investors relation and Employee satisfaction should always exceed expectations. Mission Statement: To empower and inspire people to live a healthier, more active life. Among ourselves we have several decades of experience in different sectors. All of us share a common belief in an open future.', 'We are a self funded early-stage technology startup based out of Chennai, India working on creating brands under different areas such as Internet of Things, Storage solutions, Mobile Payments, Sports Networking and Travel services.Vision Statement:Develop new brands that are customer centric. Acquire and maintain global leadership position in all brands we create. Continuously create new opportunities for growth in our strategic business. Bring inspiration and innovation to every person in the world. Investors relation and Employee satisfaction should always exceed expectations. Mission Statement: To empower and inspire people to live a healthier, more active life. Among ourselves we have several decades of experience in different sectors. All of us share a common belief in an open future.', 'We are a self funded early-stage technology startup based out of Chennai, India working on creating brands under different areas such as Internet of Things, Storage solutions, Mobile Payments, Sports Networking and Travel services.Vision Statement:Develop new brands that are customer centric. Acquire and maintain global leadership position in all brands we create. Continuously create new opportunities for growth in our strategic business. Bring inspiration and innovation to every person in the world. Investors relation and Employee satisfaction should always exceed expectations. Mission Statement: To empower and inspire people to live a healthier, more active life. Among ourselves we have several decades of experience in different sectors. All of us share a common belief in an open future.');

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(100) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_image` varchar(255) NOT NULL,
  `team_desprection` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `team_name`, `team_image`, `team_desprection`, `date_added`) VALUES
(3, 'John Mathew', 'aboutus-person1.png', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '2015-04-06 07:14:44'),
(4, 'John Mathew', 'aboutus-person2.png', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '2015-04-06 07:15:16'),
(5, 'John Mathew', 'aboutus-person3.png', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '2015-04-06 07:15:39'),
(7, 'sdafa', 'Chrysanthemum.jpg', 'asd', '2015-04-06 09:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(50) NOT NULL,
  `admin_userName` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_userName`, `admin_password`, `admin_email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'gagandeep@revinfotech.com');

-- --------------------------------------------------------

--
-- Table structure for table `after_payment`
--

CREATE TABLE IF NOT EXISTS `after_payment` (
  `id` bigint(15) NOT NULL,
  `organization_id` varchar(256) NOT NULL,
  `pay_date` varchar(200) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `session` mediumint(10) NOT NULL,
  `via` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `after_payment`
--

INSERT INTO `after_payment` (`id`, `organization_id`, `pay_date`, `plan`, `session`, `via`) VALUES
(1, '12', '2015-11-20 12:43:59', '15', 25, 'creditcard'),
(2, '12', '2015-11-20 12:44:29', '15', 25, 'creditcard'),
(3, '12', '2015-11-20 12:52:41', '15', 25, 'creditcard'),
(4, '13', '2015-11-23 10:37:13', '25', 50, 'creditcard'),
(5, '13', '2015-11-23 10:46:28', '299', 1000, 'creditcard'),
(6, '34', '2016-01-06 05:56:31', '15', 25, 'creditcard'),
(7, '34', '2016-01-06 05:57:07', '15', 25, 'creditcard'),
(8, '34', '2016-01-06 06:27:21', '15', 25, 'creditcard'),
(9, '34', '2016-01-09 12:43:19', '15.00', 0, 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `after_payment_session`
--

CREATE TABLE IF NOT EXISTS `after_payment_session` (
  `id` bigint(14) NOT NULL,
  `organization_id` bigint(14) NOT NULL,
  `all_session` bigint(14) NOT NULL,
  `used_session` bigint(14) NOT NULL,
  `remaining_session` bigint(14) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `after_payment_session`
--

INSERT INTO `after_payment_session` (`id`, `organization_id`, `all_session`, `used_session`, `remaining_session`) VALUES
(1, 1, 100, 7, 68),
(2, 8, 10, 0, 10),
(3, 9, 10, 0, 10),
(4, 10, 10, 0, 10),
(5, 11, 10, 0, 10),
(6, 12, 85, 1, 84),
(7, 13, 1060, 0, 1060),
(8, 14, 10, 0, 10),
(9, 15, 10, 0, 10),
(10, 16, 10, 0, 10),
(11, 17, 10, 0, 10),
(12, 18, 10, 0, 10),
(13, 19, 10, 0, 10),
(14, 20, 10, 0, 10),
(15, 21, 10, 0, 10),
(16, 22, 10, 0, 10),
(17, 23, 10, 0, 10),
(18, 24, 10, 0, 10),
(19, 25, 10, 0, 10),
(20, 26, 10, 0, 10),
(21, 27, 10, 0, 10),
(22, 28, 10, 0, 10),
(23, 29, 10, 0, 10),
(24, 30, 10, 0, 10),
(25, 31, 10, 1, 9),
(26, 32, 10, 0, 10),
(27, 33, 10, 2, 8),
(28, 34, 85, 1, 84),
(29, 35, 10, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` bigint(14) NOT NULL,
  `question_id` bigint(14) NOT NULL,
  `answer_title` varchar(256) NOT NULL,
  `correct` tinyint(1) NOT NULL COMMENT '1 means correct answer',
  `short_form_response` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 means short description require'
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `answer_title`, `correct`, `short_form_response`) VALUES
(1, 7, 'dfgdfg', 0, 0),
(2, 7, 'dfgxxcb', 1, 1),
(3, 7, 'ertertetr', 0, 0),
(4, 8, 'language', 1, 1),
(5, 8, 'color', 0, 0),
(6, 8, 'band', 0, 0),
(7, 8, 'syntax', 0, 0),
(8, 9, 'March 2 1933', 1, 1),
(9, 9, 'Sep 3 1999', 0, 0),
(10, 9, 'Apr 14 2005', 0, 0),
(11, 9, 'Nov 4 2012', 0, 0),
(12, 9, 'Dec 24 2013', 0, 0),
(13, 1, 'For new line', 1, 0),
(14, 1, 'For new paragraph', 0, 0),
(15, 2, 'For database connection', 1, 0),
(16, 2, 'For database selection', 0, 0),
(17, 2, 'For database deletion', 0, 0),
(18, 10, 'Boxs', 0, 0),
(19, 10, 'Boxes', 1, 0),
(20, 11, 'unclear', 1, 0),
(21, 11, 'disclear', 0, 0),
(22, 11, 'inclear', 0, 0),
(23, 12, 'wolfs', 0, 0),
(24, 12, 'wolfes', 0, 0),
(25, 12, 'wolves', 1, 0),
(26, 12, 'wolfen', 0, 0),
(27, 13, 'True', 1, 0),
(28, 13, 'False', 0, 0),
(29, 14, 'son of sun', 1, 0),
(30, 15, 'yes', 1, 0),
(31, 15, 'no', 0, 0),
(32, 16, 'better ask to shani', 1, 0),
(33, 16, 'better ask to pawan', 0, 0),
(34, 16, 'better ask to anuj', 0, 0),
(35, 17, 'rev ', 1, 0),
(36, 17, 'revinfotech', 0, 0),
(37, 18, 'for($i=0;$i<=10;$i++)\n{\nvalues\n}\n', 1, 0),
(38, 18, 'for[i=0;i<=10;i++] values', 0, 0),
(39, 18, 'for i = 0, i<=10 , i++', 0, 0),
(40, 19, 'Programming High Protocol', 0, 0),
(41, 19, 'Hypertext Preprocessor', 1, 0),
(42, 19, 'Parted Hypertext Programming', 0, 0),
(43, 20, 'aa', 1, 0),
(44, 20, 'ff', 0, 0),
(45, 20, 'sdsd', 0, 0),
(46, 21, 'fsdfds', 1, 0),
(47, 21, 'fsdfasf s', 0, 0),
(48, 21, 'fasfsadf ', 0, 0),
(49, 22, 'fsda fsad fsad', 1, 0),
(50, 22, 'fsdafsadfasd', 0, 0),
(51, 22, 'dafsadfsadfasdf', 0, 0),
(52, 23, 'new', 1, 0),
(53, 24, 'old', 0, 0),
(54, 25, 'first', 1, 0),
(55, 26, 'second', 1, 0),
(56, 27, 'third', 0, 0),
(57, 28, 'fourth\n', 0, 0),
(58, 29, 'fifth', 0, 0),
(59, 30, 'sixth', 0, 0),
(60, 31, 'seventh', 0, 0),
(61, 32, 'eight', 0, 0),
(62, 33, 'nine', 1, 0),
(63, 34, 'ten', 1, 0),
(64, 35, 'eleven', 1, 0),
(65, 36, 'twelth', 1, 0),
(66, 37, 'thirteen', 1, 0),
(71, 42, '5', 1, 0),
(72, 42, '-1', 1, 0),
(73, 43, '28', 1, 0),
(74, 44, '', 0, 0),
(75, 45, '', 0, 1),
(76, 46, 'dasdfasd', 0, 0),
(77, 47, '', 0, 0),
(78, 47, '', 0, 0),
(80, 49, 'bloom', 0, 0),
(81, 50, 'sevenfold red, orange, yellow, green, blue, indigo and violet', 0, 0),
(82, 51, '5', 1, 0),
(83, 52, '9', 1, 0),
(84, 53, '', 0, 0),
(85, 54, 'he natural agent that stimulates sight and makes things visible.', 1, 0),
(86, 55, 'fghgfhfd', 1, 0),
(88, 57, 'az', 1, 0),
(90, 59, 'c', 0, 0),
(91, 60, 'x', 0, 0),
(92, 61, 'a', 0, 0),
(93, 62, 'ddd', 0, 0),
(94, 63, 'sdds', 0, 0),
(95, 64, 'ffgg', 0, 0),
(96, 65, 'h', 0, 0),
(97, 66, 'j', 0, 0),
(98, 67, 'ggdf', 0, 0),
(99, 68, 'u', 0, 0),
(100, 69, 'd', 0, 0),
(101, 70, 'd', 0, 0),
(102, 71, '5', 0, 0),
(103, 72, 'y', 0, 0),
(104, 73, 'g', 0, 0),
(106, 75, 'f', 0, 0),
(107, 76, 'dfdfd', 0, 0),
(108, 77, 'h', 0, 0),
(109, 78, 'g', 0, 0),
(111, 80, 'c', 0, 0),
(112, 81, 'c', 0, 0),
(113, 82, 'q', 1, 0),
(114, 83, 'v', 0, 0),
(115, 84, 'q', 0, 0),
(116, 85, 'j', 0, 0),
(117, 86, 'f', 0, 0),
(118, 87, 'g', 0, 0),
(119, 88, 'c', 0, 0),
(120, 89, 'Hypertext Pre Prosessor', 1, 0),
(121, 89, 'Programming Hypertext Protocol', 0, 0),
(122, 89, 'Programming Hypertext Processor', 0, 0),
(123, 90, '4', 0, 0),
(124, 90, '3', 1, 0),
(125, 90, '2', 0, 0),
(126, 90, '1', 0, 0),
(127, 91, 'for(i=0;i<=10;i++) { expression }', 1, 0),
(128, 91, 'for(i0;i++){ expression }', 0, 0),
(129, 92, 'yes', 1, 0),
(130, 92, 'no', 0, 0),
(131, 93, 'buddy press', 1, 0),
(132, 93, 'biwi', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assign_student_exam`
--

CREATE TABLE IF NOT EXISTS `assign_student_exam` (
  `id` bigint(14) NOT NULL,
  `student_id` bigint(14) NOT NULL,
  `exam_id` bigint(14) NOT NULL,
  `assign_date` varchar(50) NOT NULL,
  `send_email` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_student_exam`
--

INSERT INTO `assign_student_exam` (`id`, `student_id`, `exam_id`, `assign_date`, `send_email`) VALUES
(1, 2, 1, '2015-04-01 11:44:06', 1),
(2, 2, 1, '2015-04-01 11:45:15', 1),
(3, 2, 1, '2015-04-01 11:45:50', 1),
(4, 2, 1, '2015-04-01 12:11:14', 1),
(7, 2, 1, '2015-04-01 12:18:41', 1),
(9, 2, 5, '2015-04-01 12:28:29', 1),
(10, 12, 1, '2015-06-01 07:56:31', 1),
(11, 16, 11, '2015-11-20 12:13:35', 0),
(12, 9, 20, '2015-12-15 10:52:15', 0),
(13, 3, 54, '2015-12-17 10:18:24', 0),
(14, 3, 55, '2015-12-21 11:21:16', 0),
(15, 3, 56, '2015-12-22 01:14:07', 0),
(16, 5, 54, '2015-12-22 01:15:49', 0),
(17, 5, 56, '2015-12-22 01:15:56', 0),
(18, 4, 57, '2015-12-22 01:38:38', 0),
(19, 4, 58, '2015-12-22 01:58:11', 0),
(20, 4, 59, '2015-12-22 02:41:51', 0),
(21, 4, 60, '2015-12-22 02:43:03', 0),
(22, 9, 20, '2016-01-04 11:34:44', 0),
(23, 7, 63, '2016-01-08 01:50:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_payment`
--

CREATE TABLE IF NOT EXISTS `credit_card_payment` (
  `id` bigint(20) NOT NULL,
  `organization_id` varchar(100) NOT NULL,
  `owner_email` varchar(250) NOT NULL,
  `fisrtname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `time_stamp` varchar(150) NOT NULL,
  `correlation_id` varchar(130) NOT NULL,
  `ack` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `build` varchar(100) NOT NULL,
  `avs_code` varchar(255) NOT NULL,
  `ccv_match` varchar(150) NOT NULL,
  `transacton_id` varchar(200) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card_payment`
--

INSERT INTO `credit_card_payment` (`id`, `organization_id`, `owner_email`, `fisrtname`, `lastname`, `amount`, `time_stamp`, `correlation_id`, `ack`, `version`, `build`, `avs_code`, `ccv_match`, `transacton_id`, `date_added`) VALUES
(17, '1', 'gurjeet@revinfotech.com', 'adam', 'singh', '25', '2015-04-03T05:03:54Z', 'eeb9b9762f845', 'Success', '53.0', '15840636', 'X', 'M', '3UE04030WS470390B', '2015-04-03 07:03:53'),
(18, '1', 'gurjeet@revinfotech.com', 'gurjeet', 'gjhgj', '15', '2015-04-24T09:24:51Z', '4dd918ec632b', 'Success', '53.0', '16204765', 'X', 'M', '94S652359J937793U', '2015-04-24 09:24:51'),
(19, '1', 'gurjeet@revinfotech.com', 'gurjeet', 'gjhgj', '15', '2015-04-24T09:27:08Z', '33eb4e48a3f9a', 'Success', '53.0', '16204765', 'X', 'M', '2W047218P23673719', '2015-04-24 09:27:08'),
(20, '1', 'gurjeet@revinfotech.com', 'gurjeet', 'gjhgj', '15', '2015-04-24T09:29:43Z', '7386e7ec9ff34', 'Success', '53.0', '16204765', 'X', 'M', '1UM37185KS755310G', '2015-04-24 09:29:43'),
(21, '1', 'gurjeet@revinfotech.com', 'fffff', 'fdfdf', '15', '2015-04-26T22:07:26Z', '6325043e3b6b', 'Success', '53.0', '16204765', 'X', 'M', '65S64524RB983094S', '2015-04-26 10:07:26'),
(22, '1', 'gurjeet@revinfotech.com', 'aaa', 'bbb', '15', '2015-05-01T12:03:04Z', '1a0a4e607ee0f', 'Success', '53.0', '16480744', 'X', 'M', '33S520847N395993U', '2015-05-01 12:03:04'),
(23, '12', 'shani@revinfotech.com', 'shani', 'shani', '15', '2015-11-20T06:44:00Z', 'b1cef03b36984', 'Success', '53.0', '18308778', 'X', 'M', '8YN06461H33130232', '2015-11-20 12:43:59'),
(24, '12', 'shani@revinfotech.com', 'shani', 'shani', '15', '2015-11-20T06:44:30Z', '744bf7d74e2aa', 'Success', '53.0', '18308778', 'X', 'M', '4ED652040D983692S', '2015-11-20 12:44:29'),
(25, '12', 'shani@revinfotech.com', 'shani', 'shani', '15', '2015-11-20T06:52:42Z', '688a1118450e7', 'Success', '53.0', '18308778', 'X', 'M', '3JT721283A1028051', '2015-11-20 12:52:41'),
(26, '13', 'vasantha@puyangan.com', 'vasantha', 'Ayinampudi', '25', '2015-11-24T04:37:14Z', '9014d557c0ca2', 'Success', '53.0', '18308778', 'X', 'M', '8WJ529242G072693K', '2015-11-23 10:37:13'),
(27, '13', 'vasantha@puyangan.com', 'vasantha', 'Ayinampudi', '299', '2015-11-24T04:46:28Z', '960d1181355ba', 'Success', '53.0', '18308778', 'X', 'M', '6WW33733S6341030B', '2015-11-23 10:46:28'),
(28, '34', 'raman@revinfotech.com', 'Raman', 'verma', '15', '2016-01-06T11:56:31Z', '8fac1ce4f2fec', 'Success', '53.0', '18308778', 'X', 'M', '54896180DP9666640', '2016-01-06 05:56:31'),
(29, '34', 'raman@revinfotech.com', 'Raman', 'verma', '15', '2016-01-06T11:57:07Z', '594b6732131df', 'Success', '53.0', '18308778', 'X', 'M', '5LS00483C19360647', '2016-01-06 05:57:07'),
(30, '34', 'raman@revinfotech.com', 'Raman', 'verma', '15', '2016-01-06T12:27:21Z', '3b09433c528e', 'Success', '53.0', '18308778', 'X', 'M', '8H896993V1483091X', '2016-01-06 06:27:21'),
(31, '1', 'harish-buyer@revinfotech.com', 'test', 'buyer', '15.00', '22:20:26 Jan 08, 2016 PST', '', 'Success', '3.8', '', 'X', 'M', '96A76988MG551625K', '2016-01-09 12:20:50'),
(32, '34', 'harish-buyer@revinfotech.com', 'test', 'buyer', '15.00', '22:40:49 Jan 08, 2016 PST', '', 'Success', '3.8', '', 'X', 'M', '0AB60361A1993133E', '2016-01-09 12:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `id` bigint(14) NOT NULL,
  `organization_id` bigint(14) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `exam_link` varchar(256) NOT NULL,
  `number_of_question` int(3) NOT NULL,
  `passmarks` varchar(10) NOT NULL,
  `time_limit` varchar(10) NOT NULL,
  `exam_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 means deactivated exam and 1 means activated',
  `full_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `bcc_results` tinyint(1) NOT NULL DEFAULT '0',
  `exam_banner` varchar(256) NOT NULL,
  `weighted_exam` tinyint(1) NOT NULL DEFAULT '0',
  `question_display` tinyint(1) NOT NULL DEFAULT '0',
  `show_final_score` tinyint(1) NOT NULL DEFAULT '0',
  `display_incorrect_answers_on_completion` tinyint(1) NOT NULL DEFAULT '0',
  `exam_code` varchar(100) NOT NULL,
  `styling` varchar(100) NOT NULL,
  `exam_introduction_text` longtext NOT NULL,
  `text_completion_success` longtext NOT NULL,
  `text_completion_fail` longtext NOT NULL,
  `email_invitation_note_optional` longtext NOT NULL,
  `automated_email_reminder_text` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `organization_id`, `exam_name`, `exam_link`, `number_of_question`, `passmarks`, `time_limit`, `exam_status`, `full_name`, `email`, `bcc_results`, `exam_banner`, `weighted_exam`, `question_display`, `show_final_score`, `display_incorrect_answers_on_completion`, `exam_code`, `styling`, `exam_introduction_text`, `text_completion_success`, `text_completion_fail`, `email_invitation_note_optional`, `automated_email_reminder_text`, `created_date`) VALUES
(12, 28, 'zczxc', 'http://toptals.com/student/12', 3, '3', '3', 1, 'Harish Kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-08 03:20:48'),
(14, 30, 'maths', 'http://toptals.com/student/14', 5, '80', '10', 1, 'Geetha', 'gee@puyangan.com', 0, '0', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-10 01:10:51'),
(16, 30, 'science', 'http://toptals.com/student/16', 5, '80', '5', 1, 'VASANTHA AYINAMPUDI', 'vasantha@puyangan.com', 0, '0', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-10 01:16:52'),
(17, 30, 'English', 'http://toptals.com/student/17', 5, '80', '5', 1, 'VASANTHA AYINAMPUDI', 'vasantha@puyangan.com', 0, '0', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-10 01:20:00'),
(18, 30, 'social', 'http://toptals.com/student/18', 5, '80', '5', 1, 'VASANTHA AYINAMPUDI', 'vasantha@puyangan.com', 0, '0', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-10 01:26:47'),
(19, 30, 'hindi', 'http://toptals.com/student/19', 5, '50', '5', 1, 'VASANTHA AYINAMPUDI', 'vasantha@puyangan.com', 0, '0', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-10 01:27:24'),
(51, 32, 'kk', 'http://toptals.com/student/51', 1, '1', '1', 1, 'gurii si', 'gurpreet.singh745@gmail.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-16 02:52:28'),
(53, 29, '1', 'http://toptals.com/student/53', 22, '18', '22', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-16 03:16:55'),
(54, 33, '11', 'http://toptals.com/student/54', 3, '3', '3', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-17 10:16:43'),
(55, 33, 'fsdsdf', 'http://toptals.com/student/55', 4, '4', '4', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-21 11:20:37'),
(56, 33, '44', 'http://toptals.com/student/56', 3, '4', '3', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-22 01:12:59'),
(57, 33, 'as', 'http://toptals.com/student/57', 4, '3', '3', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-22 01:36:23'),
(58, 33, 'we', 'http://toptals.com/student/58', 3, '3', '3', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-22 01:57:31'),
(59, 33, 'qa', 'http://toptals.com/student/59', 2, '2', '2', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-22 02:41:18'),
(60, 33, 'dd', 'http://toptals.com/student/60', 4, '4', '4', 1, 'harish kumar', 'harish@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2015-12-22 02:42:33'),
(62, 31, 'maths', 'http://toptals.com/student/62', 5, '5', '10', 1, 'Donald Duck', 'avmteja@gmail.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2016-01-07 12:36:54'),
(63, 34, 'php', 'http://toptals.com/student/63', 5, '70', '30', 1, 'Raman verma', 'raman@revinfotech.com', 0, '', 0, 0, 0, 0, '', '#ffffff', '', '', '', '', '', '2016-01-08 01:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE IF NOT EXISTS `exam_result` (
  `id` bigint(14) NOT NULL,
  `student_id` bigint(14) NOT NULL,
  `exam_id` bigint(14) NOT NULL,
  `session_id` bigint(14) NOT NULL,
  `exam_date` datetime NOT NULL,
  `marks_got` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `student_id`, `exam_id`, `session_id`, `exam_date`, `marks_got`) VALUES
(9, 2, 1, 1, '2015-05-20 07:39:53', '100'),
(10, 2, 1, 7, '2015-06-06 11:23:00', '0'),
(11, 16, 11, 11, '2015-11-20 12:14:30', '100'),
(12, 9, 20, 12, '2015-12-15 10:54:28', '0'),
(13, 3, 54, 13, '2015-12-17 10:19:12', '100'),
(14, 5, 54, 16, '2015-12-22 01:44:49', '100'),
(15, 7, 63, 23, '2016-01-08 01:51:47', '100');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `features_id` bigint(12) NOT NULL,
  `features_title` varchar(50) NOT NULL,
  `features_summary` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`features_id`, `features_title`, `features_summary`, `date_added`) VALUES
(4, 'Weighted questions', '-make harder questions worth more points', '2015-03-24 01:12:40'),
(5, 'SSL encryption', '-Enterprise security SSL encrytion on exams and ad', '2015-03-24 01:12:59'),
(6, 'Custom URL', '-Customise your student''s experience with a custom', '2015-03-24 01:13:18'),
(7, 'Email Reminders', '-Automatic email reminders to students that haven''', '2015-03-24 01:13:33'),
(8, 'Custom Logo', '-Upload your own logo', '2015-03-24 01:13:50'),
(9, 'Randomize Questions', '-The system randomly selects questions from your p', '2015-03-24 01:14:11'),
(10, 'Reporting Average', '-Scores,number of passes,number of fails,monthly r', '2015-03-24 01:14:28'),
(11, 'Admin Control Panel', '-Get up and running quickly with a simple administ', '2015-03-24 01:14:43'),
(12, 'test123', 'testing features functionality', '2015-04-10 12:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_post`
--

CREATE TABLE IF NOT EXISTS `homepage_post` (
  `homepage_id` int(2) NOT NULL,
  `homepage_title` varchar(200) NOT NULL,
  `homepage_summary` longtext NOT NULL,
  `homepage_details` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_post`
--

INSERT INTO `homepage_post` (`homepage_id`, `homepage_title`, `homepage_summary`, `homepage_details`) VALUES
(1, 'Who is TopTals for?', 'Simple-anyone that needs to quickly and easy create multiple choice exams.We automatically score the exams upon completion and notify the students of their scores.You don´t need to do anything else.', 'Simple-anyone that needs to quickly and easy create multiple choice exams.We automatically score the exams upon completion and notify the students of their scores.You don´t need to do anything else.Simple-anyone that needs to quickly and easy create multiple choice exams.We automatically score the exams upon completion and notify the students of their scores.You don´t need to do anything else.Simple-anyone that needs to quickly and easy create multiple choice exams.We automatically score the exams upon completion and notify the students of their scores.You don´t need to do anything else.'),
(2, 'How does it work?', 'Create your exam, enter your question and answer, sned the exam link to your students.That''s it - we take care of the rest.', 'Create your exam, enter your question and answer, sned the exam link to your students.That''s it - we take care of the rest.Create your exam, enter your question and answer, sned the exam link to your students.That''s it - we take care of the rest.Create your exam, enter your question and answer, sned the exam link to your students.That''s it - we take care of the rest.'),
(3, 'No Installation Required', 'TopTals is a cloud-based application - it runs 24/7.And you don´t need an IT department.We use web standards and secure web technology - you and your students don´t need to install anything.', 'TopTals is a cloud-based application - it runs 24/7.And you don´t need an IT department.We use web standards and secure web technology - you and your students don´t need to install anything.TopTals is a cloud-based application - it runs 24/7.And you don´t need an IT department.We use web standards and secure web technology - you and your students don´t need to install anything.TopTals is a cloud-based application - it runs 24/7.And you don´t need an IT department.We use web standards and secure web technology - you and your students don´t need to install anything.'),
(4, 'Convenient for Students', 'Let your students sit their exam when they´re ready, where ever they like. Why force them to go to a testing center when they can sit an exam from the convenience of their own computer?', 'Let your students sit their exam when they´re ready, where ever they like. Why force them to go to a testing center when they can sit an exam from the convenience of their own computer?Let your students sit their exam when they´re ready, where ever they like. Why force them to go to a testing center when they can sit an exam from the convenience of their own computer?Let your students sit their exam when they´re ready, where ever they like. Why force them to go to a testing center when they can sit an exam from the convenience of their own computer?');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` bigint(14) NOT NULL,
  `organization_username` varchar(250) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `owner_first_name` varchar(100) NOT NULL,
  `owner_last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `subdomain` varchar(200) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `number_of_session` varchar(10) NOT NULL,
  `pending_session` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `organization_username`, `organization_name`, `owner_email`, `owner_first_name`, `owner_last_name`, `password`, `subdomain`, `created_date`, `number_of_session`, `pending_session`) VALUES
(1, 'revin', 'org', 'gurjeet@revinfotech.com', 'aaa', 'bbb', '9c20dd6ac13b74b178ce2d3df2d1674a', 'sub', '2015-03-18 07:17:09', '', ''),
(6, 'myvirtual', 'Myvirtual', 'deepak@revinfotech.com', 'John', 'Clarke', 'ed2b1f468c5f915f3f1cf75d7068baae', 'myvirtual', '2015-04-01 07:00:02', '', ''),
(8, 'navdeep', 'test', 'navdeep@revinfotech.com', 'navdeep', 'garg', 'b0fd9e8c853a93258f5ffe365fefc2ab', 'rev11', '2015-11-17 12:52:30', '', ''),
(12, 'shani', 'shani', 'shani@revinfotech.com', 'shani', 'shani', 'e51676fc29af8a3cff40acab1e37a2ef', 'shani', '2015-11-19 05:37:22', '', ''),
(30, 'avmteja', 'Holy Mary High School', 'vasantha@puyangan.com', 'VASANTHA', 'AYINAMPUDI', '423b1157210c2aa433aca8e0461d4131', 'Holymary', '2015-12-10 01:09:09', '', ''),
(31, 'donald', 'cartoonnetwork', 'avmteja@gmail.com', 'Donald', 'Duck', '827ccb0eea8a706c4c34a16891f84e7b', 'cartoonnetwork', '2015-12-14 12:21:38', '', ''),
(32, 'gurii', 'gbi school', 'gurpreet.singh745@gmail.com', 'gurii', 'si', '827ccb0eea8a706c4c34a16891f84e7b', 'gurii', '2015-12-16 02:41:53', '', ''),
(33, 'harish', 'harish', 'harish@revinfotech.com', 'harish', 'kumar', '698c9634246010398e8c427bdd12d374', 'harish', '2015-12-17 02:37:30', '', ''),
(34, 'ramanverma', 'raman', 'raman@revinfotech.com', 'Raman', 'verma', '3e8961306a7d9c49c15e97d4943b2529', 'raman', '2015-12-26 03:12:09', '', ''),
(35, 'raj', 'rps', 'rajwinder@revinfotech.com', 'rajwinder', 'si', '827ccb0eea8a706c4c34a16891f84e7b', 'raj', '2015-12-28 05:03:13', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `plan_id` bigint(15) NOT NULL,
  `plan_title` varchar(50) NOT NULL,
  `plan_amount` varchar(50) NOT NULL,
  `plan_summary` varchar(255) NOT NULL,
  `no_of_test` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `plan_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = true'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`plan_id`, `plan_title`, `plan_amount`, `plan_summary`, `no_of_test`, `date_added`, `plan_status`) VALUES
(27, 'TESTS 1', '15', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '25', '2015-03-24 09:47:07', 1),
(28, 'TESTS 2', '25', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '50', '2015-03-24 09:47:53', 1),
(29, 'TESTS 3', '99', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '250', '2015-03-24 09:48:27', 1),
(30, 'TESTS 4', '299', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '1000', '2015-03-24 09:48:53', 1),
(31, '100 Tests', '100', 'Custom exam logo Create user accounts Automatic marking Automatic results notifications', '100', '2015-04-10 12:08:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` bigint(14) NOT NULL,
  `exam_id` bigint(14) NOT NULL,
  `organization_id` bigint(12) NOT NULL,
  `question_title` longtext NOT NULL,
  `marks_assign` int(3) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 means deactive and 1 means active'
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `exam_id`, `organization_id`, `question_title`, `marks_assign`, `status`) VALUES
(1, 1, 1, 'Where we use br tag', 1, 1),
(2, 1, 1, 'What is mysql_connect', 1, 1),
(7, 1, 1, 'what is html', 1, 1),
(8, 1, 1, 'what is php', 1, 1),
(9, 9, 1, 'when was king kong movie released?', 1, 1),
(10, 5, 1, 'Plural of box will be', 1, 1),
(11, 5, 1, 'Which prefix to use with clear', 1, 1),
(12, 5, 1, 'what is the plural of wolf', 1, 1),
(13, 5, 1, 'An auxiliary verb helps the main (full) verb and is also called a helping verb.', 1, 1),
(14, 10, 8, 'who is shani', 1, 1),
(15, 10, 8, 'shani is  angry plant ', 1, 1),
(16, 10, 8, 'define shani', 1, 1),
(17, 10, 8, 'define revinfotech', 1, 1),
(18, 11, 12, 'what is the correct format of php for loop?', 1, 1),
(19, 11, 12, 'what is the full form of PHP', 1, 1),
(20, 11, 12, 'hshfhsjakhfjkhsd fjhsdafhlsa hfhsdalj fhlkjasdh fkjhadskjfhsladk', 1, 1),
(21, 11, 12, 'fsadf sdf sdaf asdf sdf sdaf asdfafdsaf ', 1, 1),
(22, 11, 12, 'fads fasdf asdfasfas saf sa ', 1, 1),
(23, 12, 28, 'hahahah', 1, 1),
(24, 12, 28, 'lululu', 1, 1),
(25, 15, 28, 'this is the first question', 1, 1),
(26, 15, 28, 'this is the second question', 1, 1),
(27, 15, 28, 'this is the third question', 1, 1),
(28, 15, 28, 'this is the fourth question', 1, 1),
(29, 15, 28, 'this is the fifthe question', 1, 1),
(30, 15, 28, 'this is the sixth question', 1, 1),
(31, 15, 28, 'seventh', 1, 1),
(32, 15, 28, 'eigth', 1, 1),
(33, 15, 28, 'nine', 1, 1),
(34, 15, 28, 'tenth', 1, 1),
(35, 15, 28, 'eleven', 1, 1),
(36, 15, 28, 'twelth', 1, 1),
(37, 15, 28, 'thirteen', 1, 1),
(42, 17, 13, 'A = 2\nB = 3\nA+B AND A-B', 1, 1),
(43, 17, 13, 'A= 4\nB = 7\nA * B', 1, 1),
(44, 19, 13, '', 1, 1),
(45, 19, 13, 'dnfasd', 1, 1),
(46, 19, 13, '', 1, 1),
(47, 19, 13, '', 1, 1),
(49, 20, 28, 'what is a flower', 1, 1),
(50, 21, 28, 'what are rainbow colors', 1, 1),
(51, 14, 30, '2+3', 1, 1),
(52, 14, 30, '5+4', 1, 1),
(53, 15, 30, 'defination of light', 1, 1),
(54, 16, 30, 'definition of light', 1, 1),
(55, 22, 29, 'hgfhfghghgfh', 1, 1),
(57, 22, 29, 'qwerty', 1, 1),
(59, 25, 29, 'xcvbb', 1, 1),
(60, 26, 29, 'cvxcvxcvxc', 1, 1),
(61, 33, 29, 'aa', 1, 1),
(62, 34, 29, 'cdcvdfsc', 1, 1),
(63, 34, 29, 'dcds', 1, 1),
(64, 35, 29, 'hghgfhfg', 1, 1),
(65, 36, 29, 'm.,.m,.', 1, 1),
(66, 36, 29, 'hkhkh', 1, 1),
(67, 36, 29, 'fdgfdgdf', 1, 1),
(68, 37, 29, 'jjhjhuu', 1, 1),
(69, 38, 29, 'wszdxzc', 1, 1),
(70, 38, 29, 'sdfdfsd', 1, 1),
(71, 39, 29, 'fghfghx', 1, 1),
(72, 39, 29, 'gfhgh', 1, 1),
(73, 46, 29, 'fdgdfg', 1, 1),
(75, 49, 32, 'fgdfgdfgd', 1, 1),
(76, 49, 32, 'ffdffdd', 1, 1),
(77, 49, 32, 'tyutyutyhjyt', 1, 1),
(78, 51, 32, 'nfgnfgc', 1, 1),
(80, 53, 29, 'ssdcvsdcsd', 1, 1),
(81, 53, 29, 'cccccsdcsc', 1, 1),
(82, 54, 33, 'qwert', 1, 1),
(83, 55, 33, 'gfgdfsg', 1, 1),
(84, 56, 33, 'qwe', 1, 1),
(85, 57, 33, 'm,mn', 1, 1),
(86, 57, 33, 'ffghf', 1, 1),
(87, 58, 33, 'dfgdfg', 1, 1),
(88, 59, 33, 'fxvc', 1, 1),
(89, 63, 34, 'What is the full form of PHP?', 1, 1),
(90, 63, 34, 'how many kind of loops are in php', 1, 1),
(91, 63, 34, 'which is the correct for loop syntax', 1, 1),
(92, 63, 34, 'does switch case exist in php', 1, 1),
(93, 63, 34, 'what is the bb', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` bigint(14) NOT NULL,
  `student_first_name` varchar(100) NOT NULL,
  `student_last_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `organization_id` bigint(14) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `crm_id` varchar(50) NOT NULL,
  `student_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 means enable student and 0 means disable',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_first_name`, `student_last_name`, `student_email`, `password`, `organization_id`, `company_name`, `crm_id`, `student_status`, `created_date`) VALUES
(3, 'gurpreet', 'singh', 'gurpreet@revinfotech.com', '827ccb0eea8a706c4c34a16891f84e7b', 33, 'rev', '12', 1, '2015-12-17 04:09:59'),
(4, 'gurii', 'si', 'gurpreetgurii745@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 33, 'fgxfgxfgx', '', 1, '2015-12-21 06:44:04'),
(5, 'gopi', 'si', 'gurpreet.singh745@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 33, 'aa', '', 1, '2015-12-21 11:31:42'),
(6, 'krishna', 'k', 'avmteja@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 31, '', '', 1, '2015-12-24 01:17:57'),
(7, 'jatin', 'verma', 'jatin@revinfotech.com', 'd9a9046d60f3ec4358ba9e9594d5f1a7', 34, 'jatin', '', 1, '2015-12-26 03:47:09'),
(8, 'gurii', 'si', 'gurpreet.singh@revinfotech.com', '827ccb0eea8a706c4c34a16891f84e7b', 35, 'qaz', '', 1, '2015-12-28 05:06:56'),
(9, 'haha', 'haha', 'tejavasantha@rediffmail.com', 'e10adc3949ba59abbe56e057f20f883e', 31, '', '', 1, '2016-01-04 11:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_question_answer`
--

CREATE TABLE IF NOT EXISTS `student_question_answer` (
  `id` bigint(14) NOT NULL,
  `student_id` bigint(14) NOT NULL,
  `question_id` bigint(14) NOT NULL,
  `answer_id` bigint(14) NOT NULL,
  `correct_answer_id` bigint(15) NOT NULL,
  `short_form_response` longtext NOT NULL,
  `session_id` bigint(14) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_question_answer`
--

INSERT INTO `student_question_answer` (`id`, `student_id`, `question_id`, `answer_id`, `correct_answer_id`, `short_form_response`, `session_id`) VALUES
(16, 2, 1, 13, 13, '0', 1),
(17, 2, 7, 2, 2, '', 1),
(18, 2, 1, 0, 13, '0', 7),
(19, 2, 2, 0, 15, '0', 7),
(20, 2, 7, 0, 2, '', 7),
(21, 2, 8, 0, 4, '', 7),
(22, 16, 18, 37, 37, '0', 11),
(23, 16, 19, 41, 41, '0', 11),
(24, 16, 20, 43, 43, '0', 11),
(25, 16, 21, 46, 46, '0', 11),
(26, 16, 22, 49, 49, '0', 11),
(27, 9, 49, 80, 0, '0', 12),
(28, 3, 82, 113, 113, '0', 13),
(29, 5, 82, 113, 113, '0', 16),
(30, 7, 89, 120, 120, '0', 23),
(31, 7, 90, 124, 124, '0', 23),
(32, 7, 91, 127, 127, '0', 23),
(33, 7, 92, 129, 129, '0', 23),
(34, 7, 93, 131, 131, '0', 23);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `testimonial_id` bigint(12) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `testimonial_rating` int(2) NOT NULL,
  `testimonial_summary` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `image`, `name`, `testimonial_rating`, `testimonial_summary`, `email`, `date_added`) VALUES
(5, 'ngbc-logo.png', 'NZGBC', 4, 'GBCA has conducted over 9,800 sessions since 2008 for their Green Star Accredited Professional program', 'indian@indiana.com', '1899-11-15 00:00:00'),
(6, 'indiana-jones-img.png', 'Indiana Jones', 2, 'I searched in vain for a platform that could provide the efficient and flexible exam package that I required. Then I came across Braincog. Since signing up I have nothing but praise for the intuitive exam creation and the easy administration of student sessions. I couldn’t recommend this platform more highly, and the value for money remains astonishing. Chris Bryden, Barrister, 4 King''s Bench Walk, London.', 'indian@indiana.com', '1899-11-28 00:00:00'),
(8, 'green-logo-img.png', 'Green Building ', 5, '', 'indian@indiana.com', '1900-01-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `who_use_toptals`
--

CREATE TABLE IF NOT EXISTS `who_use_toptals` (
  `logo_id` bigint(30) NOT NULL,
  `logo_name` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `who_use_toptals`
--

INSERT INTO `who_use_toptals` (`logo_id`, `logo_name`, `logo_path`) VALUES
(42, 'cpy-logo2.png', 'D:/xampp/htdocs/toptals/upload/cpy-logo2.png'),
(43, 'cpy-logo3.png', 'D:/xampp/htdocs/toptals/upload/cpy-logo3.png'),
(44, 'cpy-logo4.png', 'D:/xampp/htdocs/toptals/upload/cpy-logo4.png'),
(45, 'cpy-logo5.png', 'D:/xampp/htdocs/toptals/upload/cpy-logo5.png'),
(48, 'cpy-logo12.png', 'D:/xampp/htdocs/toptals/upload/cpy-logo12.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_main`
--
ALTER TABLE `about_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `after_payment`
--
ALTER TABLE `after_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `after_payment_session`
--
ALTER TABLE `after_payment_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_student_exam`
--
ALTER TABLE `assign_student_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_card_payment`
--
ALTER TABLE `credit_card_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`features_id`);

--
-- Indexes for table `homepage_post`
--
ALTER TABLE `homepage_post`
  ADD PRIMARY KEY (`homepage_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_question_answer`
--
ALTER TABLE `student_question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `who_use_toptals`
--
ALTER TABLE `who_use_toptals`
  ADD PRIMARY KEY (`logo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `after_payment`
--
ALTER TABLE `after_payment`
  MODIFY `id` bigint(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `after_payment_session`
--
ALTER TABLE `after_payment_session`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `assign_student_exam`
--
ALTER TABLE `assign_student_exam`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `credit_card_payment`
--
ALTER TABLE `credit_card_payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `features_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `homepage_post`
--
ALTER TABLE `homepage_post`
  MODIFY `homepage_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `plan_id` bigint(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student_question_answer`
--
ALTER TABLE `student_question_answer`
  MODIFY `id` bigint(14) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `who_use_toptals`
--
ALTER TABLE `who_use_toptals`
  MODIFY `logo_id` bigint(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
