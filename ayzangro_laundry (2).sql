-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2018 at 12:49 PM
-- Server version: 5.6.41
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayzangro_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_master`
--

CREATE TABLE `address_master` (
  `uniqueId` bigint(10) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `objectType` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyAddress1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyAddress2` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryId` int(5) DEFAULT NULL,
  `countryName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isPickup` int(1) NOT NULL DEFAULT '0',
  `isDelivery` int(1) NOT NULL DEFAULT '0',
  `isPermanent` int(1) NOT NULL DEFAULT '0',
  `addressType` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingType` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingName` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingFloor` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isLift` int(2) NOT NULL DEFAULT '0',
  `zoneId` int(5) DEFAULT NULL,
  `latitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_master`
--

INSERT INTO `address_master` (`uniqueId`, `objectId`, `objectType`, `companyAddress1`, `companyAddress2`, `state`, `city`, `pincode`, `countryId`, `countryName`, `isPickup`, `isDelivery`, `isPermanent`, `addressType`, `buildingType`, `buildingName`, `buildingFloor`, `buildingNumber`, `isLift`, `zoneId`, `latitude`, `longitude`, `createdOn`, `updatedOn`) VALUES
(1, 1, 'user', 'h.no 1094A', 'haryana', 'haryana', 'hisar', '125001', NULL, '', 0, 0, 0, 'home', 'flat', 'patel nagar', '2', '1094', 1, NULL, '', '', 1530254316, NULL),
(3, 31, 'driver', 'J-9 A Laxmi Nagar', NULL, 'Delhi', 'New Delhi', '110096', NULL, 'India', 0, 0, 0, 'driver', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1530690865, NULL),
(4, 32, 'driver', 'J-9 A Laxmi Nagar', NULL, 'Delhi', 'New Delhi', '110096', NULL, 'India', 0, 0, 0, 'driver', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1530691007, NULL),
(5, 2, 'user', 'v3s mall', 'gali no3', 'Delhi', 'delhi', '110092', NULL, '', 0, 0, 0, 'home', '', '12', '2', '', 0, NULL, '', '', 1530944485, NULL),
(8, 3, 'user', '82 Rajaram Society Near Shyam Lawn', '', 'Maharashtra', 'Nagpur', '440013', NULL, 'india', 0, 0, 0, 'office', 'flat', '82 Rajaram Society Near Shyam Lawn', '5', '504', 1, NULL, '', '', 1535629925, NULL),
(9, 4, 'user', '', '', '', '', '', NULL, 'India', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1537161718, NULL),
(10, 5, 'user', '1094A', 'lajpat nagar', 'haryana', 'delhi', '', NULL, 'India', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1537167950, NULL),
(11, 6, 'user', '', '', '', '', '', NULL, 'India', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1537168065, NULL),
(14, 7, 'user', '1094', 'lajpat nagar', 'haryana', 'delhi', '125001', NULL, '', 0, 0, 0, 'home', '', '', '', '', 0, NULL, '', '', 1537172188, NULL),
(16, 65, 'corp', 'h.no 22a', 'lajpat nagar', 'delhi', 'delhi', '110024', NULL, '', 0, 0, 0, 'other', 'flat', '1st floor', '', '22a', 0, NULL, '', '', 1537182712, NULL),
(17, 3, 'user', '82 Rajaram Society Near Shyam Lawn', 'F/4 Bazila Appartment Nagpur Nagpur', 'Maharashtra', 'Nagpur', '440013', NULL, '', 0, 0, 0, 'home', 'tower', 'Sajeda Rijwan Qureshi Choudhari Layout,, F/4 Bazila Appartment Nagpur Nagpur', '10', '504', 1, NULL, '', '', 1537441579, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jattin', 'jarora1994@gmail.com', '$2y$10$3hyT52ZJ241e.LJXvaVV6ut86G.PKquzzPwXTzGNZyCqSBP/BC.nS', 'HUluRHpGnfdYKkKq7O3KYr5A41yGnzV2YrzX9k6sefUUNtOu6kN4TgBnxOgU', '2018-04-23 02:29:13', '2018-06-21 16:16:12'),
(4, 'gaurav', 'gaurav@gmail.com', '$2y$10$TKaQ5jc/sniOPVAGpO6gf.38TiDw./xtqb8FVnPe.82qK.IX5QaUW', 'bCwm0wMJIlWrKTpCEPiLq7FO83Y3D8jvSEdejlGylBW6JF24vodqGKbWN1Yd', '2018-05-05 12:35:22', '2018-05-05 12:35:22'),
(5, 'shoeb', 'shoeb@gmail.com', '$2y$10$W20TD5iqhQIuihcbqwaWFe/lgGkq.mKFYiMCJr0NM4QN3KjqbwHw.', 'p4HpDXBWuEGAehequmforzaueKSdUGM6jmbvhyzlR13TrE7ucWnAxd70DHCY', '2018-05-14 11:23:59', '2018-05-14 11:23:59'),
(6, 'admin', 'admin@gmail.com', '$2y$10$oYBIchyb6.gYX3Eia0r0e.oNeqG47ax19mziTzywdAbIw9WI7h9..', 't7AMNzXdScPxNk0FpEEwQSRzw6b0awV8pONup82n82sRWxjDDoHIq7WMvovZ', '2018-06-28 01:14:55', '2018-06-28 01:14:55'),
(7, 'nitin', 'nitin@gmail.com', '$2y$10$RgGujVgriE3zXh6qKGPKgO6OS6jY9uyvvYmxNEh7yxwdyakaXEgV2', NULL, '2018-06-28 18:53:39', '2018-06-28 18:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `secretKey` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apiToken` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `expiryDatetime` timestamp NULL DEFAULT NULL,
  `deviceId` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(2) DEFAULT '0',
  `isDeleted` int(2) NOT NULL DEFAULT '0',
  `createdDateTime` timestamp NULL DEFAULT NULL,
  `updatedDateTime` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api_users`
--

INSERT INTO `api_users` (`id`, `userId`, `userType`, `secretKey`, `apiToken`, `expiryDatetime`, `deviceId`, `active`, `isDeleted`, `createdDateTime`, `updatedDateTime`) VALUES
(1, 115, 'user', 'fqe1g3ra51', '$2y$10$tt70739UNXaXrZpI4gF1YOi2EbXtY8NJvHfIwFOpp9R5nBabAMT82', NULL, '', 0, 0, NULL, NULL),
(2, 115, 'user', 'twyDlhrQRh', '$2y$10$9GupZhggiSddL82MQwuB2u2lRmoeAadI/ovZGWib/MYAIQTItu8Zy', NULL, '', 0, 0, NULL, NULL),
(3, 49, 'corp', 'BLcppgUPlM', '$2y$10$Usz3rYbTQ291sHs4HMbXcuq5XkUz2aozqxpLEqYfgGIh.Vy82ZWIS', NULL, '', 0, 0, NULL, NULL),
(4, 115, 'user', '66rQWLgyNj', '$2y$10$MYh4/8huSIXQCH1yxbr.a.GOHkRrCR/AvXr6WOevc1tcTGw6ajo4i', NULL, '', 0, 0, NULL, NULL),
(5, 93, 'user', '8nANfmLq1j', '$2y$10$SioKUxz/w6MBKmyXfVNJYuAPKfrO5kt71nw2kBPXnlHdJcRaJmjEu', NULL, '', 0, 0, NULL, NULL),
(6, 115, 'user', '4AS5aTedFe', '$2y$10$XX7zKsEQp.USD4I5ytcL6ersno8X7SfgDm3hkKVijjI5IlkP6wsae', NULL, '', 0, 0, NULL, NULL),
(7, 115, 'user', 'TyUaCLrto1', '$2y$10$cV4J5T/LmYcyocgwCSFQBOg9ecukUf/WAjgbELOR/n7HJKJt.hmJ6', NULL, '', 0, 0, NULL, NULL),
(8, 115, 'user', 'dtrX6LjU6e', '$2y$10$8NhCryeLLV9wBliysX8YceeOh2fGe/Az4neeM.6Da.rsZTarGYl5m', NULL, '', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_ details`
--

CREATE TABLE `bank_ details` (
  `uniqueId` int(10) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `objectType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branchName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `createdBy` bigint(20) DEFAULT NULL,
  `modifiedOn` int(2) DEFAULT NULL,
  `modifiedBy` bigint(20) DEFAULT NULL,
  `beneficiary` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelledCheque` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branchId` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `description`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Our mission is to enable you to live life hassle free!', 'On demand dry cleaning and laundry services at your door step', '29091slider.jpg', '2018-04-30 08:58:08', '2018-05-01 12:09:14'),
(5, 'Spend time with your family and leave your laundry worries for LAUNDER SERVICES', 'There\'s always a reason to keep smiling', '939650Depositphotos_2464753_xl-2015.jpg', '2018-04-30 09:35:10', '2018-07-21 13:36:29'),
(8, 'Clothes That Make You Feel Confident.', 'Feel Different', '478885slider2.jpg', '2018-05-01 12:11:16', '2018-07-19 20:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `description`, `heading`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor gravida nisl, accumsan viverra sem porta ac. Duis fermentum convallis leo, quis accumsan dolor consequat non.', 'We are on mobile too!', '584933app.png', '2018-05-02 06:53:32', '2018-05-04 05:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `categoryId` bigint(10) NOT NULL,
  `serviceId` int(5) DEFAULT NULL,
  `categoryName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `categorySlug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentCategoryId` bigint(10) DEFAULT NULL,
  `categoryPriority` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`categoryId`, `serviceId`, `categoryName`, `categorySlug`, `parentCategoryId`, `categoryPriority`) VALUES
(1, NULL, 'Men', 'Men', NULL, 1),
(2, NULL, 'Women', 'women', NULL, 1),
(3, NULL, 'Household', 'Household', NULL, 1),
(8, NULL, 'Other', 'Other', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_master`
--

CREATE TABLE `cms_master` (
  `uniqueId` int(5) NOT NULL,
  `cmsLabel` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmsType` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmsTitle` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmsDescription` text COLLATE utf8mb4_unicode_ci,
  `faqSlug` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `iframe` text NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `data`, `email`, `iframe`, `created_at`, `updated_at`) VALUES
