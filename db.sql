/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.37-MariaDB : Database - cfw
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cfw` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cfw`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Procedure structure for procedure `agregarCategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `agregarCategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarCategoria`(IN nNombre varchar(100), IN nDescripcion VARCHAR(255))
BEGIN
    insert into categoria(nombre, descripcion) values(nNombre, nDescripcion);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `editarCategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `editarCategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `editarCategoria`(IN nId int, In nNombre VARCHAR(100), IN nDescripcion VARCHAR(255))
BEGIN
    UPDATE categoria
	SET nombre = nNombre,
	    descripcion = nDescripcion
    WHERE id = nId; 
    END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminarCategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminarCategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarCategoria`(IN nId int)
BEGIN
    DELETE FROM categoria WHERE id = nId;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `listarCategoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `listarCategoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCategoria`()
BEGIN
    SELECT * from categoria;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
