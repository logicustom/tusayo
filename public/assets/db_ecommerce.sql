-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 21, 2026 at 04:39 AM
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
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `created_us` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_us` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `description`, `views`, `status`, `created_at`, `created_us`, `updated_at`, `updated_us`) VALUES
(1, 'Test1', NULL, '1781660578_2f3f6e423caafec88f60.jpg', 'Sebuah teks deskripsi berfungsi untuk melukiskan atau menggambarkan suatu objek secara terperinci sehingga pembaca seolah-olah dapat melihat, merasakan, dan mengalaminya sendiri2', 0, 'Tidak Aktif', '2026-06-17 01:28:01', '', '2026-06-17 01:42:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Meat', 'meat', 'cat-5.jpg', 1, NULL, '2026-06-15 06:21:49'),
(2, 1, 'Vegetables', 'vegetables', 'cat-3.jpg', 1, NULL, '2026-06-15 06:22:07'),
(3, 0, 'Fruit', 'fruit', '1781504212_772fe773e6ce61b00449.jpg', 1, '2026-06-15 06:16:52', '2026-06-15 06:21:11'),
(4, 0, 'Seafood', 'seafood', '1781504555_727f41e3173e029e6cac.jpg', 1, '2026-06-15 06:22:35', '2026-06-15 06:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT 0.00,
  `shipping_cost` decimal(15,2) DEFAULT 0.00,
  `discount` decimal(15,2) DEFAULT 0.00,
  `grand_total` decimal(15,2) DEFAULT 0.00,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','expired','refund') DEFAULT 'pending',
  `order_status` enum('pending','processed','shipped','completed','cancelled') DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `snap_token` varchar(255) DEFAULT NULL,
  `snap_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `user_id`, `subtotal`, `shipping_cost`, `discount`, `grand_total`, `payment_method`, `payment_status`, `order_status`, `notes`, `created_at`, `updated_at`, `snap_token`, `snap_created_at`) VALUES
