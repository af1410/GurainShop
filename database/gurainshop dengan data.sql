-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2025 pada 18.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurainshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_admin` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `kode_admin`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADM001', 'admin', 'admin@admin.com', NULL, '$2y$12$SNlAQVk9fQGBi9IMKFlJOeMSsuyLe3eBOWl6EM1sA5nupBYsfgoTi', NULL, '2024-10-11 17:35:58', '2024-10-11 17:35:58'),
(2, 'ADM002', 'ardi', 'ardi@admin.com', NULL, '$2y$12$k.JZn5/91CYs1MvL9l5URuzscUw0C4Z0pNUJ1ICGNwRKrexHSdQrC', NULL, '2024-10-26 10:05:34', '2024-10-26 10:05:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(8) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `hargabarang` int(15) NOT NULL,
  `hargajual` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `satuanbarang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `namabarang`, `hargabarang`, `hargajual`, `keuntungan`, `jumlahbarang`, `satuanbarang`, `created_at`, `updated_at`) VALUES
('BRG001', 'Buku Sidu 58 Lembar', 3200, 4000, 800, 550, 'PCS', '2024-09-02 05:02:33', '2024-10-26 10:34:11'),
('BRG002', 'Pulpen', 1500, 2000, 500, 400, 'PCS', '2024-09-02 05:03:50', '2024-10-08 00:49:42'),
('BRG003', 'Pensil', 1400, 2000, 600, 444, 'PCS', '2024-09-02 05:06:35', '2024-12-13 00:47:28'),
('BRG004', 'Spidol', 1500, 2000, 500, 100, 'PCS', '2024-10-09 02:51:36', '2024-12-13 00:35:32'),
('BRG005', 'Kertas HVS', 49000, 53000, 4000, 100, 'PCS', '2024-12-12 19:53:08', '2024-12-12 19:53:08'),
('BRG006', 'Kertas Kado', 1818, 2000, 182, 100, 'PCS', '2024-12-13 00:56:27', '2024-12-13 00:56:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ardi@ardi.com|127.0.0.1', 'i:1;', 1728739694),
('ardi@ardi.com|127.0.0.1:timer', 'i:1728739694;', 1728739694),
('kasir@exmaple.com|127.0.0.1', 'i:1;', 1728740210),
('kasir@exmaple.com|127.0.0.1:timer', 'i:1728740210;', 1728740210),
('owner@example.com|127.0.0.1', 'i:1;', 1728737684),
('owner@example.com|127.0.0.1:timer', 'i:1728737684;', 1728737684),
('owner@owner.com|127.0.0.1', 'i:1;', 1730825518),
('owner@owner.com|127.0.0.1:timer', 'i:1730825518;', 1730825518);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelians`
--

CREATE TABLE `detail_pembelians` (
  `id_pembelian` varchar(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pembelians`
--

