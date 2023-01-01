-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 10:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odlms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `schedule` datetime NOT NULL,
  `client_id` int(30) NOT NULL,
  `prescription_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `code`, `schedule`, `client_id`, `prescription_path`, `status`, `date_created`, `date_updated`) VALUES
(1, '202201-0001', '2022-01-11 15:30:00', 2, '1_sample.pdf?v=1641884206', 6, '2022-01-11 14:06:30', '2022-01-11 16:11:57'),
(3, '202201-0002', '2022-01-11 17:00:00', 5, 'test.pdf?v=1641891660', 2, '2022-01-11 17:01:00', '2022-01-11 17:03:30'),
(4, '202201-0003', '2022-01-13 10:00:00', 2, '', 0, '2022-01-11 17:07:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_test_list`
--

CREATE TABLE `appointment_test_list` (
  `appointment_id` int(30) NOT NULL,
  `test_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_test_list`
--

INSERT INTO `appointment_test_list` (`appointment_id`, `test_id`, `date_created`) VALUES
(1, 1, '2022-01-11 14:06:30'),
(1, 3, '2022-01-11 14:06:30'),
(1, 1, '2022-01-11 14:14:13'),
(1, 3, '2022-01-11 14:14:13'),
(1, 1, '2022-01-11 14:15:45'),
(1, 3, '2022-01-11 14:15:45'),
(1, 1, '2022-01-11 14:15:57'),
(1, 3, '2022-01-11 14:15:57'),
(1, 1, '2022-01-11 14:16:34'),
(1, 3, '2022-01-11 14:16:34'),
(1, 1, '2022-01-11 14:16:39'),
(1, 3, '2022-01-11 14:16:39'),
(1, 1, '2022-01-11 14:17:44'),
(1, 3, '2022-01-11 14:17:44'),
(1, 1, '2022-01-11 14:48:09'),
(1, 3, '2022-01-11 14:48:09'),
(1, 1, '2022-01-11 14:56:46'),
(1, 3, '2022-01-11 14:56:46'),
(3, 2, '2022-01-11 17:01:00'),
(3, 5, '2022-01-11 17:01:00'),
(3, 4, '2022-01-11 17:01:00'),
(4, 3, '2022-01-11 17:07:05'),
(4, 5, '2022-01-11 17:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `email`, `password`, `dob`, `address`, `avatar`, `delete_flag`, `date_created`, `date_updated`) VALUES
(2, 'Claire', 'C', 'Blake', 'Female', '09456789123', 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', '1997-10-14', 'Sample Address only', 'uploads/client-2.png?v=1641873547', 0, '2022-01-11 11:35:33', '2022-01-11 16:34:07'),
(5, 'John', 'D', 'Smith', 'Male', '09456789123', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', '1997-07-15', 'Sample ADdress only.', 'uploads/client-5.png?v=1641891731', 0, '2022-01-11 16:56:43', '2022-01-11 17:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `history_list`
--

CREATE TABLE `history_list` (
  `id` int(30) NOT NULL,
  `appointment_id` int(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_list`
--

INSERT INTO `history_list` (`id`, `appointment_id`, `status`, `remarks`, `date_created`) VALUES
(2, 1, 1, 'Appointment has been approved.', '2022-01-11 15:47:27'),
(10, 3, 1, 'Appointment has been approved.', '2022-01-11 17:03:08'),
(11, 3, 2, 'Samples has been collected.', '2022-01-11 17:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Online Diagnostic Lab Management System'),
(6, 'short_name', 'ODLMS - PHP'),
(11, 'logo', 'uploads/logo-1641866302.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1641866302.png');

-- --------------------------------------------------------

--
-- Table structure for table `test_list`
--

CREATE TABLE `test_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `cost` float NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_list`
--

INSERT INTO `test_list` (`id`, `name`, `description`, `cost`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'CT scan', 'A CT (computed tomography) scan is a type of x-ray that creates 3-dimensional images of your body, including bones, organs, tissues and tumours. The machine moves in a circular motion around you and takes x-rays of very thin slices of your body to create a cross-sectional image.', 2500, 1, 0, '2022-01-11 10:20:35', NULL),
(2, 'Electrocardiogram (ECG)', 'An ECG is a graph of your heart\'s electrical activity. It is a safe test. There is no risk of being electrocuted.', 1500, 1, 0, '2022-01-11 10:21:20', NULL),
(3, 'Magnetic Resonance Imaging (MRI) Scan', 'A magnetic resonance imaging (MRI) scan takes detailed pictures of the inside of the body. It can show up problems in the soft tissues without the need for surgery. It is also useful for planning some treatments of the same areas.', 2500, 1, 0, '2022-01-11 10:22:06', NULL),
(4, 'X-Rays', 'An x-ray uses radiation to create a picture of the inside of the body. The x-ray beam is absorbed differently by various structures in the body, such as bones and soft tissues, and this is used to create the image. X-ray is also known as radiography.', 750, 1, 0, '2022-01-11 10:22:41', NULL),
(5, 'Ultrasound', 'An ultrasound scan creates a real-time picture of the inside of the body using sound waves. Ultrasound is generally painless and non-invasive. Ultrasound works differently to x-ray in that it does not use radiation.', 1500, 1, 0, '2022-01-11 10:23:07', NULL),
(6, 'Sample 101', ' To Be Deleted', 123, 0, 1, '2022-01-11 10:23:18', '2022-01-11 10:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1639468007', NULL, 1, 1, '2021-01-20 14:02:37', '2021-12-14 15:47:08'),
(6, 'Claire', NULL, 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', 'uploads/avatar-6.png?v=1641629093', NULL, 2, 1, '2022-01-08 16:04:17', '2022-01-08 16:04:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `appointment_test_list`
--
ALTER TABLE `appointment_test_list`
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_list`
--
ALTER TABLE `history_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`appointment_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_list`
--
ALTER TABLE `test_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_list`
--
ALTER TABLE `history_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `test_list`
--
ALTER TABLE `test_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD CONSTRAINT `appointment_list_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_test_list`
--
ALTER TABLE `appointment_test_list`
  ADD CONSTRAINT `appointment_test_list_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_test_list_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history_list`
--
ALTER TABLE `history_list`
  ADD CONSTRAINT `history_list_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
