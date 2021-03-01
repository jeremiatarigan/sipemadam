-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.5.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.6107
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table sipemadam.damkar_ref
DROP TABLE IF EXISTS `damkar_ref`;
CREATE TABLE IF NOT EXISTS `damkar_ref` (
  `damkar_id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(150) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  PRIMARY KEY (`damkar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sipemadam.damkar_ref: ~2 rows (approximately)
DELETE FROM `damkar_ref`;
/*!40000 ALTER TABLE `damkar_ref` DISABLE KEYS */;
INSERT INTO `damkar_ref` (`damkar_id`, `keterangan`, `latitude`, `longitude`) VALUES
	(1, 'Pemadam Simpang Pemda', NULL, NULL),
	(2, 'Pemadam Simpang Pos', NULL, NULL);
/*!40000 ALTER TABLE `damkar_ref` ENABLE KEYS */;

-- Dumping structure for table sipemadam.report
DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id_kejadian` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(250) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `ket` varchar(250) DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `tgl_laporan` date DEFAULT current_timestamp(),
  `status_laporan` tinyint(1) DEFAULT 0,
  `respon_to_office` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_kejadian`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sipemadam.report: ~2 rows (approximately)
DELETE FROM `report`;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id_kejadian`, `alamat`, `latitude`, `longitude`, `ket`, `gambar`, `user`, `tgl_laporan`, `status_laporan`, `respon_to_office`) VALUES
	(5, 'padangbulan', 6.66000000, 4.56000000, 'hfgh', 'hfg', 'warga1', '2021-02-11', 0, 0),
	(6, 'padangbulan', 6.66000000, 4.56000000, 'hfgh', 'hfg', 'warga2', '2021-02-11', 0, 0);
/*!40000 ALTER TABLE `report` ENABLE KEYS */;

-- Dumping structure for table sipemadam.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) DEFAULT NULL,
  `roles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table sipemadam.roles: ~3 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `roles`) VALUES
	(1, 'admin'),
	(2, 'Petugas'),
	(3, 'Warga');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table sipemadam.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `no_hp` bigint(20) NOT NULL DEFAULT 0,
  `role_id` tinyint(2) DEFAULT NULL,
  `damkar_id` tinyint(2) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`kd_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table sipemadam.user: ~2 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`kd_user`, `nama`, `username`, `password`, `email`, `no_hp`, `role_id`, `damkar_id`, `image`, `is_active`, `date_created`) VALUES
	(46, 'Evita S', 'evitas', '$2y$10$0lyzZy3AtGOSQSRLT2g2U.zSSI3/6G2R0dO0TEKN1NX4dSNzeF/2e', 'evitas@gmail.com', 0, 1, NULL, 'Screenshot_1.png', 1, '0000-00-00 00:00:00'),
	(47, 'Warga 1', 'warga1', '$2y$10$dkkORBrevekLZuZcF0mJ..JTAuAtvQ6s3V3HwA4p2TxZsLodpS5oC', NULL, 81256675855, 3, NULL, 'default.jpg', 1, '2021-02-25 06:48:39'),
	(48, 'Petugas 1', 'petugas1', '$2y$10$SsysbO30xKSfktz4v/d1MO1FlqJoZZk0Gu4AzBHZOc8LEb572fiRe', 'petugas1@gmail.com', 0, 2, 1, 'default.jpg', 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view sipemadam.user_view
DROP VIEW IF EXISTS `user_view`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_view` (
	`kd_user` INT(11) NOT NULL,
	`nama` VARCHAR(128) NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(128) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(256) NOT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(128) NULL COLLATE 'utf8_general_ci',
	`no_hp` BIGINT(20) NOT NULL,
	`role_id` TINYINT(2) NULL,
	`damkar_id` TINYINT(2) NULL,
	`image` VARCHAR(256) NULL COLLATE 'utf8_general_ci',
	`is_active` INT(1) NULL,
	`date_created` TIMESTAMP NOT NULL,
	`id` INT(11) NULL,
	`roles` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`keterangan` VARCHAR(150) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sipemadam.user_view
DROP VIEW IF EXISTS `user_view`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `user_view` AS SELECT user.*,roles.* , damkar_ref.keterangan FROM user 
LEFT JOIN roles ON user.role_id = roles.id 
LEFT JOIN damkar_ref ON user.damkar_id = damkar_ref.damkar_id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
