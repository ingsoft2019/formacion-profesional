-- -----------------------------------------------------
-- Creando la tabla generos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `idGenero` INT NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGenero`));

-- -----------------------------------------------------
-- Creando la tabla personas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_personas` (
  `idPersona` INT NOT NULL,
  `idGenero` INT NOT NULL,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(150) NULL,
  `contrasena` VARCHAR(45) NULL,
  `celular` VARCHAR(8) NULL,
  `no_identidad` VARCHAR(13) NULL,
  `fotoPerfil` VARCHAR(300) NULL,
  PRIMARY KEY (`idPersona`),
  CONSTRAINT `fk_tbl_personas_tbl_generos1`
    FOREIGN KEY (`idGenero`)
    REFERENCES `OrientacionProfesional`.`tbl_generos` (`idGenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando la tabla Carreras
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_carreras` (
  `idCarrera` VARCHAR(10) NOT NULL,
  `nombreCarrera` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idCarrera`));


-- -----------------------------------------------------
-- Creando la tabla estudiantes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_estudiantes` (
  `idEstudiante` INT NOT NULL,
  `no_cuenta` VARCHAR(11) NOT NULL,
  `idCarrera` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  CONSTRAINT `fk_tbl_estudiante_tbl_persona`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `tbl_personas` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_estudiantes_tbl_carreras1`
    FOREIGN KEY (`idCarrera`)
    REFERENCES `tbl_carreras` (`idCarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando Tabla Cargos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_cargos` (
  `idCargo` INT NOT NULL,
  `nombreCargo` VARCHAR(45) NOT NULL COMMENT 'Por ejemplo administrador, entrevistador o psicólogo',
  PRIMARY KEY (`idCargo`));


-- -----------------------------------------------------
-- Creando tabla de empleados
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_empleados` (
  `idEmpleado` INT NOT NULL,
  `tbl_cargos_idCargo` INT NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  CONSTRAINT `fk_tbl_carreras_tbl_cargos1`
    FOREIGN KEY (`tbl_cargos_idCargo`)
    REFERENCES `tbl_cargos` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_carreras_tbl_personas1`
    FOREIGN KEY (`idEmpleado`)
    REFERENCES `tbl_personas` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando tabla estado de las etapas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_estado_etapas` (
  `idEstado` INT NOT NULL,
  `estado` VARCHAR(45) NULL COMMENT 'Campo empleado para indicar si el período de inscripción está habilitado o no. Valores: 1 -> Habil   0->No habil',
  PRIMARY KEY (`idEstado`));


-- -----------------------------------------------------
-- Creando la tabla etapas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_etapas` (
  `idEtapa` INT NOT NULL,
  `NombreEtapa` VARCHAR(150) NULL,
  `Descripción` VARCHAR(500) NULL,
  PRIMARY KEY (`idEtapa`));


-- -----------------------------------------------------
-- Creando tabla etapas_programadas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_etapas_programadas` (
  `idEtapaProgramada` INT NOT NULL,
  `idEtapa` INT NOT NULL,
  `periodo` VARCHAR(45) NOT NULL COMMENT 'Registrar y validar mediante programación. Manejar formato: 2019-2 , siendo el primer fragmento el año y el segundo el número de período. ',
  `idEstado` INT NOT NULL,
  `habilitacionAutomatica` TINYINT NOT NULL COMMENT 'Si el encargado de publicar el comienzo o fin de etapas desea, puede activarlas manual o automáticamente.',
  `fechaInicio` DATETIME NOT NULL COMMENT 'Fecha y hora en la que el periodo de inscripción comienza (Estado hábil)',
  `fechaFin` DATETIME NOT NULL COMMENT 'Fecha y hora en la que el periodo de inscripción termina (Estado no hábil)',
  PRIMARY KEY (`idEtapaProgramada`),
  CONSTRAINT `fk_tbl_inscripciones_tbl_estados1`
    FOREIGN KEY (`idEstado`)
    REFERENCES `tbl_estado_etapas` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_etapas_table11`
    FOREIGN KEY (`idEtapa`)
    REFERENCES `tbl_etapas` (`idEtapa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando la tabla  jornadas grupal
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_jornadas_ev_grupal` (
  `idJornada` INT NOT NULL,
  `idEtapaProgramada` INT NOT NULL,
  `cantidadCupos` INT NOT NULL,
  `horaInicial` TIME NOT NULL,
  `horaFinal` TIME NOT NULL,
  `lugarAplicacion` VARCHAR(200) NOT NULL,
  `fechaAplicacion` DATE NULL,
  PRIMARY KEY (`idJornada`),
  CONSTRAINT `fk_tbl_jornadas_Inscrip_tbl_etapas_programadas1`
    FOREIGN KEY (`idEtapaProgramada`)
    REFERENCES `tbl_etapas_programadas` (`idEtapaProgramada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando la tabla Progresos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_Progresos` (
  `idEstudiante` INT NOT NULL,
  `idEtapaProgramada` INT NOT NULL,
  `estadoCompletacion` TINYINT NOT NULL COMMENT '0 -- no completada\n1 -- completada',
  `notas` VARCHAR(400) NULL,
  PRIMARY KEY (`idEstudiante`),
  CONSTRAINT `fk_tbl_Progresos_tbl_estudiantes1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `tbl_estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Progresos_tbl_etapas_programadas1`
    FOREIGN KEY (`idEtapaProgramada`)
    REFERENCES `tbl_etapas_programadas` (`idEtapaProgramada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Creando la tabla resultados
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_resultados` (
  `idResultado` INT NOT NULL,
  `idEstudiante` INT NOT NULL,
  `idEmpleado` INT NOT NULL,
  `idEtapaProgramada` INT NOT NULL,
  `archivoResultados` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`idResultado`),
  CONSTRAINT `fk_tbl_resultados_tbl_etapas_programadas1`
    FOREIGN KEY (`idEtapaProgramada`)
    REFERENCES `tbl_etapas_programadas` (`idEtapaProgramada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_resultados_tbl_estudiantes1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `tbl_estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_resultados_tbl_empleados1`
    FOREIGN KEY (`idEmpleado`)
    REFERENCES `tbl_empleados` (`idEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando tabla JornadaxEstudiante
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_jornadasl_x_estudiantes` (
  `idJornada` INT NOT NULL,
  `idEstudiante` INT NOT NULL,
  PRIMARY KEY (`idJornada`, `idEstudiante`),
  CONSTRAINT `fk_tbl_inscripciones_x_estudiantes_tbl_jornadas_Inscrip1`
    FOREIGN KEY (`idJornada`)
    REFERENCES `tbl_jornadas_ev_grupal` (`idJornada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_inscripciones_x_estudiantes_tbl_estudiantes1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `tbl_estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando Tabla HorariosxEmpleado
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_horarios_x_empleado` (
  `idHorarioEmpleado` INT NOT NULL,
  `idEmpleado` INT NOT NULL,
  `idEtapaProgramada` INT NOT NULL,
  `Fecha` DATE NULL,
  `horaInicial` TIME NULL,
  `horaFinal` TIME NULL,
  PRIMARY KEY (`idHorarioEmpleado`),
  CONSTRAINT `fk_tbl_horarios_x_empleado_tbl_empleados1`
    FOREIGN KEY (`idEmpleado`)
    REFERENCES `tbl_empleados` (`idEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_horarios_x_empleado_tbl_etapas_programadas1`
    FOREIGN KEY (`idEtapaProgramada`)
    REFERENCES `tbl_etapas_programadas` (`idEtapaProgramada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando tabla Estado de citas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_estado_citas` (
  `idEstado` INT NOT NULL,
  `Descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`));


-- -----------------------------------------------------
-- Creando tabal de citas
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_citas` (
  `idCita` INT NOT NULL,
  `idEmpleado` INT NOT NULL,
  `idEstudiante` INT NOT NULL,
  `idEtapaProgramada` INT NOT NULL,
  `idEstado` INT NOT NULL,
  PRIMARY KEY (`idCita`),
  CONSTRAINT `fk_tbl_citas_tbl_empleados1`
    FOREIGN KEY (`idEmpleado`)
    REFERENCES `tbl_empleados` (`idEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_citas_tbl_estudiantes1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `tbl_estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_citas_tbl_etapas_programadas1`
    FOREIGN KEY (`idEtapaProgramada`)
    REFERENCES `tbl_etapas_programadas` (`idEtapaProgramada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_citas_tbl_estado_citas1`
    FOREIGN KEY (`idEstado`)
    REFERENCES `tbl_estado_citas` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Creando Tabla de Bloqueos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_bloqueos` (
  `idPersona` INT NOT NULL,
  `estadoBloqueo` TINYINT NOT NULL,
  `descripcion` VARCHAR(500) NULL,
  PRIMARY KEY (`idPersona`),
  CONSTRAINT `fk_tbl_bloqueos_tbl_personas1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `tbl_personas` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);