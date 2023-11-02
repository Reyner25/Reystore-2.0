-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 18:57:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reystore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hombre`
--

CREATE TABLE `hombre` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Talla` int(5) NOT NULL,
  `Imagen` varchar(1000) NOT NULL,
  `Precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hombre`
--

INSERT INTO `hombre` (`Id`, `Nombre`, `Talla`, `Imagen`, `Precio`) VALUES
(14, 'Zapato1', 40, 'pngtree-cartoon-clown-png-image_2952449 - copia.jpg', 0),
(15, 'Zapato 2', 39, 'imagen de prueba-Reystore.jpg', 0),
(16, 'Zapato 2', 40, 'imagen de prueba-Reystore.jpg', 0),
(17, 'Zapato ojo', 39, 'ojo de prueba.jpg', 500000),
(18, 'Zapato corazon', 38, 'Corazon en el desierto.jpg', 450000),
(19, 'The Travis Scott x Air Jordan 1 Retro High OG', 40, 'The Travis Scott x Air Jordan 1 Retro High OG.jpg', 500),
(0, 'Air Force One', 36, 'Air Force One.jpg', 600),
(0, 'Zapato mujer 10', 36, 'zapatoMujer 1.jpg', 600000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mujer`
--

CREATE TABLE `mujer` (
  `Id` int(10) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Talla` varchar(8) NOT NULL,
  `Imagen` varchar(1000) NOT NULL,
  `Precio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mujer`
--

INSERT INTO `mujer` (`Id`, `Nombre`, `Talla`, `Imagen`, `Precio`) VALUES
(4, 'Zapato mujer 10', '37', 'zapatoMujer 1.jpg', 530850),
(5, 'mujer deportivo', '37', 'calzado-de-caminata-motiva-ZfZQm6.jpg', 600000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mujer`
--
ALTER TABLE `mujer`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mujer`
--
ALTER TABLE `mujer`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
