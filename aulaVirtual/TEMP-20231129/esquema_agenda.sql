-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 14:03:35
-- Versión del servidor: 10.4.24-MariaDB-log
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_categorias`
--

CREATE TABLE `agenda_categorias` (
  `CATEGORIA_ID` int(11) NOT NULL,
  `CATEGORIA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agenda_categorias`
--

INSERT INTO `agenda_categorias` (`CATEGORIA_ID`, `CATEGORIA`) VALUES
(1, 'DEPORTES'),
(2, 'TEATRO'),
(3, 'CONCIERTOS'),
(4, 'INFANTIL'),
(5, 'TALLERES'),
(6, 'FIESTAS'),
(7, 'EXPOSICIONES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_entidades`
--

CREATE TABLE `agenda_entidades` (
  `ENTIDAD_ID` int(11) NOT NULL,
  `ENTIDAD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agenda_entidades`
--

INSERT INTO `agenda_entidades` (`ENTIDAD_ID`, `ENTIDAD`) VALUES
(1, 'TEADRO ROMEA'),
(2, 'TEATRO CIRCO'),
(3, 'CONSEJERIA EDUCACION'),
(4, 'AYUNTAMIENTO MURCIA'),
(5, 'PLAZA DE TOROS'),
(6, 'SALA REM'),
(7, 'REAL MURCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_eventos`
--

CREATE TABLE `agenda_eventos` (
  `EVENTO_ID` int(11) NOT NULL,
  `EVENTO` varchar(50) DEFAULT NULL,
  `ENTIDAD_ID` int(11) DEFAULT NULL,
  `CATEGORIA_ID` int(11) DEFAULT NULL,
  `UBICACION` varchar(50) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agenda_eventos`
--

INSERT INTO `agenda_eventos` (`EVENTO_ID`, `EVENTO`, `ENTIDAD_ID`, `CATEGORIA_ID`, `UBICACION`, `FECHA`, `HORA`) VALUES
(2, 'Presentacion Feria Murcia', 5, 6, 'Sala Veronicas', '2017-01-01', '17:00:00'),
(3, 'Final Mundial', 1, 5, 'PLAZA CIRCULAR', '2023-12-20', '17:00:00'),
(5, 'U2', 4, 2, 'VICTOR VILLEGAS', '2023-11-20', '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_usuarios`
--

CREATE TABLE `agenda_usuarios` (
  `USUARIO_ID` int(11) NOT NULL,
  `USUARIO` varchar(10) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agenda_usuarios`
--

INSERT INTO `agenda_usuarios` (`USUARIO_ID`, `USUARIO`, `PASSWORD`) VALUES
(1, 'fernando', 'fernando');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda_categorias`
--
ALTER TABLE `agenda_categorias`
  ADD PRIMARY KEY (`CATEGORIA_ID`);

--
-- Indices de la tabla `agenda_entidades`
--
ALTER TABLE `agenda_entidades`
  ADD PRIMARY KEY (`ENTIDAD_ID`);

--
-- Indices de la tabla `agenda_eventos`
--
ALTER TABLE `agenda_eventos`
  ADD PRIMARY KEY (`EVENTO_ID`),
  ADD KEY `fkagenda_categorias` (`CATEGORIA_ID`),
  ADD KEY `fkagenda_entidades` (`ENTIDAD_ID`);

--
-- Indices de la tabla `agenda_usuarios`
--
ALTER TABLE `agenda_usuarios`
  ADD PRIMARY KEY (`USUARIO_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda_categorias`
--
ALTER TABLE `agenda_categorias`
  MODIFY `CATEGORIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `agenda_entidades`
--
ALTER TABLE `agenda_entidades`
  MODIFY `ENTIDAD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `agenda_eventos`
--
ALTER TABLE `agenda_eventos`
  MODIFY `EVENTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `agenda_usuarios`
--
ALTER TABLE `agenda_usuarios`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda_eventos`
--
ALTER TABLE `agenda_eventos`
  ADD CONSTRAINT `fkagenda_categorias` FOREIGN KEY (`CATEGORIA_ID`) REFERENCES `agenda_categorias` (`CATEGORIA_ID`),
  ADD CONSTRAINT `fkagenda_entidades` FOREIGN KEY (`ENTIDAD_ID`) REFERENCES `agenda_entidades` (`ENTIDAD_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
