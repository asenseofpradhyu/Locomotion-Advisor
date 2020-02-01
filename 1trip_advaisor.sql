-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2017 at 07:18 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trip_advaisor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `A_Id` int(11) NOT NULL AUTO_INCREMENT,
  `A_UserName` varchar(50) NOT NULL,
  `A_Password` varchar(50) NOT NULL,
  `A_Email` varchar(100) NOT NULL,
  PRIMARY KEY (`A_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`A_Id`, `A_UserName`, `A_Password`, `A_Email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking_master`
--

CREATE TABLE IF NOT EXISTS `booking_master` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `b_date` date NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `city` varchar(250) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`city_id`, `state_id`, `city`) VALUES
(2, 7, 'HIMATNAGAR'),
(3, 7, 'AHEMEDABAD'),
(4, 7, 'SURAT'),
(5, 7, 'DIV DAMAN'),
(6, 8, 'UDAIPUR'),
(7, 8, 'JAIPUR');

-- --------------------------------------------------------

--
-- Table structure for table `commition_master`
--

CREATE TABLE IF NOT EXISTS `commition_master` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `commition` int(11) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `commition_master`
--

INSERT INTO `commition_master` (`com_id`, `commition`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `destination_galary_master`
--

CREATE TABLE IF NOT EXISTS `destination_galary_master` (
  `dg_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_id` int(11) NOT NULL,
  `galary_image` varchar(300) NOT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `destination_galary_master`
--

INSERT INTO `destination_galary_master` (`dg_id`, `dm_id`, `galary_image`) VALUES
(1, 1, '~/img/destination/d27f1b5a-7661-43e3-8b3a-ec8aa9de6660.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `destination_master`
--

CREATE TABLE IF NOT EXISTS `destination_master` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_name` varchar(250) NOT NULL,
  `destination_discription` text NOT NULL,
  `destination_logo` varchar(250) NOT NULL,
  `destination_bannar_img` varchar(250) NOT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `destination_master`
--

INSERT INTO `destination_master` (`dm_id`, `destination_name`, `destination_discription`, `destination_logo`, `destination_bannar_img`) VALUES
(1, 'UDAIPUR', 'Udaipur, formerly the capital of the Mewar Kingdom, is a city in the western Indian state of Rajasthan. Founded by Maharana Udai Singh II in 1559, it’s set around a series of artificial lakes and is known for its lavish royal residences. City Palace, overlooking Lake Pichola, is a monumental complex of 11 palaces, courtyards and gardens, famed for its intricate peacock mosaics.', '~/img/destination/1366ef0a-a9b8-48af-a317-67527e9d66a5.jpg', '~/img/destination/Bannare.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq_master`
--

CREATE TABLE IF NOT EXISTS `faq_master` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_que` text NOT NULL,
  `faq_ans` text NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faq_master`
--

INSERT INTO `faq_master` (`faq_id`, `faq_que`, `faq_ans`) VALUES
(1, 'DEMO', 'Demo'),
(2, 'DEMO Data ', 'Demo Data'),
(3, 'What is Demo Data?', 'Data');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_master`
--

CREATE TABLE IF NOT EXISTS `inquiry_master` (
  `inq_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contactno` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(250) NOT NULL,
  PRIMARY KEY (`inq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_for` varchar(50) NOT NULL,
  `order_for_id` int(11) NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_master`
--

CREATE TABLE IF NOT EXISTS `package_master` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `package_type_id` int(11) NOT NULL,
  `package_title` varchar(50) NOT NULL,
  `package_price` decimal(65,0) NOT NULL,
  `package_description` text NOT NULL,
  `dimage` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package_type_master`
--

CREATE TABLE IF NOT EXISTS `package_type_master` (
  `package_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `ur_id` int(11) NOT NULL,
  `package_type` varchar(20) NOT NULL,
  PRIMARY KEY (`package_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `package_type_master`
--

INSERT INTO `package_type_master` (`package_type_id`, `ur_id`, `package_type`) VALUES
(1, 2, 'ROOMS'),
(3, 3, 'TOURS');

-- --------------------------------------------------------

--
-- Table structure for table `plan_master`
--

CREATE TABLE IF NOT EXISTS `plan_master` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_title` varchar(50) NOT NULL,
  `plan_price` decimal(18,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `discraption` text NOT NULL,
  `quarter_time` varchar(250) NOT NULL,
  `duration` int(6) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `plan_master`
--

INSERT INTO `plan_master` (`plan_id`, `plan_title`, `plan_price`, `discount`, `discraption`, `quarter_time`, `duration`, `status`) VALUES
(1, 'PURPLE', 5500, 30, 'When do you prefer to holiday? / When the resorts are not packed / If you love the Monsoon season / During the work week / During Non-Peak Season / During School / College Vacations / On National Holidays / During Festivals / Any time of the year / On Special Days i.e. New Year’s Eve', '1. FULL YEAR', 365, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `services_profile_master`
--

CREATE TABLE IF NOT EXISTS `services_profile_master` (
  `user_id` int(11) NOT NULL,
  `business_title` varchar(250) NOT NULL,
  `manager_name` varchar(30) NOT NULL,
  `o_contect_no` varchar(250) NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `tin_no` varchar(250) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `pro_email` varchar(250) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `updatedate` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `state`) VALUES
(7, 'GUJARAT'),
(8, 'RAJASTHAN'),
(9, 'MAHARASTRA'),
(10, 'MADYAPRADESH'),
(11, 'DELHI'),
(12, 'JAMMU KASHIMIR');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `ur_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `r_date` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `ur_id`, `Name`, `Gender`, `mobile`, `email`, `password`, `verification_code`, `status`, `r_date`) VALUES
(10, 2, 'janak suthar', 'MALE', '9033387254', 'janak3250@gmail.com', '123456', '102332', 'Deactive', '27/02/2017 10:58:34'),
(11, 2, 'dhruvin', 'MALE', '9033387254', 'dhruvintrivedi21@gmail.com', '720495', '382751', 'Active', '27/02/2017 11:03:17'),
(12, 0, 'Dhruvin Trivedi', 'MALE', '9426944369', 'admin@gmail.com', 'admin', '304063', 'Active', '2/28/2017 11:15:01 AM'),
(13, 1, 'Priyank', 'MALE', '9409544924', 'priyank.patel00762@gmail.com', '123456', '138245', 'Deactive', '01-03-2017 05:23:59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan_master`
--

CREATE TABLE IF NOT EXISTS `user_plan_master` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_start_date` date NOT NULL,
  `plan_end_date` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_master`
--

CREATE TABLE IF NOT EXISTS `user_profile_master` (
  `user_id` int(11) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `photo` varchar(300) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_master`
--

INSERT INTO `user_profile_master` (`user_id`, `dob`, `contact_no`, `address`, `photo`) VALUES
(10, '17/05/1987', '9090909090', 'Himatnagar', '~/upload/janak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_master`
--

CREATE TABLE IF NOT EXISTS `user_role_master` (
  `ur_id` int(11) NOT NULL,
  `user_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role_master`
--

INSERT INTO `user_role_master` (`ur_id`, `user_role`) VALUES
(1, 'Customer'),
(2, 'Hotels'),
(3, 'Travels');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
