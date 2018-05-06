-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2018 a las 20:13:03
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siawiiver`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_Cliente` int(10) NOT NULL,
  `Id_PuntoAcceso` int(10) NOT NULL,
  `NombreCliente` varchar(100) NOT NULL,
  `DireccionCliente` varchar(100) NOT NULL,
  `Localidad` varchar(20) NOT NULL,
  `Municipio` varchar(20) NOT NULL,
  `TelefonoCliente` varchar(15) NOT NULL,
  `Referencia` varchar(100) NOT NULL,
  `ContrasenaWifi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Id_PuntoAcceso`, `NombreCliente`, `DireccionCliente`, `Localidad`, `Municipio`, `TelefonoCliente`, `Referencia`, `ContrasenaWifi`) VALUES
(21, 1, 'salvador', '', '', '', '', 'khiuhi', 'kkh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza` (
  `Id_Cobranza` int(10) NOT NULL,
  `Id_Servicio` int(10) NOT NULL,
  `MesPago` varchar(15) NOT NULL,
  `EstadoPago` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleservicio`
--

CREATE TABLE `detalleservicio` (
  `Id_DetalleServicio` int(10) NOT NULL,
  `Id_Servicio` int(10) NOT NULL,
  `Id_Producto` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `PrecioTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id_Empleado` int(10) NOT NULL,
  `NombreEmpleado` varchar(50) NOT NULL,
  `DireccionEmpleado` varchar(100) NOT NULL,
  `TelefonoEmpleado` varchar(15) NOT NULL,
  `Puesto` varchar(15) NOT NULL,
  `Honorario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Id_Empleado`, `NombreEmpleado`, `DireccionEmpleado`, `TelefonoEmpleado`, `Puesto`, `Honorario`) VALUES
(1, 'baldomero reyes alvarez', 'san jose neria municipio chocaman', '', '', 0),
(2, 'baldomero reyes alvarez', 'san jose neria municipio chocaman', '', '', 0),
(3, 'baldomero reyes alvarez', 'san jose neria municipio chocaman', '', '', 0),
(4, 'baldomero reyes alvarez', 'san jose neria municipio chocaman', '', '', 0),
(5, 'baldomero reyes alvarez', 'san jose neria municipio chocaman', 'baldomero reyes', 'baldomero reyes', 0),
(6, 'baldomero reyes alvarez', 'san jose neria municipio chocaman', '2731228603', 'tecnico', 1250),
(7, 'baldomero reyes alvarez', 'san jose neria municipio chocaman', '2731228603', 'tecnico', 1250),
(8, 'pedro', '', '', '', 0),
(9, 'eretgrte', '', '', '', 0),
(10, 'BALDOMERO REYES ALVAREZ', 'SAN JOSE NERIA', '2731228603', 'TECNICO', 2586),
(11, 'jorge', '', '', '', 5200),
(12, 'DANIEL MURILLO ORTIZ', 'IXHUATLAN DEL CAFE', '2784512690', 'TECNICO', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(10) NOT NULL,
  `Id_Provedor` int(10) NOT NULL,
  `NombreProducto` varchar(50) NOT NULL,
  `CantidadUnidad` int(10) NOT NULL,
  `PrecioUnidad` float NOT NULL,
  `UnidadAlmacen` int(10) NOT NULL,
  `UnidadServicio` int(10) NOT NULL,
  `ReordenarNivel` int(10) NOT NULL,
  `Terminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedor`
--

CREATE TABLE `provedor` (
  `Id_Provedor` int(10) NOT NULL,
  `NombreCompania` varchar(50) NOT NULL,
  `NombreContactoCompania` varchar(50) NOT NULL,
  `DireccionCompania` varchar(100) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `CodigoPostal` int(10) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `TelefonoCompania` varchar(15) NOT NULL,
  `PaginaWeb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provedor`
--

INSERT INTO `provedor` (`Id_Provedor`, `NombreCompania`, `NombreContactoCompania`, `DireccionCompania`, `Ciudad`, `CodigoPostal`, `Pais`, `TelefonoCompania`, `PaginaWeb`) VALUES
(1, 'DECME', '', '', '', 0, '', '', ''),
(2, 'COMPUCELL', 'KJBJ', '', '', 0, '', '', ''),
(3, 'COMPUCELL', 'sirjioeurhiekjr', 'iwuehiue', 'jwhyew', 85964, 'MÃ©xico', '5289445212', 'WWW.DECME.COM'),
(4, 'DECME', '', '', '', 2147483647, '', '', ''),
(5, 'STEREN', 'JORGE RODRIGUEZ CAMPUZANO', 'CALLE 3 ENTRE AV 2 Y 3', 'CORDOBA', 94500, 'MÃ©xico', '273 125 25 21', 'WWW.STEREN.COM.MX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoacceso`
--

CREATE TABLE `puntoacceso` (
  `Id_PuntoAcceso` int(10) NOT NULL,
  `NombrePuntoAcceso` varchar(100) NOT NULL,
  `Ubicacion` varchar(150) NOT NULL,
  `NombreContacto` varchar(100) NOT NULL,
  `TelefonoPuntoAcceso` varchar(15) NOT NULL,
  `DireccionMac` varchar(25) NOT NULL,
  `ContrasenaWifi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntoacceso`
--

INSERT INTO `puntoacceso` (`Id_PuntoAcceso`, `NombrePuntoAcceso`, `Ubicacion`, `NombreContacto`, `TelefonoPuntoAcceso`, `DireccionMac`, `ContrasenaWifi`) VALUES
(1, 'PALMAS', '', '', '', '', ''),
(2, 'PALMAS', 'CHOCAMAN', 'JORGE', '2714589748', 'sD:23:', 'SKJDBSK546546'),
(3, 'neria', '', '', '', '', ''),
(4, 'kjsdj', 'kjere', 'erjier', '4546535', 'jjfjyfuew', ''),
(5, 'kjsdj', 'kjere', 'erjier', '4546535', 'jjfjyfuew', ''),
(6, 'lhkulhgvjhb ', 'norte', 'jhvh', '65465', '', 'jhghujgfjtf'),
(7, 'TOMATLAN', 'COLONIA MORELOS', 'ESTEBAN JIMENEZ CORTEZ', '2711224589', 'AS:D4:SD:4D:4D:5F', 'SOLOGORE995566');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `Id_Servicio` int(10) NOT NULL,
  `Id_Empleado` int(10) NOT NULL,
  `Id_Cliente` int(10) NOT NULL,
  `TipoPaquete` varchar(15) NOT NULL,
  `PrecioPaquete` float NOT NULL,
  `DescripcionPaquete` text NOT NULL,
  `TipoServicio` varchar(50) NOT NULL,
  `PrecioServicio` float NOT NULL,
  `DescripcionServicio` text NOT NULL,
  `FormaPago` varchar(10) NOT NULL,
  `FechaServicio` date NOT NULL,
  `BajaServicio` date NOT NULL,
  `EstadoServicio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(10) NOT NULL,
  `Id_Empleado` int(10) NOT NULL,
  `Rol` varchar(15) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Contrasena` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `fk_Id_PuntoAcceso` (`Id_PuntoAcceso`);

--
-- Indices de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD PRIMARY KEY (`Id_Cobranza`),
  ADD KEY `fk_Id_Servicio` (`Id_Servicio`);

--
-- Indices de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD PRIMARY KEY (`Id_DetalleServicio`),
  ADD KEY `fk_Id_Servicio2` (`Id_Servicio`),
  ADD KEY `fk_Id_Producto` (`Id_Producto`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `fk_Id_Provedor` (`Id_Provedor`);

--
-- Indices de la tabla `provedor`
--
ALTER TABLE `provedor`
  ADD PRIMARY KEY (`Id_Provedor`);

--
-- Indices de la tabla `puntoacceso`
--
ALTER TABLE `puntoacceso`
  ADD PRIMARY KEY (`Id_PuntoAcceso`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`Id_Servicio`),
  ADD KEY `fk_Id_Cliente` (`Id_Cliente`),
  ADD KEY `fk_Id_Empleado` (`Id_Empleado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `fk_Id_Empleado2` (`Id_Empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_Cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  MODIFY `Id_Cobranza` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  MODIFY `Id_DetalleServicio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `provedor`
--
ALTER TABLE `provedor`
  MODIFY `Id_Provedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `puntoacceso`
--
ALTER TABLE `puntoacceso`
  MODIFY `Id_PuntoAcceso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `Id_Servicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Id_PuntoAcceso` FOREIGN KEY (`Id_PuntoAcceso`) REFERENCES `puntoacceso` (`Id_PuntoAcceso`);

--
-- Filtros para la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD CONSTRAINT `fk_Id_Servicio` FOREIGN KEY (`Id_Servicio`) REFERENCES `servicio` (`Id_Servicio`);

--
-- Filtros para la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD CONSTRAINT `fk_Id_Producto` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`),
  ADD CONSTRAINT `fk_Id_Servicio2` FOREIGN KEY (`Id_Servicio`) REFERENCES `servicio` (`Id_Servicio`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Id_Provedor` FOREIGN KEY (`Id_Provedor`) REFERENCES `provedor` (`Id_Provedor`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_Id_Cliente` FOREIGN KEY (`Id_Cliente`) REFERENCES `cliente` (`Id_Cliente`),
  ADD CONSTRAINT `fk_Id_Empleado` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleado` (`Id_Empleado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Id_Empleado2` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleado` (`Id_Empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
