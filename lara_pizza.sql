-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 10:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_pizza`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_14_141517_create_pizzas_table', 1),
(6, '2024_02_14_141640_create_toppings_table', 1),
(7, '2024_02_14_181744_create_pizza_attributes_table', 1);

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
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `listed_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `type`, `image`, `listed_by`, `created_at`, `updated_at`) VALUES
(1, 'Farmhouse', 'farmhouse.jpg', 1, '2024-02-15 03:09:15', NULL),
(2, 'Margarita', 'margarita.jpg', 1, '2024-02-15 03:09:15', NULL),
(3, 'Peppy Paneer', 'peppy_paneer.jpg', 1, '2024-02-15 03:09:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pizza_attributes`
--

CREATE TABLE `pizza_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pizza_id` bigint(20) UNSIGNED NOT NULL,
  `size` enum('small','medium','large') NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizza_attributes`
--

INSERT INTO `pizza_attributes` (`id`, `pizza_id`, `size`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'small', '466.00', '2024-02-15 03:09:26', NULL),
(2, 1, 'medium', '720.00', '2024-02-15 03:09:26', NULL),
(3, 1, 'large', '821.00', '2024-02-15 03:09:26', NULL),
(4, 2, 'small', '321.00', '2024-02-15 03:09:26', NULL),
(5, 2, 'medium', '650.00', '2024-02-15 03:09:26', NULL),
(6, 2, 'large', '723.00', '2024-02-15 03:09:26', NULL),
(7, 3, 'small', '430.00', '2024-02-15 03:09:26', NULL),
(8, 3, 'medium', '520.00', '2024-02-15 03:09:26', NULL),
(9, 3, 'large', '670.00', '2024-02-15 03:09:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `size` enum('small','medium','large') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `name`, `price`, `size`, `created_at`, `updated_at`) VALUES
(1, 'extra cheese', '150.00', 'small', '2024-02-15 03:09:38', NULL),
(2, 'jalapenos', '191.00', 'small', '2024-02-15 03:09:38', NULL),
(3, 'sweet corns', '190.00', 'small', '2024-02-15 03:09:38', NULL),
(4, 'extra veggies', '160.00', 'small', '2024-02-15 03:09:38', NULL),
(5, 'extra cheese', '160.00', 'medium', '2024-02-15 03:09:38', NULL),
(6, 'jalapenos', '205.00', 'medium', '2024-02-15 03:09:38', NULL),
(7, 'sweet corns', '200.00', 'medium', '2024-02-15 03:09:38', NULL),
(8, 'extra veggies', '175.00', 'medium', '2024-02-15 03:09:38', NULL),
(9, 'extra cheese', '175.00', 'large', '2024-02-15 03:09:38', NULL),
(10, 'jalapenos', '220.00', 'large', '2024-02-15 03:09:38', NULL),
(11, 'sweet corns', '210.00', 'large', '2024-02-15 03:09:38', NULL),
(12, 'extra veggies', '180.00', 'large', '2024-02-15 03:09:38', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pradeep Karn', 'mail2pkarn@gmail.com', NULL, '$2y$12$Yy3q5s/VpMNcCB8Xe91R2.NuIAEGVKvCm9NwanAZ30XwIBnKkYHje', NULL, '2024-02-15 03:08:19', NULL),
(2, 'Suresh Jain', 'pkarn@live.in', NULL, '$2y$12$PH4Ir/Uk3aoKW0.Ym6UD0eA5L3.LTE5AUs2nq8Ch8j/1LL0Ggr0Sa', NULL, '2024-02-15 03:08:19', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizzas_listed_by_foreign` (`listed_by`);

--
-- Indexes for table `pizza_attributes`
--
ALTER TABLE `pizza_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_attributes_pizza_id_foreign` (`pizza_id`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pizza_attributes`
--
ALTER TABLE `pizza_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD CONSTRAINT `pizzas_listed_by_foreign` FOREIGN KEY (`listed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pizza_attributes`
--
ALTER TABLE `pizza_attributes`
  ADD CONSTRAINT `pizza_attributes_pizza_id_foreign` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
