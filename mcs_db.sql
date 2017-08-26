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
  `contactID` int(5) NOT NULL,
  `contactName` varchar(150) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `customerID` int(5) NOT NULL,
  PRIMARY KEY (`contactID`),
  KEY `contact_tbl_ibfk_1_idx` (`customerID`),
  CONSTRAINT `contact_tbl_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_tbl`
--

LOCK TABLES `contact_tbl` WRITE;
/*!40000 ALTER TABLE `contact_tbl` DISABLE KEYS */;
INSERT INTO `contact_tbl` VALUES (1,'dsfsd','09342344563',1),(2,'jhgujfh','7657869',2),(3,'kjhgfhj','09342344563',3),(4,'asdasdasd','09342344563',4),(5,'jgfhfhj','09342344563',5),(6,'iuhgfj','09223456543',6),(7,'jhfh','09342344563',7),(8,'asdasd','09342344563',8),(9,'asdasd','09342344563',9),(10,'sdas','09342344563',10),(11,'asdas','09342344563',11),(12,'jgfhhjh','09342344563',12),(13,'hgjghj','09342344563',13),(14,'hghg','09342344563',14),(15,'jbjh','09342344563',15),(16,'kufjhfv','09342344563',16),(17,'jkhfhjhjg','09342344563',17),(18,'jhj','09342344563',18),(19,'hjjgh','09342344563',19),(20,'iougjhj','09342344563',20),(21,'sddf','09342344563',21),(22,'lkjjlknjk','09342344563',22),(23,'kjbkhbjn','09342344563',23),(24,'dsfsdfds','09342344563',24),(25,'nkn','09342344563',25),(26,'nkbhghb','09342344563',26),(27,'mbvjhfhj','09342344563',27),(28,'jvhb','09342344563',28),(29,'jhkhjkh','09342344563',29),(30,'jkhj','80689686',30),(31,'gfdcvh','09342344563',31),(32,'cds','09342344563',32),(33,'ddddd','09342344563',33),(34,'kjhhjk','09342344563',34),(35,'hghj','09342344563',35),(36,'gfghjk','09342344563',36),(37,'Fucker McFuck','09111111112',37),(38,'MotherFucker','1234567890',38),(39,'rdyfhcgjgh','23456789',39),(40,'hgdg','34534234',40),(41,'jhhgcvh','09342344563',41),(42,'jiuyrfgh','09342344563',42),(43,'jhgfggh','09342344563',43),(44,'kjhgfdsd','09342344563',44);
/*!40000 ALTER TABLE `contact_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_tbl`
--

DROP TABLE IF EXISTS `customer_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `customerStatus` int(1) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_tbl`
--

LOCK TABLES `customer_tbl` WRITE;
/*!40000 ALTER TABLE `customer_tbl` DISABLE KEYS */;
INSERT INTO `customer_tbl` VALUES (1,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(2,'Maute','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1200-12-12',1,1),(3,'Maute','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(4,'asdasdas','Mandaluyong','sdfsdfsd','mautegroup@gmail.com','8789698','98689896','1200-12-12',1,1),(5,'Maute','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(6,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(7,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(8,'asd','asd','as','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(9,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(10,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(11,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(12,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(13,'asdasdas','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(14,'kjhgfg','gxgdydh','Marawi','mautegroup@gmail.com','8789698','98689896','1950-12-12',1,1),(15,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','2017-11-01',1,1),(16,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','2017-12-31',1,1),(17,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','2003-12-31',1,1),(18,'dasjdkas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','jioujhjkn','2003-12-31',1,1),(19,'asdasdas','Sta','Sta','mautegroup@gmail.com','8789698','98689896','2000-12-31',1,1),(20,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1992-12-30',1,1),(21,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1998-11-30',1,1),(22,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','2003-12-31',1,1),(23,'asdasdas','Sta. Mesa','Sta. Mesa','mautegroup@gmail.com','8789698','98689896','2002-11-30',1,1),(24,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','2002-10-31',1,1),(25,'asdasdas','Sta Mesa','Sta Mesa','mautegroup@gmail.com','8789698','98689896','2004-12-31',1,1),(26,'asdasdas','gxgdydh','gxgdydh','dfgdfgdf@YAHOO.COM','8789698','98689896','2004-12-31',1,1),(27,'asdasdas','StaMesa','StaMesa','mautegroup@gmail.com','8789698','98689896','1919-12-31',1,1),(28,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1999-12-31',1,1),(29,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','2002-12-31',1,1),(30,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1991-10-30',1,1),(31,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1991-02-01',1,1),(32,'cxzczx','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1987-12-31',1,1),(33,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1997-12-31',1,1),(34,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1999-10-30',1,1),(35,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1999-12-31',1,1),(36,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','1997-12-31',1,1),(37,'Fuck McFuck','Fuck City','Fuck City','fucketyfuck@fuck.com','09111111111','1111111','1111-11-11',1,1),(38,'MotherFucker','MotherFucker','MotherFucker','MotherFucker@yahoo.com','1234567890','1234567','1984-01-01',1,1),(39,'iuty','ufogfgj','ufogfgj','dfgdfgdf@YAHOO.COM','456789','2345678','1996-01-01',1,1),(40,'jhhv','hjvhjv','hjvhjv','5678999999','456789','jgkhjfgjk','2018-01-01',1,1),(41,'asdasdas','gxgdydh','gxgdydh','mautegroup@gmail.com','8789698','98689896','2017-12-31',1,1),(42,'asdasdas','gxgdydh','gxgdydh','dfgdfgdf@YAHOO.COM','8789698','98689896','2017-12-31',1,1),(43,'gfhjfhjg','Mandaluyong','Mandaluyong','alksjd@yahoo.com','8789698','98689896','2016-12-31',1,1),(44,'kjhfhghh','gxgdydh','gxgdydh','dfgdfgdf@YAHOO.COM','8789698','98689896','2016-12-31',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dish_tbl`
--

LOCK TABLES `dish_tbl` WRITE;
/*!40000 ALTER TABLE `dish_tbl` DISABLE KEYS */;
INSERT INTO `dish_tbl` VALUES (1,'Breaded Chicken Fillet','Yummy',100.00,'cf.jpg',1,1,1),(2,'Chicken Adobo','Mouth Watering',200.00,'cad.jpg',1,1,1),(3,'Chicken Barbeque','gg',120.00,'cb.jpg',1,1,1),(4,'Porkchop','Delightful',178.00,'bp.jpg',1,1,8),(5,'Beef Broccoli','yummy',123.00,'bwb.jpg',1,1,7),(6,'Chopsuey','Tasty',31.00,'mv.jpg',1,1,6),(7,'Lumpiang Sariwa','yum',20.00,'lub.jpe',1,1,6),(8,'Chicken w/ Pickles','Delicacies',130.00,'cte.jpg',1,1,1),(9,'Chicken w/ Pineapple','Drizzling',300.00,'ffi.jpe',1,1,1),(10,'Chicken Teriyaki','Melts in your tongue',80.00,'cte.jpg',1,1,1),(11,'Cordon Bleu','Chessy',135.00,'cbl.jpg',1,1,1),(12,'Fried Chicken','Crispy',75.00,'fch.jpg',1,1,1),(13,'Chicken Ala-Orange','Sweet',90.00,'ffi.jpe',1,1,1),(14,'Fish Fillet w/ Tartar Sauce','Delightful',110.00,'ffi.jpe',1,1,2),(15,'Shrimp w/ Garlic','Fresh',145.00,'st.jpg',1,1,2),(16,'Shrimp Tempura','Fresh',120.00,'st.jpg',1,1,2),(17,'Sweet and Sour Fish Fillet','Sweet sauce',60.00,'ssf.jpg',1,1,2),(18,'Fried Rice','Satiating',10.00,'logo.png',1,1,3),(19,'Java Rice','Satiating',15.00,'logo.png',1,1,3),(20,'Plain Rice','Satiating',10.00,'logo.png',1,1,3),(21,'Buko Pandan','Sweet',55.00,'bpa.jpg',1,1,4),(22,'Fruit Salad','Fresh from farm',90.00,'frs.jpg',1,1,4),(23,'Gelatin','Soft and yummy',85.00,'gel.jpg',1,1,4),(24,'Leche Flan','Sweet',75.00,'gel.jpg',1,1,4),(25,'Pastries','Delightful',100.00,'pas.jpg',1,1,4),(26,'Fresh Fruit Season','Fresh',120.00,'fr.jpg',1,1,4),(27,'Ice tea','Tanggal uhaw',20.00,'ict.jpg',1,1,5),(28,'Orange Juice','Tanggal Uhaw',20.00,'oju.jpg',1,1,5),(29,'Soft Drinks','Tanggal uhaw',30.00,'sdr.jpg',1,1,5),(30,'Buttered Corn & carrots','Healthy',120.00,'bcc.jpg',1,1,6),(31,'Chopsuey','Mouth watering',90.00,'ch.jpg',1,1,6),(32,'Greenpeas with Quail eggs','Freshly harvest',120.00,'gqe.jpg',1,1,6),(33,'Lumpiang Ubod','Yummy',130.00,'lub.jpe',1,1,6),(34,'Mixed Vegetables','Healthy',90.00,'mv.jpg',1,1,6),(35,'Beef w/ Mushroom','Tasty',120.00,'bwm.jpg',1,1,7),(36,'Beef Kaldereta','With Potato and Carrots',110.00,'beef.jpe',1,1,7),(37,'Beef Teriyaki','Meaty aand fresh',130.00,'bt.jpg',1,1,7),(38,'Kare Kare','Yummy',120.00,'kk.jpg',1,1,7),(39,'Lengua Estofado','Delightful',90.00,'le.jpg',1,1,7),(40,'Barbeque Liempo','Meaty and Tasty',100.00,'pork.jpg',1,1,8),(41,'Breaded Pork','Yum',140.00,'bp.jpg',1,1,8),(42,'Crispy Pata','Crispy and Tasty',135.00,'cpa.jpg',1,1,8),(43,'Hamonado','Sweet and Tasty',150.00,'h.jpg',1,1,8),(44,'Hawaiian Pork','Yummy',130.00,'hp.jpg',1,1,8),(45,'Lechong Kawali','Mouth watering',135.00,'lk.jpg',1,1,8),(46,'Menudo','Yummy',100.00,'m.jpg',1,1,8),(47,'Pork asado','Masarap',125.00,'pa.jpg',1,1,8),(48,'Pork Barbeque','Roasted',80.00,'pb.jpg',1,1,8),(49,'Pork Roll','Tasty and meaty',140.00,'pork.jpg',1,1,8),(50,'Sweett and Sour Pork','Sweet sauce',110.00,'hp.jpg',1,1,8),(51,'Tofu con Lechon','Masarap',90.00,'h.jpg',1,1,8),(52,'Spaghetti','Filipino Style',170.00,'sp.jpg',1,1,9),(53,'Carbonara','Creamy White',160.00,'car.jpe',1,1,9),(54,'Pancit Bihon Pancit Canton','Masarap',190.00,'cws.jpg',1,1,9),(55,'Pancit Malabon','Masarap',180.00,'cws.jpg',1,1,9),(56,'Sotanghon','Masarap',120.00,'cws.jpg',1,1,9);
/*!40000 ALTER TABLE `dish_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishadditional_tbl`
--

DROP TABLE IF EXISTS `dishadditional_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishadditional_tbl` (
  `additionalID` int(5) NOT NULL,
  `additionalServing` int(5) NOT NULL,
  `additionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL,
  PRIMARY KEY (`additionalID`),
  KEY `dishID_idx` (`dishID`),
  KEY `dishavailed_tbl_ibfk_1_idx` (`reservationID`),
  KEY `dishadditional_tbl_ibfk_1_idx` (`reservationID`),
  CONSTRAINT `dishID` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `dishadditional_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishadditional_tbl`
--

LOCK TABLES `dishadditional_tbl` WRITE;
/*!40000 ALTER TABLE `dishadditional_tbl` DISABLE KEYS */;
INSERT INTO `dishadditional_tbl` VALUES (1,1,'fuck',1,4),(2,8,'d',37,7),(3,4,'j',38,4);
/*!40000 ALTER TABLE `dishadditional_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dishavailed_tbl`
--

DROP TABLE IF EXISTS `dishavailed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dishavailed_tbl` (
  `dishAvailedID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`dishAvailedID`),
  KEY `dishID` (`dishID`),
  KEY `dishavailed_tbl_ibfk_2_idx` (`reservationID`),
  CONSTRAINT `dishavailed_tbl_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`),
  CONSTRAINT `dishavailed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishavailed_tbl`
--

LOCK TABLES `dishavailed_tbl` WRITE;
/*!40000 ALTER TABLE `dishavailed_tbl` DISABLE KEYS */;
INSERT INTO `dishavailed_tbl` VALUES (1,5,1),(2,5,1),(3,5,1),(4,4,1),(5,5,2),(6,5,2),(7,5,2),(8,4,2),(9,5,7),(10,5,7),(11,4,1),(12,4,2),(13,5,2),(14,6,2),(15,5,11),(16,4,11),(17,5,12),(18,5,12),(19,5,12),(20,4,12),(21,5,13),(22,5,13),(23,5,13),(24,4,13),(25,5,14),(26,4,14),(27,4,14),(28,5,15),(29,5,15),(30,5,15),(31,4,15),(32,5,16),(33,4,16),(34,4,16),(35,6,17),(36,5,17),(37,4,17),(38,7,18),(39,5,18),(40,4,18),(41,6,19),(42,5,19),(43,4,19),(44,6,20),(45,5,20),(46,4,20),(47,6,21),(48,5,21),(49,4,21),(50,5,22),(51,4,22),(52,4,22),(53,5,23),(54,4,23),(55,4,23),(56,6,24),(57,5,24),(58,4,24),(59,5,25),(60,5,25),(61,5,25),(62,4,25),(63,6,26),(64,5,26),(65,4,26),(66,5,27),(67,5,27),(68,5,27),(69,4,27),(70,5,28),(71,5,28),(72,5,28),(73,4,28),(74,5,30),(75,5,30),(76,5,30),(77,4,30),(78,6,31),(79,5,31),(80,4,31),(81,5,32),(82,5,32),(83,5,32),(84,4,32),(85,5,33),(86,4,33),(87,4,33),(88,5,34),(89,4,34),(90,4,34),(91,6,35),(92,5,35),(93,4,35),(94,6,36),(95,5,36),(96,4,36),(97,4,1),(98,6,37),(99,5,37),(100,4,37),(101,6,38),(102,5,38),(103,4,38),(104,7,39),(105,5,39),(106,4,39),(107,7,40),(108,5,40),(109,4,40);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dishtype_tbl`
--

LOCK TABLES `dishtype_tbl` WRITE;
/*!40000 ALTER TABLE `dishtype_tbl` DISABLE KEYS */;
INSERT INTO `dishtype_tbl` VALUES (1,'Chicken','Yummy',1,'fch.jpg'),(2,'Fish','Mouth watering',1,'ssf.jpg'),(3,'Rice','Satiating',1,'logo.png'),(4,'Desserts','Sweet',1,'fr.jpg'),(5,'Drinks','Satisfying',1,'ict.jpg'),(6,'Vegetable','Healthy',1,'vegy.jpg'),(7,'Beef','Tasty',1,'beef.jpg'),(8,'Pork','Meaty',1,'pork.jpg'),(9,'Pasta','for add ons only',1,'car.jpe');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_tbl`
--

LOCK TABLES `employee_tbl` WRITE;
/*!40000 ALTER TABLE `employee_tbl` DISABLE KEYS */;
INSERT INTO `employee_tbl` VALUES (1,'•	Jeremiah Colasino','avatar.jpg',1,1,1);
/*!40000 ALTER TABLE `employee_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeeadditional_tbl`
--

DROP TABLE IF EXISTS `employeeadditional_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeeadditional_tbl` (
  `employeeAdditionalID` int(5) NOT NULL,
  `employeeAdditionalQty` int(5) NOT NULL,
  `employeeAdditionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `employeeTypeID` int(5) NOT NULL,
  PRIMARY KEY (`employeeAdditionalID`),
  KEY `employeeTypeID_ema_idx` (`employeeTypeID`),
  KEY `reservationID_ema_idx` (`reservationID`),
  CONSTRAINT `employeeTypeID_ema` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reservationID_ema` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeeadditional_tbl`
--

LOCK TABLES `employeeadditional_tbl` WRITE;
/*!40000 ALTER TABLE `employeeadditional_tbl` DISABLE KEYS */;
INSERT INTO `employeeadditional_tbl` VALUES (1,1,'fuck',1,1),(2,1,'fuck',1,1),(3,5,'b',38,1),(4,7,'u',39,1);
/*!40000 ALTER TABLE `employeeadditional_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeeemployed_tbl`
--

DROP TABLE IF EXISTS `employeeemployed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeeemployed_tbl` (
  `employeeEmployedID` int(5) NOT NULL,
  `employeeTypeID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`employeeEmployedID`),
  KEY `employeeID` (`employeeTypeID`),
  KEY `reservationID` (`reservationID`),
  CONSTRAINT `employeeemployed_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `employeeemployed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeeemployed_tbl`
--

LOCK TABLES `employeeemployed_tbl` WRITE;
/*!40000 ALTER TABLE `employeeemployed_tbl` DISABLE KEYS */;
INSERT INTO `employeeemployed_tbl` VALUES (1,1,20),(2,1,21),(3,1,24),(4,1,26),(5,1,29),(6,1,31);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetype_tbl`
--

LOCK TABLES `employeetype_tbl` WRITE;
/*!40000 ALTER TABLE `employeetype_tbl` DISABLE KEYS */;
INSERT INTO `employeetype_tbl` VALUES (1,'Clown','Clowning',500.00,'clowns.jpg',1),(2,'Head Chef','Kitchen',750.00,'logo.png',1),(3,'Chef','Kitchen',500.00,'logo.png',1),(4,'Skirt','Physical Arrangement',600.00,'avatar3.png',1),(5,'Event Planner','Planning',600.00,'avatar5.png',1),(6,'MC','Hosting',500.00,'avatar.png',1),(7,'Driver','Transportation',500.00,'avatar04.png',1),(8,'Waiter','Serving',300.00,'avatar2.png',1);
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
  `equipmentRatePerHour` decimal(7,2) NOT NULL,
  `equipmentImage` varchar(100) NOT NULL,
  `equipmentAvailability` int(1) NOT NULL,
  `equipmentStatus` int(1) NOT NULL,
  `equipmentTypeID` int(5) NOT NULL,
  PRIMARY KEY (`equipmentID`),
  KEY `equipmentTypeID` (`equipmentTypeID`),
  CONSTRAINT `equipment_tbl_ibfk_1` FOREIGN KEY (`equipmentTypeID`) REFERENCES `equipmenttype_tbl` (`equipmentTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_tbl`
--

LOCK TABLES `equipment_tbl` WRITE;
/*!40000 ALTER TABLE `equipment_tbl` DISABLE KEYS */;
INSERT INTO `equipment_tbl` VALUES (1,'Dolby Speaker','Malakas',5000.00,'sound.jpg',1,1,1),(2,'Wooden Table','wood',500.00,'zz.jpg',1,1,2),(3,'Metal Table','metal',600.00,'no Image',1,1,2),(4,'Video oke','Loud',500.00,'logo.png',1,1,1),(5,'Bubble Machine','Mabula',500.00,'logo.png',1,1,1),(6,'Smoke Machine','Mausok',500.00,'logo.png',1,1,1),(7,'Round','Pabilog',500.00,'logo.png',1,1,2),(8,'Square ','pasquare',500.00,'logo.png',1,1,2),(9,'Rectangle','pahaba',500.00,'logo.png',1,1,2),(10,'Special','gg',500.00,'logo.png',1,1,2),(11,'Round','Pabilog',20.00,'logo.png',1,1,4),(12,'Square','pasquare',30.00,'logo.png',1,1,4),(13,'Spoon','Silver spoon',10.00,'logo.png',1,1,6),(14,'Fork','Silver',10.00,'logo.png',1,1,6),(15,'Knives','Matalas',40.00,'logo.png',1,1,6),(16,'Big bowl','Malalim',10.00,'logo.png',1,1,6),(17,'Big Oval Bowl','Mas malalim',10.00,'logo.png',1,1,6),(18,'Glass','Babasagin',20.00,'logo.png',1,1,6),(19,'Goblet','ggs',24.00,'logo.png',1,1,6),(20,'Cups','sgs',10.00,'logo.png',1,1,6),(21,'Pitcher','Plastic / Steel',10.00,'logo.png',1,1,6);
/*!40000 ALTER TABLE `equipment_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipmentadditional_tbl`
--

DROP TABLE IF EXISTS `equipmentadditional_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipmentadditional_tbl` (
  `equipmentAdditionalID` int(5) NOT NULL,
  `equipmentAdditionalQty` int(5) NOT NULL,
  `equipmentAdditionalDesc` varchar(250) DEFAULT NULL,
  `equipmentAdditionalNotes` varchar(250) DEFAULT NULL,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`equipmentAdditionalID`),
  KEY `equipmentID_idx` (`equipmentID`),
  KEY `reservationID_idx` (`reservationID`),
  CONSTRAINT `equipmentID_ea` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reservationID_ea` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipmentadditional_tbl`
--

LOCK TABLES `equipmentadditional_tbl` WRITE;
/*!40000 ALTER TABLE `equipmentadditional_tbl` DISABLE KEYS */;
INSERT INTO `equipmentadditional_tbl` VALUES (1,8,'j','d',1,37),(2,5,'b','m',2,38);
/*!40000 ALTER TABLE `equipmentadditional_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipmentavailed_tbl`
--

DROP TABLE IF EXISTS `equipmentavailed_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipmentavailed_tbl` (
  `equipmentAvailedID` int(5) NOT NULL,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL,
  PRIMARY KEY (`equipmentAvailedID`),
  KEY `equipmentID` (`equipmentID`),
  KEY `reservationID` (`reservationID`),
  CONSTRAINT `equipmentavailed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `equipmentavailed_tbl_ibfk_3` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`)
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
-- Table structure for table `equipmentlog_tbl`
--

DROP TABLE IF EXISTS `equipmentlog_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipmentlog_tbl` (
  `equipmentLogID` int(5) NOT NULL AUTO_INCREMENT,
  `equipmentID` int(5) NOT NULL,
  `equipmentQuantityIn` int(8) NOT NULL,
  `equipmentQuantityOut` int(8) NOT NULL,
  `equipmentLogDate` datetime NOT NULL,
  PRIMARY KEY (`equipmentLogID`),
  KEY `equipmentID` (`equipmentID`),
  CONSTRAINT `equipmentlog_tbl_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipmentlog_tbl`
--

LOCK TABLES `equipmentlog_tbl` WRITE;
/*!40000 ALTER TABLE `equipmentlog_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipmentlog_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipmenttype_tbl`
--

DROP TABLE IF EXISTS `equipmenttype_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipmenttype_tbl` (
  `equipmentTypeID` int(5) NOT NULL AUTO_INCREMENT,
  `equipmentTypeName` varchar(50) NOT NULL,
  `equipmentTypeStatus` int(11) NOT NULL,
  `equipmentTypeImage` varchar(50) NOT NULL,
  PRIMARY KEY (`equipmentTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipmenttype_tbl`
--

LOCK TABLES `equipmenttype_tbl` WRITE;
/*!40000 ALTER TABLE `equipmenttype_tbl` DISABLE KEYS */;
INSERT INTO `equipmenttype_tbl` VALUES (1,'Sound Mobile',1,'sound.jpg'),(2,'Table',1,'NO Image'),(3,'Chairs',1,'logo.png'),(4,'Plate',1,'logo.png'),(5,'Platito',1,'logo.png'),(6,'Kitchen ware',1,'logo.png'),(7,'Chafing dish',1,'logo.png'),(8,'Lights',1,'logo.png'),(9,'Fountain',1,'logo.png'),(10,'Transportation',1,'logo.png');
/*!40000 ALTER TABLE `equipmenttype_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_tbl`
--

DROP TABLE IF EXISTS `event_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `endTime` time NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `eventTypeID` (`eventTypeID`),
  KEY `locationID` (`locationID`),
  KEY `event_tbl_ibfk_1_idx` (`customerID`),
  CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `event_tbl_ibfk_2` FOREIGN KEY (`eventTypeID`) REFERENCES `eventtype_tbl` (`eventTypeID`),
  CONSTRAINT `event_tbl_ibfk_3` FOREIGN KEY (`locationID`) REFERENCES `location_tbl` (`locationID`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_tbl`
--

LOCK TABLES `event_tbl` WRITE;
/*!40000 ALTER TABLE `event_tbl` DISABLE KEYS */;
INSERT INTO `event_tbl` VALUES (1,'iugjg','2017-12-12','02:00:00','fuck',10,1,1,NULL,1,'05:00:00'),(2,'jk','2017-12-12','03:00:00',NULL,30,1,2,1,1,'05:00:00'),(3,'iugjg','2017-12-12','04:00:00','fuck',9,1,3,NULL,1,'05:00:00'),(4,'iugjg','1997-12-12','02:00:00','fuck',37,1,4,NULL,1,'05:00:00'),(5,'iugjg','1997-12-12','02:00:00','fuck',11,1,5,NULL,1,'05:00:00'),(6,'iugjg','1997-12-12','02:00:00',NULL,11,1,6,1,1,'05:00:00'),(7,'iugjg','1997-12-12','02:00:00',NULL,7,1,7,1,1,'05:00:00'),(8,'asd','1997-12-12','03:00:00',NULL,12,1,8,1,1,'05:00:00'),(9,'iugjg','1997-12-12','02:00:00',NULL,400,1,9,1,1,'05:00:00'),(10,'iugjg','1997-12-12','02:00:00','fuck',400,1,10,NULL,1,'05:00:00'),(11,'iugjg','1997-12-12','02:00:00','fuck',400,1,11,NULL,1,'05:00:00'),(12,'iugjg','1997-12-12','03:00:00','fuck',2,1,12,NULL,1,'05:00:00'),(13,'iugjg','1997-12-12','02:00:00','fuck',5,1,13,NULL,1,'05:00:00'),(14,'iugjg','1997-12-12','02:00:00','fuck',3,1,14,NULL,1,'05:00:00'),(15,'iugjg','2017-12-31','00:00:00',NULL,2,1,16,1,1,'12:00:00'),(16,'iugjg','2017-12-31','23:59:00',NULL,1,1,17,1,1,'12:59:00'),(17,'qwerty','2017-12-31','12:59:00','fuck',1,1,18,NULL,1,'13:59:00'),(18,'iugjg','2017-12-29','22:59:00','fuck',1,1,19,NULL,1,'12:59:00'),(19,'jk','2017-12-31','11:58:00',NULL,1,1,20,1,1,'12:59:00'),(20,'jk','2017-12-27','12:59:00',NULL,1,1,21,1,1,'12:57:00'),(21,'iugjg','2017-10-31','00:58:00','fuck',1,1,22,NULL,1,'10:59:00'),(22,'jk','2017-12-29','10:59:00','fuck',1,1,23,NULL,1,'09:58:00'),(23,'iugjg','2017-10-31','11:59:00','fuck',1,1,24,NULL,1,'00:59:00'),(24,'iugjg','2017-10-31','12:59:00',NULL,1,1,25,1,1,'12:59:00'),(25,'iugjg','2018-01-31','22:58:00',NULL,1,1,27,1,1,'12:59:00'),(26,'iugjg','2017-12-31','23:59:00','fuck',1,1,28,NULL,1,'12:57:00'),(27,'iugjg','2017-12-31','11:59:00',NULL,1,1,29,1,1,'23:57:00'),(28,'iugjg','2017-10-27','23:59:00',NULL,1,1,30,1,1,'12:59:00'),(29,'iugjg','2017-12-04','23:59:00',NULL,1,1,31,1,1,'12:59:00'),(30,'iugjg','2017-12-09','00:59:00',NULL,1,1,32,1,1,'12:45:00'),(31,'iugjg','2017-12-31','11:59:00','fuck',1,1,33,NULL,1,'12:59:00'),(32,'iugjg','2017-12-31','23:59:00',NULL,1,1,34,1,1,'12:59:00'),(33,'iugjg','2017-12-31','23:59:00',NULL,1,1,35,1,1,'23:59:00'),(34,'iugjg','2017-07-31','12:58:00',NULL,1,1,36,1,1,'00:57:00'),(60,'sample123','2017-08-21','02:00:00',NULL,123,1,25,1,1,'07:00:00'),(61,'Fuck','2017-08-24','07:00:00','Fuck',77,1,37,NULL,1,'19:00:00'),(62,'MotherFucker','2017-12-31','01:00:00','MotherFucker',78,1,38,NULL,1,'13:00:00'),(63,'jkkasd','2017-12-31','01:00:00','fuck',8,1,39,NULL,1,'23:59:00'),(64,'jhghghj','2017-12-31','12:59:00','fuck',1,1,42,NULL,1,'00:58:00'),(65,'iugjg','2016-10-31','12:59:00','fuck',1,1,43,NULL,1,'11:59:00'),(66,'kjcghfhg','2017-12-31','16:03:00','kjhgfdgf',1,1,44,NULL,1,'03:58:00');
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
INSERT INTO `package_tbl` VALUES (1,'3 Main Course','Includes BEEF , PORK, CHICKEN, FISH, VEGETABLES, RICE, DESSERTS, DRINKS',300.00,'Desert.jpg',1,1),(2,'4 Main Course','Includes PORK, CHICKEN, FISH, VEGETABLES, RICE, DESSERTS, DRINKS',250.00,'Penguins.jpg',1,1),(3,'5 Main Course','Includes CHICKEN, FISH, VEGETABLES, RICE, DESSERTS, DRINKS',200.00,'Lighthouse.jpg',1,1);
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
  `employeeTypeID` int(5) DEFAULT NULL,
  PRIMARY KEY (`packageInclusionID`),
  KEY `dishTypeID` (`dishTypeID`),
  KEY `packageID` (`packageID`),
  KEY `serviceID` (`serviceID`),
  KEY `packageinclusion_tbl_ibfk_4_idx` (`equipmentID`),
  KEY `packageinclusion_tbl_ibfk_5_idx` (`employeeTypeID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`),
  CONSTRAINT `packageinclusion_tbl_ibfk_5` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `packageinclusion_tbl_ibfk_6` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packageinclusion_tbl`
--

LOCK TABLES `packageinclusion_tbl` WRITE;
/*!40000 ALTER TABLE `packageinclusion_tbl` DISABLE KEYS */;
INSERT INTO `packageinclusion_tbl` VALUES (1,1,6,NULL,NULL,NULL),(2,1,7,NULL,NULL,NULL),(3,1,8,NULL,NULL,NULL),(4,1,NULL,1,NULL,NULL);
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
  `paymentModeIco` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`paymentModeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmode_tbl`
--

LOCK TABLES `paymentmode_tbl` WRITE;
/*!40000 ALTER TABLE `paymentmode_tbl` DISABLE KEYS */;
INSERT INTO `paymentmode_tbl` VALUES (1,'Cash','ti-money'),(2,'Credit','ti-credit-card');
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
  `paymentTermName` varchar(45) NOT NULL,
  `paymentTermIco` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`paymentTermID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentterm_tbl`
--

LOCK TABLES `paymentterm_tbl` WRITE;
/*!40000 ALTER TABLE `paymentterm_tbl` DISABLE KEYS */;
INSERT INTO `paymentterm_tbl` VALUES (1,'Full Payment','ti-heart'),(2,'Half Payment','ti-heart-broken');
/*!40000 ALTER TABLE `paymentterm_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_tbl`
--

DROP TABLE IF EXISTS `reservation_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_tbl` (
  `reservationID` int(5) NOT NULL,
  `reservationStatus` int(1) NOT NULL,
  `eventID` int(5) NOT NULL,
  `paymentModeID` int(5) NOT NULL,
  `paymentTermID` int(5) NOT NULL,
  `packageID` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`reservationID`),
  KEY `eventID` (`eventID`),
  KEY `packageID` (`packageID`),
  KEY `paymentModeID` (`paymentModeID`),
  KEY `paymentTermID` (`paymentTermID`),
  CONSTRAINT `reservation_tbl_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event_tbl` (`eventID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reservation_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reservation_tbl_ibfk_3` FOREIGN KEY (`paymentModeID`) REFERENCES `paymentmode_tbl` (`paymentModeID`),
  CONSTRAINT `reservation_tbl_ibfk_4` FOREIGN KEY (`paymentTermID`) REFERENCES `paymentterm_tbl` (`paymentTermID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_tbl`
--

LOCK TABLES `reservation_tbl` WRITE;
/*!40000 ALTER TABLE `reservation_tbl` DISABLE KEYS */;
INSERT INTO `reservation_tbl` VALUES (1,1,1,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(2,1,2,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(3,1,3,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(4,1,4,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(5,1,5,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(6,1,6,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(7,1,7,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(8,1,8,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(9,1,9,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(10,1,10,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(11,1,11,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(12,1,12,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(13,1,13,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(14,1,14,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(15,1,15,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(16,1,16,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(17,1,17,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(18,1,18,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(19,1,19,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(20,1,20,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(21,1,21,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(22,1,22,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(23,1,23,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(24,1,24,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(25,1,25,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(26,1,26,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(27,1,27,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(28,1,28,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(29,1,29,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(30,1,30,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(31,1,31,2,2,1,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(32,1,32,2,2,3,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(33,1,33,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(34,1,34,2,2,2,'2017-08-21 05:47:52','0000-00-00 00:00:00'),(35,1,61,2,1,1,'2017-08-23 02:34:09','2017-08-23 02:34:09'),(36,1,62,2,2,1,'2017-08-23 03:08:47','2017-08-23 03:08:47'),(37,1,63,1,2,1,'2017-08-23 03:43:29','2017-08-23 03:43:29'),(38,1,64,2,2,1,'2017-08-23 04:00:53','2017-08-23 04:00:53'),(39,1,65,1,2,1,'2017-08-23 04:02:13','2017-08-23 04:02:13'),(40,1,66,2,2,1,'2017-08-23 04:03:32','2017-08-23 04:03:32');
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
INSERT INTO `service_tbl` VALUES (1,'Wedding','wedding arrangement',7000.00,'flower.jpeg',1,1,1),(2,'Party','party arrangement',3000.00,'balloons.jpg',1,1,1),(3,'Baby Shower','Baby shower invites',10000.00,'inv.jpg',1,1,2);
/*!40000 ALTER TABLE `service_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviceadditional_tbl`
--

DROP TABLE IF EXISTS `serviceadditional_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviceadditional_tbl` (
  `serviceAdditionalID` int(5) NOT NULL,
  `serviceAdditionalQty` int(5) NOT NULL,
  `serviceAdditionalDesc` varchar(250) DEFAULT NULL,
  `serviceAdditionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL,
  PRIMARY KEY (`serviceAdditionalID`),
  KEY `serviceID_idx` (`serviceID`),
  KEY `reservationID_idx` (`reservationID`),
  CONSTRAINT `reservationID` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `serviceID` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceadditional_tbl`
--

LOCK TABLES `serviceadditional_tbl` WRITE;
/*!40000 ALTER TABLE `serviceadditional_tbl` DISABLE KEYS */;
INSERT INTO `serviceadditional_tbl` VALUES (1,1,'1','1',1,1),(2,5,'s','s',38,3),(3,7,'r','k',40,1);
/*!40000 ALTER TABLE `serviceadditional_tbl` ENABLE KEYS */;
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
  CONSTRAINT `serviceavailed_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `serviceavailed_tbl_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceavailed_tbl`
--

LOCK TABLES `serviceavailed_tbl` WRITE;
/*!40000 ALTER TABLE `serviceavailed_tbl` DISABLE KEYS */;
INSERT INTO `serviceavailed_tbl` VALUES (1,2,20),(2,1,21),(3,3,21),(4,1,24),(5,3,24),(6,3,25),(7,1,26),(8,3,26),(9,3,27),(10,3,28),(11,1,29),(12,3,29),(13,3,30),(14,3,32),(15,1,35),(16,1,36),(17,1,37),(18,1,38),(19,1,39),(20,1,40);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetype_tbl`
--

LOCK TABLES `servicetype_tbl` WRITE;
/*!40000 ALTER TABLE `servicetype_tbl` DISABLE KEYS */;
INSERT INTO `servicetype_tbl` VALUES (1,'Flower','Arrangement',1,1,'flower.jpeg'),(2,'Ballons','making',1,1,'balloons.png'),(3,'Tarpaulin','making',1,1,'logo.png'),(4,'Invitation','making',1,1,'inv.jpg'),(6,'Souvenier','Birthday, Baptismal, Simple Occasion',1,1,'logo.png');
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

-- Dump completed on 2017-08-25 17:54:57
