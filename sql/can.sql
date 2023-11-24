-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2023 at 11:38 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `can`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Deactive') NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `banner`) VALUES
(1, 'Series', 'Active', ''),
(2, 'Topics', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` enum('Pending','Completed','Cancelled') NOT NULL,
  `remarks` text NOT NULL,
  `nextdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `date`, `status`, `remarks`, `nextdate`) VALUES
(1, 'ranjeet', 'ranjeet@gmail.com', '7894563210', 'testing', '2023-04-05', 'Pending', '', '0000-00-00 00:00:00'),
(2, 'xfgdfg', 'gfdgfg', '3454564', 'vxdfvxcgd', '2023-04-05', 'Pending', '', '0000-00-00 00:00:00'),
(3, 'dfgfdgf', 'dfgg', '5464565', '5643656', '2023-04-05', 'Pending', '', '0000-00-00 00:00:00'),
(4, 'Marcos', 'marcos@consciousawakening.network', '(03) 5347 7033', 'Morning \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF:  https://caredogbest.shop\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nCheers, \r\n\r\nMarcos', '2023-06-04', 'Pending', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `added` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_contact`
--

CREATE TABLE `enquiry_contact` (
  `id` int NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `your_email` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `geners`
--

CREATE TABLE `geners` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Deactive','','') NOT NULL,
  `added` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `edited` datetime NOT NULL,
  `editedBy` datetime NOT NULL,
  `isDelete` int NOT NULL,
  `deleted` datetime NOT NULL,
  `deletedBy` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `geners`
--

INSERT INTO `geners` (`id`, `title`, `image`, `description`, `status`, `added`, `addedBy`, `edited`, `editedBy`, `isDelete`, `deleted`, `deletedBy`) VALUES
(2, 'Children ', 'K8PSJU_1677560467.png', 'Children ', 'Active', '2023-02-28 10:31:11', 713, '2023-03-28 13:00:55', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'Science Fiction', 'e394136576762acda6b416c7ce097716.png', 'Science Fiction', 'Active', '2023-03-09 17:00:32', 713, '2023-03-28 13:00:34', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'Mystery ', '20f4cb27b1ec3a9e8db39c8a5ca78667.png', 'Mystery ', 'Active', '2023-03-24 17:29:38', 713, '2023-03-28 13:00:13', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'Commedy', '', 'Commedy', 'Active', '2023-03-28 13:01:05', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'Documentary', '', 'Documentary', 'Active', '2023-03-28 13:01:12', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'Educational', '', 'Educational', 'Active', '2023-03-28 13:01:18', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'Fashion ', '', 'Fashion ', 'Active', '2023-03-28 13:01:24', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'Health ', '', 'Health ', 'Active', '2023-03-28 13:01:31', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'History', '', 'History', 'Active', '2023-03-28 13:01:37', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'Reality ', '', 'Reality ', 'Active', '2023-03-28 13:01:45', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'Sports', '', 'Sports', 'Active', '2023-03-28 13:01:53', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'Nature', 'download_(1).jfif', 'Nature', 'Active', '2023-03-28 13:01:59', 713, '2023-03-31 13:07:57', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'Technology', '8fb6086ca8f1cabbd474e4020f790d49.jpg', 'Technology', 'Active', '2023-03-28 13:02:06', 713, '2023-03-31 12:52:13', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'Spirituality ', '', 'Spirituality, Healing and Soul Expereince ', 'Active', '2023-04-06 12:53:39', 713, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `live_streaming`
--

CREATE TABLE `live_streaming` (
  `id` int NOT NULL,
  `rtmp1` text NOT NULL,
  `rtmp2` text NOT NULL,
  `rtmp3` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL,
  `isDelete` int NOT NULL,
  `added` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `edited` datetime NOT NULL,
  `editedBy` int NOT NULL,
  `deleted` datetime NOT NULL,
  `deletedBy` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_streaming`
--

INSERT INTO `live_streaming` (`id`, `rtmp1`, `rtmp2`, `rtmp3`, `status`, `isDelete`, `added`, `addedBy`, `edited`, `editedBy`, `deleted`, `deletedBy`) VALUES
(4, 'https://customer-9xz4d30045xixt28.cloudflarestream.com/b50f28035cc7ae0737c54a5a3d951700/manifest/video.m3u8', 'Broadcast Will Start Soon', '', 'Active', 0, '2023-06-08 20:41:18', 713, '2023-06-26 18:51:28', 713, '2023-06-06 12:46:45', 713);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int NOT NULL,
  `sub_category_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Deactive','','') NOT NULL,
  `added` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `edited` datetime NOT NULL,
  `editedBy` int NOT NULL,
  `isDelete` int NOT NULL,
  `deleted` datetime NOT NULL,
  `deletedBy` int NOT NULL,
  `banner` varchar(255) NOT NULL,
  `gener_id` varchar(255) NOT NULL,
  `video_type` varchar(255) NOT NULL,
  `video_description` longtext NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `isSlider` int NOT NULL,
  `isTrending` int NOT NULL,
  `sliderBanner` varchar(255) NOT NULL,
  `defaultBannerYutube` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `title` varchar(55) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('Active','Deactive','','') NOT NULL,
  `description` longtext NOT NULL,
  `deleted` datetime NOT NULL,
  `deletedBy` int NOT NULL,
  `added` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `updated` datetime NOT NULL,
  `updatedBy` int NOT NULL,
  `isDelete` int NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `alt_contact_no` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `address1` longtext NOT NULL,
  `address2` longtext NOT NULL,
  `map_link` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `page_name`, `image`, `status`, `description`, `deleted`, `deletedBy`, `added`, `addedBy`, `updated`, `updatedBy`, `isDelete`, `contact_no`, `alt_contact_no`, `email`, `address1`, `address2`, `map_link`, `logo`, `banner`) VALUES
(1, 'About us', '', 'B982QL_1677653627.png', 'Active', '<p style=\"text-align: justify;\"><font color=\"#000000\">Hello</font></p>', '0000-00-00 00:00:00', 0, '2022-06-08 12:21:41', 713, '2023-03-01 12:23:49', 713, 0, '', '', '', '', '', '', '0', 'KMAVWG_1677653540.png'),
(2, 'Terms & Condition', '', 'UE2PO0_1677653711.png', 'Active', '<span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", co</span>', '0000-00-00 00:00:00', 0, '2022-06-08 13:09:57', 713, '2023-03-01 12:25:38', 713, 0, '', '', '', '', '', '', '0', 'LR3X80_1677653737.png'),
(3, 'Privacy Policies', '', 'FOML41_1677650768.png', 'Active', '<p><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", co</span></p>', '0000-00-00 00:00:00', 0, '2022-06-08 13:13:09', 713, '2023-03-01 12:14:29', 713, 0, '', '', '', '', '', '', '0', '46T9L8_1677653068.png'),
(4, 'Refund Policy', '', 'U01F74_1660653666.png', 'Active', '<p><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", co</span></p>', '0000-00-00 00:00:00', 0, '2022-06-08 13:16:42', 713, '2023-03-03 11:41:17', 713, 0, '', '', '', '', '', '', '0', 'ZICK1O_1677823875.png'),
(5, 'Cancellation Policy', '', '9A537Q_1677651913.png', 'Active', '<p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; pointer-events: auto; font-size: 15px; line-height: normal; color: rgb(0, 0, 0); text-align: justify;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">The Cosmic Connect has a clear, concise, and fair return policy. If the following provisions are met, the customer is entitled to a complete refund and can request it within seven (7) days of delivery. </span></p><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; pointer-events: auto; font-size: 15px; line-height: normal; color: rgb(0, 0, 0); text-align: justify;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">​</span></p><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; pointer-events: auto; font-size: 15px; line-height: normal; color: rgb(0, 0, 0); text-align: justify;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">To be eligible for a return & exchange, you must meet the following requirements: </span></p><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; pointer-events: auto; font-size: 15px; line-height: normal; color: rgb(0, 0, 0); text-align: justify;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">​</span></p><ul class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0.5em; padding: 0px 0px 0px 1.3em; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; list-style-position: initial; list-style-image: initial; pointer-events: auto; font-size: 15px; line-height: normal; color: rgb(0, 0, 0); text-align: justify;\"><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: inherit; font-weight: inherit; line-height: normal;\"><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: normal; color: rgb(var(--color_15)); letter-spacing: 0em;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">If a crystal or gemstone is proven synthetic by any approved or reputed gemological institute, the customer will receive a complete refund</span></p></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: inherit; font-weight: inherit; line-height: normal;\"><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: normal; color: rgb(var(--color_15)); letter-spacing: 0em;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Also, if the item delivered does not match the description on our website</span></p></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: inherit; font-weight: inherit; line-height: normal;\"><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: normal; color: rgb(var(--color_15)); letter-spacing: 0em;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">If the item is damaged or not in good working order when it is delivered</span></p></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: inherit; font-weight: inherit; line-height: normal;\"><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: normal; color: rgb(var(--color_15)); letter-spacing: 0em;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Our Returns & Replacement Policy does not cover damages caused by neglect or improper use. We ensure that items are dispatched only after a thorough quality check and proper packaging on our end. </span></p></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: inherit; font-weight: inherit; line-height: normal;\"><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: normal; color: rgb(var(--color_15)); letter-spacing: 0em;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Original Product Certificate and Original/Copy of Invoice, packaging, documentation, etc., must be included with the item(s) in original, unused condition</span></p></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: inherit; font-weight: inherit; line-height: normal;\"><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: normal; color: rgb(var(--color_15)); letter-spacing: 0em;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">All product return requests must be submitted within three (3) days of the delivery date. After three (3) days from delivery, no requests for returns will be processed. </span></p></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: inherit; font-weight: inherit; line-height: normal;\"><p class=\"font_8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: normal; color: rgb(var(--color_15)); letter-spacing: 0em;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">The Cosmic Connect only sells natural gemstones that come with a certificate of authenticity. In any other case, we do not accept returns or refunds.</span></p></li></ul>', '0000-00-00 00:00:00', 0, '2022-06-08 13:17:31', 713, '2023-03-01 11:55:36', 713, 0, '', '', '', '', '', '', '0', 'VR8IG3_1677651927.png'),
(6, 'Contact_us', '', '', 'Active', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2023-02-28 18:13:25', 713, 0, '8319245505', '8269730653', 'info@kfcmart.com', 'Indra Colony', 'Mandsour', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3501.704228007763!2d77.0764483!3d28.6386254!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d056ada47273f%3A0x78c57d06a1c2ea8f!2sThe%20Cosmic%20Connect%20-%20Most%20Trusted%20centre%20for%20Psychic%20Tarot%20Reading%20%7C%20Reiki%20Healing%20%7C%20Mokshapat%20Reading%7C%20Gemstones%20%26%20Crystals!5e0!3m2!1sen!2sin!4v1672294233080!5m2!1sen!2sin', '0', 'TSN8CX_1677588205.png'),
(7, 'Shipping Policy', '', '4IJCK8_1677653123.png', 'Active', '<p>testing</p>', '0000-00-00 00:00:00', 0, '2023-02-03 17:04:00', 713, '2023-03-01 12:15:44', 713, 0, '', '', '', '', '', '', '0', 'PLIQ7N_1677653142.png'),
(8, 'Payment Policy', '', '8I0CNM_1675424286.png', 'Active', '<h1 style=\"margin-bottom: 0px; font-weight: 600; font-size: 24px; color: rgb(1, 41, 112); background-color: rgb(246, 249, 255);\">Payment Policy testing</h1>', '0000-00-00 00:00:00', 0, '2023-02-03 17:08:16', 713, '2023-03-01 11:57:24', 713, 0, '', '', '', '', '', '', '0', 'JRF8PE_1677652043.png'),
(9, 'Saller Agreement', '', 'PWK26E_1675424602.png', 'Active', 'testing', '0000-00-00 00:00:00', 0, '2023-02-03 17:13:41', 713, '2023-03-03 11:39:41', 713, 0, '', '', '', '', '', '', '0', 'HB238G_1677823780.png'),
(10, 'Press Releases /Delcemiration', '', 'QEK2P1_1675426314.png', 'Active', '<h1 style=\"margin-bottom: 0px; font-weight: 600; font-size: 24px; color: rgb(1, 41, 112); background-color: rgb(246, 249, 255);\">Press Releases /Deceleration test</h1>', '0000-00-00 00:00:00', 0, '2023-02-03 17:41:55', 713, '2023-02-03 17:50:10', 713, 0, '', '', '', '', '', '', '0', ''),
(11, 'KFC Mart Logo', '', '', 'Active', '', '0000-00-00 00:00:00', 0, '2023-02-15 11:50:55', 713, '2023-03-01 13:15:35', 713, 0, '', '', '', '', '', '', 'IBAFJ0_1677656735.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `encrypt_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `encrypt_key`) VALUES
(1, 'row_per_page', '20', ''),
(2, 'pp', '12345', ''),
(3, 'isDeletePin', '0', ''),
(4, 'dateFormate', 'd-M-Y', ''),
(5, 'dateTimeFormat', 'd-M-Y h:i:s A', ''),
(6, 'timeFormate', 'h:i A', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `video` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL,
  `isDelete` int NOT NULL,
  `added` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `edited` datetime NOT NULL,
  `editedBy` int NOT NULL,
  `deleted` datetime NOT NULL,
  `deletedBy` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `video`, `thumbnail`, `title`, `text`, `status`, `isDelete`, `added`, `addedBy`, `edited`, `editedBy`, `deleted`, `deletedBy`) VALUES
