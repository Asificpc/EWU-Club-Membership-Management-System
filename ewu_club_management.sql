-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:4306
-- Generation Time: Aug 13, 2026 at 11:11 PM
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
-- Database: `ewu_club_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `password`, `phone`) VALUES
(1, 'System Administrator', 'admin@ewubd.edu', 'admin123', '01712345678'),
(2, 'Club Coordinator', 'coordinator@ewubd.edu', 'admin123', '01812345678');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `advisor_name` varchar(100) DEFAULT NULL,
  `founded_year` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `club_name`, `category`, `advisor_name`, `founded_year`, `description`) VALUES
(1, 'Computer Programming Club', 'Technology', 'Dr. Ahmed', '2015', 'Programming and coding activities'),
(2, 'Robotics Club', 'Technology', 'Dr. Rahman', '2017', 'Robotics and automation activities'),
(3, 'Debating Club', 'Academic', 'Dr. Karim', '2014', 'Debate competitions and public speaking'),
(4, 'Business Club', 'Business', 'Dr. Hasan', '2016', 'Business case competitions and entrepreneurship'),
(5, 'Sports Club', 'Sports', 'Dr. Islam', '2013', 'Sports events and tournaments'),
(6, 'English Language Club', 'Language', 'Dr. Akter', '2018', 'English communication and language learning');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `club_id`, `event_name`, `event_date`, `venue`, `description`) VALUES
(1, 1, 'Code Fest 2026', '2026-03-10', 'EWU Auditorium', 'Annual programming competition'),
(2, 2, 'Robo Challenge', '2026-03-15', 'Lab-201', 'Robotics competition'),
(3, 3, 'Debate Championship', '2026-03-20', 'Seminar Hall', 'Inter-university debate competition'),
(4, 4, 'Business Case Competition', '2026-03-25', 'Conference Room', 'Business case solving contest'),
(5, 5, 'Annual Sports Meet', '2026-04-05', 'EWU Playground', 'Sports tournament'),
(6, 6, 'English Speaking Contest', '2026-04-10', 'Room-501', 'English communication competition');

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

CREATE TABLE `event_registration` (
  `registration_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `attendance_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_registration`
--

INSERT INTO `event_registration` (`registration_id`, `event_id`, `student_id`, `registration_date`, `attendance_status`) VALUES
(1, 1, 1, '2026-03-01', 'Present'),
(2, 2, 2, '2026-03-02', 'Present'),
(3, 3, 3, '2026-03-03', 'Absent'),
(4, 4, 4, '2026-03-04', 'Present'),
(5, 5, 5, '2026-03-05', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `join_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `member_role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `student_id`, `club_id`, `join_date`, `status`, `member_role`) VALUES
(1, 1, 1, '2026-01-15', 'Active', 'Member'),
(2, 2, 2, '2026-01-20', 'Active', 'Member'),
(3, 3, 3, '2026-02-01', 'Active', 'Secretary'),
(4, 4, 4, '2026-02-10', 'Pending', 'Member'),
(5, 5, 5, '2026-02-15', 'Active', 'President');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(30) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `membership_id`, `amount`, `payment_date`, `payment_method`, `payment_status`) VALUES
(1, 1, 500.00, '2026-01-16', 'Bkash', 'Paid'),
(2, 2, 500.00, '2026-01-21', 'Nagad', 'Paid'),
(3, 3, 500.00, '2026-02-02', 'Cash', 'Paid'),
(4, 4, 500.00, '2026-02-11', 'Bkash', 'Pending'),
(5, 5, 500.00, '2026-02-16', 'Card', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_phone` varchar(15) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `batch` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL DEFAULT '1234',
  `role` varchar(20) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_phone`, `department`, `batch`, `password`, `role`) VALUES
(1, 'Asif', 'asif@ewubd.edu', '01711111111', 'CSE', '61', '1234', 'User'),
(2, 'Eva', 'eva@ewubd.edu', '01822222222', 'BBA', '60', '1234', 'User'),
(3, 'Surojit', 'surojit@ewubd.edu', '01933333333', 'EEE', '59', '1234', 'User'),
(4, 'Nusrat', 'nusrat@ewubd.edu', '01644444444', 'CSE', '61', '1234', 'User'),
(5, 'Fahim', 'fahim@ewubd.edu', '01555555555', 'Pharmacy', '58', '1234', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `membership_id` (`membership_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD CONSTRAINT `event_registration_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `event_registration_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`membership_id`) REFERENCES `membership` (`membership_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
