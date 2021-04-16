-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 10:22 AM
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
  `cpass` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cook`
--

INSERT INTO `cook` (`cid`, `cname`, `cmob`, `cemail`, `carea`, `caddress`, `cgender`, `cspec`, `cpass`, `available`, `join_date`) VALUES
(49, 'Mathew', 1234567890, 'cook1@test.com', 'Aurangabad', 'Aurangabad', 'male', 'Gujarati', '123abcABC@', 0, '2020-04-15'),
(50, 'Lata', 1234567890, 'cook2@test.com', 'Mumbai', 'Mumbai', 'female', 'Maharashtrian', '123abcABC@', 0, '2021-04-15'),
(51, 'Dileep', 1234567890, 'cook3@test.com', 'Mumbai', 'Mumbai', 'male', 'Maharashtrian', '123abcABC@', 0, '2021-04-15'),
(52, 'Girdharlal', 1234567890, 'cook4@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'Gujarati', '123abcABC@', 0, '2021-04-15'),
(53, 'Anshi', 1234567890, 'cook5@test.com', 'Ahmedabad', 'Ahmedabad', 'female', 'Gujarati', '123abcABC@', 0, '2021-04-15'),
(54, 'Abichal', 1234567890, 'cook6@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'punjabi', '123abcABC@', 0, '2021-04-08'),
(55, 'Avneet', 1234567890, 'cook7@test.com', 'Amritsar', 'Amritsar', 'female', 'Punjabi', '123abcABC@', 0, '2021-04-15'),
(56, 'Rathikshan', 1234567890, 'cook8@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'South', '123abcABC@', 0, '2021-04-15'),
(57, 'Midhurana', 1234567890, 'cook9@test.com', 'Chennai', 'Chennai', 'female', 'South', '123abcABC@', 0, '2021-04-15'),
(58, 'Asim', 1234567890, 'cook10@test.com', 'Bhavnagar', 'Bhavnagar', 'male', 'Chinese', '123abcABC@', 0, '2021-04-15'),
(59, 'Dinesh', 1234567890, 'cook11@test.com', 'Vadodara', 'Vadodara', 'male', 'Chinese', '123abcABC@', 0, '2021-04-15'),
(600, 'Saravanaprabu W.', 1234567890, 'cook12@test.com', 'Chennai', 'Chennai', 'male', 'South Indian', '123abcABC@', 0, '2020-03-16');

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
