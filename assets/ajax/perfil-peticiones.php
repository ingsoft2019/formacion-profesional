<?php
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
	$sql = "select * from tbl_carreras";
	$resultado = $conexion->ejecutarInstruccion($sql);
             $resultadoUsuarios = array();
             while($fila = $conexion->obtenerFila($resultado)){
                $resultadoUsuarios[] = $fila;
            }
        
            echo json_encode($resultadoUsuarios);
            $conexion->cerrarConexion();

?>