
-- Creando La tabla de Direccion

CREATE TABLE IF NOT EXISTS `Direccion` (
  `idDireccion` INT NOT NULL,
  `departamento` VARCHAR(45) NULL,
  `municipio` VARCHAR(45) NULL,
  `colonia` VARCHAR(45) NULL,
  `sector` VARCHAR(45) NULL,
  `numeroCasa` VARCHAR(45) NULL,
  PRIMARY KEY (`idDireccion`));

-- Creando la tabla de Genero

CREATE TABLE IF NOT EXISTS `Genero` (
  `idGenero` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGenero`));

-- Creando la tabla Estudiante

CREATE TABLE IF NOT EXISTS `Estudiante` (
  `idUsuario` INT NOT NULL,
  `no.cuenta` VARCHAR(11) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuario`));

-- Creando la tabla Persona

  CREATE TABLE IF NOT EXISTS `Persona` (
  `idPersona` INT NOT NULL,
  `identidad` VARCHAR(45) NOT NULL,
  `primerNombre` VARCHAR(45) NOT NULL,
  `segundoNombre` VARCHAR(45) NULL,
  `primerApellido` VARCHAR(45) NOT NULL,
  `segundoApellido` VARCHAR(45) NULL,
  `Direccion_idDireccion` INT NOT NULL,
  `Genero_idGenero` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idPersona`),
  CONSTRAINT `fk_Persona_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `Direccion` (`idDireccion`)
  ON DELETE NO ACTION  ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_Genero1` FOREIGN KEY (`Genero_idGenero`) REFERENCES `Genero` (`idGenero`)
  ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `Estudiante` (`idUsuario`)
  ON DELETE NO ACTION ON UPDATE NO ACTION);

-- Creando la tabla Telefono

  CREATE TABLE IF NOT EXISTS `Telefono` (
  `idTelefono` INT NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idTelefono`),
  CONSTRAINT `fk_Telefono_Persona1`FOREIGN KEY (`Persona_idPersona`) REFERENCES `Persona` (`idPersona`)
  ON DELETE NO ACTION ON UPDATE NO ACTION);


-- Creando la tabla Correo Electronico

  CREATE TABLE IF NOT EXISTS `mydb`.`CorreoElectronico` (
   `idCorreoElectronico` INT NOT NULL,
   `correoElectronico` VARCHAR(45) NOT NULL,
   `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idCorreoElectronico`),
  CONSTRAINT `fk_CorreoElectronico_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `mydb`.`Persona` (`idPersona`)
  ON DELETE NO ACTION ON UPDATE NO ACTION);


