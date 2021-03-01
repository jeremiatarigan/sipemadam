-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bengkel_terdekat.bengkel
CREATE TABLE IF NOT EXISTS `bengkel` (
  `id_bengkel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bengkel` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `service` varchar(150) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lang` double DEFAULT NULL,
  `no_telp` bigint(12) DEFAULT NULL,
  `antrian` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id_bengkel`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel_terdekat.bengkel: ~4 rows (approximately)
DELETE FROM `bengkel`;
/*!40000 ALTER TABLE `bengkel` DISABLE KEYS */;
INSERT INTO `bengkel` (`id_bengkel`, `nama_bengkel`, `alamat`, `jam_buka`, `jam_tutup`, `service`, `lat`, `lang`, `no_telp`, `antrian`) VALUES
	(1, 'Honda 1', 'medan', '23:24:20', '23:24:22', 'ada', 3.548236, 98.58925, 789979797, 0),
	(2, 'Honda 2', 'medan', '23:24:20', '23:24:22', 'ada', 3.556967, 98.593292, 789979797, 0),
	(5, 'Honda 3', 'medan', '23:24:20', '23:24:22', 'ada', 3.558327, 98.594116, 789979797, 5),
	(6, 'Honda 4', 'medan', '23:24:20', '23:24:22', 'ada', 3.550178, 98.589826, 789979797, 0);
/*!40000 ALTER TABLE `bengkel` ENABLE KEYS */;

-- Dumping structure for table bengkel_terdekat.bengkel_images
CREATE TABLE IF NOT EXISTS `bengkel_images` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_bengkel` int(11) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `FK_bengkel_images_bengkel` (`id_bengkel`),
  CONSTRAINT `FK_bengkel_images_bengkel` FOREIGN KEY (`id_bengkel`) REFERENCES `bengkel` (`id_bengkel`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel_terdekat.bengkel_images: ~5 rows (approximately)
DELETE FROM `bengkel_images`;
/*!40000 ALTER TABLE `bengkel_images` DISABLE KEYS */;
INSERT INTO `bengkel_images` (`id_gambar`, `id_bengkel`, `foto`) VALUES
	(2, 2, 'images6.jpg'),
	(5, 2, 'images6.jpg'),
	(6, 1, 'images6.jpg'),
	(7, 1, 'location1.png'),
	(8, 1, 'phone_(3).png'),
	(9, 5, 'phone_(3).png');
/*!40000 ALTER TABLE `bengkel_images` ENABLE KEYS */;

-- Dumping structure for table bengkel_terdekat.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) DEFAULT NULL,
  `roles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel_terdekat.roles: ~3 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `roles`) VALUES
	(1, 'admin'),
	(2, 'members'),
	(3, 'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table bengkel_terdekat.user
CREATE TABLE IF NOT EXISTS `user` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(1) DEFAULT 3,
  `bengkel_id` int(11) DEFAULT 2,
  `image` varchar(256) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`kd_user`),
  KEY `FK_user_bengkel` (`bengkel_id`),
  CONSTRAINT `FK_user_bengkel` FOREIGN KEY (`bengkel_id`) REFERENCES `bengkel` (`id_bengkel`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel_terdekat.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`kd_user`, `nama`, `username`, `password`, `email`, `role_id`, `bengkel_id`, `image`, `is_active`, `date_created`) VALUES
	(7, 'Dummy Developed', 'dedi', '$2y$10$l3Z2UQ4JDf3zvGg1Ij1nruurw05On8C/vHgqzAKgXBoUmCa7gUGX6', 'dummydeveloped@gmail.com', 1, 2, 'default.png', 1, '0000-00-00 00:00:00'),
	(22, 'Kekelengan', '', '$2y$10$NGSaDbRZdXXmplwQgkGC9Oc4zIQCjy5tCIZlIJ5DW/CjwJ22vS4cG', 'kekelengan@gmail.com', 2, 1, 'default.jpg', 1, '0000-00-00 00:00:00'),
	(23, 'Kekelengan', 'dd', '$2y$10$NGSaDbRZdXXmplwQgkGC9Oc4zIQCjy5tCIZlIJ5DW/CjwJ22vS4cG', 'user1@gmail.com', 3, 5, 'default.jpg', 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view bengkel_terdekat.user_bengkel_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_bengkel_view` (
	`email` VARCHAR(128) NOT NULL COLLATE 'utf8_general_ci',
	`id_bengkel` INT(11) NULL,
	`nama_bengkel` VARCHAR(150) NULL COLLATE 'utf8_general_ci',
	`alamat` TEXT NULL COLLATE 'utf8_general_ci',
	`jam_buka` TIME NULL,
	`jam_tutup` TIME NULL,
	`service` VARCHAR(150) NULL COLLATE 'utf8_general_ci',
	`lat` DOUBLE NULL,
	`lang` DOUBLE NULL,
	`no_telp` BIGINT(12) NULL,
	`antrian` TINYINT(4) NULL
) ENGINE=MyISAM;

-- Dumping structure for view bengkel_terdekat.user_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_view` (
	`kd_user` INT(11) NOT NULL,
	`email` VARCHAR(128) NOT NULL COLLATE 'utf8_general_ci',
	`nama` VARCHAR(128) NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(256) NOT NULL COLLATE 'utf8_general_ci',
	`bengkel_id` VARCHAR(150) NULL COLLATE 'utf8_general_ci',
	`role_id` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`is_active` INT(1) NULL
) ENGINE=MyISAM;

-- Dumping structure for view bengkel_terdekat.user_bengkel_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_bengkel_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_bengkel_view` AS SELECT a.email , b.* FROM user a
LEFT JOIN bengkel b ON a.bengkel_id = b.id_bengkel ;

-- Dumping structure for view bengkel_terdekat.user_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view` AS SELECT a.kd_user , a.email,a.nama,a.password,c.nama_bengkel as bengkel_id ,b.roles as role_id ,a.is_active FROM user a
LEFT JOIN roles b ON a.role_id = b.id
LEFT JOIN bengkel c ON a.bengkel_id = c.id_bengkel ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
