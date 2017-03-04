-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 02:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Amount` double NOT NULL,
  `taxamount` double NOT NULL,
  `nettotal` double NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billno`, `name`, `Date`, `Amount`, `taxamount`, `nettotal`, `Address`) VALUES
(8, 'Rathina Ganesh', '2017-02-28', 65, 9.1, 74.1, 'Natesan Nagar, Pondicherry 5'),
(9, 'Dhivya', '2017-02-26', 10, 1.4, 11.4, 'Othavadai Streed, Pondicherry - 5'),
(10, 'Jaya', '2017-02-28', 40, 5.6, 45.6, 'Villupuram'),
(11, 'Priya', '2017-02-28', 100, 14, 114, 'Villupuram'),
(12, 'Preethi', '2017-02-28', 100, 14, 114, 'Villupuram'),
(13, 'Preethi', '2017-02-28', 140, 19.6, 159.6, 'Villupuram'),
(14, 'Gopal', '2017-02-27', 1208, 169.12, 1377.12, 'Cuddalore'),
(15, 'Gopal', '2017-02-27', 1208, 169.12, 1377.12, 'Cuddalore'),
(16, 'Maya', '2017-02-28', 40, 5.6, 45.6, 'Panruti');

-- --------------------------------------------------------

--
-- Table structure for table `bill_medicine`
--

CREATE TABLE `bill_medicine` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_medicine`
--

INSERT INTO `bill_medicine` (`id`, `bill_id`, `item`, `price`, `quantity`, `amount`) VALUES
(1, 8, 'cold', 20, 2, 40),
(2, 8, 'amoxicillin', 25, 1, 25),
(3, 9, 'cold', 10, 1, 10),
(4, 10, 'Cold act', 20, 2, 40),
(5, 11, 'METOCLOPRAMIDE HCL', 50, 2, 100),
(6, 12, 'METOCLOPRAMIDE HCL', 50, 2, 100),
(7, 13, 'METOCLOPRAMIDE HCL', 50, 2, 100),
(8, 13, 'Cold act', 20, 2, 40),
(9, 14, 'Cold act', 20, 2, 40),
(10, 14, 'METOCLOPRAMIDE HCL', 50, 2, 100),
(11, 14, '34', 534, 2, 1068),
(12, 15, 'Cold act', 20, 2, 40),
(13, 15, 'METOCLOPRAMIDE HCL', 50, 2, 100),
(14, 15, '34', 534, 2, 1068),
(15, 16, 'Cold act', 20, 2, 40);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `expiry_date` date NOT NULL,
  `amount` double NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `manufacturer` varchar(200) NOT NULL,
  `packing` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `description`, `status`, `expiry_date`, `amount`, `category`, `quantity`, `manufacturer`, `packing`) VALUES
(1, 'Cold act', 'description', 'Available', '2017-02-24', 20, 'Medicine', 19, 'Mumbai Manufa..', '1S'),
(14, 'METOCLOPRAMIDE HCL', 'CLOPAMON 5MG/5ML SYR', 'Available', '2018-02-07', 50, 'Tablet', 21, 'Bini Laboratories Pvt Ltd', '1S'),
(16, 'test', 'test', 'Available', '2017-02-27', 534, 'test', 534, 'tes', 'tet'),
(17, 'rte', 'res', 'Available', '2017-02-22', 54, 'fsda', 543, 'sf', '5'),
(18, '34', '354', 'Available', '2017-02-22', 534, '543', 4, '5', '54'),
(19, '534', '543', 'Available', '2017-03-02', 34, '34', 2, '43', '43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`) VALUES
(3, 'Rathina Ganesh', 'ganesh', 'fa1d87bc7f85769ea9dee2e4957321ae', 'rathinaganesh1992@gmail.com'),
(5, 'devisri', 'devi', 'f5c2db1f19bdde37e740e86b70d0534f', 'devisri4895@gmail.com'),
(6, 'priya', 'priya', '0b1c8bc395a9588a79cd3c191c22a6b4', 'priyaram18@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billno`);

--
-- Indexes for table `bill_medicine`
--
ALTER TABLE `bill_medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_medicine` (`bill_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
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
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bill_medicine`
--
ALTER TABLE `bill_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_medicine`
--
ALTER TABLE `bill_medicine`
  ADD CONSTRAINT `bill_medicine` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`billno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
