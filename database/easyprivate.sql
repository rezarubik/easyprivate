-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 06:03 PM
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
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_jadwal_ajar` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `waktu_absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_jadwal_ajar`, `id_pemesanan`, `waktu_absen`) VALUES
(1, 1, 1, '2020-03-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `alamat_lengkap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `latitude`, `longitude`, `alamat_lengkap`) VALUES
(1, 2, -6.23884, 106.912, 'Jl. Teluk Langsa 4 Blok C.8 No.4'),
(8, 1, -6.23884, 106.912, 'Jl. Teluk Langsa 4 Blok C.8 No.4'),
(9, 11, -6.23884, 106.912, 'Jl. Teluk Langsa 4 Blok C.8 No.4'),
(10, 9, -6.23884, 106.912, 'Jl. Teluk Langsa 4 Blok C.8 No.4'),
(11, 9, -6.23884, 106.912, 'Jl. Teluk Langsa 4 Blok C.8 No.4');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru_mapel`
--

INSERT INTO `guru_mapel` (`id_guru_mapel`, `id_guru`, `id_mapel`) VALUES
(1, 3, 1),
(17, 1, 1),
(18, 1, 1),
(19, 1, 2),
(20, 11, 1),
(21, 11, 1),
(22, 11, 2),
(23, 9, 1),
(24, 9, 1),
(25, 9, 2),
(26, 9, 1),
(27, 9, 1),
(28, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ajar`
--