(1, 'INV-1780974568', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 03:09:28', '2026-06-09 03:09:28', NULL, NULL),
(2, 'INV-1780976792', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 03:46:32', '2026-06-09 03:46:32', NULL, NULL),
(3, 'INV-1780977745', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'ok', '2026-06-09 04:02:25', '2026-06-09 04:02:25', NULL, NULL),
(4, 'INV-1780979159', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'okk', '2026-06-09 04:25:59', '2026-06-09 04:25:59', NULL, NULL),
(5, 'INV-1780979733', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 04:35:33', '2026-06-09 04:35:33', NULL, NULL),
(6, 'INV-1780980060', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 04:41:00', '2026-06-09 04:41:00', NULL, NULL),
(7, 'INV-1780980909', NULL, 76000.00, 0.00, 0.00, 76000.00, NULL, 'pending', 'pending', 'ok', '2026-06-09 04:55:09', '2026-06-09 04:55:09', NULL, NULL),
(8, 'INV-1780981082', NULL, 76000.00, 0.00, 0.00, 76000.00, NULL, 'paid', 'processed', 'okk', '2026-06-09 04:58:02', '2026-06-09 04:58:13', NULL, NULL),
(9, 'INV-1780981237', NULL, 65000.00, 0.00, 0.00, 65000.00, NULL, 'pending', 'pending', 'okk', '2026-06-09 05:00:37', '2026-06-09 05:00:37', NULL, NULL),
(10, 'INV-1780982446', NULL, 130000.00, 0.00, 0.00, 130000.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 05:20:46', '2026-06-09 05:25:28', '2e02d5fc-f161-4249-82da-fc6ec7afd7ea', '2026-06-09 05:25:28'),
(11, 'INV-1780982870', NULL, 130000.00, 0.00, 0.00, 130000.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 05:27:50', '2026-06-09 05:27:50', '832acf31-bed9-431e-bd9c-63c1a2795d62', '2026-06-09 05:27:50'),
(12, 'INV-1780982893', NULL, 130000.00, 0.00, 0.00, 130000.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 05:28:13', '2026-06-09 05:28:14', '67930683-1a1e-4b0b-8774-9bf4b8a47802', '2026-06-09 05:28:14'),
(13, 'INV-1780983163', NULL, 130000.00, 0.00, 0.00, 130000.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 05:32:43', '2026-06-09 05:32:44', 'f47e61ba-71cc-47b2-8343-13dac143e256', '2026-06-09 05:32:44'),
(14, 'INV-1780983337', NULL, 130000.00, 0.00, 0.00, 130000.00, NULL, 'paid', 'processed', '', '2026-06-09 05:35:37', '2026-06-09 05:36:57', '59161d99-8851-41ee-92ce-5111c16794aa', '2026-06-09 05:35:37'),
(15, 'INV-1780983462', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', '', '2026-06-09 05:37:42', '2026-06-09 05:37:42', 'f97b6981-fd10-497b-b192-a8aa13bea7e3', '2026-06-09 05:37:42'),
(16, 'INV-1780983592', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 05:39:52', '2026-06-09 05:39:53', '1f9509c1-3371-4933-9ccd-6eb1d8b143fc', '2026-06-09 05:39:53'),
(17, 'INV-1780983662', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', '', '2026-06-09 05:41:02', '2026-06-09 05:41:03', '2ec81f58-93d5-4c03-ba9a-62a46da1a969', '2026-06-09 05:41:03'),
(18, 'INV-1780983701', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', '', '2026-06-09 05:41:41', '2026-06-09 05:41:42', '8a66efda-1a0d-49d6-a71f-94bdfc5608d1', '2026-06-09 05:41:42'),
(19, 'INV-1780983769', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', '', '2026-06-09 05:42:49', '2026-06-09 05:42:50', '9661e19e-3a5b-40a8-928b-4360161083b6', '2026-06-09 05:42:50'),
(20, 'INV-1780983908', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', 'Ok', '2026-06-09 05:45:08', '2026-06-09 05:45:08', 'f1d54eb4-7eef-4efa-86a3-36ed46595fef', '2026-06-09 05:45:08'),
(21, 'INV-1780988014', NULL, 70500.00, 0.00, 0.00, 70500.00, NULL, 'pending', 'pending', '', '2026-06-09 06:53:34', '2026-06-09 06:53:36', '3eb2acaf-c4b1-4112-88b0-0afa3451f2f2', '2026-06-09 06:53:36'),
(22, 'INV-1780994166', 1, 135500.00, 0.00, 0.00, 135700.00, NULL, 'pending', 'pending', '', '2026-06-09 08:36:06', '2026-06-12 07:35:09', '2d13f344-9e99-442d-9d1a-fa512ab5490e', '2026-06-12 07:35:09'),
(24, 'INV-1780994189', 1, 135500.00, 0.00, 0.00, 135500.00, NULL, 'pending', 'pending', '', '2026-06-09 08:36:29', '2026-06-09 08:36:31', 'e10dc08d-8f0d-4af7-b46b-6f4f8a4215a2', '2026-06-09 08:36:31'),
(25, 'INV-1780994234', 1, 135500.00, 0.00, 0.00, 135500.00, NULL, 'pending', 'pending', '', '2026-06-09 08:37:14', '2026-06-09 08:37:15', 'e5f7ecf0-a530-4972-8e55-4cd2f73a5b91', '2026-06-09 08:37:15'),
(26, 'INV-1781587483', 1, 65000.00, 0.00, 0.00, 65000.00, NULL, 'paid', 'pending', '', '2026-06-16 05:24:43', '2026-06-16 05:24:46', 'c84d158f-b7a7-4a8f-be9f-90896da6b704', '2026-06-16 05:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(15,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 03:09:28', '2026-06-09 03:09:28'),
(2, 1, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 03:09:28', '2026-06-09 03:09:28'),
(3, 2, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 03:46:32', '2026-06-09 03:46:32'),
(4, 2, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 03:46:32', '2026-06-09 03:46:32'),
(5, 3, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 04:02:25', '2026-06-09 04:02:25'),
(6, 3, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 04:02:25', '2026-06-09 04:02:25'),
(7, 4, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 04:25:59', '2026-06-09 04:25:59'),
(8, 4, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 04:25:59', '2026-06-09 04:25:59'),
(9, 5, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 04:35:33', '2026-06-09 04:35:33'),
(10, 5, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 04:35:33', '2026-06-09 04:35:33'),
(11, 6, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 04:41:00', '2026-06-09 04:41:00'),
(12, 6, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 04:41:00', '2026-06-09 04:41:00'),
(13, 7, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 04:55:09', '2026-06-09 04:55:09'),
(14, 7, 2, 'Sayur Bayam', 5500.00, 2, 11000.00, '2026-06-09 04:55:09', '2026-06-09 04:55:09'),
(15, 8, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 04:58:02', '2026-06-09 04:58:02'),
(16, 8, 2, 'Sayur Bayam', 5500.00, 2, 11000.00, '2026-06-09 04:58:02', '2026-06-09 04:58:02'),
(17, 9, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 05:00:37', '2026-06-09 05:00:37'),
(18, 10, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 05:20:46', '2026-06-09 05:20:46'),
(19, 11, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 05:27:50', '2026-06-09 05:27:50'),
(20, 12, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 05:28:14', '2026-06-09 05:28:14'),
(21, 13, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 05:32:43', '2026-06-09 05:32:43'),
(22, 14, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 05:35:37', '2026-06-09 05:35:37'),
(23, 15, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 05:37:42', '2026-06-09 05:37:42'),
(24, 15, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 05:37:42', '2026-06-09 05:37:42'),
(25, 16, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 05:39:52', '2026-06-09 05:39:52'),
(26, 16, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 05:39:52', '2026-06-09 05:39:52'),
(27, 17, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 05:41:02', '2026-06-09 05:41:02'),
(28, 17, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 05:41:02', '2026-06-09 05:41:02'),
(29, 18, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 05:41:42', '2026-06-09 05:41:42'),
(30, 18, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 05:41:42', '2026-06-09 05:41:42'),
(31, 19, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 05:42:49', '2026-06-09 05:42:49'),
(32, 19, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 05:42:49', '2026-06-09 05:42:49'),
(33, 20, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 05:45:08', '2026-06-09 05:45:08'),
(34, 20, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 05:45:08', '2026-06-09 05:45:08'),
(35, 21, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-09 06:53:34', '2026-06-09 06:53:34'),
(36, 21, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 06:53:34', '2026-06-09 06:53:34'),
(37, 22, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 08:36:06', '2026-06-09 08:36:06'),
(38, 22, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 08:36:06', '2026-06-09 08:36:06'),
(39, 24, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 08:36:29', '2026-06-09 08:36:29'),
(40, 24, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 08:36:29', '2026-06-09 08:36:29'),
(41, 25, 1, 'Daging Sapi', 65000.00, 2, 130000.00, '2026-06-09 08:37:14', '2026-06-09 08:37:14'),
(42, 25, 2, 'Sayur Bayam', 5500.00, 1, 5500.00, '2026-06-09 08:37:14', '2026-06-09 08:37:14'),
(43, 26, 1, 'Daging Sapi', 65000.00, 1, 65000.00, '2026-06-16 05:24:43', '2026-06-16 05:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', 'tentang-kami', '<h3>Tentang Tokoonline</h3>\n\n<p>\nTokoonline adalah platform belanja online yang menyediakan\nbuah, sayuran, daging, seafood, kebutuhan rumah tangga,\ndan produk berkualitas lainnya dengan harga terbaik.\n</p>\n\n<p>\nKami berkomitmen memberikan pengalaman belanja yang mudah,\naman, dan cepat dengan dukungan pembayaran online serta\npengiriman terpercaya.\n</p>\n\n<h4>Visi</h4>\n\n<p>\nMenjadi toko online terpercaya pilihan masyarakat Indonesia.\n</p>\n\n<h4>Misi</h4>\n\n<ul>\n<li>Menyediakan produk berkualitas.</li>\n<li>Memberikan pelayanan terbaik.</li>\n<li>Menghadirkan transaksi yang aman.</li>\n<li>Mendukung UMKM lokal.</li>\n</ul>', NULL, NULL, 1, NULL, NULL),
(2, 'Kebijakan Privasi', 'kebijakan-privasi', '<h3>Kebijakan Privasi</h3>  <p> Kami menghargai privasi pelanggan dan berkomitmen melindungi informasi pribadi yang diberikan kepada Tokoonline. </p>  <ul> <li>Data digunakan untuk proses transaksi.</li> <li>Data tidak dijual kepada pihak ketiga.</li> <li>Pembayaran dilakukan melalui gateway yang aman.</li> <li>Data pelanggan disimpan dengan standar keamanan yang baik.</li> </ul>', NULL, NULL, 1, NULL, NULL),
(3, 'Syarat & Ketentuan', 'syarat-ketentuan', '<h3>Syarat & Ketentuan</h3>  <p> Dengan menggunakan layanan Tokoonline, pengguna dianggap telah membaca dan menyetujui seluruh syarat dan ketentuan. </p>  <ul> <li>Harga dapat berubah sewaktu-waktu.</li> <li>Pesanan diproses setelah pembayaran diterima.</li> <li>Pembatalan mengikuti kebijakan toko.</li> <li>Pelanggaran terhadap ketentuan dapat menyebabkan akun diblokir.</li> </ul>', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_channel` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `raw_response` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `weight` int(4) DEFAULT NULL,
  `stock` int(3) DEFAULT 0,
  `sold` int(3) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `created_us` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_us` varchar(50) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `discount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sku`, `name`, `slug`, `description`, `price`, `weight`, `stock`, `sold`, `image`, `status`, `created_at`, `created_us`, `updated_at`, `updated_us`, `deleted_at`, `discount`) VALUES
(1, 3, 'FRU-00005', 'Daging Sapi', 'daging-sapi', 'asdfasdf', 65000.00, 6, 5, 0, '1781613740_90c18c8346a9beea7aff.webp', 'Aktif', NULL, '', NULL, '', NULL, 10),
(2, 2, '', 'Sayur Bayam', 'sayur-bayam', 'Sayur Bayam 1 ikat', 5500.00, NULL, 0, 0, 'sbayam.jpg', 'Aktif', NULL, '', NULL, '', NULL, 0),
(4, 3, 'SEA-00005', 'Test', 'test', 'A description is a statement, account, or rhetorical mode that paints a mental picture of a place, object, person, or event using words. Its primary purpose is to convey essential qualities, features, or characteristics so the reader or listener can easily recognize or imagine what is being depicted', 6500.00, 0, 5, 0, '1781513478_3a4a94c22d2fda04c690.jpg', 'Aktif', NULL, '', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_logo`, `address`, `phone`, `email`, `facebook`, `instagram`, `youtube`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'Tokoonline', 'logo.png', 'Pasarkemis, Tangerang', '08123456789', 'info@tokoonline.com', 'https://facebook.com/tokoonline', 'https://instagram.com/tokoonline', 'https://youtube.com/tokoonline', '628123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `order_id`, `customer_name`, `email`, `phone`, `address`, `city`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 03:09:28', '2026-06-09 03:09:28'),
(2, 2, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 03:46:32', '2026-06-09 03:46:32'),
(3, 3, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 04:02:25', '2026-06-09 04:02:25'),
(4, 4, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 04:25:59', '2026-06-09 04:25:59'),
(5, 5, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 04:35:33', '2026-06-09 04:35:33'),
(6, 6, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 04:41:00', '2026-06-09 04:41:00'),
(7, 7, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 04:55:09', '2026-06-09 04:55:09'),
(8, 8, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 04:58:02', '2026-06-09 04:58:02'),
(9, 9, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:00:37', '2026-06-09 05:00:37'),
(10, 10, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:20:46', '2026-06-09 05:20:46'),
(11, 11, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:27:50', '2026-06-09 05:27:50'),
(12, 12, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:28:14', '2026-06-09 05:28:14'),
(13, 13, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:32:43', '2026-06-09 05:32:43'),
(14, 14, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:35:37', '2026-06-09 05:35:37'),
(15, 15, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:37:42', '2026-06-09 05:37:42'),
(16, 16, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:39:52', '2026-06-09 05:39:52'),
(17, 17, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:41:02', '2026-06-09 05:41:02'),
(18, 18, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:41:42', '2026-06-09 05:41:42'),
(19, 19, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:42:49', '2026-06-09 05:42:49'),
(20, 20, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 05:45:08', '2026-06-09 05:45:08'),
(21, 21, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 06:53:34', '2026-06-09 06:53:34'),
(22, 22, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 08:36:06', '2026-06-09 08:36:06'),
(23, 24, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 08:36:29', '2026-06-09 08:36:29'),
(24, 25, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-09 08:37:14', '2026-06-09 08:37:14'),
(25, 26, 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', '089647664869', 'Jl. Malabar IV', 'Kota Jakarta Utara', '15138', '2026-06-16 05:24:43', '2026-06-16 05:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `provider` enum('local','google') DEFAULT 'local',
  `status` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `role` enum('customer','admin','superadmin') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `phone`, `password`, `avatar`, `provider`, `status`, `created_at`, `updated_at`, `role`) VALUES
(1, '113403139351840913742', 'Angga Sumardiansyah', 'anggasumardiansyah13@gmail.com', NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocI2N00w4BaUSAp4KsmwWlDItfg8vXOrqBjpf_nYAXQT-ss5Q96u=s96-c', 'google', 1, NULL, NULL, 'customer'),
(2, NULL, 'admin', 'admin@gmail.com', NULL, '$2y$10$PNBVq6njplEmCCTYeevvDOwqFbtqPs2un6INcQ.RPx5aSEpXtgaBG', NULL, 'local', 1, NULL, NULL, 'superadmin'),
(3, NULL, 'test2', 'test2@gmail.com', '12345', '$2y$10$FTpr/lsV4uVxNWJcoXYUb.w.FkhSjcgymLIb82oGjbo99yd9wpHtq', NULL, 'local', 1, '2026-06-18 04:25:39', '2026-06-18 04:36:24', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `receiver_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice` (`invoice`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_payment_status` (`payment_status`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_product_category` (`category_id`),
  ADD KEY `idx_product_slug` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
