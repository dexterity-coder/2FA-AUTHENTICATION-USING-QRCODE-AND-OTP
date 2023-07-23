-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 12:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revenue`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('08089499891', '1234', 'admin'),
('08089499898', '08089499898', 'revoff'),
('08089499899', 'a', 'revoff');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `code`, `userid`, `status`, `date`) VALUES
(1, 'L4QZ-8A2X', '08089499898', '0', '2023-06-13'),
(2, '9IF5-K3RG', '08089499898', '1', '2023-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `rev_officer`
--

CREATE TABLE `rev_officer` (
  `revid` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ql` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rev_officer`
--

INSERT INTO `rev_officer` (`revid`, `fullname`, `email`, `phone`, `ql`) VALUES
('REV_OFF-2208240051', 'Jane Doe', 'janedoe@gmail.com', '08089499898', 'HND'),
('REV_OFF-2306134117', 'Ponjul Danjuma', 'josiahdanj@gmail.com', '08089499898', 'HND');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` varchar(40) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `agency` varchar(300) NOT NULL,
  `loc` varchar(300) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `revoff` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `fullname`, `phone`, `email`, `agency`, `loc`, `qty`, `price`, `date`, `status`, `revoff`) VALUES
('TRANS-2208245453', 'Tito', '080864763', 'tito@gmail.com', 'Tito Restaurants', 'High level roundabout,  close to togos supermarket', '360', '23000', '2020-09-08 00:00:00', 'status', 'janedoe@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rev_officer`
--
ALTER TABLE `rev_officer`
  ADD PRIMARY KEY (`revid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
