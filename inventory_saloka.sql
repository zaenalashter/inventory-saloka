-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 11:03 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_saloka`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storehouse`
--

CREATE TABLE `storehouse` (
  `id` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storehouse`
--

INSERT INTO `storehouse` (`id`, `code`, `name`, `admin`, `location`, `created_at`, `updated_at`) VALUES
(1, 'S-0001', 'Gudang Retail', 'Admin', 'Istana Boneka', '2021-02-21 07:39:54', '2021-02-21 21:47:29'),
(3, 'S-0002', 'Gudang Retail', 'Admin', 'Istana Boneka', '2021-02-21 23:47:57', '2021-02-21 23:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(21) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `code`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'S-0001', 'Fiesta', 822228, 'Salatiga', '2021-02-22 08:46:06', '2021-02-22 08:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE `sys_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_group` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `id_group`, `name`, `segment_name`, `url`, `ord`, `created_at`, `updated_at`) VALUES
(1, 1, 'Menu Group', 'menu-group', 'admin/system-utility/menu-group', 1, '2019-08-19 06:25:24', '2019-08-19 06:25:24'),
(2, 1, 'Menu', 'menu', 'admin/system-utility/menu', 2, '2019-08-19 06:25:24', '2019-08-19 06:25:24'),
(3, 2, 'User Management', 'user-management', 'admin/master-data/user-management', 1, '2019-08-19 06:25:24', '2019-08-19 06:25:24'),
(5, 3, 'Edit Profil', 'edit', 'admin/user-profile/edit', 1, '2019-08-20 02:19:04', '2019-08-20 02:19:04'),
(11, 2, 'Departemen', 'departemen', 'admin/master-data/departemen', 2, '2019-08-22 04:26:55', '2019-08-22 04:26:55'),
(12, 2, 'Sub-Departemen', 'sub-departemen', 'admin/master-data/sub-departemen', 3, '2019-08-22 04:27:21', '2019-08-22 04:27:21'),
(19, 2, 'Karyawan', 'karyawan', 'admin/master-data/karyawan', 4, '2019-09-16 03:02:14', '2019-09-16 03:02:14'),
(26, 6, 'Import Absensi', 'import-absensi', 'admin/payroll/import-absensi', 1, '2020-12-12 10:34:17', '2020-12-12 10:34:17'),
(27, 6, 'Generate Gaji', 'generate-gaji', 'admin/payroll/generate-gaji', 2, '2020-12-16 03:28:06', '2020-12-16 03:28:06'),
(28, 2, 'Karyawan-Detail', 'karyawan-detail', 'admin/master-data/karyawan-detail', 5, '2020-12-16 04:17:55', '2020-12-16 04:17:55'),
(29, 2, 'Periode - Bulan', 'periode-bulan', 'admin/master-data/periode-bulan', 6, '2020-12-17 02:22:57', '2020-12-17 02:22:57'),
(30, 2, 'Periode - Tahun', 'periode-tahun', 'admin/master-data/periode-tahun', 7, '2020-12-17 02:24:38', '2020-12-17 02:24:38'),
(31, 7, 'Laporan Penggajian', 'laporan-penggajian', 'admin/report-payroll/laporan-penggajian', 1, '2020-12-26 01:44:34', '2020-12-26 01:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu_group`
--

CREATE TABLE `sys_menu_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_menu_group`
--

INSERT INTO `sys_menu_group` (`id`, `name`, `segment_name`, `icon`, `ord`, `created_at`, `updated_at`) VALUES
(1, 'System Utility', 'system-utility', 'fas fa-code', 1, '2019-08-19 06:25:24', '2019-08-19 06:25:24'),
(2, 'Master Data', 'master-data', 'fas fa-database', 2, '2019-08-19 06:25:24', '2019-08-19 06:25:24'),
(3, 'User Profile', 'user-profile', 'fas fa-address-card', 4, '2019-08-20 01:52:25', '2019-08-20 01:52:25'),
(6, 'Payroll', 'payroll-data', 'fas fa-money-bill-wave', 3, '2020-12-12 10:32:55', '2020-12-12 10:32:55'),
(7, 'Report Payroll', 'report-payroll', 'fas fa-file-alt', 4, '2020-12-26 01:42:33', '2020-12-26 01:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `sys_permission`
--

CREATE TABLE `sys_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_permission`
--

INSERT INTO `sys_permission` (`id`, `username`, `id_menu`, `created_at`, `updated_at`) VALUES
(438, 'dev', 27, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(437, 'dev', 26, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(436, 'dev', 5, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(435, 'dev', 30, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(434, 'dev', 29, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(433, 'dev', 28, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(432, 'dev', 19, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(431, 'dev', 12, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(430, 'dev', 11, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(429, 'dev', 3, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(428, 'dev', 2, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(427, 'dev', 1, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(450, 'admin_hr', 11, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(449, 'admin_hr', 3, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(448, 'admin', 30, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(447, 'admin', 29, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(446, 'admin', 28, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(445, 'admin', 19, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(444, 'admin', 12, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(443, 'admin', 11, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(442, 'admin', 3, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(441, 'admin', 2, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(440, 'admin', 1, '2020-12-29 00:42:17', '2020-12-29 00:42:17'),
(439, 'dev', 31, '2020-12-26 01:44:47', '2020-12-26 01:44:47'),
(451, 'admin_hr', 12, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(452, 'admin_hr', 19, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(453, 'admin_hr', 28, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(454, 'admin_hr', 29, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(455, 'admin_hr', 30, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(456, 'admin_hr', 5, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(457, 'admin_hr', 26, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(458, 'admin_hr', 27, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(459, 'admin_hr', 31, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(460, 'adminHR', 3, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(461, 'adminHR', 11, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(462, 'adminHR', 12, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(463, 'adminHR', 19, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(464, 'adminHR', 28, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(465, 'adminHR', 29, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(466, 'adminHR', 30, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(467, 'adminHR', 5, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(468, 'adminHR', 26, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(469, 'adminHR', 27, '2020-12-30 01:22:18', '2020-12-30 01:22:18'),
(470, 'adminHR', 31, '2020-12-30 01:22:18', '2020-12-30 01:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE `sys_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL DEFAULT 0,
  `isDel` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`id`, `username`, `password`, `tipe`, `isDel`, `created_at`, `updated_at`) VALUES
(12, 'dev', 'eyJpdiI6InIrMUphUmlOVUZkUGluaVQ5d21sQnc9PSIsInZhbHVlIjoiV09tT2RrSHh5cmw3OFFCRFNJaGlRZz09IiwibWFjIjoiMzE2ZDdkNjIyODhiYThjMDExZTFmNWY4OWNiMzQ1NmM1MjhhMGE5ZjUzNjNjOGM4MzZlZDIyZGE4OGQ4ZWU0ZSJ9', 0, 0, '2020-12-16 23:47:08', '2020-12-16 23:47:08'),
(13, 'admin', 'eyJpdiI6ImdxTkFxK1pLbDViU3luKzIyTmxxZGc9PSIsInZhbHVlIjoiK1B5eGoxWUtXSWpsejFNQzZwSzFOQT09IiwibWFjIjoiYmQ0OWQ5YmIwY2RjZDBmYzQ4OGNlMmI1MTgwZWM1OTViN2JmNGJiNzYyYTcxNTg1ZmMyMDk4N2Y1MmY2N2E4ZCJ9', 0, 0, '2020-12-23 01:08:07', '2020-12-23 01:08:07'),
(14, 'admin_hr', 'eyJpdiI6IjRWbEtQejV4MWJ4c2lKWmRURlFnN0E9PSIsInZhbHVlIjoienVzaHhWR29ZOXMxWFdzcTQybWVKQT09IiwibWFjIjoiNGJkYzJjNmU1Y2QxZGM2YWVkMTY5MjU5ZGUzNGM3ZjYzOWEyZjA1NTUzNzFmNWU2MDY5MGI1NWZiOTYzYTViYiJ9', 0, 0, '2020-12-30 01:21:51', '2020-12-30 01:21:51'),
(15, 'adminHR', 'eyJpdiI6ImRQVkFOOEtRWlN1UDB3SFAvanNSdUE9PSIsInZhbHVlIjoiVmNGeWlYdUpsOHM2L3lZR3l4SzlGZz09IiwibWFjIjoiNzg4MDg4NDI3MjMyMjM4ZmY1MzhhMmVkMGVmZWEzYjQ1NTczYWFkNzczZGM3YzY2ZjI5Zjk0N2E3NTE3MTgwMiJ9', 0, 0, '2020-12-30 01:22:18', '2020-12-30 01:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_profile`
--

CREATE TABLE `sys_user_profile` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `full_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_user_profile`
--

INSERT INTO `sys_user_profile` (`id`, `username`, `full_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin Saloka', '-', '00987654', '2020-12-09 02:03:41', '2020-12-09 02:03:41'),
(5, 'dev', 'Developer', 'dev@gmail.com', '0000', '2020-12-16 23:47:08', '2020-12-16 23:47:08'),
(6, 'admin', 'Admin HRIS Saloka', 'admin@salokapark.com', '0', '2020-12-23 01:08:08', '2020-12-23 01:08:08'),
(7, 'adminHR', 'admin HR', 'adminHR@gmai.com', '09876', '2020-12-30 01:22:18', '2020-12-30 01:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','user','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'saloka', 'saloka@gmail.com', 'hohoho', 'admin', '2021-02-21 03:18:13', '2021-02-21 03:18:13'),
(3, 'CHECK IT', 'check@gmail.com', 'hihihi', 'user', '2021-02-20 21:35:22', '2021-02-20 23:20:10'),
(4, 'pos arkana1', 'salokapark@gmail.com', 'hohohoho', 'user', '2021-02-20 23:47:51', '2021-02-20 23:48:18'),
(5, 'Gudang Retail', 'check@gmail.com', '343443434', 'user', '2021-02-21 23:42:28', '2021-02-21 23:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `name`, `code`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Saloka1', 'S-0002', 'admin/user-config/menu', '2021-02-22 04:21:52', '2021-02-21 21:21:52'),
(11, 'Saloka1', 'S-0003', 'admin/', '2021-02-20 23:51:23', '2021-02-20 23:51:23'),
(12, 'CHECK IT', 'S-0001', 'admin/22', '2021-02-21 23:46:12', '2021-02-21 23:46:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `storehouse`
--
ALTER TABLE `storehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu_group`
--
ALTER TABLE `sys_menu_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_permission`
--
ALTER TABLE `sys_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_user_profile`
--
ALTER TABLE `sys_user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storehouse`
--
ALTER TABLE `storehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sys_menu_group`
--
ALTER TABLE `sys_menu_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sys_permission`
--
ALTER TABLE `sys_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sys_user_profile`
--
ALTER TABLE `sys_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
