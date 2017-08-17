-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 01:44 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcs_db`
--
CREATE DATABASE IF NOT EXISTS `mcs_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mcs_db`;

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cartID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL,
  `employeeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `contactID` int(5) NOT NULL,
  `contactName` varchar(150) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `customerID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`contactID`, `contactName`, `contactNum`, `customerID`) VALUES
(1, 'dsfsd', '09342344563', 1),
(2, 'jhgujfh', '7657869', 2),
(3, 'kjhgfhj', '09342344563', 3),
(4, 'asdasdasd', '09342344563', 4),
(5, 'jgfhfhj', '09342344563', 5),
(6, 'iuhgfj', '09223456543', 6),
(7, 'jhfh', '09342344563', 7),
(8, 'asdasd', '09342344563', 8),
(9, 'asdasd', '09342344563', 9),
(10, 'sdas', '09342344563', 10),
(11, 'asdas', '09342344563', 11),
(12, 'jgfhhjh', '09342344563', 12),
(13, 'hgjghj', '09342344563', 13),
(14, 'hghg', '09342344563', 14),
(15, 'jbjh', '09342344563', 15),
(16, 'kufjhfv', '09342344563', 16),
(17, 'jkhfhjhjg', '09342344563', 17),
(18, 'jhj', '09342344563', 18),
(19, 'hjjgh', '09342344563', 19),
(20, 'iougjhj', '09342344563', 20),
(21, 'sddf', '09342344563', 21),
(22, 'lkjjlknjk', '09342344563', 22),
(23, 'kjbkhbjn', '09342344563', 23),
(24, 'dsfsdfds', '09342344563', 24),
(25, 'nkn', '09342344563', 25),
(26, 'nkbhghb', '09342344563', 26),
(27, 'mbvjhfhj', '09342344563', 27),
(28, 'jvhb', '09342344563', 28),
(29, 'jhkhjkh', '09342344563', 29),
(30, 'jkhj', '80689686', 30),
(31, 'gfdcvh', '09342344563', 31),
(32, 'cds', '09342344563', 32),
(33, 'ddddd', '09342344563', 33),
(34, 'kjhhjk', '09342344563', 34),
(35, 'hghj', '09342344563', 35),
(36, 'gfghjk', '09342344563', 36);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customerID` int(5) NOT NULL,
  `fullName` varchar(150) NOT NULL,
  `homeAddress` varchar(150) NOT NULL,
  `billingAddress` varchar(150) NOT NULL,
  `emailAddress` varchar(150) NOT NULL,
  `cellNum` varchar(13) NOT NULL,
  `telNum` varchar(10) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `customerAvailability` int(1) NOT NULL,
  `customerStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`customerID`, `fullName`, `homeAddress`, `billingAddress`, `emailAddress`, `cellNum`, `telNum`, `dateOfBirth`, `customerAvailability`, `customerStatus`) VALUES
(1, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(2, 'Maute', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1200-12-12', 1, 1),
(3, 'Maute', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(4, 'asdasdas', 'Mandaluyong', 'sdfsdfsd', 'mautegroup@gmail.com', '8789698', '98689896', '1200-12-12', 1, 1),
(5, 'Maute', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(6, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(7, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(8, 'asd', 'asd', 'as', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(9, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(10, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(11, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(12, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(13, 'asdasdas', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(14, 'kjhgfg', 'gxgdydh', 'Marawi', 'mautegroup@gmail.com', '8789698', '98689896', '1950-12-12', 1, 1),
(15, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '2017-11-01', 1, 1),
(16, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '2017-12-31', 1, 1),
(17, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '2003-12-31', 1, 1),
(18, 'dasjdkas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', 'jioujhjkn', '2003-12-31', 1, 1),
(19, 'asdasdas', 'Sta', 'Sta', 'mautegroup@gmail.com', '8789698', '98689896', '2000-12-31', 1, 1),
(20, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1992-12-30', 1, 1),
(21, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1998-11-30', 1, 1),
(22, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '2003-12-31', 1, 1),
(23, 'asdasdas', 'Sta. Mesa', 'Sta. Mesa', 'mautegroup@gmail.com', '8789698', '98689896', '2002-11-30', 1, 1),
(24, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '2002-10-31', 1, 1),
(25, 'asdasdas', 'Sta Mesa', 'Sta Mesa', 'mautegroup@gmail.com', '8789698', '98689896', '2004-12-31', 1, 1),
(26, 'asdasdas', 'gxgdydh', 'gxgdydh', 'dfgdfgdf@YAHOO.COM', '8789698', '98689896', '2004-12-31', 1, 1),
(27, 'asdasdas', 'StaMesa', 'StaMesa', 'mautegroup@gmail.com', '8789698', '98689896', '1919-12-31', 1, 1),
(28, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1999-12-31', 1, 1),
(29, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '2002-12-31', 1, 1),
(30, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1991-10-30', 1, 1),
(31, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1991-02-01', 1, 1),
(32, 'cxzczx', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1987-12-31', 1, 1),
(33, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1997-12-31', 1, 1),
(34, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1999-10-30', 1, 1),
(35, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1999-12-31', 1, 1),
(36, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1997-12-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dish_tbl`
--

