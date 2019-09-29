-- ------------------------------------
-- Insertando datos en la tabla Genero
-- -------------------------------------
INSERT INTO `tbl_generos` (`idgenero`, `genero`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- ----------------------------------------------------------------------------------------------------------
-- Insertando datos en la tabla Persona del registro 1 hasta el 15 son estudiante del 16 al 30 son Empleados
-- -----------------------------------------------------------------------------------------------------------

INSERT INTO `tbl_personas`  (`idPersona`,`idGenero`,`nombres`,`apellidos`,`correo`,`contrasena`,`celular`,`no_identidad`,`fotoPerfil`,`estadocuenta`) VALUES
(1,1,'Joseth Noemy','Perez Urbina','joset54@hotmail.com','24596ace11e9e2e3d4bfebd74d24cac2','89909798','0801199208722','assets/images/profile-image-1.png',1),
(2,1,'Mayra Francisca','Ortega Antunez','mayra01@yahoo.com','24596ace11e9e2e3d4bfebd74d24cac2','95808982','0801199389851','assets/images/profile-image-1.png',1),
(3,1,'Ivis Marissela','Flores Lopez','ivisl@yahoo.com','24596ace11e9e2e3d4bfebd74d24cac2','95552797','0801199045987','assets/images/profile-image-1.png',1),
(4,1,'Joselin Paola','Corrales Rodriguez','joselintompson@yahoo.com','24596ace11e9e2e3d4bfebd74d24cac2','95521476','0801199209785','assets/images/profile-image-1.png',1),
(5,1,'Brenda Jasmin','Pacheco Sanchez','fresa12@yahoo.com','24596ace11e9e2e3d4bfebd74d24cac2','95522789','0801199357894','assets/images/profile-image-1.png',1),
(6,1,'Ana Olga','Lopez Orellana','ana108@hotmail.com','24596ace11e9e2e3d4bfebd74d24cac2','98987562','0801199408654','assets/images/profile-image-1.png',1),
(7,1,'Amparo Samantha','Padilla Sanchez','casa100@hotmail.com','24596ace11e9e2e3d4bfebd74d24cac2','84752354','0801198956478','assets/images/profile-image-1.png',0),
(8,1,'Nadia Lisbeth','Rodriguez Alvarez','Nad89@hotmail.com','24596ace11e9e2e3d4bfebd74d24cac2','98997877','0801199108974','assets/images/profile-image-1.png',0),
(9,1,'Juana Pamela','Reyes Portillo','jayjay98@hotmail.com','24596ace11e9e2e3d4bfebd74d24cac2','95606162','0801199208922','assets/images/profile-image-1.png',0),
(10,2,'Oscar Andryu','Canales Canales','andy120@hotmail.com','24596ace11e9e2e3d4bfebd74d24cac2','98999899','0801199013533','assets/images/profile-image-2.png',1),
(11,2,'Juan Jose','Ortega Calderon','joh125@gmail.com','24596ace11e9e2e3d4bfebd74d24cac2','36358987','0801199589713','assets/images/profile-image-2.png',0),
(12,1,'Kelly Noemhy','Banegas Torrrez','jmarga78@gmail.com','24596ace11e9e2e3d4bfebd74d24cac2','33453389','0801188975862','assets/images/profile-image-1.png',1),
(13,1,'Andrea Nicol','Cairo Ponce','andrea198@gmail.com','24596ace11e9e2e3d4bfebd74d24cac2','95785122','1519199223487','assets/images/profile-image-1.png',0),
(14,2,'Gelberth Elisandro','Banegas Mejia','gelberth1000@gmail.com','24596ace11e9e2e3d4bfebd74d24cac2','95804898','0801199019877','assets/images/profile-image-2.png',1),
(15,2,'Bayron Astul','Torres Mejia','dolor1000@gmail.com','24596ace11e9e2e3d4bfebd74d24cac2','95804971','0801199209721','assets/images/profile-image-2.png',1),
(16,1,'Hector Arnoldo','Perez Urbina','hectorArnol@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','89909774','0801188508722','assets/images/profile-image-1.png',1),
(17,1,'Everth Francisca','Ortega Antunez','FrancisHec@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95808971','0801188789851','assets/images/profile-image-1.png',1),
(18,1,'Maria Marissela','Flores Lopez','MariaFL@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95552790','0801188845987','assets/images/profile-image-1.png',1),
(19,1,'Lysi Paola','Corrales Rodriguez','Lysipa12@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95521475','0801188509785','assets/images/profile-image-1.png',1),
(20,1,'Kevin David','Pacheco Sanchez','KevinDav@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95522780','0801188057894','assets/images/profile-image-1.png',1),
(21,1,'Carlos Joel','Lopez Orellana','CarlosOrellana@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','98987559','080118828654','assets/images/profile-image-1.png',1),
(22,1,'Danelia Mariam','Padilla Sanchez','Daneliapadi@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','84752254','0801188756478','assets/images/profile-image-1.png',1),
(23,1,'Pamela Adrian','Rodriguez Alvarez','Pame12@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','98997866','0801188308974','assets/images/profile-image-1.png',1),
(24,1,'Juana Mellisa','Reyes Portillo','juana897@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95606100','0801187908922','assets/images/profile-image-1.png',1),
(25,2,'Oscar Andres','Canales Canales','Oscar58@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','98009899','0801188013533','assets/images/profile-image-2.png',1),
(26,2,'Emilson Samuel','Ortega Calderon','Emilso12@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','33358987','080188189713','assets/images/profile-image-2.png',1),
(27,1,'Kevin Amador','Banegas Torrrez','KevinBane@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','88453389','080188875862','assets/images/profile-image-1.png',1),
(28,1,'Jose Luis','Cairo Ponce','Jose_Luis@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95785112','1519199023487','assets/images/profile-image-1.png',1),
(29,2,'Mariano Joel','Banegas Mejia','JoeMariano@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95664898','0801187819877','assets/images/profile-image-2.png',0),
(30,2,'Jose Teruel','Torres Mejia','JoseTer@unah.hn','24596ace11e9e2e3d4bfebd74d24cac2','95504971','0801187909721','assets/images/profile-image-2.png',0);


-- -----------------------------------------------------
-- Insertando datos en la tabla Carreras
-- -----------------------------------------------------

INSERT INTO  `tbl_carreras` (`idCarrera`,`nombreCarrera`)VALUES
(1, 'Licenciatura en Derecho'),
(2, 'Licenciatura en Antropología'),
(3, 'Licenciatura en Periodismo'),
(4, 'Licenciatura en Psicología'),
(5, 'Licenciatura en Pedagogía'),
(6, 'Licenciatura en Trabajo Social'),
(7, 'Licenciatura en Historia'),
(8, 'Licenciatura en Letras'),
(9, 'Licenciatura en Filosofía'),
(10, 'Licenciatura en Sociología'),
(11, 'Licenciatura en Educación Física'),
(12, 'Licenciatura en Lenguas Extranjeras con Orientación en Inglés y Francés'),
(13, 'Licenciatura en Música'),
(14, 'Licenciatura en Desarrollo Local'),
(15, 'Ingeniería Civil'),
(16, 'Ingeniería Mecánica Industrial'),
(17, 'Ingeniería Eléctrica Industrial '),
(18, 'Ingeniería Industrial '),
(19, 'Ingeniería en Sistemas '),
(20, 'Arquitectura '),
(21, 'Licenciatura en Matemáticas '),
(22, 'Licenciatura en Física '),
(23, 'Licenciatura en Astronomía  y Astrofísica '),
(24, 'Licenciatura en Ciencia y Tecnologías de la Información Geográfica '),
(25, 'Medicina'),
(26, 'Odontología '),
(27, 'Licenciatura en Nutrición '),
(28, 'Química y Farmacia '),
(29, 'Enfermería '),
(30, 'Microbiología '),
(31, 'Licenciatura en Biología '),
(32, 'Licenciatura en Fonoaudiología '),
(33, 'Licenciatura en Administración de Empresas '),
(34, 'Licenciatura en Administración Pública '),
(35, 'Licenciatura en Economía '),
(36, 'Licenciatura en Contaduría Pública y Finanzas '),
(37, 'Licenciatura en Administración Aduanera '),
(38, 'Licenciatura en Administración de Banca y Finanzas '),
(39, 'Licenciatura en Comercio Internacional '),
(40, 'Licenciatura en Informatica Administrativa '),
(41, 'Licenciatura en Mercadotecnia'),
(42, 'Ingeniería Agronómica '),
(43, 'Ingeniería Forestal '),
(44, 'Ingeniería Agroindustrial'),
(45, 'Ingeniería en Ciencias Acuicolas y Recursos Marinos Costeros'),
(46, 'Licenciatura en Economía Agricola '),
(47, 'Licenciatura en Ecoturismo'),
(48, 'Licenciatura en Comercio Internacional con Orientación en Agroindustria '),
(49, 'Técnico Universitario en Educación Básica para la Enseñanza del Español'),
(50, 'Técnico Universitario Metalurgia '),
(51, 'Técnico en Producción Agrícola '),
(52, 'Técnico Universitario en Terapia Funcional '),
(53, 'Técnico Universitario en Radiotecnologías (Radiología e Imágenes)'),
(54, 'Técnico Universitario en Microfinanzas '),
(55, 'Técnico Universitario en Alimentos y Bebidas '),
(56, 'Técnico Universitario en Calidad del Café'),
(57, 'Técnico Universitario en Administración de Empresas Cafetaleras '),
(58, 'Técnico Universitario en Sistemas de Información Geografía con Énfasis en Catastro '),
(59, 'Técnico Universitario en Desarrollo Municipal '),
(60, 'Licenciatura en Administración de Empresas Agropecuarias '),
(61, 'Licenciatura en Pedagogía '),
(62, 'Licenciatura en Pedagogía '),
(63, 'Técnico Universitario en Microfinanzas '),
(64, 'Licenciatura en Ecoturismo '),
(65, 'Técnico  Universitario en Lengua de Señas');


-- -----------------------------------------------------
-- Insertando datos en  la tabla estudiantes
-- -----------------------------------------------------

INSERT INTO `tbl_estudiantes` ( `idEstudiante`,`no_cuenta`,`idCarrera`)VALUES
(1,'20131006382',1),
(2,'20131012589',1),
(3,'20121001478',1),
(4,'20114005897',2),
(5,'20131008975',3),
(6,'20151008879',14),
(7,'20152874579',15),
(8,'20141587789',4),
(9,'20161008788',5),
(10,'20125004744',6),
(11,'20114005789',7),
(12,'20101002020',8),
(13,'20178009456',10),
(14,'20181004567',9),
(15,'20191006879',11);


-- -----------------------------------------------------
-- Insertando la tabla tipo_usuarios
-- -----------------------------------------------------

INSERT INTO `tbl_tipousuario` (`idtipousuario`,`descripcion`)VALUES
(1,'Administrador'),
(2,'Entrevistador'),
(3,'Psicologo'),
(4,'Estudiante');

-- -----------------------------------------------------
-- Insertando transaccional tbl_personas_has_tbl_tipousuario`
-- -----------------------------------------------------

INSERT INTO `tbl_personas_has_tbl_tipousuario` (`tbl_personas_idPersona`,`tbl_tipousuario_idtipousuario`)VALUES
(1,4),
(2,4),
(3,4),
(4,4),
(5,4),
(6,4),
(7,4),
(8,4),
(9,4),
(10,4),
(11,4),
(12,4),
(13,4),
(14,4),
(15,4),
(16,1),
(17,2),
(18,2),
(19,2),
(20,2),
(21,2), 
(22,2),
(23,2),
(24,2),
(25,3),
(26,3),
(27,3),
(28,3),
(29,3),
(30,3);

-- -----------------------------------------------------
-- Insertando en la tabla de tbl_procesos
-- -----------------------------------------------------

INSERT INTO `tbl_procesos` (`idprocesos`,`fechainicio`,`fechafinal`,`fechainiciotestlinea`,`fechafinaltestlinea`,`urltestlinea1`,`urltestline2`,
	`clavetest`,`fechainicioentrevista`,`fechafinentrevista`,`fechainiciodevuelveresultado` , `fechafindevuelveresultado`,`estado`)VALUES
(1,'2019-09-22','2019-10-10','2019-09-25','2019-09-27','https://forms.gle/HPfBMyuxwXeAuCqRA','https://forms.gle/WxADGTiHVCQjXCK4A','ASD.456','2019-09-28','2019-07-30','2019-10-02','2019-10-07','Activo'),
(2,'2019-10-11','2019-10-20','2019-10-12','2019-10-13','https://forms.gle/HPfBMyuxwXeAuCqRA','https://forms.gle/WxADGTiHVCQjXCK4A','ASD.456','2019-10-14','2019-10-15','2019-10-17','2019-10-19','Activo'),
(3,'2019-10-21','2019-11-01','2019-10-23','2019-10-25','https://forms.gle/HPfBMyuxwXeAuCqRA','https://forms.gle/WxADGTiHVCQjXCK4A','ASD.456','2019-10-26','2019-10-27','2019-10-28','2019-10-30','Activo'),
(4,'2019-11-02','2019-11-17','2019-11-05','2019-11-08','https://forms.gle/HPfBMyuxwXeAuCqRA','https://forms.gle/WxADGTiHVCQjXCK4A','ASD.456','2019-07-29','2019-11-09','2019-11-12','2019-11-16','Activo'),
(5,'2019-11-18','2019-12-03','2019-11-19','2019-11-23','https://forms.gle/HPfBMyuxwXeAuCqRA','https://forms.gle/WxADGTiHVCQjXCK4A','ASD.456','2019-11-25','2019-11-27','2019-11-29','2019-12-01','Inactivo');




-- -----------------------------------------------------
-- Insertando en la  tabla `tbl_secciones`
-- -----------------------------------------------------
INSERT INTO `tbl_secciones` (`idsecciones`,`horainicial`,`horafinal`,`cupos`,`lugar`,`idprocesos`,`dia`)VALUES
(1,'09:30:00','12:30:00',25,'Aula Voae 209',1,'Septiembre 09, 2019'),
(2,'09:30:00','12:30:00',25,'Aula Voae 208',2,'Octubre 11, 2019'),
(3,'09:30:00','12:30:00',25,'Aula Voae 210',3,'Octubre 21, 2019'),
(4,'09:30:00','12:30:00',25,'Aula Voae 207',4,'Septiembre 02, 2019'),
(5,'09:30:00','12:30:00',25,'Aula Voae 205',5,'Septiembre 18, 2019');


-- -----------------------------------------------------
-- Insertando en la  tabla `tbl_`control_de_procesos
-- -----------------------------------------------------

INSERT INTO `tbl_control_de_procesos` (`idcontrolprocesos`,`porcentaje`,`etapa1`,`etapa2`,`etapa3`,`etapa4`,`idEstudiante`,`idprocesos`)VALUES
(1,50,0,0,1,1,1,1),
(2,0,0,0,0,0,2,2),
(3,100,1,1,1,1,3,3),
(4,100,1,1,1,1,4,4),
(5,25,1,0,0,0,5,5);

-- -----------------------------------------------------
-- Insertando en la  tabla `tbl_Horarios_Orientador
-- -----------------------------------------------------

INSERT INTO`tbl_Horarios_Orientador` (`idhorariosorientador`,`fecha`,`h_inicial`,`h_final`,`tipoevento`,`codigohorario`,`idorientador`,`idprocesos`)VALUES
(1,'22 9 2019','09:30:00','12:30:00','2','2019-09-22','1',1),
(2,'11 10 2019','09:30:00','12:30:00','2','2019-10-11','2',2),
(3,'21 10 2019','09:30:00','12:30:00','3','2019-10-21','3',3),
(4,'02 11 2019','09:30:00','12:30:00','3','2019-11-02','4',4),
(5,'18 11 2019','09:30:00','12:30:00','2','2019-11-18','5',5);



-- -----------------------------------------------------
--  Insetando en la `tbl_secciones_has_tbl_estudiantes`
-- -----------------------------------------------------
INSERT INTO`tbl_secciones_has_tbl_estudiantes` (`tbl_secciones_idsecciones`,`tbl_estudiantes_idEstudiante`)VALUES
(1,1),
(1,2),
(2,3),
(3,4),
(4,5);

-- -----------------------------------------------------
--  Insetando en la `tbl_Horarios_Orientador_X_tbl_estudiantes`
-- -----------------------------------------------------
INSERT INTO`tbl_Horarios_Orientador_X_tbl_estudiantes` (`idhorariosorientador`,`idEstudiante`)VALUES
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);

-- -----------------------------------------------------
--  Insetando en la `tbl_resultados`
-- -----------------------------------------------------
INSERT INTO`tbl_resultados` (`idresultados`,`urlPdf`,`FechaModificacion`,`idprocesos`,`idEstudiante`,`idorientador`)VALUES
(1,'resultados/Formacion-Profesional-Voae.pdf','2019-10-06',1,1,17),
(2,'resultados/Formacion-Profesional-Voae.pdf','2019-10-18',2,2,18),
(3,'resultados/Formacion-Profesional-Voae.pdf','2019-10-29',3,3,19),
(4,'resultados/Formacion-Profesional-Voae.pdf','2019-11-15',4,4,20),
(5,'resultados/Formacion-Profesional-Voae.pdf','2019-11-30',5,5,21);

