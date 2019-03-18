-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2019 a las 20:57:47
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `admin_status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Esaú Murillo', 'esaujose7', 0, 'esaujose7@gmail.com', NULL, '$2y$10$cVTE84IevtFcIOPnyq8h/uednXJku3ebiBslOLtWAqktFl.NlcBGi', NULL, NULL, NULL),
(2, 'Pablo Cabañuz', 'pablo', 1, 'pcabanuz@osole.es', NULL, '$2y$10$7NE5Ef1VqfoBYtVvyI1OJOz8SLLbKfg2PEI9GeFOkVjRb1Ldw8Bmm', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidads`
--

CREATE TABLE `calidads` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_es` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calidads`
--

INSERT INTO `calidads` (`id`, `file_image`, `nombre_es`, `nombre_en`, `pdf`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'calidad__descarga.jpg', 'prueba', 'quality', 'calidad__abac-logo.png', 'aa', '2019-03-18 22:25:43', '2019-03-18 22:44:33'),
(5, '0', NULL, NULL, '0', NULL, '2019-03-18 22:44:12', '2019-03-18 22:44:12'),
(6, '0', NULL, NULL, '0', NULL, '2019-03-18 22:44:15', '2019-03-18 22:44:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_es` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `title_es`, `title_en`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Actualidad', 'Current News', 'AA', '2019-03-01 10:38:14', '2019-03-07 22:13:36'),
(2, 'Empresa', 'Company', 'bb', '2019-03-07 22:14:12', '2019-03-07 22:14:12'),
(3, 'Productos', 'Products', 'cc', '2019-03-07 22:15:31', '2019-03-07 22:15:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `subtitle_es` text COLLATE utf8mb4_unicode_ci,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `title_en` text COLLATE utf8mb4_unicode_ci,
  `subtitle_en` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `ficha` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `ruta` text COLLATE utf8mb4_unicode_ci,
  `eliminable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `image`, `title_es`, `subtitle_es`, `text_es`, `title_en`, `subtitle_en`, `text_en`, `ficha`, `section`, `type`, `order`, `icon`, `ruta`, `eliminable`, `created_at`, `updated_at`) VALUES
(1, 'contenido__abac-logo.png', 'ABAC Logo', NULL, NULL, 'ABAC Logo', NULL, NULL, NULL, 'logo', 'imagen', 'AA', NULL, NULL, 0, '2019-02-26 18:15:34', '2019-02-26 18:15:34'),
(2, 'contenido__favicon_abac.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'BB', NULL, NULL, 0, '2019-02-26 18:40:37', '2019-02-26 20:40:15'),
(3, 'contenido__empresa.jpg', 'Nuestra Empresa', NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">ABAC es una empresa argentina fundada en 1979. Contamos con m&aacute;s de 39 a&ntilde;os de experiencia en el dise&ntilde;o, fabricaci&oacute;n y comercializaci&oacute;n de v&aacute;lvulas, manifolds para instrumentos, conectores y otros accesorios para instrumentaci&oacute;n industrial y control de flu&iacute;dos.</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:18px\">PLANTA INDUSTRIAL</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:18px\">Desarrollamos nuestra actividad en dos plantas industriales totalmente integradas. Est&aacute;n ubicadas en la zona Oeste del Gran Buenos Aires. En ellas se aplican m&eacute;todos de producci&oacute;n modernos y flexibles para responder adecuadamente a las necesidades y requisitos de los clientes.</span></span></p>', NULL, NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">ABAC is an Argentine company founded in 1979. We have over 39 years of experience in the design, manufacture and marketing of valves, manifolds for instruments, connectors and other accessories for industrial instrumentation and fluid control.</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:18px\">INDUSTRIAL PLANT</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:18px\">We develop our activity in two fully integrated industrial plants. They are located in the western area of Greater Buenos Aires. They apply modern and flexible production methods to respond adequately to the needs and requirements of customers.</span></span></p>', NULL, 'empresa', 'texto', 'AA', NULL, NULL, 0, '2019-02-27 15:37:42', '2019-03-07 22:43:03'),
(4, NULL, 'Mercados', NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">ABAC provee principalmente a las industrias de procesos, como petroqu&iacute;micas, refinaci&oacute;n, producci&oacute;n y transporte de petr&oacute;leo y gas, GNC, generaci&oacute;n de energ&iacute;a, siderurgia, celulosa y papel.</span></span></p>', NULL, NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">ABAC mainly provides process industries, such as petrochemicals, refining, production and transportation of oil and gas, CNG, power generation, steel, pulp and paper.</span></span></p>', NULL, 'empresa', 'texto', 'BB', NULL, NULL, 0, '2019-02-27 15:37:54', '2019-03-07 22:48:07'),
(5, NULL, 'Calidad', NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">En ABAC contamos con un sistema de gesti&oacute;n de calidad certificado por DNV seg&uacute;n normas ISO 9001:2008</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:18px\">Son fortalezas de nuestro sistema: Dise&ntilde;o y validaci&oacute;n de prototipos. Prueba final 100% en v&aacute;lvulas y manifoldsTotal trazabilidad de las materias primas y lotes de producci&oacute;nConectores cumplen Norma ASTM F1387</span></span></p>', NULL, NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">At ABAC we have a quality management system certified by DNV according to ISO 9001: 2008 standards</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:18px\">The strengths of our system are: Design and validation of prototypes. 100% final test on valves and manifoldsTotal traceability of raw materials and production batchesConnectors comply with ASTM F1387 Standard</span></span></p>', NULL, 'empresa', 'texto', 'CC', NULL, NULL, 0, '2019-02-27 15:38:43', '2019-03-07 22:48:22'),
(6, NULL, 'Visión', NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">ABAC S.R.L. aspira al liderazgo en el mercado local y regional de las industrias de procesos. Alcanzando un nivel competitivo con los fabricantes de productos afines de todo el mundo. ABAC S.R.L. se ha fijado como metas principales, alcanzar una gesti&oacute;n moderna, basada en la direcci&oacute;n por objetivos, fabricar productos de alto valor agregado e incrementar su actividad de Ingenier&iacute;a y Desarrollo, para acompa&ntilde;ar la evoluci&oacute;n tecnol&oacute;gica del mercado al que atiende.</span></span></p>', NULL, NULL, '<p><span style=\"color:#999999\"><span style=\"font-size:18px\">ABAC S.R.L. aspires to leadership in the local and regional market of process industries. Reaching a competitive level with manufacturers of related products from around the world. ABAC S.R.L. has set as its main goals, to achieve a modern management, based on management by objectives, to manufacture products with high added value and to increase its Engineering and Development activity, to accompany the technological evolution of the market it serves.</span></span></p>', NULL, 'empresa', 'texto', 'DD', NULL, NULL, 0, '2019-02-27 15:38:52', '2019-03-07 22:48:43'),
(7, 'contenido__agua.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_mercados', 'imagen', 'AA', NULL, NULL, 0, '2019-02-27 15:39:05', '2019-02-27 15:49:22'),
(8, 'contenido__lab-stuff.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_mercados', 'imagen', 'BB', NULL, NULL, 0, '2019-02-27 15:39:11', '2019-02-27 15:49:35'),
(9, 'contenido__mechonics.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_mercados', 'imagen', 'CC', NULL, NULL, 0, '2019-02-27 15:39:15', '2019-02-27 15:49:41'),
(10, 'contenido__metalurgia.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_mercados', 'imagen', 'DD', NULL, NULL, 0, '2019-02-27 15:39:18', '2019-02-27 15:49:46'),
(11, 'contenido__descargas-logo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'descargas', 'imagen', 'AA', NULL, NULL, 1, '2019-02-27 17:07:32', '2019-02-27 17:07:32'),
(12, 'contenido__descargasasas.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'descargas', 'imagen', 'BB', NULL, NULL, 1, '2019-02-27 17:07:56', '2019-02-27 17:07:56'),
(13, 'contenido__descargas_otrologo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'descargas', 'imagen', 'CC', NULL, NULL, 1, '2019-02-27 17:08:03', '2019-02-27 17:08:03'),
(14, 'contenido__maximator.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'descargas', 'imagen', 'DD', NULL, NULL, 1, '2019-02-27 17:08:15', '2019-02-27 17:08:15'),
(15, 'contenido__descarga.jpg', 'Catálogo Válvulas Manuales', NULL, NULL, 'Catálogo Válvulas Manuales English', NULL, NULL, 'contenido__descarga.jpg', 'descargas_catalogos', 'descargable', 'AA', NULL, NULL, 1, '2019-02-27 18:23:06', '2019-02-27 18:23:06'),
(16, 'contenido__descarga.jpg', 'Instalación Manifolds 358002', NULL, NULL, 'Instalación Manifolds 358002 English', NULL, NULL, 'contenido__descarga.jpg', 'descargas_mm', 'descargable', 'AA', NULL, NULL, 1, '2019-02-27 18:23:42', '2019-02-27 18:23:42'),
(17, 'contenido__queloquee_valeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'calidad', 'imagen', 'AA', NULL, NULL, 1, '2019-02-27 21:17:28', '2019-02-27 21:17:28'),
(18, 'contenido__bureau.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'calidad', 'imagen', 'BB', NULL, NULL, 1, '2019-02-27 21:32:53', '2019-02-27 21:32:53'),
(19, 'contenido__dmv.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'calidad', 'imagen', 'CC', NULL, NULL, 1, '2019-02-27 21:32:59', '2019-02-27 21:32:59'),
(20, NULL, 'Certificado de calidad en cada etapa del proceso: diseño, desarrollo, fabricación y comercialización', NULL, '<p><span style=\"font-size:16px\">ABAC cuenta con un sistema de Gesti&oacute;n de Calidad certificado por DNV seg&uacute;n norma ISO 9001:2008. Los conectores ABALOK cumplen con la norma ASTM F1387-Standard Specification for Performance of piping and tubing mechanically attached fittings.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Dedicados al desarrollo, fabricaci&oacute;n y comercializaci&oacute;n de componentes para control de fluidos, contamos con una trayectoria de m&aacute;s de 39 a&ntilde;os en el rubro. &nbsp;Mantenemos un nivel de calidad internacional, adoptando las normas y est&aacute;ndares internacionales de normalizaci&oacute;n en cada etapa del proceso, desde el dise&ntilde;o y desarrollo, hasta la fabricaci&oacute;n y producci&oacute;n.&nbsp;</span></p>', 'Quality certificate at each stage of the process: design, development, manufacturing and marketing', NULL, '<p><span style=\"font-size:16px\">ABAC has a Quality Management system certified by DNV according to ISO 9001: 2008. The ABALOK connectors comply with ASTM F1387 Standard-Standard Specification for Performance of piping and tubing mechanically attached fittings.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Dedicated to the development, manufacture and commercialization of components for fluid control, we have a trajectory of more than 39 years in the field. We maintain a level of international quality, adopting international standardization norms and standards at every stage of the process, from design and development, to manufacturing and production.</span></p>', NULL, 'calidad', 'texto', NULL, NULL, NULL, 1, '2019-02-27 21:33:28', '2019-03-08 15:01:06'),
(21, NULL, 'CERTIFICADO ABALOKAT 0167-13', NULL, NULL, 'CERTIFICATE ABALOKAT 0167-13', NULL, NULL, 'contenido__CERTIFICADO-ABALOKAT-0167-13 ASTM.pdf', 'calidad', 'descargable', 'aa', NULL, NULL, 1, '2019-02-27 22:04:11', '2019-03-08 15:04:50'),
(22, NULL, 'ABALOK certifica ASTM 1387-99', NULL, 'Los conectores a doble virola ABALOK de ABAC SRL están ahora certificados según la norma ASTM F1387 -99 ( 2005 ).', 'ABALOK certifies ASTM 1387-99', NULL, 'The ABALOK double ferrule connectors from ABAC SRL are now certified according to ASTM F1387 -99 (2005).', NULL, 'videos', 'video', 'AA', NULL, 'cPLyx_lVed8', 1, '2019-02-28 04:53:44', '2019-03-08 14:51:04'),
(23, NULL, 'EXPERIENCIA LÍDER EN EL RUBRO', '39 AÑOS DE TRAYECTORIA', '<p><span style=\"font-size:18px\">ABAC es una empresa argentina fundada en 1979. Contamos con m&aacute;s de 39 a&ntilde;os de experiencia y trayectoria en el rubro del dise&ntilde;o, fabricaci&oacute;n y comercializaci&oacute;n de v&aacute;lvulas, manifolds para instrumentos, conectores y otros accesorios para instrumentaci&oacute;n industrial y control de flu&iacute;dos.</span></p>', NULL, NULL, '<p><span style=\"font-size:18px\">ABAC is an Argentine company founded in 1979. We have over 39 years of experience and experience in the design, manufacture and marketing of valves, manifolds for instruments, connectors and other accessories for industrial instrumentation and fluid control.</span></p>', NULL, 'home', 'texto', NULL, NULL, NULL, 1, '2019-02-28 15:13:47', '2019-03-08 14:56:03'),
(24, 'contenido__maximatorrr.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'EE', NULL, NULL, 1, '2019-02-28 15:19:46', '2019-02-28 15:22:49'),
(25, 'contenido__capipe.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'FF', NULL, NULL, 1, '2019-02-28 15:19:52', '2019-02-28 15:23:03'),
(26, 'contenido__abalok.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'CC', NULL, NULL, 1, '2019-02-28 15:19:57', '2019-02-28 15:26:11'),
(27, 'contenido__somefooter.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'DD', NULL, NULL, 1, '2019-02-28 15:20:11', '2019-02-28 15:22:41'),
(28, 'contenido__iso-algo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'GG', NULL, NULL, 1, '2019-02-28 15:23:36', '2019-02-28 15:23:54'),
(29, 'contenido__dmv.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'HH', NULL, NULL, 1, '2019-02-28 15:32:04', '2019-02-28 16:24:20'),
(30, 'contenido__bureau.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo', 'imagen', 'JJ', NULL, NULL, 1, '2019-02-28 15:32:22', '2019-02-28 15:32:22'),
(31, NULL, 'Tronador 374, B1706BAB Haedo, Bs. As. Argentina', NULL, NULL, 'Tronador 374, B1706BAB Haedo, Bs. As. Argentina', NULL, NULL, NULL, 'datos', 'texto', 'AA', 'location_on', 'https://goo.gl/maps/TwVv5ntQyTn', 1, '2019-02-28 15:36:23', '2019-03-01 22:17:33'),
(32, NULL, '(54 11) 4659-4146/4460-0052', NULL, NULL, '(54 11) 4659-4146/4460-0052', NULL, NULL, NULL, 'datos', 'texto', 'BB', 'phone_in_talk', 'tel:+5491146594146', 1, '2019-02-28 15:36:38', '2019-03-01 22:18:01'),
(33, NULL, 'ventas@abac.com.ar', NULL, NULL, NULL, NULL, NULL, NULL, 'datos', 'texto', 'CC', 'email', 'mailto:ventas@abac.com.ar', 1, '2019-02-28 15:36:47', '2019-03-01 22:18:21'),
(34, 'contenido__productosss.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'productos', 'imagen', 'AA', NULL, NULL, 0, '2019-02-28 16:16:26', '2019-02-28 16:16:26'),
(35, 'contenido__herramientas-left.jpg', 'Cálculo de CV', NULL, '<p><span style=\"color:#ffffff\">Presentamos una herramienta interactiva Exclusiva de Abac. Ingrese los par&aacute;metros determinados y calcula el CV.</span></p>', 'Calculate the CV', NULL, '<p><span style=\"color:#ffffff\">We present you an interactive exclusive tool from Abac. Enter the adequate parameters and calculate the CV.</span></p>', NULL, 'herramientas', 'texto', 'AA', NULL, 'calculadora_cv', 1, '2019-03-06 15:51:57', '2019-03-08 15:02:48'),
(36, 'contenido__herramientas-right.jpg', 'Doblador de Tubos', NULL, '<p><span style=\"color:#ffffff\">Desarrollamos una herramienta interactiva que te permite calcular las medidas para doblar tubos. Para utilizar esta herramienta se requiere iniciar sesi&oacute;n.</span></p>', 'Tube Bender', NULL, '<p><span style=\"color:#ffffff\">We developed an interactive tool that allows you to calculate the measurements to bend tubes. To utilize this tool you need to be logged in.</span></p>', NULL, 'herramientas', 'texto', 'BB', NULL, 'doblador_tubos', 1, '2019-03-06 15:55:21', '2019-03-08 15:03:09'),
(37, NULL, 'Google Maps', NULL, NULL, NULL, NULL, NULL, NULL, 'contacto', 'texto', 'AA', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52528.34656248367!2d-58.55086945978167!3d-34.628892918722144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc793ddb10f6b%3A0xf1f0d377985de7d!2sTronador+374%2C+B1706+Haedo%2C+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1551960280474\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 1, '2019-03-07 15:05:08', '2019-03-07 15:07:49'),
(38, 'contenido__contacto-personalizado-1.jpg', 'Luis Luque', 'VENTAS', '<p>Interno 114</p>\r\n\r\n<p>ventas@abac.com.ar</p>\r\n\r\n<p>lluque@abac.com.ar</p>', 'Luis Luque', 'SALES', '<p>Intern114</p>\r\n\r\n<p>ventas@abac.com.ar</p>\r\n\r\n<p>lluque@abac.com.ar</p>', NULL, 'contacto_personalizado', 'texto', 'AA', NULL, NULL, 1, '2019-03-07 20:54:36', '2019-03-07 20:54:54'),
(39, 'contenido__aspro.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'aa', NULL, NULL, 1, '2019-03-07 23:01:06', '2019-03-07 23:01:06'),
(40, 'contenido__esso.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'bb', NULL, NULL, 1, '2019-03-07 23:01:56', '2019-03-07 23:01:56'),
(41, 'contenido__honeywell.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'cc', NULL, NULL, 1, '2019-03-07 23:02:03', '2019-03-07 23:02:03'),
(42, 'contenido__inversys.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'dd', NULL, NULL, 1, '2019-03-07 23:02:11', '2019-03-07 23:02:11'),
(43, 'contenido__pan_american.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'ee', NULL, NULL, 1, '2019-03-07 23:02:19', '2019-03-07 23:02:19'),
(44, 'contenido__petrobras.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'ff', NULL, NULL, 1, '2019-03-07 23:02:27', '2019-03-07 23:02:27'),
(45, 'contenido__shell.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'gg', NULL, NULL, 1, '2019-03-07 23:02:34', '2019-03-07 23:02:34'),
(46, 'contenido__total.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'hh', NULL, NULL, 1, '2019-03-07 23:02:41', '2019-03-07 23:02:41'),
(47, 'contenido__ypf.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empresa_clientes', 'imagen', 'ii', NULL, NULL, 1, '2019-03-07 23:02:48', '2019-03-07 23:02:48'),
(48, NULL, 'ABALOK', NULL, 'Las uniones para tubos ABALOK son del tipo doble virola.  Una virola frontal y una trasera o contra virola.', 'ABALOK', NULL, 'The unions for ABALOK tubes are of the double ferrule type. A front and a rear ferrule or against ferrule.', NULL, 'videos', 'video', 'bb', NULL, 'uQUjjIDbnJE', 1, '2019-03-08 14:53:08', '2019-03-08 14:53:08'),
(49, NULL, 'Certificado ISO-9001:2008', NULL, NULL, 'Certificate ISO-9001:2008', NULL, NULL, 'contenido__Certificado-ISO-9001-2008 DNV.pdf', 'calidad', 'descargable', 'bb', NULL, NULL, 1, '2019-03-08 15:06:02', '2019-03-08 15:06:02'),
(50, 'contenido__distribuidores.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'distribuidores', 'imagen', 'AA', NULL, NULL, 1, '2019-03-08 15:39:04', '2019-03-08 15:40:05'),
(52, NULL, 'ABAC CASA CENTRAL', 'arg', '<p>Tronador 374 (B1706BAB) Haedo Tel: +54 (011) 4659-4146 Fax: +54 (011) 4460-0052 abac@abac.com.ar www.abac.com.ar</p>', 'ABAC HEADQUARTERS', NULL, '<p>Tronador 374 (B1706BAB) Haedo Tel: +54 (011) 4659-4146 Fax: +54 (011) 4460-0052 abac@abac.com.ar www.abac.com.ar</p>', NULL, 'distribuidores', 'texto', 'AA', NULL, NULL, 1, '2019-03-08 16:25:25', '2019-03-08 16:25:25'),
(53, NULL, 'ABAC CASA CENTRAL WORLD', 'ww', '<p>Tronador 374 (B1706BAB) Haedo Tel: +54 (011) 4659-4146 Fax: +54 (011) 4460-0052 abac@abac.com.ar www.abac.com.ar</p>', 'ABAC WORLD HEADQUARTERS', NULL, '<p>Tronador 374 (B1706BAB) Haedo Tel: +54 (011) 4659-4146 Fax: +54 (011) 4460-0052 abac@abac.com.ar www.abac.com.ar</p>', NULL, 'distribuidores', 'texto', 'AA', NULL, NULL, 1, '2019-03-08 16:26:01', '2019-03-08 16:26:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `csvs`
--

CREATE TABLE `csvs` (
  `id` int(10) UNSIGNED NOT NULL,
  `partida` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `csvs`
--

INSERT INTO `csvs` (`id`, `partida`, `materia`, `articulo`, `descripcion`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'partida', 'materia prima', 'articulo', 'descripcion', NULL, '2019-03-14 22:19:43', '2019-03-14 22:19:43'),
(2, '76110', 'w4550', '123456', 'descripcion del 1', NULL, '2019-03-14 22:19:43', '2019-03-14 22:19:43'),
(3, '76120', 'w4560', '123457', 'descripcion del 2', NULL, '2019-03-14 22:19:43', '2019-03-14 22:19:43'),
(4, '76130', 'w4570', '123458', 'descripcion del 3', NULL, '2019-03-14 22:19:43', '2019-03-14 22:19:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE `descargas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_es` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distribuidor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `descargas`
--

INSERT INTO `descargas` (`id`, `nombre_es`, `nombre_en`, `distribuidor`, `file`, `file_image`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'prueba', 'prueba', 'Exclusivo', 'descarga__abalok.png', 'descarga__descarga.jpg', 'aa', '2019-03-18 17:51:50', '2019-03-18 18:52:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_es` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `image`, `title_es`, `title_en`, `order`, `created_at`, `updated_at`) VALUES
(3, 'familias__familia.jpg', 'Válvulas Manuales', 'Manual Vowels (?)', 'AA', '2019-02-28 16:41:38', '2019-02-28 16:41:38'),
(4, 'familias__a-Manifolds.png', 'Manifolds', 'Manifolds', 'bb', '2019-03-07 23:12:33', '2019-03-07 23:12:33'),
(5, 'familias__b-Control_de_Fluidos.png', 'Control de Fluidos', 'Fluid Control', 'cc', '2019-03-07 23:13:23', '2019-03-07 23:13:23'),
(6, 'familias__c-Conexiones_y_Tubos.png', 'Conexiones y Tubos', 'Connections and Tubes', 'dd', '2019-03-07 23:13:51', '2019-03-07 23:13:51'),
(7, 'familias__d-Válvulas_Esféricas.png', 'Válvulas Esféricas', 'Spherical Valves', 'ee', '2019-03-07 23:14:19', '2019-03-07 23:14:19'),
(8, 'familias__e-Sistemas_de_Aislación.png', 'Sistemas de Aislación', 'Isolation Systems', 'ff', '2019-03-07 23:14:48', '2019-03-07 23:14:48'),
(9, 'familias__f-Línea_Alta_Presión.png', 'Línea Alta Presión', 'High Pressure Line', 'gg', '2019-03-07 23:15:12', '2019-03-07 23:15:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_15_122029_create_admins_table', 1),
(4, '2019_02_18_140424_create_sliders_table', 1),
(5, '2019_02_19_183732_create_contenidos_table', 1),
(6, '2019_02_26_224400_create_familias_table', 2),
(7, '2019_02_26_224411_create_productos_table', 2),
(8, '2019_02_27_050601_create_categorias_table', 2),
(9, '2019_02_27_050607_create_novedades_table', 2),
(10, '2019_02_27_050608_alter_novedades_table', 3),
(11, '2019_02_27_224411_alter_productos_table', 4),
(13, '2019_03_14_191412_create_csvs_table', 6),
(14, '2019_03_15_010119_create_tablas_table', 7),
(17, '2019_03_18_140249_add__descarga_user_to_users_table', 8),
(19, '2019_03_16_204725_create_calidads_table', 9),
(20, '2019_03_18_125720_create_descargas_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_es` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_es` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT '0',
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`id`, `image`, `title_es`, `title_en`, `text_es`, `text_en`, `destacado`, `order`, `categoria_id`, `created_at`, `updated_at`) VALUES
(2, 'novedades__a.png', 'Exposición AOG 2017', 'AOG Exhibition 2017', '<p>Del 25 al 28 de septiembre, tuvo lugar en el predio La Rural esta importante muestra.</p>\r\n\r\n<p>En la muestra, ABAC se present&oacute; junto a su representada MAXIMATOR GmbH, mostrando toda la l&iacute;nea de v&aacute;lvulas y accesorios para ALTA y MUY ALTA presi&oacute;n.</p>\r\n\r\n<p>Se hicieron demostraciones en el stand del funcionamiento de una unidad generadora de presi&oacute;n, especialmente dise&ntilde;ada para aplicaciones en testing, accionamientos, etc.</p>\r\n\r\n<p>Tambien se realizaron seminarios t&eacute;cnicos sobre el tema.</p>', '<p>From 25 to 28 September, this important exhibition took place in the La Rural property.</p>\r\n\r\n<p>In the sample, ABAC was presented together with its represented MAXIMATOR GmbH, showing the entire line of valves and accessories for HIGH and VERY HIGH pressure.</p>\r\n\r\n<p>Demonstrations were made on the stand of the operation of a pressure generating unit, specially designed for applications in testing, drives, etc.</p>\r\n\r\n<p>Technical seminars on the subject were also held.</p>', 1, 'bb', 2, '2019-03-07 22:28:05', '2019-03-08 14:40:31'),
(3, 'novedades__40-anos.jpg', 'ABAC cumple 40 Años', 'ABAC celebrates 40 years', '<p>Con mucha satisfacci&oacute;n anunciamos que este a&ntilde;o ABAC cumple 40 a&ntilde;os en la industria, ofreciendo siempre productos y servicios calificados para aplicaciones de alta exigencia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>It is with great satisfaction that we announce that ABAC is celebrating 40 years in the industry this year, always offering qualified products and services for highly demanding applications.</p>', 1, 'aa', 2, '2019-03-08 14:44:02', '2019-03-11 17:23:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ficha` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_es` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `especificaciones_es` text COLLATE utf8mb4_unicode_ci,
  `especificaciones_en` text COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familia_id` int(10) UNSIGNED NOT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `image`, `ficha`, `title_es`, `title_en`, `text_es`, `text_en`, `especificaciones_es`, `especificaciones_en`, `video_url`, `familia_id`, `order`, `destacado`, `created_at`, `updated_at`) VALUES
(3, 'productos__VA1.png', 'productos__VA1.pdf', 'VA1 VÁLVULAS AGUJA DE BLOQUEO', 'VA1 LOCKING NEEDLE VALVES', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPCI&Oacute;N:</strong><br />\r\nRobustas v&aacute;lvulas de bloqueo de aplicaci&oacute;n general en instrumentaci&oacute;n y peque&ntilde;as l&iacute;neas de proceso, combinan la estanqueidad de su configuraci&oacute;n aguja con una gran capacidad de pasaje.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CARACTER&Iacute;STICAS:</strong><br />\r\n&bull;&nbsp;Bonete roscado, sin arandela de sello<br />\r\n&bull;&nbsp;V&aacute;stago con contracierre que evita el riesgo de expulsi&oacute;n<br />\r\n&bull;&nbsp;Manivela recta, para una operaci&oacute;n m&aacute;s c&oacute;moda<br />\r\n&bull;&nbsp;Disponible en acero carbono y en inox. AISI 316<br />\r\n&bull;&nbsp;Dise&ntilde;adas para operaci&oacute;n ON/OFF</span></span></p>', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPTION:</strong><br />\r\nRobust blocking valves of general application in instrumentation and small process lines, combine the tightness of their needle configuration with a large capacity of passage.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CHARACTERISTICS:</strong><br />\r\n&bull;&nbsp;Threaded bonnet, without seal washer<br />\r\n&bull;&nbsp;Stalk with counterclock that avoids the risk of expulsion<br />\r\n&bull;&nbsp;Straight crank, for a more comfortable operation<br />\r\n&bull;&nbsp;Available in carbon steel and stainless steel. AISI 316<br />\r\n&bull;&nbsp;Designed for ON / OFF operation</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Presi&oacute;n de servicio@21 C</td>\r\n			<td>420 kg/cm2 - Standard&nbsp;<br />\r\n			700 Kg/cm2 - Opcional</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Temperaturas maximas</td>\r\n			<td>260&deg;C - Empaq. PTFE&nbsp;<br />\r\n			500&deg;C - Empaq. Grafoil</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Service pressure @ 21 C</td>\r\n			<td>420 kg/cm2 - Standard&nbsp;<br />\r\n			700 Kg/cm2 - Opcional</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum temperatures</td>\r\n			<td>260&deg;C - Empaq. PTFE&nbsp;<br />\r\n			500&deg;C - Empaq. Grafoil</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 3, 'aa', 1, '2019-03-07 23:51:58', '2019-03-08 14:23:03'),
(4, 'productos__VA2.png', 'productos__VA2.pdf', 'VA2 VÁLVULAS AGUJA BONETE ROSCADO', 'VA2 NEEDLE VALVE BONETE THREADED', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPCI&Oacute;N:</strong><br />\r\nV&aacute;lvulas aguja con cuerpo de barra o forjado, y bonete roscado, con contracierre. Cumplen con requerimientos tanto de bloqueo como de regulaci&oacute;n. Se emplean en l&iacute;neas de muestreo, sistemas hidr&aacute;ulicos y neum&aacute;ticos, bancos de prueba, tableros, manifolds, aplicaciones en laboratorios, etc.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CARACTER&Iacute;STICAS:</strong><br />\r\n&bull;&nbsp;&nbsp;Bonete roscado, sin arandela de sello<br />\r\n&bull;&nbsp;&nbsp;V&aacute;stagos de bloqueo y de regulaci&oacute;n. Con contracierre<br />\r\n&bull;&nbsp;&nbsp;Distintos materiales y empaquetaduras<br />\r\n&bull;&nbsp;&nbsp;Disposici&oacute;n recta o en &aacute;ngulo<br />\r\n&bull;&nbsp;&nbsp;Conexiones roscadas y a doble virola<br />\r\n&bull;&nbsp;&nbsp;Tuerca pasachapa que permite un f&aacute;cil montaje<br />\r\n&bull;&nbsp;&nbsp;Ajuste de la empaquetadura desde el exterior del panel<br />\r\n&bull;&nbsp;&nbsp;Volante pl&aacute;stico con inserto met&aacute;lico para operaci&oacute;n c&oacute;moda</span></span></p>', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPTION:</strong><br />\r\nNeedle valves with bar or forged body, and threaded bonnet, with counterclock. They comply with both blocking and regulation requirements. They are used in sampling lines, hydraulic and pneumatic systems, test benches, boards, manifolds, laboratory applications, etc.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CHARACTERISTICS:</strong><br />\r\n&bull;&nbsp;&nbsp;Threaded bonnet, without seal washer<br />\r\n&bull;&nbsp;&nbsp;Blocks of blocking and regulation. With counterclock<br />\r\n&bull;&nbsp;&nbsp;Different materials and packings<br />\r\n&bull;&nbsp;&nbsp;Right or angled layout<br />\r\n&bull;&nbsp;&nbsp;Threaded connections and double ferrule<br />\r\n&bull;&nbsp;&nbsp;Nut nut that allows easy assembly<br />\r\n&bull;&nbsp;&nbsp;Adjustment of the packing from the outside of the panel<br />\r\n&bull;&nbsp;&nbsp;Plastic steering wheel with metal insert for comfortable operation</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Presi&oacute;n de servicio@21&deg;C</td>\r\n			<td>420 kg/cm2 - Ac. Carbono / Ac Inox<br />\r\n			210 Kg/cm2 - Lat&oacute;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Temperaturas maximas</td>\r\n			<td>260&deg;C - Empaq. PTFE<br />\r\n			500&deg;C - Empaq. Grafoil.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Service pressure @ 21 &deg; C</td>\r\n			<td>420 kg / cm2 - Ac. Carbon / Ac Stainless<br />\r\n			210 Kg / cm2 - Brass</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum temperatures</td>\r\n			<td>260 &deg; C - Empaq. PTFE<br />\r\n			500 &deg; C - Empaq. Grafoil.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 3, 'bb', 1, '2019-03-08 00:02:52', '2019-03-08 14:24:11'),
(5, 'productos__VF2.png', 'productos__V2F.pdf', 'VF2 VÁLVULAS BONETE INTEGRAL', 'VF2 VALVES BONETE INTEGRAL', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nSu cuerpo forjado con bonete integral le confiere una gran resistencia y al mismo tiempo reduce la posibilidad de p&eacute;rdidas. Posee v&aacute;stago de acero inoxidable que ofrece un fino control de caudal y un bloqueo estanco. Se puede proveer un obturador blando de Acetal o Peek para un cierre muy suave, cuando las condiciones de servicio lo permiten. Se emplean en l&iacute;neas de aire de instrumentaci&oacute;n, tomamuestras, cromatograf&iacute;a, tableros, etc.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull;&nbsp;&nbsp;V&aacute;stago de bloqueo y de regulaci&oacute;n. Con opci&oacute;n de obturador blando<br />\r\n&bull;&nbsp;&nbsp;Distintos materiales y empaquetaduras<br />\r\n&bull;&nbsp;&nbsp;Disposici&oacute;n recta o en &aacute;ngulo<br />\r\n&bull;&nbsp;&nbsp;Conexiones roscadas y a doble virola<br />\r\n&bull;&nbsp;&nbsp;Aptitud para montaje en panel<br />\r\n&bull;&nbsp;&nbsp;Prensa-estopa ajustable, para aumentar la vida &uacute;til de la empaquetadura</span></span></p>', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPTION</strong><br />\r\nIts forged body with integral bonnet gives it great strength and at the same time reduces the possibility of losses. It has a stainless steel stem that offers a fine flow control and a tight lock. A soft Acetal or Peek plug can be provided for a very soft closure when service conditions permit. They are used in instrumentation air lines, sampler, chromatography, boards, etc.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Blocking and regulation stem. With soft shutter option<br />\r\n&bull; Different materials and packings<br />\r\n&bull; Straight or angled layout<br />\r\n&bull; Threaded and double ferrule connections<br />\r\n&bull; Suitability for panel mounting<br />\r\n&bull; Press-adjustable tow, to increase the life of the packing</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Presi&oacute;n de servicio@21&deg;C</td>\r\n			<td>350 bar - Ac. Carbono / Ac Inox.<br />\r\n			210 bar - Lat&oacute;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Temperaturas maximas</td>\r\n			<td>260&deg;C - Empaq. PTFE<br />\r\n			500&deg;C - Empaq. Grafoil<br />\r\n			95&deg;C - Empaq. Fluorelast&oacute;mero<br />\r\n			95&deg;C - Obturador Blando</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Service pressure @ 21 &deg; C</td>\r\n			<td>350 bar - Ac. Carbon / Ac Stainless.<br />\r\n			210 bar - Brass</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum temperatures</td>\r\n			<td>260 &deg; C - Empaq. PTFE<br />\r\n			500 &deg; C - Empaq. Grafoil<br />\r\n			95 &deg; C - Empaq. Fluorelastomer<br />\r\n			95 &deg; C - Soft Shutter</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 3, 'cc', 0, '2019-03-08 00:09:47', '2019-03-08 14:24:31'),
(6, 'productos__VTM.png', 'productos__VTM.pdf', 'VTM VÁLVULAS TOMAMUESTRAS', 'VTM VALVES TAKES SAMPLES', '<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nEsta v&aacute;lvula reune una serie de caracter&iacute;sticas que la hacen especialmente apta para instalar en cilindros tomamuestras.</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Asiento blando, que asegura cierre herm&eacute;tico con bajo torque de operaci&oacute;n<br />\r\n&bull; Empaquetadura debajo de la rosca del v&aacute;stago, que mantiene a &eacute;sta aislada del fluido de proceso<br />\r\n&bull; Su empaquetadura de arosello provee bajo torque de accionamiento y no requiere mantenimiento<br />\r\n&bull; Dise&ntilde;o de manivela que protege al v&aacute;stago de golpes y torceduras<br />\r\n&bull; Constru&iacute;da en acero inox. AISI 316</span></span></p>', '<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nThis valve has a series of characteristics that make it especially suitable for installation in samplers cylinders.</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Soft seat, which ensures a tight seal with low operating torque<br />\r\n&bull; Packing below the stem thread, which keeps the stem isolated from the process fluid<br />\r\n&bull; Its arosello gasket provides low drive torque and requires no maintenance<br />\r\n&bull; Crank design that protects the shank from bumps and kinks<br />\r\n&bull; Built in stainless steel. AISI 316</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Presi&oacute;n de servicio@21&deg;C</td>\r\n			<td>210 bar-</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Temperaturas m&aacute;ximas</td>\r\n			<td>-40&deg;C a 230&deg;C</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Service pressure @ 21 &deg; C</td>\r\n			<td>210 bar-</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum temperatures</td>\r\n			<td>-40&deg;C a 230&deg;C</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 3, 'dd', 1, '2019-03-08 14:29:12', '2019-03-08 14:29:12'),
(7, 'productos__VM1.png', 'productos__VM1.pdf', 'VM1 VÁLVULAS CON VENTEO PARA MANÓMETRO', 'VM1 VALVES WITH VENT FOR MANOMETER', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nLa VM1 es la mejor alternativa cuando se requiere instalar un man&oacute;metro en forma compacta y econ&oacute;mica. Consiste en una v&aacute;lvula aguja de bloqueo con un purgador incorporado que ventea a la atmosfera a trav&eacute;s de un canal practicado en el mismo cuerpo.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Bonete roscado, con contracierre que permite su reempaquetado bajo presi&oacute;n<br />\r\n&bull; V&aacute;stago de bloqueo y obturador de venteo de acero inoxidable<br />\r\n&bull; Pasaje 5,0 mm<br />\r\n&bull; Conexiones M/H</span></span></p>', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPTION</strong><br />\r\nThe VM1 is the best alternative when it is required to install a pressure gauge in a compact and economical way. It consists of a blocking needle valve with a built-in vent that vents the atmosphere through a channel in the same body.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Bonnet, threaded, with counterclock that allows its repackaging under pressure<br />\r\n&bull; Lock stem and stainless steel vent plug<br />\r\n&bull; Passage 5.0 mm<br />\r\n&bull; M / H connections</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Presi&oacute;n de servicio@21&deg;C</td>\r\n			<td>420 bar-</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Temperaturas m&aacute;ximas</td>\r\n			<td>60&deg;C - Empaq. PTFE<br />\r\n			500&deg;C - Empaq. Grafoil</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Service pressure @ 21 &deg; C</td>\r\n			<td>420 bar-</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum temperatures</td>\r\n			<td>60&deg;C - Empaq. PTFE<br />\r\n			500&deg;C - Empaq. Grafoil</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 3, 'ee', 0, '2019-03-08 14:34:49', '2019-03-08 14:34:49'),
(8, 'productos__VA3.png', 'productos__VA3.pdf', 'VA3 VÁLVULAS DE BLOQUEO CON SALIDAS MÚLTIPLES', 'VA3 BLOCKING VALVES WITH MULTIPLE OUTPUTS', '<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nLa VA3 es una v&aacute;lvula aguja de bloqueo, dise&ntilde;ada con m&uacute;ltiples salidas para ser utilizada en el montaje de man&oacute;metros, presostatos, transmisores de presi&oacute;n y otros instrumentos especiales, cualquiera sea la disposici&oacute;n de la instalaci&oacute;n.</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Bonete roscado, con contracierre<br />\r\n&bull; Empaquetadura debajo de la rosca del v&aacute;stago que mantiene a &eacute;sta aislada del fluido de proceso<br />\r\n&bull; Asiento recambiable en la versi&oacute;n de acero carbono<br />\r\n&bull; Conexi&oacute;n a proceso macho o hembra<br />\r\n&bull; Seguro contra desenroscado de bonete<br />\r\n&bull; Opcional asiento blando<br />\r\n&bull; Opcional tap&oacute;n purgador con v&aacute;stago inexpulsable<br />\r\n&bull; Disponibles con 2 &oacute; 3 salidas</span></span></p>', '<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nThe VA3 is a blocking needle valve, designed with multiple outputs to be used in the assembly of pressure gauges, pressure switches, pressure transmitters and other special instruments, regardless of the arrangement of the installation.</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Bonnet screwed, with counterclock<br />\r\n&bull; Packing below the stem thread that keeps the stem isolated from the process fluid<br />\r\n&bull; Replaceable seat in carbon steel version<br />\r\n&bull; Male or female process connection<br />\r\n&bull; Unscrew bonnet insurance<br />\r\n&bull; Optional soft seat<br />\r\n&bull; Optional drain plug with non-expelling stem<br />\r\n&bull; Available with 2 or 3 outputs</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Presi&oacute;n de servicio@21&deg;C</td>\r\n			<td>420 bar-</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Temperaturas maximas</td>\r\n			<td>260&deg;C - Empaq. PTFE<br />\r\n			500&deg;C - Empaq. Grafoil<br />\r\n			93&deg;C - Asiento blando Asetal<br />\r\n			204&deg;C - Asiento blando Peek</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Service pressure @ 21 &deg; C</td>\r\n			<td>420 bar-</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum temperatures</td>\r\n			<td>260 &deg; C - Empaq. PTFE<br />\r\n			500 &deg; C - Empaq. Grafoil<br />\r\n			93 &deg; C - Soft seat Asetal<br />\r\n			204 &deg; C - Peek soft seat</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 3, 'ff', 1, '2019-03-08 14:39:32', '2019-03-08 14:39:32'),
(9, 'productos__MP_MPR.jpg', 'productos__M800_espaniol.pdf', 'MP/MPR MANIFOLD DE 2 VÍAS PARA INSTR ROSCADOS', 'MP / MPR MANIFOLD 2-WAY FOR INSTR THREADS', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nCombinan en un solo conjunto las maniobras de bloqueo y purga, requeridas en la instalaci&oacute;n de man&oacute;metros, y transmisores de presi&oacute;n est&aacute;tica</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; En la versi&oacute;n MP el instrumento se rosca a un conector o brida uni&oacute;n, la cual a su vez se fija al cuerpo del manifold por medio de bulones.<br />\r\n&bull; En el modelo MPR, en cambio, el instrumento o man&oacute;metro se rosca directamente sobre el cuerpo del manifold.<br />\r\n&bull; En ambos casos el conjunto incluye grampa &#39;U&#39; de 3/8&#39; para montaje en ca&ntilde;o de 2&#39;.</span></span></p>', '<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nThey combine in a single set the blocking and purging maneuvers, required in the installation of pressure gauges, and static pressure transmitters</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; In the MP version the instrument is screwed to a connector or union flange, which in turn is fixed to the body of the manifold by means of bolts.<br />\r\n&bull; In the MPR model, on the other hand, the instrument or manometer is screwed directly onto the body of the manifold.<br />\r\n&bull; In both cases, the set includes a 3/8 &#39;&#39; U &#39;clamp for mounting on a 2&#39; pipe.</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\">Empaquetadura</span></td>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\">Asiento</span></td>\r\n			<td colspan=\"2\" rowspan=\"1\"><span style=\"font-size:16px\">Presi&oacute;n de servicio @ 21 &ordm;C</span></td>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\">Temperatura m&aacute;x.</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Bulones montaje ac. carbono</span></td>\r\n			<td><span style=\"font-size:16px\">Bulones montaje inox. AISI 316</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Integral (mat. del cuerpo)</span></td>\r\n			<td><span style=\"font-size:16px\">420 bar</span></td>\r\n			<td><span style=\"font-size:16px\">320 bar</span></td>\r\n			<td><span style=\"font-size:16px\">260 &ordm;C</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Grafoil</span></td>\r\n			<td><span style=\"font-size:16px\">Integral (mat. del cuerpo)</span></td>\r\n			<td><span style=\"font-size:16px\">420 bar</span></td>\r\n			<td><span style=\"font-size:16px\">320 bar</span></td>\r\n			<td><span style=\"font-size:16px\">500 &ordm;C</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Acetal</span></td>\r\n			<td><span style=\"font-size:16px\">420 bar</span></td>\r\n			<td><span style=\"font-size:16px\">320 bar</span></td>\r\n			<td><span style=\"font-size:16px\">93 &ordm;C</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Peek</span></td>\r\n			<td><span style=\"font-size:16px\">420 bar</span></td>\r\n			<td><span style=\"font-size:16px\">320 bar</span></td>\r\n			<td><span style=\"font-size:16px\">204 &ordm;C</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Fluorelast&oacute;mero con respaldo PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Acetal</span></td>\r\n			<td><span style=\"font-size:16px\">420 bar</span></td>\r\n			<td><span style=\"font-size:16px\">320 bar</span></td>\r\n			<td><span style=\"font-size:16px\">93 &ordm;C</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 4, 'aa', 0, '2019-03-08 15:23:21', '2019-03-08 15:26:44'),
(10, 'productos__MPB.jpg', 'productos__MPB.pdf', 'MPB MANIFOLD DE 2 VIAS PARA INSTRUM BRIDADOS', 'MPB MANIFOLD OF 2 WAYS FOR INSTRUM BRIDES', '<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nSe emplea en el montaje de transmisores de presi&oacute;n est&aacute;tica estilo d/p cell.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#999999\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; El instrumento se fija por medio de bulones a una de las caras del manifold mientras que del lado proceso se dispone de una conexi&oacute;n roscada 1/2&#39; NPT.<br />\r\n&bull; Admite el empleo del soporte SM para su montaje en ca&ntilde;o de 2&#39;.</span></span></p>', '<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nIt is used in the assembly of static pressure transmitters style d / p cell.</span></span></p>\r\n\r\n<p><span style=\"color:#999999\"><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; The instrument is fixed by means of bolts to one of the faces of the manifold while from the process side there is a threaded connection 1/2 &#39;NPT.<br />\r\n&bull; It admits the use of SM support for its assembly in 2 &#39;pipe.</span></span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Empaquetadura</strong></span></td>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Asiento</strong></span></td>\r\n			<td colspan=\"2\" rowspan=\"1\"><span style=\"font-size:16px\"><strong>Presi&oacute;n de servicio @ 21&deg;C</strong></span></td>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Temperatura m&aacute;x.</strong></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Bulones montaje ac. carbono</span></td>\r\n			<td><span style=\"font-size:16px\">Bulones montaje inox. AISI 316</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Integral (mat. del cuerpo)&nbsp;&nbsp; &nbsp;</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>260&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Grafoil</span></td>\r\n			<td><span style=\"font-size:16px\">Integral (mat. del cuerpo)&nbsp;&nbsp; &nbsp;</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>500&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Acetal</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>93&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Peek&nbsp;&nbsp; &nbsp;</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>204&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Fluorelast&oacute;mero con respaldo PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Acetal</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>93&deg;C</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 4, 'bb', 0, '2019-03-08 15:35:45', '2019-03-08 15:35:45'),
(11, 'productos__M1.jpg', 'productos__M1.pdf', 'M1 MANIFOLD DE 3 VIAS. CONEXIONES ROSCADAS', 'M1 MANIFOLD OF 3 WAYS. THREADED CONNECTIONS', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nManifold de tres v&iacute;as de aplicaci&oacute;n general.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Sus conexiones a proceso y a instrumento roscadas 1/2&quot;NPT permiten su instalaci&oacute;n en cualquier punto conveniente entre el proceso y el transmisor o man&oacute;metro.</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nManifold of three routes of general application.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Its 1/2 &quot;NPT threaded and process connections allow its installation at any convenient point between the process and the transmitter or manometer.</span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Empaquetadura</strong></span></td>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Asiento</strong></span></td>\r\n			<td colspan=\"2\" rowspan=\"1\"><span style=\"font-size:16px\"><strong>Presi&oacute;n de servicio @ 21&deg;C</strong></span></td>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Temperatura m&aacute;x.</strong></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Bulones montaje ac. carbono</span></td>\r\n			<td><span style=\"font-size:16px\">Bulones montaje inox. AISI 316</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Integral (mat. del cuerpo)&nbsp;&nbsp; &nbsp;</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>260&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Grafoil</span></td>\r\n			<td><span style=\"font-size:16px\">Integral (mat. del cuerpo)&nbsp;&nbsp; &nbsp;</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>500&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Acetal</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>93&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Peek&nbsp;&nbsp; &nbsp;</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>204&deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Fluorelast&oacute;mero con respaldo PTFE</span></td>\r\n			<td><span style=\"font-size:16px\">Acetal</span></td>\r\n			<td>420 bar</td>\r\n			<td>320 bar</td>\r\n			<td>93&deg;C</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 4, 'cc', 0, '2019-03-08 15:39:33', '2019-03-08 15:40:54'),
(12, 'productos__CV.jpg', 'productos__fluidos.pdf', 'CV CONDENSADOR DE VAPOR PARA MANÓMETROS', 'CV VAPOR CONDENSER FOR MANOMETERS', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nSe utiliza para montaje de instrumentos en l&iacute;neas de vapor. Est&aacute; dise&ntilde;ado para reemplazar al antiguo modelo de sif&oacute;n &quot;pig tail&quot;, mejorando su cometido.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Act&uacute;a como trampa de condensado evitando que las altas temperaturas del vapor perjudiquen al instrumento.<br />\r\n&bull; Por su menor tama&ntilde;o, acerca el man&oacute;metro a la ca&ntilde;er&iacute;a, reduciendo de esta forma las sacudidas del elemento de medici&oacute;n en l&iacute;neas sometidas a vibraci&oacute;n</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nIt is used for mounting instruments on steam lines. It is designed to replace the old &quot;pig tail&quot; siphon model, improving its purpose.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Acts as a condensate trap, preventing high steam temperatures from damaging the instrument.<br />\r\n&bull; Due to its smaller size, it brings the pressure gauge closer to the pipeline, thus reducing the shaking of the measuring element in lines subject to vibration</span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><strong>Presi&oacute;n de servicio@21&ordm;C&nbsp;&nbsp; &nbsp;</strong></span></td>\r\n			<td colspan=\"2\" rowspan=\"1\"><span style=\"font-size:16px\">207 bar</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Temperatura m&aacute;xima</strong></span></td>\r\n			<td><span style=\"font-size:16px\">450&ordm;C</span></td>\r\n			<td><span style=\"font-size:16px\">Ac.Carbono</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">540&ordm;C</span></td>\r\n			<td><span style=\"font-size:16px\">Ac. inoxidable</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 5, 'aa', 0, '2019-03-08 15:49:58', '2019-03-08 15:49:58'),
(13, 'productos__APM.jpg', 'productos__fluidos.pdf', 'APM AMORTIGUADOR DE PULSACIONES', 'APM PULSATION SHOCK ABSORBER', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nCuando un man&oacute;metro o transmisor debe instalarse en l&iacute;neas de presi&oacute;n con caracter&iacute;sticas pulsantes, es conveniente el empleo de un amortiguador. Este accesorio elimina las oscilaciones o pulsaciones indeseadas, posibilitando una buena lectura del man&oacute;metro a la vez que alarga la vida &uacute;til del mismo.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Precisa calibraci&oacute;n externa, sin necesidad de quitar el instrumento<br />\r\n&bull; Internos de acero inoxidable<br />\r\n&bull; Arosello para evitar p&eacute;rdidas por la rosca<br />\r\n&bull; Seguro contra desenroscado del v&aacute;stago<br />\r\n&bull; Conexiones 1/2&quot;NPT M-H</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nWhen a manometer or transmitter must be installed in pressure lines with pulsating characteristics, it is convenient to use a shock absorber. This accessory eliminates unwanted oscillations or pulsations, allowing a good reading of the manometer while extending the life of it.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Accurate external calibration, no need to remove the instrument<br />\r\n&bull; Stainless steel internals<br />\r\n&bull; Arosello to avoid losses by the thread<br />\r\n&bull; Safe against unscrewing the stem<br />\r\n&bull; Connections 1/2 &quot;NPT M-H</span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><strong>Presi&oacute;n de servicio@ 21&ordm;C</strong></span></td>\r\n			<td colspan=\"3\" rowspan=\"1\"><span style=\"font-size:16px\">207 bar</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"3\"><span style=\"font-size:16px\"><strong>Temperaturas de servicio</strong></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style=\"font-size:16px\">Min.</span></td>\r\n			<td><span style=\"font-size:16px\">Max.</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Buna</span></td>\r\n			<td><span style=\"font-size:16px\">-35&ordm;C</span></td>\r\n			<td><span style=\"font-size:16px\">121&ordm;C</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Fluorelastomero</span></td>\r\n			<td><span style=\"font-size:16px\">-29&ordm;C</span></td>\r\n			<td><span style=\"font-size:16px\">204&ordm;C</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 5, 'bb', 0, '2019-03-08 15:54:53', '2019-03-08 15:54:53'),
(14, 'productos__LP.jpg', 'productos__fluidos.pdf', 'LP LIMITADOR DE PRESIÓN', 'LP PRESSURE LIMITER', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nDispositivo destinado a proteger man&oacute;metros y otros instrumentos cr&iacute;ticos y costosos contra sobrepresiones accidentales que podr&iacute;an da&ntilde;arlos. Cuando por cualquier causa la presi&oacute;n de la l&iacute;nea supera el valor m&aacute;ximo admitido por el instrumento, el limitador lo a&iacute;sla autom&aacute;ticamente del circuito y lo rehabilita, tambi&eacute;n autom&aacute;ticamente, cuando la presi&oacute;n de proceso retoma sus valores normales.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; F&aacute;cil montaje<br />\r\n&bull; Baja hist&eacute;resis<br />\r\n&bull; Resorte &quot;seco&quot;; el fluido no lo toca<br />\r\n&bull; Seis rangos est&aacute;ndar de presiones<br />\r\n&bull; Calibraci&oacute;n externa infinitamente variable entre los valores l&iacute;mite de cada rango<br />\r\n&bull; Disponible tambi&eacute;n con fuelle sensible para una mayor precisi&oacute;n y menor hist&eacute;resis. (Modelo LP1D)<br />\r\n&bull; A pedido se entrega calibrado al set requerido y con identificaci&oacute;n del mismo</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nDevice designed to protect manometers and other critical and expensive instruments against accidental overpressures that could damage them. When for any reason the line pressure exceeds the maximum value admitted by the instrument, the limiter automatically isolates it from the circuit and rehabilitates it, also automatically, when the process pressure returns to its normal values.</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Easy assembly<br />\r\n&bull; Low hysteresis<br />\r\n&bull; &quot;Dry&quot; spring; the fluid does not touch it<br />\r\n&bull; Six standard ranges of pressures<br />\r\n&bull; Infinitely variable external calibration between the limit values of each range<br />\r\n&bull; Also available with sensitive bellows for greater precision and less hysteresis. (Model LP1D)<br />\r\n&bull; Upon request, calibrated delivery to the required set and with identification of the same</span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Sobre presi&oacute;n m&aacute;xima</strong></span></td>\r\n			<td><span style=\"font-size:16px\">LP1 a LP18</span></td>\r\n			<td><span style=\"font-size:16px\">207 bar</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">LP40 a LP80</span></td>\r\n			<td><span style=\"font-size:16px\">414 bar</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><strong>Temp.de servicio</strong></span></td>\r\n			<td><span style=\"font-size:16px\">-12&ordm;C a 204&ordm;C</span></td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Precisi&oacute;n</strong></span></td>\r\n			<td><span style=\"font-size:16px\">&plusmn; 10 %</span></td>\r\n			<td><span style=\"font-size:16px\">A pist&oacute;n</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">&plusmn; 5 %</span></td>\r\n			<td><span style=\"font-size:16px\">A fuelle</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"1\" rowspan=\"2\"><span style=\"font-size:16px\"><strong>Hist&eacute;resis</strong></span></td>\r\n			<td><span style=\"font-size:16px\">&plusmn; 10 %</span></td>\r\n			<td><span style=\"font-size:16px\">A pist&oacute;n</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">&plusmn; 5 %</span></td>\r\n			<td><span style=\"font-size:16px\">A fuelle</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, NULL, 5, 'cc', 0, '2019-03-08 16:01:46', '2019-03-08 16:09:25'),
(15, 'productos__ABALOK.jpg', 'productos__conexiones-tubos.pdf', 'ABALOK UNIONES PARA TUBOS', 'ABALOK UNIONS FOR TUBES', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nLas uniones ABALOK&reg; son del tipo doble virola. Se aplican en instrumentaci&oacute;n, sistemas de control, cromatograf&iacute;a, petroqu&iacute;mica, refiner&iacute;as, instalaciones de GNC y GNL y, en general, en aplicaciones de alta exigencia y confiabilidad</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; F&aacute;ciles de armar, con bajo torque<br />\r\n&bull;&nbsp;No transmiten torsi&oacute;n al ca&ntilde;o<br />\r\n&bull; Virola frontal con resalto que provee un limite de ajuste. Impide una expansion del cuerpo por exceso de torque<br />\r\n&bull; Estanqueidad aun con gases muy livianos como el helio<br />\r\n&bull; Tres puntos de sujeci&oacute;n del tubo para un mejor comportamiento ante vibraciones<br />\r\n&bull; Perfecto sello entre los componentes, luego del ensamble y en posteriores rearmados<br />\r\n&bull; Roscas interiores con revestimiento de plata para evitar engranes y disminuir el torque de ajuste<br />\r\n&bull; Probada intercambiabilidad con otros similares (ver Informe de Intercambiabilidad)<br />\r\n&bull; Trazabilidad de material y de lote de fabricacion en cuerpos y tuercas. Un n&uacute;mero grabado en forma indeleble en las piezas asegura rastreabilidad<br />\r\n&bull; Cumplen con la norma ASTM F1387-99</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nABALOK&reg; unions are of the double ferrule type. They are applied in instrumentation, control systems, chromatography, petrochemicals, refineries, CNG and LNG facilities and, in general, in applications of high demand and reliability</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Easy to assemble, with low torque<br />\r\n&bull; They do not transmit torsion to the spout<br />\r\n&bull; Front bolster with shoulder that provides a limit of adjustment. Prevents body expansion due to excess torque<br />\r\n&bull; Sealing even with very light gases such as helium<br />\r\n&bull; Three tube clamping points for better vibration behavior<br />\r\n&bull; Perfect seal between the components, after the assembly and in subsequent rearming<br />\r\n&bull; Internal threads with silver coating to avoid gear and decrease the adjustment torque<br />\r\n&bull; Proven interchangeability with similar ones (see Interchangeability Report)<br />\r\n&bull; Traceability of material and batch manufacturing in bodies and nuts. A number engraved indelibly on the pieces ensures traceability<br />\r\n&bull; Comply with ASTM F1387-99</span></p>', NULL, NULL, NULL, 6, 'aa', 0, '2019-03-08 16:21:39', '2019-03-08 16:21:39'),
(16, 'productos__ACR.jpg', 'productos__conexiones-tubos.pdf', 'ACR ACCESORIOS ROSCADOS PARA INSTRUMENTACIÓN', 'ACR THREADED ACCESSORIES FOR INSTRUMENTATION', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nAccesorios para unir ca&ntilde;erias roscadas. Fabricados a partir de barras y forjados de acero al carbono e inoxidable grado 316</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Conexiones roscadas NPT y cilindricas con asiento conico tipo Autoclave<br />\r\n&bull; Gama completa de entreroscas, tes, cuplas, niples, bujes, etc</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nAccessories to join threaded pipes. Manufactured from carbon and stainless steel grade 316 bars and slabs</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; NPT and cylindrical threaded connections with conical seat type Autoclave<br />\r\n&bull; Full range of threads, tees, couplings, nipples, bushings, etc.</span></p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><strong>Tipo Rosca</strong></span></td>\r\n			<td><span style=\"font-size:16px\"><strong>Presi&oacute;n M&aacute;x.</strong></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">NPT</span></td>\r\n			<td><span style=\"font-size:16px\">1050 bar</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Cil&iacute;ndrica con asiento c&oacute;nico</span></td>\r\n			<td><span style=\"font-size:16px\">2100 bar</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong><span style=\"font-size:16px\">Thread Type</span></strong></td>\r\n			<td><strong><span style=\"font-size:16px\">Max. Pressure</span></strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">NPT</span></td>\r\n			<td><span style=\"font-size:16px\">1050 bar</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\">Cylindrical with conical seat</span></td>\r\n			<td><span style=\"font-size:16px\">2100 bar</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 6, 'bb', 0, '2019-03-08 16:35:40', '2019-03-08 16:35:40'),
(17, 'productos__T.jpg', NULL, 'T TUBOS DE ACERO INOXIDABLE', 'T STAINLESS STEEL TUBES', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nTubos de AISI 316 y AISI 316L sin costura, aptos para instrumentaci&oacute;n</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Di&aacute;metros desde 1/8&quot; hasta 3/4&quot; y espesores de 0.71 a 1.65 mm</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nSeamless AISI 316 and AISI 316L tubes, suitable for instrumentation</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Diameters from 1/8 &quot;to 3/4&quot; and thicknesses from 0.71 to 1.65 mm</span></p>', '<p><span style=\"font-size:16px\">Seg&uacute;n normas ASTM&nbsp; A269 o A213</span></p>', '<p><span style=\"font-size:16px\">According to ASTM standards&nbsp; A269 or A213</span></p>', NULL, 6, 'cc', 0, '2019-03-08 16:39:24', '2019-03-08 16:39:24'),
(18, 'productos__ST.jpg', NULL, 'ST SOPORTES PARA TUBOS', 'ST SUPPORTS FOR TUBES', '<p><span style=\"font-size:16px\"><strong>DESCRIPCI&Oacute;N</strong><br />\r\nSoportes para tubos, de polipropileno, en dos mitades, para 1 o 2 tubos</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CARACTER&Iacute;STICAS</strong><br />\r\n&bull; Base de acero al carbono, para soldar o abulonar<br />\r\n&bull; Opcional base de acero inoxidable AISI 304/316</span></p>', '<p><span style=\"font-size:16px\"><strong>DESCRIPTION</strong><br />\r\nSupports for tubes, polypropylene, in two halves, for 1 or 2 tubes</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CHARACTERISTICS</strong><br />\r\n&bull; Carbon steel base, for welding or abulonar<br />\r\n&bull; Optional AISI 304/316 stainless steel base</span></p>', '<p>Para 1 o 2 tubos de:<br />\r\n1/8, 1/4 ,3/8 , 1/2 , y 1&quot; OD</p>', '<p>For 1 or 2 tubes of:<br />\r\n1/8, 1/4, 3/8, 1/2, and 1 &quot;OD</p>', NULL, 6, 'dd', 0, '2019-03-08 16:41:50', '2019-03-08 16:41:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_es` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_es` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `title_es`, `subtitle_es`, `title_en`, `subtitle_en`, `image`, `section`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Soluciones confiables para aplicaciones de alta exigencia', NULL, 'Reliable solutions', NULL, 'sliders__abacsliderhome.jpg', 'home', 'AA', '2019-02-26 20:16:19', '2019-03-08 16:36:45'),
(2, NULL, NULL, NULL, NULL, 'sliders__sd.jpg', 'empresa', 'AA', '2019-02-27 15:31:36', '2019-03-07 21:24:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablas`
--

CREATE TABLE `tablas` (
  `id` int(10) UNSIGNED NOT NULL,
  `a` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `i` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `j` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producto_id` int(10) UNSIGNED DEFAULT NULL,
  `o` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` enum('s1','s2','s3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 's1',
  `distribuidor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `nivel`, `distribuidor`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Esaú Murillo', 'esaujose7', 'esaujose7@gmail.com', 's3', NULL, NULL, '$2y$10$5NLXOV8uNgTlzkVSXft8JuzeYNx2U7ue9lYSrw9v3nzHPV.q5x6D6', 'RfWNsb28ofnR8C5DeRMn3febtN8bw0TFbk3xMCGOom98BPB8nuT2YdpRhj8s', NULL, NULL),
(2, 'Pablo Cabañuz', 'pablo', 'pcabanuz@osole.es', 's3', NULL, NULL, '$2y$10$xeTuMaMQ2vV3njSWIkq7.Oe4hN2a/JTDQhqfhbbYVT4ldKdNXiWEy', 'sPJHzwPJDkf9wpAAL1FTeJAfDfF6oTCtL4szBoz0NePmUS6TxgsTa2qdL2R8', NULL, NULL),
(3, 'ariel', 'ariel', 'arielcallisaya00@gmail.com', 's3', 'Exclusivo', NULL, '$2y$10$Jk6XpEYDqYeLmsrXYvWpQOXxhFlWu7wVmrB.j/ooQrMdX3wmD8iY.', 'PSoesnhLzKlP7OYgu58nITwA2QlI1fGVDjUzFUNFpbVKQPh35oqUdp1oVzsb', '2019-03-11 20:31:44', '2019-03-18 20:54:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indices de la tabla `calidads`
--
ALTER TABLE `calidads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `csvs`
--
ALTER TABLE `csvs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novedades_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_familia_id_foreign` (`familia_id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tablas`
--
ALTER TABLE `tablas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tablas_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calidads`
--
ALTER TABLE `calidads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `csvs`
--
ALTER TABLE `csvs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `descargas`
--
ALTER TABLE `descargas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tablas`
--
ALTER TABLE `tablas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD CONSTRAINT `novedades_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_familia_id_foreign` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tablas`
--
ALTER TABLE `tablas`
  ADD CONSTRAINT `tablas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
