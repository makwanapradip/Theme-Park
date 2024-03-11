-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2024 at 03:24 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket_bookings`
--

DROP TABLE IF EXISTS `ticket_bookings`;
CREATE TABLE IF NOT EXISTS `ticket_bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `adult_tickets` int NOT NULL,
  `adult_offer` varchar(50) NOT NULL,
  `child_tickets` int NOT NULL,
  `child_offer` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket_bookings`
--

INSERT INTO `ticket_bookings` (`id`, `name`, `mobile`, `email`, `booking_date`, `adult_tickets`, `adult_offer`, `child_tickets`, `child_offer`) VALUES
(10, 'kevin', '998898979', 'pmofficial135@gmail.com', '2024-03-05 18:30:00', 10, 'ADULT10', 20, 'CHILD20'),
(9, 'Makwana Axar', '8780591637', 'pmofficial135@gmail.com', '2024-03-05 18:30:00', 5, 'ADULT20', 8, 'CHILD20'),
(8, 'Makwana Axar', '8780591637', 'pmofficial135@gmail.com', '2024-03-04 18:30:00', 12, 'ADULT10', 5, 'CHILD20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
