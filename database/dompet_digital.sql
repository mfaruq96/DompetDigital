-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Created by Muhammad Faruq
-- Generation Time: Oct 01, 2022 at 12:54 PM
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
(2, 2, 2),
(3, 1, 3),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_saldo` int(1) NOT NULL,
  `saldo` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `remark` varchar(130) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_user`, `id_saldo`, `saldo`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(14, 5, 1, 150000, 1, 'top up', '2022-10-01 10:44:06', '2022-10-01 10:44:06'),
(15, 5, 2, 15000, 1, 'bayar makan', '2022-10-01 10:44:56', '2022-10-01 10:44:56');

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
(2, 'user'),
(3, 'profile');

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
(28, 5, 150000, 1, '', '2022-10-01 10:43:49', '2022-10-01 10:44:06'),
(29, 5, 20000, 0, '', '2022-10-01 10:43:59', '2022-10-01 10:43:59');

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
(11, 5, 19, 1, 'bayar makan', '2022-10-01 10:44:56', '2022-10-01 10:44:56');

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
(2, 2, 'user', 'user', 1),
(4, 3, 'profile', 'profile', 1);

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
  `pin` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id_user`, `id_role`, `name`, `email`, `password`, `pin`, `image`, `phone`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 1, 'Muhammad Faruq Noor Afiyf', 'muhammadfaruq.tkj1@gmail.com', '$2y$10$izoALT8SIirvUpytBRbfl.yKKuANReDbbemiPukkxi3HwG9pBpHYe', '', 'default.svg', '08971793630', 'Bekasi', 1, '2022-09-24 14:49:47', '2022-10-01 09:17:38'),
(5, 2, 'Muhammad Faruq', 'm.faruqna@gmail.com', '$2y$10$WIjvy5IKH6MN/rqseQikWOdeGn9thec6PhmHfXi1yGiIAWWlDisGG', '', 'default1.svg', '08971793630', 'Bekasi', 1, '2022-09-24 14:50:13', '2022-10-01 10:48:41');

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
(19, 5, 15000, 1, '011020221650', 'bayar makan', '2022-10-01 10:44:28'),
(20, 5, 8000, 0, '011020226559', 'bayar minum', '2022-10-01 10:44:43');

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
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_history_users` (`id_user`);

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
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo_in`
--
ALTER TABLE `saldo_in`
  MODIFY `id_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `saldo_out`
--
ALTER TABLE `saldo_out`
  MODIFY `id_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `virtual_account`
--
ALTER TABLE `virtual_account`
  MODIFY `id_va` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

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
