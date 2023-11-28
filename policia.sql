-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 11:00:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `policia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `dni_almn` int(20) NOT NULL,
  `nom_almn` text NOT NULL,
  `apell_almn` text NOT NULL,
  `sex_almn` varchar(1) NOT NULL,
  `fdn_almn` date DEFAULT NULL,
  `ldn_almn` text NOT NULL,
  `email_almn` varchar(150) NOT NULL,
  `telefono_almn` varchar(12) NOT NULL,
  `cp_almn` int(4) NOT NULL,
  `distrito_almn` varchar(150) NOT NULL,
  `domicilio_almn` varchar(150) NOT NULL,
  `compañia_almn` int(11) NOT NULL,
  `legajo_almn` int(11) NOT NULL,
  `destino_almn` varchar(150) NOT NULL,
  `comisaria_almn` varchar(150) NOT NULL,
  `secundario_almn` text NOT NULL,
  `nacionalidad_almn` text NOT NULL,
  `aula_almn` varchar(3) NOT NULL,
  `arma_almn` varchar(40) NOT NULL,
  `condicion_almn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armas`
--

CREATE TABLE `armas` (
  `nroSerie_arma` int(11) NOT NULL,
  `tipo_arma` varchar(20) NOT NULL,
  `modelo_arma` varchar(20) NOT NULL,
  `marca_arma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `nro_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula_asig`
--

