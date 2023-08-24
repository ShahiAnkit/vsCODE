-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2023 at 11:25 PM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_call_logs`
--

CREATE TABLE `api_call_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_call` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_fields` longtext COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ALT1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `ALT1`) VALUES
(11, 'Acetrophine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(12, 'Alfentanil', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(13, 'Allobarbital', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(14, 'Alphacetylmethadol', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(15, 'Alprazolam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(16, 'Amfepramone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(17, 'Amfetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(18, 'Amineptine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(19, 'Amobarbital', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(20, 'Amphetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(21, 'Anileridine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(22, 'Benzylmorphine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(23, 'Beta-Hydroxy-3-methyl fentanyl', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(24, 'Betaprodine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(25, 'Bromazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(26, 'Brotizolam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(27, 'Buprenorphine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(28, 'Camazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(29, 'Chlordiazepoxide', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(30, 'Clobazam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(31, 'Clonazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(32, 'Clorazepate', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(33, 'Clotiazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(34, 'Codeine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(35, 'Codeinone', '', 'Active', '0000-00-00 00:00:00', NULL, 'Codeine'),
(36, 'Codinovo', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(37, 'Delorazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(38, 'Delta-9-tetrahydro-cannabinl', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(39, 'Dexamfetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(40, 'Dexamphetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(41, 'Dextropropoxyphene', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(42, 'Diazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(43, 'Dicodide', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(44, 'Diconone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(45, 'Diethylpropion', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(46, 'Difenoxin', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(47, 'Dihydrocodeine', '', 'Active', '0000-00-00 00:00:00', NULL, 'Dihydrocodeinone'),
(48, 'Dihydromorphine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(49, 'Dihydroxy', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(50, 'Dilaudide', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(51, 'Dimorphid', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(52, 'Dionine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(53, 'Diphenoxylate', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(54, 'Diphenoxylic Acid', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(55, 'Dipipanone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(56, 'Dronabinol', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(57, 'Estazolam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(58, 'Ethyl Loflazepate', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(59, 'Ethylmorphine', '', 'Active', '0000-00-00 00:00:00', NULL, 'Ethyl morphine'),
(60, 'Fencamfamin', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(61, 'Fenethylline', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(62, 'Fenetylline', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(63, 'Fentanyl', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(64, 'Flurazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(65, 'Fluruitrazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(66, 'Glutethimide', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(67, 'Hybernil', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(68, 'Hycodan', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(69, 'Hydrocodone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(70, 'Hydromorphone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(71, 'Ketamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(72, 'Ketazolam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(73, 'Levamfetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(74, 'Levamfetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(75, 'Loprazolam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(76, 'Lorazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(77, 'Lorazeram', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(78, 'Lormetazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(79, 'Lormetazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(80, 'Mazindol', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(81, 'Medazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(82, 'Meprobamate', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(83, 'Mesocarb', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(84, 'Metamfetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(85, 'Metamfetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(86, 'Methadone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(87, 'Methamphetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(88, 'Methamphetamine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(89, 'Methylphenidate', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(90, 'Midazolam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(91, 'Morphine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(92, 'Multacodin', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(93, 'Nicomorphine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(94, 'Nimetazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(95, 'Nitrazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(96, 'Nomocodeine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(97, 'Novalaudon', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(98, 'Nycodide', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(99, 'Oxazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(100, 'Oxycodone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(101, 'Oxymorphone', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(102, 'Paramorfan', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(103, 'Pemoline', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(104, 'Pentazocine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(105, 'Pentobarbital', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(106, 'Pethidine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(107, 'Phendimetrazine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(108, 'Phenmetrazine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(109, 'Phenobarbital', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(110, 'Phentermine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(111, 'Phocodine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(112, 'Prazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(113, 'Propiram', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(114, 'Racemate', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(115, 'Remifentanil', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(116, 'Secobarbital', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(117, 'Sufentanil', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(118, 'Tetrazepam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(119, 'Tilidine', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(120, 'Tramadol ', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(121, 'Triazolam', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(122, 'Zipeprol', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(123, 'Zolpidem', '', 'Active', '0000-00-00 00:00:00', NULL, NULL),
(124, 'Zolpidem Tartrate', 'Test', 'Active', '2023-03-11 04:56:37', '2023-03-11 04:56:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MedGuide`
--

CREATE TABLE `MedGuide` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAllowed` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Unknown',
  `Remarks` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Manufacturer` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Source` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_keyword`
--

CREATE TABLE `search_keyword` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Lock','Unlock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lock',
  `role_type` enum('Admin','Normal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Normal',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `company_name`, `city`, `state`, `address`, `status`, `role_type`, `email_verified_at`, `password`, `password_value`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Developer', 'developer_test@mailinator.com', 'Test Company One', 'Mumbai', 'Maharashtra', '1', 'Unlock', 'Admin', NULL, '$2y$10$fFleL5bndO9YcIwjqTWZVuX8ivSfr/9yW.yVnyrgYJd3CUYyTX1Nu', 'Qmx1ZVdhdGVyMTIzJA==', '2023-08-18 12:45:05', '152.58.5.204', NULL, '2022-02-05 14:31:33', '2023-08-18 19:45:05'),
(11, 'Developer', 'developer@mailinator.com', 'Web Development', 'Mumbai', 'Maharashtra', '16', 'Unlock', 'Normal', NULL, '$2y$10$zGgC9WxXVnlvMXcytnxZV.N1rAjjKj7KJRIjse/haqdq65EBOeJz6', 'QWRtaW5AMTIz', '2023-03-10 21:28:30', '103.183.229.36', NULL, '2022-02-11 16:49:59', '2023-03-11 04:28:30'),
(12, 'Test User', 'test@mailinator.com', 'Test Company', 'Mumbai', 'Maharashtra', 'Test address', 'Unlock', 'Admin', NULL, '$2y$10$WAYP.xdgeKmzts6UT3rDfe6ZKPHpqoLSeUyiy27RUM0rPtKs1UYmy', 'VXNlckAxMjM=', NULL, NULL, NULL, '2022-02-11 21:44:50', '2022-02-14 00:59:28'),
(13, 'Sameer Shah', 'sameers1979@gmail.com', 'Viaante', 'Mumbai', 'Maharashtra', 'Some place', 'Unlock', 'Normal', NULL, '$2y$10$YIr46YkpZNi.ZE0Afslx9.ie431HEzOzv./RQNDUJ2qclHMS36i7i', 'VGVzdEAxMjM0', '2022-03-31 18:37:18', '103.177.112.29', NULL, '2022-03-30 00:08:50', '2022-04-01 01:37:18'),
(14, 'bhushan', 'bhushan.arute@dhl.com', 'DHL', 'Mumbai', 'Maharashtra', 'Msm', 'Unlock', 'Admin', NULL, '$2y$10$NmpOA4IuIvqXjcyTdrHhLugRLRHfumim6TX.fZRRpYZgWCl/VyEbS', 'UmVkRmV2ZXIxMjMk', NULL, NULL, NULL, '2022-04-11 18:35:36', '2022-08-23 18:47:11'),
(15, 'Ashwini', 'Ashwini.Khot4@dhl.com', 'DHL', 'Mumbai', 'Maharashtra', 'whatever', 'Unlock', 'Admin', NULL, '$2y$10$CT.rPlxjU84fiJczZPwJp.xmwaAQjxt.z0LzLRb360Vp1FWlj0Ofi', 'VGVzdDEyMzQk', '2022-04-14 16:10:28', '165.225.106.54', NULL, '2022-04-11 18:36:11', '2022-04-14 23:10:28'),
(16, 'apibackend', 'apibackend@dhl.com', 'DHL', 'Mumbai', 'Maharashtra', 'India', 'Unlock', 'Normal', NULL, '$2y$10$HaKsQhmVXtnrjN9BxvmwveK9kfqTm2Atgn4IUFZkSIoFg8DhDkkQ6', 'VGVzdDEyMzQk', '2023-08-13 18:35:40', '136.226.254.207', NULL, '2022-04-14 23:14:59', '2023-08-14 01:35:40'),
(18, 'CCJ Store', 'Expressidr3@Dhl.Com', 'DHL Express', 'Calicut', 'Kerala', 'Dhl Express India Pvt Ltd,Shoba Complex,Indira Gandhi Road,', 'Unlock', 'Normal', NULL, '$2y$10$tDEyfmC2RvWYe9dLeSJmR.OCeogX/cz68KWhU3NJMGGTiuKMgZcNa', 'QWRtaW5AMTIz', '2023-08-17 19:54:54', '165.225.120.86', NULL, '2022-05-10 22:29:09', '2023-08-18 02:54:54'),
(19, 'MCR Store', 'Express.Cok@Dhl.Com', 'DHL Express', 'Cochin', 'kerala', 'Dhl Express India Pvt Ltd,Anugraha,Canal Road,', 'Unlock', 'Normal', NULL, '$2y$10$ktBrlU9n4XOAH22sScyBfeCpxoOi8HUUyYFpi5ZDUbwKbrSu0x8De', 'QWRtaW5AMTIz', '2023-08-07 12:37:15', '136.226.254.116', NULL, '2022-05-10 22:35:15', '2023-08-07 19:37:15'),
(20, 'Rakesh', 'Rakeshraj.R@dhl.com', 'DHL Express', NULL, 'Kerala', NULL, 'Unlock', 'Normal', NULL, '$2y$10$i3o/M0hEKT0FNMCf16HzpO1HIKmHp.UrXP8zRxAYtVvGzsQl8j5xG', 'QWRtaW5AMTIz', '2023-08-21 17:09:45', '165.225.120.77', NULL, '2022-05-10 23:01:57', '2023-08-22 00:09:45'),
(21, 'Nibin', 'NibinK.Jockey@dhl.com', 'DHL Express', NULL, 'Kerala', NULL, 'Unlock', 'Normal', NULL, '$2y$10$CrmZM0nrOFVCOKYU9Zj7zOwlpxzeHgJB79VSmsRfw7DcCGC.WgWoq', 'QWRtaW5AMTIz', '2023-08-21 15:32:40', '136.226.254.192', NULL, '2022-05-10 23:02:59', '2023-08-21 22:32:40'),
(22, 'Rajesh.Pillai2@dhl.com', 'Rajesh.Pillai2@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$mJPT48tt.g.M1U3oHpzZ7uk.ffucspyu2onryvY2AfG5E.yv5w5QK', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 22:03:57', '2022-05-23 22:03:57'),
(23, 'Mahesh.Namdar@dhl.com', 'Mahesh.Namdar@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$x127cJf7rT7/Rk2nTtS4l.kH5eCNMofgdwfazKb5xsLzl/w3QUBY6', 'QWRtaW5AMTIz', '2022-11-08 15:09:32', '165.225.106.49', NULL, '2022-05-23 22:10:58', '2022-11-08 22:09:32'),
(24, 'Heman.Saralaya@dhl.com', 'Heman.Saralaya@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$89ojVOXvK3.mHR1F3Dy3TO9DGpNd4iEu1PEF/u1ObHhG9U7lMEy3O', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 22:12:45', '2022-05-23 22:12:45'),
(25, 'Simon.Lewis@dhl.com', 'Simon.Lewis@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$VE.13sBQzBT340K81fsuxukvFMXLefx4l3wp3s8SCVuTmSIBpNrgO', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 22:14:41', '2022-05-23 22:14:41'),
(26, 'Karan.Khurana@dhl.com', 'Karan.Khurana@dhl.com', 'DHL Express', 'Ahmedabad', 'Gujarat', NULL, 'Unlock', 'Normal', NULL, '$2y$10$Ua94eYvL5qJXAaO6WCLsO.rooZMtTOysWxpAsFDl3kSSIALo9IteG', 'QWRtaW5AMTIz', '2023-08-18 13:10:57', '136.226.254.185', NULL, '2022-05-23 22:15:56', '2023-08-18 20:10:57'),
(27, 'dhananjay.jadeja@dhl.com', 'dhananjay.jadeja@dhl.com', 'DHL Express', 'Ahmedabad', 'Gujarat', NULL, 'Unlock', 'Normal', NULL, '$2y$10$WNPHQws4BT5Bj64A.lRWUuxtsYfCgAPOSup2d7pnxFEU8Hiuv6mki', 'QWRtaW5AMTIz', '2022-07-18 15:15:43', '165.225.106.65', NULL, '2022-05-23 22:16:57', '2022-07-18 22:15:43'),
(28, 'Sandhir.Srivastava@dhl.com', 'Sandhir.Srivastava@dhl.com', 'DHL Express', 'Ahmedabad', 'Gujarat', NULL, 'Unlock', 'Normal', NULL, '$2y$10$hkUhYdeu2T3buhrODVo1Leg756elgflHp0t4IJ/EaXtzyVSe4Wziy', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 22:18:56', '2022-05-23 22:18:56'),
(29, 'Vijay.Wakte@dhl.com', 'Vijay.Wakte@dhl.com', 'DHL Express', 'Pune', 'Maharashtra', NULL, 'Unlock', 'Normal', NULL, '$2y$10$vhpWDoBwJvMB6t12sHkJdeKztCoSsLAT8igdgrSox5rTYGGykgTZy', 'QWRtaW5AMTIz', '2023-07-13 13:33:32', '136.226.254.95', NULL, '2022-05-23 22:21:05', '2023-07-13 20:33:32'),
(30, 'jagdish.gupta@dhl.com', 'jagdish.gupta@dhl.com', 'DHL Express', 'Pune', 'Maharashtra', 'Next to Icon Plaza Hall', 'Unlock', 'Normal', NULL, '$2y$10$26ZNER/C9Aty2Vk0FGntI.JxNq.oqAhUCj7cBm79E1hKAbmgYgNHG', 'QWRtaW5AMTIz', NULL, NULL, NULL, '2022-05-23 22:23:05', '2022-05-23 22:23:05'),
(31, 'sameershah', 'sameer.shah@viaante.com', 'Viaante', 'Mumbai', NULL, NULL, 'Unlock', 'Normal', NULL, '$2y$10$J/u/SUp6LXf1NhPSCRao9OsJMRB7lMhXBFw9sYHPeGaBuzvtJaj7e', 'UmVkRmV2ZXIxMjMk', '2022-08-23 11:55:30', '103.183.229.183', NULL, '2022-08-23 18:51:22', '2022-08-23 18:55:30'),
(32, 'Pranesh Vartak', 'pranesh.vartak@dhl.com', 'DHL Express', 'Mumbai', 'Maharashtra', 'CS', 'Unlock', 'Normal', NULL, '$2y$10$3ozfFPfmIsH0esLXEpByNOJzRQ3d6uaR1.VqHC9Z9nzIwR2kM/2py', 'QWRtaW5AMTIz', '2022-09-30 12:18:40', '165.225.106.202', NULL, '2022-08-29 17:18:55', '2022-09-30 19:18:40'),
(33, 'radhakrishnan.m@dhl.com', 'radhakrishnan.m@dhl.com', 'DHL Express India Pvt Ltd', 'Mumbai', 'Maharashtra', '601, 6TH FLOOR, SILVER UTOPIA', 'Unlock', 'Normal', NULL, '$2y$10$TX2gKnLV4clnhLRO8hX.N.uS2VzKTGFvcqxqKVEjTf.sydI1vRMkq', 'V29ybGRAMTIz', '2023-05-03 15:21:06', '136.226.254.85', NULL, '2022-12-27 03:14:30', '2023-05-03 22:21:06'),
(34, 'Test1', 'test@viaante.com', 'Viaante', NULL, NULL, NULL, 'Unlock', 'Normal', NULL, '$2y$10$60nwN9BFB/w71zfMcYqYF.wULPwNG.8GspU/yOOjZvJQGAByOXrPq', 'VGVzdDEyMzQk', NULL, NULL, NULL, '2023-03-11 04:31:02', '2023-03-11 04:31:02'),
(35, 'test123', 'test123@viaante.com', 'viaante', NULL, NULL, NULL, 'Unlock', 'Normal', NULL, '$2y$10$TH7as6jiUintgf7B3e2hHO392SHoPF1/fU6tZABY5ZX8f1XGIPoUS', 'VGVzdDEyMzQk', NULL, NULL, NULL, '2023-03-11 04:54:07', '2023-03-11 04:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_info`
--

CREATE TABLE `user_login_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `MedGuide`
--
ALTER TABLE `MedGuide`
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
-- AUTO_INCREMENT for table `api_call_logs`
--
ALTER TABLE `api_call_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `MedGuide`
--
ALTER TABLE `MedGuide`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_keyword`
--
ALTER TABLE `search_keyword`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_keyword_product`
--
ALTER TABLE `search_keyword_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_login_info`
--
ALTER TABLE `user_login_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
