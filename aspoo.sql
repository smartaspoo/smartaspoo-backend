/*
SQLyog Ultimate
MySQL - 10.4.22-MariaDB : Database - smartaspoo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smartaspoo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `smartaspoo`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `kode_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga_barang_jual` int(11) NOT NULL,
  `harga_barang_beli` int(11) NOT NULL,
  `stock_global` bigint(20) NOT NULL,
  `satuan_id` bigint(20) unsigned NOT NULL,
  `created_by_user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_barang`),
  KEY `barang_kode_umkm_foreign` (`created_by_user_id`),
  KEY `barang_satuan_foreign_key` (`satuan_id`),
  CONSTRAINT `barang_kode_umkm_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `barang_satuan_foreign_key` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `barang` */

LOCK TABLES `barang` WRITE;

insert  into `barang`(`kode_barang`,`nama_barang`,`harga_barang_jual`,`harga_barang_beli`,`stock_global`,`satuan_id`,`created_by_user_id`,`created_at`,`updated_at`) values 
('asdas','asdas',12312,3213,41,3,1,'2023-07-14 04:45:49','2023-07-14 04:45:49'),
('asdsad','asdsa',12321,12312,32,1,1,'2023-07-14 03:38:16','2023-07-14 03:38:16'),
('kkxcvk','asd',1231,1231,2,3,1,'2023-07-14 03:59:14','2023-07-14 03:59:14'),
('sadasd','asdas',213,119,211,3,1,'2023-07-14 04:46:55','2023-07-14 04:46:55'),
('sadsa','asdsad',123,122,324,3,1,'2023-07-14 04:05:27','2023-07-14 04:05:27');

UNLOCK TABLES;

/*Table structure for table `diskon` */

DROP TABLE IF EXISTS `diskon`;

CREATE TABLE `diskon` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_diskon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah_diskon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `diskon` */

LOCK TABLES `diskon` WRITE;

UNLOCK TABLES;

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `ktp_photo` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_nip_unique` (`nip`),
  KEY `employee_dob_index` (`dob`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `employee` */

LOCK TABLES `employee` WRITE;

insert  into `employee`(`id`,`nip`,`fullname`,`dob`,`address`,`photo`,`ktp_photo`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'1231232131','sadasdasd','2000-01-07','sadasdas','uploads/6482d66517cdb6.26362456.png','uploads/6482d6654db452.94861246.png','2023-06-09 07:36:05','2023-06-09 07:36:05',NULL);

UNLOCK TABLES;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `failed_jobs` */

LOCK TABLES `failed_jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `kategori_barang` */

DROP TABLE IF EXISTS `kategori_barang`;

CREATE TABLE `kategori_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `satuan_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satuan_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satuan_simbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kategori_barang` */

LOCK TABLES `kategori_barang` WRITE;

UNLOCK TABLES;

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `module_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_path_unique` (`path`),
  KEY `menus_parent_id_foreign` (`parent_id`),
  KEY `menus_module_id_foreign` (`module_id`),
  CONSTRAINT `menus_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE CASCADE,
  CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menus` */

LOCK TABLES `menus` WRITE;

insert  into `menus`(`id`,`name`,`path`,`description`,`parent_id`,`module_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Setting',NULL,'Organize Setting',NULL,NULL,NULL,NULL,NULL),
(2,'User','user','Organize User',1,1,NULL,NULL,NULL),
(3,'Role','role','Organize Role',1,2,NULL,NULL,NULL),
(4,'Menu','menu','Organize Menu',1,3,NULL,NULL,NULL),
(5,'Permission','permission','Organize Permission',1,4,NULL,NULL,NULL),
(10,'Module','module','Organize module',1,5,NULL,NULL,NULL),
(16,'Transaksi',NULL,'transaksi barang',NULL,NULL,'2023-06-24 06:32:43','2023-06-24 06:32:43',NULL),
(17,'Penjualan','penjualan','penjualanaa',16,8,'2023-06-24 06:33:12','2023-06-24 06:33:12',NULL),
(18,'Master Barang',NULL,'master barang',NULL,NULL,'2023-06-24 06:35:38','2023-06-24 06:35:38',NULL),
(19,'Data Barang','data-barang',NULL,18,9,'2023-06-24 06:36:08','2023-06-24 06:36:08',NULL),
(20,'Diskon','diskon','Disko',18,10,'2023-07-04 06:05:56','2023-07-04 06:05:56',NULL),
(21,'Pembelian','pembelian','Pembelian',16,11,'2023-07-10 02:26:33','2023-07-10 02:26:33',NULL),
(22,'Satuan','satuan','satuan',18,12,'2023-07-10 02:28:13','2023-07-10 02:28:13',NULL),
(25,'Kategori Barang','kategori-barang','Kategori Barang',18,15,'2023-07-10 02:36:38','2023-07-10 02:36:38',NULL);

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_07_08_101636_create_employee_table',1),
(6,'2022_07_28_092830_create_roles_table',1),
(7,'2022_07_28_093136_create_user_roles_table',1),
(8,'2022_07_28_094120_create_module_table',1),
(9,'2022_07_28_094121_create_menus_table',1),
(10,'2022_07_28_095554_create_permissions_table',1),
(11,'2022_07_28_103647_create_role_permissions_table',1),
(12,'2023_05_04_033617_create_user_pref_table',1),
(13,'2023_06_03_065109_create_presensi_table',2),
(14,'2023_06_12_133458_create_user_details_table',3),
(15,'2023_06_24_071216_create_barang_table',3),
(16,'2023_06_24_083604_create_kategori_barang_table',4),
(17,'2023_06_24_085339_create_satuan_table',4),
(18,'2023_06_24_090417_create_penjualan_table',4),
(19,'2023_06_26_072506_create_diskon_table',5),
(20,'2023_06_26_054600_create_penjualan_children_table',6),
(21,'2023_07_04_053945_update_diskon_table',7);

