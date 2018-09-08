-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2018 a las 06:15:42
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
  `ContraseñaWifi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `NombreCompañia` varchar(50) NOT NULL,
  `NombreContactoCompañia` int(50) NOT NULL,
  `DireccionCompañia` int(100) NOT NULL,
  `Ciudad` int(50) NOT NULL,
  `CodigoPostal` int(10) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `TelefonoCompañia` varchar(15) NOT NULL,
  `PaginaWeb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ContraseñaWifi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `DeacripcionPaquete` text NOT NULL,
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
  `Contraseña` varchar(33) NOT NULL
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
  MODIFY `Id_Cliente` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id_Empleado` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provedor`
--
ALTER TABLE `provedor`
  MODIFY `Id_Provedor` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntoacceso`
--
ALTER TABLE `puntoacceso`
  MODIFY `Id_PuntoAcceso` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `Id_Servicio` int(10) NOT NULL AUTO_INCREMENT;

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
