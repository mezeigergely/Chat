-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: frik
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chat_message`
--

DROP TABLE IF EXISTS `chat_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  PRIMARY KEY (`chat_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_message`
--

LOCK TABLES `chat_message` WRITE;
/*!40000 ALTER TABLE `chat_message` DISABLE KEYS */;
INSERT INTO `chat_message` VALUES (1,15,0,'sas','2020-11-06 01:28:54',1),(2,17,0,'asas','2020-11-06 01:29:33',1),(3,15,0,'szia','2020-11-06 01:35:16',1),(4,15,0,'hali','2020-11-06 01:35:51',1),(5,15,0,'fghjkl','2020-11-06 01:36:19',1),(6,15,0,'jiks','2020-11-06 01:37:45',1),(7,15,0,'jikugf','2020-11-06 01:40:53',1),(8,15,0,'sdfghjkl','2020-11-06 01:41:11',1),(9,16,0,'jgfds','2020-11-06 01:42:22',1),(10,15,0,'78654','2020-11-06 01:54:07',1),(11,15,0,'987654','2020-11-06 01:57:28',1),(12,17,15,'szervusz','2020-11-06 02:22:32',1),(13,15,17,'Hellóka!','2020-11-06 02:23:13',1),(14,15,17,'mizu?','2020-11-06 02:34:04',1),(15,15,18,'Szia!\nHogy vagy?','2020-11-06 02:38:12',1),(16,18,15,'Szia! Köszi, jól!','2020-11-06 02:38:58',1),(17,17,15,'Minden oké!','2020-11-06 02:39:21',1);
/*!40000 ALTER TABLE `chat_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_details`
--

DROP TABLE IF EXISTS `login_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL,
  PRIMARY KEY (`login_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_details`
--

LOCK TABLES `login_details` WRITE;
/*!40000 ALTER TABLE `login_details` DISABLE KEYS */;
INSERT INTO `login_details` VALUES (1,15,'2020-11-06 00:20:51','no'),(2,17,'2020-11-06 00:21:09','no'),(3,17,'2020-11-06 00:24:30','no'),(4,17,'2020-11-06 00:25:37','no'),(5,17,'2020-11-06 00:31:08','no'),(6,17,'2020-11-06 00:32:43','no'),(7,15,'2020-11-06 00:37:35','no'),(8,16,'2020-11-06 00:57:50','no'),(9,0,'2020-11-06 01:04:34','no'),(10,17,'2020-11-06 01:07:25','no'),(11,17,'2020-11-06 02:37:12','no'),(12,15,'2020-11-06 01:14:35','no'),(13,17,'2020-11-06 01:16:00','no'),(14,17,'2020-11-06 01:59:22','no'),(15,17,'2020-11-06 02:01:56','no'),(16,15,'2020-11-06 02:03:47','no'),(17,15,'2020-11-06 02:11:18','no'),(18,15,'2020-11-06 02:13:38','no'),(19,17,'2020-11-06 02:19:23','no'),(20,15,'2020-11-06 02:20:17','no'),(21,15,'2020-11-06 02:26:07','no'),(22,17,'2020-11-06 02:27:08','no'),(23,18,'2020-11-06 02:37:47','no'),(24,15,'2020-11-06 02:38:33','no'),(25,16,'2020-11-06 02:46:53','no'),(26,16,'2020-11-06 02:48:49','no');
/*!40000 ALTER TABLE `login_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (15,'Gergely Mezei','geris','mezei.gergely89@gmail.com','$2y$10$enGjTdjmGi50Ct0gV9EdC.3fh.K8IV9k7M1P1NzgQwLdWnzIjXnHy','male','chrome','30-59'),(16,'John Doe','johnDoe','johndoe@gmail.com','$2y$10$TEfB5QW4VHU8TwBYXMa27ebJAaPUIMmzFqziBjAkOvPUhg34mxDTi','male','chrome','1-18'),(17,'Karai Anna','anna','karai.anna@gmail.com','$2y$10$F3Y4AIfMYsPuk1jpiV.01OdnZrLBybUDZyPx7bcKfQnIvnSa.J5Cu','female','mozilla','30-59'),(18,'Kiss Ferenc','feri','feri@feri.hu','$2y$10$v7X6eZchJFScVye/qqxL0unCdzLwFtGc2GZb0/sepRATqIM5QZBc2','male','other','60');
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

-- Dump completed on 2020-11-06  4:03:02
