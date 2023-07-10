-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 10:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accademicyear`
--

CREATE TABLE `accademicyear` (
  `Id` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Status` int(5) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accademicyear`
--

INSERT INTO `accademicyear` (`Id`, `Name`, `Status`, `date`) VALUES
(1, '2020/2021', 0, '2023-06-25'),
(2, '2020/2021', 0, '2023-06-25'),
(3, '2020/2021', 0, '2023-06-25'),
(4, '2021/2022', 0, '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(20) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phoneNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adminId` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `role` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `firstName`, `lastName`, `otherName`, `email`, `gender`, `phoneNo`, `password`, `adminId`, `date`, `role`) VALUES
(1, 'Mends', 'Gyan', 'Admin', 'admin@mail.com', 'male', '593125184', 'admin', 'admin1', '2020', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `Name`, `date`) VALUES
(1, 'BTECH(IT)', '2023-06-25'),
(2, 'HND', '2023-06-25'),
(3, 'HND', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `creditHours` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Id`, `Name`, `Code`, `faculty`, `department`, `level`, `semester`, `date`, `creditHours`) VALUES
(1, 'Software Testing', 'ST1', 'Applied Sciences', 'IT Dept', '300', 'First Semester', '2023-06-25', NULL),
(2, 'Software Testing', 'ST1', 'Applied Sciences', 'IT Dept', '300', 'First Semester', '2023-06-25', NULL),
(3, 'Software Testing', 'ST1', 'Applied Sciences', 'IT Dept', '100', 'First Semester', '2023-06-25', 3),
(4, 'Java', 'J1', 'Applied Sciences', 'IT Dept', '300', 'First Semester', '2023-06-25', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Id` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Id`, `Name`, `faculty`, `date`) VALUES
(1, 'IT Dept', 'Applied Sciences', '2023-06-25'),
(2, 'IT Dept', 'Applied Sciences', '2023-06-25'),
(3, 'IT Dept', 'Applied Sciences', '2023-06-25'),
(4, 'IT Dept', 'Applied Sciences', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Id` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Id`, `Name`, `date`) VALUES
(5, 'Applied Sciences', '2023-06-24'),
(6, 'Applied Sciences', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Id` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`Id`, `Name`, `Date`) VALUES
(1, '100', '2023-06-25'),
(2, '100', '2023-06-25'),
(3, '200', '2023-06-25'),
(4, '300', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `std_id` varchar(250) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `role` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `std_id`, `email`, `password`, `role`) VALUES
(1, 'SHJHS1001', 'p1@gmail.com', 'p1', 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Id` int(10) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `accademicYear` varchar(10) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `CreditHours` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL,
  `scoreGradePoint` varchar(50) NOT NULL,
  `scoreLetterGrade` varchar(10) NOT NULL,
  `totalScoreGradePoint` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`Id`, `student_id`, `level`, `semester`, `accademicYear`, `courseCode`, `CreditHours`, `score`, `scoreGradePoint`, `scoreLetterGrade`, `totalScoreGradePoint`, `date`) VALUES
(1, 'bcict20098', '100', 'First Seme', '2021/2022', 'g1', '3', '98', '4', 'A+', '12', '2023-06-25'),
(2, 'bcict20098', '300', 'First Seme', '2021/2022', 'J1', '3', '98', '4', 'A+', '12', '2023-06-25'),
(3, 'bcict20098', '300', 'First Seme', '2021/2022', 'J1', '3', '98', '4', 'A+', '12', '2023-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `Id` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`Id`, `Name`, `date`) VALUES
(1, 'First Semester', '2023-06-25'),
(2, 'Second Semester', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Id` int(20) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Level` int(10) NOT NULL,
  `AccademicYear` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` int(10) NOT NULL,
  `StudentId` varchar(10) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Role` text NOT NULL,
  `birthDate` date NOT NULL,
  `Date` date DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Id`, `Images`, `Name`, `Email`, `Faculty`, `Level`, `AccademicYear`, `Password`, `Phone`, `StudentId`, `Department`, `Gender`, `Role`, `birthDate`, `Date`, `class`) VALUES
(1, 'original-5caf884e10214e05239eaa7458e3aa27 (1).webp', 'Mends Gyan', 'gyan@gmail.com', 'Applied Sciences', 300, '2020/2021', '*01A6717B58FF5C7EAFFF6CB7C96F7428EA65FE4C', 548348485, 'bcict20098', 'IT Dept', 'Male', 'student', '0000-00-00', '2023-06-25', NULL),
(5, 'original-5caf884e10214e05239eaa7458e3aa27 (1).webp', 'Mends', 'mends@gmail.com', 'Applied Sciences', 100, '2021/2022', '*01A6717B58FF5C7EAFFF6CB7C96F7428EA65FE4C', 548348485, 'bcict20099', 'IT Dept', 'Male', 'student', '0000-00-00', '2023-06-25', 'BTECH(IT)');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `teacher_id` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` tinytext DEFAULT NULL,
  `jhs1` varchar(250) NOT NULL,
  `jhs2` varchar(250) NOT NULL,
  `jhs3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `teacher_id`, `subject`, `mobile`, `email`, `password`, `role`, `jhs1`, `jhs2`, `jhs3`) VALUES
(1, 'teacher1', 't1', 'maths', '1', 'teacher1@gmail.com', 'teacher1', 'teacher', 'jhs1', 'q', 'q'),
(2, 'teacher2', 't2', 'english', '1', 'teacher2@gmail.com', 'teacher2', 'teacher', 'jhs1', '', ''),
(3, 'teacher3', 't3', 'science', '1', 'teacher3@gmail.com', 'teacher3', 'teacher', 'jhs1', 'jhs2', ''),
(4, 'Coffie oppong', 't4', 'social studies', '0246414197', 'teacher4@gmail.com', 'teacher4', 'teacher', 'jhs1', 'jhs2', 'jhs3'),
(5, 'Coffie oppong', 't5', 'BDT', '0246414197', 'teacher5@gmail.com', 'teacher5', 'teacher', 'jhs1', 'jhs2', 'jhs3'),
(6, 'Coffie oppong', 't6', 'french', '0246414197', 'teacher6@gmail.com', 'teacher6', 'teacher', 'jhs1', 'jhs2', 'jhs3'),
(7, 'Coffie oppong', 't7', 'R M E', '0246414197', 'teacher7@gmail.com', 'teacher7', 'teacher', 'jhs1', 'jhs2', ''),
(8, 'teacher8', 't8', 'Creative Art', '1', 'teacher8@gmail.com', 'teacher8', 'teacher', 'jhs1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term1 _start` date NOT NULL,
  `term1 _end` date NOT NULL,
  `term2_start` date NOT NULL,
  `term2_end` date NOT NULL,
  `term3_start` date NOT NULL,
  `term3_end` date NOT NULL,
  `current_term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term1 _start`, `term1 _end`, `term2_start`, `term2_end`, `term3_start`, `term3_end`, `current_term`) VALUES
('2023-06-19', '2023-06-14', '2023-06-08', '2023-06-23', '2023-06-08', '2023-06-15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accademicyear`
--
ALTER TABLE `accademicyear`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accademicyear`
--
ALTER TABLE `accademicyear`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
