-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 04:11 PM
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
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '3', NULL),
('data entry operator', '4', NULL),
('data entry operator', '6', NULL),
('reviewer', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can create advocate , view advocate , update advocate , delete advocate', NULL, NULL, NULL, NULL),
('create-advocate', 1, 'allow user to create advocate', NULL, NULL, NULL, NULL),
('data entry operator', 1, 'can create , view , update the record of the advocate', NULL, NULL, NULL, NULL),
('delete-advocate', 1, 'user can delete the advocate', NULL, NULL, NULL, NULL),
('export record', 1, 'Superadmin can export the record', NULL, NULL, NULL, NULL),
('go to index', 1, 'user can go to advocates index page', NULL, NULL, NULL, NULL),
('reviewer', 1, 'can update and read records', NULL, NULL, NULL, NULL),
('update-advocate', 1, 'user can update the advocate', NULL, NULL, NULL, NULL),
('view-advocate', 1, 'user can view the advocate', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create-advocate'),
('admin', 'delete-advocate'),
('admin', 'export record'),
('admin', 'go to index'),
('admin', 'update-advocate'),
('admin', 'view-advocate'),
('data entry operator', 'create-advocate'),
('data entry operator', 'go to index'),
('data entry operator', 'update-advocate'),
('data entry operator', 'view-advocate'),
('reviewer', 'go to index'),
('reviewer', 'update-advocate'),
('reviewer', 'view-advocate');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `institute_id` int(11) NOT NULL,
  `branch_code` varchar(32) NOT NULL,
  `branch_name` varchar(32) NOT NULL,
  `branch_type` enum('Franchise','Group') NOT NULL,
  `branch_location` varchar(50) NOT NULL,
  `branch_contact_no` varchar(32) NOT NULL,
  `branch_email` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `branch_head_name` varchar(50) NOT NULL,
  `branch_head_contact_no` varchar(15) NOT NULL,
  `branch_head_email` varchar(120) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `institute_id`, `branch_code`, `branch_name`, `branch_type`, `branch_location`, `branch_contact_no`, `branch_email`, `status`, `branch_head_name`, `branch_head_contact_no`, `branch_head_email`, `delete_status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 2, '001', 'BROOKFIELD COLLEGE RYK', 'Franchise', 'East Canal View', '068-58-75864', 'brookfield@gmail.com', 'Active', '', '', '', 1, '2019-01-03 11:11:10', '0000-00-00 00:00:00', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `concession`
--

CREATE TABLE `concession` (
  `concession_id` int(11) NOT NULL,
  `concession_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concession`
--

INSERT INTO `concession` (`concession_id`, `concession_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, '100% Concession ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1),
(2, '50% Concession ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1),
(3, 'Kinship', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1),
(4, '30% Concession', '2019-02-28 19:00:00', '2019-02-28 19:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `emial_id` int(11) NOT NULL,
  `receiver_name` varchar(60) NOT NULL,
  `receiver_email` varchar(120) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_content` text NOT NULL,
  `email_attachment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`emial_id`, `receiver_name`, `receiver_email`, `email_subject`, `email_content`, `email_attachment`, `created_at`, `created_by`, `updated_at`, `updated_by`, `delete_status`) VALUES
(1, 'Anas', 'anasshafqat01@gmail.com', 'Welcome', 'This is testing email from yii2...!', 'attachments/1545482896.png', '2018-12-22 12:48:24', 0, '0000-00-00 00:00:00', 0, 1),
(3, 'Anas Shafqat', 'anasshafqat01@gmail.com', 'Wellcome to DEXDEVS', 'This is testing email from Yii2...!', 'attachments/1545483278.png', '2018-12-22 12:54:44', 1, '0000-00-00 00:00:00', 0, 1),
(4, 'Saif ur Rehman', 'saifarshad.6987@gmail.com', 'Wellcome To DEXDEVS', 'This is testing email from Yii2...!', 'attachments/1545483348.png', '2018-12-22 12:55:52', 1, '0000-00-00 00:00:00', 0, 1),
(5, 'Nauman Shahid', 'hwhasmhi1625@gmail.com', 'Wellcome To DEXDEVS', 'This is testing email from Yii2...!', 'attachments/1545483409.png', '2018-12-22 12:56:55', 1, '0000-00-00 00:00:00', 0, 1),
(6, 'Nauman Shahid', 'hwhashmi1625@gmail.com', 'Wellcome To DEXDEVS', 'This is testing email with file attachment from Yii2...!', 'attachments/1545483610.png', '2018-12-22 13:00:16', 1, '0000-00-00 00:00:00', 0, 1),
(7, 'Nadia Gull', 'nadiagull285@gmail.com', 'Wellcome To DEXDEVS', 'This is testing email with file attachment from Yii2...!', 'attachments/1545483685.png', '2018-12-22 13:01:39', 1, '0000-00-00 00:00:00', 0, 1),
(8, 'Kinza Fatima', 'kinza.fatima522@gmail.com', 'Wellcome To DEXDEVS', 'This is testing email with file attachment from Yii2...!', 'attachments/1545483773.png', '2018-12-22 13:02:59', 1, '0000-00-00 00:00:00', 0, 1),
(9, 'Rana Faraz', 'ranafarazahmed@gmail.com', 'Wellcome To DEXDEVS', 'This is testing email with file attachment from Yii2...!	', 'attachments/1545484174.png', '2018-12-22 13:09:38', 1, '0000-00-00 00:00:00', 0, 1),
(10, 'Anas Shafqat', 'anasshafqat01@gmail.com', 'Wellcome To DEXDEVS', 'This is testing email with file attachment from Yii2...!', 'attachments/1545484846.jpg', '2018-12-31 10:46:04', 1, '2018-12-31 10:46:04', 1, 0),
(11, 'anas', 'anasshafqat01@gmail.com', 'helli', 'mlklkk', 'attachments/1545761723.jpg', '2018-12-31 10:44:52', 1, '2018-12-31 10:44:52', 1, 0),
(12, 'Anas', 'anasshafqat01@gmail.com', 'Hello', 'heloo heloo heloo heloo', 'attachments/1545764108.jpg', '2018-12-31 11:11:53', 1, '2018-12-31 11:11:53', 1, 0),
(13, 'Anas', 'anasshafqat01@gmail.com', 'Hello', 'Testing Email....', 'attachments/1545804180.jpg', '2018-12-26 06:03:14', 1, '0000-00-00 00:00:00', 0, 1),
(14, 'khh', 'anasshafqat01@gmail.com', 'hello', 'jkhjkh', 'attachments/1545816221.sql', '2018-12-26 09:23:48', 1, '0000-00-00 00:00:00', 0, 1),
(15, 'Mehtab', 'chmehtab4@gmail.com', 'Hello', 'This is testing Email with file attachment from Yii2....', 'attachments/1546064434.png', '2018-12-29 06:21:12', 1, '0000-00-00 00:00:00', 0, 1),
(16, 'Anas Shafqat', 'anasshafqat01@gmail.com', 'Wellcome', 'Testing Email...', 'attachments/1546066690.png', '2018-12-29 06:58:16', 1, '0000-00-00 00:00:00', 0, 1),
(17, 'Anas Shafqat', 'anasshafqat01@gmail.com', 'Hello', '<h2>Hello Sir,</h2><p><b><i>This is testing email from yii2...</i></b><br></p><p><b><i><br></i></b></p><p><b></b>Regards<b></b></p><p><b><i>Anas Shafqat</i></b></p>', 'attachments/1546068232.mp4', '2018-12-29 07:26:27', 1, '0000-00-00 00:00:00', 0, 1),
(18, 'Rana Faraz', 'ranafarazahmed@gmail.com', 'Testing Email', '<h2><b>Hello Sir,</b></h2><p><b><i></i><i>This is testing Email from Yii2 with text formatting.</i><i></i></b><b></b></p><p><b><i><br></i></b></p><p><b>Note:</b></p><p><ol><li><i>jkhjhj</i></li><li><i>erwrwe</i></li><li><i>werwe</i></li><li><i>were</i></li><li><i>werwerwr</i></li></ol><p>Regards,<br></p><p><b><i>Anas Shafqat</i></b></p></p>', 'attachments/1546069705.jpg', '2018-12-29 07:48:30', 1, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_designation`
--

CREATE TABLE `emp_designation` (
  `emp_designation_id` int(11) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_designation`
--

INSERT INTO `emp_designation` (`emp_designation_id`, `emp_designation`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'Principal', '2018-10-31 08:17:08', '2018-10-31 08:17:08', 1, 1, 1),
(2, 'Vise Principal', '2018-10-31 08:17:30', '2018-10-31 08:17:30', 1, 1, 1),
(3, 'Coordinator', '2018-10-31 08:23:02', '0000-00-00 00:00:00', 1, 0, 1),
(4, 'Teacher', '2018-10-31 08:23:21', '0000-00-00 00:00:00', 1, 0, 1),
(5, 'Security Gaurd', '2018-10-31 09:55:43', '2018-10-31 09:55:43', 1, 1, 1),
(6, 'Accountant', '2018-12-07 06:29:32', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_father_name` varchar(50) NOT NULL,
  `emp_cnic` varchar(15) NOT NULL,
  `emp_contact_no` varchar(15) NOT NULL,
  `emp_perm_address` varchar(200) NOT NULL,
  `emp_temp_address` varchar(200) NOT NULL,
  `emp_marital_status` enum('Single','Married') NOT NULL,
  `emp_gender` enum('Male','Female') NOT NULL,
  `emp_photo` varchar(200) NOT NULL,
  `emp_designation_id` int(11) NOT NULL,
  `emp_type_id` int(11) NOT NULL,
  `group_by` enum('Faculty','Non-Faculty') NOT NULL,
  `emp_branch_id` int(11) NOT NULL,
  `emp_email` varchar(84) NOT NULL,
  `emp_qualification` varchar(50) NOT NULL,
  `emp_passing_year` int(11) NOT NULL,
  `emp_institute_name` varchar(50) NOT NULL,
  `degree_scan_copy` varchar(200) NOT NULL,
  `emp_salary` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`emp_id`, `emp_name`, `emp_father_name`, `emp_cnic`, `emp_contact_no`, `emp_perm_address`, `emp_temp_address`, `emp_marital_status`, `emp_gender`, `emp_photo`, `emp_designation_id`, `emp_type_id`, `group_by`, `emp_branch_id`, `emp_email`, `emp_qualification`, `emp_passing_year`, `emp_institute_name`, `degree_scan_copy`, `emp_salary`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'Nadia Gull', 'Iftikhar Ali', '31303-1234567-8', '+92-123-4567890', 'RYK', 'RYK', 'Single', 'Female', 'uploads/Nadia Gull_emp_photo.jpg', 4, 4, 'Faculty', 5, 'nadiagill285@gmail.com', 'BSCS', 2018, 'Superior College', '', 10000, '2019-01-04 17:39:09', '2018-12-15 13:43:37', 1, 1, 1),
(2, 'Kinza Mustafa', 'Ghulam Mustafa', '45102-3456789-0', '+92-345-6789098', 'ryk', 'ryk', 'Single', 'Female', 'uploads/Kinza Mustafa_emp_photo.jpg', 1, 3, 'Faculty', 5, 'kinza.fatima.522@gmail.com', 'BSCS', 2017, 'IUB', 'uploads/Kinza Mustafa_degree_scan_copy.jpg', 30000, '2019-01-04 17:39:15', '2018-12-15 13:48:54', 1, 1, 1),
(3, 'Asad Hussain', 'Muhammad Ali', '12345-6789987-6', '+23-456-7899876', 'sdfghjkjhgfghjkl;', 'xcvghjklkjhgfdfghjk', 'Single', 'Male', 'uploads/Asad Hussain_emp_photo.jpg', 2, 3, 'Faculty', 5, 'asad@gmail.com', 'BSCS', 2015, 'Fast University', 'uploads/Asad Hussain_degree_scan_copy.jpg', 20000, '2019-01-04 17:39:20', '0000-00-00 00:00:00', 1, 0, 1),
(4, 'Anas Shafqat', 'Shafqat Ali', '31303-0437738-3', '+92-331-7375027', 'Gulshan Iqbal', '', 'Single', 'Male', 'uploads/Anas Shafqat_emp_photo.jpg', 4, 4, 'Faculty', 5, 'anasshafqat01@gmail.com', 'BSCS', 2018, 'Superior Group of Colleges', 'uploads/Anas Shafqat_degree_scan_copy.png', 50000, '2019-01-04 17:39:26', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_reference`
--

CREATE TABLE `emp_reference` (
  `emp_ref_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `ref_name` varchar(50) NOT NULL,
  `ref_contact_no` varchar(15) NOT NULL,
  `ref_cnic` varchar(15) NOT NULL,
  `ref_designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_reference`
--

INSERT INTO `emp_reference` (`emp_ref_id`, `emp_id`, `ref_name`, `ref_contact_no`, `ref_cnic`, `ref_designation`) VALUES
(1, 3, 'Iftikhar ali', '+45-678-9098769', '45678-9098765-4', 'XYZ');

-- --------------------------------------------------------

--
-- Table structure for table `emp_type`
--

CREATE TABLE `emp_type` (
  `emp_type_id` int(11) NOT NULL,
  `emp_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_type`
--

INSERT INTO `emp_type` (`emp_type_id`, `emp_type`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'Daily Wadge', '2018-12-14 07:49:12', '0000-00-00 00:00:00', 1, 0, 1),
(2, 'Weekly Wedge', '2018-12-14 07:49:55', '0000-00-00 00:00:00', 1, 0, 1),
(3, 'Contract', '2018-12-14 07:50:32', '0000-00-00 00:00:00', 1, 0, 1),
(4, 'Permanent ', '2018-12-14 07:52:24', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(80) NOT NULL,
  `event_detail` text NOT NULL,
  `event_start_datetime` datetime NOT NULL,
  `event_end_datetime` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` enum('Active','Inactive') NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_detail`, `event_start_datetime`, `event_end_datetime`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`, `delete_status`) VALUES
(1, 'Last Day', 'Last Day of Janvi', '2015-05-30 00:00:00', '2015-05-30 00:00:00', '2015-05-27 15:34:53', 1, '2015-05-27 15:40:30', 1, 'Inactive', 1),
(2, 'Janvi BDay', 'Happy Birthday Janvi ', '2015-07-05 00:00:00', '2015-07-05 00:00:00', '2015-05-27 15:35:38', 1, '2015-05-27 15:40:48', 1, 'Inactive', 1),
(3, 'Happy Bday', 'HAppy Birthday KarmrajSir', '2015-07-25 00:00:00', '2015-07-25 00:00:00', '2015-05-27 15:36:10', 1, '2015-05-27 15:41:05', 1, 'Inactive', 1),
(4, 'Launching New Application', 'Launch of Edusec Yii2', '2015-06-02 09:30:00', '2015-06-02 10:00:00', '2015-05-27 15:37:00', 1, '2015-05-27 15:39:37', 1, '', 1),
(5, 'Meeting for staff ', 'All Staff Members-Meeting', '2015-06-09 00:00:00', '2015-06-09 00:00:00', '2015-05-27 15:37:42', 1, NULL, NULL, '', 1),
(7, 'Celebration Time', 'Celebration Time', '2015-06-25 00:00:00', '2015-06-25 00:00:00', '2015-05-27 15:39:12', 1, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_transaction_detail`
--

CREATE TABLE `fee_transaction_detail` (
  `fee_trans_detail_id` int(11) NOT NULL,
  `fee_trans_detail_head_id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `fee_amount` double DEFAULT NULL,
  `fee_discount` varchar(100) DEFAULT NULL,
  `discounted_value` double DEFAULT NULL,
  `net_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_transaction_detail`
--

INSERT INTO `fee_transaction_detail` (`fee_trans_detail_id`, `fee_trans_detail_head_id`, `fee_type_id`, `fee_amount`, `fee_discount`, `discounted_value`, `net_total`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 1, 4500, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1),
(2, 1, 2, 10000, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1),
(3, 1, 4, 300, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1),
(4, 1, 6, 1000, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1),
(5, 2, 1, 4500, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1),
(6, 2, 2, 11250, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1),
(7, 2, 3, 400, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1),
(8, 2, 5, 500, NULL, NULL, 0, '2019-01-07 17:03:55', '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_transaction_head`
--

CREATE TABLE `fee_transaction_head` (
  `fee_trans_id` int(11) NOT NULL,
  `class_name_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `std_name` varchar(75) NOT NULL,
  `month` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `total_amount` double NOT NULL,
  `total_discount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `remaining` double NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_transaction_head`
--

INSERT INTO `fee_transaction_head` (`fee_trans_id`, `class_name_id`, `session_id`, `section_id`, `std_id`, `std_name`, `month`, `transaction_date`, `total_amount`, `total_discount`, `paid_amount`, `remaining`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 4, 1, 1, 'Kinza', 1, '2019-01-07 00:00:00', 15600, 200, 0, 0, 'Unpaid', '2019-01-08 16:34:46', '0000-00-00 00:00:00', 0, 0, 1),
(2, 1, 4, 1, 2, 'Nadia', 1, '2019-01-07 00:00:00', 16350, 300, 0, 0, 'Unpaid', '2019-01-08 16:36:36', '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_type`
--

CREATE TABLE `fee_type` (
  `fee_type_id` int(11) NOT NULL,
  `fee_type_name` varchar(64) NOT NULL,
  `fee_type_description` varchar(120) NOT NULL,
  `fee_amount` double DEFAULT NULL,
  `starting_date` datetime DEFAULT NULL,
  `ending_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_type`
--

INSERT INTO `fee_type` (`fee_type_id`, `fee_type_name`, `fee_type_description`, `fee_amount`, `starting_date`, `ending_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'Admission Fee', 'Student have to pay admission fee only one time', 1000, '2015-01-01 11:30:48', '2016-01-01 11:30:48', '2018-11-03 06:36:22', '0000-00-00 00:00:00', 1, 0, 1),
(2, 'Tuition Fee', 'Paid on monthly bases', NULL, NULL, NULL, '2018-11-03 06:48:34', '0000-00-00 00:00:00', 1, 0, 1),
(3, 'Late Fee Fine', 'Pay fine after due date', 100, NULL, NULL, '2018-11-03 06:50:23', '2018-11-03 06:50:23', 1, 1, 1),
(4, 'Absent Fine', 'pay fine when student is absent', 10, NULL, NULL, '2018-11-03 06:51:12', '0000-00-00 00:00:00', 1, 0, 1),
(5, 'Library Fine', 'Pay fine in case of library rules voilation', 50, NULL, NULL, '2018-11-03 06:52:59', '0000-00-00 00:00:00', 1, 0, 1),
(6, 'Transportation Fee', 'Pay when student take transportation service.', 500, '2015-03-01 11:50:03', '2016-01-01 11:55:03', '2018-11-03 06:54:41', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `institute_id` int(11) NOT NULL,
  `institute_name` varchar(65) NOT NULL,
  `institute_logo` varchar(200) NOT NULL,
  `institute_account_no` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`institute_id`, `institute_name`, `institute_logo`, `institute_account_no`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(2, 'BROOKFIELD GROUP OF COLLEGES', '', ' 0190 002 2965 3403 UBL Shahi Road, RYK', '2019-01-08 08:12:22', '0000-00-00 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1538846625),
('m130524_201442_init', 1538846629);

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `month_id` int(11) NOT NULL,
  `month_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'Fabruary'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `msg_of_day`
--

CREATE TABLE `msg_of_day` (
  `msg_of_day_id` int(11) NOT NULL,
  `msg_details` varchar(100) NOT NULL,
  `msg_user_type` enum('Students','Parents','Employees','Others') NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` enum('Active','Inactive') NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg_of_day`
--

INSERT INTO `msg_of_day` (`msg_of_day_id`, `msg_details`, `msg_user_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`, `delete_status`) VALUES
(1, 'Each Day is a GIFT don\'t send it BACK unopened.  Have a nice Day !', 'Students', '2015-05-27 15:21:01', 1, NULL, NULL, 'Active', 1),
(2, 'Every day may not be GOOD but there is something GOOD in every day.', 'Parents', '2015-05-27 15:21:22', 1, NULL, NULL, 'Active', 1),
(3, 'Every ONE wants happiness, No ONE needs pain, But its not possible to get a rainbow.', 'Employees', '2015-05-27 15:21:41', 1, NULL, NULL, 'Active', 1),
(4, 'Smile is the Electricity and Life is a Battery whenever you Smile the Battery gets Charges.', 'Students', '2015-05-27 15:21:59', 1, '2018-12-26 18:11:26', 1, 'Active', 1),
(5, 'The Best for the Group comes when everyone in the group does what’s best for himself AND the group.', 'Students', '2015-05-27 15:22:20', 1, NULL, NULL, 'Active', 1),
(6, 'In life, as in football, you won\'t go far unless you know where the goalposts are.-- Arnold Glasow', 'Students', '2015-05-27 15:24:54', 1, '2018-12-26 18:11:18', 1, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(25) NOT NULL,
  `notice_description` text,
  `notice_user_type` enum('Students','Parents','Employees','Others') NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` enum('Active','Inactive') NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_description`, `notice_user_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`, `delete_status`) VALUES
(1, 'Next Week Summer Exam ', 'Summer Exam will be conducted on Next week. All The Best', 'Students', '2015-05-27 15:26:29', 1, '2018-12-26 18:44:07', 1, 'Active', 1),
(2, 'Monthly Report', 'All Employee have to submit their report on month end.', 'Employees', '2015-05-27 15:27:23', 1, '2018-12-26 18:43:37', 1, 'Active', 1),
(3, 'Summer Vacation', 'Summer Vacation starts from June to  2nd week of July.', 'Students', '2015-05-27 15:28:37', 1, '2018-12-26 18:44:16', 1, 'Inactive', 1),
(4, 'Attendance Report', 'All Employees collect their class wise  attendance report', 'Employees', '2015-05-27 15:30:35', 1, '2018-12-26 18:44:19', 1, 'Active', 1),
(5, 'Exam From Fill', 'All Students come and fill their exam forms', 'Students', '2015-05-27 15:33:07', 1, '2018-12-26 18:44:03', 1, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL,
  `sms_name` varchar(120) NOT NULL,
  `sms_template` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_academic_info`
--

CREATE TABLE `std_academic_info` (
  `academic_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `class_name_id` int(11) NOT NULL,
  `subject_combination` varchar(100) NOT NULL,
  `previous_class` varchar(50) NOT NULL,
  `passing_year` varchar(32) NOT NULL,
  `previous_class_rollno` int(11) NOT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `obtained_marks` int(11) DEFAULT NULL,
  `grades` enum('A+','A','B','C','D','E','F') DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `Institute` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_academic_info`
--

INSERT INTO `std_academic_info` (`academic_id`, `std_id`, `class_name_id`, `subject_combination`, `previous_class`, `passing_year`, `previous_class_rollno`, `total_marks`, `obtained_marks`, `grades`, `percentage`, `Institute`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 3, 7, '', 'FSC - Pre-Medical', '2017', 0, 1100, 860, 'A', 78.181818181818, 'DexDevs', '2018-12-26 10:18:51', '2018-12-26 10:18:51', 1, 1, 1),
(2, 1, 9, '', 'BSC - Double Computer-Math (Part - I)', '2017', 0, 505, 400, 'A', 89, 'DexDevs', '2018-12-26 10:13:22', '2018-12-26 10:13:22', 1, 1, 1),
(3, 2, 3, '', 'Matric', '2017', 0, 1100, 980, 'A+', 89.090909090909, 'Govt Girls High School', '2018-12-26 10:14:44', '2018-12-26 10:14:44', 1, 1, 1),
(4, 9, 9, '', 'BSC - Double Computer-Math (Part - I)', '2017', 0, 400, 300, 'A', 75, 'XYZ', '2018-12-26 10:16:52', '2018-12-26 10:16:52', 1, 1, 1),
(5, 10, 5, '', 'Matric', '2018', 0, 1100, 950, 'A', 86.363636363636, 'Comprisensive Govt School', '2019-01-03 11:45:25', '0000-00-00 00:00:00', 1, 0, 1),
(6, 11, 1, '', '10th', '2018', 0, 1100, 780, '', 70.909090909091, 'ABC', '2019-01-06 15:19:03', '0000-00-00 00:00:00', 1, 0, 1),
(7, 12, 1, '', 'metric', '2018', 0, 1100, 800, '', 72.727272727273, 'XYZ', '2019-01-06 15:39:40', '0000-00-00 00:00:00', 1, 0, 1),
(8, 13, 5, '', '10th', '2017', 0, 1100, 780, '', 70.909090909091, 'PQRS', '2019-01-06 15:52:57', '0000-00-00 00:00:00', 1, 0, 1),
(9, 14, 5, '', '10th', '2017', 0, 1100, 800, '', 72.727272727273, 'PQRS', '2019-01-06 15:59:29', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_attendance`
--

CREATE TABLE `std_attendance` (
  `std_attend_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_name_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_class`
--

CREATE TABLE `std_class` (
  `class_id` int(11) NOT NULL,
  `class_name_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_class`
--

INSERT INTO `std_class` (`class_id`, `class_name_id`, `session_id`, `section_id`, `class_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 2, 4, 2, 'FSC Pre-Medical (Part - II)-2018 - 2020 -MG-2', '2019-01-04 17:26:02', '0000-00-00 00:00:00', 1, 0, 1),
(2, 5, 4, 4, 'ICS (Part - I)-2018 - 2020 -CG-1', '2019-01-04 17:26:37', '0000-00-00 00:00:00', 1, 0, 1),
(3, 6, 4, 5, 'ICS (Part - II)-2018 - 2020 -CB-2', '2019-01-04 17:27:01', '0000-00-00 00:00:00', 1, 0, 1),
(4, 1, 4, 3, 'FSC Pre-Medical (Part - I)-2018 - 2020 -MB-1', '2019-01-04 17:27:28', '0000-00-00 00:00:00', 1, 0, 1),
(5, 1, 4, 1, 'FSC Pre-Medical (Part - I)-2018 - 2020 -MG-1', '2019-01-04 17:28:04', '0000-00-00 00:00:00', 1, 0, 1),
(6, 3, 4, 6, 'FSC Pre-Engineering (Part - I)-2018 - 2020 -EG-1', '2019-01-04 17:31:15', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_class_name`
--

CREATE TABLE `std_class_name` (
  `class_name_id` int(11) NOT NULL,
  `class_name` varchar(120) NOT NULL,
  `class_name_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_class_name`
--

INSERT INTO `std_class_name` (`class_name_id`, `class_name`, `class_name_description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'FSC Pre-Medical (Part - I)', 'Intermediate FSC Pre-Medical (Part - I)', '2018-12-26 09:45:54', '2018-12-26 09:45:54', 1, 1, 1),
(2, 'FSC Pre-Medical (Part - II)', 'Intermediate FSC Pre-Medical (Part - II)', '2018-12-26 09:46:55', '2018-12-26 09:46:55', 1, 1, 1),
(3, 'FSC Pre-Engineering (Part - I)', 'Intermediate FSC Pre-Engineering (Part - I)', '2018-12-26 09:47:39', '2018-12-26 09:47:39', 1, 1, 1),
(4, 'FSC Pre-Engineering (Part - II)', 'Intermediate FSC Pre-Engineering (Part - II)', '2018-12-26 09:48:09', '2018-12-26 09:48:09', 1, 1, 1),
(5, 'ICS (Part - I)', 'Intermediate ICS (Part - I)', '2018-12-26 09:48:46', '2018-12-26 09:48:46', 1, 1, 1),
(6, 'ICS (Part - II)', 'Intermediate ICS (Part - II)', '2018-12-26 09:49:18', '2018-12-26 09:49:18', 1, 1, 1),
(7, 'BSC - ZBC (Part - I)', 'Bachelor BSC - ZBC (Part - I)', '2018-12-26 09:50:48', '2018-12-26 09:50:48', 1, 1, 1),
(8, 'BSC - Double Computer-Math (Part - I)', 'Bachelor BSC - Double Computer-Math (Part - I)', '2018-12-26 10:10:58', '2018-12-26 10:10:58', 1, 1, 1),
(9, 'BSC - Double Computer-Math (Part - II)', 'Bachelor 	BSC - Double Computer-Math (Part - II)', '2018-12-26 10:11:24', '2018-12-26 10:11:24', 1, 1, 1),
(11, 'xyz', 'dsfsd', '2018-12-31 11:54:57', '2018-12-31 11:54:57', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `std_enrollment_detail`
--

CREATE TABLE `std_enrollment_detail` (
  `std_enroll_detail_id` int(11) NOT NULL,
  `std_enroll_detail_head_id` int(11) NOT NULL,
  `std_enroll_detail_std_id` int(11) NOT NULL,
  `std_enroll_detail_std_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_enrollment_detail`
--

INSERT INTO `std_enrollment_detail` (`std_enroll_detail_id`, `std_enroll_detail_head_id`, `std_enroll_detail_std_id`, `std_enroll_detail_std_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 1, 'Kinza', '2019-01-04 17:32:21', '0000-00-00 00:00:00', 1, 0, 1),
(2, 1, 2, 'Nadia', '2019-01-04 17:32:21', '0000-00-00 00:00:00', 1, 0, 1),
(3, 2, 3, 'Noman', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1),
(4, 2, 4, 'Ali', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1),
(5, 2, 5, 'Hamza', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1),
(6, 2, 6, 'Qasim', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1),
(7, 2, 7, 'Anas Shafqat', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1),
(8, 2, 8, 'Zia Ali', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1),
(9, 2, 9, 'Ali Naveed', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1),
(10, 2, 10, 'M. Rehan', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_enrollment_head`
--

CREATE TABLE `std_enrollment_head` (
  `std_enroll_head_id` int(11) NOT NULL,
  `class_name_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `std_enroll_head_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_enrollment_head`
--

INSERT INTO `std_enrollment_head` (`std_enroll_head_id`, `class_name_id`, `session_id`, `section_id`, `std_enroll_head_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 4, 1, 'FSC Pre-Medical (Part - I)-2018 - 2020 -MG-1', '2019-01-04 17:32:21', '0000-00-00 00:00:00', 1, 0, 1),
(2, 5, 4, 5, 'ICS (Part - I)-2018 - 2020 -CB-2', '2019-01-04 17:33:12', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_details`
--

CREATE TABLE `std_fee_details` (
  `fee_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `admission_fee` double NOT NULL,
  `addmission_fee_discount` double NOT NULL,
  `net_addmission_fee` double NOT NULL,
  `fee_category` enum('Annual','Semester') NOT NULL,
  `concession_id` int(11) NOT NULL,
  `no_of_installment` int(11) NOT NULL,
  `tuition_fee` double NOT NULL,
  `net_tuition_fee` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_fee_details`
--

INSERT INTO `std_fee_details` (`fee_id`, `std_id`, `admission_fee`, `addmission_fee_discount`, `net_addmission_fee`, `fee_category`, `concession_id`, `no_of_installment`, `tuition_fee`, `net_tuition_fee`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 8, 5000, 400, 4600, 'Annual', 3, 4, 40000, 10000, '2018-12-22 09:15:04', '0000-00-00 00:00:00', 0, 0, 1),
(2, 1, 5000, 500, 4500, 'Annual', 2, 4, 40000, 10000, '2018-12-26 10:33:40', '0000-00-00 00:00:00', 0, 0, 1),
(3, 2, 5000, 500, 4500, 'Annual', 2, 4, 45000, 11250, '2018-12-26 10:36:24', '0000-00-00 00:00:00', 0, 0, 1),
(4, 4, 5000, 100, 4900, 'Annual', 2, 4, 40000, 10000, '2019-01-03 10:32:48', '0000-00-00 00:00:00', 0, 0, 1),
(5, 3, 6000, 200, 5800, 'Annual', 3, 3, 45000, 15000, '2019-01-03 10:33:47', '0000-00-00 00:00:00', 0, 0, 1),
(6, 5, 5000, 300, 4700, 'Annual', 1, 1, 10, 10, '2019-01-03 10:35:25', '0000-00-00 00:00:00', 0, 0, 1),
(7, 6, 5000, 400, 4600, 'Annual', 2, 4, 50000, 12500, '2019-01-03 10:37:14', '0000-00-00 00:00:00', 0, 0, 1),
(8, 7, 2000, 200, 1800, 'Annual', 4, 3, 30000, 10000, '2019-01-03 10:43:08', '0000-00-00 00:00:00', 0, 0, 1),
(9, 10, 5000, 500, 4500, 'Annual', 4, 4, 40000, 10000, '2019-01-03 11:45:25', '0000-00-00 00:00:00', 1, 0, 1),
(10, 9, 5000, 600, 4400, 'Annual', 1, 1, 10, 10, '2019-01-05 17:58:43', '0000-00-00 00:00:00', 0, 0, 1),
(11, 11, 5000, 300, 4700, 'Annual', 2, 4, 50000, 12500, '2019-01-06 15:19:03', '0000-00-00 00:00:00', 1, 0, 1),
(12, 12, 5000, 400, 4600, 'Annual', 2, 4, 40000, 10000, '2019-01-06 15:39:41', '0000-00-00 00:00:00', 1, 0, 1),
(13, 13, 5000, 700, 4300, 'Annual', 3, 3, 40500, 13500, '2019-01-06 15:52:57', '0000-00-00 00:00:00', 1, 0, 1),
(14, 14, 5000, 400, 4600, 'Annual', 3, 4, 40800, 10200, '2019-01-06 15:59:29', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_pkg`
--

CREATE TABLE `std_fee_pkg` (
  `std_fee_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `admission_fee` double NOT NULL,
  `tutuion_fee` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_fee_pkg`
--

INSERT INTO `std_fee_pkg` (`std_fee_id`, `session_id`, `class_id`, `admission_fee`, `tutuion_fee`, `created_at`, `created_by`, `updated_at`, `updated_by`, `delete_status`) VALUES
(1, 4, 1, 10000, 70000, '2019-01-06 16:13:28', 1, '0000-00-00 00:00:00', 0, 1),
(2, 4, 2, 5000, 70000, '2019-01-06 16:13:36', 1, '0000-00-00 00:00:00', 0, 1),
(3, 4, 3, 10000, 60000, '2019-01-06 16:13:42', 1, '0000-00-00 00:00:00', 0, 1),
(4, 4, 4, 5000, 60000, '2019-01-06 16:13:48', 1, '0000-00-00 00:00:00', 0, 1),
(5, 4, 5, 10000, 60000, '2019-01-06 16:13:53', 1, '0000-00-00 00:00:00', 0, 1),
(6, 4, 6, 5000, 60000, '2019-01-06 16:13:58', 1, '0000-00-00 00:00:00', 0, 1),
(7, 4, 7, 10000, 65000, '2019-01-06 16:14:04', 1, '0000-00-00 00:00:00', 0, 1),
(8, 4, 8, 10000, 65000, '2019-01-06 16:14:10', 1, '0000-00-00 00:00:00', 0, 1),
(9, 4, 9, 5000, 65000, '2019-01-06 16:14:16', 1, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_guardian_info`
--

CREATE TABLE `std_guardian_info` (
  `std_guardian_info_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `guardian_relation` varchar(50) NOT NULL,
  `guardian_cnic` varchar(15) NOT NULL,
  `guardian_email` varchar(84) NOT NULL,
  `guardian_contact_no_1` varchar(15) NOT NULL,
  `guardian_contact_no_2` varchar(15) NOT NULL,
  `guardian_monthly_income` int(11) NOT NULL,
  `guardian_occupation` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_guardian_info`
--

INSERT INTO `std_guardian_info` (`std_guardian_info_id`, `std_id`, `guardian_name`, `guardian_relation`, `guardian_cnic`, `guardian_email`, `guardian_contact_no_1`, `guardian_contact_no_2`, `guardian_monthly_income`, `guardian_occupation`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 'G Mustafa', 'Father', '12345-6789123-4', 'abu@gmail.com', '+92-306-3772105', '+12-345-6789123', 30000, 'Businessmen', '2018-12-30 10:36:06', '0000-00-00 00:00:00', 1, 0, 1),
(2, 2, 'Iftkhar', 'Rehman', '12345-6789123-4', 'abu@gmail.com', '+92-331-7375027', '+12-345-6789123', 0, 'sddd', '2018-12-30 10:36:24', '0000-00-00 00:00:00', 1, 0, 1),
(3, 3, 'Ali', 'Father', '12345-6787545-6', 'ali@gmail.com', '', '+34-567-8987456', 0, 'xyz', '2018-12-30 14:55:07', '0000-00-00 00:00:00', 1, 0, 1),
(4, 9, 'Naveed Anjum', 'Father', '12345-6789098-7', 'Naveed@gmail.com', '', '+92-123-4567876', 0, 'abc', '2018-12-30 14:55:12', '0000-00-00 00:00:00', 1, 0, 1),
(5, 10, 'M. Arshad', 'Father', '31303-0388634-5', 'arshad@gmail.com', '+92-305-6466494', '+92-894-6161333', 50000, 'Self Employee', '2019-01-03 11:45:25', '0000-00-00 00:00:00', 1, 0, 1),
(6, 11, 'Muhammad Ameen', 'Father', '34567-8987654-5', 'ameen@gmail.com', '+45-678-7654567', '+34-567-8765434', 15000, 'govt employee', '2019-01-06 15:19:03', '0000-00-00 00:00:00', 1, 0, 1),
(7, 12, 'Asmat Ara', 'Mother', '23456-7890987-6', 'asmat@gmail.com', '+43-234-5678909', '+34-567-8987654', 12000, 'house wife', '2019-01-06 15:39:40', '0000-00-00 00:00:00', 1, 0, 1),
(8, 13, 'Muhammed Ameen', 'Father', '34567-8987656-7', 'ameenn@gmail.com', '+45-678-9098765', '+76-545-6789098', 50000, 'asd', '2019-01-06 15:52:57', '0000-00-00 00:00:00', 1, 0, 1),
(9, 14, 'Muhammed Ameen', 'Father', '87654-3456789-8', 'ameenn@gmail.com', '+34-567-8987654', '+23-456-7898765', 30000, 'private bussiness', '2019-01-06 15:59:29', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_ice_info`
--

CREATE TABLE `std_ice_info` (
  `std_ice_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `std_ice_name` varchar(64) NOT NULL,
  `std_ice_relation` varchar(64) NOT NULL,
  `std_ice_contact_no` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_ice_info`
--

INSERT INTO `std_ice_info` (`std_ice_id`, `std_id`, `std_ice_name`, `std_ice_relation`, `std_ice_contact_no`, `created_at`, `created_by`, `updated_at`, `updated_by`, `delete_status`) VALUES
(1, 2, 'Ahmed', 'Mamu', '345678909876', '2019-01-06 15:11:41', 0, '0000-00-00 00:00:00', 0, 1),
(2, 14, 'Usman', 'Chachu', '456776567876', '2019-01-06 16:07:06', 1, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_personal_info`
--

CREATE TABLE `std_personal_info` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_father_name` varchar(50) NOT NULL,
  `std_contact_no` varchar(15) NOT NULL,
  `std_DOB` date NOT NULL,
  `std_gender` enum('Male','Female') NOT NULL,
  `std_permanent_address` varchar(255) NOT NULL,
  `std_temporary_address` varchar(255) NOT NULL,
  `std_email` varchar(84) NOT NULL,
  `std_photo` varchar(200) NOT NULL,
  `std_b_form` varchar(255) NOT NULL,
  `std_district` varchar(50) NOT NULL,
  `std_religion` varchar(50) NOT NULL,
  `std_nationality` varchar(50) NOT NULL,
  `std_tehseel` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_personal_info`
--

INSERT INTO `std_personal_info` (`std_id`, `std_name`, `std_father_name`, `std_contact_no`, `std_DOB`, `std_gender`, `std_permanent_address`, `std_temporary_address`, `std_email`, `std_photo`, `std_b_form`, `std_district`, `std_religion`, `std_nationality`, `std_tehseel`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'Kinza', 'Mustafa Ali', '+12-345-6789098', '0000-00-00', 'Female', 'RYK', 'RYK', 'kinza@gmail.com', '', '12345-1234567-1', 'RYK', 'Islam', 'Pakistani', 'RYK', '2018-11-07 07:34:30', '2018-11-07 07:34:30', 1, 1, 1),
(2, 'Nadia', 'Iftikhar Ali', '+12-345-6789009', '2018-10-29', 'Female', 'RYK', 'RYK', 'nadia@gmail.com', '', '12345-6789123-4', 'RYK', 'RYK', 'Pakistan', 'Islam', '2018-11-05 16:48:57', '2018-11-05 16:48:57', 1, 1, 1),
(3, 'Noman', 'Shahid', '+12-345-6789123', '2018-10-10', 'Male', 'RYK', 'RYK', 'nomi@gmail.com', '', '12345-6789123-4', 'RYK', 'Islam', 'Pakistani', 'RYK', '2018-11-05 16:52:56', '2018-11-05 16:52:56', 1, 1, 1),
(4, 'Ali', '', '+56-234-6789098', '2018-10-27', 'Male', 'seuh', 'hggyu', 'hiuuhi', '', '23456-7890987-6', 'jbjbj', 'knk', 'jjj', 'jhjh', '2018-10-27 08:21:09', '0000-00-00 00:00:00', 1, 0, 1),
(5, 'Hamza', '', '+35-678-9009876', '2018-10-27', 'Male', 'tghjk', 'lkokjo', '4567kpok', 'uploads/Hamza_photo.jpg', '23678-7654345-6', 'dfhjk', 'jojoj', 'jjoijho', 'hukhukhk', '2018-11-01 06:49:57', '2018-11-01 06:49:57', 1, 1, 1),
(6, 'Qasim', '', '+38-909-8765445', '2018-10-27', 'Male', 'dtrjhhi iyhiuh ', 'huihuii uihui', 'hiuhuihuiu', '', '23678-8765434-5', 'vhg ghjhl ', 'u uiuigug ', 'gyugfu gyuguilui ', 'yuyugul gygyugul ', '2018-10-27 08:22:15', '0000-00-00 00:00:00', 1, 0, 1),
(7, 'Anas Shafqat', '', '+92-331-7375027', '2018-10-27', 'Male', 'Gulshan Iqbal, Rahim Yar Khan', 'Gulshan Iqbal, Rahim Yar Khan', 'ihuih ', 'uploads/Anas Shafqat_photo.jpg', '23467-8987655-6', 'drtyu ', 'yhiopjh iuhui ', 'rtyuijhh ', 'tyguhjioog', '2018-11-01 06:48:42', '2018-11-01 06:48:42', 1, 1, 1),
(8, 'Zia Ali', 'Ali Ahmed', '+12-345-6789098', '2009-06-09', 'Male', 'Gulshan Iqbal, Rahim Yar Khan', 'Gulshan Iqbal, Rahim Yar Khan', 'zia@gmail.com', 'uploads/Zia Ali_photo.jpg', '12345-6789876-5', 'Rahim Yar Khan', 'Islam', 'Pakistani', 'Rahim Yar Khan', '2018-11-05 16:42:39', '2018-11-05 16:42:39', 1, 1, 1),
(9, 'Ali Naveed', 'Naveed Anjum', '+12-345-6789098', '2018-11-03', 'Male', 'mnhgbfdsfvbghgfd', '', 'sdfghjkllkjhgvc', 'uploads/Ali Naveed_photo.jpg', '23456-7890987-6', 'RYK', 'Islam', 'Pakistani', 'RKY', '2018-11-03 05:53:46', '0000-00-00 00:00:00', 1, 0, 1),
(10, 'M. Rehan', 'M. Arshad', '+92-306-3772105', '1992-04-03', 'Male', 'Rahim Yar Khan', 'Rahim Yar Khan', 'rehan@gmail.com', 'uploads/M. Rehan_photo.png', '31303-8898966-5', 'Rahim Yar Khan', 'Islam', 'Pakistani', 'Rahim Yar Khan', '2019-01-03 11:45:25', '0000-00-00 00:00:00', 1, 0, 1),
(11, 'Aisha Ameen', 'Muhammad Ameen', '', '1991-01-01', 'Female', 'sdfghjkjhg678', 'xcvbnjmklkjhg6789', 'aisha@gmail.com', 'uploads/Aisha Ameen_photo.png', '34567-8765456-7', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-01-06 15:19:03', '0000-00-00 00:00:00', 1, 0, 1),
(12, 'Aniqa Gull', 'Iftikhar Ali', '+92-456-7898765', '2019-01-06', 'Female', 'uytfdfghujio', 'fdfghjkl', 'aniqa@gmail.com', 'uploads/Aniqa Gull_photo.png', '34567-8987654-5', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-01-06 15:39:40', '0000-00-00 00:00:00', 1, 0, 1),
(13, 'Faheem Ameen', 'Muhammed Ameen', '+23-456-7898765', '2019-01-06', 'Male', 'ghjkkjhgfdvbn', 'ddtyuioiuytr', 'faheem@gmail.com', 'uploads/Faheem Ameen_photo.jpg', '23456-7898765-4', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-01-06 15:52:57', '0000-00-00 00:00:00', 1, 0, 1),
(14, 'Faheem Ameen', 'Muhammed Ameen', '+92-123-4567898', '2019-01-06', 'Male', 'dfghjkjhgfd', 'ghjkkjhgfd', 'faheem@gmail.com', 'uploads/Faheem Ameen_photo.jpg', '54456-7898765-4', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-01-06 15:59:29', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_sections`
--

CREATE TABLE `std_sections` (
  `section_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `section_description` varchar(100) NOT NULL,
  `section_intake` int(11) NOT NULL,
  `section_subjects` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_sections`
--

INSERT INTO `std_sections` (`section_id`, `session_id`, `section_name`, `section_description`, `section_intake`, `section_subjects`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 4, 'MG-1', 'Medical Girls Part-I', 25, 1, '2019-01-04 16:53:01', '2019-01-04 16:53:01', 1, 1, 1),
(2, 4, 'MG-2', 'Medical Girls Part-II', 25, 2, '2019-01-04 16:51:37', '0000-00-00 00:00:00', 1, 0, 1),
(3, 4, 'MB-1', 'Medical Boys Part-I', 30, 1, '2019-01-04 16:53:25', '2019-01-04 16:53:25', 1, 1, 1),
(4, 4, 'CG-1', 'Computer Girls Part-I', 26, 5, '2019-01-04 16:57:19', '0000-00-00 00:00:00', 1, 0, 1),
(5, 4, 'CB-2', 'Computer Boys Part-II', 25, 6, '2019-01-04 17:01:06', '0000-00-00 00:00:00', 1, 0, 1),
(6, 4, 'EG-1', 'Engineering Girls Part-I', 30, 3, '2019-01-04 17:30:33', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_sessions`
--

CREATE TABLE `std_sessions` (
  `session_id` int(11) NOT NULL,
  `session_branch_id` int(11) NOT NULL,
  `session_name` varchar(32) NOT NULL,
  `session_start_date` date NOT NULL,
  `session_end_date` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_sessions`
--

INSERT INTO `std_sessions` (`session_id`, `session_branch_id`, `session_name`, `session_start_date`, `session_end_date`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(4, 5, '2018 - 2020 ', '2018-05-01', '2020-05-01', 'Active', '2019-01-03 11:18:28', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_subjects`
--

CREATE TABLE `std_subjects` (
  `std_subject_id` int(11) NOT NULL,
  `std_subject_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_subjects`
--

INSERT INTO `std_subjects` (`std_subject_id`, `std_subject_name`) VALUES
(1, 'Biology I,Chemistry I,Physics I,English A, English B, Urdu A, Urdu B, Islamiyat'),
(2, 'Biology II,Chemistry II,Physics II,English A, English B, Urdu A, Urdu B, Pak-Studies'),
(3, 'Math I,Chemistry I,Physics I,English A, English B, Urdu A, Urdu B, Islamiya'),
(4, 'Math II,Chemistry II,Physics II,English A, English B, Urdu A, Urdu B, Pak-Studies'),
(5, 'Computer I,Math I,Physics I,English A, English B, Urdu A, Urdu B, Islamiya'),
(6, 'Computer II,Math II,Physics II,English A, English B, Urdu A, Urdu B, Pak-Studies'),
(7, 'Computer I,Statistics I,Economics I,English A, English B, Urdu A, Urdu B, Islamiya'),
(8, 'Computer II,Statistics II,Economics II,English A, English B, Urdu A, Urdu B, Pak-studies');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(32) NOT NULL,
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

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'Maths', 'Intermediate Mathematics', '2019-01-04 06:23:21', '0000-00-00 00:00:00', 0, 0, 1),
(2, 'English-A', '', '2018-12-03 15:02:31', '0000-00-00 00:00:00', 0, 0, 1),
(3, 'Urdu-A', '', '2018-12-03 15:02:48', '0000-00-00 00:00:00', 0, 0, 1),
(4, 'Physics', '', '2018-10-27 16:26:14', '0000-00-00 00:00:00', 0, 0, 1),
(5, 'Biology', '', '2018-11-05 17:32:33', '0000-00-00 00:00:00', 0, 0, 1),
(6, 'Islamiyat', '', '2018-12-03 15:01:55', '0000-00-00 00:00:00', 0, 0, 1),
(7, 'Computer', '', '2018-12-03 15:02:12', '0000-00-00 00:00:00', 0, 0, 1),
(8, 'Chemistry', '', '2018-12-31 11:57:16', '0000-00-00 00:00:00', 0, 0, 1),
(9, 'Social Studies', '', '2018-12-31 11:57:46', '2018-12-31 11:57:46', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject_assign_detail`
--

CREATE TABLE `teacher_subject_assign_detail` (
  `teacher_subject_assign_detail_id` int(11) NOT NULL,
  `teacher_subject_assign_detail_head_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `no_of_lecture` enum('1 Lecture','2 Lectures','3 Lectures','4 Lectures','5 Lectures','6 Lectures','Full Week') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject_assign_detail`
--

INSERT INTO `teacher_subject_assign_detail` (`teacher_subject_assign_detail_id`, `teacher_subject_assign_detail_head_id`, `class_id`, `subject_id`, `no_of_lecture`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 2, 1, '1 Lecture', '2018-12-17 06:29:44', '0000-00-00 00:00:00', 1, 0, 1),
(2, 1, 2, 2, '1 Lecture', '2018-12-17 06:29:44', '0000-00-00 00:00:00', 1, 0, 1),
(3, 1, 2, 3, '1 Lecture', '2018-12-17 06:29:44', '0000-00-00 00:00:00', 1, 0, 1),
(4, 1, 2, 4, '1 Lecture', '2018-12-17 06:29:45', '0000-00-00 00:00:00', 1, 0, 1),
(5, 1, 2, 5, '1 Lecture', '2018-12-17 06:29:45', '0000-00-00 00:00:00', 1, 0, 1),
(6, 1, 2, 6, '1 Lecture', '2018-12-17 06:29:45', '0000-00-00 00:00:00', 1, 0, 1),
(7, 1, 2, 7, '1 Lecture', '2018-12-17 06:29:45', '0000-00-00 00:00:00', 1, 0, 1),
(8, 2, 3, 1, '1 Lecture', '2018-12-26 07:50:59', '0000-00-00 00:00:00', 1, 0, 1),
(9, 2, 3, 4, '1 Lecture', '2018-12-26 07:50:59', '0000-00-00 00:00:00', 1, 0, 1),
(10, 2, 3, 7, '1 Lecture', '2018-12-26 07:50:59', '0000-00-00 00:00:00', 1, 0, 1),
(11, 3, 5, 4, '1 Lecture', '2019-01-04 07:40:29', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject_assign_head`
--

CREATE TABLE `teacher_subject_assign_head` (
  `teacher_subject_assign_head_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teacher_subject_assign_head_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject_assign_head`
--

INSERT INTO `teacher_subject_assign_head` (`teacher_subject_assign_head_id`, `teacher_id`, `teacher_subject_assign_head_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 'Nadia Gull', '2018-12-17 06:29:44', '0000-00-00 00:00:00', 1, 0, 1),
(2, 3, 'Asad Hussain', '2018-12-26 07:50:59', '0000-00-00 00:00:00', 1, 0, 1),
(3, 3, 'Asad Hussain', '2019-01-04 07:40:29', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'sbuQbFqUQaaweB1Z-0Uj9pX4l1O3AMSu', '$2y$13$uKEhJ4s7pPEeZzYnZeEwYOyTYJCpQhSm.NKSgkeJcpWFBe0iqnu6a', NULL, 'admin@dexdevs.com', 10, 1538846711, 1538846711),
(2, 'Nadia Gull', 'gQfgRy6bOrf6c0rA3GcHbJ8NBBkNOvav', '$2y$13$jZNfJkMzYUgfTOKlS4/J5OGCYddtOkPUX4HuDldfO42z4QehkAnnS', 'BQQPywNyB5CLu8tQB6fdmSq7JAQpVUSQ_1544169305', 'nadiagull285@gmail.com', 10, 1544164564, 1544169305),
(3, 'kinza', '49-7nkeRO0S1DiJufMw2Z_03csIPfFKv', '$2y$13$GsKlW7WedO19nhEeSeELruQiVbrcn3fkw2cKDvun9.bw7qfQElrRW', NULL, 'kinza.fatima.522@gmail.com', 10, 1544420311, 1544420311),
(4, 'anas', 'r_IlA2UFtjJd9CVfr-EOcjBPtHvTPLNF', '$2y$13$ngUV4J2RIM/TAxYqyts4N.80LJ99YfakZDeRFCxEAPn2sIOAFIvRK', NULL, 'anasshafqat01@gmail.com', 10, 1545816011, 1545816089);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `concession`
--
ALTER TABLE `concession`
  ADD PRIMARY KEY (`concession_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`emial_id`);

--
-- Indexes for table `emp_designation`
--
ALTER TABLE `emp_designation`
  ADD PRIMARY KEY (`emp_designation_id`);

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_designation_id` (`emp_designation_id`),
  ADD KEY `emp_branch_id` (`emp_branch_id`),
  ADD KEY `emp_type_id` (`emp_type_id`);

--
-- Indexes for table `emp_reference`
--
ALTER TABLE `emp_reference`
  ADD PRIMARY KEY (`emp_ref_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `emp_type`
--
ALTER TABLE `emp_type`
  ADD PRIMARY KEY (`emp_type_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `fee_transaction_detail`
--
ALTER TABLE `fee_transaction_detail`
  ADD PRIMARY KEY (`fee_trans_detail_id`),
  ADD KEY `fee_trans_detail_head_id` (`fee_trans_detail_head_id`),
  ADD KEY `fee_type_id` (`fee_type_id`);

--
-- Indexes for table `fee_transaction_head`
--
ALTER TABLE `fee_transaction_head`
  ADD PRIMARY KEY (`fee_trans_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `month_id` (`month`),
  ADD KEY `class_name_id` (`class_name_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `fee_type`
--
ALTER TABLE `fee_type`
  ADD PRIMARY KEY (`fee_type_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
  ADD PRIMARY KEY (`msg_of_day_id`),
  ADD UNIQUE KEY `msg_details` (`msg_details`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `std_academic_info`
--
ALTER TABLE `std_academic_info`
  ADD PRIMARY KEY (`academic_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `class_name_id` (`class_name_id`);

--
-- Indexes for table `std_attendance`
--
ALTER TABLE `std_attendance`
  ADD PRIMARY KEY (`std_attend_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`class_name_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `std_class`
--
ALTER TABLE `std_class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_name_id` (`class_name_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `std_class_name`
--
ALTER TABLE `std_class_name`
  ADD PRIMARY KEY (`class_name_id`);

--
-- Indexes for table `std_enrollment_detail`
--
ALTER TABLE `std_enrollment_detail`
  ADD PRIMARY KEY (`std_enroll_detail_id`),
  ADD KEY `std_enroll_detail_head_id` (`std_enroll_detail_head_id`),
  ADD KEY `std_enroll_detail_std_id` (`std_enroll_detail_std_id`);

--
-- Indexes for table `std_enrollment_head`
--
ALTER TABLE `std_enrollment_head`
  ADD PRIMARY KEY (`std_enroll_head_id`),
  ADD KEY `class_name_id` (`class_name_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `concession_id` (`concession_id`);

--
-- Indexes for table `std_fee_pkg`
--
ALTER TABLE `std_fee_pkg`
  ADD PRIMARY KEY (`std_fee_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `std_guardian_info`
--
ALTER TABLE `std_guardian_info`
  ADD PRIMARY KEY (`std_guardian_info_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_ice_info`
--
ALTER TABLE `std_ice_info`
  ADD PRIMARY KEY (`std_ice_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_personal_info`
--
ALTER TABLE `std_personal_info`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `std_sections`
--
ALTER TABLE `std_sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `section_subjects` (`section_subjects`);

--
-- Indexes for table `std_sessions`
--
ALTER TABLE `std_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_branch_id` (`session_branch_id`);

--
-- Indexes for table `std_subjects`
--
ALTER TABLE `std_subjects`
  ADD PRIMARY KEY (`std_subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher_subject_assign_detail`
--
ALTER TABLE `teacher_subject_assign_detail`
  ADD PRIMARY KEY (`teacher_subject_assign_detail_id`),
  ADD KEY `teacher_subject_assign_detail_head_id` (`teacher_subject_assign_detail_head_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teacher_subject_assign_head`
--
ALTER TABLE `teacher_subject_assign_head`
  ADD PRIMARY KEY (`teacher_subject_assign_head_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `concession`
--
ALTER TABLE `concession`
  MODIFY `concession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `emp_designation`
--
ALTER TABLE `emp_designation`
  MODIFY `emp_designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_reference`
--
ALTER TABLE `emp_reference`
  MODIFY `emp_ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_type`
--
ALTER TABLE `emp_type`
  MODIFY `emp_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fee_transaction_detail`
--
ALTER TABLE `fee_transaction_detail`
  MODIFY `fee_trans_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fee_transaction_head`
--
ALTER TABLE `fee_transaction_head`
  MODIFY `fee_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fee_type`
--
ALTER TABLE `fee_type`
  MODIFY `fee_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
  MODIFY `msg_of_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std_academic_info`
--
ALTER TABLE `std_academic_info`
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `std_attendance`
--
ALTER TABLE `std_attendance`
  MODIFY `std_attend_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std_class`
--
ALTER TABLE `std_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `std_class_name`
--
ALTER TABLE `std_class_name`
  MODIFY `class_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `std_enrollment_detail`
--
ALTER TABLE `std_enrollment_detail`
  MODIFY `std_enroll_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `std_enrollment_head`
--
ALTER TABLE `std_enrollment_head`
  MODIFY `std_enroll_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `std_fee_pkg`
--
ALTER TABLE `std_fee_pkg`
  MODIFY `std_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `std_guardian_info`
--
ALTER TABLE `std_guardian_info`
  MODIFY `std_guardian_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `std_ice_info`
--
ALTER TABLE `std_ice_info`
  MODIFY `std_ice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_personal_info`
--
ALTER TABLE `std_personal_info`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `std_sections`
--
ALTER TABLE `std_sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `std_sessions`
--
ALTER TABLE `std_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `std_subjects`
--
ALTER TABLE `std_subjects`
  MODIFY `std_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_subject_assign_detail`
--
ALTER TABLE `teacher_subject_assign_detail`
  MODIFY `teacher_subject_assign_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher_subject_assign_head`
--
ALTER TABLE `teacher_subject_assign_head`
  MODIFY `teacher_subject_assign_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institute` (`institute_id`);

--
-- Constraints for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD CONSTRAINT `emp_info_ibfk_1` FOREIGN KEY (`emp_designation_id`) REFERENCES `emp_designation` (`emp_designation_id`),
  ADD CONSTRAINT `emp_info_ibfk_2` FOREIGN KEY (`emp_branch_id`) REFERENCES `branches` (`branch_id`),
  ADD CONSTRAINT `emp_info_ibfk_3` FOREIGN KEY (`emp_type_id`) REFERENCES `emp_type` (`emp_type_id`);

--
-- Constraints for table `emp_reference`
--
ALTER TABLE `emp_reference`
  ADD CONSTRAINT `emp_reference_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `emp_info` (`emp_id`);

--
-- Constraints for table `fee_transaction_detail`
--
ALTER TABLE `fee_transaction_detail`
  ADD CONSTRAINT `fee_transaction_detail_ibfk_1` FOREIGN KEY (`fee_trans_detail_head_id`) REFERENCES `fee_transaction_head` (`fee_trans_id`);

--
-- Constraints for table `fee_transaction_head`
--
ALTER TABLE `fee_transaction_head`
  ADD CONSTRAINT `fee_transaction_head_ibfk_4` FOREIGN KEY (`month`) REFERENCES `month` (`month_id`),
  ADD CONSTRAINT `fee_transaction_head_ibfk_5` FOREIGN KEY (`class_name_id`) REFERENCES `std_class_name` (`class_name_id`),
  ADD CONSTRAINT `fee_transaction_head_ibfk_6` FOREIGN KEY (`session_id`) REFERENCES `std_sessions` (`session_id`),
  ADD CONSTRAINT `fee_transaction_head_ibfk_7` FOREIGN KEY (`section_id`) REFERENCES `std_sections` (`section_id`),
  ADD CONSTRAINT `fee_transaction_head_ibfk_8` FOREIGN KEY (`std_id`) REFERENCES `std_personal_info` (`std_id`);

--
-- Constraints for table `std_academic_info`
--
ALTER TABLE `std_academic_info`
  ADD CONSTRAINT `std_academic_info_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_personal_info` (`std_id`),
  ADD CONSTRAINT `std_academic_info_ibfk_2` FOREIGN KEY (`class_name_id`) REFERENCES `std_class_name` (`class_name_id`);

--
-- Constraints for table `std_attendance`
--
ALTER TABLE `std_attendance`
  ADD CONSTRAINT `std_attendance_ibfk_2` FOREIGN KEY (`class_name_id`) REFERENCES `std_class_name` (`class_name_id`),
  ADD CONSTRAINT `std_attendance_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `std_personal_info` (`std_id`),
  ADD CONSTRAINT `std_attendance_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `emp_info` (`emp_id`),
  ADD CONSTRAINT `std_attendance_ibfk_5` FOREIGN KEY (`session_id`) REFERENCES `std_sessions` (`session_id`),
  ADD CONSTRAINT `std_attendance_ibfk_6` FOREIGN KEY (`section_id`) REFERENCES `std_sections` (`section_id`);

--
-- Constraints for table `std_class`
--
ALTER TABLE `std_class`
  ADD CONSTRAINT `std_class_ibfk_1` FOREIGN KEY (`class_name_id`) REFERENCES `std_class_name` (`class_name_id`),
  ADD CONSTRAINT `std_class_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `std_sessions` (`session_id`),
  ADD CONSTRAINT `std_class_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `std_sections` (`section_id`);

--
-- Constraints for table `std_enrollment_detail`
--
ALTER TABLE `std_enrollment_detail`
  ADD CONSTRAINT `std_enrollment_detail_ibfk_1` FOREIGN KEY (`std_enroll_detail_head_id`) REFERENCES `std_enrollment_head` (`std_enroll_head_id`),
  ADD CONSTRAINT `std_enrollment_detail_ibfk_2` FOREIGN KEY (`std_enroll_detail_std_id`) REFERENCES `std_personal_info` (`std_id`);

--
-- Constraints for table `std_enrollment_head`
--
ALTER TABLE `std_enrollment_head`
  ADD CONSTRAINT `std_enrollment_head_ibfk_1` FOREIGN KEY (`class_name_id`) REFERENCES `std_class_name` (`class_name_id`),
  ADD CONSTRAINT `std_enrollment_head_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `std_sessions` (`session_id`),
  ADD CONSTRAINT `std_enrollment_head_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `std_sections` (`section_id`);

--
-- Constraints for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  ADD CONSTRAINT `std_fee_details_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_personal_info` (`std_id`),
  ADD CONSTRAINT `std_fee_details_ibfk_2` FOREIGN KEY (`concession_id`) REFERENCES `concession` (`concession_id`);

--
-- Constraints for table `std_guardian_info`
--
ALTER TABLE `std_guardian_info`
  ADD CONSTRAINT `std_guardian_info_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_personal_info` (`std_id`);

--
-- Constraints for table `std_ice_info`
--
ALTER TABLE `std_ice_info`
  ADD CONSTRAINT `std_ice_info_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_personal_info` (`std_id`);

--
-- Constraints for table `std_sections`
--
ALTER TABLE `std_sections`
  ADD CONSTRAINT `std_sections_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `std_sessions` (`session_id`),
  ADD CONSTRAINT `std_sections_ibfk_2` FOREIGN KEY (`section_subjects`) REFERENCES `std_subjects` (`std_subject_id`);

--
-- Constraints for table `std_sessions`
--
ALTER TABLE `std_sessions`
  ADD CONSTRAINT `std_sessions_ibfk_1` FOREIGN KEY (`session_branch_id`) REFERENCES `branches` (`branch_id`);

--
-- Constraints for table `teacher_subject_assign_detail`
--
ALTER TABLE `teacher_subject_assign_detail`
  ADD CONSTRAINT `teacher_subject_assign_detail_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `teacher_subject_assign_detail_ibfk_6` FOREIGN KEY (`teacher_subject_assign_detail_head_id`) REFERENCES `teacher_subject_assign_head` (`teacher_subject_assign_head_id`),
  ADD CONSTRAINT `teacher_subject_assign_detail_ibfk_7` FOREIGN KEY (`class_id`) REFERENCES `std_class_name` (`class_name_id`);

--
-- Constraints for table `teacher_subject_assign_head`
--
ALTER TABLE `teacher_subject_assign_head`
  ADD CONSTRAINT `teacher_subject_assign_head_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `emp_info` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
