-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3341
-- Generation Time: Jun 07, 2023 at 02:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echoswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(50) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_01` varchar(50) NOT NULL,
  `image_02` varchar(50) NOT NULL,
  `image_03` varchar(50) NOT NULL,
  `image_04` varchar(50) NOT NULL,
  `image_05` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pid`, `Product_name`, `address`, `price`, `category`, `image_01`, `image_02`, `image_03`, `image_04`, `image_05`, `description`) VALUES
('LooNgiIIHYdvikSUuWbM', 'sYSr37xTHr04py7RSWTT', 'Solar panel', 'Miyapur', 1200, 'sustainableresources', 'Wsy9tp0ryvroRUiEzt4w.jpg', '', '', '', '', '1234567890sdfgyhuiop['),
('sYSr37xTHr04py7RSWTT', 'p9cW8Ux6OAh3pjQ384LJ', 'asdf', 'asdf', 234, 'electronics', 'V5Z3h0pQZPOl3sCcGjPo.jpg', '', '', '', '', 'asdf'),
('DBMMkJJRfhGG54kdrIe9', 'Bt0A5VDrvReRbYOxiyLn', 'Tshiert', 'Delhi', 500, 'clothing', '8tI5AGAYEPm1u4BVPoiY.jpg', '', '', '', '', '12asdfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_products`
--

CREATE TABLE `temporary_products` (
  `id` varchar(50) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_01` varchar(50) NOT NULL,
  `image_02` varchar(50) NOT NULL,
  `image_03` varchar(50) NOT NULL,
  `image_04` varchar(50) NOT NULL,
  `image_05` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `password`) VALUES
('DBMMkJJRfhGG54kdrIe9', 'Sri Harsha', 2147483647, 'harshakss@gmail.com', 'e9e69cbb5fcca69df6c3b7abbb31f93a90759dbc'),
('sYSr37xTHr04py7RSWTT', 'harsha', 2147483647, 'harshakss23@gmail.com', 'e9e69cbb5fcca69df6c3b7abbb31f93a90759dbc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temporary_products`
--
ALTER TABLE `temporary_products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
