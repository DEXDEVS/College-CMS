-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 05:50 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_sms`
--

CREATE TABLE `custom_sms` (
  `id` int(11) NOT NULL,
  `send_to` text NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_sms`
--

INSERT INTO `custom_sms` (`id`, `send_to`, `message`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '923063772105', '<p>Hello,</p><p>This is testing <b><i>SMS.</i></b></p>', '2019-03-08 15:24:28', '0000-00-00 00:00:00', 8, 0),
(2, '923063772106', '<p>\r\n\r\nTesting <b><i>SMS.</i></b>\r\n\r\n<br></p>', '2019-03-08 16:02:54', '0000-00-00 00:00:00', 8, 0),
(3, '923317375027', '<p>Testing SMS from web application.</p>', '2019-03-08 16:08:41', '0000-00-00 00:00:00', 8, 0),
(4, '923063772106', 'This is testing SMS from Brookfield.', '2019-03-08 16:14:43', '0000-00-00 00:00:00', 8, 0),
(5, '923063772105', 'Testing SMS.', '2019-03-08 16:23:59', '0000-00-00 00:00:00', 8, 0),
(6, '923063772106', 'Testing SMS.', '2019-03-08 16:26:31', '0000-00-00 00:00:00', 8, 0),
(8, '923063772106', 'Testing SMS.', '2019-03-08 16:36:02', '0000-00-00 00:00:00', 8, 0),
(9, '923041422508', 'This is testing SMS by DEXDEVS from Brookfield web application.', '2019-03-08 16:37:40', '0000-00-00 00:00:00', 8, 0),
(10, '923063772105', 'This is testing SMS by DEXDEVS from Brookfield web application.', '2019-03-08 16:39:10', '0000-00-00 00:00:00', 8, 0),
(11, '923356383287', 'This is testing SMS by DEXDEVS from Brookfield web application.', '2019-03-08 16:40:13', '0000-00-00 00:00:00', 8, 0),
(12, '923006773327', 'This is testing SMS by DEXDEVS from Brookfield web application.', '2019-03-08 16:41:07', '0000-00-00 00:00:00', 8, 0),
(13, '923006999824', 'This is testing SMS by DEXDEVS from Brookfield web application.\r\n\r\nTask completed by Nauman & Anas.', '2019-03-08 16:42:14', '0000-00-00 00:00:00', 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_sms`
--
ALTER TABLE `custom_sms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_sms`
--
ALTER TABLE `custom_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
