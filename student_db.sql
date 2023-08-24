-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 02:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signup_details`
--

CREATE TABLE `signup_details` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `conf_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `signup_details`
--

INSERT INTO `signup_details` (`id`, `fname`, `lname`, `email`, `password`, `conf_pass`) VALUES
(140, 'John', 'myke', 'john@gmail.com', 'John@123', 'John@123'),
(141, 'Nancy', 'Deycold', 'nancy@gmail.com', 'Nancy@123', 'Nancy@123'),
(142, '', '', 'nancy@gmail.com', 'Nancy@123', ''),
(143, '', '', 'john@gmail.com', 'John@123', ''),
(144, '', '', 'john@gmail.com', 'John@123', ''),
(145, 'Tom', 'Hardy', 'tom@gmail.com', 'Tom@123', 'Tom@123'),
(146, 'Steev', 'Roger', 'steev@gmail.com', 'Steev@123', 'Steev@123'),
(147, '', '', 'steev@gmail.com', 'Steev@123', ''),
(148, '', '', 'steev@gmail.com', 'steev@123', ''),
(149, '', '', 'steev@gmail.com', 'Steev@123', ''),
(150, '', '', 'steev@gmail.com', 'Steev@123', ''),
(151, '', '', 'steev@gmail.com', 'Steev@123', ''),
(152, '', '', 'steev@gmail.com', 'Steev@123', ''),
(153, '', '', 'tom@gmail.com', 'Tom@123', ''),
(154, '', '', 'steev@gmail.com', 'Steev@123', ''),
(155, '', '', 'steev@gmail.com', 'Steev@123', ''),
(156, 'name', 'l name', 'mail@gmail.com', 'pass@1213A', 'pass123@'),
(157, '', '', 'steev@gmail.com', 'Steev@123', ''),
(158, '', '', 'steev@gmail.com', 'Steev@123', ''),
(159, '', '', 'steev@gmail.com', 'Steev@123', ''),
(160, '', '', 'tom@gmail.com', 'Tom@123', ''),
(161, '', '', 'steev@gmail.com', 'Steev@123', ''),
(162, '', '', 'tom@gmail.com', 'Tom@123', '');

-- --------------------------------------------------------

--
-- Table structure for table `std_details`
--

CREATE TABLE `std_details` (
  `sno` int(3) NOT NULL,
  `name` text NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `email` varchar(22) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `other` text NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp(),
  `idpic` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `std_details`
--

INSERT INTO `std_details` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`, `idpic`) VALUES
(234, 'John', '26', 'Male', 'john@gmail.com', '9121223322', 'Testing.', '2023-08-14', ''),
(235, 'Steev', '28', 'Male', 'Steev@gmail.com', '9188676744', 'Insertion data.', '2023-08-14', ''),
(236, 'Nancy', '29', 'Female', 'nancy@gmail.com', '9122333433', 'Recorded.', '2023-08-14', ''),
(238, 'Tom Hardy', '51', 'Male', 'tom@gmail.com', '4411223344', 'Name is Tom Hardy.', '2023-08-14', ''),
(241, 'Roger', '52', 'Male', 'roger@gmail.com', '9122993303', 'Description.\r\n', '2023-08-14', ''),
(243, 'Tony', '56', 'Male', 'tony@gmail.com', '9111223344', 'Stark industries.\r\n', '2023-08-14', ''),
(253, 'Rambo', '29', 'male', 'ram@gmail.com', '9122334545', 'info\r\n', '2023-08-23', NULL),
(254, 'sandy', '36', 'Male', 'san@gmail.com', '9122334554', 'sandy.', '2023-08-23', NULL),
(255, 'Monty', '29', 'Male', 'mon@gmail.com', '2345457567', 'monty.', '2023-08-23', NULL),
(257, 'aa', '23', 'male', 'a@gmail.com', '2678134698', 'info', '2023-08-23', NULL),
(258, 'kumari', '22', 'Female', 'ak8194128@gmail.com', '9188223773', 'info.', '2023-08-23', NULL),
(259, 'Name', 'age', 'gen', 'em@email', '1246778869', 'info\r\n', '2023-08-23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_details`
--
ALTER TABLE `signup_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_details`
--
ALTER TABLE `std_details`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup_details`
--
ALTER TABLE `signup_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `std_details`
--
ALTER TABLE `std_details`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
