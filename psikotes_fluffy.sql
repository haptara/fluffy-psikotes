-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2024 at 09:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psikotes_fluffy`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_disc`
--

CREATE TABLE `answer_disc` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `most_selected` bigint UNSIGNED NOT NULL,
  `least_selected` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_disc`
--

INSERT INTO `answer_disc` (`id`, `user_id`, `question_id`, `most_selected`, `least_selected`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(2, 1, 4, 5, 6, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(3, 1, 5, 9, 10, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(4, 1, 6, 14, 13, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(5, 1, 7, 17, 18, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(6, 1, 8, 21, 22, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(7, 1, 9, 27, 26, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(8, 1, 10, 30, 29, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(9, 1, 11, 35, 33, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(10, 1, 12, 37, 38, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(11, 1, 13, 43, 42, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(12, 1, 14, 46, 45, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(13, 1, 15, 49, 50, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(14, 1, 16, 54, 53, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(15, 1, 17, 58, 57, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(16, 1, 18, 61, 62, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(17, 1, 19, 66, 67, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(18, 1, 20, 70, 69, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(19, 1, 21, 73, 75, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(20, 1, 22, 80, 77, '2024-12-01 17:47:56', '2024-12-01 17:47:56'),
(51, 12, 3, 1, 2, '2024-12-04 07:29:20', '2024-12-04 07:29:20'),
(52, 12, 4, 6, 7, '2024-12-04 07:29:20', '2024-12-04 07:29:20'),
(53, 12, 5, 11, 12, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(54, 12, 6, 14, 13, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(55, 12, 7, 19, 18, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(56, 12, 8, 23, 24, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(57, 12, 9, 25, 26, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(58, 12, 10, 30, 31, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(59, 12, 11, 35, 36, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(60, 12, 12, 38, 37, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(61, 12, 13, 41, 42, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(62, 12, 14, 46, 45, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(63, 12, 15, 49, 50, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(64, 12, 16, 55, 56, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(65, 12, 17, 59, 60, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(66, 12, 18, 63, 64, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(67, 12, 19, 67, 66, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(68, 12, 20, 69, 70, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(69, 12, 21, 74, 75, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(70, 12, 22, 77, 80, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(71, 12, 23, 81, 81, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(72, 12, 24, 85, 85, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(73, 12, 25, 92, 89, '2024-12-04 07:29:21', '2024-12-04 07:29:21'),
(74, 12, 26, 96, 96, '2024-12-04 07:29:21', '2024-12-04 07:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `answer_psikotes`
--

CREATE TABLE `answer_psikotes` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `answer_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `selected_choice_id` bigint UNSIGNED DEFAULT NULL,
  `score` int DEFAULT NULL,
  `answered_at` timestamp NULL DEFAULT NULL,
  `is_flagged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_psikotes`
--

