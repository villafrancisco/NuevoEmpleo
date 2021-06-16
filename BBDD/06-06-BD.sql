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
-- CREATE DATABASE IF NOT EXISTS `nuevoempleo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
-- USE `nuevoempleo`;

-- Volcando estructura para tabla nuevoempleo.administradores
CREATE TABLE IF NOT EXISTS `administradores` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` blob NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  KEY `idadmin` (`idadmin`) USING BTREE,
  KEY `FK_administradores_usuarios` (`idusuario`) USING BTREE,
  CONSTRAINT `FK_administradores_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.administradores: ~0 rows (aproximadamente)
DELETE FROM `administradores`;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` (`idadmin`, `idusuario`, `email`, `contrasena`, `nombre`, `apellidos`) VALUES
	(1, 11, 'administrador@administrador.com', _binary 0x243279243130246143527A34502E722E566E707549485571312E59722E347A6355655474334A4B54445263584A7A7838345266744C716C675632314F, 'administrador nombre', 'administrador apellidos');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empleos
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empleos: ~2 rows (aproximadamente)
DELETE FROM `empleos`;
/*!40000 ALTER TABLE `empleos` DISABLE KEYS */;
INSERT INTO `empleos` (`idempleo`, `idempresa`, `idfamilia`, `descripcion`, `fecha_publicacion`) VALUES
	(1, 2, 19, 'Empresa de servicios necesita personal sanitario, necesario aportar curriculum', '2021-06-04 12:36:24'),
	(2, 2, 14, 'Empresa de servicios, necesita personal informático', '2021-06-04 12:44:57'),
	(3, 3, 14, 'Buscamos un administrador de bases de datos', '2021-06-06 18:37:56'),
	(4, 3, 14, 'Buscamos un desarrollador de aplicaciones web', '2021-06-06 18:38:39'),
	(5, 3, 14, 'Buscamos un desarrollador de aplicaciones android con experiencia', '2021-06-06 18:39:16'),
	(6, 4, 3, 'Buscamos director contable para sucursal en madrid', '2021-06-06 18:42:52'),
	(7, 4, 3, 'Buscamos director de oficina para Laredo', '2021-06-06 18:43:28'),
	(8, 5, 18, 'Buscamos analista de laboratorio', '2021-06-06 18:47:18'),
	(9, 5, 19, 'Buscamos enfermero para el servicio médico', '2021-06-06 18:48:04');
