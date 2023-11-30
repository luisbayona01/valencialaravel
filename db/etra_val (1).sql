-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-11-2023 a las 20:52:12
-- Versión del servidor: 5.7.40
-- Versión de PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `etra_val`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcionelementos`
--

DROP TABLE IF EXISTS `descripcionelementos`;
CREATE TABLE IF NOT EXISTS `descripcionelementos` (
  `elemento` int(20) NOT NULL,
  `ud` text NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoparte`
--

DROP TABLE IF EXISTS `estadoparte`;
CREATE TABLE IF NOT EXISTS `estadoparte` (
  `id` int(11) NOT NULL,
  `estadoparte` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadoparte`
--

INSERT INTO `estadoparte` (`id`, `estadoparte`) VALUES
(1, 'Activo'),
(2, 'Aceptado'),
(3, 'Rechazado'),
(4, 'Certificado'),
(5, 'Comprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

DROP TABLE IF EXISTS `localizacion`;
CREATE TABLE IF NOT EXISTS `localizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_localizacion` varchar(255) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `zona` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`id`, `cod_localizacion`, `descripcion`, `zona`) VALUES
(1, 'a', 'PL. DE L\'AJUNTAMENT - SANGRE', 1),
(2, 'A20108', 'PL. DE L\'AJUNTAMENT - SANGRE', 1),
(3, 'A20109 ', 'JATIVA - SAN VICENTE', 1),
(4, 'A20110 ', 'GUILLEM DE CASTRO - JESUS', 1),
(5, 'A20111 ', 'BARON DE CARCER - PLAZA SAN AGUSTIN', 1),
(6, 'A20112 ', 'SAN VICENTE - PERIODISTA AZZATI', 1),
(7, 'A20113 ', 'SAN VICENTE - SANGRE', 1),
(8, 'A20114 ', 'SAN VICENTE - COTANDA', 1),
(9, 'A20115 ', 'SAN VICENTE - MARIA CRISTINA', 1),
(10, 'A20116 ', 'PL. DE L\'AJUNTAMENT - SAN VICENTE', 1),
(11, 'A20117 ', 'MERCADO CENTRAL - MARIA CRISTINA', 1),
(12, 'A20118 ', 'BARON DE CARCER - CALABAZAS', 1),
(13, 'A20119 ', 'BARON DE CARCER - LINTERNA', 1),
(14, 'A20120 ', 'BARON DE CARCER - GARRIGUES', 1),
(15, 'A20121 ', 'BARON DE CARCER - QUEVEDO', 1),
(16, 'A20122 ', 'BARON DE CARCER - GRABADOR SELMA - PADILLA', 1),
(17, 'A20123 ', 'PASCUAL Y GENIS - LAURIA', 1),
(18, 'A20124 ', 'PASCUAL Y GENIS - SAGASTA', 1),
(19, 'A20125 ', 'BARCAS - PINTOR SOROLLA', 1),
(20, 'A20126 ', 'POETA QUEROL - SALVA', 1),
(21, 'A20127 ', 'JATIVA - MARQUES DE SOTELO', 1),
(22, 'A20128 ', 'COBERTIZO SAN PABLO - ARZOBISPO MAYORAL', 1),
(23, 'A20201 ', 'CONDE TRENOR - PUENTE TRINIDAD', 1),
(24, 'A20202 ', 'PINTOR LOPEZ - POETA LLORENTE', 1),
(25, 'A20203 ', 'PLAZA TETUAN - PUENTE DEL REAL', 1),
(26, 'A20204 ', 'PLAZA TETUAN - CAPITANIA', 1),
(27, 'A20205 ', 'GENERAL TOVAR - MAR', 1),
(28, 'A20206 ', 'PZA. ALFONSO EL MAGNANIMO - POETA QUINTANA - CERDAN TALLADA', 1),
(29, 'A20207 ', 'PLAZA PORTA DE LA MAR', 1),
(30, 'A20208 ', 'JUSTICIA - PASARELA - CIUDADELA', 1),
(31, 'A20209 ', 'COLON - CONDE SALVATIERRA', 1),
(32, 'A20210 ', 'COLON - SORNI', 1),
(33, 'A20211 ', 'COLON - ISABEL LA CATOLICA', 1),
(34, 'A20212 ', 'COLON - LAURIA', 1),
(35, 'A20213 ', 'COLON - PIZARRO', 1),
(36, 'A20214 ', 'COLON - FELIX PIZCUETA', 1),
(37, 'A20215 ', 'COLON - RUZAFA', 1),
(38, 'A20217 ', 'SORNI - CONDE SALVATIERRA', 1),
(39, 'A20218 ', 'SORNI - GRABADOR ESTEVE', 1),
(40, 'A20219 ', 'PLAZA AMERICA', 1),
(41, 'A20220 ', 'PINTOR SOROLLA - UNIVERSIDAD - DR. ROMAGOSA', 1),
(42, 'A20221 ', 'PINTOR SOROLLA - PLAZA ALFONSO MAGNANIMO', 1),
(43, 'A20222 ', 'PAZ - COMEDIAS', 1),
(44, 'A20223 ', 'PAZ - MARQUES DE DOS AGUAS', 1),
(45, 'A20224 ', 'PLAZA REINA - PAZ', 1),
(46, 'A20225 ', 'PLAZA SAN VICENTE FERRER', 1),
(47, 'A20230 ', 'TORRES DE SERRANOS', 1),
(48, 'A20301 ', 'MARQUES DEL TURIA - GREGORIO MAYANS', 1),
(49, 'A20302 ', 'MARQUES DEL TURIA - TAQUIGRAFO MARTI', 1),
(50, 'A20303 ', 'MARQUES DEL TURIA - MAESTRO GOZALBO', 1),
(51, 'A20304 ', 'MARQUES DEL TURIA - ALMIRANTE CADARSO', 1),
(52, 'A20305 ', 'MARQUES DEL TURIA - JOAQUIN COSTA', 1),
(53, 'A20306 ', 'MARQUES DEL TURIA - CISCAR', 1),
(54, 'A20307 ', 'MARQUES DEL TURIA - SALAMANCA', 1),
(55, 'A20308 ', 'MARQUES DEL TURIA - JACINTO BENAVENTE', 1),
(56, 'A20309 ', 'JACINTO BENAVENTE - PUENTE ARAGON', 1),
(57, 'A20310 ', 'MARQUES DEL TURIA - GRABADOR ESTEVE', 1),
(58, 'A20311 ', 'MARQUES DEL TURIA - CONDE SALVATIERRA', 1),
(59, 'A20312 ', 'MARQUES DEL TURIA - JORGE JUAN', 1),
(60, 'A20313 ', 'MARQUES DEL TURIA - ISABEL LA CATOLICA', 1),
(61, 'A20314 ', 'MARQUES DEL TURIA - HERNAN CORTES', 1),
(62, 'A20315 ', 'MARQUES DEL TURIA - PIZARRO', 1),
(63, 'A20316 ', 'MARQUES DEL TURIA - FELIX PIZCUETA', 1),
(64, 'A20317 ', 'MARQUES DEL TURIA - GENERAL SANMARTIN', 1),
(65, 'A20318 ', 'MAESTRO AGUILAR - PEDRO III', 1),
(66, 'A20319 ', 'PLAZA BARON DE CORTES', 1),
(67, 'A20320 ', 'PLAZA LANDETE', 1),
(68, 'A20321 ', 'REINO DE VALENCIA - PINTOR SALVADOR ABRIL', 1),
(69, 'A20322 ', 'CONDE ALTEA - JOAQUIN COSTA', 1),
(70, 'A20323 ', 'CONDE ALTEA - CISCAR', 1),
(71, 'A20324 ', 'BURRIANA - JOAQUIN COSTA', 1),
(72, 'A20325 ', 'BURRIANA - CISCAR', 1),
(73, 'A20326 ', 'GRAN VIA GERMANIAS - ALICANTE', 1),
(74, 'A20327 ', 'PEDRO III EL GRANDE - PINTOR SALVADOR ABRIL', 1),
(75, 'A20331 ', 'MARQUES DEL TURIA - REINO DE VALENCIA', 1),
(76, 'A20401 ', 'JACINTO BENAVENTE - REINA DO¥A GERMANA', 1),
(77, 'A20402 ', 'JACINTO BENAVENTE - MESTRE RACIONAL', 1),
(78, 'A20403 ', 'JACINTO BENAVENTE - PUENTE ANGEL CUSTODIO', 1),
(79, 'A20404 ', 'ALCAIDE REIG - REINO DE VALENCIA', 1),
(80, 'A20405 ', 'AUTOPISTA DEL SALER - AVENIDA LA PLATA', 1),
(81, 'A20406 ', 'ALCAIDE REIG - JUNTA DE MURS I VALLS', 1),
(82, 'A20407 ', 'JACINTO BENAVENTE - OPUESTO  MESTRE RACIONAL', 1),
(83, 'A20408 ', 'JACINTO BENAVENTE - OPUESTO REINA DO¥A GERMANA', 1),
(84, 'A20409 ', 'JACINTO BENAVENTE - OPUESTO A BURRIANA', 1),
(85, 'A20410 ', 'MESTRE RACIONAL - SALAMANCA', 1),
(86, 'A20411 ', 'REINO DE VALENCIA - JOAQUIN COSTA', 1),
(87, 'A20412 ', 'REINO DE VALENCIA - MATIAS PERELLO', 1),
(88, 'A20413 ', 'PERIS Y VALERO - ALEJANDRO VI', 1),
(89, 'A20414 ', 'PERIS Y VALERO - JOSE CAPUZ', 1),
(90, 'A20415 ', 'PERIS Y VALERO - REINO DE VALENCIA', 1),
(91, 'A20417 ', 'REINO DE VALENCIA - CISCAR', 1),
(92, 'A20418 ', 'REINO DE VALENCIA - ALMIRANTE CADARSO', 1),
(93, 'A20419 ', 'REINO DE VALENCIA - BURRIANA', 1),
(94, 'A20420 ', 'REINO DE VALENCIA - MAESTRO SERRANO', 1),
(95, 'A20421 ', 'JOAQUIN COSTA - REINA DO¥A GERMANA', 1),
(96, 'A20422 ', 'REINA DO¥A GERMANA - CISCAR', 1),
(97, 'A20423 ', 'ESCULTOR CAPUZ - LUIS OLIAG', 1),
(98, 'A20424 ', 'PEDRO ALEIXANDRE - ESCULTOR CAPUZ', 1),
(99, 'A20425 ', 'PEDRO ALEIXANDRE - LUIS OLIAG', 1),
(100, 'A20426 ', 'REINO DE VALENCIA - DUQUE DE CALABRIA', 1),
(101, 'A20427 ', 'MESTRE RACIONAL - CISCAR', 1),
(102, 'A20428 ', 'JACINTO BENAVENTE - BURRIANA', 1),
(103, 'A20501 ', 'PERIS Y VALERO - AUSIAS MARCH', 1),
(104, 'A20502 ', 'PERIS Y VALERO - CUBA', 1),
(105, 'A20503 ', 'PERIS Y VALERO - SUECA', 1),
(106, 'A20504 ', 'PERIS Y VALERO - CADIZ', 1),
(107, 'A20505 ', 'PERIS Y VALERO - MAESTRO AGUILAR', 1),
(108, 'A20506 ', 'PERIS Y VALERO - PINTOR SALVADOR ABRIL', 1),
(109, 'A20507 ', 'PERIS Y VALERO - DOCTOR SUMSI', 1),
(110, 'A20508 ', 'PERIS Y VALERO - LUIS SANTANGEL', 1),
(111, 'A20509 ', 'PERIS Y VALERO - PEDRO ALEIXANDRE', 1),
(112, 'A20510 ', 'MATIAS PERELLO - DUQUE DE CALABRIA', 1),
(113, 'A20511 ', 'MATIAS PERELLO - LUIS SANTANGEL', 1),
(114, 'A20512 ', 'MATIAS PERELLO - DOCTOR SUMSI', 1),
(115, 'A20513 ', 'MATIAS PERELLO - PINTOR SALVADOR ABRIL', 1),
(116, 'A20514 ', 'LOS CENTELLES - MAESTRO AGUILAR', 1),
(117, 'A20515 ', 'LOS CENTELLES - CADIZ', 1),
(118, 'A20516 ', 'LOS CENTELLES - SUECA', 1),
(119, 'A20517 ', 'LOS CENTELLES - CUBA', 1),
(120, 'A20518 ', 'FILIPINAS - LOS CENTELLES', 1),
(121, 'A20519 ', 'FILIPINAS - OPUESTO LITERATO AZORIN', 1),
(122, 'A20520 ', 'GENERAL URRUTIA - LUIS OLIAG', 1),
(123, 'A20521 ', 'LITERATO AZORIN - SUECA', 1),
(124, 'A20522 ', 'LITERATO AZORIN - CADIZ', 1),
(125, 'A20523 ', 'FILIPINAS - LITERATO AZORIN', 1),
(126, 'A20524 ', 'FILIPINAS - OPUESTO LOS CENTELLES', 1),
(127, 'A20525 ', 'CARRERA SAN LUIS - ORGANISTA PLASENCIA', 1),
(128, 'A20526 ', 'ZAPADORES - ORGANISTA PLASENCIA', 1),
(129, 'A20527 ', 'ZAPADORES - DOS DE ABRIL', 1),
(130, 'A20528 ', 'CUBA - LITERATO AZORIN', 1),
(131, 'A20529 ', 'CARRERA SAN LUIS - DOCTOR WAKSMAN', 1),
(132, 'A20530 ', 'CARRERA SAN LUIS - BERNIA', 1),
(133, 'A20531 ', 'DOCTOR WAKSMAN - FUENTE LA HIGUERA', 1),
(134, 'A20532 ', 'AUSIAS MARCH - AMPARO ITURBI', 1),
(135, 'A20533 ', 'SUECA - PUERTO RICO', 1),
(136, 'A20534 ', ' FILIPINAS - BUENOS AIRES', 1),
(137, 'A20535 ', 'CENTELLES - FRANCISCO SEMPERE', 1),
(138, 'A20601 ', 'SAN VICENTE - AMPARO ITURBI', 1),
(139, 'A20602 ', 'SAN VICENTE - DOLORES ALCAIDE', 1),
(140, 'A20603 ', 'SAN VICENTE - GIORGETA', 1),
(141, 'A20604 ', 'SAN VICENTE - ROIG DE CORELLA', 1),
(142, 'A20605 ', 'SAN VICENTE - MAESTRO SOSA', 1),
(143, 'A20606 ', 'SAN VICENTE - MARVA', 1),
(144, 'A20608 ', 'ALBACETE - MAESTRO SOSA', 1),
(145, 'A20609 ', 'ALBACETE - MARVA', 1),
(146, 'A20610 ', 'JESUS - MARVA', 1),
(147, 'A20611 ', 'JESUS - MALUQUER', 1),
(148, 'A20612 ', 'PEREZ GALDOS - JESUS', 1),
(149, 'A20613 ', 'JESUS - CALLOSA D\'ENSARRIA', 1),
(150, 'A20614 ', 'GIORGETA - ALBACETE - CARCAGENTE', 1),
(151, 'A20615 ', 'GIORGETA - ROIG DE CORELLA', 1),
(152, 'A20616 ', 'JESUS - MARQUES DE CAMPO', 1),
(153, 'A20701 ', 'ARCHIDUQUE CARLOS - TRES FORQUES', 1),
(154, 'A20702 ', 'ARCHIDUQUE CARLOS - FONTANARES', 1),
(155, 'A20703 ', 'ARCHIDUQUE CARLOS - HEROES VIRGEN DE LA CABEZA', 1),
(156, 'A20704 ', 'ARCHIDUQUE CARLOS - FRAY JUNIPERO SERRA', 1),
(157, 'A20705 ', 'ARCHIDUQUE CARLOS - PUEBLA DE VALVERDE', 1),
(158, 'A20706 ', 'FONTANARES - VICENTE CLAVELL', 1),
(159, 'A20707 ', 'FONTANARES - HUMANISTA MARINER', 1),
(160, 'A20708 ', 'FONTANARES - PIO XI', 1),
(161, 'A20709 ', 'TRES FORQUES - TURIS', 1),
(162, 'A20710 ', 'TRES FORQUES - ENGUERA - AYORA', 1),
(163, 'A20711 ', 'TRES FORQUES - HEROES VIRGEN DE LA CABEZA', 1),
(164, 'A20712 ', 'TRES FORQUES - FRAY JUNIPERO SERRA', 1),
(165, 'A20713 ', 'TRES FORQUES - CERAMISTA ROS', 1),
(166, 'A20714 ', 'TRES FORQUES - CHIVA', 1),
(167, 'A20716 ', 'AYORA - MARIANO RIBERA', 1),
(168, 'A20717 ', 'ARCHIDUQUE CARLOS - ENGUERA', 1),
(169, 'A20801 ', 'AVENIDA DEL CID - PEREZ GALDOS', 1),
(170, 'A20802 ', 'PEREZ GALDOS - HEROE ROMEU', 1),
(171, 'A20803 ', 'PEREZ GALDOS - ANGEL GUIMERA', 1),
(172, 'A20804 ', 'PEREZ GALDOS - GABRIEL MIRO - CARTAGENA', 1),
(173, 'A20806 ', 'PEREZ GALDOS - MAESTRO GUERRERO', 1),
(174, 'A20808 ', 'PEREZ GALDOS - SAN JOSE DE LA MONTA¥A', 1),
(175, 'A20809 ', 'PEREZ GALDOS - PASEO PECHINA', 1),
(176, 'A20810 ', 'PEREZ GALDOS - CUENCA', 1),
(177, 'A20811 ', 'AVENIDA DEL CID - LORCA', 1),
(178, 'A20812 ', 'AVENIDA DEL CID - AYORA', 1),
(179, 'A20813 ', 'SAN JOSE DE CALASANZ - ALBERIQUE', 1),
(180, 'A20814 ', 'PLAZA OBISPO AMIGO', 1),
(181, 'A20815 ', 'CUENCA - ALBERIQUE', 1),
(182, 'A20816 ', 'ANGEL GUIMERA - BUEN ORDEN', 1),
(183, 'A20817 ', 'ANGEL GUIMERA - ALBERIQUE', 1),
(184, 'A20818 ', 'GONZALEZ MARTI - MAESTRO GUERRERO', 1),
(185, 'A20819 ', 'JUAN LLORENS - AZCARRAGA', 1),
(186, 'A20820 ', 'TERUEL - QUART', 1),
(187, 'A20821 ', 'GONZALEZ MARTI - SAN JOSE DE LA MONTA¥A', 1),
(188, 'A20823 ', 'PALLETER - ERUDITO ORELLANA', 1),
(189, 'A20824 ', 'ANGEL GUIMERA - PALLETER', 1),
(190, 'A20825 ', 'PASEO PECHINA - TERUEL', 1),
(191, 'A20826 ', 'PASEO PECHINA - NORTE', 1),
(192, 'A20901 ', 'AVENIDA DEL CID - ADEMUZ', 1),
(193, 'A20902 ', 'AVENIDA DEL CID - TRES CRUCES', 1),
(194, 'A20903 ', 'AVENIDA DEL CID - SAN MIGUEL DE SOTERNES', 1),
(195, 'A20904 ', 'AVENIDA DEL CID - MARCELINO OREJA', 1),
(196, 'A20905 ', 'AVENIDA DEL CID - ALEJANDRO VOLTA +SITRE AV. DEL CID', 1),
(197, 'A20906 ', 'AVENIDA DEL CID - AVENIDA MARCONI', 1),
(198, 'A20907 ', 'AVENIDA DEL CID - MISERICORDIA', 1),
(199, 'A20908 ', 'AVENIDA DEL CID - JOSE MAESTRE', 1),
(200, 'A20909 ', 'AVENIDA DEL CID - SANTA CRUZ DE TENERIFE', 1),
(201, 'A20910 ', 'PLAZA ARTURO PIERA', 1),
(202, 'A20911 ', 'BRASIL - TORRES TORRES', 1),
(203, 'A20912 ', 'FERRANDIS LUNA - COLEGIO', 1),
(204, 'A20913 ', 'FERRANDIS LUNA - BURGOS', 1),
(205, 'A20914 ', 'NUEVE DE OCTUBRE - PINTOR STOLZ', 1),
(206, 'A20915 ', 'NUEVE DE OCTUBRE - PASEO PECHINA ( LADO RIO)', 1),
(207, 'A20916 ', 'BRASIL - VELAZQUEZ', 1),
(208, 'A20917 ', 'BRASIL - TORRES', 1),
(209, 'A20918 ', 'BRASIL - MORENO USEDO', 1),
(210, 'A20919 ', 'CASTAN TOBE¥AS - MORENO USEDO', 1),
(211, 'A20920 ', 'CASTAN TOBE¥AS - TORRES', 1),
(212, 'A20921 ', 'PASEO PECHINA - TORRES', 1),
(213, 'A20922 ', 'AVENIDA DEL CID - ENGUERA', 1),
(214, 'A20923 ', 'AVENIDA DEL CID - TOTANA', 1),
(215, 'A20924 ', 'STA. CRUZ TENERIFE - MéSICO AYLLàN', 1),
(216, 'A20925 ', 'PASEO PECHINA - VELaZQUEZ', 1),
(217, 'A20926 ', 'NUEVE DE OCTUBRE - DEMOCRACIA', 1),
(218, 'A20927 ', 'AVENIDA DEL CID - PIO X ( AYUNTAMIENTO MISLATA)', 1),
(219, 'A20928 ', 'CONTROLADOR PANEL INFOVIA AVDA. CID-MARCONI. ES EL INFO 302', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_11_26_160343_create_permission_tables', 1),
(11, '2023_11_26_160344_AddForeignKeyToUsersTable', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('198478512f3928bf5d5efe39c4d43798b424547e392dd6d6333b59ac370ae73ce9e4caefeac243e7', 1, 1, 'authToken', '[]', 0, '2023-11-27 23:39:10', '2023-11-27 23:39:10', '2024-11-27 18:39:10'),
('2d009ad8c9749eeece7f30bff9354ed13f734ffeee0d5025a599178d3c5e5e3519913104e6264ef1', 1, 1, 'authToken', '[]', 0, '2023-11-28 16:07:06', '2023-11-28 16:07:06', '2024-11-28 11:07:06'),
('3d327eac74d139e06dff4af69b5b4334dc53d5780d8ae97892ecbf6849fb8698e52db7968dc242cf', 1, 1, 'authToken', '[]', 0, '2023-11-27 23:39:42', '2023-11-27 23:39:42', '2024-11-27 18:39:42'),
('84bc7fa6aa9f9ef9e2d2d99e0f48c3511c948414978f3fb2a24e84014854cdef6150c0e65316f344', 1, 1, 'authToken', '[]', 0, '2023-11-27 23:52:00', '2023-11-27 23:52:00', '2024-11-27 18:52:00'),
('905d68efad9889df129c778774ec64bdb2827d0b3f2f53f46f6e35903d5b62a23bb7a67456c959ad', 1, 1, 'authToken', '[]', 0, '2023-11-27 23:22:25', '2023-11-27 23:22:26', '2024-11-27 18:22:25'),
('de0efe654640eed9d47c5c3dd59faeb6436605ac57e445ade23acd7b6379d8e1bb46d4d84c17ab3f', 1, 1, 'authToken', '[]', 0, '2023-11-28 21:34:07', '2023-11-28 21:34:07', '2024-11-28 16:34:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'NXYgP19KdJz6rpTMJtbs1et5h2mMrlfDd3EPHJWZ', NULL, 'http://localhost', 1, 0, 0, '2023-11-27 17:58:38', '2023-11-27 17:58:38'),
(2, NULL, 'Laravel Password Grant Client', 'P9BFWIYwOSplCWRkXhGsM3OrscknQvbhqSAWQDSX', 'users', 'http://localhost', 0, 1, 0, '2023-11-27 17:58:38', '2023-11-27 17:58:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-27 17:58:38', '2023-11-27 17:58:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte`
--

DROP TABLE IF EXISTS `parte`;
CREATE TABLE IF NOT EXISTS `parte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_localizacion` int(11) DEFAULT NULL,
  `idtipoparte` int(11) DEFAULT NULL,
  `creadopor` bigint(19) UNSIGNED DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  `reportadoPor` varchar(200) DEFAULT NULL,
  `fechareporte` datetime DEFAULT NULL,
  `obscreadorparte` text,
  `asignadoA` tinytext,
  `fechaAsignacion` datetime DEFAULT NULL,
  `obsOperador` text,
  `validado_por` tinytext,
  `fecha_validacion` datetime DEFAULT NULL,
  `obscliente` text,
  `estadoparte_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creadopor_idx` (`creadopor`),
  KEY `cod_localizacion_idx` (`id_localizacion`),
  KEY `estadoparte_id_idx` (`estadoparte_id`),
  KEY `idtipoparte_idx` (`idtipoparte`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parte`
--

INSERT INTO `parte` (`id`, `id_localizacion`, `idtipoparte`, `creadopor`, `fechacreacion`, `reportadoPor`, `fechareporte`, `obscreadorparte`, `asignadoA`, `fechaAsignacion`, `obsOperador`, `validado_por`, `fecha_validacion`, `obscliente`, `estadoparte_id`) VALUES
(1, 4, 1, 1, '2023-11-29 15:05:39', 'alejos  duarte', '2023-10-24 12:05:55', 'asasasasasas', 'menijo flores', '2023-11-29 00:00:00', NULL, NULL, NULL, NULL, 1),
(2, 3, 1, 1, '2023-11-29 15:08:26', 'alejo', '2023-11-15 15:08:30', 'asasas', 'menajo', '2023-11-29 00:00:00', NULL, NULL, NULL, NULL, 1),
(3, 3, 4, 1, '2023-11-30 10:52:00', 'alejossssw', '2023-11-22 13:54:12', 'asasasasasasas', 'diego', '2023-11-30 10:54:29', NULL, NULL, NULL, NULL, 1),
(4, 2, 1, 1, '2023-11-30 15:05:30', 'floencio cerdenas', '2023-11-15 17:05:12', 'asasasas', 'menajo', '2023-11-21 03:05:28', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'web', '2023-11-27 18:06:44', '2023-11-27 18:06:44'),
(2, 'operarios', 'web', '2023-11-27 18:06:44', '2023-11-27 18:06:44'),
(3, 'tecnico campo', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoparte`
--

DROP TABLE IF EXISTS `tipoparte`;
CREATE TABLE IF NOT EXISTS `tipoparte` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoparte`
--

INSERT INTO `tipoparte` (`id`, `nombre`) VALUES
(1, 'colisión'),
(2, 'modificación'),
(3, 'aforo'),
(4, 'suministro'),
(5, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idrol` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `idrole_idx` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `idrol`) VALUES
(1, 'maria', 'Bayona', 'lgbayona1988@gmail.com', NULL, '$2y$12$h2Nfm7aBp0bsxFGT34kQ9ejtBKBR6hbuiSxol.tiwJypbVPT3W06S', NULL, '2023-11-27 18:17:34', '2023-11-30 20:08:05', 1),
(2, 'juan', 'casares', 'admin@grupoetra.com', NULL, '$2y$12$rkeNwI.X/YRniePTluTrT.hUhVn/JbnpH.ZOBHBXTdWdLNEfc.7yy', NULL, '2023-11-27 18:17:35', '2023-11-27 18:17:35', 1),
(3, 'John', 'Tejada', 'jmtejada.interandina@grupoetra.com', NULL, '$2y$12$diSrzws182N4x7pizJEJY.LxyFKE5tcNytWhx3e7YxBl07Vrmwk8m', NULL, '2023-11-27 18:17:35', '2023-11-27 18:17:35', 1),
(4, 'luis', 'pulido', 'lg123@hotmail.com', NULL, '', NULL, '2023-11-30 15:43:30', '2023-11-30 15:43:30', NULL),
(5, 'camila', 'pulido', 'camilapulido1991alex@gmail.com', NULL, '', NULL, '2023-11-30 16:04:59', '2023-11-30 16:04:59', NULL),
(6, 'camilo', 'lopez', 'camilo@gmail.com', NULL, '', NULL, '2023-11-30 20:07:53', '2023-11-30 20:07:53', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `parte`
--
ALTER TABLE `parte`
  ADD CONSTRAINT `cod_localizacion` FOREIGN KEY (`id_localizacion`) REFERENCES `localizacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `creadopor` FOREIGN KEY (`creadopor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estadoparte_id` FOREIGN KEY (`estadoparte_id`) REFERENCES `estadoparte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idtipoparte` FOREIGN KEY (`idtipoparte`) REFERENCES `tipoparte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `idrole_idx` FOREIGN KEY (`idrol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
