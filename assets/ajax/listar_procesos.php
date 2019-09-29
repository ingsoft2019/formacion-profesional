<?php
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$id_proceso = $_POST["idProceso"];
$codigoAccion = $_POST["idAccion"];
$respuesta=[];
switch ($codigoAccion) {
    case 1:
        $sql="UPDATE tbl_procesos SET estado='Inactivo' WHERE idprocesos=".$_POST["idProceso"];
		$conexion->ejecutarInstruccion($sql);
		$respuesta["mensaje"]="Proceso eliminado exitosamente";
        $respuesta["codigo"] = 0;
        break;
    default:
        $respuesta["mensaje"]="No se realizó nunguna acción.";
        $respuesta["codigo"] = 0;
		break;
}

echo json_encode($respuesta);
$conexion->cerrarConexion();

?>