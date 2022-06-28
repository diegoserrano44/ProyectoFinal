-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2022 a las 21:35:59
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

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
(1, 2, 'Nick: sin brazos, sin piernas y sin límites', '<p>Nick Vujicic naci&oacute; en Melbourne (Australia) en el a&ntilde;o 1982 y debido a una enfermedad vino al mundo sin extremidades. A pesar de las limitaciones, Nick ha logrado&nbsp;<strong>hacer paracaidismo, protagonizar cortometrajes, escribir un best-seller (<em>No legs, no arms, no worries</em>), jugar al f&uacute;tbol y al golf, convertirse en un gran orador, casarse y tener hijos</strong>.</p>\r\n<p>Nick es feliz: no piensa en lo que no tiene, sino&nbsp;que est&aacute; agradecido por lo que s&iacute; tiene, por qui&eacute;n es, y deja de lado sus miedos. Lo que transmite Nick es que es necesario aceptar la vida tal y como viene, sabiendo que podemos conseguir lo que queramos con esfuerzo y perseverancia.</p>\r\n<p><span style=\"background-color: #fbeeb8;\"><em><strong>Pablo L&oacute;pez</strong></em></span></p>', '2022-06-23 14:10:34', 'Castellano'),
(2, 2, 'Sin poder caminar por un accidente de tráfico', '<p>Hoy en este espacio, quiero contar la historia de Carla, una joven que con tan solo 14 a&ntilde;os, tuvo que enfrentarse tanto al dolor fisco como al emocional.</p>\r\nMayo de 2019 Acude a cl&iacute;nica CEMTRO una joven derivada del hospital de Don Benito (Badajoz).\r\nD&iacute;as antes ya hab&iacute;a contactado con nosotros su padre, al haber conocido la existencia de la unidad de accidentes de tr&aacute;fico de la asociaci&oacute;n espa&ntilde;ola de lesiones deportivas.\r\nElla viajaba de copiloto y el conductor hab&iacute;a sido derivado d&iacute;as antes a nuestro hospital, pero de &eacute;l ya hablaremos en otro momento.\r\nRecuerdo la desesperaci&oacute;n de juan Carlos (padre) ante la impotencia de no darle despu&eacute;s de casi un mes el tratamiento definitivo a su hija, ver con desesperaci&oacute;n la situaci&oacute;n y las malas condiciones en la que se encontraba su hija en Don Benito.\r\nPor fin se autoriza el traslado, forzado a nuestro servicio de medicina interna para agilizarlo, debido a la infecci&oacute;n que sufr&iacute;a Carla.\r\nNo voy a negar que cuando la recib&iacute; en urgencias, me impacto, no pod&iacute;a dar cr&eacute;dito de que una paciente ingresada en un hospital casi un mes, llegara en el estado tan lamentable que llego.\r\nEse mismo d&iacute;a fue sometida a todo tipo de pruebas y anal&iacute;ticas&hellip;. Hab&iacute;a que espera la anal&iacute;tica y el tejido no estaban bien, despu&eacute;s de un largo debate los doctores Almaraz y Novoa, deciden dar un tiempo prudencial para poder intervenir con seguridad, mientras medicina interna trabaja contrarreloj para controlar la infecci&oacute;n.\r\nLos d&iacute;as pasan y su estado mejora, ha llegado el momento tan esperado y temido al mismo tiempo.\r\nSe decide que ha llegado el momento de operar&hellip;.\r\nJuan Carlos y Silvia, se miraban y esa mirada lo dec&iacute;a todo, el dolor de unos padres impotentes viendo como su &uacute;nica hija, iba camino al quir&oacute;fano con un pron&oacute;stico no muy alentador.\r\nLas horas pasaban y el nerviosismo se apoderaba de esos padres.\r\nTras 9 horas de cirug&iacute;a, suena el tel&eacute;fono, su rostro palidece ante la noticia que les puedan dar.\r\nEra el Dr. Almaraz quien estaba al otro lado de la l&iacute;nea telef&oacute;nica, hubo un silencio de segundos y la emoci&oacute;n se apodero de los padres, todo hab&iacute;a salido bien la cirug&iacute;a fue un &eacute;xito.\r\nA las pocas horas Carla estaba en la habitaci&oacute;n, ahora comienza una dura batalla por poder caminar.\r\nPas&oacute; casi un mes hasta que Carla pudo salir del hospital y empezar un largo camino de recuperaci&oacute;n.\r\nEn plena recuperaci&oacute;n, Carla sufre un duro golpe emocional, Juan Carlos, su padre y apoyo sufre una sinusitis y por desgracia o por una atenci&oacute;n inadecuada, Juan Carlos fallece d&iacute;as despu&eacute;s debido a una meningitis en Badajoz.\r\nCarla entra en una depresi&oacute;n y Silvia se queda sola con su hija al frente de la situaci&oacute;n.\r\nPese al &eacute;xito de las cirug&iacute;as, Carla debe someterse a mas intervenciones para ir acondicionando sus huesos y que pueda hacer una vida normal.\r\nSu d&iacute;a a d&iacute;a no es f&aacute;cil, Silvia tiene que hacer frente a costosas sesiones de fisioterapia que en muchas ocasiones no daban el resultado que esperaban, cambiando en varias ocasiones de cl&iacute;nicas en su pueblo.\r\nLlega el COVID 19 y no ayuda en nada a su recuperaci&oacute;n, con fuerza de voluntad madre e hija van saliendo y Carla sigue mejorando.\r\nSon muchas las barreras a las que han tenido que hacer frente, a decisiones tan absurdas como inhumanas, como es el caso del instituto donde estudia, quien la suspende educaci&oacute;n f&iacute;sica por no hacer el examen, oblig&aacute;ndola a acudir y con sus muletas a las pistas solo para mirar, situaci&oacute;n que hoy no ha cambiado. Por supuesto ella presento un informe m&eacute;dico prohibiendo no realizar ejercicio f&iacute;sico, apoyar la pierna.\r\nPero todo eso quedo atr&aacute;s&hellip;.\r\nHoy es otra historia, toca visita con el Dr. Almaraz y sorpresa, Carla deja las muletas y empieza a dar pasitos sin ellas.\r\nBaja de la consulta y acude al despacho de la unidad de accidentes de tr&aacute;fico de AELD, y me dice Paco, &iquest;quieres verme caminar sin muletas? Y ella orgullosa y feliz camino para los all&iacute; presentes.\r\nA&uacute;n queda camino por recorrer, pero es un paso m&aacute;s para devolver a Carla la normalidad de su vida.\r\nEste articulo se lo dedico a Juan Carlos, un gran hombre y un buen padre, que por desgracia su fue de este mundo sin ver caminar a su hija.\r\nY como no, a Silvia esa madre coraje, que se ha puesto el mundo por montera para luchar por su hija.\r\nMi agradecimiento a mi equipo medico, Dr. Almaraz y Dr. Novoa, a cl&iacute;nica CEMTRO por la confianza en esta unidad de accidentes de tr&aacute;fico y a Erika Gonz&aacute;lez la abogada que ha conseguido que se haga justicia con Carla.\r\n&nbsp;\r\nNo nos enga&ntilde;emos en nuestro d&iacute;a a d&iacute;a tenemos muchas Carlas, y por ellos nos dejamos la piel.\r\n&nbsp;\r\n<span style=\"background-color: #fbeeb8;\"><em><strong>Pablo L&oacute;pez</strong></em></span>', '2022-06-23 14:13:41', 'Castellano');

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
(1, 1, 3, 2, 3, 'Historia sin límites', 'Hola Nick podrias ayudarme?', '2022-06-23 14:15:09', 1, 1),
(2, 1, 2, 2, 3, 'Historia sin límites', 'Hola María, claro que sí', '2022-06-28 14:44:16', 1, 1);

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
(1, '<p>Hola esto es una prueba de la categoria General, alguien puede contestarme?</p>\r\n<p><strong>Pablo</strong></p>', '2022-06-23 15:43:03', 1, 2);

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
(1, 'Prueba de tema general', '2022-06-23 15:36:51', 1, 2),
(2, 'Prueba de tema deportes', '2022-06-23 15:37:02', 2, 2),
(3, 'Prueba de tema adaptaciones', '2022-06-23 15:37:13', 3, 2),
(4, 'Prueba de tema movilidad', '2022-06-23 15:37:28', 4, 2),
(5, 'Prueba de tema libre', '2022-06-23 15:37:40', 5, 2),
(7, 'Prueba de tema casa', '2022-06-23 15:41:03', 6, 2);

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
  `foto_perfil` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `rol` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `google` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `apellidos`, `email`, `telefono`, `fecha_nac`, `descripcion`, `foto_perfil`, `fecha_creacion`, `rol`, `activo`, `google`) VALUES
(1, 'admin', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Diego', 'Serrano', 'diego@gmail.com', '600619959', '2001-11-16', NULL, 'img/default_user.png', '2022-06-23 16:02:26', 1, 1, 0),
(2, 'pablo', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'Pablo', 'López', 'pablolopez@gmail.com', '123456789', '1995-03-12', '', 'img/default_user.png', '2022-06-23 16:03:08', 1, 1, 0),
(3, 'maria', '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', 'María', 'García', 'maria@gmail.com', '673928674', '1998-09-15', NULL, 'img/default_user.png', '2022-06-23 16:04:19', 1, 1, 0);

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
(1, 'd8ebefb69f52144fd8af41327a04d3b85eed05bd', '2022-07-23'),
(2, '6f864f8217fa74bf1372047964fd8b4ae20369b7', '2022-07-23'),
(3, '6c0b2d353a6c234f362ad5863cddd4b0a507a1b4', '2022-07-23');

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
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historias_deleted`
--
ALTER TABLE `historias_deleted`
  MODIFY `id_deleted` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuestas_foro`
--
ALTER TABLE `respuestas_foro`
  MODIFY `id_respuesta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `temas_foro`
--
ALTER TABLE `temas_foro`
  MODIFY `id_tema` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
