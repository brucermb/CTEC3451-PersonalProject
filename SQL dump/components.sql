-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 11:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `components`
--

-- --------------------------------------------------------

--
-- Table structure for table `memoryram`
--

CREATE TABLE `memoryram` (
  `ID` int(10) NOT NULL,
  `Manufacturer` varchar(25) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Speed` varchar(25) NOT NULL,
  `Capacity` varchar(20) NOT NULL,
  `MSRP` float(10,2) NOT NULL,
  `Amazon` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memoryram`
--

INSERT INTO `memoryram` (`ID`, `Manufacturer`, `Name`, `Speed`, `Capacity`, `MSRP`, `Amazon`) VALUES
(1, 'Corsair', 'Corsair CMW16GX4M2C3200C16 Vengeance RGB PRO ', 'DDR4 3200 MHz', '16 GB (2 x 8 GB)', 89.00, 0.00),
(3, 'Corsair', 'Corsair CMK8GX4M1A2400C16 Vengeance LPX', 'DDR4 2400 MHz', '8 GB (1 x 8 GB) ', 49.57, 0.00),
(4, 'Crucial', 'Crucial Ballistix BL2K8G32C16U4R', 'DDR4 3200 MHz', '16 GB (2 x 8 GB)', 74.84, 0.00),
(5, 'HyperX', 'HyperX FURY Black HX426C16FB3', 'DDR4 2666MHz', '8 GB (1 x 8 GB)', 53.99, 0.00),
(6, 'G-Skill', 'G-Skill Tydent Z Neo', 'DDR4 3600 MHz', '64 GB (4 x 16 GB)', 543.35, 0.00),
(7, 'G-Skill', 'G-Skill Tydent Z Neo', 'DDR4 3600 MHz', '64 GB (4 x 16 GB)', 543.35, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `ID` int(11) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Socket` varchar(50) NOT NULL,
  `MSRP` float(10,2) NOT NULL,
  `Amazon` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`ID`, `Manufacturer`, `Name`, `Socket`, `MSRP`, `Amazon`) VALUES
(1, 'ASUS', ' ASUS ROG Strix X570-F Gaming ATX Motherboard, AMD', 'AM4', 269.99, 0.00),
(2, 'MSI', 'MSI B450 TOMAHAWK MAX', 'AM4', 99.99, 0.00),
(4, 'Aorus', 'Aorus B450 AORUS ELITE ', 'AM4', 99.99, 0.00),
(5, 'ROG', 'ROG Strix Z590-A Gaming Intel Z590 ', 'LGA1200', 299.99, 0.00),
(6, 'MSI', 'MSI H310M PRO-VDH PLUS', 'LGA1151', 47.49, 0.00),
(7, 'ASUS', 'ASUS PRIME B460M-K', 'LGA1200', 90.35, 0.00),
(8, 'ASUS', 'ASUS PRIME B460M-K', 'LGA1200', 90.35, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `ID` int(11) NOT NULL,
  `Manufacturer` varchar(6) NOT NULL,
  `Socket` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Cores` int(11) NOT NULL,
  `ClockSpeed` varchar(10) NOT NULL,
  `BoostSpeed` varchar(10) NOT NULL,
  `TDP` varchar(10) NOT NULL,
  `intGraphics` tinyint(1) NOT NULL,
  `Position` int(11) NOT NULL,
  `RRP` float(10,2) NOT NULL,
  `Amazon` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`ID`, `Manufacturer`, `Socket`, `Name`, `Cores`, `ClockSpeed`, `BoostSpeed`, `TDP`, `intGraphics`, `Position`, `RRP`, `Amazon`) VALUES
(1, 'AMD', 'AM4', 'AMD Ryzen™ 9 5900X', 12, '3.7GHz', '4.8GHz', '105', 0, 1, 420.00, 376.57),
(2, 'AMD', 'AM4', 'AMD Ryzen™ 5 3600X', 6, '3.8GHz', '4.4GHz', '95W', 0, 2, 250.00, 168.00),
(3, 'AMD', 'AM4', 'AMD Ryzen™ 3 3100', 4, '2.6GHz', '3.9GHz', '65W', 0, 3, 80.00, 0.00),
(4, 'Intel', 'LGA1200', 'Intel® Core™ i5-10600K', 6, '4.1GHz', '4.8GHz', '125', 1, 2, 192.00, 191.99),
(5, 'Intel', 'LGA1151', 'Intel® Pentium® Gold G5400', 2, '3.7GHz', 'N/A', ' 58', 1, 3, 45.00, 119.90),
(6, 'Intel', 'LGA1200', 'Intel® Core™ i9-10900K', 10, '3.7GHz', '5.3GHz', '125', 1, 1, 400.00, 439.98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
