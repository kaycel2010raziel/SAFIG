-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2021 a las 19:33:23
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `safigdb`
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
  `fkestado` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `fecha_hora`, `fkestado`) VALUES
(1, 'Guatemala', '2021-08-23 14:48:19', 2),
(2, 'El Progreso', '2021-08-23 14:48:19', 2),
(3, 'Sacatepéquez', '2021-08-23 14:48:19', 2),
(4, 'Chimaltenango', '2021-08-23 14:48:19', 2),
(5, 'Escuintla', '2021-08-23 14:48:19', 2),
(6, 'Santa Rosa', '2021-08-23 14:48:19', 2),
(7, 'Sololá', '2021-08-23 14:48:19', 2),
(8, 'Totonicapán', '2021-08-23 14:48:19', 2),
(9, 'Quetzaltenango', '2021-08-23 14:48:19', 2),
(10, 'Suchitepéquez', '2021-08-23 14:48:19', 2),
(11, 'Retalhuleu', '2021-08-23 14:48:19', 2),
(12, 'San Marcos', '2021-08-23 14:48:19', 2),
(13, 'Huehuetenango', '2021-08-23 14:48:19', 2),
(14, 'Quiché', '2021-08-23 14:48:19', 2),
(15, 'Baja Verapaz', '2021-08-23 14:48:19', 2),
(16, 'Alta Verapaz', '2021-08-23 14:48:19', 2),
(17, 'Petén', '2021-08-23 14:48:19', 2),
(18, 'Izabal', '2021-08-23 14:48:19', 2),
(19, 'Zacapa', '2021-08-23 14:48:19', 2),
(20, 'Chiquimula', '2021-08-23 14:48:19', 2),
(21, 'Jalapa', '2021-08-23 14:48:19', 2),
(22, 'Jutiapa', '2021-08-23 14:48:19', 2);

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
  `foto` varchar(75) DEFAULT NULL,
  `fkmunicipio` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `farmacia`
--

