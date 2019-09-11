<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();

$idP = $_GET["idProceso"];
$evento=$_GET["tipoEvento"];
$id = $_SESSION["idPersona"];

$sql = "SELECT DATE_FORMAT(fecha, '%M %d, %Y') as fecha,TIME_FORMAT(h_inicial,'%r ') as inicial, TIME_FORMAT(h_final,'%r') as final FROM tbl_horarios_orientador WHERE idprocesos = '$idP' and tipoevento = '$evento' and idorientador = '$id';";

$conexion->ejecutarInstruccion('SET lc_time_names = "es_MX"');
$resultado = $conexion->ejecutarInstruccion($sql);
if($conexion->cantidadRegistros($resultado)>0){
    $proceso = array();
    while($fila = $conexion->obtenerFila($resultado)){
        $proceso[] = $fila;
    }
    echo json_encode($proceso);
}else{
    echo json_encode("Sin datos.");
}
	
$conexion->cerrarConexion();
?>