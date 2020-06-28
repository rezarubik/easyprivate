-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 02:27 PM
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
  `id_absen` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `id_upah_guru` int(11) DEFAULT NULL,
  `id_jadwal_pemesanan_perminggu` int(11) DEFAULT NULL,
  `id_jadwal_pengganti` int(11) DEFAULT NULL,
  `waktu_absen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `absen_pembayaran`
-- (See below for the actual view)
--
CREATE TABLE `absen_pembayaran` (
`id_murid` int(11)
,`id_pemesanan` bigint(20) unsigned
,`id_guru` int(11)
,`jumlah_absen` bigint(21)
,`tahun` int(4)
,`bulan` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Easy Private', 'cs.easyprivate@gmail.com', '$2y$10$aCjrjlMBXTkLd8dDKbSTgeucNdVQw37sn/R5hUTmVKSpEYhx8cS.W', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Stand-in structure for view `grafikguru`
-- (See below for the actual view)
--
CREATE TABLE `grafikguru` (
`jumlah_guru_belum_dapat` bigint(22)
,`jumlah_guru_sudah_dapat` bigint(21)
,`bulan_tahun` varchar(14)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `grafikpemesanan`
-- (See below for the actual view)
--
CREATE TABLE `grafikpemesanan` (
`Pemesanan_SD` bigint(21)
,`Pemesanan_SMP` bigint(21)
,`Pemesanan_SMA` bigint(21)
,`BULAN_TAHUN` varchar(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id_guru_mapel` bigint(20) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_available`
--

CREATE TABLE `jadwal_available` (
  `id_jadwal_available` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `hari` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `available` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pemesanan_perminggu`
--

