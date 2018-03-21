-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 05:10 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab6`
--

-- --------------------------------------------------------

--
-- Table structure for table `ex5`
--

CREATE TABLE `ex5` (
  `ID` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex5`
--

INSERT INTO `ex5` (`ID`, `Title`, `Description`) VALUES
('AUTO', 'Automotive Parts and Supplies', 'Accessories for your car'),
('FISH', 'Seafood Stores and Restaurants', 'Place to get your fish'),
('HEALTH', 'Health and Beauty', 'Everything for the body'),
('SCHOOL', 'School and Colleges', 'Public and Private Learning'),
('SPORTS', 'Community Sports and Recreation', 'Guide to Parks Leagues');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ex5`
--
ALTER TABLE `ex5`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
