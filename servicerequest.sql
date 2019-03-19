-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 05:27 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aider`
--

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `requestID` int(100) NOT NULL,
  `requiredDate` date NOT NULL,
  `requiredTime` varchar(11) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `senior` varchar(50) NOT NULL,
  `serviceCode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`requestID`, `requiredDate`, `requiredTime`, `notes`, `status`, `senior`, `serviceCode`) VALUES
(3, '0000-00-00', '', '', 'pending', 'HELLO', 106),
(4, '2018-11-15', '01:00', 'DDDD', 'pending', 'HELLO', 106),
(5, '2018-11-15', '12:59', 'hello notes', 'pending', 'HELLO', 106);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD PRIMARY KEY (`requestID`),
  ADD UNIQUE KEY `requestID` (`requestID`),
  ADD KEY `senior` (`senior`),
  ADD KEY `senior_2` (`senior`),
  ADD KEY `serviceID` (`serviceCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `requestID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD CONSTRAINT `servicerequest_ibfk_1` FOREIGN KEY (`senior`) REFERENCES `senior` (`username`),
  ADD CONSTRAINT `servicerequest_ibfk_2` FOREIGN KEY (`serviceCode`) REFERENCES `service` (`serviceCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
