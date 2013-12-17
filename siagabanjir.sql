-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 02:29 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE siagabanjir;
USE siagabanjir;
--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE IF NOT EXISTS `bantuan` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_POSKO` int(10) NOT NULL,
  `JENIS` varchar(50) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_POSKO` (`ID_POSKO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daerah_banjir`
--
CREATE TABLE IF NOT EXISTS `daerah_banjir` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA_WILAYAH` varchar(50) NOT NULL,
  `LATITUDE` float NOT NULL,
  `LONGITUDE` float NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NAMA_WILAYAH_2` (`NAMA_WILAYAH`),
  UNIQUE KEY `ID_2` (`ID`),
  KEY `NAMA_WILAYAH` (`NAMA_WILAYAH`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `korban`
--

CREATE TABLE IF NOT EXISTS `korban` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_POSKO` int(10) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `USIA` int(2) NOT NULL,
  `JENIS_KELAMIN` int(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_POSKO` (`ID_POSKO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posko`
--

CREATE TABLE IF NOT EXISTS `posko` (
  `ID` int(10) NOT NULL DEFAULT '0',
  `NAMA_POSKO` varchar(50) NOT NULL,
  `LATITUDE` float NOT NULL,
  `LONGITUDE` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posko`
--

INSERT INTO `posko` (`ID`, `NAMA_POSKO`, `LATITUDE`, `LONGITUDE`) VALUES
(1, 'Posko XYZ', 62.345, 103.456);

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE IF NOT EXISTS `postingan` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `KONTEN` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD CONSTRAINT `bantuan_ibfk_1` FOREIGN KEY (`ID_POSKO`) REFERENCES `posko` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korban`
--
ALTER TABLE `korban`
  ADD CONSTRAINT `korban_ibfk_1` FOREIGN KEY (`ID_POSKO`) REFERENCES `posko` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
