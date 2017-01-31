/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 10.0.28-MariaDB-wsrep : Database - u743864597_bd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `articulos` */

CREATE TABLE `articulos` (
  `idarticulos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `precio` float NOT NULL,
  `existencia` int(11) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idarticulos`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `clientes` */

CREATE TABLE `clientes` (
  `idclientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido_parterno` varchar(45) NOT NULL,
  `apellido_materno` varchar(45) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idclientes`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `configuraciones` */

CREATE TABLE `configuraciones` (
  `idconfiguraciones` int(11) NOT NULL AUTO_INCREMENT,
  `tasa_financiamiento` float DEFAULT NULL,
  `enganche` float DEFAULT NULL,
  `plazo_maximo` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idconfiguraciones`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `detalles_venta` */

CREATE TABLE `detalles_venta` (
  `venta_idventa` int(11) NOT NULL,
  `articulos_idarticulos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `importe` float DEFAULT NULL,
  PRIMARY KEY (`venta_idventa`,`articulos_idarticulos`),
  KEY `fk_venta_has_articulos_articulos1_idx` (`articulos_idarticulos`),
  KEY `fk_venta_has_articulos_venta_idx` (`venta_idventa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `venta` */

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `activo` tinyint(1) DEFAULT '1',
  `clientes_idclientes` int(11) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float DEFAULT NULL,
  `status` varchar(45) DEFAULT 'FINALIZADA',
  PRIMARY KEY (`idventa`),
  KEY `fk_venta_clientes1_idx` (`clientes_idclientes`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
