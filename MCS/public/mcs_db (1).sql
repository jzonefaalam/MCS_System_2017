-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: mcs_db
-- ------------------------------------------------------
-- Server version	5.6.26-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart_tbl`
--

DROP TABLE IF EXISTS `cart_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_tbl` (
  `cartID` int(5) NOT NULL AUTO_INCREMENT,
  `dishID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL,
  `employeeID` int(5) NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `dishID` (`dishID`),
  KEY `employeeID` (`employeeID`),
  KEY `serviceID` (`serviceID`),
  CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`),
  CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee_tbl` (`employeeID`),
  CONSTRAINT `cart_tbl_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_tbl`
--

LOCK TABLES `cart_tbl` WRITE;
/*!40000 ALTER TABLE `cart_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_tbl`
--

DROP TABLE IF EXISTS `contact_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_tbl` (
  `contactID` int(5) NOT NULL AUTO_INCREMENT,
  `contactName` varchar(150) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `customerID` int(5) NOT NULL,
  PRIMARY KEY (`contactID`),
  KEY `customerID_idx` (`customerID`),
  CONSTRAINT `customerID` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_tbl`
--

LOCK TABLES `contact_tbl` WRITE;
/*!40000 ALTER TABLE `contact_tbl` DISABLE KEYS */;
INSERT INTO `contact_tbl` VALUES (1,'Jaayson DingBa','09223456543',7);
/*!40000 ALTER TABLE `contact_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_tbl`
--

DROP TABLE IF EXISTS `customer_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_tbl` (
  `customerID` int(5) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) NOT NULL,
  `homeAddress` varchar(150) NOT NULL,
  `billingAddress` varchar(150) NOT NULL,
  `emailAddress` varchar(150) NOT NULL,
  `cellNum` varchar(13) NOT NULL,
  `telNum` varchar(10) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `customerAvailability` int(1) NOT NULL,
  `customerStatus` int(1) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_tbl`
--

LOCK TABLES `customer_tbl` WRITE;
/*!40000 ALTER TABLE `customer_tbl` DISABLE KEYS */;
INSERT INTO `customer_tbl` VALUES (1,'Maute','Marawi','Marawi','mautegroup@gmail.com','09123456789',NULL,'1995-01-01',1,1),(7,'Kim De Leon','Mandaluyong','Makati','dfgdfgdf@YAHOO.COM','09877897890',NULL,'1200-12-12',1,1),(8,'Kim De Leon','Mandaluyong','Makati','dfgdfgdf@YAHOO.COM','09877897890',NULL,'1200-12-12',1,1);
/*!40000 ALTER TABLE `customer_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dish_tbl`
--

DROP TABLE IF EXISTS `dish_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dish_tbl` (
  `dishID` int(5) NOT NULL AUTO_INCREMENT,
  `dishName` varchar(100) NOT NULL,
  `dishDescription` varchar(200) NOT NULL,
  `dishCost` decimal(7,2) NOT NULL,
  `dishImage` varchar(100) NOT NULL,
  `dishAvailability` int(1) NOT NULL,
  `dishStatus` int(1) NOT NULL,
  `dishTypeID` int(5) NOT NULL,
  PRIMARY KEY (`dishID`),
  KEY `dishTypeID` (`dishTypeID`),
  CONSTRAINT `dish_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dish_tbl`
--

LOCK TABLES `dish_tbl` WRITE;
/*!40000 ALTER TABLE `dish_tbl` DISABLE KEYS */;
INSERT INTO `dish_tbl` VALUES (4,'Porkchop','qwe',178.00,'bp.jpg',1,1,8),(5,'Beef Broccoli','asd',123.00,'bwb.jpg',1,1,7),(6,'Chopsuey','ff',31.00,'mv.jpg',1,1,6),(7,'Lumpiang Sariwa','yum',20.00,'lub.jpe',1,1,6);
/*!40000 ALTER TABLE `dish_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishadditional_tbl`
--

DROP TABLE IF EXISTS `dishadditional_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishadditional_tbl` (
  `additionalID` int(5) NOT NULL AUTO_INCREMENT,
  `additionalServing` varchar(100) NOT NULL,
  `additionalNotes` varchar(150) NOT NULL,
  `reservationID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL,
  PRIMARY KEY (`additionalID`),
  KEY `reservationID` (`reservationID`),
  KEY `dishID_idx` (`dishID`),
  CONSTRAINT `dishID` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `dishadditional_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishadditional_tbl`
--

LOCK TABLES `dishadditional_tbl` WRITE;
/*!40000 ALTER TABLE `dishadditional_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `dishadditional_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishavailed_tbl`
--

DROP TABLE IF EXISTS `dishavailed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishavailed_tbl` (
  `dishAvailedID` int(5) NOT NULL AUTO_INCREMENT,
  `dishID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`dishAvailedID`),
  KEY `dishID` (`dishID`),
  KEY `dishavailed_tbl_ibfk_3_idx` (`reservationID`),
  CONSTRAINT `dishavailed_tbl_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`),
  CONSTRAINT `dishavailed_tbl_ibfk_3` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishavailed_tbl`
--

LOCK TABLES `dishavailed_tbl` WRITE;
/*!40000 ALTER TABLE `dishavailed_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `dishavailed_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishtype_tbl`
--

DROP TABLE IF EXISTS `dishtype_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishtype_tbl` (
  `dishTypeID` int(5) NOT NULL AUTO_INCREMENT,
  `dishTypeName` varchar(150) DEFAULT NULL,
  `dishTypeDescription` varchar(200) DEFAULT NULL,
  `dishTypeStatus` int(1) DEFAULT NULL,
  `dishTypeImage` varchar(50) NOT NULL,
  PRIMARY KEY (`dishTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishtype_tbl`
--

LOCK TABLES `dishtype_tbl` WRITE;
/*!40000 ALTER TABLE `dishtype_tbl` DISABLE KEYS */;
INSERT INTO `dishtype_tbl` VALUES (6,'Vegetable','as',1,'vegy.jpg'),(7,'Beef','asd',1,'beef.jpg'),(8,'Pork','asdd',1,'pork.jpg');
/*!40000 ALTER TABLE `dishtype_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_tbl`
--

DROP TABLE IF EXISTS `employee_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_tbl` (
  `employeeID` int(5) NOT NULL AUTO_INCREMENT,
  `employeeName` varchar(100) NOT NULL,
  `employeeImage` varchar(100) NOT NULL,
  `employeeAvailability` int(1) NOT NULL,
  `employeeStatus` int(1) NOT NULL,
  `employeeTypeID` int(5) NOT NULL,
  PRIMARY KEY (`employeeID`),
  KEY `employeeTypeID` (`employeeTypeID`),
  CONSTRAINT `employee_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_tbl`
--

LOCK TABLES `employee_tbl` WRITE;
/*!40000 ALTER TABLE `employee_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeeemployed_tbl`
--

DROP TABLE IF EXISTS `employeeemployed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeeemployed_tbl` (
  `employeeEmployedID` int(5) NOT NULL AUTO_INCREMENT,
  `employeeID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`employeeEmployedID`),
  KEY `employeeID` (`employeeID`),
  KEY `reservationID` (`reservationID`),
  CONSTRAINT `employeeemployed_tbl_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee_tbl` (`employeeID`),
  CONSTRAINT `employeeemployed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeeemployed_tbl`
--

LOCK TABLES `employeeemployed_tbl` WRITE;
/*!40000 ALTER TABLE `employeeemployed_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeeemployed_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeetype_tbl`
--

DROP TABLE IF EXISTS `employeetype_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeetype_tbl` (
  `employeeTypeID` int(5) NOT NULL AUTO_INCREMENT,
  `employeeTypeName` varchar(100) NOT NULL,
  `employeeTypeDescription` varchar(200) NOT NULL,
  `employeeRatePerHour` decimal(7,2) NOT NULL,
  `employeeTypeImage` varchar(100) NOT NULL,
  `employeeTypeStatus` int(1) NOT NULL,
  PRIMARY KEY (`employeeTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetype_tbl`
--

LOCK TABLES `employeetype_tbl` WRITE;
/*!40000 ALTER TABLE `employeetype_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeetype_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_tbl`
--

DROP TABLE IF EXISTS `equipment_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_tbl` (
  `equipmentID` int(5) NOT NULL AUTO_INCREMENT,
  `equipmentName` varchar(100) NOT NULL,
  `equipmentDescription` varchar(200) NOT NULL,
  `equipmentUnit` int(5) NOT NULL,
  `equipmentRatePerHour` decimal(7,2) NOT NULL,
  `equipmentImage` varchar(100) NOT NULL,
  `equipmentAvailability` int(1) NOT NULL,
  `equipmentStatus` int(1) NOT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_tbl`
--

LOCK TABLES `equipment_tbl` WRITE;
/*!40000 ALTER TABLE `equipment_tbl` DISABLE KEYS */;
INSERT INTO `equipment_tbl` VALUES (1,'Sound Mobile','very mobile',3,1000.00,'sound.jpg',1,1);
/*!40000 ALTER TABLE `equipment_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipmentavailed_tbl`
--

DROP TABLE IF EXISTS `equipmentavailed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipmentavailed_tbl` (
  `equipmentAvailedID` int(5) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`equipmentAvailedID`),
  KEY `equipmentID` (`equipmentID`),
  KEY `reservationID` (`reservationID`),
  CONSTRAINT `equipmentavailed_tbl_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`),
  CONSTRAINT `equipmentavailed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipmentavailed_tbl`
--

LOCK TABLES `equipmentavailed_tbl` WRITE;
/*!40000 ALTER TABLE `equipmentavailed_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipmentavailed_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_tbl`
--

DROP TABLE IF EXISTS `event_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_tbl` (
  `eventID` int(5) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(100) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `eventLocation` varchar(150) DEFAULT NULL,
  `guestCount` int(5) NOT NULL,
  `eventStatus` int(1) NOT NULL,
  `customerID` int(5) NOT NULL,
  `locationID` int(5) DEFAULT NULL,
  `eventTypeID` int(5) NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `customerID` (`customerID`),
  KEY `eventTypeID` (`eventTypeID`),
  KEY `locationID` (`locationID`),
  CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`),
  CONSTRAINT `event_tbl_ibfk_2` FOREIGN KEY (`eventTypeID`) REFERENCES `eventtype_tbl` (`eventTypeID`),
  CONSTRAINT `event_tbl_ibfk_3` FOREIGN KEY (`locationID`) REFERENCES `location_tbl` (`locationID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_tbl`
--

LOCK TABLES `event_tbl` WRITE;
/*!40000 ALTER TABLE `event_tbl` DISABLE KEYS */;
INSERT INTO `event_tbl` VALUES (3,'Maute','2017-07-27','02:00:00','Marawi',45,1,1,NULL,1),(6,'jk','2201-12-23','04:00:00',NULL,324,1,7,1,1);
/*!40000 ALTER TABLE `event_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventtype_tbl`
--

DROP TABLE IF EXISTS `eventtype_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventtype_tbl` (
  `eventTypeID` int(5) NOT NULL AUTO_INCREMENT,
  `eventTypeName` varchar(100) NOT NULL,
  `eventTypeDescription` varchar(200) NOT NULL,
  `eventTypeAvailability` int(1) NOT NULL,
  `eventTypeStatus` int(1) NOT NULL,
  PRIMARY KEY (`eventTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventtype_tbl`
--

LOCK TABLES `eventtype_tbl` WRITE;
/*!40000 ALTER TABLE `eventtype_tbl` DISABLE KEYS */;
INSERT INTO `eventtype_tbl` VALUES (1,'Birthday','',1,1);
/*!40000 ALTER TABLE `eventtype_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location_tbl`
--

DROP TABLE IF EXISTS `location_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location_tbl` (
  `locationID` int(5) NOT NULL AUTO_INCREMENT,
  `locationName` varchar(100) NOT NULL,
  `locationDescription` varchar(200) NOT NULL,
  `locationContactPerson` varchar(100) NOT NULL,
  `locationContactNumber` varchar(13) NOT NULL,
  `locationCapacity` int(7) NOT NULL,
  `locationFee` decimal(7,2) NOT NULL,
  `locationImage` varchar(100) NOT NULL,
  `locationAvailability` int(1) NOT NULL,
  `locationStatus` int(1) NOT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location_tbl`
--

LOCK TABLES `location_tbl` WRITE;
/*!40000 ALTER TABLE `location_tbl` DISABLE KEYS */;
INSERT INTO `location_tbl` VALUES (1,'PUP','wow','Jayson Joseph','09213456789',50000,10000.00,'No Image',1,1);
/*!40000 ALTER TABLE `location_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_tbl`
--

DROP TABLE IF EXISTS `package_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_tbl` (
  `packageID` int(5) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(150) NOT NULL,
  `packageDescription` varchar(200) NOT NULL,
  `packageCost` decimal(7,2) NOT NULL,
  `packageImage` varchar(100) NOT NULL,
  `packageAvailability` int(1) NOT NULL,
  `packageStatus` int(1) NOT NULL,
  PRIMARY KEY (`packageID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_tbl`
--

LOCK TABLES `package_tbl` WRITE;
/*!40000 ALTER TABLE `package_tbl` DISABLE KEYS */;
INSERT INTO `package_tbl` VALUES (1,'Breakfast','very goodo',700.00,'Desert.jpg',1,1),(2,'Lunch','not so goodo',800.00,'Penguins.jpg',1,1),(3,'Dinner','excelente',2000.00,'Lighthouse.jpg',1,1);
/*!40000 ALTER TABLE `package_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packageavailed_tbl`
--

DROP TABLE IF EXISTS `packageavailed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packageavailed_tbl` (
  `packageAvailedID` int(5) NOT NULL,
  `packageID` int(5) NOT NULL,
  PRIMARY KEY (`packageAvailedID`),
  KEY `packageID_idx` (`packageID`),
  CONSTRAINT `packageID` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packageavailed_tbl`
--

LOCK TABLES `packageavailed_tbl` WRITE;
/*!40000 ALTER TABLE `packageavailed_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `packageavailed_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packageinclusion_tbl`
--

DROP TABLE IF EXISTS `packageinclusion_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packageinclusion_tbl` (
  `packageInclusionID` int(5) NOT NULL AUTO_INCREMENT,
  `packageID` int(5) NOT NULL,
  `dishTypeID` int(5) DEFAULT NULL,
  `serviceID` int(5) DEFAULT NULL,
  `equipmentID` int(5) DEFAULT NULL,
  `employeeID` int(5) DEFAULT NULL,
  PRIMARY KEY (`packageInclusionID`),
  KEY `dishTypeID` (`dishTypeID`),
  KEY `packageID` (`packageID`),
  KEY `serviceID` (`serviceID`),
  KEY `packageinclusion_tbl_ibfk_4_idx` (`equipmentID`),
  KEY `packageinclusion_tbl_ibfk_5_idx` (`employeeID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_4` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_5` FOREIGN KEY (`employeeID`) REFERENCES `employee_tbl` (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packageinclusion_tbl`
--

LOCK TABLES `packageinclusion_tbl` WRITE;
/*!40000 ALTER TABLE `packageinclusion_tbl` DISABLE KEYS */;
INSERT INTO `packageinclusion_tbl` VALUES (1,1,6,NULL,NULL,NULL),(2,1,7,NULL,NULL,NULL),(3,1,8,NULL,NULL,NULL),(4,2,8,NULL,NULL,NULL),(5,2,7,NULL,NULL,NULL),(6,2,8,NULL,NULL,NULL),(7,3,7,NULL,NULL,NULL),(8,3,7,NULL,NULL,NULL),(9,3,7,NULL,NULL,NULL);
/*!40000 ALTER TABLE `packageinclusion_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentmode_tbl`
--

DROP TABLE IF EXISTS `paymentmode_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentmode_tbl` (
  `paymentModeID` int(5) NOT NULL AUTO_INCREMENT,
  `paymentModeName` varchar(50) NOT NULL,
  PRIMARY KEY (`paymentModeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmode_tbl`
--

LOCK TABLES `paymentmode_tbl` WRITE;
/*!40000 ALTER TABLE `paymentmode_tbl` DISABLE KEYS */;
INSERT INTO `paymentmode_tbl` VALUES (1,'Cash'),(2,'Debit');
/*!40000 ALTER TABLE `paymentmode_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentterm_tbl`
--

DROP TABLE IF EXISTS `paymentterm_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentterm_tbl` (
  `paymentTermID` int(5) NOT NULL AUTO_INCREMENT,
  `paymentTermName` varchar(100) NOT NULL,
  PRIMARY KEY (`paymentTermID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentterm_tbl`
--

LOCK TABLES `paymentterm_tbl` WRITE;
/*!40000 ALTER TABLE `paymentterm_tbl` DISABLE KEYS */;
INSERT INTO `paymentterm_tbl` VALUES (1,'Full Payment'),(2,'Half Payment');
/*!40000 ALTER TABLE `paymentterm_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_tbl`
--

DROP TABLE IF EXISTS `reservation_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_tbl` (
  `reservationID` int(5) NOT NULL AUTO_INCREMENT,
  `reservationStatus` int(1) NOT NULL,
  `eventID` int(5) NOT NULL,
  `paymentModeID` int(5) NOT NULL,
  `paymentTermID` int(5) NOT NULL,
  `packageID` int(5) NOT NULL,
  PRIMARY KEY (`reservationID`),
  KEY `eventID` (`eventID`),
  KEY `packageID` (`packageID`),
  KEY `paymentModeID` (`paymentModeID`),
  KEY `paymentTermID` (`paymentTermID`),
  CONSTRAINT `reservation_tbl_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event_tbl` (`eventID`),
  CONSTRAINT `reservation_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`),
  CONSTRAINT `reservation_tbl_ibfk_3` FOREIGN KEY (`paymentModeID`) REFERENCES `paymentmode_tbl` (`paymentModeID`),
  CONSTRAINT `reservation_tbl_ibfk_4` FOREIGN KEY (`paymentTermID`) REFERENCES `paymentterm_tbl` (`paymentTermID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_tbl`
--

LOCK TABLES `reservation_tbl` WRITE;
/*!40000 ALTER TABLE `reservation_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_tbl`
--

DROP TABLE IF EXISTS `service_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_tbl` (
  `serviceID` int(5) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(100) NOT NULL,
  `serviceDescription` varchar(200) NOT NULL,
  `serviceFee` decimal(7,2) NOT NULL,
  `serviceImage` varchar(100) NOT NULL,
  `serviceAvailability` int(1) NOT NULL,
  `serviceStatus` int(1) NOT NULL,
  `serviceTypeID` int(5) NOT NULL,
  PRIMARY KEY (`serviceID`),
  KEY `serviceTypeID` (`serviceTypeID`),
  CONSTRAINT `service_tbl_ibfk_1` FOREIGN KEY (`serviceTypeID`) REFERENCES `servicetype_tbl` (`serviceTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_tbl`
--

LOCK TABLES `service_tbl` WRITE;
/*!40000 ALTER TABLE `service_tbl` DISABLE KEYS */;
INSERT INTO `service_tbl` VALUES (1,'Wedding','wedding arrangement',7000.00,'No Image',1,1,1),(2,'Party','party arrangement',3000.00,'No Image',1,1,1),(3,'Funeral','funeral invites',10000.00,'No Image',1,1,2);
/*!40000 ALTER TABLE `service_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviceavailed_tbl`
--

DROP TABLE IF EXISTS `serviceavailed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviceavailed_tbl` (
  `serviceAvailedID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`serviceAvailedID`),
  KEY `reservationID` (`reservationID`),
  KEY `serviceID` (`serviceID`),
  CONSTRAINT `serviceavailed_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`),
  CONSTRAINT `serviceavailed_tbl_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceavailed_tbl`
--

LOCK TABLES `serviceavailed_tbl` WRITE;
/*!40000 ALTER TABLE `serviceavailed_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `serviceavailed_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicetype_tbl`
--

DROP TABLE IF EXISTS `servicetype_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicetype_tbl` (
  `serviceTypeID` int(5) NOT NULL AUTO_INCREMENT,
  `serviceTypeName` varchar(100) NOT NULL,
  `serviceTypeDescription` varchar(200) NOT NULL,
  `serviceTypeAvailability` int(1) NOT NULL,
  `serviceTypeStatus` int(1) NOT NULL,
  `serviceTypeImage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`serviceTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetype_tbl`
--

LOCK TABLES `servicetype_tbl` WRITE;
/*!40000 ALTER TABLE `servicetype_tbl` DISABLE KEYS */;
INSERT INTO `servicetype_tbl` VALUES (1,'Flower','Arrangement',1,1,'flower.jpeg'),(2,'Ballons','making',1,1,'balloons.png');
/*!40000 ALTER TABLE `servicetype_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_tbl`
--

DROP TABLE IF EXISTS `transaction_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_tbl` (
  `transactionID` int(5) NOT NULL,
  `transactionStatus` int(1) NOT NULL,
  `totalFee` decimal(7,2) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_tbl`
--

LOCK TABLES `transaction_tbl` WRITE;
/*!40000 ALTER TABLE `transaction_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-04 16:48:47