CREATE TABLE `dish_tbl` (
  `dishID` int(5) NOT NULL,
  `dishName` varchar(100) NOT NULL,
  `dishDescription` varchar(200) NOT NULL,
  `dishCost` decimal(7,2) NOT NULL,
  `dishImage` varchar(100) NOT NULL,
  `dishAvailability` int(1) NOT NULL,
  `dishStatus` int(1) NOT NULL,
  `dishTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish_tbl`
--

INSERT INTO `dish_tbl` (`dishID`, `dishName`, `dishDescription`, `dishCost`, `dishImage`, `dishAvailability`, `dishStatus`, `dishTypeID`) VALUES
(4, 'Porkchop', 'qwe', '178.00', 'bp.jpg', 1, 1, 8),
(5, 'Beef Broccoli', 'asd', '123.00', 'bwb.jpg', 1, 1, 7),
(6, 'Chopsuey', 'ff', '31.00', 'mv.jpg', 1, 1, 6),
(7, 'Lumpiang Sariwa', 'yum', '20.00', 'lub.jpe', 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `dishadditional_tbl`
--

CREATE TABLE `dishadditional_tbl` (
  `additionalID` int(5) NOT NULL,
  `additionalServing` varchar(100) NOT NULL,
  `additionalNotes` varchar(150) NOT NULL,
  `reservationID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dishavailed_tbl`
--

CREATE TABLE `dishavailed_tbl` (
  `dishAvailedID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishavailed_tbl`
--

INSERT INTO `dishavailed_tbl` (`dishAvailedID`, `dishID`, `reservationID`) VALUES
(1, 5, 1),
(2, 5, 1),
(3, 5, 1),
(4, 4, 1),
(5, 5, 2),
(6, 5, 2),
(7, 5, 2),
(8, 4, 2),
(9, 5, 7),
(10, 5, 7),
(11, 4, 1),
(12, 4, 2),
(13, 5, 2),
(14, 6, 2),
(15, 5, 11),
(16, 4, 11),
(17, 5, 12),
(18, 5, 12),
(19, 5, 12),
(20, 4, 12),
(21, 5, 13),
(22, 5, 13),
(23, 5, 13),
(24, 4, 13),
(25, 5, 14),
(26, 4, 14),
(27, 4, 14),
(28, 5, 15),
(29, 5, 15),
(30, 5, 15),
(31, 4, 15),
(32, 5, 16),
(33, 4, 16),
(34, 4, 16),
(35, 6, 17),
(36, 5, 17),
(37, 4, 17),
(38, 7, 18),
(39, 5, 18),
(40, 4, 18),
(41, 6, 19),
(42, 5, 19),
(43, 4, 19),
(44, 6, 20),
(45, 5, 20),
(46, 4, 20),
(47, 6, 21),
(48, 5, 21),
(49, 4, 21),
(50, 5, 22),
(51, 4, 22),
(52, 4, 22),
(53, 5, 23),
(54, 4, 23),
(55, 4, 23),
(56, 6, 24),
(57, 5, 24),
(58, 4, 24),
(59, 5, 25),
(60, 5, 25),
(61, 5, 25),
(62, 4, 25),
(63, 6, 26),
(64, 5, 26),
(65, 4, 26),
(66, 5, 27),
(67, 5, 27),
(68, 5, 27),
(69, 4, 27),
(70, 5, 28),
(71, 5, 28),
(72, 5, 28),
(73, 4, 28),
(74, 5, 30),
(75, 5, 30),
(76, 5, 30),
(77, 4, 30),
(78, 6, 31),
(79, 5, 31),
(80, 4, 31),
(81, 5, 32),
(82, 5, 32),
(83, 5, 32),
(84, 4, 32),
(85, 5, 33),
(86, 4, 33),
(87, 4, 33),
(88, 5, 34),
(89, 4, 34),
(90, 4, 34);

-- --------------------------------------------------------

--
-- Table structure for table `dishtype_tbl`
--

CREATE TABLE `dishtype_tbl` (
  `dishTypeID` int(5) NOT NULL,
  `dishTypeName` varchar(150) DEFAULT NULL,
  `dishTypeDescription` varchar(200) DEFAULT NULL,
  `dishTypeStatus` int(1) DEFAULT NULL,
  `dishTypeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishtype_tbl`
--

INSERT INTO `dishtype_tbl` (`dishTypeID`, `dishTypeName`, `dishTypeDescription`, `dishTypeStatus`, `dishTypeImage`) VALUES
(6, 'Vegetable', 'as', 1, 'vegy.jpg'),
(7, 'Beef', 'asd', 1, 'beef.jpg'),
(8, 'Pork', 'asdd', 1, 'pork.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `employeeID` int(5) NOT NULL,
  `employeeName` varchar(100) NOT NULL,
  `employeeImage` varchar(100) NOT NULL,
  `employeeAvailability` int(1) NOT NULL,
  `employeeStatus` int(1) NOT NULL,
  `employeeTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeemployed_tbl`
--

CREATE TABLE `employeeemployed_tbl` (
  `employeeEmployedID` int(5) NOT NULL,
  `employeeTypeID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeemployed_tbl`
--

INSERT INTO `employeeemployed_tbl` (`employeeEmployedID`, `employeeTypeID`, `reservationID`) VALUES
(1, 1, 20),
(2, 1, 21),
(3, 1, 24),
(4, 1, 26),
(5, 1, 29),
(6, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `employeetype_tbl`
--

CREATE TABLE `employeetype_tbl` (
  `employeeTypeID` int(5) NOT NULL,
  `employeeTypeName` varchar(100) NOT NULL,
  `employeeTypeDescription` varchar(200) NOT NULL,
  `employeeRatePerHour` decimal(7,2) NOT NULL,
  `employeeTypeImage` varchar(100) NOT NULL,
  `employeeTypeStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetype_tbl`
--

INSERT INTO `employeetype_tbl` (`employeeTypeID`, `employeeTypeName`, `employeeTypeDescription`, `employeeRatePerHour`, `employeeTypeImage`, `employeeTypeStatus`) VALUES
(1, 'Clown', 'Clowning', '500.00', 'No Image', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_tbl`
--

CREATE TABLE `equipment_tbl` (
  `equipmentID` int(5) NOT NULL,
  `equipmentName` varchar(100) NOT NULL,
  `equipmentDescription` varchar(200) NOT NULL,
  `equipmentRatePerHour` decimal(7,2) NOT NULL,
  `equipmentImage` varchar(100) NOT NULL,
  `equipmentAvailability` int(1) NOT NULL,
  `equipmentStatus` int(1) NOT NULL,
  `equipmentTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipmentavailed_tbl`
--

CREATE TABLE `equipmentavailed_tbl` (
  `equipmentAvailedID` int(5) NOT NULL,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipmentlog_tbl`
--

CREATE TABLE `equipmentlog_tbl` (
  `equipmentLogID` int(5) NOT NULL,
  `equipmentID` int(5) NOT NULL,
  `equipmentQuantityIn` int(8) NOT NULL,
  `equipmentQuantityOut` int(8) NOT NULL,
  `equipmentLogDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttype_tbl`
--

CREATE TABLE `equipmenttype_tbl` (
  `equipmentTypeID` int(5) NOT NULL,
  `equipmentTypeName` int(11) NOT NULL,
  `equipmentTypeStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `eventID` int(5) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `eventLocation` varchar(150) DEFAULT NULL,
  `guestCount` int(5) NOT NULL,
  `eventStatus` int(1) NOT NULL,
  `customerID` int(5) NOT NULL,
  `locationID` int(5) DEFAULT NULL,
  `eventTypeID` int(5) NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`eventID`, `eventName`, `eventDate`, `eventTime`, `eventLocation`, `guestCount`, `eventStatus`, `customerID`, `locationID`, `eventTypeID`, `endTime`) VALUES
(1, 'iugjg', '2017-12-12', '02:00:00', 'fuck', 10, 1, 1, NULL, 1, '05:00:00'),
(2, 'jk', '2017-12-12', '03:00:00', NULL, 30, 1, 2, 1, 1, '05:00:00'),
(3, 'iugjg', '2017-12-12', '04:00:00', 'fuck', 9, 1, 3, NULL, 1, '05:00:00'),
(4, 'iugjg', '1997-12-12', '02:00:00', 'fuck', 37, 1, 4, NULL, 1, '05:00:00'),
(5, 'iugjg', '1997-12-12', '02:00:00', 'fuck', 11, 1, 5, NULL, 1, '05:00:00'),
(6, 'iugjg', '1997-12-12', '02:00:00', NULL, 11, 1, 6, 1, 1, '05:00:00'),
(7, 'iugjg', '1997-12-12', '02:00:00', NULL, 7, 1, 7, 1, 1, '05:00:00'),
(8, 'asd', '1997-12-12', '03:00:00', NULL, 12, 1, 8, 1, 1, '05:00:00'),
(9, 'iugjg', '1997-12-12', '02:00:00', NULL, 400, 1, 9, 1, 1, '05:00:00'),
(10, 'iugjg', '1997-12-12', '02:00:00', 'fuck', 400, 1, 10, NULL, 1, '05:00:00'),
(11, 'iugjg', '1997-12-12', '02:00:00', 'fuck', 400, 1, 11, NULL, 1, '05:00:00'),
(12, 'iugjg', '1997-12-12', '03:00:00', 'fuck', 2, 1, 12, NULL, 1, '05:00:00'),
(13, 'iugjg', '1997-12-12', '02:00:00', 'fuck', 5, 1, 13, NULL, 1, '05:00:00'),
(14, 'iugjg', '1997-12-12', '02:00:00', 'fuck', 3, 1, 14, NULL, 1, '05:00:00'),
(15, 'iugjg', '2017-12-31', '00:00:00', NULL, 2, 1, 16, 1, 1, '12:00:00'),
(16, 'iugjg', '2017-12-31', '23:59:00', NULL, 1, 1, 17, 1, 1, '12:59:00'),
(17, 'qwerty', '2017-12-31', '12:59:00', 'fuck', 1, 1, 18, NULL, 1, '13:59:00'),
(18, 'iugjg', '2017-12-29', '22:59:00', 'fuck', 1, 1, 19, NULL, 1, '12:59:00'),
(19, 'jk', '2017-12-31', '11:58:00', NULL, 1, 1, 20, 1, 1, '12:59:00'),
(20, 'jk', '2017-12-27', '12:59:00', NULL, 1, 1, 21, 1, 1, '12:57:00'),
(21, 'iugjg', '2017-10-31', '00:58:00', 'fuck', 1, 1, 22, NULL, 1, '10:59:00'),
(22, 'jk', '2017-12-29', '10:59:00', 'fuck', 1, 1, 23, NULL, 1, '09:58:00'),
(23, 'iugjg', '2017-10-31', '11:59:00', 'fuck', 1, 1, 24, NULL, 1, '00:59:00'),
(24, 'iugjg', '2017-10-31', '12:59:00', NULL, 1, 1, 25, 1, 1, '12:59:00'),
(25, 'iugjg', '2018-01-31', '22:58:00', NULL, 1, 1, 27, 1, 1, '12:59:00'),
(26, 'iugjg', '2017-12-31', '23:59:00', 'fuck', 1, 1, 28, NULL, 1, '12:57:00'),
(27, 'iugjg', '2017-12-31', '11:59:00', NULL, 1, 1, 29, 1, 1, '23:57:00'),
(28, 'iugjg', '2017-10-27', '23:59:00', NULL, 1, 1, 30, 1, 1, '12:59:00'),
(29, 'iugjg', '2017-12-04', '23:59:00', NULL, 1, 1, 31, 1, 1, '12:59:00'),
(30, 'iugjg', '2017-12-09', '00:59:00', NULL, 1, 1, 32, 1, 1, '12:45:00'),
(31, 'iugjg', '2017-12-31', '11:59:00', 'fuck', 1, 1, 33, NULL, 1, '12:59:00'),
(32, 'iugjg', '2017-12-31', '23:59:00', NULL, 1, 1, 34, 1, 1, '12:59:00'),
(33, 'iugjg', '2017-12-31', '23:59:00', NULL, 1, 1, 35, 1, 1, '23:59:00'),
(34, 'iugjg', '2017-07-31', '12:58:00', NULL, 1, 1, 36, 1, 1, '00:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `eventtype_tbl`
--

CREATE TABLE `eventtype_tbl` (
  `eventTypeID` int(5) NOT NULL,
  `eventTypeName` varchar(100) NOT NULL,
  `eventTypeDescription` varchar(200) NOT NULL,
  `eventTypeAvailability` int(1) NOT NULL,
  `eventTypeStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtype_tbl`
--

INSERT INTO `eventtype_tbl` (`eventTypeID`, `eventTypeName`, `eventTypeDescription`, `eventTypeAvailability`, `eventTypeStatus`) VALUES
(1, 'Birthday', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `locationID` int(5) NOT NULL,
  `locationName` varchar(100) NOT NULL,
  `locationDescription` varchar(200) NOT NULL,
  `locationContactPerson` varchar(100) NOT NULL,
  `locationContactNumber` varchar(13) NOT NULL,
  `locationCapacity` int(7) NOT NULL,
  `locationFee` decimal(7,2) NOT NULL,
  `locationImage` varchar(100) NOT NULL,
  `locationAvailability` int(1) NOT NULL,
  `locationStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_tbl`
--

INSERT INTO `location_tbl` (`locationID`, `locationName`, `locationDescription`, `locationContactPerson`, `locationContactNumber`, `locationCapacity`, `locationFee`, `locationImage`, `locationAvailability`, `locationStatus`) VALUES
(1, 'PUP', 'wow', 'Jayson Joseph', '09213456789', 50000, '10000.00', 'No Image', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_tbl`
--

CREATE TABLE `package_tbl` (
  `packageID` int(5) NOT NULL,
  `packageName` varchar(150) NOT NULL,
  `packageDescription` varchar(200) NOT NULL,
  `packageCost` decimal(7,2) NOT NULL,
  `packageImage` varchar(100) NOT NULL,
  `packageAvailability` int(1) NOT NULL,
  `packageStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_tbl`
--

INSERT INTO `package_tbl` (`packageID`, `packageName`, `packageDescription`, `packageCost`, `packageImage`, `packageAvailability`, `packageStatus`) VALUES
(1, 'Breakfast', 'very goodo', '700.00', 'Desert.jpg', 1, 1),
(2, 'Lunch', 'not so goodo', '800.00', 'Penguins.jpg', 1, 1),
(3, 'Dinner', 'excelente', '2000.00', 'Lighthouse.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packageavailed_tbl`
--

CREATE TABLE `packageavailed_tbl` (
  `packageAvailedID` int(5) NOT NULL,
  `packageID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packageinclusion_tbl`
--

CREATE TABLE `packageinclusion_tbl` (
  `packageInclusionID` int(5) NOT NULL,
  `packageID` int(5) NOT NULL,
  `dishTypeID` int(5) DEFAULT NULL,
  `serviceID` int(5) DEFAULT NULL,
  `equipmentID` int(5) DEFAULT NULL,
  `employeeTypeID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmode_tbl`
--

CREATE TABLE `paymentmode_tbl` (
  `paymentModeID` int(5) NOT NULL,
  `paymentModeName` varchar(50) NOT NULL,
  `paymentModeIco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmode_tbl`
--

INSERT INTO `paymentmode_tbl` (`paymentModeID`, `paymentModeName`, `paymentModeIco`) VALUES
(1, 'Cash', 'ti-money'),
(2, 'Credit', 'ti-credit-card');

-- --------------------------------------------------------

--
-- Table structure for table `paymentterm_tbl`
--

CREATE TABLE `paymentterm_tbl` (
  `paymentTermID` int(5) NOT NULL,
  `paymentTermName` varchar(45) NOT NULL,
  `paymentTermIco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentterm_tbl`
--

INSERT INTO `paymentterm_tbl` (`paymentTermID`, `paymentTermName`, `paymentTermIco`) VALUES
(1, 'Full Payment', 'ti-heart'),
(2, 'Half Payment', 'ti-heart-broken'),
(3, 'Quarter Payment', 'ti-pie-chart');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tbl`
--

CREATE TABLE `reservation_tbl` (
  `reservationID` int(5) NOT NULL,
  `reservationStatus` int(1) NOT NULL,
  `eventID` int(5) NOT NULL,
  `paymentModeID` int(5) NOT NULL,
  `paymentTermID` int(5) NOT NULL,
  `packageID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_tbl`
--

INSERT INTO `reservation_tbl` (`reservationID`, `reservationStatus`, `eventID`, `paymentModeID`, `paymentTermID`, `packageID`) VALUES
(1, 1, 1, 2, 2, 3),
(2, 1, 2, 2, 2, 3),
(3, 1, 3, 2, 2, 1),
(4, 1, 4, 2, 2, 3),
(5, 1, 5, 2, 2, 1),
(6, 1, 6, 2, 2, 3),
(7, 1, 7, 2, 2, 3),
(8, 1, 8, 2, 2, 1),
(9, 1, 9, 2, 2, 1),
(10, 1, 10, 2, 2, 2),
(11, 1, 11, 2, 2, 2),
(12, 1, 12, 2, 2, 3),
(13, 1, 13, 2, 2, 3),
(14, 1, 14, 2, 2, 2),
(15, 1, 15, 2, 2, 3),
(16, 1, 16, 2, 2, 2),
(17, 1, 17, 2, 2, 1),
(18, 1, 18, 2, 2, 1),
(19, 1, 19, 2, 2, 1),
(20, 1, 20, 2, 2, 1),
(21, 1, 21, 2, 2, 1),
(22, 1, 22, 2, 2, 2),
(23, 1, 23, 2, 2, 2),
(24, 1, 24, 2, 2, 1),
(25, 1, 25, 2, 2, 3),
(26, 1, 26, 2, 2, 1),
(27, 1, 27, 2, 2, 3),
(28, 1, 28, 2, 2, 3),
(29, 1, 29, 2, 2, 1),
(30, 1, 30, 2, 2, 3),
(31, 1, 31, 2, 2, 1),
(32, 1, 32, 2, 2, 3),
(33, 1, 33, 2, 2, 2),
(34, 1, 34, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `serviceID` int(5) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `serviceDescription` varchar(200) NOT NULL,
  `serviceFee` decimal(7,2) NOT NULL,
  `serviceImage` varchar(100) NOT NULL,
  `serviceAvailability` int(1) NOT NULL,
  `serviceStatus` int(1) NOT NULL,
  `serviceTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`serviceID`, `serviceName`, `serviceDescription`, `serviceFee`, `serviceImage`, `serviceAvailability`, `serviceStatus`, `serviceTypeID`) VALUES
(1, 'Wedding', 'wedding arrangement', '7000.00', 'No Image', 1, 1, 1),
(2, 'Party', 'party arrangement', '3000.00', 'No Image', 1, 1, 1),
(3, 'Funeral', 'funeral invites', '10000.00', 'No Image', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `serviceavailed_tbl`
--

CREATE TABLE `serviceavailed_tbl` (
  `serviceAvailedID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceavailed_tbl`
--

INSERT INTO `serviceavailed_tbl` (`serviceAvailedID`, `serviceID`, `reservationID`) VALUES
(1, 2, 20),
(2, 1, 21),
(3, 3, 21),
(4, 1, 24),
(5, 3, 24),
(6, 3, 25),
(7, 1, 26),
(8, 3, 26),
(9, 3, 27),
(10, 3, 28),
(11, 1, 29),
(12, 3, 29),
(13, 3, 30),
(14, 3, 32);

-- --------------------------------------------------------

--
-- Table structure for table `servicetype_tbl`
--

CREATE TABLE `servicetype_tbl` (
  `serviceTypeID` int(5) NOT NULL,
  `serviceTypeName` varchar(100) NOT NULL,
  `serviceTypeDescription` varchar(200) NOT NULL,
  `serviceTypeAvailability` int(1) NOT NULL,
  `serviceTypeStatus` int(1) NOT NULL,
  `serviceTypeImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicetype_tbl`
--

INSERT INTO `servicetype_tbl` (`serviceTypeID`, `serviceTypeName`, `serviceTypeDescription`, `serviceTypeAvailability`, `serviceTypeStatus`, `serviceTypeImage`) VALUES
(1, 'Flower', 'Arrangement', 1, 1, 'flower.jpeg'),
(2, 'Ballons', 'making', 1, 1, 'balloons.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `transactionID` int(5) NOT NULL,
  `transactionStatus` int(1) NOT NULL,
  `totalFee` decimal(7,2) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `dishID` (`dishID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`contactID`),
  ADD KEY `contact_tbl_ibfk_1_idx` (`customerID`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  ADD PRIMARY KEY (`dishID`),
  ADD KEY `dishTypeID` (`dishTypeID`);

--
-- Indexes for table `dishadditional_tbl`
--
ALTER TABLE `dishadditional_tbl`
  ADD PRIMARY KEY (`additionalID`),
  ADD KEY `dishID_idx` (`dishID`),
  ADD KEY `dishavailed_tbl_ibfk_1_idx` (`reservationID`),
  ADD KEY `dishadditional_tbl_ibfk_1_idx` (`reservationID`);

--
-- Indexes for table `dishavailed_tbl`
--
ALTER TABLE `dishavailed_tbl`
  ADD PRIMARY KEY (`dishAvailedID`),
  ADD KEY `dishID` (`dishID`),
  ADD KEY `dishavailed_tbl_ibfk_2_idx` (`reservationID`);

--
-- Indexes for table `dishtype_tbl`
--
ALTER TABLE `dishtype_tbl`
  ADD PRIMARY KEY (`dishTypeID`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `employeeTypeID` (`employeeTypeID`);

--
-- Indexes for table `employeeemployed_tbl`
--
ALTER TABLE `employeeemployed_tbl`
  ADD PRIMARY KEY (`employeeEmployedID`),
  ADD KEY `employeeID` (`employeeTypeID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `employeetype_tbl`
--
ALTER TABLE `employeetype_tbl`
  ADD PRIMARY KEY (`employeeTypeID`);

--
-- Indexes for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  ADD PRIMARY KEY (`equipmentID`),
  ADD KEY `equipmentTypeID` (`equipmentTypeID`);

--
-- Indexes for table `equipmentavailed_tbl`
--
ALTER TABLE `equipmentavailed_tbl`
  ADD PRIMARY KEY (`equipmentAvailedID`),
  ADD KEY `equipmentID` (`equipmentID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `equipmentlog_tbl`
--
ALTER TABLE `equipmentlog_tbl`
  ADD PRIMARY KEY (`equipmentLogID`),
  ADD KEY `equipmentID` (`equipmentID`);

--
-- Indexes for table `equipmenttype_tbl`
--
ALTER TABLE `equipmenttype_tbl`
  ADD PRIMARY KEY (`equipmentTypeID`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `eventTypeID` (`eventTypeID`),
  ADD KEY `locationID` (`locationID`),
  ADD KEY `event_tbl_ibfk_1_idx` (`customerID`);

--
-- Indexes for table `eventtype_tbl`
--
ALTER TABLE `eventtype_tbl`
  ADD PRIMARY KEY (`eventTypeID`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `package_tbl`
--
ALTER TABLE `package_tbl`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `packageavailed_tbl`
--
ALTER TABLE `packageavailed_tbl`
  ADD PRIMARY KEY (`packageAvailedID`),
  ADD KEY `packageID_idx` (`packageID`);

--
-- Indexes for table `packageinclusion_tbl`
--
ALTER TABLE `packageinclusion_tbl`
  ADD PRIMARY KEY (`packageInclusionID`),
  ADD KEY `dishTypeID` (`dishTypeID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `serviceID` (`serviceID`),
  ADD KEY `packageinclusion_tbl_ibfk_4_idx` (`equipmentID`),
  ADD KEY `packageinclusion_tbl_ibfk_5_idx` (`employeeTypeID`);

--
-- Indexes for table `paymentmode_tbl`
--
ALTER TABLE `paymentmode_tbl`
  ADD PRIMARY KEY (`paymentModeID`);

--
-- Indexes for table `paymentterm_tbl`
--
ALTER TABLE `paymentterm_tbl`
  ADD PRIMARY KEY (`paymentTermID`);

--
-- Indexes for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `paymentModeID` (`paymentModeID`),
  ADD KEY `paymentTermID` (`paymentTermID`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`serviceID`),
  ADD KEY `serviceTypeID` (`serviceTypeID`);

--
-- Indexes for table `serviceavailed_tbl`
--
ALTER TABLE `serviceavailed_tbl`
  ADD PRIMARY KEY (`serviceAvailedID`),
  ADD KEY `reservationID` (`reservationID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `servicetype_tbl`
--
ALTER TABLE `servicetype_tbl`
  ADD PRIMARY KEY (`serviceTypeID`);

--
-- Indexes for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cartID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  MODIFY `dishID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dishtype_tbl`
--
ALTER TABLE `dishtype_tbl`
  MODIFY `dishTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `employeeID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeetype_tbl`
--
ALTER TABLE `employeetype_tbl`
  MODIFY `employeeTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  MODIFY `equipmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipmentlog_tbl`
--
ALTER TABLE `equipmentlog_tbl`
  MODIFY `equipmentLogID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipmenttype_tbl`
--
ALTER TABLE `equipmenttype_tbl`
  MODIFY `equipmentTypeID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventtype_tbl`
--
ALTER TABLE `eventtype_tbl`
  MODIFY `eventTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `locationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `package_tbl`
--
ALTER TABLE `package_tbl`
  MODIFY `packageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `packageinclusion_tbl`
--
ALTER TABLE `packageinclusion_tbl`
  MODIFY `packageInclusionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `paymentmode_tbl`
--
ALTER TABLE `paymentmode_tbl`
  MODIFY `paymentModeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymentterm_tbl`
--
ALTER TABLE `paymentterm_tbl`
  MODIFY `paymentTermID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `serviceID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `servicetype_tbl`
--
ALTER TABLE `servicetype_tbl`
  MODIFY `serviceTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`),
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee_tbl` (`employeeID`),
  ADD CONSTRAINT `cart_tbl_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`);

--
-- Constraints for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD CONSTRAINT `contact_tbl_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  ADD CONSTRAINT `dish_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`);

--
-- Constraints for table `dishadditional_tbl`
--
ALTER TABLE `dishadditional_tbl`
  ADD CONSTRAINT `dishID` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dishadditional_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dishavailed_tbl`
--
ALTER TABLE `dishavailed_tbl`
  ADD CONSTRAINT `dishavailed_tbl_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`),
  ADD CONSTRAINT `dishavailed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD CONSTRAINT `employee_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`);

--
-- Constraints for table `employeeemployed_tbl`
--
ALTER TABLE `employeeemployed_tbl`
  ADD CONSTRAINT `employeeemployed_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employeeemployed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  ADD CONSTRAINT `equipment_tbl_ibfk_1` FOREIGN KEY (`equipmentTypeID`) REFERENCES `equipmenttype_tbl` (`equipmentTypeID`);

--
-- Constraints for table `equipmentavailed_tbl`
--
ALTER TABLE `equipmentavailed_tbl`
  ADD CONSTRAINT `equipmentavailed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `equipmentavailed_tbl_ibfk_3` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`);

--
-- Constraints for table `equipmentlog_tbl`
--
ALTER TABLE `equipmentlog_tbl`
  ADD CONSTRAINT `equipmentlog_tbl_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`);

--
-- Constraints for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `event_tbl_ibfk_2` FOREIGN KEY (`eventTypeID`) REFERENCES `eventtype_tbl` (`eventTypeID`),
  ADD CONSTRAINT `event_tbl_ibfk_3` FOREIGN KEY (`locationID`) REFERENCES `location_tbl` (`locationID`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `packageavailed_tbl`
--
ALTER TABLE `packageavailed_tbl`
  ADD CONSTRAINT `packageID` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`);

--
-- Constraints for table `packageinclusion_tbl`
--
ALTER TABLE `packageinclusion_tbl`
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`),
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`),
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`),
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_5` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_6` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`);

--
-- Constraints for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD CONSTRAINT `reservation_tbl_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event_tbl` (`eventID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_tbl_ibfk_3` FOREIGN KEY (`paymentModeID`) REFERENCES `paymentmode_tbl` (`paymentModeID`),
  ADD CONSTRAINT `reservation_tbl_ibfk_4` FOREIGN KEY (`paymentTermID`) REFERENCES `paymentterm_tbl` (`paymentTermID`);

--
-- Constraints for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD CONSTRAINT `service_tbl_ibfk_1` FOREIGN KEY (`serviceTypeID`) REFERENCES `servicetype_tbl` (`serviceTypeID`);

--
-- Constraints for table `serviceavailed_tbl`
--
ALTER TABLE `serviceavailed_tbl`
  ADD CONSTRAINT `serviceavailed_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `serviceavailed_tbl_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'mbs_db', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"coursetbl\",\"coursetypetbl\",\"course_package\",\"customertbl\",\"customer_course\",\"customer_employee\",\"customer_equipment\",\"customer_service\",\"employeetbl\",\"employeetypetbl\",\"employee_package\",\"equipmenttbl\",\"equipmenttypetbl\",\"eventtbl\",\"eventtypetbl\",\"imagetbl\",\"locationtbl\",\"packagetbl\",\"reservationtbl\",\"servicetbl\",\"servicetypetbl\",\"transactiontbl\",\"users\"],\"table_structure[]\":[\"coursetbl\",\"coursetypetbl\",\"course_package\",\"customertbl\",\"customer_course\",\"customer_employee\",\"customer_equipment\",\"customer_service\",\"employeetbl\",\"employeetypetbl\",\"employee_package\",\"equipmenttbl\",\"equipmenttypetbl\",\"eventtbl\",\"eventtypetbl\",\"imagetbl\",\"locationtbl\",\"packagetbl\",\"reservationtbl\",\"servicetbl\",\"servicetypetbl\",\"transactiontbl\",\"users\"],\"table_data[]\":[\"coursetbl\",\"coursetypetbl\",\"course_package\",\"customertbl\",\"customer_course\",\"customer_employee\",\"customer_equipment\",\"customer_service\",\"employeetbl\",\"employeetypetbl\",\"employee_package\",\"equipmenttbl\",\"equipmenttypetbl\",\"eventtbl\",\"eventtypetbl\",\"imagetbl\",\"locationtbl\",\"packagetbl\",\"reservationtbl\",\"servicetbl\",\"servicetypetbl\",\"transactiontbl\",\"users\"],\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"mcs_db\",\"table\":\"packageinclusion_tbl\"},{\"db\":\"mcs_db\",\"table\":\"dishtype_tbl\"},{\"db\":\"mcs_db\",\"table\":\"package_tbl\"},{\"db\":\"mcs_db\",\"table\":\"dish_tbl\"},{\"db\":\"mcs_db\",\"table\":\"equipmentavailed_tbl\"},{\"db\":\"mcs_db\",\"table\":\"equipmentlog_tbl\"},{\"db\":\"mcs_db\",\"table\":\"equipment_tbl\"},{\"db\":\"mcs_db\",\"table\":\"equipmenttype_tbl\"},{\"db\":\"mcs_db\",\"table\":\"employee_tbl\"},{\"db\":\"mcs_db\",\"table\":\"employeetype_tbl\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-07-03 08:38:18', '{\"collation_connection\":\"utf8_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
