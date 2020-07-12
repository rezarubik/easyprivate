-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jun 2020 pada 22.32
-- Versi server: 10.3.23-MariaDB-log-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easypriv_easyprivate_real`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
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
-- Stand-in struktur untuk tampilan `absen_pembayaran`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur dari tabel `admins`
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
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Easy Private', 'cs.easyprivate@gmail.com', '$2y$10$aCjrjlMBXTkLd8dDKbSTgeucNdVQw37sn/R5hUTmVKSpEYhx8cS.W', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `latitude`, `longitude`, `alamat_lengkap`) VALUES
(1, 1, -6.22, 106.83, 'On Dkost'),
(2, 2, -6.22, 106.97, 'Jalan Bintara 14. no.15 RT.006/014, Bintara, Bekasi barat, Kota Bekasi'),
(3, 3, -6.39, 106.78, 'perumahan villa gading emas blok A4 no 12A'),
(4, 4, -6.22, 106.83, 'Jl. Pedurenan Masjid 2 No 26, B1'),
(5, 5, -6.22, 106.82, 'jalan karet pedurenan no. 40'),
(6, 6, -6.23, 106.90, 'Jl. Gotong Royong RT.016/Rw.002 No.18 Kel. Pondok Bambu Kec. Duren Sawit Jakarta Timur 13430'),
(7, 8, NULL, NULL, 'Cileungsi'),
(8, 7, -6.22, 106.83, 'Jl. pedurenan masjid 2 no. 25'),
(9, 9, -6.32, 106.88, 'Jalan Tanah Merdeka X Rt019 Rw 06 kelurahan rambutan, kecamatan ciracas, Jakarta Timur'),
(10, 10, -6.23, 106.82, 'Jalan Bappenas No A1'),
(11, 11, -6.25, 106.84, 'Jalan Pancoran Barat IXE/31, Pancoran, Jakarta Selatan'),
(12, 14, -6.36, 106.88, 'Lembah Nirmala 1, Jl. Mushola RT 11/14. Mekarsari, Cimanggis, Depok.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Stand-in struktur untuk tampilan `grafikguru`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `grafikguru` (
`jumlah_guru_belum_dapat` bigint(22)
,`jumlah_guru_sudah_dapat` bigint(21)
,`bulan_tahun` varchar(14)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `grafikpemesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `grafikpemesanan` (
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id_guru_mapel` bigint(20) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru_mapel`
--

INSERT INTO `guru_mapel` (`id_guru_mapel`, `id_guru`, `id_mapel`) VALUES
(1, 1, 15),
(2, 1, 21),
(3, 1, 22),
(6, 3, 33),
(7, 4, 1),
(8, 4, 5),
(9, 4, 10),
(10, 4, 15),
(11, 4, 31),
(12, 5, 16),
(13, 5, 15),
(14, 5, 31),
(15, 6, 27),
(16, 6, 44),
(17, 8, 3),
(18, 8, 11),
(19, 8, 44),
(22, 7, 26),
(23, 9, 28),
(24, 10, 3),
(25, 10, 12),
(26, 10, 34),
(27, 11, 13),
(28, 2, 5),
(29, 2, 15),
(30, 14, 10),
(31, 14, 31),
(32, 14, 21),
(33, 14, 15),
(34, 14, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_available`
--

CREATE TABLE `jadwal_available` (
  `id_jadwal_available` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `hari` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `available` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_available`
--

INSERT INTO `jadwal_available` (`id_jadwal_available`, `id_user`, `hari`, `start`, `end`, `available`) VALUES
(1, 1, 'Senin', '09:00:00', '10:30:00', 0),
(2, 1, 'Senin', '11:00:00', '12:30:00', 0),
(3, 1, 'Senin', '13:00:00', '14:30:00', 0),
(4, 1, 'Senin', '15:00:00', '16:30:00', 0),
(5, 1, 'Senin', '17:00:00', '18:30:00', 0),
(6, 1, 'Senin', '19:00:00', '20:30:00', 1),
(7, 1, 'Selasa', '09:00:00', '10:30:00', 0),
(8, 1, 'Selasa', '11:00:00', '12:30:00', 0),
(9, 1, 'Selasa', '13:00:00', '14:30:00', 0),
(10, 1, 'Selasa', '15:00:00', '16:30:00', 0),
(11, 1, 'Selasa', '17:00:00', '18:30:00', 0),
(12, 1, 'Selasa', '19:00:00', '20:30:00', 1),
(13, 1, 'Rabu', '09:00:00', '10:30:00', 0),
(14, 1, 'Rabu', '11:00:00', '12:30:00', 0),
(15, 1, 'Rabu', '13:00:00', '14:30:00', 0),
(16, 1, 'Rabu', '15:00:00', '16:30:00', 0),
(17, 1, 'Rabu', '17:00:00', '18:30:00', 0),
(18, 1, 'Rabu', '19:00:00', '20:30:00', 1),
(19, 1, 'Kamis', '09:00:00', '10:30:00', 0),
(20, 1, 'Kamis', '11:00:00', '12:30:00', 0),
(21, 1, 'Kamis', '13:00:00', '14:30:00', 0),
(22, 1, 'Kamis', '15:00:00', '16:30:00', 0),
(23, 1, 'Kamis', '17:00:00', '18:30:00', 0),
(24, 1, 'Kamis', '19:00:00', '20:30:00', 0),
(25, 1, 'Jumat', '09:00:00', '10:30:00', 0),
(26, 1, 'Jumat', '11:00:00', '12:30:00', 0),
(27, 1, 'Jumat', '13:00:00', '14:30:00', 0),
(28, 1, 'Jumat', '15:00:00', '16:30:00', 0),
(29, 1, 'Jumat', '17:00:00', '18:30:00', 0),
(30, 1, 'Jumat', '19:00:00', '20:30:00', 0),
(31, 1, 'Sabtu', '09:00:00', '10:30:00', 0),
(32, 1, 'Sabtu', '11:00:00', '12:30:00', 0),
(33, 1, 'Sabtu', '13:00:00', '14:30:00', 0),
(34, 1, 'Sabtu', '15:00:00', '16:30:00', 0),
(35, 1, 'Sabtu', '17:00:00', '18:30:00', 0),
(36, 1, 'Sabtu', '19:00:00', '20:30:00', 0),
(37, 1, 'Minggu', '09:00:00', '10:30:00', 0),
(38, 1, 'Minggu', '11:00:00', '12:30:00', 0),
(39, 1, 'Minggu', '13:00:00', '14:30:00', 0),
(40, 1, 'Minggu', '15:00:00', '16:30:00', 0),
(41, 1, 'Minggu', '17:00:00', '18:30:00', 0),
(42, 1, 'Minggu', '19:00:00', '20:30:00', 0),
(43, 2, 'Senin', '09:00:00', '10:30:00', 0),
(44, 2, 'Senin', '11:00:00', '12:30:00', 0),
(45, 2, 'Senin', '13:00:00', '14:30:00', 0),
(46, 2, 'Senin', '15:00:00', '16:30:00', 1),
(47, 2, 'Senin', '17:00:00', '18:30:00', 0),
(48, 2, 'Senin', '19:00:00', '20:30:00', 0),
(49, 2, 'Selasa', '09:00:00', '10:30:00', 0),
(50, 2, 'Selasa', '11:00:00', '12:30:00', 0),
(51, 2, 'Selasa', '13:00:00', '14:30:00', 0),
(52, 2, 'Selasa', '15:00:00', '16:30:00', 1),
(53, 2, 'Selasa', '17:00:00', '18:30:00', 0),
(54, 2, 'Selasa', '19:00:00', '20:30:00', 0),
(55, 2, 'Rabu', '09:00:00', '10:30:00', 0),
(56, 2, 'Rabu', '11:00:00', '12:30:00', 0),
(57, 2, 'Rabu', '13:00:00', '14:30:00', 0),
(58, 2, 'Rabu', '15:00:00', '16:30:00', 1),
(59, 2, 'Rabu', '17:00:00', '18:30:00', 0),
(60, 2, 'Rabu', '19:00:00', '20:30:00', 0),
(61, 2, 'Kamis', '09:00:00', '10:30:00', 0),
(62, 2, 'Kamis', '11:00:00', '12:30:00', 0),
(63, 2, 'Kamis', '13:00:00', '14:30:00', 0),
(64, 2, 'Kamis', '15:00:00', '16:30:00', 1),
(65, 2, 'Kamis', '17:00:00', '18:30:00', 0),
(66, 2, 'Kamis', '19:00:00', '20:30:00', 0),
(67, 2, 'Jumat', '09:00:00', '10:30:00', 0),
(68, 2, 'Jumat', '11:00:00', '12:30:00', 0),
(69, 2, 'Jumat', '13:00:00', '14:30:00', 0),
(70, 2, 'Jumat', '15:00:00', '16:30:00', 1),
(71, 2, 'Jumat', '17:00:00', '18:30:00', 0),
(72, 2, 'Jumat', '19:00:00', '20:30:00', 0),
(73, 2, 'Sabtu', '09:00:00', '10:30:00', 0),
(74, 2, 'Sabtu', '11:00:00', '12:30:00', 1),
(75, 2, 'Sabtu', '13:00:00', '14:30:00', 0),
(76, 2, 'Sabtu', '15:00:00', '16:30:00', 0),
(77, 2, 'Sabtu', '17:00:00', '18:30:00', 0),
(78, 2, 'Sabtu', '19:00:00', '20:30:00', 0),
(79, 2, 'Minggu', '09:00:00', '10:30:00', 0),
(80, 2, 'Minggu', '11:00:00', '12:30:00', 1),
(81, 2, 'Minggu', '13:00:00', '14:30:00', 0),
(82, 2, 'Minggu', '15:00:00', '16:30:00', 0),
(83, 2, 'Minggu', '17:00:00', '18:30:00', 0),
(84, 2, 'Minggu', '19:00:00', '20:30:00', 0),
(85, 3, 'Senin', '09:00:00', '10:30:00', 1),
(86, 3, 'Senin', '11:00:00', '12:30:00', 0),
(87, 3, 'Senin', '13:00:00', '14:30:00', 0),
(88, 3, 'Senin', '15:00:00', '16:30:00', 0),
(89, 3, 'Senin', '17:00:00', '18:30:00', 0),
(90, 3, 'Senin', '19:00:00', '20:30:00', 0),
(91, 3, 'Selasa', '09:00:00', '10:30:00', 0),
(92, 3, 'Selasa', '11:00:00', '12:30:00', 0),
(93, 3, 'Selasa', '13:00:00', '14:30:00', 0),
(94, 3, 'Selasa', '15:00:00', '16:30:00', 0),
(95, 3, 'Selasa', '17:00:00', '18:30:00', 0),
(96, 3, 'Selasa', '19:00:00', '20:30:00', 0),
(97, 3, 'Rabu', '09:00:00', '10:30:00', 0),
(98, 3, 'Rabu', '11:00:00', '12:30:00', 0),
(99, 3, 'Rabu', '13:00:00', '14:30:00', 0),
(100, 3, 'Rabu', '15:00:00', '16:30:00', 0),
(101, 3, 'Rabu', '17:00:00', '18:30:00', 0),
(102, 3, 'Rabu', '19:00:00', '20:30:00', 0),
(103, 3, 'Kamis', '09:00:00', '10:30:00', 0),
(104, 3, 'Kamis', '11:00:00', '12:30:00', 0),
(105, 3, 'Kamis', '13:00:00', '14:30:00', 0),
(106, 3, 'Kamis', '15:00:00', '16:30:00', 0),
(107, 3, 'Kamis', '17:00:00', '18:30:00', 0),
(108, 3, 'Kamis', '19:00:00', '20:30:00', 0),
(109, 3, 'Jumat', '09:00:00', '10:30:00', 0),
(110, 3, 'Jumat', '11:00:00', '12:30:00', 0),
(111, 3, 'Jumat', '13:00:00', '14:30:00', 0),
(112, 3, 'Jumat', '15:00:00', '16:30:00', 0),
(113, 3, 'Jumat', '17:00:00', '18:30:00', 0),
(114, 3, 'Jumat', '19:00:00', '20:30:00', 0),
(115, 3, 'Sabtu', '09:00:00', '10:30:00', 0),
(116, 3, 'Sabtu', '11:00:00', '12:30:00', 0),
(117, 3, 'Sabtu', '13:00:00', '14:30:00', 0),
(118, 3, 'Sabtu', '15:00:00', '16:30:00', 0),
(119, 3, 'Sabtu', '17:00:00', '18:30:00', 0),
(120, 3, 'Sabtu', '19:00:00', '20:30:00', 0),
(121, 3, 'Minggu', '09:00:00', '10:30:00', 0),
(122, 3, 'Minggu', '11:00:00', '12:30:00', 0),
(123, 3, 'Minggu', '13:00:00', '14:30:00', 0),
(124, 3, 'Minggu', '15:00:00', '16:30:00', 0),
(125, 3, 'Minggu', '17:00:00', '18:30:00', 0),
(126, 3, 'Minggu', '19:00:00', '20:30:00', 0),
(127, 4, 'Senin', '09:00:00', '10:30:00', 1),
(128, 4, 'Senin', '11:00:00', '12:30:00', 0),
(129, 4, 'Senin', '13:00:00', '14:30:00', 0),
(130, 4, 'Senin', '15:00:00', '16:30:00', 0),
(131, 4, 'Senin', '17:00:00', '18:30:00', 0),
(132, 4, 'Senin', '19:00:00', '20:30:00', 0),
(133, 4, 'Selasa', '09:00:00', '10:30:00', 1),
(134, 4, 'Selasa', '11:00:00', '12:30:00', 0),
(135, 4, 'Selasa', '13:00:00', '14:30:00', 0),
(136, 4, 'Selasa', '15:00:00', '16:30:00', 0),
(137, 4, 'Selasa', '17:00:00', '18:30:00', 0),
(138, 4, 'Selasa', '19:00:00', '20:30:00', 0),
(139, 4, 'Rabu', '09:00:00', '10:30:00', 1),
(140, 4, 'Rabu', '11:00:00', '12:30:00', 0),
(141, 4, 'Rabu', '13:00:00', '14:30:00', 0),
(142, 4, 'Rabu', '15:00:00', '16:30:00', 0),
(143, 4, 'Rabu', '17:00:00', '18:30:00', 0),
(144, 4, 'Rabu', '19:00:00', '20:30:00', 0),
(145, 4, 'Kamis', '09:00:00', '10:30:00', 1),
(146, 4, 'Kamis', '11:00:00', '12:30:00', 0),
(147, 4, 'Kamis', '13:00:00', '14:30:00', 0),
(148, 4, 'Kamis', '15:00:00', '16:30:00', 0),
(149, 4, 'Kamis', '17:00:00', '18:30:00', 0),
(150, 4, 'Kamis', '19:00:00', '20:30:00', 0),
(151, 4, 'Jumat', '09:00:00', '10:30:00', 1),
(152, 4, 'Jumat', '11:00:00', '12:30:00', 0),
(153, 4, 'Jumat', '13:00:00', '14:30:00', 0),
(154, 4, 'Jumat', '15:00:00', '16:30:00', 0),
(155, 4, 'Jumat', '17:00:00', '18:30:00', 0),
(156, 4, 'Jumat', '19:00:00', '20:30:00', 0),
(157, 4, 'Sabtu', '09:00:00', '10:30:00', 0),
(158, 4, 'Sabtu', '11:00:00', '12:30:00', 0),
(159, 4, 'Sabtu', '13:00:00', '14:30:00', 0),
(160, 4, 'Sabtu', '15:00:00', '16:30:00', 1),
(161, 4, 'Sabtu', '17:00:00', '18:30:00', 0),
(162, 4, 'Sabtu', '19:00:00', '20:30:00', 0),
(163, 4, 'Minggu', '09:00:00', '10:30:00', 0),
(164, 4, 'Minggu', '11:00:00', '12:30:00', 0),
(165, 4, 'Minggu', '13:00:00', '14:30:00', 0),
(166, 4, 'Minggu', '15:00:00', '16:30:00', 1),
(167, 4, 'Minggu', '17:00:00', '18:30:00', 0),
(168, 4, 'Minggu', '19:00:00', '20:30:00', 0),
(169, 5, 'Senin', '09:00:00', '10:30:00', 0),
(170, 5, 'Senin', '11:00:00', '12:30:00', 0),
(171, 5, 'Senin', '13:00:00', '14:30:00', 0),
(172, 5, 'Senin', '15:00:00', '16:30:00', 0),
(173, 5, 'Senin', '17:00:00', '18:30:00', 0),
(174, 5, 'Senin', '19:00:00', '20:30:00', 1),
(175, 5, 'Selasa', '09:00:00', '10:30:00', 0),
(176, 5, 'Selasa', '11:00:00', '12:30:00', 0),
(177, 5, 'Selasa', '13:00:00', '14:30:00', 0),
(178, 5, 'Selasa', '15:00:00', '16:30:00', 0),
(179, 5, 'Selasa', '17:00:00', '18:30:00', 0),
(180, 5, 'Selasa', '19:00:00', '20:30:00', 0),
(181, 5, 'Rabu', '09:00:00', '10:30:00', 0),
(182, 5, 'Rabu', '11:00:00', '12:30:00', 0),
(183, 5, 'Rabu', '13:00:00', '14:30:00', 0),
(184, 5, 'Rabu', '15:00:00', '16:30:00', 0),
(185, 5, 'Rabu', '17:00:00', '18:30:00', 0),
(186, 5, 'Rabu', '19:00:00', '20:30:00', 0),
(187, 5, 'Kamis', '09:00:00', '10:30:00', 0),
(188, 5, 'Kamis', '11:00:00', '12:30:00', 0),
(189, 5, 'Kamis', '13:00:00', '14:30:00', 0),
(190, 5, 'Kamis', '15:00:00', '16:30:00', 0),
(191, 5, 'Kamis', '17:00:00', '18:30:00', 0),
(192, 5, 'Kamis', '19:00:00', '20:30:00', 1),
(193, 5, 'Jumat', '09:00:00', '10:30:00', 0),
(194, 5, 'Jumat', '11:00:00', '12:30:00', 0),
(195, 5, 'Jumat', '13:00:00', '14:30:00', 0),
(196, 5, 'Jumat', '15:00:00', '16:30:00', 0),
(197, 5, 'Jumat', '17:00:00', '18:30:00', 0),
(198, 5, 'Jumat', '19:00:00', '20:30:00', 0),
(199, 5, 'Sabtu', '09:00:00', '10:30:00', 0),
(200, 5, 'Sabtu', '11:00:00', '12:30:00', 0),
(201, 5, 'Sabtu', '13:00:00', '14:30:00', 0),
(202, 5, 'Sabtu', '15:00:00', '16:30:00', 0),
(203, 5, 'Sabtu', '17:00:00', '18:30:00', 0),
(204, 5, 'Sabtu', '19:00:00', '20:30:00', 0),
(205, 5, 'Minggu', '09:00:00', '10:30:00', 0),
(206, 5, 'Minggu', '11:00:00', '12:30:00', 0),
(207, 5, 'Minggu', '13:00:00', '14:30:00', 0),
(208, 5, 'Minggu', '15:00:00', '16:30:00', 0),
(209, 5, 'Minggu', '17:00:00', '18:30:00', 0),
(210, 5, 'Minggu', '19:00:00', '20:30:00', 0),
(211, 6, 'Senin', '09:00:00', '10:30:00', 0),
(212, 6, 'Senin', '11:00:00', '12:30:00', 0),
(213, 6, 'Senin', '13:00:00', '14:30:00', 0),
(214, 6, 'Senin', '15:00:00', '16:30:00', 0),
(215, 6, 'Senin', '17:00:00', '18:30:00', 0),
(216, 6, 'Senin', '19:00:00', '20:30:00', 0),
(217, 6, 'Selasa', '09:00:00', '10:30:00', 0),
(218, 6, 'Selasa', '11:00:00', '12:30:00', 0),
(219, 6, 'Selasa', '13:00:00', '14:30:00', 0),
(220, 6, 'Selasa', '15:00:00', '16:30:00', 0),
(221, 6, 'Selasa', '17:00:00', '18:30:00', 0),
(222, 6, 'Selasa', '19:00:00', '20:30:00', 0),
(223, 6, 'Rabu', '09:00:00', '10:30:00', 1),
(224, 6, 'Rabu', '11:00:00', '12:30:00', 1),
(225, 6, 'Rabu', '13:00:00', '14:30:00', 1),
(226, 6, 'Rabu', '15:00:00', '16:30:00', 0),
(227, 6, 'Rabu', '17:00:00', '18:30:00', 0),
(228, 6, 'Rabu', '19:00:00', '20:30:00', 0),
(229, 6, 'Kamis', '09:00:00', '10:30:00', 0),
(230, 6, 'Kamis', '11:00:00', '12:30:00', 0),
(231, 6, 'Kamis', '13:00:00', '14:30:00', 0),
(232, 6, 'Kamis', '15:00:00', '16:30:00', 0),
(233, 6, 'Kamis', '17:00:00', '18:30:00', 0),
(234, 6, 'Kamis', '19:00:00', '20:30:00', 0),
(235, 6, 'Jumat', '09:00:00', '10:30:00', 0),
(236, 6, 'Jumat', '11:00:00', '12:30:00', 0),
(237, 6, 'Jumat', '13:00:00', '14:30:00', 0),
(238, 6, 'Jumat', '15:00:00', '16:30:00', 0),
(239, 6, 'Jumat', '17:00:00', '18:30:00', 0),
(240, 6, 'Jumat', '19:00:00', '20:30:00', 0),
(241, 6, 'Sabtu', '09:00:00', '10:30:00', 0),
(242, 6, 'Sabtu', '11:00:00', '12:30:00', 0),
(243, 6, 'Sabtu', '13:00:00', '14:30:00', 0),
(244, 6, 'Sabtu', '15:00:00', '16:30:00', 0),
(245, 6, 'Sabtu', '17:00:00', '18:30:00', 0),
(246, 6, 'Sabtu', '19:00:00', '20:30:00', 0),
(247, 6, 'Minggu', '09:00:00', '10:30:00', 0),
(248, 6, 'Minggu', '11:00:00', '12:30:00', 0),
(249, 6, 'Minggu', '13:00:00', '14:30:00', 0),
(250, 6, 'Minggu', '15:00:00', '16:30:00', 0),
(251, 6, 'Minggu', '17:00:00', '18:30:00', 0),
(252, 6, 'Minggu', '19:00:00', '20:30:00', 0),
(253, 8, 'Senin', '09:00:00', '10:30:00', 0),
(254, 8, 'Senin', '11:00:00', '12:30:00', 0),
(255, 8, 'Senin', '13:00:00', '14:30:00', 0),
(256, 8, 'Senin', '15:00:00', '16:30:00', 0),
(257, 8, 'Senin', '17:00:00', '18:30:00', 0),
(258, 8, 'Senin', '19:00:00', '20:30:00', 0),
(259, 8, 'Selasa', '09:00:00', '10:30:00', 0),
(260, 8, 'Selasa', '11:00:00', '12:30:00', 0),
(261, 8, 'Selasa', '13:00:00', '14:30:00', 0),
(262, 8, 'Selasa', '15:00:00', '16:30:00', 0),
(263, 8, 'Selasa', '17:00:00', '18:30:00', 0),
(264, 8, 'Selasa', '19:00:00', '20:30:00', 0),
(265, 8, 'Rabu', '09:00:00', '10:30:00', 0),
(266, 8, 'Rabu', '11:00:00', '12:30:00', 0),
(267, 8, 'Rabu', '13:00:00', '14:30:00', 0),
(268, 8, 'Rabu', '15:00:00', '16:30:00', 0),
(269, 8, 'Rabu', '17:00:00', '18:30:00', 0),
(270, 8, 'Rabu', '19:00:00', '20:30:00', 0),
(271, 8, 'Kamis', '09:00:00', '10:30:00', 0),
(272, 8, 'Kamis', '11:00:00', '12:30:00', 1),
(273, 8, 'Kamis', '13:00:00', '14:30:00', 0),
(274, 8, 'Kamis', '15:00:00', '16:30:00', 0),
(275, 8, 'Kamis', '17:00:00', '18:30:00', 0),
(276, 8, 'Kamis', '19:00:00', '20:30:00', 0),
(277, 8, 'Jumat', '09:00:00', '10:30:00', 0),
(278, 8, 'Jumat', '11:00:00', '12:30:00', 0),
(279, 8, 'Jumat', '13:00:00', '14:30:00', 0),
(280, 8, 'Jumat', '15:00:00', '16:30:00', 0),
(281, 8, 'Jumat', '17:00:00', '18:30:00', 0),
(282, 8, 'Jumat', '19:00:00', '20:30:00', 0),
(283, 8, 'Sabtu', '09:00:00', '10:30:00', 0),
(284, 8, 'Sabtu', '11:00:00', '12:30:00', 0),
(285, 8, 'Sabtu', '13:00:00', '14:30:00', 0),
(286, 8, 'Sabtu', '15:00:00', '16:30:00', 0),
(287, 8, 'Sabtu', '17:00:00', '18:30:00', 0),
(288, 8, 'Sabtu', '19:00:00', '20:30:00', 0),
(289, 8, 'Minggu', '09:00:00', '10:30:00', 0),
(290, 8, 'Minggu', '11:00:00', '12:30:00', 0),
(291, 8, 'Minggu', '13:00:00', '14:30:00', 0),
(292, 8, 'Minggu', '15:00:00', '16:30:00', 0),
(293, 8, 'Minggu', '17:00:00', '18:30:00', 0),
(294, 8, 'Minggu', '19:00:00', '20:30:00', 0),
(295, 7, 'Senin', '09:00:00', '10:30:00', 0),
(296, 7, 'Senin', '11:00:00', '12:30:00', 0),
(297, 7, 'Senin', '13:00:00', '14:30:00', 0),
(298, 7, 'Senin', '15:00:00', '16:30:00', 0),
(299, 7, 'Senin', '17:00:00', '18:30:00', 0),
(300, 7, 'Senin', '19:00:00', '20:30:00', 1),
(301, 7, 'Selasa', '09:00:00', '10:30:00', 0),
(302, 7, 'Selasa', '11:00:00', '12:30:00', 0),
(303, 7, 'Selasa', '13:00:00', '14:30:00', 0),
(304, 7, 'Selasa', '15:00:00', '16:30:00', 0),
(305, 7, 'Selasa', '17:00:00', '18:30:00', 0),
(306, 7, 'Selasa', '19:00:00', '20:30:00', 1),
(307, 7, 'Rabu', '09:00:00', '10:30:00', 0),
(308, 7, 'Rabu', '11:00:00', '12:30:00', 0),
(309, 7, 'Rabu', '13:00:00', '14:30:00', 0),
(310, 7, 'Rabu', '15:00:00', '16:30:00', 0),
(311, 7, 'Rabu', '17:00:00', '18:30:00', 0),
(312, 7, 'Rabu', '19:00:00', '20:30:00', 1),
(313, 7, 'Kamis', '09:00:00', '10:30:00', 0),
(314, 7, 'Kamis', '11:00:00', '12:30:00', 0),
(315, 7, 'Kamis', '13:00:00', '14:30:00', 0),
(316, 7, 'Kamis', '15:00:00', '16:30:00', 0),
(317, 7, 'Kamis', '17:00:00', '18:30:00', 0),
(318, 7, 'Kamis', '19:00:00', '20:30:00', 1),
(319, 7, 'Jumat', '09:00:00', '10:30:00', 0),
(320, 7, 'Jumat', '11:00:00', '12:30:00', 0),
(321, 7, 'Jumat', '13:00:00', '14:30:00', 0),
(322, 7, 'Jumat', '15:00:00', '16:30:00', 0),
(323, 7, 'Jumat', '17:00:00', '18:30:00', 0),
(324, 7, 'Jumat', '19:00:00', '20:30:00', 1),
(325, 7, 'Sabtu', '09:00:00', '10:30:00', 0),
(326, 7, 'Sabtu', '11:00:00', '12:30:00', 0),
(327, 7, 'Sabtu', '13:00:00', '14:30:00', 0),
(328, 7, 'Sabtu', '15:00:00', '16:30:00', 0),
(329, 7, 'Sabtu', '17:00:00', '18:30:00', 0),
(330, 7, 'Sabtu', '19:00:00', '20:30:00', 1),
(331, 7, 'Minggu', '09:00:00', '10:30:00', 0),
(332, 7, 'Minggu', '11:00:00', '12:30:00', 0),
(333, 7, 'Minggu', '13:00:00', '14:30:00', 0),
(334, 7, 'Minggu', '15:00:00', '16:30:00', 0),
(335, 7, 'Minggu', '17:00:00', '18:30:00', 0),
(336, 7, 'Minggu', '19:00:00', '20:30:00', 1),
(337, 9, 'Senin', '09:00:00', '10:30:00', 1),
(338, 9, 'Senin', '11:00:00', '12:30:00', 1),
(339, 9, 'Senin', '13:00:00', '14:30:00', 0),
(340, 9, 'Senin', '15:00:00', '16:30:00', 0),
(341, 9, 'Senin', '17:00:00', '18:30:00', 0),
(342, 9, 'Senin', '19:00:00', '20:30:00', 0),
(343, 9, 'Selasa', '09:00:00', '10:30:00', 0),
(344, 9, 'Selasa', '11:00:00', '12:30:00', 0),
(345, 9, 'Selasa', '13:00:00', '14:30:00', 0),
(346, 9, 'Selasa', '15:00:00', '16:30:00', 0),
(347, 9, 'Selasa', '17:00:00', '18:30:00', 0),
(348, 9, 'Selasa', '19:00:00', '20:30:00', 0),
(349, 9, 'Rabu', '09:00:00', '10:30:00', 1),
(350, 9, 'Rabu', '11:00:00', '12:30:00', 1),
(351, 9, 'Rabu', '13:00:00', '14:30:00', 0),
(352, 9, 'Rabu', '15:00:00', '16:30:00', 0),
(353, 9, 'Rabu', '17:00:00', '18:30:00', 0),
(354, 9, 'Rabu', '19:00:00', '20:30:00', 0),
(355, 9, 'Kamis', '09:00:00', '10:30:00', 0),
(356, 9, 'Kamis', '11:00:00', '12:30:00', 0),
(357, 9, 'Kamis', '13:00:00', '14:30:00', 0),
(358, 9, 'Kamis', '15:00:00', '16:30:00', 0),
(359, 9, 'Kamis', '17:00:00', '18:30:00', 0),
(360, 9, 'Kamis', '19:00:00', '20:30:00', 0),
(361, 9, 'Jumat', '09:00:00', '10:30:00', 0),
(362, 9, 'Jumat', '11:00:00', '12:30:00', 0),
(363, 9, 'Jumat', '13:00:00', '14:30:00', 0),
(364, 9, 'Jumat', '15:00:00', '16:30:00', 0),
(365, 9, 'Jumat', '17:00:00', '18:30:00', 0),
(366, 9, 'Jumat', '19:00:00', '20:30:00', 0),
(367, 9, 'Sabtu', '09:00:00', '10:30:00', 0),
(368, 9, 'Sabtu', '11:00:00', '12:30:00', 0),
(369, 9, 'Sabtu', '13:00:00', '14:30:00', 0),
(370, 9, 'Sabtu', '15:00:00', '16:30:00', 0),
(371, 9, 'Sabtu', '17:00:00', '18:30:00', 0),
(372, 9, 'Sabtu', '19:00:00', '20:30:00', 0),
(373, 9, 'Minggu', '09:00:00', '10:30:00', 0),
(374, 9, 'Minggu', '11:00:00', '12:30:00', 0),
(375, 9, 'Minggu', '13:00:00', '14:30:00', 0),
(376, 9, 'Minggu', '15:00:00', '16:30:00', 0),
(377, 9, 'Minggu', '17:00:00', '18:30:00', 0),
(378, 9, 'Minggu', '19:00:00', '20:30:00', 0),
(379, 10, 'Senin', '09:00:00', '10:30:00', 0),
(380, 10, 'Senin', '11:00:00', '12:30:00', 0),
(381, 10, 'Senin', '13:00:00', '14:30:00', 0),
(382, 10, 'Senin', '15:00:00', '16:30:00', 0),
(383, 10, 'Senin', '17:00:00', '18:30:00', 0),
(384, 10, 'Senin', '19:00:00', '20:30:00', 0),
(385, 10, 'Selasa', '09:00:00', '10:30:00', 0),
(386, 10, 'Selasa', '11:00:00', '12:30:00', 0),
(387, 10, 'Selasa', '13:00:00', '14:30:00', 0),
(388, 10, 'Selasa', '15:00:00', '16:30:00', 0),
(389, 10, 'Selasa', '17:00:00', '18:30:00', 0),
(390, 10, 'Selasa', '19:00:00', '20:30:00', 0),
(391, 10, 'Rabu', '09:00:00', '10:30:00', 0),
(392, 10, 'Rabu', '11:00:00', '12:30:00', 0),
(393, 10, 'Rabu', '13:00:00', '14:30:00', 0),
(394, 10, 'Rabu', '15:00:00', '16:30:00', 0),
(395, 10, 'Rabu', '17:00:00', '18:30:00', 0),
(396, 10, 'Rabu', '19:00:00', '20:30:00', 0),
(397, 10, 'Kamis', '09:00:00', '10:30:00', 0),
(398, 10, 'Kamis', '11:00:00', '12:30:00', 0),
(399, 10, 'Kamis', '13:00:00', '14:30:00', 0),
(400, 10, 'Kamis', '15:00:00', '16:30:00', 0),
(401, 10, 'Kamis', '17:00:00', '18:30:00', 0),
(402, 10, 'Kamis', '19:00:00', '20:30:00', 0),
(403, 10, 'Jumat', '09:00:00', '10:30:00', 0),
(404, 10, 'Jumat', '11:00:00', '12:30:00', 0),
(405, 10, 'Jumat', '13:00:00', '14:30:00', 0),
(406, 10, 'Jumat', '15:00:00', '16:30:00', 0),
(407, 10, 'Jumat', '17:00:00', '18:30:00', 0),
(408, 10, 'Jumat', '19:00:00', '20:30:00', 0),
(409, 10, 'Sabtu', '09:00:00', '10:30:00', 0),
(410, 10, 'Sabtu', '11:00:00', '12:30:00', 0),
(411, 10, 'Sabtu', '13:00:00', '14:30:00', 0),
(412, 10, 'Sabtu', '15:00:00', '16:30:00', 0),
(413, 10, 'Sabtu', '17:00:00', '18:30:00', 0),
(414, 10, 'Sabtu', '19:00:00', '20:30:00', 0),
(415, 10, 'Minggu', '09:00:00', '10:30:00', 0),
(416, 10, 'Minggu', '11:00:00', '12:30:00', 0),
(417, 10, 'Minggu', '13:00:00', '14:30:00', 0),
(418, 10, 'Minggu', '15:00:00', '16:30:00', 0),
(419, 10, 'Minggu', '17:00:00', '18:30:00', 0),
(420, 10, 'Minggu', '19:00:00', '20:30:00', 0),
(421, 11, 'Senin', '09:00:00', '10:30:00', 0),
(422, 11, 'Senin', '11:00:00', '12:30:00', 0),
(423, 11, 'Senin', '13:00:00', '14:30:00', 0),
(424, 11, 'Senin', '15:00:00', '16:30:00', 0),
(425, 11, 'Senin', '17:00:00', '18:30:00', 0),
(426, 11, 'Senin', '19:00:00', '20:30:00', 0),
(427, 11, 'Selasa', '09:00:00', '10:30:00', 0),
(428, 11, 'Selasa', '11:00:00', '12:30:00', 0),
(429, 11, 'Selasa', '13:00:00', '14:30:00', 0),
(430, 11, 'Selasa', '15:00:00', '16:30:00', 0),
(431, 11, 'Selasa', '17:00:00', '18:30:00', 0),
(432, 11, 'Selasa', '19:00:00', '20:30:00', 0),
(433, 11, 'Rabu', '09:00:00', '10:30:00', 0),
(434, 11, 'Rabu', '11:00:00', '12:30:00', 0),
(435, 11, 'Rabu', '13:00:00', '14:30:00', 0),
(436, 11, 'Rabu', '15:00:00', '16:30:00', 0),
(437, 11, 'Rabu', '17:00:00', '18:30:00', 0),
(438, 11, 'Rabu', '19:00:00', '20:30:00', 0),
(439, 11, 'Kamis', '09:00:00', '10:30:00', 0),
(440, 11, 'Kamis', '11:00:00', '12:30:00', 0),
(441, 11, 'Kamis', '13:00:00', '14:30:00', 0),
(442, 11, 'Kamis', '15:00:00', '16:30:00', 0),
(443, 11, 'Kamis', '17:00:00', '18:30:00', 0),
(444, 11, 'Kamis', '19:00:00', '20:30:00', 0),
(445, 11, 'Jumat', '09:00:00', '10:30:00', 0),
(446, 11, 'Jumat', '11:00:00', '12:30:00', 0),
(447, 11, 'Jumat', '13:00:00', '14:30:00', 0),
(448, 11, 'Jumat', '15:00:00', '16:30:00', 0),
(449, 11, 'Jumat', '17:00:00', '18:30:00', 0),
(450, 11, 'Jumat', '19:00:00', '20:30:00', 0),
(451, 11, 'Sabtu', '09:00:00', '10:30:00', 0),
(452, 11, 'Sabtu', '11:00:00', '12:30:00', 0),
(453, 11, 'Sabtu', '13:00:00', '14:30:00', 0),
(454, 11, 'Sabtu', '15:00:00', '16:30:00', 0),
(455, 11, 'Sabtu', '17:00:00', '18:30:00', 0),
(456, 11, 'Sabtu', '19:00:00', '20:30:00', 0),
(457, 11, 'Minggu', '09:00:00', '10:30:00', 0),
(458, 11, 'Minggu', '11:00:00', '12:30:00', 0),
(459, 11, 'Minggu', '13:00:00', '14:30:00', 0),
(460, 11, 'Minggu', '15:00:00', '16:30:00', 0),
(461, 11, 'Minggu', '17:00:00', '18:30:00', 0),
(462, 11, 'Minggu', '19:00:00', '20:30:00', 0),
(463, 14, 'Senin', '09:00:00', '10:30:00', 0),
(464, 14, 'Senin', '11:00:00', '12:30:00', 0),
(465, 14, 'Senin', '13:00:00', '14:30:00', 0),
(466, 14, 'Senin', '15:00:00', '16:30:00', 0),
(467, 14, 'Senin', '17:00:00', '18:30:00', 0),
(468, 14, 'Senin', '19:00:00', '20:30:00', 0),
(469, 14, 'Selasa', '09:00:00', '10:30:00', 0),
(470, 14, 'Selasa', '11:00:00', '12:30:00', 0),
(471, 14, 'Selasa', '13:00:00', '14:30:00', 0),
(472, 14, 'Selasa', '15:00:00', '16:30:00', 0),
(473, 14, 'Selasa', '17:00:00', '18:30:00', 0),
(474, 14, 'Selasa', '19:00:00', '20:30:00', 0),
(475, 14, 'Rabu', '09:00:00', '10:30:00', 0),
(476, 14, 'Rabu', '11:00:00', '12:30:00', 0),
(477, 14, 'Rabu', '13:00:00', '14:30:00', 0),
(478, 14, 'Rabu', '15:00:00', '16:30:00', 0),
(479, 14, 'Rabu', '17:00:00', '18:30:00', 0),
(480, 14, 'Rabu', '19:00:00', '20:30:00', 0),
(481, 14, 'Kamis', '09:00:00', '10:30:00', 0),
(482, 14, 'Kamis', '11:00:00', '12:30:00', 0),
(483, 14, 'Kamis', '13:00:00', '14:30:00', 0),
(484, 14, 'Kamis', '15:00:00', '16:30:00', 0),
(485, 14, 'Kamis', '17:00:00', '18:30:00', 0),
(486, 14, 'Kamis', '19:00:00', '20:30:00', 0),
(487, 14, 'Jumat', '09:00:00', '10:30:00', 0),
(488, 14, 'Jumat', '11:00:00', '12:30:00', 0),
(489, 14, 'Jumat', '13:00:00', '14:30:00', 0),
(490, 14, 'Jumat', '15:00:00', '16:30:00', 0),
(491, 14, 'Jumat', '17:00:00', '18:30:00', 0),
(492, 14, 'Jumat', '19:00:00', '20:30:00', 0),
(493, 14, 'Sabtu', '09:00:00', '10:30:00', 0),
(494, 14, 'Sabtu', '11:00:00', '12:30:00', 0),
(495, 14, 'Sabtu', '13:00:00', '14:30:00', 0),
(496, 14, 'Sabtu', '15:00:00', '16:30:00', 0),
(497, 14, 'Sabtu', '17:00:00', '18:30:00', 0),
(498, 14, 'Sabtu', '19:00:00', '20:30:00', 0),
(499, 14, 'Minggu', '09:00:00', '10:30:00', 0),
(500, 14, 'Minggu', '11:00:00', '12:30:00', 0),
(501, 14, 'Minggu', '13:00:00', '14:30:00', 0),
(502, 14, 'Minggu', '15:00:00', '16:30:00', 0),
(503, 14, 'Minggu', '17:00:00', '18:30:00', 0),
(504, 14, 'Minggu', '19:00:00', '20:30:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pemesanan_perminggu`
--

CREATE TABLE `jadwal_pemesanan_perminggu` (
  `id_jadwal_pemesanan_perminggu` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_jadwal_available` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_penggantis`
--

CREATE TABLE `jadwal_penggantis` (
  `id_jadwal_pengganti` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_jadwal_pemesanan_perminggu` int(11) DEFAULT NULL,
  `waktu_pengganti` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` bigint(20) UNSIGNED NOT NULL,
  `nama_jenjang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_per_pertemuan` int(11) DEFAULT NULL,
  `upah_guru_per_pertemuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `harga_per_pertemuan`, `upah_guru_per_pertemuan`) VALUES
(1, 'SD', 120000, 90000),
(2, 'SMP', 170000, 140000),
(3, 'SMA', 200000, 170000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_bobot_targets`
--

CREATE TABLE `kriteria_bobot_targets` (
  `id_kriteria_bobot_target` bigint(20) UNSIGNED NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot` double(8,2) DEFAULT NULL,
  `faktor_kriteria` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_target` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria_bobot_targets`
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
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` bigint(20) UNSIGNED NOT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `nama_mapel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Struktur dari tabel `pemesanan`
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
-- Struktur dari tabel `pendaftaran_guru`
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

--
-- Dumping data untuk tabel `pendaftaran_guru`
--

INSERT INTO `pendaftaran_guru` (`id_pendaftaran`, `id_season`, `id_user`, `dir_cv`, `dir_video`, `status`, `pengalaman_mengajar`, `nilai_ipk`) VALUES
(1, NULL, 1, 'file_cv_1.docx', NULL, NULL, 16, 3.37),
(2, NULL, 2, 'file_cv_2.pdf', 'video_microteaching_2.mp4', NULL, 24, 3.57),
(3, NULL, 3, 'file_cv_3.pdf', 'video_microteaching_3.mp4', NULL, 36, 2.50),
(4, NULL, 4, 'file_cv_4.pdf', 'video_microteaching_4.mp4', NULL, 48, 3.31),
(5, NULL, 5, 'file_cv_5.pdf', 'video_microteaching_5.mp4', NULL, 24, 3.89),
(6, NULL, 6, NULL, 'video_microteaching_6.mp4', NULL, 28, 3.45),
(7, NULL, 8, NULL, NULL, NULL, 72, 3.60),
(8, NULL, 7, 'file_cv_8.pdf', 'video_microteaching_8.mp4', NULL, 18, 3.30),
(9, NULL, 9, NULL, 'video_microteaching_9.mp4', NULL, 4, 3.53),
(10, NULL, 10, 'file_cv_10.pdf', 'video_microteaching_10.mp4', NULL, 60, 3.67),
(11, NULL, 11, 'file_cv_11.pdf', 'video_microteaching_11.mp4', NULL, 36, 3.64),
(12, NULL, 14, 'file_cv_12.pdf', 'video_microteaching_12.mp4', NULL, 24, 3.70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_matching`
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

--
-- Dumping data untuk tabel `profile_matching`
--

INSERT INTO `profile_matching` (`id_profile_matching`, `id_pendaftaran_guru`, `pm_pk`, `pm_vas`, `pm_kk`, `pm_cm`, `pm_pemat`, `pm_ipk`, `pm_usia`, `pm_km`, `pm_gap_pk`, `pm_gap_vas`, `pm_gap_kk`, `pm_gap_cm`, `pm_gap_pemat`, `pm_gap_ipk`, `pm_gap_usia`, `pm_gap_km`, `pm_bobot_pk`, `pm_bobot_vas`, `pm_bobot_kk`, `pm_bobot_cm`, `pm_bobot_pemat`, `pm_bobot_ipk`, `pm_bobot_usia`, `pm_bobot_km`, `pm_ncf`, `pm_scf`, `pm_result`) VALUES
(1, 1, 3.00, NULL, NULL, NULL, NULL, 4.00, 4.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 4.00, NULL, NULL, NULL, NULL, 5.00, 4.00, 3.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 5.00, NULL, NULL, NULL, NULL, 2.00, 3.00, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, 5.00, NULL, NULL, NULL, NULL, 4.00, 5.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, 4.00, NULL, NULL, NULL, NULL, 5.00, 5.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, 5.00, NULL, NULL, NULL, NULL, 4.00, 3.00, 3.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, 5.00, NULL, NULL, NULL, NULL, 5.00, 4.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, 3.00, NULL, NULL, NULL, NULL, 4.00, NULL, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 8, 3.00, NULL, NULL, NULL, NULL, 4.00, NULL, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 8, 3.00, NULL, NULL, NULL, NULL, 4.00, 4.00, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 9, 1.00, NULL, NULL, NULL, NULL, 5.00, NULL, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 10, 5.00, NULL, NULL, NULL, NULL, 5.00, 4.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 11, 5.00, NULL, NULL, NULL, NULL, 5.00, 4.00, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 2, 4.00, NULL, NULL, NULL, NULL, 5.00, 4.00, 3.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 12, 4.00, NULL, NULL, NULL, NULL, 5.00, 5.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` bigint(20) UNSIGNED NOT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `jumlah_rating` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `season`
--

CREATE TABLE `season` (
  `id_season` bigint(20) UNSIGNED NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `upah_guru`
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
-- Struktur dari tabel `users`
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

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `socialite_id`, `socialite_name`, `avatar`, `name`, `email`, `jenis_kelamin`, `tanggal_lahir`, `no_handphone`, `role`, `universitas`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Ginavrm9NYc6xk29kH4-f5AlynqyKALGJtapv-5uw', 'Isnaendi Ruhyana', 'isna.pmb09@gmail.com', 'laki-laki', '1991-01-28', '085692150162', 0, 'Universitas Negeri Jakarta', NULL, NULL, 'XnURkgEsjGj2ZxB0yrElm2Eel4OKfiU7lNIGgjhiq23XGDZzG6LHuj9Ej3yS', '2020-06-28 19:59:33', '2020-06-28 20:08:27'),
(2, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GjCIBVrIchnl5o91wbGn7vMXNYi_hm1Iy37qUht9Q', 'Ilham Jaya', 'ilhamjaya185@gmail.com', 'laki-laki', '1991-11-27', '085714825791', 0, 'Universitas Negeri Jakarta', NULL, NULL, 'dXXSoar8MUOrk2ioUNRAJAtfIMaANDrfz5wqJKQNIDgxNy7cWp3NVmYqGVbR', '2020-06-28 20:10:23', '2020-06-28 20:33:28'),
(3, NULL, NULL, 'https://lh6.googleusercontent.com/-ygQciYDgoXk/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnTouJXwsv9DXERYjGzATkf1RJzGw/photo.jpg', 'wahyu hendana', 'hendanawahyu46@gmail.com', 'laki-laki', '1988-11-22', '085697457933', 0, 'IPB', NULL, NULL, 'pdFPYPtptqx5GeE4yrECj8mB0AccFFcxzvUk4GHMneSGLmWMROGmV4HD5Z6U', '2020-06-28 20:34:57', '2020-06-28 21:03:31'),
(4, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhEzVvjcSLXLqE9G9HHe6naylmiRABz4QxCHfDldA', 'maulida siti maryam', 'maulidasmaryam@gmail.com', 'perempuan', '1995-11-27', '082253445282', 0, 'Universitas Tanjungpura', NULL, NULL, 'Z9T6jiP9CnKjXTWqBj5pmUK6x60798FFccoA9ZCoDbjKY7Es2PSZoDiWx3BG', '2020-06-28 21:05:09', '2020-06-28 21:19:05'),
(5, NULL, NULL, 'https://lh4.googleusercontent.com/-ZSvXS-P4aVM/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclNig2MCEXO1s2arvfUyf1lQaKmHA/photo.jpg', 'raka firman', 'rakafrmn@gmail.com', 'laki-laki', '1995-12-07', '089630621068', 0, 'ITB', NULL, NULL, 'D3EOHUTDCSWVw2lYL6JIR0EcJQ9CN2IgKEAHNgBSU9N8PfiIZfX8QYmakcdN', '2020-06-28 21:20:30', '2020-06-28 21:32:23'),
(6, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GimZW2uGRwRbg8roBWx1ClpBB5O6FBzsGy0rZ8Daw', 'Abdul Ghofur', 'ghofurabdul722@gmail.com', 'laki-laki', '1989-06-28', '087886152826', 0, 'Universitas Indraprasta PGRI', NULL, NULL, 'ea03PIXqPxEswLJiOOljORmOAdYCYe3H2HVtlicZ1sAGgwDeSuGCzSz0xPLk', '2020-06-28 21:33:51', '2020-06-28 21:52:29'),
(7, NULL, NULL, 'https://lh5.googleusercontent.com/-awkNhy3UJgQ/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuck2-vtl3lWCa3lifxHoPf5m8Gr5JQ/photo.jpg', 'Yuda Sulistianto', 'yudasulistiantowahid@gmail.com', 'laki-laki', '1992-09-11', '082260295662', 0, 'Universitas Pendidikan Indonesia', NULL, NULL, 'H0KQJ5YWm0iIm1ayEGekId0oiTOph0bpd5eS6xJYsxgp3dWMuPMAVYalRKJW', '2020-06-28 23:41:32', '2020-06-28 23:55:31'),
(8, NULL, NULL, 'foto_profile_8.jpeg', 'DSR', 'dede.nezt@gmail.com', 'laki-laki', '1991-02-18', '+6285714377430', 0, 'Universitas Pakuan', NULL, NULL, 'PfodTXnBras8RRQL5XDvfOK47w7YmGYF2bjxKh3KmE3u1XlzOKNkG7atTmRu', '2020-06-28 23:41:36', '2020-06-28 23:50:52'),
(9, NULL, NULL, 'https://lh3.googleusercontent.com/-nmfNwKwLG34/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnxIv048tvi9hQrGQjVS7p85nm2bA/photo.jpg', 'Anita Ayu', 'anitaasyh@gmail.com', 'perempuan', '1996-07-23', '083873645463', 0, 'Universitas Negeri Jakarta', NULL, NULL, 'TUpNmwnraciJJyhAUgMwsYRfa0xyLvnKlyROiWEeTSKqsXcn9CnFaDD8GSHd', '2020-06-29 00:09:37', '2020-06-29 00:21:45'),
(10, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GiwoX4lFExVpJIZfIxuAMmPpG1cUko7iYUewIN2Ug', 'Hikmah Insani', 'hikmahinzaghi@gmail.com', 'perempuan', '1992-04-27', '085722040470', 0, 'UPI', NULL, NULL, 'iNmo4ZeXAxj5Q8OeEtEzC6z2mFsvEMv3GzT2xEmhLvQk3tm02Kpkhj4OEZQ7', '2020-06-29 00:23:51', '2020-06-29 00:30:16'),
(11, NULL, NULL, 'https://lh5.googleusercontent.com/-Un9Cgtu_xcA/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuckShoB1n6-p70DlK__Dn9_nUjAJLA/photo.jpg', 'ega nanda', 'enanda295@gmail.com', 'perempuan', '1994-03-05', '085730189789', 0, 'Universitas Negeri Surabaya', NULL, NULL, 'pX0KSNEc34LUNUudnNOsRwf1coy0iiaPRidrtyqoVnIBL4zKShcC8VmAgSxW', '2020-06-29 00:24:51', '2020-06-29 00:30:43'),
(12, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhlCzZfQeL8Wm8ug3prrVj4yPT8Ll0O33i921tqAw', 'Dimas Pratama', 'dimaspratama22@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3FxCKig6jdUwcPEUlNQdwcU11CAlN35t3Fx6c6dplB7sshoiHLxSwm2QkwDb', '2020-06-29 02:38:23', '2020-06-29 02:38:23'),
(13, NULL, NULL, 'https://lh3.googleusercontent.com/-nNizq8ANJhs/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclTPodfu5btnrhjhwQ13Vpu4SFEtA/photo.jpg', 'Sita Sinthya', 'sinthyasita@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7tG9nLhTBwNt1t7sHvLO1rbBz9mjawB6XGZpd7fL6Jat24z6jbyxNX9VwTqT', '2020-06-29 02:42:54', '2020-06-29 02:42:54'),
(14, NULL, NULL, 'foto_profile_14.PNG', 'Asymala Permata Sari', 'asymalapsari@gmail.com', 'perempuan', '1998-04-11', '081807879100', 0, 'Politeknik Negeri Jakarta', NULL, NULL, '3FOpVcWRLqc2HAspzxvdDvCAo0XZYRahZJiv0q10tjfvREmYlq52MjqVdccv', '2020-06-30 08:08:43', '2020-06-30 08:15:34');

-- --------------------------------------------------------

--
-- Struktur untuk view `absen_pembayaran`
--
DROP TABLE IF EXISTS `absen_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`local`@`localhost` SQL SECURITY DEFINER VIEW `absen_pembayaran`  AS  select `p`.`id_murid` AS `id_murid`,`p`.`id_pemesanan` AS `id_pemesanan`,`p`.`id_guru` AS `id_guru`,count(0) AS `jumlah_absen`,extract(year from `absen`.`waktu_absen`) AS `tahun`,extract(month from `absen`.`waktu_absen`) AS `bulan` from (`absen` join `pemesanan` `p` on(`p`.`id_pemesanan` = `absen`.`id_pemesanan`)) group by extract(year from `absen`.`waktu_absen`),extract(month from `absen`.`waktu_absen`),`p`.`id_pemesanan`,`p`.`id_guru`,`p`.`id_murid` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `grafikguru`
--
DROP TABLE IF EXISTS `grafikguru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`local`@`localhost` SQL SECURITY DEFINER VIEW `grafikguru`  AS  select `table_a`.`counts` - count(0) AS `jumlah_guru_belum_dapat`,count(0) AS `jumlah_guru_sudah_dapat`,concat(monthname(`pemesanan`.`waktu_pemesanan`),' ',extract(year from `pemesanan`.`waktu_pemesanan`)) AS `bulan_tahun` from (`pemesanan` join (select count(0) AS `counts` from `users` where `users`.`role` = 2) `table_a`) group by concat(monthname(`pemesanan`.`waktu_pemesanan`),' ',extract(year from `pemesanan`.`waktu_pemesanan`)),`table_a`.`counts` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `grafikpemesanan`
--
DROP TABLE IF EXISTS `grafikpemesanan`;
-- Kesalahan membaca struktur untuk tabel easypriv_easyprivate_real.grafikpemesanan: #1271 - Illegal mix of collations for operation 'UNION'

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indeks untuk tabel `jadwal_available`
--
ALTER TABLE `jadwal_available`
  ADD PRIMARY KEY (`id_jadwal_available`);

--
-- Indeks untuk tabel `jadwal_pemesanan_perminggu`
--
ALTER TABLE `jadwal_pemesanan_perminggu`
  ADD PRIMARY KEY (`id_jadwal_pemesanan_perminggu`);

--
-- Indeks untuk tabel `jadwal_penggantis`
--
ALTER TABLE `jadwal_penggantis`
  ADD PRIMARY KEY (`id_jadwal_pengganti`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `kriteria_bobot_targets`
--
ALTER TABLE `kriteria_bobot_targets`
  ADD PRIMARY KEY (`id_kriteria_bobot_target`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pendaftaran_guru`
--
ALTER TABLE `pendaftaran_guru`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `profile_matching`
--
ALTER TABLE `profile_matching`
  ADD PRIMARY KEY (`id_profile_matching`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id_season`);

--
-- Indeks untuk tabel `upah_guru`
--
ALTER TABLE `upah_guru`
  ADD PRIMARY KEY (`id_upah_guru`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id_guru_mapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `jadwal_available`
--
ALTER TABLE `jadwal_available`
  MODIFY `id_jadwal_available` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pemesanan_perminggu`
--
ALTER TABLE `jadwal_pemesanan_perminggu`
  MODIFY `id_jadwal_pemesanan_perminggu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_penggantis`
--
ALTER TABLE `jadwal_penggantis`
  MODIFY `id_jadwal_pengganti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriteria_bobot_targets`
--
ALTER TABLE `kriteria_bobot_targets`
  MODIFY `id_kriteria_bobot_target` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_guru`
--
ALTER TABLE `pendaftaran_guru`
  MODIFY `id_pendaftaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `profile_matching`
--
ALTER TABLE `profile_matching`
  MODIFY `id_profile_matching` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `season`
--
ALTER TABLE `season`
  MODIFY `id_season` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `upah_guru`
--
ALTER TABLE `upah_guru`
  MODIFY `id_upah_guru` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
