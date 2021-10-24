-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 05:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
('2021010379', 'COSC18', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'FILI3', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010080', 'COSC18', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'FILI3', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021011373', 'COSC18', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'FILI3', 'BSCS2-2', 'HUMA1a', 'BSCS2-2', '', '', '', '', '', '', '2nd Semester', '2021', '2022'),
('2021010406', 'COSC18', 'Same as my Current Section', 'COSC15 ', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021011383', 'PROG1', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'CSCP60', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010668', 'COSC18', 'Same as my Current Section', 'ENGL1A', 'Same as my Current Section', 'SOCS1A', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'MATH1A', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2020020195', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'SCSBC1', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010792', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010527', 'Cosc18 ', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'PHed1', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'Cosc15', 'Same as my Current Section', 'Prog1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010523', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010834', 'COSC15', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010517', 'PROG1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010927', 'COSC15', 'Same as my Current Section', 'ENG1a', 'Same as my Current Section', 'SOCS1a ', 'Same as my Current Section', 'CSPC60 ', 'Same as my Current Section', 'NSTP1 ', 'Same as my Current Section', 'COSC18 ', 'Same as my Current Section', ' MATH1a', 'Same as my Current Section', ' PROG1', 'Same as my Current Section', 'PHED1 ', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021011439', 'COSC15', 'Same as my Current Section', 'COSC18', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'SCSBC1', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2020020162', 'COSC18', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2020020118', 'COSC15', 'Same as my Current Section', 'COSC18 ', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'ENGL1a ', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', ' PHED1', 'Same as my Current Section', 'SCSBC1', 'Same as my Current Section', ' SOCS1a', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010116', 'COSC18', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a ', 'Same as my Current Section', 'CSPC60', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'COSC15', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010364', 'ITEC18', 'Same as my Current Section', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENG1', 'Same as my Current Section', 'MIMW', 'Same as my Current Section', 'NSTP', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', '', '', '', '', '2nd Semester', '2021', '2022'),
('2020020025', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021011197', 'ITEC15', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'MATH1', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '', '', '2nd Semester', '2021', '2022'),
('2021010784', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021011130', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '2nd Semester', '2021', '2022'),
('2021010407', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010563', 'ITEC16', 'Same as my Current Section', 'ITEC71', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', 'PROG2', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC19', 'Same as my Current Section', 'PHED2', 'Same as my Current Section', 'NSTP2', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010306', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '', '', '2nd Semester', '2021', '2022'),
('2021011343', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010453', 'ITEC15', 'Same as my Current Section', 'ITEC70', 'Same as my Current Section', 'ENGL1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', 'SOCS1a', 'Same as my Current Section', '', '', '2nd Semester', '2021', '2022'),
('2021010849', 'ITEC70', 'Same as my Current Section', 'ITEC15', 'Same as my Current Section', 'ENGl1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '2nd Semester', '2021', '2022'),
('2021010289', 'ITEC71', 'Same as my Current Section', 'ITEC15', 'Same as my Current Section', 'ENGl1a', 'Same as my Current Section', 'PROG1', 'Same as my Current Section', 'MATH1a', 'Same as my Current Section', 'ITEC18', 'Same as my Current Section', 'PHED1', 'Same as my Current Section', 'NSTP1', 'Same as my Current Section', '', '', '', '', '2nd Semester', '2021', '2022'),
('1801561', 'STAT1', 'Same as my Current Section', 'SOCS3', 'Same as my Current Section', 'ITEC69', 'Same as my Current Section', 'ITEC100b', 'Same as my Current Section', '', '', '', '', '', '', '', '', '', '', '', '', '2nd Semester', '2021', '2022');

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
('2021011373', 'Vidallo', 'Jon Marvin', 'Morillo', '2021011373', 'jonmarvin.vidallo@citycollegeoftagaytay.edu.ph', 'Vidallo', 'BSCS', '1', '1'),
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
('2020020118', 'Magan', 'Jun-Jun', 'Evangelista', '2020020118', 'junjun.magan@citycollegeoftagaytay.edu.ph', 'Magan', 'BSCS', '1', '1'),
('2021010116', 'Asia', 'Arist', 'Pe?ano', '2021010116', 'arist.asia@citycollegeoftagaytay.edu.ph', 'Asia', 'BSCS', '1', '1'),
('2021010364', 'Cezar', 'Jade', '', '2021010364', 'jade.cezar@citycollegeoftagaytay.edu.ph', 'Cezar', 'BSIT', '1', '2'),
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
  `date_of_schedule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`student_id`, `firstname`, `lastname`, `subject`, `section`, `stud_time_in`, `remarks`, `semester`, `academic_year_start`, `academic_year_end`, `date_of_schedule`) VALUES
('2021010379', 'Christine Joy', 'Conejos', 'COSC18', 'BSCS1-1', '17:30', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010080', 'Aeron', 'Amon', 'COSC18', 'BSCS1-1', '17:30', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021011373', 'Jon Marvin', 'Vidallo', 'COSC18', 'BSCS1-1', '17:30', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'COSC18', 'BSCS1-1', '17:30', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021011383', 'Caila Joy', 'Villamin', 'COSC18', 'BSCS1-1', '17:31', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010668', 'Jerold', 'Gomez', 'COSC18', 'BSCS1-1', '17:31', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2020020195', 'Paul Edward', 'Triño', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010792', 'Bea', 'Lucero', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010523', 'Cherwin Grace', 'Diomampo', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010517', 'Angelika', 'Dimaranan', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021011439', 'Job Lenard', 'Villanueva', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2020020162', 'Frank Cedric', 'Redicio', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010116', 'Arist', 'Asia', 'COSC18', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010379', 'Christine Joy', 'Conejos', 'SOCS1a', 'BSCS1-1', '22:13', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010080', 'Aeron', 'Amon', 'SOCS1a', 'BSCS1-1', '22:13', 'ON-TIME', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010406', 'Andrei Mari ', 'Cuadra ', 'SOCS1a', 'BSCS1-1', '22:20', 'LATE', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021011373', 'Jon Marvin', 'Vidallo', 'SOCS1a', 'BSCS1-1', '22:20', 'LATE', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021011383', 'Caila Joy', 'Villamin', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2020020195', 'Paul Edward', 'Triño', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010792', 'Bea', 'Lucero', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010527', 'Jessica', 'Doctor', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010523', 'Cherwin Grace', 'Diomampo', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010834', 'John Patrick', 'Manalo', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021010517', 'Angelika', 'Dimaranan', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2021011439', 'Job Lenard', 'Villanueva', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24'),
('2020020162', 'Frank Cedric', 'Redicio', 'SOCS1a', 'BSCS1-1', 'null', 'ABSENT', '2nd Semester', '2021', '2022', '2021/10/24');

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
('Jamiladan', 'Jhon Peter', 'Zamora', 'jupiter', 'jhonpeter.jamiladan@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'DEAN', 'ACTIVE'),
('Mayuga', 'Wenwen', 'Balba', 'xiaoxii', 'wenwen.mayuga@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY', 'ACTIVE'),
('Villaflor', 'Aldrine', 'Discallar', 'Drine', 'aldrine.villaflor@citycollegeoftagaytay.edu.ph', '0dc8f02af6859d9807b08cd0972e77c4', 'FACULTY', 'ACTIVE'),
('Vergara', 'Jasmin', 'Aguilar', 'Jasmin', 'jasmin.vergara@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY', 'ACTIVE'),
('Olazo', 'Archie', 'Dimapilis', 'Archie', 'archie.olazo@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY', 'ACTIVE'),
('Conejos', 'Christine Joy', 'Destor', '2021010379', 'christinejoy.conejos@citycollegeoftagaytay.edu.ph', 'Conejos', 'STUDENT', 'ACTIVE'),
('Amon', 'Aeron', 'Legan', '2021010080', 'aeron.amon@citycollegeoftagaytay.edu.ph', 'Amon', 'STUDENT', 'ACTIVE'),
('Vidallo', 'Jon Marvin', 'Morillo', '2021011373', 'jonmarvin.vidallo@citycollegeoftagaytay.edu.ph', 'Vidallo', 'STUDENT', 'ACTIVE'),
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
('Magan', 'Jun-Jun', 'Evangelista', '2020020118', 'junjun.magan@citycollegeoftagaytay.edu.ph', 'Magan', 'STUDENT', 'ACTIVE'),
('Asia', 'Arist', 'Pe?ano', '2021010116', 'arist.asia@citycollegeoftagaytay.edu.ph', 'Asia', 'STUDENT', 'ACTIVE'),
('Cezar', 'Jade', '', '2021010364', 'jade.cezar@citycollegeoftagaytay.edu.ph', 'Cezar', 'STUDENT', 'ACTIVE'),
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
('Delim', 'Joseph', 'Lagunsin', '1801561', 'joseph.delim@citycollegeoftagaytay.edu.ph', 'Delim', 'STUDENT', 'ACTIVE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
