-- ------------------------------------
-- Insertando datos en la tabla Genero
-- -------------------------------------
INSERT INTO `tbl_generos` (`idgenero`, `genero`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- ----------------------------------------------------------------------------------------------------------
-- Insertando datos en la tabla Persona del registro 1 hasta el 15 son estudiante del 16 al 30 son Empleados
-- -----------------------------------------------------------------------------------------------------------

INSERT INTO `tbl_personas`  (`idPersona`,`idGenero`,`nombres`,`apellidos`,`correo`,`contrasena`,`celular`,`no_identidad`,`fotoPerfil`) VALUES
(1,1,'Joseth Noemy','Perez Urbina','joset54@hotmail.com','perro','89909798','0801199208722','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(2,1,'Mayra Francisca','Ortega Antunez','mayra01@yahoo.com','gato','95808982','0801199389851','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(3,1,'Ivis Marissela','Flores Lopez','ivisl@yahoo.com','oso','95552797','0801199045987','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(4,1,'Joselin Paola','Corrales Rodriguez','joselintompson@yahoo.com','joses','95521476','0801199209785','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(5,1,'Brenda Jasmin','Pacheco Sanchez','fresa12@yahoo.com','trunks','95522789','0801199357894','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(6,1,'Ana Olga','Lopez Orellana','ana108@hotmail.com','goku92','98987562','0801199408654','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(7,1,'Amparo Samantha','Padilla Sanchez','casa100@hotmail.com','marlon87','84752354','0801198956478','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(8,1,'Nadia Lisbeth','Rodriguez Alvarez','Nad89@hotmail.com','kelly100','98997877','0801199108974','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(9,1,'Juana Pamela','Reyes Portillo','jayjay98@hotmail.com','sandro87','95606162','0801199208922','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(10,2,'Oscar Andryu','Canales Canales','andy120@hotmail.com','casas98','98999899','0801199013533','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(11,2,'Juan Jose','Ortega Calderon','joh125@gmail.com','astul89','36358987','0801199589713','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(12,1,'Kelly Noemhy','Banegas Torrrez','jmarga78@gmail.com','acapulco','33453389','0801188975862','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(13,1,'Andrea Nicol','Cairo Ponce','andrea198@gmail.com','hormiga','95785122','1519199223487','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(14,2,'Gelberth Elisandro','Banegas Mejia','gelberth1000@gmail.com','leon','95804898','0801199019877','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(15,2,'Bayron Astul','Torres Mejia','dolor1000@gmail.com','perro02','95804971','0801199209721','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(16,1,'Hector Arnoldo','Perez Urbina','hectorArnol@unah.hn','perro','89909774','0801188508722','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(17,1,'Everth Francisca','Ortega Antunez','FrancisHec@unah.hn','gato','95808971','0801188789851','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(18,1,'Maria Marissela','Flores Lopez','MariaFL@unah.hn','oso','95552790','0801188845987','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(19,1,'Lysi Paola','Corrales Rodriguez','Lysipa12@unah.hn','joses','95521475','0801188509785','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(20,1,'Kevin David','Pacheco Sanchez','KevinDav@unah.hn','trunks','95522780','0801188057894','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(21,1,'Carlos Joel','Lopez Orellana','CarlosOrellana@unah.hn','goku92','98987559','080118828654','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(22,1,'Danelia Mariam','Padilla Sanchez','Daneliapadi@unah.hn','marlon87','84752254','0801188756478','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(23,1,'Pamela Adrian','Rodriguez Alvarez','Pame12@unah.hn','kelly100','98997866','0801188308974','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(24,1,'Juana Mellisa','Reyes Portillo','juana897@unah.hn','sandro87','95606100','0801187908922','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(25,2,'Oscar Andres','Canales Canales','Oscar58@unah.hn','casas98','98009899','0801188013533','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(26,2,'Emilson Samuel','Ortega Calderon','Emilso12@unah.hn','astul89','33358987','080188189713','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(27,1,'Kevin Amador','Banegas Torrrez','KevinBane@unah.hn','acapulco','88453389','080188875862','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(28,1,'Jose Luis','Cairo Ponce','Jose_Luis@unah.hn','hormiga','95785112','1519199023487','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(29,2,'Mariano Joel','Banegas Mejia','JoeMariano@unah.hn','leon','95664898','0801187819877','C:\wamp64\www\formacion-profesional\FotoPerfil'),
(30,2,'Jose Teruel','Torres Mejia','JoseTer@unah.hn','perro02','95504971','0801187909721','C:\wamp64\www\formacion-profesional\FotoPerfil');


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
-- Insertando datos en la tabla Cargos
-- -----------------------------------------------------

INSERT INTO `tbl_cargos` (`idCargo`,`nombreCargo`)VALUES
(1,'Administrador'),
(2,'Entrevistador'),
(3,'Psicologo');

-- -----------------------------------------------------
-- Insertando datos en tabla de empleados
-- -----------------------------------------------------

INSERT INTO `tbl_empleados` (`idEmpleado`,`tbl_cargos_idCargo`)VALUES
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
-- Insertando Datos en la tabla  estado de las etapas
-- -----------------------------------------------------

INSERT INTO `tbl_estado_etapas` (`idEstado`,`estado`)VALUES
(1,'Habilitado'),
(2,'No Habilitado');



-- -----------------------------------------------------
-- Insertando Datos en  la tabla etapas
-- -----------------------------------------------------
INSERT INTO `tbl_etapas` (`idEtapa`,`NombreEtapa`,`Descripción`)VALUES
(1,'Evaluacion Grupal','Aplicacion de Examen en Fisico'),
(2,'Test en Linea','Evaluacion de la personalidad e interes vocacional'),
(3,'Entrevista Pedagogica','Entrevista especializada en trayectoria academica'),
(4,'Devolucion Individual de Resultados','Conclucion y recomendacion de la parte psicologica');

-- -----------------------------------------------------
-- Insertando Datos en la  tabla etapas_programadas
-- -----------------------------------------------------

INSERT INTO `tbl_etapas_programadas`(`idEtapaProgramada`,`idEtapa`,`periodo`,`idEstado` ,`habilitacionAutomatica`,`fechaInicio`, `fechaFin`)VALUES
(1,1,'2019-02',1,'0','2019-06-21','2019-06-29'),
(2,1,'2019-02',1,'0','2019-06-21','2019-06-29'),
(3,1,'2019-02',1,'0','2019-06-21','2019-06-29'),
(4,1,'2019-02',1,'0','2019-06-21','2019-06-29'),
(5,1,'2019-02',1,'1','2019-06-21','2019-06-29'),
(6,2,'2019-02',1,'1','2019-06-21','2019-06-29'),
(7,2,'2019-02',1,'1','2019-06-21','2019-06-29'),
(8,2,'2019-02',1,'1','2019-06-21','2019-06-29'),
(9,2,'2019-02',1,'0','2019-06-21','2019-06-29'),
(10,3,'2019-02',1,'1','2019-06-21','2019-06-29'),
(11,3,'2019-02',1,'0','2019-06-21','2019-06-29'),
(12,3,'2019-02',1,'1','2019-06-21','2019-06-29'),
(13,4,'2019-02',1,'0','2019-06-21','2019-06-29'),
(14,4,'2019-02',1,'1','2019-06-21','2019-06-29'),
(15,4,'2019-02',1,'1','2019-06-21','2019-06-29');

-- -----------------------------------------------------
-- Insertando datos en  la tabla  jornadas grupal
-- -----------------------------------------------------

INSERT INTO `tbl_jornadas_ev_grupal`(`idJornada`,`idEtapaProgramada`,`cantidadCupos`,`horaInicial`,`horaFinal`,`lugarAplicacion`,`fechaAplicacion`)VALUES
(1,1,'25','09:00','13:00','Aula 1 Voae','2019-06-23'),
(2,1,'25','09:00','13:00','Aula 1 Voae','2019-06-23'),
(3,1,'25','09:00','13:00','Aula 1 Voae','2019-06-23'),
(4,1,'25','09:00','13:00','Aula 1 Voae','2019-06-23'),
(5,1,'25','09:00','13:00','Aula 1 Voae','2019-06-23'),
(6,1,'25','09:00','13:00','Aula 1 Voae','2019-06-23'),
(7,1,'25','09:00','13:00','Aula 1 Voae','2019-06-23'),
(8,2,'25','10:00','12:00','En Linea','2019-06-23'),
(9,2,'25','10:00','12:00','En Linea','2019-06-23'),
(10,3,'25','09:00','10:00','Oficina Principal del Voae','2019-06-23'),
(11,3,'25','09:00','10:00','Oficina Principal del Voae','2019-06-23'),
(12,3,'25','09:00','10:00','Oficina Principal del Voae','2019-06-23'),
(13,4,'25','09:00','09:30','Oficina #2 Voae','2019-06-23'),
(14,4,'25','09:00','09:30','Oficina #3 Voae','2019-06-23'),
(15,4,'25','09:00','09:30','Oficina #4 Voae','2019-06-23');


-- -----------------------------------------------------
-- Insertando datos en la tabla Progresos
-- -----------------------------------------------------

INSERT INTO `tbl_Progresos` (`idEstudiante`,`idEtapaProgramada`,`estadoCompletacion`,`notas`)VALUES
(1,1,'1','90% Aprueba '),
(2,1,'1','80% Aprueba '),
(3,1,'1','95% Aprueba '),
(4,1,'1','89% Aprueba '),
(5,1,'1','88% Aprueba '),
(6,1,'1','77% Aprueba '),
(7,1,'1','88% Aprueba '),
(8,1,'0','No Realizado'),
(9,1,'0','No Realizado'),
(10,2,'1','90% Aprueba '),
(11,2,'1','95% Aprueba '),
(12,2,'1','80% Aprueba '),
(13,3,'0','No se Presento '),
(14,3,'0','No se Presento '),
(15,1,'4','90% Total de la Nota ');



-- -----------------------------------------------------
-- Insertando datos en la tabla resultados
-- -----------------------------------------------------
INSERT INTO `tbl_resultados` (`idResultado`,`idEstudiante`,`idEmpleado`,`idEtapaProgramada`,`archivoResultados`)VALUES
(1,1,17,1,'Procesando'),
(2,2,17,1,'Procesando'),
(3,3,17,1,'Procesando'),
(4,4,18,1,'Procesando'),
(5,5,18,1,'Procesando'),
(6,6,18,2,'Procesando'),
(7,7,18,2,'Procesando'),
(8,8,18,2,'Procesando'),
(9,9,19,2,'Procesando'),
(10,10,19,3,'Procesando'),
(11,11,19,3,'Procesando'),
(12,12,20,1,'Procesando'),
(13,13,20,1,'Procesando'),
(14,14,21,1,'Procesando'),
(15,15,22,1,'Procesando');

-- -----------------------------------------------------
-- Insertando datos en la tabla JornadaxEstudiante
-- -----------------------------------------------------

INSERT INTO `tbl_jornadasl_x_estudiantes` (`idJornada`,`idEstudiante`)VALUES
(1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(11,11),
(12,12),
(13,13),
(14,14),
(15,15);

-- -----------------------------------------------------
-- Insertando datos en la tabla HorariosxEmpleado
-- -----------------------------------------------------
INSERT INTO`tbl_horarios_x_empleado` (`idHorarioEmpleado`,`idEmpleado`,`idEtapaProgramada`,`Fecha`,`horaInicial`,`horaFinal`)VALUES
(1,17,1,'2019-06-23','08:00','16:00'),
(2,17,2,'2019-06-23','08:00','16:00'),
(3,18,3,'2019-06-23','08:00','16:00'),
(4,18,4,'2019-06-23','08:00','16:00'),
(5,19,5,'2019-06-23','08:00','16:00'),
(6,20,6,'2019-06-23','08:00','16:00'),
(7,20,7,'2019-06-23','08:00','16:00'),
(8,20,8,'2019-06-25','08:00','16:00'),
(9,20,9,'2019-06-25','08:00','16:00'),
(10,21,10,'2019-06-24','08:00','16:00'),
(11,22,11,'2019-06-24','08:00','16:00'),
(12,23,12,'2019-06-24','08:00','16:00'),
(13,25,13,'2019-06-27','08:00','16:00'),
(14,26,14,'2019-06-27','08:00','16:00'),
(15,27,15,'2019-06-27','08:00','16:00');



-- -----------------------------------------------------
-- Insertando datos en la  tabla Estado de citas
-- -----------------------------------------------------
INSERT INTO`tbl_estado_citas` (`idEstado`,`Descripcion`)VALUES
(1,'Pendiente'),
(2,'Cumplida'),
(3,'Suspendida'),
(4,'Cancelada');


-- -----------------------------------------------------
-- Insertando datos en la  tabla de citas
-- -----------------------------------------------------
INSERT INTO `tbl_citas` (`idCita`,`idEmpleado`,`idEstudiante`,`idEtapaProgramada`,`idEstado`)VALUES
(1,17,1,1,2),
(2,18,2,1,2),
(3,19,3,1,2),
(4,20,4,1,2),
(5,21,5,6,2),
(6,22,6,6,2),
(7,23,7,7,2),
(8,24,8,8,2),
(9,25,9,8,2),
(10,26,10,9,4),
(11,26,11,12,4),
(12,27,12,10,3),
(13,28,13,10,2),
(14,29,14,11,1),
(15,30,15,13,2);

-- -----------------------------------------------------
-- Insertando datos en la  Tabla de Bloqueos en estado de Bloqueo 0 es Bloqueado y 1 es Habilitado
-- -----------------------------------------------------
INSERT INTO`tbl_bloqueos` (`idPersona`,`estadoBloqueo`,`descripcion`)VALUES
(1,'0','Usuario Bloqueado Asistir a Oficina del Voae'),
(2,'1','Se le enviara un Correo'),
(3,'1','Se le enviara un Correo'),
(4,'1','Se le enviara un Correo'),
(5,'1','Se le enviara un Correo'),
(6,'1','Se le enviara un Correo'),
(7,'1','Se le enviara un Correo'),
(8,'1','Se le enviara un Correo'),
(9,'1','Se le enviara un Correo'),
(10,'1','Se le enviara un Correo'),
(11,'1','Se le enviara un Correo'),
(12,'1','Se le enviara un Correo'),
(13,'1','Se le enviara un Correo'),
(14,'1','Se le enviara un Correo'),
(15,'1','Se le enviara un Correo');