-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2019 at 05:05 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `institute_id`, `branch_code`, `branch_name`, `branch_type`, `branch_location`, `branch_contact_no`, `branch_email`, `status`, `branch_head_name`, `branch_head_contact_no`, `branch_head_email`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(5, 2, '001', 'BROOKFIELD COLLEGE RYK', 'Group', 'East Canal View', '068-58-75860', 'brookfield@gmail.com', 'Active', 'Shahzad Qayoom', '+92-333-7668866', 'shahzaqayoom@gmail.com', '2019-01-12 05:37:39', '2019-01-12 05:37:39', 1, 1, 1);

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
(2, '90% Concession ', '2019-01-10 08:16:15', '0000-00-00 00:00:00', 1, 1, 1),
(3, '80% Concession', '2019-01-10 08:16:39', '2019-01-10 08:16:39', 1, 1, 1),
(4, '70% Concession', '2019-01-10 08:16:54', '2019-01-10 08:16:54', 1, 1, 1),
(5, '60% Concession', '2019-01-10 08:17:28', '0000-00-00 00:00:00', 1, 0, 1),
(6, '50% Concession', '2019-01-10 08:17:47', '0000-00-00 00:00:00', 1, 0, 1),
(7, '40% Concession ', '2019-01-10 08:18:40', '2019-01-10 08:18:40', 1, 1, 1),
(8, '30% Concession', '2019-01-10 08:18:08', '0000-00-00 00:00:00', 1, 0, 1),
(9, '25% Concession', '2019-01-10 08:18:19', '0000-00-00 00:00:00', 1, 0, 1),
(10, 'Kinship', '2019-01-10 08:18:27', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 'Rana Faraz', 'ranafarazahmed@gmail.com', 'Testing Email', '<h2><b>Hello Sir,</b></h2><p><b><i></i><i>This is testing Email from Yii2 with text formatting.</i><i></i></b><b></b></p><p><b><i><br></i></b></p><p><b>Note:</b></p><p><ol><li><i>jkhjhj</i></li><li><i>erwrwe</i></li><li><i>werwe</i></li><li><i>were</i></li><li><i>werwerwr</i></li></ol><p>Regards,<br></p><p><b><i>Anas Shafqat</i></b></p></p>', 'attachments/1546069705.jpg', '2018-12-29 07:48:30', 1, '0000-00-00 00:00:00', 0, 1),
(19, 'ans', 'anasshafqat01@gmail.com', 'hello', '<p><b><i>anasshafqat01@gmail.com</i></b><br></p>', 'attachments/1548138607.jpg', '2019-01-22 06:30:23', 9, '0000-00-00 00:00:00', 0, 1);

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
(6, 'Accountant', '2018-12-07 06:29:32', '0000-00-00 00:00:00', 1, 0, 1),
(7, 'Librarian', '2019-01-14 17:59:26', '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `emp_id` int(11) NOT NULL,
  `emp_reg_no` varchar(50) NOT NULL,
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
  `group_by` enum('Faculty','Management','Clerical Staff','Office Boys','Security Guard') NOT NULL,
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

INSERT INTO `emp_info` (`emp_id`, `emp_reg_no`, `emp_name`, `emp_father_name`, `emp_cnic`, `emp_contact_no`, `emp_perm_address`, `emp_temp_address`, `emp_marital_status`, `emp_gender`, `emp_photo`, `emp_designation_id`, `emp_type_id`, `group_by`, `emp_branch_id`, `emp_email`, `emp_qualification`, `emp_passing_year`, `emp_institute_name`, `degree_scan_copy`, `emp_salary`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'EMP-Y19-1', 'Nadia Gull', 'Iftikhar Ali', '31303-1234567-8', '+92-123-4567890', 'RYK', 'RYK', 'Single', 'Female', 'uploads/Nadia Gull_emp_photo.jpg', 4, 2, 'Faculty', 5, 'nadiagill285@gmail.com', 'BSCS', 2018, 'Superior College', '', 10000, '2019-02-08 11:20:07', '2018-12-15 13:43:37', 1, 1, 1),
(2, 'EMP-Y19-2', 'Kinza Mustafa', 'Ghulam Mustafa', '45102-3456789-0', '+92-345-6789098', 'ryk', 'ryk', 'Single', 'Female', 'uploads/Kinza Mustafa_emp_photo.jpg', 1, 4, 'Faculty', 5, 'kinza.fatima.522@gmail.com', 'BSCS', 2017, 'IUB', 'uploads/Kinza Mustafa_degree_scan_copy.jpg', 30000, '2019-02-08 11:20:11', '2018-12-15 13:48:54', 1, 1, 1),
(3, 'EMP-Y19-3', 'Asad Hussain', 'Muhammad Ali', '12345-6789987-6', '+92-331-7899876', 'RYK', 'RYK', 'Single', 'Male', 'uploads/Asad Hussain_emp_photo.jpg', 6, 4, 'Faculty', 5, 'asad@gmail.com', 'BSCS', 2015, 'Fast University', 'uploads/Asad Hussain_degree_scan_copy.jpg', 20000, '2019-02-08 11:21:03', '2019-01-14 19:38:33', 1, 1, 1),
(4, 'EMP-Y19-4', 'Anas Shafqat', 'Shafqat Ali', '31303-0437738-3', '+92-331-7375027', 'Gulshan Iqbal', '', 'Single', 'Male', 'uploads/Anas Shafqat_emp_photo.jpg', 4, 4, 'Faculty', 5, 'anasshafqat01@gmail.com', 'BSCS', 2018, 'Superior Group of Colleges', 'uploads/Anas Shafqat_degree_scan_copy.jpg', 50000, '2019-02-08 11:20:21', '2019-01-14 20:01:35', 1, 1, 1),
(5, 'EMP-Y19-5', 'Zeeshan', 'Ali', '12345-6898765-4', '+98-765-4328998', 'RYK', 'RYK', 'Single', 'Male', 'uploads/Zeeshan_emp_photo.jpg', 6, 4, 'Faculty', 5, 'zeeshan@gmail.com', 'BSCS', 2018, 'asdfghj', 'uploads/Zeeshan_degree_scan_copy.png', 15000, '2019-02-08 11:21:09', '0000-00-00 00:00:00', 9, 0, 1),
(6, 'EMP-Y19-6', 'Sumair Maqbool', 'Moqbool Ahmed', '31303-8765434-5', '+92-334-3456789', 'Gulshan Iqbal', 'Gulshan Iqbal', 'Single', 'Male', 'uploads/Sumair Maqbool_emp_photo.jpg', 3, 4, 'Faculty', 5, 'sumair@gmail.com', 'BSCS', 2018, 'Superior', 'uploads/Sumair Maqbool_degree_scan_copy.jpg', 20000, '2019-02-08 11:20:31', '0000-00-00 00:00:00', 9, 0, 1),
(7, 'EMP-Y19-7', 'Qasim Khan', 'M. Ali Khan', '34887-6543898-7', '+92-345-6789098', 'Gulshan Iqbal', '', 'Married', 'Male', 'uploads/Qasim_emp_photo.jpg', 3, 4, 'Management', 5, 'qasiim@gmail.com', 'BSCS', 2018, 'Superior College', 'uploads/Qasim_degree_scan_copy.png', 25000, '2019-02-08 11:07:12', '2019-02-08 11:07:12', 9, 9, 1),
(8, 'EMP-Y19-8', 'Farhan', 'Shahid', '31303-3488876-5', '+92-333-5678903', 'Gulshan Iqbal', 'Gulshan Iqbal', 'Single', 'Male', 'uploads/Farhan_emp_photo.jpg', 6, 4, 'Clerical Staff', 5, 'farhan@gmail.com', 'MCS', 2018, 'Nice College', 'uploads/Farhan_degree_scan_copy.png', 15000, '2019-02-08 11:15:25', '0000-00-00 00:00:00', 9, 0, 1),
(9, 'EMP-Y19-9', 'Saif-ur-Rehman', 'M. Ahmed Ali', '31303-3456789-8', '+92-334-5670987', 'Gulshan Iqbal', 'Gulshan Iqbal', 'Single', 'Male', 'uploads/Saif-ur-Rehman_emp_photo.jpg', 4, 4, 'Faculty', 5, 'saif@gmail.com', 'BSCS', 2018, 'IUB', 'uploads/Saif-ur-Rehman_degree_scan_copy.jpg', 22000, '2019-02-11 06:12:29', '0000-00-00 00:00:00', 9, 0, 1);

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
(1, 1, 'Iftikhar ali', '+92-334-5678906', '31303-9098765-3', 'Teacher'),
(2, 5, 'Anas', '+23-456-7876543', '98765-4323456-7', 'Teacher'),
(3, 6, 'Anas', '+92-331-4569987', '31303-3456789-8', 'Teacher'),
(4, 7, 'Anas', '+92-334-3456787', '31303-2345687-6', 'Teacher'),
(5, 8, 'Ali', '+92-333-3333333', '31303-3313121-2', 'Teacher');

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
(1, 'Daily Wadges', '2019-01-14 18:24:08', '0000-00-00 00:00:00', 1, 0, 1),
(2, 'Weekly Wedges', '2019-01-14 18:24:12', '0000-00-00 00:00:00', 1, 0, 1),
(3, 'Contract Basis', '2019-01-14 18:24:23', '0000-00-00 00:00:00', 1, 0, 1),
(4, 'Permanent ', '2018-12-14 07:52:24', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'Hello', 'Something in the description', '2019-01-27 17:14:06'),
(2, 'Another Event', 'Another Event Description', '2019-01-27 19:10:28'),
(3, 'Another Event 2', 'Another Event 2 Description', '2019-01-27 19:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(80) NOT NULL,
  `event_detail` text NOT NULL,
  `event_venue` varchar(100) NOT NULL,
  `event_start_datetime` datetime NOT NULL,
  `event_end_datetime` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_detail`, `event_venue`, `event_start_datetime`, `event_end_datetime`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`) VALUES
(1, 'Last Day', 'Last Day of Janvi', '', '2015-05-30 00:00:00', '2015-05-30 00:00:00', '2015-05-27 15:34:53', 1, '2015-05-27 15:40:30', 1, 'Inactive'),
(2, 'Janvi BDay', 'Happy Birthday Janvi ', '', '2015-07-05 00:00:00', '2015-07-05 00:00:00', '2015-05-27 15:35:38', 1, '2015-05-27 15:40:48', 1, 'Inactive'),
(3, 'Happy Bday', 'HAppy Birthday KarmrajSir', '', '2015-07-25 00:00:00', '2015-07-25 00:00:00', '2015-05-27 15:36:10', 1, '2015-05-27 15:41:05', 1, 'Inactive'),
(4, 'Launching New Application', 'Launch of Edusec Yii2', '', '2015-06-02 09:30:00', '2015-06-02 10:00:00', '2015-05-27 15:37:00', 1, '2015-05-27 15:39:37', 1, ''),
(5, 'Meeting for staff ', 'All Staff Members-Meeting', '', '2015-06-09 00:00:00', '2015-06-09 00:00:00', '2015-05-27 15:37:42', 1, NULL, NULL, ''),
(7, 'Celebration Time', 'Celebration Time', '', '2015-06-25 00:00:00', '2015-06-25 00:00:00', '2015-05-27 15:39:12', 1, NULL, NULL, ''),
(8, 'Sports Week', 'Annual sports week of Brookfield Group of Colleges.', 'Shiekh Zaid Sports Complex', '2019-01-31 08:00:05', '2019-02-04 05:00:05', '2019-01-30 16:57:53', 9, '2019-01-30 17:00:43', 9, 'Active');

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
(1, 1, 1, 5800, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(2, 1, 2, 15000, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(3, 2, 1, 4900, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(4, 2, 2, 10000, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(5, 3, 1, 4700, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(6, 3, 2, 10, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(7, 4, 1, 4600, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(8, 4, 2, 12500, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(9, 5, 1, 1800, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(10, 5, 2, 10000, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(11, 6, 1, 9000, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(12, 6, 2, 9000, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(13, 7, 1, 4400, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(14, 7, 2, 10, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(15, 8, 1, 4500, NULL, NULL, 0, '2019-02-04 08:18:23', '0000-00-00 00:00:00', 0, 0, 1),
(16, 8, 2, 10000, NULL, NULL, 0, '2019-02-04 09:11:37', '0000-00-00 00:00:00', 0, 0, 1),
(1097, 1, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1098, 2, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1099, 3, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1100, 4, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1101, 5, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1102, 6, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1103, 7, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1104, 8, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1112, 1, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1113, 1, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1114, 1, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1115, 2, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1116, 2, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1117, 2, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1118, 3, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1119, 3, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1120, 3, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1121, 4, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1122, 4, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1123, 4, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1124, 5, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1125, 5, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1126, 5, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1127, 6, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1128, 6, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1129, 6, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1130, 7, 4, 2, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1131, 7, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1132, 7, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1133, 8, 3, 1, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1134, 8, 5, 3, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1135, 8, 6, 4, NULL, NULL, 0, '2019-02-04 09:20:14', '0000-00-00 00:00:00', 0, 0, 1),
(1136, 9, 1, 4500, NULL, NULL, 0, '2019-02-04 09:32:11', '0000-00-00 00:00:00', 0, 0, 1),
(1137, 9, 2, 7000, NULL, NULL, 0, '2019-02-04 09:32:11', '0000-00-00 00:00:00', 0, 0, 1),
(1138, 9, 3, NULL, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(1139, 9, 4, NULL, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(1140, 9, 5, 100, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(1141, 9, 6, 700, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(1142, 10, 1, 4500, NULL, NULL, 0, '2019-02-04 09:32:11', '0000-00-00 00:00:00', 0, 0, 1),
(1143, 10, 2, 11250, NULL, NULL, 0, '2019-02-04 09:32:11', '0000-00-00 00:00:00', 0, 0, 1),
(1144, 10, 3, NULL, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(1145, 10, 4, NULL, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(1146, 10, 5, 100, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(1147, 10, 6, 700, NULL, NULL, 0, '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1);

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
  `month` varchar(20) NOT NULL,
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
(1, 5, 4, 5, 3, 'Mehtab Ahmed Ali', '2019-02', '2019-02-04 00:00:00', 20800, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(2, 5, 4, 5, 4, 'Ali', '2019-02', '2019-02-04 00:00:00', 14900, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(3, 5, 4, 5, 5, 'Hamza', '2019-02', '2019-02-04 00:00:00', 4710, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(4, 5, 4, 5, 6, 'Qasim', '2019-02', '2019-02-04 00:00:00', 17100, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(5, 5, 4, 5, 7, 'Anas Shafqat', '2019-02', '2019-02-04 00:00:00', 11800, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(6, 5, 4, 5, 8, 'Zia Ali', '2019-02', '2019-02-04 00:00:00', 18000, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(7, 5, 4, 5, 9, 'Ali Naveed', '2019-02', '2019-02-04 00:00:00', 4410, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(8, 5, 4, 5, 10, 'M. Rehan', '2019-02', '2019-02-04 00:00:00', 14500, 10, 0, 0, 'Unpaid', '2019-02-04 09:20:13', '0000-00-00 00:00:00', 0, 0, 1),
(9, 1, 4, 1, 1, 'Kinza Mustafah', '2019-02', '2019-02-08 00:00:00', 12300, 0, 0, 0, 'Unpaid', '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1),
(10, 1, 4, 1, 2, 'Nadia Gull', '2019-02', '2019-02-08 00:00:00', 16550, 0, 0, 0, 'Unpaid', '2019-02-08 05:51:33', '0000-00-00 00:00:00', 0, 0, 1);

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
  `notice_start` datetime NOT NULL,
  `notice_end` datetime NOT NULL,
  `notice_user_type` enum('Students','Parents','Employees','Others') NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_description`, `notice_start`, `notice_end`, `notice_user_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`) VALUES
(1, 'Final Term Exams ', 'Final Term Exams will be conducted on coming monday. All The Best !', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Students', '2015-05-27 15:26:29', 1, '2019-01-26 11:59:21', 9, 'Active'),
(2, 'Monthly Report', 'All Employee have to submit their report on month end.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Employees', '2015-05-27 15:27:23', 1, '2018-12-26 18:43:37', 1, 'Active'),
(3, 'Summer Vacation', 'Summer Vacation starts from June to  2nd week of July.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Students', '2015-05-27 15:28:37', 1, '2018-12-26 18:44:16', 1, 'Inactive'),
(4, 'Attendance Report', 'All Employees collect their class wise  attendance report', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Employees', '2015-05-27 15:30:35', 1, '2018-12-26 18:44:19', 1, 'Active'),
(5, 'Exam From Fill', 'All Students come and fill their exam forms', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Students', '2015-05-27 15:33:07', 1, '2018-12-26 18:44:03', 1, 'Active'),
(6, 'Roll No Slip', 'Collect your roll no slips from the exams department.', '2019-01-30 04:10:44', '1900-12-02 03:00:00', 'Students', '2019-01-30 15:04:08', 9, '2019-01-30 16:12:50', 9, 'Active'),
(7, 'Meeting', 'Meeting at 5:00 Pm for final exams conduction.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Employees', '2019-01-30 15:11:30', 9, '0000-00-00 00:00:00', 0, 'Active'),
(9, 'PTM', 'Parent teacher meeting on 01-Feb-2019 at 5:00 Pm.<br><b>Venue: Brookfield Group of Colleges</b>.', '2019-01-30 04:01:59', '2019-02-01 05:00:53', 'Parents', '2019-01-30 16:02:23', 9, '2019-01-30 16:36:13', 9, 'Active');

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
  `subject_combination` int(11) NOT NULL,
  `previous_class` varchar(50) NOT NULL,
  `passing_year` varchar(32) NOT NULL,
  `previous_class_rollno` int(11) NOT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `obtained_marks` int(11) DEFAULT NULL,
  `grades` varchar(10) NOT NULL,
  `percentage` varchar(5) DEFAULT NULL,
  `Institute` varchar(50) NOT NULL,
  `std_enroll_status` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_academic_info`
--

INSERT INTO `std_academic_info` (`academic_id`, `std_id`, `class_name_id`, `subject_combination`, `previous_class`, `passing_year`, `previous_class_rollno`, `total_marks`, `obtained_marks`, `grades`, `percentage`, `Institute`, `std_enroll_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 1, 1, 'Matric', '2017', 12345, 1100, 920, '', '81.81', 'Abc', 'signed', '2019-02-06 13:44:03', '0000-00-00 00:00:00', 1, 0, 1),
(2, 2, 1, 1, 'Matric', '2012', 1211, 1100, 870, '', '79.09', 'ABC', 'signed', '2019-02-06 13:44:12', '0000-00-00 00:00:00', 1, 0, 1),
(3, 3, 5, 5, 'Matric', '2012', 2342, 1100, 780, '', '70.90', 'bcd', 'signed', '2019-02-08 05:19:58', '2019-02-06 07:38:58', 1, 3, 1),
(4, 4, 5, 5, 'Matric', '2017', 34567, 1100, 890, '', '80.90', 'ABC', 'signed', '2019-02-08 05:19:58', '2019-02-06 07:39:34', 1, 3, 1),
(5, 5, 5, 5, 'Matric', '2018', 8970, 1100, 780, '', '70.90', 'ABC', 'signed', '2019-02-08 05:19:58', '2019-02-06 07:40:01', 1, 3, 1),
(6, 6, 5, 5, 'Matric', '2018', 78680, 1100, 850, '', '77.27', 'ABC', 'signed', '2019-02-08 05:19:58', '2019-02-06 07:40:24', 1, 3, 1),
(7, 7, 5, 5, 'Matric', '2018', 62789, 1100, 900, '', '81.81', 'ABC', 'signed', '2019-02-08 05:19:58', '2019-02-06 07:40:45', 1, 3, 1),
(8, 8, 5, 5, 'matric', '2014', 1234, 1100, 870, '', '79.09', 'XYZ', 'signed', '2019-02-08 05:19:58', '0000-00-00 00:00:00', 1, 0, 1),
(9, 9, 5, 5, 'matric', '2018', 1234, 1100, 890, 'A', '80.90', 'ghj', 'signed', '2019-02-08 05:19:58', '0000-00-00 00:00:00', 3, 0, 1),
(10, 10, 5, 5, 'matric', '2018', 1235, 1100, 789, 'C', '71.72', 'asf', 'signed', '2019-02-08 05:19:58', '0000-00-00 00:00:00', 3, 0, 1),
(11, 16, 3, 3, 'inter part-I', '2018', 1236, 1100, 897, 'A', '81.54', 'fghj', 'signed', '2019-02-08 05:11:16', '0000-00-00 00:00:00', 3, 0, 1),
(12, 11, 2, 2, 'inter-part-I', '2018', 1237, 550, 345, 'C', '62.72', 'hgfxxcvb', 'signed', '2019-02-08 05:09:57', '0000-00-00 00:00:00', 3, 0, 1),
(13, 12, 2, 2, 'inter-part-I', '2018', 1237, 550, 407, 'A', '74', 'pqr', 'signed', '2019-02-08 05:09:57', '2019-02-06 08:21:28', 3, 3, 1),
(14, 19, 2, 2, 'Matric', '2018', 125487, 1100, 890, 'A', '80.90', 'xyz', 'signed', '2019-02-08 05:09:57', '0000-00-00 00:00:00', 3, 0, 1),
(15, 13, 3, 3, 'Matric', '2018', 25689, 1100, 870, 'A', '79.09', 'fdzf', 'signed', '2019-02-08 05:11:16', '0000-00-00 00:00:00', 3, 0, 1),
(16, 15, 3, 3, 'Matric', '2018', 56898, 1100, 950, 'A+', '86.36', 'fsaf', 'signed', '2019-02-08 05:11:16', '0000-00-00 00:00:00', 3, 0, 1),
(17, 18, 3, 3, 'Matric', '2018', 12355, 1100, 789, 'C', '71.72', 'fghjk', 'signed', '2019-02-08 05:11:16', '0000-00-00 00:00:00', 3, 0, 1);

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
  `std_reg_no` varchar(15) NOT NULL,
  `std_roll_no` varchar(32) NOT NULL,
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

INSERT INTO `std_enrollment_detail` (`std_enroll_detail_id`, `std_enroll_detail_head_id`, `std_reg_no`, `std_roll_no`, `std_enroll_detail_std_id`, `std_enroll_detail_std_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 'REG-Y19-01', 'FSC-MG18-1', 1, 'Kinza', '2019-02-08 05:42:10', '0000-00-00 00:00:00', 1, 0, 1),
(2, 1, 'REG-Y19-02', 'FSC-MG18-2', 2, 'Nadia', '2019-02-08 05:41:02', '0000-00-00 00:00:00', 1, 0, 1),
(65, 11, 'REG-Y19-011', 'FSC-MG18-1', 11, 'Aisha Ameen', '2019-02-08 05:42:26', '0000-00-00 00:00:00', 3, 0, 1),
(66, 11, 'REG-Y19-012', 'FSC-MG18-2', 12, 'Aniqa Gull', '2019-02-08 05:42:32', '0000-00-00 00:00:00', 3, 0, 1),
(67, 11, 'REG-Y19-019', 'FSC-MG18-3', 19, 'anam asad', '2019-02-08 05:09:57', '0000-00-00 00:00:00', 3, 0, 1),
(68, 16, 'REG-Y19-016', 'FSC-EB18-1', 16, 'Waleed Bin Naeem', '2019-02-08 05:42:49', '0000-00-00 00:00:00', 3, 0, 1),
(69, 16, 'REG-Y19-013', 'FSC-EB18-2', 13, 'Faheem Ameen', '2019-02-08 05:42:38', '0000-00-00 00:00:00', 3, 0, 1),
(70, 16, 'REG-Y19-015', 'FSC-EB18-3', 15, 'Anas', '2019-02-08 05:42:44', '0000-00-00 00:00:00', 3, 0, 1),
(71, 16, 'REG-Y19-018', 'FSC-EB18-4', 18, 'M. Akram', '2019-02-08 05:11:16', '0000-00-00 00:00:00', 3, 0, 1),
(72, 2, 'REG-Y19-003', 'ICS-CB18-1', 3, 'Mehtab Ahmed Ali', '2019-02-08 05:41:18', '0000-00-00 00:00:00', 3, 0, 1),
(73, 2, 'REG-Y19-004', 'ICS-CB18-2', 4, 'Ali', '2019-02-08 05:41:42', '0000-00-00 00:00:00', 3, 0, 1),
(74, 2, 'REG-Y19-005', 'ICS-CB18-3', 5, 'Hamza', '2019-02-08 05:41:34', '0000-00-00 00:00:00', 3, 0, 1),
(75, 2, 'REG-Y19-006', 'ICS-CB18-4', 6, 'Qasim', '2019-02-08 05:41:27', '0000-00-00 00:00:00', 3, 0, 1),
(76, 2, 'REG-Y19-007', 'ICS-CB18-5', 7, 'Anas Shafqat', '2019-02-08 05:41:49', '0000-00-00 00:00:00', 3, 0, 1),
(77, 2, 'REG-Y19-008', 'ICS-CB18-6', 8, 'Zia Ali', '2019-02-08 05:41:56', '0000-00-00 00:00:00', 3, 0, 1),
(78, 2, 'REG-Y19-009', 'ICS-CB18-7', 9, 'Ali Naveed', '2019-02-08 05:42:02', '0000-00-00 00:00:00', 3, 0, 1),
(79, 2, 'REG-Y19-010', 'ICS-CB18-8', 10, 'M. Rehan', '2019-02-08 05:42:16', '0000-00-00 00:00:00', 3, 0, 1);

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
(2, 5, 4, 5, 'ICS (Part - I)-2018 - 2020 -CB-1', '2019-02-08 05:16:30', '0000-00-00 00:00:00', 1, 0, 1),
(11, 2, 4, 2, 'FSC Pre-Medical (Part - II)-2018 - 2020 -MG-2', '2019-02-07 06:31:30', '0000-00-00 00:00:00', 3, 0, 1),
(16, 3, 4, 8, 'FSC Pre-Engineering (Part - I)-2018 - 2020 -EB-1', '2019-02-07 07:49:34', '0000-00-00 00:00:00', 3, 0, 1);

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
(1, 1, 5000, 500, 4500, 'Annual', 3, 5, 40000, 7000, '2019-01-15 04:39:02', '0000-00-00 00:00:00', 0, 0, 1),
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
(15, 15, 10000, 1000, 9000, 'Annual', 6, 3, 35000, 11666, '2019-01-14 06:39:34', '0000-00-00 00:00:00', 1, 0, 1),
(16, 16, 10000, 1000, 9000, 'Annual', 6, 3, 35000, 11666, '2019-01-14 07:33:44', '0000-00-00 00:00:00', 1, 0, 1),
(18, 8, 10000, 1000, 9000, 'Annual', 2, 5, 45000, 9000, '2019-01-30 14:24:30', '0000-00-00 00:00:00', 0, 0, 1),
(19, 18, 5000, 123, 4877, 'Annual', 6, 4, 30000, 7500, '2019-02-06 05:25:48', '0000-00-00 00:00:00', 3, 0, 1),
(20, 19, 5000, 1200, 3800, 'Annual', 7, 3, 28000, 9333, '2019-02-06 05:44:57', '0000-00-00 00:00:00', 3, 0, 1);

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
  `guardian_designation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_guardian_info`
--

INSERT INTO `std_guardian_info` (`std_guardian_info_id`, `std_id`, `guardian_name`, `guardian_relation`, `guardian_cnic`, `guardian_email`, `guardian_contact_no_1`, `guardian_contact_no_2`, `guardian_monthly_income`, `guardian_occupation`, `guardian_designation`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 1, 'G. Mustafah', 'Father', '12345-6789123-4', 'abu@gmail.com', '+92-306-3772105', '+12-345-6789123', 35000, 'Businessmen', 'MD', '2019-01-14 13:21:46', '0000-00-00 00:00:00', 1, 0, 1),
(2, 2, 'Iftkhar', 'Rehman', '12345-6789123-4', 'abu@gmail.com', '+92-331-7375027', '+12-345-6789123', 30000, 'Govt. Employee', 'Teacher', '2019-01-14 11:06:25', '0000-00-00 00:00:00', 1, 0, 1),
(3, 3, 'M. Ahmed', 'Brother', '12345-6787545-6', 'ahmed@gmail.com', '+92-331-4567876', '+92-334-5609876', 50000, 'Employee', 'Manager', '2019-01-14 17:18:38', '0000-00-00 00:00:00', 1, 0, 1),
(4, 9, 'Naveed Anjum', 'Father', '12345-6789098-7', 'Naveed@gmail.com', '', '+92-123-4567876', 0, 'abc', '', '2018-12-30 14:55:12', '0000-00-00 00:00:00', 1, 0, 1),
(5, 10, 'M. Arshad', 'Father', '31303-0388634-5', 'arshad@gmail.com', '+92-305-6466494', '+92-894-6161333', 50000, 'Self Employee', '', '2019-01-03 11:45:25', '0000-00-00 00:00:00', 1, 0, 1),
(6, 11, 'Muhammad Ameen', 'Father', '34567-8987654-5', 'ameen@gmail.com', '+45-678-7654567', '+34-567-8765434', 15000, 'govt employee', '', '2019-01-06 15:19:03', '0000-00-00 00:00:00', 1, 0, 1),
(7, 12, 'Asmat Ara', 'Mother', '23456-7890987-6', 'asmat@gmail.com', '+43-234-5678909', '+34-567-8987654', 12000, 'house wife', '', '2019-01-06 15:39:40', '0000-00-00 00:00:00', 1, 0, 1),
(8, 13, 'Muhammed Ameen', 'Father', '34567-8987656-7', 'ameenn@gmail.com', '+45-678-9098765', '+76-545-6789098', 50000, 'asd', '', '2019-01-06 15:52:57', '0000-00-00 00:00:00', 1, 0, 1),
(10, 15, 'M. Ali', 'Brother', '31303-2345678-9', 'anas@gmail.com', '+92-345-6789987', '+92-334-9876543', 35000, 'Govt. Teacher', '', '2019-01-14 06:39:34', '0000-00-00 00:00:00', 1, 0, 1),
(11, 16, 'Naeem Wahid', 'Father', '31305-6789987-6', 'naeem@gmail.com', '+92-334-4568998', '+92-333-4234567', 50000, 'Govt. Employee', 'Teacher', '2019-01-14 07:33:44', '0000-00-00 00:00:00', 1, 0, 1),
(13, 18, 'abc', 'Father', '23456-7890933-4', 'abc@gmail.com', '+23-456-7898765', '+39-876-5456784', 2345432, 'asdds', 'dswqwsdsx', '2019-02-06 05:25:48', '0000-00-00 00:00:00', 3, 0, 1),
(14, 19, 'Asad Ali', 'Father', '56776-5567876-5', 'asad@gmail.com', '+66-666-6666666', '+77-777-7777777', 3456787, 'ghjk', 'fghj', '2019-02-06 05:44:57', '0000-00-00 00:00:00', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_ice_info`
--

CREATE TABLE `std_ice_info` (
  `std_ice_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `std_ice_name` varchar(64) NOT NULL,
  `std_ice_relation` varchar(64) NOT NULL,
  `std_ice_contact_no` varchar(15) NOT NULL,
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
(1, 1, 'M. Ahmed', 'Mamu G', '+92-306-3456760', '2019-02-07 09:22:31', 0, '0000-00-00 00:00:00', 0, 1),
(3, 15, 'M. Ahmed', 'Brother', '+92-332-3456989', '2019-01-14 17:19:07', 1, '0000-00-00 00:00:00', 0, 1),
(4, 16, 'Wahid', 'Father', '+92-332-12345', '2019-01-14 07:33:44', 1, '0000-00-00 00:00:00', 0, 1),
(6, 18, 'dfdsa', 'fdswdssdcds', '+23-456-7898765', '2019-02-06 05:25:48', 3, '0000-00-00 00:00:00', 0, 1),
(7, 19, 'fghj', 'ghuj', '+88-888-8888888', '2019-02-06 05:44:57', 3, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_inquiry`
--

CREATE TABLE `std_inquiry` (
  `std_inquiry_id` int(11) NOT NULL,
  `std_inquiry_no` varchar(15) NOT NULL,
  `std_name` varchar(32) NOT NULL,
  `std_father_name` varchar(32) NOT NULL,
  `std_contact_no` varchar(15) NOT NULL,
  `std_father_contact_no` varchar(15) NOT NULL,
  `std_inquiry_date` datetime NOT NULL,
  `std_previous_class` varchar(32) NOT NULL,
  `std_roll_no` varchar(10) NOT NULL,
  `std_obtained_marks` int(4) NOT NULL,
  `std_total_marks` int(4) NOT NULL,
  `std_percentage` varchar(6) NOT NULL,
  `refrence_name` varchar(32) NOT NULL,
  `refrence_contact_no` varchar(15) NOT NULL,
  `refrence_designation` varchar(30) NOT NULL,
  `std_address` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_inquiry`
--

INSERT INTO `std_inquiry` (`std_inquiry_id`, `std_inquiry_no`, `std_name`, `std_father_name`, `std_contact_no`, `std_father_contact_no`, `std_inquiry_date`, `std_previous_class`, `std_roll_no`, `std_obtained_marks`, `std_total_marks`, `std_percentage`, `refrence_name`, `refrence_contact_no`, `refrence_designation`, `std_address`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'STD-Y19-002', 'nauman', 'shahid', '+92-333-7486807', '+92-300-6738133', '2019-02-13 05:46:42', 'BSCS', '025', 2575, 3350, '80%', 'Anas', '+90-331-7375027', 'MD DEXDEVS', 'RYK', '2019-02-13 12:48:07', '2019-02-13 12:48:07', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `std_personal_info`
--

CREATE TABLE `std_personal_info` (
  `std_id` int(11) NOT NULL,
  `std_reg_no` varchar(50) NOT NULL,
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

INSERT INTO `std_personal_info` (`std_id`, `std_reg_no`, `std_name`, `std_father_name`, `std_contact_no`, `std_DOB`, `std_gender`, `std_permanent_address`, `std_temporary_address`, `std_email`, `std_photo`, `std_b_form`, `std_district`, `std_religion`, `std_nationality`, `std_tehseel`, `created_at`, `updated_at`, `created_by`, `updated_by`, `delete_status`) VALUES
(1, 'REG-Y19-001', 'Kinza Mustafah', 'Mustafa Ali', '+12-345-6789098', '2019-01-14', 'Female', 'RYK', 'RYK', 'kinza@gmail.com', 'uploads/Kinza Mustafah_photo.png', '12345-1234567-1', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-08 05:24:22', '2019-01-14 13:27:25', 1, 1, 1),
(2, 'REG-Y19-002', 'Nadia Gull', 'Iftikhar Ali', '+92-314-8790789', '2018-10-29', 'Female', 'RYK', 'RYK', 'nadia@gmail.com', 'uploads/Nadia Gull_photo.png', '12345-6789123-4', 'RYK', 'RYK', 'Pakistan', 'Islam', '2019-02-08 05:24:30', '2019-01-14 10:52:35', 1, 1, 1),
(3, 'REG-Y19-003', 'Mehtab Ahmed Ali', 'M. Ahmed', '+92-333-7967676', '1996-07-04', 'Male', 'RYK', 'RYK', 'mehtab@gmail.com', 'uploads/Mehtab Ahmed Ali_photo.jpeg', '12345-6789123-4', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-08 05:24:35', '2019-01-28 12:03:31', 1, 9, 1),
(4, 'REG-Y19-004', 'Ali', '', '+56-234-6789098', '2018-10-27', 'Male', 'seuh', 'hggyu', 'hiuuhi', '', '23456-7890987-6', 'jbjbj', 'knk', 'jjj', 'jhjh', '2019-02-08 05:24:41', '0000-00-00 00:00:00', 1, 0, 1),
(5, 'REG-Y19-005', 'Hamza', '', '+35-678-9009876', '2018-10-27', 'Male', 'tghjk', 'lkokjo', '4567kpok', 'uploads/Hamza_photo.jpg', '23678-7654345-6', 'dfhjk', 'jojoj', 'jjoijho', 'hukhukhk', '2019-02-08 05:24:46', '2018-11-01 06:49:57', 1, 1, 1),
(6, 'REG-Y19-006', 'Qasim', 'Khan', '+38-909-8765445', '2018-10-27', 'Male', 'Rahim Yar Khan', 'Rahim Yar Khan', 'qasim@gmail.com', 'uploads/Qasim_photo.jpg', '23678-8765434-5', 'Rahim Yar Khan', 'Islam', 'Pakistani', 'Rahim Yar Khan', '2019-02-08 05:24:51', '2019-01-12 17:09:27', 1, 1, 1),
(7, 'REG-Y19-007', 'Anas Shafqat', 'Shafqat Ali', '+92-331-7375027', '2018-10-27', 'Male', 'Gulshan Iqbal, Rahim Yar Khan', 'Gulshan Iqbal, Rahim Yar Khan', 'anasshafqat01@gmail.com', 'uploads/Anas Shafqat_photo.jpg', '31303-0437789-0', 'Rahim Yar Khan', 'Islam', 'Pakistani', 'Rahim Yar Khan', '2019-02-08 05:24:56', '2019-01-11 15:45:24', 1, 1, 1),
(8, 'REG-Y19-008', 'Zia Ali', 'Ali Ahmed', '+12-345-6789098', '2009-06-09', 'Male', 'Gulshan Iqbal, Rahim Yar Khan', 'Gulshan Iqbal, Rahim Yar Khan', 'zia@gmail.com', 'uploads/Zia Ali_photo.jpg', '12345-6789876-5', 'Rahim Yar Khan', 'Islam', 'Pakistani', 'Rahim Yar Khan', '2019-02-08 05:25:01', '2018-11-05 16:42:39', 1, 1, 1),
(9, 'REG-Y19-009', 'Ali Naveed', 'Naveed Anjum', '+12-345-6789098', '2018-11-03', 'Male', 'mnhgbfdsfvbghgfd', '', 'sdfghjkllkjhgvc', 'uploads/Ali Naveed_photo.jpg', '23456-7890987-6', 'RYK', 'Islam', 'Pakistani', 'RKY', '2019-02-08 05:25:06', '0000-00-00 00:00:00', 1, 0, 1),
(10, 'REG-Y19-010', 'M. Rehan', 'M. Arshad', '+92-306-3772105', '1992-04-03', 'Male', 'Rahim Yar Khan', 'Rahim Yar Khan', 'rehan@gmail.com', 'uploads/M. Rehan_photo.png', '31303-8898966-5', 'Rahim Yar Khan', 'Islam', 'Pakistani', 'Rahim Yar Khan', '2019-02-08 05:25:11', '0000-00-00 00:00:00', 1, 0, 1),
(11, 'REG-Y19-011', 'Aisha Ameen', 'Muhammad Ameen', '', '1991-01-01', 'Female', 'sdfghjkjhg678', 'xcvbnjmklkjhg6789', 'aisha@gmail.com', 'uploads/Aisha Ameen_photo.png', '34567-8765456-7', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-08 05:25:17', '0000-00-00 00:00:00', 1, 0, 1),
(12, 'REG-Y19-012', 'Aniqa Gull', 'Iftikhar Ali', '+92-456-7898765', '2019-01-06', 'Female', 'uytfdfghujio', 'fdfghjkl', 'aniqa@gmail.com', 'uploads/Aniqa Gull_photo.png', '34567-8987654-5', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-08 05:25:21', '0000-00-00 00:00:00', 1, 0, 1),
(13, 'REG-Y19-013', 'Faheem Ameen', 'Muhammed Ameen', '+23-456-7898765', '2019-01-06', 'Male', 'ghjkkjhgfdvbn', 'ddtyuioiuytr', 'faheem@gmail.com', 'uploads/Faheem Ameen_photo.jpg', '23456-7898765-4', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-08 05:25:37', '0000-00-00 00:00:00', 1, 0, 1),
(15, 'REG-Y19-015', 'Anas', 'M.Akram', '', '2019-01-14', 'Male', 'RYK', 'RYK', '', 'uploads/Anas_photo.jpeg', '31302-3456789-8', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-08 05:23:55', '0000-00-00 00:00:00', 1, 0, 1),
(16, 'REG-Y19-016', 'Waleed Bin Naeem', 'Naeem', '+23-456-7756999', '1993-05-05', 'Male', 'Rahim Yar Khan', 'Rahim Yar Khan', 'waleed@gmail.com', 'uploads/Waleed Bin Naeem_photo.jpeg', '12367-8765432-8', 'Rahim Yar Khan', 'Islam', 'Pakistani', 'Rahim Yar Khan', '2019-02-08 05:23:41', '0000-00-00 00:00:00', 1, 0, 1),
(18, 'REG-Y19-018', 'M. Akram', 'jhgfddfgh', '+34-567-8909876', '2019-02-06', 'Male', '23456789jhgfxxfghjk', 'hgfdxszdfghj345678ijhgvc', 'xyz@gmail.com', 'uploads/M. Akram_photo.png', '34567-8909876-5', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-07 17:09:21', '2019-02-06 08:15:54', 3, 3, 1),
(19, 'REG-Y19-019', 'anam asad', 'asad ali', '+33-333-3333333', '2019-02-06', 'Female', 'dfghjfgh', 'fgvbhjn', 'anam@gmail.com', '0', '55555-5555555-5', 'RYK', 'Islam', 'Pakistani', 'RYK', '2019-02-07 17:09:31', '0000-00-00 00:00:00', 3, 0, 1);

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
(5, 4, 'CB-1', 'Computer Boys Part-II', 25, 6, '2019-02-08 05:15:42', '2019-02-08 05:15:42', 1, 3, 1),
(6, 4, 'EG-1', 'Engineering Girls Part-I', 30, 3, '2019-01-04 17:30:33', '0000-00-00 00:00:00', 1, 0, 1),
(7, 4, 'EG-2', 'Engineering Girls Part-II', 25, 4, '2019-02-06 09:21:17', '2019-02-06 09:21:17', 3, 3, 1),
(8, 4, 'EB-1', 'Engineering Boys Part-I', 25, 3, '2019-02-06 09:20:10', '0000-00-00 00:00:00', 3, 0, 1),
(9, 4, 'EB-2', 'Engineering Boys Part-II', 25, 4, '2019-02-06 09:20:53', '0000-00-00 00:00:00', 3, 0, 1);

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
(4, 5, '2018 - 2020 ', '2018-05-01', '2020-05-01', 'Active', '2019-01-03 11:18:28', '0000-00-00 00:00:00', 1, 0, 1),
(5, 5, '2019-2021', '2019-01-01', '2021-01-31', 'Active', '2019-01-13 07:16:10', '0000-00-00 00:00:00', 1, 0, 1);

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
(3, 'Math I,Chemistry I,Physics I,English A, English B, Urdu A, Urdu B, Islamiyat'),
(4, 'Math II,Chemistry II,Physics II,English A, English B, Urdu A, Urdu B, Pak-Studies'),
(5, 'Computer I,Math I,Physics I,English A, English B, Urdu A, Urdu B, Islamiyat'),
(6, 'Computer II,Math II,Physics II,English A, English B, Urdu A, Urdu B, Pak-Studies'),
(7, 'Computer I,Statistics I,Economics I,English A, English B, Urdu A, Urdu B, Islamiyat'),
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
(1, 1, 2, 1, '3 Lectures', '2019-02-13 09:13:33', '0000-00-00 00:00:00', 1, 0, 1),
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
  `user_photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `user_photo`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Nadia Gull', 'gQfgRy6bOrf6c0rA3GcHbJ8NBBkNOvav', '$2y$13$jZNfJkMzYUgfTOKlS4/J5OGCYddtOkPUX4HuDldfO42z4QehkAnnS', 'BQQPywNyB5CLu8tQB6fdmSq7JAQpVUSQ_1544169305', 'nadiagull285@gmail.com', '', 10, 1544164564, 1544169305),
(3, 'kinza', '49-7nkeRO0S1DiJufMw2Z_03csIPfFKv', '$2y$13$GsKlW7WedO19nhEeSeELruQiVbrcn3fkw2cKDvun9.bw7qfQElrRW', NULL, 'kinza.fatima.522@gmail.com', '', 10, 1544420311, 1544420311),
(8, 'nauman', 'zBR6bzgL2TXBUAih87cKZmfM16f8jzfN', '$2y$13$TSDjjWiuBqtNrqR4Kw7LRui4p32B6zQbQYs6bd/g10K2m7.03X2NK', NULL, 'nauman@gmail.com', 'uploads/nauman_photo.jpg', 10, 1547628657, 1547628657),
(9, 'anasshafqat', 'VIzes-7TZINTaoCcloH2dOXuXkA0M2AL', '$2y$13$TufdQR.BjMgz1iQdX/eTq.6UqneK6KT45AamG.pt.6RYYM4emvq.u', NULL, 'anasshafqat01@gmail.com', 'uploads/anasshafqat_photo.jpeg', 10, 1547628726, 1547628726),
(12, 'farhan', 'PMgYC_9aJZvlAgCpKB7Jq0q7Z92-dURX', '$2y$13$o9czwzeCeLAY3YBvLX0XJePnRY2uj2wnRgMCObX1D/NxvKFIU/E6K', NULL, 'farhan@gmail.com', 'uploads/farhan_photo.jpg', 10, 1547632554, 1547632554),
(18, 'ali', '0QpSNKlONTE0HCgKeNk2pTjmWAVodpb2', '$2y$13$ZLMrQ.RqluExDnZ0Ri4NT.Dno0Z9HEqByIunDTmB9TCCPoFrYagSq', NULL, 'ali@gmail.com', 'userphotos/ali_photo.jpg', 10, 1547663221, 1547663221);

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

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
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `class_name_id` (`class_name_id`),
  ADD KEY `subject_combination` (`subject_combination`);

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
-- Indexes for table `std_inquiry`
--
ALTER TABLE `std_inquiry`
  ADD PRIMARY KEY (`std_inquiry_id`);

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
  MODIFY `concession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `emp_designation`
--
ALTER TABLE `emp_designation`
  MODIFY `emp_designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_reference`
--
ALTER TABLE `emp_reference`
  MODIFY `emp_ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp_type`
--
ALTER TABLE `emp_type`
  MODIFY `emp_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fee_transaction_detail`
--
ALTER TABLE `fee_transaction_detail`
  MODIFY `fee_trans_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1148;

--
-- AUTO_INCREMENT for table `fee_transaction_head`
--
ALTER TABLE `fee_transaction_head`
  MODIFY `fee_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std_academic_info`
--
ALTER TABLE `std_academic_info`
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `std_enroll_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `std_enrollment_head`
--
ALTER TABLE `std_enrollment_head`
  MODIFY `std_enroll_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `std_fee_pkg`
--
ALTER TABLE `std_fee_pkg`
  MODIFY `std_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `std_guardian_info`
--
ALTER TABLE `std_guardian_info`
  MODIFY `std_guardian_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `std_ice_info`
--
ALTER TABLE `std_ice_info`
  MODIFY `std_ice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `std_inquiry`
--
ALTER TABLE `std_inquiry`
  MODIFY `std_inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `std_personal_info`
--
ALTER TABLE `std_personal_info`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `std_sections`
--
ALTER TABLE `std_sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `std_sessions`
--
ALTER TABLE `std_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `fee_transaction_head_ibfk_5` FOREIGN KEY (`class_name_id`) REFERENCES `std_class_name` (`class_name_id`),
  ADD CONSTRAINT `fee_transaction_head_ibfk_6` FOREIGN KEY (`session_id`) REFERENCES `std_sessions` (`session_id`),
  ADD CONSTRAINT `fee_transaction_head_ibfk_7` FOREIGN KEY (`section_id`) REFERENCES `std_sections` (`section_id`),
  ADD CONSTRAINT `fee_transaction_head_ibfk_8` FOREIGN KEY (`std_id`) REFERENCES `std_personal_info` (`std_id`);

--
-- Constraints for table `std_academic_info`
--
ALTER TABLE `std_academic_info`
  ADD CONSTRAINT `std_academic_info_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_personal_info` (`std_id`),
  ADD CONSTRAINT `std_academic_info_ibfk_2` FOREIGN KEY (`class_name_id`) REFERENCES `std_class_name` (`class_name_id`),
  ADD CONSTRAINT `std_academic_info_ibfk_3` FOREIGN KEY (`subject_combination`) REFERENCES `std_subjects` (`std_subject_id`);

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
-- Constraints for table `std_fee_pkg`
--
ALTER TABLE `std_fee_pkg`
  ADD CONSTRAINT `std_fee_pkg_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `std_sessions` (`session_id`),
  ADD CONSTRAINT `std_fee_pkg_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `std_class_name` (`class_name_id`);

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
