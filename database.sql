-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: freedom-production.cy8tarpmfuxp.eu-west-3.rds.amazonaws.com    Database: freedom
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `bookmarks`
--

DROP TABLE IF EXISTS `bookmarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmarks` (
  `id_bookmark` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `fk_post` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bookmark`),
  KEY `bookmarks_fk_user_foreign` (`fk_user`),
  KEY `bookmarks_fk_post_foreign` (`fk_post`),
  CONSTRAINT `bookmarks_fk_post_foreign` FOREIGN KEY (`fk_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bookmarks_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmarks`
--

LOCK TABLES `bookmarks` WRITE;
/*!40000 ALTER TABLE `bookmarks` DISABLE KEYS */;
INSERT INTO `bookmarks` VALUES (1,5,7,'2022-06-02 14:59:06','2022-06-02 14:59:06'),(2,3,15,'2022-06-08 09:54:14','2022-06-08 09:54:14'),(3,15,14,'2022-06-22 16:10:59','2022-06-22 16:10:59'),(4,16,24,'2022-06-22 19:38:06','2022-06-22 19:38:06');
/*!40000 ALTER TABLE `bookmarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bugs`
--

DROP TABLE IF EXISTS `bugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bugs` (
  `id_bug` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `fk_completedBy` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bug`),
  KEY `bugs_fk_user_foreign` (`fk_user`),
  KEY `bugs_fk_completedby_foreign` (`fk_completedBy`),
  CONSTRAINT `bugs_fk_completedby_foreign` FOREIGN KEY (`fk_completedBy`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bugs_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bugs`
--

LOCK TABLES `bugs` WRITE;
/*!40000 ALTER TABLE `bugs` DISABLE KEYS */;
INSERT INTO `bugs` VALUES (1,5,'Like aparece dos veces en las notificaciones ',1,3,'2022-06-02 16:28:59','2022-06-03 20:44:56',NULL),(2,3,'Max-width bug modal está al 100%, cambiar al 90%',1,3,'2022-06-02 18:01:50','2022-06-03 20:46:58',NULL),(3,3,'Sustituir el height y width de la imagen de PostCreate por min-height y min-width.',1,3,'2022-06-02 18:02:31','2022-06-03 20:49:49',NULL),(4,3,'Following modal & Follower modal, cambiar el width del 100% al 90%',1,3,'2022-06-02 22:53:24','2022-06-03 20:58:51',NULL),(5,3,'En el apartado posts del perfil, aparecen tambien los comentarios',1,3,'2022-06-04 10:15:14','2022-06-05 12:04:01',NULL);
/*!40000 ALTER TABLE `bugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `id_follow` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `fk_follow` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_follow`),
  KEY `follows_fk_user_foreign` (`fk_user`),
  KEY `follows_fk_follow_foreign` (`fk_follow`),
  CONSTRAINT `follows_fk_follow_foreign` FOREIGN KEY (`fk_follow`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `follows_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,4,3,'2022-06-02 14:33:57','2022-06-02 14:33:57'),(2,5,3,'2022-06-02 14:40:47','2022-06-02 14:40:47'),(3,3,5,'2022-06-02 14:47:23','2022-06-02 14:47:23'),(4,3,6,'2022-06-02 15:00:42','2022-06-02 15:00:42'),(5,7,3,'2022-06-02 15:52:06','2022-06-02 15:52:06'),(6,8,3,'2022-06-03 12:35:14','2022-06-03 12:35:14'),(7,8,7,'2022-06-03 12:35:25','2022-06-03 12:35:25'),(8,3,8,'2022-06-03 15:05:05','2022-06-03 15:05:05'),(9,6,7,'2022-06-06 18:53:22','2022-06-06 18:53:22'),(12,15,8,'2022-06-22 16:21:06','2022-06-22 16:21:06'),(13,16,5,'2022-06-22 19:38:21','2022-06-22 19:38:21');
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id_like` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `fk_post` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_like`),
  KEY `likes_fk_user_foreign` (`fk_user`),
  KEY `likes_fk_post_foreign` (`fk_post`),
  CONSTRAINT `likes_fk_post_foreign` FOREIGN KEY (`fk_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likes_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (8,4,4,'2022-06-02 14:34:17','2022-06-02 14:34:17'),(9,5,6,'2022-06-02 14:39:18','2022-06-02 14:39:18'),(10,5,1,'2022-06-02 14:43:55','2022-06-02 14:43:55'),(11,3,8,'2022-06-02 14:47:17','2022-06-02 14:47:17'),(12,5,10,'2022-06-02 14:49:37','2022-06-02 14:49:37'),(13,3,7,'2022-06-02 14:51:25','2022-06-02 14:51:25'),(14,6,13,'2022-06-02 14:58:02','2022-06-02 14:58:02'),(16,3,12,'2022-06-02 15:00:10','2022-06-02 15:00:10'),(17,3,13,'2022-06-02 15:00:41','2022-06-02 15:00:41'),(18,5,12,'2022-06-02 15:01:10','2022-06-02 15:01:10'),(19,7,13,'2022-06-02 15:52:35','2022-06-02 15:52:35'),(20,7,15,'2022-06-02 15:52:47','2022-06-02 15:52:47'),(21,7,16,'2022-06-02 15:54:37','2022-06-02 15:54:37'),(22,8,15,'2022-06-03 12:41:20','2022-06-03 12:41:20'),(28,10,19,'2022-06-05 14:49:36','2022-06-05 14:49:36'),(32,10,20,'2022-06-05 14:49:38','2022-06-05 14:49:38'),(33,3,15,'2022-06-06 09:21:37','2022-06-06 09:21:37'),(35,4,1,'2022-06-06 09:29:50','2022-06-06 09:29:50'),(37,12,21,'2022-06-09 15:05:51','2022-06-09 15:05:51'),(38,3,21,'2022-06-10 11:43:45','2022-06-10 11:43:45'),(40,3,14,'2022-06-13 09:25:27','2022-06-13 09:25:27'),(41,15,18,'2022-06-22 16:10:42','2022-06-22 16:10:42'),(42,15,14,'2022-06-22 16:10:57','2022-06-22 16:10:57'),(43,16,17,'2022-06-22 19:37:05','2022-06-22 19:37:05'),(44,16,14,'2022-06-22 19:38:51','2022-06-22 19:38:51');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_rols_table',1),(2,'2014_10_12_000001_create_users_table',1),(3,'2014_10_12_000002_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2022_04_19_000000_create_posts_table',1),(7,'2022_04_19_000001_create_reposts_table',1),(8,'2022_04_19_000002_create_likes_table',1),(9,'2022_04_19_000003_create_bookmarks_table',1),(10,'2022_04_19_000004_create_typesnotifications_table',1),(11,'2022_04_19_000005_create_notifications_table',1),(12,'2022_04_19_000006_create_warnings_table',1),(13,'2022_04_19_000007_create_follows_table',1),(14,'2022_04_19_000008_create_reports_table',1),(15,'2022_04_19_000009_create_bugs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id_notification` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `fk_notifier` int unsigned NOT NULL,
  `fk_post` int unsigned DEFAULT NULL,
  `fk_typeNot` int unsigned NOT NULL,
  `watched` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `notifications_fk_user_foreign` (`fk_user`),
  KEY `notifications_fk_notifier_foreign` (`fk_notifier`),
  KEY `notifications_fk_post_foreign` (`fk_post`),
  KEY `notifications_fk_typenot_foreign` (`fk_typeNot`),
  CONSTRAINT `notifications_fk_notifier_foreign` FOREIGN KEY (`fk_notifier`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notifications_fk_post_foreign` FOREIGN KEY (`fk_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notifications_fk_typenot_foreign` FOREIGN KEY (`fk_typeNot`) REFERENCES `types-notifications` (`id_typeNot`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notifications_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,4,3,NULL,5,1,'2022-06-02 14:33:57','2022-06-02 14:34:00',NULL),(2,4,3,4,4,1,'2022-06-02 14:34:17','2022-06-02 14:34:23',NULL),(3,4,3,1,3,1,'2022-06-02 14:34:18','2022-06-02 14:34:23',NULL),(4,5,3,NULL,5,1,'2022-06-02 14:40:47','2022-06-02 14:47:18',NULL),(5,5,3,1,4,1,'2022-06-02 14:43:55','2022-06-02 14:47:18',NULL),(6,5,3,8,2,1,'2022-06-02 14:45:20','2022-06-02 14:47:18',NULL),(7,3,5,8,4,1,'2022-06-02 14:47:17','2022-06-02 14:48:12',NULL),(8,3,5,NULL,5,1,'2022-06-02 14:47:23','2022-06-02 14:48:12',NULL),(9,3,5,10,2,1,'2022-06-02 14:49:09','2022-06-02 14:49:14',NULL),(10,5,3,10,4,1,'2022-06-02 14:49:37','2022-06-02 14:49:40',NULL),(11,3,5,11,1,1,'2022-06-02 14:50:05','2022-06-02 14:56:01',NULL),(12,3,5,7,4,1,'2022-06-02 14:51:25','2022-06-02 14:56:01',NULL),(13,5,3,14,2,1,'2022-06-02 14:56:58','2022-06-02 14:59:58',NULL),(14,3,5,12,4,1,'2022-06-02 15:00:04','2022-06-02 15:00:47',NULL),(15,3,5,12,4,1,'2022-06-02 15:00:10','2022-06-02 15:00:47',NULL),(16,3,6,13,4,1,'2022-06-02 15:00:41','2022-06-06 18:53:07',NULL),(17,3,6,NULL,5,1,'2022-06-02 15:00:42','2022-06-06 18:53:07',NULL),(18,7,3,NULL,5,1,'2022-06-02 15:52:06','2022-06-02 18:00:17',NULL),(19,7,3,1,3,1,'2022-06-02 15:52:18','2022-06-02 18:00:17',NULL),(20,7,6,13,4,1,'2022-06-02 15:52:35','2022-06-06 18:53:07',NULL),(21,8,3,NULL,5,1,'2022-06-03 12:35:14','2022-06-03 13:48:46',NULL),(22,8,7,NULL,5,0,'2022-06-03 12:35:25','2022-06-03 12:35:25',NULL),(23,8,7,15,4,0,'2022-06-03 12:41:20','2022-06-03 12:41:20',NULL),(24,3,8,NULL,5,1,'2022-06-03 15:05:05','2022-06-05 14:43:48',NULL),(25,3,8,17,4,1,'2022-06-03 15:05:07','2022-06-05 14:43:48',NULL),(26,3,8,17,3,1,'2022-06-03 15:05:16','2022-06-05 14:43:48',NULL),(27,4,3,1,4,1,'2022-06-03 20:24:27','2022-06-06 09:29:44','2022-06-06 09:29:44'),(28,4,3,1,4,1,'2022-06-03 20:24:28','2022-06-06 09:29:44','2022-06-06 09:29:44'),(29,4,3,1,4,1,'2022-06-03 20:24:33','2022-06-06 09:29:44','2022-06-06 09:29:44'),(30,3,7,18,2,0,'2022-06-04 10:14:43','2022-06-04 10:14:43',NULL),(31,3,7,15,4,0,'2022-06-06 09:21:37','2022-06-06 09:21:37',NULL),(32,4,3,1,4,0,'2022-06-06 09:29:42','2022-06-06 09:29:44','2022-06-06 09:29:44'),(33,4,3,1,4,1,'2022-06-06 09:29:50','2022-06-06 09:29:51',NULL),(34,6,7,NULL,5,0,'2022-06-06 18:53:22','2022-06-06 18:53:22',NULL),(35,3,5,14,4,0,'2022-06-08 10:02:34','2022-06-13 09:25:21','2022-06-13 09:25:21'),(36,3,12,21,4,0,'2022-06-10 11:43:45','2022-06-10 11:43:45',NULL),(37,3,5,14,4,0,'2022-06-13 09:25:22','2022-06-13 09:25:26','2022-06-13 09:25:26'),(38,3,5,14,4,0,'2022-06-13 09:25:27','2022-06-13 09:25:27',NULL),(39,15,3,NULL,5,1,'2022-06-22 16:10:13','2022-06-22 16:15:01','2022-06-22 16:15:01'),(40,15,12,21,3,0,'2022-06-22 16:10:40','2022-06-22 16:10:40',NULL),(41,15,3,18,4,1,'2022-06-22 16:10:42','2022-06-22 16:12:13',NULL),(42,15,5,14,4,0,'2022-06-22 16:10:57','2022-06-22 16:10:57',NULL),(43,15,12,23,2,0,'2022-06-22 16:11:48','2022-06-22 16:11:48',NULL),(44,15,8,NULL,5,0,'2022-06-22 16:14:56','2022-06-22 16:20:58','2022-06-22 16:20:58'),(45,15,8,NULL,5,0,'2022-06-22 16:21:06','2022-06-22 16:21:06',NULL),(46,16,8,17,4,0,'2022-06-22 19:37:05','2022-06-22 19:37:05',NULL),(47,16,5,NULL,5,0,'2022-06-22 19:38:21','2022-06-22 19:38:21',NULL),(48,16,5,14,4,0,'2022-06-22 19:38:51','2022-06-22 19:38:51',NULL);
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id_post` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `fk_post` int unsigned DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pinged` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `posts_fk_user_foreign` (`fk_user`),
  KEY `posts_fk_post_foreign` (`fk_post`),
  CONSTRAINT `posts_fk_post_foreign` FOREIGN KEY (`fk_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,3,NULL,'MI PRIMER POST\n(y primer post de Freedom, jeje)',NULL,'2022-05-02 13:15:41','2022-06-02 15:00:28',1,NULL),(2,3,NULL,'mi primera imagen.','posts/hyRxpk6rsaTradROjqNJhQwe8A68intABM3OmBgB.png','2022-06-02 13:32:10','2022-06-02 13:58:46',0,'2022-06-02 13:58:46'),(3,3,NULL,'y que no falte, la primera imagen jeje\n\n(haciendo referencia al covid)','posts/VxxzWUI1dFfpEhvN7cu2RNijdaukGdDzIhEJVHPv.png','2022-06-02 13:59:10','2022-06-02 14:32:06',0,'2022-06-02 14:32:06'),(4,3,NULL,'y que no falte, la primera imagen jeje\n\n(haciendo referencia al covid)','posts/V1zlBXXTBf9n2IhKQkY3bDEFYBMAHW2NcK2ulqte.png','2022-06-02 14:32:11','2022-06-02 14:32:11',0,NULL),(5,4,NULL,'hola, soy un bot.',NULL,'2022-06-02 14:33:53','2022-06-02 14:33:53',0,NULL),(6,5,NULL,'^^',NULL,'2022-06-02 14:39:12','2022-06-02 14:39:12',0,NULL),(7,5,NULL,NULL,'posts/3EP3CeML5g6SiNlPTvjmfpif5wkBtmdT2caB5gmd.png','2022-06-02 14:43:45','2022-06-02 14:43:45',0,NULL),(8,5,4,NULL,'posts/Ui8up0XmksE2rBSMCgHBlKNU5OTn5prpjv6QJKWj.jpg','2022-06-02 14:45:20','2022-06-02 14:45:20',0,NULL),(9,5,6,NULL,'posts/Lj1dQtIbBRkEHiUMTmzI52Yk8Jwv4RLsJaQBo7a7.jpg','2022-06-02 14:46:03','2022-06-02 15:02:28',1,NULL),(10,3,8,'HAHAHAAHAH\n',NULL,'2022-06-02 14:49:09','2022-06-02 14:49:09',0,NULL),(11,3,NULL,'tengo que decir que @nico es bastante buena gente.',NULL,'2022-06-02 14:50:05','2022-06-02 14:50:05',0,NULL),(12,5,NULL,'Antonio es el mejor profesor que he tenido nunca. Espero que me apruebe 🤞',NULL,'2022-06-02 14:56:38','2022-06-02 15:02:28',0,NULL),(13,6,NULL,'Llueve en Galicia! Qué raro..','posts/ISSbyiodK46Hle8SVG4zrilTcPZreVMXxhR8nSrF.jpg','2022-06-02 14:56:49','2022-06-02 14:56:49',0,NULL),(14,5,11,'Padrea más si eso',NULL,'2022-06-02 14:56:58','2022-06-02 14:56:58',0,NULL),(15,7,NULL,'Omg idk if sebas is hacker or is only a troll.....',NULL,'2022-06-02 15:51:49','2022-06-02 15:53:15',1,NULL),(16,7,NULL,'Sebas is good doing a minecraft servers but he suck in league of legends. Btw hes training and he will \nto improve',NULL,'2022-06-02 15:54:28','2022-06-02 15:54:28',0,NULL),(17,8,NULL,'sebas es puta ',NULL,'2022-06-03 12:35:49','2022-06-03 12:35:49',0,NULL),(18,3,15,'both xd',NULL,'2022-06-04 10:14:43','2022-06-04 10:14:43',0,NULL),(19,10,NULL,'pene',NULL,'2022-06-05 14:49:17','2022-06-05 14:49:17',0,NULL),(20,10,19,'xdd',NULL,'2022-06-05 14:49:28','2022-06-05 14:49:28',0,NULL),(21,12,NULL,'hola',NULL,'2022-06-09 15:05:45','2022-06-09 15:05:45',0,NULL),(22,15,NULL,'mi primer post',NULL,'2022-06-22 16:10:36','2022-06-22 16:11:11',1,NULL),(23,15,21,'hola Antonio!',NULL,'2022-06-22 16:11:48','2022-06-22 16:11:48',0,NULL),(24,16,NULL,'Illo que dise',NULL,'2022-06-22 19:36:21','2022-06-22 19:36:21',0,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id_report` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `fk_post` int unsigned NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `fk_completedBy` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_report`),
  KEY `reports_fk_user_foreign` (`fk_user`),
  KEY `reports_fk_post_foreign` (`fk_post`),
  KEY `reports_fk_completedby_foreign` (`fk_completedBy`),
  CONSTRAINT `reports_fk_completedby_foreign` FOREIGN KEY (`fk_completedBy`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reports_fk_post_foreign` FOREIGN KEY (`fk_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reports_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,3,17,'mal comportamiento.\nNo podeis permitir estos comportamientos en esta aplicación, si no esto se volverá Twitter.',0,NULL,'2022-06-08 09:49:34','2022-06-08 09:49:34',NULL);
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reposts`
--

DROP TABLE IF EXISTS `reposts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reposts` (
  `id_repost` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_user` int unsigned NOT NULL,
  `fk_post` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_repost`),
  KEY `reposts_fk_user_foreign` (`fk_user`),
  KEY `reposts_fk_post_foreign` (`fk_post`),
  CONSTRAINT `reposts_fk_post_foreign` FOREIGN KEY (`fk_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reposts_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reposts`
--

LOCK TABLES `reposts` WRITE;
/*!40000 ALTER TABLE `reposts` DISABLE KEYS */;
INSERT INTO `reposts` VALUES (1,4,1,'2022-06-02 14:34:18','2022-06-02 14:34:18'),(3,7,15,'2022-06-02 15:52:47','2022-06-02 15:52:47'),(4,7,16,'2022-06-02 15:54:37','2022-06-02 15:54:37'),(5,3,17,'2022-06-03 15:05:16','2022-06-03 15:05:16'),(7,10,19,'2022-06-05 14:49:33','2022-06-05 14:49:33'),(8,10,20,'2022-06-05 14:49:34','2022-06-05 14:49:34'),(9,15,21,'2022-06-22 16:10:40','2022-06-22 16:10:40'),(10,16,24,'2022-06-22 19:38:11','2022-06-22 19:38:11');
/*!40000 ALTER TABLE `reposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id_rol` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rols`
--

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` VALUES (1,'user'),(2,'administrator'),(3,'god');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types-notifications`
--

DROP TABLE IF EXISTS `types-notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types-notifications` (
  `id_typeNot` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_typeNot`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types-notifications`
--

LOCK TABLES `types-notifications` WRITE;
/*!40000 ALTER TABLE `types-notifications` DISABLE KEYS */;
INSERT INTO `types-notifications` VALUES (1,'mention'),(2,'comment'),(3,'repost'),(4,'like'),(5,'follow');
/*!40000 ALTER TABLE `types-notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_rol` int unsigned NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_fk_rol_foreign` (`fk_rol`),
  CONSTRAINT `users_fk_rol_foreign` FOREIGN KEY (`fk_rol`) REFERENCES `rols` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,3,'Cbas','srcbas','sebastiangr456@gmail.com','$2y$10$HqjFdPZFYnrZhWpYxvmpNOGJfSPcD2Dcudq.HHJ0f4feeO2Eu0r5i','2001-12-03','2022-05-02 12:58:58','2022-06-08 10:02:30','users/yhgCHz73e9akkKvPnPpHlLWy6FAGvzph0KCvJscV.jpg','Only SrCbas.',NULL,0),(4,2,'Tester','test','tester@gmail.com','$2y$10$Al0ylzpwypLn8yXEcDNRS.TKd9FqqYobqx7s9RGF17z44DOvsXdAW','2001-12-02','2022-06-02 14:14:19','2022-06-22 16:41:19','users/FKSzeGSjKRZBvN4y7QgaiQ62aZ8FK1Gcue9VduQa.png','Hola, soy un bot de testeo :D',NULL,0),(5,1,'Nico','Nico','nicoms1306@gmail.com','$2y$10$edJDP1iwG7TGwK1ZDWv1fOKvg4DYH18XUW.bV7MS4vvsnG96uvD76',NULL,'2022-06-02 14:38:50','2022-06-02 14:42:20','users/T6Kvr1GqHskTihGCGU0xhpgnDBG7tgF0oWtk7CkF.jpg','Padreando',NULL,0),(6,1,'Krawer','Krawer','geevmechannel@gmail.com','$2y$10$is5MawoR21iIjlGuIjJgD.DsHLUZhlUkmgP2yZz7OS0yWReDU/Taq','1992-04-02','2022-06-02 14:55:47','2022-06-02 22:52:24','user.png',NULL,NULL,0),(7,1,'Cristian','merino','cmerino99@hotmail.com','$2y$10$ymnkGtnzrm/ufeQSqQ/t2.mN9XnOnl4YoiMiBnBpeCtgZEA2.vZOO','1999-08-13','2022-06-02 15:51:25','2022-06-02 15:51:25','user.png',NULL,NULL,0),(8,1,'illc0r3','illc0r3','aitanaalvarezsanchez@gmail.com','$2y$10$XcqMmM/lLvQNYH8kj.2EMef8U2FGjn5ifx9Lb0vXTMS76R5Ycei9y','2000-12-27','2022-06-03 12:34:43','2022-06-03 12:36:23','users/umcVpN1qexpM0vmhXBPps9dOWKG3jnDkOkMGXgDo.jpg',NULL,NULL,0),(9,1,'kevin','kevinmv75','kevinmillet30@gmail.com','$2y$10$L91j/MizHGBXQyvoNpl2yOGbGg85Meq9iHAFA21dbFPN4Le/oB6gi','2005-01-30','2022-06-03 12:43:01','2022-06-03 12:43:01','user.png',NULL,NULL,0),(10,1,'wwwwww','wwwwwwwwww','alexcuevasfer@gmail.com','$2y$10$CvxcOdgIu0aKVYBMPYJXEubHJzbHgDzA8mBLvHdiy.tGk0jPmIFt6','2022-06-01','2022-06-05 14:48:48','2022-06-05 14:48:48','user.png',NULL,NULL,0),(11,1,'Daniel Serrano Serrano','dannyserranoser','dannyserranoserrano@hotmail.com','$2y$10$94CWSTX9Lt9MTyoKIU/4pewUeTEWHrQ.Yh5egQscbEY3N7YykkseW','1982-07-09','2022-06-06 06:49:25','2022-06-06 06:49:25','user.png',NULL,NULL,0),(12,1,'Antonio','lopez','manolillo_x_inma@hotmail.com','$2y$10$7KBoyftkTkzuAkQPJCIslu6iRWXj9hD.enF55lDhci7OiGA57xbRK','2022-06-02','2022-06-09 15:05:01','2022-06-09 15:05:01','user.png',NULL,NULL,0),(13,1,'a','a','a@a.aa','$2y$10$VVwwrjmyyH2z7SrBIGoxhOVsPg/92VBtIz0X8lHO42D1Gog1pMSOq','2022-06-03','2022-06-17 10:24:26','2022-06-17 10:24:26','user.png',NULL,NULL,0),(14,1,'tdare','tdra','tdare@gmail.com','$2y$10$jrcTOJJdzx9RiDeE0AgtsuSNS.zFOggdnCezDxf/t8JteP9hG6l0K','2022-06-03','2022-06-22 09:42:08','2022-06-22 09:42:08','user.png',NULL,NULL,0),(15,2,'tu pedro chulito','pedrito','pedrito@gmail.com','$2y$10$kcNLjoKFVPYmx4w6E66dE.eGkVXqRjZ31P4aa/mtM5x2hYryEgv5a','1999-01-03','2022-06-22 16:09:47','2022-06-22 16:12:44','user.png','padreando',NULL,0),(16,1,'Gheorghe','ErGheorghe','georgebucu96@gmail.com','$2y$10$T0uJgeGu4U/ihv1LxuykB.6GdtTxJ0SHtwqhxiPIVBTHxEmeGk2zi','2022-06-09','2022-06-22 19:35:29','2022-06-22 19:37:57','users/hbn9Oukto5lBCsSQdcQAOUXPWypLymItSxSMcCua.jpg',NULL,NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warnings`
--

DROP TABLE IF EXISTS `warnings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warnings` (
  `id_warning` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_admin` int unsigned NOT NULL,
  `fk_user` int unsigned NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_warning`),
  KEY `warnings_fk_user_foreign` (`fk_user`),
  KEY `warnings_fk_admin_foreign` (`fk_admin`),
  CONSTRAINT `warnings_fk_admin_foreign` FOREIGN KEY (`fk_admin`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `warnings_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warnings`
--

LOCK TABLES `warnings` WRITE;
/*!40000 ALTER TABLE `warnings` DISABLE KEYS */;
INSERT INTO `warnings` VALUES (1,3,4,'Te portaste mal.',1,'2022-05-02 14:15:19','2022-06-02 14:15:37',NULL),(2,3,4,'Bastante mal, asi que por eso...',1,'2022-06-02 14:15:29','2022-06-02 14:15:37',NULL),(3,3,4,'BANEADO PUTO.',1,'2022-06-02 14:15:34','2022-06-02 14:16:05','2022-06-02 14:16:05'),(4,3,4,'banned.',1,'2022-06-02 14:33:26','2022-06-02 14:33:41','2022-06-02 14:33:41'),(5,15,4,'finalmente, te portaste\nmuy pero que muy mal.',1,'2022-06-22 16:13:16','2022-06-22 16:40:51','2022-06-22 16:40:51'),(6,15,5,'dddddddddddddddddddddddddddddddddddddddddddddddddd',0,'2022-06-22 16:16:56','2022-06-22 16:16:56',NULL),(7,15,4,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab',1,'2022-06-22 16:40:57','2022-06-22 16:41:19','2022-06-22 16:41:19');
/*!40000 ALTER TABLE `warnings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-23 11:27:07
