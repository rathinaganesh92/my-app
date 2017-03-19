-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 12:36 PM
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
-- Table structure for table `othershops`
--

CREATE TABLE `othershops` (
  `id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `othershops`
--

INSERT INTO `othershops` (`id`, `medicine_id`, `name`, `address`) VALUES
(1, 1, 'Vijaya Medical', 'No. 11/30 & 352, Villianur Main Rd · 0413 220 5902'),
(2, 14, 'Shree Ganapathy Medicals', '132, Perumal Koil St, Heritage Town, Puducherry, 605001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `othershops`
--
ALTER TABLE `othershops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_address` (`medicine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `othershops`
--
ALTER TABLE `othershops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `othershops`
--
ALTER TABLE `othershops`
  ADD CONSTRAINT `medicine_address` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
