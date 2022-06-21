-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-05-2022 a las 09:50:32
-- Versión del servidor: 10.5.15-MariaDB-cll-lve
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bullgymo_bullgym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre`, `user_id`, `fecha`, `hora_inicio`, `hora_fin`, `created`, `updated`) VALUES
(9, 'Natación', 28, '2022-05-23', '09:00:00', '10:30:00', '2022-05-23 06:18:50', '2022-05-23 06:18:50'),
(10, 'Ciclo Indoo', 28, '2022-05-24', '12:00:00', '14:00:00', '2022-05-23 06:19:31', '2022-05-23 06:19:31'),
(11, 'Zumba', 27, '2022-07-01', '18:00:00', '19:00:00', '2022-05-23 08:32:17', '2022-05-23 08:32:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_users`
--

CREATE TABLE `actividades_users` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades_users`
--

INSERT INTO `actividades_users` (`id`, `id_actividad`, `id_usuario`, `created`, `updated`) VALUES
(7, 9, 26, '2022-05-23 06:37:11', '2022-05-23 06:37:11'),
(8, 11, 27, '2022-05-23 08:32:22', '2022-05-23 08:32:22'),
(9, 11, 28, '2022-05-23 08:38:36', '2022-05-23 08:38:36'),
(10, 11, 26, '2022-05-23 08:47:54', '2022-05-23 08:47:54'),
(12, 11, 34, '2022-05-30 07:00:22', '2022-05-30 07:00:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `hora_inicio` varchar(200) NOT NULL,
  `hora_fin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_imagen` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_imagen`, `nombre`, `image`) VALUES
(7, 'Natacion sincronizada', 'foto-img/natacion.jpg'),
(8, 'Ciclo Indoor', 'foto-img/ciclo indoor.jpg'),
(10, 'Musculación', 'foto-img/descarga.jfif'),
(11, 'Actividad de Zumba', 'foto-img/zumba.jpg'),
(12, 'preuba', 'foto-img/natac.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `texto`, `image`, `fecha_creacion`) VALUES
(13, 'Presentamos las nuevas GClass en el Maratón Fitness Solidario', 'El próximo sábado 21 de mayo de 9:30 a 13:30 horas tienes una cita: ¡el Maratón Fitness Solidario! Una nueva GClass Experience que tendrá lugar en el Centro Comercial El Faro en Badajoz dónde presentaremos en primicia las nuevas presentaciones GClass: GBo', 'noticia-img/maraton.jpg', '2022-05-23'),
(15, '9 tips que te ayudarán a prepararte este verano', 'Tras haber empezado nuestra operación verano, se acerca la recta final. Hoy te traemos unos consejos muy fáciles de aplicar para darte el último empujón:  Debes conseguir mantener un déficit calórico a lo largo de las semanas y los meses.  Prioriza aument', 'noticia-img/tips.png', '2022-05-23'),
(16, 'Enhorabuena por la apertura del gym', 'En la Rioja no había', 'noticia-img/09rioja_regions_map1.jpg', '2022-05-23'),
(17, 'prueeba', 'aaaaaaaaaaaaaa', 'noticia-img/natac.jpg', '2022-05-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220517203450, 'CreateEvents', '2022-05-17 18:37:05', '2022-05-17 18:37:05', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `rutina` varchar(300) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `rutina_dir` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id`, `id_usuario`, `descripcion`, `rutina`, `fecha_creacion`, `fecha_modificacion`, `rutina_dir`) VALUES
(10, 28, 'Rutina de cardio', 'cardio.pdf', '2022-05-23 06:22:35', '2022-05-23 06:22:35', '7e0309ec-09d2-43ac-9bed-2aba5af40ea5'),
(11, 28, 'Rutina hiipertrofia muscular', 'rutina-completa-cinco-dias-semana-para-hipertrofia-muscular-1.pdf', '2022-05-23 06:23:22', '2022-05-23 06:23:22', '6939513e-4327-422c-bab5-846ed564e8ab');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `abonado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `fecha_fin_abono` date DEFAULT NULL,
  `rol` varchar(255) NOT NULL DEFAULT 'usuario',
  `image` varchar(255) NOT NULL DEFAULT 'user-img/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usuario`, `nombre`, `apellidos`, `fecha_nac`, `telefono`, `email`, `password`, `abonado`, `fecha_registro`, `fecha_fin_abono`, `rol`, `image`) VALUES
(26, 'Abonado', 'Agudeo Ochoa', '2021-01-18', '642110929', 'smr01.2018@gmail.com', '$2y$10$eX4L2dgp6LhvibOSd7E9gerKJivIJeaosIFcKRLMkE0Ule8ix9XEW', 1, '2022-05-23', '2022-07-23', 'abonado', 'user-img/user.png'),
(27, 'administrador', 'admin', '2026-04-18', '643214567', 'admin@admin.com', '$2y$10$OJrRjQQEY6KDNY3GEyID4uh0YMFFeAaRsKxkHFWxWEvf5AlsKerzG', 0, '2022-05-23', NULL, 'admin', 'user-img/user.png'),
(28, 'Monitor', 'Monitoreador', '2025-09-08', '666666666', 'monitor@monitor.com', '$2y$10$mUulF/fyzryKniHRBpwBM.piGyb2TnR2GWyl6mM0BhUbsOHXmW8eK', 0, '2022-05-23', NULL, 'monitor', 'user-img/user.png'),
(30, 'imagen', 'imagen', '2000-01-18', '642887929', 'daw01.2021@gmail.com', '$2y$10$Dp9ZtQpVXYzxR4.TQfIo6um/67pMSNtJoNrbg.Gf4AEnOjUEQRws.', 1, '2022-05-26', '2022-06-26', 'abonado', 'user-img/user.png'),
(31, 'test', 'test', '2000-01-18', '68799444', 'test@test.com', '$2y$10$lzifpJQ6YvgQMXG3Y0fI5uSUWlp9syqlRd2EAoeANttvlpDf89pq.', 0, '2022-05-26', '2021-06-26', 'usuario', 'user-img/user.png'),
(33, 'agrega', 'do', '2000-10-18', '578977426', '666@666.com', '$2y$10$wBpNGbecWBKjNp4fXGg3FehFhcN.djoYVwXTWN2needp9EwOEZinu', 0, '2022-05-30', '2022-05-04', 'usuario', 'user-img/user.png'),
(34, 'prueba', 'prueba', '2000-01-18', '642110929', 'licox21958@steamoh.com', '$2y$10$yfh7cInfDAJIkJQ/ETc/QOLXVhkbxNcv/58xSLES7Z5nBR2fyiQoi', 1, '2022-05-30', '2023-05-30', 'abonado', 'user-img/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_FK_1` (`user_id`);

--
-- Indices de la tabla `actividades_users`
--
ALTER TABLE `actividades_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `actividades_users`
--
ALTER TABLE `actividades_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_FK_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
