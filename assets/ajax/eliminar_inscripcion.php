<?php
include ('../clases/class_conexion.php');
session_start();
$conexion = new Conexion();
$sql = "DELETE FROM `db_formacion`.`tbl_secciones_has_tbl_estudiantes` ".
			"WHERE tbl_estudiantes_idEstudiante=".$_SESSION["idPersona"]." AND tbl_secciones_idsecciones=".$_POST["idsecciones"];
$conexion->ejecutarInstruccion($sql);

$sql1 = "DELETE FROM `db_formacion`.`tbl_control_de_procesos` ".
			"WHERE idEstudiante=".$_SESSION["idPersona"]." AND idprocesos=".$_POST["idproceso"];
$conexion->ejecutarInstruccion($sql1);

echo $sql1;
 ?>



