-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2020 a las 09:03:41
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
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(15) UNSIGNED NOT NULL,
  `nombre_archivo` varchar(100) NOT NULL,
  `tipo_archivo` varchar(11) NOT NULL,
  `tipo` enum('Cotizacion','Planilla de liquidacion','Factura','Guía') NOT NULL,
  `numero_doc` varchar(15) NOT NULL,
  `codigo_hex` varchar(15) NOT NULL,
  `usuario_responsable` varchar(15) NOT NULL,
  `url` varchar(255) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre_archivo`, `tipo_archivo`, `tipo`, `numero_doc`, `codigo_hex`, `usuario_responsable`, `url`, `creado`) VALUES
(1560743900, 'COT-4256459329', 'PDF', 'Cotizacion', '4256459329', 'fdb46a41', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/fdb46a41/4256459329', '2020-09-15 03:19:47'),
(2155671561, 'COT-2977005845', 'PDF', 'Cotizacion', '2977005845', 'b1718115', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/b1718115/2977005845', '2020-09-15 04:53:47'),
(3084185921, 'COT-1161266891', 'PDF', 'Cotizacion', '1161266891', '453786cb', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/453786cb/1161266891', '2020-09-15 05:31:14'),
(3519413287, 'COT-2979338657', 'PDF', 'Cotizacion', '2979338657', 'b19519a1', '3581919691', 'Cotizaciones/Cotizaciones_to_pdf/b19519a1/2979338657', '2020-09-15 15:13:35');

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
(36, '258147369', 'SEAPEX C.A.', 'Leonardo Rios', 'Jose Rios', 2147483647, '04264472911', 'leonardo27188@gmail.com', 'Magdalena', 'Plato', 18, 'minas de arena #17', 'Activo', '2020-09-08 09:36:54', '0000-00-00', 'Persona jurídica', 4, 2, 3581919691, 'No', '');

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
  `contrato` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`contrato`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `user_id`, `cedula`, `fecha_creacion`, `items`, `codigo`, `status`, `estatus_gestion`, `vnota`, `tiempo`, `notas`, `saludo`, `contrato`) VALUES
(1161266891, 3581919691, '2147483647', '2020-09-15 07:16:59', '[{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"}]', '453786cb', 'Enviado', 'Aprobada', 'Si', '1600147834', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]'),
(2977005845, 3581919691, '2147483647', '2020-09-15 06:44:56', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4900\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'b1718115', 'Borrador', 'Rechazada', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]'),
(2979338657, 3581919691, '2147483647', '2020-09-15 15:25:58', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"2\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/600\",\"variable\":\"600\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'b19519a1', 'Enviado', 'Aprobada', 'Si', '1600181917', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]');

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
(34, '1600181917', '2147483647', '/include/files/Sin_título-127.png', 'Sin_título-127.png');

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
  `contrato` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`contrato`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialcotizaciones`
--

