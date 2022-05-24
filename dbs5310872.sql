-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2022 a las 18:27:12
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbs5310872`
--
CREATE DATABASE IF NOT EXISTS `dbs5310872` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbs5310872`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_foro`
--

CREATE TABLE `categorias_foro` (
  `id_categoria` int(8) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_foro`
--

INSERT INTO `categorias_foro` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`) VALUES
(1, 'General', 'Categoria General'),
(2, 'Deportes', 'Categoria de Deportes'),
(3, 'Adaptaciones', 'Categoria de Adaptaciones'),
(4, 'Movilidad', 'Categoria de Movilidad'),
(5, 'Libre', 'Categoria de Libertad'),
(6, 'Casa', 'Categoria de Casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `id_historia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `idioma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`id_historia`, `id_usuario`, `titulo`, `descripcion`, `fecha_creacion`, `idioma`) VALUES
(50, 76, 'Prueba1 escrita por Diego', 'aaaa', '2022-05-24 15:38:21', 'Castellano'),
(51, 77, 'Prueba1 escrita por Edu', 'aaaa', '2022-05-24 15:38:21', 'Castellano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_deleted`
--

CREATE TABLE `historias_deleted` (
  `id_deleted` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenido` text NOT NULL,
  `idioma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `id_hilo` int(11) NOT NULL,
  `envia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `asunto` varchar(300) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `profesorV` tinyint(1) NOT NULL,
  `alumnoV` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_foro`
--

CREATE TABLE `respuestas_foro` (
  `id_respuesta` int(8) NOT NULL,
  `contenido_respuesta` text NOT NULL,
  `fecha_respuesta` timestamp NULL DEFAULT current_timestamp(),
  `tema_respuesta` int(8) NOT NULL,
  `by_respuesta` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas_foro`
--

INSERT INTO `respuestas_foro` (`id_respuesta`, `contenido_respuesta`, `fecha_respuesta`, `tema_respuesta`, `by_respuesta`) VALUES
(1, 'Hola esto es una pregunta de deportes?', '2022-05-10 22:00:00', 11, 70),
(4, 'Si y esto es una respuesta de deportes', '2022-05-10 22:00:00', 11, 70),
(56, '<p>hola pregunto en el tema 1</p>\r\n<p>&nbsp;</p>', '2022-05-12 14:52:38', 14, 70),
(57, '<p>Hola pregunto en el tema 2 de adaptaciones</p>', '2022-05-12 14:53:01', 15, 70),
(58, '<p>Hola pregunto en el tema 3 de adaptaciones</p>', '2022-05-12 14:53:12', 16, 70),
(59, '\r\nhola respondo en el tema 1\r\n', '2022-05-12 15:26:14', 14, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_foro`
--

CREATE TABLE `temas_foro` (
  `id_tema` int(8) NOT NULL,
  `asunto_tema` varchar(255) NOT NULL,
  `fecha_tema` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_tema` int(8) NOT NULL,
  `by_tema` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temas_foro`
--

INSERT INTO `temas_foro` (`id_tema`, `asunto_tema`, `fecha_tema`, `categoria_tema`, `by_tema`) VALUES
(13, 'Prueba tema deportes', '2022-05-12 15:26:14', 2, 76),
(14, 'tema 1 en adaptaciones', '2022-05-05 11:41:53', 3, 77),
(15, 'tema 2 en adaptaciones', '2022-05-05 11:41:53', 3, 77),
(16, 'tema 3 en adaptaciones', '2022-05-05 11:41:53', 3, 77),
(17, 'tema 2 en deportes', '2022-05-05 11:41:53', 2, 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `vr_apps` text DEFAULT NULL,
  `foto_perfil` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `rol` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `google` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `apellidos`, `email`, `telefono`, `fecha_nac`, `descripcion`, `vr_apps`, `foto_perfil`, `fecha_creacion`, `rol`, `activo`, `google`) VALUES
(76, 'diego', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Diego', 'Serrano', 'diegoserrano1644@gmail.com', '600619959', '2001-11-16', NULL, NULL, 'img/default_user.png', '2022-05-24 17:28:18', 1, 1, 0),
(77, 'edu', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Edu', 'Romeu', 'edu@gmail.com', '123456789', '1995-03-11', NULL, NULL, 'img/default_user.png', '2022-05-24 17:39:19', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tokens`
--

CREATE TABLE `usuario_tokens` (
  `id_user` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_foro`
--
ALTER TABLE `categorias_foro`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  ADD PRIMARY KEY (`id_deleted`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `envia` (`envia`);

--
-- Indices de la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `by_respuesta` (`by_respuesta`),
  ADD KEY `tema_respuesta` (`tema_respuesta`);

--
-- Indices de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `by_tema` (`by_tema`),
  ADD KEY `categoria_tema` (`categoria_tema`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuario_tokens`
--
ALTER TABLE `usuario_tokens`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_foro`
--
ALTER TABLE `categorias_foro`
  MODIFY `id_categoria` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  MODIFY `id_deleted` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  MODIFY `id_respuesta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  MODIFY `id_tema` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `historias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  ADD CONSTRAINT `historias_deleted_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  ADD CONSTRAINT `respuestas_foro_ibfk_1` FOREIGN KEY (`by_respuesta`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_foro_ibfk_2` FOREIGN KEY (`tema_respuesta`) REFERENCES `temas_foro` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  ADD CONSTRAINT `temas_foro_ibfk_1` FOREIGN KEY (`by_tema`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `temas_foro_ibfk_2` FOREIGN KEY (`categoria_tema`) REFERENCES `categorias_foro` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_tokens`
--
ALTER TABLE `usuario_tokens`
  ADD CONSTRAINT `usuario_tokens_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
