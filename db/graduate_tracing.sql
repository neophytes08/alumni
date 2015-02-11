-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2015 at 10:47 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `graduate_tracing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin_profile`
--

CREATE TABLE IF NOT EXISTS `tbladmin_profile` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE IF NOT EXISTS `tblcourse` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `department_id` int(10) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`course_id`, `course_name`, `department_id`) VALUES
(22, 'bs in information technology', 16),
(23, 'bs in architecture', 17),
(27, 'bs in sddsaas', 18),
(28, 'bs in dsadssa', 18),
(29, 'bs in bs in d', 18),
(31, 'bs in bs in bs in d', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE IF NOT EXISTS `tbldepartment` (
  `department_id` int(10) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`department_id`, `department_name`) VALUES
(16, 'department of information technology'),
(17, 'department of engineering'),
(18, 'department of education');

-- --------------------------------------------------------

--
-- Table structure for table `tblelementary`
--

CREATE TABLE IF NOT EXISTS `tblelementary` (
  `elementary_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `school_name_elementary` varchar(255) NOT NULL,
  `school_address_elementary` varchar(255) NOT NULL,
  `year_graduated_elementary` date NOT NULL,
  `awards_received_elementary` varchar(255) DEFAULT NULL,
  `status` enum('accepted','pending') NOT NULL,
  PRIMARY KEY (`elementary_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `tblelementary`
--

INSERT INTO `tblelementary` (`elementary_id`, `user_id`, `school_name_elementary`, `school_address_elementary`, `year_graduated_elementary`, `awards_received_elementary`, `status`) VALUES
(119, 299, 'bugo central school', 'bugo', '2005-01-18', 'none', 'pending'),
(123, 349, 'dsads', 'dsadsa', '2015-02-18', 'sadsad', 'pending'),
(124, 350, 'mike', 'mike', '2015-02-04', 'mike', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployment_record`
--

CREATE TABLE IF NOT EXISTS `tblemployment_record` (
  `employent_id` int(10) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_country` varchar(255) NOT NULL,
  `company_city` varchar(255) NOT NULL,
  `company_business_type` varchar(50) NOT NULL,
  `employment_sector` varchar(50) NOT NULL,
  `employment_type` varchar(50) NOT NULL,
  `employment_position` varchar(50) NOT NULL,
  `employment_salary` varchar(50) NOT NULL,
  `employment_status` varchar(10) NOT NULL,
  `employment_duration_from` date NOT NULL,
  `employment_duration_to` date NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`employent_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblgradList`
--

CREATE TABLE IF NOT EXISTS `tblgradList` (
  `grad_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `extention_name` enum('Jr','Sr') NOT NULL,
  `course` varchar(255) NOT NULL,
  PRIMARY KEY (`grad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblgradList`
--

INSERT INTO `tblgradList` (`grad_id`, `fname`, `mname`, `lname`, `extention_name`, `course`) VALUES
(1, 'unique nina faye', 'laput', 'tomas', '', 'bs in information technology'),
(2, 'sample', 'sample', 'sample', '', 'bs in information technology');

-- --------------------------------------------------------

--
-- Table structure for table `tblgrad_profile`
--

CREATE TABLE IF NOT EXISTS `tblgrad_profile` (
  `profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `extention_name` enum('Sr','Jr') DEFAULT NULL,
  `birthdate` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `tele_no` varchar(200) NOT NULL,
  `citizenship` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `barangay` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` enum('accepted','pending') NOT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `tblgrad_profile`
--

INSERT INTO `tblgrad_profile` (`profile_id`, `user_id`, `fname`, `mname`, `lname`, `extention_name`, `birthdate`, `gender`, `email`, `mobile_no`, `tele_no`, `citizenship`, `street`, `barangay`, `city`, `province`, `picture`, `status`) VALUES
(243, 299, 'allan cheam', 'vallente', 'alzula', '', '1993-08-08', 'Male', 'allan.alzula@gmail.com', '09265105102', '88-888-09', 'Filipino', 'zone 3', 'bugo', 'cagayan de oro city', 'misamis oriental', 'ahw1.jpg', 'pending'),
(244, 349, 'dsadad', 'dsad', 'dsaa', '', '2015-02-18', 'Male', 'das@das', '1111', '2323', '', 'dsadsa', 'dsadads', 'asdsa', 'dsad', 'default.jpg', 'pending'),
(245, 350, 'mike', 'mike', 'mike', '', '1993-08-07', 'Male', 'mike@mike', '2112212', '12121', 'dass', 'mike', 'mike', 'mike', 'mike', 'default.jpg', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE IF NOT EXISTS `tbllogs` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_name` varchar(255) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpending`
--

CREATE TABLE IF NOT EXISTS `tblpending` (
  `pending_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `extention_name` enum('Jr','Sr') DEFAULT NULL,
  `course` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`pending_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblpending`
--

INSERT INTO `tblpending` (`pending_id`, `fname`, `mname`, `lname`, `extention_name`, `course`, `email`) VALUES
(1, 'bertwin', 'wayne', 'romero', '', 'bs in information technology', 'bertwin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblsecondary`
--

CREATE TABLE IF NOT EXISTS `tblsecondary` (
  `secondary_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `school_name_secondary` varchar(50) NOT NULL,
  `school_address_secondary` varchar(50) NOT NULL,
  `year_graduated_secondary` date NOT NULL,
  `awards_received_secondary` varchar(50) DEFAULT NULL,
  `status` enum('accepted','pending') NOT NULL,
  PRIMARY KEY (`secondary_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Dumping data for table `tblsecondary`
--

INSERT INTO `tblsecondary` (`secondary_id`, `user_id`, `school_name_secondary`, `school_address_secondary`, `year_graduated_secondary`, `awards_received_secondary`, `status`) VALUES
(211, 299, 'bugo national high school', 'reyes bugo', '2010-03-10', 'none', 'pending'),
(214, 349, 'asdsad', 'sdsads', '2015-02-19', 'dasdsadsd', 'pending'),
(215, 350, 'mike', 'mike', '2015-02-11', 'mike', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblspecialization_obe`
--

CREATE TABLE IF NOT EXISTS `tblspecialization_obe` (
  `obe_id` int(10) NOT NULL AUTO_INCREMENT,
  `obe_name` varchar(255) NOT NULL,
  `course_id` int(10) NOT NULL,
  PRIMARY KEY (`obe_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tblspecialization_obe`
--

INSERT INTO `tblspecialization_obe` (`obe_id`, `obe_name`, `course_id`) VALUES
(2, 'web design', 22),
(3, 'database administrator', 22),
(4, 'pc hardware', 22),
(5, 'it consultant', 22),
(8, 'house design', 23),
(11, 'land scaping', 23),
(12, 'sample', 28),
(16, 'sadsadsad', 23),
(17, 'sample', 23),
(18, 'House Designs', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE IF NOT EXISTS `tblstatus` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `account_status` enum('done','undone') NOT NULL,
  `survey_status` enum('done','undone') NOT NULL,
  `email_status` enum('done','undone') NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblsurvey`
--

CREATE TABLE IF NOT EXISTS `tblsurvey` (
  `survey_id` int(10) NOT NULL AUTO_INCREMENT,
  `survey_year` int(10) NOT NULL,
  `survey_status` enum('activate','deactivate') NOT NULL,
  `course_id` int(10) NOT NULL,
  PRIMARY KEY (`survey_id`),
  KEY `course_id` (`course_id`),
  KEY `survey_year` (`survey_year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblsurvey`
--

INSERT INTO `tblsurvey` (`survey_id`, `survey_year`, `survey_status`, `course_id`) VALUES
(1, 19, 'activate', 22),
(3, 18, 'deactivate', 22),
(4, 19, 'deactivate', 23),
(5, 17, 'deactivate', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tblsurvey_status`
--

CREATE TABLE IF NOT EXISTS `tblsurvey_status` (
  `statusID` int(10) NOT NULL AUTO_INCREMENT,
  `year_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` enum('done','undone') NOT NULL,
  `survey_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  PRIMARY KEY (`statusID`),
  KEY `year_id` (`year_id`),
  KEY `user_id` (`user_id`),
  KEY `survey_id` (`survey_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbltertiary`
--

CREATE TABLE IF NOT EXISTS `tbltertiary` (
  `tertiary_id` int(10) NOT NULL AUTO_INCREMENT,
  `academic_level_tertiary` varchar(244) NOT NULL,
  `school_name_tertiary` varchar(255) NOT NULL,
  `school_address_tertiary` varchar(255) NOT NULL,
  `degree_tertiary` int(10) DEFAULT NULL,
  `year_from_tertiary` date DEFAULT NULL,
  `year_to_tertiary` date DEFAULT NULL,
  `year_graduated_tertiary` date DEFAULT NULL,
  `awards_received_tertiary` varchar(255) DEFAULT NULL,
  `thesis_project_tertiary` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `status` enum('accepted','pending') NOT NULL,
  PRIMARY KEY (`tertiary_id`),
  KEY `user_id` (`user_id`),
  KEY `degree_tertiary` (`degree_tertiary`),
  KEY `degree_tertiary_2` (`degree_tertiary`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=218 ;

--
-- Dumping data for table `tbltertiary`
--

INSERT INTO `tbltertiary` (`tertiary_id`, `academic_level_tertiary`, `school_name_tertiary`, `school_address_tertiary`, `degree_tertiary`, `year_from_tertiary`, `year_to_tertiary`, `year_graduated_tertiary`, `awards_received_tertiary`, `thesis_project_tertiary`, `user_id`, `status`) VALUES
(209, 'College', 'Mindanao University of Science and Technology', 'CM Recto Lapasan, Cagayan de Oro City', 22, '2010-03-09', '2015-03-09', '2015-03-08', 'none', 'graduate tracer', 299, 'pending'),
(215, 'College', 'Mindanao University of Science and Technology', 'CM Recto Lapasan Cagayan De Oro City', 22, '2015-02-04', '2015-02-10', '2015-02-18', 'dsds', 'sadsad', 349, 'pending'),
(216, 'College', 'Mindanao University of Science and Technology', 'CM Recto Lapasan Cagayan De Oro City', 22, '2015-02-05', '2015-01-28', '2015-02-26', 'mike', 'mike', 350, 'pending'),
(217, 'Graduate', 'Mindanao University of Science and Technology', 'CM Recto Lapasan Cagayan De Oro City', 23, '2015-02-03', '2015-02-02', '2015-02-04', 'mike', 'mike', 350, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_acc`
--

CREATE TABLE IF NOT EXISTS `tbluser_acc` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` enum('admin','user') NOT NULL,
  `level` enum('master','child') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=351 ;

--
-- Dumping data for table `tbluser_acc`
--

INSERT INTO `tbluser_acc` (`user_id`, `username`, `password`, `position`, `level`, `email`) VALUES
(298, 'admin', 'admin123', 'admin', 'master', 'allan.alzula@gmail.com'),
(299, 'allan', 'user123', 'user', NULL, 'allan.alzula@gmail.com'),
(349, 'dsadad123', 'user123', 'user', NULL, 'das@das'),
(350, 'mike123', 'user123', 'user', NULL, 'mike@mike');

-- --------------------------------------------------------

--
-- Table structure for table `tblyear`
--

CREATE TABLE IF NOT EXISTS `tblyear` (
  `year_id` int(10) NOT NULL AUTO_INCREMENT,
  `year_name` varchar(20) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tblyear`
--

INSERT INTO `tblyear` (`year_id`, `year_name`) VALUES
(6, '2001'),
(7, '2002'),
(8, '2003'),
(9, '2004'),
(10, '2005'),
(11, '2006'),
(12, '2007'),
(13, '2008'),
(14, '2009'),
(15, '2010'),
(16, '2011'),
(17, '2012'),
(18, '2013'),
(19, '2014');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbladmin_profile`
--
ALTER TABLE `tbladmin_profile`
  ADD CONSTRAINT `tbladmin_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD CONSTRAINT `tblcourse_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `tbldepartment` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblelementary`
--
ALTER TABLE `tblelementary`
  ADD CONSTRAINT `tblelementary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblemployment_record`
--
ALTER TABLE `tblemployment_record`
  ADD CONSTRAINT `tblemployment_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblgrad_profile`
--
ALTER TABLE `tblgrad_profile`
  ADD CONSTRAINT `tblgrad_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD CONSTRAINT `tbllogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsecondary`
--
ALTER TABLE `tblsecondary`
  ADD CONSTRAINT `tblsecondary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblspecialization_obe`
--
ALTER TABLE `tblspecialization_obe`
  ADD CONSTRAINT `tblspecialization_obe_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tblcourse` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD CONSTRAINT `tblstatus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsurvey`
--
ALTER TABLE `tblsurvey`
  ADD CONSTRAINT `tblsurvey_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tblcourse` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblsurvey_ibfk_2` FOREIGN KEY (`survey_year`) REFERENCES `tblyear` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsurvey_status`
--
ALTER TABLE `tblsurvey_status`
  ADD CONSTRAINT `tblsurvey_status_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `tblyear` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblsurvey_status_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblsurvey_status_ibfk_3` FOREIGN KEY (`survey_id`) REFERENCES `tblsurvey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblsurvey_status_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `tblcourse` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbltertiary`
--
ALTER TABLE `tbltertiary`
  ADD CONSTRAINT `tbltertiary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser_acc` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltertiary_ibfk_2` FOREIGN KEY (`degree_tertiary`) REFERENCES `tblcourse` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
