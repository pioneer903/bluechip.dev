-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2014 at 01:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bluechip`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Yuriy', 'yuriy@mos.com', '2014-06-05 20:08:32', '2014-06-05 20:08:32'),
(2, 'Jeffrey Way', 'Jeffrey@mos.com', '2014-06-05 20:08:32', '2014-06-05 20:08:32'),
(3, 'yuriy', 'email@domain.com', '2014-06-05 20:30:17', '2014-06-05 20:30:17'),
(4, 'yuriy', 'email@domain.com', '2014-06-05 20:30:57', '2014-06-05 20:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `create_movies_tables`
--

CREATE TABLE IF NOT EXISTS `create_movies_tables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_30_135008_create_posts_table', 1),
('2014_06_02_141353_create_users_table', 1),
('2014_06_02_141622_add_username_to_users_table', 2),
('2014_06_02_150700_add_username_to_users_table', 3),
('2014_06_02_152507_add_height_to_users_table', 4),
('2014_06_03_022513_create_players_table', 6),
('2014_06_03_025446_create_roles_table', 7),
('2014_06_03_030337_add_role_id_users_table', 8),
('2014_06_03_123955_create_seasons_table', 10),
('2014_06_03_133220_create_seasons_table', 11),
('2014_06_03_133313_create_players_table', 11),
('2014_06_03_151602_add_password_to_players', 12),
('2014_06_03_181527_add_password_to_players_table', 13),
('2014_06_04_204315_create_create_movies_tables_table', 14),
('2014_06_04_204454_create_movies_table', 15),
('2014_06_05_024914_add_remember_token_to_users', 15),
('2014_06_05_143008_create_phones_table', 16),
('2014_06_05_155618_create_posts_table', 17),
('2014_06_05_155654_create_authors_table', 17),
('2014_06_06_144550_add_paid_to_players_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` bigint(11) NOT NULL,
  `player` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `number`, `player`, `created_at`, `updated_at`) VALUES
(1, 4443331212, 'Yuriy', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `season_id` int(10) unsigned DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `parent1_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent1_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent2_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent2_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_coach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_coach_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_team` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_coach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club_coach_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gpa` decimal(5,2) NOT NULL,
  `psat` int(11) NOT NULL,
  `sat_act` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faceoff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lsm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lacrosse_honors` text COLLATE utf8_unicode_ci NOT NULL,
  `other_sports` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insurance_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insurance_policy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insurance_date` date NOT NULL,
  `player_signature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_signature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_phone1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_phone2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medical_conditions` text COLLATE utf8_unicode_ci NOT NULL,
  `over_18` tinyint(1) NOT NULL,
  `acknowledged` tinyint(1) NOT NULL,
  `parent_signature_nike_release` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `players_season_id_foreign` (`season_id`),
  KEY `players_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `username`, `email`, `first_name`, `last_name`, `birth_date`, `height`, `weight`, `street`, `city`, `state`, `zip`, `phone`, `season_id`, `role_id`, `parent1_name`, `parent1_email`, `parent2_name`, `parent2_email`, `school_coach`, `school_coach_phone`, `club_team`, `club_coach`, `club_coach_phone`, `gpa`, `psat`, `sat_act`, `position`, `hand`, `faceoff`, `lsm`, `lacrosse_honors`, `other_sports`, `insurance_company`, `insurance_policy`, `insurance_date`, `player_signature`, `parent_signature`, `emergency_phone1`, `emergency_phone2`, `medical_conditions`, `over_18`, `acknowledged`, `parent_signature_nike_release`, `created_at`, `updated_at`, `password`, `activated`, `paid`) VALUES
