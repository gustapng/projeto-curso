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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (5,'Filmes','filmes e séries','2022-12-10 19:50:27','2022-12-10 19:50:27','filmes'),(9,'Games','Jogos diversos','2022-12-20 22:22:41','2022-12-20 22:22:41','games');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

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
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (63,'Transformers 4',35,1,'Filme da netflix','vikings','2022-12-11 08:31:51','2022-12-11 08:31:51',5),(66,'God Of War',99,1,'jogo do bom de guerra','god-of-war','2022-12-20 22:23:12','2022-12-20 22:23:12',9),(67,'CS Go',54,1,'Jogo Fps competitivo','csgo','2022-12-20 22:28:05','2022-12-20 22:28:05',9);
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES (2,'81ae9d6397711c6c1538915234726c60f7b99a201670185908.png',50,'2022-12-04 17:31:48','2022-12-04 17:31:48'),(3,'81ae9d6397711c6c1538915234726c60f7b99a201670186195.png',51,'2022-12-04 17:36:35','2022-12-04 17:36:35'),(11,'0',55,'2022-12-04 22:47:20','2022-12-04 22:47:20'),(12,'0',55,'2022-12-04 22:48:03','2022-12-04 22:48:03'),(13,'0',56,'2022-12-08 20:17:03','2022-12-08 20:17:03'),(14,'496',57,'2022-12-08 20:17:26','2022-12-08 20:17:26'),(16,'496',58,'2022-12-08 20:23:01','2022-12-08 20:23:01'),(19,'81ae9d6397711c6c1538915234726c60f7b99a201670542640.png',NULL,'2022-12-08 20:37:20','2022-12-08 20:37:20'),(20,'ca0e1a06e1963f38dafb69dd08a71e7613b6428a1670542651.png',NULL,'2022-12-08 20:37:31','2022-12-08 20:37:31'),(21,'943594b706d22a39898a5f028c46565eac3a347d1670542753.png',NULL,'2022-12-08 20:39:13','2022-12-08 20:39:13'),(23,'496b150574e7d8b3db018040e327c8729b6c15cf1670551020.png',59,'2022-12-08 22:57:00','2022-12-08 22:57:00'),(25,'ca0e1a06e1963f38dafb69dd08a71e7613b6428a1670683465.png',60,'2022-12-10 11:44:25','2022-12-10 11:44:25'),(26,'c5bc0ea913e4203d6e235928b9aa3d896495be721670713757.png',62,'2022-12-10 20:09:17','2022-12-10 20:09:17'),(28,'22dbaaf05cabce04b45c11d85acc62e17c7b769c1670759125.png',64,'2022-12-11 08:45:25','2022-12-11 08:45:25'),(33,'ca0e1a06e1963f38dafb69dd08a71e7613b6428a1670785354.png',63,'2022-12-11 16:02:34','2022-12-11 16:02:34'),(35,'943594b706d22a39898a5f028c46565eac3a347d1670789394.png',65,'2022-12-11 17:09:54','2022-12-11 17:09:54'),(36,'81ae9d6397711c6c1538915234726c60f7b99a201671585793.png',66,'2022-12-20 22:23:13','2022-12-20 22:23:13'),(37,'cf31886037b2b741182ad6e0bd595a8c313caa9d1671586085.png',67,'2022-12-20 22:28:05','2022-12-20 22:28:05');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remember_password`
--

DROP TABLE IF EXISTS `remember_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remember_password` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remember_password`
--

LOCK TABLES `remember_password` WRITE;
/*!40000 ALTER TABLE `remember_password` DISABLE KEYS */;
INSERT INTO `remember_password` VALUES (2,41,'639f75f5e76c5962709fc3bf739fa7101e12c7776447d17bb7f30','2022-12-19 00:00:00'),(3,42,'639f76085cc80f7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(4,42,'639f771a89a79f7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(5,42,'639f7771b4bfcf7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(6,42,'639f77cea9ce2f7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(7,42,'639f788c93c67f7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(8,42,'639f807eed9e0f7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(9,41,'639f80ce8278f962709fc3bf739fa7101e12c7776447d17bb7f30','2022-12-19 00:00:00'),(10,42,'639f82ebb03eff7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(11,42,'639f834614791f7d4e61d808ae523470524b72b2144c9865f6b6c','2022-12-19 00:00:00'),(12,38,'639f835bb54c3e756c1600a8710090be210ce5307e2a4cfbd3663','2022-12-19 00:00:00');
/*!40000 ALTER TABLE `remember_password` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (38,'Gusta RD','gusta@gmail.com','65875c3ae9e602c3507ec4e47bad21b81c323fbd','2022-12-11 17:32:51','2022-12-11 17:32:51'),(40,'Gustavo Ferreira Dos Santos','jorge@gmail.com','bbd5d2abc4c57733c9e16bb31d19db1a72e25a36','2022-12-11 17:46:54','2022-12-11 17:46:54'),(41,'gustavo','teste@gmail.com','ec3a20c882eaac08fce52157e7c8190ce7fb107b','2022-12-12 18:38:00','2022-12-12 18:38:00'),(42,'teste','guuxts@gmail.com','d5d13600eb3530892011db8126ffa06a05761139','2022-12-18 16:50:36','2022-12-18 16:50:36');
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

-- Dump completed on 2022-12-23 21:07:12
