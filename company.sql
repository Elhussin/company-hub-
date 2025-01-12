-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 08:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `type`, `code`, `company_id`) VALUES
(1, 'Ziess', 'lens', '7-lens-Ziess', 7),
(2, 'Ray baa', 'fram', '8-frame-Ray baa', 8),
(3, 'Vouge', 'fram', '8-frame-Vouge', 8),
(4, 'privo', 'lens', '7-lens-privo', 7),
(5, 'abc', 'lens', '7-lens-abc', 7);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `tell` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wep` varchar(255) DEFAULT NULL,
  `cotegray` enum('fram','lens','exa','all') NOT NULL,
  `ROEL` enum('User','Agent','inseranc') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `country`, `tell`, `fax`, `email`, `wep`, `cotegray`, `ROEL`, `created_at`) VALUES
(1, 'ssss', 'Albania', '222', '222dddddd', 'hh@mail.com', 'https://web.whatsapp.com/', 'lens', 'Agent', '2025-01-08 21:35:42'),
(2, 'ssss', 'Albania', '222333', '2223333', 'hh@mail.comaaa', 'https://web.whatsapp.com/', 'lens', 'Agent', '2025-01-08 21:35:48'),
(5, 'ddddd', 'Afghanistan', '111', '111', 'gg@mail.vom', 'http://localhost/COMPANY/index.php?page=add_company', 'lens', 'Agent', '2025-01-08 22:12:36'),
(6, 's', 'Albania', '111', '31', '111@mail.com', 'http://localhost/company/index.php?page=add_company', 'lens', 'Agent', '2025-01-09 05:37:20'),
(7, 'dehlwey', 'Saudi Arabia', '112', '222', '444@mail.com', 'http://localhost/COMPANY/index.php?page=add_company', 'all', 'Agent', '2025-01-09 11:08:34'),
(8, 'medeal est', 'Saudi Arabia', '112', '222', '444@mail.com', 'http://localhost/COMPANY/index.php?page=add_company', 'fram', 'Agent', '2025-01-09 11:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `uploaded_on` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `userid`, `file_name`, `name`, `description`, `uploaded_on`, `status`) VALUES
(7, 1015, 'imges.png', 's', 'ssss', '2025-01-08 15:55:42', 'active'),
(9, 1015, 'info.jpg', 'ggggggg', 'gggg', '2025-01-08 15:58:53', 'active'),
(10, 1015, 'info.jpg', 'ggggggg', 'gggg', '2025-01-08 15:58:55', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `message`, `phone`, `created_at`) VALUES
(1, 'a', 'a', '0540919725', '2025-01-04 11:55:12'),
(2, 'a', 'a', '0540919725', '2025-01-04 11:58:45'),
(3, '1', '1', '0540919725', '2025-01-04 11:59:00'),
(4, '5', '5', '0540919725', '2025-01-04 11:59:25'),
(5, '5', '5', '0540919725', '2025-01-04 12:00:07'),
(6, 'd', 'd', '0540919725', '2025-01-04 12:00:16'),
(7, '1', 'ddddddddd', '0540919725', '2025-01-04 12:00:29'),
(8, '1', 'ddddddddd', '0540919725', '2025-01-04 12:02:43'),
(9, 'ss', '55555555', '0540919725', '2025-01-04 12:05:57'),
(10, 'ss', '55555555', '0540919725', '2025-01-04 12:06:38'),
(11, 'd', 'dddddd', '0540919725', '2025-01-04 12:06:50'),
(12, 'd', '5555', '0540919725', '2025-01-04 12:07:35'),
(13, 'w', 'www', '0540919725', '2025-01-04 12:08:42'),
(14, 'WWWW', 'WWW', '0540919725', '2025-01-06 21:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `prodect`
--

CREATE TABLE `prodect` (
  `id` int(11) NOT NULL,
  `PRODECT` varchar(50) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `cotger` varchar(50) DEFAULT NULL,
  `typelens` varchar(50) DEFAULT NULL,
  `index` varchar(50) DEFAULT NULL,
  `type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`type`)),
  `Special` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `made_year` year(4) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `lens` varchar(50) DEFAULT NULL,
  `arm` varchar(50) DEFAULT NULL,
  `bridg` varchar(50) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `ratel` decimal(10,2) DEFAULT NULL,
  `discon` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `final` decimal(10,2) DEFAULT NULL,
  `datein` date DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `madein` varchar(100) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `collection_gendr` varchar(255) DEFAULT 'All',
  `collection` varchar(255) DEFAULT 'All',
  `optian` varchar(255) DEFAULT 'All'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodect`
--

INSERT INTO `prodect` (`id`, `PRODECT`, `brand_name`, `cotger`, `typelens`, `index`, `type`, `Special`, `model`, `made_year`, `color`, `lens`, `arm`, `bridg`, `cost`, `ratel`, `discon`, `tax`, `final`, `datein`, `count`, `madein`, `descrip`, `brand_id`, `collection_gendr`, `collection`, `optian`) VALUES
(1, 'lens', '', '1', '3', '7', '[\"Color\",\"TRN Brown\",\"TRN Gray\",\"Polarid\"]', '', '1001', '2024', 'clear', '70', '0', '0', 50.00, 150.00, 20.00, 0.00, 150.00, NULL, 1, 'KSA', 'SINGLE VISIAN', 1, NULL, 'last', 'klip_on'),
(3, 'lens', '', '1', '3', '5', '[\"MC\",\"Color\",\"TRN Brown\"]', '', '1003', '2024', 'clear', '70', '0', '0', 50.00, 150.00, 20.00, 0.00, 150.00, NULL, 1, 'KSA', 'SINGLE VISIAN', 1, 'kids', 'last', 'eye_glasses'),
(5, 'lens', '', '1', '3', '5', '[\"MC\",\"Color\",\"Blue Ray\"]', '', '1004', '2024', 'clear', '70', '0', '0', 50.00, 150.00, 20.00, 0.00, 150.00, NULL, 1, 'KSA', 'SINGLE VISIAN', 1, 'All', 'All', 'All'),
(6, 'fram', '', '1', '3', '5', NULL, '', '3029', '2020', 'red', '55', '145', '18', 250.00, 500.00, 20.00, 0.00, 500.00, NULL, 5, 'china', 'Ray bann ', 2, 'men', 'sell', 'sun glasses'),
(12, 'fram', '', '1', '3', '5', NULL, '', '3025', '2024', 'red', '55', '145', '18', 250.00, 500.00, 20.00, 0.00, 500.00, NULL, 5, 'china', 'Ray bann ', 2, 'All', 'All', 'All'),
(13, 'fram', '', '1', '3', '5', NULL, '', '3014', '2025', 'red', '', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '', '', 2, NULL, 'all', 'women'),
(14, 'lens', '', '1', '3', '5', '[\"Blue Ray\",\"Multi Focal\"]', '', '1919', '0000', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '', '', 4, NULL, 'sell', 'eye glasses'),
(15, 'fram', '', '1', '3', '5', NULL, '', '3050', '0000', '', '', '', '', 30.00, 20.00, 11.00, 10.00, 500.00, NULL, 10, '22', '22', 3, 'women', 'sell', 'klip');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `TEXT` text NOT NULL,
  `status` text NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `TEXT`, `status`, `USERID`) VALUES
(9, 'dd', 'yes', 1015),
(46, '233', 'no', 1015),
(48, '111', 'no', 1015),
(49, 'f', 'no', 1015);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `pasword` varchar(255) NOT NULL,
  `tell` varchar(250) NOT NULL,
  `age` varchar(25) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `EmpolyId` int(10) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAME`, `userName`, `pasword`, `tell`, `age`, `gender`, `EmpolyId`, `stat`) VALUES
