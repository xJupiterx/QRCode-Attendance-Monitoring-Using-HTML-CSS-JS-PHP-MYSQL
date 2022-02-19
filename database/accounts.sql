-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 08:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `compiled_attendance`
--

CREATE TABLE `compiled_attendance` (
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `course_yearlevel_section` varchar(50) NOT NULL,
  `subject1` varchar(255) NOT NULL,
  `ontime1_late1_absent1` varchar(255) NOT NULL,
  `subject2` varchar(255) NOT NULL,
  `ontime2_late2_absent2` varchar(255) NOT NULL,
  `subject3` varchar(255) NOT NULL,
  `ontime3_late3_absent3` varchar(255) NOT NULL,
  `subject4` varchar(255) NOT NULL,
  `ontime4_late4_absent4` varchar(255) NOT NULL,
  `subject5` varchar(255) NOT NULL,
  `ontime5_late5_absent5` varchar(255) NOT NULL,
  `subject6` varchar(255) NOT NULL,
  `ontime6_late6_absent6` varchar(255) NOT NULL,
  `subject7` varchar(255) NOT NULL,
  `ontime7_late7_absent7` varchar(255) NOT NULL,
  `subject8` varchar(255) NOT NULL,
  `ontime8_late8_absent8` varchar(255) NOT NULL,
  `subject9` varchar(255) NOT NULL,
  `ontime9_late9_absent9` varchar(255) NOT NULL,
  `subject10` varchar(255) NOT NULL,
  `ontime10_late10_absent10` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `ays` varchar(50) NOT NULL,
  `aye` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_enrolled`
--

CREATE TABLE `courses_enrolled` (
  `student_id` varchar(255) DEFAULT NULL,
  `subject1` varchar(255) DEFAULT NULL,
  `section1` varchar(255) DEFAULT NULL,
  `subject2` varchar(255) DEFAULT NULL,
  `section2` varchar(255) DEFAULT NULL,
  `subject3` varchar(255) DEFAULT NULL,
  `section3` varchar(255) DEFAULT NULL,
  `subject4` varchar(255) DEFAULT NULL,
  `section4` varchar(255) DEFAULT NULL,
  `subject5` varchar(255) DEFAULT NULL,
  `section5` varchar(255) DEFAULT NULL,
  `subject6` varchar(255) DEFAULT NULL,
  `section6` varchar(255) DEFAULT NULL,
  `subject7` varchar(255) DEFAULT NULL,
  `section7` varchar(255) DEFAULT NULL,
  `subject8` varchar(255) DEFAULT NULL,
  `section8` varchar(255) DEFAULT NULL,
  `subject9` varchar(255) DEFAULT NULL,
  `section9` varchar(255) DEFAULT NULL,
  `subject10` varchar(255) DEFAULT NULL,
  `section10` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `academic_year_start` varchar(255) DEFAULT NULL,
  `academic_year_end` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loaded_subjects`
--

CREATE TABLE `loaded_subjects` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `sched1` varchar(255) NOT NULL,
  `sched2` varchar(255) NOT NULL,
  `sched3` varchar(255) NOT NULL,
  `sched4` varchar(255) NOT NULL,
  `sched5` varchar(255) NOT NULL,
  `sched6` varchar(255) NOT NULL,
  `sched7` varchar(255) NOT NULL,
  `sched8` varchar(255) NOT NULL,
  `sched9` varchar(255) NOT NULL,
  `AY_start` varchar(255) NOT NULL,
  `AY_end` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recent_schedule`
--

CREATE TABLE `recent_schedule` (
  `schedule_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `timein` varchar(255) DEFAULT NULL,
  `timeout` varchar(255) DEFAULT NULL,
  `date_of_schedule` varchar(255) DEFAULT NULL,
  `sched_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `student_id` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `stud_time_in` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `academic_year_start` varchar(255) DEFAULT NULL,
  `academic_year_end` varchar(255) DEFAULT NULL,
  `date_of_schedule` varchar(255) DEFAULT NULL,
  `attendance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accesslevel` varchar(50) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`lastname`, `firstname`, `middlename`, `username`, `email`, `password`, `accesslevel`, `status`) VALUES
('My_lastname', 'My_firsname', 'My_middlename', 'sysadmin', 'myemail@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'SYSTEMADMIN', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recent_schedule`
--
ALTER TABLE `recent_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recent_schedule`
--
ALTER TABLE `recent_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
