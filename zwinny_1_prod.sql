-- --------------------------------------------------------
-- Host:                         108.175.3.195
-- Versión del servidor:         5.5.56-MariaDB - MariaDB Server
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para zwinny_1
CREATE DATABASE IF NOT EXISTS `zwinny_1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `zwinny_1`;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Cliente
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Cliente` (
  `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Razon_Social` varchar(100) NOT NULL,
  `RFC` varchar(15) DEFAULT NULL,
  `Estatus` tinyint(4) DEFAULT NULL,
  `Fecha_Alta` datetime DEFAULT NULL,
  `Fecha_Baja` datetime DEFAULT NULL,
  `Correo` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Cliente: ~22 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Cliente`;
/*!40000 ALTER TABLE `ENCUESTAS_Cliente` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Cliente` (`Id_Cliente`, `Razon_Social`, `RFC`, `Estatus`, `Fecha_Alta`, `Fecha_Baja`, `Correo`) VALUES
	(1, 'HOLIS', '', 0, '2018-07-14 03:34:39', '2018-07-24 14:12:06', 'prueba@prueba.com'),
	(2, 'GABRIEL CONTRERAS', 'xaxx010101xxx', 1, '2018-07-14 04:38:28', '2018-07-24 13:07:53', 'gabo@alphadev.mx'),
	(3, 'ANA RENTERIA', '', 0, '2018-07-14 04:49:14', '2018-07-24 14:15:41', 'ejeplo@ejemplo.com'),
	(4, 'ANA RENTERIA', 'XAXX010101000', 0, '2018-07-14 04:49:46', '2018-07-24 14:43:26', 'ana@alphadev.com'),
	(5, 'Ana Renteria', 'azxs160401xxx', 0, '2018-07-14 05:31:40', '2018-07-18 15:24:19', ''),
	(6, 'PRUEBAS', NULL, 0, '2018-07-14 05:31:41', '2018-07-24 12:21:12', 'preba@prueba.com.mx'),
	(7, 'LAPCITY ', '', 0, '2018-07-18 22:17:41', '2018-07-24 12:06:01', 'aa@aa.aa'),
	(8, 'PRUEBA2', 'AAA000000---', 0, '2018-07-19 10:05:29', '2018-07-24 09:53:32', 'prueba@prueba.com'),
	(9, 'PRUEBA 3', '', 1, '2018-07-19 10:19:32', '9999-12-31 00:00:00', 'algo@algoalalalala.la'),
	(10, 'PRUEBA 4', '', 0, '2018-07-19 10:20:14', '2018-07-24 16:43:08', 'algo@algo.com'),
	(11, 'PRUEBA 6', 'XXX010101XXX', 1, '2018-07-19 10:37:44', '2018-07-24 09:50:24', 'pielrojinegra@hotmail.com'),
	(12, 'ANA RENTERIA', '', 1, '2018-07-24 11:12:07', '9999-12-31 00:00:00', 'algo1@aalgo1.mx'),
	(13, 'PRUEBA 7', '', 1, '2018-07-24 11:21:27', '9999-12-31 00:00:00', 'asdf@ejemplo.xom'),
	(14, 'PRUEBA 8', '', 0, '2018-07-24 11:23:36', '2018-07-24 16:07:46', 'ana@alphadev.com'),
	(15, 'PRUEBAS 1', '', 1, '2018-07-24 11:24:38', '9999-12-31 00:00:00', 'aa@aa.aa'),
	(16, 'LAPCITY SA DE CV', '', 0, '2018-07-24 12:12:12', '2018-07-27 18:28:01', 'administracion@lcshop.mx'),
	(17, 'PRUEBA 11', '', 0, '2018-07-24 12:54:16', '2018-07-24 14:43:38', 'xxx@xxx.mx'),
	(18, 'PRUEBA131900', '', 0, '2018-07-24 13:20:16', '2018-07-24 14:17:14', 'prueba@prueba131900.com'),
	(19, 'PRUEBA 15', '', 0, '2018-07-24 14:48:33', '2018-07-24 14:49:46', 'sdfga@dfgx.mx'),
	(20, 'PRUEBA 9', '', 0, '2018-07-24 16:26:04', '2018-07-24 16:46:24', 'prueba@prueba.com'),
	(21, 'LAPCITY SA DE CV', '', 0, '2018-07-27 18:27:53', '2018-07-27 18:27:57', 'gabo@alphadev.mx'),
	(22, 'CLIENTE 254', '', 1, '2018-07-27 18:33:59', '9999-12-31 00:00:00', 'prueba@prueba.com');
/*!40000 ALTER TABLE `ENCUESTAS_Cliente` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta` (
  `Id_Encuesta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` smallint(6) NOT NULL,
  `Codigo_Encuesta` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Fin` date NOT NULL,
  `Texto_Bienvenida` varchar(250) NOT NULL,
  `Texto_Despedida` varchar(250) NOT NULL,
  `Tiempo_Sincronizacion` time NOT NULL,
  `Fondo_Encuesta` varchar(250) DEFAULT NULL,
  `Imagen_Fondo_Encuesta` varchar(100) DEFAULT NULL,
  `Fondo_Splash` varchar(250) DEFAULT NULL,
  `Imagen_Fondo_Splash` varchar(100) DEFAULT NULL,
  `Fondo_Fin` varchar(250) DEFAULT NULL,
  `Imagen_Fondo_Fin` varchar(100) DEFAULT NULL,
  `Tamano_Letra` tinyint(4) DEFAULT NULL,
  `Fuente` varchar(250) DEFAULT NULL,
  `Url` varchar(250) DEFAULT NULL,
  `Estatus` tinyint(4) DEFAULT NULL,
  `Fecha_Alta` datetime DEFAULT NULL,
  `Fecha_Baja` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Encuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta: ~5 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Encuesta` (`Id_Encuesta`, `Id_Cliente`, `Codigo_Encuesta`, `Nombre`, `Fecha_Inicio`, `Fecha_Fin`, `Texto_Bienvenida`, `Texto_Despedida`, `Tiempo_Sincronizacion`, `Fondo_Encuesta`, `Imagen_Fondo_Encuesta`, `Fondo_Splash`, `Imagen_Fondo_Splash`, `Fondo_Fin`, `Imagen_Fondo_Fin`, `Tamano_Letra`, `Fuente`, `Url`, `Estatus`, `Fecha_Alta`, `Fecha_Baja`) VALUES
	(1, 4, '0001', 'Pruebas', '2018-07-16', '2018-07-16', 'preubas bienvenida', 'Preubas despedido', '12:00:00', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 10, '3', 'http://encuestas.zwinny.mx/survey?id=1', 1, '2018-07-17 17:24:35', '9999-12-31 00:00:00'),
	(2, 4, '0004', 'Cliente 4', '2018-07-20', '9999-12-31', 'cliente 4', 'Cliente', '12:00:00', '15:00:00', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 14, '5', 'http://encuestas.zwinny.mx/survey?id=2', 1, '2018-07-20 13:20:38', '9999-12-31 00:00:00'),
	(3, 1, '0202', 'Prueba Gabriel', '0000-00-00', '9999-12-31', 'Hola bienvenido', 'Hola adios', '00:00:05', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 10, '1', 'http://encuestas.zwinny.mx/survey?id=3', 1, '2018-07-20 18:11:49', '9999-12-31 00:00:00'),
	(4, 1, '0000', 'cerito', '2018-07-27', '2018-07-28', 'holis', 'adiosito', '10:00:00', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 10, 'pruebasss', 'prueba', 1, '2018-07-27 14:00:09', '9999-12-31 00:00:00'),
	(5, 1, '0104', 'Prueba 104', '2018-08-01', '2018-08-31', 'Bienvenido', 'Adios', '00:05:00', '', '', '', '', '', '', 10, 'Arial', 'http://encuestas.zwinny.mx/survey?id=5', 1, '2018-07-27 16:58:41', '9999-12-31 00:00:00');
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Cupon
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Cupon` (
  `Id_Encuesta` int(11) NOT NULL,
  `Nombre_Imagen` varchar(150) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  KEY `Id_Encuesta_idx` (`Id_Encuesta`),
  CONSTRAINT `FK_IdEncuestaCupon` FOREIGN KEY (`Id_Encuesta`) REFERENCES `ENCUESTAS_Encuesta` (`Id_Encuesta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Cupon: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Cupon`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Cupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Cupon` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Cupon_Envio
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Cupon_Envio` (
  `Id_Encuesta` int(11) NOT NULL,
  `Correo` varchar(250) NOT NULL,
  `Fecha_Envio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Cupon_Envio: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Cupon_Envio`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Cupon_Envio` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Cupon_Envio` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Informacion_Encuestado
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Informacion_Encuestado` (
  `Id_Encuesta` int(11) NOT NULL,
  `Id_Informacion` smallint(6) NOT NULL,
  KEY `FK_IdEncuestaEncuestado_idx` (`Id_Encuesta`),
  KEY `FK_IdInformacionEncuestado_idx` (`Id_Informacion`),
  CONSTRAINT `FK_IdEncuestaEncuestado` FOREIGN KEY (`Id_Encuesta`) REFERENCES `ENCUESTAS_Encuesta` (`Id_Encuesta`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_IdInformacionEncuestado` FOREIGN KEY (`Id_Informacion`) REFERENCES `ENCUESTAS_Tipo_Informacion_Encuestado` (`Id_Informacion`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Informacion_Encuestado: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Informacion_Encuestado`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Informacion_Encuestado` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Informacion_Encuestado` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Kiosko
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Kiosko` (
  `Id_Encuesta` int(11) NOT NULL,
  `Id_Kiosko` smallint(6) NOT NULL,
  KEY `Id_Encuesta_idx` (`Id_Encuesta`),
  CONSTRAINT `FK_IdEncuesta` FOREIGN KEY (`Id_Encuesta`) REFERENCES `ENCUESTAS_Encuesta` (`Id_Encuesta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Kiosko: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Kiosko`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Kiosko` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Kiosko` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Pregunta
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Pregunta` (
  `Id_Pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Encuesta` int(11) NOT NULL,
  `Id_Tipo_Pregunta` tinyint(4) NOT NULL,
  `No_Pregunta` tinyint(4) NOT NULL,
  `Texto` varchar(250) NOT NULL,
  `Maximo_Respuesta_Texto` decimal(6,0) NOT NULL,
  `Tamano_Letra` tinyint(4) NOT NULL,
  `Renglon` tinyint(4) NOT NULL,
  `Color_Letra` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Pregunta`),
  KEY `FK_IdEncuestaPregunta_idx` (`Id_Encuesta`),
  KEY `FK_IdTipoPregunta_idx` (`Id_Tipo_Pregunta`),
  CONSTRAINT `FK_IdEncuestaPregunta` FOREIGN KEY (`Id_Encuesta`) REFERENCES `ENCUESTAS_Encuesta` (`Id_Encuesta`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_IdTipoPregunta` FOREIGN KEY (`Id_Tipo_Pregunta`) REFERENCES `ENCUESTAS_Tipo_Pregunta` (`Id_Tipo_Pregunta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Pregunta: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Pregunta`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Pregunta` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Pregunta_Opcion
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Pregunta_Opcion` (
  `Id_Pregunta_Opcion` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Pregunta` int(11) NOT NULL,
  `Id_Imagen` smallint(6) NOT NULL,
  `Texto` varchar(50) NOT NULL,
  `Orden` tinyint(4) NOT NULL,
  `Valor` decimal(5,0) NOT NULL,
  `No_Pregunta_Salto` tinyint(4) NOT NULL,
  `Mostrar_Texto` bit(1) NOT NULL,
  `Color_Letra` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Pregunta_Opcion`),
  KEY `FK_IdPregunta_idx` (`Id_Pregunta`),
  CONSTRAINT `FK_IdPregunta` FOREIGN KEY (`Id_Pregunta`) REFERENCES `ENCUESTAS_Encuesta_Pregunta` (`Id_Pregunta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Pregunta_Opcion: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Pregunta_Opcion`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Pregunta_Opcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Pregunta_Opcion` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Reporte_Configuracion
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Reporte_Configuracion` (
  `Id_Encuesta` int(11) NOT NULL,
  `Reporte_Kiosko` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Reporte_Configuracion: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Reporte_Configuracion`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Reporte_Configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Reporte_Configuracion` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Respuesta` (
  `Id_Encuesta_Respuesta` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Encuesta` int(11) NOT NULL,
  `Id_Kiosco` smallint(6) NOT NULL,
  `Fecha_Encuesta` datetime DEFAULT NULL,
  `Fecha_Sincronizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Encuesta_Respuesta`),
  KEY `FK_IdEncuestaRespuesta_idx` (`Id_Encuesta`),
  CONSTRAINT `FK_IdEncuestaRespuesta` FOREIGN KEY (`Id_Encuesta`) REFERENCES `ENCUESTAS_Encuesta` (`Id_Encuesta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Respuesta`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta_Detalle
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Respuesta_Detalle` (
  `Id_Encuesta_Respuesta` bigint(20) NOT NULL,
  `Id_Pregunta` int(11) NOT NULL,
  `Id_Pregunta_Opcion` int(11) NOT NULL,
  `Respuesta` text NOT NULL,
  KEY `FK_IdEncuestaRespuestaDetalle_idx` (`Id_Encuesta_Respuesta`),
  KEY `FK_IdPreguntaDetalle_idx` (`Id_Pregunta`),
  CONSTRAINT `FK_IdEncuestaRespuestaDetalle` FOREIGN KEY (`Id_Encuesta_Respuesta`) REFERENCES `ENCUESTAS_Encuesta_Respuesta` (`Id_Encuesta_Respuesta`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_IdPreguntaDetalle` FOREIGN KEY (`Id_Pregunta`) REFERENCES `ENCUESTAS_Encuesta_Pregunta` (`Id_Pregunta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta_Detalle: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Respuesta_Detalle`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta_Detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta_Detalle` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta_Incompleta
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Respuesta_Incompleta` (
  `Id_Encuesta` int(11) NOT NULL,
  `Id_Kiosko` smallint(6) NOT NULL,
  `No_Incompletas` int(11) NOT NULL,
  `Fecha_Alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta_Incompleta: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Respuesta_Incompleta`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta_Incompleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta_Incompleta` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta_Informacion
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Encuesta_Respuesta_Informacion` (
  `Id_Encuesta_Respuesta` bigint(20) NOT NULL,
  `Id_Informacion` tinyint(4) NOT NULL,
  `Dato` varchar(150) NOT NULL,
  KEY `FK_IdEncuestaInformacion_idx` (`Id_Encuesta_Respuesta`),
  CONSTRAINT `FK_IdEncuestaRespuestaInformacion` FOREIGN KEY (`Id_Encuesta_Respuesta`) REFERENCES `ENCUESTAS_Encuesta_Respuesta` (`Id_Encuesta_Respuesta`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Encuesta_Respuesta_Informacion: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Encuesta_Respuesta_Informacion`;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta_Informacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Encuesta_Respuesta_Informacion` ENABLE KEYS */;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncPrt_ReporteDatosEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncPrt_ReporteDatosEncuesta`(Id_Encuesta int)
BEGIN
		SELECT	ENCUESTAS_Tipo_Informacion_Encuestado.Descripcion, 
			CASE WHEN ENCUESTAS_Tipo_Informacion_Encuestado_Opcion.Descripcion IS NULL	
			THEN ENCUESTAS_Encuesta_Respuesta_Informacion.Dato
			ELSE ENCUESTAS_Tipo_Informacion_Encuestado_Opcion.Descripcion END AS Respuesta
		FROM    ENCUESTAS_Encuesta_Respuesta INNER JOIN
				ENCUESTAS_Encuesta_Respuesta_Informacion ON 
				ENCUESTAS_Encuesta_Respuesta.Id_Encuesta_Respuesta = ENCUESTAS_Encuesta_Respuesta_Informacion.Id_Encuesta_Respuesta LEFT OUTER JOIN
				ENCUESTAS_Tipo_Informacion_Encuestado ON 
				ENCUESTAS_Encuesta_Respuesta_Informacion.Id_Informacion = ENCUESTAS_Tipo_Informacion_Encuestado.Id_Informacion LEFT OUTER JOIN
				ENCUESTAS_Tipo_Informacion_Encuestado_Opcion ON ENCUESTAS_Encuesta_Respuesta_Informacion.Dato = ENCUESTAS_Tipo_Informacion_Encuestado_Opcion.Valor AND
				ENCUESTAS_Tipo_Informacion_Encuestado.Id_Informacion = ENCUESTAS_Tipo_Informacion_Encuestado_Opcion.Id_Informacion
		WHERE	ENCUESTAS_Encuesta_Respuesta.Id_Encuesta = Id_Encuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarCliente
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarCliente`(IN Id_ClienteP smallint)
BEGIN
	SELECT	Id_Cliente, Razon_Social, RFC, Estatus, Fecha_Alta, Fecha_Baja,Correo
	FROM    ENCUESTAS_Cliente
	WHERE	Id_Cliente = Id_ClienteP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarEncuesta`(IN Id_EncuestaP int)
BEGIN
		SELECT	Id_Encuesta, Id_Cliente, Codigo_Encuesta, Nombre, Fecha_Inicio, Fecha_Fin, Texto_Bienvenida, 
			Texto_Despedida, Tiempo_Sincronizacion, Fondo_Encuesta, Imagen_Fondo_Encuesta, Fondo_Splash, Imagen_Fondo_Splash,
			Fondo_Fin, Imagen_Fondo_Fin, Tamano_Letra, Fuente, Estatus, Fecha_Alta, Fecha_Baja
		FROM    ENCUESTAS_Encuesta
		WHERE	Id_Encuesta = Id_EncuestaP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarEncuestaCodigo
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarEncuestaCodigo`(Codigo_Encuesta nvarchar(20))
BEGIN
		SELECT	Id_Encuesta, Id_Cliente, Codigo_Encuesta, Nombre, Fecha_Inicio, Fecha_Fin, Texto_Bienvenida, 
				Texto_Despedida, Tiempo_Sincronizacion, Fondo_Encuesta, Imagen_Fondo_Encuesta, Fondo_Splash, Imagen_Fondo_Splash,
				Fondo_Fin, Imagen_Fondo_Fin, Tamano_Letra, Fuente, Estatus, Fecha_Alta, Fecha_Baja
		FROM    ENCUESTAS_Encuesta
		WHERE	Codigo_Encuesta = Codigo_Encuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarEncuestaCupon
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarEncuestaCupon`(Id_Encuesta int)
BEGIN
		SELECT	Id_Encuesta, Nombre_Imagen, Imagen
		FROM    ENCUESTAS_Encuesta_Cupon
		WHERE	Id_Encuesta = Id_Encuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarEncuestaModulo
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarEncuestaModulo`(Identificador nvarchar(50))
BEGIN
		SELECT  ENCUESTAS_Encuesta.Id_Encuesta, Cliente.Id_Cliente, ENCUESTAS_Kiosco.Id_Kiosco, ENCUESTAS_Encuesta.Codigo_Encuesta, ENCUESTAS_Encuesta.Nombre, ENCUESTAS_Encuesta.Fecha_Inicio, 
				ENCUESTAS_Encuesta.Fecha_Fin, ENCUESTAS_Encuesta.Texto_Bienvenida, ENCUESTAS_Encuesta.Texto_Despedida, 
				TIMESTAMPDIFF(MINUTE, DATEDIFF(0, ENCUESTAS_Encuesta.Tiempo_Sincronizacion), ENCUESTAS_Encuesta.Tiempo_Sincronizacion) as Tiempo_Sincronizacion,
				ENCUESTAS_Encuesta.Fondo_Encuesta, ENCUESTAS_Encuesta.Fondo_Splash, Venta.Cliente.Codigo_Cliente as Logo_Cliente, ENCUESTAS_Encuesta.Tamano_Letra,
				ENCUESTAS_Encuesta.Fuente, Fondo_Fin
		FROM	ENCUESTAS_Encuesta INNER JOIN
				ENCUESTAS_Encuesta_Kiosco ON ENCUESTAS_Encuesta.Id_Encuesta = ENCUESTAS_Encuesta_Kiosco.Id_Encuesta INNER JOIN
				ENCUESTAS_Kiosco ON ENCUESTAS_Encuesta_Kiosco.Id_Kiosco = ENCUESTAS_Kiosco.Id_Kiosco INNER JOIN
				Venta.Cliente ON ENCUESTAS_Encuesta.Id_Cliente = Venta.Cliente.Id_Cliente 
		WHERE	ENCUESTAS_Kiosco.Identificador = Identificador AND SYSDATETIME() BETWEEN ENCUESTAS_Encuesta.Fecha_Inicio AND DATEADD(DAY,1,ENCUESTAS_Encuesta.Fecha_Fin) AND
				ENCUESTAS_Encuesta.Estatus <> 0 AND ENCUESTAS_Encuesta.Fecha_Baja = fncFechaNula()
        LIMIT 1;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarEncuestaPregunta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarEncuestaPregunta`(Id_Pregunta int)
BEGIN
		SELECT	Id_Pregunta, Id_Encuesta, Id_Tipo_Pregunta, No_Pregunta, Texto, Maximo_Respuesta_Texto, Tamano_Letra
		FROM    ENCUESTAS_Encuesta_Pregunta
		WHERE	Id_Pregunta = Id_Pregunta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarEncuestaReporteConfiguracion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarEncuestaReporteConfiguracion`(Id_Encuesta int)
BEGIN
		SELECT	Id_Encuesta, Reporte_Kiosco
		FROM	ENCUESTAS_Encuesta_Reporte_Configuracion
		WHERE	Id_Encuesta = Id_Encuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarEncuestaRespuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarEncuestaRespuesta`(Id_Encuesta_Respuesta int)
BEGIN
		SELECT	Id_Encuesta_Respuesta, Id_Encuesta, Id_Kiosco, Fecha_Encuesta, Fecha_Sincronizacion
		FROM    ENCUESTAS_Encuesta_Respuesta
		WHERE	Id_Encuesta_Respuesta = Id_Encuesta_Respuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarImagen
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarImagen`(Id_ImagenP int)
BEGIN
		SELECT	Id_Imagen, Nombre_Imagen, Imagen, Descripcion, Fecha_Alta, Fecha_Baja
		FROM    ENCUESTAS_Imagen
		WHERE	Id_Imagen = Id_ImagenP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarKiosco`(IN Id_KioscoP smallint)
BEGIN
		SELECT	ENCUESTAS_Kiosco.Id_Kiosco, ENCUESTAS_Kiosco.Id_Cliente, ENCUESTAS_Kiosco.Id_Cliente_Sucursal, ENCUESTAS_Kiosco.Id_Zona,
		ENCUESTAS_Kiosco.Codigo_Kiosco, ENCUESTAS_Kiosco.Identificador, 
				Hora_Arranque, Hora_Cierre, IFNULL(ENCUESTAS_Ubicacion_Kiosco.Ubicacion,'') AS Ubicacion, 
				IFNULL(ENCUESTAS_Ubicacion_Kiosco.Direccion,'') AS Direccion, 
                ENCUESTAS_Kiosco.Fecha_Alta, ENCUESTAS_Kiosco.Fecha_Baja
		FROM    ENCUESTAS_Kiosco LEFT JOIN
                ENCUESTAS_Ubicacion_Kiosco ON ENCUESTAS_Ubicacion_Kiosco.Id_Kiosco = ENCUESTAS_Kiosco.Id_Kiosco
		WHERE	ENCUESTAS_Kiosco.Id_Kiosco = Id_KioscoP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarKioscoIdentificador
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarKioscoIdentificador`(Identificador nvarchar(50))
BEGIN
		SELECT	Id_Kiosco, Id_Cliente, Id_Cliente_Sucursal, Id_Zona, Codigo_Kiosco, Identificador, 
				Hora_Arranque, Hora_Cierre, Fecha_Alta, Fecha_Baja
		FROM    ENCUESTAS_Kiosco
		WHERE	Identificador = Identificador;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncRow_BuscarTipoInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncRow_BuscarTipoInformacionEncuestado`(Id_Informacion smallint)
BEGIN
		SELECT	Id_Informacion, Descripcion, Fecha_Alta, Fecha_Baja
		FROM    ENCUESTAS_Tipo_Informacion_Encuestado
		WHERE	Id_Informacion = Id_Informacion;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_EncuestaCuponEnvioPendiente
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_EncuestaCuponEnvioPendiente`(Id_EncuestaP int)
BEGIN
		SELECT	DISTINCT Dato
		FROM	ENCUESTAS_Encuesta_Respuesta_Informacion
		WHERE	Id_Informacion = 2 AND Dato <> '' AND Id_Encuesta_Respuesta IN (SELECT Id_Encuesta_Respuesta FROM ENCUESTAS_Encuesta_Respuesta WHERE Id_Encuesta=Id_EncuestaP) AND
				Dato NOT IN(SELECT Correo FROM ENCUESTAS_Encuesta_Cupon_Envio WHERE Id_Encuesta=Id_EncuestaP);
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoCliente
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoCliente`()
BEGIN
		SELECT Id_Cliente, Razon_Social, RFC, Estatus, Correo
        FROM ENCUESTAS_Cliente WHERE Fecha_Baja > NOW();
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuesta`()
BEGIN
		SELECT	ENCUESTAS_Encuesta.Id_Encuesta, ENCUESTAS_Cliente.Id_Cliente, ENCUESTAS_Cliente.Razon_Social, ENCUESTAS_Encuesta.Codigo_Encuesta, ENCUESTAS_Encuesta.Nombre,
				ENCUESTAS_Encuesta.Fecha_Inicio, ENCUESTAS_Encuesta.Fecha_Fin
		FROM    ENCUESTAS_Encuesta LEFT JOIN
				ENCUESTAS_Cliente ON ENCUESTAS_Encuesta.Id_Cliente = ENCUESTAS_Cliente.Id_Cliente 
		WHERE	ENCUESTAS_Encuesta.Estatus = 1 AND ENCUESTAS_Encuesta.Fecha_Baja = '9999-12-31';
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaDatosEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaDatosEncuestado`(Id_EncuestaP int)
BEGIN
		SELECT	ENCUESTAS_Encuesta_Informacion_Encuestado.Id_Informacion, ENCUESTAS_Tipo_Informacion_Encuestado.Descripcion
		FROM    ENCUESTAS_Encuesta_Informacion_Encuestado INNER JOIN
				ENCUESTAS_Tipo_Informacion_Encuestado ON ENCUESTAS_Encuesta_Informacion_Encuestado.Id_Informacion = ENCUESTAS_Tipo_Informacion_Encuestado.Id_Informacion
		WHERe	Id_Encuesta = Id_EncuestaP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaInformacionEncuestado`(Id_Encuesta int)
BEGIN
		SELECT  CAST(Id_Informacion as char(10)) as Id_Informacion
		FROM	ENCUESTAS_Encuesta_Informacion_Encuestado
		WHERe	Id_Encuesta = Id_Encuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaKiosco`(Id_EncuestaP int)
BEGIN
		SELECT  CAST(Encuesta_Kiosco.Id_Kiosco as char(10)) as Id_Kiosco, Kiosco.Codigo_Kiosco
		FROM	Encuesta_Kiosco INNER JOIN
				ENCUESTAS_Kiosco ON Encuesta_Kiosco.Id_Kiosco = Kiosco.Id_Kiosco
		WHERe	Id_Encuesta = Id_EncuestaP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaPregunta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaPregunta`(Id_EncuestaP int)
BEGIN
		SELECT	Id_Pregunta, CAST(Id_Tipo_Pregunta as char(5)) as Id_Tipo_Pregunta, No_Pregunta, Texto, 
				Maximo_Respuesta_Texto, Tamano_Letra, Color_Letra, Renglon
		FROM	ENCUESTAS_Encuesta_Pregunta
		WHERE	Id_Encuesta = Id_EncuestaP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaPreguntaOpcion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaPreguntaOpcion`(Id_PreguntaP int)
BEGIN
		SELECT	Id_Pregunta_Opcion, CAST(Id_Imagen as char(5)) as Id_Imagen, Texto, Orden, Valor, No_Pregunta_Salto, Mostrar_Texto
		FROM	ENCUESTAS_Encuesta_Pregunta_Opcion
		WHERE	Id_Pregunta = Id_PreguntaP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaPreguntaOpcionEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaPreguntaOpcionEncuesta`(Id_EncuestaP int)
BEGIN
		SELECT	ENCUESTAS_Encuesta_Pregunta_Opcion.Id_Pregunta, ENCUESTAS_Encuesta_Pregunta_Opcion.Id_Pregunta_Opcion, ENCUESTAS_Encuesta_Pregunta_Opcion.Texto, 
				ENCUESTAS_Encuesta_Pregunta_Opcion.Orden, IFNULL(ENCUESTAS_Imagen.Nombre_Imagen,'') as Nombre_Imagen, ENCUESTAS_Encuesta_Pregunta_Opcion.No_Pregunta_Salto,
				Mostrar_Texto, ENCUESTAS_Encuesta_Pregunta_Opcion.Color_Letra
		FROM    ENCUESTAS_Encuesta_Pregunta_Opcion INNER JOIN
				ENCUESTAS_Encuesta_Pregunta ON ENCUESTAS_Encuesta_Pregunta_Opcion.Id_Pregunta = ENCUESTAS_Encuesta_Pregunta.Id_Pregunta LEFT OUTER JOIN
				ENCUESTAS_Imagen ON ENCUESTAS_Encuesta_Pregunta_Opcion.Id_Imagen = ENCUESTAS_Imagen.Id_Imagen
		WHERE	ENCUESTAS_Encuesta_Pregunta.Id_Encuesta = Id_EncuestaP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaRespuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaRespuesta`(Id_Encuesta int)
BEGIN
	SELECT	ENCUESTAS_Encuesta_Respuesta.Id_Encuesta_Respuesta, ENCUESTAS_Encuesta.Codigo_Encuesta, ENCUESTAS_Kiosco.Codigo_Kiosco, 
			ENCUESTAS_Encuesta_Respuesta.Fecha_Encuesta, ENCUESTAS_Encuesta_Respuesta.Fecha_Sincronizacion
	FROM    ENCUESTAS_Encuesta_Respuesta INNER JOIN
			ENCUESTAS_Encuesta ON ENCUESTAS_Encuesta_Respuesta.Id_Encuesta = ENCUESTAS_Encuesta.Id_Encuesta INNER JOIN
			ENCUESTAS_Kiosco ON ENCUESTAS_Encuesta_Respuesta.Id_Kiosco = ENCUESTAS_Kiosco.Id_Kiosco
	WHERE	ENCUESTAS_Encuesta_Respuesta.Id_Encuesta = Id_Encuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaRespuestaDetalle
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaRespuestaDetalle`(Id_Encuesta_Respuesta int)
BEGIN
		SELECT	ENCUESTAS_Encuesta_Respuesta_Detalle.Id_Encuesta_Respuesta, ENCUESTAS_Encuesta_Pregunta.Texto, ENCUESTAS_Encuesta_Pregunta_Opcion.Texto AS Opcion, 
				ENCUESTAS_Encuesta_Respuesta_Detalle.Respuesta
		FROM    ENCUESTAS_Encuesta_Respuesta_Detalle INNER JOIN
				ENCUESTAS_Encuesta_Pregunta ON ENCUESTAS_Encuesta_Respuesta_Detalle.Id_Pregunta = ENCUESTAS_Encuesta_Pregunta.Id_Pregunta LEFT OUTER JOIN
				ENCUESTAS_Encuesta_Pregunta_Opcion ON ENCUESTAS_Encuesta_Respuesta_Detalle.Id_Pregunta_Opcion = ENCUESTAS_Encuesta_Pregunta_Opcion.Id_Pregunta_Opcion
		WHERE	ENCUESTAS_Encuesta_Respuesta_Detalle.Id_Encuesta_Respuesta = Id_Encuesta_Respuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaRespuestaInformacion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaRespuestaInformacion`(Id_Encuesta_RespuestaP int)
BEGIN
		SELECT	CAST(Id_Informacion as char(5)) as Id_Informacion, Dato
		FROM    ENCUESTAS_Encuesta_Respuesta_Informacion
		WHERE	Id_Encuesta_Respuesta = Id_Encuesta_RespuestaP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoEncuestaSucursal
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoEncuestaSucursal`(Id_Cliente_Sucursal smallint, Fecha datetime)
BEGIN
		SELECT  Encuesta_Kiosco.Id_Encuesta, Encuesta.Codigo_Encuesta, Encuesta.Nombre
		FROM	ENCUESTAS_Encuesta_Kiosco INNER JOIN
				ENCUESTAS_Kiosco ON Encuesta_Kiosco.Id_Kiosco = Kiosco.Id_Kiosco INNER JOIN
				ENCUESTAS_Encuesta ON ENCUESTAS_Encuesta_Kiosco.Id_Encuesta = ENCUESTAS_Encuesta.Id_Encuesta
		WHERe	Id_Cliente_Sucursal = Id_Cliente_Sucursal AND Fecha_Fin >= Fecha AND Encuesta.Fecha_Baja = fncFechaNula();
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoFuente
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoFuente`()
BEGIN
		SELECT	Id_Fuente, Nombre
		FROM	ENCUESTAS_Fuente;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoImagen
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoImagen`()
BEGIN
		SELECT  Id_Imagen, Nombre_Imagen, Descripcion, Imagen
		FROM	ENCUESTAS_Imagen
		WHERE	Fecha_Baja > NOW();
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoImagenEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoImagenEncuesta`(Id_Encuestas int)
BEGIN
		SELECT  DISTINCT ENCUESTAS_Imagen.Id_Imagen, ENCUESTAS_Imagen.Nombre_Imagen
		FROM	ENCUESTAS_Encuesta_Pregunta_Opcion INNER JOIN
				ENCUESTAS_Encuesta_Pregunta ON ENCUESTAS_Encuesta_Pregunta_Opcion.Id_Pregunta = ENCUESTAS_Encuesta_Pregunta.Id_Pregunta INNER JOIN
				ENCUESTAS_Imagen ON ENCUESTAS_Encuesta_Pregunta_Opcion.Id_Imagen = ENCUESTAS_Imagen.Id_Imagen
		WHERE	ENCUESTAS_Encuesta_Pregunta.Id_Encuesta = Id_Encuesta;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoKiosco`()
BEGIN
	SELECT  ENCUESTAS_Kiosco.Id_Kiosco, ENCUESTAS_Cliente.Id_Cliente, ENCUESTAS_Cliente.Razon_Social,
			ENCUESTAS_Kiosco.Codigo_Kiosco, ENCUESTAS_Kiosco.Identificador
	FROM    ENCUESTAS_Kiosco INNER JOIN
			ENCUESTAS_Cliente ON ENCUESTAS_Kiosco.Id_Cliente = ENCUESTAS_Cliente.Id_Cliente 
	WHERE	ENCUESTAS_Kiosco.Fecha_Baja = '9999-12-31';
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoTipoInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoTipoInformacionEncuestado`()
BEGIN
		SELECT	Id_Informacion, Descripcion
		FROM    ENCUESTAS_Tipo_Informacion_Encuestado
		WHERE	Fecha_Baja = fncFechaNula();
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_fncTbl_ListadoTipoPregunta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_fncTbl_ListadoTipoPregunta`()
BEGIN
		SELECT	Id_Tipo_Pregunta, Descripcion
		FROM    ENCUESTAS_Tipo_Pregunta;
END//
DELIMITER ;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Fuente
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Fuente` (
  `Id_Fuente` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`Id_Fuente`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Fuente: ~175 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Fuente`;
/*!40000 ALTER TABLE `ENCUESTAS_Fuente` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Fuente` (`Id_Fuente`, `Nombre`) VALUES
	(1, 'Abel-Regular'),
	(2, 'Abel-Regular'),
	(3, 'Amaranth-Bold'),
	(4, 'Amaranth-BoldItalic'),
	(5, 'Amaranth-Italic'),
	(6, 'Amaranth-Regular'),
	(7, 'Anton-Regular'),
	(8, 'Arimo-Bold'),
	(9, 'Arimo-BoldItalic'),
	(10, 'Arimo-Italic'),
	(11, 'Arimo-Regular'),
	(12, 'Bitter-Bold'),
	(13, 'Bitter-Italic'),
	(14, 'Bitter-Regular'),
	(15, 'Comfortaa-Bold'),
	(16, 'Comfortaa-Light'),
	(17, 'Comfortaa-Regular'),
	(18, 'ContrailOne-Regular'),
	(19, 'Courgette-Regular'),
	(20, 'FrancoisOne-Regular'),
	(21, 'Heebo-Black'),
	(22, 'Heebo-Bold'),
	(23, 'Heebo-ExtraBold'),
	(24, 'Heebo-Light'),
	(25, 'Heebo-Medium'),
	(26, 'Heebo-Regular'),
	(27, 'Heebo-Thin'),
	(28, 'HindSiliguri-Bold'),
	(29, 'HindSiliguri-Light'),
	(30, 'HindSiliguri-Medium'),
	(31, 'HindSiliguri-Regular'),
	(32, 'HindSiliguri-SemiBold'),
	(33, 'JosefinSans-Bold'),
	(34, 'JosefinSans-BoldItalic'),
	(35, 'JosefinSans-Italic'),
	(36, 'JosefinSans-Light'),
	(37, 'JosefinSans-LightItalic'),
	(38, 'JosefinSans-Regular'),
	(39, 'JosefinSans-SemiBold'),
	(40, 'JosefinSans-SemiBoldItalic'),
	(41, 'JosefinSans-Thin'),
	(42, 'JosefinSans-ThinItalic'),
	(43, 'JuliusSansOne-Regular'),
	(44, 'Kreon-Bold'),
	(45, 'Kreon-Light'),
	(46, 'Kreon-Regular'),
	(47, 'Montserrat-Black'),
	(48, 'Montserrat-BlackItalic'),
	(49, 'Montserrat-Bold'),
	(50, 'Montserrat-BoldItalic'),
	(51, 'Montserrat-ExtraBold'),
	(52, 'Montserrat-ExtraBoldItalic'),
	(53, 'Montserrat-ExtraLight'),
	(54, 'Montserrat-ExtraLightItalic'),
	(55, 'Montserrat-Italic'),
	(56, 'Montserrat-Light'),
	(57, 'Montserrat-LightItalic'),
	(58, 'Montserrat-Medium'),
	(59, 'Montserrat-MediumItalic'),
	(60, 'Montserrat-Regular'),
	(61, 'Montserrat-SemiBold'),
	(62, 'Montserrat-SemiBoldItalic'),
	(63, 'Montserrat-Thin'),
	(64, 'Montserrat-ThinItalic'),
	(65, 'Muli-Black'),
	(66, 'Muli-BlackItalic'),
	(67, 'Muli-Bold'),
	(68, 'Muli-BoldItalic'),
	(69, 'Muli-ExtraBold'),
	(70, 'Muli-ExtraBoldItalic'),
	(71, 'Muli-ExtraLight'),
	(72, 'Muli-ExtraLightItalic'),
	(73, 'Muli-Italic'),
	(74, 'Muli-Light'),
	(75, 'Muli-LightItalic'),
	(76, 'Muli-Regular'),
	(77, 'Muli-SemiBold'),
	(78, 'Muli-SemiBoldItalic'),
	(79, 'NunitoSans-Black'),
	(80, 'NunitoSans-BlackItalic'),
	(81, 'NunitoSans-Bold'),
	(82, 'NunitoSans-BoldItalic'),
	(83, 'NunitoSans-ExtraBold'),
	(84, 'NunitoSans-ExtraBoldItalic'),
	(85, 'NunitoSans-ExtraLight'),
	(86, 'NunitoSans-ExtraLightItalic'),
	(87, 'NunitoSans-Italic'),
	(88, 'NunitoSans-Light'),
	(89, 'NunitoSans-LightItalic'),
	(90, 'NunitoSans-Regular'),
	(91, 'NunitoSans-SemiBold'),
	(92, 'NunitoSans-SemiBoldItalic'),
	(93, 'PassionOne-Black'),
	(94, 'PassionOne-Bold'),
	(95, 'PassionOne-Regular'),
	(96, 'PlayfairDisplaySC-Black'),
	(97, 'PlayfairDisplaySC-BlackItalic'),
	(98, 'PlayfairDisplaySC-Bold'),
	(99, 'PlayfairDisplaySC-BoldItalic'),
	(100, 'PlayfairDisplaySC-Italic'),
	(101, 'PlayfairDisplaySC-Regular'),
	(102, 'Poppins-Bold'),
	(103, 'Poppins-Light'),
	(104, 'Poppins-Medium'),
	(105, 'Poppins-Regular'),
	(106, 'Poppins-SemiBold'),
	(107, 'PragatiNarrow-Bold'),
	(108, 'PragatiNarrow-Regular'),
	(109, 'Quicksand-Bold'),
	(110, 'Quicksand-Light'),
	(111, 'Quicksand-Medium'),
	(112, 'Quicksand-Regular'),
	(113, 'Roboto-Black'),
	(114, 'Roboto-BlackItalic'),
	(115, 'Roboto-Bold'),
	(116, 'Roboto-BoldItalic'),
	(117, 'Roboto-Italic'),
	(118, 'Roboto-Light'),
	(119, 'Roboto-LightItalic'),
	(120, 'Roboto-Medium'),
	(121, 'Roboto-MediumItalic'),
	(122, 'Roboto-Regular'),
	(123, 'Roboto-Thin'),
	(124, 'Roboto-ThinItalic'),
	(125, 'RobotoMono-Bold'),
	(126, 'RobotoMono-BoldItalic'),
	(127, 'RobotoMono-Italic'),
	(128, 'RobotoMono-Light'),
	(129, 'RobotoMono-LightItalic'),
	(130, 'RobotoMono-Medium'),
	(131, 'RobotoMono-MediumItalic'),
	(132, 'RobotoMono-Regular'),
	(133, 'RobotoMono-Thin'),
	(134, 'RobotoMono-ThinItalic'),
	(135, 'RobotoSlab-Bold'),
	(136, 'RobotoSlab-Light'),
	(137, 'RobotoSlab-Regular'),
	(138, 'RobotoSlab-Thin'),
	(139, 'Rubik-Black'),
	(140, 'Rubik-BlackItalic'),
	(141, 'Rubik-Bold'),
	(142, 'Rubik-BoldItalic'),
	(143, 'Rubik-Italic'),
	(144, 'Rubik-Light'),
	(145, 'Rubik-LightItalic'),
	(146, 'Rubik-Medium'),
	(147, 'Rubik-MediumItalic'),
	(148, 'Rubik-Regular'),
	(149, 'Satisfy-Regular'),
	(150, 'SourceSansPro-Black'),
	(151, 'SourceSansPro-BlackItalic'),
	(152, 'SourceSansPro-Bold'),
	(153, 'SourceSansPro-BoldItalic'),
	(154, 'SourceSansPro-ExtraLight'),
	(155, 'SourceSansPro-ExtraLightItalic'),
	(156, 'SourceSansPro-Italic'),
	(157, 'SourceSansPro-Light'),
	(158, 'SourceSansPro-LightItalic'),
	(159, 'SourceSansPro-Regular'),
	(160, 'SourceSansPro-Semibold'),
	(161, 'SourceSansPro-SemiboldItalic'),
	(162, 'Teko-Bold'),
	(163, 'Teko-Light'),
	(164, 'Teko-Medium'),
	(165, 'Teko-Regular'),
	(166, 'Teko-SemiBold'),
	(167, 'VarelaRound-Regular'),
	(168, 'Vollkorn-Bold'),
	(169, 'Vollkorn-BoldItalic'),
	(170, 'Vollkorn-Italic'),
	(171, 'Vollkorn-Regular'),
	(172, 'YanoneKaffeesatz-Bold'),
	(173, 'YanoneKaffeesatz-ExtraLight'),
	(174, 'YanoneKaffeesatz-Light'),
	(175, 'YanoneKaffeesatz-Regular');
/*!40000 ALTER TABLE `ENCUESTAS_Fuente` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Imagen
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Imagen` (
  `Id_Imagen` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nombre_Imagen` varchar(100) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Fecha_Alta` datetime DEFAULT NULL,
  `Fecha_Baja` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Imagen: ~43 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Imagen`;
/*!40000 ALTER TABLE `ENCUESTAS_Imagen` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Imagen` (`Id_Imagen`, `Nombre_Imagen`, `Imagen`, `Descripcion`, `Fecha_Alta`, `Fecha_Baja`) VALUES
	(1, 'Pruebas', '/tmp/phpB53dAB', 'pruebas', '2018-07-17 20:38:04', '9999-12-31 00:00:00'),
	(2, 'Ks_logo.png', '/tmp/phpXRhN7t', 'pruebas', '2018-07-17 20:40:23', '2018-07-24 18:33:23'),
	(3, 'Ks_logo.png', '/tmp/phpSQM12m', 'prueba foto', '2018-07-18 15:34:19', '2018-07-24 18:36:41'),
	(4, 'Avatar1.JPG', '/tmp/phpXwlX3y', 'avatar ana', '2018-07-18 16:02:23', '2018-07-24 18:25:07'),
	(5, 'Avatar1.JPG', '/tmp/phpnfc8up', 'avatar1', '2018-07-18 16:04:12', '2018-07-24 19:37:19'),
	(6, 'Capture.JPG', '/tmp/php187QDx', 'capture', '2018-07-18 16:22:17', '2018-07-24 18:56:34'),
	(7, 'Codigo ASCII.JPG', '/tmp/phpkuWohj', 'prueba ', '2018-07-18 16:27:51', '2018-07-25 00:16:56'),
	(8, 'Capture.JPG', '/tmp/phpbM9Ydu', 'prueba', '2018-07-18 16:41:40', '2018-07-24 22:30:46'),
	(9, 'Ks_logo.png', '/tmp/phpIergbD', 'logo ks', '2018-07-24 17:28:30', '2018-07-25 00:00:00'),
	(10, 'Ks_logo.png', '/tmp/phpyrkaBC', 'pruebas', '2018-07-24 18:00:42', '2018-07-24 22:30:36'),
	(11, 'Ks_logo.png', '/tmp/phpov4xyL', 'Ks_Logo', '2018-07-24 18:31:06', '2018-07-24 22:30:41'),
	(12, 'Ks_logo.png', '/tmp/phpvX8Fao', 'Ks_logo', '2018-07-24 19:08:50', '2018-07-25 00:00:00'),
	(13, '', '13', 'modificacion', '2018-07-24 20:28:20', '2018-07-25 00:00:00'),
	(14, '', '14', 'Girasoles', '2018-07-24 20:51:02', '2018-07-25 00:00:00'),
	(15, '', '', '', '2018-07-24 20:51:20', '2018-07-25 00:00:00'),
	(16, 'Capture.JPG', '/tmp/php6IGRtl', 'Betty, my BEFFA', '2018-07-24 20:54:29', '2018-07-25 00:00:00'),
	(17, 'Capture.JPG', '/tmp/phpzK5q1F', 'Prueba', '2018-07-24 20:57:01', '2018-07-25 00:00:00'),
	(18, 'Capture.JPG', '/tmp/phpLt9Jdh', 'I miss you!!!', '2018-07-24 21:02:02', '9999-12-31 00:00:00'),
	(19, '', '19', 'Betty prueba edicion', '2018-07-24 21:03:06', '2018-07-25 11:58:58'),
	(20, 'Avatar1.JPG', '/img/encuestas/Avatar1.JPG', 'Anita', '2018-07-24 22:07:48', '2018-07-25 18:36:29'),
	(21, 'bitmoji-20180312113144.png', '/img/encuestas/bitmoji-20180312113144.png', 'pepe', '2018-07-24 22:32:30', '9999-12-31 00:00:00'),
	(22, 'bitmoji-20180312113144.png', '/img/encuestas/bitmoji-20180312113144.png', 'Prueba doble', '2018-07-25 09:49:06', '2018-07-25 18:38:57'),
	(23, 'Capture.JPG', '/img/encuestas/Capture.JPG', 'Hois', '2018-07-25 11:53:47', '2018-07-25 18:45:33'),
	(24, 'Ks_logo.png', '/img/encuestas/ks_logo.png', 'ks 3', '2018-07-25 12:13:39', '9999-12-31 00:00:00'),
	(25, '', '/img/encuestas/', 'ks 22', '2018-07-25 12:25:07', '2018-07-25 15:30:06'),
	(26, 'Ks_logo.png', '/img/encuestas/Ks_logo.png', 'ks 15', '2018-07-25 13:17:55', '2018-07-25 18:06:35'),
	(27, 'Ks_logo.png', '/img/encuestas/Ks_logo.png', 'yeiiiiiii', '2018-07-25 15:19:48', '2018-07-25 18:55:11'),
	(28, 'Zwinny-Logo-Final.jpg', '/img/encuestas/Zwinny-Logo-Final.jpg', 'Zwinny Editar ok', '2018-07-25 15:38:02', '9999-12-31 00:00:00'),
	(29, 'sunflowers-wallpaper-HD3.jpg', '/img/encuestas/sunflowers-wallpaper-HD3.jpg', 'prueba girasoles', '2018-07-25 15:48:11', '2018-07-25 18:55:16'),
	(30, 'WhatsApp Image 2018-04-20 at 3.46.58 PM.jpeg', '/img/encuestas/WhatsApp Image 2018-04-20 at 3.46.58 PM.jpeg', 'cholitos Barrio', '2018-07-25 15:54:17', '2018-07-25 18:54:42'),
	(31, 'white-smiley-face-png-5.png', '/img/encuestas/white-smiley-face-png-5.png', 'Pruebas edicion', '2018-07-26 20:36:56', '2018-07-26 20:39:47'),
	(32, 'juegos-bloques-751x300.jpg', '/img/encuestas/juegos-bloques-751x300.jpg', 'bloques', '2018-07-26 20:47:51', '2018-07-26 21:05:33'),
	(33, 'NUBES (33).png', '/img/encuestas/NUBES (33).png', 'Nubes', '2018-07-26 20:48:06', '9999-12-31 00:00:00'),
	(34, 'favicon.ico', '/img/encuestas/favicon.ico', 'zwinny logo', '2018-07-26 20:53:03', '9999-12-31 00:00:00'),
	(35, 'nube_png_by_diieguiitoh-d4vhyzb.png', '/img/encuestas/nube_png_by_diieguiitoh-d4vhyzb.png', 'otra nube', '2018-07-26 20:59:44', '9999-12-31 00:00:00'),
	(36, 'ac-16.png', '/img/encuestas/ac-16.png', 'nube 20', '2018-07-26 21:03:06', '9999-12-31 00:00:00'),
	(37, 'white-smiley-face-png-5.png', '/img/encuestas/white-smiley-face-png-5.png', 'caritas', '2018-07-26 21:05:55', '9999-12-31 00:00:00'),
	(38, 'Mickey_Mouse.gif', '/img/encuestas/Mickey_Mouse.gif', 'Mickey', '2018-07-26 21:08:07', '9999-12-31 00:00:00'),
	(39, 'KS-Sistemas-Ana-SW-2.jpg', '/img/encuestas/KS-Sistemas-Ana-SW-2.jpg', 'chuyito', '2018-07-26 21:21:06', '9999-12-31 00:00:00'),
	(40, 'IMG_13032018_184658_0.png', '/img/encuestas/IMG_13032018_184658_0.png', 'asddf', '2018-07-26 21:22:13', '9999-12-31 00:00:00'),
	(41, '', 'pruebas', 'pruebasss', '2018-07-27 14:24:09', '9999-12-31 00:00:00'),
	(42, 'firma-ana.png', '/img/encuestas/firma-ana.png', 'firma ana ks', '2018-07-31 13:59:30', '2018-07-31 14:18:58'),
	(43, 'images.jpg', '/img/encuestas/images.jpg', 'plumas', '2018-07-31 14:18:20', '2018-07-31 14:18:29');
/*!40000 ALTER TABLE `ENCUESTAS_Imagen` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Kiosco
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Kiosco` (
  `Id_Kiosco` smallint(6) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` smallint(6) NOT NULL,
  `Id_Cliente_Sucursal` smallint(6) DEFAULT NULL,
  `Id_Zona` smallint(6) DEFAULT NULL,
  `Codigo_Kiosco` varchar(20) NOT NULL,
  `Identificador` varchar(50) DEFAULT NULL,
  `Hora_Arranque` time DEFAULT NULL,
  `Hora_Cierre` time DEFAULT NULL,
  `Fecha_Alta` datetime DEFAULT NULL,
  `Fecha_Baja` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Kiosco`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Kiosco: ~34 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Kiosco`;
/*!40000 ALTER TABLE `ENCUESTAS_Kiosco` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Kiosco` (`Id_Kiosco`, `Id_Cliente`, `Id_Cliente_Sucursal`, `Id_Zona`, `Codigo_Kiosco`, `Identificador`, `Hora_Arranque`, `Hora_Cierre`, `Fecha_Alta`, `Fecha_Baja`) VALUES
	(1, 2, 1, 1, '0308', '77:77:77:77:77:77', '01:00:00', '00:00:00', '2018-07-19 17:24:07', '2018-07-30 14:22:32'),
	(2, 1, 1, 1, '0001', NULL, '07:00:00', '19:00:00', '2018-07-19 17:24:44', '2018-07-30 14:35:30'),
	(3, 1, 1, 1, '3314', '00:00:00:00:00', '10:00:00', '15:00:00', '2018-07-19 17:26:09', '9999-12-31 00:00:00'),
	(4, 1, 1, 1, '0001', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 17:26:59', '2018-07-20 16:55:54'),
	(5, 1, 1, 1, '0001', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 17:27:18', '9999-12-31 00:00:00'),
	(6, 1, 1, 1, '0001', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 17:44:13', '9999-12-31 00:00:00'),
	(7, 0, 1, 1, '0002', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 18:00:50', '9999-12-31 00:00:00'),
	(8, 0, 1, 1, '0002', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 19:28:02', '9999-12-31 00:00:00'),
	(9, 0, 1, 1, '0002', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 19:29:33', '9999-12-31 00:00:00'),
	(10, 9, 1, 1, '0002', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 19:37:13', '2018-07-27 19:27:14'),
	(11, 1, 1, 1, '1', '0002', '07:00:00', '07:00:01', '2018-07-19 20:33:17', '9999-12-31 00:00:00'),
	(12, 8, 1, 1, '0051', 'F0:E1:D2:C3:B4:A5', '00:00:14', '00:00:15', '2018-07-19 20:42:08', '9999-12-31 00:00:00'),
	(13, 9, 1, 1, '0004', 'F0:E1:D2:C3:B4:A5', '00:00:07', '00:00:19', '2018-07-19 20:46:11', '2018-07-27 19:36:17'),
	(14, 9, 1, 1, '0017', 'F0:E1:D2:C3:B4:A5', '07:00:00', '00:00:19', '2018-07-19 20:51:29', '2018-08-06 19:12:24'),
	(15, 7, 1, 1, '1111', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-19 20:54:33', '9999-12-31 00:00:00'),
	(16, 13, 1, 1, '0000', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-26 22:40:31', '2018-07-27 19:33:32'),
	(17, 15, 1, 1, '2222', 'F0:E1:D2:C3:B4:A5', '07:00:00', '19:00:00', '2018-07-27 19:38:04', '9999-12-31 00:00:00'),
	(18, 1, 1, 1, '3314', '00:00:00:00:00', '10:00:00', '15:00:00', '2018-07-30 14:48:48', '9999-12-31 00:00:00'),
	(19, 9, 1, 1, '0101', '00:00:00:00:00:00', '07:00:00', '19:00:00', '2018-07-30 16:29:56', '2018-07-30 19:22:28'),
	(20, 9, 1, 1, '0202', '11:11:11:11:11:11', '07:00:00', '19:00:00', '2018-07-30 16:32:53', '2018-07-30 19:21:24'),
	(21, 12, 1, 1, '3030', '33:33:33:33:33:33', '07:00:00', '19:00:00', '2018-07-30 16:35:14', '9999-12-31 00:00:00'),
	(22, 12, 1, 1, '0102', '11:11:11:11:11:11', '10:00:00', '19:00:00', '2018-07-30 17:31:22', '2018-07-30 18:58:47'),
	(23, 13, 1, 1, '4410', '11:11:11:11:11:11', '10:00:00', '19:00:00', '2018-07-30 19:15:13', '9999-12-31 00:00:00'),
	(24, 9, 1, 1, '6666', '00:00:00:00:00:00', '04:00:00', '23:00:00', '2018-07-31 18:38:47', '2018-08-06 19:50:02'),
	(25, 12, 1, 1, '0202', '45:45:45:45:45:45', '10:00:00', '19:00:00', '2018-08-01 10:17:29', '9999-12-31 00:00:00'),
	(26, 9, 1, 1, '8802', '00:00:00:00:00:00', '13:00:00', '19:00:00', '2018-08-06 19:14:21', '2018-08-08 15:50:41'),
	(27, 22, 1, 1, '9977', '33:33:33:33:33:33', '07:00:00', '19:00:00', '2018-08-06 19:19:03', '9999-12-31 00:00:00'),
	(28, 22, 1, 1, '7766', '11:11:11:11:11:11', '10:00:00', '19:00:00', '2018-08-06 19:26:27', '2018-08-08 16:21:03'),
	(29, 9, 1, 1, '6658', 'F0:E1:D2:C3:B4:A5', '10:00:00', '19:00:00', '2018-08-07 22:30:56', '9999-12-31 00:00:00'),
	(30, 22, 1, 1, '3344', '00:00:00:00:00:00', '07:00:00', '19:00:00', '2018-08-07 22:47:57', '2018-08-08 16:22:42'),
	(31, 9, 1, 1, '4411', '33:33:33:33:33:33', '05:00:00', '19:00:00', '2018-08-07 23:03:24', '9999-12-31 00:00:00'),
	(32, 12, 1, 1, '3300', '00:00:00:00:00:00', '10:00:00', '19:00:00', '2018-08-07 23:04:05', '9999-12-31 00:00:00'),
	(33, 9, 1, 1, '7777', '11:11:11:11:11:11', '10:00:00', '19:00:00', '2018-08-07 23:04:50', '9999-12-31 00:00:00'),
	(34, 9, 1, 1, '5858', '11:11:11:11:11:11', '04:00:00', '19:00:00', '2018-08-08 14:23:20', '2018-08-08 16:31:11');
/*!40000 ALTER TABLE `ENCUESTAS_Kiosco` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Kiosco_Sincronizacion
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Kiosco_Sincronizacion` (
  `Identificador` varchar(50) NOT NULL,
  `Ultima_Sincronizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Kiosco_Sincronizacion: ~35 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Kiosco_Sincronizacion`;
/*!40000 ALTER TABLE `ENCUESTAS_Kiosco_Sincronizacion` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Kiosco_Sincronizacion` (`Identificador`, `Ultima_Sincronizacion`) VALUES
	('F0:E1:D2:C3:B4:A5', '2018-07-19 17:26:09'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 17:26:59'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 17:27:18'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 17:44:13'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 18:00:50'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 19:28:02'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 19:29:33'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 19:37:13'),
	('0002', '2018-07-19 20:33:17'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 20:42:08'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 20:46:11'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 20:51:29'),
	('F0:E1:D2:C3:B4:A5', '2018-07-19 20:54:33'),
	('F0:E1:D2:C3:B4:A5', '2018-07-26 22:40:31'),
	('F0:E1:D2:C3:B4:A5', '2018-07-27 19:38:04'),
	('00:00:00:00:00', '2018-07-30 14:48:48'),
	('00:00:00:00:00:00', '2018-07-30 16:29:56'),
	('11:11:11:11:11:11', '2018-07-30 16:32:53'),
	('33:33:33:33:33:33', '2018-07-30 16:35:14'),
	('11:11:11:11:11:11', '2018-07-30 17:31:22'),
	('11:11:11:11:11:11', '2018-07-30 19:15:13'),
	('77:77:77:77:77:77', NULL),
	('00:00:00:00:00:00', '2018-07-31 18:38:47'),
	('00:00:00:00:00:00', NULL),
	('45:45:45:45:45:45', '2018-08-01 10:17:29'),
	('45:45:45:45:45:45', NULL),
	('00:00:00:00:00:00', '2018-08-06 19:14:21'),
	('33:33:33:33:33:33', '2018-08-06 19:19:03'),
	('11:11:11:11:11:11', '2018-08-06 19:26:27'),
	('F0:E1:D2:C3:B4:A5', '2018-08-07 22:30:56'),
	('00:00:00:00:00:00', '2018-08-07 22:47:57'),
	('33:33:33:33:33:33', '2018-08-07 23:03:24'),
	('00:00:00:00:00:00', '2018-08-07 23:04:05'),
	('11:11:11:11:11:11', '2018-08-07 23:04:50'),
	('11:11:11:11:11:11', '2018-08-08 14:23:20');
/*!40000 ALTER TABLE `ENCUESTAS_Kiosco_Sincronizacion` ENABLE KEYS */;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_ListadoKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_ListadoKiosco`()
BEGIN
	SELECT  ENCUESTAS_Kiosco.Id_Kiosco, ENCUESTAS_Cliente.Codigo_Cliente, ENCUESTAS_Cliente.Razon_Social,
			ENCUESTAS_Kiosco.Codigo_Kiosco, ENCUESTAS_Kiosco.Identificador
	FROM    ENCUESTAS_Kiosco INNER JOIN
			ENCUESTAS_Cliente ON ENCUESTAS_Kiosco.Id_Cliente = ENCUESTAS_Cliente.Id_Cliente 
	WHERE	ENCUESTAS_Kiosco.Fecha_Baja = '9999-12-31';
END//
DELIMITER ;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Tipo_Informacion_Encuestado
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Tipo_Informacion_Encuestado` (
  `Id_Informacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `Fecha_Alta` datetime DEFAULT NULL,
  `Fecha_Baja` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Informacion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Tipo_Informacion_Encuestado: ~8 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Tipo_Informacion_Encuestado`;
/*!40000 ALTER TABLE `ENCUESTAS_Tipo_Informacion_Encuestado` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Tipo_Informacion_Encuestado` (`Id_Informacion`, `Descripcion`, `Fecha_Alta`, `Fecha_Baja`) VALUES
	(1, 'NOMBRE', '2018-07-09 00:00:00', '9999-12-31 00:00:00'),
	(2, 'CORREO', '2018-07-09 00:00:00', '9999-12-31 00:00:00'),
	(3, 'EDAD', '2018-07-09 00:00:00', '9999-12-31 00:00:00'),
	(4, 'ESTADO CIVIL', '2018-07-09 00:00:00', '9999-12-31 00:00:00'),
	(5, 'COLONIA RESIDENCIA', '2018-07-09 00:00:00', '9999-12-31 00:00:00'),
	(6, 'GENÉRO', '2018-07-09 00:00:00', '9999-12-31 00:00:00'),
	(7, 'NIVEL ESTUDIOS', '2018-07-09 00:00:00', '9999-12-31 00:00:00'),
	(8, 'MOTIVO VISITA', '2018-07-09 00:00:00', '9999-12-31 00:00:00');
/*!40000 ALTER TABLE `ENCUESTAS_Tipo_Informacion_Encuestado` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Tipo_Informacion_Encuestado_Opcion
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Tipo_Informacion_Encuestado_Opcion` (
  `Id_Informacion` tinyint(4) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Valor` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Tipo_Informacion_Encuestado_Opcion: ~0 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Tipo_Informacion_Encuestado_Opcion`;
/*!40000 ALTER TABLE `ENCUESTAS_Tipo_Informacion_Encuestado_Opcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ENCUESTAS_Tipo_Informacion_Encuestado_Opcion` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Tipo_Pregunta
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Tipo_Pregunta` (
  `Id_Tipo_Pregunta` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Tipo_Pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Tipo_Pregunta: ~2 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Tipo_Pregunta`;
/*!40000 ALTER TABLE `ENCUESTAS_Tipo_Pregunta` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Tipo_Pregunta` (`Id_Tipo_Pregunta`, `Descripcion`) VALUES
	(1, 'ABIERTA'),
	(2, 'CERRADA');
/*!40000 ALTER TABLE `ENCUESTAS_Tipo_Pregunta` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.ENCUESTAS_Ubicacion_Kiosco
CREATE TABLE IF NOT EXISTS `ENCUESTAS_Ubicacion_Kiosco` (
  `Id_Ubicacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `Id_Kiosco` smallint(6) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL,
  `Direccion` text,
  `Fecha_Alta` datetime NOT NULL,
  `Fecha_Baja` datetime NOT NULL,
  PRIMARY KEY (`Id_Ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla zwinny_1.ENCUESTAS_Ubicacion_Kiosco: ~33 rows (aproximadamente)
DELETE FROM `ENCUESTAS_Ubicacion_Kiosco`;
/*!40000 ALTER TABLE `ENCUESTAS_Ubicacion_Kiosco` DISABLE KEYS */;
INSERT INTO `ENCUESTAS_Ubicacion_Kiosco` (`Id_Ubicacion`, `Id_Kiosco`, `Ubicacion`, `Direccion`, `Fecha_Alta`, `Fecha_Baja`) VALUES
	(1, 5, 'prueba', 'prueba', '2018-07-19 17:27:18', '9999-12-31 00:00:00'),
	(2, 6, 'prueba', 'prueba', '2018-07-19 17:44:13', '9999-12-31 00:00:00'),
	(3, 7, 'prueba', 'prueba', '2018-07-19 18:00:50', '9999-12-31 00:00:00'),
	(4, 8, 'prueba', 'prueba', '2018-07-19 19:28:02', '9999-12-31 00:00:00'),
	(5, 9, 'prueba', 'prueba', '2018-07-19 19:29:33', '9999-12-31 00:00:00'),
	(6, 10, 'prueba', 'prueba', '2018-07-19 19:37:13', '9999-12-31 00:00:00'),
	(7, 11, '19:00:01', 'sabe', '2018-07-19 20:33:17', '9999-12-31 00:00:00'),
	(8, 12, '', 'prueba', '2018-07-19 20:42:08', '9999-12-31 00:00:00'),
	(9, 13, '', 'prueba', '2018-07-19 20:46:11', '9999-12-31 00:00:00'),
	(10, 14, '', 'prueba', '2018-07-19 20:51:29', '9999-12-31 00:00:00'),
	(11, 15, '', 'prueba', '2018-07-19 20:54:33', '9999-12-31 00:00:00'),
	(12, 16, '', 'prueba', '2018-07-26 22:40:31', '9999-12-31 00:00:00'),
	(13, 17, '', 'prueba', '2018-07-27 19:38:04', '9999-12-31 00:00:00'),
	(14, 18, 'pruebas', 'pruebas', '2018-07-30 14:48:48', '9999-12-31 00:00:00'),
	(16, 3, 'PRUEBAS', 'PRUEBASSSS', '2018-07-30 14:57:20', '9999-12-31 00:00:00'),
	(17, 3, 'pruebas', 'pruebas', '2018-07-30 15:59:53', '9999-12-31 00:00:00'),
	(18, 19, '', 'prueba', '2018-07-30 16:29:56', '9999-12-31 00:00:00'),
	(19, 20, '', 'pruebas ', '2018-07-30 16:32:53', '9999-12-31 00:00:00'),
	(20, 21, '', 'tresss', '2018-07-30 16:35:14', '9999-12-31 00:00:00'),
	(21, 22, '', 'pruebas ', '2018-07-30 17:31:22', '9999-12-31 00:00:00'),
	(23, 23, 'prueba edit', 'prueba edit', '2018-07-30 19:15:13', '9999-12-31 00:00:00'),
	(25, 1, 'pruebis', 'pruebis', '2018-07-31 18:21:20', '9999-12-31 00:00:00'),
	(26, 24, 'prueba edit', 'prueba edit', '2018-07-31 18:38:47', '9999-12-31 00:00:00'),
	(28, 25, 'Nuevo domicilio', 'Nuevo domicilio', '2018-08-01 10:17:29', '9999-12-31 00:00:00'),
	(30, 26, 'ochenta y ocho', 'ochenta y ocho', '2018-08-06 19:14:21', '9999-12-31 00:00:00'),
	(31, 27, 'noventa y nueve', 'noventa y nueve', '2018-08-06 19:19:03', '9999-12-31 00:00:00'),
	(32, 28, 'holisss', 'holisss', '2018-08-06 19:26:27', '9999-12-31 00:00:00'),
	(33, 29, 'holisss', 'holisss', '2018-08-07 22:30:56', '9999-12-31 00:00:00'),
	(34, 30, 'pruebas ', 'pruebas ', '2018-08-07 22:47:57', '9999-12-31 00:00:00'),
	(35, 31, 'gdl', 'gdl', '2018-08-07 23:03:24', '9999-12-31 00:00:00'),
	(36, 32, 'gdl', 'gdl', '2018-08-07 23:04:05', '9999-12-31 00:00:00'),
	(37, 33, 'pruebasss', 'pruebasss', '2018-08-07 23:04:50', '9999-12-31 00:00:00'),
	(38, 34, 'guadalajara, jalisco', 'guadalajara, jalisco', '2018-08-08 14:23:20', '9999-12-31 00:00:00');
/*!40000 ALTER TABLE `ENCUESTAS_Ubicacion_Kiosco` ENABLE KEYS */;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarCliente
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarCliente`(IN Id_ClienteP  int,
IN Razon_SocialP  varchar(100),
IN RFCP  varchar(15),IN CorreoP varchar(50),IN EstatusP  tinyint,
OUT EjecucionValida bit,
OUT MensajeValidacion varchar(250))
BEGIN
		DECLARE Repetido smallint DEFAULT 0;
	IF (RFCP <> '') THEN
    
		SET Repetido = (SELECT COUNT(*) 
		FROM	ENCUESTAS_Cliente 
		WHERE	RFC = RFCP AND Fecha_Baja = '9999-12-31' AND Id_Cliente <> Id_ClienteP);
	
		IF (Repetido > 0) THEN
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'El RFC del Cliente ya se encuentra registrado, no puede duplicar información.';
		END IF;
        
	END IF;
	IF Repetido = 0 THEN
		 UPDATE ENCUESTAS_Cliente SET Razon_Social=Razon_SocialP,RFC=RFCP,Correo=CorreoP,Estatus=EstatusP
		 WHERE Id_Cliente=Id_ClienteP;
			IF ROW_COUNT() > 0 THEN
				SET EjecucionValida = 1;
				SET MensajeValidacion = 'El Cliente fue actualizado satisfactoriamente.';
			ELSE
				SET EjecucionValida = 0;
				SET MensajeValidacion = 'La información del cliente no se pudo actualizar.';
			END IF;
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarEncuesta`(IN Id_EncuestaP int,IN Id_ClienteP smallint,IN Codigo_EncuestaP varchar(20),IN NombreP varchar(100),IN Fecha_InicioP  date,IN Fecha_FinP  date,IN Texto_BienvenidaP varchar(250),IN Texto_DespedidaP varchar(250),IN Tiempo_SincronizacionP time,IN Fondo_EncuestaP varchar(250),IN Imagen_Fondo_EncuestaP varchar(100),IN Fondo_SplashP varchar(250),IN Imagen_Fondo_SplashP varchar(100),IN Fondo_FinP varchar(250),IN Imagen_Fondo_FinP varchar(100),IN Tamano_LetraP tinyint,IN FuenteP varchar(150),IN UrlP varchar(250), IN EstatusP tinyint,OUT EjecucionValida bit,OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_EncuestaP > 0 THEN
		 UPDATE ENCUESTAS_Encuesta SET Id_Cliente=Id_ClienteP,Codigo_Encuesta=Codigo_EncuestaP,Nombre=NombreP, 
				Tiempo_Sincronizacion=Tiempo_SincronizacionP,Fondo_Encuesta=Fondo_EncuestaP,
				Imagen_Fondo_Encuesta=Imagen_Fondo_EncuestaP,Fondo_Splash=Fondo_SplashP,Imagen_Fondo_Splash=Imagen_Fondo_SplashP,
				Fecha_Inicio=Fecha_InicioP,Fecha_Fin=Fecha_FinP,
				Texto_Bienvenida=Texto_BienvenidaP,Texto_Despedida=Texto_DespedidaP,Estatus=EstatusP, Tamano_Letra=Tamano_LetraP, 
				Fuente=FuenteP, Url= UrlP,
				Fondo_Fin=Fondo_FinP, Imagen_Fondo_Fin=Imagen_Fondo_FinP
		 WHERE	Id_Encuesta=Id_Encuesta;
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'La encuesta se actualizo satisfactoriamente';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'La encuesta no se pudo actualizar';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo actualizar la encuesta, el Id_Encuesta no es valido';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarEncuestaPregunta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarEncuestaPregunta`(IN Id_PreguntaP  int,
     IN Id_EncuestaP  int,
     IN Id_Tipo_PreguntaP  tinyint,
     IN TextoP  varchar(250),
     IN Maximo_Respuesta_TextoP  decimal(6,0),
     IN Tamano_LetraP tinyint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 UPDATE ENCUESTAS_Encuesta_Pregunta SET Id_Tipo_Pregunta=Id_Tipo_PreguntaP,Texto=TextoP,
			Maximo_Respuesta_Texto=Maximo_Respuesta_TextoP,Tamano_Letra=Tamano_LetraP
		 WHERE Id_Pregunta=Id_PreguntaP AND Id_Encuesta = Id_EncuestaP;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'La pregunta de la encuesta se actualizo correctamente';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'La pregunta de la encuesta no se pudo actualizar';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarEncuestaPreguntaOpcion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarEncuestaPreguntaOpcion`(IN Id_Pregunta_OpcionP  int, IN Id_PreguntaP  int,
 IN Id_ImagenP  smallint, IN TextoP  nvarchar(50),
 IN OrdenP  tinyint, IN ValorP  decimal(8,2), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 UPDATE ENCUESTAS_Encuesta_Pregunta_Opcion SET Id_Imagen=Id_ImagenP,Texto=TextoP,Orden=OrdenP,Valor=ValorP
		 WHERE Id_Pregunta_Opcion=Id_Pregunta_OpcionP AND Id_Pregunta = Id_PreguntaP;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'La opcion de la pregunta se actualizo correctamente';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'La opcion de la pregunta no se pudo actualizar';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarEstatusKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarEstatusKiosco`(IN IdentificadorP varchar(50), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
			 UPDATE ENCUESTAS_iosco_Sincronizacion SET Ultima_Sincronizacion = NOW()
			 WHERE	Identificador = IdentificadorP;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se actualizo el estatus de la encuesta';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo actualizar el estatus de la encuesta';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarImagen
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarImagen`(IN Id_ImagenP  smallint,
     IN Nombre_ImagenP  varchar(100),
     IN ImagenP  varchar(100),
     IN DescripcionP  varchar(150), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_ImagenP > 0 THEN
		 UPDATE	ENCUESTAS_Imagen SET Nombre_Imagen=Nombre_ImagenP,Imagen=ImagenP,Descripcion=DescripcionP
		 WHERE	Id_Imagen = Id_ImagenP;
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se actualizo correctamente la imagen';
		ELSE
			SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo actualizar la imagen';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'El id no es valido';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarKiosco`(IN Id_KioscoP  smallint, IN Id_ClienteP  smallint, IN Id_Cliente_SucursalP  smallint, IN Id_ZonaP smallint, IN Codigo_KioscoP  varchar(20), IN IdentificadorP varchar(50), IN Hora_ArranqueP time, IN Hora_CierreP time,
 IN UbicacionP varchar(50), IN DireccionP text, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
DECLARE Contador tinyint DEFAULT 0;
DECLARE ContUbi tinyint DEFAULT 0;

	SELECT Contador = COUNT(*) FROM ENCUESTAS_Kiosco_Sincronizacion WHERE Identificador=IdentificadorP;
	SELECT ContUbi = COUNT(*) FROM ENCUESTAS_Ubicacion_Kiosco WHERE Id_Kiosco=Id_KioscoP; 
    
		 UPDATE ENCUESTAS_Kiosco SET Id_Cliente=Id_ClienteP,Id_Cliente_Sucursal=Id_Cliente_SucursalP,Id_Zona=Id_ZonaP,Codigo_Kiosco=Codigo_KioscoP,Identificador=IdentificadorP,Hora_Arranque=Hora_ArranqueP,Hora_Cierre=Hora_CierreP
		 WHERE Id_Kiosco=Id_KioscoP;
         
         IF Contador = 0 THEN
				 INSERT INTO ENCUESTAS_Kiosco_Sincronizacion (Identificador, Ultima_Sincronizacion)
				 VALUES (IdentificadorP, NULL);
		END IF;
                 
		IF ContUbi > 0 THEN        
				UPDATE ENCUESTAS_Ubicacion_Kiosco SET Ubicacion=UbicacionP,Direccion=DireccionP
				WHERE Id_Kiosco=Id_KioscoP;                
		ELSE        
				INSERT INTO ENCUESTAS_Ubicacion_Kiosco (Id_Kiosco, Ubicacion, Direccion, Fecha_Alta, Fecha_Baja)
				VALUES (Id_KioscoP, UbicacionP, DireccionP, NOW(), '9999-12-31');                 
		END IF;
        
        IF ROW_COUNT() > 0 THEN
				SET EjecucionValida = 1;
				SET MensajeValidacion = 'El Kiosco fue actualizado satisfactoriamente.';
		ELSE
				SET EjecucionValida = 0;
				SET MensajeValidacion = 'La información del kiosco no se pudo actualizar.';
		END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_ActualizarTipoInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_ActualizarTipoInformacionEncuestado`(IN Id_InformacionP  tinyint,
 IN DescripcionP  varchar(50), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_InformacionP > 0 THEN
		 UPDATE ENCUESTAS_Tipo_Informacion_Encuestado SET Descripcion=DescripcionP
		 WHERE Id_Informacion=Id_InformacionP;
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se actualizo correctamente el tipo informacion encuestado';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo actualizar el tipo informacion encuestado';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'Id no valido';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_BajaCliente
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_BajaCliente`(IN Id_ClienteP int, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	 UPDATE ENCUESTAS_Cliente SET Fecha_Baja=NOW(), Estatus=0 WHERE Id_Cliente=Id_ClienteP;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1; SET MensajeValidacion = "El Cliente fue dado de baja satisfactoriamente";
	ELSE
		SET EjecucionValida = 0; SET MensajeValidacion = "El Cliente no se pudo dar de baja";
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_BajaEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_BajaEncuesta`(IN Id_EncuestaP int, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_EncuestaP > 0 THEN
		UPDATE ENCUESTAS_Encuesta SET Fecha_Baja=NOW(), Estatus = 0
		WHERE Id_Encuesta=Id_EncuestaP;
		IF ROW_COUNT() > 0 THEN
			SET EjecuciónValida = 1;
			SET MensajeValidacion = 'La encuesta se elimino satisfactoriamente';
		ELSE
			SET EjecuciónValida = 0;
			SET MensajeValidacion = 'No se pudo eliminar la encuesta';
		END IF;
	ELSE
		SET EjecuciónValida = 0;
		SET MensajeValidacion = 'No se pudo eliminar la encuesta';
	END IF;
		 
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_BajaEncuestaPregunta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_BajaEncuestaPregunta`(IN Id_PreguntaP int, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 DELETE FROM ENCUESTAS_Encuesta_Pregunta
		 WHERE Id_Pregunta=Id_PreguntaP;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'La pregunta fue dada de baja satisfactoriamente';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo dar de baja la pregunta';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_BajaEncuestaPreguntaOpcion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_BajaEncuestaPreguntaOpcion`(IN Id_Pregunta_OpcionP int)
BEGIN
		 DELETE FROM  ENCUESTAS_Encuesta_Pregunta_Opcion
		 WHERE Id_Pregunta_Opcion=Id_Pregunta_OpcionP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_BajaImagen
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_BajaImagen`(IN Id_ImagenP smallint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_ImagenP > 0 THEN
		 UPDATE ENCUESTAS_Imagen SET Fecha_Baja=SYSDATE() 
		 WHERE Id_Imagen=Id_ImagenP;
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'La imagen se dio de baja satisfactoriamente';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo dar de baja la imagen';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'El id no es valido';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_BajaKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_BajaKiosco`(IN Id_KioscoP smallint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_KioscoP > 0 THEN
		 UPDATE ENCUESTAS_Kiosco SET Fecha_Baja=NOW() 
		 WHERE Id_Kiosco=Id_KioscoP;
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se dio de baja el kiosco satisfactoriamente';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo dar de baja el kiosco';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'Id no valido';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_up_BajaTipoInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_up_BajaTipoInformacionEncuestado`(IN Id_Informacion tinyint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_InformacionP > 0 THEN
		 UPDATE ENCUESTAS_Tipo_Informacion_Encuestado SET Fecha_Baja=NOW() 
		 WHERE Id_Informacion=Id_InformacionP;
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se dio de baja correctamente';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo dar de baja';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'Id no valido';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_EliminarEncuestaCupon
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_EliminarEncuestaCupon`(in Id_EncuestaP int, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 DELETE FROM  ENCUESTAS_Encuesta_Cupon
		 WHERE	Id_Encuesta = Id_EncuestaP;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se elimino correctamente el Cupon ligado a la encuesta';
	ELSE
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'No se pudo eliminar el Cupon ligado a la encuesta';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_EliminarEncuestaInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_EliminarEncuestaInformacionEncuestado`(IN Id_EncuestaP int, IN Id_InformacionP tinyint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 DELETE	FROM ENCUESTAS_Encuesta_Informacion_Encuestado
		 WHERE	Id_Encuesta = Id_EncuestaP AND Id_Informacion = Id_InformacionP;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se elimino correctamente la encuesta informacion encuestado';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo eliminar la encuesta informacion encuestado';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_EliminarEncuestaKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_EliminarEncuestaKiosco`(IN Id_EncuestaP int, in Id_KioskoP smallint)
BEGIN
		 DELETE FROM ENCUESTAS_Encuesta_Kiosco
		 WHERE	Id_Encuesta = Id_EncuestaP AND Id_Kiosco = Id_KioscoP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarCliente
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarCliente`(OUT Id_ClienteP  int,
IN Razon_SocialP  varchar(100),
IN RFCP  varchar(15), IN CorreoP varchar(50), IN EstatusP  tinyint,OUT EjecucionValida bit,OUT MensajeValidacion varchar(250))
BEGIN
		DECLARE Repetido smallint DEFAULT 0;
	IF (RFCP <> '' AND RFCP IS NOT NULL) THEN
    
		SET Repetido = (SELECT	COUNT(*) 
		FROM	ENCUESTAS_Cliente 
		WHERE	RFC = RFCP AND Fecha_Baja = '9999-12-31');
	
		IF (Repetido > 0) THEN
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'El RFC del Cliente ya se encuentra registrado, no puede duplicar informacion.';
		END IF;
        
	END IF;
	IF Repetido = 0 THEN
		 SET Id_ClienteP = 0;
		 INSERT INTO ENCUESTAS_Cliente(Razon_Social,RFC,Estatus,Fecha_Alta,Fecha_Baja,Correo)
		 VALUES (Razon_SocialP,RFCP,EstatusP,NOW(),'9999-12-31',CorreoP);

		 SET Id_ClienteP = LAST_INSERT_ID();
			IF Id_ClienteP > 0 THEN
				SET EjecucionValida = 1;
				SET MensajeValidacion = 'El Cliente fue agregado satisfactoriamente.';
			ELSE
				SET EjecucionValida = 0;
				SET MensajeValidacion = 'Hubo un problema al insertar el cliente.';
			END IF;
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuesta`(OUT Id_EncuestaP  int,IN Id_ClienteP  smallint,IN Codigo_EncuestaP  varchar(20),IN NombreP varchar(100),IN Fecha_InicioP  date,IN Fecha_FinP  date,IN Texto_BienvenidaP  varchar(250),IN Texto_DespedidaP  varchar(250),IN Tiempo_SincronizacionP varchar(8),IN Fondo_EncuestaP varchar(250),IN Imagen_Fondo_EncuestaP varchar(100),IN Fondo_SplashP varchar(250),IN Imagen_Fondo_SplashP varchar(100),IN Fondo_FinP varchar(250),IN Imagen_Fondo_FinP varchar(100),IN Tamano_LetraP tinyint,IN FuenteP varchar(250),IN EstatusP tinyint,OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	DECLARE Repetido smallint DEFAULT 0;
    
	SET Repetido = (SELECT	COUNT(*) 
									FROM	ENCUESTAS_Encuesta 
									WHERE	Codigo_Encuesta = Codigo_EncuestaP AND Fecha_Baja = '9999-12-31');

	IF Repetido = 0 THEN
		SET Id_EncuestaP = 0;
		INSERT INTO ENCUESTAS_Encuesta(Id_Cliente,Codigo_Encuesta,Nombre,Fecha_Inicio,Fecha_Fin,Texto_Bienvenida,
								Texto_Despedida,Tiempo_Sincronizacion,Fondo_Encuesta,Imagen_Fondo_Encuesta,Fondo_Splash,
								Imagen_Fondo_Splash,Fondo_Fin,Imagen_Fondo_Fin,Tamano_Letra,Fuente,Estatus,Fecha_Alta,Fecha_Baja)					
		VALUES (Id_ClienteP,Codigo_EncuestaP,NombreP,Fecha_InicioP,Fecha_FinP,Texto_BienvenidaP,Texto_DespedidaP,
						Tiempo_SincronizacionP,Fondo_EncuestaP,Imagen_Fondo_EncuestaP,Fondo_SplashP,Imagen_Fondo_SplashP,
						Fondo_FinP,Imagen_Fondo_FinP,Tamano_LetraP,FuenteP,EstatusP,NOW(),'9999-12-31');

		SET Id_EncuestaP=LAST_INSERT_ID();
			
		IF Id_EncuestaP > 0 THEN
			UPDATE ENCUESTAS_Encuesta SET Url = CONCAT('http://encuestas.zwinny.mx/survey?id=', Id_EncuestaP) 
																WHERE Id_Encuesta = Id_EncuestaP;
			IF ROW_COUNT() > 0 THEN
				SET EjecucionValida = 1;
				SET MensajeValidacion = 'El alta de la encuesta fue satisfactoria';
			ELSE
				SET EjecucionValida = 1;
				SET MensajeValidacion = 'El alta de la encuesta fue satisfactoria pero no actualizo la URL';
			END IF;
		ELSE
			SET EjecuciónValida = 0;
			SET MensajeValidacion = 'No se pudo insertar la encuesta, intente de nuevo o revise sus datos.';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'El Código de la Encuesta ya se encuentra registrado, no puede duplicar informacion.';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaCupon
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaCupon`(IN Id_EncuestaP  int, IN Nombre_ImagenP  varchar(150), IN ImagenP varchar(100), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	DECLARE Contador tinyint;
	SELECT Contador = COUNT(*) FROM ENCUESTAS_Encuesta_Cupon WHERE Id_Encuesta = Id_EncuestaP;
    
	IF Contador = 0 THEN
		INSERT INTO ENCUESTAS_Encuesta_Cupon(Id_Encuesta,Nombre_Imagen,Imagen)
		VALUES (Id_EncuestaP,Nombre_ImagenP,ImagenP);
	ELSE 
		UPDATE ENCUESTAS_Encuesta_Cupon SET Nombre_Imagen=Nombre_ImagenP,Imagen=ImagenP 
		WHERE Id_Encuesta=Id_EncuestaP;	
	END IF;
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se inserto correctamente el cupon';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo insertar el cupon';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaCuponEnvio
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaCuponEnvio`(IN Id_EncuestaP int, IN CorreoP varchar(250), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		INSERT INTO ENCUESTAS_Encuesta_Cupon_Envio(Id_Encuesta, Correo, Fecha_Envio)
		VALUES (Id_EncuestaP, CorreoP, NOW());
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se inserto correctamente la encuesta_cupon_envio';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo insertar la encuesta_cupon_envio';
		END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaInformacionEncuestado`(IN Id_EncuestaP  int, IN Id_InformacionP  tinyint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	INSERT INTO ENCUESTAS_Encuesta_Informacion_Encuestado(Id_Encuesta,Id_Informacion)
	VALUES (Id_EncuestaP,Id_InformacionP);
	IF ROW_COUNT() > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se agrego correctamente la encuesta informacion encuestado.';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo agregar la encuesta informacion encuestado.';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaKiosco`(IN Id_EncuestaP  int,
 IN Id_KioscoP  smallint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 INSERT INTO ENCUESTAS_Encuesta_Kiosco(Id_Encuesta,Id_Kiosco)
		 VALUES (Id_EncuestaP,Id_KioscoP);
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se inserto correctamente la relacion encuesta-kiosco';
		ELSE
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'No se pudo insertar la relacion encuesta-kiosco';
		END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaPregunta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaPregunta`(OUT Id_PreguntaP  inT, IN Id_EncuestaP  int, IN Id_Tipo_PreguntaP  tinyint, IN No_PreguntaP tinyint, IN TextoP  varchar(250), IN Maximo_Respuesta_TextoP  decimal(6,0), IN Tamano_LetraP tinyint, IN Color_LetraP varchar(50), IN RenglonP tinyint, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	SET Id_PreguntaP = -1;
		 INSERT INTO ENCUESTAS_Encuesta_Pregunta(Id_Encuesta,Id_Tipo_Pregunta,No_Pregunta,Texto,Maximo_Respuesta_Texto,
							Tamano_Letra,Color_Letra,Renglon)
		 VALUES (Id_EncuestaP,Id_Tipo_PreguntaP,No_PreguntaP,TextoP,Maximo_Respuesta_TextoP,Tamano_LetraP,Color_LetraP,RenglonP);
	SET Id_PreguntaP = LAST_INSERT_ID();
	IF Id_PreguntaP > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se agrego correctamente la pregunta de la encuesta';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo agregar la pregunta de la encuesta';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaPreguntaOpcion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaPreguntaOpcion`(OUT Id_Pregunta_OpcionP  int,
     IN Id_PreguntaP  int,
     IN Id_ImagenP  smallint,
     IN TextoP  nvarchar(50),
     IN OrdenP  tinyint,
     IN ValorP  decimal(8,2),
     IN No_Pregunta_SaltoP	tinyint,
	 IN Color_LetraP nvarchar(50),
	 IN Mostrar_TextoP bit, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	SET Id_Pregunta_OpcionP = -1;
	INSERT INTO ENCUESTAS_Encuesta_Pregunta_Opcion(Id_Pregunta,Id_Imagen,Texto,Orden,Valor,No_Pregunta_Salto,
							Color_Letra,Mostrar_Texto)
	VALUES (Id_PreguntaP,Id_ImagenP,TextoP,OrdenP,ValorP,No_Pregunta_SaltoP,Color_LetraP,Mostrar_TextoP);
	SET Id_Pregunta_OpcionP = LAST_INSERT_ID();
	IF Id_Pregunta_OpcionP > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se agrego correctamente la opcion de la pregunta';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo agregar la opcion de la pregunta';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaReporteConfiguracion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaReporteConfiguracion`(IN Id_EncuestaP  int,
     IN Reporte_KioscoP  bit, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	DECLARE Contador tinyint;
	SELECT Contador = COUNT(*) FROM ENCUESTAS_Encuesta_Reporte_Configuracion WHERE Id_Encuesta = Id_EncuestaP;
	IF Contador = 0 THEN
		INSERT INTO ENCUESTAS_Encuesta_Reporte_Configuracion(Id_Encuesta, Reporte_Kiosco)
		VALUES (Id_EncuestaP, Reporte_KioscoP);
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se inserto correctamente la configuracion del reporte';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo insertar la configuracion del reporte';
		END IF;
	ELSE
		UPDATE ENCUESTAS_Encuesta_Reporte_Configuracion SET Reporte_Kiosco=Reporte_KioscoP 
		WHERE Id_Encuesta=Id_EncuestaP;
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se actualizo correctamente la configuracion del reporte';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo actualizar la configuracion del reporte';
		END IF;
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaRespuesta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaRespuesta`(OUT Id_Encuesta_RespuestaP  bigint, IN Id_EncuestaP  int, IN Id_Kiosco_MacP  varchar(50), IN Fecha_EncuestaP  datetime, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	DECLARE Id_KioscoP int DEFAULT 0;
	SELECT Id_KioscOP=Id_Kiosco FROM ENCUESTAS_Kiosco WHERE Identificador=Id_Kiosco_MacP;
	IF Id_KioscoP > 0 THEN
		INSERT INTO ENCUESTAS_Encuesta_Respuesta(Id_Encuesta,Id_Kiosco,Fecha_Encuesta,Fecha_Sincronizacion)
		VALUES (Id_EncuestaP,Id_KioscoP,Fecha_EncuestaP, NOW());
		SET Id_Encuesta_RespuestaP = LAST_INSERT_ID();
		IF Id_Encuesta_RespuestaP > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se agrego satisfactoriamente la respuesta';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo insertar la respuesta';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No existe la MAC del Kiosko';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaRespuestaDetalle
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaRespuestaDetalle`(IN Id_Encuesta_RespuestaP  bigint,
     IN Id_PreguntaP  int,
     IN Id_Pregunta_OpcionP  int,
     IN RespuestaP  text, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_Encuesta_RespuestaP > 0 THEN
		INSERT INTO ENCUESTAS_Encuesta_Respuesta_Detalle(Id_Encuesta_Respuesta,Id_Pregunta,Id_Pregunta_Opcion,Respuesta)
		VALUES (Id_Encuesta_RespuestaP,Id_PreguntaP,Id_Pregunta_OpcionP,RespuestaP);
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se agrego correctamente el detalle de la respuesta';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo agregar el detalle de la respuesta';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No es un Id valido para relacionarle el detalle de la respuesta';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaRespuestaIncompleta
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaRespuestaIncompleta`(IN Id_EncuestaP  int, IN Id_Kiosco_MacP  varchar(50),IN No_IncompletasP  int, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	DECLARE Id_KioscoP smallint DEFAULT 0;	
	SELECT Id_KioscoP = Id_Kiosco FROM ENCUESTAS_Kiosco WHERE Identificador=Id_Kiosco_MacP AND Fecha_Baja='9999-12-31';
	IF Id_KioscoP > 0 THEN
		INSERT INTO ENCUESTAS_Encuesta_Respuesta_Incompleta(Id_Encuesta, Id_Kiosco, No_Incompletas, Fecha_Alta)
		VALUES (Id_EncuestaP, Id_KioscoP, No_IncompletasP, NOW());
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion = 'Se inserto correctamente la respuesta incompleta';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'No se pudo insertar la respuesta incompleta';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No existe el id del kiosko';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarEncuestaRespuestaInformacion
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarEncuestaRespuestaInformacion`(IN Id_Encuesta_RespuestaP  bigint, IN Id_InformacionP  tinyint, IN DatoP  varchar(150), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	IF Id_Encuesta_RespuestaP > 0 THEN
		 INSERT INTO ENCUESTAS_Encuesta_Respuesta_Informacion(Id_Encuesta_Respuesta,Id_Informacion,Dato)
		 VALUES (Id_Encuesta_RespuestaP,Id_InformacionP,DatoP);
		IF ROW_COUNT() > 0 THEN
			SET EjecucionValida = 1;
			SET MensajeValidacion  = 'Se agrego correctamente la informacion de la respuesta';
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion  = 'No se pudo agregar la informacion de la respuesta';
		END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion  = 'El id no es valido';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarImagen
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarImagen`(OUT Id_ImagenP  smallint,
IN Nombre_ImagenP  varchar(100), IN ImagenP  varchar(100), IN DescripcionP  varchar(150), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 INSERT INTO ENCUESTAS_Imagen(Nombre_Imagen,Imagen,Descripcion,Fecha_Alta,Fecha_Baja)
		 VALUES (Nombre_ImagenP,ImagenP,DescripcionP,SYSDATE(),fncFechaNula());
	SET Id_ImagenP = LAST_INSERT_ID();
	IF Id_ImagenP > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se agrego correctamente la imagen';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo agregar la imagen';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarKiosco
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarKiosco`(OUT Id_KioscoP  smallint, IN Id_ClienteP  smallint, IN Id_Cliente_SucursalP  smallint, IN Id_ZonaP smallint, IN Codigo_KioscoP  varchar(20), IN IdentificadorP varchar(50), IN Hora_ArranqueP time, IN Hora_CierreP time, IN UbicacionP varchar(50), IN DireccionP text, OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
	DECLARE Repetido smallint DEFAULT 0;
    
	IF Hora_ArranqueP = '' THEN SET Hora_ArranqueP = '07:00:00'; END IF;
	IF Hora_CierreP = '' THEN SET Hora_CierreP = '19:00:00'; END IF;
    
	IF (Codigo_KioscoP <> '' AND Codigo_KioscoP IS NOT NULL) THEN
    
		SET Repetido = (SELECT	COUNT(*) 
		FROM	ENCUESTAS_Kiosco 
		WHERE	Codigo_Kiosco = Codigo_KioscoP AND Fecha_Baja = '9999-12-31');
        IF Repetido <= 0 THEN
			INSERT INTO ENCUESTAS_Kiosco(Id_Cliente,Id_Cliente_Sucursal,Id_Zona,Codigo_Kiosco,Identificador,Hora_Arranque,Hora_Cierre,
							Fecha_Alta,Fecha_Baja)
			VALUES (Id_ClienteP,Id_Cliente_SucursalP,Id_ZonaP,Codigo_KioscoP,IdentificadorP,Hora_ArranqueP,Hora_CierreP,NOW(),'9999-12-31');
    
			SET Id_KioscoP=LAST_INSERT_ID();
			IF Id_KioscoP > 0 THEN
				INSERT INTO ENCUESTAS_Kiosco_Sincronizacion (Identificador, Ultima_Sincronizacion)
				VALUES (IdentificadorP, NOW());

				INSERT INTO ENCUESTAS_Ubicacion_Kiosco(Id_Kiosco, Ubicacion, Direccion, Fecha_Alta, Fecha_Baja)
				VALUES (Id_KioscoP, UbicacionP, DireccionP, NOW(), '9999-12-31');

				SET EjecucionValida = 1;
				SET MensajeValidacion = 'Se inserto correctamente el kiosco';
			ELSE
				SET EjecucionValida = 0;
				SET MensajeValidacion = 'No se pudo insertar el kiosco';
			END IF;
		ELSE
			SET EjecucionValida = 0;
			SET MensajeValidacion = 'El codigo kiosco esta repetido';
        END IF;
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'El codigo Kiosco no puede estar vacio';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento zwinny_1.ENCUESTAS_wr_InsertarTipoInformacionEncuestado
DELIMITER //
CREATE DEFINER=`sa`@`%` PROCEDURE `ENCUESTAS_wr_InsertarTipoInformacionEncuestado`(OUT Id_InformacionP  tinyint, IN DescripcionP  varchar(50), OUT EjecucionValida bit, OUT MensajeValidacion varchar(250))
BEGIN
		 INSERT INTO ENCUESTAS_Tipo_Informacion_Encuestado(Descripcion,Fecha_Alta,Fecha_Baja)
		 VALUES (DescripcionP, NOW(),'9999-12-31');
	SET Id_InformacionP = LAST_INSERT_ID();
	IF Id_InformacionP > 0 THEN
		SET EjecucionValida = 1;
		SET MensajeValidacion = 'Se agrego correctamente el tipo informacion encuestado';
	ELSE
		SET EjecucionValida = 0;
		SET MensajeValidacion = 'No se pudo agregar el tipo informacion encuestado';
	END IF;
END//
DELIMITER ;

-- Volcando estructura para función zwinny_1.fncFechaNula
DELIMITER //
CREATE DEFINER=`sa`@`%` FUNCTION `fncFechaNula`() RETURNS datetime
BEGIN
		RETURN  CONVERT("9999-12-31",datetime);
END//
DELIMITER ;

-- Volcando estructura para tabla zwinny_1.t01m01_branchesleads
CREATE TABLE IF NOT EXISTS `t01m01_branchesleads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla zwinny_1.t01m01_branchesleads: ~2 rows (aproximadamente)
DELETE FROM `t01m01_branchesleads`;
/*!40000 ALTER TABLE `t01m01_branchesleads` DISABLE KEYS */;
INSERT INTO `t01m01_branchesleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Industrias del Plástico', 'Industrias del Plástico', '2018-05-21 17:23:24', NULL),
	(2, 'Tecnología', 'Tecnología', '2018-05-21 17:23:55', NULL);
/*!40000 ALTER TABLE `t01m01_branchesleads` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.t01m02_sourcesleads
CREATE TABLE IF NOT EXISTS `t01m02_sourcesleads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla zwinny_1.t01m02_sourcesleads: ~7 rows (aproximadamente)
DELETE FROM `t01m02_sourcesleads`;
/*!40000 ALTER TABLE `t01m02_sourcesleads` DISABLE KEYS */;
INSERT INTO `t01m02_sourcesleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Bd Externa', 'Bd Externa', '2018-04-22 17:26:03', NULL),
	(2, 'Web', 'Sitio Web', '2018-04-22 17:26:23', NULL),
	(3, 'Llamada Entrante', 'Llamada Entrante', '2018-04-22 17:26:51', NULL),
	(4, 'Recomendación', 'Recomendación de otro lead/cliente', '2018-04-22 17:27:23', NULL),
	(5, 'Google', 'Contacto Google', '2018-04-22 17:27:47', NULL),
	(6, 'Facebook', 'Contacto Facebook', '2018-04-22 17:28:09', NULL),
	(7, 'Twitter', 'Contacto Twitter', '2018-04-22 17:28:28', NULL);
/*!40000 ALTER TABLE `t01m02_sourcesleads` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.t01m03_typesadresses
CREATE TABLE IF NOT EXISTS `t01m03_typesadresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla zwinny_1.t01m03_typesadresses: ~3 rows (aproximadamente)
DELETE FROM `t01m03_typesadresses`;
/*!40000 ALTER TABLE `t01m03_typesadresses` DISABLE KEYS */;
INSERT INTO `t01m03_typesadresses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Principal', 'Dirección Principal', '2018-04-22 17:29:06', NULL),
	(2, 'Oficina Ppal', 'Oficina Principal', '2018-04-22 17:29:26', NULL),
	(3, 'Oficina sucursal', 'Oficina Secundario o Sucursal', '2018-04-22 17:29:57', NULL);
/*!40000 ALTER TABLE `t01m03_typesadresses` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.t01m05_typesnetworks
CREATE TABLE IF NOT EXISTS `t01m05_typesnetworks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla zwinny_1.t01m05_typesnetworks: ~4 rows (aproximadamente)
DELETE FROM `t01m05_typesnetworks`;
/*!40000 ALTER TABLE `t01m05_typesnetworks` DISABLE KEYS */;
INSERT INTO `t01m05_typesnetworks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Facebook', 'Facebook', NULL, NULL),
	(2, 'Twitter', 'Twitter', NULL, NULL),
	(3, 'Instagram', 'Instagram', NULL, NULL),
	(4, 'Linkedin', 'Linkedin', NULL, NULL);
/*!40000 ALTER TABLE `t01m05_typesnetworks` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.t01m10_statusleads
CREATE TABLE IF NOT EXISTS `t01m10_statusleads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla zwinny_1.t01m10_statusleads: ~5 rows (aproximadamente)
DELETE FROM `t01m10_statusleads`;
/*!40000 ALTER TABLE `t01m10_statusleads` DISABLE KEYS */;
INSERT INTO `t01m10_statusleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Nueva Oportunidad', 'Ingresado en BD', '2018-06-10 17:22:24', '2018-06-10 17:22:26'),
	(2, 'Contacto', 'Contactado', '2018-06-10 17:23:13', '2018-06-10 17:23:14'),
	(3, 'Seguimiento', 'En seguimiento', '2018-06-10 17:23:39', '2018-06-10 17:23:40'),
	(4, 'Calificado', 'Paso a cliente', '2018-06-10 17:24:26', '2018-06-10 17:24:27'),
	(5, 'Cerrado', 'No aprovechable', '2018-06-10 17:25:23', '2018-06-10 17:25:23');
/*!40000 ALTER TABLE `t01m10_statusleads` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.t01_leads
CREATE TABLE IF NOT EXISTS `t01_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) DEFAULT NULL,
  `id_condicion_pago` int(11) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_branch` int(11) unsigned DEFAULT NULL,
  `code_lead` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_lead` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname_lead` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_lead` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth_lead` timestamp NULL DEFAULT NULL,
  `company` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_lead` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_fix` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_movil` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress_txt` text COLLATE utf8mb4_unicode_ci,
  `obs_lead` text COLLATE utf8mb4_unicode_ci,
  `id_status` int(11) unsigned zerofill DEFAULT '00000000001',
  `id_source` int(11) unsigned DEFAULT '0',
  `flag_owner` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_leads_statusleads` (`id_status`),
  KEY `FK_leads_branchesleads` (`id_branch`),
  KEY `FK_leads_sourcesleads` (`id_source`),
  CONSTRAINT `FK_leads_branchesleads` FOREIGN KEY (`id_branch`) REFERENCES `t01m01_branchesleads` (`id`),
  CONSTRAINT `FK_leads_sourcesleads` FOREIGN KEY (`id_source`) REFERENCES `t01m02_sourcesleads` (`id`),
  CONSTRAINT `FK_leads_statusleads` FOREIGN KEY (`id_status`) REFERENCES `t01m10_statusleads` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla zwinny_1.t01_leads: ~0 rows (aproximadamente)
DELETE FROM `t01_leads`;
/*!40000 ALTER TABLE `t01_leads` DISABLE KEYS */;
/*!40000 ALTER TABLE `t01_leads` ENABLE KEYS */;

-- Volcando estructura para tabla zwinny_1.t01_m04_typeslivplaces
CREATE TABLE IF NOT EXISTS `t01_m04_typeslivplaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla zwinny_1.t01_m04_typeslivplaces: ~4 rows (aproximadamente)
DELETE FROM `t01_m04_typeslivplaces`;
/*!40000 ALTER TABLE `t01_m04_typeslivplaces` DISABLE KEYS */;
INSERT INTO `t01_m04_typeslivplaces` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Casa', 'Casa', NULL, NULL),
	(2, 'Apartamento', 'Apartamento', NULL, NULL),
	(3, 'Galpón', 'Galpón', NULL, NULL),
	(4, 'Bodega', 'Bodega', NULL, NULL);
/*!40000 ALTER TABLE `t01_m04_typeslivplaces` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
