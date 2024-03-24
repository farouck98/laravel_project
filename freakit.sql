-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 jan. 2024 à 09:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `freakit`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Actualités', NULL, NULL),
(2, 'Discussion générale', NULL, NULL),
(3, 'Support technique', NULL, NULL),
(5, 'Autre Catégories', '2024-01-21 11:23:52', '2024-01-21 11:27:01');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `message`, `user_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 'Mon premier commentaire', 1, 3, 'App\\Models\\Topic', '2024-01-14 15:10:14', '2024-01-14 15:10:14'),
(2, 'C\'est kévin qui a écrit ceci', 2, 3, 'App\\Models\\Topic', '2024-01-14 15:24:45', '2024-01-14 15:24:45'),
(3, 'Ceci est une réponse à mon propre commentaire', 2, 2, 'App\\Models\\Comment', '2024-01-20 07:26:49', '2024-01-20 07:26:49'),
(4, 'Ceci est ma réponse au deuxième commentaire', 2, 1, 'App\\Models\\Comment', '2024-01-20 07:44:32', '2024-01-20 07:44:32'),
(5, 'Test Commentaire', 2, 1, 'App\\Models\\Topic', '2024-01-20 11:36:21', '2024-01-20 11:36:21'),
(6, 'Ceci est une seconde réponse', 2, 2, 'App\\Models\\Comment', '2024-01-20 11:39:59', '2024-01-20 11:39:59'),
(7, 'Notification test', 2, 1, 'App\\Models\\Topic', '2024-01-20 12:31:30', '2024-01-20 12:31:30'),
(8, 'Notification test2', 2, 1, 'App\\Models\\Topic', '2024-01-20 12:36:38', '2024-01-20 12:36:38'),
(9, 'Message', 2, 6, 'App\\Models\\Topic', '2024-01-20 14:03:11', '2024-01-20 14:03:11'),
(10, 'Vraiment hein', 1, 6, 'App\\Models\\Topic', '2024-01-20 14:05:13', '2024-01-20 14:05:13'),
(11, 'Nième test', 1, 6, 'App\\Models\\Topic', '2024-01-20 14:07:53', '2024-01-20 14:07:53'),
(12, 'nouveau cm', 2, 6, 'App\\Models\\Topic', '2024-01-20 14:12:54', '2024-01-20 14:12:54'),
(13, 'Nouveau commentaire', 1, 6, 'App\\Models\\Topic', '2024-01-20 14:19:17', '2024-01-20 14:19:17'),
(14, 'nouveau', 2, 1, 'App\\Models\\Topic', '2024-01-20 14:21:55', '2024-01-20 14:21:55'),
(15, 'je suis l\'admin', 1, 8, 'App\\Models\\Topic', '2024-01-26 11:08:48', '2024-01-26 11:08:48'),
(16, 'jhdhfjkskhfgsdf', 4, 15, 'App\\Models\\Comment', '2024-01-26 14:18:06', '2024-01-26 14:18:06'),
(17, 'hdfjhdjfd', 4, 8, 'App\\Models\\Topic', '2024-01-26 14:18:26', '2024-01-26 14:18:26'),
(18, 'magnifique chérie🤩', 1, 11, 'App\\Models\\Topic', '2024-01-27 12:07:19', '2024-01-27 12:07:19'),
(19, 'de rien boo 😁', 1, 18, 'App\\Models\\Comment', '2024-01-27 12:07:45', '2024-01-27 12:07:45'),
(20, 'Oui tu peux le trouver sur Amazon mon très cher frère👊', 1, 16, 'App\\Models\\Topic', '2024-01-27 16:19:52', '2024-01-27 16:19:52'),
(21, 'le travail du cher admin ❤😍🤩, superbe j\'adore', 1, 18, 'App\\Models\\Topic', '2024-01-28 17:01:21', '2024-01-28 17:01:21'),
(22, 'malheureusement je ne saurai le dire mon frère💔', 2, 4, 'App\\Models\\Topic', '2024-01-28 17:11:39', '2024-01-28 17:11:39'),
(23, 'ok 😜😜😜😜😜😜😜', 2, 17, 'App\\Models\\Topic', '2024-01-28 17:14:51', '2024-01-28 17:14:51'),
(24, '🤑🤑🤑🤑🤑🤑🤑🤑🤑🤑', 2, 23, 'App\\Models\\Comment', '2024-01-28 17:17:02', '2024-01-28 17:17:02'),
(25, ',,,,,,,,,', 2, 18, 'App\\Models\\Topic', '2024-01-28 17:33:21', '2024-01-28 17:33:21');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_08_160501_create_roles_table', 1),
(7, '2024_01_08_161035_create_role_user_table', 1),
(8, '2024_01_13_075229_create_topics_table', 1),
(9, '2024_01_13_075614_create_categories_table', 1),
(10, '2024_01_14_143613_create_comments_table', 2),
(11, '2024_01_20_120506_add_solution_column_to_topics_table', 3),
(12, '2024_01_20_131249_create_notifications_table', 4),
(13, '2024_01_22_125044_modify_topics_table', 5),
(14, '2024_01_23_084423_create_sliders_table', 6),
(15, '2024_01_26_142806_modify_topics_table', 6),
(16, '2024_01_27_133349_add_column_image_to_topics_table', 7),
(17, '2024_01_27_161422_add_column_url_to_topics_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('017a2ece-e357-4513-932e-cc1878b4a5cc', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"j\",\"topicId\":1,\"username\":\"kevin\"}', '2024-01-20 13:36:40', '2024-01-20 12:36:40', '2024-01-20 13:36:40'),
('0207ffaf-160d-4856-bdf1-73ade05ff64e', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 2, '{\"topicTitle\":\"Rensei\",\"topicId\":8,\"username\":\"nyobe\"}', NULL, '2024-01-26 14:18:26', '2024-01-26 14:18:26'),
('0f966e5d-099f-47e0-b92b-4a533641dabd', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Sujet 2 test\",\"topicId\":6,\"username\":\"admin\"}', '2024-01-28 16:48:48', '2024-01-20 14:19:17', '2024-01-28 16:48:48'),
('27cf38d3-5482-4f8a-9ace-080037bad721', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 2, '{\"topicTitle\":\"Rensei\",\"topicId\":8,\"username\":\"admin\"}', NULL, '2024-01-26 11:08:48', '2024-01-26 11:08:48'),
('28054ed9-da49-4bf6-abdc-5f268502096a', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Inhumanit\\u00e9\",\"topicId\":4,\"username\":\"kevin\"}', '2024-01-30 09:02:03', '2024-01-28 17:11:39', '2024-01-30 09:02:03'),
('39dfae48-f699-4b00-aa85-6af25b99f506', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Deuxi\\u00e8me test\",\"topicId\":11,\"username\":\"admin\"}', '2024-01-28 16:48:13', '2024-01-27 12:07:20', '2024-01-28 16:48:13'),
('3c5ec59b-9a0d-42fe-90f7-0bdd72d359ce', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"j\",\"topicId\":1,\"username\":\"kevin\"}', NULL, '2024-01-20 14:21:55', '2024-01-20 14:21:55'),
('49d84a79-d269-40db-bac3-5239d8df015f', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Sujet 2 test\",\"topicId\":6,\"username\":\"admin\"}', '2024-01-28 16:48:42', '2024-01-20 14:07:53', '2024-01-28 16:48:42'),
('4c347a97-a41c-4480-9cd5-73f2a5fdfecc', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Sujet 2 test\",\"topicId\":6,\"username\":\"kevin\"}', '2024-01-20 14:04:46', '2024-01-20 14:03:11', '2024-01-20 14:04:46'),
('71c2257d-ef2b-4ec1-b703-5ab7723c795a', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Mon projet\",\"topicId\":18,\"username\":\"admin\"}', '2024-01-30 09:02:07', '2024-01-28 17:01:23', '2024-01-30 09:02:07'),
('9cf739e3-4588-47b9-be14-c22b00d5abb1', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Sujet 2 test\",\"topicId\":6,\"username\":\"kevin\"}', '2024-01-20 14:18:34', '2024-01-20 14:12:54', '2024-01-20 14:18:34'),
('b2ad7a1f-a43e-4dfa-80c8-b99a260af571', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Sujet 2 test\",\"topicId\":6,\"username\":\"admin\"}', '2024-01-20 14:07:37', '2024-01-20 14:05:13', '2024-01-20 14:07:37'),
('d52437ba-a481-4f4a-8a1e-5d79d36b84b4', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Mon projet\",\"topicId\":18,\"username\":\"kevin\"}', '2024-01-30 09:01:56', '2024-01-28 17:33:21', '2024-01-30 09:01:56'),
('dfcbb647-0643-4502-95c8-da69bfff7cd3', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 2, '{\"topicTitle\":\"Besoin d\'aide\",\"topicId\":16,\"username\":\"admin\"}', '2024-01-27 16:33:13', '2024-01-27 16:19:52', '2024-01-27 16:33:13'),
('f1bf4de6-b92e-4377-a8b2-8fb3d56ead6c', 'App\\Notifications\\NewCommentPosted', 'App\\Models\\User', 1, '{\"topicTitle\":\"Info\",\"topicId\":17,\"username\":\"kevin\"}', '2024-01-30 09:02:00', '2024-01-28 17:14:51', '2024-01-30 09:02:00');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', '2024-01-14 07:31:56', '2024-01-14 07:31:56'),
(2, 'utilisateur', '2024-01-14 07:31:56', '2024-01-14 07:31:56');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 1, NULL, NULL),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `solution` int(11) DEFAULT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `title`, `message`, `user_id`, `created_at`, `updated_at`, `category_id`, `solution`, `closed`, `image`, `link`) VALUES
(4, 'Inhumanité', 'Pourquoi l\'homme est mauvais', 1, '2024-01-20 13:42:44', '2024-01-20 13:42:44', 2, NULL, 0, NULL, NULL),
(5, 'Sujet Test', 'Commentaire Test', 2, '2024-01-20 13:57:06', '2024-01-20 13:57:06', 3, NULL, 0, NULL, NULL),
(6, 'Sujet 2 test', 'test', 1, '2024-01-20 14:01:27', '2024-01-23 08:56:10', 1, NULL, 0, NULL, NULL),
(10, 'testEmojie', 'chics emojis 😇😊😘😍', 1, '2024-01-27 11:51:53', '2024-01-27 11:51:53', 5, NULL, 0, NULL, NULL),
(11, 'Deuxième test', 'Ma vie❤', 1, '2024-01-27 11:54:14', '2024-01-28 16:53:41', 1, NULL, 0, NULL, NULL),
(12, 'bbbbbbb', 'nnnnnnnnnnnnnnnnn', 1, '2024-01-27 13:45:42', '2024-01-27 13:45:42', 3, NULL, 0, NULL, NULL),
(13, 'TestImage', 'Modifions l\'image', 1, '2024-01-27 13:57:48', '2024-01-27 14:34:09', 1, NULL, 0, 'uploads/topic/1706369648.webp', NULL),
(14, 'Test lien', 'je cherche ceci svp 😿', 1, '2024-01-27 15:34:42', '2024-01-27 15:50:38', 1, NULL, 0, 'uploads/topic/1706374238.jpg', 'https://www.google.com/search?q=insertion+de+lien+dans+le+textarea+en+php&oq=insertion+de+lien+dans+le+textearea+en+&gs_lcrp=EgZjaHJvbWUqCQgDECEYChigATIGCAAQRRg5MgkIARAhGAoYoAEyCQgCECEYChigATIJCAMQIRgKGKABMgkIBBAhGAoYoAEyCQgFECEYChigAdIBCTIxMTE1ajBqN6gCALACAA&sourceid=chrome&ie=UTF-8#ip=1'),
(16, 'Besoin d\'aide', 'Hé, tu sais où je peux trouver le costume de Dark Vador ?', 2, '2024-01-27 16:16:33', '2024-01-27 16:16:33', 2, NULL, 0, NULL, 'https://www.google.com/aclk?sa=l&ai=DChcSEwiYitOOif6DAxXxp2gJHZEfDNwYABABGgJ3Zg&ase=2&gclid=CjwKCAiA8NKtBhBtEiwAq5aX2HjrlrVEgcMd6EqfUZVv59IZ19C_xnzgjvYU137BCs7Sa1bvgnL_4BoCLfwQAvD_BwE&sig=AOD64_1UQ98wB3v5VjiVvWXY0eYdlGaSiQ&ctype=5&nis=6&adurl&ved=2ahUKEwimkcaOif6DAxUsUqQEHaOKCYoQvhd6BAgBEFc'),
(17, 'Info', '😜Hé, quelqu\'un a essayé', 1, '2024-01-27 16:31:55', '2024-01-28 16:51:03', 2, NULL, 0, 'uploads/topic/1706464263.jpeg', 'http://freak.it/vader-custome-complete'),
(18, 'Mon projet', 'je veux voire si toutes les fonctionalités marchent, cliquez sur ce lien de dark vador', 1, '2024-01-28 17:00:39', '2024-01-28 17:00:39', 5, NULL, 0, 'uploads/topic/1706464839.jpeg', 'https://www.google.com/search?sca_esv=602175580&sxsrf=ACQVn09IyM7KBnRpZ6TAnz1c-xWGS_OdzA:1706464225116&q=dark+vador&tbm=isch&source=lnms&sa=X&ved=2ahUKEwiTjtbP0oCEAxU7VqQEHd20BlQQ0pQJegQIChAB&biw=1280&bih=559&dpr=1.5'),
(19, 'bref', '🙃🙃🙃🙃🙃🙃🙃', 2, '2024-01-28 17:53:36', '2024-01-28 17:53:36', 5, NULL, 0, 'uploads/topic/1706468016.jpeg', 'http://freak.it/vader-custome-complete');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `birthdate`, `email_verified_at`, `password`, `banner`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'latoundjifarouck@gmail.com', '1998-05-23', '2024-01-14 07:49:43', '$2y$12$eMJSGvzWq5UB9niD3gHoxemwMq.oc432SxdK/2GWgyNp/TnKfmg2e', NULL, NULL, '2024-01-14 07:31:57', '2024-01-14 07:49:43'),
(2, 'kevin', 'hlatoundji4@gmail.com', '1996-07-09', '2024-01-14 11:44:05', '$2y$12$lzv4L/N7opsl7BYEtOXUb.RI5LjRqHQUfDjO8jGPprQ8N1wWA9X7K', 'je m\'appelle zannou kevin', NULL, '2024-01-14 11:41:51', '2024-01-14 11:44:05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Index pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_user_id_foreign` (`user_id`),
  ADD KEY `topics_category_id_foreign` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_pseudo_unique` (`pseudo`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
