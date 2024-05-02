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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `catid` int DEFAULT NULL,
  `prices` int DEFAULT NULL,
  `cover_img` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (5,'Yellow Face','R.F. Kuang',12,60,'YellowFace.jpg','    Synopsis. Yellow Face is David Henry Hwangs self-mocking drama about his reaction to the casting of Caucasian actor Jonathan Pryce as a Eurasian character in the Broadway musical, Miss Saigon.\r\n    '),(7,'Spare',' J. R. Moehringer',11,55,'images.jpg','Spare (2023) is Prince Harry s highly anticipated memoir, which offers unprecedented insight into life as a royal. With remarkable candor, Harry reflects on his mother s death, his complex relationships with other family members, and his battles with the press.'),(9,'Happy Place','Emily Henry',1,58,'happy_place.jpg','Happy Place follows ex-fiancés Harriet, a conflict-avoidant surgical resident, and Wyn, a quick-witted charmer who dances through life. They share a group of close friends that, for the last decade, have scheduled an annual getaway to a small cottage in Maine as a respite from their daily lives.'),(10,'Steve Jobs','Walter Isaacson',11,95,'stevejobs.jpg','Steve Jobs grew up in Silicon Valley at the intersection of arts and technology, drugs and geekiness. There he would cement a friendship that would lead to the birth of Apple as well as a profound shift in the world of technology.');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-23 10:53:42