/*!40000 ALTER TABLE `empleos` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` blob NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  KEY `idempresa` (`idempresa`),
  KEY `FK_empresas_usuarios` (`idusuario`),
  CONSTRAINT `FK_empresas_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empresas: ~0 rows (aproximadamente)
DELETE FROM `empresas`;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`idempresa`, `idusuario`, `email`, `contrasena`, `nombre`, `telefono`, `direccion`, `logo`) VALUES
	(2, 14, 'empresa1@empresa.com', _binary 0x2432792431302478387378314B773966575635714856783866395564656F627459716F557836512F47677166454B393255325A7347334B6354664336, 'SOLTEC s.l.', '654987123', 'astillero', 'empresas/14/96e06e_logo.png'),
	(3, 19, 'empresa2@empresa.com', _binary 0x24327924313024437451374C37346237734458675A5648643665574F2E32655175444E474A574454526E6D64326636516C43394D6D6F50502F615761, 'ITECAN', '65896523', 'calle albert einstein', 'empresas/19/c12bf9_descarga (1).png'),
	(4, 20, 'empresa3@empresa.com', _binary 0x243279243130245A69424B62437A456878476A4739707879313741472E414776685276556E67595469317A424B38414E54507A56415545676D2E6161, 'Banco Santander', '654123689', 'avenida constitucion', 'empresas/20/30f22f_descarga.png'),
	(5, 21, 'empresa4@empresa.com', _binary 0x243279243130244D454E57377375436F4C7971522E3570534242764D4F7870343471384B4449746A71612F4E3541723856556A6C5249534A33555032, 'Farmalab', '65415987', 'avenida esperanza', 'no-imagen.svg');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.familia
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.inscripciones: ~5 rows (aproximadamente)
DELETE FROM `inscripciones`;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
INSERT INTO `inscripciones` (`idinscripcion`, `idempleo`, `idtitulado`, `fecha_inscripcion`) VALUES
	(2, 1, 9, '2021-06-04 12:40:25'),
	(3, 2, 9, '2021-06-04 12:47:53'),
	(4, 2, 8, '2021-06-04 12:50:50'),
	(6, 2, 4, '2021-06-05 18:21:28'),
	(8, 1, 4, '2021-06-05 18:57:41'),
	(9, 7, 4, '2021-06-06 18:57:02');
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.tipousuario
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
CREATE TABLE IF NOT EXISTS `titulados` (
  `idtitulado` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idtitulo` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasena` blob DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `curriculum` mediumtext DEFAULT '',
  `foto` mediumtext DEFAULT '',
  KEY `idtitulado` (`idtitulado`),
  KEY `FK_titulados_usuarios` (`idusuario`),
  KEY `FK_titulados_titulo` (`idtitulo`),
  CONSTRAINT `FK_titulados_titulo` FOREIGN KEY (`idtitulo`) REFERENCES `titulos` (`idtitulo`) ON UPDATE CASCADE,
  CONSTRAINT `FK_titulados_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.titulados: ~6 rows (aproximadamente)
DELETE FROM `titulados`;
/*!40000 ALTER TABLE `titulados` DISABLE KEYS */;
INSERT INTO `titulados` (`idtitulado`, `idusuario`, `idtitulo`, `email`, `contrasena`, `nombre`, `apellidos`, `direccion`, `dni`, `telefono`, `curriculum`, `foto`) VALUES
	(4, 7, 110, 'titulado1@titulado.com', _binary 0x24327924313024594E386E7838737379493943764F5739784D4447582E66413139572E57537233517671334758633745687847393171774E562E7A32, 'Juan ', 'Perez García', 'calle magallanes', '72135489m', '666999333', 'titulados/7/6abd64_cv.pdf', 'titulados/7/904df4_logo.ico'),
	(5, 8, 100, 'titulado2@titulado.com', _binary 0x24327924313024694452673033776D31687359727A4C504556555736654A35466233316153575462304A3456553136652F673364692F4D6B36324143, 'Maria', 'González Perez', 'calle peredo', '72147852m', '666555999', 'titulados/8/c578a2_cv.pdf', 'titulados/8/c578a2_logo.ico'),
	(6, 9, 97, 'titulado3@titulado.com', _binary 0x243279243130246D556973597249625853374B317778374F424336362E6C50526570384C6344384C352E3966593731794C616C76376C645865314B71, 'Miguel', 'Hernandez', 'calle ramiro', '741235698m', '987456321', 'titulados/9/255b5d_cv.pdf', 'no-imagen.svg'),
	(7, 10, 62, 'titulado4@titulado.com', _binary 0x24327924313024667466785148734835304357554A744A527047595A4F5177504478626E54554873745956384479635737476438457832776E575069, 'Antonio', 'Saiz', 'calle antonio saiz', '72135480m', '659879452', 'titulados/10/27fd42_cv.pdf', 'no-imagen.svg'),
	(8, 12, 67, 'titulado5@titulado.com', _binary 0x243279243130246152676B2F4731504D4C5556545769766A58395555652E58756B45795173433479794D2F415935337170566D59486D534A6C2E4F36, 'Marissa', 'Cortavitarte', 'calle peredo', '789456123m', '456987456', 'titulados/12/d2f02f_cv.pdf', 'no-imagen.svg'),
	(9, 13, 114, 'titulado6@titulado.com', _binary 0x24327924313024696C714C492E48466E417575556D6B6F6E753264612E6B33663377713873437A6444582E5A586D48414F2F6D6E4A367641476B7643, 'Andrés', 'Arana', 'calle perez', '78951236m', '666333666', 'titulados/13/379e30_cv.pdf', 'no-imagen.svg'),
	(10, 15, 94, 'titulado7@titulado.com', _binary 0x243279243130246F5246722F4B762F6F4F4E6850784A7536746A7A6275633173564E79496741783653666F4364555947674E3670486D762E47504B4B, 'Alejandro', 'Lopez', 'calle heminio 3', '72135480r', '666555999', 'titulados/15/02342e_cv.pdf', 'no-imagen.svg'),
	(11, 16, 102, 'titulado8@titulado.com', _binary 0x2432792431302467346A66676B457737375444626E364E623331766F2E744973446F444B6C6D653850497A706A31683179345A52586A436B506B7632, 'Natalia', 'Arozamena', 'avenida constitución', '74123658j', '666555888', 'titulados/16/655249_cv.pdf', 'no-imagen.svg'),
	(12, 17, 67, 'titulado9@titulado.com', _binary 0x243279243130247A36346B434F634462586B34306A72742E58357334756C4844556F58307A4A746F4F4A6163784B3243476665632E52754A7A785536, 'Sonia', 'Martinez', 'avenida españa', '74123658n', '789654123', 'titulados/17/b32511_cv.pdf', 'no-imagen.svg'),
	(13, 18, 97, 'titulado10@titulado.com', _binary 0x24327924313024693251645A365832507A78764B584F6E2F61614C6F4F6D63615A6E677163414B533464694B587871654A70733171626B65536D5343, 'Patricia', 'Jimenez', 'avenida cantabria', '78965895l', '666555444', 'titulados/18/dc4599_cv.pdf', 'no-imagen.svg');
/*!40000 ALTER TABLE `titulados` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.titulos
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
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo` int(11) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  KEY `Índice 1` (`idusuario`) USING BTREE,
  KEY `FK_usuario_tipousuario` (`idtipo`) USING BTREE,
  CONSTRAINT `FK_usuario_tipousuario` FOREIGN KEY (`idtipo`) REFERENCES `tipousuario` (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.usuarios: ~8 rows (aproximadamente)
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
	(21, 2, '2021-06-06 18:46:10');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
