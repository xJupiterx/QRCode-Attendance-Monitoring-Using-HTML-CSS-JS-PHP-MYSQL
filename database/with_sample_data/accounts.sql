-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 08:00 AM
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

--
-- Dumping data for table `compiled_attendance`
--

INSERT INTO `compiled_attendance` (`student_id`, `firstname`, `middlename`, `lastname`, `course_yearlevel_section`, `subject1`, `ontime1_late1_absent1`, `subject2`, `ontime2_late2_absent2`, `subject3`, `ontime3_late3_absent3`, `subject4`, `ontime4_late4_absent4`, `subject5`, `ontime5_late5_absent5`, `subject6`, `ontime6_late6_absent6`, `subject7`, `ontime7_late7_absent7`, `subject8`, `ontime8_late8_absent8`, `subject9`, `ontime9_late9_absent9`, `subject10`, `ontime10_late10_absent10`, `semester`, `ays`, `aye`) VALUES
('2021010379', 'Christine Joy', 'Destor', 'Conejos', 'BSCS1-1', 'FILI3', '3_0_0', 'SOCS1A', '3_0_1', 'CSPC60', '1_0_0', 'COSC15', '2_0_0', 'PROG1', '0_2_0', 'COSC18', '6_1_0', 'MATH1A', '2_0_0', 'PHED1', '0_0_0', 'ENGL1A', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010080', 'Aeron', 'Legan', 'Amon', 'BSCS1-1', 'COSC18', '2_2_3', 'SOCS1A', '3_0_1', 'CSPC60', '1_0_0', 'COSC15', '1_0_1', 'PROG1', '0_0_2', 'FILI3', '1_0_1', 'MATH1A', '2_0_0', 'PHED1', '0_0_0', 'ENGL1A', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010406', 'Andrei Mari ', 'Bautista ', 'Cuadra ', 'BSCS1-1', 'COSC18', '2_0_5', 'COSC15 ', '0_0_0', 'PROG1', '0_0_2', 'MATH1A', '1_0_1', 'PHED1', '0_0_0', 'CSPC60', '0_0_1', 'SOCS1A', '2_0_2', 'ENGL1A', '0_0_0', 'NSTP1', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021011383', 'Caila Joy', '', 'Villamin', 'BSCS1-1', 'PROG1', '0_0_2', 'COSC18', '1_0_6', 'COSC15', '0_0_2', 'NSTP1', '0_0_0', 'MATH1A', '1_0_1', 'CSCP60', '0_0_0', 'PHED1', '0_0_0', 'SOCS1A', '2_0_2', 'ENGL1A', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010668', 'Jerold', 'Buganan', 'Gomez', 'BSCS1-1', 'COSC18', '1_0_6', 'ENGL1A', '0_0_0', 'SOCS1A', '2_0_2', 'CSPC60', '0_0_1', 'NSTP1', '0_0_0', 'COSC15', '0_0_2', 'MATH1A', '0_0_2', 'PROG1', '0_0_2', 'PHED1', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2020020195', 'Paul Edward', 'Vidallo', 'Triño', 'BSCS1-1', 'COSC15', '0_0_2', 'COSC18', '2_0_5', 'CSPC60', '0_0_1', 'ENGL1A', '0_0_0', 'MATH1A', '0_0_2', 'NSTP1', '0_0_0', 'PHED1', '0_0_0', 'SCSBC1', '0_0_0', 'SOCS1A', '1_0_3', '', '', '1st Semester', '2021', '2022'),
('2021010792', 'Bea', 'Ontog', 'Lucero', 'BSCS1-1', 'COSC15', '0_0_2', 'COSC18', '1_0_6', 'NSTP1', '0_0_0', 'ENGL1A', '0_0_0', 'SOCS1A', '1_1_2', 'CSPC60', '0_0_1', 'MATH1A', '0_0_2', 'PHED1', '0_0_0', 'PROG1', '0_0_2', '', '', '1st Semester', '2021', '2022'),
('2021010527', 'Jessica', 'Valler', 'Doctor', 'BSCS1-1', 'COSC18', '0_0_7', 'SOCS1A', '0_0_4', 'MATH1A', '0_0_2', 'PHED1', '0_0_0', 'ENGL1A', '0_0_0', 'CSPC60', '0_0_1', 'NSTP1', '0_0_0', 'COSC15', '1_0_1', 'PROG1', '0_1_1', '', '', '1st Semester', '2021', '2022'),
('2021010523', 'Cherwin Grace', 'Burgos', 'Diomampo', 'BSCS1-1', 'COSC15', '0_0_2', 'COSC18', '0_0_7', 'MATH1A', '0_0_2', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', 'PROG1', '0_0_2', 'ENGL1A', '0_0_0', 'CSPC60', '0_0_1', 'SOCS1A', '0_0_4', '', '', '1st Semester', '2021', '2022'),
('2021010834', 'John Patrick', 'Sangalang', 'Manalo', 'BSCS1-1', 'COSC15', '0_0_4', 'ENGL1A', '0_0_0', 'SOCS1A', '0_0_4', 'CSPC60', '0_0_1', 'NSTP1', '0_0_0', 'COSC15', '0_0_4', 'MATH1A', '0_0_2', 'PROG1', '0_0_2', 'PHED1', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010517', 'Angelika', 'Ellao', 'Dimaranan', 'BSCS1-1', 'PROG1', '0_0_2', 'COSC15', '0_0_2', 'COSC18', '0_0_7', 'CSPC60', '0_0_1', 'ENGL1A', '0_0_0', 'SOCS1A', '0_0_4', 'NSTP1', '0_0_0', 'MATH1A', '0_0_2', 'PHED1', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010927', 'Antoinette', 'Fullo ', 'Nadala ', 'BSCS1-1', 'COSC18', '0_0_7', 'ENG1A', '0_0_0', 'SOCS1A ', '0_0_0', 'CSPC60 ', '0_0_0', 'NSTP1 ', '0_0_0', 'COSC15', '0_0_2', ' MATH1A', '0_0_0', ' PROG1', '0_0_0', 'PHED1 ', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021011439', 'Job Lenard', 'Eguia', 'Villanueva', 'BSCS1-1', 'COSC15', '0_0_2', 'COSC18', '0_0_7', 'CSPC60', '0_0_1', 'ENGL1A', '0_0_0', 'MATH1A', '0_0_2', 'NSTP1', '0_0_0', 'PHED1', '0_0_0', 'SCSBC1', '0_0_0', 'SOCS1A', '0_0_4', '', '', '1st Semester', '2021', '2022'),
('2020020162', 'Frank Cedric', 'Feria', 'Redicio', 'BSCS1-1', 'COSC18', '0_0_7', 'ENGL1A', '0_0_0', 'SOCS1A', '0_0_4', 'CSPC60', '0_0_1', 'NSTP1', '0_0_0', 'COSC15', '0_0_2', 'MATH1A', '0_0_2', 'PROG1', '0_0_2', 'PHED1', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2020020025', 'Marknel', 'Vitancor', 'Asia', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC70', '0_0_0', 'ITEC18', '0_0_0', 'ENGL1A', '0_0_0', 'PROG1', '0_0_0', 'MATH1A', '0_0_0', 'SOCS1A', '0_0_0', 'PHED1', '0_0_0', '', '', '', '', '1st Semester', '2021', '2022'),
('2021011197', 'Joshua', 'Potian', 'Sabao', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC18', '0_0_0', 'ITEC70', '0_0_0', 'ENGL1A', '0_0_0', 'MATH1', '0_0_0', 'PHED1', '0_0_0', '', '', '', '', '', '', '', '', '1st Semester', '2021', '2022'),
('2021010784', 'Rose Ann', 'Monsera', 'Lorca', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC70', '0_0_0', 'ENGL1A', '0_0_0', 'SOCS1A', '0_0_0', 'PROG1', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021011130', 'Gizelle Ann', 'Cosa', 'Rivera', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC70', '0_0_0', 'ENGL1A', '0_0_0', 'SOCS1A', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', '', '', '', '', '1st Semester', '2021', '2022'),
('2021010407', 'Jaimeelyn', 'Servida', 'Cuadra', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC70', '0_0_0', 'ENGL1A', '0_0_0', 'SOCS1A', '0_0_0', 'PROG1', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010563', 'John', 'Dolindo', 'Eñoza', 'BSIT1-2', 'ITEC16', '0_0_0', 'ITEC71', '0_0_0', 'ENGL1A', '0_0_0', 'SOCS1A', '0_0_0', 'PROG2', '0_0_0', 'MATH1A', '0_0_0', 'ITEC19', '0_0_0', 'PHED2', '0_0_0', 'NSTP2', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010306', 'Russel', 'Revillame', 'Camacho', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC70', '0_0_0', 'ENGL1A', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', '', '', '', '', '', '', '1st Semester', '2021', '2022'),
('2021011343', 'Veronica', 'Sanchez', 'Valero', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC70', '0_0_0', 'ENGL1A', '0_0_0', 'PROG1', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', 'SOCS1A', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010453', 'Ize Josh Zier', 'Poblete', 'De Silva', 'BSIT1-2', 'ITEC15', '0_0_0', 'ITEC70', '0_0_0', 'ENGL1A', '0_0_0', 'PROG1', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', 'SOCS1A', '0_0_0', '', '', '1st Semester', '2021', '2022'),
('2021010849', 'Jayvee', 'Salvador', 'Marges', 'BSIT1-2', 'ITEC70', '0_0_0', 'ITEC15', '0_0_0', 'ENGL1A', '0_0_0', 'PROG1', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', '', '', '', '', '1st Semester', '2021', '2022'),
('2021010289', 'Daniel', 'Tipora', 'Cadacio ', 'BSIT1-2', 'ITEC71', '0_0_0', 'ITEC15', '0_0_0', 'ENGL1A', '0_0_0', 'PROG1', '0_0_0', 'MATH1A', '0_0_0', 'ITEC18', '0_0_0', 'PHED1', '0_0_0', 'NSTP1', '0_0_0', '', '', '', '', '1st Semester', '2021', '2022'),
('1801561', 'Joseph', 'Lagunsin', 'Delim', 'BSIT4-3', 'STAT1', '0_0_0', 'SOCS3', '0_0_0', 'ITEC69', '0_0_0', 'ITEC100B', '0_0_0', '', '', '', '', '', '', '', '', '', '', '', '', '1st Semester', '2021', '2022');

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

--
-- Dumping data for table `courses_enrolled`
--

INSERT INTO `courses_enrolled` (`student_id`, `subject1`, `section1`, `subject2`, `section2`, `subject3`, `section3`, `subject4`, `section4`, `subject5`, `section5`, `subject6`, `section6`, `subject7`, `section7`, `subject8`, `section8`, `subject9`, `section9`, `subject10`, `section10`, `semester`, `academic_year_start`, `academic_year_end`) VALUES
('2021010379', 'FILI3', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010080', 'COSC18', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'FILI3', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010406', 'COSC18', 'Same as my Current Section', 'COSC15 ', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021011383', 'PROG1', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'CSCP60', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010668', 'COSC18', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2020020195', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'SCSBC1', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010792', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010527', 'COSC18', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010523', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010834', 'COSC15', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010517', 'PROG1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010927', 'COSC18', 'Same as my Current Section', 'ENG1A', 'Same as my Current Section', 'SOCS1A ', 'Same as my Current Section', 'CSPC60 ', 'Same as my Current Section', 'NSTP1 ', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', ' MATH1A', 'Same as my Current Section', ' PROG1', 'Same as my Current Section', 'PHED1 ', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021011439', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'SCSBC1', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2020020162', 'COSC18', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2020020025', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '', '', '1st Semester', '2021', '2022'),
('2021011197', 'ITEC15', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'MATH1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '', '', '', '', '', '', '1st Semester', '2021', '2022'),
('2021010784', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021011130', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '1st Semester', '2021', '2022'),
('2021010407', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010563', 'ITEC16', 'Same as my Current Section', 'ITEC71', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'PROG2', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC19', 'Same as my Current Section', 'PHED2', 'Same as my Current Section', 'NSTP2', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010306', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '', '', '1st Semester', '2021', '2022'),
('2021011343', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010453', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', '', '', '1st Semester', '2021', '2022'),
('2021010849', 'ITEC70', 'Same as my Current Section', 'ITEC15', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '1st Semester', '2021', '2022'),
('2021010289', 'ITEC71', 'Same as my Current Section', 'ITEC15', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '1st Semester', '2021', '2022'),
('1801561', 'STAT1', 'Same as my Current Section', 'SOCS3', 'Same as my Current Section', 'ITEC69', 'Same as my Current Section', 'ITEC100B', 'Same as my Current Section', '', '', '', '', '', '', '', '', '', '', '', '', '1st Semester', '2021', '2022');

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

--
-- Dumping data for table `loaded_subjects`
--

INSERT INTO `loaded_subjects` (`username`, `email`, `firstname`, `lastname`, `middlename`, `sched1`, `sched2`, `sched3`, `sched4`, `sched5`, `sched6`, `sched7`, `sched8`, `sched9`, `AY_start`, `AY_end`, `semester`) VALUES
('jupiter', 'jhonpeter.jamiladan@citycollegeoftagaytay.edu.ph', 'Jhon Peter', 'Jamiladan', 'Zamora', 'FILI3:BSCS1-1', 'SOCS1A:BSCS1-1', 'COSC15:BSCS1-1', 'CSPC60:BSCS1-1', 'PROG1:BSCS1-1', '', '', '', '', '2021', '2022', '1'),
('xiaoxii', 'wenwen.mayuga@citycollegeoftagaytay.edu.ph', 'Wenwen', 'Mayuga', 'Balba', 'MATH1A:BSCS1-1', 'PHED1 :BSCS1-1', '', '', '', '', '', '', '', '2021', '2022', '1');

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

--
-- Dumping data for table `recent_schedule`
--

INSERT INTO `recent_schedule` (`schedule_id`, `subject`, `section`, `timein`, `timeout`, `date_of_schedule`, `sched_status`) VALUES
(1, 'COSC18', 'BSCS1-1', '14:00', '16:00', '2021/10/29', 'END'),
(2, 'SOCS1A', 'BSCS1-1', '14:00', '16:00', '2021/10/29', 'END'),
(3, 'CSPC60', 'BSCS1-1', '14:30', '18:30', '2021/10/30', 'END'),
(4, 'PROG1', 'BSCS1-1', '15:00', '18:00', '2021/10/30', 'END'),
(5, 'COSC18', 'BSCS1-1', '15:30', '18:30', '2021/10/30', 'END'),
(9, 'COSC18', 'BSCS1-1', '09:30', '11:30', '2021/11/3', 'END'),
(10, 'FILI3', 'BSCS2-2', '10:00', '12:00', '2021/11/3', 'END'),
(11, 'COSC18', 'BSCS1-1', '13:30', '14:00', '2021/11/9', 'END'),
(12, 'PROG1', 'BSCS1-1', '19:00', '21:00', '2021/11/9', 'END'),
(13, 'COSC18', 'BSCS1-1', '11:00', '13:00', '2021/11/13', 'END'),
(22, 'COSC15', 'BSCS1-1', '15:23', '15:27', '2021/11/23', 'END'),
(23, 'COSC18', 'BSCS1-1', '09:32', '09:52', '2021/11/24', 'END'),
(25, 'SOCS1A', 'BSCS1-1', '09:17', '09:18', '2022/01/16', 'END'),
(26, 'FILI3', 'BSCS1-1', '20:42', '20:54', '2022/01/17', 'END'),
(27, 'FILI3', 'BSCS1-1', '21:48', '21:49', '2022/01/30', 'END'),
(28, 'SOCS1A', 'BSCS1-1', '23:45', '23:47', '2022/01/30', 'END'),
(29, 'MATH1A', 'BSCS1-1', '00:01', '00:03', '2022/01/30', 'END'),
(30, 'FILI3', 'BSCS1-1', '21:52', '', '2022/02/3', 'ON-GOING'),
(31, 'SOCS1A', 'BSCS1-1', '03:18', '03:21', '2022/02/3', 'END'),
(32, 'MATH1A', 'BSCS1-1', '03:33', '03:34', '2022/02/3', 'END'),
(33, 'COSC15', 'BSCS1-1', '03:42', '03:42', '2022/02/3', 'END');

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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `lastname`, `firstname`, `middlename`, `username`, `email`, `password`, `course`, `year`, `section`) VALUES
('2021010379', 'Conejos', 'Christine Joy', 'Destor', '2021010379', 'christinejoy.conejos@citycollegeoftagaytay.edu.ph', 'Conejos', 'BSCS', '1', '1'),
('2021010080', 'Amon', 'Aeron', 'Legan', '2021010080', 'aeron.amon@citycollegeoftagaytay.edu.ph', 'Amon', 'BSCS', '1', '1'),
('2021010406', 'Cuadra ', 'Andrei Mari ', 'Bautista ', '2021010406', 'andreimari.cuadra@citycollegeoftagaytay.edu.ph', 'Cuadra ', 'BSCS', '1', '1'),
('2021011383', 'Villamin', 'Caila Joy', '', '2021011383', 'cailajoy.villamin@citycollegeoftagaytay.edu.ph', 'Villamin', 'BSCS', '1', '1'),
('2021010668', 'Gomez', 'Jerold', 'Buganan', '2021010668', 'jerold.gomez@citycollegeoftagaytay.edu.ph', 'Gomez', 'BSCS', '1', '1'),
('2020020195', 'Triño', 'Paul Edward', 'Vidallo', '2020020195', 'pauledward.trino@citycollegeoftagaytay.edu.ph', 'Triño', 'BSCS', '1', '1'),
('2021010792', 'Lucero', 'Bea', 'Ontog', '2021010792', 'bea.lucero@citycollegeoftagaytay.edu.ph', 'Lucero', 'BSCS', '1', '1'),
('2021010527', 'Doctor', 'Jessica', 'Valler', '2021010527', 'jessica.doctor@citycollegeoftagaytay.edu.ph', 'Doctor', 'BSCS', '1', '1'),
('2021010523', 'Diomampo', 'Cherwin Grace', 'Burgos', '2021010523', 'cherwingrace.diomampo@citycollegeoftagaytay.edu.ph', 'Diomampo', 'BSCS', '1', '1'),
('2021010834', 'Manalo', 'John Patrick', 'Sangalang', '2021010834', 'johnpatrick.manalo@citycollegeoftagaytay.edu.ph', 'Manalo', 'BSCS', '1', '1'),
('2021010517', 'Dimaranan', 'Angelika', 'Ellao', '2021010517', 'angelika.dimaranan@citycollegeoftagaytay.edu.ph', 'Dimaranan', 'BSCS', '1', '1'),
('2021010927', 'Nadala ', 'Antoinette', 'Fullo ', '2021010927', 'antoinette.nadala@citycollegeoftagaytay.edu.ph', 'Nadala ', 'BSCS', '1', '1'),
('2021011439', 'Villanueva', 'Job Lenard', 'Eguia', '2021011439', 'joblenard.villlanueva@citycollegeoftagaytay.edu.ph', 'Villanueva', 'BSCS', '1', '1'),
('2020020162', 'Redicio', 'Frank Cedric', 'Feria', '2020020162', 'frankcedric.redicio@citycollegeoftagaytay.edu.ph', 'Redicio', 'BSCS', '1', '1'),
('2020020025', 'Asia', 'Marknel', 'Vitancor', '2020020025', 'marknel.asia@citycollegeoftagaytay.edu.ph', 'Asia', 'BSIT', '1', '2'),
('2021011197', 'Sabao', 'Joshua', 'Potian', '2021011197', 'joshua.sabao@citycollegeoftagaytay.edu.ph', 'Sabao', 'BSIT', '1', '2'),
('2021010784', 'Lorca', 'Rose Ann', 'Monsera', '2021010784', 'roseann.lorca@citycollegeoftagaytay.edu.ph', 'Lorca', 'BSIT', '1', '2'),
('2021011130', 'Rivera', 'Gizelle Ann', 'Cosa', '2021011130', 'gizelleann.rivera@citycollegeoftagaytay.edu.ph', 'Rivera', 'BSIT', '1', '2'),
('2021010407', 'Cuadra', 'Jaimeelyn', 'Servida', '2021010407', 'jaimeelyn.cuadra@citycollegeoftagaytay.edu.ph', 'Cuadra', 'BSIT', '1', '2'),
('2021010563', 'Eñoza', 'John', 'Dolindo', '2021010563', 'john.enoza@citycollegeoftagaytay.edu.ph', 'Eñoza', 'BSIT', '1', '2'),
('2021010306', 'Camacho', 'Russel', 'Revillame', '2021010306', 'russel.camacho@citycollegeoftagaytay.edu.ph', 'Camacho', 'BSIT', '1', '2'),
('2021011343', 'Valero', 'Veronica', 'Sanchez', '2021011343', 'veronica.valero@citycollegeoftagaytay.edu.ph', 'Valero', 'BSIT', '1', '2'),
('2021010453', 'De Silva', 'Ize Josh Zier', 'Poblete', '2021010453', 'izejoshzier.desilva@citycollegeoftagaytay.edu.ph', 'De Silva', 'BSIT', '1', '2'),
('2021010849', 'Marges', 'Jayvee', 'Salvador', '2021010849', 'jayvee.marges@citycollegeoftagaytay.edu.ph', 'Marges', 'BSIT', '1', '2'),
('2021010289', 'Cadacio ', 'Daniel', 'Tipora', '2021010289', 'daniel.cadacio@citycollegeoftagaytay.edu.ph', 'Cadacio ', 'BSIT', '1', '2'),
('1801561', 'Delim', 'Joseph', 'Lagunsin', '1801561', 'joseph.delim@citycollegeoftagaytay.edu.ph', 'Delim', 'BSIT', '4', '3');

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

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`student_id`, `firstname`, `lastname`, `subject`, `section`, `stud_time_in`, `remarks`, `semester`, `academic_year_start`, `academic_year_end`, `date_of_schedule`, `attendance_id`) VALUES
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '14:00', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 1),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', '14:00', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 2),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', '14:00', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 4),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', '14:01', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 5),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', '14:01', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 6),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', '14:01', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 7),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', '14:01', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 8),
('2021010527', 'Jessica', 'Doctor', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 9),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 10),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 11),
('2021010927', 'Antoinette', 'Nadala ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 12),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 13),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 14),
('2021010379', 'Christine Joy', 'Conejos', 'SOCS1A', 'BSCS1-1', '14:12', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 17),
('2021010080', 'Aeron', 'Amon', 'SOCS1A', 'BSCS1-1', '14:13', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 18),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'SOCS1A', 'BSCS1-1', '14:13', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 20),
('2021011383', 'Caila Joy', 'Villamin', 'SOCS1A', 'BSCS1-1', '14:13', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 21),
('2021010668', 'Jerold', 'Gomez', 'SOCS1A', 'BSCS1-1', '14:13', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 22),
('2020020195', 'Paul Edward', 'Triño', 'SOCS1A', 'BSCS1-1', '14:15', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/29', 23),
('2021010792', 'Bea', 'Lucero', 'SOCS1A', 'BSCS1-1', '14:17', 'LATE', '1st Semester', '2021', '2022', '2021/10/29', 24),
('2021010527', 'Jessica', 'Doctor', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 25),
('2021010523', 'Cherwin Grace', 'Diomampo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 26),
('2021010834', 'John Patrick', 'Manalo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 27),
('2021010517', 'Angelika', 'Dimaranan', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 28),
('2021011439', 'Job Lenard', 'Villanueva', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 29),
('2020020162', 'Frank Cedric', 'Redicio', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/29', 30),
('2021010379', 'Christine Joy', 'Conejos', 'CSPC60', 'BSCS1-1', '14:35', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/30', 33),
('2021010080', 'Aeron', 'Amon', 'CSPC60', 'BSCS1-1', '14:35', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/30', 34),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 36),
('2021010668', 'Jerold', 'Gomez', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 37),
('2020020195', 'Paul Edward', 'Triño', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 38),
('2021010792', 'Bea', 'Lucero', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 39),
('2021010527', 'Jessica', 'Doctor', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 40),
('2021010523', 'Cherwin Grace', 'Diomampo', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 41),
('2021010834', 'John Patrick', 'Manalo', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 42),
('2021010517', 'Angelika', 'Dimaranan', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 43),
('2021011439', 'Job Lenard', 'Villanueva', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 44),
('2020020162', 'Frank Cedric', 'Redicio', 'CSPC60', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 45),
('2021010379', 'Christine Joy', 'Conejos', 'PROG1', 'BSCS1-1', '15:19', 'LATE', '1st Semester', '2021', '2022', '2021/10/30', 48),
('2021010080', 'Aeron', 'Amon', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 49),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 51),
('2021011383', 'Caila Joy', 'Villamin', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 52),
('2021010668', 'Jerold', 'Gomez', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 53),
('2021010792', 'Bea', 'Lucero', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 54),
('2021010527', 'Jessica', 'Doctor', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 55),
('2021010523', 'Cherwin Grace', 'Diomampo', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 56),
('2021010834', 'John Patrick', 'Manalo', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 57),
('2021010517', 'Angelika', 'Dimaranan', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 58),
('2020020162', 'Frank Cedric', 'Redicio', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 59),
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '15:31', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/30', 61),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', '15:31', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/30', 62),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', '15:31', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/30', 64),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', '15:31', 'ON-TIME', '1st Semester', '2021', '2022', '2021/10/30', 65),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 66),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 67),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 68),
('2021010527', 'Jessica', 'Doctor', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 69),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 70),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 71),
('2021010927', 'Antoinette', 'Nadala ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 72),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 73),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/10/30', 74),
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '09:43', 'ON-TIME', '1st Semester', '2021', '2022', '2021/11/3', 95),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', '09:54', 'LATE', '1st Semester', '2021', '2022', '2021/11/3', 96),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 98),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 99),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 100),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 101),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 102),
('2021010527', 'Jessica', 'Doctor', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 103),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 104),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 105),
('2021010927', 'Antoinette', 'Nadala ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 106),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 107),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/3', 108),
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '13:59', 'LATE', '1st Semester', '2021', '2022', '2021/11/9', 121),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', '14:11', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 122),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 124),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 125),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 126),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 127),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 128),
('2021010527', 'Jessica', 'Doctor', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 129),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 130),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 131),
('2021010927', 'Antoinette', 'Nadala ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 132),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 133),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 134),
('2021010379', 'Christine Joy', 'Conejos', 'PROG1', 'BSCS1-1', '19:21', 'LATE', '1st Semester', '2021', '2022', '2021/11/9', 137),
('2021010527', 'Jessica', 'Doctor', 'PROG1', 'BSCS1-1', '19:22', 'LATE', '1st Semester', '2021', '2022', '2021/11/9', 138),
('2021010080', 'Aeron', 'Amon', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 139),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 141),
('2021011383', 'Caila Joy', 'Villamin', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 142),
('2021010668', 'Jerold', 'Gomez', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 143),
('2021010792', 'Bea', 'Lucero', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 144),
('2021010523', 'Cherwin Grace', 'Diomampo', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 145),
('2021010834', 'John Patrick', 'Manalo', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 146),
('2021010517', 'Angelika', 'Dimaranan', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 147),
('2020020162', 'Frank Cedric', 'Redicio', 'PROG1', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/9', 148),
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '11:15', 'ON-TIME', '1st Semester', '2021', '2022', '2021/11/13', 150),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', '11:16', 'LATE', '1st Semester', '2021', '2022', '2021/11/13', 151),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 153),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 154),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 155),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 156),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 157),
('2021010527', 'Jessica', 'Doctor', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 158),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 159),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 160),
('2021010927', 'Antoinette', 'Nadala ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 161),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 162),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/13', 163),
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '10:18', 'ON-TIME', '1st Semester', '2021', '2022', '2021/11/23', 166),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 168),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 169),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 170),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 171),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 172),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 173),
('2021010527', 'Jessica', 'Doctor', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 174),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 175),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 176),
('2021010927', 'Antoinette', 'Nadala ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 177),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 178),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 179),
('2021010379', 'Christine Joy', 'Conejos', 'COSC15', 'BSCS1-1', '15:23', 'ON-TIME', '1st Semester', '2021', '2022', '2021/11/23', 282),
('2021010527', 'Jessica', 'Doctor', 'COSC15', 'BSCS1-1', '15:27', 'ON-TIME', '1st Semester', '2021', '2022', '2021/11/23', 284),
('2021010080', 'Aeron', 'Amon', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 285),
('2021011383', 'Caila Joy', 'Villamin', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 286),
('2021010668', 'Jerold', 'Gomez', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 287),
('2020020195', 'Paul Edward', 'Triño', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 288),
('2021010792', 'Bea', 'Lucero', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 289),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 290),
('2021010834', 'John Patrick', 'Manalo', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 291),
('2021010834', 'John Patrick', 'Manalo', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 292),
('2021010517', 'Angelika', 'Dimaranan', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 293),
('2021010927', 'Antoinette', 'Nadala ', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 294),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 295),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/23', 296),
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '09:32', 'ON-TIME', '1st Semester', '2021', '2022', '2021/11/24', 299),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 301),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 302),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 303),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 304),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 305),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 306),
('2021010527', 'Jessica', 'Doctor', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 307),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 308),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 309),
('2021010927', 'Antoinette', 'Nadala ', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 310),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 311),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2021/11/24', 312),
('2021010792', 'Bea', 'Lucero', 'SOCS1A', 'BSCS1-1', '09:17', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/16', 317),
('2021010668', 'Jerold', 'Gomez', 'SOCS1A', 'BSCS1-1', '09:18', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/16', 318),
('2021010379', 'Christine Joy', 'Conejos', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 319),
('2021010080', 'Aeron', 'Amon', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 320),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 322),
('2021011383', 'Caila Joy', 'Villamin', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 323),
('2020020195', 'Paul Edward', 'Triño', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 324),
('2021010527', 'Jessica', 'Doctor', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 325),
('2021010523', 'Cherwin Grace', 'Diomampo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 326),
('2021010834', 'John Patrick', 'Manalo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 327),
('2021010517', 'Angelika', 'Dimaranan', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 328),
('2021011439', 'Job Lenard', 'Villanueva', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 329),
('2020020162', 'Frank Cedric', 'Redicio', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/16', 330),
('2021010379', 'Christine Joy', 'Conejos', 'FILI3', 'BSCS1-1', '20:53', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/17', 331),
('2021010080', 'Aeron', 'Amon', 'FILI3', 'BSCS1-1', '20:53', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/17', 332),
('2021010379', 'Christine Joy', 'Conejos', 'FILI3', 'BSCS1-1', '21:48', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 333),
('2021010080', 'Aeron', 'Amon', 'FILI3', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 334),
('2021010379', 'Christine Joy', 'Conejos', 'SOCS1A', 'BSCS1-1', '23:45', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 335),
('2021010080', 'Aeron', 'Amon', 'SOCS1A', 'BSCS1-1', '23:45', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 336),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'SOCS1A', 'BSCS1-1', '23:46', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 337),
('2021011383', 'Caila Joy', 'Villamin', 'SOCS1A', 'BSCS1-1', '23:47', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 338),
('2021010668', 'Jerold', 'Gomez', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 339),
('2020020195', 'Paul Edward', 'Triño', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 340),
('2021010792', 'Bea', 'Lucero', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 341),
('2021010527', 'Jessica', 'Doctor', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 342),
('2021010523', 'Cherwin Grace', 'Diomampo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 343),
('2021010834', 'John Patrick', 'Manalo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 344),
('2021010517', 'Angelika', 'Dimaranan', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 345),
('2021011439', 'Job Lenard', 'Villanueva', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 346),
('2020020162', 'Frank Cedric', 'Redicio', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 347),
('2021010379', 'Christine Joy', 'Conejos', 'MATH1A', 'BSCS1-1', '00:01', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 348),
('2021010080', 'Aeron', 'Amon', 'MATH1A', 'BSCS1-1', '00:01', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 349),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'MATH1A', 'BSCS1-1', '00:02', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 350),
('2021011383', 'Caila Joy', 'Villamin', 'MATH1A', 'BSCS1-1', '00:03', 'ON-TIME', '1st Semester', '2021', '2022', '2022/01/30', 351),
('2021010668', 'Jerold', 'Gomez', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 352),
('2020020195', 'Paul Edward', 'Triño', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 353),
('2021010792', 'Bea', 'Lucero', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 354),
('2021010527', 'Jessica', 'Doctor', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 355),
('2021010523', 'Cherwin Grace', 'Diomampo', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 356),
('2021010834', 'John Patrick', 'Manalo', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 357),
('2021010517', 'Angelika', 'Dimaranan', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 358),
('2021011439', 'Job Lenard', 'Villanueva', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 359),
('2020020162', 'Frank Cedric', 'Redicio', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/01/30', 360),
('2021010379', 'Christine Joy', 'Conejos', 'FILI3', 'BSCS1-1', '21:52', 'ON-TIME', '1st Semester', '2021', '2022', '2022/02/3', 361),
('2021010379', 'Christine Joy', 'Conejos', 'SOCS1A', 'BSCS1-1', '03:18', 'ON-TIME', '1st Semester', '2021', '2022', '2022/02/3', 362),
('2021010080', 'Aeron', 'Amon', 'SOCS1A', 'BSCS1-1', '03:21', 'ON-TIME', '1st Semester', '2021', '2022', '2022/02/3', 363),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 364),
('2021011383', 'Caila Joy', 'Villamin', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 365),
('2021010668', 'Jerold', 'Gomez', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 366),
('2020020195', 'Paul Edward', 'Triño', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 367),
('2021010792', 'Bea', 'Lucero', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 368),
('2021010527', 'Jessica', 'Doctor', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 369),
('2021010523', 'Cherwin Grace', 'Diomampo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 370),
('2021010834', 'John Patrick', 'Manalo', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 371),
('2021010517', 'Angelika', 'Dimaranan', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 372),
('2021011439', 'Job Lenard', 'Villanueva', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 373),
('2020020162', 'Frank Cedric', 'Redicio', 'SOCS1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 374),
('2021010379', 'Christine Joy', 'Conejos', 'MATH1A', 'BSCS1-1', '03:33', 'ON-TIME', '1st Semester', '2021', '2022', '2022/02/3', 375),
('2021010080', 'Aeron', 'Amon', 'MATH1A', 'BSCS1-1', '03:34', 'ON-TIME', '1st Semester', '2021', '2022', '2022/02/3', 376),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 377),
('2021011383', 'Caila Joy', 'Villamin', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 378),
('2021010668', 'Jerold', 'Gomez', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 379),
('2020020195', 'Paul Edward', 'Triño', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 380),
('2021010792', 'Bea', 'Lucero', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 381),
('2021010527', 'Jessica', 'Doctor', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 382),
('2021010523', 'Cherwin Grace', 'Diomampo', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 383),
('2021010834', 'John Patrick', 'Manalo', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 384),
('2021010517', 'Angelika', 'Dimaranan', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 385),
('2021011439', 'Job Lenard', 'Villanueva', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 386),
('2020020162', 'Frank Cedric', 'Redicio', 'MATH1A', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 387),
('2021010379', 'Christine Joy', 'Conejos', 'COSC15', 'BSCS1-1', '03:42', 'ON-TIME', '1st Semester', '2021', '2022', '2022/02/3', 388),
('2021010080', 'Aeron', 'Amon', 'COSC15', 'BSCS1-1', '03:42', 'ON-TIME', '1st Semester', '2021', '2022', '2022/02/3', 389),
('2021011383', 'Caila Joy', 'Villamin', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 390),
('2021010668', 'Jerold', 'Gomez', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 391),
('2020020195', 'Paul Edward', 'Triño', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 392),
('2021010792', 'Bea', 'Lucero', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 393),
('2021010527', 'Jessica', 'Doctor', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 394),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 395),
('2021010834', 'John Patrick', 'Manalo', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 396),
('2021010834', 'John Patrick', 'Manalo', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 397),
('2021010517', 'Angelika', 'Dimaranan', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 398),
('2021010927', 'Antoinette', 'Nadala ', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 399),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 400),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC15', 'BSCS1-1', 'null', 'ABSENT', '1st Semester', '2021', '2022', '2022/02/3', 401);

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
('Jamiladan', 'Jhon Peter', 'Zamora', 'jupiter', 'jhonpeter.jamiladan@citycollegeoftagaytay.edu.ph', 'e034fb6b66aacc1d48f445ddfb08da98', 'DEAN', 'ACTIVE'),
('Mayuga', 'Wenwen', 'Balba', 'xiaoxii', 'wenwen.mayuga@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY', 'ACTIVE'),
('Villaflor', 'Aldrine', 'Discallar', 'Drine', 'aldrine.villaflor@citycollegeoftagaytay.edu.ph', '0dc8f02af6859d9807b08cd0972e77c4', 'FACULTY', 'ACTIVE'),
('Vergara', 'Jasmin', 'Aguilar', 'Jasmin', 'jasmin.vergara@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY', 'ACTIVE'),
('Olazo', 'Archie', 'Dimapilis', 'Archie', 'archie.olazo@citycollegeoftagaytay.edu.ph', 'Olazo', 'FACULTY', 'ACTIVE'),
('Conejos', 'Christine Joy', 'Destor', '2021010379', 'christinejoy.conejos@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'STUDENT', 'ACTIVE'),
('Amon', 'Aeron', 'Legan', '2021010080', 'aeron.amon@citycollegeoftagaytay.edu.ph', 'Amon', 'STUDENT', 'ACTIVE'),
('Cuadra ', 'Andrei Mari ', 'Bautista ', '2021010406', 'andreimari.cuadra@citycollegeoftagaytay.edu.ph', 'Cuadra ', 'STUDENT', 'ACTIVE'),
('Villamin', 'Caila Joy', '', '2021011383', 'cailajoy.villamin@citycollegeoftagaytay.edu.ph', 'Villamin', 'STUDENT', 'ACTIVE'),
('Gomez', 'Jerold', 'Buganan', '2021010668', 'jerold.gomez@citycollegeoftagaytay.edu.ph', 'Gomez', 'STUDENT', 'ACTIVE'),
('Triño', 'Paul Edward', 'Vidallo', '2020020195', 'pauledward.trino@citycollegeoftagaytay.edu.ph', 'Triño', 'STUDENT', 'ACTIVE'),
('Lucero', 'Bea', 'Ontog', '2021010792', 'bea.lucero@citycollegeoftagaytay.edu.ph', 'Lucero', 'STUDENT', 'ACTIVE'),
('Doctor', 'Jessica', 'Valler', '2021010527', 'jessica.doctor@citycollegeoftagaytay.edu.ph', 'Doctor', 'STUDENT', 'ACTIVE'),
('Diomampo', 'Cherwin Grace', 'Burgos', '2021010523', 'cherwingrace.diomampo@citycollegeoftagaytay.edu.ph', 'Diomampo', 'STUDENT', 'ACTIVE'),
('Manalo', 'John Patrick', 'Sangalang', '2021010834', 'johnpatrick.manalo@citycollegeoftagaytay.edu.ph', 'Manalo', 'STUDENT', 'ACTIVE'),
('Dimaranan', 'Angelika', 'Ellao', '2021010517', 'angelika.dimaranan@citycollegeoftagaytay.edu.ph', 'Dimaranan', 'STUDENT', 'ACTIVE'),
('Nadala ', 'Antoinette', 'Fullo ', '2021010927', 'antoinette.nadala@citycollegeoftagaytay.edu.ph', 'Nadala ', 'STUDENT', 'ACTIVE'),
('Villanueva', 'Job Lenard', 'Eguia', '2021011439', 'joblenard.villlanueva@citycollegeoftagaytay.edu.ph', 'Villanueva', 'STUDENT', 'ACTIVE'),
('Redicio', 'Frank Cedric', 'Feria', '2020020162', 'frankcedric.redicio@citycollegeoftagaytay.edu.ph', 'Redicio', 'STUDENT', 'ACTIVE'),
('Asia', 'Marknel', 'Vitancor', '2020020025', 'marknel.asia@citycollegeoftagaytay.edu.ph', 'Asia', 'STUDENT', 'ACTIVE'),
('Sabao', 'Joshua', 'Potian', '2021011197', 'joshua.sabao@citycollegeoftagaytay.edu.ph', 'Sabao', 'STUDENT', 'ACTIVE'),
('Lorca', 'Rose Ann', 'Monsera', '2021010784', 'roseann.lorca@citycollegeoftagaytay.edu.ph', 'Lorca', 'STUDENT', 'ACTIVE'),
('Rivera', 'Gizelle Ann', 'Cosa', '2021011130', 'gizelleann.rivera@citycollegeoftagaytay.edu.ph', 'Rivera', 'STUDENT', 'ACTIVE'),
('Cuadra', 'Jaimeelyn', 'Servida', '2021010407', 'jaimeelyn.cuadra@citycollegeoftagaytay.edu.ph', 'Cuadra', 'STUDENT', 'ACTIVE'),
('Eñoza', 'John', 'Dolindo', '2021010563', 'john.enoza@citycollegeoftagaytay.edu.ph', 'Eñoza', 'STUDENT', 'ACTIVE'),
('Camacho', 'Russel', 'Revillame', '2021010306', 'russel.camacho@citycollegeoftagaytay.edu.ph', 'Camacho', 'STUDENT', 'ACTIVE'),
('Valero', 'Veronica', 'Sanchez', '2021011343', 'veronica.valero@citycollegeoftagaytay.edu.ph', 'Valero', 'STUDENT', 'ACTIVE'),
('De Silva', 'Ize Josh Zier', 'Poblete', '2021010453', 'izejoshzier.desilva@citycollegeoftagaytay.edu.ph', 'De Silva', 'STUDENT', 'ACTIVE'),
('Marges', 'Jayvee', 'Salvador', '2021010849', 'jayvee.marges@citycollegeoftagaytay.edu.ph', 'Marges', 'STUDENT', 'ACTIVE'),
('Cadacio ', 'Daniel', 'Tipora', '2021010289', 'daniel.cadacio@citycollegeoftagaytay.edu.ph', 'Cadacio ', 'STUDENT', 'ACTIVE'),
('Delim', 'Joseph', 'Lagunsin', '1801561', 'joseph.delim@citycollegeoftagaytay.edu.ph', 'Delim', 'STUDENT', 'ACTIVE'),
('My_lastname', 'My_firsname', 'My_middlename', 'sysadmin', 'myemail@gmail.com', 'e034fb6b66aacc1d48f445ddfb08da98', 'SYSTEMADMIN', 'ACTIVE'),
('PC_LN', 'PC_FN', 'PC_MN', 'progcoor', 'program.coordinator@gmail.com', 'e034fb6b66aacc1d48f445ddfb08da98', 'PROGRAMCOORDINATOR', 'ACTIVE'),
('s_ln', 's_fn', 's_mn', 'sample', 'sample@gmail.com', 's_ln', 'DEAN', 'ACTIVE'),
('Lastname', 'Firstname', 'Middlename', 'dean', 'dean1@gmail.com', 'Lastname', 'DEAN', 'ACTIVE'),
('fac_ln', 'fac_fn', 'fac_mn', 'fac_un', 'fac@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY', 'ACTIVE');

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
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
