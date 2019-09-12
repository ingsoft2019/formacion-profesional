<?php
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$sql0="SELECT `tbl_horarios_orientador`.`idhorariosorientador` FROM `db_formacion`.`tbl_horarios_orientador` WHERE codigohorario =". $_POST["codigohorario"];
$resultado = $conexion->ejecutarInstruccion($sql0);
$idhorariosorientador = '';
while($fila = $conexion->obtenerFila($resultado)){
    $idhorariosorientador = $fila;
}





$sql="DELETE FROM `tbl_horarios_orientador` WHERE `codigohorario` =". $_POST["codigohorario"];
$conexion->ejecutarInstruccion($sql);
echo $sql0;
echo $idhorariosorientador;
$conexion->cerrarConexion();
?>