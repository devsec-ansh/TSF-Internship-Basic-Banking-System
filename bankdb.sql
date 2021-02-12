-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 12, 2021 at 03:18 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `sender` varchar(30) NOT NULL,
  `amount` int(10) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`sender`, `amount`, `receiver`, `timestamp`) VALUES
('Calvin Harris', 2200, 'Tijs Michiel Verwest', '2021-02-12 14:57:02'),
('Jonas Blue', 3800, 'Nicholas D. Miller', '2021-02-12 14:57:41'),
('Charlotte de Witte', 15000, 'Tim Bergling', '2021-02-12 14:59:15'),
('Tim Bergling', 12000, 'Jonas Blue', '2021-02-12 15:16:46'),
('Jonas Blue', 12000, 'Mike Posner', '2021-02-12 15:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Calvin Harris', 'calvin@gmail.com', 24800),
(2, 'Felix De Laet', 'lost@gmail.com', 33000),
(3, 'Tim Bergling', 'avicii@gmail.com', 16000),
(4, 'Mike Posner', 'posner@gmail.com', 27000),
(5, 'Jonas Blue', 'jonas@gmail.com', 40000),
(6, 'Martijn Gerard', 'garrix@gmail.com', 22500),
(7, 'Nicholas D. Miller', 'illenium@gmail.com', 21800),
(8, 'Ari Staprans Leff', 'lauv@gmail.com', 40000),
(9, 'Tijs Michiel Verwest', 'tiesto@gmail.com', 18000),
(10, 'Charlotte de Witte', 'techno@gmail.com', 30000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
