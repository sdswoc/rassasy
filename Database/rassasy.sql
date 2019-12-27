-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2019 at 12:03 AM
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
  `password` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `managername` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `location` varchar(30) NOT NULL,
  `openingtime` varchar(20) NOT NULL,
  `closingtime` varchar(20) NOT NULL,
  `verified` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `canteen`
--

INSERT INTO `canteen` (`id`, `canteenname`, `canteenid`, `password`, `email`, `managername`, `mobile`, `location`, `openingtime`, `closingtime`, `verified`, `status`) VALUES
(1, 'Sarojini_Day', '001', '33cb166ef5aeccec6aa5da09e43f7c70ce16fd7b5f7e74d9b42dc330debcc9ce', 'sarojini@gmail.com', 'Neeta', '9898989898', 'Sarojini', '10:00', '22:00', 0, 0),
(7, 'Sarojini_Night', '007', '33cb166ef5aeccec6aa5da09e43f7c70ce16fd7b5f7e74d9b42dc330debcc9ce', 'sarojininight@gmail.com', 'Shivam', '9797979797', 'Sarojini', '22:00', '10:00', 0, 1),
(8, 'Jawahar_Night', '006', 'a76f9a71e841d30cd40343796b42e11fbc77bd972884348a8ef91870c94bf4f1', 'jawaharnight@gmail.com', 'Shiv', '9696969696', 'Jawahar', '22:00', '10:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_Jawahar_Night`
--

CREATE TABLE `menu_Jawahar_Night` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_Sarojini_Day`
--

CREATE TABLE `menu_Sarojini_Day` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_Sarojini_Night`
--

CREATE TABLE `menu_Sarojini_Night` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `availability` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_Sarojini_Night`
--

INSERT INTO `menu_Sarojini_Night` (`id`, `itemno`, `itemname`, `price`, `availability`) VALUES
(1, 1, 'Tea', 10, 1),
(2, 2, 'Coffee', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_Jawahar_Night`
--

CREATE TABLE `order_Jawahar_Night` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_Sarojini_Night`
--

CREATE TABLE `order_Sarojini_Night` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
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
(12, 'raj', 'raj@ce.iitr.ac.in', 'raj', '22222', '19113135', '8860984429', '', '1', 1),
(14, 'geeta', 'geeta@iitr.ac.in', 'geeta', '99', '19113137', '9818434219', '', '12', 1),
(15, '', 'ravi@iitr.ac.in', 'ravi', '$2y$10$gRTa7GKLCMj6KAOIbFCiqe4S5HMi39LQfhYx0nEZbTDw0dNJ2DN6K', '19113130', '', '1', '', 1),
(16, 'raghav', 'raghav@iitr.ac.in', 'raghav', '$2y$10$L/mgNzvU0s5dxoVRcSW3KOsdmwZA12jtZ0k2A0aEcvPvlEogWgyVG', '19113131', '8860984429', 'Azad', 'A123', 1),
(17, 'rahi', 'rahi@iitr.ac.in', 'rahi', '$2y$10$HLaCj.jCSAgofYIKZvvkjuuGenvVT.yBo8ySf5ju7SHUiPUCo3fKm', '19113132', '8860984429', 'Azad', 'A124', 1),
(18, 'radha', 'radha@iitr.ac.in', 'radha', '$2y$10$0bFqr9hKWfLvAwb/eekniOjWnro650Fr9eSUtcbse70t8m7HvPwQO', '19113133', '9818434218', 'Kasturba', 'A22', 1),
(19, 'Mudit', 'mudit@gmail.com', 'mudit', '', '18822334', '9999999999', 'Rajiv', 'A223', 1),
(20, 'tina', 'tina@gmail.com', 'tina', 'd148bfa1bbe1ce4635f6bc654de582708d6efff9815b4ed28bd49b688830d194', '19114563', '9999988888', 'Sarojini', 'S23', 1);

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
-- Indexes for table `menu_Jawahar_Night`
--
ALTER TABLE `menu_Jawahar_Night`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_Sarojini_Day`
--
ALTER TABLE `menu_Sarojini_Day`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_Sarojini_Night`
--
ALTER TABLE `menu_Sarojini_Night`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `order_Jawahar_Night`
--
ALTER TABLE `order_Jawahar_Night`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_Sarojini_Night`
--
ALTER TABLE `order_Sarojini_Night`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu_Jawahar_Night`
--
ALTER TABLE `menu_Jawahar_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_Sarojini_Day`
--
ALTER TABLE `menu_Sarojini_Day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_Sarojini_Night`
--
ALTER TABLE `menu_Sarojini_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_Jawahar_Night`
--
ALTER TABLE `order_Jawahar_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_Sarojini_Night`
--
ALTER TABLE `order_Sarojini_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
