-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2024 a las 18:34:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `linkedhouses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `Nom-calle` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Altura` int(3) NOT NULL,
  `Nom-localidad` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,  -- Agregado un campo de ID para identificar las publicaciones
  `Localidad` VARCHAR(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo` VARCHAR(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Dni-dueño` INT(8) NOT NULL,
  `Cant-ambientes` INT(25) NOT NULL,
  `Fecha` INT(10) NOT NULL,
  `Met-pago` VARCHAR(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Condiciones` VARCHAR(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Imagen` VARCHAR(255)  COLLATE utf8mb4_spanish_ci NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(8) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contra` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mail` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DNI`, `Nombre`, `Apellido`, `Usuario`, `Contra`, `Mail`) VALUES
(46755451, 'juan cruz', 'gutierrez', 'pestuso', '1234567890', 'papanatas642@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
