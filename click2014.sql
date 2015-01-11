-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2015 at 07:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `click2014`
--

-- --------------------------------------------------------

--
-- Table structure for table `informacije`
--

CREATE TABLE IF NOT EXISTS `informacije` (
  `vrij_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `redni_br` int(4) NOT NULL,
  `ukupan_br` int(11) NOT NULL,
  `pros_vri_cek` time NOT NULL,
  `pocetakrada` time NOT NULL,
  PRIMARY KEY (`vrij_datum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `opcija`
--

CREATE TABLE IF NOT EXISTS `opcija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oznaka` varchar(20) NOT NULL,
  `opis` varchar(30) NOT NULL,
  `velfonta` smallint(2) NOT NULL,
  `bojafonta` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oznaka` (`oznaka`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `opcija`
--

INSERT INTO `opcija` (`id`, `oznaka`, `opis`, `velfonta`, `bojafonta`, `status`) VALUES
(1, 'A', 'Uplate i isplate', 20, 'blue', 1),
(2, 'B', 'Krediti', 20, 'blue', 1),
(3, 'C', 'Pregled računa', 20, 'blue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prikaz`
--

CREATE TABLE IF NOT EXISTS `prikaz` (
  `vrij_datum` tinyint(1) NOT NULL DEFAULT '1',
  `ukupan_br` tinyint(1) NOT NULL DEFAULT '1',
  `redni_br` tinyint(1) NOT NULL DEFAULT '1',
  `pros_vri_cek` tinyint(1) NOT NULL DEFAULT '1',
  `poc_rada` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`vrij_datum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prikaz`
--

INSERT INTO `prikaz` (`vrij_datum`, `ukupan_br`, `redni_br`, `pros_vri_cek`, `poc_rada`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poslodavac` varchar(50) NOT NULL,
  `oznaka` varchar(20) NOT NULL,
  `rednibroj` int(3) NOT NULL,
  `ocekvrdolaska` time DEFAULT NULL,
  `vrijemestvaranja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vrijemeposluz` time NOT NULL,
  `vrijemecekanja` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `poslodavac`, `oznaka`, `rednibroj`, `ocekvrdolaska`, `vrijemestvaranja`, `vrijemeposluz`, `vrijemecekanja`) VALUES
(1, 'PBZ', 'C', 1, '08:03:00', '2014-12-01 07:03:08', '08:03:00', 0),
(2, 'PBZ', 'A', 2, '08:09:00', '2014-12-01 07:09:00', '08:15:00', 6),
(3, 'PBZ', 'B', 3, '08:11:00', '2014-12-01 07:11:00', '08:21:00', 10),
(4, 'PBZ', 'C', 4, '08:18:00', '2014-12-01 07:15:00', '08:30:00', 15),
(5, 'PBZ', 'A', 5, '08:43:00', '2014-12-01 07:35:00', '08:40:00', 5),
(6, 'PBZ', 'A', 6, '08:45:00', '2014-12-01 07:37:00', '08:50:00', 13),
(7, 'PBZ', 'B', 7, '08:46:00', '2014-12-01 07:38:00', '09:02:00', 24),
(8, 'PBZ', 'B', 8, '09:00:00', '2014-12-01 07:52:00', '09:10:00', 18),
(9, 'PBZ', 'A', 9, '09:08:00', '2014-12-01 08:00:00', '09:16:00', 16),
(10, 'PBZ', 'C', 10, '09:21:00', '2014-12-01 08:11:00', '09:26:00', 15),
(11, 'PBZ', 'C', 11, '09:42:00', '2014-12-01 08:30:00', '09:35:00', 5),
(12, 'PBZ', 'A', 12, '09:42:00', '2014-12-01 08:33:00', '09:44:00', 11),
(13, 'PBZ', 'B', 13, '09:52:00', '2014-12-01 08:40:00', '09:53:00', 13),
(15, 'PBZ', 'A - Uplate i isplate', 150, NULL, '2015-01-10 20:19:55', '00:00:00', 0),
(16, 'PBZ', 'A - Uplate i isplate', 150, NULL, '2015-01-10 20:21:29', '00:00:00', 0),
(17, 'PBZ', '3', 150, NULL, '2015-01-11 00:02:16', '00:00:00', 0),
(18, 'PBZ', '3', 150, NULL, '2015-01-11 00:02:43', '00:00:00', 0),
(19, 'PBZ', '3', 150, NULL, '2015-01-11 00:06:10', '00:00:00', 0),
(27, 'PBZ', '1', 151, NULL, '2015-01-11 10:01:45', '00:00:00', 0),
(28, 'PBZ', '2', 152, NULL, '2015-01-11 10:03:15', '00:00:00', 0),
(29, 'PBZ', 'C', 153, NULL, '2015-01-11 10:04:06', '00:00:00', 0),
(30, 'PBZ', 'C', 154, NULL, '2015-01-11 10:04:26', '00:00:00', 0),
(31, 'PBZ', 'C - Pregled računa', 155, NULL, '2015-01-11 10:04:32', '00:00:00', 0),
(32, 'PBZ', 'A - Uplate i isplate', 156, NULL, '2015-01-11 14:00:15', '00:00:00', 0),
(33, 'PBZ', 'A - Uplate i isplate', 157, NULL, '2015-01-11 14:00:30', '00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
