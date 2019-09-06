/*
SQLyog Ultimate v9.20 
MySQL - 5.6.21 : Database - cbr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cbr` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cbr`;

/*Table structure for table `cases` */

DROP TABLE IF EXISTS `cases`;

CREATE TABLE `cases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cases_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_id` int(10) unsigned NOT NULL,
  `symptom_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cases_disease_id_foreign` (`disease_id`),
  KEY `cases_symptom_id_foreign` (`symptom_id`),
  CONSTRAINT `cases_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`),
  CONSTRAINT `cases_symptom_id_foreign` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cases` */

insert  into `cases`(`id`,`cases_no`,`disease_id`,`symptom_id`,`created_at`,`updated_at`,`status`) values (1,'1',1,2,'2019-07-15 01:50:51','2019-08-05 06:24:23',1),(2,'1',1,6,'2019-07-15 01:50:51',NULL,1),(3,'2',1,2,'2019-07-15 01:50:51',NULL,1),(4,'2',1,6,'2019-07-15 01:50:51',NULL,1),(5,'2',1,7,'2019-07-15 01:50:51',NULL,1),(6,'3',2,1,'2019-07-15 01:50:51',NULL,1),(7,'3',2,3,'2019-07-15 01:50:51',NULL,1),(8,'3',2,3,'2019-07-15 01:50:51',NULL,1),(9,'3',2,8,'2019-07-15 01:50:51',NULL,1),(10,'4',2,3,'2019-07-15 01:50:51',NULL,1),(11,'4',2,4,'2019-07-15 01:50:51',NULL,1),(12,'4',2,8,'2019-07-15 01:50:51',NULL,1),(13,'5',3,1,'2019-07-15 01:50:51',NULL,1),(14,'5',3,6,'2019-07-15 01:50:51',NULL,1),(15,'5',3,7,'2019-07-15 01:50:51',NULL,1),(16,'6',3,1,'2019-07-15 01:50:51',NULL,1),(17,'6',3,2,'2019-07-15 01:50:51',NULL,1),(18,'6',3,6,'2019-07-15 01:50:51',NULL,1),(19,'6',3,7,'2019-07-15 01:50:51',NULL,1),(20,'7',4,1,'2019-07-15 01:50:51',NULL,1),(21,'7',4,2,'2019-07-15 01:50:51',NULL,1),(22,'7',4,3,'2019-07-15 01:50:51',NULL,1),(23,'7',4,4,'2019-07-15 01:50:51',NULL,1),(24,'7',4,5,'2019-07-15 01:50:51',NULL,1),(25,'7',4,6,'2019-07-15 01:50:51',NULL,1),(26,'7',4,7,'2019-07-15 01:50:51',NULL,1),(27,'8',4,1,'2019-07-15 01:50:51',NULL,1),(28,'8',4,2,'2019-07-15 01:50:51',NULL,1),(29,'8',4,3,'2019-07-15 01:50:51',NULL,1),(30,'8',4,5,'2019-07-15 01:50:51',NULL,1),(31,'8',4,6,'2019-07-15 01:50:51',NULL,1),(32,'8',4,7,'2019-07-15 01:50:51',NULL,1),(33,'8',4,8,'2019-07-15 01:50:51',NULL,1),(34,'9',4,1,'2019-07-15 01:50:51',NULL,1),(35,'9',4,3,'2019-07-15 01:50:51',NULL,1),(36,'9',4,4,'2019-07-15 01:50:51',NULL,1),(37,'9',4,5,'2019-07-15 01:50:51',NULL,1),(38,'9',4,6,'2019-07-15 01:50:51',NULL,1),(39,'9',4,7,'2019-07-15 01:50:51',NULL,1),(40,'9',4,8,'2019-07-15 01:50:51',NULL,1);

/*Table structure for table `diseases` */

DROP TABLE IF EXISTS `diseases`;

CREATE TABLE `diseases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disease` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `diseases_disease_unique` (`disease`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `diseases` */

insert  into `diseases`(`id`,`disease`,`created_at`,`updated_at`,`status`) values (1,'Anemia','2019-07-15 01:50:50','2019-08-05 06:14:55',1),(2,'Bronkhitis','2019-07-15 01:50:50',NULL,1),(3,'Flu','2019-07-15 01:50:50','2019-07-15 06:06:55',1),(4,'Demam','2019-07-15 01:50:50','2019-07-17 07:56:01',1);

/*Table structure for table `keywords` */

DROP TABLE IF EXISTS `keywords`;

CREATE TABLE `keywords` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `keywords` */

insert  into `keywords`(`id`,`keyword`,`created_at`,`updated_at`,`status`) values (1,'dashboard','2019-08-03 22:59:53','2019-08-07 01:40:36',1),(2,'welcome','2019-08-03 06:02:48',NULL,1),(3,'cbrs','2019-08-03 06:03:15','2019-08-03 06:03:32',1),(4,'diagnose','2019-08-03 06:03:50',NULL,1),(5,'symptom','2019-08-03 06:04:12',NULL,1),(6,'disease','2019-08-03 06:05:35',NULL,1),(7,'case','2019-08-03 06:05:44','2019-08-03 08:22:50',1),(8,'solution','2019-08-03 06:05:54',NULL,1),(9,'form','2019-08-03 06:06:15',NULL,1),(10,'submit','2019-08-03 06:06:27',NULL,1),(11,'cancel','2019-08-03 06:06:37',NULL,1),(12,'create','2019-08-03 06:07:03',NULL,1),(13,'edit','2019-08-03 06:07:16',NULL,1),(14,'delete','2019-08-03 06:07:27',NULL,1),(15,'activate','2019-08-03 06:07:38',NULL,1),(16,'confirm_save','2019-08-03 06:08:00',NULL,1),(17,'confirm_update','2019-08-03 06:08:12',NULL,1),(18,'confirm_delete','2019-08-03 06:08:23',NULL,1),(19,'confirm_unactivate','2019-08-03 06:08:59',NULL,1),(20,'confirm_activate','2019-08-03 06:09:10',NULL,1),(21,'alert_save','2019-08-03 06:10:13',NULL,1),(22,'alert_update','2019-08-03 06:10:33',NULL,1),(23,'alert_delete','2019-08-03 06:10:45',NULL,1),(24,'alert_unactivate','2019-08-03 06:11:05',NULL,1),(25,'alert_activate','2019-08-03 06:11:19',NULL,1),(26,'yes','2019-08-03 06:12:30',NULL,1),(27,'no','2019-08-03 06:12:40',NULL,1),(28,'success','2019-08-03 06:13:01',NULL,1),(29,'failed','2019-08-03 06:13:10',NULL,1),(30,'login','2019-08-03 06:19:03',NULL,1),(31,'logout','2019-08-03 06:20:08',NULL,1),(32,'language','2019-08-03 06:23:45',NULL,1),(33,'vocabulary','2019-08-03 06:23:56',NULL,1),(34,'calculation','2019-08-03 06:24:32','2019-08-05 03:56:09',1),(35,'close','2019-08-03 06:24:40',NULL,1),(36,'cbr','2019-08-03 06:25:12',NULL,1),(37,'user','2019-08-03 06:25:47',NULL,1),(38,'email','2019-08-03 06:25:56',NULL,1),(39,'password','2019-08-03 06:26:05',NULL,1),(40,'confirm_logout','2019-08-03 06:26:42','2019-08-03 07:48:48',1),(41,'choose','2019-08-03 08:02:54',NULL,1),(42,'cases_no','2019-08-03 08:23:08',NULL,1),(43,'keyword','2019-08-03 08:24:56','2019-08-03 08:37:43',1),(44,'cases_list','2019-08-04 11:34:53',NULL,1),(45,'analysist_result','2019-08-04 11:35:28',NULL,1),(46,'symptom_choosen','2019-08-04 11:36:21','2019-08-05 05:08:17',1),(47,'count','2019-08-04 11:36:46',NULL,1),(48,'divider','2019-08-04 11:37:14',NULL,1),(49,'result','2019-08-04 11:45:30',NULL,1),(50,'number_of_symptoms_suitable','2019-08-04 11:46:09',NULL,1),(51,'number_of_symptoms_chosen','2019-08-04 11:46:52',NULL,1),(52,'number_of_case_symptoms','2019-08-04 11:48:17',NULL,1),(53,'biggest_disease','2019-08-04 11:49:06',NULL,1),(54,'in_case_number','2019-08-04 11:49:37','2019-08-04 11:53:39',1),(56,'selected_disease','2019-08-04 11:50:53','2019-08-05 05:01:21',1),(57,'with_the_largest_percentage_value','2019-08-04 11:51:20',NULL,1),(58,'list','2019-08-04 11:52:08',NULL,1),(59,'ranking','2019-08-05 12:03:34',NULL,1),(60,'action','2019-08-05 05:13:46','2019-08-05 06:46:44',1),(61,'confirmation','2019-08-05 05:17:28',NULL,1),(62,'alert_failed','2019-08-05 05:20:28',NULL,1),(63,'deleted','2019-08-05 05:51:57',NULL,1),(64,'confirm_exit_form','2019-08-05 05:58:51',NULL,1),(65,'name','2019-08-05 08:16:35',NULL,1),(66,'on_login','2019-08-05 08:21:19',NULL,1),(67,'code','2019-08-06 05:04:06',NULL,1);

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `languages` */

insert  into `languages`(`id`,`code`,`language`,`created_at`,`updated_at`,`status`) values (1,'en','English','2019-08-03 22:33:43','2019-08-05 06:55:22',1),(2,'id','Indonesia','2019-08-03 22:33:43','2019-08-03 07:57:48',1),(3,'jp','Japan','2019-08-03 06:20:29','2019-08-07 01:42:48',0);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_07_07_141831_create_diseases_table',1),(4,'2019_07_09_044950_create_symptoms_table',1),(5,'2019_07_09_081309_create_cases_table',1),(6,'2019_07_11_023007_create_solution_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `solutions` */

DROP TABLE IF EXISTS `solutions`;

CREATE TABLE `solutions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `solution` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solutions_disease_id_foreign` (`disease_id`),
  CONSTRAINT `solutions_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `solutions` */

