<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();

$id = $_GET["idProceso"];

$sql = '';
if($_GET["tipoEvento"] == 2){
    $sql = 'SELECT idprocesos, DATE_FORMAT(fechainicioentrevista, "%M %d, %Y") as inicio,
    DATE_FORMAT(fechafinentrevista, "%M %d, %Y") as fin
    FROM tbl_procesos WHERE idprocesos=' . $id;
} else {
    $sql = 'SELECT idprocesos, DATE_FORMAT(fechainiciodevuelveresultado, "%M %d, %Y") as inicio,
    DATE_FORMAT(fechafindevuelveresultado, "%M %d, %Y") as fin
    FROM tbl_procesos WHERE idprocesos=' . $id;
}



$conexion->ejecutarInstruccion('SET lc_time_names = "es_MX"');
$resultado = $conexion->ejecutarInstruccion($sql);
$proceso = '';
while($fila = $conexion->obtenerFila($resultado)){
    $proceso = $fila;
}
echo json_encode($proceso);
	
$conexion->cerrarConexion();
?>