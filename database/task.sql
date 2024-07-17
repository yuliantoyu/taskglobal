-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 07:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_penerimaan_barang` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat_jalan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `karat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_real` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_kotor` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_berat_real` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_berat_kotor` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_timbangan` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selisih` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_pembayaran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jatuh_tempo` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengirim` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `file`, `no_penerimaan_barang`, `no_surat_jalan`, `supplier_id`, `tanggal`, `karat`, `berat_real`, `berat_kotor`, `total_berat_real`, `total_berat_kotor`, `berat_timbangan`, `selisih`, `catatan`, `tipe_pembayaran`, `harga_beli`, `jatuh_tempo`, `nama_pengirim`, `pic`, `created_at`, `updated_at`) VALUES
(60, 'barang_masuk/kqHohc0NurCu1gGLGnxqq5kHIGUdQmD29mtET96i.png', 'PO-00001', '343545', '1', '2024-07-17', '[\"Karat1\"]', '[\"1\"]', '[\"1\"]', '1', '1', '1', '0', 'catatan1', 'Lunas', '7000', NULL, 'agung', 'Administrator', '2024-07-17 10:11:02', '2024-07-17 10:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `karat`
--

CREATE TABLE `karat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karat`
--

INSERT INTO `karat` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Karat 1', NULL, NULL),
(2, 'Karat 2', NULL, NULL),
(3, 'Karat 3', NULL, NULL),
(4, 'Karat 4', NULL, NULL),
(5, 'Karat 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_07_17_012055_create_barang_masuk_table', 1),
(2, '2024_07_17_155628_create_karat_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Supplier 1', 'supplier1@example.com', '1234567890', 'Address 1', '2024-07-16 19:42:28', '2024-07-16 19:42:28'),
(2, 'Supplier 2', 'supplier2@example.com', '0987654321', 'Address 2', '2024-07-16 19:42:29', '2024-07-16 19:42:29'),
(3, 'Supplier 3', 'supplier3@example.com', '1122334455', 'Address 3', '2024-07-16 19:42:29', '2024-07-16 19:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@example.com', NULL, '$2y$10$YVIl47QEHUM6i1.UoT5le.iQXeC4r9ggRPb5zy/.m0Vz8HnOb47yK', NULL, '2024-07-17 07:56:36', '2024-07-17 07:56:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karat`
--
ALTER TABLE `karat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `karat`
--
ALTER TABLE `karat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
