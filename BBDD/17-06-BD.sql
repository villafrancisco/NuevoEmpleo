-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para nuevoempleo
DROP DATABASE IF EXISTS `nuevoempleo`;
CREATE DATABASE IF NOT EXISTS `nuevoempleo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `nuevoempleo`;

-- Volcando estructura para tabla nuevoempleo.administradores
DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL DEFAULT '0',
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  KEY `idadmin` (`idadmin`) USING BTREE,
  KEY `FK_administradores_usuarios` (`idusuario`) USING BTREE,
  CONSTRAINT `FK_administradores_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.administradores: ~1 rows (aproximadamente)
DELETE FROM `administradores`;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` (`idadmin`, `idusuario`, `email`, `contrasena`, `nombre`, `apellidos`) VALUES
	(1, 11, 'administrador@administrador.com', '$2y$10$aCRz4P.r.VnpuIHUq1.Yr.4zcUeTt3JKTDRcXJzx84RftLqlgV21O', 'Francisco', 'Villa');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empleos
DROP TABLE IF EXISTS `empleos`;
CREATE TABLE IF NOT EXISTS `empleos` (
  `idempleo` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `idfamilia` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  KEY `idempleo` (`idempleo`),
  KEY `FK_empleos_empresas` (`idempresa`),
  KEY `FK_empleo_familia` (`idfamilia`),
  CONSTRAINT `FK_empleo_familia` FOREIGN KEY (`idfamilia`) REFERENCES `familia` (`idfamilia`),
  CONSTRAINT `FK_empleos_empresas` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empleos: ~11 rows (aproximadamente)
DELETE FROM `empleos`;
/*!40000 ALTER TABLE `empleos` DISABLE KEYS */;
INSERT INTO `empleos` (`idempleo`, `idempresa`, `idfamilia`, `descripcion`, `fecha_publicacion`) VALUES
	(1, 2, 19, 'Empresa de servicios necesita personal sanitario, necesario aportar curriculum', '2021-06-04 12:36:24'),
	(2, 2, 14, 'Empresa de servicios, necesita personal informático', '2021-06-04 12:44:57'),
	(3, 3, 14, 'Buscamos un administrador de bases de datos', '2021-06-06 18:37:56'),
	(4, 3, 14, 'Buscamos un desarrollador de aplicaciones web', '2021-06-06 18:38:39'),
	(6, 4, 3, 'Buscamos director contable para sucursal en madrid', '2021-06-06 18:42:52'),
	(7, 4, 3, 'Buscamos director de oficina para Laredo', '2021-06-06 18:43:28'),
	(8, 5, 18, 'Buscamos analista de laboratorio recién titulado', '2021-06-06 18:47:18'),
	(9, 5, 19, 'Buscamos enfermero para el servicio médico', '2021-06-06 18:48:04'),
	(10, 6, 3, 'Auxiliar contable, con conocimientos de excel y sap.\nhorario de mañana, 8.00 a 2.00', '2021-06-16 12:24:35'),
	(11, 6, 14, 'programador de php, java. con ingles c1.', '2021-06-16 12:26:57'),
	(12, 7, 20, 'Necesitamos 10 personas para limpieza de edificios. 20 horas semanales. Sueldo según convenio', '2021-06-16 20:08:23');
/*!40000 ALTER TABLE `empleos` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empresas
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  KEY `idempresa` (`idempresa`),
  KEY `FK_empresas_usuarios` (`idusuario`),
  CONSTRAINT `FK_empresas_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empresas: ~6 rows (aproximadamente)
