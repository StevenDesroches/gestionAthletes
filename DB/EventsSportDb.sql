-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 01:27 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EventsSportDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

CREATE TABLE IF NOT EXISTS `athletes` (
  `id` int(4) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `clubs_id` int(4) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `genres_id` int(11) DEFAULT NULL,
  `events_id` int(4) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `athletes`
--

INSERT INTO `athletes` (`id`, `firstName`, `lastName`, `other`, `clubs_id`, `user_id`, `genres_id`, `events_id`, `created`, `modified`) VALUES
(2, 'Obama', 'Barrack', 'This guys has the Butter and the Money From the Butter and the Creamer.', 1, 6, 0, 1, '2018-10-11 01:30:50', '2018-10-11 01:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `location`, `created`, `modified`) VALUES
(1, 'Pat''molle', 'Montreal, 987 av.Saint-Michel', '2018-10-09 00:00:00', '2018-10-09 00:00:00'),
(2, 'The testing club', 'At the testing location', '2018-10-03 00:00:00', '2018-10-05 00:00:00'),
(3, 'The Futuristic Mantis', 'Mantis City,  945 av MantisRoad', '2018-10-11 12:26:05', '2018-10-11 12:26:05'),
(4, 'FIlesTest', 'TESTING', '2018-10-11 13:10:26', '2018-10-11 13:10:26'),
(5, 'estset', 'sgfasdgfasd', '2018-10-11 13:14:29', '2018-10-11 13:14:29'),
(6, 'asdfasd', 'fasdfasdf', '2018-10-11 13:17:10', '2018-10-11 13:17:10'),
(7, 'test', 'testsetset', '2018-10-11 13:30:22', '2018-10-11 13:30:22'),
(8, 'EDITAGE', 'EDITAGE', '2018-10-11 13:38:05', '2018-10-11 14:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `clubs_id` int(4) NOT NULL,
  `eventTypes_id` int(4) NOT NULL,
  `created` datetime NOT NULL,
  `modifed` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `name`, `distance`, `other`, `clubs_id`, `eventTypes_id`, `created`, `modifed`) VALUES
(1, '2018-10-31 00:00:00', 'Red Bull Sprinting Crushing Ice', '999km', 'The most famous event of all time', 1, 1, '2018-10-10 00:00:00', '2018-10-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eventtypes`
--

CREATE TABLE IF NOT EXISTS `eventtypes` (
  `id` int(4) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtypes`
--

INSERT INTO `eventtypes` (`id`, `description`) VALUES
(1, 'Marathon'),
(2, 'Sprint');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clubs_id` int(4) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `clubs_id`, `created`, `modified`, `status`) VALUES
(4, 'firelink.jpg', 'img/', 1, '2018-10-12 00:36:34', '2018-10-12 00:37:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `description`) VALUES
(0, 'Homme'),
(1, 'Femme');

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `uuid`, `code`, `active`, `created`, `modified`) VALUES
(2, 'manager@manager.manager', '$2y$10$jZ/XPDYx7Xbphjlnlz4giuwxC6GozU1L4tp8LBhEAhss9uGY/EEvy', 1, NULL, '0', 1, '2018-10-11 00:46:11', '2018-10-11 00:46:11'),
(3, 'test@test.test', '$2y$10$N1BfpBXSGBjGc4OJiIgY5OB.xuWFnik23TgoFSRfgcaNOO9kt0LK6', 1, NULL, '0', 1, '2018-10-11 00:51:01', '2018-10-11 00:51:01'),
(6, 'admin@admin.admin', '$2y$10$Ep3HuBf/qqUkhFZSvEV6ze8ado3Zu0sFcr9WdH74rPD3BBiUpvRkW', 3, NULL, '0', 1, '2018-10-11 01:05:57', '2018-10-11 01:05:57'),
(7, 'visiteur@visiteur.com', '$2y$10$9.GsV.RgQo2Yz/wxSkYnve614gJ9Rz4IV1pg1W1pYhBiozXWeQpee', 1, NULL, '0', 1, '2018-10-11 01:06:27', '2018-10-11 01:06:27'),
(16, 'darkwizarer@gmail.com', '$2y$10$7cfJ0.B.jyOZfgWqU2BZIuM2q0SDEnmD0iUZ8nvariUigRcLRhNZ6', 2, '5bbfe1140e2f3', '5bbfe1140e2f3', 1, '2018-10-11 23:47:37', '2018-10-11 23:48:43'),
(17, 'mana@mana.com', '$2y$10$67ED5OLKQxQsLe7B6U9./.XuwqV94RLoH.y8X8J2gTsevZdPBE.au', 2, '5bbfe8bb32168', '5bbfe8bb32168', 1, '2018-10-12 00:20:22', '2018-10-12 00:21:36'),
(18, 'popo@popo.popo', '$2y$10$qSwaj8yObmmIyWdk0rj6BeSzoTJD6CGqwg5pqMHIR4Hprwu61gBFi', 2, '5bbfea8edf459', '5bbfea8edf459', 1, '2018-10-12 00:28:05', '2018-10-12 00:28:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id` (`id`),
  ADD KEY `Club_Id` (`clubs_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `genres_id` (`genres_id`),
  ADD KEY `events_id` (`events_id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clubs_id` (`clubs_id`),
  ADD KEY `eventType_id` (`eventTypes_id`),
  ADD KEY `eventType_id_2` (`eventTypes_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `eventtypes`
--
ALTER TABLE `eventtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clubs_id` (`clubs_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletes`
--
ALTER TABLE `athletes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `eventtypes`
--
ALTER TABLE `eventtypes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `athletes`
--
ALTER TABLE `athletes`
  ADD CONSTRAINT `athletes_ibfk_1` FOREIGN KEY (`clubs_id`) REFERENCES `clubs` (`id`),
  ADD CONSTRAINT `athletes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `athletes_ibfk_3` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `athletes_ibfk_4` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`eventTypes_id`) REFERENCES `eventtypes` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`clubs_id`) REFERENCES `clubs` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`clubs_id`) REFERENCES `clubs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
