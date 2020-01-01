CREATE DATABASE `rassasy` /*!40100 DEFAULT CHARACTER SET latin1 */
USE rassasy

CREATE TABLE `student` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `username` varchar(50) NOT NULL,
 `password` varchar(70) NOT NULL,
 `enroll` varchar(10) NOT NULL,
 `mobile` varchar(10) NOT NULL,
 `bhawan` varchar(30) NOT NULL,
 `room` varchar(10) NOT NULL,
 `verified` int(2) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`),
 UNIQUE KEY `enroll` (`enroll`),
 UNIQUE KEY `email` (`email`),
 UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `canteen` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `canteenname` varchar(50) NOT NULL,
 `canteenid` varchar(20) NOT NULL,
 `password` varchar(150) NOT NULL,
 `email` varchar(50) NOT NULL,
 `managername` varchar(50) NOT NULL,
 `mobile` varchar(10) NOT NULL,
 `location` varchar(30) NOT NULL,
 `openingtime` varchar(20) NOT NULL,
 `closingtime` varchar(20) NOT NULL,
 `verified` int(2) NOT NULL DEFAULT '1',
 `status` int(2) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`),
 UNIQUE KEY `canteenname` (`canteenname`),
 UNIQUE KEY `canteenid` (`canteenid`),
 UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
