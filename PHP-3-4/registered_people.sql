-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2026 at 03:32 AM
-- Server version: 8.0.45
-- PHP Version: 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_3-4`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_people`
--

CREATE TABLE `registered_people` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registered_people`
--

INSERT INTO `registered_people` (`id`, `first_name`, `middle_name`, `last_name`, `age`, `gender`, `email`, `address`, `contact_number`, `created_at`) VALUES
(1, 'Christian', 'Sarabosing', 'Timogan', 35, 'Male', 'christian@example.com', 'D-3, Culit, Nasipit, Agusan del Norte', '09559848951', '2026-04-10 02:55:19'),
(2, 'Christian', 'Sarabosing', 'Timogan', 35, 'Male', 'christian@example.com', 'D-3, Culit, Nasipit, Agusan del Norte', '09559848951', '2026-04-10 02:55:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_people`
--
ALTER TABLE `registered_people`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_people`
--
ALTER TABLE `registered_people`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
