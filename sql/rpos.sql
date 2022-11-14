-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 06:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `category_name`, `type`, `s`, `company_id`) VALUES
(1, 'Breakfast', 'No S/N.', 1, 1),
(2, 'Snacks', 'No S/N.', 1, 1),
(3, 'Salads', 'No S/N.', 1, 1),
(4, 'Chicken', 'No S/N.', 1, 1),
(5, 'Chicken Kienyeji', 'No S/N.', 1, 1),
(6, 'Mbuzi', 'No S/N.', 1, 1),
(7, 'Starter', 'No S/N.', 1, 1),
(8, 'Soup', 'No S/N.', 1, 1),
(9, 'Beef', 'No S/N.', 1, 1),
(10, 'Lamb Chops', 'No S/N.', 1, 1),
(11, 'Burgers', 'No S/N.', 1, 1),
(12, 'Biryani', 'No S/N.', 1, 1),
(13, 'Beef Fillet Steak(Tenderloin 200g)', 'No S/N.', 1, 1),
(14, 'Waqanda special', 'No S/N.', 1, 1),
(15, 'Sides', 'No S/N.', 1, 1),
(16, 'Sea food', 'No S/N.', 1, 1),
(17, 'B.B.Q', 'No S/N.', 1, 1),
(18, 'Pastas', 'No S/N.', 1, 1),
(19, 'Pizza', 'No S/N.', 1, 1),
(20, 'Mineral Water', 'No S/N.', 1, 1),
(21, 'Soft Drinks', 'No S/N.', 1, 1),
(22, 'Hot Beverages', 'No S/N.', 1, 1),
(23, 'Energy Drink', 'No S/N.', 1, 1),
(24, 'Juices', 'No S/N.', 1, 1),
(25, 'Milkshakes', 'No S/N.', 1, 1),
(26, 'Beer', 'No S/N.', 1, 1),
(27, 'Apperitiffs', 'No S/N.', 1, 1),
(28, 'Cocktails', 'No S/N.', 1, 1),
(29, 'Cognac', 'No S/N.', 1, 1),
(30, 'Gin', 'No S/N.', 1, 1),
(31, 'Single Malt', 'No S/N.', 1, 1),
(32, 'Cigarettes', 'No S/N.', 1, 1),
(33, 'Champagne & Sparkling Wine', 'No S/N.', 1, 1),
(34, 'Ciders & Cookers', 'No S/N.', 1, 1),
(35, 'Rum', 'No S/N.', 1, 1),
(36, 'Tequila', 'No S/N.', 1, 1),
(37, 'Vodka', 'No S/N.', 1, 1),
(38, 'White Wine', 'No S/N.', 1, 1),
(39, 'Whisky', 'No S/N.', 1, 1),
(40, 'Red Wine', 'No S/N.', 1, 1),
(41, 'Rose\' & De Noir', 'No S/N.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients_table`
--

CREATE TABLE `clients_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `s` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients_table`
--

INSERT INTO `clients_table` (`id`, `name`, `phone`, `email`, `user_id`, `company_id`, `created_at`, `s`) VALUES
(1, 'WALK-IN', '-', '-', 0, 0, '2022-11-12 16:48:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_table`
--

CREATE TABLE `company_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `phone_sms` varchar(30) NOT NULL DEFAULT '-',
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `btype` varchar(64) NOT NULL DEFAULT '-',
  `s` int(11) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `final_date` date DEFAULT NULL,
  `payment_account` varchar(30) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `mpesa_no` varchar(64) DEFAULT '-',
  `send_sms` int(11) NOT NULL DEFAULT 0,
  `sms_time` varchar(10) NOT NULL DEFAULT 'evening',
  `sender_id` varchar(11) DEFAULT NULL,
  `sender_client_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `main_branch` int(11) NOT NULL DEFAULT 0,
  `package` int(11) NOT NULL DEFAULT 1500
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_table`
--

INSERT INTO `company_table` (`id`, `name`, `phone`, `phone_sms`, `email`, `location`, `city`, `account`, `btype`, `s`, `timestamp`, `final_date`, `payment_account`, `amount`, `mpesa_no`, `send_sms`, `sms_time`, `sender_id`, `sender_client_id`, `status`, `main_branch`, `package`) VALUES
(1, 'WAQANDA', '0726333720', '0726333720', 'accounts@waqanda.co.ke', 'Changamwe', 'Mombasa', 'waqanda', 'bar', 1, '2020-08-04 06:25:59', '2022-06-30', 'waqanda', 0, 'Till number no: 277777', 1, 'evening', '-', 10, 1, 0, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tables`
--

CREATE TABLE `customer_tables` (
  `id` int(11) NOT NULL,
  `table_number` varchar(255) NOT NULL,
  `served_by` varchar(255) NOT NULL DEFAULT '-',
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_tables`
--

INSERT INTO `customer_tables` (`id`, `table_number`, `served_by`, `active`) VALUES
(1, '001', '6', 1),
(2, '002', '6', 1),
(3, '003', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_table`
--

CREATE TABLE `general_table` (
  `details` varchar(100) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_phone` varchar(100) DEFAULT NULL,
  `respective_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_profit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `comments` varchar(255) NOT NULL DEFAULT '-',
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `paid` tinyint(4) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_table`
--

INSERT INTO `general_table` (`details`, `mode`, `description`, `description_phone`, `respective_id`, `date`, `total_amount`, `total_profit`, `comments`, `company_id`, `user_id`, `s`, `order_status`, `paid`, `timestamp`) VALUES
('RCPT-20220502160919', 'receipt', '-', '-', 0, '2022-05-02', '50.00', '50.00', '-', 1, 1, 1, 0, 0, '2022-05-02 10:09:19'),
('RCPT-20220502161655', 'receipt', '-', '-', 0, '2022-05-02', '410.00', '410.00', '-', 1, 8, 1, 0, 0, '2022-05-02 10:16:55'),
('RCPT-20220502171915', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 6, 1, 0, 0, '2022-05-02 11:19:15'),
('RCPT-20220502171932', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 6, 1, 0, 0, '2022-05-02 11:19:33'),
('RCPT-20220502171949', 'receipt', '-', '-', 0, '2022-05-02', '300.00', '300.00', '-', 1, 6, 1, 0, 0, '2022-05-02 11:19:49'),
('RCPT-20220502172618', 'receipt', '-', '-', 0, '2022-05-02', '50.00', '50.00', '-', 1, 1, 1, 0, 0, '2022-05-02 11:26:18'),
('RCPT-20220502172948', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 8, 1, 0, 0, '2022-05-02 11:29:49'),
('RCPT-20220502173014', 'receipt', '-', '-', 0, '2022-05-02', '450.00', '450.00', '-', 1, 8, 1, 0, 0, '2022-05-02 11:30:14'),
('RCPT-20220502173125', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 11:31:26'),
('RCPT-20220502173152', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 8, 1, 0, 0, '2022-05-02 11:31:52'),
('RCPT-20220502173217', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 11:32:17'),
('RCPT-20220502173328', 'receipt', '-', '-', 0, '2022-05-02', '70.00', '70.00', '-', 1, 8, 1, 0, 0, '2022-05-02 11:33:28'),
('RCPT-20220502174133', 'receipt', '-', '-', 0, '2022-05-02', '220.00', '220.00', '-', 1, 5, 1, 0, 0, '2022-05-02 11:41:34'),
('RCPT-20220502180812', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 12:08:12'),
('RCPT-20220502180831', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 12:08:31'),
('RCPT-20220502180901', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 12:09:01'),
('RCPT-20220502180940', 'receipt', '-', '-', 0, '2022-05-02', '300.00', '300.00', '-', 1, 8, 1, 0, 0, '2022-05-02 12:09:40'),
('RCPT-20220502181035', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 12:10:35'),
('RCPT-20220503142110', 'receipt', '-', '-', 0, '2022-05-03', '220.00', '220.00', '-', 1, 6, 1, 0, 0, '2022-05-03 08:21:10'),
('RCPT-20220505160739', 'receipt', '-', '-', 0, '2022-05-05', '0.00', '0.00', '-', 1, 6, 1, 0, 0, '2022-05-05 10:07:39'),
('RCPT-20220505160908', 'receipt', '-', '-', 0, '2022-05-05', '410.00', '410.00', '-', 1, 6, 1, 0, 0, '2022-05-05 10:09:08'),
('RCPT-20220509141627', 'receipt', '-', '-', 0, '2022-05-09', '900.00', '900.00', '-', 1, 6, 1, 0, 0, '2022-05-09 08:16:27'),
('RCPT-20220502160919', 'receipt', '-', '-', 0, '2022-05-02', '50.00', '50.00', '-', 1, 1, 1, 0, 0, '2022-05-02 13:09:19'),
('RCPT-20220502161655', 'receipt', '-', '-', 0, '2022-05-02', '410.00', '410.00', '-', 1, 8, 1, 0, 0, '2022-05-02 13:16:55'),
('RCPT-20220502171915', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 6, 1, 0, 0, '2022-05-02 14:19:15'),
('RCPT-20220502171932', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 6, 1, 0, 0, '2022-05-02 14:19:33'),
('RCPT-20220502171949', 'receipt', '-', '-', 0, '2022-05-02', '300.00', '300.00', '-', 1, 6, 1, 0, 0, '2022-05-02 14:19:49'),
('RCPT-20220502172618', 'receipt', '-', '-', 0, '2022-05-02', '50.00', '50.00', '-', 1, 1, 1, 0, 0, '2022-05-02 14:26:18'),
('RCPT-20220502172948', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 8, 1, 0, 0, '2022-05-02 14:29:49'),
('RCPT-20220502173014', 'receipt', '-', '-', 0, '2022-05-02', '450.00', '450.00', '-', 1, 8, 1, 0, 0, '2022-05-02 14:30:14'),
('RCPT-20220502173125', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 14:31:26'),
('RCPT-20220502173152', 'receipt', '-', '-', 0, '2022-05-02', '0.00', '0.00', '-', 1, 8, 1, 0, 0, '2022-05-02 14:31:52'),
('RCPT-20220502173217', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 14:32:17'),
('RCPT-20220502173328', 'receipt', '-', '-', 0, '2022-05-02', '70.00', '70.00', '-', 1, 8, 1, 0, 0, '2022-05-02 14:33:28'),
('RCPT-20220502174133', 'receipt', '-', '-', 0, '2022-05-02', '220.00', '220.00', '-', 1, 5, 1, 0, 0, '2022-05-02 14:41:34'),
('RCPT-20220502180812', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 15:08:12'),
('RCPT-20220502180831', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 15:08:31'),
('RCPT-20220502180901', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 15:09:01'),
('RCPT-20220502180940', 'receipt', '-', '-', 0, '2022-05-02', '300.00', '300.00', '-', 1, 8, 1, 0, 0, '2022-05-02 15:09:40'),
('RCPT-20220502181035', 'receipt', '-', '-', 0, '2022-05-02', '150.00', '150.00', '-', 1, 8, 1, 0, 0, '2022-05-02 15:10:35'),
('RCPT-20220503142110', 'receipt', '-', '-', 0, '2022-05-03', '220.00', '220.00', '-', 1, 6, 1, 0, 0, '2022-05-03 11:21:10'),
('RCPT-20220505160739', 'receipt', '-', '-', 0, '2022-05-05', '0.00', '0.00', '-', 1, 6, 1, 0, 0, '2022-05-05 13:07:39'),
('RCPT-20220505160908', 'receipt', '-', '-', 0, '2022-05-05', '410.00', '410.00', '-', 1, 6, 1, 0, 0, '2022-05-05 13:09:08'),
('RCPT-20220509141627', 'receipt', '-', '-', 0, '2022-05-09', '900.00', '900.00', '-', 1, 6, 1, 0, 0, '2022-05-09 11:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `logs_table`
--

CREATE TABLE `logs_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs_table`
--

INSERT INTO `logs_table` (`id`, `user_id`, `company_id`, `description`, `created_at`) VALUES
(1, 1, 1, 'Logged in Successfully', '2022-04-30 12:59:04'),
(2, 1, 1, 'Logged in Successfully', '2022-04-30 13:09:19'),
(3, 2, 1, 'Logged in Successfully', '2022-04-30 13:10:00'),
(4, 1, 1, 'Logged in Successfully', '2022-04-30 13:11:55'),
(5, 2, 1, 'Logged in Successfully', '2022-04-30 13:32:14'),
(6, 2, 1, 'Logged in Successfully', '2022-04-30 15:41:23'),
(7, 2, 1, 'Logged in Successfully', '2022-04-30 15:41:49'),
(8, 2, 1, 'Logged in Successfully', '2022-05-01 13:19:50'),
(9, 2, 1, 'Logged in Successfully', '2022-05-01 13:20:01'),
(10, 2, 1, 'Logged in Successfully', '2022-05-01 13:20:07'),
(11, 1, 1, 'Logged in Successfully', '2022-05-01 13:20:14'),
(12, 1, 1, 'Logged in Successfully', '2022-05-01 20:41:59'),
(13, 1, 1, 'Logged in Successfully', '2022-05-02 03:18:07'),
(14, 1, 1, 'Logged in Successfully', '2022-05-02 12:56:54'),
(15, 1, 1, 'Logged in Successfully', '2022-05-02 13:03:20'),
(16, 8, 1, 'Logged in Successfully', '2022-05-02 13:15:27'),
(17, 1, 1, 'Logged in Successfully', '2022-05-02 13:18:27'),
(18, 1, 1, 'Logged in Successfully', '2022-05-02 13:19:16'),
(19, 8, 1, 'Logged in Successfully', '2022-05-02 13:19:43'),
(20, 1, 1, 'Logged in Successfully', '2022-05-02 13:38:03'),
(21, 1, 1, 'Logged in Successfully', '2022-05-02 13:44:48'),
(22, 3, 1, 'Logged in Successfully', '2022-05-02 14:13:08'),
(23, 3, 1, 'Logged in Successfully', '2022-05-02 14:13:44'),
(24, 6, 1, 'Logged in Successfully', '2022-05-02 14:17:37'),
(25, 1, 1, 'Logged in Successfully', '2022-05-02 14:26:09'),
(26, 8, 1, 'Logged in Successfully', '2022-05-02 14:27:05'),
(27, 5, 1, 'Logged in Successfully', '2022-05-02 14:39:03'),
(28, 8, 1, 'Logged in Successfully', '2022-05-02 15:06:41'),
(29, 6, 1, 'Logged in Successfully', '2022-05-03 11:20:25'),
(30, 6, 1, 'Logged in Successfully', '2022-05-03 11:33:32'),
(31, 6, 1, 'Logged in Successfully', '2022-05-03 11:33:49'),
(32, 1, 1, 'Logged in Successfully', '2022-05-05 12:42:22'),
(33, 1, 1, 'Logged in Successfully', '2022-05-05 13:02:57'),
(34, 6, 1, 'Logged in Successfully', '2022-05-05 13:03:54'),
(35, 6, 1, 'Logged in Successfully', '2022-05-05 13:06:32'),
(36, 6, 1, 'Logged in Successfully', '2022-05-05 13:07:24'),
(37, 1, 1, 'Logged in Successfully', '2022-05-05 13:09:57'),
(38, 6, 1, 'Logged in Successfully', '2022-05-09 11:15:51'),
(39, 1, 1, 'Logged in Successfully', '2022-05-09 11:20:01'),
(40, 1, 1, 'Logged in Successfully', '2022-05-09 11:24:46'),
(41, 4, 1, 'Logged in Successfully', '2022-10-20 09:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `mode` varchar(64) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(64) DEFAULT NULL,
  `message` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `id` int(11) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `change_remaining` decimal(10,2) DEFAULT NULL,
  `manual_receipt` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `generated_code` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`id`, `details`, `payment_date`, `payment_mode`, `transaction_id`, `amount`, `change_remaining`, `manual_receipt`, `user_id`, `s`, `timestamp`, `generated_code`) VALUES
(1, 'RCPT-20220502160919', '2022-05-02', 'Cash', '-', '50.00', '0.00', '-', 1, 1, '2022-05-02 13:09:19', NULL),
(2, 'RCPT-20220502161655', '2022-05-02', 'Cash', '-', '410.00', '0.00', '-', 8, 1, '2022-05-02 13:16:55', NULL),
(3, 'RCPT-20220502171949', '2022-05-02', 'Cash', '-', '300.00', '0.00', '-', 6, 1, '2022-05-02 14:19:49', NULL),
(4, 'RCPT-20220502172618', '2022-05-02', 'Cash', '-', '50.00', '0.00', '-', 1, 1, '2022-05-02 14:26:18', NULL),
(5, 'RCPT-20220502173014', '2022-05-02', 'Cash', '-', '450.00', '0.00', '-', 8, 1, '2022-05-02 14:30:14', NULL),
(6, 'RCPT-20220502173125', '2022-05-02', 'Cash', '-', '150.00', '0.00', '-', 8, 1, '2022-05-02 14:31:26', NULL),
(7, 'RCPT-20220502173217', '2022-05-02', 'Cash', '-', '150.00', '0.00', '-', 8, 1, '2022-05-02 14:32:17', NULL),
(8, 'RCPT-20220502173328', '2022-05-02', 'Cash', '-', '70.00', '0.00', '-', 8, 1, '2022-05-02 14:33:28', NULL),
(9, 'RCPT-20220502174133', '2022-05-02', 'Cash', '-', '220.00', '0.00', '-', 5, 1, '2022-05-02 14:41:34', NULL),
(10, 'RCPT-20220502180812', '2022-05-02', 'Cash', '-', '150.00', '0.00', '-', 8, 1, '2022-05-02 15:08:12', NULL),
(11, 'RCPT-20220502180831', '2022-05-02', 'Cash', '-', '150.00', '0.00', '-', 8, 1, '2022-05-02 15:08:31', NULL),
(12, 'RCPT-20220502180901', '2022-05-02', 'Cash', '-', '150.00', '0.00', '-', 8, 1, '2022-05-02 15:09:01', NULL),
(13, 'RCPT-20220502180940', '2022-05-02', 'Cash', '-', '300.00', '0.00', '-', 8, 1, '2022-05-02 15:09:40', NULL),
(14, 'RCPT-20220502181035', '2022-05-02', 'Cash', '-', '150.00', '0.00', '-', 8, 1, '2022-05-02 15:10:35', NULL),
(15, 'RCPT-20220503142110', '2022-05-03', 'Cash', '-', '220.00', '0.00', '-', 6, 1, '2022-05-03 11:21:10', NULL),
(16, 'RCPT-20220505160908', '2022-05-05', 'Cash', '-', '410.00', '0.00', '-', 6, 1, '2022-05-05 13:09:08', NULL),
(17, 'RCPT-20220509141627', '2022-05-09', 'Cash', '-', '900.00', '0.00', '-', 6, 1, '2022-05-09 11:16:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `no_units` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `online_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `photo1` varchar(255) NOT NULL DEFAULT '-',
  `photo2` varchar(255) NOT NULL DEFAULT '-',
  `photo3` varchar(255) NOT NULL DEFAULT '-',
  `company_id` int(11) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`id`, `product_name`, `description`, `category_id`, `no_units`, `reorder`, `online_price`, `photo1`, `photo2`, `photo3`, `company_id`, `s`, `user_id`) VALUES
(1, 'Toast Bread(2)', '-', 1, 1, 0, '50.00', 'toast_bread.jpg', '-', '-', 1, 1, 1),
(2, 'Fried Eggs', '-', 1, 1, 0, '70.00', 'fried_egss.jpg', '-', '-', 1, 1, 1),
(3, 'Spanish Ommelete (2 eggs)', '-', 1, 1, 0, '150.00', 'Spanish_Ommelete.jpg', '-', '-', 1, 1, 1),
(4, '(Chopped onions, tomatoes and green pepper)', '-', 1, 1, 0, '0.00', 'Chopped_onions_tomatoes_green_pepper.jpg', '-', '-', 1, 0, 1),
(5, 'Scrambled Eggs (2)', '-', 1, 1, 0, '100.00', 'Scrambled_Eggs.jpg', '-', '-', 1, 1, 1),
(6, 'Waqanda Pancakes(3)', '-', 1, 1, 0, '200.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(7, 'Beef Sausages', '-', 1, 1, 0, '150.00', 'sausage.jpg', '-', '-', 1, 1, 1),
(8, 'Waqanda breakfast', '-', 1, 1, 0, '600.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(9, 'Mahamri (3 large pcs)', '-', 2, 1, 0, '50.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(10, 'White Kebabs (1pc)', '-', 2, 1, 0, '70.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(11, 'Maru Bhajia (1 plate)', '-', 2, 1, 0, '150.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(12, 'Daal Bhajia (1 plate)', '-', 2, 1, 0, '150.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(13, 'Viazi Karai (1pc)', '-', 2, 1, 0, '150.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(14, 'Vegetable samosa (3pcs)', '-', 2, 1, 0, '200.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(15, 'Beef Samosa (3pcs)', '-', 2, 1, 0, '250.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(16, 'Coleslaw (Cabbage And Mayonnaise)', 'Cabbage and Mayonnaise', 3, 1, 0, '250.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(17, 'Mixed Vegetable Salad', '-', 3, 1, 0, '300.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(18, 'Chicken Vegetable Salad', '-', 3, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 0, 1),
(19, 'Chicken Salad', '-', 3, 1, 0, '400.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(20, 'Dry/Wet Kienyeji + Sides -Half', '-', 5, 1, 0, '1000.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(21, 'Dry/Wet Kienyeji + Sides - Full', '-', 5, 1, 0, '1800.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(22, 'Boil Kienyeji 1/4', '-', 5, 1, 0, '900.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(23, 'Boil Kienyeji Full', '-', 5, 1, 0, '1700.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(24, 'Choma - 1/2kg', '-', 6, 1, 0, '900.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(25, 'Choma - 1Kg + Ugali', '-', 6, 1, 0, '1700.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(26, 'Dry/Wet Fry + Sides - Half', '-', 6, 1, 0, '900.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(27, 'Dry/Wet Fry + Sides - Full', '-', 6, 1, 0, '1600.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(28, 'Plate of Samosa (3pcs)', '-', 7, 1, 0, '250.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(29, 'Fried Chicken Gizzards', '-', 7, 1, 0, '400.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(30, 'Fish fingers(Fried in special sauce)', '-', 7, 1, 0, '500.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(31, 'Chicken Wings 250g (Deep fried in our sauce)', '-', 7, 1, 0, '600.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(32, 'Vegetable soup(Mixed vegetable)', '-', 8, 1, 0, '200.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(33, 'Chicken corn soup', '-', 8, 1, 0, '250.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(34, 'Mushroom soup', '-', 8, 1, 0, '300.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(35, 'Bone soup', '-', 8, 1, 0, '350.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(36, 'Choma - 1/2', '-', 9, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(37, 'Choma - 1Kg', '-', 9, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(38, 'Wet fry - 1/4', '-', 9, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(39, 'Wet fry - 1/2 Kg', '-', 9, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(40, 'Wet fry - 1 Kg', '-', 9, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(41, 'Tandoori - 1/2 Kg', '-', 10, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(42, 'Tandoori - 1 Kg', '-', 10, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(43, 'Grilled - 1/2 Kg', '-', 10, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(44, 'Grilled - 1 Kg', '-', 10, 1, 0, '1000.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(45, 'Plate of Kebab (250g) (With tamarind sauce)', '-', 10, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(46, 'Deep fry - 1/4', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(47, 'Deep fry - Half', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(48, 'Deep fry - Full', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(49, 'Wet fry - 1/4', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(50, 'Wet fry - Half', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(51, 'Wet fry - Full', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(52, 'Choma - Half', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(53, 'Choma - Full', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(54, 'Pousin - 1/4', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(55, 'Pousin - 1/2', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(56, 'Pousin - Full', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(57, 'Chooza - 1/2', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(58, 'Choza - Full', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(59, 'Tikka - Leg', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(60, 'Tikka', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(61, 'Tikka -Breast', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(62, 'Tikka - Half', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(63, 'Tikka', 'Full', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(64, 'Crumbed Chicken  - 1/4', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(65, 'Crumbed Chicken  - 1/2', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(66, 'Chicken Strips (Boneless chicken )', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(67, 'Chicken Maryland (1/4)', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(68, 'Boneless pousin', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(69, '1/2 Boneless Garlic', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(70, '1/2 Boneless pepper', '-', 4, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(71, 'Vegeterian Burger', '-', 11, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(72, 'Beef burger', '-', 11, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(73, 'Chicken burger', '-', 11, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(74, 'Fish burger', '-', 11, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(75, 'Coconut corn', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(76, 'Corn Masala', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(77, 'Egg curry', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(78, 'Vegetable', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(79, 'Beef', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(80, 'Chicken', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(81, 'Mutton', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(82, 'Fish', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(83, 'Chilli paneer Wet/Dry paneer', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(84, 'Chill Garlic paneer', '-', 12, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(85, 'Pepper steak', '-', 13, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(86, 'Mushroom steak', '-', 13, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(87, 'Steak pousin', '-', 13, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(88, 'Chilli Garlic steak', '-', 13, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(89, 'Vegetable stew', '-', 14, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(90, 'Kienyeji Full platter', '-', 14, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(91, 'Broiler Full platter', '-', 14, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(92, 'Meat platter', '-', 14, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(93, 'Chapati (2 pcs)', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(94, 'Ugali', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(95, 'Buttered Ugali', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(96, 'Mchicha plain', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(97, 'Managu plain', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(98, 'Mchicha in cream', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(99, 'Spinach in cream', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(100, 'Managu in cream', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(101, 'Tandoori (Naan)', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(102, 'Mashed potato', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(103, 'Coconut Rise', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(104, 'Plain chips', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(105, 'Peri Peri chips', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(106, 'Masala', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(107, 'Vegetable Chapati double', '-', 17, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(108, 'Paneer Chapati double', '-', 17, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(109, 'Cheese Chapati double', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(110, 'Kima Chapati double', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(111, 'Beef/Muttn Kebab', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(112, 'Chicken Chapati double', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(113, 'Beef/Mutton Kebab', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(114, 'Lamb Chop Tikka', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(115, 'Plate of Mishakaki', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(116, 'Chicken Tikka (400g)', '-', 15, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(117, 'Grilled Red Snapper Fillet', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(118, 'Crumbed Fish Fillet', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(119, 'Swahili Fish Fillet in coconut sauce', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(120, 'Deep Fried Tilapia', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(121, 'Deep Fried Tilapia', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(122, 'Fried Tilapia in coconut sauce', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(123, 'Grilled Queen Prawns (250g)', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(124, 'Grilled King Prawns (250g)', '-', 16, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(125, 'Spagheti Bolognes', '-', 18, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(126, 'Spagheti Nepolitane', '-', 18, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(127, 'Spaghet Ala Olio', '-', 18, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(128, 'Spaghet Ala Fungi', '-', 18, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(129, 'Margharita Pizza', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(130, 'Bombay Pizza', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(131, 'Mafiosi Pizza', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(132, 'Stagione Pizza', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(133, 'Spicy Tikka Pizza', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(134, 'Hawaiian Pizza', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(135, 'Mexican Pizza', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(136, 'Extras', '-', 19, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(137, 'Aquile 700Ml', '-', 20, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(138, 'Aquile 330Ml', '-', 20, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(139, 'Aquelle Sparking Water 330ML', '-', 20, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(140, 'Bitter Lemon 300Ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(141, 'Coke 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(142, 'Fanta Orange 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(143, 'Fanta Black Currant 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(144, 'Ginger Ale 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(145, 'Sprite 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(146, 'Stoney 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(147, 'Soda Water 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(148, 'Soda water 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(149, 'Tonic Water 300ml', '-', 21, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(150, 'Coffee', '-', 22, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(151, 'AFrica Tea', '-', 22, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(152, 'Tea', '-', 22, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(153, 'Hot Chocolate', '-', 22, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(154, 'Capuccino', '-', 22, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(155, 'Cafe Mocha', '-', 22, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(156, 'Coffee Latte', '-', 22, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(157, 'Vanilla', '-', 25, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(158, 'Strawberry', '-', 25, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(159, 'Chocolate', '-', 25, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(160, 'Vanilla chocolate', '-', 25, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(161, 'Balozi 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(162, 'Desperados 330ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(163, 'Guinness Can 500Ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(164, 'Guinnes Kubwa 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(165, 'Guinness Smooth 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(166, 'Heineken 330ml', '-', 9, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(167, 'Hunter Cider 330ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(168, 'Pilsner', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(169, 'Savanna Dry 330ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(170, 'Smirnoff Guarana Black 330ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(171, 'Smirnoff Ice Black 330ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(172, 'Snapp Apple 300ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(173, 'Tusker Lager 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(174, 'Tusker Lager Can 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(175, 'Tusker Lite 330ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(176, 'Tusker Lit Cane 330ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(177, 'Tusker Malt 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(178, 'Wite cap Lager 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(179, 'Hite cap lager Can 500ml', '-', 26, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(180, 'Martini Ianco 750ml', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(181, 'Martini Bianco 750ml', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(182, 'Martini Bianco  Dry 750ml', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(183, 'Martini Bianco Extra dry 750ml', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(184, 'Pimms 1 750ml', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(185, 'Pimms 1 750ml', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(186, 'Campari 750ml', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(187, 'Campari', '-', 27, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(188, 'Adio Motherfucker', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(189, 'Expresso Martini', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(190, 'Dawa', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(191, 'Magaritta', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(192, 'Johnmy Ginger', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(193, 'Apple Marini', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(194, 'Sex on the Beach', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(195, 'Mojito', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(196, 'Whisky Sour', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(197, 'Bloody Mary', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(198, 'Fuck me upside down', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(199, 'Old fashion', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(200, 'Manthattan', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(201, 'Daquiri', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(202, 'Straw Berry Kiss', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(203, 'Irish Coffee', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(204, 'Blow job', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(205, 'Flaming Lamborgin', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(206, 'Mint Julep', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(207, 'Pinacolada', '-', 28, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(208, 'Hennessy V.S.O.P 700ml', '-', 29, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(209, 'Hennesy V.S.O.P 750ml', '-', 29, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(210, 'Hennessy VS 700ml', '-', 29, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(211, 'Martel V.S 700ml', '-', 29, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(212, 'Remy Martin V.S.O.P 750ml', '-', 29, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(213, 'Gilbey\'s Gin 750ml', '-', 30, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(214, 'Gordon\'s Gin 750ml', '-', 30, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(215, 'Beefeeater 750ml', '-', 30, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(216, 'Beefeater Pink 750ml', '-', 30, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(217, 'Tanqueray 750ml', '-', 30, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(218, 'Tombay Sapphire', '-', 30, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(219, 'Hendricks', '-', 30, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(220, 'Belaire Rare Luxe', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(221, 'Belaire Rose', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(222, 'Blu Prosecco', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(223, 'Moet & Chandon Brut', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(224, 'Hunters Dry', '-', 34, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(225, 'Glenlivet 12yrs 750ml', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(226, 'Glenfiddich 12yrs 750ml', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(227, 'Glenlivet 18yrs 700ml', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(228, 'Glenlivet 15yrs 750ml', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(229, 'Glenfiddich 15yrs 750ml', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(230, 'Glenmorangif the original 750ml', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(231, 'Jacob\'s creek crips rose', '-', 41, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(232, 'Sportsman', '-', 32, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(233, 'Dunhill by Embassy', '-', 32, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(234, 'Dunhill Double', '-', 32, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(235, 'Dunhill Switch', '-', 32, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(236, 'Belaire Rare Luxe', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(237, 'Belaire Rose', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(238, 'Blu Prosecco', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(239, 'Moet & Chandon brut', '-', 33, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(240, 'Hunters Dry', '-', 34, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(241, 'Barcardi Black 750ml', '-', 35, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(242, 'Barcada oakheat 700ml', '-', 35, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(243, 'Captain Morgan Spiced', '-', 35, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(244, 'Gold 750ml', '-', 35, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(245, 'Myer\'s Rum 750ml', '-', 35, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(246, 'GlenLivet 12Yrs 750ml (Tot)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(247, 'GlenLivet 12Yrs 750ml  (bottle)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(248, 'GlenLivet 15Yrs 700ml (Bottle)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(249, 'GlenLivet 15Yrs 700ml (Tot)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(250, 'Glenlivet 12yrs 750ml (Tot)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(251, 'Glenfiddich 12yrs 750ml(Bottle)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(252, 'Glenmorangie the original 750ml (Tot)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(253, 'Glenmorangie the original 750ml (Bottle)', '-', 31, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(254, 'Camino Gold 750ml Tot', '-', 36, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(255, 'Camino Gold 750ml Bottle', '-', 36, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(256, 'Camino Silver  750ml Tot', '-', 36, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(257, 'Camino Silver 750ml Bottle', '-', 36, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(258, 'Jose Quervo Gold 750ml Tot', '-', 36, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(259, 'Jose Quervo Gold 750ml Bottle', '-', 36, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(260, 'Olmeca Dark Chocolate', '-', 36, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(261, 'Absolut Vodka 750ml  Tot', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(262, 'Absolut Vodka 750ml  Bottle', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(263, 'Ciroc Vodka 750ml Tot', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(264, 'Ciroc Vodka 750ml Bottle', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(265, 'Eristoff Vodka 750ml Tot', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(266, 'Eristoff Vodka 750ml Bottle', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(267, 'Grey Goose 750ml Tot', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(268, 'Grey Goose 750ml Bottle', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(269, 'Ketel One Vodka 750ml Tot', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(270, 'Ketel One Vodka 750ml  Bottle', 'Cabbage and Mayonnaise', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(271, 'Smirmoff Vodka Red 750ml Tot', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(272, 'Smirmoff Vodka Red 750ml Bottle', '-', 37, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(273, '4th Street Sweet White Glass', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(274, '4th Street Sweet White Battle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(275, 'Culemborg Cape White - Glass', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(276, 'Drostdy Hof G Cru Glass', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(277, 'Drostdy Hof G Cru Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(278, 'Four Cousins White  Glass', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(279, 'Four Cousins White  Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(280, 'Frontera Chardonnay  Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(281, 'Gato Negro San Pedro - Glass', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(282, 'Gato Negro San Pedro Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(283, 'Jacob\'s Creek Chardonnay Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(284, 'Robertson White Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(285, 'Saint Anna Natural Sweet Glass', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(286, 'Saint Anna Natural Sweet Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(287, 'Ballntines 750ml Tot', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(288, 'Versus Sweet White Bottle', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(289, 'Versus Sweet White Glass', '-', 38, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(290, 'Ballntines 750ml Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(291, 'Best Whiskey 750ml Tot', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(292, 'Best Whiskey 750ml Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(293, 'Black and white 750ml Tot', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(294, 'Black and white 750ml Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(295, 'Bulleit Bourbon Tot', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(296, 'Bulleit Bourbon Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(297, 'Chivas Regal 12yrs 750ml TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(298, 'Chivas Regal 12yrs 750ml Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(299, 'Famous Grouse 100ml TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(300, 'Famous Grouse 100ml Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(301, 'Famous Grouse 750ml TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(302, 'Famous Grouse 750ml Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(303, 'Grants Family Owned 750ml TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(304, 'Grants Family Owned 750ML -  Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(305, 'J & B RARE WHisky 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(306, 'J & B RARE WHisky 750ml - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(307, 'Gentleman Jack 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(308, 'Gentleman Jack 750ml - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(309, 'Jack Daniels Honey - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(310, 'Jack Daniels Honey - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(311, 'Jack Daniels 700ml -TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(312, 'Jack Daniels 700ml Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(313, 'Jameson Irish 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(314, 'Jameson Irish 750ml - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(315, 'Jameson Black Barrel 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(316, 'Jameson Black Barrel 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(317, 'Jameson Black Barrel 750ml  - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(318, 'Johnnie Walker Black Label 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(319, 'Johnnie Walker Black Label 750ml - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(320, 'Johnnie Walker Double Black 100ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(321, 'Johnnie Walker Double Black 100ml - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(322, 'Johnnie Walker Platinum - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(323, 'Johnnie Walker Platinum - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(324, 'Johnnie Walked Red 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(325, 'Johnnie Walked Red - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(326, 'Singleton Dufftown 12yrs  - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(327, 'Singleton Dufftown - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(328, 'Singleton Sunray - TOT', 'Singleton Sunray  - Bottle', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(329, 'Singleton Sunray - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(330, 'Singleton Tailfire - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(331, 'Singleton Tailfire  -Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(332, 'Southern Comfort 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(333, 'Southern Comfort  750ml - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(334, 'VAT 36 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(335, 'VAT 36 750ml -Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(336, 'william lawsons 750ml - TOT', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(337, 'William lawsons 750ml - Bottle', '-', 39, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(338, '4TH STREET RED - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(339, '4TH STREET RED - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(340, '4TH STREET RED 5LTR - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(341, '4TH STREET RED 5LTR  - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(342, 'CULEMBORG CAPE RED - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(343, '4TH STREET RED 5LTR - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(344, 'CELLAR CASK RED - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(345, 'DROSTDY HOF CLARET - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(346, 'DROSTDY HOF CLARET - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(347, 'FOUR COUSINS RED - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(348, 'FOUR COUSINS RED - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(349, 'FRONTERA CABERNET SAUVIGNON - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(350, 'GATO NEGRO RED -GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(351, 'GATO NEGRO RED  - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(352, 'GATO NEGRO SAN PEDRO - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(353, 'GATO NEGRO SAN PEDRO - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(354, 'ROBERTSON WINERY NATURAL - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(355, 'SWEET RED - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(356, 'SAINT CELINE SWEET RED - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(357, 'SAINT CELINE SWEET RED - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(358, 'VERSUS SWEET RED - GLASS', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(359, 'VERSUS SWEET RED - BOTTLE', '-', 40, 1, 0, '0.00', 'no-image.jpg', '-', '-', 1, 1, 1),
(360, 'Beef Sausages', '-', 1, 1, 0, '150.00', 'no-image.jpg', '-', '-', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases_table`
--

CREATE TABLE `purchases_table` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `purchase_date` date NOT NULL,
  `qty` double NOT NULL,
  `bp` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `sp` decimal(10,2) NOT NULL,
  `rp` decimal(10,2) NOT NULL,
  `serial_no` varchar(100) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases_table`
--

INSERT INTO `purchases_table` (`id`, `product_id`, `supplier_id`, `invoice_no`, `purchase_date`, `qty`, `bp`, `total`, `sp`, `rp`, `serial_no`, `s`, `user_id`, `company_id`, `sold`, `created_at`) VALUES
(1, '50', 'onshelf', 'onshelf-1', '2022-05-01', 1, '3500.00', '3500.00', '4000.00', '5000.00', '', 1, 1, 1, 1, '2022-05-01 15:03:34'),
(2, '161', 'onshelf', 'onshelf-1', '2022-05-01', 1, '2500.00', '2500.00', '3000.00', '4500.00', '', 1, 1, 1, 1, '2022-05-01 15:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_table`
--

CREATE TABLE `quotation_table` (
  `id` int(11) NOT NULL,
  `details` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `s` tinyint(4) NOT NULL DEFAULT 1,
  `company_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `returned_table`
--

CREATE TABLE `returned_table` (
  `id` int(11) NOT NULL,
  `details` varchar(64) NOT NULL,
  `product_id` int(11) NOT NULL,
  `serial_no` varchar(30) NOT NULL DEFAULT '-',
  `qty` decimal(10,2) NOT NULL,
  `given_back` tinyint(4) NOT NULL DEFAULT 1,
  `s` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_table`
--

CREATE TABLE `sales_table` (
  `id` int(11) NOT NULL,
  `details` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `serial_no` varchar(100) NOT NULL,
  `qty` double NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1,
  `company_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_table`
--

INSERT INTO `sales_table` (`id`, `details`, `product_id`, `serial_no`, `qty`, `unit_price`, `total`, `profit`, `s`, `company_id`, `timestamp`) VALUES
(1, 'RCPT-20220502160919', 9, '-', 1, '50.00', '50.00', '50.00', 1, 1, '2022-05-02 13:09:19'),
(2, 'RCPT-20220502161655', 11, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 13:16:55'),
(3, 'RCPT-20220502161655', 9, '-', 1, '50.00', '50.00', '50.00', 1, 1, '2022-05-02 13:16:55'),
(4, 'RCPT-20220502161655', 10, '-', 3, '70.00', '210.00', '210.00', 1, 1, '2022-05-02 13:16:55'),
(5, 'RCPT-20220502171915', 174, '-', 2, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:19:15'),
(6, 'RCPT-20220502171915', 175, '-', 2, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:19:15'),
(7, 'RCPT-20220502171915', 183, '-', 1, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:19:15'),
(8, 'RCPT-20220502171932', 174, '-', 2, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:19:32'),
(9, 'RCPT-20220502171932', 175, '-', 2, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:19:32'),
(10, 'RCPT-20220502171932', 183, '-', 1, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:19:33'),
(11, 'RCPT-20220502171949', 12, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 14:19:49'),
(12, 'RCPT-20220502171949', 15, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 14:19:49'),
(13, 'RCPT-20220502172618', 9, '-', 1, '50.00', '50.00', '50.00', 1, 1, '2022-05-02 14:26:18'),
(14, 'RCPT-20220502172948', 175, '-', 1, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:29:48'),
(15, 'RCPT-20220502172948', 178, '-', 4, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:29:49'),
(16, 'RCPT-20220502173014', 12, '-', 3, '150.00', '450.00', '450.00', 1, 1, '2022-05-02 14:30:14'),
(17, 'RCPT-20220502173125', 9, '-', 3, '50.00', '150.00', '150.00', 1, 1, '2022-05-02 14:31:25'),
(18, 'RCPT-20220502173152', 16, '-', 1, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:31:52'),
(19, 'RCPT-20220502173217', 12, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 14:32:17'),
(20, 'RCPT-20220502173328', 10, '-', 1, '70.00', '70.00', '70.00', 1, 1, '2022-05-02 14:33:28'),
(21, 'RCPT-20220502174133', 10, '-', 1, '70.00', '70.00', '70.00', 1, 1, '2022-05-02 14:41:33'),
(22, 'RCPT-20220502174133', 12, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 14:41:34'),
(23, 'RCPT-20220502174133', 13, '-', 1, '0.00', '0.00', '0.00', 1, 1, '2022-05-02 14:41:34'),
(24, 'RCPT-20220502180812', 13, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 15:08:12'),
(25, 'RCPT-20220502180831', 12, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 15:08:31'),
(26, 'RCPT-20220502180901', 12, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 15:09:01'),
(27, 'RCPT-20220502180940', 12, '-', 2, '150.00', '300.00', '300.00', 1, 1, '2022-05-02 15:09:40'),
(28, 'RCPT-20220502181035', 13, '-', 1, '150.00', '150.00', '150.00', 1, 1, '2022-05-02 15:10:35'),
(29, 'RCPT-20220503142110', 9, '-', 3, '50.00', '150.00', '150.00', 1, 1, '2022-05-03 11:21:10'),
(30, 'RCPT-20220503142110', 10, '-', 1, '70.00', '70.00', '70.00', 1, 1, '2022-05-03 11:21:10'),
(31, 'RCPT-20220505160739', 47, '-', 3, '0.00', '0.00', '0.00', 1, 1, '2022-05-05 13:07:39'),
(32, 'RCPT-20220505160739', 46, '-', 2, '0.00', '0.00', '0.00', 1, 1, '2022-05-05 13:07:39'),
(33, 'RCPT-20220505160739', 50, '-', 1, '0.00', '0.00', '0.00', 1, 1, '2022-05-05 13:07:39'),
(34, 'RCPT-20220505160908', 9, '-', 4, '50.00', '200.00', '200.00', 1, 1, '2022-05-05 13:09:08'),
(35, 'RCPT-20220505160908', 10, '-', 3, '70.00', '210.00', '210.00', 1, 1, '2022-05-05 13:09:08'),
(36, 'RCPT-20220509141627', 32, '-', 3, '200.00', '600.00', '600.00', 1, 1, '2022-05-09 11:16:27'),
(37, 'RCPT-20220509141627', 34, '-', 1, '300.00', '300.00', '300.00', 1, 1, '2022-05-09 11:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `stock_monitor`
--

CREATE TABLE `stock_monitor` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `total_stock` double NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_table`
--

CREATE TABLE `stock_table` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `bp` decimal(10,2) NOT NULL,
  `highest_price` decimal(10,2) NOT NULL,
  `lowest_price` decimal(10,2) NOT NULL,
  `remaining` decimal(10,2) NOT NULL,
  `s` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_table`
--

INSERT INTO `stock_table` (`id`, `product_id`, `company_id`, `bp`, `highest_price`, `lowest_price`, `remaining`, `s`) VALUES
(1, 1, 1, '0.00', '0.00', '0.00', '0.00', 1),
(2, 2, 1, '0.00', '0.00', '0.00', '0.00', 1),
(3, 3, 1, '0.00', '0.00', '0.00', '0.00', 1),
(4, 4, 1, '0.00', '0.00', '0.00', '0.00', 1),
(5, 5, 1, '0.00', '0.00', '0.00', '0.00', 1),
(6, 6, 1, '0.00', '0.00', '0.00', '0.00', 1),
(7, 7, 1, '0.00', '0.00', '0.00', '0.00', 1),
(8, 8, 1, '0.00', '0.00', '0.00', '0.00', 1),
(9, 9, 1, '0.00', '0.00', '0.00', '-13.00', 1),
(10, 10, 1, '0.00', '0.00', '0.00', '-9.00', 1),
(11, 11, 1, '0.00', '0.00', '0.00', '-1.00', 1),
(12, 12, 1, '0.00', '0.00', '0.00', '-10.00', 1),
(13, 13, 1, '0.00', '0.00', '0.00', '-3.00', 1),
(14, 14, 1, '0.00', '0.00', '0.00', '0.00', 1),
(15, 15, 1, '0.00', '0.00', '0.00', '-1.00', 1),
(16, 16, 1, '0.00', '0.00', '0.00', '-1.00', 1),
(17, 17, 1, '0.00', '0.00', '0.00', '0.00', 1),
(18, 18, 1, '0.00', '0.00', '0.00', '0.00', 1),
(19, 19, 1, '0.00', '0.00', '0.00', '0.00', 1),
(20, 20, 1, '0.00', '0.00', '0.00', '0.00', 1),
(21, 21, 1, '0.00', '0.00', '0.00', '0.00', 1),
(22, 22, 1, '0.00', '0.00', '0.00', '0.00', 1),
(23, 23, 1, '0.00', '0.00', '0.00', '0.00', 1),
(24, 24, 1, '0.00', '0.00', '0.00', '0.00', 1),
(25, 25, 1, '0.00', '0.00', '0.00', '0.00', 1),
(26, 26, 1, '0.00', '0.00', '0.00', '0.00', 1),
(27, 27, 1, '0.00', '0.00', '0.00', '0.00', 1),
(28, 28, 1, '0.00', '0.00', '0.00', '0.00', 1),
(29, 29, 1, '0.00', '0.00', '0.00', '0.00', 1),
(30, 30, 1, '0.00', '0.00', '0.00', '0.00', 1),
(31, 31, 1, '0.00', '0.00', '0.00', '0.00', 1),
(32, 32, 1, '0.00', '0.00', '0.00', '-3.00', 1),
(33, 33, 1, '0.00', '0.00', '0.00', '0.00', 1),
(34, 34, 1, '0.00', '0.00', '0.00', '-1.00', 1),
(35, 35, 1, '0.00', '0.00', '0.00', '0.00', 1),
(36, 36, 1, '0.00', '0.00', '0.00', '0.00', 1),
(37, 37, 1, '0.00', '0.00', '0.00', '0.00', 1),
(38, 38, 1, '0.00', '0.00', '0.00', '0.00', 1),
(39, 39, 1, '0.00', '0.00', '0.00', '0.00', 1),
(40, 40, 1, '0.00', '0.00', '0.00', '0.00', 1),
(41, 41, 1, '0.00', '0.00', '0.00', '0.00', 1),
(42, 42, 1, '0.00', '0.00', '0.00', '0.00', 1),
(43, 43, 1, '0.00', '0.00', '0.00', '0.00', 1),
(44, 44, 1, '0.00', '0.00', '0.00', '0.00', 1),
(45, 45, 1, '0.00', '0.00', '0.00', '0.00', 1),
(46, 46, 1, '0.00', '0.00', '0.00', '-2.00', 1),
(47, 47, 1, '0.00', '0.00', '0.00', '-3.00', 1),
(48, 48, 1, '0.00', '0.00', '0.00', '0.00', 1),
(49, 49, 1, '0.00', '0.00', '0.00', '0.00', 1),
(50, 50, 1, '3500.00', '5000.00', '4000.00', '0.00', 1),
(51, 51, 1, '0.00', '0.00', '0.00', '0.00', 1),
(52, 52, 1, '0.00', '0.00', '0.00', '0.00', 1),
(53, 53, 1, '0.00', '0.00', '0.00', '0.00', 1),
(54, 54, 1, '0.00', '0.00', '0.00', '0.00', 1),
(55, 55, 1, '0.00', '0.00', '0.00', '0.00', 1),
(56, 56, 1, '0.00', '0.00', '0.00', '0.00', 1),
(57, 57, 1, '0.00', '0.00', '0.00', '0.00', 1),
(58, 58, 1, '0.00', '0.00', '0.00', '0.00', 1),
(59, 59, 1, '0.00', '0.00', '0.00', '0.00', 1),
(60, 60, 1, '0.00', '0.00', '0.00', '0.00', 1),
(61, 61, 1, '0.00', '0.00', '0.00', '0.00', 1),
(62, 62, 1, '0.00', '0.00', '0.00', '0.00', 1),
(63, 63, 1, '0.00', '0.00', '0.00', '0.00', 1),
(64, 64, 1, '0.00', '0.00', '0.00', '0.00', 1),
(65, 65, 1, '0.00', '0.00', '0.00', '0.00', 1),
(66, 66, 1, '0.00', '0.00', '0.00', '0.00', 1),
(67, 67, 1, '0.00', '0.00', '0.00', '0.00', 1),
(68, 68, 1, '0.00', '0.00', '0.00', '0.00', 1),
(69, 69, 1, '0.00', '0.00', '0.00', '0.00', 1),
(70, 70, 1, '0.00', '0.00', '0.00', '0.00', 1),
(71, 71, 1, '0.00', '0.00', '0.00', '0.00', 1),
(72, 72, 1, '0.00', '0.00', '0.00', '0.00', 1),
(73, 73, 1, '0.00', '0.00', '0.00', '0.00', 1),
(74, 74, 1, '0.00', '0.00', '0.00', '0.00', 1),
(75, 75, 1, '0.00', '0.00', '0.00', '0.00', 1),
(76, 76, 1, '0.00', '0.00', '0.00', '0.00', 1),
(77, 77, 1, '0.00', '0.00', '0.00', '0.00', 1),
(78, 78, 1, '0.00', '0.00', '0.00', '0.00', 1),
(79, 79, 1, '0.00', '0.00', '0.00', '0.00', 1),
(80, 80, 1, '0.00', '0.00', '0.00', '0.00', 1),
(81, 81, 1, '0.00', '0.00', '0.00', '0.00', 1),
(82, 82, 1, '0.00', '0.00', '0.00', '0.00', 1),
(83, 83, 1, '0.00', '0.00', '0.00', '0.00', 1),
(84, 84, 1, '0.00', '0.00', '0.00', '0.00', 1),
(85, 85, 1, '0.00', '0.00', '0.00', '0.00', 1),
(86, 86, 1, '0.00', '0.00', '0.00', '0.00', 1),
(87, 87, 1, '0.00', '0.00', '0.00', '0.00', 1),
(88, 88, 1, '0.00', '0.00', '0.00', '0.00', 1),
(89, 89, 1, '0.00', '0.00', '0.00', '0.00', 1),
(90, 90, 1, '0.00', '0.00', '0.00', '0.00', 1),
(91, 91, 1, '0.00', '0.00', '0.00', '0.00', 1),
(92, 92, 1, '0.00', '0.00', '0.00', '0.00', 1),
(93, 93, 1, '0.00', '0.00', '0.00', '0.00', 1),
(94, 94, 1, '0.00', '0.00', '0.00', '0.00', 1),
(95, 95, 1, '0.00', '0.00', '0.00', '0.00', 1),
(96, 96, 1, '0.00', '0.00', '0.00', '0.00', 1),
(97, 97, 1, '0.00', '0.00', '0.00', '0.00', 1),
(98, 98, 1, '0.00', '0.00', '0.00', '0.00', 1),
(99, 99, 1, '0.00', '0.00', '0.00', '0.00', 1),
(100, 100, 1, '0.00', '0.00', '0.00', '0.00', 1),
(101, 101, 1, '0.00', '0.00', '0.00', '0.00', 1),
(102, 102, 1, '0.00', '0.00', '0.00', '0.00', 1),
(103, 103, 1, '0.00', '0.00', '0.00', '0.00', 1),
(104, 104, 1, '0.00', '0.00', '0.00', '0.00', 1),
(105, 105, 1, '0.00', '0.00', '0.00', '0.00', 1),
(106, 106, 1, '0.00', '0.00', '0.00', '0.00', 1),
(107, 107, 1, '0.00', '0.00', '0.00', '0.00', 1),
(108, 108, 1, '0.00', '0.00', '0.00', '0.00', 1),
(109, 109, 1, '0.00', '0.00', '0.00', '0.00', 1),
(110, 110, 1, '0.00', '0.00', '0.00', '0.00', 1),
(111, 111, 1, '0.00', '0.00', '0.00', '0.00', 1),
(112, 112, 1, '0.00', '0.00', '0.00', '0.00', 1),
(113, 113, 1, '0.00', '0.00', '0.00', '0.00', 1),
(114, 114, 1, '0.00', '0.00', '0.00', '0.00', 1),
(115, 115, 1, '0.00', '0.00', '0.00', '0.00', 1),
(116, 116, 1, '0.00', '0.00', '0.00', '0.00', 1),
(117, 117, 1, '0.00', '0.00', '0.00', '0.00', 1),
(118, 118, 1, '0.00', '0.00', '0.00', '0.00', 1),
(119, 119, 1, '0.00', '0.00', '0.00', '0.00', 1),
(120, 120, 1, '0.00', '0.00', '0.00', '0.00', 1),
(121, 121, 1, '0.00', '0.00', '0.00', '0.00', 1),
(122, 122, 1, '0.00', '0.00', '0.00', '0.00', 1),
(123, 123, 1, '0.00', '0.00', '0.00', '0.00', 1),
(124, 124, 1, '0.00', '0.00', '0.00', '0.00', 1),
(125, 125, 1, '0.00', '0.00', '0.00', '0.00', 1),
(126, 126, 1, '0.00', '0.00', '0.00', '0.00', 1),
(127, 127, 1, '0.00', '0.00', '0.00', '0.00', 1),
(128, 128, 1, '0.00', '0.00', '0.00', '0.00', 1),
(129, 129, 1, '0.00', '0.00', '0.00', '0.00', 1),
(130, 130, 1, '0.00', '0.00', '0.00', '0.00', 1),
(131, 131, 1, '0.00', '0.00', '0.00', '0.00', 1),
(132, 132, 1, '0.00', '0.00', '0.00', '0.00', 1),
(133, 133, 1, '0.00', '0.00', '0.00', '0.00', 1),
(134, 134, 1, '0.00', '0.00', '0.00', '0.00', 1),
(135, 135, 1, '0.00', '0.00', '0.00', '0.00', 1),
(136, 136, 1, '0.00', '0.00', '0.00', '0.00', 1),
(137, 137, 1, '0.00', '0.00', '0.00', '0.00', 1),
(138, 138, 1, '0.00', '0.00', '0.00', '0.00', 1),
(139, 139, 1, '0.00', '0.00', '0.00', '0.00', 1),
(140, 140, 1, '0.00', '0.00', '0.00', '0.00', 1),
(141, 141, 1, '0.00', '0.00', '0.00', '0.00', 1),
(142, 142, 1, '0.00', '0.00', '0.00', '0.00', 1),
(143, 143, 1, '0.00', '0.00', '0.00', '0.00', 1),
(144, 144, 1, '0.00', '0.00', '0.00', '0.00', 1),
(145, 145, 1, '0.00', '0.00', '0.00', '0.00', 1),
(146, 146, 1, '0.00', '0.00', '0.00', '0.00', 1),
(147, 147, 1, '0.00', '0.00', '0.00', '0.00', 1),
(148, 148, 1, '0.00', '0.00', '0.00', '0.00', 1),
(149, 149, 1, '0.00', '0.00', '0.00', '0.00', 1),
(150, 150, 1, '0.00', '0.00', '0.00', '0.00', 1),
(151, 151, 1, '0.00', '0.00', '0.00', '0.00', 1),
(152, 152, 1, '0.00', '0.00', '0.00', '0.00', 1),
(153, 153, 1, '0.00', '0.00', '0.00', '0.00', 1),
(154, 154, 1, '0.00', '0.00', '0.00', '0.00', 1),
(155, 155, 1, '0.00', '0.00', '0.00', '0.00', 1),
(156, 156, 1, '0.00', '0.00', '0.00', '0.00', 1),
(157, 157, 1, '0.00', '0.00', '0.00', '0.00', 1),
(158, 158, 1, '0.00', '0.00', '0.00', '0.00', 1),
(159, 159, 1, '0.00', '0.00', '0.00', '0.00', 1),
(160, 160, 1, '0.00', '0.00', '0.00', '0.00', 1),
(161, 161, 1, '2500.00', '4500.00', '3000.00', '1.00', 1),
(162, 162, 1, '0.00', '0.00', '0.00', '0.00', 1),
(163, 163, 1, '0.00', '0.00', '0.00', '0.00', 1),
(164, 164, 1, '0.00', '0.00', '0.00', '0.00', 1),
(165, 165, 1, '0.00', '0.00', '0.00', '0.00', 1),
(166, 166, 1, '0.00', '0.00', '0.00', '0.00', 1),
(167, 167, 1, '0.00', '0.00', '0.00', '0.00', 1),
(168, 168, 1, '0.00', '0.00', '0.00', '0.00', 1),
(169, 169, 1, '0.00', '0.00', '0.00', '0.00', 1),
(170, 170, 1, '0.00', '0.00', '0.00', '0.00', 1),
(171, 171, 1, '0.00', '0.00', '0.00', '0.00', 1),
(172, 172, 1, '0.00', '0.00', '0.00', '0.00', 1),
(173, 173, 1, '0.00', '0.00', '0.00', '0.00', 1),
(174, 174, 1, '0.00', '0.00', '0.00', '-4.00', 1),
(175, 175, 1, '0.00', '0.00', '0.00', '-5.00', 1),
(176, 176, 1, '0.00', '0.00', '0.00', '0.00', 1),
(177, 177, 1, '0.00', '0.00', '0.00', '0.00', 1),
(178, 178, 1, '0.00', '0.00', '0.00', '-4.00', 1),
(179, 179, 1, '0.00', '0.00', '0.00', '0.00', 1),
(180, 180, 1, '0.00', '0.00', '0.00', '0.00', 1),
(181, 181, 1, '0.00', '0.00', '0.00', '0.00', 1),
(182, 182, 1, '0.00', '0.00', '0.00', '0.00', 1),
(183, 183, 1, '0.00', '0.00', '0.00', '-2.00', 1),
(184, 184, 1, '0.00', '0.00', '0.00', '0.00', 1),
(185, 185, 1, '0.00', '0.00', '0.00', '0.00', 1),
(186, 186, 1, '0.00', '0.00', '0.00', '0.00', 1),
(187, 187, 1, '0.00', '0.00', '0.00', '0.00', 1),
(188, 188, 1, '0.00', '0.00', '0.00', '0.00', 1),
(189, 189, 1, '0.00', '0.00', '0.00', '0.00', 1),
(190, 190, 1, '0.00', '0.00', '0.00', '0.00', 1),
(191, 191, 1, '0.00', '0.00', '0.00', '0.00', 1),
(192, 192, 1, '0.00', '0.00', '0.00', '0.00', 1),
(193, 193, 1, '0.00', '0.00', '0.00', '0.00', 1),
(194, 194, 1, '0.00', '0.00', '0.00', '0.00', 1),
(195, 195, 1, '0.00', '0.00', '0.00', '0.00', 1),
(196, 196, 1, '0.00', '0.00', '0.00', '0.00', 1),
(197, 197, 1, '0.00', '0.00', '0.00', '0.00', 1),
(198, 198, 1, '0.00', '0.00', '0.00', '0.00', 1),
(199, 199, 1, '0.00', '0.00', '0.00', '0.00', 1),
(200, 200, 1, '0.00', '0.00', '0.00', '0.00', 1),
(201, 201, 1, '0.00', '0.00', '0.00', '0.00', 1),
(202, 202, 1, '0.00', '0.00', '0.00', '0.00', 1),
(203, 203, 1, '0.00', '0.00', '0.00', '0.00', 1),
(204, 204, 1, '0.00', '0.00', '0.00', '0.00', 1),
(205, 205, 1, '0.00', '0.00', '0.00', '0.00', 1),
(206, 206, 1, '0.00', '0.00', '0.00', '0.00', 1),
(207, 207, 1, '0.00', '0.00', '0.00', '0.00', 1),
(208, 208, 1, '0.00', '0.00', '0.00', '0.00', 1),
(209, 209, 1, '0.00', '0.00', '0.00', '0.00', 1),
(210, 210, 1, '0.00', '0.00', '0.00', '0.00', 1),
(211, 211, 1, '0.00', '0.00', '0.00', '0.00', 1),
(212, 212, 1, '0.00', '0.00', '0.00', '0.00', 1),
(213, 213, 1, '0.00', '0.00', '0.00', '0.00', 1),
(214, 214, 1, '0.00', '0.00', '0.00', '0.00', 1),
(215, 215, 1, '0.00', '0.00', '0.00', '0.00', 1),
(216, 216, 1, '0.00', '0.00', '0.00', '0.00', 1),
(217, 217, 1, '0.00', '0.00', '0.00', '0.00', 1),
(218, 218, 1, '0.00', '0.00', '0.00', '0.00', 1),
(219, 219, 1, '0.00', '0.00', '0.00', '0.00', 1),
(220, 220, 1, '0.00', '0.00', '0.00', '0.00', 1),
(221, 221, 1, '0.00', '0.00', '0.00', '0.00', 1),
(222, 222, 1, '0.00', '0.00', '0.00', '0.00', 1),
(223, 223, 1, '0.00', '0.00', '0.00', '0.00', 1),
(224, 224, 1, '0.00', '0.00', '0.00', '0.00', 1),
(225, 225, 1, '0.00', '0.00', '0.00', '0.00', 1),
(226, 226, 1, '0.00', '0.00', '0.00', '0.00', 1),
(227, 227, 1, '0.00', '0.00', '0.00', '0.00', 1),
(228, 228, 1, '0.00', '0.00', '0.00', '0.00', 1),
(229, 229, 1, '0.00', '0.00', '0.00', '0.00', 1),
(230, 230, 1, '0.00', '0.00', '0.00', '0.00', 1),
(231, 231, 1, '0.00', '0.00', '0.00', '0.00', 1),
(232, 232, 1, '0.00', '0.00', '0.00', '0.00', 1),
(233, 233, 1, '0.00', '0.00', '0.00', '0.00', 1),
(234, 234, 1, '0.00', '0.00', '0.00', '0.00', 1),
(235, 235, 1, '0.00', '0.00', '0.00', '0.00', 1),
(236, 236, 1, '0.00', '0.00', '0.00', '0.00', 1),
(237, 237, 1, '0.00', '0.00', '0.00', '0.00', 1),
(238, 238, 1, '0.00', '0.00', '0.00', '0.00', 1),
(239, 239, 1, '0.00', '0.00', '0.00', '0.00', 1),
(240, 240, 1, '0.00', '0.00', '0.00', '0.00', 1),
(241, 241, 1, '0.00', '0.00', '0.00', '0.00', 1),
(242, 242, 1, '0.00', '0.00', '0.00', '0.00', 1),
(243, 243, 1, '0.00', '0.00', '0.00', '0.00', 1),
(244, 244, 1, '0.00', '0.00', '0.00', '0.00', 1),
(245, 245, 1, '0.00', '0.00', '0.00', '0.00', 1),
(246, 246, 1, '0.00', '0.00', '0.00', '0.00', 1),
(247, 247, 1, '0.00', '0.00', '0.00', '0.00', 1),
(248, 248, 1, '0.00', '0.00', '0.00', '0.00', 1),
(249, 249, 1, '0.00', '0.00', '0.00', '0.00', 1),
(250, 250, 1, '0.00', '0.00', '0.00', '0.00', 1),
(251, 251, 1, '0.00', '0.00', '0.00', '0.00', 1),
(252, 252, 1, '0.00', '0.00', '0.00', '0.00', 1),
(253, 253, 1, '0.00', '0.00', '0.00', '0.00', 1),
(254, 254, 1, '0.00', '0.00', '0.00', '0.00', 1),
(255, 255, 1, '0.00', '0.00', '0.00', '0.00', 1),
(256, 256, 1, '0.00', '0.00', '0.00', '0.00', 1),
(257, 257, 1, '0.00', '0.00', '0.00', '0.00', 1),
(258, 258, 1, '0.00', '0.00', '0.00', '0.00', 1),
(259, 259, 1, '0.00', '0.00', '0.00', '0.00', 1),
(260, 260, 1, '0.00', '0.00', '0.00', '0.00', 1),
(261, 261, 1, '0.00', '0.00', '0.00', '0.00', 1),
(262, 262, 1, '0.00', '0.00', '0.00', '0.00', 1),
(263, 263, 1, '0.00', '0.00', '0.00', '0.00', 1),
(264, 264, 1, '0.00', '0.00', '0.00', '0.00', 1),
(265, 265, 1, '0.00', '0.00', '0.00', '0.00', 1),
(266, 266, 1, '0.00', '0.00', '0.00', '0.00', 1),
(267, 267, 1, '0.00', '0.00', '0.00', '0.00', 1),
(268, 268, 1, '0.00', '0.00', '0.00', '0.00', 1),
(269, 269, 1, '0.00', '0.00', '0.00', '0.00', 1),
(270, 270, 1, '0.00', '0.00', '0.00', '0.00', 1),
(271, 271, 1, '0.00', '0.00', '0.00', '0.00', 1),
(272, 272, 1, '0.00', '0.00', '0.00', '0.00', 1),
(273, 273, 1, '0.00', '0.00', '0.00', '0.00', 1),
(274, 274, 1, '0.00', '0.00', '0.00', '0.00', 1),
(275, 275, 1, '0.00', '0.00', '0.00', '0.00', 1),
(276, 276, 1, '0.00', '0.00', '0.00', '0.00', 1),
(277, 277, 1, '0.00', '0.00', '0.00', '0.00', 1),
(278, 278, 1, '0.00', '0.00', '0.00', '0.00', 1),
(279, 279, 1, '0.00', '0.00', '0.00', '0.00', 1),
(280, 280, 1, '0.00', '0.00', '0.00', '0.00', 1),
(281, 281, 1, '0.00', '0.00', '0.00', '0.00', 1),
(282, 282, 1, '0.00', '0.00', '0.00', '0.00', 1),
(283, 283, 1, '0.00', '0.00', '0.00', '0.00', 1),
(284, 284, 1, '0.00', '0.00', '0.00', '0.00', 1),
(285, 285, 1, '0.00', '0.00', '0.00', '0.00', 1),
(286, 286, 1, '0.00', '0.00', '0.00', '0.00', 1),
(287, 287, 1, '0.00', '0.00', '0.00', '0.00', 1),
(288, 288, 1, '0.00', '0.00', '0.00', '0.00', 1),
(289, 289, 1, '0.00', '0.00', '0.00', '0.00', 1),
(290, 290, 1, '0.00', '0.00', '0.00', '0.00', 1),
(291, 291, 1, '0.00', '0.00', '0.00', '0.00', 1),
(292, 292, 1, '0.00', '0.00', '0.00', '0.00', 1),
(293, 293, 1, '0.00', '0.00', '0.00', '0.00', 1),
(294, 294, 1, '0.00', '0.00', '0.00', '0.00', 1),
(295, 295, 1, '0.00', '0.00', '0.00', '0.00', 1),
(296, 296, 1, '0.00', '0.00', '0.00', '0.00', 1),
(297, 297, 1, '0.00', '0.00', '0.00', '0.00', 1),
(298, 298, 1, '0.00', '0.00', '0.00', '0.00', 1),
(299, 299, 1, '0.00', '0.00', '0.00', '0.00', 1),
(300, 300, 1, '0.00', '0.00', '0.00', '0.00', 1),
(301, 301, 1, '0.00', '0.00', '0.00', '0.00', 1),
(302, 302, 1, '0.00', '0.00', '0.00', '0.00', 1),
(303, 303, 1, '0.00', '0.00', '0.00', '0.00', 1),
(304, 304, 1, '0.00', '0.00', '0.00', '0.00', 1),
(305, 305, 1, '0.00', '0.00', '0.00', '0.00', 1),
(306, 306, 1, '0.00', '0.00', '0.00', '0.00', 1),
(307, 307, 1, '0.00', '0.00', '0.00', '0.00', 1),
(308, 308, 1, '0.00', '0.00', '0.00', '0.00', 1),
(309, 309, 1, '0.00', '0.00', '0.00', '0.00', 1),
(310, 310, 1, '0.00', '0.00', '0.00', '0.00', 1),
(311, 311, 1, '0.00', '0.00', '0.00', '0.00', 1),
(312, 312, 1, '0.00', '0.00', '0.00', '0.00', 1),
(313, 313, 1, '0.00', '0.00', '0.00', '0.00', 1),
(314, 314, 1, '0.00', '0.00', '0.00', '0.00', 1),
(315, 315, 1, '0.00', '0.00', '0.00', '0.00', 1),
(316, 316, 1, '0.00', '0.00', '0.00', '0.00', 1),
(317, 317, 1, '0.00', '0.00', '0.00', '0.00', 1),
(318, 318, 1, '0.00', '0.00', '0.00', '0.00', 1),
(319, 319, 1, '0.00', '0.00', '0.00', '0.00', 1),
(320, 320, 1, '0.00', '0.00', '0.00', '0.00', 1),
(321, 321, 1, '0.00', '0.00', '0.00', '0.00', 1),
(322, 322, 1, '0.00', '0.00', '0.00', '0.00', 1),
(323, 323, 1, '0.00', '0.00', '0.00', '0.00', 1),
(324, 324, 1, '0.00', '0.00', '0.00', '0.00', 1),
(325, 325, 1, '0.00', '0.00', '0.00', '0.00', 1),
(326, 326, 1, '0.00', '0.00', '0.00', '0.00', 1),
(327, 327, 1, '0.00', '0.00', '0.00', '0.00', 1),
(328, 328, 1, '0.00', '0.00', '0.00', '0.00', 1),
(329, 329, 1, '0.00', '0.00', '0.00', '0.00', 1),
(330, 330, 1, '0.00', '0.00', '0.00', '0.00', 1),
(331, 331, 1, '0.00', '0.00', '0.00', '0.00', 1),
(332, 332, 1, '0.00', '0.00', '0.00', '0.00', 1),
(333, 333, 1, '0.00', '0.00', '0.00', '0.00', 1),
(334, 334, 1, '0.00', '0.00', '0.00', '0.00', 1),
(335, 335, 1, '0.00', '0.00', '0.00', '0.00', 1),
(336, 336, 1, '0.00', '0.00', '0.00', '0.00', 1),
(337, 337, 1, '0.00', '0.00', '0.00', '0.00', 1),
(338, 338, 1, '0.00', '0.00', '0.00', '0.00', 1),
(339, 339, 1, '0.00', '0.00', '0.00', '0.00', 1),
(340, 340, 1, '0.00', '0.00', '0.00', '0.00', 1),
(341, 341, 1, '0.00', '0.00', '0.00', '0.00', 1),
(342, 342, 1, '0.00', '0.00', '0.00', '0.00', 1),
(343, 343, 1, '0.00', '0.00', '0.00', '0.00', 1),
(344, 344, 1, '0.00', '0.00', '0.00', '0.00', 1),
(345, 345, 1, '0.00', '0.00', '0.00', '0.00', 1),
(346, 346, 1, '0.00', '0.00', '0.00', '0.00', 1),
(347, 347, 1, '0.00', '0.00', '0.00', '0.00', 1),
(348, 348, 1, '0.00', '0.00', '0.00', '0.00', 1),
(349, 349, 1, '0.00', '0.00', '0.00', '0.00', 1),
(350, 350, 1, '0.00', '0.00', '0.00', '0.00', 1),
(351, 351, 1, '0.00', '0.00', '0.00', '0.00', 1),
(352, 352, 1, '0.00', '0.00', '0.00', '0.00', 1),
(353, 353, 1, '0.00', '0.00', '0.00', '0.00', 1),
(354, 354, 1, '0.00', '0.00', '0.00', '0.00', 1),
(355, 355, 1, '0.00', '0.00', '0.00', '0.00', 1),
(356, 356, 1, '0.00', '0.00', '0.00', '0.00', 1),
(357, 357, 1, '0.00', '0.00', '0.00', '0.00', 1),
(358, 358, 1, '0.00', '0.00', '0.00', '0.00', 1),
(359, 359, 1, '0.00', '0.00', '0.00', '0.00', 1),
(360, 360, 1, '0.00', '0.00', '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_table`
--

CREATE TABLE `suppliers_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `s` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_company`
--

CREATE TABLE `users_company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `s` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_company`
--

INSERT INTO `users_company` (`id`, `user_id`, `company_id`, `s`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '-',
  `email` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `s` int(11) NOT NULL DEFAULT 1,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `name`, `phone`, `username`, `email`, `user_type`, `active`, `password`, `created_at`, `s`, `company_id`) VALUES
(1, 'ADMINISTRATOR', '-', '-', '-', 'Admin', 1, '1123', '2020-08-04 09:27:11', 1, 1),
(2, 'Nickson Kalama', '0704487610', '0704487610', 'info@waqanda.com', 'User', 1, '1122', '2022-04-29 00:40:19', 1, 1),
(3, 'Davis', '0726333720', '0726333720', 'director@waqanda.com', 'User', 1, '5555', '2022-04-29 07:00:10', 1, 1),
(4, 'Zainab', '0707067121', '0707067121', 'man@waqanda.com', 'Manager', 1, '1234', '2022-05-01 14:56:44', 1, 1),
(5, 'Moddy', '0727723364', '0727723364', 'sup@waqanda.co.ke', 'Supervisor', 1, '2067', '2022-05-01 15:11:09', 1, 1),
(6, 'Fredrick', '0728646083', '0728646083', 'fredrickdotieno@gmail.com', 'User', 1, '2030', '2022-05-01 15:13:38', 1, 1),
(7, 'Mwadime', '0746732575', '0746732575', 'cashier@waqanda.co.ke', 'User', 1, '2575', '2022-05-01 15:16:22', 1, 1),
(8, 'Christine', '0710758826', '0710758826', NULL, 'User', 1, '2580', '2022-05-02 13:12:31', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_table`
--
ALTER TABLE `clients_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_table`
--
ALTER TABLE `company_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_tables`
--
ALTER TABLE `customer_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs_table`
--
ALTER TABLE `logs_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases_table`
--
ALTER TABLE `purchases_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_table`
--
ALTER TABLE `quotation_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned_table`
--
ALTER TABLE `returned_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_table`
--
ALTER TABLE `sales_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_monitor`
--
ALTER TABLE `stock_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_table`
--
ALTER TABLE `stock_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers_table`
--
ALTER TABLE `suppliers_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_company`
--
ALTER TABLE `users_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `clients_table`
--
ALTER TABLE `clients_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_table`
--
ALTER TABLE `company_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_tables`
--
ALTER TABLE `customer_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs_table`
--
ALTER TABLE `logs_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `purchases_table`
--
ALTER TABLE `purchases_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quotation_table`
--
ALTER TABLE `quotation_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returned_table`
--
ALTER TABLE `returned_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_table`
--
ALTER TABLE `sales_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stock_monitor`
--
ALTER TABLE `stock_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_table`
--
ALTER TABLE `stock_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `suppliers_table`
--
ALTER TABLE `suppliers_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_company`
--
ALTER TABLE `users_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
