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

-- Volcando estructura para tabla nuevoempleo.empleos
CREATE TABLE IF NOT EXISTS `empleos` (
  `idempleo` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  KEY `idempleo` (`idempleo`),
  KEY `FK_empleos_empresas` (`idempresa`),
  CONSTRAINT `FK_empleos_empresas` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empleos: ~2 rows (aproximadamente)
DELETE FROM `empleos`;
/*!40000 ALTER TABLE `empleos` DISABLE KEYS */;
INSERT INTO `empleos` (`idempleo`, `idempresa`, `descripcion`) VALUES
	(1, 14, 'administracion'),
	(2, 75, 'laskdlfasdjflkaj');
/*!40000 ALTER TABLE `empleos` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empleotitulo
CREATE TABLE IF NOT EXISTS `empleotitulo` (
  `idempleo` int(11) NOT NULL,
  `idtitulo` int(11) NOT NULL,
  KEY `FK empleo_titulo_empleo` (`idempleo`),
  KEY `FK_empleo_titulo_titulo` (`idtitulo`),
  CONSTRAINT `FK empleo_titulo_empleo` FOREIGN KEY (`idempleo`) REFERENCES `empleos` (`idempleo`),
  CONSTRAINT `FK_empleo_titulo_titulo` FOREIGN KEY (`idtitulo`) REFERENCES `titulos` (`idtitulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empleotitulo: ~3 rows (aproximadamente)
DELETE FROM `empleotitulo`;
/*!40000 ALTER TABLE `empleotitulo` DISABLE KEYS */;
INSERT INTO `empleotitulo` (`idempleo`, `idtitulo`) VALUES
	(1, 57),
	(2, 8),
	(1, 8);
/*!40000 ALTER TABLE `empleotitulo` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `nif` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` blob NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.empresas: ~100 rows (aproximadamente)
DELETE FROM `empresas`;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`idempresa`, `nombre`, `direccion`, `nif`, `email`, `contrasena`, `fecha_registro`) VALUES
	(1, 'Enim LLC', '', '933466138-00007', 'nibh.Aliquam@metusAliquam.net', _binary 0x31, '2020-10-25 19:40:17'),
	(2, 'Ac Metus Company', '', '036974624-00003', 'Sed@necmollisvitae.edu', _binary '', '2016-04-09 04:01:47'),
	(3, 'Volutpat Nulla Foundation', '', '097285258-00006', 'fringilla@euplacerateget.ca', _binary '', '2020-09-19 12:34:58'),
	(4, 'Et Rutrum Non Corp.', '', '850458274-00006', 'metus@eu.net', _binary '', '2018-12-16 12:46:10'),
	(5, 'Lobortis Ultrices Foundation', '', '060289683-00009', 'eu.eleifend.nec@in.edu', _binary '', '2019-01-10 20:05:50'),
	(6, 'Ut Erat Limited', '', '236874772-00007', 'molestie.sodales@molestiearcu.edu', _binary '', '2017-10-28 15:56:09'),
	(7, 'Congue A PC', '', '552721292-00001', 'amet.consectetuer@mollisvitae.org', _binary '', '2019-04-15 12:38:44'),
	(8, 'Habitant Incorporated', '', '255294704-00002', 'in.consequat@ipsum.ca', _binary '', '2020-03-03 04:25:55'),
	(9, 'Rutrum Eu Corp.', '', '038428454-00003', 'dolor.sit.amet@nunc.ca', _binary '', '2017-05-09 17:34:06'),
	(10, 'Eget Mollis Lectus Consulting', '', '394649479-00000', 'sem.semper.erat@Class.net', _binary '', '2017-03-14 00:03:13'),
	(11, 'Magna Nec Quam Foundation', '', '282979368-00002', 'elementum.sem.vitae@Curabituregestasnunc.co.uk', _binary '', '2017-05-03 02:47:27'),
	(12, 'Vivamus Euismod Urna Corporation', '', '659231393-00003', 'sagittis@velitin.com', _binary '', '2015-12-10 13:02:13'),
	(13, 'Ullamcorper Eu Foundation', '', '121585913-00001', 'aliquam.eros@tempor.org', _binary '', '2016-07-15 17:43:23'),
	(14, 'A Ultricies Adipiscing Ltd', '', '288887383-00009', 'venenatis@eros.co.uk', _binary '', '2020-07-14 12:41:35'),
	(15, 'Sagittis Placerat Cras Limited', '', '553026345-00007', 'et.eros.Proin@consequatpurus.edu', _binary '', '2017-08-16 01:30:49'),
	(16, 'Proin Dolor Nulla Corp.', '', '735354771-00009', 'et.malesuada.fames@rutrum.co.uk', _binary '', '2017-05-04 19:06:49'),
	(17, 'Etiam Gravida Company', '', '261268254-00008', 'Aenean@dolordolor.edu', _binary '', '2018-05-25 08:11:22'),
	(18, 'Imperdiet PC', '', '487843492-00009', 'sit.amet@loremDonec.org', _binary '', '2015-06-12 01:54:19'),
	(19, 'Nisi Magna Sed Industries', '', '957382070-00002', 'imperdiet.non@atlacus.com', _binary '', '2019-01-09 05:56:03'),
	(20, 'Blandit LLC', '', '956178511-00005', 'diam.eu.dolor@adipiscingligula.ca', _binary '', '2016-01-31 13:51:27'),
	(21, 'Sed Sapien Nunc Ltd', '', '425037256-00004', 'et@suscipit.ca', _binary '', '2017-12-25 00:22:39'),
	(22, 'Semper Auctor Inc.', '', '016804767-00008', 'adipiscing.lobortis@uterosnon.net', _binary '', '2019-11-28 13:03:10'),
	(23, 'Euismod LLC', '', '568573729-00007', 'varius.ultrices.mauris@tinciduntcongueturpis.ca', _binary '', '2017-08-13 09:28:32'),
	(24, 'Blandit Enim Incorporated', '', '039763222-00005', 'Donec@faucibuslectus.org', _binary '', '2018-01-13 02:01:28'),
	(25, 'Amet Incorporated', '', '541062253-00003', 'libero.at.auctor@nislsemconsequat.ca', _binary '', '2019-01-06 08:41:51'),
	(26, 'Magna Lorem Ipsum Corp.', '', '817675119-00009', 'consequat.purus@necmaurisblandit.org', _binary '', '2016-02-20 15:39:33'),
	(27, 'Sed Tortor Corporation', '', '722926557-00009', 'tristique@cursus.ca', _binary '', '2020-10-02 02:55:36'),
	(28, 'Nulla Foundation', '', '661612929-00009', 'feugiat.non@id.ca', _binary '', '2016-02-20 15:18:35'),
	(29, 'Auctor Ullamcorper Nisl Ltd', '', '776787327-00001', 'ultricies@ornarefacilisiseget.edu', _binary '', '2017-06-13 02:51:23'),
	(30, 'In Limited', '', '083337667-00006', 'pharetra.nibh.Aliquam@infaucibusorci.com', _binary '', '2020-04-18 15:00:40'),
	(31, 'Phasellus Dolor Elit LLC', '', '144984143-00004', 'tellus@acmattis.edu', _binary '', '2018-02-02 07:10:15'),
	(32, 'Dui LLP', '', '728717935-00007', 'magna.et@Sedauctor.com', _binary '', '2017-05-30 06:43:25'),
	(33, 'At Company', '', '067919167-00006', 'arcu@tempuseu.co.uk', _binary '', '2019-04-03 14:30:54'),
	(34, 'Neque Vitae LLC', '', '723006326-00000', 'eleifend.vitae@lobortisquispede.com', _binary '', '2020-03-10 19:01:21'),
	(35, 'Suspendisse Dui LLC', '', '395167760-00002', 'at.nisi@idmagnaet.ca', _binary '', '2017-02-18 06:59:04'),
	(36, 'Sit Ltd', '', '051586741-00004', 'Phasellus.at@montesnasceturridiculus.net', _binary '', '2017-09-25 22:10:22'),
	(37, 'Sed Diam Industries', '', '837473669-00005', 'suscipit.est@eratSednunc.ca', _binary '', '2016-08-15 21:59:16'),
	(38, 'Euismod Consulting', '', '380860619-00002', 'et.rutrum.eu@nulla.org', _binary '', '2017-10-31 05:31:29'),
	(39, 'Auctor Odio A Associates', '', '142426378-00006', 'scelerisque@eget.net', _binary '', '2018-05-06 12:37:29'),
	(40, 'Enim Consulting', '', '318863313-00009', 'neque.tellus@ipsum.co.uk', _binary '', '2020-04-02 04:27:06'),
	(41, 'Purus Accumsan Interdum Corporation', '', '899685622-00008', 'malesuada@arcueu.net', _binary '', '2015-06-27 04:01:09'),
	(42, 'Porttitor Company', '', '732017744-00002', 'lorem.ut@feugiatplacerat.edu', _binary '', '2016-11-30 14:33:23'),
	(43, 'Ullamcorper Duis At Industries', '', '484310412-00008', 'magna.Lorem.ipsum@eu.org', _binary '', '2017-11-01 02:16:51'),
	(44, 'Justo Proin Inc.', '', '911293884-00001', 'Fusce.mollis@velpedeblandit.net', _binary '', '2017-05-07 16:55:43'),
	(45, 'In Felis Company', '', '636036675-00008', 'a.neque.Nullam@nibh.com', _binary '', '2020-03-24 02:55:48'),
	(46, 'Ac Urna Corporation', '', '696133735-00006', 'at.velit@Phaselluselit.co.uk', _binary '', '2018-03-12 09:03:36'),
	(47, 'Vivamus Associates', '', '530707579-00005', 'id.nunc@musProinvel.org', _binary '', '2018-05-18 12:12:02'),
	(48, 'Metus PC', '', '152484507-00008', 'eleifend.non@tellus.edu', _binary '', '2015-11-01 02:55:22'),
	(49, 'Convallis Ligula Corp.', '', '174063867-00009', 'purus.Maecenas@aauctornon.net', _binary '', '2015-10-24 00:13:36'),
	(50, 'Interdum LLP', '', '249247800-00009', 'elementum.sem.vitae@dignissimMaecenas.edu', _binary '', '2017-03-17 10:50:50'),
	(51, 'Sed Diam Lorem LLC', '', '748537156-00006', 'scelerisque.neque.Nullam@vel.org', _binary '', '2019-05-28 16:25:21'),
	(52, 'Ac Mattis Velit Corp.', '', '204362875-00005', 'magnis@gravidanunc.com', _binary '', '2016-12-23 04:47:52'),
	(53, 'Laoreet Posuere LLC', '', '192490027-00005', 'mauris.ipsum.porta@fringilla.com', _binary '', '2015-04-28 08:39:21'),
	(54, 'Pellentesque Tincidunt Consulting', '', '844064022-00008', 'lacus.Mauris.non@nibh.org', _binary '', '2020-12-20 20:29:13'),
	(55, 'Tincidunt Tempus LLC', '', '861696243-00000', 'interdum.libero.dui@velitin.com', _binary '', '2017-09-21 20:38:08'),
	(56, 'Viverra Donec Incorporated', '', '676134570-00008', 'orci@Nulla.com', _binary '', '2020-10-01 02:55:56'),
	(57, 'Sit Amet Consulting', '', '579352519-00006', 'nec.tellus@sociisnatoquepenatibus.com', _binary '', '2015-09-21 21:41:19'),
	(58, 'Lorem Ipsum Consulting', '', '611357385-00008', 'urna.Nunc.quis@Curabiturut.com', _binary '', '2017-07-16 09:33:00'),
	(59, 'Malesuada Company', '', '972108534-00009', 'Quisque@egetodioAliquam.org', _binary '', '2018-10-31 22:53:00'),
	(60, 'Ante Dictum Foundation', '', '584687024-00003', 'varius.Nam.porttitor@sedsapien.com', _binary '', '2019-11-11 21:34:17'),
	(61, 'Pede Ultrices Incorporated', '', '219515152-00003', 'dictum.magna.Ut@antebibendum.net', _binary '', '2017-11-28 00:10:13'),
	(62, 'Nulla Tincidunt Ltd', '', '871368346-00007', 'diam@estMauris.net', _binary '', '2016-07-28 00:31:24'),
	(63, 'Nunc Ullamcorper Associates', '', '486105950-00001', 'aliquet.lobortis.nisi@nequetellus.net', _binary '', '2019-11-06 22:12:03'),
	(64, 'Phasellus Dolor LLP', '', '786379966-00009', 'malesuada.Integer.id@vitaemauris.org', _binary '', '2019-07-18 02:34:38'),
	(65, 'Risus Ltd', '', '656198835-00000', 'quis@CraspellentesqueSed.ca', _binary '', '2020-12-03 23:17:31'),
	(66, 'Quam Institute', '', '301588133-00001', 'augue@volutpatNulla.edu', _binary '', '2019-04-15 03:34:29'),
	(67, 'Id Ante Ltd', '', '585203870-00001', 'feugiat.non.lobortis@duinec.net', _binary '', '2020-01-09 04:56:50'),
	(68, 'Vivamus Nisi Consulting', '', '643040967-00009', 'pharetra.Nam.ac@interdum.co.uk', _binary '', '2016-11-05 01:29:15'),
	(69, 'Montes Nascetur LLC', '', '810820472-00001', 'Nunc@semutdolor.co.uk', _binary '', '2019-03-08 19:56:29'),
	(70, 'Nulla Facilisis Industries', '', '670455369-00009', 'turpis@Fusce.ca', _binary '', '2018-11-16 02:45:10'),
	(71, 'Faucibus Associates', '', '640561809-00008', 'augue.porttitor.interdum@facilisislorem.edu', _binary '', '2019-06-29 02:20:21'),
	(72, 'Sem Consequat Nec Foundation', '', '067784413-00006', 'sapien.Nunc@Phasellusinfelis.ca', _binary '', '2016-12-26 08:07:06'),
	(73, 'Aliquam Enim Inc.', '', '769330333-00006', 'magna.Nam@utmolestiein.ca', _binary '', '2019-12-23 18:07:23'),
	(74, 'A Neque Nullam PC', '', '756352308-00008', 'iaculis.odio.Nam@Etiambibendumfermentum.net', _binary '', '2016-08-30 12:27:49'),
	(75, 'A Sollicitudin Foundation', '', '690523428-00009', 'auctor.odio@Phasellusnulla.com', _binary '', '2018-04-23 01:39:20'),
	(76, 'Integer Foundation', '', '799264726-00008', 'dolor@ornarelectusante.edu', _binary '', '2020-04-23 07:20:57'),
	(77, 'Vivamus Nisi Mauris Corporation', '', '081004012-00001', 'Praesent.eu.dui@liberoestcongue.edu', _binary '', '2020-03-13 16:05:11'),
	(78, 'Ac Feugiat Inc.', '', '220246805-00000', 'cursus.vestibulum@etrisus.ca', _binary '', '2016-07-24 08:23:16'),
	(79, 'Malesuada Fames Ac LLC', '', '283565471-00002', 'semper.et.lacinia@ipsumDonec.edu', _binary '', '2015-05-06 12:37:54'),
	(80, 'In Institute', '', '353684939-00005', 'enim@scelerisquescelerisquedui.net', _binary '', '2018-10-22 03:50:59'),
	(81, 'Phasellus Fermentum LLP', '', '846964112-00003', 'nec@Phasellus.ca', _binary '', '2016-12-31 19:03:30'),
	(82, 'Proin Dolor Institute', '', '618119473-00006', 'ante.iaculis.nec@imperdietullamcorperDuis.ca', _binary '', '2016-08-26 07:33:24'),
	(83, 'Nunc Limited', '', '814249140-00009', 'sit@ametluctusvulputate.ca', _binary '', '2015-12-01 14:50:20'),
	(84, 'Morbi PC', '', '658621743-00009', 'eros@vitaediam.org', _binary '', '2015-01-11 10:33:29'),
	(85, 'Egestas Rhoncus Incorporated', '', '546528084-00009', 'at.pede.Cras@rhoncusDonecest.edu', _binary '', '2020-08-24 07:36:26'),
	(86, 'Id Limited', '', '270102239-00000', 'velit@maurisblanditmattis.edu', _binary '', '2018-12-02 17:54:04'),
	(87, 'Et LLP', '', '188860076-00002', 'nascetur.ridiculus@gravidamauris.co.uk', _binary '', '2018-09-05 22:23:14'),
	(88, 'Erat Semper Inc.', '', '710595943-00006', 'in.felis.Nulla@estMauris.com', _binary '', '2019-03-17 00:10:29'),
	(89, 'Massa Integer Corporation', '', '187712708-00002', 'enim@ligulatortordictum.com', _binary '', '2020-11-06 20:04:11'),
	(90, 'Nonummy Ut Molestie Incorporated', '', '086575990-00006', 'enim@elitAliquamauctor.edu', _binary '', '2015-04-20 15:27:16'),
	(91, 'Montes Inc.', '', '018796169-00003', 'pede.Cum@orciquis.ca', _binary '', '2016-10-18 00:42:49'),
	(92, 'Nec Orci Donec Incorporated', '', '709250765-00001', 'nibh.Aliquam.ornare@pellentesquetellussem.edu', _binary '', '2017-01-13 21:10:15'),
	(93, 'Fermentum LLP', '', '482666849-00005', 'vestibulum@ornaresagittis.org', _binary '', '2016-11-20 20:52:25'),
	(94, 'Ipsum Consulting', '', '545621476-00005', 'quis@gravida.net', _binary '', '2019-05-15 22:19:30'),
	(95, 'Pellentesque Tellus Consulting', '', '427232137-00005', 'facilisis.vitae@volutpatNulla.org', _binary '', '2016-03-27 11:23:16'),
	(96, 'Mattis LLC', '', '625484126-00002', 'sit.amet@orciDonec.ca', _binary '', '2017-09-19 21:21:44'),
	(97, 'Auctor Associates', '', '809081292-00009', 'massa.Vestibulum.accumsan@molestie.com', _binary '', '2020-06-15 16:10:36'),
	(98, 'Mauris Blandit Mattis Associates', '', '880476932-00004', 'parturient.montes@aliquamiaculis.co.uk', _binary '', '2020-02-02 05:54:05'),
	(99, 'Augue Porttitor Consulting', '', '501654883-00005', 'ipsum.Donec@elitEtiam.edu', _binary '', '2015-04-15 01:43:35'),
	(100, 'Nibh Quisque Nonummy LLP', '', '292479961-00008', 'dictum.Phasellus@magnaLoremipsum.com', _binary '', '2018-05-21 19:27:29');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.familia
CREATE TABLE IF NOT EXISTS `familia` (
  `idfamilia` int(11) NOT NULL AUTO_INCREMENT,
  `familia` varchar(50) NOT NULL,
  `nombre_imagen` varchar(50) NOT NULL DEFAULT 'no-imagen.svg',
  KEY `idfamilia` (`idfamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.familia: ~21 rows (aproximadamente)
DELETE FROM `familia`;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` (`idfamilia`, `familia`, `nombre_imagen`) VALUES
	(1, 'Agraria', 'no-imagen.svg'),
	(2, 'Actividades físicas y deportivas', 'actividades-fisicas.jpg'),
	(3, 'Administración y gestión', 'administracion-gestion.jpg'),
	(4, 'Artes gráficas', 'no-imagen.svg'),
	(5, 'Comercio y marketing', 'no-imagen.svg'),
	(6, 'Edificación y obra civil', 'no-imagen.svg'),
	(7, 'Electricidad y electrónica', 'no-imagen.svg'),
	(8, 'Energía y agua', 'no-imagen.svg'),
	(9, 'Fabricación mecánica', 'no-imagen.svg'),
	(10, 'Hostelería y turismo', 'no-imagen.svg'),
	(11, 'Imagen personal', 'no-imagen.svg'),
	(12, 'Imagen y sonido', 'no-imagen.svg'),
	(13, 'Industrias alimentarias', 'no-imagen.svg'),
	(14, 'Informática y comunicaciones', 'no-imagen.svg'),
	(15, 'Instalación y mantenimiento', 'no-imagen.svg'),
	(16, 'Madera, mueble y corcho', 'no-imagen.svg'),
	(17, 'Marítimo pesquera', 'no-imagen.svg'),
	(18, 'Química', 'no-imagen.svg'),
	(19, 'Sanidad', 'no-imagen.svg'),
	(20, 'Servicios socioculturales y a la comunidad', 'no-imagen.svg'),
	(21, 'Transporte y mantenimiento de vehículos', 'no-imagen.svg'),
	(22, 'Textil, confección y piel', 'no-imagen.svg'),
	(23, 'Seguridad y medio ambiente', 'no-imagen.svg');
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
  CONSTRAINT `FK_inscripciones_empleo` FOREIGN KEY (`idempleo`) REFERENCES `empleos` (`idempleo`),
  CONSTRAINT `FK_inscripciones_titulado` FOREIGN KEY (`idtitulado`) REFERENCES `titulados` (`idtitulado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.inscripciones: ~0 rows (aproximadamente)
DELETE FROM `inscripciones`;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.titulados
CREATE TABLE IF NOT EXISTS `titulados` (
  `idtitulado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` blob NOT NULL,
  `fecha_titulacion` date NOT NULL,
  `curriculum` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  KEY `idtitulado` (`idtitulado`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.titulados: ~100 rows (aproximadamente)
DELETE FROM `titulados`;
/*!40000 ALTER TABLE `titulados` DISABLE KEYS */;
INSERT INTO `titulados` (`idtitulado`, `nombre`, `apellidos`, `direccion`, `dni`, `telefono`, `email`, `contrasena`, `fecha_titulacion`, `curriculum`, `foto`, `fecha_registro`) VALUES
	(1, 'Jael', 'Blevins', '', '27040778', '09 09 04 38 00', 'laoreet.lectus@felisullamcorperviverra.edu', _binary '', '2018-08-11', '', '', '2020-03-11 17:50:02'),
	(2, 'Yen', 'Orr', '', '23035831', '08 97 00 78 32', 'a.feugiat@tellusnon.ca', _binary '', '2015-01-28', '', '', '2020-10-12 09:36:04'),
	(3, 'Melanie', 'Morales', '', '16640457', '05 60 99 85 47', 'cursus.vestibulum.Mauris@cubilia.org', _binary '', '2016-06-21', '', '', '2016-12-02 17:05:31'),
	(4, 'Paul', 'Kemp', '', '17236136', '09 01 90 67 43', 'ultricies.sem@loremlorem.org', _binary '', '2016-02-27', '', '', '2017-06-13 19:59:24'),
	(5, 'Ray', 'Shepherd', '', '43380789', '02 36 32 01 01', 'sed.pede.Cum@aauctor.net', _binary '', '2020-03-10', '', '', '2015-12-20 13:23:02'),
	(6, 'Mark', 'Dillon', '', '31063589', '07 47 88 76 65', 'tincidunt.neque.vitae@Donec.org', _binary '', '2016-12-06', '', '', '2019-06-06 23:11:22'),
	(7, 'Cooper', 'Banks', '', '23507969', '02 32 42 03 36', 'massa.Integer@lectus.org', _binary '', '2018-02-09', '', '', '2016-10-03 06:12:52'),
	(8, 'Lawrence', 'Dillard', '', '26543653', '08 61 59 98 72', 'enim@magnaSedeu.net', _binary '', '2016-01-02', '', '', '2019-05-24 06:26:59'),
	(9, 'Yen', 'Austin', '', '30119004', '05 60 62 18 02', 'accumsan@acturpisegestas.ca', _binary '', '2016-04-22', '', '', '2016-01-02 15:49:38'),
	(10, 'Alisa', 'Benson', '', '45507234', '07 03 01 30 29', 'arcu@sit.net', _binary '', '2019-10-09', '', '', '2015-02-02 14:52:39'),
	(11, 'Stacey', 'Spears', '', '37467774', '03 18 58 26 28', 'posuere.cubilia@congueelit.edu', _binary '', '2017-08-05', '', '', '2017-08-12 23:57:46'),
	(12, 'Gisela', 'Stokes', '', '17000271', '04 86 70 97 74', 'Donec.est.Nunc@ligulaAliquam.edu', _binary '', '2020-03-29', '', '', '2018-06-27 04:06:00'),
	(13, 'Andrew', 'Holcomb', '', '15855323', '05 84 68 39 04', 'fringilla@seddictum.edu', _binary '', '2017-09-02', '', '', '2017-12-28 20:34:00'),
	(14, 'Dorothy', 'Beach', '', '11441582', '07 85 99 35 15', 'dictum.Proin@Maecenasiaculis.org', _binary '', '2018-09-20', '', '', '2020-01-29 07:46:55'),
	(15, 'Linus', 'Harper', '', '39395346', '08 38 42 72 87', 'Phasellus.at.augue@Nam.com', _binary '', '2017-03-31', '', '', '2020-11-07 16:32:16'),
	(16, 'Rafael', 'Frederick', '', '16362797', '07 70 29 45 53', 'Etiam.imperdiet.dictum@ultricessitamet.net', _binary '', '2020-01-26', '', '', '2017-05-25 21:33:39'),
	(17, 'Zane', 'Montoya', '', '29516269', '07 24 60 92 57', 'Proin.vel.nisl@Cum.edu', _binary '', '2018-10-26', '', '', '2018-07-17 22:12:00'),
	(18, 'Jorden', 'Curry', '', '7585421', '07 09 26 75 27', 'condimentum@Sednunc.net', _binary '', '2016-03-23', '', '', '2017-05-06 17:37:12'),
	(19, 'Rae', 'Jenkins', '', '25450798', '08 88 38 74 80', 'Pellentesque.ut@ultriciesdignissimlacus.co.uk', _binary '', '2016-10-08', '', '', '2017-09-29 17:23:02'),
	(20, 'Xandra', 'Burgess', '', '8176002', '09 64 76 49 98', 'faucibus.orci.luctus@netusetmalesuada.ca', _binary '', '2018-12-06', '', '', '2017-01-20 15:26:45'),
	(21, 'Teagan', 'Reese', '', '32805834', '09 83 89 69 07', 'mi.Duis@eu.net', _binary '', '2017-06-04', '', '', '2019-02-15 23:43:12'),
	(22, 'Nehru', 'Nelson', '', '24933619', '02 92 98 24 74', 'lobortis.tellus.justo@Maurisvelturpis.co.uk', _binary '', '2019-04-24', '', '', '2020-11-25 00:17:52'),
	(23, 'Blossom', 'Ayala', '', '28977201', '03 46 16 04 01', 'euismod.urna.Nullam@malesuadamalesuada.co.uk', _binary '', '2020-11-22', '', '', '2020-11-13 19:12:14'),
	(24, 'Maggie', 'Bradley', '', '17695989', '08 58 60 34 42', 'orci.Ut@erosNamconsequat.edu', _binary '', '2017-02-13', '', '', '2016-04-16 18:28:42'),
	(25, 'Abigail', 'Delaney', '', '47010474', '09 25 82 34 40', 'Quisque.nonummy@risus.com', _binary '', '2020-08-10', '', '', '2017-09-04 22:40:21'),
	(26, 'Jenna', 'Combs', '', '28123830', '03 85 67 44 92', 'sed.turpis.nec@liberomaurisaliquam.net', _binary '', '2018-06-18', '', '', '2020-11-09 17:09:28'),
	(27, 'Kenneth', 'Weeks', '', '42832983', '01 93 60 03 69', 'aliquet.vel@ligulaDonecluctus.co.uk', _binary '', '2019-08-19', '', '', '2017-02-28 19:39:53'),
	(28, 'Miriam', 'Watts', '', '19264367', '05 07 76 94 56', 'sapien.cursus@magnaLorem.edu', _binary '', '2019-10-17', '', '', '2015-11-04 23:34:44'),
	(29, 'Clark', 'Orr', '', '7016506', '02 64 28 39 43', 'enim.Curabitur.massa@utmolestiein.ca', _binary '', '2017-11-14', '', '', '2020-06-15 07:38:29'),
	(30, 'Elvis', 'Clarke', '', '19829889', '07 47 91 83 32', 'Donec.porttitor.tellus@eleifendvitaeerat.edu', _binary '', '2017-02-06', '', '', '2020-02-01 15:43:26'),
	(31, 'Victoria', 'Holloway', '', '24048102', '06 13 24 04 64', 'mi.felis@velvenenatisvel.net', _binary '', '2015-07-31', '', '', '2017-04-18 05:18:57'),
	(32, 'Callum', 'Tucker', '', '37563505', '06 11 56 44 41', 'Nullam@sedsapienNunc.org', _binary '', '2018-03-18', '', '', '2016-09-06 11:45:28'),
	(33, 'Selma', 'Savage', '', '17253269', '08 08 60 24 75', 'ultricies.adipiscing@iaculis.edu', _binary '', '2019-06-24', '', '', '2019-04-28 09:44:31'),
	(34, 'Travis', 'Black', '', '32733603', '04 90 93 10 21', 'tincidunt@Phasellusdapibusquam.org', _binary '', '2016-08-30', '', '', '2018-02-07 07:18:53'),
	(35, 'Ivory', 'Kirk', '', '22180903', '01 81 00 38 31', 'lorem.vehicula.et@dictum.co.uk', _binary '', '2016-01-28', '', '', '2016-10-16 15:07:25'),
	(36, 'Harper', 'Solis', '', '27583881', '06 16 44 06 73', 'parturient.montes.nascetur@est.com', _binary '', '2020-03-26', '', '', '2015-05-31 03:17:25'),
	(37, 'Oleg', 'Wade', '', '47774262', '03 09 22 68 37', 'diam.at@tristique.com', _binary '', '2017-08-15', '', '', '2020-01-12 11:45:54'),
	(38, 'Alana', 'Dunlap', '', '38236749', '04 66 64 25 52', 'et.ultrices.posuere@nunc.com', _binary '', '2017-09-06', '', '', '2017-10-28 10:11:54'),
	(39, 'Paul', 'Cummings', '', '10524649', '02 43 62 21 25', 'Suspendisse@etmalesuadafames.net', _binary '', '2015-07-29', '', '', '2018-11-01 09:33:20'),
	(40, 'Luke', 'Henry', '', '23146454', '01 02 19 71 50', 'ut@lorem.edu', _binary '', '2018-05-28', '', '', '2020-12-11 19:15:37'),
	(41, 'Yardley', 'Stone', '', '8391122', '08 01 99 22 91', 'et.magna.Praesent@Duissitamet.org', _binary '', '2020-04-13', '', '', '2019-04-10 01:02:20'),
	(42, 'Rashad', 'Francis', '', '41703894', '05 83 99 17 69', 'lacus.Nulla.tincidunt@tellusSuspendisse.co.uk', _binary '', '2017-11-10', '', '', '2015-07-19 11:39:59'),
	(43, 'Knox', 'Chase', '', '39122930', '05 40 71 22 92', 'per@Intinciduntcongue.co.uk', _binary '', '2017-01-02', '', '', '2015-11-04 23:55:18'),
	(44, 'Julian', 'Heath', '', '7579495', '02 77 70 17 44', 'ac.feugiat@metusAeneansed.org', _binary '', '2016-10-13', '', '', '2018-09-15 10:16:20'),
	(45, 'Elaine', 'Rice', '', '28289979', '02 17 07 60 09', 'suscipit.est.ac@necenimNunc.co.uk', _binary '', '2019-04-18', '', '', '2018-05-03 02:50:27'),
	(46, 'Flynn', 'Chaney', '', '42494263', '08 34 13 51 09', 'vitae.erat.vel@acipsumPhasellus.net', _binary '', '2016-12-11', '', '', '2019-06-15 19:54:26'),
	(47, 'Colton', 'Jacobs', '', '29988010', '09 24 05 67 59', 'non@consequatnec.org', _binary '', '2020-02-09', '', '', '2018-07-31 15:57:24'),
	(48, 'Nicole', 'Key', '', '34734847', '07 48 69 25 53', 'nascetur.ridiculus@vestibulum.org', _binary '', '2017-11-30', '', '', '2015-12-21 19:21:35'),
	(49, 'Hilda', 'Hardin', '', '16592191', '07 52 84 82 52', 'mauris.ipsum@mauriseuelit.edu', _binary '', '2020-10-05', '', '', '2020-08-01 19:50:35'),
	(50, 'Gay', 'Schroeder', '', '37003164', '06 09 24 56 28', 'euismod@Donectempor.ca', _binary '', '2018-10-28', '', '', '2020-06-18 09:04:51'),
	(51, 'Ciaran', 'Peters', '', '18266333', '04 10 08 68 68', 'tincidunt.orci@aarcu.org', _binary '', '2016-10-10', '', '', '2019-01-13 07:24:00'),
	(52, 'Amanda', 'Romero', '', '16598070', '07 93 70 49 62', 'a@augueeutellus.edu', _binary '', '2020-11-02', '', '', '2018-08-10 02:46:57'),
	(53, 'Claudia', 'Velasquez', '', '25481278', '04 00 75 28 06', 'tellus@Namligulaelit.co.uk', _binary '', '2015-09-11', '', '', '2016-01-20 16:27:52'),
	(54, 'Tad', 'Durham', '', '40010879', '09 29 15 89 70', 'sit@semelit.com', _binary '', '2015-07-26', '', '', '2016-08-03 20:01:46'),
	(55, 'Kylee', 'Jimenez', '', '15141540', '01 55 07 04 70', 'Integer@bibendumullamcorperDuis.org', _binary '', '2020-02-13', '', '', '2020-02-25 04:01:15'),
	(56, 'Gage', 'Ferrell', '', '28748665', '09 73 01 43 56', 'vitae@cursus.edu', _binary '', '2017-03-30', '', '', '2015-03-18 14:57:48'),
	(57, 'Carly', 'Sykes', '', '21214542', '03 04 57 32 05', 'ac.urna.Ut@etultrices.net', _binary '', '2017-07-24', '', '', '2019-12-07 09:55:45'),
	(58, 'Isabelle', 'Butler', '', '26346109', '07 44 21 24 69', 'sem.consequat@enimSed.com', _binary '', '2015-12-13', '', '', '2019-06-21 13:17:23'),
	(59, 'Amal', 'Madden', '', '8871281', '09 35 60 64 85', 'nascetur.ridiculus@amet.com', _binary '', '2017-05-15', '', '', '2016-10-23 04:15:16'),
	(60, 'Katell', 'Farmer', '', '10835867', '02 28 93 24 23', 'dis.parturient.montes@morbitristiquesenectus.co.uk', _binary '', '2016-01-02', '', '', '2018-09-26 19:39:56'),
	(61, 'Rahim', 'Walker', '', '5793037', '03 41 11 97 15', 'ornare.sagittis.felis@indolor.edu', _binary '', '2020-09-13', '', '', '2020-10-01 06:50:28'),
	(62, 'Dai', 'Austin', '', '27993484', '04 56 15 84 49', 'Integer@auguemalesuada.co.uk', _binary '', '2015-11-17', '', '', '2020-02-20 21:15:58'),
	(63, 'Yuri', 'Burch', '', '12844158', '02 44 70 20 26', 'augue.scelerisque.mollis@malesuada.net', _binary '', '2017-10-25', '', '', '2015-07-03 07:52:50'),
	(64, 'Lamar', 'Malone', '', '8856852', '08 53 94 31 07', 'ligula.Aenean@erat.com', _binary '', '2020-05-24', '', '', '2019-02-12 01:33:54'),
	(65, 'Martha', 'Gates', '', '11822737', '01 48 82 69 13', 'nec.urna@sapiengravida.net', _binary '', '2015-01-21', '', '', '2016-07-04 15:22:44'),
	(66, 'Gail', 'Carroll', '', '11162749', '08 92 75 58 94', 'ultricies.sem.magna@mauris.edu', _binary '', '2019-03-01', '', '', '2019-12-09 12:12:56'),
	(67, 'Burke', 'Alvarado', '', '17445621', '04 49 75 73 08', 'massa.Quisque.porttitor@congueaaliquet.com', _binary '', '2015-10-04', '', '', '2016-12-26 02:36:29'),
	(68, 'Jackson', 'Mason', '', '30098756', '02 34 95 76 04', 'mauris@sagittis.org', _binary '', '2020-05-12', '', '', '2017-08-01 00:12:55'),
	(69, 'Hamish', 'Whitney', '', '36393124', '01 26 74 53 41', 'neque@sodales.ca', _binary '', '2018-07-04', '', '', '2016-12-14 13:54:29'),
	(70, 'Lana', 'Cooper', '', '34985657', '06 21 99 22 11', 'ornare@orciluctuset.com', _binary '', '2017-12-31', '', '', '2019-07-20 03:50:36'),
	(71, 'Gavin', 'Church', '', '15143220', '05 26 92 11 48', 'libero.at@Nullafacilisi.edu', _binary '', '2018-10-14', '', '', '2019-08-18 18:45:40'),
	(72, 'Charde', 'Shannon', '', '32797469', '09 21 53 05 75', 'massa.Suspendisse@nonenimcommodo.edu', _binary '', '2017-02-20', '', '', '2016-04-21 14:56:13'),
	(73, 'Jenna', 'Cook', '', '36602193', '03 17 41 01 28', 'congue@sapien.ca', _binary '', '2020-11-06', '', '', '2020-07-21 19:54:39'),
	(74, 'Amery', 'Franklin', '', '29303952', '05 34 80 64 74', 'pede.ac@leoelementumsem.ca', _binary '', '2020-04-13', '', '', '2019-08-31 10:50:13'),
	(75, 'Raymond', 'Harvey', '', '20229728', '09 69 67 32 51', 'diam.luctus.lobortis@tincidunt.com', _binary '', '2020-07-18', '', '', '2019-08-14 10:08:21'),
	(76, 'Christen', 'Summers', '', '22282655', '01 50 19 80 92', 'arcu@vitaesemper.org', _binary '', '2018-12-15', '', '', '2017-02-07 04:54:11'),
	(77, 'Shana', 'Shepard', '', '29223469', '01 97 65 67 86', 'montes.nascetur.ridiculus@telluseuaugue.ca', _binary '', '2019-11-20', '', '', '2017-09-08 07:17:42'),
	(78, 'Kay', 'Calhoun', '', '27363811', '03 73 79 74 70', 'vitae.orci@liberoInteger.co.uk', _binary '', '2020-11-13', '', '', '2020-08-16 01:49:14'),
	(79, 'Neil', 'Page', '', '20488478', '07 44 59 47 60', 'eu.ligula@lobortisrisus.co.uk', _binary '', '2015-04-05', '', '', '2018-01-27 22:09:20'),
	(80, 'Timothy', 'Buck', '', '37931519', '06 31 46 60 50', 'ipsum@Quisqueac.org', _binary '', '2015-09-11', '', '', '2020-04-07 06:18:32'),
	(81, 'Cassidy', 'Chen', '', '21085345', '08 75 35 10 44', 'nisl@scelerisque.com', _binary '', '2016-06-30', '', '', '2016-09-20 12:05:22'),
	(82, 'Yolanda', 'Miles', '', '20526241', '06 12 26 69 01', 'vulputate.eu@cursusvestibulumMauris.org', _binary '', '2015-06-02', '', '', '2017-12-11 19:17:00'),
	(83, 'Vanna', 'Chavez', '', '6471631', '08 24 72 25 90', 'lacus@pedeSuspendisse.net', _binary '', '2018-08-21', '', '', '2019-03-13 00:35:34'),
	(84, 'Patience', 'Ballard', '', '10380546', '09 55 89 34 03', 'ligula.Nullam@gravidamaurisut.org', _binary '', '2015-01-10', '', '', '2017-10-23 04:21:25'),
	(85, 'Neve', 'Wilson', '', '46753658', '01 59 06 04 33', 'placerat@Aliquam.edu', _binary '', '2016-10-10', '', '', '2019-01-10 21:45:38'),
	(86, 'Scarlett', 'Everett', '', '25391697', '02 02 18 38 17', 'eu@iaculis.ca', _binary '', '2017-11-02', '', '', '2020-06-19 10:40:36'),
	(87, 'Benedict', 'Holland', '', '42310138', '02 83 85 95 73', 'mollis@Integermollis.co.uk', _binary '', '2016-01-30', '', '', '2018-05-15 21:24:25'),
	(88, 'Stone', 'Valencia', '', '20283862', '01 08 72 35 20', 'congue@porttitoreros.org', _binary '', '2016-02-29', '', '', '2016-11-21 06:58:37'),
	(89, 'Hashim', 'Marquez', '', '23604075', '04 08 83 08 59', 'erat.vitae@tellus.co.uk', _binary '', '2020-01-24', '', '', '2018-12-06 00:45:22'),
	(90, 'Reagan', 'Howe', '', '6846145', '02 87 17 98 60', 'penatibus.et@metusVivamus.co.uk', _binary '', '2015-02-18', '', '', '2016-11-29 04:43:50'),
	(91, 'Ulysses', 'Baldwin', '', '12805927', '06 33 47 02 52', 'tortor@ipsum.co.uk', _binary '', '2019-06-07', '', '', '2015-06-09 11:13:26'),
	(92, 'Ahmed', 'Morton', '', '47924329', '02 05 03 65 73', 'porttitor.scelerisque@senectus.edu', _binary '', '2015-08-02', '', '', '2016-06-03 01:47:44'),
	(93, 'Audrey', 'Conley', '', '50268292', '05 18 70 32 29', 'vulputate@Vivamuseuismodurna.net', _binary '', '2017-04-11', '', '', '2016-12-15 16:26:31'),
	(94, 'Sara', 'West', '', '37311382', '01 31 42 33 50', 'Integer.aliquam@Maurisnulla.net', _binary '', '2017-07-21', '', '', '2015-11-27 06:35:43'),
	(95, 'Frances', 'Henderson', '', '11346429', '01 85 75 78 05', 'Nunc@fermentum.edu', _binary '', '2018-01-26', '', '', '2015-02-15 18:41:33'),
	(96, 'Ray', 'Roy', '', '22117388', '01 19 09 21 33', 'Quisque@Nuncac.net', _binary '', '2015-08-18', '', '', '2017-11-16 23:32:56'),
	(97, 'Yetta', 'Bray', '', '9627547', '02 66 31 42 67', 'lorem@facilisisnon.org', _binary '', '2017-03-25', '', '', '2015-01-22 10:14:36'),
	(98, 'Alea', 'Lancaster', '', '20733017', '09 77 36 78 87', 'fermentum.arcu@rhoncusidmollis.net', _binary '', '2019-10-20', '', '', '2018-01-29 07:53:45'),
	(99, 'Laurel', 'Duncan', '', '43376133', '08 75 18 31 33', 'sed.libero.Proin@dapibus.ca', _binary '', '2015-03-15', '', '', '2019-06-26 14:36:01'),
	(100, 'Gabriel', 'Chang', '', '35594186', '02 24 05 62 36', 'et@loremsit.com', _binary '', '2015-09-23', '', '', '2019-12-04 03:58:55');
/*!40000 ALTER TABLE `titulados` ENABLE KEYS */;

-- Volcando estructura para tabla nuevoempleo.tituladostitulacion
CREATE TABLE IF NOT EXISTS `tituladostitulacion` (
  `idtitulado` int(11) NOT NULL,
  `idtitulacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  KEY `FK_tituladostitulacion_titulados` (`idtitulado`),
  KEY `FK_titulados_titulacion` (`idtitulacion`),
  CONSTRAINT `FK_titulados_titulacion` FOREIGN KEY (`idtitulacion`) REFERENCES `titulos` (`idtitulo`),
  CONSTRAINT `FK_tituladostitulacion_titulados` FOREIGN KEY (`idtitulado`) REFERENCES `titulados` (`idtitulado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.tituladostitulacion: ~0 rows (aproximadamente)
DELETE FROM `tituladostitulacion`;
/*!40000 ALTER TABLE `tituladostitulacion` DISABLE KEYS */;
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
