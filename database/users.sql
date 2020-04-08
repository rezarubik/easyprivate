-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 04:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyprivate`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socialite_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialite_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_handphone` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `socialite_id`, `socialite_name`, `avatar`, `name`, `email`, `jenis_kelamin`, `tanggal_lahir`, `no_handphone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GiFmPv-D5PpYgTv9BLuiukJyZh7Alo_1ZSyLLFywg', 'Muhammad Reza Pahlevi', 'rezarubik17@gmail.com', 'laki-laki', '1996-04-17', '089501011011', 0, NULL, NULL, 'RvRWGFG4lOCkPQccr9xKdFJgwL043DN3gamgL8ZdviWzrRaNX8YYmgh7ET91', '2020-03-01 09:12:47', '2020-03-25 06:42:31'),
(2, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhS1ETgrm04vNvoOeYgtUWtupkcC3UfxjwI5_tqxQ', 'Muhammad Reza Pahlevi Y', 'muhammad.reza.pahlevi.y@gmail.com', 'laki-laki', '1996-04-17', '089699179002', 1, NULL, NULL, 'knxjo190gT4E6629bM0pvUuoZKmD9xcj4EeEdgjlXqcuNuzpHqQSkbygoYPB', '2020-03-04 03:14:31', '2020-03-04 03:14:31'),
(9, NULL, NULL, 'https://lh3.googleusercontent.com/-9ULkHhZfMFQ/AAAAAAAAAAI/AAAAAAAAAAA/AKF05nAP8MT_SBQZAVN9DUgWtWnOw0OgtA/photo.jpg', 'Nadiah Tsp', 'tspnadiah@gmail.com', 'perempuan', '1998-09-14', '089799179002', 2, NULL, NULL, 'cjhfTyzCys64cLNyjZMu1A1q8nlp6pKwoFLhxT2VJ6q8ZzmilVwKfLDtlSx3', '2020-03-25 08:49:25', '2020-03-25 10:01:24'),
(10, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GgwVwrMPKv_Cl_5p6mO5ov17NyOJehSy7QAgMkH', 'itsliza14', 'lizaconan2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'X1SueeExr1vQrBmVgp78Kv20t4OM6jZFzbAt5bIqtBn0eyZUmnszxGg9R5fH', '2020-03-25 08:50:20', '2020-03-25 08:50:20'),
(11, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhtyWTOVvaJi6svRko32-coNW-yegA8w6k7Ccn0', 'Muhammad Reza Pahlevi Y', 'reza.pahlevi.oa@gmail.com', 'laki-laki', '2020-03-18', '089799129002', 2, NULL, NULL, 'Y9XIIkCVU7uis5dSRroArXQSNymfD3fh4FsWeZG3cOAlGH8OmDXTGi2GVkrU', '2020-03-25 08:50:58', '2020-03-25 09:08:48'),
(12, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GgESZJE3qYF18m9XYY1q5KDYpUe6gJ3QXKjYs8eEA', 'M. Rafi Nugroho', 'mrafiapex96@gmail.com', NULL, NULL, '31531358', 0, NULL, NULL, '3283iyHezaOefbmg2OUkiq8lcyL0C3PZ4YL1f0e32lAR816LrAV1oOnNqEMW', '2020-04-02 07:32:51', '2020-04-02 07:32:51');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
