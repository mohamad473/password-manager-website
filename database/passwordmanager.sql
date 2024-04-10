-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 10:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passwordmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `sitename` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountID`, `userID`, `email`, `sitename`, `password`) VALUES
(28, 34, 'adonis-facebook@gmail.com', 'facebook.com', '#ConnectionsIsVulnerable#'),
(29, 34, 'adonis-nasa@gmail.com', 'nasa.com', 'blackhole'),
(30, 34, 'adonis-gmail@gmail.com', 'gmail.com', 'sendittome'),
(31, 34, 'adonis-nsa@gmail.com', 'nsa.com', '#NoSecretsHere#'),
(33, 34, 'adonis-ibf@gmail.com', 'ibf.com', '#We\'reinTheLead#'),
(36, 34, 'adonis-netflex@gmail.com', 'netflex.com', '#EnjoyTheMoment#'),
(37, 34, 'adonis-instagram@gmail.com', 'instagram.com', '#HellYeah12#');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(2, 'socialMedia'),
(19, 'Finance'),
(55, 'Email'),
(56, 'Work'),
(57, 'E-Commerce'),
(58, 'Personal'),
(59, 'Application'),
(60, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `passhistory`
--

CREATE TABLE `passhistory` (
  `historyID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `oldpassword` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passhistory`
--

INSERT INTO `passhistory` (`historyID`, `accountID`, `oldpassword`) VALUES
(14, 13, '#weallgonnadie#'),
(15, 15, '#oldisgold#'),
(16, 8, '#blackkeysalwaysbetter#'),
(17, 16, '#ilostmymind#'),
(18, 10, '#thingisnothing#'),
(19, 17, '#thisisvoid#');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `rolename` varchar(5) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `userID`, `rolename`, `description`) VALUES
(1, 11, 'User', 'User Privilege'),
(10, 4, 'user', 'User Privilege'),
(11, 2, 'User', 'user Privilege '),
(14, 12, 'Admin', 'responsible for managing, overseeing, and maintaining the operations'),
(16, 16, 'User', 'User privilege'),
(17, 4, 'User', 'User Privilege'),
(18, 14, 'User', 'User Privilege'),
(19, 13, 'User', 'User Privilege'),
(20, 15, 'User', 'User Privilege');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `role`) VALUES
(30, 'beethoven1', 'beethoven@gmail.com', '$2y$10$mq/NNK0XBvz5mD9BUtW1uOeqScck0RlfV4ug9YLfxXCqArIE1DYdW', 'Admin'),
(34, 'adonis11', 'adonis@gmail.com', '$2y$10$m8ed6/anM3WcS2PaAAaX4.0OzWRmORTJIWUBOFL.7.eoIEnfayumG', 'user'),
(41, 'CarlSagan', 'carl@gmail.com', '$2y$10$n2ntizxcw.vbBy1MEaf2genwOjETMCI9D2FC3QA1AccUSun4kZUni', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountID`),
  ADD KEY `accountID` (`accountID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `passhistory`
--
ALTER TABLE `passhistory`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `passhistory`
--
ALTER TABLE `passhistory`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
