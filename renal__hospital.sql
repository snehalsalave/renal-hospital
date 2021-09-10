-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 07:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renal _hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branchName` varchar(100) NOT NULL,
  `amountPerPatient` int(100) NOT NULL,
  `branchLocation` varchar(30) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive','','') NOT NULL DEFAULT 'active',
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branchName`, `amountPerPatient`, `branchLocation`, `createdAt`, `status`, `isDeleted`) VALUES
(2, 'pooja salave', 22222222, 'pune', '2021-09-09 09:33:50', 'active', 0),
(3, 'Katraj Branch', 7777, 'Katraj', '2021-09-09 18:58:47', 'active', 0),
(4, 'Default', 0, '-', '2021-09-10 17:22:24', 'active', 0),
(5, 'Pashan', 66, 'Bk', '2021-09-09 18:59:34', 'active', 0),
(6, 'A,Nagar', 454, 'Ng', '2021-09-09 18:59:54', 'active', 0),
(7, 'snehal salave', 150, 'hivre zare', '2021-09-10 10:44:40', 'active', 0),
(8, 'pimpari', 7777, 'pune', '2021-09-10 10:45:03', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patientName` varchar(100) NOT NULL,
  `patientMobile` int(15) NOT NULL,
  `dob` date NOT NULL,
  `userId` int(11) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active',
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patientName`, `patientMobile`, `dob`, `userId`, `status`, `isDeleted`) VALUES
(9, 'ganesh udmale', 2147483647, '0000-00-00', 9, 'Active', 0),
(10, 'snehal salave', 2147483647, '0000-00-00', 9, 'Active', 0),
(11, 'snehal salave', 2147483647, '0000-00-00', 11, 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(40) NOT NULL,
  `userPassword` varchar(30) NOT NULL,
  `mobileNumber` int(15) NOT NULL,
  `branchId` int(11) NOT NULL,
  `userType` enum('admin','staff','doctor','') NOT NULL,
  `status` enum('Active','inactive','','') NOT NULL DEFAULT 'Active',
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `userEmail`, `userPassword`, `mobileNumber`, `branchId`, `userType`, `status`, `isDeleted`) VALUES
(11, 'admin', 'admin@gmail.com', 'admin', 988888888, 0, 'admin', 'Active', 0),
(13, 'doctor one', 'doctorone@gmail.com', '123', 2147483647, 0, 'doctor', 'Active', 0),
(15, 'admin 123', 'snehalsalave130@gmail.com', 'admin', 2147483647, 0, 'doctor', 'Active', 0),
(16, 'Doctor 1', 'dd@gmail.com', '123', 565576576, 0, 'doctor', 'Active', 0),
(17, 'Snehal SSS', 'ss@gmail.com', '123', 9898, 0, 'staff', 'Active', 0),
(18, 'admin', '', 'admin', 55555, 0, 'staff', 'Active', 0),
(19, 'admin', '', 'admin', 0, 0, 'staff', 'Active', 0),
(20, 'admin', 'snehalsalave130@gmail.com', 'admin', 2147483647, 0, 'doctor', 'Active', 0),
(21, 'admin', 'snehalsalave130@gmail.com', 'admin', 2147483647, 0, 'admin', 'Active', 0),
(22, 'admin', 'mane@gmail.com', 'admin', 0, 0, 'admin', 'Active', 0),
(23, 'admin', 'snehalsalave130@gmail.com', 'admin', 2147483647, 0, 'admin', 'Active', 0),
(24, 'admin', 'mane@gmail.com', 'admin', 2147483647, 0, 'staff', 'Active', 0),
(25, 'admin', 'snehalsalave130@gmail.com', 'admin', 0, 0, 'staff', 'Active', 0),
(26, 'admin', 'anita@gmail.com', 'admin', 2147483647, 4, 'staff', 'Active', 0),
(27, 'admin', 'mane@gmail.com', 'admin', 2147483647, 0, 'doctor', 'Active', 0),
(28, 'admin', '', 'admin', 0, 0, 'staff', 'Active', 0),
(29, 'admin', 'snehalsalave130@gmail.com', 'admin', 2147483647, 3, 'staff', 'Active', 0),
(30, 'admin', '', 'admin', 0, 0, 'doctor', 'Active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
