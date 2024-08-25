-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2024 at 05:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super-market`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `createdAt`, `product_id`, `user_id`, `price`) VALUES
(1, '2024-08-24 03:20:05', 2, 1, 1000),
(2, '2024-08-24 03:20:37', 2, 2, 4),
(3, '2024-08-24 03:20:50', 2, 1, 1000),
(5, '2024-08-24 03:28:13', 3, 2, 120),
(6, '2024-08-25 01:46:42', 4, 2, 123),
(7, '2024-08-25 01:46:49', 4, 2, 123);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `count` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `count`, `createdAt`, `price`, `image`, `description`, `admin_id`) VALUES
(1, 'p1', 25, '2024-08-23 15:44:31', 1000, 'p1.jpg', 'this is a product 1this is a product 1this is a product 1this is a product 1this is a product 1this is a product 1', 1),
(2, 'sad', 4, '2024-08-24 02:57:32', 4, '713203product-2.jpg', 'edw', 1),
(3, 'product 2', 10, '2024-08-24 03:24:04', 120, '445499product-1.jpg', 'edad', 1),
(4, 'product 3', 123, '2024-08-25 00:47:34', 123, '866302branding-3.jpg', 'this is a product', 1),
(5, 'ahmed prodcut', 11111, '2024-08-25 02:04:49', 11111, '679903app-3.jpg', '123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `city` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `createdAt`, `city`, `type`, `password`) VALUES
(1, 'ahmed', '01010101010', 'a@g', '2024-08-23 15:24:20', 'cairo', 'admin', '123'),
(2, 'mohamed', '0112121212', 'nn@gg', '2024-08-23 15:24:20', 'tanta', 'client', '123'),
(4, 'Ahmededed', '0123456789', 'ahmedmubarak.hsin@gmail.com', '2024-08-23 22:43:39', 'tanta', 'client', '123'),
(5, 'test', '0123', 'test@gm.com', '2024-08-23 23:14:28', 'cairo', 'client', '123'),
(6, 'ssd', '0123', 'ed@g.com', '2024-08-25 00:45:16', 'alex', 'client', '123'),
(7, 'ad', '0123456789', 'aa@g.com', '2024-08-25 00:46:45', 'cairo2', 'client', '123'),
(8, 'ahmed mohamed', '123', 'ahhhh@gm.com', '2024-08-25 00:47:05', 'cairo 11', 'admin', '123'),
(9, 'test99', '123', 'a1@g', '2024-08-25 01:19:44', 'egy', 'client', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
