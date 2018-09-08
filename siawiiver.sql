-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2018 a las 23:43:35
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

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
  `Referencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Id_PuntoAcceso`, `NombreCliente`, `DireccionCliente`, `Localidad`, `Municipio`, `TelefonoCliente`, `Referencia`) VALUES
(1, 9, 'CALIXTO DANTE', 'COL. CENTRO', 'HUATUSCO', 'HUATUSCO,VER', '522731246576', 'REFERENCIA'),
(2, 9, 'CAMELIA DAVILA', 'COL. CENTRO', 'HUATUSCO', 'HUATUSCO,VER', '522731277665', 'REFERENCIA'),
(3, 10, 'CAMILA GARRIDO', 'COL. ACATEPEC', 'HUATUSCO', 'HUATUSCO,VER', '522731263212', 'REFERENCIA'),
(4, 10, 'CANDIDO RODRIGUEZ', 'COL. ACATEPEC', 'HUATUSCO', 'HUATUSCO,VER', '522731235467', 'REFERENCIA'),
(5, 11, 'CARIDAD GIMENEZ', 'COL. RESERVA', 'HUATUSCO', 'HUATUSCO,VER', '522731257686', 'REFERENCIA'),
(6, 11, 'CARINA ARIAS', 'COL. RESERVA', 'HUATUSCO', 'HUATUSCO,VER', '522731244334', 'REFERENCIA'),
(7, 12, 'CARLOS FUENTES', 'COL. CENTENARIO', 'HUATUSCO', 'HUATUSCO,VER', '522731265676', 'REFERENCIA'),
(8, 12, 'CARLA FERNANDEZ', 'COL. CENTENARIO', 'HUATUSCO', 'HUATUSCO,VER', '522731296754', 'REFERENCIA'),
(9, 13, 'CARMELO SANCHEZ', 'COL. 2 DE NOVIEMBRE', 'HUATUSCO', 'HUATUSCO,VER', '522731213243', 'REFERENCIA'),
(10, 13, 'CARMEN DA SILVA', 'COL. 2 DE NOVIEMBRE', 'HUATUSCO', 'HUATUSCO,VER', '522731253567', 'REFERENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza` (
  `Id_Cobranza` int(10) NOT NULL,
  `Id_Servicio` int(10) NOT NULL,
  `MesPago` varchar(15) NOT NULL,
  `AnoPago` int(5) NOT NULL,
  `Servicio` float NOT NULL COMMENT 'Precio por el sevicio mensual',
  `OtrosCargos` float NOT NULL COMMENT 'Cantidad de cargos adicionales',
  `EstadoPago` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cobranza`
--

INSERT INTO `cobranza` (`Id_Cobranza`, `Id_Servicio`, `MesPago`, `AnoPago`, `Servicio`, `OtrosCargos`, `EstadoPago`) VALUES
(6, 1, 'ENERO', 2018, 350, 0, 'PAGADO'),
(7, 1, 'FEBRERO', 2018, 350, 0, 'PAGADO'),
(8, 1, 'MARZO', 2018, 350, 0, 'PAGADO'),
(9, 1, 'ABRIL', 2018, 350, 0, 'VENCIDO'),
(10, 1, 'MAYO', 2018, 350, 0, 'PAGADO'),
(11, 1, 'JUNIO', 2018, 350, 0, 'VENCIDO'),
(12, 1, 'JULIO', 2018, 350, 0, 'PAGADO'),
(13, 1, 'AGOSTO', 2018, 350, 200, 'VENCIDO'),
(14, 2, 'ENERO', 2018, 450, 100, 'PAGADO');

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

--
-- Volcado de datos para la tabla `detalleservicio`
--

INSERT INTO `detalleservicio` (`Id_DetalleServicio`, `Id_Servicio`, `Id_Producto`, `Cantidad`, `PrecioTotal`) VALUES
(7, 1, 1, 1, 0),
(8, 1, 2, 2, 0),
(9, 1, 3, 3, 0),
(10, 1, 4, 4, 0),
(11, 1, 2, 8, 0),
(12, 1, 2, 5, 175),
(13, 1, 1, 1, 50),
(14, 1, 2, 1, 35),
(15, 1, 2, 4, 140);

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
(14, 'AARON MENDEZ', ' INDEPENDENCIA NO. 241', '5227352781', 'COBRANZA', 7000),
(15, 'ABEL LUNA', 'AV. INDEPENDENCIA NO. 779', '5227350017', 'TECNICO', 6000),
(16, 'ABELARDO HERNANDEZ', 'AV. 20 DE NOVIEMBRE NO.1024', '5227354273', 'TECNICO', 6000),
(17, 'ABIGAIL ROMERO', 'AV. 20 DE NOVIEMBRE NO. 1060', '5227351417', 'ADMINISTRADOR', 8000),
(18, 'ABRAHAM GONZALES', 'AV. 20 DE NOVIEMBRE NO.859-B', '5227353932', 'TECNICO', 6000),
(19, 'ABRIL VELASQUEZ', 'AV. 20 DE NOVIEMBRE NO 1053', '5227353188', 'TECNICO', 6000),
(20, 'ADA LOPEZ', 'AV. INDEPENDENCIA NO. 545', '5227353832', 'TECNICO', 6000),
(21, 'ADALBERTO RIVERA', 'AV. INDEPENDENCIA NO. 1282-A', '5227350605', 'COBRANZA', 7000),
(22, 'ADAN PEREZ', 'AV.INDEPENDENCIA NO.1010', '5227353832', 'TECNICO', 6000),
(23, 'ADELA PERALTA', 'AV. 5 DE MAYO NO. 1652', '5227353746', 'TECNICO', 6000);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `factura`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `factura` (
`NombreCliente` varchar(100)
,`CantidadProductos` decimal(32,0)
,`TotalServicio` double
);

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

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Id_Provedor`, `NombreProducto`, `CantidadUnidad`, `PrecioUnidad`, `UnidadAlmacen`, `UnidadServicio`, `ReordenarNivel`, `Terminado`) VALUES
(1, 7, 'PAQ. 5M CABLE UTP CAT.5 ', 98, 50, 0, 0, 0, 0),
(2, 7, 'PAQ. 5M CABLE UTP CAT.3', 230, 35, 0, 0, 0, 0),
(3, 9, 'MODEM TECHNICOLOR TG7800', 12, 375, 0, 0, 0, 0),
(4, 9, 'MODEM TECHNICOLOR TG5000', 6, 250, 0, 0, 0, 0);

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
(7, 'TECNORED', 'ANA MENDOZA', 'AV. HIDALGO 23', 'PUEBLA', 95343, 'MEXICO', '522838505467', 'WWW.TECNORED.COM.MX'),
(8, 'MEGATEC', 'VALENTINA RUIZ', 'AV. TLAHUAC 44', 'YUCATAN', 96434, 'MEXICO', '525464783355', 'WWW.MEGATEC.COM.MX'),
(9, 'CISCO', 'VICENTE FOX', 'AV. SAN FRANCISCO', 'VERACRUZ', 43455, 'MEXICO', '526789542456', 'WWW.CISCO.COM.MX'),
(10, 'POWER', 'ENRIQUE PEÑA', 'AV. DIAZ MIRON', 'CHIAPAS', 85756, 'MEXICO', '5254689075786', 'WWW.POWER.COM.MX'),
(11, 'PRODMAX', 'ROGELIO JACOME', 'AV. TLALTENCO', 'CDMX', 34234, 'MEXICO', '524678976568', 'WWW.PRODMAX.COM.MX');

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
(9, 'PA_ZONA_1', 'COL. CENTRO, HUATUSCO, VER', 'JUAN VELASQUEZ', '522731195766', '10:34:54:65:78:98', 'KFHE8672'),
(10, 'PA_ZONA_2', 'COL. ACATEPEC, HUATUSCO, VER', 'ARTURO RODRIGUEZ', '522731220933', '10:98:43:25:98:00', 'PFJE4758'),
(11, 'PA_ZONA_3', 'COL. RESERVA, HUATUSCO, VER', 'CARLOS MONTIEL', '522731219873', '10:11:37:32:59:37', 'HRYD7365'),
(12, 'PA_ZONA_4', 'COL. CENTENARIO, HUATUSCO, VER', 'PABLO PAEZ', '522731253839', '10:69:27:54:70:43', 'RKDM2857'),
(13, 'PA_ZONA_5', 'COL. 2 DE NOVIEMBRE, HUATUSCO, VER', 'ANDRES OBRADOR', '522731203948', '10:19:43:53:68:74', 'MSJF9283');

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

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`Id_Servicio`, `Id_Empleado`, `Id_Cliente`, `TipoPaquete`, `PrecioPaquete`, `DescripcionPaquete`, `TipoServicio`, `PrecioServicio`, `DescripcionServicio`, `FormaPago`, `FechaServicio`, `BajaServicio`, `EstadoServicio`) VALUES
(1, 14, 1, 'BASICO', 350, 'PAQUETE BASICO, INTERNET 20 MB', 'INSTALACION', 200, 'INSTALACION NORMAL', 'EFECTIVO', '2018-08-10', '0000-00-00', 'ACTIVO'),
(2, 15, 2, 'INTERMEDIO', 450, 'PAQUETE INTERMEDIO, 30 MB', 'INSTALACION', 200, 'SERVICIO DE INSTALACION', 'EFECTIVO', '2018-08-08', '0000-00-00', 'ACTIVO');

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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Id_Empleado`, `Rol`, `NombreUsuario`, `Contrasena`) VALUES
(8, 14, 'ADMINISTRADOR', 'amendez', 'c4ca4238a0b923820dcc509a6f75849b'),
(9, 15, 'COBRANZA', 'aluna', 'c81e728d9d4c2f636f067f89cc14862c'),
(10, 16, 'TECNICO', 'ahernandez', 'eccbc87e4b5ce2fe28308fd9f2a7baf3');

-- --------------------------------------------------------

--
-- Estructura para la vista `factura`
--
DROP TABLE IF EXISTS `factura`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `factura`  AS  select `cl`.`NombreCliente` AS `NombreCliente`,sum(`ds`.`Cantidad`) AS `CantidadProductos`,((sum(`ds`.`PrecioTotal`) + `se`.`PrecioPaquete`) + `se`.`PrecioServicio`) AS `TotalServicio` from (((`cliente` `cl` join `producto` `pr`) join `servicio` `se`) join `detalleservicio` `ds`) where ((`ds`.`Id_Servicio` = `se`.`Id_Servicio`) and (`se`.`Id_Cliente` = `cl`.`Id_Cliente`) and (`ds`.`Id_Producto` = `pr`.`Id_Producto`)) ;

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
  MODIFY `Id_Cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  MODIFY `Id_Cobranza` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  MODIFY `Id_DetalleServicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provedor`
--
ALTER TABLE `provedor`
  MODIFY `Id_Provedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `puntoacceso`
--
ALTER TABLE `puntoacceso`
  MODIFY `Id_PuntoAcceso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `Id_Servicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