INSERT INTO `historialcotizaciones` (`id`, `id_cotizacion`, `user_id`, `cedula`, `fecha_creacion`, `items`, `status`, `estatus_gestion`, `vnota`, `tiempo`, `notas`, `saludo`, `contrato`) VALUES
(3, 2147483647, 2147483647, '2147483647', '2020-09-15 04:34:30', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]'),
(4, 2147483647, 2147483647, '2147483647', '2020-09-15 05:21:21', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]'),
(5, 2147483647, 2147483647, '2147483647', '2020-09-15 05:28:12', '[{\"id_tarifa\":\"4\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Puerto Nari\\u00f1o\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"tipo_envio\":\"Sobre menor a 1000kl\",\"precio\":\"4000\",\"factor\":\"3\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Metros\",\"formula\":\"VOLUMEN=(AN * AL* LA) *300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4900\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600144402', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"27\",\"numero\":\"Aereo carga\",\"resumen\":\"Nota para transporte a\\u00e9reo carga.\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo carga.\",\"tipo_transporte\":\" A\\u00e9reo carga\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]'),
(6, 2147483647, 2147483647, '2147483647', '2020-09-15 15:09:01', '[{\"id_tarifa\":\"3\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Puerto Nari\\u00f1o\",\"cedula_cliente\":\"\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"tipo_envio\":\"Sobre menor a 900gr\",\"precio\":\"4000\",\"factor\":\"2\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Express\",\"segurocarga\":\"3\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/600\",\"variable\":\"600\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"5000\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"},{\"id_tarifa\":\"5\",\"departamento_destino\":\"Amazonas\",\"departamento_origen\":\"Amazonas\",\"ciudad_origen\":\"Leticia\",\"ciudad_destino\":\"Leticia\",\"cedula_cliente\":\"\",\"tipo_transporte\":\"Terrestre\",\"tipo_envio\":\"Sobre menor a 1000gr\",\"precio\":\"4500\",\"factor\":\"1\",\"itinerarios\":\"Lunes-Miercoles-Viernes\",\"tiempos\":\"Normal\",\"segurocarga\":\"5\",\"costeguia\":\"500\",\"escala\":\"Cent\\u00edmetros\",\"formula\":\"VOLUMEN=(AN * AL* LA) \\/300\",\"variable\":\"300\"}]', 'Borrador', 'Borrador', 'Si', '1600181917', '[{\"id\":\"7\",\"numero\":\"tres\",\"resumen\":\"el que te conte\",\"descripcion\":\"asdasd\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"8\",\"numero\":\"cuatro\",\"resumen\":\"Nota de respaldo para terrestre\",\"descripcion\":\"nota para transporte terrestre\",\"tipo_transporte\":\"Terrestre\",\"estado\":\"Activo\"},{\"id\":\"6\",\"numero\":\"uno\",\"resumen\":\"Nota para transporte a\\u00e9reo comercial\",\"descripcion\":\"Descripci\\u00f3n larga de nota para transporte a\\u00e9reo..\",\"tipo_transporte\":\" A\\u00e9reo comercial\",\"estado\":\"Activo\"}]', '[{\"id\":\"10\",\"numero\":\"Saludo\",\"resumen\":\"Saludo Teniendo en cuenta las necesidades de su Prestigiosa Empresa, de manera comedida y respetuosa nos permitimos presentar a ustedes la propuesta referente al servicio de transporte a\\u00e9reo de QUIMICOS a diferentes destinos nacionales. \",\"descripcion\":\"Contamos con 20 a\\u00f1os de experiencia  en las modalidades de Transporte A\\u00e9reo, Transporte Terrestre, Transporte Mar\\u00edtimo y Transporte Fluvial, Internacional y a nivel Nacional siendo especialistas en los departamentos de Guaviare, Putumayo, Arauca, Guain\\u00eda, Vichada, Vaup\\u00e9s, Amazonas y San Andr\\u00e9s (Entregas en las capitales y sitios rurales en cada departamento), ya que en estos territorios realizamos las entregas de v\\u00edveres de entidades como Las Fuerzas Militares, Computadores para Educar,  Desayunos y Bienestarina del  ICBF entre otros,  en todas las modalidades garantizamos a nuestros clientes seguridad y cumplimiento en sus env\\u00edos, cualquier inquietud con gusto ser\\u00e1 atendida y resuelta.   \\nAgradecemos la confianza que han depositado en Nuestra Compa\\u00f1\\u00eda. Basados en su solicitud dejamos en consideraci\\u00f3n la siguiente propuesta: \",\"tipo_transporte\":\"Saludo\",\"estado\":\"Activo\"}]', '[{\"id\":\"11\",\"numero\":\"Saludo\",\"resumen\":\"CARGUE Y DESCARGUE\",\"descripcion\":\" La tarifa incluye cargue y descargue siempre y cuando se pueda hacer a fuerza hombre, el cargue y descargue se realizar\\u00e1 en el primer piso.  Si se requiere con montacargas el cliente debe tener el equipo en el origen y en el destino para realizar las maniobras\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"12\",\"numero\":\"Dos\",\"resumen\":\"TIEMPOS DE ENTREGA\",\"descripcion\":\"- AEREO: El siguiente d\\u00eda h\\u00e1bil al d\\u00eda de vuelo, en condiciones normales.  \\n- INTERMODAL: De 10 a 12 d\\u00edas al zarpe de la embarcaci\\u00f3n, en condiciones normales. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"13\",\"numero\":\"SEGURO\",\"resumen\":\"SEGURO\",\"descripcion\":\"Contamos con una p\\u00f3liza de seguros para sus env\\u00edos.  El Valor del Seguro es del 2% del Valor Declarado la tarifa m\\u00ednima a asegurar es de 250.000, la aseguradora, solo cubre p\\u00e9rdida total de la carga NO parcial que esta se encuentre en tr\\u00e1nsito. TVG CARGO S.AS, se ampara a los cubrimientos de la aseguradora Seguros del Estado con la p\\u00f3liza 33-14-101001150, quedando exenta de cualquier reclamaci\\u00f3n que se presentara si la aseguradora no cubre el siniestro. Si su Empresa cuenta con seguro pueden asegurar la mercanc\\u00eda por su aseguradora y TVG CARGO S.AS., no se hace responsable de cualquier siniestro que se llegase a presentar ya que Uds., deben reportarlo a su aseguradora. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"14\",\"numero\":\"RESERVACION DE \",\"resumen\":\"RESERVACION DE CUPOS\",\"descripcion\":\"La reservaci\\u00f3n u orden de servicio debe ser confirmada con un tiempo prudencial (dos d\\u00edas antes) para coordinar la log\\u00edstica de la operaci\\u00f3n respectiva.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"15\",\"numero\":\"CONDICIONES\",\"resumen\":\"CONDICIONES\",\"descripcion\":\"Los costos anteriormente descritos est\\u00e1n sujetos a las variaciones de combustible y\\/o d\\u00f3lar. Los precios aplican recibiendo la mercanc\\u00eda en la ciudad ORIGEN de la propuesta Comercial.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"16\",\"numero\":\"CORTE DE GUIA\",\"resumen\":\"CORTE DE GUIA\",\"descripcion\":\"El valor del Corte de la gu\\u00eda y la facturaci\\u00f3n es de $6.000.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"17\",\"numero\":\"DOCUMENTACION\",\"resumen\":\"DOCUMENTACION\",\"descripcion\":\"Se deben anexar todos los documentos y permisos necesarios para el transporte de la mercanc\\u00eda, (Permiso  para perecederos, Veh\\u00edculos-Maquinas: Tarjeta de Propiedad, seguro obligatorio, llaves, Facturas-Fichas T\\u00e9cnicas, manifiesto de la DIAN si  es importada la carga).  Todos los que tenga de la mercanc\\u00eda para que las autoridades verifiquen la informaci\\u00f3n. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"18\",\"numero\":\"FORMA DE PAGO\",\"resumen\":\"FORMA DE PAGO\",\"descripcion\":\"Contado o a Negociar .\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"19\",\"numero\":\"Clausula Penal\",\"resumen\":\"Clausula Penal\",\"descripcion\":\" El remitente al entregar la carga a transportar o dar orden de recogida de la carga a nuestra Empresa, aceptan los t\\u00e9rminos y condiciones de la cotizaci\\u00f3n (COEN), si por alguna raz\\u00f3n despu\\u00e9s de tener la carga en nuestras instalaciones, paletizada o en verificaci\\u00f3n de narc\\u00f3ticos, el cliente o remitente pide no hacer el despacho, no se realiza el despacho pero el cliente o remitente debe asumir el 50% del valor del flete m\\u00e1s el 100% del valor a pagar de seguro, por da\\u00f1os y perjuicios coaccionados a nuestra  empresa, la carga ser\\u00e1 retenida hasta que se genere el pago a TVG CARGO SAS., de lo anteriormente mencionado y solo ser\\u00e1 devuelta cuando se refleje el valor cancelado.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"20\",\"numero\":\"RESPONSABILIDAD\",\"resumen\":\"RESPONSABILIDADES\",\"descripcion\":\"TVG CARGO  S.A.S no se hace responsable de detenciones o decomiso de la mercanc\\u00eda si Uds., NO adjuntan los documentos necesarios para los env\\u00edos; los sobrecostos que esto acarree ser\\u00e1n asumidos por su Empresa.\",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"21\",\"numero\":\"__\",\"resumen\":\"__\",\"descripcion\":\"LA ASEGURADORA (SEGUROS DEL ESTADO) Y TVG CARGO SAS NO SE HACE RESPONSABLE POR DA\\u00d1OS EN LA MERCANC\\u00cdA QUE NO ESTE ADECUADAMENTE EMBALADA, NO SE RESPONDE POR VIDRIOS, M\\u00c1RMOL, TELEVISORES (ELECTRODOM\\u00c9STICOS), SANITARIOS, ARCILLA, PORCELANAS, BALDOSAS Y NINGUNO DE SUS DERIVADOS DE LOS ANTERIORES ART\\u00cdCULOS, ANIMALES VIVOS Y DEM\\u00c1S ART\\u00cdCULOS QUE INDIQUE LA ASEGURADORA QUE NO TIENE COBERTURA  Y VIAJAN BAJO RESPONSABILIDAD DEL PROPIETARIO, REMITENTE Y\\/O DESTINATARIO \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"22\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S NI LA POLIZA\",\"descripcion\":\" se hace responsable del contenido ni cantidades de la mercanc\\u00eda a    transportar, se recibe embalado y sellado sin verificar contenido ni cantidades. \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"},{\"id\":\"23\",\"numero\":\"TVG CARGO  S.A.\",\"resumen\":\"TVG CARGO  S.A.S  NI LA POLIZA\",\"descripcion\":\" se hace responsable del embalaje en las inspecciones que realicen las autoridades competentes y aduaneras ya que cuando verifican el contenido de la mercanc\\u00eda tienden a da\\u00f1ar el empaque en que esta viaja.  \",\"tipo_transporte\":\"Contrato\",\"estado\":\"Activo\"}]');

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
(4, 4118347882, 789456145, '2020-09-05', '2020-09-11', '20328861', 'Caja', '15', '60', '600', '350000', '3150000000', '2020-09-04', 1, '1560000789', '2020-09-04', 1, '2020-09-19', '15987657954', '2020-09-04', '5465789', '56464546', '25-08-2020', 3),
(5, 2286577589, 456456464, '2020-09-04', '2020-09-11', '20328861', 'Caja', '15', '60', '600', '350000', '3150000000', '2020-09-19', 1, '1560000789', '2020-09-17', 2, '2020-09-25', '755467', '2020-09-25', '6656576', '35498989', '4987499948', 3),
(6, 2105523902, 456456464, '2020-09-04', '2020-09-04', '20328861', 'Caja', '2', '20', '100', '50000', '10000000', '2020-09-24', 1, '1560000789', '2020-09-10', 2, '2020-09-24', '87565464', '2020-09-24', '5646567', '4564646', '4579464', 3),
(7, 1332210380, 456456464, '2020-09-03', '2020-09-26', '38945687', 'Caja', '15', '60', '600', '350000', '3150000000', '2020-09-23', 1, '456797987', '2020-09-10', 2, '2020-09-25', '7879879', '2020-09-23', '5646567', '5612344', '4987499948', 3);

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
(206, 'leoanardo2718', '127.0.0.1', '2020-09-15 16:44:26'),
(205, 'leoanrdo2718', '127.0.0.1', '2020-09-15 16:44:15');

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
(7, 'tres', 'el que te conte', 'asdasd', 'Terrestre', 'Activo'),
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
(27, 'Aereo carga', 'Nota para transporte aéreo carga.', 'Descripción larga de nota para transporte aéreo carga.', ' Aéreo carga', 'Activo');

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
(1, '3', 'Activo'),
(2, '5', 'Activo');

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
(10, 'Caquetá', 'Albania', 'Atlántico', 'El Doncello', 7, 7, 'Intermodal', 'Sobre menor a 900gr', '5000', 'Lunes-Miercoles-Viernes', 'Express', 'Activo');

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
(3581919691, 'leonardo2718', 'leonardo2718@hotmail.es', 9, '0', 0, '$2y$11$jBiNpGCqGOoPRCBws90Ih.ApWPKQeN1S/rk12.R7baSpE4jqdsS7u', NULL, NULL, NULL, '2020-09-18 04:38:50', '$2y$11$LUi1aLY/hjkFUbWQ3Q2VKOXBoz5iqPmk5XxM8JxWb26t6nG7jg.xK', '', 'Tvg', 'Cargo', '203288614', 'Jefe Administrativa y Logística', '', '', '', '2020-08-16 01:06:25', '2020-09-18 02:38:50');

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
