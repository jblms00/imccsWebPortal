-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 07:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imccs_webportal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_calendar`
--

CREATE TABLE `academic_calendar` (
  `calendar_id` bigint(20) NOT NULL,
  `event_name` varchar(150) DEFAULT NULL,
  `event_month` varchar(150) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `is_holiday` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_calendar`
--

INSERT INTO `academic_calendar` (`calendar_id`, `event_name`, `event_month`, `event_date`, `is_holiday`) VALUES
(1, 'New Year\'s Day', 'January', '2024-01-01', 'true'),
(2, 'Lunar New Year', 'February', '2024-02-09', 'true'),
(3, 'Maundy Thursday', 'March', '2024-03-28', 'true'),
(4, 'Good Friday', 'March', '2024-03-29', 'true'),
(5, 'Holy Saturday', 'March', '2024-03-30', 'true'),
(6, 'Day of Valor', 'April', '2024-04-09', 'true'),
(7, 'Eid al-Fitr', 'April', '2024-04-10', 'true'),
(8, 'Labour Day', 'May', '2024-05-01', 'true'),
(9, 'Philippines Independence Day', 'June', '2024-06-12', 'true'),
(10, 'Eid al-Adha', 'June', '2024-06-17', 'true'),
(11, 'Ninoy Aquino Day', 'August', '2024-08-23', 'true'),
(12, 'National Heroes\' Day', 'August', '2024-08-26', 'true'),
(13, 'All Saints Day', 'November', '2024-11-01', 'true'),
(14, 'Bonifacio Day', 'November', '2024-11-30', 'true'),
(15, 'Feast of the Immaculate Conception', 'December', '2024-12-08', 'true'),
(16, 'Christmas', 'December', '2024-12-25', 'true'),
(17, 'Rizal Day', 'December', '2024-12-30', 'true'),
(18, 'New Year\'s Eve', 'December', '2024-12-31', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `academic_subjects`
--

CREATE TABLE `academic_subjects` (
  `subject_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `subject_name` text DEFAULT NULL,
  `subject_code` varchar(50) DEFAULT NULL,
  `lec_units` int(11) NOT NULL,
  `lab_units` int(11) NOT NULL,
  `semester` varchar(150) NOT NULL,
  `year_level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_subjects`
--

INSERT INTO `academic_subjects` (`subject_id`, `course_id`, `subject_name`, `subject_code`, `lec_units`, `lab_units`, `semester`, `year_level`) VALUES
(1, 736646, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(2, 736646, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(3, 736646, 'Puposive Communication', 'GEP', 3, 0, '1st', '1st'),
(4, 736646, 'Ethics', 'GEE', 3, 0, '1st', '1st'),
(5, 736646, 'Technology for Teaching & Learning 1', 'TTL 1', 3, 0, '1st', '1st'),
(6, 736646, 'The Child & Adolescent Learners & Learning Principles', 'Ed 1', 3, 0, '1st', '1st'),
(7, 736646, 'Introduksyon sa Pag-aaral ng Wika', 'Fil 101', 3, 0, '1st', '1st'),
(8, 736646, 'Student Formation Development', 'SFD', 1, 0, '1st', '1st'),
(9, 736646, 'Movement Competency Training', 'PATHFIT-1', 2, 0, '1st', '1st'),
(10, 736646, 'Literacy Training Service 1', 'NSTP-1', 3, 0, '1st', '1st'),
(11, 736646, 'Reading in Philippines History (with Peace Education)', 'GER', 3, 0, '2nd', '1st'),
(12, 736646, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '1st'),
(13, 736646, 'Understanding the Self', 'GEU', 3, 0, '2nd', '1st'),
(14, 736646, 'The Teaching Profession (with Cursive Writing)', 'Ed2', 3, 0, '2nd', '1st'),
(15, 736646, 'Foundation of Special & Inclusive Education', 'Ed 3', 3, 0, '2nd', '1st'),
(16, 736646, 'Panimulang Linggwistika', 'Fil 102', 3, 0, '2nd', '1st'),
(17, 736646, 'Exercise-Based Fitness Activities', 'PATH FIT-2', 2, 0, '2nd', '1st'),
(18, 736646, 'Literacy Training Service 2', 'NSTP-2', 3, 0, '2nd', '1st'),
(19, 736646, 'Life, Works & Writings of Rizal', 'GER', 3, 0, '1st', '2nd'),
(20, 736646, 'Facilitating Learning-Centered Teaching', 'Ed 4', 3, 0, '1st', '2nd'),
(21, 736646, 'Building & Enhancing New Literacies Across the Curriculum', 'Ed 5', 3, 0, '1st', '2nd'),
(22, 736646, 'Panitikan ng Rehiyon', 'Lit 101', 3, 0, '1st', '2nd'),
(23, 736646, 'Kulturang Popular', 'Lit 102', 3, 0, '1st', '2nd'),
(24, 736646, 'Ang Filipino sa Kurikulum ng Batayang Edukasyon', 'Fil 103', 3, 0, '1st', '2nd'),
(25, 736646, 'Estruktura ng Wikang Filipino', 'Fil 104', 3, 0, '1st', '2nd'),
(26, 736646, 'Technology for Teaching & Learning 2', 'TTL 2', 3, 0, '1st', '2nd'),
(27, 736646, 'Martial Arts', 'PATHFIT-3', 2, 0, '1st', '2nd'),
(28, 736646, 'Gender & Society (with Phil Indigenous Comm.)', 'GE Elec 1', 3, 0, '1st', '3rd'),
(29, 736646, 'The Teacher & the School Curriculum', 'Ed 7', 3, 0, '1st', '3rd'),
(30, 736646, 'Assessment of Learning 1', 'Ed 8', 3, 0, '1st', '3rd'),
(31, 736646, 'Sanaysay At Talumpati', 'Lit 103', 3, 0, '1st', '3rd'),
(32, 736646, 'Panunuring Pampanitikan', 'Lit 104', 3, 0, '1st', '3rd'),
(33, 736646, 'Maikling Kwento at Nobelang Filipino', 'Lit 105', 3, 0, '1st', '3rd'),
(34, 736646, 'Introduksyon sa Pamamahayag', 'Fil 110', 3, 0, '1st', '3rd'),
(35, 736646, 'Barayti at Baryasyon ng Wika', 'Fil 111', 3, 0, '1st', '3rd'),
(36, 736646, 'Human Reproduction', 'GE Elec 4', 3, 0, '1st', '3rd'),
(37, 736646, 'Art Appreciation', 'GE A', 3, 0, '2nd', '3rd'),
(38, 736646, 'Assessment of Learning 2', 'Ed 9', 3, 0, '2nd', '3rd'),
(39, 736646, 'Malikhaing Pagsulat', 'Elec 1', 3, 0, '2nd', '3rd'),
(40, 736646, 'Panulaang Filipino', 'Lit 106', 3, 0, '2nd', '3rd'),
(41, 736646, 'Dulaang Filipino', 'Lit 107', 3, 0, '2nd', '3rd'),
(42, 736646, 'Mga Natatanging Diskurso sa Wika at Panitikan', 'Fil 112', 3, 0, '2nd', '3rd'),
(43, 736646, 'Technology for Teaching & Learning 2', 'TTL 2', 3, 0, '2nd', '3rd'),
(44, 736646, 'Filipino Para sa Natatanging Gamit', 'Elec 2', 3, 0, '2nd', '3rd'),
(45, 736646, 'Field Study 1 (Observation of Teaching & Learning in Actual School Environment)', 'FS 1', 3, 0, '1st', '4th'),
(46, 736646, 'Field Study 2 (Participation)', 'FS 2', 3, 0, '1st', '4th'),
(47, 736646, 'Licensure Examination Enhancement', 'LEE', 3, 0, '1st', '4th'),
(48, 736646, 'Teaching Internship', 'Practice Teaching', 6, 0, '2nd', '4th'),
(49, 845683, 'The Contemporary World', 'GE C', 3, 0, '1st', '1st'),
(50, 845683, 'Mathematics in the Modern World', 'GE M', 3, 0, '1st', '1st'),
(51, 845683, 'Purposive Communication', 'GE P', 3, 0, '1st', '1st'),
(52, 845683, 'Ethics', 'GE E', 3, 0, '1st', '1st'),
(53, 845683, 'Technology for Teaching & Learning 1', 'TTL 1', 3, 0, '1st', '1st'),
(54, 845683, 'The Child & Adolescent Learning & Learning Principles', 'Ed 1', 3, 0, '1st', '1st'),
(55, 845683, 'Inorganic Chemistry (Lecture & 2 units Lab)', 'Chem 1', 3, 2, '1st', '1st'),
(56, 845683, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(57, 845683, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(58, 845683, 'Foundation of Service 1', 'NSTP/LTS', 3, 0, '1st', '1st'),
(59, 845683, 'Reading in Philippine History (with Peace Education)', 'GE R', 3, 0, '2nd', '1st'),
(60, 845683, 'Science, Technology & Society', 'GE S', 3, 0, '2nd', '1st'),
(61, 845683, 'Understanding the Self', 'GE U', 3, 0, '2nd', '1st'),
(62, 845683, 'The Teaching Profession (with Cursive Writing)', 'Ed 2', 3, 0, '2nd', '1st'),
(63, 845683, 'Foundation of Special & Inclusive Education', 'Ed 3', 3, 0, '2nd', '1st'),
(64, 845683, 'Fluid Mechanics', 'Physics 1', 3, 0, '2nd', '1st'),
(65, 845683, 'Physical Activities Towards Health & Fitness 2 (Combative Sports)', 'PATH FIT 2', 2, 0, '2nd', '1st'),
(66, 845683, 'Social Awareness & Empowerment for Service 2', 'NSTP/LTS 2', 3, 0, '2nd', '1st'),
(67, 845683, 'Life, Work & Writing of Rizal', 'GE R', 3, 0, '1st', '2nd'),
(68, 845683, 'Facilitating Learner-Centered Teaching', 'Ed 4', 3, 0, '1st', '2nd'),
(69, 845683, 'Building & Enhancing New Literacies Across the Curriculum', 'Ed 5', 3, 0, '1st', '2nd'),
(70, 845683, 'Genetics (Lecture & Laboratory)', 'Bio 1', 3, 1, '1st', '2nd'),
(71, 845683, 'Analytical Chemistry (Lecture & 2 units Lab)', 'Chem 2', 3, 2, '1st', '2nd'),
(72, 845683, 'Thermodynamics (Lec & Lab)', 'Phys 2', 3, 1, '1st', '2nd'),
(73, 845683, 'Physical Activities Towards Health & Fitness 3 (Aquatic)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(74, 845683, 'Living in the IT Era', 'GE Elec 2', 3, 0, '2nd', '2nd'),
(75, 845683, 'Reading Visual Arts', 'GE Elec 3', 3, 0, '2nd', '2nd'),
(76, 845683, 'The Teacher & the Community, School Culture & Organizational Leadership', 'Ed 6', 3, 0, '2nd', '2nd'),
(77, 845683, 'Anatomy & Physiology (Lec & Lab)', 'Bio', 3, 1, '2nd', '2nd'),
(78, 845683, 'The Teaching of Science', 'TS 1', 3, 0, '2nd', '2nd'),
(79, 845683, 'Environmental Science', 'EES 1', 3, 0, '2nd', '2nd'),
(80, 845683, 'Organic Chemistry (Lec & 2 units Lab)', 'Chem 3', 3, 2, '2nd', '2nd'),
(81, 845683, 'Electricity & Magnetism (Lec & Lab)', 'Phys 3', 3, 1, '2nd', '2nd'),
(82, 845683, 'Physical Activity Towards Health & Fitness 4 (Outdoor & Adventure)', 'PATH FIT 4', 2, 0, '2nd', '2nd'),
(83, 845683, 'Gender & Society', 'GE Elec 1', 3, 0, '1st', '3rd'),
(84, 845683, 'The Teacher & the School Curriculum', 'Ed 7', 3, 0, '1st', '3rd'),
(85, 845683, 'Assessment of Learning 1', 'Ed 8', 3, 0, '1st', '3rd'),
(86, 845683, 'Cell & Molecular Biology (Lec & Lab)', 'Bio 2', 3, 1, '1st', '3rd'),
(87, 845683, 'Earth Science', 'EES 2', 3, 0, '1st', '3rd'),
(88, 845683, 'Meteorology', 'EES 3', 3, 0, '1st', '3rd'),
(89, 845683, 'Waves & Optics (Lec & Lab)', 'Phys 4', 3, 1, '1st', '3rd'),
(90, 845683, 'Biochemistry', 'Chem 4', 3, 0, '1st', '3rd'),
(91, 845683, 'Philippine Indigenous Communities', 'GE Elec 4', 3, 0, '1st', '3rd'),
(92, 845683, 'Art Appreciation', 'GEA', 3, 0, '2nd', '3rd'),
(93, 845683, 'Assessment of Learning 2', 'Ed 9', 3, 0, '2nd', '3rd'),
(94, 845683, 'Technology for Teaching & Learning 2 (Instrumentation & Technology in Mathematics)', 'TTL 2', 3, 0, '2nd', '3rd'),
(95, 845683, 'Microbiology & Parasitology (Lec & Lab)', 'Bio 3', 3, 1, '2nd', '3rd'),
(96, 845683, 'Astronomy', 'EES 4', 3, 0, '2nd', '3rd'),
(97, 845683, 'Modern Physics', 'Phys', 3, 0, '2nd', '3rd'),
(98, 845683, 'Research in Teaching', 'Res', 3, 0, '2nd', '3rd'),
(99, 845683, 'Field Study 1 (Observation of Teaching & Learning in Actual School Environment)', 'FS 1', 3, 0, '1st', '4th'),
(100, 845683, 'Field Study 2 (Participation)', 'FS 2', 3, 0, '1st', '4th'),
(101, 845683, 'Licensure Examination Enhancement', 'LEE', 3, 0, '1st', '4th'),
(102, 845683, 'Teaching Internship', 'Practice Teaching', 6, 0, '2nd', '4th'),
(103, 651730, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(104, 651730, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(105, 651730, 'Purposive Communication', 'GEP', 3, 0, '1st', '1st'),
(106, 651730, 'Ethics', 'GEE', 3, 0, '1st', '1st'),
(107, 651730, 'Technology for Teaching & Learning 1', 'TTL 1', 3, 0, '1st', '1st'),
(108, 651730, 'The Child & Adolescent Learners & Learning Principle', 'Ed 1', 3, 0, '1st', '1st'),
(109, 651730, 'History of Mathematics', 'M 100', 3, 0, '1st', '1st'),
(110, 651730, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(111, 651730, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(112, 651730, 'National Service Training Program 1', 'NSTP', 3, 0, '1st', '1st'),
(113, 651730, 'Reading in Philippines History (with Peace Education)', 'GER', 3, 0, '2nd', '1st'),
(114, 651730, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '1st'),
(115, 651730, 'Understanding the Self', 'GEU', 3, 0, '2nd', '1st'),
(116, 651730, 'The Teaching Profession (with Cursive Writing)', 'Ed 2', 3, 0, '2nd', '1st'),
(117, 651730, 'Foundation of Special & Inclusive Education', 'Ed 3', 3, 0, '2nd', '1st'),
(118, 651730, 'College and Advanced Algebra', 'M 101', 3, 0, '2nd', '1st'),
(119, 651730, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATH FIT 2', 2, 0, '2nd', '1st'),
(120, 651730, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(121, 651730, 'Life, Work & Writings of Rizal', 'GER', 3, 0, '1st', '2nd'),
(122, 651730, 'Facilitating Learner-Centered Teaching', 'Ed 4', 3, 0, '1st', '2nd'),
(123, 651730, 'Building & Enhancing New Literacies Across the Curriculum', 'Ed 5', 3, 0, '1st', '2nd'),
(124, 651730, 'Trigonometry', 'M 102', 3, 0, '1st', '2nd'),
(125, 651730, 'Plane & Solid Geometry', 'M 103', 3, 0, '1st', '2nd'),
(126, 651730, 'Logic and Set Theory', 'M 104', 3, 0, '1st', '2nd'),
(127, 651730, 'Mathematics of Investment', 'M 110', 3, 0, '1st', '2nd'),
(128, 651730, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(129, 651730, 'Living in the IT Era', 'GE Elec 2', 3, 0, '2nd', '2nd'),
(130, 651730, 'Reading Visual Arts', 'GE Elec 3', 3, 0, '2nd', '2nd'),
(131, 651730, 'The Teacher and the Community, School Culture & Organizational Leadership', 'Ed 6', 3, 0, '2nd', '2nd'),
(132, 651730, 'Elementary Statistics & Probability', 'M 105', 3, 0, '2nd', '2nd'),
(133, 651730, 'Calculus 1 with Analytical Geometry', 'M 106', 3, 0, '2nd', '2nd'),
(134, 651730, 'Modern Geometry', 'M 109', 3, 0, '2nd', '2nd'),
(135, 651730, 'Number Theory', 'M 111', 3, 0, '2nd', '2nd'),
(136, 651730, 'Physical Activities Towards Health & Fitness 4 (Sports)', 'PATH FIT 4', 2, 0, '2nd', '2nd'),
(137, 651730, 'Gender & Society', 'GE Elec 1', 3, 0, '1st', '3rd'),
(138, 651730, 'The Teacher and the School Curriculum', 'Ed 7', 3, 0, '1st', '3rd'),
(139, 651730, 'Assessment of Learning 1', 'Ed 8', 3, 0, '1st', '3rd'),
(140, 651730, 'Calculus 2', 'M 107', 4, 0, '1st', '3rd'),
(141, 651730, 'Advanced Statistics', 'M 113', 3, 0, '1st', '3rd'),
(142, 651730, 'Linear Algebra', 'M 112', 3, 0, '1st', '3rd'),
(143, 651730, 'Problem Solving, Mathematical Investigation & Modeling', 'M 115', 3, 0, '1st', '3rd'),
(144, 651730, 'Principles & Strategies in Teaching Mathematics', 'M 116', 3, 0, '1st', '3rd'),
(145, 651730, 'Art Appreciation', 'GE A', 3, 0, '2nd', '3rd'),
(146, 651730, 'Assessment of Learning 2', 'Ed 9', 3, 0, '2nd', '3rd'),
(147, 651730, 'Calculus 3', 'M 108', 3, 0, '2nd', '3rd'),
(148, 651730, 'Abstract Algebra', 'M 114', 3, 0, '2nd', '3rd'),
(149, 651730, 'Technology for Teaching & Learning 2', 'M 117', 3, 0, '2nd', '3rd'),
(150, 651730, 'Research in Mathematics', 'M 118', 4, 0, '2nd', '3rd'),
(151, 651730, 'Assessment & Evaluation in Mathematics', 'M 119', 3, 0, '2nd', '3rd'),
(152, 651730, 'Field Study 1 (Observation of Teaching & Learning in Actual School Environment)', 'FS 1', 3, 0, '1st', '4th'),
(153, 651730, 'Field Study 2 (Participation)', 'FS 2', 3, 0, '1st', '4th'),
(154, 651730, 'Licensure Examination Enhancement', 'LEE', 3, 0, '1st', '4th'),
(155, 651730, 'Practice Teaching (Teaching Internship)', 'Practice Teaching', 6, 0, '2nd', '4th'),
(156, 976319587, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(157, 976319587, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(158, 976319587, 'Purposive Communication', 'GEP', 3, 0, '1st', '1st'),
(159, 976319587, 'Ethics', 'GEE', 3, 0, '1st', '1st'),
(160, 976319587, 'Technology for Teaching & Learning 1', 'TTL 1', 3, 0, '1st', '1st'),
(161, 976319587, 'The Child & Adolescent Learners & Learning Principle', 'Ed 1', 3, 0, '1st', '1st'),
(162, 976319587, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(163, 976319587, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(164, 976319587, 'National Service Training Program 1', 'NTSP 1', 3, 0, '1st', '1st'),
(165, 976319587, 'Art Appreciation', 'GEA', 3, 0, '2nd', '1st'),
(166, 976319587, 'Reading in Philippines History (with Peace Education)', 'GER', 3, 0, '2nd', '1st'),
(167, 976319587, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '1st'),
(168, 976319587, 'Understanding the Self', 'GEU', 3, 0, '2nd', '1st'),
(169, 976319587, 'The Teaching Profession (with Cursive Writing)', 'Ed 2', 3, 0, '2nd', '1st'),
(170, 976319587, 'Foundation of Special & Inclusive Education', 'Ed 3', 3, 0, '2nd', '1st'),
(171, 976319587, 'Child Development', 'ECE 1', 3, 0, '2nd', '1st'),
(172, 976319587, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATH FIT 2', 2, 0, '2nd', '1st'),
(173, 976319587, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(174, 976319587, 'Gender & Society', 'GE Elec 1', 3, 0, '1st', '2nd'),
(175, 976319587, 'Life, Work & Writing of Rizal', 'GER', 3, 0, '1st', '2nd'),
(176, 976319587, 'Facilitating Learners-Centered Teaching', 'Ed 4', 3, 0, '1st', '2nd'),
(177, 976319587, 'Building & Enhancing New Literacies Across the Curriculum', 'Ed 5', 3, 0, '1st', '2nd'),
(178, 976319587, 'Foundation of Early Childhood Education', 'ECE 3', 3, 0, '1st', '2nd'),
(179, 976319587, 'Play & Development Appropriate Practices in Early Childhood Education', 'ECE 4', 3, 0, '1st', '2nd'),
(180, 976319587, 'Utilization of Instructional Technology 1 in Early Childhood Education', 'ECE 12', 3, 0, '1st', '2nd'),
(181, 976319587, 'Content & Pedagogy in the Mother Tongue-Based Multilingual Education (MTB-MLE)', 'ECE 21', 3, 0, '1st', '2nd'),
(182, 976319587, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(183, 976319587, 'Living in the IT Era', 'GE Elec 2', 3, 0, '2nd', '2nd'),
(184, 976319587, 'Reading Visual Arts', 'GE Elec 3', 3, 0, '2nd', '2nd'),
(185, 976319587, 'The Teacher and the Community, School Culture & Organizational Leadership', 'Ed 6', 3, 0, '2nd', '2nd'),
(186, 976319587, 'Creative Arts, Music & Movement in Early Childhood Education', 'ECE 5', 3, 0, '2nd', '2nd'),
(187, 976319587, 'Inclusive Education in Early Childhood Setting', 'ECE 7', 3, 0, '2nd', '2nd'),
(188, 976319587, 'Children\'s Literature', 'ECE 8', 3, 0, '2nd', '2nd'),
(189, 976319587, 'Early Childhood Education Curriculum Models', 'ECE 14', 3, 0, '2nd', '2nd'),
(190, 976319587, 'Literacy Development', 'ECE 10', 3, 0, '2nd', '2nd'),
(191, 976319587, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATH FIT 4', 2, 0, '2nd', '2nd'),
(192, 976319587, 'The Teacher and the School Curriculum', 'Ed 7', 3, 0, '1st', '3rd'),
(193, 976319587, 'Assessment of Learning 1', 'Ed 8', 3, 0, '1st', '3rd'),
(194, 976319587, 'Health, Nutrition & Safety', 'ECE 2', 3, 0, '1st', '3rd'),
(195, 976319587, 'Numeracy Development', 'ECE 6', 3, 0, '1st', '3rd'),
(196, 976319587, 'Assessment of Children\'s Development & Learning', 'ECE 9', 3, 0, '1st', '3rd'),
(197, 976319587, 'Social Studies in Early Childhood Education', 'ECE 11', 3, 0, '1st', '3rd'),
(198, 976319587, 'Science in Early Childhood Education', 'ECE 13', 3, 0, '1st', '3rd'),
(199, 976319587, 'Human Reproduction', 'GE Elec 4', 3, 0, '1st', '3rd'),
(200, 976319587, 'Teaching Multi-Grade Classes', 'Special Topic', 3, 0, '2nd', '3rd'),
(201, 976319587, 'Assessment of Learning 2', 'Ed 9', 3, 0, '2nd', '3rd'),
(202, 976319587, 'Guiding Children\'s Behavior & Moral Development', 'ECE 15', 3, 0, '2nd', '3rd'),
(203, 976319587, 'Internship (On-the-Job Training)', 'OJT', 3, 0, '2nd', '3rd'),
(204, 976319587, 'Introduction to Research', 'Ed 10', 3, 0, '2nd', '3rd'),
(205, 976319587, 'Action Research in Education', 'Ed 11', 3, 0, '1st', '4th'),
(206, 976319587, 'Practicum (Specialization)', 'Prac 1', 3, 0, '1st', '4th'),
(207, 976319587, 'Specialization Course', 'Specialization', 3, 0, '2nd', '4th'),
(208, 258895, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(209, 258895, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(210, 258895, 'Purposive Communication', 'GEP', 3, 0, '1st', '1st'),
(211, 258895, 'Ethics', 'GEE', 3, 0, '1st', '1st'),
(212, 258895, 'Technology for Teaching and Learning 1', 'TTL 1', 3, 0, '1st', '1st'),
(213, 258895, 'The Child & Adolescent Learners & Learning Principle', 'Ed 1', 3, 0, '1st', '1st'),
(214, 258895, 'Introduction to Linguistics', 'EL 100', 3, 0, '1st', '1st'),
(215, 258895, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(216, 258895, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATHFIT 1', 2, 0, '1st', '1st'),
(217, 258895, 'National Service Training Program 1', 'NTSP 1', 3, 0, '1st', '1st'),
(218, 258895, 'Art Appreciation', 'GEA', 3, 0, '2nd', '1st'),
(219, 258895, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '1st'),
(220, 258895, 'Understanding the Self', 'GEU', 3, 0, '2nd', '1st'),
(221, 258895, 'The Teaching Profession (with Cursive Writing)', 'Ed 2', 3, 0, '2nd', '1st'),
(222, 258895, 'Foundation of Special & Inclusive Education', 'Ed 3', 3, 0, '2nd', '1st'),
(223, 258895, 'Language, Culture & Society', 'EL 101', 3, 0, '2nd', '1st'),
(224, 258895, 'Structure of English', 'EL 102', 3, 0, '2nd', '1st'),
(225, 258895, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATH FIT 2', 2, 0, '2nd', '1st'),
(226, 258895, 'National Service Training Program 2', 'NTSP 2', 3, 0, '2nd', '1st'),
(227, 258895, 'Gender & Society', 'GE Elec 1', 3, 0, '1st', '2nd'),
(228, 258895, 'Life, Work & Writing of Rizal', 'GER', 3, 0, '1st', '2nd'),
(229, 258895, 'Facilitating Learners-Centered Teaching', 'Ed 4', 3, 0, '1st', '2nd'),
(230, 258895, 'Building & Enhancing New Literacies Across the Curriculum', 'Ed 5', 3, 0, '1st', '2nd'),
(231, 258895, 'Principles & Theories of Language Acquisition and Learning', 'EL 103', 3, 0, '1st', '2nd'),
(232, 258895, 'Teaching & Assessment of the Macroskills', 'EL 107', 3, 0, '1st', '2nd'),
(233, 258895, 'Teaching & Assessment of Grammar', 'EL 108', 3, 0, '1st', '2nd'),
(234, 258895, 'Speech & Theater Arts', 'EL 109', 3, 0, '1st', '2nd'),
(235, 258895, 'Mythology & Folklore', 'EL 112', 3, 0, '1st', '2nd'),
(236, 258895, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(237, 258895, 'Living in the IT Era', 'GE Elec 2', 3, 0, '2nd', '2nd'),
(238, 258895, 'Reading Visual Arts', 'GE Elec 3', 3, 0, '2nd', '2nd'),
(239, 258895, 'The Teacher and the Community, School Culture & Organizational Leadership', 'Ed 6', 3, 0, '2nd', '2nd'),
(240, 258895, 'Language Program & Policies in Multilingual Societies', 'EL 104', 3, 0, '2nd', '2nd'),
(241, 258895, 'Language Learning Materials Development', 'EL 105', 3, 0, '2nd', '2nd'),
(242, 258895, 'Language Education Research', 'EL 110', 3, 0, '2nd', '2nd'),
(243, 258895, 'Children & Adolescent Literature', 'EL 111', 3, 0, '2nd', '2nd'),
(244, 258895, 'Technical Writing', 'EL 118', 3, 0, '2nd', '2nd'),
(245, 258895, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATH FIT 4', 2, 0, '2nd', '2nd'),
(246, 258895, 'The Teacher and the School Curriculum', 'Ed 7', 3, 0, '1st', '3rd'),
(247, 258895, 'Assessment of Learning 1', 'Ed 8', 3, 0, '1st', '3rd'),
(248, 258895, 'Survey of Philippine Literature in English', 'EL 113', 3, 0, '1st', '3rd'),
(249, 258895, 'Survey of Afro Asian Literature', 'EL 114', 3, 0, '1st', '3rd'),
(250, 258895, 'Survey of English & American Literature', 'EL 115', 3, 0, '1st', '3rd'),
(251, 258895, 'Contemporary, Popular & Emergent Literature', 'EL 116', 3, 0, '1st', '3rd'),
(252, 258895, 'TTL 2; Technology in Language Education', 'EL 120', 3, 0, '1st', '3rd'),
(253, 258895, 'Human Reproductions', 'GE Elec 4', 3, 0, '1st', '3rd'),
(254, 258895, 'Reading in Philippine History (with Peace Education)', 'GER', 3, 0, '2nd', '3rd'),
(255, 258895, 'Assessment of Learning 2', 'Ed 9', 3, 0, '2nd', '3rd'),
(256, 258895, 'Creative Writing', 'Elec 1', 3, 0, '2nd', '3rd'),
(257, 258895, 'English for Specific Purposes', 'Elec 2', 3, 0, '2nd', '3rd'),
(258, 258895, 'Principles and Techniques of Teaching Literature', 'EL 119', 3, 0, '2nd', '3rd'),
(259, 258895, 'Action Research in Education', 'AR', 3, 0, '2nd', '3rd'),
(260, 258895, 'Child Development and Learning', 'Child Dev', 3, 0, '1st', '4th'),
(261, 258895, 'Management & Development of Child Care Services', 'Child Care', 3, 0, '1st', '4th'),
(262, 258895, 'Curriculum Development in Pre-School Education', 'Curriculum', 3, 0, '1st', '4th'),
(263, 258895, 'Foundation of Early Childhood Education', 'Early Childhood', 3, 0, '1st', '4th'),
(264, 258895, 'Education Policy & Reforms', 'Policy Reform', 3, 0, '1st', '4th'),
(265, 258895, 'School Leadership and Management', 'Leadership', 3, 0, '2nd', '4th'),
(266, 258895, 'Curriculum Design & Program Evaluation', 'Curriculum Evaluation', 3, 0, '2nd', '4th'),
(267, 258895, 'Practicum: Field-Based Experience', 'Practicum', 3, 0, '2nd', '4th'),
(268, 976319588, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(269, 976319588, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(270, 976319588, 'Purposive Communication', 'GEP', 3, 0, '1st', '1st'),
(271, 976319588, 'Ethics', 'GEE', 3, 0, '1st', '1st'),
(272, 976319588, 'Technology For Teaching & Learning 1', 'TTL 1', 3, 0, '1st', '1st'),
(273, 976319588, 'The Child & Adolescent Learners & Learning Principle', 'Ed 1', 3, 0, '1st', '1st'),
(274, 976319588, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(275, 976319588, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(276, 976319588, 'National Service Training Program 1', 'NTSP1', 3, 0, '1st', '1st'),
(277, 976319588, 'Art Appreciation', 'GEA', 3, 0, '2nd', '1st'),
(278, 976319588, 'Reading in Philippine History', 'GER', 3, 0, '2nd', '1st'),
(279, 976319588, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '1st'),
(280, 976319588, 'Understanding the Self', 'GEU', 3, 0, '2nd', '1st'),
(281, 976319588, 'The Teaching Profession (with Cursive Writing)', 'Ed 2', 3, 0, '2nd', '1st'),
(282, 976319588, 'Foundation of Special & Inclusive Education', 'Ed 3', 3, 0, '2nd', '1st'),
(283, 976319588, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATHFIT 2', 2, 0, '2nd', '1st'),
(284, 976319588, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(285, 976319588, 'Gender & Society', 'GE Elec 1', 3, 0, '1st', '2nd'),
(286, 976319588, 'Life, Work & Writing of Rizal', 'GER', 3, 0, '1st', '2nd'),
(287, 976319588, 'Facilitating Learners-Centered Teaching', 'Ed 4', 3, 0, '1st', '2nd'),
(288, 976319588, 'Building & Enhancing New Literacies Across the Curriculum', 'Ed 5', 3, 0, '1st', '2nd'),
(289, 976319588, 'Teaching Science in Elementary Grades', 'SCI 1', 3, 0, '1st', '2nd'),
(290, 976319588, 'Teaching Math in the Primary Grades', 'Math 1', 3, 0, '1st', '2nd'),
(291, 976319588, 'Teaching Science in Elementary Grades', 'SSC 1', 3, 0, '1st', '2nd'),
(292, 976319588, 'Teaching Social Studies in Elementary 1', 'Fil 1', 3, 0, '1st', '2nd'),
(293, 976319588, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(294, 976319588, 'Living in the IT Era', 'GE Elec 2', 3, 0, '2nd', '2nd'),
(295, 976319588, 'Reading Visual Arts', 'GE Elec 3', 3, 0, '2nd', '2nd'),
(296, 976319588, 'Teaching English in the Elementary Grades', 'Eng 1', 3, 0, '2nd', '2nd'),
(297, 976319588, 'Edukasyong Pantahanan at Pangkabuhayan', 'TLE 1', 3, 0, '2nd', '2nd'),
(298, 976319588, 'Teaching Math in the Intermediate Grades', 'Math 2', 3, 0, '2nd', '2nd'),
(299, 976319588, 'Teaching Social Studies in Elementary Grades', 'SSC 2', 3, 0, '2nd', '2nd'),
(300, 976319588, 'Content & Pedagogy for the Mother Tongue', 'MTB -MLE', 3, 0, '2nd', '2nd'),
(301, 976319588, 'The Teacher and the Community, School Culture & Organizational Leadership', 'Ed 6', 3, 0, '2nd', '2nd'),
(302, 976319588, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATHFIT 4', 2, 0, '2nd', '2nd'),
(303, 976319588, 'The Teacher and the School Curriculum', 'Ed 7', 3, 0, '1st', '3rd'),
(304, 976319588, 'Assessment of Learning 1', 'Ed 8', 3, 0, '1st', '3rd'),
(305, 976319588, 'Teaching Science in Elementary Grades', 'SC 2', 3, 0, '1st', '3rd'),
(306, 976319588, 'Technology for Teaching & Learning in the Elementary Grades', 'TTL 2', 3, 0, '1st', '3rd'),
(307, 976319588, 'Teaching English in the Elementary Grades through Literature', 'Eng 2', 3, 0, '1st', '3rd'),
(308, 976319588, 'Teaching Music in the Elementary Grades', 'Music', 3, 0, '1st', '3rd'),
(309, 976319588, 'Teaching Arts in the Elementary Grades', 'Arts', 3, 0, '1st', '3rd'),
(310, 976319588, 'Good Manners & Right Conduct', 'VED', 3, 0, '1st', '3rd'),
(311, 976319588, 'Assessment of Learning 2', 'Ed 9', 3, 0, '2nd', '3rd'),
(312, 976319588, 'Teaching PE & Health in the Elementary Grades', 'PEH', 3, 0, '2nd', '3rd'),
(313, 976319588, 'Research in Education', 'RES', 3, 0, '2nd', '3rd'),
(314, 976319588, 'Pagtuturo ng Filipino sa Elementarya (II)', 'Fil 3', 3, 0, '2nd', '3rd'),
(315, 976319588, 'Edukasyon Pantahanan at Pangkabuhayan with Entrepreneurship', 'TLE 2', 3, 0, '2nd', '3rd'),
(316, 976319588, 'Teaching Music and Arts in the Elementary Grades', 'Music Arts', 3, 0, '2nd', '3rd'),
(317, 976319588, 'Physical Education 1', 'PE1', 2, 0, '2nd', '3rd'),
(318, 976319588, 'Curriculum Development & Teaching Strategies', 'ED 10', 3, 0, '1st', '4th'),
(319, 976319588, 'Teaching Strategies for the K-12 Curriculum', 'STRAT', 3, 0, '1st', '4th'),
(320, 976319588, 'Research in Education (with Curriculum Design)', 'RES 2', 3, 0, '1st', '4th'),
(321, 976319588, 'Field Study 1: Observation of Classroom & School Environment', 'FS 1', 3, 0, '1st', '4th'),
(322, 976319588, 'Physical Education 2', 'PE2', 2, 0, '1st', '4th'),
(323, 976319588, 'Practicum: Student Teaching in the K-12 Curriculum', 'PRAC 2', 6, 0, '2nd', '4th'),
(324, 976319588, 'Teaching PE & Health in the Senior High School', 'PEH SHS', 3, 0, '2nd', '4th'),
(325, 976319588, 'Research Paper in Education', 'RES 3', 3, 0, '2nd', '4th'),
(326, 976319589, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(327, 976319589, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(328, 976319589, 'Purposive Communication', 'GEP', 3, 0, '1st', '1st'),
(329, 976319589, 'Ethics', 'GEE', 3, 0, '1st', '1st'),
(330, 976319589, 'Technology For Teaching & Learning 1', 'TTL 1', 3, 0, '1st', '1st'),
(331, 976319589, 'The Child & Adolescent Learners & Learning Principle', 'Ed 1', 3, 0, '1st', '1st'),
(332, 976319589, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(333, 976319589, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(334, 976319589, 'National Service Training Program 1', 'NTSP1', 3, 0, '1st', '1st'),
(335, 976319589, 'Art Appreciation', 'GEA', 3, 0, '2nd', '1st'),
(336, 976319589, 'Reading in Philippines History', 'GER', 3, 0, '2nd', '1st'),
(337, 976319589, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '1st'),
(338, 976319589, 'Understanding the Self', 'GEU', 3, 0, '2nd', '1st'),
(339, 976319589, 'The Teaching Profession (with Cursive Writing)', 'Ed2', 3, 0, '2nd', '1st'),
(340, 976319589, 'Foundation of Special & Inclusive Education', 'Ed3', 3, 0, '2nd', '1st'),
(341, 976319589, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATHFIT 2', 2, 0, '2nd', '1st'),
(342, 976319589, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(343, 976319589, 'Gender & Society', 'GE Elec 1', 3, 0, '1st', '2nd'),
(344, 976319589, 'Life, Work & Writing of Rizal', 'GER', 3, 0, '1st', '2nd'),
(345, 976319589, 'Facilitating Learners-Centered Teaching', 'Ed 4', 3, 0, '1st', '2nd'),
(346, 976319589, 'Building & Enhancing New Literacies Across the Curriculum', 'Ed 5', 3, 0, '1st', '2nd'),
(347, 976319589, 'Learners with Developmental Disabilities', 'SNEd 2', 3, 0, '1st', '2nd'),
(348, 976319589, 'Learners with Sensory & Physical Disabilities', 'SNEd 3', 3, 0, '1st', '2nd'),
(349, 976319589, 'Learners with Emotional, Behavioral, Language & Communication Disabilities', 'SNEd 4', 3, 0, '1st', '2nd'),
(350, 976319589, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(351, 976319589, 'Living in the IT Era', 'GE Elec 2', 3, 0, '2nd', '2nd'),
(352, 976319589, 'Reading Visual Arts', 'GE Elec 3', 3, 0, '2nd', '2nd'),
(353, 976319589, 'Gifted & Talented Learners', 'SNEd 5', 3, 0, '2nd', '2nd'),
(354, 976319589, 'Curriculum & Pedagogy in Inclusive Education', 'SNEd 6', 3, 0, '2nd', '2nd'),
(355, 976319589, 'Teaching Math in the Intermediate Grades', 'SNEd 7', 3, 0, '2nd', '2nd'),
(356, 976319589, 'The Teacher and the Community, School Culture & Organizational Leadership', 'Ed 6', 3, 0, '2nd', '2nd'),
(357, 976319589, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATHFIT 4', 2, 0, '2nd', '2nd'),
(358, 976319589, 'The Teacher and the School Curriculum', 'Ed 7', 3, 0, '1st', '3rd'),
(359, 976319589, 'Assessment of Learning 1', 'Ed 8', 3, 0, '1st', '3rd'),
(360, 976319589, 'Behavior Management & Modification', 'SNEd 8', 3, 0, '1st', '3rd'),
(361, 976319589, 'Adapted Physical Education & Recreation, Music & Health', 'SNEd 9', 3, 0, '1st', '3rd'),
(362, 976319589, 'Instructional Adaptations in Language & Literacy Instruction', 'SNEd 10', 3, 0, '1st', '3rd'),
(363, 976319589, 'Early Childhood Inclusive Education', 'SNEd 14', 3, 0, '1st', '3rd'),
(364, 976319589, 'Human Reproduction', 'GE Elec 4', 3, 0, '1st', '3rd'),
(365, 976319589, 'Assessment of Learning 2', 'Ed 9', 3, 0, '2nd', '3rd'),
(366, 976319589, 'Instructional Adaptations in Mathematics & Science Instruction', 'SNEd 11', 3, 0, '2nd', '3rd'),
(367, 976319589, 'Instructional Adaptations for Teaching the Content Area', 'SNEd 12', 3, 0, '2nd', '3rd'),
(368, 976319589, 'Development of Individualized Education Plans', 'SNEd 13', 3, 0, '2nd', '3rd'),
(369, 976319589, 'Transition Education', 'SNEd 15', 3, 0, '2nd', '3rd'),
(370, 976319589, 'Research in Special Needs & Inclusive Education', 'SNEd 16', 3, 0, '2nd', '3rd'),
(371, 976319589, 'Teaching Multi Grades Classes', 'SNEd', 3, 0, '2nd', '3rd'),
(372, 976319589, 'School Management & Leadership', 'Ed 10', 3, 0, '1st', '4th'),
(373, 976319589, 'Field Study 1: Observation of Learning Environment', 'FS 1', 3, 0, '1st', '4th'),
(374, 976319589, 'Field Study 2: Participation in Teaching & Learning Activities', 'FS 2', 3, 0, '1st', '4th'),
(375, 976319589, 'Teaching Reading to Primary & Intermediate Grades', 'Ed 11', 3, 0, '1st', '4th'),
(376, 976319589, 'Research Methods & Statistics', 'Research 1', 3, 0, '1st', '4th'),
(377, 976319589, 'Action Research', 'Research 2', 3, 0, '2nd', '4th'),
(378, 976319589, 'Field Study 3: Assessment of Learning Environment', 'FS 3', 3, 0, '2nd', '4th'),
(379, 976319589, 'Field Study 4: Conducting Action Research', 'FS 4', 3, 0, '2nd', '4th'),
(380, 976319589, 'Preparation for Teaching Practice', 'Prep Teaching', 3, 0, '2nd', '4th'),
(381, 201420, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(382, 201420, 'Purposive Communication', 'GEP', 3, 0, '1st', '1st'),
(383, 201420, 'The Contemporary World', 'GET', 3, 0, '1st', '1st'),
(384, 201420, 'Human Reproduction', 'EC 1', 3, 0, '1st', '1st'),
(385, 201420, 'Ethics', 'GEE', 3, 0, '1st', '1st'),
(386, 201420, 'Life, Work & Writing of Rizal', 'MC', 3, 0, '1st', '1st'),
(387, 201420, 'Introduction to Criminology', 'Criminology', 3, 0, '1st', '1st'),
(388, 201420, 'Physical Activities Towards Health & Fitness 1', 'PATH FIT 1', 1, 1, '1st', '1st'),
(389, 201420, 'National Service Training Program 1', 'NTSP1', 3, 0, '1st', '1st'),
(390, 201420, 'Aptitude Service', 'AS 1', 1, 0, '1st', '1st'),
(391, 201420, 'Understanding the Self', 'GEU', 3, 0, '2nd', '1st'),
(392, 201420, 'Reading in Philippine History', 'GER', 3, 0, '2nd', '1st'),
(393, 201420, 'Mathematics in the Modern World', 'GEM', 3, 0, '2nd', '1st'),
(394, 201420, 'Art Appreciation', 'GEA', 3, 0, '2nd', '1st'),
(395, 201420, 'Introduction to Philippine Criminal Justice System', 'CLJ 1', 3, 0, '2nd', '1st'),
(396, 201420, 'Law Enforcement Organization & Administration', 'LEA 1', 4, 0, '2nd', '1st'),
(397, 201420, 'Physical Activity Towards Health & Fitness 2', 'PATHFIT 2', 1, 1, '2nd', '1st'),
(398, 201420, 'Aptitude Service', 'AS 2', 1, 0, '2nd', '1st'),
(399, 201420, 'National Service Training Program 2', 'NTSP2', 3, 0, '2nd', '1st'),
(400, 201420, 'Genetics', 'GEN', 3, 0, '1st', '2nd'),
(401, 201420, 'Fundamentals of Investigation & Intelligence Operation', 'CDI 1', 4, 0, '1st', '2nd'),
(402, 201420, 'Forensic Photography', 'Forensic 1', 2, 2, '1st', '2nd'),
(403, 201420, 'Comparative Model in Policing', 'LEA 2', 3, 0, '1st', '2nd'),
(404, 201420, 'Criminal Law (Book 1)', 'CLJ 3', 3, 0, '1st', '2nd'),
(405, 201420, 'Comparative Model in Policing', 'Criminolog 2', 3, 0, '1st', '2nd'),
(406, 201420, 'Character Formation, Nationalism & Patriotism', 'CFLM-1', 3, 0, '1st', '2nd'),
(407, 201420, 'Physical Activities Towards Health & Fitness 3', 'PATHFIT 3', 1, 1, '1st', '2nd'),
(408, 201420, 'Aptitude Service', 'AS 3', 1, 0, '1st', '2nd'),
(409, 201420, 'General Chemistry', 'AdGE 2', 3, 2, '2nd', '2nd'),
(410, 201420, 'Science, Technology & Society', 'GE STS', 3, 0, '2nd', '2nd'),
(411, 201420, 'Human Behavior & Victimology', 'Criminology 3', 3, 0, '2nd', '2nd'),
(412, 201420, 'Professional Conduct & Ethical Standards', 'Criminology 4', 2, 2, '2nd', '2nd'),
(413, 201420, 'Personal Identification Techniques', 'Forensic 2', 3, 0, '2nd', '2nd'),
(414, 201420, 'Criminal Law (Book 2)', 'CLJ 4', 3, 0, '2nd', '2nd'),
(415, 201420, 'Specialized Crime Investigation 1 with Legal Medicine', 'CDI 2', 3, 0, '2nd', '2nd'),
(416, 201420, 'Physical Activity Towards Health & Fitness 4', 'PATHFIT 4', 1, 1, '2nd', '2nd'),
(417, 201420, 'Introduction to Industrial Security Concepts', 'LEA 3', 3, 0, '2nd', '2nd'),
(418, 201420, 'Aptitude Service', 'AS 4', 1, 0, '2nd', '2nd'),
(419, 201420, 'Forensic Chemistry & Toxicology', 'Forensic 3', 3, 2, '1st', '3rd'),
(420, 201420, 'Questioned Document Examination', 'Forensic 4', 2, 2, '1st', '3rd'),
(421, 201420, 'Law Enforcement Operations & Planning with Crime Mapping', 'LEA 4', 3, 0, '1st', '3rd'),
(422, 201420, 'Specialized Crime Investigation 2 with Simulation on Interrogation Interview', 'CDI 3', 3, 0, '1st', '3rd'),
(423, 201420, 'Traffic Management & Accident Investigation with Driving', 'CDI 4', 3, 1, '1st', '3rd'),
(424, 201420, 'Technical English 1', 'CDI 5', 3, 0, '1st', '3rd'),
(425, 201420, 'Institutional Correction', 'CA 1', 3, 0, '1st', '3rd'),
(426, 201420, 'Aptitude Service', 'AS 5', 1, 0, '1st', '3rd'),
(427, 201420, 'Non-Institutional Corrections', 'CA 2', 3, 0, '2nd', '3rd'),
(428, 201420, 'Therapeutic Modalities', 'CA 3', 3, 0, '2nd', '3rd'),
(429, 201420, 'Lie Detection Techniques', 'Forensic 5', 2, 2, '2nd', '3rd'),
(430, 201420, 'Forensic Ballistics', 'Forensic 6', 3, 1, '2nd', '3rd'),
(431, 201420, 'Criminal Investigation', 'LEA 5', 4, 0, '2nd', '3rd'),
(432, 201420, 'Introduction to Private Security', 'LEA 6', 3, 0, '2nd', '3rd'),
(433, 201420, 'International & Domestic Law', 'GECL', 3, 0, '2nd', '3rd'),
(434, 201420, 'Aptitude Service', 'AS 6', 1, 0, '2nd', '3rd'),
(435, 201420, 'Advance Forensic Science', 'Forensic 7', 3, 2, '1st', '4th'),
(436, 201420, 'Practicum in Criminology', 'LEA 7', 3, 3, '1st', '4th'),
(437, 201420, 'Crime Prevention & Control', 'Crim-Int-Prev', 3, 0, '1st', '4th'),
(438, 201420, 'Victimology', 'Crim 5', 3, 0, '1st', '4th'),
(439, 201420, 'Technical English 2', 'Technical2', 3, 0, '1st', '4th'),
(440, 201420, 'Law Enforcement Leadership', 'Crim 6', 3, 0, '1st', '4th'),
(441, 201420, 'Research in Criminology', 'Crim 7', 3, 0, '1st', '4th'),
(442, 201420, 'Aptitude Service', 'AS 7', 1, 0, '1st', '4th'),
(443, 201420, 'Forensic Science Research', 'Forensic 8', 3, 2, '2nd', '4th'),
(444, 201420, 'Crime Scene Management', 'Crim 8', 3, 0, '2nd', '4th'),
(445, 201420, 'Investigative Techniques', 'Crim 9', 3, 0, '2nd', '4th'),
(446, 201420, 'Criminalistics & Crime Laboratory', 'Crim 10', 3, 2, '2nd', '4th'),
(447, 201420, 'Forensic Accounting', 'Forensic-Accounting', 3, 0, '2nd', '4th'),
(448, 201420, 'Research & Development in Criminology', 'Research 2', 3, 0, '2nd', '4th'),
(449, 201420, 'Thesis in Criminology', 'Thesis 2', 3, 0, '2nd', '4th'),
(450, 201420, 'Aptitude Service', 'AS 8', 1, 0, '2nd', '4th'),
(451, 386306, 'Understanding the Self', 'GEU', 3, 0, '1st', '1st'),
(452, 386306, 'Reading in Philippine History', 'GER', 3, 0, '1st', '1st'),
(453, 386306, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(454, 386306, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(455, 386306, 'Tourism & Hospitality 1 (Marco Perspective of Tourism & Hospitality)', 'THC 1', 3, 0, '1st', '1st'),
(456, 386306, 'Risk Management as Applied to Safety Security & Sanitation', 'THC 2', 3, 0, '1st', '1st'),
(457, 386306, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATHFIT 1', 2, 0, '1st', '1st'),
(458, 386306, 'National Service Training Program 1', 'NSTP', 3, 0, '1st', '1st'),
(459, 386306, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(460, 386306, 'Purposive Communication', 'GEP', 3, 0, '2nd', '1st'),
(461, 386306, 'Gender & Society', 'GAS', 3, 0, '2nd', '1st'),
(462, 386306, 'Philippine Culture, Tourism & Geography', 'THC 3', 3, 0, '2nd', '1st'),
(463, 386306, 'Tourism & Hospitality 2 (Micro Perspective of Tourism & Hospitality)', 'THC 4', 3, 0, '2nd', '1st'),
(464, 386306, 'Kitchen Essentials & Basic Food Preparation with Laboratory', 'HPC 1', 2, 2, '2nd', '1st'),
(465, 386306, 'Living in the IT Era', 'GE ELEC 1', 3, 0, '2nd', '1st'),
(466, 386306, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATHFIT 2', 2, 0, '2nd', '1st'),
(467, 386306, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(468, 386306, 'Art Appreciation', 'GEA', 3, 0, '1st', '2nd'),
(469, 386306, 'Fundamentals in Lodging Operations', 'HPC 2', 3, 0, '1st', '2nd'),
(470, 386306, 'Tourism & Hospitality Service Quality Management', 'THC 5', 2, 1, '1st', '2nd'),
(471, 386306, 'Supply Chain Management in the Hospitality Industry', 'HPC 3', 2, 0, '1st', '2nd'),
(472, 386306, 'Foreign Language 1', 'FL 1', 3, 0, '1st', '2nd'),
(473, 386306, 'Fundamentals in Food Service Operations with Laboratory', 'HPC 4', 3, 0, '1st', '2nd'),
(474, 386306, 'Philippine Regional Cuisine with Laboratory', 'HMPE 1', 2, 2, '1st', '2nd'),
(475, 386306, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH-FIT 3', 2, 0, '1st', '2nd'),
(476, 386306, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '2nd'),
(477, 386306, 'Ethics', 'GEE', 3, 0, '2nd', '2nd'),
(478, 386306, 'Applied Business Tools & Technologies (GDS) with Lab (TPC)', 'HPC 5', 2, 0, '2nd', '2nd'),
(479, 386306, 'Cost Control', 'HMPE 2', 3, 1, '2nd', '2nd'),
(480, 386306, 'Front Office Operation', 'HMPE 3', 3, 0, '2nd', '2nd'),
(481, 386306, 'Operations Management', 'BME 1', 3, 2, '2nd', '2nd'),
(482, 386306, 'Reading the Visual Arts', 'GE ELEC 2', 3, 0, '2nd', '2nd'),
(483, 386306, 'Foreign Language 2', 'FL 2', 3, 0, '2nd', '2nd'),
(484, 386306, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATH-FIT 4', 2, 0, '2nd', '2nd'),
(485, 386306, 'Life & Work of Rizal', 'Rizal', 3, 0, '1st', '3rd'),
(486, 386306, 'Strategic Management & TQM', 'BME 2', 3, 0, '1st', '3rd'),
(487, 386306, 'Bar & Barista Management', 'HMPE 4', 2, 2, '1st', '3rd'),
(488, 386306, 'Tourism & Hospitality Marketing', 'THC 6', 3, 0, '1st', '3rd'),
(489, 386306, 'Professional Development & Applied Ethics', 'THC 7', 3, 0, '1st', '3rd'),
(490, 386306, 'Ergonomics & Facilities Planning for the Hospitality Industry', 'HPC 6', 3, 0, '1st', '3rd'),
(491, 386306, 'Legal Aspects in Tourism & Hospitality', 'THC 8', 3, 0, '2nd', '3rd'),
(492, 386306, 'Research in Hospitality & Tourism', 'RES 1', 2, 1, '2nd', '3rd'),
(493, 386306, 'Entrepreneurship in Tourism & Hospitality', 'THC 9', 3, 0, '2nd', '3rd'),
(494, 386306, 'Introduction to MICE', 'HPC 7', 2, 1, '2nd', '3rd'),
(495, 386306, 'Asian Cuisine with Laboratory', 'HMPE 6', 2, 2, '2nd', '3rd'),
(496, 386306, 'Bread and Pastry with Laboratory', 'HMPE 7', 2, 2, '2nd', '3rd'),
(497, 386306, 'Cruise Tourism', 'HMPE 8', 3, 0, '2nd', '3rd'),
(498, 386306, 'Managing Events in the Hospitality & Tourism Industry', 'THC 10', 3, 0, '1st', '4th'),
(499, 386306, 'Research in Hospitality & Tourism 2', 'RES 2', 3, 1, '1st', '4th'),
(500, 386306, 'Internship in Hospitality and Tourism', 'INR 1', 2, 4, '1st', '4th'),
(501, 386306, 'Thesis Writing in Tourism & Hospitality', 'THC 11', 3, 0, '2nd', '4th'),
(502, 386306, 'Internship in Hospitality and Tourism 2', 'INR 2', 3, 4, '2nd', '4th'),
(503, 386306, 'Practicum in Tourism & Hospitality', 'PRAC', 3, 0, '2nd', '4th'),
(504, 243370, 'Understanding the Self', 'GEU', 3, 0, '1st', '1st'),
(505, 243370, 'Reading in Philippine History', 'GER', 3, 0, '1st', '1st'),
(506, 243370, 'Mathematics in the Modern World', 'GEM', 3, 0, '1st', '1st'),
(507, 243370, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(508, 243370, 'Tourism & Hospitality 1 (Micro Perspective of Tourism & Hospitality)', 'THC 1', 3, 0, '1st', '1st'),
(509, 243370, 'Risk Management as Applied to Safety, Security & Sanitation', 'THC 2', 3, 0, '1st', '1st'),
(510, 243370, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATHIT-FIT 1', 2, 0, '1st', '1st'),
(511, 243370, 'National Service Training Program 1', 'NSTP 1', 3, 0, '1st', '1st'),
(512, 243370, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(513, 243370, 'Purposive Communication', 'GEP', 3, 0, '2nd', '1st'),
(514, 243370, 'Gender & Society', 'GAS', 3, 0, '2nd', '1st'),
(515, 243370, 'Kitchen Essential & Basic Food Preparation with Laboratory', 'HPC 1', 2, 2, '2nd', '1st'),
(516, 243370, 'Philippine Culture, Tourism & Geography', 'THC 3', 3, 0, '2nd', '1st'),
(517, 243370, 'Tourism & Hospitality 2 (Micro Perspective of Tourism & Hospitality)', 'THC 4', 3, 0, '2nd', '1st'),
(518, 243370, 'Living in the IT Era', 'GE ELEC 1', 3, 0, '2nd', '1st'),
(519, 243370, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATH FIT 2', 2, 0, '2nd', '1st'),
(520, 243370, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(521, 243370, 'Organization & Management', 'OM', 3, 0, '2nd', '1st'),
(522, 243370, 'Art Appreciation', '', 3, 0, '1st', '2nd'),
(523, 243370, 'Tourism & Hospitality Service Quality Management', '', 3, 0, '1st', '2nd'),
(524, 243370, 'Tour & Travel Management', '', 2, 1, '1st', '2nd'),
(525, 243370, 'Accommodation Operation & Management', '', 3, 0, '1st', '2nd'),
(526, 243370, 'Foreign Language 1', '', 3, 0, '1st', '2nd'),
(527, 243370, 'Global Culture, Tourism Geography', '', 3, 0, '1st', '2nd'),
(528, 243370, 'Specialized Food & Beverage Services', '', 2, 2, '1st', '2nd'),
(529, 243370, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', '', 2, 0, '1st', '2nd'),
(530, 243370, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '2nd'),
(531, 243370, 'Applied Basic Tools & Technologies (GDS) with Laboratory (TPC)', 'TPC 3', 2, 1, '2nd', '2nd'),
(532, 243370, 'Front Office Operation', 'TMFE 3', 2, 2, '2nd', '2nd'),
(533, 243370, 'Philippines Gastronomic Tourism', 'TMFE 4', 2, 1, '2nd', '2nd'),
(534, 243370, 'Tourguiding', 'TMFE 5', 3, 0, '2nd', '2nd'),
(535, 243370, 'Operations Management', 'BME 1', 3, 0, '2nd', '2nd'),
(536, 243370, 'Foreign Language 2', 'FL 2', 3, 0, '2nd', '2nd'),
(537, 243370, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATHFIT 4', 2, 0, '2nd', '2nd'),
(538, 243370, 'Life & Work of Rizal', '', 3, 0, '1st', '3rd'),
(539, 243370, 'Tourism Policy Planning & Development', '', 3, 0, '1st', '3rd'),
(540, 243370, 'Strategic Management & TQM', '', 3, 0, '1st', '3rd'),
(541, 243370, 'Tourism & Hospitality Marketing', '', 3, 0, '1st', '3rd'),
(542, 243370, 'Professional Development & Applied Ethics', '', 3, 0, '1st', '3rd'),
(543, 243370, 'Tourism Product Development', '', 3, 0, '1st', '3rd'),
(544, 243370, 'Transportation Management (Courses, Air, Land & Sea)', '', 3, 0, '1st', '3rd'),
(545, 243370, 'Reading the Visual Arts', '', 3, 0, '1st', '3rd'),
(546, 243370, 'Legal Aspects in Tourism & Hospitality', 'THC 8', 3, 0, '2nd', '3rd'),
(547, 243370, 'Research in Tourism 1', 'RES 1', 2, 1, '2nd', '3rd'),
(548, 243370, 'Entrepreneurship in Tourism & Hospitality', 'THC 9', 3, 0, '2nd', '3rd'),
(549, 243370, 'Intro to Meeting, Incentives, Conferences & Events Management', 'TPC 6', 2, 1, '2nd', '3rd'),
(550, 243370, 'Cruise Tourism', 'TMFE 7', 3, 0, '2nd', '3rd'),
(551, 243370, 'Ecotourism Management', 'TMFE 8', 3, 0, '2nd', '3rd'),
(552, 243370, 'Medical & Wellness Tourism', 'TMFE 9', 3, 0, '2nd', '3rd'),
(553, 243370, 'Tourism Research 2', 'RES 2', 2, 1, '1st', '4th'),
(554, 243370, 'Hotel Operations Management', 'TMFE 10', 3, 0, '1st', '4th'),
(555, 243370, 'Tourism Investment & Financing', 'TMFE 11', 3, 0, '1st', '4th'),
(556, 243370, 'Corporate Social Responsibility & Sustainability in Tourism', 'CSR 1', 3, 0, '1st', '4th'),
(557, 243370, 'Public Relations in Tourism & Hospitality', 'PRTH 1', 3, 0, '1st', '4th'),
(558, 243370, 'Tourism Economics', 'TTE', 3, 0, '1st', '4th'),
(559, 243370, 'Crisis Management & Disaster Preparedness in Tourism', 'THC 10', 3, 0, '1st', '4th'),
(560, 243370, 'Field Trip & Seminars', 'FTS 1', 2, 0, '1st', '4th'),
(561, 243370, 'Capstone Project 1', 'CAP 1', 2, 1, '2nd', '4th'),
(562, 243370, 'Internship (Tourism & Hospitality Industry)', 'INT 1', 4, 0, '2nd', '4th'),
(563, 243370, 'Capstone Project 2', 'CAP 2', 3, 0, '2nd', '4th'),
(564, 101437, 'Info. Tech Fund. & Intro to Computing', 'IT 101', 2, 1, '1st', '1st'),
(565, 101437, 'Computer Programming 1', 'IT 102', 2, 1, '1st', '1st'),
(566, 101437, 'Understanding the Self', 'GEU', 3, 0, '1st', '1st'),
(567, 101437, 'Reading in Philippine History', 'GER', 3, 0, '1st', '1st'),
(568, 101437, 'The Contemporary World', 'GEC', 3, 0, '1st', '1st'),
(569, 101437, 'Life & Work of Rizal', 'RIZAL', 3, 0, '1st', '1st'),
(570, 101437, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(571, 101437, 'Physical Activities Towards Health & Fitness 1 (Wellness & Fitness)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(572, 101437, 'National Service Training Program 1', 'NTSP1', 3, 0, '1st', '1st'),
(573, 101437, 'Computer Programming 2', 'IT 103', 2, 1, '2nd', '1st'),
(574, 101437, 'Intro. to Human Computer Interaction', 'ITCI101', 2, 1, '2nd', '1st'),
(575, 101437, 'Mathematics in the Modern World', 'GEM', 3, 0, '2nd', '1st'),
(576, 101437, 'Purposive Communication', 'GEP', 3, 0, '2nd', '1st'),
(577, 101437, 'Art Appreciation', 'GEA', 3, 0, '2nd', '1st'),
(578, 101437, 'Ethics', 'GEE', 3, 0, '2nd', '1st'),
(579, 101437, 'Science, Technology & Society', 'GES', 3, 0, '2nd', '1st'),
(580, 101437, 'Physical Activity Towards Health & Fitness 2 (Combative Sport)', 'PATH FIT 2', 2, 0, '2nd', '1st'),
(581, 101437, 'National Service Training Program 2', 'NTSP2', 3, 0, '2nd', '1st'),
(582, 101437, 'Data Structure & Algorithm', 'CS201', 2, 1, '1st', '2nd'),
(583, 101437, 'Object-Oriented & Event Driven Programming', 'ELEC 1', 2, 1, '1st', '2nd'),
(584, 101437, 'Logic Design & Switching Theory', 'CS206', 2, 1, '1st', '2nd'),
(585, 101437, 'Platform Technologies', 'Free Elec1', 2, 1, '1st', '2nd'),
(586, 101437, 'Web System & Technologies', 'IT104', 2, 1, '1st', '2nd'),
(587, 101437, 'Modern Statistics', 'MS102', 2, 1, '1st', '2nd'),
(588, 101437, 'The Entrepreneurial Mind', 'TEM', 3, 0, '1st', '2nd'),
(589, 101437, 'Quality Standard & Safety', 'QSS', 3, 0, '1st', '2nd'),
(590, 101437, 'Physical Activities Towards Health & Fitness 3 (Aquatic)', 'PATH FIT3', 3, 0, '1st', '2nd'),
(591, 101437, 'Application Development & Emerging', 'CS211', 2, 1, '2nd', '2nd'),
(592, 101437, 'Quantitative Methods', 'MS103', 2, 1, '2nd', '2nd'),
(593, 101437, 'Integrative Programming & Technologies 1', 'Elec 2', 2, 1, '2nd', '2nd'),
(594, 101437, 'Information Management', 'IM101', 2, 1, '2nd', '2nd'),
(595, 101437, 'Human Computer Interaction 2', 'Free Elec 2', 2, 1, '2nd', '2nd'),
(596, 101437, 'Internet of Things', 'IOT', 2, 1, '2nd', '2nd'),
(597, 101437, 'Gender & Society', 'GS', 3, 0, '2nd', '2nd'),
(598, 101437, 'People & the Earth\'s Ecosystem', 'PEEco', 3, 0, '2nd', '2nd'),
(599, 101437, 'Physical Activity Towards Health & Fitness 4 (Outdoor & Adventure)', 'PATH FIT4', 3, 0, '2nd', '2nd'),
(600, 101437, 'Fund. of Database System', 'CS311', 2, 1, '1st', '3rd'),
(601, 101437, 'Network Design & Management', 'Net101', 2, 1, '1st', '3rd'),
(602, 101437, 'System Integration & Architecture 1', 'CS310', 2, 1, '1st', '3rd'),
(603, 101437, 'Trends, Issues, Seminars & Field Trips in IT', 'CS304', 3, 0, '1st', '3rd'),
(604, 101437, 'Integrative Programming & Technologies 2', 'Elec3', 2, 1, '1st', '3rd'),
(605, 101437, 'System Analysis & Design', 'CS303', 2, 1, '1st', '3rd'),
(606, 101437, 'Research & Communication in IT', 'RCIT', 3, 0, '1st', '3rd'),
(607, 101437, 'Network Advanced Security', 'Net102', 2, 1, '2nd', '3rd'),
(608, 101437, 'Advance Database System', 'CS312', 2, 1, '2nd', '3rd'),
(609, 101437, 'Information Assurance & Security 1', 'CS313', 2, 1, '2nd', '3rd'),
(610, 101437, 'System Administration & Maintenance', 'CS314', 3, 0, '2nd', '3rd'),
(611, 101437, 'Web Management System & Security', 'FreeElec3', 2, 1, '2nd', '3rd');
INSERT INTO `academic_subjects` (`subject_id`, `course_id`, `subject_name`, `subject_code`, `lec_units`, `lab_units`, `semester`, `year_level`) VALUES
(612, 101437, 'Social & Professional Issues', 'SocProf', 3, 0, '2nd', '3rd'),
(613, 101437, 'Capstone Project & Research 1', 'Cap101', 2, 2, '2nd', '3rd'),
(614, 101437, 'Research & Development', 'CS402', 2, 1, '1st', '4th'),
(615, 101437, 'Mobile Applications Development', 'MobileApps', 2, 1, '1st', '4th'),
(616, 101437, 'System Integration & Architecture 2', 'CS401', 2, 1, '1st', '4th'),
(617, 101437, 'Data Analytics & Cloud Computing', 'CS401', 2, 1, '1st', '4th'),
(618, 101437, 'Capstone Project & Research 2', 'Cap102', 2, 2, '1st', '4th'),
(619, 101437, 'Practicum', 'IT 400', 2, 1, '2nd', '4th'),
(638, 483500, 'Science, Technology & Society', 'STS 6', 3, 0, '1st', '1st'),
(639, 483500, 'The Contemporary World', 'GE 8', 3, 0, '1st', '1st'),
(640, 483500, 'Ethics', 'GE 7', 3, 0, '1st', '1st'),
(641, 483500, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATHFIT 1', 2, 0, '1st', '1st'),
(642, 483500, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(643, 483500, 'National Service Training Program 1', 'NSTP 1', 3, 0, '1st', '1st'),
(644, 483500, 'Advanced Accounting', 'ACTG 1.2', 6, 0, '1st', '1st'),
(645, 483500, 'Living in IT Era', 'ELEC 1', 3, 0, '1st', '1st'),
(646, 483500, 'Purposive Communication', 'GE 4', 3, 0, '1st', '1st'),
(647, 483500, 'Good Governance & Social Responsibility', 'BACC 1', 3, 0, '2nd', '1st'),
(648, 483500, 'Human Resource Management', 'BACC 2', 3, 0, '2nd', '1st'),
(649, 483500, 'Understanding the Self', 'GE 1', 3, 0, '2nd', '1st'),
(650, 483500, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATHFIT 2', 2, 0, '2nd', '1st'),
(651, 483500, 'Art Appreciation', 'GE 5', 3, 0, '2nd', '1st'),
(652, 483500, 'Reading in Philippine History', 'GE 2', 3, 0, '2nd', '1st'),
(653, 483500, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(654, 483500, 'Mathematics in the Modern World', 'GE 3', 3, 0, '2nd', '1st'),
(655, 483500, 'Gender & Society', 'GE 10', 3, 0, '1st', '2nd'),
(656, 483500, 'Operations Management', 'CBMEC 1', 3, 0, '1st', '2nd'),
(657, 483500, 'Human Reproduction', 'GE 11', 3, 0, '1st', '2nd'),
(658, 483500, 'Basic Micro Economics', 'BACC 3', 3, 0, '1st', '2nd'),
(659, 483500, 'Life & Work of Rizal', 'GE 9', 3, 0, '1st', '2nd'),
(660, 483500, 'Management', 'ELEC 2', 3, 0, '1st', '2nd'),
(661, 483500, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(662, 483500, 'Reading in Visual Arts', 'GE 12', 3, 0, '2nd', '2nd'),
(663, 483500, 'Strategic Management', 'CBMEC 2', 3, 0, '2nd', '2nd'),
(664, 483500, 'Recruitment & Selection', 'HR 1', 3, 0, '2nd', '2nd'),
(665, 483500, 'Marketing Management', 'ELEC 3', 3, 0, '2nd', '2nd'),
(666, 483500, 'Business Law', 'BACC 4', 3, 0, '2nd', '2nd'),
(667, 483500, 'Training & Development', 'HR 2', 3, 0, '2nd', '2nd'),
(668, 483500, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATH FIT 4', 2, 0, '2nd', '2nd'),
(669, 483500, 'Entrepreneurial Management', 'ELEC 4', 3, 0, '2nd', '2nd'),
(670, 483500, 'International Business & Trade', 'BACC 5', 3, 0, '1st', '3rd'),
(671, 483500, 'Labor Law & Legislation', 'HR 3', 3, 0, '1st', '3rd'),
(672, 483500, 'Compensation Administration', 'HR 4', 3, 0, '1st', '3rd'),
(673, 483500, 'Logistics Management', 'ELEC 5', 3, 0, '1st', '3rd'),
(674, 483500, 'Personal Finance', 'ELEC 6', 3, 0, '1st', '3rd'),
(675, 483500, 'Taxation', 'BACC 6', 3, 0, '1st', '3rd'),
(676, 483500, 'Undergraduate Thesis 1', 'BACC 7a', 3, 0, '1st', '3rd'),
(677, 483500, 'Special Topics in Human Resource Management', 'HR 5', 3, 0, '2nd', '3rd'),
(678, 483500, 'Organizational Development', 'HR 6', 3, 0, '2nd', '3rd'),
(679, 483500, 'Managerial Accounting', 'ELEC 7', 3, 0, '2nd', '3rd'),
(680, 483500, 'Global International Trade', 'ELEC 8', 3, 0, '2nd', '3rd'),
(681, 483500, 'Project Management', 'ELEC 9', 3, 0, '2nd', '3rd'),
(682, 483500, 'Labor Relations & Negotiations', 'HR 7', 3, 0, '2nd', '3rd'),
(683, 483500, 'Undergraduate Thesis 2', 'BACC 7b', 3, 0, '2nd', '3rd'),
(684, 483500, 'Administrative & Office Management', 'HR 8', 3, 0, '2nd', '3rd'),
(685, 483500, 'Business Research', 'BACC 8', 3, 0, '1st', '4th'),
(686, 483500, 'Environmental Management System', 'ELEC 10', 3, 0, '1st', '4th'),
(687, 483500, 'E-commerce & Internet Marketing', 'ELEC 11', 3, 0, '1st', '4th'),
(688, 483500, 'Financial Statement Analysis', 'BACC 9', 3, 0, '2nd', '4th'),
(689, 483500, 'Business Simulation & Strategy', 'ELEC 12', 3, 0, '2nd', '4th'),
(690, 736646, 'Science, Technology & Society', 'STS 6', 3, 0, '1st', '1st'),
(691, 736646, 'The Contemporary World', 'GE 8', 3, 0, '1st', '1st'),
(692, 736646, 'Ethics', 'GE 7', 3, 0, '1st', '1st'),
(693, 736646, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(694, 736646, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(695, 736646, 'National Service Training Program 1', 'NSTP 1', 3, 0, '1st', '1st'),
(696, 736646, 'Advanced Accounting', 'ACTG 1.2', 6, 0, '1st', '1st'),
(697, 736646, 'Living in IT Era', 'ELEC 1', 3, 0, '1st', '1st'),
(698, 736646, 'Purposive Communication', 'GE 4', 3, 0, '1st', '1st'),
(699, 736646, 'Good Governance & Social Responsibility', 'BACC 1', 3, 0, '2nd', '1st'),
(700, 736646, 'Human Resource Management', 'BACC 2', 3, 0, '2nd', '1st'),
(701, 736646, 'Understanding the Self', 'GE 1', 3, 0, '2nd', '1st'),
(702, 736646, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATHFIT 2', 2, 0, '2nd', '1st'),
(703, 736646, 'Art Appreciation', 'GE 5', 3, 0, '2nd', '1st'),
(704, 736646, 'Reading in Philippine History', 'GE 2', 3, 0, '2nd', '1st'),
(705, 736646, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(706, 736646, 'Mathematics in the Modern World', 'GE 3', 3, 0, '2nd', '1st'),
(707, 736646, 'Gender & Society', 'GE 10', 3, 0, '1st', '2nd'),
(708, 736646, 'Operations Management', 'CBMEC 1', 3, 0, '1st', '2nd'),
(709, 736646, 'Human Reproduction', 'GE 11', 3, 0, '1st', '2nd'),
(710, 736646, 'Basic Micro Economics', 'BACC 3', 3, 0, '1st', '2nd'),
(711, 736646, 'Life & Work of Rizal', 'GE 9', 3, 0, '1st', '2nd'),
(712, 736646, 'Financial Management', 'FIN 1', 3, 0, '1st', '2nd'),
(713, 736646, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(714, 736646, 'Reading in Visual Arts', 'GE 12', 3, 0, '2nd', '2nd'),
(715, 736646, 'Strategic Management', 'CBMEC 2', 3, 0, '2nd', '2nd'),
(716, 736646, 'Financial Analysis & Reporting', 'FIN 2', 3, 0, '2nd', '2nd'),
(717, 736646, 'Risk Management', 'ELEC 2', 3, 0, '2nd', '2nd'),
(718, 736646, 'Business Law', 'BACC 4', 3, 0, '2nd', '2nd'),
(719, 736646, 'Cooperative Management', 'ELEC 3', 3, 0, '2nd', '2nd'),
(720, 736646, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATH FIT 4', 2, 0, '2nd', '2nd'),
(721, 736646, 'Entrepreneurial Management', 'ELEC 4', 3, 0, '2nd', '2nd'),
(722, 736646, 'International Business & Trade', 'BACC 5', 3, 0, '1st', '3rd'),
(723, 736646, 'Public Finance', 'ELEC 5', 3, 0, '1st', '3rd'),
(724, 736646, 'Monetary Policy & Central Banking', 'FIN 3', 3, 0, '1st', '3rd'),
(725, 736646, 'Investment & Portfolio', 'FIN 4', 3, 0, '1st', '3rd'),
(726, 736646, 'Personal Finance', 'ELEC 6', 3, 0, '1st', '3rd'),
(727, 736646, 'Taxation', 'BACC 6', 3, 0, '1st', '3rd'),
(728, 736646, 'Undergraduate Thesis 1', 'BACC 7a', 3, 0, '1st', '3rd'),
(729, 736646, 'Banking & Financial Institutions', 'FIN 5', 3, 0, '2nd', '3rd'),
(730, 736646, 'Special Topic in Financial Management', 'FIN 6', 3, 0, '2nd', '3rd'),
(731, 736646, 'Managerial Accounting', 'ELEC 7', 3, 0, '2nd', '3rd'),
(732, 736646, 'Global International Trade', 'ELEC 8', 3, 0, '2nd', '3rd'),
(733, 736646, 'Project Management', 'ELEC 9', 3, 0, '2nd', '3rd'),
(734, 736646, 'Capital Market', 'FIN 7', 3, 0, '2nd', '3rd'),
(735, 736646, 'Undergraduate Thesis 2', 'BACC 7b', 3, 0, '2nd', '3rd'),
(736, 736646, 'Credit & Collection', 'FIN 8', 3, 0, '2nd', '3rd'),
(737, 736646, 'Business Research', 'BACC 8', 3, 0, '1st', '4th'),
(738, 736646, 'Global Finance with Electronic Banking', 'ELEC 10', 3, 0, '1st', '4th'),
(739, 736646, 'Venture Capital', 'ELEC 11', 3, 0, '1st', '4th'),
(740, 736646, 'Practicum Internship (600 hours)', 'PR', 6, 0, '2nd', '4th'),
(741, 738687, 'Science, Technology & Society', 'STS 6', 3, 0, '1st', '1st'),
(742, 738687, 'The Contemporary World', 'GE 8', 3, 0, '1st', '1st'),
(743, 738687, 'Ethics', 'GE 7', 3, 0, '1st', '1st'),
(744, 738687, 'Physical Activities Towards Health & Fitness 1 (Movement Competency Training)', 'PATH FIT 1', 2, 0, '1st', '1st'),
(745, 738687, 'Student Formation & Development', 'SFD', 1, 0, '1st', '1st'),
(746, 738687, 'National Service Training Program 1', 'NSTP 1', 3, 0, '1st', '1st'),
(747, 738687, 'Advanced Accounting', 'ACTG 1.2', 6, 0, '1st', '1st'),
(748, 738687, 'Living in IT Era', 'ELEC 1', 3, 0, '1st', '1st'),
(749, 738687, 'Purposive Communication', 'GE 4', 3, 0, '1st', '1st'),
(750, 738687, 'Good Governance & Social Responsibility', 'BACC 1', 3, 0, '2nd', '1st'),
(751, 738687, 'Human Resource Management', 'BACC 2', 3, 0, '2nd', '1st'),
(752, 738687, 'Understanding the self', 'GE 1', 3, 0, '2nd', '1st'),
(753, 738687, 'Physical Activity Towards Health & Fitness 2 (Exercise-based Fitness Activities)', 'PATHFIT 2', 2, 0, '2nd', '1st'),
(754, 738687, 'Art Appreciation', 'GE 5', 3, 0, '2nd', '1st'),
(755, 738687, 'Reading in Philippine History', 'GE 2', 3, 0, '2nd', '1st'),
(756, 738687, 'National Service Training Program 2', 'NSTP 2', 3, 0, '2nd', '1st'),
(757, 738687, 'Mathematics in the Modern World', 'GE 3', 3, 0, '2nd', '1st'),
(758, 738687, 'Gender & Society', 'GE 10', 3, 0, '1st', '2nd'),
(759, 738687, 'Operations Management', 'CBMEC 1', 3, 0, '1st', '2nd'),
(760, 738687, 'Human Reproduction', 'GE 11', 3, 0, '1st', '2nd'),
(761, 738687, 'Basic Micro Economics', 'BACC 3', 3, 0, '1st', '2nd'),
(762, 738687, 'Life & work of Rizal', 'GE 9', 3, 0, '1st', '2nd'),
(763, 738687, 'Marketing Management', 'MKTG 1', 3, 0, '1st', '2nd'),
(764, 738687, 'Physical Activities Towards Health & Fitness 3 (Martial Arts)', 'PATH FIT 3', 2, 0, '1st', '2nd'),
(765, 738687, 'Reading in Visual Arts', 'GE 12', 3, 0, '2nd', '2nd'),
(766, 738687, 'Strategic Management', 'CBMEC 2', 3, 0, '2nd', '2nd'),
(767, 738687, 'Advertising', 'MKTG 1', 3, 0, '2nd', '2nd'),
(768, 738687, 'Product Management', 'MKTG 2', 3, 0, '2nd', '2nd'),
(769, 738687, 'Business Law', 'BACC 4', 3, 0, '2nd', '2nd'),
(770, 738687, 'Distribution Management', 'MKTG 3', 3, 0, '2nd', '2nd'),
(771, 738687, 'Physical Activity Towards Health & Fitness 4 (Sports)', 'PATH FIT 4', 2, 0, '2nd', '2nd'),
(772, 738687, 'Entrepreneurial Management', 'ELEC 2', 3, 0, '2nd', '2nd'),
(773, 738687, 'International Business & Trade', 'BACC 5', 3, 0, '1st', '3rd'),
(774, 738687, 'Consumer Behavior', 'ELEC 3', 3, 0, '1st', '3rd'),
(775, 738687, 'Marketing Research', 'MKTG 4', 3, 0, '1st', '3rd'),
(776, 738687, 'Retail Management', 'MKTG 5', 3, 0, '1st', '3rd'),
(777, 738687, 'Personal Finance', 'ELEC 4', 3, 0, '1st', '3rd'),
(778, 738687, 'Taxation', 'BACC 6', 3, 0, '1st', '3rd'),
(779, 738687, 'Undergraduate Thesis 1', 'BACC 7a', 3, 0, '1st', '3rd'),
(780, 738687, 'Professional Salesmanship', 'MKTG 6', 3, 0, '2nd', '3rd'),
(781, 738687, 'Pricing Strategy', 'MKTG 7', 3, 0, '2nd', '3rd'),
(782, 738687, 'E-Commerce & Internet Marketing', 'ELEC 5', 3, 0, '2nd', '3rd'),
(783, 738687, 'New Market Development', 'ELEC 6', 3, 0, '2nd', '3rd'),
(784, 738687, 'Franchising', 'ELEC 7', 3, 0, '2nd', '3rd'),
(785, 738687, 'Cooperative Marketing', 'ELEC 8', 3, 0, '2nd', '3rd'),
(786, 738687, 'Undergraduate Thesis 2', 'BACC 7b', 3, 0, '2nd', '3rd'),
(787, 738687, 'Special Topic in Marketing Management', 'ELEC 9', 3, 0, '2nd', '3rd'),
(788, 738687, 'Business Research', 'BACC 8', 3, 0, '1st', '4th'),
(789, 738687, 'Business Consulting', 'BACC 9', 3, 0, '1st', '4th'),
(790, 738687, 'Digital Marketing', 'ELEC 10', 3, 0, '1st', '4th'),
(791, 738687, 'Integrated Marketing Communication', 'MKTG 8', 3, 0, '1st', '4th'),
(792, 738687, 'Advertising Media Planning', 'MKTG 9', 3, 0, '1st', '4th'),
(793, 738687, 'Integrated Business Applications', 'ELEC 11', 3, 0, '1st', '4th'),
(794, 738687, 'Business Strategy & Planning', 'BACC 10', 3, 0, '2nd', '4th'),
(795, 738687, 'Advertising Management', 'MKTG 10', 3, 0, '2nd', '4th'),
(796, 738687, 'Global Marketing', 'MKTG 11', 3, 0, '2nd', '4th'),
(797, 738687, 'Customer Relationship Management', 'MKTG 12', 3, 0, '2nd', '4th'),
(798, 738687, 'Retail Merchandising & Store Operations', 'MKTG 13', 3, 0, '2nd', '4th'),
(799, 738687, 'Business Research Project', 'BACC 11', 3, 0, '2nd', '4th');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `announcement_title` varchar(150) DEFAULT NULL,
  `announcement_content` text DEFAULT NULL,
  `datetime_posted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` bigint(20) NOT NULL,
  `course_code` varchar(150) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`) VALUES
(101437, 'BSIT', 'Bachelor of Science in Information Technology'),
(152810, 'BSM', 'Bachelor of Science in Midwifery'),
(201420, 'BSC', 'Bachelor of Science in Criminology'),
(243370, 'BSTM', 'Bachelor of Science in Tourism Management'),
(258895, 'BSED-ENG', 'Bachelor of Secondary Education Major in English'),
(386306, 'BSHM', 'Bachelor of Science in Hospitality Management'),
(391402, 'BSB', 'Bachelor of Science in Biology'),
(483500, 'BSBA-HRM', 'Bachelor of Science in Business Administration Major in Human Resource Management'),
(599252, 'BSRT', 'Bachelor of Science in Radiologic Technology'),
(621600, 'BSED-FIL', 'Bachelor of Secondary Education Major in Filipino'),
(637832, 'BSMT', 'Bachelor of Science in Medical Technology'),
(648181, 'BSSW', 'Bachelor of Science in Social Work'),
(651730, 'BSED-MTH', 'Bachelor of Secondary Education Major in Mathematics'),
(736646, 'BSBA-FM', 'Bachelor of Science in Business Administration Major in Financial Management'),
(738687, 'BSBA-MM', 'Bachelor of Science in Business Administration Major in Marketing Management'),
(843515, 'BSN', 'Bachelor of Science in Nursing'),
(845683, 'BSED-SCI', 'Bachelor of Secondary Education Major in Science'),
(976319587, 'BECEd', 'Bachelor of Early Childhood Education'),
(976319588, 'BEEd', 'Bachelor of Elementary Education'),
(976319589, 'BSNEd-Gen', 'Bachelor in Special Needs Education – Generalist');

-- --------------------------------------------------------

--
-- Table structure for table `credential_requests`
--

CREATE TABLE `credential_requests` (
  `request_id` bigint(20) NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `student_contact_number` text NOT NULL,
  `year_graduated` int(150) NOT NULL,
  `student_requested` varchar(50) DEFAULT NULL,
  `request_purpose` text NOT NULL,
  `request_status` varchar(50) DEFAULT NULL,
  `datetime_request` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `student_id` bigint(20) NOT NULL,
  `student_name` text DEFAULT NULL,
  `student_email` varchar(250) DEFAULT NULL,
  `student_course` bigint(20) NOT NULL,
  `student_section` text NOT NULL,
  `student_year_level` varchar(150) NOT NULL,
  `student_photo` text NOT NULL,
  `student_password` text DEFAULT 'default-profile.png',
  `student_enrollment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`student_id`, `student_name`, `student_email`, `student_course`, `student_section`, `student_year_level`, `student_photo`, `student_password`, `student_enrollment_date`) VALUES
(20100342, 'Lousyll D. Lugay', 'llugay@imcc.edu.ph', 101437, 'BSIT401', '4th Year', 'default-profile.png', 'c3R1ZGVudDEyMw==', '2024-11-10 19:47:59');

--
-- Triggers `student_data`
--
DELIMITER $$
CREATE TRIGGER `after_student_insert` AFTER INSERT ON `student_data` FOR EACH ROW BEGIN
    -- Generate a random 6-digit number for record_id (Between 100000 and 999999)
    DECLARE random_record_id INT;
    SET random_record_id = FLOOR(100000 + (RAND() * 900000));

    -- Insert a new record into student_tuition_record with random record_id
    INSERT INTO student_tuition_record (record_id, student_id, amount, payment_status)
    VALUES (random_record_id, NEW.student_id, 0, 'Pending'); -- Default amount set to 0 and payment_status to 'Pending'
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `grade_id` bigint(20) NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `subject_id` bigint(20) DEFAULT NULL,
  `grade_value` decimal(5,2) DEFAULT NULL,
  `datetime_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`grade_id`, `student_id`, `subject_id`, `grade_value`, `datetime_added`) VALUES
(1, 20100342, 564, 1.00, '2024-11-26 13:13:22'),
(2, 20100342, 565, 1.25, '2024-11-26 13:13:22'),
(3, 20100342, 566, 2.00, '2024-11-26 13:13:22'),
(4, 20100342, 567, 1.00, '2024-11-26 13:13:22'),
(5, 20100342, 568, 1.00, '2024-11-26 13:13:22'),
(6, 20100342, 569, 1.00, '2024-11-26 13:13:22'),
(7, 20100342, 570, 1.50, '2024-11-26 13:13:22'),
(8, 20100342, 571, 1.25, '2024-11-26 13:13:22'),
(9, 20100342, 572, 1.75, '2024-11-26 13:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_schedules`
--

CREATE TABLE `student_schedules` (
  `schedule_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `day_of_week` text NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_schedules`
--

INSERT INTO `student_schedules` (`schedule_id`, `student_id`, `subject_id`, `day_of_week`, `start_time`, `end_time`, `instructor_name`, `semester`, `created_at`, `updated_at`) VALUES
(499834, 20100342, 564, 'WED - THU', '01:00:00', '06:00:00', 'N/A', '1st', '2024-11-29 16:22:10', '2024-12-01 11:20:59'),
(921103, 20100342, 565, 'MON - FRI', '12:00:00', '03:00:00', 'N/A', '1st', '2024-11-29 16:22:10', '2024-12-01 11:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_tuition_record`
--

CREATE TABLE `student_tuition_record` (
  `record_id` int(11) NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_tuition_record`
--

INSERT INTO `student_tuition_record` (`record_id`, `student_id`, `amount`, `payment_status`) VALUES
(312781, 20100342, 0.00, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `user_id` bigint(20) NOT NULL,
  `user_name` text DEFAULT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_type` enum('admin','registrar','finance') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES
(312312321, 'Dugii Pinggy', 'registrar@gmail.com', 'cmVnaXN0cmFyMTIz', 'registrar'),
(312312324, 'Admin', 'admin@gmail.com', 'YWRtaW4xMjM=', 'admin'),
(512312324, 'Dupii', 'finance@gmail.com', 'ZmluYW5jZTEyMw==', 'finance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_calendar`
--
ALTER TABLE `academic_calendar`
  ADD PRIMARY KEY (`calendar_id`);

--
-- Indexes for table `academic_subjects`
--
ALTER TABLE `academic_subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `fk_course_id` (`course_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `admin_id` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `credential_requests`
--
ALTER TABLE `credential_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_student_course` (`student_course`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `student_schedules`
--
ALTER TABLE `student_schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_tuition_record`
--
ALTER TABLE `student_tuition_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_calendar`
--
ALTER TABLE `academic_calendar`
  MODIFY `calendar_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `academic_subjects`
--
ALTER TABLE `academic_subjects`
  MODIFY `subject_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=976319590;

--
-- AUTO_INCREMENT for table `credential_requests`
--
ALTER TABLE `credential_requests`
  MODIFY `request_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45773156;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312312323;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `grade_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=950836;

--
-- AUTO_INCREMENT for table `student_schedules`
--
ALTER TABLE `student_schedules`
  MODIFY `schedule_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=921104;

--
-- AUTO_INCREMENT for table `student_tuition_record`
--
ALTER TABLE `student_tuition_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20100343;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512312325;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_subjects`
--
ALTER TABLE `academic_subjects`
  ADD CONSTRAINT `fk_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`user_id`);

--
-- Constraints for table `credential_requests`
--
ALTER TABLE `credential_requests`
  ADD CONSTRAINT `credential_requests_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_data` (`student_id`);

--
-- Constraints for table `student_data`
--
ALTER TABLE `student_data`
  ADD CONSTRAINT `fk_student_course` FOREIGN KEY (`student_course`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD CONSTRAINT `student_grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_data` (`student_id`),
  ADD CONSTRAINT `student_grades_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `academic_subjects` (`subject_id`);

--
-- Constraints for table `student_schedules`
--
ALTER TABLE `student_schedules`
  ADD CONSTRAINT `student_schedules_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_data` (`student_id`);

--
-- Constraints for table `student_tuition_record`
--
ALTER TABLE `student_tuition_record`
  ADD CONSTRAINT `student_tuition_record_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_data` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
