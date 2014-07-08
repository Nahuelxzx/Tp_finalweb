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
-- Table structure for table `vuelo`
--

DROP TABLE IF EXISTS `vuelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vuelo` (
  `idVuelo` int(11) NOT NULL AUTO_INCREMENT,
  `Aepto_Origen` varchar(6) NOT NULL,
  `Aepto_Destino` varchar(6) NOT NULL,
  `Hora_Salida` time DEFAULT NULL,
  `Hora_Llegada` time DEFAULT NULL,
  `Dia_vuelo` varchar(7) DEFAULT NULL,
  `Fecha_Salida` date DEFAULT '2014-07-18',
  `idAvion` int(11) NOT NULL,
  PRIMARY KEY (`idVuelo`),
  KEY `FK_Aepto_Origen_idx` (`Aepto_Origen`),
  KEY `FK_Aepto_Destino_idx` (`Aepto_Destino`),
  KEY `FK_Nro_Avion_idx` (`idAvion`),
  CONSTRAINT `FK_Aepto_Destino` FOREIGN KEY (`Aepto_Destino`) REFERENCES `aeropuerto` (`idAepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Aepto_Origen` FOREIGN KEY (`Aepto_Origen`) REFERENCES `aeropuerto` (`idAepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Nro_Avion` FOREIGN KEY (`idAvion`) REFERENCES `avion` (`idAvion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelo`
--

LOCK TABLES `vuelo` WRITE;
/*!40000 ALTER TABLE `vuelo` DISABLE KEYS */;
INSERT INTO `vuelo` VALUES (1,'SAVR','SAZY','16:20:00','18:20:00','Lunes','2014-05-10',3),(2,'SAZA','SAZW','14:20:00','16:15:00','Martes','2014-03-05',2),(3,'SAAP','SAAR','00:00:20','00:00:22','Mierco','2014-02-07',2),(4,'SAAP','SAAU','00:00:14','00:00:18','Jueves','2014-02-07',2),(5,'SAVR','SAZY','00:00:15','00:00:17','vierne','2014-05-11',3),(6,'SAVR','SAZY','00:00:12','00:00:14','Lunes','2014-05-10',1),(7,'SAVR','SAZY','00:00:10','00:00:12','Lunes','2014-05-10',2),(8,'SABE','SAZV','10:00:00','11:00:00','1111100','2014-06-05',2),(9,'SABE','SAZH','00:00:12','00:00:14','0000100','2014-05-05',1),(10,'SACO','SAOC','14:00:00','19:00:00','0011001','2014-07-18',3),(11,'SABE','SAZV','14:00:00','16:00:00','1111100','2014-07-18',2),(12,'SAOC','SACO','17:00:00','19:00:00','0011001','2014-07-18',3);
/*!40000 ALTER TABLE `vuelo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-07  2:25:27