INSERT INTO `farmacia` (`idfarmacia`, `nombre`, `direccion`, `fecha_hora`, `foto`, `fkmunicipio`, `fkestado`) VALUES
(1, 'Farmacias Galeno', '7a Avenida 16-45', '2021-08-23 15:23:01', 'SHR_HDR1.jpg', 1, 2),
(2, 'Cruz Verde', 'Calle Zona 9', '2021-08-23 15:23:01', NULL, 1, 2),
(3, 'Farmacias Batres S. A.', '9na. calle 1 Avenida zona 1', '2021-08-23 15:59:09', NULL, 1, 2),
(4, 'Meykos', '6 Avenida 5ta. Calle Zona 9', '2021-08-23 15:59:09', NULL, 1, 2),
(5, 'Farmacias La Comunidad', 'Avenida La Reforma Zona 10', '2021-08-23 16:00:05', NULL, 1, 2),
(6, 'FA&CO', '5 Av 16-54 Z.14', '2021-08-23 16:08:37', NULL, 1, 2),
(7, 'Farmacia Del Ahorro', 'Boulevard Sur 19-54 Local 4 Zona 8', '2021-08-23 16:09:23', NULL, 8, 2),
(8, 'Farmacia Proam', 'Lote 14 Zona 11 Colonia Planes De Minerva', '2021-08-23 16:12:57', NULL, 8, 2),
(9, 'APOMEDIX', 'Paseo la Sexta, 6ta. avenida Zona 1', '2021-08-23 16:12:57', NULL, 1, 2),
(10, 'Farmacia Del Doctor Simi', '5ta. Avenida Zona 4', '2021-08-23 16:16:51', NULL, 1, 2);

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
  `foto` varchar(75) NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fkmunicipio` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`idlaboratorio`, `nombre`, `direccion`, `telefono`, `correo`, `foto`, `fecha_hora`, `fkmunicipio`, `fkestado`) VALUES
(1, 'Industrias Farmacéuticas INFASA S.A', 'Carretera Roosevelt Km 15.5 0-80 Zona 2 ', '(+502) 2411 5454', 'consultas@infasa.net', '', '2021-08-23 15:00:21', 8, 2),
(2, 'Loralva S.A', '1 Calle 0-15 Zona 1', '(+502) 6686 0300', 'contacto@loralva.com', '', '2021-08-23 15:03:00', 15, 2),
(3, 'Laboratorios Químicos Farmacéuticos Lancasco', 'KM. 15.5 Carretera Roosevelt Zona 7', '(+502) 2323 2500', 'clientes@lancasco.com', '', '2021-08-23 15:03:00', 8, 2),
(4, 'Laboratorios Menarini', '10 C 1-40 Zona 9', '(+502) 2427 4700', 'contactos@menarini.com', '', '2021-08-23 15:04:32', 1, 2),
(5, 'Abbott Laboratorios Limitada', '5 Avenida 5-55 Zona 14 Europlaza Torre 1 Nivel 10', '(+502) 2420 9748', 'clientes@abbott.com', '', '2021-08-23 15:12:46', 1, 2),
(6, 'Laboratorios Sued', 'Calzada Atanasio Tzul 22-00 Zona 12 Centro Empresarial Cortijo III Bodega 912', '(+502) 2462 6658', 'clientes@sued.com', '', '2021-08-23 15:14:15', 1, 2),
(7, 'Quimica Universal De Centroamerica, S.A', '2 Calle 3-20 Zona 1', ' (+502) 2220 1040', 'consultas@quimicauniversal.com', '', '2021-08-23 15:14:15', 1, 2),
(8, ' Drogueríalatinoamericana D.I.L.A.S.A', '4 Avenida 3-32 Zona 4 ', ' (+502) 5494 1025', 'clientes@drogerialasagt.com', '', '2021-08-23 15:15:42', 31, 2),
(9, 'Norvanda Healthcare, S.A.', '5 Avenida 5-55 Zona 14 Edificio Europlaza Torre I 603', ' (+502) 2299 7400', 'soporte@Healthcare.com', '', '2021-08-23 15:16:57', 1, 2),
(10, 'Laboratorio Y Drogueria Qualipharm S.A.', '4 Avenida 19-33 Zona 14', '(+502) 2414 4242', 'soporte@Qualipharm.com', '', '2021-08-23 15:18:44', 1, 2),
(11, 'pruebas', 'alli', '15651', 'data', '', '2021-08-24 13:00:31', 75, 4);

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
(21, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(22, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(23, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(24, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0'),
(25, '1', '::1', 1, 'b6751a9c13fe59dfa4eaa0452bd73425758071278c42659093a49da60e1ea89fdcdf66dc05e2c2535b25f56e876f1e07c8ee616e931b6e72e396b23333e1eca0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idmunicipio` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `fkdepartamento` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idmunicipio`, `nombre`, `fecha_creacion`, `fkdepartamento`, `fkestado`) VALUES
(1, 'Guatemala', '2021-08-23 14:56:20', 1, 2),
(2, 'Santa Catarina Pinula', '2021-08-23 14:56:20', 1, 2),
(3, 'San José Pinula', '2021-08-23 14:56:20', 1, 2),
(4, 'San José del Golfo', '2021-08-23 14:56:20', 1, 2),
(5, 'Palencia', '2021-08-23 14:56:20', 1, 2),
(6, 'Chinautla', '2021-08-23 14:56:20', 1, 2),
(7, 'San Pedro Ayampuc', '2021-08-23 14:56:20', 1, 2),
(8, 'Mixco', '2021-08-23 14:56:20', 1, 2),
(9, 'San Pedro Sacatepéquez', '2021-08-23 14:56:20', 1, 2),
(10, 'San Juan Sacatepéquez', '2021-08-23 14:56:20', 1, 2),
(11, 'San Raymundo', '2021-08-23 14:56:20', 1, 2),
(12, 'Chuarrancho', '2021-08-23 14:56:20', 1, 2),
(13, 'Fraijanes', '2021-08-23 14:56:20', 1, 2),
(14, 'Amatitlán', '2021-08-23 14:56:20', 1, 2),
(15, 'Villa Nueva	', '2021-08-23 14:56:20', 1, 2),
(16, 'Villa Canales', '2021-08-23 14:56:20', 1, 2),
(17, 'San Miguel Petapa', '2021-08-23 14:56:20', 1, 2),
(18, 'Guastatoya', '2021-08-23 14:56:20', 2, 2),
(19, 'Morazán', '2021-08-23 14:56:20', 2, 2),
(20, 'San Agustín Acasaguastlán', '2021-08-23 14:56:20', 2, 2),
(21, 'San Cristóbal Acasaguastlán', '2021-08-23 14:56:20', 2, 2),
(22, 'El Jícaro', '2021-08-23 14:56:20', 2, 2),
(23, 'Sanarate', '2021-08-23 14:56:20', 2, 2),
(24, 'Sansare	', '2021-08-23 14:56:20', 2, 2),
(25, 'San Antonio La Paz', '2021-08-23 14:56:20', 2, 2),
(26, 'Antigua Guatemala', '2021-08-23 14:56:20', 3, 2),
(27, 'Jocotenango', '2021-08-23 14:56:20', 3, 2),
(28, 'Pastores', '2021-08-23 14:56:20', 3, 2),
(29, 'Sumpango', '2021-08-23 14:56:20', 3, 2),
(30, 'Santo Domingo Xenacoj', '2021-08-23 14:56:20', 3, 2),
(31, 'Santiago Sacatepéquez', '2021-08-23 14:56:20', 3, 2),
(32, 'San Bartolomé Milpas Altas', '2021-08-23 14:56:20', 3, 2),
(33, 'San Lucas Sacatepéquez', '2021-08-23 14:56:20', 3, 2),
(34, 'Santa Lucía Milpas Altas', '2021-08-23 14:56:20', 3, 2),
(35, 'Magdalena Milpas Altas', '2021-08-23 14:56:20', 3, 2),
(36, 'Santa María de Jesús', '2021-08-23 14:56:20', 3, 2),
(37, 'Ciudad Vieja', '2021-08-23 14:56:20', 3, 2),
(38, 'San Miguel Dueñas', '2021-08-23 14:56:20', 3, 2),
(39, 'Alotenango', '2021-08-23 14:56:20', 3, 2),
(40, 'San Antonio Aguas Calientes', '2021-08-23 14:56:20', 3, 2),
(41, 'Santa Catarina Barahona', '2021-08-23 14:56:20', 3, 2),
(42, 'Chimaltenango', '2021-08-23 14:56:20', 4, 2),
(43, 'San José Poaquil', '2021-08-23 14:56:20', 4, 2),
(44, 'San Martín Jilotepeque', '2021-08-23 14:56:20', 4, 2),
(45, 'Comalapa', '2021-08-23 14:56:20', 4, 2),
(46, 'Santa Apolonia', '2021-08-23 14:56:20', 4, 2),
(47, 'Tecpán Guatemala', '2021-08-23 14:56:20', 4, 2),
(48, 'Patzún', '2021-08-23 14:56:20', 4, 2),
(49, 'Pochuta', '2021-08-23 14:56:20', 4, 2),
(50, 'Patzicía', '2021-08-23 14:56:20', 4, 2),
(51, 'Santa Cruz Balanyá', '2021-08-23 14:56:20', 4, 2),
(52, 'Acatenango', '2021-08-23 14:56:20', 4, 2),
(53, 'Yepocapa', '2021-08-23 14:56:20', 4, 2),
(54, 'San Andrés Itzapa', '2021-08-23 14:56:20', 4, 2),
(55, 'Parramos', '2021-08-23 14:56:20', 4, 2),
(56, 'Zaragoza', '2021-08-23 14:56:20', 4, 2),
(57, 'El Tejar', '2021-08-23 14:56:20', 4, 2),
(58, 'Escuintla', '2021-08-23 14:56:20', 5, 2),
(59, 'Santa Lucía Cotzumalguapa', '2021-08-23 14:56:20', 5, 2),
(60, 'La Democracia', '2021-08-23 14:56:20', 5, 2),
(61, 'Siquinalá', '2021-08-23 14:56:20', 5, 2),
(62, 'Masagua', '2021-08-23 14:56:20', 5, 2),
(63, 'Tiquisate', '2021-08-23 14:56:20', 5, 2),
(64, 'La Gomera', '2021-08-23 14:56:20', 5, 2),
(65, 'Guanagazapa', '2021-08-23 14:56:20', 5, 2),
(66, 'San José E', '2021-08-23 14:56:20', 5, 2),
(67, 'Iztapa', '2021-08-23 14:56:20', 5, 2),
(68, 'Palín', '2021-08-23 14:56:20', 5, 2),
(69, 'San Vicente Pacaya', '2021-08-23 14:56:20', 5, 2),
(70, 'Nueva Concepción', '2021-08-23 14:56:20', 5, 2),
(71, 'Sipacate', '2021-08-23 14:56:20', 5, 2),
(72, 'Cuilapa', '2021-08-23 14:56:20', 6, 2),
(73, 'Barberena', '2021-08-23 14:56:20', 6, 2),
(74, 'Santa Rosa de Lima', '2021-08-23 14:56:20', 6, 2),
(75, 'Casillas', '2021-08-23 14:56:20', 6, 2),
(76, 'San Rafael Las Flores', '2021-08-23 14:56:20', 6, 2),
(77, 'Oratorio', '2021-08-23 14:56:20', 6, 2),
(78, 'San Juan Tecuaco', '2021-08-23 14:56:20', 6, 2),
(79, 'Chiquimulilla', '2021-08-23 14:56:20', 6, 2),
(80, 'Taxisco', '2021-08-23 14:56:20', 6, 2),
(81, 'Santa María Ixhuatán', '2021-08-23 14:56:20', 6, 2),
(82, 'Guazacapán', '2021-08-23 14:56:20', 6, 2),
(83, 'Santa Cruz Naranjo', '2021-08-23 14:56:20', 6, 2),
(84, 'Pueblo Nuevo Viñas', '2021-08-23 14:56:20', 6, 2),
(85, 'Nueva Santa Rosa', '2021-08-23 14:56:20', 6, 2),
(86, 'Sololá', '2021-08-23 14:56:20', 7, 2),
(87, 'San José Chacayá', '2021-08-23 14:56:20', 7, 2),
(88, 'Santa María Visitación', '2021-08-23 14:56:20', 7, 2),
(89, 'Santa Lucía Utatlán', '2021-08-23 14:56:20', 7, 2),
(90, 'Nahualá', '2021-08-23 14:56:20', 7, 2),
(91, 'Santa Catarina Ixtahuacán', '2021-08-23 14:56:20', 7, 2),
(92, 'Santa Clara La Laguna', '2021-08-23 14:56:20', 7, 2),
(93, 'Concepción', '2021-08-23 14:56:20', 7, 2),
(94, 'San Andrés Semetabaj', '2021-08-23 14:56:20', 7, 2),
(95, 'Panajachel', '2021-08-23 14:56:20', 7, 2),
(96, 'Santa Catarina Palopó', '2021-08-23 14:56:20', 7, 2),
(97, 'San Antonio Palopó', '2021-08-23 14:56:20', 7, 2),
(98, 'San Lucas Tolimán', '2021-08-23 14:56:20', 7, 2),
(99, 'Santa Cruz La Laguna', '2021-08-23 14:56:20', 7, 2),
(100, 'San Pablo La Laguna', '2021-08-23 14:56:20', 7, 2),
(101, 'San Marcos La Laguna', '2021-08-23 14:56:20', 7, 2),
(102, 'San Juan La Laguna', '2021-08-23 14:56:20', 7, 2),
(103, 'San Pedro La Laguna', '2021-08-23 14:56:20', 7, 2),
(104, 'Santiago Atitlán', '2021-08-23 14:56:20', 7, 2),
(105, 'Totonicapán', '2021-08-23 14:56:20', 8, 2),
(106, 'San Cristóbal Totonicapán', '2021-08-23 14:56:20', 8, 2),
(107, 'San Francisco El Alto', '2021-08-23 14:56:20', 8, 2),
(108, 'San Andrés Xecul', '2021-08-23 14:56:20', 8, 2),
(109, 'Momostenango', '2021-08-23 14:56:20', 8, 2),
(110, 'Santa María Chiquimula', '2021-08-23 14:56:20', 8, 2),
(111, 'Santa Lucía La Reforma', '2021-08-23 14:56:20', 8, 2),
(112, 'San Bartolo', '2021-08-23 14:56:20', 8, 2),
(113, 'Quetzaltenango', '2021-08-23 14:56:20', 9, 2),
(114, 'Salcajá', '2021-08-23 14:56:20', 9, 2),
(115, 'Olintepeque', '2021-08-23 14:56:20', 9, 2),
(116, 'San Carlos Sija	', '2021-08-23 14:56:20', 9, 2),
(117, 'Sibilia', '2021-08-23 14:56:20', 9, 2),
(118, 'Cabricán', '2021-08-23 14:56:20', 9, 2),
(119, 'Cajolá', '2021-08-23 14:56:20', 9, 2),
(120, 'San Miguel Sigüila', '2021-08-23 14:56:20', 9, 2),
(121, 'San Juan Ostuncalco', '2021-08-23 14:56:20', 9, 2),
(122, 'San Mateo', '2021-08-23 14:56:20', 9, 2),
(123, 'Concepción Chiquirichapa', '2021-08-23 14:56:20', 9, 2),
(124, 'San Martín Sacatepéquez', '2021-08-23 14:56:20', 9, 2),
(125, 'Almolonga', '2021-08-23 14:56:20', 9, 2),
(126, 'Cantel', '2021-08-23 14:56:20', 9, 2),
(127, 'Huitán', '2021-08-23 14:56:20', 9, 2),
(128, 'Zunil', '2021-08-23 14:56:20', 9, 2),
(129, 'Colomba Costa Cuca', '2021-08-23 14:56:20', 9, 2),
(130, 'San Francisco La Unión', '2021-08-23 14:56:20', 9, 2),
(131, 'El Palmar', '2021-08-23 14:56:20', 9, 2),
(132, 'Coatepeque', '2021-08-23 14:56:20', 9, 2),
(133, 'Génova', '2021-08-23 14:56:20', 9, 2),
(134, 'Flores Costa Cuca', '2021-08-23 14:56:20', 9, 2),
(135, 'La Esperanza', '2021-08-23 14:56:20', 9, 2),
(136, 'Palestina de Los Altos', '2021-08-23 14:56:20', 9, 2),
(137, 'Mazatenango', '2021-08-23 14:56:20', 10, 2),
(138, 'Cuyotenango', '2021-08-23 14:56:20', 10, 2),
(139, 'San Francisco Zapotitlán', '2021-08-23 14:56:20', 10, 2),
(140, 'San Bernardino', '2021-08-23 14:56:20', 10, 2),
(141, 'San José El ídolo', '2021-08-23 14:56:20', 10, 2),
(142, 'Santo Domingo Suchitepéquez', '2021-08-23 14:56:20', 10, 2),
(143, 'San Lorenzo', '2021-08-23 14:56:20', 10, 2),
(144, 'Samayac', '2021-08-23 14:56:20', 10, 2),
(145, 'San Pablo Jocopilas', '2021-08-23 14:56:20', 10, 2),
(146, 'San Antonio Suchitepéquez', '2021-08-23 14:56:20', 10, 2),
(147, 'San Miguel Panán', '2021-08-23 14:56:20', 10, 2),
(148, 'San Gabriel', '2021-08-23 14:56:20', 10, 2),
(149, 'Chicacao', '2021-08-23 14:56:20', 10, 2),
(150, 'Patulul', '2021-08-23 14:56:20', 10, 2),
(151, 'Santa Bárbara', '2021-08-23 14:56:20', 10, 2),
(152, 'San Juan Bautista', '2021-08-23 14:56:20', 10, 2),
(153, 'Santo Tomás La Unión', '2021-08-23 14:56:20', 10, 2),
(154, 'Zunilito', '2021-08-23 14:56:20', 10, 2),
(155, 'Pueblo Nuevo', '2021-08-23 14:56:20', 10, 2),
(156, 'Río Bravo', '2021-08-23 14:56:20', 10, 2),
(157, 'San José La Máquina', '2021-08-23 14:56:20', 10, 2),
(158, 'Retalhuleu', '2021-08-23 14:56:20', 11, 2),
(159, 'San Sebastián', '2021-08-23 14:56:20', 11, 2),
(160, 'Santa Cruz Muluá', '2021-08-23 14:56:20', 11, 2),
(161, 'San Martín Zapotitlán', '2021-08-23 14:56:20', 11, 2),
(162, 'San Felipe', '2021-08-23 14:56:20', 11, 2),
(163, 'San Andrés Villa Seca', '2021-08-23 14:56:20', 11, 2),
(164, 'Champerico', '2021-08-23 14:56:20', 11, 2),
(165, 'Nuevo San Carlos', '2021-08-23 14:56:20', 11, 2),
(166, 'El Asintal', '2021-08-23 14:56:20', 11, 2),
(167, 'San Marcos', '2021-08-23 14:56:20', 12, 2),
(168, 'San Pedro Sacatepéquez', '2021-08-23 14:56:20', 12, 2),
(169, 'San Antonio Sacatepéquez', '2021-08-23 14:56:20', 12, 2),
(170, 'Comitancillo', '2021-08-23 14:56:20', 12, 2),
(171, 'San Miguel Ixtahuacán', '2021-08-23 14:56:20', 12, 2),
(172, 'Concepción Tutuapa', '2021-08-23 14:56:20', 12, 2),
(173, 'Tacaná', '2021-08-23 14:56:20', 12, 2),
(174, 'Sibinal', '2021-08-23 14:56:20', 12, 2),
(175, 'Tajumulco', '2021-08-23 14:56:20', 12, 2),
(176, 'Tejutla', '2021-08-23 14:56:20', 12, 2),
(177, 'San Rafael Pie de la Cuesta', '2021-08-23 14:56:20', 12, 2),
(178, 'Nuevo Progreso', '2021-08-23 14:56:20', 12, 2),
(179, 'El Tumbador', '2021-08-23 14:56:20', 12, 2),
(180, 'El Rodeo', '2021-08-23 14:56:20', 12, 2),
(181, 'Malacatán', '2021-08-23 14:56:20', 12, 2),
(182, 'Catarina', '2021-08-23 14:56:20', 12, 2),
(183, 'Ayutla', '2021-08-23 14:56:20', 12, 2),
(184, 'Ocós', '2021-08-23 14:56:20', 12, 2),
(185, 'San Pablo', '2021-08-23 14:56:20', 12, 2),
(186, 'El Quetzal', '2021-08-23 14:56:20', 12, 2),
(187, 'La Reforma', '2021-08-23 14:56:20', 12, 2),
(188, 'Pajapita', '2021-08-23 14:56:20', 12, 2),
(189, 'Ixchiguán', '2021-08-23 14:56:20', 12, 2),
(190, 'San José Ojetenam', '2021-08-23 14:56:20', 12, 2),
(191, 'San Cristóbal Cucho', '2021-08-23 14:56:20', 12, 2),
(192, 'Sipacapa', '2021-08-23 14:56:20', 12, 2),
(193, 'Esquipulas Palo Gordo', '2021-08-23 14:56:20', 12, 2),
(194, 'Río Blanco', '2021-08-23 14:56:20', 12, 2),
(195, 'San Lorenzo', '2021-08-23 14:56:20', 12, 2),
(196, 'La Blanca', '2021-08-23 14:56:20', 12, 2),
(197, 'Huehuetenango', '2021-08-23 14:56:20', 13, 2),
(198, 'Chiantla', '2021-08-23 14:56:20', 13, 2),
(199, 'Malacatancito', '2021-08-23 14:56:20', 13, 2),
(200, 'Cuilco', '2021-08-23 14:56:20', 13, 2),
(201, 'Nentón', '2021-08-23 14:56:20', 13, 2),
(202, 'San Pedro Necta', '2021-08-23 14:56:20', 13, 2),
(203, 'Jacaltenango', '2021-08-23 14:56:20', 13, 2),
(204, 'Soloma', '2021-08-23 14:56:20', 13, 2),
(205, 'Ixtahuacán', '2021-08-23 14:56:20', 13, 2),
(206, 'Santa Bárbara H', '2021-08-23 14:56:20', 13, 2),
(207, 'La Libertad H', '2021-08-23 14:56:20', 13, 2),
(208, 'La Democracia H', '2021-08-23 14:56:20', 13, 2),
(209, 'San Miguel Acatán', '2021-08-23 14:56:20', 13, 2),
(210, 'San Rafael La Independencia', '2021-08-23 14:56:20', 13, 2),
(211, 'Todos Santos Cuchumatán', '2021-08-23 14:56:20', 13, 2),
(212, 'San Juan Atitán', '2021-08-23 14:56:20', 13, 2),
(213, 'Santa Eulalia', '2021-08-23 14:56:20', 13, 2),
(214, 'San Mateo Ixtatán', '2021-08-23 14:56:20', 13, 2),
(215, 'Colotenango', '2021-08-23 14:56:20', 13, 2),
(216, 'San Sebastián Huehuetenango', '2021-08-23 14:56:20', 13, 2),
(217, 'Tectitán', '2021-08-23 14:56:20', 13, 2),
(218, 'Concepción Huista', '2021-08-23 14:56:20', 13, 2),
(219, 'San Juan Ixcoy', '2021-08-23 14:56:20', 13, 2),
(220, 'San Antonio Huista', '2021-08-23 14:56:20', 13, 2),
(221, 'San Sebastián Coatán', '2021-08-23 14:56:20', 13, 2),
(222, 'Santa Cruz Barillas', '2021-08-23 14:56:20', 13, 2),
(223, 'Aguacatán', '2021-08-23 14:56:20', 13, 2),
(224, 'San Rafael Petzal', '2021-08-23 14:56:20', 13, 2),
(225, 'San Gaspar Ixchil', '2021-08-23 14:56:20', 13, 2),
(226, 'Santiago Chimaltenango', '2021-08-23 14:56:20', 13, 2),
(227, 'Santa Ana Huista', '2021-08-23 14:56:20', 13, 2),
(228, 'Unión Cantinil', '2021-08-23 14:56:20', 13, 2),
(229, 'Petatán', '2021-08-23 14:56:20', 13, 2),
(230, 'Santa Cruz del Quiché', '2021-08-23 14:56:20', 14, 2),
(231, 'Chiché', '2021-08-23 14:56:20', 14, 2),
(232, 'Chinique', '2021-08-23 14:56:20', 14, 2),
(233, 'Zacualpa', '2021-08-23 14:56:20', 14, 2),
(234, 'Chajul', '2021-08-23 14:56:20', 14, 2),
(235, 'Chichicastenango', '2021-08-23 14:56:20', 14, 2),
(236, 'Patzité', '2021-08-23 14:56:20', 14, 2),
(237, 'San Antonio Ilotenango', '2021-08-23 14:56:20', 14, 2),
(238, 'San Pedro Jocopilas', '2021-08-23 14:56:20', 14, 2),
(239, 'Cunén', '2021-08-23 14:56:20', 14, 2),
(240, 'San Juan Cotzal', '2021-08-23 14:56:20', 14, 2),
(241, 'Joyabaj', '2021-08-23 14:56:20', 14, 2),
(242, 'Nebaj', '2021-08-23 14:56:20', 14, 2),
(243, 'San Andrés Sajcabajá', '2021-08-23 14:56:20', 14, 2),
(244, 'Uspantán', '2021-08-23 14:56:20', 14, 2),
(245, 'Sacapulas', '2021-08-23 14:56:20', 14, 2),
(246, 'San Bartolomé Jocotenango', '2021-08-23 14:56:20', 14, 2),
(247, 'Canillá', '2021-08-23 14:56:20', 14, 2),
(248, 'Chicamán', '2021-08-23 14:56:20', 14, 2),
(249, 'Ixcán', '2021-08-23 14:56:20', 14, 2),
(250, 'Pachalum', '2021-08-23 14:56:20', 14, 2),
(251, 'Salamá', '2021-08-23 14:56:20', 15, 2),
(252, 'San Miguel Chicaj', '2021-08-23 14:56:20', 15, 2),
(253, 'Rabinal', '2021-08-23 14:56:20', 15, 2),
(254, 'Cubulco', '2021-08-23 14:56:20', 15, 2),
(255, 'Granados', '2021-08-23 14:56:20', 15, 2),
(256, 'El Chol', '2021-08-23 14:56:20', 15, 2),
(257, 'San Jerónimo', '2021-08-23 14:56:20', 15, 2),
(258, 'Purulhá', '2021-08-23 14:56:20', 15, 2),
(259, 'Cobán', '2021-08-23 14:56:20', 16, 2),
(260, 'Santa Cruz Verapaz', '2021-08-23 14:56:20', 16, 2),
(261, 'San Cristóbal Verapaz', '2021-08-23 14:56:20', 16, 2),
(262, 'Tactic', '2021-08-23 14:56:20', 16, 2),
(263, 'Tamahú', '2021-08-23 14:56:20', 16, 2),
(264, 'Tucurú', '2021-08-23 14:56:20', 16, 2),
(265, 'Panzós', '2021-08-23 14:56:20', 16, 2),
(266, 'Senahú', '2021-08-23 14:56:20', 16, 2),
(267, 'San Pedro Carchá', '2021-08-23 14:56:20', 16, 2),
(268, 'San Juan Chamelco', '2021-08-23 14:56:20', 16, 2),
(269, 'Lanquín', '2021-08-23 14:56:20', 16, 2),
(270, 'Cahabón', '2021-08-23 14:56:20', 16, 2),
(271, 'Chisec', '2021-08-23 14:56:20', 16, 2),
(272, 'Chahal', '2021-08-23 14:56:20', 16, 2),
(273, 'Fray Bartolomé de Las Casas', '2021-08-23 14:56:20', 16, 2),
(274, 'Santa Catalina La Tinta\r\n', '2021-08-23 14:56:20', 16, 2),
(275, 'Raxruhá', '2021-08-23 14:56:20', 16, 2),
(276, 'Flores', '2021-08-23 14:56:20', 17, 2),
(277, 'San José', '2021-08-23 14:56:20', 17, 2),
(278, 'San Benito', '2021-08-23 14:56:20', 17, 2),
(279, 'San Andrés', '2021-08-23 14:56:20', 17, 2),
(280, 'La Libertad P', '2021-08-23 14:56:20', 17, 2),
(281, 'San Francisco', '2021-08-23 14:56:20', 17, 2),
(282, 'Santa Ana', '2021-08-23 14:56:20', 17, 2),
(283, 'Dolores', '2021-08-23 14:56:20', 17, 2),
(284, 'San Luis', '2021-08-23 14:56:20', 17, 2),
(285, 'Sayaxché', '2021-08-23 14:56:20', 17, 2),
(286, 'Melchor de Mencos', '2021-08-23 14:56:20', 17, 2),
(287, 'Poptún', '2021-08-23 14:56:20', 17, 2),
(288, 'Las Cruces', '2021-08-23 14:56:20', 17, 2),
(289, 'El Chal', '2021-08-23 14:56:20', 17, 2),
(290, 'Puerto Barrios', '2021-08-23 14:56:20', 18, 2),
(291, 'Lívingston', '2021-08-23 14:56:20', 18, 2),
(292, 'El Estor', '2021-08-23 14:56:20', 18, 2),
(293, 'Morales', '2021-08-23 14:56:20', 18, 2),
(294, 'Los Amates', '2021-08-23 14:56:20', 18, 2),
(295, 'Zacapa', '2021-08-23 14:56:20', 19, 2),
(296, 'Estanzuela', '2021-08-23 14:56:20', 19, 2),
(297, 'Río Hondo', '2021-08-23 14:56:20', 19, 2),
(298, 'Gualán', '2021-08-23 14:56:20', 19, 2),
(299, 'Teculután', '2021-08-23 14:56:20', 19, 2),
(300, 'Usumatlán', '2021-08-23 14:56:20', 19, 2),
(301, 'Cabañas', '2021-08-23 14:56:20', 19, 2),
(302, 'San Diego', '2021-08-23 14:56:20', 19, 2),
(303, 'La Unión', '2021-08-23 14:56:20', 19, 2),
(304, 'Huité', '2021-08-23 14:56:20', 19, 2),
(305, 'San Jorge', '2021-08-23 14:56:20', 19, 2),
(306, 'Chiquimula', '2021-08-23 14:56:20', 20, 2),
(307, 'San José La Arada', '2021-08-23 14:56:20', 20, 2),
(308, 'San Juan Ermita', '2021-08-23 14:56:20', 20, 2),
(309, 'Jocotán', '2021-08-23 14:56:20', 20, 2),
(310, 'Camotán', '2021-08-23 14:56:20', 20, 2),
(311, 'Olopa', '2021-08-23 14:56:20', 20, 2),
(312, 'Esquipulas', '2021-08-23 14:56:20', 20, 2),
(313, 'Concepción Las Minas', '2021-08-23 14:56:20', 20, 2),
(314, 'Quezaltepeque', '2021-08-23 14:56:20', 20, 2),
(315, 'San Jacinto', '2021-08-23 14:56:20', 20, 2),
(316, 'Ipala', '2021-08-23 14:56:20', 20, 2),
(317, 'Jalapa', '2021-08-23 14:56:20', 21, 2),
(318, 'San Pedro Pinula', '2021-08-23 14:56:20', 21, 2),
(319, 'San Luis Jilotepeque', '2021-08-23 14:56:20', 21, 2),
(320, 'San Manuel Chaparrón', '2021-08-23 14:56:20', 21, 2),
(321, 'San Carlos Alzatate', '2021-08-23 14:56:20', 21, 2),
(322, 'Monjas', '2021-08-23 14:56:20', 21, 2),
(323, 'Mataquescuintla', '2021-08-23 14:56:20', 21, 2),
(324, 'Jutiapa', '2021-08-23 14:56:20', 22, 2),
(325, 'El Progreso', '2021-08-23 14:56:20', 22, 2),
(326, 'Santa Catarina Mita', '2021-08-23 14:56:20', 22, 2),
(327, 'Agua Blanca', '2021-08-23 14:56:20', 22, 2),
(328, 'Asunción Mita', '2021-08-23 14:56:20', 22, 2),
(329, 'Yupiltepeque', '2021-08-23 14:56:20', 22, 2),
(330, 'Atescatempa', '2021-08-23 14:56:20', 22, 2),
(331, 'Jerez', '2021-08-23 14:56:20', 22, 2),
(332, 'El Adelanto', '2021-08-23 14:56:20', 22, 2),
(333, 'Zapotitlán', '2021-08-23 14:56:20', 22, 2),
(334, 'Comapa', '2021-08-23 14:56:20', 22, 2),
(335, 'Jalpatagua', '2021-08-23 14:56:20', 22, 2),
(336, 'Conguaco', '2021-08-23 14:56:20', 22, 2),
(337, 'Moyuta', '2021-08-23 14:56:20', 22, 2),
(338, 'Pasaco', '2021-08-23 14:56:20', 22, 2),
(339, 'San José Acatempa', '2021-08-23 14:56:20', 22, 2),
(340, 'Quesada', '2021-08-23 14:56:20', 22, 2);

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

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`idorden`, `fecha_hora`, `fkpedido`, `fkusuario`, `fkestado`) VALUES
(1, '2021-08-23 22:55:03', 1, 1, 2);

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

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `fecha_hora`, `fkusuario`, `fkestado`) VALUES
(1, '2021-08-23 19:20:25', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `idpedido_producto` int(11) NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `fkproducto_farmacia` int(11) NOT NULL,
  `fkpedido` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`idpedido_producto`, `cantidad`, `fecha_hora`, `fkproducto_farmacia`, `fkpedido`, `fkestado`) VALUES
(1, 5.00, '2021-08-23 22:54:48', 1, 1, 2);

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

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`idpresentacion`, `nombre`, `descripcion`, `fecha_hora`, `fkestado`) VALUES
(1, 'Blister', 'Util para los productos empaquetados por blister', '2021-08-23 19:15:16', 2),
(2, 'Bote', 'Artículos envasados en botes/variedad\r\n', '2021-08-23 19:16:23', 2),
(3, 'Sobre', 'Articulos separados por sobre o soluciones', '2021-08-23 19:16:23', 2),
(4, 'Caja', 'Artículos separados por cajas de diferentes medidas', '2021-08-23 19:17:59', 2),
(5, 'Unidad', 'Artículos individuales', '2021-08-23 19:17:59', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `foto` varchar(75) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `fktipo_producto` int(11) NOT NULL,
  `fkpresentacion` int(11) NOT NULL,
  `fklaboratorio` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `descripcion`, `foto`, `fecha_hora`, `fktipo_producto`, `fkpresentacion`, `fklaboratorio`, `fkestado`) VALUES
(1, 'Ibuprofeno ', '500 Gramos - 10 Unidades', 'data/fotos/algo.png', '2021-08-23 19:22:13', 1, 4, 1, 2),
(2, 'Acetaminofen', '200 MG - Unidad -Tableta recubierto ', 'data/photos/something.png', '2021-08-23 19:25:05', 1, 5, 1, 2),
(3, 'Cefradoxilo ', '500 MG - 5 Unidades - Tabletas', 'data/photo/something.png', '2021-08-23 19:29:31', 2, 5, 2, 2),
(4, 'Cefradoxilo', '500 MG - Tableta ', 'data/photo/something.ong', '2021-08-23 19:29:31', 2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_famacia`
--

