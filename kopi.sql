-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2026 at 09:18 AM
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
-- Database: `kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-575c80c478bbada23bd8e976d5f1e477', 'i:1;', 1771782050),
('laravel-cache-575c80c478bbada23bd8e976d5f1e477:timer', 'i:1771782050;', 1771782050),
('laravel-cache-5fcbf7e5accb8756f5f4956c7199437c', 'i:2;', 1772993194),
('laravel-cache-5fcbf7e5accb8756f5f4956c7199437c:timer', 'i:1772993194;', 1772993194),
('laravel-cache-665b3f76659044fa848b5154eb87c9d3', 'i:1;', 1771043302),
('laravel-cache-665b3f76659044fa848b5154eb87c9d3:timer', 'i:1771043302;', 1771043302),
('laravel-cache-6765c0ca7c4fd46f5f9f03563f0c3f36', 'i:1;', 1775582610),
('laravel-cache-6765c0ca7c4fd46f5f9f03563f0c3f36:timer', 'i:1775582610;', 1775582610),
('laravel-cache-745cf60275fa7f3350d60d8a4cb0da39', 'i:1;', 1776933723),
('laravel-cache-745cf60275fa7f3350d60d8a4cb0da39:timer', 'i:1776933723;', 1776933723),
('laravel-cache-7632abc4e6b28d7f20453e2f5a70494e', 'i:1;', 1772484201),
('laravel-cache-7632abc4e6b28d7f20453e2f5a70494e:timer', 'i:1772484201;', 1772484201),
('laravel-cache-7f859d80ebc7d00c9a079cb77c72876d', 'i:1;', 1771034195),
('laravel-cache-7f859d80ebc7d00c9a079cb77c72876d:timer', 'i:1771034195;', 1771034195),
('laravel-cache-8c041c90e79870c6806bdded905a6eb1', 'i:2;', 1771747437),
('laravel-cache-8c041c90e79870c6806bdded905a6eb1:timer', 'i:1771747437;', 1771747437),
('laravel-cache-a1a1af8b87eb58095693292c48aedd8a', 'i:1;', 1773063331),
('laravel-cache-a1a1af8b87eb58095693292c48aedd8a:timer', 'i:1773063331;', 1773063331),
('laravel-cache-a5a3cf5facffa30220531e1f7b6d061b', 'i:1;', 1772986390),
('laravel-cache-a5a3cf5facffa30220531e1f7b6d061b:timer', 'i:1772986390;', 1772986390),
('laravel-cache-adddhj@gmai|127.0.0.1', 'i:1;', 1773063269),
('laravel-cache-adddhj@gmai|127.0.0.1:timer', 'i:1773063269;', 1773063269),
('laravel-cache-admin@kop|127.0.0.1', 'i:1;', 1773063331),
('laravel-cache-admin@kop|127.0.0.1:timer', 'i:1773063331;', 1773063331),
('laravel-cache-adminaa@kopi.com|127.0.0.1', 'i:1;', 1772986390),
('laravel-cache-adminaa@kopi.com|127.0.0.1:timer', 'i:1772986390;', 1772986390),
('laravel-cache-ae1f6540e0dc7263ff2383f66efe4efa', 'i:1;', 1772438570),
('laravel-cache-ae1f6540e0dc7263ff2383f66efe4efa:timer', 'i:1772438570;', 1772438570),
('laravel-cache-d1f8ed0784495689a57134754cfcbe30', 'i:1;', 1776931800),
('laravel-cache-d1f8ed0784495689a57134754cfcbe30:timer', 'i:1776931800;', 1776931800),
('laravel-cache-e9a629a4011c99ff17fe9ab470fb38c5', 'i:1;', 1770817821),
('laravel-cache-e9a629a4011c99ff17fe9ab470fb38c5:timer', 'i:1770817821;', 1770817821),
('laravel-cache-f5016fe543fc2bbba8cd7bba32e9c7b9', 'i:1;', 1772484188),
('laravel-cache-f5016fe543fc2bbba8cd7bba32e9c7b9:timer', 'i:1772484188;', 1772484188),
('laravel-cache-feb6f02e724a638393a8dfb27b95a8d8', 'i:1;', 1773063268),
('laravel-cache-feb6f02e724a638393a8dfb27b95a8d8:timer', 'i:1773063268;', 1773063268),
('laravel-cache-iqbalkurnia831@gmail.com|127.0.0.1', 'i:1;', 1771034198),
('laravel-cache-iqbalkurnia831@gmail.com|127.0.0.1:timer', 'i:1771034198;', 1771034198),
('laravel-cache-uyuwyuwe2@gmail.com|127.0.0.1', 'i:1;', 1772438570),
('laravel-cache-uyuwyuwe2@gmail.com|127.0.0.1:timer', 'i:1772438570;', 1772438570);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kopis`
--

