-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2022 a las 00:46:10
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u584847502_inmobiliaria`
--
CREATE DATABASE IF NOT EXISTS `u584847502_inmobiliaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u584847502_inmobiliaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `id_property` int(2) NOT NULL,
  `foto1` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto3` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto4` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto5` varchar(265) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto6` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto7` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto8` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto9` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto10` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `id_property` (`id_property`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_property`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`) VALUES
(1, '62f59245a8ff56.88304457.jpg', '62f59245a93257.74590288.jpg', '62f59245a94858.56126527.jpg', '62f59245a95771.55497912.jpg', '62f59245a96e96.65614699.jpg', '62f59245a98249.21963860.jpg', '62f59245a99342.16322651.jpg', '62f59245a9a422.21879736.jpg', '', ''),
(2, '62f594412d33a0.40044934.jpg', '62f594412d4f52.19460864.jpg', '62f594412d5e89.62438531.jpg', '62f594412d6bd2.66381005.jpg', '62f594412d7b44.67170386.jpg', '62f594412d8fe2.01512533.jpg', '62f594412da542.54279858.jpg', '62f594412db791.39557447.jpg', '62f594412dce53.96228839.jpg', '62f594412dea93.66350778.jpg'),
(3, '62f596fc76fd85.14409922.jpg', '62f596fc771a44.90256900.jpg', '62f596fc772520.81475500.jpg', '62f596fc772d48.25197367.jpg', '62f596fc7735b2.01492687.jpg', '62f596fc773d88.20233931.jpg', '62f596fc774735.47583814.jpg', '62f596fc775360.19515257.jpg', '62f596fc775b61.54360241.jpg', '62f596fc776508.48534205.jpg'),
(4, '62fa7b73930158.18468134.jpeg', '62fa7b73933c25.16265606.jpeg', '62fa7b73934b15.22375046.jpeg', '62fa7b73935907.00732223.jpeg', '62fa7b73936773.57715587.jpeg', '62fa7b73937e57.21867126.jpeg', '62fa7b73938e00.20646478.jpeg', '62fa7b73939c96.00081601.jpeg', '62fa7b7393a8a9.74910868.jpeg', '62fa7b7393b3e8.80185337.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

DROP TABLE IF EXISTS `propiedades`;
CREATE TABLE IF NOT EXISTS `propiedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_usuario` varchar(80) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `vrenta` varchar(30) NOT NULL,
  `pr_int` int(30) NOT NULL,
  `precio` text NOT NULL,
  `ubicacion` varchar(256) NOT NULL,
  `mapa` text NOT NULL,
  `fecha` datetime NOT NULL,
  `terreno` varchar(20) NOT NULL,
  `construccion` varchar(20) NOT NULL,
  `recamaras` varchar(50) NOT NULL,
  `niveles` varchar(10) NOT NULL,
  `banios` varchar(10) NOT NULL,
  `estac` varchar(10) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `video` text NOT NULL,
  `vendido` varchar(12) NOT NULL,
  `autorizada` varchar(5) NOT NULL,
  `expediente` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_usuario` (`email_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `email_usuario`, `titulo`, `categoria`, `vrenta`, `pr_int`, `precio`, `ubicacion`, `mapa`, `fecha`, `terreno`, `construccion`, `recamaras`, `niveles`, `banios`, `estac`, `descripcion`, `video`, `vendido`, `autorizada`, `expediente`) VALUES
