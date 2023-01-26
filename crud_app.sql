-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2022 at 12:22 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_table`
--

CREATE TABLE `crud_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text,
  `course_number` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_table`
--

INSERT INTO `crud_table` (`id`, `name`, `body`, `course_number`, `user_id`) VALUES
(1, 'Assignment 1', 'There was a description here, but it accidentally got deleted', 3294, 1),
(8, 'B', 'Illo exercitation ob', 3294, 1),
(21, 'Athena Tanner', 'Eum aliqua In adipi', 3295, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Test Name', 'example@email.com', '7;mv-/.}523*BK(}'),
(3, NULL, 'test1@email.com', '$2y$10$imIj9wVDuU2dW16ZW3usXeQE688Zw0tM6QR2HML5NgkPX1pWBfA8G'),
(4, NULL, 'kazyni@mailinator.com', '$2y$10$A/fr3nkC15k6PrkQfhllOu/sel1LcjriQ8fghPKolMxXHAdrfmDg2'),
(5, NULL, 'sikapycoj@mailinator.com', '$2y$10$5SwdO8k9B6DqduxAVsR6wOAAZ.kfnjyVmgwEER.fD.rSANZJdRreO'),
(6, 'ryrij', 'kybutojoh@mailinator.com', '$2y$10$QwqbiZPFFaMA/kfOWGWM5uzfMFA3s6/p/5GZgNEbg1biXjafw31si'),
(7, 'dude', 'dude@email.com', '$2y$10$3XOBtaZd2cXOqweeYWEtVufOiSgyAoDGNdyCkAY0NYTh0M0wrVb8.'),
(10, 'jojes', 'zavuqagula@mailinator.com', '$2y$10$Aa6CmwG04KpEb31bbyoNvO7eaHEIfatf3z7xnYbABhnvrDlAFYevu'),
(19, 'mecyxeta', 'nyfah@mailinator.com', '$2y$10$tnUlsu5GzsQwmOksXRNF0uxlLDHldlL4POMCKJ5GK7Je4Eyql0uUK'),
(20, 'dude2', 'dude2@email.com', '$2y$10$KcVCLFTGJUxqDto.hlRZreDXEbmfI9wf9QEAMpOIOa61J0DZuI0Uq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_table`
--
ALTER TABLE `crud_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Users_Crud_Table` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_table`
--
ALTER TABLE `crud_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crud_table`
--
ALTER TABLE `crud_table`
  ADD CONSTRAINT `crud_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
