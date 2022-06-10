-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 21, 2022 at 10:10 PM
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
-- Database: `tallerphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `time` datetime DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `envio` varchar(20) NOT NULL,
  `recibio` varchar(20) NOT NULL,
  `contenido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mensaje`
--

INSERT INTO `mensaje` (`time`, `id`, `envio`, `recibio`, `contenido`) VALUES

('2022-05-21 00:00:00', 946, 'johnny', 'Maria', 'marihols'),
('2022-05-21 21:40:12', 947, 'johnny', 'Maria', 'mariasoyyo'),
('2022-05-21 21:41:30', 948, 'johnny', 'Maria', 'cafe'),
('2022-05-21 21:42:14', 949, 'johnny', 'Maria', 'cafeotra vez'),
('2022-05-21 21:46:33', 950, 'johnny', 'Fran', 'hola'),
('2022-05-21 21:46:45', 951, 'johnny', 'CiantiaLT34', 'hola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=952;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
