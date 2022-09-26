-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Created by Muhammad Faruq
-- Generation Time: Sep 26, 2022 at 01:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dompet_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `id_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id_access`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_saldo` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `remark` varchar(130) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `saldo_in`
--

CREATE TABLE `saldo_in` (
  `id_in` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo_in` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `remark` varchar(130) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldo_in`
--

INSERT INTO `saldo_in` (`id_in`, `id_user`, `saldo_in`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 5, 150000, 1, '', '2022-09-24 15:54:57', '2022-09-24 16:59:43'),
(2, 5, 3000, 1, '', '2022-09-24 16:31:45', '2022-09-24 16:59:47'),
(5, 5, 25000, 1, '', '2022-09-24 18:27:13', '2022-09-24 18:27:24'),
(6, 5, 2000, 1, '', '2022-09-24 18:27:46', '2022-09-24 18:50:13'),
(7, 5, 15000, 1, '', '2022-09-24 21:54:35', '2022-09-25 23:38:27'),
(8, 6, 50000, 1, '', '2022-09-25 03:42:27', '2022-09-25 05:48:27'),
(9, 6, 50000, 0, '', '2022-09-25 17:47:12', '2022-09-25 17:47:12'),
(10, 6, 60000, 0, '', '2022-09-25 23:48:26', '2022-09-25 23:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `saldo_out`
--

CREATE TABLE `saldo_out` (
  `id_out` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_va` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `remark` varchar(130) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldo_out`
--

INSERT INTO `saldo_out` (`id_out`, `id_user`, `id_va`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(2, 5, 7, 1, 'bayar buku', '2022-09-25 05:14:55', '2022-09-25 05:14:55'),
(3, 5, 8, 1, 'bayar minum', '2022-09-25 05:15:18', '2022-09-25 05:15:18'),
(4, 5, 10, 1, 'beli sepatu', '2022-09-25 17:17:50', '2022-09-25 17:17:50'),
(5, 6, 11, 1, 'bayar esteh', '2022-09-25 17:46:21', '2022-09-25 17:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_sub_menu` varchar(130) NOT NULL,
  `url` varchar(130) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub`, `id_menu`, `nama_sub_menu`, `url`, `is_active`) VALUES
(1, 1, 'admin', 'admin', 1),
(2, 2, 'user', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `email` varchar(130) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(130) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(130) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `name`, `email`, `password`, `image`, `phone`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 1, 'Muhammad Faruq Noor Afiyf', 'muhammadfaruq.tkj1@gmail.com', '$2y$10$izoALT8SIirvUpytBRbfl.yKKuANReDbbemiPukkxi3HwG9pBpHYe', 'default.jpg', '', '', 1, '2022-09-24 14:49:47', '2022-09-24 14:49:47'),
(5, 2, 'Muhammad Faruq', 'm.faruqna@gmail.com', '$2y$10$dubvP8MeCMqvNG0Zro7md.N/vUXBE0.QsuyBQxcNlzEDztnXGG4aC', 'default.jpg', '', '', 1, '2022-09-24 14:50:13', '2022-09-24 14:50:13'),
(6, 2, 'Test', 'test@gmail.com', '$2y$10$BGLZnJz/WFIxEGKpa1ZMTOw7ResWt5f7f6xifDxgClWyObD54gY32', 'default.jpg', '', '', 1, '2022-09-25 03:42:14', '2022-09-25 03:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_account`
--

CREATE TABLE `virtual_account` (
  `id_va` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo_out` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `token_va` varchar(130) NOT NULL,
  `remark` varchar(130) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `virtual_account`
--

INSERT INTO `virtual_account` (`id_va`, `id_user`, `saldo_out`, `status`, `token_va`, `remark`, `created_at`) VALUES
(7, 5, 15000, 1, '250920225207', 'bayar buku', '2022-09-25 05:14:39'),
(8, 5, 5000, 1, '250920221317', 'bayar minum', '2022-09-25 05:15:04'),
(9, 5, 10000, 0, '250920223084', 'makan bakso', '2022-09-25 14:49:10'),
(10, 5, 45000, 1, '250920227019', 'beli sepatu', '2022-09-25 15:54:18'),
(11, 6, 10000, 1, '250920226468', 'bayar esteh', '2022-09-25 17:21:16'),
(12, 6, 10000, 0, '260920222367', 'beli nasi', '2022-09-25 23:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `fk_access_role` (`id_role`),
  ADD KEY `fk_access_menu` (`id_menu`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `saldo_in`
--
ALTER TABLE `saldo_in`
  ADD PRIMARY KEY (`id_in`),
  ADD KEY `fk_in_user` (`id_user`);

--
-- Indexes for table `saldo_out`
--
ALTER TABLE `saldo_out`
  ADD PRIMARY KEY (`id_out`),
  ADD KEY `fk_out_user` (`id_user`),
  ADD KEY `fk_out_va` (`id_va`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `fk_sub_menu` (`id_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_role` (`id_role`);

--
-- Indexes for table `virtual_account`
--
ALTER TABLE `virtual_account`
  ADD PRIMARY KEY (`id_va`),
  ADD UNIQUE KEY `token_va` (`token_va`),
  ADD KEY `fk_va_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo_in`
--
ALTER TABLE `saldo_in`
  MODIFY `id_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `saldo_out`
--
ALTER TABLE `saldo_out`
  MODIFY `id_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `virtual_account`
--
ALTER TABLE `virtual_account`
  MODIFY `id_va` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD CONSTRAINT `fk_access_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `fk_access_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);

--
-- Constraints for table `saldo_in`
--
ALTER TABLE `saldo_in`
  ADD CONSTRAINT `fk_in_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `saldo_out`
--
ALTER TABLE `saldo_out`
  ADD CONSTRAINT `fk_out_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk_out_va` FOREIGN KEY (`id_va`) REFERENCES `virtual_account` (`id_va`);

--
-- Constraints for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `fk_sub_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);

--
-- Constraints for table `virtual_account`
--
ALTER TABLE `virtual_account`
  ADD CONSTRAINT `fk_va_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
