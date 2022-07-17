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
-- Table structure for table `adminrequests`
--

DROP TABLE IF EXISTS `adminrequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminrequests` (
  `username` varchar(30) DEFAULT NULL,
  `hashedsaltedpassword` varchar(65) DEFAULT NULL,
  `salt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminrequests`
--

LOCK TABLES `adminrequests` WRITE;
/*!40000 ALTER TABLE `adminrequests` DISABLE KEYS */;
INSERT INTO `adminrequests` VALUES ('a','VSDY/0ipa/i1KaD1u6lkW6J6Hcw8sBtlWz04aGgjhHU=','76313079395');
/*!40000 ALTER TABLE `adminrequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `username` varchar(30) NOT NULL,
  `hashedsaltedpassword` varchar(65) DEFAULT NULL,
  `salt` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES ('abc','RjGdu/SO3rRnQLn+wleFuY6pvsHZSqBH5MWTkYd02IM=','98538396772881240000');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `title` varchar(30) NOT NULL,
  `quantity` int DEFAULT NULL,
  `quantityavailable` int DEFAULT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('Irodov',1000,1000),('Krotov',1000,1000),('Pathfinder',1000,1000),('R K Jain',1000,1000);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history` (
  `title` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `requestdate` date DEFAULT NULL,
  `acceptdate` date DEFAULT NULL,
  `issuedate` date DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  KEY `username` (`username`),
  CONSTRAINT `history_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issuerecords`
--

DROP TABLE IF EXISTS `issuerecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issuerecords` (
  `title` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `requestdate` date DEFAULT NULL,
  `acceptdate` date DEFAULT NULL,
  `issuedate` date DEFAULT NULL,
  KEY `username` (`username`),
  CONSTRAINT `issuerecords_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuerecords`
--

LOCK TABLES `issuerecords` WRITE;
/*!40000 ALTER TABLE `issuerecords` DISABLE KEYS */;
/*!40000 ALTER TABLE `issuerecords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issuerequests`
--

DROP TABLE IF EXISTS `issuerequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issuerequests` (
  `title` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` tinyint DEFAULT '0',
  `requestdate` date DEFAULT NULL,
  `replydate` date DEFAULT NULL,
  KEY `username` (`username`),
  CONSTRAINT `issuerequests_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuerequests`
--

LOCK TABLES `issuerequests` WRITE;
/*!40000 ALTER TABLE `issuerequests` DISABLE KEYS */;
/*!40000 ALTER TABLE `issuerequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `returnrequests`
--

DROP TABLE IF EXISTS `returnrequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `returnrequests` (
  `title` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  KEY `username` (`username`),
  CONSTRAINT `returnrequests_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returnrequests`
--

LOCK TABLES `returnrequests` WRITE;
/*!40000 ALTER TABLE `returnrequests` DISABLE KEYS */;
/*!40000 ALTER TABLE `returnrequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessionmaintainer`
--

DROP TABLE IF EXISTS `sessionmaintainer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessionmaintainer` (
  `username` varchar(30) DEFAULT NULL,
  `hashedsaltedtemppassword` varchar(65) DEFAULT NULL,
  `salt` varchar(20) DEFAULT NULL,
  UNIQUE KEY `username` (`username`),
  CONSTRAINT `sessionmaintainer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessionmaintainer`
--

LOCK TABLES `sessionmaintainer` WRITE;
/*!40000 ALTER TABLE `sessionmaintainer` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessionmaintainer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessionmaintaineradmin`
--

DROP TABLE IF EXISTS `sessionmaintaineradmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessionmaintaineradmin` (
  `username` varchar(30) DEFAULT NULL,
  `hashedsaltedtemppassword` varchar(65) DEFAULT NULL,
  `salt` varchar(20) DEFAULT NULL,
  UNIQUE KEY `username` (`username`),
  CONSTRAINT `sessionmaintaineradmin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admins` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessionmaintaineradmin`
--

LOCK TABLES `sessionmaintaineradmin` WRITE;
/*!40000 ALTER TABLE `sessionmaintaineradmin` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessionmaintaineradmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `hashedsaltedpassword` varchar(65) DEFAULT NULL,
  `salt` varchar(20) DEFAULT NULL,
  `fine` int DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('abc','RjGdu/SO3rRnQLn+wleFuY6pvsHZSqBH5MWTkYd02IM=','98538396772881240000',0);
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

-- Dump completed on 2022-07-17 20:09:37
