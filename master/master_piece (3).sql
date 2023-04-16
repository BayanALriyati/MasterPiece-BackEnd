-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 01:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_piece`
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
(66, 'box', 'box box box box', 'box', 0, 0, 'OIP.jpg', '2023-03-04 09:05:48'),
(65, 'card ', 'card card  card  card  card  card ', 'card', 0, 0, 'card3.jpg', '2023-03-04 09:05:25'),
(64, 'gifts', 'gifts gifts gifts gifts gifts gifts ', 'gifts', 0, 0, 'gift3.jpg', '2023-03-04 09:04:59'),
(63, 'Chocolates', 'Chocolates Chocolates Chocolates Chocolates Chocolates ', 'Chocolates', 0, 0, 'chocolate1.jpg', '2023-03-04 09:04:31'),
(67, 'Flowers', 'Flowers Flowers Flowers Flowers Flowers Flowers', 'Flowers', 0, 0, 'bootstrap.png', '2023-03-04 09:07:30'),
(68, 'byan', 'nnnnnnnnnnnnnnnnnnnnnnnnnn', 'noman', 1, 1, 'flower6.jpg', '2023-03-04 11:51:09'),
(71, 'mmmmmmmmmm', '00000000000', 'mmmmmmmmm', 1, 1, 'bootstrap.png', '2023-03-06 16:41:32'),
(72, 'z', 'zxz', 'z', 0, 0, 'react-js.jpg', '2023-03-06 16:42:03');

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
(17, 47, 25, 'mmm', 'jjjjjjjj', 0, 'R.png'),
(18, 47, 21, 'flower 1', ' flower 1 flower red flower 1 flower red  ', 100, 'flower3.jpg'),
(19, 47, 26, 'zaax', 'xxx', 0, 'chrome_proxy.exe');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `delivery_time` datetime NOT NULL,
  `letter` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `pay_method` varchar(255) NOT NULL,
  `card_Number` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `order_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `fullName`, `email`, `phone`, `delivery_time`, `letter`, `location`, `pay_method`, `card_Number`, `total_products`, `total_price`, `order_time`, `created_at`) VALUES
