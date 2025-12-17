-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 17, 2025 at 07:03 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irish_folklore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `legendary_creatures`
--

DROP TABLE IF EXISTS `legendary_creatures`;
CREATE TABLE IF NOT EXISTS `legendary_creatures` (
  `creature_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`creature_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `legendary_creatures`
--

INSERT INTO `legendary_creatures` (`creature_id`, `name`, `description`, `image_url`, `created_at`) VALUES
(1, 'Fionn mac Cumhaill', 'A legendary hunter-warrior in Irish mythology.', 'images/fionn.jpg', '2025-11-05 12:06:19'),
(2, 'Cú Chulainn', 'A mythical hero with superhuman abilities.', 'images/cuchulainn.jpg', '2025-11-05 12:06:19'),
(3, 'The Dullahan', 'A headless rider on a black horse, harbinger of death.', 'images/dullahan.jpg', '2025-11-05 12:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `mythical_creatures`
--

DROP TABLE IF EXISTS `mythical_creatures`;
CREATE TABLE IF NOT EXISTS `mythical_creatures` (
  `creature_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`creature_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mythical_creatures`
--

INSERT INTO `mythical_creatures` (`creature_id`, `name`, `description`, `image_url`, `created_at`) VALUES
(1, 'Banshee', 'A female spirit who heralds death by wailing.', 'images/banshee.jpg', '2025-11-05 12:06:19'),
(2, 'Leprechaun', 'A small fairy in Irish folklore, known for mischief and gold.', 'images/leprechaun.jpg', '2025-11-05 12:06:19'),
(3, 'Selkie', 'A mythological creature capable of changing from seal to human.', 'images/selkie.jpg', '2025-11-05 12:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_items`
--

DROP TABLE IF EXISTS `shop_items`;
CREATE TABLE IF NOT EXISTS `shop_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` enum('T-shirt','Hoodie','Book','Accessories') NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL DEFAULT '0',
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop_items`
--

INSERT INTO `shop_items` (`item_id`, `name`, `category`, `description`, `price`, `stock_quantity`, `image_url`, `created_at`) VALUES
(1, 'Irish Folklore T-shirt', 'T-shirt', 'High quality cotton T-shirt with Irish folklore design.', 19.99, 100, 'images/tshirt.jpg', '2025-11-05 12:06:19'),
(2, 'Celtic Hoodie', 'Hoodie', 'Comfortable hoodie with Celtic knot design.', 39.99, 50, 'images/hoodie.jpg', '2025-11-05 12:06:19'),
(3, 'Irish Mythology Book', 'Book', 'An in-depth book about Irish myths and legends.', 14.99, 200, 'images/book.jpg', '2025-11-05 12:06:19'),
(4, 'Celtic Knot Bracelet', 'Accessories', 'Bracelet with traditional Celtic knot design.', 9.99, 150, 'images/bracelet.jpg', '2025-11-05 12:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'conor', '123@atu.ie', '$2y$10$HrKGdH.z1bhxGoEZYoyj4uYpMScbMtZPSjf0L.6yWb4y0B0sQsfRO', '2025-11-05 12:14:54'),
(2, 'conor1', '1234@atu.ie', '$2y$10$l1PsMUFSCEn0a4Tg6UwYAOaixkUH6qcOtVRgn5PpTJ5cCL1/dnouu', '2025-11-05 12:36:07'),
(3, 'Aaron', 'aaron@email.com', '$2y$10$JSJFRbUcX4IA0h3UkoFQJ.q.JmTZQ65MY34p/nBKgAjRV0fRvFGOm', '2025-12-17 12:52:17'),
(4, 'conorf', 'conor12@12.ie', '$2y$10$hbXVHowztxAFltFyPmi/1.E7AKkP0lcCX42eZH4v8W5.0Dt8yS0FK', '2025-12-17 15:48:48'),
(5, 'zian', 'zain12@1.ie', '$2y$10$1ath38uZv1/oRmq9yYUnvu1GuEg/M0Psy7cdbeYiHZKMw7KI9k4CC', '2025-12-17 16:50:35'),
(6, 'conor20', 'conor20@20.com', '$2y$10$97jiWymelrMoDcVRV8kjfeiUCeANRGoM5ZE.nIpdRfJLlJbNrJiHK', '2025-12-17 17:01:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `shop_items` (`item_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
