-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 03:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `entryID` int(11) NOT NULL,
  `courseCode` varchar(10) DEFAULT NULL,
  `occ` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`entryID`, `courseCode`, `occ`) VALUES
(1, 'WIX1001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `entryID` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `occ` varchar(2) NOT NULL,
  `day` varchar(10) NOT NULL,
  `timeS` varchar(50) NOT NULL,
  `timeE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`entryID`, `username`, `courseCode`, `courseName`, `occ`, `day`, `timeS`, `timeE`) VALUES
(2, 'Lecturer 2', '123', 'Math', '1', 'Monday', '0900', '1000'),
(4, 'Lecturer 3', '456', 'Physic', '12', 'Monday', '1900', '2200'),
(8, 'lecturer1', '123', 'Math', '15', 'Tuesday', '1600', '1700'),
(9, 'lecturer1', '111', 'Test', '1', 'Tuesday', '1000', '1100'),
(10, 'lecturer1', '999', 'Meeting', '1', 'Wednesday', '1100', '1300'),
(18, 'lecturer1', 'WIX1001', 'CM', '1', 'Friday', '0900', '1000'),
(19, 'lecturer2', 'WIF3005', 'Software Requirements ', '1', 'Friday', '1000', '1200'),
(20, 'lecturer2', 'WIX1002', 'HCI', '1', 'Tuesday', '0900', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer1`
--

CREATE TABLE `lecturer1` (
  `entryID` int(11) NOT NULL,
  `courseCode` varchar(10) DEFAULT NULL,
  `occ` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer1`
--

INSERT INTO `lecturer1` (`entryID`, `courseCode`, `occ`) VALUES
(2, '123', 15),
(3, '111', 1),
(5, 'WIX1001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer2`
--

CREATE TABLE `lecturer2` (
  `entryID` int(11) NOT NULL,
  `courseCode` varchar(10) DEFAULT NULL,
  `occ` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer2`
--

INSERT INTO `lecturer2` (`entryID`, `courseCode`, `occ`) VALUES
(1, 'WIF3005', 1),
(2, 'WIX1002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `status`) VALUES
(1, 'wif190027', '12345678', 'Student'),
(10, 'lecturer1', 'password', 'Lecturer'),
(11, 'wif190001', 'password', 'Student'),
(13, 'admin', 'password', 'Student'),
(14, 'admin', 'password', 'Student'),
(15, 'lecturer2', '123', 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `wif190027`
--

CREATE TABLE `wif190027` (
  `entryID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `occ` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wif190027`
--

INSERT INTO `wif190027` (`entryID`, `courseCode`, `occ`) VALUES
(1, '123', 1),
(5, '456', 12),
(7, '111', 1),
(9, '999', 1),
(10, 'WIF3005', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `lecturer1`
--
ALTER TABLE `lecturer1`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `lecturer2`
--
ALTER TABLE `lecturer2`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wif190027`
--
ALTER TABLE `wif190027`
  ADD PRIMARY KEY (`entryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `entryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `entryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lecturer1`
--
ALTER TABLE `lecturer1`
  MODIFY `entryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecturer2`
--
ALTER TABLE `lecturer2`
  MODIFY `entryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wif190027`
--
ALTER TABLE `wif190027`
  MODIFY `entryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
