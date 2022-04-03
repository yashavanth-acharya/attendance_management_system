-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2019 at 01:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `mobile`, `Email`, `Branch`) VALUES
('hod', '9844057197', 'y@gmail.com', 'COMPUTER SCIENCE & ENGG');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobil_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`email`, `password`, `mobil_no`) VALUES
('y@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9844057197');

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE `attends` (
  `r_no` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `total_class` varchar(10) NOT NULL,
  `present_class` varchar(10) NOT NULL,
  `total_present` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attends`
--

INSERT INTO `attends` (`r_no`, `name`, `total_class`, `present_class`, `total_present`, `subject`, `date_time`, `branch`) VALUES
('145cs17039', 'yash', '50', '20', '40.00%', 'Software Testing', '2019-07-20 13:50:31', 'COMPUTER SCIENCE & ENGG'),
('145cs17038', 'yashavnth', '50', '40', '80.00%', 'Software Testing', '2019-07-20 13:50:31', 'COMPUTER SCIENCE & ENGG'),
('145cs17040', 'yash', '50', '50', '100.00%', 'Software Testing', '2019-07-20 13:50:31', 'COMPUTER SCIENCE & ENGG');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `password`, `mobile`) VALUES
('megha@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9741674861'),
('sahana@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9988776655'),
('ya@gmail.com', 'e4d09637e0ddbb2edcc66e8a7e6551f9', '9988776655'),
('yashavanth@gmail.com', 'e88eacdd0ab61451eb09b175aa6971b0', '9741674861');

-- --------------------------------------------------------

--
-- Table structure for table `oldrecode`
--

CREATE TABLE `oldrecode` (
  `Register_Number` varchar(20) NOT NULL,
  `Student_name` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Total_Classes` varchar(10) NOT NULL,
  `Present_Classes` varchar(10) NOT NULL,
  `Percentage` varchar(10) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oldrecode`
--

INSERT INTO `oldrecode` (`Register_Number`, `Student_name`, `Subject`, `Total_Classes`, `Present_Classes`, `Percentage`, `Mobile`, `branch`) VALUES
('145cs17039', 'yashavanth', ' java', '20', '10', '50.00%', '9741674861', 'COMPUTER SCIENCE & ENGG'),
('145cs17039', 'yashavanth', ' network', '30', '20', '66.67%', '9741674861', 'COMPUTER SCIENCE & ENGG'),
('145cs17039', 'yash', 'Software Testing', '50', '20', '40.00%', '9844057197', 'COMPUTER SCIENCE & ENGG'),
('145cs17038', 'yashavnth', 'Software Testing', '50', '40', '80.00%', '8722855690', 'COMPUTER SCIENCE & ENGG'),
('145cs17040', 'yash', 'Software Testing', '50', '50', '100.00%', '9741674861', 'COMPUTER SCIENCE & ENGG'),
('145cs17039', 'yash', 'Software Testing', '50', '20', '40.00%', '9844057197', 'COMPUTER SCIENCE & ENGG'),
('145cs17038', 'yashavnth', 'Software Testing', '50', '40', '80.00%', '8722855690', 'COMPUTER SCIENCE & ENGG'),
('145cs17040', 'yash', 'Software Testing', '50', '50', '100.00%', '9741674861', 'COMPUTER SCIENCE & ENGG');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `r_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `r_no`, `name`, `branch`, `sem`, `mobile`) VALUES
(13, '145cs17039', 'yash', 'COMPUTER SCIENCE & ENGG', 'VIsem', '9844057197'),
(14, '145cs17038', 'yashavnth', 'COMPUTER SCIENCE & ENGG', 'VIsem', '8722855690'),
(15, '145cs17040', 'yash', 'COMPUTER SCIENCE & ENGG', 'VIsem', '9741674861');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sem` varchar(100) NOT NULL,
  `suject` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `sub_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sem`, `suject`, `branch`, `sub_id`) VALUES
('Isem', 'MATERIALS OF CONSTRUCTION', 'CIVIL ENGINEERING(GENERAL)', '15CE11T'),
('Isem', 'ENGINEERING DRAWING-I', 'CIVIL ENGINEERING(GENERAL)', '15CE12D'),
('Isem', 'Basic Computer Skills Lab', 'CIVIL ENGINEERING(GENERAL)', '15CE13P'),
('Isem', 'MATERIALS OF CONSTRUCTION LAB', 'CIVIL ENGINEERING(GENERAL)', '15CE14P'),
('IIsem', 'SURVEYING - I', 'CIVIL ENGINEERING(GENERAL)', '15CE21T'),
('IIsem', 'ENGINEERING DRAWING-II', 'CIVIL ENGINEERING(GENERAL)', '15CE22D'),
('IIsem', 'SURVEYING PRACTICE - I', 'CIVIL ENGINEERING(GENERAL)', '15CE23P'),
('IIIsem', 'ENGINEERING MECHANICS AND STRENGTH OF MATERIALS', 'CIVIL ENGINEERING(GENERAL)', '15CE31T'),
('IIIsem', 'WATER SUPPLY ENGINEERING', 'CIVIL ENGINEERING(GENERAL)', '15CE32T'),
('IIIsem', 'SURVEYING â€“ II', 'CIVIL ENGINEERING(GENERAL)', '15CE33T'),
('IIIsem', 'CONSTRUCTION TECHNOLOGY', 'CIVIL ENGINEERING(GENERAL)', '15CE34T'),
('IIIsem', 'BUILDING PLANNING AND DRAWING', 'CIVIL ENGINEERING(GENERAL)', '15CE35D'),
('IIIsem', 'SURVEYING PRACTICE - II', 'CIVIL ENGINEERING(GENERAL)', '15CE36P'),
('IIIsem', 'BASIC COMPUTER AIDED DRAFTING IN CIVIL ENGINEERING', 'CIVIL ENGINEERING(GENERAL)', '15CE37P'),
('IVsem', 'HYDRAULICS', 'CIVIL ENGINEERING(GENERAL)', '15CE41T'),
('IVsem', 'SANITARY ENGINEERING', 'CIVIL ENGINEERING(GENERAL)', '15CE42T'),
('IVsem', 'CONCRETE TECHNOLOGY', 'CIVIL ENGINEERING(GENERAL)', '15CE43T'),
('IVsem', 'PROFESSIONAL ETHICS & INDIAN CONSTITUTION', 'CIVIL ENGINEERING(GENERAL)', '15CE44T'),
('IVsem', 'SOIL & MATERIAL TESTING LAB', 'CIVIL ENGINEERING(GENERAL)', '15CE45P'),
('IVsem', 'COMPUTER AIDED BUILDING PLANNING AND DRAWING', 'CIVIL ENGINEERING(GENERAL)', '15CE46P'),
('IVsem', 'HYDRAULICS AND ENVIRONMENTAL LAB', 'CIVIL ENGINEERING(GENERAL)', '15CE47P'),
('Vsem', 'DESIGN OF REINFORCED CEMENT CONCRETE', 'CIVIL ENGINEERING(GENERAL)', '15CE51T'),
('Vsem', 'WATER RESOURCES ENGINEERING', 'CIVIL ENGINEERING(GENERAL)', '15CE52T'),
('Vsem', 'ESTIMATION AND COSTING', 'CIVIL ENGINEERING(GENERAL)', '15CE53T'),
('Vsem', 'TRANSPORTATION ENGINEERING', 'CIVIL ENGINEERING(GENERAL)', '15CE54T'),
('Vsem', 'IRRIGATION AND BRIDGE DRAWING', 'CIVIL ENGINEERING(GENERAL)', '15CE55D'),
('Vsem', 'CONSTRUCTION PRACTICE', 'CIVIL ENGINEERING(GENERAL)', '15CE56P'),
('Vsem', 'PROFESSIONAL PRACTICE', 'CIVIL ENGINEERING(GENERAL)', '15CE57P'),
('Vsem', 'PROJECT WORK-I', 'CIVIL ENGINEERING(GENERAL)', '15CE58P'),
('VIsem', 'DESIGN OF STEEL AND MASONARY STRUCTURES', 'CIVIL ENGINEERING(GENERAL)', '15CE61T'),
('VIsem', 'PROJECT MANAGEMENT AND VALUATION', 'CIVIL ENGINEERING(GENERAL)', '15CE62T'),
('VIsem', 'COMPUTER APPLICATION LAB', 'CIVIL ENGINEERING(GENERAL)', '15CE64P'),
('VIsem', 'EXTENSIVE SURVEY CAMP/PROJECT', 'CIVIL ENGINEERING(GENERAL)', '15CE65P'),
('VIsem', 'PROJECT WORK-II', 'CIVIL ENGINEERING(GENERAL)', '15CE66P'),
('VIsem', 'IN-PLANT TRAINING', 'CIVIL ENGINEERING(GENERAL)', '15CE67P'),
('IIsem', 'Communication Skills in English ', 'COMPUTER SCIENCE & ENGG', '15CP01E'),
('Isem', 'Basic Computer Skills  Lab', 'COMPUTER SCIENCE & ENGG', '15CS11P'),
('IIsem', 'Digital  and Computer Fundamentals', 'COMPUTER SCIENCE & ENGG', '15CS21T'),
('IIsem', 'Basic Web Design Lab', 'COMPUTER SCIENCE & ENGG', '15CS22P'),
('IIsem', 'Multimedia Lab', 'COMPUTER SCIENCE & ENGG', '15CS23P'),
('IIIsem', 'Programming with C', 'COMPUTER SCIENCE & ENGG', '15CS31T'),
('IIIsem', 'Computer Organization', 'COMPUTER SCIENCE & ENGG', '15CS32T'),
('IIIsem', 'Database Management Systems', 'COMPUTER SCIENCE & ENGG', '15CS33T'),
('IIIsem', 'Computer Network', 'COMPUTER SCIENCE & ENGG', '15CS34T'),
('IIIsem', 'Programming with C lab', 'COMPUTER SCIENCE & ENGG', '15CS35P'),
('IIIsem', 'DBMS and GUI lab', 'COMPUTER SCIENCE & ENGG', '15CS36P'),
('IIIsem', 'Network Administration lab', 'COMPUTER SCIENCE & ENGG', '15CS37P'),
('IVsem', 'Data Structures using C', 'COMPUTER SCIENCE & ENGG', '15CS41T'),
('IVsem', 'OOP With Java', 'COMPUTER SCIENCE & ENGG', '15CS42T'),
('IVsem', 'Operating System', 'COMPUTER SCIENCE & ENGG', '15CS43T'),
('IVsem', 'PROFESSIONAL ETHICS & INDIAN CONSTITUTION', 'COMPUTER SCIENCE & ENGG', '15CS44T'),
('IVsem', 'Data Structures lab', 'COMPUTER SCIENCE & ENGG', '15CS45P'),
('IVsem', 'OOP with Java Lab', 'COMPUTER SCIENCE & ENGG', '15CS46P'),
('IVsem', 'Linux Lab', 'COMPUTER SCIENCE & ENGG', '15CS47P'),
('Vsem', 'Software Engineering', 'COMPUTER SCIENCE & ENGG', '15CS51T'),
('Vsem', 'Web Programming', 'COMPUTER SCIENCE & ENGG', '15CS52T'),
('Vsem', 'Design and Analysis of Algorithms', 'COMPUTER SCIENCE & ENGG', '15CS53T'),
('Vsem', 'Green Computing', 'COMPUTER SCIENCE & ENGG', '15CS54T'),
('Vsem', 'Web Programming Lab', 'COMPUTER SCIENCE & ENGG', '15CS55P'),
('Vsem', 'Design and Analysis of Algorithms Lab', 'COMPUTER SCIENCE & ENGG', '15CS56P'),
('Vsem', 'PROFESSIONAL PRACTICES', 'COMPUTER SCIENCE & ENGG', '15CS57P'),
('Vsem', 'Project Work Phase-I', 'COMPUTER SCIENCE & ENGG', '15CS58P'),
('VIsem', 'Software Testing', 'COMPUTER SCIENCE & ENGG', '15CS61T'),
('VIsem', 'Network Security & Management', 'COMPUTER SCIENCE & ENGG', '15CS62T'),
('VIsem', 'Software Testing Lab', 'COMPUTER SCIENCE & ENGG', '15CS64P'),
('VIsem', 'Network Security Lab', 'COMPUTER SCIENCE & ENGG', '15CS65P'),
('VIsem', 'Soft Skills for IT Professionals', 'COMPUTER SCIENCE & ENGG', '15CS66P'),
('VIsem', 'Project Work- II', 'COMPUTER SCIENCE & ENGG', '15CS67T'),
('Isem', 'Concepts of Electrical & Electronics Engg', 'ELECTRICAL & ELECRONICS ENGG', '15EC01T'),
('Isem', 'Basic Electronics lab', 'COMPUTER SCIENCE & ENGG', '15EC02P'),
('IIsem', 'Digital Electronics Lab', 'ELECTRICAL & ELECRONICS ENGG', '15EC03P'),
('Isem', 'Basics of Electrical and Electronics Engineering', 'ELECTRONICS & COMMUNICATION ENGG', '15EC11T'),
('Isem', 'Basics of Electrical & Electronic Engg. Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC12P'),
('Isem', 'Concepts of Computer Lab', 'ELECTRICAL & ELECRONICS ENGG', '15EC13P'),
('IIsem', 'Basics of Semiconductor Devices', 'ELECTRONICS & COMMUNICATION ENGG', '15EC21T'),
('IIsem', 'Semiconductor Devices Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC22P'),
('IIsem', 'Digital Electronics Lab-I', 'ELECTRONICS & COMMUNICATION ENGG', '15EC23P'),
('IIsem', 'Mathematical Simulation Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC24P'),
('IIIsem', 'Analog Electronics Circuits', 'ELECTRONICS & COMMUNICATION ENGG', '15EC31T'),
('IIIsem', 'Digital Electronics', 'ELECTRONICS & COMMUNICATION ENGG', '15EC32T'),
('IIIsem', 'ANALOG COMMUNICATION', 'ELECTRONICS & COMMUNICATION ENGG', '15EC33T'),
('IIIsem', 'Electronic Measurements and Instrumentation', 'ELECTRONICS & COMMUNICATION ENGG', '15EC34T'),
('IIIsem', 'Analog Electronics and Communication Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC35P'),
('IIIsem', 'Digital Electronics Lab-2', 'ELECTRONICS & COMMUNICATION ENGG', '15EC36P'),
('IIIsem', 'C- Programming Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC37P'),
('IVsem', 'PROFESSIONAL ETHICS & INDIAN CONSTITUTION', 'ELECTRONICS & COMMUNICATION ENGG', '15EC41T'),
('IVsem', 'Microcontroller & Applications', 'ELECTRONICS & COMMUNICATION ENGG', '15EC42T'),
('IVsem', 'Digital Communication', 'ELECTRONICS & COMMUNICATION ENGG', '15EC43T'),
('IVsem', 'Data Communication and Networking', 'ELECTRONICS & COMMUNICATION ENGG', '15EC44T'),
('IVsem', 'PROFESSIONAL PRACTICES', 'ELECTRONICS & COMMUNICATION ENGG', '15EC45P'),
('IVsem', 'Microcontroller Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC46P'),
('IVsem', 'DIGITAL COMMUNICATION & NETWORKING LAB', 'ELECTRONICS & COMMUNICATION ENGG', '15EC47P'),
('Vsem', 'Organisational Management and Entrepreneurship', 'ELECTRONICS & COMMUNICATION ENGG', '15EC51T'),
('Vsem', 'ARM Controller', 'ELECTRONICS & COMMUNICATION ENGG', '15EC52T'),
('Vsem', 'Advanced Communication', 'ELECTRONICS & COMMUNICATION ENGG', '15EC53T'),
('Vsem', 'Applications of Electronics Engineering', 'ELECTRONICS & COMMUNICATION ENGG', '15EC54T'),
('Vsem', 'ARM Controller Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC55P'),
('Vsem', 'PCB Design and Fabrication Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC56P'),
('Vsem', 'Electronics Servicing Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC57P'),
('Vsem', 'Project Work-I', 'ELECTRONICS & COMMUNICATION ENGG', '15EC58P'),
('VIsem', 'Industrial Automation', 'ELECTRONICS & COMMUNICATION ENGG', '15EC61T'),
('VIsem', 'Embedded Systems', 'ELECTRONICS & COMMUNICATION ENGG', '15EC62T'),
('VIsem', 'Medical Electronics', 'ELECTRONICS & COMMUNICATION ENGG', '15EC63A'),
('VIsem', 'Advanced Microprocessors', 'ELECTRONICS & COMMUNICATION ENGG', '15EC63B'),
('VIsem', 'Object Oriented Programming Using C++', 'ELECTRONICS & COMMUNICATION ENGG', '15EC63C'),
('VIsem', 'Industrial Automation Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC64P'),
('VIsem', 'Verilog Lab', 'ELECTRONICS & COMMUNICATION ENGG', '15EC65P'),
('VIsem', 'Project Work-II', 'ELECTRONICS & COMMUNICATION ENGG', '15EC66P'),
('VIsem', 'INPLANT TRAINING', 'ELECTRONICS & COMMUNICATION ENGG', '15EC67P'),
('IIIsem', 'Kannada', 'ELECTRONICS & COMMUNICATION ENGG', '15KA3KT'),
('IIIsem', 'Kannada', 'COMPUTER SCIENCE & ENGG', '15KA4NT'),
('VIsem', 'COMPUTER AIDED ANALYSIS AND SIMULATION LABORATORY', 'MECHANICAL ENGG.(GENERAL)', '15ME'),
('IIsem', 'BASIC ELECTRICAL AND ELECTRONICS ENGINEERING', 'ELECTRICAL & ELECRONICS ENGG', '15ME01E'),
('IIsem', 'BASIC ELECTRICAL AND ELECTRONICS ENGINEERING LAB', 'ELECTRICAL & ELECRONICS ENGG', '15ME02P'),
('Isem', 'WORK SHOP TECHNOLOGY', 'MECHANICAL ENGG.(GENERAL)', '15ME11T'),
('Isem', 'ENGINEERING GRAPHICS-I', 'MECHANICAL ENGG.(GENERAL)', '15ME12D'),
('Isem', 'Basic Computer Skills Lab', 'MECHANICAL ENGG.(GENERAL)', '15ME13P'),
('Isem', 'BASIC WORK SHOP PRACTICE-I', 'MECHANICAL ENGG.(GENERAL)', '15ME14P'),
('IIsem', 'ENGINEERING GRAPHICS-II', 'MECHANICAL ENGG.(GENERAL)', '15ME21D'),
('IIIsem', 'STRENGTH OF MATERIALS', 'MECHANICAL ENGG.(GENERAL)', '15ME31T'),
('IIIsem', 'MECHANICS OF MACHINES', 'MECHANICAL ENGG.(GENERAL)', '15ME32T'),
('IIIsem', 'MECHANICAL MEASUREMENTS', 'MECHANICAL ENGG.(GENERAL)', '15ME33T'),
('IIIsem', 'MACHINE DRAWING', 'MECHANICAL ENGG.(GENERAL)', '15ME34D'),
('IIIsem', 'MECHANICAL COMPUTER AIDED DRAFTING (MCAD)', 'MECHANICAL ENGG.(GENERAL)', '15ME35P'),
('IIIsem', 'BASIC WORK SHOP PRACTICE-II', 'MECHANICAL ENGG.(GENERAL)', '15ME36P'),
('IIIsem', 'MECHANICAL TESTING AND QUALITY CONTROL LAB', 'MECHANICAL ENGG.(GENERAL)', '15ME37P'),
('IVsem', 'HYDRAULICS & PNEUMATICS', 'MECHANICAL ENGG.(GENERAL)', '15ME41T'),
('IVsem', 'BASIC THERMAL ENGINEERING', 'MECHANICAL ENGG.(GENERAL)', '15ME42T'),
('IVsem', 'MACHINE TOOL TECHNOLOGY', 'MECHANICAL ENGG.(GENERAL)', '15ME43T'),
('IVsem', 'PROFESSIONAL ETHICS & INDIAN CONSTITUTION', 'MECHANICAL ENGG.(GENERAL)', '15ME44T'),
('IVsem', 'HYDRAULICS AND PNEUMATIC LAB', 'MECHANICAL ENGG.(GENERAL)', '15ME45P'),
('IVsem', 'MACHINE SHOP', 'MECHANICAL ENGG.(GENERAL)', '15ME46P'),
('IVsem', 'C PROGRAMMING LAB', 'MECHANICAL ENGG.(GENERAL)', '15ME47P'),
('Vsem', 'INDUSTRIAL MANAGEMENT', 'MECHANICAL ENGG.(GENERAL)', '15ME51T'),
('Vsem', 'APPLIED THERMAL ENGINEERING', 'MECHANICAL ENGG.(GENERAL)', '15ME52T'),
('Vsem', 'MACHINE DESIGN', 'MECHANICAL ENGG.(GENERAL)', '15ME53T'),
('Vsem', 'MECHATRONICS', 'MECHANICAL ENGG.(GENERAL)', '15ME54T'),
('Vsem', 'PROFESSIONAL PRACTICES (Mechanical Stream)', 'MECHANICAL ENGG.(GENERAL)', '15ME55P'),
('Vsem', 'THERMAL ENGINEERING LAB', 'MECHANICAL ENGG.(GENERAL)', '15ME56P'),
('Vsem', 'MECHATRONICS LAB', 'MECHANICAL ENGG.(GENERAL)', '15ME57P'),
('Vsem', 'PROJECT WORK-I(Mechanical Stream)', 'MECHANICAL ENGG.(GENERAL)', '15ME58P'),
('VIsem', 'ESTIMATION AND COSTING', 'MECHANICAL ENGG.(GENERAL)', '15ME61T'),
('VIsem', 'COMPUTER INTEGRATED MANUFACTURING', 'MECHANICAL ENGG.(GENERAL)', '15ME62T'),
('VIsem', 'CNC LAB', 'MECHANICAL ENGG.(GENERAL)', '15ME64P'),
('VIsem', 'Computer Aided Analysis and Simulation lab', 'MECHANICAL ENGG.(GENERAL)', '15ME65P'),
('VIsem', 'PROJECT WORK (Mechanical Stream)', 'MECHANICAL ENGG.(GENERAL)', '15ME66P'),
('VIsem', 'INPLANT TRAINING (Mechanical Stream)', 'MECHANICAL ENGG.(GENERAL)', '15ME67P'),
('Isem', 'Engineering Mathematics-I', 'SCIENCE', '15SC01M'),
('IIsem', 'Engineering Mathematics-II', 'SCIENCE', '15SC02M'),
('Isem', 'Applied Science', 'SCIENCE', '15SC03S '),
('IIsem', 'Applied Science', 'SCIENCE', '15SC03SII'),
('Isem', 'Applied Science Lab', 'SCIENCE', '15SC04P'),
('IIsem', 'Applied Science Lab', 'SCIENCE', '15SC04PII');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`name`, `mobile`, `Email`, `Branch`) VALUES
('megha', '9741674861', 'megha@gmail.com', 'SCIENCE'),
('sahana', '9988776655', 'sahana@gmail.com', 'ELECTRICAL & ELECRONICS ENGG'),
('yash', '9988776655', 'ya@gmail.com', 'COMPUTER SCIENCE & ENGG'),
('yashavanth', '9741674861', 'yashavanth@gmail.com', 'COMPUTER SCIENCE & ENGG');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`name`, `age`) VALUES
('yash', '19'),
('shanthi', '19'),
('megha', '19'),
('yash', '19'),
('shanthi', '19'),
('megha', '19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
