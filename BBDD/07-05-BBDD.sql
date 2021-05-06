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
CREATE DATABASE IF NOT EXISTS `nuevoempleo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `nuevoempleo`;

-- Volcando estructura para tabla nuevoempleo.administradores
CREATE TABLE IF NOT EXISTS `administradores` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` blob NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  KEY `idadmin` (`idadmin`) USING BTREE,
  KEY `FK_administradores_usuarios` (`idusuario`) USING BTREE,
  CONSTRAINT `FK_administradores_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.administradores: ~2 rows (aproximadamente)
DELETE FROM `administradores`;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` (`idadmin`, `idusuario`, `email`, `contrasena`, `nombre`, `apellidos`) VALUES
	(10, 25, 'administrador@administrador.com', _binary 0x243279243130246C4D353670364952477747784554667A7532796B2E4F3053655A627A522F464E4A665476564D784C55306F72357947506552584253, 'administradorr', 'administrador'),
	(20, 35, 'administrador2@administrador.com', _binary 0x243279243130246C4D353670364952477747784554667A7532796B2E4F3053655A627A522F464E4A665476564D784C55306F72357947506552584253, 'administradordos', 'administradordos');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empleos
CREATE TABLE IF NOT EXISTS `empleos` (
  `idempleo` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  KEY `idempleo` (`idempleo`),
  KEY `FK_empleos_empresas` (`idempresa`),
  CONSTRAINT `FK_empleos_empresas` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empleos: ~0 rows (aproximadamente)
DELETE FROM `empleos`;
/*!40000 ALTER TABLE `empleos` DISABLE KEYS */;
INSERT INTO `empleos` (`idempleo`, `idempresa`, `descripcion`, `fecha_publicacion`) VALUES
	(1, 4, 'empleo de prueba', NULL);
/*!40000 ALTER TABLE `empleos` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empleotitulo
CREATE TABLE IF NOT EXISTS `empleotitulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idempleo` int(11) NOT NULL,
  `idtitulo` int(11) NOT NULL,
  KEY `Índice 1` (`id`),
  KEY `FK__empleos` (`idempleo`),
  KEY `FK_empleotitulo_titulos` (`idtitulo`),
  CONSTRAINT `FK__empleos` FOREIGN KEY (`idempleo`) REFERENCES `empleos` (`idempleo`),
  CONSTRAINT `FK_empleotitulo_titulos` FOREIGN KEY (`idtitulo`) REFERENCES `titulos` (`idtitulo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empleotitulo: ~0 rows (aproximadamente)
DELETE FROM `empleotitulo`;
/*!40000 ALTER TABLE `empleotitulo` DISABLE KEYS */;
INSERT INTO `empleotitulo` (`id`, `idempleo`, `idtitulo`) VALUES
	(2, 1, 89);
/*!40000 ALTER TABLE `empleotitulo` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` blob NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `nif` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  KEY `idempresa` (`idempresa`),
  KEY `FK_empresas_usuarios` (`idusuario`),
  CONSTRAINT `FK_empresas_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empresas: ~0 rows (aproximadamente)
DELETE FROM `empresas`;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`idempresa`, `idusuario`, `email`, `contrasena`, `nombre`, `direccion`, `nif`, `logo`) VALUES
	(4, 40, 'empresa1@empresa.com', _binary 0x243279243130246E775473706F335868487A702F39554741354A68554F5262434D544B5630366B676277344350487745327272535A45544137575A65, '', '', '', '');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.familia
CREATE TABLE IF NOT EXISTS `familia` (
  `idfamilia` int(11) NOT NULL AUTO_INCREMENT,
  `familia` varchar(50) NOT NULL,
  `nombre_imagen` varchar(50) NOT NULL DEFAULT 'no-imagen.svg',
  KEY `idfamilia` (`idfamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.familia: ~23 rows (aproximadamente)
DELETE FROM `familia`;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` (`idfamilia`, `familia`, `nombre_imagen`) VALUES
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
  CONSTRAINT `FK_incscripciones_titulado` FOREIGN KEY (`idtitulado`) REFERENCES `titulados` (`idtitulado`),
  CONSTRAINT `FK_inscripciones_empleo` FOREIGN KEY (`idempleo`) REFERENCES `empleos` (`idempleo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.inscripciones: ~1 rows (aproximadamente)
DELETE FROM `inscripciones`;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
INSERT INTO `inscripciones` (`idinscripcion`, `idempleo`, `idtitulado`, `fecha_inscripcion`) VALUES
	(2, 1, 10, '0000-00-00 00:00:00');
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
  `email` varchar(50) NOT NULL,
  `contrasena` blob NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `curriculum` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  KEY `idtitulado` (`idtitulado`),
  KEY `FK_titulados_usuarios` (`idusuario`),
  CONSTRAINT `FK_titulados_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.titulados: ~5 rows (aproximadamente)
DELETE FROM `titulados`;
/*!40000 ALTER TABLE `titulados` DISABLE KEYS */;
INSERT INTO `titulados` (`idtitulado`, `idusuario`, `email`, `contrasena`, `nombre`, `apellidos`, `direccion`, `dni`, `telefono`, `curriculum`, `foto`, `fecha_registro`) VALUES
	(6, 10, 'titulado1@titulado.com', _binary 0x243279243130246C4D353670364952477747784554667A7532796B2E4F3053655A627A522F464E4A665476564D784C55306F72357947506552584253, '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
	(10, 15, 'titulado2@titulado.com', _binary 0x243279243130246C4D353670364952477747784554667A7532796B2E4F3053655A627A522F464E4A665476564D784C55306F72357947506552584253, '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
	(11, 36, 'titulado3@titulado.com', _binary 0x243279243130247448495A435138366B454759646C4B696F426456666558427A363530646A55372E6544674F596352755343746E4678734854655A61, '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
	(12, 37, 'titulado4@titulado.com', _binary 0x24327924313024663867774772443074716C507479504E4B4E53576E654F4E6D424A432E6B75325A625A42526F2F4C757342515A55764654534B4E4F, '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
	(13, 38, 'titulado6@titulado.com', _binary 0x2432792431302434626A55434746347563524157313431304677692F65507367772F652F78684B585154774A4B492F465053455959317939554E6D2E, '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
	(14, 39, 'titulado7@titulado.com', _binary 0x243279243130245664676C663650724B365A3242667363305858534F75505730532F6669507579646F395648726857534F4266623754304F31513432, '', '', '', '', '', '', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `titulados` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.tituladostitulacion
CREATE TABLE IF NOT EXISTS `tituladostitulacion` (
  `idtitulado` int(11) NOT NULL,
  `idtitulacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  KEY `FK_tituladostitulacion_titulados` (`idtitulado`),
  KEY `FK_titulados_titulacion` (`idtitulacion`),
  CONSTRAINT `FK_tituladostitulacion_titulacion` FOREIGN KEY (`idtitulacion`) REFERENCES `titulos` (`idtitulo`),
  CONSTRAINT `FK_tituladostitulacion_titulados` FOREIGN KEY (`idtitulado`) REFERENCES `titulados` (`idtitulado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.tituladostitulacion: ~5 rows (aproximadamente)
DELETE FROM `tituladostitulacion`;
/*!40000 ALTER TABLE `tituladostitulacion` DISABLE KEYS */;
INSERT INTO `tituladostitulacion` (`idtitulado`, `idtitulacion`, `fecha`) VALUES
	(10, 6, '2021-05-01'),
	(10, 87, '0000-00-00'),
	(14, 105, '0000-00-00'),
	(13, 108, '0000-00-00'),
	(10, 7, '0000-00-00');
/*!40000 ALTER TABLE `tituladostitulacion` ENABLE KEYS */;

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

-- Volcando datos para la tabla nuevoempleo.titulos: ~97 rows (aproximadamente)
DELETE FROM `titulos`;
/*!40000 ALTER TABLE `titulos` DISABLE KEYS */;
INSERT INTO `titulos` (`idtitulo`, `nombre`, `grado`, `idfamilia`) VALUES
	(1, 'Producción agroecológica', 'medio', 1),
	(2, 'Producción agropecuaria', 'medio', 1),
	(3, 'Jardinería y floristería', 'medio', 1),
	(4, 'Aprovechamiento y conservación del medio natural', 'medio', 1),
	(5, 'Actividades Ecuestres', 'medio', 1),
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
  KEY `Índice 1` (`idusuario`) USING BTREE,
  KEY `FK_usuario_tipousuario` (`idtipo`) USING BTREE,
  CONSTRAINT `FK_usuario_tipousuario` FOREIGN KEY (`idtipo`) REFERENCES `tipousuario` (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.usuarios: ~9 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idusuario`, `idtipo`) VALUES
	(10, 3),
	(15, 3),
	(25, 1),
	(35, 1),
	(36, 3),
	(37, 3),
	(38, 3),
	(39, 3),
	(40, 2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
