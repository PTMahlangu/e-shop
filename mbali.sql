-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2020 at 05:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbali`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Item`
--

CREATE TABLE `tbl_Item` (
  `ItemID` char(20) NOT NULL,
  `Description` char(50) DEFAULT NULL,
  `CostPrice` decimal(15,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `SellPrice` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_Item`
--

INSERT INTO `tbl_Item` (`ItemID`, `Description`, `CostPrice`, `Quantity`, `SellPrice`) VALUES
('1', 'Bosch - Impact Drill', '120.00', 14, '155.00'),
('10', 'RYOBI nail gun\r\n', '891.00', 16, '971.00'),
('11', 'Stanley - Screwdriver Set', '120.00', 123, '123.00'),
('12', 'Screw 8 x 16mm (25 Pack)', '7.00', 345, '12.00'),
('13', 'Stabila Type 70 (1200mm)', '600.00', 45, '630.00'),
('14', 'Grip Aluminium Square (178 x 180mm)', '115.00', 23, '123.00'),
('15', 'Utility knife', '12.00', 122, '12.00'),
('16', 'Tool set DEXTER 108 pieces', '1490.00', 6, '1550.00'),
('2', 'chisel set', '300.00', 12, '375.00'),
('3', 'Claw hammer', '80.00', 22, '120.00'),
('4', 'coping saw', '50.00', 18, '82.50'),
('5', 'Eclipse 75mm G-Clamp', '78.00', 8, '90.00'),
('6', 'Fragram - 350 Backsaw', '67.00', 23, '85.00'),
('7', 'Irwin pencil', '220.00', 45, '250.00'),
('8', 'Stanley - Measure Tape', '120.00', 100, '170.00'),
('9', 'Ryobi Jig saw (800w)\r\n', '860.00', 15, '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `Order_id` int(35) NOT NULL,
  `Customer_id` int(35) NOT NULL,
  `Order_date` date NOT NULL,
  `Shipping_Address` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`Order_id`, `Customer_id`, `Order_date`, `Shipping_Address`) VALUES
(6, 1, '2020-01-22', '31 rissik street'),
(7, 1, '2020-01-22', '31 rissik street'),
(8, 1, '2020-01-22', '31 rissik street'),
(9, 1, '2020-09-29', '31 rissik street'),
(10, 1, '2020-09-29', '31 rissik street'),
(11, 1, '2020-09-29', '31 rissik street'),
(12, 100, '2020-09-29', '31 rissik st'),
(13, 100, '2020-09-29', '31 rissik st'),
(14, 100, '2020-09-29', '31 rissik st'),
(15, 100, '2020-09-29', '31 rissik st'),
(16, 100, '2020-09-29', '31 rissik st'),
(17, 100, '2020-09-29', '31 rissik st'),
(18, 100, '2020-09-29', '31 rissik st'),
(19, 100, '2020-09-29', '31 rissik st'),
(20, 100, '2020-09-29', '31 rissik st'),
(21, 100, '2020-09-29', '31 rissik st'),
(22, 100, '2020-09-29', '31 rissik st'),
(23, 100, '2020-09-29', '31 rissik st'),
(24, 100, '2020-09-29', '31 rissik st'),
(25, 100, '2020-09-29', '31 rissik st'),
(26, 100, '2020-09-29', '31 rissik st'),
(27, 100, '2020-09-29', '31 rissik st'),
(28, 100, '2020-09-29', '31 rissik st'),
(29, 100, '2020-09-29', '31 rissik st'),
(30, 100, '2020-09-29', '31 rissik st'),
(31, 100, '2020-09-29', '31 rissik st'),
(32, 100, '2020-09-29', '31 rissik st'),
(33, 100, '2020-09-29', '31 rissik st'),
(34, 100, '2020-09-29', '31 rissik st'),
(35, 100, '2020-09-29', '31 rissik st'),
(36, 100, '2020-09-29', '31 rissik st'),
(37, 100, '2020-09-29', '31 rissik st'),
(38, 78, '2020-09-29', '123 synly park'),
(39, 78, '2020-09-29', '123 synly park'),
(40, 1, '2020-09-29', '31 rissik street'),
(41, 78, '2020-09-30', '123 synly park'),
(42, 78, '2020-09-30', '123 synly park'),
(43, 78, '2020-09-30', '123 synly park'),
(44, 78, '2020-09-30', '123 synly park'),
(45, 78, '2020-09-30', '123 synly park'),
(46, 78, '2020-09-30', '123 synly park'),
(47, 78, '2020-09-30', '123 synly park'),
(48, 78, '2020-09-30', '123 synly park');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `Order_item_id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`Order_item_id`, `Order_id`, `Item_id`, `Quantity`) VALUES
(1, 6, 17, 1),
(2, 7, 17, 1),
(3, 8, 17, 1),
(4, 9, 17, 1),
(7, 26, 10, 1),
(8, 26, 11, 2),
(9, 27, 10, 1),
(10, 27, 11, 2),
(11, 28, 10, 1),
(12, 28, 11, 2),
(13, 29, 10, 1),
(14, 29, 11, 2),
(15, 29, 2, 3),
(16, 29, 11, 1),
(17, 29, 1, 1),
(18, 29, 5, 1),
(19, 30, 10, 1),
(20, 30, 11, 2),
(21, 30, 2, 3),
(22, 30, 11, 1),
(23, 30, 1, 1),
(24, 30, 5, 1),
(25, 31, 10, 1),
(26, 31, 11, 2),
(27, 31, 2, 3),
(28, 31, 11, 1),
(29, 31, 1, 1),
(30, 31, 5, 1),
(31, 32, 11, 1),
(32, 32, 12, 1),
(33, 33, 10, 1),
(34, 33, 11, 1),
(35, 33, 12, 1),
(36, 33, 1, 1),
(37, 34, 10, 1),
(38, 34, 11, 1),
(39, 34, 12, 1),
(40, 34, 1, 1),
(41, 35, 1, 1),
(42, 35, 10, 1),
(43, 35, 11, 1),
(44, 35, 12, 1),
(45, 36, 1, 1),
(46, 36, 10, 1),
(47, 36, 11, 1),
(48, 36, 12, 1),
(49, 37, 1, 1),
(50, 37, 10, 1),
(51, 37, 11, 1),
(52, 37, 12, 1),
(53, 38, 9, 2),
(54, 38, 15, 2),
(55, 38, 3, 2),
(56, 40, 17, 1),
(57, 40, 17, 1),
(58, 41, 12, 1),
(59, 41, 11, 1),
(60, 42, 11, 1),
(61, 47, 12, 1),
(62, 48, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_Item`
--
ALTER TABLE `tbl_Item`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`Order_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `Order_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `Order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
