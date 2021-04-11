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

-- Volcando estructura para tabla nuevoempleo.titulados
CREATE TABLE IF NOT EXISTS `titulados` (
  `idtitulado` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla nuevoempleo.titulados: ~100 rows (aproximadamente)
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
