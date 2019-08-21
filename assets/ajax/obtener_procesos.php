<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta = array();

$id = $_GET["idProceso"];

$sql = 'SELECT idprocesos, DATE_FORMAT(fechainicioentrevista, "%M %d, %Y") as fechainicioentrevista,
 DATE_FORMAT(fechafinentrevista, "%M %d, %Y") as fechafinentrevista
 FROM tbl_procesos WHERE idprocesos=' . $id;


$conexion->ejecutarInstruccion('SET lc_time_names = "es_MX"');
$resultado = $conexion->ejecutarInstruccion($sql);
$proceso = '';
while($fila = $conexion->obtenerFila($resultado)){
    $proceso = $fila;
}
echo json_encode($proceso);
	
$conexion->cerrarConexion();
?>