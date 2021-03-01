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
DROP TABLE IF EXISTS `bengkel`;
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
  PRIMARY KEY (`id_bengkel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel_terdekat.bengkel: ~2 rows (approximately)
DELETE FROM `bengkel`;
/*!40000 ALTER TABLE `bengkel` DISABLE KEYS */;
INSERT INTO `bengkel` (`id_bengkel`, `nama_bengkel`, `alamat`, `jam_buka`, `jam_tutup`, `service`, `lat`, `lang`, `no_telp`) VALUES
	(1, 'Honda 1', 'medan', '23:24:20', '23:24:22', 'ada', 3.554783, 98.592037, 789979797),
	(2, 'Honda 2', 'medan', '23:24:20', '23:24:22', 'ada', 3.556967, 98.593292, 789979797);
/*!40000 ALTER TABLE `bengkel` ENABLE KEYS */;

-- Dumping structure for table bengkel_terdekat.bengkel_images
DROP TABLE IF EXISTS `bengkel_images`;
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
	(8, 1, 'phone_(3).png');
/*!40000 ALTER TABLE `bengkel_images` ENABLE KEYS */;

-- Dumping structure for table bengkel_terdekat.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(1) DEFAULT 2,
  `image` varchar(256) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel_terdekat.user: ~4 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`kd_user`, `nama`, `username`, `password`, `email`, `role_id`, `image`, `is_active`, `date_created`) VALUES
	(7, 'Dummy Developed', 'dedi', '$2y$10$l3Z2UQ4JDf3zvGg1Ij1nruurw05On8C/vHgqzAKgXBoUmCa7gUGX6', 'dummydeveloped@gmail.com', 1, 'default.png', 1, '0000-00-00 00:00:00'),
	(8, 'Malem Banta', 'Malem', '$2y$10$l3Z2UQ4JDf3zvGg1Ij1nruurw05On8C/vHgqzAKgXBoUmCa7gUGX6', 'malembanta@gmail.com', 2, 'default.png', 0, '0000-00-00 00:00:00'),
	(19, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 2, NULL, 1, '2020-08-31 20:08:05'),
	(20, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 2, NULL, 1, '2020-08-31 20:21:58'),
	(21, NULL, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'admin3@gmail.com', 2, NULL, 1, '2020-09-07 18:42:52');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
