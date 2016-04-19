-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2016 at 09:23 AM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zdouglas`
--

-- --------------------------------------------------------

--
-- Table structure for table `userProfileInfo`
--

CREATE TABLE IF NOT EXISTS `userProfileInfo` (
  `userID` int(11) NOT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `profilePicPath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userProfileInfo`
--

INSERT INTO `userProfileInfo` (`userID`, `bio`, `location`, `profilePicPath`) VALUES
(12, 'test', 'test', './pictures/think.jpg'),
(20, 'test', 'test', './pictures/think.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userProfileInfo`
--
ALTER TABLE `userProfileInfo`
  ADD PRIMARY KEY (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userProfileInfo`
--
ALTER TABLE `userProfileInfo`
  ADD CONSTRAINT `userProfileInfo_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
