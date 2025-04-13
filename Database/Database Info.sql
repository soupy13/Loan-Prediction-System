-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 07:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lps_eightsemproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactsupport`
--

CREATE TABLE `contactsupport` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `message` varchar(230) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactsupport`
--

INSERT INTO `contactsupport` (`id`, `name`, `email`, `contact`, `message`, `status`) VALUES
(1, 'JON POW', 'john@gmail.com', '102000', 'Good Application', 1),
(6, 'Mohan Pall', 'mohan@yahoo.con', '896855520', 'okhi', 1),
(10, 'DIV PAL', 'diam@ha.hd', '752222222222', 'pop', 1),
(11, 'Jon Doe', 'demo@mail.com', '123456789101', 'Good Website', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loanapplication`
--

CREATE TABLE `loanapplication` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `credit_score` int(11) NOT NULL,
  `loan_amount` decimal(15,2) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `monthly_income` decimal(15,2) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `previous_credit` tinyint(1) NOT NULL,
  `previous_credit_details` text DEFAULT NULL,
  `education` varchar(30) NOT NULL,
  `applicationdate` varchar(40) NOT NULL,
  `action` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loanapplication`
--

INSERT INTO `loanapplication` (`id`, `name`, `mobile`, `email`, `credit_score`, `loan_amount`, `occupation`, `monthly_income`, `address`, `date_of_birth`, `previous_credit`, `previous_credit_details`, `education`, `applicationdate`, `action`) VALUES
(1, 'Ramu Pal', '859076019', 'ramu@mail.com', 2, 15000.00, '0', 0.00, '0', '1980-02-01', 1, '0', '10', 'Fri Mar 28 2025 20:47:52 GMT+0530 (India', 1),
(2, 'Rihu', '10010100', 'Rihu1234', 2, 100000.00, '0', 0.00, '0', '7895-02-01', 1, '0', 'graduate', 'Fri Mar 28 2025 20:49:03 GMT+0530 (India', 2),
(3, 'Bikash ', '123456789', 'sbikash111@yahoo.com', 2, 15000.00, '0', 0.00, '0', '1980-02-01', 1, '0', '10', 'Fri Mar 28 2025 20:47:52 GMT+0530 (India', 0),
(4, 'Mrinal', '3500716019', 'mrinalroy111@yahoo.com', 2, 100000.00, '0', 0.00, '0', '1985-02-01', 0, '0', '10', 'Fri Mar 28 2025 21:15:20 GMT+0530 (India', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactsupport`
--
ALTER TABLE `contactsupport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanapplication`
--
ALTER TABLE `loanapplication`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactsupport`
--
ALTER TABLE `contactsupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loanapplication`
--
ALTER TABLE `loanapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
