-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 10:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rahaportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_days_off`
--

CREATE TABLE IF NOT EXISTS `calendar_days_off` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weekly` varchar(3) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `yearly` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=200 ;

--
-- Dumping data for table `calendar_days_off`
--

INSERT INTO `calendar_days_off` (`id`, `weekly`, `yearly`) VALUES
(183, 'thu', NULL),
(186, 'fri', NULL),
(197, NULL, 1417206600),
(198, NULL, 1417379400),
(199, NULL, 1418761800);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_persian_ci NOT NULL,
  `en_ex_time` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `leave_time` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `takhir` int(11) NOT NULL,
  `tajil` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `description`, `en_ex_time`, `leave_time`, `takhir`, `tajil`, `date`, `created_at`, `updated_at`) VALUES
(30, 6, 'این یک توضیح برای گزارش کار است.', '07:00-17:30', '', -60, -30, 1418157000, '2014-12-10 11:47:39', '2014-12-10 11:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_base_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `karkard_id` int(11) NOT NULL,
  `total_salary` int(11) NOT NULL,
  `date_year` int(11) NOT NULL,
  `date_month` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=120 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `salary_base_id`, `staff_id`, `karkard_id`, `total_salary`, `date_year`, `date_month`, `created_at`, `updated_at`) VALUES
