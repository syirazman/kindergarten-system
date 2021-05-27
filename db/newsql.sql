-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kindergarten
CREATE DATABASE IF NOT EXISTS `kindergarten` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kindergarten`;

-- Dumping structure for table kindergarten.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kindergarten.classes: ~2 rows (approximately)
DELETE FROM `classes`;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` (`id`, `class_name`) VALUES
	(1, 'Aman'),
	(2, 'Cerdas');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Dumping structure for table kindergarten.class_activity
CREATE TABLE IF NOT EXISTS `class_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kindergarten.class_activity: ~1 rows (approximately)
DELETE FROM `class_activity`;
/*!40000 ALTER TABLE `class_activity` DISABLE KEYS */;
INSERT INTO `class_activity` (`id`, `class`, `topic`, `date`, `remarks`) VALUES
	(2, 'Aman', 'Testing 1', '2021-06-05', 'dwa');
/*!40000 ALTER TABLE `class_activity` ENABLE KEYS */;

-- Dumping structure for table kindergarten.kehadiran_cikgu
CREATE TABLE IF NOT EXISTS `kehadiran_cikgu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `checkin` varchar(50) DEFAULT NULL,
  `checkout` varchar(50) DEFAULT NULL,
  `total_hours` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kindergarten.kehadiran_cikgu: ~2 rows (approximately)
DELETE FROM `kehadiran_cikgu`;
/*!40000 ALTER TABLE `kehadiran_cikgu` DISABLE KEYS */;
INSERT INTO `kehadiran_cikgu` (`id`, `users_id`, `date`, `checkin`, `checkout`, `total_hours`) VALUES
	(3, 1, '15-05-2021', '07:38:50 AM', '08:02:36 AM', '0 hours, 23 minutes and 46 seconds'),
	(4, 2, '15-05-2021', '07:40:08 AM', '08:01:51 AM', '0 hours, 21 minutes and 43 seconds');
/*!40000 ALTER TABLE `kehadiran_cikgu` ENABLE KEYS */;

-- Dumping structure for table kindergarten.kehadiran_pelajar
CREATE TABLE IF NOT EXISTS `kehadiran_pelajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table kindergarten.kehadiran_pelajar: ~0 rows (approximately)
DELETE FROM `kehadiran_pelajar`;
/*!40000 ALTER TABLE `kehadiran_pelajar` DISABLE KEYS */;
/*!40000 ALTER TABLE `kehadiran_pelajar` ENABLE KEYS */;

-- Dumping structure for table kindergarten.parent
CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `no_telefon` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `ic` varchar(50) DEFAULT NULL,
  `relation_student` varchar(50) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kindergarten.parent: ~0 rows (approximately)
DELETE FROM `parent`;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;

-- Dumping structure for table kindergarten.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` int(11) NOT NULL,
  `nama_tadika` varchar(50) DEFAULT NULL,
  `no_tadika` varchar(50) DEFAULT NULL,
  `jawatan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kindergarten.profile: ~2 rows (approximately)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `users_id`, `name`, `email`, `phone`, `nama_tadika`, `no_tadika`, `jawatan`, `alamat`) VALUES
	(1, 1, 'Testing', 'testing@gmail.com', 123456789, 'dwa', 'dwaawa', 'Guru', 'Shah Alam'),
	(5, 2, 'Testing', 'testing@gmail.com', 123456789, NULL, NULL, 'Guru', 'Shah Alam');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Dumping structure for table kindergarten.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mykid` varchar(50) DEFAULT NULL,
  `idNo` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `guardian` varchar(255) DEFAULT NULL,
  `noic` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `relate` varchar(255) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `date_register` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'processing',
  `kelas` varchar(50) DEFAULT NULL,
  `is_new` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kindergarten.students: ~0 rows (approximately)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table kindergarten.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_level` varchar(1) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table kindergarten.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `user_level`) VALUES
	(1, 'admin', 'admin', '1'),
	(2, 'user', 'user', '2'),
	(3, 'test', 'test', '2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
