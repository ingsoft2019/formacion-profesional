<?php
include ('../clases/class_conexion.php');
session_start();
$conexion = new Conexion();
$sql = "
    SELECT a.idhorariosorientador as id, a.fecha, a.tipoevento, a.h_inicial, a.h_final, a.idprocesos, c.idPersona, c.nombres, c.apellidos, c.celular
    FROM tbl_Horarios_Orientador AS a
    INNER JOIN tbl_Horarios_Orientador_X_tbl_estudiantes AS b
    ON a.idhorariosorientador = b.idhorariosorientador
    INNER JOIN tbl_personas AS c
    ON b.idEstudiante = c.idPersona
    WHERE a.idorientador = " . $_POST["id-orientador"];

 
$resultado = $conexion->ejecutarInstruccion($sql);
$respuesta = array();

while($fila = mysqli_fetch_assoc($resultado)){
    $respuesta[] = $fila;
}
echo json_encode($respuesta);

//echo $sql;
?>