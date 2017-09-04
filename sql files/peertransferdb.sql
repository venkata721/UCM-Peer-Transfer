-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2016 at 06:06 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peertransferdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_login`
--

CREATE TABLE `member_login` (
  `membusername` varchar(50) NOT NULL,
  `membpassword` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_login`
--

INSERT INTO `member_login` (`membusername`, `membpassword`) VALUES
('masthan@gmail.com', 'masthan');

-- --------------------------------------------------------

--
-- Table structure for table `member_register`
--

CREATE TABLE `member_register` (
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `SECQUE1` varchar(255) NOT NULL,
  `SECQUE2` varchar(255) NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `PHONENO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_register`
--

INSERT INTO `member_register` (`EMAIL`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `SECQUE1`, `SECQUE2`, `USERNAME`, `PHONENO`) VALUES
('masthan@gmail.com', 'masthan', 'Masthan', 'Syed', '7524 Lucille St Apt 1\nOverland', 'masthan', 'masthan', 'masthan@gmail.com', '9132916199');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transfer`
--

CREATE TABLE `payment_transfer` (
  `PAYMENTPURPOSE` varchar(50) NOT NULL,
  `PAYMENTAMOUNT` varchar(50) NOT NULL,
  `CONTACTNAME` varchar(30) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `CONTACTPHONE` varchar(30) NOT NULL,
  `CONTACTADDRESS` varchar(255) NOT NULL,
  `CONTACTEMAIL` varchar(30) NOT NULL,
  `PAYMENTSTATUS` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_transfer`
--

INSERT INTO `payment_transfer` (`PAYMENTPURPOSE`, `PAYMENTAMOUNT`, `CONTACTNAME`, `USERNAME`, `CONTACTPHONE`, `CONTACTADDRESS`, `CONTACTEMAIL`, `PAYMENTSTATUS`) VALUES
('Education', '100', 'Masthan', 'masthan@gmail.com', '9132916199', '11121W 75th St apt 121 Shawnee KS 66214', 'mksd@gmail.com', 'PENDING'),
('Living Expenses', '10000', 'Anvesh', 'masthan@gmail.com', '9132916211', '1121W 75th Ter, Apt21\nOverland Park KS 66214', 'anvesh@gmail.com', 'PENDING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_login`
--
ALTER TABLE `member_login`
  ADD PRIMARY KEY (`membusername`);

--
-- Indexes for table `member_register`
--
ALTER TABLE `member_register`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
