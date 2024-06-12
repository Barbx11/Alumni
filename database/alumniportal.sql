-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 02:39 PM
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
-- Database: `alumniportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_information`
--

CREATE TABLE `address_information` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `address_information`
--

INSERT INTO `address_information` (`id`, `user_id`, `house_number`, `street`, `barangay`, `city`, `province`, `zip_code`) VALUES
(4, '25', '1566', 'Purok 3', 'Santo Angel', 'San Pablo City', 'Laguna', '4001'),
(5, '26', '123', 'Purok 1', 'San Agustin', 'Alaminos', 'Laguna', '4001'),
(6, '27', '1213', 'Purok 4', 'Anastacia', 'Tiaong', 'Quezon', '4332'),
(7, '28', '1231', 'Purok 3', 'San Lucas', 'San Pablo City', 'Laguna', '4000'),
(8, '29', '1566', 'Purok3', 'San Diego', 'San Pablo City', 'Laguna', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `real_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `content`, `date`, `image`, `real_date`) VALUES
(63, 'New Alumni System In PLSP?', 'test', 'June 10, 2024', '63_ccst_logo.webp', '2024-06-10'),
(68, 'We Are Hiring!!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum error vero amet fugiat! Ad dignissimos ex ipsum, quia, quas libero dicta ea velit quibusdam debitis ducimus beatae odio explicabo quo!', 'June 10, 2024', '68_kapitkamay.webp', '2024-06-10'),
(69, 'We are Hiring!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam placeat provident repellat eaque incidunt consequuntur soluta animi, ad earum facere eveniet perferendis! Corporis consequuntur ipsam atque cupiditate quos sit nesciunt.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam placeat provident repellat eaque incidunt consequuntur soluta animi, ad earum facere eveniet perferendis! Corporis consequuntur ipsam atque cupiditate quos sit nesciunt.', 'June 10, 2024', '69_img-10.webp', '2024-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `year`) VALUES
(1, '2010-2012'),
(2, '2012-2013'),
(3, '2013-2014'),
(4, '2014-2015'),
(5, '2015-2016'),
(9, '2016-2017'),
(10, '2017-2018'),
(11, '2018-2019'),
(12, '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_img`
--

CREATE TABLE `carousel_img` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `announce_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `real_time` datetime NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `announce_id`, `user_id`, `time`, `real_time`, `comment_content`) VALUES
(48, '59', '25', '8 Jun 04:46 pm', '2024-06-08 16:46:26', 'qweqwe'),
(49, '60', '25', '8 Jun 04:57 pm', '2024-06-08 16:57:09', 'qweqweqweqwe'),
(50, '60', '25', '8 Jun 04:57 pm', '2024-06-08 16:57:13', 'qweqweqwe'),
(51, '60', '26', '8 Jun 05:02 pm', '2024-06-08 17:02:15', 'qweqweqwe'),
(52, '60', '26', '8 Jun 05:02 pm', '2024-06-08 17:02:34', 'qweqweq\r\n\r\n'),
(53, '63', '25', '10 Jun 06:14 am', '2024-06-10 06:14:43', 'Hi!'),
(54, '63', '26', '10 Jun 06:15 am', '2024-06-10 06:15:57', 'Hello!'),
(55, '63', '25', '10 Jun 11:47 am', '2024-06-10 11:47:48', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_phone_number` varchar(255) NOT NULL,
  `telephone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`id`, `user_id`, `email_address`, `mobile_phone_number`, `telephone_number`) VALUES
(5, '25', '3mjhay0416@gmail.com', '09564282923', '508-4863'),
(6, '26', 'vncgalindo@gmail.com', '09293834635', '508-4672'),
(7, '27', 'carl@gmail.com', '09654152415', '508-4872'),
(8, '28', 'Joven@gmail.com', '09123124122', '508-1231'),
(9, '29', 'test@gmail.com', '09321241231', '508-2793');

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `educational_attainment` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_graduated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `educational_background`
--

INSERT INTO `educational_background` (`id`, `user_id`, `educational_attainment`, `major`, `department`, `course`, `year_graduated`) VALUES
(6, '25', 'Graduate', 'Software Development', 'CCST', 'BSIT', '2021'),
(7, '26', 'Undergrad', 'Network Technology', 'CCST', 'BSIT', 'none'),
(8, '27', 'Undergrad', 'Software Development', 'CCST', 'BSIT', 'None'),
(9, '28', 'Undergrad', 'Network Technology', 'CCST', 'BSIT', '2023'),
(10, '29', 'Undergrad', 'Software Development', 'CCST', 'BSIT', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `employment__information`
--

CREATE TABLE `employment__information` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `employment_status` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `date_started` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `years_of_service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employment__information`
--

INSERT INTO `employment__information` (`id`, `user_id`, `employment_status`, `industry`, `date_started`, `company`, `position`, `years_of_service`) VALUES
(8, '25', 'Employed', 'IT', '1/10/2022', 'Asurion', 'Software Developer', '2'),
(9, '26', 'Employed', 'IT', '2024-06-04', 'Asurion', 'Network Admin', '1'),
(10, '27', 'None', 'None', '', 'None', 'None', 'None'),
(11, '28', 'None', 'None', '', 'None', 'None', 'None'),
(12, '29', 'Employed', 'IT', '2022-01-22', 'Asurion', 'Senior Developer', '2');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `real_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `date`, `real_date`) VALUES
(12, 'Reunion', '12_event2.webp', 'June 10, 2024', '2024-06-10'),
(13, 'Fun Run', '13_event3.webp', 'June 10, 2024', '2024-06-10'),
(14, 'Graduation Party', '14_event4.webp', 'June 10, 2024', '2024-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_pics`
--

CREATE TABLE `gallery_pics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_pics`
--

INSERT INTO `gallery_pics` (`id`, `name`, `title`, `category`, `year`) VALUES
(8, 'gal1.jpeg', 'Graduates', 'BSIT', '2010-2011'),
(9, 'gal2.jpeg', 'Graduates', 'BSIS', '2011-2012'),
(13, 'gal3.jpeg', 'Graduates', 'BSIT', '2014-2015'),
(14, 'gradpic_likod.jpeg', 'Graduates', 'BSIS', '2012-2013'),
(15, 'gradpic_nowalk.jpeg', 'Graduates', 'BSIS', '2013-2014'),
(16, 'sports.jpg', 'Taekwondo', 'BSIT', '2019-2020'),
(17, 'ojt_visit.jpeg', 'OJT Visit', 'BSIT', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `user_id`, `student_id`, `first_name`, `middle_name`, `last_name`, `sex`, `civil_status`, `date_of_birth`, `place_of_birth`, `citizenship`, `religion`, `image`) VALUES
(20, '25', '22-07257', 'Joshua', 'D', 'Alvarado', 'Male', 'Single', '2003-04-16', 'San Pablo City', 'Filipino', 'Catholic', 'missing.png'),
(21, '26', '22-06353', 'Allan Vincent', 'Exconde', 'Galindo', 'Male', 'Married', '2000-09-15', 'San Pablo', 'FIli', 'Christian', 'missing.png'),
(22, '27', '22-07241', 'Carl Sebastian', 'Magkase', 'Sumajestad', 'Male', 'Single', '2004-02-17', 'Tiaong', 'Filipino', 'Catholic', 'missing.png'),
(23, '28', '22-09872', 'Marc Joven', 'Dionglay', 'Enriquez', 'Male', 'Single', '2003-04-08', 'San Pablo City', 'FIli', 'Catholic', 'missing.png'),
(24, '29', '22-1234', 'Joshua', 'Delos Reyes', 'Mendoza', 'Male', 'Single', '2003-04-15', 'San Pablo', 'Filipino', 'Catholic', 'missing.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `confirmation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`id`, `stud_id`, `password`, `email_add`, `confirmation`) VALUES
(25, '22-07257', '123456', '3mjhay0416@gmail.com', 1),
(26, '22-06353', '123456', 'vncgalindo@gmail.com', 1),
(27, '22-07241', 'qwertyu', 'carl@gmail.com', 0),
(28, '22-09872', 'qwerty123', 'Joven@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_information`
--
ALTER TABLE `address_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_img`
--
ALTER TABLE `carousel_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment__information`
--
ALTER TABLE `employment__information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_pics`
--
ALTER TABLE `gallery_pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_information`
--
ALTER TABLE `address_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carousel_img`
--
ALTER TABLE `carousel_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employment__information`
--
ALTER TABLE `employment__information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gallery_pics`
--
ALTER TABLE `gallery_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
