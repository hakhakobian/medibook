-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 06:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medibook`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) NOT NULL,
  `doctorID` int(10) NOT NULL,
  `patientID` int(10) NOT NULL,
  `scheduleID` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(10) NOT NULL,
  `time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `time`) VALUES
(1, '09:00 - 10:00'),
(2, '10:00 - 11:00'),
(3, '11:00 - 12:00'),
(4, '13:00 - 14:00'),
(5, '14:00 - 15:00'),
(6, '15:00 - 16:00'),
(7, '16:00 - 17:00'),
(8, '17:00 - 18:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `password`) VALUES
(1, 'doctor', 'Dr. Olivia Bennett', 'olivia.bennett@medi.book', ''),
(2, 'doctor', 'Dr. Ethan Rodriguez', 'ethan.rodriguez@medi.book', ''),
(3, 'doctor', 'Dr. Sophia Anderson', 'sophia.anderson@medi.book', ''),
(4, 'doctor', 'Dr. Noah Patel', 'noad.patel@medi.book', ''),
(5, 'doctor', 'Dr. Ava Mitchell', 'ava.mitchell@medi.book', ''),
(6, 'patient', 'Mrs. Emma Johnson', 'emma.johnson@medi.book', ''),
(7, 'patient', 'Mrs. Mia Thompson', 'mia.thompson@medi.book', ''),
(8, 'patient', 'Mrs. Noah Williams', 'noah.williams@medi.book', ''),
(10, 'patient', 'Mrs. Olivia Brown', 'olivia.brown@medi.book', ''),
(11, 'patient', 'Mr. Anderson Davis', 'anderson.davis@medi.book', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
