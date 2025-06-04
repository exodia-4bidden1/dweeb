-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 06:00 PM
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
-- Database: `justincase_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `type` enum('laptop','phone') NOT NULL,
  `status` enum('available','borrowed','maintenance','unavailable') DEFAULT 'available',
  `specs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`specs`)),
  `added_by` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `name`, `model`, `type`, `status`, `specs`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'MacBook Pro 16\"', '2023 M2 Pro', 'laptop', 'available', '{\"Processor\":\"Apple M2 Pro\",\"RAM\":\"16GB\",\"Storage\":\"512GB SSD\",\"Display\":\"16.2\\\" Retina\"}', '2023-101010', '2025-06-01 10:21:18', '2025-06-01 10:21:18'),
(2, 'iPhone 15 Pro', '2023', 'phone', 'available', '{\"Processor\":\"A17 Pro\",\"RAM\":\"8GB\",\"Storage\":\"256GB\",\"Display\":\"6.7\\\" OLED\"}', '2023-101010', '2025-06-01 10:21:18', '2025-06-01 10:21:18'),
(3, 'MacBook Pro 16\"', '2023 M2 Pro', 'laptop', 'available', '{\"Processor\":\"Apple M2 Pro\",\"RAM\":\"16GB\",\"Storage\":\"512GB SSD\",\"Display\":\"16.2\\\" Retina\"}', '2023-101010', '2025-06-01 10:55:54', '2025-06-01 10:55:54'),
(4, 'Dell XPS 13', '9310', 'laptop', 'available', '{\"Processor\":\"Intel i7-1165G7\",\"RAM\":\"16GB\",\"Storage\":\"1TB SSD\",\"Display\":\"13.4\\\" FHD+\"}', '2023-101010', '2025-06-01 10:55:54', '2025-06-01 10:55:54'),
(5, 'HP Spectre x360', '14-ea0023dx', 'laptop', 'maintenance', '{\"Processor\":\"Intel i7-1165G7\",\"RAM\":\"16GB\",\"Storage\":\"512GB SSD\",\"Display\":\"13.5\\\" OLED\"}', '2023-101010', '2025-06-01 10:55:54', '2025-06-01 10:55:54'),
(6, 'iPhone 15 Pro', '2023', 'phone', 'available', '{\"Processor\":\"A17 Pro\",\"RAM\":\"8GB\",\"Storage\":\"256GB\",\"Display\":\"6.7\\\" OLED\"}', '2023-101010', '2025-06-01 10:55:54', '2025-06-01 10:55:54'),
(7, 'Samsung Galaxy S23 Ultra', 'SM-S918B', 'phone', 'borrowed', '{\"Processor\":\"Snapdragon 8 Gen 2\",\"RAM\":\"12GB\",\"Storage\":\"512GB\",\"Display\":\"6.8\\\" AMOLED\"}', '2023-101010', '2025-06-01 10:55:54', '2025-06-01 10:55:54'),
(8, 'Google Pixel 8', 'G9BQD', 'phone', 'available', '{\"Processor\":\"Google Tensor G3\",\"RAM\":\"8GB\",\"Storage\":\"128GB\",\"Display\":\"6.2\\\" OLED\"}', '2023-101010', '2025-06-01 10:55:54', '2025-06-01 10:55:54'),
(9, 'Lenovo ThinkPad X1 Carbon', 'Gen 11', 'laptop', 'unavailable', '{\"Processor\":\"Intel i7-1355U\",\"RAM\":\"32GB\",\"Storage\":\"1TB SSD\",\"Display\":\"14\\\" WUXGA\"}', '2023-101010', '2025-06-01 10:55:54', '2025-06-01 10:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `device_history`
--

CREATE TABLE `device_history` (
  `history_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `action` enum('borrowed','returned','maintenance','damaged') NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(11) NOT NULL,
  `nu_email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `nu_email`, `first_name`, `last_name`, `password`, `created_at`) VALUES
('2023-101010', 'johndoe@nu-dasma.edu.ph', 'John', 'Doe', '$2y$10$98AzfpSSMw7nlLwxQ4lmU.3mpfFb8DHzDJVVK8QphxF9l0JKgk142', '2025-05-31 08:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `type` enum('reservation','approval','reminder','system') NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `student_id`, `title`, `message`, `type`, `is_read`, `created_at`) VALUES
(3, '2023-172077', 'Test Notification', 'This is a test notification.', 'system', 0, '2025-06-01 12:38:55'),
(4, '2023-172077', 'Reservation Submitted', 'Your reservation request was submitted and is waiting for faculty approval.', 'reservation', 0, '2025-06-04 13:15:42'),
(5, '2023-172077', 'Reservation Submitted', 'Your reservation request was submitted and is waiting for faculty approval.', 'reservation', 0, '2025-06-04 14:35:36'),
(6, '2023-172077', 'Reservation Submitted', 'Your reservation request was submitted and is waiting for faculty approval.', 'reservation', 0, '2025-06-04 14:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `other_purpose` text DEFAULT NULL,
  `borrow_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('pending','approved','rejected','completed','cancelled') DEFAULT 'pending',
  `faculty_id` varchar(11) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `student_id`, `device_id`, `purpose`, `other_purpose`, `borrow_date`, `start_time`, `end_time`, `status`, `faculty_id`, `approved_at`, `created_at`, `updated_at`) VALUES
(1, '2023-172077', 1, 'Research', '', '2025-06-02', '01:00:00', '02:00:00', 'completed', NULL, NULL, '2025-06-01 12:05:55', '2025-06-04 14:08:26'),
(2, '2023-172077', 4, 'Research', '', '2025-06-05', '02:00:00', '03:00:00', 'completed', NULL, NULL, '2025-06-04 13:15:42', '2025-06-04 14:51:41'),
(3, '2023-172077', 8, 'Research', '', '2025-06-05', '01:00:00', '03:00:00', 'completed', NULL, NULL, '2025-06-04 14:35:36', '2025-06-04 14:52:28'),
(4, '2023-172077', 6, 'Training', '', '2025-06-06', '01:00:00', '05:00:00', 'approved', NULL, NULL, '2025-06-04 14:49:10', '2025-06-04 14:50:12'),
(5, '2023-172077', 8, 'Research', '', '2025-06-05', '01:00:00', '03:00:00', 'completed', NULL, NULL, '2025-06-04 14:35:36', '2025-06-04 14:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(11) NOT NULL,
  `nu_email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `nu_email`, `first_name`, `last_name`, `year_level`, `contact_num`, `program`, `password`, `created_at`) VALUES
('2023-172077', 'capellancz@students.nu-dasma.edu.ph', 'Catherine', 'Capellan', '1', '09931026109', 'IT', '$2y$10$UDi8qFxKkLFLHeTXytvlfel.cZ8SPmuF4ibVdHJPaxAm.NSlsFMO.', '2025-05-31 08:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_agreements`
--

CREATE TABLE `user_agreements` (
  `agreement_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `agreement_accepted` tinyint(1) DEFAULT 0,
  `accepted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `device_history`
--
ALTER TABLE `device_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `nu_email` (`nu_email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `nu_email` (`nu_email`);

--
-- Indexes for table `user_agreements`
--
ALTER TABLE `user_agreements`
  ADD PRIMARY KEY (`agreement_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `device_history`
--
ALTER TABLE `device_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_agreements`
--
ALTER TABLE `user_agreements`
  MODIFY `agreement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE;

--
-- Constraints for table `device_history`
--
ALTER TABLE `device_history`
  ADD CONSTRAINT `device_history_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `device_history_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `device_history_ibfk_3` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE SET NULL;

--
-- Constraints for table `user_agreements`
--
ALTER TABLE `user_agreements`
  ADD CONSTRAINT `user_agreements_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
