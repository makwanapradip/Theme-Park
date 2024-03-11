-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2024 at 11:17 AM
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
  `adult_tickets` int NOT NULL,
  `adult_offer` varchar(50) NOT NULL,
  `child_tickets` int NOT NULL,
  `child_offer` varchar(50) NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket_bookings`
--

INSERT INTO `ticket_bookings` (`id`, `name`, `mobile`, `adult_tickets`, `adult_offer`, `child_tickets`, `child_offer`, `booking_date`) VALUES
(1, 'Makwana', '998898979', 0, '', 0, '', '2024-03-05 18:30:00'),
(2, 'wdaD', '21313', 0, '', 0, '', '2024-03-03 18:30:00'),
(3, 'Makwana', '8780591637', 45, 'ADULT20', 50, 'CHILD20', '2024-03-03 18:30:00'),
(4, 'Makwana Axar', '8780591637', 50, 'ADULT20', 78, 'CHILD20', '2024-03-09 18:30:00'),
(5, 'Mayur', '+66666465456465', 80, 'ADULT20', 10, 'CHILD20', '2024-03-09 18:30:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
