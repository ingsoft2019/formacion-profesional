<?php
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$cambios = json_decode($_POST["JsonCambios"]);
$etapa = $_POST["etapa"];
switch ($etapa) {
	case 1:
		$slq=   "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $cambios["progreso"].",".
		"`etapa1` = ".$cambios["estado_etapa"].",".
		"WHERE `idEstudiante` = ". $cambios["id_user"];
		break;
	case 2:
		$slq=   "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $cambios["progreso"].",".
		"`etapa2` = ".$cambios["estado_etapa"].",".
		"WHERE `idEstudiante` = ". $cambios["id_user"];
		break;
	case 3:
		$slq=   "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $cambios["progreso"].",".
		"`etapa3` = ".$cambios["estado_etapa"].",".
		"WHERE `idEstudiante` = ". $cambios["id_user"];
		break;
	case 4:
		$slq=   "UPDATE `db_formacion`.`tbl_control_de_procesos` ".
		"SET ".
		"`porcentaje` = ". $cambios["progreso"].",".
		"`etapa4` = ".$cambios["estado_etapa"].",".
		"WHERE `idEstudiante` = ". $cambios["id_user"];
		break;
	
	default:
		echo "sin cambios";
		break;
		//falta ejecutar consulta
}






?>