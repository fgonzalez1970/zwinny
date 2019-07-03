-- --------------------------------------------------------
-- Host:                         108.175.3.195
-- Versión del servidor:         5.5.60-MariaDB - MariaDB Server
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para Zwinny_IoT
CREATE DATABASE IF NOT EXISTS `Zwinny_IoT` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Zwinny_IoT`;

-- Volcando estructura para tabla Zwinny_IoT.Iot_Subtipo_Dispositivo
CREATE TABLE IF NOT EXISTS `Iot_Subtipo_Dispositivo` (
  `Id_Subtipo_Dispositivo` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Subtipo_Dispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla Zwinny_IoT.Iot_Subtipo_Dispositivo: ~0 rows (aproximadamente)
DELETE FROM `Iot_Subtipo_Dispositivo`;
/*!40000 ALTER TABLE `Iot_Subtipo_Dispositivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Iot_Subtipo_Dispositivo` ENABLE KEYS */;

-- Volcando estructura para tabla Zwinny_IoT.Iot_Tipo_Dispositivo
CREATE TABLE IF NOT EXISTS `Iot_Tipo_Dispositivo` (
  `Id_Tipo_Dispositivo` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Tipo_Dispositivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla Zwinny_IoT.Iot_Tipo_Dispositivo: ~3 rows (aproximadamente)
DELETE FROM `Iot_Tipo_Dispositivo`;
/*!40000 ALTER TABLE `Iot_Tipo_Dispositivo` DISABLE KEYS */;
INSERT INTO `Iot_Tipo_Dispositivo` (`Id_Tipo_Dispositivo`, `Descripcion`) VALUES
	(1, 'BEACON'),
	(2, 'GATEWAY'),
	(3, 'EXTERNAL');
/*!40000 ALTER TABLE `Iot_Tipo_Dispositivo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