INSERT INTO `answer_psikotes` (`id`, `question_id`, `user_id`, `answer_text`, `selected_choice_id`, `score`, `answered_at`, `is_flagged`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 1, 1, 'jawaban no 1', NULL, NULL, NULL, 0, '2024-11-28 07:18:37', '2024-11-28 07:18:37', NULL),
(27, 2, 1, 'jawaban no 2', NULL, NULL, NULL, 0, '2024-11-28 07:18:37', '2024-11-28 07:18:37', NULL),
(28, 3, 1, 'jawaban no 3', NULL, NULL, NULL, 0, '2024-11-28 07:18:37', '2024-11-28 07:18:37', NULL),
(29, 4, 1, 'jawaban no 4', NULL, NULL, NULL, 0, '2024-11-28 07:18:38', '2024-11-28 07:18:38', NULL),
(30, 13, 1, 'jawaban no 5', NULL, NULL, NULL, 0, '2024-11-28 07:18:38', '2024-11-28 07:18:38', NULL),
(31, 14, 1, NULL, 11, NULL, NULL, 0, '2024-11-28 07:18:50', '2024-11-28 07:18:50', NULL),
(32, 15, 1, NULL, 17, NULL, NULL, 0, '2024-11-28 07:18:50', '2024-11-28 07:18:50', NULL),
(33, 16, 1, NULL, 23, NULL, NULL, 0, '2024-11-28 07:18:50', '2024-11-28 07:18:50', NULL),
(34, 17, 1, NULL, 27, NULL, NULL, 0, '2024-11-28 07:18:50', '2024-11-28 07:18:50', NULL),
(35, 18, 1, NULL, 32, NULL, NULL, 0, '2024-11-28 07:18:50', '2024-11-28 07:18:50', NULL),
(36, 19, 1, NULL, 36, NULL, NULL, 0, '2024-11-28 07:19:00', '2024-11-28 07:19:00', NULL),
(37, 20, 1, NULL, 44, NULL, NULL, 0, '2024-11-28 07:19:00', '2024-11-28 07:19:00', NULL),
(38, 21, 1, NULL, 48, NULL, NULL, 0, '2024-11-28 07:19:00', '2024-11-28 07:19:00', NULL),
(39, 22, 1, NULL, 54, NULL, NULL, 0, '2024-11-28 07:19:00', '2024-11-28 07:19:00', NULL),
(40, 23, 1, NULL, 60, NULL, NULL, 0, '2024-11-28 07:19:00', '2024-11-28 07:19:00', NULL),
(41, 24, 1, NULL, 63, NULL, NULL, 0, '2024-11-28 07:28:21', '2024-11-28 07:28:21', NULL),
(42, 25, 1, NULL, 69, NULL, NULL, 0, '2024-11-28 07:28:21', '2024-11-28 07:28:21', NULL),
(43, 26, 1, NULL, 75, NULL, NULL, 0, '2024-11-28 07:28:21', '2024-11-28 07:28:21', NULL),
(44, 27, 1, NULL, 80, NULL, NULL, 0, '2024-11-28 07:28:21', '2024-11-28 07:28:21', NULL),
(45, 28, 1, NULL, 82, NULL, NULL, 0, '2024-11-28 07:28:22', '2024-11-28 07:28:22', NULL),
(46, 29, 1, NULL, 88, NULL, NULL, 0, '2024-11-28 07:44:07', '2024-11-28 07:44:07', NULL),
(47, 30, 1, NULL, 93, NULL, NULL, 0, '2024-11-28 07:44:08', '2024-11-28 07:44:08', NULL),
(48, 31, 1, NULL, 99, NULL, NULL, 0, '2024-11-28 07:44:08', '2024-11-28 07:44:08', NULL),
(49, 32, 1, NULL, 103, NULL, NULL, 0, '2024-11-28 07:44:08', '2024-11-28 07:44:08', NULL),
(50, 33, 1, NULL, 108, NULL, NULL, 0, '2024-11-28 07:44:08', '2024-11-28 07:44:08', NULL),
(81, 1, 12, NULL, NULL, NULL, NULL, 0, '2024-12-04 07:06:51', '2024-12-04 07:06:51', NULL),
(82, 2, 12, NULL, NULL, NULL, NULL, 0, '2024-12-04 07:06:51', '2024-12-04 07:06:51', NULL),
(83, 3, 12, NULL, NULL, NULL, NULL, 0, '2024-12-04 07:06:51', '2024-12-04 07:06:51', NULL),
(84, 4, 12, NULL, NULL, NULL, NULL, 0, '2024-12-04 07:06:51', '2024-12-04 07:06:51', NULL),
(85, 13, 12, NULL, NULL, NULL, NULL, 0, '2024-12-04 07:06:51', '2024-12-04 07:06:51', NULL),
(86, 14, 12, NULL, 11, NULL, NULL, 0, '2024-12-04 07:07:51', '2024-12-04 07:07:51', NULL),
(100, 1, 13, NULL, NULL, NULL, NULL, 0, '2024-12-06 07:48:18', '2024-12-06 07:48:18', NULL),
(101, 2, 13, NULL, NULL, NULL, NULL, 0, '2024-12-06 07:48:18', '2024-12-06 07:48:18', NULL),
(102, 3, 13, NULL, NULL, NULL, NULL, 0, '2024-12-06 07:48:18', '2024-12-06 07:48:18', NULL),
(103, 4, 13, NULL, NULL, NULL, NULL, 0, '2024-12-06 07:48:18', '2024-12-06 07:48:18', NULL),
(104, 13, 13, NULL, NULL, NULL, NULL, 0, '2024-12-06 07:48:18', '2024-12-06 07:48:18', NULL),
(111, 1, 17, 'jaban', NULL, NULL, NULL, 0, '2024-12-06 09:33:19', '2024-12-06 09:33:19', NULL),
(112, 2, 17, NULL, NULL, NULL, NULL, 0, '2024-12-06 09:33:19', '2024-12-06 09:33:19', NULL),
(113, 3, 17, NULL, NULL, NULL, NULL, 0, '2024-12-06 09:33:19', '2024-12-06 09:33:19', NULL),
(114, 4, 17, NULL, NULL, NULL, NULL, 0, '2024-12-06 09:33:19', '2024-12-06 09:33:19', NULL),
(115, 13, 17, NULL, NULL, NULL, NULL, 0, '2024-12-06 09:33:19', '2024-12-06 09:33:19', NULL),
(116, 14, 17, NULL, 11, NULL, NULL, 0, '2024-12-06 09:34:19', '2024-12-06 09:34:19', NULL),
(117, 15, 17, NULL, 16, NULL, NULL, 0, '2024-12-06 09:34:20', '2024-12-06 09:34:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biodata_peserta`
--

CREATE TABLE `biodata_peserta` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `position_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `no_whatsapp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata_peserta`
--

INSERT INTO `biodata_peserta` (`id`, `user_id`, `position_id`, `name`, `gender`, `birth_date`, `no_whatsapp`, `test_date`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 1, 'Fikri Tmvn', 'Laki-laki', '1997-06-30', '082246117628', '2024-11-25', 'Hello Fikri', '2024-11-24 10:57:10', '2024-12-03 04:12:31', NULL),
(6, 7, 2, 'lea dewi', NULL, NULL, NULL, NULL, NULL, '2024-12-02 07:53:08', '2024-12-03 01:37:33', '2024-12-03 01:37:33'),
(7, 8, 3, 'fulan', NULL, NULL, NULL, NULL, NULL, '2024-12-03 01:41:29', '2024-12-03 01:46:28', '2024-12-03 01:46:28'),
(8, 9, 3, 'atghata', NULL, NULL, NULL, NULL, NULL, '2024-12-03 01:50:31', '2024-12-03 02:01:14', '2024-12-03 02:01:14'),
(9, 10, 3, 'fulan bin fulan', NULL, NULL, NULL, NULL, NULL, '2024-12-03 02:10:23', '2024-12-03 08:15:33', '2024-12-03 08:15:33'),
(10, 10, 2, 'fulan bin fulan', 'Perempuan', '2024-12-03', '082246117628', '2024-12-10', 'jl.kurdi', '2024-12-03 08:15:13', '2024-12-03 08:15:13', NULL),
(13, 12, 1, 'ciro alves bandung poenya', 'Laki-laki', '1992-06-30', '122333443322', '2024-12-03', 'bandung abadi', '2024-12-03 09:17:30', '2024-12-03 09:22:05', NULL),
(14, 13, 4, 'john doe', 'Perempuan', '2024-12-27', '889000999', '2024-12-13', 'aw', '2024-12-04 08:11:02', '2024-12-06 07:36:36', NULL),
(15, 17, 2, 'haji naufal firadus', 'Laki-laki', '2024-12-09', '082246117628', '2024-12-20', 'alamat haji naufal firdaus', '2024-12-06 07:01:47', '2024-12-06 07:04:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `choice_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `choice_text`, `is_correct`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 14, 'honor', 1, '2024-11-26 01:29:11', '2024-11-26 01:29:11', NULL),
(12, 14, 'bonus', 0, '2024-11-26 01:29:11', '2024-11-26 01:29:11', NULL),
(13, 14, 'tunjangan', 0, '2024-11-26 01:29:11', '2024-11-26 01:29:11', NULL),
(14, 14, 'pekerjaan', 0, '2024-11-26 01:29:11', '2024-11-26 01:29:11', NULL),
(15, 14, 'pencaharian', 0, '2024-11-26 01:29:11', '2024-11-26 01:29:11', NULL),
(16, 15, 'jadwal ulang', 0, '2024-11-26 01:30:43', '2024-11-26 01:30:43', NULL),
(17, 15, 'pengaturan', 0, '2024-11-26 01:30:43', '2024-11-26 01:30:43', NULL),
(18, 15, 'register', 0, '2024-11-26 01:30:43', '2024-11-26 01:30:43', NULL),
(19, 15, 'pendaftaran kembali', 0, '2024-11-26 01:30:43', '2024-11-26 01:30:43', NULL),
(20, 15, 'pendaftaran', 1, '2024-11-26 01:30:43', '2024-11-26 01:30:43', NULL),
(21, 16, 'cara lain', 1, '2024-11-26 01:33:10', '2024-11-26 01:33:10', NULL),
(22, 16, 'prosedur pemecahan', 0, '2024-11-26 01:33:10', '2024-11-26 01:33:10', NULL),
(23, 16, 'prinsip dasar', 0, '2024-11-26 01:33:11', '2024-11-26 01:33:11', NULL),
(24, 16, 'main stream', 0, '2024-11-26 01:33:11', '2024-11-26 01:33:11', NULL),
(25, 16, 'pedoman', 0, '2024-11-26 01:33:11', '2024-11-26 01:33:11', NULL),
(26, 17, 'permintaan', 0, '2024-11-26 01:34:30', '2024-11-26 01:34:30', NULL),
(27, 17, 'pengaturan', 0, '2024-11-26 01:34:30', '2024-11-26 01:34:30', NULL),
(28, 17, 'klasifikasi', 0, '2024-11-26 01:34:30', '2024-11-26 01:34:30', NULL),
(29, 17, 'penentuan', 0, '2024-11-26 01:34:30', '2024-11-26 01:34:30', NULL),
(30, 17, 'penjelasan', 1, '2024-11-26 01:34:30', '2024-11-26 01:34:30', NULL),
(31, 18, 'istirahat', 0, '2024-11-26 01:35:20', '2024-11-26 01:35:20', NULL),
(32, 18, 'tak bisa duduk', 0, '2024-11-26 01:35:20', '2024-11-26 01:35:20', NULL),
(33, 18, 'tak bisa istirahat', 0, '2024-11-26 01:35:20', '2024-11-26 01:35:20', NULL),
(34, 18, 'tak bisa tidur', 1, '2024-11-26 01:35:20', '2024-11-26 01:35:20', NULL),
(35, 18, 'tidur', 0, '2024-11-26 01:35:20', '2024-11-26 01:35:20', NULL),
(36, 19, 'khusus', 0, '2024-11-27 19:02:23', '2024-11-27 19:02:23', NULL),
(37, 19, 'wabul khusus', 0, '2024-11-27 19:02:23', '2024-11-27 19:02:23', NULL),
(38, 19, 'inklusif', 0, '2024-11-27 19:02:23', '2024-11-27 19:02:23', NULL),
(39, 19, 'ekslusif', 0, '2024-11-27 19:02:23', '2024-11-27 19:02:23', NULL),
(40, 19, 'umum', 1, '2024-11-27 19:02:23', '2024-11-27 19:02:23', NULL),
(41, 20, 'kuno', 0, '2024-11-27 19:07:30', '2024-11-27 19:07:30', NULL),
(42, 20, 'sederhana', 0, '2024-11-27 19:07:30', '2024-11-27 19:07:30', NULL),
(43, 20, 'duplikat', 1, '2024-11-27 19:07:30', '2024-11-27 19:07:30', NULL),
(44, 20, 'murni', 0, '2024-11-27 19:07:31', '2024-11-27 19:07:31', NULL),
(45, 20, 'orsinil', 0, '2024-11-27 19:07:31', '2024-11-27 19:07:31', NULL),
(46, 21, 'lazim', 0, '2024-11-27 19:09:20', '2024-11-27 19:09:20', NULL),
(47, 21, 'awam', 0, '2024-11-27 19:09:20', '2024-11-27 19:09:20', NULL),
(48, 21, 'rahasia', 0, '2024-11-27 19:09:20', '2024-11-27 19:09:20', NULL),
(49, 21, 'aman', 1, '2024-11-27 19:09:20', '2024-11-27 19:09:20', NULL),
(50, 21, 'nyaman', 0, '2024-11-27 19:09:20', '2024-11-27 19:09:20', NULL),
(51, 22, 'kuatir', 0, '2024-11-27 19:10:26', '2024-11-27 19:10:26', NULL),
(52, 22, 'kampiun', 0, '2024-11-27 19:10:26', '2024-11-27 19:10:26', NULL),
(53, 22, 'jago', 1, '2024-11-27 19:10:26', '2024-11-27 19:10:26', NULL),
(54, 22, 'profesor', 0, '2024-11-27 19:10:26', '2024-11-27 19:10:26', NULL),
(55, 22, 'teknologi', 0, '2024-11-27 19:10:26', '2024-11-27 19:10:26', NULL),
(56, 23, 'bawah', 0, '2024-11-27 19:11:06', '2024-11-27 19:11:06', NULL),
(57, 23, 'kerdil', 0, '2024-11-27 19:11:06', '2024-11-27 19:11:06', NULL),
(58, 23, 'kecil', 0, '2024-11-27 19:11:06', '2024-11-27 19:11:06', NULL),
(59, 23, 'rendah', 1, '2024-11-27 19:11:06', '2024-11-27 19:11:06', NULL),
(60, 23, 'pendek', 0, '2024-11-27 19:11:06', '2024-11-27 19:11:06', NULL),
(61, 24, '14 hari', 0, '2024-11-28 07:20:33', '2024-11-28 07:20:33', NULL),
(62, 24, '15 hari', 0, '2024-11-28 07:20:33', '2024-11-28 07:20:33', NULL),
(63, 24, '16 hari', 0, '2024-11-28 07:20:33', '2024-11-28 07:20:33', NULL),
(64, 24, '17 hari', 0, '2024-11-28 07:20:33', '2024-11-28 07:20:33', NULL),
(65, 24, '18 hari', 1, '2024-11-28 07:20:33', '2024-11-28 07:20:33', NULL),
(66, 25, 'Rp. 1.000.000', 1, '2024-11-28 07:23:22', '2024-11-28 07:23:22', NULL),
(67, 25, 'Rp. 1.200.000', 0, '2024-11-28 07:23:22', '2024-11-28 07:23:22', NULL),
(68, 25, 'Rp. 1.300.000', 0, '2024-11-28 07:23:22', '2024-11-28 07:23:22', NULL),
(69, 25, 'Rp. 1.400.000', 0, '2024-11-28 07:23:22', '2024-11-28 07:23:22', NULL),
(70, 25, 'Rp. 1.500.000', 0, '2024-11-28 07:23:22', '2024-11-28 07:23:22', NULL),
(71, 26, '890.000,00.', 1, '2024-11-28 07:24:19', '2024-11-28 07:24:19', NULL),
(72, 26, '880.000,00', 0, '2024-11-28 07:24:19', '2024-11-28 07:24:19', NULL),
(73, 26, '870.000,00.', 0, '2024-11-28 07:24:19', '2024-11-28 07:24:19', NULL),
(74, 26, '860.000,00.', 0, '2024-11-28 07:24:19', '2024-11-28 07:24:19', NULL),
(75, 26, '850.000,00.', 0, '2024-11-28 07:24:19', '2024-11-28 07:24:19', NULL),
(76, 27, '180.000,00', 0, '2024-11-28 07:25:08', '2024-11-28 07:25:08', NULL),
(77, 27, '280.000,00', 0, '2024-11-28 07:25:08', '2024-11-28 07:25:08', NULL),
(78, 27, '320.000,00', 0, '2024-11-28 07:25:08', '2024-11-28 07:25:08', NULL),
(79, 27, '420.000,00', 1, '2024-11-28 07:25:08', '2024-11-28 07:25:08', NULL),
(80, 27, '380.000,00', 0, '2024-11-28 07:25:08', '2024-11-28 07:25:08', NULL),
(81, 28, '6 siswi dan 5 siswa', 0, '2024-11-28 07:26:00', '2024-11-28 07:26:00', NULL),
(82, 28, '5 siswi dan 6 siswa', 0, '2024-11-28 07:26:00', '2024-11-28 07:26:00', NULL),
(83, 28, '5 siswi dan 4 siswa', 0, '2024-11-28 07:26:00', '2024-11-28 07:26:00', NULL),
(84, 28, '6 siswi dan 4 siswa', 1, '2024-11-28 07:26:00', '2024-11-28 07:26:00', NULL),
(85, 28, '5 siswi dan 5 siswa', 0, '2024-11-28 07:26:00', '2024-11-28 07:26:00', NULL),
(86, 29, '22', 0, '2024-11-28 07:36:43', '2024-11-28 07:36:43', NULL),
(87, 29, '23', 0, '2024-11-28 07:36:43', '2024-11-28 07:36:43', NULL),
(88, 29, '24', 1, '2024-11-28 07:36:43', '2024-11-28 07:36:43', NULL),
(89, 29, '25', 0, '2024-11-28 07:36:43', '2024-11-28 07:36:43', NULL),
(90, 29, '26', 0, '2024-11-28 07:36:43', '2024-11-28 07:36:43', NULL),
(91, 30, '28', 0, '2024-11-28 07:38:52', '2024-11-28 07:38:52', NULL),
(92, 30, '24', 0, '2024-11-28 07:38:52', '2024-11-28 07:38:52', NULL),
(93, 30, '26', 1, '2024-11-28 07:38:52', '2024-11-28 07:38:52', NULL),
(94, 30, '30', 0, '2024-11-28 07:38:52', '2024-11-28 07:38:52', NULL),
(95, 30, '22', 0, '2024-11-28 07:38:52', '2024-11-28 07:38:52', NULL),
(96, 31, '8', 0, '2024-11-28 07:41:22', '2024-11-28 07:41:22', NULL),
(97, 31, '9', 0, '2024-11-28 07:41:23', '2024-11-28 07:41:23', NULL),
(98, 31, '10', 1, '2024-11-28 07:41:23', '2024-11-28 07:41:23', NULL),
(99, 31, '11', 0, '2024-11-28 07:41:23', '2024-11-28 07:41:23', NULL),
(100, 31, '12', 0, '2024-11-28 07:41:23', '2024-11-28 07:41:23', NULL),
(101, 32, '13', 0, '2024-11-28 07:41:55', '2024-11-28 07:41:55', NULL),
(102, 32, '14', 0, '2024-11-28 07:41:55', '2024-11-28 07:41:55', NULL),
(103, 32, '10', 0, '2024-11-28 07:41:55', '2024-11-28 07:41:55', NULL),
(104, 32, '6', 0, '2024-11-28 07:41:55', '2024-11-28 07:41:55', NULL),
(105, 32, '17', 1, '2024-11-28 07:41:55', '2024-11-28 07:41:55', NULL),
(106, 33, '32', 0, '2024-11-28 07:42:24', '2024-11-28 07:42:24', NULL),
(107, 33, '34', 0, '2024-11-28 07:42:24', '2024-11-28 07:42:24', NULL),
(108, 33, '35', 1, '2024-11-28 07:42:25', '2024-11-28 07:42:25', NULL),
(109, 33, '36', 0, '2024-11-28 07:42:25', '2024-11-28 07:42:25', NULL),
(110, 33, '38', 0, '2024-11-28 07:42:25', '2024-11-28 07:42:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loker_positions`
--

CREATE TABLE `loker_positions` (
  `id` bigint UNSIGNED NOT NULL,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `open_date` date NOT NULL,
  `close_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loker_positions`
--

INSERT INTO `loker_positions` (`id`, `job_title`, `description`, `open_date`, `close_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Software Enginer', 'Membangun aplikasi perangkat lunak', '2024-11-24', '2024-11-30', '2024-11-23 17:14:31', NULL, NULL),
(2, 'UI/UX Designer', 'Merancang antar muka / pengalaman pengguna.', '2024-11-24', '2024-11-25', '2024-11-23 17:14:31', NULL, NULL),
(3, 'design graphic', 'ngedit pokonya.', '2024-12-02', '2024-12-19', '2024-12-02 09:49:48', '2024-12-04 03:42:52', NULL),
(4, 'programmer', 'Bertanggung jawab dan bertugas untuk membuat dan mengembangkan suatu sistem, aplikasi, atau perangkat lunak dengan menggunakan bahasa pemrograman', '2024-12-05', '2024-12-25', '2024-12-03 09:26:16', '2024-12-03 09:26:16', NULL),
(5, 'marketing', NULL, '2024-12-03', '2024-12-31', '2024-12-03 09:44:26', '2024-12-04 03:42:09', '2024-12-04 03:42:09'),
(6, 'fashion designer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2024-12-03', '2024-12-06', '2024-12-03 09:47:22', '2024-12-04 03:42:34', '2024-12-04 03:42:34'),
(7, 'edit posisi loker', 'edit', '2024-12-05', '2024-12-26', '2024-12-04 03:56:31', '2024-12-04 03:56:52', '2024-12-04 03:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_22_032619_create_roles_table', 1),
(6, '2024_11_22_154035_create_psikotes_table', 1),
(7, '2024_11_22_154841_create_psikotes_questions_table', 1),
(8, '2024_11_22_154943_create_psikotes_answers_table', 1),
(9, '2024_11_22_155028_create_disc_table', 1),
(10, '2024_11_22_155108_create_disc_questions_table', 1),
(11, '2024_11_22_155135_create_disc_options_table', 1),
(12, '2024_11_22_155221_create_disc_answers_table', 1),
(13, '2024_11_23_165515_create_loker_positions_table', 2),
(14, '2024_11_23_170346_create_biodata_peserta_table', 2),
(15, '2024_11_26_031511_create_tests_table', 3),
(16, '2024_11_26_031859_create_questions_table', 3),
(17, '2024_11_26_031919_create_choices_table', 3),
(19, '2024_11_26_031932_create_answers_table', 4),
(20, '2024_11_28_013332_add_slug_to_tests_table', 5),
(21, '2024_11_28_021625_create_question_groups_table', 6),
(22, '2024_11_28_022029_add_order_to_questions_table', 6),
(23, '2024_11_28_033907_add_timer_to_question_groups_table', 7),
(24, '2024_11_28_034339_create_user_test_progress_table', 7),
(25, '2024_11_28_044724_create_answer_psikotes_table', 8),
(32, '2024_11_28_235953_create_question_disc_table', 9),
(33, '2024_11_29_000055_create_question_statement_disc_table', 9),
(34, '2024_11_29_000156_create_answer_disc_table', 9),
(35, '2024_12_02_082747_create_users_links_table', 10),
(36, '2024_12_02_132818_create_user_pw_hash_table', 11),
(37, '2024_12_03_131351_create_result_tests_table', 12),
(38, '2024_12_06_153112_create_users_pelanggarans_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `question_group_id` bigint UNSIGNED DEFAULT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` enum('essay','multiple_choice') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_group_id`, `test_id`, `question_text`, `question_type`, `image`, `created_at`, `updated_at`, `deleted_at`, `order`) VALUES
(1, 1, 1, '1,5 Km = …………………. Meter', 'essay', NULL, '2024-11-25 23:35:39', '2024-11-25 23:35:39', NULL, 0),
(2, 1, 1, '5000 gram = …………………. Kg', 'essay', NULL, '2024-11-25 23:38:48', '2024-11-25 23:38:48', NULL, 0),
(3, 1, 1, 'Tuliskan rumus Luas segitiga sama kaki = ……………………', 'essay', NULL, '2024-11-25 23:41:16', '2024-11-25 23:41:16', NULL, 0),
(4, 1, 1, '1,5 Jam = .............. Menit', 'essay', NULL, '2024-11-25 23:43:52', '2024-11-25 23:43:52', NULL, 0),
(13, 1, 1, 'berapakah luas gambar bangunan tersebut', 'essay', '1732605916.jpg', '2024-11-26 00:25:15', '2024-11-26 00:25:16', NULL, 0),
(14, 2, 1, 'gaji = ..........', 'multiple_choice', NULL, '2024-11-26 01:29:11', '2024-11-26 01:29:11', NULL, 0),
(15, 2, 1, 'registrasi = ..........', 'multiple_choice', NULL, '2024-11-26 01:30:43', '2024-11-26 01:30:43', NULL, 0),
(16, 2, 1, 'alternatif = ..........', 'multiple_choice', NULL, '2024-11-26 01:33:10', '2024-11-26 01:33:10', NULL, 0),
(17, 2, 1, 'klarifikasi = ..........', 'multiple_choice', NULL, '2024-11-26 01:34:30', '2024-11-26 01:34:30', NULL, 0),
(18, 2, 1, 'insomnia = ..........', 'multiple_choice', NULL, '2024-11-26 01:35:20', '2024-11-26 01:35:20', NULL, 0),
(19, 3, 1, 'khas >< ..........', 'multiple_choice', NULL, '2024-11-27 19:02:23', '2024-11-27 19:02:23', NULL, 0),
(20, 3, 1, 'asli >< ..........', 'multiple_choice', NULL, '2024-11-27 19:07:30', '2024-11-27 19:07:30', NULL, 0),
(21, 3, 1, 'rawan >< ..........', 'multiple_choice', NULL, '2024-11-27 19:09:20', '2024-11-27 19:09:20', NULL, 0),
(22, 3, 1, 'amatir >< ..........', 'multiple_choice', NULL, '2024-11-27 19:10:26', '2024-11-27 19:10:26', NULL, 0),
(23, 3, 1, 'tinggi >< ..........', 'multiple_choice', NULL, '2024-11-27 19:11:06', '2024-11-27 19:11:06', NULL, 0),
(24, 4, 1, 'Untuk mengerjakan 1 unit rumah minimalist dibutuhkan waktu 36 hari dengan 12 tenaga kerja. Berapa waktu yang akan dihabiskan bila menggunakan 24 orang tenaga kerja?', 'multiple_choice', NULL, '2024-11-28 07:20:33', '2024-11-28 07:20:33', NULL, 0),
(25, 4, 1, 'arya memiliki uang Rp. 4.500.000 dan ia berniat untuk membeli sebuah handicam seharga Rp. 2.500.00 sebelum diskon. harga diskon handicam tersebut adalah 20%. Selain itu, arya juga membelanjakan uangnya untuk keperluan lain sebesar Rp. 1.500.000. Berapa sisa uang Arya saat ini?', 'multiple_choice', NULL, '2024-11-28 07:23:22', '2024-11-28 07:23:22', NULL, 0),
(26, 4, 1, 'Bu Ratna membeli baju di Supermarket dengan diskon besar-besaran. Berbagai macam diskon diberikan kepada orang yang mau membeli baju tersebut. Bu Ratna mendapatkan tiga baju dengan diskon yang berbeda-beda. Baju A memiliki harga Rp. 300.000,00 mendapatkan diskon 10%, baju B memiliki harga Rp. 200.000,00 mendapatkan diskon 10% dan baju C memiliki harga Rp. 550.000,00 mendapatkan diskon 20%. Berapa biaya yang dibutuhkan bu Ratna untuk membeli baju tersebut.', 'multiple_choice', NULL, '2024-11-28 07:24:19', '2024-11-28 07:24:19', NULL, 0),
(27, 4, 1, 'Ani ingin membeli sebuah tas dengan harga yang ada diskonnya. Kemudian ia berkeliling-keliling mencari          tas dengan diskon yang besar. Ternyata ia sudah menemukan tas dengan diskon 30% dan harga asli tasnya yaitu Rp. 600.000,00. Berapa harga tas yang harus dibayar oleh Ani?', 'multiple_choice', NULL, '2024-11-28 07:25:08', '2024-11-28 07:25:08', NULL, 0),
(28, 4, 1, 'Satu kelas terdiri dari 25 siswi dan 15 siswa. Dalam satu kelas yang memiliki rata-rata berat badan 45 kg yaitu 10 siswi dan 5 siswa, sedangkan yang memiliki rata-rata berat badan 50 kg yaitu 9 siswi dan 6 siswa dan sisanya memiliki berat badan diatas 50 kg. Berapa jumlah siswi dan siswa yang memiliki berat badan diatas 50 kg?', 'multiple_choice', NULL, '2024-11-28 07:26:00', '2024-11-28 07:26:00', NULL, 0),
(29, 5, 1, '8, 12, 16, 20, …..', 'multiple_choice', NULL, '2024-11-28 07:36:43', '2024-11-28 07:36:43', NULL, 0),
(30, 5, 1, '2, 8, 14, 20, … , 32', 'multiple_choice', NULL, '2024-11-28 07:38:52', '2024-11-28 07:38:52', NULL, 0),
(31, 5, 1, '100-4-90-7-80-…..', 'multiple_choice', NULL, '2024-11-28 07:41:22', '2024-11-28 07:41:22', NULL, 0),
(32, 5, 1, '5-7-10-12-15-…', 'multiple_choice', NULL, '2024-11-28 07:41:55', '2024-11-28 07:41:55', NULL, 0),
(33, 5, 1, '7, 14, 21, 28, …', 'multiple_choice', NULL, '2024-11-28 07:42:24', '2024-11-28 07:42:24', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_disc`
--

CREATE TABLE `question_disc` (
  `id` bigint UNSIGNED NOT NULL,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_disc`
--

INSERT INTO `question_disc` (`id`, `question_text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'gambaran diri', '2024-11-30 16:35:28', '2024-12-05 08:17:06', NULL),
(4, 'gambaran diri', '2024-11-30 16:39:37', '2024-11-30 16:39:37', NULL),
(5, 'gambaran diri', '2024-11-30 16:40:18', '2024-11-30 16:40:18', NULL),
(6, 'gambaran diri', '2024-11-30 16:42:10', '2024-11-30 16:42:10', NULL),
(7, 'gambaran diri', '2024-11-30 16:42:51', '2024-11-30 16:42:51', NULL),
(8, 'gambaran diri', '2024-11-30 16:44:32', '2024-11-30 16:44:32', NULL),
(9, 'gambaran diri', '2024-11-30 16:45:10', '2024-11-30 16:45:10', NULL),
(10, 'gambaran diri', '2024-11-30 16:45:47', '2024-11-30 16:45:47', NULL),
(11, 'gambaran diri', '2024-11-30 16:46:25', '2024-11-30 16:46:25', NULL),
(12, 'gambaran diri', '2024-11-30 16:47:15', '2024-11-30 16:47:15', NULL),
(13, 'gambaran diri', '2024-11-30 17:32:33', '2024-11-30 17:32:33', NULL),
(14, 'gambaran diri', '2024-12-01 16:15:22', '2024-12-01 16:15:22', NULL),
(15, 'gambaran diri', '2024-12-01 16:16:52', '2024-12-01 16:16:52', NULL),
(16, 'gambaran diri', '2024-12-01 16:17:33', '2024-12-01 16:17:33', NULL),
(17, 'gambaran diri', '2024-12-01 16:18:35', '2024-12-01 16:18:35', NULL),
(18, 'gambaran diri', '2024-12-01 16:19:21', '2024-12-01 16:19:21', NULL),
(19, 'gambaran diri', '2024-12-01 16:20:05', '2024-12-01 16:20:05', NULL),
(20, 'gambaran diri', '2024-12-01 16:20:48', '2024-12-01 16:20:48', NULL),
(21, 'gambaran diri', '2024-12-01 16:21:29', '2024-12-01 16:21:29', NULL),
(22, 'gambaran diri', '2024-12-01 16:22:07', '2024-12-01 16:22:07', NULL),
(23, 'gambaran diri', '2024-12-04 06:39:44', '2024-12-04 06:39:44', NULL),
(24, 'gambaran diri', '2024-12-04 06:42:55', '2024-12-04 06:42:55', NULL),
(25, 'gambaran diri', '2024-12-04 06:44:52', '2024-12-04 06:44:52', NULL),
(26, 'gambaran diri', '2024-12-04 06:45:35', '2024-12-04 06:45:35', NULL),
(27, 'gambaran mang agus edit', '2024-12-06 06:48:58', '2024-12-06 07:00:46', '2024-12-06 07:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `question_groups`
--

CREATE TABLE `question_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  `group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `duration` float NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_groups`
--

INSERT INTO `question_groups` (`id`, `test_id`, `group_name`, `order`, `created_at`, `updated_at`, `deleted_at`, `duration`) VALUES
(1, 1, 'essay', 1, '2024-11-28 02:23:23', NULL, NULL, 1),
(2, 1, 'test sinonim', 2, '2024-11-28 02:23:23', NULL, NULL, 1),
(3, 1, 'test antonim', 3, '2024-11-28 02:23:23', NULL, NULL, 120),
(4, 1, 'test aritmatik', 4, '2024-11-28 02:23:23', NULL, NULL, 120),
(5, 1, 'test deret angkat', 5, '2024-11-28 02:23:23', '2024-12-04 06:23:05', NULL, 120);

-- --------------------------------------------------------

--
-- Table structure for table `question_statement_disc`
--

CREATE TABLE `question_statement_disc` (
  `id` bigint UNSIGNED NOT NULL,
  `question_disc_id` bigint UNSIGNED NOT NULL,
  `statement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_statement_disc`
--

INSERT INTO `question_statement_disc` (`id`, `question_disc_id`, `statement`, `created_at`, `updated_at`) VALUES
(1, 3, 'memberi semangat', '2024-11-30 16:35:28', '2024-12-05 08:17:06'),
(2, 3, 'petualang', '2024-11-30 16:35:28', '2024-12-05 08:17:06'),
(3, 3, 'teliti', '2024-11-30 16:35:29', '2024-12-05 08:17:06'),
(4, 3, 'mudah menyesuaikan diri', '2024-11-30 16:35:29', '2024-12-05 08:17:06'),
(5, 4, 'berpendirian teguh', '2024-11-30 16:39:37', '2024-11-30 16:39:37'),
(6, 4, 'suka bercerita', '2024-11-30 16:39:37', '2024-11-30 16:39:37'),
(7, 4, 'senang membujuk', '2024-11-30 16:39:37', '2024-11-30 16:39:37'),
(8, 4, 'suka berdamai', '2024-11-30 16:39:37', '2024-11-30 16:39:37'),
(9, 5, 'perencana', '2024-11-30 16:40:18', '2024-11-30 16:40:18'),
(10, 5, 'sabar', '2024-11-30 16:40:18', '2024-11-30 16:40:18'),
(11, 5, 'berpikir positif', '2024-11-30 16:40:18', '2024-11-30 16:40:18'),
(12, 5, 'suka memuji', '2024-11-30 16:40:18', '2024-11-30 16:40:18'),
(13, 6, 'ramah tamah', '2024-11-30 16:42:10', '2024-11-30 16:42:10'),
(14, 6, 'jujur', '2024-11-30 16:42:10', '2024-11-30 16:42:10'),
(15, 6, 'tegar / kuat hati', '2024-11-30 16:42:10', '2024-11-30 16:42:10'),
(16, 6, 'suka senda gurau', '2024-11-30 16:42:10', '2024-11-30 16:42:10'),
(17, 7, 'rapi', '2024-11-30 16:42:51', '2024-11-30 16:42:51'),
(18, 7, 'suka berbicara terus terang', '2024-11-30 16:42:51', '2024-11-30 16:42:51'),
(19, 7, 'optimis', '2024-11-30 16:42:51', '2024-11-30 16:42:51'),
(20, 7, 'sopan / hormat', '2024-11-30 16:42:51', '2024-11-30 16:42:51'),
(21, 8, 'praktis', '2024-11-30 16:44:32', '2024-11-30 16:44:32'),
(22, 8, 'ketat pada waktu', '2024-11-30 16:44:32', '2024-11-30 16:44:32'),
(23, 8, 'pemalu', '2024-11-30 16:44:32', '2024-11-30 16:44:32'),
(24, 8, 'spontan', '2024-11-30 16:44:32', '2024-11-30 16:44:32'),
(25, 9, 'bersemangat', '2024-11-30 16:45:10', '2024-11-30 16:45:10'),
(26, 9, 'peka / perasa', '2024-11-30 16:45:10', '2024-11-30 16:45:10'),
(27, 9, 'cepat puas', '2024-11-30 16:45:10', '2024-11-30 16:45:10'),
(28, 9, 'percaya diri', '2024-11-30 16:45:10', '2024-11-30 16:45:10'),
(29, 10, 'mau mengalah', '2024-11-30 16:45:47', '2024-11-30 16:45:47'),
(30, 10, 'suka berkorban', '2024-11-30 16:45:47', '2024-11-30 16:45:47'),
(31, 10, 'pandai bergaul', '2024-11-30 16:45:47', '2024-11-30 16:45:47'),
(32, 10, 'berkemauan kuat', '2024-11-30 16:45:47', '2024-11-30 16:45:47'),
(33, 11, 'periang', '2024-11-30 16:46:25', '2024-11-30 16:46:25'),
(34, 11, 'dihormati orang lain', '2024-11-30 16:46:25', '2024-11-30 16:46:25'),
(35, 11, 'cenderung menahan diri', '2024-11-30 16:46:25', '2024-11-30 16:46:25'),
(36, 11, 'senang menangani masalah', '2024-11-30 16:46:25', '2024-11-30 16:46:25'),
(37, 12, 'penuh pertimbangan', '2024-11-30 16:47:15', '2024-11-30 16:47:15'),
(38, 12, 'senang dibimbing', '2024-11-30 16:47:15', '2024-11-30 16:47:15'),
(39, 12, 'suka bersaing', '2024-11-30 16:47:15', '2024-11-30 16:47:15'),
(40, 12, 'suka meyakinkan', '2024-11-30 16:47:15', '2024-11-30 16:47:15'),
(41, 13, 'riang / gembira', '2024-11-30 17:32:34', '2024-11-30 17:32:34'),
(42, 13, 'konsistern / tidak mudah berubah', '2024-11-30 17:32:34', '2024-11-30 17:32:34'),
(43, 13, 'berbudaya / terpelajar', '2024-11-30 17:32:34', '2024-11-30 17:32:34'),
(44, 13, 'berani mengambil resiko', '2024-11-30 17:32:34', '2024-11-30 17:32:34'),
(45, 14, 'berani / tidak penakut', '2024-12-01 16:15:22', '2024-12-01 16:15:22'),
(46, 14, 'menyukai orang lain', '2024-12-01 16:15:22', '2024-12-01 16:15:22'),
(47, 14, 'diplomatis / berhati - hati', '2024-12-01 16:15:22', '2024-12-01 16:15:22'),
(48, 14, 'rinci / terperinci', '2024-12-01 16:15:22', '2024-12-01 16:15:22'),
(49, 15, 'lincah / suka membuka diri', '2024-12-01 16:16:52', '2024-12-01 16:16:52'),
(50, 15, 'mampu memutuskan', '2024-12-01 16:16:52', '2024-12-01 16:16:52'),
(51, 15, 'cinta keluarga', '2024-12-01 16:16:52', '2024-12-01 16:16:52'),
(52, 15, 'tekun / ulet', '2024-12-01 16:16:52', '2024-12-01 16:16:52'),
(53, 16, 'idealis', '2024-12-01 16:17:33', '2024-12-01 16:17:33'),
(54, 16, 'mandiri', '2024-12-01 16:17:33', '2024-12-01 16:17:33'),
(55, 16, 'percaya pada ide teman', '2024-12-01 16:17:33', '2024-12-01 16:17:33'),
(56, 16, 'suka memberi inspirasi', '2024-12-01 16:17:33', '2024-12-01 16:17:33'),
(57, 17, 'senang berpikir', '2024-12-01 16:18:35', '2024-12-01 16:18:35'),
(58, 17, 'suka ngotot kuat bertahan', '2024-12-01 16:18:35', '2024-12-01 16:18:35'),
(59, 17, 'senang bicara', '2024-12-01 16:18:35', '2024-12-01 16:18:35'),
(60, 17, 'bersikap tolol', '2024-12-01 16:18:35', '2024-12-01 16:18:35'),
(61, 18, 'perantara / penengah', '2024-12-01 16:19:21', '2024-12-01 16:19:21'),
(62, 18, 'gemar musik lembut', '2024-12-01 16:19:21', '2024-12-01 16:19:21'),
(63, 18, 'cepat bertindak', '2024-12-01 16:19:21', '2024-12-01 16:19:21'),
(64, 18, 'mudah bergaul', '2024-12-01 16:19:21', '2024-12-01 16:19:21'),
(65, 19, 'perfeksionis', '2024-12-01 16:20:05', '2024-12-01 16:20:05'),
(66, 19, 'suka mengijinkan', '2024-12-01 16:20:05', '2024-12-01 16:20:05'),
(67, 19, 'produktif / menghasilkan', '2024-12-01 16:20:05', '2024-12-01 16:20:05'),
(68, 19, 'terkenal luar / populer', '2024-12-01 16:20:05', '2024-12-01 16:20:05'),
(69, 20, 'mudah menerima saran', '2024-12-01 16:20:48', '2024-12-01 16:20:48'),
(70, 20, 'suka memimpin', '2024-12-01 16:20:48', '2024-12-01 16:20:48'),
(71, 20, 'produktif / menghasilkan', '2024-12-01 16:20:48', '2024-12-01 16:20:48'),
(72, 20, 'lucu / humoris', '2024-12-01 16:20:48', '2024-12-01 16:20:48'),
(73, 21, 'pendiam', '2024-12-01 16:21:29', '2024-12-01 16:21:29'),
(74, 21, 'gampang tersinggung', '2024-12-01 16:21:29', '2024-12-01 16:21:29'),
(75, 21, 'suka melawan / membantah', '2024-12-01 16:21:29', '2024-12-01 16:21:29'),
(76, 21, 'sering mengulang janji', '2024-12-01 16:21:29', '2024-12-01 16:21:29'),
(77, 22, 'kurang disiplin', '2024-12-01 16:22:07', '2024-12-01 16:22:07'),
(78, 22, 'tidak simpatik', '2024-12-01 16:22:07', '2024-12-01 16:22:07'),
(79, 22, 'kurang antusias/ tidak bergairah', '2024-12-01 16:22:07', '2024-12-01 16:22:07'),
(80, 22, 'tidak mudah memaafkan', '2024-12-01 16:22:07', '2024-12-01 16:22:07'),
(81, 23, 'bicara ramai', '2024-12-04 06:39:44', '2024-12-04 06:39:44'),
(82, 23, 'bersikap seperti Boss (Bossy)', '2024-12-04 06:39:44', '2024-12-04 06:39:44'),
(83, 23, 'malu-malu / sungkan', '2024-12-04 06:39:45', '2024-12-04 06:39:45'),
(84, 23, 'tanpa ekspresi/ datar', '2024-12-04 06:39:45', '2024-12-04 06:39:45'),
(85, 24, 'tidak sabaran', '2024-12-04 06:42:55', '2024-12-04 06:42:55'),
(86, 24, 'tidak merasa aman / mantap', '2024-12-04 06:42:55', '2024-12-04 06:42:55'),
(87, 24, 'sering bingung memutuskan', '2024-12-04 06:42:55', '2024-12-04 06:42:55'),
(88, 24, 'suka menyela', '2024-12-04 06:42:55', '2024-12-04 06:42:55'),
(89, 25, 'rewel / ngomel melulu', '2024-12-04 06:44:53', '2024-12-04 06:44:53'),
(90, 25, 'suka takut / kuatir', '2024-12-04 06:44:53', '2024-12-04 06:44:53'),
(91, 25, 'pelupa', '2024-12-04 06:44:53', '2024-12-04 06:44:53'),
(92, 25, 'cenderung blak-blakan', '2024-12-04 06:44:53', '2024-12-04 06:44:53'),
(93, 26, 'keras kepala', '2024-12-04 06:45:35', '2024-12-04 06:45:35'),
(94, 26, 'serampangan / ceroboh', '2024-12-04 06:45:35', '2024-12-04 06:45:35'),
(95, 26, 'sulit mengikhlaskan', '2024-12-04 06:45:35', '2024-12-04 06:45:35'),
(96, 26, 'tidak suka melibatkan diri', '2024-12-04 06:45:35', '2024-12-04 06:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `result_tests`
--

CREATE TABLE `result_tests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `score` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_tests`
--

INSERT INTO `result_tests` (`id`, `user_id`, `score`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 100, '2024-12-03 07:45:16', NULL, NULL),
(4, 12, 20, '2024-12-04 07:17:22', '2024-12-04 07:17:22', NULL),
(5, 17, 0, '2024-12-06 07:35:11', '2024-12-06 07:35:11', NULL),
(6, 13, 0, '2024-12-06 07:45:36', '2024-12-06 07:45:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `slug`, `test_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'psikotes', 'psikotes', '2024-11-25 21:09:42', '2024-11-25 21:09:42', NULL),
(3, 'disc', 'disc', '2024-12-03 08:23:59', '2024-12-03 08:24:02', NULL),
(4, 'test', 'test', '2024-12-04 04:07:44', '2024-12-04 04:08:33', '2024-12-04 04:08:33'),
(5, 'test-2', 'test 2', '2024-12-04 04:08:43', '2024-12-04 04:24:42', '2024-12-04 04:24:42'),
(6, 'test-3', 'test 3', '2024-12-04 04:09:17', '2024-12-04 04:24:40', '2024-12-04 04:24:40'),
(7, 'test-4', 'test 4', '2024-12-04 04:09:25', '2024-12-04 04:24:39', '2024-12-04 04:24:39'),
(8, 'test-5', 'test 5', '2024-12-04 04:10:23', '2024-12-04 04:24:28', '2024-12-04 04:24:28'),
(9, 'fikri-nurmaila-kasep', 'fikri nurmaila kasep', '2024-12-04 04:21:52', '2024-12-04 04:22:06', '2024-12-04 04:22:06'),
(10, 'fikri-kasep-pisan', 'fikri kasep pisan', '2024-12-04 04:22:21', '2024-12-04 04:24:20', '2024-12-04 04:24:20'),
(11, 'fikri-kasep-hehe', 'fikri kasep hehe', '2024-12-04 04:23:07', '2024-12-04 04:24:25', '2024-12-04 04:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fikri Tmvn', 'fikrinurmaila@gmail.com', NULL, '$2y$10$MKiQlCEjwl4xdDn83Ie6Xu0VnFFmo6dEWEY3P3pGnOKZ812ObMKp.', 2, NULL, '2024-11-22 09:20:22', '2024-12-03 04:12:31'),
(2, 'HRD Fluffy', 'hrdfluffy@gmail.com', NULL, '$2y$10$BgPvPHjyBqtpMTWl5ZmhJu0JnOYeQQY1KdhV7LgZuIocZ80FFMGie', 1, NULL, '2024-11-25 00:22:45', '2024-12-05 03:21:56'),
(7, 'lea dewi', 'leadewi@gmail.com', NULL, '$2y$10$i6liaC21Bw4yLYwtdnmON.07utujhogJhVBgnlf6sC9Q96HwC58si', 2, NULL, '2024-12-02 07:53:08', '2024-12-02 07:53:08'),
(8, 'fulan', 'fulan@gmail.com', NULL, '$2y$10$.YPUvnLcVCwv5Pmk4iLvh.YBEZhZkMdPdhoe2X2zaRVZrrX/kMGr6', 2, NULL, '2024-12-03 01:41:29', '2024-12-03 01:41:29'),
(9, 'atghata', 'aghata@gmail.com', NULL, '$2y$10$a7QfZB7EJl4HZLqD1oH9buMF9wDR5DKHxrVLs32DVQ8rDLi61bvHe', 2, NULL, '2024-12-03 01:50:31', '2024-12-03 01:50:31'),
(10, 'fulan bin fulan', 'fulanbinfulan@gmail.com', NULL, '$2y$10$vJ6odNwX5yQTdVkl2E/baOdxg1fpSIDMIIkdPZ/gEI81tdMQ1IsW.', 2, NULL, '2024-12-03 02:10:23', '2024-12-03 04:10:29'),
(12, 'ciro alves bandung poenya', 'ciroalves@gmail.com', NULL, '$2y$10$VwS4BFPVuF0FHCndPAF3w.Yek84V25d3W70oFLFQtRibqMoCtR7le', 2, NULL, '2024-12-03 09:17:30', '2024-12-03 09:22:05'),
(13, 'john doe', 'johndoe@gmail.com', NULL, '$2y$10$e5dNJX2tS3RrdjrgJJ5pYuXfasX7VYMXOk6H7ACjhvspWcRovq3em', 2, NULL, '2024-12-04 08:11:02', '2024-12-06 07:36:10'),
(14, 'fluffy baby', 'fluffybaby@gmail.com', NULL, '$2y$10$NdM.ySeSDgsPzsxmMPXyTOlPp3EfZxLyz3.0IfEI4N47v7cGUQnP2', 1, NULL, '2024-12-05 02:38:56', '2024-12-05 02:38:56'),
(16, 'it fluffy', 'itfluffy@gmail.com', NULL, '$2y$10$KMjYG1flul5GliZKwA/lv.fW3U/iligl0P8/FscN81rSHQmRV.C.y', 1, NULL, '2024-12-05 02:57:23', '2024-12-05 03:22:28'),
(17, 'haji naufal firadus', 'naufalfirdaus@gmail.com', NULL, '$2y$10$O8bHQVOT66aseMnhvl9Sn.mjrt7179r72NkCOgMaGnT1SnfXWIDJu', 2, NULL, '2024-12-06 07:01:47', '2024-12-06 07:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `users_links`
--

CREATE TABLE `users_links` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `link_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_links`
--

INSERT INTO `users_links` (`id`, `user_id`, `link_key`, `original_url`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 1, '0NvIufL9NU', 'http://fluffy-psikotest.devapp:8080/t/0NvIufL9NU', NULL, '2024-12-02 04:00:26', '2024-12-02 04:00:26'),
(5, 7, 'c3O1vO81JJ', 'http://fluffy-psikotest.devapp:8080/t/c3O1vO81JJ', NULL, '2024-12-02 08:03:39', '2024-12-02 08:03:39'),
(6, 10, '61OFa5MuNX', 'http://fluffy-psikotest.devapp:8080/t/61OFa5MuNX', NULL, '2024-12-03 03:00:35', '2024-12-03 03:00:35'),
(8, 12, 'ZG4dUyBKaC', 'http://fluffy-psikotest.devapp:8080/t/ZG4dUyBKaC', NULL, '2024-12-03 09:17:35', '2024-12-03 09:17:35'),
(9, 17, 'h6zyZza4ul', 'http://fluffy-psikotest.devapp:8080/t/h6zyZza4ul', NULL, '2024-12-06 07:03:09', '2024-12-06 07:03:09'),
(10, 13, 'eCEtDzrCwz', 'http://fluffy-psikotest.devapp:8080/t/eCEtDzrCwz', NULL, '2024-12-06 07:35:47', '2024-12-06 07:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `users_pelanggarans`
--

CREATE TABLE `users_pelanggarans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `waktu_pelanggaran` timestamp NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_pelanggarans`
--

INSERT INTO `users_pelanggarans` (`id`, `user_id`, `waktu_pelanggaran`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, '2024-12-06 09:02:36', 'Pengguna beralih tab', '2024-12-06 09:02:36', '2024-12-06 09:21:06', '2024-12-06 09:21:06'),
(3, 17, '2024-12-06 09:35:18', 'Pengguna beralih tab', '2024-12-06 09:35:18', '2024-12-06 09:35:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_pw_hash`
--

CREATE TABLE `user_pw_hash` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pw_hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_pw_hash`
--

INSERT INTO `user_pw_hash` (`id`, `user_id`, `pw_hash`, `created_at`, `updated_at`) VALUES
(1, 7, 'M0hGcmNheEI=', '2024-12-02 07:53:08', '2024-12-02 07:53:08'),
(2, 8, 'WGtsOFVtZXo=', '2024-12-03 01:41:29', '2024-12-03 01:41:29'),
(3, 9, 'WUl5dFg2R3I=', '2024-12-03 01:50:31', '2024-12-03 01:50:31'),
(4, 10, 'cGFzc3dvcmQ=', '2024-12-03 02:10:23', '2024-12-03 04:10:29'),
(5, 1, 'MzBqdW5pMTk5Nw==', '2024-12-03 04:12:31', '2024-12-03 04:12:31'),
(7, 12, 'cGFzc3dvcmQ=', '2024-12-03 09:17:31', '2024-12-03 09:17:31'),
(8, 13, 'YXc=', '2024-12-04 08:11:02', '2024-12-06 07:36:10'),
(9, 14, 'cGFzc3dvcmQ=', '2024-12-05 02:38:56', '2024-12-05 02:38:56'),
(11, 16, 'aGVsbG9mbHVmZnk=', '2024-12-05 02:57:23', '2024-12-05 03:22:28'),
(12, 2, 'YXc=', '2024-12-05 03:15:34', '2024-12-05 03:21:56'),
(13, 17, 'cGFzc3dvcmQ=', '2024-12-06 07:01:47', '2024-12-06 07:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_test_progress`
--

CREATE TABLE `user_test_progress` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  `question_group_id` bigint UNSIGNED NOT NULL,
  `start_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_test_progress`
--

INSERT INTO `user_test_progress` (`id`, `user_id`, `test_id`, `question_group_id`, `start_at`, `end_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 1, 1, 1, '2024-11-28 07:15:54', '2024-11-28 07:18:38', '2024-11-28 07:15:54', '2024-11-28 07:18:38', NULL),
(20, 1, 1, 2, '2024-11-28 07:18:38', '2024-11-28 07:18:50', '2024-11-28 07:18:38', '2024-11-28 07:18:50', NULL),
(21, 1, 1, 3, '2024-11-28 07:18:51', '2024-11-28 07:19:00', '2024-11-28 07:18:51', '2024-11-28 07:19:00', NULL),
(22, 1, 1, 4, '2024-11-28 07:19:00', '2024-11-28 07:28:22', '2024-11-28 07:19:00', '2024-11-28 07:28:22', NULL),
(23, 1, 1, 5, '2024-11-28 07:28:22', '2024-11-28 07:48:07', '2024-11-28 07:28:22', '2024-11-28 07:48:07', NULL),
(24, 7, 1, 1, '2024-12-02 08:21:37', '2024-12-02 08:22:01', '2024-12-02 08:21:37', '2024-12-02 08:22:01', NULL),
(25, 7, 1, 2, '2024-12-02 08:22:02', '2024-12-02 08:22:24', '2024-12-02 08:22:02', '2024-12-02 08:22:24', NULL),
(26, 7, 1, 3, '2024-12-02 08:22:25', '2024-12-02 08:22:29', '2024-12-02 08:22:25', '2024-12-02 08:22:29', NULL),
(27, 7, 1, 4, '2024-12-02 08:22:29', '2024-12-02 08:22:57', '2024-12-02 08:22:29', '2024-12-02 08:22:57', NULL),
(28, 7, 1, 5, '2024-12-02 08:22:57', '2024-12-02 08:23:00', '2024-12-02 08:22:57', '2024-12-02 08:23:00', NULL),
(34, 12, 1, 1, '2024-12-04 07:03:48', '2024-12-04 07:07:00', '2024-12-04 07:03:48', '2024-12-04 07:07:00', NULL),
(35, 12, 1, 2, '2024-12-04 07:06:51', '2024-12-04 07:07:51', '2024-12-04 07:06:51', '2024-12-04 07:07:51', NULL),
(36, 12, 1, 3, '2024-12-04 07:07:51', '2024-12-04 07:08:52', '2024-12-04 07:07:51', '2024-12-04 07:08:52', NULL),
(37, 12, 1, 4, '2024-12-04 07:08:52', '2024-12-04 07:09:52', '2024-12-04 07:08:52', '2024-12-04 07:09:52', NULL),
(38, 12, 1, 5, '2024-12-04 07:09:52', '2024-12-04 07:17:22', '2024-12-04 07:09:52', '2024-12-04 07:17:22', NULL),
(49, 13, 1, 1, '2024-12-06 07:48:14', '2024-12-06 07:50:49', '2024-12-06 07:48:14', '2024-12-06 07:50:49', NULL),
(50, 13, 1, 2, '2024-12-06 07:48:19', '2024-12-06 07:50:49', '2024-12-06 07:48:19', '2024-12-06 07:50:49', NULL),
(51, 13, 1, 3, '2024-12-06 07:50:22', NULL, '2024-12-06 07:50:22', '2024-12-06 07:50:22', NULL),
(52, 13, 1, 5, '2024-12-06 07:50:34', NULL, '2024-12-06 07:50:34', '2024-12-06 07:50:34', NULL),
(57, 17, 1, 1, '2024-12-06 09:33:13', '2024-12-06 09:33:19', '2024-12-06 09:33:13', '2024-12-06 09:33:19', NULL),
(58, 17, 1, 2, '2024-12-06 09:33:19', '2024-12-06 09:34:20', '2024-12-06 09:33:19', '2024-12-06 09:34:20', NULL),
(59, 17, 1, 3, '2024-12-06 09:34:20', NULL, '2024-12-06 09:34:20', '2024-12-06 09:34:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_disc`
--
ALTER TABLE `answer_disc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_disc_user_id_foreign` (`user_id`),
  ADD KEY `answer_disc_question_id_foreign` (`question_id`),
  ADD KEY `answer_disc_most_selected_foreign` (`most_selected`),
  ADD KEY `answer_disc_least_selected_foreign` (`least_selected`);

--
-- Indexes for table `answer_psikotes`
--
ALTER TABLE `answer_psikotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_psikotes_question_id_foreign` (`question_id`),
  ADD KEY `answer_psikotes_user_id_foreign` (`user_id`),
  ADD KEY `answer_psikotes_selected_choice_id_foreign` (`selected_choice_id`);

--
-- Indexes for table `biodata_peserta`
--
ALTER TABLE `biodata_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_peserta_user_id_foreign` (`user_id`),
  ADD KEY `biodata_peserta_position_id_foreign` (`position_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choices_question_id_foreign` (`question_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loker_positions`
--
ALTER TABLE `loker_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_test_id_foreign` (`test_id`),
  ADD KEY `questions_question_group_id_foreign` (`question_group_id`);

--
-- Indexes for table `question_disc`
--
ALTER TABLE `question_disc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_groups`
--
ALTER TABLE `question_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_groups_test_id_foreign` (`test_id`);

--
-- Indexes for table `question_statement_disc`
--
ALTER TABLE `question_statement_disc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_statement_disc_question_id_foreign` (`question_disc_id`);

--
-- Indexes for table `result_tests`
--
ALTER TABLE `result_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_links`
--
ALTER TABLE `users_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_links_link_key_unique` (`link_key`),
  ADD KEY `users_links_user_id_foreign` (`user_id`);

--
-- Indexes for table `users_pelanggarans`
--
ALTER TABLE `users_pelanggarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_pelanggarans_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_pw_hash`
--
ALTER TABLE `user_pw_hash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_pw_hash_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_test_progress`
--
ALTER TABLE `user_test_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_test_progress_user_id_foreign` (`user_id`),
  ADD KEY `user_test_progress_test_id_foreign` (`test_id`),
  ADD KEY `user_test_progress_question_group_id_foreign` (`question_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_disc`
--
ALTER TABLE `answer_disc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `answer_psikotes`
--
ALTER TABLE `answer_psikotes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `biodata_peserta`
--
ALTER TABLE `biodata_peserta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loker_positions`
--
ALTER TABLE `loker_positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `question_disc`
--
ALTER TABLE `question_disc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `question_groups`
--
ALTER TABLE `question_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_statement_disc`
--
ALTER TABLE `question_statement_disc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `result_tests`
--
ALTER TABLE `result_tests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_links`
--
ALTER TABLE `users_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_pelanggarans`
--
ALTER TABLE `users_pelanggarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_pw_hash`
--
ALTER TABLE `user_pw_hash`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_test_progress`
--
ALTER TABLE `user_test_progress`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_disc`
--
ALTER TABLE `answer_disc`
  ADD CONSTRAINT `answer_disc_least_selected_foreign` FOREIGN KEY (`least_selected`) REFERENCES `question_statement_disc` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_disc_most_selected_foreign` FOREIGN KEY (`most_selected`) REFERENCES `question_statement_disc` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_disc_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `question_disc` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_disc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `answer_psikotes`
--
ALTER TABLE `answer_psikotes`
  ADD CONSTRAINT `answer_psikotes_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_psikotes_selected_choice_id_foreign` FOREIGN KEY (`selected_choice_id`) REFERENCES `choices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_psikotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `biodata_peserta`
--
ALTER TABLE `biodata_peserta`
  ADD CONSTRAINT `biodata_peserta_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `loker_positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biodata_peserta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_question_group_id_foreign` FOREIGN KEY (`question_group_id`) REFERENCES `question_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_groups`
--
ALTER TABLE `question_groups`
  ADD CONSTRAINT `question_groups_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_statement_disc`
--
ALTER TABLE `question_statement_disc`
  ADD CONSTRAINT `question_statement_disc_question_id_foreign` FOREIGN KEY (`question_disc_id`) REFERENCES `question_disc` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `result_tests`
--
ALTER TABLE `result_tests`
  ADD CONSTRAINT `result_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_links`
--
ALTER TABLE `users_links`
  ADD CONSTRAINT `users_links_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_pelanggarans`
--
ALTER TABLE `users_pelanggarans`
  ADD CONSTRAINT `users_pelanggarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_pw_hash`
--
ALTER TABLE `user_pw_hash`
  ADD CONSTRAINT `user_pw_hash_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_test_progress`
--
ALTER TABLE `user_test_progress`
  ADD CONSTRAINT `user_test_progress_question_group_id_foreign` FOREIGN KEY (`question_group_id`) REFERENCES `question_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_test_progress_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_test_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
