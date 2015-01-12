-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2015 at 06:12 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'djelatnik', '7b1e75f33b61de2e840afff2bce78b36');

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
  PRIMARY KEY (`id`)
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
  `vrij_datum` tinyint(1) NOT NULL,
  `ukupan_br` tinyint(1) NOT NULL,
  `redni_br` tinyint(1) NOT NULL,
  `pros_vri_cek` tinyint(1) NOT NULL,
  `poc_rada` tinyint(1) NOT NULL,
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
  `ocekvrdolaska` time NOT NULL,
  `vrijemestvaranja` timestamp NOT NULL,
  `vrijemeposluz` time NOT NULL,
  `vrijemecekanja` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

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
(14, 'PBZ', 'B', 14, '10:02:00', '2014-12-01 08:50:00', '10:02:00', 12),
(15, 'PBZ', 'A', 15, '10:14:00', '2014-12-01 09:02:00', '10:12:00', 10),
(16, 'PBZ', 'C', 16, '10:15:00', '2014-12-01 09:03:00', '10:13:00', 10),
(17, 'PBZ', 'A', 17, '10:20:00', '2014-12-01 09:08:00', '10:20:00', 12),
(18, 'PBZ', 'B', 18, '10:23:00', '2014-12-01 09:11:00', '10:30:00', 19),
(19, 'PBZ', 'A', 19, '10:31:00', '2014-12-01 09:19:00', '10:37:00', 18),
(20, 'PBZ', 'A', 20, '10:42:00', '2014-12-01 09:31:00', '10:44:00', 13),
(21, 'PBZ', 'A', 21, '10:46:00', '2014-12-01 09:35:00', '10:54:00', 19),
(22, 'PBZ', 'C', 22, '10:58:00', '2014-12-01 09:46:00', '11:00:00', 12),
(23, 'PBZ', 'A', 23, '11:07:00', '2014-12-01 09:55:00', '11:10:00', 15),
(24, 'PBZ', 'C', 24, '11:23:00', '2014-12-01 10:11:00', '11:25:00', 14),
(25, 'PBZ', 'A', 25, '11:32:00', '2014-12-01 10:20:00', '11:35:00', 15),
(26, 'PBZ', 'A', 26, '11:42:00', '2014-12-01 10:29:00', '11:43:00', 13),
(27, 'PBZ', 'A', 27, '11:57:00', '2014-12-01 10:44:00', '11:55:00', 11),
(28, 'PBZ', 'B', 28, '12:03:00', '2014-12-01 10:50:00', '12:05:00', 15),
(29, 'PBZ', 'C', 29, '12:13:00', '2014-12-01 11:00:00', '12:16:00', 16),
(30, 'PBZ', 'C', 30, '12:25:00', '2014-12-01 11:12:00', '12:25:00', 13),
(31, 'PBZ', 'B', 31, '12:43:00', '2014-12-01 11:30:00', '12:35:00', 5),
(32, 'PBZ', 'B', 32, '12:50:00', '2014-12-01 11:38:00', '12:44:00', 6),
(33, 'PBZ', 'A', 33, '13:04:00', '2014-12-01 11:52:00', '12:52:00', 0),
(34, 'PBZ', 'C', 34, '13:13:00', '2014-12-01 12:01:00', '13:05:00', 4),
(35, 'PBZ', 'C', 35, '13:23:00', '2014-12-01 12:11:00', '13:17:00', 6),
(36, 'PBZ', 'A', 36, '13:37:00', '2014-12-01 12:25:00', '13:27:00', 0),
(37, 'PBZ', 'B', 37, '13:41:00', '2014-12-01 12:30:00', '13:40:00', 10),
(38, 'PBZ', 'B', 38, '13:52:00', '2014-12-01 12:41:00', '13:49:00', 8),
(39, 'PBZ', 'B', 39, '14:01:00', '2014-12-01 12:50:00', '14:00:00', 10),
(40, 'PBZ', 'B', 40, '14:13:00', '2014-12-01 13:02:00', '14:12:00', 10),
(41, 'PBZ', 'C', 41, '14:21:00', '2014-12-01 13:10:00', '14:20:00', 10),
(42, 'PBZ', 'C', 42, '14:33:00', '2014-12-01 13:22:00', '14:28:00', 6),
(43, 'PBZ', 'B', 43, '14:37:00', '2014-12-01 13:26:00', '14:38:00', 12),
(44, 'PBZ', 'A', 44, '14:41:00', '2014-12-01 13:30:00', '14:44:00', 14),
(45, 'PBZ', 'A', 45, '14:57:00', '2014-12-01 13:46:00', '14:51:00', 5),
(46, 'PBZ', 'A', 46, '15:11:00', '2014-12-01 14:00:00', '15:00:00', 0),
(47, 'PBZ', 'A', 47, '15:18:00', '2014-12-01 14:07:00', '15:15:00', 8),
(48, 'PBZ', 'B', 48, '15:32:00', '2014-12-01 14:21:00', '15:22:00', 1),
(49, 'PBZ', 'C', 49, '15:35:00', '2014-12-01 14:25:00', '15:29:00', 4),
(50, 'PBZ', 'C', 50, '15:52:00', '2014-12-01 14:42:00', '15:42:00', 0),
(51, 'PBZ', 'A', 51, '16:00:00', '2014-12-01 14:50:00', '15:51:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
