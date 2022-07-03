-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 08:40 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(15) NOT NULL,
  `division` varchar(100) NOT NULL,
  `start_point` int(10) NOT NULL,
  `end_point` int(10) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(15) NOT NULL,
  `gradename` varchar(100) NOT NULL,
  `start_value` int(10) NOT NULL,
  `end_value` int(10) NOT NULL,
  `grade_point` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result_processing`
--

CREATE TABLE `result_processing` (
  `stu_id` varchar(100) NOT NULL,
  `sum` float NOT NULL,
  `avg` float NOT NULL,
  `div_point` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `regno` varchar(100) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `schooltype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`regno`, `schoolname`, `schooltype`) VALUES
('S0101', 'AZANIA', 'Government'),
('S0104', 'BWIRU', 'Government'),
('S0108', 'IFUNDA TECHNICAL', 'Government'),
('S0775', 'DUMILA', 'Government');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(100) NOT NULL,
  `sch_id` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) NOT NULL,
  `sex` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sch_id`, `f_name`, `m_name`, `l_name`, `sex`) VALUES
('S01010001', 'S0101', 'FABIANI', 'A', 'MSUYA', 'M'),
('S07750001', 'S0775', 'HALIMA', 'M', 'BILALI', 'F'),
('S0775002', 'S0775', 'WITNES', 'C', 'CHITEMO', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subcode` varchar(100) NOT NULL,
  `subname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subcode`, `subname`) VALUES
('011', 'CIVICS'),
('012', 'History'),
('013', 'Geography'),
('021', 'Kiswahili'),
('022', 'English Language'),
('024', 'Literature in English'),
('031', 'Physics'),
('032', 'Chemistry'),
('033', 'Biology'),
('041', 'Basic Mathematics'),
('061', 'Commerce'),
('062', 'Book keeping');

-- --------------------------------------------------------

--
-- Table structure for table `subject_has_student`
--

CREATE TABLE `subject_has_student` (
  `subject_subcode` varchar(100) NOT NULL,
  `student_sid` varchar(100) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_has_student`
--

INSERT INTO `subject_has_student` (`subject_subcode`, `student_sid`, `score`) VALUES
('011', 'S01010001', 0),
('011', 'S07750001', 0),
('011', 'S0775002', 0),
('012', 'S01010001', 0),
('012', 'S07750001', 0),
('012', 'S0775002', 0),
('013', 'S01010001', 0),
('013', 'S07750001', 0),
('013', 'S0775002', 0),
('021', 'S01010001', 0),
('021', 'S07750001', 0),
('021', 'S0775002', 0),
('022', 'S01010001', 0),
('022', 'S07750001', 0),
('022', 'S0775002', 0),
('024', 'S01010001', 0),
('024', 'S07750001', 0),
('024', 'S0775002', 0),
('031', 'S01010001', 98),
('031', 'S07750001', 0),
('032', 'S01010001', 0),
('032', 'S07750001', 0),
('033', 'S01010001', 0),
('033', 'S07750001', 0),
('033', 'S0775002', 0),
('041', 'S01010001', 0),
('041', 'S07750001', 0),
('041', 'S0775002', 0),
('061', 'S01010001', 0),
('061', 'S07750001', 0),
('062', 'S01010001', 0),
('062', 'S07750001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_has_users`
--

CREATE TABLE `subject_has_users` (
  `subject_subcode` varchar(100) NOT NULL,
  `users_sno` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_has_users`
--

INSERT INTO `subject_has_users` (`subject_subcode`, `users_sno`) VALUES
('031', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(100) NOT NULL,
  `sch_id` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) NOT NULL,
  `sex` char(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `sch_id`, `f_name`, `m_name`, `l_name`, `sex`, `username`, `password`, `role`) VALUES
(1, 'S0775', 'NGOILA', 'S', 'MANYWA', 'M', 'MANYWA', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'S0775', 'ESTER', 'ZAKAYO', 'MKOA', 'F', 'ZAKAYO', 'e10adc3949ba59abbe56e057f20f883e', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_processing`
--
ALTER TABLE `result_processing`
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`regno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`,`sch_id`),
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
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result_processing`
--
ALTER TABLE `result_processing`
  ADD CONSTRAINT `result_processing_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
