-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 08:47 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(32) NOT NULL,
  `subject_alias` varchar(10) NOT NULL,
  `subject_description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_alias`, `subject_description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'Math I', 'M1', 'Intermediate Mathematics', '2019-03-05 07:33:47', '0000-00-00 00:00:00', 0, 0, 1),
(2, 'English I', 'E1', '', '2019-03-05 07:34:01', '0000-00-00 00:00:00', 0, 0, 1),
(3, 'Urdu I', 'U1', '', '2019-03-05 07:34:11', '0000-00-00 00:00:00', 0, 0, 1),
(4, 'Physics I', 'P1', '', '2019-03-05 07:34:27', '0000-00-00 00:00:00', 0, 0, 1),
(5, 'Biology I', 'B1', '', '2019-03-05 07:34:46', '0000-00-00 00:00:00', 0, 0, 1),
(6, 'Islamiyat', 'I', '', '2019-03-05 04:48:41', '0000-00-00 00:00:00', 0, 0, 1),
(7, 'Computer I', 'C1', '', '2019-03-05 07:35:13', '0000-00-00 00:00:00', 0, 0, 1),
(8, 'Chemistry I', 'Ch1', '', '2019-03-05 07:35:18', '0000-00-00 00:00:00', 0, 0, 1),
(9, 'Pak Studies', 'Ps', '', '2019-03-05 07:35:37', '2018-12-31 11:57:46', 0, 1, 0),
(10, 'Math II', 'M2', '', '2019-03-05 07:36:03', '0000-00-00 00:00:00', 9, 0, 1),
(11, 'English II', 'E2', '', '2019-03-05 07:42:51', '0000-00-00 00:00:00', 0, 0, 1),
(12, 'Urdu II', 'U2', '', '2019-03-05 07:43:07', '0000-00-00 00:00:00', 0, 0, 1),
(13, 'Physics II', 'P2', '', '2019-03-05 07:43:21', '0000-00-00 00:00:00', 0, 0, 1),
(14, 'Biology II', 'B2', '', '2019-03-05 07:43:34', '0000-00-00 00:00:00', 0, 0, 1),
(15, 'Computer II', 'Cm2', '', '2019-03-05 07:43:57', '0000-00-00 00:00:00', 0, 0, 1),
(16, 'Chemistry II', 'Ch2', '', '2019-03-05 07:44:15', '0000-00-00 00:00:00', 0, 0, 1),
(17, 'Statistics I', 'St1', '', '2019-03-05 07:44:55', '0000-00-00 00:00:00', 0, 0, 1),
(18, 'Statistics II', 'St2', '', '2019-03-05 07:45:05', '0000-00-00 00:00:00', 0, 0, 1),
(19, 'Economics I', 'Ec1', '', '2019-03-05 07:45:20', '0000-00-00 00:00:00', 0, 0, 1),
(20, 'Economics II', 'Ec2', '', '2019-03-05 07:45:31', '0000-00-00 00:00:00', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
