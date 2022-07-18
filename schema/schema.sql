-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lib
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AdminRequests`
--

DROP TABLE IF EXISTS `AdminRequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `AdminRequests` (
  `Username` varchar(30) DEFAULT NULL,
  `HashedSaltedPassword` varchar(65) DEFAULT NULL,
  `Salt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AdminRequests`
--

LOCK TABLES `AdminRequests` WRITE;
/*!40000 ALTER TABLE `AdminRequests` DISABLE KEYS */;
INSERT INTO `AdminRequests` VALUES ('a','VSDY/0ipa/i1KaD1u6lkW6J6Hcw8sBtlWz04aGgjhHU=','76313079395');
/*!40000 ALTER TABLE `AdminRequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Admins`
--

DROP TABLE IF EXISTS `Admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `Admins` (
  `Username` varchar(30) NOT NULL,
  `HashedSaltedPassword` varchar(65) DEFAULT NULL,
  `Salt` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admins`
--

LOCK TABLES `Admins` WRITE;
/*!40000 ALTER TABLE `Admins` DISABLE KEYS */;
INSERT INTO `Admins` VALUES ('abc','RjGdu/SO3rRnQLn+wleFuY6pvsHZSqBH5MWTkYd02IM=','98538396772881240000');
/*!40000 ALTER TABLE `Admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Books`
--

DROP TABLE IF EXISTS `Books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `Books` (
  `Title` varchar(30) NOT NULL,
  `Quantity` int DEFAULT NULL,
  `QuantityAvailable` int DEFAULT NULL,
  PRIMARY KEY (`Title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Books`
--

LOCK TABLES `Books` WRITE;
/*!40000 ALTER TABLE `Books` DISABLE KEYS */;
INSERT INTO `Books` VALUES ('Irodov',1000,1000),('Krotov',1000,1000),('Pathfinder',1000,1000),('R K Jain',1000,1000);
/*!40000 ALTER TABLE `Books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `History`
--

DROP TABLE IF EXISTS `History`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `History` (
  `Title` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL,
  `AcceptDate` date DEFAULT NULL,
  `IssueDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  KEY `Username` (`Username`),
  CONSTRAINT `History_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Users` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `History`
--

LOCK TABLES `History` WRITE;
/*!40000 ALTER TABLE `History` DISABLE KEYS */;
/*!40000 ALTER TABLE `History` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IssueRecords`
--

DROP TABLE IF EXISTS `IssueRecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `IssueRecords` (
  `Title` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL,
  `AcceptDate` date DEFAULT NULL,
  `IssueDate` date DEFAULT NULL,
  KEY `Username` (`Username`),
  CONSTRAINT `IssueRecords_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Users` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IssueRecords`
--

LOCK TABLES `IssueRecords` WRITE;
/*!40000 ALTER TABLE `IssueRecords` DISABLE KEYS */;
/*!40000 ALTER TABLE `IssueRecords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IssueRequests`
--

DROP TABLE IF EXISTS `IssueRequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `IssueRequests` (
  `Title` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Status` tinyint DEFAULT '0',
  `RequestDate` date DEFAULT NULL,
  `ReplyDate` date DEFAULT NULL,
  KEY `Username` (`Username`),
  CONSTRAINT `IssueRequests_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Users` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IssueRequests`
--

LOCK TABLES `IssueRequests` WRITE;
/*!40000 ALTER TABLE `IssueRequests` DISABLE KEYS */;
/*!40000 ALTER TABLE `IssueRequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ReturnRequests`
--

DROP TABLE IF EXISTS `ReturnRequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `ReturnRequests` (
  `Title` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  KEY `Username` (`Username`),
  CONSTRAINT `ReturnRequests_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Users` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ReturnRequests`
--

LOCK TABLES `ReturnRequests` WRITE;
/*!40000 ALTER TABLE `ReturnRequests` DISABLE KEYS */;
/*!40000 ALTER TABLE `ReturnRequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `Username` varchar(30) NOT NULL,
  `HashedSaltedPassword` varchar(65) DEFAULT NULL,
  `Salt` varchar(20) DEFAULT NULL,
  `Fine` int DEFAULT '0',
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('abc','RjGdu/SO3rRnQLn+wleFuY6pvsHZSqBH5MWTkYd02IM=','98538396772881240000',0);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-18  4:30:10
