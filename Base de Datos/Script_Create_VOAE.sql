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
  `estadocuenta` BOOLEAN NULL,
  PRIMARY KEY (`idPersona`),
  CONSTRAINT `fk_tbl_personas_tbl_generos1`
    FOREIGN KEY (`idGenero`)
    REFERENCES .`tbl_generos` (`idGenero`)
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
-- Creando la tabla tipo_usuarios
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_tipousuario` (
  `idtipousuario` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idtipousuario`));


-- -----------------------------------------------------
-- Creando la tabla transaccional tbl_personas_has_tbl_tipousuario`
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
-- Creando tabla de tbl_procesos
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
  PRIMARY KEY (`idprocesos`));


-- -----------------------------------------------------
-- Creando tabla `tbl_secciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_secciones` (
  `idsecciones` varchar(150) NOT NULL,
  `horainicial` TIME NULL,
  `horafinal` TIME NULL,
  `cupos` INT NULL,
  `lugar` VARCHAR(100) NULL,
  `idprocesos` INT NOT NULL,
  `dia` varchar(100) NULL,
  PRIMARY KEY (`idsecciones`, `idprocesos`),
  CONSTRAINT `fk_tbl_secciones_tbl_procesos1`
    FOREIGN KEY (`idprocesos`)
    REFERENCES `tbl_procesos` (`idprocesos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

