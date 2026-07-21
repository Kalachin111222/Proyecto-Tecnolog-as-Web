/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.3.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: dennita
-- ------------------------------------------------------
-- Server version	12.3.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Current Database: `dennita`
--

/*!40000 DROP DATABASE IF EXISTS `dennita`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dennita` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `dennita`;

--
-- Table structure for table `carrito_items`
--

DROP TABLE IF EXISTS `carrito_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `carrito_items_user_id_producto_id_unique` (`user_id`,`producto_id`),
  KEY `carrito_items_producto_id_foreign` (`producto_id`),
  CONSTRAINT `carrito_items_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carrito_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_items`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `carrito_items` WRITE;
/*!40000 ALTER TABLE `carrito_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito_items` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2026_05_13_000002_create_users_table',1),
(2,'2026_05_27_000001_create_carrito_items_table',2),
(3,'2026_05_13_000001_create_productos_table',1),
(4,'2026_05_27_000001_add_stock_to_productos_table',3),
(5,'2026_06_24_151227_create_pedidos_table',4),
(6,'2026_06_24_151242_create_pedido_detalles_table',4),
(8,'2026_06_24_212629_add_codigo_barras_to_productos_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `pedido_detalles`
--

DROP TABLE IF EXISTS `pedido_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido_detalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_detalles_pedido_id_foreign` (`pedido_id`),
  KEY `pedido_detalles_producto_id_foreign` (`producto_id`),
  CONSTRAINT `pedido_detalles_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pedido_detalles_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_detalles`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `pedido_detalles` WRITE;
/*!40000 ALTER TABLE `pedido_detalles` DISABLE KEYS */;
INSERT INTO `pedido_detalles` VALUES
(1,1,2,5,18.90,94.50,'2026-06-24 20:21:27','2026-06-24 20:21:27'),
(2,2,89,3,9.09,27.27,'2026-06-24 20:22:47','2026-06-24 20:22:47'),
(3,3,56,2,10.40,20.80,'2026-06-24 20:26:26','2026-06-24 20:26:26'),
(4,4,5,1,23.90,23.90,'2026-06-24 21:50:21','2026-06-24 21:50:21'),
(5,4,23,1,34.90,34.90,'2026-06-24 21:50:21','2026-06-24 21:50:21'),
(6,5,112,2,10.50,21.00,'2026-06-24 21:58:25','2026-06-24 21:58:25'),
(7,6,40,1,12.90,12.90,'2026-06-24 23:48:21','2026-06-24 23:48:21'),
(8,6,41,1,39.20,39.20,'2026-06-24 23:48:21','2026-06-24 23:48:21'),
(9,6,59,1,20.80,20.80,'2026-06-24 23:48:21','2026-06-24 23:48:21'),
(10,7,2,1,18.90,18.90,'2026-06-25 02:10:07','2026-06-25 02:10:07'),
(11,8,5,1,23.90,23.90,'2026-06-25 02:15:31','2026-06-25 02:15:31'),
(12,9,5,1,23.90,23.90,'2026-06-25 02:18:17','2026-06-25 02:18:17'),
(13,10,39,1,12.90,12.90,'2026-06-25 02:22:58','2026-06-25 02:22:58'),
(14,11,43,1,21.00,21.00,'2026-06-25 02:23:26','2026-06-25 02:23:26'),
(15,12,101,1,22.90,22.90,'2026-06-25 02:24:08','2026-06-25 02:24:08'),
(16,13,1,1,24.90,24.90,'2026-06-25 02:58:01','2026-06-25 02:58:01'),
(17,13,105,1,5.79,5.79,'2026-06-25 02:58:01','2026-06-25 02:58:01'),
(18,14,109,1,23.80,23.80,'2026-07-01 19:57:00','2026-07-01 19:57:00'),
(19,14,9,1,26.80,26.80,'2026-07-01 19:57:00','2026-07-01 19:57:00'),
(20,14,61,1,17.00,17.00,'2026-07-01 19:57:00','2026-07-01 19:57:00'),
(21,14,68,1,20.80,20.80,'2026-07-01 19:57:00','2026-07-01 19:57:00'),
(22,14,3,1,6.50,6.50,'2026-07-01 19:57:00','2026-07-01 19:57:00'),
(23,14,17,1,38.90,38.90,'2026-07-01 19:57:00','2026-07-01 19:57:00'),
(24,15,83,2,10.20,20.40,'2026-07-01 22:59:40','2026-07-01 22:59:40'),
(25,15,74,1,17.80,17.80,'2026-07-01 22:59:40','2026-07-01 22:59:40'),
(26,15,89,2,9.09,18.18,'2026-07-01 22:59:40','2026-07-01 22:59:40'),
(27,15,34,1,77.80,77.80,'2026-07-01 22:59:40','2026-07-01 22:59:40'),
(28,15,25,1,43.90,43.90,'2026-07-01 22:59:40','2026-07-01 22:59:40'),
(29,15,20,1,91.00,91.00,'2026-07-01 22:59:40','2026-07-01 22:59:40'),
(30,16,29,1,90.70,90.70,'2026-07-01 23:10:26','2026-07-01 23:10:26'),
(31,17,29,1,90.70,90.70,'2026-07-01 23:24:32','2026-07-01 23:24:32'),
(32,17,20,1,91.00,91.00,'2026-07-01 23:24:32','2026-07-01 23:24:32'),
(33,18,95,2,7.90,15.80,'2026-07-01 23:52:30','2026-07-01 23:52:30'),
(34,18,97,1,10.90,10.90,'2026-07-01 23:52:30','2026-07-01 23:52:30'),
(35,19,62,1,12.00,12.00,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(36,19,70,1,20.40,20.40,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(37,19,10,1,28.00,28.00,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(38,19,4,1,27.90,27.90,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(39,19,11,1,56.90,56.90,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(40,19,12,1,22.50,22.50,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(41,19,1,1,24.90,24.90,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(42,19,5,1,23.90,23.90,'2026-07-02 00:25:42','2026-07-02 00:25:42'),
(43,20,17,1,38.90,38.90,'2026-07-02 00:45:49','2026-07-02 00:45:49'),
(44,21,105,1,5.79,5.79,'2026-07-02 01:38:47','2026-07-02 01:38:47'),
(45,22,37,1,12.90,12.90,'2026-07-02 01:51:48','2026-07-02 01:51:48'),
(46,23,37,1,12.90,12.90,'2026-07-02 01:59:57','2026-07-02 01:59:57'),
(47,24,37,1,12.90,12.90,'2026-07-02 02:00:59','2026-07-02 02:00:59'),
(48,25,37,1,12.90,12.90,'2026-07-02 02:02:16','2026-07-02 02:02:16'),
(49,26,37,1,12.90,12.90,'2026-07-02 02:02:42','2026-07-02 02:02:42'),
(50,27,37,1,12.90,12.90,'2026-07-02 02:06:29','2026-07-02 02:06:29'),
(51,28,37,1,12.90,12.90,'2026-07-02 02:09:34','2026-07-02 02:09:34'),
(52,29,37,1,12.90,12.90,'2026-07-02 02:10:49','2026-07-02 02:10:49'),
(53,30,40,1,12.90,12.90,'2026-07-02 02:14:17','2026-07-02 02:14:17'),
(54,30,37,1,12.90,12.90,'2026-07-02 02:14:17','2026-07-02 02:14:17'),
(55,31,46,1,5.90,5.90,'2026-07-02 02:17:17','2026-07-02 02:17:17'),
(56,32,49,1,15.00,15.00,'2026-07-02 02:20:07','2026-07-02 02:20:07'),
(57,33,49,1,15.00,15.00,'2026-07-02 02:23:30','2026-07-02 02:23:30'),
(58,34,49,1,15.00,15.00,'2026-07-02 02:24:17','2026-07-02 02:24:17');
/*!40000 ALTER TABLE `pedido_detalles` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `codigo_pedido` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('pendiente','pagado','preparando','enviado','entregado','cancelado','completado') NOT NULL DEFAULT 'pendiente',
  `metodo_pago` varchar(255) DEFAULT NULL,
  `direccion_envio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pedidos_codigo_pedido_unique` (`codigo_pedido`),
  KEY `pedidos_user_id_foreign` (`user_id`),
  CONSTRAINT `pedidos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES
(1,2,'PED-4GA9CI',94.50,'pagado','Online','Recojo en tienda','2026-06-24 20:21:27','2026-06-24 20:21:27'),
(2,2,'PED-A9LKPO',27.27,'pagado','Online','Recojo en tienda','2026-06-24 20:22:47','2026-06-24 20:22:47'),
(3,1,'PED-3ZPXCI',20.80,'pagado','Yape / Plin','Alfonso Ugarte 522','2026-06-24 20:26:26','2026-06-24 20:26:26'),
(4,2,'PED-UHXTTF',58.80,'pagado','Yape / Plin','Alfonso Ugarte 522','2026-06-24 21:50:21','2026-06-24 21:50:21'),
(5,2,'PED-08ISXO',21.00,'cancelado','Tarjeta de Crédito/Débito','Alfonso Ugarte 522','2026-06-24 21:58:25','2026-06-24 22:02:00'),
(6,2,'PED-T2YSJV',72.90,'pendiente','Tarjeta de Crédito/Débito','ALfonso Ugarte 522','2026-06-24 23:48:21','2026-06-24 23:48:21'),
(7,1,'CAJ-HIMYK3',18.90,'completado','efectivo','VENTA PRESENCIAL - Joseph Andre (DNI: 60799897)','2026-06-25 02:10:07','2026-06-25 02:10:07'),
(8,1,'CAJ-S8EZNG',23.90,'completado','tarjeta','VENTA PRESENCIAL','2026-06-25 02:15:31','2026-06-25 02:15:31'),
(9,1,'CAJ-XH1FUX',23.90,'completado','efectivo','VENTA PRESENCIAL - Juan carlos obando (DNI: 60799897)','2026-06-25 02:18:17','2026-06-25 02:18:17'),
(10,1,'CAJ-LHU7S4',12.90,'completado','efectivo','VENTA PRESENCIAL','2026-06-25 02:22:58','2026-06-25 02:22:58'),
(11,1,'CAJ-C7BERI',21.00,'completado','yape','VENTA PRESENCIAL','2026-06-25 02:23:26','2026-06-25 02:23:26'),
(12,1,'CAJ-1KOGS5',22.90,'completado','efectivo','VENTA PRESENCIAL - Juan Carlos Obando (DNI: 40895682)','2026-06-25 02:24:08','2026-06-25 02:24:08'),
(13,1,'CAJ-OZ60TS',30.69,'completado','efectivo','VENTA PRESENCIAL','2026-06-25 02:58:01','2026-06-25 02:58:01'),
(14,1,'CAJ-43XV9S',133.80,'pagado','efectivo','VENTA PRESENCIAL - Juan carlos Obando (DNI: 40789856)','2026-07-01 19:57:00','2026-07-01 23:14:06'),
(15,1,'CAJ-KJ1FIN',269.08,'completado','efectivo','VENTA PRESENCIAL - Juan Carlos Obando (DNI: 48579862)','2026-07-01 22:59:40','2026-07-01 22:59:40'),
(16,1,'CAJ-NBHI4V',90.70,'pagado','efectivo','VENTA PRESENCIAL','2026-07-01 23:10:26','2026-07-01 23:14:01'),
(17,1,'CAJ-CUNNGQ',181.70,'completado','efectivo','VENTA PRESENCIAL - Ray Rodriguez (DNI: 73832855)','2026-07-01 23:24:32','2026-07-01 23:24:32'),
(18,1,'CAJ-FHVX2F',26.70,'completado','efectivo','VENTA PRESENCIAL - REBAZA CASTAÑEDA JOSEPH ANDRE OSTIN FABRICIO (DNI: 60799897)','2026-07-01 23:52:30','2026-07-01 23:52:30'),
(19,1,'CAJ-KHKN9R',216.50,'completado','efectivo','VENTA PRESENCIAL - JORGE PUENTE JUAN JOSE (DNI: 74576800)','2026-07-02 00:25:42','2026-07-02 00:25:42'),
(20,1,'CAJ-BQJFI1',38.90,'completado','efectivo','VENTA PRESENCIAL - REBAZA CASTAÑEDA JOSEPH ANDRE OSTIN FABRICIO (DNI: 60799897)','2026-07-02 00:45:49','2026-07-02 00:45:49'),
(21,1,'CAJ-RBXQBK',5.79,'completado','efectivo','VENTA PRESENCIAL - REBAZA CASTAÑEDA JOSEPH ANDRE OSTIN FABRICIO (DNI: 60799897)','2026-07-02 01:38:47','2026-07-02 01:38:47'),
(22,1,'CAJ-V3IA9N',12.90,'completado','efectivo','VENTA PRESENCIAL - OBANDO ROLDAN JUAN CARLOS (DNI: 18122605)','2026-07-02 01:51:48','2026-07-02 01:51:48'),
(23,1,'CAJ-P2KYE9',12.90,'completado','efectivo','VENTA PRESENCIAL - REBAZA CASTAÑEDA JOSEPH ANDRE OSTIN FABRICIO (DNI: 60799897)','2026-07-02 01:59:57','2026-07-02 01:59:57'),
(24,1,'CAJ-SHZ5EB',12.90,'completado','efectivo','VENTA PRESENCIAL - REBAZA CASTAÑEDA JOSEPH ANDRE OSTIN FABRICIO (DNI: 60799897)','2026-07-02 02:00:59','2026-07-02 02:00:59'),
(25,1,'CAJ-JEUKY2',12.90,'completado','efectivo','VENTA PRESENCIAL - OBANDO ROLDAN JUAN CARLOS (DNI: 18122605)','2026-07-02 02:02:16','2026-07-02 02:02:16'),
(26,1,'CAJ-PALFO8',12.90,'completado','efectivo','VENTA PRESENCIAL - OBANDO ROLDAN JUAN CARLOS (DNI: 18122605)','2026-07-02 02:02:42','2026-07-02 02:02:42'),
(27,1,'CAJ-7XUF3R',12.90,'completado','efectivo','VENTA PRESENCIAL - REBAZA CASTAÑEDA JOSEPH ANDRE OSTIN FABRICIO (DNI: 60799897)','2026-07-02 02:06:29','2026-07-02 02:06:29'),
(28,1,'CAJ-26DPNB',12.90,'completado','efectivo','VENTA PRESENCIAL - OBANDO ROLDAN JUAN CARLOS (DNI: 18122605)','2026-07-02 02:09:34','2026-07-02 02:09:34'),
(29,1,'CAJ-UGZ3UO',12.90,'completado','efectivo','VENTA PRESENCIAL - OBANDO ROLDAN JUAN CARLOS (DNI: 18122605)','2026-07-02 02:10:49','2026-07-02 02:10:49'),
(30,1,'CAJ-0L1MIF',25.80,'completado','yape','VENTA PRESENCIAL','2026-07-02 02:14:17','2026-07-02 02:14:17'),
(31,1,'CAJ-T809IU',5.90,'completado','yape','VENTA PRESENCIAL - OBANDO ROLDAN JUAN CARLOS (DNI: 18122605)','2026-07-02 02:17:17','2026-07-02 02:17:17'),
(32,1,'CAJ-MH4ASQ',15.00,'completado','efectivo','VENTA PRESENCIAL','2026-07-02 02:20:07','2026-07-02 02:20:07'),
(33,1,'CAJ-WUH2PY',15.00,'completado','efectivo','VENTA PRESENCIAL','2026-07-02 02:23:30','2026-07-02 02:23:30'),
(34,1,'CAJ-1JS6A2',15.00,'completado','efectivo','VENTA PRESENCIAL','2026-07-02 02:24:17','2026-07-02 02:24:17');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(10) unsigned NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `codigo_barras` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productos_slug_unique` (`slug`),
  UNIQUE KEY `productos_codigo_barras_unique` (`codigo_barras`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES
(1,'Cerveza Tres Cruces Lager Six Pack Lata 355ml','cervezas',24.90,'imagenes/Productos/Cervezas1.png','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',26,'cerveza-tres-cruces-lager-six-pack-lata-355ml-1','2026-05-14 03:23:17','2026-07-02 00:25:42','775340336599'),
(2,'Cerveza De Malta Y Maiz Dragenburg Sixpack 310 Ml','cervezas',18.90,'imagenes/Productos/Cervezas2.png','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',32,'cerveza-de-malta-y-maiz-dragenburg-sixpack-310-ml-2','2026-05-14 03:23:17','2026-06-25 02:45:17','775901745610'),
(3,'Cerveza Coronita Six Pack Botella 210 ml','cervezas',6.50,'imagenes/Productos/Cervezas3.png','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',35,'cerveza-coronita-six-pack-botella-210-ml-3','2026-05-14 03:23:17','2026-07-01 19:57:00','775892938834'),
(4,'Cerveza Heineken Fourpack Lata 473 ml','cervezas',27.90,'imagenes/Productos/Cervezas4.png','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',38,'cerveza-heineken-fourpack-lata-473-ml-4','2026-05-14 03:23:17','2026-07-02 00:25:42','775886575041'),
(5,'Cerveza Tres Cruces Light Six Pack Lata X 310 Ml','cervezas',23.90,'imagenes/Productos/Cervezas5.png','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',19,'cerveza-tres-cruces-light-six-pack-lata-x-310-ml-5','2026-05-14 03:23:17','2026-07-02 00:25:42','775770764910'),
(6,'Cerveza Pilsen Callao Six Pack Lata 355 ml','cervezas',28.90,'imagenes/Productos/Cervezas6.png','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',35,'cerveza-pilsen-callao-six-pack-lata-355-ml-6','2026-05-14 03:23:17','2026-06-25 02:45:17','775354520108'),
(7,'Cerveza Tres Cruces Six Pack Lata 473 ml','cervezas',32.90,'imagenes/Productos/Cervezas7.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',22,'cerveza-tres-cruces-six-pack-lata-473-ml-7','2026-05-14 03:23:17','2026-06-25 02:45:17','775433790322'),
(8,'Pack (1 Cerveza De Malta Y Maiz Dragenburg Sixpack 310 Ml + 1 Rtd Party Box Uva Danger Lata 355 Ml + 1 Rtd Psyco Berry Crush 473Ml + 1 Krazy Chups 8% Alcohol Sabores Varios)','cervezas',47.20,'imagenes/Productos/Cervezas8.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',23,'pack-1-cerveza-de-malta-y-maiz-dragenburg-sixpack-310-ml-1-rtd-party-box-uva-dan-8','2026-05-14 03:23:17','2026-06-25 02:45:17','775568966419'),
(9,'Pack (1 Cerveza De Malta Y Maiz Dragenburg Sixpack 310 Ml + 1 Papas Jappy Snacks Jalapeño 200 gr)','cervezas',26.80,'imagenes/Productos/Cervezas9.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',17,'pack-1-cerveza-de-malta-y-maiz-dragenburg-sixpack-310-ml-1-papas-jappy-snacks-ja-9','2026-05-14 03:23:17','2026-07-01 19:57:00','775927861815'),
(10,'Cerveza Amstel Premium Sixpack Botella 275ml','cervezas',28.00,'imagenes/Productos/Cervezas10.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',33,'cerveza-amstel-premium-sixpack-botella-275ml-10','2026-05-14 03:23:17','2026-07-02 00:25:42','775431277068'),
(11,'Cerveza Heineken Twelve Pack Lata X 310 Ml','cervezas',56.90,'imagenes/Productos/Cervezas11.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',9,'cerveza-heineken-twelve-pack-lata-x-310-ml-11','2026-05-14 03:23:17','2026-07-02 00:25:42','775901454463'),
(12,'Cerveza Pilsen Callao Six Pack Lata 269 ml','cervezas',22.50,'imagenes/Productos/Cervezas12.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',9,'cerveza-pilsen-callao-six-pack-lata-269-ml-12','2026-05-14 03:23:17','2026-07-02 00:25:42','775508049925'),
(13,'Cerveza Tres Cruces Pum Pum Maiz Six Pack Lata X 310 Ml','cervezas',23.90,'imagenes/Productos/Cervezas13.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',30,'cerveza-tres-cruces-pum-pum-maiz-six-pack-lata-x-310-ml-13','2026-05-14 03:23:17','2026-06-25 02:45:17','775375517313'),
(14,'Cerveza Pilsen Callao Twelve Pack Lata 355 ml','cervezas',54.90,'imagenes/Productos/Cervezas14.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',44,'cerveza-pilsen-callao-twelve-pack-lata-355-ml-14','2026-05-14 03:23:17','2026-06-25 02:45:17','775710682242'),
(15,'Pack (2 Cerveza Heineken Fourpack Lata x 473 Ml)','cervezas',55.80,'imagenes/Productos/Cervezas15.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',36,'pack-2-cerveza-heineken-fourpack-lata-x-473-ml--15','2026-05-14 03:23:17','2026-06-25 02:45:17','775515749652'),
(16,'Cerveza Heineken Sixpack Lata 310 ml','cervezas',30.90,'imagenes/Productos/Cervezas16.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',17,'cerveza-heineken-sixpack-lata-310-ml-16','2026-05-14 03:23:17','2026-06-25 02:45:17','775751010851'),
(17,'Cerveza Heineken Six Pack Botella 330 ml','cervezas',38.90,'imagenes/Productos/Cervezas17.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',7,'cerveza-heineken-six-pack-botella-330-ml-17','2026-05-14 03:23:17','2026-07-02 00:45:49','775111681514'),
(18,'Pack (2 Cerveza Heineken Sixpack Lata x 310 Ml)','cervezas',61.80,'imagenes/Productos/Cervezas18.webp','Cerveza refrescante de alta calidad, ideal para compartir en cualquier ocasión.',40,'pack-2-cerveza-heineken-sixpack-lata-x-310-ml--18','2026-05-14 03:23:17','2026-06-25 02:45:17','775415263398'),
(19,'Pack 2 Cartavio Añejo Black 1L','licores',72.00,'imagenes/Productos/Licores1.png','Licor premium seleccionado para los paladares más exigentes.',19,'pack-2-cartavio-a-ejo-black-1l-1','2026-05-14 03:23:17','2026-06-25 02:45:17','775586331716'),
(20,'Pack 2 Ron Black Barrel 1L','licores',91.00,'imagenes/Productos/Licores2.png','Licor premium seleccionado para los paladares más exigentes.',8,'pack-2-ron-black-barrel-1l-2','2026-05-14 03:23:17','2026-07-01 23:24:32','775901931053'),
(21,'Pack 2 Ron Cartavio Añejo Black 750ml','licores',62.00,'imagenes/Productos/Licores3.png','Licor premium seleccionado para los paladares más exigentes.',24,'pack-2-ron-cartavio-a-ejo-black-750ml-3','2026-05-14 03:23:17','2026-06-25 02:45:17','775227846491'),
(22,'Pack 2 Vodka Russkaya Apple 750ml','licores',53.80,'imagenes/Productos/Licores4.png','Licor premium seleccionado para los paladares más exigentes.',31,'pack-2-vodka-russkaya-apple-750ml-4','2026-05-14 03:23:17','2026-06-25 02:45:17','775771102756'),
(23,'Ron Cartavio Black 1 L','licores',34.90,'imagenes/Productos/Licores5.png','Licor premium seleccionado para los paladares más exigentes.',16,'ron-cartavio-black-1-l-5','2026-05-14 03:23:17','2026-06-25 02:45:17','775159587388'),
(24,'Ron Cartavio Black 750 ml','licores',29.90,'imagenes/Productos/Licores6.png','Licor premium seleccionado para los paladares más exigentes.',25,'ron-cartavio-black-750-ml-6','2026-05-14 03:23:17','2026-06-25 02:45:17','775711787129'),
(25,'Ron Cartavio Black Barrel 1 L','licores',43.90,'imagenes/Productos/Licores7.webp','Licor premium seleccionado para los paladares más exigentes.',24,'ron-cartavio-black-barrel-1-l-7','2026-05-14 03:23:17','2026-07-01 22:59:40','775845792467'),
(26,'Vodka Russkaya Green Apple 750 ml','licores',26.90,'imagenes/Productos/Licores8.webp','Licor premium seleccionado para los paladares más exigentes.',19,'vodka-russkaya-green-apple-750-ml-8','2026-05-14 03:23:17','2026-06-25 02:45:17','775358688226'),
(27,'Pack (2 Ron Captain Morgan 700ml + 1 Coca Cola 1Lt + 1 Hielo 1.5Kg)','licores',105.00,'imagenes/Productos/Licores9.webp','Licor premium seleccionado para los paladares más exigentes.',34,'pack-2-ron-captain-morgan-700ml-1-coca-cola-1lt-1-hielo-1-5kg--9','2026-05-14 03:23:17','2026-06-25 02:45:17','775767239834'),
(28,'Pack (1 Ron Captain Morgan 700 Ml + 1 Coca Cola 1 Lt + 1 Hielo 1.5 Kg)','licores',58.10,'imagenes/Productos/Licores10.webp','Licor premium seleccionado para los paladares más exigentes.',48,'pack-1-ron-captain-morgan-700-ml-1-coca-cola-1-lt-1-hielo-1-5-kg--10','2026-05-14 03:23:17','2026-06-25 02:45:17','775305575036'),
(29,'Pack (2 Vodka Smirnoff Green Apple 0.7L + 1 Evervess 1.5Lt + 1 Hielo)','licores',90.70,'imagenes/Productos/Licores11.webp','Licor premium seleccionado para los paladares más exigentes.',42,'pack-2-vodka-smirnoff-green-apple-0-7l-1-evervess-1-5lt-1-hielo--11','2026-05-14 03:23:17','2026-07-01 23:24:32','775316976568'),
(30,'Pack (1 Schweppes Ginger Ale x 1.5 Lt + 1 Vodka Smirnoff Green Apple x 700 Ml + Hielo 1.5 Kg)','licores',52.80,'imagenes/Productos/Licores12.webp','Licor premium seleccionado para los paladares más exigentes.',34,'pack-1-schweppes-ginger-ale-x-1-5-lt-1-vodka-smirnoff-green-apple-x-700-ml-hielo-12','2026-05-14 03:23:17','2026-06-25 02:45:17','775680838414'),
(31,'Pack (1 Evervess x 1.5 Lt + 1 Vodka Smirnoff Raspberry x 700 Ml + 1 Hielo 1.5 Kg)','licores',51.80,'imagenes/Productos/Licores13.webp','Licor premium seleccionado para los paladares más exigentes.',24,'pack-1-evervess-x-1-5-lt-1-vodka-smirnoff-raspberry-x-700-ml-1-hielo-1-5-kg--13','2026-05-14 03:23:17','2026-06-25 02:45:17','775705688258'),
(32,'Pack (2 Whisky Johnnie Walker Red Label 750 Ml)','licores',127.80,'imagenes/Productos/Licores14.webp','Licor premium seleccionado para los paladares más exigentes.',13,'pack-2-whisky-johnnie-walker-red-label-750-ml--14','2026-05-14 03:23:17','2026-06-25 02:45:17','775564954011'),
(33,'Pack (1 Vino Altos del Sur Rose Botella 750ml + 1 Borgoña Botella 750ml)','licores',35.80,'imagenes/Productos/Licores15.webp','Licor premium seleccionado para los paladares más exigentes.',29,'pack-1-vino-altos-del-sur-rose-botella-750ml-1-borgo-a-botella-750ml--15','2026-05-14 03:23:17','2026-06-25 02:45:17','775711294527'),
(34,'Pack 2 Vodka Smirnoff Green Apple x 700 Ml','licores',77.80,'imagenes/Productos/Licores16.webp','Licor premium seleccionado para los paladares más exigentes.',49,'pack-2-vodka-smirnoff-green-apple-x-700-ml-16','2026-05-14 03:23:17','2026-07-01 22:59:40','775790238027'),
(35,'Pack (1 Ron Bacardi Carta Oro x 750 Ml + 1 Hielo 1.5 Kg + 1 Coca Cola Sin Azúcar x 1.5 Lt)','licores',62.40,'imagenes/Productos/Licores17.webp','Licor premium seleccionado para los paladares más exigentes.',47,'pack-1-ron-bacardi-carta-oro-x-750-ml-1-hielo-1-5-kg-1-coca-cola-sin-az-car-x-1--17','2026-05-14 03:23:17','2026-06-25 02:45:17','775502758116'),
(36,'Pack (1 Ron Mandatario 6 Años 700 Ml + 1 Coca Cola Sin Azúcar 1.5 Lt + 1 Hielo 1.5 Kg)','licores',58.40,'imagenes/Productos/Licores18.webp','Licor premium seleccionado para los paladares más exigentes.',16,'pack-1-ron-mandatario-6-a-os-700-ml-1-coca-cola-sin-az-car-1-5-lt-1-hielo-1-5-kg-18','2026-05-14 03:23:17','2026-06-25 02:45:17','775432204239'),
(37,'Hamburguesa Prime de Cerdo Miel de Maple 1 und','comidas',12.90,'imagenes/Productos/Comidas1.png','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',32,'hamburguesa-prime-de-cerdo-miel-de-maple-1-und-1','2026-05-14 03:23:17','2026-07-02 02:14:17','775151631062'),
(38,'Pack (3 Empanada De Carne + 3 Empanada De Pollo + 1 Coca Cola x 1 Lt)','comidas',25.60,'imagenes/Productos/Comidas2.png','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',38,'pack-3-empanada-de-carne-3-empanada-de-pollo-1-coca-cola-x-1-lt--2','2026-05-14 03:23:17','2026-06-25 02:45:17','775112465168'),
(39,'Sandwich Prime Pulled Pork','comidas',12.90,'imagenes/Productos/Comidas3.png','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',47,'sandwich-prime-pulled-pork-3','2026-05-14 03:23:17','2026-06-25 02:45:17','775511444537'),
(40,'Hamburguesa Prime de Res Tocino Queso 1 und','comidas',12.90,'imagenes/Productos/Comidas4.png','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',32,'hamburguesa-prime-de-res-tocino-queso-1-und-4','2026-05-14 03:23:17','2026-07-02 02:14:17','775735740202'),
(41,'Pack (5 Empanada De Carne + 5 Empanada De Pollo + 1 Coca Cola x 1 Lt)','comidas',39.20,'imagenes/Productos/Comidas5.png','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',44,'pack-5-empanada-de-carne-5-empanada-de-pollo-1-coca-cola-x-1-lt--5','2026-05-14 03:23:17','2026-06-25 02:45:17','775766035586'),
(42,'Pack (10 Empanada De Carne)','comidas',34.00,'imagenes/Productos/Comidas6.png','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',36,'pack-10-empanada-de-carne--6','2026-05-14 03:23:17','2026-06-25 02:45:17','775328384746'),
(43,'Pack (1 Coca Cola x 1 Lt + 2 Hamburguesa Parrillera)','comidas',21.00,'imagenes/Productos/Comidas7.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',40,'pack-1-coca-cola-x-1-lt-2-hamburguesa-parrillera--7','2026-05-14 03:23:17','2026-06-25 02:45:17','775382626115'),
(44,'Pizza Familiar Premium Selección Chorizos','comidas',18.90,'imagenes/Productos/Comidas8.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',47,'pizza-familiar-premium-selecci-n-chorizos-8','2026-05-14 03:23:17','2026-06-25 02:45:17','775260880259'),
(45,'Pack (10 Empanada De Pollo)','comidas',34.00,'imagenes/Productos/Comidas9.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',18,'pack-10-empanada-de-pollo--9','2026-05-14 03:23:17','2026-06-25 02:45:17','775945856267'),
(46,'Cuchareable Alfajor De Manjar Tambo X 150 Gr','comidas',5.90,'imagenes/Productos/Comidas10.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',46,'cuchareable-alfajor-de-manjar-tambo-x-150-gr-10','2026-05-14 03:23:17','2026-07-02 02:17:17','775955164719'),
(47,'Pack (5 Empanada Mixta + 5 Empanada De Pollo)','comidas',34.00,'imagenes/Productos/Comidas11.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',33,'pack-5-empanada-mixta-5-empanada-de-pollo--11','2026-05-14 03:23:17','2026-06-25 02:45:17','775544236098'),
(48,'Pack (1 Coca Cola x 1 Lt + 2 Hamburguesa Royal Con Queso)','comidas',19.00,'imagenes/Productos/Comidas12.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',29,'pack-1-coca-cola-x-1-lt-2-hamburguesa-royal-con-queso--12','2026-05-14 03:23:17','2026-06-25 02:45:17','775174103721'),
(49,'Pack (2 Hamburguesa De Res + 1 Coca Cola x 1 Lt)','comidas',15.00,'imagenes/Productos/Comidas13.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',36,'pack-2-hamburguesa-de-res-1-coca-cola-x-1-lt--13','2026-05-14 03:23:17','2026-07-02 02:24:17','775448803780'),
(50,'Pack (1 Coca Cola x 1 Lt + 2 Hamburguesa Doble Con Queso)','comidas',19.00,'imagenes/Productos/Comidas14.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',32,'pack-1-coca-cola-x-1-lt-2-hamburguesa-doble-con-queso--14','2026-05-14 03:23:17','2026-06-25 02:45:17','775565387068'),
(51,'Pack (2 Hamburguesa Royal Con Queso + 1 Cafe Con Leche Entera Danlac Capuccino Bot 250 Ml)','comidas',18.70,'imagenes/Productos/Comidas15.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',18,'pack-2-hamburguesa-royal-con-queso-1-cafe-con-leche-entera-danlac-capuccino-bot--15','2026-05-14 03:23:17','2026-06-25 02:45:17','775513580289'),
(52,'Pack (5 Empanada De Carne + 5 Empanada De Pollo)','comidas',34.00,'imagenes/Productos/Comidas16.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',24,'pack-5-empanada-de-carne-5-empanada-de-pollo--16','2026-05-14 03:23:17','2026-06-25 02:45:17','775650803573'),
(53,'Pack (3 Empanada De Carne + 3 Empanada De Pollo + 1 Inca Kola x 1 Lt)','comidas',25.60,'imagenes/Productos/Comidas17.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',44,'pack-3-empanada-de-carne-3-empanada-de-pollo-1-inca-kola-x-1-lt--17','2026-05-14 03:23:17','2026-06-25 02:45:17','775141925563'),
(54,'Pack (4 Empanada De Carne + 2 Empanada Mixta + 4 Empanada De Pollo)','comidas',34.00,'imagenes/Productos/Comidas18.webp','Deliciosa opción gastronómica preparada con ingredientes frescos y de calidad.',5,'pack-4-empanada-de-carne-2-empanada-mixta-4-empanada-de-pollo--18','2026-05-14 03:23:17','2026-06-25 02:45:17','775392849886'),
(55,'Pack (1 Rehidratante Life SOS Recovery Sabor Tropical + 1 Rehidratante Life SOS Relax Sabor Mix de Frutas) Lata 355ml','bebidas',11.80,'imagenes/Productos/Bebidas1.png','Bebida refrescante perfecta para cualquier momento del día.',21,'pack-1-rehidratante-life-sos-recovery-sabor-tropical-1-rehidratante-life-sos-rel-1','2026-05-14 03:23:17','2026-06-25 02:45:17','775658774389'),
(56,'Pack (2 Coca Cola x 1 Lt)','bebidas',10.40,'imagenes/Productos/Bebidas2.png','Bebida refrescante perfecta para cualquier momento del día.',44,'pack-2-coca-cola-x-1-lt--2','2026-05-14 03:23:17','2026-06-25 02:45:17','775737971770'),
(57,'Pack (3 Schweppes Ginger Ale x 1.5 Lt)','bebidas',23.70,'imagenes/Productos/Bebidas3.png','Bebida refrescante perfecta para cualquier momento del día.',42,'pack-3-schweppes-ginger-ale-x-1-5-lt--3','2026-05-14 03:23:17','2026-06-25 02:45:17','775753226624'),
(58,'Pack (4 Coca Cola x 1 Lt)','bebidas',20.80,'imagenes/Productos/Bebidas4.png','Bebida refrescante perfecta para cualquier momento del día.',41,'pack-4-coca-cola-x-1-lt--4','2026-05-14 03:23:17','2026-06-25 02:45:17','775416160568'),
(59,'Pack (4 Inca Kola x 1 Lt)','bebidas',20.80,'imagenes/Productos/Bebidas5.png','Bebida refrescante perfecta para cualquier momento del día.',40,'pack-4-inca-kola-x-1-lt--5','2026-05-14 03:23:17','2026-06-25 02:45:17','775592087008'),
(60,'Pack (2 Energizante Red Bull Sugar Free x 250 Ml)','bebidas',17.00,'imagenes/Productos/Bebidas6.png','Bebida refrescante perfecta para cualquier momento del día.',12,'pack-2-energizante-red-bull-sugar-free-x-250-ml--6','2026-05-14 03:23:17','2026-06-25 02:45:17','775151379452'),
(61,'Pack (2 Energizante Red Bull x 250 Ml)','bebidas',17.00,'imagenes/Productos/Bebidas7.webp','Bebida refrescante perfecta para cualquier momento del día.',41,'pack-2-energizante-red-bull-x-250-ml--7','2026-05-14 03:23:17','2026-07-01 19:57:00','775380630812'),
(62,'Pack (2 Rehidratante Flashlyte Fresa Botella 625 ml)','bebidas',12.00,'imagenes/Productos/Bebidas8.webp','Bebida refrescante perfecta para cualquier momento del día.',21,'pack-2-rehidratante-flashlyte-fresa-botella-625-ml--8','2026-05-14 03:23:17','2026-07-02 00:25:42','775312203806'),
(63,'Pack (2 Rehidratante Flashlyte Uva Botella 625 ml)','bebidas',12.00,'imagenes/Productos/Bebidas9.webp','Bebida refrescante perfecta para cualquier momento del día.',43,'pack-2-rehidratante-flashlyte-uva-botella-625-ml--9','2026-05-14 03:23:17','2026-06-25 02:45:17','775241854622'),
(64,'Pack (2 Coca Cola x 1 Lt + 2 Coca Cola Sin Azúcar Pet x 1 Lt)','bebidas',20.60,'imagenes/Productos/Bebidas10.webp','Bebida refrescante perfecta para cualquier momento del día.',8,'pack-2-coca-cola-x-1-lt-2-coca-cola-sin-az-car-pet-x-1-lt--10','2026-05-14 03:23:17','2026-06-25 02:45:17','775708472968'),
(65,'Pack (2 Energizante Monster Energy Ultra x 473 Ml)','bebidas',16.80,'imagenes/Productos/Bebidas11.webp','Bebida refrescante perfecta para cualquier momento del día.',28,'pack-2-energizante-monster-energy-ultra-x-473-ml--11','2026-05-14 03:23:17','2026-06-25 02:45:17','775110529502'),
(66,'Pack (2 Energizante Monster Energy x 473 Ml)','bebidas',16.80,'imagenes/Productos/Bebidas12.webp','Bebida refrescante perfecta para cualquier momento del día.',34,'pack-2-energizante-monster-energy-x-473-ml--12','2026-05-14 03:23:17','2026-06-25 02:45:17','775546618265'),
(67,'Jugo One Cold Pressed Naranja 250ml','bebidas',5.50,'imagenes/Productos/Bebidas13.webp','Bebida refrescante perfecta para cualquier momento del día.',9,'jugo-one-cold-pressed-naranja-250ml-13','2026-05-14 03:23:17','2026-06-25 02:45:17','775859254213'),
(68,'Pack (2 Coca Cola x 1 Lt + 2 Inca Kola x 1 Lt)','bebidas',20.80,'imagenes/Productos/Bebidas14.webp','Bebida refrescante perfecta para cualquier momento del día.',15,'pack-2-coca-cola-x-1-lt-2-inca-kola-x-1-lt--14','2026-05-14 03:23:17','2026-07-01 19:57:00','775956930532'),
(69,'Jugo One Cold Pressed Manzana 250ml','bebidas',5.50,'imagenes/Productos/Bebidas15.webp','Bebida refrescante perfecta para cualquier momento del día.',38,'jugo-one-cold-pressed-manzana-250ml-15','2026-05-14 03:23:17','2026-06-25 02:45:17','775905628995'),
(70,'Pack (4 Coca Cola Sin Azúcar Pet x 1 Lt)','bebidas',20.40,'imagenes/Productos/Bebidas16.webp','Bebida refrescante perfecta para cualquier momento del día.',8,'pack-4-coca-cola-sin-az-car-pet-x-1-lt--16','2026-05-14 03:23:17','2026-07-02 00:25:42','775547875019'),
(71,'Pack (1 Suerox Adulto Fresa Kiwi x 630 Ml + 1 Suerox Adulto Mora Azul x 630 Ml)','bebidas',13.80,'imagenes/Productos/Bebidas17.webp','Bebida refrescante perfecta para cualquier momento del día.',35,'pack-1-suerox-adulto-fresa-kiwi-x-630-ml-1-suerox-adulto-mora-azul-x-630-ml--17','2026-05-14 03:23:17','2026-06-25 02:45:17','775670343413'),
(72,'Pack (1 Suerox Adulto Manzana x 630 Ml + 1 Suerox Adulto Mora Azul x 630 Ml)','bebidas',13.40,'imagenes/Productos/Bebidas18.webp','Bebida refrescante perfecta para cualquier momento del día.',22,'pack-1-suerox-adulto-manzana-x-630-ml-1-suerox-adulto-mora-azul-x-630-ml--18','2026-05-14 03:23:17','2026-06-25 02:45:17','775966830940'),
(73,'Pack (2 Inka Chips Jalapeño x 135 Gr)','antojos',9.00,'imagenes/Productos/Antojos1.png','Snack irresistible para satisfacer tus antojos en cualquier momento.',39,'pack-2-inka-chips-jalape-o-x-135-gr--1','2026-05-14 03:23:17','2026-06-25 02:45:17','775300948166'),
(74,'Pack (2 Inka Chips Queso Y Cebolla x 135 Gr)','antojos',17.80,'imagenes/Productos/Antojos2.png','Snack irresistible para satisfacer tus antojos en cualquier momento.',18,'pack-2-inka-chips-queso-y-cebolla-x-135-gr--2','2026-05-14 03:23:17','2026-07-01 22:59:40','775501342722'),
(75,'Pack 1 (Keke Pinguino Marinela Cookies Cream 80gr + Keke Pinguino Marinela Triple Chocolate 80gr)','antojos',8.00,'imagenes/Productos/Antojos3.png','Snack irresistible para satisfacer tus antojos en cualquier momento.',16,'pack-1-keke-pinguino-marinela-cookies-cream-80gr-keke-pinguino-marinela-triple-c-3','2026-05-14 03:23:17','2026-06-25 02:45:17','775604521841'),
(76,'Pack 2 (Papas Kona Select Original 100 Gr)','antojos',15.80,'imagenes/Productos/Antojos4.png','Snack irresistible para satisfacer tus antojos en cualquier momento.',32,'pack-2-papas-kona-select-original-100-gr--4','2026-05-14 03:23:17','2026-06-25 02:45:17','775332540974'),
(77,'Pack (2 Papas Jappy Snacks BBQ 200 gr)','antojos',15.80,'imagenes/Productos/Antojos5.png','Snack irresistible para satisfacer tus antojos en cualquier momento.',27,'pack-2-papas-jappy-snacks-bbq-200-gr--5','2026-05-14 03:23:17','2026-06-25 02:45:17','775615317509'),
(78,'Pack (2 Papas Jappy Snacks Jalapeño 200 gr)','antojos',15.80,'imagenes/Productos/Antojos6.png','Snack irresistible para satisfacer tus antojos en cualquier momento.',10,'pack-2-papas-jappy-snacks-jalape-o-200-gr--6','2026-05-14 03:23:17','2026-06-25 02:45:17','775114955951'),
(79,'Papas Jappy Snacks BBQ 200 gr','antojos',7.90,'imagenes/Productos/Antojos7.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',40,'papas-jappy-snacks-bbq-200-gr-7','2026-05-14 03:23:17','2026-06-25 02:45:17','775251128142'),
(80,'Pack (2 Papas Pringles Original x 104 Gr)','antojos',21.80,'imagenes/Productos/Antojos8.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',8,'pack-2-papas-pringles-original-x-104-gr--8','2026-05-14 03:23:17','2026-06-25 02:45:17','775858208416'),
(81,'Pack (2 Papas Pringles Queso x 109 Gr)','antojos',21.80,'imagenes/Productos/Antojos9.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',33,'pack-2-papas-pringles-queso-x-109-gr--9','2026-05-14 03:23:17','2026-06-25 02:45:17','775239466834'),
(82,'Pack (2 Papas Pringles Sour&Cream Onion x 109 Gr)','antojos',21.80,'imagenes/Productos/Antojos10.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',49,'pack-2-papas-pringles-sour-cream-onion-x-109-gr--10','2026-05-14 03:23:17','2026-06-25 02:45:17','775822162337'),
(83,'Pack (1 Chocolate Reeses Barra 47Gr + 1 Chocolate Reeses Peanut Butter Cup 42 Gr)','antojos',10.20,'imagenes/Productos/Antojos11.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',21,'pack-1-chocolate-reeses-barra-47gr-1-chocolate-reeses-peanut-butter-cup-42-gr--11','2026-05-14 03:23:17','2026-07-01 22:59:40','775249192837'),
(84,'Pack (2 Tostones Inka Chips Jalapeño 95 Gr)','antojos',16.98,'imagenes/Productos/Antojos12.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',26,'pack-2-tostones-inka-chips-jalape-o-95-gr--12','2026-05-14 03:23:17','2026-06-25 02:45:17','775812163727'),
(85,'Pack 1 (Keke Pinguino Marinela 80gr + Keke Pinguino Marinela Cookies Cream 80gr)','antojos',8.00,'imagenes/Productos/Antojos13.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',7,'pack-1-keke-pinguino-marinela-80gr-keke-pinguino-marinela-cookies-cream-80gr--13','2026-05-14 03:23:17','2026-06-25 02:45:17','775555547382'),
(86,'Pack 1 (Keke Pinguino Marinela 80gr + Keke Pinguino Marinela Triple Chocolate 80gr)','antojos',8.00,'imagenes/Productos/Antojos14.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',18,'pack-1-keke-pinguino-marinela-80gr-keke-pinguino-marinela-triple-chocolate-80gr--14','2026-05-14 03:23:17','2026-06-25 02:45:17','775665425713'),
(87,'Pack (2 Inka Chips Artesanal x 135 Gr)','antojos',17.80,'imagenes/Productos/Antojos15.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',33,'pack-2-inka-chips-artesanal-x-135-gr--15','2026-05-14 03:23:17','2026-06-25 02:45:17','775334444658'),
(88,'Chifles Crickets salados 150 gr','antojos',9.09,'imagenes/Productos/Antojos16.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',32,'chifles-crickets-salados-150-gr-16','2026-05-14 03:23:17','2026-06-25 02:45:17','775634741464'),
(89,'Chifles Crickets Leche de Tigre 150 gr','antojos',9.09,'imagenes/Productos/Antojos17.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',12,'chifles-crickets-leche-de-tigre-150-gr-17','2026-05-14 03:23:17','2026-07-01 22:59:40','775958610869'),
(90,'Chocolate MR. Beast Feastables mix chocolate 35 gr','antojos',11.90,'imagenes/Productos/Antojos18.webp','Snack irresistible para satisfacer tus antojos en cualquier momento.',32,'chocolate-mr-beast-feastables-mix-chocolate-35-gr-18','2026-05-14 03:23:17','2026-06-25 02:45:17','775140198459'),
(91,'Helado grand Prix Bombones 216 ml','helados',15.90,'imagenes/Productos/Helados1.png','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',46,'helado-grand-prix-bombones-216-ml-1','2026-05-14 03:23:17','2026-06-25 02:45:17','775308206906'),
(92,'Helado Donofrio Peziduri Tricolor Cremoso 900 ml','helados',15.99,'imagenes/Productos/Helados2.png','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',16,'helado-donofrio-peziduri-tricolor-cremoso-900-ml-2','2026-05-14 03:23:17','2026-06-25 02:45:17','775934974065'),
(93,'Helado Donofrio Peziduri Chocochips Cremoso 900 ml','helados',15.99,'imagenes/Productos/Helados3.png','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',31,'helado-donofrio-peziduri-chocochips-cremoso-900-ml-3','2026-05-14 03:23:17','2026-06-25 02:45:17','775520579774'),
(94,'Helado Donofrio Peziduri Vainilla Cremoso 900 ml','helados',15.99,'imagenes/Productos/Helados4.png','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',32,'helado-donofrio-peziduri-vainilla-cremoso-900-ml-4','2026-05-14 03:23:17','2026-06-25 02:45:17','775834398789'),
(95,'Helado Gelático Chocobrownie 450ml','helados',7.90,'imagenes/Productos/Helados5.png','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',20,'helado-gel-tico-chocobrownie-450ml-5','2026-05-14 03:23:17','2026-07-01 23:52:30','775494518134'),
(96,'Helado Gelatico Chocochips 930 ml','helados',10.90,'imagenes/Productos/Helados6.png','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',19,'helado-gelatico-chocochips-930-ml-6','2026-05-14 03:23:17','2026-06-25 02:45:17','775948188766'),
(97,'Helado Gelatico Tricolor 930 ml','helados',10.90,'imagenes/Productos/Helados7.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',40,'helado-gelatico-tricolor-930-ml-7','2026-05-14 03:23:17','2026-07-01 23:52:30','775616610055'),
(98,'Helado Gelatico Chocolate 930 ml','helados',10.90,'imagenes/Productos/Helados8.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',44,'helado-gelatico-chocolate-930-ml-8','2026-05-14 03:23:17','2026-06-25 02:45:17','775143360089'),
(99,'Helado Donofrio Peziduri Sublime 900 ml','helados',22.90,'imagenes/Productos/Helados9.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',44,'helado-donofrio-peziduri-sublime-900-ml-9','2026-05-14 03:23:17','2026-06-25 02:45:17','775196422388'),
(100,'Helado Donofrio Peziduri Princesa 900 ml','helados',22.90,'imagenes/Productos/Helados10.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',33,'helado-donofrio-peziduri-princesa-900-ml-10','2026-05-14 03:23:17','2026-06-25 02:45:17','775815693621'),
(101,'Helado Donofrio Peziduri Sandwich Vainilla 900 ml','helados',22.90,'imagenes/Productos/Helados11.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',4,'helado-donofrio-peziduri-sandwich-vainilla-900-ml-11','2026-05-14 03:23:17','2026-06-25 02:45:17','775741921054'),
(102,'Pack (1 Helado Gelatico Chocochips x 930 Ml + 1 Helado Gelatico Chocolate 4 x 930 Ml)','helados',21.80,'imagenes/Productos/Helados12.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',21,'pack-1-helado-gelatico-chocochips-x-930-ml-1-helado-gelatico-chocolate-4-x-930-m-12','2026-05-14 03:23:17','2026-06-25 02:45:17','775164327517'),
(103,'Pack (1 Helado Gelatico Tricolor x 930 Ml + 1 Helado Gelatico Chocolate 4 x 930 Ml)','helados',21.80,'imagenes/Productos/Helados13.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',37,'pack-1-helado-gelatico-tricolor-x-930-ml-1-helado-gelatico-chocolate-4-x-930-ml--13','2026-05-14 03:23:17','2026-06-25 02:45:17','775248753730'),
(104,'Helado Frio Rico Capuccino 130 ml','helados',5.79,'imagenes/Productos/Helados14.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',32,'helado-frio-rico-capuccino-130-ml-14','2026-05-14 03:23:17','2026-06-25 02:45:17','775356525663'),
(105,'Helado Frio Rico Vainilla 130 ml','helados',5.79,'imagenes/Productos/Helados15.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',29,'helado-frio-rico-vainilla-130-ml-15','2026-05-14 03:23:17','2026-07-02 01:38:47','775636266297'),
(106,'Helado Frio Rico Vainilla Paleta 93 ml','helados',6.20,'imagenes/Productos/Helados16.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',8,'helado-frio-rico-vainilla-paleta-93-ml-16','2026-05-14 03:23:17','2026-06-25 02:45:17','775138094224'),
(107,'Helado Frío Rico Lúcuma 130 ml','helados',5.79,'imagenes/Productos/Helados17.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',40,'helado-fr-o-rico-l-cuma-130-ml-17','2026-05-14 03:23:17','2026-06-25 02:45:17','775827308825'),
(108,'Pack (2 Helado Gelatico Chocochips x 930 Ml)','helados',21.80,'imagenes/Productos/Helados18.webp','Helado cremoso elaborado con los mejores ingredientes para refrescarte.',19,'pack-2-helado-gelatico-chocochips-x-930-ml--18','2026-05-14 03:23:17','2026-06-25 02:45:17','775697542036'),
(109,'Pack (2 Huevo Pardo La Calera x 15 Und)','despensa',23.80,'imagenes/Productos/Despensa1.png','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',24,'pack-2-huevo-pardo-la-calera-x-15-und--1','2026-05-14 03:23:17','2026-07-01 19:57:00','775322097156'),
(110,'Pack (3 Bebida Láctea Uht Gloria Pro Triple Zero Chocolate 320 Ml)','despensa',18.00,'imagenes/Productos/Despensa2.png','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',16,'pack-3-bebida-l-ctea-uht-gloria-pro-triple-zero-chocolate-320-ml--2','2026-05-14 03:23:17','2026-06-25 02:45:17','775281435535'),
(111,'Keke Bimbo Marmoleado Familiar 380 gr','despensa',10.50,'imagenes/Productos/Despensa3.png','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',18,'keke-bimbo-marmoleado-familiar-380-gr-3','2026-05-14 03:23:17','2026-06-25 02:45:17','775888895764'),
(112,'Keke Bimbo Naranja Familiar 380 gr','despensa',10.50,'imagenes/Productos/Despensa4.png','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',45,'keke-bimbo-naranja-familiar-380-gr-4','2026-05-14 03:23:17','2026-06-25 02:45:17','775888179634'),
(113,'Leche UHT Gloria Entera 1 L','despensa',5.70,'imagenes/Productos/Despensa5.png','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',35,'leche-uht-gloria-entera-1-l-5','2026-05-14 03:23:17','2026-06-25 02:45:17','775980213028'),
(114,'Bebida Láctea Pro UHT Chocolate 320 ml','despensa',5.80,'imagenes/Productos/Despensa6.png','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',10,'bebida-l-ctea-pro-uht-chocolate-320-ml-6','2026-05-14 03:23:17','2026-06-25 02:45:17','775105586127'),
(115,'Bebida Láctea Uht Gloria Pro Triple Zero Chocolate 320 Ml','despensa',5.80,'imagenes/Productos/Despensa7.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',25,'bebida-l-ctea-uht-gloria-pro-triple-zero-chocolate-320-ml-7','2026-05-14 03:23:17','2026-06-25 02:45:17','775809654029'),
(116,'Pack (3 Keke Pinguino Triple Chocolate X 80 Gr)','despensa',12.00,'imagenes/Productos/Despensa8.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',41,'pack-3-keke-pinguino-triple-chocolate-x-80-gr--8','2026-05-14 03:23:17','2026-06-25 02:45:17','775449903780'),
(117,'Pack 2 Macaroni & Cheese Jappy Macs Original 226 Gr','despensa',9.98,'imagenes/Productos/Despensa9.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',30,'pack-2-macaroni-cheese-jappy-macs-original-226-gr-9','2026-05-14 03:23:17','2026-06-25 02:45:17','775472530438'),
(118,'Pack (2 Sopa Oriental Shin Ramyun x 120 Gr)','despensa',15.00,'imagenes/Productos/Despensa10.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',25,'pack-2-sopa-oriental-shin-ramyun-x-120-gr--10','2026-05-14 03:23:17','2026-06-25 02:45:17','775867598758'),
(119,'Pack (4 Conserva Trozos De Atún Campomar x 150 Gr)','despensa',24.40,'imagenes/Productos/Despensa11.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',35,'pack-4-conserva-trozos-de-at-n-campomar-x-150-gr--11','2026-05-14 03:23:17','2026-06-25 02:45:17','775517583421'),
(120,'Conserva Duraznos En Mitades Compass 820 Gr','despensa',11.40,'imagenes/Productos/Despensa12.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',42,'conserva-duraznos-en-mitades-compass-820-gr-12','2026-05-14 03:23:17','2026-06-25 02:45:17','775147844266'),
(121,'Pack (3 Arroz Extra Corazon Del Fundo x 750 Gr)','despensa',11.70,'imagenes/Productos/Despensa13.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',23,'pack-3-arroz-extra-corazon-del-fundo-x-750-gr--13','2026-05-14 03:23:17','2026-06-25 02:45:17','775142835620'),
(122,'Pack (3 Sopa Ajinomen Sabor Carne Picante Vaso x 51 Gr)','despensa',11.40,'imagenes/Productos/Despensa14.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',18,'pack-3-sopa-ajinomen-sabor-carne-picante-vaso-x-51-gr--14','2026-05-14 03:23:17','2026-06-25 02:45:17','775269829824'),
(123,'Pack (3 Sopa Ajinomen Sabor Gallina Picante Vaso x 51 Gr)','despensa',11.40,'imagenes/Productos/Despensa15.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',12,'pack-3-sopa-ajinomen-sabor-gallina-picante-vaso-x-51-gr--15','2026-05-14 03:23:17','2026-06-25 02:45:17','775756097214'),
(124,'Pack (3 Sopa Sabor Carne Con Fideos Ajinomen x 51 Gr)','despensa',11.40,'imagenes/Productos/Despensa16.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',14,'pack-3-sopa-sabor-carne-con-fideos-ajinomen-x-51-gr--16','2026-05-14 03:23:17','2026-06-25 02:45:17','775508587866'),
(125,'Pack (3 Sopa Sabor Gallina Con Fideos Ajinomen x 51 Gr)','despensa',11.40,'imagenes/Productos/Despensa17.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',23,'pack-3-sopa-sabor-gallina-con-fideos-ajinomen-x-51-gr--17','2026-05-14 03:23:17','2026-06-25 02:45:17','775339725240'),
(126,'Pack (3 Aceite Primor Vegetal x 900 Ml)','despensa',30.00,'imagenes/Productos/Despensa18.webp','Producto de despensa esencial para el hogar, de alta calidad y rendimiento.',5,'pack-3-aceite-primor-vegetal-x-900-ml--18','2026-05-14 03:23:17','2026-06-25 02:45:17','775918680540');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','cliente','cajero') NOT NULL DEFAULT 'cliente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_usuario_unique` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','$2y$12$dTynzNh6Ah6arNK0KBlTG.sRTDN3tGrTpDOAZwHZCyoI38w.h3Gm.','admin','2026-05-15 01:08:18','2026-05-15 01:08:18'),
(2,'cliente','$2y$12$DU1/NXDEkNxFrMq.sPYMbeJQghXm93TqnA.YxCPiOviJtRGC8I9.q','cliente','2026-05-15 01:08:19','2026-05-15 01:08:19'),
(3,'cajero','$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uDutXJbwW','cajero','2026-06-24 20:55:17','2026-06-24 20:55:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-07-12 13:12:55
