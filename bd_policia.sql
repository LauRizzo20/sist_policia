SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `alumnos` (
  `id_almn` int(20) NOT NULL,
  `dni_almn` int(20) NOT NULL,
  `nombre_almn` varchar(40) NOT NULL,
  `apellido_almn` varchar(40) NOT NULL,
  `id_aula` int(20) NOT NULL,
  `condicion_almn` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `armas` (
  `nroSerie_arma` int(11) NOT NULL,
  `tipo_arma` varchar(20) NOT NULL,
  `modelo_arma` varchar(20) NOT NULL,
  `marca_arma` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `arma_asig` (
  `id` int(11) NOT NULL,
  `nroSerie_arma` int(11) NOT NULL,
  `id_almn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `nro_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `aula_asig` (
  `id_aula` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `cuatrimestre_asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bajas_almn` (
  `id_baja` int(11) NOT NULL,
  `dni_almn` int(8) NOT NULL,
  `razon_baja` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bajas_prof` (
  `id_baja` int(11) NOT NULL,
  `dni_prof` int(11) NOT NULL,
  `razon_baja` varchar(1064) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `contacto_almn` (
  `id_almn` int(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `telefono_resp` varchar(12) NOT NULL,
  `legajo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `destino_almn` (
  `id_almn` int(20) NOT NULL,
  `domicilio` varchar(150) NOT NULL,
  `localidad` varchar(150) NOT NULL,
  `cp` varchar(150) NOT NULL,
  `comisaria` varchar(150) NOT NULL,
  `destino` varchar(150) NOT NULL,
  `telefono_dest` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `examenes` (
  `id_exam` int(11) NOT NULL,
  `dni_almn` int(8) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `tipo_exam` varchar(50) NOT NULL,
  `nota_exam` int(11) NOT NULL,
  `fecha_exam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `fechas` (
  `id_fecha` int(11) NOT NULL,
  `cuatrimestre_fecha` varchar(40) NOT NULL,
  `inicio_fecha` varchar(40) NOT NULL,
  `final_fecha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `logs_cambios` (
  `nombre_tab` varchar(20) NOT NULL,
  `id_log` int(11) NOT NULL,
  `fecha_cambio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `logs_creacion` (
  `nombre_tab` varchar(20) NOT NULL,
  `id_log` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `logs_eliminacion` (
  `nombre_tab` varchar(20) NOT NULL,
  `id_log` int(11) NOT NULL,
  `fecha_delete` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `materias` (
  `nombre_mat` varchar(150) NOT NULL,
  `id_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `nacimiento_almn` (
  `id_almn` int(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` text NOT NULL,
  `grupo_sanguineo` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `notas_almn` (
  `id_almn` int(11) NOT NULL,
  `id_notas` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `tipo_nota` varchar(25) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `profesores` (
  `id_prof` int(11) NOT NULL,
  `nombre_prof` varchar(20) NOT NULL,
  `apellido_prof` varchar(20) NOT NULL,
  `dni_prof` int(8) NOT NULL,
  `legajo_prof` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_almn`),
  ADD KEY `id_aula` (`id_aula`);

ALTER TABLE `armas`
  ADD PRIMARY KEY (`nroSerie_arma`);

ALTER TABLE `arma_asig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nroSerie_arma` (`nroSerie_arma`),
  ADD KEY `id_almn` (`id_almn`);

ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`);

ALTER TABLE `aula_asig`
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_prof` (`id_prof`);

ALTER TABLE `bajas_almn`
  ADD PRIMARY KEY (`id_baja`),
  ADD KEY `dni_baja` (`dni_almn`);

ALTER TABLE `bajas_prof`
  ADD PRIMARY KEY (`id_baja`);

ALTER TABLE `contacto_almn`
  ADD KEY `id_almn` (`id_almn`);

ALTER TABLE `destino_almn`
  ADD KEY `id_almn` (`id_almn`);

ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id_exam`),
  ADD KEY `dni_almn` (`dni_almn`),
  ADD KEY `id_mat` (`id_mat`);

ALTER TABLE `fechas`
  ADD PRIMARY KEY (`id_fecha`);

ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_mat`);

ALTER TABLE `nacimiento_almn`
  ADD KEY `id_almn` (`id_almn`);

ALTER TABLE `notas_almn`
  ADD PRIMARY KEY (`id_notas`),
  ADD KEY `id_almn` (`id_almn`),
  ADD KEY `id_mat` (`id_mat`);

ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_prof`);

ALTER TABLE `secundario_almn`
  ADD KEY `id_almn` (`id_almn`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `bajas_prof`
  MODIFY `id_baja` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `examenes`
  MODIFY `id_exam` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `fechas`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `materias`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `notas_almn`
  MODIFY `id_notas` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `profesores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
