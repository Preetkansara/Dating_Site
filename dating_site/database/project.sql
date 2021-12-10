-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2021 at 06:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `fuid` int(11) NOT NULL,
  `uemail` varchar(45) NOT NULL,
  `femail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`fuid`, `uemail`, `femail`) VALUES
(18, 'agnes@gmail.com', 'roy@gmail.com'),
(19, 'agnes@gmail.com', 'gauthier@gmail.com'),
(22, 'lpo@gmail.com', 'gauthier@gmail.com'),
(23, 'lpo@gmail.com', 'paul@gmail.com'),
(24, 'lpo@gmail.com', 'francoise@gmail.com'),
(25, 'lpo@gmail.com', 'roy@gmail.com'),
(26, 'lpo@gmail.com', 'roy@gmail.com'),
(27, 'lpo@gmail.com', 'roy@gmail.com'),
(28, 'lpo@gmail.com', 'roy@gmail.com'),
(29, 'lpo@gmail.com', 'roy@gmail.com'),
(30, 'lpo@gmail.com', 'roy@gmail.com'),
(31, 'lpo@gmail.com', 'roy@gmail.com'),
(32, 'lpo@gmail.com', 'roy@gmail.com'),
(33, 'lpo@gmail.com', 'gauthier@gmail.com'),
(35, 'gauthier@gmail.com', 'roy@gmail.com'),
(37, 'martin@gmail.com', 'roy@gmail.com'),
(39, 'roy@gmail.com', 'martin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `ulevel` int(10) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `pwd`, `ulevel`, `img`) VALUES
(6, 'Pierre', 'Roy', 'roy@gmail.com', 'r123', 3, '1.jpg'),
(8, 'Jacques', 'Martin', 'martin@gmail.com', 'm123', 1, '3.jpg'),
(9, 'Nicolas', 'Paul', 'paul@gmail.com', 'p123', 1, '4.jpg'),
(10, 'Gabriel', 'Amable', 'amable@gmail.com', 'a123', 1, '5.jpg'),
(11, 'Marie ', 'Louise', 'louise@gmail.com', 'l123', 1, '44.jpg'),
(12, 'Catherine', 'Francoise', 'francoise@gmail.com', 'f123', 2, '47.jpg'),
(13, 'Charlotte', 'Allard', 'Allard@gmail.com', 'a123', 1, '63.jpg'),
(16, 'Monica', 'Geller', 'geller@gmail.com', 'g123', 1, 'hh.jpg'),
(17, 'Nairobi', 'Agnes', 'agnes@gmail.com', 'a123', 1, 'money-heist-nairobi-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wink`
--

CREATE TABLE `wink` (
  `wid` int(11) NOT NULL,
  `semail` varchar(45) NOT NULL,
  `remail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wink`
--

INSERT INTO `wink` (`wid`, `semail`, `remail`) VALUES
(12, 'agnes@gmail.com', 'gauthier@gmail.com'),
(13, 'roy@gmail.com', 'agnes@gmail.com'),
(23, 'lpo@gmail.com', 'gauthier@gmail.com'),
(27, 'roy@gmail.com', 'agnes@gmail.com'),
(28, 'roy@gmail.com', 'agnes@gmail.com'),
(29, 'roy@gmail.com', 'gauthier@gmail.com'),
(30, 'roy@gmail.com', 'agnes@gmail.com'),
(31, 'roy@gmail.com', 'martin@gmail.com'),
(33, 'roy@gmail.com', 'martin@gmail.com'),
(34, 'roy@gmail.com', 'martin@gmail.com'),
(35, 'roy@gmail.com', 'martin@gmail.com'),
(36, 'roy@gmail.com', 'paul@gmail.com'),
(37, 'roy@gmail.com', 'paul@gmail.com'),
(38, 'roy@gmail.com', 'paul@gmail.com'),
(39, 'roy@gmail.com', 'francoise@gmail.com'),
(40, 'roy@gmail.com', 'Allard@gmail.com'),
(41, 'roy@gmail.com', 'martin@gmail.com'),
(42, 'roy@gmail.com', 'martin@gmail.com'),
(43, 'roy@gmail.com', 'martin@gmail.com'),
(44, 'roy@gmail.com', 'martin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`fuid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wink`
--
ALTER TABLE `wink`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `fuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wink`
--
ALTER TABLE `wink`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
