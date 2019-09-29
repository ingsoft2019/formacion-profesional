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

$sql2 =  "select cupos from tbl_secciones where idsecciones=".$_POST["idsecciones"]." and idprocesos=".$_POST["idproceso"];
$resultado = $conexion->ejecutarInstruccion($sql2);
$row = mysqli_fetch_array($resultado);
$cupos=(int)$row["cupos"];
$seccion=$_POST["idsecciones"];

	$cupos=$cupos+1;
	$update_cupos = "UPDATE `tbl_secciones` 
                    SET `cupos`=$cupos
                    WHERE idsecciones=$seccion";
    $resultado=$conexion->ejecutarInstruccion($update_cupos);


echo $sql1;
 ?>