UNLOCK TABLES;

/*Table structure for table `module` */

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `module` */

LOCK TABLES `module` WRITE;

insert  into `module`(`id`,`name`,`description`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'User','User Module',NULL,NULL,NULL),
(2,'Role','Role Module',NULL,NULL,NULL),
(3,'Menu','Menu Module',NULL,NULL,NULL),
(4,'Permission','Permission Module',NULL,NULL,NULL),
(5,'Module','Module Module',NULL,NULL,NULL),
(7,'Presensi','presensi','2023-06-03 06:51:08','2023-06-03 06:51:08',NULL),
(8,'Penjualan','semua data penjualan','2023-06-24 06:33:12','2023-06-24 06:33:12',NULL),
(9,'Data Barang','data barang','2023-06-24 06:36:08','2023-06-24 06:36:08',NULL),
(10,'Diskon','Diskon','2023-07-04 06:05:56','2023-07-04 06:05:56',NULL),
(11,'Pembelian','pembelian','2023-07-10 02:26:33','2023-07-10 02:26:33',NULL),
(12,'Satuan','satuan','2023-07-10 02:28:13','2023-07-10 02:28:13',NULL),
(15,'Kategori Barang','Kategori Barang','2023-07-10 02:36:38','2023-07-10 02:36:38',NULL),
(16,'Satuan','Satuan','2023-07-12 03:46:57','2023-07-12 03:46:57',NULL);

UNLOCK TABLES;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

LOCK TABLES `password_resets` WRITE;

