-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2021 at 12:45 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pqafucom_pqafu`
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
(3, 'Media', 'lokesh', '2021-01-20 17:03:40', 'lokesh', '2021-01-28 13:47:46'),
(5, 'Political', 'lokesh', '2021-01-20 17:41:18', 'lokesh', '2021-04-07 13:09:03'),
(8, 'Science', 'lokesh', '2021-01-28 13:46:29', NULL, NULL),
(9, 'Finance', 'lokesh', '2021-03-31 10:10:48', 'lokesh', '2021-04-07 13:09:12'),
(10, 'Essay', 'lokesh', '2021-04-07 11:08:40', NULL, NULL),
(11, 'Economics', 'lokesh', '2021-04-07 11:08:48', NULL, NULL),
(12, 'Engineering', 'lokesh', '2021-04-07 11:08:57', NULL, NULL),
(13, 'Political Science', 'lokesh', '2021-04-07 11:09:13', NULL, NULL),
(14, 'Others', 'lokesh', '2021-04-07 11:09:19', NULL, NULL),
(15, 'History', 'lokesh', '2021-04-07 11:09:34', NULL, NULL),
(16, 'Geography ', 'lokesh', '2021-04-07 11:09:54', NULL, NULL),
(17, 'Case Study', 'lokesh', '2021-04-07 13:11:17', NULL, NULL);

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
(1, 'Basic', 'synergic', '2021-01-21 00:00:00', 'lokesh', '2021-04-07 13:09:43'),
(2, 'Hard', 'lokesh', '2021-02-05 12:26:56', 'lokesh', '2021-04-07 13:10:20'),
(3, 'Primary ', 'lokesh', '2021-04-07 11:06:34', NULL, NULL),
(4, 'Engineering', 'lokesh', '2021-04-07 11:06:43', NULL, NULL),
(5, 'Bachelor ', 'lokesh', '2021-04-07 11:06:54', NULL, NULL),
(6, 'Masters', 'lokesh', '2021-04-07 11:07:05', NULL, NULL),
(7, 'PHd', 'lokesh', '2021-04-07 11:07:18', NULL, NULL),
(8, 'Collage ', 'lokesh', '2021-04-07 11:07:38', NULL, NULL),
(9, 'Others', 'lokesh', '2021-04-07 11:08:28', NULL, NULL),
(10, 'Plus 2', 'lokesh', '2021-04-07 13:11:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_order_rate`
--

