-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 11:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `de`
--

-- --------------------------------------------------------

--
-- Table structure for table `cook`
--

CREATE TABLE `cook` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cmob` bigint(20) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `carea` varchar(255) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `cgender` varchar(10) NOT NULL,
  `cspec` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cook`
--

INSERT INTO `cook` (`cid`, `cname`, `cmob`, `cemail`, `carea`, `caddress`, `cgender`, `cspec`, `cpass`) VALUES
(41, 'jani Kaushal', 7048403078, 'jani@test.com', 'mahila', 'muni', 'male', 'maggie', 'abcABC123!'),
(47, 'Dharmayu', 123456789, 'dharmayupathak888@gmail.com', 'mahila', 'leela', 'male', 'pizza', 'Rchu!t123'),
(48, 'Ramprasad', 1234567890, 'ramprasad.r2600@gmail.com', 'Porbandar', 'porbandar', 'male', 'noodles', '123abcABC@'),
(49, 'Mathew', 1234567890, 'cook1@test.com', 'Aurangabad', 'Aurangabad', 'male', 'gujarati', '123abcABC@'),
(50, 'Lata', 1234567890, 'cook2@test.com', 'Mumbai', 'Mumbai', 'female', 'Maharashtrian', '123abcABC@'),
(51, 'Dileep', 1234567890, 'cook3@test.com', 'Mumbai', 'Mumbai', 'male', 'cook1@test.com', '123abcABC@'),
(52, 'Girdharlal', 1234567890, 'cook4@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'Gujarati', '123abcABC@'),
(53, 'Anshi', 1234567890, 'cook5@test.com', 'Ahmedabad', 'Ahmedabad', 'female', 'cook1@test.com', '123abcABC@'),
(54, 'Abichal', 1234567890, 'cook6@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'Punjabi', '123abcABC@'),
(55, 'Avneet', 1234567890, 'cook7@test.com', 'Amritsar', 'Amritsar', 'female', 'cook2@test.com', '123abcABC@'),
(56, 'Rathikshan', 1234567890, 'cook8@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'South', '123abcABC@'),
(57, 'Midhurana', 1234567890, 'cook9@test.com', 'Chennai', 'Chennai', 'female', 'South', '123abcABC@'),
(58, 'Asim', 1234567890, 'cook10@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'Chinese', '123abcABC@'),
(59, 'Dinesh', 1234567890, 'cook11@test.com', 'Vadodara', 'Vadodara', 'male', 'cook2@test.com', '123abcABC@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cook`
--
ALTER TABLE `cook`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cook`
--
ALTER TABLE `cook`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