(105, 4, 2, 20, 4281020, 1393, 7, '2014-11-04 19:04:55', '2014-11-04 19:04:55'),
(106, 4, 2, 21, 2957140, 1394, 8, '2014-11-04 19:43:50', '2014-11-04 19:43:50'),
(108, 4, 4, 19, 3675200, 1393, 8, '2014-11-04 20:05:39', '2014-11-04 20:05:39'),
(109, 4, 3, 18, 3675200, 1393, 8, '2014-11-04 20:07:21', '2014-11-04 20:07:21'),
(117, 4, 2, 22, 3439245, 1393, 12, '2014-11-05 11:25:32', '2014-11-05 11:25:32'),
(118, 4, 2, 23, 2169645, 1394, 1, '2014-11-05 11:26:12', '2014-11-05 11:26:12'),
(119, 4, 2, 17, 4804445, 1393, 8, '2014-11-05 11:51:43', '2014-11-05 11:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `salary_base`
--

CREATE TABLE IF NOT EXISTS `salary_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `salary_base` int(11) NOT NULL,
  `salary_per_min` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `salary_base`
--

INSERT INTO `salary_base` (`id`, `title`, `description`, `salary_base`, `salary_per_min`, `created_at`, `updated_at`) VALUES
(4, 'پایه محاسبه اصلی', 'توضیح پایه محاسبه', 5000000, 460, '2014-11-04 00:58:26', '2014-11-04 23:13:32'),
(5, 'پایه حقوق دوم', '(بدون توضیح)', 6500000, 460, '2014-11-14 00:24:08', '2014-11-14 00:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `salary_subadd`
--

CREATE TABLE IF NOT EXISTS `salary_subadd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `type` enum('add','sub') COLLATE utf8mb4_persian_ci NOT NULL,
  `salary_base_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `salary_subadd`
--

INSERT INTO `salary_subadd` (`id`, `title`, `description`, `type`, `salary_base_id`, `created_at`, `updated_at`) VALUES
(5, 'سهم بیمه', 'سهم بیمه کارکنان', 'sub', 4, '2014-11-04 00:58:51', '2014-11-04 00:58:51'),
(6, 'صندوق پس انداز', 'صندوق پس انداز اجباری کارکنان که در زمان تسویه حساب نهایی محاسبه و پرداخت خواهد شد.', 'sub', 4, '2014-11-04 00:59:56', '2014-11-04 00:59:56'),
(7, 'هزینه سفر کربلا', 'هزینه سفر به کربلا به نیروهای قبل از سال ۹۲ بابت پروژه اسارت و آزادگان', 'add', 4, '2014-11-04 01:00:25', '2014-11-04 01:00:25'),
(8, 'بازپرداخت وام', 'بازپرداخت اقساطی وام پرداخت شده به کارکنان', 'sub', 4, '2014-11-04 22:12:26', '2014-11-05 00:34:51'),
(9, 'تست ۲', 'تست تست تست', 'add', 4, '2014-11-04 22:14:47', '2014-11-04 22:14:47'),
(10, 'سهم بیمه دوم', '', 'sub', 5, '2014-11-14 00:35:33', '2014-11-14 00:35:33'),
(11, 'پس انداز ماهیانه', '', 'sub', 5, '2014-11-14 00:35:52', '2014-11-14 00:35:52'),
(12, 'پاداش شش ماهه', '', 'add', 5, '2014-11-14 00:37:14', '2014-11-14 00:37:14'),
(13, 'هزینه سفر کربلا', '', 'add', 5, '2014-11-14 10:07:55', '2014-11-14 10:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `salary_subadd_values`
--

CREATE TABLE IF NOT EXISTS `salary_subadd_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `subadd_id` int(11) NOT NULL,
  `for_all` enum('y') COLLATE utf8mb4_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `salary_subadd_values`
--

INSERT INTO `salary_subadd_values` (`id`, `value`, `subadd_id`, `for_all`) VALUES
(11, 500000, 5, 'y'),
(12, 1000000, 6, 'y'),
(13, 2000000, 7, NULL),
(14, 111111, 9, NULL),
(15, 5555, 8, 'y'),
(16, 500000, 12, 'y'),
(17, 150000, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `work_time` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `vacation_per_month` int(11) NOT NULL,
  `report_time` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `availability_from_out` enum('true','false') COLLATE utf8mb4_persian_ci NOT NULL,
  `user_access` enum('true','false') COLLATE utf8mb4_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `work_time`, `vacation_per_month`, `report_time`, `availability_from_out`, `user_access`, `created_at`, `updated_at`) VALUES
(13, 'راویان هنر انقلاب اسلامی رها', '08:00-17:00', 3, '08:00-17:00', 'false', 'true', '2014-11-29 13:49:05', '2014-12-09 14:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `staff_no` int(11) NOT NULL,
  `kod_meli` int(11) NOT NULL,
  `shenasnameh` int(11) NOT NULL,
  `birth_date` int(11) NOT NULL,
  `birth_location` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `madrak` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `shoghl` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `start_date` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `bimeh_date` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `bimeh_no` int(11) NOT NULL,
  `phone` int(20) NOT NULL,
  `cellphone` int(20) NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_persian_ci NOT NULL,
  `bank_name` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `bank_no` int(11) NOT NULL,
  `bank_card` int(11) NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`, `staff_no`, `kod_meli`, `shenasnameh`, `birth_date`, `birth_location`, `madrak`, `shoghl`, `start_date`, `bimeh_date`, `bimeh_no`, `phone`, `cellphone`, `address`, `bank_name`, `bank_no`, `bank_card`, `description`, `created_at`, `updated_at`) VALUES
(12, 'سید علیرضا', 'رضوی', 1010, 60227044, 0, 1362, '', '0', '0', '', '', 0, 0, 0, '', '', 0, 0, '', '2014-11-18 22:31:39', '2014-11-18 22:31:39'),
(13, 'رضا', 'علی پور', 205080, 20609987, 1258, 0, '', 'فوق لیسانس', 'محقق', '', '', 0, 0, 0, '', '', 0, 0, '', '2017-01-15 20:35:22', '2017-01-15 20:35:22'),
(14, 'فاطمه', 'هاشمی', 12357, 50203456, 0, 0, '', 'لیسانس', 'مترجم', '', '', 0, 0, 0, '', '', 0, 0, '', '2017-01-15 20:42:07', '2017-01-15 20:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `staff_subadd`
--

CREATE TABLE IF NOT EXISTS `staff_subadd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subadd_value_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `salary_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=397 ;

--
-- Dumping data for table `staff_subadd`
--

INSERT INTO `staff_subadd` (`id`, `subadd_value_id`, `staff_id`, `base_id`, `salary_id`) VALUES
(343, 11, 3, 4, 0),
(344, 12, 3, 4, 0),
(355, 11, 2, 4, 103),
(356, 12, 2, 4, 103),
(357, 11, 4, 4, 104),
(358, 12, 4, 4, 104),
(359, 11, 2, 4, 105),
(360, 12, 2, 4, 105),
(361, 13, 2, 4, 105),
(362, 11, 2, 4, 106),
(363, 12, 2, 4, 106),
(364, 13, 2, 4, 106),
(365, 11, 2, 4, 107),
(366, 12, 2, 4, 107),
(367, 11, 4, 4, 108),
(368, 12, 4, 4, 108),
(369, 13, 4, 4, 108),
(370, 11, 3, 4, 109),
(371, 12, 3, 4, 109),
(372, 11, 2, 4, 110),
(373, 12, 2, 4, 110),
(374, 11, 2, 4, 111),
(375, 12, 2, 4, 111),
(376, 11, 2, 4, 112),
(377, 12, 2, 4, 112),
(378, 11, 2, 4, 113),
(379, 12, 2, 4, 113),
(380, 11, 2, 4, 114),
(381, 12, 2, 4, 114),
(382, 11, 2, 4, 115),
(383, 12, 2, 4, 115),
(384, 11, 2, 4, 116),
(385, 12, 2, 4, 116),
(386, 13, 2, 4, 116),
(387, 11, 2, 4, 117),
(388, 12, 2, 4, 117),
(389, 15, 2, 4, 117),
(390, 11, 2, 4, 118),
(391, 12, 2, 4, 118),
(392, 15, 2, 4, 118),
(393, 11, 2, 4, 119),
(394, 12, 2, 4, 119),
(395, 15, 2, 4, 119),
(396, 13, 2, 4, 119);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_persian_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `staff_id`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'admin', '$2y$10$uBkUxlXk.uHUPl6qzMSFcO572vAK8tQHkC/RmWwWVo9Gw9VN/HNOq', '', 0, 'admin', 'zew4tSaVoiDAvUIyZcFgCAecPjdZdpGVdpTwCF8PxYigAj1RHWqE8WeBZZlQ', '2014-11-17 23:19:43', '2017-01-15 20:37:55'),
(14, 'alireza', '$2y$10$w1jpHvWy9xdbxICOvKEASuJwNGUV4yeY7devacyaamII5bRJKEdX2', 'alireza@rahaportal.ir', 0, 'admin', '', '2014-11-18 22:13:02', '2014-11-18 22:24:12'),
(15, '1010', '$2y$10$ifcjQxkUJyfyNYzhnjqQC.NjoSkHFUQyDe.s6ydbNE/OEVqjfCN4.', '0', 12, 'user', 'nRnkzTbZbk7CQvrv8q9NABMWTtWrLf067ibIH3DjVr3JRiheCk0yld82uJRl', '2014-11-18 22:31:39', '2014-12-17 11:14:28'),
(16, '205080', '$2y$10$FJLAhsFXxPqLijK8biGnL.8UPKCM2mjTgTEsRu4MGz2jRUfN7t8Au', '0', 13, 'user', '', '2017-01-15 20:35:22', '2017-01-15 20:35:22'),
(17, '012357', '$2y$10$jQ3.MXmn3uHj/.Gq1m9Ao.Gv1VL9xYVvWljXz5FRUIPIFm4hGsh.G', '0', 14, 'user', '', '2017-01-15 20:42:08', '2017-01-15 20:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `karkard_day` int(11) NOT NULL,
  `karkard_hour` int(11) NOT NULL,
  `karkard_minute` int(11) NOT NULL,
  `gheybat_day` int(11) NOT NULL,
  `gheybat_hour` int(11) NOT NULL,
  `gheybat_minute` int(11) NOT NULL,
  `karkard_total` int(11) NOT NULL,
  `gheybat_total` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `staff_id`, `base_id`, `karkard_day`, `karkard_hour`, `karkard_minute`, `gheybat_day`, `gheybat_hour`, `gheybat_minute`, `karkard_total`, `gheybat_total`, `created_at`, `updated_at`) VALUES
(17, 2, 4, 20, 10, 20, 1, 1, 0, 29420, 1500, '2014-11-04 01:01:42', '2014-11-05 11:51:43'),
(18, 3, 4, 0, 0, 0, 2, 0, 0, 0, 2880, '2014-11-04 01:30:08', '2014-11-04 20:07:21'),
(19, 4, 4, 0, 0, 0, 2, 0, 0, 0, 2880, '2014-11-04 19:03:16', '2014-11-04 20:05:39'),
(20, 2, 4, 20, 10, 5, 1, 2, 3, 29405, 1563, '2014-11-04 19:04:55', '2014-11-04 19:04:55'),
(21, 2, 4, 5, 6, 7, 3, 2, 1, 7567, 4441, '2014-11-04 19:43:50', '2014-11-04 19:43:50'),
(22, 2, 4, 10, 0, 10, 0, 2, 0, 14410, 120, '2014-11-05 11:25:32', '2014-11-05 11:25:32'),
(23, 2, 4, 27, 10, 27, 2, 0, 0, 39507, 2880, '2014-11-05 11:26:12', '2014-11-05 11:26:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
