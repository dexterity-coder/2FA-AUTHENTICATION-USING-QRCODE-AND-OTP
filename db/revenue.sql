-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 10:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('admin@admin.com', '1234', 'admin'),
('janedoe@gmail.com', 'janedoe@gmail.com', 'revoff');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rev_officer`
--

INSERT INTO `rev_officer` (`revid`, `fullname`, `email`, `phone`, `ql`) VALUES
('REV_OFF-2208240051', 'Jane Doe', 'janedoe@gmail.com', '08089499898', 'HND');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `rev_officer`
--
ALTER TABLE `rev_officer`
  ADD PRIMARY KEY (`revid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
