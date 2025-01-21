-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2024 pada 19.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shoping`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `title`, `created_at`, `updated_at`) VALUES
(5, 'Laptop', '2024-07-28 08:30:02', '2024-07-28 08:30:02'),
(6, 'Handphone', '2024-07-28 08:30:06', '2024-07-28 08:30:06');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_26_112614_create_products_table', 1),
(6, '2024_07_26_173900_create_temp_transaksis_table', 1),
(7, '2024_07_26_181358_update_product_table', 2),
(8, '2024_07_26_181859_update_product_table', 3),
(9, '2024_07_27_112931_create_kategoris_table', 4),
(10, '2024_07_27_113159_add_product_table', 5),
(11, '2024_07_27_133816_create_roles_table', 6),
(12, '2024_07_27_133905_create_table_users', 6),
(13, '2024_07_28_141519_create_transaksis_table', 7);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `harga_product` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_product` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `harga_product`, `stok`, `created_at`, `updated_at`, `foto_product`, `deskripsi`, `kategori_id`) VALUES
(16, 'Laptop Asus Vivobook 14', 12999000, 12, '2024-07-28 08:30:48', '2024-07-28 09:25:47', 'uploads/product/1722184248.jpeg', 'Vivobook 14 adalah teman sehari-hari Anda yang selalu siap untuk meringankan pekerjaan agenda Anda, baik itu kantor atau pribadi, presentasi atau bermain. Untuk beban kerja yang menuntut, prosesor Intel® Core™ i7 Generasi ke-12 terbaru secara signifikan lebih cepat daripada generasi sebelumnya. Dan dengan memori cepat 16 GB dan penyimpanan SSD cepat 512 GB, ada banyak daya cadangan saat keadaan menjadi sulit.', 5),
(17, 'Acer Nitro 5', 10999000, 17, '2024-07-28 08:32:13', '2024-07-28 09:09:43', 'uploads/product/1722184333.jpeg', 'Dengan Intel® Killer E2600 Ethernet Controller, Intel® Killer™ Wi-Fi 6 AX1650i, dan Control Center 2.0, Anda memiliki semua alat yang dibutuhkan untuk mengalahkan persaingan online. Anda berhak mendapatkan latensi rendah dan koneksi andal yang hanya dapat disediakan oleh jaringan Killer.', 5),
(18, 'Acer Swift 3', 7999000, 28, '2024-07-28 08:35:04', '2024-07-28 08:35:04', 'uploads/product/1722184504.jpeg', 'The Acer Swift 3 is a highly regarded ultrabook that combines portability, performance, and affordability. It features a sleek, lightweight aluminum design, making it an excellent choice for on-the-go use. The laptop typically comes with a 14-inch Full HD IPS display, providing crisp and vibrant visuals. Under the hood, the Swift 3 is powered by the latest Intel or AMD processors, offering solid performance for everyday tasks and light productivity work. It also boasts a comfortable keyboard, a responsive touchpad, and a decent selection of ports, including USB-C. With its long battery life and robust build quality, the Acer Swift 3 is a versatile and reliable option for students and professionals alike.', 5),
(19, 'Asus ROG Zephyrus G14', 18999000, 7, '2024-07-28 08:37:02', '2024-07-28 08:37:02', 'uploads/product/1722184622.jpeg', 'The ASUS ROG Zephyrus G14 is a highly acclaimed gaming laptop that strikes an impressive balance between performance and portability. It features a sleek and compact 14-inch chassis, making it one of the most portable gaming laptops on the market. The G14 is powered by AMD\'s Ryzen 9 processor and NVIDIA\'s GeForce RTX 3060 or 3060 graphics, delivering exceptional performance for gaming and creative tasks. Its QHD or Full HD display options offer excellent color accuracy and a high refresh rate, catering to both gamers and content creators. Additionally, the G14 boasts a distinctive AniMe Matrix LED display on the lid, customizable for unique animations and notifications. With its robust build, long battery life, and advanced cooling system, the ASUS ROG Zephyrus G14 stands out as a versatile and powerful machine for gaming and productivity on the go.', 5),
(20, 'iPhone 11', 7999000, 9, '2024-07-28 08:39:05', '2024-07-28 08:39:05', 'uploads/product/1722184745.jpeg', 'The iPhone 11, launched by Apple in September 2019, is a feature-rich smartphone that offers a blend of performance, camera capabilities, and design. It comes with a 6.1-inch Liquid Retina HD display, providing vibrant and true-to-life colors. The device is powered by Apple\'s A13 Bionic chip, which ensures smooth performance and efficiency for a wide range of tasks, from gaming to augmented reality applications. One of the standout features of the iPhone 11 is its dual-camera system, which includes a 12MP wide and a 12MP ultra-wide lens, allowing for high-quality photos and 4K video recording. Additionally, it offers Night mode, enhancing low-light photography. The iPhone 11 is available in multiple colors and supports Face ID for secure authentication. It also boasts improved battery life and is water and dust resistant, making it a durable choice for everyday use.', 6),
(21, 'iPhone 12', 9999000, 3, '2024-07-28 08:40:17', '2024-07-28 09:04:25', 'uploads/product/1722184817.jpeg', 'The iPhone 12, released by Apple in October 2020, is a significant upgrade in the iPhone lineup, featuring a 6.1-inch Super Retina XDR display that offers stunning visuals with vibrant colors and sharp contrast. It is powered by the A14 Bionic chip, the first 5-nanometer chip in the industry, which delivers exceptional performance and energy efficiency. The iPhone 12 introduces a new flat-edge design with a ceramic shield front cover, enhancing durability. It supports 5G connectivity, enabling faster download and streaming speeds. The dual-camera system includes a 12MP wide and a 12MP ultra-wide lens, allowing for improved low-light photography and Dolby Vision HDR video recording. Additionally, the iPhone 12 is equipped with MagSafe technology, offering a new ecosystem of accessories that easily attach to the back of the phone for convenient charging and more. Available in a range of vibrant colors, the iPhone 12 combines cutting-edge technology with stylish design, making it a versatile choice for both everyday use and advanced photography.', 6),
(22, 'Oppo Reno 5', 3999000, 10, '2024-07-28 08:41:42', '2024-07-28 08:41:42', 'uploads/product/1722184902.jpeg', 'The Oppo Reno 5, launched in December 2020, is a stylish and feature-packed smartphone designed to offer a balanced mix of performance, camera capabilities, and modern design. It sports a 6.43-inch AMOLED display with a Full HD+ resolution, delivering vibrant and sharp visuals, and supports a 90Hz refresh rate for smoother interactions.\r\n\r\nPowered by the Qualcomm Snapdragon 765G chipset, the Reno 5 provides robust performance for multitasking and gaming. It comes with 8GB of RAM and 128GB of internal storage, ensuring ample space and smooth operation.', 6),
(23, 'Oppo Reno 8', 5999000, 12, '2024-07-28 08:45:59', '2024-07-28 08:45:59', 'uploads/product/1722185159.jpeg', 'The Oppo Reno 8, released in July 2022, is a sophisticated smartphone that combines sleek design with powerful performance. It features a 6.4-inch AMOLED display with Full HD+ resolution and a 90Hz refresh rate, offering vibrant visuals and smooth scrolling. The device is powered by the MediaTek Dimensity 1300 chipset, ensuring robust performance for multitasking and gaming.', 6),
(24, 'Realme 5 Pro', 3999000, 3, '2024-07-28 08:47:28', '2024-07-28 08:47:28', 'uploads/product/1722185248.jpeg', 'The Realme 5 Pro, launched in September 2019, is a well-rounded smartphone known for its value-for-money proposition. It features a 6.3-inch Full HD+ display, providing sharp and vibrant visuals. Powered by the Qualcomm Snapdragon 712 chipset, it ensures smooth performance for everyday tasks and gaming. The device comes with up to 8GB of RAM and 128GB of internal storage, expandable via microSD card.', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_transaksi`
--

CREATE TABLE `temp_transaksi` (
  `id_temp` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `product_id`, `user_id`, `total`, `total_harga`, `tanggal`, `created_at`, `updated_at`) VALUES
(8, 17, 1, 1, 10999000, '2024-07-28', '2024-07-28 08:43:26', '2024-07-28 08:43:26'),
(9, 16, 1, 1, 12999000, '2024-07-28', '2024-07-28 09:04:25', '2024-07-28 09:04:25'),
(10, 21, 1, 1, 9999000, '2024-07-28', '2024-07-28 09:04:25', '2024-07-28 09:04:25'),
(11, 17, 1, 1, 10999000, '2024-07-28', '2024-07-28 09:09:43', '2024-07-28 09:09:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Syahrun Fathan Hidayah', 'syahrulmei002@gmail.com', '$2y$12$RJKtJiDwYHbrQROb2oEZV.JWusNymwf178Cq4S22xKwd2S.ug4tJC', NULL, '2024-07-27 05:55:05', '2024-07-27 05:55:05', 2),
(4, 'Syahrun Fathan Hidayah', 'arunilaba12@gmail.com', '$2y$12$0pQ2Wj73w6gQpYPnrIBSQ.7aV9BmLZ6AreN8/md6pwINdAraNSrR.', NULL, '2024-07-28 01:30:34', '2024-07-28 01:30:34', 1);

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
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  ADD PRIMARY KEY (`id_temp`),
  ADD KEY `temp_transaksi_product_id_foreign` (`product_id`),
  ADD KEY `temp_transaksi_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_product_id_foreign` (`product_id`),
  ADD KEY `transaksi_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  MODIFY `id_temp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  ADD CONSTRAINT `temp_transaksi_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `temp_transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
