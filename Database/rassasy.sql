-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2019 at 09:26 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rassasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `canteen`
--

CREATE TABLE `canteen` (
  `id` int(11) NOT NULL,
  `canteenname` varchar(50) NOT NULL,
  `canteenid` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `managername` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `location` varchar(30) NOT NULL,
  `openingtime` varchar(20) NOT NULL,
  `closingtime` varchar(20) NOT NULL,
  `verified` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `canteen`
--

INSERT INTO `canteen` (`id`, `canteenname`, `canteenid`, `password`, `email`, `managername`, `mobile`, `location`, `openingtime`, `closingtime`, `verified`) VALUES
(2, 'Sarojini Day', '001', '', 'sarojini@gmail.com', 'sita', '12', 'sarojini', '', '', 0),
(3, 'Sarojini Night', '002', '', 'sarojini2@gmail.com', 'sita', '12', 'sarojini', '', '', 0),
(4, 'Sarojini_Day', '123', '123', '1234@gmail.com', '123', '123', '123', '', '', 0),
(7, 'jawaharday', '006', '006', '006@gmail.com', 'ram', '006', 'jawahar', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_jawaharday`
--

CREATE TABLE `menu_jawaharday` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_r`
--

CREATE TABLE `menu_r` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_Rajiv`
--

CREATE TABLE `menu_Rajiv` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_jawaharday`
--

CREATE TABLE `order_jawaharday` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_r`
--

CREATE TABLE `order_r` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_Rajiv`
--

CREATE TABLE `order_Rajiv` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(70) NOT NULL,
  `enroll` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `bhawan` varchar(30) NOT NULL,
  `room` varchar(10) NOT NULL,
  `verified` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `username`, `password`, `enroll`, `mobile`, `bhawan`, `room`, `verified`) VALUES
(3, 'Shreya Sharma', 'shreyaa_s@ce.iitr.ac.in', 'shreya', 'shreya', '19113134', '8860984429', '', '1', 1),
(4, 'Shrey', '1234@gmail.com', '1234', '', '1234', '1234', '', '1234', 1),
(12, 'raj', 'raj@ce.iitr.ac.in', 'raj', '22222', '19113135', '8860984429', '', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canteen`
--
ALTER TABLE `canteen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `canteenname` (`canteenname`),
  ADD UNIQUE KEY `canteenid` (`canteenid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `menu_jawaharday`
--
ALTER TABLE `menu_jawaharday`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_r`
--
ALTER TABLE `menu_r`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_Rajiv`
--
ALTER TABLE `menu_Rajiv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `order_jawaharday`
--
ALTER TABLE `order_jawaharday`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `order_r`
--
ALTER TABLE `order_r`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `order_Rajiv`
--
ALTER TABLE `order_Rajiv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enroll` (`enroll`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canteen`
--
ALTER TABLE `canteen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menu_jawaharday`
--
ALTER TABLE `menu_jawaharday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_r`
--
ALTER TABLE `menu_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_Rajiv`
--
ALTER TABLE `menu_Rajiv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_jawaharday`
--
ALTER TABLE `order_jawaharday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_r`
--
ALTER TABLE `order_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_Rajiv`
--
ALTER TABLE `order_Rajiv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
