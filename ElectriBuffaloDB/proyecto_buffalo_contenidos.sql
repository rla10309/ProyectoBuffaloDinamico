-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: proyecto_buffalo
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contenidos`
--

DROP TABLE IF EXISTS `contenidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) DEFAULT NULL,
  `texto` text,
  `fecha_creacion` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenidos`
--

LOCK TABLES `contenidos` WRITE;
/*!40000 ALTER TABLE `contenidos` DISABLE KEYS */;
INSERT INTO `contenidos` VALUES (1,'79f97cdc6b65fb7b7ba890cd877b3c02.jpg','<p>Este trabajo, el tercero de su andadura por los sinuosos senderos del rock, se eleva como una plegaria y acaba constituyendo un exorcismo de todos los demonios aparecidos tras la muerte, en 2016, de Alejandro “Espina” Blanco, miembro fundador de la banda y también bajista de Ilegales durante 20 años.</p><p>Patrolman (Boomerang Discos) es, con toda la autoridad, un disco de rock con mayúsculas. La producción, a cargo del también miembro de la banda Sergio “Tutu”, no da opción a la especulación. Las canciones, el arma secreta del cuarteto, suenan como una apisonadora con rodillo de seda, y esa voz, quizá una de las mejores de España, se deja oír con ese timbre precioso, delicado pero no sensiblero y seguro sin ser arrogante, de los que saben perfectamente qué se traen entre manos.</p>','2024-03-04');
/*!40000 ALTER TABLE `contenidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-16 18:58:04