(8, 'hussain3112', '1111', '', '0', '0', '0', 0, 0),
(14, 'hussain3112', '1243355', '', '0', '0', '0', 0, 0),
(15, 'احمد طه عوض الله', '1243355', '', '0', '0', '0', 0, 0),
(16, 'احمد طه عوض الله', '1111', '', '0', '0', '0', 0, 0),
(17, 'احمد طه عوض الله', '1111', '', '0', '0', '0', 0, 0),
(18, 'احمد طه عوض الله', '1111', '', '0', '0', '0', 0, 0),
(19, 'hussain3112', 'hussain', '568999', '1243355', '20', 'man', 12356, 0),
(20, 'hussain3112', 'hussain', '1235', '1243355', '25', 'man', 12345, 0),
(21, 'hussain3112', 'hussain', '1235', '1243355', '25', 'man', 12345, 0),
(22, 'hussain3112', 'hussain', '12345', '1243355', '123', 'woman', 20, 0),
(23, 'hussain3112', 'hussain', '12345', '1243355', '123', 'woman', 20, 0),
(24, 'hussain3112', 'hussain', '12345', '1243355', '123', 'woman', 20, 0),
(25, 'hussain3112', 'hussain', '12345', '1243355', '123', 'woman', 20, 0),
(26, 'hussain3112', 'hussain', '12345', '1243355', '123', 'woman', 20, 0),
(27, 'hussain3112', 'hussain', '12345', '1243355', '123', 'woman', 20, 0),
(28, 'hussain3112', 'hussain', '12345', '1243355', '123', 'woman', 20, 0),
(29, 'hussain3112', 'hussain', '5550', '1111', '20', 'other', 12223, 1),
(30, 'hussain311211', 'hussain1', '12345', '1243355', '30', 'woman', 2111, 0),
(31, 'احمد طه عوض الله', 'hasin3112@gmail.com', '12345', '1243355', '25', 'woman', 30, 0),
(32, 'hussain3112', 'hasin3112@gmail.com1', '12345', '12433557', '35', 'man', 60, 0),
(33, 'احمد طه عوض الله', 'hasin3112@gmail.com11', '12345', '1243355', '30', 'other', 20111, 0),
(34, 'hussain3112', 'hasin3112@gmail.com3', '12345', '1243355', '25', 'select gender', 330000, 0),
(35, 'احمد طه عوض الله', 'hasin3112@gmail.com33', '12345', '1243355', '30', 'other', 3533, 0),
(36, 'taha awdaala', 'hasin31121@gmail.com', '123456789', '0108704401', '25', 'woman', 2022206131, 0),
(37, 'taha awdaala', 'ha', 'hussain', '1243355', '122222', 'woman', 2147483647, 0),
(38, 'hussain3112', 'hasin3112@gmail2.com', '12345', '1243355', '1111', 'woman', 22222, 0),
(39, 'hussain3112', 'hasin3112@gmail21.com', '12345', '1243355', '1111', 'woman', 22222, 0),
(40, 'hussain3112', 'hasin3112@gmail212.com', '12345', '1243355', '1111', 'woman', 22222, 0),
(41, 'hussain3112', 'hasin3112@gmail212.com', '12345', '1243355', '1111', 'woman', 222222, 0),
(42, 'hussain3112', 'hasin3112@gmail212.com', '12345', '1243355', '1111', 'woman', 2222223, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(12) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `AGE` date NOT NULL,
  `PASSWORD` text NOT NULL,
  `ACTIEV` tinyint(1) NOT NULL,
  `SECUERTY_COD` varchar(255) NOT NULL,
  `ROEL` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `tell` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `EmpolyId` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `wep` varchar(255) NOT NULL,
  `cotegray` varchar(255) NOT NULL,
  `contery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `lastName`, `EMAIL`, `AGE`, `PASSWORD`, `ACTIEV`, `SECUERTY_COD`, `ROEL`, `userName`, `tell`, `gender`, `EmpolyId`, `stat`, `fax`, `wep`, `cotegray`, `contery`) VALUES
(1015, 'Husin1', '', 'hasin3112@gmail.com', '2025-01-01', '8cb2237d0679ca88db6464eac60da96345513964', 1, '', 'ADMIN', 'MEDALL EAST', '0540919725', '', '', '', '0126600148', 'http://localhost/project/company/prodect/newcompany.php', 'fram', 'Saudi Arabia'),
(1021, 'ESSILER', '', 'ESSILER@ESSILER.com', '2025-01-25', '', 1, '', 'Agent', 'ESSILER', '0108704401', '', '', '', '012661164', 'http://ESSILER.com', 'lens', 'Saudi Arabia'),
(1034, 'f', '', 'TAHA2282015@gmail.com', '2025-01-03', '8cb2237d0679ca88db6464eac60da96345513964', 0, 'aa18e243b53f34f8503d399664ca57a2', 'USER', '', '', '', '', '', '', '', '', ''),
(1041, 'G', '', '', '0000-00-00', '6', 0, '', '', 'G', 'G', 'man', '666', '1', '', '', '', ''),
(1042, 'q', '', '', '0000-00-00', '1', 0, '', '', 'qEnter User q Or Emile', 'q', 'woman', '1', '1', '', '', '', ''),
(1043, 'ee', '', '', '0000-00-00', '', 0, '', '', 'ee', 'ee', 'Male', 'ee', '', '', '', '', ''),
(1044, 'q', '', '', '0000-00-00', '', 0, '', '', 'q', 'q', 'Male', 'q', '', '', '', '', ''),
(1045, 'd', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', 'd', 'man', '4', '', '', '', '', ''),
(1046, 'd', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', 'd', 'man', '4', '', '', '', '', ''),
(1047, 'r', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', 'r', 'woman', '3', '', '', '', '', ''),
(1048, 'r', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', 'r', 'woman', '3', '', '', '', '', ''),
(1049, 'e', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', 'e', 'man', '1', '', '', '', '', ''),
(1050, 'e2', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', 'e', 'man', '1', '', '', '', '', ''),
(1051, 'e222', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com2', 'e', 'man', '1', '', '', '', '', ''),
(1052, 'r', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', 'r', 'woman', '33', '', '', '', '', ''),
(1053, '1', '', '', '0000-00-00', '', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'woman', '11', '', '', '', '', ''),
(1054, 'd', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1055, 'd', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1056, 'd', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1057, 'd', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1058, 'd', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1059, 'w', '', '', '0000-00-00', '222', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1060, '2', '', '', '0000-00-00', '2', 0, '', '', '2', '2', 'select gender', '2', '1', '', '', '', ''),
(1061, 's', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'woman', '4', '1', '', '', '', ''),
(1062, 's', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'woman', '4', '1', '', '', '', ''),
(1063, 'ee', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'woman', '4', '1', '', '', '', ''),
(1064, '1', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1065, '1', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '22', '1', '', '', '', ''),
(1066, 's', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', '0540919725', 'man', '3', '1', '', '', '', ''),
(1067, 'ss', '', '', '0000-00-00', '12345', 0, '', '', 'hasin3112@gmail.com', 'ss', 'man', '222', '1', '', '', '', ''),
(1068, 'AYA', '', 'hasin.tah@yahoo.com', '1994-04-26', '8cb2237d0679ca88db6464eac60da96345513964', 0, '302661000f9a9414a785c518fd93ac23', 'USER', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `id` int(11) NOT NULL,
  `imgid` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `imgid`, `title`, `post`, `name`, `created_at`) VALUES
(1, 'img1', 'sssss', 'sssss', 'info.jpg', '2025-01-08 13:34:37'),
(2, 'img2', 'ddd', 'ddddddd', 'imges.png', '2025-01-08 13:37:52'),
(3, 'img1', 'dddddd', 'dddddddddd', 'eyetest_map.jpg', '2025-01-08 13:44:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodect`
--
ALTER TABLE `prodect`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_product` (`PRODECT`,`brand_name`,`model`,`made_year`),
  ADD KEY `fk_brand` (`brand_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`USERID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prodect`
--
ALTER TABLE `prodect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1069;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`ID`);

--
-- Constraints for table `prodect`
--
ALTER TABLE `prodect`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`USERID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