CREATE TABLE `jadwal_ajar` (
  `id_jadwal_ajar` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `waktu_ajar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_ajar`
--

INSERT INTO `jadwal_ajar` (`id_jadwal_ajar`, `id_pemesanan`, `waktu_ajar`) VALUES
(1, 1, '2020-03-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(50) NOT NULL,
  `harga_per_pertemuan` int(11) NOT NULL,
  `upah_guru_per_pertemuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `harga_per_pertemuan`, `upah_guru_per_pertemuan`) VALUES
(1, 'SD', 120000, 90000),
(2, 'SMP', 170000, 140000),
(3, 'SMA', 200000, 170000);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `id_jenjang`, `nama_mapel`) VALUES
(1, 1, 'Matematika SD'),
(2, 2, 'Matematika SMP'),
(3, 3, 'Matematika SMA');

-- --------------------------------------------------------

--
-- Table structure for table `microteaching`
--

CREATE TABLE `microteaching` (
  `id_microteaching` int(11) NOT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL,
  `dir_video` varchar(255) DEFAULT NULL,
  `volume_artikulasi_suara` int(11) DEFAULT NULL,
  `keefektifan_kalimat` int(11) DEFAULT NULL,
  `cara_mengajar` int(11) DEFAULT NULL,
  `penguasaan_materi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `microteaching`
--

INSERT INTO `microteaching` (`id_microteaching`, `id_pendaftaran`, `dir_video`, `volume_artikulasi_suara`, `keefektifan_kalimat`, `cara_mengajar`, `penguasaan_materi`) VALUES
(1, 1, '', 2, 3, 4, 5),
(3, NULL, 'KTP.pdf', NULL, NULL, NULL, NULL),
(4, 5, 'KTP.pdf', NULL, NULL, NULL, NULL),
(5, 6, 'KTP.pdf', NULL, NULL, NULL, NULL),
(6, 7, 'KTP.pdf', NULL, NULL, NULL, NULL),
(7, 8, 'KTP.pdf', NULL, NULL, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_01_155211_add_field_socialite_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_tagihan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `status`, `tanggal_bayar`, `tanggal_tagihan`) VALUES
(1, 1, 0, '2020-03-15', '2020-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `jumlah_pertemuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_guru`, `id_murid`, `id_mapel`, `waktu_pemesanan`, `status`, `jumlah_pertemuan`) VALUES
(1, 3, 2, 1, '2020-03-16 00:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_guru`
--

CREATE TABLE `pendaftaran_guru` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dir_cv` varchar(255) DEFAULT NULL,
  `pm_gap_score` int(11) DEFAULT NULL,
  `pm_result` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pengalaman_mengajar` int(11) DEFAULT NULL,
  `nilai_ipk` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran_guru`
--

INSERT INTO `pendaftaran_guru` (`id_pendaftaran`, `id_user`, `dir_cv`, `pm_gap_score`, `pm_result`, `status`, `pengalaman_mengajar`, `nilai_ipk`) VALUES
(1, 3, '', 2, 1, 1, 2, 3.5),
(5, 1, 'KTP.pdf', NULL, NULL, NULL, 5, NULL),
(6, 11, 'KTP.pdf', NULL, NULL, NULL, 3, NULL),
(7, 9, 'KTP.pdf', NULL, NULL, NULL, 2, NULL),
(8, 9, 'KTP.pdf', NULL, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `jumlah_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_pembayaran`, `jumlah_rating`) VALUES
(1, 1, 4);

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
(1, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GiFmPv-D5PpYgTv9BLuiukJyZh7Alo_1ZSyLLFywg', 'Muhammad Reza Pahlevi', 'rezarubik17@gmail.com', 'laki-laki', '1996-04-17', '089501011011', 0, NULL, NULL, 'pSXGtVye6r2iQAcvIlxAXmhoHoGb1RlxydvU3TmiQCILjzPV65vq2v0gphOM', '2020-03-01 09:12:47', '2020-03-25 06:42:31'),
(2, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhS1ETgrm04vNvoOeYgtUWtupkcC3UfxjwI5_tqxQ', 'Muhammad Reza Pahlevi Y', 'muhammad.reza.pahlevi.y@gmail.com', 'laki-laki', '1996-04-17', '', 1, NULL, NULL, 'knxjo190gT4E6629bM0pvUuoZKmD9xcj4EeEdgjlXqcuNuzpHqQSkbygoYPB', '2020-03-04 03:14:31', '2020-03-04 03:14:31'),
(9, NULL, NULL, 'https://lh3.googleusercontent.com/-9ULkHhZfMFQ/AAAAAAAAAAI/AAAAAAAAAAA/AKF05nAP8MT_SBQZAVN9DUgWtWnOw0OgtA/photo.jpg', 'Nadiah Tsp', 'tspnadiah@gmail.com', 'perempuan', '1998-09-14', '089799179002', 0, NULL, NULL, 'jhVmjUDuB36NqfG7YYfqRnu2TAk9f2AZIqfHDE2rNaXFFdcqdtxtD5UEC8Io', '2020-03-25 08:49:25', '2020-03-25 10:01:24'),
(10, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GgwVwrMPKv_Cl_5p6mO5ov17NyOJehSy7QAgMkH', 'itsliza14', 'lizaconan2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'X1SueeExr1vQrBmVgp78Kv20t4OM6jZFzbAt5bIqtBn0eyZUmnszxGg9R5fH', '2020-03-25 08:50:20', '2020-03-25 08:50:20'),
(11, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhtyWTOVvaJi6svRko32-coNW-yegA8w6k7Ccn0', 'Muhammad Reza Pahlevi Y', 'reza.pahlevi.oa@gmail.com', 'laki-laki', '2020-03-18', '089799129002', NULL, NULL, NULL, 'Y9XIIkCVU7uis5dSRroArXQSNymfD3fh4FsWeZG3cOAlGH8OmDXTGi2GVkrU', '2020-03-25 08:50:58', '2020-03-25 09:08:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indexes for table `jadwal_ajar`
--
ALTER TABLE `jadwal_ajar`
  ADD PRIMARY KEY (`id_jadwal_ajar`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `microteaching`
--
ALTER TABLE `microteaching`
  ADD PRIMARY KEY (`id_microteaching`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pendaftaran_guru`
--
ALTER TABLE `pendaftaran_guru`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

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
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jadwal_ajar`
--
ALTER TABLE `jadwal_ajar`
  MODIFY `id_jadwal_ajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `microteaching`
--
ALTER TABLE `microteaching`
  MODIFY `id_microteaching` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran_guru`
--
ALTER TABLE `pendaftaran_guru`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
