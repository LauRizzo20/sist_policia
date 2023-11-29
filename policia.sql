-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2023 a las 16:09:06
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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
  `id_almn` int(20) NOT NULL,
  `dni_almn` int(20) NOT NULL,
  `nombre_almn` varchar(40) NOT NULL,
  `apellido_almn` varchar(40) NOT NULL,
  `sexo_almn` varchar(1) NOT NULL,
  `id_aula` int(20) DEFAULT NULL,
  `condicion_almn` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_almn`, `dni_almn`, `nombre_almn`, `apellido_almn`, `sexo_almn`, `id_aula`, `condicion_almn`) VALUES
(1, 45095322, 'Juan', 'Sánchez', 'M', 2, 0),
(2, 47025610, 'Danilo', 'Simone', 'M', 3, 0),
(3, 43618723, 'Claudia María', 'Gonzalez Soledad', 'F', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armas`
--

CREATE TABLE `armas` (
  `nroSerie_arma` int(11) NOT NULL,
  `tipo_arma` varchar(20) NOT NULL,
  `modelo_arma` varchar(20) NOT NULL,
  `marca_arma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arma_asig`
--

CREATE TABLE `arma_asig` (
  `id` int(11) NOT NULL,
  `nroSerie_arma` int(11) NOT NULL,
  `id_almn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `nro_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `nro_aula`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula_asig`
--

CREATE TABLE `aula_asig` (
  `id_aula` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `cuatrimestre_asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aula_asig`
--

INSERT INTO `aula_asig` (`id_aula`, `id_mat`, `id_prof`, `cuatrimestre_asig`) VALUES
(2, 0, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajas`
--

CREATE TABLE `bajas` (
  `id_baja` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `razon_baja` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bajas`
--

INSERT INTO `bajas` (`id_baja`, `dni`, `tipo`, `razon_baja`) VALUES
(1, 45454545, 'Profesor', 'TEST'),
(2, 89898989, 'Profesor', 'XD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_almn`
--

CREATE TABLE `contacto_almn` (
  `id_almn` int(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `telefono_resp` varchar(12) NOT NULL,
  `legajo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino_almn`
--

CREATE TABLE `destino_almn` (
  `id_almn` int(20) NOT NULL,
  `domicilio` varchar(150) NOT NULL,
  `localidad` varchar(150) NOT NULL,
  `cp` varchar(150) NOT NULL,
  `comisaria` varchar(150) NOT NULL,
  `destino` varchar(150) NOT NULL,
  `telefono_dest` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE `fechas` (
  `id_fecha` int(11) NOT NULL,
  `cuatrimestre_fecha` varchar(40) NOT NULL,
  `inicio_fecha` varchar(40) NOT NULL,
  `final_fecha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inasistencias`
--

CREATE TABLE `inasistencias` (
  `dni_almn` int(11) NOT NULL,
  `inasistencias_totales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inasistencias`
--

INSERT INTO `inasistencias` (`dni_almn`, `inasistencias_totales`) VALUES
(47025610, 70),
(45095322, 75),
(43618723, 55);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logs_cambios`
--

INSERT INTO `logs_cambios` (`nombre_tab`, `id_log`, `fecha_cambio`, `razon_cambio`, `detalles_cambio`) VALUES
('materias', 0, '2023-11-29', 'Actualización de materia', 'Detalles antes del cambio: \nID: 0. \nNombre de Materia: Santiago. \nCarga Horaria: 69. \nCurrícula: ÚNICA AL FINAL \n\nDetalles después del cambio: \nID: 0. \nNombre de Materia: Santiago. \nCarga Horaria: 69. \nCurrícula: PROMOCIONABLE'),
('materias', 0, '2023-11-29', 'Actualización de materia', 'Detalles antes del cambio: \nID: 0. \nNombre de Materia: Santiago. \nCarga Horaria: 69. \nCurrícula: PROMOCIONABLE \n\nDetalles después del cambio: \nID: 0. \nNombre de Materia: Derecho Penal. \nCarga Horaria: 200. \nCurrícula: ANUAL');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logs_creacion`
--

INSERT INTO `logs_creacion` (`nombre_tab`, `id_log`, `fecha_creacion`, `razon_creacion`, `detalles_creacion`) VALUES
('materias', 0, '2023-11-29', 'Creación de materia', 'Nombre de Materia: Santiago \nCarga Horaria: 69 \nCurrícula: ANUAL'),
('materias', 0, '2023-11-29', 'Creación de materia', 'Nombre de Materia: Santiago \nCarga Horaria: 69 \nCurrícula: ÚNICA AL FINAL');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logs_eliminacion`
--

INSERT INTO `logs_eliminacion` (`nombre_tab`, `id_log`, `fecha_delete`, `razon_delete`, `detalles_delete`) VALUES
('materias', 0, '2023-11-29', 'ME EQUIVOQUE PERDON', 'ID: 0. \nNombre de Materia: Santiago. \nCarga Horaria: 69. \nCurrícula: ANUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `nombre_mat` varchar(150) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `c_horaria_mat` varchar(255) NOT NULL,
  `curricula_mat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`nombre_mat`, `id_mat`, `c_horaria_mat`, `curricula_mat`) VALUES
('Derecho Penal', 0, '200', 'ANUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacimiento_almn`
--

CREATE TABLE `nacimiento_almn` (
  `id_almn` int(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` text NOT NULL,
  `grupo_sanguineo` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `tipo_nota` varchar(255) NOT NULL,
  `dni_almn` int(11) NOT NULL,
  `num_nota` int(11) NOT NULL,
  `fecha_nota` date NOT NULL,
  `comentario_nota` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `id_mat`, `tipo_nota`, `dni_almn`, `num_nota`, `fecha_nota`, `comentario_nota`) VALUES
(7, 0, 'Primer Parcial', 45095322, 7, '2023-11-29', ''),
(8, 0, 'Recuperatorio 1', 45095322, 8, '2023-11-29', ''),
(9, 0, 'Segundo Parcial', 45095322, 9, '2023-11-29', ''),
(10, 0, 'Recuperatorio 2', 45095322, 10, '2023-11-29', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_prof`, `nombre_prof`, `apellido_prof`, `dni_prof`, `legajo_prof`) VALUES
(3, 'Mauro', 'Gonzalez', 14676842, 129324);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secundario_almn`
--

CREATE TABLE `secundario_almn` (
  `id_almn` int(20) NOT NULL,
  `id_analit` int(11) NOT NULL,
  `nom_analit` varchar(50) NOT NULL,
  `tiltulo_analit` varchar(64) NOT NULL,
  `resolucion_analit` varchar(1024) NOT NULL,
  `escuela_analit` varchar(90) NOT NULL,
  `distrito_analit` varchar(60) NOT NULL,
  `observaciones_analit` varchar(1024) NOT NULL,
  `egreso_analit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'amongus@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_almn`),
  ADD KEY `id_aula` (`id_aula`);

--
-- Indices de la tabla `armas`
--
ALTER TABLE `armas`
  ADD PRIMARY KEY (`nroSerie_arma`);

--
-- Indices de la tabla `arma_asig`
--
ALTER TABLE `arma_asig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nroSerie_arma` (`nroSerie_arma`),
  ADD KEY `id_almn` (`id_almn`);

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
  ADD KEY `dni_baja` (`dni`);

--
-- Indices de la tabla `contacto_almn`
--
ALTER TABLE `contacto_almn`
  ADD KEY `id_almn` (`id_almn`);

--
-- Indices de la tabla `destino_almn`
--
ALTER TABLE `destino_almn`
  ADD KEY `id_almn` (`id_almn`);

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
-- Indices de la tabla `nacimiento_almn`
--
ALTER TABLE `nacimiento_almn`
  ADD KEY `id_almn` (`id_almn`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_prof`);

--
-- Indices de la tabla `secundario_almn`
--
ALTER TABLE `secundario_almn`
  ADD KEY `id_almn` (`id_almn`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_almn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bajas`
--
ALTER TABLE `bajas`
  MODIFY `id_baja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
