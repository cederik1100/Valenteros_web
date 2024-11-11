-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 09:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `login_time`, `logout_time`, `ip_address`) VALUES
(32, 24, '2024-11-08 12:01:41', '2024-11-08 12:04:14', '180.190.214.6'),
(33, 24, '2024-11-08 12:04:20', '2024-11-08 13:09:46', '180.190.214.6'),
(34, 24, '2024-11-08 13:17:05', '2024-11-08 13:18:05', '180.190.214.6'),
(35, 24, '2024-11-08 13:19:40', '2024-11-08 13:19:59', '180.190.214.6'),
(36, 24, '2024-11-08 13:20:35', '2024-11-08 13:23:57', '180.190.214.6'),
(37, 24, '2024-11-08 13:24:08', '2024-11-08 13:25:51', '180.190.214.6'),
(38, 24, '2024-11-08 13:26:01', '2024-11-08 13:27:08', '180.190.214.6'),
(39, 24, '2024-11-08 13:28:11', '2024-11-08 13:28:53', '180.190.214.6'),
(40, 24, '2024-11-08 13:30:48', '2024-11-08 13:37:29', '180.190.214.6'),
(41, 24, '2024-11-08 13:38:31', '2024-11-08 13:56:06', '180.190.214.6'),
(42, 24, '2024-11-08 14:25:33', '2024-11-08 14:25:35', '180.190.214.6'),
(43, 24, '2024-11-08 14:57:31', '2024-11-08 14:57:33', '180.190.214.6'),
(44, 24, '2024-11-08 15:31:26', '2024-11-08 15:31:29', '180.190.214.6'),
(45, 24, '2024-11-08 15:33:34', '2024-11-08 15:33:37', '180.190.214.6'),
(46, 24, '2024-11-08 15:56:21', '2024-11-08 15:56:24', '180.190.214.6'),
(47, 24, '2024-11-08 16:23:18', '2024-11-08 16:23:25', '180.190.214.6');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(150) NOT NULL,
  `task` varchar(255) NOT NULL,
  `status` enum('pending','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `task`, `status`, `created_at`) VALUES
(27, 24, 'code', 'pending', '2024-11-08 05:47:18'),
(28, 24, 'sample', 'pending', '2024-11-08 05:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `password`) VALUES
(24, 'Cedrick', 'Valenteros', 'cederik_1100', 'valenteros.c.bscs@gmail.com', '$2y$10$XiEJ72xH6dmsfBMWgfoK9.NRzDzwnwZfgfZFwJdxGC8dkZhDtgfSC');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `token`, `ip_address`, `user_agent`, `created_at`, `expires_at`) VALUES
(1, 24, '3e96a231aeb76e32b2f2a3573363e84de52bb48d264691754d825d47dd65be7713e0883d3046fcbfd1c27dc4ce8d83c3e06e', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-07 22:44:32', '2024-11-07 23:44:31'),
(2, 24, 'e4826367cb686674ad05b5d1ca1b8363fc03194d2a2a2887510a58edf78801acae252316ee0b0df3e744b75f034c9aa847bb', '0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-07 22:50:43', '2024-11-07 23:50:32'),
(3, 24, '87617b3de3116413e516d747cf43daa85b909678a32c41c75384b5abf68610d7101529c34732c8782a9472cc3b3ca422c3b6', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-07 22:51:09', '2024-11-07 23:50:46'),
(4, 24, '67fc83fc9a4645f4b67f1135487fc72426f555983779a0bfbf7cc5e8ff0895b6d6554eb7ee2eb4e2043df118de60f037af5e', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-07 23:00:58', '2024-11-08 00:00:42'),
(5, 24, 'd2d5b3552214e17b6ac5f7df38c5ef36de77223b6314774921d3e1bd0d352d22e98c70c6ea0785cce6b29b63f85913521fc1', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-08 00:00:04', '2024-11-08 01:00:03'),
(6, 24, 'e5674d4885fdf301968fa92a84d8ae27b59833c055843ae1bd5c1cc30699c521810f2be66ec8cada5d6c7a72685314c47d47', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-08 00:00:48', '2024-11-08 01:00:47'),
(7, 24, '94d888e0182c7e8b92610656166be7e9c3c113729615be2e8c4c0bde391d45fa0fef0ff2353e72fc29ac9f105de2974963f2', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-08 00:01:28', '2024-11-08 01:01:27'),
(8, 24, '0ffe22fdbc4b289cb4974dc15dbdfc69aafba9ad58d30988eb11cbdb8e8e575cee3475bff89cb6ef295e3681ffc15481ee7b', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-08 00:07:23', '2024-11-08 01:07:15'),
(9, 24, 'c454103d08199684d044ddc17a8ca7623cf2497064999db6c28e22ba8024688166bcb9564c262525e1e64d8c69cf52b05fe5', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-08 00:08:50', '2024-11-08 01:08:34'),
(10, 24, '0be656974f69bf9418fce2cd154850a053b6d69cdd9085168be5485d80f134e9e91b1d249ad3b8edb3526268d4fe9a0ba4f5', '180.190.214.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '2024-11-08 00:15:27', '2024-11-08 01:15:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
