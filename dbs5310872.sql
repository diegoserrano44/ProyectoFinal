-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2022 a las 18:14:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

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
(62, 78, 'Historia de Admin', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-05-31 13:13:55', 'AAA'),
(67, 77, 'Prueba 3 Edu', 'ssss', '2022-06-01 08:27:36', 'AAA'),
(69, 76, 'Combustible GLP, todo lo que debes saber', 'Hola mi nombre es Diego Serrano y quiero contaros algo de esto de mi vida y como lo llevo. Es dificil de explicar...\r\n\r\nBueno lo inttentaré y es lo uniuco qiue puedo hacer porque si no no pueedo probar.', '2022-06-01 10:03:09', 'AAA');

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
  `idioma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historias_deleted`
--

INSERT INTO `historias_deleted` (`id_deleted`, `id_usuario`, `titulo`, `descripcion`, `fecha_creacion`, `idioma`) VALUES
(17, 77, 'Prueba 4 Edu', 'aaaaaa', '2022-06-01 08:28:25', 'AAA'),
(18, 77, 'Prueba1 escrita por Edu', 'aaaa', '2022-06-01 08:30:02', 'Castellano'),
(19, 77, 'Prueba 2 Edu', 'aaaaaaaa', '2022-06-01 08:31:32', 'AAA'),
(20, 76, 'Problemas de conducir a bajas revoluciones', 'Hola quiero hacer esto.\r\n\r\nContinuar aquí', '2022-06-02 08:03:44', 'Castellano'),
(21, 76, 'Todos los modelos Subaru en Japan Lesseps', 'Mi historia\nAqu&iacute; explico los modelos subaru. alli esto\n&nbsp;\nAqu&iacute; lo otro\nEsto es muy importante', '2022-06-02 09:08:27', 'Castellano'),
(22, 76, 'Todo sobre el Subaru XV', '<p><strong><span style=\"font-size: 18pt;\">Probando las historias enriquecidas</span></strong></p>\r\n<p>Esto es <strong>importante</strong>. Y <em>esto</em></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"background-color: #bfedd2;\">Diego Serrano</span></p>', '2022-06-02 16:11:05', 'AAA');

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

INSERT INTO `mensajes` (`id_mensaje`, `id_hilo`, `envia`, `id_profesor`, `id_alumno`, `asunto`, `mensaje`, `fecha_creacion`, `profesorV`, `alumnoV`) VALUES
(112, 1, 77, 76, 77, 'prueba', 'hola', '2022-05-31 12:53:08', 0, 1),
(113, 2, 78, 76, 78, 'fffff', 'ffffff', '2022-05-31 13:09:58', 1, 1),
(114, 2, 76, 76, 78, 'fffff', 'hola admin que pasa?', '2022-05-31 13:10:28', 1, 1),
(115, 3, 77, 76, 77, 'sss', 'ssss', '2022-05-31 13:11:16', 0, 1),
(116, 4, 77, 76, 77, 'dfef', 'fewrfewrgf', '2022-05-31 13:11:29', 0, 1),
(117, 5, 79, 78, 79, 'aaaaaaaaaa', 'aaaaaaaaaaaaa', '2022-05-31 13:14:25', 1, 1),
(118, 6, 79, 78, 79, 'bbbbbbbb', 'bbbbbbbbbbb', '2022-05-31 13:14:34', 1, 1),
(119, 7, 79, 78, 79, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-05-31 13:16:43', 1, 0),
(120, 8, 76, 78, 76, 'aaaaa', 'aaaaaaaaaaa', '2022-06-01 08:22:12', 1, 0),
(121, 9, 77, 76, 77, 'dewfe', 'gfrgrtg', '2022-06-01 12:54:10', 0, 0);

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
(75, 'sdeg&lt;srgv', '2022-05-26 16:12:16', 79, 76),
(76, 'gergerge', '2022-05-26 16:12:25', 79, 76),
(82, '<p><span style=\"font-size: 18pt; background-color: #bfedd2;\">Hola </span></p>\r\n<p><strong>probando</strong></p>', '2022-06-02 08:01:15', 105, 76),
(83, '<p>prueba de respuesta</p>', '2022-06-02 09:04:08', 109, 76),
(84, '<p><strong>Otra vez yo</strong></p>', '2022-06-02 09:04:20', 109, 76),
(87, '<p>Holaaaa</p>', '2022-06-02 15:13:03', 108, 76),
(88, '<p>Adioooos</p>', '2022-06-02 15:13:12', 108, 76),
(89, '<p>Hola diego pesado</p>', '2022-06-02 15:22:41', 108, 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_foro`
--

CREATE TABLE `temas_foro` (
  `id_tema` int(8) NOT NULL,
  `asunto_tema` varchar(255) NOT NULL,
  `fecha_tema` timestamp NULL DEFAULT current_timestamp(),
  `categoria_tema` int(8) NOT NULL,
  `by_tema` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temas_foro`
--

INSERT INTO `temas_foro` (`id_tema`, `asunto_tema`, `fecha_tema`, `categoria_tema`, `by_tema`) VALUES
(105, 'Tema 3 deportes', '2022-06-01 08:32:46', 2, 77),
(108, '¿Por qué elegir coches híbridos?', '2022-06-02 08:35:01', 1, 76),
(109, 'Combustible GLP, todo lo que debes saber', '2022-06-02 09:03:22', 1, 76);

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
(76, 'diego', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Diego', 'Serrano', 'diego@gmail.com', '600619959', '2001-11-16', 'Hola soy diego', '', 'img/diego.png', '2022-05-31 15:12:45', 1, 1, 0),
(77, 'edu', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Edu', 'Romeu', 'edu@gmail.com', '123456789', '1995-03-11', '', '', 'img/edu.png', '2022-05-24 17:39:19', 1, 1, 0),
(78, 'admin', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Diego', 'Serrano', 'admin@gmail.com', '600619959', '2001-11-16', '', '', 'img/diego.png', '2022-05-24 17:28:18', 1, 1, 0);

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
-- Volcado de datos para la tabla `usuario_tokens`
--

INSERT INTO `usuario_tokens` (`id_user`, `token`, `fecha`) VALUES
(79, '33036a8cf615b35fb8eba3efeea1d8d4a2a4a757', '2022-07-01');

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
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  MODIFY `id_deleted` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  MODIFY `id_respuesta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  MODIFY `id_tema` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
