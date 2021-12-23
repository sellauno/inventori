-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2021 pada 23.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksesoris`
--

CREATE TABLE `aksesoris` (
  `id_aksesoris` bigint(20) UNSIGNED NOT NULL,
  `nama_aksesoris` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aksesoris`
--

INSERT INTO `aksesoris` (`id_aksesoris`, `nama_aksesoris`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Kancing', 1000, NULL, '2021-11-16 07:04:51', '2021-11-16 07:04:51'),
(2, 'Resleting', 3000, NULL, '2021-11-18 16:11:22', '2021-11-18 16:11:22'),
(3, 'Washing / Care Label', 500, NULL, '2021-11-18 16:12:08', '2021-11-18 16:12:08'),
(4, 'Loop Pin', 500, NULL, '2021-11-18 16:12:33', '2021-11-18 16:12:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `warna`, `created_at`, `updated_at`) VALUES
(1, 'Jacket', 'Blue/black', '2021-11-16 07:04:29', '2021-11-16 07:04:29'),
(7, 'Jacket', 'Gray/Black', NULL, NULL);

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
-- Struktur dari tabel `hasilproduksi`
--

CREATE TABLE `hasilproduksi` (
  `id_produksi` bigint(20) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `first_qty` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `reject_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasilproduksi`
--

INSERT INTO `hasilproduksi` (`id_produksi`, `id_order`, `id_barang`, `first_qty`, `qty`, `reject_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 200, 188, 2, '2021-11-16 07:07:07', '2021-11-25 16:28:25'),
(2, 1, 7, 200, 180, 2, '2021-11-23 07:07:03', '2021-12-16 03:32:31'),
(4, 2, 7, 100, NULL, NULL, '2021-11-25 18:45:06', '2021-11-25 18:45:06'),
(5, 2, 1, 100, 95, NULL, '2021-11-25 18:45:26', '2021-11-25 18:47:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebutuhan`
--

CREATE TABLE `kebutuhan` (
  `id_kebutuhan` bigint(20) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_aksesoris` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebutuhan`
--

INSERT INTO `kebutuhan` (`id_kebutuhan`, `id_barang`, `id_aksesoris`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 6, '2021-11-18 03:13:34', '2021-11-23 07:04:52'),
(2, 1, 1, 5, '2021-11-23 05:11:38', '2021-11-23 05:11:38'),
(3, 1, 2, 1, '2021-11-23 05:11:38', '2021-11-23 05:11:38'),
(4, 1, 3, 1, '2021-11-23 05:11:38', '2021-11-23 05:11:38'),
(5, 7, 2, 1, '2021-11-23 07:04:52', '2021-11-23 07:04:52');

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
(4, '2021_10_28_120207_create_aksesoris_table', 1),
(5, '2021_10_29_013709_create_barang_table', 2),
(6, '2021_11_04_113406_create_kebutuhan_table', 3),
(7, '2021_11_05_033811_create_pembelian_table', 4),
(8, '2021_11_05_034544_create_hasilproduksi_table', 4),
(9, '2021_11_05_051457_create_kebutuhan_table', 5),
(10, '2021_11_05_051528_create_pembelian_table', 5),
(11, '2021_11_05_051618_create_hasilproduksi_table', 5),
(12, '2021_11_11_120839_create_order_table', 6),
(13, '2021_11_11_135820_create_hasilproduksi_table', 7),
(14, '2021_11_11_135957_create_order_table', 7),
(15, '2021_11_16_085221_create_pembelian_table', 8),
(16, '2021_11_16_085513_create_aksesoris_table', 9),
(17, '2021_11_16_085655_create_barang_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `kode_order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `kode_order`, `tgl`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '20211111', '2021-11-02', 'Data order pertama', '2021-11-11 07:15:46', '2021-11-11 07:15:46'),
(2, '20211126', '2021-11-26', 'Data Order Kedua', '2021-11-25 17:04:32', '2021-11-25 17:04:32');

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
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_aksesoris` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `jml_pembelian` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `no_pembelian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_pembelian`, `id_barang`, `id_aksesoris`, `id_produksi`, `jml_pembelian`, `total_harga`, `no_pembelian`, `created_at`, `updated_at`) VALUES
(1, '2021-11-19', 1, 1, 1, 500, 500000, 1, '2021-11-18 17:49:27', '2021-11-18 17:49:27'),
(2, '2021-11-25', 1, 1, 1, 100, 100000, 2, '2021-11-25 02:08:38', '2021-11-25 02:08:38'),
(3, '2021-11-25', 1, 3, 1, 200, 100000, 1, '2021-11-25 16:08:07', '2021-11-25 16:08:07'),
(4, '2021-12-16', 7, 1, 2, 200, 200000, 1, '2021-12-16 03:26:37', '2021-12-16 03:26:37'),
(5, '2021-12-16', 7, 2, 2, 200, 600000, 1, '2021-12-16 13:43:41', '2021-12-16 13:43:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$DGgAvUBJRrXriYhFR1l8leKEap43.3HJRvnVa4VPqeXHxk46Yzmdm', NULL, '2021-12-10 21:48:03', '2021-12-10 21:48:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aksesoris`
--
ALTER TABLE `aksesoris`
  ADD PRIMARY KEY (`id_aksesoris`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasilproduksi`
--
ALTER TABLE `hasilproduksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indeks untuk tabel `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

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
-- AUTO_INCREMENT untuk tabel `aksesoris`
--
ALTER TABLE `aksesoris`
  MODIFY `id_aksesoris` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasilproduksi`
--
ALTER TABLE `hasilproduksi`
  MODIFY `id_produksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kebutuhan`
--
ALTER TABLE `kebutuhan`
  MODIFY `id_kebutuhan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