CREATE TABLE `producto_famacia` (
  `idproducto_famacia` int(11) NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `cantidad_stock` int(11) DEFAULT NULL,
  `valor_compra` double(8,2) NOT NULL,
  `valor_venta` double(8,2) NOT NULL,
  `fkproducto` int(11) NOT NULL,
  `fkfarmacia` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_famacia`
--

INSERT INTO `producto_famacia` (`idproducto_famacia`, `fecha_hora`, `cantidad_stock`, `valor_compra`, `valor_venta`, `fkproducto`, `fkfarmacia`, `fkestado`) VALUES
(1, '2021-08-23 19:49:27', 10, 45.00, 50.00, 1, 1, 2),
(2, '2021-08-23 19:50:12', 15, 1.00, 2.00, 2, 2, 2),
(3, '2021-08-23 21:55:41', 12, 5.00, 7.00, 3, 3, 2),
(4, '2021-08-23 21:56:05', 12, 40.00, 55.00, 4, 10, 2);

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

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`idtipo_producto`, `nombre`, `descripcion`, `fecha_hora`, `fkestado`) VALUES
(1, 'Analgésicos', 'Categoría de productos analgésicos', '2021-08-23 18:05:23', 2),
(2, 'Antibióticos', 'Categoría de productos Antibióticos', '2021-08-23 18:05:23', 2),
(3, 'Vitaminas y Suplementos', 'Categoría para todos los productos y suplementos', '2021-08-23 18:06:19', 2);

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
  `password_change` tinyint(4) NOT NULL DEFAULT 0,
  `fkrol` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `usuario`, `password`, `dpi`, `nit`, `genero`, `foto`, `fecha_nacimiento`, `fecha_hora`, `password_change`, `fkrol`, `fkestado`) VALUES
(1, 'Max', 'Gonzalez', 'mgonzalez', '$2y$10$9HIVa7ZJGGCfR7cwXbtrIOMkNNKaAqT7HY/h5LzWnCZJ9WKSTIYL6', '2525594870608', '80503853', 0, 'AdminLTELogo.png', '1994-08-28', '2021-08-17 23:58:06', 0, 1, 2),
(2, 'miguel', 'ITO', 'prueba1', '6e4a044cb10cf1863a6f7105e593857c67250e6863b4d79e3f5678b2547e908307a5efa5a8a', '252559487009', '80503859', 0, NULL, '1995-05-28', '2021-08-21 04:05:48', 0, 3, 4);

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
-- Volcado de datos para la tabla `usuario_contacto`
--

INSERT INTO `usuario_contacto` (`idusuario_contacto`, `telefono`, `correo`, `direccion`, `zona`, `fkusuario`, `fkmunicipio`, `fkesatado`) VALUES
(1, '55953680', 'prueba_correo@gmail.com', '8va. Calle 7ma. Avenida', 11, 1, 1, 2),
(2, '57988632', 'prueba_correo@gmail.com', '20. calle 10 avenida', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_farmacia`
--

CREATE TABLE `usuario_farmacia` (
  `idusuario_farmacia` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkfarmacia` int(11) NOT NULL,
  `fkestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_farmacia`
--

INSERT INTO `usuario_farmacia` (`idusuario_farmacia`, `fkusuario`, `fkfarmacia`, `fkestado`) VALUES
(1, 1, 7, 2);

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
  ADD KEY `fk_orden_estado1_idx` (`fkestado`),
  ADD KEY `fk_orden_usuario1` (`fkusuario`);

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
  ADD KEY `fkestado` (`fkestado`),
  ADD KEY `fkpedido` (`fkpedido`),
  ADD KEY `fkproducto_farmacia` (`fkproducto_farmacia`);

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
  ADD KEY `fk_producto_estado1_idx` (`fkestado`),
  ADD KEY `fkpresentacion` (`fkpresentacion`);

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
-- Indices de la tabla `usuario_farmacia`
--
ALTER TABLE `usuario_farmacia`
  ADD PRIMARY KEY (`idusuario_farmacia`),
  ADD KEY `fkusuario` (`fkusuario`),
  ADD KEY `fkestado` (`fkestado`),
  ADD KEY `fkfarmacia` (`fkfarmacia`);

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
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `idfarmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `idlaboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `login_access`
--
ALTER TABLE `login_access`
  MODIFY `idaccess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idmunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `idorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `idpedido_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `idpresentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto_famacia`
--
ALTER TABLE `producto_famacia`
  MODIFY `idproducto_famacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `idtipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_contacto`
--
ALTER TABLE `usuario_contacto`
  MODIFY `idusuario_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_farmacia`
--
ALTER TABLE `usuario_farmacia`
  MODIFY `idusuario_farmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `pedido_producto_ibfk_1` FOREIGN KEY (`fkproducto_farmacia`) REFERENCES `producto_famacia` (`idproducto_famacia`),
  ADD CONSTRAINT `pedido_producto_ibfk_2` FOREIGN KEY (`fkpedido`) REFERENCES `pedido` (`idpedido`),
  ADD CONSTRAINT `pedido_producto_ibfk_3` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`);

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
  ADD CONSTRAINT `fk_producto_tipo_producto1` FOREIGN KEY (`fktipo_producto`) REFERENCES `tipo_producto` (`idtipo_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`fkpresentacion`) REFERENCES `presentacion` (`idpresentacion`);

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

--
-- Filtros para la tabla `usuario_farmacia`
--
ALTER TABLE `usuario_farmacia`
  ADD CONSTRAINT `usuario_farmacia_ibfk_1` FOREIGN KEY (`fkfarmacia`) REFERENCES `farmacia` (`idfarmacia`),
  ADD CONSTRAINT `usuario_farmacia_ibfk_2` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `usuario_farmacia_ibfk_3` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`idestado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
