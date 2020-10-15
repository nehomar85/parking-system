CREATE DATABASE  IF NOT EXISTS `parking` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `parking`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: parking
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `parqueadero`
--

DROP TABLE IF EXISTS `parqueadero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `parqueadero` (
  `id_parqueadero` int(11) NOT NULL AUTO_INCREMENT,
  `num_puesto` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  PRIMARY KEY (`id_parqueadero`),
  KEY `id_vehiculo_idx` (`id_vehiculo`),
  CONSTRAINT `tipo_vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parqueadero`
--

LOCK TABLES `parqueadero` WRITE;
/*!40000 ALTER TABLE `parqueadero` DISABLE KEYS */;
INSERT INTO `parqueadero` VALUES (1,'A1',0,1),(2,'A2',1,1),(3,'A3',1,1),(4,'A4',1,1),(5,'A5',1,1),(6,'A6',0,1),(7,'A7',0,1),(8,'A8',0,1),(9,'A9',0,1),(10,'A10',0,1),(11,'M1',1,2),(12,'M2',1,2),(13,'M3',1,2),(14,'M4',1,2),(15,'M5',0,2),(16,'M6',1,2),(17,'M7',1,2),(18,'M8',1,2),(19,'M9',1,2),(20,'M10',1,2),(21,'M11',1,2),(22,'M12',1,2),(23,'M13',1,2),(24,'M14',1,2),(25,'M15',1,2),(26,'M16',1,2),(27,'M17',1,2),(28,'M18',1,2),(29,'M19',1,2),(30,'M20',1,2),(31,'B1',1,3),(32,'B2',1,3),(33,'B3',0,3),(34,'B4',0,3),(35,'B5',0,3),(36,'B6',1,3),(37,'B7',0,3),(38,'B8',0,3),(39,'B9',0,3),(40,'B10',1,3);
/*!40000 ALTER TABLE `parqueadero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocion`
--

DROP TABLE IF EXISTS `promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `promocion` (
  `id_promocion` int(11) NOT NULL AUTO_INCREMENT,
  `minutos_uso` int(11) NOT NULL,
  `descuento` float NOT NULL,
  PRIMARY KEY (`id_promocion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocion`
--

LOCK TABLES `promocion` WRITE;
/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
INSERT INTO `promocion` VALUES (1,50,20);
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'administrador'),(2,'visitante');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion`
--

DROP TABLE IF EXISTS `transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaccion` (
  `id_trx` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `vehiculo` varchar(45) DEFAULT NULL,
  `placa_serial` varchar(45) DEFAULT NULL,
  `id_parqueadero` int(11) NOT NULL,
  `num_puesto` varchar(45) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `minutos` int(11) DEFAULT NULL,
  `total_fe` float DEFAULT NULL,
  `tarifa_dto` tinyint(4) DEFAULT NULL,
  `factura` varchar(100) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_trx`),
  KEY `id_usuario_idx` (`id_usuario`),
  KEY `id_parqueadero_idx` (`id_parqueadero`),
  CONSTRAINT `id_parqueadero` FOREIGN KEY (`id_parqueadero`) REFERENCES `parqueadero` (`id_parqueadero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_trx` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
INSERT INTO `transaccion` VALUES (7,1,'560866','Nehomar','Herrera','123456','Bicicleta','dasda',37,'B7','2020-10-13 11:30:51',NULL,NULL,NULL,NULL,NULL,1),(17,1,'560866','Nehomar','Herrera','123456','Automovil','dasda',6,'A6','2020-10-13 11:47:21',NULL,NULL,NULL,NULL,NULL,1),(25,1,'560866','Nehomarr','Herreraa','1234562','Bicicleta','dasda',34,'B4','2020-10-13 12:07:43',NULL,NULL,NULL,NULL,NULL,1),(32,1,'560866','Nehomare','Herrerae','123456e','Automovil','dasda',10,'A10','2020-10-13 12:47:34',NULL,NULL,NULL,NULL,NULL,1),(33,1,'560866','Nehomare','Herrerae','123456e','Automovil','dasda',1,'A1','2020-10-13 12:50:37',NULL,NULL,NULL,NULL,NULL,1),(34,1,'560866','Nehomar','Herrera','123456','Automovil','zsexdr',7,'A7','2020-10-14 00:55:00',NULL,NULL,NULL,NULL,NULL,1),(35,1,'560866','Nehomar','Herrera','123456','Automovil','ytre',8,'A8','2020-10-13 12:54:11',NULL,NULL,NULL,NULL,NULL,1),(36,1,'560866','Nehomar','Herrera','123456','Automovil','tre',3,'A3','2020-10-13 12:55:18','2020-10-13 13:34:00',38,2654.3,1,NULL,0),(37,1,'560866','Nehomar','Herrera','123456','Bicicleta','dsfdsfdfsd',35,'B5','2020-10-13 12:57:06',NULL,NULL,NULL,NULL,NULL,1),(38,1,'560866','Nehomar','Herrera','123456','Bicicleta','dsadasd',38,'B8','2020-10-13 12:57:42',NULL,NULL,NULL,NULL,NULL,1),(39,1,'560866','Nehomar','Herrera','123456','Automovil','dasda',9,'A9','2020-10-13 13:02:24',NULL,NULL,NULL,NULL,NULL,1),(40,1,'560866','Nehomar','Herrera','123456','Bicicleta','dasda',39,'B9','2020-10-13 13:08:10',NULL,NULL,NULL,NULL,NULL,1),(41,1,'560866','Nehomar','Herrera','123456','Bicicleta','qwet',31,'B1','2020-10-13 13:09:19','2020-10-13 17:49:00',279,2232,1,NULL,0),(42,1,'560866','Nehomar','Herrera','123456','Bicicleta','dasda',33,'B3','2020-10-13 19:06:58',NULL,NULL,NULL,NULL,NULL,1),(43,1,'560866','Nehomar','Herrera','123456','Automovil','454ddf',3,'A3','2020-10-14 11:10:55','2020-10-14 13:11:00',120,8382,1,NULL,0),(44,1,'560866','Nehomar','Herrera','123456','Automovil','THN-789',4,'A4','2020-10-14 11:20:23','2020-10-14 14:24:00',183,12782.5,1,NULL,0),(45,1,'560866','Nehomar','Herrera','123456','Moto','MPT-525',15,'M5','2020-10-14 11:39:45',NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_idx` (`id_rol`),
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'560866','Nehomar','Herrera','123456','2020-10-10 10:04:50',2,'2020-10-14 11:39:44'),(2,'16954777','Miguel','Rojas','456789','2020-10-13 10:14:30',2,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_vehiculo`
--

DROP TABLE IF EXISTS `usuario_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario_vehiculo` (
  `id_usuario_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `placa_serial` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario_vehiculo`),
  KEY `id_usuario_idx` (`id_usuario`),
  KEY `id_vehiculo_idx` (`id_vehiculo`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_vehiculo`
--

LOCK TABLES `usuario_vehiculo` WRITE;
/*!40000 ALTER TABLE `usuario_vehiculo` DISABLE KEYS */;
INSERT INTO `usuario_vehiculo` VALUES (1,1,3,'dsdd'),(2,1,3,'dasda'),(3,1,3,'dasda'),(4,1,3,'dsads'),(5,1,3,'dsads'),(6,1,3,'dasda'),(7,1,3,'dasda'),(8,1,3,'dsads'),(9,1,1,'dasda'),(10,1,1,'dasda'),(11,1,1,'dasda'),(12,1,2,'dsads'),(13,1,2,'dsads'),(14,1,3,'dsads'),(15,1,3,'dasda'),(16,1,2,'dasda'),(17,1,1,'dasda'),(18,1,1,'dasda'),(19,1,3,'dasda'),(20,1,3,'d'),(21,1,1,'dasda'),(22,1,1,'dsads'),(23,1,3,'dasda'),(24,1,3,'dasda'),(25,1,3,'dasda'),(26,1,3,'dasda'),(27,1,3,'dasda'),(28,1,1,'trew'),(29,1,1,'dasda'),(30,1,1,'dasda'),(31,1,1,'dasda'),(32,1,1,'qwet'),(33,1,1,'trew'),(34,1,1,'dasda'),(35,1,1,'dasda'),(36,1,1,'zsexdr'),(37,1,1,'ytre'),(38,1,1,'tre'),(39,1,3,'dsfdsfdfsd'),(40,1,3,'dsadasd'),(41,1,1,'dasda'),(42,1,1,'dasda'),(43,1,3,'dasda'),(44,1,3,'qwet'),(45,1,3,'dasda'),(46,1,1,'454ddf'),(47,1,1,'THN-789'),(48,1,2,'MPT-525');
/*!40000 ALTER TABLE `usuario_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `tarifa_minuto` float DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'Automovil',130),(2,'Moto',60),(3,'Bicicleta',10);
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'parking'
--

--
-- Dumping routines for database 'parking'
--
/*!50003 DROP FUNCTION IF EXISTS `AplicaDto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `AplicaDto`(a datetime,b datetime) RETURNS int(11)
    DETERMINISTIC
BEGIN
DECLARE tiempoMin, proMin, Dto INT;
SET tiempoMin=(SELECT TIMESTAMPDIFF(MINUTE,a,b));
SET proMin=(SELECT minutos_uso FROM promocion);
	IF (tiempoMin >= proMin) 
		THEN SET Dto=1;
	ELSE SET Dto=0;
    END IF;
RETURN Dto; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `TotalFE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `TotalFE`(a datetime,b datetime, t integer) RETURNS decimal(10,2)
    DETERMINISTIC
BEGIN
DECLARE total, tarfV, totalBtr FLOAT;
DECLARE tiempoMin, proMin, proDto INT;
SET tiempoMin=(SELECT TIMESTAMPDIFF(MINUTE,a,b));
SET proMin=(SELECT minutos_uso FROM promocion);
SET proDto=(SELECT descuento FROM promocion);
SET tarfV=(SELECT tarifa_minuto FROM vehiculo WHERE id_vehiculo = t);
SET totalBtr=(tiempoMin*tarfV);
	IF (tiempoMin >= proMin) 
		THEN SET total=(totalBtr-((proDto*totalBtr)/100));
	ELSE SET total=totalBtr;
    END IF;
RETURN total; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-14 11:57:11