(1, 47, '', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-11 04:37:00', 'Write the letter here bgbg', 'flat no. 12,aaaaaaaaaaa, aqaba,Jordan', 'methodCash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-05 01:35:45', '2023-04-04 22:35:45'),
(2, 47, '', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-13 06:41:00', 'Write the letter here', 'flat no. 12,aaaaaaaaaaa, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-05 01:38:04', '2023-04-04 22:38:04'),
(3, 47, 'bayan alriyati', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-14 03:41:00', 'Write the letter here', 'flat no. 12,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-05 01:40:14', '2023-04-04 22:40:14'),
(4, 47, 'noman alriyati', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-06 23:12:00', 'Write the letter herexzxzxz', 'flat no. 01,aaaaaaaaaaa, aqaba,Jordan', 'Credit', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-11 11:12:55', '2023-04-11 20:12:55'),
(5, 47, 'mona mona', 'mona@gmail.com', '0000000000', '2023-04-29 23:18:00', 'Write the letter herexxx', 'flat no. 111,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-11 11:18:43', '2023-04-11 20:18:43'),
(6, 47, 'noman alriyatiss', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-29 23:22:00', 'Write the letter herezzz', 'flat no. 000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-11 11:22:14', '2023-04-11 20:22:14'),
(7, 47, 'ssssssss ssssss', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-29 23:23:00', 'Write the letter herezZ', 'flat no. 000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-11 11:23:47', '2023-04-11 20:23:47'),
(8, 47, 'kkk ,klll', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-03-31 01:02:00', 'Write the letter here', 'flat no. 000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 12:03:02', '2023-04-11 21:03:02'),
(9, 47, 'kkk ,klll', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-29 00:04:00', 'Write the letter here', 'flat no. 000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 12:04:21', '2023-04-11 21:04:21'),
(10, 47, 'after payment_status', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-27 00:08:00', 'Write the letter here', 'flat no. ....,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 12:08:39', '2023-04-11 21:08:39'),
(11, 47, 'sc alriyati', 'bayan@gmail.com', '0785364521', '2023-04-06 00:16:00', 'Write the letter here', 'flat no. 00,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 12:16:22', '2023-04-11 21:16:22'),
(12, 47, 'after payment_status', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-22 00:23:00', 'Write the letter here', 'flat no. .000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 12:23:52', '2023-04-11 21:23:52'),
(13, 47, 'kkk ,klll', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-18 00:27:00', 'Write the letter here', 'flat no. 000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 12:28:37', '2023-04-11 21:28:37'),
(14, 47, 'after payment_status', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-14 00:45:00', 'Write the letter here', 'flat no. 000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 12:45:32', '2023-04-11 21:45:32'),
(15, 47, 'noman alriyati', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-27 01:09:00', 'Write the letter here', 'flat no. 000,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 01:10:06', '2023-04-11 22:10:06'),
(16, 47, 'noman alriyati', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-21 01:13:00', 'Write the letter here', 'flat no. 00,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-12 01:13:16', '2023-04-11 22:13:16'),
(17, 47, 'afterxxxxx pay_method', 'bayanalriyati95@gmail.com', '0785364521', '2023-04-05 16:54:00', 'Write the letter here', 'flat no. 000,aqaba, 444,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-16 04:55:05', '2023-04-16 13:55:05'),
(18, 47, 'after created_at', 'Bayanaaaaaa@Gmail.Com', '0785364521', '2023-04-12 22:47:00', 'Write the letter here', 'flat no. xxx,cxx, ccc,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-16 10:47:22', '2023-04-16 19:47:22'),
(19, 47, 'after created_at', 'bayanalriyati95@gmail.com', '0785364521', '2023-04-14 22:48:00', 'Write the letter here', 'flat no. 0,aqaba, lll,Jordan', 'Select Method', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-16 10:48:59', '2023-04-16 19:48:59'),
(20, 47, 'flex alriyati', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-13 22:53:00', 'Write the letter here', 'flat no. 00,aaaaaaaaaaa, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-16 10:53:11', '2023-04-16 19:53:11'),
(21, 47, 'bayan  Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-14 00:55:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 12:56:04', '2023-04-16 21:56:04'),
(22, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-03 00:58:00', 'Write the letter here', 'flat no. .00,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 12:58:44', '2023-04-16 21:58:44'),
(23, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-15 01:01:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:01:10', '2023-04-16 22:01:10'),
(24, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-05 01:10:00', 'Write the letter here', 'flat no. 000,11, aqaba,Jordan', 'Select Method', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:10:42', '2023-04-16 22:10:42'),
(25, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-05 01:12:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:12:17', '2023-04-16 22:12:17'),
(26, 47, 'noman alriyati', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-03-09 01:15:00', 'Write the letter here', 'flat no. .00,aaaaaaaaaaa, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:15:19', '2023-04-16 22:15:19'),
(27, 47, 'noman alriyati', 'Bayanaaaaaa@Gmail.Com', '0000000000', '2023-04-04 01:16:00', 'Write the letter here', 'flat no. 00,aaaaaaaaaaa, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:16:32', '2023-04-16 22:16:32'),
(28, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-20 01:19:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:19:13', '2023-04-16 22:19:13'),
(29, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-12 01:23:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:23:42', '2023-04-16 22:23:42'),
(30, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-03-15 01:32:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:32:17', '2023-04-16 22:32:17'),
(31, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-11 01:58:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 01:58:56', '2023-04-16 22:58:56'),
(32, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-26 02:03:00', 'Write the letter here', 'flat no. 00,11, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 02:03:58', '2023-04-16 23:03:58'),
(33, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-07 02:05:00', 'Write the letter here', 'flat no. 0,11, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 02:06:05', '2023-04-16 23:06:05'),
(34, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-03-08 02:15:00', 'Write the letter here', 'flat no. 000,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 02:15:50', '2023-04-16 23:15:50'),
(35, 47, 'Bayan Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-13 02:18:00', 'Write the letter here', 'flat no. 000,11, aqaba,Jordan', 'Pay Cash', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 02:18:14', '2023-04-16 23:18:14'),
(36, 47, 'orderDetails Alriyati', 'bayannoman22@gmail.com', '0785364521', '2023-04-12 02:21:00', 'Write the letter here', 'flat no. 000,11, aqaba,Jordan', 'Credit card', '', 'flower 1 (100 x 8) - mmm (0 x 1) - flower 2 (100 x 7) - ', 1325, '2023-04-17 02:21:47', '2023-04-16 23:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `NameProduct` varchar(255) NOT NULL,
  `NameUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`, `NameProduct`, `NameUser`) VALUES
(30, 0, 0, '0', '', ''),
(30, 0, 0, '0', '', ''),
(30, 0, 0, '0', '', ''),
(35, 0, 0, '0', '', 'Ahmad'),
(35, 0, 0, '0', '', 'Ahmad'),
(35, 0, 0, '0', '', 'Ahmad'),
(36, 0, 0, '0', '', 'orderDetails Alriyati'),
(36, 0, 0, '0', '', 'orderDetails Alriyati'),
(36, 0, 0, '0', '', 'orderDetails Alriyati');

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
(21, 67, 'flower 1', ' flower 1 flower red flower 1 flower red  ', 100, 0, 0, 0, 100, 'Flowers', 0, 'flower3.jpg', 'flower3.jpg', 'flower3.jpg', 'flower3.jpg', '2023-03-04 13:50:53'),
(22, 67, 'flower 2', 'flower 1 flower blue flower 1 flower blue', 100, 75, 25, 1, 100, 'Flower', 0, 'flower2.jpg', 'flower2.jpg', 'flower2.jpg', 'flower2.jpg', '2023-03-04 13:51:53'),
(23, 66, 'bayan', 'xxxxxxxxxxxxxxx', 50, 25, 50, 1, 11, 'xxxxxxx', 0, 'box4.jpg', 'box3.jpg', 'box3.jpg', 'box6.jpg', '2023-03-05 13:44:53'),
(24, 63, 'mmmmmmmm', 'kkkkkkkk', 150, 75, 50, 1, 0, '......mmmmmmmmm', 0, 'R.png', 'react_js.jpeg', 'react-js.jpg', 'bootstrap.png', '2023-03-06 16:50:13'),
(25, 63, 'mmm', 'jjjjjjjj', 0, 0, 0, 0, 6, 'kkkkkkk', 0, 'R.png', 'Bayan Resume .pdf', 'react_js.jpeg', 'bootstrap.png', '2023-03-06 16:52:16'),
(26, 65, 'zaax', 'xxx', 0, 0, 0, 0, 0, 'xxxx', 0, 'chrome_proxy.exe', 'bootstrap.png', 'bootstrap.png', 'bootstrap.png', '2023-03-06 17:00:11'),
(27, 64, 'aaaaaaaaa', 'zzzzzzzzz', 0, 0, 0, 0, 0, 'alriyati', 1, 'bootstrap.png', 'bootstrap.png', 'bootstrap.png', 'bootstrap.png', '2023-03-06 17:01:27'),
(28, 67, 'flower 3', 'flower 3 flower 3 flower 3 flower 3', 140, 0, 0, 0, 100, 'flower 3', 0, 'logo-color.png', 'logo-color.png', 'logo-color.png', 'logo-color.png', '2023-04-02 18:39:25');

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
(1, 'bayan alriyati', '111', 'bayan@gmail.com', 'OIP.jpg', '', 1, 0, '2023-02-16 10:03:29'),
(44, 'admin 2', '000', 'admin2@gmail.com', 'OIP (1).jpg', '', 1, 0, '2023-02-18 08:34:45'),
(47, 'Ahmad', '000', 'Ahmad@gmail.com', '', '', 0, 0, '2023-03-30 21:35:21'),
(48, 'art', '111', 'Gift@Gmail.Com', '', '', 0, 0, '2023-03-30 21:36:45'),
(42, 'assel', '000', 'assel@gmail.com', '', '', 0, 0, '2023-02-17 06:46:03'),
(46, 'Bayan', '0000', 'bayan0000@gmail.com', '', '', 0, 0, '2023-02-21 17:32:43'),
(49, 'sad', '000', 'Jujuju@Dsd.Dsdsd', '', '', 0, 0, '2023-03-30 21:53:28'),
(50, 'aaaa', '000', 'aaare@AX.SXSA', '', '', 0, 0, '2023-03-30 21:55:44'),
(51, 'id [int]', '000', 'GTGT@cksc.axa', '', '', 0, 0, '2023-03-30 21:57:02'),
(52, 'zzzzzzz', '000', 'zz@bh.ll', '', '', 0, 0, '2023-03-30 21:59:20'),
(53, 'art', 'zzz', 'bayanArt@gmail.com', '', '', 0, 0, '2023-03-30 22:01:41'),
(54, 'art', '8aefb06c426e07a0a671a1e2488b4858d694a730', 'bayanxxxx@gmail.com', '', '', 0, 0, '2023-03-31 08:32:56'),
(55, 'bayan', '8aefb06c426e07a0a671a1e2488b4858d694a730', 'Bayanxxx0x@Gmail.Com', '', '', 0, 0, '2023-03-31 08:34:29'),
(56, 'bayan', '000', 'Bayanxxx0sx@Gmail.Com', '', '', 0, 0, '2023-03-31 08:36:22'),
(57, 'bayan', '111', 'Bayanffffff@Gmail.Com', '', '', 0, 0, '2023-04-01 08:38:31'),
(58, 'bayan', '000', 'Bayanaaaaaa@Gmail.Com', '', '', 0, 0, '2023-04-01 08:46:35'),
(59, 'art', '000', 'bayanxxxv@gmail.com', '', '', 0, 0, '2023-04-01 08:47:49'),
(60, 'art', '000', 'bayanxxnxv@gmail.com', '', '', 0, 0, '2023-04-01 08:48:56'),
(61, 'after product_qty', '000', 'Bayanffffffjk@Gmail.Com', '', '', 0, 0, '2023-04-01 17:33:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
