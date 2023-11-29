SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `armas` (
  `nroSerie_arma` int(11) NOT NULL,
  `tipo_arma` varchar(20) NOT NULL,
  `modelo_arma` varchar(20) NOT NULL,
  `marca_arma` varchar(20) NOT NULL
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

CREATE TABLE `bajas` (
  `id_baja` int(11) NOT NULL,
  `dni_almn` int(8) NOT NULL,
  `razon_baja` varchar(1064) NOT NULL
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

CREATE TABLE `profesores` (
  `id_prof` int(11) NOT NULL,
  `nombre_prof` varchar(20) NOT NULL,
  `apellido_prof` varchar(20) NOT NULL,
  `dni_prof` int(8) NOT NULL,
  `legajo_prof` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `secundario` (
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
  ADD PRIMARY KEY (`dni_almn`),
  ADD KEY `secundario` (`secundario_almn`(768)),
  ADD KEY `aula_almn` (`aula_almn`),
  ADD KEY `arma_almn` (`arma_almn`);

ALTER TABLE `armas`
  ADD PRIMARY KEY (`nroSerie_arma`);

ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`);

ALTER TABLE `aula_asig`
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_prof` (`id_prof`);

ALTER TABLE `bajas`
  ADD PRIMARY KEY (`id_baja`),
  ADD KEY `dni_baja` (`dni_almn`);

ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id_exam`),
  ADD KEY `dni_almn` (`dni_almn`),
  ADD KEY `id_mat` (`id_mat`);

ALTER TABLE `fechas`
  ADD PRIMARY KEY (`id_fecha`);

ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_mat`);

ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_prof`);

ALTER TABLE `secundario`
  ADD PRIMARY KEY (`id_analit`),
  ADD KEY `nomApe` (`nom_analit`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `examenes`
  MODIFY `id_exam` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `fechas`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `materias`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `profesores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `secundario`
  MODIFY `id_analit` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
