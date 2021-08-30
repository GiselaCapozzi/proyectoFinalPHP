-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2021 a las 23:45:26
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventospredefinidosusuarios`
--

CREATE TABLE `eventospredefinidosusuarios` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `horainicio` time DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `colortexto` varchar(7) DEFAULT NULL,
  `colorfondo` varchar(7) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventospredefinidosusuarios`
--

INSERT INTO `eventospredefinidosusuarios` (`codigo`, `titulo`, `horainicio`, `horafin`, `colortexto`, `colorfondo`, `usuario`) VALUES
(1, 'Clase de tai-chi', '09:15:00', '10:15:00', '#ffffff', '#94ceca', 'admin'),
(2, 'Clase de pilates', '11:00:00', '11:50:00', '#ffffff', '#14868c', 'admin'),
(3, 'Clase de yoga', '13:05:00', '14:00:00', '#ffffff', '#2f416d', 'admin'),
(4, 'Clase de calistenia', '18:05:00', '19:00:00', '#ffffff', '#5d1451', 'admin'),
(5, 'Leer un libro', '14:20:00', '15:30:00', '#f312a0', '#37d7cd', 'giss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventosusuarios`
--

CREATE TABLE `eventosusuarios` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `colortexto` varchar(7) DEFAULT NULL,
  `colorfondo` varchar(7) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventosusuarios`
--

INSERT INTO `eventosusuarios` (`codigo`, `titulo`, `descripcion`, `inicio`, `fin`, `colortexto`, `colorfondo`, `usuario`) VALUES
(1, 'Clase de tai-chi', '', '2021-08-07 09:15:00', '2021-08-07 10:15:00', '#ffffff', '#94ceca', 'admin'),
(2, 'Clase de pilates', '', '2021-08-07 11:00:00', '2021-08-07 11:50:00', '#ffffff', '#14868c', 'admin'),
(3, 'Clase de tai-chi', '', '2021-08-08 09:15:00', '2021-08-08 10:15:00', '#ffffff', '#94ceca', 'admin'),
(4, 'Clase de pilates', '', '2021-08-08 11:00:00', '2021-08-08 11:50:00', '#ffffff', '#14868c', 'admin'),
(5, 'Clase de yoga', '', '2021-08-08 13:05:00', '2021-08-08 14:00:00', '#ffffff', '#2f416d', 'admin'),
(6, 'Clase de calistenia', '', '2021-08-08 18:05:00', '2021-08-08 19:00:00', '#ffffff', '#5d1451', 'admin'),
(7, 'Clase de calistenia', '', '2021-08-09 18:05:00', '2021-08-09 19:00:00', '#ffffff', '#5d1451', 'admin'),
(8, 'Clase de calistenia', '', '2021-08-10 18:05:00', '2021-08-10 19:00:00', '#ffffff', '#5d1451', 'admin'),
(9, 'Clase de pilates', '', '2021-08-11 11:00:00', '2021-08-11 11:50:00', '#ffffff', '#14868c', 'admin'),
(10, 'Almuerzo a la canasta', 'Trae cada uno su comida', '2021-08-07 12:15:00', '2021-08-07 13:00:00', '#ffffff', '#3788d8', 'admin'),
(11, 'Clase de calistenia', '', '2021-08-07 18:05:00', '2021-08-07 19:00:00', '#ffffff', '#5d1451', 'admin'),
(12, 'Clase de calistenia', '', '2021-08-11 18:05:00', '2021-08-11 19:00:00', '#ffffff', '#5d1451', 'admin'),
(13, 'Reunión de personal', '', '2021-08-08 21:00:00', '2021-08-08 22:00:00', '#ffffff', '#3788d8', 'admin'),
(14, 'Desayuno de grupo', '', '2021-08-10 07:00:00', '2021-08-10 08:00:00', '#ffffff', '#3788d8', 'admin'),
(15, 'Día de descanso', '', '2021-08-13 00:05:00', '2021-08-13 23:55:00', '#ffffff', '#3788d8', 'admin'),
(17, 'Cocinar pasta', 'Pasta Casera', '2021-08-12 12:30:00', '2021-08-12 13:00:00', '#ffffff', '#5900ff', 'giss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `clave`) VALUES
('admin', 'admin'),
('giss', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventospredefinidosusuarios`
--
ALTER TABLE `eventospredefinidosusuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `eventosusuarios`
--
ALTER TABLE `eventosusuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventospredefinidosusuarios`
--
ALTER TABLE `eventospredefinidosusuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventosusuarios`
--
ALTER TABLE `eventosusuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
