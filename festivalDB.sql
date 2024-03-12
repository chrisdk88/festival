-- --------------------------------------------------------
-- Vært:                         127.0.0.1
-- Server-version:               8.0.30 - MySQL Community Server - GPL
-- ServerOS:                     Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------
        
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for festival
CREATE DATABASE IF NOT EXISTS `festival` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `festival`;

-- Dumping structure for tabel festival.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.admin: ~2 rows (tilnærmelsesvis)
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(1, 'kasper', 'Merc1234'),
	(2, 'chris', 'Password1');

-- Dumping structure for tabel festival.artist
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `musicGenre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.artist: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.artist_event
CREATE TABLE IF NOT EXISTS `artist_event` (
  `artist_id` int NOT NULL,
  `event_id` int NOT NULL,
  PRIMARY KEY (`artist_id`,`event_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `artist_event_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  CONSTRAINT `artist_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.artist_event: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '0',
  `comment` varchar(500) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_comment_event` (`event_id`),
  CONSTRAINT `FK_comment_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.comment: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.event
CREATE TABLE IF NOT EXISTS `event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `create_by_admin_id` int NOT NULL DEFAULT '0',
  `updated_by_admin_id` int NOT NULL DEFAULT '0',
  `infoField` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__admin_3` (`create_by_admin_id`),
  KEY `FK__admin_4` (`updated_by_admin_id`),
  CONSTRAINT `FK__admin_3` FOREIGN KEY (`create_by_admin_id`) REFERENCES `admin` (`id`),
  CONSTRAINT `FK__admin_4` FOREIGN KEY (`updated_by_admin_id`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.event: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.image
CREATE TABLE IF NOT EXISTS `image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL DEFAULT '0',
  `imgName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_image_event` (`event_id`),
  CONSTRAINT `FK_image_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.image: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.organizer
CREATE TABLE IF NOT EXISTS `organizer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL DEFAULT '0',
  `name` int NOT NULL DEFAULT '0',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.organizer: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.rating
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL DEFAULT '0',
  `starRating` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_rating_event` (`event_id`),
  CONSTRAINT `FK_rating_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.rating: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.social
CREATE TABLE IF NOT EXISTS `social` (
  `id` int NOT NULL AUTO_INCREMENT,
  `artist_id` int NOT NULL,
  `facebookUrl` varchar(75) DEFAULT '0',
  `twitterUrl` varchar(75) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__artist` (`artist_id`),
  CONSTRAINT `FK__artist` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.social: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.sponsor
CREATE TABLE IF NOT EXISTS `sponsor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `create_by_admin_id` int NOT NULL DEFAULT '0',
  `updated_by_admin_id` int NOT NULL DEFAULT '0',
  `imgName` varchar(50) NOT NULL DEFAULT '0',
  `url` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__admin` (`create_by_admin_id`),
  KEY `FK__admin_2` (`updated_by_admin_id`),
  CONSTRAINT `FK__admin` FOREIGN KEY (`create_by_admin_id`) REFERENCES `admin` (`id`),
  CONSTRAINT `FK__admin_2` FOREIGN KEY (`updated_by_admin_id`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.sponsor: ~0 rows (tilnærmelsesvis)

-- Dumping structure for tabel festival.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL DEFAULT '0',
  `vipTicket` int NOT NULL DEFAULT '0',
  `oneDayTicket` int NOT NULL DEFAULT '0',
  `everyDayTicket` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__event` (`event_id`),
  CONSTRAINT `FK__event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table festival.ticket: ~0 rows (tilnærmelsesvis)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
