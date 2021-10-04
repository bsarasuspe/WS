-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2021 a las 10:26:50
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ws`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(3) NOT NULL,
  `eposta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `galdera` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `erZ` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `er01` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `er02` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `er03` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `zailtasuna` int(1) NOT NULL,
  `gaia` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `argazkia` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `eposta`, `galdera`, `erZ`, `er01`, `er02`, `er03`, `zailtasuna`, `gaia`, `argazkia`) VALUES
(2, 'bsarasua@ehu.eus', 'aaaaaaaaaaaaaaaa', 'aa', 'aa', 'aa', 'aa', 1, 'aa', NULL),
(3, '', '', '', '', '', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `eposta` varchar(254) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `izenabizenak` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pasahitza` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `argazkia` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`eposta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