CREATE TABLE `kopis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) NOT NULL DEFAULT 'kg',
  `stok` int(11) NOT NULL DEFAULT 0,
  `stok_minimum` int(11) NOT NULL DEFAULT 10,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kopis`
--

INSERT INTO `kopis` (`id`, `kode`, `nama`, `jenis`, `asal`, `satuan`, `stok`, `stok_minimum`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(31, 'KP-01', 'Robusta Kerinci', 'Robusta', 'Kerinci', 'kg', 1050, 300, 1, NULL, '2026-05-14 01:37:16', '2026-05-22 11:32:17'),
(32, 'KP-02', 'Arabika Kerinci', 'Arabica', 'Kerinci', 'kg', 150, 300, 1, NULL, '2026-05-14 01:37:50', '2026-05-22 11:36:52');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_02_075243_add_two_factor_columns_to_users_table', 1),
(5, '2026_01_15_043504_add_role_to_users_table', 2),
(6, '2026_01_21_124502_create_kopis_table', 3),
(7, '2026_01_21_125734_create_stok_masuks_table', 4),
(8, '2026_01_21_125809_create_stok_keluars_table', 4),
(9, '2026_01_22_014315_create_suppliers_table', 5),
(10, '2026_02_03_054028_add_supplier_id_to_stok_masuks_table', 6),
(11, '2026_02_03_093429_add_supplier_id_to_stok_keluars_table', 7),
(12, '2026_02_11_131549_add_sumber_fields_to_stok_masuks_table', 8),
(13, '2026_04_23_082134_add_harga_to_stok_masuk_table', 9),
(14, '2026_04_23_083401_add_harga_to_stok_keluars_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kKvxnlaRn0Y7ma8QPJifYDraS2xcXoyNOyOMJPVg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSHlqbjNhMDhxQ1VvbGs3Z2F6WkJWU0FJekZsZ3dlV1R1YzdIMTgzOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXBvcmFuIjtzOjU6InJvdXRlIjtzOjEzOiJsYXBvcmFuLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1776933832),
('Li2SCPWU1XNcitsnigEUCj37bFQ2MShiIehFZcej', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHlYaTA3dWdYUXg0dTlRWVpxaDVsRUZsbld1T0VJNTA1M0taaDNtUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776928723);

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluars`
--

CREATE TABLE `stok_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kopi_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_perkilo` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tujuan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_keluars`
--

INSERT INTO `stok_keluars` (`id`, `kopi_id`, `tanggal`, `jumlah`, `harga_perkilo`, `total`, `tujuan`, `keterangan`, `created_at`, `updated_at`, `supplier_id`) VALUES
(46, 31, '2026-04-16 15:10:00', 1500, 63000.00, 94500000.00, 'pasar domestik', 'pengiriman kopi robusta ke lampung', '2026-05-14 02:08:04', '2026-05-22 11:32:17', NULL),
(47, 32, '2026-05-20 09:08:00', 1250, 64000.00, 80000000.00, 'pasar domestik', 'pengiriman kopi arabika ke jakarta', '2026-05-14 02:09:47', '2026-05-22 11:32:02', NULL),
(69, 31, '2026-05-21 17:30:00', 5000, 67000.00, 335000000.00, 'ekspor', 'pengiriman kopi robusta untuk ekpor ke mesir', '2026-05-21 18:58:04', '2026-05-22 11:16:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuks`
--

CREATE TABLE `stok_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kopi_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_perkilo` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sumber_type` varchar(255) NOT NULL,
  `sumber_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_masuks`
--

INSERT INTO `stok_masuks` (`id`, `kopi_id`, `tanggal`, `jumlah`, `harga_perkilo`, `total`, `keterangan`, `created_at`, `updated_at`, `supplier_id`, `sumber_type`, `sumber_nama`) VALUES
(74, 31, '2026-03-14 15:39:00', 100, 55000.00, 5500000.00, 'pembelian kopi dari petani lokal', '2026-05-14 01:40:00', '2026-05-14 01:40:00', NULL, 'lainnya', 'pak budi'),
(75, 31, '2026-03-24 15:43:00', 450, 55000.00, 24750000.00, 'pembelian kopi dari supplier pt', '2026-05-14 01:44:33', '2026-05-14 02:31:26', 8, 'supplier', NULL),
(76, 31, '2026-04-16 15:45:00', 200, 53000.00, 10600000.00, 'pembelian kopi dari petani lokal', '2026-05-14 01:46:14', '2026-05-14 01:46:14', NULL, 'lainnya', 'ahmad'),
(77, 31, '2026-04-16 15:46:00', 150, 53000.00, 7950000.00, 'pembelian kopi dari petani lokal', '2026-05-14 01:47:13', '2026-05-14 01:47:13', NULL, 'lainnya', 'joko'),
(78, 31, '2026-05-10 15:49:00', 500, 54000.00, 27000000.00, 'pembelian kopi dari supplier pt', '2026-05-14 01:49:48', '2026-05-22 11:03:14', 13, 'supplier', NULL),
(79, 31, '2026-04-14 16:33:00', 50, 53000.00, 2650000.00, 'pembelian kopi dari petani lokal', '2026-05-14 01:50:25', '2026-05-14 02:33:33', NULL, 'lainnya', 'pak budi'),
(80, 31, '2026-05-13 15:50:00', 200, 53000.00, 10600000.00, 'pembelian kopi dari pak ahmad', '2026-05-14 01:51:06', '2026-05-14 01:51:21', NULL, 'lainnya', 'pak ahmad'),
(81, 32, '2026-05-08 15:51:00', 150, 55000.00, 8250000.00, 'pembelian kopi arabika dari petani lokal', '2026-05-14 01:53:39', '2026-05-22 11:05:44', NULL, 'lainnya', 'pak anwar'),
(82, 31, '2026-05-14 15:54:00', 600, 55000.00, 33000000.00, 'pembelian kopi robusta dari supplier ', '2026-05-14 01:55:17', '2026-05-22 11:10:10', 6, 'supplier', NULL),
(83, 31, '2026-05-14 15:55:00', 200, 54000.00, 10800000.00, 'pembelian kopi dari petani lokal', '2026-05-14 01:56:19', '2026-05-14 01:56:19', NULL, 'lainnya', 'pak ahmad'),
(89, 32, '2026-05-19 07:09:00', 200, 54000.00, 10800000.00, 'pembalian kopi arabika dari petani lokal', '2026-05-18 18:54:52', '2026-05-22 11:36:52', NULL, 'lainnya', 'pak budi'),
(90, 31, '2026-05-01 01:40:00', 600, 54000.00, 32400000.00, 'kualitas kopi robustanya bagus', '2026-05-21 18:41:14', '2026-05-21 18:41:14', 13, 'supplier', NULL),
(91, 31, '2026-05-13 10:42:00', 200, 53000.00, 10600000.00, 'kualitas kopi robustanya cukup bagus', '2026-05-21 18:43:11', '2026-05-21 18:43:11', NULL, 'lainnya', 'pak kepin'),
(92, 31, '2026-05-05 12:43:00', 500, 54000.00, 27000000.00, 'kualitas kopi bagus', '2026-05-21 18:44:22', '2026-05-21 18:44:22', 8, 'supplier', NULL),
(93, 31, '2026-05-01 15:44:00', 250, 53000.00, 13250000.00, 'kualitas kopi robustanya bagus', '2026-05-21 18:46:33', '2026-05-21 18:46:33', NULL, 'lainnya', 'pak reza'),
(94, 31, '2026-05-04 16:46:00', 500, 54000.00, 27000000.00, 'kualitas kopinya bagus', '2026-05-21 18:47:26', '2026-05-21 18:47:26', 8, 'supplier', NULL),
(95, 31, '2026-04-22 01:47:00', 500, 54000.00, 27000000.00, 'kualitas kopinya bagus', '2026-05-21 18:49:03', '2026-05-21 18:49:03', 6, 'supplier', NULL),
(96, 31, '2026-05-04 11:49:00', 250, 54000.00, 13500000.00, 'kualitas kopinya bagus', '2026-05-21 18:50:07', '2026-05-21 18:50:07', NULL, 'lainnya', 'pak reno'),
(97, 31, '2026-05-15 16:50:00', 200, 53000.00, 10600000.00, 'kualitas kopinya cukup bagus ', '2026-05-21 18:51:05', '2026-05-21 18:51:05', NULL, 'lainnya', 'pak budi'),
(98, 31, '2026-04-14 17:42:00', 300, 53000.00, 15900000.00, 'kualitas kopinya bagus', '2026-05-22 10:44:24', '2026-05-22 10:44:24', NULL, 'lainnya', 'pak rizki'),
(99, 31, '2026-05-01 17:44:00', 300, 53000.00, 15900000.00, 'kualitas kopi cukup baik', '2026-05-22 10:45:35', '2026-05-22 10:45:35', NULL, 'lainnya', 'pak taufik'),
(100, 31, '2026-05-05 17:46:00', 300, 54000.00, 16200000.00, 'kualitas kopinya bagus', '2026-05-22 10:47:10', '2026-05-22 10:47:32', NULL, 'lainnya', 'pak joko'),
(101, 31, '2026-05-22 10:48:00', 200, 54000.00, 10800000.00, 'kualitas biji kopinya bagus', '2026-05-22 10:49:05', '2026-05-22 11:00:41', NULL, 'lainnya', 'pak ahmad'),
(102, 32, '2026-05-14 17:49:00', 500, 55000.00, 27500000.00, 'pembelian kopi arabika dari supplier', '2026-05-22 10:50:20', '2026-05-22 11:34:36', 16, 'supplier', NULL),
(103, 31, '2026-04-15 17:51:00', 500, 54000.00, 27000000.00, 'pembelian kopi dari supplier', '2026-05-22 10:51:48', '2026-05-22 10:51:48', 13, 'supplier', NULL),
(104, 31, '2026-05-02 18:01:00', 500, 54000.00, 27000000.00, 'pembelian kopi robusta dari supplier ', '2026-05-22 11:02:47', '2026-05-22 11:02:47', 8, 'supplier', NULL),
(105, 32, '2026-05-22 18:07:00', 300, 54000.00, 16200000.00, 'kualitas biji kopinya bagus', '2026-05-22 11:08:06', '2026-05-22 11:08:06', NULL, 'lainnya', 'pak budi'),
(106, 32, '2026-05-05 18:29:00', 250, 54000.00, 13500000.00, 'kondisi biji kopi arabika cukup bagus', '2026-05-22 11:30:02', '2026-05-22 11:30:02', NULL, 'lainnya', 'pak rozi');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama`, `alamat`, `email`, `telepon`, `keterangan`, `created_at`, `updated_at`) VALUES
(6, 'PT Alko Sumatra Kopi', 'Kerinci', 'alkokopi21@gmail.com', '081347548585', 'Supplier Kopi Robusta', '2026-02-21 10:42:56', '2026-05-21 18:33:52'),
(7, 'PT Inisiatif Inti Indonesia', 'Jambi', 'insiatifkopii@gmail.com', '08343446446', 'Supplier Kopi Arabika ', '2026-02-21 10:45:29', '2026-03-02 03:37:44'),
(8, 'PT Sejahtera Kerinci', 'Kerinci', 'sejahtera@gmail.com', '0836546456', 'Supplier Kopi Robusta', '2026-02-21 10:46:52', '2026-02-21 10:46:52'),
(13, 'PT Amanah Kopi Sejahtera', 'Kerinci', 'sejahtera@gmail.com', '083253436473', 'Supllier kopi robusta', '2026-03-02 02:20:52', '2026-05-21 18:34:54'),
(16, 'CV. Amanah Kopi', 'Kerinci', 'amanahkopi@gmail.com', '08236345343', 'Supplier kopi robusta', '2026-03-08 09:04:00', '2026-05-21 18:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staf_gudang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@kopi.com', NULL, '$2y$12$cUV95C6JUAF1Ev2u5zc/vOtBzyti5bbbxgC8xdUsr88ZYV/klAOzy', NULL, NULL, NULL, 'TjcIOj0tbALfmO7CVCpDYryOKHAMRMwL2hZgKEatLHsShekvZIlPLoN3DkIp', '2026-01-14 21:39:09', '2026-05-18 10:31:52', 'admin'),
(14, 'Ilham', 'ilham@gmail.com', NULL, '$2y$12$3J/YzIiRL7j2r8cqBzuh5u7MeZCRor2Fzzu2mypUyjBXh1/zBEQXq', NULL, NULL, NULL, 'IwD4r9GJOOmPQtaWj6LfT1ekQX5FTsiIEq6yR9PsvMedOpvn13RtozbYNmrQ', '2026-05-14 04:23:44', '2026-05-21 19:04:14', 'staf_gudang'),
(15, 'Petugas', 'gudang@gmail.com', NULL, '$2y$12$9UbizOWaYbN6C6/xLAj2sOc.wA8nukqUdg0SLSpmrz7ncWWxwpRR.', NULL, NULL, NULL, NULL, '2026-05-14 06:20:55', '2026-05-14 06:21:13', 'staf_gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kopis`
--
ALTER TABLE `kopis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kopis_kode_unique` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stok_keluars`
--
ALTER TABLE `stok_keluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_keluars_kopi_id_foreign` (`kopi_id`),
  ADD KEY `stok_keluars_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `stok_masuks`
--
ALTER TABLE `stok_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_masuks_kopi_id_foreign` (`kopi_id`),
  ADD KEY `stok_masuks_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kopis`
--
ALTER TABLE `kopis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stok_keluars`
--
ALTER TABLE `stok_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `stok_masuks`
--
ALTER TABLE `stok_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stok_keluars`
--
ALTER TABLE `stok_keluars`
  ADD CONSTRAINT `stok_keluars_kopi_id_foreign` FOREIGN KEY (`kopi_id`) REFERENCES `kopis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stok_keluars_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `stok_masuks`
--
ALTER TABLE `stok_masuks`
  ADD CONSTRAINT `stok_masuks_kopi_id_foreign` FOREIGN KEY (`kopi_id`) REFERENCES `kopis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stok_masuks_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
