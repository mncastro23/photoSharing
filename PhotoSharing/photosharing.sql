-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 09:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photosharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tupload`
--

CREATE TABLE `tupload` (
  `imgId` int(11) NOT NULL,
  `imgCap` varchar(100) NOT NULL,
  `imgCrtBy` varchar(10) NOT NULL,
  `imgCrtDt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imgPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tupload`
--

INSERT INTO `tupload` (`imgId`, `imgCap`, `imgCrtBy`, `imgCrtDt`, `imgPath`) VALUES
(2, 'sample image 2', '11', '2022-01-16 19:15:34', '199bc292ad0118415629f4625f2683ef1642348882.jpg'),
(3, 'sample image 4', '7', '2022-01-16 16:12:33', '6c5f2c8d6189d8832b61e26a5bb9a89f1642349553.jpg'),
(4, 'sample image 6', '7', '2022-01-16 18:57:42', 'adc0ddb14a73f62baf538725d01caea51642359462.jpg'),
(5, 'groot and thor', '20', '2022-01-16 19:53:01', '199bc292ad0118415629f4625f2683ef1642362781.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `crtdt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `crtdt`) VALUES
(3, 'mario', 'castro', 'emcee0423@gmail.com', '123', '2022-01-15 06:43:28'),
(4, 'sdsd', 'sdsd', 'a@dmasd.com', '6a365c4399163c82927d2dc934bb2bb64d9892a4', '2022-01-15 07:19:09'),
(7, 'mario', 'castro', 'thirdy.mc@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-01-15 09:09:05'),
(11, 'michelle', 'castro', 'mc@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-01-15 10:35:33'),
(17, 'mario', 'castro', '123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-01-15 10:42:00'),
(20, 'sdsd', 'sdsd', '1234@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-01-16 12:51:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tupload`
--
ALTER TABLE `tupload`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tupload`
--
ALTER TABLE `tupload`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