(2, 'pioneer903', 'yuriy@moscreative.com', 'Yuriy', 'Buha', '1985-05-01', '45.60', '145.00', '8945 Guilford Rd', 'Columbia', 'MD', '21045', '444 333 7777', 1, 1, 'Kolya', 'k@gmail.com', 'Sveta', 's@gmail.com', 'Max', '444 555 4444', 'Winners', 'Josh', '444 888 4445', '4.00', 5, 5, 'Attack', 'right', 'yes', 'no', 'Some honors', 'Volleyball', 'Progressive', '6541631', '2014-06-18', 'Yuriy', 'Buha', '4445556666', '5558888999', 'Perfect medical condition', 1, 1, 'Buha', '2014-06-03 04:00:00', '0000-00-00 00:00:00', '', 0, 0),
(7, 'colleen', 'colleen@moscreative.com', 'Colleen', 'Stanely', '1980-01-01', '5.40', '0.00', '', '', '', '', '', 2, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$Nahg2oHmk.CsuhwnBeNyw.pWHBqY21y6Uy4dQ/RSjE8pPSNYpG5pu', 0, 0),
(8, 'joel', 'joel@moscreative.com', 'Joel', 'Traugott', '1985-05-05', '6.00', '0.00', '', '', '', '', '', 2, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$a35rMRT4aZGu/ySY5iOb7uAK39Hu863KoIGdb2abxctOtJ2qSjHxC', 0, 0),
(12, 'georgeW', 'george@mosc.com', 'George', 'Washington', '1980-01-01', '6.10', '0.00', '', '', '', '', '', 1, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$RR5JDbyNcXJYyE9KKJ5tle80Y8vgepqT.NK5lldCG9Qcx9PqTTx7S', 0, 0),
(13, 'colleen', 'yuriy@moscreative.com', 'Colleen', 'Stanely', '1980-01-01', '5.30', '0.00', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$Ce9fY9UdssEzzjclUUC8VuBY1OmniF3NIuAqqvBtPRDg3QaRXY5h.', 0, 0),
(14, 'greg', 'greg@mos.com', 'Greg', 'Buha', '1980-01-01', '5.30', '0.00', '', '', '', '', '', 2, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$PUy0tlw1g/RWILhvFVgPZ.u2ogoVjGGt8FEqD.sqOYf6HVZTbONie', 0, 0),
(15, 'emily', 'emily@moscreative.com', 'Emily', 'Law', '1985-05-05', '5.40', '0.00', '', '', '', '', '', 3, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$t3sWU6oRf5CFkezFbk5S3.ap2iB38OLXyRc4EWmcCWdLK/GYc8x6G', 0, 0),
(16, 'yuriy', 'yuriy@moscreative.com', 'Yuriy', 'Buha', '1980-01-01', '5.40', '0.00', '', '', '', '', '', 4, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$YLVGVseVJ/Q0rlqlT5hmq.S2YfxDipqzk.qjjc/jHDMQ2VLBRQnZ.', 0, 0),
(17, 'dorothy', 'dorothy@mos.com', 'Dorothy', 'Philips', '1980-01-01', '5.30', '0.00', '', '', '', '', '', 6, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$BkzAVuEmyYq/tRUvNJVtGuRNkymdkUZkVRAVOY7g7yFK8WjnVHkp.', 0, 0),
(18, 'joel', 'joel@moscreative.com', 'Joel', 'Traugott', '1985-05-05', '5.60', '0.00', '', '', '', '', '', 1, NULL, '', '', '', '', '', '', '', '', '', '0.00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$etGkic.gyBd4sjhtQ7fVL.v9nhUE3E3wybI1QqmOxp2gHj2iq5G2q', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 'My first post', 1, 'this is the body of the post', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Another post', 2, 'this is the body of the post', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'second title', 1, 'Yada yada yada', '2014-06-05 20:30:57', '2014-06-05 20:30:57'),
(4, 'Third post title', 3, 'Bla bla yada yada', '2014-06-05 20:32:17', '2014-06-05 20:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'manager', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'player', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grad_year` int(11) NOT NULL,
  `season` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `grad_year`, `season`, `created_at`, `updated_at`) VALUES
(1, 2018, 'Summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2018, 'Fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2019, 'Summer', '2014-06-06 00:32:14', '2014-06-06 00:32:14'),
(4, 2019, 'Fall', '2014-06-06 00:32:36', '2014-06-06 00:32:36'),
(5, 2020, 'Summer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2020, 'Fall', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `birth_date`, `created_at`, `updated_at`, `street`, `username`, `height`, `role_id`, `remember_token`) VALUES
(14, 'admin@localhost', '$2y$10$PdubqxeMoP9yOQ5p78xE6Oi.b2BYSyjXRmfZz6vQ5yxdT7SsVmVH2', 'Administrator', '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'admin', '0.00', NULL, 'cEecCF4buv60KeBiNPoV1oQeeH1Rc2yQ9berF76IsVQ4mqPwoQKbQUqjqB5O');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `players_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
