-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 11:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divorce`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `name`, `email`, `phone`, `message`) VALUES
(3, 'Arnold', 'arnold@gmail.com', 76235576, 'I am a lawyer how can I register on your system?'),
(4, 'Caleb Toromo', 'toromo@gmail.com', 987878433, 'Hello there! Here is a message for you...'),
(5, 'Mary Waithira', 'mary@gmail.com', 786768427, 'Will we be redirected?'),
(6, 'Ibrahim', 'adan@gmail.com', 78368346, 'I want to register as  a lawyer...Please contact me!'),
(7, 'ibrah', 'ibraz@gmail.com', 2147483647, 'Hi divorce people.');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(6, 'Vannessa Ojuok', 'vee@gmail.com', '07535353536', '26464646'),
(17, 'Customer', 'Customer@gmail.com', '343483493409', '12334'),
(18, 'Customer 001', 'cust@gmail.com', '07695353554', '2071984729'),
(19, 'Customer@g.com', 'rokongo@gmail.com', '4834893493', '122344'),
(20, 'Robert Okongo', 'rokongo@kabarak.ac.ke', '0769535354', '1223'),
(21, 'james', 'waweru@gmail.com', '07695462788', '1234'),
(22, 'Rita Litole', 'litole@gmail.com', '078284934434', '1234'),
(23, 'Robert Okongo', 'rokongo@kabarak.ac.ke', '0769535354', 'admin'),
(24, 'Mary', 'mary@gmail.com', '0734657677', 'qwerty'),
(25, 'User', 'user@gmail.com', '0863636376', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tms_admin`
--

CREATE TABLE `tms_admin` (
  `a_id` int(20) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tms_admin`
--

INSERT INTO `tms_admin` (`a_id`, `a_name`, `a_email`, `a_pwd`) VALUES
(1, 'System Admin', 'admin@mail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tms_feedback`
--

CREATE TABLE `tms_feedback` (
  `f_id` int(20) NOT NULL,
  `f_uname` varchar(200) NOT NULL,
  `f_content` longtext NOT NULL,
  `f_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tms_feedback`
--

INSERT INTO `tms_feedback` (`f_id`, `f_uname`, `f_content`, `f_status`) VALUES
(4, 'Robert Okongo ', 'I dont like this', '');

-- --------------------------------------------------------

--
-- Table structure for table `tms_lawyer`
--

CREATE TABLE `tms_lawyer` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `l_reg_no` varchar(200) NOT NULL,
  `l_pass_no` varchar(200) NOT NULL,
  `v_driver` varchar(200) NOT NULL,
  `l_gender` varchar(200) NOT NULL,
  `l_dpic` varchar(200) NOT NULL,
  `l_status` varchar(200) NOT NULL,
  `l_email` varchar(100) NOT NULL,
  `l_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tms_lawyer`
--

INSERT INTO `tms_lawyer` (`l_id`, `l_name`, `l_reg_no`, `l_pass_no`, `v_driver`, `l_gender`, `l_dpic`, `l_status`, `l_email`, `l_pwd`) VALUES
(4, 'James Thaura', '47657885', '50 years', 'Worked at the supreme court and high court of kenya', 'Male', '', 'Available', 'james@gmail.com', 'james'),
(5, 'Samwel Kinganga', '398509349', '15years', 'Worked at the supreme court', 'Male', '0_Passport-photo-checker.jpg', 'Booked', 'samwel@gmail.com', 'sawmel');

-- --------------------------------------------------------

--
-- Table structure for table `tms_pwd_resets`
--

CREATE TABLE `tms_pwd_resets` (
  `r_id` int(20) NOT NULL,
  `r_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tms_pwd_resets`
--

INSERT INTO `tms_pwd_resets` (`r_id`, `r_email`) VALUES
(2, 'admin@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tms_syslogs`
--

CREATE TABLE `tms_syslogs` (
  `l_id` int(20) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_ip` varbinary(200) NOT NULL,
  `u_city` varchar(200) NOT NULL,
  `u_country` varchar(200) NOT NULL,
  `u_logintime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tms_user`
--

CREATE TABLE `tms_user` (
  `u_id` int(20) NOT NULL,
  `u_fname` varchar(200) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_phone` varchar(200) NOT NULL,
  `u_addr` varchar(200) NOT NULL,
  `u_category` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_pwd` varchar(20) NOT NULL,
  `u_car_type` varchar(200) NOT NULL,
  `u_car_regno` varchar(200) NOT NULL,
  `u_car_bookdate` varchar(200) NOT NULL,
  `u_car_book_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tms_user`
--

INSERT INTO `tms_user` (`u_id`, `u_fname`, `u_lname`, `u_phone`, `u_addr`, `u_category`, `u_email`, `u_pwd`, `u_car_type`, `u_car_regno`, `u_car_bookdate`, `u_car_book_status`) VALUES
(13, 'Robert', 'Okongo', '0769535354', '5555', 'User', 'rokongo@kabarak.ac.ke', 'admin', 'James Thaura', '47657885', '2023-04-01', 'Approved'),
(14, 'Caleb', 'Toromo', '0797223505', '047, NAIROBI', 'User', 'toromo@gmail.com', 'admin', '', '', '', ''),
(15, 'Ibrahim', 'Adan', '0748339466', 'Moyale', 'User', 'adan@gmail.com', 'adan', 'James Thaura', '47657885', '2023-04-20', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_admin`
--
ALTER TABLE `tms_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tms_feedback`
--
ALTER TABLE `tms_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tms_lawyer`
--
ALTER TABLE `tms_lawyer`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tms_pwd_resets`
--
ALTER TABLE `tms_pwd_resets`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tms_syslogs`
--
ALTER TABLE `tms_syslogs`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tms_user`
--
ALTER TABLE `tms_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tms_admin`
--
ALTER TABLE `tms_admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tms_feedback`
--
ALTER TABLE `tms_feedback`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tms_lawyer`
--
ALTER TABLE `tms_lawyer`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tms_pwd_resets`
--
ALTER TABLE `tms_pwd_resets`
  MODIFY `r_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tms_syslogs`
--
ALTER TABLE `tms_syslogs`
  MODIFY `l_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tms_user`
--
ALTER TABLE `tms_user`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
