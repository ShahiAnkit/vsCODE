-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 03:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndps`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_call_logs`
--

CREATE TABLE `api_call_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_call` varchar(255) DEFAULT NULL,
  `request_fields` longtext DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'test2', 'desc', 'Active', '2023-08-18 11:54:00', '2023-08-18 11:54:00'),
(3, '29Aug', 'not allowed to export.', 'Active', '2023-08-29 10:26:04', '2023-08-29 10:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medguide`
--

CREATE TABLE `medguide` (
  `ID` int(11) NOT NULL,
  `URLID` int(11) DEFAULT NULL,
  `CompanyID` varchar(50) DEFAULT NULL,
  `CompanyURL` varchar(255) NOT NULL,
  `ContactURL` varchar(50) DEFAULT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `CompanyStatus` int(11) DEFAULT NULL,
  `ContactStatus` int(11) DEFAULT NULL,
  `MachineName` varchar(50) DEFAULT NULL,
  `APIMachineName` varchar(50) DEFAULT NULL,
  `APIStatus` int(11) DEFAULT NULL,
  `Column1` varchar(150) DEFAULT NULL,
  `Column2` varchar(150) DEFAULT NULL,
  `Column3` varchar(150) DEFAULT NULL,
  `Column4` varchar(100) DEFAULT NULL,
  `Column5` varchar(100) DEFAULT NULL,
  `Column6` varchar(100) DEFAULT NULL,
  `Column7` varchar(100) DEFAULT NULL,
  `Column8` varchar(100) DEFAULT NULL,
  `Column9` varchar(100) DEFAULT NULL,
  `Column10` varchar(150) DEFAULT NULL,
  `ing1` varchar(100) DEFAULT NULL,
  `ing2` varchar(100) DEFAULT NULL,
  `ing3` varchar(100) DEFAULT NULL,
  `ing4` varchar(100) DEFAULT NULL,
  `ing5` varchar(100) DEFAULT NULL,
  `ing6` varchar(100) DEFAULT NULL,
  `ing7` varchar(100) DEFAULT NULL,
  `ing8` varchar(100) DEFAULT NULL,
  `ing9` varchar(100) DEFAULT NULL,
  `ing10` varchar(100) DEFAULT NULL,
  `ing11` varchar(100) DEFAULT NULL,
  `ing12` varchar(100) DEFAULT NULL,
  `BrandName` varchar(100) DEFAULT NULL,
  `ing13` varchar(100) DEFAULT NULL,
  `ing14` varchar(100) DEFAULT NULL,
  `ing15` varchar(100) DEFAULT NULL,
  `ing16` varchar(100) DEFAULT NULL,
  `ing17` varchar(100) DEFAULT NULL,
  `ing18` varchar(100) DEFAULT NULL,
  `ing19` varchar(100) DEFAULT NULL,
  `ing20` varchar(100) DEFAULT NULL,
  `ing21` varchar(100) DEFAULT NULL,
  `ing22` varchar(100) DEFAULT NULL,
  `ing23` varchar(100) DEFAULT NULL,
  `ing24` varchar(100) DEFAULT NULL,
  `ing25` varchar(100) DEFAULT NULL,
  `ing26` varchar(100) DEFAULT NULL,
  `ing27` varchar(100) DEFAULT NULL,
  `ing28` varchar(100) DEFAULT NULL,
  `ing29` varchar(100) DEFAULT NULL,
  `ing30` varchar(100) DEFAULT NULL,
  `ing31` varchar(100) DEFAULT NULL,
  `ing32` varchar(100) DEFAULT NULL,
  `ing33` varchar(100) DEFAULT NULL,
  `ing34` varchar(100) DEFAULT NULL,
  `ing35` varchar(100) DEFAULT NULL,
  `ing36` varchar(100) DEFAULT NULL,
  `ing37` varchar(100) DEFAULT NULL,
  `ing38` varchar(100) DEFAULT NULL,
  `ing39` varchar(100) DEFAULT NULL,
  `ing40` varchar(100) DEFAULT NULL,
  `ing41` varchar(100) DEFAULT NULL,
  `ing42` varchar(100) DEFAULT NULL,
  `SubstanceName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_04_174235_create_category_table', 1),
(6, '2022_02_08_014433_add_password_value_to_users_table', 1),
(7, '2022_02_08_014518_create_user_login_info_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `category`, `price`, `description`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(1, '1001', 'wireless headphones', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(2, '1002', 'Boat headphones', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(3, '1003', 'oneplus mobile', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(4, '1004', 'iphone 13 pro max', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(5, '1005', 'mi mobile', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(6, '1006', 'Sony TV', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(7, '1007', 'Smart TV', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(8, '1008', 'Lenovo laptop', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(9, '1009', 'HP laptop', NULL, NULL, NULL, NULL, 'Active', NULL, NULL),
(10, '1010', 'laptop', NULL, NULL, NULL, NULL, 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_keyword`
--

CREATE TABLE `search_keyword` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_keyword_product`
--

CREATE TABLE `search_keyword_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('Lock','Unlock') NOT NULL DEFAULT 'Lock',
  `role_type` enum('Admin','Normal') NOT NULL DEFAULT 'Normal',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_value` varchar(255) NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `company_name`, `city`, `state`, `address`, `status`, `role_type`, `email_verified_at`, `password`, `password_value`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abcd\n', 'developer_test@mailinator.com', 'vbs', 'mumbai', NULL, NULL, 'Lock', 'Admin', NULL, '$2y$10$zGgC9WxXVnlvMXcytnxZV.N1rAjjKj7KJRIjse/haqdq65EBOeJz6', 'QWRtaW5AMTIz', '2023-09-01 12:29:35', '::1', NULL, NULL, '2023-09-01 06:59:35'),
(2, 'abc', 'abc@gmail.com', 'vbs', 'mumbai', NULL, NULL, 'Unlock', 'Admin', NULL, '$2y$10$MMd0a3nfZqR8P.waMpT39.0MMnJdmEc.YQQOwrMn8jUNQ35qQ8I9W', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2023-08-18 11:50:23', '2023-08-18 11:50:23'),
(3, 'Developer', 'dev_test@mailinator.com', 'Test Company One', 'Mumbai', 'Maharashtra', '1', 'Unlock', 'Admin', NULL, '$2y$10$fFleL5bndO9YcIwjqTWZVuX8ivSfr/9yW.yVnyrgYJd3CUYyTX1Nu', 'Qmx1ZVdhdGVyMTIzJA==', '2023-08-18 12:45:05', '152.58.5.204', NULL, '2022-02-05 09:01:33', '2023-08-18 14:15:05'),
(11, 'Developer', 'develop@mailinator.com', 'Web Development', 'Mumbai', 'Maharashtra', '16', 'Unlock', 'Normal', NULL, '$2y$10$zGgC9WxXVnlvMXcytnxZV.N1rAjjKj7KJRIjse/haqdq65EBOeJz6', 'QWRtaW5AMTIz', '2023-03-10 21:28:30', '103.183.229.36', NULL, '2022-02-11 11:19:59', '2023-03-10 22:58:30'),
(12, 'Test User', 'test@mailinator.com', 'Test Company', 'Mumbai', 'Maharashtra', 'Test address', 'Unlock', 'Admin', NULL, '$2y$10$WAYP.xdgeKmzts6UT3rDfe6ZKPHpqoLSeUyiy27RUM0rPtKs1UYmy', 'VXNlckAxMjM=', NULL, NULL, NULL, '2022-02-11 16:14:50', '2022-02-13 19:29:28'),
(13, 'Sameer Shah', 'sameers1979@gmail.com', 'Viaante', 'Mumbai', 'Maharashtra', 'Some place', 'Unlock', 'Normal', NULL, '$2y$10$YIr46YkpZNi.ZE0Afslx9.ie431HEzOzv./RQNDUJ2qclHMS36i7i', 'VGVzdEAxMjM0', '2022-03-31 18:37:18', '103.177.112.29', NULL, '2022-03-29 18:38:50', '2022-03-31 20:07:18'),
(14, 'bhushan', 'bhushan.arute@dhl.com', 'DHL', 'Mumbai', 'Maharashtra', 'Msm', 'Unlock', 'Admin', NULL, '$2y$10$NmpOA4IuIvqXjcyTdrHhLugRLRHfumim6TX.fZRRpYZgWCl/VyEbS', 'UmVkRmV2ZXIxMjMk', NULL, NULL, NULL, '2022-04-11 13:05:36', '2022-08-23 13:17:11'),
(15, 'Ashwini', 'Ashwini.Khot4@dhl.com', 'DHL', 'Mumbai', 'Maharashtra', 'whatever', 'Unlock', 'Admin', NULL, '$2y$10$CT.rPlxjU84fiJczZPwJp.xmwaAQjxt.z0LzLRb360Vp1FWlj0Ofi', 'VGVzdDEyMzQk', '2022-04-14 16:10:28', '165.225.106.54', NULL, '2022-04-11 13:06:11', '2022-04-14 17:40:28'),
(16, 'apibackend', 'apibackend@dhl.com', 'DHL', 'Mumbai', 'Maharashtra', 'India', 'Unlock', 'Normal', NULL, '$2y$10$HaKsQhmVXtnrjN9BxvmwveK9kfqTm2Atgn4IUFZkSIoFg8DhDkkQ6', 'VGVzdDEyMzQk', '2023-08-13 18:35:40', '136.226.254.207', NULL, '2022-04-14 17:44:59', '2023-08-13 20:05:40'),
(18, 'CCJ Store', 'Expressidr3@Dhl.Com', 'DHL Express', 'Calicut', 'Kerala', 'Dhl Express India Pvt Ltd,Shoba Complex,Indira Gandhi Road,', 'Unlock', 'Normal', NULL, '$2y$10$tDEyfmC2RvWYe9dLeSJmR.OCeogX/cz68KWhU3NJMGGTiuKMgZcNa', 'QWRtaW5AMTIz', '2023-08-17 19:54:54', '165.225.120.86', NULL, '2022-05-10 16:59:09', '2023-08-17 21:24:54'),
(19, 'MCR Store', 'Express.Cok@Dhl.Com', 'DHL Express', 'Cochin', 'kerala', 'Dhl Express India Pvt Ltd,Anugraha,Canal Road,', 'Unlock', 'Normal', NULL, '$2y$10$ktBrlU9n4XOAH22sScyBfeCpxoOi8HUUyYFpi5ZDUbwKbrSu0x8De', 'QWRtaW5AMTIz', '2023-08-07 12:37:15', '136.226.254.116', NULL, '2022-05-10 17:05:15', '2023-08-07 14:07:15'),
(20, 'Rakesh', 'Rakeshraj.R@dhl.com', 'DHL Express', NULL, 'Kerala', NULL, 'Unlock', 'Normal', NULL, '$2y$10$i3o/M0hEKT0FNMCf16HzpO1HIKmHp.UrXP8zRxAYtVvGzsQl8j5xG', 'QWRtaW5AMTIz', '2023-08-21 17:09:45', '165.225.120.77', NULL, '2022-05-10 17:31:57', '2023-08-21 18:39:45'),
(21, 'Nibin', 'NibinK.Jockey@dhl.com', 'DHL Express', NULL, 'Kerala', NULL, 'Unlock', 'Normal', NULL, '$2y$10$CrmZM0nrOFVCOKYU9Zj7zOwlpxzeHgJB79VSmsRfw7DcCGC.WgWoq', 'QWRtaW5AMTIz', '2023-08-21 15:32:40', '136.226.254.192', NULL, '2022-05-10 17:32:59', '2023-08-21 17:02:40'),
(22, 'Rajesh.Pillai2@dhl.com', 'Rajesh.Pillai2@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$mJPT48tt.g.M1U3oHpzZ7uk.ffucspyu2onryvY2AfG5E.yv5w5QK', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 16:33:57', '2022-05-23 16:33:57'),
(23, 'Mahesh.Namdar@dhl.com', 'Mahesh.Namdar@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$x127cJf7rT7/Rk2nTtS4l.kH5eCNMofgdwfazKb5xsLzl/w3QUBY6', 'QWRtaW5AMTIz', '2022-11-08 15:09:32', '165.225.106.49', NULL, '2022-05-23 16:40:58', '2022-11-08 16:39:32'),
(24, 'Heman.Saralaya@dhl.com', 'Heman.Saralaya@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$89ojVOXvK3.mHR1F3Dy3TO9DGpNd4iEu1PEF/u1ObHhG9U7lMEy3O', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 16:42:45', '2022-05-23 16:42:45'),
(25, 'Simon.Lewis@dhl.com', 'Simon.Lewis@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$VE.13sBQzBT340K81fsuxukvFMXLefx4l3wp3s8SCVuTmSIBpNrgO', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 16:44:41', '2022-05-23 16:44:41'),
(26, 'Karan.Khurana@dhl.com', 'Karan.Khurana@dhl.com', 'DHL Express', 'Ahmedabad', 'Gujarat', NULL, 'Unlock', 'Normal', NULL, '$2y$10$Ua94eYvL5qJXAaO6WCLsO.rooZMtTOysWxpAsFDl3kSSIALo9IteG', 'QWRtaW5AMTIz', '2023-08-18 13:10:57', '136.226.254.185', NULL, '2022-05-23 16:45:56', '2023-08-18 14:40:57'),
(27, 'dhananjay.jadeja@dhl.com', 'dhananjay.jadeja@dhl.com', 'DHL Express', 'Ahmedabad', 'Gujarat', NULL, 'Unlock', 'Normal', NULL, '$2y$10$WNPHQws4BT5Bj64A.lRWUuxtsYfCgAPOSup2d7pnxFEU8Hiuv6mki', 'QWRtaW5AMTIz', '2022-07-18 15:15:43', '165.225.106.65', NULL, '2022-05-23 16:46:57', '2022-07-18 16:45:43'),
(28, 'Sandhir.Srivastava@dhl.com', 'Sandhir.Srivastava@dhl.com', 'DHL Express', 'Ahmedabad', 'Gujarat', NULL, 'Unlock', 'Normal', NULL, '$2y$10$hkUhYdeu2T3buhrODVo1Leg756elgflHp0t4IJ/EaXtzyVSe4Wziy', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 16:48:56', '2022-05-23 16:48:56'),
(29, 'Vijay.Wakte@dhl.com', 'Vijay.Wakte@dhl.com', 'DHL Express', 'Pune', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$vhpWDoBwJvMB6t12sHkJdeKztCoSsLAT8igdgrSox5rTYGGykgTZy', 'QWRtaW5AMTIz', '2023-07-13 13:33:32', '136.226.254.95', NULL, '2022-05-23 16:51:05', '2023-07-13 15:03:32'),
(30, 'jagdish.gupta@dhl.com', 'jagdish.gupta@dhl.com', 'DHL Express', 'Pune', 'Maharashtra', 'Next to Icon Plaza Hall', 'Unlock', 'Normal', NULL, '$2y$10$26ZNER/C9Aty2Vk0FGntI.JxNq.oqAhUCj7cBm79E1hKAbmgYgNHG', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 16:53:05', '2022-05-23 16:53:05'),
(31, 'sameershah', 'sameer.shah@viaante.com', 'Viaante', 'Mumbai', NULL, NULL, 'Unlock', 'Normal', NULL, '$2y$10$J/u/SUp6LXf1NhPSCRao9OsJMRB7lMhXBFw9sYHPeGaBuzvtJaj7e', 'UmVkRmV2ZXIxMjMk', '2022-08-23 11:55:30', '103.183.229.183', NULL, '2022-08-23 13:21:22', '2022-08-23 13:25:30'),
(32, 'Pranesh Vartak', 'pranesh.vartak@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', 'CS', 'Unlock', 'Normal', NULL, '$2y$10$3ozfFPfmIsH0esLXEpByNOJzRQ3d6uaR1.VqHC9Z9nzIwR2kM/2py', 'QWRtaW5AMTIz', '2022-09-30 12:18:40', '165.225.106.202', NULL, '2022-08-29 11:48:55', '2022-09-30 13:48:40'),
(33, 'radhakrishnan.m@dhl.com', 'radhakrishnan.m@dhl.com', 'DHL Express India Pvt Ltd', 'Mumbai', 'Maharashtra', '601, 6TH FLOOR, SILVER UTOPIA', 'Unlock', 'Normal', NULL, '$2y$10$TX2gKnLV4clnhLRO8hX.N.uS2VzKTGFvcqxqKVEjTf.sydI1vRMkq', 'V29ybGRAMTIz', '2023-05-03 15:21:06', '136.226.254.85', NULL, '2022-12-26 21:44:30', '2023-05-03 16:51:06'),
(34, 'Test1', 'test@viaante.com', 'Viaante', NULL, NULL, NULL, 'Unlock', 'Normal', NULL, '$2y$10$60nwN9BFB/w71zfMcYqYF.wULPwNG.8GspU/yOOjZvJQGAByOXrPq', 'VGVzdDEyMzQk', NULL, NULL, NULL, '2023-03-10 23:01:02', '2023-03-10 23:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_info`
--

CREATE TABLE `user_login_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login_info`
--

INSERT INTO `user_login_info` (`id`, `user_id`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08-18 17:07:13', '::1', '2023-08-18 11:37:13', '2023-08-18 11:37:13'),
(2, 1, '2023-08-21 10:54:33', '::1', '2023-08-21 05:24:33', '2023-08-21 05:24:33'),
(3, 1, '2023-08-21 11:42:00', '::1', '2023-08-21 06:12:00', '2023-08-21 06:12:00'),
(4, 1, '2023-08-21 12:08:18', '::1', '2023-08-21 06:38:18', '2023-08-21 06:38:18'),
(5, 1, '2023-08-21 12:14:48', '::1', '2023-08-21 06:44:48', '2023-08-21 06:44:48'),
(6, 1, '2023-08-22 12:26:34', '::1', '2023-08-22 06:56:34', '2023-08-22 06:56:34'),
(7, 1, '2023-08-22 12:26:52', '::1', '2023-08-22 06:56:52', '2023-08-22 06:56:52'),
(8, 1, '2023-08-24 10:57:14', '::1', '2023-08-24 05:27:14', '2023-08-24 05:27:14'),
(9, 1, '2023-08-25 11:24:50', '::1', '2023-08-25 05:54:50', '2023-08-25 05:54:50'),
(10, 1, '2023-08-28 11:41:59', '::1', '2023-08-28 06:11:59', '2023-08-28 06:11:59'),
(11, 1, '2023-08-28 17:25:32', '::1', '2023-08-28 11:55:32', '2023-08-28 11:55:32'),
(12, 1, '2023-08-29 15:55:05', '::1', '2023-08-29 10:25:05', '2023-08-29 10:25:05'),
(13, 1, '2023-08-30 12:43:04', '::1', '2023-08-30 07:13:04', '2023-08-30 07:13:04'),
(14, 1, '2023-08-30 13:05:11', '::1', '2023-08-30 07:35:11', '2023-08-30 07:35:11'),
(15, 1, '2023-08-30 17:36:19', '::1', '2023-08-30 12:06:19', '2023-08-30 12:06:19'),
(16, 1, '2023-08-31 15:48:08', '::1', '2023-08-31 10:18:08', '2023-08-31 10:18:08'),
(17, 1, '2023-09-01 12:29:35', '::1', '2023-09-01 06:59:35', '2023-09-01 06:59:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_call_logs`
--
ALTER TABLE `api_call_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `medguide`
--
ALTER TABLE `medguide`
  ADD PRIMARY KEY (`CompanyURL`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_keyword`
--
ALTER TABLE `search_keyword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_keyword_product`
--
ALTER TABLE `search_keyword_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_login_info`
--
ALTER TABLE `user_login_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_login_info`
--
ALTER TABLE `user_login_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
