-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 01:57 PM
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
  `accounts_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accounts_id`, `username`, `password`) VALUES
(1, 'bryan', 'aaa'),
(2, 'kiel', 'bbb');

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
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `accounts_id`, `month`, `day`, `year`, `account`, `category`, `contents`, `transaction_type`, `amount`) VALUES
(1, 1, 7, 3, 2019, 'Cash', 'Food', 'lunch', 'Expense', 50),
(2, 1, 7, 3, 2019, 'Cash', 'Food', 'dinner', 'Expense', 50),
(4, 2, 7, 1, 2019, 'Card', 'Allowance', '1 week baon', 'Income', 1000),
(5, 2, 7, 3, 2019, 'Card', 'Food', 'lunch', 'Expense', 150),
(6, 1, 7, 4, 2019, 'Cash', 'Petty cash', 'bigay ni tropa', 'Income', 100),
(7, 1, 7, 4, 2019, 'Cash', 'Health', 'medical', 'Expense', 901),
(8, 1, 7, 4, 2019, 'Cash', 'Allowance', 'baon', 'Income', 150),
(9, 1, 7, 4, 2019, 'Cash', 'Social Life', 'Pang DOTA', 'Expense', 20),
(11, 1, 6, 25, 2019, 'Cash', 'Allowance', 'Pa birthday for me', 'Income', 500),
(12, 1, 6, 25, 2019, 'Cash', 'Food', 'Inuman Preeeee', 'Expense', 500),
(14, 1, 6, 26, 2019, 'Cash', 'Health', 'Accident', 'Expense', 5000),
(18, 1, 7, 2, 2019, 'Accounts', 'Food', 'chocolate', 'Expense', 150);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `accounts_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `account_from` text NOT NULL,
  `account_to` text NOT NULL,
  `contents` varchar(100) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`accounts_id`, `month`, `day`, `year`, `account_from`, `account_to`, `contents`, `amount`) VALUES
(1, 7, 4, 2019, 'Cash', 'Accounts', 'deposit', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accounts_id`);

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
  MODIFY `accounts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
