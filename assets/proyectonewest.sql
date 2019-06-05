-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2019 a las 10:46:20
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

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
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id_an` int(11) NOT NULL,
  `usu_an` int(11) NOT NULL,
  `titulo_an` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_an` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_an` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_an`, `usu_an`, `titulo_an`, `cuerpo_an`, `fecha_an`) VALUES
(6, 1, 'Lorem Ipsum ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-06-02 19:46:00'),
(7, 1, 'Lorem Ipsum ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-06-02 19:46:00'),
(8, 1, 'Lorem Ipsum ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-06-02 19:59:44'),
(9, 1, 'Lorem Ipsum ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-06-02 19:59:56'),
(10, 1, 'Esto es una prueba para el manual', 'En este manual estamos comprobando como añadir un post', '2019-06-03 15:41:07');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `avisos_usu`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `avisos_usu` (
`id_an` int(11)
,`usu_an` int(11)
,`titulo_an` varchar(50)
,`cuerpo_an` text
,`fecha_an` datetime
,`nombre_usu` varchar(15)
,`img_usu` varchar(150)
);

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
(12, 'Guitarra Clásica'),
(13, 'Bajo'),
(14, 'Batería'),
(15, 'Voz'),
(16, 'Teclado'),
(17, 'Saxofón'),
(18, 'Violín'),
(19, 'Flauta'),
(20, 'Arpa'),
(21, 'Zanfona'),
(22, 'Guitarra Eléctrica');

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
,`destino` int(11)
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
(1, 1, 2, '2019-02-06', 'Bienvendio', 'Bienvenido a g4m', 1),
(2, 1, 2, '0000-00-00', 'Hola', 'Buenas\r\n', 1),
(3, 1, 2, '2019-02-28', 'Hola otra vez', 'Esto es otro test', 1),
(5, 1, 2, '2019-03-06', 'Hola parece que me respondiste', 'asdas', 1),
(6, 1, 2, '2019-03-06', 'Parece que respondist', 'Hola de nuevo ', 1),
(11, 2, 1, '2019-06-03', 'Hola daniel este es un mensaje para ti', 'Este mensaje es para darte la bienvenida por su registro y unirse a nosotros.', 1),
(12, 1, 2, '2019-06-05', 'asda', '<<<Este mensaje es para darte la bienvenida por su registro y unirse a nosotros.>>>\r\nEscribe a partir de aqui:asdasd', 1);

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
  `estilo_usu` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `img_usu` varchar(150) COLLATE utf8_spanish_ci NOT NULL COMMENT 'PATH IMGAgenusuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre_usu`, `pass_usu`, `email_usu`, `tipo_usu`, `apenom_usu`, `ciudad_usu`, `desc_usu`, `estilo_usu`, `img_usu`) VALUES
(1, 'daniel', '$2y$10$x/kwMlZv39oWkNfJ2D7K4u0v5YUjReCJbqM38oS1kWo7/8T8JQt8G', 'daniel@email.com', 'm', 'Daniel Barriga', 'Caceres', 'Esto es una descripción en la cual el usuario puede explicar su ambiciones y algo mas de el.\r\n', 'Inde', 'assets/img/avatares/1.jpg'),
(2, 'pedro', '$2y$10$QM7APB7grc8TE7VzJ0c8eu5DKXq5ucXNWK8nWjzX3NzY5XZSelayW', 'pedro@hotmail.com', 'm', 'Pedro', 'Caceres', 'Esto es la descripción de pedro', 'Pop', ''),
(3, 'mittajipi', '$2y$10$HhMH9VJA7btN/cnYB4B9Re8iN.9WqubTBY3J5EK5Dya9R.fbXPe52', 'marina@marina.es', 'm', 'Marina Jimenez Priris', 'Vitoria', 'ME ghusta la musica vasca, la que se tocan tirando piedras a ovejas', 'Folk pagano', ''),
(4, 'nidirina', '$2y$10$eZ8hTx0VHOggJM/CUJQpDOmXj.NwLObGiaNo36NmQzbUUm5zTFPxy', 'nidirina@gmail.com', 'm', 'Nerea Puerto Sendín', 'Cáceres', 'Me gusta la musica wena', 'Rock', '');

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
,`img_usu` varchar(150)
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
(12, 3),
(12, 4),
(13, 1),
(13, 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `avisos_usu`
--
DROP TABLE IF EXISTS `avisos_usu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `avisos_usu`  AS  select `anuncios`.`id_an` AS `id_an`,`anuncios`.`usu_an` AS `usu_an`,`anuncios`.`titulo_an` AS `titulo_an`,`anuncios`.`cuerpo_an` AS `cuerpo_an`,`anuncios`.`fecha_an` AS `fecha_an`,`usuarios`.`nombre_usu` AS `nombre_usu`,`usuarios`.`img_usu` AS `img_usu` from (`anuncios` join `usuarios` on((`anuncios`.`usu_an` = `usuarios`.`id_usu`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `mensajeria`
--
DROP TABLE IF EXISTS `mensajeria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mensajeria`  AS  select `mensajes`.`id_men` AS `id_men`,`mensajes`.`rem_men` AS `rem_men`,`mensajes`.`des_men` AS `des_men`,`mensajes`.`fecha_men` AS `fecha_men`,`mensajes`.`titulo_men` AS `titulo_men`,`mensajes`.`cuerpo_men` AS `cuerpo_men`,`mensajes`.`estado_men` AS `estado_men`,`mensajes`.`des_men` AS `destino`,`usuarios`.`nombre_usu` AS `salida` from (`mensajes` join `usuarios` on((`mensajes`.`rem_men` = `usuarios`.`id_usu`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuarios_instrumentos`
--
DROP TABLE IF EXISTS `usuarios_instrumentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios_instrumentos`  AS  select `usuarios`.`id_usu` AS `id_usu`,`usuarios`.`nombre_usu` AS `nombre_usu`,`usuarios`.`email_usu` AS `email_usu`,`usuarios`.`tipo_usu` AS `tipo_usu`,`usuarios`.`apenom_usu` AS `apenom_usu`,`usuarios`.`ciudad_usu` AS `ciudad_usu`,`usuarios`.`desc_usu` AS `desc_usu`,`usuarios`.`estilo_usu` AS `estilo_usu`,`instrumentos`.`id_ins` AS `id_ins`,`instrumentos`.`nombre_ins` AS `nombre_ins`,`usuarios`.`img_usu` AS `img_usu` from ((`usuarios` join `usu_ins` on((`usuarios`.`id_usu` = `usu_ins`.`usuario`))) join `instrumentos` on((`usu_ins`.`instrumento` = `instrumentos`.`id_ins`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id_an`),
  ADD KEY `usu_an` (`usu_an`);

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
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id_an` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_men` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`usu_an`) REFERENCES `usuarios` (`id_usu`);

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
