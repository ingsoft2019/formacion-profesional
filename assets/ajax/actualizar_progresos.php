<?php
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$etapa = $_POST["etapa"];
switch ($etapa) {
	case 1:
		$sql= "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $_POST["progreso"].",".
		"`etapa1` = ".$_POST["estado_etapa"].
		" WHERE `idEstudiante` = ". $_POST["id_user"] . " AND idprocesos = " . $_POST["id_proceso"];
		$conexion->ejecutarInstruccion($sql);
		echo $sql;
		break;
	case 2:
		$sql=   "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $_POST["progreso"].",".
		"`etapa2` = ".$_POST["estado_etapa"].
		" WHERE `idEstudiante` = ". $_POST["id_user"] . " AND idprocesos = " . $_POST["id_proceso"];
		$conexion->ejecutarInstruccion($sql);
		echo $sql;
		break;
	case 3:
		$sql=   "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $_POST["progreso"].",".
		"`etapa3` = ".$_POST["estado_etapa"].
		" WHERE `idEstudiante` = ". $_POST["id_user"] . " AND idprocesos = " . $_POST["id_proceso"];
		$conexion->ejecutarInstruccion($sql);
		echo $sql;
		break;
	case 4:
		$sql=   "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $_POST["progreso"].",".
		"`etapa4` = ".$_POST["estado_etapa"].
		" WHERE `idEstudiante` = ". $_POST["id_user"] . " AND idprocesos = " . $_POST["id_proceso"];
		$conexion->ejecutarInstruccion($sql);
		echo $sql;
		break;
	
	default:
		echo "sin cambios";
		break;
		//falta ejecutar consulta
}






?>