-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 02:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `battleships_battles`
--
CREATE DATABASE IF NOT EXISTS `battleships_battles` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `battleships_battles`;

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `width` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `pp` int(11) NOT NULL,
  `sprite` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `handling` int(11) NOT NULL,
  `shield` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`id`, `name`, `width`, `length`, `hp`, `pp`, `sprite`, `speed`, `handling`, `shield`, `owner`, `x`, `y`, `img_url`) VALUES
(1, 'Hand Of The Emperor', 1, 4, 5, 10, 0, 15, 4, 0, '1', 0, 0, 'https://warhammergames.ru/_pu/3/s25307038.jpg'),
(2, 'Sword Of Absolution', 1, 3, 4, 10, 0, 18, 3, 0, '2', 0, 0, 'https://warhammergames.ru/_pu/3/s71543970.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `weapon`
--

CREATE TABLE `weapon` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `charge` int(11) NOT NULL,
  `short_min` int(11) NOT NULL,
  `short_max` int(11) NOT NULL,
  `middle_min` int(11) NOT NULL,
  `middle_max` int(11) NOT NULL,
  `long_min` int(11) NOT NULL,
  `long_max` int(11) NOT NULL,
  `ez` enum('line','cone','explosion','') NOT NULL,
  `ship_id` int(11) NOT NULL,
  `pp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weapon`
--

INSERT INTO `weapon` (`id`, `name`, `charge`, `short_min`, `short_max`, `middle_min`, `middle_max`, `long_min`, `long_max`, `ez`, `ship_id`, `pp`) VALUES
(1, 'Nautical lance', 0, 1, 30, 31, 60, 61, 90, 'line', 1, 0),
(2, 'Side laser batteries', 0, 1, 10, 11, 20, 21, 30, 'cone', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weapon`
--
ALTER TABLE `weapon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weapon`
--
ALTER TABLE `weapon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
