-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 02:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

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
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `savings_id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `savings_desc` varchar(100) NOT NULL,
  `current_amt` double NOT NULL DEFAULT '0',
  `target_amt` double NOT NULL,
  `target_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`savings_id`, `accounts_id`, `savings_desc`, `current_amt`, `target_amt`, `target_date`) VALUES
(2, 2, 'Tickets to HK', 1000, 13000, '2019-09-11'),
(7, 1, 'New Phone', 1000, 12000, '0000-00-00'),
(8, 1, 'Tickets to NY', 0, 50000, '0000-00-00'),
(9, 1, 'Laptop Repair', 1000, 2500, '2019-07-30');

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
(4, 2, 7, 1, 2019, 'Card', 'Allowance', '1 week baon', 'Income', 1000),
(5, 2, 7, 3, 2019, 'Card', 'Food', 'lunch', 'Expense', 150),
(6, 1, 7, 4, 2019, 'Cash', 'Petty cash', 'bigay ni tropa', 'Income', 100),
(7, 1, 7, 4, 2019, 'Cash', 'Health', 'medical', 'Expense', 901),
(8, 1, 7, 4, 2019, 'Cash', 'Allowance', 'baon', 'Income', 150),
(9, 1, 7, 4, 2019, 'Cash', 'Social Life', 'Pang DOTA', 'Expense', 20),
(11, 1, 6, 25, 2019, 'Cash', 'Allowance', 'Pa birthday for me', 'Income', 500),
(12, 1, 6, 25, 2019, 'Cash', 'Food', 'Inuman Preeeee', 'Expense', 500),
(14, 1, 6, 26, 2019, 'Cash', 'Health', 'Accident', 'Expense', 5000),
(19, 1, 7, 5, 2019, 'Cash', 'Allowance', '', 'Income', 1000);

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
  MODIFY `accounts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `savings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
