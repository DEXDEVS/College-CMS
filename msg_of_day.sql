-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 09:14 AM
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
-- Table structure for table `msg_of_day`
--

CREATE TABLE `msg_of_day` (
  `msg_of_day_id` int(11) NOT NULL,
  `msg_details` varchar(256) NOT NULL,
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
(6, 'In life, as in football, you won\'t go far unless you know where the goalposts are.-- Arnold Glasow', 'Students', '2015-05-27 15:24:54', 1, '2018-12-26 18:11:18', 1, 'Active', 1),
(7, 'Share your <b><i>Smile</i></b> with the world. It\'s a symbol of <b><i>Friendship and Peace</b></i>.', 'Others', '2019-04-10 10:42:05', 1, '2019-04-10 10:45:14', 1, 'Active', 1),
(8, 'Every day I feel is a blessing from <b><i>ALLAH</b></i>. And I consider it a new beginning. Yeah, everything is beautiful.', 'Others', '2019-04-10 11:11:03', 1, '2019-04-10 11:11:31', 1, 'Active', 1),
(9, '\"Life is like riding a bicycle. To keep your balance, you must keep moving.\" - Albert Einstein', 'Others', '2019-04-10 11:19:37', 1, '2019-04-10 11:20:25', 1, 'Active', 1),
(10, '“Life is short, and it is up to you to make it sweet.” -- Sarah Louise Delany', 'Others', '2019-04-10 11:21:26', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(11, '“Life doesn’t require that we be the best, only that we try our best.” -- H. Jackson Brown Jr.', 'Others', '2019-04-10 11:22:34', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(12, '“Take care of your inner, spiritual beauty. That will reflect in your face.” -- Dolores Del Rio', 'Others', '2019-04-10 11:26:41', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(13, 'The past cannot be changed. The future is yet in your power.', 'Others', '2019-04-10 11:28:51', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(14, '“You Learn More From Failure Than From Success. Don’t Let It Stop You. Failure Builds Character.”', 'Others', '2019-04-10 11:29:44', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(15, 'Only I can change my life. No one can do it for me.', 'Others', '2019-04-10 11:30:25', 1, '2019-04-10 11:32:28', 1, 'Active', 1),
(16, '“Failure Will Never Overtake Me If My Determination To Succeed Is Strong Enough.” -- Og Mandino', 'Others', '2019-04-10 11:31:15', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(17, 'Great things never come from comfort zones. You have to do something for it...!', 'Others', '2019-04-10 11:37:33', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(18, '\"I never dreamed about success, I worked for it.\" -- Estee Lauder', 'Others', '2019-04-10 11:39:03', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(19, '\"In order to succeed, we must first believe that we can.\" -- Nikos Kazantzakis', 'Others', '2019-04-10 11:39:35', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(20, '\"A successful man is one who can lay a firm foundation with the bricks that other throw at him.\" -- David Brinkley', 'Others', '2019-04-10 11:40:12', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(21, '\"If you can dream it, you can do it.\" -- Walt Disney', 'Others', '2019-04-10 11:40:43', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(22, '\"There are no secrets to success. It is the result of preparation, hard work, and learning from failure.\"', 'Others', '2019-04-10 11:41:35', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(23, '\"It does not matter how slowly you go as long as you do not stop.\"', 'Others', '2019-04-10 11:43:20', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(24, '\"There is no Elevator to Success, You have to take the Stairs.\"', 'Others', '2019-04-10 11:44:07', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(25, '\"If you Shine like a SUN, First burn Like a SUN.\"', 'Others', '2019-04-10 11:45:20', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(26, '\"The only place where success comes before work is in the dictionary.\" -- Vidal Sassoon', 'Others', '2019-04-10 11:45:58', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(27, '\"All our dreams can come true, if we have the courage to pursue them.\" – Walt Disney', 'Others', '2019-04-10 11:46:50', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(28, '\"Believe in yourself. You are braver than you think, more talented than you know, and capable of more than you imagine.\" -- Roy T. Bennett', 'Others', '2019-04-10 11:48:13', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(29, '\"Your true success in life begins only when you make the commitment to become excellent at what you do.\" -- Brian Tracy', 'Others', '2019-04-10 11:49:00', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(30, '\"Too many of us are not living our dreams because we are living our fears.\" – Les Brown', 'Others', '2019-04-10 11:49:49', 1, '0000-00-00 00:00:00', 0, 'Active', 1),
(31, '\"Your mind is a powerful thing. When you fill it with positive thoughts, your life will start to change.\"', 'Others', '2019-04-10 11:51:30', 1, '0000-00-00 00:00:00', 0, 'Active', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
  ADD PRIMARY KEY (`msg_of_day_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
  MODIFY `msg_of_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
