-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2020 at 12:17 AM
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
(8, 'Jawahar_Night', '006', 'a76f9a71e841d30cd40343796b42e11fbc77bd972884348a8ef91870c94bf4f1', 'jawaharnight@gmail.com', 'Shiv', '9696969696', 'Jawahar', '22:00', '10:00', 0, 0),
(9, 'jawaharday', '111', 'a76f9a71e841d30cd40343796b42e11fbc77bd972884348a8ef91870c94bf4f1', 'jawaharday@gmail.com', 'Ravi', '9999999999', 'jawahar', '10:00', '22:00', 0, 0),
(11, 'kasturbaday', '112', '3b83a001adcc6a61141e04987f4edcde31274e18074d1d744e3dedb7f4d3ceb1', 'kasturbaday@gmail.com', 'Ravi', '9999999999', 'kasturba', '10:00', '22:00', 0, 0),
(12, 'kasturbanight', '113', '3b83a001adcc6a61141e04987f4edcde31274e18074d1d744e3dedb7f4d3ceb1', 'kasturbanight@gmail.com', 'Nisha', '7777777777', 'kasturba', '22:00', '10:00', 0, 0),
(13, 'azadnight', '1111', 'ede547376faa7c7466efb1158219856b274b9f9a12e6b32d62545a99efe71123', 'azadnight@gmail.com', 'rahi', '111111111', 'azad', '10:00', '22:00', 0, 0),
(14, 'lab', '3', 'ecd81417359fb32af5f5f9188868aceb495fb3a599b77f5d9280d06571c74c83', 'abc@abc.com', 'shreya', '93874389', 'rorkee', '04:56', '03:56', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_azadnight`
--

CREATE TABLE `feedback_azadnight` (
  `id` int(11) NOT NULL,
  `trackingid` int(2) DEFAULT NULL,
  `itemid` varchar(5) DEFAULT NULL,
  `orderid` varchar(5) DEFAULT NULL,
  `studentid` varchar(5) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_kasturbanight`
--

CREATE TABLE `feedback_kasturbanight` (
  `id` int(11) NOT NULL,
  `trackingid` int(2) DEFAULT NULL,
  `itemid` varchar(5) DEFAULT NULL,
  `orderid` varchar(5) DEFAULT NULL,
  `studentid` varchar(5) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_lab`
--

CREATE TABLE `feedback_lab` (
  `id` int(11) NOT NULL,
  `trackingid` int(2) DEFAULT NULL,
  `itemid` varchar(5) DEFAULT NULL,
  `orderid` varchar(5) DEFAULT NULL,
  `studentid` varchar(5) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_Sarojini_Night`
--

CREATE TABLE `feedback_Sarojini_Night` (
  `id` int(11) NOT NULL,
  `trackingid` int(2) DEFAULT NULL,
  `itemid` varchar(5) DEFAULT NULL,
  `orderid` varchar(5) DEFAULT NULL,
  `studentid` varchar(5) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_Sarojini_Night`
--

INSERT INTO `feedback_Sarojini_Night` (`id`, `trackingid`, `itemid`, `orderid`, `studentid`, `rating`) VALUES
(1, 1, '1', '1', '20', 5),
(2, 2, '2', '1', '20', 4),
(3, 3, '1', '1', '20', 6),
(4, 5, '1', '1', '20', -1),
(5, 4, '2', '1', '20', 5),
(6, 6, '2', '1', '20', 5),
(7, 8, '2', '1', '20', 5),
(8, 7, '1', '1', '20', 5),
(9, 9, '1', '1', '20', 5),
(10, 13, '1', '4', '20', 5),
(11, 10, '2', '1', '20', 2),
(12, 11, '2', '2', '20', 2),
(21, 17, '1', '8', '21', 2),
(22, 17, '1', '8', '21', 2),
(23, 17, '1', '8', '21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_azadnight`
--

CREATE TABLE `menu_azadnight` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_azadnight`
--

INSERT INTO `menu_azadnight` (`id`, `itemno`, `itemname`, `price`, `rating`, `status`) VALUES
(1, 1, 'tea', 10, NULL, NULL),
(2, 2, 'coffee', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_jawaharday`
--

CREATE TABLE `menu_jawaharday` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `menu_kasturbaday`
--

CREATE TABLE `menu_kasturbaday` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_kasturbanight`
--

CREATE TABLE `menu_kasturbanight` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_lab`
--

CREATE TABLE `menu_lab` (
  `id` int(11) NOT NULL,
  `itemno` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `status` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_lab`
--

INSERT INTO `menu_lab` (`id`, `itemno`, `itemname`, `price`, `rating`, `status`) VALUES
(1, 53, 'ddf', 3, NULL, NULL);

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
  `status` int(2) DEFAULT '1',
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_Sarojini_Night`
--

INSERT INTO `menu_Sarojini_Night` (`id`, `itemno`, `itemname`, `price`, `status`, `rating`) VALUES
(1, 1, 'Tea', 10, 1, 3.44444),
(2, 2, 'Coffee', 15, 0, 3.6),
(3, 8, 'yu', 4, 1, 0),
(4, 9, 'yuo', 4, 0, 0),
(5, 7, 'yoi', 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_azadnight`
--

CREATE TABLE `order_azadnight` (
  `id` int(11) NOT NULL,
  `itemid` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `count` int(2) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `total` int(5) DEFAULT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` varchar(15) DEFAULT NULL,
  `student_id` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_jawaharday`
--

CREATE TABLE `order_jawaharday` (
  `id` int(11) NOT NULL,
  `itemid` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `count` int(2) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `total` int(5) DEFAULT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` varchar(15) DEFAULT NULL,
  `student_id` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `order_kasturbaday`
--

CREATE TABLE `order_kasturbaday` (
  `id` int(11) NOT NULL,
  `itemid` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `count` int(2) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `total` int(5) DEFAULT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` varchar(15) DEFAULT NULL,
  `student_id` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_kasturbanight`
--

CREATE TABLE `order_kasturbanight` (
  `id` int(11) NOT NULL,
  `itemid` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `count` int(2) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `total` int(5) DEFAULT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` varchar(15) DEFAULT NULL,
  `student_id` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_lab`
--

CREATE TABLE `order_lab` (
  `id` int(11) NOT NULL,
  `itemid` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `count` int(2) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `total` int(5) DEFAULT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` varchar(15) DEFAULT NULL,
  `student_id` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_Sarojini_Night`
--

CREATE TABLE `order_Sarojini_Night` (
  `id` int(11) NOT NULL,
  `itemid` int(10) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `count` int(2) NOT NULL,
  `orderid` int(10) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `student_name` varchar(20) DEFAULT NULL,
  `student_mobile` varchar(15) DEFAULT NULL,
  `student_id` int(10) NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_Sarojini_Night`
--

INSERT INTO `order_Sarojini_Night` (`id`, `itemid`, `itemname`, `count`, `orderid`, `price`, `total`, `student_name`, `student_mobile`, `student_id`, `status`) VALUES
(1, 1, 'Tea', 1, 1, 10, 10, 'tina', '9999988888', 20, 1),
(2, 2, 'Coffee', 1, 1, 15, 15, 'tina', '9999988888', 20, 1),
(3, 1, 'Tea', 1, 1, 10, 10, 'tina', '9999988888', 20, 1),
(4, 2, 'Coffee', 1, 1, 15, 15, 'tina', '9999988888', 20, 1),
(5, 1, 'Tea', 1, 1, 10, 10, 'tina', '9999988888', 20, 1),
(6, 2, 'Coffee', 1, 1, 15, 15, 'tina', '9999988888', 20, 1),
(7, 1, 'Tea', 1, 1, 10, 10, 'tina', '9999988888', 20, 1),
(8, 2, 'Coffee', 1, 1, 15, 15, 'tina', '9999988888', 20, 1),
(9, 1, 'Tea', 1, 1, 10, 10, 'tina', '9999988888', 20, 1),
(10, 2, 'Coffee', 1, 1, 15, 15, 'tina', '9999988888', 20, 1),
(11, 2, 'Coffee', 1, 2, 15, 15, 'tina', '9999988888', 20, 1),
(12, 2, 'Coffee', 3, 3, 15, 45, 'tina', '9999988888', 20, 1),
(13, 1, 'Tea', 2, 4, 10, 20, 'tina', '9999988888', 20, 1),
(14, 1, 'Tea', 2, 5, 10, 20, 'tina', '9999988888', 20, 1),
(15, 1, 'Tea', 1, 6, 10, 10, 'tina', '9999988888', 20, 1),
(16, 5, 'yoi', 1, 7, 6, 6, 'tina', '9999988888', 20, 1),
(17, 1, 'Tea', 2, 8, 10, 20, 'karan', '876543', 21, 1);

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
(4, 'Shrey', '1234@gmail.com', '1234', '1234', '1234', '1234', 'azad', '1234', 1),
(12, 'raj', 'raj@ce.iitr.ac.in', 'raj', '22222', '19113135', '8860984429', '', '1', 1),
(14, 'geeta', 'geeta@iitr.ac.in', 'geeta', '99', '19113137', '9818434219', '', '12', 1),
(16, 'raghav', 'raghav@iitr.ac.in', 'raghav', '$2y$10$L/mgNzvU0s5dxoVRcSW3KOsdmwZA12jtZ0k2A0aEcvPvlEogWgyVG', '19113131', '8860984429', 'Azad', 'A123', 1),
(17, 'rahi', 'rahi@iitr.ac.in', 'rahi', '$2y$10$HLaCj.jCSAgofYIKZvvkjuuGenvVT.yBo8ySf5ju7SHUiPUCo3fKm', '19113132', '8860984429', 'Azad', 'A124', 1),
(18, 'radha', 'radha@iitr.ac.in', 'radha', '$2y$10$0bFqr9hKWfLvAwb/eekniOjWnro650Fr9eSUtcbse70t8m7HvPwQO', '19113133', '9818434218', 'Kasturba', 'A22', 1),
(19, 'Mudit', 'mudit@gmail.com', 'mudit', '', '18822334', '9999999999', 'Rajiv', 'A223', 1),
(21, 'karan', 'adc@abc.com', 'kps', 'ecd81417359fb32af5f5f9188868aceb495fb3a599b77f5d9280d06571c74c83', '83283', '876543', 'Rajiv', '87', 1);

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
-- Indexes for table `feedback_azadnight`
--
ALTER TABLE `feedback_azadnight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trackingid` (`trackingid`);

--
-- Indexes for table `feedback_kasturbanight`
--
ALTER TABLE `feedback_kasturbanight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_lab`
--
ALTER TABLE `feedback_lab`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trackingid` (`trackingid`);

--
-- Indexes for table `feedback_Sarojini_Night`
--
ALTER TABLE `feedback_Sarojini_Night`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_azadnight`
--
ALTER TABLE `menu_azadnight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_jawaharday`
--
ALTER TABLE `menu_jawaharday`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_Jawahar_Night`
--
ALTER TABLE `menu_Jawahar_Night`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_kasturbaday`
--
ALTER TABLE `menu_kasturbaday`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_kasturbanight`
--
ALTER TABLE `menu_kasturbanight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemno` (`itemno`);

--
-- Indexes for table `menu_lab`
--
ALTER TABLE `menu_lab`
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
-- Indexes for table `order_azadnight`
--
ALTER TABLE `order_azadnight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_jawaharday`
--
ALTER TABLE `order_jawaharday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_Jawahar_Night`
--
ALTER TABLE `order_Jawahar_Night`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_kasturbaday`
--
ALTER TABLE `order_kasturbaday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_kasturbanight`
--
ALTER TABLE `order_kasturbanight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lab`
--
ALTER TABLE `order_lab`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `feedback_azadnight`
--
ALTER TABLE `feedback_azadnight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback_kasturbanight`
--
ALTER TABLE `feedback_kasturbanight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback_lab`
--
ALTER TABLE `feedback_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback_Sarojini_Night`
--
ALTER TABLE `feedback_Sarojini_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `menu_azadnight`
--
ALTER TABLE `menu_azadnight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu_jawaharday`
--
ALTER TABLE `menu_jawaharday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_Jawahar_Night`
--
ALTER TABLE `menu_Jawahar_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_kasturbaday`
--
ALTER TABLE `menu_kasturbaday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_kasturbanight`
--
ALTER TABLE `menu_kasturbanight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_lab`
--
ALTER TABLE `menu_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_Sarojini_Day`
--
ALTER TABLE `menu_Sarojini_Day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_Sarojini_Night`
--
ALTER TABLE `menu_Sarojini_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_azadnight`
--
ALTER TABLE `order_azadnight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_jawaharday`
--
ALTER TABLE `order_jawaharday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_Jawahar_Night`
--
ALTER TABLE `order_Jawahar_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_kasturbaday`
--
ALTER TABLE `order_kasturbaday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_kasturbanight`
--
ALTER TABLE `order_kasturbanight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_lab`
--
ALTER TABLE `order_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_Sarojini_Night`
--
ALTER TABLE `order_Sarojini_Night`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
