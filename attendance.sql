-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2023 at 10:32 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `btech`
--

DROP TABLE IF EXISTS `btech`;
CREATE TABLE IF NOT EXISTS `btech` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `attendance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `timerange` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `btech`
--

INSERT INTO `btech` (`ID`, `student_id`, `student_name`, `course_name`, `attendance`, `date`, `timerange`) VALUES
(1, '23030185023', 'Ram Sharma', 'RDBMS', 'present', '2023-09-15', '14:30-16:30'),
(2, '23030185026', 'Shyam Sharma', 'RDBMS', 'absent', '2023-09-15', '14:30-16:30'),
(3, '23030185023', 'Ram Sharma', 'WDF', 'present', '2023-09-15', '10:00-12:00'),
(4, '23030185026', 'Shyam Sharma', 'WDF', 'present', '2023-09-15', '10:00-12:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_credits` int NOT NULL,
  `course_duration` int NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_credits`, `course_duration`) VALUES
('C101', 'PHP', 2, 30),
('C102', 'Python', 2, 30),
('C103', 'PPITM', 3, 45),
('C104', 'SE', 4, 60),
('C105', 'RDBMS', 4, 60),
('C106', 'WDF', 2, 30),
('1006', 'MySQL', 4, 45);

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher_assignment`
--

DROP TABLE IF EXISTS `course_teacher_assignment`;
CREATE TABLE IF NOT EXISTS `course_teacher_assignment` (
  `assignment_id` int NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(30) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `program_name` varchar(30) NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_teacher_assignment`
--

INSERT INTO `course_teacher_assignment` (`assignment_id`, `teacher_name`, `course_name`, `program_name`) VALUES
(1, 'Shirish Joshi', 'Python', 'MBA-IT'),
(2, 'Prof.Sandeep Gaikwad', 'PHP', 'MBA-IT'),
(3, 'Prathamesh Lahande', 'RDBMS', 'BTech'),
(4, 'Prathamesh Lahande', 'WDF', 'BTech'),
(5, 'Janhavi Pednekar', 'WDF', 'MBA-IT'),
(6, 'Subhashri Waghmare', 'SE', 'MBA-DT'),
(7, 'Sarika Zambad', 'PPITM', 'MBA-DT'),
(8, 'Subhashri Waghmare', 'SE', 'MBA-IT');

-- --------------------------------------------------------

--
-- Table structure for table `mba-dt`
--

DROP TABLE IF EXISTS `mba-dt`;
CREATE TABLE IF NOT EXISTS `mba-dt` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `attendance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `timerange` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mba-dt`
--

INSERT INTO `mba-dt` (`ID`, `student_id`, `student_name`, `course_name`, `attendance`, `date`, `timerange`) VALUES
(1, '23030141035', 'Kshitij Ghera', 'PPITM', 'present', '2023-09-16', '12:00-14:00'),
(2, '23030152033', 'Rashil Shah', 'PPITM', 'absent', '2023-09-16', '12:00-14:00');

-- --------------------------------------------------------

--
-- Table structure for table `mba-it`
--

DROP TABLE IF EXISTS `mba-it`;
CREATE TABLE IF NOT EXISTS `mba-it` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `attendance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `timerange` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mba-it`
--

INSERT INTO `mba-it` (`ID`, `student_id`, `student_name`, `course_name`, `attendance`, `date`, `timerange`) VALUES
(1, '23030141049', 'Priyank Rathod', 'Python', 'present', '2023-09-14', '03:39-04:39'),
(2, '23030141047', 'Rahul Pandey', 'Python', 'present', '2023-09-14', '03:39-04:39'),
(3, '23030141049', 'Priyank Rathod', 'Python', 'absent', '', '-'),
(4, '23030141047', 'Rahul Pandey', 'Python', 'absent', '', '-'),
(5, '23030141049', 'Priyank Rathod', 'Python', 'present', '2023-09-17', '19:50-20:50'),
(6, '23030141047', 'Rahul Pandey', 'Python', 'absent', '2023-09-17', '19:50-20:50'),
(7, '23030141049', 'Priyank Rathod', 'SE', 'absent', '2023-09-18', '12:00-15:00'),
(8, '23030141047', 'Rahul Pandey', 'SE', 'present', '2023-09-18', '12:00-15:00');

-- --------------------------------------------------------

--
-- Table structure for table `msc`
--

DROP TABLE IF EXISTS `msc`;
CREATE TABLE IF NOT EXISTS `msc` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `attendance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `timerange` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` varchar(10) NOT NULL,
  `program_name` varchar(10) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`) VALUES
