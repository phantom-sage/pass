-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pass
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB-

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `commentable_id` int(10) unsigned NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,1,'App\\Models\\Project',0,'hello','2020-09-29 04:25:42','2020-09-29 04:25:42'),(2,1,1,'App\\Models\\Story',0,'dfghjkl;','2020-10-05 14:54:13','2020-10-05 14:54:13'),(3,1,1,'App\\Models\\Story',2,'iiunknokiio','2020-10-05 14:54:48','2020-10-05 14:54:48'),(4,1,1,'App\\Models\\Story',0,'uhubbyby','2020-10-05 14:56:49','2020-10-05 14:56:49');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contacts_email_unique` (`email`),
  UNIQUE KEY `contacts_phone_unique` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,4,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(23,4,'name_en','text','Name En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(24,4,'name_ar','text','Name Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(25,4,'file','file','File',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(26,4,'date','date','Date',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(27,4,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',6),(28,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(29,5,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(30,5,'name_en','text','Name En',1,1,1,1,1,1,'{}',2),(31,5,'name_ar','text','Name Ar',1,1,1,1,1,1,'{}',3),(32,5,'description_en','text','Description En',1,1,1,1,1,1,'{}',4),(33,5,'description_ar','text','Description Ar',1,1,1,1,1,1,'{}',5),(34,5,'image','text','Image',0,1,1,1,1,1,'{}',6),(35,5,'video','file','Video',0,1,1,1,1,1,'{}',7),(36,5,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',8),(37,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(38,6,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(39,6,'full_name','text','Full Name',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(40,6,'organization','text','Organization',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(41,6,'organization_area','text','Organization Area',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(42,6,'email','text','Email',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|email|max:255\"}}',5),(43,6,'proposal','rich_text_box','Proposal',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(44,6,'replay','text','Replay',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"\"}}',7),(45,6,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',8),(46,6,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(47,7,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(48,7,'story_en','text','Story En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(49,7,'story_ar','text','Story Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(50,7,'description_en','rich_text_box','Description En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(51,7,'description_ar','rich_text_box','Description Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(52,7,'image','text','Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',6),(53,7,'video','file','Video',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"\"}}',7),(54,7,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',8),(55,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(56,8,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(57,8,'name_en','text','Name En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(58,8,'name_ar','text','Name Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(59,8,'logo','image','Logo',1,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',4),(60,8,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',5),(61,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(62,9,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(63,9,'name_en','text','Name En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(64,9,'name_ar','text','Name Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(65,9,'description_en','rich_text_box','Description En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(66,9,'description_ar','rich_text_box','Description Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(67,9,'image','text','Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',6),(68,9,'video','file','Video',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"\"}}',7),(69,9,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',8),(70,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(71,10,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(72,10,'name_en','text','Name En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(73,10,'name_ar','text','Name Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(74,10,'description_en','rich_text_box','Description En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(75,10,'description_ar','rich_text_box','Description Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(76,10,'qualification_en','rich_text_box','Qualification En',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(77,10,'qualification_ar','rich_text_box','Qualification Ar',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(78,10,'start_at','date','Start At',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',8),(79,10,'end_at','date','End At',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(80,10,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',10),(81,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',11),(82,11,'id','text','Id',1,0,0,0,0,0,'{}',1),(83,11,'full_name','text','Full Name',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(84,11,'work_place','text','Work Place',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(85,11,'email','text','Email',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|email|max:255\"}}',5),(86,11,'phone','text','Phone',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(87,11,'age','text','Age',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(88,11,'gender','radio_btn','Gender',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"},\"default\":\"mail\",\"options\":{\"mail\":\"mail\",\"femail\":\"femail\",\"other\":\"other\"}}',8),(89,11,'qualification','text','Qualification',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(90,11,'replay','text','Replay',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"\"}}',10),(91,11,'volunteer_id','hidden','Volunteer Id',1,1,1,1,1,1,'{}',2),(92,11,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',11),(93,11,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),(94,12,'id','hidden','Id',1,0,0,0,0,0,'{}',1),(95,12,'name','text','Name',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(96,12,'email','text','Email',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|email|max:255\"}}',3),(97,12,'phone','text','Phone',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|min:10|max:10\"}}',4),(98,12,'job','text','Job',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(99,12,'image','image','Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',6),(100,12,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',7),(101,12,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(102,10,'volunteer_hasmany_volunteer_request_relationship','relationship','volunteer_requests',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\VolunteerRequest\",\"table\":\"volunteer_requests\",\"type\":\"hasMany\",\"column\":\"volunteer_id\",\"key\":\"id\",\"label\":\"full_name\",\"pivot_table\":\"comments\",\"pivot\":\"0\",\"taggable\":\"0\"}',12),(103,11,'volunteer_request_belongsto_volunteer_relationship','relationship','volunteers',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Volunteer\",\"table\":\"volunteers\",\"type\":\"belongsTo\",\"column\":\"volunteer_id\",\"key\":\"id\",\"label\":\"name_en\",\"pivot_table\":\"comments\",\"pivot\":\"0\",\"taggable\":\"0\"}',13);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2020-09-29 03:48:56','2020-09-29 03:48:56'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2020-09-29 03:48:56','2020-09-29 03:48:56'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2020-09-29 03:48:56','2020-09-29 03:48:56'),(4,'files','files','File','Files','voyager-folder','App\\Models\\File',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2020-09-29 04:42:30','2020-09-29 04:42:30'),(5,'news','news','News','News','voyager-news','App\\Models\\News',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-10-03 09:22:09','2020-10-28 05:25:58'),(6,'partner_requests','partner-requests','Partner Request','Partner Requests',NULL,'App\\Models\\PartnerRequest',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2020-10-28 04:17:44','2020-10-28 04:17:44'),(7,'stories','stories','Story','Stories',NULL,'App\\Models\\Story',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-10-28 04:20:30','2020-10-28 05:26:24'),(8,'partners','partners','Partner','Partners','voyager-activity','App\\Models\\Partner',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-10-28 04:22:29','2020-10-28 04:36:14'),(9,'projects','projects','Project','Projects','voyager-project','App\\Models\\Project',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-10-28 04:24:04','2020-10-28 05:25:37'),(10,'volunteers','volunteers','Volunteer','Volunteers',NULL,'App\\Models\\Volunteer',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-10-28 04:27:07','2020-10-28 04:39:53'),(11,'volunteer_requests','volunteer-requests','Volunteer Request','Volunteer Requests',NULL,'App\\Models\\VolunteerRequest',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-10-28 04:30:27','2020-10-28 04:41:27'),(12,'contacts','contacts','Contact','Contacts','voyager-people','App\\Models\\Contact',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2020-10-28 04:34:39','2020-10-28 04:34:39');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloades`
