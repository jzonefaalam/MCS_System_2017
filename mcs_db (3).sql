-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2017 at 06:39 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
(36, 'gfghjk', '09342344563', 36),
(37, 'Fucker McFuck', '09111111112', 37),
(38, 'MotherFucker', '1234567890', 38),
(39, 'rdyfhcgjgh', '23456789', 39),
(40, 'hgdg', '34534234', 40),
(41, 'jhhgcvh', '09342344563', 41),
(42, 'jiuyrfgh', '09342344563', 42),
(43, 'jhgfggh', '09342344563', 43),
(44, 'kjhgfdsd', '09342344563', 44);

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
(36, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '1997-12-31', 1, 1),
(37, 'Fuck McFuck', 'Fuck City', 'Fuck City', 'fucketyfuck@fuck.com', '09111111111', '1111111', '1111-11-11', 1, 1),
(38, 'MotherFucker', 'MotherFucker', 'MotherFucker', 'MotherFucker@yahoo.com', '1234567890', '1234567', '1984-01-01', 1, 1),
(39, 'iuty', 'ufogfgj', 'ufogfgj', 'dfgdfgdf@YAHOO.COM', '456789', '2345678', '1996-01-01', 1, 1),
(40, 'jhhv', 'hjvhjv', 'hjvhjv', '5678999999', '456789', 'jgkhjfgjk', '2018-01-01', 1, 1),
(41, 'asdasdas', 'gxgdydh', 'gxgdydh', 'mautegroup@gmail.com', '8789698', '98689896', '2017-12-31', 1, 1),
(42, 'asdasdas', 'gxgdydh', 'gxgdydh', 'dfgdfgdf@YAHOO.COM', '8789698', '98689896', '2017-12-31', 1, 1),
(43, 'gfhjfhjg', 'Mandaluyong', 'Mandaluyong', 'alksjd@yahoo.com', '8789698', '98689896', '2016-12-31', 1, 1),
(44, 'kjhfhghh', 'gxgdydh', 'gxgdydh', 'dfgdfgdf@YAHOO.COM', '8789698', '98689896', '2016-12-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dishadditional_tbl`
--

CREATE TABLE `dishadditional_tbl` (
  `additionalID` int(5) NOT NULL,
  `additionalServing` int(5) NOT NULL,
  `additionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishadditional_tbl`
--

INSERT INTO `dishadditional_tbl` (`additionalID`, `additionalServing`, `additionalNotes`, `reservationID`, `dishID`) VALUES
(1, 1, 'fuck', 1, 4),
(2, 8, 'd', 37, 7),
(3, 4, 'j', 38, 4);

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
(90, 4, 34),
(91, 6, 35),
(92, 5, 35),
(93, 4, 35),
(94, 6, 36),
(95, 5, 36),
(96, 4, 36),
(97, 4, 1),
(98, 6, 37),
(99, 5, 37),
(100, 4, 37),
(101, 6, 38),
(102, 5, 38),
(103, 4, 38),
(104, 7, 39),
(105, 5, 39),
(106, 4, 39),
(107, 7, 40),
(108, 5, 40),
(109, 4, 40);

-- --------------------------------------------------------

--
-- Table structure for table `dishtype_tbl`
--

CREATE TABLE `dishtype_tbl` (
  `dishTypeID` int(5) NOT NULL,
  `dishTypeName` varchar(150) DEFAULT NULL,
  `dishTypeStatus` int(1) DEFAULT NULL,
  `dishTypeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishtype_tbl`
--

INSERT INTO `dishtype_tbl` (`dishTypeID`, `dishTypeName`, `dishTypeStatus`, `dishTypeImage`) VALUES
(6, 'Vegetable', 1, 'cws.jpg'),
(7, 'Beef', 0, 'beef.jpg'),
(8, 'Pork', 1, 'pork.jpg'),
(9, 'Chicken', 1, 'fch.jpg'),
(10, 'Beef', 0, 'mju.jpe');

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
(6, 'Chopsuey', 'ff', '31.00', 'mv.jpg', 1, 0, 6),
(7, 'Lumpiang Sariwa', 'Something about lumpiang sariwa.', '250.00', 'lub.jpe', 1, 1, 6),
(8, 'Chopseuy', 'Something about chopseuy.', '300.00', 'ch.jpg', 1, 1, 6),
(9, 'Fried Chicken', 'Something about Fried Chicken', '300.00', 'fch.jpg', 1, 1, 9),
(10, 'asd', 'qweqwe', '123.00', 'ev.png', 1, 0, 6),
(11, 'asd', 'qweqwe', '123.00', 'ev.png', 1, 0, 6),
(12, 'asd', 'qweqwe', '123.00', 'ev.png', 1, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `employeeadditional_tbl`
--

CREATE TABLE `employeeadditional_tbl` (
  `employeeAdditionalID` int(5) NOT NULL,
  `employeeAdditionalQty` int(5) NOT NULL,
  `employeeAdditionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `employeeTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeadditional_tbl`
--

INSERT INTO `employeeadditional_tbl` (`employeeAdditionalID`, `employeeAdditionalQty`, `employeeAdditionalNotes`, `reservationID`, `employeeTypeID`) VALUES
(1, 1, 'fuck', 1, 1),
(2, 1, 'fuck', 1, 1),
(3, 5, 'b', 38, 1),
(4, 7, 'u', 39, 1);

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
(1, 'Clown', 'Clowning', '500.00', 'clowns.jpg', 1),
(2, 'Chef', 'None', '1200.00', 'No Image', 1),
(3, 'zxczx', 'None', '123.00', 'No Image', 0),
(4, 'MC', 'None', '750.00', 'No Image', 1),
(5, 'Party Planner', 'None', '850.00', 'No Image', 1);

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
-- Table structure for table `equipmentadditional_tbl`
--

CREATE TABLE `equipmentadditional_tbl` (
  `equipmentAdditionalID` int(5) NOT NULL,
  `equipmentAdditionalQty` int(5) NOT NULL,
  `equipmentAdditionalDesc` varchar(250) DEFAULT NULL,
  `equipmentAdditionalNotes` varchar(250) DEFAULT NULL,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipmentadditional_tbl`
--

INSERT INTO `equipmentadditional_tbl` (`equipmentAdditionalID`, `equipmentAdditionalQty`, `equipmentAdditionalDesc`, `equipmentAdditionalNotes`, `equipmentID`, `reservationID`) VALUES
(1, 8, 'j', 'd', 1, 37),
(2, 5, 'b', 'm', 2, 38);

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
  `equipmentTypeName` varchar(50) NOT NULL,
  `equipmentTypeStatus` int(11) NOT NULL,
  `equipmentTypeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipmenttype_tbl`
--

INSERT INTO `equipmenttype_tbl` (`equipmentTypeID`, `equipmentTypeName`, `equipmentTypeStatus`, `equipmentTypeImage`) VALUES
(1, 'Sound Mobile', 1, 'sound.jpg'),
(2, 'Table', 1, 'NO Image');

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

--
-- Dumping data for table `equipment_tbl`
--

INSERT INTO `equipment_tbl` (`equipmentID`, `equipmentName`, `equipmentDescription`, `equipmentRatePerHour`, `equipmentImage`, `equipmentAvailability`, `equipmentStatus`, `equipmentTypeID`) VALUES
(1, 'Dolby Speaker', 'large as Fuck', '5000.00', 'sound.jpg', 1, 1, 1),
(2, 'Wooden Table', 'wood', '500.00', 'zz.jpg', 1, 1, 2),
(3, 'Metal Table', 'metal', '600.00', 'no Image', 1, 1, 2);

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
(34, 'iugjg', '2017-07-31', '12:58:00', NULL, 1, 1, 36, 1, 1, '00:57:00'),
(60, 'sample123', '2017-08-21', '02:00:00', NULL, 123, 1, 25, 1, 1, '07:00:00'),
(61, 'Fuck', '2017-08-24', '07:00:00', 'Fuck', 77, 1, 37, NULL, 1, '19:00:00'),
(62, 'MotherFucker', '2017-12-31', '01:00:00', 'MotherFucker', 78, 1, 38, NULL, 1, '13:00:00'),
(63, 'jkkasd', '2017-12-31', '01:00:00', 'fuck', 8, 1, 39, NULL, 1, '23:59:00'),
(64, 'jhghghj', '2017-12-31', '12:59:00', 'fuck', 1, 1, 42, NULL, 1, '00:58:00'),
(65, 'iugjg', '2016-10-31', '12:59:00', 'fuck', 1, 1, 43, NULL, 1, '11:59:00'),
(66, 'kjcghfhg', '2017-12-31', '16:03:00', 'kjhgfdgf', 1, 1, 44, NULL, 1, '03:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `locationID` int(5) NOT NULL,
  `locationName` varchar(100) NOT NULL,
  `locationDescription` varchar(200) NOT NULL,
  `locationAddress` varchar(200) NOT NULL,
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

INSERT INTO `location_tbl` (`locationID`, `locationName`, `locationDescription`, `locationAddress`, `locationContactPerson`, `locationContactNumber`, `locationCapacity`, `locationFee`, `locationImage`, `locationAvailability`, `locationStatus`) VALUES
(1, 'PUP', 'Something about PUP.', 'Sta Mesa Manila', 'Jayson Joseph', '09213456789', 50000, '10000.00', 'bg1.jpg', 1, 1),
(2, 'asdasd', 'asd', 'asdsa', 'dasda', '23', 23, '23.00', 'No Image', 1, 0),
(3, 'Heaven\'s Food Park', 'Something about the food park.', 'Manila, Philippines', 'Ricardo Dalisay', '01234567890', 100, '25000.00', 'chairs.jpg', 1, 1);

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

--
-- Dumping data for table `packageinclusion_tbl`
--

INSERT INTO `packageinclusion_tbl` (`packageInclusionID`, `packageID`, `dishTypeID`, `serviceID`, `equipmentID`, `employeeTypeID`) VALUES
(1, 1, 6, NULL, NULL, NULL),
(2, 1, 7, NULL, NULL, NULL),
(3, 1, 8, NULL, NULL, NULL),
(4, 1, NULL, 1, NULL, NULL),
(5, 4, 8, NULL, NULL, NULL),
(6, 4, NULL, NULL, NULL, 2),
(7, 4, NULL, NULL, 2, NULL),
(8, 4, NULL, 1, NULL, NULL),
(9, 5, 6, NULL, NULL, NULL),
(10, 5, 8, NULL, NULL, NULL),
(11, 5, 9, NULL, NULL, NULL),
(12, 5, NULL, NULL, NULL, 1),
(13, 5, NULL, NULL, NULL, 2),
(14, 5, NULL, NULL, NULL, 4),
(15, 5, NULL, NULL, NULL, 5),
(16, 5, NULL, NULL, 1, NULL),
(17, 5, NULL, NULL, 2, NULL),
(18, 5, NULL, NULL, 3, NULL),
(19, 5, NULL, 1, NULL, NULL),
(20, 5, NULL, 2, NULL, NULL),
(21, 5, NULL, 3, NULL, NULL),
(22, 5, NULL, 5, NULL, NULL),
(23, 6, 6, NULL, NULL, NULL),
(24, 6, 8, NULL, NULL, NULL),
(25, 6, 9, NULL, NULL, NULL),
(26, 6, NULL, NULL, NULL, 2),
(27, 6, NULL, NULL, NULL, 4),
(28, 6, NULL, NULL, NULL, 5),
(29, 6, NULL, NULL, 1, NULL),
(30, 6, NULL, NULL, 2, NULL),
(31, 6, NULL, NULL, 3, NULL),
(32, 6, NULL, 1, NULL, NULL),
(33, 6, NULL, 2, NULL, NULL),
(34, 6, NULL, 3, NULL, NULL),
(35, 6, NULL, 5, NULL, NULL);

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
(1, 'Breakfast', 'very goodo', '700.00', 'Desert.jpg', 1, 0),
(2, 'Lunch', 'not so goodo', '800.00', 'Penguins.jpg', 1, 1),
(3, 'Dinner', 'excelente', '2000.00', 'Lighthouse.jpg', 1, 1),
(4, 'Four Main Course', 'Something about this package.', '10000.00', 'logo.png', 1, 1),
(5, 'Five Main Course', 'Something about this package.', '11111.00', 'inv.jpg', 1, 1),
(6, 'Breakfast', 'Something about this package.', '25000.00', 'balloons.jpg', 1, 1);

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
(2, 'Half Payment', 'ti-heart-broken');

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
  `packageID` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_tbl`
--

INSERT INTO `reservation_tbl` (`reservationID`, `reservationStatus`, `eventID`, `paymentModeID`, `paymentTermID`, `packageID`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(2, 1, 2, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(3, 1, 3, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(4, 1, 4, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(5, 1, 5, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(6, 1, 6, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(7, 1, 7, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(8, 1, 8, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(9, 1, 9, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(10, 1, 10, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(11, 1, 11, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(12, 1, 12, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(13, 1, 13, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(14, 1, 14, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(15, 1, 15, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(16, 1, 16, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(17, 1, 17, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(18, 1, 18, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(19, 1, 19, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(20, 1, 20, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(21, 1, 21, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(22, 1, 22, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(23, 1, 23, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(24, 1, 24, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(25, 1, 25, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(26, 1, 26, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(27, 1, 27, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(28, 1, 28, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(29, 1, 29, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(30, 1, 30, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(31, 1, 31, 2, 2, 1, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(32, 1, 32, 2, 2, 3, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(33, 1, 33, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(34, 1, 34, 2, 2, 2, '2017-08-21 05:47:52', '0000-00-00 00:00:00'),
(35, 1, 61, 2, 1, 1, '2017-08-23 02:34:09', '2017-08-23 02:34:09'),
(36, 1, 62, 2, 2, 1, '2017-08-23 03:08:47', '2017-08-23 03:08:47'),
(37, 1, 63, 1, 2, 1, '2017-08-23 03:43:29', '2017-08-23 03:43:29'),
(38, 1, 64, 2, 2, 1, '2017-08-23 04:00:53', '2017-08-23 04:00:53'),
(39, 1, 65, 1, 2, 1, '2017-08-23 04:02:13', '2017-08-23 04:02:13'),
(40, 1, 66, 2, 2, 1, '2017-08-23 04:03:32', '2017-08-23 04:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `serviceadditional_tbl`
--

CREATE TABLE `serviceadditional_tbl` (
  `serviceAdditionalID` int(5) NOT NULL,
  `serviceAdditionalQty` int(5) NOT NULL,
  `serviceAdditionalDesc` varchar(250) DEFAULT NULL,
  `serviceAdditionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serviceadditional_tbl`
--

INSERT INTO `serviceadditional_tbl` (`serviceAdditionalID`, `serviceAdditionalQty`, `serviceAdditionalDesc`, `serviceAdditionalNotes`, `reservationID`, `serviceID`) VALUES
(1, 1, '1', '1', 1, 1),
(2, 5, 's', 's', 38, 3),
(3, 7, 'r', 'k', 40, 1);

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
(14, 3, 32),
(15, 1, 35),
(16, 1, 36),
(17, 1, 37),
(18, 1, 38),
(19, 1, 39),
(20, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `servicetype_tbl`
--

CREATE TABLE `servicetype_tbl` (
  `serviceTypeID` int(5) NOT NULL,
  `serviceTypeName` varchar(100) NOT NULL,
  `serviceTypeDescription` varchar(200) DEFAULT NULL,
  `serviceTypeAvailability` int(1) NOT NULL,
  `serviceTypeStatus` int(1) NOT NULL,
  `serviceTypeImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicetype_tbl`
--

INSERT INTO `servicetype_tbl` (`serviceTypeID`, `serviceTypeName`, `serviceTypeDescription`, `serviceTypeAvailability`, `serviceTypeStatus`, `serviceTypeImage`) VALUES
(1, 'Flowers', 'Arrangement', 1, 1, 'flower.jpeg'),
(2, 'Ballons', 'making', 1, 1, 'balloons.png'),
(3, 'zxczxc', NULL, 1, 0, NULL);

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
(1, 'Wedding', 'wedding arrangement', '7000.00', 'flower.jpeg', 1, 1, 1),
(2, 'Party', 'party arrangement', '3000.00', 'balloons.jpg', 1, 1, 1),
(3, 'Baby Shower', 'Baby shower invites', '10000.00', 'inv.jpg', 1, 1, 2),
(4, 'ZXC', 'ZXCZXCZX', '12321.00', '1', 1, 0, 2),
(5, 'Flower Arrangement A', 'Something about this service.', '125.00', 'flower.jpeg', 1, 1, 1);

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
-- Indexes for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  ADD PRIMARY KEY (`dishID`),
  ADD KEY `dishTypeID` (`dishTypeID`);

--
-- Indexes for table `employeeadditional_tbl`
--
ALTER TABLE `employeeadditional_tbl`
  ADD PRIMARY KEY (`employeeAdditionalID`),
  ADD KEY `employeeTypeID_ema_idx` (`employeeTypeID`),
  ADD KEY `reservationID_ema_idx` (`reservationID`);

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
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `employeeTypeID` (`employeeTypeID`);

--
-- Indexes for table `equipmentadditional_tbl`
--
ALTER TABLE `equipmentadditional_tbl`
  ADD PRIMARY KEY (`equipmentAdditionalID`),
  ADD KEY `equipmentID_idx` (`equipmentID`),
  ADD KEY `reservationID_idx` (`reservationID`);

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
-- Indexes for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  ADD PRIMARY KEY (`equipmentID`),
  ADD KEY `equipmentTypeID` (`equipmentTypeID`);

--
-- Indexes for table `eventtype_tbl`
--
ALTER TABLE `eventtype_tbl`
  ADD PRIMARY KEY (`eventTypeID`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `eventTypeID` (`eventTypeID`),
  ADD KEY `locationID` (`locationID`),
  ADD KEY `event_tbl_ibfk_1_idx` (`customerID`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`locationID`);

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
-- Indexes for table `package_tbl`
--
ALTER TABLE `package_tbl`
  ADD PRIMARY KEY (`packageID`);

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
-- Indexes for table `serviceadditional_tbl`
--
ALTER TABLE `serviceadditional_tbl`
  ADD PRIMARY KEY (`serviceAdditionalID`),
  ADD KEY `serviceID_idx` (`serviceID`),
  ADD KEY `reservationID_idx` (`reservationID`);

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
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`serviceID`),
  ADD KEY `serviceTypeID` (`serviceTypeID`);

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
-- AUTO_INCREMENT for table `dishtype_tbl`
--
ALTER TABLE `dishtype_tbl`
  MODIFY `dishTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  MODIFY `dishID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `employeetype_tbl`
--
ALTER TABLE `employeetype_tbl`
  MODIFY `employeeTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `employeeID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipmentlog_tbl`
--
ALTER TABLE `equipmentlog_tbl`
  MODIFY `equipmentLogID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipmenttype_tbl`
--
ALTER TABLE `equipmenttype_tbl`
  MODIFY `equipmentTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  MODIFY `equipmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `eventtype_tbl`
--
ALTER TABLE `eventtype_tbl`
  MODIFY `eventTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `locationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `packageinclusion_tbl`
--
ALTER TABLE `packageinclusion_tbl`
  MODIFY `packageInclusionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `package_tbl`
--
ALTER TABLE `package_tbl`
  MODIFY `packageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- AUTO_INCREMENT for table `servicetype_tbl`
--
ALTER TABLE `servicetype_tbl`
  MODIFY `serviceTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `serviceID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- Constraints for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  ADD CONSTRAINT `dish_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`);

--
-- Constraints for table `employeeadditional_tbl`
--
ALTER TABLE `employeeadditional_tbl`
  ADD CONSTRAINT `employeeTypeID_ema` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservationID_ema` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeeemployed_tbl`
--
ALTER TABLE `employeeemployed_tbl`
  ADD CONSTRAINT `employeeemployed_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employeeemployed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD CONSTRAINT `employee_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`);

--
-- Constraints for table `equipmentadditional_tbl`
--
ALTER TABLE `equipmentadditional_tbl`
  ADD CONSTRAINT `equipmentID_ea` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservationID_ea` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  ADD CONSTRAINT `equipment_tbl_ibfk_1` FOREIGN KEY (`equipmentTypeID`) REFERENCES `equipmenttype_tbl` (`equipmentTypeID`);

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
-- Constraints for table `serviceadditional_tbl`
--
ALTER TABLE `serviceadditional_tbl`
  ADD CONSTRAINT `reservationID` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `serviceID` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `serviceavailed_tbl`
--
ALTER TABLE `serviceavailed_tbl`
  ADD CONSTRAINT `serviceavailed_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `serviceavailed_tbl_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD CONSTRAINT `service_tbl_ibfk_1` FOREIGN KEY (`serviceTypeID`) REFERENCES `servicetype_tbl` (`serviceTypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
