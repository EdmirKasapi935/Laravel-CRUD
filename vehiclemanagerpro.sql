-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 04:43 PM
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
-- Database: `vehiclemanagerpro`
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
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1726509459),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1726509459;', 1726509459),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:3;', 1726576143),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1726576143;', 1726576143),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1726745213),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1726745213;', 1726745213);

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
(4, '2024_09_04_163537_create_vehicles_table', 1),
(5, '2024_09_10_163836_add_is_admin_to_users', 1);

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
('65X01IrNWqPuF9mgpCZtOFi04JHXupnUl1KeIobF', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQUE1cnVlS25XVXhPc2F0TEFQM2RqUnVyMmhDMVhJT3JDUlgwbnhKSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1726744934),
('uPQPOt7jHoZeX1GPE97xIpVgG7A5YxPNoWTBK0Ta', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclVTU0RmbHZzUkRYSm5xakRoSmxQb0N1R2pvdzdzQzR1QnFDRERFYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1726745368);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, ' Admin', 'test@example.com', '2024-09-15 12:42:41', '$2y$12$Qax33aq.cQlfeR7V5zulnOol7GdoaLadMQFjg4vAQcujMfUOrBsx2', 'KGYuibz6je2vzKnlfkDZgix94K9oI89TKodUPsvXamxPr7Mbpd2Dcgmr75pW', '2024-09-15 12:42:41', '2024-09-15 12:42:41', 1),
(2, 'viper', 'viper@gmail.com', NULL, '$2y$12$F9T3OFbdxGsIfQX5nnzp4uNWA0/Q3I0X1oMMZPDsNp39d9qADfyZm', NULL, '2024-09-15 13:00:28', '2024-09-15 13:00:28', 0),
(3, 'Nolan Grayson', 'omniman@viltrum.com', NULL, '$2y$12$uNZhGZaRqSF5o1WN7elTlOLn.vZ72bVXcOxH31VIS7WS7hZ4xfK02', NULL, '2024-09-16 15:57:49', '2024-09-16 15:57:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `license_plate` varchar(255) NOT NULL,
  `imgsrc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `make`, `model`, `category`, `transmission`, `seats`, `license_plate`, `imgsrc`, `created_at`, `updated_at`) VALUES
(11, 2, 'Skoda', 'Octavia', 'Sedan', 'Automatic', 5, 'XRR-344', 'vehicle_images/IZYOB91VREewdvEWyxc00pCn9jKEikvAq8Y1Zv9x.png', '2024-09-15 16:41:33', '2024-09-19 09:24:35'),
(12, 3, 'nope', 'Octavia', 'Suzuki Swift', 'Automatic', 5, 'finalinputtest', 'vehicle_images/eKlKymACd8XhIg37n3ZuxwZJCdOizAIvZAEWQAJB.png', '2024-09-16 15:59:59', '2024-09-16 15:59:59'),
(13, 3, 'aaaaa', 'Oct', 'Sedan', 'Automatic', 5, 'finalinputtest', 'vehicle_images/e53WeBF1bySXkRyX0wzGg9vhcRENEHjcALNhhaor.png', '2024-09-16 16:06:13', '2024-09-16 16:06:13'),
(14, 3, 'aaaaa', 'Mustang', 'Suzuki Swift', 'Automatic', 4, 'testingnewfield', 'vehicle_images/GCUEFNTTfY0Qq6MpCj4kxpqfJ07ZLXnBkP3UmIca.png', '2024-09-16 16:07:11', '2024-09-16 16:07:11'),
(15, 3, 'aaaaa', 'RAV4', 'Suzuki Swift', 'Automatic', 4, 'finalinputtest', 'vehicle_images/0P6zBMQCDT9NRzFpcNlN3KfhVj5cP2M7jykUu6cI.png', '2024-09-16 16:07:44', '2024-09-16 16:07:44'),
(16, 3, 'adada', 'Octavia', 'Station Wagon', 'Manual', 4, 'testingnewfield', 'vehicle_images/37ORcZPw7SPelBfdEv14aKpTPRdS8KixMYhV2Qil.png', '2024-09-16 16:08:48', '2024-09-17 10:28:32'),
(19, 2, 'iwufoijo', 'qwiofjpokp', 'SUV', 'manual', 1, 'wojifpkolp', 'vehicle_images/4D9SJCUjBA7dFcj929XfqMNhmrJjYcD9oLrOlEGu.png', '2024-09-16 16:11:07', '2024-09-16 16:11:07'),
(20, 2, 'wafawf', 'awfawfa', 'SUV', 'manual', 3, 'awfawf', 'vehicle_images/72NSDHoNrddn7w8LOGbmVoShI5RERUEI6TOrFOCn.png', '2024-09-16 17:04:09', '2024-09-16 17:04:09'),
(21, 2, 'aaaaa', 'Viper', 'Suzuki Swift', 'Automatic', 1, 'testingnewfield', 'vehicle_images/9l5eziWMOnwAJFuYcW3E4u9Vciwld91rhrsQggZo.png', '2024-09-16 17:04:30', '2024-09-16 17:04:30'),
(22, 2, 'Ford', 'RAV4', 'Station Wagon', 'Automatic', 3, 'asca', 'vehicle_images/w0oFrBa7lJEj3mWHblSFqRl2teouoXRF5FhO9qRi.png', '2024-09-16 20:53:13', '2024-09-16 20:53:13'),
(23, 2, 'asgdasdjha', 'asgfsasdh', 'Station Wagon', 'Automatic', 1, 'ASTDHAS', 'vehicle_images/q5lh7r8y7SGRYPvJg3wz2MPoCZZA8QkkltdwJsNo.png', '2024-09-16 21:03:34', '2024-09-16 21:03:34'),
(24, 2, 'sagdhas', 'ASGHA', 'Station Wagon', 'Automatic', 1, 'ASTAT', 'vehicle_images/GkNxfn0CFcbfb3h9oqvsGyUFZkVJ3UBM3t7u9gQw.png', '2024-09-16 21:03:49', '2024-09-16 21:03:49'),
(25, 2, 'Ford', 'qwfqf', 'Suzuki Swift', 'Automatic', 1, 'qwfqwfqwf', 'vehicle_images/4lTOq0ImDgG3Lt4g1GlidiizL1muZGN1SuPrvI13.png', '2024-09-16 21:40:34', '2024-09-16 21:40:34'),
(26, 2, 'aaaaa', 'Octavia', 'SUV', 'Automatic', 1, 'asca', 'vehicle_images/U0l4QRUYd9ScKWl0wgoojoGAKus0pqcgfaYhCtNb.png', '2024-09-17 07:37:04', '2024-09-17 07:37:04'),
(27, 3, 'asgpohr', 'awglaegg', 'Sedan', 'manual', 1, 'wagawgag', 'vehicle_images/FvNPEixfgzqVZTNtUnqjBjNFe7HiskIXmtdTYrbv.png', '2024-09-17 08:04:53', '2024-09-17 08:04:53'),
(28, 3, 'qtqtq', 'qwtqwtqt', 'Suzuki Swift', 'manual', 1, 'qwtqwtq', 'vehicle_images/8uBevbWW1TmmyGyHNLcqz0VnsP69IT4lcuOFtPcP.png', '2024-09-17 08:05:59', '2024-09-17 08:05:59'),
(29, 2, 'Ford', 'asfasga', 'Sedan', 'Automatic', 1, 'asgasgagas', 'vehicle_images/bFvNEYkh7UClkQbLKpwPtJeDYSiK0xlD705IZDMJ.png', '2024-09-17 10:41:52', '2024-09-17 10:41:52'),
(30, 2, 'agsag', 'sagasgasg', 'Sedan', 'manual', 1, 'agasg', 'vehicle_images/mFip9sDDlfp5AVFmhyWRoatNAYY3h1u2oH2SUBCC.png', '2024-09-17 10:43:06', '2024-09-17 10:43:06'),
(31, 2, 'afasf', 'asfafs', 'Suzuki Swift', 'Automatic', 5, 'testingnewfield', 'vehicle_images/jow3aUG4m5tq7I8o8OZAnUAYDOkzWkBaACzqBvUB.png', '2024-09-17 10:50:30', '2024-09-17 10:50:30'),
(32, 2, 'Ford', 'Viper', 'Sedan', 'manual', 7, 'agagsag', 'vehicle_images/CMbym7SgDWp3iOMas9o6XlB0KSrDHFsk7t9zRMqj.png', '2024-09-17 10:53:53', '2024-09-17 10:53:53'),
(33, 2, 'Mercedes-Benz', 'AMG', 'Sedan', 'manual', 5, 'CCC-111', 'vehicle_images/z44sdUAYkiEJeMYv9UB6ZBpZwzjQnEOAiiEpmcFw.png', '2024-09-19 09:26:07', '2024-09-19 09:26:07');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
