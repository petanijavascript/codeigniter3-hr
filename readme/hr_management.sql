-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 06:46 AM
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
-- Database: `hr_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `nip` varchar(30) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gender` int(1) NOT NULL,
  `join_date` date NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`nip`, `name`, `gender`, `join_date`, `is_active`, `date_created`) VALUES
('1000', 'Lukman Hakim', 1, '1990-05-05', 1, '2024-04-18 19:18:31'),
('1001', 'Saiful Anwar', 1, '1988-01-10', 1, '2024-04-18 19:18:31'),
('1003', 'Tubagus', 1, '1986-03-20', 1, '2024-04-19 19:13:38'),
('1002', 'Sinta Mei', 2, '2019-08-01', 1, '2024-04-19 07:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `name`) VALUES
(2, 'Administrator'),
(3, 'Supervisor HR'),
(4, 'Asisten Manager Keuangan'),
(5, 'Sekretaris'),
(6, 'Manager Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `id` int(11) NOT NULL,
  `active_date` date NOT NULL,
  `nip` varchar(30) NOT NULL,
  `job_id` int(11) NOT NULL,
  `is_main` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`id`, `active_date`, `nip`, `job_id`, `is_main`) VALUES
(1, '2024-04-19', '1000', 4, 1),
(4, '2015-02-02', '1000', 5, 0),
(5, '2019-08-01', '1002', 5, 1),
(6, '2018-07-02', '1002', 5, 0),
(7, '2005-11-20', '1001', 4, 1),
(8, '2002-02-05', '1003', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
