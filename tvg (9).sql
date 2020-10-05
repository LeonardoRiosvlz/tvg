-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2020 a las 06:23:04
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
-- Estructura de tabla para la tabla `actas_entrega`
--

CREATE TABLE `actas_entrega` (
  `id` int(15) UNSIGNED NOT NULL,
  `creado` date NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `nombre_empresa` varchar(60) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `version` varchar(15) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `telefono_cliente` varchar(15) NOT NULL,
  `id_cliente` varchar(15) NOT NULL,
  `ciudad_cliente` varchar(60) NOT NULL,
  `telefono_sede` varchar(15) NOT NULL,
  `direccion_sede` varchar(200) NOT NULL,
  `departamento_sede` varchar(25) NOT NULL,
  `ciudad_sede` varchar(25) NOT NULL,
  `ciudad_origen` varchar(25) NOT NULL,
  `departamento_origen` varchar(25) NOT NULL,
  `ciudad_destino` varchar(25) NOT NULL,
  `departamento_destino` varchar(25) NOT NULL,
  `dep` int(5) NOT NULL,
  `depp` int(5) NOT NULL,
  `nombre_sede` varchar(50) NOT NULL,
  `id_sede` varchar(15) NOT NULL,
  `remision` varchar(25) NOT NULL,
  `unidades` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actas_entrega`
--

INSERT INTO `actas_entrega` (`id`, `creado`, `user_id`, `items`, `nombre_empresa`, `codigo`, `version`, `direccion_cliente`, `telefono_cliente`, `id_cliente`, `ciudad_cliente`, `telefono_sede`, `direccion_sede`, `departamento_sede`, `ciudad_sede`, `ciudad_origen`, `departamento_origen`, `ciudad_destino`, `departamento_destino`, `dep`, `depp`, `nombre_sede`, `id_sede`, `remision`, `unidades`) VALUES
(2117504275, '2020-09-26', '3581919691', '[{\"cantidad\":\"3\",\"tipocarga\":\"Caja\",\"descripcion\":\"empresa destinada al uso de sofware\"},{\"cantidad\":\"4\",\"tipocarga\":\"Caja\",\"descripcion\":\"empresa destinada al uso de sofware\"},{\"cantidad\":\"5\",\"tipocarga\":\"Saco\",\"descripcion\":\"productos de aluminio\"}]', 'SEAPEX C.A.', 'FBASC-22', '01', 'minas de arena #17', '04264472911', '2147483647', 'Plato', '3004124787', 'calle real tronca 99', '', 'Bogotá', 'Arauquita', 'Arauca', 'Leticia', '', 2, 0, 'Sede Seapex Bogotá', '7', 'YVKE', '12'),
(1429886557, '2020-09-26', '3581919691', '[{\"cantidad\":\"15\",\"tipocarga\":\"Caja\",\"descripcion\":\"Caja con ropa.\"}]', 'SEAPEX C.A.', 'FBASC-22', '01', 'minas de arena #17', '04264472911', '2147483647', 'Plato', '3004124787', 'calle real tronca 99', 'Cundinamarca', 'Bogotá', 'Tauramena', 'Casanare', 'Santa Marta', 'Magdalena', 8, 18, 'Sede Seapex Bogotá', '7', 'YJAKDS-232123', '15'),
(3022238384, '2020-09-25', '3581919691', '[{\"cantidad\":\"15\",\"tipocarga\":\"Caja\",\"descripcion\":\"Contenido  calisficado.\"}]', 'SEAPEX C.A.', 'FBASC-22', '01', 'minas de arena #17', '04264472911', '2147483647', 'Plato', '3004124787', 'calle real tronca 99', 'Cundinamarca', 'Bogotá', 'Urumita', 'La Guajira', 'Neiva', 'Huila', 17, 16, 'Sede Seapex Bogotá', '7', 'YKAJSA-1231231', '15'),
(1934714702, '2020-09-26', '3581919691', '[{\"cantidad\":\"15\",\"tipocarga\":\"Caja\",\"descripcion\":\"Productos de limpieza\"}]', 'SEAPEX C.A.', 'FBASC-22', '01', 'minas de arena #17', '04264472911', '2147483647', 'Plato', '3004124787', 'calle real tronca 99', 'Cundinamarca', 'Bogotá', 'Inírida', 'Guainía', 'El Retorno', 'Guaviare', 14, 15, 'Sede Seapex Bogotá', '7', 'KASDA39422', '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actas_recogida`
--

CREATE TABLE `actas_recogida` (
  `id` int(15) UNSIGNED NOT NULL,
  `creado` date NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `nombre_empresa` varchar(60) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `correo_cliente` varchar(60) NOT NULL,
  `version` varchar(15) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `telefono_cliente` varchar(15) NOT NULL,
  `id_cliente` varchar(15) NOT NULL,
  `ciudad_cliente` varchar(60) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `ciudad_origen` varchar(25) NOT NULL,
  `departamento_origen` varchar(25) NOT NULL,
  `ciudad_destino` varchar(25) NOT NULL,
  `departamento_destino` varchar(25) NOT NULL,
  `dep` int(5) NOT NULL,
  `depp` int(5) NOT NULL,
  `conductor` varchar(50) NOT NULL,
  `cedula_c` varchar(15) NOT NULL,
  `fecha_recogida` date NOT NULL,
  `barrio` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actas_recogida`
--

INSERT INTO `actas_recogida` (`id`, `creado`, `user_id`, `nombre_empresa`, `codigo`, `correo_cliente`, `version`, `direccion_cliente`, `telefono_cliente`, `id_cliente`, `ciudad_cliente`, `placa`, `ciudad_origen`, `departamento_origen`, `ciudad_destino`, `departamento_destino`, `dep`, `depp`, `conductor`, `cedula_c`, `fecha_recogida`, `barrio`) VALUES
(3276179636, '2020-09-27', '', 'SEAPEX C.A.', 'FBASC-22', 'leonardo27188@gmail.com', '01', 'minas de arena #17', '04264472911', '2147483647', 'Plato', 'YVAKS-2312', 'Leticia', 'Amazonas', 'Urumita', 'La Guajira', 0, 17, 'Abiu Brizuela', '2455745456', '2020-09-17', 'Mina de arena'),
(4222791371, '2020-09-27', '', 'SEAPEX C.A.', 'FBASC-22', 'leonardo27188@gmail.com', '01', 'minas de arena #17', '04264472911', '2147483647', 'Plato', 'YVAKS-2312', 'Leticia', 'Amazonas', 'Villanueva', 'La Guajira', 0, 17, 'Abiu Brizuela', '2455745456', '2020-09-08', ' a juro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(15) UNSIGNED NOT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL,
  `tipo_archivo` varchar(11) DEFAULT NULL,
  `tipo` enum('Cotizacion','Planilla de liquidación','Factura','Guía') DEFAULT NULL,
  `numero_doc` varchar(15) DEFAULT NULL,
  `codigo_hex` varchar(15) DEFAULT NULL,
  `usuario_responsable` varchar(15) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `creado` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre_archivo`, `tipo_archivo`, `tipo`, `numero_doc`, `codigo_hex`, `usuario_responsable`, `url`, `creado`) VALUES
(155202722, 'FV-2529206769', 'PDF', 'Factura', '2529206769', NULL, '3887555264', 'Facturas/to_pdf/2529206769', '2020-10-05 03:08:09'),
(965752052, 'PLN-3297735754', 'PDF', 'Planilla de liquidación', '3297735754', NULL, '3887555264', 'Liquidaciones/Liquidaciones_to_pdf/3297735754', '2020-10-04 17:44:22'),
(1070042639, 'FV-2511210569', 'PDF', 'Factura', '2511210569', NULL, '3581919691', 'Facturas/to_pdf/2511210569', '2020-10-01 12:17:07'),
(1110842952, 'PLN-1651292733', 'PDF', 'Planilla de liquidación', '1651292733', '', '3581919691', 'Liquidaciones/Liquidaciones_to_pdf/1651292733', '2020-09-23 07:56:40'),
(1202643409, 'COT-2269103988', 'PDF', 'Cotizacion', '2269103988', '873fc774', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/873fc774/2269103988', '2020-10-01 13:33:38'),
(1226971885, 'FV-2363902457', 'PDF', 'Factura', '2363902457', NULL, '3581919691', 'Facturas/to_pdf/2363902457', '2020-09-29 12:07:16'),
(1419954328, 'FV-3213091751', 'PDF', 'Factura', '3213091751', NULL, '3581919691', 'Facturas/to_pdf/3213091751', '2020-09-29 09:34:41'),
(1560743900, 'COT-4256459329', 'PDF', 'Cotizacion', '4256459329', 'fdb46a41', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/fdb46a41/4256459329', '2020-09-15 03:19:47'),
(2037887313, 'FV-3203451251', 'PDF', 'Factura', '3203451251', NULL, '3581919691', 'Facturas/to_pdf/3203451251', '2020-10-01 09:51:40'),
(2155671561, 'COT-2977005845', 'PDF', 'Cotizacion', '2977005845', 'b1718115', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/b1718115/2977005845', '2020-09-15 04:53:47'),
(2756972031, 'PLN-1792513559', 'PDF', 'Planilla de liquidación', '1792513559', '', '3581919691', 'Liquidaciones/Liquidaciones_to_pdf/1792513559', '2020-09-23 07:49:49'),
(2892461986, 'COT-3090354435', 'PDF', 'Cotizacion', '3090354435', 'b8331103', '3887555264', 'Cotizaciones/Cotizaciones_to_pdf/b8331103/3090354435', '2020-10-04 12:56:57'),
(3077056877, 'PLN-3537873336', 'PDF', 'Planilla de liquidación', '3537873336', NULL, '3581919691', 'Liquidaciones/Liquidaciones_to_pdf/3537873336', '2020-10-02 12:38:51'),
(3084185921, 'COT-1161266891', 'PDF', 'Cotizacion', '1161266891', '453786cb', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/453786cb/1161266891', '2020-09-15 05:31:14'),
(3108593236, 'FV-9462812', 'PDF', 'Factura', '9462812', NULL, '3581919691', 'Facturas/to_pdf/9462812', '2020-09-28 23:27:29'),
(3399344558, 'FV-3099903993', 'PDF', 'Factura', '3099903993', NULL, '3581919691', 'Facturas/to_pdf/3099903993', '2020-09-29 12:15:16'),
(3420490963, 'PLN-239726373', 'PDF', 'Planilla de liquidación', '239726373', '', '3581919691', 'Liquidaciones/Liquidaciones_to_pdf/239726373', '2020-09-23 06:23:27'),
(3456205403, 'COT-141527752', 'PDF', 'Cotizacion', '141527752', '86f8ac8', '3887555264', 'Cotizaciones/Cotizaciones_to_pdf/86f8ac8/141527752', '2020-10-04 12:46:29'),
(3519413287, 'COT-2979338657', 'PDF', 'Cotizacion', '2979338657', 'b19519a1', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/b19519a1/2979338657', '2020-09-15 15:13:35'),
(3677372896, 'PLN-249333968', 'PDF', 'Planilla de liquidación', '249333968', NULL, '3581919691', 'Liquidaciones/Liquidaciones_to_pdf/249333968', '2020-10-04 13:07:12'),
(4254854241, 'PLN-545130989', 'PDF', 'Planilla de liquidación', '545130989', '', '3581919691', 'Liquidaciones/Liquidaciones_to_pdf/545130989', '2020-09-23 05:28:39');

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
('17p160f8p9qbprv6cpvneiec8s1nbluv', 3887555264, '2020-10-05 03:30:00', '2020-10-05 04:01:31', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('d78v3tgaomg8gql233dgbp4tshgi3pqc', 3581919691, '2020-10-05 03:02:04', '2020-10-05 04:00:17', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('o4pb5iamf27q71hpmam58qls5ca7294h', 3887555264, '2020-10-05 02:49:03', '2020-10-05 00:59:38', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('64er7fep7itnah49q65s8t58s6tv2i7v', 3581919691, '2020-10-05 02:47:44', '2020-10-05 00:59:55', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('spvinjj9iipao4bvim67e1r11sd8cb3f', 3887555264, '2020-10-04 18:57:42', '2020-10-04 18:04:39', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('sm54n4qicobnnklrr3ed8iauampk7f0q', 3887555264, '2020-10-04 15:16:09', '2020-10-04 13:16:09', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('agh428kiv1p9ct8u5v1la413g07asjn6', 3887555264, '2020-10-04 10:57:22', '2020-10-04 08:57:22', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('u58bsn4hk18je0bmcrphsh562h3458nf', 3887555264, '2020-10-04 10:51:02', '2020-10-04 08:51:02', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('dgt6epmgq7k3ofqtk7evmaoss3njh67s', 3887555264, '2020-10-04 10:36:04', '2020-10-04 08:48:03', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('2fd23oqlb9far393s8ujkemutvaqehfj', 3887555264, '2020-10-04 10:17:15', '2020-10-04 08:28:19', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('78n0hf3rkmqfgjp9cnviqlcpq9a2sic2', 3887555264, '2020-10-04 10:10:42', '2020-10-04 08:10:43', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('ku62dtj3eud5ad35b8kpl5u7vi2k9b27', 3581919691, '2020-10-04 09:57:57', '2020-10-04 17:49:29', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('9tg8o47bqpf50qr1dmnofg8t52faf2oc', 3887555264, '2020-10-03 20:45:13', '2020-10-03 18:45:15', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('mrf18n93mq4e84nn6uhdm7pqeq5cfvg9', 3887555264, '2020-10-03 20:39:39', '2020-10-03 18:39:39', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('o1t2ib4qlk35rpr22396eug5vrmo3i3v', 3887555264, '2020-10-03 20:32:52', '2020-10-03 18:32:52', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('1sntmhe9v7j6ap4s2jobl4nhjka4172k', 3887555264, '2020-10-03 20:32:18', '2020-10-03 18:32:18', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('371eeoaf7pvrmk8ujoim4t1qd00u8t69', 3887555264, '2020-10-03 20:29:01', '2020-10-03 18:29:01', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('7pjgtdn14ik7pu35qj9ghq24qjaur797', 3887555264, '2020-10-04 14:38:12', '2020-10-04 13:07:13', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('2a5traqj8d9et8at72ru4ct36hdusril', 3887555264, '2020-10-04 11:45:19', '2020-10-04 10:01:13', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('mea0lqdk8kdjpvghpl33hfi0v6nakad1', 3887555264, '2020-10-04 13:45:46', '2020-10-04 12:25:38', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('lmfmofl4gb2bqnsnj5dlrqeocq0b7pfq', 3887555264, '2020-10-04 14:35:24', '2020-10-04 12:35:24', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('od4t31t5flp3e4iqdg6634ic0suj6oei', 3887555264, '2020-10-04 14:37:12', '2020-10-04 12:37:12', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8'),
('b0sg25cmke6ldrt7ob26e4dbaucgufsr', 3581919691, '2020-10-03 16:41:46', '2020-10-03 18:45:35', '127.0.0.1', 'Chrome 85.0.4183.121 on Windows 8');

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
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `ciudad_origen` varchar(50) DEFAULT NULL,
  `ciudad_destino` varchar(50) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion_cliente` varchar(155) DEFAULT NULL,
  `telefono_cliente` varchar(15) DEFAULT NULL,
  `cedula_remitente` varchar(15) DEFAULT NULL,
  `contacto_remitente` varchar(50) DEFAULT NULL,
  `direccion_remitente` varchar(155) DEFAULT NULL,
  `telefono_remitente` varchar(15) DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `totalKilos` varchar(20) DEFAULT NULL,
  `totalVolumen` varchar(20) DEFAULT NULL,
  `valorDeclarado` varchar(20) DEFAULT NULL,
  `segurocarga` varchar(20) DEFAULT NULL,
  `totalSeguro` varchar(15) DEFAULT NULL,
  `dicecontener` varchar(100) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `forma_pago` varchar(150) DEFAULT NULL,
  `costeguia` varchar(150) DEFAULT NULL,
  `valor_flete` varchar(15) DEFAULT NULL,
  `otrosCargos` varchar(15) DEFAULT NULL,
  `total` varchar(15) DEFAULT NULL,
  `estado` enum('Creada','Generada','Cumplida','En físico','Anulada','Archivada','Enviada') NOT NULL,
  `id_tarifa` varchar(5) NOT NULL,
  `precioNegociado` varchar(15) NOT NULL,
  `f_cumplida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`id`, `fecha`, `ciudad_origen`, `ciudad_destino`, `cedula`, `nombre_empresa`, `direccion_cliente`, `telefono_cliente`, `cedula_remitente`, `contacto_remitente`, `direccion_remitente`, `telefono_remitente`, `cantidad`, `totalKilos`, `totalVolumen`, `valorDeclarado`, `segurocarga`, `totalSeguro`, `dicecontener`, `user_id`, `forma_pago`, `costeguia`, `valor_flete`, `otrosCargos`, `total`, `estado`, `id_tarifa`, `precioNegociado`, `f_cumplida`) VALUES
(35896010, '2020-10-01', 'Leticia', 'Leticia', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', '456789213', 'Luz Rios', 'calle real tronca 3', '041675214878', 13, '14', '38.4', '150000', '5', '7500', 'ya-k231', '3581919691', '1', '500', '134410', '100000', '242410', 'En físico', '5', '3500', '0000-00-00'),
(165382146, '2020-09-24', 'Leticia', 'Leticia', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', '456789213', 'Luz Rios', 'calle real tronca 3', '041675214878', 13, '14', '38.4', '150000', '5', '7500', 'ya-k231', '3581919691', '1', '500', '134410', '100000', '242410', 'En físico', '5', '3500', '2020-10-31'),
(346592779, '2020-09-24', 'Leticia', 'Leticia', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', '456789213', 'Luz Rios', 'calle real tronca 3', '041675214878', 13, '14', '38.4', '150000', '5', '7500', '032545', '3581919691', '1', '500', '134400', '500000', '642400', 'En físico', '5', '3500', '0000-00-00'),
(2303080163, '2020-10-04', 'Abriaquí', 'Amagá', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', '456789213', 'Luz Rios', 'calle real tronca 3', '041675214878', 4, '40', '144', '15000', '3', '450', 'C-2321', '3887555264', '2', '500', '2016000', '1500', '2018450', 'Archivada', '2', '14000', '0000-00-00'),
(2397551311, '2020-09-24', 'Leticia', 'Leticia', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', '456789213', 'Luz Rios', 'calle real tronca 3', '041675214878', 13, '14', '38.4', '12000000', '5', '600000', 'campanas 3', '3581919691', '2', '500', '134400', '150000', '884900', 'En físico', '', '', '0000-00-00'),
(2824655278, '2020-09-24', 'Leticia', 'Leticia', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', '456789213', 'Luz Rios', 'calle real tronca 3', '041675214878', 13, '14', '38.4', '150000', '5', '7500', 'ya-k231', '3581919691', '1', '500', '134400', '100000', '242400', 'Archivada', '5', '3500', '0000-00-00');

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
(31, '31231231', 'Tequeños vlz', 'Lenin Granado', 'Lelianis Granado', 789456145, '04127982255', 'granadolela@gmail.com', 'Córdoba', 'Planeta Rica', 13, 'lelianis', 'Activo', '2020-08-29 05:39:13', '0000-00-00', 'Persona jurídica', 3, 2, 3581919691, 'Si', ''),
(36, '258147369', 'SEAPEX C.A.', 'Leonardo Rios', 'Jose Rios', 2147483647, '04264472911', 'leonardo27188@gmail.com', 'Magdalena', 'Plato', 18, 'minas de arena #17', 'Activo', '2020-09-08 09:36:54', '0000-00-00', 'Persona jurídica', 4, 2, 3581919691, 'No', ''),
(42, 'No aplica', 'No aplica', 'No aplica', 'Luis Rios', 456456464, '456467984', 'leoanrdo2718@hotmail.es', 'Huila', 'La Argentina', 16, 'calle real troncal 99', 'Activo', '2020-09-29 19:12:03', '0000-00-00', 'Persona natural', 2, 2, 3581919691, 'Si', '');

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
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `codigo` varchar(150) NOT NULL,
  `status` enum('Borrador','Generado','Enviado') NOT NULL,
  `estatus_gestion` enum('Borrador','Enviado','Anulada','Rechazada','En estudio','Renegociado','Aprobada') NOT NULL,
  `vnota` varchar(15) NOT NULL,
  `tiempo` varchar(15) NOT NULL,
  `notas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`notas`)),
  `saludo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`saludo`)),
  `contrato` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`contrato`)),
  `observaciones` longtext NOT NULL,
  `f_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `user_id`, `cedula`, `fecha_creacion`, `items`, `codigo`, `status`, `estatus_gestion`, `vnota`, `tiempo`, `notas`, `saludo`, `contrato`, `observaciones`, `f_vencimiento`) VALUES
(141527752, 3887555264, '2147483647', '2020-10-04 13:15:31', '[{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', '86f8ac8', 'Enviado', 'Rechazada', 'Si', '1601815437', '[{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', 'Me gusta el cliente', '2020-10-02'),
(337330412, 3887555264, '2147483647', '2020-10-04 13:00:47', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"2\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Antioquia\",\"ciudad_origen\":\"Abriaqu\\u00ed\",\"ciudad_destino\":\"Amag\\u00e1\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"14000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', '141b40ec', 'Borrador', 'Borrador', 'Si', '1601813933', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '2020-10-31'),
(779570742, 3581919691, '2147483647', '2020-10-02 12:16:43', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', '2e774e36', 'Borrador', 'Borrador', 'Si', '1601640844', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '2121-08-28'),
(800099229, 3581919691, '2147483647', '2020-09-19 19:00:23', '[{\"id_tarifa\":\"6\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Bol\\u00edvar\",\"ciudad_origen\":\"Ach\\u00ed\",\"ciudad_destino\":\"Barranquilla\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Consolidados\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"20000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', '2fb08b9d', 'Borrador', 'Borrador', 'Si', '1600541972', '[{\"id\":\"25\",\"numero\":\"Saludo\",\"resumen\":\"Nota para transporte cosolidados.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte consolidados.\",\"tipo_transporte\":\"Consolidados\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(988238176, 3887555264, '2147483647', '2020-10-04 08:48:31', '[{\"id_tarifa\":\"2\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Antioquia\",\"ciudad_origen\":\"Abriaqu\\u00ed\",\"ciudad_destino\":\"Amag\\u00e1\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"15000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', '3ae75160', 'Borrador', 'Borrador', 'Si', '1601801287', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '2020-10-08'),
(1179672113, 3581919691, '2147483647', '2020-10-01 12:51:18', '[{\"id_tarifa\":\"6\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Bol\\u00edvar\",\"ciudad_origen\":\"Ach\\u00ed\",\"ciudad_destino\":\"Barranquilla\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Consolidados\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"20000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', '46505e31', 'Borrador', 'Anulada', 'Si', '1600541972', '[{\"id\":\"25\",\"numero\":\"Saludo\",\"resumen\":\"Nota para transporte cosolidados.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte consolidados.\",\"tipo_transporte\":\"Consolidados\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', 'esta es una observacion', '0000-00-00');
INSERT INTO `cotizaciones` (`id`, `user_id`, `cedula`, `fecha_creacion`, `items`, `codigo`, `status`, `estatus_gestion`, `vnota`, `tiempo`, `notas`, `saludo`, `contrato`, `observaciones`, `f_vencimiento`) VALUES
(2269103988, 3581919691, '2147483647', '2020-10-01 13:36:14', '[{\"id_tarifa\":\"2\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Antioquia\",\"ciudad_origen\":\"Abriaqu\\u00ed\",\"ciudad_destino\":\"Amag\\u00e1\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"15000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/5000\",\"variable\":\"5000\"}]', '873fc774', 'Generado', 'Anulada', 'Si', '1601558610', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(2404806548, 3581919691, '2147483647', '2020-10-02 12:22:14', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/5000\",\"variable\":\"5000\"}]', '8f566f94', 'Borrador', 'Borrador', 'Si', '1600542330', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', 'esta es una observacion', '2020-10-31'),
(2977005845, 3581919691, '2147483647', '2020-09-19 20:50:23', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4900\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"3500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/5000\",\"variable\":\"5000\"}]', 'b1718115', 'Borrador', 'Aprobada', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', 'esta es una observacion', '0000-00-00'),
(2979338657, 3581919691, '2147483647', '2020-09-19 19:09:13', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"2\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/600\",\"variable\":\"600\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'b19519a1', 'Enviado', 'Rechazada', 'Si', '1600181917', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(3090354435, 3887555264, '2147483647', '2020-10-04 12:58:33', '[{\"id_tarifa\":\"2\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Antioquia\",\"ciudad_origen\":\"Abriaqu\\u00ed\",\"ciudad_destino\":\"Amag\\u00e1\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"14000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', 'b8331103', 'Enviado', 'Aprobada', 'Si', '1601816070', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '2020-10-16');

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
-- Estructura de tabla para la tabla `documentos_cotizaciones`
--

CREATE TABLE `documentos_cotizaciones` (
  `id` int(15) NOT NULL,
  `tiempo` varchar(15) NOT NULL,
  `id_cliente` varchar(25) NOT NULL,
  `url` varchar(250) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos_cotizaciones`
--

INSERT INTO `documentos_cotizaciones` (`id`, `tiempo`, `id_cliente`, `url`, `nombre`) VALUES
(2, '1599687515', 'undefined', '/include/files/tvg-cargo-logo3.png', ''),
(3, '1599687916', '2147483647', '/include/files/tvg-cargo-logo4.png', ''),
(4, '1599688044', 'undefined', '/include/files/Sin_título-1.png', ''),
(5, '1599691154', '2147483647', '/include/files/Sin_título-11.png', ''),
(6, '1599691983', '2147483647', '/include/files/Sin_título-12.png', ''),
(7, '1599694031', '2147483647', '/include/files/tvg-cargo-logo5.png', ''),
(8, '1599697357', '2147483647', '/include/files/tvg-cargo-logo6.png', ''),
(10, '1599697573', '2147483647', '/include/files/Sin_título-13.png', ''),
(11, '1599697633', '2147483647', '/include/files/Sin_título-14.png', ''),
(12, '1599697697', '2147483647', '/include/files/Sin_título-15.png', ''),
(13, '1599697797', '2147483647', '/include/files/Sin_título-16.png', ''),
(14, '1599697865', '2147483647', '/include/files/Sin_título-17.png', ''),
(15, '1599700455', '2147483647', '/include/files/Sin_título-18.png', ''),
(16, '1599754673', '2147483647', '/include/files/Sin_título-19.png', ''),
(17, '1599881358', '2147483647', '/include/files/Sin_título-110.png', ''),
(18, '1599883461', '2147483647', '/include/files/Sin_título-111.png', 'Sin_título-118.png'),
(19, '1599885574', '2147483647', '/include/files/Sin_título-112.png', 'Sin_título-118.png'),
(20, '1599885731', '2147483647', '/include/files/Sin_título-113.png', 'Sin_título-118.png'),
(21, '1599963881', '2147483647', '/include/files/Sin_título-114.png', 'Sin_título-118.png'),
(22, '1599964306', '2147483647', '/include/files/Sin_título-115.png', 'Sin_título-118.png'),
(23, '1599964375', '2147483647', '/include/files/Sin_título-116.png', 'Sin_título-118.png'),
(24, '1599964497', '2147483647', '/include/files/Sin_título-117.png', 'Sin_título-118.png'),
(25, '1599964616', '2147483647', '/include/files/Sin_título-118.png', 'Sin_título-118.png'),
(26, '1599885731', '2147483647', '/include/files/Sin_título-119.png', 'Sin_título-119.png'),
(27, '1600101953', '2147483647', '/include/files/Sin_título-120.png', 'Sin_título-120.png'),
(28, '1600102198', '2147483647', '/include/files/Sin_título-121.png', 'Sin_título-121.png'),
(29, '1600102367', '2147483647', '/include/files/Sin_título-122.png', 'Sin_título-122.png'),
(30, '1600130430', '2147483647', '/include/files/Sin_título-123.png', 'Sin_título-123.png'),
(31, '1600138151', '2147483647', '/include/files/Sin_título-124.png', 'Sin_título-124.png'),
(32, '1600144402', '2147483647', '/include/files/Sin_título-125.png', 'Sin_título-125.png'),
(33, '1600147834', '2147483647', '/include/files/Sin_título-126.png', 'Sin_título-126.png'),
(34, '1600181917', '2147483647', '/include/files/Sin_título-127.png', 'Sin_título-127.png'),
(35, '1600541972', '2147483647', '/include/files/Sin_título-128.png', 'Sin_título-128.png'),
(36, '1600542330', '2147483647', '/include/files/Sin_título-129.png', 'Sin_título-129.png'),
(37, '1601558610', '2147483647', '/include/files/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena.jpg', '59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena.jpg');

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
(6, 38945687, '/include/files/34102368_1756365637813202_7431407042675343360_n3.png'),
(7, 0, '/include/files/tvg-cargo-logo1.png');

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
(1, 'Tvg Cargo', 456464, 'Atlántico', 'Sabanalarga', 'direccion', 'lelita@gmail.com', '45678979', '1234567', '1234679', '4565321', 'http://www.antaresoft.com/', 'include/img/Sin_título-22.png', 'include/img/logodos1.png', 3);

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
(1, 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', 'Activo'),
(3, 'Metros', 'VOLUMEN=(AN * AL* LA) *300', '300', 'Activo'),
(4, 'Porcientos', 'TOTAL KILOS + (TOTAL KILOS *60%)', '60', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(15) UNSIGNED NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `f_vencimiento` date NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `direccion_cliente` varchar(150) NOT NULL,
  `telefono_cliente` varchar(15) NOT NULL,
  `ciudad_cliente` varchar(30) NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `precio_letras` varchar(150) NOT NULL,
  `subtotal` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `dias_demora` varchar(15) NOT NULL,
  `estado` enum('Generado','Enviado','Cancelado','Vencido','Anulado','Creado') NOT NULL,
  `notas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`notas`)),
  `correo_cliente` varchar(60) NOT NULL,
  `url_foto` varchar(100) NOT NULL,
  `alertar` enum('Si','No','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `user_id`, `fecha`, `f_vencimiento`, `cedula`, `nombre_cliente`, `direccion_cliente`, `telefono_cliente`, `ciudad_cliente`, `items`, `forma_pago`, `precio_letras`, `subtotal`, `total`, `dias_demora`, `estado`, `notas`, `correo_cliente`, `url_foto`, `alertar`) VALUES
(9462812, '3581919691', '2020-09-29', '2020-09-01', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', 'Plato', '[{\"origen\":\"Leticia\",\"destino\":\"Leticia\",\"tipo_transporte\":null,\"total\":\"884900\",\"n_guia\":\"N-2397551311\",\"id\":\"2397551311\",\"nombre_cliente\":\"SEAPEX C.A.\",\"direccion_cliente\":\"minas de arena #17\",\"telefono_cliente\":\"04264472911\",\"cedula_cliente\":\"2147483647\",\"ciudad_cliente\":\"Plato\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"15\"}]', 'Crédito', 'doscientos cuarenta y dos mil cuatrocientos.', '884900', '884900', '15', 'Cancelado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leonardo27188@gmail.com', '', 'Si'),
(2363902457, '3581919691', '2020-09-29', '2020-10-14', '456456464', 'Luis Rios', 'calle real troncal 99', '456467984', 'La Argentina', '[{\"origen\":\"Leticia\",\"destino\":\"Puerto Nari\\u00f1o\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"total\":\"3150000000\",\"n_guia\":\"E-1332210380\",\"codigo\":\"1332210380\",\"nombre_cliente\":\"Luis Rios\",\"nombre_empresa\":\"No aplica\",\"nit_cliente\":\"No aplica\",\"direccion_cliente\":\"calle real troncal 99\",\"telefono_cliente\":\"456467984\",\"cedula_cliente\":\"456456464\",\"ciudad_cliente\":\"La Argentina\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"15\"}]', 'Crédito', 'cuatrocientos ochenta y cuatro mil ochocientos diez.', '3160000000', '3150000000', '15', 'Generado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leoanrdo2718@hotmail.es', '', 'Si'),
(2511210569, '3581919691', '2020-10-01', '2020-10-16', '258147369', 'SEAPEX C.A.', 'direccion', '04264472911', 'Arauca', '[{\"origen\":\"Arauca\",\"destino\":\"Yopal\",\"n_guia\":\"C-1231231\",\"total\":\"5000\",\"tipo_transporte\":\"Terrestre\"}]', 'Crédito', 'Cinco mil pesos', '', '5000', '15', 'Anulado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leonardo27188@gmail.com', '', 'Si'),
(2529206769, '3887555264', '2020-10-04', '2020-10-19', '258147369', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', 'Plato', '[{\"origen\":\"Abriaqu\\u00ed\",\"destino\":\"Amag\\u00e1\",\"total\":\"2018450\",\"n_guia\":\"N-2303080163\",\"id\":\"2303080163\",\"nombre_cliente\":\"Jose Rios\",\"nombre_empresa\":\"SEAPEX C.A.\",\"nit_cliente\":\"258147369\",\"direccion_cliente\":\"minas de arena #17\",\"telefono_cliente\":\"04264472911\",\"cedula_cliente\":\"2147483647\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"15\"}]', 'Crédito', 'un millón ciento veintisiete mil doscientos diez. ', '', '2018450', '15', 'Generado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leonardo27188@gmail.com', '', 'Si'),
(3099903993, '3581919691', '2020-09-29', '2020-10-14', '456456464', 'Luis Rios', 'calle real troncal 99', '456467984', 'La Argentina', '[{\"origen\":\"Leticia\",\"destino\":\"Puerto Nari\\u00f1o\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"total\":\"3150000000\",\"n_guia\":\"E-2286577589\",\"codigo\":\"2286577589\",\"nombre_cliente\":\"Luis Rios\",\"nombre_empresa\":\"No aplica\",\"nit_cliente\":\"No aplica\",\"direccion_cliente\":\"calle real troncal 99\",\"telefono_cliente\":\"456467984\",\"cedula_cliente\":\"456456464\",\"ciudad_cliente\":\"La Argentina\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"15\"}]', 'Crédito', 'doscientos cuarenta y dos mil cuatrocientos.', '3150000000', '3150000000', '15', 'Generado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leonardo27188@gmail.com', '', 'Si'),
(3203451251, '3581919691', '2020-10-01', '2020-10-16', '258147369', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', 'Plato', '[{\"origen\":\"Barranca Bermejo\",\"destino\":\"Monteria\",\"n_guia\":\"Mont-3231231\",\"total\":\"15000\",\"tipo_transporte\":\"Terrestre\"}]', 'Crédito', 'un millón quinientos mil ', '', '15000', '15', 'Cancelado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leonardo27188@gmail.com', '/include/img/trazabilidad/FV-3423423423.pdf', 'Si'),
(3213091751, '3581919691', '2020-09-29', '2020-10-07', '2147483647', 'SEAPEX C.A.', 'minas de arena #17', '04264472911', 'Plato', '[{\"origen\":\"Leticia\",\"destino\":\"Leticia\",\"tipo_transporte\":\"Terrestre\",\"total\":\"242400\",\"n_guia\":\"N-2824655278\",\"id\":\"2824655278\",\"nombre_cliente\":\"SEAPEX C.A.\",\"direccion_cliente\":\"minas de arena #17\",\"telefono_cliente\":\"04264472911\",\"cedula_cliente\":\"2147483647\",\"ciudad_cliente\":\"Plato\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"8\"},{\"origen\":\"Leticia\",\"destino\":\"Leticia\",\"tipo_transporte\":\"Terrestre\",\"total\":\"242410\",\"n_guia\":\"N-165382146\",\"id\":\"165382146\",\"nombre_cliente\":\"SEAPEX C.A.\",\"direccion_cliente\":\"minas de arena #17\",\"telefono_cliente\":\"04264472911\",\"cedula_cliente\":\"2147483647\",\"ciudad_cliente\":\"Plato\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"8\"},{\"origen\":\"Leticia\",\"destino\":\"Leticia\",\"tipo_transporte\":\"Terrestre\",\"total\":\"642400\",\"n_guia\":\"N-346592779\",\"id\":\"346592779\",\"nombre_cliente\":\"SEAPEX C.A.\",\"direccion_cliente\":\"minas de arena #17\",\"telefono_cliente\":\"04264472911\",\"cedula_cliente\":\"2147483647\",\"ciudad_cliente\":\"Plato\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"8\"}]', 'Crédito', 'un millón ciento veintisiete mil doscientos diez. ', '1127210', '1127210', '8', 'Cancelado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leonardo27188@gmail.com', '/include/img/comprobantes/Opinion-Plus-3.png', 'No'),
(4193809272, '3581919691', '2020-09-29', '2020-10-14', '456456464', 'Luis Rios', 'calle real troncal 99', '456467984', 'La Argentina', '[{\"origen\":\"Leticia\",\"destino\":\"Puerto Nari\\u00f1o\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"total\":\"3150000000\",\"n_guia\":\"E-2286577589\",\"codigo\":\"2286577589\",\"nombre_cliente\":\"Luis Rios\",\"nombre_empresa\":\"No aplica\",\"nit_cliente\":\"No aplica\",\"direccion_cliente\":\"calle real troncal 99\",\"telefono_cliente\":\"456467984\",\"cedula_cliente\":\"456456464\",\"ciudad_cliente\":\"La Argentina\",\"forma\":\"Cr\\u00e9dito\",\"dias\":\"15\"}]', 'Crédito', 'doscientos cuarenta y dos mil cuatrocientos.', '', '3150000000', '15', 'Creado', '[{\"id\":\"28\",\"numero\":\"Nota de factura\",\"resumen\":\"Nota de factura\",\"descripcion\":\"Por favor realizar  consignaci\\u00f3n a la cuente Banco de Bogot\\u00e1 N\\u00ba 1655508839 a nombre de TVG CARGO S.A.S. con NIT N\\u00ba 900.767.756-6.Favor realizar consignaci\\u00f3n y enviar soporte al correo electr\\u00f3nico TRANS_VG@YAHOO.COM    \",\"tipo_transporte\":\"Factura\",\"estado\":\"Activo\"}]', 'leonardo27188@gmail.com', '', 'Si');

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
-- Estructura de tabla para la tabla `historialcotizaciones`
--

CREATE TABLE `historialcotizaciones` (
  `id` int(15) NOT NULL,
  `id_cotizacion` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `status` varchar(15) NOT NULL,
  `estatus_gestion` varchar(15) NOT NULL,
  `vnota` varchar(15) NOT NULL,
  `tiempo` varchar(15) NOT NULL,
  `notas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`notas`)),
  `saludo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`saludo`)),
  `contrato` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`contrato`)),
  `observaciones` longtext NOT NULL,
  `f_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialcotizaciones`
--

INSERT INTO `historialcotizaciones` (`id`, `id_cotizacion`, `user_id`, `cedula`, `fecha_creacion`, `items`, `status`, `estatus_gestion`, `vnota`, `tiempo`, `notas`, `saludo`, `contrato`, `observaciones`, `f_vencimiento`) VALUES
(3, 2147483647, 2147483647, '2147483647', '2020-09-15 04:34:30', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(4, 2147483647, 2147483647, '2147483647', '2020-09-15 05:21:21', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(5, 2147483647, 2147483647, '2147483647', '2020-09-15 05:28:12', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4900\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(6, 2147483647, 2147483647, '2147483647', '2020-09-15 15:09:01', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"2\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/600\",\"variable\":\"600\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600181917', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(7, 2147483647, 2147483647, '2147483647', '2020-09-19 19:17:40', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4900\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"3500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/5000\",\"variable\":\"5000\"}]', 'Borrador', 'Borrador', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', 'esta es una observacion', '0000-00-00');
INSERT INTO `historialcotizaciones` (`id`, `id_cotizacion`, `user_id`, `cedula`, `fecha_creacion`, `items`, `status`, `estatus_gestion`, `vnota`, `tiempo`, `notas`, `saludo`, `contrato`, `observaciones`, `f_vencimiento`) VALUES
(8, 141527752, 2147483647, '2147483647', '2020-10-04 12:45:15', '[{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1601815437', '[{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', 'Me gusta el cliente', '0000-00-00'),
(9, 2147483647, 2147483647, '2147483647', '2020-10-04 12:55:08', '[{\"id_tarifa\":\"2\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Antioquia\",\"ciudad_origen\":\"Abriaqu\\u00ed\",\"ciudad_destino\":\"Amag\\u00e1\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"14000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1601816070', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00'),
(10, 337330412, 2147483647, '2147483647', '2020-10-04 13:00:47', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"2\",\"departamento_destino\":\"Atl\\u00e1ntico\",\"departamento_origen\":\"Antioquia\",\"ciudad_origen\":\"Abriaqu\\u00ed\",\"ciudad_destino\":\"Amag\\u00e1\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"14000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1601813933', '[{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]', '', '0000-00-00');

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
  `tipo_carga` varchar(15) NOT NULL,
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
(4, 4118347882, 789456145, '2020-09-05', '2020-09-11', '20328861', 'Caja', '15', '60', '600', '350000', '3150000000', '2020-09-04', 1, '1560000789', '2020-09-04', 1, '2020-09-19', '15987657954', '2020-09-04', '5465789', '56464546', '25-08-2020', 3);

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
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE `liquidaciones` (
  `id` int(15) UNSIGNED NOT NULL,
  `idcarga` varchar(15) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `id_cotizacion` varchar(15) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `tipo_transporte` varchar(20) NOT NULL,
  `tipo_envio` varchar(20) NOT NULL,
  `departamento_origen` varchar(20) NOT NULL,
  `departamento_destino` varchar(20) NOT NULL,
  `ciudad_origen` varchar(25) NOT NULL,
  `ciudad_destino` varchar(25) NOT NULL,
  `itinerarios` varchar(30) NOT NULL,
  `tiempos` varchar(30) NOT NULL,
  `precio` varchar(26) NOT NULL,
  `escala` varchar(15) NOT NULL,
  `formula` varchar(50) NOT NULL,
  `variable` varchar(15) NOT NULL,
  `factor` varchar(20) NOT NULL,
  `id_tarifa` varchar(20) NOT NULL,
  `totalVolumen` varchar(25) NOT NULL,
  `totalKilos` varchar(25) NOT NULL,
  `totalPrecios` varchar(25) NOT NULL,
  `totalUnidades` varchar(25) NOT NULL,
  `totalSeguro` varchar(25) NOT NULL,
  `segurocarga` varchar(5) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('Creado','Generado','','') NOT NULL,
  `generado_fecha` date NOT NULL,
  `costeguia` varchar(10) NOT NULL,
  `precioItem` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `liquidaciones`
--

INSERT INTO `liquidaciones` (`id`, `idcarga`, `user_id`, `id_cotizacion`, `cedula`, `items`, `tipo_transporte`, `tipo_envio`, `departamento_origen`, `departamento_destino`, `ciudad_origen`, `ciudad_destino`, `itinerarios`, `tiempos`, `precio`, `escala`, `formula`, `variable`, `factor`, `id_tarifa`, `totalVolumen`, `totalKilos`, `totalPrecios`, `totalUnidades`, `totalSeguro`, `segurocarga`, `creado`, `estado`, `generado_fecha`, `costeguia`, `precioItem`) VALUES
(239726373, 'ya-k231', '3581919691', '2977005845', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"30\",\"al\":\"30\",\"la\":\"20\",\"cantidad\":\"10\",\"kilosbascula\":\"2\",\"kilostotal\":2,\"volumen\":36,\"tipocarga\":\"Saco\",\"precioItem\":126000},{\"tipo_carga\":\"\",\"an\":\"20\",\"al\":\"20\",\"la\":\"10\",\"cantidad\":\"3\",\"kilosbascula\":\"4\",\"kilostotal\":12,\"volumen\":2.4000000000000004,\"tipocarga\":\"Caja\",\"precioItem\":8400.000000000002}]', 'Terrestre', 'Sobre menor a 1000gr', 'Amazonas', 'Amazonas', 'Leticia', 'Leticia', 'Lunes-Miercoles-Viernes', '', '3500', 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', '1', '5', '38.4', '14', '134400', '13', '6720', '5', '2020-09-24 18:30:02', 'Generado', '2020-09-23', '500', '3500'),
(249333968, '031', '3581919691', '2977005845', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"30\",\"al\":\"30\",\"la\":\"20\",\"cantidad\":\"10\",\"kilosbascula\":\"2\",\"kilostotal\":2,\"volumen\":36,\"tipocarga\":\"Saco\",\"precioItem\":126000},{\"tipo_carga\":\"\",\"an\":\"20\",\"al\":\"20\",\"la\":\"10\",\"cantidad\":\"3\",\"kilosbascula\":\"4\",\"kilostotal\":12,\"volumen\":2.4000000000000004,\"tipocarga\":\"Caja\",\"precioItem\":8400.000000000002}]', 'Terrestre', 'Sobre menor a 1000gr', 'Amazonas', 'Amazonas', 'Leticia', 'Leticia', 'Lunes-Miercoles-Viernes', 'Express', '3500', 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', '1', '5', '38.4', '14', '134400', '13', '6720', '5', '2020-10-04 13:07:13', 'Generado', '2020-10-04', '500', '3500'),
(545130989, '032545', '3581919691', '2977005845', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"30\",\"al\":\"30\",\"la\":\"20\",\"cantidad\":\"10\",\"kilosbascula\":\"2\",\"kilostotal\":2,\"volumen\":36,\"tipocarga\":\"Saco\",\"precioItem\":126000},{\"tipo_carga\":\"\",\"an\":\"20\",\"al\":\"20\",\"la\":\"10\",\"cantidad\":\"3\",\"kilosbascula\":\"4\",\"kilostotal\":12,\"volumen\":2.4000000000000004,\"tipocarga\":\"Caja\",\"precioItem\":8400.000000000002}]', 'Terrestre', 'Sobre menor a 1000gr', 'Amazonas', 'Amazonas', 'Leticia', 'Leticia', 'Lunes-Miercoles-Viernes', '', '3500', 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', '1', '5', '38.4', '14', '134400', '13', '6720', '5', '2020-09-24 18:29:33', 'Generado', '2020-09-23', '500', '3500'),
(1651292733, 'y-23qw', '3581919691', '2977005845', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"211\",\"al\":\"241\",\"la\":\"315\",\"cantidad\":\"2\",\"kilosbascula\":\"340\",\"kilostotal\":680,\"volumen\":6407.226,\"tipocarga\":\"Saco\",\"precioItem\":22425291},{\"tipo_carga\":\"\",\"an\":\"14\",\"al\":\"166\",\"la\":\"312\",\"cantidad\":\"2\",\"kilosbascula\":\"240\",\"kilostotal\":480,\"volumen\":290.0352,\"tipocarga\":\"Caja\",\"precioItem\":1015123.2}]', 'Terrestre', 'Sobre menor a 1000gr', 'Amazonas', 'Amazonas', 'Leticia', 'Leticia', 'Lunes-Miercoles-Viernes', '', '3500', 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', '1', '5', '6697.2612', '1160', '23440414.2', '4', '1172020.71', '5', '2020-09-24 18:29:46', 'Generado', '2020-09-23', '500', '3500'),
(1677667338, '036', '3581919691', '2977005845', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"20\",\"al\":\"20\",\"la\":\"20\",\"cantidad\":\"2\",\"kilosbascula\":\"4\",\"kilostotal\":8,\"volumen\":3.2,\"tipocarga\":\"Caja\",\"precioItem\":11200},{\"tipo_carga\":\"\",\"an\":\"40\",\"al\":\"40\",\"la\":\"40\",\"cantidad\":\"2\",\"kilosbascula\":\"10\",\"kilostotal\":20,\"volumen\":25.6,\"tipocarga\":\"Caja\",\"precioItem\":89600},{\"tipo_carga\":\"\",\"an\":\"10\",\"al\":\"153\",\"la\":\"20\",\"cantidad\":\"2\",\"kilosbascula\":\"6\",\"kilostotal\":12,\"volumen\":12.24,\"tipocarga\":\"Caja\",\"precioItem\":42840}]', 'Terrestre', 'Sobre menor a 1000gr', 'Amazonas', 'Amazonas', 'Leticia', 'Leticia', 'Lunes-Miercoles-Viernes', '', '3500', 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', '1', '5', '41.04', '40', '143640', '6', '7182', '5', '2020-09-24 18:24:32', 'Creado', '0000-00-00', '500', '3500'),
(1792513559, 'asd123', '3581919691', '2977005845', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"211\",\"al\":\"241\",\"la\":\"315\",\"cantidad\":\"2\",\"kilosbascula\":\"340\",\"kilostotal\":680,\"volumen\":6407.226,\"tipocarga\":\"Saco\",\"precioItem\":22425291},{\"tipo_carga\":\"\",\"an\":\"14\",\"al\":\"166\",\"la\":\"312\",\"cantidad\":\"2\",\"kilosbascula\":\"240\",\"kilostotal\":480,\"volumen\":290.0352,\"tipocarga\":\"Caja\",\"precioItem\":1015123.2}]', 'Terrestre', 'Sobre menor a 1000gr', 'Amazonas', 'Amazonas', 'Leticia', 'Leticia', 'Lunes-Miercoles-Viernes', 'Normal', '3500', 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', '1', '5', '6697.2612', '1160', '23440414.2', '4', '1172020.71', '5', '2020-09-24 18:29:52', 'Generado', '2020-09-23', '500', '3500'),
(3297735754, 'C-2321', '3887555264', '3090354435', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"0.4\",\"al\":\"0.6\",\"la\":\"0.5\",\"cantidad\":\"4\",\"kilosbascula\":\"10\",\"kilostotal\":40,\"volumen\":144,\"tipocarga\":\"Caja\",\"precioItem\":2016000}]', ' Aéreo comercial', 'Sobre menor a 900gr', 'Antioquia', 'Atlántico', 'Abriaquí', 'Amagá', 'Lunes-Miercoles-Viernes', 'Express', '14000', 'Metros', 'VOLUMEN=(AN * AL* LA) *300', '300', '3', '2', '144', '40', '2016000', '4', '60480', '3', '2020-10-04 17:44:23', 'Generado', '2020-10-04', '500', '14000'),
(3537873336, 'ABN_07', '3581919691', '2977005845', '2147483647', '[{\"tipo_carga\":\"\",\"an\":\"25\",\"al\":\"23\",\"la\":\"20\",\"cantidad\":\"3\",\"kilosbascula\":\"2.2\",\"kilostotal\":6.6000000000000005,\"volumen\":6.8999999999999995,\"tipocarga\":\"Caja\",\"precioItem\":33810}]', 'Terrestre', 'Sobre menor a 1000gr', 'Amazonas', 'Amazonas', 'Leticia', 'Leticia', 'Lunes-Miercoles-Viernes', 'Normal', '4900', 'Centímetros', 'VOLUMEN=(AN * AL* LA) /5000', '5000', '1', '5', '6.9', '6.6', '33810', '3', '1690.5', '5', '2020-10-02 12:38:51', 'Generado', '2020-10-02', '500', '4900');

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
(224, 'Kely25273381', '127.0.0.1', '2020-10-04 13:45:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(15) NOT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `resumen` varchar(255) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `tipo_transporte` varchar(25) NOT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `numero`, `resumen`, `descripcion`, `tipo_transporte`, `estado`) VALUES
(6, 'uno', 'Nota para transporte aéreo comercial', 'Descripción larga de nota para transporte aéreo..', ' Aéreo comercial', 'Activo'),
(8, 'cuatro', 'Nota de respaldo para terrestre', 'nota para transporte terrestre', 'Terrestre', 'Activo'),
(9, 'cinco', 'Nota de respaldo para terrestre otra', 'nota inactiva', 'Terrestre', 'Inactivo'),
(10, 'Saludo', 'Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte aéreo de QUIMICOS a diferentes destinos nacionales. ', 'Contamos con 20 años de experiencia  en las modalidades de Transporte Aéreo, Transporte Terrestre, Transporte Marítimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guainía, Vichada, Vaupés, Amazonas y San Andrés (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de víveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus envíos, cualquier inquietud con gusto será atendida y resuelta.   \nAgradecemos la confianza que han depositado en Nuestra Compañía. Basados en su solicitud dejamos en consideración la siguiente propuesta: ', 'Saludo', 'Activo'),
(11, 'Saludo', 'CARGUE Y DESCARGUE', ' La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizará en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras', 'Contrato', 'Activo'),
(12, 'Dos', 'TIEMPOS DE ENTREGA', '- AEREO: El siguiente día hábil al día de vuelo, en condiciones normales.  \n- INTERMODAL: De 10 a 12 días al zarpe de la embarcación, en condiciones normales. ', 'Contrato', 'Activo'),
(13, 'SEGURO', 'SEGURO', 'Contamos con una póliza de seguros para sus envíos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa mínima a asegurar es de 250.000, la aseguradora, solo cubre pérdida total de la carga NO parcial que esta se encuentre en tránsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la póliza 33-14-101001150, quedando exenta de cualquier reclamación que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercancía por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. ', 'Contrato', 'Activo'),
(14, 'RESERVACION DE ', 'RESERVACION DE CUPOS', 'La reservación u orden de servicio debe ser confirmada con un tiempo prudencial (dos días antes) para coordinar la logística de la operación respectiva.', 'Contrato', 'Activo'),
(15, 'CONDICIONES', 'CONDICIONES', 'Los costos anteriormente descritos están sujetos a las variaciones de combustible y/o dólar. Los precios aplican recibiendo la mercancía en la ciudad ORIGEN de la propuesta Comercial.', 'Contrato', 'Activo'),
(16, 'CORTE DE GUIA', 'CORTE DE GUIA', 'El valor del Corte de la guía y la facturación es de $6.000.', 'Contrato', 'Activo'),
(17, 'DOCUMENTACION', 'DOCUMENTACION', 'Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercancía, (Permiso  para perecederos, Vehículos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas Técnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercancía para que las autoridades verifiquen la información. ', 'Contrato', 'Activo'),
(18, 'FORMA DE PAGO', 'FORMA DE PAGO', 'Contado o a Negociar .', 'Contrato', 'Activo'),
(19, 'Clausula Penal', 'Clausula Penal', ' El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los términos y condiciones de la cotización (COEN), si por alguna razón después de tener la carga en nuestras instalaciones, paletizada o en verificación de narcóticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete más el 100% del valor a pagar de seguro, por daños y perjuicios coaccionados a nuestra  empresa, la carga será retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo será devuelta cuando se refleje el valor cancelado.', 'Contrato', 'Activo'),
(20, 'RESPONSABILIDAD', 'RESPONSABILIDADES', 'TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercancía si Uds., NO adjuntan los documentos necesarios para los envíos; los sobrecostos que esto acarree serán asumidos por su Empresa.', 'Contrato', 'Activo'),
(21, '__', '__', 'LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DAÑOS EN LA MERCANCÍA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, MÁRMOL, TELEVISORES (ELECTRODOMÉSTICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ARTÍCULOS, ANIMALES VIVOS Y DEMÁS ARTÍCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y/O DESTINATARIO ', 'Contrato', 'Activo'),
(22, 'TVG CARGO  S.A.', 'TVG CARGO  S.A.S NI LA POLIZA', ' se hace responsable del contenido ni cantidades de la mercancía a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. ', 'Contrato', 'Activo'),
(23, 'TVG CARGO  S.A.', 'TVG CARGO  S.A.S  NI LA POLIZA', ' se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercancía tienden a dañar el empaque en que esta viaja.  ', 'Contrato', 'Activo'),
(24, 'nota', 'Nota para transporte fluvial', 'Descripción larga de nota para transporte fluvial.', 'Fluvial', 'Activo'),
(25, 'Saludo', 'Nota para transporte cosolidados.', 'Descripción larga de nota para transporte consolidados.', 'Consolidados', 'Activo'),
(26, 'Intermodal', 'Nota para transporte intermodal.', 'Descripción larga de nota para transporte intermodal.', 'Intermodal', 'Activo'),
(27, 'Aereo carga', 'Nota para transporte aéreo carga.', 'Descripción larga de nota para transporte aéreo carga.', ' Aéreo carga', 'Activo'),
(28, 'Nota de factura', 'Nota de factura', 'Por favor realizar  consignación a la cuente Banco de Bogotá Nº 1655508839 a nombre de TVG CARGO S.A.S. con NIT Nº 900.767.756-6.Favor realizar consignación y enviar soporte al correo electrónico TRANS_VG@YAHOO.COM    ', 'Factura', 'Activo');

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
-- Estructura de tabla para la tabla `remitentes`
--

CREATE TABLE `remitentes` (
  `id` int(15) NOT NULL,
  `nit_remitente` varchar(15) NOT NULL,
  `empresa_remitente` varchar(50) NOT NULL,
  `contacto_remitente` varchar(50) NOT NULL,
  `cedula_remitente` varchar(15) NOT NULL,
  `telefono_remitente` varchar(15) NOT NULL,
  `correo_remitente` varchar(30) NOT NULL,
  `departamento_remitente` varchar(40) NOT NULL,
  `ciudad_remitente` varchar(40) NOT NULL,
  `direccion_remitente` varchar(255) NOT NULL,
  `dep` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remitentes`
--

INSERT INTO `remitentes` (`id`, `nit_remitente`, `empresa_remitente`, `contacto_remitente`, `cedula_remitente`, `telefono_remitente`, `correo_remitente`, `departamento_remitente`, `ciudad_remitente`, `direccion_remitente`, `dep`) VALUES
(1, '78945613', 'Luz S.A.', 'Luz Rios', '456789213', '041675214878', 'Luz@gmail.com', 'Guaviare', 'Calamar', 'calle real tronca 3', 18),
(2, '78945613456', 'END  S.A.', 'Leopardo Rojas', '8512646', '04264472911', 'Lu6@gmail.com', 'Huila', 'La Plata', 'minas de arena #17', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `satelites`
--

CREATE TABLE `satelites` (
  `id` int(15) UNSIGNED NOT NULL,
  `dep` varchar(15) NOT NULL,
  `departamento_sat` varchar(60) NOT NULL,
  `ciudad_sat` varchar(60) NOT NULL,
  `nombre_sat` varchar(60) NOT NULL,
  `direccion_sat` varchar(255) NOT NULL,
  `telefono_sat` varchar(20) NOT NULL,
  `correo_sat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `satelites`
--

INSERT INTO `satelites` (`id`, `dep`, `departamento_sat`, `ciudad_sat`, `nombre_sat`, `direccion_sat`, `telefono_sat`, `correo_sat`) VALUES
(884242514, '5', 'Boyacá', 'Belén', 'Belen-Boyaca', 'calle la flores carrera #5', '04125484725', 'Belenboyaca@gmal.com'),
(1728375427, '3', 'Atlántico', 'Barranquilla', 'Barranquilla TVG', 'minas de arena #17', '04264472911', 'tvgBarranquilla@gmail.com'),
(2409538544, '4', 'Bolívar', 'Cartagena de Indias', 'Cartagena TVG', 'minas de arena #17', '04264472911', 'tvgCartagena@gmail.com'),
(4033716475, '18', 'Magdalena', 'Santa Marta', 'Santa Marta TVG', 'minas de arena #17', '04264472911', 'tvgsantamarta@gmail.com');

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
(6, 789456145, 'Bolívar', 'Arenal', 4, 'Sede cuatro', 'leli', 'minas de arena #17', '04264472911', 'leonardo2718@hotmail.es'),
(8, 789456145, 'Atlántico', 'Barranquilla', 3, 'Tequeño con queso', 'leli', 'minas de arena #17', '04264472911', 'lelianisgranao@gmai.com');

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
(1, '3', 'Activo'),
(2, '5', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soportes_guia`
--

CREATE TABLE `soportes_guia` (
  `id` int(15) NOT NULL,
  `url` varchar(150) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `guia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `soportes_guia`
--

INSERT INTO `soportes_guia` (`id`, `url`, `nombre`, `guia`) VALUES
(3, '/include/guias/descarga1.jpg', 'descarga1.jpg', '165382146');

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
(1, 'Cundinamarca', 'Bogotá', 'Casanare', 'Apulo', 12, 12, ' Aéreo carga', 'Sobre menor a 1000kl', '150000', 'Martes-Jueves-Viernes', 'Express', 'Activo'),
(2, 'Antioquia', 'Abriaquí', 'Atlántico', 'Amagá', 1, 1, ' Aéreo comercial', 'Sobre menor a 900gr', '15000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(3, 'Amazonas', 'Leticia', 'Amazonas', 'Puerto Nariño', 0, 0, ' Aéreo comercial', 'Sobre menor a 900gr', '4000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(4, 'Amazonas', 'Puerto Nariño', 'Amazonas', 'Leticia', 0, 0, ' Aéreo carga', 'Sobre menor a 1000kl', '4000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(5, 'Amazonas', 'Leticia', 'Amazonas', 'Leticia', 0, 0, 'Terrestre', 'Sobre menor a 1000gr', '5000', 'Lunes-Miercoles-Viernes', 'Normal', 'Activo'),
(6, 'Bolívar', 'Achí', 'Atlántico', 'Barranquilla', 4, 3, 'Consolidados', 'Sobre menor a 900gr', '20000', 'Lunes-Miercoles-Viernes', 'Normal', 'Activo'),
(7, 'San Andrés y Providencia', 'Providencia y Santa Catalina Islas', 'Amazonas', 'San Andrés', 25, 25, 'Fluvial', 'Sobre menor a 900gr', '20000', 'Martes-Jueves-Viernes', 'Express', 'Activo'),
(8, 'Chocó', 'Acandí', 'Cesar', 'Alto Baudó', 11, 11, ' Aéreo comercial', 'Sobre menor a 900gr', '6000', 'Lunes-Miercoles-Viernes', 'Express', 'Inactivo'),
(9, 'Caquetá', 'Albania', 'Atlántico', 'Albania', 7, 7, 'Intermodal', 'Sobre menor a 900gr', '9000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(10, 'Caquetá', 'Albania', 'Atlántico', 'El Doncello', 7, 7, 'Intermodal', 'Sobre menor a 900gr', '5000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo'),
(41, 'Cundinamarca', 'Bogotá', 'San Andrés y Providencia', 'San Andrés', 12, 25, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(42, 'Cundinamarca', 'Bogotá', 'Atlántico', 'Barranquilla', 12, 3, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(43, 'Cundinamarca', 'Bogotá', 'Bolívar', 'Cartagena de Indias', 12, 4, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(44, 'Cundinamarca', 'Bogotá', 'Córdoba', 'Montería', 12, 13, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(45, 'Cundinamarca', 'Bogotá', 'Meta', 'Villavicencio', 12, 19, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(46, 'Cundinamarca', 'Bogotá', 'Santander', 'Barrancabermeja', 12, 26, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'LUNES-MIERCOLES-VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(47, 'Cundinamarca', 'Bogotá', 'Santander', 'Bucaramanga', 12, 26, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'LUNES-MIERCOLES-VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(48, 'Cundinamarca', 'Bogotá', 'Valle del Cauca', 'Cali', 12, 29, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(49, 'Cundinamarca', 'Bogotá', 'Norte de Santander', 'Cúcuta', 12, 21, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'LUNES-MIERCOLES-VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(50, 'Cundinamarca', 'Bogotá', 'Antioquia', 'Rionegro', 12, 1, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(51, 'Cundinamarca', 'Bogotá', 'Meta', 'La Uribe', 12, 19, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(52, 'Cundinamarca', 'Bogotá', 'Amazonas', 'Leticia', 12, 0, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'SABADO', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(53, 'Cundinamarca', 'Bogotá', 'Risaralda', 'Pereira', 12, 24, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(54, 'Cundinamarca', 'Bogotá', 'Quindío', 'Armenia', 12, 23, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(55, 'Cundinamarca', 'Bogotá', 'Caldas', 'Manizales', 12, 6, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(56, 'Cundinamarca', 'Bogotá', 'La Guajira', 'Riohacha', 12, 17, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'LUNES-MIERCOLES-VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(57, 'Cundinamarca', 'Bogotá', 'Cesar', 'Valledupar', 12, 10, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo'),
(58, 'Cundinamarca', 'Bogotá', 'Magdalena', 'Santa Marta', 12, 18, ' Aéreo comercial', 'SOBRE DE 0-900 GR NO LICITACION', '12000', 'DE LUNES A VIERNES', 'de 24 A 48 HORAS DESPUES DE LLEGADO EL VUELO A SU DESTINO', 'Activo');

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
(2, 'Sobre menor a 900gr', ' Aéreo comercial'),
(4, 'Sobre menor a 1000kl', ' Aéreo carga'),
(5, 'Sobre menor a 900gr', 'Fluvial'),
(6, 'Sobre menor a 900gr', 'Intermodal'),
(7, 'Sobre menor a 900gr', 'Consolidados'),
(8, 'Sobre menor a 800gr', 'Fluvial');

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
(1, ' Aéreo comercial', ' aéreo comercial\n'),
(2, 'Terrestre', 'este es un texto'),
(3, ' Aéreo carga', ' Aéreo carga'),
(4, 'Consolidados', 'Consolidados'),
(5, 'Fluvial', 'Fluvial'),
(6, 'Intermodal', 'intermodal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad`
--

CREATE TABLE `trazabilidad` (
  `id` int(15) NOT NULL,
  `fecha_despacho` date DEFAULT NULL,
  `id_proveedor` varchar(15) DEFAULT NULL,
  `guia_proveedor` varchar(25) DEFAULT NULL,
  `detalles_carga` longtext DEFAULT NULL,
  `observaciones` longtext DEFAULT NULL,
  `llegada_destino` date DEFAULT NULL,
  `id_satelite` varchar(15) DEFAULT NULL,
  `tipo_reporte` enum('Alistamiento','Salida','Redireccionamiento','Llegada','Entrega') DEFAULT NULL,
  `id_guia` varchar(15) DEFAULT NULL,
  `prefijo` varchar(5) DEFAULT NULL,
  `id_sede` varchar(15) NOT NULL,
  `url_foto` varchar(150) NOT NULL,
  `hora` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trazabilidad`
--

INSERT INTO `trazabilidad` (`id`, `fecha_despacho`, `id_proveedor`, `guia_proveedor`, `detalles_carga`, `observaciones`, `llegada_destino`, `id_satelite`, `tipo_reporte`, `id_guia`, `prefijo`, `id_sede`, `url_foto`, `hora`) VALUES
(17, '2020-09-28', '1', '346592779-34Sf', 'Detalles.', 'Observaciones.', '2020-09-29', '4033716475', 'Alistamiento', '165382146', 'N', '7', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena16.jpg', '09:00'),
(18, '2020-09-29', '2', '346592779-34Sf', 'Detalles.', 'Observaciones.', '2020-09-30', '4033716475', 'Salida', '165382146', 'N', '7', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena9.jpg', '11:00'),
(19, '2020-09-30', '2', '346592779-34Sf', 'Detalles.', 'Observaciones.', '2020-10-01', '1728375427', 'Llegada', '165382146', 'N', '7', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena11.jpg', '23:00'),
(20, '2020-10-01', '2', '346592779-34Sf', 'Detalles.', 'Observaciones.', '2020-10-02', '1728375427', 'Salida', '165382146', 'N', '7', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena12.jpg', '23:00'),
(21, '2020-10-03', '2', '346592779-34Sf', 'Detalles.', 'Observaciones.', '2020-10-04', '2409538544', 'Llegada', '165382146', 'N', '7', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena15.jpg', '23:00'),
(22, '2020-09-29', '1', '346592779-34Sf', 'Detalles.', 'Observaciones.', '2020-09-30', '4033716475', 'Alistamiento', '4118347882', 'E', '1', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena17.jpg', '12:25'),
(23, '2020-09-29', '1', '346592779-34Sf', 'Detalles de salida', 'observaciones', '2020-10-01', '4033716475', 'Salida', '4118347882', 'E', '1', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena18.jpg', '12:25'),
(24, '2020-10-15', '1', '346592779-34Sf', 'tyrt', 'rtyrtyr', '2020-10-15', '2409538544', 'Llegada', '165382146', 'N', '7', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena19.jpg', '12:00'),
(25, '2020-10-01', '1', '346592779-34Sf', 'DETALLES', 'DETALLES', '2020-10-08', '2409538544', 'Redireccionamiento', '165382146', 'N', '7', '/include/img/trazabilidad/59227169-logística-almacenamiento-transporte-la-industria-y-el-concepto-de-fabricación-cajas-de-carga-que-almacena20.jpg', '12:00');

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
  `cargo` varchar(50) NOT NULL,
  `telefono_personal` varchar(15) NOT NULL,
  `telefono_corporativo` varchar(15) NOT NULL,
  `sucursal` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permisos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`permisos`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `verify`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `passwd_verify_code`, `url_foto`, `nombre`, `apellido`, `cedula`, `cargo`, `telefono_personal`, `telefono_corporativo`, `sucursal`, `created_at`, `modified_at`, `permisos`) VALUES
(1268850497, 'Cristiano', 'cr7@gmail.com', 1, '0', 0, '$2y$11$uhVxTsaH581Q3VtH5YdV.e.g8hsA4aXbGroFB85D2aVoE3VgHEu5K', NULL, NULL, NULL, NULL, '$2y$11$LUi1aLY/hjkFUbWQ3Q2VKOXBoz5iqPmk5XxM8JxWb26t6nG7jg.xK', '/include/img/user/873ae59c6165e09fc14291628ba6082f.png', 'Cristiano', 'Ronaldo', '78946123', 'Supervisor', '04264472911', '04264472911', 'TVG Barranquilla', '2020-08-26 16:27:09', '2020-10-03 11:06:44', '{\"cotizaciones\":false,\"planillas\":true,\"guiasNormales\":true,\"guiasEspeciales\":true,\"actasEntrega\":true,\"actasRecogidas\":true,\"documentosGenerados\":true,\"alertas\":true,\"remitentes\":true,\"clientes\":true,\"proveedores\":true,\"trazabilidad\":true}'),
(1567466676, 'Leonardo', 'leonardo@tvg.com', 9, '0', 0, '$2y$11$NqTRHgqBXtZiCwk6yeQ.FO48UM8oKnUJLXQfaYcKz5PsA.GhiZ6Xa', NULL, NULL, NULL, '2020-08-26 17:20:58', '$2y$11$h0uusdq351hfF2LIb0h1H.225bpCHQQaj25xxJQxnoz8OKVeHU.w.', '/include/img/user/873ae59c6165e09fc14291628ba6082f4.png', 'Jose', 'Leonardo', '20328861', 'Supervisor', '7456134', '7456134', 'TVG Santa Marta', '2020-08-26 17:20:33', '2020-10-03 11:01:23', '{\"cotizaciones\":true,\"planillas\":true,\"guiasNormales\":true,\"guiasEspeciales\":true,\"actasEntrega\":true,\"actasRecogidas\":true,\"documentosGenerados\":true,\"alertas\":true,\"remitentes\":true,\"clientes\":true,\"proveedores\":true,\"trazabilidad\":true}'),
(2032761865, 'Cr7', 'leonardo21788@gmail.com', 9, '0', 0, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', NULL, NULL, '2020-08-26 10:28:51', NULL, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', '/include/img/user/asdasdad1.png', 'Jose', 'Leonardo', '10981021', 'Supervisor', '04264472911', '04264472911', 'TVG Barranquilla', '2020-08-26 16:01:27', '2020-10-03 11:01:43', '{\"cotizaciones\":true,\"planillas\":true,\"guiasNormales\":true,\"guiasEspeciales\":true,\"actasEntrega\":true,\"actasRecogidas\":true,\"documentosGenerados\":true,\"alertas\":true,\"remitentes\":true,\"clientes\":true,\"proveedores\":true,\"trazabilidad\":true}'),
(2192184043, 'LuzRios2718', 'Luz@gmail.com', 9, '0', 0, '$2y$11$zO3zdIrbm9YOSTEJgkBw6uLTrNCY.iPahnsUBxl.VNDy94pzeleUS', NULL, NULL, NULL, '2020-08-26 16:47:31', '$2y$11$Aehw7FozAqIaA1EfMViN0Oz/Jm.5BtN8OcFK83s/WElLvuOQD7wf2', '/include/img/user/72429-hospital-ghost-748x417.jpg', 'Luz', 'Rios', '25272381', 'Supervisor', '04264472911', '04264472911', 'TVG Santa Marta', '2020-08-26 16:47:08', '2020-10-03 11:02:01', '{\"cotizaciones\":true,\"planillas\":true,\"guiasNormales\":true,\"guiasEspeciales\":true,\"actasEntrega\":true,\"actasRecogidas\":true,\"documentosGenerados\":true,\"alertas\":true,\"remitentes\":true,\"clientes\":true,\"proveedores\":true,\"trazabilidad\":true}'),
(2520322231, 'Diego', 'diego@gmail.com', 9, '0', 0, '$2y$11$YyIF9OW8OVOMVgGGTgeRYOSgW.ykjjKGMSPoezNlWWKqgFcY3StUK', NULL, NULL, NULL, '2020-08-28 22:18:40', '$2y$11$n2NBHXo0wwsBNj2Cdbugr.9hAGqd2antLVh5h/k5DbUvjcul1uH/6', '/include/img/user/IMG_20191225_184425.jpg', 'Diego', 'Morejon', '123', 'Supervisor', '7456156', '7456134', 'TVG Santa Marta', '2020-08-26 18:44:54', '2020-10-03 11:01:17', '{\"cotizaciones\":true,\"planillas\":true,\"guiasNormales\":true,\"guiasEspeciales\":true,\"actasEntrega\":true,\"actasRecogidas\":true,\"documentosGenerados\":true,\"alertas\":true,\"remitentes\":true,\"clientes\":true,\"proveedores\":true,\"trazabilidad\":true}'),
(2822719046, 'Marina', 'marina@gmail.com', 9, '0', 0, '$2y$11$EVbi/7xHKdNVT8QMTq0GS.QOArGbi1T9G3sN559qbE1kkSkS.4tjK', NULL, NULL, NULL, NULL, '$2y$11$J3bxlg..o9pohVCgiwslXuYiYmS6zZY0Dvr6WcSYIRqDpDz0dlhpG', '/include/img/user/873ae59c6165e09fc14291628ba6082f3.png', 'Luz ', 'Marina', '258369147', 'Supervisor', '04264472911', '04264472911', 'TVG Barranquilla', '2020-08-26 17:10:34', '2020-08-26 15:10:34', ''),
(3581919691, 'leonardo2718', 'leonardo2718@hotmail.es', 9, '0', 0, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', NULL, NULL, NULL, '2020-10-05 03:02:04', '$2y$11$LUi1aLY/hjkFUbWQ3Q2VKOXBoz5iqPmk5XxM8JxWb26t6nG7jg.xK', 'include/img/user/descarga11.jpg', 'Tvg', 'Cargo', '203288614', 'Supervisor', '04264472911', '0426447291', 'TVG Barranquilla', '2020-08-16 01:06:25', '2020-10-05 01:02:04', '{\"cotizaciones\":true,\"planillas\":true,\"guiasNormales\":true,\"guiasEspeciales\":true,\"actasEntrega\":true,\"actasRecogidas\":true,\"documentosGenerados\":true,\"alertas\":true,\"remitentes\":true,\"clientes\":true,\"proveedores\":true,\"trazabilidad\":true,\"facturas\":true}'),
(3887555264, 'Kely', 'kely@gmail.com', 1, '0', 0, '$2y$11$XU6B4dbkOWcD22OsWzn7dOQIM/uLwpptJZaGN8OJB.L9Quz8jB.NK', NULL, NULL, NULL, '2020-10-05 03:30:00', '$2y$11$k1E5e5JpktxtJdJ2SlaMUeZJ/EAYLcgHMdDugEnuPrncG8aKHQk9e', '/include/img/user/descarga12.jpg', 'Kely', 'Jones', '25273381', 'Supervisor', '7456134', '7456134', 'TVG Barranquilla', '2020-10-03 13:09:24', '2020-10-05 04:04:52', '{\"cotizaciones\":true,\"planillas\":true,\"guiasNormales\":true,\"guiasEspeciales\":true,\"actasEntrega\":true,\"actasRecogidas\":true,\"documentosGenerados\":true,\"alertas\":true,\"remitentes\":true,\"clientes\":true,\"proveedores\":true,\"trazabilidad\":true,\"facturas\":true}');

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
-- Indices de la tabla `actas_recogida`
--
ALTER TABLE `actas_recogida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
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
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
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
-- Indices de la tabla `documentos_cotizaciones`
--
ALTER TABLE `documentos_cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos_historial`
--
ALTER TABLE `documentos_historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factores`
--
ALTER TABLE `factores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialcotizaciones`
--
ALTER TABLE `historialcotizaciones`
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
-- Indices de la tabla `liquidaciones`
--
ALTER TABLE `liquidaciones`
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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `remitentes`
--
ALTER TABLE `remitentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `satelites`
--
ALTER TABLE `satelites`
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
-- Indices de la tabla `soportes_guia`
--
ALTER TABLE `soportes_guia`
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
-- Indices de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
-- AUTO_INCREMENT de la tabla `documentos_cotizaciones`
--
ALTER TABLE `documentos_cotizaciones`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `documentos_historial`
--
ALTER TABLE `documentos_historial`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `historialcotizaciones`
--
ALTER TABLE `historialcotizaciones`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `remitentes`
--
ALTER TABLE `remitentes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `segurocarga`
--
ALTER TABLE `segurocarga`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `soportes_guia`
--
ALTER TABLE `soportes_guia`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_ce`
--
ALTER TABLE `historial_ce`
  ADD CONSTRAINT `historial_ce_ibfk_2` FOREIGN KEY (`sede_cliente`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
