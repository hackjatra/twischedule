-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2010 at 06:44 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loadshedding_revealed`
--

-- --------------------------------------------------------

--
-- Table structure for table `hj_group`
--

DROP TABLE IF EXISTS `hj_group`;
CREATE TABLE `hj_group` (
  `group_id` int(11) NOT NULL auto_increment,
  `group_name` varchar(255) NOT NULL,
  `group_machine_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hj_group`
--

INSERT INTO `hj_group` (`group_id`, `group_name`, `group_machine_name`) VALUES
(5, 'Group 2', '1'),
(4, 'Group 1', '0'),
(6, 'Group 3', '2'),
(7, 'Group 4', '3'),
(8, 'Group 5', '4'),
(9, 'Group 6', '5'),
(10, 'Group 7', '6');

-- --------------------------------------------------------

--
-- Table structure for table `hj_schedule`
--

DROP TABLE IF EXISTS `hj_schedule`;
CREATE TABLE `hj_schedule` (
  `schedule_id` int(11) NOT NULL auto_increment,
  `group_id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL,
  `start_time` time NOT NULL,
  `duration` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `slot` int(255) NOT NULL,
  PRIMARY KEY  (`schedule_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `hj_schedule`
--

INSERT INTO `hj_schedule` (`schedule_id`, `group_id`, `day`, `start_time`, `duration`, `order`, `slot`) VALUES
(1, 4, 'sunday', '04:00:00', 4, 1, 4),
(2, 4, 'monday', '10:00:00', 10, 1, 34),
(3, 4, 'tuesday', '05:00:00', 5, 1, 53),
(4, 4, 'wednesday', '19:00:00', 19, 1, 91),
(5, 4, 'thursday', '07:00:00', 7, 1, 103),
(6, 4, 'friday', '13:00:00', 13, 1, 133),
(7, 4, 'saturday', '18:00:00', 18, 1, 162),
(8, 5, 'sunday', '04:00:00', 4, 1, 4),
(9, 5, 'monday', '10:00:00', 10, 1, 34),
(10, 5, 'tuesday', '05:00:00', 5, 1, 53),
(11, 5, 'wednesday', '19:00:00', 19, 1, 91),
(12, 5, 'thursday', '07:00:00', 7, 1, 103),
(13, 5, 'friday', '13:00:00', 13, 1, 133),
(14, 5, 'saturday', '18:00:00', 18, 1, 162),
(15, 6, 'sunday', '04:00:00', 4, 1, 4),
(16, 6, 'monday', '10:00:00', 10, 1, 34),
(17, 6, 'tuesday', '05:00:00', 5, 1, 53),
(18, 6, 'wednesday', '19:00:00', 19, 1, 91),
(19, 6, 'thursday', '07:00:00', 7, 1, 103),
(20, 6, 'friday', '13:00:00', 13, 1, 133),
(21, 6, 'saturday', '18:00:00', 18, 1, 162),
(22, 7, 'sunday', '04:00:00', 4, 1, 4),
(23, 7, 'monday', '10:00:00', 10, 1, 34),
(24, 7, 'tuesday', '05:00:00', 5, 1, 53),
(25, 7, 'wednesday', '19:00:00', 19, 1, 91),
(26, 7, 'thursday', '07:00:00', 7, 1, 103),
(27, 7, 'friday', '13:00:00', 13, 1, 133),
(28, 7, 'saturday', '18:00:00', 18, 1, 162),
(29, 8, 'sunday', '04:00:00', 4, 1, 4),
(30, 8, 'monday', '10:00:00', 10, 1, 34),
(31, 8, 'tuesday', '05:00:00', 5, 1, 53),
(32, 8, 'wednesday', '19:00:00', 19, 1, 91),
(33, 8, 'thursday', '07:00:00', 7, 1, 103),
(34, 8, 'friday', '13:00:00', 13, 1, 133),
(35, 8, 'saturday', '18:00:00', 18, 1, 162),
(36, 9, 'sunday', '04:00:00', 4, 1, 4),
(37, 9, 'monday', '10:00:00', 10, 1, 34),
(38, 9, 'tuesday', '05:00:00', 5, 1, 53),
(39, 9, 'wednesday', '19:00:00', 19, 1, 91),
(40, 9, 'thursday', '07:00:00', 7, 1, 103),
(41, 9, 'friday', '13:00:00', 13, 1, 133),
(42, 9, 'saturday', '18:00:00', 18, 1, 162),
(43, 10, 'sunday', '04:00:00', 4, 1, 4),
(44, 10, 'monday', '10:00:00', 10, 1, 34),
(45, 10, 'tuesday', '05:00:00', 5, 1, 53),
(46, 10, 'wednesday', '19:00:00', 19, 1, 91),
(47, 10, 'thursday', '07:00:00', 7, 1, 103),
(48, 10, 'friday', '13:00:00', 13, 1, 133),
(49, 10, 'saturday', '18:00:00', 18, 1, 162);
