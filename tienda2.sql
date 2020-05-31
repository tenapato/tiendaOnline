-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tiendaonline
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `Id_Carrito` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Carrito`,`id_usuario`),
  KEY `llave_us_idx` (`id_usuario`),
  CONSTRAINT `llave_us` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (1,'nepo123'),(2,'patot');
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_has_prodcuto`
--

DROP TABLE IF EXISTS `carrito_has_prodcuto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito_has_prodcuto` (
  `Id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `id_car` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Id_prod`),
  KEY `llave_id_carrito_idx` (`id_car`),
  KEY `llave_prodcuto_idx` (`Id_prod`),
  CONSTRAINT `llave_id_carrito` FOREIGN KEY (`id_car`) REFERENCES `carrito` (`Id_Carrito`),
  CONSTRAINT `llave_prodcuto` FOREIGN KEY (`Id_prod`) REFERENCES `productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_has_prodcuto`
--

LOCK TABLES `carrito_has_prodcuto` WRITE;
/*!40000 ALTER TABLE `carrito_has_prodcuto` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito_has_prodcuto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_has_venta`
--

DROP TABLE IF EXISTS `carrito_has_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito_has_venta` (
  `num_ticket` int(11) NOT NULL,
  `id_carrito` int(11) NOT NULL,
  `precio_total` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`num_ticket`,`id_carrito`),
  KEY `llave_Carrito2_idx` (`id_carrito`),
  CONSTRAINT `llave_Carrito2` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`Id_Carrito`),
  CONSTRAINT `llave_ticket` FOREIGN KEY (`num_ticket`) REFERENCES `ticket` (`id_ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_has_venta`
--

LOCK TABLES `carrito_has_venta` WRITE;
/*!40000 ALTER TABLE `carrito_has_venta` DISABLE KEYS */;
INSERT INTO `carrito_has_venta` VALUES (0,0,''),(57,1,'549.95'),(57,2,'972.99'),(126,2,'5839.20'),(127,2,'4985.60'),(128,1,'1029.90'),(129,1,'300.00'),(130,1,'372.99');
/*!40000 ALTER TABLE `carrito_has_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informacion_pago`
--

DROP TABLE IF EXISTS `informacion_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informacion_pago` (
  `Num_tarjeta` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `CCV` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_expiracion` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Num_tarjeta`,`id_usuario`),
  KEY `key_us_idx` (`id_usuario`),
  CONSTRAINT `key_us` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacion_pago`
--

LOCK TABLES `informacion_pago` WRITE;
/*!40000 ALTER TABLE `informacion_pago` DISABLE KEYS */;
INSERT INTO `informacion_pago` VALUES ('','nepo123','',''),('','patot','',''),('0000000000000000','patot','000','00/00'),('1434132431442312','patot','543','30/02'),('4165465435431434','patot','113','23/01'),('5467389209387645','nepo123','565','03/20'),('5676543234567898','patot','454','4324'),('56789098767890','patot','543','21/07'),('6473890298765435','nepo123','123','12/02'),('7489304987483909','patot','489','21/01');
/*!40000 ALTER TABLE `informacion_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_producto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Precio` decimal(7,2) NOT NULL,
  `Compatibilidad` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Categoria` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Stock` int(11) NOT NULL,
  `imagen` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Gigabyte B450M DS3H',72.99,'A','Motherboards',100,'Motherboard/4.png'),(2,'MSI B450 Tomahawk',300.00,'B','Motherboards',100,'Motherboard/6.png'),(3,'AS Rock B450M Steel Legend',138.56,'C','Motherboards',100,'Motherboard/1.png'),(4,'ASUS ROG crosshair VIII',550.65,'D','Motherboards',100,'Motherboard/2.png'),(5,'ASUS Prime B450M',82.99,'E','Motherboards',100,'Motherboard/3.png'),(6,'Gigabyte b450 aorus m micro ATX Am4',89.99,'F','Motherboards',100,'Motherboard/5.png'),(7,'AMD Athlon 200ge',74.68,'A','CPU',100,'CPU/1.png'),(8,'AMD Ryzen 5 3400G',149.99,'B','CPU',100,'CPU/2.png'),(9,'Ryzen 7 2700xamd',400.70,'C','CPU',100,'CPU/4.png'),(10,'AMD ryzen 9 3950X',709.99,'D','CPU',100,'CPU/5.png'),(11,'Intel xeon e5-2699 v4 2.2 Ghz',999.99,'F','CPU',100,'CPU/6.png'),(12,'AMD Ryzen 7 1800x',463.99,'E','CPU',100,'CPU/3.png'),(13,'Corsair H115i RGB PLATINUM 97 CFM Liquid CPU ',169.99,'A','Cooling',100,'Cooling/3.png'),(14,'Cooler Master Hyper 212 RGB Black Edition',44.99,'B','Cooling',100,'Cooling/1.png'),(15,'Cooler Master MasterLiquid ML360R ',147.99,'C','Cooling',100,'Cooling/2.png'),(16,'Cooler Master Hyper 212 EVO 82.9 CFM Sleeve B',34.99,'D','Cooling',100,'Cooling/4.png'),(17,'Cooler Master Hyper 212 RGB Phantom ',53.57,'E','Cooling',100,'Cooling/1.png'),(18,'Cooler Master Hyper D92 54.8 CFM Rifle Bearin',59.99,'F','Cooling',100,'Cooling/6.png'),(19,'MSI GeForce RTX 2080 Ti 11 GB GAMING X TRIO V',1189.00,'A','Video_Card',100,'Video_cards/2.png'),(20,'Samsung 860 Evo 1 TB',149.99,'A','Storage',100,'Storage/Storage1.jpg'),(21,'Samsung 860 Evo 500 GB ',89.99,'B','Storage',100,'Storage/1.png'),(22,'SanDisk SSD PLUS 120 GB',49.99,'C','Storage',100,'Storage/2.png'),(23,'Toshiba 14 TB 3.5\" 7200RPM',319.99,'D','Storage',100,'Storage/3.png'),(24,'Seagate Desktop HDD 4 TB',91.00,'E','Storage',100,'Storage/1.png'),(25,'HP 2 TB 2.5\" Solid State Drive',2664.99,'F','Storage',100,'Storage/5.png'),(26,'Corsair_Vengeance_RGB_Pro',689.99,'A','Memory',100,'Ram/2.png'),(27,'Corsair Vengeance LPX',74.98,'B','Memory',100,'Ram/3.png'),(28,'Patriot Signature DDR3-1600 Memory',30.49,'C','Memory',100,'Ram/4.png'),(29,'Kingston HyperX Blu',30.49,'D','Memory',100,'Ram/5.png'),(30,'G.Skill Ripjaws V Series',262.99,'E','Memory',100,'Ram/6.png'),(31,'Corsair Dominator Platinum DDR4-2666 Memory',664.00,'F','Memory',100,'Ram/1.png'),(32,'EVGA GeForce RTX 2070        973.02',973.02,'B','Video_Card',100,'Video_cards/6.png'),(33,'MSI GeForce RTX 2080 Ti',1402.13,'C','Video_Card',100,'Video_cards/1.png'),(34,'Gigabyte GeForce RTX 2070 SUPER 8 GB WINDFORC',506.98,'D','Video_Card',100,'Video_cards/3.png'),(35,'Gigabyte GeForce RTX 2070 SUPER 8 GB Gaming  ',539.99,'E','Video_Card',100,'Video_cards/VideoCard5.jpg'),(36,'PNY Quadro GV100 32 GB Video Card ',10560.00,'F','Video_Card',100,'Video_cards/4.png'),(37,'Phanteks Enthoo Elite',919.98,'A','Case',100,'Cases/1.png'),(38,'Corsair iCUE 465X RGB ATX Mid Tower Case',149.99,'B','Case',100,'Cases/5.png'),(39,'Lian Li PC-O8X ATX Mid Tower Case',867.94,'C','Case',100,'Cases/6.png'),(40,'Corsair SPEC-DELTA RGB ATX',79.99,'D','Case',100,'Cases/2.png'),(41,'Cooler Master MasterCase H500',104.95,'E','Case',100,'Cases/3.png'),(42,'Dark Base Pro 900 Rev',269.00,'F','Case',100,'Cases/4.png'),(53,'Buslink CipherShield 6 TB External Hard Drive',1071.78,'A','External_Memory',100,'Externaldrives/2.png'),(58,'Western Digital My Book 10 TB',199.99,'B','External_Memory',100,'Externaldrives/6.png'),(59,'Samsung T5 500 GB External SSD',89.99,'C','External_Memory',100,'Externaldrives/5.png'),(62,'Western Digital My Book Duo 28 TB External Ha',999.99,'D','External_Memory',100,'Externaldrives/3.png'),(64,'Seagate Expansion 4 TB External Hard Drive',94.99,'E','External_Memory',100,'Externaldrives/1.png'),(65,'Buffalo Technology DriveStation Duo 2 TB Exte',349.00,'F','External_Memory',100,'Externaldrives/4.png'),(66,'Cooler Master Silent Pro Hybrid 1300',669.20,'A','Power_Supply',100,'Powersupply/3.png'),(67,'SeaSonic S12III 650',78.98,'B','Power_Supply',100,'Powersupply/6.png'),(68,'EVGA SuperNOVA G3 750',139.99,'C','Power_Supply',100,'Powersupply/1.png'),(69,'Cooler Master MWE',159.21,'D','Power_Supply',100,'Powersupply/1.png'),(70,'EVGA 500 W 80+ Certified ATX',152.85,'E','Power_Supply',100,'Powersupply/4.png'),(71,'Topower 1000 W 80+ Gold',1291.36,'F','Power_Supply',100,'Powersupply/5.png'),(72,'Asus DRW-24B1ST/BLK/B/AS DVD/CD Writer',19.98,'A','Optical_Drive',100,'Optical/4.png'),(73,'Samsung SH-222AB',156.98,'B','Optical_Drive',100,'Optical/5.png'),(74,'Asus DRW-28B1SK/BLK/B/AS DVD/CD Writer',29.98,'C','Optical_Drive',100,'Optical/1.png'),(75,'Asus DRW-20B1ST/BLK/B/AS DVD/CD Writer ',25.00,'D','Optical_Drive',100,'Optical/4.png'),(76,'Pioneer BDR-209DBK Blu-Ray/DVD/CD Writer ',70.95,'E','Optical_Drive',100,'Optical/2.png'),(77,'LG BH14NS40 Blu-Ray/DVD/CD Writer',291.50,'F','Optical_Drive',100,'Optical/3.png');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `precio_total` decimal(7,2) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `llave_usuario_idx` (`id_usuario`),
  CONSTRAINT `llave_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (57,'patot',29.98,'2020-05-27'),(58,'patot',300.00,'2020-05-27'),(59,'patot',300.00,'2020-05-27'),(60,'patot',300.00,'2020-05-27'),(61,'patot',300.00,'2020-05-27'),(62,'patot',999.99,'2020-05-27'),(63,'patot',999.99,'2020-05-27'),(64,'patot',999.99,'2020-05-27'),(65,'nepo123',549.95,'2020-05-27'),(66,'nepo123',167.97,'2020-05-27'),(67,'nepo123',989.99,'2020-05-27'),(68,'nepo123',999.99,'2020-05-27'),(69,'nepo123',999.99,'2020-05-27'),(70,'nepo123',999.99,'2020-05-27'),(71,'nepo123',372.99,'2020-05-27'),(72,'nepo123',221.55,'2020-05-27'),(73,'nepo123',372.99,'2020-05-27'),(74,'patot',972.99,'2020-05-28'),(75,'patot',147.97,'2020-05-28'),(76,'patot',147.97,'2020-05-28'),(77,'patot',999.99,'2020-05-28'),(78,'patot',211.55,'2020-05-28'),(79,'patot',372.99,'2020-05-28'),(80,'patot',372.99,'2020-05-28'),(81,'patot',372.99,'2020-05-28'),(82,'patot',372.99,'2020-05-28'),(83,'patot',372.99,'2020-05-28'),(84,'patot',211.55,'2020-05-28'),(85,'patot',438.56,'2020-05-28'),(86,'patot',372.99,'2020-05-28'),(87,'patot',211.55,'2020-05-28'),(88,'patot',372.99,'2020-05-28'),(89,'patot',372.99,'2020-05-28'),(90,'patot',372.99,'2020-05-28'),(91,'patot',211.55,'2020-05-28'),(92,'patot',211.55,'2020-05-28'),(93,'patot',372.99,'2020-05-28'),(94,'patot',372.99,'2020-05-28'),(95,'patot',372.99,'2020-05-28'),(96,'patot',72.99,'2020-05-28'),(97,'patot',372.99,'2020-05-28'),(98,'patot',372.99,'2020-05-28'),(99,'patot',211.55,'2020-05-28'),(100,'patot',999.99,'2020-05-28'),(101,'patot',211.55,'2020-05-28'),(102,'patot',372.99,'2020-05-28'),(103,'patot',211.55,'2020-05-28'),(104,'patot',372.99,'2020-05-28'),(105,'patot',511.55,'2020-05-28'),(106,'patot',511.55,'2020-05-28'),(107,'patot',511.55,'2020-05-28'),(108,'patot',372.99,'2020-05-28'),(109,'patot',511.55,'2020-05-28'),(110,'patot',372.99,'2020-05-28'),(111,'patot',999.99,'2020-05-28'),(112,'patot',999.99,'2020-05-28'),(113,'patot',999.99,'2020-05-28'),(114,'patot',372.99,'2020-05-28'),(115,'patot',999.99,'2020-05-28'),(116,'patot',999.99,'2020-05-28'),(117,'patot',999.99,'2020-05-28'),(118,'patot',999.99,'2020-05-28'),(119,'patot',999.99,'2020-05-28'),(120,'patot',999.99,'2020-05-28'),(121,'patot',999.99,'2020-05-28'),(122,'patot',999.99,'2020-05-28'),(123,'patot',999.99,'2020-05-28'),(124,'patot',999.99,'2020-05-28'),(125,'patot',5839.20,'2020-05-28'),(126,'patot',5839.20,'2020-05-28'),(127,'patot',4985.60,'2020-05-28'),(128,'nepo123',1029.90,'2020-05-29'),(129,'nepo123',300.00,'2020-05-29'),(130,'nepo123',372.99,'2020-05-29');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('nepo123','1234','Nepobuceno','Romanov'),('patot','pato123','Pato','Tena');
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

-- Dump completed on 2020-05-31 14:32:02