DELETE FROM `empresas`;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`idempresa`, `idusuario`, `email`, `contrasena`, `nombre`, `telefono`, `direccion`, `logo`) VALUES
	(2, 14, 'empresa1@empresa.com', '$2y$10$x8sx1Kw9fWV5qHVx8f9UdeobtYqoUx6Q/GgqfEK92U2ZsG3KcTfC6', 'SOLTEC s.l.', '654987123', 'astillero', 'empresas/14/96e06e_logo.png'),
	(3, 19, 'empresa2@empresa.com', '$2y$10$CtQ7L74b7sDXgZVHd6eWO.2eQuDNGJWDTRnmd2f6QlC9MmoPP/aWa', 'ITECAN', '65896523', 'calle albert einstein', 'empresas/19/c12bf9_descarga_(1).png'),
	(4, 20, 'empresa3@empresa.com', '$2y$10$ZiBKbCzEhxGjG9pxy17AG.AGvhRvUngYTi1zBK8ANTPzVAUEgm.aa', 'Banco Santander', '654123689', 'avenida constitucion', 'empresas/20/30f22f_descarga.png'),
	(5, 21, 'empresa4@empresa.com', '$2y$10$MENW7suCoLyqR.5pSBBvMOxp44q8KDItjqa/N5Ar8VUjlRISJ3UP2', 'Farmalab', '987456321', 'avenida esperanza', 'empresas/21/8273ac_farmalab.jpg'),
	(6, 28, 'carpasa@gmail.com', '$2y$10$HvPPWI1uHsavd4/3XP/nhuXKcmgsz9JgJBlf72WPRNNk8Hjj7pNeK', 'CARPASA', '942051120', 'CALLE VARGAS 53', 'empresas/28/ecfdd4_1200px-Cantabrian_Lábaru_Flag.svg.png'),
	(7, 29, 'empresa5@empresa.com', '$2y$10$Wbydd2PKzp5YFDwy7urLJeh8jDDFxIGw27zKHmtIDxnf/mI2ICFpa', 'Open Services S.L.', '987456321', 'Santoña', 'empresas/29/5429f2_descarga.jpg');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.familia
