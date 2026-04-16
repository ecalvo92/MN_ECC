CREATE DATABASE  IF NOT EXISTS `mn_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `mn_db`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mn_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `tcarrito`
--

DROP TABLE IF EXISTS `tcarrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tcarrito` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `ConsecutivoUsuario` int(11) NOT NULL,
  `ConsecutivoProducto` int(11) NOT NULL,
  `FechaCarrito` datetime(6) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Consecutivo`),
  KEY `FK_CarritoUsuario` (`ConsecutivoUsuario`),
  KEY `FK_CarritoProducto` (`ConsecutivoProducto`),
  CONSTRAINT `FK_CarritoProducto` FOREIGN KEY (`ConsecutivoProducto`) REFERENCES `tproducto` (`Consecutivo`),
  CONSTRAINT `FK_CarritoUsuario` FOREIGN KEY (`ConsecutivoUsuario`) REFERENCES `tusuario` (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tcarrito`
--

LOCK TABLES `tcarrito` WRITE;
/*!40000 ALTER TABLE `tcarrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcarrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tdetalle`
--

DROP TABLE IF EXISTS `tdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tdetalle` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `ConsecutivoFactura` int(11) NOT NULL,
  `ConsecutivoProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `MontoUnitario` decimal(10,2) NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Consecutivo`),
  KEY `fk_Factura` (`ConsecutivoFactura`),
  KEY `fk_Producto` (`ConsecutivoProducto`),
  CONSTRAINT `fk_Factura` FOREIGN KEY (`ConsecutivoFactura`) REFERENCES `tfactura` (`Consecutivo`),
  CONSTRAINT `fk_Producto` FOREIGN KEY (`ConsecutivoProducto`) REFERENCES `tproducto` (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tdetalle`
--

LOCK TABLES `tdetalle` WRITE;
/*!40000 ALTER TABLE `tdetalle` DISABLE KEYS */;
INSERT INTO `tdetalle` VALUES (2,5,3,2,30859.00,61718.00),(3,5,4,3,45000.00,135000.00),(5,6,4,2,45000.00,90000.00),(6,7,4,1,45000.00,45000.00),(7,8,4,5,45000.00,225000.00),(8,9,3,3,30859.00,92577.00),(9,10,3,3,30859.00,92577.00),(10,11,3,1,30859.00,30859.00),(11,12,3,2,30859.00,61718.00),(12,13,3,3,30859.00,92577.00),(13,14,3,3,30859.00,92577.00),(14,15,3,2,30859.00,61718.00),(15,16,3,1,30859.00,30859.00);
/*!40000 ALTER TABLE `tdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tfactura`
--

DROP TABLE IF EXISTS `tfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tfactura` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `FechaVenta` datetime(6) NOT NULL,
  `ConsecutivoUsuario` int(11) NOT NULL,
  `TotalPagado` decimal(10,2) NOT NULL,
  `TotalProductos` int(11) NOT NULL,
  PRIMARY KEY (`Consecutivo`),
  KEY `FK_FacturaUsuario` (`ConsecutivoUsuario`),
  CONSTRAINT `FK_FacturaUsuario` FOREIGN KEY (`ConsecutivoUsuario`) REFERENCES `tusuario` (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tfactura`
--

LOCK TABLES `tfactura` WRITE;
/*!40000 ALTER TABLE `tfactura` DISABLE KEYS */;
INSERT INTO `tfactura` VALUES (5,'2026-04-15 18:45:37.000000',18,196718.00,5),(6,'2026-04-15 18:48:28.000000',18,90000.00,2),(7,'2026-04-15 18:59:05.000000',18,45000.00,1),(8,'2026-04-15 19:19:57.000000',18,225000.00,5),(9,'2026-04-15 19:21:50.000000',17,92577.00,3),(10,'2026-04-15 19:22:24.000000',15,92577.00,3),(11,'2026-04-15 20:34:21.000000',17,30859.00,1),(12,'2026-04-15 20:34:29.000000',17,61718.00,2),(13,'2026-04-15 20:34:36.000000',17,92577.00,3),(14,'2026-04-15 20:34:43.000000',17,92577.00,3),(15,'2026-04-15 20:34:51.000000',17,61718.00,2),(16,'2026-04-15 20:34:58.000000',17,30859.00,1);
/*!40000 ALTER TABLE `tfactura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tproducto`
--

DROP TABLE IF EXISTS `tproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tproducto` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Estado` bit(1) NOT NULL,
  PRIMARY KEY (`Consecutivo`),
  UNIQUE KEY `UK_Nombre` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tproducto`
--

LOCK TABLES `tproducto` WRITE;
/*!40000 ALTER TABLE `tproducto` DISABLE KEYS */;
INSERT INTO `tproducto` VALUES (3,'Premium Dog',30859.00,'Alimento seco para perros adultos activos. Contiene proteína de pollo, grasas balanceadas y probióticos que ayudan a la digestión y fortalecen el sistema inmunológico.',0,'/MN_ECC/Views/assets/imgProductos/Diamond_Premium-1024x1024-1.png',_binary ''),(4,'Premium Cat',45000.00,'asdasdas',0,'/MN_ECC/Views/assets/imgProductos/profile-image.png',_binary '');
/*!40000 ALTER TABLE `tproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trol`
--

DROP TABLE IF EXISTS `trol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trol` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreRol` varchar(200) NOT NULL,
  PRIMARY KEY (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trol`
--

LOCK TABLES `trol` WRITE;
/*!40000 ALTER TABLE `trol` DISABLE KEYS */;
INSERT INTO `trol` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `trol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tusuario`
--

DROP TABLE IF EXISTS `tusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tusuario` (
  `Consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `Identificacion` varchar(15) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Contrasenna` varchar(15) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Estado` bit(1) NOT NULL,
  `ConsecutivoRol` int(11) NOT NULL,
  PRIMARY KEY (`Consecutivo`),
  UNIQUE KEY `UK_Identificacion` (`Identificacion`),
  UNIQUE KEY `UK_CorreoElectronico` (`CorreoElectronico`),
  KEY `FK_Usuario_Rol` (`ConsecutivoRol`),
  CONSTRAINT `FK_Usuario_Rol` FOREIGN KEY (`ConsecutivoRol`) REFERENCES `trol` (`Consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tusuario`
--

LOCK TABLES `tusuario` WRITE;
/*!40000 ALTER TABLE `tusuario` DISABLE KEYS */;
INSERT INTO `tusuario` VALUES (15,'119310359','BONILLA MIRANDA MAUREEM VALERIA','12345678','mbonilla10359@ufide.ac.cr',_binary '',2),(16,'304590415','EDUARDO JOSE CALVO CASTILLO','90415','ecalvo90415@ufide.ac.cr',_binary '',1),(17,'504420898','MARIN CHAVARRIA JIMENA MARIA','12345678','jmarin20898@ufide.ac.cr',_binary '',2),(18,'305440788','FABIAN ALBERTO ARAYA BALLESTERO','12345678','faraya40788@ufide.ac.cr',_binary '',2);
/*!40000 ALTER TABLE `tusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mn_db'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_ActualizarContrasenna` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ActualizarContrasenna`(	
	pNuevaContrasenna varchar(15),
    pConsecutivo int
)
BEGIN

	UPDATE 	tusuario
    SET		Contrasenna = pNuevaContrasenna
	WHERE 	Consecutivo = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ActualizarEstadoProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ActualizarEstadoProducto`(	
	pConsecutivoProducto int
)
BEGIN

    UPDATE 	tproducto
    SET		Estado = CASE WHEN Estado = 1 THEN 0 ELSE 1 END
	WHERE 	Consecutivo = pConsecutivoProducto;
    
	/*
		DELETE FROM tproducto WHERE Consecutivo = pConsecutivoProducto;
	*/

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ActualizarPerfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ActualizarPerfil`(	
	pIdentificacion varchar(15),
    pNombre varchar(200),
    pCorreoElectronico varchar(100),
    pConsecutivo int
)
BEGIN

	UPDATE 	tusuario
    SET		Identificacion = pIdentificacion,
			Nombre = pNombre,
            CorreoElectronico = pCorreoElectronico
	WHERE 	Consecutivo = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ActualizarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ActualizarProducto`(	
	pConsecutivo int(11),
    pNombre varchar(100), 
    pDescripcion varchar(1000), 
    pPrecio decimal(10,2), 
    pCantidad int(11), 
    pImagenProducto varchar(100)
)
BEGIN

	UPDATE tproducto
	SET	Nombre = pNombre,
		Precio = pPrecio,
		Descripcion = pDescripcion,
		Cantidad = pCantidad,
		Imagen = CASE WHEN pImagenProducto != '' THEN pImagenProducto ELSE Imagen END
	WHERE Consecutivo = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_AgregarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarProducto`(	
	pNombre varchar(100), 
    pDescripcion varchar(1000), 
    pPrecio decimal(10,2), 
    pCantidad int(11), 
    pImagenProducto varchar(100)
)
BEGIN

	INSERT INTO tproducto (Nombre,Precio,Descripcion,Cantidad,Imagen,Estado)
	VALUES (pNombre,pPrecio,pDescripcion,pCantidad,pImagenProducto,1);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_AgregarProductoCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AgregarProductoCarrito`(	
	pConsecutivoProducto INT, 
    pConsecutivoUsuario INT, 
    pCantidad int(11)
)
BEGIN

	DECLARE vCantidadProducto INT;
    
    SELECT 	COUNT(*) INTO vCantidadProducto
    FROM 	tcarrito
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario
		AND ConsecutivoProducto = pConsecutivoProducto;
        
	IF vCantidadProducto > 0 THEN
	
		UPDATE 	tcarrito
        SET 	Cantidad = pCantidad,
				FechaCarrito = NOW()
		WHERE	ConsecutivoUsuario = pConsecutivoUsuario
			AND ConsecutivoProducto = pConsecutivoProducto;
    
    ELSE
    
		INSERT INTO tcarrito (ConsecutivoUsuario,ConsecutivoProducto,FechaCarrito,Cantidad)
		VALUES (pConsecutivoUsuario,pConsecutivoProducto,NOW(),pCantidad);
    
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarCarrito`(
   pConsecutivo INT
)
BEGIN

	SELECT 	C.Consecutivo,
			ConsecutivoUsuario,
            ConsecutivoProducto,
            FechaCarrito,
            C.Cantidad,
            (C.Cantidad * Precio) 'Total',
            Nombre,
            Precio,
            Imagen
	FROM 	tcarrito C
    INNER JOIN tProducto P ON P.Consecutivo = C.ConsecutivoProducto
    WHERE	ConsecutivoUsuario = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarDatos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarDatos`(

)
BEGIN

(SELECT  SUM(D.Cantidad) AS VALOR, 
             P.Nombre AS TEXTO,
             'Producto Más Vendido' AS TITULO
     FROM TDETALLE D
     INNER JOIN TPRODUCTO P 
        ON D.ConsecutivoProducto = P.Consecutivo
     GROUP BY P.Nombre
     ORDER BY SUM(D.Cantidad) DESC
     LIMIT 1)

    UNION

    (SELECT  COUNT(F.Consecutivo) AS VALOR, 
             U.Nombre AS TEXTO,
             'Cliente Frecuente' AS TITULO
     FROM TFACTURA F
     INNER JOIN tusuario U 
        ON F.ConsecutivoUsuario = U.Consecutivo
     GROUP BY U.Nombre
     ORDER BY COUNT(F.Consecutivo) DESC
     LIMIT 1)

    UNION

    (SELECT  SUM(F.TotalPagado) AS VALOR,  
             '' AS TEXTO,
             'Total Recaudado' AS TITULO
     FROM TFACTURA F);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarDetallesFactura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarDetallesFactura`(
   pNumeroFactura INT
)
BEGIN

	SELECT 	ConsecutivoProducto,
			P.Nombre,
			D.Cantidad,
			MontoUnitario,
			Monto
	FROM 	tdetalle D
    INNER JOIN tproducto P ON D.ConsecutivoProducto = P.Consecutivo
    WHERE	ConsecutivoFactura = pNumeroFactura;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarFacturas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarFacturas`(
   pConsecutivo INT
)
BEGIN

	SELECT	Consecutivo,
			FechaVenta,
			TotalPagado,
			TotalProductos
	FROM	tfactura
    WHERE	ConsecutivoUsuario = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarProducto`(
   pConsecutivo INT
)
BEGIN

	SELECT 	Consecutivo,
			Nombre,
			Precio,
			Descripcion,
			Cantidad,
			Imagen,
			Estado,
            CASE WHEN Estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'EstadoDescripcion'
	FROM 	tproducto
    WHERE	Consecutivo = pConsecutivo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarProductos`(
   
)
BEGIN

	SELECT 	Consecutivo,
			Nombre,
			Precio,
			Descripcion,
			Cantidad,
			Imagen,
			Estado,
            CASE WHEN Estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'EstadoDescripcion'
	FROM 	tproducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarProductosActivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarProductosActivos`(
   
)
BEGIN

	SELECT 	Consecutivo,
			Nombre,
			Precio,
			Descripcion,
			Cantidad,
			Imagen,
			Estado,
            CASE WHEN Estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'EstadoDescripcion'
	FROM 	tproducto
    WHERE 	Estado = 1
		AND	Cantidad > 0;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarResumenCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarResumenCarrito`(
   pConsecutivo INT
)
BEGIN

	SELECT  ConsecutivoUsuario,
			IFNULL(SUM(C.Cantidad),0) 'TotalCantidad',
            IFNULL(SUM(C.Cantidad * Precio),0) 'TotalPago'
	FROM 	tcarrito C
    INNER JOIN tProducto P ON P.Consecutivo = C.ConsecutivoProducto
    WHERE	ConsecutivoUsuario = pConsecutivo
	GROUP BY ConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ConsultarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarUsuario`(
    pConsecutivo INT
)
BEGIN

	SELECT  Consecutivo,
			Identificacion,
			Nombre,
			CorreoElectronico,
			Estado
	FROM	tusuario
    WHERE 	Consecutivo = pConsecutivo
        AND Estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_IniciarSesion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_IniciarSesion`(
    pCorreoElectroncio varchar(100),
    pContrasenna varchar(15)
)
BEGIN

	SELECT  U.Consecutivo,
			Identificacion,
			Nombre,
			CorreoElectronico,
			Estado,
            ConsecutivoRol,
            NombreRol
	FROM	tUsuario U
    INNER JOIN tRol R ON U.ConsecutivoRol = R.Consecutivo
    WHERE 	CorreoElectronico = pCorreoElectroncio
		AND	Contrasenna = pContrasenna
        AND Estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_PagarCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_PagarCarrito`(	
	pConsecutivoUsuario INT
)
BEGIN

	/*1*/
    INSERT 	INTO tfactura(FechaVenta,ConsecutivoUsuario,TotalPagado,TotalProductos)
	SELECT 	NOW(), ConsecutivoUsuario, SUM(C.Cantidad * Precio), SUM(C.Cantidad)
    FROM	tCarrito C
    INNER 	JOIN 	tProducto P ON P.Consecutivo = C.ConsecutivoProducto
	WHERE	ConsecutivoUsuario = pConsecutivoUsuario
    GROUP BY NOW(), ConsecutivoUsuario;
    
    
    /*2*/
    INSERT INTO tdetalle(ConsecutivoFactura,ConsecutivoProducto,Cantidad,MontoUnitario,Monto)
	SELECT 	LAST_INSERT_ID(), C.ConsecutivoProducto, C.Cantidad, P.Precio,(C.Cantidad * Precio)
    FROM	tCarrito C
    INNER 	JOIN 	tProducto P ON P.Consecutivo = C.ConsecutivoProducto
	WHERE	ConsecutivoUsuario = pConsecutivoUsuario;

    
    /*3*/
    UPDATE 	tproducto P
    INNER 	JOIN tCarrito C ON P.Consecutivo = C.ConsecutivoProducto
    SET		P.Cantidad = P.Cantidad - C.Cantidad
    WHERE 	C.ConsecutivoUsuario = pConsecutivoUsuario;
    
    /*4*/
    DELETE 	FROM tCarrito 
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Registrar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Registrar`(	
	pIdentificacion varchar(15), 
	pNombre varchar(200), 
    pContrasenna varchar(15),
    pCorreoElectroncio varchar(100)
)
BEGIN

	INSERT INTO tusuario(Identificacion,Nombre,Contrasenna,CorreoElectronico,Estado,ConsecutivoRol)
	VALUES (pIdentificacion, pNombre, pContrasenna,pCorreoElectroncio,1,2);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_RemoverProductoCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RemoverProductoCarrito`(	
	pConsecutivoCarrito INT
)
BEGIN

	DELETE FROM TCARRITO WHERE Consecutivo = pConsecutivoCarrito;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ValidarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ValidarCorreo`(
    pCorreoElectroncio varchar(100)
)
BEGIN

	SELECT  Consecutivo,
			Identificacion,
			Nombre,
			CorreoElectronico,
			Estado
	FROM	tusuario
    WHERE 	CorreoElectronico = pCorreoElectroncio
        AND Estado = 1;

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

-- Dump completed on 2026-04-15 20:37:46
