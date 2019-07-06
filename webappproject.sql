-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 12:35 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webappproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pword` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vcode` varchar(30) NOT NULL,
  `is_verify` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `uname`, `pword`, `fname`, `lname`, `email`, `vcode`, `is_verify`, `status`) VALUES
(5, 'sample1', '123', 'Bryan', 'Edejer', 'bryan.joshua.edejer@gmail.com', '1188616295d1fcd8c920a8', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `savings_id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `savings_desc` varchar(100) NOT NULL,
  `current_amt` double NOT NULL DEFAULT 0,
  `target_amt` double NOT NULL,
  `target_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`savings_id`, `accounts_id`, `savings_desc`, `current_amt`, `target_amt`, `target_date`) VALUES
(11, 5, 'Laptop', 20000, 50000, '2019-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `account` text NOT NULL,
  `category` text NOT NULL,
  `contents` varchar(100) NOT NULL,
  `transaction_type` text NOT NULL,
  `amount` double NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `accounts_id`, `month`, `day`, `year`, `account`, `category`, `contents`, `transaction_type`, `amount`, `image`) VALUES
(52, 5, 7, 6, 2019, 'Cash', 'Allowance', 'Baon', 'Income', 150, ''),
(53, 5, 7, 6, 2019, 'Cash', 'Food', 'Lunch', 'Expense', 50, ''),
(54, 5, 7, 6, 2019, 'Cash', 'Health', 'Medicine', 'Expense', 20, ''),
(55, 5, 7, 6, 2019, 'Cash', 'Social Life', 'Outing with friends', 'Expense', 50, ''),
(56, 5, 7, 6, 2019, 'Cash', 'Food', 'Apple', 'Expense', 10, '1562365526_apple.jpg'),
(57, 5, 6, 1, 2019, 'Cash', 'Other', 'School needs', 'Income', 2000, ''),
(59, 5, 6, 30, 2019, 'Cash', 'Education', 'Paid Tuition', 'Expense', 1000, ''),
(60, 5, 6, 1, 2019, 'Cash', 'Apparel', 'Uniform', 'Expense', 750, '');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`savings_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `savings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;