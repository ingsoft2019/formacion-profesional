<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();

$idP = $_GET["idProceso"];
$evento=$_GET["tipoEvento"];
$id = $_SESSION["idPersona"];

$sql = "SELECT * FROM tbl_horarios_orientador WHERE idprocesos = '$idP' and tipoevento = '$evento' and idorientador = '$id';";

$conexion->ejecutarInstruccion('SET lc_time_names = "es_MX"');
$resultado = $conexion->ejecutarInstruccion($sql);
if($conexion->cantidadRegistros($resultado)>0){
    $proceso = '';
    while($fila = $conexion->obtenerFila($resultado)){
        $proceso = $fila;
    }
    echo json_encode($proceso);
}else{
    echo json_encode("Sin datos.");
}
	
$conexion->cerrarConexion();
?>