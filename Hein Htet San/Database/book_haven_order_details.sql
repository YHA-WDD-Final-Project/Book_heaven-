-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: book_haven
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `oid` int NOT NULL AUTO_INCREMENT,
  `order_code` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `order_count` int DEFAULT NULL,
  `order_categ` int DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_total` int DEFAULT NULL,
  `order_books` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `arrive_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (5,26370,2695,1,1,'Hledan',58,'Happy Place','2023/07/20','2023/07/22','confirm'),(6,26370,2695,4,12,'Hledan',240,'Yellow Face','2023/07/20','2023/07/22','confirm'),(7,47414,2695,1,11,'Hlaing',125,'Steve Jobs','2023/07/20','2023/07/22','confirm'),(8,47414,2695,1,1,'Hlaing',58,'Happy Place','2023/07/20','2023/07/22','confirm'),(16,898,2695,2,1,'Taunggyi',116,'Happy Place','2023/07/21','2023/07/23','confirm'),(17,898,2695,1,11,'Taunggyi',55,'Spare','2023/07/21','2023/07/23','confirm'),(18,898,2695,1,12,'Taunggyi',60,'Yellow Face','2023/07/21','2023/07/23','confirm'),(19,898,2695,2,11,'Taunggyi',190,'Steve Jobs','2023/07/21','2023/07/23','confirm'),(23,95841,95260,2,1,'Shwe Pyi thar',116,'Happy Place','2023/07/21','2023/07/23','confirm'),(24,95841,95260,2,11,'Shwe Pyi thar',190,'Steve Jobs','2023/07/21','2023/07/23','confirm'),(25,68555,95260,1,11,'Insein',55,'Spare','2023/07/21','2023/07/23','confirm'),(26,68555,95260,1,1,'Insein',58,'Happy Place','2023/07/21','2023/07/23','confirm'),(27,68555,95260,1,11,'Insein',95,'Steve Jobs','2023/07/21','2023/07/23','confirm'),(28,68276,95260,3,12,'Kalaw',180,'Yellow Face','2023/07/21','2023/07/23','confirm'),(31,58554,95260,2,11,'Taunggyi',110,'Spare','2023/07/21','2023/07/23','unconfirm'),(32,52149,95260,2,11,'University',110,'Spare','2023/07/21','2023/07/23','confirm'),(33,18329,2695,2,12,'Yangon',120,'Yellow Face','2023/07/21','2023/07/23','unconfirm'),(34,90613,2695,1,11,'UCSY',55,'Spare','2023/07/21','2023/07/23','confirm');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-23 10:53:43
