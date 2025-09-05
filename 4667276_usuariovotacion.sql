-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 01-09-2025 a las 01:33:27
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4667276_usuariovotacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8mb3_spanish_ci NOT NULL,
  `edad` int DEFAULT NULL,
  `universidad` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `contrasena` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL
) ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `nombre`, `correo`, `edad`, `universidad`, `telefono`, `contrasena`) VALUES
(2, 'Brayan', 'brayan@hotmail.com', 23, 'uacj', '656-273-8644', '$2y$10$zFGRcwodZJrMgfZdwaNDb.FzbUpzDxmWcF4zGg86g.5r25mIc2euS'),
(3, 'Carlos', 'caballerito@hotmail.com', 25, 'itcj', '656-273-8644', '$2y$10$Ur5R2n7V3PlgcqgT8Dgn9O1oPc0ivb5oMcmqm/rLrMwEwea9yjWw6'),
(4, 'Naomy', 'NanoILove@hotmail.com', 23, 'uacj', '656-273-8644', '$2y$10$vt.aTX6RkfYZhP7pCxD/HOrcgBN0E7KTgYHwXrRFqRD./dMFk1rS2'),
(5, 'Zelda', 'zelda@gmail.com', 21, 'uacj', '656-123-8080', '$2y$10$YdoSpypAwMbwoZxizipKtOXRFmJz9AJYLnfwUQYa0s4JF/MrAaTgC'),
(6, 'Samuel', 'heilend.krampen@gmail.com', 22, 'urn', '123-456-799', '$2y$10$tKnoPOPCWcK0Sw/hKFKgj.B3X/gWKOyhbYIqNQr.dAGJvzPm.1tZK'),
(7, 'Itzel', 'itzel.123@gmail.com', 22, 'uacj', '656-125-3599', '$2y$10$MPcW4au9cs6Ws44NiaNHh.EZJjFCUSvjhcLvRoLFB2maciCF2zjxi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `voto_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `institucion` enum('ITCJ','TEC','URN','UACJ','UACH') COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_voto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`voto_id`, `user_id`, `institucion`, `fecha_voto`) VALUES
(1, 2, 'UACJ', '2025-08-31 00:07:35'),
(2, 3, 'ITCJ', '2025-08-31 00:08:02'),
(3, 4, 'UACJ', '2025-08-31 23:58:54'),
(4, 5, 'UACJ', '2025-09-01 00:00:41'),
(5, 6, 'URN', '2025-09-01 00:34:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`voto_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `voto_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
