-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 05:25 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` varchar(200) NOT NULL,
  `prod_price` decimal(10,0) NOT NULL,
  `Manufacture` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Manu_date` date NOT NULL,
  `Expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `sales_quantity` int(11) DEFAULT NULL,
  `sales_date` datetime DEFAULT NULL,
  `member_id` char(13) DEFAULT NULL,
  `sales_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `prod_id`, `sales_quantity`, `sales_date`, `member_id`, `sales_price`) VALUES
(45, 4331463, 3, '2016-10-06 09:05:51', '888', 45),
(46, 4331463, 4, '2016-10-06 09:15:41', '2333', 60),
(47, 4331463, 2, '2016-10-07 04:44:20', '1000654', 30);

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
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4331466;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
