-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 03:13 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_legitize`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `client_firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `project_id`, `client_firstname`, `client_lastname`, `client_middlename`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'John Lorenz', 'Ruizo', 'thequickbrownfox', '', '2018-08-28 12:50:10', '2018-08-28 12:50:10', NULL),
(2, 2, 'Federex', 'Potolin', 'Abarera', '', '2018-08-28 12:50:11', '2018-08-28 12:50:11', NULL),
(3, 1, 'asd fn', 'asdln', 'asdmn', 'C:\\xampp_7_2_8\\tmp\\php325D.tmp', '2018-08-28 13:18:14', '2018-08-28 13:18:14', NULL),
(8, 4, 'qwerty fn 44', 'qwerty ln 44', 'querty mn 44', NULL, '2018-08-30 03:23:40', '2018-08-30 03:23:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_16_112049_create_permission_tables', 1),
(4, '2018_08_05_144155_create_user_crypto_wallets_table', 1),
(5, '2018_08_05_144214_create_user_social_medias_table', 1),
(6, '2018_08_13_124710_create_user_auth_providers_table', 1),
(7, '2018_08_20_115939_create_campaigns_table', 1),
(8, '2018_08_23_125811_create_projects_table', 1),
(9, '2018_08_28_133818_create_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin-assign', 'web', 'Allowed to assign a new admin.', '2018-08-28 12:48:26', '2018-08-28 12:48:26'),
(2, 'admin-remove', 'web', 'Allowed to remove an admin.', '2018-08-28 12:48:26', '2018-08-28 12:48:26'),
(3, 'user-create', 'web', 'Allowed to create new user.', '2018-08-28 12:48:26', '2018-08-28 12:48:26'),
(4, 'user-edit', 'web', 'Allowed to edit user info, credentials and status.', '2018-08-28 12:48:26', '2018-08-28 12:48:26'),
(5, 'user-destroy', 'web', 'Allowed to delete a user', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(6, 'user-show', 'web', 'Allowed to view user details and status', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(7, 'user-role-assign', 'web', 'Allowed to assign roles to user. (Except: Admin, Super-Admin).', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(8, 'role-create', 'web', 'Allowed to create new role.', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(9, 'role-edit', 'web', 'Allowed to edit a role.', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(10, 'role-destroy', 'web', 'Allowed to delete a role. (Note: Apply this role only to admin).', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(11, 'role-show', 'web', 'Allowed to view role details.', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(12, 'campaign-create', 'web', 'Allowed to create new campaign.', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(13, 'campaign-edit', 'web', 'Allowed to edit campaign details.', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(14, 'campaign-destroy', 'web', 'Allowed to delete campaign.', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(15, 'campaign-show', 'web', 'Allowed to view campaign details.', '2018-08-28 12:48:27', '2018-08-28 12:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_title`, `website`, `email`, `telegram`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Enkronos', 'http://www.enkronos.com', 'enkronos@gmail.com', 'enkoronos telegram', 'Tempora dolorem qui eum nulla. Expedita expedita ab nihil recusandae vel ut ducimus.', '2018-08-28 12:48:29', '2018-08-28 12:48:29', NULL),
(2, 'Pearl Pay', 'http://www.pearlpay.com', 'pearlpay.gmail.com', 'pearlpay telegram', 'updateQuaerat asperiores et omnis aut voluptatem similique corporis distinctio. Iusto sapiente quasi sapiente accusamus.', '2018-08-28 12:48:30', '2018-08-28 12:48:30', NULL),
(3, 'Eye Globe', 'http://www.eyeglobe.com', 'eyeglob@gmail.com', 'eye globe telegram', ' Iste aut praesentium reprehenderit vero est enim voluptatem possimus.', '2018-08-28 12:48:30', '2018-08-28 12:48:30', NULL),
(4, 'asd pt', 'asd@webste.com', 'asd@gmail.com', 'asd telegram', 'asd note', '2018-08-29 05:41:41', '2018-08-29 05:41:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', 'Who ever has this role, shall be the god of roles. Has all the previlage on this app that has to offer. No one defies a super-admin.', '2018-08-28 12:48:27', '2018-08-28 12:48:27'),
(2, 'admin', 'web', 'Ruler of all. Well, Except the god or roles of course (super-admin). Can do every thing like super-admin does. Except adding new admin.', '2018-08-28 12:48:28', '2018-08-28 12:48:28'),
(3, 'bounty-hunter', 'web', 'The bounty hunters are the users who shares and hunts capaigns.', '2018-08-28 12:48:29', '2018-08-28 12:48:29'),
(4, 'campaign-manager', 'web', 'Bounty hunter leader. Manages the bounty-hunters.', '2018-08-28 12:48:29', '2018-08-28 12:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(15, 3),
(15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Lorenz Ruizo', NULL, 'imlorenzruizo@gmail.com', '$2y$10$mm2Ag9Et3uiH0mE6KZK7gOyGiKCYvzjP6Ox8MLnG4eCvZLjcXDbRq', NULL, 'inactive', NULL, '2018-08-28 12:48:29', '2018-08-28 12:48:29'),
(2, 'Federex Potolin', NULL, 'potolin.federex@gmail.com', '$2y$10$SIyvffUZOq1m0FlUq4q5.O/yEdaQ3pxo0USmZY0P.gLChSWYKl/5q', NULL, 'inactive', NULL, '2018-08-28 12:48:29', '2018-08-28 12:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_auth_providers`
--

CREATE TABLE `user_auth_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_crypto_wallets`
--

CREATE TABLE `user_crypto_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_social_medias`
--

CREATE TABLE `user_social_medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_auth_providers`
--
ALTER TABLE `user_auth_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_crypto_wallets`
--
ALTER TABLE `user_crypto_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_social_medias`
--
ALTER TABLE `user_social_medias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_auth_providers`
--
ALTER TABLE `user_auth_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_crypto_wallets`
--
ALTER TABLE `user_crypto_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_social_medias`
--
ALTER TABLE `user_social_medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
