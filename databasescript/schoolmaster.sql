-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 16, 2019 at 05:10 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS schoolmaster;
CREATE DATABASE schoolmaster;
USE schoolmaster ;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `eventtype` varchar(100) NOT NULL,
  `venue` varchar(1000) NOT NULL,
  `evendatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `distancefromschool` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `description`, `eventtype`, `venue`, `evendatetime`, `distancefromschool`, `duration`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(10, 'Name Changed', 'Changes', 'Mumbai', '2019-05-16 12:47:24', '767 km', '16 hours 45 mins', '1', '0', '2019-05-15 07:36:29', '2019-05-16 12:47:24'),
(14, 'sfasf', 'asfasf', 'Delhi', '2019-05-15 10:56:00', '1,155 km', '20 hours 0 mins', '1', '0', '2019-05-15 10:56:00', '2019-05-15 10:56:00'),
(15, 'dancing competition', 'dance', 'bhavnagar', '2019-04-07 04:21:19', '1,051 km', '19 hours 57 mins', '1', '0', '2019-05-16 13:16:49', '2019-05-16 13:16:49'),
(17, 'Testing One', 'Olympic', 'Kolkata', '2019-04-07 04:21:19', '1,290 km', '1 day 2 hours', '1', '0', '2019-05-16 15:10:14', '2019-05-16 15:10:14'),
(18, 'Testing two', 'ABC', 'Chennai', '2019-04-07 04:21:19', '1,065 km', '17 hours 45 mins', '1', '0', '2019-05-16 15:16:43', '2019-05-16 15:16:43'),
(19, 'Testing', 'Testing', 'test', '2019-04-07 04:21:19', 'Not Found', 'Not Found', '1', '0', '2019-05-16 17:09:10', '2019-05-16 17:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `eventtypeid` int(11) NOT NULL,
  `eventypename` varchar(200) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`eventtypeid`, `eventypename`, `is_active`, `created_at`) VALUES
(1, 'Cricket', '1', '2019-05-15 01:52:02'),
(2, 'Football', '1', '2019-05-15 01:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `invitees`
--

CREATE TABLE `invitees` (
  `inviteeid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `participantid` int(11) NOT NULL,
  `is_payment` enum('0','1') NOT NULL DEFAULT '0',
  `is_attended` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitees`
--

INSERT INTO `invitees` (`inviteeid`, `eventid`, `participantid`, `is_payment`, `is_attended`, `created_at`, `updated_at`) VALUES
(22, 14, 4, '0', '0', '2019-05-15 10:56:00', '2019-05-15 10:56:00'),
(23, 14, 5, '0', '0', '2019-05-15 10:56:00', '2019-05-15 10:56:00'),
(24, 14, 6, '0', '0', '2019-05-15 10:56:00', '2019-05-15 10:56:00'),
(38, 10, 1, '0', '0', '2019-05-16 12:47:24', '2019-05-16 12:47:24'),
(39, 10, 6, '1', '0', '2019-05-16 12:47:24', '2019-05-16 12:47:24'),
(45, 15, 1, '0', '0', '2019-05-16 13:18:15', '2019-05-16 13:18:15'),
(46, 15, 2, '1', '1', '2019-05-16 13:18:15', '2019-05-16 13:18:15'),
(47, 15, 4, '1', '1', '2019-05-16 13:18:15', '2019-05-16 13:18:15'),
(48, 15, 5, '0', '0', '2019-05-16 13:18:15', '2019-05-16 13:18:15'),
(49, 15, 6, '0', '0', '2019-05-16 13:18:15', '2019-05-16 13:18:15'),
(55, 17, 1, '1', '0', '2019-05-16 15:14:08', '2019-05-16 15:14:08'),
(56, 17, 2, '0', '0', '2019-05-16 15:14:08', '2019-05-16 15:14:08'),
(67, 18, 1, '1', '0', '2019-05-16 15:17:25', '2019-05-16 15:17:25'),
(68, 18, 2, '1', '1', '2019-05-16 15:17:25', '2019-05-16 15:17:25'),
(69, 18, 4, '0', '0', '2019-05-16 15:17:25', '2019-05-16 15:17:25'),
(70, 18, 5, '0', '0', '2019-05-16 15:17:25', '2019-05-16 15:17:25'),
(71, 18, 6, '0', '0', '2019-05-16 15:17:25', '2019-05-16 15:17:25'),
(72, 19, 1, '0', '0', '2019-05-16 17:09:10', '2019-05-16 17:09:10'),
(73, 19, 2, '0', '0', '2019-05-16 17:09:10', '2019-05-16 17:09:10'),
(74, 19, 4, '0', '0', '2019-05-16 17:09:10', '2019-05-16 17:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `participantid` int(11) NOT NULL,
  `participantname` varchar(200) NOT NULL,
  `participanttypeid` int(11) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`participantid`, `participantname`, `participanttypeid`, `is_active`, `created_at`, `update_at`) VALUES
(1, 'Jalpesh', 1, '1', '2019-05-15 05:43:01', '2019-05-15 05:43:01'),
(2, 'Jay', 1, '1', '2019-05-15 05:43:01', '2019-05-15 05:43:01'),
(3, 'Test 1', 1, '0', '2019-05-15 05:43:01', '2019-05-15 05:43:01'),
(4, 'Tej', 1, '1', '2019-05-15 05:43:01', '2019-05-15 05:43:01'),
(5, 'sam', 3, '1', '2019-05-15 05:44:03', '2019-05-15 05:44:03'),
(6, 'Aman', 3, '1', '2019-05-15 06:33:36', '2019-05-15 06:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `participanttype`
--

CREATE TABLE `participanttype` (
  `participanttypeid` int(11) NOT NULL,
  `participanttypename` varchar(200) NOT NULL,
  `is_active` enum('0','1') DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participanttype`
