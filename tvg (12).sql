-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2020 a las 17:23:28
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
('uq1c1fedgaa877508nr896dc05bkk1ij', 3581919691, '2020-08-28 14:18:32', '2020-08-28 14:16:25', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('vbpiblq72a21cg3fint6r7pu17u1djah', 3581919691, '2020-08-27 14:33:03', '2020-08-27 14:13:45', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('r3irm7a2r4ejtitjpn3vleqmcv9a94jg', 1567466676, '2020-08-26 17:20:58', '2020-08-26 15:20:58', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('ommuelse6gcriddupqj9ktdlrqscfgqq', 3581919691, '2020-08-26 16:37:46', '2020-08-26 15:18:38', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('atcboj94ji0v8vlr6boufrjk0tcl1h0f', 3581919691, '2020-08-26 15:59:30', '2020-08-26 14:16:46', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('pkh495nr86ee4pb4f7lu7orble68i1gh', 3581919691, '2020-08-27 01:33:38', '2020-08-27 03:25:11', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('58h368b4c1ci7f1k1o7unv5iv9p9f3ce', 3581919691, '2020-08-26 18:42:07', '2020-08-26 16:42:07', '::1', 'Chrome 84.0.4147.135 on Windows 8'),
('8ip7emuf5mr1m0qj04f7idf6ni5elch5', 2520322231, '2020-08-26 18:45:16', '2020-08-26 17:02:46', '::1', 'Chrome 84.0.4147.135 on Windows 8'),
('uh9dg6o8op3o9e6qvalu5n1bhf6qfr8j', 2520322231, '2020-08-28 22:18:40', '2020-08-28 21:46:18', '::1', 'Chrome 84.0.4147.135 on Windows 8'),
('hlhqsf3s8h8ggb5ucbu7htdojvt6kksj', 3581919691, '2020-08-28 23:01:42', '2020-08-28 21:13:12', '::1', 'Chrome 84.0.4147.135 on Windows 8'),
('tc70ris15nc2klt7ctqkmhaqtmbj58q0', 3581919691, '2020-08-28 23:22:30', '2020-08-28 21:47:44', '::1', 'Chrome 84.0.4147.135 on Windows 8'),
('0bm5129s5epblk8812e910j5n1jpa81r', 3581919691, '2020-08-29 04:09:01', '2020-08-29 02:59:52', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('0cl4hdmm32k61dn2e468a25c6hl8iqt1', 3581919691, '2020-08-29 13:55:43', '2020-08-29 14:17:23', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('1eblbhoki7ee4de8en88dhn2odjgh7ak', 3581919691, '2020-08-29 01:01:33', '2020-08-28 23:01:34', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('r3jfitbhmb8iu83p2haufgif3vt33a9b', 3581919691, '2020-08-29 01:01:42', '2020-08-29 01:42:07', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('6jnanp83mga7g56v47sqh4k1pub6jvoi', 3581919691, '2020-08-29 08:28:01', '2020-08-29 06:28:01', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('2fqip2738kpk51eq5m07ju5krln3acf2', 3581919691, '2020-08-29 08:39:03', '2020-08-29 07:03:13', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('bbsrj5pkupsb3b65s48uu4e94vifp96j', 3581919691, '2020-08-29 09:14:37', '2020-08-29 07:33:49', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('ootn7dgd1vm673nmqs4444rv02mg6sk7', 3581919691, '2020-08-29 09:40:41', '2020-08-29 08:36:43', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('7hh9b49l7p0naqr6qpfc92cra5qo95mp', 3581919691, '2020-08-29 12:00:06', '2020-08-29 10:07:22', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('8t8c245t08iimde5armfjsk64qctvagj', 3581919691, '2020-08-29 12:45:33', '2020-08-29 15:25:26', '::1', 'Chrome 85.0.4183.83 on Windows 8'),
('mrlbutmu6ct6de1oh5ajea7haelpe306', 3581919691, '2020-09-01 01:59:52', '2020-09-01 01:30:44', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('l45042u8b81j1fj79ige5uvh0ahedp4r', 3581919691, '2020-09-01 13:03:38', '2020-09-01 13:46:09', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('8qi8qnhhoq87qnt7k553nq18dq0744d1', 3581919691, '2020-09-02 00:44:32', '2020-09-02 02:19:19', '127.0.0.1', 'Chrome 84.0.4147.135 on Windows 8'),
('2hpu5a5do9bpc07jlcq1tgerkrnpbvb9', 3581919691, '2020-09-02 14:07:34', '2020-09-02 14:27:31', '127.0.0.1', 'Chrome 85.0.4183.83 on Windows 8'),
('lt1prrluge7c8pqcfojildk10bo6usd8', 3581919691, '2020-09-02 16:33:41', '2020-09-02 15:44:11', '127.0.0.1', 'Chrome 85.0.4183.83 on Windows 8'),
('b9fnkvpl280la13saqvau7d0hlruacs8', 3581919691, '2020-09-03 02:43:28', '2020-09-03 05:18:14', '127.0.0.1', 'Chrome 85.0.4183.83 on Windows 8'),
('aq3v9bpm4okdu3riec0sdt893o8arj9s', 3581919691, '2020-09-03 14:12:54', '2020-09-03 15:16:52', '127.0.0.1', 'Chrome 85.0.4183.83 on Windows 8'),
('g48h4dbfk48sbjdjniptpli5i6v89jbt', 3581919691, '2020-09-04 02:16:53', '2020-09-04 01:53:16', '127.0.0.1', 'Chrome 85.0.4183.83 on Windows 8'),
('eqp89he0im3egfvsv5juhfu7anmnpr6b', 3581919691, '2020-09-04 13:25:58', '2020-09-04 12:27:40', '127.0.0.1', 'Chrome 85.0.4183.83 on Windows 8'),
('ivk2aoin47cf588v95ehjg3i9i2vg6g8', 3581919691, '2020-09-04 15:09:54', '2020-09-04 15:23:04', '127.0.0.1', 'Chrome 85.0.4183.83 on Android');

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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(15) NOT NULL,
  `nit_cliente` varchar(15) DEFAULT NULL,
  `nombre_empresa` varchar(60) DEFAULT NULL,
  `r_legal` varchar(60) DEFAULT NULL,
  `nombre_cliente` varchar(60) DEFAULT NULL,
  `cedula_cliente` int(15) DEFAULT NULL,
  `telefono_cliente` varchar(15) DEFAULT NULL,
  `correo_cliente` varchar(35) DEFAULT NULL,
  `departamento` varchar(15) DEFAULT NULL,
  `ciudad` varchar(15) DEFAULT NULL,
  `dep` int(5) DEFAULT NULL,
  `direccion_cliente` varchar(150) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `fecha_inactivo` date DEFAULT NULL,
  `tipo_cliente` enum('Persona natural','Persona jurídica') DEFAULT NULL,
  `sucursal` int(10) DEFAULT NULL,
  `forma_pago` int(10) DEFAULT NULL,
  `autorizador` int(15) UNSIGNED DEFAULT NULL,
  `cliente_especial` enum('Si','No') DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nit_cliente`, `nombre_empresa`, `r_legal`, `nombre_cliente`, `cedula_cliente`, `telefono_cliente`, `correo_cliente`, `departamento`, `ciudad`, `dep`, `direccion_cliente`, `estado`, `fecha_registro`, `fecha_inactivo`, `tipo_cliente`, `sucursal`, `forma_pago`, `autorizador`, `cliente_especial`, `observacion`) VALUES
(30, 'No aplica', 'No aplica', 'No aplica', 'Luis Rios', 456456464, '456467984', 'leoanrdo2718@hotmail.es', 'Huila', 'La Argentina', 16, 'asdaweqdqweqw', 'Activo', '2020-08-29 02:52:50', '0000-00-00', 'Persona natural', 2, 2, 3581919691, 'Si', ''),
(31, '31231231', 'Tequeños vlz', 'Lenin Granado', 'Lelianis Granado', 789456145, '04127982255', 'granadolela@gmail.com', 'Córdoba', 'Planeta Rica', 13, 'lelianis', 'Activo', '2020-08-29 05:39:13', '0000-00-00', 'Persona jurídica', 3, 2, 3581919691, 'Si', ''),
(32, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-09-03 09:07:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coste_guia`
--

CREATE TABLE `coste_guia` (
  `id` int(15) NOT NULL,
  `valor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coste_guia`
--

INSERT INTO `coste_guia` (`id`, `valor`) VALUES
(1, '500');

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
(3581919691, 'Leonardo', 'Rios', '20328861', 'include/img/user/873ae59c6165e09fc14291628ba6082f1.png', '1');

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
-- Estructura de tabla para la tabla `documentos_historial`
--

CREATE TABLE `documentos_historial` (
  `id` int(15) NOT NULL,
  `id_carga_cliente` int(15) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos_historial`
--

INSERT INTO `documentos_historial` (`id`, `id_carga_cliente`, `url`) VALUES
(1, 0, '/include/files/7418917_orig.jpg'),
(2, 20328861, '/include/files/33992369_1736254336481634_8203510014942380032_n.jpg'),
(3, 38945687, '/include/files/7418917_orig1.jpg'),
(4, 0, '/include/files/aasdasdasda.png'),
(5, 38945687, '/include/files/aasdasdasda1.png'),
(6, 38945687, '/include/files/34102368_1756365637813202_7431407042675343360_n3.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(15) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `nit` int(20) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pbx` varchar(25) NOT NULL,
  `telefono_uno` varchar(15) NOT NULL,
  `telefono_dos` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `web` varchar(50) NOT NULL,
  `logo_uno` varchar(150) NOT NULL,
  `logo_dos` varchar(150) NOT NULL,
  `dep` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre_empresa`, `nit`, `departamento`, `ciudad`, `direccion`, `email`, `pbx`, `telefono_uno`, `telefono_dos`, `celular`, `web`, `logo_uno`, `logo_dos`, `dep`) VALUES
(0, 'Tvg Cargo', 456464, 'Atlántico', 'Sabanalarga', 'direccion', 'lelita@gmail.com', '45678979', '1234567', '1234679', '4565321', 'http://www.antaresoft.com/', 'include/img/873ae59c6165e09fc14291628ba6082f4.png', 'include/img/linterna.jpg', 3),
(0, 'Tvg Cargo', 456464, 'Atlántico', 'Sabanalarga', 'direccion', 'lelita@gmail.com', '45678979', '1234567', '1234679', '4565321', 'http://www.antaresoft.com/', 'include/img/873ae59c6165e09fc14291628ba6082f4.png', 'include/img/linterna.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factores`
--

CREATE TABLE `factores` (
  `id` int(15) NOT NULL,
  `escala` enum('Metros','Centímetros','Porcientos') NOT NULL,
  `formula` varchar(50) NOT NULL,
  `variable` varchar(10) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factores`
--

INSERT INTO `factores` (`id`, `escala`, `formula`, `variable`, `estado`) VALUES
(1, 'Centímetros', 'VOLUMEN=(AN * AL* LA) /300', '300', 'Activo'),
(2, 'Centímetros', 'VOLUMEN=(AN * AL* LA) /600', '600', 'Activo'),
(3, 'Metros', 'VOLUMEN=(AN * AL* LA) *300', '300', 'Activo'),
(4, 'Porcientos', 'TOTAL KILOS + (TOTAL KILOS *60%)', '60', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(15) NOT NULL,
  `forma` varchar(60) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `dias` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id`, `forma`, `descripcion`, `dias`) VALUES
(1, 'Crédito', '\nPago realizado posterior al despacho de la carga en el tiempo acordado. ', '8'),
(2, 'Crédito', 'Pago realizado posterior al despacho de la carga en el tiempo acordado. ', '15'),
(3, 'Crédito', 'Pago realizado posterior al despacho de la carga en el tiempo acordado. ', '30'),
(4, 'Crédito', 'Pago realizado posterior al despacho de la carga en el tiempo acordado. ', '40'),
(5, 'Crédito', '\nPago realizado posterior al despacho de la carga en el tiempo acordado. ', '60'),
(6, 'Crédito', 'Pago inmediato', '0'),
(7, '50% al despacho y 50% contra entrega ', 'Mitad de dinero al momento del envío y mitad de dinero a la entrega de la carga.', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ce`
--

CREATE TABLE `historial_ce` (
  `id` int(11) NOT NULL,
  `codigo` int(10) UNSIGNED NOT NULL,
  `cedula_cliente` int(15) NOT NULL,
  `f_recogida` date NOT NULL,
  `f_ingreso` date NOT NULL,
  `id_carga_cliente` varchar(25) NOT NULL,
  `tipo_carga` int(15) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `kilos_tvg` varchar(25) NOT NULL,
  `kilos_cliente` varchar(25) NOT NULL,
  `flete_fijo` varchar(50) NOT NULL,
  `flete_total` varchar(50) NOT NULL,
  `fecha_despacho` date NOT NULL,
  `proveedor` int(15) NOT NULL,
  `n_guia_proveedor` varchar(60) NOT NULL,
  `fecha_en_destino` date NOT NULL,
  `sede_cliente` int(15) NOT NULL,
  `fecha_conectividad` date NOT NULL,
  `n_referencia_c` varchar(60) NOT NULL,
  `f_entrega_c` date NOT NULL,
  `numero_anexo_l` varchar(60) NOT NULL,
  `numero_factura` varchar(60) NOT NULL,
  `fecha_factura` varchar(20) NOT NULL,
  `id_tarifa` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_ce`
--

INSERT INTO `historial_ce` (`id`, `codigo`, `cedula_cliente`, `f_recogida`, `f_ingreso`, `id_carga_cliente`, `tipo_carga`, `cantidad`, `kilos_tvg`, `kilos_cliente`, `flete_fijo`, `flete_total`, `fecha_despacho`, `proveedor`, `n_guia_proveedor`, `fecha_en_destino`, `sede_cliente`, `fecha_conectividad`, `n_referencia_c`, `f_entrega_c`, `numero_anexo_l`, `numero_factura`, `fecha_factura`, `id_tarifa`) VALUES
(4, 4118347882, 789456145, '2020-09-05', '2020-09-11', '20328861', 1, '15', '60', '600', '350000', '3150000000', '2020-09-04', 1, '1560000789', '2020-09-04', 1, '2020-09-19', '15987657954', '2020-09-04', '5465789', '56464546', '25-08-2020', 3),
(5, 2286577589, 456456464, '2020-09-04', '2020-09-11', '20328861', 1, '15', '60', '600', '350000', '3150000000', '2020-09-19', 1, '1560000789', '2020-09-17', 2, '2020-09-25', '755467', '2020-09-25', '6656576', '35498989', '4987499948', 3),
(6, 2105523902, 456456464, '2020-09-04', '2020-09-04', '20328861', 1, '2', '20', '100', '50000', '10000000', '2020-09-24', 1, '1560000789', '2020-09-10', 2, '2020-09-24', '87565464', '2020-09-24', '755464', '4564646', '4579464', 3),
(7, 1332210380, 456456464, '2020-09-03', '2020-09-26', '38945687', 1, '15', '60', '600', '350000', '3150000000', '2020-09-23', 1, '456797987', '2020-09-10', 2, '2020-09-25', '7879879', '2020-09-23', '5646567', '5612344', '4987499948', 3);

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
(196, 'leonado2718', '127.0.0.1', '2020-09-04 13:24:59'),
(197, 'leonado2718', '127.0.0.1', '2020-09-04 13:25:08'),
(198, 'leonardo2718', '127.0.0.1', '2020-09-04 13:25:25'),
(199, 'Leonardo2718', '127.0.0.1', '2020-09-04 13:25:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(15) NOT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `resumen` varchar(60) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo_transporte` int(25) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `numero`, `resumen`, `descripcion`, `tipo_transporte`, `estado`) VALUES
(6, 'uno', 'el que te conte', 'asdasd', NULL, 'Activo'),
(7, 'tres', 'el que te conte', 'asdasd', NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(15) NOT NULL,
  `nombre_proveedor` varchar(60) NOT NULL,
  `contacto_proveedor` varchar(60) NOT NULL,
  `direccion_proveedor` varchar(255) NOT NULL,
  `correo_proveedor` varchar(60) NOT NULL,
  `telefono_proveedor` varchar(15) NOT NULL,
  `estado_proveedor` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre_proveedor`, `contacto_proveedor`, `direccion_proveedor`, `correo_proveedor`, `telefono_proveedor`, `estado_proveedor`) VALUES
(1, 'Condor S.A', 'Condorito', 'callle bolivar', 'leonardo@hotmail.es', '0412745613', 'Activo'),
(2, 'Cigueña C.A.', 'ave', 'direccion', 'leonardo@hotmail.es', '45671345', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(15) NOT NULL,
  `id_cliente` int(20) NOT NULL,
  `departamento_sede` varchar(25) NOT NULL,
  `ciudad_sede` varchar(25) NOT NULL,
  `dep` int(5) NOT NULL,
  `nombre_sede` varchar(60) NOT NULL,
  `contacto_sede` varchar(60) NOT NULL,
  `direccion_sede` varchar(255) NOT NULL,
  `telefono_sede` varchar(25) NOT NULL,
  `correo_sede` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `id_cliente`, `departamento_sede`, `ciudad_sede`, `dep`, `nombre_sede`, `contacto_sede`, `direccion_sede`, `telefono_sede`, `correo_sede`) VALUES
(1, 789456145, 'Arauca', 'Arauquita', 2, 'Sede uno', 'leli', 'minas de arena #17', '04264472911', '0'),
(2, 456456464, 'Antioquia', 'Abejorral', 1, 'Sede uno', 'leli', 'minas de arena #17', '04264472911', '0'),
(3, 456456464, 'Bolívar', 'Leticia', 0, 'Sede dos', 'leli', 'minas de arena #17', '04264472911', 'leonardo2718@hotmail.es'),
(4, 789456145, 'Atlántico', 'Barranquilla', 3, 'Sede dos', 'leli', 'minas de arena #17', '04264472911', 'lelianisgranao@gmai.com'),
(5, 789456145, 'Bolívar', 'Altos del Rosario', 4, 'Sede tres', 'leli', 'minas de arena #17', '04264472911', 'leonardo2718@hotmail.es'),
(6, 789456145, 'Bolívar', 'Arenal', 4, 'Sede cuatro', 'leli', 'minas de arena #17', '04264472911', 'leonardo2718@hotmail.es');

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
(3, 'TVG Santa Marta', 'empresa destinada al uso de sofware', 'minas de arena #17', '04264472911', '04264472911', 'granadolelianis@gmail.com', 'Magdalena', 'Santa Marta', '18'),
(4, 'TVG Bogota', 'empresa destinada al uso de sofware', 'minas de arena #17', '04264472911', '04264472911', 'granadolelianis@gmail.com', 'Cundinamarca', 'Bogotá', '12');

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
  `tipo_transporte` varchar(20) NOT NULL,
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
(2, 'Antioquia', 'Abriaquí', 'Atlántico', 'Barranquilla', 1, 3, 'Aereo', 'Sobre menor a 900gr', '150000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(3, 'Amazonas', 'Leticia', 'Amazonas', 'Puerto Nariño', 0, 0, 'Aereo', 'Sobre menor a 900gr', '20000000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(4, 'Amazonas', 'Puerto Nariño', 'Amazonas', 'Leticia', 0, 0, 'Aereo', 'Sobre menor a 900gr', '10000000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(5, 'Amazonas', 'Leticia', 'Amazonas', 'Leticia', 0, 0, 'Terrestre', 'Sobre menor a 1000gr', '200000', 'Lunes-Miercoles-Viernes', 'Normal', 'Activo');

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
-- Estructura de tabla para la tabla `tipocarga`
--

CREATE TABLE `tipocarga` (
  `id` int(15) NOT NULL,
  `nombre_tipocarga` varchar(60) NOT NULL,
  `descripcion_tipocarga` varchar(150) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocarga`
--

INSERT INTO `tipocarga` (`id`, `nombre_tipocarga`, `descripcion_tipocarga`, `estado`) VALUES
(1, 'Caja', 'esta es una descripcion', 'Activo'),
(2, 'Saco', 'descripcion', 'Activo');

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
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `telefono_personal` varchar(15) NOT NULL,
  `telefono_corporativo` varchar(15) NOT NULL,
  `sucursal` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `verify`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `passwd_verify_code`, `url_foto`, `nombre`, `apellido`, `cedula`, `cargo`, `telefono_personal`, `telefono_corporativo`, `sucursal`, `created_at`, `modified_at`) VALUES
(1268850497, 'Cristiano', 'cr7@gmail.com', 9, '0', 0, '$2y$11$uhVxTsaH581Q3VtH5YdV.e.g8hsA4aXbGroFB85D2aVoE3VgHEu5K', NULL, NULL, NULL, NULL, '$2y$11$LUi1aLY/hjkFUbWQ3Q2VKOXBoz5iqPmk5XxM8JxWb26t6nG7jg.xK', '/include/img/user/873ae59c6165e09fc14291628ba6082f.png', 'Cristiano', 'Ronaldo', '78946123', 'Supervisor', '04264472911', '04264472911', 'TVG Barranquilla', '2020-08-26 16:27:09', '2020-08-26 15:04:04'),
(1567466676, 'Leonardo', 'leonardo@tvg.com', 9, '0', 0, '$2y$11$NqTRHgqBXtZiCwk6yeQ.FO48UM8oKnUJLXQfaYcKz5PsA.GhiZ6Xa', NULL, NULL, NULL, '2020-08-26 17:20:58', '$2y$11$h0uusdq351hfF2LIb0h1H.225bpCHQQaj25xxJQxnoz8OKVeHU.w.', '/include/img/user/873ae59c6165e09fc14291628ba6082f4.png', 'Jose', 'Leonardo', '20328861', 'Supervisor', '7456134', '7456134', 'TVG Santa Marta', '2020-08-26 17:20:33', '2020-08-26 15:20:58'),
(2032761865, 'Cr7', 'leonardo21788@gmail.com', 9, '0', 0, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', NULL, NULL, '2020-08-26 10:28:51', NULL, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', '/include/img/user/asdasdad1.png', 'Jose', 'Leonardo', '10981021', 'Supervisor', '', '', '', '2020-08-26 16:01:27', '2020-08-26 14:28:51'),
(2192184043, 'LuzRios2718', 'Luz@gmail.com', 9, '0', 0, '$2y$11$zO3zdIrbm9YOSTEJgkBw6uLTrNCY.iPahnsUBxl.VNDy94pzeleUS', NULL, NULL, NULL, '2020-08-26 16:47:31', '$2y$11$Aehw7FozAqIaA1EfMViN0Oz/Jm.5BtN8OcFK83s/WElLvuOQD7wf2', '/include/img/user/72429-hospital-ghost-748x417.jpg', 'Luz', 'Rios', '25272381', 'Supervisor', '', '', '', '2020-08-26 16:47:08', '2020-08-26 14:47:31'),
(2520322231, 'Diego', 'diego@gmail.com', 9, '0', 0, '$2y$11$YyIF9OW8OVOMVgGGTgeRYOSgW.ykjjKGMSPoezNlWWKqgFcY3StUK', NULL, NULL, NULL, '2020-08-28 22:18:40', '$2y$11$n2NBHXo0wwsBNj2Cdbugr.9hAGqd2antLVh5h/k5DbUvjcul1uH/6', '/include/img/user/IMG_20191225_184425.jpg', 'Diego', 'Morejon', '123', 'Supervisor', '7456156', '7456134', 'TVG Santa Marta', '2020-08-26 18:44:54', '2020-08-28 20:18:40'),
(2822719046, 'Marina', 'marina@gmail.com', 9, '0', 0, '$2y$11$EVbi/7xHKdNVT8QMTq0GS.QOArGbi1T9G3sN559qbE1kkSkS.4tjK', NULL, NULL, NULL, NULL, '$2y$11$J3bxlg..o9pohVCgiwslXuYiYmS6zZY0Dvr6WcSYIRqDpDz0dlhpG', '/include/img/user/873ae59c6165e09fc14291628ba6082f3.png', 'Luz ', 'Marina', '258369147', 'Supervisor', '04264472911', '04264472911', 'TVG Barranquilla', '2020-08-26 17:10:34', '2020-08-26 15:10:34'),
(3581919691, 'leonardo2718', 'leonardo2718@hotmail.es', 9, '0', 0, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', NULL, NULL, NULL, '2020-09-04 15:09:54', '$2y$11$LUi1aLY/hjkFUbWQ3Q2VKOXBoz5iqPmk5XxM8JxWb26t6nG7jg.xK', '', 'Tvg', 'Cargo', '203288614', '', '', '', '', '2020-08-16 01:06:25', '2020-09-04 13:09:54');

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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_cliente` (`cedula_cliente`),
  ADD KEY `sucursal` (`sucursal`),
  ADD KEY `forma_pago` (`forma_pago`),
  ADD KEY `autorizador` (`autorizador`);

--
-- Indices de la tabla `coste_guia`
--
ALTER TABLE `coste_guia`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `documentos_historial`
--
ALTER TABLE `documentos_historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factores`
--
ALTER TABLE `factores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_ce`
--
ALTER TABLE `historial_ce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tarifa` (`id_tarifa`),
  ADD KEY `sede_cliente` (`sede_cliente`),
  ADD KEY `cedula_cliente` (`cedula_cliente`);

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
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_transporte` (`tipo_transporte`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `tipocarga`
--
ALTER TABLE `tipocarga`
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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `coste_guia`
--
ALTER TABLE `coste_guia`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `documentos_historial`
--
ALTER TABLE `documentos_historial`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `factores`
--
ALTER TABLE `factores`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `historial_ce`
--
ALTER TABLE `historial_ce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `img_pro`
--
ALTER TABLE `img_pro`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login_errors`
--
ALTER TABLE `login_errors`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tiempos_entrega`
--
ALTER TABLE `tiempos_entrega`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipocarga`
--
ALTER TABLE `tipocarga`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`forma_pago`) REFERENCES `forma_pago` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_3` FOREIGN KEY (`autorizador`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_ce`
--
ALTER TABLE `historial_ce`
  ADD CONSTRAINT `historial_ce_ibfk_1` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `historial_ce_ibfk_2` FOREIGN KEY (`sede_cliente`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `historial_ce_ibfk_3` FOREIGN KEY (`cedula_cliente`) REFERENCES `clientes` (`cedula_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`tipo_transporte`) REFERENCES `transportes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