CREATE TABLE `jadwal_pemesanan_perminggu` (
  `id_jadwal_pemesanan_perminggu` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_jadwal_available` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_penggantis`
--

CREATE TABLE `jadwal_penggantis` (
  `id_jadwal_pengganti` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_jadwal_pemesanan_perminggu` int(11) DEFAULT NULL,
  `waktu_pengganti` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` bigint(20) UNSIGNED NOT NULL,
  `nama_jenjang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_per_pertemuan` int(11) DEFAULT NULL,
  `upah_guru_per_pertemuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `harga_per_pertemuan`, `upah_guru_per_pertemuan`) VALUES
(1, 'SD', 120000, 90000),
(2, 'SMP', 170000, 140000),
(3, 'SMA', 200000, 170000);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_bobot_targets`
--

CREATE TABLE `kriteria_bobot_targets` (
  `id_kriteria_bobot_target` bigint(20) UNSIGNED NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot` double(8,2) DEFAULT NULL,
  `faktor_kriteria` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_target` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_bobot_targets`
--

INSERT INTO `kriteria_bobot_targets` (`id_kriteria_bobot_target`, `kriteria`, `bobot`, `faktor_kriteria`, `nilai_target`) VALUES
(1, 'Pengalaman Mengajar', 0.30, 'Core Factor', 4),
(2, 'Volume dan Artikulasi Suara Video Microteaching', 0.10, 'Core Factor', 4),
(3, 'Keefektifan Kalimat Video Microteaching', 0.10, 'Core Factor', 3),
(4, 'Cara Mengajar Video Microteaching', 0.10, 'Core Factor', 4),
(5, 'Penguasaan Materi Video Microteaching', 0.10, 'Core Factor', 5),
(6, 'Nilai Indeks Prestasi Terakhir (IPK)', 0.06, 'Secondary Factor', 4),
(7, 'Usia Guru', 0.12, 'Secondary Factor', 4),
(8, 'Ketersediaan Mata Pelajaran', 0.12, 'Secondary Factor', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` bigint(20) UNSIGNED NOT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `nama_mapel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `id_jenjang`, `nama_mapel`) VALUES
(1, 1, 'IPA SD'),
(2, 1, 'IPS SD'),
(3, 1, 'BAHASA INGGRIS SD'),
(4, 1, 'BAHASA INDONESIA SD'),
(5, 1, 'MATEMATIKA SD'),
(6, 1, 'BAHASA ARAB SD'),
(7, 1, 'KOMPUTER SD'),
(8, 1, 'KEWARGANEGARAAN SD'),
(9, 1, 'PENGETAHUAN UMUM SD'),
(10, 2, 'IPA SMP'),
(11, 2, 'IPS SMP'),
(12, 2, 'BAHASA INGGRIS SMP'),
(13, 2, 'BAHASA INDONESIA SMP'),
(14, 2, 'BAHASA ARAB SMP'),
(15, 2, 'MATEMATIKA SMP'),
(16, 2, 'FISIKA SMP'),
(17, 2, 'BIOLOGI SMP'),
(18, 2, 'KIMIA SMP'),
(19, 2, 'KOMPUTER SMP'),
(20, 2, 'KEWARGANEGARAAN SMP'),
(21, 3, 'MATEMATIKA IPA SMA'),
(22, 3, 'MATEMATIKA IPS SMA'),
(23, 3, 'MATEMATIKA SMA'),
(24, 3, 'MATEMATIKA FISIKA KIMIA SMA'),
(25, 3, 'STATISTIKA SMA'),
(26, 3, 'GEOGRAFI SMA'),
(27, 3, 'EKONOMI SMA'),
(28, 3, 'SOSIOLOGI SMA'),
(29, 3, 'AKUNTANSI SMA'),
(30, 3, 'ADMINISTRASI PERKANTORAN SMA'),
(31, 3, 'FISIKA SMA'),
(32, 3, 'BIOLOGI SMA'),
(33, 3, 'KIMIA SMA'),
(34, 3, 'BAHASA INGGRIS SMA'),
(35, 3, 'BAHASA INDONESIA SMA'),
(36, 3, 'BAHASA ARAB SMA'),
(37, 3, 'BAHASA SPANYOL SMA'),
(38, 3, 'BAHASA JEPANG SMA'),
(39, 3, 'BAHASA JERMAN SMA'),
(40, 3, 'BAHASA PERANCIS SMA'),
(41, 3, 'BAHASA MANDARIN SMA'),
(42, 3, 'KOMPUTER SMA'),
(43, 3, 'KEWARGANEGARAAN SMA'),
(44, 3, 'SEJARAH SMA');

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
(4, '2020_03_01_155211_add_field_socialite_to_users_table', 1),
(5, '2020_04_24_132803_create_absen_table', 1),
(6, '2020_04_24_133330_create_alamat_table', 1),
(7, '2020_04_24_133627_create_guru_mapel_table', 1),
(8, '2020_04_24_134440_create_jadwal_available_table', 1),
(9, '2020_04_24_141654_create_jadwal_pemesanan_perminggu_table', 1),
(10, '2020_04_24_142023_create_jenjang_table', 1),
(11, '2020_04_24_142319_create_mata_pelajaran_table', 1),
(12, '2020_04_24_143048_create_pembayaran_table', 1),
(13, '2020_04_24_143235_create_pemesanan_table', 1),
(14, '2020_04_24_144553_create_pendaftaran_guru_table', 1),
(15, '2020_04_24_144851_create_profile_matching_table', 1),
(16, '2020_04_24_145027_create_rating_table', 1),
(17, '2020_04_24_145220_create_upah_guru_table', 1),
(18, '2020_05_02_134300_create_season_table', 1),
(19, '2020_05_06_150258_create_kriteria_bobot_targets_table', 1),
(20, '2020_05_21_085803_create_admins_table', 1),
(21, '2020_05_27_144342_create_grafik_pemesanan_views', 1),
(22, '2020_05_30_150427_create_grafik_guru_views', 1),
(23, '2020_06_13_063757_create_jadwal_penggantis_table', 1),
(24, '2020_06_14_054043_create_absen_pembayaran_views', 1);

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
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `periode_bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` bigint(20) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_murid` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `waktu_pemesanan` datetime DEFAULT NULL,
  `first_meet` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_guru`
--

CREATE TABLE `pendaftaran_guru` (
  `id_pendaftaran` bigint(20) UNSIGNED NOT NULL,
  `id_season` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dir_cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dir_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pengalaman_mengajar` int(11) DEFAULT NULL,
  `nilai_ipk` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_matching`
--

CREATE TABLE `profile_matching` (
  `id_profile_matching` bigint(20) UNSIGNED NOT NULL,
  `id_pendaftaran_guru` int(11) DEFAULT NULL,
  `pm_pk` double(8,2) DEFAULT NULL,
  `pm_vas` double(8,2) DEFAULT NULL,
  `pm_kk` double(8,2) DEFAULT NULL,
  `pm_cm` double(8,2) DEFAULT NULL,
  `pm_pemat` double(8,2) DEFAULT NULL,
  `pm_ipk` double(8,2) DEFAULT NULL,
  `pm_usia` double(8,2) DEFAULT NULL,
  `pm_km` double(8,2) DEFAULT NULL,
  `pm_gap_pk` double(8,2) DEFAULT NULL,
  `pm_gap_vas` double(8,2) DEFAULT NULL,
  `pm_gap_kk` double(8,2) DEFAULT NULL,
  `pm_gap_cm` double(8,2) DEFAULT NULL,
  `pm_gap_pemat` double(8,2) DEFAULT NULL,
  `pm_gap_ipk` double(8,2) DEFAULT NULL,
  `pm_gap_usia` double(8,2) DEFAULT NULL,
  `pm_gap_km` double(8,2) DEFAULT NULL,
  `pm_bobot_pk` double(8,2) DEFAULT NULL,
  `pm_bobot_vas` double(8,2) DEFAULT NULL,
  `pm_bobot_kk` double(8,2) DEFAULT NULL,
  `pm_bobot_cm` double(8,2) DEFAULT NULL,
  `pm_bobot_pemat` double(8,2) DEFAULT NULL,
  `pm_bobot_ipk` double(8,2) DEFAULT NULL,
  `pm_bobot_usia` double(8,2) DEFAULT NULL,
  `pm_bobot_km` double(8,2) DEFAULT NULL,
  `pm_ncf` double(8,2) DEFAULT NULL,
  `pm_scf` double(8,2) DEFAULT NULL,
  `pm_result` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` bigint(20) UNSIGNED NOT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `jumlah_rating` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id_season` bigint(20) UNSIGNED NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upah_guru`
--

CREATE TABLE `upah_guru` (
  `id_upah_guru` bigint(20) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `jumlah_upah` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal_upah` int(11) DEFAULT NULL,
  `periode_bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `universitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `absen_pembayaran`
--
DROP TABLE IF EXISTS `absen_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`easypriv`@`localhost` SQL SECURITY DEFINER VIEW `absen_pembayaran`  AS  select `p`.`id_murid` AS `id_murid`,`p`.`id_pemesanan` AS `id_pemesanan`,`p`.`id_guru` AS `id_guru`,count(0) AS `jumlah_absen`,extract(year from `absen`.`waktu_absen`) AS `tahun`,extract(month from `absen`.`waktu_absen`) AS `bulan` from (`absen` join `pemesanan` `p` on(`p`.`id_pemesanan` = `absen`.`id_pemesanan`)) group by extract(year from `absen`.`waktu_absen`),extract(month from `absen`.`waktu_absen`),`p`.`id_pemesanan`,`p`.`id_guru`,`p`.`id_murid` ;

-- --------------------------------------------------------

--
-- Structure for view `grafikguru`
--
DROP TABLE IF EXISTS `grafikguru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`easypriv`@`localhost` SQL SECURITY DEFINER VIEW `grafikguru`  AS  select `table_a`.`counts` - count(0) AS `jumlah_guru_belum_dapat`,count(0) AS `jumlah_guru_sudah_dapat`,concat(monthname(`pemesanan`.`waktu_pemesanan`),' ',extract(year from `pemesanan`.`waktu_pemesanan`)) AS `bulan_tahun` from (`pemesanan` join (select count(0) AS `counts` from `users` where `users`.`role` = 2) `table_a`) group by concat(monthname(`pemesanan`.`waktu_pemesanan`),' ',extract(year from `pemesanan`.`waktu_pemesanan`)),`table_a`.`counts` ;

-- --------------------------------------------------------

--
-- Structure for view `grafikpemesanan`
--
DROP TABLE IF EXISTS `grafikpemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`easypriv`@`localhost` SQL SECURITY DEFINER VIEW `grafikpemesanan`  AS  select `tablesd`.`PemesananPerBulan` AS `Pemesanan_SD`,`tablesmp`.`PemesananPerBulan` AS `Pemesanan_SMP`,`tablesma`.`PemesananPerBulan` AS `Pemesanan_SMA`,concat(`tablesd`.`NAMA_BULAN`,' ',`tablesd`.`TAHUN`) AS `BULAN_TAHUN` from (((select count(0) AS `PemesananPerBulan`,monthname(`pemesanan`.`waktu_pemesanan`) AS `NAMA_BULAN`,extract(year from `pemesanan`.`waktu_pemesanan`) AS `TAHUN`,extract(month from `pemesanan`.`waktu_pemesanan`) AS `BULAN`,extract(year_month from `pemesanan`.`waktu_pemesanan`) AS `BULAN_TAHUN` from ((`pemesanan` join `mata_pelajaran` on(`mata_pelajaran`.`id_mapel` = `pemesanan`.`id_mapel`)) join `jenjang` on(`mata_pelajaran`.`id_jenjang` = `jenjang`.`id_jenjang`)) where `jenjang`.`id_jenjang` = 1 group by extract(year_month from `pemesanan`.`waktu_pemesanan`),`pemesanan`.`waktu_pemesanan`) `tablesd` left join (select count(0) AS `PemesananPerBulan`,monthname(`pemesanan`.`waktu_pemesanan`) AS `NAMA_BULAN`,extract(year from `pemesanan`.`waktu_pemesanan`) AS `TAHUN`,extract(month from `pemesanan`.`waktu_pemesanan`) AS `BULAN`,extract(year_month from `pemesanan`.`waktu_pemesanan`) AS `BULAN_TAHUN` from ((`pemesanan` join `mata_pelajaran` on(`mata_pelajaran`.`id_mapel` = `pemesanan`.`id_mapel`)) join `jenjang` on(`mata_pelajaran`.`id_jenjang` = `jenjang`.`id_jenjang`)) where `jenjang`.`id_jenjang` = 2 group by extract(year_month from `pemesanan`.`waktu_pemesanan`),`pemesanan`.`waktu_pemesanan`) `tablesmp` on(`tablesmp`.`BULAN_TAHUN` = `tablesd`.`BULAN_TAHUN`)) left join (select count(0) AS `PemesananPerBulan`,monthname(`pemesanan`.`waktu_pemesanan`) AS `NAMA_BULAN`,extract(year from `pemesanan`.`waktu_pemesanan`) AS `TAHUN`,extract(month from `pemesanan`.`waktu_pemesanan`) AS `BULAN`,extract(year_month from `pemesanan`.`waktu_pemesanan`) AS `BULAN_TAHUN` from ((`pemesanan` join `mata_pelajaran` on(`mata_pelajaran`.`id_mapel` = `pemesanan`.`id_mapel`)) join `jenjang` on(`mata_pelajaran`.`id_jenjang` = `jenjang`.`id_jenjang`)) where `jenjang`.`id_jenjang` = 3 group by extract(year_month from `pemesanan`.`waktu_pemesanan`),`pemesanan`.`waktu_pemesanan`) `tablesma` on(`tablesma`.`BULAN_TAHUN` = `tablesmp`.`BULAN_TAHUN`)) union select `tablesd`.`PemesananPerBulan` AS `Pemesanan_SD`,`tablesmp`.`PemesananPerBulan` AS `Pemesanan_SMP`,`tablesma`.`PemesananPerBulan` AS `Pemesanan_SMA`,concat(`tablesd`.`NAMA_BULAN`,' ',`tablesd`.`TAHUN`) AS `BULAN_TAHUN` from ((select count(0) AS `PemesananPerBulan`,monthname(`pemesanan`.`waktu_pemesanan`) AS `NAMA_BULAN`,extract(year from `pemesanan`.`waktu_pemesanan`) AS `TAHUN`,extract(month from `pemesanan`.`waktu_pemesanan`) AS `BULAN`,extract(year_month from `pemesanan`.`waktu_pemesanan`) AS `BULAN_TAHUN` from ((`pemesanan` join `mata_pelajaran` on(`mata_pelajaran`.`id_mapel` = `pemesanan`.`id_mapel`)) join `jenjang` on(`mata_pelajaran`.`id_jenjang` = `jenjang`.`id_jenjang`)) where `jenjang`.`id_jenjang` = 3 group by extract(year_month from `pemesanan`.`waktu_pemesanan`),`pemesanan`.`waktu_pemesanan`) `tablesma` left join ((select count(0) AS `PemesananPerBulan`,monthname(`pemesanan`.`waktu_pemesanan`) AS `NAMA_BULAN`,extract(year from `pemesanan`.`waktu_pemesanan`) AS `TAHUN`,extract(month from `pemesanan`.`waktu_pemesanan`) AS `BULAN`,extract(year_month from `pemesanan`.`waktu_pemesanan`) AS `BULAN_TAHUN` from ((`pemesanan` join `mata_pelajaran` on(`mata_pelajaran`.`id_mapel` = `pemesanan`.`id_mapel`)) join `jenjang` on(`mata_pelajaran`.`id_jenjang` = `jenjang`.`id_jenjang`)) where `jenjang`.`id_jenjang` = 2 group by extract(year_month from `pemesanan`.`waktu_pemesanan`),`pemesanan`.`waktu_pemesanan`) `tablesmp` left join (select count(0) AS `PemesananPerBulan`,monthname(`pemesanan`.`waktu_pemesanan`) AS `NAMA_BULAN`,extract(year from `pemesanan`.`waktu_pemesanan`) AS `TAHUN`,extract(month from `pemesanan`.`waktu_pemesanan`) AS `BULAN`,extract(year_month from `pemesanan`.`waktu_pemesanan`) AS `BULAN_TAHUN` from ((`pemesanan` join `mata_pelajaran` on(`mata_pelajaran`.`id_mapel` = `pemesanan`.`id_mapel`)) join `jenjang` on(`mata_pelajaran`.`id_jenjang` = `jenjang`.`id_jenjang`)) where `jenjang`.`id_jenjang` = 1 group by extract(year_month from `pemesanan`.`waktu_pemesanan`),`pemesanan`.`waktu_pemesanan`) `tablesd` on(`tablesmp`.`BULAN_TAHUN` = `tablesd`.`BULAN_TAHUN`)) on(`tablesma`.`BULAN_TAHUN` = `tablesmp`.`BULAN_TAHUN`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `jadwal_available`
--
ALTER TABLE `jadwal_available`
  ADD PRIMARY KEY (`id_jadwal_available`);

--
-- Indexes for table `jadwal_pemesanan_perminggu`
--
ALTER TABLE `jadwal_pemesanan_perminggu`
  ADD PRIMARY KEY (`id_jadwal_pemesanan_perminggu`);

--
-- Indexes for table `jadwal_penggantis`
--
ALTER TABLE `jadwal_penggantis`
  ADD PRIMARY KEY (`id_jadwal_pengganti`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `kriteria_bobot_targets`
--
ALTER TABLE `kriteria_bobot_targets`
  ADD PRIMARY KEY (`id_kriteria_bobot_target`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

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
-- Indexes for table `profile_matching`
--
ALTER TABLE `profile_matching`
  ADD PRIMARY KEY (`id_profile_matching`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id_season`);

--
-- Indexes for table `upah_guru`
--
ALTER TABLE `upah_guru`
  ADD PRIMARY KEY (`id_upah_guru`);

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
  MODIFY `id_absen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id_guru_mapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_available`
--
ALTER TABLE `jadwal_available`
  MODIFY `id_jadwal_available` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_pemesanan_perminggu`
--
ALTER TABLE `jadwal_pemesanan_perminggu`
  MODIFY `id_jadwal_pemesanan_perminggu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_penggantis`
--
ALTER TABLE `jadwal_penggantis`
  MODIFY `id_jadwal_pengganti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria_bobot_targets`
--
ALTER TABLE `kriteria_bobot_targets`
  MODIFY `id_kriteria_bobot_target` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran_guru`
--
ALTER TABLE `pendaftaran_guru`
  MODIFY `id_pendaftaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_matching`
--
ALTER TABLE `profile_matching`
  MODIFY `id_profile_matching` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id_season` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upah_guru`
--
ALTER TABLE `upah_guru`
  MODIFY `id_upah_guru` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
