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
-- Table structure for table `std_subjects`
--

CREATE TABLE `std_subjects` (
  `std_subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `std_subject_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_subjects`
--

INSERT INTO `std_subjects` (`std_subject_id`, `class_id`, `std_subject_name`) VALUES
(1, 1, 'Biology I,Chemistry I,Physics I,English I,Urdu I,Islamiyat'),
(2, 2, 'Biology II,Chemistry II,Physics II,English II, Urdu II, Pak-Studies'),
(3, 3, 'Math I,Chemistry I,Physics I,English I,Urdu I, Islamiyat'),
(4, 4, 'Math II,Chemistry II,Physics II,English II,Urdu II, Pak-Studies'),
(5, 5, 'Computer I,Maths I,Physics I,English I,Urdu I, Islamiyat'),
(6, 6, 'Computer II,Maths II,Physics II,English II,Urdu II, Islamiyat'),
(7, 5, 'Computer I,Statistics I,Economics I,English I,Urdu I, Islamiyat'),
(8, 6, 'Computer II,Statistics II,Economics II,English II,Urdu II,Pak-studies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `std_subjects`
--
ALTER TABLE `std_subjects`
  ADD PRIMARY KEY (`std_subject_id`),
  ADD KEY `class_id` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `std_subjects`
--
ALTER TABLE `std_subjects`
  MODIFY `std_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `std_subjects`
--
ALTER TABLE `std_subjects`
  ADD CONSTRAINT `std_subjects_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `std_class_name` (`class_name_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
