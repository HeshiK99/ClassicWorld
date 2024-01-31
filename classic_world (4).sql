-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 07:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classic_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`, `updated_at`, `active`, `deleted`) VALUES
(24, 'Ordinary', '2023-12-27 04:11:19', '2023-12-27 04:11:19', 1, 0),
(25, 'Dr.Rashel', '2023-12-27 06:29:24', '2023-12-27 06:29:24', 1, 0),
(27, 'Janet', '2023-12-27 06:32:31', '2023-12-27 06:32:31', 1, 0),
(29, '4ever', '2024-01-06 08:18:39', '2024-01-06 08:18:39', 1, 0),
(30, '4ever', '2024-01-30 08:02:22', '2024-01-30 08:02:22', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `users_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `image`, `name`, `quantity`, `date`, `price`, `total`, `created_at`, `updated_at`, `active`, `deleted`, `users_id`, `product_id`) VALUES
(18, '1704530197_65991115e0584.jpeg', 'Gold Face Wash 50ml', 1, '2024-01-30', 220.00, 220.00, '2024-01-30 08:33:03', '2024-01-30 08:33:03', 1, 0, 6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`, `active`, `deleted`, `brand_id`) VALUES
(3, 'Cleansers', '2024-01-06 07:59:30', '2024-01-06 07:59:30', 1, 0, 24),
(5, 'Hair Care', '2024-01-06 08:00:04', '2024-01-06 08:00:04', 1, 0, 24),
(6, 'Direct Acids', '2024-01-06 08:00:19', '2024-01-06 08:00:19', 1, 0, 24),
(7, 'Hydrators', '2024-01-06 08:00:35', '2024-01-06 08:00:35', 1, 0, 24),
(8, 'Face Wash', '2024-01-06 08:19:25', '2024-01-06 08:19:25', 1, 0, 29),
(9, 'Body Wash', '2024-01-06 08:19:45', '2024-01-06 08:19:45', 1, 0, 29),
(10, 'Shampoo', '2024-01-06 08:20:05', '2024-01-06 08:20:05', 1, 0, 29),
(11, 'Body Cream', '2024-01-06 08:20:20', '2024-01-06 08:20:20', 1, 0, 29),
(12, 'Face Mask', '2024-01-06 09:04:25', '2024-01-06 09:04:25', 1, 0, 27),
(13, 'Haircare', '2024-01-30 08:10:05', '2024-01-30 08:10:05', 1, 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `paid` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `total`, `date`, `paid`, `created_at`, `updated_at`, `active`, `deleted`, `users_id`) VALUES
(24, 8800.00, '2024-01-06 00:00:00', 0, '2024-01-06 09:19:29', '2024-01-06 09:19:29', 1, 0, 2),
(25, 8995.00, '2024-01-09 00:00:00', 1, '2024-01-09 12:36:53', '2024-01-09 12:38:19', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(50) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `individual_price` decimal(8,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `name`, `quantity`, `price`, `individual_price`, `created_at`, `updated_at`, `active`, `deleted`, `order_id`, `product_id`) VALUES
(23, 'Vitamin C Acid 30ml', 1, 8800.00, 8800.00, '2024-01-06 09:19:29', '2024-01-06 09:19:29', 1, 0, 24, 9),
(24, 'Vitamin C Acid 30ml', 1, 8800.00, 8800.00, '2024-01-09 12:36:54', '2024-01-09 12:36:54', 1, 0, 25, 9),
(25, 'Lunuwila Face Wash 50ml', 1, 195.00, 195.00, '2024-01-09 12:36:54', '2024-01-09 12:36:54', 1, 0, 25, 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `image`, `created_at`, `updated_at`, `active`, `deleted`, `category_id`) VALUES
(7, 'Squalance Cleanser 50ml', 30, 5900.00, '1704528111_659908ef2747a.jpeg', '2024-01-06 08:01:51', '2024-01-11 01:17:53', 1, 0, 3),
(8, 'Multi Peptide Serum 60ml', 10, 8350.00, '1704528637_65990afdbf9ef.webp', '2024-01-06 08:10:38', '2024-01-06 08:10:38', 1, 0, 5),
(9, 'Vitamin C Acid 30ml', 10, 8800.00, '1704528757_65990b75d0da4.webp', '2024-01-06 08:12:37', '2024-01-06 08:12:37', 1, 0, 6),
(10, 'Lactic Acid 30ml', 10, 6000.00, '1704528802_65990ba29686b.webp', '2024-01-06 08:13:22', '2024-01-06 08:13:22', 1, 0, 6),
(11, 'Natural Moisturizer 100ml', 30, 9000.00, '1704528834_65990bc2a2539.jpeg', '2024-01-06 08:13:54', '2024-01-09 12:47:18', 1, 0, 7),
(12, 'Lunuwila Face Wash 50ml', 10, 195.00, '1704530119_659910c7e35f8.jpeg', '2024-01-06 08:35:20', '2024-01-06 08:35:20', 1, 0, 8),
(13, 'Venivel Face Wash 50ml', 10, 195.00, '1704530161_659910f1ea9f2.jpeg', '2024-01-06 08:36:01', '2024-01-06 08:36:01', 1, 0, 8),
(14, 'Gold Face Wash 50ml', 10, 220.00, '1704530197_65991115e0584.jpeg', '2024-01-06 08:36:37', '2024-01-06 08:36:37', 1, 0, 8),
(15, 'Venivel whitening Body Wash 300ml', 20, 650.00, '1704530393_659911d98be6d.png', '2024-01-06 08:39:54', '2024-01-06 08:39:54', 1, 0, 9),
(16, 'Hibiscus Brightening Body Wash 300ml', 20, 650.00, '1704530447_6599120f882fc.png', '2024-01-06 08:40:47', '2024-01-06 08:40:47', 1, 0, 9),
(17, 'Aloe Lavender Moisturizing Body Wash 300ml', 10, 650.00, '1704530492_6599123cb771a.png', '2024-01-06 08:41:32', '2024-01-06 08:41:32', 1, 0, 9),
(18, 'Coco Butter Body Milk 40ml', 15, 170.00, '1704530615_659912b7537d4.jpeg', '2024-01-06 08:43:35', '2024-01-06 08:43:35', 1, 0, 11),
(19, 'Venivel Body Milk 40ml', 20, 150.00, '1704530686_659912fe5678a.jpeg', '2024-01-06 08:44:46', '2024-01-06 08:44:46', 1, 0, 11),
(20, 'Long and Strong Shampoo 180ml5', 20, 550.00, '1704531104_659914a0442d1.jpeg', '2024-01-06 08:51:44', '2024-01-06 08:51:44', 1, 0, 10),
(21, 'Hibiscuss Conditioning Shampoo 80ml', 20, 260.00, '1704531140_659914c4c51ed.png', '2024-01-06 08:52:20', '2024-01-06 08:52:20', 1, 0, 10),
(22, 'Janet Orange Vitamin C Mask', 20, 550.00, '1704531918_659917cee4b68.webp', '2024-01-06 09:05:19', '2024-01-31 05:59:21', 1, 1, 12),
(23, 'oil', 10, 100.00, '1706602536_65b8b0285bb42.jpeg', '2024-01-30 08:15:52', '2024-01-31 05:59:11', 1, 1, 3),
(24, 'oil', 10, 100.00, '1706602554_65b8b03ad24f6.jpeg', '2024-01-30 08:15:54', '2024-01-31 05:59:17', 1, 1, 3),
(25, 'oil', 10, 100.00, '1706602555_65b8b03bde732.jpeg', '2024-01-30 08:15:55', '2024-01-31 05:59:28', 1, 1, 3),
(26, 'oil', 10, 100.00, '1706602557_65b8b03d455d1.jpeg', '2024-01-30 08:15:57', '2024-01-31 05:59:41', 1, 1, 3),
(27, 'oil', 10, 650.00, '1706680719_65b9e18f18222.jpeg', '2024-01-31 05:58:44', '2024-01-31 05:59:36', 1, 1, 3),
(28, 'oil', 10, 650.00, '1706680726_65b9e1960c21f.jpeg', '2024-01-31 05:58:46', '2024-01-31 05:59:32', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review`, `created_at`, `updated_at`, `active`, `deleted`, `user_id`, `product_id`) VALUES
(1, 'This is a good product', '2023-12-23 07:00:25', '2023-12-23 07:00:25', 1, 0, 1, 3),
(2, 'Test', '2023-12-23 07:06:58', '2023-12-23 07:06:58', 1, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `recieved_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `recieved_date`, `created_at`, `updated_at`, `active`, `deleted`) VALUES
(9, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:30', '2024-01-06 07:42:30', 1, 0),
(10, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:32', '2024-01-06 07:42:32', 1, 0),
(11, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:35', '2024-01-06 07:42:35', 1, 0),
(12, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:50', '2024-01-06 07:42:50', 1, 0),
(13, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:51', '2024-01-06 07:42:51', 1, 0),
(14, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:52', '2024-01-06 07:42:52', 1, 0),
(15, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:53', '2024-01-06 07:42:53', 1, 0),
(16, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:54', '2024-01-06 07:42:54', 1, 0),
(17, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:54', '2024-01-06 07:42:54', 1, 0),
(18, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:55', '2024-01-06 07:42:55', 1, 0),
(19, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:56', '2024-01-06 07:42:56', 1, 0),
(20, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:42:56', '2024-01-06 07:42:56', 1, 0),
(21, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:01', '2024-01-06 07:43:01', 1, 0),
(22, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:02', '2024-01-06 07:43:02', 1, 0),
(23, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:03', '2024-01-06 07:43:03', 1, 0),
(24, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:04', '2024-01-06 07:43:04', 1, 0),
(25, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:05', '2024-01-06 07:43:05', 1, 0),
(26, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:06', '2024-01-06 07:43:06', 1, 0),
(27, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:06', '2024-01-06 07:43:06', 1, 0),
(28, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:07', '2024-01-06 07:43:07', 1, 0),
(29, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:08', '2024-01-06 07:43:08', 1, 0),
(30, 'hhh', '2024-01-07 00:00:00', '2024-01-06 07:43:09', '2024-01-06 07:43:09', 1, 0),
(31, 'new arraivals', '2024-01-09 00:00:00', '2024-01-09 12:46:50', '2024-01-09 12:46:50', 1, 0),
(32, 'new arraivals', '2024-01-09 00:00:00', '2024-01-09 12:47:18', '2024-01-09 12:47:18', 1, 0),
(33, 'newstock', '2024-01-11 00:00:00', '2024-01-11 01:17:44', '2024-01-11 01:17:44', 1, 0),
(34, 'newstock', '2024-01-11 00:00:00', '2024-01-11 01:17:53', '2024-01-11 01:17:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_item`
--

CREATE TABLE `stock_item` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_item`
--

INSERT INTO `stock_item` (`id`, `quantity`, `created_at`, `updated_at`, `active`, `deleted`, `stock_id`, `product_id`) VALUES
(10, 50, '2024-01-06 07:42:30', '2024-01-06 07:42:30', 1, 0, 9, 4),
(11, 50, '2024-01-06 07:42:32', '2024-01-06 07:42:32', 1, 0, 10, 4),
(12, 50, '2024-01-06 07:42:35', '2024-01-06 07:42:35', 1, 0, 11, 4),
(13, 50, '2024-01-06 07:42:50', '2024-01-06 07:42:50', 1, 0, 12, 4),
(14, 20, '2024-01-06 07:42:50', '2024-01-06 07:42:50', 1, 0, 12, 4),
(15, 50, '2024-01-06 07:42:51', '2024-01-06 07:42:51', 1, 0, 13, 4),
(16, 20, '2024-01-06 07:42:51', '2024-01-06 07:42:51', 1, 0, 13, 4),
(17, 50, '2024-01-06 07:42:52', '2024-01-06 07:42:52', 1, 0, 14, 4),
(18, 20, '2024-01-06 07:42:52', '2024-01-06 07:42:52', 1, 0, 14, 4),
(19, 50, '2024-01-06 07:42:53', '2024-01-06 07:42:53', 1, 0, 15, 4),
(20, 20, '2024-01-06 07:42:53', '2024-01-06 07:42:53', 1, 0, 15, 4),
(21, 50, '2024-01-06 07:42:54', '2024-01-06 07:42:54', 1, 0, 16, 4),
(22, 20, '2024-01-06 07:42:54', '2024-01-06 07:42:54', 1, 0, 16, 4),
(23, 50, '2024-01-06 07:42:54', '2024-01-06 07:42:54', 1, 0, 17, 4),
(24, 20, '2024-01-06 07:42:54', '2024-01-06 07:42:54', 1, 0, 17, 4),
(25, 50, '2024-01-06 07:42:55', '2024-01-06 07:42:55', 1, 0, 18, 4),
(26, 20, '2024-01-06 07:42:55', '2024-01-06 07:42:55', 1, 0, 18, 4),
(27, 50, '2024-01-06 07:42:56', '2024-01-06 07:42:56', 1, 0, 19, 4),
(28, 20, '2024-01-06 07:42:56', '2024-01-06 07:42:56', 1, 0, 19, 4),
(29, 50, '2024-01-06 07:42:56', '2024-01-06 07:42:56', 1, 0, 20, 4),
(30, 20, '2024-01-06 07:42:57', '2024-01-06 07:42:57', 1, 0, 20, 4),
(31, 50, '2024-01-06 07:43:01', '2024-01-06 07:43:01', 1, 0, 21, 4),
(32, 20, '2024-01-06 07:43:01', '2024-01-06 07:43:01', 1, 0, 21, 4),
(33, 50, '2024-01-06 07:43:02', '2024-01-06 07:43:02', 1, 0, 22, 4),
(34, 20, '2024-01-06 07:43:03', '2024-01-06 07:43:03', 1, 0, 22, 4),
(35, 50, '2024-01-06 07:43:03', '2024-01-06 07:43:03', 1, 0, 23, 4),
(36, 20, '2024-01-06 07:43:03', '2024-01-06 07:43:03', 1, 0, 23, 4),
(37, 50, '2024-01-06 07:43:04', '2024-01-06 07:43:04', 1, 0, 24, 4),
(38, 20, '2024-01-06 07:43:04', '2024-01-06 07:43:04', 1, 0, 24, 4),
(39, 50, '2024-01-06 07:43:05', '2024-01-06 07:43:05', 1, 0, 25, 4),
(40, 20, '2024-01-06 07:43:05', '2024-01-06 07:43:05', 1, 0, 25, 4),
(41, 50, '2024-01-06 07:43:06', '2024-01-06 07:43:06', 1, 0, 26, 4),
(42, 20, '2024-01-06 07:43:06', '2024-01-06 07:43:06', 1, 0, 26, 4),
(43, 50, '2024-01-06 07:43:06', '2024-01-06 07:43:06', 1, 0, 27, 4),
(44, 20, '2024-01-06 07:43:06', '2024-01-06 07:43:06', 1, 0, 27, 4),
(45, 50, '2024-01-06 07:43:07', '2024-01-06 07:43:07', 1, 0, 28, 4),
(46, 20, '2024-01-06 07:43:07', '2024-01-06 07:43:07', 1, 0, 28, 4),
(47, 50, '2024-01-06 07:43:08', '2024-01-06 07:43:08', 1, 0, 29, 4),
(48, 20, '2024-01-06 07:43:08', '2024-01-06 07:43:08', 1, 0, 29, 4),
(49, 50, '2024-01-06 07:43:09', '2024-01-06 07:43:09', 1, 0, 30, 4),
(50, 20, '2024-01-06 07:43:09', '2024-01-06 07:43:09', 1, 0, 30, 4),
(51, 10, '2024-01-09 12:46:50', '2024-01-09 12:46:50', 1, 0, 31, 11),
(52, 10, '2024-01-09 12:47:18', '2024-01-09 12:47:18', 1, 0, 32, 11),
(53, 10, '2024-01-11 01:17:45', '2024-01-11 01:17:45', 1, 0, 33, 7),
(54, 10, '2024-01-11 01:17:53', '2024-01-11 01:17:53', 1, 0, 34, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `address`, `telephone`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `active`, `deleted`, `created_at`, `updated_at`) VALUES
(1, '1703159806_658427feca96f.jpeg', 'Admin', 'Negombo', '0762330036', 'admin@gmail.com', NULL, '$2y$10$dy/WUM6qwSbWsY2EhtWSc.kAx3ktWD/inqgRQ2.vS3dB1NFLDq5UO', 'admin', NULL, 1, 0, '2023-12-19 08:30:11', '2023-12-19 08:30:11'),
(2, NULL, 'R.H.K', NULL, NULL, 'hhhh@gmail.com', NULL, '$2y$10$8txdGtGw3lunB.rRcXJGbu7dC6QoyIgXXe6z/2CL6BQWs9.NFiyqS', NULL, NULL, 1, 0, '2024-01-06 01:14:29', '2024-01-06 01:14:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_item`
--
ALTER TABLE `stock_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `stock_item`
--
ALTER TABLE `stock_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
