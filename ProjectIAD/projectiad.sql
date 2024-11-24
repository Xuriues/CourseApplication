-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2020 at 02:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectiad`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationtbl`
--

CREATE TABLE `applicationtbl` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` text NOT NULL,
  `course` varchar(50) NOT NULL,
  `reason` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `applied_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicationtbl`
--

INSERT INTO `applicationtbl` (`id`, `name`, `email`, `phone`, `gender`, `course`, `reason`, `user_id`, `applied_date`) VALUES
(9, 'shaun', 'shaunisawesome1139@gmail.com', 12345678, 'Male', 'AdobePhotoshop', 'Because I want to learn', 12, '2020-03-02 13:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `coursetbl`
--

CREATE TABLE `coursetbl` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL,
  `availseat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursetbl`
--

INSERT INTO `coursetbl` (`id`, `course`, `price`, `description`, `duration`, `availseat`) VALUES
(1, 'AdobePhotoshop', '499.99', 'Adobe Photoshop is an extremely powerful application that\'s used by many professional photographers and designers. You can use Photoshop for almost any kind of image editing, such as touching up photos, creating high-quality graphics, and much, much more.', 3, 9),
(2, 'Creating website with HTML5', '399.99', 'HTML5 is a markup language used for structuring and presenting content on the World Wide Web. It is the fifth and current major version of the HTML standard.', 2, 2),
(3, 'Adobe InDesign', '299.99', 'Adobe InDesign is a desktop publishing software application produced by Adobe Systems. It can be used to create works such as posters, flyers, brochures, magazines, newspaper, presentations, books and eBooks.', 3, 3),
(4, 'Swift Programming', '699.99', 'Swift is a powerful and intuitive programming language for macOS, iOS, watchOS and rvOS. Writing Swift code is interactive and fun, the syntax is concise yet expressive, and Swift includes modern features developers love.', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `logintbl`
--

CREATE TABLE `logintbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logintbl`
--

INSERT INTO `logintbl` (`id`, `username`, `password`, `role`) VALUES
(8, 'Test1', 'Password', 0),
(9, 'admin', 'admin', 1),
(10, 'user', 'user', 0),
(11, 'test', 'test', 0),
(12, 'shaun', 'shaun', 0);

-- --------------------------------------------------------

--
-- Table structure for table `regtbl`
--

CREATE TABLE `regtbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `dateregistered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regtbl`
--

INSERT INTO `regtbl` (`id`, `user_id`, `name`, `course`, `contact`, `dateregistered`, `email`) VALUES
(3, 10, 'User', 'Creating website with HTML5', 11111111, '2020-02-22 08:57:20', 'user@gmail.com'),
(4, 8, 'Test', 'Swift Programming', 12345678, '2020-02-18 05:20:43', 'Test1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `login_id`, `fullname`, `email`, `phone`, `gender`) VALUES
(8, 8, 'Test', 'Test1@gmail.com', 12345678, 'Male'),
(9, 9, 'admin', 'admin@gmail.com', 84819580, 'Male'),
(10, 10, 'User', 'user@gmail.com', 11111111, 'Male'),
(11, 11, 'test', 'test@gmail.com', 123678, 'Male'),
(12, 12, 'shaun', 'shaunisawesome1139@gmail.com', 12345678, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationtbl`
--
ALTER TABLE `applicationtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursetbl`
--
ALTER TABLE `coursetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintbl`
--
ALTER TABLE `logintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regtbl`
--
ALTER TABLE `regtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationtbl`
--
ALTER TABLE `applicationtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coursetbl`
--
ALTER TABLE `coursetbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logintbl`
--
ALTER TABLE `logintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `regtbl`
--
ALTER TABLE `regtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
