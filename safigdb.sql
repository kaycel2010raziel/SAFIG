-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2021 a las 16:28:49
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `safig`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_acceso`
--

CREATE TABLE `area_acceso` (
  `idarea_acceso` int(11) NOT NULL,
  `user_id` varchar(75) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `area_id` varchar(75) NOT NULL,
  `result` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `iddescuento` int(11) NOT NULL,
  `valor` double(8,2) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkproducto_farmacia` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `idpadre` int(11) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `descripcion`, `nombre`, `idpadre`, `fecha_hora`) VALUES
(1, 'GENERAL_ESTATUS', 'GENERAL_ESTATUS', 0, '2021-08-17 17:47:59'),
(2, 'ACTIVO', 'ACTIVO', 1, '2021-08-17 17:49:15'),
(3, 'INACTIVO', 'INACTIVO', 1, '2021-08-17 17:49:15'),
(4, 'ELIMINADO', 'ELIMINADO', 1, '2021-08-17 17:50:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacia`
--

CREATE TABLE `farmacia` (
  `idfarmacia` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkmunicipio` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `idlaboratorio` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(75) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkmunicipio` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_access`
--

CREATE TABLE `login_access` (
  `idaccess` int(11) NOT NULL,
  `user_id` varchar(75) NOT NULL,
  `remote_ip` varchar(75) NOT NULL,
  `status` int(11) NOT NULL,
  `login_string` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login_access`
--

INSERT INTO `login_access` (`idaccess`, `user_id`, `remote_ip`, `status`, `login_string`) VALUES
(1, '1', '0', 0, '0000'),
(2, '0', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(3, '0', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(4, '0', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(5, '0', '::1', 3, ''),
(6, 'mgonzalez@gmail.com', '::1', 4, ''),
(7, '0', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(8, '1', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(9, '1', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(10, '1', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(11, '1', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(12, '1', '::1', 1, 'f733cfe26e7a6ed723abd4a53bba470ce297cc834470d20c7f5e9fd1ab17ff34a573d8a964d1f0aaca517a1a17541c4b9a02bfb744d54d14d0e09673999d7dfb'),
(13, 'prueba@gmail.com', '::1', 4, ''),
(14, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(15, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(16, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(17, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(18, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(19, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(20, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(21, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idmunicipio` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `fkdepartamento` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `idorden` int(11) NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkpedido` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkusuario` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `idpedido_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkpedido` int(11) NOT NULL,
  `fkproducto` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `idpresentacion` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `precio_compra` double(8,2) DEFAULT NULL,
  `precio_venta` double(8,2) DEFAULT NULL,
  `foto` varchar(75) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fktipo_producto` int(11) NOT NULL,
  `fklaboratorio` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_famacia`
--

CREATE TABLE `producto_famacia` (
  `idproducto_famacia` int(11) NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT NULL,
  `cantidad_stock` int(11) DEFAULT NULL,
  `fkproducto` int(11) NOT NULL,
  `fkfarmacia` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`, `fecha_hora`, `fkestado`) VALUES
(1, 'ADMIN', '2021-08-17 17:51:37', 2),
(2, 'FARMACIA', '2021-08-17 17:51:37', 2),
(3, 'CLIENTE', '2021-08-17 17:51:52', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `idtipo_producto` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `apellido` varchar(75) DEFAULT NULL,
  `usuario` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `dpi` varchar(20) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `genero` tinyint(4) DEFAULT NULL,
  `foto` varchar(75) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkrol` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `usuario`, `password`, `dpi`, `nit`, `genero`, `foto`, `fecha_nacimiento`, `fecha_hora`, `fkrol`, `fkestado`) VALUES
(1, 'Max', 'Gonzalez', 'mgonzalez', '$2y$10$9HIVa7ZJGGCfR7cwXbtrIOMkNNKaAqT7HY/h5LzWnCZJ9WKSTIYL6', '2525594870608', '80503853', 0, 'AdminLTELogo.png', '1994-08-28', '2021-08-17 23:58:06', 1, 2),
(2, 'miguel', 'ITO', 'prueba1', '6e4a044cb10cf1863a6f7105e593857c67250e6863b4d79e3f5678b2547e908307a5efa5a8a', '252559487009', '80503859', NULL, NULL, '1995-05-28', '2021-08-21 04:05:48', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_contacto`
--

CREATE TABLE `usuario_contacto` (
  `idusuario_contacto` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `zona` int(11) DEFAULT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkmunicipio` int(11) NOT NULL,
  `fkesatado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_acceso`
--
ALTER TABLE `area_acceso`
  ADD PRIMARY KEY (`idarea_acceso`),
  ADD KEY `fkestado` (`fkestado`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`),
  ADD KEY `fk_departamento_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`iddescuento`),
  ADD KEY `fk_descuento_estado1_idx` (`fkestado`),
  ADD KEY `fk_descuento_producto_famacia1_idx` (`fkproducto_farmacia`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`idfarmacia`),
  ADD KEY `fk_farmacia_estado1_idx` (`fkestado`),
  ADD KEY `fk_farmacia_municipio1_idx` (`fkmunicipio`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`idlaboratorio`),
  ADD KEY `fk_laboratorio_estado1_idx` (`fkestado`),
  ADD KEY `fk_laboratorio_municipio1_idx` (`fkmunicipio`);

--
-- Indices de la tabla `login_access`
--
ALTER TABLE `login_access`
  ADD PRIMARY KEY (`idaccess`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idmunicipio`),
  ADD KEY `fk_municipio_departamento1_idx` (`fkdepartamento`),
  ADD KEY `fk_municipio_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`idorden`),
  ADD KEY `fk_orden_pedido1_idx` (`fkpedido`),
  ADD KEY `fk_orden_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_pedido_estado1_idx` (`fkestado`),
  ADD KEY `fk_pedido_usuario1` (`fkusuario`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`idpedido_producto`),
  ADD KEY `fk_pedido_producto_pedido1_idx` (`fkpedido`),
  ADD KEY `fk_pedido_producto_producto1_idx` (`fkproducto`),
  ADD KEY `fk_pedido_producto_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`idpresentacion`),
  ADD KEY `fk_presentacion_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_producto_tipo_producto1_idx` (`fktipo_producto`),
  ADD KEY `fk_producto_laboratorio1_idx` (`fklaboratorio`),
  ADD KEY `fk_producto_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `producto_famacia`
--
ALTER TABLE `producto_famacia`
  ADD PRIMARY KEY (`idproducto_famacia`),
  ADD KEY `fk_producto_famacia_estado1_idx` (`fkestado`),
  ADD KEY `fk_producto_famacia_producto1_idx` (`fkproducto`),
  ADD KEY `fk_producto_famacia_farmacia1_idx` (`fkfarmacia`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD KEY `fk_rol_estado_idx` (`fkestado`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`idtipo_producto`),
  ADD KEY `fk_tipo_producto_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_rol1_idx` (`fkrol`),
  ADD KEY `fk_usuario_estado1_idx` (`fkestado`);

--
-- Indices de la tabla `usuario_contacto`
--
ALTER TABLE `usuario_contacto`
  ADD PRIMARY KEY (`idusuario_contacto`),
  ADD KEY `fk_usuario_contacto_municipio1_idx` (`fkmunicipio`),
  ADD KEY `fk_usuario_contacto_estado1_idx` (`fkesatado`),
  ADD KEY `fk_usuario_contacto_usuario1` (`fkusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_acceso`
--
ALTER TABLE `area_acceso`
  MODIFY `idarea_acceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `iddescuento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `idfarmacia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `idlaboratorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_access`
--
ALTER TABLE `login_access`
  MODIFY `idaccess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idmunicipio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `idorden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `idpedido_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `idpresentacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_famacia`
--
ALTER TABLE `producto_famacia`
  MODIFY `idproducto_famacia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `idtipo_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_contacto`
--
ALTER TABLE `usuario_contacto`
  MODIFY `idusuario_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area_acceso`
--
ALTER TABLE `area_acceso`
  ADD CONSTRAINT `area_acceso_ibfk_1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD CONSTRAINT `fk_descuento_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_descuento_producto_famacia1` FOREIGN KEY (`fkproducto_farmacia`) REFERENCES `producto_famacia` (`idproducto_famacia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `farmacia`
--
ALTER TABLE `farmacia`
  ADD CONSTRAINT `fk_farmacia_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_farmacia_municipio1` FOREIGN KEY (`fkmunicipio`) REFERENCES `municipio` (`idmunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `fk_laboratorio_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_laboratorio_municipio1` FOREIGN KEY (`fkmunicipio`) REFERENCES `municipio` (`idmunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_departamento1` FOREIGN KEY (`fkdepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_municipio_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `fk_orden_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orden_pedido1` FOREIGN KEY (`fkpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orden_usuario1` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `fk_pedido_producto_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_producto_pedido1` FOREIGN KEY (`fkpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_producto_producto1` FOREIGN KEY (`fkproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD CONSTRAINT `fk_presentacion_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_laboratorio1` FOREIGN KEY (`fklaboratorio`) REFERENCES `laboratorio` (`idlaboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_tipo_producto1` FOREIGN KEY (`fktipo_producto`) REFERENCES `tipo_producto` (`idtipo_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_famacia`
--
ALTER TABLE `producto_famacia`
  ADD CONSTRAINT `fk_producto_famacia_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_famacia_farmacia1` FOREIGN KEY (`fkfarmacia`) REFERENCES `farmacia` (`idfarmacia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_famacia_producto1` FOREIGN KEY (`fkproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `fk_rol_estado` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD CONSTRAINT `fk_tipo_producto_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_estado1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`fkrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_contacto`
--
ALTER TABLE `usuario_contacto`
  ADD CONSTRAINT `fk_usuario_contacto_estado1` FOREIGN KEY (`fkesatado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_contacto_municipio1` FOREIGN KEY (`fkmunicipio`) REFERENCES `municipio` (`idmunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_contacto_usuario1` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
