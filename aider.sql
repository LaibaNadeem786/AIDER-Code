-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 05:03 PM
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
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `mobileNo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`username`, `password`, `fullname`, `mobileNo`) VALUES
('clary', 'clary', 'Clary Fairchild', 1222),
('jace', 'e2fc714c4727ee9395f324cd2e7f331f', 'Jace Herondale', 123455),
('jane', 'e99a18c428cb38d5f260853678922e03', 'Jane', 1234565666),
('jem', '08f8e0260c64418510cefb2b06eee5cd', 'Jem', 0),
('jjj', 'f27f6f1c7c5cbf4e3e192e0a47b85300', 'Jem', 12344566),
('kaz', 'kaz123', 'Kaz Brekker', 111111),
('laiba', '900150983cd24fb0d6963f7d28e17f72', 'Laiba', 123777790),
('nina', 'f2ceea1536ac1b8fed1a167a9c8bf04d', 'Nina Zenik', 111);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` int(10) NOT NULL,
  `service` int(100) NOT NULL,
  `reviewDate` date NOT NULL,
  `rating` int(10) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `senior` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewID`, `service`, `reviewDate`, `rating`, `comments`, `senior`) VALUES
(15, 101, '2018-11-15', 2, 'yuyuyu', 'tessa'),
(16, 101, '2018-11-15', 2, 'yuyuyu', 'tessa'),
(17, 101, '2018-11-23', 3, 'ghgjhgjh', 'tessa'),
(18, 101, '2018-11-23', 3, 'ghgjhgjh', 'tessa'),
(19, 101, '2018-11-29', 2, 'jkjk', 'tessa'),
(20, 101, '2018-11-29', 2, 'jkjk', 'tessa'),
(21, 101, '2018-11-22', 4, 'jkhjlhkjhjkhl', 'tessa');

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

CREATE TABLE `senior` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `mobileNo` int(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senior`
--

INSERT INTO `senior` (`username`, `password`, `fullname`, `mobileNo`, `address`) VALUES
('ahmed786', '96e79218965eb72c92a549dd5a330112', 'Ahmed', 123456789, 'jalan Dungun'),
('Amal', '114757f81b01e8765f711cb2be4ef038', 'Amal', 333333, 'Jalan Maroof'),
('clary', '900150983cd24fb0d6963f7d28e17f72', 'Clary Fray', 355443388, 'rrrrrrr'),
('tessa', '81f2190577663a61c0a327e2753e6307', 'Tessa Gray', 12345667, 'KL'),
('will', 'e99a18c428cb38d5f260853678922e03', 'Willam Herondale', 2147483647, 'KL');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceCode` int(100) NOT NULL,
  `serviceName` varchar(50) NOT NULL,
  `serviceType` varchar(50) NOT NULL,
  `serviceDesc` varchar(100) NOT NULL,
  `provider` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceCode`, `serviceName`, `serviceType`, `serviceDesc`, `provider`) VALUES
(101, 'Shop grocery', 'shopping', 'shop', 'nina'),
(102, 'Home Cleaning', 'cleaning', 'clean home', 'nina');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `requestID` int(100) NOT NULL,
  `requiredDate` date NOT NULL,
  `requiredTime` time NOT NULL,
  `notes` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `senior` varchar(50) NOT NULL,
  `serviceCode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`requestID`, `requiredDate`, `requiredTime`, `notes`, `status`, `senior`, `serviceCode`) VALUES
(1, '2018-11-17', '12:59:00', ' Shopping should be done well', 'Completed', 'Amal', 101),
(2, '2018-11-17', '12:59:00', ' Shopping should be done well', 'Completed', 'Amal', 101),
(3, '2018-11-17', '12:59:00', 'notes', 'pending', 'Amal', 101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD UNIQUE KEY `reviewID` (`reviewID`),
  ADD KEY `service` (`service`),
  ADD KEY `senior` (`senior`);

--
-- Indexes for table `senior`
--
ALTER TABLE `senior`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceCode`),
  ADD UNIQUE KEY `serviceID` (`serviceCode`),
  ADD UNIQUE KEY `serviceID_2` (`serviceCode`),
  ADD KEY `provider` (`provider`),
  ADD KEY `serviceType` (`serviceType`);

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
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceCode` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `requestID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`service`) REFERENCES `service` (`serviceCode`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`senior`) REFERENCES `senior` (`username`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`provider`) REFERENCES `provider` (`username`);

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
