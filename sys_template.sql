-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-03-2017 a las 10:05:51
-- Versión del servidor: 5.7.17-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sys_template`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `CODIGO` int(10) UNSIGNED NOT NULL,
  `CODIGO_USUARIO` varchar(10) NOT NULL,
  `FECHA` datetime NOT NULL,
  `ACCION` varchar(100) NOT NULL,
  `ID_AFECTADO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `codigo` int(11) NOT NULL,
  `codigo_rol` int(11) NOT NULL,
  `codigo_menu` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='union de submenu con usuarios para crear menu en la web';

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`codigo`, `codigo_rol`, `codigo_menu`) VALUES
(2, 1, '0'),
(3, 1, '1'),
(4, 1, '1.3'),
(5, 1, '1.2'),
(6, 1, '1.1'),
(7, 1, '0.1'),
(8, 1, '1.4'),
(50, 1, '1.5'),
(72, 1, '1.6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `codigo_menu` varchar(6) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL COMMENT 'Menu que aparece en la web....tipo tendra 0 o 1(menu principal y submenu respectivamente)',
  `url` varchar(80) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `icono` varchar(50) NOT NULL DEFAULT 'i-home',
  `prioridad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`codigo_menu`, `nombre`, `url`, `tipo`, `icono`, `prioridad`) VALUES
('0', 'DASHBOARD', 'dashboard', 'M', 'i-home', 0),
('0.1', 'Inicio', 'admin/main_page', 'S', 'i-home', 0),
('1', 'ADMINISTRACION', NULL, 'M', 'i-cog', 0),
('1.1', 'Usuarios', 'admin/users/show', 'S', 'i-home', 0),
('1.2', 'Menus', 'admin/menu/show', 'S', 'i-home', 0),
('1.3', 'Funciones', 'admin/funciones/show', 'S', 'i-home', 0),
('1.4', 'Roles', 'admin/roles/show', 'S', 'i-home', 0),
('1.5', 'Iconos Menu', 'admin/icons', 'S', '', 0),
('1.6', 'Auditoria', 'admin/auditoria/show', 'S', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_inicio`
--

CREATE TABLE `pagina_inicio` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagina_inicio`
--

INSERT INTO `pagina_inicio` (`codigo`, `titulo`, `mensaje`) VALUES
(1, 'BIENVENIDOS AL SISTEMA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `codigo_rol` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `observacion` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`codigo_rol`, `nombre`, `observacion`) VALUES
(1, 'Administrador', 'Permisos de administrar todo el sistema.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo_usuarios` varchar(8) NOT NULL COMMENT 'Para ingreso al sistema Ej: (mteran)',
  `nombre` varchar(20) DEFAULT 'Nombre' COMMENT 'Nombre completo...para mostrar en la web',
  `apellido` varchar(20) DEFAULT 'Apellido' COMMENT 'Apellido del usuario para mostrar en la web',
  `clave` varchar(256) DEFAULT '1234' COMMENT 'Clave de ingreso al sistema',
  `imagen` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '0',
  `codigo_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contiene usuarios del sistema';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo_usuarios`, `nombre`, `apellido`, `clave`, `imagen`, `estado`, `codigo_rol`) VALUES
('marquin', 'Marco', 'Teran', '761c7920f470038d4c8a619c79eddd62', '60193-3b7ab-marquinteran.jpg', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `FK_auditoria_1` (`CODIGO_USUARIO`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_funciones_rol1_idx` (`codigo_rol`),
  ADD KEY `fk_funciones_menu1_idx` (`codigo_menu`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`codigo_menu`);

--
-- Indices de la tabla `pagina_inicio`
--
ALTER TABLE `pagina_inicio`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`codigo_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo_usuarios`),
  ADD KEY `fk_usuarios_rol1_idx` (`codigo_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `CODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `pagina_inicio`
--
ALTER TABLE `pagina_inicio`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `codigo_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
