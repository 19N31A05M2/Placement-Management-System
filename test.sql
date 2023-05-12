-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 02:06 PM
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
-- Table structure for table `placed`
--

CREATE TABLE `placed` (
  `id` int(11) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `section` varchar(1) NOT NULL,
  `companyid` int(11) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `package` double NOT NULL,
  `selecteddate` date NOT NULL,
  `passoutyear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` int(11) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `passouts` year(4) NOT NULL,
  `package` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `branches` varchar(23) NOT NULL,
  `btechp` float NOT NULL,
  `interp` float NOT NULL,
  `schoolp` float NOT NULL,
  `backlogs` int(11) NOT NULL,
  `hbacklogs` int(11) NOT NULL,
  `totaleligible` varchar(50) NOT NULL,
  `selected` varchar(50) NOT NULL,
  `previouslyplaced` enum('YES','NO','','') NOT NULL,
  `studygap` enum('YES','NO','','') NOT NULL,
  `eamcetrank` bigint(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `fathermobile` bigint(10) DEFAULT NULL,
  `gmail` varchar(50) NOT NULL,
  `altgmail` varchar(30) NOT NULL,
  `clgmail` varchar(30) DEFAULT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `mobilenumber2` bigint(10) NOT NULL,
  `caste` varchar(20) DEFAULT NULL,
  `adharnumber` bigint(12) NOT NULL,
  `pancard` varchar(10) DEFAULT NULL,
  `schoolp` float NOT NULL,
  `schoolname` text DEFAULT NULL,
  `schoolboard` varchar(50) DEFAULT NULL,
  `schoolyear` year(4) DEFAULT NULL,
  `after10th` varchar(20) DEFAULT NULL,
  `interp` float NOT NULL,
  `board` varchar(50) DEFAULT NULL,
  `interyear` varchar(4) DEFAULT NULL,
  `placeofbirth` varchar(50) DEFAULT NULL,
  `eamcetrank` bigint(20) NOT NULL DEFAULT 0,
  `branch` varchar(10) NOT NULL,
  `section` varchar(1) NOT NULL,
  `btechbatch` varchar(9) NOT NULL,
  `btechcgpa` float NOT NULL,
  `backlogs` int(11) NOT NULL,
  `hbacklogs` int(11) NOT NULL DEFAULT 0,
  `passoutyear` year(4) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `rollno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `placed`
--
ALTER TABLE `placed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `placed`
--
ALTER TABLE `placed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
