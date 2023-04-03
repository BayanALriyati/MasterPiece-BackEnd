-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 02:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gifts`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `qty`) VALUES
(20, 47, 22, 7),
(21, 1, 21, 1),
(22, 47, 25, 1),
(23, 47, 21, 8);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `name`, `qty`, `price`, `image`) VALUES
(1, 56, 21, 'Flower 1', 2, 100, 'Flower3.Jpg'),
(2, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(3, 56, 21, 'flower 1', 0, 100, 'flower3.jpg'),
(4, 56, 21, 'flower 1', 0, 100, 'flower3.jpg'),
(5, 56, 21, 'flower 1', 4, 100, 'flower3.jpg'),
(6, 56, 21, 'flower 1', 2, 100, 'flower3.jpg'),
(7, 56, 21, 'flower 1', 5, 100, 'flower3.jpg'),
(8, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(10, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(11, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(12, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(13, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(14, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(15, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(16, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(17, 42, 21, 'flower 1', 1, 100, 'flower3.jpg'),
(20, 42, 22, '', 2, 0, ''),
(21, 47, 21, '', 3, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryName`, `description`, `slug`, `status`, `popular`, `image`, `created_at`) VALUES
(66, 'box', 'box box box box', 'box', 0, 0, 'OIP.jpg', '2023-03-04 12:05:48'),
(65, 'card ', 'card card  card  card  card  card ', 'card', 0, 0, 'card3.jpg', '2023-03-04 12:05:25'),
(64, 'gifts', 'gifts gifts gifts gifts gifts gifts ', 'gifts', 0, 0, 'gift3.jpg', '2023-03-04 12:04:59'),
(63, 'Chocolates', 'Chocolates Chocolates Chocolates Chocolates Chocolates ', 'Chocolates', 0, 0, 'chocolate1.jpg', '2023-03-04 12:04:31'),
(67, 'Flowers', 'Flowers Flowers Flowers Flowers Flowers Flowers', 'Flowers', 0, 0, 'bootstrap.png', '2023-03-04 12:07:30'),
(68, 'byan', 'nnnnnnnnnnnnnnnnnnnnnnnnnn', 'noman', 1, 1, 'flower6.jpg', '2023-03-04 14:51:09'),
(71, 'mmmmmmmmmm', '00000000000', 'mmmmmmmmm', 1, 1, 'bootstrap.png', '2023-03-06 19:41:32'),
(72, 'z', 'zxz', 'z', 0, 0, 'react-js.jpg', '2023-03-06 19:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `product_id`, `name`, `description`, `price`, `image`) VALUES
(1, 56, 21, 'flower 1', '', 100, 'flower3.jpg'),
(2, 42, 21, 'flower 1', '', 100, ''),
(3, 56, 21, 'flower 1', '', 100, ''),
(4, 56, 21, 'flower 1', '', 100, ''),
(5, 56, 21, 'flower 1', '', 100, ''),
(6, 56, 21, 'flower 1', '', 100, ''),
(7, 42, 22, 'flower 2', '', 75, ''),
(8, 42, 21, 'flower 1', '', 100, 'flower3.jpg'),
(9, 42, 24, 'mmmmmmmm', '', 75, 'R.png'),
(11, 1, 22, '', '', 0, ''),
(14, 47, 22, '', '', 0, ''),
(15, 47, 26, 'zaax', '', 0, 'chrome_proxy.exe'),
(16, 47, 25, 'mmm', 'jjjjjjjj', 0, 'R.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `price_discount` int(11) NOT NULL,
  `percent_discount` int(11) NOT NULL,
  `is_discount` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `imageMain` varchar(255) NOT NULL,
  `thumbnail_1` varchar(255) DEFAULT NULL,
  `thumbnail_2` varchar(255) DEFAULT NULL,
  `thumbnail_3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `productName`, `description`, `price`, `price_discount`, `percent_discount`, `is_discount`, `quantity`, `slug`, `status`, `imageMain`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `created_at`) VALUES
(21, 67, 'flower 1', ' flower 1 flower red flower 1 flower red  ', 100, 0, 0, 0, 100, 'Flowers', 0, 'flower3.jpg', 'flower3.jpg', 'flower3.jpg', 'flower3.jpg', '2023-03-04 16:50:53'),
(22, 67, 'flower 2', 'flower 1 flower blue flower 1 flower blue', 100, 75, 25, 1, 100, 'Flower', 0, 'flower2.jpg', 'flower2.jpg', 'flower2.jpg', 'flower2.jpg', '2023-03-04 16:51:53'),
(23, 66, 'bayan', 'xxxxxxxxxxxxxxx', 50, 25, 50, 1, 11, 'xxxxxxx', 0, 'box4.jpg', 'box3.jpg', 'box3.jpg', 'box6.jpg', '2023-03-05 16:44:53'),
(24, 63, 'mmmmmmmm', 'kkkkkkkk', 150, 75, 50, 1, 0, '......mmmmmmmmm', 0, 'R.png', 'react_js.jpeg', 'react-js.jpg', 'bootstrap.png', '2023-03-06 19:50:13'),
(25, 63, 'mmm', 'jjjjjjjj', 0, 0, 0, 0, 6, 'kkkkkkk', 0, 'R.png', 'Bayan Resume .pdf', 'react_js.jpeg', 'bootstrap.png', '2023-03-06 19:52:16'),
(26, 65, 'zaax', 'xxx', 0, 0, 0, 0, 0, 'xxxx', 0, 'chrome_proxy.exe', 'bootstrap.png', 'bootstrap.png', 'bootstrap.png', '2023-03-06 20:00:11'),
(27, 64, 'aaaaaaaaa', 'zzzzzzzzz', 0, 0, 0, 0, 0, 'alriyati', 1, 'bootstrap.png', 'bootstrap.png', 'bootstrap.png', 'bootstrap.png', '2023-03-06 20:01:27'),
(28, 67, 'flower 3', 'flower 3 flower 3 flower 3 flower 3', 140, 0, 0, 0, 100, 'flower 3', 0, 'logo-color.png', 'logo-color.png', 'logo-color.png', 'logo-color.png', '2023-04-02 21:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `RegStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `name`, `password`, `email`, `image`, `city`, `role`, `RegStatus`, `created_at`) VALUES
(1, 'bayan alriyati', '111', 'bayan@gmail.com', 'OIP.jpg', '', 1, 0, '2023-02-16 13:03:29'),
(44, 'admin 2', '000', 'admin2@gmail.com', 'OIP (1).jpg', '', 1, 0, '2023-02-18 11:34:45'),
(47, 'Ahmad', '000', 'Ahmad@gmail.com', '', '', 0, 0, '2023-03-31 00:35:21'),
(48, 'art', '111', 'Gift@Gmail.Com', '', '', 0, 0, '2023-03-31 00:36:45'),
(42, 'assel', '000', 'assel@gmail.com', '', '', 0, 0, '2023-02-17 09:46:03'),
(46, 'Bayan', '0000', 'bayan0000@gmail.com', '', '', 0, 0, '2023-02-21 20:32:43'),
(49, 'sad', '000', 'Jujuju@Dsd.Dsdsd', '', '', 0, 0, '2023-03-31 00:53:28'),
(50, 'aaaa', '000', 'aaare@AX.SXSA', '', '', 0, 0, '2023-03-31 00:55:44'),
(51, 'id [int]', '000', 'GTGT@cksc.axa', '', '', 0, 0, '2023-03-31 00:57:02'),
(52, 'zzzzzzz', '000', 'zz@bh.ll', '', '', 0, 0, '2023-03-31 00:59:20'),
(53, 'art', 'zzz', 'bayanArt@gmail.com', '', '', 0, 0, '2023-03-31 01:01:41'),
(54, 'art', '8aefb06c426e07a0a671a1e2488b4858d694a730', 'bayanxxxx@gmail.com', '', '', 0, 0, '2023-03-31 11:32:56'),
(55, 'bayan', '8aefb06c426e07a0a671a1e2488b4858d694a730', 'Bayanxxx0x@Gmail.Com', '', '', 0, 0, '2023-03-31 11:34:29'),
(56, 'bayan', '000', 'Bayanxxx0sx@Gmail.Com', '', '', 0, 0, '2023-03-31 11:36:22'),
(57, 'bayan', '111', 'Bayanffffff@Gmail.Com', '', '', 0, 0, '2023-04-01 11:38:31'),
(58, 'bayan', '000', 'Bayanaaaaaa@Gmail.Com', '', '', 0, 0, '2023-04-01 11:46:35'),
(59, 'art', '000', 'bayanxxxv@gmail.com', '', '', 0, 0, '2023-04-01 11:47:49'),
(60, 'art', '000', 'bayanxxnxv@gmail.com', '', '', 0, 0, '2023-04-01 11:48:56'),
(61, 'after product_qty', '000', 'Bayanffffffjk@Gmail.Com', '', '', 0, 0, '2023-04-01 20:33:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
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
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
