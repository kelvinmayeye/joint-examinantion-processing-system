-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2022 at 11:44 AM
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
('23001', 'SHULE YA SEKONDARI MAGOZA', 'government');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(5) NOT NULL,
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
(125, '23001', 'JULIANA', 'MICHAEL', 'MARCO', 'F'),
(787, '23001', 'yeee', 'wwee', 'wwwe', 'M');

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
(101, 'Mathematics'),
(112, 'Hist');

-- --------------------------------------------------------

--
-- Table structure for table `subject_has_student`
--

CREATE TABLE `subject_has_student` (
  `subject_subcode` int(100) NOT NULL,
  `student_sid` int(5) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(101, 12),
(112, 13);

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
(7, '23001', 'LAMECK', 'MIKA', 'MWAGONGO', 'M', 'LAMECK', '202cb962ac59075b964b07152d234b70', 'teacher'),
(8, '23001', 'FRANK', 'ELIAS', 'JUSTINE', 'M', 'FRANK', '202cb962ac59075b964b07152d234b70', 'academic'),
(9, '23001', 'SHABANI', 'ALLY', 'JUMA', 'M', 'SHABANI', '202cb962ac59075b964b07152d234b70', 'head'),
(12, '23001', 'JACKSON', 'PILI', 'MWANGI', 'M', 'jack', '202cb962ac59075b964b07152d234b70', 'teacher'),
(13, '23001', 'FATUMA', 'SHABANI', 'RAMADHANI', 'F', 'fatuma', '202cb962ac59075b964b07152d234b70', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

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
