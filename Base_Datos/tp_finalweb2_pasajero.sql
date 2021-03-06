CREATE DATABASE  IF NOT EXISTS `tp_finalweb2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tp_finalweb2`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: tp_finalweb2
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `pasajero`
--

DROP TABLE IF EXISTS `pasajero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasajero` (
  `idPasajero` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellido` varchar(30) DEFAULT NULL,
  `Fec_Nac` date DEFAULT NULL,
  `Dni` int(11) NOT NULL,
  `Tipo_doc` varchar(45) NOT NULL,
  `Email` varchar(35) DEFAULT NULL,
  `Nro_Tarjeta` int(11) DEFAULT NULL,
  `Nombre_Titular` varchar(45) DEFAULT NULL,
  `Tipo_Tarjeta` varchar(45) DEFAULT NULL,
  `Vencimiento` date DEFAULT NULL,
  `Nro_Doc_Titular` int(11) DEFAULT NULL,
  `Tipo_Doc_Titular` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idPasajero`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasajero`
--

LOCK TABLES `pasajero` WRITE;
/*!40000 ALTER TABLE `pasajero` DISABLE KEYS */;
INSERT INTO `pasajero` VALUES (1,'Matias','Celiz',NULL,50225478,'dni','1990-07-16',NULL,NULL,NULL,NULL,NULL,NULL),(2,'aldana','Porto',NULL,65887789,'dni','2000-05-01',NULL,NULL,NULL,NULL,NULL,NULL),(3,'Matias','Celiz',NULL,50225478,'dni','1990-07-16',NULL,NULL,NULL,NULL,NULL,NULL),(4,'aldana','Porto',NULL,65887789,'dni','2000-05-01',NULL,NULL,NULL,NULL,NULL,NULL),(5,'tito','Norboski',NULL,50222544,'dni','2000-07-09',NULL,NULL,NULL,NULL,NULL,NULL),(6,'jomi','Clour',NULL,25114587,'dni','1968-02-01',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pasajero` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-07  2:25:28
