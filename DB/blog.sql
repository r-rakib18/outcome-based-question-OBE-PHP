-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 09:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(55) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(2, 'alamin', 'alaminbubt85@gmail.com', '123'),
(3, 'siam', 'siam@gmail.com ', '123456 '),
(4, 'siam', 'siam@gmail.com ', '123456 '),
(5, 'siam', 'siam@gmail.com ', '123456 '),
(6, 'siam', 'siam@gmail.com ', '123456 ');

-- --------------------------------------------------------

--
-- Table structure for table `final_question_details`
--

CREATE TABLE `final_question_details` (
  `id` int(11) NOT NULL,
  `final_question_id` int(11) NOT NULL,
  `question_set_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_question_details`
--

INSERT INTO `final_question_details` (`id`, `final_question_id`, `question_set_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `final_question_master`
--

CREATE TABLE `final_question_master` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_question_master`
--

INSERT INTO `final_question_master` (`id`, `semester_id`, `exam_id`, `course_id`, `teacher_id`) VALUES
(1, 10, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `book_id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `book_name` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`book_id`, `pro_id`, `book_name`, `author`) VALUES
(1, 1, 'PHP', 'Tylor'),
(2, 2, 'JAVA', 'Tylor'),
(3, 3, 'Python', 'Tylor3'),
(4, 4, 'Ruby', 'Tylor4'),
(6, 5, 'Swift', 'Tylor5'),
(7, 6, 'JS', 'Tylor6'),
(8, 0, 'DOT.NET', 'Microsoft'),
(10, 5, 'Data structure', 'hanson'),
(20, 4, 'Digital Logic Design', 'mark'),
(22, 9, 'Accounting', 'alamin'),
(23, 9, 'Human management', 'joh'),
(24, 7, 'machine', 'michel'),
(25, 7, 'Automation', 'chris');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chapter`
--

CREATE TABLE `tbl_chapter` (
  `chapter_id` int(3) NOT NULL,
  `book_id` int(55) NOT NULL,
  `chapter_no` int(30) NOT NULL,
  `chapter_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_chapter`
--

INSERT INTO `tbl_chapter` (`chapter_id`, `book_id`, `chapter_no`, `chapter_title`) VALUES
(1, 1, 1, 'function'),
(2, 2, 2, 'OOP'),
(3, 3, 3, 'interface'),
(4, 4, 4, 'constructor'),
(5, 2, 5, 'destructor'),
(7, 1, 7, 'Inheritance'),
(8, 1, 8, 'Session'),
(9, 2, 8, 'method');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(3) NOT NULL,
  `course_code` varchar(55) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_credit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_code`, `course_title`, `course_credit`) VALUES
(1, 'CSE-111', 'Structured Programmig', 4),
(2, 'CSE-121', 'C++', 3),
(3, 'CSE-210', 'High lavel language', 4.5),
(4, 'CSE-310', 'Database language', 3),
(6, 'CSE-451', 'cyber security', 4),
(7, 'CSE-500', 'machine learning', 3.5),
(8, 'CSE-221', 'Programming with C', 4.5),
(9, 'CSE-600', 'JAVA advanced programming', 4.5),
(18, 'CSE-600', 'cyber security', 4.5),
(19, 'CSE-600', 'cyber security', 4.5),
(20, 'CSE-600', 'cyber security', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courseoffer`
--

CREATE TABLE `tbl_courseoffer` (
  `offer_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `teacher_dept` varchar(20) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `intake` int(11) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_courseoffer`
--

INSERT INTO `tbl_courseoffer` (`offer_id`, `semester_id`, `course_code`, `teacher_id`, `teacher_dept`, `pro_id`, `intake`, `section`) VALUES
(1, 1, 'CSE-111', 1, 'CSE', 1, 30, 2),
(7, 8, 'CSE-310', 1, 'EEE', 1, 30, 2),
(8, 7, 'CSE-221', 6, 'MATH', 2, 56, 3),
(9, 6, 'CSE-600', 7, 'CSE', 1, 40, 1),
(10, 4, 'CSE-600', 4, 'CSE', 2, 26, 3),
(11, 11, 'CSE-121', 1, '', 1, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `exam_id` int(3) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `exam_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`exam_id`, `exam_name`, `exam_time`) VALUES
(12, 'Mid', '1.30'),
(13, 'Final', '2.00'),
(14, 'CT', '0.10'),
(16, 'Qt', '0.05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_outcome`
--

CREATE TABLE `tbl_outcome` (
  `outcome_id` int(10) NOT NULL,
  `outcome_code` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_outcome`
--

INSERT INTO `tbl_outcome` (`outcome_id`, `outcome_code`) VALUES
(1, 'CO-1'),
(2, 'CO-2'),
(3, 'CO-3'),
(6, 'CO-4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`pro_id`, `pro_name`) VALUES
(1, 'CSE'),
(2, 'EEE'),
(3, 'MATH'),
(4, 'LAW'),
(7, 'Textile'),
(8, 'English'),
(9, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `q_id` int(10) NOT NULL,
  `course_id` int(55) NOT NULL,
  `t_id` int(10) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `chapter` int(20) NOT NULL,
  `outcome` varchar(10) NOT NULL,
  `marks` int(10) NOT NULL,
  `question` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`q_id`, `course_id`, `t_id`, `book_name`, `chapter`, `outcome`, `marks`, `question`, `image`) VALUES
(1, 1, 1, '1', 1, 'CO-1', 3, '<p>This handout will help you understand how paragraphs are formed, how to develop stronger paragraphs, and how to completely and clearly express your ideas.</p>\r\n', 'asset/image/me.JPG'),
(2, 1, 0, '2', 2, 'CO-1', 5, '<p>Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes</p>\r\n', 'asset/image/logo_o.png'),
(3, 1, 1, '3', 3, 'CO-3', 4, '<p>There are many different ways to organize a paragraph. The organization you choose will depend on the controlling idea of the paragraph.&nbsp;<strong>Below are a few possibilities for organization, with links to brief examples:</strong></p>\r\n', 'asset/image/ex-2.png'),
(4, 1, 0, '2', 2, 'CO-1', 10, 'dfgdfgdfg', 'asset/image/Screenshot_3.png'),
(5, 1, 0, '2', 2, 'CO-1', 10, 'dfgdfgdfg', 'asset/image/Screenshot_3.png'),
(6, 1, 0, '2', 2, 'CO-1', 10, 'dfgdfgdfg', 'assets/img/Screenshot_3.png'),
(7, 1, 0, '2', 2, 'CO-1', 10, 'dfgdfgdfg', 'assets/img/Screenshot_3.png'),
(8, 3, 1, '4', 5, 'CO-3', 2, 'fyhy', 'assets/img/Screenshot_7.png'),
(9, 3, 1, '3', 3, 'CO-1', 5, 'explain about your self', 'assets/img/Screenshot_2.png'),
(10, 0, 0, '', 0, '', 0, '', 'assets/img/pexels-kelly-lacy-2519392.jpg'),
(11, 2, 0, '1', 4, 'CO-1', 10, 'Notice that the table in the example above has double borders. This is because both the table and the <th> and <td> elements have separate borders.', 'assets/img/to-do-list (1).png'),
(12, 2, 0, '1', 4, 'CO-1', 10, 'Notice that the table in the example above has double borders. This is because both the table and the <th> and <td> elements have separate borders.', 'assets/img/to-do-list (1).png'),
(13, 2, 1, '20', 4, 'CO-2', 10, '১৭ জুলাই, ২০২০ - The vertical-align CSS property sets vertical alignment of an inline, ... applies to inline, inline-block and table-cell elements: you can t\r\nUSE\r\n    it TO vertically align...vertical - align: TEXT - bottom; vertical - align: middle; vertical - align: top;...', ' assets / img / LOG.png '),
(14, 7, 1, '24', 7, 'CO-3', 0, 'Note: this documentation will use yarn commands, however, npm will also work.\r\n\r\nTo get started we will write a test for a hypothetical function that adds two numbers. The first thing we will do is to create a sum.js file:', 'assets/img/daily_maintenance.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_set`
--

CREATE TABLE `tbl_question_set` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `set_no` varchar(255) NOT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_question_set`
--

INSERT INTO `tbl_question_set` (`id`, `teacher_id`, `program_id`, `exam_id`, `course_id`, `set_no`, `semester_id`) VALUES
(1, 1, 1, 12, 1, 'Set - 1', 10),
(2, 1, 1, 12, 3, 'Set - 2', 10),
(3, 1, 1, 0, 7, 'Set - 3', 0),
(4, 1, 1, 0, 7, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_set_details`
--

CREATE TABLE `tbl_question_set_details` (
  `id` int(11) NOT NULL,
  `question_set_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_question_set_details`
--

INSERT INTO `tbl_question_set_details` (`id`, `question_set_id`, `question_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 8),
(4, 2, 9),
(5, 3, 14),
(6, 4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reference`
--

CREATE TABLE `tbl_reference` (
  `r-id` int(20) NOT NULL,
  `r_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reference`
--

INSERT INTO `tbl_reference` (`r-id`, `r_name`) VALUES
(1, 'asset/image/1.png'),
(2, 'asset/image/2.png'),
(3, 'asset/image/3.jpg'),
(4, 'asset/image/Screenshot_1.png'),
(5, 'asset/image/Screenshot_2.png'),
(6, 'asset/image/Screenshot_3.png'),
(7, 'asset/image/Screenshot_4.png'),
(8, 'asset/image/3.jpg'),
(9, 'asset/image/Chrysanthemum.jpg'),
(10, 'asset/image/Desert.jpg'),
(11, 'asset/image/DOLAR.jpg'),
(12, 'asset/image/db.jpg'),
(13, 'asset/image/81838500_555022012012486_977513292186517504'),
(14, 'asset/image/50fba1f41b42637172f5237cdc4fe415879ace716f4'),
(15, 'asset/image/atm1.jpg'),
(16, 'asset/image/faq.jpg'),
(17, 'asset/image/Five_crescents_FiveColor2_0.jpg'),
(18, 'asset/image/ales-nesetril-Im7lZjxeLhg-unsplash.jpg'),
(19, 'asset/image/ales-nesetril-Im7lZjxeLhg-unsplash.jpg'),
(20, 'asset/image/me.JPG'),
(21, 'asset/image/logo_o.png'),
(22, 'asset/image/ex-2.png'),
(23, 'asset/image/Screenshot_3.png'),
(24, 'asset/image/Screenshot_3.png'),
(25, 'assets/img/Screenshot_3.png'),
(26, 'assets/img/Screenshot_3.png'),
(27, 'assets/img/Screenshot_7.png'),
(28, 'assets/img/Screenshot_2.png'),
(29, 'assets/img/pexels-kelly-lacy-2519392.jpg'),
(30, 'assets/img/to-do-list (1).png'),
(31, 'assets/img/to-do-list (1).png'),
(32, 'assets/img/log.png'),
(33, 'assets/img/log.png'),
(34, 'assets/img/log.png'),
(35, 'assets/img/log.png'),
(36, 'assets/img/log.png'),
(37, 'assets/img/log.png'),
(38, 'assets/img/log.png'),
(39, 'assets/img/daily_maintenance.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `semester_id` int(3) NOT NULL,
  `semester_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semester_id`, `semester_name`) VALUES
(10, 'Fall-2018'),
(11, 'Summer-2021'),
(12, 'Fall-2018'),
(13, 'Fall-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(3) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `short_name` varchar(5) NOT NULL,
  `teacher_email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `teacher_status` int(10) NOT NULL,
  `teacher_designation` varchar(10) NOT NULL,
  `teacher_dept` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_name`, `short_name`, `teacher_email`, `password`, `teacher_status`, `teacher_designation`, `teacher_dept`) VALUES
(1, 'Masudul Islam', 'MMD', 'masudulislambubt421@gmail.com', '123', 1, 'Lecturer', 'CSE'),
(4, 'Ashraful Islam', 'AAS', 'ashrafulislam516@gmail.com', '12345', 1, 'Lecturer', 'EEE'),
(6, 'Sohel Ahmed', 'SA', 'sohelahmedbubt201@gmail.com', '456', 1, 'lecturer', 'MATH'),
(7, 'Sajib Reza', 'SR', 'sajibreza310@gmail.com', '789', 1, 'lecturer', 'CSE'),
(8, 'Anawar Wadud', 'AWH', 'anawarwadud201@gmail.com', '987', 1, 'lecturer', 'CSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `final_question_details`
--
ALTER TABLE `final_question_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_question_master`
--
ALTER TABLE `final_question_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_chapter`
--
ALTER TABLE `tbl_chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_courseoffer`
--
ALTER TABLE `tbl_courseoffer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_outcome`
--
ALTER TABLE `tbl_outcome`
  ADD PRIMARY KEY (`outcome_id`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tbl_question_set`
--
ALTER TABLE `tbl_question_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question_set_details`
--
ALTER TABLE `tbl_question_set_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reference`
--
ALTER TABLE `tbl_reference`
  ADD PRIMARY KEY (`r-id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `final_question_details`
--
ALTER TABLE `final_question_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `final_question_master`
--
ALTER TABLE `final_question_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `book_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_chapter`
--
ALTER TABLE `tbl_chapter`
  MODIFY `chapter_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_courseoffer`
--
ALTER TABLE `tbl_courseoffer`
  MODIFY `offer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `exam_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_outcome`
--
ALTER TABLE `tbl_outcome`
  MODIFY `outcome_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_question_set`
--
ALTER TABLE `tbl_question_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_question_set_details`
--
ALTER TABLE `tbl_question_set_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_reference`
--
ALTER TABLE `tbl_reference`
  MODIFY `r-id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `semester_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
