-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2024 at 08:35 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'ARYAN RITHE', 'HEMANSHU GAJARE', 5000, '2024-03-10 13:34:10'),
(2, 'ARYAN RITHE', 'SWARAJ MHASE', 5000, '2024-03-20 12:38:35'),
(3, 'SWARAJ MHASE', 'HEMANSHU GAJARE', 10000, '2024-03-20 13:45:21'),
(4, 'UMESH PINGLE', 'SWARAJ MHASE', 12000, '2024-03-20 13:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'SWARAJ MHASE', 'swarajm@gmail.com', 82045),
(2, 'ARYAN RITHE', 'aryanr@gmail.com', 90000),
(3, 'AJINKYA MUTKULE', 'ajinkyam@gmail.com', 91100),
(4, 'HARSHAL DESAI', 'harshald@gmail.com', 95002),
(5, 'KARTIK NAKADE', 'kartikn@gmail.com', 81500),
(6, 'ROHIT BHANGALE', 'rohitb@gmail.com', 85045),
(7, 'HEMANSHU GAJARE', 'hemanshug@gmail.com', 70000),
(8, 'VISHAL NILE', 'vishaln@gmail.com', 78965),
(9, 'UMESH PINGLE', 'umeshp@gmail.com', 99111),
(10, 'RUSHIKESH DHAYBAR', 'rushikeshd@gmail.com', 95423);
