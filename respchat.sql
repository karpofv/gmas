-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-10-2016 a las 17:31:14
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--

--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `from` varchar(255) collate utf8_unicode_ci NOT NULL,
  `to` varchar(255) collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `sent` datetime NOT NULL default '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Volcar la base de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(1, 'jcelis', 'chepina44', 'fgdf', '2013-07-08 23:33:55', 1),
(2, 'jcelis', 'chepina44', 'gdfg', '2013-07-08 23:33:58', 1),
(3, 'chepina44', 'jcelis', 'dfgdfdfg', '2013-07-08 23:34:10', 1),
(4, 'chepina44', 'jcelis', 'eg', '2013-07-08 23:34:13', 1),
(5, 'chepina44', 'jcelis', 'dfgd', '2013-07-08 23:42:00', 1),
(6, 'jcelis', 'chepina44', 'fgd', '2013-07-08 23:42:15', 1),
(7, 'chepina44', 'jcelis', 'fgdfg', '2013-07-08 23:46:52', 1),
(8, 'chepina44', 'jcelis', 'dfsdf', '2013-07-08 23:54:37', 1),
(9, 'chepina44', 'jcelis', 'ddddddddddddddd', '2013-07-08 23:55:13', 1),
(10, 'jcelis', 'chepina44', 'fsdsf', '2013-07-08 23:58:30', 1),
(11, 'jcelis', 'chepina44', 'vsddssd', '2013-07-09 00:07:39', 1),
(12, '', 'chepina44', 'sdfs', '2013-07-09 01:39:22', 1),
(13, '', 'chepina44', 'fsfs', '2013-07-09 01:42:58', 1),
(14, '', 'chepina44', 'hever, hever', '2013-07-09 01:43:31', 1),
(15, 'jcelis', 'chepina44', 'epale', '2013-07-09 01:45:15', 1),
(16, '', 'jcelis', 'que jueee', '2013-07-09 01:47:17', 1),
(17, 'chepina44', 'jcelis', 'epale 2 veces', '2013-07-09 01:50:44', 1),
(18, 'chepina44', 'jcelis', 'epa', '2013-07-09 16:11:09', 1),
(19, 'jcelis', 'chepina44', 'eeeepale', '2013-07-09 16:11:56', 1),
(20, 'chepina44', 'jcelis', 'dfgddd', '2013-07-09 16:18:00', 1),
(21, 'jcelis', 'chepina44', 'fff', '2013-07-09 16:25:21', 1),
(22, 'chepina44', 'jcelis', 'que mas', '2013-07-09 16:26:11', 1),
(23, 'jcelis', 'chepina44', 'iooi', '2013-07-09 16:33:09', 1),
(24, 'jcelis', 'chepina44', 'jhjhgjh', '2013-07-09 16:37:37', 1),
(25, 'chepina44', 'jcelis', 'hhhhhhhhhhhhhh', '2013-07-09 16:37:58', 1),
(26, 'chepina44', 'jcelis', 'hhhh', '2013-07-10 10:11:24', 1),
(27, 'chepina44', 'jcelis', 'lrkjlerte', '2013-07-10 10:15:42', 1),
(28, 'chepina44', 'jcelis', 'rkgjekgjreer', '2013-07-10 10:15:44', 1),
(29, 'chepina44', 'jcelis', 'dkdjngkjgrt', '2013-07-10 10:15:45', 1),
(30, 'chepina44', 'jcelis', 'glkjkgjrrt', '2013-07-10 10:15:47', 1),
(31, 'chepina44', 'jcelis', 'gjdkgjktrgr', '2013-07-10 10:15:48', 1),
(32, 'chepina44', 'jcelis', 'jejejejej', '2013-07-10 14:58:08', 1),
(33, 'jcelis', 'chepina44', 'dhkj', '2013-07-10 15:34:24', 1),
(34, 'chepina44', 'jcelis', 'jtyut', '2013-07-11 17:15:35', 1),
(35, 'chepina44', 'jcelis', 'ytutyut', '2013-07-11 17:15:50', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_sessions`
--

CREATE TABLE IF NOT EXISTS `chat_sessions` (
  `sid` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL default '0',
  `username` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  `Cedula` bigint(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `chat_sessions`
--

INSERT INTO `chat_sessions` (`sid`, `time`, `username`, `Cedula`, `status`) VALUES
('ecf9c8a75bbe5fcd61dd4da5cc0f9303', 1453430322, 'chepina44', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_user_conf`
--

CREATE TABLE IF NOT EXISTS `chat_user_conf` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `User` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT 'Cedula del usuario',
  `Status` tinyint(3) unsigned NOT NULL COMMENT '0: disconnected, 1: online, 2: busy',
  `SoloConectados` char(1) collate utf8_unicode_ci NOT NULL COMMENT 'Define si solo se quiere ver a los amigos conectados',
  `Observaciones` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT 'Muletilla, as bajo la manga,no se usa todavia ;)',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CedUser` (`User`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `chat_user_conf`
--

INSERT INTO `chat_user_conf` (`id`, `User`, `Status`, `SoloConectados`, `Observaciones`) VALUES
(1, 'chepina44', 1, '', ''),
(2, 'AGROVPDR', 1, '', ''),
(3, 'jcelis', 1, '', ''),
(4, '4', 1, '', ''),
(5, '5', 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `sid` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `time` int(11) NOT NULL default '0',
  `usuario` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Cedula` bigint(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY  (`sid`),
  KEY `usuario` (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcar la base de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`sid`, `time`, `usuario`, `Cedula`, `status`) VALUES
('ced77fd3513d229ac96488e11394b807', 1424571668, 'heverest', 0, 0),
('64e5f728b696f9615c54eee7c7961d02', 1422302869, 'heverest', 0, 0);