CREATE TABLE `md_order_rate` (
  `id` int(11) NOT NULL,
  `amt` decimal(8,2) NOT NULL,
  `modified_by` varchar(55) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_order_rate`
--

INSERT INTO `md_order_rate` (`id`, `amt`, `modified_by`, `modified_dt`) VALUES
(1, 8.84, 'lokesh', '2021-04-05 05:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `md_rates`
--

CREATE TABLE `md_rates` (
  `id` int(10) NOT NULL,
  `subscription_type` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL DEFAULT '0',
  `discount` int(10) NOT NULL DEFAULT '0',
  `dis_amt` int(10) NOT NULL DEFAULT '0',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` varchar(50) DEFAULT NULL,
  `modified_by` datetime DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_rates`
--

INSERT INTO `md_rates` (`id`, `subscription_type`, `amount`, `discount`, `dis_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Daily', 30, 10, 27, NULL, NULL, '0000-00-00 00:00:00', '2021-04-05 05:35:54'),
(2, 'Weekly', 50, 0, 50, NULL, NULL, NULL, NULL),
(3, 'Monthly', 300, 22, 244, NULL, NULL, NULL, NULL);

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
  `email_verify` enum('0','1') NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `user_status` enum('A','I') NOT NULL COMMENT 'A= Active,I= Inactive',
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
(1, 'lokesh', 'jha', 'abc@gmail.com', '8956235689', '$2y$10$djgrofrZg06ebOSoxHztZe4F3gCw.vWwOtuN24abBeIDhJdFb.vJi', 'A', '2021-01-20', NULL, '1', NULL, 'A', ' demo', NULL, '2021-01-20 00:00:00', 'lokesh', '2021-01-28 14:28:57'),
(2, 'mathew', 'dasdsa', 'xyz@gmail.com', '89568956895', '$2y$10$3l3YKT2fYOsbB9GoEjstm.yLucfKpIX8RCxTrB1Ka1.SxMZsK.OSS', 'C', NULL, 'c1.jpg', '1', NULL, 'A', 'cdcdcd', 'lokesh', '2021-01-21 16:40:25', 'lokesh', '2021-04-05 05:43:24'),
(4, 'lokeshtest', 'jha', 'user@gmail.com', '8956235689', '$2y$10$3l3YKT2fYOsbB9GoEjstm.yLucfKpIX8RCxTrB1Ka1.SxMZsK.OSS', 'U', '2021-01-20', '1614767478tiger.jpg', '1', 'adasdasdad', 'A', ' demo', NULL, '2021-01-20 00:00:00', '2021-03-03', '0000-00-00 00:00:00'),
(8, 'hrdemo', '', 'samantasubham9804@gmail.com', NULL, '$2y$10$xYtj3S11vU8X28xrUdUGhubmcBVmEgacj7sOXnSEQvck0SN4k53hC', 'U', NULL, 'c1.jpg', '1', 'c32ae43d0842d494a3aa65adf399c1a06620fecbXVd5OkJnf0S3qvUw', 'A', NULL, NULL, NULL, NULL, NULL),
(9, 'Tanmoy', '', 'meettan@gmail.com', NULL, '$2y$10$YBAPwD8ywFOQN1sLEBub7OMIbM2RSNQ5DpzlF6wcbqlPWIM4Y/rCm', 'U', NULL, 'c1.jpg', '0', '7f3fad46d21ef6f449b3f8780b979aa8010e80b5vQHFI3fO97W8J5A6', 'A', NULL, NULL, NULL, NULL, NULL),
(10, 'hrdemo', '', 'gfdg@gmail.com', NULL, '$2y$10$SzRSZJUlvxjtjNc9W6XqD.JOtkVnu/n9WaxyKt6cyeD2l1kL.ckUS', 'U', NULL, 'c1.jpg', '0', '1d50dde98ceeec007dadbb5f220855aa421de5bfkYSQcWzeFIrHMtAs', 'A', NULL, NULL, NULL, NULL, NULL),
(11, 'Lokesh', 'jha', 'lokesh@synergicsofte.com', NULL, '$2y$10$3l3YKT2fYOsbB9GoEjstm.yLucfKpIX8RCxTrB1Ka1.SxMZsK.OSS', 'U', NULL, '1615359188motor.jpg', '0', '9f66a5f5291d2c75b7e5768eac8b689246adb166Xj83YdJ96VPUqkZT', 'A', NULL, NULL, NULL, '2021-03-10', '0000-00-00 00:00:00'),
(13, 'utsab', 'roy', 'utsab@synergicsoftek.com', NULL, '$2y$10$6cDDTjt5.hbBQk7l54v0uuqB9IOYaOeu9uIYcaGteznVkn0ea/SCO', 'U', NULL, '1616490539ls.jpg', '1', '', 'A', NULL, NULL, NULL, '2021-03-23', '0000-00-00 00:00:00'),
(14, 'dmo', 'demo', 'lokesh@synergik.com', NULL, '$2y$10$oc0g6w9B/2YXHf3Q69qRQuP5M9o8uRQLymJJM34wSELMlAO8ia7dm', 'U', NULL, NULL, '1', NULL, 'A', NULL, NULL, NULL, NULL, NULL),
(15, 'ojha', 'ojha', 'sojha111@gmail.com', NULL, '$2y$10$K9RkIQG52gT80o.RJGHMdesQ46PhOW7qYFm.8n9fEiXkw2F3j5Idu', 'U', NULL, NULL, '1', NULL, 'A', NULL, NULL, NULL, NULL, '2021-03-31 12:48:42'),
(17, 'ckimage', 'demo', 'lokesh@synergics.com', NULL, '$2y$10$ayyEspCC0MzyYD9bc4ilCeiH1sIhOTHIcMqdo0jXOoNw3y31P01o2', 'U', NULL, NULL, '1', NULL, 'A', NULL, NULL, NULL, NULL, NULL),
(21, 'Lokesh', 'jh', 'lokesh@synergicsoftek.com', NULL, '$2y$10$p9zIQeata6No5tnMDNDVQOULO.ewfyvpEjw90YawS/5OMdShN.qfe', 'U', NULL, NULL, '1', NULL, 'A', NULL, NULL, NULL, NULL, '2021-06-29 07:57:38'),
(22, 'Anonymous', 'K', 'sanjeev.cwsl@gmail.com', NULL, '$2y$10$k37I7HU67vTsaARbajmAo.2gs/T3kMu08Nj9Dk2Pg0x/aU9eoOFg.', 'U', NULL, NULL, '1', NULL, 'A', NULL, NULL, NULL, NULL, NULL);

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
  `remarks` text,
  `created_dt` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_answer_like_dislike`
--

CREATE TABLE `td_answer_like_dislike` (
  `id` int(10) NOT NULL,
  `ans_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `action` enum('L','D') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `td_favourite`
--

INSERT INTO `td_favourite` (`sl_no`, `fav_by_user`, `fav_flag`, `qts_id`, `ans_id`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 4, 'Y', 2, 0, 'lokeshtest', '2021-03-26 09:56:09', NULL, NULL),
(2, 13, 'Y', 5, 0, 'utsab', '2021-03-26 10:00:20', NULL, NULL),
(3, 4, 'Y', 9, 0, 'lokeshtest', '2021-03-30 07:52:01', NULL, NULL),
(4, 4, 'Y', 4, 0, 'lokeshtest', '2021-03-30 07:52:07', NULL, NULL);

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
  `order_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_image1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` bigint(15) DEFAULT NULL,
  `timezone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `assigntype` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `order_description` text COLLATE utf8_unicode_ci NOT NULL,
  `order_dead_line` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `max_words` int(10) NOT NULL,
  `submitted_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submit_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `td_orders`
--

INSERT INTO `td_orders` (`id`, `order_date`, `user_id`, `order_image`, `order_image1`, `phone`, `timezone`, `topic`, `grade`, `assigntype`, `order_description`, `order_dead_line`, `max_words`, `submitted_by`, `submit_dt`) VALUES
(4, '2021-03-18', 4, '1616062020c1.jpg', '11616062020profile.jpg', 4535354543, 'GMT -10:00 Hawaii Standard Time(honolulu)', 'total loss', 'Bachelor', 'Business Proposal', 'asadasdadaf', '3 Days', 2, 'lokeshtest', '2021-03-18'),
(5, '2021-04-05', 4, '', '', 8956895689, 'GMT -6:00 South/Latin America Central Time', 'dsadasd', 'Bachelor', 'Dissertation Proposal', 'sdfsdfsdfsdf', '5 Days', 2, 'lokeshtest', '2021-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `td_payments`
--

CREATE TABLE `td_payments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `plan_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_mode` enum('P','S') COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `td_payments`
--

INSERT INTO `td_payments` (`id`, `product_id`, `user_id`, `txn_id`, `plan_id`, `pay_mode`, `payment_gross`, `currency_code`, `payer_name`, `payer_email`, `status`) VALUES
(4, 3, 4, 'txn_1IVCrbLUSYuzsidDw8IruZ50', NULL, 'S', 244.00, 'usd', 'lokeshtest jha', 'user@gmail.com', 'succeeded'),
(5, 2, 4, 'txn_1IVCsvLUSYuzsidDZ3poJgWA', NULL, 'S', 50.00, 'usd', 'lokeshtest jha', 'user@gmail.com', 'succeeded'),
(6, 1, 4, 'txn_1IVCtvLUSYuzsidD7zpBGhUS', NULL, 'S', 27.00, 'usd', 'lokeshtest jha', 'user@gmail.com', 'succeeded'),
(7, 1, 4, 'PAYID-MBHVF5Q7MH88120C3197103J', NULL, 'P', 27.00, 'USD', 'lokeshtest jha', 'user@gmail.com', 'approved'),
(8, 2, 4, 'PAYID-MBIIF3Y5DL5681358351251S', NULL, 'P', 50.00, 'USD', 'lokeshtest jha', 'user@gmail.com', 'approved'),
(9, 3, 4, 'sub_J8Bv8ObamMORBM', 'plan_J8BvF5wDeuc8FG', 'S', 244.00, 'usd', 'lokeshtest jha', 'user@gmail.com', 'active'),
(10, 2, 4, 'I-M1FJHEBXMFCM', 'P-4BM940910X528233SJG3DARA', 'P', 50.00, 'USD', 'lokeshtest jha', 'user@gmail.com', 'true'),
(11, 3, 4, 'I-3FDX9V0ECWHY', 'P-73E10536V07984620JG36IXA', 'P', 244.00, 'USD', 'lokeshtest jha', 'user@gmail.com', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `td_question`
--

CREATE TABLE `td_question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `question` text NOT NULL,
  `qts_type` enum('F','P') NOT NULL,
  `user_id` int(10) NOT NULL,
  `ask_dt` date NOT NULL,
  `cat_id` int(10) NOT NULL DEFAULT '3',
  `grade_id` int(10) NOT NULL DEFAULT '1',
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

INSERT INTO `td_question` (`id`, `title`, `slug`, `question`, `qts_type`, `user_id`, `ask_dt`, `cat_id`, `grade_id`, `qts_status`, `remarks`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `approved_by`, `approved_dt`) VALUES
(1, 'Hi6026 ', 'hi6026-', '<p><strong>Question 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (7 marks)</strong></p>\r\n\r\n<p>Company XYZ manufactures titanium hip bone replacements. The devices were implanted into patients, mostly elderly patients, who have broken their hips during falls. Within 2 months from implantation, the patients complained of severe pain in their hip joints. This was later proven to be caused by the defective manufacturing of the devices. How would the law of tort apply in this case? (Maximum 200 words)</p>\r\n', 'F', 22, '2021-06-15', 14, 6, 'A', NULL, 'Anonymous', '2021-06-15 00:00:00', NULL, NULL, 'lokesh', '2021-06-16 08:35:17'),
(2, 'Hi6027 Question 2', 'hi6027-question-2', '<p>A sales representative in a shopping centre handed Karl a flyer promoting a style cut and shave for $12 at Lion&rsquo;s Mane Barber Shop. As he was actually in need of a haircut and shave, Karl dropped by the barber shop, which was also located in the same shopping centre. When he arrived at the shop and presented his flyer to one of the barbers, he was told that there had been an error in the statement of price on the flyer - it was supposed to be $22 and not $12. The shop manager tried to convince Karl that this was still a bargain price given that a style cut and shave would normally cost $30 in other barbershops.<br />\r\n&nbsp;</p>\r\n\r\n<p>Karl got upset, as he passed by two other barbershops in the same shopping centre that sold haircuts and shaves for $20 to $25. If he had known about the supposed mistake in the Lion&rsquo;s Mane flyer, he wouldn&rsquo;t have bothered coming to the shop.<br />\r\n&nbsp;</p>\r\n\r\n<p>Answer the following:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Does Karl have any legal grounds to claim the price of $12? (5 marks)</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Would your answer be different if Karl already had his hair cut and shave before being informed by the real cost of the services was $22? Does he have to pay the full price in this case? (7 marks)</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Answer this question using principles from both contract law and the Australian Consumer Law. (Maximum 300 words)</p>\r\n', 'F', 22, '2021-06-15', 14, 6, 'P', NULL, 'Anonymous', '2021-06-15 00:00:00', NULL, NULL, 'lokesh', '2021-06-16 08:35:26'),
(3, 'HI6027 Question 3', 'hi6027-question-3', '<p><strong>Question 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (11 marks)</strong></p>\r\n\r\n<p>Miguel, a 16-year old mechanic&rsquo;s apprentice, borrowed $3,000 from his next door neighbour, Jono, by telling him that he was 20 years old and had a good, stable income. The loan was payable in three equal fortnightly payments. After the first payment, Miguel stopped paying Jono. Jono wanted to bring a legal action against Miguel but when he discovered his real age, he decided instead to initiate an action in tort for deceit against the latter.</p>\r\n\r\n<p>Will Jono likely be successful in his action in tort for deceit against Miguel? Explain your answer. (Maximum 400 words)</p>\r\n', 'F', 22, '2021-06-15', 14, 6, 'A', NULL, 'Anonymous', '2021-06-15 00:00:00', NULL, NULL, 'lokesh', '2021-06-15 05:35:19'),
(4, 'HI6027 Question 4', 'hi6027-question-4', '<p><strong>Question 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (7 marks)</strong></p>\r\n\r\n<p>Charles wants to buy a pre-owned Harley-Davidson motorcycle and drops by several motorcycle dealerships before choosing to buy a good quality pre-owned, Softail model from Kenny&rsquo;s Motorcycle Dealership. Kenny tells Charles that the motorcycle was manufactured in 2008 and had only done 12,000 kilometres.</p>\r\n\r\n<p>After using the motorcycle for four months, Charles had it serviced at an authorised Harley Davidson repair centre. He was told by the repairman that the motorcycle was in a good condition, considering that it was made in 2004. The repairman did admit that he was surprised that it had done only 12,000 kilometres; because it was clear that the motorcycle had travelled way more than that.</p>\r\n\r\n<p>Charles investigates further and finds out that the motorcycle was really made in 2004 and he paid about $4,000 more than what the motorcycle was really worth on the market. Charles wants to get a remedy against Pete&rsquo;s Motorcycle Dealership. Explain to him his rights under contract law. <strong>NOTE: Do NOT answer this question based on Australian Consumer Law. You will not get any credit if you do so.</strong> (Maximum 350 words)</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'F', 22, '2021-06-15', 14, 6, 'A', NULL, 'Anonymous', '2021-06-15 00:00:00', NULL, NULL, 'lokesh', '2021-06-16 08:35:32'),
(5, 'HI6027 Question 5', 'hi6027-question-5', '<p>Samantha signs a contract to buy a brand-new unit in Kogarah. The contract is subject to</p>\r\n\r\n<p>an extended settlement period of 120 days. Samantha, through her solicitor, transfers the 10% deposit to the vendor&rsquo;s solicitor and then speaks with her mortgage broker about obtaining a loan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>While all this is going on, Samantha sells her own unit in Oatley. She intends to use the</p>\r\n\r\n<p>money realised from the sale of the Oatley unit to pay the balance of the purchase price</p>\r\n\r\n<p>of the Kogarah unit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A problem arises when Samantha&rsquo;s unit does not sell by the expected date. Samantha needed to secure short-term finance at an almost exorbitant interest rate just so she can buy the Kogarah unit. Samantha consults her solicitor, who advises her that she can sue the buyer of her Oatley unit for breach of contract and ask for damages including the additional interest charges she incurred. Is Samantha&rsquo;s solicitor correct? Explain your answer. (Maximum 150 words)</p>\r\n', 'F', 22, '2021-06-15', 14, 6, 'A', NULL, 'Anonymous', '2021-06-15 00:00:00', NULL, NULL, 'lokesh', '2021-06-16 08:34:59'),
(6, 'Hi6027 Question 6', 'hi6027-question-6', '<p>Octagon Supplements is a company registered in Australia. It is a seller of organic health and nutrition supplements. The company&rsquo;s directors approve a resolution to invest the company&rsquo;s money in a new business venture. This resolution was approved only after the company hired a management consultant, someone who possessed expert knowledge of the health and nutrition supplement industry who researched and prepared a report on the viability of the new business venture. The expert advised the company that the new business venture would very likely be successful and make the company $5 million in the first year.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Eight months after the company has made this investment, the company has lost money on it. The expert&rsquo;s revenue projections now look impossible. And in hindsight, it is now clear to the directors that investing in the new business venture was a bad idea. The shareholders now blame the directors for their decision. Have the directors violated any of their DUTIES under Corporations Act 2001 (Cth)? If so, which DUTY or DUTIES did they violate? Is there any DEFENCE available to the directors? If so, is this DEFENCE valid? Explain your answer citing specific sections of the Corporations Act. (Maximum 300 words)</p>\r\n', 'F', 22, '2021-06-15', 14, 6, 'A', NULL, 'Anonymous', '2021-06-15 00:00:00', NULL, NULL, 'lokesh', '2021-06-16 08:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `td_question_like_dislike`
--

CREATE TABLE `td_question_like_dislike` (
  `id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `action` enum('L','D') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_subscription`
--

CREATE TABLE `td_subscription` (
  `sl_no` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `trans_dt` date NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `plan_id` varchar(150) DEFAULT NULL,
  `pay_mode` enum('S','P') NOT NULL,
  `subs_type` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `from_dt` datetime NOT NULL,
  `to_dt` datetime NOT NULL,
  `time_zone` varchar(150) DEFAULT NULL,
  `subs_status` enum('A','E') NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_subscription`
--

INSERT INTO `td_subscription` (`sl_no`, `user_id`, `trans_dt`, `txn_id`, `plan_id`, `pay_mode`, `subs_type`, `amount`, `from_dt`, `to_dt`, `time_zone`, `subs_status`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(9, 4, '2021-03-17', 'sub_J8Bv8ObamMORBM', 'plan_J8BvF5wDeuc8FG', 'S', 3, 244.00, '2021-03-30 04:10:08', '2021-04-15 00:00:00', 'Asia/Kolkata', 'A', 'lokeshtest', '2021-03-17 00:00:00', NULL, NULL),
(10, 4, '2021-03-19', 'I-M1FJHEBXMFCM', 'P-4BM940910X528233SJG3DARA', 'P', 2, 50.00, '2021-03-30 04:10:08', '2021-03-31 04:10:08', 'Asia/Kolkata', 'E', 'lokeshtest', '1970-01-01 05:30:00', NULL, NULL),
(12, 11, '2021-03-23', 'txn_1IY5A2LUSYuzsidDCn53fMWa', NULL, 'S', 1, 27.00, '2021-03-23 13:30:23', '2021-03-24 13:30:23', 'Asia/Kolkata', 'E', 'Lokesh', '2021-03-23 13:30:23', NULL, NULL),
(13, 11, '2021-03-23', 'sub_JAQjyXfaYt6fcR', 'plan_JAQjO6g8HmFSCA', 'S', 3, 244.00, '2021-03-23 14:16:10', '2021-04-22 14:16:10', 'Asia/Kolkata', 'A', 'Lokesh', '2021-03-23 14:16:10', NULL, NULL),
(14, 11, '2021-03-23', 'sub_JAQpZeDh7oXjmV', 'plan_JAQpt4UGd0oXb1', 'S', 3, 244.00, '2021-03-23 14:21:31', '2021-04-22 14:21:31', 'Asia/Kolkata', 'A', 'Lokesh', '2021-03-23 14:21:31', NULL, NULL),
(15, 11, '2021-03-23', 'sub_JAR2KALXZ70nVl', 'plan_JAR2NbXZZJgONJ', 'S', 2, 50.00, '2021-03-23 14:34:26', '2021-03-30 14:34:26', 'Asia/Kolkata', 'A', 'Lokesh', '2021-03-23 14:34:26', NULL, NULL),
(16, 11, '2021-03-23', 'PAYID-MBM3MHI5E0594909T449513T', NULL, 'P', 1, 27.00, '2021-03-23 15:04:47', '2021-03-24 15:04:47', 'Asia/Kolkata', 'E', 'Lokesh', '2021-03-23 15:04:47', NULL, NULL),
(17, 11, '2021-03-23', 'I-LSNBAY91R9DY', 'P-1G995696LH959201GLZYEIVQ', 'P', 3, 244.00, '2021-03-23 15:06:03', '2021-04-22 15:06:03', 'Asia/Kolkata', 'A', 'Lokesh', '2021-03-23 15:06:03', NULL, NULL),
(18, 4, '2021-04-02', 'PAYID-MBTM4HA4MM19896P13652810', NULL, 'P', 1, 27.00, '2021-04-02 13:29:20', '2021-04-03 13:29:20', 'Asia/Kolkata', 'E', 'lokeshtest', '2021-04-02 13:29:20', NULL, NULL),
(19, 8, '2021-06-29', 'txn_1J7b8jLUSYuzsidDQIYJu3y9', NULL, 'S', 1, 27.00, '2021-06-29 12:43:50', '2021-06-30 12:43:50', 'Asia/Kolkata', 'E', 'hrdemo', '2021-06-29 12:43:50', NULL, NULL);

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
(19, 1, 0x3a3a31, '2021-01-28 17:31:19'),
(22, 1, 0x3a3a31, '2021-01-29 12:58:59'),
(23, 1, 0x3a3a31, '2021-01-29 14:49:29'),
(24, 1, 0x3a3a31, '2021-01-29 16:57:34'),
(25, 2, 0x3a3a31, '2021-01-29 17:26:59'),
(26, 2, 0x3a3a31, '2021-01-29 17:29:13'),
(27, 2, 0x3a3a31, '2021-01-29 17:30:02'),
(28, 1, 0x3a3a31, '2021-01-29 17:30:18'),
(29, 2, 0x3a3a31, '2021-01-29 17:30:50'),
(30, 1, 0x3a3a31, '2021-01-29 17:33:00'),
(31, 2, 0x3a3a31, '2021-01-29 17:33:10'),
(32, 2, 0x3a3a31, '2021-01-29 18:14:09'),
(33, 2, 0x3a3a31, '2021-01-29 18:20:27'),
(34, 2, 0x3a3a31, '2021-01-29 18:22:53'),
(35, 1, 0x3a3a31, '2021-02-01 10:59:13'),
(36, 2, 0x3a3a31, '2021-02-01 11:02:24'),
(37, 2, 0x3a3a31, '2021-02-01 12:02:00'),
(38, 1, 0x3a3a31, '2021-02-01 17:10:26'),
(39, 2, 0x3a3a31, '2021-02-01 17:10:35'),
(40, 1, 0x3a3a31, '2021-02-01 17:45:56'),
(41, 2, 0x3a3a31, '2021-02-01 17:47:26'),
(42, 1, 0x3a3a31, '2021-02-01 18:33:22'),
(43, 1, 0x3a3a31, '2021-02-01 18:38:15'),
(44, 1, 0x3a3a31, '2021-02-02 11:06:20'),
(45, 1, 0x3a3a31, '2021-02-02 11:08:40'),
(46, 1, 0x3a3a31, '2021-02-02 11:35:05'),
(47, 2, 0x3a3a31, '2021-02-02 11:40:42'),
(48, 1, 0x3a3a31, '2021-02-05 10:21:53'),
(49, 1, 0x3a3a31, '2021-02-05 11:07:58'),
(50, 1, 0x3a3a31, '2021-02-05 11:32:45'),
(51, 1, 0x3a3a31, '2021-02-05 17:51:50'),
(52, 1, 0x3a3a31, '2021-02-08 10:49:12'),
(53, 1, 0x3a3a31, '2021-02-08 16:06:48'),
(54, 1, 0x3a3a31, '2021-02-08 16:20:17'),
(55, 1, 0x3a3a31, '2021-02-09 14:03:02'),
(56, 8, 0x3a3a31, '2021-02-09 17:04:58'),
(57, 8, 0x3a3a31, '2021-02-09 17:07:24'),
(58, 8, 0x3a3a31, '2021-02-09 17:14:56'),
(59, 8, 0x3a3a31, '2021-02-09 17:16:39'),
(60, 8, 0x3a3a31, '2021-02-09 17:17:00'),
(61, 8, 0x3a3a31, '2021-02-09 17:17:40'),
(62, 8, 0x3a3a31, '2021-02-09 17:30:26'),
(63, 8, 0x3a3a31, '2021-02-09 17:31:31'),
(64, 8, 0x3a3a31, '2021-02-09 17:44:53'),
(65, 4, 0x3a3a31, '2021-02-10 13:04:21'),
(66, 4, 0x3a3a31, '2021-02-10 13:49:22'),
(67, 4, 0x3a3a31, '2021-02-10 14:15:45'),
(68, 4, 0x3a3a31, '2021-02-11 16:12:42'),
(69, 4, 0x3a3a31, '2021-02-11 16:13:53'),
(70, 4, 0x3a3a31, '2021-02-12 11:03:12'),
(71, 1, 0x3a3a31, '2021-02-12 11:28:34'),
(72, 2, 0x3a3a31, '2021-02-12 11:31:14'),
(73, 4, 0x3a3a31, '2021-02-12 17:15:57'),
(74, 1, 0x3a3a31, '2021-02-12 17:33:30'),
(75, 2, 0x3a3a31, '2021-02-12 17:36:50'),
(76, 1, 0x3a3a31, '2021-02-12 17:52:02'),
(77, 4, 0x3a3a31, '2021-02-12 18:22:58'),
(78, 1, 0x3a3a31, '2021-02-12 18:33:41'),
(79, 1, 0x3a3a31, '2021-02-12 18:36:27'),
(80, 2, 0x3a3a31, '2021-02-17 10:42:43'),
(81, 4, 0x3a3a31, '2021-02-17 14:01:55'),
(82, 4, 0x3a3a31, '2021-02-17 17:51:52'),
(83, 4, 0x3a3a31, '2021-02-19 13:00:22'),
(84, 4, 0x3a3a31, '2021-02-19 16:11:18'),
(85, 4, 0x3a3a31, '2021-02-19 16:14:19'),
(86, 4, 0x3a3a31, '2021-02-19 16:56:43'),
(87, 4, 0x3a3a31, '2021-02-19 18:10:36'),
(88, 4, 0x3a3a31, '2021-02-22 10:36:24'),
(89, 4, 0x3a3a31, '2021-02-22 13:15:44'),
(90, 4, 0x3a3a31, '2021-02-23 10:57:27'),
(91, 4, 0x3a3a31, '2021-02-23 11:47:56'),
(92, 4, 0x3a3a31, '2021-02-23 16:42:38'),
(93, 4, 0x3a3a31, '2021-02-23 17:34:34'),
(94, 4, 0x3a3a31, '2021-02-23 18:52:20'),
(95, 4, 0x3a3a31, '2021-02-24 10:53:33'),
(96, 4, 0x3a3a31, '2021-02-24 10:55:37'),
(97, 4, 0x3a3a31, '2021-02-24 11:30:18'),
(98, 4, 0x3a3a31, '2021-02-24 11:32:21'),
(99, 4, 0x3a3a31, '2021-02-24 11:41:12'),
(100, 4, 0x3a3a31, '2021-02-24 13:48:35'),
(101, 4, 0x3a3a31, '2021-02-25 11:02:41'),
(102, 4, 0x3a3a31, '2021-02-25 11:54:03'),
(103, 4, 0x3a3a31, '2021-02-25 13:23:45'),
(104, 4, 0x3a3a31, '2021-02-25 14:39:50'),
(105, 4, 0x3a3a31, '2021-02-25 14:51:42'),
(106, 4, 0x3a3a31, '2021-02-25 15:01:37'),
(107, 4, 0x3a3a31, '2021-02-25 18:51:13'),
(108, 4, 0x3a3a31, '2021-02-26 15:14:29'),
(109, 4, 0x3a3a31, '2021-02-26 16:37:07'),
(110, 4, 0x3a3a31, '2021-03-01 11:25:51'),
(111, 4, 0x3a3a31, '2021-03-01 13:27:06'),
(112, 4, 0x3a3a31, '2021-03-01 14:20:47'),
(113, 4, 0x3a3a31, '2021-03-01 14:44:18'),
(114, 4, 0x3a3a31, '2021-03-01 14:58:51'),
(115, 4, 0x3a3a31, '2021-03-01 15:26:28'),
(116, 4, 0x3a3a31, '2021-03-01 15:44:52'),
(117, 4, 0x3a3a31, '2021-03-01 15:59:26'),
(118, 4, 0x3a3a31, '2021-03-01 16:33:08'),
(119, 4, 0x3a3a31, '2021-03-01 16:59:53'),
(120, 4, 0x3a3a31, '2021-03-01 17:33:31'),
(121, 4, 0x3a3a31, '2021-03-03 11:42:00'),
(122, 4, 0x3a3a31, '2021-03-03 11:52:38'),
(123, 4, 0x3a3a31, '2021-03-03 13:28:02'),
(124, 4, 0x3a3a31, '2021-03-03 14:32:59'),
(125, 4, 0x3a3a31, '2021-03-03 15:45:10'),
(126, 4, 0x3a3a31, '2021-03-03 15:52:51'),
(127, 4, 0x3a3a31, '2021-03-03 15:58:11'),
(128, 4, 0x3a3a31, '2021-03-03 16:01:03'),
(129, 4, 0x3a3a31, '2021-03-09 14:04:50'),
(130, 4, 0x3a3a31, '2021-03-09 16:32:15'),
(131, 4, 0x3a3a31, '2021-03-09 16:37:45'),
(132, 4, 0x3a3a31, '2021-03-09 18:21:26'),
(133, 4, 0x3a3a31, '2021-03-09 18:40:00'),
(134, 4, 0x3a3a31, '2021-03-09 18:43:10'),
(135, 4, 0x3a3a31, '2021-03-09 18:45:36'),
(136, 4, 0x3a3a31, '2021-03-09 18:46:09'),
(137, 4, 0x3a3a31, '2021-03-09 18:47:22'),
(138, 4, 0x3a3a31, '2021-03-10 11:10:54'),
(139, 12, 0x3a3a31, '2021-03-10 12:20:51'),
(140, 4, 0x3a3a31, '2021-03-10 12:31:17'),
(141, 12, 0x3a3a31, '2021-03-10 13:39:42'),
(142, 12, 0x3a3a31, '2021-03-10 13:47:45'),
(143, 12, 0x3a3a31, '2021-03-10 13:47:58'),
(144, 4, 0x3a3a31, '2021-03-10 14:24:52'),
(145, 4, 0x3a3a31, '2021-03-10 15:18:11'),
(146, 4, 0x3a3a31, '2021-03-10 15:29:22'),
(147, 4, 0x3a3a31, '2021-03-10 15:51:29'),
(148, 4, 0x3a3a31, '2021-03-10 16:02:07'),
(149, 4, 0x3a3a31, '2021-03-10 16:04:25'),
(150, 12, 0x3a3a31, '2021-03-10 16:11:52'),
(151, 4, 0x3a3a31, '2021-03-10 16:18:31'),
(152, 4, 0x3a3a31, '2021-03-11 11:21:55'),
(153, 4, 0x3a3a31, '2021-03-11 11:32:09'),
(154, 12, 0x3a3a31, '2021-03-11 11:41:00'),
(155, 12, 0x3a3a31, '2021-03-11 11:41:33'),
(156, 4, 0x3a3a31, '2021-03-11 12:00:33'),
(157, 4, 0x3a3a31, '2021-03-11 12:02:17'),
(158, 4, 0x3a3a31, '2021-03-11 12:03:48'),
(159, 4, 0x3a3a31, '2021-03-11 12:07:53'),
(160, 4, 0x3a3a31, '2021-03-11 12:39:59'),
(161, 12, 0x3a3a31, '2021-03-11 12:40:33'),
(162, 12, 0x3a3a31, '2021-03-11 12:41:06'),
(163, 4, 0x3a3a31, '2021-03-11 12:49:33'),
(164, 4, 0x3a3a31, '2021-03-11 16:07:28'),
(165, 4, 0x3a3a31, '2021-03-11 16:13:10'),
(166, 4, 0x3a3a31, '2021-03-11 17:29:42'),
(167, 12, 0x3a3a31, '2021-03-11 17:53:58'),
(168, 4, 0x3a3a31, '2021-03-11 18:08:36'),
(169, 4, 0x3a3a31, '2021-03-11 18:29:21'),
(170, 4, 0x3a3a31, '2021-03-12 11:24:11'),
(171, 4, 0x3a3a31, '2021-03-15 11:19:11'),
(172, 4, 0x3a3a31, '2021-03-15 14:52:34'),
(173, 4, 0x3a3a31, '2021-03-16 01:52:48'),
(174, 4, 0x3a3a31, '2021-03-17 10:40:38'),
(175, 4, 0x3a3a31, '2021-03-18 14:37:40'),
(176, 4, 0x3a3a31, '2021-03-18 18:14:21'),
(177, 4, 0x3a3a31, '2021-03-19 10:51:58'),
(178, 4, 0x3a3a31, '2021-03-19 16:00:32'),
(179, 1, 0x3a3a31, '2021-03-19 16:04:57'),
(180, 1, 0x3a3a31, '2021-03-19 16:28:43'),
(181, 2, 0x3a3a31, '2021-03-19 17:07:28'),
(182, 1, 0x3a3a31, '2021-03-19 17:09:28'),
(183, 2, 0x3a3a31, '2021-03-19 17:11:23'),
(184, 1, 0x3a3a31, '2021-03-19 17:12:07'),
(185, 4, 0x3132322e3137362e32372e3533, '2021-03-19 13:34:17'),
(186, 4, 0x3232332e3139312e34322e3934, '2021-03-21 04:33:37'),
(187, 4, 0x3232332e3139312e35332e313033, '2021-03-21 04:46:58'),
(188, 12, 0x3132322e3137362e32372e3533, '2021-03-22 05:32:49'),
(189, 12, 0x3132322e3137362e32372e3533, '2021-03-22 05:58:21'),
(190, 12, 0x3132322e3137362e32372e3533, '2021-03-22 06:44:02'),
(191, 1, 0x3132322e3137362e32372e3533, '2021-03-22 06:45:30'),
(192, 2, 0x3132322e3137362e32372e3533, '2021-03-22 06:49:20'),
(193, 2, 0x3132322e3137362e32372e3533, '2021-03-22 07:06:55'),
(194, 4, 0x3132322e3137362e32372e3533, '2021-03-22 13:34:58'),
(195, 11, 0x3132322e3137362e32372e3533, '2021-03-23 07:59:35'),
(196, 11, 0x3132322e3137362e32372e3533, '2021-03-23 09:03:30'),
(197, 13, 0x3132322e3136332e3132332e3638, '2021-03-23 09:04:56'),
(198, 11, 0x3132322e3137362e32372e3533, '2021-03-23 09:21:59'),
(199, 1, 0x3132322e3137362e32372e3533, '2021-03-23 11:05:56'),
(200, 4, 0x3132322e3137362e32372e3533, '2021-03-23 11:13:57'),
(201, 1, 0x3132322e3137362e32372e3533, '2021-03-23 12:08:18'),
(202, 1, 0x3132322e3136332e3132332e3638, '2021-03-23 12:08:26'),
(203, 4, 0x3133362e3233322e36342e3130, '2021-03-23 12:41:00'),
(204, 11, 0x3132322e3137362e32372e3533, '2021-03-23 12:51:19'),
(205, 4, 0x3132322e3137362e32372e3533, '2021-03-25 13:06:41'),
(206, 1, 0x3132322e3137362e32372e3533, '2021-03-25 13:31:10'),
(207, 4, 0x3132322e3137362e32372e3533, '2021-03-26 09:54:23'),
(208, 13, 0x3132322e3136332e3132332e3638, '2021-03-26 10:00:15'),
(209, 4, 0x3132322e3137362e32372e3533, '2021-03-26 10:03:19'),
(210, 13, 0x3132322e3136332e3132332e3638, '2021-03-30 05:42:07'),
(211, 13, 0x3132322e3136332e3132332e3638, '2021-03-30 06:19:00'),
(212, 1, 0x3133362e3233322e36342e3130, '2021-03-30 06:25:16'),
(213, 1, 0x3132322e3136332e3132332e3638, '2021-03-30 06:25:36'),
(214, 13, 0x3132322e3136332e3132332e3638, '2021-03-30 07:12:36'),
(215, 1, 0x3132322e3136332e3132332e3638, '2021-03-30 07:13:25'),
(216, 4, 0x3132322e3137362e32372e3533, '2021-03-30 07:16:59'),
(217, 4, 0x3132322e3137362e32372e3533, '2021-03-30 07:32:33'),
(218, 4, 0x3132322e3137362e32372e3533, '2021-03-30 07:35:01'),
(219, 4, 0x3132322e3137362e32372e3533, '2021-03-30 07:59:06'),
(220, 4, 0x3132322e3137362e32372e3533, '2021-03-30 08:00:04'),
(221, 4, 0x3132322e3137362e32372e3533, '2021-03-30 08:01:35'),
(222, 4, 0x3132322e3137362e32372e3533, '2021-03-30 08:02:23'),
(223, 1, 0x3132322e3136332e3132332e3638, '2021-03-30 08:02:36'),
(224, 1, 0x3132322e3137362e32372e3533, '2021-03-30 08:03:12'),
(225, 4, 0x3132322e3137362e32372e3533, '2021-03-30 08:08:53'),
(226, 4, 0x3132322e3137362e32372e3533, '2021-03-30 08:09:21'),
(227, 4, 0x3132322e3137362e32372e3533, '2021-03-30 08:35:14'),
(228, 2, 0x3132322e3137362e32372e3533, '2021-03-30 12:52:03'),
(229, 2, 0x3132322e3137362e32372e3533, '2021-03-30 13:06:49'),
(230, 14, 0x3133362e3233322e36342e3130, '2021-03-31 06:54:55'),
(231, 14, 0x3133362e3233322e36342e3130, '2021-03-31 06:55:36'),
(232, 2, 0x3133362e3233322e36342e3130, '2021-03-31 06:58:06'),
(233, 1, 0x3133362e3233322e36342e3130, '2021-03-31 06:58:34'),
(234, 1, 0x3132322e3136332e3132332e3638, '2021-03-31 07:34:28'),
(235, 1, 0x3133362e3233322e36342e3130, '2021-03-31 08:02:52'),
(236, 15, 0x3133362e3138352e3133392e313733, '2021-03-31 09:47:43'),
(237, 15, 0x3133362e3233322e36342e3130, '2021-03-31 09:49:46'),
(238, 15, 0x3133362e3233322e36342e3130, '2021-03-31 09:57:05'),
(239, 2, 0x3133362e3233322e36342e3130, '2021-03-31 10:02:18'),
(240, 1, 0x3133362e3233322e36342e3130, '2021-03-31 10:10:03'),
(241, 1, 0x3132322e3136332e3132332e3638, '2021-03-31 10:31:19'),
(242, 2, 0x3133362e3138352e3133392e313733, '2021-03-31 11:24:54'),
(243, 1, 0x3133362e3138352e3133392e313733, '2021-03-31 11:25:44'),
(244, 15, 0x3132322e3137362e32372e3533, '2021-03-31 11:45:33'),
(245, 4, 0x3131332e32312e36392e3430, '2021-03-31 12:05:00'),
(246, 1, 0x3132322e3137362e32372e3533, '2021-03-31 12:13:30'),
(247, 15, 0x3133362e3138352e3133392e313733, '2021-03-31 12:49:06'),
(248, 1, 0x3133362e3138352e3133392e313733, '2021-03-31 12:51:40'),
(249, 17, 0x3132322e3137362e32372e3533, '2021-03-31 12:53:04'),
(250, 4, 0x3132322e3137362e32372e3533, '2021-04-01 05:02:38'),
(251, 1, 0x3132322e3137362e32372e3533, '2021-04-01 05:34:00'),
(252, 1, 0x3132322e3136332e3132332e3638, '2021-04-01 05:37:15'),
(253, 1, 0x3132322e3136332e3132332e3638, '2021-04-01 06:10:28'),
(254, 1, 0x3132322e3137362e32372e3533, '2021-04-01 06:47:03'),
(255, 1, 0x3132322e3137362e32372e3533, '2021-04-01 07:01:14'),
(256, 2, 0x3132322e3137362e32372e3533, '2021-04-01 07:01:22'),
(257, 1, 0x3132322e3137362e32372e3533, '2021-04-01 07:01:42'),
(258, 1, 0x3133362e3233322e36342e3130, '2021-04-01 07:21:45'),
(259, 1, 0x3132322e3137362e32372e3533, '2021-04-01 07:26:32'),
(260, 1, 0x3132322e3137362e32372e3533, '2021-04-01 08:16:56'),
(261, 4, 0x3132322e3137362e32372e3533, '2021-04-01 08:19:37'),
(262, 2, 0x3132322e3136332e3132332e3638, '2021-04-01 08:24:43'),
(263, 1, 0x3132322e3136332e3132332e3638, '2021-04-01 09:04:09'),
(264, 15, 0x3133362e3138352e3133392e313733, '2021-04-01 09:22:10'),
(265, 2, 0x3132322e3137362e32372e3533, '2021-04-01 10:04:06'),
(266, 2, 0x3132322e3137362e32372e3533, '2021-04-01 10:24:56'),
(267, 15, 0x3133362e3138352e3133392e313733, '2021-04-01 12:16:45'),
(268, 1, 0x3132322e3137362e32372e3533, '2021-04-01 12:21:19'),
(269, 1, 0x3132322e3136332e3132332e3638, '2021-04-01 12:23:20'),
(270, 2, 0x3132322e3137362e32372e3533, '2021-04-01 13:15:10'),
(271, 4, 0x3132322e3137362e32372e3533, '2021-04-02 05:20:02'),
(272, 4, 0x3132322e3137362e32372e3533, '2021-04-02 07:55:46'),
(273, 4, 0x3132322e3137362e32372e3533, '2021-04-02 08:01:10'),
(274, 15, 0x3133362e3138352e3133392e313733, '2021-04-03 06:28:51'),
(275, 4, 0x3132322e3137362e32372e3533, '2021-04-05 05:04:05'),
(276, 4, 0x3132322e3137362e32372e3533, '2021-04-05 05:27:02'),
(277, 1, 0x3132322e3137362e32372e3533, '2021-04-05 05:33:58'),
(278, 4, 0x3132322e3137362e32372e3533, '2021-04-05 05:44:05'),
(279, 15, 0x3133362e3138352e3133392e313733, '2021-04-05 05:53:16'),
(280, 1, 0x3132322e3137362e32372e3533, '2021-04-05 06:02:59'),
(281, 4, 0x3132322e3137362e32372e3533, '2021-04-06 06:06:37'),
(282, 1, 0x3132322e3137362e32372e3533, '2021-04-07 06:05:30'),
(283, 4, 0x3132322e3137362e32372e3533, '2021-04-07 06:32:18'),
(284, 1, 0x3132322e3137362e32372e3533, '2021-04-07 06:38:20'),
(285, 18, 0x3132322e3137362e32372e3533, '2021-04-07 06:39:38'),
(286, 18, 0x3132322e3137362e32372e3533, '2021-04-07 06:39:46'),
(287, 18, 0x3132322e3137362e32372e3533, '2021-04-07 06:41:14'),
(288, 18, 0x3132322e3137362e32372e3533, '2021-04-07 06:51:33'),
(289, 1, 0x3132322e3137362e32372e3533, '2021-04-07 07:02:02'),
(290, 19, 0x3132322e3137362e32372e3533, '2021-04-07 07:02:48'),
(291, 1, 0x3132322e3137362e32372e3533, '2021-04-07 07:03:53'),
(292, 2, 0x3132322e3137362e32372e3533, '2021-04-07 07:04:43'),
(293, 1, 0x3132322e3137362e32372e3533, '2021-04-07 07:05:52'),
(294, 20, 0x3132322e3137362e32372e3533, '2021-04-07 07:06:26'),
(295, 1, 0x3132322e3137362e32372e3533, '2021-04-07 07:07:37'),
(296, 4, 0x3132322e3137362e32372e3533, '2021-04-07 07:11:13'),
(297, 4, 0x3132322e3137362e32372e3533, '2021-04-07 07:12:24'),
(298, 1, 0x3132322e3137362e32372e3533, '2021-04-07 07:20:06'),
(299, 1, 0x3132322e3136332e3132332e3638, '2021-04-07 07:21:50'),
(300, 1, 0x3132322e3137362e32372e3533, '2021-04-07 07:36:45'),
(301, 2, 0x3132322e3137362e32372e3533, '2021-04-07 07:36:55'),
(302, 2, 0x3132322e3137362e32372e3533, '2021-04-07 07:39:33'),
(303, 15, 0x3133362e3138352e3133392e313733, '2021-04-07 07:46:15'),
(304, 4, 0x3132322e3137362e32372e3533, '2021-04-07 07:46:52'),
(305, 15, 0x3133362e3138352e3133392e313733, '2021-04-07 07:50:07'),
(306, 4, 0x3133362e3138352e3133392e313733, '2021-04-07 07:51:35'),
(307, 4, 0x3132322e3136332e3132332e3638, '2021-04-07 07:55:11'),
(308, 4, 0x3132322e3137362e32372e3533, '2021-04-07 07:56:53'),
(309, 4, 0x3132322e3137362e32372e3533, '2021-04-07 07:57:51'),
(310, 4, 0x3130332e32372e38362e3439, '2021-04-07 07:58:50'),
(311, 4, 0x3132322e3137362e32372e3533, '2021-04-07 08:01:15'),
(312, 1, 0x3132322e3137362e32372e3533, '2021-04-07 08:08:47'),
(313, 1, 0x3133362e3138352e3133392e313733, '2021-04-07 08:39:25'),
(314, 15, 0x3133362e3138352e3133392e313733, '2021-04-07 08:42:10'),
(315, 1, 0x3132322e3137362e32372e3533, '2021-04-07 08:50:00'),
(316, 4, 0x3132322e3137362e32372e3533, '2021-04-07 08:56:33'),
(317, 15, 0x3133362e3138352e3133392e313733, '2021-04-07 10:47:48'),
(318, 1, 0x3133362e3138352e3133392e313733, '2021-04-07 11:06:02'),
(319, 2, 0x3133362e3138352e3133392e313733, '2021-04-07 11:16:17'),
(320, 1, 0x3132322e3137362e32372e3533, '2021-04-07 11:18:17'),
(321, 1, 0x3132322e3136332e3132332e3638, '2021-04-07 11:21:20'),
(322, 2, 0x3133362e3138352e3133392e313733, '2021-04-07 12:15:03'),
(323, 4, 0x3132322e3137362e32372e3533, '2021-04-07 12:57:10'),
(324, 1, 0x3132322e3137362e32372e3533, '2021-04-07 13:03:48'),
(325, 1, 0x3138322e36362e31332e313737, '2021-04-07 15:45:21'),
(326, 15, 0x3133362e3138352e3133392e313733, '2021-04-11 10:03:45'),
(327, 20, 0x3232332e3139312e33322e3133, '2021-04-21 10:53:53'),
(328, 1, 0x3232332e3139312e33322e3133, '2021-04-21 10:55:12'),
(329, 4, 0x3132322e3137362e32372e3533, '2021-05-05 05:30:38'),
(330, 4, 0x3132322e3137362e32372e3533, '2021-05-05 05:52:27'),
(331, 15, 0x3130362e3230312e3130342e313132, '2021-05-26 13:41:08'),
(332, 15, 0x3130362e3230312e3130342e313132, '2021-06-09 12:34:02'),
(333, 15, 0x3132322e3137322e3230342e3335, '2021-06-12 02:10:31'),
(334, 21, 0x3138322e36362e3133382e323532, '2021-06-14 05:35:57'),
(335, 15, 0x3132322e3137322e3230342e3335, '2021-06-15 04:06:01'),
(336, 22, 0x3132322e3137322e3230342e3335, '2021-06-15 04:18:40'),
(337, 1, 0x3132322e3137322e3230342e3335, '2021-06-15 04:35:17'),
(338, 22, 0x3132322e3137322e3230342e3335, '2021-06-15 04:38:08'),
(339, 1, 0x3232332e3139312e34342e313234, '2021-06-15 16:02:50'),
(340, 1, 0x3232332e3232332e3135312e3633, '2021-06-15 16:03:03'),
(341, 21, 0x3232332e3232332e3135312e3633, '2021-06-15 16:09:08'),
(342, 21, 0x3232332e3232332e3135312e3633, '2021-06-15 16:14:24'),
(343, 21, 0x3232332e3232332e3135312e3633, '2021-06-15 16:15:54'),
(344, 21, 0x3232332e3232332e3135312e3633, '2021-06-15 16:16:05'),
(345, 1, 0x3232332e3232332e3135312e3633, '2021-06-15 16:16:30'),
(346, 21, 0x3232332e3232332e3135312e3633, '2021-06-15 17:29:49'),
(347, 21, 0x3230322e3134322e37312e313532, '2021-06-16 06:51:22'),
(348, 21, 0x3230322e3134322e37312e313532, '2021-06-16 06:59:58'),
(349, 21, 0x3230322e3134322e37312e313532, '2021-06-16 07:09:05'),
(350, 1, 0x3132322e3137322e3230342e3335, '2021-06-16 08:34:37'),
(351, 22, 0x3132322e3137322e3230342e3335, '2021-06-16 08:39:53'),
(352, 22, 0x3132322e3137322e3230342e3335, '2021-06-17 11:36:15'),
(353, 22, 0x3130362e3230312e34392e313632, '2021-06-29 06:31:29'),
(354, 8, 0x3130332e38372e3134322e313732, '2021-06-29 07:09:49'),
(355, 21, 0x3232332e3138372e3135322e313130, '2021-06-29 07:58:00'),
(356, 1, 0x3232332e3138372e3133322e3337, '2021-06-29 10:10:07'),
(357, 21, 0x3232332e3138372e3133322e3430, '2021-06-30 06:41:18'),
(358, 1, 0x3130362e3230312e34392e313632, '2021-06-30 11:52:35'),
(359, 1, 0x3232332e3232332e3134392e3239, '2021-07-01 03:48:31'),
(360, 1, 0x3232332e3139312e302e3633, '2021-07-01 04:28:48'),
(361, 2, 0x3232332e3138372e3134392e3939, '2021-07-01 05:50:56'),
(362, 21, 0x3232332e3138372e3134392e3939, '2021-07-01 05:55:07');

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
-- Indexes for table `md_order_rate`
--
ALTER TABLE `md_order_rate`
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
-- Indexes for table `td_answer_like_dislike`
--
ALTER TABLE `td_answer_like_dislike`
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
-- Indexes for table `td_payments`
--
ALTER TABLE `td_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_question`
--
ALTER TABLE `td_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_question_like_dislike`
--
ALTER TABLE `td_question_like_dislike`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `md_grade`
--
ALTER TABLE `md_grade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `md_order_rate`
--
ALTER TABLE `md_order_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `md_rates`
--
ALTER TABLE `md_rates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `md_users`
--
ALTER TABLE `md_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `td_advertisement`
--
ALTER TABLE `td_advertisement`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_answer`
--
ALTER TABLE `td_answer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_answer_like_dislike`
--
ALTER TABLE `td_answer_like_dislike`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_favourite`
--
ALTER TABLE `td_favourite`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `td_notifications`
--
ALTER TABLE `td_notifications`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_orders`
--
ALTER TABLE `td_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `td_payments`
--
ALTER TABLE `td_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `td_question`
--
ALTER TABLE `td_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `td_question_like_dislike`
--
ALTER TABLE `td_question_like_dislike`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_subscription`
--
ALTER TABLE `td_subscription`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
