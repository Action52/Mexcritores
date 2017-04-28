-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for osx10.6 (i386)
--
-- Host: localhost    Database: mexcritoresMYSQL
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokens`
--

LOCK TABLES `tokens` WRITE;
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
INSERT INTO `tokens` VALUES (1,'GTIXJQJGZGHTMOZD','LuisLeon','202cb962ac59075b964b07152d234b70',0,'leonvillapun@gmail.com','2017-04-25 23:31:37',0,'Luis Alfredo','LeÃ³n VillapÃºn'),(2,'MTZHPTQFMCKCMXOT','Prueba1','202cb962ac59075b964b07152d234b70',0,'leonvillapun@gmail.com','2017-04-26 10:24:00',0,'Pr1','Pr1'),(3,'GXTSFHKXYPFKOSRI','Prueba1','d41d8cd98f00b204e9800998ecf8427e',0,'leonvillapun@gmail.com','2017-04-26 10:24:51',0,'Pr1','Pr1'),(4,'ZNBWZDMYHRBZYTFJ','Prueba1','d41d8cd98f00b204e9800998ecf8427e',0,'leonvillapun@gmail.com','2017-04-26 10:25:26',0,'Pr1','Pr1'),(5,'TFJHAFMTNIGXBCHI','Prueba1','d41d8cd98f00b204e9800998ecf8427e',0,'leonvillapun@gmail.com','2017-04-26 10:29:18',0,'Pr1','Pr1'),(6,'WUEUOBUDTTGSXNFX','Prueba1','d41d8cd98f00b204e9800998ecf8427e',0,'leonvillapun@gmail.com','2017-04-26 10:42:36',0,'Pr1','Pr1'),(7,'ZABEHLCGAIROAIXU','Prueba1','d41d8cd98f00b204e9800998ecf8427e',0,'leonvillapun@gmail.com','2017-04-26 10:43:32',0,'Pr1','Pr1'),(8,'BHUAKGYSYZRWTXGP','Prueba1','d41d8cd98f00b204e9800998ecf8427e',0,'leonvillapun@gmail.com','2017-04-26 10:49:29',0,'Pr1','Pr1'),(9,'RKJGMEJFXQYUEDRF','Acanto','202cb962ac59075b964b07152d234b70',1,'acanto95@gmail.com','2017-04-27 13:23:00',0,'Armando','Canto'),(10,'QXQZNAGMHOFUDEYP','Luis','3d17514e3da75d06bf5ccaed068ba7da',0,'A01322275@itesm.mx','2017-04-28 13:53:25',1,'Prueba2','Prueba2Ap');
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Luis','3d17514e3da75d06bf5ccaed068ba7da',0,'A01322275@itesm.mx','2017-04-28 13:56:03','Prueba2','Prueba2Ap'),(2,'Luis','3d17514e3da75d06bf5ccaed068ba7da',0,'A01322275@itesm.mx','2017-04-28 13:58:00','Prueba2','Prueba2Ap'),(3,'Luis','3d17514e3da75d06bf5ccaed068ba7da',0,'A01322275@itesm.mx','2017-04-28 13:58:26','Prueba2','Prueba2Ap');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-28 14:10:48