INSERT INTO `detail_pembelians` (`id_pembelian`, `id_barang`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
('B290924002', 'BRG001', 20, 4000, '2024-09-29 10:11:10', '2024-09-29 10:11:10'),
('B290924002', 'BRG002', 0, 2000, '2024-09-29 10:11:10', '2024-09-29 10:11:10'),
('B290924002', 'BRG003', 0, 1500, '2024-09-29 10:11:10', '2024-09-29 10:11:10'),
('B290924003', 'BRG001', 4, 4000, '2024-09-29 10:22:46', '2024-09-29 10:22:46'),
('B290924003', 'BRG002', 0, 2000, '2024-09-29 10:22:46', '2024-09-29 10:22:46'),
('B290924003', 'BRG003', 0, 1500, '2024-09-29 10:22:46', '2024-09-29 10:22:46'),
('B300924001', 'BRG003', 50, 1500, '2024-09-30 12:07:02', '2024-09-30 12:07:02'),
('B300924002', 'BRG001', 60, 4000, '2024-09-30 12:10:22', '2024-09-30 12:10:22'),
('B011024001', 'BRG001', 10, 4000, '2024-10-01 09:16:15', '2024-10-01 09:16:15'),
('B021024001', 'BRG002', 110, 2000, '2024-10-02 09:21:49', '2024-10-02 09:21:49'),
('B021024002', 'BRG003', 160, 1500, '2024-10-02 09:23:57', '2024-10-02 09:23:57'),
('B021024003', 'BRG002', 50, 2000, '2024-10-02 09:25:03', '2024-10-02 09:25:03'),
('B021024004', 'BRG003', 100, 1500, '2024-10-02 09:28:04', '2024-10-02 09:28:04'),
('B021024005', 'BRG002', 10, 2000, '2024-10-02 09:29:27', '2024-10-02 09:29:27'),
('B021024006', 'BRG003', 20, 1500, '2024-10-02 09:33:17', '2024-10-02 09:33:17'),
('B021024007', 'BRG003', 10, 1500, '2024-10-02 09:40:13', '2024-10-02 09:40:13'),
('B021024008', 'BRG003', 10, 1500, '2024-10-02 09:40:14', '2024-10-02 09:40:14'),
('B021024009', 'BRG003', 10, 1500, '2024-10-02 09:40:15', '2024-10-02 09:40:15'),
('B021024010', 'BRG003', 10, 1500, '2024-10-02 09:40:15', '2024-10-02 09:40:15'),
('B021024011', 'BRG003', 10, 1500, '2024-10-02 09:40:15', '2024-10-02 09:40:15'),
('B021024012', 'BRG003', 10, 1500, '2024-10-02 09:40:16', '2024-10-02 09:40:16'),
('B021024013', 'BRG003', 10, 1500, '2024-10-02 09:43:08', '2024-10-02 09:43:08'),
('B021024014', 'BRG003', 10, 1500, '2024-10-02 09:43:09', '2024-10-02 09:43:09'),
('B021024015', 'BRG003', 10, 1500, '2024-10-02 09:43:10', '2024-10-02 09:43:10'),
('B021024016', 'BRG002', 50, 2000, '2024-10-02 09:49:40', '2024-10-02 09:49:40'),
('B021024017', 'BRG002', 20, 2000, '2024-10-02 09:50:35', '2024-10-02 09:50:35'),
('B021024018', 'BRG002', 20, 2000, '2024-10-02 09:50:36', '2024-10-02 09:50:36'),
('B021024019', 'BRG002', 20, 2000, '2024-10-02 09:55:53', '2024-10-02 09:55:53'),
('B021024020', 'BRG002', 20, 2000, '2024-10-02 09:55:58', '2024-10-02 09:55:58'),
('B021024021', 'BRG002', 20, 2000, '2024-10-02 09:57:05', '2024-10-02 09:57:05'),
('B021024022', 'BRG002', 20, 2000, '2024-10-02 09:57:27', '2024-10-02 09:57:27'),
('B021024023', 'BRG002', 25, 2000, '2024-10-02 10:00:13', '2024-10-02 10:00:13'),
('B131224007', 'BRG003', 2, 1400, '2024-12-13 00:28:20', '2024-12-13 00:28:20'),
('B131224008', 'BRG004', 16, 1500, '2024-12-13 00:35:32', '2024-12-13 00:35:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualans`
--

CREATE TABLE `detail_penjualans` (
  `id_penjualan` varchar(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualans`
--

INSERT INTO `detail_penjualans` (`id_penjualan`, `id_barang`, `jumlah`, `harga`, `keuntungan`, `created_at`, `updated_at`) VALUES
('J300924001', 'BRG001', 4, 4000.00, 0, '2024-09-30 10:58:00', '2024-09-30 10:58:00'),
('J300924001', 'BRG002', 0, 2000.00, 0, '2024-09-30 10:58:00', '2024-09-30 10:58:00'),
('J300924001', 'BRG003', 0, 1500.00, 0, '2024-09-30 10:58:00', '2024-09-30 10:58:00'),
('J300924002', 'BRG001', 10, 4000.00, 0, '2024-09-30 11:09:55', '2024-09-30 11:09:55'),
('J021024001', 'BRG003', 60, 1500.00, 0, '2024-10-02 10:06:21', '2024-10-02 10:06:21'),
('J021024002', 'BRG002', 55, 2000.00, 0, '2024-10-02 10:06:48', '2024-10-02 10:06:48'),
('J081024001', 'BRG002', 50, 2000.00, 0, '2024-10-08 00:49:42', '2024-10-08 00:49:42'),
('J091024010', 'BRG004', 5, 2000.00, 500, '2024-10-09 03:05:03', '2024-10-09 03:05:03'),
('J091024011', 'BRG004', 5, 2000.00, 500, '2024-10-09 03:05:18', '2024-10-09 03:05:18'),
('J091024012', 'BRG004', 5, 2000.00, 500, '2024-10-09 03:05:19', '2024-10-09 03:05:19'),
('J091024013', 'BRG003', 3, 1500.00, 300, '2024-10-09 07:23:00', '2024-10-09 07:23:00'),
('J091024013', 'BRG004', 1, 2000.00, 500, '2024-10-09 07:23:00', '2024-10-09 07:23:00'),
('J131224002', 'BRG003', 5, 2000.00, 600, '2024-12-13 00:47:28', '2024-12-13 00:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_31_165915_create_barang_table', 2),
(5, '2024_09_02_154715_create_supliers_table', 3),
(6, '2024_09_05_093137_suplier', 4),
(8, '2024_09_05_093257_pelanggan', 5),
(9, '2024_04_16_152512_create_admins_table', 6),
(10, '2024_04_16_152512_create_teachers_table', 6),
(11, '2024_04_16_152512_create_owners_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_owner` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `owners`
--

INSERT INTO `owners` (`id`, `kode_owner`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'OWN001', 'Owner', 'owner@owner.com', NULL, '$2y$12$WDmWUbtIMjmEq4pAT7cGj..Z.9GwYYYy/qBhdjIsrm6BPIMws6.ni', NULL, '2024-10-26 10:11:38', '2024-10-26 10:11:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(6) NOT NULL,
  `namapelanggan` varchar(100) NOT NULL,
  `alamatpelanggan` varchar(255) NOT NULL,
  `telppelanggan` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `namapelanggan`, `alamatpelanggan`, `telppelanggan`, `email`, `created_at`, `updated_at`) VALUES
('PLG001', 'Firman', 'Kp. Rancaekek Kulon', '07893523276', 'firman@example.com', '2024-09-17 03:33:03', '2024-09-17 03:33:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
--

CREATE TABLE `pembelians` (
  `id_pembelian` varchar(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_suplier` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `dibayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelians`
--

INSERT INTO `pembelians` (`id_pembelian`, `id_user`, `id_suplier`, `tanggal`, `total_bayar`, `dibayar`, `created_at`, `updated_at`) VALUES
('B011024001', 1, 'SPL001', '2024-10-01', 40000, 50000, '2024-10-01 09:16:15', '2024-10-01 09:16:15'),
('B021024001', 1, 'SPL001', '2024-10-02', 220000, 230000, '2024-10-02 09:21:49', '2024-10-02 09:21:49'),
('B021024002', 1, 'SPL001', '2024-10-02', 240000, 250000, '2024-10-02 09:23:57', '2024-10-02 09:23:57'),
('B021024003', 1, 'SPL001', '2024-10-02', 100000, 100000, '2024-10-02 09:25:03', '2024-10-02 09:25:03'),
('B021024004', 1, 'SPL001', '2024-10-02', 150000, 150000, '2024-10-02 09:28:04', '2024-10-02 09:28:04'),
('B021024005', 1, 'SPL001', '2024-10-02', 20000, 20000, '2024-10-02 09:29:27', '2024-10-02 09:29:27'),
('B021024006', 1, 'SPL001', '2024-10-02', 30000, 30000, '2024-10-02 09:33:17', '2024-10-02 09:33:17'),
('B021024007', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:40:13', '2024-10-02 09:40:13'),
('B021024008', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:40:14', '2024-10-02 09:40:14'),
('B021024009', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:40:15', '2024-10-02 09:40:15'),
('B021024010', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:40:15', '2024-10-02 09:40:15'),
('B021024011', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:40:15', '2024-10-02 09:40:15'),
('B021024012', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:40:16', '2024-10-02 09:40:16'),
('B021024013', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:43:08', '2024-10-02 09:43:08'),
('B021024014', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:43:09', '2024-10-02 09:43:09'),
('B021024015', 1, 'SPL001', '2024-10-02', 15000, 20000, '2024-10-02 09:43:10', '2024-10-02 09:43:10'),
('B021024016', 1, 'SPL001', '2024-10-02', 100000, 100000, '2024-10-02 09:49:40', '2024-10-02 09:49:40'),
('B021024017', 1, 'SPL001', '2024-10-02', 40000, 50000, '2024-10-02 09:50:35', '2024-10-02 09:50:35'),
('B021024018', 1, 'SPL001', '2024-10-02', 40000, 50000, '2024-10-02 09:50:36', '2024-10-02 09:50:36'),
('B021024019', 1, 'SPL001', '2024-10-02', 40000, 50000, '2024-10-02 09:55:52', '2024-10-02 09:55:52'),
('B021024020', 1, 'SPL001', '2024-10-02', 40000, 50000, '2024-10-02 09:55:58', '2024-10-02 09:55:58'),
('B021024021', 1, 'SPL001', '2024-10-02', 40000, 50000, '2024-10-02 09:57:05', '2024-10-02 09:57:05'),
('B021024022', 1, 'SPL001', '2024-10-02', 40000, 50000, '2024-10-02 09:57:27', '2024-10-02 09:57:27'),
('B021024023', 1, 'SPL001', '2024-10-02', 50000, 50000, '2024-10-02 10:00:13', '2024-10-02 10:00:13'),
('B131224001', 5, 'SPL001', '2024-12-13', 1650, 1650, '2024-12-13 00:02:32', '2024-12-13 00:02:32'),
('B131224002', 5, 'SPL001', '2024-12-13', 1540, 1540, '2024-12-13 00:05:56', '2024-12-13 00:05:56'),
('B131224003', 5, 'SPL001', '2024-12-13', 3520, 3520, '2024-12-13 00:09:58', '2024-12-13 00:09:58'),
('B131224004', 5, 'SPL001', '2024-12-13', 3080, 3080, '2024-12-13 00:17:53', '2024-12-13 00:17:53'),
('B131224005', 5, 'SPL001', '2024-12-13', 3080, 3080, '2024-12-13 00:19:36', '2024-12-13 00:19:36'),
('B131224006', 5, 'SPL001', '2024-12-13', 3080, 3080, '2024-12-13 00:25:32', '2024-12-13 00:25:32'),
('B131224007', 5, 'SPL001', '2024-12-13', 3080, 3080, '2024-12-13 00:28:20', '2024-12-13 00:28:20'),
('B131224008', 5, 'SPL001', '2024-12-13', 26400, 26400, '2024-12-13 00:35:32', '2024-12-13 00:35:32'),
('B300924001', 1, 'SPL001', '2024-09-30', 75000, 100000, '2024-09-30 12:07:02', '2024-09-30 12:07:02'),
('B300924002', 1, 'SPL001', '2024-09-30', 240000, 250000, '2024-09-30 12:10:22', '2024-09-30 12:10:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
--

CREATE TABLE `penjualans` (
  `id_penjualan` varchar(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` varchar(6) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `dibayar` int(11) NOT NULL,
  `kembali` int(11) DEFAULT NULL,
  `total_keuntungan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualans`
--

INSERT INTO `penjualans` (`id_penjualan`, `id_user`, `id_pelanggan`, `tanggal`, `total_bayar`, `dibayar`, `kembali`, `total_keuntungan`, `created_at`, `updated_at`) VALUES
('J300924001', 1, 'PLG001', '2024-09-30', 16000, 20000, 4000, 0, '2024-09-30 10:58:00', '2024-09-30 10:58:00'),
('J300924002', 1, 'PLG001', '2024-09-30', 40000, 40000, 0, 0, '2024-09-30 11:09:55', '2024-09-30 11:09:55'),
('J021024001', 1, 'PLG001', '2024-10-02', 90000, 100000, 10000, 0, '2024-10-02 10:06:21', '2024-10-02 10:06:21'),
('J021024002', 1, 'PLG001', '2024-10-02', 110000, 120000, 10000, 0, '2024-10-02 10:06:48', '2024-10-02 10:06:48'),
('J081024001', 1, 'PLG001', '2024-10-08', 100000, 100000, 0, 0, '2024-10-08 00:49:42', '2024-10-08 00:49:42'),
('J091024001', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:20', '2024-10-09 03:03:20'),
('J091024002', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:31', '2024-10-09 03:03:31'),
('J091024003', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:33', '2024-10-09 03:03:33'),
('J091024004', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:35', '2024-10-09 03:03:35'),
('J091024005', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:37', '2024-10-09 03:03:37'),
('J091024006', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:39', '2024-10-09 03:03:39'),
('J091024007', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:41', '2024-10-09 03:03:41'),
('J091024008', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:43', '2024-10-09 03:03:43'),
('J091024009', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:03:45', '2024-10-09 03:03:45'),
('J091024010', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:05:03', '2024-10-09 03:05:03'),
('J091024011', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:05:18', '2024-10-09 03:05:18'),
('J091024012', 1, 'PLG001', '2024-10-09', 10000, 10000, 0, 0, '2024-10-09 03:05:19', '2024-10-09 03:05:19'),
('J091024013', 1, 'PLG001', '2024-10-09', 6500, 10000, 3500, 1400, '2024-10-09 07:23:00', '2024-10-09 07:23:00'),
('J131224001', 5, 'PLG001', '2024-12-13', 8000, 8000, 0, 2400, '2024-12-13 00:44:37', '2024-12-13 00:44:37'),
('J131224002', 5, 'PLG001', '2024-12-13', 10000, 10000, 0, 3000, '2024-12-13 00:47:28', '2024-12-13 00:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-09 16:11:24', '2024-10-09 16:11:24'),
(2, 'kasir', '2024-10-09 16:11:24', '2024-10-09 16:11:24'),
(3, 'owner', '2024-10-09 16:11:24', '2024-10-09 16:11:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5CMj6UFAcIgLqe3sUITlfBYwrLb9z7PN7OdA6Njm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiazNoYThGVEpGck0zeUVSTURaNzY4Y3c0ZE9IcXVMSTZudEhhTDFlTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9iYXJhbmciO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1734076587),
('9xH7hSMxx9L6z5AmTXM4J0v2gPZBwI5CtdfscBMB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGcyZXVDTGdPVmpZVWhSV2JrUjFEeHY3NW03SldaNnBQZkxOekFTbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93ZWxjb21lIjt9fQ==', 1749657420),
('xo67NzdZXT669drdNGOnDdrZB0e9QFxMHDuYBr7m', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemhvcEFJQUFDajR1Z0NjRXlDcE04ZFFnalZaSzNJaFQ0cmw1VnF6UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735488438);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` varchar(255) NOT NULL,
  `namasuplier` varchar(255) NOT NULL,
  `alamatsuplier` text NOT NULL,
  `telpsuplier` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `namasuplier`, `alamatsuplier`, `telpsuplier`, `email`, `created_at`, `updated_at`) VALUES
('SPL001', 'Sidu', 'Kab. Bandung', 89444342, 'sidu@sidu.com', '2024-09-06 05:52:17', '2024-09-06 05:52:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE `teachers` (
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
-- Dumping data untuk tabel `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'tc', 'tc@tc.com', NULL, '$2y$12$VmlKLoYzQYCXEZjesbEWuu8niz1XxqBJm3BThF8SxK.f2FTMj0VOG', NULL, '2024-10-11 18:48:49', '2024-10-11 18:48:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kasir` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `kode_kasir`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'KSR001', 'kasir', 'kasir@kasir.com', NULL, '$2y$12$wf8ljZNfda0U.qSF9TYi6uTRCk2BbmSNEOvu4hdsG/YMTmtI8hg5i', NULL, '2024-10-26 09:52:41', '2024-10-26 09:52:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_email_unique` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
