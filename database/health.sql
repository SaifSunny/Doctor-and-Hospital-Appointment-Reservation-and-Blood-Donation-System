-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 05:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `birthday`, `email`, `contact`, `address`, `city`, `zip`, `image`) VALUES
(1, 'mouly', '123456', 'Mahbuba', 'Mouly', 'Female', '1998-12-01', 'mouly123@gmail.com', '1234567890', 'Mohammadpur', 'Dhaka', '1207', 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `doc_image` varchar(250) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `user_id`, `doc_id`, `user_image`, `doc_image`, `user_name`, `doc_name`, `patient_name`, `date`, `time`, `contact`, `message`, `status`) VALUES
(4, 13, 39, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'mahabub123', 'Ria Thomas', 'Mahabub Khan', '12/6/2022', '1:00 PM', '01763426713', 'I have a back Pain', 0),
(5, 14, 39, 'harps-joseph-tAvpDE7fXgY-unsplash.jpg', 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'Nila', 'Ria Thomas', 'Nila', '12/6/2022', '12:00 pM', '01763426713', 'ssdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `request_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `req_user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `hos_name` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `request_date` varchar(100) NOT NULL,
  `is_urgent` int(11) NOT NULL,
  `user_img` varchar(250) NOT NULL,
  `hos_img` varchar(250) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`request_id`, `hospital_id`, `req_user_id`, `user_name`, `hos_name`, `blood_group`, `request_date`, `is_urgent`, `user_img`, `hos_img`, `contact`, `patient_name`, `status`) VALUES
(1, 3, 13, 'mahabub123', 'City Hospital', 'B+(ve)', '12/6/2022', 0, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'download (2).png', '01624034918', 'saif sunny', 1),
(2, 3, 14, 'Nila', 'City Hospital', 'B+(ve)', '12/6/2022', 0, 'harps-joseph-tAvpDE7fXgY-unsplash.jpg', 'download (2).png', '01624034918', 'Saif_Sunny', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL DEFAULT 1,
  `image` varchar(250) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `dep_short_description` varchar(250) NOT NULL,
  `dep_full_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `sched_id`, `image`, `dep_name`, `dep_short_description`, `dep_full_description`) VALUES
(7, 1, 'cardiology.jpg', 'Cardiology', 'Provides medical care to patients who have problems with their heart or circulation.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.'),
(8, 1, 'closeup-doctor-stethoscope-magnifier-total-gynecology-structure-system-uterus-image-light-140600200.jpg', 'Gynecology', 'Investigates and treats problems relating to the female urinary tract and reproductive organs, such as Endometriosis, infertility and incontinence.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.'),
(9, 1, 'op.jpg', 'Ophthalmology', 'Ophthalmology is a branch of medicine which deals with the diseases and surgery of the visual pathways, including the eye, hairs, and areas surrounding the eye, such as the lacrimal system and eyelids. The term ophthalmologist is an eye specialist fo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.'),
(10, 1, 'Orthopaedics.jpg', 'Orthopaedics', 'Treats conditions related to the musculoskeletal system, including joints, ligaments, bones, muscles, tendons, and nerves.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.'),
(11, 1, 'cropped-view-of-dietitian-writing-in-meal-plan-at--DCQNDUM.jpg', 'Nutrition and Dietetics', 'Dietitians and nutritionists provide specialist advice on diet for hospital wards and outpatient clinics.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.'),
(12, 1, 'iStock-176879169-1280x896.jpg', 'Otolaryngology', 'The ENT Department provide comprehensive and specialized care covering both Medical and Surgical conditions related not just specifically to the Ear, Nose and Throat, but also other areas within the Head and Neck region. It is often divided into sub-', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `education1` varchar(50) NOT NULL,
  `education2` varchar(50) NOT NULL,
  `year1` varchar(50) NOT NULL,
  `year2` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `clinic_address` varchar(100) NOT NULL,
  `clinic_city` varchar(50) NOT NULL,
  `clinic_zip` varchar(50) NOT NULL,
  `doc_sched_id` int(11) NOT NULL DEFAULT 1,
  `hos_id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(100) NOT NULL,
  `join_date` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `firstname`, `lastname`, `nid`, `education1`, `education2`, `year1`, `year2`, `gender`, `contact`, `clinic_address`, `clinic_city`, `clinic_zip`, `doc_sched_id`, `hos_id`, `username`, `email`, `password`, `dep_id`, `dep_name`, `join_date`, `image`, `status`) VALUES
