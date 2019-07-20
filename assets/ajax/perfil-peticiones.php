<?php
session_start();
include ('../clases/class_conexion.php');
/*switch ($_GET["CODIGO_FUNCION"]) {
	case 1:
		# code...
		break;
	
	default:
		# code...
		break;
}*/
	$conexion = new Conexion();
	$sql = sprintf("select * from tbl_personas inner join ".
				   "tbl_estudiantes on idPersona = idEstudiante ".
				   "where idEstudiante = %s", $_SESSION["idPersona"]);
	$resultado = $conexion->ejecutarInstruccion($sql);
             $resultadoUsuarios = array();
             while($fila = $conexion->obtenerFila($resultado)){
                $resultadoUsuarios[] = $fila;
            }
        
            echo json_encode($resultadoUsuarios);
            $conexion->cerrarConexion();


            

?>