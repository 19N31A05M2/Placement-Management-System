-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 07:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rollno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `fathermobile` bigint(10) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `altgmail` varchar(30) NOT NULL,
  `clgmail` varchar(30) NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `mobilenumber2` bigint(10) NOT NULL,
  `caste` varchar(20) NOT NULL,
  `adharnumber` bigint(12) NOT NULL,
  `pancard` varchar(10) DEFAULT NULL,
  `schoolp` float NOT NULL,
  `schoolname` text NOT NULL,
  `schoolboard` varchar(50) NOT NULL,
  `schoolyear` year(4) NOT NULL,
  `after10th` varchar(20) NOT NULL,
  `interp` float NOT NULL,
  `board` varchar(50) NOT NULL,
  `interyear` varchar(4) NOT NULL,
  `placeofbirth` varchar(50) NOT NULL,
  `eamcetrank` bigint(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `section` varchar(1) NOT NULL,
  `btechbatch` varchar(9) NOT NULL,
  `btechcgpa` float NOT NULL,
  `backlogs` int(11) NOT NULL,
  `hbacklogs` int(11) NOT NULL,
  `passoutyear` year(4) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `adharnumber` (`adharnumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
