-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 10:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `media_collaborate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panels`
--

CREATE TABLE `admin_panels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_28_144305_create_user_ideas_table', 2),
(5, '2024_07_29_070346_create_video_man_posts_table', 3),
(6, '2024_07_29_152720_create_video_editors_table', 4),
(7, '2024_07_31_145534_create_admin_panels_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JzPk3prGHRaS7E9E2uYvuyNtn9DLn2Pnhi3vpDRM', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFFNVXNFaWZUMUtCSWMwZzZQRWMyTk9vOHlxOHZFdERKRXB0UDRNSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbl9wYW5lbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1722667830),
('LB0wfO2dmneSY1Se7WFN7K6nHJlep1bB7ZpYohAC', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZmZ2QmNVYVF6dDZmNEVaWkVHTUNhRXVwcXc0bzNXUHJPWnBKbWNzRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1wYW5lbC9wdWJsaWNfdXNlcl9wb3N0cz91c2VyX2lkPTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1722671213);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'public',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone`, `address`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Public Doe', '$2y$12$UFJFZBv17TvGrUBg4GVNqexZ6GllWRQO/557QZ2GltPQ59zQUySty', '00000000', '123 Main St', 'logos/default.png', 'public', '2024-08-03 01:31:58', '2024-08-03 01:31:58'),
(2, 'Public Moye Moye', '$2y$12$acb0wFNX7pPotwNsdgCRbu93OM8mlSqUMZiJVYlm89WXP.vaJ.hbu', '000000001', '456 Elm St', 'logos/default.png', 'public', '2024-08-03 01:31:59', '2024-08-03 01:31:59'),
(3, 'Admin Doe', '$2y$12$CYRpAXpKELwKkFASSPboVOJ4Y4GP6z.l42tbRZJ378ZIulkBpAmGK', '11111111', '123 Main St', 'logos/default.png', 'admin', '2024-08-03 01:31:59', '2024-08-03 01:31:59'),
(4, 'Video Man', '$2y$12$kfTiEyqoIBHmxgR2tVHrWeYh6VtFxMjpvjrPncirszTVTo4vb0SM2', '22222222', '123 Video Street', 'logos/default.png', 'video_man', '2024-08-03 01:31:59', '2024-08-03 01:31:59'),
(5, 'Video Editor', '$2y$12$t05jIrLa/fwCpXPaHYkVhuD4hH0BgZE/KYvQBRQDDEXtcoTM5GMPK', '33333333', '123 Video Street', 'logos/default.png', 'video_editor', '2024-08-03 01:31:59', '2024-08-03 01:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_ideas`
--

CREATE TABLE `user_ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_ideas`
--

INSERT INTO `user_ideas` (`id`, `user_id`, `idea`, `photo`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'new idea 2', 'user_ideas/QamqxdQijt3MEC5NWn4s5PxZ4RqJjVdB7gFafKNH.jpg', 'https://www.facebook.com/PeterHouse117', 'approved', '2024-07-28 08:52:41', '2024-07-30 01:37:36'),
(3, 1, '@extends(\'admin.master\')\n\n@section(\'content\')\n    <div class=\"container\">\n        <h1>User Ideas</h1>\n        <a href=\"{{ route(\'user_ideas.create\') }}\" class=\"btn btn-primary mb-3\">Post New Idea</a>\n        @if(session(\'success\'))\n            <div class=\"alert alert-success\">\n                {{ session(\'success\') }}\n            </div>\n        @endif\n        <table class=\"table table-bordered\">\n            <thead>\n            <tr>\n                <th>ID</th>\n                <th>Idea</th>\n                <th>Photo</th>\n                <th>Link</th>\n                <th>Status</th>\n                <th>Created Date & Time</th>\n                <th>Actions</th>\n            </tr>\n            </thead>\n            <tbody>\n            @foreach($userIdeas as $idea)\n                <tr class=\"{{ $idea->status == \'approved\' ? \'table-success\' : ($idea->status == \'rejected\' ? \'table-danger\' : \'table-warning\') }}\">\n                    <td>{{ $idea->id }}</td>\n                    <td>{{ $idea->idea }}</td>\n                    <td>\n                        @if($idea->photo)\n                            <img src=\"{{ asset(\'storage/\' . $idea->photo) }}\" alt=\"Idea Photo\" style=\"width: 100px;\">\n                        @else\n                            No Photo\n                        @endif\n                    </td>\n                    <td>\n                        @if($idea->link)\n                            <a href=\"{{ $idea->link }}\" target=\"_blank\">View Link</a>\n                        @else\n                            No Link\n                        @endif\n                    </td>\n                    <td>{{ $idea->status }}</td>\n                    <td>\n                        {{ \\Carbon\\Carbon::parse($idea->created_at)->format(\'d F Y\') }}<br>\n                        {{ \\Carbon\\Carbon::parse($idea->created_at)->format(\'g:iA\') }}\n                    </td>\n                    <td>\n                        @if($idea->status != \'approved\')\n                            <a href=\"{{ route(\'user_ideas.edit\', $idea->id) }}\" class=\"btn btn-warning\">Edit</a>\n                        @endif\n                        <form action=\"{{ route(\'user_ideas.destroy\', $idea->id) }}\" method=\"POST\" style=\"display:inline-block;\">\n                            @csrf\n                            @method(\'DELETE\')\n                            <button type=\"submit\" class=\"btn btn-danger\">Delete</button>\n                        </form>\n                    </td>\n                </tr>\n            @endforeach\n            </tbody>\n        </table>\n    </div>\n@endsection\n\n@section(\'styles\')\n    <style>\n        .table-success {\n            background-color: #d4edda;\n        }\n        .table-danger {\n            background-color: #f8d7da;\n        }\n        .table-warning {\n            background-color: #fff3cd;\n        }\n    </style>\n@endsection\n', 'user_ideas/SUh66YZFcsNtAcR8PJ22mSsFMtpqIbbde6R79hYO.png', 'https://www.facebook.com/PeterHouse117', 'pending', '2024-07-28 08:55:23', '2024-08-01 05:04:47'),
(4, 2, 'post2', 'user_ideas/DO1D52a4ZM6kgQITS5B9pOFeUSprZgn4EVhJosWJ.jpg', 'https://www.facebook.com/PeterHouse117', 'approved', '2024-07-29 10:32:04', '2024-08-03 01:35:04'),
(5, 1, 'last idea', 'user_ideas/US7G7PTR3OHTBol9XWNwQ8yD1LjtJiq06Maj5220.jpg', 'https://www.facebook.com/PeterHouse117', 'pending', '2024-07-31 23:51:37', '2024-07-31 23:51:37'),
(6, 1, 'final post', 'user_ideas/gSHY0zgXNQTMYmpp7cM8qpHjdk5yZaO7HjueF1M8.jpg', 'https://www.facebook.com/PeterHouse117', 'pending', '2024-07-31 23:59:09', '2024-07-31 23:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `video_editors`
--

CREATE TABLE `video_editors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_man_posts`
--

CREATE TABLE `video_man_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`photos`)),
  `edited_photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`videos`)),
  `edited_videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_man_posts`
