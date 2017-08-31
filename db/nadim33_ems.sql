-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2016 at 02:00 AM
-- Server version: 5.5.48-37.8
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nadim33_ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `type`, `status`) VALUES
(1, 'ALLERGY', 0),
(2, 'ANTIBIOTICS', 0),
(3, 'ASTHMA', 0),
(4, 'CANCER', 0),
(5, 'CARDIAC', 1),
(6, 'CENTRAL NERVOUS SYSTEM', 0),
(7, 'CHOLESTEROL', 0),
(8, 'COUGH ', 0),
(9, 'FLU', 0),
(10, 'DIABETICS', 0),
(11, 'EYECARE', 0),
(12, 'SKIN & HAIR', 0),
(13, 'VITAMINS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `m_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `type` int(11) NOT NULL,
  `mg` text NOT NULL,
  `descr` text NOT NULL,
  `price` text NOT NULL,
  `image` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `formula` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `name`, `c_id`, `issue_date`, `exp_date`, `type`, `mg`, `descr`, `price`, `image`, `datetime`, `status`, `formula`) VALUES
(5, 'SOFTIN ', 1, '2016-01-01', '2016-12-23', 2, '10', ' Softin medicine ', '62', 'uploaded_files/softin.jpg', '2016-05-09 00:00:00', 0, ''),
(6, 'DIFLUCAN ', 2, '2015-11-05', '2016-11-25', 2, '50', ' ', '120', 'uploaded_files/Diflucancap-Capsule50.jpg', '2016-05-03 00:00:00', 0, ''),
(7, 'ATEM NEB', 3, '2015-06-03', '2017-06-14', 4, '', ' ', '60', 'uploaded_files/Atemnebulizer-Nebulizer0025.jpg', '2016-05-10 00:00:00', 0, ''),
(8, 'ARIMIDEX ', 4, '2015-12-03', '2017-02-23', 2, '1', ' ', '238', 'uploaded_files/arimidex-1mg.jpg', '2016-05-09 00:00:00', 0, ''),
(9, 'ANGISED ', 5, '2015-11-04', '2016-12-16', 2, '0.5', ' ', '0.80', 'uploaded_files/Angised-Tablet05.jpg', '2016-05-16 00:00:00', 0, ''),
(10, 'SEROXAT ', 6, '2015-07-29', '2016-12-22', 2, '20', ' ', '43.34', 'uploaded_files/Seroxattab-Tablet20.jpg', '2016-05-25 00:00:00', 0, ''),
(11, 'LIPIGET ', 7, '2015-02-10', '2017-06-22', 2, '10', ' ', '16.40', 'uploaded_files/Lipiget-Tablet10.jpg', '2016-05-05 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `address` text NOT NULL,
  `town` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  `phone` text NOT NULL,
  `reor` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `u_id`, `date`, `status`, `address`, `town`, `state`, `zip`, `phone`, `reor`) VALUES
(6, 1, '2016-05-10 13:05:59', 1, 'House # 123 ', 'Rawalpindi', 'Punjab', '46000', '03435551441', 0),
(7, 1, '2016-05-07 18:33:38', 1, 'House # 123 ', 'Rawalpindi', 'Punjab', '46000', '03435551441', 0),
(8, 1, '2016-05-09 06:41:06', 1, 'House # 123 ', 'Rawalpindi', 'Punjab', '46000', '03435551441', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `s_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`s_id`, `name`, `location`, `status`) VALUES
(1, 'Shaheen Chemist', 'Sadar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL,
  `m_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `o_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `m_id`, `price`, `quantity`, `u_id`, `status`, `datetime`, `o_id`) VALUES
(11, 10, 86.68, 2, 1, 1, '2016-05-09 06:41:06', 8),
(10, 9, 1.60, 2, 1, 1, '2016-05-07 18:33:38', 7),
(9, 10, 86.68, 2, 1, 1, '2016-05-07 16:26:19', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `firstname`, `lastname`, `email`, `password`, `status`) VALUES
(1, '', '', 'waleed_iiui@yahoo.com', '123', 0),
(3, '', '', 'ahmedwaleeed17@yahoo.com', '123', 0),
(4, '', '', 'ahmedwaleeedss17@yahoo.com', '123', 0),
(5, '', '', 'ahmedwaleeessd17@yahoo.com', '123', 0),
(6, '', '', 'admin@ems.com', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
