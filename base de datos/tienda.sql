-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2015 a las 03:31:41
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `IDJUEGO` int(10) NOT NULL,
  `TIEMPO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID` int(10) NOT NULL,
  `DESCRIPCION` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `CEDULA` decimal(10,0) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `APELLIDO` varchar(50) DEFAULT NULL,
  `TELEFONO` decimal(10,0) DEFAULT NULL,
  `USER` varchar(15) NOT NULL,
  `PASS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE IF NOT EXISTS `juego` (
`IDJUEGO` int(10) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `CANTIDAD` decimal(10,0) DEFAULT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  `PLATAFORMA` varchar(50) DEFAULT NULL,
  `IMAGEN` varchar(100) DEFAULT NULL,
  `VIDEO` varchar(20) NOT NULL,
  `IDCATEGORIA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
`IDPRESTAMO` int(10) NOT NULL,
  `FECHA1` date DEFAULT NULL,
  `FECHA2` date NOT NULL,
  `PAGO` decimal(10,2) DEFAULT NULL,
  `IDCLIENTE` decimal(10,0) DEFAULT NULL,
  `IDJUEGO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`CEDULA`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
 ADD PRIMARY KEY (`IDJUEGO`), ADD KEY `FK` (`IDCATEGORIA`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
 ADD PRIMARY KEY (`IDPRESTAMO`), ADD KEY `IDCLIENTE` (`IDCLIENTE`), ADD KEY `IDJUEGO` (`IDJUEGO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
MODIFY `IDJUEGO` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
MODIFY `IDPRESTAMO` int(10) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
ADD CONSTRAINT `FK` FOREIGN KEY (`IDCATEGORIA`) REFERENCES `categoria` (`ID`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`IDCLIENTE`) REFERENCES `cliente` (`CEDULA`),
ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`IDJUEGO`) REFERENCES `juego` (`IDJUEGO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