(38, 'Sam', 'Lerner', '1234567', 'M.B.B.S', 'M.D. Orthopedic', '2008', '2012', 'Male', ' 2345678911 ', 'Bosila', 'Dhaka', '1207', 1, 3, 'SLerner', 'SLerner123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 10, 'Orthopaedics', '2022-05-28 04:51:03', 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 1),
(39, 'Ria', 'Thomas', '13135434', 'M.B.B.S', 'M.D. Gynecology', '2007', '2012', 'Female', ' 01624034918 ', '23/1 Block D Gulshan', 'Dhaka', '1212', 1, 0, 'RThomas', 'Riathomas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 8, 'Gynecology', '2022-05-28 05:04:55', 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 1),
(42, 'Jonny', 'King', '1234567', 'M.B.B.S', 'M.D. Orthopedic', '', '', 'Male', ' 2345678911 ', '23/9 Mohammdpur', 'Dhaka', '1207', 1, 0, 'jking', 'jonnyking@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 10, 'Orthopaedics', '2022-05-29 10:47:16', 'dre.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donation_request`
--

CREATE TABLE `donation_request` (
  `donation_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `hos_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `donner_name` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `request_date` varchar(100) NOT NULL,
  `hos_img` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_request`
--

INSERT INTO `donation_request` (`donation_id`, `hospital_id`, `hos_name`, `address`, `user_id`, `donner_name`, `blood_group`, `request_date`, `hos_img`, `user_img`, `contact`, `status`) VALUES
(1, 3, 'City Hospital', 'Mirpur Dhaka 1205', 13, 'saif sunny', 'B+(ve)', '12/6/2022', 'download (2).png', 'ian-dooley-d1UPkiFd04A-unsplash.jpg', '01624034918', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL DEFAULT 1,
  `logo` varchar(250) NOT NULL,
  `hos_name` varchar(50) NOT NULL,
  `hospital_reg_id` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `join_date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `cabin` int(11) NOT NULL DEFAULT 10,
  `icu` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `sched_id`, `logo`, `hos_name`, `hospital_reg_id`, `contact`, `address`, `city`, `zip`, `email`, `password`, `join_date`, `status`, `cabin`, `icu`) VALUES
(1, 1, 'care.jpg', 'Care Hospital', '1234567890', '+8801212122121', 'Mohammadpur', 'Dhaka', '1207', 'care@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-05-28 10:22:18', 1, 10, 5),
(3, 1, 'download (2).png', 'City Hospital', '12345678', '+8801212122123', 'Mirpur', 'Dhaka', '1205', 'city@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-06-03 02:03:44', 1, 49, 13);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_booking`
--

CREATE TABLE `hospital_booking` (
  `booking_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hos_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `hos_img` varchar(255) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `book_type` varchar(100) NOT NULL,
  `book_from` varchar(100) NOT NULL,
  `book_to` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_booking`
--

INSERT INTO `hospital_booking` (`booking_id`, `hospital_id`, `user_id`, `hos_name`, `user_name`, `user_img`, `hos_img`, `patient_name`, `contact`, `msg`, `book_type`, `book_from`, `book_to`, `status`) VALUES
(3, 3, 13, 'City Hospital', 'mahabub123', 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'download (2).png', 'MJ', '01763426713', 'help', 'cabin', '21/8/22', '27/8/22', 1),
(4, 3, 13, 'City Hospital', 'mahabub123', 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'download (2).png', 'Thomas', '01763426713', 'emergency', 'icu', '21/8/22', '27/8/22', 1),
(5, 3, 13, 'City Hospital', 'mahabub123', 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'download (2).png', 'saif sunny', '01624034918', 'hi', 'cabin', '21/8/22', '27/8/22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `sl` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`sl`, `image`, `name`, `role`) VALUES
(20, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(22, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(25, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(31, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(32, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(33, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(34, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(35, 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 'SLerner', 'Doctor'),
(36, 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 'SLerner', 'Doctor'),
(37, 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 'SLerner', 'Doctor'),
(38, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(39, 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 'SLerner', 'Doctor'),
(40, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(41, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(42, 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 'SLerner', 'Doctor'),
(43, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(44, 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 'SLerner', 'Doctor'),
(45, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(46, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(47, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(48, 'rayul-_M6gy9oHgII-unsplash.jpg', 'sunny56', 'User'),
(49, 'download (2).png', 'City Hospital', 'Hospital'),
(50, 'download (2).png', 'City Hospital', 'Hospital'),
(51, 'download (2).png', 'City Hospital', 'Hospital'),
(52, 'young-male-doctor-close-up-happy-looking-camera-56751540.jpg', 'SLerner', 'Doctor'),
(53, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(54, 'download (2).png', 'City Hospital', 'Hospital'),
(55, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(56, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(57, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(58, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(59, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(60, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(61, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(62, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(63, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'mahabub123', 'User'),
(64, 'download (2).png', 'City Hospital', 'Hospital'),
(65, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'mahabub123', 'User'),
(66, 'download (2).png', 'City Hospital', 'Hospital'),
(67, 'care.jpg', 'Care Hospital', 'Hospital'),
(68, 'download (2).png', 'City Hospital', 'Hospital'),
(69, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(70, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'mahabub123', 'User'),
(71, 'care.jpg', 'Care Hospital', 'Hospital'),
(72, 'download (2).png', 'City Hospital', 'Hospital'),
(73, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'mahabub123', 'User'),
(74, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin'),
(75, 'download (2).png', 'City Hospital', 'Hospital'),
(76, 'harps-joseph-tAvpDE7fXgY-unsplash.jpg', 'Nila', 'User'),
(77, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(78, 'care.jpg', 'Care Hospital', 'Hospital'),
(79, 'download (2).png', 'City Hospital', 'Hospital'),
(80, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(81, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'mahabub123', 'User'),
(82, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'mahabub123', 'User'),
(83, 'smiling-female-doctor-holding-medical-records-lab-coat-her-office-clipboard-looking-camera-56673035 (2).jpg', 'RThomas', 'Doctor'),
(84, 'care.jpg', 'Care Hospital', 'Hospital'),
(85, 'download (2).png', 'City Hospital', 'Hospital'),
(86, 'toa-heftiba-O3ymvT7Wf9U-unsplash.jpg', 'mouly', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_id` int(11) NOT NULL,
  `weekends` varchar(100) NOT NULL DEFAULT '11:00 AM - 6:00 PM',
  `weekdays` varchar(100) NOT NULL DEFAULT '10:00 AM - 8:00 PM',
  `holidays` varchar(100) NOT NULL DEFAULT '11:00 AM - 6:00 PM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_id`, `weekends`, `weekdays`, `holidays`) VALUES
(1, '11:00 AM - 6:00 PM', '10:00 AM - 8:00 PM', '11:00 AM - 6:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `image`, `firstname`, `lastname`, `username`, `email`, `password`, `gender`, `birthday`, `blood_group`, `contact`, `address`, `city`, `zip`) VALUES
(11, 'albert-dera-ILip77SbmOE-unsplash.jpg', 'Albert', 'Dera', 'Albert', 'albert.dera@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '1988-06-14', 'B+(ve)', '+8801232345678', 'Mohammadpur', 'Dhaka', '1207'),
(12, 'harps-joseph-tAvpDE7fXgY-unsplash.jpg', 'Harps', 'Joseph', 'joseph212', 'joseph212@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '1992-12-09', 'A+ (ve)', '+8801232345679', 'Mirpur', 'Dhaka', '1205'),
(13, 'ian-dooley-d1UPkiFd04A-unsplash.jpg', 'Mahabub', 'Khan', 'mahabub123', 'mahabub123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '1998-08-11', 'O + (ve)', '+8801732345333', 'Mohammadpur', 'Dhaka', '1207'),
(14, 'harps-joseph-tAvpDE7fXgY-unsplash.jpg', 'Nila', 'Yasmin', 'Nila', 'Nila123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Female', '1992-05-13', 'B+(ve)', '+880234567891', 'Bosila', 'Dhaka', '1205');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `req_user_id` (`req_user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `sched_id` (`sched_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `doctors_ibfk_3` (`doc_sched_id`);

--
-- Indexes for table `donation_request`
--
ALTER TABLE `donation_request`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `hospital_booking`
--
ALTER TABLE `hospital_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `donation_request`
--
ALTER TABLE `donation_request`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital_booking`
--
ALTER TABLE `hospital_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
