-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 03:46 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` varchar(200) NOT NULL,
  `prod_price` decimal(10,0) NOT NULL,
  `Manufacture` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Manu_date` date NOT NULL,
  `Expiry_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4331466 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `Manufacture`, `Category`, `Manu_date`, `Expiry_date`) VALUES
(4331463, 'panadol', 'eat', '15', 'Coven', 'Food', '2015-11-18', '2017-05-18'),
(4331464, 'antibiotic', 'drink', '10', 'Charles', 'Food', '2013-11-20', '2016-12-30'),
(4331465, 'abc', 'asdasd', '10', '123', 'normal', '2015-11-15', '2017-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_sales` (
`id` int(10) unsigned NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `sales_quantity` int(11) DEFAULT NULL,
  `sales_date` datetime DEFAULT NULL,
  `member_id` char(13) DEFAULT NULL,
  `sales_price` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `prod_id`, `sales_quantity`, `sales_date`, `member_id`, `sales_price`) VALUES
(47, 4331463, 2, '2011-02-15 04:44:20', '958686', 30),
(48, 4331464, 8, '2014-11-26 07:11:15', '555555', 80),
(49, 4331463, 1, '2016-10-15 10:15:48', '7455456', 15),
(50, 4331463, 8, '2013-10-27 11:16:28', '636352', 120),
(51, 4331465, 5, '2016-08-11 03:25:59', '978797', 50),
(52, 4331465, 1, '2016-10-27 03:26:09', '6765446', 10),
(53, 4331463, 6, '2016-03-13 03:26:28', '95768', 90),
(54, 4331464, 12, '2014-07-17 03:26:41', '23424234', 120),
(55, 4331465, 5, '2015-05-23 03:26:58', '9998686', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4331466;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
