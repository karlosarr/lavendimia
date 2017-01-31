/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - vendimia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `articulos` */

DROP TABLE IF EXISTS `articulos`;

CREATE TABLE `articulos` (
  `idarticulos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `precio` float NOT NULL,
  `existencia` int(11) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idarticulos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `idclientes` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido_parterno` varchar(45) NOT NULL,
  `apellido_materno` varchar(45) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `configuraciones` */

DROP TABLE IF EXISTS `configuraciones`;

CREATE TABLE `configuraciones` (
  `idconfiguraciones` int(11) NOT NULL AUTO_INCREMENT,
  `tasa_financiamiento` float DEFAULT NULL,
  `enganche` float DEFAULT NULL,
  `plazo_maximo` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idconfiguraciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `detalles_venta` */

DROP TABLE IF EXISTS `detalles_venta`;

CREATE TABLE `detalles_venta` (
  `venta_idventa` int(11) NOT NULL,
  `articulos_idarticulos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `importe` float DEFAULT NULL,
  PRIMARY KEY (`venta_idventa`,`articulos_idarticulos`),
  KEY `fk_venta_has_articulos_articulos1_idx` (`articulos_idarticulos`),
  KEY `fk_venta_has_articulos_venta_idx` (`venta_idventa`),
  CONSTRAINT `fk_venta_has_articulos_articulos1` FOREIGN KEY (`articulos_idarticulos`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_has_articulos_venta` FOREIGN KEY (`venta_idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `venta` */

DROP TABLE IF EXISTS `venta`;

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `clientes_idclientes` int(11) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idventa`),
  KEY `fk_venta_clientes1_idx` (`clientes_idclientes`),
  CONSTRAINT `fk_venta_clientes1` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