('P1001', 'MBA-IT'),
('P1002', 'MBA-DT'),
('P1003', 'BTech'),
('104', 'MTech');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` varchar(20) NOT NULL,
  `student_program` varchar(10) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_username` varchar(20) NOT NULL,
  `student_password` varchar(20) NOT NULL,
  `student_cpassword` varchar(20) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_program`, `student_name`, `student_email`, `student_username`, `student_password`, `student_cpassword`) VALUES
('23030141049', 'MBA-IT', 'Priyank Rathod', 'mihirpriyank2329@gmail.com', 'priyank_2909', 'priyank1234', 'priyank1234'),
('23030141047', 'MBA-IT', 'Rahul Pandey', 'rahul@gmail.com', 'rahul', 'rahul1234', 'rahul1234'),
('23030141035', 'MBA-DT', 'Kshitij Ghera', 'kshitij@gmail.com', 'kshitij', 'kshitij1234', 'kshitij1234'),
('23030152033', 'MBA-DT', 'Rashil Shah', 'rashil@gmail.com', 'rashil_33', 'rahilshah', 'rahilshah'),
('23030185023', 'BTech', 'Ram Sharma', 'ram@gmail.com', 'ram_42', 'ram12345', 'ram12345'),
('23030185026', 'BTech', 'Shyam Sharma', 'shyam@gmail.com', 'shyam_54', 'shyam1234', 'shyam1234');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` varchar(10) NOT NULL,
  `teacher_name` varchar(20) NOT NULL,
  `teacher_email` varchar(30) NOT NULL,
  `teacher_phone` varchar(10) NOT NULL,
  `teacher_username` varchar(30) NOT NULL,
  `teacher_password` varchar(30) NOT NULL,
  `teacher_cpassword` varchar(30) NOT NULL,
  `teacher_degree` varchar(20) NOT NULL,
  `specialized_course_1` varchar(20) NOT NULL,
  `specialized_course_2` varchar(20) DEFAULT NULL,
  `specialized_course_3` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_phone`, `teacher_username`, `teacher_password`, `teacher_cpassword`, `teacher_degree`, `specialized_course_1`, `specialized_course_2`, `specialized_course_3`) VALUES
('T2001', 'Prof.Sandeep Gaikwad', 'sandeepsir@gmail.com', '8564123659', 'sandeepsir', 'sandeep123', 'sandeep123', 'MBA', 'PHP', 'HTML', 'JAVASCRIPT'),
('T2002', 'Shirish Joshi', 'shirish@gmail.com', '9653231254', 'shirishjoshi', '12345678', '12345678', 'Masters', 'Python', '', ''),
('T2003', 'Prathamesh Lahande', 'prathamesh@gmail.com', '8965471236', 'prathameshsir', 'prathamesh1234', 'prathamesh1234', 'DBA expert', 'RDBMS', 'WDF', ''),
('T2004', 'Subhashri Waghmare', 'subhashri@gmail.com', '7452312365', 'subhashriwaghmare', 'subhashri1234', 'subhashri1234', 'Engineering', 'SE', '6 Sigma', ''),
('T2005', 'Janhavi Pednekar', 'janhavi@gmail.com', '8523135648', 'janhavipednekar', 'janhavi1234', 'janhavi1234', 'Masters', 'WDF', '', ''),
('T2006', 'Sarika Zambad', 'sarika@gmail.com', '8563214521', 'sarika', 'sarika1234', 'sarika1234', 'Honors', 'PPITM', 'Economics', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