DROP TABLE IF EXISTS `familia`;
CREATE TABLE IF NOT EXISTS `familia` (
  `idfamilia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `nombre_imagen` varchar(50) NOT NULL DEFAULT 'no-imagen.svg',
  KEY `idfamilia` (`idfamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.familia: ~23 rows (aproximadamente)
DELETE FROM `familia`;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` (`idfamilia`, `nombre`, `nombre_imagen`) VALUES
	(1, 'Agraria', 'agraria.jpg'),
	(2, 'Actividades físicas y deportivas', 'actividades-fisicas.jpg'),
	(3, 'Administración y gestión', 'administracion-gestion.jpg'),
	(4, 'Artes gráficas', 'artes-graficas.jpg'),
	(5, 'Comercio y marketing', 'comercio-marketing.jpg'),
	(6, 'Edificación y obra civil', 'edificacion-obra-civil.jpg'),
	(7, 'Electricidad y electrónica', 'electricidad-electronica.jpg'),
	(8, 'Energía y agua', 'energia-agua.jpg'),
	(9, 'Fabricación mecánica', 'fabricacion-mecanica.jpg'),
	(10, 'Hostelería y turismo', 'hosteleria-turismo.jpg'),
	(11, 'Imagen personal', 'imagen-personal.jpg'),
	(12, 'Imagen y sonido', 'imagen-sonido.jpg'),
	(13, 'Industrias alimentarias', 'industrias-alimentarias.jpg'),
	(14, 'Informática y comunicaciones', 'informatica-comunicaciones.jpg'),
	(15, 'Instalación y mantenimiento', 'instalacion-mantenimiento.jpg'),
	(16, 'Madera, mueble y corcho', 'madera-corcho.jpg'),
	(17, 'Marítimo pesquera', 'maritimo-pesquera.jpg'),
	(18, 'Química', 'quimica.jpg'),
	(19, 'Sanidad', 'sanidad.jpg'),
	(20, 'Servicios socioculturales y a la comunidad', 'servicios-sociales.jpg'),
	(21, 'Transporte y mantenimiento de vehículos', 'transporte-mantenimiento.jpg'),
	(22, 'Textil, confección y piel', 'confeccion-textil.jpg'),
	(23, 'Seguridad y medio ambiente', 'seguridad-medioambiente.jpg');
/*!40000 ALTER TABLE `familia` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.inscripciones
DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `idinscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `idempleo` int(11) NOT NULL,
  `idtitulado` int(11) NOT NULL,
  `fecha_inscripcion` datetime NOT NULL,
  KEY `idinscripcion` (`idinscripcion`),
  KEY `FK_inscripciones_empleo` (`idempleo`),
  KEY `FK_inscripciones_titulado` (`idtitulado`),
  CONSTRAINT `FK_incscripciones_titulado` FOREIGN KEY (`idtitulado`) REFERENCES `titulados` (`idtitulado`) ON DELETE CASCADE,
  CONSTRAINT `FK_inscripciones_empleo` FOREIGN KEY (`idempleo`) REFERENCES `empleos` (`idempleo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.inscripciones: ~19 rows (aproximadamente)
DELETE FROM `inscripciones`;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
INSERT INTO `inscripciones` (`idinscripcion`, `idempleo`, `idtitulado`, `fecha_inscripcion`) VALUES
	(2, 1, 9, '2021-06-04 12:40:25'),
	(3, 2, 9, '2021-06-04 12:47:53'),
	(4, 2, 8, '2021-06-04 12:50:50'),
	(6, 2, 4, '2021-06-05 18:21:28'),
	(8, 1, 4, '2021-06-05 18:57:41'),
	(9, 7, 4, '2021-06-06 18:57:02'),
	(12, 8, 17, '2021-06-16 10:39:50'),
	(13, 1, 17, '2021-06-16 10:41:14'),
	(14, 7, 18, '2021-06-16 12:03:54'),
	(15, 9, 18, '2021-06-16 12:09:06'),
	(16, 10, 18, '2021-06-16 12:28:36'),
	(17, 12, 7, '2021-06-16 20:32:07'),
	(18, 12, 4, '2021-06-16 20:56:09'),
	(19, 12, 20, '2021-06-16 20:56:48'),
	(20, 12, 21, '2021-06-16 22:24:03'),
	(21, 10, 19, '2021-06-16 22:34:16'),
	(22, 7, 19, '2021-06-16 22:34:24'),
	(23, 11, 25, '2021-06-16 23:39:09'),
	(24, 12, 25, '2021-06-16 23:39:35'),
	(25, 10, 8, '2021-06-17 00:09:32'),
	(26, 6, 8, '2021-06-17 00:09:37'),
	(27, 7, 8, '2021-06-17 00:10:02');
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.tipousuario
DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` enum('administrador','empresa','titulado') NOT NULL,
  KEY `idtipo` (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.tipousuario: ~3 rows (aproximadamente)
DELETE FROM `tipousuario`;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` (`idtipo`, `tipousuario`) VALUES
	(1, 'administrador'),
	(2, 'empresa'),
	(3, 'titulado');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.titulados
DROP TABLE IF EXISTS `titulados`;
CREATE TABLE IF NOT EXISTS `titulados` (
  `idtitulado` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idtitulo` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `curriculum` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `registro_completo` tinyint(1) DEFAULT 0,
  KEY `idtitulado` (`idtitulado`),
  KEY `FK_titulados_usuarios` (`idusuario`),
  KEY `FK_titulados_titulo` (`idtitulo`),
  CONSTRAINT `FK_titulados_titulo` FOREIGN KEY (`idtitulo`) REFERENCES `titulos` (`idtitulo`) ON UPDATE CASCADE,
  CONSTRAINT `FK_titulados_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.titulados: ~20 rows (aproximadamente)
DELETE FROM `titulados`;
/*!40000 ALTER TABLE `titulados` DISABLE KEYS */;
INSERT INTO `titulados` (`idtitulado`, `idusuario`, `idtitulo`, `email`, `contrasena`, `nombre`, `apellidos`, `direccion`, `dni`, `telefono`, `curriculum`, `foto`, `registro_completo`) VALUES
	(4, 7, 97, 'titulado1@titulado.com', '$2y$10$YN8nx8ssyI9CvOW9xMDGX.fA19W.WSr3Qvq3GXc7EhxG91qwNV.z2', 'Juan ', 'Perez García', 'calle magallanes', '72135489m', '666999333', 'titulados/7/6abd64_cv.pdf', 'titulados/7/723733_klipartz.com (1).png', 1),
	(5, 8, 100, 'titulado2@titulado.com', '$2y$10$iDRg03wm1hsYrzLPEVUW6eJ5Fb31aSWTb0J4VU16e/g3di/Mk62AC', 'Maria', 'González Perez', 'calle peredo', '72147852m', '666555999', 'titulados/8/c578a2_cv.pdf', 'titulados/8/02295c_klipartz.com (1).png', 1),
	(6, 9, 97, 'titulado3@titulado.com', '$2y$10$mUisYrIbXS7K1wx7OBC66.lPRep8LcD8L5.9fY71yLalv7ldXe1Kq', 'Miguel', 'Hernandez', 'calle ramiro', '74123569m', '987456321', 'titulados/9/255b5d_cv.pdf', 'titulados/9/01d179_klipartz.com (1).png', 1),
	(7, 10, 62, 'titulado4@titulado.com', '$2y$10$ftfxQHsH50CWUJtJRpGYZOQwPDxbnTUHstYV8DycW7Gd8Ex2wnWPi', 'Antonio', 'Saiz', 'calle antonio saiz', '72135480m', '659879452', 'titulados/10/27fd42_cv.pdf', 'titulados/10/9f15d8_klipartz.com (1).png', 1),
	(8, 12, 67, 'titulado5@titulado.com', '$2y$10$aRgk/G1PMLUVTWivjX9UUe.XukEyQsC4yyM/AY53qpVmYHmSJl.O6', 'Marissa', 'Cortavitarte', 'calle peredo', '789456123m', '456987456', 'titulados/12/d2f02f_cv.pdf', 'no-imagen.svg', 1),
	(9, 13, 114, 'titulado6@titulado.com', '$2y$10$ilqLI.HFnAuuUmkonu2da.k3f3wq8sCzdDX.ZXmHAO/mnJ6vAGkvC', 'Andrés', 'Arana', 'calle perez', '78951236m', '666333666', 'titulados/13/379e30_cv.pdf', 'titulados/13/f01150_no-perfil.png', 1),
	(10, 15, 94, 'titulado7@titulado.com', '$2y$10$oRFr/Kv/oONhPxJu6tjzbuc1sVNyIgAx6SfoCdUYGgN6pHmv.GPKK', 'Alejandro', 'Lopez', 'calle heminio 3', '72135480r', '666555999', 'titulados/15/02342e_cv.pdf', 'no-imagen.svg', 1),
	(11, 16, 102, 'titulado8@titulado.com', '$2y$10$g4jfgkEw77TDbn6Nb31vo.tIsDoDKlme8PIzpj1h1y4ZRXjCkPkv2', 'Natalia', 'Arozamena', 'avenida constitución', '74123658j', '666555888', 'titulados/16/655249_cv.pdf', 'no-imagen.svg', 1),
	(12, 17, 67, 'titulado9@titulado.com', '$2y$10$z64kCOcDbXk40jrt.X5s4ulHDUoX0zJtoOJacxK2CGfec.RuJzxU6', 'Sonia', 'Martinez', 'avenida españa', '74123658n', '789654123', 'titulados/17/b32511_cv.pdf', 'no-imagen.svg', 1),
	(13, 18, 97, 'titulado10@titulado.com', '$2y$10$i2QdZ6X2PzxvKXOn/aaLoOmcaZngqcAKS4diKXxqeJps1qbkeSmSC', 'Patricia', 'Jimenez', 'avenida cantabria', '78965895l', '666555444', 'titulados/18/dc4599_cv.pdf', 'no-imagen.svg', 1),
	(14, 22, 56, 'titulado11@titulado.com', '$2y$10$uURzrinAe0KrxE/kZFqcb.GcSWiEVQ8036NrcGEGkXfpJLBG9ah3m', 'Sandra', 'Ibañez', 'calle perico 12', '7214789544f', '666555444', 'titulados/22/e87007_cv.pdf', 'no-imagen.svg', 1),
	(15, 23, 83, 'titulado12@titulado.com', '$2y$10$Ix/XDmnf314EF8rij/nWOec51tIvCox99qzl2CO0jAEPSXd/e/XyW', 'Francisco', 'Narváez', 'madrid', '72458965m', '652121245', 'titulados/23/e1d8ca_cv.pdf', 'no-imagen.svg', 1),
	(16, 24, 64, 'titulado14@titulado.com', '$2y$10$P7Cx2GLTMc/JfeJLPD3eh.uP1jCsoZFeXnNQnLxhwMQaQk39hevYK', 'Enrique', 'Cerezo', 'marbella', '72147852l', '659745896', 'titulados/24/b5c29d_cv.pdf', 'titulados/24/42c969_no-perfil.png', 1),
	(17, 25, 107, 'titulado15@titulado.com', '$2y$10$yFSsV5f/uaPxcFb4OG9N6uslnd6Eukx21pX4WTsvvj87oBHZszCau', 'Alberto', 'Peláez', 'laredo', '78951159l', '741236598', 'titulados/25/8546b4_cv.pdf', 'no-perfil.png', 1),
	(18, 26, 57, 'mely_3866@hotmail.com', '$2y$10$z5OUhQK2vgmYlxrmzzPas.mv0mwVOBMCqwMzf7qJ1HRIL7XCwY93G', 'Melissa', 'Quispe Vargas', 'hermanos de carriedo y peredo 12', '72275322f', '662684710', 'titulados/26/dc49ff_cv.pdf', 'no-perfil.png', 1),
	(19, 27, 103, 'mel_28@gmail.com', '$2y$10$2b.aVTaTr.SKuFa00cDDTew/Xno8RpUTD71AkMp9XdB.lznTasaZy', 'Melissa', 'vargas', 'reina victoria ', '72254823f', '662684720', 'titulados/27/1c4453_cv.pdf', 'no-perfil.png', 1),
	(20, 30, 106, 'titulado16@titulado.com', '$2y$10$jX1g6pjbbxKVm/NkLy6BcOMViWg8I6k7ZcagMtBfHUMNIb849M0cm', 'Carlota', 'menendez', 'cabezón de la sal', '95123456m', '654159753', 'titulados/30/0deed0_cv.pdf', 'no-perfil.png', 1),
	(21, 31, 103, 'titulado17@titulado.com', '$2y$10$rYS9AdxRCDYRIkpVhunHGe/fMViblV3kkaX3Kn3e0tBAkFNyXNu6K', 'Patricia', 'Álvarez', 'Corrales de Buelna', '95123456m', '982153684', 'titulados/31/78f1cc_cv.pdf', 'no-perfil.png', 1),
	(23, 33, 101, 'camila@hotmail.com', '$2y$10$psDD.42LEj2FXF7ThjX98u2IMFh4y5bGzCHXoRs.dHsDg1QKLcbF2', 'camila', 'bernal', 'reina victoria 20', '72275322b', '662684711', 'titulados/33/4220db_cv.pdf', 'no-perfil.png', 1),
	(25, 35, 92, 'titulado18@titulado.com', '$2y$10$IpsgOltkLtwsW6Z7RFnuGeHKRtx9pDu1DwOesIqsV5txeYrG1j9PG', 'Fernanda', 'Cadiz', 'Maliaño', '78963147o', '753654789', 'titulados/35/999ea7_cv.pdf', 'no-perfil.png', 1);
/*!40000 ALTER TABLE `titulados` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.titulos
DROP TABLE IF EXISTS `titulos`;
CREATE TABLE IF NOT EXISTS `titulos` (
  `idtitulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `grado` enum('medio','superior') NOT NULL,
  `idfamilia` int(11) NOT NULL,
  KEY `idtitulo` (`idtitulo`),
  KEY `FK_titulos_familia` (`idfamilia`),
  CONSTRAINT `FK_titulos_familia` FOREIGN KEY (`idfamilia`) REFERENCES `familia` (`idfamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.titulos: ~96 rows (aproximadamente)
DELETE FROM `titulos`;
/*!40000 ALTER TABLE `titulos` DISABLE KEYS */;
INSERT INTO `titulos` (`idtitulo`, `nombre`, `grado`, `idfamilia`) VALUES
	(1, 'Producción agroecológica', 'medio', 1),
	(2, 'Producción agropecuaria', 'medio', 1),
	(3, 'Jardinería y floristería', 'medio', 1),
	(4, 'Aprovechamiento y conservación del medio natural', 'medio', 1),
	(6, 'Conducción de actividades físico-deportivas en el medio natural', 'medio', 2),
	(7, 'Actividades Ecuestres', 'medio', 2),
	(8, 'Gestión administrativa', 'medio', 3),
	(9, 'Preimpresión digital', 'medio', 4),
	(10, 'Actividades comerciales', 'medio', 5),
	(11, 'Comercialización de productos alimentarios', 'medio', 5),
	(12, 'Obras de interior, decoración y rehabilitación', 'medio', 6),
	(13, 'Instalaciones eléctricas y automáticas', 'medio', 7),
	(15, 'Instalaciones de telecomunicaciones', 'medio', 7),
	(16, 'Mecanizado', 'medio', 9),
	(17, 'Soldadura y calderería', 'medio', 9),
	(18, 'Cocina y gastronomía', 'medio', 10),
	(21, 'Servicios en restauración', 'medio', 10),
	(22, 'Estética y belleza', 'medio', 11),
	(23, 'Peluquería y cosmética capilar', 'medio', 11),
	(26, 'Panadería, repostería y confitería', 'medio', 13),
	(27, 'Elaboración de productos alimenticios', 'medio', 13),
	(28, 'Sistemas microinformáticos y redes', 'medio', 14),
	(29, 'Mantenimiento electromecánico', 'medio', 15),
	(30, 'Instalaciones de produccion de calor', 'medio', 15),
	(31, 'Instalaciones frigoríficas y climatización', 'medio', 15),
	(34, 'Carpintería y mueble', 'medio', 16),
	(35, 'Mantenimiento y control de la maquinaría de buques y embarcaciones', 'medio', 17),
	(36, 'Planta química', 'medio', 18),
	(37, 'Operaciones de laboratorio', 'medio', 18),
	(40, 'Cuidados auxiliares de enfermería', 'medio', 19),
	(41, 'Emergencias sanitarias', 'medio', 19),
	(42, 'Farmacia y parafarmacia', 'medio', 19),
	(43, 'Atención a personas en situación de dependencia', 'medio', 20),
	(44, 'Carrocería', 'medio', 21),
	(45, 'Electromecánica de vehículos automóviles', 'medio', 21),
	(46, 'Conducción de vehículos de transporte por carretera', 'medio', 21),
	(49, 'Confección y moda', 'medio', 22),
	(50, 'Paisajismo y medio rural', 'superior', 1),
	(53, 'Gestión forestal y del medio natural', 'superior', 1),
	(54, 'Ganadería y asistencia en sanidad animal', 'superior', 1),
	(55, 'Acondicionamiento Físico', 'superior', 2),
	(56, 'Enseñanza y animación sociodeportiva', 'superior', 2),
	(57, 'Administración y finanzas', 'superior', 3),
	(58, 'Asistencia a la dirección', 'superior', 3),
	(59, 'Diseño y edición de publicaciones impresas y multimendia', 'superior', 4),
	(60, 'Comercio internacional', 'superior', 5),
	(61, 'Gestión de ventas y espacios comerciales', 'superior', 5),
	(62, 'Transporte y logística', 'superior', 5),
	(63, 'Marketing y publicidad', 'superior', 5),
	(64, 'Proyectos de edificación', 'superior', 6),
	(65, 'Proyectos de obra civil', 'superior', 6),
	(66, 'Mantenimiento electrónico', 'superior', 7),
	(67, 'Sistemas electrotécticos y automatizados', 'superior', 7),
	(68, 'Sistemas de telecomunicaciones e informáticos', 'superior', 7),
	(69, 'Automatización y robótica industrial', 'superior', 7),
	(70, 'Electromedicina clínica', 'superior', 7),
	(73, 'Eficiencia energética y energía solar térmica', 'superior', 8),
	(74, 'Energías renovables', 'superior', 8),
	(75, 'Construcciones metálicas', 'superior', 9),
	(76, 'Programación de la producción en fabricación mecánica', 'superior', 9),
	(77, 'Diseño en fabricación mecánica', 'superior', 9),
	(78, 'Agencias de viajes y gestión de eventos', 'superior', 10),
	(79, 'Guía, información y asistencias turísticas', 'superior', 10),
	(80, 'Dirección de cocina', 'superior', 10),
	(81, 'Gestión de alojamientos turísticos', 'superior', 10),
	(82, 'Asesoría de imagen personal y corporativa', 'superior', 11),
	(83, 'Estética integral y bienestar', 'superior', 11),
	(86, 'Estilismo y dirección de peluquería', 'superior', 11),
	(87, 'Animaciones 3D, juegos y entornos interactivos', 'superior', 12),
	(88, 'Procesos y calidad en la industria alimentaria', 'superior', 13),
	(89, 'Administración de sistemas informáticos', 'superior', 14),
	(90, 'Desarrollo de aplicaciones web', 'superior', 14),
	(91, 'Desarrollo de aplicaciones multiplataforma', 'superior', 14),
	(92, 'Mecatrónica industrial', 'superior', 15),
	(93, 'Mantenimiento de instalaciones térmicas y de fluidos', 'superior', 15),
	(94, 'Prevención de riesgos profesionales', 'superior', 15),
	(95, 'Diseño y amueblamiento', 'superior', 16),
	(96, 'Laboratorio de análisis y control de calidad', 'superior', 18),
	(97, 'Química industrial', 'superior', 18),
	(98, 'Anatomía patológica y citodiagnóstico', 'superior', 19),
	(99, 'Documentación y administración sanitaria', 'superior', 19),
	(100, 'Higiene bucodental', 'superior', 19),
	(101, 'Laboratoria clínico y biomédico', 'superior', 19),
	(102, 'Imagen para el diágnostico y medicina nuclear', 'superior', 19),
	(103, 'Radioterapia y dosimetría', 'superior', 19),
	(104, 'Prótesis dentales', 'superior', 19),
	(105, 'Audiología protésica', 'superior', 19),
	(106, 'Educación y control ambiental', 'superior', 23),
	(107, 'Química y salud ambiental', 'superior', 23),
	(108, 'Animación sociocultural y turística', 'superior', 20),
	(109, 'Educación infantil', 'superior', 20),
	(110, 'Integración social', 'superior', 20),
	(111, 'Mediación comunicativa', 'superior', 20),
	(112, 'Promoción de igualdad de género', 'superior', 20),
	(113, 'Automoción', 'superior', 21),
	(114, 'Mantenimiento aeromecánico de aviones con motor de turbina', 'superior', 21);
/*!40000 ALTER TABLE `titulos` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo` int(11) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  KEY `Índice 1` (`idusuario`) USING BTREE,
  KEY `FK_usuario_tipousuario` (`idtipo`) USING BTREE,
  CONSTRAINT `FK_usuario_tipousuario` FOREIGN KEY (`idtipo`) REFERENCES `tipousuario` (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.usuarios: ~29 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idusuario`, `idtipo`, `fecha_registro`) VALUES
	(7, 3, '2021-06-04 12:11:08'),
	(8, 3, '2021-06-04 12:14:40'),
	(9, 3, '2021-06-04 12:17:32'),
	(10, 3, '2021-06-04 12:19:31'),
	(11, 1, '2021-06-04 12:21:48'),
	(12, 3, '2021-06-04 12:30:32'),
	(13, 3, '2021-06-04 12:31:35'),
	(14, 2, '2021-06-04 12:33:34'),
	(15, 3, '2021-06-06 18:06:10'),
	(16, 3, '2021-06-06 18:31:09'),
	(17, 3, '2021-06-06 18:33:37'),
	(18, 3, '2021-06-06 18:34:59'),
	(19, 2, '2021-06-06 18:36:38'),
	(20, 2, '2021-06-06 18:40:14'),
	(21, 2, '2021-06-06 18:46:10'),
	(22, 3, '2021-06-12 18:56:38'),
	(23, 3, '2021-06-12 19:01:04'),
	(24, 3, '2021-06-12 19:11:33'),
	(25, 3, '2021-06-14 00:20:10'),
	(26, 3, '2021-06-16 11:58:50'),
	(27, 3, '2021-06-16 12:05:02'),
	(28, 2, '2021-06-16 12:21:57'),
	(29, 2, '2021-06-16 20:02:54'),
	(30, 3, '2021-06-16 20:56:40'),
	(31, 3, '2021-06-16 21:54:43'),
	(32, 3, '2021-06-16 22:25:19'),
	(33, 3, '2021-06-16 22:36:35'),
	(34, 3, '2021-06-16 22:45:42'),
	(35, 3, '2021-06-16 22:50:54');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