--

DROP TABLE IF EXISTS `downloades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` bigint(20) unsigned NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `downloades_file_id_foreign` (`file_id`),
  CONSTRAINT `downloades_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloades`
--

LOCK TABLES `downloades` WRITE;
/*!40000 ALTER TABLE `downloades` DISABLE KEYS */;
INSERT INTO `downloades` VALUES (1,3,1,'2020-09-29 08:28:37','2020-09-29 08:28:37'),(2,4,2,'2020-09-29 08:32:44','2020-10-02 04:26:59'),(3,5,1,'2020-09-29 08:33:56','2020-09-29 08:33:56'),(4,2,1,'2020-10-28 04:13:38','2020-10-28 04:13:38');
/*!40000 ALTER TABLE `downloades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (2,'Kelton Schowalter','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/bz3OcWBa66sf5KSw2ACr.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1986-10-13','2020-09-29 03:46:00','2020-09-29 04:44:22'),(3,'Oda Breitenberg','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/Gpumv2mkuL1eeVJ28u9t.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','2009-08-27','2020-09-29 03:46:00','2020-09-29 04:43:39'),(4,'Hailie Bergnaum','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/kKSC8CeBhNqPqgHeNpz7.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1985-05-05','2020-09-29 03:46:00','2020-09-29 04:42:48'),(5,'Marjorie Bogisich III','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/McPuHln5VbCyxSKVxylA.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1993-04-26','2020-09-29 03:46:00','2020-09-29 04:42:59'),(6,'Catharine Pacocha','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/dvpv5oYnDP3fkkmbPjYt.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1987-08-27','2020-09-29 03:46:00','2020-09-29 04:43:23'),(7,'Ms. Dominique Champlin','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/uvCwxR9rZYSAgcyxFGlD.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1977-03-09','2020-09-29 03:46:00','2020-09-29 04:43:49'),(8,'Alanis Volkman','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/VWIz3KVQSsexNLofqMhR.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1981-02-15','2020-09-29 03:46:00','2020-09-29 04:43:58'),(9,'Terrell Ebert','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/woLmsbcYTLbk1xkS1h84.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1981-07-08','2020-09-29 03:46:00','2020-09-29 04:44:05'),(10,'Bailee Smith','اسم الملف بالعربي','[{\"download_link\":\"files\\/September2020\\/uKYNoBzpz1GhL2Ra2A7z.pdf\",\"original_name\":\"4_5765147735430793408.pdf\"}]','1974-02-24','2020-09-29 03:46:00','2020-09-29 04:44:12');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `likeable_id` int(10) unsigned NOT NULL,
  `likeable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,1,1,'App\\Models\\Project',1,'2020-09-29 04:25:48','2020-09-29 04:25:48'),(2,1,1,'App\\Models\\Story',1,'2020-10-05 14:59:30','2020-10-05 14:59:30');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2020-09-29 03:48:58','2020-09-29 03:48:58','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,4,'2020-09-29 03:48:58','2020-10-28 04:42:27','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2020-09-29 03:48:58','2020-09-29 03:48:58','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2020-09-29 03:48:58','2020-09-29 03:48:58','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,14,'2020-09-29 03:48:58','2020-10-28 04:43:00',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2020-09-29 03:48:58','2020-10-28 04:42:27','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,2,'2020-09-29 03:48:59','2020-10-28 04:42:27','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2020-09-29 03:48:59','2020-10-28 04:42:27','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2020-09-29 03:48:59','2020-10-28 04:42:27','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,15,'2020-09-29 03:48:59','2020-10-28 04:43:00','voyager.settings.index',NULL),(11,1,'Hooks','','_self','voyager-hook',NULL,5,5,'2020-09-29 03:49:04','2020-10-28 04:42:27','voyager.hooks',NULL),(12,1,'Files','','_self','voyager-folder',NULL,NULL,8,'2020-09-29 04:42:30','2020-10-28 04:43:28','voyager.files.index',NULL),(13,1,'News','','_self',NULL,NULL,NULL,7,'2020-10-03 09:22:09','2020-10-28 04:43:28','voyager.news.index',NULL),(14,1,'Partner Requests','','_self',NULL,NULL,NULL,9,'2020-10-28 04:17:45','2020-10-28 04:43:23','voyager.partner-requests.index',NULL),(15,1,'Stories','','_self',NULL,NULL,NULL,6,'2020-10-28 04:20:31','2020-10-28 04:43:28','voyager.stories.index',NULL),(16,1,'Partners','','_self',NULL,NULL,NULL,11,'2020-10-28 04:22:29','2020-10-28 04:43:11','voyager.partners.index',NULL),(17,1,'Projects','','_self',NULL,NULL,NULL,5,'2020-10-28 04:24:04','2020-10-28 04:43:28','voyager.projects.index',NULL),(18,1,'Volunteers','','_self',NULL,NULL,NULL,12,'2020-10-28 04:27:07','2020-10-28 04:43:07','voyager.volunteers.index',NULL),(19,1,'Volunteer Requests','','_self',NULL,NULL,NULL,10,'2020-10-28 04:30:27','2020-10-28 04:43:23','voyager.volunteer-requests.index',NULL),(20,1,'Contacts','','_self','voyager-people',NULL,NULL,13,'2020-10-28 04:34:40','2020-10-28 04:43:07','voyager.contacts.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2020-09-29 03:48:58','2020-09-29 03:48:58');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2016_01_01_000000_add_voyager_user_fields',1),(5,'2016_01_01_000000_create_data_types_table',1),(6,'2016_05_19_173453_create_menu_table',1),(7,'2016_10_21_190000_create_roles_table',1),(8,'2016_10_21_190000_create_settings_table',1),(9,'2016_11_30_135954_create_permission_table',1),(10,'2016_11_30_141208_create_permission_role_table',1),(11,'2016_12_26_201236_data_types__add__server_side',1),(12,'2017_01_13_000000_add_route_to_menu_items_table',1),(13,'2017_01_14_005015_create_translations_table',1),(14,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(15,'2017_03_06_000000_add_controller_to_data_types_table',1),(16,'2017_04_21_000000_add_order_to_data_rows_table',1),(17,'2017_07_05_210000_add_policyname_to_data_types_table',1),(18,'2017_08_05_000000_add_group_to_settings_table',1),(19,'2017_11_26_013050_add_user_role_relationship',1),(20,'2017_11_26_015000_create_user_roles_table',1),(21,'2018_03_11_000000_add_user_settings',1),(22,'2018_03_14_000000_add_details_to_data_types_table',1),(23,'2018_03_16_000000_make_settings_value_nullable',1),(24,'2019_08_19_000000_create_failed_jobs_table',1),(25,'2019_12_14_000001_create_personal_access_tokens_table',1),(26,'2020_05_21_100000_create_teams_table',1),(27,'2020_05_21_200000_create_team_user_table',1),(28,'2020_09_13_135207_create_projects_table',1),(29,'2020_09_13_135216_create_news_table',1),(30,'2020_09_13_135223_create_stories_table',1),(31,'2020_09_13_135241_create_files_table',1),(32,'2020_09_13_135253_create_volunteers_table',1),(33,'2020_09_13_135312_create_comments_table',1),(34,'2020_09_13_135313_create_likes_table',1),(35,'2020_09_13_135334_create_contacts_table',1),(36,'2020_09_13_135443_create_volunteer_requests_table',1),(37,'2020_09_13_137349_create_messages_table',1),(38,'2020_09_13_145232_create_partner_requests_table',1),(39,'2020_09_13_145301_create_partners_table',1),(40,'2020_09_15_041643_create_sessions_table',1),(41,'2020_09_16_134814_create_shares_table',1),(42,'2020_09_25_065858_create_seens_table',1),(43,'2020_09_27_120451_create_vistors_table',1),(44,'2020_09_29_033200_create_downloades_table',1),(45,'2020_09_29_033201_create_downloades_table',2),(46,'2020_09_13_135206_create_projects_table',3),(47,'2020_09_13_135215_create_news_table',3),(48,'2020_09_13_135222_create_stories_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'consectetur','عنوان الخبر بالعربي','Facere doloremque tempore voluptatem aliquid laudantium eum ad odit. Quos inventore voluptas ex id.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(2,'quo','عنوان الخبر بالعربي','Ut iste adipisci et natus et magnam.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(3,'consequatur','عنوان الخبر بالعربي','Possimus nulla ex facilis est. Maxime nobis illum aspernatur.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(4,'et','عنوان الخبر بالعربي','Odio tempora quos repellendus harum tempore temporibus qui. Et molestiae quia omnis voluptate aut exercitationem.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(5,'tempora','عنوان الخبر بالعربي','Rerum et sequi qui deserunt ut blanditiis et id. Consequatur voluptatem ex voluptatem qui pariatur dolores.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(6,'dolores','عنوان الخبر بالعربي','Necessitatibus temporibus necessitatibus et itaque necessitatibus dolores ut.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(7,'non','عنوان الخبر بالعربي','Et animi nobis asperiores blanditiis voluptatem omnis amet.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(8,'at','عنوان الخبر بالعربي','Veniam nemo sint mollitia laboriosam voluptas excepturi. Omnis enim non consequuntur id.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(9,'laudantium','عنوان الخبر بالعربي','Est beatae rerum error ut debitis sit et.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(10,'beatae','عنوان الخبر بالعربي','Autem nihil aut magni consequatur facilis.','محتوى الخبر بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_requests`
--

DROP TABLE IF EXISTS `partner_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `replay` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_requests`
--

LOCK TABLES `partner_requests` WRITE;
/*!40000 ALTER TABLE `partner_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'Ms. Arvilla KozeyEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:48','2020-09-29 03:45:48'),(2,'Coralie MayertEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(3,'Mr. Avery Dooley Jr.En','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(4,'Trace Erdman PhDEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(5,'Zachary Heller IVEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(6,'Prof. Roma SchulistEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(7,'Mr. Lionel Krajcik IIEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(8,'Dortha BrekkeEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(9,'Marcelle MullerEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49'),(10,'Mr. Sven Beatty IEn','اسم الشريك بالعربي','img/01.jpg','2020-09-29 03:45:49','2020-09-29 03:45:49');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-09-29 03:48:59','2020-09-29 03:48:59'),(2,'browse_bread',NULL,'2020-09-29 03:48:59','2020-09-29 03:48:59'),(3,'browse_database',NULL,'2020-09-29 03:48:59','2020-09-29 03:48:59'),(4,'browse_media',NULL,'2020-09-29 03:48:59','2020-09-29 03:48:59'),(5,'browse_compass',NULL,'2020-09-29 03:48:59','2020-09-29 03:48:59'),(6,'browse_menus','menus','2020-09-29 03:48:59','2020-09-29 03:48:59'),(7,'read_menus','menus','2020-09-29 03:48:59','2020-09-29 03:48:59'),(8,'edit_menus','menus','2020-09-29 03:48:59','2020-09-29 03:48:59'),(9,'add_menus','menus','2020-09-29 03:49:00','2020-09-29 03:49:00'),(10,'delete_menus','menus','2020-09-29 03:49:00','2020-09-29 03:49:00'),(11,'browse_roles','roles','2020-09-29 03:49:00','2020-09-29 03:49:00'),(12,'read_roles','roles','2020-09-29 03:49:00','2020-09-29 03:49:00'),(13,'edit_roles','roles','2020-09-29 03:49:00','2020-09-29 03:49:00'),(14,'add_roles','roles','2020-09-29 03:49:00','2020-09-29 03:49:00'),(15,'delete_roles','roles','2020-09-29 03:49:00','2020-09-29 03:49:00'),(16,'browse_users','users','2020-09-29 03:49:00','2020-09-29 03:49:00'),(17,'read_users','users','2020-09-29 03:49:00','2020-09-29 03:49:00'),(18,'edit_users','users','2020-09-29 03:49:00','2020-09-29 03:49:00'),(19,'add_users','users','2020-09-29 03:49:00','2020-09-29 03:49:00'),(20,'delete_users','users','2020-09-29 03:49:00','2020-09-29 03:49:00'),(21,'browse_settings','settings','2020-09-29 03:49:00','2020-09-29 03:49:00'),(22,'read_settings','settings','2020-09-29 03:49:00','2020-09-29 03:49:00'),(23,'edit_settings','settings','2020-09-29 03:49:00','2020-09-29 03:49:00'),(24,'add_settings','settings','2020-09-29 03:49:00','2020-09-29 03:49:00'),(25,'delete_settings','settings','2020-09-29 03:49:01','2020-09-29 03:49:01'),(26,'browse_hooks',NULL,'2020-09-29 03:49:04','2020-09-29 03:49:04'),(27,'browse_files','files','2020-09-29 04:42:30','2020-09-29 04:42:30'),(28,'read_files','files','2020-09-29 04:42:30','2020-09-29 04:42:30'),(29,'edit_files','files','2020-09-29 04:42:30','2020-09-29 04:42:30'),(30,'add_files','files','2020-09-29 04:42:30','2020-09-29 04:42:30'),(31,'delete_files','files','2020-09-29 04:42:30','2020-09-29 04:42:30'),(32,'browse_news','news','2020-10-03 09:22:09','2020-10-03 09:22:09'),(33,'read_news','news','2020-10-03 09:22:09','2020-10-03 09:22:09'),(34,'edit_news','news','2020-10-03 09:22:09','2020-10-03 09:22:09'),(35,'add_news','news','2020-10-03 09:22:09','2020-10-03 09:22:09'),(36,'delete_news','news','2020-10-03 09:22:09','2020-10-03 09:22:09'),(37,'browse_partner_requests','partner_requests','2020-10-28 04:17:45','2020-10-28 04:17:45'),(38,'read_partner_requests','partner_requests','2020-10-28 04:17:45','2020-10-28 04:17:45'),(39,'edit_partner_requests','partner_requests','2020-10-28 04:17:45','2020-10-28 04:17:45'),(40,'add_partner_requests','partner_requests','2020-10-28 04:17:45','2020-10-28 04:17:45'),(41,'delete_partner_requests','partner_requests','2020-10-28 04:17:45','2020-10-28 04:17:45'),(42,'browse_stories','stories','2020-10-28 04:20:31','2020-10-28 04:20:31'),(43,'read_stories','stories','2020-10-28 04:20:31','2020-10-28 04:20:31'),(44,'edit_stories','stories','2020-10-28 04:20:31','2020-10-28 04:20:31'),(45,'add_stories','stories','2020-10-28 04:20:31','2020-10-28 04:20:31'),(46,'delete_stories','stories','2020-10-28 04:20:31','2020-10-28 04:20:31'),(47,'browse_partners','partners','2020-10-28 04:22:29','2020-10-28 04:22:29'),(48,'read_partners','partners','2020-10-28 04:22:29','2020-10-28 04:22:29'),(49,'edit_partners','partners','2020-10-28 04:22:29','2020-10-28 04:22:29'),(50,'add_partners','partners','2020-10-28 04:22:29','2020-10-28 04:22:29'),(51,'delete_partners','partners','2020-10-28 04:22:29','2020-10-28 04:22:29'),(52,'browse_projects','projects','2020-10-28 04:24:04','2020-10-28 04:24:04'),(53,'read_projects','projects','2020-10-28 04:24:04','2020-10-28 04:24:04'),(54,'edit_projects','projects','2020-10-28 04:24:04','2020-10-28 04:24:04'),(55,'add_projects','projects','2020-10-28 04:24:04','2020-10-28 04:24:04'),(56,'delete_projects','projects','2020-10-28 04:24:04','2020-10-28 04:24:04'),(57,'browse_volunteers','volunteers','2020-10-28 04:27:07','2020-10-28 04:27:07'),(58,'read_volunteers','volunteers','2020-10-28 04:27:07','2020-10-28 04:27:07'),(59,'edit_volunteers','volunteers','2020-10-28 04:27:07','2020-10-28 04:27:07'),(60,'add_volunteers','volunteers','2020-10-28 04:27:07','2020-10-28 04:27:07'),(61,'delete_volunteers','volunteers','2020-10-28 04:27:07','2020-10-28 04:27:07'),(62,'browse_volunteer_requests','volunteer_requests','2020-10-28 04:30:27','2020-10-28 04:30:27'),(63,'read_volunteer_requests','volunteer_requests','2020-10-28 04:30:27','2020-10-28 04:30:27'),(64,'edit_volunteer_requests','volunteer_requests','2020-10-28 04:30:27','2020-10-28 04:30:27'),(65,'add_volunteer_requests','volunteer_requests','2020-10-28 04:30:27','2020-10-28 04:30:27'),(66,'delete_volunteer_requests','volunteer_requests','2020-10-28 04:30:27','2020-10-28 04:30:27'),(67,'browse_contacts','contacts','2020-10-28 04:34:40','2020-10-28 04:34:40'),(68,'read_contacts','contacts','2020-10-28 04:34:40','2020-10-28 04:34:40'),(69,'edit_contacts','contacts','2020-10-28 04:34:40','2020-10-28 04:34:40'),(70,'add_contacts','contacts','2020-10-28 04:34:40','2020-10-28 04:34:40'),(71,'delete_contacts','contacts','2020-10-28 04:34:40','2020-10-28 04:34:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'nisi','اسم المشروع بالعربي','Illo magni officia quis earum aperiam.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:34','2020-10-28 05:18:34'),(2,'porro','اسم المشروع بالعربي','<p>Architecto sint officiis nesciunt debitis similique labore. Ut ut non deleniti doloremque rerum et laborum.</p>','<p>محتوى المشروع بالعربي</p>',NULL,'[{\"download_link\":\"projects\\/October2020\\/B83KTaiC9IGtaKjlV2pT.mp4\",\"original_name\":\"WhatsApp Video 2020-09-08 at 2.56.57 AM.mp4\"}]','2020-10-28 05:18:00','2020-10-28 05:33:03'),(3,'quia','اسم المشروع بالعربي','Quos aut suscipit assumenda facere rerum. Vel odio ipsa voluptatibus laborum.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(4,'dolores','اسم المشروع بالعربي','Sit nihil laboriosam rerum ratione mollitia. Veritatis qui cumque commodi sed ab dolorem eos.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(5,'illo','اسم المشروع بالعربي','Aut sit quas non. Quos fugit molestiae nam asperiores sequi et eveniet.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(6,'corporis','اسم المشروع بالعربي','Aliquam omnis incidunt placeat repellendus. Voluptatem voluptatem quidem ipsam.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(7,'omnis','اسم المشروع بالعربي','Non sequi doloribus minima non ut voluptatum. Sit aut ratione dignissimos numquam itaque nihil ea necessitatibus.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(8,'fugiat','اسم المشروع بالعربي','Ad quibusdam provident incidunt distinctio.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(9,'labore','اسم المشروع بالعربي','Quaerat excepturi et qui id.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(10,'ducimus','اسم المشروع بالعربي','Molestiae qui rem sint rem provident aut. Consequatur ipsum vitae doloribus animi et est omnis.','محتوى المشروع بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-09-29 03:39:40','2020-09-29 03:39:40'),(2,'user','Normal User','2020-09-29 03:48:59','2020-09-29 03:48:59');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seens`
--

DROP TABLE IF EXISTS `seens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `seenable_id` int(10) unsigned NOT NULL,
  `seenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seens`
--

LOCK TABLES `seens` WRITE;
/*!40000 ALTER TABLE `seens` DISABLE KEYS */;
INSERT INTO `seens` VALUES (1,1,1,'App\\Models\\Project',1,'2020-09-29 04:25:16','2020-09-29 04:25:16'),(2,NULL,1,'App\\Models\\Project',1,'2020-10-02 04:25:39','2020-10-02 04:25:39'),(3,1,10,'App\\Models\\News',1,'2020-10-03 09:23:15','2020-10-03 09:23:15'),(4,1,1,'App\\Models\\News',1,'2020-10-03 09:24:12','2020-10-03 09:24:12'),(5,NULL,1,'App\\Models\\Project',1,'2020-10-05 14:34:11','2020-10-05 14:34:11'),(6,NULL,2,'App\\Models\\Project',1,'2020-10-05 14:49:20','2020-10-05 14:49:20'),(7,0,1,'App\\Models\\Story',1,'2020-10-05 14:53:19','2020-10-05 14:53:19'),(8,1,9,'App\\Models\\Story',1,'2020-10-05 15:16:15','2020-10-05 15:16:15'),(9,NULL,1,'App\\Models\\Project',1,'2020-10-08 11:13:14','2020-10-08 11:13:14'),(10,1,1,'App\\Models\\News',1,'2020-10-08 11:17:15','2020-10-08 11:17:15'),(11,NULL,1,'App\\Models\\Project',1,'2020-10-10 10:56:48','2020-10-10 10:56:48'),(12,1,1,'App\\Models\\News',1,'2020-10-10 10:57:50','2020-10-10 10:57:50'),(13,1,5,'App\\Models\\News',1,'2020-10-10 10:58:24','2020-10-10 10:58:24'),(14,1,2,'App\\Models\\News',1,'2020-10-10 10:58:48','2020-10-10 10:58:48'),(15,NULL,1,'App\\Models\\Project',1,'2020-10-28 04:01:49','2020-10-28 04:01:49'),(16,0,2,'App\\Models\\News',1,'2020-10-28 04:04:37','2020-10-28 04:04:37'),(17,0,2,'App\\Models\\Story',1,'2020-10-28 04:08:00','2020-10-28 04:08:00'),(18,0,1,'App\\Models\\Story',1,'2020-10-28 04:08:25','2020-10-28 04:08:25'),(19,1,5,'App\\Models\\News',1,'2020-10-28 05:23:00','2020-10-28 05:23:00'),(20,1,2,'App\\Models\\Project',1,'2020-10-28 05:33:17','2020-10-28 05:33:17'),(21,1,3,'App\\Models\\Project',1,'2020-10-28 19:07:14','2020-10-28 19:07:14'),(22,1,2,'App\\Models\\Story',1,'2020-10-28 19:07:40','2020-10-28 19:07:40');
/*!40000 ALTER TABLE `seens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('2Wf1y3bRpg8JZKCaPDcnBJEZeH36A5lA7B83mf7A',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','YToxMjp7czo2OiJfdG9rZW4iO3M6NDA6InFHeDVEak01MGVmVmVXd3Z4SHNqbnEzdHFHUlpyeVFaYWpwbGtKb08iO3M6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZW4vdXNlcnMvcHJvamVjdHMvMi9zaG93Ijt9czo4OiJwcm9qZWN0MSI7aToxO3M6NToibmV3czIiO2k6MTtzOjY6InN0b3J5MiI7aToxO3M6Njoic3RvcnkxIjtpOjE7czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRFWlNOSWlTY2h1WGNtVnU3ZTEwbktPTlEvZE02cEgvd3JqazJCeXBTODdYekwxRm1NbWxyUyI7czo1OiJuZXdzNSI7aToxO3M6ODoicHJvamVjdDIiO2k6MTt9',1603863197),('CizJbDmnW3ik1vYsXCGlRaPYtCWEuAU0LJ8v7Mpj',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUtLYXZHbkExSDNOZmdVUDB2MGdzTjN6RFZ1cEJ6eVhzcWtjNTJIUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbi91c2Vycy9maWxlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1603919395),('GqD1S2uzXKK7zHrkP12qqbk5KdEoKKa2OIcHbwhR',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiTGtJbk5ZSXlSeTNabWVBSjlDNkFYejFpaElCdml4OVIwaGZDeTBuUyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZW4vdXNlcnMvc3Rvcmllcy8yL3Nob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkRVpTTklpU2NodVhjbVZ1N2UxMG5LT05RL2RNNnBIL3dyamsyQnlwUzg3WHpMMUZtTW1sclMiO3M6ODoicHJvamVjdDMiO2k6MTtzOjY6InN0b3J5MiI7aToxO30=',1603912060),('xpyC3AIVsr3M7y4tz1Ii1PYXP4Qur91gjaIIBC5b',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYk1LMjV5TmhkWnNHSHE2U1ZOb1ZHNDFwTk1lSTFXeUFLT3hRU1J4WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi92b3lhZ2VyLWFzc2V0cz9wYXRoPWZvbnRzJTJGdm95YWdlci53b2ZmIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1603858385);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shares`
--

DROP TABLE IF EXISTS `shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shares` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `shareable_id` int(10) unsigned NOT NULL,
  `shareable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shares`
--

LOCK TABLES `shares` WRITE;
/*!40000 ALTER TABLE `shares` DISABLE KEYS */;
/*!40000 ALTER TABLE `shares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `story_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories`
--

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
INSERT INTO `stories` VALUES (1,'cumque','القصة بالعربي','In fugit sed ratione suscipit et.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(2,'non','القصة بالعربي','Id consequatur repudiandae voluptas eaque ipsa omnis eum. Labore et molestias sint iure suscipit placeat.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(3,'labore','القصة بالعربي','Quia voluptatem modi distinctio. Delectus reiciendis unde modi rerum qui et.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(4,'dolore','القصة بالعربي','Eveniet dolorem eum enim. Et reiciendis saepe voluptatem placeat dignissimos.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(5,'omnis','القصة بالعربي','Necessitatibus eaque voluptas magni dolorum aut vero quod.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(6,'facere','القصة بالعربي','Laborum dolorem libero est ratione ex rerum.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:35','2020-10-28 05:18:35'),(7,'sed','القصة بالعربي','Blanditiis beatae rerum ea explicabo tempora aut aliquid.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(8,'voluptatem','القصة بالعربي','Et est quo fuga commodi quo soluta deserunt et.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(9,'sunt','القصة بالعربي','Qui at dolor laborum voluptas quasi repellendus consequuntur. Voluptates dolore ut veritatis commodi.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36'),(10,'officia','القصة بالعربي','Aut omnis voluptate repudiandae ab. Occaecati commodi quidem rerum quis.','وصف القصة بالعربي',NULL,'','2020-10-28 05:18:36','2020-10-28 05:18:36');
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_user`
--

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `current_team_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'sas','sas@email.com','users/default.png',NULL,'$2y$10$EZSNIiSchuXcmVu7e10nKONQ/dM6pH/wrjk2BypS87XzL1FmMmlrS',NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 03:39:39','2020-09-29 03:39:40'),(2,NULL,'Prof. London Bergstrom Sr.','nayeli.marvin@example.org','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'ztPRBNb4ms',NULL,NULL,NULL,'2020-09-29 03:46:09','2020-09-29 03:46:09'),(3,NULL,'Celine Kautzer','eulalia29@example.com','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'uxvTTMQzM6',NULL,NULL,NULL,'2020-09-29 03:46:09','2020-09-29 03:46:09'),(4,NULL,'Edgar Kuvalis','lhoppe@example.com','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'4c2UeQCaOU',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10'),(5,NULL,'Prof. Enrique Bechtelar','vharris@example.org','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'DG8OGQlNPv',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10'),(6,NULL,'Kaylah Lang','herman.else@example.org','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'mGnP7QbDPC',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10'),(7,NULL,'Dr. Keyon Greenholt','reilly.margarette@example.net','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'0nI9Cynzb6',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10'),(8,NULL,'Dr. Laverna O\'Kon','genevieve.kunze@example.net','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'pw14S3nkUk',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10'),(9,NULL,'Miss Ernestine Rosenbaum','bins.evie@example.org','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'BHnMqaluBF',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10'),(10,NULL,'Janae Bayer V','violet25@example.org','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'Q74QdOjq48',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10'),(11,NULL,'Noemy Dare','athena29@example.net','users/default.png','2020-09-29 03:46:09','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'8cGRPWIgDj',NULL,NULL,NULL,'2020-09-29 03:46:10','2020-09-29 03:46:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vistors`
--

DROP TABLE IF EXISTS `vistors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vistors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vists` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vistors_session_id_unique` (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vistors`
--

LOCK TABLES `vistors` WRITE;
/*!40000 ALTER TABLE `vistors` DISABLE KEYS */;
INSERT INTO `vistors` VALUES (1,'hZYKgKbW1UFo2KrcaxdK8Zh3JrZEoqKHSyHGwb7w',1,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-09-29','2020-09-29 03:44:08','2020-09-29 03:44:08'),(2,'7wvFIUCgFiPYgMXwbDAwuCQckI7XMnR5N7YtPeRv',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-02','2020-10-02 04:23:16','2020-10-02 04:23:16'),(3,'h7E73wuWjHzwFpfXqRU5c5feFpwybIHXhgfgloJl',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-03','2020-10-03 07:27:41','2020-10-03 07:27:41'),(4,'XjzYtdC9j79YrVfvMEVoUdqjVLfwed43CXqW4TAj',1,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-03','2020-10-03 09:23:02','2020-10-03 09:23:02'),(5,'S9Vjfbo3PYAHx4bSM2Q1bwroeHkpCs2rVsx0XICd',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-05','2020-10-05 14:33:41','2020-10-05 14:33:41'),(6,'QijMaT7xEgci45xZoVgOr3Wp06ZXp7b0lAKXQdrJ',1,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-05','2020-10-05 14:54:05','2020-10-05 14:54:05'),(7,'78o5zfNJZ2XwM9Wcvoc7OKucfBx56ptuklvWwHtl',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-08','2020-10-08 11:12:58','2020-10-08 11:12:58'),(8,'rRhCnh1l6EtV7B4cBXOE5MMFb2cRLWH0vxKFU6G5',1,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-08','2020-10-08 11:17:08','2020-10-08 11:17:08'),(9,'sle7MBbyd3fwcrsyqTNy6ov0X0P5kr5x0manUI4U',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-08','2020-10-08 11:17:55','2020-10-08 11:17:55'),(10,'0mxLwmRGNz28mvMvAYdW2zJzWoqeaX4qIebI0Pze',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-10','2020-10-10 10:56:02','2020-10-10 10:56:02'),(11,'OrMDse0Lq2rHgjpuhhpv0kmNn5diAOFWw700qDP9',1,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-10','2020-10-10 10:57:39','2020-10-10 10:57:39'),(12,'ynxuZqv078SPVzz1cPIKK5dVA6aoLg8F7XybGWBB',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-14','2020-10-14 17:03:25','2020-10-14 17:03:25'),(13,'kVrbIu0lz0Xs5MdagWDZIId4vRf249yT8M46neUI',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-19','2020-10-19 12:06:26','2020-10-19 12:06:26'),(14,'WahAf1Cwk34fz9VhGKC4HZBywAy6jf7V3tMYjYju',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-27','2020-10-27 07:59:47','2020-10-27 07:59:47'),(15,'xpyC3AIVsr3M7y4tz1Ii1PYXP4Qur91gjaIIBC5b',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-28','2020-10-28 04:00:45','2020-10-28 04:00:45'),(16,'2Wf1y3bRpg8JZKCaPDcnBJEZeH36A5lA7B83mf7A',1,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-28','2020-10-28 04:13:26','2020-10-28 04:13:26'),(17,'GqD1S2uzXKK7zHrkP12qqbk5KdEoKKa2OIcHbwhR',1,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-28','2020-10-28 19:07:06','2020-10-28 19:07:06'),(18,'CizJbDmnW3ik1vYsXCGlRaPYtCWEuAU0LJ8v7Mpj',NULL,'127.0.0.1','1','Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0','2020-10-28','2020-10-28 21:09:54','2020-10-28 21:09:54');
/*!40000 ALTER TABLE `vistors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteer_requests`
--

DROP TABLE IF EXISTS `volunteer_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteer_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `replay` longtext COLLATE utf8mb4_unicode_ci,
  `volunteer_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `volunteer_requests_volunteer_id_foreign` (`volunteer_id`),
  CONSTRAINT `volunteer_requests_volunteer_id_foreign` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteer_requests`
--

LOCK TABLES `volunteer_requests` WRITE;
/*!40000 ALTER TABLE `volunteer_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `volunteer_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteers`
--

DROP TABLE IF EXISTS `volunteers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteers`
--

LOCK TABLES `volunteers` WRITE;
/*!40000 ALTER TABLE `volunteers` DISABLE KEYS */;
INSERT INTO `volunteers` VALUES (1,'Rod Veum MD','Ocie Paucek','Weissnat Group','Langosh Ltd','Miss','Mr.','2019-07-28','1990-08-24','2020-09-29 03:45:39','2020-09-29 03:45:39'),(2,'Trever Conn Sr.','Prof. Sid Gottlieb','Reilly and Sons','Grady-Schultz','Dr.','Prof.','1972-08-21','2017-06-04','2020-09-29 03:45:39','2020-09-29 03:45:39'),(3,'Albina Hartmann','Sarah Stoltenberg','Shanahan, Carroll and Feeney','Schmeler-Ernser','Ms.','Mrs.','2013-09-14','1976-09-06','2020-09-29 03:45:39','2020-09-29 03:45:39'),(4,'Stanford Harvey','Karina Reichert','Hansen-Corwin','Kilback-Bayer','Prof.','Dr.','2007-09-17','2012-08-14','2020-09-29 03:45:39','2020-09-29 03:45:39'),(5,'Ms. Telly Von','Florian Rolfson Jr.','Batz-Lang','Hyatt, Kunze and Reilly','Mr.','Dr.','1979-01-29','2001-11-03','2020-09-29 03:45:39','2020-09-29 03:45:39'),(6,'Prince Feest','Ms. Jaquelin Swaniawski','Carter-Emard','Quitzon-Boyer','Prof.','Mr.','2018-07-17','1993-01-04','2020-09-29 03:45:39','2020-09-29 03:45:39'),(7,'Ms. Meta Ebert PhD','Chyna Johnston','Torphy-Sauer','Marks-Will','Dr.','Prof.','2004-08-01','1982-04-29','2020-09-29 03:45:39','2020-09-29 03:45:39'),(8,'Amelia Grant','Mrs. Winnifred Prohaska','Beatty and Sons','Johns Ltd','Miss','Ms.','1979-05-07','1994-06-28','2020-09-29 03:45:39','2020-09-29 03:45:39'),(9,'Camylle Jakubowski I','Dr. Joana Gutkowski','Swaniawski Ltd','Kozey PLC','Prof.','Mrs.','2016-08-09','2001-10-08','2020-09-29 03:45:39','2020-09-29 03:45:39'),(10,'Carleton Thompson','Rod Herman','Rosenbaum-Bergnaum','Runolfsdottir-Padberg','Mrs.','Mrs.','2003-05-15','2011-08-28','2020-09-29 03:45:39','2020-09-29 03:45:39'),(11,'Prof. Gennaro Howell','Miss Aaliyah Lebsack','Wehner-Lynch','Kuvalis-Parker','Ms.','Dr.','1972-05-26','1971-02-13','2020-10-02 04:32:14','2020-10-02 04:32:14'),(12,'Cary Kunze','King Mayer','Murazik, Robel and Hammes','Smith, Jenkins and Jaskolski','Miss','Mr.','1992-03-11','1977-06-20','2020-10-02 04:32:14','2020-10-02 04:32:14'),(13,'Lillie Kuphal','Maynard Keebler','Ledner-Jast','Prohaska, Ledner and Koss','Mr.','Prof.','2000-11-08','2016-06-20','2020-10-02 04:32:14','2020-10-02 04:32:14'),(14,'Prof. Kiarra Nolan','Antonia Jerde','Stroman, Runte and Considine','Becker, Koelpin and Torphy','Mrs.','Ms.','1996-10-09','1984-05-14','2020-10-02 04:32:14','2020-10-02 04:32:14'),(15,'Watson Nader','Louisa Kutch III','Sipes PLC','Frami-Price','Prof.','Dr.','1975-11-04','1999-06-25','2020-10-02 04:32:14','2020-10-02 04:32:14'),(16,'Eula Nitzsche','Harmon Huel','Abshire, Heller and Effertz','Pagac, Hoeger and Mayert','Mrs.','Prof.','1984-06-01','1985-11-10','2020-10-02 04:32:14','2020-10-02 04:32:14'),(17,'Syble Connelly','Marquis Hamill','Runolfsdottir-Dickens','Gerlach-Dibbert','Dr.','Dr.','1991-09-08','1977-10-06','2020-10-02 04:32:14','2020-10-02 04:32:14'),(18,'Ian Hudson','Josie Corkery','Abernathy-Sanford','Mayert-Rohan','Dr.','Dr.','2019-11-14','1988-06-19','2020-10-02 04:32:15','2020-10-02 04:32:15'),(19,'Mandy Ortiz','Austin Gusikowski','Rodriguez, Schinner and Carroll','Maggio-Franecki','Dr.','Mr.','1999-01-29','1981-02-10','2020-10-02 04:32:15','2020-10-02 04:32:15'),(20,'Angelina Rau','Eduardo Grimes','Goyette PLC','Mayert and Sons','Miss','Dr.','2016-12-14','2007-12-13','2020-10-02 04:32:15','2020-10-02 04:32:15'),(21,'Cara Stracke','Cecilia Green','Jones-Reilly','Durgan, Nikolaus and Hayes','Dr.','Prof.','1991-01-31','1983-02-18','2020-10-05 15:04:08','2020-10-05 15:04:08'),(22,'Margaretta Lehner','Anabel Trantow','Larson-Kris','Grimes, Lakin and Jenkins','Prof.','Prof.','2007-02-19','1978-09-23','2020-10-05 15:04:08','2020-10-05 15:04:08'),(23,'Tito Streich','Lyda White','Medhurst, King and Balistreri','Kuhic, Gulgowski and Gutkowski','Prof.','Dr.','1975-05-20','2015-08-17','2020-10-05 15:04:08','2020-10-05 15:04:08'),(24,'Elvera Koelpin','Elsie Herman','Torp, O\'Hara and Jones','Senger, Jones and Schmitt','Dr.','Mr.','1987-10-04','2009-03-26','2020-10-05 15:04:08','2020-10-05 15:04:08'),(25,'Dr. Werner Hand PhD','Steve Funk','Johnston-Thompson','Bosco, Gottlieb and Hyatt','Prof.','Prof.','1996-03-29','2011-09-26','2020-10-05 15:04:08','2020-10-05 15:04:08'),(26,'Concepcion Runte','Mrs. Yolanda Graham I','Mayert, Heidenreich and Jerde','Ritchie, Little and Rowe','Prof.','Prof.','1984-12-27','2017-05-24','2020-10-05 15:04:09','2020-10-05 15:04:09'),(27,'Queenie Sawayn','Demarcus O\'Reilly','Kovacek Ltd','Ullrich, Harber and Gorczany','Mr.','Mr.','2004-10-31','1995-09-27','2020-10-05 15:04:09','2020-10-05 15:04:09'),(28,'Dr. Stephanie Dare','Verda Terry','Wisozk, Bradtke and Gaylord','Zulauf-Hills','Miss','Prof.','2010-03-15','1980-08-04','2020-10-05 15:04:09','2020-10-05 15:04:09'),(29,'Verlie Shields','Madie Adams MD','Dare, Kuhlman and Buckridge','Johnston, Botsford and Davis','Ms.','Prof.','1980-12-21','1972-03-20','2020-10-05 15:04:09','2020-10-05 15:04:09'),(30,'Myron Labadie','Laisha Padberg','Heidenreich-Upton','Wisoky, Kunze and Stracke','Dr.','Dr.','2001-07-09','1992-05-21','2020-10-05 15:04:09','2020-10-05 15:04:09');
/*!40000 ALTER TABLE `volunteers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-03  7:18:48
