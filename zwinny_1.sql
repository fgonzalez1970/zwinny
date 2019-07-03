-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para zwinny_1
CREATE DATABASE IF NOT EXISTS `zwinny_1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `zwinny_1`;

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
	(1, 'Industrias del Plástico', 'Industrias del Plástico', '2018-05-21 12:23:24', NULL),
	(2, 'Tecnología', 'Tecnología', '2018-05-21 12:23:55', NULL);
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
	(1, 'Bd Externa', 'Bd Externa', '2018-04-22 12:26:03', NULL),
	(2, 'Web', 'Sitio Web', '2018-04-22 12:26:23', NULL),
	(3, 'Llamada Entrante', 'Llamada Entrante', '2018-04-22 12:26:51', NULL),
	(4, 'Recomendación', 'Recomendación de otro lead/cliente', '2018-04-22 12:27:23', NULL),
	(5, 'Google', 'Contacto Google', '2018-04-22 12:27:47', NULL),
	(6, 'Facebook', 'Contacto Facebook', '2018-04-22 12:28:09', NULL),
	(7, 'Twitter', 'Contacto Twitter', '2018-04-22 12:28:28', NULL);
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
	(1, 'Principal', 'Dirección Principal', '2018-04-22 12:29:06', NULL),
	(2, 'Oficina Ppal', 'Oficina Principal', '2018-04-22 12:29:26', NULL),
	(3, 'Oficina sucursal', 'Oficina Secundario o Sucursal', '2018-04-22 12:29:57', NULL);
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
	(1, 'Nueva Oportunidad', 'Ingresado en BD', '2018-06-10 12:22:24', '2018-06-10 12:22:26'),
	(2, 'Contacto', 'Contactado', '2018-06-10 12:23:13', '2018-06-10 12:23:14'),
	(3, 'Seguimiento', 'En seguimiento', '2018-06-10 12:23:39', '2018-06-10 12:23:40'),
	(4, 'Calificado', 'Paso a cliente', '2018-06-10 12:24:26', '2018-06-10 12:24:27'),
	(5, 'Cerrado', 'No aprovechable', '2018-06-10 12:25:23', '2018-06-10 12:25:23');
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
