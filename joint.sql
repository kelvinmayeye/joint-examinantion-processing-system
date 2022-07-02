-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2022 at 04:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joint`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(15) NOT NULL,
  `gradename` varchar(100) NOT NULL,
  `start_value` int(10) NOT NULL,
  `end_value` int(10) NOT NULL,
  `grade_point` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result_processing`
--

CREATE TABLE `result_processing` (
  `stu_id` varchar(20) NOT NULL,
  `sum` float NOT NULL,
  `avg` float NOT NULL,
  `div_point` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_processing`
--

INSERT INTO `result_processing` (`stu_id`, `sum`, `avg`, `div_point`) VALUES
('23001001', 579, 57.9, 11),
('23001005', 692, 69.2, 10),
('23002002', 450, 45, 20),
('23002003', 478, 47.8, 19),
('23002004', 652, 65.2, 10),
('23002006', 510, 51, 15);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `regno` varchar(100) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `schooltype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`regno`, `schoolname`, `schooltype`) VALUES
('12003', 'ST MARYS SECONDARY SCHOOL', 'Private'),
('23001', 'SHULE YA SEKONDARI MAGOZA', 'government'),
('23002', 'SHULE YA SECONDARY BULOMBOLA', 'government');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(20) NOT NULL,
  `sch_id` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) NOT NULL,
  `sex` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sch_id`, `f_name`, `m_name`, `l_name`, `sex`) VALUES
('120030201', '12003', 'NGOILA', 'SULEIMAN', 'MANYWA', 'M'),
('23001001', '23001', 'ALLY', 'RAMADHANI', 'OMARY', 'M'),
('23001005', '23001', 'GEORGE', 'DONALD', 'BUSH', 'M'),
('23002002', '23002', 'ZARI', 'JUMA', 'MOHAMMED', 'F'),
('23002003', '23002', 'MICHAEL', 'JACKSON', 'KAHALWE', 'M'),
('23002004', '23002', 'GOODLUCK', 'KYANDO ', 'BLESSING', 'M'),
('23002006', '23002', 'LILIAN', 'TEMBA', 'KIMAMBO', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subcode` int(100) NOT NULL,
  `subname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subcode`, `subname`) VALUES
(25, 'FOOD AND NUTRITION'),
(101, 'Mathematics'),
(103, 'English'),
(104, 'Geography'),
(105, 'CHEMISTRY'),
(106, 'FINE ART'),
(107, 'PHYSICAL EDUCATION'),
(108, 'LITERATURE'),
(109, 'FRENCH'),
(110, 'COMPUTER'),
(112, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `subject_has_student`
--

CREATE TABLE `subject_has_student` (
  `subject_subcode` int(100) NOT NULL,
  `student_sid` varchar(20) NOT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_has_student`
--

INSERT INTO `subject_has_student` (`subject_subcode`, `student_sid`, `score`) VALUES
(101, '120030201', NULL),
(101, '23001001', 78),
(101, '23001005', 67),
(101, '23002002', 56),
(101, '23002003', 78),
(101, '23002004', 90),
(101, '23002006', 43),
(103, '120030201', NULL),
(103, '23001001', 34),
(103, '23001005', 45),
(103, '23002002', 56),
(103, '23002003', 67),
(103, '23002004', 78),
(103, '23002006', 77),
(104, '120030201', NULL),
(104, '23001001', 56),
(104, '23001005', 89),
(104, '23002002', 70),
(104, '23002003', 34),
(104, '23002004', 29),
(104, '23002006', 48),
(105, '120030201', NULL),
(105, '23001001', 50),
(105, '23001005', 78),
(105, '23002002', 56),
(105, '23002003', 52),
(105, '23002004', 90),
(105, '23002006', 65),
(106, '120030201', NULL),
(106, '23001001', 93),
(106, '23001005', 74),
(106, '23002002', 39),
(106, '23002003', 67),
(106, '23002004', 69),
(106, '23002006', 75),
(107, '120030201', NULL),
(107, '23001001', 89),
(107, '23001005', 87),
(107, '23002002', 43),
(107, '23002003', 34),
(107, '23002004', 78),
(107, '23002006', 24),
(108, '120030201', NULL),
(108, '23001001', 0),
(108, '23001005', 34),
(108, '23002002', 9),
(108, '23002003', 45),
(108, '23002004', 45),
(108, '23002006', 32),
(109, '120030201', 78),
(109, '23001001', 78),
(109, '23001005', 89),
(109, '23002002', 12),
(109, '23002003', 34),
(109, '23002004', 90),
(109, '23002006', 67),
(110, '120030201', NULL),
(110, '23001001', 23),
(110, '23001005', 56),
(110, '23002002', 77),
(110, '23002003', 44),
(110, '23002004', 38),
(110, '23002006', 67),
(112, '120030201', NULL),
(112, '23001001', 78),
(112, '23001005', 73),
(112, '23002002', 32),
(112, '23002003', 23),
(112, '23002004', 45),
(112, '23002006', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subject_has_users`
--

CREATE TABLE `subject_has_users` (
  `subject_subcode` int(100) NOT NULL,
  `users_sno` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_has_users`
--

INSERT INTO `subject_has_users` (`subject_subcode`, `users_sno`) VALUES
(101, 25),
(109, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(100) NOT NULL,
  `sch_id` varchar(100) DEFAULT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) NOT NULL,
  `sex` char(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `sch_id`, `f_name`, `m_name`, `l_name`, `sex`, `username`, `password`, `role`) VALUES
(6, NULL, 'John', 'M', 'Nathanaeli', 'M', 'sir', '202cb962ac59075b964b07152d234b70', 'admin'),
(24, '23001', 'OTTO', 'MICHAEL', 'DUNGA', 'M', 'OTTO', '202cb962ac59075b964b07152d234b70', 'teacher'),
(25, '12003', 'JOHARIA', 'SEIF', 'KHAMISI', 'F', 'JOHARIA', '202cb962ac59075b964b07152d234b70', 'head');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_processing`
--
ALTER TABLE `result_processing`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`regno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `sch_id` (`sch_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subcode`);

--
-- Indexes for table `subject_has_student`
--
ALTER TABLE `subject_has_student`
  ADD PRIMARY KEY (`subject_subcode`,`student_sid`),
  ADD KEY `student_sid` (`student_sid`);

--
-- Indexes for table `subject_has_users`
--
ALTER TABLE `subject_has_users`
  ADD PRIMARY KEY (`subject_subcode`,`users_sno`),
  ADD KEY `users_sno` (`users_sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `sch_id` (`sch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result_processing`
--
ALTER TABLE `result_processing`
  ADD CONSTRAINT `result_processing_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`sid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sch_id`) REFERENCES `school` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_has_student`
--
ALTER TABLE `subject_has_student`
  ADD CONSTRAINT `subject_has_student_ibfk_1` FOREIGN KEY (`student_sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_has_student_ibfk_2` FOREIGN KEY (`subject_subcode`) REFERENCES `subject` (`subcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_has_users`
--
ALTER TABLE `subject_has_users`
  ADD CONSTRAINT `subject_has_users_ibfk_1` FOREIGN KEY (`subject_subcode`) REFERENCES `subject` (`subcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_has_users_ibfk_2` FOREIGN KEY (`users_sno`) REFERENCES `users` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sch_id`) REFERENCES `school` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