(12, '43faafe344f2f793f29d5d264c333b09.mp4', 'd73cbe7425d58164ddb469ca0b4bd6f2.png', '', 'WELCOME TO THE CONSCIOUS AWAKENING NETWORK', 'Active', 0, '2023-04-01 17:27:56', 713, '2023-09-30 17:57:49', 713, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `host` int NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` enum('Active','Deactive') NOT NULL,
  `isDelete` int NOT NULL,
  `added` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `edited` datetime NOT NULL,
  `editedBy` int NOT NULL,
  `deleted` datetime NOT NULL,
  `deletedBy` int NOT NULL,
  `isHome` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `suscriber_list`
--

CREATE TABLE `suscriber_list` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `added` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suscriber_list`
--

INSERT INTO `suscriber_list` (`id`, `email`, `added`) VALUES
(2, 'bilspatidar@gmail.com', '2023-06-10 18:24:13'),
(3, 'a@gmail.com', '2023-06-11 12:59:53'),
(4, 'b@gmail.com', '2023-06-11 13:23:06'),
(5, 'ilspatidar@gmail.com', '2023-06-11 14:50:23'),
(6, 'test@test.com', '2023-06-11 14:55:23'),
(7, 'test@test.co', '2023-06-11 15:04:38'),
(8, 'test1@test.com', '2023-06-11 15:05:27'),
(9, 'test2@test.com', '2023-06-11 15:05:47'),
(10, 'test3@test.com', '2023-06-11 15:09:18'),
(11, 'sheila@sheilaseppi.com', '2023-07-18 18:58:13'),
(12, 'markschelde@mac.com', '2023-07-18 21:01:53'),
(13, 'KitCWms@aol.com', '2023-07-18 21:20:06'),
(14, 'darlenevandegrift@gmail.com', '2023-07-18 23:30:22'),
(15, 'Michele@centerwithin.com', '2023-07-19 05:22:38'),
(16, 'drmelaniebarton@gmail.com', '2023-07-20 05:05:10'),
(17, 'hermessenger@yahoo.co.uk', '2023-07-20 10:46:09'),
(18, 'claritybychristy@gmail.com', '2023-07-21 17:40:11'),
(19, 'lsb1iam@yahoo.com', '2023-07-23 23:22:11'),
(20, 'sabineponcelet@yahoo.com', '2023-07-26 12:58:59'),
(21, 'marenreneb@gmail.com', '2023-08-03 09:10:21'),
(22, 'nthompson555@icloud.com', '2023-08-04 09:00:23'),
(23, 'maryvanceperry@gmail.com', '2023-08-07 05:31:24'),
(24, 'supegram@gmail.com', '2023-08-07 21:11:12'),
(25, 'spryte7@outlook.com', '2023-08-08 01:25:39'),
(26, 'maloueriksson@hotmail.com', '2023-08-20 20:25:58'),
(27, 'adamours23@gmail.com', '2023-08-26 09:33:11'),
(28, 'pasqualelorij@gmail.com', '2023-09-03 00:58:10'),
(29, 'heather@northriverhc.com', '2023-09-03 05:45:39'),
(30, 'nthompson555@me.com', '2023-09-05 07:32:22'),
(31, 'amitha.naran@gmail.com', '2023-09-07 17:18:31'),
(32, 'sergioa.arenas@gmail.com', '2023-09-22 23:36:43'),
(33, 'kgesqueda@gmail.com', '2023-09-30 19:45:37'),
(34, 'patcates@mac.com', '2023-10-03 10:54:18'),
(35, 'stephanyoga@gmail.com', '2023-10-07 01:14:42'),
(36, 'todd.baggett@gmail.com', '2023-10-08 02:19:41'),
(37, 'libbislens@gmail.com', '2023-10-13 02:09:34'),
(38, 'dahurtt@yahoo.com', '2023-10-19 18:53:49'),
(39, 'my@e-mel.de', '2023-10-20 13:13:54'),
(40, 'amberadams6677@gmail.com', '2023-10-23 01:35:18'),
(41, 'mwk9@me.com', '2023-10-27 08:30:36'),
(42, 'deonlyons.us@gmail.com', '2023-10-31 07:56:58'),
(43, 'debbie@hypno-healing.com', '2023-11-01 17:33:54'),
(44, 'ebayweld54@att.net', '2023-11-02 18:22:05'),
(45, 'admin@carolynrogers.com.au', '2023-11-04 12:29:56'),
(46, 'Bledsoe_Ronald@yahoo.com', '2023-11-05 01:26:16'),
(47, 'laurian.arghisan@gmail.com', '2023-11-05 03:22:49'),
(48, 'jeccles2368@outlook.com', '2023-11-05 11:19:44'),
(49, 'Raymond@tcwi.info', '2023-11-05 15:23:08'),
(50, 'george@hilltonzuk.com', '2023-11-05 20:57:47'),
(51, 'aroushashahin@gmail.com', '2023-11-06 00:05:10'),
(52, 'moreoliver13@gmail.com', '2023-11-06 12:42:35'),
(53, 'k4atw@gmx.co.uk', '2023-11-07 01:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `using_google` int NOT NULL,
  `parent_id` int NOT NULL,
  `refferBy` int NOT NULL,
  `reffer_price` float NOT NULL,
  `reffer_type` int NOT NULL,
  `reffer_status` int NOT NULL,
  `isDelete` int NOT NULL,
  `status` enum('Active','Deactive','','') NOT NULL,
  `kycStatus` enum('Pending','Success','Reject') NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cPassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `alt_mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `role_id` int NOT NULL,
  `role_ids` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `updatedBy` int NOT NULL,
  `deletedBy` int NOT NULL,
  `encrypt_key` varchar(255) NOT NULL,
  `deleted` datetime NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `business_registered` date NOT NULL,
  `business_type_id` int NOT NULL,
  `business_category_id` int NOT NULL,
  `business_subcategory_id` int NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country_id` int NOT NULL,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `pincode_id` int NOT NULL,
  `street_address` text NOT NULL,
  `street_address2` text NOT NULL,
  `isPhotoVerified` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `skypeID` int NOT NULL,
  `websiteURL` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `shop_code` varchar(255) NOT NULL,
  `businessDesc` text NOT NULL,
  `businessRole` int NOT NULL,
  `businessGstin` varchar(255) NOT NULL,
  `businessPan` varchar(255) NOT NULL,
  `account` int NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `Ifsc` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `mart_id` int NOT NULL,
  `addreeFile` varchar(255) NOT NULL,
  `gstFile` varchar(255) NOT NULL,
  `businessSignature` varchar(255) NOT NULL,
  `panFile` varchar(255) NOT NULL,
  `processing_currency` int NOT NULL,
  `shop_logo` varchar(255) NOT NULL,
  `shop_baner` varchar(255) NOT NULL,
  `shop_image` varchar(255) NOT NULL,
  `cAccount` int NOT NULL,
  `acountHoldername` varchar(255) NOT NULL,
  `id_card` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `using_google`, `parent_id`, `refferBy`, `reffer_price`, `reffer_type`, `reffer_status`, `isDelete`, `status`, `kycStatus`, `name`, `password`, `cPassword`, `email`, `mobile`, `alt_mobile`, `address`, `profile_pic`, `user_type`, `code`, `role_id`, `role_ids`, `dob`, `doj`, `added`, `updated`, `addedBy`, `updatedBy`, `deletedBy`, `encrypt_key`, `deleted`, `company_name`, `industry`, `business_registered`, `business_type_id`, `business_category_id`, `business_subcategory_id`, `postal_code`, `country_id`, `state_id`, `city_id`, `pincode_id`, `street_address`, `street_address2`, `isPhotoVerified`, `first_name`, `last_name`, `skypeID`, `websiteURL`, `description`, `businessName`, `shop_code`, `businessDesc`, `businessRole`, `businessGstin`, `businessPan`, `account`, `bankName`, `Ifsc`, `branch`, `mart_id`, `addreeFile`, `gstFile`, `businessSignature`, `panFile`, `processing_currency`, `shop_logo`, `shop_baner`, `shop_image`, `cAccount`, `acountHoldername`, `id_card`) VALUES
(713, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'THE CONSCIOUS AWAKENING NETWORK', '$2y$10$SdFRBjO7cOvLfbXNwP5M/Ov4U1JIYc3ONW/k.VpdkyaeJB3y8DwCe', '', 'sheila@consciousawakeningnetwork.org', '222222222222', '', 'india', 'Z8SJRL_1677235596.png', 'superadmin', '', 1, '0', '0000-00-00', '0000-00-00', '2023-06-21 07:42:19', '2023-03-03 21:20:20', 1, 713, 0, 'jRwihqqxMungGau2ywe9BBwFj', '0000-00-00 00:00:00', 'microshoft  technology', '0000-00-00 00:00:00', '0000-00-00', 2, 4, 1, '458225', 101, 21, 2070, 0, 'Chavni indore\r\nAisxbank', 'Aisxbank  ', 0, 'balram', 'Patidar', 233456, 'www.sparkhub.com.in', '<span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </span> ', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(907, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'Balram', '$2y$10$SdFRBjO7cOvLfbXNwP5M/Ov4U1JIYc3ONW/k.VpdkyaeJB3y8DwCe', '', 'bilspatidar1@gmail.com', '7000165361', '', '', '', 'user', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-04 15:24:03', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(908, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'Balram', '$2y$10$GTzW0Z5t/gnW5kfOkAv8wO3qFsfO7ivSSNtw5K.MODwPyoHEuGHJi', '', 'a@gmail.com', '7000165361', '', '', '', 'customer', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-05 22:04:08', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(909, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'Hrishabh', '$2y$10$RnTgEAGv3HbjH/buaxsNh.m8nMTPQsVGKowwF41YJtr5c87mTykgq', '', 'rishabh4828@gmail.com', '9785144828', '', '', '', 'customer', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-05 22:21:54', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(910, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', '', '$2y$10$XwslAdBv8x.ORLzaiGMrOe7eT1MJV4enIUPCIkLtjkT.fzA7cJEUC', '', 'ranjeet1998p@gmail.com', '6262534548', '', '', '', 'customer', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-17 05:42:28', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(911, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', '', '$2y$10$3N9yJbdheaoAjM5sfRLDzeW//LpUhHodKclkrnYD/.oQn1OpgGJy.', '', 'ranjeetpatidar5@gmail.com', '789456231', '', '', '', 'customer', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-16 11:07:44', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(912, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'ranjeet', '$2y$10$OO.buNBZAIhOBTMMR7rL3OWfWUtk2VB2M4Zaw41UE/XcEtUrTc182', '', 'ranjeetpatidar143@gmail.com', '7879010719', '', '', '', 'customer', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-17 08:29:13', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(913, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'hemant', '$2y$10$Py2RKu1aLBNCtWVAZNiX/.Lhgk7DRZ9TkClUw7e4wjtcmoZMvP8Zq', '', 'hemant@gmail.com', '8956320147', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-20 08:16:39', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(914, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'ranjeet', '$2y$10$k44ilcv1ZgP.NYTs7z97Iuiw3V1Jg1.tN4pMFx5JAnK2E0KhJh8Yq', '', 'ranjeet19@gmail.com', '7895632410', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-30 08:24:38', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(915, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'ranjeetpatidar', '$2y$10$VGUZwI2R.0F7rlFcaAflL.pQHTUgw7kveHtN7KKtORQT6W5iM.BUK', '', 'ranjeet190@gmail.com', '7845693210', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-20 08:12:25', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(916, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'thg', '$2y$10$LlSxgqVUevaiT1RdBzk9heELU.gfrmojSWYwyRVgVN0BDasG7Jlhi', '', 'patidar@gmail.com', '56656', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-20 08:14:40', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(917, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'rp', '$2y$10$dXAM1AbNn3uLGA3SZMn.weNBziX.QHe5vIf16a1ixPJ9rSWlJFchm', '', 'ranjeet1998@gmail.com', '7894561230', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-30 08:31:54', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(918, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'yashraj', '$2y$10$aFNlM10HMsfngrx9lWq0EenYqTqBvS9GGI2gYW.OVRmVJ/r4JUo5C', '', 'ranjeet198@gmail.com', '1234567890', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-30 10:27:31', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(919, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'ranjeet', '$2y$10$z748v/wq6XQvDjNxQ6QQVuisuujGi9InnGh2PoKtmpfHkbYnA1TFm', '', 'ranjeet@gmail.com', '7896541230', '', 'testing', '737b64cacb31ee6b7680317a54a57096.png', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-03-31 08:29:55', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(920, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', '???? Hello World! https://national-team.top/go/hezwgobsmq5dinbw?hs=0b3cc5d5deb3503efb161cbb0f20c008 ????', '$2y$10$Eaf/tUXhqOQE85H.ftdRD.PNlZldPfIKcMRA55SBlaE6QK.Dk0rDK', '', 'xsoog@merepost.com', '8nlk7w', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-06-30 04:49:46', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(921, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', 'Balram', '$2y$10$hph.n8m7taMU09CWALH4r.rujD.Q0iO8ItWXv0axtli4GDqYxhYui', '', 'bilspatidar11@gmail.com', '7000165361', '', '', '', 'customer', '', 0, '', '0000-00-00', '0000-00-00', '2023-07-12 19:17:28', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', ''),
(922, 0, 0, 0, 0, 0, 0, 0, 'Active', 'Pending', '???? Get free iPhone 14 Pro Max: http://kasokapolytechnic.com/upload/go.php ???? hs=0b3cc5d5deb3503efb161cbb0f20c008*', '$2y$10$nKtruSgiFB7ZV/VSOWy00.LSSgSOHHkjWF98TRW6cC//tzfG6Xt5q', '', 'wqgaoz@merepost.com', 'gc2v1x', '', '', '', 'users', '', 0, '', '0000-00-00', '0000-00-00', '2023-10-19 02:00:25', '0000-00-00 00:00:00', 0, 0, 0, '', '0000-00-00 00:00:00', '', '', '0000-00-00', 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersession`
--

CREATE TABLE `usersession` (
  `id` int NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `views` int NOT NULL,
  `adds` int NOT NULL,
  `edits` int NOT NULL,
  `deletes` int NOT NULL,
  `encrypt_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('Active','Deactive','','') NOT NULL,
  `encrypt_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_contact`
--
ALTER TABLE `enquiry_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geners`
--
ALTER TABLE `geners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_streaming`
--
ALTER TABLE `live_streaming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suscriber_list`
--
ALTER TABLE `suscriber_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `usersession`
--
ALTER TABLE `usersession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry_contact`
--
ALTER TABLE `enquiry_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geners`
--
ALTER TABLE `geners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `live_streaming`
--
ALTER TABLE `live_streaming`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=583;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `suscriber_list`
--
ALTER TABLE `suscriber_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=923;

--
-- AUTO_INCREMENT for table `usersession`
--
ALTER TABLE `usersession`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
