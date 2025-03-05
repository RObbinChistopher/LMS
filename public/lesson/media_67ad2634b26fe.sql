-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2025 at 07:55 PM
-- Server version: 8.0.39-30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbocsznhxzudna`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(20, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(21, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(22, '2016_06_01_000004_create_oauth_clients_table', 3),
(23, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(25, '2014_10_12_000000_create_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('05b6fe30eb01b57f1bf8a0c4a88d3fc4832ee938d94ca4f8ca54b57339d17b1c903fe44017e1a741', 1, 3, 'MyApp', '[]', 0, '2025-02-04 23:24:48', '2025-02-04 23:24:48', '2026-02-04 17:24:48'),
('0add1bb9082fdeaf4d1604fa0ef341f1fb99ebe70de4e1b646019d9aa29adb3305c0fa2af3ac9e53', 1, 3, 'MyApp', '[]', 0, '2025-02-04 23:21:49', '2025-02-04 23:21:49', '2026-02-04 17:21:49'),
('140ac69588a503f83822b36c79a8c36fb657077e7d344b0bac4c897d90826c549158e30c5fbce324', 2, 3, 'MyApp', '[]', 0, '2025-02-05 01:41:27', '2025-02-05 01:41:27', '2026-02-04 19:41:27'),
('217a1f172e77c74f5c995b3322f013394550cedb11e1732c35c5cda177da4f42b901ac3f9f1f2ea2', 1, 3, 'MyApp', '[]', 0, '2025-02-04 05:30:32', '2025-02-04 05:30:32', '2026-02-03 21:30:32'),
('21ef4fe5d48b9400fd421a1f066c218c218dd85a54b665cf892eb478e70a84d2799cddbb17624d46', 5, 3, 'MyApp', '[]', 0, '2025-02-05 01:24:51', '2025-02-05 01:24:51', '2026-02-04 19:24:51'),
('277961a603fe2d8996395de7a78a06f5028a2cce5ce175c620c74d32fac4d515a5d550e4e54a5924', 1, 3, 'MyApp', '[]', 0, '2025-02-04 23:29:36', '2025-02-04 23:29:36', '2026-02-04 17:29:36'),
('28781425e5d5c150818aefc10477bcd634f89d293fe12bc51a8b5ef6c4d6638b21ecd5f52280ca18', 4, 3, 'MyApp', '[]', 0, '2025-02-05 01:15:12', '2025-02-05 01:15:12', '2026-02-04 19:15:12'),
('2d29430d8a106282f3732305396a2e8155c4175fec76d2f589687a6666cfad237248f106a3aceece', 7, 3, 'MyApp', '[]', 0, '2025-02-05 01:39:14', '2025-02-05 01:39:14', '2026-02-04 19:39:14'),
('2d333b988b065714a8d1e03762fbed497f972ec9062427e24feb8f8ff3c77aa7aabf5d3a071cbe93', 3, 3, 'MyApp', '[]', 0, '2025-02-05 01:09:15', '2025-02-05 01:09:15', '2026-02-04 19:09:15'),
('34bd2ba14f95d9bde0b50cc668bfc9cc8bc7ed66c2e95ee8648003af01db3ef4b9b3f4330f1664fb', 3, 3, 'MyApp', '[]', 0, '2025-02-05 01:10:35', '2025-02-05 01:10:35', '2026-02-04 19:10:35'),
('3d6391f77d10e6eddc06158f220c93aee3b6379b7891bc8e4c514bc77860eba4f0f63854469c6478', 1, 3, 'MyApp', '[]', 0, '2025-02-05 00:20:17', '2025-02-05 00:20:17', '2026-02-04 16:20:17'),
('4430350824a7843c9c3915b83d1e184d93340a8fed91a2dbf6881dfb3d97a407af7a84abf28065a9', 4, 3, 'MyApp', '[]', 0, '2025-02-05 01:17:11', '2025-02-05 01:17:11', '2026-02-04 19:17:11'),
('4489bf15adb7d524c9e8e93a8f953dc2332a7539d814a707a3ecc0f13bf6c194c2f5360d5450ccdc', 1, 1, 'MyApp', '[]', 0, '2025-02-04 05:25:59', '2025-02-04 05:25:59', '2026-02-03 21:25:59'),
('46766a7ef46cb70793b52e6818629909e91dd2b52f0a7f50c063350ed350d2166700404ee7778bb3', 7, 3, 'MyApp', '[]', 0, '2025-02-05 01:52:32', '2025-02-05 01:52:32', '2026-02-04 19:52:32'),
('4d44bcf178dfbd3b5113763396d89e750bd04d21aa8357f0c4dcaf565e0f7edef0b2dfab608d694e', 1, 3, 'MyApp', '[]', 0, '2025-02-05 00:03:37', '2025-02-05 00:03:37', '2026-02-04 16:03:37'),
('5bf939a09cc215beb6e0feed64add533f516c2b5ea05c701078bbd53774a4b1f8501049c5acc877a', 5, 3, 'MyApp', '[]', 0, '2025-02-05 01:23:40', '2025-02-05 01:23:40', '2026-02-04 19:23:40'),
('7b176be05f81c18cac8ec3a1ee7fa1fe4388a54b1234743b0c4266489334176fa27d9edb1a1ac826', 1, 3, 'MyApp', '[]', 0, '2025-02-04 23:26:51', '2025-02-04 23:26:51', '2026-02-04 17:26:51'),
('82ef5749cc8f625ee416098db7e16affac5bc58a883f54dc39800a537d189388e0e5d17762de2374', 1, 3, 'MyApp', '[]', 0, '2025-02-05 00:04:42', '2025-02-05 00:04:42', '2026-02-04 16:04:42'),
('8d4c81fd0427e51a1a633a04c2bd8ed916e4d7583394abebd1c0fac0401ce10f58df8de6d89f2155', 4, 3, 'MyApp', '[]', 0, '2025-02-05 01:16:19', '2025-02-05 01:16:19', '2026-02-04 19:16:19'),
('9e71717326b18ecd6a743ca35fd27a47cb15c50674039fe2164262d35a52eb637e6df3ad1ab6b77f', 7, 3, 'MyApp', '[]', 0, '2025-02-05 01:51:55', '2025-02-05 01:51:55', '2026-02-04 19:51:55'),
('9fb9a9c4aa65038381df243a28001d706ffed98b29ee7ffdfee9e10ffc4ab61c7a536952047c8080', 1, 3, 'MyApp', '[]', 0, '2025-02-04 23:46:33', '2025-02-04 23:46:33', '2026-02-04 17:46:33'),
('b2022befc240c4aade54ec94afa33fd7ae54aadd37489a98c982ce98604ae0675643c0bb7326a071', 4, 3, 'MyApp', '[]', 0, '2025-02-05 01:36:10', '2025-02-05 01:36:10', '2026-02-04 19:36:10'),
('b2fb32357a8b704e0448bd0fa4a6e863e83c6e1c438b3034646d089d480f2faffe102a6f835bac0c', 4, 3, 'MyApp', '[]', 0, '2025-02-05 01:19:58', '2025-02-05 01:19:58', '2026-02-04 19:19:58'),
('dc1cb7a688104eff58bcbbad6a6d311161730aa67ce9e11b8475019aa1d08fad73ef4a6185911b19', 1, 3, 'MyApp', '[]', 0, '2025-02-04 23:50:08', '2025-02-04 23:50:08', '2026-02-04 17:50:08'),
('e6ed8f45cac66e5c458c48518da3c145bfca8a45f852160fd9b762bec816b6e0504c3f6c094fc71f', 2, 3, 'MyApp', '[]', 0, '2025-02-05 01:43:38', '2025-02-05 01:43:38', '2026-02-04 19:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mangrove Personal Access Client', 'LhBpDpTso2DyBlWqCMrlmTEhdkK72Rfqish87AK8', NULL, 'http://localhost', 1, 0, 0, '2025-02-04 05:25:20', '2025-02-04 05:25:20'),
(2, NULL, 'Mangrove Password Grant Client', 'Le8ecG5USiRL74QpIYTxgW6RMS1v56aJbpqsLaLt', 'users', 'http://localhost', 0, 1, 0, '2025-02-04 05:25:21', '2025-02-04 05:25:21'),
(3, NULL, 'Mangrove Personal Access Client', 'GOWh8ewtR0utRTnNRLRbLiCXknB8ARB5rYrJRHUH', NULL, 'http://localhost', 1, 0, 0, '2025-02-04 05:29:10', '2025-02-04 05:29:10'),
(4, NULL, 'Mangrove Password Grant Client', 'qoUpJBW6pXhzfJfrnLRoeQ71Hx48tGZkluSnDBVf', 'users', 'http://localhost', 0, 1, 0, '2025-02-04 05:29:10', '2025-02-04 05:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-02-04 05:25:20', '2025-02-04 05:25:20'),
(2, 3, '2025-02-04 05:29:10', '2025-02-04 05:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Manager','Employer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Employer',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_licence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addition_infor` longtext COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `agent_id`, `role`, `phone`, `profile`, `cnic`, `driving_licence`, `property_documents`, `addition_infor`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ko Ababio', 'ko@cloudsphare.com', '268576', 'Admin', '123456789', 'profile/media_67a22e476a3a2.jpg', 'profile/media_67a142b319022.png', 'profile/media_67a230b871d93.jpg', 'profile/media_67a230b87230c.png', '[[\"profile\\/media_67a221568752b.png\"]]', NULL, '$2y$12$GO59yP54ngt9uZsljeWpdeEVJbP3mYXGns8Ra.MVimVqCHDwKcMlW', NULL, '2025-02-04 05:30:12', '2025-02-05 01:49:45'),
(2, 'Muhammad Farid', 'vise.tech1@gmail.com', '561076', 'Employer', '+1 239 205 2629', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$LAkyssHFGO9SEwHtSOJUZeBmh02Vc6uGkNjLRRPfcOq07cnqhQCb6', NULL, '2025-02-05 01:04:26', '2025-02-05 01:04:26'),
(4, 'christopher', 'robbinc044@gmail.com', '804529', 'Admin', '+92 322 4826880', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$Lm6NzWjO8TodqygCutucp.0fpLO47X4At1P3Rxoi7DgMJWmi0rRAC', NULL, '2025-02-05 01:14:28', '2025-02-05 01:14:28'),
(5, 'abrar hussain', 'abrarhussain817@gmail.com', '635941', 'Admin', '+92 340 4140992', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$noH8kbFhaskbOE0gml4.hOWozXFzz4SNxV26Sq3yuxKsaBAu5Njni', NULL, '2025-02-05 01:23:08', '2025-02-05 01:23:08'),
(6, 'Taha Bhai', 'tahadesignerbms@gmail.com', '775910', 'Employer', '123456789', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$AKX.efkuLS1A6I6qkFwLzerEDC5GmwOSzRWL7NUWcK.fR5dW2r9VC', NULL, '2025-02-05 01:33:23', '2025-02-05 01:33:23'),
(7, 'christopher', 'robbinc042@gmail.com', '948144', 'Employer', '123456789', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$rcsXf44mOPhb9LEKfqjaPOMzs6ojSDagQkwxuoqiVb/k3kFmI2Wti', NULL, '2025-02-05 01:38:37', '2025-02-05 01:38:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_agent_id_unique` (`agent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
