-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2024 at 02:18 PM
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
-- Database: `demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `total` varchar(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `created_date` varchar(12) NOT NULL,
  `modified_date` varchar(12) NOT NULL,
  `status` varchar(25) NOT NULL COMMENT '0=Failed, 1=Success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `name`, `email`, `address`, `product_id`, `product_name`, `product_price`, `total`, `currency`, `created_date`, `modified_date`, `status`) VALUES
(1, 'txn_3OugclK6YLKAPd6s0M10hCdB', 'Iswariya Parthiban', 'ishwaryajp3010@gmail.com', 'Test 15 Street, New York, USA', '1', 'Product One', 10.00, '10', 'usd', '1710531625', '1710531625', 'succeeded'),
(2, 'txn_3OugcmK6YLKAPd6s1dOlgU1B', 'Iswariya Parthiban', 'ishwaryajp3010@gmail.com', 'Test 15 Street, New York, USA', '1', 'Product One', 10.00, '10', 'usd', '1710531626', '1710531626', 'succeeded'),
(3, 'txn_3OugdoK6YLKAPd6s0ILxJanv', 'Iswariya Parthiban', 'ishwaryajp3010@gmail.com', 'Test 15 Street, New York, USA', '1', 'Product One', 10.00, '10', 'usd', '1710531690', '1710531690', 'succeeded'),
(4, 'txn_3OusyaK6YLKAPd6s0mR5hD63', 'Iswariya Parthiban', 'ishwaryajp3010@gmail.com', 'Test 15 Street, New York, USA', '1', 'Basic Plan', 10.00, '10', 'usd', '1710579145', '1710579145', 'succeeded'),
(5, 'txn_3OvI73K6YLKAPd6s10UFuJOh', 'sangee', 'sangee3010@gmail.com', 'Test 15 Street, New York, USA', '1', 'Basic Plan', 10.00, '10', 'usd', '1710675770', '1710675770', 'succeeded'),
(6, 'txn_3OvJ5VK6YLKAPd6s0KqzpYrE', 'Iswariya Parthiban', 'ishwaryajp3010@gmail.com', 'Test 15 Street, New York, USA', '1', 'Basic Plan', 10.00, '10', 'usd', '1710679518', '1710679518', 'succeeded'),
(7, 'txn_3OvJX1K6YLKAPd6s1mBLwHNp', 'Aishwaryaece', 'ishuece3010@gmail.com', 'Test 15 Street, New York, USA', '1', 'Basic Plan', 10.00, '10', 'usd', '1710681223', '1710681223', 'succeeded'),
(8, 'txn_3OvJY6K6YLKAPd6s0D6pWJ4x', 'Aishwaryaece', 'ishuece3010@gmail.com', 'Test 15 Street, New York, USA', '2', 'Standard plan', 20.00, '20', 'usd', '1710681290', '1710681290', 'succeeded');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `status`) VALUES
(1, 'Basic Plan', 'Suitable for basic needs', 10.00, 1),
(2, 'Standard plan', 'Suitable for standard plan', 20.00, 1),
(3, 'Premium plan', 'Suitable for premium plan', 30.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