(16, '{\"Hindi\":\"0000000000\",\"english\":\"9999999999\"}', 'info@launderservices.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.7325776741404!2d77.25970131560638!3d28.577791982439308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3a1b8d5f223%3A0xefce3ccee85618c4!2sMuser+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1526275704863\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-05-01 10:19:13', '2018-05-14 05:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_user_master`
--

CREATE TABLE `corporate_user_master` (
  `corpCustId` bigint(20) NOT NULL,
  `corpLsCustId` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporationName` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concernPerson` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concernPersonEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerPersonMobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corpPassword` text COLLATE utf8mb4_unicode_ci,
  `corpoarateEmail` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corpCustStatus` int(1) NOT NULL DEFAULT '0',
  `isMobileVerified` int(1) NOT NULL DEFAULT '0',
  `isEmailVerified` int(1) NOT NULL DEFAULT '0',
  `taxRegNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vatRegNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businessCategory` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vatBusinessCategory` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `dateId` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authUserId` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialImage` text COLLATE utf8mb4_unicode_ci,
  `userType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'corp',
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referralCode` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `referredBy` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corporate_user_master`
--

INSERT INTO `corporate_user_master` (`corpCustId`, `corpLsCustId`, `corporationName`, `concernPerson`, `concernPersonEmail`, `concerPersonMobile`, `corpPassword`, `corpoarateEmail`, `corpCustStatus`, `isMobileVerified`, `isEmailVerified`, `taxRegNumber`, `vatRegNumber`, `businessCategory`, `vatBusinessCategory`, `url`, `createdOn`, `updatedOn`, `dateId`, `authUserId`, `auth`, `authId`, `socialImage`, `userType`, `sessionToken`, `remember_token`, `web_player_id`, `referralCode`, `points`, `referredBy`) VALUES
(2, 'C1522215356', 'Testing Corp.', 'First', 'ui@test.com', '9868772915', '$2y$10$WkVO6xKUwNvUgjFAz1fVdu3Facrr4BVY3uhh.Tw3rrQyYu9h53g3u', 'hello@testing.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522215356, 1522241584, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, NULL, NULL, 0, NULL),
(3, 'C1522241672', 'Anupam group.co.', 'AnupamSingh', 'anupam@anu.com', '8595963250', '$2y$10$IQikZimkFPmVMxE6rBxYc.jx9no4y5j6lhPzQmJ1oVR8WIi3Zlm7K', 'testanupam.co.in', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522241672, 1522241699, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, NULL, NULL, 0, NULL),
(4, 'C1522314939', 'Tesla', 'Alam', 'test@tesla.com', '8447764785', '$2y$10$8k.hUhFbl8SAyhYyjYVjMOIcxVbaY/K7XT0wu6Cx0B/1intmEQ6sC', 'hello@tesla.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522314939, 1522315950, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, NULL, NULL, 0, NULL),
(5, 'C1522315997', 'Tesla', 'Alam', 'alam@test.com', '8447764785', '$2y$10$gCKk89h0l9OouqJpEmTCE.rt/K2BLleZiDdD.alxGDk8A7j7vDAgy', 'hwll@tesla.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522315997, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', 'N5tL7hQvbQO7AVZZdc0Ryg3pQTOM1E6NVB7wqTZX', NULL, NULL, NULL, 0, NULL),
(6, 'C1522383729', 'Gimla', 'Asdf', 'shoeb@muser.co.in', '9897948452', '$2y$10$16FzlQAHYdSBiGSO..2dPO07kL076/ytbZ9E/DTsIEfn5aKM278Ha', 'shoeb@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522383729, 1522403963, NULL, NULL, 'facebook', 'fb_1251', NULL, 'corp', 'cf4N8MpQER7QfMKvqFBlAlqwytQ4EbUKxXAGN51b', NULL, NULL, NULL, 0, NULL),
(7, 'C1522413295', 'Anonymous Name', NULL, NULL, '', NULL, 'alshoeb35@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522413295, NULL, NULL, NULL, 'google', 'ggle_260719890', NULL, 'corp', 'ogYIBDKVkUvmBIvYScOPv1PXVNgDAaV1lOi9p8zy', NULL, NULL, NULL, 0, NULL),
(8, 'C1522744462', 'Tesila', 'Abdul', 'abdul@gmail.com', '9897948452', '$2y$10$ZaVYQX8QdinoKkD6L7hZPuHf8VgyllmjiuQQU9fXEnP49ThGuS/Vi', 'tesilacomp@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1522744462, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, NULL, NULL, 0, NULL),
(10, 'C1523594234', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$UdiqBlwAb3OE0L5CA2rb9O5eqimLnee5p4fUo62BoHQkK81sKHa9q', 'sales@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1523594234, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, NULL, NULL, 0, NULL),
(11, 'C1524478561', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$L3uvw3S5HTV9/X2va4QF9.jri5rEnCG239SCqdooP.M.aKOiB.biG', 'jar12ora@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524478561, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, 'DPZXYjptbGdEsitduydINZpK5jSgvQ2fcMup4ZsQk303Db0d5uJ0IGYR5Vt4', NULL, NULL, 0, NULL),
(12, 'C1524478576', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$Cifdi78tTxxB7ue/gYdhzuj0qvFKp2hGO6honGUPJCfjJgXCkKhNe', 'jarora@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524478576, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, 'CABYawMp5T8He9YzdAsPk3TWjmOX7iX3pS8G1Cgg3IDKSEeIhYMwWzn1LuNB', 'd9d23e52-b59d-4898-9997-1afaf17956a9', NULL, 0, NULL),
(13, 'C1524571455', 'Muser Pvt. Ltd.', 'Siddhartha', 'siddhartha@muser.co.in', '8595698545', '$2y$10$2z6utmam8LRos74YnVaqSeB3LM3.Dh6Vux6BCfo/RgnB5KdMVCOSK', 'sales1@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1524571455, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, NULL, NULL, 0, NULL),
(29, 'C1525189664', 'Robin yadav', NULL, NULL, '', NULL, 'robin.delainetech@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1525189664, NULL, NULL, NULL, 'facebook', '106554283073062284491', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'corp', 'w7K7GeRr9WPxmrFiJYtGxm4TpYNAuXoPtxJQd2w5', NULL, NULL, NULL, 0, NULL),
(30, 'C1525189726', 'Robin Yadav', NULL, NULL, '', NULL, 'robinydv007@yahoo.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1525189726, NULL, NULL, NULL, 'facebook', '1580422638722929', 'https://graph.facebook.com/v2.10/1580422638722929/picture?width=1920', 'corp', 'JcdtoOg0xLVINnMiBJ3tQqF6PIYgwTO2yPPf5c3A', 'VZs0Jqtp5GyDpQJgIdWFyTDuXSgtqiVaSCMUHZAc7At91TdEapD8Yrtz9qa4', NULL, NULL, 0, NULL),
(31, 'C1525240191', 'Gaurav Sharma', NULL, NULL, '8802998211', NULL, 'gauravsharma8813@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1525240191, NULL, NULL, NULL, 'facebook', '113098797231766027483', 'https://lh6.googleusercontent.com/-nHvyKEjrhhI/AAAAAAAAAAI/AAAAAAAAD00/bXx_r4g_kzo/photo.jpg', 'corp', 'Vw3AUvNoJ97PVCuyixxRdYSuAZ4N10nzcdFo6NYL', 'ErCh2zSEhmlVBQr7KqukkMwJgajlIRLGeMoIxx45TTzphqdJ9I9SE2sXmGoF', NULL, NULL, 0, NULL),
(49, 'C1526637303', 'Shahi', 'Shoeb Alam', 'alshoeb24@gmail.com', '8989595686', '$2y$10$doYByqcCAE0O143sfuWkz.WGxilHMVSpWRc6AzsiKZbH/9b7/fM5W', 'alshoeb@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1526637303, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, 'E04o03YVhcSSxFZhBuzwZpPPUaOmGQKz0fJNrx7UXmym1FPsUmRX3loDXoOt', '11847797-5770-4577-86f0-0e9a0e919d31', 'JQMFCnVv', 0, NULL),
(50, 'C1526637338', 'Shoeb Alam', 'Shoeb Alam', NULL, '8447764785', NULL, 'ashoeb20@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1526637338, NULL, NULL, NULL, 'facebook', '114135516545740900560', 'https://lh4.googleusercontent.com/-GZtcocAay8w/AAAAAAAAAAI/AAAAAAAAAEY/-0umlSKdyEk/photo.jpg', 'corp', 'ZS19wVrkMPwEyYruF71Q4W2fTJsbJccJ5eSBakVW', 'mTnV2NFkIDft6Z1LVFLcrUPDzcAIVWk7EnKWgArDyWLMIZlr2bae9hpvMHvp', '11847797-5770-4577-86f0-0e9a0e919d31', 'jlOaUPWR', 0, NULL),
(53, 'C1527247945', 'Muser', 'Rajesh Sharma', 'rajesh@muser.co.in', '9897987898', '$2y$10$PYpKZ63QCBKrjmF7pEaeJ.w6KESGW.K7iMpatq.U7ublg8pCeBmUa', 'hello@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1527247946, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, '7mq1JAljTkCGdGEk2fmZCjT9sCcUHko7EdWxendGTbvAzQ0JmymUB2OUpLKw', '11847797-5770-4577-86f0-0e9a0e919d31', 'dE@n25Ri', 0, NULL),
(54, 'C1527248805', 'Muser India Pvt Ltd', 'Aanand Kumar', 'hr@muser.co.in', '9999999999', '$2y$10$9cY.E.f/HrZ2Vg9Dh7390etgjo1opAb.0tY1MDSyOUR60Gz200706', 'anand@muser.co.in', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1527248805, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, 'U09mvuvTGY9lSd9CqoMFyFbYB9SDnKHp20uKF8cSDVGj6DmwqdDN8SitrnK3', '99b6c3ef-f038-438d-b31d-e7b8c2199f0f', '6eoLkTZ2', 0, NULL),
(55, 'C1527249252', 'Muser India Pvt Ltd', 'Anish Tiwari', 'anish@muser.co.in', '4578945464', '$2y$10$Fy.BUmJnAkFiNZgg9Mz9r.OvmdjMtTlXEFjYA.mTLUZjXgZ2lDDLy', 'hr@muser.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1527249253, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, 'SpZZbI5uslw0Ap3587uhnLv8n1U5C1MSmWjwTF1u5J4MiLD86dtROVHwfpTK', '99b6c3ef-f038-438d-b31d-e7b8c2199f0f', 'jN7*nm5C', 0, NULL),
(56, 'C1527249586', 'Chetu Pvt Ltd', 'Anish Tiwari', 'anish@chetu.com', '7845784578', '$2y$10$r95uoK1CvsXexCbsIFAC/OGJJ5T0cHBrB44SldI43kZ8v.at.wgpm', 'hr@chetu.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1527249587, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, 'XPnFuwDGSSpD2DHlygk7Q3Ag9bdgYPWZ59INERfv3gJlaJasZrzLGvP7lKj2', '99b6c3ef-f038-438d-b31d-e7b8c2199f0f', 'QGv4&A57', 0, NULL),
(63, 'C1529672171', 'Muser', 'Alam Bhai', 'hello@tester.com', '8447764786', '$2y$10$7OMLhl5PullAA4bssG8Vv.ZF5eQzF4Y2WPg3mYK.2ht0YcnL/71iu', 'alshoeb30@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1529672171, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, '', '9gV&hcAq', 0, NULL),
(65, 'C1529897819', 'Jatin Arora', 'Jatin Arora', NULL, '', NULL, 'jarora1994@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1529897819, NULL, NULL, NULL, 'google', '114743041766528869483', 'https://lh5.googleusercontent.com/-exXXoayUY3U/AAAAAAAAAAI/AAAAAAAAAqU/KeB6_jUhiPA/photo.jpg', 'corp', 'jCWz46WFfpYwRiw6jdX1GrgcToz1S19cE5MJcIos', '719g7FFAwRHtLYLptB0i5a4buv9SB49TCfei57BMV8kZ0VqbBLAbqL2q7kkp', NULL, 'MvkYlHAK', 100, NULL),
(74, 'C1529907107', 'Testrefer', 'refers', 'testr@gmail.com', '8989896985', '$2y$10$uCHqAjxJMly615nruNK6/.dcdPahwWxz/zjrxDh7W9rU.HoM2xqyG', 'testr@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1529907107, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, '', 'p8Ti^95G', 2565, NULL),
(75, 'C1530014200', 'muser pvt. ltd.', 'jattin', 'jarora1994@gmail.com', '07289839897', '$2y$10$ABJQW10/qeF2W27KpIS.4.WYZjgSz6RGLVT8ta3z8RhZAAugl44US', 'jarora1re994@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1530014200, NULL, NULL, NULL, NULL, NULL, NULL, 'corp', NULL, NULL, '', 'W1JyGaoP', 2565, NULL),
(76, 'C1532168694', 'ER Gaurav Arora', 'ER Gaurav Arora', NULL, '', NULL, 'garora211992@gmail.com', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1532168694, NULL, NULL, NULL, 'facebook', '1755870407832987', 'https://graph.facebook.com/v2.10/1755870407832987/picture?width=1920', 'corp', 'LSAv6bUiH5MxAsxULASrT8IDac7M2RFNKgjQre89', 'qTKCf6A9Uk8aLxeKMa9yOTTr83PtqjMeK3QIRF2NuSys2W7axrIcYGFqcOyk', '', '&D4vGfjb', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corp_user_details`
--

CREATE TABLE `corp_user_details` (
  `uniqueId` bigint(20) NOT NULL,
  `corpCustId` bigint(20) NOT NULL,
  `appVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmUpdatedAt` int(2) DEFAULT NULL,
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceToken` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceTokenUpdatedAt` int(2) DEFAULT NULL,
  `iosAppVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(4,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `referral` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corp_user_details`
--

INSERT INTO `corp_user_details` (`uniqueId`, `corpCustId`, `appVersion`, `gcmId`, `gcmUpdatedAt`, `sessionToken`, `deviceToken`, `deviceTokenUpdatedAt`, `iosAppVersion`, `rating`, `remarks`, `referral`, `createdOn`, `updatedOn`, `platform`, `created_at`, `updated_at`) VALUES
(1, 4, '1.01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 5, '1.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 6, '1.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 8, '1.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 10, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 11, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 12, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 13, '1.0.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 35, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 36, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 37, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 38, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 39, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 40, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 41, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 42, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 43, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 49, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 51, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 52, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 53, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 54, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 55, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 56, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 57, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 58, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 59, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 60, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 61, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 62, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 63, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 66, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 67, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 68, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 69, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 70, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 71, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 72, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 73, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 74, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 75, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `countryId` int(5) NOT NULL,
  `countryName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryIsoCode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryIsdCode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `uniqueId` int(10) NOT NULL,
  `couponCode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeType` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validFrom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validUpto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couponDays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couponCategory` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minOrderValue` double(7,2) DEFAULT '0.00',
  `useLimit` int(2) NOT NULL DEFAULT '0',
  `discVal` double(7,2) DEFAULT '0.00',
  `discountPercent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `created_at` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`uniqueId`, `couponCode`, `codeType`, `validFrom`, `validUpto`, `couponDays`, `couponCategory`, `minOrderValue`, `useLimit`, `discVal`, `discountPercent`, `status`, `createdOn`, `created_at`, `updated_at`) VALUES
(4, 'coupoan30', 'eid', '2018-06-22', '2018-06-28', '6', 'fgddfgdf', 500.00, 50, 100.00, '10', 1, NULL, '2018-06-19 09:26:54', '2018-06-19 14:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_master`
--

CREATE TABLE `delivery_master` (
  `deliveryId` int(10) NOT NULL,
  `customerId` bigint(20) NOT NULL,
  `customerType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryLocation` bigint(10) NOT NULL,
  `driverId` bigint(15) DEFAULT NULL,
  `actDeliveryDate` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryStartTime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryEndTime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifNotAvailable` int(1) NOT NULL DEFAULT '0',
  `prefNeighbourName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefNeighbourAddr` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `safePlaceDelivery` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDelivery` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_master`
--

INSERT INTO `delivery_master` (`deliveryId`, `customerId`, `customerType`, `deliveryLocation`, `driverId`, `actDeliveryDate`, `deliveryStartTime`, `deliveryEndTime`, `ifNotAvailable`, `prefNeighbourName`, `prefNeighbourAddr`, `safePlaceDelivery`, `isDelivery`, `createdOn`, `updatedOn`, `remarks`) VALUES
(37, 45, 'corp', 183, NULL, '2018-05-31', '8:00am', '8:30am', 0, NULL, NULL, NULL, 0, 1527676299, NULL, NULL),
(38, 45, 'corp', 183, NULL, '2018-05-31', '7:00am', '7:30am', 0, NULL, NULL, NULL, 0, 1527676424, NULL, NULL),
(39, 45, 'corp', 183, NULL, '2018-05-31', '9:00am', '2:30pm', 0, NULL, NULL, NULL, 0, 1527676588, NULL, NULL),
(40, 45, 'corp', 183, NULL, '2018-05-31', '8:30am', '8:00am', 0, NULL, NULL, NULL, 0, 1527677954, NULL, NULL),
(41, 45, 'corp', 183, NULL, '2018-05-30', '7:00am', '7:30am', 0, NULL, NULL, NULL, 0, 1527678143, NULL, NULL),
(42, 45, 'corp', 183, NULL, '2018-05-31', '7:30am', '8:30am', 0, NULL, NULL, NULL, 0, 1527679047, NULL, NULL),
(43, 45, 'corp', 183, NULL, '2018-05-31', '8:00am', '9:30am', 0, NULL, NULL, NULL, 0, 1527679467, NULL, NULL),
(44, 45, 'corp', 183, NULL, '2018-05-31', '8:00am', '8:00am', 0, NULL, NULL, NULL, 0, 1527679501, NULL, NULL),
(45, 45, 'corp', 183, NULL, '2018-05-31', '8:30am', '9:00am', 0, NULL, NULL, NULL, 0, 1527679686, NULL, NULL),
(46, 45, 'corp', 183, NULL, '2018-05-31', '8:00am', '9:00am', 0, NULL, NULL, NULL, 0, 1527679757, NULL, NULL),
(47, 45, 'corp', 183, NULL, '2018-05-31', '8:00am', '8:00am', 0, NULL, NULL, NULL, 0, 1527679850, NULL, NULL),
(48, 45, 'corp', 183, NULL, '2018-05-29', '8:00am', '9:00am', 0, NULL, NULL, NULL, 0, 1527680062, NULL, NULL),
(49, 45, 'corp', 183, NULL, '2018-05-31', '7:30am', '8:00am', 0, NULL, NULL, NULL, 0, 1527680114, NULL, NULL),
(50, 45, 'corp', 183, NULL, '2018-05-31', '7:30am', '8:30am', 0, NULL, NULL, NULL, 0, 1527681036, NULL, NULL),
(51, 93, 'user', 162, NULL, '2018-05-30', '7:00am', '8:00am', 0, NULL, NULL, NULL, 0, 1527684280, NULL, NULL),
(52, 93, 'user', 162, NULL, '2018-05-30', '7:30am', '9:30am', 0, NULL, NULL, NULL, 0, 1527684317, NULL, NULL),
(53, 93, 'user', 162, NULL, '2018-05-30', '7:30am', '9:00am', 0, NULL, NULL, NULL, 0, 1527684448, NULL, NULL),
(54, 93, 'user', 162, NULL, '2018-05-30', '8:00am', '8:30am', 0, NULL, NULL, NULL, 0, 1527684707, NULL, NULL),
(55, 93, 'user', 162, NULL, '2018-05-30', '12:30pm', '1:00am', 0, NULL, NULL, NULL, 0, 1527737757, NULL, NULL),
(56, 93, 'user', 162, NULL, '2018-05-31', '1:00pm', '1:00am', 0, NULL, NULL, NULL, 0, 1527737990, NULL, NULL),
(57, 107, 'user', 149, NULL, '2018-05-31', '4:00pm', '4:30pm', 0, NULL, NULL, NULL, 0, 1527749825, NULL, NULL),
(58, 107, 'user', 149, NULL, '2018-05-31', '5:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1527750337, NULL, NULL),
(59, 107, 'user', 149, NULL, '2018-06-01', '4:30pm', '4:30pm', 0, NULL, NULL, NULL, 0, 1527752798, NULL, NULL),
(60, 50, 'corp', 185, NULL, '2018-05-31', '3:30pm', '4:30pm', 0, NULL, NULL, NULL, 0, 1527752989, NULL, NULL),
(61, 93, 'user', 162, NULL, '2018-05-31', '6:00pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1527758557, NULL, NULL),
(62, 93, 'user', 162, NULL, '2018-05-31', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1527759827, NULL, NULL),
(63, 93, 'user', 162, NULL, '2018-06-01', '8:30am', '9:00am', 0, NULL, NULL, NULL, 0, 1527764125, NULL, NULL),
(64, 93, 'user', 162, NULL, '2018-06-01', '8:30am', '9:30am', 0, NULL, NULL, NULL, 0, 1527764226, NULL, NULL),
(65, 93, 'user', 162, NULL, '2018-06-01', '7:30am', '8:30am', 0, NULL, NULL, NULL, 0, 1527764461, NULL, NULL),
(66, 45, 'corp', 183, NULL, '2018-06-01', '2:30pm', '3:00pm', 0, NULL, NULL, NULL, 0, 1527831208, NULL, NULL),
(67, 45, 'corp', 183, NULL, '2018-06-21', '9:00am', '10:30am', 0, NULL, NULL, NULL, 0, 1527831912, NULL, NULL),
(68, 107, 'user', 149, NULL, '2018-06-01', '2:00pm', '2:30pm', 0, NULL, NULL, NULL, 0, 1527832848, NULL, NULL),
(69, 45, 'corp', 184, NULL, '2018-06-27', '10:00am', '11:00am', 0, NULL, NULL, NULL, 0, 1527833446, NULL, NULL),
(70, 45, 'corp', 184, NULL, '2018-06-01', '3:30pm', '4:00pm', 0, NULL, NULL, NULL, 0, 1527833562, NULL, NULL),
(71, 45, 'corp', 183, NULL, '2018-06-28', '3:00pm', '4:00pm', 0, NULL, NULL, NULL, 0, 1527833609, NULL, NULL),
(72, 45, 'corp', 184, NULL, '2018-06-28', '2:00pm', '3:00pm', 0, NULL, NULL, NULL, 0, 1527833649, NULL, NULL),
(73, 107, 'user', 149, NULL, '2018-06-01', '2:00pm', '2:30pm', 0, NULL, NULL, NULL, 0, 1527833750, NULL, NULL),
(74, 107, 'user', 149, NULL, '2018-06-02', '2:00pm', '2:30pm', 0, NULL, NULL, NULL, 0, 1527833980, NULL, NULL),
(75, 107, 'user', 149, NULL, '2018-06-28', '5:30pm', '6:30pm', 0, NULL, NULL, NULL, 0, 1527836182, NULL, NULL),
(76, 50, 'corp', 185, NULL, '2018-06-02', '12:00pm', '12:30pm', 0, NULL, NULL, NULL, 0, 1527836605, NULL, NULL),
(77, 50, 'corp', 185, NULL, '2018-06-05', '3:00pm', '4:00pm', 0, NULL, NULL, NULL, 0, 1527836680, NULL, NULL),
(78, 124, 'user', 186, NULL, '2018-06-04', '1:00pm', '2:00pm', 0, NULL, NULL, NULL, 0, 1527878500, NULL, NULL),
(79, 93, 'user', 162, NULL, '2018-06-04', '12:30pm', '12:30pm', 0, NULL, NULL, NULL, 0, 1528083444, NULL, NULL),
(80, 93, 'user', 162, NULL, '2018-06-04', '7:00pm', '6:30pm', 0, NULL, NULL, NULL, 0, 1528104766, NULL, NULL),
(81, 107, 'user', 149, NULL, '2018-06-07', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1528193229, NULL, NULL),
(82, 107, 'user', 149, NULL, '2018-06-05', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1528193786, NULL, NULL),
(83, 93, 'user', 187, NULL, '2018-06-27', '1:30pm', '4:30pm', 0, NULL, NULL, NULL, 0, 1529490122, NULL, NULL),
(84, 93, 'user', 187, NULL, '2018-06-28', '12:30pm', '1:30pm', 0, NULL, NULL, NULL, 0, 1529552890, NULL, NULL),
(85, 93, 'user', 187, NULL, '2018-06-22', '4:00pm', '4:30pm', 0, NULL, NULL, NULL, 0, 1529561396, NULL, NULL),
(86, 93, 'user', 187, NULL, '2018-06-28', '5:30pm', '6:00pm', 0, NULL, NULL, NULL, 0, 1529561535, NULL, NULL),
(87, 93, 'user', 187, NULL, '2018-06-23', '10:30am', '11:00am', 0, NULL, NULL, NULL, 0, 1529578977, NULL, NULL),
(88, 45, 'corp', 184, NULL, '2018-06-29', '11:00am', '11:30am', 0, NULL, NULL, NULL, 0, 1529579114, NULL, NULL),
(89, 93, 'user', 187, NULL, '2018-06-22', '11:00am', '12:00pm', 0, NULL, NULL, NULL, 0, 1529580087, NULL, NULL),
(90, 93, 'user', 187, NULL, '2018-06-22', '10:30am', '11:00am', 0, NULL, NULL, NULL, 0, 1529580399, NULL, NULL),
(91, 93, 'user', 187, NULL, '2018-06-25', '10:30am', '11:00am', 0, NULL, NULL, NULL, 0, 1529580651, NULL, NULL),
(92, 93, 'user', 187, NULL, '2018-06-27', '10:30am', '11:00am', 0, NULL, NULL, NULL, 0, 1529580905, NULL, NULL),
(93, 93, 'user', 187, NULL, '2018-06-22', '10:30am', '11:00am', 0, NULL, NULL, NULL, 0, 1529581030, NULL, NULL),
(94, 45, 'corp', 183, NULL, '2018-06-26', '11:00am', '11:30am', 0, NULL, NULL, NULL, 0, 1529581920, NULL, NULL),
(95, 93, 'user', 187, NULL, '2018-06-27', '11:30am', '12:00pm', 0, NULL, NULL, NULL, 0, 1529582809, NULL, NULL),
(96, 93, 'user', 187, NULL, '2018-06-26', '11:30am', '12:30pm', 0, NULL, NULL, NULL, 0, 1529582891, NULL, NULL),
(97, 45, 'corp', 184, NULL, '2018-06-28', '11:00am', '12:00pm', 0, NULL, NULL, NULL, 0, 1529582942, NULL, NULL),
(98, 45, 'corp', 184, NULL, '2018-06-22', '6:00pm', '6:30pm', 0, NULL, NULL, NULL, 0, 1529654547, NULL, NULL),
(99, 93, 'user', 187, NULL, '2018-06-22', '5:30pm', '6:00pm', 0, NULL, NULL, NULL, 0, 1529654598, NULL, NULL),
(100, 107, 'user', 149, NULL, '2018-06-25', '3:30pm', '4:00pm', 0, NULL, NULL, NULL, 0, 1529907602, NULL, NULL),
(101, 114, 'user', 145, NULL, '2018-06-27', '4:30pm', '6:00pm', 0, NULL, NULL, NULL, 0, 1529991476, NULL, NULL),
(102, 132, 'user', 211, NULL, '2018-06-26', '3:30pm', '4:00pm', 0, NULL, NULL, NULL, 0, 1529993054, NULL, NULL),
(103, 132, 'user', 211, NULL, '2018-06-24', '4:00pm', '5:00pm', 0, NULL, NULL, NULL, 0, 1529993639, NULL, NULL),
(104, 132, 'user', 211, NULL, '2018-06-30', '12:30pm', '1:00pm', 0, NULL, NULL, NULL, 0, 1529999529, NULL, NULL),
(105, 132, 'user', 211, NULL, '2018-06-30', '6:00pm', '6:30pm', 0, NULL, NULL, NULL, 0, 1529999529, NULL, NULL),
(106, 132, 'user', 211, NULL, '2018-06-30', '5:30pm', '6:00pm', 0, NULL, NULL, NULL, 0, 1529999529, NULL, NULL),
(107, 132, 'user', 211, NULL, '2018-06-26', '5:00pm', '5:30pm', 0, NULL, NULL, NULL, 0, 1530000408, NULL, NULL),
(108, 132, 'user', 211, NULL, '2018-06-30', '11:30am', '1:00pm', 0, NULL, NULL, NULL, 0, 1530000810, NULL, NULL),
(109, 132, 'user', 211, NULL, '2018-07-27', '12:00pm', '1:30pm', 0, NULL, NULL, NULL, 0, 1530001728, NULL, NULL),
(110, 65, 'corp', 212, NULL, '2018-06-27', '11:00am', '11:30am', 0, NULL, NULL, NULL, 0, 1530013667, NULL, NULL),
(111, 65, 'corp', 212, NULL, '2018-06-27', '9:00am', '9:30am', 0, NULL, NULL, NULL, 0, 1530014315, NULL, NULL),
(112, 65, 'corp', 212, NULL, '2018-06-28', '9:00am', '9:30am', 0, NULL, NULL, NULL, 0, 1530014360, NULL, NULL),
(113, 107, 'user', 149, NULL, '2018-06-29', '6:00pm', '6:30pm', 0, NULL, NULL, NULL, 0, 1530083099, NULL, NULL),
(114, 107, 'user', 149, NULL, '2018-06-28', '6:00pm', '6:30pm', 0, NULL, NULL, NULL, 0, 1530083187, NULL, NULL),
(115, 132, 'user', 211, NULL, '2018-06-27', '5:00pm', '5:30pm', 0, NULL, NULL, NULL, 0, 1530083892, NULL, NULL),
(116, 31, 'corp', 214, NULL, '2018-07-03', '9:30am', '10:00am', 0, NULL, NULL, NULL, 0, 1530084353, NULL, NULL),
(117, 1, 'user', 1, NULL, '2018-06-29', '3:30pm', '4:00pm', 0, NULL, NULL, NULL, 0, 1530254317, NULL, NULL),
(118, 1, 'user', 1, NULL, '2018-07-03', '2:30pm', '3:00pm', 0, NULL, NULL, NULL, 0, 1530594538, NULL, NULL),
(119, 1, 'user', 1, NULL, '2018-07-03', '2:30pm', '3:00pm', 0, NULL, NULL, NULL, 0, 1530597273, NULL, NULL),
(120, 1, 'user', 1, NULL, '2018-07-03', '2:30pm', '3:00pm', 0, NULL, NULL, NULL, 0, 1530597375, NULL, NULL),
(121, 1, 'user', 1, NULL, '2018-07-03', '2:30pm', '3:00pm', 0, NULL, NULL, NULL, 0, 1530597485, NULL, NULL),
(122, 1, 'user', 1, NULL, '2018-07-03', '2:30pm', '3:00pm', 0, NULL, NULL, NULL, 0, 1530597595, NULL, NULL),
(123, 1, 'user', 1, NULL, '2018-07-03', '3:00pm', '3:30pm', 0, NULL, NULL, NULL, 0, 1530597715, NULL, NULL),
(124, 1, 'user', 1, NULL, '2018-07-03', '3:00pm', '3:30pm', 0, NULL, NULL, NULL, 0, 1530597911, NULL, NULL),
(125, 1, 'user', 1, NULL, '2018-07-03', '3:00pm', '3:30pm', 0, NULL, NULL, NULL, 0, 1530598173, NULL, NULL),
(126, 1, 'user', 1, NULL, '2018-07-03', '3:30pm', '4:00pm', 0, NULL, NULL, NULL, 0, 1530598427, NULL, NULL),
(127, 1, 'user', 1, NULL, '2018-07-25', '10:00am', '10:30am', 0, NULL, NULL, NULL, 0, 1530598677, NULL, NULL),
(128, 1, 'user', 1, NULL, '2018-07-25', '3:30pm', '4:30pm', 0, NULL, NULL, NULL, 0, 1530600600, NULL, NULL),
(129, 1, 'user', 1, NULL, '2018-07-25', '10:00am', '11:00am', 0, NULL, NULL, NULL, 0, 1530676134, NULL, NULL),
(130, 1, 'user', 1, NULL, '2018-07-04', '5:00pm', '5:30pm', 0, NULL, NULL, NULL, 0, 1530691267, NULL, NULL),
(131, 2, 'user', 5, NULL, '2018-07-07', '4:00pm', '4:30pm', 0, NULL, NULL, NULL, 0, 1530944486, NULL, NULL),
(132, 3, 'user', 6, NULL, '2018-07-24', '5:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1531910769, NULL, NULL),
(133, 3, 'user', 8, NULL, '2018-08-31', '8:00am', '11:00am', 0, NULL, NULL, NULL, 0, 1535629691, NULL, NULL),
(134, 3, 'user', 8, NULL, '2018-08-31', '7:00am', '9:00am', 0, NULL, NULL, NULL, 0, 1535630332, NULL, NULL),
(135, 3, 'user', 8, NULL, '2018-09-10', '2:30pm', '5:00pm', 0, NULL, NULL, NULL, 0, 1536272621, NULL, NULL),
(136, 3, 'user', 6, NULL, '2018-09-15', '11:00am', '1:00pm', 0, NULL, NULL, NULL, 0, 1536952468, NULL, NULL),
(137, 1, 'user', 1, NULL, '2018-09-17', '11:00am', '12:00pm', 0, NULL, NULL, NULL, 0, 1537115255, NULL, NULL),
(138, 1, 'user', 1, NULL, '2018-09-17', '10:30am', '12:00pm', 0, NULL, NULL, NULL, 0, 1537115394, NULL, NULL),
(139, 1, 'user', 1, NULL, '2018-09-17', '10:30am', '11:30am', 0, NULL, NULL, NULL, 0, 1537116047, NULL, NULL),
(140, 4, 'user', 9, NULL, '2018-09-20', '10:00am', '1:30pm', 0, NULL, NULL, NULL, 0, 1537161825, NULL, NULL),
(141, 7, 'user', 14, NULL, '2018-09-17', '5:30pm', '6:30pm', 0, NULL, NULL, NULL, 0, 1537172189, NULL, NULL),
(142, 7, 'user', 14, NULL, '2018-09-17', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1537175559, NULL, NULL),
(143, 7, 'user', 14, NULL, '2018-09-17', '6:00pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1537176822, NULL, NULL),
(144, 7, 'user', 14, NULL, '2018-09-17', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1537177591, NULL, NULL),
(145, 7, 'user', 14, NULL, '2018-09-17', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, 0, 1537178643, NULL, NULL),
(146, 65, 'corp', 16, NULL, '2018-09-18', '7:00am', '9:30am', 0, NULL, NULL, NULL, 0, 1537183045, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_notification`
--

CREATE TABLE `driver_notification` (
  `id` int(5) NOT NULL,
  `driverid` int(100) NOT NULL,
  `orderid` int(100) NOT NULL,
  `status` int(10) NOT NULL,
  `pickup_later` int(10) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_notification`
--

INSERT INTO `driver_notification` (`id`, `driverid`, `orderid`, `status`, `pickup_later`, `created_at`, `updated_at`) VALUES
(1, 29, 1526616056, 0, 0, '2018-07-04 10:10:27', '2018-07-04 10:10:27'),
(2, 31, 1526616057, 0, 0, '2018-07-04 14:22:31', '2018-07-04 14:22:31'),
(3, 32, 1526616057, 0, 0, '2018-07-04 14:22:31', '2018-07-04 14:22:31'),
(4, 31, 1526616058, 0, 0, '2018-07-07 11:51:54', '2018-07-07 11:51:54'),
(5, 32, 1526616058, 0, 0, '2018-07-07 11:51:54', '2018-07-07 11:51:54'),
(6, 31, 1526616062, 0, 0, '2018-07-18 16:17:38', '2018-07-18 16:17:38'),
(7, 32, 1526616062, 0, 0, '2018-07-18 16:17:38', '2018-07-18 16:17:38'),
(8, 32, 1526616065, 0, 0, '2018-08-30 17:23:21', '2018-08-30 17:23:21'),
(9, 32, 1526616068, 0, 0, '2018-08-30 17:29:53', '2018-08-30 17:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `driver_transaction`
--

CREATE TABLE `driver_transaction` (
  `uniqueId` int(10) NOT NULL,
  `recordIdentifier` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driverId` int(10) NOT NULL,
  `executionOn` int(2) DEFAULT NULL,
  `transactionAmount` double(9,2) NOT NULL DEFAULT '0.00',
  `incomingCreditOn` int(2) DEFAULT NULL,
  `transactionOn` int(2) DEFAULT NULL,
  `transactionId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additionalInformation` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionStatus` int(2) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `sub_title`, `description`, `created_at`, `updated_at`) VALUES
(10, '5', 'What are your operating hours?', '<p>We are open daily except for any emergency or Natural disaster. Our pickup and deliver hours is 8:00am &ndash; 12:00am and our customer service hours is 9am -12am.</p>', '2018-05-02 04:37:01', '2018-05-02 04:37:01'),
(7, '5', 'What does Launder Services do?', '<p>Launder Services provides on Demand Laundry Services, the most convenient and the highest quality dry cleaning and wash &amp; fold service for your garments. Simply place an order using our app and we will be at your door at your preferred time. We open late so you will never have to worry about running to your local dry cleaner before they close.</p>', '2018-05-02 04:28:06', '2018-05-04 05:28:55'),
(8, '5', 'How do I start?', '<p>You can create your account online on&nbsp;<a href=\"http://launderservices.com/launder-services/public/www.launderservices.com\">www.launderservices.com</a>&nbsp;or after downloading our app for&nbsp;iPhone&nbsp;and&nbsp;Android, and you will be ready to order in no time!</p>', '2018-05-02 04:30:42', '2018-05-02 05:18:45'),
(9, '5', 'What is Launder Services service area?', '<p>At present our services covers most of your city areas. But don&rsquo;t worry if you are not located there, Subscribe to our newsletter and you will be notified when we expand our service to your location.</p>', '2018-05-02 04:31:18', '2018-05-02 04:31:18'),
(11, '5', 'Do you have any expressed service?', '<p>Yes, we do! Please contact our staff on +91.XXX.XXX.XXX for more information.</p>', '2018-05-02 04:37:33', '2018-05-02 04:37:33'),
(12, '5', 'Can I place order by phone?', '<p>Yes, Actually We encourage customers to place their orders via our mobile apps available for iPhone and Android. It&rsquo;s really easy and convenient, give it a try!</p>', '2018-05-02 04:38:00', '2018-05-02 04:38:00'),
(13, '5', 'Is there an order minimum value?', '<p>Yes, the order minimum value is applicable as per city. It will be display as per your selected city.</p>', '2018-05-02 04:38:42', '2018-05-02 04:38:42'),
(14, '5', 'Is there a pickup & delivery fee in case of top urget?', '<p>Yes, there is Rs 5.00 additional fee/Item for our pickup and delivery in top urget service.</p>', '2018-05-02 04:43:00', '2018-05-02 04:43:00'),
(15, '5', 'What if my clothes are damaged or lost?', '<p>We strive to provide the best service to our customers, but in the rare event that your clothes are damaged or lost during our cleaning or logistic process, we will hold accountable and reimburse you. Please refer to the compensation policies in our terms and conditions section.</p>', '2018-05-02 04:43:26', '2018-05-02 04:43:26'),
(16, '6', 'Do I need to sort my clothes?', '<p>Yes, we just need you to separate your dry cleaning items and your wash &amp; fold items and we will take care of the rest!</p>', '2018-05-02 04:44:03', '2018-05-02 04:44:03'),
(17, '6', 'What should I prepare for the pickup?', '<p>Just make sure you have your clothes ready! Our staff will come to you with collection bags at your selected time slot through the app.</p>', '2018-05-02 04:44:27', '2018-05-02 04:44:27'),
(18, '6', 'I can\'t find a category that my garment belongs to on the app, how do I know if you can wash a specific item for me?', '<p>If you are not sure which category your item(s) belong to, feel free to CONTACT us +91XXX.XXX.XXX our staff are always happy and ready to assist.</p>', '2018-05-02 04:49:47', '2018-05-02 04:49:47'),
(19, '6', 'What should I do if I have special cleaning instruction for my item(s)?', '<p>Simply write Notes in &ldquo;<strong>LAUNDRY PREFERENCES</strong>&rdquo; what are your special cleaning instruction(s).</p>', '2018-05-02 04:50:17', '2018-05-02 04:50:17'),
(20, '6', 'I am ready for the pickup! What happens next?', '<p>Our staff will call or you will get notification when we are enroute ! We will come with Launder bag to pickup Items.</p>', '2018-05-02 04:50:43', '2018-05-02 04:50:43'),
(21, '6', 'When can I get my clothes back?', '<p>Please allow us 4 days to clean and deliver back to you from the time we pick up your items. Please contact us through IM if you require express service for your urgent needs.</p>\r\n<p>However, selected items such as leather, suede, down jacket, duvet and pillow would require 7 calendar days to turnaround as they require a more complex cleaning process and longer drying period.</p>', '2018-05-02 04:51:13', '2018-05-02 04:51:13'),
(22, '7', 'Can I reschedule a pickup/delivery?', '<p>Yes, you can change your pickup time in the app as long as it is 2 hours before your original scheduled time slot, but you may only reschedule to a time later than your original schedules time slot.</p>', '2018-05-02 04:54:36', '2018-05-02 04:54:36'),
(23, '7', 'What do I do if I missed a scheduled pickup/delivery?', '<p>No worries, simply contact us via our in-app IM function and we will arrange a new appointment for you as soon as possible.</p>', '2018-05-02 04:55:03', '2018-05-02 04:55:03'),
(24, '7', 'Can I change/cancel my order?', '<p>Yes, you may cancel your order at any time before we pick up your items. Once your items are picked up, we will proceed to cleaning immediately, so we are afraid we cannot make changes or cancel your order after that point. In emergency case, you can get back your clothes but without refund of paid charges.</p>\r\n<p>If you have additional item(s) to add, please contact us on IM or let our staff know during pickup. Please understand that the additional item(s) may need to be paid by cash. If you have clothes that do not need to be washed, please also contact us on IM before your scheduled pick up time so we can refund you properly. It is fine as long as your total bill is above our order minimum.</p>', '2018-05-02 04:55:35', '2018-05-02 04:55:35'),
(25, '7', 'I can’t wait for the scheduled delivery time and I need my clothes back now!', '<p>We will always promise to deliver your clothes nice and cleaned at your scheduled time but if something comes up please contact us via our in-app IM function, email&nbsp;<a href=\"mailto:support@launderservices.com\">support@launderservices.com&nbsp;</a>or give us a call at +91.XXX.XXX.XXX for urgent matters.</p>', '2018-05-02 04:56:07', '2018-05-02 04:56:07'),
(26, '7', 'Why are some of the pickup/delivery time slots greyed out?', '<p>Sorry, it is because we are busy at those time slots. Please choose another available time!</p>', '2018-05-02 04:56:32', '2018-05-02 04:56:32'),
(27, '7', 'Are there any items that are excluded from your services?', '<p>While we believe our scope of service covers most of the commonly washed items. For safety and hygiene reasons, we cannot process garments containing hazardous materials, blood or feces. If there is an item that we are not able to process, we will notify you and return the item uncleaned.</p>', '2018-05-02 04:56:56', '2018-05-02 04:56:56'),
(28, '8', 'When do I pay?', '<p>We require online payment to be made upon order placement.</p>', '2018-05-02 04:57:23', '2018-05-02 04:57:23'),
(29, '8', 'What are the methods of payment?', '<p>We ACCEPTE 100 currencies use PayTab to handle our online payments. We want you to order with confidence and peace of mind that for credit card number and details remain secure and private. Pay Tab supports a large number of credit cards, including Visa, Master Card, SADAD. We also, of course, accept cash in selected cities.</p>', '2018-05-02 04:57:44', '2018-05-02 04:57:44'),
(30, '8', 'How are my card details transmitted and stored?', '<p>We utilize PayTab to process online payments and we do not store any of our customers&rsquo; credit card information in our server. PayTab automatically encrypts your confidential information in transit from your device to ours using the Secure Sockets Layer protocol (SSL) with an encryption key length of 128-bits (the highest level commercially available).</p>', '2018-05-02 04:58:11', '2018-05-02 04:58:11'),
(31, '8', 'I have a general enquiry, how can I contact you?', '<p>The simplest way to get in touch with us is via our in-app IM function, or you can also email&nbsp;support@launderservices.com or give us a call at +91.XXX.XXX.XXX.</p>', '2018-05-02 04:58:35', '2018-05-02 04:58:35'),
(32, '8', 'What if I need to make a complaint or provide suggestions to your service?', '<p>We are sorry that you are not happy with our service! Please get in touch with us via any of the methods listed above. We treat all complaints and suggestions with the utmost importance and as an opportunity to improve the quality of our service.</p>', '2018-05-02 04:58:58', '2018-05-02 04:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `faq_title`
--

CREATE TABLE `faq_title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_title`
--

INSERT INTO `faq_title` (`id`, `title`, `created_at`, `updated_at`) VALUES
(8, 'Payments & Other', '2018-05-01 12:44:32', '2018-05-01 12:44:32'),
(7, 'Pickup &  Delivery', '2018-05-01 12:44:15', '2018-05-01 12:44:15'),
(5, 'General', '2018-05-01 05:06:28', '2018-05-01 12:43:36'),
(6, 'Getting Started', '2018-05-01 05:06:28', '2018-05-01 12:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `message_type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `helps`
--

CREATE TABLE `helps` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `helps`
--

INSERT INTO `helps` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'jattin', 'jarora1994@gmail.com', 'jarora1994@gmail.com', '', '2018-05-08 12:40:05', '2018-05-08 12:40:05'),
(2, 'jattin', 'jarora1994@gmail.com', 'jarora1994@gmail.com', '', '2018-05-08 12:40:32', '2018-05-08 12:40:32'),
(3, 'jattin', 'gdsfgdsfds@gm', '436346543', 'gdfgdfgdf', '2018-05-08 12:41:20', '2018-05-08 12:41:20'),
(4, 'Muser India', 'muserindia@gmail.com', NULL, 'jattin want your help', '2018-05-09 07:47:51', '2018-05-09 07:47:51'),
(5, 'Muser India', 'muserindia@gmail.com', NULL, 'jattin', '2018-05-09 07:48:09', '2018-05-09 07:48:09'),
(6, 'Muser India', 'muserindia@gmail.com', NULL, 'nhfghdfhdf', '2018-05-09 07:50:07', '2018-05-09 07:50:07'),
(7, 'jattin', 'sdffdsdsf@gm', 'tsfds', 'fsdfds', '2018-05-09 07:50:34', '2018-05-09 07:50:34'),
(8, 'jattin', 'bhdfghdf@gm', '75 754', 'dfghdfgdf', '2018-05-09 07:54:57', '2018-05-09 07:54:57'),
(9, 'Muser India', 'muserindia@gmail.com', NULL, 'gdsfdsfs vcxvds', '2018-05-09 07:58:05', '2018-05-09 07:58:05'),
(10, 'Muser India', 'muserindia@gmail.com', NULL, 'gdsgdsdsvsd', '2018-05-09 07:58:45', '2018-05-09 07:58:45'),
(11, 'gdsgds', 'sgdgds@ghg', 'sdfsd', 'bbdf', '2018-05-09 07:59:34', '2018-05-09 07:59:34'),
(12, 'Muser India', 'muserindia@gmail.com', NULL, 'fgdsfsafsd', '2018-05-09 08:00:56', '2018-05-09 08:00:56'),
(13, 'Muser India', 'muserindia@gmail.com', NULL, 'fgrdsvdasfsd', '2018-05-09 08:01:08', '2018-05-09 08:01:08'),
(14, 'Muser India', 'muserindia@gmail.com', NULL, 'gsddgsdfds', '2018-05-09 08:01:46', '2018-05-09 08:01:46'),
(15, 'Muser India', 'muserindia@gmail.com', NULL, 'vgdssdfs', '2018-05-09 08:04:03', '2018-05-09 08:04:03'),
(16, 'Muser India', 'muserindia@gmail.com', NULL, 'vbdvzxcsadfdsfds', '2018-05-09 08:04:30', '2018-05-09 08:04:30'),
(17, 'Muser India', 'muserindia@gmail.com', NULL, 'dfggdsfgds', '2018-05-09 08:06:48', '2018-05-09 08:06:48'),
(18, 'Muser India', 'muserindia@gmail.com', NULL, 'dvgdsgds', '2018-05-09 08:06:55', '2018-05-09 08:06:55'),
(19, 'Muser India', 'muserindia@gmail.com', NULL, 'vcxvdsfdsfds', '2018-05-09 08:08:29', '2018-05-09 08:08:29'),
(20, 'Muser India', 'muserindia@gmail.com', NULL, 'fdsdfsdfds', '2018-05-09 08:09:50', '2018-05-09 08:09:50'),
(21, 'Muser India', 'muserindia@gmail.com', NULL, 'sdfsdczxczx', '2018-05-09 08:10:50', '2018-05-09 08:10:50'),
(22, 'Muser India', 'muserindia@gmail.com', NULL, 'gswdefsfsd', '2018-05-09 08:13:05', '2018-05-09 08:13:05'),
(23, 'Muser India', 'muserindia@gmail.com', NULL, 'dfgsfsddfsd', '2018-05-09 08:13:36', '2018-05-09 08:13:36'),
(24, 'Muser India', 'muserindia@gmail.com', NULL, 'vdscasds', '2018-05-09 08:14:05', '2018-05-09 08:14:05'),
(25, 'Muser India', 'muserindia@gmail.com', NULL, 'vgdfs ewrqw', '2018-05-09 08:14:11', '2018-05-09 08:14:11'),
(26, 'Jatin Gaba', 'gabajattin@gmail.com', NULL, 'thankus', '2018-05-14 04:03:57', '2018-05-14 04:03:57'),
(27, 'test', 'alshoeb24@gmail.com', '7179874561', 'sdzgfx', '2018-05-14 05:22:46', '2018-05-14 05:22:46'),
(28, 'Jatin Gaba', 'gabajattin@gmail.com', NULL, 'hello admin', '2018-05-14 06:02:56', '2018-05-14 06:02:56'),
(29, 'jattin', '46547645@hm', '754754', 'hfhdf', '2018-05-14 06:05:00', '2018-05-14 06:05:00'),
(30, 'Shoeb Alam', 'alshoeb24@gmail.com', '8447764785', 'hjdsghjv', '2018-05-14 08:19:08', '2018-05-14 08:19:08'),
(31, 'Jatin Arora', 'jarora1994@gmail.com', NULL, 'jbjiioi', '2018-05-16 08:37:58', '2018-05-16 08:37:58'),
(32, 'Jatin Arora', 'jarora1994@gmail.com', NULL, 'tgre5t43543', '2018-05-16 08:38:39', '2018-05-16 08:38:39'),
(33, 'Shoeb Alam', 'ashoeb19@yahoo.com', '8430774785', 'hedvfd', '2018-05-18 06:17:35', '2018-05-18 06:17:35'),
(34, 'Abhishek Srivastava', 'abhishek@muser.co.in', '5454545445', 'Need Help', '2018-05-25 08:00:46', '2018-05-25 08:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `individual_user_master`
--

CREATE TABLE `individual_user_master` (
  `indvCustId` bigint(20) NOT NULL,
  `indvLsCustId` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indvCustName` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indvCustEmail` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indvCustMobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indvCustPassword` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indvCustStatus` int(2) NOT NULL DEFAULT '0',
  `isMobileVerified` int(2) NOT NULL DEFAULT '0',
  `isEmailVerified` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `dateId` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authUserId` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialImage` text COLLATE utf8mb4_unicode_ci,
  `userType` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referralCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `referredBy` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_user_master`
--

INSERT INTO `individual_user_master` (`indvCustId`, `indvLsCustId`, `indvCustName`, `indvCustEmail`, `indvCustMobile`, `indvCustPassword`, `gender`, `indvCustStatus`, `isMobileVerified`, `isEmailVerified`, `createdOn`, `updatedOn`, `dateId`, `authUserId`, `auth`, `authId`, `socialImage`, `userType`, `sessionToken`, `remember_token`, `web_player_id`, `referralCode`, `points`, `referredBy`) VALUES
(1, 'D1530245974', 'Jatin Gaba', 'gabajattin@gmail.com', '', NULL, NULL, 0, 0, 0, 1530245974, NULL, NULL, NULL, 'facebook', '1814359835323683', 'https://graph.facebook.com/v2.10/1814359835323683/picture?width=1920', 'user', 'pZX4Bv6O2xAjOBUqLlR4lTNzTf577NkxNhBoNIdP', 'Csc0H730bLEKB6mq7qHnsIQAxMPpBQOsOvlhAIGUEXaycK752TEg3PMmRpY3', NULL, 'IU13%Fwn', 0, NULL),
(2, 'D1530944375', 'Deep Gandhi', 'developers.delainetech@gmail.com', '', NULL, NULL, 0, 0, 0, 1530944375, NULL, NULL, NULL, 'facebook', '404021996759777', 'https://graph.facebook.com/v2.10/404021996759777/picture?width=1920', 'user', '7XeByrcePBXIILnmzC9jZyOiTS2pY2q50FHz7TNW', 'f5tRuwHfJBNSp8ZTKH0GiSWPFzvONF846w3a6FmmYbjN4o7uTdatJ9zORw88', '', 'ALyw45SE', 0, NULL),
(3, 'D1531854241', 'Moin', 'ayzangroup@gmail.com', '7888138538', '$2y$10$Sx2eHD42E/yopFPCliEK6.tt4Sj4x4eGg9Zm4NeYkedYxM95qVuIa', NULL, 0, 0, 0, 1531854241, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, 'aPf6c2Yh4bh1qTc5XBhXKM3Rm188gJIyXhPFY2J2w7Atk42Vxq91RkIha5i5', NULL, '7@wEF4SW', 0, NULL),
(4, 'D1537161718', 'Gaurav Sharma', 'gaurav.sharma@droisys.com', '9899066548', '$2y$10$6QtzTGKgKHfdaJkw3ZA74uHWCzkxrKzrIoiTZaX5Ren67QPl1UnKu', NULL, 0, 0, 0, 1537161718, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, 'bbDdtCwVkpopZQRClrd8gLb9qGRz5JUUje8wqlmVf9rhfCwmTKpHpmM8mGS9', NULL, '7^!u6gEF', 0, NULL),
(5, 'D1537167950', 'jattin', 'jattink34@gmail.com', '905889545874', '$2y$10$NNMNl20.UwWL4vICVJTDg.rdAmZs3Z173CDF/eoyQBfVpBq9uzU1G', NULL, 0, 0, 0, 1537167950, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL, ' ', 'wSglVGji', 0, NULL),
(6, 'D1537168065', 'jattin', 'jattink324@gmail.com', '8607875212', '$2y$10$0abGfD6UyooaLdzoo7CboumL8TCIQEVo4oq34yVEsOlAmsm8y83qK', NULL, 0, 0, 0, 1537168065, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, NULL, ' ', 'RmBKrhtT', 0, NULL),
(7, 'D1537168099', 'admin', 'admin@gmail.com', '9094293435', '$2y$10$0qgPlISd0m8BEza0N.0NOORkP3gYY1fYL6took8cW4OrPQxNQKh0.', NULL, 0, 0, 0, 1537168099, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, 'yYdYIPorEHmjJ9MbxjfiK79YrrrWA2INZtrASwSiBkXOQZV4MIZgFUCVMcIN', NULL, 'p7qjfEdc', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indv_user_details`
--

CREATE TABLE `indv_user_details` (
  `uniqueId` bigint(20) NOT NULL,
  `indvCustId` bigint(20) NOT NULL,
  `appVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmId` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcmUpdatedAt` int(2) DEFAULT NULL,
  `sessionToken` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceToken` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deviceTokenUpdatedAt` int(2) DEFAULT NULL,
  `iosAppVersion` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(4,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `referral` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indv_user_details`
--

INSERT INTO `indv_user_details` (`uniqueId`, `indvCustId`, `appVersion`, `gcmId`, `gcmUpdatedAt`, `sessionToken`, `deviceToken`, `deviceTokenUpdatedAt`, `iosAppVersion`, `rating`, `remarks`, `referral`, `createdOn`, `updatedOn`, `platform`, `created_at`, `updated_at`) VALUES
(1, 2, '1.011', NULL, NULL, NULL, NULL, NULL, NULL, 4.80, 'Hello World11', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '1.012', NULL, NULL, NULL, NULL, NULL, NULL, 4.70, 'Hello World12', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, '1.021', NULL, NULL, NULL, NULL, NULL, NULL, 4.90, 'Hello World21', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, '1.022', NULL, NULL, NULL, NULL, NULL, NULL, 4.85, 'Hello World22', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 14, '1.01', 'safgE', 1522310450, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522310450, NULL, 'WEB', NULL, NULL),
(10, 15, '1.01', 'safgE', 1522314725, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522314725, NULL, 'WEB', NULL, NULL),
(11, 16, '1.01', 'safgEsahFJGVSDV', 1522383473, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522383473, NULL, 'WEB', NULL, NULL),
(12, 18, '1.01', 'sdfkhgkhdshdsfjhghklhda', 1522744642, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1522744642, NULL, 'WEB', NULL, NULL),
(13, 19, '1.0.0', 'jdgjsf7895', 1523592934, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1523592934, NULL, 'WEB', NULL, NULL),
(14, 74, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1525258216, NULL, ' ', NULL, NULL),
(15, 75, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1525258218, NULL, ' ', NULL, NULL),
(16, 76, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1525258267, NULL, ' ', NULL, NULL),
(17, 78, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1525321674, NULL, ' ', NULL, NULL),
(18, 86, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526279996, NULL, ' ', NULL, NULL),
(19, 88, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526280158, NULL, ' ', NULL, NULL),
(20, 89, '1.0.0', 'jdgjsf7895', 1526280246, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526280247, NULL, 'WEB', NULL, NULL),
(21, 95, '1.0.0', 'jdgjsf7895', 1526281305, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526281305, NULL, 'WEB', NULL, NULL),
(22, 96, '1.0.0', 'jdgjsf7895', 1526281483, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526281483, NULL, 'WEB', NULL, NULL),
(23, 97, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526281750, NULL, ' ', NULL, NULL),
(24, 98, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526281977, NULL, ' ', NULL, NULL),
(25, 99, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526282212, NULL, ' ', NULL, NULL),
(26, 100, '1.0.0', 'jdgjsf7895', 1526282611, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526282611, NULL, 'WEB', NULL, NULL),
(27, 101, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526283795, NULL, ' ', NULL, NULL),
(28, 102, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526284133, NULL, ' ', NULL, NULL),
(29, 108, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526637129, NULL, ' ', NULL, NULL),
(30, 109, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526638220, NULL, ' ', NULL, NULL),
(31, 110, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526638301, NULL, ' ', NULL, NULL),
(32, 111, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526638387, NULL, ' ', NULL, NULL),
(33, 112, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526639115, NULL, ' ', NULL, NULL),
(34, 113, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526641799, NULL, ' ', NULL, NULL),
(35, 114, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1526645116, NULL, ' ', NULL, NULL),
(36, 115, '1.0.0', 'safgE', 1527227582, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527227582, NULL, 'android', NULL, NULL),
(37, 116, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527249872, NULL, ' ', NULL, NULL),
(38, 117, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527252866, NULL, ' ', NULL, NULL),
(39, 118, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527253122, NULL, ' ', NULL, NULL),
(40, 119, '1.0.0', 'safgE', 1527563521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527563521, NULL, 'android', NULL, NULL),
(41, 120, '1.0.0', 'safgE', 1527563564, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527563565, NULL, 'android', NULL, NULL),
(42, 121, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527564849, NULL, ' ', NULL, NULL),
(43, 122, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1527571205, NULL, ' ', NULL, NULL),
(44, 125, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1529667102, NULL, ' ', NULL, NULL),
(45, 126, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1529668249, NULL, ' ', NULL, NULL),
(46, 127, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1529668415, NULL, ' ', NULL, NULL),
(47, 128, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1529672229, NULL, ' ', NULL, NULL),
(48, 129, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1529897327, NULL, ' ', NULL, NULL),
(49, 133, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1529903216, NULL, ' ', NULL, NULL),
(50, 3, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1531854241, NULL, ' ', NULL, NULL),
(51, 4, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1537161718, NULL, ' ', NULL, NULL),
(52, 5, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1537167950, NULL, ' ', NULL, NULL),
(53, 6, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1537168065, NULL, ' ', NULL, NULL),
(54, 7, ' ', ' ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1537168099, NULL, ' ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `introducing_customer_offers`
--

CREATE TABLE `introducing_customer_offers` (
  `id` int(255) NOT NULL,
  `offerCode` varchar(255) NOT NULL,
  `offerDescription` mediumtext,
  `offerImage` varchar(255) DEFAULT NULL,
  `offerType` varchar(255) DEFAULT NULL,
  `offerStartDate` varchar(255) DEFAULT NULL,
  `offerEndDate` varchar(255) DEFAULT NULL,
  `offerTotalDays` varchar(255) DEFAULT NULL,
  `introducingCustomerId` varchar(255) DEFAULT NULL,
  `userType` varchar(255) DEFAULT NULL,
  `minOrderValue` int(255) DEFAULT NULL,
  `discountPercent` varchar(255) DEFAULT NULL,
  `maxdiscVal` int(255) NOT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` int(255) NOT NULL,
  `updated_at` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `introducing_customer_offers`
--

INSERT INTO `introducing_customer_offers` (`id`, `offerCode`, `offerDescription`, `offerImage`, `offerType`, `offerStartDate`, `offerEndDate`, `offerTotalDays`, `introducingCustomerId`, `userType`, `minOrderValue`, `discountPercent`, `maxdiscVal`, `status`, `created_at`, `updated_at`) VALUES
(4, 'coupan30', 'fsdkmoggggdsfds', '550984wsam.jpg', 'Eid12', '2018-06-23', '2018-06-26', '3', '3, 5, 31, 41, 43, 45, 76, 78, 79, 93, 107, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124', 'corp', 200, '10', 100, 1, 2018, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laundryman_transaction`
--

CREATE TABLE `laundryman_transaction` (
  `uniqueId` int(10) NOT NULL,
  `recordIdentifier` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laundrymanId` int(10) NOT NULL,
  `executionOn` int(2) DEFAULT NULL,
  `transactionAmount` double(9,2) NOT NULL DEFAULT '0.00',
  `incomingCreditOn` int(2) DEFAULT NULL,
  `transactionOn` int(2) DEFAULT NULL,
  `transactionId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additionalInformation` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionStatus` int(2) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_driver_master`
--

CREATE TABLE `ls_driver_master` (
  `driverId` int(10) NOT NULL,
  `driverName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressId` bigint(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `isMobileVerified` int(1) NOT NULL DEFAULT '0',
  `isEmailVerified` int(1) NOT NULL DEFAULT '0',
  `profileImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseVerify` int(2) NOT NULL DEFAULT '0',
  `licenseImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalIdNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalVerify` int(2) NOT NULL DEFAULT '0',
  `UIDImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAuthorized` int(2) NOT NULL DEFAULT '0',
  `panNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sessionToken` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_driver_master`
--

INSERT INTO `ls_driver_master` (`driverId`, `driverName`, `email`, `phone`, `addressId`, `status`, `isMobileVerified`, `isEmailVerified`, `profileImage`, `licenseNumber`, `licenseVerify`, `licenseImage`, `nationalIdNumber`, `nationalVerify`, `UIDImage`, `password`, `isAuthorized`, `panNumber`, `sessionToken`, `createdOn`, `updatedOn`, `platform`, `remember_token`, `web_player_id`) VALUES
(31, 'jattin', 'jarora1994@gmail.com', '7289839897', 3, 1, 0, 1, NULL, '32523523523', 1, '852774600279.jpg', '5425345346', 1, '80748Algoos_taxi_Logo-01.jpg', '$2y$10$9PT5XbJuUElQ9421LWANG.8tyqRetwUXnPvMqEJ0Yq2e9mVG6IGhG', 1, '72389579', NULL, 1530690865, NULL, 'adminPanel', 'j1Vkv3lOksuCaY1HzOLspFFg9wuZKERG6wRJShYscmUwwVGXp6lhcaJKL6zp', NULL),
(32, 'gourav', 'gourav211992@gmail.com', '9034494937', 4, 1, 0, 1, NULL, '43543423', 1, '846722600279Bebe_Rexha_GÇô__No_Broken_Hearts__ft._Nicki_Minaj_(Official_Music_Video).0545.jpg', 'g435235623r3c', 1, '389882download.jpg', '$2y$10$9PT5XbJuUElQ9421LWANG.8tyqRetwUXnPvMqEJ0Yq2e9mVG6IGhG', 1, '7y35476545v34', NULL, 1530691007, NULL, 'adminPanel', '9hCD7xOky8D78Sm96HmpW6du0NxFAYGQ5zl4nj6zII86kDgk4bbJ8REEQj5Q', 'a660df2c-7697-4718-9f31-d89c952a9e12');

-- --------------------------------------------------------

--
-- Table structure for table `ls_gen_items`
--

CREATE TABLE `ls_gen_items` (
  `itemId` bigint(15) NOT NULL,
  `itemCode` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemDesc` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryId` int(5) NOT NULL,
  `isChargeable` int(1) NOT NULL DEFAULT '0',
  `itemStatus` int(1) NOT NULL DEFAULT '1',
  `isServiceAvailable` int(1) NOT NULL DEFAULT '0',
  `itemListStatus` int(1) NOT NULL DEFAULT '1',
  `createdOn` int(2) DEFAULT NULL,
  `createdBy` bigint(20) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_gen_items`
--

INSERT INTO `ls_gen_items` (`itemId`, `itemCode`, `itemDesc`, `categoryId`, `isChargeable`, `itemStatus`, `isServiceAvailable`, `itemListStatus`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`, `remarks`) VALUES
(16, 'Shirt/T-Shirt', '<p>Shirt/T-Shirt</p>', 1, 0, 1, 0, 1, 1525351146, 1, NULL, NULL, 'Shirt/T-Shirt'),
(18, 'Trousers /Pants /Jeans / Shorts', '<p>Trousers /Pants /Jeans / Shorts</p>', 1, 0, 1, 0, 1, 1525351185, 1, NULL, NULL, 'Trousers /Pants /Jeans / Shorts'),
(19, 'Thobe', '<p>Thobe</p>', 1, 0, 1, 0, 1, 1525351207, 1, NULL, NULL, 'Thobe'),
(20, 'Thobe cotton', '<p>Thobe cotton</p>', 1, 0, 1, 0, 1, 1525351226, 1, NULL, NULL, 'Thobe cotton'),
(21, 'Ghutra / Turban / Shemagh', '<p>Ghutra / Turban / Shemagh</p>', 1, 0, 1, 0, 1, 1525351250, 1, NULL, NULL, 'Ghutra / Turban / Shemagh'),
(22, 'Men\'s Suit (3 Pieces)', '<p>Men\'s Suit (3 Pieces)</p>', 1, 0, 1, 0, 1, 1525351269, 1, NULL, NULL, 'Men\'s Suit (3 Pieces)'),
(23, 'Military Uniform (2 Pieces)', '<p>Military Uniform (2 Pieces)</p>', 1, 0, 1, 0, 1, 1525351286, 1, NULL, NULL, 'Military Uniform (2 Pieces)'),
(24, 'Jeans Jacket', '<p>Jeans Jacket</p>', 1, 0, 1, 0, 1, 1525351309, 1, NULL, NULL, 'Jeans Jacket'),
(25, 'Tie', '<p>Tie</p>', 1, 0, 1, 0, 1, 1525351326, 1, NULL, NULL, 'Tie'),
(26, 'Men\'s Suit (3 Pieces)', '<p>Men\'s Suit (3 Pieces)</p>', 1, 0, 1, 0, 1, 1525351351, 1, NULL, NULL, 'Men\'s Suit (3 Pieces)'),
(27, 'Military Uniform (2 Pieces)', '<p>Military Uniform (2 Pieces)</p>', 1, 0, 1, 0, 1, 1525351371, 1, NULL, NULL, 'Military Uniform (2 Pieces)'),
(28, 'Jeans Jacket', '<p>Jeans Jacket</p>', 1, 0, 1, 0, 1, 1525351387, 1, NULL, NULL, 'Jeans Jacket'),
(29, 'Saree', '<p>It is use common saree</p>', 2, 0, 1, 0, 1, 1526462242, 5, NULL, NULL, NULL),
(30, 'Kurti', NULL, 2, 0, 1, 0, 1, 1526462289, 5, NULL, NULL, NULL),
(31, 'socks', NULL, 2, 0, 1, 0, 1, 1526642353, 1, NULL, NULL, NULL),
(33, 'Bedsheet', NULL, 3, 0, 1, 0, 1, 1527219089, 5, NULL, NULL, NULL),
(34, 'Curtain', '<p>wrgv</p>', 3, 0, 1, 0, 1, 1527219128, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ls_item_packaging`
--

CREATE TABLE `ls_item_packaging` (
  `uniqueId` int(10) NOT NULL,
  `itemId` bigint(15) NOT NULL,
  `packageId` int(5) NOT NULL,
  `price` double(7,2) DEFAULT NULL,
  `quantity` int(2) DEFAULT '1',
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_item_packaging`
--

INSERT INTO `ls_item_packaging` (`uniqueId`, `itemId`, `packageId`, `price`, `quantity`, `createdOn`) VALUES
(3, 15, 1, 120.00, 2, 1525343580),
(4, 16, 5, 23.00, 2, 1525343754),
(5, 17, 1, 50.00, 2, 1525351146),
(6, 18, 1, 75.00, 2, 1525351185),
(7, 19, 1, 5.00, 2, 1525351207),
(8, 20, 1, 5.00, 2, 1525351226),
(9, 21, 1, 5.00, 5, 1525351250),
(10, 22, 1, 5.00, 5, 1525351269),
(11, 23, 1, 5.00, 5, 1525351286),
(12, 24, 1, 5.00, 5, 1525351309),
(13, 25, 1, 5.00, 2, 1525351326),
(14, 26, 1, 5.00, 5, 1525351351),
(15, 27, 1, 5.00, 5, 1525351371),
(16, 28, 1, 5.00, 5, 1525351387),
(17, 29, 7, 30.00, 20, 1526462242),
(18, 30, 1, 6.00, 10, 1526462289),
(19, 31, 5, 5.00, 10, 1526642353),
(20, 32, 5, 1213.00, 1213, 1527069563),
(21, 33, 5, 10.00, 10, 1527219089),
(22, 34, 5, 50.00, 10, 1527219128);

-- --------------------------------------------------------

--
-- Table structure for table `ls_item_pricelist`
--

CREATE TABLE `ls_item_pricelist` (
  `custPriceListId` bigint(15) NOT NULL,
  `itemId` bigint(15) NOT NULL,
  `customerType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listNumber` int(10) DEFAULT NULL,
  `custPlReferenceNumber` int(10) DEFAULT NULL,
  `startTime` int(2) DEFAULT NULL,
  `endTime` int(2) DEFAULT NULL,
  `unitPrice` double(7,2) NOT NULL DEFAULT '0.00',
  `costPrice` double(7,2) DEFAULT '0.00',
  `discount` double(7,2) DEFAULT '0.00',
  `discountPercent` double(7,2) NOT NULL DEFAULT '0.00',
  `discFixVale` double(7,2) NOT NULL DEFAULT '0.00',
  `margin` double(7,2) NOT NULL DEFAULT '0.00',
  `marginAmt` double(7,2) NOT NULL DEFAULT '0.00',
  `tax` double(7,2) NOT NULL DEFAULT '0.00',
  `taxOnMargin` double(7,2) NOT NULL DEFAULT '0.00',
  `taxAmt` double(7,2) NOT NULL DEFAULT '0.00',
  `vat` double(7,2) NOT NULL DEFAULT '0.00',
  `vatOnMargin` double(7,2) NOT NULL DEFAULT '0.00',
  `vatAmt` double(7,2) NOT NULL,
  `rate` double(7,2) NOT NULL DEFAULT '1.00',
  `status` int(2) NOT NULL DEFAULT '0',
  `createdOn` int(2) DEFAULT NULL,
  `createdBy` bigint(20) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_item_pricelist`
--

INSERT INTO `ls_item_pricelist` (`custPriceListId`, `itemId`, `customerType`, `listNumber`, `custPlReferenceNumber`, `startTime`, `endTime`, `unitPrice`, `costPrice`, `discount`, `discountPercent`, `discFixVale`, `margin`, `marginAmt`, `tax`, `taxOnMargin`, `taxAmt`, `vat`, `vatOnMargin`, `vatAmt`, `rate`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 16, 'user', 1, NULL, NULL, NULL, 10.00, 10.00, 0.00, 0.00, 100.00, 0.05, 0.50, 0.05, 0.02, 0.50, 0.05, 0.02, 0.50, 11.03, 1, 1525349163, 1, NULL, NULL, 'hello', '2018-05-03 12:17:46', '2018-06-05 12:58:21'),
(2, 18, 'user', 1, NULL, NULL, NULL, 76.00, 80.00, 4.00, 0.05, 80.00, 0.05, 3.80, 0.05, 0.19, 3.80, 0.05, 0.19, 3.80, 87.78, 1, 1525351494, 1, NULL, NULL, 'hello', '2018-05-03 12:46:51', '2018-05-03 12:46:51'),
(3, 19, 'user', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351642, 1, NULL, NULL, 'Thobe', '2018-05-03 12:47:40', '2018-05-03 12:47:40'),
(4, 20, 'user', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351665, 1, NULL, NULL, 'Thobe cotton', '2018-05-03 12:48:12', '2018-05-03 12:48:12'),
(5, 21, 'user', 1, NULL, NULL, NULL, 0.99, 1.00, 0.01, 0.01, 1.00, 0.01, 0.01, 0.01, 0.00, 0.01, 0.01, 0.00, 0.01, 1.02, 1, 1525351702, 1, NULL, NULL, 'Thobe cotton', '2018-05-03 12:48:39', '2018-05-03 12:48:39'),
(7, 22, 'corp', 1, NULL, NULL, NULL, 4.75, 5.00, 0.25, 0.05, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 4.89, 1, 1525351751, 1, NULL, NULL, 'Thobe cotton', '2018-05-03 12:49:47', '2018-05-03 12:49:47'),
(8, 23, 'corp', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351821, 1, NULL, NULL, 'Thobe cotton', '2018-05-03 12:50:35', '2018-05-03 12:50:35'),
(9, 24, 'corp', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351845, 1, NULL, NULL, 'Jeans Jacket', '2018-05-03 12:51:01', '2018-05-03 12:51:01'),
(10, 25, 'corp', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351867, 1, NULL, NULL, 'Tie', '2018-05-03 12:51:23', '2018-05-03 12:51:23'),
(11, 26, 'user', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351893, 1, NULL, NULL, 'Men\'s Suit (3 Pieces)', '2018-05-03 12:51:51', '2018-05-03 12:51:51'),
(12, 27, 'corp', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351919, 1, NULL, NULL, 'Military Uniform (2 Pieces)', '2018-05-03 12:52:14', '2018-05-03 12:52:14'),
(13, 28, 'corp', 1, NULL, NULL, NULL, 4.95, 5.00, 0.05, 0.01, 1.00, 0.01, 0.05, 0.01, 0.00, 0.05, 0.01, 0.00, 0.05, 5.10, 1, 1525351941, 1, NULL, NULL, 'Jeans Jacket', '2018-05-03 12:52:37', '2018-05-03 12:52:37'),
(14, 30, 'corp', 5, NULL, NULL, NULL, 94.00, 100.00, 6.00, 0.06, 80.00, 0.09, 8.46, 0.09, 0.76, 8.46, 0.09, 0.76, 8.46, 111.68, 1, 1526463688, 5, NULL, NULL, 'testing', '2018-05-16 09:42:10', '2018-05-23 08:48:44'),
(15, 31, 'user', 1, NULL, NULL, NULL, 9.50, 10.00, 0.50, 0.05, 10.00, 0.05, 0.48, 0.05, 0.02, 0.48, 0.00, 0.00, 0.00, 10.47, 1, 1526642459, 1, NULL, NULL, 'asgvcxb', '2018-05-18 11:32:55', '2018-05-18 11:32:55'),
(16, 33, 'user', 1, NULL, NULL, NULL, 38.00, 40.00, 2.00, 0.05, 10.00, 0.05, 1.90, 0.05, 0.10, 1.90, 0.05, 0.10, 1.90, 41.89, 1, 1527219172, 5, NULL, NULL, NULL, '2018-05-25 03:36:21', '2018-05-25 03:36:21'),
(17, 34, 'user', 1, NULL, NULL, NULL, 47.50, 50.00, 2.50, 0.05, 10.00, 0.05, 2.38, 0.05, 0.12, 2.38, 0.05, 0.12, 2.38, 52.37, 1, 1527219426, 5, NULL, NULL, NULL, '2018-05-25 03:37:34', '2018-05-25 03:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `ls_laundryman_master`
--

CREATE TABLE `ls_laundryman_master` (
  `laundryId` int(10) NOT NULL,
  `laundryName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressId` bigint(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `isMobileVerified` int(1) NOT NULL DEFAULT '0',
  `isEmailVerified` int(1) NOT NULL DEFAULT '0',
  `profileImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseVerify` int(2) NOT NULL DEFAULT '0',
  `licenseImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalIdNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalVerify` int(2) NOT NULL DEFAULT '0',
  `UIDImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAuthorized` int(2) NOT NULL DEFAULT '0',
  `panNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sessionToken` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `platform` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_laundryman_master`
--

INSERT INTO `ls_laundryman_master` (`laundryId`, `laundryName`, `email`, `phone`, `addressId`, `status`, `isMobileVerified`, `isEmailVerified`, `profileImage`, `licenseNumber`, `licenseVerify`, `licenseImage`, `nationalIdNumber`, `nationalVerify`, `UIDImage`, `isAuthorized`, `panNumber`, `sessionToken`, `password`, `createdOn`, `updatedOn`, `platform`, `remember_token`) VALUES
(9, 'jattin', 'jarora1994@gmail.com', '7289839897', 188, 1, 0, 1, NULL, NULL, 1, '', '5425345346', 1, '', 1, '748923ndfsi', '62ksdqUINDj3FcaRls3WdmGiDAUhfuxmwRPJiJr5', '$2y$10$Glxi0rTUuFtE9KBkAwu.D.IOmDI.EO0BULXGTXQz5/ZFiF7sxtZvC', 1529486386, 1529487568, 'adminPanel', 'TrnwH9MysZ6GTGMvziL44QjLfOITS9vPLg8KevMuoMFbQBRS2Ni05YOP55zN');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_06_20_102349_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification_log`
--

CREATE TABLE `notification_log` (
  `uniqueId` bigint(15) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `objectType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notificationId` int(10) NOT NULL,
  `isViewed` int(1) NOT NULL DEFAULT '0',
  `sentOn` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `statusIOS` int(2) DEFAULT NULL,
  `statusRemarks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusIOSRemarks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_log`
--

INSERT INTO `notification_log` (`uniqueId`, `objectId`, `objectType`, `notificationId`, `isViewed`, `sentOn`, `status`, `statusIOS`, `statusRemarks`, `statusIOSRemarks`, `created_at`, `updated_at`) VALUES
(42, 121, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(41, 120, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(40, 119, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(39, 118, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(38, 117, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(37, 116, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(36, 115, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(35, 114, 'user', 35, 1, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-24 18:37:55'),
(34, 113, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(33, 112, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(32, 111, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(31, 110, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(30, 109, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(29, 107, 'user', 35, 1, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-25 11:49:08'),
(28, 93, 'user', 35, 1, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-21 17:19:32'),
(27, 78, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(26, 76, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(25, 43, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(24, 5, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30'),
(23, 3, 'user', 35, 1, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-08-30 17:22:05'),
(22, 107, 'user', 34, 1, NULL, 1, NULL, NULL, NULL, '2018-06-05 10:59:41', '2018-06-25 11:49:08'),
(43, 122, 'user', 35, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `notification_master`
--

CREATE TABLE `notification_master` (
  `uniqueId` int(10) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmd` int(1) DEFAULT NULL,
  `createdOn` int(5) DEFAULT NULL,
  `scheduleFor` int(2) DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_master`
--

INSERT INTO `notification_master` (`uniqueId`, `title`, `message`, `image`, `cmd`, `createdOn`, `scheduleFor`, `created_at`, `updated_at`) VALUES
(4, 'testing', 'launder services is a good server for laundry', 'https://developer.launderservices.com/images/notification_images/49635Jellyfish.jpg', NULL, 2147483647, NULL, '2018-05-15 13:09:47', '2018-05-15 13:09:47'),
(5, 'jattin', 'nice pics bussy', 'https://developer.launderservices.com/images/notification_images/271081image.png', NULL, 2147483647, NULL, '2018-05-16 03:31:34', '2018-05-16 03:31:34'),
(6, 'jattin', 'fefewew', 'https://developer.launderservices.com/images/notification_images/271081image.png', NULL, 2147483647, NULL, '2018-05-16 03:32:17', '2018-05-16 03:32:17'),
(7, 'jattin', 'vdsfvds', 'https://developer.launderservices.com/images/notification_images/271081image.png', NULL, 2147483647, NULL, '2018-05-16 03:35:49', '2018-05-16 03:35:49'),
(8, 'dsgdsfdsg', 'fsdfds', 'https://developer.launderservices.com/images/notification_images/386199C_Users_Muser_AppData_Local_Packages_Microsoft.SkypeApp_kzf8qxf38zg5c_LocalState_63a71c5f', NULL, NULL, NULL, '2018-05-16 03:38:59', '2018-05-16 03:38:59'),
(9, 'gdsfgd', 'gddsfgd', 'https://developer.launderservices.com/images/notification_images/143159logo.png', NULL, 1526442950, NULL, '2018-05-16 03:41:51', '2018-05-16 03:41:51'),
(10, 'gdfgdfs', 'gdgdfsdf', 'https://developer.launderservices.com/images/notification_images/657534logo.png', NULL, NULL, NULL, '2018-05-16 03:42:54', '2018-05-16 03:42:54'),
(11, 'gdfgdfs', 'gdgdfsdf', 'https://developer.launderservices.com/images/notification_images/897553logo.png', NULL, NULL, NULL, '2018-05-16 03:43:12', '2018-05-16 03:43:12'),
(12, 'fsfsd', 'fdsfdsdfs', 'https://developer.launderservices.com/images/notification_images/484350Jellyfish.jpg', NULL, 1526442193, NULL, '2018-05-16 03:45:39', '2018-05-16 03:45:39'),
(13, 'shoeb', 'gbsfgtre', 'https://developer.launderservices.com/images/notification_images/856301Jellyfish.jpg', NULL, 1526442950, NULL, '2018-05-16 03:56:14', '2018-05-16 03:56:14'),
(14, 'shoeb', 'gbsfgtre', 'https://developer.launderservices.com/images/notification_images/49635Jellyfish.jpg', NULL, 1526442950, NULL, '2018-05-16 03:57:06', '2018-05-16 03:57:06'),
(15, 'shoeb', 'gbsfgtre', 'https://developer.launderservices.com/images/notification_images/386978Jellyfish.jpg', NULL, 1526442950, NULL, '2018-05-16 03:57:52', '2018-05-16 03:57:52'),
(16, 'jattin', 'gsdsgdsgsd', 'https://developer.launderservices.com/images/notification_images/392525Koala.jpg', NULL, NULL, NULL, '2018-05-16 07:40:58', '2018-05-16 07:40:58'),
(17, 'sdkjfkjsd', 'dfgdfgdf', 'https://developer.launderservices.com/images/notification_images/711530Hydrangeas.jpg', NULL, NULL, NULL, '2018-05-16 07:43:43', '2018-05-16 07:43:43'),
(18, 'fgsdgds', 'sdf dsfds', 'https://developer.launderservices.com/images/notification_images/48960Koala.jpg', NULL, 1526456624, NULL, '2018-05-16 07:45:08', '2018-05-16 07:45:08'),
(19, 'sdfdsfds', 'fsdfdsfds', 'https://developer.launderservices.com/images/notification_images/329379Koala.jpg', NULL, 1526456709, NULL, '2018-05-16 07:47:05', '2018-05-16 07:47:05'),
(20, '43543', 'gdgfdsd', 'https://developer.launderservices.com/images/notification_images/740605Jellyfish.jpg', NULL, 1526472617, NULL, '2018-05-16 12:10:44', '2018-05-16 12:10:44'),
(21, 'gdfgdf', 'dfgdfgdf', 'https://developer.launderservices.com/images/notification_images/972802Jellyfish.jpg', NULL, 1526472650, NULL, '2018-05-16 12:15:31', '2018-05-16 12:15:31'),
(22, 'gdfgdf', 'dfgdfgdf', 'https://developer.launderservices.com/images/notification_images/935500Jellyfish.jpg', NULL, 1526472650, NULL, '2018-05-16 12:16:19', '2018-05-16 12:16:19'),
(23, 'testing', 'testing', 'https://developer.launderservices.com/images/notification_images/719226Lighthouse.jpg', NULL, 1526560436, NULL, '2018-05-17 12:34:27', '2018-05-17 12:34:27'),
(24, 'testing', 'testing', 'https://developer.launderservices.com/images/notification_images/587651Lighthouse.jpg', NULL, 1526560436, NULL, '2018-05-17 12:35:47', '2018-05-17 12:35:47'),
(25, 'Testing by shoeb', 'Hi Shoeb It is just checking', 'https://developer.launderservices.com/images/notification_images/50095flower.jpg', NULL, 1526623871, NULL, '2018-05-18 06:12:35', '2018-05-18 06:12:35'),
(26, 'Testing by shoeb', 'twesting', 'https://developer.launderservices.com/images/notification_images/159990cat.jpg', NULL, 1526624387, NULL, '2018-05-18 06:20:19', '2018-05-18 06:20:19'),
(27, 'Testing by shoeb', 'wetfv', 'https://developer.launderservices.com/images/notification_images/328751goals.gif', NULL, 1526624421, NULL, '2018-05-18 06:21:30', '2018-05-18 06:21:30'),
(28, 'ffsdf', 'fsdfsdf', 'https://developer.launderservices.com/images/notification_images/689858flower.jpg', NULL, 1526624928, NULL, '2018-05-18 06:29:00', '2018-05-18 06:29:00'),
(29, 'gdfdfg', 'dfgdfg', 'https://developer.launderservices.com/images/notification_images/440374image.png', NULL, 1526624129, NULL, '2018-05-18 06:58:08', '2018-05-18 06:58:08'),
(30, 'Hel', 'dsfgbm', 'https://developer.launderservices.com/images/notification_images/17816Tulips.jpg', NULL, 1526643742, NULL, '2018-05-18 11:44:09', '2018-05-18 11:44:09'),
(31, 'testing', 'testing', 'https://developer.launderservices.com/images/notification_images/105063Lighthouse.jpg', NULL, 1526643849, NULL, '2018-05-18 11:51:43', '2018-05-18 11:51:43'),
(32, 'dgd', 'dffddfgdfg', 'https://developer.launderservices.com/images/notification_images/422205Desert.jpg', NULL, 1526976822, NULL, '2018-05-22 08:14:14', '2018-05-22 08:14:14'),
(33, 'Hello', 'dasfgrsgbsav', 'https://developer.launderservices.com/images/notification_images/568140ea8e7579-9ed1-4f5f-a20c-cec2e9934c55.png', NULL, 1527482824, NULL, '2018-05-28 04:47:48', '2018-05-28 04:47:48'),
(34, 'WEEWGF', 'WASRGVDBV DARVG', 'https://developer.launderservices.com/images/notification_images/464984dog.jpg', NULL, 1528176470, NULL, '2018-06-05 10:59:41', '2018-06-05 10:59:41'),
(35, 'WEEWGF', 'hello nice', 'https://developer.launderservices.com/images/notification_images/464984dog.jpg', NULL, 1529468122, NULL, '2018-06-20 10:31:30', '2018-06-20 10:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderDetailId` bigint(20) NOT NULL,
  `orderId` bigint(20) NOT NULL,
  `itemId` bigint(15) NOT NULL,
  `itemName` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(3) DEFAULT '0',
  `unitPrice` double(8,2) NOT NULL DEFAULT '0.00',
  `costPrice` double(8,2) NOT NULL DEFAULT '0.00',
  `subTotal` double(8,2) NOT NULL DEFAULT '0.00',
  `isRemoved` int(2) NOT NULL DEFAULT '0',
  `removedOn` int(2) DEFAULT NULL,
  `tax` double(7,2) DEFAULT NULL,
  `taxAmount` double(7,2) DEFAULT NULL,
  `rate` double(7,2) DEFAULT NULL,
  `isFavorite` int(1) NOT NULL DEFAULT '0',
  `packageId` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderDetailId`, `orderId`, `itemId`, `itemName`, `quantity`, `unitPrice`, `costPrice`, `subTotal`, `isRemoved`, `removedOn`, `tax`, `taxAmount`, `rate`, `isFavorite`, `packageId`, `createdOn`, `updatedOn`, `remarks`) VALUES
(392, 1526615836, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 416.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527676298, NULL, NULL),
(393, 1526615836, 18, 'Trousers /Pants /Jeans / Shorts', 4, 0.00, 0.00, 352.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527676298, NULL, NULL),
(394, 1526615837, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527676333, NULL, NULL),
(395, 1526615838, 20, 'Thobe cotton', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527676355, NULL, NULL),
(396, 1526615838, 21, 'Ghutra / Turban / Shemagh', 4, 0.00, 0.00, 8.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527676355, NULL, NULL),
(397, 1526615839, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527676375, NULL, NULL),
(398, 1526615839, 22, 'Men\'s Suit (3 Pieces)', 3, 0.00, 0.00, 15.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527676375, NULL, NULL),
(399, 1526615840, 22, 'Men\'s Suit (3 Pieces)', 3, 0.00, 0.00, 15.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527676397, NULL, NULL),
(400, 1526615841, 22, 'Men\'s Suit (3 Pieces)', 4, 0.00, 0.00, 20.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527676424, NULL, NULL),
(401, 1526615841, 23, 'Military Uniform (2 Pieces)', 5, 0.00, 0.00, 30.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527676424, NULL, NULL),
(405, 1526615843, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527676588, NULL, NULL),
(406, 1526615843, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527676588, NULL, NULL),
(407, 1526615843, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527676588, NULL, NULL),
(408, 1526615843, 20, 'Thobe cotton', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527676588, NULL, NULL),
(409, 1526615844, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527677953, NULL, NULL),
(410, 1526615844, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527677953, NULL, NULL),
(411, 1526615844, 22, 'Men\'s Suit (3 Pieces)', 4, 0.00, 0.00, 20.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527677953, NULL, NULL),
(412, 1526615844, 23, 'Military Uniform (2 Pieces)', 5, 0.00, 0.00, 30.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527677953, NULL, NULL),
(440, 1526615855, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527679218, NULL, NULL),
(441, 1526615855, 22, 'Men\'s Suit (3 Pieces)', 3, 0.00, 0.00, 15.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527679218, NULL, NULL),
(442, 1526615855, 23, 'Military Uniform (2 Pieces)', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679218, NULL, NULL),
(443, 1526615855, 24, 'Jeans Jacket', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679218, NULL, NULL),
(444, 1526615855, 25, 'Tie', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679218, NULL, NULL),
(461, 1526615859, 24, 'Jeans Jacket', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679397, NULL, NULL),
(462, 1526615859, 25, 'Tie', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679397, NULL, NULL),
(469, 1526615861, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 416.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527679467, NULL, NULL),
(470, 1526615861, 18, 'Trousers /Pants /Jeans / Shorts', 4, 0.00, 0.00, 352.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527679467, NULL, NULL),
(471, 1526615862, 22, 'Men\'s Suit (3 Pieces)', 4, 0.00, 0.00, 20.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527679501, NULL, NULL),
(472, 1526615862, 23, 'Military Uniform (2 Pieces)', 5, 0.00, 0.00, 30.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679501, NULL, NULL),
(473, 1526615862, 24, 'Jeans Jacket', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679501, NULL, NULL),
(478, 1526615864, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679686, NULL, NULL),
(479, 1526615864, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679686, NULL, NULL),
(480, 1526615864, 22, 'Men\'s Suit (3 Pieces)', 4, 0.00, 0.00, 20.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527679686, NULL, NULL),
(481, 1526615864, 23, 'Military Uniform (2 Pieces)', 5, 0.00, 0.00, 30.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679686, NULL, NULL),
(486, 1526615866, 23, 'Military Uniform (2 Pieces)', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679806, NULL, NULL),
(487, 1526615866, 24, 'Jeans Jacket', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679806, NULL, NULL),
(488, 1526615866, 25, 'Tie', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527679806, NULL, NULL),
(497, 1526615869, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527680062, NULL, NULL),
(498, 1526615869, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527680062, NULL, NULL),
(499, 1526615869, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527680062, NULL, NULL),
(500, 1526615869, 20, 'Thobe cotton', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527680062, NULL, NULL),
(501, 1526615869, 21, 'Ghutra / Turban / Shemagh', 1, 0.00, 0.00, 2.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527680062, NULL, NULL),
(502, 1526615870, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527680113, NULL, NULL),
(503, 1526615870, 23, 'Military Uniform (2 Pieces)', 5, 0.00, 0.00, 30.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527680113, NULL, NULL),
(522, 1526615876, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 416.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527681036, NULL, NULL),
(523, 1526615876, 18, 'Trousers /Pants /Jeans / Shorts', 4, 0.00, 0.00, 352.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527681036, NULL, NULL),
(528, 1526615879, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 312.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527681817, NULL, NULL),
(529, 1526615879, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527681817, NULL, NULL),
(530, 1526615879, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527681817, NULL, NULL),
(531, 1526615880, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527681954, NULL, NULL),
(532, 1526615880, 21, 'Ghutra / Turban / Shemagh', 1, 0.00, 0.00, 2.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527681954, NULL, NULL),
(533, 1526615880, 22, 'Men\'s Suit (3 Pieces)', 1, 0.00, 0.00, 5.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527681954, NULL, NULL),
(535, 1526615882, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527684279, NULL, NULL),
(536, 1526615882, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527684279, NULL, NULL),
(537, 1526615883, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527684316, NULL, NULL),
(538, 1526615883, 20, 'Thobe cotton', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527684316, NULL, NULL),
(539, 1526615884, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527684443, NULL, NULL),
(540, 1526615884, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527684443, NULL, NULL),
(551, 1526615889, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527684706, NULL, NULL),
(552, 1526615889, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527684706, NULL, NULL),
(553, 1526615889, 23, 'Military Uniform (2 Pieces)', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527684706, NULL, NULL),
(558, 1526615891, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 104.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527712245, NULL, NULL),
(559, 1526615891, 24, 'Jeans Jacket', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527712245, NULL, NULL),
(560, 1526615891, 30, 'Kurti', 1, 0.00, 0.00, 112.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1527712245, NULL, NULL),
(561, 1526615891, 33, 'Bedsheet', 1, 0.00, 0.00, 42.00, 0, NULL, NULL, NULL, 41.89, 0, NULL, 1527712245, NULL, NULL),
(565, 1526615894, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527737781, NULL, NULL),
(566, 1526615894, 20, 'Thobe cotton', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527737781, NULL, NULL),
(567, 1526615894, 21, 'Ghutra / Turban / Shemagh', 1, 0.00, 0.00, 2.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527737781, NULL, NULL),
(570, 1526615896, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527737989, NULL, NULL),
(571, 1526615896, 20, 'Thobe cotton', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527737989, NULL, NULL),
(576, 1526615898, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 312.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527749825, NULL, NULL),
(577, 1526615898, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527749825, NULL, NULL),
(578, 1526615898, 30, 'Kurti', 2, 0.00, 0.00, 224.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1527749825, NULL, NULL),
(579, 1526615898, 31, 'socks', 1, 0.00, 0.00, 11.00, 0, NULL, NULL, NULL, 10.47, 0, NULL, 1527749825, NULL, NULL),
(613, 1526615904, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 312.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527752798, NULL, NULL),
(614, 1526615904, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527752798, NULL, NULL),
(615, 1526615904, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527752798, NULL, NULL),
(616, 1526615904, 30, 'Kurti', 2, 0.00, 0.00, 224.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1527752798, NULL, NULL),
(617, 1526615904, 31, 'socks', 2, 0.00, 0.00, 22.00, 0, NULL, NULL, NULL, 10.47, 0, NULL, 1527752798, NULL, NULL),
(618, 1526615904, 33, 'Bedsheet', 2, 0.00, 0.00, 84.00, 0, NULL, NULL, NULL, 41.89, 0, NULL, 1527752798, NULL, NULL),
(619, 1526615904, 34, 'Curtain', 1, 0.00, 0.00, 53.00, 0, NULL, NULL, NULL, 52.37, 0, NULL, 1527752798, NULL, NULL),
(632, 1526615908, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527752988, NULL, NULL),
(633, 1526615908, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527752988, NULL, NULL),
(634, 1526615909, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527758556, NULL, NULL),
(635, 1526615909, 19, 'Thobe', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527758556, NULL, NULL),
(653, 1526615917, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527759760, NULL, NULL),
(654, 1526615917, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527759760, NULL, NULL),
(655, 1526615917, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527759760, NULL, NULL),
(658, 1526615919, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527759921, NULL, NULL),
(659, 1526615919, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527759921, NULL, NULL),
(660, 1526615920, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527764112, NULL, NULL),
(661, 1526615921, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527764125, NULL, NULL),
(662, 1526615921, 20, 'Thobe cotton', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527764125, NULL, NULL),
(663, 1526615921, 21, 'Ghutra / Turban / Shemagh', 4, 0.00, 0.00, 8.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527764125, NULL, NULL),
(664, 1526615921, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527764125, NULL, NULL),
(665, 1526615922, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527764226, NULL, NULL),
(666, 1526615922, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527764226, NULL, NULL),
(667, 1526615922, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527764226, NULL, NULL),
(668, 1526615923, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527764461, NULL, NULL),
(669, 1526615924, 19, 'Thobe', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527764806, NULL, NULL),
(670, 1526615924, 20, 'Thobe cotton', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527764806, NULL, NULL),
(671, 1526615925, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527823521, NULL, NULL),
(672, 1526615925, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527823521, NULL, NULL),
(673, 1526615926, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527831207, NULL, NULL),
(674, 1526615926, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527831207, NULL, NULL),
(675, 1526615926, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527831207, NULL, NULL),
(676, 1526615926, 20, 'Thobe cotton', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527831207, NULL, NULL),
(677, 1526615926, 21, 'Ghutra / Turban / Shemagh', 3, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527831207, NULL, NULL),
(678, 1526615926, 22, 'Men\'s Suit (3 Pieces)', 3, 0.00, 0.00, 15.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527831207, NULL, NULL),
(679, 1526615927, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527831882, NULL, NULL),
(680, 1526615927, 20, 'Thobe cotton', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527831882, NULL, NULL),
(689, 1526615930, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527832797, NULL, NULL),
(690, 1526615930, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527832797, NULL, NULL),
(691, 1526615930, 22, 'Men\'s Suit (3 Pieces)', 1, 0.00, 0.00, 5.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527832797, NULL, NULL),
(692, 1526615930, 23, 'Military Uniform (2 Pieces)', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527832797, NULL, NULL),
(693, 1526615930, 25, 'Tie', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527832797, NULL, NULL),
(694, 1526615931, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527832808, NULL, NULL),
(695, 1526615931, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527832808, NULL, NULL),
(708, 1526615935, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527833445, NULL, NULL),
(709, 1526615936, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527833561, NULL, NULL),
(710, 1526615936, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527833561, NULL, NULL),
(711, 1526615937, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 416.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527833609, NULL, NULL),
(712, 1526615937, 18, 'Trousers /Pants /Jeans / Shorts', 4, 0.00, 0.00, 352.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527833609, NULL, NULL),
(713, 1526615938, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 416.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527833649, NULL, NULL),
(724, 1526615941, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527833788, NULL, NULL),
(730, 1526615943, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527833979, NULL, NULL),
(731, 1526615943, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527833979, NULL, NULL),
(732, 1526615943, 24, 'Jeans Jacket', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527833979, NULL, NULL),
(733, 1526615943, 30, 'Kurti', 2, 0.00, 0.00, 224.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1527833979, NULL, NULL),
(734, 1526615943, 31, 'socks', 2, 0.00, 0.00, 22.00, 0, NULL, NULL, NULL, 10.47, 0, NULL, 1527833979, NULL, NULL),
(735, 1526615944, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527834049, NULL, NULL),
(736, 1526615944, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1527834049, NULL, NULL),
(737, 1526615944, 23, 'Military Uniform (2 Pieces)', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527834049, NULL, NULL),
(738, 1526615944, 25, 'Tie', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527834049, NULL, NULL),
(739, 1526615945, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527834699, NULL, NULL),
(746, 1526615947, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 312.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527836378, NULL, NULL),
(747, 1526615947, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527836378, NULL, NULL),
(748, 1526615947, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527836378, NULL, NULL),
(749, 1526615947, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527836378, NULL, NULL),
(750, 1526615947, 23, 'Military Uniform (2 Pieces)', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527836378, NULL, NULL),
(751, 1526615947, 30, 'Kurti', 1, 0.00, 0.00, 112.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1527836378, NULL, NULL),
(758, 1526615949, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527836580, NULL, NULL),
(759, 1526615949, 30, 'Kurti', 2, 0.00, 0.00, 224.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1527836580, NULL, NULL),
(760, 1526615949, 31, 'socks', 2, 0.00, 0.00, 22.00, 0, NULL, NULL, NULL, 10.47, 0, NULL, 1527836580, NULL, NULL),
(761, 1526615949, 33, 'Bedsheet', 2, 0.00, 0.00, 84.00, 0, NULL, NULL, NULL, 41.89, 0, NULL, 1527836580, NULL, NULL),
(762, 1526615950, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527836605, NULL, NULL),
(763, 1526615950, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527836605, NULL, NULL),
(764, 1526615950, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527836605, NULL, NULL),
(765, 1526615950, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1527836605, NULL, NULL),
(766, 1526615950, 30, 'Kurti', 2, 0.00, 0.00, 224.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1527836605, NULL, NULL),
(767, 1526615950, 31, 'socks', 2, 0.00, 0.00, 22.00, 0, NULL, NULL, NULL, 10.47, 0, NULL, 1527836605, NULL, NULL),
(768, 1526615951, 16, 'Shirt/T-Shirt', 5, 0.00, 0.00, 520.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527836680, NULL, NULL),
(769, 1526615951, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527836680, NULL, NULL),
(770, 1526615951, 19, 'Thobe', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527836680, NULL, NULL),
(771, 1526615951, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527836680, NULL, NULL),
(772, 1526615952, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1527837889, NULL, NULL),
(773, 1526615952, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527837889, NULL, NULL),
(774, 1526615953, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 104.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527878372, NULL, NULL),
(775, 1526615953, 24, 'Jeans Jacket', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527878372, NULL, NULL),
(776, 1526615954, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 104.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1527883658, NULL, NULL),
(777, 1526615954, 25, 'Tie', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1527883658, NULL, NULL),
(778, 1526615955, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1528083443, NULL, NULL),
(779, 1526615955, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528083443, NULL, NULL),
(780, 1526615956, 18, 'Trousers /Pants /Jeans / Shorts', 4, 0.00, 0.00, 352.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528086991, NULL, NULL),
(781, 1526615957, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528099141, NULL, NULL),
(782, 1526615958, 19, 'Thobe', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528104765, NULL, NULL),
(783, 1526615959, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528104818, NULL, NULL),
(784, 1526615960, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528182260, NULL, NULL),
(785, 1526615961, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528182326, NULL, NULL),
(786, 1526615961, 19, 'Thobe', 3, 0.00, 0.00, 18.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528182326, NULL, NULL),
(787, 1526615962, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 208.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1528183575, NULL, NULL),
(788, 1526615962, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528183575, NULL, NULL),
(801, 1526615966, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 48.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1528193290, NULL, NULL),
(802, 1526615966, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528193290, NULL, NULL),
(803, 1526615966, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1528193290, NULL, NULL),
(804, 1526615966, 24, 'Jeans Jacket', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528193290, NULL, NULL),
(805, 1526615967, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 312.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1528193785, NULL, NULL),
(806, 1526615967, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528193785, NULL, NULL),
(807, 1526615967, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528193785, NULL, NULL),
(808, 1526615967, 30, 'Kurti', 2, 0.00, 0.00, 224.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1528193785, NULL, NULL),
(809, 1526615967, 31, 'socks', 2, 0.00, 0.00, 22.00, 0, NULL, NULL, NULL, 10.47, 0, NULL, 1528193785, NULL, NULL),
(810, 1526615967, 33, 'Bedsheet', 2, 0.00, 0.00, 84.00, 0, NULL, NULL, NULL, 41.89, 0, NULL, 1528193785, NULL, NULL),
(811, 1526615967, 34, 'Curtain', 1, 0.00, 0.00, 53.00, 0, NULL, NULL, NULL, 52.37, 0, NULL, 1528193785, NULL, NULL),
(812, 1526615968, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 312.00, 0, NULL, NULL, NULL, 103.95, 0, NULL, 1528198258, NULL, NULL),
(813, 1526615968, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528198258, NULL, NULL),
(814, 1526615968, 19, 'Thobe', 4, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528198258, NULL, NULL),
(815, 1526615968, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528198258, NULL, NULL),
(816, 1526615968, 23, 'Military Uniform (2 Pieces)', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1528198258, NULL, NULL),
(817, 1526615968, 30, 'Kurti', 1, 0.00, 0.00, 112.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1528198258, NULL, NULL),
(818, 1526615969, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1528198786, NULL, NULL),
(819, 1526615969, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528198786, NULL, NULL),
(820, 1526615969, 30, 'Kurti', 2, 0.00, 0.00, 224.00, 0, NULL, NULL, NULL, 111.68, 0, NULL, 1528198786, NULL, NULL),
(821, 1526615969, 31, 'socks', 2, 0.00, 0.00, 22.00, 0, NULL, NULL, NULL, 10.47, 0, NULL, 1528198786, NULL, NULL),
(822, 1526615969, 33, 'Bedsheet', 2, 0.00, 0.00, 84.00, 0, NULL, NULL, NULL, 41.89, 0, NULL, 1528198786, NULL, NULL),
(823, 1526615969, 34, 'Curtain', 2, 0.00, 0.00, 106.00, 0, NULL, NULL, NULL, 52.37, 0, NULL, 1528198786, NULL, NULL),
(824, 1526615970, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1528200138, NULL, NULL),
(825, 1526615970, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528200138, NULL, NULL),
(826, 1526615971, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1528267300, NULL, NULL),
(827, 1526615971, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528267300, NULL, NULL),
(828, 1526615972, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1528267317, NULL, NULL),
(829, 1526615972, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1528267317, NULL, NULL),
(830, 1526615973, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1528961762, NULL, NULL),
(831, 1526615973, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1528961762, NULL, NULL),
(832, 1526615974, 25, 'Tie', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529397743, NULL, NULL),
(833, 1526615975, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529490121, NULL, NULL),
(834, 1526615975, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529490121, NULL, NULL),
(837, 1526615977, 33, 'Bedsheet', 1, 0.00, 0.00, 42.00, 0, NULL, NULL, NULL, 41.89, 0, NULL, 1529552889, NULL, NULL),
(838, 1526615977, 34, 'Curtain', 1, 0.00, 0.00, 53.00, 0, NULL, NULL, NULL, 52.37, 0, NULL, 1529552889, NULL, NULL),
(839, 1526615978, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529561396, NULL, NULL),
(840, 1526615978, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529561396, NULL, NULL),
(841, 1526615979, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529561534, NULL, NULL),
(842, 1526615979, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529561534, NULL, NULL),
(844, 1526615981, 22, 'Men\'s Suit (3 Pieces)', 1, 0.00, 0.00, 5.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1529578311, NULL, NULL),
(845, 1526615981, 23, 'Military Uniform (2 Pieces)', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529578311, NULL, NULL),
(846, 1526615982, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529578943, NULL, NULL),
(847, 1526615982, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529578943, NULL, NULL),
(848, 1526615983, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529579113, NULL, NULL),
(849, 1526615983, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529579113, NULL, NULL),
(850, 1526615983, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529579113, NULL, NULL),
(851, 1526615983, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1529579113, NULL, NULL),
(852, 1526615983, 22, 'Men\'s Suit (3 Pieces)', 3, 0.00, 0.00, 15.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1529579113, NULL, NULL),
(856, 1526615986, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529580199, NULL, NULL),
(857, 1526615986, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529580199, NULL, NULL),
(860, 1526615988, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529580446, NULL, NULL),
(861, 1526615988, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529580446, NULL, NULL),
(862, 1526615988, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529580446, NULL, NULL),
(863, 1526615989, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529580629, NULL, NULL),
(864, 1526615989, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529580629, NULL, NULL),
(865, 1526615989, 20, 'Thobe cotton', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529580629, NULL, NULL),
(866, 1526615989, 21, 'Ghutra / Turban / Shemagh', 1, 0.00, 0.00, 2.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1529580629, NULL, NULL),
(867, 1526615990, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529580904, NULL, NULL),
(868, 1526615990, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529580904, NULL, NULL),
(875, 1526615993, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529581312, NULL, NULL),
(876, 1526615993, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529581312, NULL, NULL),
(877, 1526615993, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529581312, NULL, NULL),
(878, 1526615993, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529581312, NULL, NULL),
(879, 1526615994, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529581728, NULL, NULL),
(880, 1526615994, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529581728, NULL, NULL),
(881, 1526615995, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529581900, NULL, NULL),
(882, 1526615995, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529581900, NULL, NULL),
(883, 1526615996, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 36.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529581920, NULL, NULL),
(884, 1526615996, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529581920, NULL, NULL),
(885, 1526615997, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529582802, NULL, NULL),
(886, 1526615998, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529582891, NULL, NULL),
(887, 1526615998, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529582891, NULL, NULL),
(888, 1526615999, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529582941, NULL, NULL),
(889, 1526615999, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529582941, NULL, NULL),
(890, 1526616000, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 36.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529583016, NULL, NULL),
(891, 1526616000, 18, 'Trousers /Pants /Jeans / Shorts', 4, 0.00, 0.00, 352.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529583016, NULL, NULL),
(892, 1526616001, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 48.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529583044, NULL, NULL),
(893, 1526616001, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529583044, NULL, NULL),
(894, 1526616002, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529583321, NULL, NULL),
(895, 1526616002, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529583321, NULL, NULL),
(896, 1526616003, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529583992, NULL, NULL),
(897, 1526616003, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529583992, NULL, NULL),
(898, 1526616004, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529584010, NULL, NULL),
(899, 1526616004, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529584010, NULL, NULL),
(900, 1526616005, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529584269, NULL, NULL),
(901, 1526616005, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529584269, NULL, NULL),
(902, 1526616006, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529584315, NULL, NULL),
(903, 1526616006, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529584315, NULL, NULL),
(904, 1526616007, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529584661, NULL, NULL),
(905, 1526616007, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529584661, NULL, NULL),
(906, 1526616008, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529585471, NULL, NULL),
(907, 1526616008, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529585471, NULL, NULL),
(908, 1526616009, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529586127, NULL, NULL),
(909, 1526616009, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529586127, NULL, NULL),
(910, 1526616010, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529586139, NULL, NULL),
(911, 1526616010, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529586139, NULL, NULL),
(912, 1526616011, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529641609, NULL, NULL),
(913, 1526616011, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529641609, NULL, NULL),
(914, 1526616012, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529641737, NULL, NULL),
(915, 1526616012, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529641737, NULL, NULL),
(916, 1526616013, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529642321, NULL, NULL),
(917, 1526616013, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529642321, NULL, NULL),
(918, 1526616014, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529642469, NULL, NULL),
(919, 1526616014, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529642469, NULL, NULL),
(920, 1526616015, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529642491, NULL, NULL),
(921, 1526616015, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529642491, NULL, NULL),
(922, 1526616016, 16, 'Shirt/T-Shirt', 4, 0.00, 0.00, 48.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529642552, NULL, NULL),
(923, 1526616016, 18, 'Trousers /Pants /Jeans / Shorts', 4, 0.00, 0.00, 352.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529642552, NULL, NULL),
(924, 1526616016, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529642552, NULL, NULL),
(925, 1526616017, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529642648, NULL, NULL),
(926, 1526616017, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529642648, NULL, NULL),
(927, 1526616017, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529642648, NULL, NULL),
(928, 1526616018, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529654546, NULL, NULL),
(939, 1526616023, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529654992, NULL, NULL),
(940, 1526616023, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529654992, NULL, NULL),
(941, 1526616023, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529654992, NULL, NULL),
(942, 1526616024, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529907602, NULL, NULL),
(943, 1526616024, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529907602, NULL, NULL),
(944, 1526616025, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529991476, NULL, NULL),
(945, 1526616025, 23, 'Military Uniform (2 Pieces)', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529991476, NULL, NULL),
(946, 1526616025, 27, 'Military Uniform (2 Pieces)', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529991476, NULL, NULL),
(947, 1526616026, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529993032, NULL, NULL),
(948, 1526616026, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529993032, NULL, NULL),
(949, 1526616027, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529993638, NULL, NULL),
(950, 1526616027, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529993638, NULL, NULL),
(951, 1526616028, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1529999529, NULL, NULL),
(952, 1526616028, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1529999529, NULL, NULL),
(953, 1526616028, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1529999529, NULL, NULL),
(954, 1526616029, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530000226, NULL, NULL),
(955, 1526616029, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530000226, NULL, NULL),
(960, 1526616032, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 36.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530000745, NULL, NULL),
(961, 1526616032, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530000745, NULL, NULL),
(962, 1526616033, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530000809, NULL, NULL),
(963, 1526616033, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530000809, NULL, NULL),
(964, 1526616034, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530001728, NULL, NULL),
(965, 1526616034, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530001728, NULL, NULL),
(966, 1526616035, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 36.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530012847, NULL, NULL),
(967, 1526616035, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530012847, NULL, NULL),
(970, 1526616037, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530013689, NULL, NULL),
(971, 1526616037, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530013689, NULL, NULL),
(972, 1526616037, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530013689, NULL, NULL),
(973, 1526616037, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530013689, NULL, NULL),
(974, 1526616038, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530014315, NULL, NULL),
(975, 1526616038, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530014315, NULL, NULL),
(976, 1526616039, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530014360, NULL, NULL),
(977, 1526616039, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530014360, NULL, NULL),
(978, 1526616040, 16, 'Shirt/T-Shirt', 5, 0.00, 0.00, 60.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530083099, NULL, NULL),
(979, 1526616040, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530083099, NULL, NULL),
(980, 1526616040, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530083099, NULL, NULL),
(981, 1526616041, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530083187, NULL, NULL),
(982, 1526616041, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530083187, NULL, NULL),
(983, 1526616041, 20, 'Thobe cotton', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530083187, NULL, NULL),
(984, 1526616042, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 36.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530083892, NULL, NULL),
(985, 1526616042, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530083892, NULL, NULL),
(986, 1526616042, 22, 'Men\'s Suit (3 Pieces)', 2, 0.00, 0.00, 10.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1530083892, NULL, NULL),
(987, 1526616042, 23, 'Military Uniform (2 Pieces)', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530083892, NULL, NULL),
(988, 1526616043, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530084156, NULL, NULL),
(989, 1526616043, 21, 'Ghutra / Turban / Shemagh', 1, 0.00, 0.00, 2.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1530084156, NULL, NULL),
(990, 1526616044, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530254241, NULL, NULL),
(991, 1526616044, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530254241, NULL, NULL),
(992, 1526616045, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530594537, NULL, NULL),
(993, 1526616045, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530594537, NULL, NULL),
(994, 1526616046, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530597273, NULL, NULL),
(995, 1526616047, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530597375, NULL, NULL),
(996, 1526616048, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530597485, NULL, NULL),
(997, 1526616048, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530597485, NULL, NULL),
(998, 1526616049, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530597595, NULL, NULL),
(999, 1526616049, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530597595, NULL, NULL),
(1000, 1526616050, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530597714, NULL, NULL),
(1001, 1526616050, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530597714, NULL, NULL),
(1002, 1526616051, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530597911, NULL, NULL),
(1003, 1526616051, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530597911, NULL, NULL),
(1004, 1526616052, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530598172, NULL, NULL),
(1005, 1526616052, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530598172, NULL, NULL),
(1006, 1526616053, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530598427, NULL, NULL),
(1007, 1526616054, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530598677, NULL, NULL),
(1008, 1526616054, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530598677, NULL, NULL),
(1009, 1526616055, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530600600, NULL, NULL),
(1010, 1526616055, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530600600, NULL, NULL),
(1011, 1526616056, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1530676133, NULL, NULL),
(1012, 1526616056, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530676133, NULL, NULL),
(1013, 1526616057, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530691267, NULL, NULL),
(1014, 1526616057, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530691267, NULL, NULL),
(1015, 1526616058, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1530944413, NULL, NULL),
(1016, 1526616058, 19, 'Thobe', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1530944413, NULL, NULL),
(1017, 1526616059, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1531136560, NULL, NULL),
(1022, 1526616062, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1531910768, NULL, NULL),
(1023, 1526616062, 28, 'Jeans Jacket', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1531910768, NULL, NULL),
(1024, 1526616063, 21, 'Ghutra / Turban / Shemagh', 3, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1532601426, NULL, NULL),
(1027, 1526616065, 19, 'Thobe', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1535629962, NULL, NULL),
(1028, 1526616065, 24, 'Jeans Jacket', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1535629962, NULL, NULL),
(1031, 1526616068, 24, 'Jeans Jacket', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1535630330, NULL, NULL),
(1034, 1526616071, 21, 'Ghutra / Turban / Shemagh', 1, 0.00, 0.00, 2.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1537115255, NULL, NULL),
(1035, 1526616071, 22, 'Men\'s Suit (3 Pieces)', 1, 0.00, 0.00, 5.00, 0, NULL, NULL, NULL, 4.89, 0, NULL, 1537115255, NULL, NULL),
(1036, 1526616072, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1537115394, NULL, NULL),
(1037, 1526616072, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537115394, NULL, NULL),
(1038, 1526616072, 21, 'Ghutra / Turban / Shemagh', 2, 0.00, 0.00, 4.00, 0, NULL, NULL, NULL, 1.02, 0, NULL, 1537115394, NULL, NULL),
(1039, 1526616072, 23, 'Military Uniform (2 Pieces)', 9, 0.00, 0.00, 54.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1537115394, NULL, NULL),
(1040, 1526616073, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537116046, NULL, NULL),
(1043, 1526616075, 16, 'Shirt/T-Shirt', 3, 0.00, 0.00, 36.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1537161927, NULL, NULL),
(1044, 1526616075, 18, 'Trousers /Pants /Jeans / Shorts', 1, 0.00, 0.00, 88.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537161927, NULL, NULL),
(1045, 1526616076, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537168148, NULL, NULL),
(1046, 1526616077, 16, 'Shirt/T-Shirt', 2, 0.00, 0.00, 24.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1537175558, NULL, NULL),
(1047, 1526616077, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537175558, NULL, NULL),
(1048, 1526616078, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537176822, NULL, NULL),
(1049, 1526616079, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537177591, NULL, NULL),
(1050, 1526616080, 18, 'Trousers /Pants /Jeans / Shorts', 3, 0.00, 0.00, 264.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537178642, NULL, NULL),
(1051, 1526616081, 18, 'Trousers /Pants /Jeans / Shorts', 2, 0.00, 0.00, 176.00, 0, NULL, NULL, NULL, 87.78, 0, NULL, 1537181515, NULL, NULL),
(1052, 1526616082, 16, 'Shirt/T-Shirt', 1, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 11.03, 0, NULL, 1537332793, NULL, NULL),
(1056, 1526616086, 24, 'Jeans Jacket', 2, 0.00, 0.00, 12.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1538669377, NULL, NULL),
(1057, 1526616087, 24, 'Jeans Jacket', 1, 0.00, 0.00, 6.00, 0, NULL, NULL, NULL, 5.10, 0, NULL, 1538721892, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_log`
--

CREATE TABLE `order_log` (
  `uniqueId` bigint(15) NOT NULL,
  `orderId` bigint(20) NOT NULL,
  `orderStatusId` int(2) NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `orderId` bigint(20) NOT NULL,
  `orderLsId` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` bigint(20) NOT NULL,
  `userType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driverId` bigint(15) DEFAULT NULL,
  `laundryId` bigint(15) DEFAULT NULL,
  `itemCount` int(2) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '1=save order, 2=schedule_order, 3=review_order,4=payment_order, 8 = cancel_order',
  `orderValue` double(10,2) DEFAULT NULL,
  `netAmount` double(10,2) DEFAULT NULL,
  `serviceId` int(5) DEFAULT NULL,
  `pickupId` int(10) DEFAULT NULL,
  `deliveryId` int(10) DEFAULT NULL,
  `isFavorite` int(2) NOT NULL DEFAULT '0',
  `taxAmount` double(10,2) DEFAULT NULL,
  `coupoanid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couponDiscValue` double(10,2) DEFAULT '0.00',
  `advDiscValue` double(10,2) DEFAULT '0.00',
  `paymentStatus` int(2) DEFAULT NULL,
  `transactionId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` timestamp(6) NULL DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `paymentMode` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`orderId`, `orderLsId`, `userId`, `userType`, `driverId`, `laundryId`, `itemCount`, `status`, `orderValue`, `netAmount`, `serviceId`, `pickupId`, `deliveryId`, `isFavorite`, `taxAmount`, `coupoanid`, `couponDiscValue`, `advDiscValue`, `paymentStatus`, `transactionId`, `paymentDate`, `createdOn`, `updatedOn`, `remarks`, `paymentMode`) VALUES
(1526616024, 'ls602966981', 107, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 2, 146, 100, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-25', 1529907602, NULL, NULL, 'cash'),
(1526616026, 'ls032236528', 132, 'user', NULL, NULL, 2, 4, 100.00, 105.00, 1, 148, 102, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1529993032, NULL, NULL, 'cash'),
(1526616027, 'ls638476503', 132, 'user', NULL, NULL, 2, 4, 188.00, 198.00, 3, 149, 103, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1529993638, NULL, NULL, 'cash'),
(1526616032, 'ls745795578', 132, 'user', NULL, NULL, 2, 4, 212.00, 223.00, 2, 153, 107, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1530000745, NULL, NULL, 'cash'),
(1526616033, 'ls809427499', 132, 'user', NULL, NULL, 2, 4, 188.00, 198.00, 3, 154, 108, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1530000809, NULL, NULL, 'cash'),
(1526616034, 'ls728107002', 132, 'user', NULL, NULL, 2, 4, 188.00, 198.00, 1, 155, 109, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1530001728, NULL, NULL, 'cash'),
(1526616035, 'ls84729435', 0, '', NULL, NULL, 2, 1, 212.00, 223.00, 2, NULL, NULL, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1530012847, NULL, NULL, NULL),
(1526616037, 'ls689396648', 65, 'corp', NULL, NULL, 4, 4, 224.00, 236.00, 2, 156, 110, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1530013689, NULL, NULL, 'cash'),
(1526616038, 'ls315709741', 65, 'corp', NULL, NULL, 2, 4, 188.00, 198.00, 2, 157, 111, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1530014315, NULL, NULL, 'cash'),
(1526616039, 'ls360525158', 65, 'corp', NULL, NULL, 2, 4, 112.00, 118.00, 1, 158, 112, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-26', 1530014360, NULL, NULL, 'cash'),
(1526616040, 'ls099936248', 0, '', NULL, NULL, 3, 2, 248.00, 261.00, 2, NULL, NULL, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1530083099, NULL, NULL, NULL),
(1526616041, 'ls187443687', 107, 'user', NULL, NULL, 3, 4, 212.00, 223.00, 1, 160, 114, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-27', 1530083187, NULL, NULL, 'cash'),
(1526616042, 'ls892832669', 132, 'user', NULL, NULL, 4, 4, 234.00, 246.00, 2, 161, 115, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-27', 1530083892, NULL, NULL, 'cash'),
(1526616043, 'ls156194538', 31, 'corp', NULL, NULL, 2, 8, 178.00, 187.00, 1, 162, 116, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-06-27', 1530084156, NULL, NULL, 'cash'),
(1526616044, 'ls241517981', 1, 'user', NULL, NULL, 2, 3, 188.00, 198.00, 2, 163, 117, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1530254241, NULL, NULL, NULL),
(1526616045, 'ls537999051', 1, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 1, 164, 118, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530594537, NULL, NULL, 'cash'),
(1526616046, 'ls273277028', 1, 'user', NULL, NULL, 1, 4, 176.00, 185.00, 2, 165, 119, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530597273, NULL, NULL, 'cash'),
(1526616047, 'ls375562056', 1, 'user', NULL, NULL, 1, 4, 176.00, 185.00, 3, 166, 120, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530597375, NULL, NULL, 'cash'),
(1526616048, 'ls485273660', 1, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 2, 167, 121, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530597485, NULL, NULL, 'cash'),
(1526616049, 'ls595329510', 1, 'user', NULL, NULL, 2, 4, 188.00, 198.00, 2, 168, 122, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530597595, NULL, NULL, 'cash'),
(1526616050, 'ls714454930', 1, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 1, 169, 123, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530597714, NULL, NULL, 'cash'),
(1526616051, 'ls911528022', 1, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 1, 170, 124, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530597911, NULL, NULL, 'cash'),
(1526616052, 'ls172707287', 1, 'user', NULL, NULL, 2, 4, 188.00, 198.00, 2, 171, 125, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530598172, NULL, NULL, 'cash'),
(1526616053, 'ls427351259', 1, 'user', NULL, NULL, 1, 4, 176.00, 185.00, 2, 172, 126, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530598427, NULL, NULL, 'cash'),
(1526616054, 'ls677877477', 1, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 2, 173, 127, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530598677, NULL, NULL, 'cash'),
(1526616055, 'ls600688476', 1, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 2, 174, 128, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-03', 1530600600, NULL, NULL, 'cash'),
(1526616056, 'ls133406101', 1, 'user', NULL, NULL, 2, 4, 200.00, 210.00, 2, 175, 129, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-04', 1530676133, NULL, NULL, 'cash'),
(1526616057, 'ls267384241', 1, 'user', NULL, NULL, 2, 4, 188.00, 198.00, 2, 176, 130, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-04', 1530691267, NULL, NULL, 'cash'),
(1526616058, 'ls41327058', 2, 'user', NULL, NULL, 2, 4, 188.00, 198.00, 2, 177, 131, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-07', 1530944413, NULL, NULL, 'cash'),
(1526616059, 'ls560239509', 1, 'user', NULL, NULL, 1, 2, 264.00, 278.00, 1, NULL, NULL, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1531136560, NULL, NULL, NULL),
(1526616062, 'ls768332472', 3, 'user', NULL, NULL, 2, 8, 18.00, 19.00, 3, 178, 132, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-07-18', 1531910768, NULL, NULL, 'cash'),
(1526616063, 'ls426809960', 1, 'user', NULL, NULL, 1, 2, 6.00, 7.00, 2, NULL, NULL, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1532601426, NULL, NULL, NULL),
(1526616065, 'ls962939799', 3, 'user', NULL, NULL, 2, 8, 12.00, 13.00, 3, 179, 133, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-08-30', 1535629962, NULL, NULL, 'cash'),
(1526616068, 'ls330802378', 3, 'user', NULL, NULL, 1, 8, 12.00, 13.00, 2, 180, 134, 0, NULL, '0', 0.00, 0.00, 1, NULL, '2018-08-30', 1535630330, NULL, NULL, 'cash'),
(1526616071, 'ls255432122', 1, 'user', NULL, NULL, 2, 3, 7.00, 8.00, 1, 183, 137, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537115255, NULL, NULL, NULL),
(1526616072, 'ls394703349', 1, 'user', NULL, NULL, 4, 3, 170.00, 179.00, 1, 184, 138, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537115394, NULL, NULL, NULL),
(1526616073, 'ls046934620', 1, 'user', NULL, NULL, 1, 3, 264.00, 278.00, 1, 185, 139, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537116046, NULL, NULL, NULL),
(1526616075, 'ls92719409', 4, 'user', NULL, NULL, 2, 3, 124.00, 131.00, 1, 186, 140, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537161927, NULL, NULL, NULL),
(1526616076, 'ls148952529', 7, 'user', NULL, NULL, 1, 2, 176.00, 185.00, 1, 187, 141, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537168148, NULL, NULL, NULL),
(1526616077, 'ls558259094', 7, 'user', NULL, NULL, 2, 3, 200.00, 210.00, 1, 188, 142, 1, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537175558, NULL, NULL, NULL),
(1526616078, 'ls82270146', 7, 'user', NULL, NULL, 1, 3, 264.00, 278.00, 1, 189, 143, 1, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537176822, NULL, NULL, NULL),
(1526616079, 'ls591638966', 7, 'user', NULL, NULL, 1, 4, 176.00, 185.00, 1, 190, 144, 0, NULL, NULL, 0.00, 0.00, 1, 'https://test.instamojo.com/@jarora1994/ae6fd2b519a5484d96d35a2491044845', '2018-09-17', 1537177591, NULL, NULL, 'online'),
(1526616080, 'ls642806241', 7, 'user', NULL, NULL, 1, 8, 264.00, 278.00, 1, 191, 145, 0, NULL, NULL, 0.00, 0.00, 1, 'https://test.instamojo.com/@jarora1994/f0ac8b543f334c168e5ba2d16ea345e7', '2018-09-17', 1537178642, NULL, NULL, 'online'),
(1526616081, 'ls515765117', 65, 'corp', NULL, NULL, 1, 4, 176.00, 185.00, 1, 192, 146, 0, NULL, NULL, 0.00, 0.00, 1, 'https://test.instamojo.com/@jarora1994/6d71cc1f72854c7e9c4680cabd6964f2', '2018-09-17', 1537181515, NULL, NULL, 'online'),
(1526616082, 'ls793415722', 4, 'user', NULL, NULL, 1, 2, 12.00, 13.00, 2, NULL, NULL, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1537332793, NULL, NULL, NULL),
(1526616086, 'ls377638189', 3, 'user', NULL, NULL, 1, 2, 12.00, 13.00, 2, 182, 136, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1538669377, NULL, NULL, NULL),
(1526616087, 'ls892851917', 3, 'user', NULL, NULL, 1, 2, 6.00, 7.00, 3, 181, 135, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, NULL, 1538721892, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `uniqueId` int(2) NOT NULL,
  `statusName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `uniqueId` bigint(10) NOT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessToken` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `source` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packaging_master`
--

CREATE TABLE `packaging_master` (
  `packagingId` int(5) NOT NULL,
  `packagingName` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packagingType` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packaging_master`
--

INSERT INTO `packaging_master` (`packagingId`, `packagingName`, `packagingType`, `createdOn`) VALUES
(1, 'Hang', 'Hang', 1525337432),
(5, 'fold', 'fold', NULL),
(7, 'Iron and Fold', 'Iron and Fold', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `panel_user`
--

CREATE TABLE `panel_user` (
  `adUserId` bigint(10) NOT NULL,
  `userName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userStatus` int(1) NOT NULL DEFAULT '0',
  `userImage` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isTrashed` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panel_user`
--

INSERT INTO `panel_user` (`adUserId`, `userName`, `password`, `firstName`, `lastName`, `userStatus`, `userImage`, `isTrashed`, `remember_token`) VALUES
(1, 'admin@ls.com', '$2y$10$4biTUiBFtF0987.LHbEeBOq9oNwQFHs3HrfXI2/0Zo3LTbzhorH.G', 'Admin', NULL, 1, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pickup_master`
--

CREATE TABLE `pickup_master` (
  `pickupId` int(10) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `userType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickupAddressId` bigint(10) NOT NULL,
  `actPickUpDate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickupStartTimestamp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickupEndTimestamp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isReschedule` int(1) NOT NULL DEFAULT '0',
  `reScheduleTimestamp` int(2) DEFAULT NULL,
  `driverId` bigint(15) DEFAULT NULL,
  `pickupType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondaryDriver` bigint(15) DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `updatedOn` int(2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_master`
--

INSERT INTO `pickup_master` (`pickupId`, `userId`, `userType`, `pickupAddressId`, `actPickUpDate`, `pickupStartTimestamp`, `pickupEndTimestamp`, `isReschedule`, `reScheduleTimestamp`, `driverId`, `pickupType`, `secondaryDriver`, `createdOn`, `updatedOn`, `remarks`) VALUES
(83, 45, 'corp', 183, '2018-05-30', '4:30pm', '6:00pm', 0, NULL, NULL, NULL, NULL, 1527676299, NULL, ''),
(84, 45, 'corp', 183, '2018-05-30', '5:00pm', '5:30pm', 0, NULL, NULL, NULL, NULL, 1527676424, NULL, ''),
(85, 45, 'corp', 183, '2018-05-30', '4:30pm', '5:30pm', 0, NULL, NULL, NULL, NULL, 1527676588, NULL, ''),
(86, 45, 'corp', 183, '2018-05-30', '4:30pm', '5:30pm', 0, NULL, NULL, NULL, NULL, 1527677954, NULL, ''),
(87, 45, 'corp', 183, '2018-05-29', '5:30pm', '6:00pm', 0, NULL, NULL, NULL, NULL, 1527678143, NULL, ''),
(88, 45, 'corp', 183, '2018-05-30', '5:00pm', '6:30pm', 0, NULL, NULL, NULL, NULL, 1527679047, NULL, ''),
(89, 45, 'corp', 183, '2018-05-30', '5:30pm', '6:30pm', 0, NULL, NULL, NULL, NULL, 1527679467, NULL, ''),
(90, 45, 'corp', 183, '2018-05-30', '5:30pm', '6:00pm', 0, NULL, NULL, NULL, NULL, 1527679501, NULL, ''),
(91, 45, 'corp', 183, '2018-05-30', '7:00pm', '6:30pm', 0, NULL, NULL, NULL, NULL, 1527679686, NULL, ''),
(92, 45, 'corp', 183, '2018-05-30', '7:00pm', '6:30pm', 0, NULL, NULL, NULL, NULL, 1527679757, NULL, ''),
(93, 45, 'corp', 183, '2018-05-30', '6:30pm', '6:30pm', 0, NULL, NULL, NULL, NULL, 1527679850, NULL, ''),
(94, 45, 'corp', 183, '2018-05-28', '6:00pm', '6:30pm', 0, NULL, NULL, NULL, NULL, 1527680062, NULL, ''),
(95, 45, 'corp', 183, '2018-05-30', '6:00pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1527680114, NULL, ''),
(96, 45, 'corp', 183, '2018-05-30', '5:30pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1527681036, NULL, ''),
(97, 93, 'user', 162, '2018-05-30', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1527684280, NULL, ''),
(98, 93, 'user', 162, '2018-05-30', '7:00pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1527684317, NULL, ''),
(99, 93, 'user', 162, '2018-05-30', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1527684448, NULL, ''),
(100, 93, 'user', 162, '2018-05-30', '7:00pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1527684707, NULL, ''),
(101, 93, 'user', 162, '2018-05-30', '10:30am', '11:30am', 0, NULL, NULL, NULL, NULL, 1527737757, NULL, ''),
(102, 93, 'user', 162, '2018-05-30', '9:30am', '12:00pm', 0, NULL, NULL, NULL, NULL, 1527737990, NULL, ''),
(103, 107, 'user', 149, '2018-05-31', '12:30pm', '1:00pm', 0, NULL, NULL, NULL, NULL, 1527749825, NULL, ''),
(104, 107, 'user', 149, '2018-05-31', '1:00pm', '2:00pm', 0, NULL, NULL, NULL, NULL, 1527750337, NULL, ''),
(105, 107, 'user', 149, '2018-05-31', '2:00pm', '3:00pm', 0, NULL, NULL, NULL, NULL, 1527752798, NULL, ''),
(106, 50, 'corp', 185, '2018-05-31', '1:30pm', '2:30pm', 0, NULL, NULL, NULL, NULL, 1527752989, NULL, ''),
(107, 93, 'user', 162, '2018-05-31', '4:00pm', '4:30pm', 0, NULL, NULL, NULL, NULL, 1527758557, NULL, ''),
(108, 93, 'user', 162, '2018-05-31', '4:30pm', '5:00pm', 0, NULL, NULL, NULL, NULL, 1527759827, NULL, ''),
(109, 93, 'user', 162, '2018-05-31', '5:00pm', '6:00pm', 0, NULL, NULL, NULL, NULL, 1527764125, NULL, ''),
(110, 93, 'user', 162, '2018-05-31', '5:30pm', '6:30pm', 0, NULL, NULL, NULL, NULL, 1527764226, NULL, ''),
(111, 93, 'user', 162, '2018-05-31', '5:00pm', '6:00pm', 0, NULL, NULL, NULL, NULL, 1527764461, NULL, ''),
(112, 45, 'corp', 184, '2018-06-21', '12:30pm', '1:00am', 0, NULL, NULL, NULL, NULL, 1527831208, NULL, ''),
(113, 45, 'corp', 184, '2018-06-01', '8:30am', '9:00am', 0, NULL, NULL, NULL, NULL, 1527831912, NULL, ''),
(114, 107, 'user', 149, '2018-06-01', '11:30am', '4:30pm', 0, NULL, NULL, NULL, NULL, 1527832848, NULL, ''),
(115, 45, 'corp', 183, '2018-06-27', '7:30am', '9:00am', 0, NULL, NULL, NULL, NULL, 1527833446, NULL, ''),
(116, 45, 'corp', 183, '2018-06-01', '1:00am', '1:30am', 0, NULL, NULL, NULL, NULL, 1527833562, NULL, ''),
(117, 45, 'corp', 184, '2018-06-01', '1:00am', '2:00am', 0, NULL, NULL, NULL, NULL, 1527833609, NULL, ''),
(118, 45, 'corp', 183, '2018-06-01', '1:00am', '1:30am', 0, NULL, NULL, NULL, NULL, 1527833649, NULL, ''),
(119, 107, 'user', 149, '2018-06-01', '12:00am', '12:30am', 0, NULL, NULL, NULL, NULL, 1527833750, NULL, ''),
(120, 107, 'user', 149, '2018-06-02', '7:30am', '8:30am', 0, NULL, NULL, NULL, NULL, 1527833980, NULL, ''),
(121, 107, 'user', 149, '2018-06-28', '2:30pm', '3:30pm', 0, NULL, NULL, NULL, NULL, 1527836182, NULL, ''),
(122, 50, 'corp', 185, '2018-06-02', '7:30am', '8:00am', 0, NULL, NULL, NULL, NULL, 1527836605, NULL, ''),
(123, 50, 'corp', 185, '2018-06-01', '6:30pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1527836680, NULL, ''),
(124, 124, 'user', 186, '2018-06-02', '11:00am', '12:00pm', 0, NULL, NULL, NULL, NULL, 1527878500, NULL, ''),
(125, 93, 'user', 162, '2018-06-04', '10:30am', '10:30am', 0, NULL, NULL, NULL, NULL, 1528083444, NULL, ''),
(126, 93, 'user', 162, '2018-06-04', '4:30pm', '6:00pm', 0, NULL, NULL, NULL, NULL, 1528104766, NULL, ''),
(127, 107, 'user', 149, '2018-06-05', '4:00pm', '5:00pm', 0, NULL, NULL, NULL, NULL, 1528193229, NULL, ''),
(128, 107, 'user', 149, '2018-06-05', '4:00pm', '4:30pm', 0, NULL, NULL, NULL, NULL, 1528193786, NULL, ''),
(129, 93, 'user', 187, '2018-06-27', '8:00am', '10:00am', 0, NULL, NULL, NULL, NULL, 1529490122, NULL, ''),
(130, 93, 'user', 187, '2018-06-28', '9:00am', '10:00am', 0, NULL, NULL, NULL, NULL, 1529552890, NULL, ''),
(131, 93, 'user', 187, '2018-06-22', '12:00pm', '1:30pm', 0, NULL, NULL, NULL, NULL, 1529561396, NULL, ''),
(132, 93, 'user', 187, '2018-06-28', '1:30pm', '2:30pm', 0, NULL, NULL, NULL, NULL, 1529561535, NULL, ''),
(133, 93, 'user', 187, '2018-06-23', '7:00am', '8:00am', 0, NULL, NULL, NULL, NULL, 1529578977, NULL, ''),
(134, 45, 'corp', 183, '2018-06-29', '7:30am', '8:30am', 0, NULL, NULL, NULL, NULL, 1529579114, NULL, ''),
(135, 93, 'user', 187, '2018-06-28', '7:00am', '8:00am', 0, NULL, NULL, NULL, NULL, 1529580087, NULL, ''),
(136, 93, 'user', 187, '2018-06-22', '7:00am', '8:00am', 0, NULL, NULL, NULL, NULL, 1529580399, NULL, ''),
(137, 93, 'user', 187, '2018-06-25', '7:30am', '8:00am', 0, NULL, NULL, NULL, NULL, 1529580651, NULL, ''),
(138, 93, 'user', 187, '2018-06-27', '7:00am', '8:00am', 0, NULL, NULL, NULL, NULL, 1529580905, NULL, ''),
(139, 93, 'user', 187, '2018-06-28', '7:00am', '8:00am', 0, NULL, NULL, NULL, NULL, 1529581030, NULL, ''),
(140, 45, 'corp', 183, '2018-06-26', '8:00am', '8:30am', 0, NULL, NULL, NULL, NULL, 1529581920, NULL, ''),
(141, 93, 'user', 187, '2018-06-27', '8:00am', '9:00am', 0, NULL, NULL, NULL, NULL, 1529582809, NULL, ''),
(142, 93, 'user', 187, '2018-06-26', '7:30am', '8:00am', 0, NULL, NULL, NULL, NULL, 1529582891, NULL, ''),
(143, 45, 'corp', 183, '2018-06-28', '7:30am', '8:30am', 0, NULL, NULL, NULL, NULL, 1529582942, NULL, ''),
(144, 45, 'corp', 183, '2018-06-22', '2:30pm', '4:30pm', 0, NULL, NULL, NULL, NULL, 1529654547, NULL, ''),
(145, 93, 'user', 187, '2018-06-22', '2:00pm', '3:00pm', 0, NULL, NULL, NULL, NULL, 1529654598, NULL, ''),
(146, 107, 'user', 149, '2018-06-25', '12:30pm', '1:00pm', 0, NULL, NULL, NULL, NULL, 1529907602, NULL, ''),
(147, 114, 'user', 145, '2018-06-26', '11:30am', '1:30pm', 0, NULL, NULL, NULL, NULL, 1529991476, NULL, ''),
(148, 132, 'user', 211, '2018-06-26', '12:00pm', '1:00pm', 0, NULL, NULL, NULL, NULL, 1529993054, NULL, ''),
(149, 132, 'user', 211, '2018-06-24', '12:00pm', '1:00pm', 0, NULL, NULL, NULL, NULL, 1529993639, NULL, ''),
(150, 132, 'user', 211, '2018-06-30', '7:00am', '9:30am', 0, NULL, NULL, NULL, NULL, 1529999529, NULL, ''),
(151, 132, 'user', 211, '2018-06-30', '3:00pm', '3:30pm', 0, NULL, NULL, NULL, NULL, 1529999529, NULL, ''),
(152, 132, 'user', 211, '2018-06-30', '2:00pm', '3:00pm', 0, NULL, NULL, NULL, NULL, 1529999529, NULL, ''),
(153, 132, 'user', 211, '2018-06-26', '2:00pm', '2:30pm', 0, NULL, NULL, NULL, NULL, 1530000408, NULL, ''),
(154, 132, 'user', 211, '2018-06-30', '8:30am', '9:00am', 0, NULL, NULL, NULL, NULL, 1530000810, NULL, ''),
(155, 132, 'user', 211, '2018-07-26', '9:00am', '9:30am', 0, NULL, NULL, NULL, NULL, 1530001728, NULL, ''),
(156, 65, 'corp', 212, '2018-06-30', '7:00am', '8:00am', 0, NULL, NULL, NULL, NULL, 1530013667, NULL, ''),
(157, 65, 'corp', 212, '2018-06-27', '7:00am', '7:30am', 0, NULL, NULL, NULL, NULL, 1530014315, NULL, ''),
(158, 65, 'corp', 212, '2018-06-28', '7:00am', '7:30am', 0, NULL, NULL, NULL, NULL, 1530014360, NULL, ''),
(159, 107, 'user', 149, '2018-06-28', '11:00am', '3:00pm', 0, NULL, NULL, NULL, NULL, 1530083099, NULL, ''),
(160, 107, 'user', 149, '2018-06-27', '3:00pm', '3:30pm', 0, NULL, NULL, NULL, NULL, 1530083187, NULL, ''),
(161, 132, 'user', 211, '2018-06-27', '1:30pm', '2:30pm', 0, NULL, NULL, NULL, NULL, 1530083892, NULL, ''),
(162, 31, 'corp', 214, '2018-06-29', '1:30pm', '2:00pm', 0, NULL, NULL, NULL, NULL, 1530084353, NULL, ''),
(163, 1, 'user', 1, '2018-06-29', '12:30pm', '1:00pm', 0, NULL, NULL, NULL, NULL, 1530254317, NULL, ''),
(164, 1, 'user', 1, '2018-07-03', '11:00am', '12:00pm', 0, NULL, NULL, NULL, NULL, 1530594538, NULL, ''),
(165, 1, 'user', 1, '2018-07-03', '11:30am', '12:00pm', 0, NULL, NULL, NULL, NULL, 1530597273, NULL, ''),
(166, 1, 'user', 1, '2018-07-03', '11:30am', '12:00pm', 0, NULL, NULL, NULL, NULL, 1530597375, NULL, ''),
(167, 1, 'user', 1, '2018-07-03', '11:30am', '12:00pm', 0, NULL, NULL, NULL, NULL, 1530597485, NULL, ''),
(168, 1, 'user', 1, '2018-07-03', '11:30am', '12:00pm', 0, NULL, NULL, NULL, NULL, 1530597595, NULL, ''),
(169, 1, 'user', 1, '2018-07-03', '12:00pm', '12:30pm', 0, NULL, NULL, NULL, NULL, 1530597715, NULL, ''),
(170, 1, 'user', 1, '2018-07-03', '12:00pm', '12:30pm', 0, NULL, NULL, NULL, NULL, 1530597911, NULL, ''),
(171, 1, 'user', 1, '2018-07-03', '12:00pm', '12:30pm', 0, NULL, NULL, NULL, NULL, 1530598173, NULL, ''),
(172, 1, 'user', 1, '2018-07-03', '12:30pm', '1:00pm', 0, NULL, NULL, NULL, NULL, 1530598427, NULL, ''),
(173, 1, 'user', 1, '2018-07-25', '7:00am', '7:30am', 0, NULL, NULL, NULL, NULL, 1530598677, NULL, ''),
(174, 1, 'user', 1, '2018-07-25', '12:30pm', '1:00pm', 0, NULL, NULL, NULL, NULL, 1530600600, NULL, ''),
(175, 1, 'user', 1, '2018-07-25', '7:00am', '7:30am', 0, NULL, NULL, NULL, NULL, 1530676134, NULL, ''),
(176, 1, 'user', 1, '2018-07-04', '2:00pm', '2:30pm', 0, NULL, NULL, NULL, NULL, 1530691267, NULL, ''),
(177, 2, 'user', 5, '2018-07-07', '12:00pm', '1:30pm', 0, NULL, NULL, NULL, NULL, 1530944486, NULL, ''),
(178, 3, 'user', 6, '2018-07-18', '4:00pm', '5:00pm', 0, NULL, NULL, NULL, NULL, 1531910769, NULL, ''),
(179, 3, 'user', 6, '2018-08-30', '6:00pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1535629691, NULL, ''),
(180, 3, 'user', 6, '2018-08-30', '6:00pm', '7:00pm', 0, NULL, NULL, NULL, NULL, 1535630332, NULL, ''),
(181, 3, 'user', 6, '2018-09-07', '11:00am', '5:30pm', 0, NULL, NULL, NULL, NULL, 1536272621, NULL, ''),
(182, 3, 'user', 8, '2018-09-15', '7:00am', '10:00am', 0, NULL, NULL, NULL, NULL, 1536952468, NULL, ''),
(183, 1, 'user', 1, '2018-09-17', '8:00am', '8:30am', 0, NULL, NULL, NULL, NULL, 1537115255, NULL, ''),
(184, 1, 'user', 1, '2018-09-17', '7:00am', '8:00am', 0, NULL, NULL, NULL, NULL, 1537115394, NULL, ''),
(185, 1, 'user', 1, '2018-09-17', '8:30am', '9:30am', 0, NULL, NULL, NULL, NULL, 1537116047, NULL, ''),
(186, 4, 'user', 9, '2018-09-18', '10:30am', '12:30pm', 0, NULL, NULL, NULL, NULL, 1537161825, NULL, ''),
(187, 7, 'user', 14, '2018-09-17', '2:00pm', '3:30pm', 0, NULL, NULL, NULL, NULL, 1537172189, NULL, ''),
(188, 7, 'user', 14, '2018-09-17', '4:00pm', '4:30pm', 0, NULL, NULL, NULL, NULL, 1537175559, NULL, ''),
(189, 7, 'user', 14, '2018-09-17', '3:30pm', '4:00pm', 0, NULL, NULL, NULL, NULL, 1537176822, NULL, ''),
(190, 7, 'user', 14, '2018-09-17', '3:30pm', '4:00pm', 0, NULL, NULL, NULL, NULL, 1537177591, NULL, ''),
(191, 7, 'user', 14, '2018-09-17', '4:00pm', '4:30pm', 0, NULL, NULL, NULL, NULL, 1537178643, NULL, ''),
(192, 65, 'corp', 16, '2018-09-17', '5:00pm', '5:30pm', 0, NULL, NULL, NULL, NULL, 1537183045, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<h5>Dummy Text</h5>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>', '2018-04-30 09:58:36', '2018-04-30 13:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `title`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(5, 'Schedule', 'Launder Services is available 7 days a week between XXam & XXpm', '645231schedule.svg', '2018-05-01 12:14:22', '2018-05-01 12:14:22'),
(2, 'Pickup', 'Your friendly Launder Services valet will arrive between XXam & XXpm', '796128pickup.svg', '2018-05-01 06:12:48', '2018-05-01 12:15:09'),
(3, 'Delivery', 'Launder Services delivers on a consistent and predictable schedule, always between XXam & XXpm', '71142delivery.svg', '2018-05-01 07:03:03', '2018-05-01 12:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `rating_master`
--

CREATE TABLE `rating_master` (
  `uniqueId` int(10) NOT NULL,
  `objectById` bigint(20) NOT NULL,
  `objectByType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectToId` int(20) NOT NULL,
  `objectToType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(4,2) NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refercode_detail`
--

CREATE TABLE `refercode_detail` (
  `id` int(255) NOT NULL,
  `pointearned` varchar(255) NOT NULL,
  `introducepointearned` varchar(255) DEFAULT NULL,
  `introducepointstatus` varchar(255) DEFAULT NULL,
  `pointspent` varchar(255) NOT NULL,
  `rateperpoint` varchar(255) NOT NULL,
  `pointsUsed` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refercode_detail`
--

INSERT INTO `refercode_detail` (`id`, `pointearned`, `introducepointearned`, `introducepointstatus`, `pointspent`, `rateperpoint`, `pointsUsed`, `created_at`, `updated_at`) VALUES
(1, '50', '25', '1', '250', '1', '1', NULL, '2018-06-22 13:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `request_services`
--

CREATE TABLE `request_services` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `address` text,
  `isViewed` int(5) DEFAULT '0',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_services`
--

INSERT INTO `request_services` (`id`, `name`, `email`, `phone`, `service`, `address`, `isViewed`, `created_at`, `updated_at`) VALUES
(1, 'jattin', 'jarora1994@gmail.com', '8607875212', 'driver', 'J-9 A Laxmi Nagar', 1, '2018-05-08 11:54:13', '2018-05-16 07:27:58'),
(2, 'jattin', 'jarora1994@gmail.com', '1234567890', 'driver', 'J-9 A Laxmi Nagar', 1, '2018-05-08 11:54:31', '2018-05-16 07:27:25'),
(3, 'jattin', 'jarora1994@gmail.com', '1234567890', 'driver', 'J-9 A Laxmi Nagar', 1, '2018-05-08 11:55:47', '2018-05-16 07:27:25'),
(4, 'jattin', 'jarora1994@gmail.com', '8467457354', 'laundry', 'J-9 A Laxmi Nagar', 1, '2018-05-08 11:57:44', '2018-05-16 07:27:58'),
(5, 'jattin', 'jarora1994@gmail.com', '5463456243523', 'laundry', 'J-9 A Laxmi Nagar', 1, '2018-05-08 11:59:50', '2018-05-16 07:27:25'),
(6, 'shoeb', 'hg@gmail.com', '1234567890', 'driver', 'gdfgdfdfr', 1, '2018-05-08 12:17:23', '2018-05-16 07:27:25'),
(7, 'gdfger', 'tdrestdf@gm', '1234567890', 'laundry', 'gfdgdf', 1, '2018-05-14 06:05:16', '2018-05-16 07:27:25'),
(8, 'fdsfsd', 'sfdfd@gmail.com', '86078321', 'laundry', '4e23423', 1, '2018-05-18 06:26:38', '2018-05-18 06:26:51'),
(9, 'Alam Shoeb', 'alshoeb24@gmail.com', '89698698478', 'laundry', 'rdygfvj gchcx', 1, '2018-05-18 10:44:54', '2018-05-18 10:45:30'),
(10, 'Faizal Khan', 'faizal@muser.co.in', '7898787878', 'laundry', 'Jumman Miyan gali ke picche', 1, '2018-05-25 08:05:41', '2018-06-01 12:53:14'),
(11, 'Moin Khan', 'ayzandeveloper@gmail.com', '7888138538', 'laundry', 'Residency Road, Nagpur', 1, '2018-06-27 18:39:28', '2018-06-27 20:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `uniqueId` int(10) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `validationToken` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(2) DEFAULT NULL,
  `expiredOn` int(2) DEFAULT NULL,
  `isUsed` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serves`
--

CREATE TABLE `serves` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` text NOT NULL,
  `description` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serves`
--

INSERT INTO `serves` (`id`, `title`, `heading`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Individuals', 'We serve Individual customers or Bachelor, Families, Commercial', 'Our targeted Commercial customers are Serving Restaurants and Catering Companies, Hospitality Industries, Health Clubs, Spas, Salons, Rehab & Massage Centers, Hospitals & Nursing Homes, Children & Adult Day Care Centers, Hotels & Motels, Group Homes, Foreign Embassies, Government Agencies, House Cleaning & Maid Service Companies, Area Colleges & Universities, Private Security Companies and a Myriad of Other Commercial & Non-Profit Organizations.', '802573man_(1).svg', '2018-05-01 05:57:24', '2018-05-01 12:27:23'),
(2, 'Hospitals & Health care', 'Reducing Healthcare Linen Costs', 'From the veteran’s affairs hospital to a mid sized behavioural health clinic to a local therapist’s office, we have been able to dramatically decrease the linen budgets for hetalthcare providers. We are the only provider that can handle your linen contract and your patient’s personal laundry with the same care and attention to detail.', '727145hospital.svg', '2018-05-01 06:12:48', '2018-05-01 12:27:33'),
(5, 'Hotels', 'Managed On-Premise Hotel Laundry Services', 'Having served hospitality business of all sizes, Launder Services now manages laundry facilities al top hotel chains. Our approach is flexible. We can handle the rental linens or wash what you already own. We will continue to be the most sustainable, affordable, and responsible solution for local hotels.', '702874hotels.svg', '2018-05-01 12:29:03', '2018-05-01 12:29:03'),
(6, 'Fitness & Gym', 'Responsive, fast, affordable Services for Gyms & Fitness Centres', 'We offer gyms short or space and time on affordable, ultra responsive solution for linen rentals and laundry services. Not only will your fitness-minded clientele think our cyclists hauling over 200lbs on a bike are pretty awesome, they will appreciate our all natural laundering process that avoids chemical smell on linens. With us, the price we agree to is what you will see on your invoice. No hidden fees!\r\n\r\nRental or customer owned liners. We will wash the sheets and towels you own or rent you ours and work together to find the most affordable solution.', '637973gym.svg', '2018-05-01 12:30:31', '2018-05-01 12:30:31'),
(7, 'Salons', 'Clean & Fast Linen Solution & Salons, Barber shops & Spas', 'We are here to help you spend more time with your clients and less time dealing with your laundry and linens. Our all natural, hypo-allergenic detergents ensure that we provide you with clean, scent-free linens. We turn around your laundry in minimum time. Consider freeing up staff time and shelf space with our service.\r\n\r\nRental or customer owned liners. We will wash the sheets and towels you own or rent you ours and work together to find the most affordable solution.', '791321salons.svg', '2018-05-01 12:30:56', '2018-05-01 12:30:56'),
(8, 'Wellness', 'A green laundry & linen solution for spas, therapists & flotation studios', 'To create the relaxing, restorative environment for your clients or patients have come to expect, let us focus on your laundry and linens. Our hassle free recurring deliveries can happen as often as you need and we launder with our all natural, hypo-allergenic detergents ensure that we provide you with clean, scent-free linens. We turn around your laundry in minimum time.\r\n\r\nRental or customer owned liners. We will wash the sheets, blankets or yoga mats you own or rent you our sheets or towels. We will work together to find the most affordable solution.', '613299wellness.svg', '2018-05-01 12:31:21', '2018-05-01 12:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `service_master`
--

CREATE TABLE `service_master` (
  `serviceId` int(5) NOT NULL,
  `serviceName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceSlug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceDescription` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceStartTime` int(2) DEFAULT NULL,
  `serviceEndTime` int(2) DEFAULT NULL,
  `serviceImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_master`
--

INSERT INTO `service_master` (`serviceId`, `serviceName`, `serviceSlug`, `serviceDescription`, `serviceStartTime`, `serviceEndTime`, `serviceImage`, `serviceStatus`, `createdOn`) VALUES
(1, 'Wash And Iron', 'Wash-And-Iron', '<p>Wash And Iron</p>', NULL, NULL, '29948wash.svg', NULL, NULL),
(2, 'Dry Clean And Iron', 'Dry-Clean-And-Iron', '<p>Dry Clean And Iron</p>', NULL, NULL, 'dry-clean.svg', NULL, NULL),
(3, 'Iron', 'Iron', '<p>Iron</p>', NULL, NULL, 'iron.svg', NULL, 1523426108);

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

CREATE TABLE `sms_log` (
  `uniqueId` bigint(15) NOT NULL,
  `objectId` bigint(20) NOT NULL,
  `objectType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smsId` int(10) NOT NULL,
  `isViewed` int(1) NOT NULL DEFAULT '0',
  `sentOn` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `statusIOS` int(2) DEFAULT NULL,
  `statusRemarks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusIOSRemarks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_log`
--

INSERT INTO `sms_log` (`uniqueId`, `objectId`, `objectType`, `smsId`, `isViewed`, `sentOn`, `status`, `statusIOS`, `statusRemarks`, `statusIOSRemarks`, `created_at`, `updated_at`) VALUES
(1, 3, 'user', 1, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:01:07', '2018-06-20 11:01:07'),
(2, 120, 'user', 1, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:01:07', '2018-06-20 11:01:07'),
(3, 121, 'user', 1, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:01:07', '2018-06-20 11:01:07'),
(4, 3, 'user', 2, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:01:30', '2018-06-20 11:01:30'),
(5, 5, 'user', 2, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:01:30', '2018-06-20 11:01:30'),
(6, 43, 'user', 2, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:01:30', '2018-06-20 11:01:30'),
(7, 3, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(8, 5, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(9, 43, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(10, 76, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(11, 78, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(12, 93, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(13, 107, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(14, 109, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(15, 110, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(16, 111, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(17, 112, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(18, 113, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(19, 114, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(20, 115, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(21, 116, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(22, 117, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(23, 118, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(24, 119, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(25, 120, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(26, 121, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(27, 122, 'user', 3, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(28, 3, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(29, 5, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(30, 43, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(31, 76, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(32, 78, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(33, 93, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(34, 107, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(35, 109, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(36, 110, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(37, 111, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(38, 112, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(39, 113, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(40, 114, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(41, 115, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(42, 116, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(43, 117, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(44, 118, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(45, 119, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(46, 120, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(47, 121, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(48, 122, 'user', 4, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(49, 3, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(50, 5, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(51, 43, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(52, 76, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(53, 78, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(54, 93, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(55, 107, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(56, 109, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(57, 110, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(58, 111, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(59, 112, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(60, 113, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(61, 114, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(62, 115, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(63, 116, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(64, 117, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(65, 118, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(66, 119, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(67, 120, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(68, 121, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(69, 122, 'user', 5, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(70, 3, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(71, 5, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(72, 43, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(73, 76, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(74, 78, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(75, 93, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(76, 107, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(77, 109, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(78, 110, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(79, 111, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(80, 112, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(81, 113, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(82, 114, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(83, 115, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(84, 116, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(85, 117, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(86, 118, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(87, 119, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(88, 120, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(89, 121, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(90, 122, 'user', 6, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(91, 2, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(92, 3, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(93, 4, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(94, 5, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(95, 6, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(96, 8, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(97, 10, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(98, 11, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(99, 12, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(100, 13, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(101, 45, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(102, 49, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(103, 50, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(104, 53, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(105, 54, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(106, 55, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(107, 56, 'corp', 7, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(108, 2, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(109, 3, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(110, 4, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(111, 5, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(112, 6, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(113, 8, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(114, 10, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(115, 11, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(116, 12, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(117, 13, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(118, 45, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(119, 49, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(120, 50, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(121, 53, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(122, 54, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(123, 55, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(124, 56, 'corp', 8, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(125, 3, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(126, 5, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(127, 43, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(128, 76, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(129, 78, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(130, 93, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(131, 107, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(132, 109, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(133, 110, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(134, 111, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(135, 112, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(136, 113, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(137, 114, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(138, 115, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(139, 116, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(140, 117, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(141, 118, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(142, 119, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(143, 120, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(144, 121, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(145, 122, 'user', 9, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(146, 3, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(147, 5, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(148, 43, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(149, 76, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(150, 78, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(151, 93, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(152, 107, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(153, 109, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(154, 110, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(155, 111, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(156, 112, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(157, 113, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(158, 114, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(159, 115, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(160, 116, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(161, 117, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(162, 118, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(163, 119, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(164, 120, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(165, 121, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(166, 122, 'user', 10, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(167, 3, 'user', 11, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:24:01', '2018-06-20 11:24:01'),
(168, 5, 'user', 11, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:24:01', '2018-06-20 11:24:01'),
(169, 121, 'user', 11, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:24:01', '2018-06-20 11:24:01'),
(170, 122, 'user', 11, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:24:01', '2018-06-20 11:24:01'),
(171, 3, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(172, 5, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(173, 43, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(174, 76, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(175, 78, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(176, 93, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(177, 107, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(178, 109, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(179, 110, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(180, 111, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(181, 112, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(182, 113, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(183, 114, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(184, 115, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(185, 116, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(186, 117, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(187, 118, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(188, 119, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(189, 120, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(190, 121, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(191, 122, 'user', 12, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(192, 117, 'user', 13, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:40:15', '2018-06-20 11:40:15'),
(193, 121, 'user', 13, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:40:15', '2018-06-20 11:40:15'),
(194, 117, 'user', 14, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:44:18', '2018-06-20 11:44:18'),
(195, 121, 'user', 14, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:44:18', '2018-06-20 11:44:18'),
(196, 117, 'user', 15, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:45:46', '2018-06-20 11:45:46'),
(197, 121, 'user', 15, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:45:46', '2018-06-20 11:45:46'),
(198, 93, 'user', 16, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:47:52', '2018-06-20 11:47:52'),
(199, 121, 'user', 16, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:47:52', '2018-06-20 11:47:52'),
(200, 93, 'user', 17, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:48:13', '2018-06-20 11:48:13'),
(201, 121, 'user', 17, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:48:13', '2018-06-20 11:48:13'),
(202, 93, 'user', 18, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:48:29', '2018-06-20 11:48:29'),
(203, 121, 'user', 18, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:48:29', '2018-06-20 11:48:29'),
(204, 93, 'user', 19, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:49:01', '2018-06-20 11:49:01'),
(205, 121, 'user', 19, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:49:01', '2018-06-20 11:49:01'),
(206, 93, 'user', 20, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:49:17', '2018-06-20 11:49:17'),
(207, 121, 'user', 20, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:49:17', '2018-06-20 11:49:17'),
(208, 93, 'user', 21, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:51:17', '2018-06-20 11:51:17'),
(209, 121, 'user', 21, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 11:51:17', '2018-06-20 11:51:17'),
(210, 93, 'user', 22, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 12:04:18', '2018-06-20 12:04:18'),
(211, 121, 'user', 22, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 12:04:18', '2018-06-20 12:04:18'),
(212, 45, 'corp', 23, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 12:57:44', '2018-06-20 12:57:44'),
(213, 45, 'corp', 24, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 13:03:57', '2018-06-20 13:03:57'),
(214, 45, 'corp', 25, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 13:09:26', '2018-06-20 13:09:26'),
(215, 31, 'corp', 26, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 13:25:32', '2018-06-20 13:25:32'),
(216, 31, 'corp', 27, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 13:26:21', '2018-06-20 13:26:21'),
(217, 2, 'corp', 28, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 13:41:46', '2018-06-20 13:41:46'),
(218, 117, 'user', 29, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 17:31:00', '2018-06-20 17:31:00'),
(219, 121, 'user', 29, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 17:31:00', '2018-06-20 17:31:00'),
(220, 2, 'corp', 30, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 17:31:49', '2018-06-20 17:31:49'),
(221, 2, 'corp', 31, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 17:35:04', '2018-06-20 17:35:04'),
(222, 93, 'user', 32, 0, NULL, 1, NULL, NULL, NULL, '2018-06-20 17:35:43', '2018-06-20 17:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `sms_master`
--

CREATE TABLE `sms_master` (
  `uniqueId` int(10) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(5) DEFAULT NULL,
  `scheduleFor` int(2) DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_master`
--

INSERT INTO `sms_master` (`uniqueId`, `message`, `createdOn`, `scheduleFor`, `created_at`, `updated_at`) VALUES
(1, 'fsdfdsfds', 1529472656, NULL, '2018-06-20 11:01:07', '2018-06-20 11:01:07'),
(2, 'fsdfdsfdsfds', 1529472668, NULL, '2018-06-20 11:01:30', '2018-06-20 11:01:30'),
(3, 'fsdfdsfdsfds', 1529472691, NULL, '2018-06-20 11:02:24', '2018-06-20 11:02:24'),
(4, 'fsdfdsfdsfds', 1529472691, NULL, '2018-06-20 11:02:41', '2018-06-20 11:02:41'),
(5, 'fsdfdsfdsfds', 1529472691, NULL, '2018-06-20 11:06:37', '2018-06-20 11:06:37'),
(6, 'fsdfdsfdsfds', 1529472691, NULL, '2018-06-20 11:06:53', '2018-06-20 11:06:53'),
(7, 'vsfdsfdsfdsfds', 1529473015, NULL, '2018-06-20 11:07:05', '2018-06-20 11:07:05'),
(8, 'dsfdsfds', 1529473026, NULL, '2018-06-20 11:08:13', '2018-06-20 11:08:13'),
(9, 'vdfsdfsdfds', 1529473094, NULL, '2018-06-20 11:08:57', '2018-06-20 11:08:57'),
(10, 'vsdsfsfsdf', 1529473138, NULL, '2018-06-20 11:21:26', '2018-06-20 11:21:26'),
(11, 'dsfsafsa', 1529473887, NULL, '2018-06-20 11:24:01', '2018-06-20 11:24:01'),
(12, 'dsadadsa', 1529474043, NULL, '2018-06-20 11:28:27', '2018-06-20 11:28:27'),
(13, 'hello jattin', 1529474308, NULL, '2018-06-20 11:40:15', '2018-06-20 11:40:15'),
(14, 'dsnhfkdsndfks', 1529475016, NULL, '2018-06-20 11:44:18', '2018-06-20 11:44:18'),
(15, 'dsnhfkdsndfks', 1529475016, NULL, '2018-06-20 11:45:46', '2018-06-20 11:45:46'),
(16, 'dgdfgdfd', 1529475462, NULL, '2018-06-20 11:47:52', '2018-06-20 11:47:52'),
(17, 'dgdfgdfd', 1529475462, NULL, '2018-06-20 11:48:13', '2018-06-20 11:48:13'),
(18, 'dgdfgdfd', 1529475462, NULL, '2018-06-20 11:48:29', '2018-06-20 11:48:29'),
(19, 'dgdfgdfd', 1529475462, NULL, '2018-06-20 11:49:01', '2018-06-20 11:49:01'),
(20, 'dgdfgdfd', 1529475462, NULL, '2018-06-20 11:49:17', '2018-06-20 11:49:17'),
(21, 'dgdfgdfd', 1529475462, NULL, '2018-06-20 11:51:17', '2018-06-20 11:51:17'),
(22, 'dgdfgdfd', 1529475462, NULL, '2018-06-20 12:04:18', '2018-06-20 12:04:18'),
(23, 'nice jaatin keep uit up', 1529479649, NULL, '2018-06-20 12:57:44', '2018-06-20 12:57:44'),
(24, 'nice one', 1529479665, NULL, '2018-06-20 13:03:57', '2018-06-20 13:03:57'),
(25, 'nice one', 1529479665, NULL, '2018-06-20 13:09:26', '2018-06-20 13:09:26'),
(26, 'nice one', 1529481320, NULL, '2018-06-20 13:25:32', '2018-06-20 13:25:32'),
(27, 'nice onegdf', 1529481333, NULL, '2018-06-20 13:26:21', '2018-06-20 13:26:21'),
(28, 'testing purpodse', 1529481382, NULL, '2018-06-20 13:41:46', '2018-06-20 13:41:46'),
(29, 'hello g n', 1529496040, NULL, '2018-06-20 17:31:00', '2018-06-20 17:31:00'),
(30, 'vcxvcxfgds', 1529496061, NULL, '2018-06-20 17:31:49', '2018-06-20 17:31:49'),
(31, 'hello world', 1529496110, NULL, '2018-06-20 17:35:04', '2018-06-20 17:35:04'),
(32, 'hello world', 1529496305, NULL, '2018-06-20 17:35:43', '2018-06-20 17:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(12, '<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>\r\n<h5><strong>Dummy Text</strong></h5>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galley of type and scrambled it to make a type specimen book.</strong></p>', '2018-04-30 06:16:49', '2018-05-22 08:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jattin', 'jarora1994@gmail.com', '$2y$10$O6L8yz1RVpR1ci/SPuaABunXixQTPWoY.WBU.90i5PnoKswXT.JOC', 'LOBuKADn7gopPdxk65ULtLgtXoLgfkBjSkktdwuOQZocNcoNRO6OarBzdmfT', '2018-04-23 02:29:13', '2018-04-23 02:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE `user_verifications` (
  `uniqueId` int(10) UNSIGNED NOT NULL,
  `objectId` int(10) UNSIGNED NOT NULL,
  `objectType` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiredOn` int(2) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verifications`
--

INSERT INTO `user_verifications` (`uniqueId`, `objectId`, `objectType`, `token`, `expiredOn`, `created_on`) VALUES
(3, 2, 'user', 'TXCoKgHKfGyRaSOJCa4NrwHAqNnJs7', 1522404552, '2018-03-30 09:49:12'),
(4, 2, 'user', '9JbTd9JqyQtTP2uueGzWcdEczuUcvw', 1524631248, '2018-04-25 04:20:48'),
(5, 2, 'user', 'dZPYrxvED1IkHkdV8dOILADgSMXWam', 1524632663, '2018-04-25 04:44:23'),
(6, 2, 'user', 'zzXWP7nkWCUJGqL7985OmXBYa5pqHP', 1524632728, '2018-04-25 04:45:28'),
(7, 2, 'user', 'Oz7Xpekx3bs49PDnFJ9iLXtqXh5sU9', 1524636472, '2018-04-25 05:47:52'),
(8, 2, 'user', 'jtc11N8IhREOZeYulmG9wAXpNIEnMq', 1524636628, '2018-04-25 05:50:28'),
(9, 2, 'user', 'GEn8O2WP3sTVapd4Hclrg1wtmqtcu8', 1524637208, '2018-04-25 06:00:08'),
(10, 2, 'user', 'gSXUGSf3vqM9pzAuPXOb8CxYi9Oizs', 1524637477, '2018-04-25 06:04:37'),
(15, 28, 'corp', 'p40osAKlnvC235x88hBwWaSFjSc1Nx', 1525260668, '2018-05-02 11:11:08'),
(16, 28, 'corp', 'LxxZ34FqnF05P8dk9aOtWF1G9MBFcI', 1525260715, '2018-05-02 11:11:55'),
(17, 28, 'corp', 'MqavaoQjHCUKwpUGeg2zuzFJHz1WRw', 1525260744, '2018-05-02 11:12:24'),
(18, 28, 'corp', 'hu2COhJk51PoM4TVxpUcpgGwrdpifA', 1525260789, '2018-05-02 11:13:09'),
(20, 28, 'corp', 'jHw2kxeQp1946o1oZgMjTt16B1pghA', 1525320915, '2018-05-03 03:55:15'),
(21, 28, 'corp', 'T1nF8IWwSz2usK7xWFVWkgzASKLuiz', 1525321080, '2018-05-03 03:58:00'),
(22, 28, 'corp', 'aiQjNO8n4ENAqX6wIvjfOsePUUztXK', 1525321196, '2018-05-03 03:59:56'),
(23, 28, 'corp', 'Zxx3gpjLcyzm0v6HyPR56Ml554kIku', 1525322354, '2018-05-03 04:19:14'),
(24, 28, 'corp', 'jTtLeMd7VOXqDPUyNEljnaXKsYXuim', 1525322404, '2018-05-03 04:20:04'),
(25, 28, 'corp', 'OeBrvErusS4K1eHXBLgweSq5rDSDO1', 1525322451, '2018-05-03 04:20:51'),
(26, 28, 'corp', 'Vra6qW9l8mzKdnAa7jdjlI5h5NkUpY', 1525322498, '2018-05-03 04:21:38'),
(28, 28, 'corp', 'KTarMErfzHrdyx10Xo1gcSIh8H4Ums', 1525322644, '2018-05-03 04:24:04'),
(29, 28, 'corp', 'Rh51QIsNstwz9dNbHRY4QOPBgRSmrL', 1525416230, '2018-05-04 06:23:50'),
(30, 28, 'corp', '6fixXsusplxZHBjea0lfQByFmY2RnT', 1525417904, '2018-05-04 06:51:44'),
(31, 28, 'corp', 'dpcFzhnFKWFqaoEQBLhNyAdMXofn2j', 1525418064, '2018-05-04 06:54:24'),
(32, 28, 'corp', 'JqJex6ntHgQAfSTLO78lIbJmNdBzMv', 1525690809, '2018-05-07 10:40:09'),
(33, 28, 'corp', 'X5H2DXuUwRWkOmKZDvKa8in7B2KQvc', 1525690886, '2018-05-07 10:41:26'),
(34, 28, 'corp', 'SS5f8ven7E5QwcJLIoaBQQvqCl6LIh', 1525697515, '2018-05-07 12:31:55'),
(35, 24, 'driver', '23GlRi5XYu0BfdS2dg9riYsvroguys', 1526025159, '2018-05-11 07:32:39'),
(36, 24, 'driver', 'eHD3uGJ7LZz2qykgnLhlBTflzVv0EN', 1526025342, '2018-05-11 07:35:42'),
(37, 24, 'driver', 'r09vBmbRkookvzv1S6gXdgdHZcylwT', 1526036604, '2018-05-11 10:43:24'),
(40, 6, 'laundry', 'gv3sDWECOUexLSJ4iu3b9lWdbK0rze', 1526039621, '2018-05-11 11:33:41'),
(44, 29, 'driver', 'UuJf9Zj0wcGrHEMRxTuGqYWalms9ps', 1528108804, '2018-06-04 10:20:04'),
(45, 45, 'corp', 'FebPAUzuyTvyMWn1bxuUC67Jyg7ToJ', 1528111619, '2018-06-04 11:06:59'),
(46, 29, 'driver', 'sIvmTMxqxYLp3hS1lD3VuaQcvv9Ysp', 1528115776, '2018-06-04 12:16:16'),
(47, 29, 'driver', 'me5VzxXueg8Go1WTprIPjLVaKFIUqz', 1528115820, '2018-06-04 12:17:00'),
(48, 29, 'driver', 'LE04gKWt5jWo4ga3Ys0NeA9VuqqWLF', 1528115893, '2018-06-04 12:18:13'),
(49, 29, 'driver', 'jDInD72mNSVddR9rO3v6otruKVSd0E', 1528116514, '2018-06-04 12:28:34'),
(50, 29, 'driver', '54B6hBazcj2avQgEGrlIF7hlhV7ISk', 1528116578, '2018-06-04 12:29:38'),
(51, 29, 'driver', 'd2Zzc9p3AGRxTKLMQuYzFY3Kurqv7A', 1528192005, '2018-06-05 09:26:45'),
(54, 9, 'laundry', 'h6IT0vrlv2Rf9ukGmlCAtxTxzgmVtI', 1529488744, '2018-06-20 09:39:04'),
(55, 50, 'corp', 'Inrw3w9fUMqLxFRbCqtWRBK1ekswGf', 1530099130, '2018-06-27 11:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` int(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Convenient Pickup and Delivery at your fingertips', 'We use “smart scheduling” to always deliver a consistent, high quality experience that fits within your busy schedule.', '279409clothes.jpg', '2018-05-01 07:34:58', '2018-07-21 14:32:11'),
(2, 'Quality Cleaning', 'We have years of clothing care experience and are committed to providing the highest-quality clothing care available.', '675865cleaning-clothes.jpg', '2018-05-01 06:12:48', '2018-05-14 05:02:29'),
(3, 'Simple Scheduling', 'Schedule a Launder Services via the web (launderservices.com) or our mobile app.', '57755Depositphotos_9851126_xl-2015.jpg', '2018-05-01 07:03:03', '2018-07-30 17:47:52'),
(6, 'Customer Service', 'We provide a worldclass customer experience. If you have questions, text us and a real person on our team will text you back.', '474819cutomer.jpg', '2018-05-01 07:38:38', '2018-05-01 07:38:38'),
(8, 'We support Multiple task', 'It is a testing', '259929Desert.jpg', '2018-05-18 10:56:58', '2018-05-18 10:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `zone_master`
--

CREATE TABLE `zone_master` (
  `zoneId` int(10) NOT NULL,
  `zoneName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryId` int(5) NOT NULL,
  `createdOn` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_master`
--
ALTER TABLE `address_master`
  ADD PRIMARY KEY (`uniqueId`),
  ADD KEY `objectId` (`objectId`),
  ADD KEY `objectType` (`objectType`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_ details`
--
ALTER TABLE `bank_ details`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_master`
--
ALTER TABLE `cms_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate_user_master`
--
ALTER TABLE `corporate_user_master`
  ADD PRIMARY KEY (`corpCustId`);

--
-- Indexes for table `corp_user_details`
--
ALTER TABLE `corp_user_details`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `delivery_master`
--
ALTER TABLE `delivery_master`
  ADD PRIMARY KEY (`deliveryId`);

--
-- Indexes for table `driver_notification`
--
ALTER TABLE `driver_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_transaction`
--
ALTER TABLE `driver_transaction`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_title`
--
ALTER TABLE `faq_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helps`
--
ALTER TABLE `helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_user_master`
--
ALTER TABLE `individual_user_master`
  ADD PRIMARY KEY (`indvCustId`) USING BTREE,
  ADD KEY `userType` (`userType`),
  ADD KEY `indvCustId` (`indvCustId`);

--
-- Indexes for table `indv_user_details`
--
ALTER TABLE `indv_user_details`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `introducing_customer_offers`
--
ALTER TABLE `introducing_customer_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `laundryman_transaction`
--
ALTER TABLE `laundryman_transaction`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `ls_driver_master`
--
ALTER TABLE `ls_driver_master`
  ADD PRIMARY KEY (`driverId`);

--
-- Indexes for table `ls_gen_items`
--
ALTER TABLE `ls_gen_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `ls_item_packaging`
--
ALTER TABLE `ls_item_packaging`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `ls_item_pricelist`
--
ALTER TABLE `ls_item_pricelist`
  ADD PRIMARY KEY (`custPriceListId`);

--
-- Indexes for table `ls_laundryman_master`
--
ALTER TABLE `ls_laundryman_master`
  ADD PRIMARY KEY (`laundryId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_log`
--
ALTER TABLE `notification_log`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `notification_master`
--
ALTER TABLE `notification_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderDetailId`);

--
-- Indexes for table `order_log`
--
ALTER TABLE `order_log`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `packaging_master`
--
ALTER TABLE `packaging_master`
  ADD PRIMARY KEY (`packagingId`);

--
-- Indexes for table `panel_user`
--
ALTER TABLE `panel_user`
  ADD PRIMARY KEY (`adUserId`);

--
-- Indexes for table `pickup_master`
--
ALTER TABLE `pickup_master`
  ADD PRIMARY KEY (`pickupId`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_master`
--
ALTER TABLE `rating_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `refercode_detail`
--
ALTER TABLE `refercode_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_services`
--
ALTER TABLE `request_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `serves`
--
ALTER TABLE `serves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_master`
--
ALTER TABLE `service_master`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `sms_log`
--
ALTER TABLE `sms_log`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `sms_master`
--
ALTER TABLE `sms_master`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_master`
--
ALTER TABLE `zone_master`
  ADD PRIMARY KEY (`zoneId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_master`
--
ALTER TABLE `address_master`
  MODIFY `uniqueId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `api_users`
--
ALTER TABLE `api_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bank_ details`
--
ALTER TABLE `bank_ details`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `categoryId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_master`
--
ALTER TABLE `cms_master`
  MODIFY `uniqueId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `corporate_user_master`
--
ALTER TABLE `corporate_user_master`
  MODIFY `corpCustId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `corp_user_details`
--
ALTER TABLE `corp_user_details`
  MODIFY `uniqueId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `countryId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_master`
--
ALTER TABLE `delivery_master`
  MODIFY `deliveryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `driver_notification`
--
ALTER TABLE `driver_notification`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `driver_transaction`
--
ALTER TABLE `driver_transaction`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `faq_title`
--
ALTER TABLE `faq_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `helps`
--
ALTER TABLE `helps`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `individual_user_master`
--
ALTER TABLE `individual_user_master`
  MODIFY `indvCustId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `indv_user_details`
--
ALTER TABLE `indv_user_details`
  MODIFY `uniqueId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `introducing_customer_offers`
--
ALTER TABLE `introducing_customer_offers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundryman_transaction`
--
ALTER TABLE `laundryman_transaction`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_driver_master`
--
ALTER TABLE `ls_driver_master`
  MODIFY `driverId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ls_gen_items`
--
ALTER TABLE `ls_gen_items`
  MODIFY `itemId` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ls_item_packaging`
--
ALTER TABLE `ls_item_packaging`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ls_item_pricelist`
--
ALTER TABLE `ls_item_pricelist`
  MODIFY `custPriceListId` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ls_laundryman_master`
--
ALTER TABLE `ls_laundryman_master`
  MODIFY `laundryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification_log`
--
ALTER TABLE `notification_log`
  MODIFY `uniqueId` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notification_master`
--
ALTER TABLE `notification_master`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderDetailId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1058;

--
-- AUTO_INCREMENT for table `order_log`
--
ALTER TABLE `order_log`
  MODIFY `uniqueId` bigint(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `orderId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1526616088;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `uniqueId` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `uniqueId` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packaging_master`
--
ALTER TABLE `packaging_master`
  MODIFY `packagingId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `panel_user`
--
ALTER TABLE `panel_user`
  MODIFY `adUserId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pickup_master`
--
ALTER TABLE `pickup_master`
  MODIFY `pickupId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating_master`
--
ALTER TABLE `rating_master`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refercode_detail`
--
ALTER TABLE `refercode_detail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_services`
--
ALTER TABLE `request_services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serves`
--
ALTER TABLE `serves`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_master`
--
ALTER TABLE `service_master`
  MODIFY `serviceId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_log`
--
ALTER TABLE `sms_log`
  MODIFY `uniqueId` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `sms_master`
--
ALTER TABLE `sms_master`
  MODIFY `uniqueId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `uniqueId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `zone_master`
--
ALTER TABLE `zone_master`
  MODIFY `zoneId` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
