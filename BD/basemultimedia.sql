-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: basemultimedia
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `activo`
--

DROP TABLE IF EXISTS `activo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activo` (
  `PK_IdActivo` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Activo',
  `ActBoolean` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Boleeano que define si esta Activo o Inactivo',
  PRIMARY KEY (`PK_IdActivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activo`
--

LOCK TABLES `activo` WRITE;
/*!40000 ALTER TABLE `activo` DISABLE KEYS */;
INSERT INTO `activo` VALUES (1,0),(2,1);
/*!40000 ALTER TABLE `activo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `PK_IdCarrito` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Carrito',
  `CarrFK_IdUsuario` int NOT NULL COMMENT 'Identificador Foráneo que indica el Cliente dueño del Carrito',
  `CarrFK_IdProducto` int NOT NULL COMMENT 'Identificador Foráneo que indica el Producto agregado al Carrito',
  `CarrCantidad` int NOT NULL COMMENT 'Cantidad del Producto agregada al Carrito',
  `CarrPrecio` decimal(6,2) NOT NULL COMMENT 'Precio total despues de multiplicar Precio Individual por la Cantidad agregada',
  `CarrCaducidad` date DEFAULT NULL COMMENT 'Fecha que indica hasta cuando es valida la Cotizacion (En caso de ser una)',
  `CarrFK_IdActivo` int NOT NULL COMMENT 'Identificador Foráneo que indica si el Carrito esta Activo o Inactivo',
  PRIMARY KEY (`PK_IdCarrito`),
  KEY `CarrFK_IdUsuario` (`CarrFK_IdUsuario`),
  KEY `CarrFK_IdProducto` (`CarrFK_IdProducto`),
  KEY `CarrFK_IdActivo` (`CarrFK_IdActivo`),
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`CarrFK_IdUsuario`) REFERENCES `usuarios` (`PK_IdUsuario`),
  CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`CarrFK_IdProducto`) REFERENCES `productos` (`PK_IdProducto`),
  CONSTRAINT `carrito_ibfk_3` FOREIGN KEY (`CarrFK_IdActivo`) REFERENCES `activo` (`PK_IdActivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `PK_IdCategoria` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Categoria',
  `CatNombre` varchar(30) NOT NULL COMMENT 'Nombre de la Categoria',
  `CatDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion de la Categoria',
  `CatFK_IdUsuario` int NOT NULL COMMENT 'Identificador Foráneo del Usuario Creador',
  `CatFK_IdActivo` int NOT NULL COMMENT 'Identificador Foráneo que indica si la Categoria esta Activa o Inactiva',
  PRIMARY KEY (`PK_IdCategoria`),
  KEY `CatFK_IdUsuario` (`CatFK_IdUsuario`),
  KEY `CatFK_IdActivo` (`CatFK_IdActivo`),
  CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`CatFK_IdUsuario`) REFERENCES `usuarios` (`PK_IdUsuario`),
  CONSTRAINT `categoria_ibfk_2` FOREIGN KEY (`CatFK_IdActivo`) REFERENCES `activo` (`PK_IdActivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista`
--

DROP TABLE IF EXISTS `lista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lista` (
  `PK_IdLista` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Lista de Productos',
  `LisNombre` varchar(30) NOT NULL COMMENT 'Nombre de la Lista de Productos',
  `LisDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion de la Lista de Productos',
  `LisFK_IdTipoL` int NOT NULL COMMENT 'Identificador Foránero que indica que Tipo de Lista es (Publica o Privada)',
  `LisFK_IdProducto` int NOT NULL COMMENT 'Identificador Foráneo que indica el Producto en la lista',
  `LisFK_IdActivo` int NOT NULL COMMENT 'Identificador Foráneo que indica si la Lista esta Actica o Inactiva',
  PRIMARY KEY (`PK_IdLista`),
  KEY `LisFK_IdTipoL` (`LisFK_IdTipoL`),
  KEY `LisFK_IdProducto` (`LisFK_IdProducto`),
  KEY `LisFK_IdActivo` (`LisFK_IdActivo`),
  CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`LisFK_IdTipoL`) REFERENCES `tipolista` (`PK_IdTipoL`),
  CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`LisFK_IdProducto`) REFERENCES `productos` (`PK_IdProducto`),
  CONSTRAINT `lista_ibfk_3` FOREIGN KEY (`LisFK_IdActivo`) REFERENCES `activo` (`PK_IdActivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista`
--

LOCK TABLES `lista` WRITE;
/*!40000 ALTER TABLE `lista` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensajes` (
  `PK_IdMensajes` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de los Mensajes',
  `MenFK_IdUsuRemitente` int NOT NULL COMMENT 'Identificador Foráneo que indica el Usuario Remitente del Mensaje',
  `MenFK_IdUsuDestino` int NOT NULL COMMENT 'Identificador Foráneo que indica el Destinatario del Mensaje',
  `MenMensaje` varchar(200) NOT NULL COMMENT 'Contenido del Mensaje',
  `MenFK_IdActivo` int NOT NULL COMMENT 'Identificador Foráneo que indica si el Mensaje esta Activo o Inactivo',
  PRIMARY KEY (`PK_IdMensajes`),
  KEY `MenFK_IdUsuRemitente` (`MenFK_IdUsuRemitente`),
  KEY `MenFK_IdUsuDestino` (`MenFK_IdUsuDestino`),
  KEY `MenFK_IdActivo` (`MenFK_IdActivo`),
  CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`MenFK_IdUsuRemitente`) REFERENCES `usuarios` (`PK_IdUsuario`),
  CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`MenFK_IdUsuDestino`) REFERENCES `usuarios` (`PK_IdUsuario`),
  CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`MenFK_IdActivo`) REFERENCES `activo` (`PK_IdActivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodopago`
--

DROP TABLE IF EXISTS `metodopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metodopago` (
  `PK_IdMetodoPago` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Metodo de Pago',
  `PagoDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion del Metodo de Paga',
  PRIMARY KEY (`PK_IdMetodoPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodopago`
--

LOCK TABLES `metodopago` WRITE;
/*!40000 ALTER TABLE `metodopago` DISABLE KEYS */;
/*!40000 ALTER TABLE `metodopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `PK_IdProducto` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Producto',
  `ProFK_IdUsuario` int NOT NULL COMMENT 'Identificador del Dueño del Producto',
  `ProNombre` varchar(30) NOT NULL COMMENT 'Nombre del Producto',
  `ProDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion del Producto',
  `ProIma1` blob NOT NULL COMMENT 'Primera imagen del Producto',
  `ProIma2` blob NOT NULL COMMENT 'Segunda imagen del Producto',
  `ProIma3` blob NOT NULL COMMENT 'Tercera imagen del Producto',
  `ProVideo` blob NOT NULL COMMENT 'Video descriptivo del Producto',
  `ProFK_IdCategoria` int NOT NULL COMMENT 'Identificador Foránero que indica la Categoria a la que pertenece el Producto',
  `ProFK_IdTipoP` int NOT NULL COMMENT 'Identificador Foráneo que indica el Tipo de Producto que es (Cotizar o Vender)',
  `ProPrecio` decimal(6,2) DEFAULT NULL COMMENT 'Precio de venta del Producto',
  `ProExistencias` int NOT NULL COMMENT 'Cantidad restante en inventario del Producto',
  `ProValoracion` float DEFAULT NULL COMMENT 'Calificacion de los Clientes sobre el Producto',
  `ProFK_IdActivo` int NOT NULL COMMENT 'Identificador Foráneo que indica si el Producto esta Activo o Inactivo',
  PRIMARY KEY (`PK_IdProducto`),
  KEY `ProFK_IdUsuario` (`ProFK_IdUsuario`),
  KEY `ProFK_IdCategoria` (`ProFK_IdCategoria`),
  KEY `ProFK_IdTipoP` (`ProFK_IdTipoP`),
  KEY `ProFK_IdActivo` (`ProFK_IdActivo`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`ProFK_IdUsuario`) REFERENCES `usuarios` (`PK_IdUsuario`),
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`ProFK_IdCategoria`) REFERENCES `categoria` (`PK_IdCategoria`),
  CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`ProFK_IdTipoP`) REFERENCES `tipoproducto` (`PK_IdTipoP`),
  CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`ProFK_IdActivo`) REFERENCES `activo` (`PK_IdActivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolusuario`
--

DROP TABLE IF EXISTS `rolusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rolusuario` (
  `PK_IdRol` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Rol',
  `RolDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion del Rol',
  PRIMARY KEY (`PK_IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolusuario`
--

LOCK TABLES `rolusuario` WRITE;
/*!40000 ALTER TABLE `rolusuario` DISABLE KEYS */;
INSERT INTO `rolusuario` VALUES (1,'Cliente'),(2,'Vendedor');
/*!40000 ALTER TABLE `rolusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sexo` (
  `PK_IdSexo` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Sexo',
  `SexoDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion del Sexo',
  PRIMARY KEY (`PK_IdSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES (1,'Masculino'),(2,'Femenino'),(3,'Otro');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipolista`
--

DROP TABLE IF EXISTS `tipolista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipolista` (
  `PK_IdTipoL` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de Lista',
  `TipoLDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion de la lista',
  PRIMARY KEY (`PK_IdTipoL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipolista`
--

LOCK TABLES `tipolista` WRITE;
/*!40000 ALTER TABLE `tipolista` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipolista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoproducto` (
  `PK_IdTipoP` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de Producto',
  `TipoPDescripcion` varchar(50) NOT NULL COMMENT 'Descripcion del Tipo de Producto',
  PRIMARY KEY (`PK_IdTipoP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `PK_IdUsuario` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Usuario',
  `UsuCorreo` varchar(30) NOT NULL COMMENT 'Correo Electrónico del Usuario',
  `UsuApodo` varchar(30) NOT NULL COMMENT 'Apodo con el que Iniciar Sesión',
  `UsuContra` varchar(30) NOT NULL COMMENT 'Contraseña del Usuario',
  `UsuFK_IdRol` int NOT NULL COMMENT 'Rol al que pertenece el Usuario',
  `UsuAvatar` blob NOT NULL COMMENT 'Imagen de Avatar del Usuario',
  `UsuNombres` varchar(30) NOT NULL COMMENT 'Nombre(s) reales del Usuario',
  `UsuApellidos` varchar(30) NOT NULL COMMENT 'Apellido(s) reales del Usuario',
  `UsuFK_IdSexo` int NOT NULL COMMENT 'Identificador Foráneo del Sexo del Usuario',
  `UsuFechaNac` date NOT NULL COMMENT 'Fecha de Nacimiento del Usuario',
  `UsuFechaIng` date NOT NULL COMMENT 'Fecha de Registro del Usuario',
  `UsuFK_IdActivo` int NOT NULL COMMENT 'Identificador Foráneo que indica si el Usuario esta Activo o Inactivo',
  PRIMARY KEY (`PK_IdUsuario`),
  KEY `UsuFK_IdRol` (`UsuFK_IdRol`),
  KEY `UsuFK_IdSexo` (`UsuFK_IdSexo`),
  KEY `UsuFK_IdActivo` (`UsuFK_IdActivo`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`UsuFK_IdRol`) REFERENCES `rolusuario` (`PK_IdRol`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`UsuFK_IdSexo`) REFERENCES `sexo` (`PK_IdSexo`),
  CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`UsuFK_IdActivo`) REFERENCES `activo` (`PK_IdActivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'correo@prueba.com','Prueba','Contra',1,_binary 'imagenjaj','Usuario Cliente','De La Prueba',1,'2001-09-11','2023-10-10',2),(3,'sam@hotmail.com','SamCastro69','Contra7*',2,_binary 'ImagenXD','Samuel','Castro Juarez',1,'2001-12-21','2023-10-17',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valoraciones`
--

DROP TABLE IF EXISTS `valoraciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valoraciones` (
  `PK_IdValoracion` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de las Valoraciones',
  `ValFK_IdProducto` int NOT NULL COMMENT 'Identificador Foráneo que indica el Producto al que pertenece la Valoracion',
  `ValFK_IdCliente` int NOT NULL COMMENT 'Identificador Foráneo que indica el Cliente que hizo la Valoracion',
  `ValPuntuacion` float NOT NULL COMMENT 'Calificacion dada al Producto por el Usuario',
  `ValComentario` varchar(100) NOT NULL COMMENT 'Comentario del Cliente sobre la Calidad del Producto',
  PRIMARY KEY (`PK_IdValoracion`),
  KEY `ValFK_IdProducto` (`ValFK_IdProducto`),
  KEY `ValFK_IdCliente` (`ValFK_IdCliente`),
  CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`ValFK_IdProducto`) REFERENCES `productos` (`PK_IdProducto`),
  CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`ValFK_IdCliente`) REFERENCES `usuarios` (`PK_IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valoraciones`
--

LOCK TABLES `valoraciones` WRITE;
/*!40000 ALTER TABLE `valoraciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `valoraciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `PK_IdVenta` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Venta',
  `VenFK_IdProducto` int NOT NULL COMMENT 'Identificador Foráneo que indica el Producto Vendido',
  `VenFK_IdTipoP` int NOT NULL COMMENT 'Identificador Foráneo que indica el Tipo de Producto Vendido',
  `VenNombreProducto` varchar(30) NOT NULL COMMENT 'Nombre del Producto Vendido',
  `VenFK_IdCategoria` int NOT NULL COMMENT 'Identificador Foráneo que indica la Categoria del Producto Vendido',
  `VenPrecioProducto` decimal(6,2) NOT NULL COMMENT 'Precio del Producto Vendido',
  `VenCantidad` int NOT NULL COMMENT 'Cantidad del Producto Vendido',
  `VenFecha` date NOT NULL COMMENT 'Fecha cuando se realizo la Venta',
  `VenFK_IdUsuVendedor` int NOT NULL COMMENT 'Identificador Foráneo que indica el Usuario Vendedor',
  `VenFK_IdUsuCliente` int NOT NULL COMMENT 'Identificador Foráneo que indica el Usuario Cliente',
  `VenFK_IdMetPago` int NOT NULL COMMENT 'Identificador Foránero que indica el Metodo de Pago usado',
  `VenFK_IdActivo` int NOT NULL COMMENT 'Identificador que indica si la Venta esta Activa o Inactiva',
  PRIMARY KEY (`PK_IdVenta`),
  KEY `VenFK_IdProducto` (`VenFK_IdProducto`),
  KEY `VenFK_IdTipoP` (`VenFK_IdTipoP`),
  KEY `VenFK_IdCategoria` (`VenFK_IdCategoria`),
  KEY `VenFK_IdUsuVendedor` (`VenFK_IdUsuVendedor`),
  KEY `VenFK_IdUsuCliente` (`VenFK_IdUsuCliente`),
  KEY `VenFK_IdMetPago` (`VenFK_IdMetPago`),
  KEY `VenFK_IdActivo` (`VenFK_IdActivo`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`VenFK_IdProducto`) REFERENCES `productos` (`PK_IdProducto`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`VenFK_IdTipoP`) REFERENCES `tipoproducto` (`PK_IdTipoP`),
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`VenFK_IdCategoria`) REFERENCES `categoria` (`PK_IdCategoria`),
  CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`VenFK_IdUsuVendedor`) REFERENCES `usuarios` (`PK_IdUsuario`),
  CONSTRAINT `ventas_ibfk_5` FOREIGN KEY (`VenFK_IdUsuCliente`) REFERENCES `usuarios` (`PK_IdUsuario`),
  CONSTRAINT `ventas_ibfk_6` FOREIGN KEY (`VenFK_IdMetPago`) REFERENCES `metodopago` (`PK_IdMetodoPago`),
  CONSTRAINT `ventas_ibfk_7` FOREIGN KEY (`VenFK_IdActivo`) REFERENCES `activo` (`PK_IdActivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-17 21:33:14
