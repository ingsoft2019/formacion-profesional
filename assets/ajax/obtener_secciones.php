<?php
include ('../clases/class_conexion.php');
session_start();
$conexion = new Conexion();
$sql = "SELECT `tbl_secciones`.`idsecciones`, ".
	    "`tbl_secciones`.`horainicial`, ".
	    "`tbl_secciones`.`horafinal`, ".
	    "`tbl_secciones`.`lugar`, ".
	    "`tbl_secciones`.`idprocesos`, ".
	    "`tbl_secciones`.`dia` ".
		"FROM `db_formacion`.`tbl_secciones` ".
		"WHERE idsecciones ".
		"IN ( SELECT tbl_secciones_idsecciones FROM tbl_secciones_has_tbl_estudiantes where ".
		 "tbl_estudiantes_idEstudiante =".$_SESSION["idPersona"].") ";

 
$resultado = $conexion->ejecutarInstruccion($sql);
$respuesta = array();
		while($fila = $conexion->obtenerFila($resultado)){
			$respuesta[] = $fila;
		}
echo json_encode($respuesta);

//echo $sql;
 ?>
