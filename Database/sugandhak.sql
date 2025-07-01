-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 04:19 PM
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
-- Database: `sugandhak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `a_email` varchar(50) DEFAULT NULL,
  `a_pwd` varchar(30) DEFAULT NULL,
  `a_time` varchar(100) DEFAULT NULL,
  `a_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_email`, `a_pwd`, `a_time`, `a_status`) VALUES
(1, 'meet@gmail.com', '262006', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_nm` varchar(100) DEFAULT NULL,
  `cat_img` longtext DEFAULT NULL,
  `cat_time` varchar(60) NOT NULL,
  `cat_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_nm`, `cat_img`, `cat_time`, `cat_status`) VALUES
(1, 'For Men', '1749386356_p1.jpeg', '1749386356', 1),
(2, 'For Women', '1749386377_p2.png', '1749386377', 1),
(3, 'For Unisex', '1749386432_p3.jpeg', '1749386432', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `co_id` int(10) NOT NULL,
  `co_fnm` varchar(255) DEFAULT NULL,
  `co_email` varchar(100) DEFAULT NULL,
  `co_msg` longtext DEFAULT NULL,
  `co_time` varchar(100) DEFAULT NULL,
  `co_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`co_id`, `co_fnm`, `co_email`, `co_msg`, `co_time`, `co_status`) VALUES
(1, 'vishal kumar', 'vishal@gmail.com', 'thank you', '1748085157', 0),
(2, 'hanshrajbhai', 'hanshraj@gmail.com', 'hello how are you', '1748085232', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(4) NOT NULL,
  `p_cat` varchar(4) DEFAULT NULL,
  `p_nm` varchar(255) DEFAULT NULL,
  `p_price` bigint(20) DEFAULT NULL,
  `p_img` longtext DEFAULT NULL,
  `p_short_desc` longtext DEFAULT NULL,
  `p_weight` varchar(255) DEFAULT NULL,
  `p_description` longtext DEFAULT NULL,
  `p_add_info` longtext DEFAULT NULL,
  `p_time` varchar(100) DEFAULT NULL,
  `p_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_cat`, `p_nm`, `p_price`, `p_img`, `p_short_desc`, `p_weight`, `p_description`, `p_add_info`, `p_time`, `p_status`) VALUES
(1, '1', 'Men perfume', 599, '1749386572_p1.jpeg', 'men perfume', '150 ml', 'This perfume are for men', 'men perfume', '1749386572', 1),
(2, '2', 'Women perfume', 499, '1749386621_p2.png', 'Women perfume', '100 ml', 'This perfume are made for women', 'women perfume', '1749386621', 1),
(3, '3', 'Unisex perfume', 699, '1749386681_p3.jpeg', 'unsex perfume', '90 ml', 'unisex perfume', 'unisex perfume', '1749386681', 1),
(4, '1', ' wood type perfume', 499, '1749654245_p1.jpg', 'Wood partical perfume', '100 ml', 'This perfume are made using wood particals', 'Men wood perfume ', '1749654245', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL,
  `u_fnm` varchar(255) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_mno` int(10) DEFAULT NULL,
  `u_pwd` varchar(6) DEFAULT NULL,
  `u_time` varchar(100) NOT NULL,
  `u_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fnm`, `u_email`, `u_mno`, `u_pwd`, `u_time`, `u_status`) VALUES
(1, 'Meet Savaliya', 'meet@gmail.com', 1234567890, '123456', '1750691951', 1),
(2, 'vishal kumar', 'vishal@gmail.com', 1234567890, '789456', '1750692141', 1),
(3, 'Hanshraj Meleriya', 'meleriya@gmail.com', 1234567890, '123456', '1750692375', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `co_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
