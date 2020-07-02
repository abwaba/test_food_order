-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.27 - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_restaurant
CREATE DATABASE IF NOT EXISTS `db_restaurant` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_restaurant`;

-- Dumping structure for table db_restaurant.foods
CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table db_restaurant.foods: ~2 rows (approximately)
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Martabak', 23000, 'Y', '2020-07-02 01:12:01', '2020-07-02 01:12:01'),
	(2, 'Roti Bakar', 15000, 'Y', '2020-07-02 01:14:37', '2020-07-02 01:14:37'),
	(3, 'Gehu', 2000, 'Y', '2020-07-02 09:15:59', '2020-07-02 09:15:59');
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;

-- Dumping structure for table db_restaurant.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `no` varchar(50) NOT NULL,
  `items` json NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  `desk_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_restaurant.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`no`, `items`, `user_id`, `status`, `desk_no`, `created_at`, `updated_at`) VALUES
	('ABC02072020-001', '[{"qty": 1, "selected": {"id": 1, "name": "Martabak", "price": 23000, "status": "Y", "created_at": "2020-07-02T01:12:01.000000Z", "updated_at": "2020-07-02T01:12:01.000000Z"}}]', NULL, 'Y', 1, '2020-07-02 06:27:54', '2020-07-02 06:27:54'),
	('ABC02072020-002', '[{"qty": 2, "selected": {"id": 1, "name": "Martabak", "price": 23000, "status": "Y", "created_at": "2020-07-02T01:12:01.000000Z", "updated_at": "2020-07-02T01:12:01.000000Z"}}, {"qty": 1, "selected": {"id": 2, "name": "Roti Bakar", "price": 15000, "status": "Y", "created_at": "2020-07-02T01:14:37.000000Z", "updated_at": "2020-07-02T01:14:37.000000Z"}}]', NULL, 'N', 2, '2020-07-02 06:28:15', '2020-07-02 08:09:24');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table db_restaurant.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL DEFAULT '0',
  `food_id` int(11) NOT NULL DEFAULT '0',
  `drink_id` int(11) NOT NULL DEFAULT '0',
  `cretaed_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_restaurant.order_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table db_restaurant.users
CREATE TABLE IF NOT EXISTS `users` (
  `nik` varchar(50) DEFAULT NULL,
  `password` text,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_restaurant.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`nik`, `password`, `name`, `role`, `created_at`, `updated_at`) VALUES
	('1234', '$2y$10$wtfRHr6yaO.d0XTqiH/j1urUs95NpGFUUCWY14U.Jo89i3iLAirWu ', 'Kasir', 'kasir', NULL, NULL),
	('8989', '$2y$10$AAGhKVemNSE.mdsgWf.6aO6c3gbuybxyKgyy/MqToWIH3iCakss9W', 'Ria', 'kasir', '2020-07-02 09:30:15', '2020-07-02 09:30:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
