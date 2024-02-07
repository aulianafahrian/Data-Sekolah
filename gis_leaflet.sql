-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2024 pada 06.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_leaflet`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_06_081742_create_sekolah_table', 2),
(6, '2023_10_06_084455_create_sekolah_table', 3),
(7, '2023_12_15_160748_tambah_kolom_ke_sekolah', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama_sekolah`, `jenjang`, `alamat`, `kecamatan`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(111, 'SMA Negeri 1 Tanjung', 'SMA', 'Jl.Gelatik Komplek Pertamina Murung Pudak Kab.Tabalong Prov. Kalimantan Selatan', 'Murung Pudak', '-2.1426182346949134', '115.39806582033636', NULL, '2024-01-07 19:01:10'),
(112, 'SMAN 2 TANJUNG', 'SMA', 'JL. IR. P. H. M. NOOR MABUUN, Mabuun, Kec. Murung Pudak, Kab. Tabalong Prov. Kalimantan Selatan', 'Murung Pudak', '-2.1733693938979504', '115.40505699813367', NULL, '2024-01-11 12:57:07'),
(113, 'SMK Negri 1 Murung Pudak', 'SMA', 'Mabuun, Kec. Murung Pudak, Kabupaten Tabalong, Kalimantan Selatan 71571', 'Murung Pudak', '-2.169883686295395', '115.42896755039692', '2023-11-02 23:58:01', '2024-01-11 12:55:48'),
(114, 'SMK Negeri 1 Tanjung', 'SMA', 'JL. PHM Noor, Murung Pudak, Pembataan, Kec. Tj., Kabupaten Tabalong, Kalimantan Selatan 71571', 'Murung Pudak', '-2.1770762159900765', '115.40035106241704', '2023-11-23 23:45:09', '2024-01-11 12:56:50'),
(117, 'SDN Mabuun', 'SD', 'Mabuun, Kec. Murung Pudak, Kabupaten Tabalong, Kalimantan Selatan 71571', 'Murung Pudak', '-2.1717196809215125', '115.41519172489646', '2023-12-15 09:24:22', '2024-01-11 12:57:52'),
(118, 'SMP Negeri 4 Tanjung', 'SMP', 'Jl. Tanjung Selatan No.RT.10, Pembataan, Kec. Murung Pudak, Kabupaten Tabalong, Kalimantan Selatan 71571', 'Murung Pudak', '-2.1784377940505846', '115.40371723473072', '2023-12-15 09:49:05', '2024-01-11 12:58:38'),
(119, 'SDN 2 Jaro', 'SD', 'Jl. Jaro Bawah No.RT. 10, Jaro, Kec. Jaro, Kabupaten Tabalong, Kalimantan Selatan 71574', 'Jaro', '-1.8327002607760854', '115.62868751585485', '2024-01-05 02:14:30', '2024-01-11 13:02:25'),
(120, 'SMAN 1 Bintang Ara', 'SMA', 'Usih, Kec. Bintang Ara, Kabupaten Tabalong, Kalimantan Selatan 71572', 'Bintang Ara', '-1.9876551275732628', '115.44732324779035', '2024-01-10 05:11:54', '2024-01-11 13:01:40'),
(121, 'SDN Pasar Arba', 'SD', 'Banua Lawas, Kec. Banua Lawas, Kabupaten Tabalong, Kalimantan Selatan 71552', 'Benua Lawas', '-2.320466529770827', '115.2765389531851', '2024-01-11 12:42:27', '2024-01-11 12:42:27'),
(122, 'SMPN 1Haruai', 'SMP', 'Jl.Manunggal XV, Halong, Kec. Haruai, Kabupaten Tabalong, Kalimantan Selatan 71572', 'Haruai', '-2.0154017341555646', '115.50692863762379', '2024-01-11 12:43:57', '2024-01-11 12:43:57'),
(123, 'SDN 1 Nawin Hilir', 'SD', 'Halong, Kec. Haruai, Kabupaten Tabalong, Kalimantan Selatan 71572', 'Haruai', '-2.0160128994011672', '115.50715126097204', '2024-01-11 12:44:58', '2024-01-11 12:44:58'),
(124, 'SDIT AR-RISALAH TANJUNG', 'SD', 'Jl. Loyang Indah, RT.XI, Jangkung, Kec. Tanjung., Kabupaten Tabalong, Kalimantan Selatan 71512', 'Tanjung', '-2.160880579686038', '115.3741203993559', '2024-01-11 13:00:25', '2024-01-11 13:00:25'),
(125, 'SMKN 1Benua Lawas', 'SMA', 'Banua Lawas, Kec. Banua Lawas, Kabupaten Tabalong, Kalimantan Selatan 71553', 'Benua Lawas', '-2.3229334764480356', '115.27797259390356', '2024-01-11 13:05:04', '2024-01-11 13:05:04'),
(126, 'SMPN 1 Benua Lawas', 'SMP', 'Banua Lawas, Kec. Banua Lawas, Kabupaten Tabalong, Kalimantan Selatan 71552', 'Benua Lawas', '-2.3219700143527864', '115.27787469327451', '2024-01-11 13:05:58', '2024-01-11 13:05:58'),
(127, 'SDN Pulau 1', 'SD', 'Pulau, Kec. Kelua, Kabupaten Tabalong, Kalimantan Selatan 71552', 'Kelua', '-2.276279185554545', '115.29914863407612', '2024-01-11 13:08:22', '2024-01-11 13:08:22'),
(128, 'SMK AN NOOR', 'SMA', 'Paliat, Kec. Kelua, Kabupaten Tabalong, Kalimantan Selatan 71555', 'Kelua', '-2.27101742144684', '115.30928000807765', '2024-01-11 13:09:37', '2024-01-11 13:09:37'),
(129, 'SMPN 1 Kelua', 'SMP', 'Jalan Setuju SD 7 No.28, Pulau, Kec. Kelua, Kabupaten Tabalong, Kalimantan Selatan 71552', 'Kelua', '-2.2798396841060513', '115.29718391597272', '2024-01-11 13:12:58', '2024-01-11 13:12:58'),
(130, 'SMAN 1 UPAU', 'SMA', 'Jalan MTQ 71575, Pangelak, Kec. Upau, Kabupaten Tabalong, Kalimantan Selatan 71575', 'Upau', '-2.068487077211688', '115.61206117272378', '2024-02-01 23:46:17', '2024-02-01 23:46:17'),
(131, 'SDN SEI HANYAR 2', 'SD', 'Jalan Banua Lawas', 'Benua Lawas', '-2.313421374207537', '115.28939679265024', '2024-02-01 23:52:24', '2024-02-01 23:52:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Auliana Fahrian', 'auliana@mail.com', NULL, '$2y$10$C2zasSh5qVwxtQobf6mqGeNL/wwTALtY6J7VMf.QOu9soqh2/ZyaK', NULL, '2023-10-06 01:05:38', '2023-10-06 01:05:38'),
(2, 'auliana', 'aul@mail.com', NULL, '$2y$10$FoYCFvpJBa/J/fQq.wzJEO9BkzWyguWsQpjps/LxbDA/jN08WxK/m', NULL, '2023-10-19 23:53:29', '2023-10-19 23:53:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
