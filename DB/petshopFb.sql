-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2016 at 07:19 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `sn_registration`
--

CREATE TABLE `sn_registration` (
  `RG_id` int(11) NOT NULL,
  `RG_firstname` varchar(50) NOT NULL,
  `RG_lastname` varchar(50) NOT NULL,
  `RG_email` varchar(300) NOT NULL,
  `RG_password` varchar(500) NOT NULL,
  `RG_dob` date NOT NULL,
  `RG_gender` char(1) NOT NULL,
  `RG_address` text NOT NULL,
  `RG_image` varchar(100) NOT NULL,
  `RG_country` varchar(50) NOT NULL,
  `RG_zip` int(11) NOT NULL,
  `RG_mobile` int(11) NOT NULL,
  `RG_friend_list` text NOT NULL,
  `RG_tnc` char(1) NOT NULL DEFAULT 'N',
  `RG_mem_status` int(11) NOT NULL DEFAULT '0',
  `RG_regDate` date NOT NULL,
  `RG_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sn_registration`
--

INSERT INTO `sn_registration` (`RG_id`, `RG_firstname`, `RG_lastname`, `RG_email`, `RG_password`, `RG_dob`, `RG_gender`, `RG_address`, `RG_image`, `RG_country`, `RG_zip`, `RG_mobile`, `RG_friend_list`, `RG_tnc`, `RG_mem_status`, `RG_regDate`, `RG_status`) VALUES
(6, 'vivek', 'sonatakke', 'vivek@gmail.com', '7d077f716c9a40f5660456534922464f', '1990-08-23', 'm', '', '', '', 0, 0, '', 'Y', 1, '2016-03-20', 0),
(5, 'rakesh', 'Dhurve', 'raku146@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1988-06-14', 'm', '', '', '', 0, 0, '', 'Y', 1, '2016-03-20', 0),
(4, 'rakesh', 'Dhurve', 'rakesh.dhurve146@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1988-06-14', 'm', '', '', '', 0, 0, '', 'Y', 1, '2016-03-20', 0),
(7, 'ajay', 'd', 'ajya@gmail.com', 'ec2caa6577e2a730c1f3828ffb2cdb34', '1998-03-17', 'm', '', '', '', 0, 0, '', 'Y', 1, '2016-03-20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sn_registration`
--
ALTER TABLE `sn_registration`
  ADD PRIMARY KEY (`RG_id`),
  ADD UNIQUE KEY `RG_email` (`RG_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sn_registration`
--
ALTER TABLE `sn_registration`
  MODIFY `RG_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