--

INSERT INTO `video_man_posts` (`id`, `user_id`, `content`, `photos`, `edited_photos`, `videos`, `edited_videos`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'idea for video man sdsd sdsddddddddd sssd sssdsssdsssd sss', '[\"video_man_photos\\/i0i3zPmUGxvbb2bD1ir2ZSjqfRGvjOVez74Kq5Z9.png\",\"video_man_photos\\/jPGq8YMcUDv3Ft7wTrPTPf7GGBrq1xySbaRXJXfK.jpg\",\"video_man_photos\\/g94yyrDE1ce3sU9Rijej7cbsQlaaXqqO2t4DS8Np.png\",\"video_man_photos\\/QCgcuuIuPNrnwsZ8PWahRQvNttGbmw6R7IWrFTp4.png\",\"video_man_photos\\/CbEgzNP6tiAPLAiAET8xpMErjk27WvMbn15eMU5U.png\",\"photos\\/6dycZFeee25q1fpzfUDXVkvbz7m2iIp3gSJgPXcw.jpg\"]', '', '[\"video_man_videos/E2eQvuTVGP4V7mSaNoMDui0MOZIKfzmg0BxTaen8.mp4\",\"video_man_videos/hDl7a60y8jNjuCfsdN8ZVfC6MGgbB8hVDQF6ie9B.mp4\"]', '[\"videos\\/xba4V0QYRfqz3BkqstEB8cPc7dpFANlrtSB9gOcv.mp4\"]', 'https://www.facebook.com/PeterHouse117', 'pending', '2024-07-29 02:41:44', '2024-07-31 10:57:05'),
(4, 4, 'ttttttttth', '[\"video_man_photos\\/i0i3zPmUGxvbb2bD1ir2ZSjqfRGvjOVez74Kq5Z9.png\",\"video_man_photos\\/jPGq8YMcUDv3Ft7wTrPTPf7GGBrq1xySbaRXJXfK.jpg\",\"video_man_photos\\/g94yyrDE1ce3sU9Rijej7cbsQlaaXqqO2t4DS8Np.png\",\"video_man_photos\\/QCgcuuIuPNrnwsZ8PWahRQvNttGbmw6R7IWrFTp4.png\",\"video_man_photos\\/CbEgzNP6tiAPLAiAET8xpMErjk27WvMbn15eMU5U.png\",\"photos\\/6dycZFeee25q1fpzfUDXVkvbz7m2iIp3gSJgPXcw.jpg\"]', '[\"photos\\/crIZuTnvWY6KIYM0qLKBLH5L3O7cbtjUHMrdoYVm.jpg\"]', '[]', '[\"videos\\/xba4V0QYRfqz3BkqstEB8cPc7dpFANlrtSB9gOcv.mp4\"]', NULL, 'approved', '2024-07-29 02:54:48', '2024-07-31 03:32:24'),
(6, 4, 'fffffffffffffff', '[\"video_man_photos\\/wC6oWdulmAUAAECKlfnRbflQyZ6SjKFRcb99yrOE.png\"]', '', '[]', NULL, NULL, 'approved', '2024-07-29 03:34:35', '2024-07-31 10:05:46'),
(7, 4, 'nice', '[\"video_man_photos\\/VIXJkjCriEG7hWbbskWfIHwIrhSApA8EdgAJXHUu.jpg\",\"video_man_photos\\/fSyGw8HqFXuqV5sqxGmZljNlW48grwqlZxq8emRn.jpg\"]', '[\"photos\\/6mTZbGVqPtY5jxIBQM0bAG2gO6CXUDpicLnq36CV.jpg\"]', '[\"video_man_videos\\/WdRK9vE2P3XEjy2PdoHdS1TPdh7WYVRoandfBGfE.mp4\",\"video_man_videos\\/KJ7w1YUHSq6eann1hitukcY5oxoZHZu1OymxlB6P.mp4\"]', '[\"videos\\/hvIuGpaegQ1YHptEWobQgQVCEkTWY2dN75NwglFO.mp4\"]', 'https://www.facebook.com/PeterHouse117', 'pending', '2024-07-30 00:48:05', '2024-08-01 04:01:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panels`
--
ALTER TABLE `admin_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_ideas`
--
ALTER TABLE `user_ideas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_editors`
--
ALTER TABLE `video_editors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_man_posts`
--
ALTER TABLE `video_man_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panels`
--
ALTER TABLE `admin_panels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_ideas`
--
ALTER TABLE `user_ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video_editors`
--
ALTER TABLE `video_editors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_man_posts`
--
ALTER TABLE `video_man_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
