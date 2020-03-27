-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2019 at 04:28 AM
-- Server version: 5.6.43
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush01`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `login` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`login`, `date`, `msg`) VALUES
('Miroika', 1572175115, 'salut a tous'),
('Miroika', 1572175122, 'voici le chat'),
('Miroika', 1572175130, 'ici vous pouvez discuter'),
('Miroika', 1572175274, 'qwer'),
('hcabel', 1572175367, 'salut a toi moi meme');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `id_team` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `victory` int(11) NOT NULL DEFAULT '0',
  `defeate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `id_team`, `name`, `passwd`, `victory`, `defeate`) VALUES
(1, 0, 'Miroika', '9c9c8dc8aa06c463edd35ada4c0d23ebdc298dd05a0bca1b4cd1d28aa476bd5dff7c32db90242713a95084f563818a6a0029669a738268998a8422237d3ade9b', 0, 0),
(2, 0, 'hcabel', '9b69abb14741cb0ab4df3437d727b94f82cd18bb66698642afc51599d3b284849025ef4ac591b099c4b4d35937848d591ec36b7d7f559dfc92c8367cfcbfd08e', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