UNLOCK TABLES;

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `nomor_faktur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `biaya_pengiriman` int(11) NOT NULL,
  `dpp` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `sumber_transaksi` enum('POS','MARKETPLACE') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Belum Dibayar','Sudah Dibayar','Dikirim','Selesai') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nomor_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `penjualan` */

LOCK TABLES `penjualan` WRITE;

insert  into `penjualan`(`nomor_faktur`,`biaya_pengiriman`,`dpp`,`ppn`,`total`,`tanggal_penjualan`,`sumber_transaksi`,`status`,`created_at`,`updated_at`) values 
('FT-001',0,0,0,0,'0000-00-00','','Belum Dibayar',NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `penjualan_children` */

DROP TABLE IF EXISTS `penjualan_children`;

CREATE TABLE `penjualan_children` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_faktur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_diskon` bigint(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_children_nomor_faktur_foreign` (`nomor_faktur`),
  KEY `penjualan_children_kode_barang_foreign` (`kode_barang`),
  KEY `penjualan_children_kode_diskon_foreign` (`kode_diskon`),
  CONSTRAINT `penjualan_children_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  CONSTRAINT `penjualan_children_kode_diskon_foreign` FOREIGN KEY (`kode_diskon`) REFERENCES `diskon` (`id`),
  CONSTRAINT `penjualan_children_nomor_faktur_foreign` FOREIGN KEY (`nomor_faktur`) REFERENCES `penjualan` (`nomor_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `penjualan_children` */

LOCK TABLES `penjualan_children` WRITE;

UNLOCK TABLES;

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_code_unique` (`code`),
  KEY `permissions_menu_id_foreign` (`menu_id`),
  CONSTRAINT `permissions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

LOCK TABLES `permissions` WRITE;

insert  into `permissions`(`id`,`code`,`description`,`menu_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'create-user','Create User',2,NULL,NULL,NULL),
(2,'read-user','Read User',2,NULL,NULL,NULL),
(3,'update-user','Update User',2,NULL,NULL,NULL),
(4,'delete-user','Delete User',2,NULL,NULL,NULL),
(5,'configure_role','Add and remove role of user',2,NULL,NULL,NULL),
(6,'create-role','Create Role',3,NULL,NULL,NULL),
(7,'read-role','Read Role',3,NULL,NULL,NULL),
(8,'update-role','Update Role',3,NULL,NULL,NULL),
(9,'delete-role','Delete Role',3,NULL,NULL,NULL),
(10,'configure_permission','Add and remove permission of role',3,NULL,NULL,NULL),
(11,'create-menu','Create Menu',4,NULL,NULL,NULL),
(12,'read-menu','Read Menu',4,NULL,NULL,NULL),
(13,'update-menu','Update Menu',4,NULL,NULL,NULL),
(14,'delete-menu','Delete Menu',4,NULL,NULL,NULL),
(15,'create-permission','Create Permission',5,NULL,NULL,NULL),
(16,'read-permission','Read Permission',5,NULL,NULL,NULL),
(17,'update-permission','Update Permission',5,NULL,NULL,NULL),
(18,'delete-permission','Delete Permission',5,NULL,NULL,NULL),
(23,'create-module','Create Module',10,NULL,NULL,NULL),
(24,'read-module','Read Module',10,NULL,NULL,NULL),
(25,'update-module','Update Module',10,NULL,NULL,NULL),
(26,'delete-module','Delete Employee',10,NULL,NULL,NULL),
(47,'create-transaksi','Create Transaksi',16,NULL,NULL,NULL),
(48,'read-transaksi','Read Transaksi',16,NULL,NULL,NULL),
(49,'update-transaksi','Update Transaksi',16,NULL,NULL,NULL),
(50,'delete-transaksi','Delete Transaksi',16,NULL,NULL,NULL),
(51,'create-penjualan','Create Penjualan',17,NULL,NULL,NULL),
(52,'read-penjualan','Read Penjualan',17,NULL,NULL,NULL),
(53,'update-penjualan','Update Penjualan',17,NULL,NULL,NULL),
(54,'delete-penjualan','Delete Penjualan',17,NULL,NULL,NULL),
(55,'create-master_barang','Create Master Barang',18,NULL,NULL,NULL),
(56,'read-master_barang','Read Master Barang',18,NULL,NULL,NULL),
(57,'update-master_barang','Update Master Barang',18,NULL,NULL,NULL),
(58,'delete-master_barang','Delete Master Barang',18,NULL,NULL,NULL),
(59,'create-data_barang','Create Data Barang',19,NULL,NULL,NULL),
(60,'read-data_barang','Read Data Barang',19,NULL,NULL,NULL),
(61,'update-data_barang','Update Data Barang',19,NULL,NULL,NULL),
(62,'delete-data_barang','Delete Data Barang',19,NULL,NULL,NULL),
(63,'create-diskon','Create Diskon',20,NULL,NULL,NULL),
(64,'read-diskon','Read Diskon',20,NULL,NULL,NULL),
(65,'update-diskon','Update Diskon',20,NULL,NULL,NULL),
(66,'delete-diskon','Delete Diskon',20,NULL,NULL,NULL),
(67,'create-pembelian','Create Pembelian',21,NULL,NULL,NULL),
(68,'read-pembelian','Read Pembelian',21,NULL,NULL,NULL),
(69,'update-pembelian','Update Pembelian',21,NULL,NULL,NULL),
(70,'delete-pembelian','Delete Pembelian',21,NULL,NULL,NULL),
(71,'create-satuan','Create Satuan',22,NULL,NULL,NULL),
(72,'read-satuan','Read Satuan',22,NULL,NULL,NULL),
(73,'update-satuan','Update Satuan',22,NULL,NULL,NULL),
(74,'delete-satuan','Delete Satuan',22,NULL,NULL,NULL),
(79,'create-kategori_barang','Create Kategori Barang',25,NULL,NULL,NULL),
(80,'read-kategori_barang','Read Kategori Barang',25,NULL,NULL,NULL),
(81,'update-kategori_barang','Update Kategori Barang',25,NULL,NULL,NULL),
(82,'delete-kategori_barang','Delete Kategori Barang',25,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `personal_access_tokens` */

LOCK TABLES `personal_access_tokens` WRITE;

UNLOCK TABLES;

/*Table structure for table `presensi` */

DROP TABLE IF EXISTS `presensi`;

CREATE TABLE `presensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `presensi` */

LOCK TABLES `presensi` WRITE;

UNLOCK TABLES;

/*Table structure for table `role_permissions` */

DROP TABLE IF EXISTS `role_permissions`;

CREATE TABLE `role_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permissions_role_id_foreign` (`role_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_permissions` */

LOCK TABLES `role_permissions` WRITE;

insert  into `role_permissions`(`id`,`role_id`,`permission_id`,`created_at`,`updated_at`) values 
(1,1,1,NULL,NULL),
(2,1,2,NULL,NULL),
(3,1,3,NULL,NULL),
(4,1,4,NULL,NULL),
(5,1,5,NULL,NULL),
(6,1,6,NULL,NULL),
(7,1,7,NULL,NULL),
(8,1,8,NULL,NULL),
(9,1,9,NULL,NULL),
(10,1,10,NULL,NULL),
(11,1,11,NULL,NULL),
(12,1,12,NULL,NULL),
(13,1,13,NULL,NULL),
(14,1,14,NULL,NULL),
(15,1,15,NULL,NULL),
(16,1,16,NULL,NULL),
(17,1,17,NULL,NULL),
(18,1,18,NULL,NULL),
(23,1,23,NULL,NULL),
(24,1,24,NULL,NULL),
(25,1,25,NULL,NULL),
(26,1,26,NULL,NULL),
(39,1,51,'2023-06-24 06:34:11','2023-06-24 06:34:11'),
(40,1,52,'2023-06-24 06:34:11','2023-06-24 06:34:11'),
(41,1,53,'2023-06-24 06:34:11','2023-06-24 06:34:11'),
(42,1,54,'2023-06-24 06:34:11','2023-06-24 06:34:11'),
(43,1,59,'2023-06-24 06:36:27','2023-06-24 06:36:27'),
(44,1,60,'2023-06-24 06:36:27','2023-06-24 06:36:27'),
(45,1,61,'2023-06-24 06:36:27','2023-06-24 06:36:27'),
(46,1,62,'2023-06-24 06:36:27','2023-06-24 06:36:27'),
(47,1,63,'2023-07-04 06:06:14','2023-07-04 06:06:14'),
(48,1,64,'2023-07-04 06:06:14','2023-07-04 06:06:14'),
(49,1,65,'2023-07-04 06:06:14','2023-07-04 06:06:14'),
(50,1,66,'2023-07-04 06:06:14','2023-07-04 06:06:14'),
(51,1,67,'2023-07-10 02:26:58','2023-07-10 02:26:58'),
(52,1,68,'2023-07-10 02:26:58','2023-07-10 02:26:58'),
(53,1,69,'2023-07-10 02:26:58','2023-07-10 02:26:58'),
(54,1,70,'2023-07-10 02:26:58','2023-07-10 02:26:58'),
(63,1,71,'2023-07-12 03:47:10','2023-07-12 03:47:10'),
(64,1,72,'2023-07-12 03:47:10','2023-07-12 03:47:10'),
(65,1,73,'2023-07-12 03:47:10','2023-07-12 03:47:10'),
(66,1,74,'2023-07-12 03:47:10','2023-07-12 03:47:10');

UNLOCK TABLES;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

LOCK TABLES `roles` WRITE;

insert  into `roles`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Developer',NULL,NULL,NULL),
(2,'USER',NULL,NULL,NULL),
(3,'UMKM',NULL,NULL,NULL),
(4,'MITRA',NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `satuan_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satuan_simbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `satuan` */

LOCK TABLES `satuan` WRITE;

insert  into `satuan`(`id`,`satuan_nama`,`satuan_simbol`,`created_at`,`updated_at`) values 
(1,'sadavvxc','asdsa','2023-07-12 06:37:41','2023-07-12 06:41:10'),
(2,'asjidoask','2131asd','2023-07-12 07:38:29','2023-07-12 07:38:29'),
(3,'9fvkodkq','13sada','2023-07-12 07:38:35','2023-07-12 07:38:35');

UNLOCK TABLES;

/*Table structure for table `user_details` */

DROP TABLE IF EXISTS `user_details`;

CREATE TABLE `user_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `provinsi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_details_user_id_foreign` (`user_id`),
  CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_details` */

LOCK TABLES `user_details` WRITE;

UNLOCK TABLES;

/*Table structure for table `user_pref` */

DROP TABLE IF EXISTS `user_pref`;

CREATE TABLE `user_pref` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_pref` */

LOCK TABLES `user_pref` WRITE;

UNLOCK TABLES;

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_roles` */

LOCK TABLES `user_roles` WRITE;

insert  into `user_roles`(`id`,`user_id`,`role_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1,1,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`username`,`password`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'SmartAspoo','developer@gmail.com',NULL,'developer','$2y$10$Uowv1srtFJEPTwKEN20O3ebPs2ffN3dH3Tw6y8g/.ooDk.IjTAWge',NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
