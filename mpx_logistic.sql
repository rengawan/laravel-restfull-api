-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2022 pada 14.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpx_logistic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `barang_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `barang_kode`, `kategori_id`, `barang_nama`, `barang_barcode`, `barang_satuan`, `created_at`, `updated_at`) VALUES
(1, 'B001', 1, 'Mie Supermi', '234234234', 'PCS', NULL, NULL),
(2, 'B002', 1, 'Mie Sarimi', '234234', 'PCS', NULL, NULL),
(3, 'B003', 1, 'Mie Indomie', '234234234', 'PCS', NULL, NULL),
(4, 'M001', 2, 'Kosmetik A', '234234234', 'PCS', NULL, NULL),
(5, 'M002', 2, 'Kosmetik B', '234234', 'PCS', NULL, NULL),
(6, 'M003', 2, 'Kosmetik C', '234234234', 'PCS', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_nama`, `kategori_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Mie Instan', 'Kategori Mie Instan', NULL, NULL),
(2, 'Kecantikan', 'Kategori Kecantikan', NULL, NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_14_045208_create_barangs_table', 1),
(6, '2022_01_14_045302_create_kategoris_table', 1),
(7, '2022_01_14_045418_create_mutasis_table', 1),
(8, '2022_01_14_045557_create_rules_table', 1),
(9, '2022_01_14_045612_create_rule_settings_table', 1),
(10, '2022_01_14_071409_create_permisions_table', 1),
(11, '2022_01_14_091857_schema_update', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE `mutasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mutasi`
--

INSERT INTO `mutasi` (`id`, `tanggal`, `type`, `barang_id`, `kuantitas`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2022-01-15', 'Mutasi Masuk', 5, 20, 1, 1, '2022-02-13 06:00:58', '2022-02-13 06:01:26'),
(2, '2022-01-15', 'Mutasi Masuk', 5, 5, 1, NULL, '2022-02-13 06:01:17', '2022-02-13 06:01:17'),
(3, '2022-01-15', 'Mutasi Keluar', 5, 10, 1, NULL, '2022-02-13 06:23:06', '2022-02-13 06:23:06');

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
-- Struktur dari tabel `permision`
--

CREATE TABLE `permision` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permision_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permision_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permision`
--

INSERT INTO `permision` (`id`, `permision_nama`, `permision_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'kategori', NULL, NULL, NULL),
(2, 'barang', NULL, NULL, NULL),
(3, 'barang masuk', NULL, NULL, NULL),
(4, 'barang keluar', NULL, NULL, NULL),
(5, 'laporan stok barang', NULL, NULL, NULL),
(6, 'laporan barang masuk', NULL, NULL, NULL),
(7, 'laporan barang keluar', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rule_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id`, `rule_nama`, `rule_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Rule Untuk Admin', NULL, NULL),
(2, 'Staff', 'Rule Untuk Staff', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule_setting`
--

CREATE TABLE `rule_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `permision_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL,
  `update` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rule_setting`
--

INSERT INTO `rule_setting` (`id`, `rule_id`, `permision_id`, `read`, `update`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 1, 1, 1, NULL, NULL),
(3, 1, 3, 1, 1, 1, NULL, NULL),
(4, 1, 4, 1, 1, 1, NULL, NULL),
(5, 1, 5, 1, 1, 1, NULL, NULL),
(6, 1, 6, 1, 1, 1, NULL, NULL),
(7, 1, 7, 1, 1, 1, NULL, NULL),
(8, 2, 1, 0, 0, 0, NULL, NULL),
(9, 2, 2, 0, 0, 0, NULL, NULL),
(10, 2, 3, 1, 1, 1, NULL, NULL),
(11, 2, 4, 1, 1, 1, NULL, NULL),
(12, 2, 5, 0, 0, 0, NULL, NULL),
(13, 2, 6, 0, 0, 0, NULL, NULL),
(14, 2, 7, 0, 0, 0, NULL, NULL);

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
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rule_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reno Gunawan', 'rengawan@gmail.com', NULL, '$2y$10$d08HXx187McgXf4oEq2Gzur.n9DU3JIwgOPrNcMtM9RZQqqGqGytS', 1, NULL, NULL, NULL),
(2, 'Adwin', 'adw@gmail.com', NULL, '$2y$10$IBQ6YDekgh8kLaeNKnXvuuL6oNFN0Iuabp6t85.viJr5MuR7g5i1a', 2, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permision`
--
ALTER TABLE `permision`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rule_setting`
--
ALTER TABLE `rule_setting`
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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permision`
--
ALTER TABLE `permision`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rule_setting`
--
ALTER TABLE `rule_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
