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
-- Table structure for table `aeropuerto`
--

DROP TABLE IF EXISTS `aeropuerto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aeropuerto` (
  `idAepto` varchar(6) NOT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  `Aepto` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idAepto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aeropuerto`
--

LOCK TABLES `aeropuerto` WRITE;
/*!40000 ALTER TABLE `aeropuerto` DISABLE KEYS */;
INSERT INTO `aeropuerto` VALUES ('SAAC','Concordia','Entre Rios','Aeropuerto Comodoro Pierrestegui\r'),('SAAJ','Junin','Buenos Aires','Aeropuerto de Junin\r'),('SAAK','Isla Martin Garcia','Buenos Aires','Aeropuerto Isla Martin Garcia\r'),('SAAP','Parana','Entre Rios','Aeropuerto General Justo Jose de Urquiza\r'),('SAAR','Rosario','Santa Fe','Aeropuerto Internacional Rosario Islas Malvinas\r'),('SAAU','Villaguay','Entre Rios','Aeropuerto de Villaguay\r'),('SAAV','Sauce Viejo','Santa Fe','Aeropuerto de Sauce Viejo\r'),('SABE','Buenos Aires','CABA','Aeroparque Jorge Newbery\r'),('SACC','La Cumbre','Cordoba','Aeropuerto La Cumbre\r'),('SACO','Cordoba','Cordoba','Aeropuerto Internacional Ingeniero Ambrosio Taravella\r'),('SACP','Chepes','La Rioja','Aeropuerto Chepes\r'),('SACT','Chamical','La Rioja','Aeropuerto Gobernador Gordillo\r'),('SADD','Don Torcuato','Buenos Aires','Aerodromo de Don Torcuato\r'),('SADF','San Fernando','Buenos Aires','Aeropuerto Internacional de San Fernando\r'),('SADJ','Jose C. Paz','Buenos Aires','Aeropuerto Mariano Moreno\r'),('SADL','La Plata','Buenos Aires','Aeropuerto de La Plata\r'),('SADM','Moron','Buenos Aires','Aeropuerto de Moron\r'),('SADO','Campo de Mayo','Buenos Aires','Aerodromo de Campo de Mayo\r'),('SADP','El Palomar','Buenos Aires','Aeropuerto El Palomar\r'),('SADS','San Justo','Buenos Aires','Aeropuerto de San Justo\r'),('SAEM','Miramar','Buenos Aires','Aerodromo Juan Domingo Peron\r'),('SAEZ','Ezeiza','Buenos Aires','Aeropuerto Internacional Ministro Pistarini\r'),('SAFS','Sunchales','Santa Fe','Aeropuerto de Sunchales\r'),('SAHE','Caviahue','Neuquen','Aeropuerto de Caviahue\r'),('SAHR','General Roca','Rio Negro','Aeropuerto de General Roca\r'),('SAHZ','Zapala','Neuquen','Aeropuerto de Zapala\r'),('SAMA','General Alvear','Mendoza','Aeropuerto de General Alvear\r'),('SAME','Mendoza','Mendoza','Aeropuerto Internacional El Plumerillo\r'),('SAMM','Malargue','Mendoza','Aeropuerto Internacional Comodoro Ricardo Salomon\r'),('SAMR','San Rafael','Mendoza','Aeropuerto Internacional Suboficial Ayudante Santiago Germano\r'),('SANC','San Fernando del Valle de Catamarca','Catamarca','Aeropuerto Coronel Felipe Varela\r'),('SANE','Santiago del Estero','Santiago del Estero','Aeropuerto Vicecomodoro Angel de la Paz Aragones\r'),('SANL','La Rioja','La Rioja','Aeropuerto Capitan Vicente Almandos Amonacide\r'),('SANO','Chilecito','La Rioja','Aeropuerto Chilecito\r'),('SANR','Termas de Rio Hondo','Santiago del Estero','Aeropuerto Internacional Termas de Rio Hondo\r'),('SANT','San Miguel de Tucuman','Tucuman','Aeropuerto Internacional Teniente General Benjamin Matienzo\r'),('SANU','San Juan','San Juan','Aeropuerto Domingo Faustino Sarmiento\r'),('SANW','Ceres','Santa Fe','Aeropuerto Ceres\r'),('SAOC','Rio Cuarto','Cordoba','Aeropuerto de Rio Cuarto\r'),('SAOD','Villa Dolores','Cordoba','Aeropuerto de Villa Dolores\r'),('SAOL','Laboulaye','Cordoba','Aerodromo de Laboulaye\r'),('SAOR','Villa Reynolds','San Luis','Aeropuerto de Villa Reynolds\r'),('SAOS','Merlo','San Luis','Aeropuerto Internacional Valle del Conlara\r'),('SAOU','San Luis','San Luis','Aeropuerto Brigadier Mayor Cesar Raul Ojeda\r'),('SARC','Corrientes','Corrientes','Aeropuerto Internacional Doctor Fernando Piragine Niveyro\r'),('SARE','Resistencia','Chaco','Aeropuerto Internacional de Resistencia\r'),('SARF','Formosa','Formosa','Aeropuerto Internacional de Formosa\r'),('SARI','Puerto Iguazu','Misiones','Aeropuerto Internacional de Puerto Iguazu\r'),('SARL','Paso de los Libres','Corrientes','Aeropuerto Internacional de Paso de los Libres\r'),('SARM','Monte Caseros','Corrientes','Aeropuerto de Monte Caseros\r'),('SARP','Posadas','Misiones','Aeropuerto Internacional Libertador General Jose de San Martin\r'),('SASA','Salta','Salta','Aeropuerto Internacional Martin Miguel de Guemes\r'),('SASJ','Perico','Jujuy','Aeropuerto Internacional Gobernador Horacio Guzman\r'),('SASO','San Ramon de la Nueva Oran','Salta','Aero Club Oran\r'),('SAST','Tartagal','Salta','Aeropuerto de Tartagal\r'),('SASZ','Presidencia Roque Saenz Pena','Chaco','Aeropuerto de Presidencia Roque Saenz Pena\r'),('SATC','Clorinda','Formosa','Aeropuerto Clorinda\r'),('SATK','Las Lomitas','Formosa','Aerodromo Alferez Armando Rodriguez\r'),('SATR','Reconquista','Santa Fe','Aeropuerto Daniel Jurkic\r'),('SATU','Curuzu Cuatia','Corrientes','Aeropuerto de Curuzu Cuatia\r'),('SAVB','El Bolson','Rio Negro','Aeropuerto de El Bolson\r'),('SAVC','Comodoro Rivadavia','Chubut','Aeropuerto Internacional General Enrique Mosconi\r'),('SAVE','Esquel','Chubut','Aeropuerto Brigadier General Antonio Parodi\r'),('SAVH','Las Heras','Santa Cruz','Aeropuerto Las Heras\r'),('SAVJ','Ingeniero Jacobacci','Rio Negro','Aeropuerto de Ingeniero Jacobacci\r'),('SAVR','Alto Rio Senguer','Chubut','Aeropuerto Alto Rio Senguer\r'),('SAVT','Trelew','Chubut','Aeropuerto Almirante Marco Andres Zar\r'),('SAVV','Viedma','Rio Negro','Aeropuerto Gobernador Edgardo Castello\r'),('SAVY','Puerto Madryn','Chubut','Aeropuerto El Tehuelche\r'),('SAWA','El Calafate','Santa Cruz','Aeropuerto de Lago Argentino\r'),('SAWC','El Calafate','Santa Cruz','Aeropuerto Comandante Armando Tola\r'),('SAWD','Puerto Deseado','Santa Cruz','Aeropuerto Puerto Deseado\r'),('SAWE','Rio Grande','Tierra del Fuego','Aeropuerto Internacional Gob. Ramon Trejo Noel\r'),('SAWG','Rio Gallegos','Santa Cruz','Aeropuerto Internacional Piloto Civil Norberto Fernandez\r'),('SAWH','Ushuaia','Tierra del Fuego','Aeropuerto de Ushuaia\r'),('SAWJ','Puerto San Julian','Santa Cruz','Aeropuerto Capitan Jose Daniel Vazquez\r'),('SAWP','Perito Moreno','Santa Cruz','Aeropuerto Perito Moreno\r'),('SAWT','Rio Turbio','Santa Cruz','Aeropuerto Rio Turbio\r'),('SAWU','Puerto Santa Cruz','Santa Cruz','Aeropuerto de Puerto Santa Cruz\r'),('SAZA','Azul','Buenos Aires','Aeropuerto de Azul\r'),('SAZB','Bahia Blanca','Buenos Aires','Aeropuerto Comandante Espora\r'),('SAZC','Coronel Suarez','Buenos Aires','Aeropuerto Brigadier Hector Eduardo Ruiz\r'),('SAZD','Dolores','Buenos Aires','Aerodromo de Dolores\r'),('SAZF','Olavarria','Buenos Aires','Aeropuerto de Olavarria\r'),('SAZG','General Pico','La Pampa','Aeropuerto de General Pico\r'),('SAZH','Tres Arroyos','Buenos Aires','Aeropuerto Municipal Primer Teniente Hector Ricardo Volponi\r'),('SAZI','Bolivar','Buenos Aires','Aeropuerto de Bolivar\r'),('SAZL','Santa Teresita','Buenos Aires','Aeropuerto de Santa Teresita\r'),('SAZM','Mar del Plata','Buenos Aires','Aeropuerto Internacional Astor Piazolla\r'),('SAZN','Neuquen','Neuquen','Aeropuerto Internacional Presidente Peron\r'),('SAZO','Necochea','Buenos Aires','Aeropuerto Edgardo Hugo Yelpo\r'),('SAZP','Pehuajo','Buenos Aires','Aeropuerto Comodoro P. Zanni\r'),('SAZR','Santa Rosa','La Pampa','Aeropuerto de Santa Rosa\r'),('SAZS','Bariloche','Rio Negro','Aeropuerto Internacional Teniente Luis Candelaria\r'),('SAZT','Tandil','Buenos Aires','Aeropuerto de Tandil\r'),('SAZV','Villa Gesell','Buenos Aires','Aeropuerto de Villa Gesell\r'),('SAZW','Cutral-Co','Neuquen','Aeropuerto de Cutral-Co\r'),('SAZY','San Martin de los Andes','Neuquen','Aeropuerto Aviador Carlos Campos\r');
/*!40000 ALTER TABLE `aeropuerto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-27 23:55:51
