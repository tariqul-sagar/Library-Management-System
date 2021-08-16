-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 08:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `b_cat` int(11) NOT NULL,
  `w_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `b_name`, `b_id`, `b_cat`, `w_name`) VALUES
(1, 'Data Communications and Networking', 10001, 1, 'Forouzan'),
(2, 'Introduction To ALGORITHMS', 10002, 1, 'Cormen, Leiserson, Rivest, Stein'),
(3, 'Telecommunication Switching, Traffic And Networks', 30001, 3, 'J.E.Flood'),
(6, 'Electrical Machines', 20001, 2, 'SK Bhattacharya'),
(8, 'Demo book name', 11111, 4, 'Demo author');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`) VALUES
(1, 'CSE', 'Computer Science and Engineering', 1),
(10, 'EEE', 'Electronics and Electrical Engineering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `bid` int(11) NOT NULL,
  `a_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`id`, `uname`, `bid`, `a_status`) VALUES
(11, 'tisagar', 20001, 1),
(12, 'cks', 30001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `stid` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avater` text DEFAULT NULL,
  `joindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `stid`, `role`, `gender`, `address`, `phone`, `avater`, `joindate`) VALUES
(1, 'Tariqul Islam Sagar', 'tariqul15-11071@diu.edu.bd', 'tisagar', '7c4a8d09ca3762af61e59520943dc26494f8941b', '181-15-11071', 0, 1, 'Dhanmondi, Dhaka', '+880123456789', 'sagar.jpg', '2021-07-18'),
(2, 'Chandan Kumar', 'chandan15-11013@diu.edu.bd', 'cks', '7c4a8d09ca3762af61e59520943dc26494f8941b', '181-15-11013', 1, 1, 'Shobhanbugh, Dhaka', '78965412', '3049default-male.png', '2021-07-18'),
(3, 'Test Passed!', 'testpassed@diu.edu.bd', 'passed', '7c4a8d09ca3762af61e59520943dc26494f8941b', '181-10-11111', 2, 1, 'Bangladesh', '0000000', '', '2021-07-26'),
(29, 'Nadimul Islam', 'nadimul15-10612@gmail.com', 'nadim', '7c4a8d09ca3762af61e59520943dc26494f8941b', '181-15-10612', 1, 1, 'Faridpur', '123456789', '1814nadim.jpg', '2021-08-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
