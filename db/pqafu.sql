-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2021 at 06:37 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pqafu`
--

-- --------------------------------------------------------

--
-- Table structure for table `md_category`
--

CREATE TABLE `md_category` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `created_by` varchar(55) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(55) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_category`
--

INSERT INTO `md_category` (`id`, `cat_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(3, 'adgfghyh', 'lokesh', '2021-01-20 17:03:40', NULL, NULL),
(5, 'cf sd cffhecbaeh', 'lokesh', '2021-01-20 17:41:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_grade`
--

CREATE TABLE `md_grade` (
  `id` int(10) NOT NULL,
  `grade_name` varchar(50) NOT NULL,
  `created_by` varchar(55) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(55) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_grade`
--

INSERT INTO `md_grade` (`id`, `grade_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'adasdtyu', 'synergic', '2021-01-21 00:00:00', 'lokesh', '2021-01-21 12:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `md_rates`
--

CREATE TABLE `md_rates` (
  `id` int(10) NOT NULL,
  `subscription_type` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` varchar(50) DEFAULT NULL,
  `modified_by` datetime DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_rates`
--

INSERT INTO `md_rates` (`id`, `subscription_type`, `amount`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Day', '5.00', NULL, NULL, NULL, NULL),
(2, 'Week', '35.00', NULL, NULL, '0000-00-00 00:00:00', '2021-01-21 14:14:24'),
(3, 'Month', '150.00', NULL, NULL, '0000-00-00 00:00:00', '2021-01-21 14:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `md_users`
--

CREATE TABLE `md_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('U','C','A') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `email_verify` enum('0','1') NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `user_status` enum('A','I') NOT NULL,
  `remarks` text,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_users`
--

INSERT INTO `md_users` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `password`, `user_type`, `dob`, `profile_picture`, `email_verify`, `token`, `user_status`, `remarks`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'lokesh', 'jha', 'abc@gmail.com', '8956235689', '$2y$10$3l3YKT2fYOsbB9GoEjstm.yLucfKpIX8RCxTrB1Ka1.SxMZsK.OSS', 'A', '2021-01-20', NULL, '1', 'adasdasdad', 'I', 'cadsadsadd', NULL, '2021-01-20 00:00:00', 'lokesh', '2021-01-27 13:31:29'),
(2, 'mathew', 'dasdsa', 'meettan@gmail.com', NULL, '', 'C', NULL, NULL, '0', NULL, 'I', 'cdcdcdcddwd', 'lokesh', '2021-01-21 16:40:25', 'lokesh', '2021-01-21 17:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `md_user_type`
--

CREATE TABLE `md_user_type` (
  `user_abr` enum('U','C','A') NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_user_type`
--

INSERT INTO `md_user_type` (`user_abr`, `user_type`) VALUES
('U', 'User'),
('C', 'Content Writer'),
('A', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `td_advertisement`
--

CREATE TABLE `td_advertisement` (
  `sl_no` int(11) NOT NULL,
  `ad_url` varchar(100) DEFAULT NULL,
  `background_color` varchar(10) DEFAULT NULL,
  `ad_logo` varchar(50) NOT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `show_page` enum('H','S','C','C-F') NOT NULL,
  `order` int(5) NOT NULL,
  `show_flag` enum('Y','N','S') NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_answer`
--

CREATE TABLE `td_answer` (
  `id` int(10) NOT NULL,
  `answer` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `qu_id` int(10) NOT NULL,
  `ans_status` enum('F','A','D') NOT NULL COMMENT 'F = Forwarded by Content Writer,A = Approved Answer,D = Discard Answer',
  `like_no` int(10) NOT NULL DEFAULT '0',
  `dislike_no` int(10) NOT NULL DEFAULT '0',
  `remarks` text,
  `created_dt` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_answer`
--

INSERT INTO `td_answer` (`id`, `answer`, `user_id`, `qu_id`, `ans_status`, `like_no`, `dislike_no`, `remarks`, `created_dt`, `created_by`, `modified_by`, `modified_dt`, `approved_by`, `approved_dt`) VALUES
(1, 'India is Great Country,India is Great Country,India is Great Country,India is Great Country,India is Great Country', 1, 1, 'A', 2, 3, 'good answer', '2021-01-27 00:00:00', 'synergic', NULL, NULL, NULL, NULL),
(2, 'Anyway, You are searching for an answer for How to become a PHP Developer.\nand what are the processes you have to follow for becoming a PHP developer?\nAnyway, You have read lot’s of things but Maybe you still didn’t understand that what should you take the first step to become a PHP developer.', 1, 2, 'A', 2, 3, 'good answer', '2021-01-27 00:00:00', 'synergic', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_favourite`
--

CREATE TABLE `td_favourite` (
  `sl_no` int(10) NOT NULL,
  `fav_by_user` int(10) NOT NULL,
  `fav_flag` enum('Y','N') NOT NULL,
  `qts_id` int(10) NOT NULL,
  `ans_id` int(10) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_files`
--

CREATE TABLE `td_files` (
  `id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `order_id` int(10) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_notifications`
--

CREATE TABLE `td_notifications` (
  `sl_no` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `from_user_type` enum('U','C','A') NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_type` enum('U','C','A') NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` text NOT NULL,
  `read_flag` enum('Y','N','R') NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_orders`
--

CREATE TABLE `td_orders` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_description` text COLLATE utf8_unicode_ci NOT NULL,
  `order_dead_line` date NOT NULL,
  `max_words` int(10) NOT NULL,
  `submitted_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submit_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `td_question`
--

CREATE TABLE `td_question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `qts_type` enum('F','P') NOT NULL,
  `user_id` int(10) NOT NULL,
  `ask_dt` date NOT NULL,
  `cat_id` int(10) NOT NULL,
  `grade_id` int(10) NOT NULL,
  `qts_status` enum('P','S','D','A') NOT NULL DEFAULT 'P',
  `remarks` text,
  `created_by` varchar(55) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(55) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_question`
--

INSERT INTO `td_question` (`id`, `question`, `qts_type`, `user_id`, `ask_dt`, `cat_id`, `grade_id`, `qts_status`, `remarks`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `approved_by`, `approved_dt`) VALUES
(1, 'dadad afs f', 'F', 1, '2021-01-21', 3, 1, 'P', 'adsasdadf', NULL, '2021-01-20 00:00:00', NULL, NULL, NULL, NULL),
(2, 'How to Become Developer', 'P', 1, '2021-01-21', 3, 1, 'P', 'adsasdadf', NULL, '2021-01-21 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_subscription`
--

CREATE TABLE `td_subscription` (
  `sl_no` int(11) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `trans_dt` date NOT NULL,
  `subs_type` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `from_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `subs_status` enum('A','E') NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `loginTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `userIp`, `loginTime`) VALUES
(1, 1, 0x3a3a31, '2021-01-25 16:31:38'),
(2, 1, 0x3a3a31, '2021-01-25 16:36:31'),
(3, 1, 0x3a3a31, '2021-01-25 16:38:23'),
(4, 1, 0x3a3a31, '2021-01-25 17:40:27'),
(5, 1, 0x3a3a31, '2021-01-27 10:38:27'),
(6, 1, 0x3a3a31, '2021-01-27 12:25:26'),
(7, 1, 0x3a3a31, '2021-01-27 14:15:21'),
(8, 1, 0x3a3a31, '2021-01-27 16:32:05'),
(9, 1, 0x3a3a31, '2021-01-27 18:36:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `md_category`
--
ALTER TABLE `md_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `md_grade`
--
ALTER TABLE `md_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_rates`
--
ALTER TABLE `md_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_users`
--
ALTER TABLE `md_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `md_user_type`
--
ALTER TABLE `md_user_type`
  ADD PRIMARY KEY (`user_abr`);

--
-- Indexes for table `td_advertisement`
--
ALTER TABLE `td_advertisement`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `td_answer`
--
ALTER TABLE `td_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_favourite`
--
ALTER TABLE `td_favourite`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `td_files`
--
ALTER TABLE `td_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_notifications`
--
ALTER TABLE `td_notifications`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `td_orders`
--
ALTER TABLE `td_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_question`
--
ALTER TABLE `td_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_subscription`
--
ALTER TABLE `td_subscription`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `md_category`
--
ALTER TABLE `md_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `md_grade`
--
ALTER TABLE `md_grade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `md_rates`
--
ALTER TABLE `md_rates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `md_users`
--
ALTER TABLE `md_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_advertisement`
--
ALTER TABLE `td_advertisement`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_favourite`
--
ALTER TABLE `td_favourite`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_notifications`
--
ALTER TABLE `td_notifications`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_orders`
--
ALTER TABLE `td_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_subscription`
--
ALTER TABLE `td_subscription`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
