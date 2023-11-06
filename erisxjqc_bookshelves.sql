-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2023 at 12:52 PM
-- Server version: 10.5.20-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erisxjqc_bookshelves`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `vcUsername` varchar(100) NOT NULL,
  `vcHashed` varchar(60000) NOT NULL,
  `bIsArchived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`vcUsername`, `vcHashed`, `bIsArchived`) VALUES
('dev', '$2y$10$fwr/esz0k6dynVy16CmgUufYvGMJCQsD3YbsW4eMi.Wt3JRljzGnW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_info`
--

CREATE TABLE `auth_info` (
  `accessToken` varchar(500) NOT NULL,
  `tokenType` varchar(500) NOT NULL,
  `expiresAt` varchar(500) NOT NULL,
  `merchantID` varchar(500) NOT NULL,
  `refreshToken` varchar(500) NOT NULL,
  `shortLived` varchar(500) NOT NULL,
  `refreshTokenExpiresAt` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `vcRequestNumber` varchar(26) NOT NULL,
  `vcTitle` varchar(500) NOT NULL,
  `vcAuthor` varchar(500) NOT NULL,
  `vcISBN` varchar(100) NOT NULL,
  `vcEmail` varchar(150) NOT NULL,
  `dtDateRequested` date NOT NULL,
  `vcStatus` varchar(15) NOT NULL,
  `vcNotes` varchar(60000) DEFAULT NULL,
  `bIsArchived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`vcRequestNumber`, `vcTitle`, `vcAuthor`, `vcISBN`, `vcEmail`, `dtDateRequested`, `vcStatus`, `vcNotes`, `bIsArchived`) VALUES
('14685172622683198729955403', 'title', 'author', '', 'someEmail@example.com', '0000-00-00', 'Pending', NULL, 0),
('17091119102243854318747502', 'testingbook', 'test Test', '', 'testBook@example.com', '2023-09-05', 'Pending', NULL, 0),
('1k2kd9sjflekdnslaue38d2o03', 'Test Book', 'Test Author', '???????', '', '0000-00-00', 'Pending', 'this is a test book', 0),
('1k2kd9sjflekdnslaue38d2o30', 'Test Book', 'Test Author', '???????', '', '0000-00-00', 'Pending', 'this is a test book', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `vcReservationNumber` varchar(26) NOT NULL,
  `vcISBN` varchar(150) NOT NULL,
  `vcEmail` varchar(200) NOT NULL,
  `dtDateReserved` date NOT NULL,
  `vcStatus` varchar(50) NOT NULL,
  `vcNotes` varchar(60000) NOT NULL,
  `bIsArchived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`vcReservationNumber`, `vcISBN`, `vcEmail`, `dtDateReserved`, `vcStatus`, `vcNotes`, `bIsArchived`) VALUES
('234888282', '', '', '0000-00-00', 'Pending', 'N/A', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`vcUsername`);

--
-- Indexes for table `auth_info`
--
ALTER TABLE `auth_info`
  ADD PRIMARY KEY (`accessToken`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`vcRequestNumber`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`vcReservationNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