CREATE TABLE `aula_asig` (
  `id_aula` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `cuatrimestre_asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajas`
--

CREATE TABLE `bajas` (
  `id_baja` int(11) NOT NULL,
  `dni_almn` int(8) NOT NULL,
  `razon_baja` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id_exam` int(11) NOT NULL,
  `dni_almn` int(8) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `tipo_exam` varchar(50) NOT NULL,
  `nota_exam` int(11) NOT NULL,
  `fecha_exam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE `fechas` (
  `id_fecha` int(11) NOT NULL,
  `cuatrimestre_fecha` varchar(40) NOT NULL,
  `inicio_fecha` varchar(40) NOT NULL,
  `final_fecha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_cambios`
--

CREATE TABLE `logs_cambios` (
  `nombre_tab` varchar(20) NOT NULL,
  `id_log` int(11) NOT NULL,
  `fecha_cambio` date NOT NULL,
  `razon_cambio` varchar(1064) NOT NULL,
  `detalles_cambio` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logs_cambios`
--

INSERT INTO `logs_cambios` (`nombre_tab`, `id_log`, `fecha_cambio`, `razon_cambio`, `detalles_cambio`) VALUES
('materias', 1, '2023-11-28', 'Actualización de materia', 'Detalles antes del cambio: \nID: 7. \nNombre de Materia: 3. \nCarga Horaria: 3. \nCurrícula: LIBRE \n\nDetalles después del cambio: \nID: 7. \nNombre de Materia: 4. \nCarga Horaria: 4. \nCurrícula: ANUAL'),
('materias', 2, '2023-11-28', 'Actualización de materia', 'Detalles antes del cambio: \nID: 8. \nNombre de Materia: Derecho Penal. \nCarga Horaria: 200. \nCurrícula: Sin Asignar \n\nDetalles después del cambio: \nID: 8. \nNombre de Materia: Derecho Penal. \nCarga Horaria: 200. \nCurrícula: ANUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_creacion`
--

CREATE TABLE `logs_creacion` (
  `nombre_tab` varchar(20) NOT NULL,
  `id_log` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `razon_creacion` varchar(1064) NOT NULL,
  `detalles_creacion` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logs_creacion`
--

INSERT INTO `logs_creacion` (`nombre_tab`, `id_log`, `fecha_creacion`, `razon_creacion`, `detalles_creacion`) VALUES
('materias', 1, '2023-11-28', 'Creación de materia', 'Nombre de Materia: 3 \nCarga Horaria: 3 \nCurrícula: LIBRE'),
('materias', 2, '2023-11-28', 'Creación de materia', 'Nombre de Materia: Derecho Penal \nCarga Horaria: 200 \nCurrícula: Sin Asignar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_eliminacion`
--

CREATE TABLE `logs_eliminacion` (
  `nombre_tab` varchar(20) NOT NULL,
  `id_log` int(11) NOT NULL,
  `fecha_delete` date NOT NULL,
  `razon_delete` varchar(1064) NOT NULL,
  `detalles_delete` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logs_eliminacion`
--

INSERT INTO `logs_eliminacion` (`nombre_tab`, `id_log`, `fecha_delete`, `razon_delete`, `detalles_delete`) VALUES
('materias', 1, '2023-11-28', 'Prueba.\n12\n34', 'Nombre de Materia: Cibercrimen y Delitos Informáticos. Carga Horaria: 260. Currícula: CUATRIMESTRAL'),
('materias', 2, '2023-11-28', 'Prueba\n13\n24', 'Nombre de Materia: Prueba. \nCarga Horaria: Sin Definir. \nCurrícula: Sin Asignar'),
('materias', 3, '2023-11-28', 'No hay por qué.', 'Nombre de Materia: Derecho Penal. \nCarga Horaria: 200. \nCurrícula: ANUAL'),
('materias', 4, '2023-11-28', '1', 'Nombre de Materia: 1. \nCarga Horaria: 1. \nCurrícula: Sin Asignar'),
('materias', 5, '2023-11-28', 'A', 'ID: 6. \nNombre de Materia: 3. \nCarga Horaria: 3. \nCurrícula: ÚNICA AL FINAL'),
('materias', 6, '2023-11-28', 'a', 'ID: 7. \nNombre de Materia: 4. \nCarga Horaria: 4. \nCurrícula: ANUAL'),
('materias', 7, '2023-11-28', 'a', 'ID: 5. \nNombre de Materia: 2. \nCarga Horaria: 2. \nCurrícula: Sin Asignar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `nombre_mat` varchar(150) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `c_horaria_mat` varchar(255) NOT NULL,
  `curricula_mat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`nombre_mat`, `id_mat`, `c_horaria_mat`, `curricula_mat`) VALUES
('Derecho Penal', 8, '200', 'ANUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_prof` int(11) NOT NULL,
  `nombre_prof` varchar(20) NOT NULL,
  `apellido_prof` varchar(20) NOT NULL,
  `dni_prof` int(8) NOT NULL,
  `legajo_prof` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secundario`
--

CREATE TABLE `secundario` (
  `id_analit` int(11) NOT NULL,
  `nom_analit` varchar(50) NOT NULL,
  `tiltulo_analit` varchar(64) NOT NULL,
  `resolucion_analit` varchar(1024) NOT NULL,
  `escuela_analit` varchar(90) NOT NULL,
  `distrito_analit` varchar(60) NOT NULL,
  `observaciones_analit` varchar(1024) NOT NULL,
  `egreso_analit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'test@poli.com', 'test');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni_almn`),
  ADD KEY `secundario` (`secundario_almn`(768)),
  ADD KEY `aula_almn` (`aula_almn`),
  ADD KEY `arma_almn` (`arma_almn`);

--
-- Indices de la tabla `armas`
--
ALTER TABLE `armas`
  ADD PRIMARY KEY (`nroSerie_arma`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `aula_asig`
--
ALTER TABLE `aula_asig`
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Indices de la tabla `bajas`
--
ALTER TABLE `bajas`
  ADD PRIMARY KEY (`id_baja`),
  ADD KEY `dni_baja` (`dni_almn`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id_exam`),
  ADD KEY `dni_almn` (`dni_almn`),
  ADD KEY `id_mat` (`id_mat`);

--
-- Indices de la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD PRIMARY KEY (`id_fecha`);

--
-- Indices de la tabla `logs_cambios`
--
ALTER TABLE `logs_cambios`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `logs_creacion`
--
ALTER TABLE `logs_creacion`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `logs_eliminacion`
--
ALTER TABLE `logs_eliminacion`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_mat`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_prof`);

--
-- Indices de la tabla `secundario`
--
ALTER TABLE `secundario`
  ADD PRIMARY KEY (`id_analit`),
  ADD KEY `nomApe` (`nom_analit`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id_exam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fechas`
--
ALTER TABLE `fechas`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs_cambios`
--
ALTER TABLE `logs_cambios`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logs_creacion`
--
ALTER TABLE `logs_creacion`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logs_eliminacion`
--
ALTER TABLE `logs_eliminacion`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secundario`
--
ALTER TABLE `secundario`
  MODIFY `id_analit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
