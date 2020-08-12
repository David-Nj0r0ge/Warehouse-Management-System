-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2019 at 09:33 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cont`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `block_id` int(11) NOT NULL,
  `block_name` varchar(100) NOT NULL,
  `no_containers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `block_name`, `no_containers`) VALUES
(1, '-0kll0', 5678),
(2, 'BlockA', 5678),
(3, 'BlockB', 123),
(4, 'BlockD', 500);

-- --------------------------------------------------------

--
-- Table structure for table `charge_plans`
--

CREATE TABLE `charge_plans` (
  `charge_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charge_plans`
--

INSERT INTO `charge_plans` (`charge_id`, `plan_name`, `cost`) VALUES
(1, 'tone', 100),
(2, 'day', 100);

-- --------------------------------------------------------

--
-- Table structure for table `container_space_bookings`
--

CREATE TABLE `container_space_bookings` (
  `book_id` int(11) NOT NULL,
  `cont_owner` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `cont_code` varchar(100) NOT NULL,
  `cont_weight` int(11) NOT NULL,
  `arrival_date` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `verification_doc` varchar(100) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `booked_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `container_space_bookings`
--

INSERT INTO `container_space_bookings` (`book_id`, `cont_owner`, `owner`, `cont_code`, `cont_weight`, `arrival_date`, `product_name`, `verification_doc`, `origin`, `product_type`, `booked_on`) VALUES
(1, 'simonmuthee@gmail.com', '', '33NJD59NJD', 67, '31 July, 2018', '', '2064458621.png', 'Spain', '', '2018-07-28 16:30:17'),
(2, 'simonmuthee@gmail.com', '', '33NJD59NJ4', 67, '31 July, 2018', '', '196547035.png', 'Spain', '', '2018-07-28 16:30:46'),
(3, 'simonmuthee@gmail.com', '', '33NJD59NA45', 67, '31 July, 2018', '', '1206440448.png', 'Spain', '', '2018-07-28 16:30:58'),
(4, 'simonmuthee@gmail.com', '', '54GHT23FY', 50, '31 July, 2018', '', '516367890.png', 'China', '', '2018-07-28 18:14:04'),
(5, 'simonmuthee@gmail.com', '', '54GHT222TY', 120, '31 July, 2018', '', '1142777831.png', 'Southafrica', '', '2018-07-28 18:23:20'),
(6, 'simonmuthee@gmail.com', '', '54GHT22265AW', 120, '31 July, 2018', '', '270548249.png', 'Southafrica', '', '2018-07-28 18:31:45'),
(7, 'simonmuthee@gmail.com', '', '54GHT23FY907t', 90, '31 July, 2018', '', '524463965.png', 'China', '', '2018-07-28 18:36:59'),
(8, 'sarahmalia@gmail.com', '', '45GHY23DFG', 50, '31 July, 2018', '', '1755662236.docx', 'China', '', '2018-07-30 06:37:34'),
(9, 'sarahmalia@gmail.com', '', '49GHY23DFG2QW', 70, '31 July, 2018', '', '767959619.docx', 'Italy', '', '2018-07-30 06:47:12'),
(10, 'faithmueni@gmail.com', '', '47HGYT304TB', 70, '5 August, 2018', '', '884812213.docx', 'Southafrica', '', '2018-07-31 09:45:29'),
(11, 'jemoo@gmail.com', 'Afya', 'GBL-1639859842/2019', 100, '7 January, 2019', 'Books', '1462350391.png', 'Nairobi', 'stationery', '2019-01-04 06:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `mpesa_code` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `total_payable` int(11) NOT NULL,
  `cont_cod` varchar(100) NOT NULL,
  `payed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `mpesa_code`, `owner`, `amount_paid`, `balance`, `total_payable`, `cont_cod`, `payed_on`) VALUES
(1, 'MX987HYT12BFG', 'faithmueni@gmail.com', 500, 6500, 7000, '10', '2018-07-31 20:52:26'),
(2, 'MXHT638POP', 'jemoo@gmail.com', 9000, 1000, 10000, '11', '2019-01-04 06:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `received_conts`
--

CREATE TABLE `received_conts` (
  `receive_id` int(11) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `cont_id` varchar(100) NOT NULL,
  `block_nam` varchar(100) NOT NULL,
  `received_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `received_conts`
--

INSERT INTO `received_conts` (`receive_id`, `owner`, `cont_id`, `block_nam`, `received_on`) VALUES
(1, 'simonmuthee@gmail.com', '1', 'BlockA', '2018-07-31 09:48:39'),
(2, 'simonmuthee@gmail.com', '2', 'BlockB', '2018-07-27 09:48:39'),
(3, 'faithmueni@gmail.com', '10', 'BlockA', '2018-07-31 09:57:20'),
(4, 'jemoo@gmail.com', '11', 'BlockB', '2019-01-04 06:43:36'),
(5, 'simonmuthee@gmail.com', '3', 'BlockB', '2019-01-10 06:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `released`
--

CREATE TABLE `released` (
  `released_id` int(11) NOT NULL,
  `cont_d` varchar(100) NOT NULL,
  `release_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `released`
--

INSERT INTO `released` (`released_id`, `cont_d`, `release_on`) VALUES
(1, '10', '2018-08-01 08:46:02'),
(2, '11', '2019-01-04 06:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `users_content`
--

CREATE TABLE `users_content` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `status` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_content`
--

INSERT INTO `users_content` (`user_id`, `first_name`, `last_name`, `email`, `phone_no`, `status`, `password`) VALUES
(1, 'Mark', 'Mundu', 'markmundu@gmail.com', 727345002, 'null', '73165b4f59095c32db35737037b714a1'),
(2, 'Samuel', 'Kipgetich', 'samkip@gmail.com', 720405129, 'null', 'bb4319aa734d4b8a14f3a53d936d15f4'),
(3, 'Carol', 'Wanjiru', 'carolwanjiru@gmail.com', 724510708, 'null', '4f41dffb5bf2abb7dde940ab322fbdd4'),
(4, 'Susan', 'Mwende', 'susanmwende@gmail.com', 746509876, 'null', '4ae28995845336839493fcf31ea5b4dd'),
(5, 'Samson', 'Juma', 'samsonjuma@gmail.com', 702338912, 'null', '61cce9405c0c46cf3446952896b7ac2c'),
(6, 'Admin', 'Administrator', 'admin@global.co.ke', 77727727, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'Faith', 'Cheplagat', 'faithchep@gmail.com', 721412854, 'null', '54453d20cdf6dea119b49e794f726e8b'),
(8, 'Carol', 'Chelgat', 'carolchelgat@gmail.com', 710297911, 'null', '1a3d0beaa0f3c6f2d2fd59dd0f74c6de'),
(9, 'Paul', 'Kimani', 'kimanipaul@gmail.com', 721458321, 'null', 'bec1e92e4ac2f221f8a09fe49a3be320'),
(10, 'moses', 'Kiprotich', 'mosekip@gmail.com', 708123409, 'null', '604cd9cf8ee00cb50e4465f35562542f'),
(11, 'sarah', 'jacob', 'sarahjacob@gmail.com', 723564110, 'null', 'c41202d9a007c59a5bf17c34c144a61c'),
(12, 'Simon', 'Muthee', 'simonmuthee@gmail.com', 721340876, 'null', '74dff597c4aac4c6fe0720d4343d3903'),
(13, 'Sarah', 'malia', 'sarahmalia@gmail.com', 712309875, 'null', 'ec26202651ed221cf8f993668c459d46'),
(14, 'Faith', 'Mueni', 'faithmueni@gmail.com', 712345908, 'null', '31d014987cc17fdf0c4b39be4bcdbce4'),
(15, 'jemoo', 'jemoo', 'jemoo@gmail.com', 721341098, 'null', 'c9fa1e307e14d32b9d14676436f1098d'),
(16, 'abdi', 'abdilatif', 'abdi@gmail.com', 712048826, 'null', '30c8c9502a2f14590ea3ecfc59521adb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `charge_plans`
--
ALTER TABLE `charge_plans`
  ADD PRIMARY KEY (`charge_id`);

--
-- Indexes for table `container_space_bookings`
--
ALTER TABLE `container_space_bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `received_conts`
--
ALTER TABLE `received_conts`
  ADD PRIMARY KEY (`receive_id`);

--
-- Indexes for table `released`
--
ALTER TABLE `released`
  ADD PRIMARY KEY (`released_id`);

--
-- Indexes for table `users_content`
--
ALTER TABLE `users_content`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `charge_plans`
--
ALTER TABLE `charge_plans`
  MODIFY `charge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `container_space_bookings`
--
ALTER TABLE `container_space_bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `received_conts`
--
ALTER TABLE `received_conts`
  MODIFY `receive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `released`
--
ALTER TABLE `released`
  MODIFY `released_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_content`
--
ALTER TABLE `users_content`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
