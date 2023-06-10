-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Jun 2023 pada 02.29
-- Versi server: 10.5.20-MariaDB-cll-lve
-- Versi PHP: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlhc6352_plavon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `copy_right` varchar(20) NOT NULL,
  `version` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ig` varchar(50) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `yt` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `title`, `owner_name`, `alamat`, `tlp`, `logo`, `copy_right`, `version`, `email`, `ig`, `fb`, `yt`) VALUES
(1, 'Plavon', 'Dani Lukman', 'Sirau Kemranjen Banyumas', '085797887711', 'WhatsApp_Image_2023-02-19_at_00.59.38-removebg-preview.png', '@plavon', '0.0.1', 'danilukman2206@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `user_id`, `nama_barang`, `jenis`, `stok`, `harga`, `ukuran`, `image`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(3, 1, 'Mie sedap', 'Makanan', 98, 20000, 'l', 'mie.jpg', '', '<p>adasdasds</p>', '2023-05-20 14:25:15', NULL),
(4, 1, 'Gorengan', 'makanan', 100, 20000, '2', 'gorengan.jpg', '', '<p>asdasdasdasd</p>', '2023-05-21 16:43:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `nama_bulan` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id`, `nama_bulan`, `created_at`, `updated_at`) VALUES
(1, 'Januari', '2023-05-03 10:20:17', '0000-00-00 00:00:00'),
(2, 'Februari', '2023-05-03 10:24:42', '0000-00-00 00:00:00'),
(3, 'Maret', '2023-05-03 10:24:56', '0000-00-00 00:00:00'),
(4, 'April', '2023-05-10 01:37:12', '0000-00-00 00:00:00'),
(5, 'Mei', '2023-05-10 01:37:29', '0000-00-00 00:00:00'),
(6, 'Juni', '2023-05-10 01:38:09', '0000-00-00 00:00:00'),
(7, 'Juli', '2023-05-10 01:38:26', '0000-00-00 00:00:00'),
(8, 'Agustus', '2023-05-10 01:43:41', '0000-00-00 00:00:00'),
(9, 'September', '2023-05-10 01:43:55', '0000-00-00 00:00:00'),
(10, 'Oktober', '2023-05-10 01:44:09', '0000-00-00 00:00:00'),
(11, 'November', '2023-05-10 01:44:23', '0000-00-00 00:00:00'),
(12, 'Desember', '2023-05-10 01:44:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `count_manager`
--

CREATE TABLE `count_manager` (
  `id` int(11) NOT NULL,
  `nama_cm` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `count_manager`
--

INSERT INTO `count_manager` (`id`, `nama_cm`, `created_at`, `updated_at`) VALUES
(1, 'MAWASPRIBADI D.H', '2023-05-10 05:41:28', '2023-05-09 22:41:31'),
(2, 'FARIS SAPUTRA', '2023-05-09 22:41:50', '0000-00-00 00:00:00'),
(3, 'SHOP SALES', '2023-05-09 22:42:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `count_manager_id` int(11) NOT NULL,
  `kode_distributor` char(10) NOT NULL,
  `users_id` int(11) NOT NULL,
  `penjab_id` int(11) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `area` varchar(225) DEFAULT NULL,
  `jumlah_agen` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id`, `count_manager_id`, `kode_distributor`, `users_id`, `penjab_id`, `kontak`, `alamat`, `area`, `jumlah_agen`, `created_at`, `updated_at`) VALUES
(6, 1, '01', 950674, 1, '088298864380', 'No19 jl Tarudan Widoro Mredo Bangunharjo Kec Sewon', 'Jogja, Bantul, Wates, Gn. Kidul, Sleman, Muntilan.', 1, '2023-05-20 09:30:56', '0000-00-00 00:00:00'),
(10, 1, '02', 222160, 3, '089672222983', 'Jl. Kejayaan No. 1 Muktisari, Kebumen, JawaTengah', 'Kebumen, Kutoarjo, Purworejo', NULL, '2023-05-20 02:17:50', '0000-00-00 00:00:00'),
(11, 1, '03', 880529, 4, '088298864380', 'No19 jl Tarudan Widoro Mredo Bangunharjo Kec Sewon', 'Jogja, Bantul, Wates, Gn. Kidul, Sleman, Muntilan.', NULL, '2023-05-20 07:36:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'agus.ibad33@gmail.com', '$2y$10$VLcfhrjYlxfjGOWYLsLzuODshmf19e9mjU3OJGDvzAbBolP9tD9G6', '2023-05-22 05:27:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `status` varchar(30) NOT NULL,
  `order_id` int(11) NOT NULL,
  `redirect_url` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_user`, `id_barang`, `jumlah`, `harga`, `status`, `order_id`, `redirect_url`, `created_at`) VALUES
(21, 1, 3, 20, 20000, 'lunas', 6117975, 'https://app.sandbox.midtrans.com/snap/v3/redirection/a215fedc-b6ef-46f8-9421-2deb1c16353a', '2023-05-30 14:25:38'),
(22, 1, 3, 80, 20000, 'belum bayar', 9018503, 'https://app.sandbox.midtrans.com/snap/v3/redirection/a5a5aea5-0bcd-413d-9266-d6ae7cb9737b', '2023-05-30 07:33:06'),
(23, 1, 3, 3, 20000, 'belum bayar', 2430008, 'https://app.sandbox.midtrans.com/snap/v3/redirection/a560fcac-485a-477f-9bae-ce7fca0db42f', '2023-06-01 06:06:35'),
(24, 1, 3, 1, 20000, 'belum bayar', 4741258, 'https://app.sandbox.midtrans.com/snap/v3/redirection/874fb709-5baa-4d9b-90c8-4f6063c5232b', '2023-06-01 06:09:57'),
(25, 1, 4, 2, 20000, 'belum bayar', 4896669, 'https://app.sandbox.midtrans.com/snap/v3/redirection/c4999037-6fba-48f8-85be-57edca1abe80', '2023-06-01 06:10:34'),
(26, 1, 3, 10, 20000, 'belum bayar', 2409795, 'https://app.sandbox.midtrans.com/snap/v3/redirection/2dca9680-44b6-4027-9380-2e28db72a361', '2023-06-03 08:07:53'),
(27, 1, 3, 10, 20000, 'belum bayar', 1336129, 'https://app.sandbox.midtrans.com/snap/v3/redirection/3c7aea4f-fd92-4453-8c2a-1851efa56211', '2023-06-03 08:07:55'),
(28, 1, 3, 10, 20000, 'belum bayar', 120560, 'https://app.sandbox.midtrans.com/snap/v3/redirection/1fdfad42-2bb2-4bbc-8d2c-06b5385e47cc', '2023-06-03 08:07:56'),
(29, 1, 3, 10, 20000, 'belum bayar', 2434546, 'https://app.sandbox.midtrans.com/snap/v3/redirection/36c9df7a-a1ce-4b0f-bb4b-e1eb08e2b50e', '2023-06-03 08:07:57'),
(30, 1, 3, 1, 20000, 'belum bayar', 3834144, 'https://app.sandbox.midtrans.com/snap/v3/redirection/d0367b08-1921-4d70-bd7b-b506a1ecd045', '2023-06-03 08:07:58'),
(31, 1, 3, 1, 20000, 'belum bayar', 3039331, 'https://app.sandbox.midtrans.com/snap/v3/redirection/cc6d03cd-9968-4115-bf99-c03f2cbd1b4e', '2023-06-03 08:07:58'),
(32, 1, 3, 1, 20000, 'belum bayar', 9117707, 'https://app.sandbox.midtrans.com/snap/v3/redirection/ab2d5716-c091-4976-9212-34be4517fd99', '2023-06-03 08:07:59'),
(33, 1, 3, 1, 20000, 'belum bayar', 8089763, 'https://app.sandbox.midtrans.com/snap/v3/redirection/6e152a5b-e042-4086-b91c-88fcca126bd8', '2023-06-03 08:07:59'),
(34, 1, 3, 1, 20000, 'belum bayar', 1957561, 'https://app.sandbox.midtrans.com/snap/v3/redirection/8518959a-e77b-49f6-8a6f-4e5288d4ab90', '2023-06-03 08:08:00'),
(35, 1, 3, 1, 20000, 'belum bayar', 7926558, 'https://app.sandbox.midtrans.com/snap/v3/redirection/6147c4be-6c73-43ff-b26c-436ede9c5b1a', '2023-06-03 08:08:00'),
(36, 1, 4, 200, 20000, 'belum bayar', 5341535, 'https://app.sandbox.midtrans.com/snap/v3/redirection/9554c6bf-da2d-448c-8384-47f5abaf4aab', '2023-06-03 08:09:49'),
(37, 1, 4, 200, 20000, 'belum bayar', 2181469, 'https://app.sandbox.midtrans.com/snap/v3/redirection/96c6b9a4-268d-4ec0-9514-469f02a154d1', '2023-06-03 08:12:10'),
(38, 1, 4, 200, 20000, 'belum bayar', 5996640, 'https://app.sandbox.midtrans.com/snap/v3/redirection/93626045-66e0-4a88-bcf6-f332583aec46', '2023-06-03 08:12:25'),
(39, 1, 4, 2, 20000, 'belum bayar', 8713962, 'https://app.sandbox.midtrans.com/snap/v3/redirection/5eea2c6b-3d9e-4d90-8739-d2d41b824858', '2023-06-03 08:12:46'),
(40, 1, 4, 2, 20000, 'belum bayar', 6362103, 'https://app.sandbox.midtrans.com/snap/v3/redirection/55e84d17-06ba-4ee0-95f3-88c79591f92f', '2023-06-03 08:13:25'),
(41, 1, 4, 2, 20000, 'belum bayar', 8089674, 'https://app.sandbox.midtrans.com/snap/v3/redirection/f1a1c2d2-1285-4abd-8047-27c9bd76232b', '2023-06-03 08:13:54'),
(42, 1, 4, 1, 20000, 'belum bayar', 3193195, 'https://app.sandbox.midtrans.com/snap/v3/redirection/3cf021bc-ab00-422a-b961-75664d3a38d8', '2023-06-03 08:16:02'),
(43, 1, 4, 1, 20000, 'belum bayar', 6927666, 'https://app.sandbox.midtrans.com/snap/v3/redirection/f46671c7-cd8b-4200-bcd4-2be6b165c813', '2023-06-03 08:47:34'),
(44, 1, 4, 2, 20000, 'belum bayar', 2499874, 'https://app.sandbox.midtrans.com/snap/v3/redirection/527cdd52-414c-4c3e-aa02-ac812b6052d1', '2023-06-03 08:50:52'),
(45, 1, 3, 2, 20000, 'belum bayar', 2038534, 'https://app.sandbox.midtrans.com/snap/v3/redirection/37705567-0f1c-4552-ad25-dd5b73a0f592', '2023-06-03 08:51:06'),
(46, 1, 4, 2, 20000, 'belum bayar', 5731168, 'https://app.sandbox.midtrans.com/snap/v3/redirection/7539bb21-403d-4c9c-a373-5c1aec4419f3', '2023-06-03 08:51:15'),
(47, 1, 4, 2, 20000, 'belum bayar', 8322879, 'https://app.sandbox.midtrans.com/snap/v3/redirection/ad9c40d6-6637-4866-a823-87810e98889f', '2023-06-03 08:57:48'),
(48, 1, 4, 3, 20000, 'belum bayar', 7666334, 'https://app.sandbox.midtrans.com/snap/v3/redirection/557d9dd8-3dc4-430c-8edd-d9de31b4c444', '2023-06-03 08:58:35'),
(49, 1, 4, 26, 20000, 'belum bayar', 9810335, 'https://app.sandbox.midtrans.com/snap/v3/redirection/d216c481-41fe-4315-bdb8-fb2f86eaed17', '2023-06-03 09:18:40'),
(50, 1, 3, 50, 20000, 'belum bayar', 8329499, 'https://app.sandbox.midtrans.com/snap/v3/redirection/bd908338-f097-4cac-83d3-529212ee57b8', '2023-06-04 08:37:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjab`
--

CREATE TABLE `penjab` (
  `id` int(11) NOT NULL,
  `nama_penjab` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjab`
--

INSERT INTO `penjab` (`id`, `nama_penjab`, `created_at`, `updated_at`) VALUES
(1, 'MOH FATHUDIN', '2023-05-10 08:23:43', '2023-05-02 09:24:26'),
(3, 'YONATHAN', '2023-05-10 01:24:27', '0000-00-00 00:00:00'),
(4, 'SUHERMANTO', '2023-05-10 01:24:43', '0000-00-00 00:00:00'),
(5, 'ENDAH YUNI S.', '2023-05-10 01:25:00', '0000-00-00 00:00:00'),
(6, 'SUGITO', '2023-05-10 01:25:20', '0000-00-00 00:00:00'),
(7, 'MUKHTAR SARIFUDIN', '2023-05-10 01:25:33', '0000-00-00 00:00:00'),
(8, 'ISTANTO DANAR PRASETYO', '2023-05-10 01:25:51', '0000-00-00 00:00:00'),
(9, 'MARKUS BAGUS SETYONO', '2023-05-10 01:26:08', '0000-00-00 00:00:00'),
(10, 'WAWAN ARIFIANTO', '2023-05-10 01:26:24', '0000-00-00 00:00:00'),
(11, 'SUWARTO', '2023-05-10 01:26:41', '0000-00-00 00:00:00'),
(12, 'AGUS SANTOSO', '2023-05-10 01:26:59', '0000-00-00 00:00:00'),
(13, 'YULI WIDIANTORO', '2023-05-10 01:27:34', '0000-00-00 00:00:00'),
(14, 'HABIB', '2023-05-10 01:27:52', '0000-00-00 00:00:00'),
(15, 'HERU PANCA SAPUTRA', '2023-05-10 01:28:22', '0000-00-00 00:00:00'),
(16, 'MUHAMAD MAWAHIB', '2023-05-10 01:28:52', '0000-00-00 00:00:00'),
(17, 'CHANDRA TRI ANANDA', '2023-05-10 01:30:10', '0000-00-00 00:00:00'),
(18, 'AGUS SULISTYO KARTIKA', '2023-05-10 01:30:36', '0000-00-00 00:00:00'),
(19, 'MUNAWIR', '2023-05-10 01:30:55', '0000-00-00 00:00:00'),
(20, 'AKHMAD MUSTOPA KAMAL', '2023-05-10 01:31:17', '0000-00-00 00:00:00'),
(21, 'ARIS WAHYUDI', '2023-05-10 01:31:28', '0000-00-00 00:00:00'),
(22, 'MUHAMAD LUTFI HAKIM', '2023-05-10 01:31:43', '0000-00-00 00:00:00'),
(23, 'FENDI', '2023-05-10 01:32:04', '0000-00-00 00:00:00'),
(24, 'RUDI / SUSANTO', '2023-05-10 01:32:24', '0000-00-00 00:00:00'),
(25, 'SARNA', '2023-05-10 01:32:36', '0000-00-00 00:00:00'),
(26, 'YUSUP', '2023-05-10 01:32:48', '0000-00-00 00:00:00'),
(27, 'TRI WULANINGSIH', '2023-05-10 01:33:14', '0000-00-00 00:00:00'),
(28, 'ARIEF RAHMAN HAKIM', '2023-05-10 01:33:26', '0000-00-00 00:00:00'),
(29, 'HARSONO SABAR D.', '2023-05-10 01:33:48', '0000-00-00 00:00:00'),
(30, 'FARKHAN ADIB', '2023-05-10 01:34:01', '0000-00-00 00:00:00'),
(31, 'TUH FATUL ASROR', '2023-05-10 01:34:18', '0000-00-00 00:00:00'),
(32, 'BUDI', '2023-05-10 01:34:31', '0000-00-00 00:00:00'),
(33, 'FAJAR NURCAHYO', '2023-05-10 01:34:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `nilai1` double DEFAULT NULL,
  `nilai2` double DEFAULT NULL,
  `nilai3` double DEFAULT NULL,
  `nilai4` double DEFAULT NULL,
  `nilai5` double DEFAULT NULL,
  `nilai6` double DEFAULT NULL,
  `nilai7` double DEFAULT NULL,
  `nilai8` double DEFAULT NULL,
  `nilai9` double DEFAULT NULL,
  `nilai10` double DEFAULT NULL,
  `nilai11` double DEFAULT NULL,
  `nilai12` double DEFAULT NULL,
  `total` double NOT NULL,
  `retur` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `distributor_id`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `nilai6`, `nilai7`, `nilai8`, `nilai9`, `nilai10`, `nilai11`, `nilai12`, `total`, `retur`, `created_at`, `updated_at`) VALUES
(1, 6, 296588920, 246520839, 319121237, 75349841, 207435179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1145016064, NULL, '2023-05-26 13:55:47', '2023-05-26 06:55:46'),
(2, 10, NULL, NULL, NULL, NULL, NULL, 145065000, 178850678, 45064670, 224062254, 136187090, 375595795, 245072253, 1349897739, NULL, '2023-05-26 13:59:56', '2023-05-26 06:59:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '16c98033a9eb5076cad478e49c2938c3cac4f97fae74f58d256a5386ede9c6dc', '[\"*\"]', NULL, NULL, '2023-03-31 11:53:50', '2023-03-31 11:53:50'),
(3, 'App\\Models\\User', 1, 'authToken', '17fb5bca1386eea82d29b767c3ab7d2c5eb52e292d9ba54d3bb1beccce8804a3', '[\"*\"]', '2023-05-09 21:29:07', NULL, '2023-05-09 21:24:29', '2023-05-09 21:29:07'),
(4, 'App\\Models\\User', 1, 'authToken', '5994c4e2311901057a2ec4619cf5e2a4403f6b6eff8303cdc619268f6e51dfbf', '[\"*\"]', '2023-05-15 09:12:47', NULL, '2023-05-09 22:49:49', '2023-05-15 09:12:47'),
(5, 'App\\Models\\User', 1, 'authToken', 'a205240642b28b32c0a35ab366c8b718f08360d99f8671c4ab7554159dc24b65', '[\"*\"]', NULL, NULL, '2023-05-15 07:14:44', '2023-05-15 07:14:44'),
(6, 'App\\Models\\User', 1, 'authToken', '33808ecbb82a721a12e08b792071c1319775214ec46329483dfb18913ea9a0d1', '[\"*\"]', NULL, NULL, '2023-05-15 07:15:48', '2023-05-15 07:15:48'),
(7, 'App\\Models\\User', 1, 'authToken', 'd9a99d1208e82c8cd994969af22de267cd6cbf9b65026f435f987b2a8d650428', '[\"*\"]', NULL, NULL, '2023-05-15 07:45:54', '2023-05-15 07:45:54'),
(8, 'App\\Models\\User', 1, 'authToken', 'd8692dee6a92c8d717d31a573ef5807271dacf285bb6e667f31b897c41368946', '[\"*\"]', '2023-05-15 08:48:07', NULL, '2023-05-15 07:51:58', '2023-05-15 08:48:07'),
(9, 'App\\Models\\User', 1, 'authToken', 'ca186c52343545244f009fe60e9e7a8c11100a6e17c981bcb88173f938e6e1f7', '[\"*\"]', '2023-05-15 08:50:05', NULL, '2023-05-15 08:48:24', '2023-05-15 08:50:05'),
(10, 'App\\Models\\User', 1, 'authToken', '25b8a5b0e447ff331db5b108b4b8a738e71b267fddede5da0b7d5d3a3b20cfe6', '[\"*\"]', '2023-05-15 09:23:29', NULL, '2023-05-15 09:16:05', '2023-05-15 09:23:29'),
(11, 'App\\Models\\User', 1, 'authToken', 'b4266352c9267d67fadcd0786be416374ac08f6a31430b7d7b05087ad2d35aa3', '[\"*\"]', '2023-05-19 04:42:07', NULL, '2023-05-19 04:39:01', '2023-05-19 04:42:07'),
(12, 'App\\Models\\User', 1, 'authToken', '6f1646f17bbd0e04411e7a4c8224f1fec60d5695c16a49cdf6d117917e079eee', '[\"*\"]', '2023-05-21 23:05:49', NULL, '2023-05-19 04:46:34', '2023-05-21 23:05:49'),
(13, 'App\\Models\\User', 1, 'authToken', '9d0bf721b111f8a836c18b30c09557ff4d748d95b170989ebb79c182a0d04ce2', '[\"*\"]', NULL, NULL, '2023-05-19 04:50:16', '2023-05-19 04:50:16'),
(14, 'App\\Models\\User', 1, 'authToken', '3a903df3e28c163ea7b7763a50f8aa349a83e6bab9c86625bf30078f0d345458', '[\"*\"]', NULL, NULL, '2023-05-19 04:51:25', '2023-05-19 04:51:25'),
(15, 'App\\Models\\User', 1, 'authToken', '9cc2af7038a2491755118cd54edffbeb0f84324cceb00a2fdef970f0e9a143ab', '[\"*\"]', NULL, NULL, '2023-05-19 04:53:22', '2023-05-19 04:53:22'),
(16, 'App\\Models\\User', 1, 'authToken', '97017b82bc33ce429537d15c614daa24829f792b2db7383eef7b9641d35ec5d1', '[\"*\"]', NULL, NULL, '2023-05-19 04:53:41', '2023-05-19 04:53:41'),
(17, 'App\\Models\\User', 1, 'authToken', 'f055b96a50b79bc1c783c634634dbb05811f58bb1fd587ca19a2e6c149e1b17c', '[\"*\"]', NULL, NULL, '2023-05-19 04:53:51', '2023-05-19 04:53:51'),
(18, 'App\\Models\\User', 1, 'authToken', '48cf9a5720c45a2b663df426ac66f1b68468d28659e1bea20d8d2751ba920757', '[\"*\"]', NULL, NULL, '2023-05-19 04:57:08', '2023-05-19 04:57:08'),
(19, 'App\\Models\\User', 1, 'authToken', '53641f1923a5a6403f12e007bcae95b318e59a94f8f2dc88b7da0bf78d4c483f', '[\"*\"]', NULL, NULL, '2023-05-19 09:58:19', '2023-05-19 09:58:19'),
(20, 'App\\Models\\User', 1, 'authToken', '376fd454464bc4fab1163d7d4c85cd7824fc581aefebd5a254183a07dedf9624', '[\"*\"]', NULL, NULL, '2023-05-19 20:37:49', '2023-05-19 20:37:49'),
(21, 'App\\Models\\User', 1, 'authToken', '4a3218adadc2f3a3fc40fa6f84f25e3f451a83dbad9c0a47a765baeb62543d37', '[\"*\"]', '2023-05-20 06:37:44', NULL, '2023-05-20 06:17:56', '2023-05-20 06:37:44'),
(22, 'App\\Models\\User', 1, 'authToken', 'b5eaa9b4d75f188b7582b3de0e209478024f95e7d4e2426b116809dfdd2e9951', '[\"*\"]', NULL, NULL, '2023-05-20 06:23:11', '2023-05-20 06:23:11'),
(23, 'App\\Models\\User', 1, 'authToken', '1246b28d42a98706d5e692a037370a3d7547e54867b979af62ef36245ce3a478', '[\"*\"]', '2023-05-20 07:36:13', NULL, '2023-05-20 06:33:48', '2023-05-20 07:36:13'),
(24, 'App\\Models\\User', 1, 'authToken', 'f2b4279d1a6e6b32e6c7f11de0931c741023da46cf992ea4dbf548ca4ab7f629', '[\"*\"]', NULL, NULL, '2023-05-20 07:26:36', '2023-05-20 07:26:36'),
(25, 'App\\Models\\User', 1, 'authToken', 'be54d5df6ede0d8b22d3a1b1921f9f51964325425d23a39c27738825107f979d', '[\"*\"]', '2023-05-20 07:50:47', NULL, '2023-05-20 07:36:38', '2023-05-20 07:50:47'),
(26, 'App\\Models\\User', 1, 'authToken', 'ed14b351d80d402ee8f4bc533a78cf845635250045f8b86df352695e95a56fd1', '[\"*\"]', '2023-05-20 09:53:49', NULL, '2023-05-20 08:03:36', '2023-05-20 09:53:49'),
(27, 'App\\Models\\User', 1, 'authToken', '66f2186776c5d8a766395e488e8cc5c4fc140ab8fc551c6124ad47f77148779b', '[\"*\"]', NULL, NULL, '2023-05-20 08:09:20', '2023-05-20 08:09:20'),
(28, 'App\\Models\\User', 1, 'authToken', '446912e4092008833c986c25ed1b0047e0324b76e5b159dd27c652d73f566b18', '[\"*\"]', NULL, NULL, '2023-05-20 08:23:01', '2023-05-20 08:23:01'),
(29, 'App\\Models\\User', 1, 'authToken', '6a8896adac8c88f8682d1924930e3070dae4ee87c2c52ea8beba82cdbf82bb0f', '[\"*\"]', NULL, NULL, '2023-05-20 08:23:52', '2023-05-20 08:23:52'),
(30, 'App\\Models\\User', 1, 'authToken', '4f88eae71b6d21e671bc3475ef198c410e7f6677d2e20332e25c797aa1cc3b60', '[\"*\"]', NULL, NULL, '2023-05-20 08:26:27', '2023-05-20 08:26:27'),
(31, 'App\\Models\\User', 1, 'authToken', '44751bc89376b2d210df8bd8bd1dd7b0f72e6643cdb52e79ad7b9d8d32490b6e', '[\"*\"]', NULL, NULL, '2023-05-20 08:28:40', '2023-05-20 08:28:40'),
(32, 'App\\Models\\User', 1, 'authToken', '5a64178ef51597befe702132fd8f0f220b2c90d13c40732d379d7f7a77091a2f', '[\"*\"]', NULL, NULL, '2023-05-20 08:30:09', '2023-05-20 08:30:09'),
(33, 'App\\Models\\User', 1, 'authToken', '84405c3e5f94295ef0dff4740cf0e57fa24742cf87c506e1e348e9f858f64956', '[\"*\"]', NULL, NULL, '2023-05-20 08:33:48', '2023-05-20 08:33:48'),
(34, 'App\\Models\\User', 1, 'authToken', '7b2a575dd92d2fe2f08f7a025731087e72cd031fdd19eef59b432cd92b382ca3', '[\"*\"]', NULL, NULL, '2023-05-20 08:35:38', '2023-05-20 08:35:38'),
(35, 'App\\Models\\User', 1, 'authToken', '75dc25174a1d8aa3756191ec718116793082767bb1923f227d52adcde7335819', '[\"*\"]', NULL, NULL, '2023-05-20 09:14:35', '2023-05-20 09:14:35'),
(36, 'App\\Models\\User', 1, 'authToken', '318fb0272d7d2ab1b8b8d62c4f158a2bd5beb498fe09a6b0d0249302ae087f27', '[\"*\"]', NULL, NULL, '2023-05-20 09:34:15', '2023-05-20 09:34:15'),
(37, 'App\\Models\\User', 1, 'authToken', 'c85d6819223346bd0b0d047bb008a87764bef1c4218024ae8413770a90ee57dc', '[\"*\"]', '2023-05-20 09:48:10', NULL, '2023-05-20 09:35:34', '2023-05-20 09:48:10'),
(38, 'App\\Models\\User', 1, 'authToken', 'd497ca98d21aa39f03e833ca741a3543615dbc457d86b6fe8472778a9bbfb099', '[\"*\"]', '2023-05-20 11:13:24', NULL, '2023-05-20 10:03:48', '2023-05-20 11:13:24'),
(39, 'App\\Models\\User', 1, 'authToken', 'b53c30f7a8df915c3a56f99e7223e724b8788c5c3553c58af178d6c284a295f4', '[\"*\"]', '2023-05-20 12:16:30', NULL, '2023-05-20 12:16:29', '2023-05-20 12:16:30'),
(40, 'App\\Models\\User', 1, 'authToken', '762b367093c1dfc73118f24b3d1eb49085cdcf2a74539b2e31633e6bb97bf30d', '[\"*\"]', NULL, NULL, '2023-05-21 00:55:07', '2023-05-21 00:55:07'),
(41, 'App\\Models\\User', 1, 'authToken', '5248e8a9e85922e4aff259287747c1c655d93bb6dbcd5272f9d18f7537f64c9e', '[\"*\"]', NULL, NULL, '2023-05-21 01:00:32', '2023-05-21 01:00:32'),
(42, 'App\\Models\\User', 1, 'authToken', 'b367d9de1ac27857ce5c2d79a44d1f08be806ede543c24a9e653bd3571ca3b0c', '[\"*\"]', NULL, NULL, '2023-05-21 01:00:33', '2023-05-21 01:00:33'),
(43, 'App\\Models\\User', 1, 'authToken', 'b62e2ca83e13993cdeb538c7777a11f1c435dd127e1371578470449b4fc27bb1', '[\"*\"]', '2023-05-21 01:57:32', NULL, '2023-05-21 01:21:47', '2023-05-21 01:57:32'),
(44, 'App\\Models\\User', 1, 'authToken', '01c5f4ebc70f87388ec211413562046af69e286a0541c0f974824f4676d4f019', '[\"*\"]', '2023-05-21 02:17:32', NULL, '2023-05-21 02:15:19', '2023-05-21 02:17:32'),
(45, 'App\\Models\\User', 1, 'authToken', 'e8b5511aa4ddd4e69d9fd6ee0ec2a10e4643e6c68f0ffb812d558a13041df2cb', '[\"*\"]', '2023-05-21 05:55:41', NULL, '2023-05-21 05:49:00', '2023-05-21 05:55:41'),
(47, 'App\\Models\\User', 1, 'authToken', '01bf6627af05d9130a6328d855993cc12329fe7a6a63bb39afa5450e5bf4c526', '[\"*\"]', '2023-05-21 09:06:34', NULL, '2023-05-21 09:01:00', '2023-05-21 09:06:34'),
(48, 'App\\Models\\User', 1, 'authToken', '57125f61e9e5504d6a36179b44076a7ecd35970c195148d56e340fe572a8c6f9', '[\"*\"]', '2023-05-21 09:33:01', NULL, '2023-05-21 09:07:15', '2023-05-21 09:33:01'),
(50, 'App\\Models\\User', 1, 'authToken', 'ca46bf0b2e6aba6aa9a9acbd72c552b7abc48eef0b9afc70f987cc58432a31e0', '[\"*\"]', '2023-05-21 09:49:10', NULL, '2023-05-21 09:35:11', '2023-05-21 09:49:10'),
(51, 'App\\Models\\User', 1, 'authToken', '29b93b473c8538ba994181c15d0b7717e9c39d7e5aeb583a130ad212d0384b20', '[\"*\"]', '2023-05-21 09:52:27', NULL, '2023-05-21 09:52:20', '2023-05-21 09:52:27'),
(52, 'App\\Models\\User', 1, 'authToken', '7e95c0695ea5da0c7b463eabf79fe91cdcd945d05780151641cf405e660b6b74', '[\"*\"]', '2023-05-21 20:14:39', NULL, '2023-05-21 20:06:28', '2023-05-21 20:14:39'),
(53, 'App\\Models\\User', 1, 'authToken', '4ec67acec829f52b0d7b66494ec457704512380cc4dd425896cbfbe05acf4b69', '[\"*\"]', '2023-05-21 20:16:43', NULL, '2023-05-21 20:14:58', '2023-05-21 20:16:43'),
(54, 'App\\Models\\User', 1, 'authToken', '13d0316ee8b9235c5b505ec3a44ff55b82f9a70a86ed9a8f60c763638aef4fa7', '[\"*\"]', '2023-05-21 20:20:50', NULL, '2023-05-21 20:18:47', '2023-05-21 20:20:50'),
(55, 'App\\Models\\User', 1, 'authToken', '24c199a3117e88fae2d7095e6f7429996837bc3b11cd54afb96fafe42a2348df', '[\"*\"]', '2023-05-21 20:58:17', NULL, '2023-05-21 20:58:15', '2023-05-21 20:58:17'),
(56, 'App\\Models\\User', 1, 'authToken', 'ca2878ab05cff720a0ad6acff6d1b127f2bc30722f28ddb77c86f8af9e99a03f', '[\"*\"]', NULL, NULL, '2023-05-21 22:52:58', '2023-05-21 22:52:58'),
(57, 'App\\Models\\User', 1, 'authToken', '1141ae4558981db2841b9e6f4c3fc7293b12fd589e8ecbbf443898e89415f072', '[\"*\"]', NULL, NULL, '2023-05-21 22:56:25', '2023-05-21 22:56:25'),
(58, 'App\\Models\\User', 1, 'authToken', '3b50897e069f67c7b750cd59355b6976f40c8eb4217d60148b08d97d8cd67798', '[\"*\"]', NULL, NULL, '2023-05-22 00:39:42', '2023-05-22 00:39:42'),
(59, 'App\\Models\\User', 1, 'authToken', '91d88dc799d14994bab98ee430288161bd36670b542faef51911541b25d19816', '[\"*\"]', NULL, NULL, '2023-05-22 01:35:28', '2023-05-22 01:35:28'),
(60, 'App\\Models\\User', 1, 'authToken', 'f540d3a614ada163ee3742022f5e5f6ca1ec10eabd78b00d40eec1e6422ee1b6', '[\"*\"]', NULL, NULL, '2023-05-22 05:14:11', '2023-05-22 05:14:11'),
(61, 'App\\Models\\User', 1, 'authToken', 'b10f9d1f232a07d88c73571cf9adc9e29b7f01791bd5a3a2226fb8e025f8e6d3', '[\"*\"]', '2023-05-22 06:47:20', NULL, '2023-05-22 05:38:07', '2023-05-22 06:47:20'),
(62, 'App\\Models\\User', 1, 'authToken', '649c015c52442497823f9414826faa832f408b34f095c342d4db31f6e3d555cb', '[\"*\"]', NULL, NULL, '2023-05-22 06:20:23', '2023-05-22 06:20:23'),
(63, 'App\\Models\\User', 1, 'authToken', 'e7e3108c230a1b3360d94dc286c838f3d03e7b0dad3b596e3cb28219a39e9b09', '[\"*\"]', NULL, NULL, '2023-05-22 06:20:25', '2023-05-22 06:20:25'),
(64, 'App\\Models\\User', 1, 'authToken', '1e5f47f694db933efb25e9e99ea7e7452da77962dc4611869d2587bde53607fd', '[\"*\"]', '2023-05-22 06:41:29', NULL, '2023-05-22 06:32:16', '2023-05-22 06:41:29'),
(65, 'App\\Models\\User', 1, 'authToken', '28b939358ca6435889d83fbcaacd1160a66c63dcdc526514e81cc0e4d50f19ce', '[\"*\"]', '2023-05-22 07:51:06', NULL, '2023-05-22 06:44:17', '2023-05-22 07:51:06'),
(66, 'App\\Models\\User', 1, 'authToken', '029810ff394d079881e70fe134c7e2bf62ecadce49d9c568882023af8fbcd9b7', '[\"*\"]', '2023-05-22 08:07:40', NULL, '2023-05-22 07:00:54', '2023-05-22 08:07:40'),
(67, 'App\\Models\\User', 1, 'authToken', '386a818cefdf430ada983267b811ce074e5ee4c3ff85eb8956001dbcb519a62e', '[\"*\"]', '2023-05-23 06:55:29', NULL, '2023-05-22 07:01:38', '2023-05-23 06:55:29'),
(68, 'App\\Models\\User', 1, 'authToken', 'dcd81e6e2d8ee05a914bf935189b33d5ae7015bdfd35436d761932ece8da5748', '[\"*\"]', '2023-06-04 07:44:02', NULL, '2023-05-22 07:26:47', '2023-06-04 07:44:02'),
(69, 'App\\Models\\User', 1, 'authToken', '53ec389be72b46ca24b2c3fb2de2846763bd377aa35c8da250668c9ed404d32a', '[\"*\"]', NULL, NULL, '2023-05-22 07:31:22', '2023-05-22 07:31:22'),
(70, 'App\\Models\\User', 1, 'authToken', 'fffeb977504cf32253e8c07ae24edf0fee4c5fa1280a0411dd22a3768382a799', '[\"*\"]', NULL, NULL, '2023-05-22 07:34:48', '2023-05-22 07:34:48'),
(71, 'App\\Models\\User', 1, 'authToken', '65197bdbbed19bb3495e8d9acef99103176082577bc43db07f4bfee0d0b7f95c', '[\"*\"]', NULL, NULL, '2023-05-22 07:35:38', '2023-05-22 07:35:38'),
(72, 'App\\Models\\User', 1, 'authToken', '1241ba7a76ad950f7fabf99678a6a7cad3740189cf64cfc3056d595c73cffb45', '[\"*\"]', NULL, NULL, '2023-05-22 07:50:56', '2023-05-22 07:50:56'),
(74, 'App\\Models\\User', 1, 'authToken', '0f5f588d2e80620b1b4986ef54e2646c696f9ea704dd360f8cb053b70258dfe6', '[\"*\"]', '2023-05-22 08:01:06', NULL, '2023-05-22 07:52:21', '2023-05-22 08:01:06'),
(75, 'App\\Models\\User', 1, 'authToken', '0fc25a62431e05f84e4724a2da63f15797e83c21766138a5d7ece9b6788786be', '[\"*\"]', '2023-05-22 08:13:38', NULL, '2023-05-22 08:08:49', '2023-05-22 08:13:38'),
(76, 'App\\Models\\User', 1, 'authToken', 'd1eed81d5d53b28b58fe48ba1f3005330324114b6b5b9687fef18ae2fcc5c2ca', '[\"*\"]', '2023-05-22 08:14:58', NULL, '2023-05-22 08:13:56', '2023-05-22 08:14:58'),
(77, 'App\\Models\\User', 1, 'authToken', 'a1dd1c3715daec3072220b9e398575d4a16abe888c61b76c6bc75d9d0f944d1f', '[\"*\"]', '2023-05-22 09:18:38', NULL, '2023-05-22 08:15:52', '2023-05-22 09:18:38'),
(78, 'App\\Models\\User', 1, 'authToken', 'bf6812345fd4ca9d756360dc741ec37370c2023c7cc50a7a5dba8c3acfc8dede', '[\"*\"]', '2023-05-22 09:24:14', NULL, '2023-05-22 09:19:02', '2023-05-22 09:24:14'),
(79, 'App\\Models\\User', 1, 'authToken', '45e7535258759cac7d7521aa0e5b5400e1cc0a796b39003c050b85e7ad08ceef', '[\"*\"]', '2023-05-22 09:25:04', NULL, '2023-05-22 09:24:29', '2023-05-22 09:25:04'),
(80, 'App\\Models\\User', 1, 'authToken', 'b9626fa5927e7a69b67ccf55c9844939d051eedf1ce6e3612fd96e48d8b9ed16', '[\"*\"]', '2023-05-22 09:33:28', NULL, '2023-05-22 09:25:17', '2023-05-22 09:33:28'),
(81, 'App\\Models\\User', 1, 'authToken', 'ffcddef92b4557d03143ef4bfb0a5fd2214210aae61f30b2bb17e340b7e99c94', '[\"*\"]', '2023-05-22 09:40:07', NULL, '2023-05-22 09:34:14', '2023-05-22 09:40:07'),
(82, 'App\\Models\\User', 1, 'authToken', '897adeb7279703feceff4e21acb38ab6703a87ea902f2d126ff2c756701f5d3c', '[\"*\"]', NULL, NULL, '2023-05-22 20:07:05', '2023-05-22 20:07:05'),
(83, 'App\\Models\\User', 1, 'authToken', '3cef90393461b70bd803635d3775898432197831395940533f410866567df057', '[\"*\"]', '2023-05-23 07:42:50', NULL, '2023-05-23 07:19:13', '2023-05-23 07:42:50'),
(85, 'App\\Models\\User', 1, 'authToken', '8d142d7c10080965ca9129461e572d16d803c44ede8eaca82c4de23a4e0cdd2d', '[\"*\"]', NULL, NULL, '2023-05-23 09:06:39', '2023-05-23 09:06:39'),
(86, 'App\\Models\\User', 1, 'authToken', '38b1f6629e94a4b7efe494d31b6972492b2f9a582d530eb08f42b3bc1fdb060d', '[\"*\"]', NULL, NULL, '2023-05-24 21:38:02', '2023-05-24 21:38:02'),
(87, 'App\\Models\\User', 1, 'authToken', '8a544222b5c08d833f5a7a56e442d2074c23e67c5773fd5b0079735eb419e492', '[\"*\"]', NULL, NULL, '2023-05-25 21:05:14', '2023-05-25 21:05:14'),
(88, 'App\\Models\\User', 1, 'authToken', '31867286e0f01abb49ecf721fcbb84219b77705af80a3e241eb16c6270ef35ac', '[\"*\"]', NULL, NULL, '2023-05-26 08:41:47', '2023-05-26 08:41:47'),
(89, 'App\\Models\\User', 1, 'authToken', 'dad8bd2e6ef9e87625a5b60d60d6e02300645b9bbaf7693b4d53a12f6b552551', '[\"*\"]', NULL, NULL, '2023-05-26 22:48:55', '2023-05-26 22:48:55'),
(90, 'App\\Models\\User', 1, 'authToken', '6a8c23e43760a205541dd8aaf2f43c333cde9324d4c29f175a7b1f3691d73b96', '[\"*\"]', '2023-05-27 00:18:32', NULL, '2023-05-27 00:18:29', '2023-05-27 00:18:32'),
(91, 'App\\Models\\User', 1, 'authToken', 'd83e3b2fe0bae89d38a59bb40f7504b496a9445bfebbd5f22d4f26fda0ff1443', '[\"*\"]', '2023-05-27 00:30:12', NULL, '2023-05-27 00:30:07', '2023-05-27 00:30:12'),
(92, 'App\\Models\\User', 1, 'authToken', '81e661a432af40c27bbb5415d8ab5a0be09b3839f38e009ee95ea47d61b61f32', '[\"*\"]', NULL, NULL, '2023-05-27 00:30:59', '2023-05-27 00:30:59'),
(93, 'App\\Models\\User', 1, 'authToken', 'cfcf21608408d31c958fe69f5e4b2f4615bbdcef4b37351ef0a55c663f2a69ca', '[\"*\"]', '2023-05-27 00:31:53', NULL, '2023-05-27 00:31:19', '2023-05-27 00:31:53'),
(94, 'App\\Models\\User', 1, 'authToken', '467bc772f97b39e08f055347f33c568e3448fbf0cb59d443b002214f579c0326', '[\"*\"]', NULL, NULL, '2023-05-27 01:00:52', '2023-05-27 01:00:52'),
(95, 'App\\Models\\User', 1, 'authToken', 'b3589f6655e7d5ee49dcab3190283b4d91a9e22a4183d24e6ccc6374c173ab02', '[\"*\"]', '2023-05-27 01:00:54', NULL, '2023-05-27 01:00:52', '2023-05-27 01:00:54'),
(96, 'App\\Models\\User', 1, 'authToken', '629260b5cf506ff2c8d7066595b4c121568d20ce189637658368bd3e053677ea', '[\"*\"]', '2023-05-27 01:05:17', NULL, '2023-05-27 01:01:23', '2023-05-27 01:05:17'),
(97, 'App\\Models\\User', 1, 'authToken', '2818901ba5853ebb2a71ff63d5c9c325a5d16186a671d05cc9f2168d591e323f', '[\"*\"]', NULL, NULL, '2023-05-27 01:20:41', '2023-05-27 01:20:41'),
(98, 'App\\Models\\User', 1, 'authToken', 'ed26d0bf34651c6439d28596f84208821b6cfd19a648dedc87d78ffe6ee6b81b', '[\"*\"]', NULL, NULL, '2023-05-27 01:20:49', '2023-05-27 01:20:49'),
(99, 'App\\Models\\User', 1, 'authToken', '3ef372a5010959bf5b1315f7504d2e646a8e1d99bd50e996126a8fbd77a563d7', '[\"*\"]', NULL, NULL, '2023-05-27 01:21:25', '2023-05-27 01:21:25'),
(100, 'App\\Models\\User', 1, 'authToken', '7d7327c443d465f5859fc1b2b068036d0164d0225dc4b4220eba1f397d3d4089', '[\"*\"]', NULL, NULL, '2023-05-27 01:22:00', '2023-05-27 01:22:00'),
(101, 'App\\Models\\User', 1, 'authToken', '8a02bfee9cb1150c4aaad46ecd120a1f4b8052877cb29dd0925a3d5db73d5ef7', '[\"*\"]', NULL, NULL, '2023-05-27 01:22:08', '2023-05-27 01:22:08'),
(102, 'App\\Models\\User', 1, 'authToken', '62ca0e13aab2061915900c7254f6a24f8e53ab377871c47d2da4c2c71129eb0d', '[\"*\"]', NULL, NULL, '2023-05-27 01:22:08', '2023-05-27 01:22:08'),
(103, 'App\\Models\\User', 1, 'authToken', '45a73984a8511cd2d3b434187ed743db41cbcd1b351b2e7fa1f0842697bebe53', '[\"*\"]', NULL, NULL, '2023-05-27 01:22:08', '2023-05-27 01:22:08'),
(104, 'App\\Models\\User', 1, 'authToken', 'b82163cd6f2bf79f50da5a64030099ee898376cef59ba315b3f2578e0faa5c9b', '[\"*\"]', NULL, NULL, '2023-05-27 01:22:08', '2023-05-27 01:22:08'),
(105, 'App\\Models\\User', 1, 'authToken', '28cfd47ce25b9cb5249ffbda221cbf5ae21ea4bda2c2fa53ac6bb8965ac08a16', '[\"*\"]', NULL, NULL, '2023-05-27 01:22:20', '2023-05-27 01:22:20'),
(106, 'App\\Models\\User', 1, 'authToken', '0300bea880fd460de66f14b82b414fe1c5ee831f4562925f8ac05606247e16a6', '[\"*\"]', NULL, NULL, '2023-05-27 01:22:36', '2023-05-27 01:22:36'),
(107, 'App\\Models\\User', 1, 'authToken', '7e43f10908ca0d2b77a744bc0253a1cb831488984c12b337f65cfbda46018873', '[\"*\"]', '2023-05-27 01:31:41', NULL, '2023-05-27 01:22:58', '2023-05-27 01:31:41'),
(108, 'App\\Models\\User', 1, 'authToken', '641367a58a330977d419f4cd0e4850521870b55b3d89e2c4b046e49177f7c3db', '[\"*\"]', '2023-05-27 07:23:12', NULL, '2023-05-27 06:55:17', '2023-05-27 07:23:12'),
(109, 'App\\Models\\User', 1, 'authToken', 'df69371a40bcb48f37afb1087dccb34c08f272f0fc48e817bfca0e9f57109ad3', '[\"*\"]', NULL, NULL, '2023-05-27 08:42:28', '2023-05-27 08:42:28'),
(110, 'App\\Models\\User', 1, 'authToken', '09b15787a66bbceb3122e51d999679beb2181907fb58fab3deedcea20ec2b847', '[\"*\"]', NULL, NULL, '2023-05-29 04:03:43', '2023-05-29 04:03:43'),
(111, 'App\\Models\\User', 1, 'authToken', '53d81592f347db8f27c5dfb944f0be0407cfe82b9949175d9e25cef1f1874938', '[\"*\"]', '2023-05-29 09:56:39', NULL, '2023-05-29 07:54:07', '2023-05-29 09:56:39'),
(112, 'App\\Models\\User', 1, 'authToken', 'b25ee1663492437c174e7224821aed375ab96299c4edba27aa4d81a92953f896', '[\"*\"]', '2023-05-29 08:17:29', NULL, '2023-05-29 08:04:51', '2023-05-29 08:17:29'),
(113, 'App\\Models\\User', 1, 'authToken', '821adf6f3e425cd1c6d333d46823840c9c9b89baa81bb9a81fb5f6e01f9faf84', '[\"*\"]', NULL, NULL, '2023-05-29 08:12:05', '2023-05-29 08:12:05'),
(114, 'App\\Models\\User', 1, 'authToken', '4a32ddea358a3a077f9b7118994d247840a1b8f847774b4318937b73b79b67df', '[\"*\"]', '2023-05-29 09:58:12', NULL, '2023-05-29 09:57:34', '2023-05-29 09:58:12'),
(115, 'App\\Models\\User', 1, 'authToken', 'c9d05ac32ae911f4b6f6778aa227ece6a03b0b4c62012002b4a21377c2c3b8ef', '[\"*\"]', NULL, NULL, '2023-05-29 20:14:37', '2023-05-29 20:14:37'),
(116, 'App\\Models\\User', 1, 'authToken', 'd79e03fbf903876e06e2c9c32fb0dfef96462dd4d433013578806b61ae51f5bc', '[\"*\"]', '2023-05-30 06:10:58', NULL, '2023-05-30 06:01:26', '2023-05-30 06:10:58'),
(117, 'App\\Models\\User', 1, 'authToken', '868cd69d6f701b518ed6de7b8919904a63dec7727d9fa034ca0475287429f28e', '[\"*\"]', '2023-05-30 06:21:55', NULL, '2023-05-30 06:13:47', '2023-05-30 06:21:55'),
(118, 'App\\Models\\User', 1, 'authToken', 'f32a74da85c5840ed758d1977104603500e8eb43434e5b8c707ea110b4315bf2', '[\"*\"]', '2023-05-30 06:26:45', NULL, '2023-05-30 06:22:20', '2023-05-30 06:26:45'),
(119, 'App\\Models\\User', 1, 'authToken', '78317b0994b1c567cbb220a6d9e8b738c5ae2c3a17f5d7c23fa6d48d8317707c', '[\"*\"]', '2023-05-30 06:32:03', NULL, '2023-05-30 06:31:19', '2023-05-30 06:32:03'),
(120, 'App\\Models\\User', 1, 'authToken', 'a78141087e34719a8e8999ff18ef087e41c428ceb631e2df890ec7d1a0459f8e', '[\"*\"]', '2023-05-30 06:38:33', NULL, '2023-05-30 06:36:53', '2023-05-30 06:38:33'),
(121, 'App\\Models\\User', 1, 'authToken', 'c6410aa896819c5aa4ac3b7a8f99d1f3dfebdb8d194bfc2e8e955f9b5068bf2b', '[\"*\"]', '2023-05-30 06:45:13', NULL, '2023-05-30 06:38:52', '2023-05-30 06:45:13'),
(122, 'App\\Models\\User', 1, 'authToken', 'c64d1bbc91198a0d404ad1b0692b955173b85266a747837cf9d65a2ad541fb42', '[\"*\"]', '2023-05-30 06:52:03', NULL, '2023-05-30 06:51:56', '2023-05-30 06:52:03'),
(123, 'App\\Models\\User', 1, 'authToken', '2bc6cdb0cc7e2037dd58890ac9174bab696ede36de6abe8a9e70377bb0350883', '[\"*\"]', '2023-05-30 06:55:15', NULL, '2023-05-30 06:55:10', '2023-05-30 06:55:15'),
(137, 'App\\Models\\User', 1, 'authToken', '3cdb7170251a2e4fd3e84bf4a6749c5aaafc899f3ed3e1f0a9fea1a3d272a08d', '[\"*\"]', '2023-06-01 06:10:59', NULL, '2023-06-01 06:09:17', '2023-06-01 06:10:59'),
(138, 'App\\Models\\User', 1, 'authToken', '13d59a74ed2bea02f288d5c52101ff7f52299f550fe668560229b97f783142ae', '[\"*\"]', '2023-06-02 08:54:27', NULL, '2023-06-02 08:52:40', '2023-06-02 08:54:27'),
(139, 'App\\Models\\User', 1, 'authToken', '71634973b1717c50c12ef00962a43a36b126cb9736cf129a8155c9fa881044d7', '[\"*\"]', '2023-06-02 09:14:28', NULL, '2023-06-02 09:12:32', '2023-06-02 09:14:28'),
(140, 'App\\Models\\User', 1, 'authToken', '7162304d79f3333c1199f5186ec3243cdcc6f1da79cdc6e45ac140e5dbe459d2', '[\"*\"]', '2023-06-03 02:38:44', NULL, '2023-06-03 02:37:57', '2023-06-03 02:38:44'),
(143, 'App\\Models\\User', 1, 'authToken', '9299ccb0d8ee70d7d7a7aa0514be30b27c65a6575b298a3a20cce359c4656fa6', '[\"*\"]', NULL, NULL, '2023-06-03 02:50:44', '2023-06-03 02:50:44'),
(147, 'App\\Models\\User', 1, 'authToken', '9a0b94065a468b95c1d727cdae471d4c8fe66ccb4362910fc0810b0391d24a7d', '[\"*\"]', '2023-06-03 04:41:23', NULL, '2023-06-03 04:41:05', '2023-06-03 04:41:23'),
(149, 'App\\Models\\User', 1, 'authToken', '470c62c51c5a378a3ab8e9e550cfb73da076cec086b47da5373c16c442df3203', '[\"*\"]', '2023-06-03 08:13:59', NULL, '2023-06-03 08:07:08', '2023-06-03 08:13:59'),
(150, 'App\\Models\\User', 1, 'authToken', '85073b8a01c398f2ca8541ec75694704e51a38f4c55e975d8165554636b831eb', '[\"*\"]', '2023-06-03 08:16:10', NULL, '2023-06-03 08:15:53', '2023-06-03 08:16:10'),
(151, 'App\\Models\\User', 1, 'authToken', '3972cf1e4f8ae0eddc7118f281528fc5af1217a4d196124dd2f079f55dcb07e3', '[\"*\"]', '2023-06-03 08:58:37', NULL, '2023-06-03 08:47:18', '2023-06-03 08:58:37'),
(152, 'App\\Models\\User', 1, 'authToken', '0eb6125bec7f3cb1fba33158c37a6a66ef172712f2fe9e92fa47c538a4ab3126', '[\"*\"]', '2023-06-03 09:18:42', NULL, '2023-06-03 09:18:24', '2023-06-03 09:18:42'),
(153, 'App\\Models\\User', 1, 'authToken', '83b150a1401c9867c6396766b3fcd4ffa4e23be412c850ef1b19c0521ed1e518', '[\"*\"]', '2023-06-03 09:20:30', NULL, '2023-06-03 09:20:23', '2023-06-03 09:20:30'),
(154, 'App\\Models\\User', 1, 'authToken', 'b520a5c8bebb0b70ec1f582350ae5fef71e3171eb6930e4e6af6a3fce4e8e1f8', '[\"*\"]', '2023-06-03 09:22:22', NULL, '2023-06-03 09:22:11', '2023-06-03 09:22:22'),
(155, 'App\\Models\\User', 1, 'authToken', 'ed3144be613714f679a45688ced90b6475afe94dc72e03c315145e1aa38cabdd', '[\"*\"]', NULL, NULL, '2023-06-04 07:22:43', '2023-06-04 07:22:43'),
(156, 'App\\Models\\User', 1, 'authToken', 'a3844a3fd05aa5dbf1619347cb811007a631dc80088a4b4b310dd296f2f48823', '[\"*\"]', '2023-06-04 08:37:18', NULL, '2023-06-04 08:18:07', '2023-06-04 08:37:18'),
(157, 'App\\Models\\User', 1, 'authToken', 'dbb6a031ee5372113666f642bb54b7acc07e5799d44324259d7d7c7be57aed38', '[\"*\"]', NULL, NULL, '2023-06-04 08:37:40', '2023-06-04 08:37:40'),
(158, 'App\\Models\\User', 1, 'authToken', '822c159283e4cce164437685fea275cd77c7f68fcd6599f9484203559ef2918c', '[\"*\"]', NULL, NULL, '2023-06-04 08:50:28', '2023-06-04 08:50:28'),
(159, 'App\\Models\\User', 25641, 'authToken', 'bc401508f4fb0352c076374d2fb08dabe7719b6cfefe4bb93c125d51476dbc04', '[\"*\"]', NULL, NULL, '2023-06-04 08:53:28', '2023-06-04 08:53:28'),
(160, 'App\\Models\\User', 25641, 'authToken', '06ef9cffab2eb04ce601db85f51c11dd639915482520305c34c477a1db35d616', '[\"*\"]', NULL, NULL, '2023-06-04 09:08:29', '2023-06-04 09:08:29'),
(161, 'App\\Models\\User', 25641, 'authToken', '8bb589c16f68e790bb6315d7fd52298976a15edb224e2f812edcf43dfa81844b', '[\"*\"]', NULL, NULL, '2023-06-04 09:17:36', '2023-06-04 09:17:36'),
(162, 'App\\Models\\User', 1, 'authToken', '231490d5b71192afd5378078537c04e8a3be21ba50b6b408720b27d4407f01d8', '[\"*\"]', NULL, NULL, '2023-06-05 04:48:12', '2023-06-05 04:48:12'),
(163, 'App\\Models\\User', 1, 'authToken', '14d72260c48efdabab58470a5d1518e888bf6440c4b4af9ac54cc8b96d3491c6', '[\"*\"]', NULL, NULL, '2023-06-05 04:48:24', '2023-06-05 04:48:24'),
(164, 'App\\Models\\User', 1, 'authToken', '4b7ab17bfde40f87b2e912e8bca8d512d45b6b7e3de56e21e818ccee415db976', '[\"*\"]', NULL, NULL, '2023-06-05 08:07:29', '2023-06-05 08:07:29'),
(165, 'App\\Models\\User', 1, 'authToken', 'eb29475b62bcfb5caeaf8d34512e1f25272c8ac67a6029746c7d3e218556521a', '[\"*\"]', '2023-06-05 08:08:36', NULL, '2023-06-05 08:08:02', '2023-06-05 08:08:36'),
(166, 'App\\Models\\User', 1, 'authToken', 'f3c0cf349083f8230027e79f66c574965701a9e7d90ae0060ffe7411ba0691f6', '[\"*\"]', '2023-06-05 08:09:27', NULL, '2023-06-05 08:09:16', '2023-06-05 08:09:27'),
(167, 'App\\Models\\User', 1, 'authToken', 'd42281c3b7d1836dbc679238e23724fd182e1b22f3efd7f33b885012a5adeca5', '[\"*\"]', NULL, NULL, '2023-06-06 07:49:46', '2023-06-06 07:49:46'),
(168, 'App\\Models\\User', 1, 'authToken', 'a6e392aba9e30182c510a3e957f25695e60acb3d1e66c12098a37021a04a6fe4', '[\"*\"]', NULL, NULL, '2023-06-06 07:50:59', '2023-06-06 07:50:59'),
(172, 'App\\Models\\User', 1, 'authToken', '41e8e1bdcff4000564d4a6885637da30575762e577510163aa2954323418d552', '[\"*\"]', NULL, NULL, '2023-06-06 08:51:25', '2023-06-06 08:51:25'),
(173, 'App\\Models\\User', 1, 'authToken', '4aca13273e02f336187deb46a5e0a2fa5918dac2989ed633990ea8c361086373', '[\"*\"]', NULL, NULL, '2023-06-06 08:51:49', '2023-06-06 08:51:49'),
(174, 'App\\Models\\User', 1, 'authToken', 'd459ae649a11c20d42bad135dd36c5a32c4d64c20eec372148c0e68741ad514e', '[\"*\"]', NULL, NULL, '2023-06-06 08:52:12', '2023-06-06 08:52:12'),
(175, 'App\\Models\\User', 1, 'authToken', '5d9cccee570c3ed98dc6eb6edd3f2dd22bb819a5df3431d5b3ee9a5fb89ec762', '[\"*\"]', NULL, NULL, '2023-06-06 08:53:01', '2023-06-06 08:53:01'),
(176, 'App\\Models\\User', 1, 'authToken', '9a2a24cc5bd42ec11307dc685fccebbfb76b50f44f1b816328e3a2a64e2b680b', '[\"*\"]', NULL, NULL, '2023-06-06 19:04:15', '2023-06-06 19:04:15'),
(177, 'App\\Models\\User', 1, 'authToken', '1197f11f482cf29cf19e146c9654c11a7c80a475cc1d47a1ebaecaedf89277c4', '[\"*\"]', NULL, NULL, '2023-06-06 19:04:42', '2023-06-06 19:04:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-05-20 16:37:05', '2023-05-20 09:37:05'),
(2, 'distributor', '2023-05-20 16:39:56', '2023-05-20 09:39:55'),
(6, 'Pemilik Perusahaan', '2023-05-22 01:47:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email_verified_at` varchar(300) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` char(1) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `remember_token` varchar(500) DEFAULT NULL,
  `password_resets` varchar(300) DEFAULT NULL,
  `password_reset_token_expiration` timestamp NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `email_verified_at`, `role_id`, `is_active`, `image`, `remember_token`, `password_resets`, `password_reset_token_expiration`, `created_at`, `updated_at`) VALUES
(1, 'Regita Kusuma', 'regitakusuma@gmail.com', '$2y$10$DHJFOe/PNh6oamyCXExPb.ITp0R7iBU4FadvFLJayBvVOaWGCdvPy', NULL, 1, 'Y', NULL, NULL, NULL, NULL, '2023-05-14 12:21:24', NULL),
(25641, 'Bos', 'bosku@gmail.com', '$2y$10$ru5Vlu6DvRWI8co3ODbvgu8Z1qdyQ54rSdu846Qn8y3IBrRvaqIU.', NULL, 3, 'Y', NULL, NULL, NULL, NULL, '2023-05-22 12:37:20', NULL),
(222160, 'BTS KEBUMEN', 'btskebumen@example.com', '$2y$10$Df0NjmnZZ5WWDsC71IlxEOblud.CVuJf0EnO5U5W3rXF36J3qdoHC', NULL, 2, '1', NULL, NULL, NULL, NULL, '2023-05-20 09:17:50', NULL),
(880529, 'BTS YOGYAKARTA', 'btsyk@example.com', '$2y$10$kdMzIloSsZRbeh3yPtlBVu6IrUOGh3S6yyDw0U767AiIc.wldu56u', NULL, 2, '1', NULL, NULL, NULL, NULL, '2023-05-20 14:36:34', NULL),
(950674, 'CV. INARA AGRONIAGA', 'bts@example.com', '$2y$10$FfT9YOvnbSvQEZMhWA3IOeZHhtVkNTWOlgtT7d6uCaq7y86C2DgWO', NULL, 2, '1', NULL, NULL, NULL, NULL, '2023-05-15 13:30:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `count_manager`
--
ALTER TABLE `count_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `count_manager_id` (`count_manager_id`),
  ADD KEY `penjab_id` (`penjab_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `penjab`
--
ALTER TABLE `penjab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributor_id` (`distributor_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `count_manager`
--
ALTER TABLE `count_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `penjab`
--
ALTER TABLE `penjab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_ibfk_1` FOREIGN KEY (`count_manager_id`) REFERENCES `count_manager` (`id`),
  ADD CONSTRAINT `distributor_ibfk_2` FOREIGN KEY (`penjab_id`) REFERENCES `penjab` (`id`),
  ADD CONSTRAINT `distributor_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
