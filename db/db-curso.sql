-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: db_curso
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(80) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Iphone 11',3499,1,'Iphone 11, 64gb, 5g','iphone-11','2022-12-04 11:11:45','2022-12-04 11:11:45'),(11,'PS4',5000,1,'video game','playstation4','2022-12-04 15:11:46','2022-12-04 15:11:46'),(52,'TESTE',1,1,'TESTE','TESTE','2022-12-04 20:08:08','2022-12-04 20:08:08'),(53,'teste 3',111,1,'teste 3','teste 3','2022-12-04 20:23:18','2022-12-04 20:23:18');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES (2,'81ae9d6397711c6c1538915234726c60f7b99a201670185908.png',50,'2022-12-04 17:31:48','2022-12-04 17:31:48'),(3,'81ae9d6397711c6c1538915234726c60f7b99a201670186195.png',51,'2022-12-04 17:36:35','2022-12-04 17:36:35'),(4,'ca0e1a06e1963f38dafb69dd08a71e7613b6428a1670195288.png',52,'2022-12-04 20:08:08','2022-12-04 20:08:08'),(5,'ed4c6381179c552f6ca7452a6761f8f3ae42b3291670196198.png',53,'2022-12-04 20:23:18','2022-12-04 20:23:18'),(11,'0',55,'2022-12-04 22:47:20','2022-12-04 22:47:20'),(12,'0',55,'2022-12-04 22:48:03','2022-12-04 22:48:03');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (28,'Gustavo 1','gustavo@gmail.com','f483d23bea8c8fa58606cb726d941e50719286aa','2022-12-04 10:56:30','2022-12-04 10:56:30'),(29,'Gustavo 2','gustavo2@gmail.com','f483d23bea8c8fa58606cb726d941e50719286aa','2022-12-04 11:01:39','2022-12-04 11:01:39'),(30,'Gustavo 3','gustavo3@gmail.com','f483d23bea8c8fa58606cb726d941e50719286aa','2022-12-04 11:02:10','2022-12-04 11:02:10'),(31,'Gustavo 4','gustavo4@gmail.com','f483d23bea8c8fa58606cb726d941e50719286aa','2022-12-04 11:03:04','2022-12-04 11:03:04'),(32,'Gustavo 5','gustavo5@gmail.com','f483d23bea8c8fa58606cb726d941e50719286aa','2022-12-04 11:17:39','2022-12-04 11:17:39');
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

-- Dump completed on 2022-12-04 22:54:08