insert  into `solutions`(`id`,`solution`,`disease_id`,`created_at`,`updated_at`,`status`) values (1,'Banyakin tidur jangan begadang',1,'2019-07-15 01:50:50','2019-07-15 06:15:06',1),(2,'Kurangin ngrokok',2,'2019-07-15 01:50:50',NULL,1),(3,'Hindari air yang jatuh dari awan',3,'2019-07-15 01:50:50',NULL,1),(4,'Kurangin yang enak enak',4,'2019-07-15 01:50:50','2019-08-05 06:32:14',1);

/*Table structure for table `symptoms` */

DROP TABLE IF EXISTS `symptoms`;

CREATE TABLE `symptoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `symptom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `symptoms_symptom_unique` (`symptom`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `symptoms` */

insert  into `symptoms`(`id`,`symptom`,`created_at`,`updated_at`,`status`) values (1,'Badan Panas','2019-07-15 01:50:51','2019-08-06 09:22:18',1),(2,'Sakit Kepala','2019-07-15 01:50:51',NULL,1),(3,'Bersin-Bersin','2019-07-15 01:50:51',NULL,1),(4,'Batuk','2019-07-15 01:50:51',NULL,1),(5,'Pilek, Hidung Buntu','2019-07-15 01:50:51',NULL,1),(6,'Badan Lemas','2019-07-15 01:50:51',NULL,1),(7,'Kedinginan','2019-07-15 01:50:51',NULL,1),(8,'Tenggorokan Sakit','2019-07-15 01:50:51',NULL,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`keyword`,`remember_token`,`created_at`,`updated_at`,`status`) values (1,'Administrator','admin@gmail.com','$2y$10$/5KO9kIRG0JHc/Bks6T0E.xpZiRWU0i4pNTCgaWSnpzj4tXMeOYzu','admin','9i7NfSyXigGkIwLTr2djrRe3Tsr0H3B0HY7EUBkdvGrfvBZD3vABvdmd4el6','2019-07-15 01:50:50','2019-08-06 08:59:10',1),(2,'Suryadus Gaming','suryana.ryan009@gmail.com','$2y$10$/ZYI2LTRyYiEhvOzexgt5.4JKK/WVBTXCXFsoCxh0u/mYDLUh07V2','SSSuryana009','2Y9tvtp6eZxqd3rJnk4lu4bZjDF7B5phsjFpycrvUinX6JKNYbHJUwLk9QqT','2019-07-17 04:46:24','2019-09-02 12:54:00',1),(3,'Muhammad Farhan','farhan@gmail.com','$2y$10$Rk1.evmYEZucxCZWKtyBzemUd3B7G2zV0jzieKQ6rgKLkrLl.gWeu','farhanucrit',NULL,'2019-07-23 06:27:40','2019-08-30 11:05:51',1),(4,'Ficca Nuary Pramutya','ficcanuary19@gmail.com','$2y$10$MuthkLZb/MoHXtb7FL/ZLez3PEgkRvhEmIRMq9zNWxa6x7NFDEKza','SSSuryana009',NULL,'2019-09-02 08:51:46','2019-09-02 08:51:56',1);

/*Table structure for table `vocabularies` */

DROP TABLE IF EXISTS `vocabularies`;

CREATE TABLE `vocabularies` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `keyword_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vocabularies_key_id_foreign` (`keyword_id`),
  KEY `vocabularies_language_id_foreign` (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

/*Data for the table `vocabularies` */

insert  into `vocabularies`(`id`,`keyword_id`,`language_id`,`description`,`created_at`,`updated_at`) values (1,15,1,'Activate','2019-08-05 05:14:00','2019-08-06 05:04:32'),(2,25,1,'Data has been activated','2019-08-05 05:14:00','2019-08-06 05:04:32'),(3,23,1,'Data has been deleted','2019-08-05 05:14:00','2019-08-06 05:04:32'),(4,40,1,'Are you sure to log out','2019-08-06 05:04:32','2019-08-06 05:04:33'),(5,21,1,'Data has been saved','2019-08-05 05:24:30','2019-08-06 05:04:32'),(6,24,1,'Data has been unactivated','2019-08-05 05:24:30','2019-08-06 05:04:32'),(7,22,1,'Data has been updated','2019-08-05 05:24:30','2019-08-06 05:04:32'),(8,34,1,'Calculation','2019-08-05 05:24:30','2019-08-06 05:04:32'),(9,11,1,'Cancel','2019-08-05 05:24:30','2019-08-06 05:04:32'),(10,7,1,'Cases','2019-08-05 05:24:30','2019-08-06 05:04:32'),(11,36,1,'CBR','2019-08-05 05:24:30','2019-08-06 05:04:32'),(12,3,1,'Case Based Reasoning System','2019-08-05 05:24:30','2019-08-06 05:04:32'),(13,35,1,'Close','2019-08-05 05:24:30','2019-08-06 05:04:32'),(14,20,1,'Do you want to activate data','2019-08-06 05:04:32','2019-08-06 05:04:32'),(15,18,1,'Do you want to delete data','2019-08-06 05:04:32','2019-08-06 05:04:32'),(16,16,1,'Do you want to save data','2019-08-06 05:04:32','2019-08-06 05:04:33'),(17,19,1,'Do you want to unactivate data','2019-08-06 05:04:32','2019-08-06 05:04:33'),(18,17,1,'Do you want to update data','2019-08-06 05:04:32','2019-08-06 05:04:33'),(19,12,1,'Create','2019-08-06 05:04:32','2019-08-06 05:04:33'),(20,1,1,'Dashboard','2019-08-06 05:04:32','2019-08-06 05:04:33'),(21,14,1,'Delete','2019-08-06 05:04:32','2019-08-06 05:04:33'),(22,4,1,'Diagnose','2019-08-06 05:04:32','2019-08-06 05:04:33'),(23,6,1,'Disease','2019-08-06 05:04:32','2019-08-06 05:04:33'),(24,13,1,'Edit','2019-08-06 05:04:32','2019-08-06 05:04:33'),(25,38,1,'Email','2019-08-06 05:04:32','2019-08-06 05:04:33'),(26,29,1,'Failed','2019-08-06 05:04:32','2019-08-06 05:04:33'),(27,9,1,'Form','2019-08-06 05:04:32','2019-08-06 05:04:33'),(28,32,1,'Language','2019-08-06 05:04:32','2019-08-06 05:04:33'),(29,30,1,'Login','2019-08-06 05:04:32','2019-08-06 05:04:33'),(30,31,1,'Logout','2019-08-06 05:04:32','2019-08-06 05:04:33'),(31,27,1,'No','2019-08-06 05:04:32','2019-08-06 05:04:33'),(32,39,1,'Password','2019-08-06 05:04:32','2019-08-06 05:04:33'),(33,8,1,'Solution','2019-08-06 05:04:32','2019-08-06 05:04:33'),(34,10,1,'Submit','2019-08-06 05:04:32','2019-08-06 05:04:33'),(35,28,1,'Success','2019-08-06 05:04:32','2019-08-06 05:04:33'),(36,5,1,'Symptom','2019-08-06 05:04:32','2019-08-06 05:04:33'),(37,37,1,'User','2019-08-06 05:04:32','2019-08-06 05:04:33'),(38,33,1,'Vocabulary','2019-08-06 05:04:32','2019-08-06 05:04:33'),(39,2,1,'Welcome to the App','2019-08-06 05:04:32','2019-08-06 05:04:33'),(40,26,1,'Yes','2019-08-06 05:04:32','2019-08-06 05:04:33'),(41,15,2,'Aktivasi','2019-08-05 05:14:12','2019-08-06 05:11:09'),(42,25,2,'Data telah diaktifkan','2019-08-05 05:14:12','2019-08-06 05:11:09'),(43,23,2,'Data telah dihapus','2019-08-05 05:14:12','2019-08-06 05:11:09'),(44,40,2,'Anda yakin ingin keluar','2019-08-06 05:11:09','2019-08-06 05:11:09'),(45,21,2,'Data telah disimpan','2019-08-05 05:27:29','2019-08-06 05:11:09'),(46,24,2,'Data telah dinonaktifkan','2019-08-05 05:27:29','2019-08-06 05:11:09'),(47,22,2,'Data telah dirubah','2019-08-05 05:27:29','2019-08-06 05:11:09'),(48,34,2,'Perhitungan','2019-08-05 05:27:29','2019-08-06 05:11:09'),(49,11,2,'Batal','2019-08-05 05:27:29','2019-08-06 05:11:09'),(50,7,2,'Kasus','2019-08-05 05:27:29','2019-08-06 05:11:09'),(51,36,2,'CBR','2019-08-05 05:27:29','2019-08-06 05:11:09'),(52,3,2,'Sistem Case Based Reasoning','2019-08-05 05:27:29','2019-08-06 05:11:09'),(53,35,2,'Tutup','2019-08-05 05:27:29','2019-08-06 05:11:09'),(54,20,2,'Anda ingin mengaktifkan data','2019-08-06 05:11:09','2019-08-06 05:11:09'),(55,18,2,'Anda ingin menghapus data','2019-08-06 05:11:09','2019-08-06 05:11:09'),(56,16,2,'Anda ingin menyimpan data','2019-08-06 05:11:09','2019-08-06 05:11:09'),(57,19,2,'Anda ingin nonaktifkan data','2019-08-06 05:11:09','2019-08-06 05:11:09'),(58,17,2,'Anda ingin merubah data','2019-08-06 05:11:09','2019-08-06 05:11:09'),(59,12,2,'Tambah','2019-08-06 05:11:09','2019-08-06 05:11:09'),(60,1,2,'Beranda','2019-08-06 05:11:09','2019-08-06 05:11:09'),(61,14,2,'Hapus','2019-08-06 05:11:09','2019-08-06 05:11:09'),(62,4,2,'Diagnosa','2019-08-06 05:11:09','2019-08-06 05:11:09'),(63,6,2,'Penyakit','2019-08-06 05:11:09','2019-08-06 05:11:09'),(64,13,2,'Rubah','2019-08-06 05:11:09','2019-08-06 05:11:09'),(65,38,2,'Email','2019-08-06 05:11:09','2019-08-06 05:11:09'),(66,29,2,'Gagal','2019-08-06 05:11:09','2019-08-06 05:11:09'),(67,9,2,'Formulir','2019-08-06 05:11:09','2019-08-06 05:11:09'),(68,32,2,'Bahasa','2019-08-06 05:11:09','2019-08-06 05:11:09'),(69,30,2,'Masuk','2019-08-06 05:11:09','2019-08-06 05:11:09'),(70,31,2,'Keluar','2019-08-06 05:11:09','2019-08-06 05:11:09'),(71,27,2,'Tidak','2019-08-06 05:11:09','2019-08-06 05:11:09'),(72,39,2,'Kata Sandi','2019-08-06 05:11:09','2019-08-06 05:11:09'),(73,8,2,'Solusi','2019-08-06 05:11:09','2019-08-06 05:11:09'),(74,10,2,'Kirim','2019-08-06 05:11:09','2019-08-06 05:11:09'),(75,28,2,'Sukses','2019-08-06 05:11:09','2019-08-06 05:11:09'),(76,5,2,'Gejala','2019-08-06 05:11:09','2019-08-06 05:11:09'),(77,37,2,'Pengguna','2019-08-06 05:11:09','2019-08-06 05:11:09'),(78,33,2,'Kosa Kata','2019-08-06 05:11:09','2019-08-06 05:11:09'),(79,2,2,'Selamat datang di aplikasi','2019-08-06 05:11:09','2019-08-06 05:11:09'),(80,26,2,'Iya','2019-08-06 05:11:09','2019-08-06 05:11:09'),(81,41,1,'Choose','2019-08-05 05:24:30','2019-08-06 05:04:32'),(82,41,2,'Pilih','2019-08-05 05:27:29','2019-08-06 05:11:09'),(83,42,1,'Cases No','2019-08-05 05:24:30','2019-08-06 05:04:32'),(84,43,1,'Keyword','2019-08-06 05:04:32','2019-08-06 05:04:33'),(85,42,2,'Kasus No','2019-08-05 05:27:29','2019-08-06 05:11:09'),(86,43,2,'Kata Kunci','2019-08-06 05:11:09','2019-08-06 05:11:09'),(87,45,1,'Analysis Result With Case Based Reasoning System','2019-08-05 05:24:30','2019-08-06 05:04:32'),(88,44,1,'Cases List','2019-08-05 05:24:30','2019-08-06 05:04:32'),(89,47,1,'Count','2019-08-06 05:04:32','2019-08-06 05:04:33'),(90,48,1,'Divider','2019-08-06 05:04:32','2019-08-06 05:04:33'),(91,46,1,'Symptom Choosen','2019-08-06 05:04:32','2019-08-06 05:04:33'),(92,45,2,'Hasil Analisis Dengan Sistem Case Based Reasoning','2019-08-05 05:27:29','2019-08-06 05:11:09'),(93,44,2,'Daftar Kasus','2019-08-05 05:27:29','2019-08-06 05:11:09'),(94,47,2,'Hitung','2019-08-06 05:11:09','2019-08-06 05:11:09'),(95,48,2,'Pembagi','2019-08-06 05:11:09','2019-08-06 05:11:09'),(96,46,2,'Gejala Dipilih','2019-08-06 05:11:09','2019-08-06 05:11:09'),(97,53,1,'Biggest Disease','2019-08-05 05:24:30','2019-08-06 05:04:32'),(98,58,1,'List','2019-08-06 05:04:32','2019-08-06 05:04:33'),(99,52,1,'Number Of Case Symptom','2019-08-06 05:04:32','2019-08-06 05:04:33'),(100,51,1,'Number of Symptoms Chosen','2019-08-06 05:04:32','2019-08-06 05:04:33'),(101,50,1,'Number of Symptoms Suitable','2019-08-06 05:04:32','2019-08-06 05:04:33'),(102,49,1,'Result','2019-08-06 05:04:32','2019-08-06 05:04:33'),(103,56,1,'Selected Disease','2019-08-06 05:04:32','2019-08-06 05:04:33'),(105,57,1,'with the Largest Percentage Value','2019-08-06 05:04:32','2019-08-06 05:04:33'),(106,54,1,'In Case Number','2019-08-06 05:04:32','2019-08-06 05:04:33'),(107,53,2,'Penyakit Terbesar','2019-08-05 05:27:29','2019-08-06 05:11:09'),(108,54,2,'Pada Jumlah Kasus','2019-08-06 05:11:09','2019-08-06 05:11:09'),(109,58,2,'Daftar','2019-08-06 05:11:09','2019-08-06 05:11:09'),(110,52,2,'Jumlah Gejala Kasus','2019-08-06 05:11:09','2019-08-06 05:11:09'),(111,51,2,'Jumlah Kasus yang Dipilih','2019-08-06 05:11:09','2019-08-06 05:11:09'),(112,50,2,'Jumlah Kasus yang Cocok','2019-08-06 05:11:09','2019-08-06 05:11:09'),(113,49,2,'Hasil','2019-08-06 05:11:09','2019-08-06 05:11:09'),(114,56,2,'Penyakit Terpilih','2019-08-06 05:11:09','2019-08-06 05:11:09'),(116,57,2,'dengan Nilai Persentase Terbesar','2019-08-06 05:11:09','2019-08-06 05:11:09'),(117,59,1,'Ranking','2019-08-06 05:04:32','2019-08-06 05:04:33'),(118,59,2,'Peringkat','2019-08-06 05:11:09','2019-08-06 05:11:09'),(119,60,1,'Action','2019-08-05 05:14:00','2019-08-06 05:04:32'),(120,60,2,'Aksi','2019-08-05 05:14:12','2019-08-06 05:11:09'),(121,61,1,'Confirmation','2019-08-06 05:04:32','2019-08-06 05:04:32'),(122,61,2,'Konfirmasi','2019-08-06 05:11:09','2019-08-06 05:11:09'),(123,62,1,'Data has been failed to delete','2019-08-05 05:24:30','2019-08-06 05:04:32'),(124,62,2,'Data gagal dihapus','2019-08-05 05:27:29','2019-08-06 05:11:09'),(125,63,1,'Deleted','2019-08-06 05:04:32','2019-08-06 05:04:33'),(126,63,2,'Terhapus','2019-08-06 05:11:09','2019-08-06 05:11:09'),(127,64,1,'Are you sure to exit this form','2019-08-06 05:04:32','2019-08-06 05:04:33'),(128,64,2,'Anda yakin ingin keluar dari form ini','2019-08-06 05:11:09','2019-08-06 05:11:09'),(129,65,1,'Name','2019-08-06 05:04:32','2019-08-06 05:04:33'),(130,65,2,'Nama','2019-08-06 05:11:09','2019-08-06 05:11:09'),(131,66,1,'You are logged in','2019-08-06 05:04:32','2019-08-06 05:04:33'),(132,66,2,'Anda sudah masuk','2019-08-06 05:11:09','2019-08-06 05:11:09'),(133,67,1,'Code','2019-08-06 05:04:32','2019-08-06 05:04:32'),(134,67,2,'Kode','2019-08-06 05:11:09','2019-08-06 05:11:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
