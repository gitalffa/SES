-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-08-2019 a las 04:17:54
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siempree_seguro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL COMMENT 'id de entrada',
  `idMas` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Identificador individual',
  `password` text COLLATE utf8_spanish2_ci NOT NULL,
  `passcollar` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre Mascota',
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'direccion Propietario',
  `conEme1` text COLLATE utf8_spanish2_ci NOT NULL,
  `celEme1` text COLLATE utf8_spanish2_ci NOT NULL,
  `corEme1` text COLLATE utf8_spanish2_ci NOT NULL,
  `conEme2` text COLLATE utf8_spanish2_ci NOT NULL,
  `celEme2` text COLLATE utf8_spanish2_ci NOT NULL,
  `corEme2` text COLLATE utf8_spanish2_ci NOT NULL,
  `conEme3` text COLLATE utf8_spanish2_ci NOT NULL,
  `celEme3` text COLLATE utf8_spanish2_ci NOT NULL,
  `corEme3` text COLLATE utf8_spanish2_ci NOT NULL,
  `propietario` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre Propietario',
  `raza` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Raza de la mascota',
  `color` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'color de la mascota',
  `edad` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'edad de la mascota',
  `talla` float NOT NULL COMMENT 'talla de la mascota',
  `medVete` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre medico veterinario',
  `celMedVete` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'celular medico veterinario',
  `padecimientos` text COLLATE utf8_spanish2_ci NOT NULL,
  `peso` float NOT NULL COMMENT 'peso',
  `foto` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Url de la foto de la persona',
  `observaciones` text COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `idMas`, `password`, `passcollar`, `nombre`, `direccion`, `conEme1`, `celEme1`, `corEme1`, `conEme2`, `celEme2`, `corEme2`, `conEme3`, `celEme3`, `corEme3`, `propietario`, `raza`, `color`, `edad`, `talla`, `medVete`, `celMedVete`, `padecimientos`, `peso`, `foto`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'M1001', 'M1001', '1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, '../images/mascotas/M1001foto.jpeg', '', '2019-08-20 21:43:48', '2019-08-22 04:05:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de entrada', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
