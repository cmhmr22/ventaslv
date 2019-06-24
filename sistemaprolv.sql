-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2017 a las 04:59:36
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaprolv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(1) NOT NULL,
  `NombreEmpresa` text NOT NULL,
  `Url` text NOT NULL,
  `CorreoContacto` varchar(100) NOT NULL,
  `ColorTheme` varchar(50) NOT NULL,
  `HeaderTheme` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 Light, 0 Dark'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `NombreEmpresa`, `Url`, `CorreoContacto`, `ColorTheme`, `HeaderTheme`) VALUES
(0, 'DygiTec', 'http://localhost/plantillalv', 'y.pinzonf@gmail.com', 'themes/spring.css', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `padre` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `padre`, `nombre`) VALUES
(0, 0, 'PANEL DE CONTROL (Uso unicamente Admin)'),
(1, 0, 'USUARIO'),
(2, 1, 'Crear Usuarios'),
(3, 1, 'Modificar Usuarios'),
(4, 1, 'Eliminar Usuarios del sistema'),
(5, 1, 'Ver lista de usuarios'),
(6, 1, 'Suspender a usuario'),
(7, 1, 'Asignar Privilegios a Usuarios (Importante!)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_usuario_privilegio`
--

CREATE TABLE `rel_usuario_privilegio` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPrivilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_usuario_privilegio`
--

INSERT INTO `rel_usuario_privilegio` (`id`, `idUsuario`, `idPrivilegio`) VALUES
(21, 6, 2),
(22, 6, 3),
(23, 6, 4),
(109, 2, 2),
(110, 2, 3),
(111, 2, 4),
(112, 2, 5),
(113, 2, 6),
(114, 2, 7),
(115, 1, 0),
(116, 1, 1),
(117, 1, 2),
(118, 1, 3),
(119, 1, 4),
(120, 1, 5),
(121, 1, 6),
(122, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `bajalogica` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 Alta actualmente, 0 dado de baja',
  `Updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `usuario`, `pass`, `bajalogica`, `Updated_at`, `Created_at`) VALUES
(1, 'y.pinzonf@gmail.com', 'yassir', 'eyJpdiI6ImxNOXZtOUNwd01qSFJ1amQ4XC8wUlhnPT0iLCJ2YWx1ZSI6IjNHckRhcEN1NTdLZGRPNUpwNlFkT0E9PSIsIm1hYyI6ImYyM2JkNWZiNWIyNjZkOWNiOTYyMWNkMjY1MjcxZWJlOGY2M2I3Y2ZlMWIwMDUwNGNiNTczYzcxZDI3Mjk4MmMifQ==', 1, '2017-11-01 06:19:18', '2017-10-24 04:32:43'),
(2, 'y.pinzonf@gmail.com22', '12345', 'eyJpdiI6IjNhNFBBa25kUTgyYm1yZnZ0UFwvR21BPT0iLCJ2YWx1ZSI6Ijh0RlJVcEJ5SDJxdVg0SlpLQUYxNmc9PSIsIm1hYyI6ImJkYjc0OWVhZjA1ZTYxMDdkNjA3ZTg0NTA4MmJjYmM1YWM0YjRmMTU3MjQyZjNlOWU1NTlkZWVkN2UyMzM5MGYifQ==', 1, '2017-11-01 05:11:47', '2017-10-30 10:50:00'),
(4, 'y.pinzonf@gmail.com2', '159159', 'eyJpdiI6IlwvWmVmV0YzMm5LZFJvV2ZXb1Nxb0RRPT0iLCJ2YWx1ZSI6Imp5U0NRemlFZ2UwWGllTHFBTzZkXC9RPT0iLCJtYWMiOiI3Mjk5YWI5YjU5NGFjMTUzMzE1OGNjNTZkMjUzOGI1MWIwMzgxMWRkYjhmNDM1MjdkYmYzNzllOWQwNDVkYThkIn0=', 3, '2017-10-31 02:49:26', '2017-10-30 10:52:57'),
(5, 'y.pinzonf@gmail.com23', '1591598', 'eyJpdiI6IlBzVHJTMExBWjdwNVFSV1U3Q3llUGc9PSIsInZhbHVlIjoiYlBNUkY5clI5WFVET2dlZzAxNDh5UT09IiwibWFjIjoiZWFlZjY2ZTRiODEyNjBkN2M2Y2JjNDFkNmU3MTQ2MThjY2UxNjE2NThmNWIxMmNkYzhmOGIwNTFkM2ZjNDAyMyJ9', 3, '2017-10-31 02:52:48', '2017-10-30 10:56:08'),
(6, 'ros.giovana@gmail.com', 'rosagiovana', 'eyJpdiI6Imx2em54cWhrTEhkNk04WHd3R3Nxc1E9PSIsInZhbHVlIjoiY1pTakJEOGhsdUtkWGNQa1gxZEpTZz09IiwibWFjIjoiY2FhYzBkMTRlMzQ3ZTlkYTNjNjNjMTI2ZTFjOTc2MDliZTAzOWY2NTBiYTMwMjc4Mzc3NDYzMWU0ZWY5NGQ4ZiJ9', 1, '2017-11-01 05:03:27', '2017-10-31 06:06:11'),
(7, 'y.pinzonf@gmail.com3', 'yass', 'eyJpdiI6IllpTzk1YU1NV0dORmxsZWtVbVJWR3c9PSIsInZhbHVlIjoiRGNiRmJoVzZISUtBcVhVT0JrU05Hdz09IiwibWFjIjoiNGY5NmQ0YmIyNTlhOTA1MzA0NGQ5Mjg5MjI2NWFlZDljZmU5NWExZDEzNDZjYzBjMmY4YmI4MmUwNzk0NWQxMyJ9', 1, '2017-11-01 11:21:03', '2017-10-31 06:29:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DefinicionPadresExistentes` (`padre`);

--
-- Indices de la tabla `rel_usuario_privilegio`
--
ALTER TABLE `rel_usuario_privilegio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clvForaneausuario` (`idUsuario`),
  ADD KEY `clvForaneaprivilegio` (`idPrivilegio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rel_usuario_privilegio`
--
ALTER TABLE `rel_usuario_privilegio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD CONSTRAINT `DefinicionPadresExistentes` FOREIGN KEY (`padre`) REFERENCES `privilegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_usuario_privilegio`
--
ALTER TABLE `rel_usuario_privilegio`
  ADD CONSTRAINT `clvForaneaprivilegio` FOREIGN KEY (`idPrivilegio`) REFERENCES `privilegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clvForaneausuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
