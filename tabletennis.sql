-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 06:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabletennis`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(255) NOT NULL,
  `teamA` varchar(255) NOT NULL,
  `teamB` varchar(255) NOT NULL,
  `resultA` int(255) NOT NULL,
  `resultB` int(11) NOT NULL,
  `winner` varchar(255) NOT NULL,
  `loser` varchar(255) NOT NULL,
  `tournamentID` int(255) NOT NULL,
  `tournamentName` varchar(255) NOT NULL,
  `tournamentYear` int(4) NOT NULL,
  `tournamentMonth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `teamA`, `teamB`, `resultA`, `resultB`, `winner`, `loser`, `tournamentID`, `tournamentName`, `tournamentYear`, `tournamentMonth`) VALUES
(2, 'CHEN Qing (CHINA)', 'PENG Jia Ping (MALAYSIA)', 1, 2, 'CHEN Qing (CHINA)', 'PENG Jia Ping (MALAYSIA)', 1003574, '2019 - ITTF Junior Circuit Golden Thailand Junior and Cadet Open, Bangkok (THA)', 2019, 'January');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthyear` int(4) NOT NULL,
  `active` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `matches` int(4) NOT NULL,
  `wins` int(25) NOT NULL,
  `losses` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `country`, `gender`, `birthyear`, `active`, `age`, `matches`, `wins`, `losses`) VALUES
(35, 'JIANG Jialiang', 'CHINA', 'Male', 1964, 'Inactive', 56, 21, 19, 2),
(100579, 'ANG Guat Huoy', 'MALAYSIA', 'Female', 1980, 'Active', 40, 0, 0, 0),
(101562, 'CHAI Kian Beng', 'MALAYSIA', 'Male', 1988, 'Active', 32, 77, 32, 45),
(101669, 'CHEN Qing', 'CHINA', 'Female', 1984, 'Active', 36, 74, 59, 15),
(102265, 'DING Ning', 'CHINA', 'Female', 1990, 'Active', 30, 789, 673, 116),
(103708, 'HOU Xiaoxu', 'CHINA', 'Female', 1989, 'Active', 30, 0, 0, 0),
(104526, 'KHOR Kok Seong', 'MALAYSIA', 'Male', 1968, 'Active', 52, 0, 0, 0),
(104799, 'KONG Linghui', 'CHINA', 'Male', 1975, 'Inactive', 44, 187, 150, 37),
(106659, 'NG Sock Khim', 'MALAYSIA', 'Female', 1984, 'Active', 36, 228, 114, 114),
(107253, 'PENG Jia Ping', 'MALAYSIA', 'Male', 1986, 'Active', 34, 5, 2, 3),
(107254, 'PENG Luyang', 'CHINA', 'Female', 1985, 'Active', 35, 116, 87, 29),
(107395, 'PHUA Bee Sim', 'MALAYSIA', 'Female', 1972, 'Active', 48, 0, 0, 0),
(108863, 'SONG Shichao', 'CHINA', 'Male', 1991, 'Active', 28, 2, 1, 1),
(109224, 'TAN Chee Seng', 'MALAYSIA', 'Male', 1983, 'Inactive', 37, 0, 0, 0),
(109412, 'TIAN Fang', 'CHINA', 'Female', 1980, 'Inactive', 40, 0, 0, 0),
(109491, 'TOO Ning Ying', 'MALAYSIA', 'Female', 1988, 'Active', 31, 4, 0, 4),
(109993, 'WANG Xuan', 'CHINA', 'Female', 1989, 'Active', 31, 70, 55, 15),
(110262, 'XU Ke', 'CHINA', 'Male', 1992, 'Active', 28, 36, 34, 2),
(114104, 'CHEE Kien Ee', 'MALAYSIA', 'Male', 1994, 'Active', 26, 6, 3, 3),
(117050, 'WONG Amanda', 'MALAYSIA', 'Female', 1999, 'Active', 21, 62, 17, 45),
(117053, 'HAIKAL Rahman', 'MALAYSIA', 'Male', 1988, 'Active', 32, 114, 70, 44);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) NOT NULL,
  `country` varchar(25) NOT NULL,
  `wins` int(10) NOT NULL,
  `losses` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `year`, `month`) VALUES
(1003574, '2019 - ITTF Junior Circuit Golden Thailand Junior and Cadet Open, Bangkok (THA)', 2019, 'January');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `isAdmin`) VALUES
(1, 'bkhaled', '$2y$10$587MBkSTQG0bM4vrKHQ02u15Mud2vfJiO8Km3r/4UnN6d7tILKmo.', 'Belal Khaled', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117054;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003575;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
