-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 04:22 AM
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
('1801057', 'Santos', 'Pedie', 'Parra', '1801057', 'pedie.santos@citycollegeoftagaytay.edu.ph', 'Santos', 'BSIT', '4', '3'),
('1801363', 'Saludes', 'Mary Joy', 'Unlayao', '1801363', 'Saludesmaryjoy8@gmail.com', 'Saludes', 'BSIT', '4', '1'),
('1801561', 'Delim', 'Joseph', 'Lagunsin', '1801561', 'joseph.delim@citycollegeoftagaytay.edu.ph', 'Delim', 'BSIT', '4', '3'),
('1801479', 'Hicaro', 'Mark Josh', 'Elacion', '1801479', 'markjoshhikaro@gmail.com', 'Hicaro', 'BSIT', '4', '5'),
('1801494', 'Jeciel', 'Jeric', '', '1801494', 'jeric.jeciel@citycollegeoftagaytay.edu.ph', 'Jeciel', 'BSIT', '4', '2'),
('1801894', 'Reyes', 'John Julius', 'Monilla', '1801894', 'johnjulius.reyes@citycollegeoftagaytay.edu.ph', 'Reyes', 'BSIT', '4', '2'),
('1801892', 'Villaflor', 'Aldrine', 'Discalar', '1801892', 'aldrine.villaflor@citycollegeoftagaytay.edu.ph', 'Villaflor', 'BSIT', '4', '3'),
('1801111', 'Bernardez', 'John Eric', 'Anonuevo', '1801111', 'johnericbernardez@citycollegeoftagaytay.edu.ph', 'Bernardez', 'BSIT', '4', '1'),
('1801359', 'Mayuga', 'Wenwen', 'Balba', '1801359', 'wenwen.mayuga@citycollegeoftagaytay.edu.ph', 'Mayuga', 'BSIT', '4', '3'),
('1801089', 'Olazo', 'Archie', 'Dimapilis', '1801089', 'archie.olazo@citycollegeoftagaytay.edu.ph', 'Olazo', 'BSIT', '4', '3'),
('1801660', 'Vergara', 'Jasmin', 'Aguilar', '1801660', 'jasminnvergara27@gmail.com', 'Vergara', 'BSIT', '4', '3'),
('1801229', 'Sina', 'Cheny Marie', 'Soco', '1801229', 'chenysina40@gmail.com', 'Sina', 'BSIT', '4', '3'),
('1801493', 'Scarlet', 'Erza', 'Jupiter', '1801493', 'jupiter@gmail.com', 'Scarlet', 'BSIT', '3', '1'),
('1801499', 'Jamiladan', 'Jhon Peter', 'Zamora', '1801499', 'jhonpeter.jamiladan@citycollegeoftagaytay.edu.ph', 'Jamiladan', 'BSIT', '4', '3');

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
  `accesslevel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`lastname`, `firstname`, `middlename`, `username`, `email`, `password`, `accesslevel`) VALUES
('Jamiladan', 'Jhon Peter', 'Zamora', 'jupiter', 'jhonpeter.jamiladan@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'DEAN'),
('Mayuga', 'Wenwen', 'Balba', 'xiaoxii', 'wenwen.mayuga@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY'),
('Villaflor', 'Aldrine', 'Discallar', 'Drine', 'aldrine.villaflor@citycollegeoftagaytay.edu.ph', '0dc8f02af6859d9807b08cd0972e77c4', 'FACULTY'),
('Vergara', 'Jasmin', 'Aguilar', 'Jasmin', 'jasmin.vergara@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY'),
('Olazo', 'Archie', 'Dimapilis', 'Archie', 'archie.olazo@citycollegeoftagaytay.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'FACULTY'),
('Santos', 'Pedie', 'Parra', '1801057', 'pedie.santos@citycollegeoftagaytay.edu.ph', 'Santos', 'STUDENT'),
('Saludes', 'Mary Joy', 'Unlayao', '1801363', 'Saludesmaryjoy8@gmail.com', 'Saludes', 'STUDENT'),
('Delim', 'Joseph', 'Lagunsin', '1801561', 'joseph.delim@citycollegeoftagaytay.edu.ph', 'Delim', 'STUDENT'),
('Hicaro', 'Mark Josh', 'Elacion', '1801479', 'markjoshhikaro@gmail.com', 'Hicaro', 'STUDENT'),
('Jeciel', 'Jeric', '', '1801494', 'jeric.jeciel@citycollegeoftagaytay.edu.ph', 'Jeciel', 'STUDENT'),
('Reyes', 'John Julius', 'Monilla', '1801894', 'johnjulius.reyes@citycollegeoftagaytay.edu.ph', 'Reyes', 'STUDENT'),
('Villaflor', 'Aldrine', 'Discalar', '1801892', 'aldrine.villaflor@citycollegeoftagaytay.edu.ph', 'Villaflor', 'STUDENT'),
('Bernardez', 'John Eric', 'Anonuevo', '1801111', 'johnericbernardez@citycollegeoftagaytay.edu.ph', 'Bernardez', 'STUDENT'),
('Mayuga', 'Wenwen', 'Balba', '1801359', 'wenwen.mayuga@citycollegeoftagaytay.edu.ph', 'Mayuga', 'STUDENT'),
('Olazo', 'Archie', 'Dimapilis', '1801089', 'archie.olazo@citycollegeoftagaytay.edu.ph', 'Olazo', 'STUDENT'),
('Vergara', 'Jasmin', 'Aguilar', '1801660', 'jasminnvergara27@gmail.com', 'Vergara', 'STUDENT'),
('Sina', 'Cheny Marie', 'Soco', '1801229', 'chenysina40@gmail.com', 'Sina', 'STUDENT'),
('Scarlet', 'Erza', 'Jupiter', '1801493', 'jupiter@gmail.com', 'Scarlet', 'STUDENT'),
('Jamiladan', 'Jhon Peter', 'Zamora', '1801499', 'jhonpeter.jamiladan@citycolegeoftagaytay.edu.ph', 'Jamiladan', 'STUDENT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