--

INSERT INTO `participanttype` (`participanttypeid`, `participanttypename`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Student', '1', '2019-05-15 05:37:36', '2019-05-15 05:37:36'),
(2, 'Parents', '1', '2019-05-15 05:38:41', '2019-05-15 05:38:41'),
(3, 'Organizer', '1', '2019-05-15 05:39:58', '2019-05-15 05:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Test', 'test@test.com', '$2y$10$VFkBp1y0F3xaf3zoqrBz0.ChrrZ8Lvg9kCF6HUdafF2Osk2.A1lQy', 'India', 'yldQFFZ6nmVERd8QvteOT1XNciNoibeTvdLIcKxiEalTNIRku6LZQ4lDxQOW', '2019-05-15 09:09:28', '2019-05-15 09:09:28'),
(4, 'sentral', 'sentral@sentral.com', '$2y$10$kM.FVqQWIyM/i4sPHP8fBe7uPvBCyGEHNGgs8SZmnViAlhSFEOgju', 'Chatswood, Sydney 2067', NULL, '2019-05-16 17:10:18', '2019-05-16 17:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`eventtypeid`);

--
-- Indexes for table `invitees`
--
ALTER TABLE `invitees`
  ADD PRIMARY KEY (`inviteeid`),
  ADD KEY `participantid` (`participantid`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participantid`),
  ADD KEY `participanttypeid` (`participanttypeid`);

--
-- Indexes for table `participanttype`
--
ALTER TABLE `participanttype`
  ADD PRIMARY KEY (`participanttypeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `eventtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invitees`
--
ALTER TABLE `invitees`
  MODIFY `inviteeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participanttype`
--
ALTER TABLE `participanttype`
  MODIFY `participanttypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invitees`
--
ALTER TABLE `invitees`
  ADD CONSTRAINT `invitees_ibfk_1` FOREIGN KEY (`participantid`) REFERENCES `participants` (`participantid`) ON DELETE CASCADE,
  ADD CONSTRAINT `invitees_ibfk_2` FOREIGN KEY (`eventid`) REFERENCES `events` (`eventid`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`participanttypeid`) REFERENCES `participanttype` (`participanttypeid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
