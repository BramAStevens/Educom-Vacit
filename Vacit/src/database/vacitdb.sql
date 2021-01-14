-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 10:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `application_date` datetime NOT NULL,
  `application_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_invitation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `user_id`, `job_id`, `application_date`, `application_company`, `application_invitation`) VALUES
(23, 1, 3, '2021-01-11 14:53:14', NULL, 0),
(24, 1, 3, '2021-01-11 15:06:50', 'Admin', 0),
(25, 1, 3, '2021-01-11 15:08:03', 'Admin', 0),
(26, 1, 3, '2021-01-11 15:08:19', 'Admin', 0),
(27, 1, 3, '2021-01-11 15:08:36', 'Admin', 1),
(28, 1, 3, '2021-01-11 15:10:07', 'Admin', 0),
(29, 1, 3, '2021-01-11 15:18:04', 'Admin', 0),
(30, 1, 3, '2021-01-11 15:24:54', 'god', 1),
(31, 172, 3, '2021-01-11 16:54:22', 'god', 1),
(32, 172, 3, '2021-01-11 17:01:00', 'god', 1),
(35, 134, 32, '2021-01-11 17:02:58', 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210106100010', '2021-01-06 11:02:15', 37),
('DoctrineMigrations\\Version20210106100200', '2021-01-06 11:02:52', 37),
('DoctrineMigrations\\Version20210106101041', '2021-01-06 11:10:51', 133),
('DoctrineMigrations\\Version20210106102034', '2021-01-06 11:20:47', 258),
('DoctrineMigrations\\Version20210107224505', '2021-01-07 23:45:30', 217),
('DoctrineMigrations\\Version20210114123914', '2021-01-14 13:39:26', 273);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_date` datetime DEFAULT NULL,
  `job_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `user_id`, `job_title`, `job_description`, `job_picture`, `job_date`, `job_level`, `job_location`) VALUES
(3, 134, 'dfasdfa', '4', '4', '2021-01-04 00:00:00', '4', '4'),
(4, 134, '', '', '', '2021-01-08 00:00:00', '', ''),
(5, 134, '', '', '', '2021-01-08 00:00:00', '', ''),
(6, 134, '', '', '', '2021-01-08 00:00:00', '', ''),
(7, 134, '', '', '', '2021-01-08 00:00:00', '', ''),
(8, 134, '', '', '', '2021-01-08 00:00:00', '', ''),
(10, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(11, 134, '1', '3', '1', '2021-01-10 00:00:00', '1', '1'),
(12, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(13, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(14, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(15, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(16, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(17, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(18, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(19, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(20, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(21, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(22, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(23, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(24, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(25, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(26, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(27, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(28, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(29, 134, '', '', '', '2021-01-10 00:00:00', '', ''),
(30, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(31, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(32, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(33, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(34, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(35, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(36, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(37, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(38, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(39, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(40, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(41, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(42, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(43, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(44, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(45, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(46, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(47, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(48, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(50, 150, '', '', '', '2021-01-10 00:00:00', '', ''),
(51, 150, '1', '2', '2', '2021-01-10 00:00:00', '2', '2'),
(53, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(54, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(55, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(56, 1, '', '', '', '2021-01-10 00:00:00', '', ''),
(57, 1, '', '', '', '2021-01-11 00:00:00', '', ''),
(58, 1, '', '', '', '2021-01-11 00:00:00', '', ''),
(59, 1, '', '', '', '2021-01-11 00:00:00', '', ''),
(60, 1, '', '', '', '2021-01-11 00:00:00', '', ''),
(61, 1, '', '', '', '2021-01-11 00:00:00', '', ''),
(62, 1, '', '', '', '2021-01-11 00:00:00', '', ''),
(63, 172, '', '', '', '2021-01-11 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_postcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_motivation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `user_picture`, `user_surname`, `user_lastname`, `user_email`, `user_dob`, `user_phone_number`, `user_address`, `user_postcode`, `user_city`, `user_motivation`, `user_cv`, `is_verified`) VALUES
(1, 'Admin', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$N0U0Nm5XMlpLTk9GdS5zZg$kIdqBTx/85R5gFYenbG7FUgRnHqGK5kaw13ysiuiG64', '', 'Facebook', '', '', '', '', '', '', '', '', '', 0),
(134, 'god', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dmxpUFpMaEVBRFJkYnFiQg$rlsJ1rZZ5RLtSlc0y25XtGMKJeIzTRecf2f6C7Nq8qo', 'upload/600003b10451a-1516950075299.jpg', 'Bill', 'Gates', 'Bill@Gates.com', '2021-01-12', '58990363', 'Washington street 10c', '5882Ad', 'Washington DC', '<p>hello! :)</p>', 'upload/60000a0e53a0e-bedrijfsreglement-educom-traineeship-2020.pdf', 0),
(138, 'testuser', '[\"ROLE_CANDIDATE\"]', '$argon2id$v=19$m=65536,t=4,p=1$S1VCVC5tUWdMNWtzUnhkQg$2Ra9y/JqSTs3GMWBHiV5vG8j35fF1JNaaZubuffXfWQ', '', '', '', '', '', '', '', '', '', '', '', 0),
(153, 'testuser3', '[\"ROLE_CANDIDATE\"]', '$argon2id$v=19$m=65536,t=4,p=1$dmhBV01WcVRtby8zZmw5cw$k0aAVHTGX/7O/DSLpyTpIC9r1r3LmEAIzQKhwXthi7c', '', '', '', '', '', '', '', '', '', '', '', 0),
(154, 'testuser4', '[\"ROLE_CANDIDATE\"]', '$argon2id$v=19$m=65536,t=4,p=1$U2ZhMW5PUjZlQlViLkkvTg$Y3NWpYU152D1XU6S1yeiFuKJR8ZLK3sSFmlrk44Aew8', '3', '3', '3', '3', '3', '', '', '', '', '', '', 0),
(155, 'testnull', '[\"ROLE_CANDIDATE\"]', '$argon2id$v=19$m=65536,t=4,p=1$SzZJNU9xVFBsM2lWMG0vOA$CMjpCxg+waTEM8rKLdKN6UDUmuos1eNfxg6+0kNHEFg', '', '3', '3', '3', '3', '3', '3', '3', '3', '', '3', 0),
(158, 'registertest', '[\"ROLE_CANDIDATE\"]', '$argon2id$v=19$m=65536,t=4,p=1$OFpjOGMwLzBpNGpUQTVuaA$HaK3AwL3gVP6hVLGJfUynYmhzam7AR5geFMG1wm1zLE', '', '', '', '', '', '', '', '', '', '', '', 0),
(172, 'testname2', '[\"ROLE_EMPLOYER\"]', '$argon2id$v=19$m=65536,t=4,p=1$ai5KS0U1akRYc2o1MU9pdg$hpL72mLSH8VLMKIQVlBZNydaHLgKFGfJ0tELFQm7v3U', '', '', '', '', '', '', '', '', '', '', '', 0),
(173, 'testname4', '[\"ROLE_EMPLOYER\"]', '$argon2id$v=19$m=65536,t=4,p=1$enZiYVRvcE02TlNCMkZXdg$vv6pJHOWXSXw75NWgTPPa9m0eUjK5SAv+QDr4jeEAl0', '', '', '', '', '', '', '', '', '', '', '', 0),
(174, 'import', '[\"ROLE_EMPLOYER\"]', '$argon2id$v=19$m=65536,t=4,p=1$L0xWUm03bXdFN3VnbURqOQ$A5lgYz7YIp0fqeTkgw3CYoRwgq3WG8j+z/Q4q+ZrRXY', '', '', '', '', '', '', '', '', '', '', '', 0),
(175, 'fdafdsfdsffdsaf', '[\"ROLE_CANDIDATE\"]', '$argon2id$v=19$m=65536,t=4,p=1$bWZ3U001VVJOS0pzTm9MQQ$PSFYRr15MQJEMaw8tRRM/DP8PTcBhil0Vi4R/9AC4HU', '', '', '', '', '', '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A45BDDC1A76ED395` (`user_id`),
  ADD KEY `IDX_A45BDDC1BE04EA9` (`job_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FBD8E0F8A76ED395` (`user_id`);

--
-- Indexes for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FK_A45BDDC1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_A45BDDC1BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `FK_FBD8E0F8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
