-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2016 a las 02:28:06
-- Versión del servidor: 5.5.46-0+deb8u1
-- Versión de PHP: 5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ads`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
`id_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `id_usuario`, `nombre`, `link`) VALUES
(35, 15, 'Productos', 'productos.php'),
(36, 15, 'Agregar productos a stock', 'agregar_producto_stock.php'),
(37, 15, 'Generacion Reportes', 'generar_reportes.php'),
(39, 16, 'Consulta de stock', 'consulta_stock.php'),
(40, 16, 'Facturar', 'facturar.php'),
(41, 16, 'Generacion Reportes', 'generar_reportes.php'),
(42, 16, 'Productos', 'productos.php'),
(43, 17, 'Inventario de productos', 'inventario_productos.php'),
(45, 17, 'Facturar', 'facturar.php'),
(47, 17, 'Proveedores', 'proveedores.php'),
(48, 15, 'Ingreso Proveedores', 'ingreso_proveedor.php'),
(49, 15, 'Proveedores', 'proveedores.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(11) NOT NULL,
  `codigo_barra` int(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `unidad` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `embalaje` varchar(50) NOT NULL,
  `precentacion` varchar(500) NOT NULL,
  `precio1` double NOT NULL,
  `precio2` double NOT NULL,
  `precio3` double NOT NULL,
  `precio4` double NOT NULL,
  `defecto` varchar(500) NOT NULL,
  `fecha_expi` varchar(50) NOT NULL,
  `existencias_min` varchar(20) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_barra`, `descripcion`, `unidad`, `marca`, `color`, `embalaje`, `precentacion`, `precio1`, `precio2`, `precio3`, `precio4`, `defecto`, `fecha_expi`, `existencias_min`, `categoria`, `id_proveedor`, `activo`) VALUES
(1, 1313212, 'CAMISA NIKE', '10', 'nike', 'Verde', '6y', 'PACK NIKE 44', 23, 24, 45, 34, 'Defecto 1', '12-12-20', '4', 'NiÃ±os', 3, 1),
(2, 1312314, 'PANTALONES LIVE', '8', 'live', 'cafe', 'cc', 'PACK PANTALON 5RFE', 32, 24, 32, 45, 'Defecto 1', '12-12-20', '3', 'Adolecentes', 3, 1),
(3, 2147483647, 'CALSETINES', '15', 'Nike', 'Verde', 'BB', 'GETE FE 43', 23, 43, 33, 45, 'Defecto 1', '12-12-20', '4', 'Formal', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
`id_proveedores` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
`id_sucursal` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'ORIGINAL SHOP', 'Santa Rosa', 72005416),
(2, 'TIENDA FUENTES', 'Santa Rosa', 77780054),
(3, 'VARIEDADES ALFARO', 'San miguel', 75005416);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucu_user`
--

CREATE TABLE IF NOT EXISTS `sucu_user` (
`id_sucu_user` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucu_user`
--

INSERT INTO `sucu_user` (`id_sucu_user`, `id_usuario`, `id_sucursal`) VALUES
(16, 15, 1),
(17, 15, 2),
(18, 16, 3),
(19, 3, 1),
(20, 3, 2),
(21, 3, 3),
(24, 17, 2),
(25, 17, 1),
(26, 18, 1),
(27, 18, 2),
(28, 18, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `pass`, `tipo`) VALUES
(15, 'beto', 'e10adc3949ba59abbe56e057f20f883e', 'UsuarioNormal'),
(16, 'Albert', 'e10adc3949ba59abbe56e057f20f883e', 'UsuarioNormal'),
(17, 'gaby', 'e10adc3949ba59abbe56e057f20f883e', 'UsuarioNormal'),
(18, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
 ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id_proveedores`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
 ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `sucu_user`
--
ALTER TABLE `sucu_user`
 ADD PRIMARY KEY (`id_sucu_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
MODIFY `id_proveedores` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sucu_user`
--
ALTER TABLE `sucu_user`
MODIFY `id_sucu_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
