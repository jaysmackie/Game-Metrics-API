-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2012 at 12:08 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gameMetrics`
--
CREATE DATABASE `gameMetrics` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gameMetrics`;

-- --------------------------------------------------------

--
-- Table structure for table `eventSubTypes`
--

CREATE TABLE `eventSubTypes` (
  `eventSubType` int(11) NOT NULL AUTO_INCREMENT,
  `eventSubString` varchar(512) NOT NULL,
  `validFor` varchar(512) NOT NULL,
  PRIMARY KEY (`eventSubType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='These are the sub type string lookup table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `eventSubTypes`
--


-- --------------------------------------------------------

--
-- Table structure for table `eventTypes`
--

CREATE TABLE `eventTypes` (
  `eventType` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary event ID',
  `eventString` varchar(512) NOT NULL,
  `validGames` varchar(512) NOT NULL,
  PRIMARY KEY (`eventType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for understanding eventTypes' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `eventTypes`
--


-- --------------------------------------------------------

--
-- Table structure for table `eventdata`
--

CREATE TABLE `eventdata` (
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
  `extended` varchar(512) NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eventdata`
--

INSERT INTO `eventdata` VALUES(1, '', '', '2011-11-29 10:53:17', 0, 1, 0, 0, 0, 0, 0, '');
INSERT INTO `eventdata` VALUES(2, '', '', '2011-11-29 10:53:43', 0, 1, 0, 0, 0, 0, 0, '');
INSERT INTO `eventdata` VALUES(3, '', '', '2011-11-29 10:57:43', 1.2345, 1, 2, 1, 2, 3, 4, '');
INSERT INTO `eventdata` VALUES(4, '', '', '2011-11-29 11:07:14', 1.2345, 1, 2, 1, 2, 3, 4, '');
INSERT INTO `eventdata` VALUES(5, '', '', '2011-11-29 11:13:01', 1.2345, 1, 2, 1, 2, 3, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `metricsession`
--

CREATE TABLE `metricsession` (
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

INSERT INTO `metricsession` VALUES(0, 0, 'val0', '2011-11-29 08:44:55', '0000-00-00 00:00:00');
INSERT INTO `metricsession` VALUES(1, 0, '', '2011-11-29 08:44:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playsession`
--

CREATE TABLE `playsession` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `metricMD5` char(32) NOT NULL,
  `playMD5` char(32) NOT NULL,
  `openTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `closeTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `playsession`
--

