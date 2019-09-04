

-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `idGenero` INT NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGenero`));


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_personas`
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
  `estadocuenta` BOOLEAN NULL,
  PRIMARY KEY (`idPersona`),
  CONSTRAINT `fk_tbl_personas_tbl_generos1`
    FOREIGN KEY (`idGenero`)
    REFERENCES `tbl_generos` (`idGenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_carreras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_carreras` (
  `idCarrera` VARCHAR(10) NOT NULL,
  `nombreCarrera` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idCarrera`));


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_estudiantes`
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
-- Table `OrientacionProfesional`.`tbl_tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_tipousuario` (
  `idtipousuario` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idtipousuario`));


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_personas_has_tbl_tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_personas_has_tbl_tipousuario` (
  `tbl_personas_idPersona` INT NOT NULL,
  `tbl_tipousuario_idtipousuario` INT NOT NULL,
  PRIMARY KEY (`tbl_personas_idPersona`, `tbl_tipousuario_idtipousuario`),
  CONSTRAINT `fk_tbl_personas_has_tbl_tipousuario_tbl_personas1`
    FOREIGN KEY (`tbl_personas_idPersona`)
    REFERENCES `tbl_personas` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_personas_has_tbl_tipousuario_tbl_tipousuario1`
    FOREIGN KEY (`tbl_tipousuario_idtipousuario`)
    REFERENCES `tbl_tipousuario` (`idtipousuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_procesos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_procesos` (
  `idprocesos` INT NOT NULL,
  `fechainicio` DATETIME NULL,
  `fechafinal` DATETIME NULL,
  `fechainiciotestlinea` DATETIME NULL,
  `fechafinaltestlinea` DATETIME NULL,
  `urltestlinea1` VARCHAR(300) NULL,
  `urltestline2` VARCHAR(300) NULL,
  `clavetest` VARCHAR(100) NULL,
  `fechainicioentrevista` DATETIME NULL,
  `fechafinentrevista` DATETIME NULL,
  `fechainiciodevuelveresultado` DATETIME NULL,
  `fechafindevuelveresultado` DATETIME NULL,
  `estado` VARCHAR(45) NULL,
  PRIMARY KEY (`idprocesos`));


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_secciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_secciones` (
  `idsecciones` INT NOT NULL,
  `horainicial` TIME NULL,
  `horafinal` TIME NULL,
  `cupos` INT NULL,
  `lugar` VARCHAR(100) NULL,
  `idprocesos` INT NOT NULL,
  `dia` VARCHAR(100) NULL,
  PRIMARY KEY (`idsecciones`),
  CONSTRAINT `fk_tbl_secciones_tbl_procesos1`
    FOREIGN KEY (`idprocesos`)
    REFERENCES `tbl_procesos` (`idprocesos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_control_de_procesos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_control_de_procesos` (
  `idcontrolprocesos` INT NOT NULL,
  `porcentaje` INT NULL,
  `etapa1` BOOLEAN NULL,
  `etapa2` BOOLEAN NULL,
  `etapa3` BOOLEAN NULL,
  `etapa4` BOOLEAN NULL,
  `idEstudiante` INT NOT NULL,
  `idprocesos` INT NOT NULL,
  PRIMARY KEY (`idcontrolprocesos`),
  CONSTRAINT `fk_tbl_control_de_procesos_tbl_estudiantes1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES .`tbl_estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_control_de_procesos_tbl_procesos1`
    FOREIGN KEY (`idprocesos`)
    REFERENCES `tbl_procesos` (`idprocesos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_Horarios_Orientador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_Horarios_Orientador` (
  `idhorariosorientador` INT NOT NULL,
  `fecha` VARCHAR(1000) NULL,
  `h_inicial` TIME NULL,
  `h_final` TIME NULL,
  `tipoevento` VARCHAR(45) NULL,
  `codigohorario` VARCHAR(2000) NULL,
  `idorientador` VARCHAR(45) NULL,
  `idprocesos` INT NOT NULL,
  PRIMARY KEY (`idhorariosorientador`),
  CONSTRAINT `fk_tbl_Horarios_Orientador_tbl_procesos1`
    FOREIGN KEY (`idprocesos`)
    REFERENCES `tbl_procesos` (`idprocesos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_secciones_has_tbl_estudiantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_secciones_has_tbl_estudiantes` (
  `tbl_secciones_idsecciones` INT NOT NULL,
  `tbl_estudiantes_idEstudiante` INT NOT NULL,
  PRIMARY KEY (`tbl_secciones_idsecciones`, `tbl_estudiantes_idEstudiante`),
  CONSTRAINT `fk_tbl_secciones_has_tbl_estudiantes_tbl_secciones1`
    FOREIGN KEY (`tbl_secciones_idsecciones`)
    REFERENCES `tbl_secciones` (`idsecciones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_secciones_has_tbl_estudiantes_tbl_estudiantes1`
    FOREIGN KEY (`tbl_estudiantes_idEstudiante`)
    REFERENCES `tbl_estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `OrientacionProfesional`.`tbl_Horarios_Orientador_X_tbl_estudiantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_Horarios_Orientador_X_tbl_estudiantes` (
  `idhorariosorientador` INT NOT NULL,
  `idEstudiante` INT NOT NULL,
  PRIMARY KEY (`idhorariosorientador`, `idEstudiante`),
  CONSTRAINT `fk_tbl_Horarios_Orientador_X_tbl_estudiantes_tbl_Horarios_O1`
    FOREIGN KEY (`idhorariosorientador`)
    REFERENCES `tbl_Horarios_Orientador` (`idhorariosorientador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Horarios_Orientador_X_tbl_estudiantes_tbl_estudiantes1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `tbl_estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
