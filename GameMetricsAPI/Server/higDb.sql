-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2011 at 10:13 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hig`
--
CREATE DATABASE `hig` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hig`;

-- --------------------------------------------------------

--
-- Table structure for table `eventdata`
--

CREATE TABLE IF NOT EXISTS `eventdata` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `metricMD5` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `playMD5` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `eventTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gameTime` double NOT NULL,
  `eventType` int(11) NOT NULL,
  `eventSubtype` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11) NOT NULL,
  `magnitude` double NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eventdata`
--

INSERT INTO `eventdata` (`rowID`, `metricMD5`, `playMD5`, `eventTime`, `gameTime`, `eventType`, `eventSubtype`, `x`, `y`, `z`, `magnitude`) VALUES
(1, '', '', '2011-11-28 21:53:17', 0, 1, 0, 0, 0, 0, 0),
(2, '', '', '2011-11-28 21:53:43', 0, 1, 0, 0, 0, 0, 0),
(3, '', '', '2011-11-28 21:57:43', 1.2345, 1, 2, 1, 2, 3, 4),
(4, '', '', '2011-11-28 22:07:14', 1.2345, 1, 2, 1, 2, 3, 4),
(5, '', '', '2011-11-28 22:13:01', 1.2345, 1, 2, 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `metricsession`
--

CREATE TABLE IF NOT EXISTS `metricsession` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `serialNumber` int(11) NOT NULL,
  `metricMD5` char(32) NOT NULL,
  `openTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `closeTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `metricsession`
--

INSERT INTO `metricsession` (`rowID`, `serialNumber`, `metricMD5`, `openTime`, `closeTime`) VALUES
(0, 0, 'val0', '2011-11-28 19:44:55', '0000-00-00 00:00:00'),
(1, 0, '', '2011-11-28 19:44:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playsession`
--

CREATE TABLE IF NOT EXISTS `playsession` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `metricMD5` char(32) NOT NULL,
  `playMD5` char(32) NOT NULL,
  `openTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `closeTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
