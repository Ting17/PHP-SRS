-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2016 at 07:21 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` varchar(200) NOT NULL,
  `prod_price` decimal(10,0) NOT NULL,
  `Manufacture` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Manu_date` date NOT NULL,
  `Expiry_date` date NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4331463 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `Manufacture`, `Category`, `Manu_date`, `Expiry_date`) VALUES
(4331452, 'Panadol2', 'Just eat it 2', 1, '', '', '2016-09-09', '2016-10-10'),
(4331453, 'Panadol3', 'Just eat it 3', 1, '', '', '0000-00-00', '0000-00-00'),
(4331454, 'rys', 'aeth', 42, '', '', '0000-00-00', '0000-00-00'),
(4331460, 'panadol85', 'super panadol', 64, 'TING', 'Danger', '0000-00-00', '0000-00-00'),
(4331461, 'panadol85', 'super panadol', 64, 'TING', 'Danger', '0000-00-00', '0000-00-00'),
(4331462, 'antibiotic', 'antibiotic normal', 24, 'TING', 'normal', '2019-07-17', '2010-07-31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
