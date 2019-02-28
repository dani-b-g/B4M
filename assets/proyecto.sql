-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2019 a las 10:08:39
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id_ins` int(11) NOT NULL,
  `nombre_ins` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id_ins`, `nombre_ins`) VALUES
(12, 'Guitarra'),
(13, 'Bajo');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mensajeria`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `mensajeria` (
`id_men` int(11)
,`rem_men` int(11)
,`des_men` int(11)
,`fecha_men` date
,`titulo_men` varchar(50)
,`cuerpo_men` text
,`estado_men` tinyint(4)
,`destino` varchar(15)
,`salida` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_men` int(11) NOT NULL,
  `rem_men` int(11) NOT NULL,
  `des_men` int(11) NOT NULL,
  `fecha_men` date NOT NULL COMMENT 'año,mes,dia',
  `titulo_men` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_men` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_men` tinyint(4) NOT NULL COMMENT 'Visto o no '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_men`, `rem_men`, `des_men`, `fecha_men`, `titulo_men`, `cuerpo_men`, `estado_men`) VALUES
(1, 1, 2, '2019-02-06', 'Bienvendio', 'Bienvenido a g4m', 0),
(2, 1, 2, '0000-00-00', 'Hola', 'Buenas\r\n', 0),
(3, 1, 2, '2019-02-28', 'Hola otra vez', 'Esto es otro test', 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `user_men`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `user_men` (
`id_men` int(11)
,`rem_men` int(11)
,`des_men` int(11)
,`fecha_men` date
,`titulo_men` varchar(50)
,`cuerpo_men` text
,`estado_men` tinyint(4)
,`nombre_usu` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `user_men2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `user_men2` (
`id_men` int(11)
,`rem_men` int(11)
,`des_men` int(11)
,`fecha_men` date
,`titulo_men` varchar(50)
,`cuerpo_men` text
,`estado_men` tinyint(4)
,`destino` varchar(15)
,`salida` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombre_usu` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `pass_usu` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email_usu` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usu` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `apenom_usu` varchar(125) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombrecompleto',
  `ciudad_usu` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `desc_usu` text COLLATE utf8_spanish_ci NOT NULL,
  `estilo_usu` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre_usu`, `pass_usu`, `email_usu`, `tipo_usu`, `apenom_usu`, `ciudad_usu`, `desc_usu`, `estilo_usu`) VALUES
(1, 'daniel', '$2y$10$x/kwMlZv39oWkNfJ2D7K4u0v5YUjReCJbqM38oS1kWo7/8T8JQt8G', 'daniel@email.com', 'm', 'Daniel Barriga', 'Caceres', 'Esto es uan descripcion un poco mas larga para ver el display de las cosas asdasdasdasdasdasdasdasdasdasdasasdasdasdasdasdasdasdasdasdasdas', 'EEEEJEJEJE'),
(2, 'pedro', '$2y$10$QM7APB7grc8TE7VzJ0c8eu5DKXq5ucXNWK8nWjzX3NzY5XZSelayW', 'pedro@hotmail.com', 'm', 'Pedro', 'Caceres', 'Esto es la descripcio nde pedro', 'Pop');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarios_instrumentos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuarios_instrumentos` (
`id_usu` int(11)
,`nombre_usu` varchar(15)
,`email_usu` varchar(255)
,`tipo_usu` char(1)
,`apenom_usu` varchar(125)
,`ciudad_usu` varchar(15)
,`desc_usu` text
,`estilo_usu` varchar(25)
,`id_ins` int(11)
,`nombre_ins` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarios_instrumentos2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuarios_instrumentos2` (
`id_usu` int(11)
,`nombre_usu` varchar(15)
,`email_usu` varchar(255)
,`tipo_usu` char(1)
,`apenom_usu` varchar(125)
,`ciudad_usu` varchar(15)
,`desc_usu` text
,`estilo_usu` varchar(25)
,`id_ins` int(11)
,`nombre_ins` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_ins`
--

CREATE TABLE `usu_ins` (
  `instrumento` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usu_ins`
--

INSERT INTO `usu_ins` (`instrumento`, `usuario`) VALUES
(12, 1),
(12, 2),
(13, 1),
(13, 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `mensajeria`
--
DROP TABLE IF EXISTS `mensajeria`;

CREATE VIEW `mensajeria`  AS  select `mensajes`.`id_men` AS `id_men`,`mensajes`.`rem_men` AS `rem_men`,`mensajes`.`des_men` AS `des_men`,`mensajes`.`fecha_men` AS `fecha_men`,`mensajes`.`titulo_men` AS `titulo_men`,`mensajes`.`cuerpo_men` AS `cuerpo_men`,`mensajes`.`estado_men` AS `estado_men`,`usuarios`.`nombre_usu` AS `destino`,`usuarios`.`nombre_usu` AS `salida` from (`mensajes` join `usuarios` on((`mensajes`.`rem_men` = `usuarios`.`id_usu`))) ;

-- --------------------------------------------------------


--
-- Estructura para la vista `usuarios_instrumentos`
--
DROP TABLE IF EXISTS `usuarios_instrumentos`;

CREATE VIEW `usuarios_instrumentos`  AS  select `usuarios`.`id_usu` AS `id_usu`,`usuarios`.`nombre_usu` AS `nombre_usu`,`usuarios`.`email_usu` AS `email_usu`,`usuarios`.`tipo_usu` AS `tipo_usu`,`usuarios`.`apenom_usu` AS `apenom_usu`,`usuarios`.`ciudad_usu` AS `ciudad_usu`,`usuarios`.`desc_usu` AS `desc_usu`,`usuarios`.`estilo_usu` AS `estilo_usu`,`instrumentos`.`id_ins` AS `id_ins`,`instrumentos`.`nombre_ins` AS `nombre_ins` from ((`usuarios` join `usu_ins` on((`usuarios`.`id_usu` = `usu_ins`.`usuario`))) join `instrumentos` on((`usu_ins`.`instrumento` = `instrumentos`.`id_ins`))) ;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id_ins`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_men`),
  ADD KEY `des_men` (`des_men`),
  ADD KEY `rem_men` (`rem_men`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `nombre_usu` (`nombre_usu`),
  ADD UNIQUE KEY `email_usu` (`email_usu`);

--
-- Indices de la tabla `usu_ins`
--
ALTER TABLE `usu_ins`
  ADD PRIMARY KEY (`instrumento`,`usuario`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_men` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`rem_men`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`des_men`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `usu_ins`
--
ALTER TABLE `usu_ins`
  ADD CONSTRAINT `usu_ins_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `usu_ins_ibfk_2` FOREIGN KEY (`instrumento`) REFERENCES `instrumentos` (`id_ins`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
