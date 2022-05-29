-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 03:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`username`, `password`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `canidate`
--

CREATE TABLE `canidate` (
  `cid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `post` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canidate`
--

INSERT INTO `canidate` (`cid`, `name`, `photo`, `post`, `address`) VALUES
(32, 'Robin Hood', '21-08-25-05213221-08-25-05115521-08-24-0252180.jpg', 'Chairman', 'pokhara'),
(34, 'Leo Barlow', '21-08-25-0349172.jpg', 'Member', 'Baglung'),
(35, 'ram', '21-08-25-042916image.jpg', 'Vice-Chairman', 'Jumla'),
(36, 'Bibek shrestha', '21-08-26-061621image1.jpg', 'Chairman', 'Ilam');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `vid` int(11) NOT NULL,
  `cn` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`vid`, `cn`, `name`, `password`) VALUES
(1, '22-22-22-21212', 'bibek', 'bibek'),
(2, '11-11-11-11111', 'mahara@gmail.com', '1234'),
(3, '33-33-33-33333', 'mahesh', 'mahes'),
(4, '44-44-44-4444', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vote_table`
--

CREATE TABLE `vote_table` (
  `vtid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote_table`
--

INSERT INTO `vote_table` (`vtid`, `vid`, `cid`) VALUES
(2, 1, 34),
(3, 2, 32),
(4, 4, 32),
(5, 5, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canidate`
--
ALTER TABLE `canidate`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `cn` (`cn`);

--
-- Indexes for table `vote_table`
--
ALTER TABLE `vote_table`
  ADD PRIMARY KEY (`vtid`),
  ADD KEY `vid` (`vid`),
  ADD KEY `vote_table_ibfk_1` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canidate`
--
ALTER TABLE `canidate`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vote_table`
--
ALTER TABLE `vote_table`
  MODIFY `vtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vote_table`
--
ALTER TABLE `vote_table`
  ADD CONSTRAINT `vote_table_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `canidate` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
