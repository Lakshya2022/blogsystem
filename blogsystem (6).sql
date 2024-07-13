-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 04:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 1,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `status`, `role`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', 1, 1, '2024-05-04', '2024-05-04 17:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `post_by` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `post_by`, `category_id`, `sub_category_id`, `feature`, `post_name`, `post_title`, `url`, `details`, `image`, `post_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 3, '', 'Create a custom checkout page in minutes and Increase your sales with WooLentor', 'WooLentor is a powerful WordPress plugin for WooCommerce', 'Jc_I9fjJjAg', '<p>Create a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentor<br></p>', 'post/blog-details-1.webp', 3, 1, '2024-06-05 17:43:40', '2024-06-21 07:19:33'),
(10, 'admin', 7, 34, 'new', 'Jaipur is the capital of Rajasthanuytrgfsd', ' full of tales of jaipuriyutrgf', 'kRZLUCWswlwa', '<p class=\"is-style-highlight-text\" style=\"box-sizing: inherit; margin-bottom: var(--global-md-spacing); color: rgb(71, 71, 71); font-family: \" dm=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">Jaipur is a city of creative industry! Leather shoes, hand block print fabrics, precious gems, and wooden furniture are just some of the specialty items you can buy. And it’s also the best city in India for hotels, there is a fantastic array in every budget, and you won’t have any trouble meeting other travellers.&nbsp;</p><p class=\"is-style-highlight-text\" style=\"box-sizing: inherit; margin-bottom: var(--global-md-spacing); color: rgb(71, 71, 71); font-family: \" dm=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 18px;\"=\"\">&nbsp;</p><div>asdfghujkl;kiujyhtfgds</div>', 'post/food2.jfif', 4, 1, '2024-06-12 07:26:20', '2024-06-25 07:10:44'),
(11, 'admin', 6, 0, 'related', 'fghjm,', 'ghm,', 'H3R1y1ADCZw', '<p>gsfsfsdfdsf</p>', 'post/Playing-holi-in-Jaipur-1024x854.jpeg', 2, 1, '2024-06-14 07:23:22', '2024-06-14 07:23:22'),
(12, 'admin', 4, 25, 'related', 'Health', 'Health care', '8NGlENS1qgo', '<p style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: #3b82f680; --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-right: 0px; margin-left: 0px; font-family: Commissioner, sans-serif; line-height: 1.75; --tw-text-opacity: 1; color: rgb(4, 54, 84);\">Today, Action for Global Health publishes the Stocktake Review. This report provides an assessment and a series of recommendations for the UK’s role in global health.</p><div><p style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: #3b82f680; --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-right: 0px; margin-left: 0px; font-family: Commissioner, sans-serif; line-height: 1.75; --tw-text-opacity: 1; color: rgb(4, 54, 84);\">Today, Action for Global Health publishes the Stocktake Review. This report provides an assessment and a series of recommendations for the UK’s role in global health.</p></div><div><br></div>', 'post/health care.jpg', 4, 1, '2024-06-14 07:33:38', '2024-06-24 07:39:27'),
(14, '4', 3, 15, 'new', 'Food', 'Food and restaurant', '', '', 'admin/post/food2.jfif', 5, 1, '2024-06-19 07:08:35', '2024-06-24 07:40:37'),
(15, '4', 3, 20, 'new', 'Food', 'Food and restaurant', 'H3R1y1ADCZw', '', 'admin/post/food2.jfif', 1, 1, '2024-06-19 07:11:47', '2024-06-24 07:40:44'),
(16, '4', 3, 16, 'new', 'Food', 'Food and restaurant', 'H3R1y1ADCZw', '', 'admin/post/food2.jfif', 2, 1, '2024-06-19 07:13:56', '2024-06-20 07:12:36'),
(17, '4', 3, 22, 'new', 'Food', 'Food and restaurant', 'H3R1y1ADCZw', '', 'admin/post/food2.jfif', 2, 1, '2024-06-19 07:14:24', '2024-06-20 07:12:44'),
(18, '4', 5, 16, 'related', 'fsdfdsfsfsdfsdfds', 'fsdfdsfdsfsdfds', '49HTIoCccDY', '<p>Create a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentor<br></p>', 'admin/post/food2.jfif', 2, 1, '2024-06-19 07:16:53', '2024-06-25 07:14:50'),
(19, '4', 2, 20, 'new', 'my travel blog, Love Travelling.', 'Travel', '49HTIoCccDY', '<p>Create a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentorCreate a custom checkout page in minutes and Increase your sales with WooLentor<br></p>', 'admin/post/Jaipur_-25.jpg', 5, 1, '2024-06-21 07:38:56', '2024-06-25 07:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Travel & Transportation', 'category/travel.jpg', 1, '2024-05-28', '2024-05-28'),
(3, 'Food & Dining ', 'category/food.jpg', 1, '2024-05-28', '2024-05-28'),
(4, 'Health & Medicine ', 'category/medi.jpg', 1, '2024-05-28', '2024-05-28'),
(5, 'Automotive', 'category/auto.jpg', 1, '2024-05-28', '2024-05-28'),
(6, 'Computers & Electronics ', 'category/com.jpg', 1, '2024-05-28', '2024-05-28'),
(7, 'Construction & Contractors', 'category/const.jpg', 1, '2024-05-28', '2024-05-28'),
(8, 'Education', 'category/download (13).jpg', 1, '2024-05-28', '2024-05-28'),
(9, 'Entertainment', 'category/enter.jpg', 1, '2024-05-28', '2024-05-28'),
(10, 'Home & Garden', 'category/home.jpg', 1, '2024-05-28', '2024-05-28'),
(11, 'Legal & Financial', 'category/Legal & Financial1.jpg', 1, '2024-05-28', '2024-05-28'),
(12, 'Merchants (Retail)', 'category/Merchants (Retail).jpg', 1, '2024-05-28', '2024-05-28'),
(13, 'Personal Care & Services', 'category/Personal Care & Services.jpg', 1, '2024-05-28', '2024-05-28'),
(14, 'Real Estate', 'category/Real Estate.jpg', 1, '2024-05-28', '2024-05-28'),
(15, 'Miscellaneous', 'category/Miscellaneous.jpg', 1, '2024-05-29', '2024-05-29'),
(16, 'Manufacturing, Wholesale, Distribution', 'category/Manufacturing, Wholesale,.jpg', 1, '2024-05-29', '2024-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `icon`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'fa fa-facebook', 'https://www.facebook.com/', 1, '2024-06-07 00:47:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `subcat_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Consultants', 'subcategory/cons.jpg', 1, '0000-00-00', '0000-00-00'),
(2, 1, 'Employment Agency ', 'subcategory/download (20).jpg', 1, '0000-00-00', '0000-00-00'),
(3, 1, 'Marketing & Communications ', 'subcategory/mar.jpg', 1, '0000-00-00', '0000-00-00'),
(4, 1, 'Office Supplies ', 'subcategory/office.jpg', 1, '0000-00-00', '0000-00-00'),
(5, 1, 'Printing & Publishing ', 'subcategory/print.jpg', 1, '0000-00-00', '0000-00-00'),
(6, 3, 'Desserts, Catering & Supplies ', 'subcategory/food.jpg', 1, '0000-00-00', '0000-00-00'),
(7, 3, 'Fast Food & Carry Out ', 'subcategory/gr.jpg', 1, '0000-00-00', '0000-00-00'),
(8, 3, 'Restaurants', 'subcategory/res.jpg', 1, '0000-00-00', '0000-00-00'),
(9, 15, 'Agencies & Brokerage', 'subcategory/Agencies & Brokerage.jpg', 1, '0000-00-00', '0000-00-00'),
(10, 2, 'Hotel, Motel & Extended Stay', 'subcategory/Hotel, Motel & Extended Stay.jpg', 1, '0000-00-00', '0000-00-00'),
(11, 5, 'Auto Accessories', 'subcategory/Auto Accessories.jpg', 1, '0000-00-00', '0000-00-00'),
(12, 5, 'Auto Dealers – New ', 'subcategory/Auto Dealers – New.jpg', 1, '0000-00-00', '0000-00-00'),
(13, 5, 'Auto Dealers – used', 'subcategory/Auto Dealers – Used.jpg', 1, '0000-00-00', '0000-00-00'),
(14, 5, 'Detail & Carwash ', 'subcategory/Detail & Carwash.avif', 1, '0000-00-00', '0000-00-00'),
(15, 5, 'Gas Stations ', 'subcategory/Gas Stations.jpg', 1, '0000-00-00', '0000-00-00'),
(16, 5, 'Motorcycle Sales & Repair ', 'subcategory/Motorcycle Sales & Repair.jpg', 1, '0000-00-00', '0000-00-00'),
(17, 5, 'Rental & Leasing ', 'subcategory/Rental & Leasing.jpg', 1, '0000-00-00', '0000-00-00'),
(18, 5, 'Service, Repair & Parts ', 'subcategory/Service, Repair & Parts.jpg', 1, '0000-00-00', '0000-00-00'),
(19, 5, 'Towing ', 'subcategory/Towing.jpg', 1, '0000-00-00', '0000-00-00'),
(20, 2, 'Travel & Tourism ', 'subcategory/Travel & Tourism.jpg', 1, '0000-00-00', '0000-00-00'),
(21, 2, 'Packaging & Shipping ', 'subcategory/Packaging & Shipping.jpg', 1, '0000-00-00', '0000-00-00'),
(22, 13, 'Nail Salons ', 'subcategory/Nail Salons.jpg', 1, '0000-00-00', '0000-00-00'),
(23, 13, 'Beauty Supplies ', 'subcategory/Beauty Supplies.jpg', 1, '0000-00-00', '0000-00-00'),
(24, 13, 'Massage & Body Works ', 'subcategory/Massage & Body Works.jpg', 1, '0000-00-00', '0000-00-00'),
(25, 4, 'Diet I& Nutrition ', 'subcategory/Diet I& Nutrition.jpg', 1, '0000-00-00', '0000-00-00'),
(27, 10, 'Flower Shops ', 'category/Flower Shops.jpg', 1, '0000-00-00', '0000-00-00'),
(28, 10, 'Home Goods ', 'category/Home Goods.jpg', 1, '0000-00-00', '0000-00-00'),
(29, 10, 'Home Furnishings ', 'category/Home Furnishings.jpg', 1, '0000-00-00', '0000-00-00'),
(30, 0, ' Antiques & Collectibles ', 'subcategory/Home & Garden Antiques & Collectibles.jpg', 1, '0000-00-00', '0000-00-00'),
(31, 10, 'Crafts, Hobbies & Sports ', 'category/Crafts, Hobbies & Sports.jpg', 1, '0000-00-00', '0000-00-00'),
(32, 6, 'Consumer Electronics & Accessories ', 'category/Consumer Electronics & Accessories.jpg', 1, '0000-00-00', '0000-00-00'),
(33, 7, 'Environmental Assessments ', 'category/download (21).jpg', 1, '0000-00-00', '0000-00-00'),
(34, 7, 'Roofers', 'category/Roofers.jpg', 1, '0000-00-00', '0000-00-00'),
(35, 9, ' Artists, Writers ', 'category/Entertainment Artists, Writers.jpg', 1, '0000-00-00', '0000-00-00'),
(36, 9, 'Movies', 'category/Movies.webp', 1, '0000-00-00', '0000-00-00'),
(37, 13, 'Jewelry', 'subcategory/Jewelry.jpg', 1, '0000-00-00', '0000-00-00'),
(38, 13, 'Clothing & Accessories ', 'subcategory/Clothing & Accessories.jpeg', 1, '0000-00-00', '0000-00-00'),
(39, 15, 'Utility Companies', 'category/Utility Companies.jpg', 1, '0000-00-00', '0000-00-00'),
(40, 15, 'Funeral Service Providers & Cemetaries', 'category/Funeral Service Providers & Cemetaries.jpg', 1, '0000-00-00', '0000-00-00'),
(41, 17, 'Wholesale', 'subcategory/Wholesale.jpg', 1, '0000-00-00', '0000-00-00'),
(42, 12, 'Insurance ', 'subcategory/Insurance.jpg', 1, '0000-00-00', '0000-00-00'),
(43, 12, 'Attorneys', 'subcategory/Attorneys.jpg', 1, '0000-00-00', '0000-00-00'),
(44, 0, 'Early Childhood Education ', 'subcategory/Early Childhood Education.jpg', 1, '0000-00-00', '0000-00-00'),
(45, 8, 'Early Childhood Education ', 'category/Early Childhood Education.jpg', 1, '0000-00-00', '0000-00-00'),
(46, 13, 'Barber & Beauty Salons ', 'category/Barber & Beauty Salons.jpg', 1, '0000-00-00', '0000-00-00'),
(47, 4, 'Audiologist', 'subcategory/Audiologist.jpg', 1, '0000-00-00', '0000-00-00'),
(49, 4, 'Animal Hospital ', 'subcategory/Animal Hospital.jpg', 1, '0000-00-00', '0000-00-00'),
(52, 6, ' Computer Programming & Support ', 'subcategory/download (22).jpg', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tags` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `tags`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fashion', '2024-06-06 06:40:49', '0000-00-00 00:00:00'),
(2, 1, 'Health', '2024-06-06 06:40:49', '0000-00-00 00:00:00'),
(3, 1, 'Travel', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(4, 8, 'demo', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(5, 8, 'bloh', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(6, 8, 'dsfsdf', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(7, 8, 'sf', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(8, 8, 'sdfsdfs', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(9, 8, 'df', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(10, 8, 'sdf', '2024-06-07 05:56:22', '0000-00-00 00:00:00'),
(11, 9, 'The world is a book and those who do not travel read only one page.', '2024-06-12 07:16:39', '0000-00-00 00:00:00'),
(12, 9, 'my travel blog', '2024-06-12 07:16:39', '0000-00-00 00:00:00'),
(13, 9, 'Love Travelling.', '2024-06-12 07:16:39', '0000-00-00 00:00:00'),
(14, 10, 'jaipur', '2024-06-12 07:26:20', '0000-00-00 00:00:00'),
(15, 10, 'travel', '2024-06-12 07:26:20', '0000-00-00 00:00:00'),
(16, 10, 'capital of rajasthan', '2024-06-12 07:26:20', '0000-00-00 00:00:00'),
(17, 11, 'de', '2024-06-14 07:23:22', '0000-00-00 00:00:00'),
(18, 11, 'g', '2024-06-14 07:23:22', '0000-00-00 00:00:00'),
(19, 11, 'f', '2024-06-14 07:23:22', '0000-00-00 00:00:00'),
(20, 11, 's', '2024-06-14 07:23:22', '0000-00-00 00:00:00'),
(21, 12, 'health', '2024-06-14 07:33:38', '0000-00-00 00:00:00'),
(22, 12, 'medicine', '2024-06-14 07:33:38', '0000-00-00 00:00:00'),
(23, 12, 'protect us all', '2024-06-14 07:33:38', '0000-00-00 00:00:00'),
(24, 12, 'hospital', '2024-06-14 07:33:38', '0000-00-00 00:00:00'),
(25, 13, 'food', '2024-06-18 07:14:21', '0000-00-00 00:00:00'),
(26, 14, 'food', '2024-06-19 07:08:35', '0000-00-00 00:00:00'),
(27, 15, 'food', '2024-06-19 07:11:47', '0000-00-00 00:00:00'),
(28, 16, 'food', '2024-06-19 07:13:56', '0000-00-00 00:00:00'),
(29, 17, 'food', '2024-06-19 07:14:24', '0000-00-00 00:00:00'),
(30, 18, 'sfsdfsd', '2024-06-19 07:16:53', '0000-00-00 00:00:00'),
(31, 19, 'travel', '2024-06-21 07:38:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `occupation` int(11) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remark` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `mobile_no`, `dob`, `occupation`, `address`, `status`, `remark`, `image`, `updated_at`, `created_at`) VALUES
(1, 'Aurn@Verfa', 'arun@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, 1, 0, NULL, '2024-06-07', 0),
(2, 'Aurn@Verfa', 'arun@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, 1, 0, NULL, '2024-06-07', 0),
(3, 'Khushbu Patidar', 'kpatidar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1, 0, NULL, '2024-06-08', 0),
(4, 'Preeti Gorasiya', 'preeti@gmail.con', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1, 0, NULL, '2024-06-18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
