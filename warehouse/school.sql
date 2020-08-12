-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 06:23 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_products`
--

CREATE TABLE `added_products` (
  `added_products_no` int(11) NOT NULL,
  `prod_no` varchar(100) NOT NULL,
  `delivered_by` varchar(100) NOT NULL,
  `delivered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `std_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `prod_no` varchar(100) NOT NULL,
  `id_no` int(11) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `std_no` int(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` int(150) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_content`
--

CREATE TABLE `users_content` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prod_no` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawn_products`
--

CREATE TABLE `withdrawn_products` (
  `withdrawn_products_no` int(11) NOT NULL,
  `prod_no` varchar(100) NOT NULL,
  `withdrawn_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_products`
--
ALTER TABLE `added_products`
  ADD PRIMARY KEY (`added_products_no`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`std_no`);

--
-- Indexes for table `users_content`
--
ALTER TABLE `users_content`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `withdrawn_products`
--
ALTER TABLE `withdrawn_products`
  ADD PRIMARY KEY (`withdrawn_products_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_products`
--
ALTER TABLE `added_products`
  MODIFY `added_products_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `std_no` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_content`
--
ALTER TABLE `users_content`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `withdrawn_products`
--
ALTER TABLE `withdrawn_products`
  MODIFY `withdrawn_products_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