(1, 'ventas@ochoarealestateservices.com', 'CV 10005 Vida del Mar', 'Casa', 'venta', 450000, '450,000 USD', 'Manzanillo, Colima', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6440.504938369556!2d-104.4114173!3d19.105389!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8424d16e8d0a2bd7%3A0x21659e6d5e6d4840!2sVida%20del%20Mar!5e1!3m2!1ses!2smx!4v1660260779611!5m2!1ses!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2022-08-11 23:35:33', '', '', '3', '2', '3.5', '1', '- Sala <br>\r\n- Cocina integral<br>\r\n- Comedor <br>\r\n- Alberca con vista al mar <br>\r\n- Cuarto de servicio <br>\r\n- Cochera', '', 'No', 'Si', 'Pendiente: Área de construcción y superficie.'),
(2, 'ventas@ochoarealestateservices.com', 'CV 10008 Jalipa', 'Casa', 'venta', 2500000, '2,500,000', 'Manzanillo, Colima', '', '2022-08-11 23:44:01', '900', '', '2', '2', '3', '1', '- Sala con chimenea <br>\r\n- Cocina integral  <br>\r\n- Comedor  <br>\r\n- Jardín con árboles frutales <br>\r\n- Espacio para granja <br>\r\n- Portón eléctrico', '', 'Si', 'No', 'Pendiente: Ubicación y mapa. NO AUTORIZAR.'),
(3, 'ventas@ochoarealestateservices.com', 'CV 10010 Mango', 'Casa', 'venta', 1600000, '1,600,000', 'Manzanillo, Colima', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.7462629664674!2d-104.34076048557007!3d19.118784187063373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8424d68b587fe821%3A0x23f9a107f9260f3f!2sDiplom%C3%A1tico%2013%2C%20Los%20Mangos%2C%2028869%20Manzanillo%2C%20Col.!5e0!3m2!1ses!2smx!4v1660262001679!5m2!1ses!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2022-08-11 23:55:40', '', '', '3', '2', '2.5', '1', '- Sala <br>\r\n- Cocina<br>\r\n- Comedor<br>\r\n- Patio de servicio <br>\r\n- Cochera', '', 'No', 'Si', 'AUTORIZADA. Preguntar sobre superficie del terreno y construcción'),
(4, 'ventas@ochoarealestateservices.com', 'CV 10014 Andares', 'Casa', 'venta', 890000, '890,000.00', 'Colima, Colima', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8959.45562977813!2d-103.68483115677799!3d19.239392285412087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x620d1986f4f471c9!2zMTnCsDE0JzI2LjMiTiAxMDPCsDQwJzQ4LjMiVw!5e0!3m2!1ses-419!2smx!4v1660582632298!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2022-08-15 16:59:31', '96', '79.60', '2', '1', '2.5', '1', '- Sala<br>\r\n- Cocina<br>\r\n- Comedor<br>\r\n- Patio de servicio <br>\r\n- Cochera', '', 'No', 'Si', 'Ficha completa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `pwd` varchar(150) NOT NULL,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `contacto` (`contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nombre`, `apellidos`, `email`, `contacto`, `pwd`, `role`) VALUES
(1, 'OchoaRealEstateServices', 'Ochoa Real', 'Estate Services', 'ochoarealestateservices@gmail.com', '3143769162', '2799c9bfd3a34be56b2692146eea9a095de347a9861d60d83090671167c06b0a0b86136ab7fffe26b356f15fd2e86001d10b5e5012a4624d361b88ab88c81698', 'admin'),
(2, 'sistemas', 'Enrique de Jesús', 'Ochoa Preciado', 'sistemas@ochoarealestateservices.com', '3141076334', '2799c9bfd3a34be56b2692146eea9a095de347a9861d60d83090671167c06b0a0b86136ab7fffe26b356f15fd2e86001d10b5e5012a4624d361b88ab88c81698', 'admin'),
(3, 'ventas', 'Ventas Ochoa', 'Real Estate', 'ventas@ochoarealestateservices.com', '3143769162', '3de90373f7c6be278775ef965df94a8f06c261f3fa9524e9e0fafc3c47cad90be2e1e711f6353c15c7d86ce51c73307c4e93e60a46a6a93ad374d422e20bc08a', 'admin'),
(4, 'bnoemir', 'Brenda Noemí', 'Ochoa Ramírez', 'bnoemir@ochoarealestatservices.com', '3141419452', '3155bcf50046ee7aaf5e6486e15e05d8ec4ae87bbe4137fc417b1e2c5ac5027b38e65975861b5f8bbd950407a4d87847446b526fae9d4342a4e991e2c25a7c7c', 'admin'),
(5, 'jochoar_', 'Jose Enrique', 'ochoa Ramírez', 'jochoar@ochoarealestateservices.com', '3141255108', 'e7638b1321f700158193f388958bac0c9480914119cdf5817e56685f45deb7b76485a14c9e0368d37ef6ebb806c54944133f3feaa57032d5337ef5f41de7c26f', 'admin'),
(6, 'mayra_v', 'Mayra', 'Villaseñor', 'mayra_v@ochoarealestatservices.com', '3143767868', '3d1d68db9e7c647d35f0eb6d7151a94bf3e42c0266dcb6833719276c1e84191e454cff39c91276fadbec720bbe14feb088580b0c3e12ca8d7d86fe75f897aafc', 'adminval'),
(7, 'david_v', 'David', 'Vargas', 'david_v@ochoarealestateservices.com', '3141068978', '149f241563b67e4bed815bb098743557ac202a00ad4aa6495a5a5939686316cf2100fa3059249d34ec652fc417be20b3fe1401e87f94617c75d5d101ed4c918e', 'adminval'),
(8, 'victoria_f', 'Victoria', 'Flores', 'victoria_f@ochoarealestateservices.com', '3141436707', '91c24a1f4fff3fade549bdae6b03ec595878ba219610ab644b49da087cabcf240926e801601c03ba322c26a0566e125a664fbf2b56b1c39c8f8abd455c3ac8f7', 'adminval'),
(9, 'maria_r', 'María Luisa', 'Ruiz', 'maria_r@ochoarealestateservices.com', '3141213956', '702cca964c74cb451f488f73225c0a053388775e96430ea275c116c9c7815035496c9bb669dcd5612d9bfa04a0c8d8969343de8f88e44dcbd9a0a4702137ebd8', 'adminval'),
(10, 'lucy_c', 'Lucy', 'Chávez', 'lucy_c@ochoarealestateservices.com', '3141393750', 'fe1bc275c5c3e1a6a48d35e181dbd3fa47e9d3ba6a62c2ebe2ea9a57e8d6e45e9110fdeb2bb795beaf64e0bf4869eae6bad49859f0414bbaa3ae9c4f669edfc4', 'adminval');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades` ADD FULLTEXT KEY `titulo` (`titulo`,`descripcion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_property`) REFERENCES `propiedades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `propiedades_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
