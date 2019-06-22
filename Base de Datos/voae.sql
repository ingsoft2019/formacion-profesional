-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-06-2019 a las 05:16:42
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `voae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administradores`
--

DROP TABLE IF EXISTS `tbl_administradores`;
CREATE TABLE IF NOT EXISTS `tbl_administradores` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `FECHA_ASIGNACION` date NOT NULL,
  PRIMARY KEY (`CODIGO_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bit_logins`
--

DROP TABLE IF EXISTS `tbl_bit_logins`;
CREATE TABLE IF NOT EXISTS `tbl_bit_logins` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`CODIGO_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bloqueos_a_usuarios`
--

DROP TABLE IF EXISTS `tbl_bloqueos_a_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_bloqueos_a_usuarios` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_USUARIO_ADMINISTRADOR` int(11) NOT NULL COMMENT 'USUARIO ADMINISTRADOR QUE REALIZÓ EL BLOQUEO',
  `FECHA_BLOQUEO` date NOT NULL,
  `RAZON_BLOQUEO` varchar(45) NOT NULL,
  PRIMARY KEY (`CODIGO_USUARIO`),
  KEY `fk_tbl_bloqueos_a_usuarios_tbl_usuarios2_idx` (`CODIGO_USUARIO_ADMINISTRADOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados_usuarios`
--

DROP TABLE IF EXISTS `tbl_estados_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_estados_usuarios` (
  `CODIGO_ESTADO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estados_usuarios`
--

INSERT INTO `tbl_estados_usuarios` (`CODIGO_ESTADO`, `DESCRIPCION`) VALUES
(1, 'Habilitado'),
(2, 'Inhabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_periodo`
--

DROP TABLE IF EXISTS `tbl_estado_periodo`;
CREATE TABLE IF NOT EXISTS `tbl_estado_periodo` (
  `CODIGO_ESTADO_PERIODO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`CODIGO_ESTADO_PERIODO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estado_periodo`
--

INSERT INTO `tbl_estado_periodo` (`CODIGO_ESTADO_PERIODO`, `DESCRIPCION`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_test`
--

DROP TABLE IF EXISTS `tbl_estado_test`;
CREATE TABLE IF NOT EXISTS `tbl_estado_test` (
  `CODIGO_ESTADO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`CODIGO_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estado_test`
--

INSERT INTO `tbl_estado_test` (`CODIGO_ESTADO`, `DESCRIPCION`) VALUES
(1, 'Habilitado'),
(2, 'Inhabilitado'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiantes_x_grupo`
--

DROP TABLE IF EXISTS `tbl_estudiantes_x_grupo`;
CREATE TABLE IF NOT EXISTS `tbl_estudiantes_x_grupo` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_SECCION` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_USUARIO`,`CODIGO_SECCION`),
  KEY `fk_tbl_estudiantes_x_grupo_tbl_evaluacion_grupal1_idx` (`CODIGO_SECCION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estudiantes_x_grupo`
--

INSERT INTO `tbl_estudiantes_x_grupo` (`CODIGO_USUARIO`, `CODIGO_SECCION`) VALUES
(9, 17),
(26, 17),
(25, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evaluacion_grupal`
--

DROP TABLE IF EXISTS `tbl_evaluacion_grupal`;
CREATE TABLE IF NOT EXISTS `tbl_evaluacion_grupal` (
  `CODIGO_SECCION` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA` date NOT NULL,
  `HORA_INICIAL` time NOT NULL,
  `HORA_FINAL` time NOT NULL,
  `LUGAR_APLICACION` varchar(45) NOT NULL,
  `CUPOS` int(11) NOT NULL,
  `CODIGO_ESTADO` int(11) NOT NULL,
  `CODIGO_PERIODO` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_SECCION`),
  KEY `fk_tbl_evaluacion_grupal_tbl_estado_periodo1_idx` (`CODIGO_ESTADO`),
  KEY `CODIGO_PERIODO` (`CODIGO_PERIODO`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_evaluacion_grupal`
--

INSERT INTO `tbl_evaluacion_grupal` (`CODIGO_SECCION`, `FECHA`, `HORA_INICIAL`, `HORA_FINAL`, `LUGAR_APLICACION`, `CUPOS`, `CODIGO_ESTADO`, `CODIGO_PERIODO`) VALUES
(17, '2019-03-29', '09:00:00', '12:00:00', 'Edf F1 UNAH', 40, 1, 41),
(18, '2019-04-26', '08:00:00', '12:00:00', 'EDIFICIO DE INGENIERIA', 20, 1, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_fechas_pedagogicas_x_periodo`
--

DROP TABLE IF EXISTS `tbl_fechas_pedagogicas_x_periodo`;
CREATE TABLE IF NOT EXISTS `tbl_fechas_pedagogicas_x_periodo` (
  `CODIGO_FECHA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_PERIODO` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  PRIMARY KEY (`CODIGO_FECHA`),
  KEY `fk_tbl_fechas_x_periodo_tbl_periodos1` (`CODIGO_PERIODO`)
) ENGINE=InnoDB AUTO_INCREMENT=981 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_fechas_pedagogicas_x_periodo`
--

INSERT INTO `tbl_fechas_pedagogicas_x_periodo` (`CODIGO_FECHA`, `CODIGO_PERIODO`, `FECHA`) VALUES
(967, 43, '2019-04-19'),
(968, 43, '2019-04-20'),
(969, 43, '2019-04-21'),
(970, 43, '2019-04-22'),
(976, 42, '2019-04-29'),
(977, 42, '2019-04-30'),
(978, 42, '2019-05-01'),
(979, 42, '2019-05-02'),
(980, 42, '2019-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_fechas_psicologicas_x_periodo`
--

DROP TABLE IF EXISTS `tbl_fechas_psicologicas_x_periodo`;
CREATE TABLE IF NOT EXISTS `tbl_fechas_psicologicas_x_periodo` (
  `CODIGO_FECHA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_PERIODO` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  PRIMARY KEY (`CODIGO_FECHA`),
  KEY `fk_tbl_fechas_x_periodo_tbl_periodos1` (`CODIGO_PERIODO`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_fechas_psicologicas_x_periodo`
--

INSERT INTO `tbl_fechas_psicologicas_x_periodo` (`CODIGO_FECHA`, `CODIGO_PERIODO`, `FECHA`) VALUES
(86, 41, '2019-04-08'),
(87, 41, '2019-04-09'),
(88, 41, '2019-04-10'),
(89, 41, '2019-04-11'),
(90, 41, '2019-04-12'),
(96, 43, '2019-04-23'),
(97, 43, '2019-04-24'),
(98, 43, '2019-04-25'),
(99, 43, '2019-04-26'),
(100, 43, '2019-04-27'),
(101, 43, '2019-04-28'),
(102, 43, '2019-04-29'),
(108, 42, '2019-05-06'),
(109, 42, '2019-05-07'),
(110, 42, '2019-05-08'),
(111, 42, '2019-05-09'),
(112, 42, '2019-05-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_foro`
--

DROP TABLE IF EXISTS `tbl_foro`;
CREATE TABLE IF NOT EXISTS `tbl_foro` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `publicacion_padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_foro`
--

INSERT INTO `tbl_foro` (`id_publicacion`, `nombre`, `correo`, `pregunta`, `fecha`, `publicacion_padre`) VALUES
(28, 'Estefanie Ortiz', 'dilverbenavides@hotmail.com', 'En la seccion de devolucion de resultados puede comprobar su fecha', '2019-04-25', 27),
(27, 'Marcos Cerna', 'dilverbenavides@hotmail.com', 'Cuando puedo pasar por los resultados', '2019-04-25', NULL),
(23, 'Estefanie Ortiz', 'dilverbenavides@hotmail.com', 'Hola Dilver, este proceso se realiza dos veces al aÃ±o.', '2019-04-25', 22),
(22, 'Dilver Benavidez', 'dilverbenavidez25@gmail.com', 'Hola quisiera saber cuantas veces al aÃ±o se realiza el proceso', '2019-04-25', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

DROP TABLE IF EXISTS `tbl_generos`;
CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `CODIGO_GENERO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_GENERO` varchar(45) NOT NULL,
  PRIMARY KEY (`CODIGO_GENERO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_generos`
--

INSERT INTO `tbl_generos` (`CODIGO_GENERO`, `NOMBRE_GENERO`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario_x_orientador`
--

DROP TABLE IF EXISTS `tbl_horario_x_orientador`;
CREATE TABLE IF NOT EXISTS `tbl_horario_x_orientador` (
  `CODIGO_HORARIO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_USUARIO` int(11) NOT NULL COMMENT 'usuario orientador',
  `CODIGO_PERIODO` int(11) NOT NULL,
  `CODIGO_HORA` int(11) NOT NULL,
  `CODIGO_DIA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_HORARIO`,`CODIGO_USUARIO`),
  KEY `fk_tbl_horario_x_orientador_tbl_periodos1_idx` (`CODIGO_PERIODO`),
  KEY `fk_tbl_horario_x_orientador_tbl_horas1_idx` (`CODIGO_HORA`),
  KEY `fk_tbl_horario_x_administrador_tbl_usuarios1` (`CODIGO_USUARIO`),
  KEY `CODIGO_DIA` (`CODIGO_DIA`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_horario_x_orientador`
--

INSERT INTO `tbl_horario_x_orientador` (`CODIGO_HORARIO`, `CODIGO_USUARIO`, `CODIGO_PERIODO`, `CODIGO_HORA`, `CODIGO_DIA`) VALUES
(210, 11, 42, 1, 976),
(211, 11, 42, 1, 977),
(212, 11, 42, 2, 977),
(213, 11, 42, 3, 978),
(214, 11, 42, 4, 978);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario_x_psicologo`
--

DROP TABLE IF EXISTS `tbl_horario_x_psicologo`;
CREATE TABLE IF NOT EXISTS `tbl_horario_x_psicologo` (
  `CODIGO_HORARIO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_USUARIO` int(11) NOT NULL COMMENT 'usuario orientador',
  `CODIGO_PERIODO` int(11) NOT NULL,
  `CODIGO_HORA` int(11) NOT NULL,
  `CODIGO_DIA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_HORARIO`,`CODIGO_USUARIO`),
  KEY `fk_tbl_horario_x_orientador_tbl_periodos1_idx` (`CODIGO_PERIODO`),
  KEY `fk_tbl_horario_x_orientador_tbl_horas1_idx` (`CODIGO_HORA`),
  KEY `fk_tbl_horario_x_administrador_tbl_usuarios1` (`CODIGO_USUARIO`),
  KEY `CODIGO_DIA` (`CODIGO_DIA`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_horario_x_psicologo`
--

INSERT INTO `tbl_horario_x_psicologo` (`CODIGO_HORARIO`, `CODIGO_USUARIO`, `CODIGO_PERIODO`, `CODIGO_HORA`, `CODIGO_DIA`) VALUES
(1, 25, 41, 1, 86),
(2, 25, 41, 3, 89),
(3, 25, 41, 1, 89),
(4, 26, 41, 1, 86),
(5, 26, 41, 1, 88),
(6, 26, 41, 1, 87),
(7, 26, 41, 1, 89),
(8, 26, 41, 2, 86),
(9, 26, 41, 2, 87),
(10, 26, 41, 2, 88),
(11, 26, 41, 2, 89),
(12, 26, 41, 1, 90),
(14, 25, 41, 1, 88),
(15, 25, 41, 2, 86),
(16, 25, 41, 2, 87),
(17, 25, 41, 2, 89),
(18, 25, 41, 2, 90),
(20, 25, 41, 5, 86),
(21, 25, 41, 4, 88),
(22, 25, 41, 3, 87),
(23, 25, 41, 3, 86),
(24, 27, 41, 1, 86),
(25, 27, 41, 4, 89),
(26, 25, 43, 1, 96),
(28, 25, 43, 1, 100),
(29, 25, 42, 1, 108),
(30, 25, 42, 2, 108),
(31, 25, 42, 1, 109),
(32, 25, 42, 2, 111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horas`
--

DROP TABLE IF EXISTS `tbl_horas`;
CREATE TABLE IF NOT EXISTS `tbl_horas` (
  `CODIGO_HORA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_HORA` varchar(45) NOT NULL COMMENT 'las citas que se manejan duran 30minutos',
  PRIMARY KEY (`CODIGO_HORA`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_horas`
--

INSERT INTO `tbl_horas` (`CODIGO_HORA`, `NOMBRE_HORA`) VALUES
(1, '8:00-8:30'),
(2, '8:30-9:00'),
(3, '9:00-9:30'),
(4, '9:30-10:00'),
(5, '10:00-10:30'),
(6, '10:30-11:00'),
(7, '11:00-11:30'),
(8, '11:30-12:00'),
(9, '12:00-12:30'),
(10, '12:30-13:00'),
(11, '13:00-13:30'),
(12, '13:30-14:00'),
(13, '14:00-14:30'),
(14, '14:30-15:00'),
(15, '15:00-15:30'),
(16, '15:30-16:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesajes`
--

DROP TABLE IF EXISTS `tbl_mesajes`;
CREATE TABLE IF NOT EXISTS `tbl_mesajes` (
  `CODIGO_MENSAJE` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_USUARIO_REMITENTE` int(11) NOT NULL,
  `CODIGO_USUARIO_DESTINATARIO` int(11) NOT NULL,
  `ASUNTO` varchar(45) DEFAULT NULL,
  `MENSAJE` varchar(45) NOT NULL,
  `FECHA_ENVIO` date NOT NULL,
  `CODIGO_MENSAJE_PADRE` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_MENSAJE`),
  KEY `fk_TBL_MENSAJES_tbl_usuarios1_idx` (`CODIGO_USUARIO_REMITENTE`),
  KEY `fk_TBL_MENSAJES_tbl_usuarios2_idx` (`CODIGO_USUARIO_DESTINATARIO`),
  KEY `fk_TBL_MENSAJES_TBL_MENSAJES1_idx` (`CODIGO_MENSAJE_PADRE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notificacion_usuarios`
--

DROP TABLE IF EXISTS `tbl_notificacion_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_notificacion_usuarios` (
  `CORREO` varchar(45) NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `APELLIDO` varchar(45) NOT NULL,
  `FECHA` datetime NOT NULL,
  `ESTADO` tinyint(4) NOT NULL,
  PRIMARY KEY (`CORREO`,`FECHA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_notificacion_usuarios`
--

INSERT INTO `tbl_notificacion_usuarios` (`CORREO`, `NOMBRE`, `APELLIDO`, `FECHA`, `ESTADO`) VALUES
('dilverbenavides@hotmail.com', 'Dilver', 'Benavidez', '2019-04-03 18:30:31', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_periodos`
--

DROP TABLE IF EXISTS `tbl_periodos`;
CREATE TABLE IF NOT EXISTS `tbl_periodos` (
  `CODIGO_PERIODO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PERIODO` varchar(45) NOT NULL,
  `FECHA_INICIO_INSCRIPCIONES` date NOT NULL,
  `HORA_HABILITAR_INSCRIPCIONES` time NOT NULL,
  `FECHA_INICIO_CITAS_PEDAGOGICAS` date NOT NULL,
  `FECHA_FINAL_CITAS_PEDAGOGICAS` date NOT NULL,
  `FECHA_INICIO_CITAS_PSICOLOGICAS` date NOT NULL,
  `FECHA_FINAL_CITAS_PSICOLOGICAS` date NOT NULL,
  `CODIGO_ESTADO_PERIODO` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_PERIODO`),
  KEY `fk_tbl_periodos_tbl_estado_periodo1_idx` (`CODIGO_ESTADO_PERIODO`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_periodos`
--

INSERT INTO `tbl_periodos` (`CODIGO_PERIODO`, `NOMBRE_PERIODO`, `FECHA_INICIO_INSCRIPCIONES`, `HORA_HABILITAR_INSCRIPCIONES`, `FECHA_INICIO_CITAS_PEDAGOGICAS`, `FECHA_FINAL_CITAS_PEDAGOGICAS`, `FECHA_INICIO_CITAS_PSICOLOGICAS`, `FECHA_FINAL_CITAS_PSICOLOGICAS`, `CODIGO_ESTADO_PERIODO`) VALUES
(41, 'ABRIL 2019', '2019-04-04', '09:00:00', '2019-04-01', '2019-04-05', '2019-04-08', '2019-04-12', 2),
(42, 'MARZO 2020', '2019-04-22', '10:00:00', '2019-04-29', '2019-05-03', '2019-05-06', '2019-05-10', 1),
(43, 'PRUEBA MIERCOLES', '2019-04-18', '09:00:00', '2019-04-19', '2019-04-22', '2019-04-23', '2019-04-29', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas_x_test`
--

DROP TABLE IF EXISTS `tbl_preguntas_x_test`;
CREATE TABLE IF NOT EXISTS `tbl_preguntas_x_test` (
  `CODIGO_PREGUNTA` int(11) NOT NULL AUTO_INCREMENT,
  `PREGUNTA` varchar(200) NOT NULL,
  `FECHA_CREACION` date NOT NULL,
  `CODIGO_TIPO_PREGUNTA` int(11) NOT NULL,
  `CODIGO_TEST` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_PREGUNTA`,`CODIGO_TEST`),
  KEY `fk_TBL_PREGUNTAS_X_TEST_tbl_tipo_pregunta1_idx` (`CODIGO_TIPO_PREGUNTA`),
  KEY `fk_TBL_PREGUNTAS_X_TEST_tbl_test1_idx` (`CODIGO_TEST`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_preguntas_x_test`
--

INSERT INTO `tbl_preguntas_x_test` (`CODIGO_PREGUNTA`, `PREGUNTA`, `FECHA_CREACION`, `CODIGO_TIPO_PREGUNTA`, `CODIGO_TEST`) VALUES
(1, 'Integer id volutpat turpis.4 Donec egestas augue sssssit amet libero porta, vel auctor dui efficitur. Donec non eros at risus sodales tincidunt. Aliquam ullamcorper, erat a porta molestie', '2019-03-13', 1, 1),
(2, 'luctus inn tellus. Vivamus luctus lorem vel dolor porta semper. Fusce at mauris porttitor lectus ultrices luctus vitae sit amet odio. Pellentesque feugiat ultrices sem', '2019-03-13', 1, 1),
(3, 'Integer id volutpat turpis. Donec  augue sit amet libero portl auctor dui efficitur. Donec non eros atgdgddg risus sodales tincidunt. Aliquam ullamcorper, erat a porta molestie', '2019-03-13', 1, 1),
(4, 'luctus in tellus. Vivamus luctus lorem vel dolor porta semper. Fusce at mauris porttitor lectus ultrices luctus vitae sit amet odio. Pellentesque feugiat ultrices sem', '2019-03-13', 1, 1),
(5, 'luctus in tellus. Vivamus luctus lorem vel dolor porta semper. Fusce at mauris porttitor lectus ultrices luctus vitae sit amet odio. Pellentesque feugiat ultrices sem', '2019-03-13', 1, 2),
(6, 'Integer id volutpat turpis. Donec egestas augue sit amet libero porta, vel auctor dui efficitur. Donec non eros at risus sodales tincidunt. Aliquam ullamcorper, erat a porta molestie', '2019-03-13', 1, 2),
(7, 'luctus in tellus. Vivamus luctus lorem vel dolor porta semper. Fusce at mauris porttitor lectus ultrices luctus vitae sit amet odio. Pellentesque feugiat ultrices sem', '2019-03-13', 1, 2),
(8, 'Integer id volutpat turpis. Donec egestas augue sit amet libero porta, vel auctor dui efficitur. Donec non eros at risus sodales tincidunt. Aliquam ullamcorper, erat a porta molestie', '2019-03-13', 1, 2),
(9, 'luctus in tellus. Vivamus luctus lorem vel dolor porta semper. Fusce at mauris porttitor lectus ultrices luctus vitae sit amet odio. Pellentesque feugiat ultrices sem', '2019-03-13', 1, 2),
(10, 'luctus in tellus. Vivamus luctus lorem vel dolor porta semper. Fusce at mauris porttitor lectus ultrices luctus vitae sit amet odio. Pellentesque feugiat ultrices sem', '2019-03-13', 1, 2),
(13, 'Pregunta de prueba 1', '2019-03-19', 1, 3),
(14, 'Pregunta de prueba 2', '2019-03-19', 1, 3),
(15, 'pregunta 1', '2019-03-19', 1, 4),
(17, 'hshshshshs', '2019-03-19', 1, 6),
(18, 'Pregunta 1', '2019-03-22', 1, 11),
(19, 'Pregunta de prueba 1', '2019-04-25', 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas_psicologicas_x_estudiante`
--

DROP TABLE IF EXISTS `tbl_reservas_psicologicas_x_estudiante`;
CREATE TABLE IF NOT EXISTS `tbl_reservas_psicologicas_x_estudiante` (
  `CODIGO_RESERVA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_HORARIO` int(11) NOT NULL,
  `CODIGO_USUARIO_ORIENTADOR` int(11) NOT NULL,
  `CODIGO_USUARIO_ESTUDIANTE` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_RESERVA`),
  KEY `fk_tbl_reservas_x_estudiante_tbl_horario_x_orientador1_idx` (`CODIGO_HORARIO`,`CODIGO_USUARIO_ORIENTADOR`),
  KEY `fk_tbl_reservas_x_estudiante_tbl_usuarios1_idx` (`CODIGO_USUARIO_ESTUDIANTE`),
  KEY `CODIGO_USUARIO_ORIENTADOR` (`CODIGO_USUARIO_ORIENTADOR`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_reservas_psicologicas_x_estudiante`
--

INSERT INTO `tbl_reservas_psicologicas_x_estudiante` (`CODIGO_RESERVA`, `CODIGO_HORARIO`, `CODIGO_USUARIO_ORIENTADOR`, `CODIGO_USUARIO_ESTUDIANTE`) VALUES
(3, 3, 25, 15),
(5, 1, 25, 16),
(6, 16, 25, 17),
(7, 4, 26, 20),
(8, 24, 27, 15),
(9, 25, 27, 25),
(10, 32, 25, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas_x_estudiante`
--

DROP TABLE IF EXISTS `tbl_reservas_x_estudiante`;
CREATE TABLE IF NOT EXISTS `tbl_reservas_x_estudiante` (
  `CODIGO_RESERVA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_HORARIO` int(11) NOT NULL,
  `CODIGO_USUARIO_ORIENTADOR` int(11) NOT NULL,
  `CODIGO_USUARIO_ESTUDIANTE` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_RESERVA`),
  KEY `fk_tbl_reservas_x_estudiante_tbl_horario_x_orientador1_idx` (`CODIGO_HORARIO`,`CODIGO_USUARIO_ORIENTADOR`),
  KEY `fk_tbl_reservas_x_estudiante_tbl_usuarios1_idx` (`CODIGO_USUARIO_ESTUDIANTE`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_reservas_x_estudiante`
--

INSERT INTO `tbl_reservas_x_estudiante` (`CODIGO_RESERVA`, `CODIGO_HORARIO`, `CODIGO_USUARIO_ORIENTADOR`, `CODIGO_USUARIO_ESTUDIANTE`) VALUES
(104, 214, 11, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_respuestas_guardadas`
--

DROP TABLE IF EXISTS `tbl_respuestas_guardadas`;
CREATE TABLE IF NOT EXISTS `tbl_respuestas_guardadas` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_PREGUNTA` int(11) NOT NULL,
  `CODIGO_RESPUESTA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_USUARIO`,`CODIGO_PREGUNTA`,`CODIGO_RESPUESTA`),
  KEY `fk_tbl_respuestas_x_estudiante_tbl_preguntas_x_test1_idx` (`CODIGO_PREGUNTA`),
  KEY `fk_tbl_respuestas_x_estudiante_tbl_respuestas_x_pregunta1_idx` (`CODIGO_RESPUESTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_respuestas_guardadas`
--

INSERT INTO `tbl_respuestas_guardadas` (`CODIGO_USUARIO`, `CODIGO_PREGUNTA`, `CODIGO_RESPUESTA`) VALUES
(9, 1, 118),
(9, 2, 105),
(9, 3, 100),
(9, 4, 39),
(9, 5, 128),
(9, 6, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_respuestas_x_estudiante`
--

DROP TABLE IF EXISTS `tbl_respuestas_x_estudiante`;
CREATE TABLE IF NOT EXISTS `tbl_respuestas_x_estudiante` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `CODIGO_PREGUNTA` int(11) NOT NULL,
  `CODIGO_RESPUESTA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_USUARIO`,`CODIGO_PREGUNTA`,`CODIGO_RESPUESTA`),
  KEY `fk_tbl_respuestas_x_estudiante_tbl_preguntas_x_test1_idx` (`CODIGO_PREGUNTA`),
  KEY `fk_tbl_respuestas_x_estudiante_tbl_respuestas_x_pregunta1_idx` (`CODIGO_RESPUESTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_respuestas_x_estudiante`
--

INSERT INTO `tbl_respuestas_x_estudiante` (`CODIGO_USUARIO`, `CODIGO_PREGUNTA`, `CODIGO_RESPUESTA`) VALUES
(9, 1, 118),
(9, 2, 105),
(9, 3, 100),
(9, 4, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_respuestas_x_pregunta`
--

DROP TABLE IF EXISTS `tbl_respuestas_x_pregunta`;
CREATE TABLE IF NOT EXISTS `tbl_respuestas_x_pregunta` (
  `CODIGO_RESPUESTA` int(11) NOT NULL AUTO_INCREMENT,
  `RESPUESTA` varchar(45) DEFAULT NULL,
  `CODIGO_PREGUNTA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_RESPUESTA`),
  KEY `fk_tbl_respuestas_x_pregunta_tbl_preguntas_x_test1_idx` (`CODIGO_PREGUNTA`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_respuestas_x_pregunta`
--

INSERT INTO `tbl_respuestas_x_pregunta` (`CODIGO_RESPUESTA`, `RESPUESTA`, `CODIGO_PREGUNTA`) VALUES
(37, 'Respuesta 1 T1P4', 4),
(38, 'Respuesta 2 T1P4', 4),
(39, 'Respuesta 3 T1P4', 4),
(40, 'Respuesta 4 T1P4', 4),
(44, 'Respuesta 1 T2P2', 6),
(45, 'Respuesta 2 T2P2', 6),
(46, 'Respuesta 1 T2P3', 7),
(47, 'Respuesta 2 T2P3', 7),
(48, 'Respuesta 3 T2P3', 7),
(49, 'Respuesta 1 T2P4', 8),
(50, 'Respuesta 2 T2P4', 8),
(51, 'Respuesta 3 T2P4', 8),
(52, 'Respuesta 4 T2P4', 8),
(53, 'Respuesta 1 T2P5', 9),
(54, 'Respuesta 2 T2P5', 9),
(55, 'Respuesta 1 T2P6', 10),
(56, 'Respuesta 2 T2P6', 10),
(57, 'Respuesta 3 T2P6', 10),
(97, 'Respuesta de prueba 1', 14),
(98, 'Respuesta de prueba 2', 14),
(99, 'Respuesta 1 T1P3', 3),
(100, 'Respuesta 2 T1P3', 3),
(101, 'Respuesta 3 T1P3', 3),
(105, 'Respuesta 1 T1P2', 2),
(106, 'Respuesta 2 T1P2', 2),
(115, 'Respuesta 1 T1P1', 1),
(116, 'Respuesta 2 T1P1', 1),
(117, 'Respuesta 3 T1P1', 1),
(118, 'Respuesta 4 T1P1', 1),
(121, 'respuesta 1', 15),
(122, 'respuesta 2', 15),
(123, 'respuesta 3', 15),
(126, 'dgdgdgdgd', 17),
(127, 'Respuesta 1 T1P4', 5),
(128, 'Respuesta  6 T1P4', 5),
(129, 'Respuesta 1', 18),
(130, 'Respuesta 2', 18),
(133, 'Respuesta de prueba 1', 13),
(134, 'Respuesta de prueba 1', 13),
(135, 'Respuesta 1', 19),
(136, 'Respuesta 2', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol_usuario`
--

DROP TABLE IF EXISTS `tbl_rol_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_rol_usuario` (
  `CODIGO_ROL_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_USUARIO` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`CODIGO_ROL_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_rol_usuario`
--

INSERT INTO `tbl_rol_usuario` (`CODIGO_ROL_USUARIO`, `ROL_USUARIO`, `DESCRIPCION`) VALUES
(1, 'Estudiante', ''),
(2, 'Orientador', ''),
(3, 'Administrador', ''),
(4, 'Psicologo', 'Usuario psicologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sugerencias`
--

DROP TABLE IF EXISTS `tbl_sugerencias`;
CREATE TABLE IF NOT EXISTS `tbl_sugerencias` (
  `CODIGO_SUGERENCIA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(1000) NOT NULL,
  `SUGERENCIA` varchar(100) NOT NULL,
  `FECHA_ENVIO` date NOT NULL,
  PRIMARY KEY (`CODIGO_SUGERENCIA`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_sugerencias`
--

INSERT INTO `tbl_sugerencias` (`CODIGO_SUGERENCIA`, `NOMBRE_USUARIO`, `SUGERENCIA`, `FECHA_ENVIO`) VALUES
(4, 'Estefanie Ortiz', 'No me gustan los test', '2019-04-22'),
(5, 'Carmen Salinas', 'Mejorar horario', '2019-04-22'),
(6, 'Matias Bethancourt', 'Esta bonito', '2019-04-25'),
(7, 'Carmen Salinas', 'sss', '2019-04-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_test`
--

DROP TABLE IF EXISTS `tbl_test`;
CREATE TABLE IF NOT EXISTS `tbl_test` (
  `CODIGO_TEST` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TEST` varchar(45) NOT NULL,
  `DESCRIPCION_TEST` varchar(200) NOT NULL,
  `INSTRUCCIONES` varchar(200) NOT NULL,
  `FOTO_TEST` blob,
  `FECHA_CREACION` date NOT NULL,
  `CODIGO_USUARIO_CREADOR` int(11) NOT NULL COMMENT 'ADMINISTRADOR QUE LO CREO',
  `CODIGO_ESTADO` int(11) NOT NULL,
  `CODIGO_USUARIO_HABILITA` int(11) DEFAULT NULL COMMENT 'USUARIO ADMINISTRADOR QUE HABILITÓ EL TEST',
  `FECHA_HABILITACION` date DEFAULT NULL,
  PRIMARY KEY (`CODIGO_TEST`),
  KEY `fk_tbl_test_tbl_usuarios1_idx` (`CODIGO_USUARIO_CREADOR`),
  KEY `fk_tbl_test_TBL_ESTADOS_TEST1_idx` (`CODIGO_ESTADO`),
  KEY `fk_tbl_test_tbl_usuarios2_idx` (`CODIGO_USUARIO_HABILITA`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_test`
--

INSERT INTO `tbl_test` (`CODIGO_TEST`, `NOMBRE_TEST`, `DESCRIPCION_TEST`, `INSTRUCCIONES`, `FOTO_TEST`, `FECHA_CREACION`, `CODIGO_USUARIO_CREADOR`, `CODIGO_ESTADO`, `CODIGO_USUARIO_HABILITA`, `FECHA_HABILITACION`) VALUES
(1, 'Test de personalidad', 'Este test tiene como finalidad medir la personalidad.', 'Complete todas las preguntas que a continuación se solicitan.', 0x89504e470d0a1a0a0000000d494844520000011b000000b20802000000fd2bfce4000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa864000007d949444154785eeddda16fdb5a1886f1b12b0d4c1a281a182e2f2eab5430543e3c3c696020d2c0950a26550a180bdeff79dfea9ceba6b6e33af697e4bce73c3fb438f6e9ec9d6776d2d47df717401c8a022251141089a28048140544a2282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a022251142e60b3d95c5f5f5f5d5ddddfdfe745b5a0289cdbb76fdfdebf7fffee7fea6ab7dbe5e7fc5114ceaa97535253541485f319cd29a9262a8ac2994ce494d4111545e11cdecc29a9202a8fa2be7efd7a8b031e1e1ef2612ad576bb9d9353e21e954751d7d7d7f97863e0f3e7cff930156cb3d9e4bfee0cfa6f226f6688a2ec955cd4e3e363fed33151e93495b7314451f68a2d2abd76d2157b7e3c3b2afd73e70d0c5194bd328bda7f2be2a8a8b495d6c96b1ba2287b0516357c676f6654daeafbf7ef793d4f1465afb4a20ebd51fe665415e4241465afa8a2a6bfef3411551d390945d92ba7a8e99c92d1a8aac949ec8bd27c7afe3667edb49b7987070a296a4e4e492faa9a7212fba2caffc44008cdc2bcc3032514353fa7643faa6a3e759e509487928b3a36a7643faa9a509487628b5a9653b2dd6ef32815a1280f6516b526276d9b47a90b457928b028721a45511e4a2b8a9c0ea1a83ecddd027f44a7a8a2c8690245bdd24ddcd2a22aa728729a46512f7ab3b6a8a80a298a9cde4451d9e8942d27aa128a22a73928ead9a1f9aa0954c807642e5e1439cd44510639c9658b22a7f95a294a3372f416db1639c9058b22a7a3345154371d7b51adcf495ffd4b9ca7a7a73ceec0a58a22a763d55f546f2e7651adcf493e7cf890378bf0e3c78f3ceec0458a22a7052a2f6a74222aaa909ca4e2a2c869999a8bdaed7647cd896373925a8b22a7c52a3f47cdbf3ff0829ca4caa2c8698dfa5f47cd896a594e525f51e4b452fd45c974548b7392bbbbbbe7bb4004b9f87b7de4b45e1345c9a1a8d6e4744e67288a9c42b452940ca372c9494e5d14394569a828d98fca2827396951e414a8ada22445e595939cae28728ad55c51a2a8bc72921315956e4099073a12398d6ab12847a7288a9c4e81a23c8417454e2742511e628b22a7d3a1280f814591d349519487a8a2c8e9d428aa6fb7dbedff86f3428414454e674051af28a79b9b1b0dabc9971795617d51bd9f6dd1563aaa575757f9f124729a8fa25e7439254545b5bea86e0455b4ffedb8374f5ce474148aca7a3925e544b5bea86eef86474cbb999e1a22a76351d4b3d19c9242a25a59d4fe25dfe8abc4d1234c4e0b50d4544e9aac7a36af77512b8bd265def4cab7b7b769850e392dd34a510a63b40d2d2c3f275959d4c4255fd23b08e4b4581345a56c86373177c949d614a51de92ef9462f62751db8ffe60439ad517f51fbd9ec471592d3a74f9f3466945fbf7ee57107d6143571c9a7ddd4c8fad2690521a7952a2f6a988d668f160e97778e3a3b59dcb9a5dbd36ecded76ab01f5b0f7be3939ad57735187b25154213949f9456977f6b3d1ca921fbc464e212a3f474d6c38a4a976544e527e51dd25df213a443a86057ef0ca54fdafa36646b5202729bfa8436763423a91fa8b9237a35a9693145e54ef924f08e9d49a284a2646589c936c361b651025fc0e98dd251f219d4d2b45c9e8206b723aa76545692bd96eb7f9314eafa1a2a4378e4b4eb2ac289c5f5b45493794514e42512e9a2b4a349a574e42512e5a2c4abc72128a72d168517628ca054579a0281714e581a25c5094078a7241511e28ca0545f53d3e3e16582945b9a0a8579453fa68e9fdfd7d5e54068a7241512fba9c92a2a2a228171495f5724aca898aa25c50d4b3d19c923aee8089b3a1a8a99c625fa4ad41512e5a294ad9ccb955ddbe7272128a72d144515d36bda8d6e7f4fbf7ef7fe3fcf9f3278f3b40512eea2faa974d1755c8d9c9e27e7d38a7ca8b1acd465185e42414859eca8b3a944d484e4251e8a9bc289d8ef27a331c9b9350147aea7f1d3533aa05390945a1a7fea2e4cda896e5241f3f7efc27cecf9f3ff3b80314e5a289a26422aac5399d1345b968a528198dca2227a128170d1525bda85c72128a72d15651d24565949350948be68a1245e5959350948b168b7244512e28ca0345b9a0280f14e582a23c50940b8af240512e28aa6fb7db3d96f7db3529ca0545bda29cd22f57df9471c3960e45b9a0a8175d4e49515151940b8aca7a3925e54445512e28ead9684e49215151940b8a9aca499355cfe6f52e8aa25cb45294c2186d430bcbcf4928ca451345a56c8685b8e42414e5a2fea2f6b3d9ef2424277df52f719e9e9ef2b80314e5a2f2a286d9a45a86cb3bf37312eedc829e9a8b3a948da660484e4251e8a9fc1c35b1e1d0b1390945a1a7fed75133a35a909350147aea2f4ade8c6a594e4251e869a228991861714e727777771b87f7fa2ad04a51323ac89a9cce89a25c345494f4c671c94928ca455b45493794514e42512e9a2b4a349a574e42512e5a2c4abc72128a72d168517628ca054579a0281714e581a25c5094078a7241511e28ca857d519a4ff70d38f4e327425145b12f0a1455148ab2475145a1287b1455148ab2475145a1287b1455148ab2475145a1287b1455148ab2475145f128eae1e1e10607dcdedee6c38402781405b8a0282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a02e2fcfdfb1f1924b627d994d4380000000049454e44ae426082, '2019-02-19', 10, 1, 10, '2019-02-21'),
(2, 'Test de orientacion', 'Este test tiene como finalidad medir la orientacion con la que cuenta un individuo...', '\r\nComplete todas las preguntas que a continuación se solicitan.\r\n', 0x89504e470d0a1a0a0000000d494844520000011b000000b20802000000fd2bfce4000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa864000007d949444154785eeddda16fdb5a1886f1b12b0d4c1a281a182e2f2eab5430543e3c3c696020d2c0950a26550a180bdeff79dfea9ceba6b6e33af697e4bce73c3fb438f6e9ec9d6776d2d47df717401c8a022251141089a28048140544a2282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a022251142e60b3d95c5f5f5f5d5ddddfdfe745b5a0289cdbb76fdfdebf7fffee7fea6ab7dbe5e7fc5114ceaa97535253541485f319cd29a9262a8ac2994ce494d4111545e11cdecc29a9202a8fa2be7efd7a8b031e1e1ef2612ad576bb9d9353e21e954751d7d7d7f97863e0f3e7cff930156cb3d9e4bfee0cfa6f226f6688a2ec955cd4e3e363fed33151e93495b7314451f68a2d2abd76d2157b7e3c3b2afd73e70d0c5194bd328bda7f2be2a8a8b495d6c96b1ba2287b0516357c676f6654daeafbf7ef793d4f1465afb4a20ebd51fe665415e4241465afa8a2a6bfef3411551d390945d92ba7a8e99c92d1a8aac949ec8bd27c7afe3667edb49b7987070a296a4e4e492faa9a7212fba2caffc44008cdc2bcc3032514353fa7643faa6a3e759e509487928b3a36a7643faa9a509487628b5a9653b2dd6ef32815a1280f6516b526276d9b47a90b457928b028721a45511e4a2b8a9c0ea1a83ecddd027f44a7a8a2c8690245bdd24ddcd2a22aa728729a46512f7ab3b6a8a80a298a9cde4451d9e8942d27aa128a22a73928ead9a1f9aa0954c807642e5e1439cd44510639c9658b22a7f95a294a3372f416db1639c9058b22a7a3345154371d7b51adcf495ffd4b9ca7a7a73ceec0a58a22a763d55f546f2e7651adcf493e7cf890378bf0e3c78f3ceec0458a22a7052a2f6a74222aaa909ca4e2a2c869999a8bdaed7647cd896373925a8b22a7c52a3f47cdbf3ff0829ca4caa2c8698dfa5f47cd896a594e525f51e4b452fd45c974548b7392bbbbbbe7bb4004b9f87b7de4b45e1345c9a1a8d6e4744e67288a9c42b452940ca372c9494e5d14394569a828d98fca2827396951e414a8ada22445e595939cae28728ad55c51a2a8bc72921315956e4099073a12398d6ab12847a7288a9c4e81a23c8417454e2742511e628b22a7d3a1280f814591d349519487a8a2c8e9d428aa6fb7dbedff86f3428414454e674051af28a79b9b1b0dabc9971795617d51bd9f6dd1563aaa575757f9f124729a8fa25e7439254545b5bea86e0455b4ffedb8374f5ce474148aca7a3925e544b5bea86eef86474cbb999e1a22a76351d4b3d19c9242a25a59d4fe25dfe8abc4d1234c4e0b50d4544e9aac7a36af77512b8bd265def4cab7b7b769850e392dd34a510a63b40d2d2c3f275959d4c4255fd23b08e4b4581345a56c86373177c949d614a51de92ef9462f62751db8ffe60439ad517f51fbd9ec471592d3a74f9f3466945fbf7ee57107d6143571c9a7ddd4c8fad2690521a7952a2f6a988d668f160e97778e3a3b59dcb9a5dbd36ecded76ab01f5b0f7be3939ad57735187b25154213949f9456977f6b3d1ca921fbc464e212a3f474d6c38a4a976544e527e51dd25df213a443a86057ef0ca54fdafa36646b5202729bfa8436763423a91fa8b9237a35a9693145e54ef924f08e9d49a284a2646589c936c361b651025fc0e98dd251f219d4d2b45c9e8206b723aa76545692bd96eb7f9314eafa1a2a4378e4b4eb2ac289c5f5b45493794514e42512e9a2b4a349a574e42512e5a2c4abc72128a72d168517628ca054579a0281714e581a25c5094078a7241511e28ca0545f53d3e3e16582945b9a0a8579453fa68e9fdfd7d5e54068a7241512fba9c92a2a2a228171495f5724aca898aa25c50d4b3d19c923aee8089b3a1a8a99c625fa4ad41512e5a294ad9ccb955ddbe7272128a72d144515d36bda8d6e7f4fbf7ef7fe3fcf9f3278f3b40512eea2faa974d1755c8d9c9e27e7d38a7ca8b1acd465185e42414859eca8b3a944d484e4251e8a9bc289d8ef27a331c9b9350147aea7f1d3533aa05390945a1a7fea2e4cda896e5241f3f7efc27cecf9f3ff3b80314e5a289a26422aac5399d1345b968a528198dca2227a128170d1525bda85c72128a72d15651d24565949350948be68a1245e5959350948b168b7244512e28ca0345b9a0280f14e582a23c50940b8af240512e28aa6fb7db3d96f7db3529ca0545bda29cd22f57df9471c3960e45b9a0a8175d4e49515151940b8aca7a3925e54445512e28ead9684e49215151940b8a9aca499355cfe6f52e8aa25cb45294c2186d430bcbcf4928ca451345a56c8685b8e42414e5a2fea2f6b3d9ef2424277df52f719e9e9ef2b80314e5a2f2a286d9a45a86cb3bf37312eedc829e9a8b3a948da660484e4251e8a9fc1c35b1e1d0b1390945a1a7fed75133a35a909350147aea2f4ade8c6a594e4251e869a228991861714e727777771b87f7fa2ad04a51323ac89a9cce89a25c345494f4c671c94928ca455b45493794514e42512e9a2b4a349a574e42512e5a2c4abc72128a72d168517628ca054579a0281714e581a25c5094078a7241511e28ca857d519a4ff70d38f4e327425145b12f0a1455148ab2475145a1287b1455148ab2475145a1287b1455148ab2475145a1287b1455148ab2475145f128eae1e1e10607dcdedee6c38402781405b8a0282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a022251141089a28048140544a2282012450191280a88445140248a02e2fcfdfb1f1924b627d994d4380000000049454e44ae426082, '2019-02-11', 10, 1, 10, '2019-02-23'),
(3, 'Test de prueba', 'Este test se hizo para probar el funcionamiento del aplicativo', 'No lo responda', NULL, '2019-03-19', 10, 3, NULL, NULL),
(4, 'Test sprint 3', 'tes de prueba', 'no hacerlo', NULL, '2019-03-19', 10, 3, NULL, NULL),
(6, 'gsggsgdgdgh', 'hshhdhdhddhh|', 'hshdhdhdhdh', NULL, '2019-03-19', 10, 3, NULL, NULL),
(7, 'TEST 2', 'NOHCAER', 'NOHACER', NULL, '2019-03-05', 9, 3, 10, '2019-03-22'),
(8, 'TEST 2', 'NOHCAER', 'NOHACER', NULL, '2019-03-05', 9, 3, 10, '2019-03-22'),
(9, 'TEST 2', 'NOHCAER', 'NOHACER', NULL, '2019-03-05', 9, 3, 10, '2019-03-22'),
(10, 'TEST 2', 'NOHCAER', 'NOHACER', NULL, '2019-03-05', 9, 3, 10, '2019-03-22'),
(11, 'Test Prueba', 'Este es un test de prueba, por favor no hacer.', 'No haga nada', NULL, '2019-03-22', 10, 3, NULL, NULL),
(12, 'Test de prueba', 'Test para probar el sistema', 'No lo complete', NULL, '2019-04-25', 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_test_x_estudiante`
--

DROP TABLE IF EXISTS `tbl_test_x_estudiante`;
CREATE TABLE IF NOT EXISTS `tbl_test_x_estudiante` (
  `CODIGO_TEST` int(11) NOT NULL,
  `CODIGO_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO_TEST`,`CODIGO_USUARIO`),
  KEY `CODIGO_USUARIO` (`CODIGO_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_test_x_estudiante`
--

INSERT INTO `tbl_test_x_estudiante` (`CODIGO_TEST`, `CODIGO_USUARIO`) VALUES
(1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_pregunta`
--

DROP TABLE IF EXISTS `tbl_tipo_pregunta`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_pregunta` (
  `CODIGO_TIPO_PREGUNTA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`CODIGO_TIPO_PREGUNTA`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_pregunta`
--

INSERT INTO `tbl_tipo_pregunta` (`CODIGO_TIPO_PREGUNTA`, `DESCRIPCION`) VALUES
(1, 'Selección Única'),
(2, 'Selección múltiple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `CODIGO_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `APELLIDO` varchar(45) NOT NULL,
  `CORREO` varchar(45) NOT NULL,
  `NUMCUENTA` varchar(11) DEFAULT NULL,
  `CONTRASENA` varchar(45) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `FOTO` blob,
  `CODIGO_GENERO` int(11) NOT NULL,
  `CODIGO_ROL_USUARIO` int(11) NOT NULL,
  `CODIGO_ESTADO` int(11) NOT NULL,
  `JUSTIFICACION` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_USUARIO`),
  KEY `fk_tbl_usuarios_tbl_generos_idx` (`CODIGO_GENERO`),
  KEY `fk_tbl_usuarios_tbl_rol_usuario1_idx` (`CODIGO_ROL_USUARIO`),
  KEY `fk_tbl_usuarios_tbl_estados_usuarios1_idx` (`CODIGO_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`CODIGO_USUARIO`, `NOMBRE`, `APELLIDO`, `CORREO`, `NUMCUENTA`, `CONTRASENA`, `FECHA_NACIMIENTO`, `FECHA_REGISTRO`, `TELEFONO`, `FOTO`, `CODIGO_GENERO`, `CODIGO_ROL_USUARIO`, `CODIGO_ESTADO`, `JUSTIFICACION`) VALUES
(9, 'Matias', 'Bethancourt', 'estudiante@gmail.com', '20151007823', '8cb2237d0679ca88db6464eac60da96345513964', '2019-02-21', '2019-02-23', '98765424', 0x696d672f696d6167656e47656e65726963612e737667, 1, 1, 1, NULL),
(10, 'Estefanie', 'Ortiz', 'dilverbenavides@hotmail.com', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-02-21', '2019-02-23', '88765434', 0x696d672f696d6167656e47656e65726963612e737667, 1, 3, 1, NULL),
(11, 'Carmen', 'Salinas', 'orientador@gmail.com', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-02-05', '2019-02-23', '98765432', 0x696d672f696d6167656e47656e65726963612e737667, 2, 2, 1, NULL),
(15, 'Susy', 'Perez', 'estudiante2@gmail.com', '20167782312', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1996-02-14', '2019-03-31', '98236567', NULL, 1, 1, 1, 'Se harÃ¡ la excepciÃ³n'),
(16, 'Fernando', 'Colindres', 'estudiante3@gmail.com', '20131007823', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1990-03-19', '2019-04-25', '89654367', NULL, 1, 1, 1, 'JustificaciÃ³n especial'),
(17, 'Pablos', 'Ruiz', 'estudiante4@gmail.com', '2012983646', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '98654356', NULL, 1, 1, 1, NULL),
(18, 'Oscar', 'Fernandez', 'estudiante5@gmail.com', '2010876543', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '98567854', NULL, 1, 1, 1, NULL),
(19, 'Ruby', 'Guillen', 'orientador2@gmail.com', '20161015623', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-18', '2019-03-19', '89764523', NULL, 2, 2, 1, NULL),
(20, 'Karolina', 'Martinez', 'orientador3@gmail.com', '20141008723', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '96552412', NULL, 2, 2, 1, NULL),
(21, 'Liliana', 'Lanza', 'orientador4@gmail.com', '20111002322', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '33567854', NULL, 2, 2, 1, NULL),
(22, 'Ruby', 'Guillen', 'estudiante6@gmail.com', '20161015623', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-18', '2019-03-19', '89764523', NULL, 2, 1, 1, NULL),
(23, 'Karolina', 'Martinez', 'karolinagmail.com', '20141008723', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '96552412', NULL, 2, 1, 1, NULL),
(24, 'Noel', 'Romero', 'noel@gmail.com', '20171023333', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '33567854', NULL, 2, 1, 1, NULL),
(25, 'Pedro', 'Romero', 'psicologo@gmail.com', '20171023333', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '33567854', NULL, 2, 4, 1, NULL),
(26, 'Josefina', 'Claen', 'psicologo2@gmail.com', '20171023333', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '33567854', NULL, 2, 4, 1, NULL),
(27, 'Carla', 'Funez', 'psicologo3@gmail.com', '20171023333', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '33567854', NULL, 2, 4, 1, NULL),
(28, 'Leo', 'Rubi', 'psicologo4@gmail.com', '20171023333', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-03-19', '2019-03-19', '33567854', NULL, 2, 4, 1, NULL),
(29, 'Rodrigo', 'Martinez', 'rodrigo@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-04-13', '2019-04-25', '98762345', 0x696d672f696d6167656e47656e65726963612e737667, 1, 2, 2, NULL),
(30, 'Denis', 'MartÃ­nez', 'denis@gmail.com', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1990-04-25', '2019-04-25', '98776545', 0x696d672f696d6167656e47656e65726963612e737667, 1, 2, 1, NULL),
(31, 'Elmer', 'Torres', 'elmer@gmail.com', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-04-25', '2019-04-25', '98876788', 0x696d672f696d6167656e47656e65726963612e737667, 1, 2, 1, NULL),
(32, 'Marcos', 'Perez', 'marcos@gmail.com', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-04-18', '2019-04-28', '96771316', 0x696d672f696d6167656e47656e65726963612e737667, 1, 2, 1, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_administradores`
--
ALTER TABLE `tbl_administradores`
  ADD CONSTRAINT `fk_tbl_administradores_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_bit_logins`
--
ALTER TABLE `tbl_bit_logins`
  ADD CONSTRAINT `fk_tbl_bit_logins_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_bloqueos_a_usuarios`
--
ALTER TABLE `tbl_bloqueos_a_usuarios`
  ADD CONSTRAINT `fk_tbl_bloqueos_a_usuarios_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_bloqueos_a_usuarios_tbl_usuarios2` FOREIGN KEY (`CODIGO_USUARIO_ADMINISTRADOR`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_estudiantes_x_grupo`
--
ALTER TABLE `tbl_estudiantes_x_grupo`
  ADD CONSTRAINT `fk_tbl_estudiantes_x_grupo_tbl_evaluacion_grupal1` FOREIGN KEY (`CODIGO_SECCION`) REFERENCES `tbl_evaluacion_grupal` (`CODIGO_SECCION`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_estudiantes_x_grupo_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_evaluacion_grupal`
--
ALTER TABLE `tbl_evaluacion_grupal`
  ADD CONSTRAINT `fk_tbl_evaluacion_grupal_tbl_estado_periodo1` FOREIGN KEY (`CODIGO_ESTADO`) REFERENCES `tbl_estado_periodo` (`CODIGO_ESTADO_PERIODO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_evaluacion_grupal_ibfk_1` FOREIGN KEY (`CODIGO_PERIODO`) REFERENCES `tbl_periodos` (`CODIGO_PERIODO`);

--
-- Filtros para la tabla `tbl_fechas_pedagogicas_x_periodo`
--
ALTER TABLE `tbl_fechas_pedagogicas_x_periodo`
  ADD CONSTRAINT `fk_tbl_fechas_x_periodo_tbl_periodos1` FOREIGN KEY (`CODIGO_PERIODO`) REFERENCES `tbl_periodos` (`CODIGO_PERIODO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_horario_x_orientador`
--
ALTER TABLE `tbl_horario_x_orientador`
  ADD CONSTRAINT `fk_tbl_horario_x_administrador_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_horario_x_orientador_tbl_horas1` FOREIGN KEY (`CODIGO_HORA`) REFERENCES `tbl_horas` (`CODIGO_HORA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_horario_x_orientador_tbl_periodos1` FOREIGN KEY (`CODIGO_PERIODO`) REFERENCES `tbl_periodos` (`CODIGO_PERIODO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_horario_x_orientador_ibfk_1` FOREIGN KEY (`CODIGO_DIA`) REFERENCES `tbl_fechas_pedagogicas_x_periodo` (`CODIGO_FECHA`);

--
-- Filtros para la tabla `tbl_horario_x_psicologo`
--
ALTER TABLE `tbl_horario_x_psicologo`
  ADD CONSTRAINT `tbl_horario_x_psicologo_ibfk_1` FOREIGN KEY (`CODIGO_DIA`) REFERENCES `tbl_fechas_psicologicas_x_periodo` (`CODIGO_FECHA`),
  ADD CONSTRAINT `tbl_horario_x_psicologo_ibfk_2` FOREIGN KEY (`CODIGO_HORA`) REFERENCES `tbl_horas` (`CODIGO_HORA`),
  ADD CONSTRAINT `tbl_horario_x_psicologo_ibfk_3` FOREIGN KEY (`CODIGO_PERIODO`) REFERENCES `tbl_periodos` (`CODIGO_PERIODO`),
  ADD CONSTRAINT `tbl_horario_x_psicologo_ibfk_4` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_mesajes`
--
ALTER TABLE `tbl_mesajes`
  ADD CONSTRAINT `fk_TBL_MENSAJES_TBL_MENSAJES1` FOREIGN KEY (`CODIGO_MENSAJE_PADRE`) REFERENCES `tbl_mesajes` (`CODIGO_MENSAJE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_MENSAJES_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO_REMITENTE`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_MENSAJES_tbl_usuarios2` FOREIGN KEY (`CODIGO_USUARIO_DESTINATARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_periodos`
--
ALTER TABLE `tbl_periodos`
  ADD CONSTRAINT `fk_tbl_periodos_tbl_estado_periodo1` FOREIGN KEY (`CODIGO_ESTADO_PERIODO`) REFERENCES `tbl_estado_periodo` (`CODIGO_ESTADO_PERIODO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_preguntas_x_test`
--
ALTER TABLE `tbl_preguntas_x_test`
  ADD CONSTRAINT `fk_TBL_PREGUNTAS_X_TEST_tbl_test1` FOREIGN KEY (`CODIGO_TEST`) REFERENCES `tbl_test` (`CODIGO_TEST`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_PREGUNTAS_X_TEST_tbl_tipo_pregunta1` FOREIGN KEY (`CODIGO_TIPO_PREGUNTA`) REFERENCES `tbl_tipo_pregunta` (`CODIGO_TIPO_PREGUNTA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_reservas_psicologicas_x_estudiante`
--
ALTER TABLE `tbl_reservas_psicologicas_x_estudiante`
  ADD CONSTRAINT `tbl_reservas_psicologicas_x_estudiante_ibfk_1` FOREIGN KEY (`CODIGO_HORARIO`) REFERENCES `tbl_horario_x_psicologo` (`CODIGO_HORARIO`),
  ADD CONSTRAINT `tbl_reservas_psicologicas_x_estudiante_ibfk_2` FOREIGN KEY (`CODIGO_USUARIO_ESTUDIANTE`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `tbl_reservas_psicologicas_x_estudiante_ibfk_3` FOREIGN KEY (`CODIGO_USUARIO_ORIENTADOR`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_reservas_x_estudiante`
--
ALTER TABLE `tbl_reservas_x_estudiante`
  ADD CONSTRAINT `fk_tbl_reservas_x_estudiante_tbl_horario_x_orientador1` FOREIGN KEY (`CODIGO_HORARIO`,`CODIGO_USUARIO_ORIENTADOR`) REFERENCES `tbl_horario_x_orientador` (`CODIGO_HORARIO`, `CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_reservas_x_estudiante_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO_ESTUDIANTE`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_respuestas_guardadas`
--
ALTER TABLE `tbl_respuestas_guardadas`
  ADD CONSTRAINT `tbl_respuestas_guardadas_ibfk_1` FOREIGN KEY (`CODIGO_PREGUNTA`) REFERENCES `tbl_preguntas_x_test` (`CODIGO_PREGUNTA`),
  ADD CONSTRAINT `tbl_respuestas_guardadas_ibfk_2` FOREIGN KEY (`CODIGO_RESPUESTA`) REFERENCES `tbl_respuestas_x_pregunta` (`CODIGO_RESPUESTA`),
  ADD CONSTRAINT `tbl_respuestas_guardadas_ibfk_3` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_respuestas_x_estudiante`
--
ALTER TABLE `tbl_respuestas_x_estudiante`
  ADD CONSTRAINT `fk_tbl_respuestas_x_estudiante_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_respuestas_x_estudiante_ibfk_1` FOREIGN KEY (`CODIGO_PREGUNTA`) REFERENCES `tbl_respuestas_x_pregunta` (`CODIGO_PREGUNTA`),
  ADD CONSTRAINT `tbl_respuestas_x_estudiante_ibfk_2` FOREIGN KEY (`CODIGO_RESPUESTA`) REFERENCES `tbl_respuestas_x_pregunta` (`CODIGO_RESPUESTA`);

--
-- Filtros para la tabla `tbl_respuestas_x_pregunta`
--
ALTER TABLE `tbl_respuestas_x_pregunta`
  ADD CONSTRAINT `tbl_respuestas_x_pregunta_ibfk_1` FOREIGN KEY (`CODIGO_PREGUNTA`) REFERENCES `tbl_preguntas_x_test` (`CODIGO_PREGUNTA`);

--
-- Filtros para la tabla `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD CONSTRAINT `fk_tbl_test_TBL_ESTADOS_TEST1` FOREIGN KEY (`CODIGO_ESTADO`) REFERENCES `tbl_estado_test` (`CODIGO_ESTADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_test_tbl_usuarios1` FOREIGN KEY (`CODIGO_USUARIO_CREADOR`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_test_tbl_usuarios2` FOREIGN KEY (`CODIGO_USUARIO_HABILITA`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_test_x_estudiante`
--
ALTER TABLE `tbl_test_x_estudiante`
  ADD CONSTRAINT `tbl_test_x_estudiante_ibfk_1` FOREIGN KEY (`CODIGO_TEST`) REFERENCES `tbl_test` (`CODIGO_TEST`),
  ADD CONSTRAINT `tbl_test_x_estudiante_ibfk_2` FOREIGN KEY (`CODIGO_USUARIO`) REFERENCES `tbl_usuarios` (`CODIGO_USUARIO`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_estados_usuarios1` FOREIGN KEY (`CODIGO_ESTADO`) REFERENCES `tbl_estados_usuarios` (`CODIGO_ESTADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_generos` FOREIGN KEY (`CODIGO_GENERO`) REFERENCES `tbl_generos` (`CODIGO_GENERO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_rol_usuario1` FOREIGN KEY (`CODIGO_ROL_USUARIO`) REFERENCES `tbl_rol_usuario` (`CODIGO_ROL_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
DROP EVENT `inhabilitacion_cuentas`$$
CREATE DEFINER=`root`@`localhost` EVENT `inhabilitacion_cuentas` ON SCHEDULE EVERY 1 MONTH STARTS '2019-04-30 23:59:59' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tbl_usuarios SET CODIGO_ESTADO = 0 WHERE CODIGO_ESTADO = 1 AND CODIGO_ROL_USUARIO = 1 AND datediff(CURRENT_TIMESTAMP, FECHA_REGISTRO) >= 20$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
