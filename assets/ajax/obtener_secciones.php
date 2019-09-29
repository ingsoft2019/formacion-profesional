<?php
include ('../clases/class_conexion.php');
session_start();
$conexion = new Conexion();

date_default_timezone_set( "America/Tegucigalpa" );
$fechaActual = date("Y-m-d H:m:s");
	
$sql = "SELECT `tbl_secciones`.`idsecciones`, ".
	    "`tbl_secciones`.`horainicial`, ".
	    "`tbl_secciones`.`horafinal`, ".
	    "`tbl_secciones`.`lugar`, ".
	    "`tbl_secciones`.`idprocesos`, ".
	    "`tbl_secciones`.`dia` ".
		"FROM `db_formacion`.`tbl_secciones` ".
		"INNER JOIN `db_formacion`.`tbl_procesos` ".
		"ON `db_formacion`.`tbl_secciones`.idprocesos = `db_formacion`.`tbl_procesos`.idprocesos ".
		"WHERE idsecciones ".
		"IN ( SELECT tbl_secciones_idsecciones FROM tbl_secciones_has_tbl_estudiantes where ".
		 "tbl_estudiantes_idEstudiante =".$_SESSION["idPersona"].") 
		 AND  '" . $fechaActual . "' BETWEEN tbl_procesos.fechainicio AND tbl_procesos.fechafinal
		 ";
 
$resultado = $conexion->ejecutarInstruccion($sql);
$respuesta = array();
		while($fila = $conexion->obtenerFila($resultado)){
			$respuesta[] = $fila;
		}
echo json_encode($respuesta);

//echo $sql;
 ?>
