-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2020 a las 14:06:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tvg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl`
--

CREATE TABLE `acl` (
  `ai` int(10) UNSIGNED NOT NULL,
  `action_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl_actions`
--

CREATE TABLE `acl_actions` (
  `action_id` int(10) UNSIGNED NOT NULL,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl_categories`
--

CREATE TABLE `acl_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_sessions`
--

CREATE TABLE `auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_sessions`
--

INSERT INTO `auth_sessions` (`id`, `user_id`, `login_time`, `modified_at`, `ip_address`, `user_agent`) VALUES
('oj4m62olm5d6nfepd6eg0ijorfg6nt4e', 3581919691, '2020-08-20 01:20:00', '2020-08-20 00:36:22', '127.0.0.1', 'Chrome 84.0.4147.125 on Windows 8'),
('gcjc0m766o23t288umofjl7rnjnoh0r4', 3581919691, '2020-08-23 14:05:24', '2020-08-23 13:36:56', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('ocv54kplmoo7v0b1doa5cblpr75fl77i', 3581919691, '2020-08-19 01:47:51', '2020-08-19 02:34:58', '127.0.0.1', 'Chrome 84.0.4147.125 on Windows 8'),
('5b33m3pmipoh30u5e713oohavbbgbrrq', 3581919691, '2020-08-18 19:43:14', '2020-08-18 21:12:27', '127.0.0.1', 'Chrome 84.0.4147.125 on Windows 8'),
('15oco9mapsm5u4nqibmphevo97cm840g', 3581919691, '2020-08-22 08:08:13', '2020-08-22 09:41:28', '::1', 'Chrome 84.0.4147.135 on Windows 8'),
('662be4u8pfadbipe99m4rfrc3cagcoai', 3581919691, '2020-08-24 14:10:02', '2020-08-24 13:20:28', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('h16rvj57g92smrdknmbc8hvnpvp507ii', 3581919691, '2020-08-25 14:02:51', '2020-08-25 14:43:24', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('9nmik70ihlkmodjkr03gfh5ainfrjrfn', 3581919691, '2020-08-22 11:33:49', '2020-08-22 12:00:52', '::1', 'Chrome 84.0.4147.135 on Windows 8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `section` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `image`, `section`) VALUES
(3, '/include/img/1_aBsgPiEeOE5lLoippRm7BA.png', 'Inferior'),
(4, '/include/img/72429-hospital-ghost-748x4171.jpg', 'Superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(15) NOT NULL,
  `nombre_cargo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre_cargo`) VALUES
(2, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('qhe1l8pcfnbi4lfef5g6mt654ipvcmvj', '127.0.0.1', 1555522478, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535353532323139343b),
('9a80hm7in0skfj05grg6be39733vpe0d', '127.0.0.1', 1555522559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535353532323533313b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `dni` varchar(25) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `id_tipo_dni` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id_usuario`, `nombre`, `apellido`, `dni`, `foto`, `id_tipo_dni`) VALUES
(1173949351, 'Administrador', 'Rol', '20328861', NULL, '1'),
(2492008171, NULL, NULL, NULL, NULL, ''),
(3426296719, 'Usuario', 'Prueba Editado', '20328861343', NULL, '4'),
(3581919691, 'Leonardo', 'Rios', '20328861', 'include/img/user/873ae59c6165e09fc14291628ba6082f1.png', '1'),
(3886263392, 'Super', 'Admin', '20328861', NULL, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denied_access`
--

CREATE TABLE `denied_access` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) UNSIGNED DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE `document` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `document`
--

INSERT INTO `document` (`id`, `name`) VALUES
(1, 'Pasaporte'),
(3, 'Cedula'),
(4, 'PEP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_pro`
--

CREATE TABLE `img_pro` (
  `id` int(15) NOT NULL,
  `id_pro` varchar(15) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `img_pro`
--

INSERT INTO `img_pro` (`id`, `id_pro`, `url`) VALUES
(1, '923064996', '/include/img/products/fsdfs28.png'),
(2, '2147483647', '/include/img/products/aasdasdasda1.png'),
(3, '356584997', '/include/img/products/prouno16.png'),
(5, '1404960169', '/include/img/products/aasdasdasda7.png'),
(6, '2147483647', '/include/img/products/aasdasdasda9.png'),
(7, '2147483647', '/include/img/products/aasdasdasda11.png'),
(8, '2147483647', '/include/img/products/aasdasdasda12.png'),
(9, '2147483647', '/include/img/products/aasdasdasda13.png'),
(10, '2147483647', '/include/img/products/aasdasdasda14.png'),
(11, '361603892', '/include/img/products/aasdasdasda15.png'),
(12, '2147483647', '/include/img/products/aasdasdasda16.png'),
(13, '2147483647', '/include/img/products/aasdasdasda17.png'),
(14, '2147483647', '/include/img/products/fsdfs33.png'),
(15, '1266373836', '/include/img/products/aasdasdasda18.png'),
(16, '2147483647', '/include/img/products/aasdasdasda19.png'),
(18, '2147483647', '/include/img/products/aasdasdasda21.png'),
(19, '1219018342', '/include/img/products/aasdasdasda23.png'),
(20, '1219018342', '/include/img/products/fsdfs34.png'),
(21, '0', '/include/img/products/aasdasdasda25.png'),
(22, '0', '/include/img/products/aasdasdasda27.png'),
(24, '1650873074', '/include/img/products/aasdasdasda29.png'),
(25, '1567447785', '/include/img/products/aasdasdasda30.png'),
(27, '2147483647', '/include/img/products/aasdasdasda33.png'),
(28, '2147483647', '/include/img/products/aasdasdasda34.png'),
(29, '2147483647', '/include/img/products/aasdasdasda35.png'),
(30, '2147483647', '/include/img/products/aasdasdasda32.png'),
(31, '2147483647', '/include/img/products/aasdasdasda33.png'),
(32, '2147483647', '/include/img/products/aasdasdasda34.png'),
(33, '2147483647', '/include/img/products/aasdasdasda35.png'),
(36, '3896589538', '/include/img/products/aasdasdasda38.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ips_on_hold`
--

CREATE TABLE `ips_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerarios`
--

CREATE TABLE `itinerarios` (
  `id` int(15) NOT NULL,
  `nombre_itinerario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `itinerarios`
--

INSERT INTO `itinerarios` (`id`, `nombre_itinerario`) VALUES
(1, 'Lunes-Miercoles-Viernes'),
(2, 'Martes-Jueves-Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_errors`
--

CREATE TABLE `login_errors` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_errors`
--

INSERT INTO `login_errors` (`ai`, `username_or_email`, `ip_address`, `time`) VALUES
(167, 'leonardo2718', '127.0.0.1', '2020-08-25 14:02:43'),
(168, 'leonardo2718', '::1', '2020-08-22 11:33:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segurocarga`
--

CREATE TABLE `segurocarga` (
  `id` int(15) NOT NULL,
  `porcentaje` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `segurocarga`
--

INSERT INTO `segurocarga` (`id`, `porcentaje`, `status`) VALUES
(1, '30', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre_sucursal` varchar(60) DEFAULT NULL,
  `descripcion` longtext NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `departamento` varchar(25) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  `dep` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre_sucursal`, `descripcion`, `direccion`, `telefono`, `celular`, `email`, `departamento`, `ciudad`, `dep`) VALUES
(2, 'TVG Barranquilla', 'empresa destinada al uso de sofware', 'minas de arena #17', '04264472911', '04264472911', 'granadolelianis@gmail.com', 'Atlántico', 'Barranquilla', '3'),
(3, 'TVG Barranquilla', 'empresa destinada al uso de sofware', 'minas de arena #17', '04264472911', '04264472911', 'granadolelianis@gmail.com', 'Antioquia', 'Abejorral', '1'),
(4, 'TVG Barranquilla', 'empresa destinada al uso de sofware', 'minas de arena #17', '04264472911', '04264472911', 'granadolelianis@gmail.com', 'Antioquia', 'Abejorral', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(15) NOT NULL,
  `departamento_origen` varchar(35) NOT NULL,
  `ciudad_origen` varchar(35) NOT NULL,
  `departamento_destino` varchar(35) NOT NULL,
  `ciudad_destino` varchar(35) NOT NULL,
  `dep` int(5) NOT NULL,
  `dep_dos` int(5) NOT NULL,
  `tipo_transporte` varchar(6) NOT NULL,
  `tipo_envio` varchar(60) NOT NULL,
  `precio` varchar(15) NOT NULL,
  `itinerarios` varchar(65) NOT NULL,
  `tiempos` varchar(65) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id`, `departamento_origen`, `ciudad_origen`, `departamento_destino`, `ciudad_destino`, `dep`, `dep_dos`, `tipo_transporte`, `tipo_envio`, `precio`, `itinerarios`, `tiempos`, `status`) VALUES
(1, 'Cundinamarca', 'Bogotá', 'Casanare', 'Yopal', 12, 8, 'Aereo', 'Sobre menor a 900gr', '150000', 'Martes-Jueves-Viernes', 'Express', 'Activo'),
(2, 'Antioquia', 'Abriaquí', 'Atlántico', 'Barranquilla', 1, 3, 'Aereo', 'Sobre menor a 900gr', '150000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempos_entrega`
--

CREATE TABLE `tiempos_entrega` (
  `id` int(15) NOT NULL,
  `nombre_tiempo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiempos_entrega`
--

INSERT INTO `tiempos_entrega` (`id`, `nombre_tiempo`) VALUES
(1, 'Express'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposenvios`
--

CREATE TABLE `tiposenvios` (
  `id` int(15) NOT NULL,
  `nombre_tiposenvios` varchar(60) NOT NULL,
  `tipo_transporte` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposenvios`
--

INSERT INTO `tiposenvios` (`id`, `nombre_tiposenvios`, `tipo_transporte`) VALUES
(1, 'Sobre menor a 1000gr', 'Terrestre'),
(2, 'Sobre menor a 900gr', 'Aereo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `id` int(15) NOT NULL,
  `tipo_transporte` varchar(25) NOT NULL,
  `descripcion_transporte` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`id`, `tipo_transporte`, `descripcion_transporte`) VALUES
(1, 'Aereo', 'este es un texto\n'),
(2, 'Terrestre', 'este es un texto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `username_or_email_on_hold`
--

CREATE TABLE `username_or_email_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) UNSIGNED NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `verify` tinyint(1) NOT NULL,
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `passwd_verify_code` varchar(60) DEFAULT NULL,
  `url_foto` varchar(160) NOT NULL,
  `datos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`datos`)),
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `verify`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `passwd_verify_code`, `url_foto`, `datos`, `nombre`, `apellido`, `cedula`, `cargo`, `created_at`, `modified_at`) VALUES
(1173949351, 'Eliecer28', 'administrador@gmail.com', 6, '0', 0, '$2y$11$rhtY6ybus6IJgx3MpbSJPu0.ypzo3Qk1Gf4mwx0CunaWvyByVRBuS', NULL, NULL, '2020-08-15 07:21:49', '2020-08-15 13:30:00', NULL, '', '[{\"sucursal\":\"TVG Barranquilla\",\"nombre\":\"Jose\",\"apellido\":\"Madero\",\"telefono_personal\":\"7456134\",\"cargo\":\"Supervisor\",\"telefono_corporativo\":\"7456134\"}]', 'Elicer', 'Blanca', '35658746', 'Supervisor', '2020-08-15 12:52:00', '2020-08-22 11:21:30'),
(2292299539, 'Lelitaa', 'Bios@gmail.com', 9, '0', 0, '$2y$11$EhskqaPNF1Ri6L5XuR9dd.jkJZyLae0JNbHNEhyB8cYzRYDQpHNte', NULL, NULL, NULL, NULL, NULL, '/include/img/user/IMG_20191216_082232.jpg', '[{\"sucursal\":\"TVG Barranquilla\",\"nombre\":\"leonardo\",\"apellido\":\"Rios\",\"cargo\":\"Supervisor\",\"telefono_personal\":\"7456156\",\"telefono_corporativo\":\"7456134\",\"cedula\":\"25272381\"}]', 'Lelinis', 'Granado', '25698745', 'Supervisor', '2020-08-22 12:33:18', '2020-08-22 11:22:39'),
(2492008171, 'Usuario', 'usuario@gmail.com', 9, '0', 0, '$2y$11$6uC00jE4YStgRIDOr80Bz.ZQjm5Ya1MinpVqjN968Txju6A87djoe', NULL, NULL, NULL, '2020-08-15 13:31:50', '$2y$11$zH4Tg.dnzrYIZixra9BCp.9VnucBgKH0lemJLpOkZoBobncv3/zMC', '', '[{\"sucursal\":\"TVG Barranquilla\",\"nombre\":\"Jose\",\"apellido\":\"Madero\",\"telefono_personal\":\"7456134\",\"cargo\":\"Supervisor\",\"telefono_corporativo\":\"7456134\"}]', 'Raul', 'Roberto', '564878987', 'Supervisor', '2020-08-15 13:30:50', '2020-08-22 11:23:07'),
(3426296719, 'Luz23', 'usuario@prueba.com', 1, '0', 0, '$2y$11$FIC5lEy4L4Cr.ucVIZUh7uIdMi.6eYN29x8iwNDKjIHOFL.i0lqD.', NULL, NULL, NULL, NULL, NULL, '', '[{\"sucursal\":\"TVG Barranquilla\",\"nombre\":\"Jose Ramon\",\"apellido\":\"Madero\",\"telefono_personal\":\"7456134\",\"cargo\":\"Supervisor\",\"telefono_corporativo\":\"7456134\"}]', 'Luz ', 'Rios', '1864547', 'Supervisor', '2020-08-16 01:28:20', '2020-08-22 11:15:50'),
(3581919691, 'leonardo2718', 'leonardo2718@hotmail.es', 9, '0', 0, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', NULL, NULL, NULL, '2020-08-22 11:33:49', '$2y$11$LUi1aLY/hjkFUbWQ3Q2VKOXBoz5iqPmk5XxM8JxWb26t6nG7jg.xK', '', '[{\"sucursal\":\"TVG Barranquilla\",\"nombre\":\"Jose\",\"apellido\":\"Madero\",\"telefono_personal\":\"7456134\",\"cargo\":\"Supervisor\",\"telefono_corporativo\":\"7456134\"}]', 'leonardo', 'Rios', '203288614', '', '2020-08-16 01:06:25', '2020-08-22 11:10:32'),
(3723684040, 'administrador', 'administradod@gmail.com', 9, '0', 0, '$2y$11$QSHnwejZLPO1esg7UiH9ROr5ZmNrlLOmmVwpV1Kk0e87ODIhyCsA6', NULL, NULL, NULL, NULL, NULL, '/include/img/user/logo.png', '[{\"sucursal\":\"TVG Barranquilla\",\"nombre\":\"Jose maria\",\"apellido\":\"Madero\",\"telefono_personal\":\"7456156\",\"cargo\":\"Supervisor\",\"telefono_corporativo\":\"7456134\"}]', 'Jorbrannis ', 'Lara', '487857879', 'Supervisor', '2020-08-25 14:34:59', '2020-08-22 11:27:29'),
(3886263392, 'Andres23', 'superadmin@admin.com', 9, '0', 0, '$2y$11$wKIgRbj..XVEuKmUQGXwMeLQSqjLhju53N/HzF9e1Dwdk5ch4GkBy', NULL, NULL, NULL, '2020-08-15 12:56:30', NULL, '/include/img/user/FB_IMG_1589228057461.jpg', '[{\"sucursal\":\"TVG Barranquilla\",\"nombre\":\"Jose\",\"apellido\":\"Madero\",\"telefono_personal\":\"7456134\",\"cargo\":\"Supervisor\",\"telefono_corporativo\":\"7456134\"}]', 'Andres', 'Dias', '65458484', 'Supervisor', '2020-08-15 12:56:00', '2020-08-22 11:55:34');

--
-- Disparadores `users`
--
DELIMITER $$
CREATE TRIGGER `ca_passwd_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
        SET NEW.passwd_modified_at = NOW();
    END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`ai`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `acl_categories`
--
ALTER TABLE `acl_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_code` (`category_code`),
  ADD UNIQUE KEY `category_desc` (`category_desc`);

--
-- Indices de la tabla `auth_sessions`
--
ALTER TABLE `auth_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id` (`id_usuario`);

--
-- Indices de la tabla `denied_access`
--
ALTER TABLE `denied_access`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `img_pro`
--
ALTER TABLE `img_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_errors`
--
ALTER TABLE `login_errors`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `segurocarga`
--
ALTER TABLE `segurocarga`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiempos_entrega`
--
ALTER TABLE `tiempos_entrega`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposenvios`
--
ALTER TABLE `tiposenvios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acl`
--
ALTER TABLE `acl`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acl_actions`
--
ALTER TABLE `acl_actions`
  MODIFY `action_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acl_categories`
--
ALTER TABLE `acl_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `denied_access`
--
ALTER TABLE `denied_access`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `document`
--
ALTER TABLE `document`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `img_pro`
--
ALTER TABLE `img_pro`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login_errors`
--
ALTER TABLE `login_errors`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `segurocarga`
--
ALTER TABLE `segurocarga`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiempos_entrega`
--
ALTER TABLE `tiempos_entrega`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiposenvios`
--
ALTER TABLE `tiposenvios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `acl_actions` (`action_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD CONSTRAINT `acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `acl_categories` (`category_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
