-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 06:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `Bname` varchar(255) NOT NULL,
  `Sname` varchar(255) NOT NULL,
  `Pid` int(11) NOT NULL,
  `Bid` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`Bname`, `Sname`, `Pid`, `Bid`, `id`) VALUES
('buyer', 'seller', 4, '1000000', 3),
('buyer', 'seller', 4, '1001000', 5),
('buyer', 'seller', 4, '1002999', 6),
('buyer', 'seller', 4, '1003999', 7),
('buyer', 'seller', 4, '1005000', 8),
('buyer', 'seller', 4, '1006000', 9),
('buyer', 'seller', 5, '101000', 10),
('buyer', 'seller', 5, '102000', 11),
('viral', 'seller', 4, '1007000', 12),
('buyer', 'seller', 4, '1008000', 13),
('viral', 'seller', 5, '103000', 14),
('buyer', 'seller', 5, '104000', 15),
('viral', 'seller', 5, '105000', 16),
('viral', 'seller', 6, '101000', 17),
('buyer', 'seller', 4, '1009000', 18);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` varchar(255) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `file` varchar(255) NOT NULL,
  `sold_status` varchar(250) NOT NULL,
  `pid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `time`, `name`, `amount`, `description`, `file`, `sold_status`, `pid`, `sname`) VALUES
('2020-12-29 16:07:32', '2021-01-03t22:27:00', 'stormbreaker', '100000', 'Stormbreaker is an enchanted axe used by Thor. It was forged from Uru on Nidavellir, and can summon the Bifrost.', 'IMG-5feb54449fa6b2.82707545.jpg', 'Sold', 4, 'seller'),
('2020-12-29 18:49:40', '2021-01-03t13:32:00', 'soloblaster', '100000', 'movie item', 'IMG-5feb7a440c2fc9.68366675.jpg', 'Sold', 5, 'seller'),
('2020-12-29 19:02:45', '2021-01-03t19:30:00', 'Wado Ichimonji', '100000', 'anime item', 'IMG-5feb7d55e255e1.63350133.jpg', 'Sold', 6, 'seller'),
('2020-12-29 19:05:25', '2021-01-02t00:00:00', 'Stormbreaker', '100000', 'Movie item', 'IMG-5feb7df5db4f24.27384018.jpg', 'Not Sold', 7, 'seller'),
('2020-12-29 19:06:00', '2021-01-02t00:00:00', 'Wado Ichimonji', '100000', 'anime item', 'IMG-5feb7e18add8b6.85538257.jpg', 'Not Sold', 8, 'seller'),
('2020-12-30 12:06:24', '2021-01-02t00:00:00', 'Solo Blaster', '100000', 'movie item', 'IMG-5fec6d408ce530.42713655.jpg', 'Not Sold', 9, 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `Amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `bname`, `pid`, `Amount`) VALUES
(1, 'buyer', 4, '1009000'),
(3, 'viral', 5, '105000'),
(4, 'viral', 6, '101000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `gender`, `role`, `phone`, `address`) VALUES
('2020-11-18 06:24:11', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'male', 'admin', '1234567890', 'abcd'),
('2020-11-18 06:28:58', 'buyer@buyer.com', 'buyer', '794aad24cbd58461011ed9094b7fa212', 'male', 'buyer', '2345678901', 'ztoa'),
('2020-11-18 06:28:58', 'seller@seller.com', 'seller', '64c9ac2bb5fe46c3ac32844bb97be6bc', 'male', 'seller', '1234567890', 'atoz'),
('2020-12-23 19:25:09', 'viral.d.aghara@gmail.com', 'viral', 'e10adc3949ba59abbe56e057f20f883e', 'male', 'buyer', '9408924324', 'A803 Purva Heights, Bannerghatta Road, Bilekahalli, Bengaluru, Karnataka 560076');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
