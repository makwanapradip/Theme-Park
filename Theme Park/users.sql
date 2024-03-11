-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2024 at 11:18 AM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`) VALUES
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('Makwana', 'pmofficial135@gmail.com', '120'),
('Makwana', 'pradip@123', 'v'),
('pradip', 'p1@23', '123'),
('makwana', '123@', '123'),
('Makwana Axar', 'axar2010', '2010'),
('Makwana', 'pradip@123', '120'),
('mahindra', 'mn@123', '130'),
('Makwana', 'pradip@123', '123'),
('shard', 'shard@123', '120'),
('Makwana', 'Pradip', '123'),
('Mayur', 'mayur@123', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
